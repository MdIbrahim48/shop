<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    function orders(){
        $orders = Order::get();
        $orderItem = OrderItem::get();
        return view('backend.order.order_list',[
            'orders' => $orders,
            'orderItem' => $orderItem
        ]);
    }
}
