<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        $categoria = new \App\Models\Categoria();
        $categoria->name = 'Pants';
        // $genero->description = '';
        $categoria->save();
        //2
        $categoria = new \App\Models\Categoria();
        $categoria->name = 'Hoodies & Sweaters';
        // $genero->description = '';
        $categoria->save();
        //3
        $categoria = new \App\Models\Categoria();
        $categoria->name = 'Skirts';
        //  $genero->description = '';
        $categoria->save();
        //4
        $categoria = new \App\Models\Categoria();
        $categoria->name = 'Dresses';
        //$genero->description = '';
        $categoria->save();
        //5
        $categoria = new \App\Models\Categoria();
        $categoria->name = 'Tops';
        // $genero->description = '';
        $categoria->save();
        //6
        $categoria = new \App\Models\Categoria();
        $categoria->name = 'Accesories';
        //$genero->description = '';
        $categoria->save();
        //7
        $categoria = new \App\Models\Categoria();
        $categoria->name = 'Leggings';
        //$genero->description = '';
        $categoria->save();



    }
}
