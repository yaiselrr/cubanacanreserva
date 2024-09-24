<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOficinasTraslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oficinas_traslations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre',200)->nullable();
            $table->text('direccion',500)->nullable();
            $table->string('idioma',2)->nullable();
            $table->string('created_by')->nullable();
            $table->unsignedBigInteger('oficina_id');
            //$table->unique(['oficina_id','idioma','nombre']);
            $table->foreign('oficina_id')->references('id')->on('oficinas')->onDelete('cascade');
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
        Schema::dropIfExists('oficinas_traslations');
    }
}
