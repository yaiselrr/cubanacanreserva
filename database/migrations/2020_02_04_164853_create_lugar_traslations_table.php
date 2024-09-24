<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLugarTraslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lugar_traslations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre',200)->nullable();
            $table->string('idioma')->nullable();
            $table->string('created_by')->nullable();
            $table->unsignedBigInteger('lugars_id');
            $table->foreign('lugars_id')->references('id')->on('lugars')->onDelete('cascade');
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
        Schema::dropIfExists('lugar_traslations');
    }
}
