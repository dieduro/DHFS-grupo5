@extends('layouts.layout')

@section('title')
  TeamUp! - Nuevo Partido
@endsection

@section('content')
  <div class="container">
    <form class="" action="/partido/editar/{id}" method="post">
      {{ csrf_field() }}

      <div class="{{ $errors->has('nplayers') ? ' has-error' : '' }}">
        <label for="nplayers">¿Cuántos jugadores necesitás?</label>
        <input type="number" name="nplayers" value="" placeholder="{{ $match->nplayers }}" min=1 max=30>
        @if ($errors->has('nplayers'))
          <span class="nplayers">
            <strong>{{ $errors->first('nplayers') }}</strong>
          </span>
        @endif
      </div>
      <div class="{{ $errors->has('date') ? ' has-error' : '' }}">
        <label for="date">¿Cuándo se juega?</label>
        <input type="datetime-local" name="date" placeholder="{{ $match->date }}">
        @if ($errors->has('date'))
          <span class="date">
            <strong>{{ $errors->first('date') }}</strong>
          </span>
        @endif
      </div>
      <div class="{{ $errors->has('place') ? ' has-error' : '' }}">
        <label for="">¿Dónde se juega?</label>
        <input type="text" name="place" placeholder="{{ $match->place }}" >
        {{--<input type="place" name="place" value=""> <!-- api google -->--}}
        @if ($errors->has('place'))
          <span class="place">
            <strong>{{ $errors->first('place') }}</strong>
          </span>
        @endif
      </div>
      <div class="{{ $errors->has('description') ? ' has-error' : '' }}">
        <label for="">Descripción del Partido</label>
        <textarea name="description" rows="8" cols="80" placeholder="{{ $match->description }}"></textarea>
        @if ($errors->has('description'))
          <span class="description">
            <strong>{{ $errors->first('description') }}</strong>
          </span>
        @endif
      </div>
      <div class="">
        <button class="btn-solid-lg" type="submit" name="crear" id="Crear">Editar</butto>
      </div>
      <div class="">
        <a class="btn-solid" href="/partidos" role="button">Cancelar</a>
      </div>
    </form>
  </div>
@endsection
