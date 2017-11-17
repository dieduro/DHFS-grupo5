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
Route::get('password/resetear}/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/resetear', 'Auth\ResetPasswordController@reset');

Auth::routes();

Route::get('/inicio', 'HomeController@index')->name('home');

// RUTAS PROPIAS
Route::get('/faq', 'AlgoController@show');
Route::get('/perfil/{id}', 'UsersController@show');

// RUTAS PARTIDOS
Route::get('/partidos', 'MatchesController@index');
Route::get('/partido/nuevo', 'MatchesController@create');
Route::post('/partido/nuevo', 'MatchesController@store');
Route::get('/partido', 'MatchesController@show');
Route::get('/partido/editar', 'MatchesController@edit');
Route::post('/partido/editar', 'MatchesController@update');
Route::get('/partido/eliminar', 'MatchesController@destroy');

// RUTAS DEPORTES
Route::get('/deportes', 'SportsController@index');
Route::get('/deportes/nuevo', 'SportsController@create');
Route::post('/deportes/nuevo', 'SportsController@store');
Route::get('/deporte', 'SportsController@show');
Route::get('/deporte/editar', 'SportsController@edit');
Route::post('/deporte/editar', 'SportsController@update');
Route::get('/deporte/eliminar', 'SportsController@destroy');