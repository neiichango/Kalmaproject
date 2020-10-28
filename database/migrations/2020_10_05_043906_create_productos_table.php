<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('precio', 8, 2);
            $table->timestamps();
            $table->softDeletes();
            $table->string('pathImagen')->nullable();
            $table->string('nombreImagen')->nullable();

            //foraneas
            $table->integer('color_id')->unsigned();
           // $table->integer('talla_id')->unsigned();
            $table->unsignedInteger('categoria_id');

            $table->foreign('color_id')->references('id')->on('colors');
           // $table->foreign('talla_id')->references('id')->on('tallas');
            $table->foreign('categoria_id')->references('id')->on('categorias');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('productos', function (Blueprint $table) {
            $table->dropForeign('productos_color_id_foreign');
            $table->dropForeign('productos_categoria_id_foreign');
        });
        Schema::dropIfExists('productos');
    }
}
