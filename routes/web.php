<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

// Login Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('registro', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('registro', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// RUTAS PROPIAS
Route::get('/faq', 'AlgoController@show');
Route::get('/partidos', 'PartidosController@index');
Route::get('/partidos/crear', 'PartidosController@create');
Route::post('/partidos/crear', 'PartidosController@store');
Route::get('/partido', 'PartidosController@show');
Route::get('/partido/editar', 'PartidosController@edit');
Route::post('/partido/editar', 'PartidosController@update');
Route::get('/partido/eliminar', 'PartidosController@destroy');
Route::get('/perfil', 'UserController@showProfile');
