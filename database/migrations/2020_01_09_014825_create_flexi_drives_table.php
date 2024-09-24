<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlexiDrivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flexi_drives', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fichero_listado_hoteles');
            $table->string('fichero_informacion_ampliada');
            $table->string('imagen');
            $table->string('tarifario_FFD');
            $table->string('created_by')->nullable();
            $table->unsignedBigInteger('dias_antelacion_rese_alta_id');
            $table->foreign('dias_antelacion_rese_alta_id')
                ->references('id')
                ->on('dias_antelacion_reservas');
            $table->unsignedBigInteger('dias_antelacion_rese_baja_id');
            $table->foreign('dias_antelacion_rese_baja_id')
                ->references('id')
                ->on('dias_antelacion_reservas');
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
        Schema::dropIfExists('flexi_drives');
    }
}
