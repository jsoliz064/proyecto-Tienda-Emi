<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompatibilidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compatibilidads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idAuto');
            $table->unsignedBigInteger('idProducto');
            $table->string('detalle');  
            $table->foreign('idAuto')->references('id')->on('autos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idProducto')->references('id')->on('productos')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('compatibilidads');
    }
}
