<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidad', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('materia_id')->unsigned();
            $table->foreign('materia_id')->references('id')->on('materia');
            $table->char('nombre', 20);
            $table->longText('descripcion');
            $table->longText('objetivo');
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
        Schema::dropIfExists('unidad');
    }
}
