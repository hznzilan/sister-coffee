<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coffee;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function add_coffee()
    {
        return view ('admin.add_coffee');
    }

    public function upload_coffee (Request $request)
    {
       // 1. Create a new instance of your Product Model
        $data = new Coffee;

        // 2. Assign values from the form to the database columns
        $data->name = $request->name;
        $data->detail = $request->details; // make sure column is 'description' or 'details' in migration
        $data->price = $request->price;
        $data->category = $request->category;

        // 3. Handle the Image Upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            
            // Give the image a unique name
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            
            // Move the image to public/coffee_images
            $request->image->move('coffee_img', $imagename);
            
            // Save the path/name to the database
            $data->image = $imagename;
        }

        // 4. Save to Database
        $data->save();

        // 5. Redirect back with a success message
        return redirect()->back()->with('message', 'Coffee added successfully!'); 
    }

    public function view_coffee(Request $request)
    {
        $search = $request->search;

        // If there is a search term, filter by name or category
        if($search) {
            $coffee = Coffee::where('name', 'LIKE', "%$search%")
                            ->orWhere('category', 'LIKE', "%$search%")
                            ->get();
        } else {
            $coffee = Coffee::all();
        }

        return view('admin.view_coffee', compact('coffee'));
    }

    public function delete_coffee($id)
    {
        // Find the coffee by its ID
        $coffee = Coffee::find($id);

        // Optional: Delete the image file from the public folder to save space
        if ($coffee->image) {
            $imagePath = public_path('coffee_img/' . $coffee->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Delete the record from the database
        $coffee->delete();

        // Redirect back with a success notification
        return redirect()->back()->with('message', 'Coffee deleted successfully!');
    }
    
    public function edit_coffee($id)
    {
        $coffee = Coffee::find($id);
        return view('admin.edit_coffee', compact('coffee'));
    }

    public function update_coffee(Request $request, $id)
    {
        $coffee = Coffee::find($id);

        $coffee->name = $request->name;
        $coffee->detail = $request->details;
        $coffee->price = $request->price;
        $coffee->category = $request->category;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('coffee_img', $imagename);
            $coffee->image = $imagename;
        }

        $coffee->save();

        return redirect('/view_coffee')->with('message', 'Coffee updated successfully!');
    }

    
    public function all_orders()
    {
        
        $orders = Order::all()->groupBy(function($item) {
            return $item->user_id . '_' . $item->created_at->format('Y-m-d H:i:s');
        });

        return view('admin.orders', compact('orders'));
    }

    public function update_status($id, $status)
{
    
    $data = Order::find($id);
    
    Order::where('user_id', $data->user_id)
         ->where('created_at', $data->created_at)
         ->update(['delivery_status' => $status]);

    return redirect()->back()->with('message', 'Order status updated to ' . $status);
}

public function order_search(Request $request)
{
    $search = $request->search;
    if (!$search) {
        return redirect('all_orders');
    }
    $orders = Order::where(function($query) use ($search) {
       
        if (is_numeric($search)) {
            $query->where('id', '=', $search);
        } else {
            
            $query->where('name', 'LIKE', "%$search%")
                  ->orWhere('phone', 'LIKE', "%$search%");
        }
    })
    ->get()
    ->groupBy(function($item) {
        return $item->user_id . '_' . $item->created_at->format('Y-m-d H:i:s');
    });

    return view('admin.orders', compact('orders'));
}

public function toggle_status($id)
{
    $coffee = Coffee::find($id);
    
    if($coffee->status == 'active') {
        $coffee->status = 'inactive';
    } else {
        $coffee->status = 'active';
    }
    
    $coffee->save();
    return redirect()->back()->with('message', 'Stock status updated!');
}

}
