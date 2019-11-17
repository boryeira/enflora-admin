@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
        <div class="col-3">
                <div class="card" >
                    <img src="{{$product->img}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$product->name}}</h5>

                        <p>{{$product->code}}</p>
                        <p>{{$product->status['name']}}</p>
                    </div>
                </div>
                <a class="btn btn-info btn-block mt-2" href="{{route('products.edit',['product'=>$product->id])}}">Editar</a>
                <button class="btn btn-danger btn-block mt-2 ">Eliminar</button>
        </div>
        <div class="col-9">

        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>

@endsection

@section('js')


    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js" defer></script>
    <script>
        $(document).ready( function () {
            $('#orderItemsTable').DataTable();
        } );
    </script>

@endsection