<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutosFlexiFlyDriveTraslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autos_flexi_fly_drive_traslations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('caracteristicas')->nullable();
            $table->string('locale')->nullable();
            $table->string('created_by')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('autosdrive_id');
            $table->unique(['autosdrive_id','locale']);
            $table->foreign('autosdrive_id')->references('id')->on('autos_flexi_fly_drives')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('autos_flexi_fly_drive_traslations');
    }
}
