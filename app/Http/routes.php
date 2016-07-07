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

Route::get('/', [
    'as' => 'welcome',
    function () {
        return view('welcome');
    }
]);
Route::get('/home', [
    'as' => 'home',
    'uses' => 'HomeController@index'
]);

/**
 * User Management
 */
Route::auth();

//Override Route Logout
Route::get('logout', [
    'as' => 'logout',
    'uses' =>'Auth\AuthController@logout']);
Route::resource('/users', 'UserController', [
    'only' => ['index', 'show']
]);
Route::put('/users/{user}', [
    'as' => 'users.update',
    'uses' => 'UserController@update'
]);
Route::post('users/password', [
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

Route::resource('follows', 'FollowController', [
    'only' => ['store', 'destroy']
]);

//Category Management
Route::resource('category', 'CategoriesController');

//Word Management
Route::resource('word', 'WordsController');
