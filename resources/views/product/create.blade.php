@extends('layouts.app')



@section('content')

  <div class="ibox ibox-fullheight">

        <form class="form-info" action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
           @csrf
            <div class="ibox-body">
                <div class="row">
                    <div class="col-sm-6 form-group mb-6">
                        <label>Nombre</label>
                        <input class="form-control" type="text" placeholder="nombre" name="name">
                    </div>
                    <div class="col-sm-6 form-group mb-6">
                        <label>Codigo</label>
                        <input class="form-control" type="text" placeholder="00" name="code">
                    </div>
                    <div class="col-sm-6 form-group mb-6">
                        <label>Tipo</label>
                        <select class="form-control" name="type" >
                            <option value="1">Flor</option>
                            <option value="2">Extracto</option>
                            <option value="3">Comestible</option>
                            <option value="4">Accesorio</option>
                        </select>
                    </div>
                    <div class="col-sm-6 form-group mb-6">
                      <label>Cantidad</label>
                      <input class="form-control" type="number" placeholder="en numeros" name="quantity">
                    </div>
                    <div class="col-sm-6 form-group mb-6">
                        <label>Unidad</label>
                        <select class="form-control" name="unit" >
                            <option value="1">Unidad</option>
                            <option value="2">Gramo</option>
                        </select>
                    </div>
                    <div class="col-sm-6 form-group mb-6">
                      <label>Valor</label>
                      <input class="form-control" type="number" placeholder="en gramos" name="value">
                    </div>
                    <div class="col-sm-12 form-group mb-12">
                      <label>Descripcion</label>
                      <textarea class="form-control" name="details"></textarea>
                    </div>
                    <div class="col-sm-6 form-group mb-6">
                      <label>Imagen</label>
                      <input type="file" name="img"   >
                    </div>

                </div>
            </div>
            <div class="ibox-footer">
                <button class="btn btn-info mr-2" type="submit">Agregar</button>
                <button class="btn btn-secondary" type="reset">Cancelar</button>
            </div>
        </form>
    </div>

@endsection

@section('css')

@endsection

@section('js')

@endsection
