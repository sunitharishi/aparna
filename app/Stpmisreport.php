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

class Stpmisreport extends Model 

{    

    use SoftDeletes;  

        

    protected $fillable = ['site','month','year','user_id','bar_scr_chbr_nw','raw_sav_pmp_nw','air_blow_nw','retrn_sludge_nw','filter_feed_nw','screw_cent_nw','centri_filter_nw','de_Water_nw','air_handling_nw','chlorine_dos_nw','uv_sys_nw','hydro_numa_nw','pnumatic_sys_nw','stp_mcc_nw','pressure_san_nw','act_carb_nw','avg_inflow','avg_out_flow','avg_bypass','avg_outflow_other','next_filter_media_date','report_status','bar_scr_chbr_dtm','raw_sav_pmp_dtm','air_blow_dtm','retrn_sludge_dtm','filter_feed_dtm','screw_cent_dtm','centri_filter_dtm','de_Water_dtm','air_handling_dtm','chlorine_dos_dtm','uv_sys_dtm','hydro_numa_dtm','pnumatic_sys_dtm','stp_mcc_dtm','pressure_san_dtm','act_carb_dtm','avg_inflow_dtm','avg_out_flow_dtm','avg_bypass_dtm','avg_outflow_other_dtm','next_filter_media_dtm','additional_info'];  

          
       
    public static function boot()   
 
    {  

        parent::boot(); 



        Stpmisreport::observe(new \App\Observers\UserActionsObserver);

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

