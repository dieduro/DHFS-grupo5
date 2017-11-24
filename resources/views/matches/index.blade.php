@extends('layouts.layout')

@section('title')
  TeamUp! - Partidos
@endsection

@section('content')
  <div class="container section">
    <a href="/partidos/nuevo">Crear Partido</a>
  </div>
  <div class="container section">
    <table>
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
    </table>
  </div>
@endsection
