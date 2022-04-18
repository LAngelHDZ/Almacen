<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud_productos', function (Blueprint $table) {
            $table->id();
            $table->integer('idsolicitud')->references('id')->on('solicituds');
            $table->integer('idproducto')->references('id')->on('productos');
            $table->integer('cantidad');
            $table->integer('aprobado');
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
        Schema::dropIfExists('solicitud_productos');
    }
}
