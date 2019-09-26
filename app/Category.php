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
class Category extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['name','ccode','description'];
    
    public static function boot()
    {
        parent::boot();

        DailyreportStatus::observe(new \App\Observers\UserActionsObserver);
    }

    
    
    
}
