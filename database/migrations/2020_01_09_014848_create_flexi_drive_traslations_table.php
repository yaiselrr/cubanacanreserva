<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlexiDriveTraslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flexi_drive_traslations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('locale')->nullable();
            $table->longText('descripcion_general')->nullable();
            $table->longText('descripcion_hoteles')->nullable();
            $table->longText('descripcion_autos')->nullable();
            $table->string('created_by')->nullable();
            $table->timestamps();


            $table->unsignedBigInteger('flexi_drive_id');
            $table->unique(['flexi_drive_id','locale']);
            $table->foreign('flexi_drive_id')->references('id')->on('flexi_drives')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flexi_drive_traslations');
    }
}
