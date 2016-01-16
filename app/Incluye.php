<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incluye extends Model
{
    protected $table = 'incluye';


    public function info(){
        return $this->belongsTo('App\Incluye', 'id_incluye');
    }
}
