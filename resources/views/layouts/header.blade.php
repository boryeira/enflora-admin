<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <img src="{{asset('img/enflora.png')}}" width="120" style="margin-right:20px"/>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor03">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
        <a class="nav-link" href="{{url('/')}}">Inicio</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('orders.index')}}">Ordenes</a>
          </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('products.index')}}">Productos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('users.index')}}">Usuarios</a>
        </li>
      </ul>

    </div>
  </nav>