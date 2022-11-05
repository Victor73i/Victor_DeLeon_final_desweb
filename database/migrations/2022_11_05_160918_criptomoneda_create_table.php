<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriptomonedaCreateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criptomoneda', function (Blueprint $table) {
            $table->id();
            $table->string('logotipo');
            $table->string('nombre');
            $table->float('precio');
            $table->string('descripcion');

            $table->unsignedInteger('lenguaje_id');
            $table->foreign('lenguaje_id')->references('id')->on('lenguaje_programacion');

            $table->date('fecha_creacion');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
