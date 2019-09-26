<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Template
 *
 * @package App
 * @property string $title
*/

class CommunityAsset extends Model

{
    protected $fillable = ['name','code','amc_type','category_id','asset_id','asset_group','site_id','user_id','amc_interval','ppm_startdate','amc_startdate','amc_enddate','waranty_startdate','waranty_enddate','vendor','sop','asset_image','name_plate','service_report','location','ppm_type'];

    public function user()
    {
        return $this->belongsTo('App\User'); 
    }
}  