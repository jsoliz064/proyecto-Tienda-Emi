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
            $table->integer('cantidad_cuotas');
            $table->integer('cuotas_pagadas');
            $table->float('monto_cuota')->nullable();
            $table->float('total');
            $table->float('saldo');
            $table->string('estado');
            
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
