<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Canton extends Model
{
    use HasFactory;
    use \Awobaz\Compoships\Compoships;


    public function provincia()
    {
        return $this->hasMany('App\Models\Provincia');
    }

    public function distrito()
    {
        return $this->belongsTo('App\Models\Distrito',['canton_id','provincia_id'], ['id', 'provincia_id']);
    }

}
