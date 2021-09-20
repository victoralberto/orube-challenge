<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pacientes extends Model
{
    //
    protected $fillable = [
        'nome', 'telefone', 'email', 'cpf', 'rg', 'data_nascimento'
    ];
}
