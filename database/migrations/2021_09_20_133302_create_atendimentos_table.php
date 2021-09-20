<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtendimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atendimentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_medico');
            $table->unsignedBigInteger('id_paciente');
            $table->string('altura');
            $table->string('peso');
            $table->string('sexo');
            $table->text('queixas');
            $table->text('procedimento');
            $table->string('plano_saude');
            $table->timestamps();

            $table->foreign('id_medico')->references('id')
                ->on('medicos');
            $table->foreign('id_paciente')->references('id')
                ->on('pacientes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atendimentos');
    }
}
