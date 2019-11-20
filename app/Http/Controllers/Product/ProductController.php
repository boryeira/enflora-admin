<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use Image;
use Storage;
use Redirect;



class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::orderBy('status','asc')->get();
        return view('product.index')->with('products',$products);
    }

    public function create()
    {
      return view('product.create');
    }

    public function edit(Product $product)
    {
      return view('product.edit')->with('product',$product);
    }
  
    public function store(Request $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->code = $request->code;
        $product->type = $request->type;
        $product->quantity = $request->quantity;
        $product->unit = $request->unit;
        $product->value = $request->value;
        $product->description = $request->description;
        $product->status = 1;
        $product->consumed = 0;

        if ($request->img) {
            $resize = Image::make($request->img)->fit(680, 450)->encode('jpg');
            $storage = Storage::put('public/product/'.$product->id.'.jpg', $resize);
            $product->img = url('/').'/storage/product/'.$product->id.'.jpg';
        } else {
            $product->img = url('/').'/public/img/product.jpg';
        }

        $product->save();
    
        return Redirect::route('products.show',['product'=>$product->id]);
    }

    public function update(Request $request, Product $product)
    {
        $product->name = $request->name;
        $product->code = $request->code;
        $product->type = $request->type;
        $product->quantity = $request->quantity;
        $product->unit = $request->unit;
        $product->value = $request->value;
        $product->description = $request->description;
        $product->status = 1;
        $product->consumed = 0;

        if ($request->img) {
            $resize = Image::make($request->img)->fit(680, 450)->encode('jpg');
            $storage = Storage::put('public/product/'.$product->id.'.jpg', $resize);
            $product->img = url('/').'/storage/product/'.$product->id.'.jpg';
        } 

        $product->save();
    
        return Redirect::route('products.show',['product'=>$product->id]);
    }
  
    public function show(Product $product)
    {
      return view('product.show')->with('product',$product);
    }
  
}
