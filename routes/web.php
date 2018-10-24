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

Route::get('/', 'PlanoController@main');

Route::get('/plano/show/{id}', 'PlanoController@exibir');
Route::get('/plano/new', 'PlanoController@create');
Route::get('/plano/all', 'PlanoController@listar');
Route::post('/plano/new', 'PlanoController@store');

Route::get('/plano/campo/{id}', 'PlanoController@listarCampo');

Route::get('/plano/unidade/{id}', 'PlanoController@listarUnidade');

Route::post('/plano/busca', 'PlanoController@busca');


Route::get('/download/planos/{file}', function ($file='') {
    return response()->download(storage_path('app/public/planos/'.$file)); 
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
