@extends('layouts.layout')

@section('title')
  TeamUp! - Nuevo Partido
@endsection

@section('content')
  <div class="container caja">
    <form class="" action="/partidos/nuevo" method="post">
      {{ csrf_field() }}
      <div class="match-field {{ $errors->has('sport') ? ' has-error' : '' }}">
        <label for="sport" class="hide">Deporte</label>
        <select class="select" name="sport_id" id="in-sport" placeholder="Deporte" autofocus >
          <option value="">Deporte</option>
          @foreach ($sports as $sport)
            <option value="{{ $sport->id }} ">{{ $sport->name }}</option>
          @endforeach
        </select>
        @if ($errors->has('sport'))
          <span class="sport">
            <strong>{{ $errors->first('sport') }}</strong>
          </span>
        @endif
      </div>
      <div class="match-field {{ $errors->has('nplayers') ? ' has-error' : '' }}">
        <label class="" for="nplayers">¿Cuántos jugadores tenés?</label>
        <input type="number" class="hide" name="nplayers" id="in-nplayer" value="" min=1 max=30 placeholder="¿Cuántos jugadores tenés?">
        <select class="select" name="nplayers_id" id="in-nplayer" placeholder="Deporte" autofocus >
          <option value="">0</option>
          @for ($i=1;$i<=30;$i++)
            <option value="{{$i}}">{{ $i }}</option>
          @endfor
        </select>
        @if ($errors->has('nplayers'))
          <span class="nplayers">
            <strong>{{ $errors->first('nplayers') }}</strong>
          </span>
        @endif
      </div>
      <div class="match-field {{ $errors->has('date') ? ' has-error' : '' }}">
        <label for="date">Fecha</label>
        <input type="datetime-local" name="date" value="datetime">
        @if ($errors->has('date'))
          <span class="date">
            <strong>{{ $errors->first('date') }}</strong>
          </span>
        @endif
      </div>
      <div class="match-field {{ $errors->has('place') ? ' has-error' : '' }}">
        <label for="" class="hide">Lugar</label>
        <input type="text" name="place" value="" placeholder="¿Dónde se juega?">
        {{--<input type="place" name="place"  value=""> <!-- api google -->--}}
        @if ($errors->has('place'))
          <span class="place">
            <strong>{{ $errors->first('place') }}</strong>
          </span>
        @endif
      </div>
      <div class="match-field {{ $errors->has('comment') ? ' has-error' : '' }}">
        <label for="">Comentarios</label>
        <textarea name="comment" rows="8" cols="80"></textarea>
        @if ($errors->has('comment'))
          <span class="comment">
            <strong>{{ $errors->first('comment') }}</strong>
          </span>
        @endif
      </div>
      <div class="match-field">
        <button class="btn-solid-lg" type="submit" name="crear" id="Crear">Crear</butto>
      </div>
      <div class="match-field">
        <a class="btn-solid-lg" href="/partidos" role="button">Cancelar</a>
      </div>
    </form>
  </div>
@endsection
