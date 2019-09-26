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

class Firesafetymisreport extends Model 

{    

    use SoftDeletes; 

       

    protected $fillable = ['site','month','year','user_id','jk_pump_nw','jk_pump_auto','jk_pump_manual','jk_pump_off','jk_dwn_tm','main_pump_nw','main_pump_auto','main_pump_manual','main_pump_off','main_dwn_tm','dg_pump_nw','dg_pump_auto','dg_pump_manual','dg_pump_off','dg_dwn_tm','boostr_pump_nw','boostr_pump_auto','boostr_pump_manual','boostr_pump_off','boostr_dwn_tm','dewatr_pump_nw','dewatr_pump_auto','dewatr_pump_manual','dewatr_pump_off','dewatr_dwn_tm','yard_hyd_pns','yard_hyd_dwn_tm','cell_hyd_pns','cell_hyd_dwn_tm','sbcell_hyd_pns','sbcell_hyd_dwn_tm','frhsreel_drums','frhsreel_drums_dwn_tm','firealarm_sysm','firealaram_boxes','firealarm_sysm_dwn_tm','pa_sysm','pa_sysm_dwn_tm','fire_exting_sysm','fire_exting_dwn_tm','carbn_emiss_sysm','carbn_emiss_dwn_tm','flow_mtr_fire_sprink','flow_mtr_fire_sprink_dtm','cp_hoses','cp_hoses_dwn_tm','fire_ala_rep_panel','fire_ala_rep_panel_dtm','sprink_charged','sprink_charged_dwn_tm','fire_mock_drill','fire_mock_drill_next','fire_mock_drill_dwn_tm','false_alaram_sys','false_alaram_dwn_tm','wet_raiser','wet_raiser_dwn_tm','sub_cellar_one_hyd','sub_cellar_one_hyd_dtm','pa_sys_panel','pa_sys_panel_dwn_tm','gr_ind_panel','gr_ind_panel_dwn_tm','report_status','additional_info','noc_info'];  

      

    public static function boot()  

    { 

        parent::boot(); 



        Firesafetymisreport::observe(new \App\Observers\UserActionsObserver);

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

