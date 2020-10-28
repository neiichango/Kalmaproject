<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ChoferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        $chofer = new \App\Models\Chofer();
        $chofer->cedula = '101110111';
        $chofer->nombre = 'Mario';
        $chofer->apellido1 = 'corrales';
        $chofer->apellido2 = 'aguero';
        $chofer->telefono = '85714433';
        $chofer->vehiculo_id = 2;
        $chofer->save();

        //2
        $chofer = new \App\Models\Chofer();
        $chofer->cedula = '202220222';
        $chofer->nombre = 'Marco';
        $chofer->apellido1 = 'Mora';
        $chofer->apellido2 = 'Centeno';
        $chofer->telefono = '85714433';
        $chofer->vehiculo_id = 1;
        $chofer->save();

        //3
        $chofer = new \App\Models\Chofer();
        $chofer->cedula = '303330333';
        $chofer->nombre = 'Jorge';
        $chofer->apellido1 = 'Sanchez';
        $chofer->apellido2 = 'Saborio';
        $chofer->telefono = '85714433';
        $chofer->vehiculo_id = 3;
        $chofer->save();
        //4
        $chofer = new \App\Models\Chofer();
        $chofer->cedula = '404440444';
        $chofer->nombre = 'kenneth';
        $chofer->apellido1 = 'Rodriguez';
        $chofer->apellido2 = 'Centeno';
        $chofer->telefono = '85714433';
        $chofer->vehiculo_id = 4;
        $chofer->save();
        //5
        $chofer = new \App\Models\Chofer();
        $chofer->cedula = '505550555';
        $chofer->nombre = 'Jonathan';
        $chofer->apellido1 = 'Alfaro';
        $chofer->apellido2 = 'Morera';
        $chofer->telefono = '85714433';
        $chofer->vehiculo_id = 5;
        $chofer->save();
    }
}
