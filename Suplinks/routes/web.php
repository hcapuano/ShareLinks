<?php

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

use Illuminate\Support\Facades\Redirect;

Auth::routes();

Route::get('/', 'HomeController@index');

Route::post('/', 'LinkController@createLink');

Route::get('/{id}', 'LinkController@redirectToUrl')->where('{id}', '[0-9a-zA-Z]{5}');

Route::get('/delete/{id}', 'LinkController@deleteLink');

Route::get('/disable/{id}', 'LinkController@disableLink');

Route::get('/enable/{id}', 'LinkController@enableLink');

Route::get('/stats/{id}', 'StatController@stats');

Route::get('/home', 'HomeController@index');