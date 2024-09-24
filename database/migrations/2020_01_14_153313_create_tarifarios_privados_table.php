<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarifariosPrivadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarifarios_privados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('origen');
            $table->string('destino');
            $table->string('taxi_standar_dos_sin');
            $table->string('taxi_standar_dos_con');
            $table->string('taxi_micro_cuatro_sin');
            $table->string('taxi_micro_cuatro_con');
            $table->string('transtur_micro_diez_sin');
            $table->string('transtur_micro_diez_con');
            $table->string('transtur_mini_quice_con');
            $table->string('transtur_mini_veintecuatro_con');
            $table->string('transtur_omnibus_treintacuatro_con');
            $table->string('transtur_omnibus_cuarentacuatro_con');
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
        Schema::dropIfExists('tarifarios_privados');
    }
}
