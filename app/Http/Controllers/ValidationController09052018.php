<?php







namespace App\Http\Controllers;


use Auth;

use PDF;

use File;

use Carbon\Carbon;

use App\Pmsdailyreportvalidation;

use App\Dailyreportvalidation;

use App\Firesafedailyreportvalidation;

use App\Securitydailyreportvalidation;


use App\Indentedmisreport;

use App\Occupancymisreport;
use App\Borewellsnwmisreport; 
use App\Clubutilizationmisreport;
use App\Blocknocreport;
use App\Blocknocmonthreport;

use App\Horticulturemisreport;


use App\Firesafetymisreport; 
use App\Firesafenotworkingissue;
use App\Equipmentmisreport;
use App\Equipmentnotworkingissue;

use App\Stpmisreport;
use App\Stpnotworkingissue;

use App\Housekpmisreport;

use App\Trafficmisreport;
use App\Firepreparemisreport;




use App\Wspmisreport;
use App\Wspnotworkingissue;

use App\Securitymisreport;




use App\Fmsdailyreport;



use App\Pmsdailyreport;



use App\Firesafedailyreport;



use App\Securitydailyreport;





use App\Http\Requests;



use Illuminate\Http\Request;



use Illuminate\Support\Facades\Input;


use App\Forum;
use App\Task;
use App\TaskUser;





class ValidationController extends Controller



{



    /**



     * Create a new controller instance.



     *



     * @return void



     */



    public function __construct()



    {



       $this->middleware('auth'); 



    }





  

    /**



     * Show the application dashboard.



     *



     * @return \Illuminate\Http\Response



     */

	 

	 public function valid(Request $request)

    {

    //redirect('pages.roombooking');

   //return 'success';

   $data= $request->checkval;

   $site= $request->site;

   $field= $request->field;

  

   //echo "1234";

 /*  echo $site; */ 

   //echo $data; 

   $respose = "";

    $resultscn = Dailyreportvalidation::

      where('site', '=', $site)

    ->count();

	

	if($resultscn > 0){

	    $resultscn = Dailyreportvalidation::

      where('site', '=', $site)

    ->first();

	   

	   if($field == 'pwr_ctpt')

	  {

	

	   if($data > $resultscn['ctptmax'] || $data < $resultscn['ctptmin']) 

	   {

	     $respose = "Ctpt value range within ". $resultscn['ctptmin']."-".$resultscn['ctptmax'];

		 return $respose;

	   }

	   else{

	     $respose = "suc";

		 return $respose;

	   }

	  }

	 if($field == 'pwr_residents'){

	    if($data > $resultscn['residentsmax'] || $data < $resultscn['residentsmin']) 

	   {

	     $respose = "Residents value range within ". $resultscn['residentsmin']."-".$resultscn['residentsmax'];

		 return $respose;

	   }

	   else{   

	     $respose = "suc";

		 return $respose;

	   }

		

	 } 

	 if($field == 'pwr_club_house'){

	    if($data > $resultscn['clubhousemax'] || $data < $resultscn['clubhousemin']) 

	   {

	     $respose = "Club House value range within ". $resultscn['clubhousemin']."-".$resultscn['clubhousemax'];

		 return $respose;

	   }

	   else{   

	     $respose = "suc";

		 return $respose;

	   } 

		

	 } 

	 

	  if($field == 'pwr_stp'){

	    if($data > $resultscn['stpmax'] || $data < $resultscn['stpmin']) 

	   {

	     $respose = "STP value range within ". $resultscn['stpmin']."-".$resultscn['stpmax'];

		 return $respose;

	   }

	   else{   

	     $respose = "suc";

		 return $respose;

	   } 

		

	 } 

	 

	  if($field == 'pwr_wsp'){

	    if($data > $resultscn['wspmax'] || $data < $resultscn['wspmin']) 

	   {

	     $respose = "WSP House value range within ". $resultscn['wspmin']."-".$resultscn['wspmax'];

		 return $respose;

	   }

	   else{   

	     $respose = "suc";

		 return $respose;

	   } 

		

	 } 

	 

	   if($field == 'pwr_lifts'){

	    if($data > $resultscn['liftsusmax'] || $data < $resultscn['liftsusmin']) 

	   {

	     $respose = "Lifts value range within ". $resultscn['liftsusmin']."-".$resultscn['liftsusmax'];

		 return $respose;

	   }

	   else{   

	     $respose = "suc";

		 return $respose;

	   } 

		

	 } 

	 

	  if($field == 'pwr_vendors'){

	    if($data > $resultscn['vendormax'] || $data < $resultscn['vendormin']) 

	   {

	     $respose = "Vendors value range within ". $resultscn['vendormin']."-".$resultscn['vendormax'];

		 return $respose;

	   }

	   else{   

	     $respose = "suc";

		 return $respose;

	   } 

		

	 } 

	 

	  if($field == 'pwr_common_area'){

	    if($data > $resultscn['commonareamax'] || $data < $resultscn['commonareamin']) 

	   {

	     $respose = "Common Area value range within ". $resultscn['commonareamin']."-".$resultscn['commonareamax'];

		 return $respose;

	   }

	   else{   

	     $respose = "suc";

		 return $respose;

	   } 

		

	 } 

	 

	  if($field == 'stp_avg_treat_water'){

	    if($data > $resultscn['avgtreatwatermax'] || $data < $resultscn['avgtreatwatermin']) 

	   {

	     $respose = "Average Treated Water value range within ". $resultscn['avgtreatwatermin']."-".$resultscn['avgtreatwatermax'];

		 return $respose;

	   }

	   else{   

	     $respose = "suc";

		 return $respose;

	   } 

		

	 } 

	 

	  if($field == 'othser_swim_ph'){

	    if($data > $resultscn['swimphmax'] || $data < $resultscn['swimphmin']) 

	   {

	     $respose = "Swimming Pool PH value range within ". $resultscn['swimphmin']."-".$resultscn['swimphmax'];

		 return $respose;

	   }

	   else{   

	     $respose = "suc";

		 return $respose;

	   } 

		

	 } 

	 

	   if($field == 'othser_watbody_ph'){

	    if($data > $resultscn['waterbodyphpmax'] || $data < $resultscn['waterbodyphpmin']) 

	   {

	     $respose = "Water Bodies PH value range within ". $resultscn['waterbodyphpmin']."-".$resultscn['waterbodyphpmax'];

		 return $respose;

	   }

	   else{   

	     $respose = "suc";

		 return $respose;

	   } 

		

	 } 

	 

	  if($field == 'wspmetro'){

	    if($data > $resultscn['metromax'] || $data < $resultscn['metromin']) 

	   {

	     $respose = "Metro value range within ". $resultscn['metromin']."-".$resultscn['metromax'];

		 return $respose;

	   }

	   else{   

	     $respose = "suc";

		 return $respose;

	   } 

		

	 } 

	 

	  if($field == 'othser_gas_borewells'){

	    if($data > $resultscn['borewellsnum']) 

	   {

		 $respose = "Borewells value should not be greater than ".$resultscn['borewellsnum'];

		 return $respose;

	   }

	   else{   

	     $respose = "suc";

		 return $respose;

	   } 

		

	 } 

	 

	   if($field == 'dgset_notworking'){

	    if($data > $resultscn['dgsetsnum']) 

	   {

		 $respose = "Dgsets value should not be greater than ".$resultscn['dgsetsnum'];

		 return $respose;

	   }

	   else{   

	     $respose = "suc";   

		 return $respose;

	   } 

		

	 } 

	 

	 if($field == 'othser_lifts_nw'){

	    if($data > $resultscn['lifsnum']) 

	   {

		 $respose = "Lifts value should not be greater than ".$resultscn['lifsnum'];

		 return $respose;

	   }

	   else{   

	     $respose = "suc";   

		 return $respose;

	   } 

		

	 } 

	 

	  if($field == 'othser_lifts_ser'){

	    if($data > $resultscn['lifsnum']) 

	   {

		 $respose = "Lifts value should not be greater than ".$resultscn['lifsnum'];

		 return $respose;

	   }

	   else{   

	     $respose = "suc";   

		 return $respose;

	   } 

		

	 } 

	 

	 if($field == 'othser_lifts_bdser'){

	    if($data > $resultscn['lifsnum']) 

	   {

		 $respose = "Lifts value should not be greater than ".$resultscn['lifsnum'];

		 return $respose;

	   }

	   else{   

	     $respose = "suc";   

		 return $respose;

	   } 

		 

	 } 

	 

	  if($field == 'othser_gas_empty'){

	    if($data > $resultscn['gascylindernum']) 

	   {

		 $respose = "Gas cylinder value should not be greater than ".$resultscn['gascylindernum'];

		 return $respose;

	   }

	   else{   

	     $respose = "suc";   

		 return $respose;

	   } 

		 

	 } 

	 

	 if($field == 'othser_gas_full'){

	    if($data > $resultscn['gascylindernum']) 

	   {

		 $respose = "Gas cylinder value should not be greater than ".$resultscn['gascylindernum'];

		 return $respose;

	   }

	   else{   

	     $respose = "suc";   

		 return $respose;

	   } 

		 

	 } 

	 

	  if($field == 'othser_gas_running'){

	    if($data > $resultscn['gascylindernum']) 

	   {

		 $respose = "Gas cylinder value should not be greater than ".$resultscn['gascylindernum'];

		 return $respose;

	   }

	   else{   

	     $respose = "suc";   

		 return $respose;

	   } 

		 

	 } 

	 

	 

	 

	  if($field == 'wsptankers'){

	    if($data > $resultscn['twaterconmax'] || $data < $resultscn['twaterconmin']) 

	   {

	     $respose = "Total Water Consumption value range within ". $resultscn['twaterconmin']."-".$resultscn['twaterconmax'];

		 return $respose;

	   }

	   else{   

	     $respose = "suc";

		 return $respose;

	   } 

		

	 } 

	 

	  if($field == 'wspbores'){

	    if($data > $resultscn['twaterconmax'] || $data < $resultscn['twaterconmin']) 

	   {

	     $respose = "Total Water Consumption value range within ". $resultscn['twaterconmin']."-".$resultscn['twaterconmax'];

		 return $respose;

	   }

	   else{   

	     $respose = "suc";

		 return $respose;

	   } 

		

	 } 

	

	   

	   

	} 

	

	//echo $resultscn."Count";

   

   //echo "3455";

   /* $datares = array();

   $datares['min']= $data;

   $datares['max'] = $site;

   $datares['status'] = 'suc'; */

   

       return $respose;

    //  return $data;

     // return view ('pages.roombooking') ;

     //return View::make('pages.roombooking')-with(compact('success'));

      //return view('pages.roombooking');



  }


public function checkmisstatusold(Request $request)

    {

    //redirect('pages.roombooking');

   //return 'success';

   $year= $request->year;

   $month= $request->month;
 
   // OCCUPANCY 
   $occupancyflag = 0;
   
   $matchfields = ['month' => $month, 'year' => $year]; 

		$occupan_count = \App\Occupancymisreport::where($matchfields)->count();
		
		if($occupan_count > 0){
		
			$formfieldarray = \App\Occupancymisreport::where($matchfields)->get();
			
			
			 if(count($formfieldarray) > 0){
			     foreach($formfieldarray as $fieldarr){
				 	 $existing_records[$fieldarr->site] = array("id"=>$fieldarr->id,"owners"=>$fieldarr->owners,"tenants"=>$fieldarr->tenants,"vacant"=>$fieldarr->vacant);
					 if($fieldarr->owners == 0 && $fieldarr->tenants == 0 && $fieldarr->vacant == 0 && $fieldarr->report_status == 0  ) {
					     $occupancyflag = 1;
					 }
					 if($fieldarr->report_status == 0){
					     $occupancyflag = 1;
					 }
					 
					  if(($fieldarr->owners == 0 && $fieldarr->tenants == 0 && $fieldarr->vacant == 0) || ($fieldarr->report_status == 0)  ) {
					     $occupancyflag = 1;
					 }
				 } 
				 
				// echo "<pre>"; print_r($existing_records);echo "</pre>";
			 }  
			 else{
			     $occupancyflag = 1;
			 }
      
  
} else{
   $occupancyflag = 1;
}
  
  $response = array();

 if($occupancyflag == 0) { $response[12] = "yes";} 

 if($occupancyflag > 0) { $response[12] = "no";} 

 
  print json_encode($response);

}
    

	

	

	public function checkstatus(Request $request)

    {

    //redirect('pages.roombooking');

   //return 'success';

   $date= $request->dateText;

   $site= $request->site;

	$datearr = explode("-",$date);

	$month = $datearr[1];

	$year = $datearr[2];

	//$site = '5';



	$rdate = $year."-".$month."-".$datearr[0];

	

	$fmsflagcn = 0;

	$firesafeflagcn = 0;

	$pmsflagcn = 0;

	$securityflagcn = 0;

	

	  $fmsrescn = Fmsdailyreport::

      where('reporton', '=', $rdate)

	->where('site', '=', $site)

    ->count();

	

	if($fmsrescn > 0){

	  $fmsresrow = Fmsdailyreport::

      where('reporton', '=', $rdate)

	->where('site', '=', $site)

    ->first();

	 

	// print_r($fmsresrow);

	 

	

if(strlen($fmsresrow->pwr_ctpt) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->pwr_tot_lt)  == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->pwr_lossec) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->pwr_residents) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->pwr_club_house) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->pwr_stp) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->pwr_wsp) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->pwr_lifts) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->pwr_vendors) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->pwr_common_area) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->pwr_others) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->pwr_solarpwrunits) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->pwr_pwrfactor) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->pwr_recordedkva) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->pwr_remarks) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->dgset_notworking) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->dgset_pwrfailure) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->dset_dieselconsume) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->dgset_dieselstock) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->dgset_dieselfilled) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->dgset_batterystatus) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->dgset_dgunits) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->dgset_abnormalities) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->wsp_salt) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->wsp_chlorine) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->wsp_metro) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->wsp_tankers) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->wsp_bores) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->wsp_tot_water) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->wsp_ppm_rw) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->wsp_ppm_tw_sump) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->wsp_ppm_tw_flat) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->stp_avg_inlet_water) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->stp_avg_treat_water) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->stp_avg_water_bypass) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->stp_residual_chlorine) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->stp_mlss) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->stp_chlorine) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->stp_sludge) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->stp_abnormalities) == 0)$fmsflagcn = $fmsflagcn + 1;



if(strlen($fmsresrow->manpw_elect_actual) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->manpw_elect_deploy) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->manpw_plumb_actual) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->manpw_plumb_deploy) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->manpw_stp_actual) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->manpw_stp_deploy) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->manpw_fire_actual) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->manpw_fire_deploy) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->manpw_gas_actual) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->manpw_gas_deploy) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->manpw_other_actual) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->manpw_other_deploy) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->othser_lifts_nw) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->othser_lifts_ser) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->othser_lifts_bdser) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->othser_gas_totcons) == 0)$fmsflagcn = $fmsflagcn + 1;



if(strlen($fmsresrow->othser_gas_empty) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->othser_gas_full) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->othser_gas_running) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->othser_gas_borewells) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->othser_swim_ph) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->othser_swim_chlorine) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->othser_swim_runhrs) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->othser_watbody_ph) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->othser_watbody_chlorine) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->othser_watbody_runhrs) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->othser_solar_fencing) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->other_irrigation_spinklr) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->comp_electrical_tot) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->comp_electrical_close) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->comp_gas_tot) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->comp_gas_close) == 0)$fmsflagcn = $fmsflagcn + 1;



if(strlen($fmsresrow->comp_plumbing_tot) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->comp_plumbing_close) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->comp_civil_tot) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->comp_civil_close) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->comp_lifts_tot) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->comp_lifts_close) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->comp_ss_tot) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->comp_ss_close) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->comp_carpentary_tot) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->comp_carpentary_close) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->comp_other_tot) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->comp_other_close) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->clveri_stp) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->clveri_stp) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->lists_verified) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->clveri_daily_brief) == 0)$fmsflagcn = $fmsflagcn + 1;



if(strlen($fmsresrow->clveri_start_time) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->clveri_start_time) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->clveri_attend_num) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->asset_critical_observe) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->local_purchase) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->points_dis_hod_meeting) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->amc_visits) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->preventive_maintain) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->break_down_any) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->any_communication) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->storm_water_auto_pumps) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->storm_water_manual_pumps) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->storm_water_off_pumps) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->storm_water_nw_pumps) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->oozing_water_auto_pumps) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->oozing_water_manual_pumps) == 0)$fmsflagcn = $fmsflagcn + 1;



if(strlen($fmsresrow->oozing_water_off_pumps) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->oozing_water_nw_pumps) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->de_water_auto_pumps) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->de_water_manual_pumps) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->de_water_off_pumps) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->de_water_nw_pumps) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->rain_water_auto_pumps) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->rain_water_manual_pumps) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->rain_water_off_pumps) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->rain_water_nw_pumps) == 0)$fmsflagcn = $fmsflagcn + 1;

if(strlen($fmsresrow->reasontext) == 0)$fmsflagcn = $fmsflagcn + 1;



	}

	else{

	  $fmsflagcn = 1;

	}

	

	

	

	

	// FIRE SAFE

	

	  $firesaferescn = Firesafedailyreport::

      where('reporton', '=', $rdate)

	->where('site', '=', $site)

    ->count();

	

	if($firesaferescn > 0){

	  $firesaferesrw = Firesafedailyreport::

      where('reporton', '=', $rdate)

	->where('site', '=', $site)

    ->first();

	

	

if(strlen($firesaferesrw->training_on) == 0)$firesafeflagcn = $firesafeflagcn + 1;

if(strlen($firesaferesrw->trainingsnumtilldate)  == 0)$firesafeflagcn = $firesafeflagcn + 1;

if(strlen($firesaferesrw->trainedpeople) == 0)$firesafeflagcn = $firesafeflagcn + 1;

if(strlen($firesaferesrw->suptotattendance) == 0)$firesafeflagcn = $firesafeflagcn + 1;

if(strlen($firesaferesrw->suppresentattendance)  == 0)$firesafeflagcn = $firesafeflagcn + 1;

if(strlen($firesaferesrw->stewardsattendance) == 0)$firesafeflagcn = $firesafeflagcn + 1;

if(strlen($firesaferesrw->nightshiftattendance) == 0)$firesafeflagcn = $firesafeflagcn + 1;

if(strlen($firesaferesrw->jockeypumpauto)  == 0)$firesafeflagcn = $firesafeflagcn + 1;

if(strlen($firesaferesrw->jockeypumpmanual) == 0)$firesafeflagcn = $firesafeflagcn + 1;

if(strlen($firesaferesrw->jockeypumpoff) == 0)$firesafeflagcn = $firesafeflagcn + 1;

if(strlen($firesaferesrw->jockeypumpnotworking)  == 0)$firesafeflagcn = $firesafeflagcn + 1;

if(strlen($firesaferesrw->mainpumpauto) == 0)$firesafeflagcn = $firesafeflagcn + 1;	

if(strlen($firesaferesrw->mainpumpmanual) == 0)$firesafeflagcn = $firesafeflagcn + 1;

if(strlen($firesaferesrw->mainpumpoff)  == 0)$firesafeflagcn = $firesafeflagcn + 1;

if(strlen($firesaferesrw->mainpumpnotworking) == 0)$firesafeflagcn = $firesafeflagcn + 1;	

if(strlen($firesaferesrw->dgpumpauto) == 0)$firesafeflagcn = $firesafeflagcn + 1;

if(strlen($firesaferesrw->dgpumpmanual)  == 0)$firesafeflagcn = $firesafeflagcn + 1;

if(strlen($firesaferesrw->dgpumpmanual) == 0)$firesafeflagcn = $firesafeflagcn + 1;	

	

if(strlen($firesaferesrw->dgpumpnotworking) == 0)$firesafeflagcn = $firesafeflagcn + 1;

if(strlen($firesaferesrw->dgpumpnotworking)  == 0)$firesafeflagcn = $firesafeflagcn + 1;

if(strlen($firesaferesrw->dgpumpnotworking) == 0)$firesafeflagcn = $firesafeflagcn + 1;

if(strlen($firesaferesrw->lastmockdrillcondut) == 0)$firesafeflagcn = $firesafeflagcn + 1;

if(strlen($firesaferesrw->nextmockdrillconduct)  == 0)$firesafeflagcn = $firesafeflagcn + 1;

if(strlen($firesaferesrw->waterdrainshed) == 0)$firesafeflagcn = $firesafeflagcn + 1;

if(strlen($firesaferesrw->previousdate) == 0)$firesafeflagcn = $firesafeflagcn + 1;

if(strlen($firesaferesrw->nextdate)  == 0)$firesafeflagcn = $firesafeflagcn + 1;

if(strlen($firesaferesrw->reasonformanual) == 0)$firesafeflagcn = $firesafeflagcn + 1;

if(strlen($firesaferesrw->reasonforoff) == 0)$firesafeflagcn = $firesafeflagcn + 1;

if(strlen($firesaferesrw->boosterautopumps)  == 0)$firesafeflagcn = $firesafeflagcn + 1;

if(strlen($firesaferesrw->boostermanualpumps) == 0)$firesafeflagcn = $firesafeflagcn + 1;	

if(strlen($firesaferesrw->boosterpumpsoff) == 0)$firesafeflagcn = $firesafeflagcn + 1;

if(strlen($firesaferesrw->boosterpumpsnotworking)  == 0)$firesafeflagcn = $firesafeflagcn + 1;

if(strlen($firesaferesrw->boosterreasonmanual) == 0)$firesafeflagcn = $firesafeflagcn + 1;	

if(strlen($firesaferesrw->boosterreasonoff) == 0)$firesafeflagcn = $firesafeflagcn + 1;

//if(strlen($firesaferesrw->firealaramsysnum)  == 0)$firesafeflagcn = $firesafeflagcn + 1;

if(strlen($firesaferesrw->firealaramsysworking) == 0)$firesafeflagcn = $firesafeflagcn + 1;	





if(strlen($firesaferesrw->firealaramsysnotworking) == 0)$firesafeflagcn = $firesafeflagcn + 1;

if(strlen($firesaferesrw->firealaramnotworkingreason)  == 0)$firesafeflagcn = $firesafeflagcn + 1;

//if(strlen($firesaferesrw->passystemnum) == 0)$firesafeflagcn = $firesafeflagcn + 1;

if(strlen($firesaferesrw->passystemworking) == 0)$firesafeflagcn = $firesafeflagcn + 1;

if(strlen($firesaferesrw->passystemnotworking)  == 0)$firesafeflagcn = $firesafeflagcn + 1;

if(strlen($firesaferesrw->passystemreasonnotworking) == 0)$firesafeflagcn = $firesafeflagcn + 1;

//if(strlen($firesaferesrw->carbonemissionjetfannum) == 0)$firesafeflagcn = $firesafeflagcn + 1;

if(strlen($firesaferesrw->carbonemissionworking)  == 0)$firesafeflagcn = $firesafeflagcn + 1;

if(strlen($firesaferesrw->carbonemissionnotworking) == 0)$firesafeflagcn = $firesafeflagcn + 1;

if(strlen($firesaferesrw->carbonemissreasonnotworking) == 0)$firesafeflagcn = $firesafeflagcn + 1;

if(strlen($firesaferesrw->sumpstotnum)  == 0)$firesafeflagcn = $firesafeflagcn + 1;

if(strlen($firesaferesrw->sumplastcleandate) == 0)$firesafeflagcn = $firesafeflagcn + 1;	

if(strlen($firesaferesrw->sumptotwaterlevel) == 0)$firesafeflagcn = $firesafeflagcn + 1;

if(strlen($firesaferesrw->sumpnextcleaningdate)  == 0)$firesafeflagcn = $firesafeflagcn + 1;

if(strlen($firesaferesrw->ohttankstotnum) == 0)$firesafeflagcn = $firesafeflagcn + 1;	

//if(strlen($firesaferesrw->ohtlastcleaneddate) == 0)$firesafeflagcn = $firesafeflagcn + 1;

if(strlen($firesaferesrw->totohtwaterlevel)  == 0)$firesafeflagcn = $firesafeflagcn + 1;

if(strlen($firesaferesrw->ohtnextcleaningdate) == 0)$firesafeflagcn = $firesafeflagcn + 1;	



if(strlen($firesaferesrw->numofworkpermitsissued)  == 0)$firesafeflagcn = $firesafeflagcn + 1;

if(strlen($firesaferesrw->generalworkpermitsnum) == 0)$firesafeflagcn = $firesafeflagcn + 1;	

if(strlen($firesaferesrw->electricalworkpermitsissued) == 0)$firesafeflagcn = $firesafeflagcn + 1;

if(strlen($firesaferesrw->heightworkpermitsissued)  == 0)$firesafeflagcn = $firesafeflagcn + 1;

if(strlen($firesaferesrw->co2firenotworking) == 0)$firesafeflagcn = $firesafeflagcn + 1;	

if(strlen($firesaferesrw->dcpfirenotworking) == 0)$firesafeflagcn = $firesafeflagcn + 1;

if(strlen($firesaferesrw->waterfirenotworking)  == 0)$firesafeflagcn = $firesafeflagcn + 1;

//if(strlen($firesaferesrw->refillingdate) == 0)$firesafeflagcn = $firesafeflagcn + 1;	

if(strlen($firesaferesrw->inspectiondate) == 0)$firesafeflagcn = $firesafeflagcn + 1;	

if(strlen($firesaferesrw->reason) == 0)$firesafeflagcn = $firesafeflagcn + 1;	

if(strlen($firesaferesrw->boostershedule_on_date) == 0)$firesafeflagcn = $firesafeflagcn + 1;	

if(strlen($firesaferesrw->boosterchecked_on_date) == 0)$firesafeflagcn = $firesafeflagcn + 1;	

if(strlen($firesaferesrw->supattendance) == 0)$firesafeflagcn = $firesafeflagcn + 1;		

	

	

	}

	else{

	  $firesafeflagcn = 1;

	}

	

	

	

	///PMS

	

	// FIRE SAFE

	

	  $pmsrescn = Pmsdailyreport::

      where('reporton', '=', $rdate)

	->where('site', '=', $site)

    ->count();

	

	if($pmsrescn > 0){

	  $pmsresrw = Pmsdailyreport::

      where('reporton', '=', $rdate)

	->where('site', '=', $site)

    ->first();

	

	  

	  

if(strlen($pmsresrw->land_atten_sup) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->land_atten_helper) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->land_water_qty) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->land_water_time) == 0)$pmsflagcn = $pmsflagcn + 1;

/*if(strlen($pmsresrw->land_clean_time) == 0)$pmsflagcn = $pmsflagcn + 1;*/

/*if(strlen($pmsresrw->land_clean_location) == 0)$pmsflagcn = $pmsflagcn + 1;*/   
    
if(strlen($pmsresrw->land_clean_sprinknw) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->land_spray_location) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->land_Weeding_location) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->land_mowing_location) == 0)$pmsflagcn = $pmsflagcn + 1;



if(strlen($pmsresrw->land_application) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->land_mulching) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->land_trimming) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->land_cutting) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->land_pruning) == 0)$pmsflagcn = $pmsflagcn + 1;



if(strlen($pmsresrw->land_shaping) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->land_hoeing) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->land_garden_waste) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->land_extra_activity) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->housekp_atten_sup) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->housekp_atten_helper) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->housekp_rideon_hrs) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->scrub_hrs_run) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->scrub_location) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->housekp_debr_tipsnum) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->housekp_debr_vol) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->housekp_debr_garbage) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->housekp_thefts) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->housekp_violation_notice) == 0)$pmsflagcn = $pmsflagcn + 1;



if(strlen($pmsresrw->housekp_area_inspect) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->clbhous_att_frntofc) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->clbhous_att_housekp) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->clbhous_att_other) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->clbhous_revenue_day) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->clbhous_pwr_units) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->clbhous_users_gym) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->clbhous_users_pool) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->clbhous_shuttle) == 0)$pmsflagcn = $pmsflagcn + 1;



if(strlen($pmsresrw->clbhous_users_tennis) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->clbhous_users_remarks) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->apna_apms_previous) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->apna_apms_opened_help) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->apna_apms_opened_login) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->apna_apms_opened_total) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->apna_apms_resolved) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->apna_apms_pending) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->apna_apms_remarks) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->apna_project_previous) == 0)$pmsflagcn = $pmsflagcn + 1;



if(strlen($pmsresrw->apna_project_opened_help) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->apna_project_opened_login) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->apna_project_opened_total) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->apna_project_resolved) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->apna_project_pending) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->apna_project_remarks) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->occupancy_move_owners) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->occupancy_move_tenants) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->occupancy_vacated_owners) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->occupancy_vacated_tenants) == 0)$pmsflagcn = $pmsflagcn + 1;



if(strlen($pmsresrw->occupancy_asdate_owners) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->occupancy_asdate_tenants) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->occupancy_asdate_vacant) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->occupancy_asdate_remarks) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->imprest_cash_on_hand) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->imprest_bills_on_hand) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->imprest_dateof_statement) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->dateof_statement_amount) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->gas_transact_supervise_by) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->gas_transact_full_cyl_recd) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->gas_empty_cyl_taken_out) == 0)$pmsflagcn = $pmsflagcn + 1;





if(strlen($pmsresrw->info_attend_verified) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->info_attend_datesheet_pend) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->info_parking_display) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->jobs_pending) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->reasontext) == 0)$pmsflagcn = $pmsflagcn + 1;



if(strlen($pmsresrw->housekp_pest) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->gas_transact_socity) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->gas_transact_security) == 0)$pmsflagcn = $pmsflagcn + 1;


if(strlen($pmsresrw->imprest_dateof_statement_2) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->dateof_statement_amount_2) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->supervisor) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->commercial_activate) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->solonide_valve_nw) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->quick_couple_nw) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->power_point_nw) == 0)$pmsflagcn = $pmsflagcn + 1;

/*if(strlen($pmsresrw->extra_act_multching) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->extra_act_gap_filling) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->extra_act_gap_staking) == 0)$pmsflagcn = $pmsflagcn + 1; */

if(strlen($pmsresrw->fogg_hrs_run) == 0)$pmsflagcn = $pmsflagcn + 1;

if(strlen($pmsresrw->fogg_location) == 0)$pmsflagcn = $pmsflagcn + 1; 
	
	} 

   else{

	  $pmsflagcn = 1;

	}

	

	

	

	// SECURITY

	

	// FIRE SAFE

	

	  $securityrescn = Securitydailyreport::

      where('reporton', '=', $rdate)

	->where('site', '=', $site)

    ->count();

	

	if($securityrescn > 0){

	  $securityresrw = Securitydailyreport::

      where('reporton', '=', $rdate)

	->where('site', '=', $site)

    ->first();

	

	

if(strlen($securityresrw->ds_guard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->ds_lguard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->ds_hguard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->ds_sup) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->ds_aso) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->ds_so) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->ds_remarks) == 0)$securityflagcn = $securityflagcn + 1;



if(strlen($securityresrw->dp_guard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->dp_lguard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->dp_hguard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->dp_sup) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->dp_aso) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->dp_so) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->dp_remarks) == 0)$securityflagcn = $securityflagcn + 1;



if(strlen($securityresrw->pha_guard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->pha_lguard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->pha_hguard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->pha_sup) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->pha_aso) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->pha_so) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->pha_remarks) == 0)$securityflagcn = $securityflagcn + 1;



if(strlen($securityresrw->wko_guard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->wko_lguard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->wko_hguard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->wko_sup) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->wko_aso) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->wko_so) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->wko_remarks) == 0)$securityflagcn = $securityflagcn + 1;



if(strlen($securityresrw->ab_guard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->ab_lguard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->ab_hguard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->ab_sup) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->ab_aso) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->ab_so) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->ab_remarks) == 0)$securityflagcn = $securityflagcn + 1;



if(strlen($securityresrw->tfo_guard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->tfo_lguard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->tfo_hguard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->tfo_sup) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->tfo_aso) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->tfo_so) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->tfo_remarks) == 0)$securityflagcn = $securityflagcn + 1;



if(strlen($securityresrw->tto_guard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->tto_lguard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->tto_hguard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->tto_sup) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->tto_aso) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->tto_so) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->tto_remarks) == 0)$securityflagcn = $securityflagcn + 1;



if(strlen($securityresrw->rsv_guard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->rsv_lguard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->rsv_hguard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->rsv_sup) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->rsv_aso) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->rsv_so) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->rsv_remarks) == 0)$securityflagcn = $securityflagcn + 1;





if(strlen($securityresrw->dsh_guard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->dsh_lguard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->dsh_hguard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->dsh_sup) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->dsh_aso) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->dsh_so) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->dsh_remarks) == 0)$securityflagcn = $securityflagcn + 1;



if(strlen($securityresrw->nsh_guard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->nsh_lguard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->nsh_hguard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->nsh_sup) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->nsh_aso) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->nsh_so) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->nsh_remarks) == 0)$securityflagcn = $securityflagcn + 1;



if(strlen($securityresrw->lt20_guard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->lt20_lguard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->lt20_hguard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->lt20_sup) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->lt20_aso) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->lt20_so) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->lt20_remarks) == 0)$securityflagcn = $securityflagcn + 1;



if(strlen($securityresrw->lt50_guard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->lt50_lguard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->lt50_hguard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->lt50_sup) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->lt50_aso) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->lt50_so) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->lt50_remarks) == 0)$securityflagcn = $securityflagcn + 1;



if(strlen($securityresrw->lt52_guard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->lt52_lguard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->lt52_hguard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->lt52_sup) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->lt52_aso) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->lt52_so) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->lt52_remarks) == 0)$securityflagcn = $securityflagcn + 1;



if(strlen($securityresrw->kff_guard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->kff_lguard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->kff_hguard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->kff_sup) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->kff_aso) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->kff_so) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->kff_remarks) == 0)$securityflagcn = $securityflagcn + 1;



if(strlen($securityresrw->kdsh_guard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->kdsh_lguard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->kdsh_hguard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->kdsh_sup) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->kdsh_aso) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->kdsh_so) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->kdsh_remarks) == 0)$securityflagcn = $securityflagcn + 1;



if(strlen($securityresrw->knsh_guard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->knsh_lguard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->knsh_hguard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->knsh_sup) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->knsh_aso) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->knsh_so) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->knsh_remarks) == 0)$securityflagcn = $securityflagcn + 1;



if(strlen($securityresrw->add_guard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->add_lguard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->add_hguard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->add_sup) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->add_aso) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->add_so) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->add_remarks) == 0)$securityflagcn = $securityflagcn + 1;



if(strlen($securityresrw->del_guard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->del_lguard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->del_hguard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->del_sup) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->del_aso) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->del_so) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->del_remarks) == 0)$securityflagcn = $securityflagcn + 1;



if(strlen($securityresrw->del_guard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->del_lguard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->del_hguard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->del_sup) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->del_aso) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->del_so) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->del_remarks) == 0)$securityflagcn = $securityflagcn + 1;



if(strlen($securityresrw->ws_guard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->ws_lguard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->ws_hguard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->ws_sup) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->ws_aso) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->ws_so) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->ws_remarks) == 0)$securityflagcn = $securityflagcn + 1;



if(strlen($securityresrw->bm_guard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->bm_lguard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->bm_hguard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->bm_sup) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->bm_aso) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->bm_so) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->bm_remarks) == 0)$securityflagcn = $securityflagcn + 1;



if(strlen($securityresrw->ae_guard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->ae_lguard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->ae_hguard) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->ae_sup) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->ae_aso) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->ae_so) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->ae_remarks) == 0)$securityflagcn = $securityflagcn + 1;





if(strlen($securityresrw->nw_cctv) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->nw_boom) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->nw_wt) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->nw_torch) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->nw_bio) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->ae_so) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->nw_remarks) == 0)$securityflagcn = $securityflagcn + 1;



if(strlen($securityresrw->av_tab) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->av_whi) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->av_bat) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->av_rai) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->av_umb) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->av_remarks) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->sf_zone1) == 0)$securityflagcn = $securityflagcn + 1;



if(strlen($securityresrw->sf_zone2) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->sf_zone3) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->sf_zone4) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->sf_tkit) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->sf_remarks) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->aw_maid) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->aw_dri) == 0)$securityflagcn = $securityflagcn + 1;





if(strlen($securityresrw->aw_ven) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->aw_inte) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->aw_others) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->aw_remarks) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->ds_pending) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->nts_time) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->nbc_chk) == 0)$securityflagcn = $securityflagcn + 1;



if(strlen($securityresrw->wo_stick_2w) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->wo_stick_4w) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->mis_keys) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->interior_works) == 0)$securityflagcn = $securityflagcn + 1;

//if(strlen($securityresrw->night_check_by) == 0)$securityflagcn = $securityflagcn + 1;

//if(strlen($securityresrw->night_check_time) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->violations) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->occurances) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->drunkcase) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->parades) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->cellphone_abuses) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->srstaffvisits) == 0)$securityflagcn = $securityflagcn + 1;

if(strlen($securityresrw->reason) == 0)$securityflagcn = $securityflagcn + 1;


	} else{

	  $securityflagcn = 1;

	}

	

  

  

 // echo $date; 

  //echo $site;

 // echo  $fmsflagcn;

   $response = array();

   if($fmsflagcn == 0) { $response[1] = "yes";} 

   if($fmsflagcn > 0) { $response[1] = "no";} 

   if($firesafeflagcn == 0) { $response[0] = "yes";} 

   if($firesafeflagcn > 0) { $response[0] = "no";} 

   

   if($pmsflagcn == 0) { $response[2] = "yes";} 

   if($pmsflagcn > 0) { $response[2] = "no";} 

   

    if($securityflagcn == 0) { $response[3] = "yes";} 

   if($securityflagcn > 0) { $response[3] = "no";} 

 



   

  print json_encode($response);

  /* 

    return response()->json([

            'status' => 'ok',

            'id' => "13"

        ]); */

   

   //json_encode($return);

   

     //  return json_encode($respose);

    //  return $data;

     // return view ('pages.roombooking') ;

     //return View::make('pages.roombooking')-with(compact('success'));

      //return view('pages.roombooking');



  }

  

  

  	 public function validtotpms(Request $request)

    {

    //redirect('pages.roombooking');

   //return 'success';

   $data= $request->checkval;

   $site= $request->site;

   $field= $request->field;

  

   //echo "1234";

 /*  echo $site; */ 

   //echo $data; 

   $respose = "";

    $resultscn = Pmsdailyreportvalidation::

      where('site', '=', $site)

    ->count();

	

	if($resultscn > 0){

	    $resultscn = Pmsdailyreportvalidation::

      where('site', '=', $site)

    ->first();

	    

	   if($field == 'land_atten_sup')

	  {

	 

	   if($data > $resultscn['land_sup']) 

	   {

	     $respose = "Land Sup value should not be greater than ".$resultscn['land_sup'];

		 return $respose;

	   }

	   else{

	     $respose = "suc";

		 return $respose;

	   }

	  }

	  

	    if($field == 'land_atten_helper')

	  {

	 

	   if($data > $resultscn['land_helper']) 

	   {

	     $respose = "Land Helper value should not be greater than ".$resultscn['land_helper'];

		 return $respose;

	   }

	   else{

	     $respose = "suc";

		 return $respose;

	   } 

	  }

	  

	   if($field == 'housekp_atten_sup')

	  {

	 

	   if($data > $resultscn['house_sup']) 

	   {

	     $respose = "House Keeping Sup value should not be greater than ".$resultscn['house_sup'];

		 return $respose;

	   }

	   else{

	     $respose = "suc";

		 return $respose;

	   } 

	  }

	  

	   if($field == 'housekp_atten_helper')

	  {

	 

	   if($data > $resultscn['house_help']) 

	   {

	     $respose = "House Keeping Helper value should not be greater than ".$resultscn['house_help'];

		 return $respose;

	   }

	   else{

	     $respose = "suc";

		 return $respose;

	   } 

	  }

	  

	  

	   if($field == 'clbhous_att_frntofc')

	  {

	 

	   if($data > $resultscn['clu_hs_fo']) 

	   {

	     $respose = "Club House F.O value should not be greater than ".$resultscn['clu_hs_fo'];

		 return $respose;

	   }

	   else{

	     $respose = "suc";

		 return $respose;

	   } 

	  }

	  

	   if($field == 'clbhous_att_housekp')

	  {

	 

	   if($data > $resultscn['clu_hs_hk']) 

	   {

	     $respose = "Club House H K value should not be greater than ".$resultscn['clu_hs_hk'];

		 return $respose;

	   }

	   else{

	     $respose = "suc";

		 return $respose;

	   } 

	  }

	  

	   if($field == 'clbhous_att_other')

	  {

	 

	   if($data > $resultscn['other']) 

	   {

	     $respose = "Club House Other  value sshould not be greater than ".$resultscn['other'];

		 return $respose;

	   }

	   else{

	     $respose = "suc";

		 return $respose;

	   } 

	  }

	  

	    if($field == 'clbhous_att_other')

	  {

	 

	   if($data > $resultscn['other']) 

	   {

	     $respose = "Club House Other  value should not be greater than ".$resultscn['other'];

		 return $respose;

	   }

	   else{

	     $respose = "suc";

		 return $respose;

	   } 

	  }

	  

	   if($field == 'land_clean_sprinknw')

	  {

	 

	   if($data > $resultscn['sprinklers']) 

	   {

	     $respose = "Sprinklers value should not be greater than ".$resultscn['sprinklers'];

		 return $respose;

	   }

	   else{

	     $respose = "suc";

		 return $respose;

	   } 

	  }
	  
	  
	   if($field == 'solonide_valve_nw')

	  {

	 

	   if($data > $resultscn['solonide_valves']) 

	   {

	     $respose = "Solonide Valves should not be greater than ".$resultscn['solonide_valves'];

		 return $respose;

	   }

	   else{

	     $respose = "suc";

		 return $respose;

	   }

	  }
	  
	   if($field == 'quick_couple_nw')

	  {

	 

	   if($data > $resultscn['quick_coupling_valves']) 

	   {

	     $respose = "Quick Coupling Valves should not be greater than ".$resultscn['quick_coupling_valves'];

		 return $respose;

	   }

	   else{

	     $respose = "suc";

		 return $respose;

	   }

	  }
	  
	    if($field == 'power_point_nw')

	  {

	 

	   if($data > $resultscn['power_point']) 

	   {

	     $respose = "Power Point should not be greater than ".$resultscn['power_point'];

		 return $respose;

	   }

	   else{

	     $respose = "suc";

		 return $respose;

	   }

	  }

	   

	} 

	

	//echo $resultscn."Count";

   

   //echo "3455";

   /* $datares = array();

   $datares['min']= $data;

   $datares['max'] = $site;

   $datares['status'] = 'suc'; */

   

       return $respose;

    //  return $data;

     // return view ('pages.roombooking') ;

     //return View::make('pages.roombooking')-with(compact('success'));

      //return view('pages.roombooking');



  }

  

  

  

  

  	 public function validtotfiresafe(Request $request)

    {

    //redirect('pages.roombooking');

   //return 'success';

   $data= $request->checkval;

   $site= $request->site;

   $field= $request->field;

  

   //echo "1234";

 /*  echo $site; */ 

   //echo $data; 

   $respose = "";

    $resultscn = Firesafedailyreportvalidation::

      where('site', '=', $site)

    ->count();

	

	if($resultscn > 0){

	    $resultscn = Firesafedailyreportvalidation::

      where('site', '=', $site)

    ->first();

	    

	   if($field == 'jockeypump')

	  { 

	 

	   if($data > $resultscn['jockeypump']) 

	   {

	     $respose = "Jockeypump value should not be greater than ".$resultscn['jockeypump'];

		 return $respose;

	   }

	   else{

	     $respose = "suc";

		 return $respose;

	   }

	  }  

	  

	  

	   if($field == 'mainpump')

	  { 

	 

	   if($data > $resultscn['mainpump']) 

	   {

	     $respose = "Mainpump value should not be greater than ".$resultscn['mainpump'];

		 return $respose;

	   }

	   else{

	     $respose = "suc";

		 return $respose;

	   }

	  }  

	  

	    if($field == 'dgpump')

	  { 

	 

	   if($data > $resultscn['dgpump']) 

	   {

	     $respose = "Dgpump value should not be greater than ".$resultscn['dgpump'];

		 return $respose;

	   }

	   else{

	     $respose = "suc";

		 return $respose;

	   }

	  }  

	  

	  

	     if($field == 'co2firenotworking')

	  { 

	 

	   if($data > $resultscn['co2']) 

	   {

	     $respose = "Co2 value should not be greater than ".$resultscn['co2'];

		 return $respose;

	   }

	   else{

	     $respose = "suc";

		 return $respose;

	   }

	  }  

	  

	   if($field == 'dcpfirenotworking')

	  { 

	 

	   if($data > $resultscn['dcp']) 

	   {

	     $respose = "DCP value should not be greater than ".$resultscn['dcp'];

		 return $respose;

	   }

	   else{

	     $respose = "suc";

		 return $respose;

	   }

	  }  

	  

	   if($field == 'waterfirenotworking')

	  { 

	 

	   if($data > $resultscn['water']) 

	   {

	     $respose = "Water value should not be greater than ".$resultscn['water'];

		 return $respose;

	   }

	   else{

	     $respose = "suc";

		 return $respose;

	   }

	  }  

	  

	  if($field == 'boosterpump')

	  { 

	 

	   if($data > $resultscn['boosterpumps']) 

	   {

	     $respose = "Boosterpumps value should not be greater than ".$resultscn['boosterpumps'];

		 return $respose;

	   }

	   else{

	     $respose = "suc";

		 return $respose;

	   }

	  }  

	  

	   if($field == 'firealaramsysworking')

	  { 

	 

	   if($data > $resultscn['firealarmsystem']) 

	   {

	     $respose = "Firealarmsystem value should not be greater than ".$resultscn['firealarmsystem'];

		 return $respose;

	   }

	   else{

	     $respose = "suc";

		 return $respose;

	   }

	  }  

	  

	   if($field == 'passystemworking')

	  { 

	 

	   if($data > $resultscn['publicaddressys']) 

	   {

	     $respose = "Publicaddressys value should not be greater than ".$resultscn['publicaddressys'];

		 return $respose;

	   }

	   else{

	     $respose = "suc";

		 return $respose;

	   }

	  }  

	  

	   if($field == 'carbonemissionworking')

	  { 

	 

	   if($data > $resultscn['carbonemissionsys']) 

	   {

	     $respose = "Carbonemissionsys value should not be greater than ".$resultscn['carbonemissionsys'];

		 return $respose;

	   }

	   else{

	     $respose = "suc";

		 return $respose;

	   }

	  }  

	

	    

	   

	} 

	

	//echo $resultscn."Count";

   

   //echo "3455";

   /* $datares = array();

   $datares['min']= $data;

   $datares['max'] = $site;

   $datares['status'] = 'suc'; */

   

       return $respose;

    //  return $data;

     // return view ('pages.roombooking') ;

     //return View::make('pages.roombooking')-with(compact('success'));

      //return view('pages.roombooking');



  }

  

  

  

  

  	 public function securityvalid(Request $request)

    {

    //redirect('pages.roombooking');

   //return 'success';

   $data= $request->checkval;

   $site= $request->site;

   $field= $request->field;

  

   //echo "1234";

 /*  echo $site; */ 

   //echo $data; 

   $respose = "";

    $resultscn = Securitydailyreportvalidation::

      where('site', '=', $site)

    ->count();

	

	if($resultscn > 0){

	    $resultscn = Securitydailyreportvalidation::

      where('site', '=', $site)

    ->first();

	 

	   if($field == 'nw_cctv'){

	    if($data > $resultscn['cctv']) 

	   {

		 $respose = "CCTV value should not be greater than ".$resultscn['cctv'];

		 return $respose;

	   }

	   else{   

	     $respose = "suc";   

		 return $respose;

	   } 

		

	 } 

	 

	  if($field == 'nw_boom'){

	    if($data > $resultscn['boombarrier']) 

	   {

		 $respose = "Boombarrier value should not be greater than ".$resultscn['boombarrier'];

		 return $respose;

	   }

	   else{   

	     $respose = "suc";   

		 return $respose;

	   } 

		

	 } 

	 

	  if($field == 'nw_boom'){

	    if($data > $resultscn['wt']) 

	   {

		 $respose = "WT value should not be greater than ".$resultscn['wt'];

		 return $respose;

	   }

	   else{   

	     $respose = "suc";   

		 return $respose;

	   } 

		

	 } 

	 

	  if($field == 'nw_wt'){

	    if($data > $resultscn['torches']) 

	   {

		 $respose = "WT value should not be greater than ".$resultscn['torches'];

		 return $respose;

	   }

	   else{   

	     $respose = "suc";   

		 return $respose;

	   } 

		

	 } 

	 

	 

	  if($field == 'nw_torch'){

	    if($data > $resultscn['torches']) 

	   {

		 $respose = "Torches value should not be greater than ".$resultscn['torches'];

		 return $respose;

	   }

	   else{   

	     $respose = "suc";   

		 return $respose;

	   } 

		

	 } 

	 

	  if($field == 'nw_bio'){

	    if($data > $resultscn['biomachine']) 

	   {

		 $respose = "Biomachine value should not be greater than ".$resultscn['biomachine'];

		 return $respose;

	   }

	   else{   

	     $respose = "suc";   

		 return $respose;

	   }  

		

	 } 

	 

	 

	 if($field == 'av_tab'){

	    if($data > $resultscn['av_tabs']) 

	   {

		 $respose = "Tabs value should not be greater than ".$resultscn['av_tabs'];

		 return $respose;

	   }

	   else{   

	     $respose = "suc";   

		 return $respose;

	   }  

		

	 } 

	 

	  if($field == 'av_whi'){

	    if($data > $resultscn['av_whistles']) 

	   {

		 $respose = "Whistles value should not be greater than ".$resultscn['av_whistles'];

		 return $respose;

	   }

	   else{   

	     $respose = "suc";   

		 return $respose;

	   }  

		

	 } 

	 

	  if($field == 'av_bat'){

	    if($data > $resultscn['av_batons']) 

	   {

		 $respose = "Batons value should not be greater than ".$resultscn['av_batons'];

		 return $respose;

	   }

	   else{   

	     $respose = "suc";   

		 return $respose;

	   }  

		

	 } 

	 

	  if($field == 'av_rai'){

	    if($data > $resultscn['av_rain_c']) 

	   {

		 $respose = "Rain.C value should not be greater than ".$resultscn['av_rain_c'];

		 return $respose;

	   }

	   else{   

	     $respose = "suc";   

		 return $respose;

	   }  

		

	 } 

	 

	 

	   if($field == 'av_umb'){

	    if($data > $resultscn['av_umbrellas']) 

	   {

		 $respose = "Umbrellas value should not be greater than ".$resultscn['av_umbrellas'];

		 return $respose;

	   }

	   else{   

	     $respose = "suc";   

		 return $respose;

	   }  

		

	 } 

	 

	  if($field == 'aw_maid'){

	    if($data > $resultscn['id_maids']) 

	   {

		 $respose = "Maids value should not be greater than ".$resultscn['id_maids'];

		 return $respose;

	   }

	   else{   

	     $respose = "suc";   

		 return $respose;

	   }  

		

	 } 

	 

	 if($field == 'aw_dri'){

	    if($data > $resultscn['id_drivers']) 

	   {

		 $respose = "Drivers value should not be greater than ".$resultscn['id_drivers'];

		 return $respose;

	   }

	   else{   

	     $respose = "suc";   

		 return $respose;

	   }  

		

	 } 

	 

	 if($field == 'aw_ven'){

	    if($data > $resultscn['id_vendors']) 

	   {

		 $respose = "Vendors value should not be greater than ".$resultscn['id_vendors'];

		 return $respose;

	   }

	   else{   

	     $respose = "suc";   

		 return $respose;

	   }  

		

	 } 

	 

	  if($field == 'aw_inte'){

	    if($data > $resultscn['id_interiors']) 

	   {

		 $respose = "Interiors value should not be greater than ".$resultscn['id_interiors'];

		 return $respose;

	   }

	   else{   

	     $respose = "suc";   

		 return $respose;

	   }  

		

	 } 

	 

	   if($field == 'aw_others'){

	    if($data > $resultscn['id_others']) 

	   {

		 $respose = "Others value should not be greater than ".$resultscn['id_others'];

		 return $respose;

	   }

	   else{   

	     $respose = "suc";   

		 return $respose;

	   }  

		

	 } 

	 

	 



	   

	   

	} 

	

	//echo $resultscn."Count";

   

   //echo "3455";

   /* $datares = array();

   $datares['min']= $data;

   $datares['max'] = $site;

   $datares['status'] = 'suc'; */

   

       return $respose;

    //  return $data;

     // return view ('pages.roombooking') ;

     //return View::make('pages.roombooking')-with(compact('success'));

      //return view('pages.roombooking');



  }
  
  
  // GET MIS REPORTS VALUES
  
  public function getmsvalues(Request $request)

    {

    //redirect('pages.roombooking');

   //return 'success';

   $year= $request->year;

   $month= $request->month;
   
   $site= $request->site;
 
   // OCCUPANCY 
  
   
   $matchfields = ['month' => $month, 'year' => $year, 'site' => $site]; 
   
   
   $flatmatchfields = ['site' => $site]; 
   $flatrescn = \App\Pmsdailyreportvalidation::where($flatmatchfields)->count();
   if($flatrescn > 0){
         $flatresres = \App\Pmsdailyreportvalidation::where($flatmatchfields)->first();
		 $response['flats'] = $flatresres->flats;
   }
    else{
	  $response['flats'] = "0";
 	}
	
		$dateString = $year.'-'.$month.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("t", strtotime($dateString));
		$reporton = $lastDateOfMonth."-".$month."-".$year;
	
	$occupanymatch_fileds = ['reporton' => $reporton, 'site' => $site]; 
	
	 $occres_cn = \App\Pmsdailyreports::where($occupanymatch_fileds)->count();
	 if($occres_cn > 0){
	    $occres_res = \App\Pmsdailyreports::where($occupanymatch_fileds)->first();
		
			$response['occupied'] = $occres_res->occupancy_asdate_owners + $occres_res->occupancy_asdate_tenants;
			$response['owners'] = $occres_res->occupancy_asdate_owners;
			$response['tenants'] = $occres_res->occupancy_asdate_tenants;
			$response['vacant'] = $occres_res->occupancy_asdate_vacant;
	 } 
	 
	 else{
	        $response['occupied'] = "";
			$response['owners'] = "";
			$response['tenants'] = "";
			$response['vacant'] = "";
	    
	 }

		/*$occupan_count = \App\Occupancymisreport::where($matchfields)->count();
		
		if($occupan_count > 0){
		
			$formfieldarray = \App\Occupancymisreport::where($matchfields)->first();
			  $response['occupied'] = $formfieldarray->owners + $formfieldarray->tenants;
			   $response['owners'] = $formfieldarray->owners;
			    $response['tenants'] = $formfieldarray->tenants;
				 $response['vacant'] = $formfieldarray->vacant;
				  $response['record_id'] = $formfieldarray->id;
		
			 }  
			 else{ 
			      $response['occupied'] = "";
			   $response['owners'] = "";
			    $response['tenants'] = "";
				 $response['vacant'] = "";
				 $response['record_id'] = "";
			 } */

 
  print json_encode($response);

}

// GET CMD VALUES


// GET MIS REPORTS VALUES
  
  public function getcmdvalues(Request $request)

    {
   
    //redirect('pages.roombooking');

   //return 'success';

   $year= $request->year;

   $month= $request->month;
   
   $site= $request->site;
 
   // OCCUPANCY 
  
   
   $matchfields = ['month' => $month, 'year' => $year, 'site' => $site]; 
   
   
   $flatmatchfields = ['site' => $site]; 
   $flatrescn = \App\Pmsdailyreportvalidation::where($flatmatchfields)->count();
   if($flatrescn > 0){
         $flatresres = \App\Pmsdailyreportvalidation::where($flatmatchfields)->first();
		 $response['flats'] = $flatresres->flats;
   }
    else{
	  $response['flats'] = "0";
 	}
	
		$dateString = $year.'-'.$month.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("t", strtotime($dateString));
		$reporton = $lastDateOfMonth."-".$month."-".$year;
		
		$matchfields = ['month' => $month, 'year' => $year, 'site' => $site]; 
	
	 $occres_cn = \App\Cmdmisreport::where($matchfields)->count();
	 if($occres_cn > 0){
	    $occres_res = \App\Cmdmisreport::where($matchfields)->first(); 
			$response['owners'] = $occres_res->total_rmd;
			$response['tenants'] = $occres_res->peak_load_record;
			$response['vacant'] = $occres_res->remarks;
	 } 
	 
	 else{
	        
			$response['owners'] = "";
			$response['tenants'] = "";
			$response['vacant'] = "";
	    
	 }

 
  print json_encode($response);

}


// END GET CMD VALUES



  // GET MIS REPORTS VALUES
  
  public function getclubhousemsvalues(Request $request)

    {

    //redirect('pages.roombooking');

   //return 'success';

   $year= $request->year;

   $month= $request->month;
   
   $site= $request->site;
 
   // OCCUPANCY 
  
   
   $matchfields = ['month' => $month, 'year' => $year, 'site' => $site]; 
   
   
   $flatmatchfields = ['site' => $site]; 
   $flatrescn = \App\Pmsdailyreportvalidation::where($flatmatchfields)->count();
   if($flatrescn > 0){
         $flatresres = \App\Pmsdailyreportvalidation::where($flatmatchfields)->first();
		 $response['flats'] = $flatresres->flats;
   }
    else{
	  $response['flats'] = "0";
 	}

		$occupan_count = \App\Clubutilizationmisreport::where($matchfields)->count();
		
		if($occupan_count > 0){
		
		
		
		 $owners = 0;
		 $tenents =  0;
		 $matchoccufields = ['month' => $month, 'year' => $year, 'site' => $site]; 

		$occupan_res_count = \App\Occupancymisreport::where($matchoccufields)->count();
		
		if($occupan_res_count > 0){
		
			$occupencyarray = \App\Occupancymisreport::where($matchoccufields)->first();
			
				$owners = $owners + (float)$occupencyarray['owners'];
				$tenents = $tenents + (float)$occupencyarray['tenants'];
			}
			
			if($month == 1) {
			  $prevmonth = 12;
			  $prevyear  = $year - 1;
			}
			 else
			 {
			   $prevmonth = $month - 1; 
			    $prevyear  = $year;
			 }
			 
		$prev_matchoccufields = ['month' => $prevmonth, 'year' => $prevyear, 'site' => $site]; 
		
		$prev_occupan_res_count = \App\Occupancymisreport::where($prev_matchoccufields)->count();
		
		if($prev_occupan_res_count > 0){
		
			$prev_occupencyarray = \App\Occupancymisreport::where($prev_matchoccufields)->first();
			$owners = $owners + (float)$prev_occupencyarray['owners'];
			$tenents = $tenents + (float)$prev_occupencyarray['tenants']; 
		}
		
		
					$owners = 0; 
					$tenents = 0; 
					$occres_resprev  = array();
					$occres_res = array();
					
		         $dateString = $year.'-'.$month.'-01';
				//Last date of current month.
				 $lastDateOfMonth = date("t", strtotime($dateString));
				//echo  $reporton = $lastDateOfMonth."-".$month."-".$year;
				 $reporton = $year."-".$month."-".$lastDateOfMonth;
				$occupanymatch_fileds = ['reporton' => $reporton, 'site' => $site]; 
				
				 $occres_cn = \App\Pmsdailyreport::where($occupanymatch_fileds)->count(); 
				if($occres_cn > 0){
				$occres_res = \App\Pmsdailyreport::where($occupanymatch_fileds)->first();
				$owners = $owners + (float)$occres_res['occupancy_asdate_owners'];
				$tenents = $tenents + (float)$occres_res['occupancy_asdate_tenants']; 
				
				}
				
				 $prevdateString = $prevyear.'-'.$prevmonth.'-01';
				//Last date of current month.
				 $prevDateOfMonth = date("t", strtotime($prevdateString));
				//echo  $prev_reporton = $prevDateOfMonth."-".$prevmonth."-".$prevyear;
				  $prev_reporton = $prevyear."-".$prevmonth."-".$prevDateOfMonth;
				$prev_occupanymatch_fileds = ['reporton' => $prev_reporton, 'site' => $site]; 
				
				 $occres_cn = \App\Pmsdailyreport::where($prev_occupanymatch_fileds)->count(); 
				if($occres_cn > 0){
				$occres_resprev = \App\Pmsdailyreport::where($prev_occupanymatch_fileds)->first();
				$owners = $owners + (float)$occres_resprev['occupancy_asdate_owners'];
				$tenents = $tenents + (float)$occres_resprev['occupancy_asdate_tenants'];   
				}
				
        /*   echo "<pre>";
		    print_r($occres_resprev);
		   echo "</pre>";
		   echo "<pre>";
		    print_r($occres_res);
		   echo "</pre>";
		   
		   exit; */
	
		
			$formfieldarray = \App\Clubutilizationmisreport::where($matchfields)->first();
			  
				$response['avg_occupancy'] = round((float)(($owners + $tenents)/2));
				$response['avg_daily_swim'] = $formfieldarray->avg_daily_swim;
				$response['avg_daily_gym'] = $formfieldarray->avg_daily_gym;
				$response['occ_flat_swim'] = $formfieldarray->occ_flat_swim;
				$response['occ_gym_swim'] = $formfieldarray->occ_gym_swim;
				$response['record_id'] = $formfieldarray->id;
			   
			 }  
			 else{ 
				$response['avg_occupancy'] = "";
				$response['avg_daily_swim'] = "";
				$response['avg_daily_gym'] = "";
				$response['occ_flat_swim'] = "";
				$response['occ_gym_swim'] = "";
				$response['record_id'] = "0";
				 
			 
			 }

 
  print json_encode($response);

}


// GET BOREWELL NOTWORKING MIS

  public function getwaterconsump(Request $request)

    {

    //redirect('pages.roombooking');

   //return 'success';

   $year= $request->year;

   $month= $request->month;
   
   $site= $request->site;
 
   // OCCUPANCY  
  
   
   $matchfields = ['month' => $month, 'year' => $year, 'site' => $site]; 
   
   
   $brwmatchfields = ['site' => $site]; 
   $flatrescn = \App\Dailyreportvalidation::where($brwmatchfields)->count();
   if($flatrescn > 0){
         $brwresres = \App\Dailyreportvalidation::where($brwmatchfields)->first();
		 $response['borewellsnum'] = $brwresres->borewellsnum;
   } 
    else{
	  $response['borewellsnum'] = "0";
 	}
 
		$occupan_count = \App\Waterconsumpmisreport::where($matchfields)->count();
		
		if($occupan_count > 0){
		
			$formfieldarray = \App\Waterconsumpmisreport::where($matchfields)->first();
				
				
				$response['record_id'] = $formfieldarray->id;
				$response['additional_info'] = $formfieldarray->additional_info;
		
			 }  
			 else{ 
				
				$response['record_id'] = "";
				$response['additional_info'] = "";
				
			 }

 
  print json_encode($response);

}


// GET BOREWELL NOTWORKING MIS

  public function getbrnwmsvalues(Request $request)

    {

    //redirect('pages.roombooking');

   //return 'success';

   $year= $request->year;

   $month= $request->month;
   
   $site= $request->site;
 
   // OCCUPANCY  
  
   
   $matchfields = ['month' => $month, 'year' => $year, 'site' => $site]; 
   
   
   $brwmatchfields = ['site' => $site]; 
   $flatrescn = \App\Dailyreportvalidation::where($brwmatchfields)->count();
   if($flatrescn > 0){
         $brwresres = \App\Dailyreportvalidation::where($brwmatchfields)->first();
		 $response['borewellsnum'] = $brwresres->borewellsnum;
   } 
    else{
	  $response['borewellsnum'] = "0";
 	}
 
		$occupan_count = \App\Borewellsnwmisreport::where($matchfields)->count();
		
		if($occupan_count > 0){
		
			$formfieldarray = \App\Borewellsnwmisreport::where($matchfields)->first();
				
				$response['nw_bores_num'] = $formfieldarray->nw_bores_num;
				$response['no_ground_water'] = $formfieldarray->no_ground_water;
				$response['over_load'] = $formfieldarray->over_load;
				$response['motor_brunt'] = $formfieldarray->motor_brunt;
				$response['cable_prblm'] = $formfieldarray->cable_prblm;
				$response['pumpormotorwear'] = $formfieldarray->pumpormotorwear;
				$response['record_id'] = $formfieldarray->id;
				$response['others'] = $formfieldarray->others;
				$response['dry_run_protectn'] = $formfieldarray->dry_run_protectn;
				$response['flow_meter'] = $formfieldarray->flow_meter;
				$response['remarks'] = $formfieldarray->remarks;
		
			 }  
			 else{ 
				$response['nw_bores_num'] = "";
				$response['no_ground_water'] = "";
				$response['over_load'] = "";
				$response['motor_brunt'] = "";
				$response['cable_prblm'] = "";
				$response['pumpormotorwear'] = "";
				$response['record_id'] = "";
				$response['others'] = "";
				$response['dry_run_protectn'] = "";
				$response['flow_meter'] = "";
				$response['remarks'] = "";
			 }

 
  print json_encode($response);

}
    
  public function getfiresafemsvalues(Request $request)

    {

    //redirect('pages.roombooking');

   //return 'success';
 
   $year= $request->year;

   $month= $request->month;
   
   $site= $request->site;
 
   // OCCUPANCY  
  
   
   $matchfields = ['month' => $month, 'year' => $year, 'site' => $site]; 
   
   $firesafevalidation = array();
   $formfieldarray = array();
   $frsmatchfields = ['site' => $site]; 
   
   $dateString = $year.'-'.$month.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$month."-".$year;
		$record_id = 0;
		
   $frsrescn = \App\Firesafedailyreportvalidation::where($frsmatchfields)->count();
   if($frsrescn > 0){
         $firesafevalidation = \App\Firesafedailyreportvalidation::where($frsmatchfields)->first();
   }  
		$occupan_count = \App\Firesafetymisreport::where($matchfields)->count();
		 $fireissueget_res = array();
		if($occupan_count > 0){
		
			$formfieldarray = \App\Firesafetymisreport::where($matchfields)->first();
			$record_id = $formfieldarray->id;
			$issuematchfield =  ['ref_id' => $record_id, 'site' => $site]; 
			
			 $fireissuecn = \App\Firesafenotworkingissue::where($issuematchfield)->count();
			 if($fireissuecn > 0){
			    $fireissueget_res = \App\Firesafenotworkingissue::where($issuematchfield)->get();
			 }
			 }   
			 
			  if(Auth::user()->id == 1){
	      $sitenames = \App\Sites::get()->pluck('name', 'id')->prepend('Please Select', '');
		  $siteattrname = \App\Sites::get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->get()->pluck('name', 'id')->prepend('Please Select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }
			 
			   $relations = [
             'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'validation' => $firesafevalidation,
			'res' => $formfieldarray,  
			'report_on' => $reportdate_val,
			'report_year' => $year,
			'report_month' => $month,
			'record_id' => $record_id,
			'firesafeissues' => $fireissueget_res,
			'site' => $site,
			
        ];     
		  
		return view('misreportsdetail.templates.misfiresafe', $relations);
		
		

}

/* GET EQUIPMENT VALUES */


  public function getequipmentmisvalues(Request $request)

    {

    //redirect('pages.roombooking');

   //return 'success';
 
   $year= $request->year;

   $month= $request->month;
   
   $site= $request->site;
 
   // OCCUPANCY  
   
   
   $matchfields = ['month' => $month, 'year' => $year, 'site' => $site]; 
   
   $equipvalidation = array();
   $formfieldarray = array();
   $eqpmatchfields = ['site' => $site]; 
   
   $dateString = $year.'-'.$month.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$month."-".$year;
		$record_id = 0;
		
   $equipcn = \App\Dailyreportvalidation::where($eqpmatchfields)->count();
   if($equipcn > 0){
         $equipvalidation = \App\Dailyreportvalidation::where($eqpmatchfields)->first();
   }  
		$occupan_count = \App\Equipmentmisreport::where($matchfields)->count();
		 $fireissueget_res = array();
		if($occupan_count > 0){
		 
			$formfieldarray = \App\Equipmentmisreport::where($matchfields)->first();
			$record_id = $formfieldarray->id;
			$issuematchfield =  ['ref_id' => $record_id, 'site' => $site]; 
			
			 $fireissuecn = \App\Equipmentnotworkingissue::where($issuematchfield)->count();
			 if($fireissuecn > 0){
			    $fireissueget_res = \App\Equipmentnotworkingissue::where($issuematchfield)->get();
			 }
			 }   
			 
			  if(Auth::user()->id == 1){
	      $sitenames = \App\Sites::get()->pluck('name', 'id')->prepend('Please Select', '');
		  $siteattrname = \App\Sites::get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->get()->pluck('name', 'id')->prepend('Please Select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }
			 
			   $relations = [
             'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'validation' => $equipvalidation,
			'res' => $formfieldarray,  
			'report_on' => $reportdate_val,
			'report_year' => $year,
			'report_month' => $month,
			'record_id' => $record_id,
			'firesafeissues' => $fireissueget_res,
			'site' => $site,
			
        ];     
		      
		return view('misreportsdetail.templates.misequipment', $relations);
		
		   

}


/* END GET EQUIPMENT VALUES */




/* GET STP VALUES */


  public function getstpmsvalues(Request $request)

    {

    //redirect('pages.roombooking');

   //return 'success';
 
   $year= $request->year;

   $month= $request->month;
   
   $site= $request->site;
 
   // OCCUPANCY  
   
   
   $matchfields = ['month' => $month, 'year' => $year, 'site' => $site]; 
   
   $equipvalidation = array(); 
   $formfieldarray = array();
   $eqpmatchfields = ['site' => $site]; 
   
   $dateString = $year.'-'.$month.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$month."-".$year;
		$record_id = 0;
		
   $equipcn = \App\Dailyreportvalidation::where($eqpmatchfields)->count();
   if($equipcn > 0){
         $equipvalidation = \App\Dailyreportvalidation::where($eqpmatchfields)->first();
   }  
		$occupan_count = \App\Stpmisreport::where($matchfields)->count();
		 $fireissueget_res = array();
		if($occupan_count > 0){
		 
			$formfieldarray = \App\Stpmisreport::where($matchfields)->first();
			$record_id = $formfieldarray->id;
			$issuematchfield =  ['ref_id' => $record_id, 'site' => $site]; 
			
			 $fireissuecn = \App\Stpnotworkingissue::where($issuematchfield)->count();
			 if($fireissuecn > 0){
			    $fireissueget_res = \App\Stpnotworkingissue::where($issuematchfield)->get();
			 }
			 }   
			 
			  if(Auth::user()->id == 1){
	      $sitenames = \App\Sites::get()->pluck('name', 'id')->prepend('Please Select', '');
		  $siteattrname = \App\Sites::get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->get()->pluck('name', 'id')->prepend('Please Select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }
			 
			   $relations = [ 
             'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'validation' => $equipvalidation,
			'res' => $formfieldarray,  
			'report_on' => $reportdate_val,
			'report_year' => $year,
			'report_month' => $month,
			'record_id' => $record_id,
			'firesafeissues' => $fireissueget_res,
			'site' => $site,
			
        ];     
		      
		return view('misreportsdetail.templates.misstp', $relations);
		
		

}


/* END GET STP VALUES */



/* GET STP VALUES */


  public function gettrafficvalues(Request $request)

    {

    //redirect('pages.roombooking');

   //return 'success';
 
   $year= $request->year;

   $month= $request->month;
   
   $site= $request->site;
 
   // OCCUPANCY  
    $sitename = "";
   if($site){
  	 $sitename=get_sitename($site);
   }
   
   
   $matchfields = ['month' => $month, 'year' => $year, 'site' => $site]; 
   
   $equipvalidation = array();
   $formfieldarray = array();
   $eqpmatchfields = ['site' => $site]; 
   
   $dateString = $year.'-'.$month.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$month."-".$year;
		$record_id = 0;
		
   $equipcn = \App\Dailyreportvalidation::where($eqpmatchfields)->count();
   if($equipcn > 0){
         $equipvalidation = \App\Dailyreportvalidation::where($eqpmatchfields)->first();
   }  
		$occupan_count = \App\Trafficmisreport::where($matchfields)->count();
		 $fireissueget_res = array();
		if($occupan_count > 0){
		 
			$formfieldarray = \App\Trafficmisreport::where($matchfields)->first();
			
			 }   
			 
			  if(Auth::user()->id == 1){
	      $sitenames = \App\Sites::get()->pluck('name', 'id')->prepend('Please Select', '');
		  $siteattrname = \App\Sites::get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->get()->pluck('name', 'id')->prepend('Please Select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }
			 
			   $relations = [   
             'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'validation' => $equipvalidation,
			'res' => $formfieldarray,  
			'report_on' => $reportdate_val,
			'report_year' => $year,
			'report_month' => $month,
			'record_id' => $record_id,
			'firesafeissues' => $fireissueget_res,
			'site' => $site,
			'selsitename' => $sitename,
			
        ];      
		      
		return view('misreportsdetail.templates.traffic', $relations);
		
		

}





/* GET WSP VALUES */


  public function getwspmsvalues(Request $request)

    {

    //redirect('pages.roombooking');

   //return 'success';
 
   $year= $request->year;

   $month= $request->month;
   
   $site= $request->site;
 
   // OCCUPANCY  
   
   
   $matchfields = ['month' => $month, 'year' => $year, 'site' => $site]; 
   
   $equipvalidation = array();
   $formfieldarray = array();
   $eqpmatchfields = ['site' => $site]; 
   
   $dateString = $year.'-'.$month.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$month."-".$year;
		$record_id = 0;
		
   $equipcn = \App\Dailyreportvalidation::where($eqpmatchfields)->count();
   if($equipcn > 0){
         $equipvalidation = \App\Dailyreportvalidation::where($eqpmatchfields)->first();
   }  
		$occupan_count = \App\Wspmisreport::where($matchfields)->count();
		 $fireissueget_res = array();
		if($occupan_count > 0){
		 
			$formfieldarray = \App\Wspmisreport::where($matchfields)->first();
			$record_id = $formfieldarray->id;
			$issuematchfield =  ['ref_id' => $record_id, 'site' => $site]; 
			
			 $fireissuecn = \App\Wspnotworkingissue::where($issuematchfield)->count();
			 if($fireissuecn > 0){
			    $fireissueget_res = \App\Wspnotworkingissue::where($issuematchfield)->get();
			 }
			 }   
			   
			  if(Auth::user()->id == 1){
	      $sitenames = \App\Sites::get()->pluck('name', 'id')->prepend('Please Select', '');
		  $siteattrname = \App\Sites::get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->get()->pluck('name', 'id')->prepend('Please Select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }
			 
			   $relations = [ 
             'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'validation' => $equipvalidation,
			'res' => $formfieldarray,  
			'report_on' => $reportdate_val,
			'report_year' => $year,
			'report_month' => $month,
			'record_id' => $record_id,
			'firesafeissues' => $fireissueget_res,
			'site' => $site,
			
        ];     
		      
		return view('misreportsdetail.templates.miswsp', $relations);
		
		

}


/* END GET WSP VALUES */




/* GET Security VALUES */


  public function getsecuritymsvalues(Request $request)

    {

    //redirect('pages.roombooking');

   //return 'success';
 
   $year= $request->year;

   $month= $request->month;
   
   $site= $request->site;
 
   // OCCUPANCY  
   $sitename = "";
   if($site){
  	 $sitename=get_sitename($site);
   }
   $prev_sec_report = array();
   
   $matchfields = ['month' => $month, 'year' => $year, 'site' => $site]; 
   
   $current_month=$month;
   $current_year=$year;
	if($current_month==1)
	{
		$lastmonth=12;
		$lastyear = $current_year - 1;
	}
	else
	{
		$lastmonth=$current_month-1;
		$lastyear = $current_year;
	} 
	   $dateString = $year.'-'.$month.'-04';
		//Last date of current month.
		$lastdateofmonth = date("t", strtotime($dateString));   
   $report_on_date = $lastyear."-".$lastmonth."-".$lastdateofmonth;
   
   $lastdateofmonth=date('t',$month);
   $report_on_date = $year."-".$month."-".$lastdateofmonth;
   
    
	$security_match_fields = ['site' => $site,'reporton' => $report_on_date];
	
	 $prev_sec_report_cn = \App\Securitydailyreport::where($security_match_fields)->count();
   if($prev_sec_report_cn > 0){
         $prev_sec_report = \App\Securitydailyreport::where($security_match_fields)->first();
   }   
   
   
   $equipvalidation = array();
   $formfieldarray = array();
   $eqpmatchfields = ['site' => $site]; 
   
   $dateString = $year.'-'.$month.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$month."-".$year;
		$record_id = 0;
		
   $equipcn = \App\Securitydailyreportvalidation::where($eqpmatchfields)->count();
   if($equipcn > 0){
         $equipvalidation = \App\Securitydailyreportvalidation::where($eqpmatchfields)->first();
   }  
		$occupan_count = \App\Securitymisreport::where($matchfields)->count();
		 $fireissueget_res = array();
		if($occupan_count > 0){
		 
			$formfieldarray = \App\Securitymisreport::where($matchfields)->first();
			
			 }   
			   
			  if(Auth::user()->id == 1){
	      $sitenames = \App\Sites::get()->pluck('name', 'id')->prepend('Please Select', '');
		  $siteattrname = \App\Sites::get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{
 
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->get()->pluck('name', 'id')->prepend('Please Select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }
			 
			   $relations = [ 
             'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'validation' => $equipvalidation,
			'res' => $formfieldarray,  
			'report_on' => $reportdate_val,
			'report_year' => $year,
			'report_month' => $month,
			'record_id' => $record_id,   
			'site' => $site,
			'previous' => $prev_sec_report,
			'selsitename' => $sitename,
			
        ];     
		      
		return view('misreportsdetail.templates.missecure', $relations);
		
		

}

/* GET HORTICULTURE MIS VALUES */

  public function gethorticulturemsvalues(Request $request)

    {

    //redirect('pages.roombooking');

   //return 'success';
 
   $year= $request->year;

   $month= $request->month;
   
   $site= $request->site;
 
   // OCCUPANCY  
   $sitename = "";
   if($site){
  	 $sitename=get_sitename($site);
   }
   $prev_sec_report = array();
   
   $matchfields = ['month' => $month, 'year' => $year, 'site' => $site];  
   
   $equipvalidation = array();
   $formfieldarray = array();
   $eqpmatchfields = ['site' => $site]; 
   
   $dateString = $year.'-'.$month.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$month."-".$year;
		$record_id = 0; 
		
   $equipcn = \App\Securitydailyreportvalidation::where($eqpmatchfields)->count();
   if($equipcn > 0){
         $equipvalidation = \App\Securitydailyreportvalidation::where($eqpmatchfields)->first();
   }  
		$occupan_count = \App\Horticulturemisreport::where($matchfields)->count();
		 $fireissueget_res = array();
		if($occupan_count > 0){
		 
			$formfieldarray = \App\Horticulturemisreport::where($matchfields)->first(); 
			
			 }    
			   
			  if(Auth::user()->id == 1){
	      $sitenames = \App\Sites::get()->pluck('name', 'id')->prepend('Please Select', '');
		  $siteattrname = \App\Sites::get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{
 
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->get()->pluck('name', 'id')->prepend('Please Select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }
			 
			   $relations = [ 
             'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'validation' => $equipvalidation,
			'res' => $formfieldarray,  
			'report_on' => $reportdate_val,
			'report_year' => $year,
			'report_month' => $month,
			'record_id' => $record_id,
			'site' => $site,
			'previous' => $prev_sec_report,
			'selsitename' => $sitename,
			  
        ];     
		      
		return view('misreportsdetail.templates.mishorticulture', $relations);
		
}


/* END HORTICULTURE MIS VALUE */

/* GET HOUSE KEEPING MIS VALUES */


  public function gethousekpmisvalues(Request $request)

    {

    //redirect('pages.roombooking');

   //return 'success';
 
   $year= $request->year;

   $month= $request->month;
   
   $site= $request->site;
 
   // OCCUPANCY  
   $sitename = "";
   if($site){
  	 $sitename=get_sitename($site);
   }
   $prev_sec_report = array();
   
   $matchfields = ['month' => $month, 'year' => $year, 'site' => $site]; 
   
   $current_month=$month;
   $current_year=$year;
	if($current_month==1)
	{
		$lastmonth=12;
		$lastyear = $current_year - 1;
	}
	else
	{
		$lastmonth=$current_month-1;
		$lastyear = $current_year;
	} 
   $lastdateofmonth=date('t',$lastmonth);
   
   $report_on_date = $lastyear."-".$lastmonth."-".$lastdateofmonth;
    
	$security_match_fields = ['site' => $site,'reporton' => $report_on_date];
	
	 $prev_sec_report_cn = \App\Securitydailyreport::where($security_match_fields)->count();
   if($prev_sec_report_cn > 0){
         $prev_sec_report = \App\Securitydailyreport::where($security_match_fields)->first();
   }   
   
   
   $equipvalidation = array();
   $formfieldarray = array();
   $eqpmatchfields = ['site' => $site]; 
   
   $dateString = $year.'-'.$month.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$month."-".$year;
		$record_id = 0;
		
   $equipcn = \App\Securitydailyreportvalidation::where($eqpmatchfields)->count();
   if($equipcn > 0){
         $equipvalidation = \App\Securitydailyreportvalidation::where($eqpmatchfields)->first();
   }  
		$occupan_count = \App\Housekpmisreport::where($matchfields)->count();
		 $fireissueget_res = array();
		if($occupan_count > 0){
		 
			$formfieldarray = \App\Housekpmisreport::where($matchfields)->first();
			
			 }   
			   
			  if(Auth::user()->id == 1){
	      $sitenames = \App\Sites::get()->pluck('name', 'id')->prepend('Please Select', '');
		  $siteattrname = \App\Sites::get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{
 
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->get()->pluck('name', 'id')->prepend('Please Select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }
		  
		  $deployment = array();
		  
		   
		  foreach($siteattrname as $dep => $deploy){
		  
		   $deppmatchfields = ['site' => $dep];
		   $deprescn = \App\Pmsdailyreportvalidation::where($deppmatchfields)->count();
		   if($deprescn > 0){
		   		$depresult = \App\Pmsdailyreportvalidation::where($deppmatchfields)->first();
				//$deployment['deployment'][$dep] = (float)$depresult['house_sup'] + (float)$depresult['house_help'] + (float)$depresult['clu_hs_fo'] +  (float)$depresult['clu_hs_hk'] +  (float)$depresult['other'];
				$deployment['deployment'][$dep] =  (float)$depresult['house_help'] + (float)$depresult['clu_hs_hk'];
			} 	else{
			   $deployment['deployment'][$dep] = 0;
			}
		      
		  }  
			 
			   $relations = [ 
             'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'validation' => $equipvalidation,
			'res' => $formfieldarray,  
			'report_on' => $reportdate_val,
			'report_year' => $year,
			'report_month' => $month,
			'record_id' => $record_id,
			'site' => $site,
			'previous' => $prev_sec_report,
			'selsitename' => $sitename,
			'deployment' => $deployment, 
			'flatsnum' => $flatres,   
			
        ];     
		      
		return view('misreportsdetail.templates.mishousekp', $relations);
		
		

}



/* END GET HOUSE KEEPING MIS VALUES */



/* GET INDENT EXPORT*/



  public function getindentviewexport(Request $request)

    { 

    //redirect('pages.roombooking');

   //return 'success';
 
   $year= $request->year;

   $month= $request->month;
   
   $site= $request->site;
   $sitename = "";
   if($site){
  	 $sitename=get_sitename($site);
   }
 
   // OCCUPANCY  
   
   
   $matchfields = ['month' => $month, 'year' => $year, 'site' => $site]; 
   
   $equipvalidation = array();
   $formfieldarray = array();
  
   
   $dateString = $year.'-'.$month.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$month."-".$year;
		$record_id = 0;
		$laggeddate = '';
   
		$occupan_count = \App\Indentedmisreport::where($matchfields)->count();
		 $fireissueget_res = array();
		if($occupan_count > 0){
		 
			$formfieldarray = \App\Indentedmisreport::where($matchfields)->get();
			$formfieldarray_first = \App\Indentedmisreport::where($matchfields)->first();
			 $laggeddate = $formfieldarray_first->laggeddate;
			
			 }   
			 
			
			   
			  if(Auth::user()->id == 1){
	      $sitenames = \App\Sites::get()->pluck('name', 'id')->prepend('Please Select', '');
		  $siteattrname = \App\Sites::get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->get()->pluck('name', 'id')->prepend('Please Select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }
			 
			   $relations = [ 
             'sites' => $siteattrname,
			'sitenames' => $sitenames,
			
			'res' => $formfieldarray,  
			'report_on' => $reportdate_val,
			'report_year' => $year,
			'report_month' => $month,
			'laaggeddate' => $laggeddate,
			
			'site' => $site,
			'sitename' => $sitename,
        ];     
		       
		return view('misfiles.view.template.inden', $relations);
		
		

}
/* GET EXCEL EXPORT DETAILS */


/* GET INDENT EXPORT*/



  public function getapnacomptviewexport(Request $request)

    { 

    //redirect('pages.roombooking');

   //return 'success';
 
   $year= $request->year;

   $month= $request->month;
   
   $site= $request->site;
   $sitename = "";
   if($site){
  	 $sitename=get_sitename($site);
   }
 
   // OCCUPANCY  
   
   
   $matchfields = ['month' => $month, 'year' => $year, 'site' => $site]; 
   
   $equipvalidation = array();
   $formfieldarray = array();
  
   
   $dateString = $year.'-'.$month.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$month."-".$year;
		$record_id = 0;
		$laggeddate = '';
   
		$occupan_count = \App\Apnacomplaintmisreport::where($matchfields)->count();
		 $fireissueget_res = array();
		if($occupan_count > 0){
		 
			$formfieldarray = \App\Apnacomplaintmisreport::where($matchfields)->get();
			$formfieldarray_first = \App\Apnacomplaintmisreport::where($matchfields)->first();
			 $laggeddate = $formfieldarray_first->laggeddate;
			
			 }   
			 
			
			   
			  if(Auth::user()->id == 1){
	      $sitenames = \App\Sites::get()->pluck('name', 'id')->prepend('Please Select', '');
		  $siteattrname = \App\Sites::get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->get()->pluck('name', 'id')->prepend('Please Select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }
			 
			   $relations = [ 
             'sites' => $siteattrname,
			'sitenames' => $sitenames,
			
			'res' => $formfieldarray,  
			'report_on' => $reportdate_val,
			'report_year' => $year,
			'report_month' => $month,
			'laaggeddate' => $laggeddate,
			
			'site' => $site,
			'sitename' => $sitename,
        ];     
		       
		return view('misfiles.view.template.apnacomplaint', $relations);
		
		

} 

/* MOCK DRILL */

    public function getmockdrillexport(Request $request)

    { 

    //redirect('pages.roombooking');

   //return 'success';
 
   $year= $request->year;

   $month= $request->month;
   
   $site= $request->site;
   $sitename = "";
   if($site){
  	 $sitename=get_sitename($site);
   }
 
   // OCCUPANCY  
   
   
   $matchfields = ['month' => $month, 'year' => $year, 'site' => $site]; 
   
   $equipvalidation = array();
   $formfieldarray = array();
  
   
   $dateString = $year.'-'.$month.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$month."-".$year;
		$record_id = 0;
		$laggeddate = '';
   
		$occupan_count = \App\Mockdrillmisreport::where($matchfields)->count();
		 $fireissueget_res = array();
		if($occupan_count > 0){
		 
			$formfieldarray = \App\Mockdrillmisreport::where($matchfields)->get();
			$formfieldarray_first = \App\Mockdrillmisreport::where($matchfields)->first();
			 $laggeddate = $formfieldarray_first->laggeddate;
			
			 }   
			 
			   
			  if(Auth::user()->id == 1){
	      $sitenames = \App\Sites::get()->pluck('name', 'id')->prepend('Please Select', '');
		  $siteattrname = \App\Sites::get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->get()->pluck('name', 'id')->prepend('Please Select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }
			 
			   $relations = [ 
             'sites' => $siteattrname,
			'sitenames' => $sitenames,
			
			'res' => $formfieldarray,  
			'report_on' => $reportdate_val,
			'report_year' => $year,
			'report_month' => $month,
			'laaggeddate' => $laggeddate,
			
			'site' => $site,
			'sitename' => $sitename,
        ];     
		             
		return view('misfiles.view.template.mockdrill', $relations);
		  
		

} 



/* PREPARE FIRE */

    public function getprepareexport(Request $request)

    {  

    //redirect('pages.roombooking');

   //return 'success';
 
   $year= $request->year;

   $month= $request->month;
   
   $site= $request->site;
   $sitename = "";
   if($site){
  	 $sitename=get_sitename($site);
   }
 
   // OCCUPANCY  
   
   
   $matchfields = ['month' => $month, 'year' => $year, 'site' => $site]; 
   
   $equipvalidation = array();
   $formfieldarray = array();
  
   
   $dateString = $year.'-'.$month.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$month."-".$year;
		$record_id = 0;
		$laggeddate = '';
   
		$occupan_count = \App\Firepreparemisreport::where($matchfields)->count();
		 $fireissueget_res = array();
		if($occupan_count > 0){
		 
			$formfieldarray = \App\Firepreparemisreport::where($matchfields)->get();
			$formfieldarray_first = \App\Firepreparemisreport::where($matchfields)->first();
			 $laggeddate = $formfieldarray_first->laggeddate;
			
			 }   
			 
			   
			  if(Auth::user()->id == 1){
	      $sitenames = \App\Sites::get()->pluck('name', 'id')->prepend('Please Select', '');
		  $siteattrname = \App\Sites::get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->get()->pluck('name', 'id')->prepend('Please Select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }
			 
			   $relations = [ 
             'sites' => $siteattrname,
			'sitenames' => $sitenames,
			
			'res' => $formfieldarray,  
			'report_on' => $reportdate_val,
			'report_year' => $year,
			'report_month' => $month,
			'laaggeddate' => $laggeddate,
			
			'site' => $site,
			'sitename' => $sitename,
        ];     
		             
		return view('misfiles.view.template.prepare', $relations);
		  
		

} 


//CHECK MIS STATUS

public function checkmisstatusreports(Request $request)

    {
	
  $month= $request->month;
  
  $year= $request->year;
  
  $misstatus = array();
  
  $misstatus =  checkmisstatus($month, $year);
  
   $relations = [

            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),
			'sites_attr_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id'),
			'syear' => $year,
			'smonth' => $month,
			'misstatus' => $misstatus,
			 

        ]; 
		
		//echo "<pre>"; print_r($misstatus);echo "</pre>"; exit;
  
		  return view('misreports.misstatus', $relations);


}

// END CHECK MIS STATUS


public function checkdailystatus(Request $request)

    {
	
  $date= $request->dateval;

	$datearr = explode("-",$date);

	$month = $datearr[1];

	$year = $datearr[2];

	//$site = '5';



	$rdate = $year."-".$month."-".$datearr[0];
	
	$rdate  =  $date;


	      if(Auth::user()->id == 1){


	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');



		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');



		  }else{



		    $role_id = Auth::user()->role_id;



			$emp_id = Auth::user()->emp_id;




			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();


			 $siteinfo = $getemp_info->community;

   

			$sitearr = explode(",",$siteinfo);




			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');



			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');



		  }
		  $res_Status = array();
		  foreach($siteattrname as $kk => $siten){
		     $res_Status[$kk] =  checkDailyStatus($rdate, $kk);
		  }




		$relations = [



            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),



			'sites_names' => $sitenames,



			'sites_attr_names' => $siteattrname,
			
			'res_Status' =>  $res_Status,


        ];
		
		//print_r($res_Status);
		//exit;
		 
		return view('dailyreports.dailystatus', $relations);


}


public function getdailymonthstatus(Request $request)

    {
	

	$month = $request->month;
	$year = $request->year;
	$cat = $request->category;
	
     $date_val = $year."-".$month."-1"; 
    $lastdate_day = date("t", strtotime($date_val));
 
	
	$rdate  =  "1"."-".$month."-".$year; 

	      if(Auth::user()->id == 1){
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			 $siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  }
		  $res_Status = array();
		  foreach($siteattrname as $kk => $siten){
			 for($ii=1; $ii<= $lastdate_day; $ii++){
			   if($ii > 0) {
			   $rdate =   $ii."-".$month."-".$year;
			     $checkval = checkDailyStatus($rdate, $kk);
				 if($cat == 'Fire Safety'){
				 $res_Status[$kk][$ii] =  $checkval[0];
				 }
				 elseif($cat == 'FMS'){
				 $res_Status[$kk][$ii] =  $checkval[1];
				 }
				  elseif($cat == 'PMS'){
				  $res_Status[$kk][$ii] =  $checkval[2];
				  }
				  elseif($cat == 'Security'){
				  $res_Status[$kk][$ii] =  $checkval[3];
				  }
			   
			   }
			 }
		  } 
		$relations = [
            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			'sites_names' => $sitenames,
			'sites_attr_names' => $siteattrname,
			'res_Status' =>  $res_Status,
			'category' => $cat,
			'year' => $year,
			'month' => $month,
			'daycount' => $lastdate_day,
        ];
	
		  
		return view('dailyreports.advancedreportsres', $relations);


}


// GET DASHBOARD RESULTS


public function getsitedashboard(Request $request)

    {
	
	$site_id = $request->site;
	
      $siteattrname = array();
	  $forum = array();
	  $fmsrec = array();
	  
	 if(Auth::user()->id == 1){
	  	  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site_id)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site_id)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
	      if($site_id == 'all'){
		     $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', '');
			 $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  }
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{
 
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo); 
			$sitenames = \App\Sites::where('id', '=', $site_id)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', '');
			$siteattrname = \App\Sites::where('id', '=', $site_id)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			 if($site_id == 'all'){
		    $sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site_id)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site_id)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  }
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }  
	       
		
	 $uid = Auth::user()->id;
	if($uid==1) 
            $assets = Task::select("tasks.*",'categories.name as catgname')
                        ->leftJoin('categories','categories.id','=','tasks.category')->take(5)->get();
        else {
            //$assets = Task::join('task_users','tasks.id','=','task_users.task_id')->where('task_users.user_id',$uid)->get();
            $assets = TaskUser::select("tasks.*",'categories.name as catgname')
                ->leftJoin('tasks','tasks.id','=','task_users.task_id')
                ->leftJoin('users','users.emp_id','=','task_users.user_id')
                ->leftJoin('categories','categories.id','=','tasks.category')
                ->where('users.id',$uid)->take(5)->get();
        }
		
		  $forum  = Forum::select("forums.*",'categories.name as catgname')
                        ->leftJoin('categories','categories.id','=','forums.category')->take(5)->get(); 
						
						foreach($siteattrname as $kk => $siten){
						    $resdate = date("Y-m-d");
							$date = date('Y-m-d');
							$resdate = date('Y-m-d', strtotime($date .' -1 day')); 
							$datefilter = date('d-m-Y', strtotime($date .' -1 day'));   
							
							$match_pmp_fields = ['site' => $kk, 'reporton' => $resdate]; 
							$match_tot_pmp_fields = ['site' => $kk]; 
							$match_count = \App\Firesafedailyreport::where($match_pmp_fields)->count();
							$match_tao_count = \App\Firesafedailyreportvalidation::where($match_tot_pmp_fields)->count();
							if($match_count > 0) {
							   $match_pmp_Res = \App\Firesafedailyreport::where($match_pmp_fields)->first();
							  
								$dgpump['nw'][$kk] =  $match_pmp_Res['dgpumpnotworking'];
								$dgpump['auto'][$kk] =  $match_pmp_Res['dgpumpauto'];
								$dgpump['off'][$kk]=  $match_pmp_Res['dgpumpoff'];
								 
								$mainpump['nw'][$kk] =  $match_pmp_Res['mainpumpnotworking'];
								$mainpump['auto'][$kk] =  $match_pmp_Res['mainpumpauto'];
								$mainpump['off'][$kk]=  $match_pmp_Res['mainpumpoff'];
								
								$jockeypmp['nw'][$kk] =  $match_pmp_Res['jockeypumpnotworking'];
								$jockeypmp['auto'][$kk] =  $match_pmp_Res['jockeypumpauto'];
								$jockeypmp['off'][$kk]=  $match_pmp_Res['jockeypumpoff'];
								
								$exahuster['co2'][$kk] =  $match_pmp_Res['co2firenotworking'];
								$exahuster['dcp'][$kk] =  $match_pmp_Res['dcpfirenotworking'];
								$exahuster['water'][$kk]=  $match_pmp_Res['waterfirenotworking'];
								
							       
								 
							}
							else{
							   $dgpump['nw'][$kk]  = "";
							   $dgpump['auto'][$kk] =  "";
								$dgpump['off'][$kk]=  "";
								 
								$mainpump['nw'][$kk] =  "";
								$mainpump['auto'][$kk] = "";
								$mainpump['off'][$kk]=  "";
								
								$jockeypmp['nw'][$kk] = "";
								$jockeypmp['auto'][$kk] =  "";
								$jockeypmp['off'][$kk]= "";
								
								$exahuster['co2'][$kk] = "";
								$exahuster['dcp'][$kk] =  "";
								$exahuster['water'][$kk]= "";
							}  
							if($match_tao_count > 0){
							 $match_tot_res = \App\Firesafedailyreportvalidation::where($match_tot_pmp_fields)->first();
							 $dgpump['tot'][$kk] =  $match_tot_res['dgpump'];
							 $mainpump['tot'][$kk] =  $match_tot_res['mainpump'];
							 $jockeypmp['tot'][$kk]=  $match_tot_res['jockeypump'];
							 $exahuster['tot'][$kk]=  $match_tot_res['fireextinguishers'];
							 
							 
							}
							else{
							 $dgpump['tot'][$kk] = "";
							 $mainpump['tot'][$kk] =  "";
							 $jockeypmp['tot'][$kk]= "";
							 $exahuster['tot'][$kk] = "";
							}
							
							$match_fms_count = \App\Fmsdailyreport::where($match_pmp_fields)->count();
							if($match_fms_count > 0){
							    $match_fms_Res = \App\Fmsdailyreport::where($match_pmp_fields)->first();
									$fmsrec['pwr_ctpt'][$kk] =  getmtdfms($datefilter,$kk,'pwr_ctpt');// $match_fms_Res['pwr_ctpt'];
									$fmsrec['pwr_tot_lt'][$kk] = getmtdfms($datefilter,$kk,'pwr_tot_lt');//$match_fms_Res['pwr_tot_lt'];
									$fmsrec['pwr_residents'][$kk] = getmtdfms($datefilter,$kk,'pwr_residents');//$match_fms_Res['pwr_residents'];
									$fmsrec['pwr_club_house'][$kk] = getmtdfms($datefilter,$kk,'pwr_club_house');//$match_fms_Res['pwr_club_house'];
									$fmsrec['pwr_stp'][$kk] = getmtdfms($datefilter,$kk,'pwr_stp');//$match_fms_Res['pwr_stp'];
									$fmsrec['pwr_wsp'][$kk] = getmtdfms($datefilter,$kk,'pwr_wsp');//$match_fms_Res['pwr_wsp'];
									$fmsrec['pwr_lifts'][$kk] = getmtdfms($datefilter,$kk,'pwr_lifts');//$match_fms_Res['pwr_lifts'];
									$fmsrec['pwr_solarpwrunits'][$kk] = getmtdfms($datefilter,$kk,'pwr_solarpwrunits');//$match_fms_Res['pwr_solarpwrunits'];
									//$fmsrec['pwr_pwrfactor'][$kk] = getmtdfms($datefilter,$kk,'pwr_pwrfactor');//$match_fms_Res['pwr_pwrfactor'];
									$fmsrec['pwr_pwrfactor'][$kk] = getmtdfms($datefilter,$kk,'dgset_pwrfailure');
									$fmsrec['dset_dieselconsume'][$kk] = getmtdfms($datefilter,$kk,'dset_dieselconsume');//$match_fms_Res['dset_dieselconsume'];
									  
									$wsppwr['wsp_metro'][$kk] =  getmtdfms($datefilter,$kk,'wsp_metro'); //$match_fms_Res['wsp_metro']; 
									$wsppwr['wsp_tankers'][$kk] = getmtdfms($datefilter,$kk,'wsp_tankers'); // $match_fms_Res['wsp_tankers']; 
									$wsppwr['wsp_bores'][$kk] = getmtdfms($datefilter,$kk,'wsp_bores');  //$match_fms_Res['wsp_bores'];
									$wsppwr['wsp_tot_water'][$kk] =  getmtdfms($datefilter,$kk,'wsp_tot_water');  //$match_fms_Res['wsp_tot_water'];
									$wsppwr['wsp_ppm_tw_sump'][$kk] = getmtdfms($datefilter,$kk,'wsp_ppm_tw_sump');  //$match_fms_Res['wsp_ppm_tw_sump'];
									$wsppwr['wsp_ppm_tw_flat'][$kk] = getmtdfms($datefilter,$kk,'wsp_ppm_tw_flat');  //$match_fms_Res['wsp_ppm_tw_flat'];
									
									$stpppwr['stp_avg_inlet_water'][$kk] = getmtdfms($datefilter,$kk,'stp_avg_inlet_water');  //$match_fms_Res['stp_avg_inlet_water'];
									$stpppwr['stp_avg_treat_water'][$kk] =  getmtdfms($datefilter,$kk,'stp_avg_treat_water');  //$match_fms_Res['stp_avg_treat_water'];
									$stpppwr['stp_avg_water_bypass'][$kk] = getmtdfms($datefilter,$kk,'stp_avg_water_bypass');  //$match_fms_Res['stp_avg_water_bypass'];
									 
									  
									
									
							}
							else{
							    
								    $fmsrec['pwr_ctpt'][$kk] = "";
									$fmsrec['pwr_tot_lt'][$kk] = "";
									$fmsrec['pwr_residents'][$kk] = "";
									$fmsrec['pwr_club_house'][$kk] = "";
									$fmsrec['pwr_stp'][$kk] = "";
									$fmsrec['pwr_wsp'][$kk] = "";
									$fmsrec['pwr_lifts'][$kk] = "";
									$fmsrec['pwr_solarpwrunits'][$kk] = "";
									$fmsrec['pwr_pwrfactor'][$kk] = "";
									$fmsrec['dset_dieselconsume'][$kk] = "";
									
									$wsppwr['wsp_metro'][$kk] = ""; 
									$wsppwr['wsp_tankers'][$kk] = ""; 
									$wsppwr['wsp_bores'][$kk] = ""; 
									$wsppwr['wsp_tot_water'][$kk] = ""; 
									$wsppwr['wsp_ppm_tw_sump'][$kk] = ""; 
									$wsppwr['wsp_ppm_tw_flat'][$kk] = ""; 
									
								    $stpppwr['stp_avg_inlet_water'][$kk] = "";
									$stpppwr['stp_avg_treat_water'][$kk] =  "";
									$stpppwr['stp_avg_water_bypass'][$kk] =  "";
							  
							}
							
							$match_fms_count = \App\Pmsdailyreport::where($match_pmp_fields)->count();
							if($match_fms_count > 0){
							    $match_fms_Res = \App\Pmsdailyreport::where($match_pmp_fields)->first();
									
									$pms_apna_apms['apna_apms_previous'][$kk] = $match_fms_Res['apna_apms_previous']; 
									$pms_apna_apms['apna_apms_opened_help'][$kk] = $match_fms_Res['apna_apms_opened_help']; 
									$pms_apna_apms['apna_apms_opened_login'][$kk] = $match_fms_Res['apna_apms_opened_login'];
									$pms_apna_apms['apna_apms_opened_total'][$kk] = $match_fms_Res['apna_apms_opened_total'];
									$pms_apna_apms['apna_apms_resolved'][$kk] = $match_fms_Res['apna_apms_resolved'];
									$pms_apna_apms['apna_apms_pending'][$kk] = $match_fms_Res['apna_apms_pending'];
									
									$pms_apna_projet['apna_project_previous'][$kk] = $match_fms_Res['apna_project_previous']; 
									$pms_apna_projet['apna_project_opened_help'][$kk] = $match_fms_Res['apna_project_opened_help']; 
									$pms_apna_projet['apna_project_opened_login'][$kk] = $match_fms_Res['apna_project_opened_login'];
									$pms_apna_projet['apna_project_opened_total'][$kk] = $match_fms_Res['apna_project_opened_total'];
									$pms_apna_projet['apna_project_resolved'][$kk] = $match_fms_Res['apna_project_resolved'];
									$pms_apna_projet['apna_project_pending'][$kk] = $match_fms_Res['apna_project_pending'];
									
									
									$club_house['clbhous_revenue_day'][$kk] = $match_fms_Res['clbhous_revenue_day']; 
									$club_house['clbhous_pwr_units'][$kk] = $match_fms_Res['clbhous_pwr_units']; 
									$club_house['clbhous_users_gym'][$kk] = $match_fms_Res['clbhous_users_gym'];
									$club_house['clbhous_users_pool'][$kk] = $match_fms_Res['clbhous_users_pool'];
									$club_house['clbhous_users_tennis'][$kk] = $match_fms_Res['clbhous_users_tennis'];
									$club_house['clbhous_shuttle'][$kk] = $match_fms_Res['clbhous_shuttle'];
									 
									
								
							}
							else{
								    $pms_apna_apms['apna_apms_previous'][$kk] = ""; 
									$pms_apna_apms['apna_apms_opened_help'][$kk] =  ""; 
									$pms_apna_apms['apna_apms_opened_login'][$kk] =  ""; 
									$pms_apna_apms['apna_apms_opened_total'][$kk] =  ""; 
									$pms_apna_apms['apna_apms_resolved'][$kk] =  ""; 
									$pms_apna_apms['apna_apms_pending'][$kk] =  ""; 
									
									$pms_apna_projet['apna_project_previous'][$kk] = "";
									$pms_apna_projet['apna_project_opened_help'][$kk] =  "";
									$pms_apna_projet['apna_project_opened_login'][$kk] =  "";
									$pms_apna_projet['apna_project_opened_total'][$kk] =  "";
									$pms_apna_projet['apna_project_resolved'][$kk] =  "";
									$pms_apna_projet['apna_project_pending'][$kk] =  "";
									
									$club_house['clbhous_revenue_day'][$kk] = "";
									$club_house['clbhous_pwr_units'][$kk] =  "";
									$club_house['clbhous_users_gym'][$kk] = "";
									$club_house['clbhous_users_pool'][$kk] =  "";
									$club_house['clbhous_users_tennis'][$kk] =  "";
									$club_house['clbhous_shuttle'][$kk] = "";
							}
							
							
								$match_sec_count = \App\Securitydailyreport::where($match_pmp_fields)->count();
							if($match_sec_count > 0){
							    $match_fms_Res = \App\Securitydailyreport::where($match_pmp_fields)->first();
									
									$security['nw_cctv'][$kk] = $match_fms_Res['nw_cctv']; 
									$security['nw_boom'][$kk] = $match_fms_Res['nw_boom']; 
									$security['sf_zone1'][$kk] = $match_fms_Res['sf_zone1'];
									$security['sf_zone2'][$kk] = $match_fms_Res['sf_zone2'];
									$security['sf_zone3'][$kk] = $match_fms_Res['sf_zone3'];
									$security['sf_zone4'][$kk] = $match_fms_Res['sf_zone4'];
									$security['sf_tkit'][$kk] = $match_fms_Res['sf_tkit'];
							}   
							else{
									$security['nw_cctv'][$kk] = "";
									$security['nw_boom'][$kk] =  "";
									$security['sf_zone1'][$kk] = "";
									$security['sf_zone2'][$kk] =  "";
									$security['sf_zone3'][$kk] =  "";
									$security['sf_zone4'][$kk] = "";
									$security['sf_tkit'][$kk] = "";
							}
							
						}
						
						
						if($site_id == 'all'){
								
						if($uid==1) {
            $assets = Task::select("tasks.*",'categories.name as catgname')
                        ->leftJoin('categories','categories.id','=','tasks.category')->take(5)->get();
						
						  $taskcnn = Task::select("tasks.*",'categories.name as catgname')
                        ->leftJoin('categories','categories.id','=','tasks.category')->count();
						}
        else {
            //$assets = Task::join('task_users','tasks.id','=','task_users.task_id')->where('task_users.user_id',$uid)->get();
            $assets = TaskUser::select("tasks.*",'categories.name as catgname')
                ->leftJoin('tasks','tasks.id','=','task_users.task_id')
                ->leftJoin('users','users.emp_id','=','task_users.user_id')
                ->leftJoin('categories','categories.id','=','tasks.category')
                ->where('users.id',$uid)->take(5)->get();
				
				   $taskcnn = TaskUser::select("tasks.*",'categories.name as catgname')
                ->leftJoin('tasks','tasks.id','=','task_users.task_id')
                ->leftJoin('users','users.emp_id','=','task_users.user_id')
                ->leftJoin('categories','categories.id','=','tasks.category')
                ->where('users.id',$uid)->count();
        }
		
		
		
						
						  	//Breakdowns
		$breakdowns = \App\Breakdown::select('breakdowns.*','sites.name as sitename')->leftJoin('sites','sites.id','=','breakdowns.site_id')->limit(4)->orderBy('id', 'desc')->get();	
		
		$breakdown_cnn = \App\Breakdown::select('breakdowns.*','sites.name as sitename')->leftJoin('sites','sites.id','=','breakdowns.site_id')->orderBy('id', 'desc')->count();	

		//Incident
		$incidents = \App\Incident::select('incidents.*','sites.name as sitename')->leftJoin('sites','sites.id','=','incidents.site_id')->limit(4)->orderBy('id', 'desc')->get();	

      $incidents_cnn = \App\Incident::select('incidents.*','sites.name as sitename')->leftJoin('sites','sites.id','=','incidents.site_id')->orderBy('id', 'desc')->count();

		$jobcards = \App\Jobcard::select("jobcards.*",'sites.name as sitename','vendors.name as vendorname')
            ->leftJoin('sites','sites.id','=','jobcards.site_id')
            ->leftJoin('vendors','vendors.id','=','jobcards.vendor')
            ->where('jobcards.status','<>','Completed')
            ->get();
			
				$jobcards_cnn = \App\Jobcard::select("jobcards.*",'sites.name as sitename','vendors.name as vendorname')
            ->leftJoin('sites','sites.id','=','jobcards.site_id')
            ->leftJoin('vendors','vendors.id','=','jobcards.vendor')
            ->where('jobcards.status','<>','Completed')
            ->count();
        $jbtypes = array(''=>'Please select',1=>'Break Down',2=>'Incident Report',3=>'AMC',4=>'New');
        //History cards
		$historycards = \App\Historycard::limit(4)->orderBy('updated_at', 'desc')->get();
		
		
		
						}
				else{	
					
					if($uid==1)  {
            $assets = Task::select("tasks.*",'categories.name as catgname')
                        ->leftJoin('categories','categories.id','=','tasks.category')->where('tasks.site',$site_id)->take(5)->get();
						
						 $taskcnn = Task::select("tasks.*",'categories.name as catgname')
                        ->leftJoin('categories','categories.id','=','tasks.category')->where('tasks.site',$site_id)->count();
						}
        else {
            //$assets = Task::join('task_users','tasks.id','=','task_users.task_id')->where('task_users.user_id',$uid)->get();
            $assets = TaskUser::select("tasks.*",'categories.name as catgname')
                ->leftJoin('tasks','tasks.id','=','task_users.task_id')
                ->leftJoin('users','users.emp_id','=','task_users.user_id')
                ->leftJoin('categories','categories.id','=','tasks.category')
				->where('tasks.site',$site_id)
                ->where('users.id',$uid)->take(5)->get();
				
				  $taskcnn = TaskUser::select("tasks.*",'categories.name as catgname')
                ->leftJoin('tasks','tasks.id','=','task_users.task_id')
                ->leftJoin('users','users.emp_id','=','task_users.user_id')
                ->leftJoin('categories','categories.id','=','tasks.category')
				->where('tasks.site',$site_id)
                ->where('users.id',$uid)->count();
        }
							
		//Breakdowns
		$breakdowns = \App\Breakdown::select('breakdowns.*','sites.name as sitename')->leftJoin('sites','sites.id','=','breakdowns.site_id')->where('sites.id','=',$site_id)->limit(4)->orderBy('id', 'desc')->get();	
		
		$breakdown_cnn = \App\Breakdown::select('breakdowns.*','sites.name as sitename')->leftJoin('sites','sites.id','=','breakdowns.site_id')->where('sites.id','=',$site_id)->orderBy('id', 'desc')->count();	

		//Incident
		$incidents = \App\Incident::select('incidents.*','sites.name as sitename')->leftJoin('sites','sites.id','=','incidents.site_id')->where('sites.id','=',$site_id)->limit(4)->orderBy('id', 'desc')->get();
		
		
		$incidents_cnn = \App\Incident::select('incidents.*','sites.name as sitename')->leftJoin('sites','sites.id','=','incidents.site_id')->where('sites.id','=',$site_id)->orderBy('id', 'desc')->count();	

		$jobcards = \App\Jobcard::select("jobcards.*",'sites.name as sitename','vendors.name as vendorname')
            ->leftJoin('sites','sites.id','=','jobcards.site_id')
            ->leftJoin('vendors','vendors.id','=','jobcards.vendor')
			->where('jobcards.status','<>','Completed')
            ->where('sites.id','=',$site_id)
            ->get();
			
				$jobcards_cnn = \App\Jobcard::select("jobcards.*",'sites.name as sitename','vendors.name as vendorname')
            ->leftJoin('sites','sites.id','=','jobcards.site_id')
            ->leftJoin('vendors','vendors.id','=','jobcards.vendor')
			->where('jobcards.status','<>','Completed')
            ->where('sites.id','=',$site_id)
            ->count(); 
			
        $jbtypes = array(''=>'Please select',1=>'Break Down',2=>'Incident Report',3=>'AMC',4=>'New');
        //History cards
		$historycards = \App\Historycard::limit(4)->orderBy('updated_at', 'desc')->get();
		}
		
		
		$hctypes = array(1=>'Break Down',2=>'Incident Report',3=>'Break Down',4=>'Incident Report',5=>'AMC',6=>'New');
		$relations = [
            //'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			'sitenames' => $siteattrname,
			'assets' => $assets,
			'categories' => \App\Category::get()->pluck('name', 'id')->prepend('All', ''),
			'forums' => $forum,
			'dgpump' => $dgpump,
			'mainpump' => $mainpump,
			'jockeypmp' => $jockeypmp,
			'exahuster' => $exahuster,
			'pwrcon' => $fmsrec,
			'wspcon' => $wsppwr, 
			'stpcon' => $stpppwr,
			'apnaapms' => $pms_apna_apms,
			'apnaproj' => $pms_apna_projet,
			'clubhouse' => $club_house,
			'security' => $security,   
			'breakdownCount' => \App\Breakdown::count(),
			'breakdowns' => $breakdowns,
			'incidentCount' => \App\Incident::count(),
			'incidents' => $incidents,
			'jobcardCount' => \App\Jobcard::where('jobcards.status','<>','Completed')->count(),
			'jobcards' => $jobcards,
			'jbtypes' => $jbtypes,
			'historycards' => $historycards,
			'hctypes' => $hctypes,
			'jbbcn' => $jobcards_cnn,
			'tcn' => $taskcnn,
			'brdcn' => $breakdown_cnn,
			'inccn' => $incidents_cnn,
			
			
        ]; 
   
        return view('homedashboardtemp', $relations);
 
}





// GET ADVANCED REPORTS

public function getadvanceReports(Request $request)

    {    
	
    $date= $request->fromdate;
	$todate= $request->todate;
	$selected_sites= $request->sites;
	
	$reporttype = $request->reporttype;

	$datearr = explode("-",$date);
	$datetoarr =  explode("-",$todate);

	$month = $datearr[1];

	$year = $datearr[2];
	
	$tomonth = $datetoarr[1];

	$toyear = $datetoarr[2];
	
	$to_day = $datetoarr[0];

	//$site = '5';
 

	$rdate = $year."-".$month."-".$datearr[0];
    $to_date_val = $toyear."-".$tomonth."-".$to_day;
			
	if($reporttype == 'metro_water') { 
		$segment3 = $year;
		$segment4 = $month; 
		$rdate = $year."-".$month."-".$datearr[0];
		
		$siteattrname = array();
		$flatres = array();
		$reportdate_val = "";
		$dateString = $segment3.'-'.$segment4.'-'.$datearr[0];
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $datetoarr[0]."-".$segment4."-".$segment3;
		$reportdatefrom_val = $datearr[0]."-".$segment4."-".$segment3;

	      if(Auth::user()->id == 1){
	      $sitearr = explode(",",$selected_sites);
		  $sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sites_count = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->count();
		  $sites_res_arr =\App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$selected_sites);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sites_count = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->count();
			$sites_res_arr =\App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  }
		  
		  $fromdate = $year."-".$month."-".$datearr[0];
		 // $fromdate = $segment3."-".$segment4."-"."1";
		  $todate = $segment3."-".$segment4."-".$lastdatearr[2];
		  
		/*  $sites_count = \App\Sites::whereIn('id', $sitearr)->count;
		  if($sites_count > 0){
		  	$sites_res_arr = \App\Sites::whereIn('id', $sitearr)->get()->pluck('name', 'id');
			foreach($sites_res_arr as $ke =>$site_res_row){
				
			}
			
		  } */
		  
		  // $sites_count = \App\Sites::count();
		  if($sites_count > 0){
		  	//$sites_res_arr =\App\Sites::get()->pluck('name', 'id');
			$sitear = array();
			
			$avgcon = array();
			$contracted = array();
			
			foreach($sites_res_arr as $ke =>$site_res_row){
			$getcontractedcount =  Dailyreportvalidation::
				where('site', '=', $ke)
				->count();
				 
				if($getcontractedcount>0){
				 $getcontractedRes =  Dailyreportvalidation::
				where('site', '=', $ke)
				->first(); 
				if(isset( $getcontractedRes->contracted_quantity_kl))
				$contracted[$ke] =  $getcontractedRes->contracted_quantity_kl;
				else $contracted[$ke] = "";
				 }
				  else{
				  $contracted[$ke] = "";
				  }     
				}
				   
			foreach($sites_res_arr as $ke =>$site_res_row){
				//echo $site_res_row;
				$avgres = "";
				for($i=$datearr[0];$i<=$datetoarr[0];$i++){
				$ondate = $segment3."-".$segment4."-".$i;
				$resultcn = Fmsdailyreport::
				where('reporton', '=', $ondate)
				->where('site', '=', $ke)
				->count();
				if($resultcn > 0){
				 $getsiteMetro =  Fmsdailyreport:: 
				  where('reporton', '=', $ondate)
				->where('site', '=', $ke)
				->first();
				  $avgres = (float)$avgres + (float)$getsiteMetro->wsp_metro; 
				}   
				
				}
				
				$avgcon[$ke] = $avgres;
			}
			  
			  $contractpercent = array();
			  
			
			
			
			   foreach($sites_res_arr as $ke =>$site_res_row){
			     $community[$ke] =$site_res_row;
			   }
			   $datek["community"] = $community;
			   $datek["average"] = $avgcon;   
			   $datek["concentrated"] = $contracted; 
			
			for($i=$datearr[0];$i<=$datetoarr[0];$i++){
			    $ondate = $segment3."-".$segment4."-".$i;
				$sitearrres = array();  
			    foreach($sites_res_arr as $ke =>$site_res_row){
				 
				$resultcn = Fmsdailyreport::
				where('reporton', '=', $ondate)
				->where('site', '=', $ke)
				->count();
				 if($resultcn > 0){
				 $getsiteMetro =  Fmsdailyreport::
				  where('reporton', '=', $ondate)
				->where('site', '=', $ke)
				->first();
				     $sitearrres[$ke] = $getsiteMetro->wsp_metro;
				  } 
				  else{
				   $sitearrres[$ke] = "";
				  }
				}
				
				$datekres[$ondate] = $sitearrres;
			}
			$datek["dateres"] = $datekres;
			
			//echo "<pre>"; print_r($datek); echo "</pre>"; exit;
			
			 foreach($contracted as $ke =>$cons_row){
			     if($cons_row > 0){
			     $contractpercent[$ke] =  ((float)(round((float)$avgcon[$ke]/count($datek["dateres"])) * 100) /(float)$cons_row);
				 }
				 else{
				  $contractpercent[$ke] = "";
				 }
				 
			   }
			   
			   $datek["persent"] = $contractpercent;
			
		  } 
		  
		  
		$relations = [  
			
			'sites' => $siteattrname,
			'flats' => $flatres,
			'reportfrom_on' => $reportdatefrom_val,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'sitearr' => $datek,
			
			];
			 
			// echo "<pre>"; print_r($datek); echo "</pre>";

		    return view('misfiles.advanceviews.metrowater', $relations);  
		  
		
		  
		  }
		  
		  else if($reporttype == 'water_consumption'){
		    
			
			
		
		
		  /* WATER CONSUMPTION */

		$segment3 = $year;
		$segment4 = $month; 
		
		$siteattrname = array();
		$flatres = array();
		$reportdate_val = "";
		$dateString = $segment3.'-'.$segment4.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$segment4."-".$segment3;
		$reportdatefrom_val = "1"."-".$segment4."-".$segment3;

	      if(Auth::user()->id == 1){
		    $sitearr = explode(",",$selected_sites);
		  $sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sites_count = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->count();
		  $sites_res_arr =\App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$selected_sites);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sites_count = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->count();
			$sites_res_arr =\App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }
		  
		     
		  $fromdate = $segment3."-".$segment4."-"."1";
		  $todate = $segment3."-".$segment4."-".$lastdatearr[2];
		  
		  if($sites_count > 0){
		  	//$sites_res_arr =\App\Sites::get()->pluck('name', 'id');
			$sitear = array();
			
			$avgcon = array();
			$tankcon = array();
			$borewellcon = array();
			$contracted = array();
			$num_borewells = array();
			
			foreach($sites_res_arr as $ke =>$site_res_row){
			$getcontractedcount =  Dailyreportvalidation::
				where('site', '=', $ke)
				->count();
				 
				if($getcontractedcount>0){
				 $getcontractedRes =  Dailyreportvalidation::
				where('site', '=', $ke)
				->first(); 
				if(isset($getcontractedRes->contracted_quantity_kl))
				$contracted[$ke] =  $getcontractedRes->contracted_quantity_kl;
				else
				$contracted[$ke] = "";
				if(isset($getcontractedRes->borewellsnum))
				$num_borewells[$ke] =  $getcontractedRes->borewellsnum;
				else
				 $num_borewells[$ke] = "";
				 }
				  else{
				  $contracted[$ke] = "";
				   $num_borewells[$ke] = "";
				  }
				}
				   
			foreach($sites_res_arr as $ke =>$site_res_row){
				//echo $site_res_row;
				$avgres = "";
				$boresres = "";
				$tankeres = "";
				for($i=1;$i<=$lastdatearr[2];$i++){
				$ondate = $segment3."-".$segment4."-".$i;
				$resultcn = Fmsdailyreport::
				where('reporton', '=', $ondate)
				->where('site', '=', $ke)
				->count();
				if($resultcn > 0){
				 $getsiteMetro =  Fmsdailyreport::
				  where('reporton', '=', $ondate)
				->where('site', '=', $ke)
				->first();
				  $avgres = (float)$avgres + (float)$getsiteMetro->wsp_metro; 
				  $boresres = (float)$boresres + (float)$getsiteMetro->wsp_bores; 
				  $tankeres = (float)$tankeres + (float)$getsiteMetro->wsp_tankers; 
				}   
				
				}
				
				$avgcon[$ke] = $avgres;
				$tankcon[$ke] = $tankeres;
				$borewellcon[$ke] = $boresres;
			}
			
			
			// GET OCCUPANCY:
			  $occupancyarr= array();
			 foreach($sites_res_arr as $ke =>$site_res_row){
				//echo $site_res_row;
				$occres = "";
				$occcn = Occupancymisreport::
				where('month', '=', $segment4)
				->where('year', '=', $segment3)
				->where('site', '=', $ke)
				->count();
				if($occcn > 0){
				 $occres =  Occupancymisreport::
				where('month', '=', $segment4)
				->where('year', '=', $segment3)
				->where('site', '=', $ke)
				->first();
				  $occres = (float)$occres->tenants + (float)$occres->owners; 
				}  
				$occupancyarr[$ke] = $occres;
			}
			
			$matchfields_m = ['month' => $segment4, 'year' => $segment3]; 

		$res_count = \App\Clubutilizationmisreport::where($matchfields_m)->count();
		$occupancyarr= array();
		if($res_count > 0){
		
			$formfieldarrayocc = \App\Clubutilizationmisreport::where($matchfields_m)->get();
			
			
			 if(count($formfieldarrayocc) > 0){
			     foreach($formfieldarrayocc as $fieldarr){
				 	 $existing_records[$fieldarr->site] = array("id"=>$fieldarr->id,"avg_occupancy"=>$fieldarr->avg_occupancy,"avg_daily_swim"=>$fieldarr->avg_daily_swim,"avg_daily_gym"=>$fieldarr->avg_daily_gym,'occ_flat_swim' =>$fieldarr->occ_flat_swim,'occ_gym_swim' =>$fieldarr->occ_gym_swim);
					 
					 $occupancyarr[$fieldarr->site] = $fieldarr->avg_occupancy;
				 } 
				 
				// echo "<pre>"; print_r($existing_records);echo "</pre>";
			 }  
			 }    
			
			// END GET OCCUPANCY
			  
			  $contractpercent = array();
			  
			
			   foreach($sites_res_arr as $ke =>$site_res_row){
			     $community[$ke] =$site_res_row;
			   }
			   
			   //Number of bores notworking
			    $nwbrw_num = array();
			    foreach($sites_res_arr as $ke =>$site_res_row){
				  $ondate = $segment3."-".$segment4."-".$lastdatearr[2];
				$brnwcn = Fmsdailyreport::
				where('reporton', '=', $ondate)
				->where('site', '=', $ke)
				->count();
				 if($brnwcn > 0){
				 $brwnwres =  Fmsdailyreport::
				  where('reporton', '=', $ondate)
				->where('site', '=', $ke)
				->first();

				     $nwbrw_num[$ke] = $brwnwres->othser_gas_borewells;
				  } 
				  else{
				   $nwbrw_num[$ke] = "";
				  }
				}
			  
			
			for($i=1;$i<=$lastdatearr[2];$i++){
			    $ondate = $segment3."-".$segment4."-".$i;
			    foreach($sites_res_arr as $ke =>$site_res_row){
				 
				$resultcn = Fmsdailyreport::
				where('reporton', '=', $ondate)
				->where('site', '=', $ke)
				->count();
				 if($resultcn > 0){
				 $getsiteMetro =  Fmsdailyreport::
				  where('reporton', '=', $ondate)
				->where('site', '=', $ke)
				->first();
				     $sitearr[$ke] = $getsiteMetro->wsp_metro;
				  } 
				  else{
				   $sitearr[$ke] = "";
				  }
				}
				
				$datekres[$ondate] = $sitearr;
			}
			$datek["dateres"] = $datekres;
			
			//echo "<pre>"; print_r($datek); echo "</pre>"; exit;
			
			 foreach($contracted as $ke =>$cons_row){
			     if($cons_row > 0){
			     $contractpercent[$ke] =  ((float)(round((float)$avgcon[$ke]/count($datek["dateres"])) * 100) /(float)$cons_row);
				 }
				 else{
				  $contractpercent[$ke] = "";
				 }
				 
			   }
			   
			   $datek["persent"] = $contractpercent;
			
		  } 
		  
		  
		   $datek["community"] = $community;
			   $datek["average"] = $avgcon;   
			   $datek["concentrated"] = $contracted; 
			   
			   
			   
			 $additional_text = "";  
			   $matchfields_m = ['month' => $segment4, 'year' => $segment3]; 

		$reswtre_count = \App\Waterconsumpmisreport::where($matchfields_m)->count();
		if($reswtre_count > 0) {
		 $reswtre_res  = \App\Waterconsumpmisreport::where($matchfields_m)->first(); 
		 $additional_text = $reswtre_res['additional_info'];
		} 
		  
		$relations = [  
			
			'sites' => $siteattrname,
			'flats' => $flatres,
			'reportfrom_on' => $reportdatefrom_val,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'endoftheday'  => $lastdatearr[2],
			'concentrated' => $contracted,
			'average' => $avgcon,
			'occupancy' => $occupancyarr,
			'boresavg' => $borewellcon,
			'tankdavg' => $tankcon,
			'borewellsnum' => $num_borewells,
			'nwbrwnum' => $nwbrw_num,
			'additionalinfo' => $additional_text,
			
			];  
		  
		  /* END WATER CONSUMPTION */

		  ////return view('misfiles.view.watersourceconsumption', $relations);
		    return view('misfiles.advanceviews.watersourceconsumption', $relations);

			
		  }
		  
		   else if($reporttype == 'borewell_notworking'){
		     
		$segment3 = $year;
		$segment4 = $month;  
		
	
		$formfieldarray = array();
		$siteattrname = array();
		$flatres = array();
		$reportdate_val = "";
		$dateString = $segment3.'-'.$segment4.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$segment4."-".$segment3;

	      if(Auth::user()->id == 1){  
		  $sitearr = explode(",",$selected_sites);
		  $sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		  
		  }else{

			$role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$selected_sites);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site'); 
		  }
		  $existing_records = array();
		  $existing_Rates = array();
		  
		
		  
		$relations = [  
			'res' => $formfieldarray, 
			'sites' => $siteattrname,
			'borewellsnum' => $borewellsnum,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			];    

		

		$matchfields = ['month' => $segment4, 'year' => $segment3]; 

		$res_count = \App\Borewellsnwmisreport::where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Borewellsnwmisreport::where($matchfields)->get();
			
			
			 if(count($formfieldarray) > 0){
			     foreach($formfieldarray as $fieldarr){
				 	 $existing_records[$fieldarr->site] = array("id"=>$fieldarr->id,"nw_bores_num"=>$fieldarr->nw_bores_num,"no_ground_water"=>$fieldarr->no_ground_water,"over_load"=>$fieldarr->over_load,"motor_brunt"=>$fieldarr->motor_brunt,"cable_prblm"=>$fieldarr->cable_prblm,"pumpormotorwear"=>$fieldarr->pumpormotorwear,"others"=>$fieldarr->others,"dry_run_protectn"=>$fieldarr->dry_run_protectn,"flow_meter"=>$fieldarr->flow_meter,"remarks"=>$fieldarr->remarks);
				 }  
				 
				// echo "<pre>"; print_r($existing_records);echo "</pre>";
			 }  
			 
			 //exit;
			
			$relations = [
			'res' => $formfieldarray,  
			'sites' => $siteattrname,
			'borewellsnum' => $borewellsnum,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			];     
			 
		 }
	
		  return view('misfiles.advanceviews.borewellmis', $relations);
		   
		   }
		   else if($reporttype == 'fire_safe_status'){
		   
		   
		 
		$segment3 = $year;
		$segment4 = $month;
		
		$formfieldarray = array();
		$siteattrname = array();
		$flatres = array(); 
		$ref_overall = array();
		$ref_overall_temp = array();
		
		$reportdate_val = "";
		$dateString = $segment3.'-'.$segment4.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$segment4."-".$segment3;
		
		
		
		
		 if(Auth::user()->id == 1){
		   $sitearr = explode(",",$selected_sites);
		  $sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		  
		  }else{
		    
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$selected_sites);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		  }
		
		$matchfields = ['month' => $segment4, 'year' => $segment3]; 
		
		if(Auth::user()->id == 1){
		$res_count = \App\Firesafetymisreport::where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Firesafetymisreport::where($matchfields)->get();
		}
		
		}
		else
		{
		  $res_count = \App\Firesafetymisreport::whereIn('site', $sitearr)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Firesafetymisreport::whereIn('site', $sitearr)->where($matchfields)->get();
		}
		
		}
		
		$refid = array();
		/* GET REF ID*/
		if($formfieldarray){
		 foreach($formfieldarray as $formres){
		    $refid[$formres->site] = $formres->id;
		 }
		   
		 }
		 $issuecount = array();
		 $misresult = array();
		 $totalValues = array();
		  $ref_total = array();
		  if(count($refid) > 0){
		    $ref_overall = array();
			foreach($refid as $skey =>$ref){
			 $ref_a = array();
			
		  	$matchreffields = ['ref_id' => $ref, 'site' => $skey]; 
			$matchvalidfields = ['site' => $skey]; 
			
		    $tot_count = \App\Firesafedailyreportvalidation::where($matchvalidfields)->count();
			if($tot_count > 0){
				 $tot_ress = \App\Firesafedailyreportvalidation::where($matchvalidfields)->first();
				 $ref_total[$skey] = $tot_ress;
			} 
			$mismatchfields = ['month' => $segment4, 'year' => $segment3, 'site' =>$skey]; 
			
			$mismatchcount = \App\Firesafetymisreport::where($mismatchfields)->count();
			
			if($mismatchcount > 0){
				 $mismatch_ress = \App\Firesafetymisreport::where($mismatchfields)->first();
				 $misresult[$skey] = $mismatch_ress;
			} 
			
		  	$ref_count = \App\Firesafenotworkingissue::where($matchreffields)->count();
			if($ref_count > 0){
			   $ref_count_val = \App\Firesafenotworkingissue::where($matchreffields)->count(); 
			   $issuecount[$skey] = $ref_count_val;
			   $ref_record_val = \App\Firesafenotworkingissue::where($matchreffields)->get();
			   foreach($ref_record_val as $ref_rec){
			      $ref_a[] = $ref_rec;
			   } 
			         
			   $ref_overall[$skey] =  $ref_a;
			}
			else{
			   $issuecount[$skey] = 0;
			   $ref_overall[$skey]= 0;
			}
			
			//MODIFIED ARRAY
			$ref_a_temp = array();
			if($ref_count > 0){
			   $ref_record_temp_val = \App\Firesafenotworkingissue::where($matchreffields)->get();
			   foreach($ref_record_temp_val as $ref_temp_rec){
			      $ref_a_temp['category'][] = $ref_temp_rec->category;
				  $ref_a_temp['issue_des'][] = $ref_temp_rec->issue_des;
				  $ref_a_temp['root_cause'][] = $ref_temp_rec->root_cause;
				  $ref_a_temp['act_req_plan'][] = $ref_temp_rec->act_req_plan;
				  $ref_a_temp['pendingfromdays'][] = $ref_temp_rec->pendingfromdays;
				  $ref_a_temp['reponsibility'][] = $ref_temp_rec->reponsibility;
				  $ref_a_temp['notify_concern'][] = $ref_temp_rec->notify_concern;
			   } 
			         
			   $ref_overall_temp[$skey] =  $ref_a_temp;
			}
			else{
			 //  $issuecount[$skey] = 0;
			   //$ref_overall[$skey]= 0;
			   $ref_overall_temp[$skey] = 0;
			}

			 // END MODIFIED ARRAY
			
			}
		  }
		     arsort($issuecount);
			
		$relations = [
			'res' => $formfieldarray,  
			'sites' => $siteattrname,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'issues' => $ref_overall, 
			'issuecount' => $issuecount,
			'validation' => $ref_total, 
			'misres' => $misresult, 
			'issuetemp' => $ref_overall_temp,
			
			];     
			   		

		  return view('misfiles.advanceviews.misfiresaftey', $relations);

		
		   }
		   
		   else if($reporttype == 'electro_mechanical_equipment'){
		$segment3 = $year;
		$segment4 = $month;   
		
		$formfieldarray = array();
		$siteattrname = array();
		$flatres = array(); 
		$ref_overall = array();
		$ref_overall_temp = array();
		
		$reportdate_val = "";
		$dateString = $segment3.'-'.$segment4.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$segment4."-".$segment3;
		
		
		
		
		 if(Auth::user()->id == 1){
		  $sitearr = explode(",",$selected_sites);
		  $sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		    
		  }else{
			
			$role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$selected_sites);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
			
		  }
		
		$matchfields = ['month' => $segment4, 'year' => $segment3]; 
		
		if(Auth::user()->id == 1){
		$res_count = \App\Equipmentmisreport::where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Equipmentmisreport::where($matchfields)->get();
		}
		
		}
		else
		{
		  $res_count = \App\Equipmentmisreport::whereIn('site', $sitearr)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Equipmentmisreport::whereIn('site', $sitearr)->where($matchfields)->get();
		}
		
		}
		
		$refid = array();
		/* GET REF ID*/
		if($formfieldarray){
		 foreach($formfieldarray as $formres){
		    $refid[$formres->site] = $formres->id;
		 }
		   
		 }
		 $issuecount = array();
		 $misresult = array();
		 $totalValues = array();
		  $ref_total = array();
		  if(count($refid) > 0){
		    $ref_overall = array();
			foreach($refid as $skey =>$ref){
			 $ref_a = array();
			
		  	$matchreffields = ['ref_id' => $ref, 'site' => $skey]; 
			$matchvalidfields = ['site' => $skey]; 
			
		    $tot_count = \App\Dailyreportvalidation::where($matchvalidfields)->count();
			if($tot_count > 0){
				 $tot_ress = \App\Dailyreportvalidation::where($matchvalidfields)->first();
				 $ref_total[$skey] = $tot_ress;
			} 
			$mismatchfields = ['month' => $segment4, 'year' => $segment3, 'site' =>$skey]; 
			
			$mismatchcount = \App\Equipmentmisreport::where($mismatchfields)->count();
			
			if($mismatchcount > 0){ 
				 $mismatch_ress = \App\Equipmentmisreport::where($mismatchfields)->first();
				 $misresult[$skey] = $mismatch_ress;
			} 
			
		  	$ref_count = \App\Equipmentnotworkingissue::where($matchreffields)->count();
			if($ref_count > 0){
			   $ref_count_val = \App\Equipmentnotworkingissue::where($matchreffields)->count(); 
			   $issuecount[$skey] = $ref_count_val;
			   $ref_record_val = \App\Equipmentnotworkingissue::where($matchreffields)->get();
			   foreach($ref_record_val as $ref_rec){
			      $ref_a[] = $ref_rec;
			   } 
			         
			   $ref_overall[$skey] =  $ref_a;
			}
			else{
			   $issuecount[$skey] = 0;
			   $ref_overall[$skey]= 0;
			}
			
			//MODIFIED ARRAY
			$ref_a_temp = array();
			if($ref_count > 0){
			   $ref_record_temp_val = \App\Equipmentnotworkingissue::where($matchreffields)->get();
			   foreach($ref_record_temp_val as $ref_temp_rec){
			      $ref_a_temp['category'][] = $ref_temp_rec->category;
				  $ref_a_temp['issue_des'][] = $ref_temp_rec->issue_des;
				  $ref_a_temp['root_cause'][] = $ref_temp_rec->root_cause;
				  $ref_a_temp['act_req_plan'][] = $ref_temp_rec->act_req_plan;
				  $ref_a_temp['pendingfromdays'][] = $ref_temp_rec->pendingfromdays;
				  $ref_a_temp['reponsibility'][] = $ref_temp_rec->reponsibility;
				  $ref_a_temp['notify_concern'][] = $ref_temp_rec->notify_concern;
			   } 
			          
			   $ref_overall_temp[$skey] =  $ref_a_temp;
			}
			else{
			 //  $issuecount[$skey] = 0;
			   //$ref_overall[$skey]= 0;
			   $ref_overall_temp[$skey] = 0;
			}

			 // END MODIFIED ARRAY
			
			}
		  }
		     arsort($issuecount);
			 
			 /*echo "<pre>";
			   print_r($ref_overall_temp);
			 echo "</pre>"; exit; */
		
		$relations = [
			'res' => $formfieldarray,  
			'sites' => $siteattrname,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'issues' => $ref_overall, 
			'issuecount' => $issuecount,
			'validation' => $ref_total, 
			'misres' => $misresult, 
			'issuetemp' => $ref_overall_temp,
			
			];     
			   		
  
		  //return view('misfiles.view.misfiresaftey', $relations);

		

		  return view('misfiles.advanceviews.miselectromechanical', $relations);

		
		     
		   }
		   
		    else if($reporttype == 'stp_status'){
			   
	    $segment3 = $year;
		$segment4 = $month;  
		
		$formfieldarray = array();
		$siteattrname = array();
		$flatres = array(); 
		$ref_overall = array();
		$ref_overall_temp = array();
		
		$reportdate_val = "";
		$dateString = $segment3.'-'.$segment4.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$segment4."-".$segment3;
		
		
		
		
		 if(Auth::user()->id == 1){
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
			
		  }
		
		$matchfields = ['month' => $segment4, 'year' => $segment3]; 
		
		if(Auth::user()->id == 1){
		$res_count = \App\Stpmisreport::where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Stpmisreport::where($matchfields)->get();
		}
		
		}
		else
		{
		  $res_count = \App\Stpmisreport::whereIn('site', $sitearr)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Stpmisreport::whereIn('site', $sitearr)->where($matchfields)->get();
		}
		
		}
		
		$refid = array();
		/* GET REF ID*/
		if($formfieldarray){
		 foreach($formfieldarray as $formres){
		    $refid[$formres->site] = $formres->id;
		 }
		   
		 }
		 $issuecount = array(); 
		 $misresult = array();
		 $totalValues = array();
		  $ref_total = array();
		  if(count($refid) > 0){
		    $ref_overall = array();
			foreach($refid as $skey =>$ref){
			 $ref_a = array();
			
		  	$matchreffields = ['ref_id' => $ref, 'site' => $skey]; 
			$matchvalidfields = ['site' => $skey]; 
			
		    $tot_count = \App\Dailyreportvalidation::where($matchvalidfields)->count();
			if($tot_count > 0){
				 $tot_ress = \App\Dailyreportvalidation::where($matchvalidfields)->first();
				 $ref_total[$skey] = $tot_ress;
			} 
			$mismatchfields = ['month' => $segment4, 'year' => $segment3, 'site' =>$skey]; 
			
			$mismatchcount = \App\Stpmisreport::where($mismatchfields)->count();
			
			if($mismatchcount > 0){ 
				 $mismatch_ress = \App\Stpmisreport::where($mismatchfields)->first();
				 $misresult[$skey] = $mismatch_ress;
			} 
			
		  	$ref_count = \App\Stpnotworkingissue::where($matchreffields)->count();
			if($ref_count > 0){
			   $ref_count_val = \App\Stpnotworkingissue::where($matchreffields)->count(); 
			   $issuecount[$skey] = $ref_count_val;
			   $ref_record_val = \App\Stpnotworkingissue::where($matchreffields)->get();
			   foreach($ref_record_val as $ref_rec){
			      $ref_a[] = $ref_rec;
			   } 
			         
			   $ref_overall[$skey] =  $ref_a;
			}
			else{
			   $issuecount[$skey] = 0;
			   $ref_overall[$skey]= 0;
			}
			
			//MODIFIED ARRAY
			$ref_a_temp = array();
			if($ref_count > 0){
			   $ref_record_temp_val = \App\Stpnotworkingissue::where($matchreffields)->get();
			   foreach($ref_record_temp_val as $ref_temp_rec){
			      $ref_a_temp['category'][] = $ref_temp_rec->category;
				  $ref_a_temp['issue_des'][] = $ref_temp_rec->issue_des;
				  $ref_a_temp['root_cause'][] = $ref_temp_rec->root_cause;
				  $ref_a_temp['act_req_plan'][] = $ref_temp_rec->act_req_plan;
				  $ref_a_temp['pendingfromdays'][] = $ref_temp_rec->pendingfromdays;
				  $ref_a_temp['reponsibility'][] = $ref_temp_rec->reponsibility;
				  $ref_a_temp['notify_concern'][] = $ref_temp_rec->notify_concern;
			   } 
			          
			   $ref_overall_temp[$skey] =  $ref_a_temp;
			}
			else{
			 //  $issuecount[$skey] = 0;
			   //$ref_overall[$skey]= 0;
			   $ref_overall_temp[$skey] = 0;
			}

			 // END MODIFIED ARRAY
			
			}
		  }
		     arsort($issuecount);
			 
			 /*echo "<pre>";
			   print_r($ref_overall_temp);
			 echo "</pre>"; exit; */
		
		$relations = [
			'res' => $formfieldarray,  
			'sites' => $siteattrname,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'issues' => $ref_overall, 
			'issuecount' => $issuecount,
			'validation' => $ref_total, 
			'misres' => $misresult, 
			'issuetemp' => $ref_overall_temp,
			
			];     
			   		

		  return view('misfiles.advanceviews.stpstatus', $relations);

		  
			}
			
			else if($reporttype == 'wsp_status'){
			
			 $segment3 = $year;
		$segment4 = $month;  
		
		
		$formfieldarray = array();
		$siteattrname = array();
		$flatres = array(); 
		$ref_overall = array();
		$ref_overall_temp = array();
		
		$reportdate_val = "";
		$dateString = $segment3.'-'.$segment4.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$segment4."-".$segment3;
		
		
		
		
		 if(Auth::user()->id == 1){
		   $sitearr = explode(",",$selected_sites);
		  $sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');	  
		  }else{
			$role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$selected_sites);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
			
		  }
		
		$matchfields = ['month' => $segment4, 'year' => $segment3]; 
		
		if(Auth::user()->id == 1){
		$res_count = \App\Wspmisreport::where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Wspmisreport::where($matchfields)->get();
		}
		
		}
		else
		{
		  $res_count = \App\Wspmisreport::whereIn('site', $sitearr)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Wspmisreport::whereIn('site', $sitearr)->where($matchfields)->get();
		}
		
		}
		
		$refid = array();
		/* GET REF ID*/
		if($formfieldarray){
		 foreach($formfieldarray as $formres){
		    $refid[$formres->site] = $formres->id;
		 }
		   
		 }
		 $issuecount = array(); 
		 $misresult = array();
		 $totalValues = array();
		  $ref_total = array();
		  if(count($refid) > 0){
		    $ref_overall = array();
			foreach($refid as $skey =>$ref){
			 $ref_a = array();
			
		  	$matchreffields = ['ref_id' => $ref, 'site' => $skey]; 
			$matchvalidfields = ['site' => $skey]; 
			
		    $tot_count = \App\Dailyreportvalidation::where($matchvalidfields)->count();
			if($tot_count > 0){
				 $tot_ress = \App\Dailyreportvalidation::where($matchvalidfields)->first();
				 $ref_total[$skey] = $tot_ress;
			} 
			$mismatchfields = ['month' => $segment4, 'year' => $segment3, 'site' =>$skey]; 
			
			$mismatchcount = \App\Wspmisreport::where($mismatchfields)->count();
			
			if($mismatchcount > 0){ 
				 $mismatch_ress = \App\Wspmisreport::where($mismatchfields)->first();
				 $misresult[$skey] = $mismatch_ress;
			} 
			
		  	$ref_count = \App\Wspnotworkingissue::where($matchreffields)->count();
			if($ref_count > 0){
			   $ref_count_val = \App\Wspnotworkingissue::where($matchreffields)->count(); 
			   $issuecount[$skey] = $ref_count_val;
			   $ref_record_val = \App\Wspnotworkingissue::where($matchreffields)->get();
			   foreach($ref_record_val as $ref_rec){
			      $ref_a[] = $ref_rec;
			   } 
			         
			   $ref_overall[$skey] =  $ref_a;
			}
			else{
			   $issuecount[$skey] = 0;
			   $ref_overall[$skey]= 0;
			}
			
			//MODIFIED ARRAY
			$ref_a_temp = array();
			if($ref_count > 0){
			   $ref_record_temp_val = \App\Wspnotworkingissue::where($matchreffields)->get();
			   foreach($ref_record_temp_val as $ref_temp_rec){
			      $ref_a_temp['category'][] = $ref_temp_rec->category;
				  $ref_a_temp['issue_des'][] = $ref_temp_rec->issue_des;
				  $ref_a_temp['root_cause'][] = $ref_temp_rec->root_cause;
				  $ref_a_temp['act_req_plan'][] = $ref_temp_rec->act_req_plan;
				  $ref_a_temp['pendingfromdays'][] = $ref_temp_rec->pendingfromdays;
				  $ref_a_temp['reponsibility'][] = $ref_temp_rec->reponsibility;
				  $ref_a_temp['notify_concern'][] = $ref_temp_rec->notify_concern;
			   } 
			          
			   $ref_overall_temp[$skey] =  $ref_a_temp;
			}
			else{
			 //  $issuecount[$skey] = 0;
			   //$ref_overall[$skey]= 0;
			   $ref_overall_temp[$skey] = 0;
			}

			 // END MODIFIED ARRAY
			
			}
		  }
		     arsort($issuecount);
			 
			 /*echo "<pre>";
			   print_r($ref_overall_temp);
			 echo "</pre>"; exit; */
		
		$relations = [
			'res' => $formfieldarray,  
			'sites' => $siteattrname,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'issues' => $ref_overall, 
			'issuecount' => $issuecount,
			'validation' => $ref_total, 
			'misres' => $misresult, 
			'issuetemp' => $ref_overall_temp,
			
			];     
			   		
		  return view('misfiles.advanceviews.wspstatus', $relations);

		
			 
			}
			
		else if($reporttype == 'security_report'){

        $segment3 = $year;
		$segment4 = $month;
		
		$formfieldarray = array();
		$siteattrname = array();
		$flatres = array();
		$reportdate_val = "";
		$dateString = $segment3.'-'.$segment4.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$segment4."-".$segment3;

	      if(Auth::user()->id == 1){
	     
		    $sitearr = explode(",",$selected_sites);
		  $sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		  
		  }else{

            $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$selected_sites);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		
		  }
		  $existing_records = array();
		  $existing_Rates = array();
		  
		
		  
		$relations = [  
			'res' => $formfieldarray, 
			'sites' => $siteattrname,
			'borewellsnum' => $borewellsnum,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			];    

		

		$matchfields = ['month' => $segment4, 'year' => $segment3]; 

		$res_count = \App\Securitymisreport::where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Securitymisreport::where($matchfields)->get();
			
			  $exist_Sec = array();
			  $exist_SecTwo = array();
			 if(count($formfieldarray) > 0){
			     foreach($formfieldarray as $fieldarr){
				 	 $existing_records[$fieldarr->site] = array("id"=>$fieldarr->id,"guards"=>$fieldarr->guards,"l_guards"=>$fieldarr->l_guards,"h_guards"=>$fieldarr->h_guards,"supervisors"=>$fieldarr->supervisors,"aso"=>$fieldarr->aso,"so_num"=>$fieldarr->so_num,"nalla_gandla_hub"=>$fieldarr->nalla_gandla_hub,"hillpark_hub"=>$fieldarr->hillpark_hub);
					 
					 
							$current_month=$segment4;
							$current_year=$segment3;
							if($current_month==1)
							{
								$lastmonth=12;
								$lastyear = $current_year - 1;
							}
							else 
							{
								$lastmonth=$current_month-1;
								$lastyear = $current_year;
							} 
							$lastdateofmonth=date('t',$lastmonth);
							$report_on_date = $lastyear."-".$lastmonth."-".$lastdateofmonth;
							$security_match_fields = ['site' => $fieldarr->site,'reporton' => $report_on_date];
							$prev_sec_report_cn = \App\Securitydailyreport::where($security_match_fields)->count();
							 
							$eqpmatchfields = ['site' => $fieldarr->site]; 
							$equipcn = \App\Securitydailyreportvalidation::where($eqpmatchfields)->count();
							 if($equipcn > 0){
								$equipvalidation = \App\Securitydailyreportvalidation::where($eqpmatchfields)->first();
					          } 
					 
					 if(($fieldarr->site == 5 || $fieldarr->site == 6 || $fieldarr->site == 7 || $fieldarr->site == 8 || $fieldarr->site ==10 || $fieldarr->site ==14 || $fieldarr->site ==17 || $fieldarr->site == 16) &&  in_array($fieldarr->site, $sitearr)) {
					 $exist_Sec['sites'][$fieldarr->site] = get_sitename($fieldarr->site);
					 $exist_Sec['guards'][$fieldarr->site] = $fieldarr->guards;
					 $exist_Sec['l_guards'][$fieldarr->site] = $fieldarr->l_guards;
					 $exist_Sec['h_guards'][$fieldarr->site] = $fieldarr->h_guards;
					 $exist_Sec['supervisors'][$fieldarr->site] = $fieldarr->supervisors;
					 $exist_Sec['aso'][$fieldarr->site] = $fieldarr->aso;
					 $exist_Sec['so_num'][$fieldarr->site] = $fieldarr->so_num;
					 $exist_Sec['ctotval'][$fieldarr->site] = (float)$fieldarr->guards + (float)$fieldarr->l_guards + (float)$fieldarr->h_guards + (float)$fieldarr->supervisors + (float)$fieldarr->aso + (float)$fieldarr->so_num;
					 
					 $exist_Sec['nalla_gandla_hub'][$fieldarr->site] = $fieldarr->nalla_gandla_hub;
					 $exist_Sec['hillpark_hub'][$fieldarr->site] = $fieldarr->hillpark_hub;
					 /*if($prev_sec_report_cn > 0){
							$prev_sec_report = \App\Securitydailyreport::where($security_match_fields)->first();
					  $exist_Sec['wlkt'][$fieldarr->site]	= $prev_sec_report['nw_wt']."/".$equipvalidation['wt'];
					  $exist_Sec['torch'][$fieldarr->site]	= $prev_sec_report['nw_torch']."/".$equipvalidation['torches'];
					  $exist_Sec['biometric'][$fieldarr->site]	= $prev_sec_report['nw_bio']."/".$equipvalidation['biomachine'];
					  }  */
					  
					  if($prev_sec_report_cn > 0){
							$prev_sec_report = \App\Securitydailyreport::where($security_match_fields)->first();
					  if($prev_sec_report['nw_wt']) $exist_Sec['wlkt'][$fieldarr->site]	= $prev_sec_report['nw_wt']."/".$equipvalidation['wt']; else $exist_Sec['wlkt'][$fieldarr->site]	= "0"."/".$equipvalidation['wt'];
					 if($prev_sec_report['nw_torch']) $exist_Sec['torch'][$fieldarr->site]	= $prev_sec_report['nw_torch']."/".$equipvalidation['torches']; else $exist_Sec['torch'][$fieldarr->site]	= "0"."/".$equipvalidation['torches'];
					  if($prev_sec_report['nw_bio']) $exist_Sec['biometric'][$fieldarr->site]	= $prev_sec_report['nw_bio']."/".$equipvalidation['biomachine']; else $exist_Sec['biometric'][$fieldarr->site]	= "0"."/".$equipvalidation['biomachine'];
					  }  
					  
					  else
					  {
					     $exist_Sec['wlkt'][$fieldarr->site]	= "0"."/".$equipvalidation['wt'];
						 $exist_Sec['torch'][$fieldarr->site]	= "0"."/".$equipvalidation['torches'];
						 $exist_Sec['biometric'][$fieldarr->site]	= "0"."/".$equipvalidation['biomachine'];
					  }
					  
					  $exist_Sec['computer'][$fieldarr->site]	= $equipvalidation['computers'];
					  $exist_Sec['internetcon'][$fieldarr->site]	= $equipvalidation['internetcon'];
					  $exist_Sec['batons'][$fieldarr->site]	= $equipvalidation['av_batons'];
					  $exist_Sec['stlights'][$fieldarr->site]	= $equipvalidation['street_lights'];
					  $exist_Sec['bicycle'][$fieldarr->site]	= $equipvalidation['bicycle'];
							
					 } else if(($fieldarr->site == 9 || $fieldarr->site == 11 || $fieldarr->site == 12 || $fieldarr->site == 13 || $fieldarr->site ==15 || $fieldarr->site ==18 || $fieldarr->site ==19 || $fieldarr->site == 20) &&  in_array($fieldarr->site, $sitearr)) {
					 
					  $exist_SecTwo['sites'][$fieldarr->site] = get_sitename($fieldarr->site);
					 $exist_SecTwo['guards'][$fieldarr->site] = $fieldarr->guards;
					 $exist_SecTwo['l_guards'][$fieldarr->site] = $fieldarr->l_guards;
					 $exist_SecTwo['h_guards'][$fieldarr->site] = $fieldarr->h_guards;
					 $exist_SecTwo['supervisors'][$fieldarr->site] = $fieldarr->supervisors;
					 $exist_SecTwo['aso'][$fieldarr->site] = $fieldarr->aso;
					 $exist_SecTwo['so_num'][$fieldarr->site] = $fieldarr->so_num;
					 
					  $exist_SecTwo['ctotval'][$fieldarr->site] = (float)$fieldarr->guards + (float)$fieldarr->l_guards + (float)$fieldarr->h_guards + (float)$fieldarr->supervisors + (float)$fieldarr->aso + (float)$fieldarr->so_num;
					  
					 $exist_SecTwo['nalla_gandla_hub'][$fieldarr->site] = $fieldarr->nalla_gandla_hub;
					 $exist_SecTwo['hillpark_hub'][$fieldarr->site] = $fieldarr->hillpark_hub;
					  if($prev_sec_report_cn > 0){
							$prev_sec_report = \App\Securitydailyreport::where($security_match_fields)->first();
					  if($prev_sec_report['nw_wt']) $exist_SecTwo['wlkt'][$fieldarr->site]	= $prev_sec_report['nw_wt']."/".$equipvalidation['wt']; else $exist_SecTwo['wlkt'][$fieldarr->site]	= "0"."/".$equipvalidation['wt'];
					 if($prev_sec_report['nw_torch']) $exist_SecTwo['torch'][$fieldarr->site]	= $prev_sec_report['nw_torch']."/".$equipvalidation['torches']; else $exist_SecTwo['torch'][$fieldarr->site]	= "0"."/".$equipvalidation['torches'];
					  if($prev_sec_report['nw_bio']) $exist_SecTwo['biometric'][$fieldarr->site]	= $prev_sec_report['nw_bio']."/".$equipvalidation['biomachine']; else $exist_SecTwo['biometric'][$fieldarr->site]	= "0"."/".$equipvalidation['biomachine'];
					  }  
					  
					  else
					  {
					     $exist_SecTwo['wlkt'][$fieldarr->site]	= "0"."/".$equipvalidation['wt'];
						 $exist_SecTwo['torch'][$fieldarr->site]	= "0"."/".$equipvalidation['torches'];
						 $exist_SecTwo['biometric'][$fieldarr->site]	= "0"."/".$equipvalidation['biomachine'];
					  }
					  $exist_SecTwo['computer'][$fieldarr->site]	= $equipvalidation['computers'];
					  $exist_SecTwo['internetcon'][$fieldarr->site]	= $equipvalidation['internetcon'];
					  $exist_SecTwo['batons'][$fieldarr->site]	= $equipvalidation['av_batons'];
					  $exist_SecTwo['stlights'][$fieldarr->site]	= $equipvalidation['street_lights'];
					  $exist_SecTwo['bicycle'][$fieldarr->site]	= $equipvalidation['bicycle'];
					    
					 }
				 } 
				 
				//echo "<pre>"; print_r($exist_SecTwo);echo "</pre>";
			 }  
			 
			 //exit;
			
			$relations = [
			'res' => $formfieldarray,  
			'sites' => $siteattrname,
			'borewellsnum' => $borewellsnum,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			'existsec' => $exist_Sec,
			'existsectwo' => $exist_SecTwo,
			];     
			  
		 }

		  return view('misfiles.advanceviews.missecurityone', $relations);

		
		}
		
	  else if($reporttype == 'house_keeping_report'){
			 
		$segment3 = $year;
		$segment4 = $month;  	   
	
		$formfieldarray = array();
		$siteattrname = array();
		$flatres = array();
		$reportdate_val = "";
		$dateString = $segment3.'-'.$segment4.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$segment4."-".$segment3;

	       if(Auth::user()->id == 1){
		    $sitearr = explode(",",$selected_sites);
		  $sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		   
		  }else{ 
		  
		   $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$selected_sites);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
			
		  }
		  
		  $existing_records = array();
		  $existing_Rates = array();
		  $deployment = array();
		  
		  $getratescn =  \App\Pmsdailyreportvalidation::count();
		  if($getratescn > 0){
		     $getratesRes =  \App\Pmsdailyreportvalidation::get();
			  foreach($getratesRes as $rate){
			   $existing_Rates[$rate->site] = array("one_bhk"=>$rate->one_bhk,"two_bhk"=>$rate->two_bhk,"three_bhk"=>$rate->three_bhk,"four_bhk"=>$rate->four_bhk);
			  }
		  } 
		  
		
			
        foreach($siteattrname as $dep => $deploy){
		   $deppmatchfields = ['site' => $dep];
		   $deprescn = \App\Pmsdailyreportvalidation::where($deppmatchfields)->count();
		   if($deprescn > 0){
		   		$depresult = \App\Pmsdailyreportvalidation::where($deppmatchfields)->first();
				//$deployment['deployment'][$dep] = (float)$depresult['house_sup'] + (float)$depresult['house_help'] + (float)$depresult['clu_hs_fo'] +  (float)$depresult['clu_hs_hk'] +  (float)$depresult['other'];
				$deployment['deployment'][$dep] =  (float)$depresult['house_help'] + (float)$depresult['clu_hs_hk'];
			} 	else{
			   $deployment['deployment'][$dep] = 0;
			}
		  }

		$matchfields = ['month' => $segment4, 'year' => $segment3]; 

		$res_count = \App\Housekpmisreport::where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Housekpmisreport::where($matchfields)->get();
				// echo "<pre>"; print_r($existing_records);echo "</pre>";
			 //exit; 
			 $existing_records = array();
			 foreach($formfieldarray  as $existing){
			    $existing_records[$existing['site']] = $existing;
			 }
			
		  }
		  
		  $relations = [
			'res' => $formfieldarray,  
			'sites' => $siteattrname,
			'flats' => $flatres,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			'cost' => $existing_Rates,
			'deployment' => $deployment, 
			];     

		  return view('misfiles.advanceviews.mishousekeeping', $relations);

			}
			
			else if($reporttype == 'horticulture_report'){
			
	   $segment3 = $year;
		$segment4 = $month;  
			
		$formfieldarray = array();
		$siteattrname = array();
		$flatres = array();
		$reportdate_val = "";
		$dateString = $segment3.'-'.$segment4.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$segment4."-".$segment3;

	       if(Auth::user()->id == 1){
		  $sitearr = explode(",",$selected_sites);
		  $sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		   
		  }else{ 
		  
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$selected_sites);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
			
		  }
		  
		  $existing_records = array();
		  $existing_records_two = array();
		  $existing_records_three = array();
		  $existing_Rates = array();
		  $deployment = array();
		  
		  $getratescn =  \App\Pmsdailyreportvalidation::count();
		  if($getratescn > 0){
		     $getratesRes =  \App\Pmsdailyreportvalidation::get();
			  foreach($getratesRes as $rate){
			   $existing_Rates[$rate->site] = array("one_bhk"=>$rate->one_bhk,"two_bhk"=>$rate->two_bhk,"three_bhk"=>$rate->three_bhk,"four_bhk"=>$rate->four_bhk);
			  }
		  } 
		  
			
        foreach($siteattrname as $dep => $deploy){
		   $deppmatchfields = ['site' => $dep];
		   $deprescn = \App\Pmsdailyreportvalidation::where($deppmatchfields)->count();
		   if($deprescn > 0){
		   		$depresult = \App\Pmsdailyreportvalidation::where($deppmatchfields)->first();
				//$deployment['deployment'][$dep] = (float)$depresult['house_sup'] + (float)$depresult['house_help'] + (float)$depresult['clu_hs_fo'] +  (float)$depresult['clu_hs_hk'] +  (float)$depresult['other'];
				$deployment['deployment'][$dep] =  (float)$depresult['house_help'] + (float)$depresult['clu_hs_hk'];
			} 	else{
			   $deployment['deployment'][$dep] = 0;
			}
		  }

		$matchfields = ['month' => $segment4, 'year' => $segment3]; 

		$res_count = \App\Horticulturemisreport::where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Horticulturemisreport::where($matchfields)->get();
				// echo "<pre>"; print_r($existing_records);echo "</pre>";
			 //exit; 
			 $existing_records = array();
			 foreach($formfieldarray  as $existing){
			 
			    
			    $existing_records['varmicompost'][$existing['site']] = $existing['varmicompost'];
				$existing_records['chloropyriphos'][$existing['site']] = $existing['chloropyriphos'];
				$existing_records['monocrotophos'][$existing['site']] = $existing['monocrotophos'];
				$existing_records['monocrotophos'][$existing['site']] = $existing['monocrotophos'];
				$existing_records['imidaclopride'][$existing['site']] = $existing['imidaclopride'];
				$existing_records['bavistin'][$existing['site']] = $existing['bavistin'];
				$existing_records['dhanvit'][$existing['site']] = $existing['dhanvit'];
				$existing_records['multiplex'][$existing['site']] = $existing['multiplex'];
				$existing_records['furadon'][$existing['site']] = $existing['furadon'];
				$existing_records['phorate'][$existing['site']] = $existing['phorate'];
				$existing_records['nineteenkgs'][$existing['site']] = $existing['nineteenkgs'];
				$existing_records['nineteenkgssoluble'][$existing['site']] = $existing['nineteenkgssoluble'];
				$existing_records['acephate'][$existing['site']] = $existing['acephate'];
				$existing_records['seventeenkgs'][$existing['site']] = $existing['seventeenkgs'];
				$existing_records['urea'][$existing['site']] = $existing['urea'];
				$existing_records['potash'][$existing['site']] = $existing['potash'];
				$existing_records['rogar'][$existing['site']] = $existing['rogar'];
				$existing_records['malathian'][$existing['site']] = $existing['malathian'];
				$existing_records['fouate'][$existing['site']] = $existing['fouate'];
				$existing_records['fifteenkgs'][$existing['site']] = $existing['fifteenkgs'];
				$existing_records['twofourdkgs'][$existing['site']] = $existing['twofourdkgs'];
				$existing_records['glycil'][$existing['site']] = $existing['glycil'];
				$existing_records['sixteenkgs'][$existing['site']] = $existing['sixteenkgs'];
				$existing_records['arrowltrs'][$existing['site']] = $existing['arrowltrs'];
				$existing_records['biowetltrs'][$existing['site']] = $existing['biowetltrs'];
				$existing_records['blitaxkgs'][$existing['site']] = $existing['blitaxkgs'];
				$existing_records['twentykgs'][$existing['site']] = $existing['twentykgs'];
				
				
				
				
			 }
			
		  }
		  
		  foreach($siteattrname as $sk => $sitena){
		  
		    $matchhuskpfields = ['month' => $segment4, 'year' => $segment3, 'site' => $sk];
			 $hsk_count = \App\Horticulturemisreport::where($matchhuskpfields)->count();
			 if($hsk_count > 0){
			 	$hsk_arr = \App\Horticulturemisreport::where($matchfields)->first();
				
				$existing_records['varmicompost'][$sk] = $hsk_arr['varmicompost'];
				$existing_records['chloropyriphos'][$sk] = $hsk_arr['chloropyriphos'];
				$existing_records['monocrotophos'][$sk] = $hsk_arr['monocrotophos'];
				$existing_records['imidaclopride'][$sk] = $hsk_arr['imidaclopride'];
				$existing_records['bavistin'][$sk] = $hsk_arr['bavistin'];
				$existing_records['dhanvit'][$sk] = $hsk_arr['dhanvit'];
				$existing_records['multiplex'][$sk] = $hsk_arr['multiplex'];
				$existing_records['furadon'][$sk] = $hsk_arr['furadon'];
				$existing_records['phorate'][$sk] = $hsk_arr['phorate'];
				$existing_records['nineteenkgs'][$sk] = $hsk_arr['nineteenkgs'];
				$existing_records['nineteenkgssoluble'][$sk] = $hsk_arr['nineteenkgssoluble'];
				$existing_records['acephate'][$sk] = $hsk_arr['acephate'];
				$existing_records['seventeenkgs'][$sk] = $hsk_arr['seventeenkgs'];
				$existing_records['urea'][$sk] = $hsk_arr['urea'];
				$existing_records['potash'][$sk] = $hsk_arr['potash'];
				$existing_records['rogar'][$sk] = $hsk_arr['rogar'];
				$existing_records['malathian'][$sk] = $hsk_arr['malathian'];
				$existing_records['fouate'][$sk] = $hsk_arr['fouate'];
				$existing_records['fifteenkgs'][$sk] = $hsk_arr['fifteenkgs'];
				$existing_records['twofourdkgs'][$sk] = $hsk_arr['twofourdkgs'];
				$existing_records['glycil'][$sk] = $hsk_arr['glycil'];
				$existing_records['sixteenkgs'][$sk] = $hsk_arr['sixteenkgs'];
				$existing_records['arrowltrs'][$sk] = $hsk_arr['arrowltrs'];
				$existing_records['biowetltrs'][$sk] = $hsk_arr['biowetltrs'];
				$existing_records['blitaxkgs'][$sk] = $hsk_arr['blitaxkgs'];
				$existing_records['twentykgs'][$sk] = $hsk_arr['twentykgs'];
				
			 }
			 else
			 {
			    $existing_records['varmicompost'][$sk] = "";
				$existing_records['chloropyriphos'][$sk] = "";
				$existing_records['monocrotophos'][$sk] = "";
				$existing_records['imidaclopride'][$sk] = "";
				$existing_records['bavistin'][$sk] = "";
				$existing_records['dhanvit'][$sk] = "";
				$existing_records['multiplex'][$sk] = "";
				$existing_records['furadon'][$sk] = "";
				$existing_records['phorate'][$sk] = "";
				$existing_records['nineteenkgs'][$sk] = "";
				$existing_records['nineteenkgssoluble'][$sk] = "";
				$existing_records['acephate'][$sk] = "";
				$existing_records['seventeenkgs'][$sk] = "";
				$existing_records['urea'][$sk] = "";
				$existing_records['potash'][$sk] = "";
				$existing_records['rogar'][$sk] = "";
				$existing_records['malathian'][$sk] = "";
				$existing_records['fouate'][$sk] = "";
				$existing_records['fifteenkgs'][$sk] = "";
				$existing_records['twofourdkgs'][$sk] = "";
				$existing_records['glycil'][$sk] = "";
				$existing_records['sixteenkgs'][$sk] = "";
				$existing_records['arrowltrs'][$sk] = "";
				$existing_records['biowetltrs'][$sk] = "";
				$existing_records['blitaxkgs'][$sk] = "";
				$existing_records['twentykgs'][$sk] = "";   
			 }
		    
		  }
		  
		  
		    foreach($siteattrname as $sk => $sitena){
		  
		    $matchhuskpfields = ['month' => $segment4, 'year' => $segment3, 'site' => $sk];
			 if(($sk == 5 || $sk == 6 || $sk == 7 || $sk == 8 || $sk ==10 || $sk ==14 || $sk ==17 || $sk == 16) && in_array($sk,$sitearr)) {
				 $existing_records_two['sites'][$sk] = get_sitename($sk);
			 $hsk_count = \App\Horticulturemisreport::where($matchhuskpfields)->count();
			 if($hsk_count > 0){
			 	$hsk_arr = \App\Horticulturemisreport::where($matchfields)->first();
				$existing_records_two['watering'][$sk] = $hsk_arr['watering'];
				$existing_records_two['cleaning'][$sk] = $hsk_arr['cleaning'];
				$existing_records_two['weeding'][$sk] = $hsk_arr['weeding'];
				$existing_records_two['cutting'][$sk] = $hsk_arr['cutting'];
				$existing_records_two['multching'][$sk] = $hsk_arr['multching'];
				$existing_records_two['trimming'][$sk] = $hsk_arr['trimming'];
				$existing_records_two['training_shaping'][$sk] = $hsk_arr['training_shaping'];
				$existing_records_two['pruning'][$sk] = $hsk_arr['pruning'];
				$existing_records_two['hoeing'][$sk] = $hsk_arr['hoeing'];
				$existing_records_two['lawn_moving'][$sk] = $hsk_arr['lawn_moving'];
				$existing_records_two['fertilizer_application'][$sk] = $hsk_arr['fertilizer_application'];
				$existing_records_two['organic_manure_app'][$sk] = $hsk_arr['organic_manure_app'];
				$existing_records_two['spraying_chemicals'][$sk] = $hsk_arr['spraying_chemicals'];
				$existing_records_two['micro_nutrients'][$sk] = $hsk_arr['micro_nutrients'];
				$existing_records_two['weedicide_application'][$sk] = $hsk_arr['weedicide_application'];
				$existing_records_two['mandays_perday'][$sk] = $hsk_arr['mandays_perday'];
				
				}else{
				
				$existing_records_two['watering'][$sk] = "";
				$existing_records_two['cleaning'][$sk] = "";
				$existing_records_two['weeding'][$sk] = "";
				$existing_records_two['cutting'][$sk] = "";
				$existing_records_two['multching'][$sk] = "";
				$existing_records_two['trimming'][$sk] = "";
				$existing_records_two['training_shaping'][$sk] = "";
				$existing_records_two['pruning'][$sk] = "";
				$existing_records_two['hoeing'][$sk] = "";
				$existing_records_two['lawn_moving'][$sk] = "";
				$existing_records_two['fertilizer_application'][$sk] = "";
				$existing_records_two['organic_manure_app'][$sk] = "";
				$existing_records_two['spraying_chemicals'][$sk] = "";
				$existing_records_two['micro_nutrients'][$sk] = "";
				$existing_records_two['weedicide_application'][$sk] = "";
				$existing_records_two['mandays_perday'][$sk] = "";
				
				}
				 } else if(($sk == 9 || $sk == 11 || $sk == 12 || $sk == 13 || $sk ==15 || $sk ==18 || $sk ==19 || $sk == 20) && in_array($sk,$sitearr)) {
				  
				 $existing_records_three['sites'][$sk] = get_sitename($sk);
				  $hsk_count = \App\Horticulturemisreport::where($matchhuskpfields)->count();
			 if($hsk_count > 0){
			 	$hsk_arr = \App\Horticulturemisreport::where($matchfields)->first();
				
				
				
				$existing_records_three['watering'][$sk] = $hsk_arr['watering'];
				$existing_records_three['cleaning'][$sk] = $hsk_arr['cleaning'];
				$existing_records_three['weeding'][$sk] = $hsk_arr['weeding'];
				$existing_records_three['cutting'][$sk] = $hsk_arr['cutting'];
				$existing_records_three['multching'][$sk] = $hsk_arr['multching'];
				$existing_records_three['trimming'][$sk] = $hsk_arr['trimming'];
				$existing_records_three['training_shaping'][$sk] = $hsk_arr['training_shaping'];
				$existing_records_three['pruning'][$sk] = $hsk_arr['pruning'];
				$existing_records_three['hoeing'][$sk] = $hsk_arr['hoeing'];
				$existing_records_three['lawn_moving'][$sk] = $hsk_arr['lawn_moving'];
				$existing_records_three['fertilizer_application'][$sk] = $hsk_arr['fertilizer_application'];
				$existing_records_three['organic_manure_app'][$sk] = $hsk_arr['organic_manure_app'];
				$existing_records_three['spraying_chemicals'][$sk] = $hsk_arr['spraying_chemicals'];
				$existing_records_three['micro_nutrients'][$sk] = $hsk_arr['micro_nutrients'];
				$existing_records_three['weedicide_application'][$sk] = $hsk_arr['weedicide_application'];
				$existing_records_three['mandays_perday'][$sk] = $hsk_arr['mandays_perday'];
				}else{
				
				$existing_records_three['watering'][$sk] = "";
				$existing_records_three['cleaning'][$sk] = "";
				$existing_records_three['weeding'][$sk] = "";
				$existing_records_three['cutting'][$sk] = "";
				$existing_records_three['multching'][$sk] = "";
				$existing_records_three['trimming'][$sk] = "";
				$existing_records_three['training_shaping'][$sk] = "";
				$existing_records_three['pruning'][$sk] = "";
				$existing_records_three['hoeing'][$sk] = "";
				$existing_records_three['lawn_moving'][$sk] = "";
				$existing_records_three['fertilizer_application'][$sk] = "";
				$existing_records_three['organic_manure_app'][$sk] = "";
				$existing_records_three['spraying_chemicals'][$sk] = "";
				$existing_records_three['micro_nutrients'][$sk] = "";
				$existing_records_three['weedicide_application'][$sk] = "";
				$existing_records_three['mandays_perday'][$sk] = "";
				
				}
				    
				 }
			}
		    
		  $relations = [
			'res' => $formfieldarray,  
			'sites' => $siteattrname,
			'flats' => $flatres,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			'existing_two' => $existing_records_two,
			'existing_three' => $existing_records_three,
			'cost' => $existing_Rates,
			'deployment' => $deployment, 
			];   
		  
		  
		  return view('misfiles.advanceviews.horticulturepestone', $relations);

		
			} 
			else if($reporttype == 'club_house_utilization_data'){
			
		$segment3 = $year;
		$segment4 = $month;  
		
		$formfieldarray = array();
		$siteattrname = array();
		$flatres = array();
		$reportdate_val = "";
		$dateString = $segment3.'-'.$segment4.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$segment4."-".$segment3;

	      if(Auth::user()->id == 1){
	    
		    $sitearr = explode(",",$selected_sites);
		  $sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  
		  }else{
		  
		     $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$selected_sites);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id'); 
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
			
		  }
		  $existing_records = array();
		  $existing_Rates = array();
		  
		  $getratescn =  \App\Pmsdailyreportvalidation::count();
		  if($getratescn > 0){
		     $getratesRes =  \App\Pmsdailyreportvalidation::get();
			  foreach($getratesRes as $rate){
			   $existing_Rates[$rate->site] = array("one_bhk"=>$rate->one_bhk,"two_bhk"=>$rate->two_bhk,"three_bhk"=>$rate->three_bhk,"four_bhk"=>$rate->four_bhk);
			  }
		  } 
		  
		$relations = [  
			'res' => $formfieldarray, 
			'sites' => $siteattrname,
			'flats' => $flatres,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			'cost' => $existing_Rates,
			];    

		

		$matchfields = ['month' => $segment4, 'year' => $segment3]; 

		$res_count = \App\Clubutilizationmisreport::where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Clubutilizationmisreport::where($matchfields)->get();
			
			
			 if(count($formfieldarray) > 0){
			     foreach($formfieldarray as $fieldarr){
				 	 $existing_records[$fieldarr->site] = array("id"=>$fieldarr->id,"avg_occupancy"=>$fieldarr->avg_occupancy,"avg_daily_swim"=>$fieldarr->avg_daily_swim,"avg_daily_gym"=>$fieldarr->avg_daily_gym,'occ_flat_swim' =>$fieldarr->occ_flat_swim,'occ_gym_swim' =>$fieldarr->occ_gym_swim);
				 } 
				 
				// echo "<pre>"; print_r($existing_records);echo "</pre>";
			 }  
			 }
			 //exit;
			
			$relations = [
			'res' => $formfieldarray,  
			'sites' => $siteattrname,
			'flats' => $flatres,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			'cost' => $existing_Rates,
			];     
			 

		  return view('misfiles.advanceviews.misclubhouse', $relations);

		
	
		}
		
			else if($reporttype == 'occupancy_data'){
			$segment3 = $year;
		  $segment4 = $month;  

			 
		$formfieldarray = array();
		$siteattrname = array();
		$flatres = array();
		$reportdate_val = "";
		$dateString = $segment3.'-'.$segment4.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$segment4."-".$segment3;

	      if(Auth::user()->id == 1){

			$sitearr = explode(",",$selected_sites);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{

            $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$selected_sites);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site'); 		
		  }
		  $existing_records = array();
		  $existing_Rates = array();
		  
		  $getratescn =  \App\Pmsdailyreportvalidation::count();
		  if($getratescn > 0){
		     $getratesRes =  \App\Pmsdailyreportvalidation::get();
			  foreach($getratesRes as $rate){
			   $existing_Rates[$rate->site] = array("one_bhk"=>$rate->one_bhk,"two_bhk"=>$rate->two_bhk,"three_bhk"=>$rate->three_bhk,"four_bhk"=>$rate->four_bhk);
			  }
		  } 
		  
		$relations = [  
			'res' => $formfieldarray, 
			'sites' => $siteattrname,
			'flats' => $flatres,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			'cost' => $existing_Rates,
			];    

		

		$matchfields = ['month' => $segment4, 'year' => $segment3]; 

		$res_count = \App\Occupancymisreport::where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Occupancymisreport::where($matchfields)->get();
			
			
			 if(count($formfieldarray) > 0){
			     foreach($formfieldarray as $fieldarr){
				 	 $existing_records[$fieldarr->site] = array("id"=>$fieldarr->id,"owners"=>$fieldarr->owners,"tenants"=>$fieldarr->tenants,"vacant"=>$fieldarr->vacant);
				 } 
				 
				// echo "<pre>"; print_r($existing_records);echo "</pre>";
			 }  
			 
			 //exit;
			
			$relations = [
			'res' => $formfieldarray,  
			'sites' => $siteattrname,
			'flats' => $flatres,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			'cost' => $existing_Rates,
			];     
			 
			
			 return view('misfiles.advanceviews.occupancy', $relations);
			  
			}
			
			} 
			
			else if($reporttype == 'indented_material_status'){
			
		$segment3 = $year;
		$segment4 = $month;
		
		$formfieldarray = array();
		$siteattrname = array();
		$flatres = array();
		$reportdate_val = "";
		$dateString = $segment3.'-'.$segment4.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$segment4."-".$segment3;

	      if(Auth::user()->id == 1){
	  
		   $sitearr = explode(",",$selected_sites);
		  $sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{
		  
		   $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$selected_sites);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
			
		  }
		  $existing_records = array();
		  $existing_Rates = array();
		  
		  $getratescn =  \App\Pmsdailyreportvalidation::count();
		  if($getratescn > 0){
		     $getratesRes =  \App\Pmsdailyreportvalidation::get();
			  foreach($getratesRes as $rate){
			   $existing_Rates[$rate->site] = array("one_bhk"=>$rate->one_bhk,"two_bhk"=>$rate->two_bhk,"three_bhk"=>$rate->three_bhk,"four_bhk"=>$rate->four_bhk);
			  }
		  } 
		  
		$relations = [  
			'res' => $formfieldarray, 
			'sites' => $sitenames,
			'flats' => $flatres,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			'cost' => $existing_Rates,
			];    

		

		$matchfields = ['month' => $segment4, 'year' => $segment3]; 

		$res_count = \App\Indentedmisreport::where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Indentedmisreport::where($matchfields)->get();
			
			
			 if(count($formfieldarray) > 0){
			     foreach($formfieldarray as $fieldarr){
				 	 $existing_records[$fieldarr->site] = $fieldarr;
				 } 
				 
				 //echo "<pre>"; print_r($existing_records);echo "</pre>"; exit;
			 }  
			 
			 }
			 
			 $indentrep_Array = array();
			 $lagged_date = array();
			 foreach($siteattrname as $stk => $siten) {
			 
			  $match_in_fields = ['month' => $segment4, 'year' => $segment3, 'site' =>$stk]; 
			  $match_in_count = \App\Indentedmisreport::where($match_in_fields)->count();
		
		       if($match_in_count > 0){
			   	    $match_in_array = \App\Indentedmisreport::where($match_in_fields)->get();
					$match_lag_array = \App\Indentedmisreport::where($match_in_fields)->first();
					
					$indentrep_Array[$stk] = $match_in_array;
					$lagged_date[$stk] = $match_lag_array->laggeddate;
			   }
			   else{
			       $indentrep_Array[$stk] = array();
			   }
			   
			   
			 }
			 
			 //exit;
			
			$relations = [
			'res' => $formfieldarray,  
			'sites' => $sitenames,
			'flats' => $flatres,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			'indentrep' => $indentrep_Array,
			'cost' => $existing_Rates,
			'laggeddate' => $lagged_date,
			];   
			
		     

		  return view('misfiles.advanceviews.materialindented', $relations);

		
			 
			}
			
			else if($reporttype == 'apna_complex'){
			
       	$segment3 = $year;
		$segment4 = $month;  

		$formfieldarray = array();
		$siteattrname = array();
		$flatres = array();
		$reportdate_val = "";
		$dateString = $segment3.'-'.$segment4.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$segment4."-".$segment3;

	      if(Auth::user()->id == 1){
		  
		   $sitearr = explode(",",$selected_sites);
		  $sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }else{
		         
			$role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$selected_sites);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
			
		  
		  }
		  $existing_records = array();
		  $existing_Rates = array();
		  
		  $getratescn =  \App\Pmsdailyreportvalidation::count();
		  if($getratescn > 0){
		     $getratesRes =  \App\Pmsdailyreportvalidation::get();
			  foreach($getratesRes as $rate){
			   $existing_Rates[$rate->site] = array("one_bhk"=>$rate->one_bhk,"two_bhk"=>$rate->two_bhk,"three_bhk"=>$rate->three_bhk,"four_bhk"=>$rate->four_bhk);
			  }
		  } 
		  
		$relations = [  
			'res' => $formfieldarray, 
			'sites' => $sitenames,
			'flats' => $flatres,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			'cost' => $existing_Rates,
			];    

		

		$matchfields = ['month' => $segment4, 'year' => $segment3]; 

		$res_count = \App\Occupancymisreport::where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Occupancymisreport::where($matchfields)->get();
			
			
			 if(count($formfieldarray) > 0){
			     foreach($formfieldarray as $fieldarr){
				 	 $existing_records[$fieldarr->site] = array("id"=>$fieldarr->id,"owners"=>$fieldarr->owners,"tenants"=>$fieldarr->tenants,"vacant"=>$fieldarr->vacant);
				 } 
				 
				// echo "<pre>"; print_r($existing_records);echo "</pre>";
			 }  
			 
			 
			 $indentrep_Array = array();
			 $lagged_date = array();
			 foreach($siteattrname as $stk => $siten) {
			 
			  $match_in_fields = ['month' => $segment4, 'year' => $segment3, 'site' =>$stk]; 
			  $match_in_count = \App\Apnacomplaintmisreport::where($match_in_fields)->count();
		
		       if($match_in_count > 0){
			   	    $match_in_array = \App\Apnacomplaintmisreport::where($match_in_fields)->get();
					
					$indentrep_Array[$stk] = $match_in_array;
			   }
			   else{
			       $indentrep_Array[$stk] = array();
			   }
			   
			   
			 }
			 //exit;
			
			}
			
			$relations = [
			'res' => $formfieldarray,  
			'sites' => $sitenames,
			'flats' => $flatres,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			'cost' => $existing_Rates,
			'apnarep' => $indentrep_Array,
			];   
     
		  return view('misfiles.advanceviews.misapnacomplex', $relations);

		
			}
			
	else if($reporttype == 'traffic_movement'){
		$segment3 = $year;
		$segment4 = $month;	
	
		$formfieldarray = array();
		$siteattrname = array();
		$flatres = array();
		$reportdate_val = "";
		$dateString = $segment3.'-'.$segment4.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$segment4."-".$segment3;

	      if(Auth::user()->id == 1){
	        $sitearr = explode(",",$selected_sites);
		  $sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$selected_sites);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
			
		  }
		  $existing_records = array();
		  $existing_Rates = array();
		  $exist_Sec = array();
		  
		
		  
		$relations = [  
			'res' => $formfieldarray, 
			'sites' => $siteattrname,
			'borewellsnum' => $borewellsnum,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			'existsec' => $exist_Sec,
			];    

		

		$matchfields = ['month' => $segment4, 'year' => $segment3]; 

		$res_count = \App\Trafficmisreport::where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Trafficmisreport::where($matchfields)->get();
			
			  $exist_Sec = array();
			  $exist_SecTwo = array();
			 if(count($formfieldarray) > 0){
			     foreach($formfieldarray as $fieldarr){
					
					 $exist_Sec['sites'][$fieldarr->site] = get_sitename($fieldarr->site);
					 $exist_Sec['resident_vehicle'][$fieldarr->site] = $fieldarr->resident_vehicle;
					 $exist_Sec['temp_vendors'][$fieldarr->site] = $fieldarr->temp_vendors;
					 $exist_Sec['courier_delivery'][$fieldarr->site] = $fieldarr->courier_delivery;
					 $exist_Sec['visitors'][$fieldarr->site] = $fieldarr->visitors;
					 $exist_Sec['construc_team'][$fieldarr->site] = $fieldarr->construc_team;
					 $exist_Sec['interworks_inflats'][$fieldarr->site] = $fieldarr->interworks_inflats;
					 $exist_Sec['interior_works_per_day'][$fieldarr->site] = $fieldarr->interior_works_per_day;  
					 $exist_Sec['ctotval'][$fieldarr->site] = (float)$fieldarr->resident_vehicle + (float)$fieldarr->temp_vendors + (float)$fieldarr->courier_delivery + (float)$fieldarr->visitors + (float)$fieldarr->construc_team + (float)$fieldarr->interworks_inflats + (float)$fieldarr->interior_works_per_day;
					 
					
					  
				 } 
				 
				//echo "<pre>"; print_r($exist_SecTwo);echo "</pre>";
			 }  
			 
			
			 
			 //exit;
			
			$relations = [
			'res' => $formfieldarray,  
			'sites' => $siteattrname,
			'borewellsnum' => $borewellsnum,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			'existsec' => $exist_Sec,
			];     
			  
		 }
		   else{
		        foreach($siteattrname as $kk => $arr){
				     $exist_Sec['sites'][$kk] = get_sitename($kk);
					 $exist_Sec['resident_vehicle'][$kk] = "";
					 $exist_Sec['temp_vendors'][$kk] = "";
					 $exist_Sec['courier_delivery'][$kk] = "";
					 $exist_Sec['visitors'][$kk] = "";
					 $exist_Sec['construc_team'][$kk] = "";
					 $exist_Sec['interworks_inflats'][$kk] = "";
					 $exist_Sec['interior_works_per_day'][$kk] = "";
					 $exist_Sec['ctotval'][$kk] = ""; 
				}
		   }
		   
		   	$relations = [
			'res' => $formfieldarray,  
			'sites' => $siteattrname,
			'borewellsnum' => $borewellsnum,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			'existsec' => $exist_Sec,
			];     

		  return view('misfiles.advanceviews.trafiicview', $relations);

		
			}

}


  //GET ADVANCE REPORTS PRINT
  
  // GET ADVANCED REPORTS
  
public function getadvanceprintReports(Request $request)

    {    
	
    $date= $request->fromdate; 
	$todate= $request->todate;
	$selected_sites= $request->sites;
	
	$reporttype = $request->reporttype;

	$datearr = explode("-",$date);
	$datetoarr =  explode("-",$todate);

	$month = $datearr[1];

	$year = $datearr[2];
	
	$tomonth = $datetoarr[1];

	$toyear = $datetoarr[2];
	 
	$to_day = $datetoarr[0];

	//$site = '5';
 

	$rdate = $year."-".$month."-".$datearr[0];
    $to_date_val = $toyear."-".$tomonth."-".$to_day;
			
	if($reporttype == 'metro_water') { 
		$segment3 = $year;
		$segment4 = $month; 
		$rdate = $year."-".$month."-".$datearr[0];
		
		$siteattrname = array();
		$flatres = array();
		$reportdate_val = "";
		$dateString = $segment3.'-'.$segment4.'-'.$datearr[0];
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $datetoarr[0]."-".$segment4."-".$segment3;
		$reportdatefrom_val = $datearr[0]."-".$segment4."-".$segment3;

	      if(Auth::user()->id == 1){
	      $sitearr = explode(",",$selected_sites);
		  $sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sites_count = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->count();
		  $sites_res_arr =\App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$selected_sites);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sites_count = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->count();
			$sites_res_arr =\App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  }
		  
		  $fromdate = $year."-".$month."-".$datearr[0];
		 // $fromdate = $segment3."-".$segment4."-"."1";
		  $todate = $segment3."-".$segment4."-".$lastdatearr[2];
		  
		/*  $sites_count = \App\Sites::whereIn('id', $sitearr)->count;
		  if($sites_count > 0){
		  	$sites_res_arr = \App\Sites::whereIn('id', $sitearr)->get()->pluck('name', 'id');
			foreach($sites_res_arr as $ke =>$site_res_row){
				
			}
			
		  } */
		  
		  // $sites_count = \App\Sites::count();
		  if($sites_count > 0){
		  	//$sites_res_arr =\App\Sites::get()->pluck('name', 'id');
			$sitear = array();
			
			$avgcon = array();
			$contracted = array();
			
			foreach($sites_res_arr as $ke =>$site_res_row){
			$getcontractedcount =  Dailyreportvalidation::
				where('site', '=', $ke)
				->count();
				 
				if($getcontractedcount>0){
				 $getcontractedRes =  Dailyreportvalidation::
				where('site', '=', $ke)
				->first(); 
				if(isset( $getcontractedRes->contracted_quantity_kl))
				$contracted[$ke] =  $getcontractedRes->contracted_quantity_kl;
				else $contracted[$ke] = "";
				 }
				  else{
				  $contracted[$ke] = "";
				  }     
				}
				   
			foreach($sites_res_arr as $ke =>$site_res_row){
				//echo $site_res_row;
				$avgres = "";
				for($i=$datearr[0];$i<=$datetoarr[0];$i++){
				$ondate = $segment3."-".$segment4."-".$i;
				$resultcn = Fmsdailyreport::
				where('reporton', '=', $ondate)
				->where('site', '=', $ke)
				->count();
				if($resultcn > 0){
				 $getsiteMetro =  Fmsdailyreport:: 
				  where('reporton', '=', $ondate)
				->where('site', '=', $ke)
				->first();
				  $avgres = (float)$avgres + (float)$getsiteMetro->wsp_metro; 
				}   
				
				}
				
				$avgcon[$ke] = $avgres;
			}
			  
			  $contractpercent = array();
			  
			
			
			
			   foreach($sites_res_arr as $ke =>$site_res_row){
			     $community[$ke] =$site_res_row;
			   }
			   $datek["community"] = $community;
			   $datek["average"] = $avgcon;   
			   $datek["concentrated"] = $contracted; 
			
			for($i=$datearr[0];$i<=$datetoarr[0];$i++){
			    $ondate = $segment3."-".$segment4."-".$i;
				$sitearrres = array();  
			    foreach($sites_res_arr as $ke =>$site_res_row){
				 
				$resultcn = Fmsdailyreport::
				where('reporton', '=', $ondate)
				->where('site', '=', $ke)
				->count();
				 if($resultcn > 0){
				 $getsiteMetro =  Fmsdailyreport::
				  where('reporton', '=', $ondate)
				->where('site', '=', $ke)
				->first();
				     $sitearrres[$ke] = $getsiteMetro->wsp_metro;
				  } 
				  else{
				   $sitearrres[$ke] = "";
				  }
				}
				
				$datekres[$ondate] = $sitearrres;
			}
			$datek["dateres"] = $datekres;
			
			//echo "<pre>"; print_r($datek); echo "</pre>"; exit;
			
			 foreach($contracted as $ke =>$cons_row){
			     if($cons_row > 0){
			     $contractpercent[$ke] =  ((float)(round((float)$avgcon[$ke]/count($datek["dateres"])) * 100) /(float)$cons_row);
				 }
				 else{
				  $contractpercent[$ke] = "";
				 }
				 
			   }
			   
			   $datek["persent"] = $contractpercent;
			
		  } 
		  
		  
		$relations = [  
			
			'sites' => $siteattrname,
			'flats' => $flatres,
			'reportfrom_on' => $reportdatefrom_val,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'sitearr' => $datek,
			
			];
			 
			// echo "<pre>"; print_r($datek); echo "</pre>";

		    return view('misfiles.advancedprints.metrowater', $relations);  
		  
		
		  
		  }
		  
		  else if($reporttype == 'water_consumption'){
		    
			
			
		
		
		  /* WATER CONSUMPTION */

		$segment3 = $year;
		$segment4 = $month; 
		
		$siteattrname = array();
		$flatres = array();
		$reportdate_val = "";
		$dateString = $segment3.'-'.$segment4.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$segment4."-".$segment3;
		$reportdatefrom_val = "1"."-".$segment4."-".$segment3;

	      if(Auth::user()->id == 1){
		    $sitearr = explode(",",$selected_sites);
		  $sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sites_count = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->count();
		  $sites_res_arr =\App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$selected_sites);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sites_count = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->count();
			$sites_res_arr =\App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }
		  
		  
		  $fromdate = $segment3."-".$segment4."-"."1";
		  $todate = $segment3."-".$segment4."-".$lastdatearr[2];
	
		  if($sites_count > 0){
		  	//$sites_res_arr =\App\Sites::get()->pluck('name', 'id');
			$sitear = array();
			
			$avgcon = array();
			$tankcon = array();
			$borewellcon = array();
			$contracted = array();
			$num_borewells = array();
			
			foreach($sites_res_arr as $ke =>$site_res_row){
			$getcontractedcount =  Dailyreportvalidation::
				where('site', '=', $ke)
				->count();
				 
				if($getcontractedcount>0){
				 $getcontractedRes =  Dailyreportvalidation::
				where('site', '=', $ke)
				->first(); 
				if(isset($getcontractedRes->contracted_quantity_kl))
				$contracted[$ke] =  $getcontractedRes->contracted_quantity_kl;
				else
				$contracted[$ke] = "";
				if(isset($getcontractedRes->borewellsnum))
				$num_borewells[$ke] =  $getcontractedRes->borewellsnum;
				else
				 $num_borewells[$ke] = "";
				 }
				  else{
				  $contracted[$ke] = "";
				   $num_borewells[$ke] = "";
				  }
				}
				   
			foreach($sites_res_arr as $ke =>$site_res_row){
				//echo $site_res_row;
				$avgres = "";
				$boresres = "";
				$tankeres = "";
				for($i=1;$i<=$lastdatearr[2];$i++){
				$ondate = $segment3."-".$segment4."-".$i;
				$resultcn = Fmsdailyreport::
				where('reporton', '=', $ondate)
				->where('site', '=', $ke)
				->count();
				if($resultcn > 0){
				 $getsiteMetro =  Fmsdailyreport::
				  where('reporton', '=', $ondate)
				->where('site', '=', $ke)
				->first();
				  $avgres = (float)$avgres + (float)$getsiteMetro->wsp_metro; 
				  $boresres = (float)$boresres + (float)$getsiteMetro->wsp_bores; 
				  $tankeres = (float)$tankeres + (float)$getsiteMetro->wsp_tankers; 
				}   
				
				}
				
				$avgcon[$ke] = $avgres;
				$tankcon[$ke] = $tankeres;
				$borewellcon[$ke] = $boresres;
			}
			
			
			// GET OCCUPANCY:
			  $occupancyarr= array();
			 foreach($sites_res_arr as $ke =>$site_res_row){
				//echo $site_res_row;
				$occres = "";
				$occcn = Occupancymisreport::
				where('month', '=', $segment4)
				->where('year', '=', $segment3)
				->where('site', '=', $ke)
				->count();
				if($occcn > 0){
				 $occres =  Occupancymisreport::
				where('month', '=', $segment4)
				->where('year', '=', $segment3)
				->where('site', '=', $ke)
				->first();
				  $occres = (float)$occres->tenants + (float)$occres->owners; 
				}  
				$occupancyarr[$ke] = $occres;
			}
			
			// END GET OCCUPANCY
			  
			  $contractpercent = array();
			  
			
			   foreach($sites_res_arr as $ke =>$site_res_row){
			     $community[$ke] =$site_res_row;
			   }
			   
			   //Number of bores notworking
			    $nwbrw_num = array();
			    foreach($sites_res_arr as $ke =>$site_res_row){
				  $ondate = $segment3."-".$segment4."-".$lastdatearr[2];
				$brnwcn = Fmsdailyreport::
				where('reporton', '=', $ondate)
				->where('site', '=', $ke)
				->count();
				 if($brnwcn > 0){
				 $brwnwres =  Fmsdailyreport::
				  where('reporton', '=', $ondate)
				->where('site', '=', $ke)
				->first();

				     $nwbrw_num[$ke] = $brwnwres->othser_gas_borewells;
				  } 
				  else{
				   $nwbrw_num[$ke] = "";
				  }
				}
			  
			
			for($i=1;$i<=$lastdatearr[2];$i++){
			    $ondate = $segment3."-".$segment4."-".$i;
			    foreach($sites_res_arr as $ke =>$site_res_row){
				 
				$resultcn = Fmsdailyreport::
				where('reporton', '=', $ondate)
				->where('site', '=', $ke)
				->count();
				 if($resultcn > 0){
				 $getsiteMetro =  Fmsdailyreport::
				  where('reporton', '=', $ondate)
				->where('site', '=', $ke)
				->first();
				     $sitearr[$ke] = $getsiteMetro->wsp_metro;
				  } 
				  else{
				   $sitearr[$ke] = "";
				  }
				}
				
				$datekres[$ondate] = $sitearr;
			}
			$datek["dateres"] = $datekres;
			
			//echo "<pre>"; print_r($datek); echo "</pre>"; exit;
			
			 foreach($contracted as $ke =>$cons_row){
			     if($cons_row > 0){
			     $contractpercent[$ke] =  ((float)(round((float)$avgcon[$ke]/count($datek["dateres"])) * 100) /(float)$cons_row);
				 }
				 else{
				  $contractpercent[$ke] = "";
				 }
				 
			   }
			   
			   $datek["persent"] = $contractpercent;
			
		  } 
		  
		  
		   $datek["community"] = $community;
			   $datek["average"] = $avgcon;   
			   $datek["concentrated"] = $contracted; 
		  
		$relations = [  
			
			'sites' => $siteattrname,
			'flats' => $flatres,
			'reportfrom_on' => $reportdatefrom_val,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'endoftheday'  => $lastdatearr[2],
			'concentrated' => $contracted,
			'average' => $avgcon,
			'occupancy' => $occupancyarr,
			'boresavg' => $borewellcon,
			'tankdavg' => $tankcon,
			'borewellsnum' => $num_borewells,
			'nwbrwnum' => $nwbrw_num,
			
			];   
			 
		  
		  /* END WATER CONSUMPTION */

		  ////return view('misfiles.view.watersourceconsumption', $relations);
		    return view('misfiles.advancedprints.watersourceconsumption', $relations);

			
		  }
		  
		   else if($reporttype == 'borewell_notworking'){
		     
		$segment3 = $year;
		$segment4 = $month;  
		
	
		$formfieldarray = array();
		$siteattrname = array();
		$flatres = array();
		$reportdate_val = "";
		$dateString = $segment3.'-'.$segment4.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$segment4."-".$segment3;

	      if(Auth::user()->id == 1){  
		  $sitearr = explode(",",$selected_sites);
		  $sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		  
		  }else{

			$role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$selected_sites);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site'); 
		  }
		  $existing_records = array();
		  $existing_Rates = array();
		  
		
		  
		$relations = [  
			'res' => $formfieldarray, 
			'sites' => $siteattrname,
			'borewellsnum' => $borewellsnum,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			];    

		

		$matchfields = ['month' => $segment4, 'year' => $segment3]; 

		$res_count = \App\Borewellsnwmisreport::where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Borewellsnwmisreport::where($matchfields)->get();
			
			
			 if(count($formfieldarray) > 0){
			     foreach($formfieldarray as $fieldarr){
				 	 $existing_records[$fieldarr->site] = array("id"=>$fieldarr->id,"nw_bores_num"=>$fieldarr->nw_bores_num,"no_ground_water"=>$fieldarr->no_ground_water,"over_load"=>$fieldarr->over_load,"motor_brunt"=>$fieldarr->motor_brunt,"cable_prblm"=>$fieldarr->cable_prblm,"pumpormotorwear"=>$fieldarr->pumpormotorwear,"others"=>$fieldarr->others,"dry_run_protectn"=>$fieldarr->dry_run_protectn,"flow_meter"=>$fieldarr->flow_meter,"remarks"=>$fieldarr->remarks);
				 }  
				 
				// echo "<pre>"; print_r($existing_records);echo "</pre>";
			 }  
			 
			 //exit;
			
			$relations = [
			'res' => $formfieldarray,  
			'sites' => $siteattrname,
			'borewellsnum' => $borewellsnum,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			];     
			 
		 }
	
		  return view('misfiles.advancedprints.borewellmis', $relations);
		   
		   }
		   else if($reporttype == 'fire_safe_status'){
		   
		   
		 
		$segment3 = $year;
		$segment4 = $month;
		
		$formfieldarray = array();
		$siteattrname = array();
		$flatres = array(); 
		$ref_overall = array();
		$ref_overall_temp = array();
		
		$reportdate_val = "";
		$dateString = $segment3.'-'.$segment4.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$segment4."-".$segment3;
		
		
		
		
		 if(Auth::user()->id == 1){
		   $sitearr = explode(",",$selected_sites);
		  $sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		  
		  }else{
		    
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$selected_sites);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		  }
		
		$matchfields = ['month' => $segment4, 'year' => $segment3]; 
		
		if(Auth::user()->id == 1){
		$res_count = \App\Firesafetymisreport::where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Firesafetymisreport::where($matchfields)->get();
		}
		
		}
		else
		{
		  $res_count = \App\Firesafetymisreport::whereIn('site', $sitearr)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Firesafetymisreport::whereIn('site', $sitearr)->where($matchfields)->get();
		}
		
		}
		
		$refid = array();
		/* GET REF ID*/
		if($formfieldarray){
		 foreach($formfieldarray as $formres){
		    $refid[$formres->site] = $formres->id;
		 }
		   
		 }
		 $issuecount = array();
		 $misresult = array();
		 $totalValues = array();
		  $ref_total = array();
		  if(count($refid) > 0){
		    $ref_overall = array();
			foreach($refid as $skey =>$ref){
			 $ref_a = array();
			
		  	$matchreffields = ['ref_id' => $ref, 'site' => $skey]; 
			$matchvalidfields = ['site' => $skey]; 
			
		    $tot_count = \App\Firesafedailyreportvalidation::where($matchvalidfields)->count();
			if($tot_count > 0){
				 $tot_ress = \App\Firesafedailyreportvalidation::where($matchvalidfields)->first();
				 $ref_total[$skey] = $tot_ress;
			} 
			$mismatchfields = ['month' => $segment4, 'year' => $segment3, 'site' =>$skey]; 
			
			$mismatchcount = \App\Firesafetymisreport::where($mismatchfields)->count();
			
			if($mismatchcount > 0){
				 $mismatch_ress = \App\Firesafetymisreport::where($mismatchfields)->first();
				 $misresult[$skey] = $mismatch_ress;
			} 
			
		  	$ref_count = \App\Firesafenotworkingissue::where($matchreffields)->count();
			if($ref_count > 0){
			   $ref_count_val = \App\Firesafenotworkingissue::where($matchreffields)->count(); 
			   $issuecount[$skey] = $ref_count_val;
			   $ref_record_val = \App\Firesafenotworkingissue::where($matchreffields)->get();
			   foreach($ref_record_val as $ref_rec){
			      $ref_a[] = $ref_rec;
			   } 
			         
			   $ref_overall[$skey] =  $ref_a;
			}
			else{
			   $issuecount[$skey] = 0;
			   $ref_overall[$skey]= 0;
			}
			
			//MODIFIED ARRAY
			$ref_a_temp = array();
			if($ref_count > 0){
			   $ref_record_temp_val = \App\Firesafenotworkingissue::where($matchreffields)->get();
			   foreach($ref_record_temp_val as $ref_temp_rec){
			      $ref_a_temp['category'][] = $ref_temp_rec->category;
				  $ref_a_temp['issue_des'][] = $ref_temp_rec->issue_des;
				  $ref_a_temp['root_cause'][] = $ref_temp_rec->root_cause;
				  $ref_a_temp['act_req_plan'][] = $ref_temp_rec->act_req_plan;
				  $ref_a_temp['pendingfromdays'][] = $ref_temp_rec->pendingfromdays;
				  $ref_a_temp['reponsibility'][] = $ref_temp_rec->reponsibility;
				  $ref_a_temp['notify_concern'][] = $ref_temp_rec->notify_concern;
			   } 
			         
			   $ref_overall_temp[$skey] =  $ref_a_temp;
			}
			else{
			 //  $issuecount[$skey] = 0;
			   //$ref_overall[$skey]= 0;
			   $ref_overall_temp[$skey] = 0;
			}

			 // END MODIFIED ARRAY
			
			}
		  }
		     arsort($issuecount);
			
		$relations = [
			'res' => $formfieldarray,  
			'sites' => $siteattrname,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'issues' => $ref_overall, 
			'issuecount' => $issuecount,
			'validation' => $ref_total, 
			'misres' => $misresult, 
			'issuetemp' => $ref_overall_temp,
			
			];     
			   		

		  return view('misfiles.advancedprints.misfiresaftey', $relations);

		
		   }
		   
		   else if($reporttype == 'electro_mechanical_equipment'){
		$segment3 = $year;
		$segment4 = $month;   
		
		$formfieldarray = array();
		$siteattrname = array();
		$flatres = array(); 
		$ref_overall = array();
		$ref_overall_temp = array();
		
		$reportdate_val = "";
		$dateString = $segment3.'-'.$segment4.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$segment4."-".$segment3;
		
		
		
		
		 if(Auth::user()->id == 1){
		  $sitearr = explode(",",$selected_sites);
		  $sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		    
		  }else{
			
			$role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$selected_sites);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
			
		  }
		
		$matchfields = ['month' => $segment4, 'year' => $segment3]; 
		
		if(Auth::user()->id == 1){
		$res_count = \App\Equipmentmisreport::where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Equipmentmisreport::where($matchfields)->get();
		}
		
		}
		else
		{
		  $res_count = \App\Equipmentmisreport::whereIn('site', $sitearr)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Equipmentmisreport::whereIn('site', $sitearr)->where($matchfields)->get();
		}
		
		}
		
		$refid = array();
		/* GET REF ID*/
		if($formfieldarray){
		 foreach($formfieldarray as $formres){
		    $refid[$formres->site] = $formres->id;
		 }
		   
		 }
		 $issuecount = array();
		 $misresult = array();
		 $totalValues = array();
		  $ref_total = array();
		  if(count($refid) > 0){
		    $ref_overall = array();
			foreach($refid as $skey =>$ref){
			 $ref_a = array();
			
		  	$matchreffields = ['ref_id' => $ref, 'site' => $skey]; 
			$matchvalidfields = ['site' => $skey]; 
			
		    $tot_count = \App\Dailyreportvalidation::where($matchvalidfields)->count();
			if($tot_count > 0){
				 $tot_ress = \App\Dailyreportvalidation::where($matchvalidfields)->first();
				 $ref_total[$skey] = $tot_ress;
			} 
			$mismatchfields = ['month' => $segment4, 'year' => $segment3, 'site' =>$skey]; 
			
			$mismatchcount = \App\Equipmentmisreport::where($mismatchfields)->count();
			
			if($mismatchcount > 0){ 
				 $mismatch_ress = \App\Equipmentmisreport::where($mismatchfields)->first();
				 $misresult[$skey] = $mismatch_ress;
			} 
			
		  	$ref_count = \App\Equipmentnotworkingissue::where($matchreffields)->count();
			if($ref_count > 0){
			   $ref_count_val = \App\Equipmentnotworkingissue::where($matchreffields)->count(); 
			   $issuecount[$skey] = $ref_count_val;
			   $ref_record_val = \App\Equipmentnotworkingissue::where($matchreffields)->get();
			   foreach($ref_record_val as $ref_rec){
			      $ref_a[] = $ref_rec;
			   } 
			         
			   $ref_overall[$skey] =  $ref_a;
			}
			else{
			   $issuecount[$skey] = 0;
			   $ref_overall[$skey]= 0;
			}
			
			//MODIFIED ARRAY
			$ref_a_temp = array();
			if($ref_count > 0){
			   $ref_record_temp_val = \App\Equipmentnotworkingissue::where($matchreffields)->get();
			   foreach($ref_record_temp_val as $ref_temp_rec){
			      $ref_a_temp['category'][] = $ref_temp_rec->category;
				  $ref_a_temp['issue_des'][] = $ref_temp_rec->issue_des;
				  $ref_a_temp['root_cause'][] = $ref_temp_rec->root_cause;
				  $ref_a_temp['act_req_plan'][] = $ref_temp_rec->act_req_plan;
				  $ref_a_temp['pendingfromdays'][] = $ref_temp_rec->pendingfromdays;
				  $ref_a_temp['reponsibility'][] = $ref_temp_rec->reponsibility;
				  $ref_a_temp['notify_concern'][] = $ref_temp_rec->notify_concern;
			   } 
			          
			   $ref_overall_temp[$skey] =  $ref_a_temp;
			}
			else{
			 //  $issuecount[$skey] = 0;
			   //$ref_overall[$skey]= 0;
			   $ref_overall_temp[$skey] = 0;
			}

			 // END MODIFIED ARRAY
			
			}
		  }
		     arsort($issuecount);
			 
			 /*echo "<pre>";
			   print_r($ref_overall_temp);
			 echo "</pre>"; exit; */
		
		$relations = [
			'res' => $formfieldarray,  
			'sites' => $siteattrname,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'issues' => $ref_overall, 
			'issuecount' => $issuecount,
			'validation' => $ref_total, 
			'misres' => $misresult, 
			'issuetemp' => $ref_overall_temp,
			
			];     
			   		
  
		  //return view('misfiles.view.misfiresaftey', $relations);

		

		  return view('misfiles.advancedprints.miselectromechanical', $relations);

		
		     
		   }
		   
		    else if($reporttype == 'stp_status'){
			   
	    $segment3 = $year;
		$segment4 = $month;  
		
		$formfieldarray = array();
		$siteattrname = array();
		$flatres = array(); 
		$ref_overall = array();
		$ref_overall_temp = array();
		
		$reportdate_val = "";
		$dateString = $segment3.'-'.$segment4.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$segment4."-".$segment3;
		
		
		
		
		 if(Auth::user()->id == 1){
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
			
		  }
		
		$matchfields = ['month' => $segment4, 'year' => $segment3]; 
		
		if(Auth::user()->id == 1){
		$res_count = \App\Stpmisreport::where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Stpmisreport::where($matchfields)->get();
		}
		
		}
		else
		{
		  $res_count = \App\Stpmisreport::whereIn('site', $sitearr)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Stpmisreport::whereIn('site', $sitearr)->where($matchfields)->get();
		}
		
		}
		
		$refid = array();
		/* GET REF ID*/
		if($formfieldarray){
		 foreach($formfieldarray as $formres){
		    $refid[$formres->site] = $formres->id;
		 }
		   
		 }
		 $issuecount = array(); 
		 $misresult = array();
		 $totalValues = array();
		  $ref_total = array();
		  if(count($refid) > 0){
		    $ref_overall = array();
			foreach($refid as $skey =>$ref){
			 $ref_a = array();
			
		  	$matchreffields = ['ref_id' => $ref, 'site' => $skey]; 
			$matchvalidfields = ['site' => $skey]; 
			
		    $tot_count = \App\Dailyreportvalidation::where($matchvalidfields)->count();
			if($tot_count > 0){
				 $tot_ress = \App\Dailyreportvalidation::where($matchvalidfields)->first();
				 $ref_total[$skey] = $tot_ress;
			} 
			$mismatchfields = ['month' => $segment4, 'year' => $segment3, 'site' =>$skey]; 
			
			$mismatchcount = \App\Stpmisreport::where($mismatchfields)->count();
			
			if($mismatchcount > 0){ 
				 $mismatch_ress = \App\Stpmisreport::where($mismatchfields)->first();
				 $misresult[$skey] = $mismatch_ress;
			} 
			
		  	$ref_count = \App\Stpnotworkingissue::where($matchreffields)->count();
			if($ref_count > 0){
			   $ref_count_val = \App\Stpnotworkingissue::where($matchreffields)->count(); 
			   $issuecount[$skey] = $ref_count_val;
			   $ref_record_val = \App\Stpnotworkingissue::where($matchreffields)->get();
			   foreach($ref_record_val as $ref_rec){
			      $ref_a[] = $ref_rec;
			   } 
			         
			   $ref_overall[$skey] =  $ref_a;
			}
			else{
			   $issuecount[$skey] = 0;
			   $ref_overall[$skey]= 0;
			}
			
			//MODIFIED ARRAY
			$ref_a_temp = array();
			if($ref_count > 0){
			   $ref_record_temp_val = \App\Stpnotworkingissue::where($matchreffields)->get();
			   foreach($ref_record_temp_val as $ref_temp_rec){
			      $ref_a_temp['category'][] = $ref_temp_rec->category;
				  $ref_a_temp['issue_des'][] = $ref_temp_rec->issue_des;
				  $ref_a_temp['root_cause'][] = $ref_temp_rec->root_cause;
				  $ref_a_temp['act_req_plan'][] = $ref_temp_rec->act_req_plan;
				  $ref_a_temp['pendingfromdays'][] = $ref_temp_rec->pendingfromdays;
				  $ref_a_temp['reponsibility'][] = $ref_temp_rec->reponsibility;
				  $ref_a_temp['notify_concern'][] = $ref_temp_rec->notify_concern;
			   } 
			          
			   $ref_overall_temp[$skey] =  $ref_a_temp;
			}
			else{
			 //  $issuecount[$skey] = 0;
			   //$ref_overall[$skey]= 0;
			   $ref_overall_temp[$skey] = 0;
			}

			 // END MODIFIED ARRAY
			
			}
		  }
		     arsort($issuecount);
			 
			 /*echo "<pre>";
			   print_r($ref_overall_temp);
			 echo "</pre>"; exit; */
		
		$relations = [
			'res' => $formfieldarray,  
			'sites' => $siteattrname,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'issues' => $ref_overall, 
			'issuecount' => $issuecount,
			'validation' => $ref_total, 
			'misres' => $misresult, 
			'issuetemp' => $ref_overall_temp,
			
			];     
			   		

		  return view('misfiles.advancedprints.stpstatus', $relations);

		  
			}
			
			else if($reporttype == 'wsp_status'){
			
			 $segment3 = $year;
		$segment4 = $month;  
		
		
		$formfieldarray = array();
		$siteattrname = array();
		$flatres = array(); 
		$ref_overall = array();
		$ref_overall_temp = array();
		
		$reportdate_val = "";
		$dateString = $segment3.'-'.$segment4.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$segment4."-".$segment3;
		
		
		
		
		 if(Auth::user()->id == 1){
		   $sitearr = explode(",",$selected_sites);
		  $sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');	  
		  }else{
			$role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$selected_sites);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
			
		  }
		
		$matchfields = ['month' => $segment4, 'year' => $segment3]; 
		
		if(Auth::user()->id == 1){
		$res_count = \App\Wspmisreport::where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Wspmisreport::where($matchfields)->get();
		}
		
		}
		else
		{
		  $res_count = \App\Wspmisreport::whereIn('site', $sitearr)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Wspmisreport::whereIn('site', $sitearr)->where($matchfields)->get();
		}
		
		}
		
		$refid = array();
		/* GET REF ID*/
		if($formfieldarray){
		 foreach($formfieldarray as $formres){
		    $refid[$formres->site] = $formres->id;
		 }
		   
		 }
		 $issuecount = array(); 
		 $misresult = array();
		 $totalValues = array();
		  $ref_total = array();
		  if(count($refid) > 0){
		    $ref_overall = array();
			foreach($refid as $skey =>$ref){
			 $ref_a = array();
			
		  	$matchreffields = ['ref_id' => $ref, 'site' => $skey]; 
			$matchvalidfields = ['site' => $skey]; 
			
		    $tot_count = \App\Dailyreportvalidation::where($matchvalidfields)->count();
			if($tot_count > 0){
				 $tot_ress = \App\Dailyreportvalidation::where($matchvalidfields)->first();
				 $ref_total[$skey] = $tot_ress;
			} 
			$mismatchfields = ['month' => $segment4, 'year' => $segment3, 'site' =>$skey]; 
			
			$mismatchcount = \App\Wspmisreport::where($mismatchfields)->count();
			
			if($mismatchcount > 0){ 
				 $mismatch_ress = \App\Wspmisreport::where($mismatchfields)->first();
				 $misresult[$skey] = $mismatch_ress;
			} 
			
		  	$ref_count = \App\Wspnotworkingissue::where($matchreffields)->count();
			if($ref_count > 0){
			   $ref_count_val = \App\Wspnotworkingissue::where($matchreffields)->count(); 
			   $issuecount[$skey] = $ref_count_val;
			   $ref_record_val = \App\Wspnotworkingissue::where($matchreffields)->get();
			   foreach($ref_record_val as $ref_rec){
			      $ref_a[] = $ref_rec;
			   } 
			         
			   $ref_overall[$skey] =  $ref_a;
			}
			else{
			   $issuecount[$skey] = 0;
			   $ref_overall[$skey]= 0;
			}
			
			//MODIFIED ARRAY
			$ref_a_temp = array();
			if($ref_count > 0){
			   $ref_record_temp_val = \App\Wspnotworkingissue::where($matchreffields)->get();
			   foreach($ref_record_temp_val as $ref_temp_rec){
			      $ref_a_temp['category'][] = $ref_temp_rec->category;
				  $ref_a_temp['issue_des'][] = $ref_temp_rec->issue_des;
				  $ref_a_temp['root_cause'][] = $ref_temp_rec->root_cause;
				  $ref_a_temp['act_req_plan'][] = $ref_temp_rec->act_req_plan;
				  $ref_a_temp['pendingfromdays'][] = $ref_temp_rec->pendingfromdays;
				  $ref_a_temp['reponsibility'][] = $ref_temp_rec->reponsibility;
				  $ref_a_temp['notify_concern'][] = $ref_temp_rec->notify_concern;
			   } 
			          
			   $ref_overall_temp[$skey] =  $ref_a_temp;
			}
			else{
			 //  $issuecount[$skey] = 0;
			   //$ref_overall[$skey]= 0;
			   $ref_overall_temp[$skey] = 0;
			}

			 // END MODIFIED ARRAY
			
			}
		  }
		     arsort($issuecount);
			 
			 /*echo "<pre>";
			   print_r($ref_overall_temp);
			 echo "</pre>"; exit; */
		
		$relations = [
			'res' => $formfieldarray,  
			'sites' => $siteattrname,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'issues' => $ref_overall, 
			'issuecount' => $issuecount,
			'validation' => $ref_total, 
			'misres' => $misresult, 
			'issuetemp' => $ref_overall_temp,
			
			];     
			   		
		  return view('misfiles.advancedprints.wspstatus', $relations);

		
			 
			}
			
		else if($reporttype == 'security_report'){

        $segment3 = $year;
		$segment4 = $month;
		
		$formfieldarray = array();
		$siteattrname = array();
		$flatres = array();
		$reportdate_val = "";
		$dateString = $segment3.'-'.$segment4.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$segment4."-".$segment3;

	      if(Auth::user()->id == 1){
	     
		    $sitearr = explode(",",$selected_sites);
		  $sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		  
		  }else{

            $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$selected_sites);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		
		  }
		  $existing_records = array();
		  $existing_Rates = array();
		  
		
		  
		$relations = [  
			'res' => $formfieldarray, 
			'sites' => $siteattrname,
			'borewellsnum' => $borewellsnum,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			];    

		

		$matchfields = ['month' => $segment4, 'year' => $segment3]; 

		$res_count = \App\Securitymisreport::where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Securitymisreport::where($matchfields)->get();
			
			  $exist_Sec = array();
			  $exist_SecTwo = array();
			 if(count($formfieldarray) > 0){
			     foreach($formfieldarray as $fieldarr){
				 	 $existing_records[$fieldarr->site] = array("id"=>$fieldarr->id,"guards"=>$fieldarr->guards,"l_guards"=>$fieldarr->l_guards,"h_guards"=>$fieldarr->h_guards,"supervisors"=>$fieldarr->supervisors,"aso"=>$fieldarr->aso,"so_num"=>$fieldarr->so_num,"nalla_gandla_hub"=>$fieldarr->nalla_gandla_hub,"hillpark_hub"=>$fieldarr->hillpark_hub);
					 
					 
							$current_month=$segment4;
							$current_year=$segment3;
							if($current_month==1)
							{
								$lastmonth=12;
								$lastyear = $current_year - 1;
							}
							else 
							{
								$lastmonth=$current_month-1;
								$lastyear = $current_year;
							} 
							$lastdateofmonth=date('t',$lastmonth);
							$report_on_date = $lastyear."-".$lastmonth."-".$lastdateofmonth;
							$security_match_fields = ['site' => $fieldarr->site,'reporton' => $report_on_date];
							$prev_sec_report_cn = \App\Securitydailyreport::where($security_match_fields)->count();
							 
							$eqpmatchfields = ['site' => $fieldarr->site]; 
							$equipcn = \App\Securitydailyreportvalidation::where($eqpmatchfields)->count();
							 if($equipcn > 0){
								$equipvalidation = \App\Securitydailyreportvalidation::where($eqpmatchfields)->first();
					          } 
					 
					 if(($fieldarr->site == 5 || $fieldarr->site == 6 || $fieldarr->site == 7 || $fieldarr->site == 8 || $fieldarr->site ==10 || $fieldarr->site ==14 || $fieldarr->site ==17 || $fieldarr->site == 16) &&  in_array($fieldarr->site, $sitearr)) {
					 $exist_Sec['sites'][$fieldarr->site] = get_sitename($fieldarr->site);
					 $exist_Sec['guards'][$fieldarr->site] = $fieldarr->guards;
					 $exist_Sec['l_guards'][$fieldarr->site] = $fieldarr->l_guards;
					 $exist_Sec['h_guards'][$fieldarr->site] = $fieldarr->h_guards;
					 $exist_Sec['supervisors'][$fieldarr->site] = $fieldarr->supervisors;
					 $exist_Sec['aso'][$fieldarr->site] = $fieldarr->aso;
					 $exist_Sec['so_num'][$fieldarr->site] = $fieldarr->so_num;
					 $exist_Sec['ctotval'][$fieldarr->site] = (float)$fieldarr->guards + (float)$fieldarr->l_guards + (float)$fieldarr->h_guards + (float)$fieldarr->supervisors + (float)$fieldarr->aso + (float)$fieldarr->so_num;
					 
					 $exist_Sec['nalla_gandla_hub'][$fieldarr->site] = $fieldarr->nalla_gandla_hub;
					 $exist_Sec['hillpark_hub'][$fieldarr->site] = $fieldarr->hillpark_hub;
					 /*if($prev_sec_report_cn > 0){
							$prev_sec_report = \App\Securitydailyreport::where($security_match_fields)->first();
					  $exist_Sec['wlkt'][$fieldarr->site]	= $prev_sec_report['nw_wt']."/".$equipvalidation['wt'];
					  $exist_Sec['torch'][$fieldarr->site]	= $prev_sec_report['nw_torch']."/".$equipvalidation['torches'];
					  $exist_Sec['biometric'][$fieldarr->site]	= $prev_sec_report['nw_bio']."/".$equipvalidation['biomachine'];
					  }  */
					  
					  if($prev_sec_report_cn > 0){
							$prev_sec_report = \App\Securitydailyreport::where($security_match_fields)->first();
					  if($prev_sec_report['nw_wt']) $exist_Sec['wlkt'][$fieldarr->site]	= $prev_sec_report['nw_wt']."/".$equipvalidation['wt']; else $exist_Sec['wlkt'][$fieldarr->site]	= "0"."/".$equipvalidation['wt'];
					 if($prev_sec_report['nw_torch']) $exist_Sec['torch'][$fieldarr->site]	= $prev_sec_report['nw_torch']."/".$equipvalidation['torches']; else $exist_Sec['torch'][$fieldarr->site]	= "0"."/".$equipvalidation['torches'];
					  if($prev_sec_report['nw_bio']) $exist_Sec['biometric'][$fieldarr->site]	= $prev_sec_report['nw_bio']."/".$equipvalidation['biomachine']; else $exist_Sec['biometric'][$fieldarr->site]	= "0"."/".$equipvalidation['biomachine'];
					  }  
					  
					  else
					  {
					     $exist_Sec['wlkt'][$fieldarr->site]	= "0"."/".$equipvalidation['wt'];
						 $exist_Sec['torch'][$fieldarr->site]	= "0"."/".$equipvalidation['torches'];
						 $exist_Sec['biometric'][$fieldarr->site]	= "0"."/".$equipvalidation['biomachine'];
					  }
					  
					  $exist_Sec['computer'][$fieldarr->site]	= $equipvalidation['computers'];
					  $exist_Sec['internetcon'][$fieldarr->site]	= $equipvalidation['internetcon'];
					  $exist_Sec['batons'][$fieldarr->site]	= $equipvalidation['av_batons'];
					  $exist_Sec['stlights'][$fieldarr->site]	= $equipvalidation['street_lights'];
					  $exist_Sec['bicycle'][$fieldarr->site]	= $equipvalidation['bicycle'];
							
					 } else if(($fieldarr->site == 9 || $fieldarr->site == 11 || $fieldarr->site == 12 || $fieldarr->site == 13 || $fieldarr->site ==15 || $fieldarr->site ==18 || $fieldarr->site ==19 || $fieldarr->site == 20) &&  in_array($fieldarr->site, $sitearr)) {
					 
					  $exist_SecTwo['sites'][$fieldarr->site] = get_sitename($fieldarr->site);
					 $exist_SecTwo['guards'][$fieldarr->site] = $fieldarr->guards;
					 $exist_SecTwo['l_guards'][$fieldarr->site] = $fieldarr->l_guards;
					 $exist_SecTwo['h_guards'][$fieldarr->site] = $fieldarr->h_guards;
					 $exist_SecTwo['supervisors'][$fieldarr->site] = $fieldarr->supervisors;
					 $exist_SecTwo['aso'][$fieldarr->site] = $fieldarr->aso;
					 $exist_SecTwo['so_num'][$fieldarr->site] = $fieldarr->so_num;
					 
					  $exist_SecTwo['ctotval'][$fieldarr->site] = (float)$fieldarr->guards + (float)$fieldarr->l_guards + (float)$fieldarr->h_guards + (float)$fieldarr->supervisors + (float)$fieldarr->aso + (float)$fieldarr->so_num;
					  
					 $exist_SecTwo['nalla_gandla_hub'][$fieldarr->site] = $fieldarr->nalla_gandla_hub;
					 $exist_SecTwo['hillpark_hub'][$fieldarr->site] = $fieldarr->hillpark_hub;
					  if($prev_sec_report_cn > 0){
							$prev_sec_report = \App\Securitydailyreport::where($security_match_fields)->first();
					  if($prev_sec_report['nw_wt']) $exist_SecTwo['wlkt'][$fieldarr->site]	= $prev_sec_report['nw_wt']."/".$equipvalidation['wt']; else $exist_SecTwo['wlkt'][$fieldarr->site]	= "0"."/".$equipvalidation['wt'];
					 if($prev_sec_report['nw_torch']) $exist_SecTwo['torch'][$fieldarr->site]	= $prev_sec_report['nw_torch']."/".$equipvalidation['torches']; else $exist_SecTwo['torch'][$fieldarr->site]	= "0"."/".$equipvalidation['torches'];
					  if($prev_sec_report['nw_bio']) $exist_SecTwo['biometric'][$fieldarr->site]	= $prev_sec_report['nw_bio']."/".$equipvalidation['biomachine']; else $exist_SecTwo['biometric'][$fieldarr->site]	= "0"."/".$equipvalidation['biomachine'];
					  }  
					  
					  else
					  {
					     $exist_SecTwo['wlkt'][$fieldarr->site]	= "0"."/".$equipvalidation['wt'];
						 $exist_SecTwo['torch'][$fieldarr->site]	= "0"."/".$equipvalidation['torches'];
						 $exist_SecTwo['biometric'][$fieldarr->site]	= "0"."/".$equipvalidation['biomachine'];
					  }
					  $exist_SecTwo['computer'][$fieldarr->site]	= $equipvalidation['computers'];
					  $exist_SecTwo['internetcon'][$fieldarr->site]	= $equipvalidation['internetcon'];
					  $exist_SecTwo['batons'][$fieldarr->site]	= $equipvalidation['av_batons'];
					  $exist_SecTwo['stlights'][$fieldarr->site]	= $equipvalidation['street_lights'];
					  $exist_SecTwo['bicycle'][$fieldarr->site]	= $equipvalidation['bicycle'];
					    
					 }
				 } 
				 
				//echo "<pre>"; print_r($exist_SecTwo);echo "</pre>";
			 }  
			 
			 //exit;
			
			$relations = [
			'res' => $formfieldarray,  
			'sites' => $siteattrname,
			'borewellsnum' => $borewellsnum,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			'existsec' => $exist_Sec,
			'existsectwo' => $exist_SecTwo,
			];     
			  
		 }

		  return view('misfiles.advancedprints.missecurityone', $relations);

		
		}
		
	  else if($reporttype == 'house_keeping_report'){
			 
		$segment3 = $year;
		$segment4 = $month;  	   
	
		$formfieldarray = array();
		$siteattrname = array();
		$flatres = array();
		$reportdate_val = "";
		$dateString = $segment3.'-'.$segment4.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$segment4."-".$segment3;

	       if(Auth::user()->id == 1){
		    $sitearr = explode(",",$selected_sites);
		  $sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		   
		  }else{ 
		  
		   $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$selected_sites);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
			
		  }
		  
		  $existing_records = array();
		  $existing_Rates = array();
		  $deployment = array();
		  
		  $getratescn =  \App\Pmsdailyreportvalidation::count();
		  if($getratescn > 0){
		     $getratesRes =  \App\Pmsdailyreportvalidation::get();
			  foreach($getratesRes as $rate){
			   $existing_Rates[$rate->site] = array("one_bhk"=>$rate->one_bhk,"two_bhk"=>$rate->two_bhk,"three_bhk"=>$rate->three_bhk,"four_bhk"=>$rate->four_bhk);
			  }
		  } 
		  
		
			
        foreach($siteattrname as $dep => $deploy){
		   $deppmatchfields = ['site' => $dep];
		   $deprescn = \App\Pmsdailyreportvalidation::where($deppmatchfields)->count();
		   if($deprescn > 0){
		   		$depresult = \App\Pmsdailyreportvalidation::where($deppmatchfields)->first();
				//$deployment['deployment'][$dep] = (float)$depresult['house_sup'] + (float)$depresult['house_help'] + (float)$depresult['clu_hs_fo'] +  (float)$depresult['clu_hs_hk'] +  (float)$depresult['other'];
				$deployment['deployment'][$dep] =  (float)$depresult['house_help'] + (float)$depresult['clu_hs_hk'];
			} 	else{
			   $deployment['deployment'][$dep] = 0;
			}
		  }

		$matchfields = ['month' => $segment4, 'year' => $segment3]; 

		$res_count = \App\Housekpmisreport::where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Housekpmisreport::where($matchfields)->get();
				// echo "<pre>"; print_r($existing_records);echo "</pre>";
			 //exit; 
			 $existing_records = array();
			 foreach($formfieldarray  as $existing){
			    $existing_records[$existing['site']] = $existing;
			 }
			
		  }
		  
		  $relations = [
			'res' => $formfieldarray,  
			'sites' => $siteattrname,
			'flats' => $flatres,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			'cost' => $existing_Rates,
			'deployment' => $deployment, 
			];     

		  return view('misfiles.advancedprints.mishousekeeping', $relations);

			}
			
			else if($reporttype == 'horticulture_report'){
			
	   $segment3 = $year;
		$segment4 = $month;  
			
		$formfieldarray = array();
		$siteattrname = array();
		$flatres = array();
		$reportdate_val = "";
		$dateString = $segment3.'-'.$segment4.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$segment4."-".$segment3;

	       if(Auth::user()->id == 1){
		  $sitearr = explode(",",$selected_sites);
		  $sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		   
		  }else{ 
		  
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$selected_sites);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
			
		  }
		  
		  $existing_records = array();
		  $existing_records_two = array();
		  $existing_records_three = array();
		  $existing_Rates = array();
		  $deployment = array();
		  
		  $getratescn =  \App\Pmsdailyreportvalidation::count();
		  if($getratescn > 0){
		     $getratesRes =  \App\Pmsdailyreportvalidation::get();
			  foreach($getratesRes as $rate){
			   $existing_Rates[$rate->site] = array("one_bhk"=>$rate->one_bhk,"two_bhk"=>$rate->two_bhk,"three_bhk"=>$rate->three_bhk,"four_bhk"=>$rate->four_bhk);
			  }
		  } 
		  
			
        foreach($siteattrname as $dep => $deploy){
		   $deppmatchfields = ['site' => $dep];
		   $deprescn = \App\Pmsdailyreportvalidation::where($deppmatchfields)->count();
		   if($deprescn > 0){
		   		$depresult = \App\Pmsdailyreportvalidation::where($deppmatchfields)->first();
				//$deployment['deployment'][$dep] = (float)$depresult['house_sup'] + (float)$depresult['house_help'] + (float)$depresult['clu_hs_fo'] +  (float)$depresult['clu_hs_hk'] +  (float)$depresult['other'];
				$deployment['deployment'][$dep] =  (float)$depresult['house_help'] + (float)$depresult['clu_hs_hk'];
			} 	else{
			   $deployment['deployment'][$dep] = 0;
			}
		  }

		$matchfields = ['month' => $segment4, 'year' => $segment3]; 

		$res_count = \App\Horticulturemisreport::where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Horticulturemisreport::where($matchfields)->get();
				// echo "<pre>"; print_r($existing_records);echo "</pre>";
			 //exit; 
			 $existing_records = array();
			 foreach($formfieldarray  as $existing){
			 
			    
			    $existing_records['varmicompost'][$existing['site']] = $existing['varmicompost'];
				$existing_records['chloropyriphos'][$existing['site']] = $existing['chloropyriphos'];
				$existing_records['monocrotophos'][$existing['site']] = $existing['monocrotophos'];
				$existing_records['monocrotophos'][$existing['site']] = $existing['monocrotophos'];
				$existing_records['imidaclopride'][$existing['site']] = $existing['imidaclopride'];
				$existing_records['bavistin'][$existing['site']] = $existing['bavistin'];
				$existing_records['dhanvit'][$existing['site']] = $existing['dhanvit'];
				$existing_records['multiplex'][$existing['site']] = $existing['multiplex'];
				$existing_records['furadon'][$existing['site']] = $existing['furadon'];
				$existing_records['phorate'][$existing['site']] = $existing['phorate'];
				$existing_records['nineteenkgs'][$existing['site']] = $existing['nineteenkgs'];
				$existing_records['nineteenkgssoluble'][$existing['site']] = $existing['nineteenkgssoluble'];
				$existing_records['acephate'][$existing['site']] = $existing['acephate'];
				$existing_records['seventeenkgs'][$existing['site']] = $existing['seventeenkgs'];
				$existing_records['urea'][$existing['site']] = $existing['urea'];
				$existing_records['potash'][$existing['site']] = $existing['potash'];
				$existing_records['rogar'][$existing['site']] = $existing['rogar'];
				$existing_records['malathian'][$existing['site']] = $existing['malathian'];
				$existing_records['fouate'][$existing['site']] = $existing['fouate'];
				$existing_records['fifteenkgs'][$existing['site']] = $existing['fifteenkgs'];
				$existing_records['twofourdkgs'][$existing['site']] = $existing['twofourdkgs'];
				$existing_records['glycil'][$existing['site']] = $existing['glycil'];
				$existing_records['sixteenkgs'][$existing['site']] = $existing['sixteenkgs'];
				$existing_records['arrowltrs'][$existing['site']] = $existing['arrowltrs'];
				$existing_records['biowetltrs'][$existing['site']] = $existing['biowetltrs'];
				$existing_records['blitaxkgs'][$existing['site']] = $existing['blitaxkgs'];
				$existing_records['twentykgs'][$existing['site']] = $existing['twentykgs'];
				
				
				
				
			 }
			
		  }
		  
		  foreach($siteattrname as $sk => $sitena){
		  
		    $matchhuskpfields = ['month' => $segment4, 'year' => $segment3, 'site' => $sk];
			 $hsk_count = \App\Horticulturemisreport::where($matchhuskpfields)->count();
			 if($hsk_count > 0){
			 	$hsk_arr = \App\Horticulturemisreport::where($matchfields)->first();
				
				$existing_records['varmicompost'][$sk] = $hsk_arr['varmicompost'];
				$existing_records['chloropyriphos'][$sk] = $hsk_arr['chloropyriphos'];
				$existing_records['monocrotophos'][$sk] = $hsk_arr['monocrotophos'];
				$existing_records['imidaclopride'][$sk] = $hsk_arr['imidaclopride'];
				$existing_records['bavistin'][$sk] = $hsk_arr['bavistin'];
				$existing_records['dhanvit'][$sk] = $hsk_arr['dhanvit'];
				$existing_records['multiplex'][$sk] = $hsk_arr['multiplex'];
				$existing_records['furadon'][$sk] = $hsk_arr['furadon'];
				$existing_records['phorate'][$sk] = $hsk_arr['phorate'];
				$existing_records['nineteenkgs'][$sk] = $hsk_arr['nineteenkgs'];
				$existing_records['nineteenkgssoluble'][$sk] = $hsk_arr['nineteenkgssoluble'];
				$existing_records['acephate'][$sk] = $hsk_arr['acephate'];
				$existing_records['seventeenkgs'][$sk] = $hsk_arr['seventeenkgs'];
				$existing_records['urea'][$sk] = $hsk_arr['urea'];
				$existing_records['potash'][$sk] = $hsk_arr['potash'];
				$existing_records['rogar'][$sk] = $hsk_arr['rogar'];
				$existing_records['malathian'][$sk] = $hsk_arr['malathian'];
				$existing_records['fouate'][$sk] = $hsk_arr['fouate'];
				$existing_records['fifteenkgs'][$sk] = $hsk_arr['fifteenkgs'];
				$existing_records['twofourdkgs'][$sk] = $hsk_arr['twofourdkgs'];
				$existing_records['glycil'][$sk] = $hsk_arr['glycil'];
				$existing_records['sixteenkgs'][$sk] = $hsk_arr['sixteenkgs'];
				$existing_records['arrowltrs'][$sk] = $hsk_arr['arrowltrs'];
				$existing_records['biowetltrs'][$sk] = $hsk_arr['biowetltrs'];
				$existing_records['blitaxkgs'][$sk] = $hsk_arr['blitaxkgs'];
				$existing_records['twentykgs'][$sk] = $hsk_arr['twentykgs'];
				
			 }
			 else
			 {
			    $existing_records['varmicompost'][$sk] = "";
				$existing_records['chloropyriphos'][$sk] = "";
				$existing_records['monocrotophos'][$sk] = "";
				$existing_records['imidaclopride'][$sk] = "";
				$existing_records['bavistin'][$sk] = "";
				$existing_records['dhanvit'][$sk] = "";
				$existing_records['multiplex'][$sk] = "";
				$existing_records['furadon'][$sk] = "";
				$existing_records['phorate'][$sk] = "";
				$existing_records['nineteenkgs'][$sk] = "";
				$existing_records['nineteenkgssoluble'][$sk] = "";
				$existing_records['acephate'][$sk] = "";
				$existing_records['seventeenkgs'][$sk] = "";
				$existing_records['urea'][$sk] = "";
				$existing_records['potash'][$sk] = "";
				$existing_records['rogar'][$sk] = "";
				$existing_records['malathian'][$sk] = "";
				$existing_records['fouate'][$sk] = "";
				$existing_records['fifteenkgs'][$sk] = "";
				$existing_records['twofourdkgs'][$sk] = "";
				$existing_records['glycil'][$sk] = "";
				$existing_records['sixteenkgs'][$sk] = "";
				$existing_records['arrowltrs'][$sk] = "";
				$existing_records['biowetltrs'][$sk] = "";
				$existing_records['blitaxkgs'][$sk] = "";
				$existing_records['twentykgs'][$sk] = "";   
			 }
		    
		  }
		  
		  
		    foreach($siteattrname as $sk => $sitena){
		  
		    $matchhuskpfields = ['month' => $segment4, 'year' => $segment3, 'site' => $sk];
			 if(($sk == 5 || $sk == 6 || $sk == 7 || $sk == 8 || $sk ==10 || $sk ==14 || $sk ==17 || $sk == 16) && in_array($sk,$sitearr)) {
				 $existing_records_two['sites'][$sk] = get_sitename($sk);
			 $hsk_count = \App\Horticulturemisreport::where($matchhuskpfields)->count();
			 if($hsk_count > 0){
			 	$hsk_arr = \App\Horticulturemisreport::where($matchfields)->first();
				$existing_records_two['watering'][$sk] = $hsk_arr['watering'];
				$existing_records_two['cleaning'][$sk] = $hsk_arr['cleaning'];
				$existing_records_two['weeding'][$sk] = $hsk_arr['weeding'];
				$existing_records_two['cutting'][$sk] = $hsk_arr['cutting'];
				$existing_records_two['multching'][$sk] = $hsk_arr['multching'];
				$existing_records_two['trimming'][$sk] = $hsk_arr['trimming'];
				$existing_records_two['training_shaping'][$sk] = $hsk_arr['training_shaping'];
				$existing_records_two['pruning'][$sk] = $hsk_arr['pruning'];
				$existing_records_two['hoeing'][$sk] = $hsk_arr['hoeing'];
				$existing_records_two['lawn_moving'][$sk] = $hsk_arr['lawn_moving'];
				$existing_records_two['fertilizer_application'][$sk] = $hsk_arr['fertilizer_application'];
				$existing_records_two['organic_manure_app'][$sk] = $hsk_arr['organic_manure_app'];
				$existing_records_two['spraying_chemicals'][$sk] = $hsk_arr['spraying_chemicals'];
				$existing_records_two['micro_nutrients'][$sk] = $hsk_arr['micro_nutrients'];
				$existing_records_two['weedicide_application'][$sk] = $hsk_arr['weedicide_application'];
				$existing_records_two['mandays_perday'][$sk] = $hsk_arr['mandays_perday'];
				
				}else{
				
				$existing_records_two['watering'][$sk] = "";
				$existing_records_two['cleaning'][$sk] = "";
				$existing_records_two['weeding'][$sk] = "";
				$existing_records_two['cutting'][$sk] = "";
				$existing_records_two['multching'][$sk] = "";
				$existing_records_two['trimming'][$sk] = "";
				$existing_records_two['training_shaping'][$sk] = "";
				$existing_records_two['pruning'][$sk] = "";
				$existing_records_two['hoeing'][$sk] = "";
				$existing_records_two['lawn_moving'][$sk] = "";
				$existing_records_two['fertilizer_application'][$sk] = "";
				$existing_records_two['organic_manure_app'][$sk] = "";
				$existing_records_two['spraying_chemicals'][$sk] = "";
				$existing_records_two['micro_nutrients'][$sk] = "";
				$existing_records_two['weedicide_application'][$sk] = "";
				$existing_records_two['mandays_perday'][$sk] = "";
				
				}
				 } else if(($sk == 9 || $sk == 11 || $sk == 12 || $sk == 13 || $sk ==15 || $sk ==18 || $sk ==19 || $sk == 20) && in_array($sk,$sitearr)) {
				  
				 $existing_records_three['sites'][$sk] = get_sitename($sk);
				  $hsk_count = \App\Horticulturemisreport::where($matchhuskpfields)->count();
			 if($hsk_count > 0){
			 	$hsk_arr = \App\Horticulturemisreport::where($matchfields)->first();
				
				
				
				$existing_records_three['watering'][$sk] = $hsk_arr['watering'];
				$existing_records_three['cleaning'][$sk] = $hsk_arr['cleaning'];
				$existing_records_three['weeding'][$sk] = $hsk_arr['weeding'];
				$existing_records_three['cutting'][$sk] = $hsk_arr['cutting'];
				$existing_records_three['multching'][$sk] = $hsk_arr['multching'];
				$existing_records_three['trimming'][$sk] = $hsk_arr['trimming'];
				$existing_records_three['training_shaping'][$sk] = $hsk_arr['training_shaping'];
				$existing_records_three['pruning'][$sk] = $hsk_arr['pruning'];
				$existing_records_three['hoeing'][$sk] = $hsk_arr['hoeing'];
				$existing_records_three['lawn_moving'][$sk] = $hsk_arr['lawn_moving'];
				$existing_records_three['fertilizer_application'][$sk] = $hsk_arr['fertilizer_application'];
				$existing_records_three['organic_manure_app'][$sk] = $hsk_arr['organic_manure_app'];
				$existing_records_three['spraying_chemicals'][$sk] = $hsk_arr['spraying_chemicals'];
				$existing_records_three['micro_nutrients'][$sk] = $hsk_arr['micro_nutrients'];
				$existing_records_three['weedicide_application'][$sk] = $hsk_arr['weedicide_application'];
				$existing_records_three['mandays_perday'][$sk] = $hsk_arr['mandays_perday'];
				}else{
				
				$existing_records_three['watering'][$sk] = "";
				$existing_records_three['cleaning'][$sk] = "";
				$existing_records_three['weeding'][$sk] = "";
				$existing_records_three['cutting'][$sk] = "";
				$existing_records_three['multching'][$sk] = "";
				$existing_records_three['trimming'][$sk] = "";
				$existing_records_three['training_shaping'][$sk] = "";
				$existing_records_three['pruning'][$sk] = "";
				$existing_records_three['hoeing'][$sk] = "";
				$existing_records_three['lawn_moving'][$sk] = "";
				$existing_records_three['fertilizer_application'][$sk] = "";
				$existing_records_three['organic_manure_app'][$sk] = "";
				$existing_records_three['spraying_chemicals'][$sk] = "";
				$existing_records_three['micro_nutrients'][$sk] = "";
				$existing_records_three['weedicide_application'][$sk] = "";
				$existing_records_three['mandays_perday'][$sk] = "";
				
				}
				    
				 }
			}
		    
		  $relations = [
			'res' => $formfieldarray,  
			'sites' => $siteattrname,
			'flats' => $flatres,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			'existing_two' => $existing_records_two,
			'existing_three' => $existing_records_three,
			'cost' => $existing_Rates,
			'deployment' => $deployment, 
			];   
		  
		  
		  return view('misfiles.advancedprints.horticulturepestone', $relations);

		
			} 
			else if($reporttype == 'club_house_utilization_data'){
			
		$segment3 = $year;
		$segment4 = $month;  
		
		$formfieldarray = array();
		$siteattrname = array();
		$flatres = array();
		$reportdate_val = "";
		$dateString = $segment3.'-'.$segment4.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$segment4."-".$segment3;

	      if(Auth::user()->id == 1){
	    
		    $sitearr = explode(",",$selected_sites);
		  $sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  
		  }else{
		  
		     $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$selected_sites);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id'); 
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
			
		  }
		  $existing_records = array();
		  $existing_Rates = array();
		  
		  $getratescn =  \App\Pmsdailyreportvalidation::count();
		  if($getratescn > 0){
		     $getratesRes =  \App\Pmsdailyreportvalidation::get();
			  foreach($getratesRes as $rate){
			   $existing_Rates[$rate->site] = array("one_bhk"=>$rate->one_bhk,"two_bhk"=>$rate->two_bhk,"three_bhk"=>$rate->three_bhk,"four_bhk"=>$rate->four_bhk);
			  }
		  } 
		  
		$relations = [  
			'res' => $formfieldarray, 
			'sites' => $siteattrname,
			'flats' => $flatres,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			'cost' => $existing_Rates,
			];    

		

		$matchfields = ['month' => $segment4, 'year' => $segment3]; 

		$res_count = \App\Clubutilizationmisreport::where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Clubutilizationmisreport::where($matchfields)->get();
			
			
			 if(count($formfieldarray) > 0){
			     foreach($formfieldarray as $fieldarr){
				 	 $existing_records[$fieldarr->site] = array("id"=>$fieldarr->id,"avg_occupancy"=>$fieldarr->avg_occupancy,"avg_daily_swim"=>$fieldarr->avg_daily_swim,"avg_daily_gym"=>$fieldarr->avg_daily_gym,'occ_flat_swim' =>$fieldarr->occ_flat_swim,'occ_gym_swim' =>$fieldarr->occ_gym_swim);
				 } 
				 
				// echo "<pre>"; print_r($existing_records);echo "</pre>";
			 }  
			 }
			 //exit;
			
			$relations = [
			'res' => $formfieldarray,  
			'sites' => $siteattrname,
			'flats' => $flatres,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			'cost' => $existing_Rates,
			];     
			 

		  return view('misfiles.advancedprints.misclubhouse', $relations);

		
	
		}
		
			else if($reporttype == 'occupancy_data'){
			$segment3 = $year;
		  $segment4 = $month;  

			 
		$formfieldarray = array();
		$siteattrname = array();
		$flatres = array();
		$reportdate_val = "";
		$dateString = $segment3.'-'.$segment4.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$segment4."-".$segment3;

	      if(Auth::user()->id == 1){

			$sitearr = explode(",",$selected_sites);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{

            $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$selected_sites);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site'); 		
		  }
		  $existing_records = array();
		  $existing_Rates = array();
		  
		  $getratescn =  \App\Pmsdailyreportvalidation::count();
		  if($getratescn > 0){
		     $getratesRes =  \App\Pmsdailyreportvalidation::get();
			  foreach($getratesRes as $rate){
			   $existing_Rates[$rate->site] = array("one_bhk"=>$rate->one_bhk,"two_bhk"=>$rate->two_bhk,"three_bhk"=>$rate->three_bhk,"four_bhk"=>$rate->four_bhk);
			  }
		  } 
		  
		$relations = [  
			'res' => $formfieldarray, 
			'sites' => $siteattrname,
			'flats' => $flatres,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			'cost' => $existing_Rates,
			];    

		

		$matchfields = ['month' => $segment4, 'year' => $segment3]; 

		$res_count = \App\Occupancymisreport::where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Occupancymisreport::where($matchfields)->get();
			
			
			 if(count($formfieldarray) > 0){
			     foreach($formfieldarray as $fieldarr){
				 	 $existing_records[$fieldarr->site] = array("id"=>$fieldarr->id,"owners"=>$fieldarr->owners,"tenants"=>$fieldarr->tenants,"vacant"=>$fieldarr->vacant);
				 } 
				 
				// echo "<pre>"; print_r($existing_records);echo "</pre>";
			 }  
			 
			 //exit;
			
			$relations = [
			'res' => $formfieldarray,  
			'sites' => $siteattrname,
			'flats' => $flatres,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			'cost' => $existing_Rates,
			];     
			 
			
			 return view('misfiles.advancedprints.occupancy', $relations);
			  
			}
			
			} 
			
			else if($reporttype == 'indented_material_status'){
			
		$segment3 = $year;
		$segment4 = $month;
		
		$formfieldarray = array();
		$siteattrname = array();
		$flatres = array();
		$reportdate_val = "";
		$dateString = $segment3.'-'.$segment4.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$segment4."-".$segment3;

	      if(Auth::user()->id == 1){
	  
		   $sitearr = explode(",",$selected_sites);
		  $sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{
		  
		   $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$selected_sites);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
			
		  }
		  $existing_records = array();
		  $existing_Rates = array();
		  
		  $getratescn =  \App\Pmsdailyreportvalidation::count();
		  if($getratescn > 0){
		     $getratesRes =  \App\Pmsdailyreportvalidation::get();
			  foreach($getratesRes as $rate){
			   $existing_Rates[$rate->site] = array("one_bhk"=>$rate->one_bhk,"two_bhk"=>$rate->two_bhk,"three_bhk"=>$rate->three_bhk,"four_bhk"=>$rate->four_bhk);
			  }
		  } 
		  
		$relations = [  
			'res' => $formfieldarray, 
			'sites' => $sitenames,
			'flats' => $flatres,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			'cost' => $existing_Rates,
			];    

		

		$matchfields = ['month' => $segment4, 'year' => $segment3]; 

		$res_count = \App\Indentedmisreport::where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Indentedmisreport::where($matchfields)->get();
			
			
			 if(count($formfieldarray) > 0){
			     foreach($formfieldarray as $fieldarr){
				 	 $existing_records[$fieldarr->site] = $fieldarr;
				 } 
				 
				 //echo "<pre>"; print_r($existing_records);echo "</pre>"; exit;
			 }  
			 
			 }
			 
			 $indentrep_Array = array();
			 $lagged_date = array();
			 foreach($siteattrname as $stk => $siten) {
			 
			  $match_in_fields = ['month' => $segment4, 'year' => $segment3, 'site' =>$stk]; 
			  $match_in_count = \App\Indentedmisreport::where($match_in_fields)->count();
		
		       if($match_in_count > 0){
			   	    $match_in_array = \App\Indentedmisreport::where($match_in_fields)->get();
					$match_lag_array = \App\Indentedmisreport::where($match_in_fields)->first();
					
					$indentrep_Array[$stk] = $match_in_array;
					$lagged_date[$stk] = $match_lag_array->laggeddate;
			   }
			   else{
			       $indentrep_Array[$stk] = array();
			   }
			   
			   
			 }
			 
			 //exit;
			
			$relations = [
			'res' => $formfieldarray,  
			'sites' => $sitenames,
			'flats' => $flatres,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			'indentrep' => $indentrep_Array,
			'cost' => $existing_Rates,
			'laggeddate' => $lagged_date,
			];   
			
		     

		  return view('misfiles.advancedprints.materialindented', $relations);

		
			 
			}
			
			else if($reporttype == 'apna_complex'){
			
       	$segment3 = $year;
		$segment4 = $month;  

		$formfieldarray = array();
		$siteattrname = array();
		$flatres = array();
		$reportdate_val = "";
		$dateString = $segment3.'-'.$segment4.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$segment4."-".$segment3;

	      if(Auth::user()->id == 1){
		  
		   $sitearr = explode(",",$selected_sites);
		  $sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }else{
		         
			$role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$selected_sites);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
			
		  
		  }
		  $existing_records = array();
		  $existing_Rates = array();
		  
		  $getratescn =  \App\Pmsdailyreportvalidation::count();
		  if($getratescn > 0){
		     $getratesRes =  \App\Pmsdailyreportvalidation::get();
			  foreach($getratesRes as $rate){
			   $existing_Rates[$rate->site] = array("one_bhk"=>$rate->one_bhk,"two_bhk"=>$rate->two_bhk,"three_bhk"=>$rate->three_bhk,"four_bhk"=>$rate->four_bhk);
			  }
		  } 
		  
		$relations = [  
			'res' => $formfieldarray, 
			'sites' => $sitenames,
			'flats' => $flatres,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			'cost' => $existing_Rates,
			];    

		

		$matchfields = ['month' => $segment4, 'year' => $segment3]; 

		$res_count = \App\Occupancymisreport::where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Occupancymisreport::where($matchfields)->get();
			
			
			 if(count($formfieldarray) > 0){
			     foreach($formfieldarray as $fieldarr){
				 	 $existing_records[$fieldarr->site] = array("id"=>$fieldarr->id,"owners"=>$fieldarr->owners,"tenants"=>$fieldarr->tenants,"vacant"=>$fieldarr->vacant);
				 } 
				 
				// echo "<pre>"; print_r($existing_records);echo "</pre>";
			 }  
			 
			 
			 $indentrep_Array = array();
			 $lagged_date = array();
			 foreach($siteattrname as $stk => $siten) {
			 
			  $match_in_fields = ['month' => $segment4, 'year' => $segment3, 'site' =>$stk]; 
			  $match_in_count = \App\Apnacomplaintmisreport::where($match_in_fields)->count();
		
		       if($match_in_count > 0){
			   	    $match_in_array = \App\Apnacomplaintmisreport::where($match_in_fields)->get();
					
					$indentrep_Array[$stk] = $match_in_array;
			   }
			   else{
			       $indentrep_Array[$stk] = array();
			   }
			   
			   
			 }
			 //exit;
			
			}
			
			$relations = [
			'res' => $formfieldarray,  
			'sites' => $sitenames,
			'flats' => $flatres,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			'cost' => $existing_Rates,
			'apnarep' => $indentrep_Array,
			];   
     
		  return view('misfiles.advancedprints.misapnacomplex', $relations);

		
			}
			
	else if($reporttype == 'traffic_movement'){
		$segment3 = $year;
		$segment4 = $month;	
	
		$formfieldarray = array();
		$siteattrname = array();
		$flatres = array();
		$reportdate_val = "";
		$dateString = $segment3.'-'.$segment4.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$segment4."-".$segment3;

	      if(Auth::user()->id == 1){
	        $sitearr = explode(",",$selected_sites);
		  $sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$selected_sites);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
			
		  }
		  $existing_records = array();
		  $existing_Rates = array();
		  $exist_Sec = array();
		  
		
		  
		$relations = [  
			'res' => $formfieldarray, 
			'sites' => $siteattrname,
			'borewellsnum' => $borewellsnum,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			'existsec' => $exist_Sec,
			];    

		

		$matchfields = ['month' => $segment4, 'year' => $segment3]; 

		$res_count = \App\Trafficmisreport::where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Trafficmisreport::where($matchfields)->get();
			
			  $exist_Sec = array();
			  $exist_SecTwo = array();
			 if(count($formfieldarray) > 0){
			     foreach($formfieldarray as $fieldarr){
					
					 $exist_Sec['sites'][$fieldarr->site] = get_sitename($fieldarr->site);
					 $exist_Sec['resident_vehicle'][$fieldarr->site] = $fieldarr->resident_vehicle;
					 $exist_Sec['temp_vendors'][$fieldarr->site] = $fieldarr->temp_vendors;
					 $exist_Sec['courier_delivery'][$fieldarr->site] = $fieldarr->courier_delivery;
					 $exist_Sec['visitors'][$fieldarr->site] = $fieldarr->visitors;
					 $exist_Sec['construc_team'][$fieldarr->site] = $fieldarr->construc_team;
					 $exist_Sec['interworks_inflats'][$fieldarr->site] = $fieldarr->interworks_inflats;
					 $exist_Sec['interior_works_per_day'][$fieldarr->site] = $fieldarr->interior_works_per_day;  
					 $exist_Sec['ctotval'][$fieldarr->site] = (float)$fieldarr->resident_vehicle + (float)$fieldarr->temp_vendors + (float)$fieldarr->courier_delivery + (float)$fieldarr->visitors + (float)$fieldarr->construc_team + (float)$fieldarr->interworks_inflats + (float)$fieldarr->interior_works_per_day;
					 
					
					  
				 } 
				 
				//echo "<pre>"; print_r($exist_SecTwo);echo "</pre>";
			 }  
			 
			
			 
			 //exit;
			
			$relations = [
			'res' => $formfieldarray,  
			'sites' => $siteattrname,
			'borewellsnum' => $borewellsnum,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			'existsec' => $exist_Sec,
			];     
			  
		 }
		   else{
		        foreach($siteattrname as $kk => $arr){
				     $exist_Sec['sites'][$kk] = get_sitename($kk);
					 $exist_Sec['resident_vehicle'][$kk] = "";
					 $exist_Sec['temp_vendors'][$kk] = "";
					 $exist_Sec['courier_delivery'][$kk] = "";
					 $exist_Sec['visitors'][$kk] = "";
					 $exist_Sec['construc_team'][$kk] = "";
					 $exist_Sec['interworks_inflats'][$kk] = "";
					 $exist_Sec['interior_works_per_day'][$kk] = "";
					 $exist_Sec['ctotval'][$kk] = ""; 
				}
		   }
		   
		   	$relations = [
			'res' => $formfieldarray,  
			'sites' => $siteattrname,
			'borewellsnum' => $borewellsnum,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			'existsec' => $exist_Sec,
			];     

		  return view('misfiles.advancedprints.trafiicview', $relations);

		
			}

}

  
  
  
  // GET ADVANCE REPORTS DOWNLOAD
  
  
  // GET ADVANCED DAILY REPORTS
  
     public function getdailyadvancedownload(Request $request)

    {
	
	$edata = $request->all();
    $year= $edata['year'];
	$month= $edata['month'];
	$cat =  $edata['category'];
	

	
     $date_val = $year."-".$month."-1"; 
    $lastdate_day = date("t", strtotime($date_val));
 
	
	$rdate  =  "1"."-".$month."-".$year; 

	      if(Auth::user()->id == 1){
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			 $siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  }
		  $res_Status = array();
		  foreach($siteattrname as $kk => $siten){
			 for($ii=1; $ii<= $lastdate_day; $ii++){
			   if($ii > 0) {
			   $rdate =   $ii."-".$month."-".$year;
			     $checkval = checkDailyStatus($rdate, $kk);
				 if($cat == 'Fire Safety'){
				 $res_Status[$kk][$ii] =  $checkval[0];
				 }
				 elseif($cat == 'FMS'){
				 $res_Status[$kk][$ii] =  $checkval[1];
				 }
				  elseif($cat == 'PMS'){
				  $res_Status[$kk][$ii] =  $checkval[2];
				  }
				  elseif($cat == 'Security'){
				  $res_Status[$kk][$ii] =  $checkval[3];
				  }
			   
			   }
			 }
		  } 
		$relations = [
            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			'sites_names' => $sitenames,
			'sites_attr_names' => $siteattrname,
			'res_Status' =>  $res_Status,
			'category' => $cat,
			'year' => $year,
			'month' => $month,
			'daycount' => $lastdate_day,
        ];
	
		  $pdf = PDF::loadView('dailyreports.dailyadvancedreportsres', $relations);
		$pdf->setPaper('A4', 'landscape');  

			date_default_timezone_set('Asia/Kolkata');
			$today_date = date('d');
			$today_time = date("g:i a");
			$monthName = date('F', mktime(0, 0, 0, $month, 10)); 
			$fnam = 'DailyAdvanced'.$monthName."_".$today_date."_".$year."_".$today_time.".pdf";
			// return $pdf->download('metrowater.pdf'); //Download    
			return $pdf->download($fnam);          


	
	
	}
  
  // END GET ADVANCED DAILY REPORTS
  
  
  
  // GET ADVANCED REPORTS

public function getadvancedownload(Request $request)

    {

	$edata = $request->all();
    $date= $edata['fromdate'];
	$todate= $edata['todate'];
	$reporttype =  $edata['report_type'];
	 
	$selected_sites= implode(",",$edata['site']);
	

	$datearr = explode("-",$date);
	$datetoarr =  explode("-",$todate);

	$month = $datearr[1];

	$year = $datearr[2];
	
	$tomonth = $datetoarr[1];

	$toyear = $datetoarr[2];
	
	$to_day = $datetoarr[0];

	//$site = '5';
 

	$rdate = $year."-".$month."-".$datearr[0];
    $to_date_val = $toyear."-".$tomonth."-".$to_day;
			
	if($reporttype == 'metro_water') { 
		$segment3 = $year;
		$segment4 = $month; 
		$rdate = $year."-".$month."-".$datearr[0];
		
		$siteattrname = array();
		$flatres = array();
		$reportdate_val = "";
		$dateString = $segment3.'-'.$segment4.'-'.$datearr[0];
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $datetoarr[0]."-".$segment4."-".$segment3;
		$reportdatefrom_val = $datearr[0]."-".$segment4."-".$segment3;

	      if(Auth::user()->id == 1){
	      $sitearr = explode(",",$selected_sites);
		  $sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sites_count = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->count();
		  $sites_res_arr =\App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$selected_sites);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sites_count = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->count();
			$sites_res_arr =\App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  }
		  
		  $fromdate = $year."-".$month."-".$datearr[0];
		 // $fromdate = $segment3."-".$segment4."-"."1";
		  $todate = $segment3."-".$segment4."-".$lastdatearr[2];
		  
		/*  $sites_count = \App\Sites::whereIn('id', $sitearr)->count;
		  if($sites_count > 0){
		  	$sites_res_arr = \App\Sites::whereIn('id', $sitearr)->get()->pluck('name', 'id');
			foreach($sites_res_arr as $ke =>$site_res_row){
				
			}
			
		  } */
		  
		  // $sites_count = \App\Sites::count();
		  if($sites_count > 0){
		  	//$sites_res_arr =\App\Sites::get()->pluck('name', 'id');
			$sitear = array();
			
			$avgcon = array();
			$contracted = array();
			
			foreach($sites_res_arr as $ke =>$site_res_row){
			$getcontractedcount =  Dailyreportvalidation::
				where('site', '=', $ke)
				->count();
				 
				if($getcontractedcount>0){
				 $getcontractedRes =  Dailyreportvalidation::
				where('site', '=', $ke)
				->first(); 
				if(isset( $getcontractedRes->contracted_quantity_kl))
				$contracted[$ke] =  $getcontractedRes->contracted_quantity_kl;
				else $contracted[$ke] = "";
				 }
				  else{
				  $contracted[$ke] = "";
				  }     
				}
				   
			foreach($sites_res_arr as $ke =>$site_res_row){
				//echo $site_res_row;
				$avgres = "";
				for($i=$datearr[0];$i<=$datetoarr[0];$i++){
				$ondate = $segment3."-".$segment4."-".$i;
				$resultcn = Fmsdailyreport::
				where('reporton', '=', $ondate)
				->where('site', '=', $ke)
				->count();
				if($resultcn > 0){
				 $getsiteMetro =  Fmsdailyreport:: 
				  where('reporton', '=', $ondate)
				->where('site', '=', $ke)
				->first();
				  $avgres = (float)$avgres + (float)$getsiteMetro->wsp_metro; 
				}   
				
				}
				
				$avgcon[$ke] = $avgres;
			}
			  
			  $contractpercent = array();
			  
			
			
			
			   foreach($sites_res_arr as $ke =>$site_res_row){
			     $community[$ke] =$site_res_row;
			   }
			   $datek["community"] = $community;
			   $datek["average"] = $avgcon;   
			   $datek["concentrated"] = $contracted; 
			
			for($i=$datearr[0];$i<=$datetoarr[0];$i++){
			    $ondate = $segment3."-".$segment4."-".$i;
				$sitearrres = array();  
			    foreach($sites_res_arr as $ke =>$site_res_row){
				 
				$resultcn = Fmsdailyreport::
				where('reporton', '=', $ondate)
				->where('site', '=', $ke)
				->count();
				 if($resultcn > 0){
				 $getsiteMetro =  Fmsdailyreport::
				  where('reporton', '=', $ondate)
				->where('site', '=', $ke)
				->first();
				     $sitearrres[$ke] = $getsiteMetro->wsp_metro;
				  } 
				  else{
				   $sitearrres[$ke] = "";
				  }
				}
				
				$datekres[$ondate] = $sitearrres;
			}
			$datek["dateres"] = $datekres;
			
			//echo "<pre>"; print_r($datek); echo "</pre>"; exit;
			
			 foreach($contracted as $ke =>$cons_row){
			     if($cons_row > 0){
			     $contractpercent[$ke] =  ((float)(round((float)$avgcon[$ke]/count($datek["dateres"])) * 100) /(float)$cons_row);
				 }
				 else{
				  $contractpercent[$ke] = "";
				 }
				 
			   }
			   
			   $datek["persent"] = $contractpercent;
			
		  } 
		   
		  
		$relations = [  
			
			'sites' => $siteattrname,
			'flats' => $flatres,
			'reportfrom_on' => $reportdatefrom_val,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'sitearr' => $datek,
			
			];
			 
			// echo "<pre>"; print_r($datek); echo "</pre>";

		   // return view('misfiles.view.metrowater', $relations);  
			
			$pdf = PDF::loadView('misprints.metrowaterdownload', $relations);

             //$pdf->setPaper('A4', 'landscape');
			 
			date_default_timezone_set('Asia/Kolkata');
			$today_date = date('d');
			$today_time = date("g:i a");
			$monthName = date('F', mktime(0, 0, 0, $segment4, 10)); 
			
			 $fnam = 'MetroWater_'.$monthName."_".$today_date."_".$segment3."_".$today_time.".pdf";
            // return $pdf->download('metrowater.pdf'); //Download    
			  return $pdf->download($fnam);
		  
		
		  
		  }
		  
		  else if($reporttype == 'water_consumption'){
		    
			
			
		
		
		  /* WATER CONSUMPTION */

		$segment3 = $year;
		$segment4 = $month; 
		
		$siteattrname = array();
		$flatres = array();
		$reportdate_val = "";
		$dateString = $segment3.'-'.$segment4.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$segment4."-".$segment3;
		$reportdatefrom_val = "1"."-".$segment4."-".$segment3;

	      if(Auth::user()->id == 1){
		    $sitearr = explode(",",$selected_sites);
		  $sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sites_count = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->count();
		  $sites_res_arr =\App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$selected_sites);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sites_count = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->count();
			$sites_res_arr =\App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }
		  
		  
		  $fromdate = $segment3."-".$segment4."-"."1";
		  $todate = $segment3."-".$segment4."-".$lastdatearr[2];
		
		  
		  if($sites_count > 0){
		  	//$sites_res_arr =\App\Sites::get()->pluck('name', 'id');
			$sitear = array();
			
			$avgcon = array();
			$tankcon = array();
			$borewellcon = array();
			$contracted = array();
			$num_borewells = array();
			
			foreach($sites_res_arr as $ke =>$site_res_row){
			$getcontractedcount =  Dailyreportvalidation::
				where('site', '=', $ke)
				->count();
				 
				if($getcontractedcount>0){
				 $getcontractedRes =  Dailyreportvalidation::
				where('site', '=', $ke)
				->first(); 
				if(isset($getcontractedRes->contracted_quantity_kl))
				$contracted[$ke] =  $getcontractedRes->contracted_quantity_kl;
				else
				$contracted[$ke] = "";
				if(isset($getcontractedRes->borewellsnum))
				$num_borewells[$ke] =  $getcontractedRes->borewellsnum;
				else
				 $num_borewells[$ke] = "";
				 }
				  else{
				  $contracted[$ke] = "";
				   $num_borewells[$ke] = "";
				  }
				}
				   
			foreach($sites_res_arr as $ke =>$site_res_row){
				//echo $site_res_row;
				$avgres = "";
				$boresres = "";
				$tankeres = "";
				for($i=1;$i<=$lastdatearr[2];$i++){
				$ondate = $segment3."-".$segment4."-".$i;
				$resultcn = Fmsdailyreport::
				where('reporton', '=', $ondate)
				->where('site', '=', $ke)
				->count();
				if($resultcn > 0){
				 $getsiteMetro =  Fmsdailyreport::
				  where('reporton', '=', $ondate)
				->where('site', '=', $ke)
				->first();
				  $avgres = (float)$avgres + (float)$getsiteMetro->wsp_metro; 
				  $boresres = (float)$boresres + (float)$getsiteMetro->wsp_bores; 
				  $tankeres = (float)$tankeres + (float)$getsiteMetro->wsp_tankers; 
				}   
				
				}
				
				$avgcon[$ke] = $avgres;
				$tankcon[$ke] = $tankeres;
				$borewellcon[$ke] = $boresres;
			}
			
			
			// GET OCCUPANCY:
			  $occupancyarr= array();
			 foreach($sites_res_arr as $ke =>$site_res_row){
				//echo $site_res_row;
				$occres = "";
				$occcn = Occupancymisreport::
				where('month', '=', $segment4)
				->where('year', '=', $segment3)
				->where('site', '=', $ke)
				->count();
				if($occcn > 0){
				 $occres =  Occupancymisreport::
				where('month', '=', $segment4)
				->where('year', '=', $segment3)
				->where('site', '=', $ke)
				->first();
				  $occres = (float)$occres->tenants + (float)$occres->owners; 
				}  
				$occupancyarr[$ke] = $occres;
			}
			
			// END GET OCCUPANCY
			  
			  $contractpercent = array();
			  
			
			   foreach($sites_res_arr as $ke =>$site_res_row){
			     $community[$ke] =$site_res_row;
			   }
			   
			   //Number of bores notworking
			    $nwbrw_num = array();
			    foreach($sites_res_arr as $ke =>$site_res_row){
				  $ondate = $segment3."-".$segment4."-".$lastdatearr[2];
				$brnwcn = Fmsdailyreport::
				where('reporton', '=', $ondate)
				->where('site', '=', $ke)
				->count();
				 if($brnwcn > 0){
				 $brwnwres =  Fmsdailyreport::
				  where('reporton', '=', $ondate)
				->where('site', '=', $ke)
				->first();

				     $nwbrw_num[$ke] = $brwnwres->othser_gas_borewells;
				  } 
				  else{
				   $nwbrw_num[$ke] = "";
				  }
				}
			  
			
			for($i=1;$i<=$lastdatearr[2];$i++){
			    $ondate = $segment3."-".$segment4."-".$i;
			    foreach($sites_res_arr as $ke =>$site_res_row){
				 
				$resultcn = Fmsdailyreport::
				where('reporton', '=', $ondate)
				->where('site', '=', $ke)
				->count();
				 if($resultcn > 0){
				 $getsiteMetro =  Fmsdailyreport::
				  where('reporton', '=', $ondate)
				->where('site', '=', $ke)
				->first();
				     $sitearr[$ke] = $getsiteMetro->wsp_metro;
				  } 
				  else{
				   $sitearr[$ke] = "";
				  }
				}
				
				$datekres[$ondate] = $sitearr;
			}
			$datek["dateres"] = $datekres;
			
			//echo "<pre>"; print_r($datek); echo "</pre>"; exit;
			
			 foreach($contracted as $ke =>$cons_row){
			     if($cons_row > 0){
			     $contractpercent[$ke] =  ((float)(round((float)$avgcon[$ke]/count($datek["dateres"])) * 100) /(float)$cons_row);
				 }
				 else{
				  $contractpercent[$ke] = "";
				 }
				 
			   }
			   
			   $datek["persent"] = $contractpercent;
			
		  } 
		  
		  
		   $datek["community"] = $community;
			   $datek["average"] = $avgcon;   
			   $datek["concentrated"] = $contracted; 
		  
		$relations = [  
			
			'sites' => $siteattrname,
			'flats' => $flatres,
			'reportfrom_on' => $reportdatefrom_val,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'endoftheday'  => $lastdatearr[2],
			'concentrated' => $contracted,
			'average' => $avgcon,
			'occupancy' => $occupancyarr,
			'boresavg' => $borewellcon,
			'tankdavg' => $tankcon,
			'borewellsnum' => $num_borewells,
			'nwbrwnum' => $nwbrw_num,
			
			];   
		  
		  /* END WATER CONSUMPTION */

		//  return view('misfiles.view.watersourceconsumption', $relations);
		  
		  $pdf = PDF::loadView('misprints.waterconsumptionprint', $relations);
				$pdf->setPaper('A4', 'landscape');       

             // return $pdf->download('waterconsumption.pdf'); //Download    
		/*	 $monthName = date('F', mktime(0, 0, 0, $segment4, 10));   
			   $fnam = 'WaterConsumption_'.$monthName."_".$segment3.".pdf";
			  return $pdf->download($fnam); */
			  
			date_default_timezone_set('Asia/Kolkata');
			$today_date = date('d');
			$today_time = date("g:i a");
			$monthName = date('F', mktime(0, 0, 0, $segment4, 10)); 

			 $fnam = 'WaterConsumption_'.$monthName."_".$today_date."_".$segment3."_".$today_time.".pdf";
            // return $pdf->download('metrowater.pdf'); //Download    
			  return $pdf->download($fnam);

			
		  }
		  
		   else if($reporttype == 'borewell_notworking'){
		     
		$segment3 = $year;
		$segment4 = $month;  
		
	
		$formfieldarray = array();
		$siteattrname = array();
		$flatres = array();
		$reportdate_val = "";
		$dateString = $segment3.'-'.$segment4.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$segment4."-".$segment3;

	      if(Auth::user()->id == 1){  
		  $sitearr = explode(",",$selected_sites);
		  $sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		  
		  }else{

			$role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$selected_sites);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site'); 
		  }
		  $existing_records = array();
		  $existing_Rates = array();
		  
		
		  
		$relations = [  
			'res' => $formfieldarray, 
			'sites' => $siteattrname,
			'borewellsnum' => $borewellsnum,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			];    

		

	$matchfields = ['month' => $segment4, 'year' => $segment3]; 

		 $res_count = \App\Borewellsnwmisreport::where($matchfields)->count();
		if($res_count > 0){
		
			$formfieldarray = \App\Borewellsnwmisreport::where($matchfields)->get();
			
			 if(count($formfieldarray) > 0){
			     foreach($formfieldarray as $fieldarr){
				 	 $existing_records[$fieldarr->site] = array("id"=>$fieldarr->id,"nw_bores_num"=>$fieldarr->nw_bores_num,"no_ground_water"=>$fieldarr->no_ground_water,"over_load"=>$fieldarr->over_load,"motor_brunt"=>$fieldarr->motor_brunt,"cable_prblm"=>$fieldarr->cable_prblm,"pumpormotorwear"=>$fieldarr->pumpormotorwear,"others"=>$fieldarr->others,"dry_run_protectn"=>$fieldarr->dry_run_protectn,"flow_meter"=>$fieldarr->flow_meter,"remarks"=>$fieldarr->remarks);
				 } 
				 
				 //echo "<pre>"; print_r($existing_records);echo "</pre>";
			 }  
			 
		
			
			$relations = [
			'res' => $formfieldarray,  
			'sites' => $siteattrname,
			'borewellsnum' => $borewellsnum,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			];     
			  
		 } 
			 
			 //exit;
	
	

		  //return view('misfiles.view.borewellmis', $relations); 
		  
		    $pdf = PDF::loadView('misprints.borewellmisprint', $relations);  
		   $pdf->setPaper('A4', 'landscape');

          //return $pdf->download('borewellsnw.pdf'); 
		  
		/*   $monthName = date('F', mktime(0, 0, 0, $segment4, 10));   
			   $fnam = 'BorewellsNotWorking_'.$monthName."_".$segment3.".pdf";
			  return $pdf->download($fnam); */
			  
		   date_default_timezone_set('Asia/Kolkata');
			$today_date = date('d');
			$today_time = date("g:i a");
			$monthName = date('F', mktime(0, 0, 0, $segment4, 10)); 
			 $fnam = 'BorewellsNotWorking_'.$monthName."_".$today_date."_".$segment3."_".$today_time.".pdf";
            // return $pdf->download('metrowater.pdf'); //Download    
			  return $pdf->download($fnam);

		
		   
		   }
		   else if($reporttype == 'fire_safe_status'){
		   
		   
		 
		$segment3 = $year;
		$segment4 = $month;
		
		$formfieldarray = array();
		$siteattrname = array();
		$flatres = array(); 
		$ref_overall = array();
		$ref_overall_temp = array();
		
		$reportdate_val = "";
		$dateString = $segment3.'-'.$segment4.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$segment4."-".$segment3;
		
		
		
		
		 if(Auth::user()->id == 1){
		   $sitearr = explode(",",$selected_sites);
		  $sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		  
		  }else{
		    
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$selected_sites);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		  }
		
		$matchfields = ['month' => $segment4, 'year' => $segment3]; 
		
		if(Auth::user()->id == 1){
		$res_count = \App\Firesafetymisreport::where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Firesafetymisreport::where($matchfields)->get();
		}
		
		}
		else
		{
		  $res_count = \App\Firesafetymisreport::whereIn('site', $sitearr)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Firesafetymisreport::whereIn('site', $sitearr)->where($matchfields)->get();
		}
		
		}
		
		$refid = array();
		/* GET REF ID*/
		if($formfieldarray){
		 foreach($formfieldarray as $formres){
		    $refid[$formres->site] = $formres->id;
		 }
		   
		 }
		 $issuecount = array();
		 $misresult = array();
		 $totalValues = array();
		  $ref_total = array();
		  if(count($refid) > 0){
		    $ref_overall = array();
			foreach($refid as $skey =>$ref){
			 $ref_a = array();
			
		  	$matchreffields = ['ref_id' => $ref, 'site' => $skey]; 
			$matchvalidfields = ['site' => $skey]; 
			
		    $tot_count = \App\Firesafedailyreportvalidation::where($matchvalidfields)->count();
			if($tot_count > 0){
				 $tot_ress = \App\Firesafedailyreportvalidation::where($matchvalidfields)->first();
				 $ref_total[$skey] = $tot_ress;
			} 
			$mismatchfields = ['month' => $segment4, 'year' => $segment3, 'site' =>$skey]; 
			
			$mismatchcount = \App\Firesafetymisreport::where($mismatchfields)->count();
			
			if($mismatchcount > 0){
				 $mismatch_ress = \App\Firesafetymisreport::where($mismatchfields)->first();
				 $misresult[$skey] = $mismatch_ress;
			} 
			
		  	$ref_count = \App\Firesafenotworkingissue::where($matchreffields)->count();
			if($ref_count > 0){
			   $ref_count_val = \App\Firesafenotworkingissue::where($matchreffields)->count(); 
			   $issuecount[$skey] = $ref_count_val;
			   $ref_record_val = \App\Firesafenotworkingissue::where($matchreffields)->get();
			   foreach($ref_record_val as $ref_rec){
			      $ref_a[] = $ref_rec;
			   } 
			         
			   $ref_overall[$skey] =  $ref_a;
			}
			else{
			   $issuecount[$skey] = 0;
			   $ref_overall[$skey]= 0;
			}
			
			//MODIFIED ARRAY
			$ref_a_temp = array();
			if($ref_count > 0){
			   $ref_record_temp_val = \App\Firesafenotworkingissue::where($matchreffields)->get();
			   foreach($ref_record_temp_val as $ref_temp_rec){
			      $ref_a_temp['category'][] = $ref_temp_rec->category;
				  $ref_a_temp['issue_des'][] = $ref_temp_rec->issue_des;
				  $ref_a_temp['root_cause'][] = $ref_temp_rec->root_cause;
				  $ref_a_temp['act_req_plan'][] = $ref_temp_rec->act_req_plan;
				  $ref_a_temp['pendingfromdays'][] = $ref_temp_rec->pendingfromdays;
				  $ref_a_temp['reponsibility'][] = $ref_temp_rec->reponsibility;
				  $ref_a_temp['notify_concern'][] = $ref_temp_rec->notify_concern;
			   } 
			         
			   $ref_overall_temp[$skey] =  $ref_a_temp;
			}
			else{
			 //  $issuecount[$skey] = 0;
			   //$ref_overall[$skey]= 0;
			   $ref_overall_temp[$skey] = 0;
			}

			 // END MODIFIED ARRAY
			
			}
		  }
		     arsort($issuecount);
			
		$relations = [
			'res' => $formfieldarray,  
			'sites' => $siteattrname,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'issues' => $ref_overall, 
			'issuecount' => $issuecount,
			'validation' => $ref_total, 
			'misres' => $misresult, 
			'issuetemp' => $ref_overall_temp,
			
			];     
			   		

		  /////return view('misfiles.view.misfiresaftey', $relations);
		  
		     
		  $pdf = PDF::loadView('misprints.firesaftyprint', $relations);  

         // return $pdf->download('firesafty.pdf'); 
		  
		     /*$monthName = date('F', mktime(0, 0, 0, $segment4, 10));   
			   $fnam = 'FireSafety'.$monthName_."_".$segment3.".pdf";
			  return $pdf->download($fnam); */
			  
			  date_default_timezone_set('Asia/Kolkata');
			$today_date = date('d');
			$today_time = date("g:i a");
			$monthName = date('F', mktime(0, 0, 0, $segment4, 10)); 
			 $fnam = 'FireSafety_'.$monthName."_".$today_date."_".$segment3."_".$today_time.".pdf";
            // return $pdf->download('metrowater.pdf'); //Download    
			  return $pdf->download($fnam);

		
		   }
		   
		   else if($reporttype == 'electro_mechanical_equipment'){
		$segment3 = $year;
		$segment4 = $month;   
		
		$formfieldarray = array();
		$siteattrname = array();
		$flatres = array(); 
		$ref_overall = array();
		$ref_overall_temp = array();
		
		$reportdate_val = "";
		$dateString = $segment3.'-'.$segment4.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$segment4."-".$segment3;
		
		
		
		
		 if(Auth::user()->id == 1){
		  $sitearr = explode(",",$selected_sites);
		  $sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		    
		  }else{
			
			$role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$selected_sites);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
			
		  }
		
		$matchfields = ['month' => $segment4, 'year' => $segment3]; 
		
		if(Auth::user()->id == 1){
		$res_count = \App\Equipmentmisreport::where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Equipmentmisreport::where($matchfields)->get();
		}
		
		}
		else
		{
		  $res_count = \App\Equipmentmisreport::whereIn('site', $sitearr)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Equipmentmisreport::whereIn('site', $sitearr)->where($matchfields)->get();
		}
		
		}
		
		$refid = array();
		/* GET REF ID*/
		if($formfieldarray){
		 foreach($formfieldarray as $formres){
		    $refid[$formres->site] = $formres->id;
		 }
		   
		 }
		 $issuecount = array();
		 $misresult = array();
		 $totalValues = array();
		  $ref_total = array();
		  if(count($refid) > 0){
		    $ref_overall = array();
			foreach($refid as $skey =>$ref){
			 $ref_a = array();
			
		  	$matchreffields = ['ref_id' => $ref, 'site' => $skey]; 
			$matchvalidfields = ['site' => $skey]; 
			
		    $tot_count = \App\Dailyreportvalidation::where($matchvalidfields)->count();
			if($tot_count > 0){
				 $tot_ress = \App\Dailyreportvalidation::where($matchvalidfields)->first();
				 $ref_total[$skey] = $tot_ress;
			} 
			$mismatchfields = ['month' => $segment4, 'year' => $segment3, 'site' =>$skey]; 
			
			$mismatchcount = \App\Equipmentmisreport::where($mismatchfields)->count();
			
			if($mismatchcount > 0){ 
				 $mismatch_ress = \App\Equipmentmisreport::where($mismatchfields)->first();
				 $misresult[$skey] = $mismatch_ress;
			} 
			
		  	$ref_count = \App\Equipmentnotworkingissue::where($matchreffields)->count();
			if($ref_count > 0){
			   $ref_count_val = \App\Equipmentnotworkingissue::where($matchreffields)->count(); 
			   $issuecount[$skey] = $ref_count_val;
			   $ref_record_val = \App\Equipmentnotworkingissue::where($matchreffields)->get();
			   foreach($ref_record_val as $ref_rec){
			      $ref_a[] = $ref_rec;
			   } 
			         
			   $ref_overall[$skey] =  $ref_a;
			}
			else{
			   $issuecount[$skey] = 0;
			   $ref_overall[$skey]= 0;
			}
			
			//MODIFIED ARRAY
			$ref_a_temp = array();
			if($ref_count > 0){
			   $ref_record_temp_val = \App\Equipmentnotworkingissue::where($matchreffields)->get();
			   foreach($ref_record_temp_val as $ref_temp_rec){
			      $ref_a_temp['category'][] = $ref_temp_rec->category;
				  $ref_a_temp['issue_des'][] = $ref_temp_rec->issue_des;
				  $ref_a_temp['root_cause'][] = $ref_temp_rec->root_cause;
				  $ref_a_temp['act_req_plan'][] = $ref_temp_rec->act_req_plan;
				  $ref_a_temp['pendingfromdays'][] = $ref_temp_rec->pendingfromdays;
				  $ref_a_temp['reponsibility'][] = $ref_temp_rec->reponsibility;
				  $ref_a_temp['notify_concern'][] = $ref_temp_rec->notify_concern;
			   } 
			          
			   $ref_overall_temp[$skey] =  $ref_a_temp;
			}
			else{
			 //  $issuecount[$skey] = 0;
			   //$ref_overall[$skey]= 0;
			   $ref_overall_temp[$skey] = 0;
			}

			 // END MODIFIED ARRAY
			
			}
		  }
		     arsort($issuecount);
			 
			 /*echo "<pre>";
			   print_r($ref_overall_temp);
			 echo "</pre>"; exit; */
		
		$relations = [
			'res' => $formfieldarray,  
			'sites' => $siteattrname,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'issues' => $ref_overall, 
			'issuecount' => $issuecount,
			'validation' => $ref_total, 
			'misres' => $misresult, 
			'issuetemp' => $ref_overall_temp,
			
			];     
			   		
  
		  //return view('misfiles.view.misfiresaftey', $relations);

		

		  /////return view('misfiles.view.miselectromechanical', $relations);
		  
		   $pdf = PDF::loadView('misprints.electomechanical', $relations);  

         // return $pdf->download('electomechanical.pdf'); 
		  /*  $monthName = date('F', mktime(0, 0, 0, $segment4, 10));   
			   $fnam = 'ElectroMechanicalEquipment_'.$monthName."_".$segment3.".pdf";
			  return $pdf->download($fnam); */
			  
			    date_default_timezone_set('Asia/Kolkata');
			$today_date = date('d');
			$today_time = date("g:i a");
			$monthName = date('F', mktime(0, 0, 0, $segment4, 10)); 
			 $fnam = 'ElectroMechanicalEquipment_'.$monthName."_".$today_date."_".$segment3."_".$today_time.".pdf";
            // return $pdf->download('metrowater.pdf'); //Download    
			  return $pdf->download($fnam);
			   		


		
		     
		   }
		   
		    else if($reporttype == 'stp_status'){
			   
	    $segment3 = $year;
		$segment4 = $month;  
		
		$formfieldarray = array();
		$siteattrname = array();
		$flatres = array(); 
		$ref_overall = array();
		$ref_overall_temp = array();
		
		$reportdate_val = "";
		$dateString = $segment3.'-'.$segment4.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$segment4."-".$segment3;
		
		
		
		
		 if(Auth::user()->id == 1){
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
			
		  }
		
		$matchfields = ['month' => $segment4, 'year' => $segment3]; 
		
		if(Auth::user()->id == 1){
		$res_count = \App\Stpmisreport::where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Stpmisreport::where($matchfields)->get();
		}
		
		}
		else
		{
		  $res_count = \App\Stpmisreport::whereIn('site', $sitearr)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Stpmisreport::whereIn('site', $sitearr)->where($matchfields)->get();
		}
		
		}
		
		$refid = array();
		/* GET REF ID*/
		if($formfieldarray){
		 foreach($formfieldarray as $formres){
		    $refid[$formres->site] = $formres->id;
		 }
		   
		 }
		 $issuecount = array(); 
		 $misresult = array();
		 $totalValues = array();
		  $ref_total = array();
		  if(count($refid) > 0){
		    $ref_overall = array();
			foreach($refid as $skey =>$ref){
			 $ref_a = array();
			
		  	$matchreffields = ['ref_id' => $ref, 'site' => $skey]; 
			$matchvalidfields = ['site' => $skey]; 
			
		    $tot_count = \App\Dailyreportvalidation::where($matchvalidfields)->count();
			if($tot_count > 0){
				 $tot_ress = \App\Dailyreportvalidation::where($matchvalidfields)->first();
				 $ref_total[$skey] = $tot_ress;
			} 
			$mismatchfields = ['month' => $segment4, 'year' => $segment3, 'site' =>$skey]; 
			
			$mismatchcount = \App\Stpmisreport::where($mismatchfields)->count();
			
			if($mismatchcount > 0){ 
				 $mismatch_ress = \App\Stpmisreport::where($mismatchfields)->first();
				 $misresult[$skey] = $mismatch_ress;
			} 
			
		  	$ref_count = \App\Stpnotworkingissue::where($matchreffields)->count();
			if($ref_count > 0){
			   $ref_count_val = \App\Stpnotworkingissue::where($matchreffields)->count(); 
			   $issuecount[$skey] = $ref_count_val;
			   $ref_record_val = \App\Stpnotworkingissue::where($matchreffields)->get();
			   foreach($ref_record_val as $ref_rec){
			      $ref_a[] = $ref_rec;
			   } 
			         
			   $ref_overall[$skey] =  $ref_a;
			}
			else{
			   $issuecount[$skey] = 0;
			   $ref_overall[$skey]= 0;
			}
			
			//MODIFIED ARRAY
			$ref_a_temp = array();
			if($ref_count > 0){
			   $ref_record_temp_val = \App\Stpnotworkingissue::where($matchreffields)->get();
			   foreach($ref_record_temp_val as $ref_temp_rec){
			      $ref_a_temp['category'][] = $ref_temp_rec->category;
				  $ref_a_temp['issue_des'][] = $ref_temp_rec->issue_des;
				  $ref_a_temp['root_cause'][] = $ref_temp_rec->root_cause;
				  $ref_a_temp['act_req_plan'][] = $ref_temp_rec->act_req_plan;
				  $ref_a_temp['pendingfromdays'][] = $ref_temp_rec->pendingfromdays;
				  $ref_a_temp['reponsibility'][] = $ref_temp_rec->reponsibility;
				  $ref_a_temp['notify_concern'][] = $ref_temp_rec->notify_concern;
			   } 
			          
			   $ref_overall_temp[$skey] =  $ref_a_temp;
			}
			else{
			 //  $issuecount[$skey] = 0;
			   //$ref_overall[$skey]= 0;
			   $ref_overall_temp[$skey] = 0;
			}

			 // END MODIFIED ARRAY
			
			}
		  }
		     arsort($issuecount);
			 
			 /*echo "<pre>";
			   print_r($ref_overall_temp);
			 echo "</pre>"; exit; */
		
		$relations = [
			'res' => $formfieldarray,  
			'sites' => $siteattrname,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'issues' => $ref_overall, 
			'issuecount' => $issuecount,
			'validation' => $ref_total, 
			'misres' => $misresult, 
			'issuetemp' => $ref_overall_temp,
			
			];     
			   		

		  /////return view('misfiles.view.stpstatus', $relations);
		   $pdf = PDF::loadView('misprints.stpstatus', $relations);  

         // return $pdf->download('stpstatus.pdf'); 
		   /*$monthName = date('F', mktime(0, 0, 0, $segment4, 10));   
			   $fnam = 'STPStatus'.$monthName."_".$segment3.".pdf";
			  return $pdf->download($fnam); */
			  
			     date_default_timezone_set('Asia/Kolkata');
			$today_date = date('d');
			$today_time = date("g:i a");
			$monthName = date('F', mktime(0, 0, 0, $segment4, 10)); 
			 $fnam = 'STPStatus_'.$monthName."_".$today_date."_".$segment3."_".$today_time.".pdf";
            // return $pdf->download('metrowater.pdf'); //Download    
			  return $pdf->download($fnam);

		  
			}
			
			else if($reporttype == 'wsp_status'){
			
			 $segment3 = $year;
		$segment4 = $month;  
		
		
		$formfieldarray = array();
		$siteattrname = array();
		$flatres = array(); 
		$ref_overall = array();
		$ref_overall_temp = array();
		
		$reportdate_val = "";
		$dateString = $segment3.'-'.$segment4.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$segment4."-".$segment3;
		
		
		
		
		 if(Auth::user()->id == 1){
		   $sitearr = explode(",",$selected_sites);
		  $sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');	  
		  }else{
			$role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$selected_sites);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
			
		  }
		
		$matchfields = ['month' => $segment4, 'year' => $segment3]; 
		
		if(Auth::user()->id == 1){
		$res_count = \App\Wspmisreport::where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Wspmisreport::where($matchfields)->get();
		}
		
		}
		else
		{
		  $res_count = \App\Wspmisreport::whereIn('site', $sitearr)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Wspmisreport::whereIn('site', $sitearr)->where($matchfields)->get();
		}
		
		}
		
		$refid = array();
		/* GET REF ID*/
		if($formfieldarray){
		 foreach($formfieldarray as $formres){
		    $refid[$formres->site] = $formres->id;
		 }
		   
		 }
		 $issuecount = array(); 
		 $misresult = array();
		 $totalValues = array();
		  $ref_total = array();
		  if(count($refid) > 0){
		    $ref_overall = array();
			foreach($refid as $skey =>$ref){
			 $ref_a = array();
			
		  	$matchreffields = ['ref_id' => $ref, 'site' => $skey]; 
			$matchvalidfields = ['site' => $skey]; 
			
		    $tot_count = \App\Dailyreportvalidation::where($matchvalidfields)->count();
			if($tot_count > 0){
				 $tot_ress = \App\Dailyreportvalidation::where($matchvalidfields)->first();
				 $ref_total[$skey] = $tot_ress;
			} 
			$mismatchfields = ['month' => $segment4, 'year' => $segment3, 'site' =>$skey]; 
			
			$mismatchcount = \App\Wspmisreport::where($mismatchfields)->count();
			
			if($mismatchcount > 0){ 
				 $mismatch_ress = \App\Wspmisreport::where($mismatchfields)->first();
				 $misresult[$skey] = $mismatch_ress;
			} 
			
		  	$ref_count = \App\Wspnotworkingissue::where($matchreffields)->count();
			if($ref_count > 0){
			   $ref_count_val = \App\Wspnotworkingissue::where($matchreffields)->count(); 
			   $issuecount[$skey] = $ref_count_val;
			   $ref_record_val = \App\Wspnotworkingissue::where($matchreffields)->get();
			   foreach($ref_record_val as $ref_rec){
			      $ref_a[] = $ref_rec;
			   } 
			         
			   $ref_overall[$skey] =  $ref_a;
			}
			else{
			   $issuecount[$skey] = 0;
			   $ref_overall[$skey]= 0;
			}
			
			//MODIFIED ARRAY
			$ref_a_temp = array();
			if($ref_count > 0){
			   $ref_record_temp_val = \App\Wspnotworkingissue::where($matchreffields)->get();
			   foreach($ref_record_temp_val as $ref_temp_rec){
			      $ref_a_temp['category'][] = $ref_temp_rec->category;
				  $ref_a_temp['issue_des'][] = $ref_temp_rec->issue_des;
				  $ref_a_temp['root_cause'][] = $ref_temp_rec->root_cause;
				  $ref_a_temp['act_req_plan'][] = $ref_temp_rec->act_req_plan;
				  $ref_a_temp['pendingfromdays'][] = $ref_temp_rec->pendingfromdays;
				  $ref_a_temp['reponsibility'][] = $ref_temp_rec->reponsibility;
				  $ref_a_temp['notify_concern'][] = $ref_temp_rec->notify_concern;
			   } 
			          
			   $ref_overall_temp[$skey] =  $ref_a_temp;
			}
			else{
			 //  $issuecount[$skey] = 0;
			   //$ref_overall[$skey]= 0;
			   $ref_overall_temp[$skey] = 0;
			}

			 // END MODIFIED ARRAY
			
			}
		  }
		     arsort($issuecount);
			 
			 /*echo "<pre>";
			   print_r($ref_overall_temp);
			 echo "</pre>"; exit; */
		
		$relations = [
			'res' => $formfieldarray,  
			'sites' => $siteattrname,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'issues' => $ref_overall, 
			'issuecount' => $issuecount,
			'validation' => $ref_total, 
			'misres' => $misresult, 
			'issuetemp' => $ref_overall_temp,
			
			];     
			   		
		  /////return view('misfiles.view.wspstatus', $relations);
		  
		    $pdf = PDF::loadView('misprints.wspstatus', $relations);  

        //  return $pdf->download('wspstatus.pdf');  
		  
		 /*   $monthName = date('F', mktime(0, 0, 0, $segment4, 10));   
			   $fnam = 'WSPStatus'.$monthName."_".$segment3.".pdf";
			  return $pdf->download($fnam);   */
			  
			     date_default_timezone_set('Asia/Kolkata');
			$today_date = date('d');
			$today_time = date("g:i a");
			$monthName = date('F', mktime(0, 0, 0, $segment4, 10)); 
			 $fnam = 'WSPStatus_'.$monthName."_".$today_date."_".$segment3."_".$today_time.".pdf";
            // return $pdf->download('metrowater.pdf'); //Download    
			  return $pdf->download($fnam);


		
			 
			}
			
		else if($reporttype == 'security_report'){

        $segment3 = $year;
		$segment4 = $month;
		
		$formfieldarray = array();
		$siteattrname = array();
		$flatres = array();
		$reportdate_val = "";
		$dateString = $segment3.'-'.$segment4.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$segment4."-".$segment3;

	      if(Auth::user()->id == 1){
	     
		    $sitearr = explode(",",$selected_sites);
		  $sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		  
		  }else{

            $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$selected_sites);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		
		  }
		  $existing_records = array();
		  $existing_Rates = array();
		  
		
		  
		$relations = [  
			'res' => $formfieldarray, 
			'sites' => $siteattrname,
			'borewellsnum' => $borewellsnum,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			];    

		

		$matchfields = ['month' => $segment4, 'year' => $segment3]; 

		$res_count = \App\Securitymisreport::where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Securitymisreport::where($matchfields)->get();
			
			  $exist_Sec = array();
			  $exist_SecTwo = array();
			 if(count($formfieldarray) > 0){
			     foreach($formfieldarray as $fieldarr){
				 	 $existing_records[$fieldarr->site] = array("id"=>$fieldarr->id,"guards"=>$fieldarr->guards,"l_guards"=>$fieldarr->l_guards,"h_guards"=>$fieldarr->h_guards,"supervisors"=>$fieldarr->supervisors,"aso"=>$fieldarr->aso,"so_num"=>$fieldarr->so_num,"nalla_gandla_hub"=>$fieldarr->nalla_gandla_hub,"hillpark_hub"=>$fieldarr->hillpark_hub);
					 
					 
							$current_month=$segment4;
							$current_year=$segment3;
							if($current_month==1)
							{
								$lastmonth=12;
								$lastyear = $current_year - 1;
							}
							else 
							{
								$lastmonth=$current_month-1;
								$lastyear = $current_year;
							} 
							$lastdateofmonth=date('t',$lastmonth);
							$report_on_date = $lastyear."-".$lastmonth."-".$lastdateofmonth;
							$security_match_fields = ['site' => $fieldarr->site,'reporton' => $report_on_date];
							$prev_sec_report_cn = \App\Securitydailyreport::where($security_match_fields)->count();
							 
							$eqpmatchfields = ['site' => $fieldarr->site]; 
							$equipcn = \App\Securitydailyreportvalidation::where($eqpmatchfields)->count();
							 if($equipcn > 0){
								$equipvalidation = \App\Securitydailyreportvalidation::where($eqpmatchfields)->first();
					          } 
					 
					 if(($fieldarr->site == 5 || $fieldarr->site == 6 || $fieldarr->site == 7 || $fieldarr->site == 8 || $fieldarr->site ==10 || $fieldarr->site ==14 || $fieldarr->site ==17 || $fieldarr->site == 16) &&  in_array($fieldarr->site, $sitearr)) {
					 $exist_Sec['sites'][$fieldarr->site] = get_sitename($fieldarr->site);
					 $exist_Sec['guards'][$fieldarr->site] = $fieldarr->guards;
					 $exist_Sec['l_guards'][$fieldarr->site] = $fieldarr->l_guards;
					 $exist_Sec['h_guards'][$fieldarr->site] = $fieldarr->h_guards;
					 $exist_Sec['supervisors'][$fieldarr->site] = $fieldarr->supervisors;
					 $exist_Sec['aso'][$fieldarr->site] = $fieldarr->aso;
					 $exist_Sec['so_num'][$fieldarr->site] = $fieldarr->so_num;
					 $exist_Sec['ctotval'][$fieldarr->site] = (float)$fieldarr->guards + (float)$fieldarr->l_guards + (float)$fieldarr->h_guards + (float)$fieldarr->supervisors + (float)$fieldarr->aso + (float)$fieldarr->so_num;
					 
					 $exist_Sec['nalla_gandla_hub'][$fieldarr->site] = $fieldarr->nalla_gandla_hub;
					 $exist_Sec['hillpark_hub'][$fieldarr->site] = $fieldarr->hillpark_hub;
					 /*if($prev_sec_report_cn > 0){
							$prev_sec_report = \App\Securitydailyreport::where($security_match_fields)->first();
					  $exist_Sec['wlkt'][$fieldarr->site]	= $prev_sec_report['nw_wt']."/".$equipvalidation['wt'];
					  $exist_Sec['torch'][$fieldarr->site]	= $prev_sec_report['nw_torch']."/".$equipvalidation['torches'];
					  $exist_Sec['biometric'][$fieldarr->site]	= $prev_sec_report['nw_bio']."/".$equipvalidation['biomachine'];
					  }  */
					  
					  if($prev_sec_report_cn > 0){
							$prev_sec_report = \App\Securitydailyreport::where($security_match_fields)->first();
					  if($prev_sec_report['nw_wt']) $exist_Sec['wlkt'][$fieldarr->site]	= $prev_sec_report['nw_wt']."/".$equipvalidation['wt']; else $exist_Sec['wlkt'][$fieldarr->site]	= "0"."/".$equipvalidation['wt'];
					 if($prev_sec_report['nw_torch']) $exist_Sec['torch'][$fieldarr->site]	= $prev_sec_report['nw_torch']."/".$equipvalidation['torches']; else $exist_Sec['torch'][$fieldarr->site]	= "0"."/".$equipvalidation['torches'];
					  if($prev_sec_report['nw_bio']) $exist_Sec['biometric'][$fieldarr->site]	= $prev_sec_report['nw_bio']."/".$equipvalidation['biomachine']; else $exist_Sec['biometric'][$fieldarr->site]	= "0"."/".$equipvalidation['biomachine'];
					  }  
					  
					  else
					  {
					     $exist_Sec['wlkt'][$fieldarr->site]	= "0"."/".$equipvalidation['wt'];
						 $exist_Sec['torch'][$fieldarr->site]	= "0"."/".$equipvalidation['torches'];
						 $exist_Sec['biometric'][$fieldarr->site]	= "0"."/".$equipvalidation['biomachine'];
					  }
					  
					  $exist_Sec['computer'][$fieldarr->site]	= $equipvalidation['computers'];
					  $exist_Sec['internetcon'][$fieldarr->site]	= $equipvalidation['internetcon'];
					  $exist_Sec['batons'][$fieldarr->site]	= $equipvalidation['av_batons'];
					  $exist_Sec['stlights'][$fieldarr->site]	= $equipvalidation['street_lights'];
					  $exist_Sec['bicycle'][$fieldarr->site]	= $equipvalidation['bicycle'];
							
					 } else if(($fieldarr->site == 9 || $fieldarr->site == 11 || $fieldarr->site == 12 || $fieldarr->site == 13 || $fieldarr->site ==15 || $fieldarr->site ==18 || $fieldarr->site ==19 || $fieldarr->site == 20) &&  in_array($fieldarr->site, $sitearr)) {
					 
					  $exist_SecTwo['sites'][$fieldarr->site] = get_sitename($fieldarr->site);
					 $exist_SecTwo['guards'][$fieldarr->site] = $fieldarr->guards;
					 $exist_SecTwo['l_guards'][$fieldarr->site] = $fieldarr->l_guards;
					 $exist_SecTwo['h_guards'][$fieldarr->site] = $fieldarr->h_guards;
					 $exist_SecTwo['supervisors'][$fieldarr->site] = $fieldarr->supervisors;
					 $exist_SecTwo['aso'][$fieldarr->site] = $fieldarr->aso;
					 $exist_SecTwo['so_num'][$fieldarr->site] = $fieldarr->so_num;
					 
					  $exist_SecTwo['ctotval'][$fieldarr->site] = (float)$fieldarr->guards + (float)$fieldarr->l_guards + (float)$fieldarr->h_guards + (float)$fieldarr->supervisors + (float)$fieldarr->aso + (float)$fieldarr->so_num;
					  
					 $exist_SecTwo['nalla_gandla_hub'][$fieldarr->site] = $fieldarr->nalla_gandla_hub;
					 $exist_SecTwo['hillpark_hub'][$fieldarr->site] = $fieldarr->hillpark_hub;
					  if($prev_sec_report_cn > 0){
							$prev_sec_report = \App\Securitydailyreport::where($security_match_fields)->first();
					  if($prev_sec_report['nw_wt']) $exist_SecTwo['wlkt'][$fieldarr->site]	= $prev_sec_report['nw_wt']."/".$equipvalidation['wt']; else $exist_SecTwo['wlkt'][$fieldarr->site]	= "0"."/".$equipvalidation['wt'];
					 if($prev_sec_report['nw_torch']) $exist_SecTwo['torch'][$fieldarr->site]	= $prev_sec_report['nw_torch']."/".$equipvalidation['torches']; else $exist_SecTwo['torch'][$fieldarr->site]	= "0"."/".$equipvalidation['torches'];
					  if($prev_sec_report['nw_bio']) $exist_SecTwo['biometric'][$fieldarr->site]	= $prev_sec_report['nw_bio']."/".$equipvalidation['biomachine']; else $exist_SecTwo['biometric'][$fieldarr->site]	= "0"."/".$equipvalidation['biomachine'];
					  }  
					  
					  else
					  {
					     $exist_SecTwo['wlkt'][$fieldarr->site]	= "0"."/".$equipvalidation['wt'];
						 $exist_SecTwo['torch'][$fieldarr->site]	= "0"."/".$equipvalidation['torches'];
						 $exist_SecTwo['biometric'][$fieldarr->site]	= "0"."/".$equipvalidation['biomachine'];
					  }
					  $exist_SecTwo['computer'][$fieldarr->site]	= $equipvalidation['computers'];
					  $exist_SecTwo['internetcon'][$fieldarr->site]	= $equipvalidation['internetcon'];
					  $exist_SecTwo['batons'][$fieldarr->site]	= $equipvalidation['av_batons'];
					  $exist_SecTwo['stlights'][$fieldarr->site]	= $equipvalidation['street_lights'];
					  $exist_SecTwo['bicycle'][$fieldarr->site]	= $equipvalidation['bicycle'];
					    
					 }
				 } 
				 
				//echo "<pre>"; print_r($exist_SecTwo);echo "</pre>";
			 }  
			 
			 //exit;
			
			$relations = [
			'res' => $formfieldarray,  
			'sites' => $siteattrname,
			'borewellsnum' => $borewellsnum,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			'existsec' => $exist_Sec,
			'existsectwo' => $exist_SecTwo,
			];     
			  
		 }

		 ///// return view('misfiles.view.missecurityone', $relations);
		 
		   $pdf = PDF::loadView('misprints.missecurityoneprint', $relations);  

         // return $pdf->download('security.pdf');   
		  
		 /* $monthName = date('F', mktime(0, 0, 0, $segment4, 10));   
			   $fnam = 'SecurityReport'.$monthName."_".$segment3.".pdf";
			  return $pdf->download($fnam);   */
			  
			    date_default_timezone_set('Asia/Kolkata');
			$today_date = date('d');
			$today_time = date("g:i a");
			$monthName = date('F', mktime(0, 0, 0, $segment4, 10)); 
			 $fnam = 'SecurityReport_'.$monthName."_".$today_date."_".$segment3."_".$today_time.".pdf";
            // return $pdf->download('metrowater.pdf'); //Download    
			  return $pdf->download($fnam);

		
		}
		
	  else if($reporttype == 'house_keeping_report'){
			 
		$segment3 = $year;
		$segment4 = $month;  	   
	
		$formfieldarray = array();
		$siteattrname = array();
		$flatres = array();
		$reportdate_val = "";
		$dateString = $segment3.'-'.$segment4.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$segment4."-".$segment3;

	       if(Auth::user()->id == 1){
		    $sitearr = explode(",",$selected_sites);
		  $sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		   
		  }else{ 
		  
		   $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$selected_sites);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
			
		  }
		  
		  $existing_records = array();
		  $existing_Rates = array();
		  $deployment = array();
		  
		  $getratescn =  \App\Pmsdailyreportvalidation::count();
		  if($getratescn > 0){
		     $getratesRes =  \App\Pmsdailyreportvalidation::get();
			  foreach($getratesRes as $rate){
			   $existing_Rates[$rate->site] = array("one_bhk"=>$rate->one_bhk,"two_bhk"=>$rate->two_bhk,"three_bhk"=>$rate->three_bhk,"four_bhk"=>$rate->four_bhk);
			  }
		  } 
		  
		
			
        foreach($siteattrname as $dep => $deploy){
		   $deppmatchfields = ['site' => $dep];
		   $deprescn = \App\Pmsdailyreportvalidation::where($deppmatchfields)->count();
		   if($deprescn > 0){
		   		$depresult = \App\Pmsdailyreportvalidation::where($deppmatchfields)->first();
				//$deployment['deployment'][$dep] = (float)$depresult['house_sup'] + (float)$depresult['house_help'] + (float)$depresult['clu_hs_fo'] +  (float)$depresult['clu_hs_hk'] +  (float)$depresult['other'];
				$deployment['deployment'][$dep] =  (float)$depresult['house_help'] + (float)$depresult['clu_hs_hk'];
			} 	else{
			   $deployment['deployment'][$dep] = 0;
			}
		  }

		$matchfields = ['month' => $segment4, 'year' => $segment3]; 

		$res_count = \App\Housekpmisreport::where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Housekpmisreport::where($matchfields)->get();
				// echo "<pre>"; print_r($existing_records);echo "</pre>";
			 //exit; 
			 $existing_records = array();
			 foreach($formfieldarray  as $existing){
			    $existing_records[$existing['site']] = $existing;
			 }
			
		  }
		  
		  $relations = [
			'res' => $formfieldarray,  
			'sites' => $siteattrname,
			'flats' => $flatres,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			'cost' => $existing_Rates,
			'deployment' => $deployment, 
			];     

		  /////return view('misfiles.view.mishousekeeping', $relations);
		  
		   $pdf = PDF::loadView('misprints.housekeepingoneprint', $relations);  
		  
		   $pdf->setPaper('A4', 'landscape');

         // return $pdf->download('housekeeping.pdf');   
		  
		 /*  $monthName = date('F', mktime(0, 0, 0, $segment4, 10));   
			   $fnam = 'HousekeepingReport'.$monthName."_".$segment3.".pdf";
			  return $pdf->download($fnam);   */
			  
			    date_default_timezone_set('Asia/Kolkata');
			$today_date = date('d');
			$today_time = date("g:i a");
			$monthName = date('F', mktime(0, 0, 0, $segment4, 10)); 
			 $fnam = 'HousekeepingReport_'.$monthName."_".$today_date."_".$segment3."_".$today_time.".pdf";
            // return $pdf->download('metrowater.pdf'); //Download    
			  return $pdf->download($fnam);

			}
			
			else if($reporttype == 'horticulture_report'){
			
	   $segment3 = $year;
		$segment4 = $month;  
			
		$formfieldarray = array();
		$siteattrname = array();
		$flatres = array();
		$reportdate_val = "";
		$dateString = $segment3.'-'.$segment4.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$segment4."-".$segment3;

	       if(Auth::user()->id == 1){
		  $sitearr = explode(",",$selected_sites);
		  $sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		   
		  }else{ 
		  
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$selected_sites);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
			
		  }
		  
		  $existing_records = array();
		  $existing_records_two = array();
		  $existing_records_three = array();
		  $existing_Rates = array();
		  $deployment = array();
		  
		  $getratescn =  \App\Pmsdailyreportvalidation::count();
		  if($getratescn > 0){
		     $getratesRes =  \App\Pmsdailyreportvalidation::get();
			  foreach($getratesRes as $rate){
			   $existing_Rates[$rate->site] = array("one_bhk"=>$rate->one_bhk,"two_bhk"=>$rate->two_bhk,"three_bhk"=>$rate->three_bhk,"four_bhk"=>$rate->four_bhk);
			  }
		  } 
		  
			
        foreach($siteattrname as $dep => $deploy){
		   $deppmatchfields = ['site' => $dep];
		   $deprescn = \App\Pmsdailyreportvalidation::where($deppmatchfields)->count();
		   if($deprescn > 0){
		   		$depresult = \App\Pmsdailyreportvalidation::where($deppmatchfields)->first();
				//$deployment['deployment'][$dep] = (float)$depresult['house_sup'] + (float)$depresult['house_help'] + (float)$depresult['clu_hs_fo'] +  (float)$depresult['clu_hs_hk'] +  (float)$depresult['other'];
				$deployment['deployment'][$dep] =  (float)$depresult['house_help'] + (float)$depresult['clu_hs_hk'];
			} 	else{
			   $deployment['deployment'][$dep] = 0;
			}
		  }

		$matchfields = ['month' => $segment4, 'year' => $segment3]; 

		$res_count = \App\Horticulturemisreport::where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Horticulturemisreport::where($matchfields)->get();
				// echo "<pre>"; print_r($existing_records);echo "</pre>";
			 //exit; 
			 $existing_records = array();
			 foreach($formfieldarray  as $existing){
			 
			    
			    $existing_records['varmicompost'][$existing['site']] = $existing['varmicompost'];
				$existing_records['chloropyriphos'][$existing['site']] = $existing['chloropyriphos'];
				$existing_records['monocrotophos'][$existing['site']] = $existing['monocrotophos'];
				$existing_records['monocrotophos'][$existing['site']] = $existing['monocrotophos'];
				$existing_records['imidaclopride'][$existing['site']] = $existing['imidaclopride'];
				$existing_records['bavistin'][$existing['site']] = $existing['bavistin'];
				$existing_records['dhanvit'][$existing['site']] = $existing['dhanvit'];
				$existing_records['multiplex'][$existing['site']] = $existing['multiplex'];
				$existing_records['furadon'][$existing['site']] = $existing['furadon'];
				$existing_records['phorate'][$existing['site']] = $existing['phorate'];
				$existing_records['nineteenkgs'][$existing['site']] = $existing['nineteenkgs'];
				$existing_records['nineteenkgssoluble'][$existing['site']] = $existing['nineteenkgssoluble'];
				$existing_records['acephate'][$existing['site']] = $existing['acephate'];
				$existing_records['seventeenkgs'][$existing['site']] = $existing['seventeenkgs'];
				$existing_records['urea'][$existing['site']] = $existing['urea'];
				$existing_records['potash'][$existing['site']] = $existing['potash'];
				$existing_records['rogar'][$existing['site']] = $existing['rogar'];
				$existing_records['malathian'][$existing['site']] = $existing['malathian'];
				$existing_records['fouate'][$existing['site']] = $existing['fouate'];
				$existing_records['fifteenkgs'][$existing['site']] = $existing['fifteenkgs'];
				$existing_records['twofourdkgs'][$existing['site']] = $existing['twofourdkgs'];
				$existing_records['glycil'][$existing['site']] = $existing['glycil'];
				$existing_records['sixteenkgs'][$existing['site']] = $existing['sixteenkgs'];
				$existing_records['arrowltrs'][$existing['site']] = $existing['arrowltrs'];
				$existing_records['biowetltrs'][$existing['site']] = $existing['biowetltrs'];
				$existing_records['blitaxkgs'][$existing['site']] = $existing['blitaxkgs'];
				$existing_records['twentykgs'][$existing['site']] = $existing['twentykgs'];
				
				
				
				
			 }
			
		  }
		  
		  foreach($siteattrname as $sk => $sitena){
		  
		    $matchhuskpfields = ['month' => $segment4, 'year' => $segment3, 'site' => $sk];
			 $hsk_count = \App\Horticulturemisreport::where($matchhuskpfields)->count();
			 if($hsk_count > 0){
			 	$hsk_arr = \App\Horticulturemisreport::where($matchfields)->first();
				
				$existing_records['varmicompost'][$sk] = $hsk_arr['varmicompost'];
				$existing_records['chloropyriphos'][$sk] = $hsk_arr['chloropyriphos'];
				$existing_records['monocrotophos'][$sk] = $hsk_arr['monocrotophos'];
				$existing_records['imidaclopride'][$sk] = $hsk_arr['imidaclopride'];
				$existing_records['bavistin'][$sk] = $hsk_arr['bavistin'];
				$existing_records['dhanvit'][$sk] = $hsk_arr['dhanvit'];
				$existing_records['multiplex'][$sk] = $hsk_arr['multiplex'];
				$existing_records['furadon'][$sk] = $hsk_arr['furadon'];
				$existing_records['phorate'][$sk] = $hsk_arr['phorate'];
				$existing_records['nineteenkgs'][$sk] = $hsk_arr['nineteenkgs'];
				$existing_records['nineteenkgssoluble'][$sk] = $hsk_arr['nineteenkgssoluble'];
				$existing_records['acephate'][$sk] = $hsk_arr['acephate'];
				$existing_records['seventeenkgs'][$sk] = $hsk_arr['seventeenkgs'];
				$existing_records['urea'][$sk] = $hsk_arr['urea'];
				$existing_records['potash'][$sk] = $hsk_arr['potash'];
				$existing_records['rogar'][$sk] = $hsk_arr['rogar'];
				$existing_records['malathian'][$sk] = $hsk_arr['malathian'];
				$existing_records['fouate'][$sk] = $hsk_arr['fouate'];
				$existing_records['fifteenkgs'][$sk] = $hsk_arr['fifteenkgs'];
				$existing_records['twofourdkgs'][$sk] = $hsk_arr['twofourdkgs'];
				$existing_records['glycil'][$sk] = $hsk_arr['glycil'];
				$existing_records['sixteenkgs'][$sk] = $hsk_arr['sixteenkgs'];
				$existing_records['arrowltrs'][$sk] = $hsk_arr['arrowltrs'];
				$existing_records['biowetltrs'][$sk] = $hsk_arr['biowetltrs'];
				$existing_records['blitaxkgs'][$sk] = $hsk_arr['blitaxkgs'];
				$existing_records['twentykgs'][$sk] = $hsk_arr['twentykgs'];
				
			 }
			 else
			 {
			    $existing_records['varmicompost'][$sk] = "";
				$existing_records['chloropyriphos'][$sk] = "";
				$existing_records['monocrotophos'][$sk] = "";
				$existing_records['imidaclopride'][$sk] = "";
				$existing_records['bavistin'][$sk] = "";
				$existing_records['dhanvit'][$sk] = "";
				$existing_records['multiplex'][$sk] = "";
				$existing_records['furadon'][$sk] = "";
				$existing_records['phorate'][$sk] = "";
				$existing_records['nineteenkgs'][$sk] = "";
				$existing_records['nineteenkgssoluble'][$sk] = "";
				$existing_records['acephate'][$sk] = "";
				$existing_records['seventeenkgs'][$sk] = "";
				$existing_records['urea'][$sk] = "";
				$existing_records['potash'][$sk] = "";
				$existing_records['rogar'][$sk] = "";
				$existing_records['malathian'][$sk] = "";
				$existing_records['fouate'][$sk] = "";
				$existing_records['fifteenkgs'][$sk] = "";
				$existing_records['twofourdkgs'][$sk] = "";
				$existing_records['glycil'][$sk] = "";
				$existing_records['sixteenkgs'][$sk] = "";
				$existing_records['arrowltrs'][$sk] = "";
				$existing_records['biowetltrs'][$sk] = "";
				$existing_records['blitaxkgs'][$sk] = "";
				$existing_records['twentykgs'][$sk] = "";   
			 }
		    
		  }
		  
		  
		    foreach($siteattrname as $sk => $sitena){
		  
		    $matchhuskpfields = ['month' => $segment4, 'year' => $segment3, 'site' => $sk];
			 if(($sk == 5 || $sk == 6 || $sk == 7 || $sk == 8 || $sk ==10 || $sk ==14 || $sk ==17 || $sk == 16) && in_array($sk,$sitearr)) {
				 $existing_records_two['sites'][$sk] = get_sitename($sk);
			 $hsk_count = \App\Horticulturemisreport::where($matchhuskpfields)->count();
			 if($hsk_count > 0){
			 	$hsk_arr = \App\Horticulturemisreport::where($matchfields)->first();
				$existing_records_two['watering'][$sk] = $hsk_arr['watering'];
				$existing_records_two['cleaning'][$sk] = $hsk_arr['cleaning'];
				$existing_records_two['weeding'][$sk] = $hsk_arr['weeding'];
				$existing_records_two['cutting'][$sk] = $hsk_arr['cutting'];
				$existing_records_two['multching'][$sk] = $hsk_arr['multching'];
				$existing_records_two['trimming'][$sk] = $hsk_arr['trimming'];
				$existing_records_two['training_shaping'][$sk] = $hsk_arr['training_shaping'];
				$existing_records_two['pruning'][$sk] = $hsk_arr['pruning'];
				$existing_records_two['hoeing'][$sk] = $hsk_arr['hoeing'];
				$existing_records_two['lawn_moving'][$sk] = $hsk_arr['lawn_moving'];
				$existing_records_two['fertilizer_application'][$sk] = $hsk_arr['fertilizer_application'];
				$existing_records_two['organic_manure_app'][$sk] = $hsk_arr['organic_manure_app'];
				$existing_records_two['spraying_chemicals'][$sk] = $hsk_arr['spraying_chemicals'];
				$existing_records_two['micro_nutrients'][$sk] = $hsk_arr['micro_nutrients'];
				$existing_records_two['weedicide_application'][$sk] = $hsk_arr['weedicide_application'];
				$existing_records_two['mandays_perday'][$sk] = $hsk_arr['mandays_perday'];
				
				}else{
				
				$existing_records_two['watering'][$sk] = "";
				$existing_records_two['cleaning'][$sk] = "";
				$existing_records_two['weeding'][$sk] = "";
				$existing_records_two['cutting'][$sk] = "";
				$existing_records_two['multching'][$sk] = "";
				$existing_records_two['trimming'][$sk] = "";
				$existing_records_two['training_shaping'][$sk] = "";
				$existing_records_two['pruning'][$sk] = "";
				$existing_records_two['hoeing'][$sk] = "";
				$existing_records_two['lawn_moving'][$sk] = "";
				$existing_records_two['fertilizer_application'][$sk] = "";
				$existing_records_two['organic_manure_app'][$sk] = "";
				$existing_records_two['spraying_chemicals'][$sk] = "";
				$existing_records_two['micro_nutrients'][$sk] = "";
				$existing_records_two['weedicide_application'][$sk] = "";
				$existing_records_two['mandays_perday'][$sk] = "";
				
				}
				 } else if(($sk == 9 || $sk == 11 || $sk == 12 || $sk == 13 || $sk ==15 || $sk ==18 || $sk ==19 || $sk == 20) && in_array($sk,$sitearr)) {
				  
				 $existing_records_three['sites'][$sk] = get_sitename($sk);
				  $hsk_count = \App\Horticulturemisreport::where($matchhuskpfields)->count();
			 if($hsk_count > 0){
			 	$hsk_arr = \App\Horticulturemisreport::where($matchfields)->first();
				
				
				
				$existing_records_three['watering'][$sk] = $hsk_arr['watering'];
				$existing_records_three['cleaning'][$sk] = $hsk_arr['cleaning'];
				$existing_records_three['weeding'][$sk] = $hsk_arr['weeding'];
				$existing_records_three['cutting'][$sk] = $hsk_arr['cutting'];
				$existing_records_three['multching'][$sk] = $hsk_arr['multching'];
				$existing_records_three['trimming'][$sk] = $hsk_arr['trimming'];
				$existing_records_three['training_shaping'][$sk] = $hsk_arr['training_shaping'];
				$existing_records_three['pruning'][$sk] = $hsk_arr['pruning'];
				$existing_records_three['hoeing'][$sk] = $hsk_arr['hoeing'];
				$existing_records_three['lawn_moving'][$sk] = $hsk_arr['lawn_moving'];
				$existing_records_three['fertilizer_application'][$sk] = $hsk_arr['fertilizer_application'];
				$existing_records_three['organic_manure_app'][$sk] = $hsk_arr['organic_manure_app'];
				$existing_records_three['spraying_chemicals'][$sk] = $hsk_arr['spraying_chemicals'];
				$existing_records_three['micro_nutrients'][$sk] = $hsk_arr['micro_nutrients'];
				$existing_records_three['weedicide_application'][$sk] = $hsk_arr['weedicide_application'];
				$existing_records_three['mandays_perday'][$sk] = $hsk_arr['mandays_perday'];
				}else{
				
				$existing_records_three['watering'][$sk] = "";
				$existing_records_three['cleaning'][$sk] = "";
				$existing_records_three['weeding'][$sk] = "";
				$existing_records_three['cutting'][$sk] = "";
				$existing_records_three['multching'][$sk] = "";
				$existing_records_three['trimming'][$sk] = "";
				$existing_records_three['training_shaping'][$sk] = "";
				$existing_records_three['pruning'][$sk] = "";
				$existing_records_three['hoeing'][$sk] = "";
				$existing_records_three['lawn_moving'][$sk] = "";
				$existing_records_three['fertilizer_application'][$sk] = "";
				$existing_records_three['organic_manure_app'][$sk] = "";
				$existing_records_three['spraying_chemicals'][$sk] = "";
				$existing_records_three['micro_nutrients'][$sk] = "";
				$existing_records_three['weedicide_application'][$sk] = "";
				$existing_records_three['mandays_perday'][$sk] = "";
				
				}
				    
				 }
			}
		    
		  $relations = [
			'res' => $formfieldarray,  
			'sites' => $siteattrname,
			'flats' => $flatres,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			'existing_two' => $existing_records_two,
			'existing_three' => $existing_records_three,
			'cost' => $existing_Rates,
			'deployment' => $deployment, 
			];   
		  
		  
		 ////// return view('misfiles.view.horticulturepestone', $relations);
		 
		  $pdf = PDF::loadView('misprints.horticulturereportprintone', $relations);  

         // return $pdf->download('horticulture.pdf');   
		
	/*	 $monthName = date('F', mktime(0, 0, 0, $segment4, 10));   
			   $fnam = 'HorticultureReport'.$monthName."_".$segment3.".pdf";
			  return $pdf->download($fnam);  */
			  
			    $pdf->setPaper('A4', 'landscape');
			    date_default_timezone_set('Asia/Kolkata');
			$today_date = date('d');
			$today_time = date("g:i a");
			$monthName = date('F', mktime(0, 0, 0, $segment4, 10)); 
			 $fnam = 'HorticultureReport_'.$monthName."_".$today_date."_".$segment3."_".$today_time.".pdf";
            // return $pdf->download('metrowater.pdf'); //Download    
			  return $pdf->download($fnam); 

		
			} 
			else if($reporttype == 'club_house_utilization_data'){
			
		$segment3 = $year;
		$segment4 = $month;  
		
		$formfieldarray = array();
		$siteattrname = array();
		$flatres = array();
		$reportdate_val = "";
		$dateString = $segment3.'-'.$segment4.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$segment4."-".$segment3;

	      if(Auth::user()->id == 1){
	    
		    $sitearr = explode(",",$selected_sites);
		  $sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  
		  }else{
		  
		     $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$selected_sites);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id'); 
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
			
		  }
		  $existing_records = array();
		  $existing_Rates = array();
		  
		  $getratescn =  \App\Pmsdailyreportvalidation::count();
		  if($getratescn > 0){
		     $getratesRes =  \App\Pmsdailyreportvalidation::get();
			  foreach($getratesRes as $rate){
			   $existing_Rates[$rate->site] = array("one_bhk"=>$rate->one_bhk,"two_bhk"=>$rate->two_bhk,"three_bhk"=>$rate->three_bhk,"four_bhk"=>$rate->four_bhk);
			  }
		  } 
		  
		$relations = [  
			'res' => $formfieldarray, 
			'sites' => $siteattrname,
			'flats' => $flatres,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			'cost' => $existing_Rates,
			];    

		

		$matchfields = ['month' => $segment4, 'year' => $segment3]; 

		$res_count = \App\Clubutilizationmisreport::where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Clubutilizationmisreport::where($matchfields)->get();
			
			
			 if(count($formfieldarray) > 0){
			     foreach($formfieldarray as $fieldarr){
				 	 $existing_records[$fieldarr->site] = array("id"=>$fieldarr->id,"avg_occupancy"=>$fieldarr->avg_occupancy,"avg_daily_swim"=>$fieldarr->avg_daily_swim,"avg_daily_gym"=>$fieldarr->avg_daily_gym,'occ_flat_swim' =>$fieldarr->occ_flat_swim,'occ_gym_swim' =>$fieldarr->occ_gym_swim);
				 } 
				 
				// echo "<pre>"; print_r($existing_records);echo "</pre>";
			 }  
			 }
			 //exit;
			
			$relations = [
			'res' => $formfieldarray,  
			'sites' => $siteattrname,
			'flats' => $flatres,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			'cost' => $existing_Rates,
			];     
			 

		 ///// return view('misfiles.view.misclubhouse', $relations);
		 
		  $pdf = PDF::loadView('misprints.clubhouseprint', $relations);

        //return $pdf->download('clubhouse.pdf'); //Download 
		
		/* $monthName = date('F', mktime(0, 0, 0, $segment4, 10));   
			   $fnam = 'ClubHouseUtilizationData'.$monthName."_".$segment3.".pdf";
			  return $pdf->download($fnam);  */  
			  
			    date_default_timezone_set('Asia/Kolkata');
			$today_date = date('d');
			$today_time = date("g:i a");
			$monthName = date('F', mktime(0, 0, 0, $segment4, 10)); 
			 $fnam = 'ClubHouseUtilizationData_'.$monthName."_".$today_date."_".$segment3."_".$today_time.".pdf";
            // return $pdf->download('metrowater.pdf'); //Download    
			  return $pdf->download($fnam);  

		
	
		}
		
			else if($reporttype == 'occupancy_data'){
			$segment3 = $year;
		  $segment4 = $month;  

			 
		$formfieldarray = array();
		$siteattrname = array();
		$flatres = array();
		$reportdate_val = "";
		$dateString = $segment3.'-'.$segment4.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$segment4."-".$segment3;

	      if(Auth::user()->id == 1){

			$sitearr = explode(",",$selected_sites);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{

            $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$selected_sites);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site'); 		
		  }
		  $existing_records = array();
		  $existing_Rates = array();
		  
		  $getratescn =  \App\Pmsdailyreportvalidation::count();
		  if($getratescn > 0){
		     $getratesRes =  \App\Pmsdailyreportvalidation::get();
			  foreach($getratesRes as $rate){
			   $existing_Rates[$rate->site] = array("one_bhk"=>$rate->one_bhk,"two_bhk"=>$rate->two_bhk,"three_bhk"=>$rate->three_bhk,"four_bhk"=>$rate->four_bhk);
			  }
		  } 
		  
		$relations = [  
			'res' => $formfieldarray, 
			'sites' => $siteattrname,
			'flats' => $flatres,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			'cost' => $existing_Rates,
			];    

		

		$matchfields = ['month' => $segment4, 'year' => $segment3]; 

		$res_count = \App\Occupancymisreport::where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Occupancymisreport::where($matchfields)->get();
			
			
			 if(count($formfieldarray) > 0){
			     foreach($formfieldarray as $fieldarr){
				 	 $existing_records[$fieldarr->site] = array("id"=>$fieldarr->id,"owners"=>$fieldarr->owners,"tenants"=>$fieldarr->tenants,"vacant"=>$fieldarr->vacant);
				 } 
				 
				// echo "<pre>"; print_r($existing_records);echo "</pre>";
			 }  
			 
			 //exit;
			
			$relations = [
			'res' => $formfieldarray,  
			'sites' => $siteattrname,
			'flats' => $flatres,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			'cost' => $existing_Rates,
			];     
			 
			
			 ///////return view('misfiles.view.occupancy', $relations);
			 
			 $pdf = PDF::loadView('misprints.occupancyprint', $relations);

        		  //return $pdf->download('occupancy.pdf'); //Download  
				 /* 
				   $monthName = date('F', mktime(0, 0, 0, $segment4, 10));   
			   $fnam = 'OccupancyData'.$monthName."_".$segment3.".pdf";
			  return $pdf->download($fnam);   */   
			  
			   date_default_timezone_set('Asia/Kolkata');
			$today_date = date('d');
			$today_time = date("g:i a");
			$monthName = date('F', mktime(0, 0, 0, $segment4, 10)); 
			 $fnam = 'OccupancyData_'.$monthName."_".$today_date."_".$segment3."_".$today_time.".pdf";
            // return $pdf->download('metrowater.pdf'); //Download    
			  return $pdf->download($fnam);    
			  
			}
			
			} 
			
			else if($reporttype == 'indented_material_status'){
			
		$segment3 = $year;
		$segment4 = $month;
		
		$formfieldarray = array();
		$siteattrname = array();
		$flatres = array();
		$reportdate_val = "";
		$dateString = $segment3.'-'.$segment4.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$segment4."-".$segment3;

	      if(Auth::user()->id == 1){
	  
		   $sitearr = explode(",",$selected_sites);
		  $sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{
		  
		   $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$selected_sites);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
			
		  }
		  $existing_records = array();
		  $existing_Rates = array();
		  
		  $getratescn =  \App\Pmsdailyreportvalidation::count();
		  if($getratescn > 0){
		     $getratesRes =  \App\Pmsdailyreportvalidation::get();
			  foreach($getratesRes as $rate){
			   $existing_Rates[$rate->site] = array("one_bhk"=>$rate->one_bhk,"two_bhk"=>$rate->two_bhk,"three_bhk"=>$rate->three_bhk,"four_bhk"=>$rate->four_bhk);
			  }
		  } 
		  
		$relations = [  
			'res' => $formfieldarray, 
			'sites' => $sitenames,
			'flats' => $flatres,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			'cost' => $existing_Rates,
			];    

		

		$matchfields = ['month' => $segment4, 'year' => $segment3]; 

		$res_count = \App\Indentedmisreport::where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Indentedmisreport::where($matchfields)->get();
			
			
			 if(count($formfieldarray) > 0){
			     foreach($formfieldarray as $fieldarr){
				 	 $existing_records[$fieldarr->site] = $fieldarr;
				 } 
				 
				 //echo "<pre>"; print_r($existing_records);echo "</pre>"; exit;
			 }  
			 
			 }
			 
			 $indentrep_Array = array();
			 $lagged_date = array();
			 foreach($siteattrname as $stk => $siten) {
			 
			  $match_in_fields = ['month' => $segment4, 'year' => $segment3, 'site' =>$stk]; 
			  $match_in_count = \App\Indentedmisreport::where($match_in_fields)->count();
		
		       if($match_in_count > 0){
			   	    $match_in_array = \App\Indentedmisreport::where($match_in_fields)->get();
					$match_lag_array = \App\Indentedmisreport::where($match_in_fields)->first();
					
					$indentrep_Array[$stk] = $match_in_array;
					$lagged_date[$stk] = $match_lag_array->laggeddate;
			   }
			   else{
			       $indentrep_Array[$stk] = array();
			   }
			   
			   
			 }
			 
			 //exit;
			
			$relations = [
			'res' => $formfieldarray,  
			'sites' => $sitenames,
			'flats' => $flatres,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			'indentrep' => $indentrep_Array,
			'cost' => $existing_Rates,
			'laggeddate' => $lagged_date,
			];   
			
		     

		//////  return view('misfiles.view.materialindented', $relations);
		
		 $pdf = PDF::loadView('misprints.materialindented', $relations);

           //return $pdf->download('materialindented.pdf'); //Download     
		   
		    /* $monthName = date('F', mktime(0, 0, 0, $segment4, 10));   
			   $fnam = 'IndentedMaterialStatus'.$monthName."_".$segment3.".pdf";
			  return $pdf->download($fnam);   */   
			  
			   date_default_timezone_set('Asia/Kolkata');
			$today_date = date('d');
			$today_time = date("g:i a");
			$monthName = date('F', mktime(0, 0, 0, $segment4, 10)); 
			 $fnam = 'IndentedMaterialStatus_'.$monthName."_".$today_date."_".$segment3."_".$today_time.".pdf";
            // return $pdf->download('metrowater.pdf'); //Download    
			  return $pdf->download($fnam); 

		
			 
			}
			
			else if($reporttype == 'apna_complex'){
			
       	$segment3 = $year;
		$segment4 = $month;  

		$formfieldarray = array();
		$siteattrname = array();
		$flatres = array();
		$reportdate_val = "";
		$dateString = $segment3.'-'.$segment4.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$segment4."-".$segment3;

	      if(Auth::user()->id == 1){
		  
		   $sitearr = explode(",",$selected_sites);
		  $sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }else{
		         
			$role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$selected_sites);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
			
		  
		  }
		  $existing_records = array();
		  $existing_Rates = array();
		  
		  $getratescn =  \App\Pmsdailyreportvalidation::count();
		  if($getratescn > 0){
		     $getratesRes =  \App\Pmsdailyreportvalidation::get();
			  foreach($getratesRes as $rate){
			   $existing_Rates[$rate->site] = array("one_bhk"=>$rate->one_bhk,"two_bhk"=>$rate->two_bhk,"three_bhk"=>$rate->three_bhk,"four_bhk"=>$rate->four_bhk);
			  }
		  } 
		  
		$relations = [  
			'res' => $formfieldarray, 
			'sites' => $sitenames,
			'flats' => $flatres,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			'cost' => $existing_Rates,
			];    

		

		$matchfields = ['month' => $segment4, 'year' => $segment3]; 

		$res_count = \App\Occupancymisreport::where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Occupancymisreport::where($matchfields)->get();
			
			
			 if(count($formfieldarray) > 0){
			     foreach($formfieldarray as $fieldarr){
				 	 $existing_records[$fieldarr->site] = array("id"=>$fieldarr->id,"owners"=>$fieldarr->owners,"tenants"=>$fieldarr->tenants,"vacant"=>$fieldarr->vacant);
				 } 
				 
				// echo "<pre>"; print_r($existing_records);echo "</pre>";
			 }  
			 
			 
			 $indentrep_Array = array();
			 $lagged_date = array();
			 foreach($siteattrname as $stk => $siten) {
			 
			  $match_in_fields = ['month' => $segment4, 'year' => $segment3, 'site' =>$stk]; 
			  $match_in_count = \App\Apnacomplaintmisreport::where($match_in_fields)->count();
		
		       if($match_in_count > 0){
			   	    $match_in_array = \App\Apnacomplaintmisreport::where($match_in_fields)->get();
					
					$indentrep_Array[$stk] = $match_in_array;
			   }
			   else{
			       $indentrep_Array[$stk] = array();
			   }
			   
			   
			 }
			 //exit;
			
			}
			
			$relations = [
			'res' => $formfieldarray,  
			'sites' => $sitenames,
			'flats' => $flatres,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			'cost' => $existing_Rates,
			'apnarep' => $indentrep_Array,
			];   
     
		 ////// return view('misfiles.view.misapnacomplex', $relations);
		  
		  	   
		$pdf = PDF::loadView('misprints.apnacomplex', $relations);
		
	//	return $pdf->download('traffic.pdf'); //Download  
		
		 /* $monthName = date('F', mktime(0, 0, 0, $segment4, 10));   
			   $fnam = 'ApnaComplexComplaintReport'.$monthName."_".$segment3.".pdf";
			  return $pdf->download($fnam);  */
			  
			   date_default_timezone_set('Asia/Kolkata');
			$today_date = date('d');
			$today_time = date("g:i a");
			$monthName = date('F', mktime(0, 0, 0, $segment4, 10)); 
			 $fnam = 'ApnaComplexComplaintReport_'.$monthName."_".$today_date."_".$segment3."_".$today_time.".pdf";
            // return $pdf->download('metrowater.pdf'); //Download    
			  return $pdf->download($fnam);        
		 

		
			}
			
	else if($reporttype == 'traffic_movement'){
		$segment3 = $year;
		$segment4 = $month;	
	
		$formfieldarray = array();
		$siteattrname = array();
		$flatres = array();
		$reportdate_val = "";
		$dateString = $segment3.'-'.$segment4.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$segment4."-".$segment3;

	      if(Auth::user()->id == 1){
	        $sitearr = explode(",",$selected_sites);
		  $sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$selected_sites);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
			
		  }
		  $existing_records = array();
		  $existing_Rates = array();
		  $exist_Sec = array();
		  
		
		  
		$relations = [  
			'res' => $formfieldarray, 
			'sites' => $siteattrname,
			'borewellsnum' => $borewellsnum,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			'existsec' => $exist_Sec,
			];    

		

		$matchfields = ['month' => $segment4, 'year' => $segment3]; 

		$res_count = \App\Trafficmisreport::where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Trafficmisreport::where($matchfields)->get();
			
			  $exist_Sec = array();
			  $exist_SecTwo = array();
			 if(count($formfieldarray) > 0){
			     foreach($formfieldarray as $fieldarr){
					
					 $exist_Sec['sites'][$fieldarr->site] = get_sitename($fieldarr->site);
					 $exist_Sec['resident_vehicle'][$fieldarr->site] = $fieldarr->resident_vehicle;
					 $exist_Sec['temp_vendors'][$fieldarr->site] = $fieldarr->temp_vendors;
					 $exist_Sec['courier_delivery'][$fieldarr->site] = $fieldarr->courier_delivery;
					 $exist_Sec['visitors'][$fieldarr->site] = $fieldarr->visitors;
					 $exist_Sec['construc_team'][$fieldarr->site] = $fieldarr->construc_team;
					 $exist_Sec['interworks_inflats'][$fieldarr->site] = $fieldarr->interworks_inflats;
					 $exist_Sec['interior_works_per_day'][$fieldarr->site] = $fieldarr->interior_works_per_day;  
					 $exist_Sec['ctotval'][$fieldarr->site] = (float)$fieldarr->resident_vehicle + (float)$fieldarr->temp_vendors + (float)$fieldarr->courier_delivery + (float)$fieldarr->visitors + (float)$fieldarr->construc_team + (float)$fieldarr->interworks_inflats + (float)$fieldarr->interior_works_per_day;
					 
					
					  
				 } 
				 
				//echo "<pre>"; print_r($exist_SecTwo);echo "</pre>";
			 }  
			 
			
			 
			 //exit;
			
			$relations = [
			'res' => $formfieldarray,  
			'sites' => $siteattrname,
			'borewellsnum' => $borewellsnum,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			'existsec' => $exist_Sec,
			];     
			  
		 }
		   else{
		        foreach($siteattrname as $kk => $arr){
				     $exist_Sec['sites'][$kk] = get_sitename($kk);
					 $exist_Sec['resident_vehicle'][$kk] = "";
					 $exist_Sec['temp_vendors'][$kk] = "";
					 $exist_Sec['courier_delivery'][$kk] = "";
					 $exist_Sec['visitors'][$kk] = "";
					 $exist_Sec['construc_team'][$kk] = "";
					 $exist_Sec['interworks_inflats'][$kk] = "";
					 $exist_Sec['interior_works_per_day'][$kk] = "";
					 $exist_Sec['ctotval'][$kk] = ""; 
				}
		   }
		   
		   	$relations = [
			'res' => $formfieldarray,  
			'sites' => $siteattrname,
			'borewellsnum' => $borewellsnum,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			'existsec' => $exist_Sec,
			];     

		  /////return view('misfiles.view.trafiicview', $relations);
		  
		  	  
		$pdf = PDF::loadView('misprints.mistrafficprint', $relations);
		
	//	return $pdf->download('traffic.pdf'); //Download  
		
		/*  $monthName = date('F', mktime(0, 0, 0, $segment4, 10));   
			   $fnam = 'TrafficMovement'.$monthName."_".$segment3.".pdf";
			  return $pdf->download($fnam);  */  
			  
			   date_default_timezone_set('Asia/Kolkata');
			$today_date = date('d');
			$today_time = date("g:i a");
			$monthName = date('F', mktime(0, 0, 0, $segment4, 10)); 
			 $fnam = 'TrafficMovement_'.$monthName."_".$today_date."_".$segment3."_".$today_time.".pdf";
            // return $pdf->download('metrowater.pdf'); //Download    
			  return $pdf->download($fnam);          

		
			}

}
  
 

   
/* END MOCK DRILL */

/* GET EXCEL EXPORT DETAILS */

  public function testgraph(Request $request)

    { 
	 return view('testgraph');
	}

}



