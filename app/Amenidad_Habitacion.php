<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amenidad_Habitacion extends Model
{
    protected $table = 'amenidades_habitacion';

    public function info(){
        return $this->belongsTo('App\Amenidad', 'id_amenidad');
    }
}
