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
class Repository extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['title','user_id','site','file','status','category','itemsubcategory'];
    
    public static function boot()
    {
        parent::boot();

        Repository::observe(new \App\Observers\UserActionsObserver);
    }

    
    
    
}
