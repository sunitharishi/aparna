<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Template
 *
 * @package App
 * @property string $title
*/

class Indentitem extends Model

{
    protected $fillable = ['refid','category_id','sub_category_id','item_code'];

    public function user()
    {
        return $this->belongsTo('App\User'); 
    }
    public function site()
    {
        return $this->belongsTo('App\Site'); 
    }
}  