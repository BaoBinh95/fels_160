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

/**
 * HomeController
 */
Route::get('/home', [
    'as' => 'home',
    'uses' => 'HomeController@index'
]);

/**
 * User Management
 */
Route::auth();
Route::get('logout', [
    'as' => 'logout',
    'uses' =>'Auth\AuthController@logout']);
Route::resource('/users', 'UserController', [
    'only' => ['index', 'show']
]);
Route::delete('/users/{user}', [
    'as' => 'users.destroy',
    'middleware' => 'admin',
    'uses' => 'UserController@destroy'
]);
Route::put('/users/{user}/admin', [
    'as' => 'users.setAdmin',
    'middleware' => 'admin',
    'uses' => 'UserController@setAdmin'
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


/**
 * Category Management
 */
Route::resource('admin/category', 'CategoriesController');
//lấy các word trong category
Route::get('admin/category/{id}/words',[
    'as' => 'admin.category.words',
    'uses' => 'CategoriesController@getAllWordsBelongsToCategory']);
// add word vào category
Route::get('admin/category/{id}/words/add',[
    'as' => 'admin.category.words.add',
    'uses' => 'CategoriesController@getAddWordBelongsToCategory']);
Route::post('admin/category/{id}/words/create', [
    'as' => 'admin.category.word.create',
    'uses' => 'CategoriesController@addWordBelongsToCategory']);
// User lấy List Categories
Route::get('/categories', ['as' => 'user.categories', 'uses' => 'CategoriesController@getAllCategories']);

/**
 * Word Management
 */
Route::resource('admin/word', 'WordsController', ['except' => ['create', 'store']]);
// User List Words
Route::get('/words', ['as' => 'user.words', 'uses' => 'WordsController@getAllWord']);
//User: List Word In Category
Route::get('category/{id}/word', [
    'as' => 'category.word',
    'uses' => 'LessonsController@getAllWordInCategory']);

/**
 * Lesson Management
 */
//show lesson
Route::get('category/{id}/lessons/{lessonId}/', [
    'as' => 'category.lessons',
    'uses' => 'LessonsController@showLesson']);
// startlesson
Route::get('lessons/{id}', [
    'as' => 'user.lessons',
    'uses' => 'LessonsController@startLesson']);
//cham diem cho nguoi dung
Route::post('category/{id}/lessons/{lessonId}/result', [
    'as' => 'category.lessons.result',
    'uses' => 'LessonsController@responseResult']);
//hien thi ket qua tung lesson
Route::get('category/{id}/lessons/{lessonId}/showResult', [
    'as' => 'category.lessons.showResult',
    'uses' => 'LessonsController@showResult']);
