@extends('layouts.layout')

@section('title')
  TeamUp! - Nuevo Partido
@endsection

@section('content')
  <div class="container">
    <form class="" action="/partidos/nuevo" method="post">
      {{ csrf_field() }}
      <div class="{{ $errors->has('sport') ? ' has-error' : '' }}">
        <label for="sport">Deporte</label>
        <select class="select" name="sport_id" placeholder="Deporte" autofocus >
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
      <div class="{{ $errors->has('nplayers') ? ' has-error' : '' }}">
        <label for="nplayers">Cantidad de jugadores que tenés</label>
        <input type="number" name="nplayers" value="" min=1 max=30>
        @if ($errors->has('nplayers'))
          <span class="nplayers">
            <strong>{{ $errors->first('nplayers') }}</strong>
          </span>
        @endif
      </div>
      <div class="{{ $errors->has('date') ? ' has-error' : '' }}">
        <label for="date">Fecha</label>
        <input type="datetime-local" name="date" value="datetime">
        @if ($errors->has('date'))
          <span class="date">
            <strong>{{ $errors->first('date') }}</strong>
          </span>
        @endif
      </div>
      <div class="{{ $errors->has('place') ? ' has-error' : '' }}">
        <label for="">Lugar</label>
        <input type="text" name="place" value="">
        {{--<input type="place" name="place" value=""> <!-- api google -->--}}
        @if ($errors->has('place'))
          <span class="place">
            <strong>{{ $errors->first('place') }}</strong>
          </span>
        @endif
      </div>
      <div class="{{ $errors->has('comment') ? ' has-error' : '' }}">
        <label for="">Comentarios</label>
        <textarea name="comment" rows="8" cols="80"></textarea>
        @if ($errors->has('comment'))
          <span class="comment">
            <strong>{{ $errors->first('comment') }}</strong>
          </span>
        @endif
      </div>
      <div class="">
        <button class="btn-solid-lg" type="submit" name="crear" id="Crear">Crear</butto>
      </div>
      <div class="">
        <a class="btn-solid-lg" href="/partidos" role="button">Cancelar</a>
      </div>
    </form>
  </div>
@endsection
