<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelTraslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_traslations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->mediumText('direccion')->nullable();
            $table->longText('descripcion')->nullable();
            $table->string('locale')->nullable();
            $table->string('created_by')->nullable();
            $table->unsignedBigInteger('hotel_id');
            $table->unique(['hotel_id','locale']);
            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
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
        Schema::dropIfExists('hotel_traslations');
    }
}
