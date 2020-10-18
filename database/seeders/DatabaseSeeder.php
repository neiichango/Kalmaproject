<?php

namespace Database\Seeders;

use App\Models\Tipovehiculo;
use Illuminate\Database\Seeder;
use Prophecy\Call\Call;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call(RolSeeder::class);
        $this->call(TallaSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(ColorSeeder::class);
        $this->call(TipovehiculoSeeder::class);
        $this->call(VehiculoSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(EstadopedidoSeeder::class);
        $this->call(ChoferSeeder::class);
        $this->call(ProvinciaSeeder::class);
        $this->call(ClienteSeeder::class);
        $this->call(ProductoSeeder::class);
    }
}
