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
class Progamctrackreport extends Model
{
    use SoftDeletes;  
    
    protected $fillable = ['site','month','year','user_id','asset_description','location','vendor_name','po_no_or_wo','amc_period_from','amc_period_to','capacity','amc','remarks'];
    
    public static function boot()
    {
        parent::boot();

        Progamctrackreport::observe(new \App\Observers\UserActionsObserver);
    }
 
    
    
    
}
