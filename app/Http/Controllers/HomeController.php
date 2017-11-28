<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Sport;
use \App\Match;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $matches = Match::all();
      $sports = Sport::orderBy('name', 'asc')->get();
      $param = [
        "matches" => $matches,
        "sports" => $sports
      ];
      return view('home', $param);
    }
}
