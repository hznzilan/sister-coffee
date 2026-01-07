<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;         
use App\Models\Coffee; 
use App\Models\Order;      
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function show_cart()
{
    if (Auth::id()) {
        $user_id = Auth::user()->id;

        // This gets the cart items AND the coffee details in one go
        $cart = Cart::where('user_id', $user_id)->with('coffee')->get();

        return view('user.cart', compact('cart'));
    }
    return redirect('login');
}



    public function add_cart(Request $request, $id)
{
    $user = Auth::user();
    
    // Check if this user already has this coffee in their cart
    $existingCart = Cart::where('user_id', $user->id)
                        ->where('coffee_id', $id)
                        ->first();

    if ($existingCart) {
        $existingCart->quantity += 1;
        $existingCart->save();
    } else {
        $cart = new Cart;
        $cart->user_id = $user->id;
        $cart->coffee_id = $id;
        $cart->quantity = 1;
        $cart->save();
    }

    return redirect()->back()->with('success', 'Item successfully added to cart!');
}

public function update_quantity($id, $action)
{
    $cart = Cart::find($id);
    
    if($action == 'increase') {
        $cart->quantity += 1;
    } elseif($action == 'decrease' && $cart->quantity > 1) {
        $cart->quantity -= 1;
    }
    
    $cart->save();
    return redirect()->back();
}

public function remove_cart($id)
{
    $cart = Cart::find($id);
    $cart->delete();
    return redirect()->back()->with('message', 'Item removed');
}

public function checkout()
{
    $user = Auth::user();
    $cart = Cart::where('user_id', $user->id)->with('coffee')->get();
    
    return view('user.checkout', compact('cart'));
}

public function confirm_order(Request $request)
{
    $user = Auth::user();
    $user->update(['phone' => $request->phone]); // Permanent save

    $cart = Cart::where('user_id', $user->id)->get();

    foreach($cart as $item) {
        $order = new Order;
        
        // From account/form
        $order->name = $user->name;
        $order->email = $user->email;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->user_id = $user->id;

        // From cart
        $order->coffee_title = $item->coffee->name;
        $order->price = $item->coffee->price;
        $order->quantity = $item->quantity;
        $order->image = $item->coffee->image;
        
        // Extra info
        $order->date = date('Y-m-d'); 
        $order->payment_status = $request->payment_method; // Saves 'card' or 'cash on delivery'
        $order->delivery_status = 'processing';

        $order->save();
        $item->delete();
    }

    return redirect()->route('home')->with('order_success', 'Thank you! Your order has been placed successfully.');
}

public function view_orders(Request $request)
{
    if(Auth::id())
    {
        $user_id = Auth::id();
        
        // 1. Start the query
        $query = Order::where('user_id', $user_id);

        // 2. Apply filter if a specific status is clicked
        if ($request->has('status') && $request->status != 'all') {
            $query->where('delivery_status', $request->status);
        }

        // 3. Get the results and then group them by time
        $orders = $query->get()->groupBy(function($item) {
            return $item->created_at->format('Y-m-d H:i:s');
        });

        return view('user.view_order', compact('orders'));
    }
    else
    {
        return redirect('login');
    }
}


}
