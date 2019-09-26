<?php

namespace App;



use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;



/**

 * Class Client

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

class Auditsum extends Model

{

    use SoftDeletes;

    

     protected $fillable = ['type','count','site_id'];


    
 
    public static function boot()

    {

        parent::boot();



        Auditsum::observe(new \App\Observers\UserActionsObserver);

    }
 


    

    /**

     * Set to null if empty

     * @param $input

     */

  
}

