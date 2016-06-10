<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment_package extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bootdev_packages';

    // A package belongs to User
    public function Users()
    {
        return $this->hasMany('App\User', 'current_packageId');
    }

}
