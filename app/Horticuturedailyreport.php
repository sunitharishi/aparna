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
class Horticuturedailyreport extends Model 
{    
    use SoftDeletes;   
     
    protected $fillable = ['site','reporton','user_id','land_atten_sup','land_atten_helper','land_water_qty','land_water_qty_reson','land_water_time','land_clean_sprinknw','land_clean_sprinkrw','land_clean_sprink_reason','land_atten_sup','solonide_valve_nw','solonide_valve_rw','solonide_valve_reason','quick_couple_nw','quick_couple_rw','quick_couple_reason','drip_stime1','drip_stime2','drip_stime3','drip_sotime1','drip_sotime2','drip_sotime3','sprink_stime1','sprink_stime2','sprink_stime3','sprink_sotime1','sprink_sotime2','sprink_sotime3','wtype','blockflag'];   
            
    public static function boot()        
    {    
        parent::boot();  

        Firesafedailyreport::observe(new \App\Observers\UserActionsObserver); 
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
