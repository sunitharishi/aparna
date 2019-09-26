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
class Firesafedailyreport extends Model 
{    
    use SoftDeletes;   
     
    protected $fillable = ['site','reporton','user_id','training_on','trainsubject','trainingsnumtilldate','trainedpeople','suptotattendance','suppresentattendance','stewardsattendance','nightshiftattendance','jockeypumpauto','jockeypumpmanual','jockeypumpoff','jockeypumpnotworking','mainpumpauto','mainpumpmanual','mainpumpoff','mainpumpnotworking','dgpumpauto','dgpumpmanual','dglevel_max','dglevel_min','dglevel_high','batterytotal','bnworking','bnwreason','dgpumpoff','dgpumpnotworking','autoonoff_date','next_trail_date','lastmockdrillcondut','nextmockdrillconduct','waterdrainshed','previousdate','nextdate','reasonformanual','reasonforoff','boosterautopumps','boostermanualpumps','boosterpumpsoff','boosterpumpsnotworking','boosterreasonmanual','boosterreasonoff','firealaramsysworking','firealaramsysnotworking','firealaramnotworkingreason','passystemworking','passystemnotworking','passystemreasonnotworking','carbonemissionworking','carbonemissionnotworking','carbonemissreasonnotworking','sumpstotnum','sumplastcleandate','sumpwaterlevel','sumptotwaterlevel','sumppresentwaterlevel','sumppresentwaterlevel','ohtwaterlevel','totohtwaterlevel','ohttankstotnum','ohtnextcleaningdate','numofworkpermitsissued','generalworkpermitsnum','electricalworkpermitsissued','heightworkpermitsissued','veshtlpermitsissued','co2firenotworking','dcpfirenotworking','sumpnextcleaningdate','waterfirenotworking','inspectiondate','supattendance','boosterchecked_on_date','boostershedule_on_date','dewaterpumpauto','dewaterpumpmanual','dewaterpumpoff','dewaterpumpnotworking','falsealaram','falsealaramremarks','reason','grind_panel_working','grind_panel_ntworking','grind_panel_re_ntworking','fasys_panel_re_ntworking','fasys_panel_working','fasys_panel_ntworking','pasys_panel_working','pasys_panel_ntworking','pasys_panel_re_ntworking','ohtlastcleaneddate','blockflag','firesafety_major_ac'];   
            
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
