@extends('layouts.app')

@section('content')
<form class="form" action="{{route('orders.store')}}" method="POST">
    @csrf
    <div class="row ">
        <div class="col-md-12">
            <div class="form-group">
                <label>Usuario</label>
                <select class="form-control" name="user">
                    @foreach (App\Models\User\User::all() as $user)
                    <option value="{{$user->id}}">{{$user->full_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">

        @foreach ($products as $product)
        <div class="col-md-4">
            <div class="card card-air centered mb-4">
                <div class="rel">
                    <img class="card-img-top" src="{{$product->img}}" alt="image" >
                </div>
                <div class="card-body ">
                    <h5 class="card-title">{{$product->name}}</h5>
                <h6 class="card-subtitle mb-2 text-muted"><span class="text-{{$product->type['css']}}">{{$product->type['name']}}</span><span class="float-right">${{number_format($product->value, 0, ',', '.')}}<small>/{{$product->unit['singular']}}</small></span></h6>
                    <div class="form-group">
                    <input type="number" class="form-control input-quantity orderInput" min="0" name="{{$product->id}}" data-price="{{$product->value}}">
                    </div>
                    
                </div>
            </div>
        </div>
        @endforeach

    </div>

    <footer class="fixed-bottom text-center">
      <input hidden value="0" id="total_value" name="total">
    <div class="bg-primary">
        <button class="btn btn-primary btn-block btn-air" type="submit">ORDEN TOTAL: $<span id="order_price">0</span></button>
    </div>
    </footer>
</form>
@endsection

@section('css')

@endsection

@section('js')
  <script src="{{ asset('js/jquery.bootstrap-touchspin.js') }}" defer></script>

  <script defer>
    window.onload = function() {
      $( document ).ready(function() {
        $('.orderInput').bind('input', function() {
          var totalPoints = 0;
          var totalPrice = 0;
          $('.orderInput').each(function(){
            if($(this).val()=='')$(this).val(0);
                totalPoints = parseFloat($(this).val()) + totalPoints;
                totalPrice = parseFloat($(this).val())*$(this).data('price') + totalPrice;
          });

          $('#order_price').text(totalPrice);
          $('#total_value').val(totalPrice);
        });

      });
    };
  </script>
@endsection