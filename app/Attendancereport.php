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
class Attendancereport extends Model
{
    use SoftDeletes;  
    
    protected $fillable = ['site','department','report_date','user_id','intime','outtime','empcode','duration','remarks','name','shift','status','category','sintime','souttime','workduration','ot','lateby','earlygoingby'];
    
    public static function boot()
    {
        parent::boot();

        Attendancereport::observe(new \App\Observers\UserActionsObserver);
    }
 
    
    
    
}
