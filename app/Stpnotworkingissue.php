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
class Stpnotworkingissue extends Model
{
    use SoftDeletes; 
    
    protected $fillable = ['category','issue_des','root_cause','act_req_plan','pendingfromdays','reponsibility','notify_concern','estimation_time','ref_id','site'];
    
    public static function boot()
    {
        parent::boot();

        Stpnotworkingissue::observe(new \App\Observers\UserActionsObserver);
    }

    
    
    
}
