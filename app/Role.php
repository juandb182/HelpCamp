<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //Metodo que va a retornar la relacion con el usuario
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
