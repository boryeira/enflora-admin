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

    public function create()
    {
      return view('order.create');
    }

    public function store(Request $request)
    {
      

        $items = $request->all();
        unset($items['_token']);
        $items = array_filter($items);
        // $total = 0;
        if($request->total < 20000){
          return Redirect::back()->withErrors(array('zero' => '$20.000 es el minimo de compra'));
        }
        unset($items['total']);

        if(count($items)==0){
            return Redirect::back()->withErrors(array('zero' => 'Debe seleccionar ingresar la cantidad'));
        }
        foreach($items as $key => $q){
            
            $product = Product::find($key);
            
            if($product->available < $q)
            {
                return Redirect::back()->withErrors(array('quantity' => 'Supera el stock de '.$product->name));
            }
        }

        $order = new Order;
        $order->user_id = $request->user;
        $order->quantity = array_sum($items);
        $order->status = 2;
        $order->save();
  
        foreach ($items as $key => $q) {
              $product = Product::find($key);
              $item = new OrderItem;
              $item->order_id = $order->id;
              $item->name = $product->name;
              $item->product_id = $product->id;
              $item->quantity = $q;
              $item->amount = $product->value*$q;
              $item->unit = $product->unit['id'];
              $item->status = 1;
              $item->img = $product->img;
              $item->save();
              $product->consumed = $product->consumed + $q;
              if($product->available == 0){
                $product->status = 2 ;
              }
              $product->save();
            
        }

        $order->amount = $order->items->sum('amount');
        if($order->save()) {
          return Redirect::route('orders.show',['order'=>$order->id]);
        } else {
          return Redirect::back()->withErrors(array('db' => 'error en base de datos'));
        }
    }

    public function show(Order $order)
    {
      return view('order.show')->with('order',$order);
    }
}
