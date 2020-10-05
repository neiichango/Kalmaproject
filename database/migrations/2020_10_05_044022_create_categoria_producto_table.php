<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriaProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria_producto', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('categoria_id');
            $table->unsignedInteger('producto_id');
            $table->timestamps();


            $table->foreign('categoria_id')->references('id')->on('categorias');
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
        Schema::table('categoria_producto', function (Blueprint $table) {
            $table->dropForeign('categoria_producto_categoria_id_foreign');
            $table->dropForeign('categoria_producto_producto_id_foreign');
        });
        Schema::dropIfExists('categoria_producto');
    }
}
