@extends('layouts.layout')

@section('title')
  TeamUp! - Perfil
@endsection

@section('content')
  <div class="container">
    <div class="left-nav">
      <div class="buscar">
        <input type="text" name="buscar" value="Buscar">
      </div>
      <ul>
        <li class="main-item">> PARTIDOS</li>
        <ul class="dropdown">
          <a href="/partidos/nuevo"><li>Crear Partido</li></a>
          <a href="/partidos"><li>Mis Partidos</li></a>
          <a href="#"><li>Buscar</li></a>
          <a href="#"><li>Me interesan</li></a>
        </ul>
        <li class="main-item">> MI CUENTA</li>
        <ul class="dropdown">
          <a href="/{{ Auth::user()->username }}/editar"><li>Editar Perfil</li></a>
          <a href="/{{Auth::user()->username }}/eliminar"></a>
        </ul>
      </ul>
    </div>
    <div class="wrapper">
      {{-- @foreach ($matches as $match)
        <div class="match">

        </div>
      @endforeach --}}
    </div>
  </div>
@endsection
