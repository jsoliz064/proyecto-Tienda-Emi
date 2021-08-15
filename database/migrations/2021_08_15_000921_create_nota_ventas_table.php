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
<<<<<<< HEAD:database/migrations/2021_07_24_184517_create_nota_ventas_table.php
            $table->date('fecha')->nullable();
            $table->time('hora')->nullable();
            $table->timestamps();
            $table->foreign('nroCliente')->references('id')->on('clientes')->onDelete('cascade')->onUpdate('cascade');
            
          /*  $table->foreign('nroUsuario')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');*/
=======
            $table->foreign('nroCliente')->references('id')->on('clientes')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            //$table->date('fecha')->nullable();
            //$table->time('hora')->nullable();
            //$table->foreign('planPago_id')->references('id')->on('plan_pagos')->onDelete('set null')->onUpdate('cascade');
>>>>>>> ad643bcb76a38e1b2115469fafd84ec4cf96c447:database/migrations/2021_08_15_000921_create_nota_ventas_table.php
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
