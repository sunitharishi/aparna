<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Template
 *
 * @package App
 * @property string $title
*/

class Template extends Model

{

    protected $fillable = ['code','name'];    

    public static function boot()
    {
        parent::boot();
        ClientStatus::observe(new \App\Observers\UserActionsObserver);
    }
}

