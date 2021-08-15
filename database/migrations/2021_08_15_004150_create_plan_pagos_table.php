<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanPagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_pagos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nota_venta_id')->nullable();
            $table->date('plazo');
            $table->integer('cantidad_cuotas');
            $table->string('tipo');
            $table->string('saldo');
            $table->foreign('nota_venta_id')->references('id')->on('nota_ventas')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('plan_pagos');
    }
}
