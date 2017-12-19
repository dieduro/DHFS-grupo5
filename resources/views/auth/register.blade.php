@extends('layouts.layout')

@section('title')
  TeamUp! - Registro
@endsection

@section('content')
  <div class="register_img">
    <div class="container caja">
      <div class="con_fb">
        <a class="btn-solid-lg" href="{{ route('register') }}" role="button">Registrate con Facebook</a>
        <hr>
      </div>
      <form class="form" method="POST" action="{{ route('register') }}" enctype="multipart/form-data" id="register">
        {{ csrf_field() }}
        <div class="username{{ $errors->has('username') ? ' has-error' : '' }}">
          <input class="field" id="username" type="text" placeholder="Nombre de Usuario" name="username" value="{{ old('username') }}" >
          @if ($errors->has('username'))
            <span class="errores">
              <strong>{{ $errors->first('username') }}</strong>
            </span>
          @endif
        </div>
        <div class="email{{ $errors->has('email') ? ' has-error' : '' }}">
          <input class="field" id="email" type="email" name="email" placeholder="Email" value="{{ old('email') }}">
          @if ($errors->has('email'))
            <span class="errores">
              <strong>{{ $errors->first('email') }}</strong>
            </span>
          @endif
        </div>
        <div class="password{{ $errors->has('password') ? ' has-error' : '' }}">
          <input class="field" id="password" type="password" name="password" placeholder="Contraseña" >
          @if ($errors->has('password'))
            <span class="errores">
              <strong>{{ $errors->first('password') }}</strong>
            </span>
          @endif
        </div>
        <div class="cpassword">
          <input class="field" id="cpassword" type="password" placeholder="Repetir Contraseña" name="password_confirmation" >
        </div>
       
      <div class="legals {{ $errors->has('legals') ? ' has-error' : '' }}">
        <input type="checkbox" name="legals" value="1" id="legals" >
        <h6 style="color:#555555">Acepto los Términos y Condiciones del servicio.</h6>
        @if ($errors->has('legals'))
          <span class="errores">
            <strong>{{ $errors->first('legals') }}</strong>
          </span>
        @endif
      </div>
      <div class="legals2">
        <hr>
        <h6>Si hacés click en "REGISTRATE CON FACEBOOK" aceptarás los <a href="#">Términos y Condiciones</a> y <a href="#">Política de Privacidad</a> de TEAMup! </h6>
      </div>
      <button class="btn-solid-lg" type="submit" name="button" id="registerBtn">REGISTRARME</button>
    </form>
    <div class="linkeo">
      <h6>¿Ya tienes cuenta? <a href="{{ route('login') }}" >Iniciá Sesión</a></h6>
    </div>
  </div>
</div>
</div>
@endsection
