<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    public function producto()
    {
        return $this->hasMany('App\Models\Producto');
//relacion verificada



    }
}
