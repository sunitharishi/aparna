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

class Borewellsnwmisreport extends Model 

{    

    use SoftDeletes; 

      

    protected $fillable = ['site','month','year','user_id','nw_bores_num','no_ground_water','over_load','motor_brunt','cable_prblm','pumpormotorwear','others','dry_run_protectn','flow_meter','remarks','report_status'];  

      

    public static function boot()  

    { 

        parent::boot(); 



        Borewellsnwmisreport::observe(new \App\Observers\UserActionsObserver);

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

