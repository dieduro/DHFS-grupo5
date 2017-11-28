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

Route::get('/', 'HomeController@index');
Route::post('/', 'MatchesController@index')->middleware('guest');

// Login Routes...
Route::get('ingresar', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('ingresar', 'Auth\LoginController@login');
Route::post('salir', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('registro', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('registro', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/resetear', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/resetear/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/resetear', 'Auth\ResetPasswordController@reset');

Auth::routes();

Route::get('/inicio', 'HomeController@index')->name('home');

// RUTAS PROPIAS
Route::get('/faq', 'FaqController@index');

// RUTAS PARTIDOS
Route::get('/partidos', 'MatchesController@index');
Route::get('/partidos_orderByDate', 'MatchesController@orderByDate');
Route::get('/partidos/nuevo', 'MatchesController@create');
Route::post('/partidos/nuevo', 'MatchesController@store');
Route::get('/partido/editar/{id}', 'MatchesController@edit');
Route::get('/partido/eliminar/{id}', 'MatchesController@destroy');
Route::patch('/partido/update/{id}', 'MatchesController@update');

// RUTAS DEPORTES
Route::get('/deportes', 'SportsController@index');
Route::get('/deportes/nuevo', 'SportsController@create');
Route::post('/deportes/nuevo', 'SportsController@store');
Route::get('/deporte/editar/{id}', 'SportsController@edit');
Route::post('/deporte/editar/{id}', 'SportsController@update');
Route::get('/deporte/eliminar', 'SportsController@destroy');

Route::get('/{username}', 'UsersController@show')->middleware('isLogged');
Route::get('/{username}/editar', 'UsersController@edit');
Route::patch('/{username}/editar', 'UsersController@update');
Route::get('/{username}/eliminar', 'UserController@destroy');
// Route::get('/{username}/misPartidos', 'UserController@misPartidos');
