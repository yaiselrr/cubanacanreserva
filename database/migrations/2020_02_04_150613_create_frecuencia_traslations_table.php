<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrecuenciaTraslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frecuencia_traslations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('frecuencia',200)->nullable();
            $table->string('locale')->nullable();
            $table->unsignedBigInteger('frecuencias_id');
            $table->string('created_by')->nullable();
            $table->foreign('frecuencias_id')->references('id')->on('frecuencias')->onDelete('cascade');
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
        Schema::dropIfExists('frecuencia_traslations');
    }
}
