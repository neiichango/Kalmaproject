<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VehiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        $vehiculo = new \App\Models\Vehiculo();
        $vehiculo->placa = '123456';
        $vehiculo->marca = 'Toyota';
        $vehiculo->modelo = 'Sedan';
        $vehiculo->anno = 2000;
        $vehiculo->tipovehiculo_id = 2;
        ///  $tipovehiculo->description = 'Talla extra pequeña';
        $vehiculo->save();

        //1
        $vehiculo = new \App\Models\Vehiculo();
        $vehiculo->placa = '111111';
        $vehiculo->marca = 'Toyota';
        $vehiculo->modelo = 'Hino';
        $vehiculo->anno = 2000;
        $vehiculo->tipovehiculo_id = 3;
        ///  $tipovehiculo->description = 'Talla extra pequeña';
        $vehiculo->save();
    }
}
