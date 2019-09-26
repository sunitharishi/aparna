<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Template
 *
 * @package App
 * @property string $title
*/

class ApmsJobcard extends Model
  
{
    protected $fillable = ['jctype', 'category_id', 'refid','site_id','spares','vendor','work_activity','user_id','jcref','jdate','status','asset_id','emp_type','vendor_name','image','other_text'];

    public function user()
    {
        return $this->belongsTo('App\User'); 
    }
}