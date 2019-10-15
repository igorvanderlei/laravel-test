<?php

namespace App\Validator;

class MensagemValidator
{
	public static function validate($data) {
		$validator = \Validator::make($data, \App\Mensagem::$rules, \App\Mensagem::$messages);

		if($data['funcionario_id'] == $data['destinatario_id'])
			$validator->errors()->add('destinatario_id', 'O funcionario não pode enviar uma mensagem para si mesmo' );

		if(!$validator->errors()->isEmpty())
			throw new ValidationException($validator, "Erro na validação do Mensagem");
		
	}
}
