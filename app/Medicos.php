<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicos extends Model
{
    protected $fillable = [
        'nome', 'cpf', 'rg', 'matricula', 'data_nascimento', 'telefone', 'email'
    ];
}
