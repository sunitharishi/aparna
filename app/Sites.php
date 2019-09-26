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
class Sites extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['title'];
    
    public static function boot()
    {
        parent::boot(); 

        Sites::observe(new \App\Observers\UserActionsObserver);
    }

    
    
    
}
