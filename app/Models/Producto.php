<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    public function talla()
    {
        return $this->belongsToMany('App\Models\Talla');
    }


    public function categoria()
    {
        return $this->hasMany('App\Models\Categoria');
    }

    public function color()
    {
        return $this->hasMany('App\Models\Color');
    }

    public function detallepedido()
    {
        return $this->belongsTo('App\Models\DetallePedido');
    }
}
