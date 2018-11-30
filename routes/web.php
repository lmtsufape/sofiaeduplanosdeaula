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

Route::get('/', 'PlanoController@main')->name('inicio');
Route::get('/inicio', 'PlanoController@main');

Route::get('/plano/show/{id}', 'PlanoController@exibir')->name('/plano/show');
Route::get('/plano/new', 'PlanoController@create')->name('/plano/new');
Route::get('/plano/all', 'PlanoController@listar')->name('/plano/all');
Route::post('/plano/new', 'PlanoController@store');

Route::get('/plano/campo/{id}', 'PlanoController@listarCampo')->name('/plano/campo');

Route::get('/plano/unidade/{id}', 'PlanoController@listarUnidade')->name('/plano/unidade');
Route::any('/plano/busca', 'PlanoController@busca')->name('/plano/busca');

Route::get('/plano/unidade/{id}', 'PlanoController@listarUnidade')->name('/plano/unidade');

Route::get('/plano/editarPlano/{id}', 'PlanoController@edit')->name('/plano/editarPlano');
Route::post('/plano/salvarPlano', 'PlanoController@editarPlano')->name('/plano/salvarPlano');

Route::get('/plano/remover/{id}', 'PlanoController@removerPlano')->name('/plano/remover');

Route::get('/plano/verificar/{id}', 'PlanoController@verificarPlano')->name('/plano/verificar');

Route::get('/plano/listaUser', 'PlanoController@listarUser')->name('/plano/listaUser');

Route::get('/plano/listaNaoVerificados', 'PlanoController@listarNaoVerificados')->name('/plano/listaNaoVerificados');


Route::get('/download/planos/{file}', function ($file='') {
    return response()->download(storage_path('app/public/planos/'.$file));
})->name('/download/planos');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
