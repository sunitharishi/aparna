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
class DailyreportStatus extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['title'];
    
    public static function boot()
    {
        parent::boot();

        DailyreportStatus::observe(new \App\Observers\UserActionsObserver);
    }

    
    
    
}
