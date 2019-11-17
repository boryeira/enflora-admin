@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-12">
            <a class="btn btn-success mt-2 mb-2" href="{{route('users.create')}}">Nuevo Usuario</a>
                
                        <table id="usersTable" class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Email</th>
                                <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{$user->id}}</th>
                                    <td>{{$user->full_name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <a class="btn btn-info " type="button" href={{route('users.show',['user'=>$user->id])}}>
                                            Ver
                                        </a>
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