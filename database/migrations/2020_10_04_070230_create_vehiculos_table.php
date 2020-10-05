<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('placa')->unique();
            $table->string('marca');
            $table->string('modelo');
            $table->year('anno');
            $table->timestamps();
            //llaves foraneas
            $table->integer('tipovehiculo_id')->unsigned();
            $table->foreign('tipovehiculo_id')->references('id')->on('tipovehiculos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('vehiculos', function (Blueprint $table) {
            $table->dropForeign('vehiculos_tipovehiculo_id_foreign');
        });
        Schema::dropIfExists('vehiculos');

    }
}
