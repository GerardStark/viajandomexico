<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class restaurante extends Model
{
    protected $table = 'restaurantes';

    public function nomstate(){
        return $this->belongsTo('App\Estado','estado');
    }

    public function nommunicipio(){
        return $this->belongsTo('App\Municipio','municipio');
    }

    public function nomlocalidad(){
        return $this->belongsTo('App\Localidad','localidad');
    }
}
