<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atendimentos extends Model
{
    //
    protected $fillable = [
        'id_medico', 'id_paciente', 'altura', 'peso', 'sexo', 'queixas', 'procedimento', 'plano_saude'
    ];
}
