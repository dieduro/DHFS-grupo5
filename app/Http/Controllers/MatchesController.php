<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Match;

class MatchesController extends Controller
{
  public function index()
  {
    $partidos = Match::all();
    $param = [
      "partidos" => $partidos,
    ];
    return view('partidos.index', $param);
  }

  public function create()
  {
    return view('matches.create');
  }

  public function store(Request $request)
  {
    $rules = [
      'sport' => 'required',
      'when' => 'required',
      'where' => 'required',
      'nplayer' => 'required',
      'description' => 'required'
    ];

    $messages = [
      "required" => "El campo es obligatorio",
    ];

    $request->validate($rules, $messages);
    $match = Match::create([
      'sport' => $request->input('sport'),
      'when' => $request->input('when'),
      'where' => $request->input('where'),
      'nplayer' => $request->input('nplayer'),
      'description' => $request->input('description')
    ]);
    return redirect('/partidos');
  }

  public function show($id)
  {
    $match = Match::find($id);
    $param = [
      'match' => $match,
    ];
    return view('matches.match', $param);
  }

  public function edit($id)
  {
    $match = Match::find($id);
    $param = [
      'match' => $match,
    ];
    return view('matches.edit', $param);
  }

  public function update(Request $request, $id)
  {
    $match = Match::find($id);
    foreach ($request->except('_token') as $key => $value) {
      $match->$key = $value;
  }
    $match->save();
    $param = [
      'match' => $match,
    ];
    return view('matches.match', $param);
  }

  public function destroy($id)
  {
    $match = Match::find($id);
    $match->delete();
    return redirect('/partido');
  }
}
