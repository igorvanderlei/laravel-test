<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FuncionarioValidatorTest extends TestCase
{

    public function testFuncionarioSemNome()
    {
	$this->expectException(\App\Validator\ValidationException::class);
        $funcionario = factory(\App\Funcionario::class)->make();
	$funcionario->nome = "";
	
	\App\Validator\FuncionarioValidator::validate($funcionario->toArray());


    }

    public function testFuncionarioSemDepartamento()
    {
	$this->expectException(\App\Validator\ValidationException::class);
        $funcionario = factory(\App\Funcionario::class)->make();
	$funcionario->departamento_id = "";
	
	\App\Validator\FuncionarioValidator::validate($funcionario->toArray());


    }

    public function testFuncionarioCorreto()
    {
        $funcionario = factory(\App\Funcionario::class)->make();

\App\Validator\FuncionarioValidator::validate($funcionario->toArray());

	$this->assertTrue(true);
    }



}
