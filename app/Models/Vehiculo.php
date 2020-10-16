<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    public function chofer()
    {
        return $this->hasMany('App\Models\Chofer');
        //relacion verificada
    }

    public function tipovehiculo()
    {
        return $this->belongsTo('App\Models\Tipovehiculo');
        //relacion verificada
    }




}
