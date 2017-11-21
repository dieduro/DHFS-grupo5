<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Match;
use \App\Sport;
use Auth;

class MatchesController extends Controller
{
  public function index()
  {
    if(Auth::check()){
    $matches = Match::where('user_id', "=", Auth::user()->id)->get();
    $param = [
      "matches" => $matches
    ];
    return view('matches.index', $param);
  }else{
    return redirect('/ingresar');
  }
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
      'sport_id' => 'required',
      'nplayers' => 'required',
      'date' => 'required',
      'place' => 'required',
      'comment' => 'required'
    ];

    $messages = [
      "required" => "El campo es obligatorio",
    ];

    $request->validate($rules, $messages);
    $match = Match::create([
      'sport_id' => $request->input('sport_id'),
      'date' => $request->input('date'),
      'place' => $request->input('place'),
      'nplayers' => $request->input('nplayers'),
      'comment' => $request->input('description'),
      'user_id' => Auth::user()->id
    ]);
    return redirect('/partidos');
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
