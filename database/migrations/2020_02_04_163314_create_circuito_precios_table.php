<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCircuitoPreciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('circuito_precios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('circuitos_id');
            $table->foreign('circuitos_id')->references('id')->on('circuitos')->onDelete('cascade');
            $table->unsignedBigInteger('precio_paxs_id');
            $table->foreign('precio_paxs_id')->references('id')->on('preciopaxs')->onDelete('cascade');
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
        Schema::dropIfExists('circuito_precios');
    }
}
