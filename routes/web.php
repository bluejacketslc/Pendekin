<?php

use Illuminate\Support\Facades\Auth;
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


Route::post('/login', 'auth\AuthController@getDataByLogin');
Route::get('/logout', 'auth\AuthController@destroyLogin');

Route::get('/redirect', 'auth\AuthController@redirectToProvider');
Route::get('/callback', 'auth\AuthController@handleProviderCallback');

Route::get('/about',function(){
    return view('about');
});
Route::get('/register',function(){
    return view('register');
});
Route::get('/profile',function(){
    if(!session()->has('user'))
        return redirect('/');
    return view('profile');
});
Route::post('/register','auth\AuthController@register');


Route::post('/api','LinkController@generate');
Route::get('/{url}','LinkController@getLink');
