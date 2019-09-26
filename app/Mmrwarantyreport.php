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

class Mmrwarantyreport extends Model  

{ 
 
    use SoftDeletes;

    
    protected $fillable = ['site', 'year','month', 'asset_description', 'capacity_qty', 'location', 'vendor_name','PO/WO','warranty_from','warranty_to','amc_from','amc_to','amc_status','remarks'];

   
    public static function boot()

    {

        parent::boot();

        Mmrhkcmmonthlyreport::observe(new \App\Observers\UserActionsObserver);

    } 

    

}

