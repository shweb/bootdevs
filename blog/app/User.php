<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'country',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /* 
     * Define User and applications dependencies
     *
     */
     public function applications()
     {
  	return $this->hasMany('App\Application');
     }

    /* 
     * Define User and history dependencies
     *
     */
     public function history()
     {
  	return $this->hasMany('App\Action_History');
     }
}
