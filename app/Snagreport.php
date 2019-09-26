<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;



class Snagreport extends Model 

{    

    use SoftDeletes; 
        

    protected $fillable = ['uid','sid','cid','observation','location','recommendation','imagepath','reporton','remarks','recimagepath','rectype','timeline'];   

       
    public static function boot()    
 
    {  

        parent::boot(); 

        Snagreport::observe(new \App\Observers\UserActionsObserver);

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

