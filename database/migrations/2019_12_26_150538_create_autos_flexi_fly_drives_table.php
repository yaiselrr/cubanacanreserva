<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutosFlexiFlyDrivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autos_flexi_fly_drives', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('imagen');
            $table->integer('capacidad_pasajero');
            $table->string('aire_acondicionado');
            $table->string('air_baqs');
            $table->integer('puertas');
            $table->string('motor');
            $table->string('categoria');
            $table->string('rentadora');
            $table->string('reproductor');
            $table->string('trasnmision');
            $table->string('tipo');
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
        Schema::dropIfExists('autos_flexi_fly_drives');
    }
}
