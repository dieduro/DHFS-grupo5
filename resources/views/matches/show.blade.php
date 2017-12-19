@extends('layouts.dashboardLayout')

@section('title')
  TeamUp! - Partido
@endsection

@section('content')
<div class="">
<div class="dashTitle"><h1 class="heading">Partido Seleccionado</h1></div>
 
  <div class="matchData">
  </div>
    <ul>
        <li>{{$match->id}}</li>
        <li>{{$match->sport_id}}</li>
        <li>{{$match->date}}</li>
        <li>{{$match->time}}</li>
        <li>{{$match->name}}</li>
        <li>{{$match->stree_number}}</li>
        <li>{{$match->locality}}</li>
        <li>{{$match->city}}</li>
        <li>{{$match->country}}</li>
        <li>{{$match->nplayers}}</li>
        <li>{{$match->comment}}</li>
        <li>{{$match->photo}}</li>
        <li>{{$match->user_id}}</li>
    </ul>
  </div>
@endsection