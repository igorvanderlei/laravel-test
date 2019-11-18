<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnviarMensagemController extends Controller
{
    public function showForm() {
        return view('novaMensagem')->with(["caixa" => "enviar"]);
    }

    public function enviar(Request $request) {
        $dados = $request->all();
        $dados['funcionario_id'] = \Auth::id();

        /*$destinatario = \App\Funcionario::where('nome', 'like', $dados['destinatario'])->first();
        if($destinatario != null)
            $dados['destinatario_id'] = $destinatario->id;*/

        try {
            \App\Validator\MensagemValidator::validate($dados);
            \App\Mensagem::create($dados);
            return redirect("/home")->withSuccess("Mensagem enviada com sucesso.");

        } catch(\App\Validator\ValidationException $erro) {
            //dd($erro->getValidator());
            return redirect("escrever")->withInput()
                                            ->withErrors($erro->getValidator())
                                            ->withStatus("Deu erro");


        }



    }
}
