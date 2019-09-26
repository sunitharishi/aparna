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

class Siteclubhouse extends Model 

{    

    use SoftDeletes; 
        

    protected $fillable = ['site','badminton_court','badminton_text','badminton_file','kitchen_court','kitchen_text','kitchen_file','clicnic_court','clicnic_text','clicnic_file','aerobics_court','aerobics_text','aerobics_file','lounge_court','lounge_text','lounge_file','spa_court','spa_text','spa_file','homethatre_court','homethatre_text','homethatre_file','indoorgam_court','indoorgam_text','indoorgam_file','changingrm_court','changingrm_text','changingrm_file','pantry_court','pantry_text','pantry_file','swimmingpool','indoorpool','outdoorpool','babypool','cbharea','swimmingtext','swimming_file','openrestu_court','openrestu_text','openrestu_file','supermark_court','supermark_text','supermark_file','tenniescourt_court','tenniescourt_text','tenniescourt_file','cricketnet','cricketnet_text','cricketnet_file','staking','staking_text','staking_file','squash','squash_text','squash_file','multi_purpose_hall','multi_purpose_text','multi_purpose_file','gym','gym_text','gym_file','cafeteria','cafeteria_text','cafeteria_file','library','library_text','library_file','yoga','yoga_text','yoga_file','guest','guest_text','guest_file','waiting','waiting_text','waiting_file','banquet','banquet_text','banquet_file','service','service_text','service_file','sitting','sitting_text','sitting_file','creche','creche_text','creche_file','basket','basket_text','basket_file','volley','volley_text','volley_file','guide'];   

       
    public static function boot()    
 
    {  

        parent::boot(); 

        Siteclubhouse::observe(new \App\Observers\UserActionsObserver);

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

