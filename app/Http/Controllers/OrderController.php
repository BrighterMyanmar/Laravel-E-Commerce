<?php

namespace App\Http\Controllers;

use App\Models\Order;

class OrderController extends Controller
{
    public function allOrder()
    {
        $orders = Order::all();
        return view('order.order',compact('orders'));
    }
}
