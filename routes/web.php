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
Route::get('/plano/all', 'PlanoController@listar')->name('/plano/all')->middleware('auth');
Route::post('/plano/new', 'PlanoController@store');

Route::get('/plano/campo/{id}', 'PlanoController@listarCampo')->name('/plano/campo');

Route::get('/plano/unidade/{id}', 'PlanoController@listarUnidade')->name('/plano/unidade');
Route::any('/plano/busca', 'PlanoController@busca')->name('/plano/busca');

Route::get('/plano/unidade/{id}', 'PlanoController@listarUnidade')->name('/plano/unidade');

Route::get('/plano/editarPlano/{id}', 'PlanoController@edit')->name('/plano/editarPlano')->middleware('auth');
Route::post('/plano/salvarPlano', 'PlanoController@editarPlano')->name('/plano/salvarPlano')->middleware('auth');

Route::get('/plano/remover/{id}', 'PlanoController@removerPlano')->name('/plano/remover')->middleware('auth');

Route::get('/plano/verificar/{id}', 'PlanoController@verificarPlano')->name('/plano/verificar')->middleware('auth');

Route::get('/plano/listaUser', 'PlanoController@listarUser')->name('/plano/listaUser')->middleware('auth');

Route::get('/plano/listaNaoVerificados', 'PlanoController@listarNaoVerificados')->name('/plano/listaNaoVerificados')->middleware('auth');


Route::get('/download/planos/{file}', function ($file='') {
    return response()->download(storage_path('app/public/planos/'.$file));
})->name('/download/planos');

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout')->middleware('auth');

// Registration Routes...
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register')->middleware('auth');
$this->post('register', 'Auth\RegisterController@register')->middleware('auth');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@index')->name('home');
