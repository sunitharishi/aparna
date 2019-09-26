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

class Indent extends Model  

{

    use SoftDeletes;       
 
   // protected $fillable = ['title', 'item_code', 'site', 'item_status', 'description','user_id','status','request_status','approve_date','closed_date','approved_by','closed_by','priority','request_description'];  
   protected $fillable = ['title', 'site', 'item_status', 'description','user_id','status','request_status','approve_date','closed_date','approved_by','closed_by','priority','request_description'];     
}  
 
