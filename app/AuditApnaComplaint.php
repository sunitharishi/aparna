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
class AuditApnaComplaint extends Model
{
    use SoftDeletes;  
     
    protected $fillable = ['site','month','year','user_id','unit','nature','category','logged_by','assigned_to','serviced_by','logged_on','last_updated_on','escalation_level','status','aging'];
    
    public static function boot()
    {
        parent::boot();

        Progamctrackreport::observe(new \App\Observers\UserActionsObserver);
    }
 
    
    
    
}
