<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Template
 *
 * @package App
 * @property string $title
*/

class OtherAsset extends Model 

{

    protected $fillable = ['name','code','category_id','asset_id','site_id','user_id'];

    public function user()
    {
        return $this->belongsTo('App\User'); 
    }
}