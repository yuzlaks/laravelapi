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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// public routes
Route::delete('siswa/destroy/{id}','Api\siswaController@destroy');
Route::delete('siswa/deleteall','Api\siswaController@deleteall');
Route::post('siswa/store','Api\siswaController@store');
Route::post('/login', 'Api\AuthController@login')->name('login.api');
Route::post('/register', 'Api\AuthController@register')->name('register.api');
Route::get('siswa/create','Api\siswaController@create');

// private routes
Route::middleware('auth:api')->group(function () {
    Route::delete('kelas/deleteall','Api\kelasController@deleteall');
    Route::post('kelas/store','Api\kelasController@store');
    Route::put('siswa/update/{id}','Api\siswaController@update');
    Route::get('siswa/{id}','Api\siswaController@edit');
    Route::get('siswa','Api\siswaController@index');
    Route::get('kelas','Api\kelasController@index');
    Route::get('/logout', 'Api\AuthController@logout')->name('logout');
});


