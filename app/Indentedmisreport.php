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
class Indentedmisreport extends Model
{
    use SoftDeletes; 
    
    protected $fillable = ['site','month','year','user_id','laggeddate','pr_nos','pr_date','po_qty','item_code','item_desc','uom','pr_qty','po_no','po_date','lead_time_of_days','date_of_submission','days_from_submission','lagged_time_upto'];
    
    public static function boot()
    {
        parent::boot();

        Indentedmisreport::observe(new \App\Observers\UserActionsObserver);
    }

    
    
    
}
