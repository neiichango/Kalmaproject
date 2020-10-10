<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoTallaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_talla', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('talla_id');
            $table->unsignedInteger('producto_id');
            $table->timestamps();


            $table->foreign('talla_id')->references('id')->on('tallas');
            $table->foreign('producto_id')->references('id')->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producto_talla');
    }
}
