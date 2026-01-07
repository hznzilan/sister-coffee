<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Coffee;
use App\Models\Order;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
  public function index(Request $request)
{
    if (Auth::id()) {
        $usertype = Auth()->user()->usertype;

        if ($usertype == 'user') {
            // User side with Filters
            $query = Coffee::where('status', 'active');

            if ($request->filled('category')) {
                $query->where('category', $request->category);
            }

            if ($request->filled('search')) {
                $query->where('name', 'LIKE', '%' . $request->search . '%');
            }

            $coffees = $query->get();
            return view('user.home', compact('coffees'));
        } 
        else 
        {   
            $total_user = User:: where ('usertype','=','user')->count();
            $total_coffee = Coffee::count();
            $total_order = Order::select('user_id', 'created_at')
                    ->groupBy('user_id', 'created_at')
                    ->get()
                    ->count();
            $total_delivered = Order::where('delivery_status','=','Delivered')->count();
            $total_revenue = Order::where('delivery_status', 'delivered')
                      ->sum(DB::raw('price * quantity'));
            $pending_order = Order::where('delivery_status','processing')
                        ->select('user_id', 'created_at')
                        ->groupBy('user_id', 'created_at')
                        ->get()
                        ->count();
    
            return view('admin.index', compact('total_user','total_coffee','total_order','total_delivered','total_revenue','pending_order'));
        }
    } 
}
}
