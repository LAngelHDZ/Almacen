<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistSalidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hist_salidas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_producto')->references('id')->on('productos');
            $table->integer('id_empleado')->references('id')->on('empleados');
            $table->unsignedInteger('cantidad');
            $table->string('representante')->nullable();
            $table->date('date');
            $table->time('time');
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
        Schema::dropIfExists('hist_salidas');
    }
}
