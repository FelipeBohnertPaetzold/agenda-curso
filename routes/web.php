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

Route::group(['name' => 'redirecionamento_de_views'], function () {
    Route::get('/', 'RedirecionamentoController@chamaHome');
    Route::get('/{letra}', 'PessoaController@filtroLetra');
    Route::post('/buscar', 'PessoaController@buscar');
});

Route::group(['prefix' => 'pessoas'], function () {
    Route::get('nova', 'RedirecionamentoController@criarNovaPessoa');
    Route::get('delete/{id}', 'RedirecionamentoController@deletaPessoa');
    Route::get('editar/{id}', 'RedirecionamentoController@editarPessoa');
    Route::get('remove/{id}', 'PessoaController@remove');
    Route::post('criar', 'PessoaController@criar');
    Route::post('update', 'PessoaController@update');
});