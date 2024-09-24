<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelRecogidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_recogidas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('hotel');
            $table->string('hora');
            $table->unsignedBigInteger('excursion_id');
            $table->foreign('excursion_id')
                ->references('id')
                ->on('excursiones');
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
        Schema::dropIfExists('hotel_recogidas');
    }
}
