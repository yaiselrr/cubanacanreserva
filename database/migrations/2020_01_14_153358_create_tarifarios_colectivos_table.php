<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarifariosColectivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarifarios_colectivos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('origen');
            $table->string('destino');
            $table->string('taxi_standar_hdos_sin');
            $table->string('taxi_standar_hdos_con');
            $table->string('taxi_micro_hcuatro_sin');
            $table->string('taxi_micro_hcuatro_con');
            $table->string('transtur_micro_hocho_sin');
            $table->string('transtur_micro_hocho_con');
            $table->string('transtur_mini_hdoce_con');
            $table->string('transtur_mini_hveinte_con');
            $table->string('transtur_omnibus_htreinta_con');
            $table->string('transtur_omnibus_hcuarentatres_con');
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
        Schema::dropIfExists('tarifarios_colectivos');
    }
}
