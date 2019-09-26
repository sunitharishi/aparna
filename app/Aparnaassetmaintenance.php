<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Template
 *
 * @package App
 * @property string $title
*/

class Aparnaassetmaintenance extends Model

{
    protected $fillable = ['name','code','amc_type','category_id','asset_id','site_id','user_id','amc_interval','ppm_startdate','amc_startdate','amc_enddate','waranty_startdate','waranty_enddate','cam_id','asset_type','alert_date','status'];

    public function user()
    {
        return $this->belongsTo('App\User'); 
    }
}  