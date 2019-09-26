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
  
class Mmrhousekconsume extends Model

{
   
    use SoftDeletes;

    
    protected $fillable = ['site', 'year','month', 'category', 'location', 'description', 'report_on', 'remarks','type'];

   
    public static function boot()

    {

        parent::boot();

        Mmrhousekconsume::observe(new \App\Observers\UserActionsObserver);

    }

    

}

