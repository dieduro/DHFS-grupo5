<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Partido;

class PartidosController extends Controller
{
  public function index()
  {
    $partidos = Partido::all();
    $parametros = [
      "partidos" => $partidos,
    ];
    return view('partidos.index', $parametros);
  }

  public function create()
  {
    return view('partidos.crear');
  }

  public function store(Request $request)
  {
    $input = $request->except('_token');
    $rules = [
      "campo1" => "required",
      "campo2" => "required"
    ];

    $messages = [
      "required" => "El :attribute es obligatorio",
    ];

    $validator = Validator::make($input, $rules, $messages);
    $producto = Partido::create([
      'campo1' => $request->input('campo1'),
      'campo2' => $request->input('campo2')
    ]);
    return redirect('/partidos');
  }

  public function show($id)
  {
    $partido = Partido::find($id);
    $parametros = [
      'partido' => $partido,
    ]
    return view('partidos.partido', $parametros);
  }

  public function edit($id)
  {
    $partido = Partido::find($id);
    $parametros = [
      'partido' => $partido,
    ]
    return view('partidos.editar', $parametros);
  }

  public function update(Request $request, $id)
  {
    $partido = Partido::find($id);
    foreach ($request->except('_token') as $key => $value) {
      $partido->$key = $value;
    }

    $partido->save();
    $parametros = [
      'partido' => $partido,
    ]
    return view('partidos.partido', $parametros);
  }

  public function destroy($id)
  {
    $partido = Partido::find($id);
    $partido->delete();
    return redirect('/partidos');
  }
}
