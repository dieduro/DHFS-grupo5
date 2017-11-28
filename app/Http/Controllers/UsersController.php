<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\Match;
use Auth;

class UsersController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    //
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    //
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    //
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($username)
  {
    $matches = Match::all();
    $user = User::all();
    // where('username', "=", $username)->get();
    $param = [
      'user' => $user,
      'matches' => $matches
    ];
    return view('profile.profile', $param);
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($username)
  {
    $user = User::where('username', '=', $username)->get();
    $param = [
      'user' => $user
    ];
    return view('profile.edit', $param);
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $username)
  {

    $rules = [
      // 'first_name' => 'required',
      // 'last_name' => 'required',
      // 'password' => 'string|min:6|confirmed',
      // 'email' => 'string|email|max:255|unique:users',
    ];

    $messages = [
      'max' => 'El campo debe tener menos de 255 caracteres',
      'min' => 'El campo debe tener al menos 6 caracteres',
      'required' => 'El campo es obligatorio',
      'email' => 'Asegurate de poner un mail válido',
      'unique' => 'Ya existe el usuario',
      'confirmed' => 'Las contraseñas no son iguales'
    ];

    $request->validate($rules, $messages);

    $user = User::where('username', "=", $username)->first();

    if ($request->input('first_name') == null ) {
      $user->first_name = Auth::user()->first_name;
    } else {
      $user->first_name = $request->input('first_name');
    }

    if ($request->input('last_name') == null ) {
      $user->last_name = Auth::user()->last_name;
    } else {
      $user->last_name = $request->input('last_name');
    }

    if ($request->input('email') !== null) {
      $user->email = $request->input('email');
    } else {
      $user->email = Auth::user()->email;
    };

    if ($request->input('password') !== null) {
      $user->password = bcrypt($request->input('password'));
    } else {
      $user->password = Auth::user()->password;
    };

    if ($request->has('photo')) {
      $user->photo = $request->input('photo');
      $extensionImagen = $request->file('photo')->getClientOriginalExtension();
      $user->photo = $request->file('photo')->storeAs('/images/users_img', $user->email . "." . $extensionImagen, 'public');
    } else {
      $user->photo = Auth::user()->photo;
    };

    $user->save();

    $param = [
      'user' => $user,
    ];
    return view('profile.edit', $param);
  }



  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    //
  }
}
