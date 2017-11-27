<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
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
      $user = User::where('username', "=", $username)->get();
      $param = [
        'user' => $user
      ];
      return view('profile.profile', $param);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $user = User::find($id);
      $param = [
        $user => 'user'
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
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user = new User();
        $user->username = Auth::user()->username;
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        // $user->email = Auth::user()->email;
        if($request->has('password')) {
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
        }

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
