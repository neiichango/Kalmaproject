<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipovehiculo extends Model
{
    use HasFactory;


    public function vehiculo()
    {
        return $this->hasMany('App\Models\Vehiculo');
        //relacion verificada
    }


}
