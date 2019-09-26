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
class AuditPrettyCashupload extends Model
{
    use SoftDeletes;  
     
    protected $fillable = ['site','month','year','user_id','type_of_project','effective_date','petty_cash_limit','person_responsible','opening_petty_cash_balance','opening_bills_to_be_received'];
    
    public static function boot()
    {
        parent::boot();

        AuditPrettyCashupload::observe(new \App\Observers\UserActionsObserver);
    }
}
