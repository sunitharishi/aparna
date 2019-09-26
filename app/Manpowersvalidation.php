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

class Manpowersvalidation extends Model

{

    use SoftDeletes;  
	
    protected $fillable = ['site','month','year','type','title','general','a','b','c','mnos','sorder','mpdays'];
 
      

    public static function boot()

    {

        parent::boot();  

 

        Manpowersvalidation::observe(new \App\Observers\UserActionsObserver);

    }



     

    /**

     * Set to null if empty

     * @param $input

     */

   

}

