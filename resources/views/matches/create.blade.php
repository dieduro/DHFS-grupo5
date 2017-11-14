@extends('layouts.layout')

@section('title')
  TeamUp! - Nuevo Partido
@endsection

@section('content')
  <div class="container">
    <form class="" action="/" method="post">
      <input type="text" name="name" value="name">
      <input type="date" name="datetime" value="datetime">
      <input type="place" name="place" value="place"> <!-- api google -->
    </form>
  </div>
@endsection
