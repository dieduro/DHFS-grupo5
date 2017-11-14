<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Sport;

class SportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $sports = Sport::orderBy('name', 'asc')->get();
      $param = [
        "sports" => $sports
      ];
      return view('sports.index', $param);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $rules = [
        'name' => 'required|unique:sports',
        'players' => 'required|numeric'
      ];

      $messages = [
        "required" => "El campo es obligatorio",
        "unique" => 'Ya existe el deporte',
        'numeric' => 'El campo debe ser un número'
      ];

      $request->validate($rules, $messages);
      $sport = Sport::create([
        'name' => $request->input('name'),
        'players' => $request->input('players')
      ]);
      return redirect('/deportes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $sport = Sport::find($id);
      $param = [
        'sport' => $sport,
      ];
      return view('sports.sport', $param);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $sport = Sport::find($id);
      $param = [
        'sport' => $sport
      ];
      return view('sport.edit', $param);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $sport = Sport::find($id);
      foreach ($request->except('_token') as $key => $value) {
        $sport->$key = $value;
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $sport = Sport::find($id);
      $sport->delete();
      return redirect('/sport');
    }
}
