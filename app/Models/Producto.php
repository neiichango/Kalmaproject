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
        //relacion verificada
    }


    public function categoria()
    {
        return $this->belongsTo('App\Models\Categoria');
        //relacion verificada
    }

    public function color()
    {
        return $this->belongsTo('App\Models\Color');
        //relacion verificada
    }

    public function detallepedido()
    {
        return $this->hasMany('App\Models\DetallePedido');
        //relacion verificada
        
    }
}
