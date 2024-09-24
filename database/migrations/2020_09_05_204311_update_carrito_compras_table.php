<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCarritoComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('carrito_compras', function (Blueprint $table) {
            $table->unsignedBigInteger('reservar_flexi_drives_id')->after('reserva_excursion_id')->nullable();
            $table->foreign('reservar_flexi_drives_id')->references('id')->on('reservar_flexi_drives')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('carrito_compras', function (Blueprint $table) {
            //
        });
    }
}
