<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CadastrarDepartamentoController extends Controller
{
    public function cadastrar(Request $request) {
	$departamento = \App\Departamento::create($request->all());
	return "Departamento criado";

    }
}
