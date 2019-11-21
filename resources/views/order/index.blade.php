@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-12">
                <a class="btn btn-success mt-2 mb-2" href="{{route('orders.create')}}">Nueva Orden</a>

                        <table id="ordersTable" class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">usuario</th>
                                <th scope="col">Monto</th>
                                <th scope="col">Estado</th>
                                <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                    <th scope="row">{{$order->id}}</th>
                                    <td>@if($order->user){{$order->user->full_name}} @else -- @endif</td>
                                    <td>{{$order->amount}}</td>
                                    <td>{{$order->status['admin']}}</td>
                                    <td><a class="btn btn-info" href="{{route('orders.show',['order'=>$order->id])}}">Ver</a></td>
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
            $('#ordersTable').DataTable({
                "order": [[ 0, "desc" ]]
            } );
        } );
    </script>

@endsection