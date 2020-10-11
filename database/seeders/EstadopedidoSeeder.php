<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EstadopedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //1
        $estadopedido = new \App\Models\Estadopedido();
        $estadopedido->name = 'Pendiente de Empacar';
        $estadopedido->description = 'Pendiente de alistar el pedido, el empaque no se ha iniciado';
        $estadopedido->save();

        //1
        $estadopedido = new \App\Models\Estadopedido();
        $estadopedido->name = 'Empaque en Proceso';
        $estadopedido->description = 'El empaque se ha iniciado';
        $estadopedido->save();
        //1
        $estadopedido = new \App\Models\Estadopedido();
        $estadopedido->name = 'Listo para Facturar';
        $estadopedido->description = 'El empaque esta listo, pendiente de facturar';
        $estadopedido->save();

        //1
        $estadopedido = new \App\Models\Estadopedido();
        $estadopedido->name = 'Facturado - Pendiente asignar entrega';
        $estadopedido->description = 'Pedido fue facturado y se encuentra pendiente de asignar un personal de entrega';
        $estadopedido->save();
        //1
        $estadopedido = new \App\Models\Estadopedido();
        $estadopedido->name = 'Facturado - Entrega en Proceso';
        $estadopedido->description = 'Pendiente de alistar el pedido, el empaque no se ha iniciado';
        $estadopedido->save();
        
        //1
        $estadopedido = new \App\Models\Estadopedido();
        $estadopedido->name = 'Facturado - Completado';
        $estadopedido->description = 'El pedido fue exitosamente facturado y completado. Ya sea por medio de express o no.';
        $estadopedido->save();


    }
}
