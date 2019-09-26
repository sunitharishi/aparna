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
class Pmsdailyreportvalidation extends Model
{
    use SoftDeletes; 
    
    protected $fillable = ['site','type','sprinklers','flats','land_sup','land_helper','house_sup','house_help','garden_area','clu_hs_fo','clu_hs_hk','other','one_bhk','two_bhk','three_bhk','four_bhk','solonide_valves','quick_coupling_valves','power_point','supervisor','rmachine_total','smachine_total','ride_btotal','rsweeping_area','ssweeping_area','ride_machines','scrub_machines'];
    
    public static function boot()
    {
        parent::boot();  
 
        Pmsdailyreportvalidation::observe(new \App\Observers\UserActionsObserver);
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
