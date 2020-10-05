<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    use HasFactory;
    use \Awobaz\Compoships\Compoships;



    public function canton()
    {
        return $this->hasMany('App\Models\Canton', ['canton_id', 'provincia_id'], ['id', 'provincia_id']);
    }
}
