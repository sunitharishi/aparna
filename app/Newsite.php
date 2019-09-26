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

class Newsite extends Model

{

    use SoftDeletes; 

    

    protected $fillable = ['name', 'scode', 'plot_num', 'hnum', 'near_place', 'village', 'mandal','district','state','pincode','geo_latitude','geo_longitude','tot_site_area','built_up_area','blocks_num','num_of_blocks_text','num_of_floors','num_of_floors_text','basement_one','basement_two','basement_three','num_of_flats','landscape_area','helipad','helipad_text','helippad_file','transformers','dgsets','power_backup','power_backup_file','solar_power','solar_pwr_text','solar_pwr_file','wsp','wsp_file','stp','gas_banks','fire_pump_rooms','lifts','prepaid_systems','hydro_pneumatic_sys','hydro_pneumatic_sys_file','guide_file','status'];

    

    public static function boot() 

    {

        parent::boot();



        Newsite::observe(new \App\Observers\UserActionsObserver);

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

