<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos_facturas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_factura')->references('id')->on('facturas');
            $table->unsignedBigInteger('id_producto')->references('id')->on('productos');;
            $table->unsignedBigInteger('id_solicitud')->references('id')->on('solicituds');;
            $table->unsignedBigInteger('cantidad');
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
        Schema::dropIfExists('productos_facturas');
    }
}
