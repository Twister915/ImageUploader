<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::post('/up', ['before' => 'apiKey', 'uses' => 'FileController@uploadFile']);
Route::delete('/{file}', ['before' => 'apiKey', 'uses' => 'FileController@deleteFile']);
Route::get('/info/{file}', ['before' => 'apiKey', 'uses' => 'FileController@getInfoFor']);
Route::get('/{file}', 'FileController@showFile');
Route::get('/raw/{file}', 'FileController@getFile');
