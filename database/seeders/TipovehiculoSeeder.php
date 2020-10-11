<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TipovehiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //
        $tipovehiculo = new \App\Models\Tipovehiculo();
        $tipovehiculo->name = 'Motocicleta';
      ///  $tipovehiculo->description = 'Talla extra pequeña';
        $tipovehiculo->save();

        //
        $tipovehiculo = new \App\Models\Tipovehiculo();
        $tipovehiculo->name = 'Automovil';
        ///  $tipovehiculo->description = 'Talla extra pequeña';
        $tipovehiculo->save();

        //
        $tipovehiculo = new \App\Models\Tipovehiculo();
        $tipovehiculo->name = 'Camion';
        ///  $tipovehiculo->description = 'Talla extra pequeña';
        $tipovehiculo->save();


    }
}
