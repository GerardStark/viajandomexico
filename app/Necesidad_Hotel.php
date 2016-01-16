<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Necesidad_Hotel extends Model
{
    protected $table = 'necesidades_hotel';

    public function info(){
        return $this->belongsTo('App\Necesidad_Especial', 'id_necesidad');
    }
}
