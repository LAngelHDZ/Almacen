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
            $table->integer('id_empleado')->unique();
            $table->integer('id_user')->references('id')->on('users')->unique();
            $table->integer('nss')->unique();
            $table->integer('rfc')->unique();
            $table->string('nombre',30);
            $table->string('apaterno',30);
            $table->string('amaterno',30);
            $table->date('fecha_nac');
            $table->text('direccion');
            $table->integer('area');
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
