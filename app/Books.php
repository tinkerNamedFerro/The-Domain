<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    function authors(){
        return $this->belongsToMany('App\Authors', 'authors_books');
    }

    function reviews(){
        return $this->hasMany('App\Reviews');
    }
}
