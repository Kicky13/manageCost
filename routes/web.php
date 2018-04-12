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
    return view('welcome');
});

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/travel', 'TravelController@index');
Route::get('/travel/create', 'TravelController@add');
Route::post('/travel/create', 'TravelController@create');
Route::get('/travel/delete/{id}', 'TravelController@delete');

Route::get('/car/{id}', 'CarController@cars');
Route::get('/car/create/{id}', 'CarController@add');
Route::post('/car/create', 'CarController@create');
Route::get('/car/delete/{id}', 'CarController@delete');

Route::get('/service/{id}', 'ServiceController@services');
Route::get('/service/create/{id}', 'ServiceController@add');
Route::post('/service/create', 'ServiceController@create');
Route::get('/service/delete', 'ServiceController@delete');