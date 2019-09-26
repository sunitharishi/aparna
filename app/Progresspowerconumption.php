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

class Progresspowerconumption extends Model 

{     

    use SoftDeletes; 

      

    protected $fillable = ['site','month','year','user_id','scalable_area','com_area_pwr_consump','consump_per_month','report_status','consump_avg_per_month','remarks']; 

    public static function boot()

    { 

        parent::boot(); 



        Progresspowerconumption::observe(new \App\Observers\UserActionsObserver);

    }



    

    /** 

     * Set to null if empty

     * @param $input

     */

   
    

}

