<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotaVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nota_ventas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nroCliente')->nullable();
            //$table->unsignedBigInteger('planPago_id')->nullable();
            $table->integer('importe');
            $table->foreign('nroCliente')->references('id')->on('clientes')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            //$table->date('fecha')->nullable();
            //$table->time('hora')->nullable();
            //$table->foreign('planPago_id')->references('id')->on('plan_pagos')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nota_ventas');
    }
}
