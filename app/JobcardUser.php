<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Template
 *
 * @package App
 * @property string $title
*/

class JobcardUser extends Model

{


    protected $fillable = ['jobcard_id','user_id'];    
}

