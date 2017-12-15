@extends('layouts.dashboardLayout')

@section('title')
  TeamUp! - Perfil
@endsection

@section('content')
<div class="profile">
<div class="dashTitle"><h1>Perfil del Usuario</h1></div>
  <img class="bigPic" src="{{ asset('storage/'. Auth::user()->photo) }}" alt="">

  <div class="userData">
    <span>Hola {{Auth::user()->username}}!</span>
  </div>
</div>

@endsection