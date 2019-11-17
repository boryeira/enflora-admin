@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-12">
                <a class="btn btn-success mt-2 mb-2" href="{{route('products.create')}}">Nuevo Producto</a>
                        <table id="usersTable" class="table">
                            <thead>
                                <tr>
                                <th scope="col">Estado</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Estado</th>
                                <th scope="col"></th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td><span class="badge badge-{{$product->status['css']}}">{{$product->status['name']}}</span></td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->available}}</td>
                                    
                                    <td>
                                        <a class="btn btn-info" href="{{route('products.show',['product'=>$product->id])}}">Ver</a>
                                    </td>
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
            $('#usersTable').DataTable();
        } );
    </script>

@endsection