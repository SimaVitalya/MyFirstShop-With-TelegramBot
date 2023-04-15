<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class UserOrdersController extends Controller
{
    public function index()
    {
        $orders = Order::with('orderUser', 'orderProducts')->get();


        return view('UserOrders.index', compact('orders'));
    }


    public function show(Order $order)
    {
        $products = $order->orderProducts()->get();

        return view('UserOrders.show', compact('order', 'products'));
    }

}
