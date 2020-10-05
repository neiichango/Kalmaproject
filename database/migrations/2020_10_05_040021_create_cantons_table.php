<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCantonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cantons', function (Blueprint $table) {
            //$table->increments('id');
            $table->string('name');
            $table->unsignedInteger('id');
            $table->unsignedInteger('provincia_id');
            $table->timestamps();


            $table->primary(['id', 'provincia_id']);
            $table->foreign('provincia_id')->references('id')->on('provincias');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('cantons', function (Blueprint $table) {
            $table->dropForeign('cantons_provincia_id_foreign');
        });
        Schema::dropIfExists('cantons');
    }
}
