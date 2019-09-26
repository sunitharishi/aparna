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

class Wspmotreport extends Model

{
  
    use SoftDeletes;
	
	protected $fillable = ['site','year','month','test_report_no','vcr','report_idate','regis_no','regis_date','cus_ref','ref_date','analy_startdate','analy_compdate','stor_cond','cond_rec','qua_rec','sam_coll','ph','conductivity','colour','turbidity','solids','phenocaco','orangecaco','hardnesscaco','lardnesscaco','calciumca','magneslummg','sodiumna','pctassiurnk','ironfe','ful_jr_off_facility','ful_get','ful_sr_supervisor','ful_super_facility','ful_super_maintainance','ful_dy_manger_pms','ful_asst_mngr_pms','ful_sr_exec_pms','ful_exec_pms','silicasio','fluoridef','chloridesci','sulphatesso','nitratesno','chlorinede','wspoutlet_pic'];

   
    public static function boot()

    {

        parent::boot();

        Wspmotreport::observe(new \App\Observers\UserActionsObserver);

    }

    

}

