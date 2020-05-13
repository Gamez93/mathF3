<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBibliografiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bibliografia', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('materia_id')->unsigned();
            $table->foreign('materia_id')->references('id')->on('materia');
            $table->string('descripcion');
            $table->string('URL',150);
            $table->integer('estado')->default(1);
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
        Schema::dropIfExists('bibliografia');
    }
}
