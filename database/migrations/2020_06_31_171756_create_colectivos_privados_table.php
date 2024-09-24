<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColectivosPrivadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colectivos_privados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipo_traslado');
            $table->integer('dias_antelacion');
            $table->string('tarifario');
            $table->string('created_by')->nullable();


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
        Schema::dropIfExists('colectivos_privados');
    }
}
