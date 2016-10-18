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

	Route::group(['prefix'=>'aluno'],function(){

		Route::get('',['uses'=>'AlunoController@allAlunos']);

		Route::get('{id}',['uses'=>'AlunoController@getAluno']);

		Route::post('',['uses'=>'AlunoController@saveAluno']);

		Route::put('{id}',['uses'=>'AlunoController@updateAluno']);

		Route::delete('{id}',['uses'=>'AlunoController@deleteAluno']);
	});

	Route::group(['prefix'=>'curso'],function(){

		Route::get('',['uses'=>'CursoController@allCursos']);

		Route::get('{id}',['uses'=>'CursoController@getCurso']);

		Route::post('',['uses'=>'CursoController@saveCurso']);

		Route::put('{id}',['uses'=>'CursoController@updateCurso']);

		Route::delete('{id}',['uses'=>'CursoController@deleteCurso']);
	});

	Route::group(['prefix'=>'atletica'],function(){

		Route::get('',['uses'=>'AtleticaController@allAtleticas']);

		Route::get('{id}',['uses'=>'AtleticaController@getAtletica']);

		Route::post('',['uses'=>'AtleticaController@saveAtletica']);

		Route::put('{id}',['uses'=>'AtleticaController@updateAtletica']);

		Route::delete('{id}',['uses'=>'AtleticaController@deleteAtletica']);
	});

	Route::group(['prefix'=>'time'],function(){

		Route::get('',['uses'=>'TimeController@allTimes']);

		Route::get('{id}',['uses'=>'TimeController@getTime']);

		Route::post('',['uses'=>'TimeController@saveTime']);

		Route::put('{id}',['uses'=>'TimeController@updateTime']);

		Route::delete('{id}',['uses'=>'TimeController@deleteTime']);
	});

	Route::group(['prefix'=>'administrador'],function(){

		Route::get('',['uses'=>'AdministradorController@allAdministradores']);

		Route::get('{id}',['uses'=>'AdministradorController@getAdministrador']);

		Route::post('',['uses'=>'AdministradorController@saveAdministrador']);

		Route::put('{id}',['uses'=>'AdministradorController@updateAdministrador']);

		Route::delete('{id}',['uses'=>'AdministradorController@deleteAdministrador']);
	});

	Route::group(['prefix'=>'esporte'],function(){

		Route::get('',['uses'=>'EsporteController@allEsportes']);

		Route::get('{id}',['uses'=>'EsporteController@getEsporte']);

		Route::post('',['uses'=>'EsporteController@saveEsporte']);

		Route::put('{id}',['uses'=>'EsporteController@updateEsporte']);

		Route::delete('{id}',['uses'=>'EsporteController@deleteEsporte']);
	});

	Route::group(['prefix'=>'capitao'],function(){

		Route::get('',['uses'=>'CapitaoController@allCapitoes']);

		Route::get('{id}',['uses'=>'CapitaoController@getCapitao']);

		Route::post('',['uses'=>'CapitaoController@saveCapitao']);

		Route::put('{id}',['uses'=>'CapitaoController@updateCapitao']);

		Route::delete('{id}',['uses'=>'CapitaoController@deleteCapitao']);
	});


	Route::group(['prefix'=>'jogador'],function(){

		Route::get('',['uses'=>'JogadorController@allJogadores']);

		Route::get('{id}',['uses'=>'JogadorController@getJogador']);

		Route::post('',['uses'=>'JogadorController@saveJogador']);

		Route::put('{id}',['uses'=>'JogadorController@updateJogador']);

		Route::delete('{id}',['uses'=>'JogadorController@deleteJogador']);
	});

	Route::group(['prefix'=>'evento'],function(){

		Route::get('',['uses'=>'EventoController@allEventos']);

		Route::get('{id}',['uses'=>'EventoController@getEvento']);

		Route::post('',['uses'=>'EventoController@saveEvento']);

		Route::put('{id}',['uses'=>'EventoController@updateEvento']);

		Route::delete('{id}',['uses'=>'EventoController@deleteEvento']);
	});

	Route::group(['prefix'=>'participante'],function(){

		Route::get('',['uses'=>'ParticipanteController@allParticipantes']);

		Route::get('{id}',['uses'=>'ParticipanteController@getParticipante']);

		Route::post('',['uses'=>'ParticipanteController@saveParticipante']);

		Route::put('{id}',['uses'=>'ParticipanteController@updateParticipante']);

		Route::delete('{id}',['uses'=>'ParticipanteController@deleteParticipante']);
	});

	Route::group(['prefix'=>'inscricao'],function(){

		Route::get('',['uses'=>'InscricaoController@allInscricoes']);

		Route::get('{id}',['uses'=>'InscricaoController@getInscricao']);

		Route::post('',['uses'=>'InscricaoController@saveInscricao']);

		Route::put('{id}',['uses'=>'InscricaoController@updateInscricao']);

		Route::delete('{id}',['uses'=>'InscricaoController@deleteInscricao']);
	});

});
	Route::get('/', function(){
		return view('welcome');
	});
	Route::get('/cadastroaluno', function(){
		return view('cadastroaluno');
	});
	Route::get('/cadastroatletica', function(){
		return view('cadastroatletica');
	});
	Route::get('/cadastrocurso', function(){
		return view('cadastrocurso');
	});
	Route::get('/cadastrotime', function(){
		return view('cadastroTime');
	});
	Route::get('/cadastroesporte', function(){
		return view('cadastroEsporte');
	});
	Route::get('/cadastroadministrador', function(){
		return view('cadastroAdministrador');
	});
Route::auth();

Route::get('/home', 'HomeController@index');
