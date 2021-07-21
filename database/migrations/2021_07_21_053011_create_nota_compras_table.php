<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotaComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nota_compras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nroProveedor')->nullable();
            $table->unsignedBigInteger('nroUsuario')->nullable();
            $table->float('monto');
            $table->date('fecha');
            $table->time('hora');
            $table->timestamps();
            $table->foreign('nroProveedor')->references('id')->on('proveedors')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('nroUsuario')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nota_compras');
    }
}
