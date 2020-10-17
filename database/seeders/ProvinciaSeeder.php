<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProvinciaSeeder extends Seeder
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
        $provincia = new \App\Models\Provincia();
        $provincia->name = 'San Jose';
        $provincia->save();

        //2
        $provincia = new \App\Models\Provincia();
        $provincia->name = 'alajuela';
        $provincia->save();
        //3
        $provincia = new \App\Models\Provincia();
        $provincia->name = 'Cartago';
        $provincia->save();
        //4
        $provincia = new \App\Models\Provincia();
        $provincia->name = 'Heredia';
        $provincia->save();
        //5
        $provincia = new \App\Models\Provincia();
        $provincia->name = 'Guanacaste';
        $provincia->save();
        //6
        $provincia = new \App\Models\Provincia();
        $provincia->name = 'Puntarenas';
        $provincia->save();
        //7
        $provincia = new \App\Models\Provincia();
        $provincia->name = 'Limon';
        $provincia->save();
    }
}
