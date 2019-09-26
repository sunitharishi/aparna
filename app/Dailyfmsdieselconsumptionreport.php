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

class Dailyfmsdieselconsumptionreport extends Model 

{    

    use SoftDeletes;  

        

    protected $fillable = ['site','dgblock','present_dg_runtm','prev_dg_runtm','dg_run_difference','present_dg_units','prev_dg_units','dg_units_difference','dg_diesel_op_con','dg_diesel_clos_con','dg_diesel_diff_con','dg_diesel_filled','ref_id','reporton'];  
  
             
       
    public static function boot()   
 
    {  

        parent::boot(); 



        Dailyfmsdieselconsumptionreport::observe(new \App\Observers\UserActionsObserver);

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

