<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Servicio_Hotel extends Model
{
    protected $table = 'servicios_hotel';

    public function info(){
        return $this->belongsTo('App\Servicio', 'id_servicio');
    }
}
