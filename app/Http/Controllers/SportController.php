<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Sport;

class SportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $sports = Sport::all();
      $parametros = [
        "sports" => $sports,
      ];
      return view('sports.index', $parametros);
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
      $input = $request->except('_token');
      $rules = [
        'name' => $request->input('name'),
        'players' => $request->input('players')
      ];

      $messages = [
        "required" => "El :attribute es obligatorio",
      ];

      $validator = Validator::make($input, $rules, $messages);
      $deporte = Sport::create([
        'name' => $request->input('name'),
        'players' => $request->input('players')
      ]);
      return redirect('/sports');
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
      $parametros = [
        'sport' => $sport,
      ]
      return view('sports.sport', $parametros);
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
      $parametros = [
        'sport' => $sport,
      ]
      return view('sport.edit', $parametros);
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
