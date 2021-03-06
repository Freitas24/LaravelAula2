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


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

	Route::get('/atividades', 'AtividadeController@index');
	Route::get('/mensagens', 'mensagemController@index');

Route::group(['middleware' => 'auth'], function(){   
	Route::put('/atividades/{id}', 'AtividadeController@update');
	Route::put('/mensagens/{id}', 'mensagemController@update');

	Route::get('/atividades/create', 'AtividadeController@create');
	Route::get('/mensagens/create', 'mensagemController@create');

	Route::get('/atividades/{id}/edit', 'AtividadeController@edit');
	Route::get('/mensagens/{id}/edit', 'mensagemController@edit');

	Route::get('/atividades/{id}/delete', 'AtividadeController@delete');
	Route::get('/mensagens/{id}/delete', 'mensagemController@delete');

	Route::delete('/atividades/{id}', 'AtividadeController@destroy');
	Route::delete('/mensagens/{id}', 'mensagemController@destroy');

	Route::get('/atividades/{id}', 'AtividadeController@show');
	Route::get('/mensagens/{id}', 'mensagemController@show');

	Route::post('/atividades', 'AtividadeController@store');
	Route::post('/mensagens', 'mensagemController@store');
});

