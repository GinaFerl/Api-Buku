<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/hello', 'HelloController@hello');
Route::post('/hello', 'HelloController@hello');

Route::get('/buku', 'BukuController@index');
Route::post('/buku', 'BukuController@create');
Route::get('buku/{id}', 'BukuController@detail');
Route::put('buku', 'BukuController@update');
Route::delete('buku', 'BukuController@delete');

Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');


