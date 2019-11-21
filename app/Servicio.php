<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
   protected $fillable = ['name','precio','fechai','fechac','imange','descripcion','slug'];

   /**
 * Get the route key for the model.
 *
 * @return string
 */
public function getRouteKeyName()
{
    return 'slug';
}
}
