<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
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
        $color = new \App\Models\Color();
        $color->name = 'Rojo';
        $color->code = '#cf7878';
        $color->save();

        //2
        $color = new \App\Models\Color();
        $color->name = 'Rosa';
        $color->code = '#cf78b9';
        $color->save();

        //3
        $color = new \App\Models\Color();
        $color->name = 'Morado';
        $color->code = '#b578cf';
        $color->save();
        //4
        $color = new \App\Models\Color();
        $color->name = 'Azul';
        $color->code = '#5f82c9';
        $color->save();
        //5
        $color = new \App\Models\Color();
        $color->name = 'Verde';
        $color->code = '5fc9ad';
        $color->save();
        //6
        $color = new \App\Models\Color();
        $color->name = 'Amarillo';
        $color->code = '#dbdb69';
        $color->save();
        //7
        $color = new \App\Models\Color();
        $color->name = 'Naranja';
        $color->code = '#db9e69';
        $color->save();
        //8
        $color = new \App\Models\Color();
        $color->name = 'Blanco';
        $color->code = '#ffffff';
        $color->save();
        //9
        $color = new \App\Models\Color();
        $color->name = 'Negro';
        $color->code = '#000000';
        $color->save();
        //10
        $color = new \App\Models\Color();
        $color->name = 'Cafe';
        $color->code = '#452b0a';
        $color->save();
        //11
        $color = new \App\Models\Color();
        $color->name = 'Gris';
        $color->code = '#4a4948';
        $color->save(); 
        //12
        $color = new \App\Models\Color();
        $color->name = 'Estampado';
        $color->code = '#4a4948';
        $color->save();
    }
}
