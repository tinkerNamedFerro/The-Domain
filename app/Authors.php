<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Authors extends Model
{
    function books(){
        return $this->belongsToMany('App\Books', 'authors_books');
    }
}
