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

/*Route::get('test', function(){
	//$user =  new App\User;
	//$user->name = 'Enrique';
	//$user->email = 'caenjuji2@gmail.com';
	//$user->password = bcrypt('123123');
	//$user->role = 'moderador';
	//$user->save();

	App\User::create([
	'name'=>'estudiante',
	'email' => 'caenjuji3@gmail.com',
	'password' =>bcrypt('123')
	]);

});*/

/*Route::get('test', function(){
	//$user =  new App\User;
	//$user->name = 'Enrique';
	//$user->email = 'caenjuji2@gmail.com';
	//$user->password = bcrypt('123123');
	//$user->role = 'moderador';
	//$user->save();

	App\Role::create([
	'name'=>'estudiante',
	'display_name' => 'Estudiante',
	'description' => 'Este rol tienen los permisos de estudiante'
	]);

});*/

Route::get('role', function(){
	return \App\Role::with('user')->get();
});

/*//forma de utilizar un middleware
Route::get('/', ['as' => 'home', 'uses' => 'PageController@home'])->middleware('example');*/
Route::get('/', ['as' => 'home', 'uses' => 'PageController@home']);

Route::get('saludos/{nombre?}', ['as' => 'saludos', 'uses' => 'PageController@saludo'])->where('nombre', "[A-Za-z]+");

/*Nombre del recurso y nombre del controlador, para un diseño REST*/
Route::resource('mensajes', 'MessageController');
Route::resource('usuarios', 'UsersController');

Route::get('login', ['as' => 'login', 'uses' => 'auth\LoginController@showLoginForm']);
Route::post('login', 'auth\LoginController@login');
Route::get('logout', 'auth\LoginController@logout');