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

Route::group(['prefix' => 'v1', 'as' => 'api.'], function(){
	Route::resource('pokemons', 'PokemonsController', ['except' => ['create', 'edit']]);
    Route::post('/cadastro', 'UsersController@store');
    Route::post('/login', 'Api\AuthController@authenticate');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/logout', 'Api\AuthController@logout')->middleware('auth:api');
Route::get('hello', function (){
    return response()->json(['message' => 'Hello World']);
})->middleware('auth:api');