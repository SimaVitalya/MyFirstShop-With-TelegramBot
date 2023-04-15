<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Order;
use App\OrderProduct;
use App\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Orders\StoreRequests;
use App\Http\Requests\Admin\Orders\UpdateRequests;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::with('orderUser', 'orderProducts')->get();
        return view('admin.orders.index', compact('orders'));
    }


    public function create()
    {
        $orders = Order::get();
        return view('admin.orders.create', compact('orders'));
    }

    public function store(StoreRequests $request)
    {
        $data = $request->all();
        $orders = Product::create($request->all());


        return redirect()->route('admin.$orders.index');
    }


    public function show(Order $order)
    {
        $products = $order->orderProducts()->get();

        return view('admin.orders.show', compact('order', 'products'));
    }


    public function edit(Order $order)
    {
        $products = $order->orderProducts()->get();

        return view('admin.orders.edit', compact('order', 'products'));
    }


    public function update(UpdateRequests $request, Order $order)
    {
        $data = $request->all();

        $orderProduct = $order->orderProducts()->where('id', $request->product_id)->first();
        if ($request->has('count'))  {
            $oldCount = $orderProduct->count;
            $newCount = $request->count;
            $orderProduct->count = $newCount;
            $orderProduct->fullprice = $orderProduct->product->price * $newCount;
            $orderProduct->save();

            // Обновляем полную стоимость заказа
            $order->total_price += ($orderProduct->fullprice - $orderProduct->product->price * $oldCount);
            $order->save();
        }

        unset($data['count']);
        unset($data['product_id']);

        $order->update($data);

        return redirect()->back();
    }
//    public function update(UpdateRequests $request, Order $order)
//    {
//        $data = $request->all();
//        $orderProducts = $order->orderProducts;
//        if ($request->has('count')) {
//            $orderProducts->count = $request->count;
//            $orderProducts->save();
//        }
//        unset($data['count']);//что бы он не пытался сохранить его еще и в ордер,так как мы его уже сохранили в ордерпродукт
//
//        // Обновляем данные заказа в таблице "orders"
//        $order->update($data);
//
//        return redirect()->back();
//    }


    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('admin.orders.index')->with('success', 'Заказ удален.');
    }
}
//public function updat23e(UpdateRequests $request, Order $order)
//{
//    $data = $request->all();
//
//    $orderProduct = $order->orderProducts()->where('id', $request->product_id)->first();
//    if ($request->has('count') && $request->has('product_id')) {
//        $oldCount = $orderProduct->count;
//        $newCount = $request->count;
//        $orderProduct->count = $newCount;
//        $orderProduct->fullprice = $orderProduct->product->price * $newCount;
//        $orderProduct->save();
//
//        // Обновляем полную стоимость заказа
//        $order->total_price += ($orderProduct->fullprice - $orderProduct->product->price * $oldCount);
//        $order->save();
//    }
//
//    unset($data['count']);
//    unset($data['product_id']);
//
//    $order->update($data);
//
//    return redirect()->back();
//}
