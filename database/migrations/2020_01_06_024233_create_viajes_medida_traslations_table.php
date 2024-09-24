<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViajesMedidaTraslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viajes_medida_traslations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('descripcion')->nullable();
            $table->string('locale')->nullable();
            $table->string('created_by')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('viaje_medida_id');
            $table->unique(['viaje_medida_id','locale']);
            $table->foreign('viaje_medida_id')->references('id')->on('viajes_medidas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('viajes_medida_traslations');
    }
}
