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
class Apnacomplaintmisreport extends Model
{
    use SoftDeletes;  
    
    protected $fillable = ['site','month','year','user_id','complaint_category','previous_pending','opened','resolved','total_outstanding','no_escalation','escalated_to_l2','escalated_to_l3'];
    
    public static function boot()
    {
        parent::boot();

        Apnacomplaintmisreport::observe(new \App\Observers\UserActionsObserver);
    }
 
    
    
    
}
