<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductoCreateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->id();
            $table->string('codig_producto');
            $table->string('nombre');
            $table->string('descripcion');
            $table->unsignedInteger('id_marca');
            $table->foreign('id_marca')->references('id')->on('marca');

            $table->string('imagen');
            $table->date('fecha_vencimiento');
            $table->dateTime('hora_registro');

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
