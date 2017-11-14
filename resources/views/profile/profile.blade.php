@extends('layouts.layout')

@section('content')

  <h2>{{ $user->name }}</h2>
  <h3>{{ $user->email }}</h3>

@endsection
