<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    public function estadopedido()
    {
        return $this->belongsTo('App\Models\Estadopedido');
        //verificada
    }

    public function provincia()
    {
        return $this->belongsTo('App\Models\Provincia');
        //verificada
    }


    public function detallepedido()
    {
        return $this->hasMany('App\Models\Detallepedido');
        //relacion verificada
    }

    public function chofer()
    {
        return $this->belongsTo('App\Models\Chofer');
        //relacion verificada
    }

    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente');
        //relacion verificada
    }
}
