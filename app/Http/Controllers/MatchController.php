<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Match;

class MatchController extends Controller
{
  public function index()
  {
    $partidos = Match::all();
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
      'name' => $request->input('name'),
      'datetime' => $request->input('datetime'),
      'place' => $request->input('place')
    ];

    $messages = [
      "required" => "El :attribute es obligatorio",
    ];

    $validator = Validator::make($input, $rules, $messages);
    $partido = Match::create([
      'name' => $request->input('name'),
      'datetime' => $request->input('datetime'),
      'place' => $request->input('place')
    ]);
    return redirect('/partidos');
  }

  public function show($id)
  {
    $match = Match::find($id);
    $parametros = [
      'match' => $match,
    ]
    return view('matches.match', $parametros);
  }

  public function edit($id)
  {
    $match = Match::find($id);
    $parametros = [
      'match' => $match,
    ]
    return view('matches.edit', $parametros);
  }

  public function update(Request $request, $id)
  {
    $match = Match::find($id);
    foreach ($request->except('_token') as $key => $value) {
      $match->$key = $value;
  }

    $match->save();
    $parametros = [
      'match' => $match,
    ]
    return view('matches.match', $parametros);
  }

  public function destroy($id)
  {
    $match = Match::find($id);
    $match->delete();
    return redirect('/partido');
  }
}
