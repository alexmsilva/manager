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

Route::group(['prefix' => 'api/v1'], function() {
	Route::resource('equipes', 'EquipeController', ['except' => ['edit', 'create']]);
	Route::resource('jogadores', 'JogadorController', ['only' => ['index']]);
	Route::resource('equipes.jogadores', 'EquipeJogadoresController', ['except' => ['edit', 'create']]);

	Route::post('oauth/access_token', function() {
		return response()->json(Authorizer::issueAccessToken());
	});
});