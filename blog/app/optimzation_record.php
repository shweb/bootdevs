<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class optimzation_record extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'app_optimization_log';

    public function history()
    {
        return $this->belongsTo('Action_History');
    }
}


