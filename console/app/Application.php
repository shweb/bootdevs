<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'applications';

    public function User()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the server monitors  for this application.
     */
    public function monitors()
    {
        return $this->hasMany('App\App_Monitor', 'app_id');
    }

    /**
     * Get the action history for this application.
     */
    public function history()
    {
        return $this->hasMany('App\Action_History', 'app_id');
    }

}
