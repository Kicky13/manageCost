<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('/travel', 'Api\TravelController@getData');

Route::get('/city', 'Api\CityController@index');

Route::get('/perjalanan/findService/{origin}/{destination}', 'Api\PerjalananController@search');
Route::get('/perjalanan/detailService/{id}', 'Api\PerjalananController@detailService');
Route::post('/perjalanan/create/{id}', 'Api\PerjalananController@create');

Route::get('/rencana/bepergian/{origin}/{destination}/{passenger}/{facility}', 'Api\RencanaController@bepergian');
Route::get('/rencana/detailService/{id}', 'Api\RencanaController@detailService');
Route::post('/rencana/create/{id}', 'Api\RencanaController@create');