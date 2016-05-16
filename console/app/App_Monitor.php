<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class App_Monitor extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'app_monitors';

    // For mass-assignable
    protected $fillable =  ['vendor', 'app_id'];

    // A monitor belongs to an application
    public function application()
    {
        return $this->belongsTo('App\Application');
    }
}
