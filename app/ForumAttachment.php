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

class ForumAttachment extends Model

{


    protected $fillable = ['forum_id','reply_id','file','title'];    
}

