<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Template
 *
 * @package App
 * @property string $title
*/

class Historycard extends Model

{
    protected $fillable = ['htype','ref_idno','refid','asset_id','site_id'];
}