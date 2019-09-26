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
class Dailyreportvalidation extends Model
{
    use SoftDeletes; 
    
    protected $fillable = ['ctptmin','ctptmax','residentsmin','residentsmax','clubhousemin','clubhousemax','stpmin','stpmax','wspmin','wspmax','liftsusmin','liftsusmax','vendormin','vendormax','commonareamin','commonareamax','metromin','metromax','twaterconmin','twaterconmax','avgtreatwatermin','avgtreatwatermax','swimphmin','swimphmax','waterbodyphpmin','waterbodyphpmax','lifsnum','borewellsnum','dgsetsnum','gascylindernum','mis3panel','mis4panel','misctpt','mis5panel','misavgtreatwater','mispartialbkp','misfullbkp','misdws','misfws','misprv','missewaragesys','misstromwaterpump','misoozingpump','mishmws','mistransformers','mismainpccpanel','misapfcr','miscommsuppanel','misbusduct','misdistriboard','misvcb','misacb','mislandpanel','mislightarestr','mistotlightsnum','misexsrainwatpmp','misrainharvest','misirrigationpumps','misirrigationpmppan','misirrgsprinkautosys','miswatrbodypumps','mismistfoun','misindoorpool','misoutdoorpool','misbabypool','misboombarrier','missolarfencingzone','miscctv','misstpahu','misfreshair','misgasbankcham','stpbarscreencham','stprawsewagepump','stpairbowlers','stpretsludpumps','stpfilterfeedpump','stpscrewpumps','stpcentrifilpress','stpdewaterpump','stphairhandunit','chlorinedosingpump','uvsystem','hydronumaticpump','pneumaticsyspanel','stpmccpanel','pressuresandfilter','activatedcarbonfilter','averageinflow','avgoutflowtogar','avgbypass','avgoutflowothersites','nextfilterreplacement','filterfeedpump','wspdewateringpump','wspchlorinedospmp','wsphydronumaticpump','wspnumaticsyspanel','wspnumaticsyspanel','wspmediarepladate','wsppresssandfilter','wspsoftener','wspobrvalue','wsprawwatppm','wspmccpanel','wspwaterppmstand','contracted_quantity_kl','ch_panel','cmd_in_kva','transformer_kva','dg_set_kva','service_number','stpmiscapacity','wspmiscapacity','type','site'];
    
    public static function boot()
    {
        parent::boot();

        Dailyreportvalidation::observe(new \App\Observers\UserActionsObserver);
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
