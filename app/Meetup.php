<?php

namespace App;



use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;



/**

 * Class Client

 *

 * @package App

 * @property string $first_name

 * @property string $last_name

 * @property string $company_name

 * @property string $email

 * @property string $phone

 * @property string $website

 * @property string $skype

 * @property string $country

 * @property string $client_status

*/

class Meetup extends Model

{
 
    use SoftDeletes;    
 
    protected $fillable = ['title', 'tcode', 'site', 'category', 'description','priority','user_id','status'];    


}

