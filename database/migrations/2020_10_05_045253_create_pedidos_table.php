<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('express')->default(false);
            $table->date('fechaFactura')->nullable();
            $table->text('direccion')->nullable();
            $table->decimal('gastoenvio', 8, 2);
            $table->decimal('subtotal', 8, 2);
            $table->decimal('gastoimpuesto', 8, 2);
            $table->decimal('total', 8, 2);

            $table->integer('provincia_id')->unsigned()->nullable();
            $table->integer('cliente_id')->unsigned();
            $table->integer('chofer_id')->unsigned()->nullable();
            $table->integer('estadopedido_id')->unsigned();

            $table->foreign('provincia_id')->references('id')->on('provincias');

            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('chofer_id')->references('id')->on('chofers');
            $table->foreign('estadopedido_id')->references('id')->on('estadopedidos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pedidos', function (Blueprint $table) {
            $table->dropForeign('pedidos_cliente_id_foreign');
            $table->dropForeign('pedidos_chofer_id_foreign');
            $table->dropForeign('pedidos_estadopedido_id_foreign');
            $table->dropForeign('pedidos_provincia_id_foreign');
        });
        Schema::dropIfExists('pedidos');
    }
}
