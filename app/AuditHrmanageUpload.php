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
class AuditHrmanageUpload extends Model
{
    use SoftDeletes;  
    
    protected $fillable = ['site','month','year','user_id','fa','sfa','designation','cal_month','sd_net','date','sd_gross','conv_fact'];
    
    public static function boot()
    {
        parent::boot();

        Progamctrackreport::observe(new \App\Observers\UserActionsObserver);
    }
 
    
    
    
}
