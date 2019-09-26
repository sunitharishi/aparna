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

class Mmrppmreport extends Model  

{
 
    use SoftDeletes;

    
    protected $fillable = ['site', 'year','month', 'category', 'asset_name', 'location', 'description', 'type', 'status', 'report_on', 'beforeimage', 'afterimage'];

   
    public static function boot()

    {

        parent::boot();

        Mmrppmreport::observe(new \App\Observers\UserActionsObserver);

    }

    

}

