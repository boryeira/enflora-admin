<?php

namespace App\Http\Controllers\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order\Order;
use App\Models\Order\OrderItem;
use App\Models\Product\Product;
use Auth;
use Session;
use Redirect;

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
        $products = Product::where('status',1)->get();
        // dd($products);
        return view('order.create')->with('products', $products);
    }

    public function store(Request $request)
    {
      

        $items = $request->all();
        unset($items['_token']);
        $items = array_filter($items);
        dd();
        // $total = 0;
        if($request->total < 20000){
          return Redirect::back()->withErrors(array('zero' => '$20.000 es el minimo de compra'));
        }
        unset($items['total']);

        if(count($items)==0){
            return Redirect::back()->withErrors(array('zero' => 'Debe seleccionar ingresar la cantidad'));
        }

        dd($items);
        foreach($items as $key => $q){
            
            $product = Product::find($key);

            
            if($product->available < $q )
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

        $order->amount = $order->orderItems->sum('amount');
        if($order->save()) {
          return Redirect::route('orders.index');
        } else {
          return Redirect::back()->withErrors(array('db' => 'error en base de datos'));
        }
    }

    public function show(Order $order)
    {
      return view('order.show')->with('order',$order);
    }

    public function destroy(Order $order)
    {
      foreach ($order->orderItems as $item) {
        $product = $item->product;
        $product->consumed = $product->consumed - $item->quantity;
        $product->save();
        $item->delete();
      }
      $order->delete();
      Session::flash('success','Orden eliminada con Éxito');
      return Redirect::route('orders.index');
    }

    public function delivered(Order $order)
    {
        $order->status = 4;
        $order->delivery_date = today();
        $order->save();
        return redirect::back();
    }
}
