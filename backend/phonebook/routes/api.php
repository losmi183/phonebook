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

Route::get('/contacts', 'ContactsController@index');

Route::post('/contact', 'ContactsController@store')->middleware('auth.jwt');

Route::get('/contact/{id}', 'ContactsController@show');

Route::put('/contact/{id}', 'ContactsController@update')->middleware('auth.jwt');

Route::delete('/contact/{id}', 'ContactsController@destroy')->middleware('auth.jwt');

// User routes
Route::post('/user', 'UsersController@signup');

Route::post('/user/signin', 'UsersController@signin');