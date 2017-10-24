<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'bio', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts(){
        return $this->hasMany('App\Post');
    }
    public function post_reply(){
        return $this->belongsTo('App\post_reply');
    }

    public function setNameAttribute($value)
    {
      $this->attributes['name'] = ucfirst($value);
    }

    public function setPasswordAttribute($value)
    {
      $this->attributes['password'] = bcrypt($value);
    }

}
