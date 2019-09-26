<?php
namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ClientStatus
 *
 * @package App
 * @property string $title
*/
class Assetgroup extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['name','agcode','description'];
    
    public static function boot()
    { 
        parent::boot();

        DailyreportStatus::observe(new \App\Observers\UserActionsObserver);
    }

    
    
    
}
