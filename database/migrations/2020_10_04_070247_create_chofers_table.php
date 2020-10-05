<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChofersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chofers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cedula')->unique();
            $table->string('nombre');
            $table->string('apellido1');
            $table->string('apellido2');
            $table->string('telefono');
            $table->softDeletes();
            $table->timestamps();

            //foranea

            $table->integer('vehiculo_id')->unsigned()->nullable();
            $table->foreign('vehiculo_id')->references('id')->on('vehiculos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('chofers', function (Blueprint $table) {
            $table->dropForeign('chofers_vehiculo_id_foreign');
        });
        Schema::dropIfExists('chofers');
    }
}
