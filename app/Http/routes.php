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
Route::get('/home', 'HomeController@index');

/**
 * User Management
 */
Route::auth();
Route::get('/user/{user}', [
    'as' => 'user_info',
    'uses' => 'UserController@index']);
Route::put('/user/{user}', [
    'as' => 'update_info',
    'uses' => 'UserController@update'
]);
Route::post('user/password', [
    'as' => 'update_password',
    'uses' => 'Auth\PasswordController@update'
]);

/**
 * Social Authentication
 */
Route::get('/redirect/{provider}', 'SocialAuthController@redirectToProvider');
Route::get('/callback/{provider}', 'SocialAuthController@handleProviderCallback');

/**
 * Follows
 */

Route::resource('follows', 'FollowController',
    ['only' => ['store', 'destroy']
]);
