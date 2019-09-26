<?php

namespace App;



use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;



/**

 * Class Vendor

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

class Horticulturemisreport extends Model 

{    

    use SoftDeletes;  

        

    protected $fillable = ['site','month','year','user_id','varmicompost','chloropyriphos','monocrotophos','imidaclopride','bavistin','dhanvit','multiplex','furadon','phorate','nineteenkgs','nineteenkgssoluble','acephate','seventeenkgs','urea','potash','rogar','malathian','fouate','fifteenkgs','twofourdkgs','glycil','sixteenkgs','arrowltrs','biowetltrs','blitaxkgs','twentykgs','cyhalothrinltrs','report_status','watering','cleaning','weeding','cutting','multching','trimming','training_shaping','pruning','hoeing','lawn_moving','fertilizer_application','organic_manure_app','spraying_chemicals','micro_nutrients','weedicide_application','mandays_perday','effinity'];  

             
    public static function boot()   
 
    {  

        parent::boot(); 



        Horticulturemisreport::observe(new \App\Observers\UserActionsObserver);

    }

 

    

    /** 

     * Set to null if empty

     * @param $input

     */

    public function setClientStatusIdAttribute($input)

    {

        $this->attributes['client_status_id'] = $input ? $input : null;

    }

    

    public function client_status()

    {

        return $this->belongsTo(ClientStatus::class, 'client_status_id')->withTrashed();

    }

    

}

