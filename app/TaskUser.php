<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Template
 *
 * @package App
 * @property string $title
*/

class TaskUser extends Model

{


    protected $fillable = ['task_id','user_id'];    
}

