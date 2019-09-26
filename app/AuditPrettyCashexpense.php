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
class AuditPrettyCashexpense extends Model
{
    use SoftDeletes;  
     
    protected $fillable = ['site','month','year','user_id','type_of_project','exp_category','bill_no','bill_date','amount_spent','date_of_bill_submission_to_ho','reimbersement_received'];  
    
    public static function boot()
    {
        parent::boot();

        AuditPrettyCashexpense::observe(new \App\Observers\UserActionsObserver);
    }
}
