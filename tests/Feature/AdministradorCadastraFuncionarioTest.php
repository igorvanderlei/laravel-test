<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdministradorCadastraFuncionarioTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUsuarioNaoLogado()
    {
        $response = $this
		->get('funcionario.create')
		->assertStatus(403);
    }

    public function testCadastrarFuncionarioNaoLogado()
    {
	$funcionario = factory(\App\Funcionario::class)
				->make();

        $response = $this
			->post('funcionario.create', 				$funcionario->toArray())
			->assertStatus(403);
    }

    public function testFuncionarioRHLogadoVisualizaFormulario() {
	$departamento = \App\Departamento::create(
				['nome' => 'RH']);

	$usuario = factory(\App\User::class)->create();

	$usuario->departamento()
			->associate($departamento);

	$usuario->save();

	 $response = $this
			->actingAs($usuario)
			->get('funcionario.create')
			->assertStatus(200)
			->assertSee('Nome')
			->assertSee('Departamento')
			->assertSee('cadastrar');
    }

    public function testFuncionarioOutroDeptoLogadoVisualizaFormulario() {
	$departamento = \App\Departamento::create(
				['nome' => 'Outro']);

	$usuario = factory(\App\User::class)->create();

	$usuario->departamento()
			->associate($departamento);

	$usuario->save();

	 $response = $this
			->actingAs($usuario)
			->get('funcionario.create')
			->assertStatus(403);
    }

   public function testFuncionarioRHLogadoCadastrar() {
	$departamento = \App\Departamento::create(
				['nome' => 'RH']);

	$usuario = factory(\App\User::class)->create();

	$usuario->departamento()
			->associate($departamento);

	$usuario->save();

	$funcionario = factory(\App\Funcionario::class)
				->make();

	$dados = $funcionario->toArray();
	$dados['password'] = 'password';
	$dados['password_confirmation'] = 'password';

	 $response = $this
			->actingAs($usuario)
			->post('funcionario.create', $dados)
			->assertStatus(200)
			->assertSee('Funcionario criado');
    }

   public function testFuncionarioRHCadastrarFuncionarioDadosIncompletos() {
	$usuario = $this->criarFuncionarioRH();

	$funcionario = factory(\App\Funcionario::class)
				->make();
	$funcionario->nome = "";

	 $response = $this
		->actingAs($usuario)
		->post('funcionario.create', $funcionario->toArray())
		->assertStatus(302)
		->assertRedirect('funcionario.create')
		->assertSessionHas('errors');
    }

    public function testRotaInexistente() {

		$this->get("funcionario.delete")
                       ->assertStatus(404);
	}

    public function criarFuncionarioRH() {
	$departamento = \App\Departamento::create(
				['nome' => 'RH']);
	$usuario = factory(\App\User::class)->create();

	$usuario->departamento()
			->associate($departamento);

	$usuario->save();
	return $usuario;
   }


}
