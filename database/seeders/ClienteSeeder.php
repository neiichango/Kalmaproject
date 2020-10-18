<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
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
        $cliente = new \App\Models\Cliente();
        $cliente->name = 'Boutique Clara';
        $cliente->phone = '24331122';
        $cliente->email = 'boutiqueclaraproveduria@gmail.com';
        $cliente->save();
    }
}
