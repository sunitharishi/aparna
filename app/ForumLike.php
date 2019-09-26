<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Template
 *
 * @package App
 * @property string $title
*/

class ForumLike extends Model

{
    protected $fillable = ['forum_id','type','user_id'];    

    public function user()
    {
        return $this->belongsTo('App\User'); 
    }
}

