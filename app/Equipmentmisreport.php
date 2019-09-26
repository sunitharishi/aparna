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

class Equipmentmisreport extends Model 

{    

    use SoftDeletes;  
 
        

    protected $fillable = ['site','month','year','user_id','3panel_nw','3panel_dtm','4panel_nw','4panel_dtm','ctpt_nw','ctpt_dtm','5panel_nw','5panel_dtm','transformer_nw','transformer_dtm','mainpcc_nw','mainpcc_dtm','apfcr_nw','apfcr_dtm','common_supply_nw','common_supply_dtm','bus_duct_nw','bus_duct_dtm','distribu_board_nw','distribu_board_dtm','vcb_nw','vcb_dtm','acb_nw','acb_dtm','landscape_lpanel_nw','landscape_lpanel_dtm','club_house_panel_nw','club_house_panel_dtm','lighting_arrestor_nw','lighting_arrestor_dtm','tot_no_lights_nw','tot_no_lights_dtm','lifts_nw','lifts_dtm','dg_sets_nw','dg_sets_dtm','full_bkp_dtm','partial_bkp_dtm','bore_wells_nw','bore_wells_nw','hmws_nw','hmws_dtm','water_ds_dtm','fws_dtm','prvs_nw','prvs_dtm','sewerage_dtm','irrigatn_pmp_nw','irrigatn_pmp_auto','irrigatn_pmp_manual','irrigatn_pmp_off','irrigatn_pmp_dtm','irrigatn_pmp_panel_dtm','irrigatn_pmp_panel_nw','irrigatn_spr_as_dtm','water_body_pumps_nw','water_body_pumps_auto','water_body_pumps_man','water_body_pumps_off','water_body_pumps_dtm','mist_fountain_nw','mist_fountain_dtm','strm_Water_nw','strm_Water_auto','strm_Water_man','strm_Water_off','strm_Water_dtm','oozing_pump_nw','oozing_pump_auto','oozing_pump_man','oozing_pump_off','oozing_pump_dtm','excess_rain_wt_nw','excess_rain_wt_dtm','rain_water_har_nw','bore_wells_dtm','rain_water_har_dtm','indoor_dtm','outdoor_dtm','baby_dtm','boom_bar_nw','boom_bar_dtm','solar_fen_nw','solar_fen_dtm','cctv_nw','cctv_dtm','fresh_air_nw','fresh_air_dtm','stp_ahu_nw','stp_ahu_dtm','gas_bank_chambr_dtm','excess_rain_wt_auto','excess_rain_wt_man','excess_rain_wt_off','report_status','additional_info','mis_indoorpool_nw','mis_outdoorpool_nw','misfull_nw','partia_nw','dws_nw','fws_nw','sewerage_nw','irrigatn_spr_as_nw','mis_babypool_nw','gas_bank_chambr_nw'];  

           
       
    public static function boot()   

    {  

        parent::boot(); 



        Equipmentmisreport::observe(new \App\Observers\UserActionsObserver);

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

