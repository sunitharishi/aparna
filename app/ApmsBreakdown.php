<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Template
 *
 * @package App
 * @property string $title
*/

class ApmsBreakdown extends Model 

{

    protected $fillable = ['refid','site_id','title','bdate','info','action','user_id','asset_id','category_id','sub_category_id','ref_code'];

    public function user()
    {
        return $this->belongsTo('App\User'); 
    }
}