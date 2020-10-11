<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        $objetoUsuario = \App\Models\User::create([
            'name' => 'usuarioAdmin1',
            'email' => 'usuarioadmin1@prueba.com',
            'password' => bcrypt('123456'),
            'rol_id' => 1
        ]);
        $objetoUsuario->save();

        //2
        $objetoUsuario = \App\Models\User::create([
            'name' => 'usuarioVendedor1',
            'email' => 'usuarioVendedor1@prueba.com',
            'password' => bcrypt('123456'),
            'rol_id' => 2
        ]);
        $objetoUsuario->save();

        //3
        $objetoUsuario = \App\Models\User::create([
            'name' => 'usuarioBodega1',
            'email' => 'usuarioBodega1@prueba.com',
            'password' => bcrypt('123456'),
            'rol_id' => 4
        ]);
        $objetoUsuario->save();

        //4
        $objetoUsuario = \App\Models\User::create([
            'name' => 'usuarioEntrega1',
            'email' => 'usuarioEntrega1@prueba.com',
            'password' => bcrypt('123456'),
            'rol_id' => 3
        ]);
        $objetoUsuario->save();
    }
}
