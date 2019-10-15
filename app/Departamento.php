<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $fillable = ['nome'];

    public function funcionarios() {
        return $this->hasMany('\App\Funcionario');
    }
}
