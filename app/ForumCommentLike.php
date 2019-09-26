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

class ForumCommentLike extends Model

{
    protected $fillable = ['forum_id','reply_id','user_id','comment_id','likestatus'];    

    public function user()
    {
        return $this->belongsTo('App\User'); 
    }
}

