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

class Attachment extends Model

{


    protected $fillable = ['main_id','sub_id','file','title','atype'];    
}

