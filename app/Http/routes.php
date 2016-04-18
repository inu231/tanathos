<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/users', 'UsersController@index');
//Route::delete('/')

Route::get('/users/home', 'UsersController@home');
//Route::delete('/users/destroy/{id}', 'UsersController@destroy');

Route::get('/users/destroy/{id}', ['as' => 'destroy', 'uses' => 'UsersController@destroy']);
Route::get('/users/view/{id}', ['as' => 'view', 'uses' => 'UsersController@show']);
Route::get('/users/add', 'UsersController@add');
Route::get('/users/edit/{id}', 'UsersController@edit');
Route::put('/users/update/{id}', 'UsersController@update');
Route::post('/users/store', 'UsersController@store');



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
    Route::auth();
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index');
});
