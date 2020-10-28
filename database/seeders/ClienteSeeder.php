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

        //2
        $cliente = new \App\Models\Cliente();
        $cliente->name = 'Boutique Rosa';
        $cliente->phone = '24331122';
        $cliente->email = 'boutiquerosaproveduria@gmail.com';
        $cliente->save();

        //3
        $cliente = new \App\Models\Cliente();
        $cliente->name = 'Boutique Marquez';
        $cliente->phone = '24331122';
        $cliente->email = 'boutiqueMarquezproveduria@gmail.com';
        $cliente->save();

        //4
        $cliente = new \App\Models\Cliente();
        $cliente->name = 'Boutique Flora';
        $cliente->phone = '24331122';
        $cliente->email = 'boutiquefloraproveduria@gmail.com';
        $cliente->save();

        //5
        $cliente = new \App\Models\Cliente();
        $cliente->name = 'Boutique Marsella';
        $cliente->phone = '24331122';
        $cliente->email = 'boutiquemarsellaproveduria@gmail.com';
        $cliente->save();
    }
}
