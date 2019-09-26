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

class Mmreventreport extends Model  

{ 
 
    use SoftDeletes;

    
    protected $fillable = ['site', 'year','month', 'type', 'location', 'report_date', 'description','before_image1','before_image2','before_image3','before_image4'];

   
    public static function boot()

    {

        parent::boot();

        Mmreventreport::observe(new \App\Observers\UserActionsObserver);

    } 

    

}

