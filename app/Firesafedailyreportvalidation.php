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
class Firesafedailyreportvalidation extends Model
{
    use SoftDeletes; 
    
    protected $fillable = ['jockeypump','mainpump','dgpump','battery','dgtank','co2','dcp','water','boosterpumps','firealarmsystem','publicaddressys','sprinklercharged','dewaterpumps','yardhydrantpoints','cellarhydrantpoints','subcellarhydrapoints','firehosereeldrums','fireextinguishers','falsefirealaram','wetraisers','carbonemissionsys','flwmeterpanels','cphoses','firealarmrepeatpanel','firemockdrill','subcellarhydrant','pasysrepeaterpanel','groundindicationpanel','attendance','type','site'];
    
    public static function boot()
    {
        parent::boot(); 

        Firesafedailyreportvalidation::observe(new \App\Observers\UserActionsObserver);
    }
  
    
    /**
	,'valid_year','valid_month',
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
