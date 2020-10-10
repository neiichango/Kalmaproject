<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    public function estadopedido()
    {
        return $this->hasMany('App\Models\Estadopedido');
    }


    public function detallepedido()
    {
        return $this->belongsTo('App\Models\Detallepedido');
    }

    public function chofer()
    {
        return $this->hasMany('App\Models\Chofer');
    }

    public function cliente()
    {
        return $this->hasMany('App\Models\Cliente');
    }
}
