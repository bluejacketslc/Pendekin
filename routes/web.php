<?php

use Illuminate\Support\Facades\Route;

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

Route::post('/login', 'UserController@getDataByLogin');

Route::get('/logout', 'UserController@destroyLogin');

Route::post('/register', function () {
    return view('login');
});
Route::post('/api','LinkController@generate');

Route::get('/{url}','LinkController@getLink');