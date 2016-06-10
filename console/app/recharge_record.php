<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class recharge_record extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'recharge_records';

    // A payment belongs to User
    public function User()
    {
        return $this->belongsTo('App\User');
    }
}
