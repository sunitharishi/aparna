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

class TemplateSection extends Model

{


    protected $fillable = ['template_id','title','inputs_per_row','sort'];    

    public static function boot()
    {
        parent::boot();
        ClientStatus::observe(new \App\Observers\UserActionsObserver);
    }
}

