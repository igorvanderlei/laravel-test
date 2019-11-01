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

Route::get('/hello', function () {
    return "world";
})->middleware("auth")
;

Route::get("funcionario.create", "CadastrarFuncionarioController@prepararCadastro");


Route::get('departamento.create', function() {
	return view("formCriarDepartamento");

});

Route::post("funcionario.create", "CadastrarFuncionarioController@cadastrar");



Route::post('departamento.create', "CadastrarDepartamentoController@cadastrar");


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
