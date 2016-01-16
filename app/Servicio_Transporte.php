<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio_Transporte extends Model
{
    //
    protected $table = 'serv_transportes';

    public function info()
    {
        return $this->belongsTo('App\ServTrans', 'id_servicio');
    }
}

