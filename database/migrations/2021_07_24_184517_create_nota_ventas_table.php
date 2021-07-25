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
            /*$table->unsignedBigInteger('nroUsuario')->nullable();*/
            $table->float('importe');
            $table->date('fecha');
            $table->time('hora');
            $table->timestamps();
            $table->foreign('nroCliente')->references('id')->on('clientes')->onDelete('set null')->onUpdate('cascade');
          /*  $table->foreign('nroUsuario')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');*/
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
