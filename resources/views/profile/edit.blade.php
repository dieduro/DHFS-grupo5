@extends('layouts.layout')

@section('title')
  TeamUp! - Editar Perfil
@endsection

@section('content')

{{-- {{ dd( $user )}} --}}
  <div class="container caja">

    <div class="section_tit">
      <h3>Actualizar Datos de Perfil</h3>
    </div>
    <form class="form" method="POST" action="/{{ Auth::user()->username }}/editar" enctype="multipart/form-data" >
      {{ csrf_field() }}
      {{ method_field('patch') }}
      <div class="{{ $errors->has('first_name') ? ' has-error' : '' }}">
        <label for="first_name">Nombre</label>
        <input class="field" id="first_name" type="text" name="first_name" placeholder="{{ Auth::user()->first_name }}" value="{{ old('first_name') }}">
        @if ($errors->has('first_name'))
          <span class="errores">
            <strong>{{ $errors->first('first_name') }}</strong>
          </span>
        @endif
      </div>
      <div class="{{ $errors->has('last_name') ? ' has-error' : '' }}">
        <label for="last_name">Apellido</label>
        <input class="field" id="last_name" type="text" name="last_name" placeholder="{{ Auth::user()->last_name }}" value="{{ old('last_name') }}">
        @if ($errors->has('last_name'))
          <span class="errores">
            <strong>{{ $errors->first('last_name') }}</strong>
          </span>
        @endif
      </div>
      <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email">Email</label>
        <input class="field" id="email" type="email" name="email" placeholder="{{ Auth::user()->email }}" value="{{ old('email') }}">
        @if ($errors->has('email'))
          <span class="errores">
            <strong>{{ $errors->first('email') }}</strong>
          </span>
        @endif
      </div>
      <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password">Contraseña</label>
        <input class="field" id="password" type="password" name="password" >
        @if ($errors->has('password'))
          <span class="errores">
            <strong>{{ $errors->first('password') }}</strong>
          </span>
        @endif
      </div>
      <div class="">
        <label for="password-confirm">Confirmar Contraseña</label>
        <input class="field" id="password-confirm" type="password" name="password_confirmation" >
      </div>
      <div>
        <div class="file_div">
          <label for="upload-photo">
            {{-- <img class="profile_icon" src="{{asset('storage\images\users_img\userDefault.png')}}" alt="Subí tu foto de perfil"> --}}
            <span class="btn-solid-sm btn_upload">ACTUALIZÁ TU FOTO</span></label>
          <input type="file" name="photo" id="upload-photo" />
        </div>
        {{-- <div class="">
          <label for="password-confirm">Actualizar foto de Perfil</label>
          <input type="file" name="photo" value="{{ Auth::user()->photo }}">
        </div> --}}
        <button class="btn-solid-lg" type="submit" name="button" id="register">Actualizar</button>
      </form>
    </div>
  @endsection
