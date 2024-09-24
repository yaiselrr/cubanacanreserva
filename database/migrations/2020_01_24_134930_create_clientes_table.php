<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre')->nullable();
            $table->string('apaterno')->nullable();
            $table->string('amaterno')->nullable();
            $table->string('pasaporte')->nullable();
            $table->string('created_by')->nullable();
            $table->unsignedBigInteger('nacionalidad_id');
            //$table->unique(['nacionalidad_id','nombre','pasaporte']);
            $table->foreign('nacionalidad_id')->references('id')->on('nacionalidads')->onDelete('cascade');
            $table->date('fecha')->nullable();
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
        Schema::dropIfExists('clientes');
    }
}
