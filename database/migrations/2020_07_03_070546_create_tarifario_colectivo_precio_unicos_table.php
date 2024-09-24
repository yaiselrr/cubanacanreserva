<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarifarioColectivoPrecioUnicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarifario_colectivo_precio_unicos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('aeropuerto');
            $table->string('guion');
            $table->string('hotel');
            $table->string('ow');
            $table->string('cantidad');
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
        Schema::dropIfExists('tarifario_colectivo_precio_unicos');
    }
}
