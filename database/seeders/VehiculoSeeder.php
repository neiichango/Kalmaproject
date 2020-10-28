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
        $vehiculo->placa = '111111';
        $vehiculo->marca = 'Toyota';
        $vehiculo->modelo = 'Sedan';
        $vehiculo->anno = 2012;
        $vehiculo->tipovehiculo_id = 2;
        $vehiculo->save();

        //2
        $vehiculo = new \App\Models\Vehiculo();
        $vehiculo->placa = '222222';
        $vehiculo->marca = 'Toyota';
        $vehiculo->modelo = 'Hino';
        $vehiculo->anno = 2000;
        $vehiculo->tipovehiculo_id = 3;
        $vehiculo->save();

        //3
        $vehiculo = new \App\Models\Vehiculo();
        $vehiculo->placa = '333333';
        $vehiculo->marca = 'Nissan';
        $vehiculo->modelo = 'Hino';
        $vehiculo->anno = 2002;
        $vehiculo->tipovehiculo_id = 3;
        $vehiculo->save();


        //4
        $vehiculo = new \App\Models\Vehiculo();
        $vehiculo->placa = '444444';
        $vehiculo->marca = 'Mercedes-benz';
        $vehiculo->modelo = 'Hino';
        $vehiculo->anno = 2006;
        $vehiculo->tipovehiculo_id = 3;
        $vehiculo->save();


        //5
        $vehiculo = new \App\Models\Vehiculo();
        $vehiculo->placa = '555555';
        $vehiculo->marca = 'Suzuki ';
        $vehiculo->modelo = 'Gsxr250';
        $vehiculo->anno = 2004;
        $vehiculo->tipovehiculo_id = 1;
        $vehiculo->save();
    }
}
