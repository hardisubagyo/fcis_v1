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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'LoginController@index');
Route::get('/Dashboard', 'DashboardController@index');

/*Login Admin*/
Route::post('/userin', 'LoginController@in');
Route::get('/logout', 'LoginController@logout');

/*Pengguna*/
Route::resource('Users','UsersController');
Route::get('/Users', 'UsersController@index');
Route::get('/createUsers', 'UsersController@create');
Route::get('/editUsers/{id}', 'UsersController@edit');
Route::post('Users/{id}/update', 'UsersController@update')->name('Users.update');
Route::get('Users/{id}/destroy', 'UsersController@destroy')->name('Users.destroy');

/*Skenario*/
Route::resource('Skenario','SkenarioController');
Route::get('/Skenario', 'SkenarioController@index');
Route::get('/createSkenario', 'SkenarioController@create');
Route::get('/editSkenario/{id}', 'SkenarioController@edit');
Route::post('Skenario/{id}/update', 'SkenarioController@update')->name('Skenario.update');
Route::get('Skenario/{id}/destroy', 'SkenarioController@destroy')->name('Skenario.destroy');

/*Flight*/
Route::resource('Flight','FlightController');
Route::get('/showFlight/{id}', 'FlightController@flight');
Route::get('/createFlight/{id}', 'FlightController@create');
Route::get('/editFlight/{id}', 'FlightController@edit');
Route::post('Flight/{id}/update', 'FlightController@update')->name('Flight.update');
Route::get('Flight/{id}/destroy', 'FlightController@destroy')->name('Flight.destroy');
Route::post('/updateFlight', 'FlightController@updateflight');


/*Route*/
Route::resource('Route','RouteController');
Route::get('/showRoute/{id}', 'RouteController@route');
Route::get('/createRoute/{id}', 'RouteController@create');
Route::get('/editRoute/{id}', 'RouteController@edit');
Route::post('Route/{id}/update', 'RouteController@update')->name('Route.update');
Route::get('Route/{id}/destroy', 'RouteController@destroy')->name('Route.destroy');


/*Waypoint*/
Route::resource('Waypoint','WaypointController');
Route::get('/showWaypoint/{idm}/{id}', 'WaypointController@waypoint');
Route::get('/createWaypoint/{id}', 'WaypointController@create');
Route::get('Waypoint/{id}/destroy', 'WaypointController@destroy')->name('Waypoint.destroy');
Route::post('/updateWaypoint', 'WaypointController@update');
Route::post('/addWaypoint', 'WaypointController@addwaypoint');