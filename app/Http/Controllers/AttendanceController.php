<?php







namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;

use Auth;

use App\Pmsdailyreportvalidation;

use App\Dailyreportvalidation;

use App\Firesafedailyreportvalidation;

use App\Securitydailyreportvalidation;







use Config;

use App\Fmsdailyreport;

use App\Attendancereport;



use App\Pmsdailyreport;



use App\Firesafedailyreport;



use App\Securitydailyreport;

use App\Indentedmisreport;

use App\Apnacomplaintmisreport;

use App\Mockdrillmisreport;




use App\Http\Requests;



use Illuminate\Http\Request;



use Illuminate\Support\Facades\Input;


use DB;




class AttendanceController extends Controller



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



 

  public function uploadform(Request $request)

    { 
	
	 $relations = [

            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),
			'sitenames' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', ''),
			'sites_attr_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id'),

        ]; 

   return view('attendance.importatten', $relations);   
		
}

 public function attendscan(Request $request)

    {  
	
	 $cats =  \App\Category::get()->pluck('name', 'id');
	 $empCount = array();
	 $uploadedcount = array();
	  $presentcount = array();
	   $absentcount = array();
	   $notenteredcn = array();
	   $presentemps = array();
		$absentemps = array();
	    $cur_date = date("Y-m-d");
 
	
	  foreach($cats as $ck =>  $cat){
	  	 $empCount[$ck] =  \App\Emp::where('category','=',$ck)->count();
	  }
	   
	  foreach($cats as $ck =>  $cat){
	  	 //$uploadedcount[$ck] =  \App\Emp::where('category','=',$ck)->count();
		 
		  $presentcount[$ck] = Attendancereport::
		 where('report_date', '=', $cur_date)
		->where('status', '=', 'Absent')
		->where('category', '<=', $ck )
		->count();
		
		$absentcount[$ck] = Attendancereport::
		 where('report_date', '=', $cur_date)
		->where('status', '=', 'Present')
		->where('category', '<=', $ck )
		->count();
		
		if($presentcount[$ck] > 0){
		    $presentemps[$ck] =  Attendancereport::
		 where('report_date', '=', $cur_date)
		->where('status', '=', 'Absent')
		->where('category', '=', $ck )
		->get();
		}
		
		if($presentcount[$ck] > 0){
		 $absentemps[$ck] =  Attendancereport::
		 where('report_date', '=', $cur_date)
		->where('status', '=', 'Absent')
		->where('category', '=', $ck)
		->get();
		}
		
		if($absentcount[$ck] > 0){
		$presentemps[$ck] = Attendancereport::
		 where('report_date', '=', $cur_date)
		->where('status', '=', 'Present')
		->where('category', '=', $ck)
		->get(); 
		}
		
		$uploadedCount[$ck] = $presentcount[$ck] +  $absentcount[$ck];
		$notenteredcn[$ck] = $empCount[$ck] - $uploadedCount[$ck];
		
	  }
	  
	  
	 
	 $relations = [
	        'categories' => \App\Category::get()->pluck('name', 'id'),
            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),
			'sitenames' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', ''),
			'sites_attr_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id'),
			'empcount' => $empCount,
			'presentcn' => $presentcount,
			'absentcn' =>  $absentcount,
			'uploadedcn' => $uploadedCount,
			'notenteredcn' => $notenteredcn,
			'presentemps' => $presentemps,
			'absentemps' =>  $absentemps,

        ]; 

   return view('attendance.scan', $relations);   
		
}


 public function attendtrack(Request $request)

    {  
	

	  
	 
	 $relations = [
	        'categories' => \App\Category::get()->pluck('name', 'id'),
            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),
			'sitenames' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', ''),
			'sites_attr_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id'),

        ]; 

   return view('attendance.track', $relations);   
		
}

 
	
	  public function getlist()
	  
	  {
	  
	     $assets = Attendancereport::all();   
		 return view('attendance.list', compact('assets'));
		  
	  }
	  
	  
	  
	  
	   public function getscansearchres(Request $request)  
	  {
	  
        $req_date = $request->fromdate;
		$cats =  \App\Category::get()->pluck('name', 'id');
		$empCount = array();
		$uploadedcount = array();
		$presentcount = array();
		$absentcount = array();
		$notenteredcn = array();
		$presentemps = array();
		$absentemps = array();
	   
	    $cur_date = date("Y-m-d", strtotime($req_date));
	
	  foreach($cats as $ck =>  $cat){
	  	 $empCount[$ck] =  \App\Emp::where('category','=',$ck)->count();
	  }
	  
	  foreach($cats as $ck =>  $cat){
	  	 //$uploadedcount[$ck] =  \App\Emp::where('category','=',$ck)->count();
		 
		  $presentcount[$ck] = Attendancereport::
		 where('report_date', '=', $cur_date)
		->where('status', '=', 'Present')
		->where('category', '=', $ck)
		->count();
		
		
		$absentcount[$ck] = Attendancereport::
		 where('report_date', '=', $cur_date)
		->where('status', '=', 'Absent')
		->where('category', '=', $ck)
		->count();
		
		 
		if($presentcount[$ck] > 0){
		 $presentemps[$ck] =  Attendancereport::
		 where('report_date', '=', $cur_date)
		->where('status', '=', 'Present')
		->where('category', '=', $ck)
		->get();
		}
		
		if($absentcount[$ck] > 0){
		$absentemps[$ck] = Attendancereport::
		 where('report_date', '=', $cur_date)
		->where('status', '=', 'Absent')
		->where('category', '=', $ck)
		->get(); 
		}
		
		
		
		$uploadedCount[$ck] = $presentcount[$ck] +  $absentcount[$ck];
		$notenteredcn[$ck] = $empCount[$ck] - $uploadedCount[$ck];
		
	  }  
	  
	  
	 
	 $relations = [
	        'categories' => \App\Category::get()->pluck('name', 'id'),
            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),
			'sitenames' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', ''),
			'sites_attr_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id'),
			'empcount' => $empCount,
			'presentcn' => $presentcount,
			'absentcn' =>  $absentcount,
			'uploadedcn' => $uploadedCount,
			'notenteredcn' => $notenteredcn,
			'presentemps' => $presentemps,
			'absentemps' =>  $absentemps,

        ]; 
		
   return view('attendance.scanfilter', $relations);   
	      
	  }
	  
	  
	   public function getpopupres(Request $request)  
	  {
	  
	  $presentemps = array();
	  
        $ck = $request->cat;
		
		$req_date = $request->fromdate;
		  $cur_date = date("Y-m-d", strtotime($req_date));
		
	  	 //$uploadedcount[$ck] =  \App\Emp::where('category','=',$ck)->count();
		 
		  $presentcount = Attendancereport::
		 where('report_date', '=', $cur_date)
		->where('status', '=', 'Present')
		->where('category', '=', $ck)
		->count();
		
		
		
		if($presentcount > 0){
		 $presentemps =  Attendancereport::
		 where('report_date', '=', $cur_date)
		->where('status', '=', 'Present')
		->where('category', '=', $ck)
		->get();
		}

	  
	 
	 $relations = [
	        
			'presentemps' => $presentemps,
			

        ]; 
		
      return view('attendance.popres', $relations);   
	      
	  }
	  
	  
	   public function getpopupabres(Request $request)  
	  {
	  
	  $presentemps = array();
	  
        $ck = $request->cat;
		
		$req_date = $request->fromdate;
		  $cur_date = date("Y-m-d", strtotime($req_date));
		
	  	 //$uploadedcount[$ck] =  \App\Emp::where('category','=',$ck)->count();
		 
		  $presentcount = Attendancereport::
		 where('report_date', '=', $cur_date)
		->where('status', '=', 'Absent')
		->where('category', '=', $ck)
		->count();
		
		
		
		if($presentcount > 0){
		 $presentemps =  Attendancereport::
		 where('report_date', '=', $cur_date)
		->where('status', '=', 'Absent')
		->where('category', '=', $ck)
		->get();
		}

	  
	 
	 $relations = [
	        
			'presentemps' => $presentemps,
			

        ]; 
		
      return view('attendance.popres', $relations);   
	      
	  }
	  
	  
	  	  
	   public function getnotenteredres(Request $request)  
	  {
	  
	  $presentemps = array();
	  
        $ck = $request->cat;
		
		$req_date = $request->fromdate;
		  $cur_date = date("Y-m-d", strtotime($req_date));
		
	      $empCount =  \App\Emp::where('category','=',$ck)->count();
		  
		  $notentered = array();
		  
		  if($empCount > 0){
		      $empRes =  \App\Emp::where('category','=',$ck)->get();
			  
			  foreach($empRes as $empr){
			     
				 $presentcount = Attendancereport::
		       where('report_date', '=', $cur_date)
		     ->where('status', '=', 'Present')
		            ->where('category', '=', $ck)
					  ->where('empcode', '=', $empr->empcode)
		             ->count();
					 
					  $abscount = Attendancereport::
		       where('report_date', '=', $cur_date)
		     ->where('status', '=', 'Absent')
		            ->where('category', '=', $ck)
					  ->where('empcode', '=', $empr->empcode)
		             ->count();
					 if($presentcount > 0 || $abscount > 0){
					 }else{
					  $notentered[] = $empr;
					 }
					 
				 
				 }
			  
		  }
	 
	 $relations = [
	        
			'presentemps' => $notentered,
			

        ]; 
		
      return view('attendance.popresemp', $relations);   
	      
	  }
	  
	  
	  
	  
	  
	   public function getsearchres(Request $request)
	  
	  {
	   $results = array();
	   $yearmon = array();
	   $departmentval = "";
	   $nameval = "";
		 $fromdate= $request->fromdate;
		 $todate= $request->todate;
		 $ecode= $request->empcode;
		 
		 $fromfdate = date("Y-m-d", strtotime($fromdate));
		 $tofdate =  date("Y-m-d", strtotime($todate));
		 
		 $fromfdate_month = date("m", strtotime($fromdate));  
		 $tofdate_month = date("m", strtotime($todate));  
		 $tofdate_month_temp = date("m", strtotime($todate));
		  $fromfdate_month_temp = date("m", strtotime($fromdate)); 
		  
		  	 $tofdate_day_temp = date("d", strtotime($todate));
		  $fromfdate_day_temp = date("d", strtotime($fromdate)); 
		 
		 $fromfdate_year = date("Y", strtotime($fromdate));  
		 $tofdate_year = date("Y", strtotime($todate));  
		
		 
		$from_day_count = cal_days_in_month(CAL_GREGORIAN, $fromfdate_month, $fromfdate_year); 
		$to_day_count = cal_days_in_month(CAL_GREGORIAN, $tofdate_month, $tofdate_year);  

		 
		
		$results_cn = Attendancereport::
		 where('report_date', '>=', $fromfdate)
		->where('empcode', '=', $ecode)
		->where('report_date', '<=', $tofdate )
		->count();
		  
		//if($results_cn > 0){
		  $results = Attendancereport::
		 where('report_date', '>=', $fromfdate)
		->where('empcode', '=', $ecode)
		->where('report_date', '<=', $tofdate )
		->get();
		
		   $fromfdate = $fromfdate_year."-".$fromfdate_month."-1"; 
			 $tofdate_val = $fromfdate_year."-".$tofdate_month."-1"; 
		      $lastdate_day = date("t", strtotime($tofdate_val));
		      $tofdate = $fromfdate_year."-".$tofdate_month."-".$lastdate_day;  
			   $k = 0;
			    $yearmonth = array();
			  for($fy = $fromfdate_year; $fy <= $tofdate_year; $fy++ ) {
			   $k = $k + 1;
			
			  if($fromfdate_year == $tofdate_year) {
			    $tofdate_month = $tofdate_month;
			  }
			   else{
			     if($k == 1) {
				    $fromfdate_month = $fromfdate_month;
				 }
				  else{
				   $fromfdate_month = 1;  
				  }
				  if($k == 1 && $fromfdate_year == $tofdate_year){
				     $tofdate_month = $tofdate_month;  
				  }
				  else{
				    $tofdate_month = 12;
				  }
				  if($fy == $tofdate_year){
				     $tofdate_month = $tofdate_month_temp;   
				  }
			   }
			   
			  for($im = $fromfdate_month; $im <= $tofdate_month; $im++ ){
			  
			      $fromf_l_date = $fy."-".$im."-1"; 
			       $lastdate_day_val = date("t", strtotime($fromf_l_date));
				    $yearmonth[] = array("year" => $fy, "month" => $im, "days" => $lastdate_day_val);
						for($rm = 1; $rm <= $lastdate_day_val; $rm++){
						$fr_date = $fy."_".$fromfdate_month."_".$rm;
						$fr_date_val = $fy."-".$im."-".$rm;
					   
						$fr_res_my_coun = Attendancereport::
						where('report_date', '=', $fr_date_val)
						->where('empcode', '=', $ecode) 
						->count();     
						  
						if($fr_res_my_coun > 0){  
						
							$fr_res_res_rw = Attendancereport::
							where('report_date', '=', $fr_date_val)
							->where('empcode', '=', $ecode)
							->first();
							  $departmentval = $fr_res_res_rw->department;
							  $nameval = $fr_res_res_rw->name;
							  $dflag = 0;
							  if($tofdate_month_temp == $fromfdate_month_temp){
									if( $fromfdate_day_temp <= $rm && $tofdate_day_temp >= $rm ){
									 $dflag = "1";
									}
								
							  }
							$yearmon[$fy."_".$im."_".$rm] = array("department" => $fr_res_res_rw->department, "duration"=>$fr_res_res_rw->duration, "year" =>$fy, "month" =>$im, "date" =>$rm, "status" => $fr_res_res_rw->status, "intime" => $fr_res_res_rw->intime,"outtime" => $fr_res_res_rw->outtime,"dflag" => $dflag); 
							
							
						$yearmon_de[$fy."_".$im."_".$rm]['department'] = $fr_res_res_rw->department;
						$yearmon_de[$fy."_".$im."_".$rm]['duration'] =$fr_res_res_rw->duration;
						$yearmon_de[$fy."_".$im."_".$rm]['status'] = $fr_res_res_rw->status;
						$yearmon_de[$fy."_".$im."_".$rm]['intime'] = $fr_res_res_rw->intime;
						$yearmon_de[$fy."_".$im."_".$rm]['outtime'] = $fr_res_res_rw->outtime;
						$yearmon_de[$fy."_".$im."_".$rm]['year'] = $fy;
						$yearmon_de[$fy."_".$im."_".$rm]['month'] = $im;
						$yearmon_de[$fy."_".$im."_".$rm]['date'] = $rm;
						$yearmon_de[$fy."_".$im."_".$rm]['dflag'] = $dflag; 
						  
						}
						
						 else{
						 
						  $dflag = 0;
							  if($tofdate_month_temp == $fromfdate_month_temp){
									if( $fromfdate_day_temp <= $rm && $tofdate_day_temp >= $rm){
									 $dflag = "1";
									}
									}
		     $yearmon[$fy."_".$im."_".$rm] = array("department" => "", "duration"=>"", "status" => "", "intime" => "","outtime" => "","year" =>$fy, "month" =>$im, "date" =>$rm,"dflag" => $dflag); 
			 
						 $yearmon_de[$fy."_".$im."_".$rm]['department'] = "";
						$yearmon_de[$fy."_".$im."_".$rm]['duration'] ="";
						$yearmon_de[$fy."_".$im."_".$rm]['status'] = "";
						$yearmon_de[$fy."_".$im."_".$rm]['intime'] = "";
						$yearmon_de[$fy."_".$im."_".$rm]['outtime'] = "";
						$yearmon_de[$fy."_".$im."_".$rm]['year'] = "";
						$yearmon_de[$fy."_".$im."_".$rm]['month'] = "";
						$yearmon_de[$fy."_".$im."_".$rm]['date'] = "";
						$yearmon_de[$fy."_".$im."_".$rm]['dflag'] = "";  
		            }  			 
						}  
				   
			  }
			  }
		    
		
		  
		 
	//	} 
		
	
	     //$assets = Attendancereport::all();   
		 
		 $relations = [
		    'empname_val' => $nameval,
            'empname' => getempnamebycode($ecode),
			'empcode' => $ecode,
			'yearmon' => $yearmon,
			'department' => $departmentval,
			'yearmon_de' => $yearmon_de,
			'yearmonth' => $yearmonth,
         ];
		
		
		 return view('attendance.searchres', $relations);      
		  
	  }
	  
	  
	  
	  
	  
	  //GET FACE ATTENDANCE
	  
	    public function getfaceattendance(Request $request)
	  
	  {
	     $ermsg = "";
		if(isset($_GET['empcode'])){
		  $empcode = $_GET['empcode'];
		   if(strlen($empcode) <= 0){
		    $ermsg .="Employee Code Required"."<br>";
		   }
		}
		 else{
		    $ermsg .="Employee Code Required"."<br>";
		 }
		
		if(isset($_GET['report_date'])){
		  $report_date =$_GET['report_date'];
		   if(strlen($report_date) <= 0){
		    $ermsg .="Report date Required"."<br>";
		   }
		}
		else{
		   $ermsg .="Report date  Required"."<br>";
		}
		if(isset($_GET['intime'])){
		  $intime = $_GET['intime'];
		   if(strlen($intime) <= 0){
		    $ermsg .="Intime Required"."<br>";
		   }
		}
		else{
		   $ermsg .="Intime Required"."<br>";
		}
		if(isset($_GET['outtime'])){
		  $outtime = $_GET['outtime'];
		   if(strlen($outtime) <= 0){
		    $ermsg .="Outtime Required"."<br>";
		   }
		}
		else{
		   $ermsg .="Outtime Required"."<br>";
		}
		
		if($ermsg == ""){
		
 		}
		else{
		  echo $ermsg;
		}
		
		
		  
	  }
	  
	  
	  
	  
	    public function gettrackres(Request $request)
	  
	  {
	   $results = array();
	   $yearmon = array();
	   $departmentval = "";
	   $department = "";
	   $nameval = "";
	   $empn = "";
		 $fromdate= $request->fromdate;
		 $ecode= $request->empcode;
		 
		 $fromfdate = date("Y-m-d", strtotime($fromdate));

		 
		
		$results_cn = Attendancereport::
		 where('report_date', '=', $fromfdate)
		->where('empcode', '=', $ecode)
		->count();
		  
		if($results_cn > 0){
		  $results = Attendancereport::
		 where('report_date', '=', $fromfdate)
		->where('empcode', '=', $ecode)
		->get();
		
		  $results_row = Attendancereport::
		 where('report_date', '=', $fromfdate)
		->where('empcode', '=', $ecode)
		->first();
		
		$department = $results_row->department;
		$empn = $results_row->name;
		
		}
		 
	//	} 
	
	    if( getempnamebycode($ecode) == "") {
		    $empname = $empn;
		}
		else
		{
		   $empname = getempnamebycode($ecode);
		}
	
	     //$assets = Attendancereport::all();   
		 
		 $relations = [
		    'empname_val' => $nameval,
            'empname' => $empname,
			'empcode' => $ecode,
			'results' => $results,
			'fdate' => $fromfdate,
			'department' => $department,
         ];
		
		
		 return view('attendance.trackres', $relations);      
		  
	  }
	  


// SAVE UPLOAD FILE


 
// END UPLOAD EXCEL


  public function saveuploadfile(Request $request)

    {

    //redirect('pages.roombooking');

   //return 'success';
     


 
    
     $filename = uniqid();

		$extension = $request->file('file')->getClientOriginalExtension();

	 	$file = $request->file('file')->move('attendancereports/reports',$filename.".".$extension);

	 	$filename_extension = 'attendancereports/reports/'.$filename.'.'.$extension;
		
		 Config::set('excel.import.heading', 'false');

		$xls_datas = Excel::load($filename_extension, function($reader) { })->toArray();
		 
	    $edata = $request->all();
	
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
			$data_fres =array();
			
			
			/*  $matchfields = ['month' => $month, 'year' => $year, 'site' => $site]; 
			   
			    $res_count =  DB::table('indentedmisreports')->where($matchfields)->count();
			   
			    DB::table('indentedmisreports')->where($matchfields)->delete();*/
				
				
				// // /////// ********************************** FOR MULTIPLE SHEETS
				
			/*	 foreach($xls_datas as $kk => $xls_data)

		    {  
			 
			 if($kk == 0) {
			 
			   echo  $kk;  
			   $ii = 0;
			   	echo "<pre>"; print_r($xls_data);echo "</pre>"; 
			  foreach($xls_data as $resk => $xlsresults) {
			  $ii  = $ii  + 1;
			   //echo  $resk;
			  
				 
				  if($resk == 0) continue;
				   if($resk == 1) $reporton = $xlsresults[10];
				    if($resk == 2) $company = $xlsresults[4];
					if($resk == 3) continue;
					if($resk == 4) continue;
					if($resk == 5) continue;
					if($resk == 6)  $attendance_date = $xlsresults[5];
					if($resk == 7)  $department = $xlsresults[3];
					if($resk > 7) {
					
					     if($xlsresults[1]  == 'Department'){
						 //echo "<pre>"; print_r($xlsresults);echo "</pre>"; 
						 	$department = $xlsresults[3]; 
							$ind = $resk;
							if($resk == $ind + 1) {}
							else { 
							  if($xlsresults[2] == "" || $xlsresults[3] == 'Name')  continue;
							  $data_fres[] = array("ecode"=>$xlsresults[2],"name"=>$xlsresults[3]);
							}
						 }
						 else{
						  // echo "<pre>"; print_r($xlsresults);echo "</pre>"; 
						     if($xlsresults[2] == "" || $xlsresults[3] == 'Name')  continue;
							  $data_fres[] = array("ecode"=>$xlsresults[2],"name"=>$xlsresults[3]);
						 }
					}
				   
				 
			  }
			}
			} */
				
				//// ***************************************************** END FOR MULTIPLE SHEETS
				  $attendance_date = "";
				  
				  $empty_empcodes = "";
		  
			  foreach($xls_datas as $resk => $xlsresults) {
			  
			   //echo  $resk;  
				 
				  if($resk == 0) continue;
				   if($resk == 1) $reporton = $xlsresults[10];
				    if($resk == 2) $company = $xlsresults[4];
					if($resk == 3) continue;
					if($resk == 4) continue;
					if($resk == 5) continue;
					if($resk == 6)  $attendance_date = $xlsresults[5];
					if($resk == 7)  $department = $xlsresults[3];
					
					$attendance_date_new = date("Y-m-d", strtotime($attendance_date));
					
					if($resk > 7) {
					
					     if($xlsresults[1]  == 'Department'){
						 
						 	$department = $xlsresults[3]; 
							$ind = $resk;
							if($resk == $ind + 1) {}
							else { 
							  if($xlsresults[2] == "" || $xlsresults[3] == 'Name')  continue;
							  if($xlsresults[21]) {} else $xlsresults[21] = "";
							  $existempreq =  \App\Emp::where('ecode','=',$xlsresults[2])->count();
							  if($existempreq > 0)
							  {
							  	$existempreq_res =  \App\Emp::where('ecode','=',$xlsresults[2])->first();
								$department_id = $existempreq_res['category'];
								$department_resv = \App\Category::where('id','=',$department_id)->first();
								$department = $department_resv['name'];
							  }
							  else
							  {
							   if($empty_empcodes) { $empty_empcodes .=",";}
							   $empty_empcodes .=  $xlsresults[2];
							   $department_id = 0;   
							  }
							  if($xlsresults[9] == "") $xlsresults[9] = "00:00";
							  if($xlsresults[11] == "") $xlsresults[11] = "00:00";
							  $data_fres = array("empcode"=>$xlsresults[2],"name"=>$xlsresults[3],"department"=>$department,"intime"=>$xlsresults[9],"outtime"=>$xlsresults[11],"site"=>$site,"user_id"=>$user_id,"report_date"=>$attendance_date_new,"duration"=>$xlsresults[15],"shift"=>$xlsresults[5],"remarks"=>$xlsresults[21],"status"=>$xlsresults[19],"category"=>$department_id,"sintime"=>$xlsresults[6],"souttime"=>$xlsresults[7],"workduration"=>$xlsresults[12],"ot"=>$xlsresults[14],"lateby"=>$xlsresults[17],"earlygoingby"=>$xlsresults[18]);
							   Attendancereport::create($data_fres); 
							  
							} 
						 } 
						 else{
						  // echo "<pre>"; print_r($xlsresults);echo "</pre>"; 
						     if($xlsresults[2] == "" || $xlsresults[3] == 'Name')  continue;
							 if($xlsresults[21]) {} else $xlsresults[21] = "";
							 
							 $existempreq =  \App\Emp::where('ecode','=',$xlsresults[2])->count();
							  if($existempreq > 0)
							  {
							  	$existempreq_res =  \App\Emp::where('ecode','=',$xlsresults[2])->first();
								$department_id = $existempreq_res['category'];
								$department_resv = \App\Category::where('id','=',$department_id)->first();
								$department = $department_resv['name'];
							  }
							  else
							  {
							  if($empty_empcodes) { $empty_empcodes .=",";}
							   $empty_empcodes .=  $xlsresults[2];
							   $department_id = 0;   
							  }
							  if($xlsresults[9] == "") $xlsresults[9] = "00:00";
							  if($xlsresults[11] == "") $xlsresults[11] = "00:00";
							 $data_fres = array("empcode"=>$xlsresults[2],"name"=>$xlsresults[3],"department"=>$department,"intime"=>$xlsresults[9],"outtime"=>$xlsresults[11],"site"=>$site,"user_id"=>$user_id,"report_date"=>$attendance_date_new,"duration"=>$xlsresults[15],"shift"=>$xlsresults[5],"remarks"=>$xlsresults[21],"status"=>$xlsresults[19],"category"=>$department_id,"sintime"=>$xlsresults[6],"souttime"=>$xlsresults[7],"workduration"=>$xlsresults[12],"ot"=>$xlsresults[14],"lateby"=>$xlsresults[17],"earlygoingby"=>$xlsresults[18]);
							   Attendancereport::create($data_fres); 
							 
						 }
					}  	     
				   
				 
			 //  Indentedmisreport::create($rec_data); 

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
			
			// echo "<pre>"; print_r($data_fres);echo "</pre>";
			
			   
			
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
		
		   $assets = Attendancereport::all();
		
		 $relations = [
             'assets' =>  $assets,
            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),
			'sitenames' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', ''),
			'sites_attr_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id'),
			'empcodeerr' => $empty_empcodes,

        ]; 

        if($empty_empcodes) {
     		  return view('attendance.importatten', $relations);   
			  //return redirect()->route('attendance.uploadform', $relations);   
			
		}
		else{
		   
		   return redirect()->route('attendance.getlist');   
		}  
		//return redirect()->route('attendance.uploadform',$relations); 
  
}
 
// END SAVE UPLOAD FILE

 
}



