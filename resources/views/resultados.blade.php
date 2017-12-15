@extends ('layouts.layout')


@section('title')
  TeamUp!-Resultados
@endsection
@section('content')

  <div class="flexbox container">
    
   <div class="searchResults">
    <h1 class="heading">Resultados de la búsqueda</h1>
      <div class="matches-container">
      
      
        
      @if ($matches->count() == 0)
      <div>
          <h2>No hay partidos que coincidan con tu búsqueda por el momento.</h2>
          <h3>Aprovecha y <a href="{{ route('crearPartido') }}">creá uno!</a></h3>
        </div>

      @endif
      @foreach ($matches as $match)
          <div class="container-match">
            <a href="/partido_{{ $match->id }}"> </a>
            <div class="top"></div>
            <div class="overlay-match">
              <h3 class="sport-heading">{{ $match->sport->name }}</h3>
              {{-- <p class="creator"> {{ $match->user->username }} </p> --}}
              <p class="countMobile">{{ $match->nplayers }}/{{ $match->sport->players }}</p>
              <div class="nplayers-container countDesktop">
                <span class="hay-nplayers">{{ $match->nplayers }}</span>
                <svg class="divisor"  viewBox="0 0 80 120"
                xmlns="http://www.w3.org/2000/svg">
                <line x1="90" y1="10" x2="50" y2="90"
                stroke-width="2" stroke="black"/>
              </svg>
              <span class="total-nplayers">{{ $match->sport->players }}</span>
            </div>
            <div class= "info-match">
              <p>{{ $match->date }}</p>
              <p>{{ $match->place }}</p>
            </div>
            <div class="picContainer">
              <div class="fondo">
                <img  class="userPic" src="{{ asset('storage/'. $match->user->photo) }}" alt="">
              </div>
            </div>
            <a href='/partido_{{ $match->id }}'>
              <div class="plus">
                <p>+</p>
              </div>
            </a>
          </div>
          <div class="bottom" style="background-image: url({{ asset( $match->photo ) }})">
            <div class="views-likes">
              <i class="fa fa-eye"  aria-hidden="true"></i>
              <p class="social-counter">25</p>
              <i class="fa fa-heart" style="color:white" aria-hidden="true"></i>
              <p class="social-counter">6</p>
            </div>
              {{--  <div>
              <img class="sport-img" src="{{ asset( $match->photo ) }}" alt="">
              </div>  --}}
          </div>
      </div>
    @endforeach
      </div> 
    </div>
    <div class=" caja">
        <div class="con_fb">
          <a class="btn-solid-lg" href="{{ route('login') }}" role="button">Ingresá con Facebook</a>
          <hr>
        </div>
        <form class="form" method="POST" id="login" action="{{ route('login') }}">
          {{ csrf_field() }}
          <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
            <input class="field" type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}"autofocus>
            @if ($errors->has('email'))
            <span class="errores">
              <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
          </div>
          <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
            <input class="field" type="password" name="password" id="password" placeholder="Contraseña" >
          @if ($errors->has('password'))
            <span class="errores">
              <strong>{{ $errors->first('password') }}</strong>
            </span>
          @endif
        </div>
        <div class="recordarme">
          <input type="checkbox" value="recordame" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordame
        </div>
        <button class="btn-solid-lg" type="submit" name="iniciarSesion" id="iniciarSesion">INICIAR SESIÓN
        </button>
      </form>
      <div class="linkeo">
          <h6><a href="{{ route('password.request') }}">¿Olvidaste tu nombre de usuario o contraseña?</a></h6>
          <br>
          <h6>¿No tenés cuenta? <a href="{{ route('login') }}">Registrate</a></h6>
      </div>
      <div class="legals">
          <hr>
          <h6>Si hacés click en "INGRESÁ CON FACEBOOK" y no sos usuario de TEAMUP!, quedarás registrado y aceptarás los  <a href="/ttos">Términos y Condiciones</a> y <a href="/privacyPolicy"> Política de Privacidad</a> de TEAMUP!</h6>
      </div>
    </div>
  </div>  
@endsection