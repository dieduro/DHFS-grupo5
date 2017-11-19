@extends('layouts.layout')

@section('title')
  TeamUp! - Partidos
@endsection

@section('content')
  <div class="container caja">
    <a href="/partidos/nuevo">Crear Partido</a>
  </div>
  <div class="controls">
    <div class="control_left">
      <select>
        <option value="delete"><a href="#">Lote</a> </option>
        <option value="delete"><a href="#">Eliminar</a> </option>
      </select>
    </div>
    <div class="control_right">
      <select>
        <option value="delete"><a href="#">Ordenar</a></option>
        <option value="delete"><a href="#">Por Deporte</a></option>
        <option value="delete"><a href="#">Por Fecha</a></option>
        <option value="delete"><a href="#">Por Lugar</a></option>
      </select>
    </div>

  </div>
  <div class="container grid">
    <table>
      <tr>
        <th> <input type="checkbox" name="selectAll" value=""></th>
        <th>Deporte</th>
        <th>Lugar</th>
        <th>Fecha</th>
        <th>Jugadores Inscriptos</th>
        <th>Jugadores Totales</th>
        <th>Editar</th>
        <th>Eliminar</th>
      </tr>
      @foreach ($matches as $match)
        <tr>
          <td> <input type="checkbox" name="selectAll" value=""> </td>
          <td><a href="#">{{ $match->sport->name }}</a></td>
          <td><a href="#">{{ $match->date }}</a></td>
          <td><a href="#">{{ $match->place }}</a></td>
          <td><a href="#">{{ $match->nplayers }}</a></td>
          <td><a href="#">{{ $match->sport->players }}</a></td>
          <td><a href="#">{{ $match->description }}</a></td>
          <td> <a href="/partido/editar/{{$match->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
          <td><a href="/partido/eliminar/{{$match->id}}"><i class="fa fa-times" aria-hidden="true"></i></a></td>

        </tr>
      @endforeach
    </table>
  </div>
@endsection
