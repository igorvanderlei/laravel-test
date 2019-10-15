<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MensagemValidatorTest extends TestCase
{
    public function testEnviarMensagemCaixaEntradaDestinatario() {
	$f1 = \App\Funcionario::find(1);
	$f2 = \App\Funcionario::find(2);

	$qt1 = $f2->caixaEntrada()->count();
	$mensagem = factory(\App\Mensagem::class)->make();
	$f1->enviarMensagem($mensagem->titulo, $mensagem->texto, $f2);
	$qt2 = $f2->caixaEntrada()->count();
	$this->assertEquals($qt1 + 1, $qt2);

   }

    public function testEnviarMensagemCaixaSaidaRemetente() {
	$f1 = \App\Funcionario::find(1);
	$f2 = \App\Funcionario::find(2);

	$qt1 = $f1->caixaSaida()->count();
	$mensagem = factory(\App\Mensagem::class)->make();
	$f1->enviarMensagem($mensagem->titulo, $mensagem->texto, $f2);
	$qt2 = $f1->caixaSaida()->count();
	$this->assertEquals($qt1 + 1, $qt2);

   }



    public function testMensagemSemTitulo()
    {
	$this->expectException(\App\Validator\ValidationException::class);
        $mensagem = factory(\App\Mensagem::class)->make();
	$mensagem->titulo = "";
	
	\App\Validator\MensagemValidator::validate($mensagem->toArray());
    }

    public function testMensagemRemetenteIgualDestinatario()
    {
	$this->expectException(\App\Validator\ValidationException::class);
        $mensagem = factory(\App\Mensagem::class)->make();
	$mensagem->destinatario_id = $mensagem->funcionario_id;


	//$mensagem->destinatario()->associate($mensagem->remetente);
	
	\App\Validator\MensagemValidator::validate($mensagem->toArray());
    }
}
