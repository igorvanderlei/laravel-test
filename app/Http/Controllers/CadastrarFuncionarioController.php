<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CadastrarFuncionarioController extends Controller
{
    public function cadastrar(Request $request) {
	$this->authorize("funcionario.create", \App\Funcionario::class);

	try {
		\App\Validator\FuncionarioValidator::validate($request->all());

	\App\Funcionario::create($request->all());
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
