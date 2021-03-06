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


Route::group(['prefix'=>'api'], function(){
	Route::group(['prefix'=>'user'],function(){

		Route::get('',['uses'=>'UserController@allUsers']);

		Route::get('{id}',['uses'=>'UserController@getUser']);

		Route::post('',['uses'=>'UserController@saveUser']);

		Route::put('{id}',['uses'=>'UserController@updateUser']);

		Route::delete('{id}',['uses'=>'UserController@deleteUser']);
	});
});

Route::get('/', function(){
	return View::make('api.docs.index');
});

Route::group(['prefix'=>'administracion'], function(){
	Route::post('administracion',[
		'as'	=> 'administracion.postLogin',
		'uses'	=> 'CuentaController@postLogin'
	]);

	Route::get('cuentas',[
		'as'	=> 'administracion.cuentas_lista',
		'uses'	=> 'CuentaController@cuentas_lista'
	]);

	Route::get('cuentas_habilitar/{id}',[
		'as'	=> 'administracion.cuentas_habilitar',
		'uses'	=> 'CuentaController@habilitar'
	]);
});

Route::group(['prefix'=>'cuenta'], function(){
	
		Route::get('',['uses'=>'CuentaController@allCuenta']);

		Route::get('{id}',['uses'=>'CuentaController@getCuenta']);

		Route::get('cuentaLogin/{usuario}/{password}',['uses'=>'CuentaController@getCuentaLogin']);

		Route::get('cuentaCreate/{usuario}/{entidad}/{rol}',['uses'=>'CuentaController@createCuenta']);

		Route::post('',['uses'=>'CuentaController@saveCuenta']);

		Route::get('actualizarCuenta/{mail}/{password}/{passwordActual}',['uses'=>'CuentaController@actualizar']);

		Route::get('restaurarCuenta/{mail}',['uses'=>'CuentaController@restaurar']);

		Route::delete('{id}',['uses'=>'CuentaController@deleteCuenta']);

});