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

class Site extends Model

{ 

    use SoftDeletes; 

    

  //  protected $fillable = ['name', 'scode', 'flats_num', 'address', 'assets_num', 'blocks_num', 'logo','total_site_area','vendor_directory','built_up_area','helipad_area','apartments_num','club_house','towers_num','bms_room','floors_num','security_room','color_codes','transformers','tiles_identification','dgsets','solar_power','exit_ramps','manjeera_water','mech_ventilation','borewells','oh_tanks','wsp','rain_water_sumps','stp','de_watering_sumps','gas_banks','inigation_sumps','fire_pump_rooms','fire_sumps','lifts','oozing_pits','solar_water_heaters','water_bodys','prepaid_systems','water_supply','entry_ramps','status'];
   protected $fillable = ['name', 'scode', 'plot_num', 'hnum', 'near_place', 'village', 'mandal','district','state','pincode','geo_latitude','geo_longitude','tot_site_area','built_up_area','scalablearea','blocks_num','num_of_blocks_text','num_of_floors','num_of_floors_text','basement_one','num_of_flats','num_of_vallas','hard_land_scpae_area','soft_land_scpae_area','helipad','helipad_text','helippad_file','transformers','dgsets','power_backup','solar_power','solar_pwr_text','wsp','stp','gas_banks','fire_pump_rooms','lifts','status','prepaid_start_date','prepaid_end_date','igbc_certified','rating','open_space','flat_type','basement_text','rainwater_harvest','borewells','bms_prepaid','bms_postpaid','bms_irrigation_sys','contracted_md','specified_voltage','actuval_voltage','feeder','category','municipal_water','contracted_kl','smoke','smoke_image','heat','heat_image','public_addressing_system','fire_alaram_system','solar_water_heater','solar_water_heat_text','boombarier_meter','cctv_number','cctv_make','solar_fence_zones','solar_fence_make','solar_fence_length','postpaid','postpaid_numtext','logoimage','mws_pums_num','mws_make','mws_capacity','dws_pums_num','dws_make','dws_capacity','fws_pums_num','fws_make','fws_capacity','flow_anounciator','lighten_protection'];   
   
      
     
    public static function boot() 

    {

        parent::boot();



        Vendor::observe(new \App\Observers\UserActionsObserver);

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

