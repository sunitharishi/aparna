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
class AuditHorticultureUpload extends Model
{
    use SoftDeletes;  
    
    protected $fillable = ['site','month','year','user_id','block_or_area','fa','sfa','activity_category','activity_sub_category','item_name','uom'];
     
    public static function boot()
    {
        parent::boot();

        Progamctrackreport::observe(new \App\Observers\UserActionsObserver);
    }
 
    
    
    
}
