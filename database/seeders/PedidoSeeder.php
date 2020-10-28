<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        $pedido = new \App\Models\Pedido();
        $pedido->express = false;
        $pedido->gastoimpuesto = 1000;
        $pedido->gastoenvio = 0;
        $pedido->subtotal = 8000;
        $pedido->total = 9000;
        $pedido->cliente_id = 1;
        $pedido->estadopedido_id = 1;
        $pedido->save();

        $detalle1 = new \App\Models\Detallepedido();
        $detalle1->pedido_id = $pedido->id;
        $detalle1->producto_id = 1;
        $detalle1->cantidad = 2;
        $detalle1->subtotal = 4000;
        $detalle1->save();

        $detalle2 = new \App\Models\Detallepedido();
        $detalle2->pedido_id = $pedido->id;
        $detalle2->producto_id = 2;
        $detalle2->cantidad = 2;
        $detalle2->subtotal = 4000;
        $detalle2->save();

        //2
        $pedido = new \App\Models\Pedido();
        $pedido->express = false;
        $pedido->gastoimpuesto = 1000;
        $pedido->gastoenvio = 0;
        $pedido->subtotal = 10000;
        $pedido->total = 11000;
        $pedido->cliente_id = 2;
        $pedido->estadopedido_id = 1;
        $pedido->save();

        $detalle1 = new \App\Models\Detallepedido();
        $detalle1->pedido_id = $pedido->id;
        $detalle1->producto_id = 1;
        $detalle1->cantidad = 3;
        $detalle1->subtotal = 6000;
        $detalle1->save();

        $detalle2 = new \App\Models\Detallepedido();
        $detalle2->pedido_id = $pedido->id;
        $detalle2->producto_id = 2;
        $detalle2->cantidad = 2;
        $detalle2->subtotal = 4000;
        $detalle2->save();
        //3
        $pedido = new \App\Models\Pedido();
        $pedido->express = false;
        $pedido->gastoimpuesto = 2000;
        $pedido->gastoenvio = 0;
        $pedido->subtotal = 2000;
        $pedido->total = 2000;
        $pedido->cliente_id = 3;
        $pedido->estadopedido_id = 1;
        $pedido->save();

        $detalle1 = new \App\Models\Detallepedido();
        $detalle1->pedido_id = $pedido->id;
        $detalle1->producto_id = 1;
        $detalle1->cantidad = 2;
        $detalle1->subtotal = 4000;
        $detalle1->save();

        $detalle2 = new \App\Models\Detallepedido();
        $detalle2->pedido_id = $pedido->id;
        $detalle2->producto_id = 2;
        $detalle2->cantidad = 2;
        $detalle2->subtotal = 4000;
        $detalle2->save();
        //4
        $pedido = new \App\Models\Pedido();
        $pedido->express = false;
        $pedido->gastoimpuesto = 2000;
        $pedido->gastoenvio = 0;
        $pedido->subtotal = 2000;
        $pedido->total = 2000;
        $pedido->cliente_id = 4;
        $pedido->estadopedido_id= 1;
        $pedido->save();

        $detalle1 = new \App\Models\Detallepedido();
        $detalle1->pedido_id = $pedido->id;
        $detalle1->producto_id = 1;
        $detalle1->cantidad = 2;
        $detalle1->subtotal = 4000;
        $detalle1->save();

        $detalle2 = new \App\Models\Detallepedido();
        $detalle2->pedido_id = $pedido->id;
        $detalle2->producto_id = 2;
        $detalle2->cantidad = 2;
        $detalle2->subtotal = 4000;
        $detalle2->save();
        //5
        $pedido = new \App\Models\Pedido();
        $pedido->express = false;
        $pedido->gastoimpuesto = 2000;
        $pedido->gastoenvio = 0;
        $pedido->subtotal = 2000;
        $pedido->total = 2000;
        $pedido->cliente_id = 5;
        $pedido->estadopedido_id = 1;
        $pedido->save();

        $detalle1 = new \App\Models\Detallepedido();
        $detalle1->pedido_id = $pedido->id;
        $detalle1->producto_id = 1;
        $detalle1->cantidad = 2;
        $detalle1->subtotal = 4000;
        $detalle1->save();

        $detalle2 = new \App\Models\Detallepedido();
        $detalle2->pedido_id = $pedido->id;
        $detalle2->producto_id = 2;
        $detalle2->cantidad = 2;
        $detalle2->subtotal = 4000;
        $detalle2->save();

    }
}
