<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CadastrarFuncionarioController extends Controller
{
    public function cadastrar(Request $request) {
	$this->authorize("funcionario.create", \App\Funcionario::class);

	try {
		\App\Validator\FuncionarioValidator::validate($request->all());
        $dados = $request->all();
        $dados['password'] = Hash::make($dados['password']);
	    \App\Funcionario::create($dados);
	return "Funcionario criado";
	} catch (\App\Validator\ValidationException $exception ) {
$listaDepartamento = \App\Departamento::all();

return redirect('funcionario.create')

->with(["departamentos" => $listaDepartamento])
->withErrors($exception->getValidator())
->withInput();
	}


    }

    public function prepararCadastro() {

	$this->authorize("funcionario.create", \App\Funcionario::class);

	$listaDepartamento = \App\Departamento::all();
	return view ("formCadastrarFuncionario")->with([
	"departamentos" => $listaDepartamento]);
    }

}
