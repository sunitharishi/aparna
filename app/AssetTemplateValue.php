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

class AssetTemplateValue extends Model

{
    protected $fillable = ['asset_id','field_id','value'];

    public static function boot()
    {
        parent::boot();
        ClientStatus::observe(new \App\Observers\UserActionsObserver);
    }
}

