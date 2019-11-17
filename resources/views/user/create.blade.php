@extends('layouts.app')


@section('content')
<div class="page-content ">
  <div class="ibox ibox-fullheight">
        <div class="ibox-head">
            <div class="ibox-title">Ingreso Usuario</div>

        </div>
        <form class="form-info" action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
           <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
            <div class="ibox-body">
                <div class="row">
                    <div class="col-sm-6 form-group mb-6">
                        <label>Nombre</label>
                        <input class="form-control" type="text"  name="first_name">
                    </div>
                    <div class="col-sm-6 form-group mb-6">
                        <label>Apellido</label>
                        <input class="form-control" type="text" name="last_name">
                    </div>
                    <div class="col-sm-6 form-group mb-6">
                      <label>Rut</label>
                      <input class="form-control" type="text" name="rut">
                    </div>
                    <div class="col-sm-6 form-group mb-6">
                        <label>Email</label>
                        <input class="form-control" type="email"  name="email">
                    </div>

                </div>

            </div>
            <div class="ibox-footer">
                <button class="btn btn-info mr-2" type="submit">Agregar</button>
                <button class="btn btn-secondary" type="reset">Cancelar</button>
            </div>
        </form>
    </div>
</div>
@endsection
