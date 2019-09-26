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
class Fmsdailyreport extends Model  
{    
    use SoftDeletes; 
    
    protected $fillable = ['site','reporton','user_id','pwr_ctpt','pwr_ctpt','pwr_lossec','pwr_residents','pwr_club_house','pwr_stp','pwr_wsp','pwr_tot_lt','pwr_lifts','pwr_vendors','pwr_common_area','pwr_others','pwr_solarpwrunits','pwr_pwrfactor','pwr_recordedkva','pwr_remarks','dgset_notworking','dgset_pwrfailure','dset_dieselconsume','dgset_dieselstock','dgset_dieselfilled','dgset_batterystatus','dgset_dgunits','dgset_abnormalities','wsp_salt','wsp_chlorine','wsp_metro','wsp_tankers','wsp_bores','wsp_tot_water','wsp_ppm_rw','wsp_ppm_tw_sump','wsp_ppm_tw_flat','stp_avg_inlet_water','stp_avg_treat_water','stp_avg_water_bypass','stp_residual_chlorine','stp_mlss','stp_chlorine','stp_sludge','stp_abnormalities','manpw_elect_actual','manpw_elect_deploy','manpw_plumb_actual','manpw_plumb_deploy','manpw_stp_actual','manpw_stp_deploy','manpw_fire_actual','manpw_fire_deploy','manpw_gas_actual','manpw_gas_deploy','manpw_other_actual','manpw_other_deploy','othser_lifts_nw','othser_lifts_ser','othser_lifts_bdser','othser_gas_totcons','misirrgsprinkautosys','miswatrbodypumps','mismistfoun','misindoorpool','misoutdoorpool','misbabypool','misboombarrier','missolarfencingzone','miscctv','misgasbankcham','othser_gas_empty','othser_gas_full','othser_gas_running','othser_gas_borewells','othser_swim_ph','othser_swim_chlorine','othser_swim_runhrs','othser_watbody_ph','othser_watbody_chlorine','othser_watbody_runhrs','othser_solar_fencing','other_irrigation_spinklr','comp_electrical_tot','comp_electrical_close','comp_gas_tot','comp_gas_close','comp_plumbing_tot','comp_plumbing_close','comp_civil_tot','comp_civil_close','comp_lifts_tot','comp_lifts_close','comp_ss_tot','comp_ss_close','comp_carpentary_tot','comp_carpentary_close','comp_other_tot','comp_other_close','clveri_stp','clveri_wsp','lists_verified','clveri_daily_brief','clveri_start_time','clveri_end_time','clveri_attend_num','asset_critical_observe','local_purchase','points_dis_hod_meeting','amc_visits','preventive_maintain','break_down_any','any_communication','storm_water_auto_pumps','storm_water_manual_pumps','storm_water_off_pumps','oozing_water_auto_pumps','oozing_water_manual_pumps','oozing_water_off_pumps','de_water_auto_pumps','de_water_manual_pumps','de_water_off_pumps','rain_water_auto_pumps','rain_water_manual_pumps','rain_water_off_pumps','storm_water_nw_pumps','oozing_water_nw_pumps','de_water_nw_pumps','rain_water_nw_pumps','reasontext','swim_pool_two_ph','swim_pool_two_chlr','swim_pool_two_rn_hrs','water_body_two_ph','water_body_two_chlr','water_body_two_rn_hrs','water_body_three_ph','water_body_three_chlr','water_body_three_rn_hrs','wsp_back_wash_rnhrs','wsp_filter_feed_pmp_rnhrs','wsp_hydro_pmp_sw_rnhrs','wsp_dewater_pmp_rnhrns','stp_back_wash_rnhrs','stp_filter_feed_pmp_rnhrs','stp_hydro_pmp_sw_rnhrs','stp_dewater_pmp_rnhrns','blockflag','incident_count','breakdown_count','jobcard_count','electrical_major_ac','plumbing_major_ac','gas_major_ac'];       
       
    public static function boot()
    { 
        parent::boot(); 

        Fmsdailyreport::observe(new \App\Observers\UserActionsObserver);
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
