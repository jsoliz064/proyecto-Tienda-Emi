<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_compras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idNotaCompra');
            $table->unsignedBigInteger('idProducto')->nullable();
            $table->float('costo');
            $table->integer('cantidad');
            $table->float('importe');
            $table->timestamps();
            $table->foreign('idNotaCompra')->references('id')->on('nota_compras')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idProducto')->references('id')->on('productos')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_compras');
    }
}
