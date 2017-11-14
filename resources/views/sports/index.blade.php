@extends('layouts.layout')

@section('title')
  TeamUp! - Deportes
@endsection

@section('content')
  <div class="container">
    <ul>
      <a href="/deportes/nuevo"><li>Nuevo Deporte</li></a>
    </ul>
    <ul>
      @foreach ($sports as $sport)
        <a href="#"><li>{{ $sport->name }}</li></a> 
      @endforeach
    </ul>
  </div>
@endsection
