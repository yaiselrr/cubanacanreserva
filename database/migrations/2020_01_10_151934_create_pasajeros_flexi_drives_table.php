<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasajerosFlexiDrivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasajeros_flexi_drives', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('numero_vuelo_arribo_cuba');
            $table->date('fecha_arribo');
            $table->string('numero_pasaporte')->unique();
            $table->string('created_by')->nullable();
            $table->unsignedBigInteger('nacionalidad_id');
            $table->foreign('nacionalidad_id')
                ->references('id')
                ->on('nacionalidads')
                ->onDelete('cascade');
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
        Schema::dropIfExists('pasajeros_flexi_drives');
    }
}
