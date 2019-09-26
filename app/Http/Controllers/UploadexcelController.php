<?php







namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;

use Auth;

use App\Mmrhousekconsume;

use App\Pmsdailyreportvalidation;

use App\Dailyreportvalidation;

use App\Firesafedailyreportvalidation;

use App\Securitydailyreportvalidation; 
use App\AuditClubhouseUtilization; 

use App\AuditHorticultureUpload; 
use App\AuditHrmanageUpload; 
use App\AuditApnaComplaint; 
use App\AuditPrettyCashupload;
use App\AuditPrettyCashexpense;
use App\AuditChratecardUpload;
use App\Mmrslareport;
 use App\Snagreport;
 
use App\Fmsdailyreport;



use App\Pmsdailyreport; 



use App\Firesafedailyreport;



use App\Securitydailyreport;

use App\Indentedmisreport;

use App\Apnacomplaintmisreport;

use App\Mockdrillmisreport;

use App\Firepreparemisreport; 
use App\Progamctrackreport;  

use App\Item; 




use App\Http\Requests;
 


use Illuminate\Http\Request;



use Illuminate\Support\Facades\Input;


use DB;




class UploadexcelController extends Controller



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

 



// END UPLOAD EXCEL


  public function uploadexcel(Request $request)

    {

    //redirect('pages.roombooking');

   //return 'success';
   
 return view('upload'); 
 
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','!=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
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


// SAVE UPLOAD FILE


 
// END UPLOAD EXCEL


  public function saveuploadfile(Request $request)

    {

    //redirect('pages.roombooking');

   //return 'success';
   

 //echo "<pre>"; print_r($request->all());echo "</pre>";  exit; 
 
    $year = $request['year'];
	$month = $request['month']; 
 
   
     $filename = uniqid();

		$extension = $request->file('file')->getClientOriginalExtension();

	 	$file = $request->file('file')->move('uploadreports/reports',$filename.".".$extension);

	 	$filename_extension = 'uploadreports/reports/'.$filename.'.'.$extension;

		$xls_datas = Excel::load($filename_extension, function($reader) { })->toArray();
		 
	    $edata = $request->all();
		$month = $edata['month'];
		$year = $edata['year'];
		$site = $edata['sites'];
		$user_id = $edata['user_id'];
		$laggeddate = $edata['laggeddate']; 

		if(count($xls_datas) > 0) 

		{
		    $data = array();
			$attendance_export="";
			$attenance_list = array();
			$excel_import = 1;
			$n=1;
			$rec_data =array();
			
			  $matchfields = ['month' => $month, 'year' => $year, 'site' => $site]; 
			   
			    $res_count =  DB::table('indentedmisreports')->where($matchfields)->count();
			   
			    DB::table('indentedmisreports')->where($matchfields)->delete();
		    foreach($xls_datas as $xls_data)

		    {    
			  
				   
			  $xls_data['pr_nos'] = $xls_data['pr_nos']?$xls_data['pr_nos']:'';
			  $xls_data['pr_date'] = $xls_data['pr_date']?$xls_data['pr_date']:'';
			  $xls_data['item_code'] = $xls_data['item_code']?$xls_data['item_code']:'';
			  $xls_data['item_desc'] = $xls_data['item_desc']?$xls_data['item_desc']:'';
			  $xls_data['uom'] = $xls_data['uom']?$xls_data['uom']:'';
			  $xls_data['pr_qty'] = $xls_data['pr_qty']?$xls_data['pr_qty']:'';
			  $xls_data['po_qty'] = $xls_data['po_qty']?$xls_data['po_qty']:'';
			  $xls_data['po_no'] = $xls_data['po_no']?$xls_data['po_no']:'';
			  $xls_data['po_date'] = $xls_data['po_date']?$xls_data['po_date']:'';
			  $xls_data['lead_time_of_days'] = $xls_data['lead_time_of_days']?$xls_data['lead_time_of_days']:'';
			  $xls_data['date_of_submission'] = $xls_data['date_of_submission']?$xls_data['date_of_submission']:'';
			  $xls_data['days_from_submission'] = $xls_data['days_from_submission']?$xls_data['days_from_submission']:'';
			  $xls_data['lagged_time'] = $xls_data['lagged_time']?$xls_data['lagged_time']:'';
				
			   $rec_data = array("site"=>$site,"month"=>$month,"year"=>$year,"user_id"=>$user_id,"laggeddate"=>$laggeddate,"pr_nos"=>$xls_data['pr_nos'],"pr_date"=>$xls_data['pr_date'],"item_code"=>$xls_data['item_code'],"item_desc"=>$xls_data['item_desc'],"uom"=>$xls_data['uom'],"pr_qty"=>$xls_data['pr_qty'],"po_qty"=>$xls_data['po_qty'],"po_no"=>$xls_data['po_no'],"po_date"=>$xls_data['po_date'],"lead_time_of_days"=>$xls_data['lead_time_of_days'],"date_of_submission"=>$xls_data['date_of_submission'],"days_from_submission"=>$xls_data['days_from_submission'],"lagged_time_upto"=>$xls_data['lagged_time']);
			   
			   Indentedmisreport::create($rec_data);  
 
		     /* $employee_code = $xls_data['employee_code'];			  
			  $shiftid = 0;			  
		      $user_id = (isset($employees[$employee_code])) ? $employees[$employee_code] : NULL;
			  $project_id = $xls_data['project_id'];
			  $location_id = isset($xls_data['location_id'])?$xls_data['location_id']:'';
			  $project_branch = isset($tasks[$project_id])? $tasks[$project_id]:0;
		      $date = date('Y-m-d',strtotime($xls_data['date']));
		      $clock_in = date('H:i',strtotime($xls_data['clock_in']));
		      $userClockIn = date('Y-m-d H:i:s',strtotime($date.' '.$clock_in));
		      $clock_out = date('H:i',strtotime($xls_data['clock_out']));
		      $userClockOut = date('Y-m-d H:i:s',strtotime($date.' '.$clock_out));
			  
			  $n++;
			  //Validations
			  $temperror = "";
			  if(!$user_id) $temperror .= "Employee not found. ";
			  else {
			  	$shiftData = Profile::select('shift_id')->where('user_id','=',$user_id)->first();
				if($shiftData->shift_id == 0) {
					$temperror .= 'Please select your shifts. ';
				} else $shiftid = $shiftData->shift_id;
			  }
			  if(!$project_branch) $temperror .= "Project or Branch not found. ";
			  if(!$location_id) $temperror .= "Location not found. ";
			  else {
			  	$location = Location::where('id','=',$location_id)->first();
				if(!$location) $temperror .= "Location not found. ";
			  }
			  	//Clock existance in leaves
				$isClockInTime = LeaveDay::where('user_id','=',$request->input('user_id'))
					->where('leavedate','=',$date)
					->first();	
				if($isClockInTime)
					$temperror .= 'Attendance matching with Leave dates entry.';
			  if($clock_in==$clock_out) $temperror .= "Clock in cannot be equal to clock out. ";
			  else if(strtotime($userClockIn) > strtotime($userClockOut))  
					$temperror .= 'In time cannot be greater than out time. ';
			  else if($user_id){				
					$timeq = " (
							(clock_in<='$userClockIn' and clock_out>'$userClockIn') or 
							(clock_in<'$userClockOut' and clock_out>='$userClockOut') or 
							(clock_in>'$userClockIn' and clock_in<'$userClockOut') or 
							(clock_out>'$userClockIn' and clock_out<'$userClockOut'))";
					$isClockInTime = Clock::where('user_id','=',$user_id)
						->where('date','=',$date)
						->whereRaw($timeq)
						->first();
					if($isClockInTime) $temperror .= 'Please select valid time this time entry already exist.';
			  }	
			  if($temperror) {
			  		$excel_import = 0;
					$attendance_export .="\n".$n."\t".$employee_code."\t".$project_id."\t".$date."\t".$clock_in."\t".$clock_out."\t".$temperror;
			  }
			  
			  if($excel_import) {
				  $data[] = array(
						'user_id' => $user_id,
						'shift_id' => $shiftid,
						'project_or_branch_id' => $project_id?$project_id:0,
						'location' => $location_id,
						'date' => $date,
						'clock_in' => $userClockIn,
						'clock_out' => $userClockOut,
						'created_at' => date('Y-m-d H:i:s'),
						'updated_at' => date('Y-m-d H:i:s')
						);					
				}*/
		    }
			   
			
			//Create downloadable excel error log
			/*if($attendance_export) {
				$attendance_export = "Row No\tEmployee_Code\tProject_ID\tDate\tClock_In\tClock_Out\tRow Error".$attendance_export;
				header('Content-Disposition: attachment; filename="error-log.xls"');
				header("Cache-control: private");
				header("Content-type: application/force-download");
				header("Content-transfer-encoding: binary\n");				
				echo $attendance_export;				
				exit;
			}*/
			//Import attendance excel
		    
		
		}
		   
		    return redirect('/misreports?y='.$year.'&m='.$month);
		 //return redirect()->route('misreports.index');

}

// END SAVE UPLOAD FILE



//APNA COMPLAINT REPORT

  public function saveapnauploadfile(Request $request)

    {
	
	$year = $request['year'];
	$month = $request['month'];  

    //redirect('pages.roombooking');

   //return 'success';
   

 //secho "<pre>"; print_r($request->all());echo "</pre>";  exit; 
 
   
       $filename = uniqid();

		$extension = $request->file('file')->getClientOriginalExtension();

	 	$file = $request->file('file')->move('uploadreports/apnareport',$filename.".".$extension);

	 	$filename_extension = 'uploadreports/apnareport/'.$filename.'.'.$extension;

		$xls_datas = Excel::load($filename_extension, function($reader) { })->toArray();
		 
	    $edata = $request->all();
		$month = $edata['month'];
		$year = $edata['year'];
		$site = $edata['sites'];
		$user_id = $edata['user_id'];
		

		if(count($xls_datas) > 0) 

		{
		    $data = array();
			$attendance_export="";
			$attenance_list = array();
			$excel_import = 1;
			$n=1;
			$rec_data =array();
			
			  $matchfields = ['month' => $month, 'year' => $year, 'site' => $site]; 
			   
			    $res_count =  DB::table('apnacomplaintmisreports')->where($matchfields)->count();
			   
			    DB::table('apnacomplaintmisreports')->where($matchfields)->delete();
		    foreach($xls_datas as $xls_data)

		    {  
			
		//	 echo "<pre>"; print_r($xls_data);
			// echo "</pre>";
				  
			  // $rec_data = array("site"=>$site,"month"=>$month,"year"=>$year,"user_id"=>$user_id,"laggeddate"=>$laggeddate,"pr_nos"=>$xls_data['pr_nos'],"pr_date"=>$xls_data['pr_date'],"item_code"=>$xls_data['item_code'],"item_desc"=>$xls_data['item_desc'],"uom"=>$xls_data['uom'],"pr_qty"=>$xls_data['pr_qty'],"po_no"=>$xls_data['po_no'],"po_date"=>$xls_data['po_date'],"lead_time_of_days"=>$xls_data['lead_time_of_days'],"date_of_submission"=>$xls_data['date_of_submission'],"days_from_submission"=>$xls_data['days_from_submission'],"lagged_time_upto"=>$xls_data['lagged_time']);
			  $xls_data['complaint_category'] = $xls_data['complaint_category']?$xls_data['complaint_category']:'';
			  $xls_data['previous_pending'] = $xls_data['previous_pending']?$xls_data['previous_pending']:'';
			  $xls_data['opened'] = $xls_data['opened']?$xls_data['opened']:'';
			  $xls_data['resolved'] = $xls_data['resolved']?$xls_data['resolved']:'';
			  $xls_data['total_outstanding'] = $xls_data['total_outstanding']?$xls_data['total_outstanding']:'';
			  $xls_data['no_escalation'] = $xls_data['no_escalation']?$xls_data['no_escalation']:'';
			  $xls_data['escalated_to_l2'] = $xls_data['escalated_to_l2']?$xls_data['escalated_to_l2']:'';
			  $xls_data['escalated_to_l3'] = $xls_data['escalated_to_l3']?$xls_data['escalated_to_l3']:'';
			  
			  $rec_data = array("site"=>$site,"month"=>$month,"year"=>$year,"user_id"=>$user_id,"complaint_category"=>$xls_data['complaint_category'],"previous_pending"=>$xls_data['previous_pending'],"opened"=>$xls_data['opened'],"resolved"=>$xls_data['resolved'],"total_outstanding"=>$xls_data['total_outstanding'],"no_escalation"=>$xls_data['no_escalation'],"escalated_to_l2"=>$xls_data['escalated_to_l2'],"escalated_to_l3"=>$xls_data['escalated_to_l3']);
			   
			   Apnacomplaintmisreport::create($rec_data); 
		    
		}      
		
		  //exit;
		   
		// return redirect()->route('misreports.index');
		  return redirect('/misreports?y='.$year.'&m='.$month);
		 } 

}  
 
// END APNA COMPALAINT REPORT




//SAVE AMC TRACK FILE 

  public function saveamctrackuploadfile(Request $request)

    {
	
	$year = $request['year'];
	$month = $request['month'];  

    //redirect('pages.roombooking');

   //return 'success';
   

  //echo "<pre>"; print_r($request->all());echo "</pre>";  exit; 
 
   
       $filename = uniqid();

		$extension = $request->file('file')->getClientOriginalExtension();

	 	$file = $request->file('file')->move('uploadreports/amcreport',$filename.".".$extension);

	 	$filename_extension = 'uploadreports/amcreport/'.$filename.'.'.$extension;

		$xls_datas = Excel::load($filename_extension, function($reader) { })->toArray();
		 
	    $edata = $request->all();
		$month = $edata['month'];
		$year = $edata['year'];
		$site = $edata['sites'];
		$user_id = $edata['user_id'];
		

		if(count($xls_datas) > 0) 

		{
		    $data = array();
			$attendance_export="";
			$attenance_list = array();
			$excel_import = 1;
			$n=1;
			$rec_data =array();
			
			  $matchfields = ['month' => $month, 'year' => $year, 'site' => $site]; 
			   
			    $res_count =  DB::table('progamctrackreports')->where($matchfields)->count();
			   
			    DB::table('progamctrackreports')->where($matchfields)->delete();
		    foreach($xls_datas as $xls_data)

		    {  
			
			
				  

			  $xls_data['asset_description'] = $xls_data['asset_description']?$xls_data['asset_description']:'';
			  $xls_data['location'] = $xls_data['location']?$xls_data['location']:'';
			  $xls_data['vendor_name'] = $xls_data['vendor_name']?$xls_data['vendor_name']:'';
			  $xls_data['po_no_or_wo'] = $xls_data['po_no_or_wo']?$xls_data['po_no_or_wo']:'';
			  $xls_data['amc_period_from'] = $xls_data['amc_period_from']?$xls_data['amc_period_from']:'';
			  $xls_data['amc_period_to'] = $xls_data['amc_period_to']?$xls_data['amc_period_to']:'';
			  $xls_data['capacity'] = $xls_data['capacity']?$xls_data['capacity']:'';
			  $xls_data['amc'] = $xls_data['amc']?$xls_data['amc']:'';
			  $xls_data['remarks'] = $xls_data['remarks']?$xls_data['remarks']:'';
			  
			  $rec_data = array("site"=>$site,"month"=>$month,"year"=>$year,"user_id"=>$user_id,"asset_description"=>$xls_data['asset_description'],"location"=>$xls_data['location'],"vendor_name"=>$xls_data['vendor_name'],"po_no_or_wo"=>$xls_data['po_no_or_wo'],"amc_period_from"=>$xls_data['amc_period_from'],"amc_period_to"=>$xls_data['amc_period_to'],"capacity"=>$xls_data['capacity'],"amc"=>$xls_data['amc'],"remarks"=>$xls_data['remarks']);
			   
			   Progamctrackreport::create($rec_data);  
		    
		}      
		
		 
		   
		// return redirect()->route('misreports.index');
		  return redirect('/progressreports?y='.$year.'&m='.$month);
		 } 

}  
 
// END SAVING AMC TRACK FILE

// SAVE ITEMS IMPORT FILE

  public function saveitemsuploadfile(Request $request)

    {
	
    //redirect('pages.roombooking');

   //return 'success';
   

 //secho "<pre>"; print_r($request->all());echo "</pre>";  exit; 
 
   
       $filename = uniqid();

		$extension = $request->file('file')->getClientOriginalExtension();

	 	$file = $request->file('file')->move('uploaditems/items',$filename.".".$extension);

	 	$filename_extension = 'uploaditems/items/'.$filename.'.'.$extension;

		$xls_datas = Excel::load($filename_extension, function($reader) { })->toArray();
		 
	    $edata = $request->all();	

		if(count($xls_datas) > 0) 

		{
		    $data = array();
			$attendance_export="";
			$attenance_list = array();
			$excel_import = 1;
			$n=1;
			$rec_data =array();
			
			  //$matchfields = ['month' => $month, 'year' => $year, 'site' => $site]; 
			   
			   // $res_count =  DB::table('apnacomplaintmisreports')->where($matchfields)->count();
			   
			   // DB::table('apnacomplaintmisreports')->delete();
		    foreach($xls_datas as $xls_data)

		    {  
			
		//echo "<pre>"; print_r($xls_data);
			// echo "</pre>";
				  

		      $xls_data['category'] = $xls_data['category']?$xls_data['category']:'';
			  $xls_data['sub_category'] = $xls_data['sub_category']?$xls_data['sub_category']:'';
			  $xls_data['item_name'] = $xls_data['item_name']?$xls_data['item_name']:'';
			  $xls_data['item_desc'] = $xls_data['item_desc']?$xls_data['item_desc']:'';
			  $xls_data['uom'] = $xls_data['uom']?$xls_data['uom']:'';
			  $xls_data['item_code'] = $xls_data['item_code']?$xls_data['item_code']:'';
			  $xls_data['browse'] = $xls_data['browse']?$xls_data['browse']:'';
			  
			  if($xls_data['category'] == '' && $xls_data['sub_category'] == '' &&  $xls_data['item_name'] == '' && $xls_data['item_desc'] == '' && $xls_data['uom'] == '' &&  $xls_data['item_code'] == '' && $xls_data['browse']=='')
			  {
			  } 
			  else {
			  $rec_data = array("itemcategory"=>$xls_data['category'],"itemsubcategory"=>$xls_data['sub_category'],"itemname"=>$xls_data['item_name'],"description"=>$xls_data['item_desc'],"uom"=>$xls_data['uom'],"itemcode"=>$xls_data['item_code'],"browse"=>$xls_data['browse']);
			   
			   Item::create($rec_data);
			   }  
		    
		}      
		
		   
		// return redirect()->route('misreports.index');
		  return redirect('/items');
		 } 

}    


 public function savesnaguploadfile(Request $request)

    {
	
    //redirect('pages.roombooking');

   //return 'success';
   

 //secho "<pre>"; print_r($request->all());echo "</pre>";  exit; 
 
   
       $filename = uniqid();

		$extension = $request->file('file')->getClientOriginalExtension();

	 	$file = $request->file('file')->move('uploaditems/snags',$filename.".".$extension);

	 	$filename_extension = 'uploaditems/snags/'.$filename.'.'.$extension;

		$xls_datas = Excel::load($filename_extension, function($reader) { })->toArray();
		 
	    $edata = $request->all();	

		if(count($xls_datas) > 0) 

		{
		    $data = array();
			$attendance_export="";
			$attenance_list = array();
			$excel_import = 1;
			$n=1;
			$rec_data =array();
			
			  //$matchfields = ['month' => $month, 'year' => $year, 'site' => $site]; 
			   
			   // $res_count =  DB::table('apnacomplaintmisreports')->where($matchfields)->count();
			   
			   // DB::table('apnacomplaintmisreports')->delete();
		    foreach($xls_datas as $xls_data)

		    {  
			
		/*echo "<pre>"; print_r($xls_data);
			 echo "</pre>";*/
				  

		      $xls_data['site'] = $xls_data['site']?$xls_data['site']:'';
			  $xls_data['category'] = $xls_data['category']?$xls_data['category']:'';
			  $xls_data['observation'] = $xls_data['observation']?$xls_data['observation']:'';
			  $xls_data['location'] = $xls_data['location']?$xls_data['location']:'';
			  
			  if($xls_data['site'] == '' && $xls_data['category'] == '' &&  $xls_data['observation'] == '' && $xls_data['location'] == '')
			  {
			  } 
			  else {
			  $uid = Auth::user()->id;
			 $snag_array =  array("uid"=>$uid, "sid"=>$xls_data['site'], "cid"=>$xls_data['category'], "observation"=>$xls_data['observation'], "location"=> $xls_data['location'], "recommendation"=> "", "imagepath"=> "", "reporton"=> date("Y-m-d"));
			 
			 /*echo "<pre>"; print_r($snag_array); echo "</pre>";
			 exit;*/
			   
			   Snagreport::create($snag_array);
			   }  
		    
		}      
		
		   
		// return redirect()->route('misreports.index');
		  return redirect('/snagindex');
		 } 

}    



/* save MOCKDRILL IMAGES */
  public function savemockdrill(Request $request)

    {

    //redirect('pages.roombooking');

   //return 'success';
   
   $year = $request['year'];
	$month = $request['month'];  
   
       $edata = $request->all();
	   foreach($request->file('file') as $key=>$filerow){
		  $filename = uniqid();
		  $req_array = array();   
		  $req_array =  array("site"=>$edata['sites'],"user_id"=>$edata['user_id'],"user_id"=>$edata['user_id'],"month"=>$edata['month'],"year"=>$edata['year'],"title"=>$edata['title'][$key],"image_url"=>"");
		  
		    
		  $drillInsert = Mockdrillmisreport::create($req_array); 
		  $insertedId = $drillInsert->id;
		  
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('drillimages',$filename."_".$insertedId.".".$extension);
		  $filename_extension = 'drillimages/'.$filename."_".$insertedId.'.'.$extension;
		  
		        $w=200; 
				$h=200; 
				$newfilename= "drillimages/"."tiny_".$filename."_".$insertedId.'.'.$extension;
				//$newfilename= "images/main/"."tiny_image_".$cid."_".$f.".jpg";
				
				resize_byratio($filename_extension, $w, $h, $newfilename);
		   
		  
		  $req_array =  array("image_url"=> $newfilename);
		  $report = Mockdrillmisreport::findOrFail($insertedId);
		  $report->update($req_array);

	   } 
	     
		  //exit;
		   
		   return redirect('/misreports?y='.$year.'&m='.$month);
}    


/* END save MOCKDRILL IMAGES */



/* save FIRE PREPARE DRILL */
  public function savefireprepare(Request $request)

    {

    //redirect('pages.roombooking');

   //return 'success';
   
   $year = $request['year'];
	$month = $request['month'];  
   

 // echo "<pre>"; print_r($request->all());echo "</pre>";  
 
       $edata = $request->all();
       foreach($request->file('file') as $key=>$filerow){
		  $filename = uniqid();
		  $req_array = array();   
		  $req_array =  array("site"=>$edata['sites'],"user_id"=>$edata['user_id'],"user_id"=>$edata['user_id'],"month"=>$edata['month'],"year"=>$edata['year'],"title"=>$edata['title'][$key],"image_url"=>"");
		  
		    
		  $drillInsert = Firepreparemisreport::create($req_array); 
		  $insertedId = $drillInsert->id;
		  
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('preparefire',$filename."_".$insertedId.".".$extension);
		  $filename_extension = 'preparefire/'.$filename."_".$insertedId.'.'.$extension;
		  
		        $w=200; 
				$h=200; 
				$newfilename= "preparefire/"."tiny_".$filename."_".$insertedId.'.'.$extension;
				//$newfilename= "images/main/"."tiny_image_".$cid."_".$f.".jpg";
				
				resize_byratio($filename_extension, $w, $h, $newfilename);
		   
		  
		  $req_array =  array("image_url"=> $newfilename);
		  $report = Firepreparemisreport::findOrFail($insertedId);
		  $report->update($req_array);

	   } 
	      
		  //exit;
		   
		   return redirect('/misreports?y='.$year.'&m='.$month);
}    

/* END SAVE FIRE PREPARE DRILL*/


//SAVE Club House Collection 

  public function saveclubhouseuploadfile(Request $request)

    {
	
	$year = $request['year'];
	$month = $request['month'];  

    //redirect('pages.roombooking');
  
   //return 'success';
   

 // echo "<pre>"; print_r($request->all());echo "</pre>";  exit; 
  
   
       $filename = uniqid();

		$extension = $request->file('file')->getClientOriginalExtension();

	 	$file = $request->file('file')->move('uploadreports/auditupload',$filename.".".$extension);

	  $filename_extension = 'uploadreports/auditupload/'.$filename.'.'.$extension;

		$xls_datas = Excel::load($filename_extension, function($reader) { })->toArray();
		 
	    $edata = $request->all();
		$month = $edata['month'];
		$year = $edata['year'];
		$site = $edata['sites'];
		$user_id = $edata['user_id'];
		

		if(count($xls_datas) > 0) 

		{
		    $data = array();
			$attendance_export="";
			$attenance_list = array();
			$excel_import = 1;
			$n=1;
			$rec_data =array();
			
			  $matchfields = ['month' => $month, 'year' => $year, 'site' => $site]; 
			   
			    $res_count =  DB::table('audit_clubhouse_utilizations')->where($matchfields)->count();
			   
			    DB::table('audit_clubhouse_utilizations')->where($matchfields)->delete();

		    foreach($xls_datas as $xls_data)

		    {  
			  $xls_data['payment_cal_month'] = $xls_data['payment_cal_month']?$xls_data['payment_cal_month']:'';
			  $xls_data['payment_date'] = $xls_data['payment_date']?$xls_data['payment_date']:'';
			  $xls_data['receipt_no'] = $xls_data['receipt_no']?$xls_data['receipt_no']:'';
			  $xls_data['falt_no'] = $xls_data['falt_no']?$xls_data['falt_no']:'';
			  $xls_data['name'] = $xls_data['name']?$xls_data['name']:'';
			  $xls_data['ch_rate_card_category'] = $xls_data['ch_rate_card_category']?$xls_data['ch_rate_card_category']:'';
			  $xls_data['duration'] = $xls_data['duration']?$xls_data['duration']:'';
			  $xls_data['valid_from'] = $xls_data['valid_from']?$xls_data['valid_from']:'';
			  $xls_data['valid_to'] = $xls_data['valid_to']?$xls_data['valid_to']:'';
			  $xls_data['members_or_rooms'] = $xls_data['members_or_rooms']?$xls_data['members_or_rooms']:'';
			  $xls_data['gross_amount'] = $xls_data['gross_amount']?$xls_data['gross_amount']:'';
			  $xls_data['cleaning_charges'] = $xls_data['cleaning_charges']?$xls_data['cleaning_charges']:'';
			  $xls_data['electrical_charges'] = $xls_data['electrical_charges']?$xls_data['electrical_charges']:'';
			  $xls_data['s_tax'] = $xls_data['s_tax']?$xls_data['s_tax']:'';
			  $xls_data['total_invoice_amount'] = $xls_data['total_invoice_amount']?$xls_data['total_invoice_amount']:'';
			  $xls_data['payment_mode'] = $xls_data['payment_mode']?$xls_data['payment_mode']:'';
			  $xls_data['cash'] = $xls_data['cash']?$xls_data['cash']:'';
			  $xls_data['cheque_received'] = $xls_data['cheque_received']?$xls_data['cheque_received']:'';
			  $xls_data['cheque_number'] = $xls_data['cheque_number']?$xls_data['cheque_number']:'';
			  $xls_data['card'] = $xls_data['card']?$xls_data['card']:'';
			  $xls_data['neft'] = $xls_data['neft']?$xls_data['neft']:'';
			  $xls_data['total_received'] = $xls_data['total_received']?$xls_data['total_received']:'';
			  
			  $rec_data = array("site"=>$site,"month"=>$month,"year"=>$year,"user_id"=>$user_id,"payment_cal_month"=>$xls_data['payment_cal_month'],"payment_date"=>$xls_data['payment_date'],"receipt_num"=>$xls_data['receipt_no'],"falt_num"=>$xls_data['falt_no'],"name"=>$xls_data['name'],"chrate_card_category"=>$xls_data['ch_rate_card_category'],"duration"=>$xls_data['duration'],"valid_from"=>$xls_data['valid_from'],"valid_to"=>$xls_data['valid_to'],"members_rooms"=>$xls_data['members_or_rooms'],"gross_amount"=>$xls_data['gross_amount'],"cleaning_charges"=>$xls_data['cleaning_charges'],"electrical_charges"=>$xls_data['electrical_charges'],"s_tax"=>$xls_data['s_tax'],"total_invoice_amount"=>$xls_data['total_invoice_amount'],"payment_mode"=>$xls_data['payment_mode'],"cash_rs"=>$xls_data['cash'],"cheque_received"=>$xls_data['cheque_received'],"cheque_number"=>$xls_data['cheque_number'],"card_rs"=>$xls_data['card'],"neft"=>$xls_data['neft'],"total_received"=>$xls_data['total_received']);
			   
			   AuditClubhouseUtilization::create($rec_data);  
		    
		}      
		
		 
		   
		// return redirect()->route('misreports.index');
		  return redirect('/auditupload?y='.$year.'&m='.$month);
		 } 

}  



//SAVE HORTICULTURE UPLOAD

  public function savehorticultureuploadfile(Request $request)

    {
	
	$year = $request['year'];
	$month = $request['month'];  

    //redirect('pages.roombooking');
  
   //return 'success';
   

 // echo "<pre>"; print_r($request->all());echo "</pre>";  exit; 
  
   
       $filename = uniqid();

		$extension = $request->file('file')->getClientOriginalExtension();

	 	$file = $request->file('file')->move('uploadreports/auditupload',$filename.".".$extension);

	  $filename_extension = 'uploadreports/auditupload/'.$filename.'.'.$extension;

		$xls_datas = Excel::load($filename_extension, function($reader) { })->toArray();
		
		//echo "<pre>"; print_r($xls_datas);echo "</pre>";  exit; 
		 
	    $edata = $request->all();
		$month = $edata['month'];
		$year = $edata['year'];
		$site = $edata['sites'];
		$user_id = $edata['user_id'];
		

		if(count($xls_datas) > 0) 

		{
		    $data = array();
			$attendance_export="";
			$attenance_list = array();
			$excel_import = 1;
			$n=1;
			$rec_data =array();
			
			  $matchfields = ['month' => $month, 'year' => $year, 'site' => $site]; 
			   
			    $res_count =  DB::table('audit_horticulture_uploads')->where($matchfields)->count();
			   
			    DB::table('audit_horticulture_uploads')->where($matchfields)->delete();

		    foreach($xls_datas as $xls_data)

		    {  
			  $xls_data['block_or_area'] = $xls_data['block_or_area']?$xls_data['block_or_area']:'';
			  $xls_data['fa'] = $xls_data['fa']?$xls_data['fa']:'';
			  $xls_data['sfa'] = $xls_data['sfa']?$xls_data['sfa']:'';
			  $xls_data['activity_category'] = $xls_data['activity_category']?$xls_data['activity_category']:'';
			  $xls_data['activity_sub_category'] = $xls_data['activity_sub_category']?$xls_data['activity_sub_category']:'';
			  $xls_data['item_name'] = $xls_data['item_name']?$xls_data['item_name']:'';
			  $xls_data['uom'] = $xls_data['uom']?$xls_data['uom']:'';
			
			  
			  $rec_data = array("site"=>$site,"month"=>$month,"year"=>$year,"user_id"=>$user_id,"block_or_area"=>$xls_data['block_or_area'],"fa"=>$xls_data['fa'],"sfa"=>$xls_data['sfa'],"activity_category"=>$xls_data['activity_category'],"activity_sub_category"=>$xls_data['activity_sub_category'],"item_name"=>$xls_data['item_name'],"uom"=>$xls_data['uom']);
			   
			   AuditHorticultureUpload::create($rec_data);  
		    
		}      
		
		 
		// return redirect()->route('misreports.index');
		  return redirect('/auditupload?y='.$year.'&m='.$month);
		 } 

}  



//SAVE HRM UPLOAD

  public function savehrmuploadfile(Request $request)

    {
	
	$year = $request['year'];
	$month = $request['month'];  

    //redirect('pages.roombooking');
  
   //return 'success';
   

 // echo "<pre>"; print_r($request->all());echo "</pre>";  exit; 
  
   
       $filename = uniqid();

		$extension = $request->file('file')->getClientOriginalExtension();

	 	$file = $request->file('file')->move('uploadreports/auditupload',$filename.".".$extension);

	  $filename_extension = 'uploadreports/auditupload/'.$filename.'.'.$extension;

		$xls_datas = Excel::load($filename_extension, function($reader) { })->toArray();
		
		//echo "<pre>"; print_r($xls_datas);echo "</pre>";  exit; 
		 
	    $edata = $request->all();
		$month = $edata['month'];
		$year = $edata['year'];
		$site = $edata['sites'];
		$user_id = $edata['user_id'];
		

		if(count($xls_datas) > 0) 

		{
		    $data = array();
			$attendance_export="";
			$attenance_list = array();
			$excel_import = 1;
			$n=1;
			$rec_data =array();
			
			  $matchfields = ['month' => $month, 'year' => $year, 'site' => $site]; 
			   
			    $res_count =  DB::table('audit_hrmanage_uploads')->where($matchfields)->count();
			   
			    DB::table('audit_hrmanage_uploads')->where($matchfields)->delete();

		    foreach($xls_datas as $xls_data)

		    { 
			  $xls_data['fa'] = $xls_data['fa']?$xls_data['fa']:'';
			  $xls_data['sfa'] = $xls_data['sfa']?$xls_data['sfa']:'';
			  $xls_data['designation'] = $xls_data['designation']?$xls_data['designation']:'';
			  $xls_data['cal_month'] = $xls_data['cal_month']?$xls_data['cal_month']:'';
			  $xls_data['sd_net'] = $xls_data['sd_net']?$xls_data['sd_net']:'';
			  $xls_data['date'] = $xls_data['date']?$xls_data['date']:'';
			  $xls_data['sd_gross'] = $xls_data['sd_gross']?$xls_data['sd_gross']:'';
			  $xls_data['conv_fact'] = $xls_data['conv_fact']?$xls_data['conv_fact']:'';
			
			  
			  $rec_data = array("site"=>$site,"month"=>$month,"year"=>$year,"user_id"=>$user_id,"designation"=>$xls_data['designation'],"fa"=>$xls_data['fa'],"sfa"=>$xls_data['sfa'],"cal_month"=>$xls_data['cal_month'],"sd_net"=>$xls_data['sd_net'],"date"=>$xls_data['date'],"sd_gross"=>$xls_data['sd_gross'],"conv_fact"=>$xls_data['conv_fact']);
			   
			   AuditHrmanageUpload::create($rec_data);  
		    
		}      
		
		 
		// return redirect()->route('misreports.index');
		  return redirect('/auditupload?y='.$year.'&m='.$month);
		 } 

}  

//SAVE HRM UPLOAD

  public function saveauditapnauploadfile(Request $request)

    {
	
	$year = $request['year'];
	$month = $request['month'];  

    //redirect('pages.roombooking');
  
   //return 'success';
   

 // echo "<pre>"; print_r($request->all());echo "</pre>";  exit; 
  
   
       $filename = uniqid();

		$extension = $request->file('file')->getClientOriginalExtension();

	 	$file = $request->file('file')->move('uploadreports/auditupload',$filename.".".$extension);

	  $filename_extension = 'uploadreports/auditupload/'.$filename.'.'.$extension;

		$xls_datas = Excel::load($filename_extension, function($reader) { })->toArray();
		
		//echo "<pre>"; print_r($xls_datas);echo "</pre>";  exit; 
		 
	    $edata = $request->all();
		$month = $edata['month'];
		$year = $edata['year'];
		$site = $edata['sites'];
		$user_id = $edata['user_id'];
		

		if(count($xls_datas) > 0) 

		{
		    $data = array();
			$attendance_export="";
			$attenance_list = array();
			$excel_import = 1;
			$n=1;
			$rec_data =array();
			
			  $matchfields = ['month' => $month, 'year' => $year, 'site' => $site]; 
			   
			    $res_count =  DB::table('audit_apna_complaints')->where($matchfields)->count();
			   
			    DB::table('audit_apna_complaints')->where($matchfields)->delete();

		    foreach($xls_datas as $xls_data)

		    { 
			  $xls_data['unit'] = $xls_data['unit']?$xls_data['unit']:'';
			  $xls_data['nature'] = $xls_data['nature']?$xls_data['nature']:'';
			  $xls_data['category'] = $xls_data['category']?$xls_data['category']:'';
			  $xls_data['logged_by'] = $xls_data['logged_by']?$xls_data['logged_by']:'';
			  $xls_data['assigned_to'] = $xls_data['assigned_to']?$xls_data['assigned_to']:'';
			  $xls_data['serviced_by'] = $xls_data['serviced_by']?$xls_data['serviced_by']:'';
			  $xls_data['logged_on'] = $xls_data['logged_on']?$xls_data['logged_on']:'';
			  $xls_data['last_updated_on'] = $xls_data['last_updated_on']?$xls_data['last_updated_on']:'';
			  $xls_data['escalation_level'] = $xls_data['escalation_level']?$xls_data['escalation_level']:'';
			  $xls_data['status'] = $xls_data['status']?$xls_data['status']:'';
			  $xls_data['aging'] = $xls_data['aging']?$xls_data['aging']:'';
			
			  
			  $rec_data = array("site"=>$site,"month"=>$month,"year"=>$year,"user_id"=>$user_id,"unit"=>$xls_data['unit'],"nature"=>$xls_data['nature'],"category"=>$xls_data['category'],"logged_by"=>$xls_data['logged_by'],"assigned_to"=>$xls_data['assigned_to'],"serviced_by"=>$xls_data['serviced_by'],"logged_on"=>$xls_data['logged_on'],"last_updated_on"=>$xls_data['last_updated_on'],"escalation_level"=>$xls_data['escalation_level'],"status"=>$xls_data['status'],"aging"=>$xls_data['aging']);
			   
			   AuditApnaComplaint::create($rec_data);  
		    
		}      
		
		 
		// return redirect()->route('misreports.index');
		  return redirect('/auditupload?y='.$year.'&m='.$month);
		 } 

}  

// SAVE PRETTY CASH

  public function saveauditprettycashupload(Request $request)

    {
	
	$year = $request['year'];
	$month = $request['month'];  

    //redirect('pages.roombooking');
  
   //return 'success';
   

 // echo "<pre>"; print_r($request->all());echo "</pre>";  exit; 
  
   
       $filename = uniqid();

		$extension = $request->file('file')->getClientOriginalExtension();

	 	$file = $request->file('file')->move('uploadreports/auditupload',$filename.".".$extension);

	  $filename_extension = 'uploadreports/auditupload/'.$filename.'.'.$extension;

		$xls_datas = Excel::load($filename_extension, function($reader) { })->toArray();
		
		//echo "<pre>"; print_r($xls_datas);echo "</pre>";  exit; 
		 
	    $edata = $request->all();
		$month = $edata['month'];
		$year = $edata['year'];
		$site = $edata['sites'];
		$user_id = $edata['user_id'];
		

		if(count($xls_datas) > 0) 

		{
		    $data = array();
			$attendance_export="";
			$attenance_list = array();
			$excel_import = 1;
			$n=1;
			$rec_data =array();
			
			  $matchfields = ['month' => $month, 'year' => $year, 'site' => $site]; 
			   
			    $res_count =  DB::table('audit_pretty_cashuploads')->where($matchfields)->count();
			   
			    DB::table('audit_pretty_cashuploads')->where($matchfields)->delete();

		    foreach($xls_datas as $xls_data)

		    { 
			
			  $xls_data['type_of_project'] = $xls_data['type_of_project']?$xls_data['type_of_project']:'';
			  $xls_data['effective_date'] = $xls_data['effective_date']?$xls_data['effective_date']:'';
			  $xls_data['petty_cash_limit'] = $xls_data['petty_cash_limit']?$xls_data['petty_cash_limit']:'';
			  $xls_data['person_responsible'] = $xls_data['person_responsible']?$xls_data['person_responsible']:'';
			  $xls_data['opening_petty_cash_balance'] = $xls_data['opening_petty_cash_balance']?$xls_data['opening_petty_cash_balance']:'';
			  $xls_data['opening_bills_to_be_received'] = $xls_data['opening_bills_to_be_received']?$xls_data['opening_bills_to_be_received']:'';
			  
			  $rec_data = array("site"=>$site,"month"=>$month,"year"=>$year,"user_id"=>$user_id,"type_of_project"=>$xls_data['type_of_project'],"effective_date"=>$xls_data['effective_date'],"petty_cash_limit"=>$xls_data['petty_cash_limit'],"person_responsible"=>$xls_data['person_responsible'],"opening_petty_cash_balance"=>$xls_data['opening_petty_cash_balance'],"opening_bills_to_be_received"=>$xls_data['opening_bills_to_be_received']);
			   
			   AuditPrettyCashupload::create($rec_data);      
		}      
				 
		// return redirect()->route('misreports.index');
		  return redirect('/auditupload?y='.$year.'&m='.$month);
		 } 

}  


// SAVE PRETTY CASH EXPENSE


  public function saveauditprettycashexpense(Request $request)

    {
	
	$year = $request['year'];
	$month = $request['month'];  

    //redirect('pages.roombooking');
  
   //return 'success';
   

 // echo "<pre>"; print_r($request->all());echo "</pre>";  exit; 
  
   
       $filename = uniqid();

		$extension = $request->file('file')->getClientOriginalExtension();

	 	$file = $request->file('file')->move('uploadreports/auditupload',$filename.".".$extension);

	  $filename_extension = 'uploadreports/auditupload/'.$filename.'.'.$extension;

		$xls_datas = Excel::load($filename_extension, function($reader) { })->toArray();
		
		//echo "<pre>"; print_r($xls_datas);echo "</pre>";  exit; 
		 
	    $edata = $request->all();
		$month = $edata['month'];
		$year = $edata['year'];
		$site = $edata['sites'];
		$user_id = $edata['user_id'];
		

		if(count($xls_datas) > 0) 

		{
		    $data = array();
			$attendance_export="";
			$attenance_list = array();
			$excel_import = 1;
			$n=1;
			$rec_data =array();
			
			  $matchfields = ['month' => $month, 'year' => $year, 'site' => $site]; 
			   
			    $res_count =  DB::table('audit_pretty_cashexpenses')->where($matchfields)->count();
			   
			    DB::table('audit_pretty_cashexpenses')->where($matchfields)->delete();

		    foreach($xls_datas as $xls_data)

		    { 
			
			  $xls_data['type_of_project'] = $xls_data['type_of_project']?$xls_data['type_of_project']:'';
			  $xls_data['exp_category'] = $xls_data['exp_category']?$xls_data['exp_category']:'';
			  $xls_data['bill_no'] = $xls_data['bill_no']?$xls_data['bill_no']:'';
			  $xls_data['bill_date'] = $xls_data['bill_date']?$xls_data['bill_date']:'';
			  $xls_data['amount_spent'] = $xls_data['amount_spent']?$xls_data['amount_spent']:'';
			  $xls_data['date_of_bill_submission_to_ho'] = $xls_data['date_of_bill_submission_to_ho']?$xls_data['date_of_bill_submission_to_ho']:'';
			   $xls_data['reimbersement_received'] = $xls_data['reimbersement_received']?$xls_data['reimbersement_received']:'';
			  
			  $rec_data = array("site"=>$site,"month"=>$month,"year"=>$year,"user_id"=>$user_id,"type_of_project"=>$xls_data['type_of_project'],"exp_category"=>$xls_data['exp_category'],"bill_no"=>$xls_data['bill_no'],"bill_date"=>$xls_data['bill_date'],"amount_spent"=>$xls_data['amount_spent'],"date_of_bill_submission_to_ho"=>$xls_data['date_of_bill_submission_to_ho'],"reimbersement_received"=>$xls_data['reimbersement_received']);
			   
			   AuditPrettyCashexpense::create($rec_data);      
		}      
				 
		// return redirect()->route('misreports.index');
		  return redirect('/auditupload?y='.$year.'&m='.$month);
		 } 

}  


// SAVE CLUB HOUSE RATE CARD


  public function saveauditchratecard(Request $request)

    {
	
	$year = $request['year'];
	$month = $request['month'];  

    //redirect('pages.roombooking');
  
   //return 'success';
   

 // echo "<pre>"; print_r($request->all());echo "</pre>";  exit; 
  
   
       $filename = uniqid();

		$extension = $request->file('file')->getClientOriginalExtension();

	 	$file = $request->file('file')->move('uploadreports/auditupload',$filename.".".$extension);

	  $filename_extension = 'uploadreports/auditupload/'.$filename.'.'.$extension;

		$xls_datas = Excel::load($filename_extension, function($reader) { })->toArray();
		
		//echo "<pre>"; print_r($xls_datas);echo "</pre>";  exit; 
		 
	    $edata = $request->all();
		$month = $edata['month'];
		$year = $edata['year'];
		$site = $edata['sites'];
		$user_id = $edata['user_id'];
		
		if(count($xls_datas) > 0) 
		{
		    $data = array();
			$attendance_export="";
			$attenance_list = array();
			$excel_import = 1;
			$n=1;
			$rec_data =array();
			
			  $matchfields = ['month' => $month, 'year' => $year, 'site' => $site]; 
			   
			    $res_count =  DB::table('audit_chratecard_uploads')->where($matchfields)->count();
			   
			    DB::table('audit_chratecard_uploads')->where($matchfields)->delete();

		    foreach($xls_datas as $xls_data)

		    { 
			  $xls_data['type_of_project'] = $xls_data['type_of_project']?$xls_data['type_of_project']:'';
			  $xls_data['ch_product'] = $xls_data['ch_product']?$xls_data['ch_product']:'';
			  $xls_data['duration'] = $xls_data['duration']?$xls_data['duration']:'';
			  $xls_data['valid_from'] = $xls_data['valid_from']?$xls_data['valid_from']:'';
			  $xls_data['valid_to'] = $xls_data['valid_to']?$xls_data['valid_to']:'';
			  $xls_data['gross_amount_as_per_rate_card'] = $xls_data['gross_amount_as_per_rate_card']?$xls_data['gross_amount_as_per_rate_card']:'';
			  
			  $rec_data = array("site"=>$site,"month"=>$month,"year"=>$year,"user_id"=>$user_id,"type_of_project"=>$xls_data['type_of_project'],"ch_product"=>$xls_data['ch_product'],"duration"=>$xls_data['duration'],"valid_from"=>$xls_data['valid_from'],"valid_to"=>$xls_data['valid_to'],"gross_amount_as_per_rate_card"=>$xls_data['gross_amount_as_per_rate_card']);
			   
			   AuditChratecardUpload::create($rec_data);      
		}
		
		      
				 
		// return redirect()->route('misreports.index');
		  return redirect('/auditupload?y='.$year.'&m='.$month);
		 } 

}  


// SAVE MMR SLA REPORT

//APNA COMPLAINT REPORT

  public function saveslaupload(Request $request)

    {
	
	$year = $request['year'];
	$month = $request['month'];  

    //redirect('pages.roombooking');

   //return 'success';
     
       $filename = uniqid();

		$extension = $request->file('file')->getClientOriginalExtension();

	 	$file = $request->file('file')->move('uploadreports/mmrupload',$filename.".".$extension);

	 	$filename_extension = 'uploadreports/mmrupload/'.$filename.'.'.$extension;

		$xls_datas = Excel::load($filename_extension, function($reader) { })->toArray();
		 
	    $edata = $request->all();
		$month = $edata['month'];
		$year = $edata['year'];
		$site = $edata['site'];
		$user_id = $edata['user_id'];
		

		if(count($xls_datas) > 0) 

		{
		    $data = array();
			$attendance_export="";
			$attenance_list = array();
			$excel_import = 1;
			$n=1;
			$rec_data =array();
			
			  $matchfields = ['month' => $month, 'year' => $year, 'site' => $site]; 
			   
			    $res_count =  DB::table('mmrslareports')->where($matchfields)->count();
			    DB::table('mmrslareports')->where($matchfields)->delete();
				
		    foreach($xls_datas as $xls_data)

		    {  
			
		
		 
		$xls_data['number'] = $xls_data['number']?$xls_data['number']:'';
		$xls_data['unit'] = $xls_data['unit']?$xls_data['unit']:'';
		$xls_data['description'] = $xls_data['description']?$xls_data['description']:'';
		$xls_data['category'] = $xls_data['category']?$xls_data['category']:'';
		$xls_data['logged_by'] = $xls_data['logged_by']?$xls_data['logged_by']:'';
		$xls_data['assigned_to'] = $xls_data['assigned_to']?$xls_data['assigned_to']:'';
		$xls_data['logged_on'] = $xls_data['logged_on']?$xls_data['logged_on']:'';
		$xls_data['last_updated_on'] = $xls_data['last_updated_on']?$xls_data['last_updated_on']:'';
		$xls_data['escalation_level'] = $xls_data['escalation_level']?$xls_data['escalation_level']:'';
		$xls_data['aging'] = $xls_data['aging']?$xls_data['aging']:'';
		$xls_data['status'] = $xls_data['status']?$xls_data['status']:'';
		$xls_data['remarks'] = $xls_data['remarks']?$xls_data['remarks']:'';
		//exit;
			  $rec_data = array("site"=>$site,"month"=>$month,"year"=>$year,"user_id"=>$user_id,"number"=>$xls_data['number'],"unit"=>$xls_data['unit'],"description"=>$xls_data['description'],"category"=>$xls_data['category'],"logged_by"=>$xls_data['logged_by'],"assigned_to"=>$xls_data['assigned_to'],"logged_on"=>$xls_data['logged_on'],"last_updated_on"=>$xls_data['last_updated_on'],"escalation_level"=>$xls_data['escalation_level'],"aging"=>$xls_data['aging'],"status"=>$xls_data['status'],"remarks"=>$xls_data['remarks']); 
			   
			   Mmrslareport::create($rec_data); 	    
		} 
		   return redirect('/mmr/main?y='.$year.'&m='.$month.'&site='.$site);

		 } 

}  


public function savehskupload(Request $request)

    {
	
	$year = $request['year'];
	$month = $request['month'];  

    //redirect('pages.roombooking');

   //return 'success';
     
       $filename = uniqid();

		$extension = $request->file('file')->getClientOriginalExtension();

	 	$file = $request->file('file')->move('uploadreports/mmrupload',$filename.".".$extension);

	 	$filename_extension = 'uploadreports/mmrupload/'.$filename.'.'.$extension;

		$xls_datas = Excel::load($filename_extension, function($reader) { })->toArray();
		 
	    $edata = $request->all();
		$month = $edata['month'];
		$year = $edata['year'];
		$site = $edata['site'];
		$user_id = $edata['user_id'];
		

		if(count($xls_datas) > 0) 

		{
		    $data = array();
			$attendance_export="";
			$attenance_list = array();
			$excel_import = 1;
			$n=1;
			$rec_data =array();
			
			  $matchfields = ['month' => $month, 'year' => $year, 'site' => $site]; 
			   
			    $res_count =  DB::table('mmrhousekconsumes')->where($matchfields)->count();
			    DB::table('mmrhousekconsumes')->where($matchfields)->delete();
		    foreach($xls_datas as $ckey=>$xls_data)

		    {  
		
		$xls_data['category'] = $xls_data['category']?$xls_data['category']:'';
		$xls_data['location'] = $xls_data['location']?$xls_data['location']:'';
		$xls_data['description'] = $xls_data['description']?$xls_data['description']:'';
		$xls_data['qty'] = $xls_data['qty']?$xls_data['qty']:'';
		$xls_data['remarks'] = $xls_data['remarks']?$xls_data['remarks']:'';
		
			  //$rec_data = array("site"=>$site,"month"=>$month,"year"=>$year,"user_id"=>$user_id,"number"=>$xls_data['number'],"unit"=>$xls_data['unit'],"description"=>$xls_data['description'],"category"=>$xls_data['category'],"logged_by"=>$xls_data['logged_by'],"assigned_to"=>$xls_data['assigned_to'],"logged_on"=>$xls_data['logged_on'],"last_updated_on"=>$xls_data['last_updated_on'],"escalation_level"=>$xls_data['escalation_level'],"aging"=>$xls_data['aging'],"status"=>$xls_data['status'],"remarks"=>$xls_data['remarks']); 
			  //echo "<pre>"; print_r($xls_data); echo "</pre>";
			  $rec_data = array("site"=>$edata['site'],"month"=>$month,"year"=>$year,'category'=>$xls_data['category'],'location'=>$xls_data['location'],'description'=>$xls_data['description'],'qty'=>$xls_data['qty'],'remarks'=>$xls_data['remarks'],'type'=>'housekeeping');
			   
			   Mmrhousekconsume::create($rec_data); 	    
		}  
		
		//exit;
	
		   return redirect('/mmr/main?y='.$year.'&m='.$month.'&site='.$site);

		 } 

}  



 
}



