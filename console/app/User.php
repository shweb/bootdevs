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
        'name', 'email', 'password', 'country', 'avatar_path', 'github_id', 'bitbucket_id', 'codingnet_id', 'current_packageId', 'credit_amount'
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

    /* 
     * Define User and payment dependencies
     *
     */
     public function payment_records()
     {
  	return $this->hasMany('App\payment_record');
     }

    /* 
     * Define User and payment dependencies
     *
     */
     public function recharge_records()
     {
  	return $this->hasMany('App\recharge_record');
     }

    // A package has many to User
    public function current_package()
    {
        return $this->belongsTo('App\payment_package', 'current_packageId');
    }
}
