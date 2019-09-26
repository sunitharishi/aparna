<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Asset Types
 *
 * @package App
 * @property string $title
*/
class RepositoryType extends Model
{   
    protected $fillable = ['name'];
    
    public static function boot()
    {
        parent::boot();

        DailyreportStatus::observe(new \App\Observers\UserActionsObserver);
    }
}
