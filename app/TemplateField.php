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

class TemplateField extends Model

{

    protected $fillable = ['template_id','section_id','label','itype','idefault','ioptions','required','ivalids','sort'];

    public static function boot()
    {
        parent::boot();
        ClientStatus::observe(new \App\Observers\UserActionsObserver);
    }
}

