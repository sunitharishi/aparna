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
class AuditChratecardUpload extends Model
{ 
    use SoftDeletes;  
     
    protected $fillable = ['site','month','year','user_id','type_of_project','ch_product','duration','valid_from','valid_to','gross_amount_as_per_rate_card'];  
    
    public static function boot()
    {
        parent::boot();

        AuditPrettyCashexpense::observe(new \App\Observers\UserActionsObserver);
    }
}
