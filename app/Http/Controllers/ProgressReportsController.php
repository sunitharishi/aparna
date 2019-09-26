<?php



namespace App\Http\Controllers;

/*use App\Http\Requests;



use Illuminate\Http\Request;*/



use Illuminate\Support\Facades\Input;



use App\Project;

use Carbon\Carbon;

use App\Transaction;

use Auth;

use App\Emp;

use Request;
 
use DB;

use PDF;

use File; 

use App\Firesafedailyreportvalidation;
use App\Pmsdailyreportvalidation;
use App\Occupancymisreport;
use App\Borewellsnwmisreport;
use App\Fmsdailyreport;
use App\Clubutilizationmisreport;
use App\Blocknocreport;
use App\Blocknocmonthreport;
use App\Waterconsumpmisreport;
use App\Cmdmisdatareport;
use App\Firepreparemisreport; 
use App\Progresspowerconumption;
use App\Dailyfmsdieselconsumptionreport;




use App\Horticulturemisreport;

 


use App\Dailyreportvalidation;

use App\Firesafetymisreport;
use App\Firesafenotworkingissue;
use App\Equipmentmisreport;
use App\Equipmentnotworkingissue;

use App\Stpmisreport;
use App\Stpnotworkingissue;

use App\Housekpmisreport;

use App\Trafficmisreport;
use App\Cmdmisreport;




use App\Wspmisreport;
use App\Wspnotworkingissue;



use App\Securitymisreport;


use App\Http\Requests\StoreOccupancyRequest;
use App\Http\Requests\StoreBorewellnwRequest;
use App\Http\Requests\StoreFiresafemisRequest;
use App\Http\Requests\StoreEquipmentmisRequest;
use App\Http\Requests\StoreStpRequest;
use App\Http\Requests\StoreWspRequest;

 

class ProgressReportsController extends Controller

{ 

    /**

     * Index page

     *

     * @param Request $request

     *

     * @return \Illuminate\View\View

     */
	

	    public function index(Request $request) 

    { 
	 
	$year = isset($_GET['y'])?$_GET['y']:date("Y");
	$month =isset($_GET['m'])?$_GET['m']:date("m");

	      $relations = [

            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id'),
			'sites_attr_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id'),
			'syear' => $year,
			'smonth' => $month,

        ]; 

		  return view('progressreports.index', $relations);

    } 
	
	 
	
	
	 public function getdieselreportsview(Request $request)

    { 
	
		 $dgsets = array();
		 $blockarr = array("1"=>"A","2"=>"B","3"=>"C","4"=>"D","5"=>"E","6"=>"F","7"=>"G","8"=>"H","9"=>"I","10"=>"J","11"=>"K","12"=>"L","13"=>"M","14"=>"N","15"=>"O","16"=>"P","17"=>"Q","18"=>"R");
		 $cn = getDgsetsNum(9);
		 $dgsets['All'] = 'All';
		 for($i = 1; $i <= $cn; $i++) 
		 {  
		 	 $dgsets[$blockarr[$i]] =  $blockarr[$i];
		 }
	      $relations = [

            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id'),
			'sites_attr_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id'),
			'dgsets' => $dgsets
        ]; 

		  return view('progressfiles.dieselreports', $relations);

    } 
	 public function getdailydieselreports(Request $request)

    { 
	
	
	$site= $request->site;
	$date = $request->reportdate;
	$dielselconsum_repors_res = array();
	
	$dateval = date("Y-m-d", strtotime($date));
	
	$matchfields = ['reporton' => $dateval, 'site' => $site]; 
	
	
	 $fmsrescn = Fmsdailyreport::

      where('reporton', '=', $dateval)

	->where('site', '=', $site)

    ->count();

	$idval = 0;

	if($fmsrescn > 0){

	  $fmsresrow = Fmsdailyreport::

      where('reporton', '=', $dateval)

	->where('site', '=', $site)

    ->first();
	
	   $idval =  $fmsresrow['id'];
	   
	    $dielselconsum_repors_cn = Dailyfmsdieselconsumptionreport:: where('ref_id', '=', $idval)->where('site', '=', $site)->count();
	    if($dielselconsum_repors_cn > 0){
		  $dielselconsum_repors_res =  Dailyfmsdieselconsumptionreport:: where('ref_id', '=', $idval)->where('site', '=', $site)->get();
		}
	   
   }
	

	   $relations = [

            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),
			'sites_attr_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id'),
			'dieselreports' => $dielselconsum_repors_res,
			

        ];  

		  return view('progressfiles.dailydiesel', $relations); 

    } 
	
	
	 
	public function getprogresspreview(Request $request)

    {
	
	  $segment1 = Request::segment(1);
	  $segment2 = Request::segment(2);
		
       $relations = [
            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			//'sites_names' => \App\Sites::get()->pluck('title', 'id')->prepend('All', ''),
			'sites_names' => \App\Sites::get()->pluck('name', 'id')->prepend('All', ''),
			'segmentval' => $segment2,  
        ];    

		if($segment2 == '1'){
		
		
		  /* WATER CONSUMPTION */
		  
		 $segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
		
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sites_count = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->count();
		  $sites_res_arr =\App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
			$sites_count = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->count();
			$sites_res_arr =\App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }
		  
		  
		  $fromdate = $segment3."-".$segment4."-"."1";
		  $todate = $segment3."-".$segment4."-".$lastdatearr[2];
		  
		
		 $avg_occupan_res = array(); 
		  foreach($siteattrname as $kk => $siteval){
			 
			 	    $owners = 0; 
					$tenents = 0; 
					
			    $year = $segment3;
				$month = $segment4;
				$site = $kk;
				
				if($month == 1) {
				$prevmonth = 12;
				$prevyear  = $year - 1;
				}
				else
				{
				$prevmonth = $month - 1; 
				$prevyear  = $year;
				}
				
				$cur_tenents = 0;
				$prev_owners = 0;
				$prev_tenents =0;
				$cur_owners =0;
				
				
				$prevdateString = $prevyear.'-'.$prevmonth.'-01';
				//Last date of current month.
				 $prevDateOfMonth = date("t", strtotime($prevdateString));
				//echo  $prev_reporton = $prevDateOfMonth."-".$prevmonth."-".$prevyear;
				   $prev_reporton = $prevyear."-".$prevmonth."-".$prevDateOfMonth;
				$prev_occupanymatch_fileds = ['reporton' => $prev_reporton, 'site' => $site]; 
				
				 $occres_cn = \App\Pmsdailyreport::where($prev_occupanymatch_fileds)->count(); 
				if($occres_cn > 0){
				$occres_resprev = \App\Pmsdailyreport::where($prev_occupanymatch_fileds)->first();
				$prev_owners = (float)$occres_resprev['occupancy_asdate_owners'];
				$prev_tenents = (float)$occres_resprev['occupancy_asdate_tenants'];   
				}
				
			     $dateString = $year.'-'.$month.'-01';
				 $lastDateOfMonth = date("t", strtotime($dateString));
				 $reporton = $year."-".$month."-".$lastDateOfMonth;
				 $current_occupanymatch_fileds = ['reporton' => $reporton, 'site' => $site]; 
				 $cur_occres_cn = \App\Pmsdailyreport::where($current_occupanymatch_fileds)->count(); 
				if($cur_occres_cn > 0){
				$cur_occres_resprev = \App\Pmsdailyreport::where($current_occupanymatch_fileds)->first();
				$cur_owners =  (float)$cur_occres_resprev['occupancy_asdate_owners'];
				$cur_tenents =  (float)$cur_occres_resprev['occupancy_asdate_tenants'];   
				}
				 $tenents  = $cur_tenents + $prev_tenents;
				$owners = $prev_owners + $cur_owners;
				$av_occ = round((float)(($owners + $tenents)/2));
			
				$avg_occupan_res[$kk] = $av_occ;
				
			 }
			 
			 $occupancyarr = $avg_occupan_res;
			 	
		$relations = [  
			
			'sitenames' => $siteattrname,
			'flats' => $flatres,
			'reportfrom_on' => $reportdatefrom_val,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'occupancy' => $occupancyarr,  
			];      
			 
		  
		  /* END WATER CONSUMPTION */

		  return view('progressfiles.powerconsumption', $relations);

		} 
		
			if($segment2 == '2'){
		
		
		  /* WATER CONSUMPTION */
		  
		 $segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
		
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sites_count = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->count();
		  $sites_res_arr =\App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
			$sites_count = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->count();
			$sites_res_arr =\App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }
		  
		  
		  $fromdate = $segment3."-".$segment4."-"."1";
		  $todate = $segment3."-".$segment4."-".$lastdatearr[2];
		  
	
			 	
		$relations = [  
			
			'sitenames' => $siteattrname,
			'reportfrom_on' => $reportdatefrom_val,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			];      
			 
		  
		  /* END WATER CONSUMPTION */ 

		  return view('progressfiles.amctracker', $relations);

		} 
 
	  
	} 
	
	
	  public function backmisreports(Request $request)

    { 

	      $relations = [

            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),
			'sites_attr_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id'),

        ]; 



		  return view('misreports.index', $relations);

    }    
	
	 public function advancedindex(Request $request)

    { 

	      $relations = [ 

            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),
			'sites_attr_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id'),

        ]; 
		  return view('misreports.advancedindex', $relations);

    }  
	   
	 
 
	

	 public function index2(Request $request)

    {


	      $relations = [

            'client_statuses' => \App\ClientStatus::get()->pluck('title', 'id')->prepend('Please select', ''),

        ]; 

		  return view('dailyreports.index', $relations);

    }



	
	 public function storeprogresspower(StoreOccupancyRequest $request)
 
    {  
	
	 if(isset($request['report_status'])) { $request['report_status'] = $request['report_status'];}
	 else {$request['report_status'] = 0;}
	 
     
		   if((int)$request['record_id'] > 0){
		     $report = Progresspowerconumption::findOrFail($request['record_id']);

					   $store_val  = array('site'=>$request['site'], 'scalable_area'=>(int)$request['scalable_area'], 'com_area_pwr_consump'=>$request['com_area_pwr_consump'],'consump_per_month'=>$request['consump_per_month'],'consump_avg_per_month'=>$request['consump_avg_per_month'],'remarks'=>$request['remarks']);
					   
					   $report = Progresspowerconumption::findOrFail($request['record_id']);

					 $report->update($store_val); 

					 return redirect()->route('progressreports.index');
		   } 
		 else{  
				     $store_val  = array('site'=>$request['site'], 'month'=>$request['month'], 'year'=>$request['year'],  'user_id'=>$request['user_id'], 'scalable_area'=>$request['scalable_area'], 'com_area_pwr_consump'=>$request['com_area_pwr_consump'],'consump_per_month'=>$request['consump_per_month'],'consump_avg_per_month'=>$request['consump_per_month'],'remarks'=>$request['remarks'],'report_status'=>$request['report_status']);
					/* echo "<pre>";     
					 print_r($store_val);
					 echo "</pre>"; */
					  Progresspowerconumption::create($store_val); 
				
				 return redirect()->route('progressreports.index');
			   
			}
           
           return redirect()->route('progressreports.index');
		
    } 
	
	
	
	// STORE CLUB HOUSE
	 public function storeclubhouse(StoreOccupancyRequest $request)
 
    {  
		$year = $request['year'];
	$month = $request['month'];  
	
	 if(isset($request['report_status'])) { $request['report_status'] = $request['report_status'];}
	 else {$request['report_status'] = 0;}
	 
     
		   if((int)$request['record_id'] > 0){
		     $report = Clubutilizationmisreport::findOrFail($request['record_id']);

					   $store_val  = array('site'=>$request['site'], 'avg_occupancy'=>$request['avg_occupancy'], 'avg_daily_swim'=>$request['avg_daily_swim'],'avg_daily_gym'=>$request['avg_daily_gym'],'occ_flat_swim'=>$request['occ_flat_swim'],'occ_gym_swim'=>$request['occ_gym_swim'],'report_status'=>$request['report_status']);
					   
					   $report = Clubutilizationmisreport::findOrFail($request['record_id']);

					 $report->update($store_val); 

					  return redirect('/misreports?y='.$year.'&m='.$month);
		   } 
		 else{  
		
				  
				     $store_val  = array('site'=>$request['site'],'month'=>$request['month'], 'year'=>$request['year'], 'user_id'=>$request['user_id'],'avg_occupancy'=>$request['avg_occupancy'], 'avg_daily_swim'=>$request['avg_daily_swim'],'avg_daily_gym'=>$request['avg_daily_gym'],'occ_flat_swim'=>$request['occ_flat_swim'],'occ_gym_swim'=>$request['occ_gym_swim'],'report_status'=>$request['report_status']);
					/* echo "<pre>";     
					 print_r($store_val);
					 echo "</pre>"; */
					  Clubutilizationmisreport::create($store_val); 
				
				 return redirect('/misreports?y='.$year.'&m='.$month);
			   
			} 
           
          return redirect('/misreports?y='.$year.'&m='.$month);
		
    } 

 // STORE CLUB HOUSE
 
 // AUDIT UPLOAD
   public function audituploadindex(Request $request)

    { 
	 
	$year = isset($_GET['y'])?$_GET['y']:date("Y");
	$month =isset($_GET['m'])?$_GET['m']:date("m");

	      $relations = [

            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id'),
			'sites_attr_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id'),
			'syear' => $year,
			'smonth' => $month,

        ]; 

		  return view('progressreports.audituploadindex', $relations);

    } 
	
	
	
	
	public function getaudituploadview(Request $request)

    {
	
	  $segment1 = Request::segment(1);
	  $segment2 = Request::segment(2);
		
       $relations = [
            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			//'sites_names' => \App\Sites::get()->pluck('title', 'id')->prepend('All', ''),
			'sites_names' => \App\Sites::get()->pluck('name', 'id')->prepend('All', ''),
			'segmentval' => $segment2,  
        ];    
		
			if($segment2 == '1'){
		
		
		  /* WATER CONSUMPTION */
		  
		 $segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
		
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sites_count = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->count();
		  $sites_res_arr =\App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->orderBy('scode', 'ASC')->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->orderBy('scode', 'ASC')->where('status', '=', '1')->get()->pluck('name', 'id');
			$sites_count = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->count();
			$sites_res_arr =\App\Sites::whereIn('id', $sitearr)->orderBy('scode', 'ASC')->where('status', '=', '1')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }
		  
		  
		  $fromdate = $segment3."-".$segment4."-"."1";
		  $todate = $segment3."-".$segment4."-".$lastdatearr[2];
		  
	
			 	
		$relations = [  
			
			'sitenames' => $siteattrname,
			'reportfrom_on' => $reportdatefrom_val,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			];      
			 
		  
		  /* END WATER CONSUMPTION */ 

		  return view('audit.uploads.clubhouseupload', $relations);

		} 
		
		if($segment2 == '2'){
		
		 
		  /* WATER CONSUMPTION */
		  
		 $segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
		
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sites_count = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->count();
		  $sites_res_arr =\App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->orderBy('scode', 'ASC')->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->orderBy('scode', 'ASC')->where('status', '=', '1')->get()->pluck('name', 'id');
			$sites_count = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->count();
			$sites_res_arr =\App\Sites::whereIn('id', $sitearr)->orderBy('scode', 'ASC')->where('status', '=', '1')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }
		  
		  
		  $fromdate = $segment3."-".$segment4."-"."1";
		  $todate = $segment3."-".$segment4."-".$lastdatearr[2];
		  
	
			 	
		$relations = [  
			
			'sitenames' => $siteattrname,
			'reportfrom_on' => $reportdatefrom_val,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			];      
			 
		  
		  /* END WATER CONSUMPTION */ 

		  return view('audit.uploads.horticultureupload', $relations);

		} 
		
		
			if($segment2 == '3'){
		
		
		  /* WATER CONSUMPTION */
		  
		 $segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
		
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sites_count = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->count();
		  $sites_res_arr =\App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->orderBy('scode', 'ASC')->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->orderBy('scode', 'ASC')->where('status', '=', '1')->get()->pluck('name', 'id');
			$sites_count = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->count();
			$sites_res_arr =\App\Sites::whereIn('id', $sitearr)->orderBy('scode', 'ASC')->where('status', '=', '1')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }
		  
		  
		  $fromdate = $segment3."-".$segment4."-"."1";
		  $todate = $segment3."-".$segment4."-".$lastdatearr[2];
		  
	
			 	
		$relations = [  
			
			'sitenames' => $siteattrname,
			'reportfrom_on' => $reportdatefrom_val,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			];      
			   
		  
		  /* END WATER CONSUMPTION */ 

		  return view('audit.uploads.hrmanagementupload', $relations);

		} 
              
			  
      if($segment2 == '4'){
		
		
		  /* WATER CONSUMPTION */
		  
		 $segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
		
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sites_count = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->count();
		  $sites_res_arr =\App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->orderBy('scode', 'ASC')->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->orderBy('scode', 'ASC')->where('status', '=', '1')->get()->pluck('name', 'id');
			$sites_count = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->count();
			$sites_res_arr =\App\Sites::whereIn('id', $sitearr)->orderBy('scode', 'ASC')->where('status', '=', '1')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }
		  
		  
		  $fromdate = $segment3."-".$segment4."-"."1";
		  $todate = $segment3."-".$segment4."-".$lastdatearr[2];
		  
	
			 	
		$relations = [  
			
			'sitenames' => $siteattrname,
			'reportfrom_on' => $reportdatefrom_val,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			];      
			 
		  
		  /* END WATER CONSUMPTION */ 

		  return view('audit.uploads.apnacomplaintupload', $relations);

		} 
		
		
		// PRETTY CASH UPLOAD
		
		  if($segment2 == '5'){
		
		
		  /* WATER CONSUMPTION */
		  
		 $segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
		
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sites_count = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->count();
		  $sites_res_arr =\App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->orderBy('scode', 'ASC')->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->orderBy('scode', 'ASC')->where('status', '=', '1')->get()->pluck('name', 'id');
			$sites_count = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->count();
			$sites_res_arr =\App\Sites::whereIn('id', $sitearr)->orderBy('scode', 'ASC')->where('status', '=', '1')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }
		  
		  
		  $fromdate = $segment3."-".$segment4."-"."1";
		  $todate = $segment3."-".$segment4."-".$lastdatearr[2];
		  
	
			 	
		$relations = [  
			
			'sitenames' => $siteattrname,
			'reportfrom_on' => $reportdatefrom_val,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			];      
			 
		  
		  /* END WATER CONSUMPTION */ 

		  return view('audit.uploads.prettycashupload', $relations);

		} 
		
		// EXPENSE PRETTY CASH
		
	   if($segment2 == '6'){
		
		
		  /* WATER CONSUMPTION */
		  
		 $segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
		
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sites_count = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->count();
		  $sites_res_arr =\App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->orderBy('scode', 'ASC')->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->orderBy('scode', 'ASC')->where('status', '=', '1')->get()->pluck('name', 'id');
			$sites_count = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->count();
			$sites_res_arr =\App\Sites::whereIn('id', $sitearr)->orderBy('scode', 'ASC')->where('status', '=', '1')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }
		  
		  
		  $fromdate = $segment3."-".$segment4."-"."1";
		  $todate = $segment3."-".$segment4."-".$lastdatearr[2];
		  
	
			 	
		$relations = [  
			
			'sitenames' => $siteattrname,
			'reportfrom_on' => $reportdatefrom_val,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			];      
			 
		  
		  /* END WATER CONSUMPTION */ 

		  return view('audit.uploads.prettycashexpenseupload', $relations);

		} 
		
		   if($segment2 == '7'){
		
		
		  /* WATER CONSUMPTION */
		  
		 $segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
		
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sites_count = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->count();
		  $sites_res_arr =\App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->orderBy('scode', 'ASC')->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->orderBy('scode', 'ASC')->where('status', '=', '1')->get()->pluck('name', 'id');
			$sites_count = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->count();
			$sites_res_arr =\App\Sites::whereIn('id', $sitearr)->orderBy('scode', 'ASC')->where('status', '=', '1')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }
		  
		  
		  $fromdate = $segment3."-".$segment4."-"."1";
		  $todate = $segment3."-".$segment4."-".$lastdatearr[2];
		  
	
			 	
		$relations = [  
			
			'sitenames' => $siteattrname,
			'reportfrom_on' => $reportdatefrom_val,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			];      
			 
		  
		  /* END WATER CONSUMPTION */ 

		  return view('audit.uploads.chratecard', $relations);

		} 
		
	} 
	 
	
  
}

