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

class Housekpmisreport extends Model 

{    

    use SoftDeletes;  

        

    protected $fillable = ['site','month','year','user_id','physical_presence','garbage_disposal','brooms_hard','brooms_soft','cleaners_floor','cleaners_tolet','freshner','debristripavg','corridors_sweeping','corridors_water_wash','staircase_clean','cell_subcel_clean','cell_subcel_clean_wtr_wash','cobwebsremoval','roadsweepclean','report_status'];  

             
       
    public static function boot()   
 
    {  

        parent::boot(); 



        Housekpmisreport::observe(new \App\Observers\UserActionsObserver);

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

