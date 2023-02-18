<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class OrderController extends Controller
{
    public function index()
    {
        $todayDate = Carbon::now();
        $orders = Order::whereDate('created_at',$todayDate)->paginate(10);
        // $orders = Order::paginate(5);
        return view('admin.orders.index',compact('orders'));
    }

    public function show(int $orderId)
    {
        $orders = Order::where('id',$orderId)->first();
        if($orders)
        {
            return view('admin.orders.view',compact('orders'));
        }else{
            return redirect('admin/orders')->with('message','no Orders Found');
        }
    }
}
