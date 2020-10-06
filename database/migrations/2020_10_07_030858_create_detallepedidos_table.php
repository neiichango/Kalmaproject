<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallepedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detallepedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pedido_id');
            $table->unsignedInteger('producto_id');
            $table->unsignedTinyInteger('cantidad')->default(0); //0 - 255
            $table->decimal('subtotal', 8, 2)->default(0);
            $table->timestamps();
            $table->foreign('pedido_id')->references('id')->on('pedidos');
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


        Schema::table('detallepedidos', function (Blueprint $table) {
            $table->dropForeign('detallepedidos_pedido_id_foreign');
            $table->dropForeign('detallepedidos_producto_id_foreign');
        });
        Schema::dropIfExists('detallepedidos');
    }
}
