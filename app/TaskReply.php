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

class TaskReply extends Model

{
    protected $fillable = ['task_id','reply','user_id'];    

    public function user()
    {
        return $this->belongsTo('App\User'); 
    }
}

