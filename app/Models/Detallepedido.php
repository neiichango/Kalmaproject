<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detallepedido extends Model
{
    use HasFactory;

    public function pedido()
    {
        return $this->hasMany('App\Models\pedido');
    }


    public function producto()
    {
        return $this->hasMany('App\Models\Producto');
    }
}
