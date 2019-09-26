<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Template
 *
 * @package App
 * @property string $title
*/

class Rideonpms extends Model
  
{
    protected $fillable = ['site', 'rdate', 'ride_mname','ride_location','ride_rhrs','ride_acovred','ride_nw','ride_spares','ride_btotal','ride_bhrs','ride_bnw','ride_breason'];

    public function user()
    {
        return $this->belongsTo('App\User'); 
    }
}