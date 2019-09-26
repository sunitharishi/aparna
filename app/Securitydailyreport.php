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

class Securitydailyreport extends Model 

{    

    use SoftDeletes; 

    

  

	 

	  

	  

	    protected $fillable = ['site','reporton','user_id','ds_guard','ds_lguard','ds_hguard','ds_sup','ds_aso','ds_so','ds_remarks','dp_guard','dp_lguard','dp_hguard','dp_sup','dp_aso','dp_so','dp_remarks','pha_guard','pha_lguard','pha_hguard','pha_sup','pha_aso','pha_so','pha_remarks','wko_guard','wko_lguard','wko_hguard','wko_sup','wko_aso','wko_so','wko_remarks','ab_guard','ab_lguard','ab_hguard','ab_sup','ab_aso','ab_so','ab_remarks','tfo_guard','tfo_lguard','tfo_hguard','tfo_sup','tfo_aso','tfo_so','tfo_remarks','tto_guard','tto_lguard','tto_hguard','tto_sup','tto_aso','tto_so','tto_remarks','rsv_guard','rsv_lguard','rsv_hguard','rsv_sup','rsv_aso','rsv_so','rsv_remarks','dsh_guard','dsh_lguard','dsh_hguard','dsh_sup','dsh_aso','dsh_so','dsh_remarks','nsh_guard','nsh_lguard','nsh_hguard','nsh_sup','nsh_aso','nsh_so','nsh_remarks','lt20_guard','lt20_lguard','lt20_hguard','lt20_sup','lt20_aso','lt20_so','lt20_remarks','lt50_guard','lt50_lguard','lt50_hguard','lt50_sup','lt50_aso','lt50_so','lt50_remarks','lt52_guard','lt52_lguard','lt52_hguard','lt52_sup','lt52_aso','lt52_so','lt52_remarks','kff_guard','kff_lguard','kff_hguard','kff_sup','kff_aso','kff_so','kff_remarks','kdsh_guard','kdsh_lguard','kdsh_hguard','kdsh_sup','kdsh_aso','kdsh_so','kdsh_remarks','knsh_guard','knsh_lguard','knsh_hguard','knsh_sup','knsh_aso','knsh_so','knsh_remarks','add_guard','add_lguard','add_hguard','add_sup','add_aso','add_so','add_remarks','del_guard','del_lguard','del_hguard','del_sup','del_aso','del_so','del_remarks','wu_guard','wu_lguard','wu_hguard','wu_sup','wu_aso','wu_so','wu_remarks','ws_guard','ws_lguard','ws_hguard','ws_sup','ws_aso','ws_so','ws_remarks','bm_guard','bm_lguard','bm_hguard','bm_sup','bm_aso','bm_so','bm_remarks','ae_guard','ae_lguard','ae_hguard','ae_sup','ae_aso','ae_so','ae_remarks','nw_cctv','nw_boom','nw_wt','nw_torch','nw_bio','nw_remarks','av_tab','av_whi','av_bat','av_rai','av_umb','av_remarks','sf_zone1','sf_zone2','sf_zone3','sf_zone4','sf_tkit','sf_remarks','aw_maid','aw_dri','aw_ven','aw_inte','aw_others','aw_remarks','ds_pending','nts_time','nbc_chk','wo_stick_2w','wo_stick_4w','mis_keys','interior_works','night_check_by','night_check_time','violations','occurances','drunkcase','parades','cellphone_abuses','srstaffvisits','reason','aw_cons_workers','id_maid','id_dri','id_ven','id_cons_workers','id_inte','id_others','id_remarks','lost_found','sleeping_case','blockflag','tr_resident_vehicle','tr_temp_vendors','tr_courier_delivery','tr_visitors','tr_construction','tr_inter_works','tr_interior_works_perday'];  
 
         

    public static function boot() 

    {     

        parent::boot();  



        Securitydailyreport::observe(new \App\Observers\UserActionsObserver);

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

