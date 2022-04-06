<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotizacionCatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizacion-cats', function (Blueprint $table) {
            $table->id();
            $table->integer('idcotizacion')->references('cotizacion')->on('id');
            $table->integer('idcatalogo')->references('catalogos')->on('id');
            $table->integer('cantidad')->default(0);
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
        Schema::dropIfExists('cotizacion-cats');
    }
}
