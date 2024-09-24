<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreciosPaxHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('precios_pax_hotels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->integer('cantidad_hab_sencillas');
            $table->integer('cantidad_hab_dobles');
            $table->integer('cantidad_hab_triples');

            $table->boolean('variante2adultos_hasta2ninnos_2a12annos')->nullable();
            $table->double('precio_adulto_variante2adultos')->nullable();
            $table->double('precio_1er_ninno_variante2adultos')->nullable();
            $table->double('precio_2do_ninno_variante2adultos')->nullable();

            $table->boolean('variante1adulto_hasta3ninnos_2a12annos')->nullable();
            $table->double('precio_adulto_variante1adulto')->nullable();
            $table->double('precio_1er_ninno_variante1adulto')->nullable();
            $table->double('precio_2do_ninno_variante1adulto')->nullable();
            $table->double('precio_3er_ninno_variante1adulto')->nullable();

            $table->boolean('variante2adultos_2hasta3ninnos_2a12annos')->nullable();
            $table->double('precio_adulto_variante2adultos_2hasta3ninnos')->nullable();
            $table->double('precio_1er_ninno_variante1adultos_variante2adultos_2hasta3ninnos')->nullable();
            $table->double('precio_2do_ninno_variante1adultos_variante2adultos_2hasta3ninnos')->nullable();
            $table->double('precio_3er_ninno_variante1adultos_variante2adultos_2hasta3ninnos')->nullable();

            $table->boolean('variante3adultos_mismahabitacion')->nullable();
            $table->double('precio_adulto_variante3adultos_mismahabitacion')->nullable();

            $table->boolean('variante1adulto_mismahabitacion')->nullable();
            $table->double('precio_adulto_variante1adulto_mismahabitacion')->nullable();

            $table->string('created_by')->nullable();

            $table->unsignedBigInteger('hotel_id');
            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
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
        Schema::dropIfExists('precios_pax_hotels');
    }
}
