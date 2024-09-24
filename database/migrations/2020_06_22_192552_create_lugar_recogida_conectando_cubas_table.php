<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLugarRecogidaConectandoCubasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lugar_recogida_conectando_cubas', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('hotel_id');
            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
            $table->time('hora_recogida');

            $table->string('area')->nullable();

            $table->unsignedBigInteger('ruta_id');

            $table->foreign('ruta_id')->references('id')->on('ruta_conectando_cubas')->onDelete('cascade');

            $table->string('created_by');
            
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
        Schema::dropIfExists('lugar_recogida_conectando_cubas');
    }
}
