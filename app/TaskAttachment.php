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

class TaskAttachment extends Model

{


    protected $fillable = ['task_id','reply_id','file','title'];    
}

