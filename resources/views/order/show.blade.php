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
                @if($order->status['id'] == 2)
                <a class="btn btn-info btn-block mt-2 " href="{{route('orders.payflow')}}">Pagar</a>
                @endif
                @if($order->status['id'] == 3)
                <a class="btn btn-info btn-block mt-2 " href="#">Entregado</a>
                @endif
                <button class="btn btn-danger btn-block mt-2 ">Eliminar</button>
        </div>
        <div class="col-md-9">

        </div>
    </div>
@endsection

@section('css')

@endsection

@section('js')



@endsection