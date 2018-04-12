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

/*//forma de utilizar un middleware
Route::get('/', ['as' => 'home', 'uses' => 'PageController@home'])->middleware('example');*/
Route::get('/', ['as' => 'home', 'uses' => 'PageController@home']);

Route::get('contactame', ['as' => 'contactos', 'uses' => 'PageController@contact']);

Route::post('contacto', 'PageController@mensajes');

Route::get('saludos/{nombre?}', ['as' => 'saludos', 'uses' => 'PageController@saludo'])->where('nombre', "[A-Za-z]+");

Route::get('mensajes', ['as' => 'message.index', 'uses' => 'MessageController@index']);

Route::get('mensajes/create', ['as' => 'message.create', 'uses' => 'MessageController@create']);

Route::post('mensajes', ['as' => 'messages.store', 'uses' => 'MessageController@store']);

Route::get('mensajes/{id}', ['as' => 'message.show', 'uses' => 'MessageController@show']);

Route::get('mensajes/{id}/edit', ['as' => 'message.edit', 'uses' => 'MessageController@edit']);

Route::put('mensajes/{id}', ['as' => 'message.update', 'uses' => 'MessageController@update']);

Route::delete('mensajes/{id}', ['as' => 'message.destroy', 'uses' => 'MessageController@destroy']);

