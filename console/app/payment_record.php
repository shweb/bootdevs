<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment_record extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'payment_records';

    // A payment belongs to User 
    public function User()
    {
        return $this->belongsTo('App\User');
    }


}
