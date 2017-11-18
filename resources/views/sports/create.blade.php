@extends('layouts.layout')

@section('title')
  TeamUp! - Nuevo Deporte
@endsection

@section('content')
  <div class="container">
    <form class="" action="/deportes/nuevo" method="post">
      {{ csrf_field() }}
      <input type="text" name="name" placeholder="Nombre">
      <input type="text" name="players" placeholder="Cantidad de Jugadores">
      <button class="btn-solid-lg" type="submit" name="crear" id="Crear">Crear</button>
    </form>
  </div>
@endsection
