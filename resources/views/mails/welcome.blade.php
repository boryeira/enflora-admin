<div class="text-center">
  <img src="{{asset('img/enflora.png')}}" width="300"/>
  <h3>Bienvenido <strong>{{$user->full_name}}</strong></h3>
  <p>
    Has sido seleccionado para ser miembro del club enFlora!.
  </p>

    Ingresa en <a class="btn btn-primary btn-block" href="https://socios.enfloraclub.cl/login">socios.enfloraclub.cl</a>
  <p>
    Activa tu membresía con las siguientes credenciales.<br /><br />

    Usuario: {{$user->email}}<br />
    Contraseña: {{$user->provisional}}
  </p>
  <p> Se solicitara cambiar de contraseña una vez ingresado</p>

</div>
