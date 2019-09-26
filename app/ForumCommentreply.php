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

class ForumCommentreply extends Model

{
    protected $fillable = ['forum_id','reply_id','commentreply','user_id'];    

    public function user()
    {
        return $this->belongsTo('App\User'); 
    }
}
 
 