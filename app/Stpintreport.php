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

class Stpintreport extends Model

{
  
    use SoftDeletes;
	
	protected $fillable = ['site','year','month','test_report_no','vcr','report_idate','regis_no','regis_date','cus_ref','ref_date','analy_startdate','analy_compdate','stor_cond','cond_rec','qua_rec','sam_coll','ph','totdiss_solids','totsus_solids','cheoxy_demand','biooxy_demand','oil_grease','hardnesscaco','calciumca','alaklinitycaco','color','odour','turbidity','chloridescl','sulphatesso','nitratesno','stpinlet_pic'];

   
    public static function boot()

    {

        parent::boot();

        Stpintreport::observe(new \App\Observers\UserActionsObserver);

    }

    

}

