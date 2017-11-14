@extends('layouts.layout')

@section('title')
  TeamUp! - Registro
@endsection

@section('content')
  <div class="register_img">
    <div class="container caja">
      <div class="con_fb">
        <a class="btn-solid-lg" href="/registro" role="button">Registrate con Facebook</a>
        <hr>
      </div>
      <form class="form" method="POST" action="{{ route('register') }}" enctype="multipart/form-data" id="registro">
        {{ csrf_field() }}
        <div class="{{ $errors->has('name') ? ' has-error' : '' }}">
          <input id="name" type="text" placeholder="Nombre y Apellido" name="name" value="{{ old('name') }}"  required autofocus>
          @if ($errors->has('name'))
            <span class="help-block">
              <strong>{{ $errors->first('name') }}</strong>
            </span>
          @endif
        </div>
        <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
          <input id="email" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
          @if ($errors->has('email'))
            <span class="help-block">
              <strong>{{ $errors->first('email') }}</strong>
            </span>
          @endif
        </div>
        <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
          <input id="password" type="password" name="password" placeholder="Contraseña" required>
          @if ($errors->has('password'))
            <span class="help-block">
              <strong>{{ $errors->first('password') }}</strong>
            </span>
          @endif
        </div>
        <div class="">
          <input id="password-confirm" type="password" placeholder="Repetir Contraseña" name="password_confirmation" required>
        </div>
        
        <div class="legals">
          <input type="checkbox" name="legals" value="" required>
          <h6 style="color:#555555">Acepto los Términos y Condiciones de servicio.</h6>
          <hr>
          <h6>Si hacés click en "Registrarme" aceptarás los <a href="/ttos">Términos y Condiciones</a> y <a href="/privacyPolicy">Política de Privacidad</a> de TEAMup!</h6>
        </div>
        <button class="btn-solid-lg" type="submit" name="button" id="register">REGISTRARME</button>
      </form>
      <div class="linkeo">
      <h6>¿Ya tienes cuenta? <a href="login.php">Inicia Sesión</a></h6>
    </div>
  </div>
</div>
@endsection
