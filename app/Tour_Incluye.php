<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour_Incluye extends Model
{
    protected $table = 'tour_incluye';


    public function info()
    {
        return $this->belongsTo('App\Incluye', 'id_incluye');
    }
}
