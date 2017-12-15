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

Route::get('/storagelink', function () {
    $exitCode = Artisan::call('storage:link');
});

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

// BUSCADOR
Route::get('/search', 'SearchController@search');

Route::get('/inicio', 'HomeController@index')->name('home');

// RUTAS PROPIAS
Route::get('/faq', 'FaqController@index');

// RUTAS PARTIDOS
Route::get('/partidos', 'MatchesController@index')->middleware('isLogged');
Route::get('/partidos_orderByDate', 'MatchesController@orderByDate')->middleware('isLogged');
Route::get('/partidos/nuevo', 'MatchesController@create')->name('crearPartido')->middleware('isLogged');
Route::post('/partidos/nuevo', 'MatchesController@store')->middleware('isLogged');
Route::get('/partido_{id}', 'MatchesController@show')->middleware('isLogged');
Route::get('/partido_{id}/editar', 'MatchesController@edit')->middleware('isLogged');
Route::patch('/partido_{id}/update', 'MatchesController@update')->middleware('isLogged');
Route::get('/partido_{id}/eliminar', 'MatchesController@destroy')->middleware('isLogged');

// RUTAS DEPORTES
Route::get('/deportes', 'SportsController@index')->middleware('isLogged');
Route::get('/deportes/nuevo', 'SportsController@create')->middleware('isLogged');
Route::post('/deportes/nuevo', 'SportsController@store')->middleware('isLogged');
Route::get('/deporte/editar/{id}', 'SportsController@edit')->middleware('isLogged');
Route::post('/deporte/editar/{id}', 'SportsController@update')->middleware('isLogged');
Route::get('/deporte/eliminar', 'SportsController@destroy')->middleware('isLogged');

Route::get('/{username}', 'UsersController@show')->middleware('isLogged');
Route::get('/{username}/editar', 'UsersController@edit')->middleware('isLogged');
Route::patch('/{username}/editar', 'UsersController@update')->middleware('isLogged');
Route::get('/{username}/eliminar', 'UserController@destroy')->middleware('isLogged');
// Route::get('/{username}/misPartidos', 'UserController@misPartidos');
