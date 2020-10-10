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
        $genero = new \App\Models\Categoria();
        $genero->name = 'Pants';
       // $genero->description = '';
        $genero->save();
        //2
        $genero = new \App\Models\Categoria();
        $genero->name = 'Hoodies & Sweaters';
       // $genero->description = '';
        $genero->save();
        //3
        $genero = new \App\Models\Categoria();
        $genero->name = 'Skirts';
      //  $genero->description = '';
        $genero->save();
        //4
        $genero = new \App\Models\Categoria();
        $genero->name = 'Dresses';
        //$genero->description = '';
        $genero->save();
        //5
        $genero = new \App\Models\Categoria();
        $genero->name = 'Tops';
       // $genero->description = '';
        $genero->save();
        //6
        $genero = new \App\Models\Categoria();
        $genero->name = 'Accesories';
        //$genero->description = '';
        $genero->save();
        //7
        $genero = new \App\Models\Categoria();
        $genero->name = 'Leggings';
        //$genero->description = '';
        $genero->save();



    }
}
