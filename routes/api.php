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

Route::group(['prefix' => 'v1', 'as' => 'api.'], function() {
	Route::group(['middleware' => 'jwt.auth'], function () {
		Route::resource('pokemons', 'PokemonsController', ['except' => ['create', 'edit']]);
	});
    Route::post('/cadastro', 'UsersController@store');
    Route::post('/login', 'Api\AuthController@authenticate');
});