<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post_reply extends Model
{
    public function post(){
        return $this->belongsTo('App\Post');
    }
    public function User(){
        return $this->belongsTo('App\User');
    }
}
