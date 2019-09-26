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
class AuditClubhouseUtilization extends Model
{
    use SoftDeletes;  
    
    protected $fillable = ['site','month','year','user_id','payment_cal_month','payment_date','receipt_num','falt_num','name','chrate_card_category','duration','valid_from','valid_to','members_rooms','gross_amount','cleaning_charges','electrical_charges','s_tax','total_invoice_amount','payment_mode','cash_rs','cheque_received','cheque_number','card_rs','neft','neft'];
    
    public static function boot()
    {
        parent::boot();

        Progamctrackreport::observe(new \App\Observers\UserActionsObserver);
    }
 
    
    
    
}
