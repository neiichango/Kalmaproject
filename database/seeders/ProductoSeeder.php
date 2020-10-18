<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1

        $producto = new \App\Models\Producto();
        $producto->name = 'Producto test';
        $producto->description = 'Producto descripcion';
        $producto->precio = 2000;
        $producto->imagenpath = 'Pendiente de Empacar';
        $producto->color_id = 1;
        $producto->categoria_id = 1;

        $producto->save();
        $producto->talla()->attach([1, 2]);
    }
}
