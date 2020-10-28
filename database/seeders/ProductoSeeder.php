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
        $producto->name = 'Begonia Pants';
        $producto->description = 'Pantalon flojo de estampado, con tallaje en la cintura y en los talones. Diseñado en corte globo para resaltar la silueta ';
        $producto->precio = 2000;
        $producto->nombreImagen = "BegoniaPants.jpg";
        $producto->pathImagen = "http://127.0.0.1:8000/images/BegoniaPants.jpg";
        $producto->color_id = 12;
        $producto->categoria_id = 1;
        $producto->save();
        $producto->talla()->attach([1, 2]);


        //2

        $producto = new \App\Models\Producto();
        $producto->name = 'Cloud Leggings';
        $producto->description = 'Legging de licra fria con diseño de transparencias. ';
        $producto->precio = 2000;
        $producto->nombreImagen = "legging1.jpg";
        $producto->pathImagen = "http://127.0.0.1:8000/images/legging1.jpg";
        $producto->color_id = 8;
        $producto->categoria_id = 7;
        $producto->save();
        $producto->talla()->attach([1, 2,3]);


        //3

        $producto = new \App\Models\Producto();
        $producto->name = 'Cargo Pants';
        $producto->description = 'Pantalones cargo de diseño olgado, comodos y casuales';
        $producto->precio = 2000;
        $producto->nombreImagen = "pants.jpg";
        $producto->pathImagen = "http://127.0.0.1:8000/images/pants.jpg";
        $producto->color_id = 8;
        $producto->categoria_id = 1;
        $producto->save();
        $producto->talla()->attach([1, 2]);

        //4

        $producto = new \App\Models\Producto();
        $producto->name = 'Camel Skirt';
        $producto->description = 'Enagua de licra fria, fresca y de hermosa caida';
        $producto->precio = 2000;
        $producto->nombreImagen = "skirt1.jpg";
        $producto->pathImagen = "http://127.0.0.1:8000/images/skirt1.jpg";
        $producto->color_id = 10;
        $producto->categoria_id = 3;

        $producto->save();
        $producto->talla()->attach([1, 2]);

        //5

        $producto = new \App\Models\Producto();
        $producto->name = 'Floral Dress';
        $producto->description = 'Producto descripcion';
        $producto->precio = 2000;
        $producto->nombreImagen = "vestido1.jpg";
        $producto->pathImagen = "http://127.0.0.1:8000/images/vestido1.jpg";
        $producto->color_id = 12;
        $producto->categoria_id = 4;

        $producto->save();
        $producto->talla()->attach([1, 2]);
        //6

        $producto = new \App\Models\Producto();
        $producto->name = 'Maxi Dress';
        $producto->description = 'Producto descripcion';
        $producto->precio = 2000;
        $producto->nombreImagen = "vestido2.jpg";
        $producto->pathImagen = "http://127.0.0.1:8000/images/vestido2.jpg";
        $producto->color_id = 12;
        $producto->categoria_id = 4;

        $producto->save();
        $producto->talla()->attach([1, 2]);

        //7

        $producto = new \App\Models\Producto();
        $producto->name = 'Candy Dress';
        $producto->description = 'Producto descripcion';
        $producto->precio = 2000;
        $producto->nombreImagen = "vestido3.jpg";
        $producto->pathImagen = "http://127.0.0.1:8000/images/vestido3.jpg";
        $producto->color_id = 2;
        $producto->categoria_id = 4;
        $producto->save();
        $producto->talla()->attach([1, 2]);



    }
}
