<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Asset Types
 *
 * @package App
 * @property string $title
*/
class RepositorycatType extends Model
{   
    protected $fillable = ['category','name'];
    
    public static function boot()
    {
        parent::boot();

        DailyreportStatus::observe(new \App\Observers\UserActionsObserver);
    }
}
