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

class Pmsdailyreport extends Model 

{    

    use SoftDeletes; 
 
      

    protected $fillable = ['site','reporton','user_id','land_atten_sup','land_atten_helper','land_water_qty','land_water_qty_reson','land_water_time','land_clean_sprinknw','land_spray_location','land_Weeding_location','land_mowing_location','land_application','land_mulching','land_trimming','land_cutting','land_pruning','land_shaping','land_hoeing','land_garden_waste','land_extra_activity','housekp_atten_sup','rmachine_total','housekp_atten_helper','housekp_rideon_hrs','ride_acovered','ride_chrs','ride_nw','ride_reason','ride_btotal','rmachine_total','ride_bnw','ride_bnreason','ride_spares','smachine_total','scrub_hrs_run','scrub_location','scrub_acovered','scrub_nw','scrub_reason','scrub_spares','housekp_location','housekp_debr_tipsnum','housekp_debr_vol','housekp_debr_garbage','housekp_thefts','housekp_violation_notice','housekp_area_inspect','housekp_pest','clbhous_att_frntofc','clbhous_att_housekp','clbhous_att_other','clbhous_revenue_day','clbhous_pwr_units','clbhous_users_gym','clbhous_users_pool','clbhous_users_tennis','clbhous_shuttle','clbhous_basketball','clbhous_skatting','clbhous_users_remarks','apna_apms_previous','apna_apms_opened_help','apna_apms_opened_login','apna_apms_opened_total','apna_apms_resolved','apna_apms_pending','apna_apms_remarks','apna_project_previous','apna_project_opened_help','apna_project_opened_login','apna_project_opened_total','apna_project_resolved','apna_project_pending','apna_project_remarks','occupancy_move_owners','occupancy_move_tenants','occupancy_vacated_owners','occupancy_vacated_tenants','occupancy_asdate_owners','occupancy_asdate_tenants','occupancy_asdate_vacant','occupancy_asdate_remarks','imprest_cash_on_hand','imprest_bills_on_hand','imprest_dateof_statement','dateof_statement_amount','gas_transact_supervise_by','gas_transact_full_cyl_recd','gas_empty_cyl_taken_out','info_attend_verified','info_attend_datesheet_pend','info_parking_display','jobs_pending','comminication_with_mc','reasontext','gas_transact_socity','gas_transact_security','housekp_remarks','land_spray_mem','land_Weeding_memcn','land_mowing_memcn','land_application_mem','land_mulching_mem','land_trimming_mem','land_cutting_mem','land_pruning_mem','land_shaping_mem','land_hoeing_mem','land_garden_waste_mem','land_extra_activity_mem','supervisor','commercial_activate','solonide_valve_nw','quick_couple_nw','power_point_nw','imprest_dateof_statement_2','dateof_statement_amount_2','fogg_hrs_run','fogg_location','blockflag'];  
  
            
  
    public static function boot()

    { 

        parent::boot(); 



        Pmsdailyreport::observe(new \App\Observers\UserActionsObserver);

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

