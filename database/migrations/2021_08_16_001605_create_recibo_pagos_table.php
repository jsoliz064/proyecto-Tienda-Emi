<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReciboPagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recibo_pagos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('plan_idC')->unsigned();
            $table->bigInteger('idC')->unsigned();

            $table->string('nombre');
            $table->time('hora');
            $table->date('fecha');

            $table->foreign('plan_idC')->references('plan_id')->on('cuotas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('idC')->references('id')->on('cuotas')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('recibo_pagos');
    }
}
