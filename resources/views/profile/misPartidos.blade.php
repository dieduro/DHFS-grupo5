@extends('layouts.dashboardLayout')

@section('title')
  TeamUp! - Mis Partidos
@endsection

@section('content')

  <!-- partidos -->
    <div class="dashTitle"><h1>Mis Partidos</h1></div>
    <div class="controls">
      <a href="/partidos_orderByDate">Ordenar por Fecha</a>
    </div>

    <div class="matches-container">
      {{--PARTIDO #--}}
      @foreach ($matches as $match)
        <div class="container-match">
          <a href="/partido_{{ $match->id }}"></a>
          <div class="top"></div>
          <div class="overlay-match">
            <h3 class="sport-heading">{{ $match->sport->name }}</h3>
            {{-- <p class="creator"> {{ $match->user->username }} </p> --}}
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
             <p>{{ "$match->locality, $match->city" }}</p>
          </div>
          <div class="picContainer">
            <div class="fondo">
              <img  class="userPic" src="{{ asset('storage/'. $match->user->photo) }}" alt="">
            </div>
          </div>
          <a href='/partido_{{ $match->id }}'>
            <div class="plus">
              <p>+</p>
            </div>
          </a>
        </div>
        <div class="bottom" style="background-image: url({{ asset( $match->photo ) }})">
          <div class="views-likes">
            <i class="fa fa-eye"  aria-hidden="true"></i>
            <p class="social-counter">25</p>
            <i class="fa fa-heart" style="color:white" aria-hidden="true"></i>
            <p class="social-counter">6</p>
          </div>
          {{--  <div >
            <img class="sport-img" src="{{ asset( $match->photo ) }}" alt="">
          </div>  --}}
        </div>
      
    </div>
  @endforeach
  <!-- fin partido -->
</div>
<!-- partidos -->
@endsection
