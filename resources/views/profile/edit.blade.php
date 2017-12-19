@extends('layouts.dashboardLayout')

@section('title')
  TeamUp! - Editar Perfil
@endsection

@section('content')

{{-- {{ dd( $user )}} --}}

    <div class="dashTitle"><h1 class="heading">Editar Perfil</h1></div>
    <div class="create-match">

      <div class="info">
        <h3>Completá tu perfil</h3>
        <p>Con un perfil completo los partidos que creás tienen más relevancia y vas a generar aceptación inmediata en los partido a los que te anotes!</p>
      </div> 
    
    <form class="form-editUser" method="POST" action="/{{ Auth::user()->username }}/editar" enctype="multipart/form-data" >
      {{ csrf_field() }}
      {{ method_field('patch') }}

      <div class="file_div">
        <label for="upload-photo"><img class="profile_icon" src="{{asset('storage\images\users_img\userDefault.png')}}" alt="Subí tu foto de perfil"><span class="btn-solid-sm btn_upload">SUBI TU FOTO</span></label>
        <input type="file" name="photo" id="upload-photo" />
      </div>

 

      <div class="{{ $errors->has('first_name') ? ' has-error' : '' }}">
        <label for="first_name">Nombre</label>
        <input class="field-edit" id="first_name" type="text" name="first_name" placeholder="{{ Auth::user()->first_name }}" value="{{ old('first_name') }}">
        @if ($errors->has('first_name'))
          <span class="errores">
            <strong>{{ $errors->first('first_name') }}</strong>
          </span>
        @endif
      </div>
      <div class="{{ $errors->has('last_name') ? ' has-error' : '' }}">
        <label for="last_name">Apellido</label>
        <input class="field-edit" id="last_name" type="text" name="last_name" placeholder="{{ Auth::user()->last_name }}" value="{{ old('last_name') }}">
        @if ($errors->has('last_name'))
          <span class="errores">
            <strong>{{ $errors->first('last_name') }}</strong>
          </span>
        @endif
      </div>
      <div class="{{ $errors->has('last_name') ? ' has-error' : '' }}">
        <label for="location">Ubicacion</label>
        <input class="field-edit" id="autocomplete" type="text" name="location" placeholder="{{ Auth::user()->location }}" value="{{ old('last_name') }}">
        <div class="addressInfo" id="addressInfo">
          <input name="city" class="field" placeholder="Ciudad" id="administrative_area_level_1" disabled="true"></input>
          <input name="country" class="field" placeholder="Pais" id="country" disabled="true"></input>
       </div>
        @if ($errors->has('location'))
          <span class="errores">
            <strong>{{ $errors->first('location') }}</strong>
          </span>
        @endif
      </div>
      <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email">Email</label>
        <input class="field-edit" id="email" type="email" name="email" placeholder="{{ Auth::user()->email }}" value="{{ old('email') }}">
        @if ($errors->has('email'))
          <span class="errores">
            <strong>{{ $errors->first('email') }}</strong>
          </span>
        @endif
      </div>
      <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password">Contraseña</label>
        <input class="field-edit" id="password" type="password" name="password" >
        @if ($errors->has('password'))
          <span class="errores">
            <strong>{{ $errors->first('password') }}</strong>
          </span>
        @endif
      </div>
      <div class="">
        <label for="password-confirm">Confirmar Contraseña</label>
        <input class="field-edit" id="password-confirm" type="password" name="password_confirmation" >
      </div>
      <div>
        
        <button class="btn-solid-lg" type="submit" name="button" id="update">Actualizar</button>
      </form>
    </div>
  </div>
  @endsection

   