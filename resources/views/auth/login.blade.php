@extends('layouts.layout')

@section('title')
  TeamUp! - Login
@endsection

@section('content')

  <div class="login_img">
    <div class="container caja">
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
        <h6><a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a></h6>
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
