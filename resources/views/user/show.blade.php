@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-3">
                <div class="card" >
                    
                    <div class="card-body">
                        <h5 class="card-title">Usuario</h5>
                        <p>{{$user->full_name}}</p>
                        <p>{{$user->email}}</p>
                    </div>
                </div>
                <button class="btn btn-info btn-block mt-2">Editar</button>
                <button class="btn btn-danger btn-block mt-2 ">Eliminar</button>
        </div>
        <div class="col-9">
                <table id="ordersTable" class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Monto</th>       
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user->orders as $order)
                        <tr>
                            <th scope="row">{{$order->id}}</th>
                            <td>{{$order->status['admin']}}</td>
                            <td>{{$order->created_at}}</td>
                            <td>{{$order->amount}}</td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
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
            $('#ordersTable').DataTable();
        } );
    </script>

@endsection