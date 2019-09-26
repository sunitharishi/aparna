<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Template
 *
 * @package App
 * @property string $title
*/

class Incident extends Model

{
    protected $fillable = ['refid','site_id','title','category_id','sub_category_id','failure_reason','idate','required_spares','process_work','user_id','asset_id'];

    public function user()
    {
        return $this->belongsTo('App\User'); 
    }
    public function site()
    {
        return $this->belongsTo('App\Site'); 
    }
} 