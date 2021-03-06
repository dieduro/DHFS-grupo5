@extends('layouts.dashboardLayout')

@section('title')
  TeamUp! - Nuevo Partido
@endsection

@section('content')
  <div class="dashTitle"><h1 class="heading">Crear Partido</h1></div>
  <div class="create-match">
    <form class="form" action="/partidos/nuevo" method="post">
      {{ csrf_field() }}
      <div class="match-field {{ $errors->has('sport') ? ' has-error' : '' }}">
        <label for="sport" class="lbl-create">Deporte</label>
        <select class="select input-create" name="sport_id"  placeholder="Deporte" value="{{ old('sport_id')}}" autofocus >
          <option value="">Seleccionar</option>
          @foreach ($sports as $sport)
            <option value="{{ $sport->id }} ">{{ $sport->name }}</option>
          @endforeach
        </select>
        @if ($errors->has('sport'))
          <span class="errores">
            <strong>{{ $errors->first('sport') }}</strong>
          </span>
        @endif
      </div>

      <div class="match-field {{ $errors->has('nplayers') ? ' has-error' : '' }}">
        <label class="lbl-create" for="nplayers">¿Cuántos jugadores tenés?</label>
        {{--<input type="number" class="input-create hide" name="nplayers" id="" value="" min=1 max=30 placeholder="¿Cuántos jugadores tenés?">--}}
        <select class="input-create select" name="nplayers" id="in-nplayer" placeholder="Jugadores" value="{{ old('nplayers')}}" autofocus>
          @for ( $i = 0 ; $i <= 30 ; $i++)
            <option value="{{ $i }}">{{ $i }}</option>
          @endfor
        </select>
        @if ($errors->has('nplayers'))
          <span class="errores">
            <strong>{{ $errors->first('nplayers') }}</strong>
          </span>
        @endif
      </div>

      <div class="match-field {{ $errors->has('date') ? ' has-error' : '' }}">
        {{--  <input class="input-create select" type="datetime-local" name="date" value="datetime">  --}}
        <div class="date-cont">
          <label class="lbl-create" for="date">Fecha</label>
          <input  placeholder="Día" class="select" type="number" min="1" max="31" name="day">
          <input  placeholder="Mes" class="select" type="number" min="1" max="12" name="month">
          <input  placeholder="Año" class="select" type="number" min="2017" max="2021" name="year">
          <label class="lbl-create" for="time">Hora</label>  
          <input  placeholder="00" class="select" type="number" min="00" max="24" name="hour">
          <input  placeholder="00" class="select" type="number" min="00" max="59" name="minutes">
        </div>
      @if ($errors->has('date'))
        <span class="date">
          <strong>{{ $errors->first('date') }}</strong>
        </span>
      @endif
    </div>


    <div class="match-field {{ $errors->has('place') ? ' has-error' : '' }}">
    <input  class="input-create" type="text" id="autocomplete" placeholder="Ingresa la dirección del partido" >
    <div class="addressInfo" id="addressInfo">
    <input name="street_number" class="field" placeholder="Calle y Número" id="street_number" disabled="true" ></input>
    <input name="locality" class="field" placeholder="Barrio" id="sublocality_level_1" disabled="true"></input>
    <input name="city" class="field" placeholder="Ciudad" id="administrative_area_level_1" disabled="true"></input>
    <input name="country" class="field" placeholder="Pais" id="country" disabled="true"></input>
  </div>
  @if ($errors->has('place'))
  <span class="errores">
  <strong>{{ $errors->first('place') }}</strong>
</span>
@endif
</div>

<div class="match-field {{ $errors->has('comment') ? ' has-error' : '' }}">
  <label class="lbl-create" for="">Comentarios</label>
  <textarea name="comment" rows="8" cols="80"></textarea>
  @if ($errors->has('comment'))
    <span class="errores">
      <strong>{{ $errors->first('comment') }}</strong>
    </span>
  @endif
</div>

<div class="match-field">
  <button class="btn-solid-lg" type="submit" name="crear" id="crear">Crear</button>
</div>
<div class="match-field">
  <a class="btn-solid-lg" href="/partidos" role="button">Cancelar</a>
</div>
</form>
</div>


@endsection
