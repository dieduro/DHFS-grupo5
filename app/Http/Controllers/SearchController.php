<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Match;
use \App\Sport;
use Auth;

class SearchController extends Controller
{
    public function search(Request $request) {
    
        
        $matches = \App\Match::where('sport_id', "=", $request->input("deporte"))->get();
        $sport = \App\Sport::find($request->input("deporte"));
        
        $param = [
           'matches' => $matches,
           'sport' => $sport
       ];
        
        
        if(Auth::check()) {
            return view('profile.profile', $param);
        } else {
            return view('resultados', $param);
        }
    }


}
