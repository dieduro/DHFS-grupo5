<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request) {

       $param = [
            'deporte' => $request->input('deporte'),
            'zona' => $request->input('zona'),
            'fecha' => $request->input('fecha')
       ];

       $resultado = \App\Partido::where('sport_id', "=", $request->input("deporte"));
       
       if ($request->input('zona') !== null) {
        $resultado = $resultado->where('place', "=", $request->input('zona'));        
       }

       $resultado = $resultado->get();       

        return view('test', $param);
    }
}
