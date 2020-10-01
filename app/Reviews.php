<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    function users(){
        return $this->belongsTo('App\User');
    }

}
