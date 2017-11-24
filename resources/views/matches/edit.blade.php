@extends('layouts.layout')

@section('title')
  TeamUp! - Editar Partido
@endsection

@section('content')
  <div class="container">
    <form class="" action="/partido/update/{{ $match->id }}" method="post">
      {{ csrf_field() }}
      {{ method_field('patch') }}
      <div class="{{ $errors->has('nplayers') ? ' has-error' : '' }}">
        <label for="nplayers">Cantidad de jugadores que tenés</label>
        <input type="number" name="nplayers" value="{{ $match->nplayers }}" placeholder="{{ $match->nplayers }}" min=1 max=30>
        @if ($errors->has('nplayers'))
          <span class="nplayers">
            <strong>{{ $errors->first('nplayers') }}</strong>
          </span>
        @endif
      </div>
      <div class="{{ $errors->has('date') ? ' has-error' : '' }}">
        <label for="date">Fecha</label>
        <input type="datetime-local" name="date" placeholder="{{ $match->date }}" value="{{ $match->date }}">
        @if ($errors->has('date'))
          <span class="date">
            <strong>{{ $errors->first('date') }}</strong>
          </span>
        @endif
      </div>
      <div class="{{ $errors->has('place') ? ' has-error' : '' }}">
        <label for="">Lugar</label>
        <input type="text" name="place" placeholder="{{ $match->place }}" value="{{ $match->place }}" >
        {{--<input type="place" name="place" value=""> <!-- api google -->--}}
        @if ($errors->has('place'))
          <span class="place">
            <strong>{{ $errors->first('place') }}</strong>
          </span>
        @endif
      </div>
      <div class="{{ $errors->has('comment') ? ' has-error' : '' }}">
        <label for="">Comentarios</label>
        <textarea name="comment" rows="8" cols="80" placeholder="{{ $match->comment }}" value="{{ $match->comment }}">{{ $match->comment }}</textarea>
        @if ($errors->has('comment'))
          <span class="comment">
            <strong>{{ $errors->first('comment') }}</strong>
          </span>
        @endif
      </div>
      <div class="">
        <button class="btn-solid-lg" type="submit" name="crear" id="Crear">Editar</butto>
      </div>
      <div class="">
        <a class="btn-solid-lg" href="/partidos" role="button">Cancelar</a>
      </div>
    </form>
  </div>
@endsection
