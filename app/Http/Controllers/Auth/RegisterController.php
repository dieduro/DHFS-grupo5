<?php

namespace App\Http\Controllers\Auth;


use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Collection as Collection;
use Illuminate\Http\UploadedFile as UploadedFile;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Register Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles the registration of new users as well as their
  | validation and creation. By default this controller uses a trait to
  | provide this functionality without requiring any additional code.
  |
  */

  use RegistersUsers;

  /**
  * Where to redirect users after registration.
  *
  * @var string
  */
  protected $redirectTo = '/{username}';

  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('guest');
  }

  /**
  * Get a validator for an incoming registration request.
  *
  * @param  array  $data
  * @return \Illuminate\Contracts\Validation\Validator
  */
  protected function validator(array $data)
  {

    $rules = [
      'username' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users',
      'password' => 'required|string|min:6|confirmed',
      'legals' => 'required'
    ];

    $messages = [
      'max' => 'El campo debe tener menos de 255 caracteres',
      'min' => 'El campo debe tener al menos 6 caracteres',
      'required' => 'El campo es obligatorio',
      'email' => 'Asegurate de poner un mail válido',
      'unique' => 'Ya existe el usuario',
      'confirmed' => 'Las contraseñas no son iguales',
    ];

    return Validator::make($data, $rules, $messages);
  }

  public function register(Request $request)
  {
      $this->validator($request->all())->validate();

      event(new Registered($user = $this->create($request->all())));

      $extensionImagen = $request->file('photo')->getClientOriginalExtension();

      $user->photo = $request->file('photo')->storeAs('storage/images/users_img', $user->email . "." . $extensionImagen, 'public');
      $user->save();

      $this->guard()->login($user);

      return $this->registered($request, $user)
                      ?: redirect($this->redirectPath());
  }


  /**
  * Create a new user instance after a valid registration.
  *
  * @param  array  $data
  * @return \App\User
  */
  protected function create(array $data)
  {
    return User::create([
      'username' => $data['username'],
      'email' => $data['email'],
      'password' => bcrypt($data['password']),
      'photo' => null
    ]);
  }
}
