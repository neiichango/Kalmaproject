<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Talla extends Model
{
    use HasFactory;


    public function producto()
    {
        return $this->belongsToMany('App\Models\Producto');
    }
}
