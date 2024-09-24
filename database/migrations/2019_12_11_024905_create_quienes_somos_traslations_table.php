<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuienesSomosTraslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quienes_somos_traslations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo')->nullable();
            $table->longText('descripcion')->nullable();

            $table->string('locale')->nullable();
            $table->string('created_by')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('quienessomos_id');
            $table->unique(['quienessomos_id','locale'/*,'question'*/]);
            $table->foreign('quienessomos_id')->references('id')->on('quienes_somos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quienes_somo_traslations');
    }
}
