<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiasSemanaTraslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dias_semana_traslations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('diassemana',200)->nullable();
            $table->string('locale');
            $table->unsignedBigInteger('dias_semanas_id');
            $table->foreign('dias_semanas_id')->references('id')->on('dias_semanas')->onDelete('cascade');
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
        Schema::dropIfExists('dias_semana_traslations');
    }
}
