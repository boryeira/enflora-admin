@extends('layouts.app')



@section('content')

  <div class="ibox ibox-fullheight">

        <form class="form-info" action="{{route('products.update',['product'=>$product->id])}}" method="POST" enctype="multipart/form-data">
            @method('PUT')
           @csrf
            <div class="ibox-body">
                <div class="row">
                    <div class="col-sm-6 form-group mb-6">
                        <label>Nombre</label>
                    <input class="form-control" type="text" placeholder="nombre" name="name" value="{{$product->name}}"> 
                    </div>
                    <div class="col-sm-6 form-group mb-6">
                        <label>Codigo</label>
                        <input class="form-control" type="text" placeholder="00" name="code" value="{{$product->code}}">
                    </div>
                    <div class="col-sm-6 form-group mb-6">
                        <label>Tipo</label>
                        <select class="form-control" name="type" >
                            <option value="1" @if($product->type == 1) selected @endif >Flor</option>
                            <option value="2" @if($product->type == 2) selected @endif >Extracto</option>
                            <option value="3" @if($product->type == 3) selected @endif >Comestible</option>
                            <option value="4" @if($product->type == 4) selected @endif >Accesorio</option>
                        </select>
                    </div>
                    <div class="col-sm-6 form-group mb-6">
                      <label>Cantidad</label>
                      <input class="form-control" type="number" placeholder="en numeros" name="quantity" value="{{$product->quantity}}">
                    </div>
                    <div class="col-sm-6 form-group mb-6">
                        <label>Unidad</label>
                        <select class="form-control" name="unit" >
                            <option value="1" @if($product->unit == 1) selected @endif>Unidad</option>
                            <option value="2" @if($product->unit == 2) selected @endif>Gramo</option>
                        </select>
                    </div>
                    <div class="col-sm-6 form-group mb-6">
                      <label>Valor</label>
                      <input class="form-control" type="number" placeholder="en gramos" name="value" value="{{$product->value}}">
                    </div>
                    <div class="col-sm-12 form-group mb-12">
                      <label>Descripcion</label>
                      <textarea class="form-control" name="details" > {{$product->description}}</textarea>
                    </div>
                    <div class="col-sm-6 form-group mb-6">
                      <label>Imagen</label>
                        <img src="{{$product->img}}" width="200">
                      <input type="file" name="img"   >
                    </div>

                </div>
            </div>
            <div class="ibox-footer">
                <button class="btn btn-info mr-2" type="submit">Editar</button>
                <a class="btn btn-danger" type="reset" href="{{route('products.show',['product',$product->id])}}">volver</a>
            </div>
        </form>
    </div>

@endsection

@section('css')

@endsection

@section('js')

@endsection
