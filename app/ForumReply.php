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

class ForumReply extends Model

{
    protected $fillable = ['forum_id','reply','user_id'];    

    public function user()
    {
        return $this->belongsTo('App\User'); 
    }
}

