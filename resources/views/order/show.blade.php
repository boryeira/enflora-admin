@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
        <div class="col-md-3">
                <div class="card" >
                    <div class="card-body">
                        <h5 class="card-title">#{{$order->id}}</h5>
                        <span class="badge badge-{{$order->status['css']}}">{{$order->status['admin']}}</span>
                        <p>{{$order->user->full_name}}</p>

                        
                    </div>
                </div>
                @if(($order->flow_url == null) && ($order->status['id'] == 2))
                <a class="btn btn-info btn-block mt-2 " href="{{route('orders.payflow',['order'=>$order->id])}}">Link de Pago</a>
                
                @endif
                @if($order->status['id'] == 2)
                <a class="btn btn-danger btn-block mt-2 " href="{{route('orders.paid',['order'=>$order->id])}}">Pagado</a>
                @endif
                @if($order->status['id'] == 3)
                <a class="btn btn-info btn-block mt-2 " href="{{route('orders.delivered',['order'=>$order->id])}}">Entregado</a>
                @endif
                @if($order->status['id'] != 4)
                <form  action="{{route('orders.destroy',['order'=>$order->id])}}" method="POST" >
                    @method('DELETE')
                    @csrf


                    <button class="btn btn-danger btn-block mt-2"   type="submit" ><i class="ti-trash"></i>Eliminar</button>
                </form>
                @endif
        </div>
        <div class="col-md-9">
            @if($order->flow_url !== null)
            <div class="card mb-2" >
                
                <div class="card-body">
                    <label>Flow url</label>
                    <p>{{$order->flow_url}}</p>
                </div>
                
            </div>
            @endif
            <div class="card mb-2" >
                    <ul class="list-group list-group-flush">
                            @foreach ($order->orderItems as $item)
                            <li class="list-group-item">
                                <div class="row ">
                                    <div class="col-2">
                                        <img src="{{url($item->img)}}" class="rounded float-left" width="40">
                                    </div>
                                    <div class="col-6 text-left">
                                        <h6>{{$item->name}}</h6>
                                    </div>                  
                                    <div class="col-4">
                                        <h6>${{number_format($item->amount, 0, ',', '.') }}</h6>
                                        <span>{{$item->quantity}} @if($item->quantity == 1) {{$item->unit['singular']}} @else {{$item->unit['plural']}} @endif</span>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                            <li class="list-group-item ">
                                <div class="float-right text-danger"><h5>Total: ${{number_format($order->orderItems()->sum('amount'), 0, ',', '.') }}</h5></div>
                            </li>    
                        </ul>
                    
            </div>
        </div>
    </div>
@endsection

@section('css')

@endsection

@section('js')



@endsection