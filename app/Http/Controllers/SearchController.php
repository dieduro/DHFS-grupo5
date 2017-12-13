<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Match;
use Auth;

class SearchController extends Controller
{
    public function search(Request $request) {

    //    $param = [
    //         'deporte' => $request->input('deporte'),
    //         'zona' => $request->input('zona'),
    //         'fecha' => $request->input('fecha')
    //    ];

       $matches = \App\Match::where('sport_id', "=", $request->input("deporte"))->get();
       $param = [
           'matches' => $matches
       ];
    //    if ($request->input('zona') !== null) {
    //     $resultado = $resultado->where('place', "=", $request->input('zona'));        
    //    }
        
        
        if(Auth::check()) {
            return view('profile.profile', $param);
        } else {
            return view('resultados', $param);
        }
    }
}
