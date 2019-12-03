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
                @if($order->status['id'] == 3)
                <a class="btn btn-info btn-block mt-2 " href="#">Entregado</a>
                @endif
                @if($order->status['id'] !== 4)
                <form  action="{{route('orders.destroy',['order'=>$order->id])}}" method="POST" >
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger btn-block mt-2"   type="submit" ><i class="ti-trash"></i>Eliminar</button>
                </form>
                @endif
        </div>
        <div class="col-md-9">
            <div class="card mb-2" >
                @if($order->flow_url !== null)
                <div class="card-body">
                    <label>Flow url</label>
                    <p>{{$order->flow_url}}</p>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('css')

@endsection

@section('js')



@endsection