<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distritos', function (Blueprint $table) {
           // $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('id');
            $table->unsignedInteger('provincia_id');
            $table->unsignedInteger('canton_id');
            $table->timestamps();


            $table->primary(['id', 'provincia_id', 'canton_id']);
            $table->foreign('provincia_id')->references('provincia_id')->on('cantons');
            $table->foreign('canton_id')->references('id')->on('cantons');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {


        Schema::table('distritos', function (Blueprint $table) {
            $table->dropForeign('distritos_provincia_id_foreign');
            $table->dropForeign('distritos_canton_id_foreign');
        });
        Schema::dropIfExists('distritos');
    }
}
