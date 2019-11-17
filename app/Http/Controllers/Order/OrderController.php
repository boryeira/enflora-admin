<?php

namespace App\Http\Controllers\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order\Order;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        $orders = Order::orderBy('created_at','desc')->get();
        return view('order.index')->with('orders',$orders);
    }

    public function show(Order $order)
    {
      return view('order.show')->with('order',$order);
    }
}
