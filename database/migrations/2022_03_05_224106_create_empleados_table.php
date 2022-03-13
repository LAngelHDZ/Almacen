<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->integer('clave')->unique();
            $table->integer('id_user')->references('id')->on('users')->unique()->onDelete('cascade');
            $table->string('nss',11)->unique();
            $table->string('rfc',13)->unique();
            $table->date('fecha_nac');
            $table->text('direccion');
            $table->integer('area')->references('id')->on('areas');
            $table->string('cargo');
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
        Schema::dropIfExists('empleados');
    }
}
