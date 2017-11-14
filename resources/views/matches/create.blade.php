@extends('layouts.layout')

@section('title')
  TeamUp! - Nuevo Partido
@endsection

@section('content')



  <div class="container">
    <form class="" action="/partido/nuevo" method="post">
      {{ csrf_field() }}
      <div class="">
        <label for="sport">¿Qué deporte van a jugar?</label>
        <select class="select" name="sport" placeholder="Deporte">
          <option value="xDeporte">Deporte</option>
          <option value="baseball">Baseball</option>
          <option value="basket">Basket</option>
          <option value="floorball">Floorball</option>
          <option value="futbol">Futbol</option>
          <option value="futbolAme">Futbol Americano</option>
          <option value="handball">Handball</option>
          <option value="hockey">Hockey</option>
          <option value="padel">Padel</option>
          <option value="paintball">Paintball</option>
          <option value="polo">Polo</option>
          <option value="rugby">Rugby</option>
          <option value="softball">Softball</option>
          <option value="squash">Squash</option>
          <option value="tenis">Tenis</option>
          <option value="voley">Voley</option>
          <option value="waterpolo">Waterpolo</option>
        </select>
      </div>
      <div class="">
        <label for="">¿Cuántos jugadores necesitás?</label>
        <input type="number" name="nplayers" value="" min=1 max=30>
      </div>
      <div class="">
        <label for="">¿Cuándo se juega?</label>
        <input type="date" name="when" value="datetime">
      </div>
      <div class="">
        <label for="">¿Dónde se juega?</label>
        <input type="text" name="where" value="">
        {{--<input type="place" name="place" value=""> <!-- api google -->--}}
      </div>
      <div class="">
        <label for="">Descripción del Partido</label>

        <textarea name="description" rows="8" cols="80"></textarea>
      </div>
      <div class="">
        <button type="submit" name="button">Crear</button>

      </div>



    </form>
  </div>
@endsection
