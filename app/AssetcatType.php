<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Asset Types
 *
 * @package App
 * @property string $title
*/
class AssetcatType extends Model
{   
    protected $fillable = ['category','name','ccode','description','prefix'];
    
    public static function boot()
    {
        parent::boot();

        DailyreportStatus::observe(new \App\Observers\UserActionsObserver);
    }
}
