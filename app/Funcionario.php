<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $fillable = ['nome', 'departamento_id'];
    public static $rules= ['nome' => 'required|min:5|max:100',
			   'departamento_id' => 'required'];
    public static $messages = ['nome' => 'O campo nome é obrigatório e deve ter entre 5 e 100 caracteres',
			       'departamento_id' => 'O funcionário precisa estar associado a um departamento'
 ];

    public function departamento() {
	return $this->belongsTo('\App\Departamento');
    }

    public function caixaSaida() {
	return $this->hasMany('\App\Mensagem');
    }

    public function caixaEntrada() {
	return $this->hasMany('\App\Mensagem', 'destinatario_id');
    }

    public function enviarMensagem($titulo, $texto, $destinatario) {
	$mensagem = new Mensagem;
	$mensagem->titulo = $titulo;
	$mensagem->texto = $texto;
	$mensagem->destinatario()->associate($destinatario);
	$this->caixaSaida()->save($mensagem);
    }
}
