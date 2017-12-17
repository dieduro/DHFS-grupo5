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
    if ( Auth::check() ) {
      $matches = Match::where('user_id', "=", Auth::user()->id)->get();
      $param = [
        "matches" => $matches
      ];
      return view('profile.misPartidos', $param);
    } else {
      return redirect('/{username}');
    }
  }

  public function show($id) {
    $match = Match::find($id);
    $param = [
      'match' => $match
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
      'sport_id' => 'required',
      'nplayers' => 'required',
      'date' => 'required',
      // 'place' => 'required',
      // 'comment' => 'required'
    ];

    $messages = [
      "required" => "El campo es obligatorio",
    ];

    $request->validate($rules, $messages);

    $sport = Sport::find($request->input('sport_id'));

    $match = Match::create([
      'sport_id' => $request->input('sport_id'),
      'date' => $request->input('date'),
      'name' => $request->input('name'),
      'street_number' => $request->input('street_number'),
      'locality' => $request->input('sublocality_level_1'),
      'city' => $request->input('administrative_area_level_1'),
      'country' => $request->input('country'),
      'nplayers' => $request->input('nplayers'),
      'comment' => $request->input('comment'),
      'user_id' => Auth::user()->id,
      'photo' => $sport['photo']
    ]);
    return redirect('/partidos');
  }

  /* EDITAR DATOS DE PARTIDOS */
  public function edit($id)
  {
    $match = Match::find($id);
    $sports = Sport::all();
    $param = [
      'match' => $match,
      'sports' => $sports
    ];
    return view('matches.edit', $param);
  }

  /* ACTUALIZAR PARTIDOS */
  public function update(Request $request, $id)
  {
    $match = Match::find($id);
    // if(Auth::check()){
    // $matches = Match::where('user_id', "=", Auth::user()->id)->get();

    $match->nplayers = $request->input('nplayers');
    $match->date = $request->input('date');
    $match->place = $request->input('place');
    $match->comment = $request->input('comment');

    $match->save();

    $param = [
      'match' => $match,
      'matches' => $matches
    ];
    return redirect('/partidos');
  }

  /* ELIMINAR PARTIDO  */
  public function destroy($id)
  {
    $match = Match::find($id);
    $match->delete();
    return redirect('/partidos');
  }

  /* ORDENAR PARTIDOS POR FECHA */
  public function orderByDate() {
    $matches = Match::orderBy('date', 'asc')->get();
    $param = [
      'matches' => $matches
    ];
    return view('profile.misPartidos', $param);
  }
}
