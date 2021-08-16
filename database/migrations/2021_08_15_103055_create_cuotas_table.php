<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuotas', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->bigInteger('plan_id')->unsigned();

            $table->float('monto');
            $table->integer('nro_cuota')->nullable();
            $table->time('hora');
            $table->date('fecha');

            $table->unique(['id', 'plan_id']);
            $table->foreign('plan_id')->references('id')->on('plan_pagos')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('cuotas');
    }
}
