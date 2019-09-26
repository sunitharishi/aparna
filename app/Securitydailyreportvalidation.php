<?php
namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Vendor
 *
 * @package App
 * @property string $first_name
 * @property string $last_name
 * @property string $company_name
 * @property string $email
 * @property string $phone
 * @property string $website
 * @property string $skype
 * @property string $country
 * @property string $client_status
*/
class Securitydailyreportvalidation extends Model
{
    use SoftDeletes; 
    
    protected $fillable = ['cctv','boombarrier','wt','torches','biomachine','av_tabs','av_whistles','av_batons','av_rain_c','av_umbrellas','bicycle','computers','internetcon','street_lights','type','site'];
    
    public static function boot()
    {
        parent::boot(); 

        Securitydailyreportvalidation::observe(new \App\Observers\UserActionsObserver);
    }

        
    /** 
     * Set to null if empty
     * @param $input
     */
    public function setClientStatusIdAttribute($input)
    {
        $this->attributes['client_status_id'] = $input ? $input : null;
    }
    
    public function client_status()
    {
        return $this->belongsTo(ClientStatus::class, 'client_status_id')->withTrashed();
    }
    
}
