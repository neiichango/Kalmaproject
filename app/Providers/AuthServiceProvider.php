<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Model' => 'App\Policies\ModelPolicy',

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Passport::routes();

        //definir el alcance

        Passport::tokensCan([
            'Administrador' => 'Mantenimiento de productos personal de envio,ver estado de los pedidos',
            'Vendedor' => 'Mantenimiento de pedidos',
            'Bodeguero' => 'Mantenimiento de pedido, encargado del estado del empaque',
            'Entrega' => 'Mantenimiento de pedidos,encargado del estado de entrega',
        ]);

        Passport::setDefaultScope([
            'Vendedor'
        ]);
    }
}
