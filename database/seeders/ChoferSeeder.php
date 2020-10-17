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
        $chofer->apellido1 = 'Mario';
        $chofer->apellido2 = 'Mario';
        $chofer->telefono = 'Mario';
        $chofer->vehiculo_id = 2;
        $chofer->save();

        //2
        $chofer = new \App\Models\Chofer();
        $chofer->cedula = '202220222';
        $chofer->nombre = 'Maria';
        $chofer->apellido1 = 'Maria';
        $chofer->apellido2 = 'Maria';
        $chofer->telefono = 'Maria';
        $chofer->vehiculo_id = 1;
        $chofer->deleted_at='2020/10/17';
        $chofer->save();
    }
}
