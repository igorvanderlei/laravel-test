<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    protected $fillable = ['titulo', 'texto', 'funcionario_id', 'destinatario_id'];

    public static $rules = ['titulo' => 'required',
			'texto' => 'required',
			'funcionario_id' => 'required|numeric',
			'destinatario_id' => 'required|numeric'];

   public static $messages = ['titulo' => 'o titulo é obrigatorio', ];


    public function funcionario () {
	return $this->belongsTo('\App\Funcionario');
    }

    public function destinatario () {
	return $this->belongsTo('\App\Funcionario', 'destinatario_id');
    }

}
