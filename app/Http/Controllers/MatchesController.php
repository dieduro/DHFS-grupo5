<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Match;
use \App\Sport;

class MatchesController extends Controller
{
  public function index()
  {
    $matches = Match::all();
    $param = [
      "matches" => $matches
    ];
    return view('matches.index', $param);
  }

  public function create()
  {
    $sports = Sport::orderBy('name', 'asc')->get();
    $param = [
      "sports" => $sports
    ];
    return view('matches.create', $param);
  }

  public function store(Request $request)
  {
    $rules = [
      'sport' => 'required',
      'date' => 'required',
      'place' => 'required',
      'nplayer' => 'required',
      'description' => 'required'
    ];

    $messages = [
      "required" => "El campo es obligatorio",
    ];

    $request->validate($rules, $messages);
    $match = Match::create([
      'sport' => $request->input('sport'),
      'date' => $request->input('date'),
      'place' => $request->input('place'),
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
    return redirect('/partidos');
  }
}
