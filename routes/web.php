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

Route::get('/', ['as' => 'home', 'uses' => 'PageController@home']);

Route::get('contactame', ['as' => 'contactos', 'uses' => 'PageController@contact']);

Route::post('contacto', 'PageController@mensajes');

Route::get('saludos/{nombre?}', ['as' => 'saludos', 'uses' => 'PageController@saludo'])->where('nombre', "[A-Za-z]+");

