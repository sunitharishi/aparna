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

class Mmrslareport extends Model 

{    

    use SoftDeletes;  

        

    protected $fillable = ['site','month','year','user_id','number','unit','description','category','logged_by','assigned_to','logged_on','last_updated_on','escalation_level','aging','status','remarks'];  

        
       
    public static function boot()   
 
    {  
 
        parent::boot(); 



        Mmrslareport::observe(new \App\Observers\UserActionsObserver);

    }



      

    /** 

     * Set to null if empty

     * @param $input

     */


    

}

