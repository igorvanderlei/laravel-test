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

Route::get("funcionario.create", "CadastrarFuncionarioController@prepararCadastro")->name("funcionario.create");


Route::get('departamento.create', function() {
	return view("formCriarDepartamento");

});

Route::post("funcionario.create", "CadastrarFuncionarioController@cadastrar");



Route::post('departamento.create', "CadastrarDepartamentoController@cadastrar");


Route::get('/home/{caixa?}', 'HomeController@index')->name('home');

Route::get('/login', "Auth\LoginController@loginForm")->name('login');
Route::get('/logout', "Auth\LoginController@logout")->name('logout');
Route::post('/logout', "Auth\LoginController@logout");
Route::post('/login', "Auth\LoginController@login");

Route::get("/escrever", "EnviarMensagemController@showForm")->name('mensagem.create');
Route::post("/enviar", "EnviarMensagemController@enviar")->name('mensagem.send');

Route::get("/locale/{lang?}", function($lang='pt_BR') {
    \Session::put('locale', $lang);
    return redirect()->back();
});
