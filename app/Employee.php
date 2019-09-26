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
class Employee extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['name','ecode','community','category','age','surname','maritalstatus','gender','refname','aadhar_num','phone','alterphone','homephone','email','temp_address','permanent_address','other'];
    
    public static function boot()
    {
        parent::boot(); 
  
        Employee::observe(new \App\Observers\UserActionsObserver);
    }

    
 
    
}
 