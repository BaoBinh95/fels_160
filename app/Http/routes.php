<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//User Management
Route::auth();
Route::get('/user/{user}', 'UserController@index');
Route::put('/user/{user}', 'UserController@update');
Route::post('user/password', 'Auth\PasswordController@update');

Route::get('/home', 'HomeController@index');
