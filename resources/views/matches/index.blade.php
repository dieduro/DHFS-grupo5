@extends('layouts.dashboardLayout')

@section('title')
  TeamUp! - Partido
@endsection

@section('content')
  <div class="container section">
    <div class="controls">
      <a href="/partidos_orderByDate">Ordenar por Fecha</a>
    </div>

    <div class="matches-container">
      {{--PARTIDO--}}
        <div class="container-match">
          <div class="top"></div>
          <div class="overlay-match">
            <h3 class="sport-heading">{{ $match->sport->name }}</h3>
            <p class="countMobile">{{ $match->nplayers }}/{{ $match->sport->players }}</p>
            <div class="nplayers-container countDesktop">
              <span class="hay-nplayers">{{ $match->nplayers }}</span>
              <svg class="divisor"  viewBox="0 0 80 120"
              xmlns="http://www.w3.org/2000/svg">
              <line x1="90" y1="10" x2="50" y2="90"
              stroke-width="2" stroke="black"/>
            </svg>
            <span class="total-nplayers">{{ $match->sport->players }}</span>
          </div>
          <div class= "info-match">
            <p>{{ $match->date }}</p>
            <p>{{ $match->place }}</p>
          </div>
          <div class="picContainer">
            <div class="fondo">
              <img  class="userPic" src="{{ asset('storage/'. Auth::user()->photo) }}" alt="">
            </div>
          </div>
        </div>
        <div class="bottom">
          <div class="views-likes">
            <i class="fa fa-eye"  aria-hidden="true"></i>
            <p class="social-counter">25</p>
            <i class="fa fa-heart" style="color:white" aria-hidden="true"></i>
            <p class="social-counter">6</p>
          </div>
          <div >
            <img class="sport-img" src="{{ asset( $match->photo ) }}" alt="">
          </div>
        </div>
      </div>
    <!-- fin partido -->
  </div>



  {{--<table>
  <tr>
  <th><input type="checkbox" name="selectAll" id="selectAll"></th>
  <th>Deporte</th>
  <th>Fecha</th>
  <th>Lugar</th>
  <th>Jugadores</th>
  <th>Comentarios</th>
  <th>Foto</th>
  <th>Editar</th>
  <th>Eliminar</th>
</tr>
@foreach ($matches as $match)
<tr>
<td> <input type="checkbox" name="selectAll" class="select"> </td>
<td>{{ $match->sport->name }}</td>
<td>{{ $match->date }}</td>
<td>{{ $match->place }}</td>
<td>{{ $match->nplayers }} / <span style="color: #f3a530">{{ $match->sport->players }}</span></td>
<td>{{ $match->comment }}</td>
<td>{{ $match->photo }}</td>
<td><a href="/partido/editar/{{$match->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
<td><a href="/partido/eliminar/{{$match->id}}"><i class="fa fa-times" aria-hidden="true"></i></a></td>
</tr>
@endforeach
</table>--}}
</div>
@endsection
