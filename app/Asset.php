<?php

namespace App;



use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;



/**

 * Class Asset

 *

 * @package App

*/

class Asset extends Model

{
    protected $fillable = ['name', 'acode', 'category_id', 'template_id','user_id'];    

    public static function boot()
    {
        parent::boot();
        Asset::observe(new \App\Observers\UserActionsObserver);
    }
    public function templateinfo()
    {
        return $this->belongsTo('App\Template');
    }
    public function categoryinfo()
    {
        return $this->belongsTo('App\Category');
    }

}

