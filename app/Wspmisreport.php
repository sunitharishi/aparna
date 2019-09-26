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

class Wspmisreport extends Model 

{    

    use SoftDeletes;  

        

    protected $fillable = ['site','month','year','user_id','filter_feed_pmp','de_Water_pump','chlr_dos_pump','hydro_pneuamt_pump','pneumatic_sys_pa','wsp_mcc_panel','pressure_san_filt','softner','obr_value','raw_water_ppm','water_ppm_main_Stnd','filter_media_repl_date','report_status','filter_feed_pmp_dtm','de_Water_pump_dtm','chlr_dos_pump_dtm','hydro_pneuamt_pump_dtm','pneumatic_sys_pa_dtm','wsp_mcc_panel_dtm','pressure_san_filt_dtm','softner_dtm','obr_value_dtm','raw_water_ppm_dtm','water_ppm_main_Stnd_dtm','filter_media_repl_date_dtm','additional_info'];  

        
       
    public static function boot()   
 
    {  
 
        parent::boot(); 



        Wspmisreport::observe(new \App\Observers\UserActionsObserver);

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

