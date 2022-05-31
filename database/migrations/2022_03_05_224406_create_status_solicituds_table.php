<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusSolicitudsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_solicituds', function (Blueprint $table) {
            $table->id();
            $table->integer('id_solicitud')->references('id')->on('solicituds');
            $table->string('status');
            // $table->text('descripcion')->nullable();
            $table->unsignedBigInteger('descripcion')->references('msmstatuses')->on('id')->unique();
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
        Schema::dropIfExists('status_solicituds');
    }
}
