<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Action_History extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'actions_history';

    public function User()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the optimization record associated with this action.
     */
    public function optimization_result()
    {
        return $this->hasOne('App\optimzation_record', 'action_id');
    }

}
