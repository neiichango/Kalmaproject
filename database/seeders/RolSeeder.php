<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        $rol = new \App\Models\Rol();
        $rol->name = 'Administrador';
        $rol->description = 'administrador';
        $rol->save();
        //2
        $rol = new \App\Models\Rol();
        $rol->name = 'Vendedor';
        $rol->description = 'vendedor';
        $rol->save();
        //3
        $rol = new \App\Models\Rol();
        $rol->name = 'Entrega';
        $rol->description = 'Personal Entrega';
        $rol->save();
        //4

        $rol = new \App\Models\Rol();
        $rol->name = 'Bodega';
        $rol->description = 'Personal de bodega y empaque';
        $rol->save();
    }
}
