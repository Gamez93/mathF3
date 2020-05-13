<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_materia')->unique;
            $table->string('nombre');
            $table->text('descripcion');
            $table->text('objetivo_general');
            $table->integer('estado')->default(1);
            $table->integer('seleccion')->default(0);
            $table->integer('numeroDeOrden');
            $table->string('prerrequisito');
            $table->integer('horasPorCiclo');
            $table->integer('horasTeoricasSemanales');
            $table->integer('horasPracticasSemanales');
            $table->integer('cicloEnSemanas');
            $table->integer('horaClase');
            $table->integer('unidadesValorativas');
            $table->enum('identificacionCiclo',['I','II','III','IV','V','VI','VII','VIII','IX','X']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materia');
    }
}
