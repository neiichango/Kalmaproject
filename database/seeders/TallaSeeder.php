<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TallaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $talla = new \App\Models\Talla();
        $talla->name = 'XS';
        $talla->description = 'Talla extra pequeña';
        $talla->save();

        $talla = new \App\Models\Talla();
        $talla->name = 'S';
        $talla->description = 'Talla pequeña';
        $talla->save();


        $talla = new \App\Models\Talla();
        $talla->name = 'M';
        $talla->description = 'Talla mediana';
        $talla->save();


        $talla = new \App\Models\Talla();
        $talla->name = 'L';
        $talla->description = 'Talla grande';
        $talla->save();


    }
}
