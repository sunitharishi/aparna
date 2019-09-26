<?php

use App\Role; 

use App\Fmsdailyreport;
use App\Pmsdailyreport;
use App\Firesafedailyreport;
use App\Securitydailyreport;
use App\Dailylockpermission;
use App\Pmsdailyreportvalidation;
use App\Dailyreportvalidation;
use App\Dailylockdayspermission;
use App\Firesafedailyreportvalidation;
use App\Securitydailyreportvalidation;

use App\Borewellsnwmisreport;
use App\Firesafetymisreport;
use App\Equipmentmisreport;
use App\Stpmisreport;
use App\Wspmisreport;
use App\Cmdmisreport;
use App\Securitymisreport;
use App\Trafficmisreport;
use App\Housekpmisreport;
use App\Horticulturemisreport;
use App\Clubutilizationmisreport;
use App\Indentedmisreport;
use App\Apnacomplaintmisreport;
use App\Mockdrillmisreport;
use App\Asset;
use App\Assetgroup;

  
use App\Dailylocktime;

use App\Attendancereport;
 

use App\Site; 
use App\Category;
use App\Emp;
use App\User;

function check_role($status)
{

if($status== 0) echo 'New'; elseif($status == '1') echo 'Completed'; else{
$task_workflow = ProjectWorkflow::find($status); if($task_workflow)echo $task_workflow->title; } 

}

function get_permission($id,$action)
{

$task_workflow = Role::find($id); //if($task_workflow) echo $task_workflow->permisstatus; 

//print_r($task_workflow);  
$permission = $task_workflow->permisstatus;

  $resultarr = explode(",",$permission);
  if(in_array($action, $resultarr)) return true;
   return false;

}

function getrolename($id)
{
$rolename ="";
$task_workflow = Role::find($id); //if($task_workflow) echo $task_workflow->permisstatus; 

if($task_workflow)
$rolename = $task_workflow->title;

 return $rolename;

}


function get_sitename($id)
{
$sitename = "";
$task_workflow = Site::find($id); //if($task_workflow) echo $task_workflow->permisstatus; 

//print_r($task_workflow);  
if($task_workflow) {
$sitename = $task_workflow->name;
}

return $sitename;
}

function get_catname($id)
{

$task_workflow = Category::find($id); //if($task_workflow) echo $task_workflow->permisstatus; 

//print_r($task_workflow); 
if(isset($task_workflow->name)){ 
$sitename = $task_workflow->name;
}else{$sitename = "";}

return $sitename;
} 

function getempemail($id)
{
$sitename ="";
$task_workflow = Emp::find($id); //if($task_workflow) echo $task_workflow->permisstatus; 

if($task_workflow)
$sitename = $task_workflow->email;

return $sitename;
}

function getempname($id)
{
$sitename ="";
$task_workflow = Emp::find($id); //if($task_workflow) echo $task_workflow->permisstatus; 

//print_r($task_workflow);  
if($task_workflow)
$sitename = $task_workflow->name;

return $sitename;
}

function getempnamebycode($code)
{
$sitename ="";
 $results = Emp::
      where('ecode', '=', $code)
    ->first();

//print_r($task_workflow);  
if($results)
$sitename = $results->name;

return $sitename;
}
   
   
   // Get Login Permissions 
   
   function getlogperms($peraction){
   	  if(Auth::user()->id==1) return true;
      $role_id = Auth::user()->role_id;
	  
	  $task_workflow = Role::find($role_id);  
	  if($task_workflow) {
	  $permission = $task_workflow->permisstatus;
       if($permission){
	     $sitearr = explode(",",$permission);
		 if (in_array($peraction, $sitearr)){
		   return true;
		 }else{
		   return false;
		 }
	   }
  		 
   }
   }  
   
   function pstatus()
   {
   	
		$userid = Auth::user()->id;
		$presentcn_cn = Dailylockdayspermission::
		//where('permissiondate', '=', $todayd)
		where('user_id', '=', $userid)
		->where('lockstatus', '=', 'rejected')
		->count();		
		$pstatus = $presentcn_cn;
		return $pstatus;
	
   }
   function getlogperms_tdays($cdate){
   		date_default_timezone_set('Asia/Kolkata');
		$rdate = $cdate;
		$date = date('Y-m-d', strtotime($rdate));
		$time = "13:00:00";
		
		$timestamp = strtotime($date . ' ' . $time); //1373673600
		
		// getting current date 
		$cDate = strtotime(date('Y-m-d H:i:s'));
		
		// Getting the value of old date + 24 hours
		$oldDate = $timestamp + 86400*3; // 86400 seconds in 24 hrs
		
		if($oldDate < $cDate)
		{
		    $userid = Auth::user()->id;
			$todayd = date("Y-m-d");
			$presentcn_cn = Dailylockdayspermission::
			//where('permissiondate', '=', $todayd)
			where('user_id', '=', $userid)
			->where('lockstatus', '=', 'rejected')
			->count();
			  
			  $userid = Auth::user()->id;
			$todayd = date("Y-m-d");
			 $appr_cn = Dailylockdayspermission::
			//where('permissiondate', '=', $todayd)
			where('user_id', '=', $userid)
			->where('lockstatus', '=', 'approved')
			->count();
		
			if($presentcn_cn > 0){
			   return false;
			}
			if($appr_cn > 0){
			   return true;
			}
			else{
			  return true;
			}
		}
		else
		{
		  return true;
		}
   }
   
      function getlogperms_daily($peraction){
	   
	  date_default_timezone_set('Asia/Kolkata');
   	  if(Auth::user()->id==1) return true;
      $role_id = Auth::user()->role_id;
	  
	  $task_workflow = Role::find($role_id);  
	  if($task_workflow) {
	  $permission = $task_workflow->permisstatus;
       if($permission){
	     $sitearr = explode(",",$permission);
		 if (in_array($peraction, $sitearr)){
		  $did = 1;
		  $gettime = Dailylocktime::find($did);
		  if($gettime){
		   $timeinterval = $gettime->daylocktime;
			$currenttime = date('H:i A');
			$timef = date("H:i", strtotime($timeinterval)).":00";
			$datef  = date("Y-m-d");
			$tot_date =   $datef." ".$timef;
			$time_diff = time() - strtotime($tot_date); 
			
		
			if($time_diff < 0){
			
			
			 
			 //return true;
			  $userid = Auth::user()->id;
			    $todayd = date("Y-m-d");
				 $presentcn_cn = Dailylockpermission::
				//where('permissiondate', '=', $todayd)
				where('user_id', '=', $userid)
				->where('lockstatus', '=', 'rejected')
				->count();
				  
				  $userid = Auth::user()->id;
			    $todayd = date("Y-m-d");
				 $appr_cn = Dailylockpermission::
				//where('permissiondate', '=', $todayd)
				where('user_id', '=', $userid)
				->where('lockstatus', '=', 'approved')
				->count();
			
				if($presentcn_cn > 0){
				   return false;
				}
				if($appr_cn > 0){
				   return true;
				}
				else{
				  return true;
				}
			}else{ 
			   $userid = Auth::user()->id;
			    $todayd = date("Y-m-d");
				$presentcn_cn = Dailylockpermission::
				//where('permissiondate', '=', $todayd)
				where('user_id', '=', $userid)
				->where('lockstatus', '=', 'rejected')
				->count();
				if($presentcn_cn > 0){
				   return false;
				}
				  $userid = Auth::user()->id;
			    $todayd = date("Y-m-d");
				 $appr_cn = Dailylockpermission::
				//where('permissiondate', '=', $todayd)
				where('user_id', '=', $userid)
				->where('lockstatus', '=', 'approved')
				->count();
				if($appr_cn > 0){
				   return true;
				}
		   return false;
		   }
		 }else{
		   return false;
		 }
	   }
  		 
   } else{
    return false;
   }
   }  
   }
   
   
   
   
    function getattendstatus($year,$month,$empc,$status){
	$notenteredCount = 0;
	   $fromdate = $year."-".$month."-"."1";
	   $lastdate_day = date("t", strtotime($fromdate));
	   $todate = $year."-".$month."-".$lastdate_day;
	
	   $absent_cn = Attendancereport::
		 where('report_date', '>=', $fromdate)
		->where('empcode', '=', $empc)
		->where('status', '=', 'Absent')
		->where('report_date', '<=', $todate )
		->count();
		
		 $presentcn_cn = Attendancereport::
		 where('report_date', '>=', $fromdate)
		->where('empcode', '=', $empc)
		->where('status', '=', 'Present')
		->where('report_date', '<=', $todate )
		->count();
		
		$notenteredCount = (int)$lastdate_day - $absent_cn - $presentcn_cn;
		
		if($status == 'absent') {
		  return  $absent_cn;
		}
		if($status == 'present') {
		  return  $presentcn_cn;
		}
		
		if($status == 'notenter') {
		  return  $notenteredCount;
		}
		
		 }  
    
   // GET MTD Values
   
   function getmtdfms($date,$site,$field){
   	
	//  $users = Fmsdailyreport::whereIn('site', 5)->where('reporton', '>=', 2018-01-01)->count();
	//$formfieldarray = Fmsdailyreport::whereIn('site', '5')->where('reporton', '>=', '2018-01-30')->count();
	  
	   /*$matchfields = ['site' => '5', 'reporton' => '2018-01-30'];
	  
	   $formfieldarray = Fmsdailyreport::where($matchfields)->count();
	   dd(Fmsdailyreport::where($matchfields)->count()); */
	   
	  // $date = '2018-01-30';
	  // $date = '30-01-2018';  
	   $datearr = explode("-",$date);
	   $month = $datearr[1];
	   $year = $datearr[2];
	   //$site = '5';
	    $startdate = $year."-".$month."-"."1";
	    $todate = $year."-".$month."-".$datearr[0];
	   
	   
	   
	  $results = Fmsdailyreport::
      where('reporton', '>=', $startdate)
	->where('site', '=', $site)
    ->where('reporton', '<=', $todate )
    ->get();
	 $fresult = 0;
	  $mincn = 0;
	//echo "TESTEST".count($results); exit;
	 if(count($results) > 0){
	
	foreach( $results as $result){
	   //  echo "<pre>"; print_r($result); echo "</pre>";
		// $field = 'pwr_ctpt';
		if($field=='dgset_pwrfailure'){
		  if($result[$field]) {
			 $hr = $result[$field];
			 $tarr = explode(":",$hr);
			 $hour = (int)$tarr[0];
			 $min = (int)$tarr[1];
			 $tmin = ($hour * 60) + $min;
			 $mincn = $mincn + $tmin;
			 }
			 
		}else{
		 $fresult = (float)$fresult + (float)$result[$field];
		 }
	  }
	 }
	 // echo (float)$fresult; exit;
	 
	if($field=='dgset_pwrfailure'){
	    $fresult ="00:00"; 
	     if($mincn > 0){
		    $hours = floor($mincn / 60);
             $minutes = ($mincn % 60);
			 $fresult = $hours.":".$minutes;
		 } 
		return $fresult;
	}else{
	 	return (float)$fresult;
	 }
	  
	 
   } 
   
   
      // GET MTD Values
   
   function getpmsmtd($date,$site,$field){
   	

	   $datearr = explode("-",$date);
	   $month = $datearr[1];
	   $year = $datearr[2];
	   //$site = '5';
	    $startdate = $year."-".$month."-"."1";
	    $todate = $year."-".$month."-".$datearr[0];
	   
	  $results = Pmsdailyreport::
      where('reporton', '>=', $startdate)
	->where('site', '=', $site)
    ->where('reporton', '<=', $todate )
    ->get();
	 $fresult = 0;
	  $mincn = 0;
	// echo "TESTEST".count($results); exit;
	 if(count($results) > 0){
	
	foreach( $results as $result){
	   //  echo "<pre>"; print_r($result); echo "</pre>";
		// $field = 'pwr_ctpt';
		
		 $fresult = (float)$fresult + (float)$result[$field];
		
	  }
	 }
	 // echo (float)$fresult; exit;
	 
	 	return (float)$fresult;
	 
   } 
    
  
    function getdefaultpmstot($site){
	
	   $field = "sprinklers";
	   
	 $resultscn = Pmsdailyreportvalidation::
      where('site', '=', $site)
    ->count();
	
	//echo "COOUNT".$resultscn; exit;
	
	if($resultscn > 0) {

	  $results = Pmsdailyreportvalidation::
      where('site', '=', $site)
    ->first(); 
	
	 // echo "<pre>"; print_r($results); echo "</pre>"; exit;
	  return $results;
	  }
	    
   } 
   
   function getlogeedname($id){
		/*$resultscn = Dailyreportvalidation::
		where('site', '=', $site)
		->count();*/
		  
     $resultscn = User::
      where('id', '=', $id)
    ->count();
	
	  
	
	  if($resultscn > 0){
	       $results = User::
      where('id', '=', $id)
    ->first();
	
	
	   $name =  $results->name;
	   return $name;  
	  }
		
   }
   
   
   function getassetname($id){
		/*$resultscn = Dailyreportvalidation::
		where('site', '=', $site)
		->count();*/
		  $name = "";
     $resultscn = Asset::
      where('id', '=', $id)
    ->count();
	
	  
	
	  if($resultscn > 0){
	       $results = Asset::
      where('id', '=', $id)
    ->first();
	
	
	   $name =  $results->name;
	   return $name;  
	  }
		
   }
   
    function getassetgroupname($id){
		/*$resultscn = Dailyreportvalidation::
		where('site', '=', $site)
		->count();*/
		  $name = "";
     $resultscn = Assetgroup::
      where('id', '=', $id)
    ->count();
	
	  
	
	  if($resultscn > 0){
	       $results = Assetgroup::
      where('id', '=', $id)
    ->first();
	
	
	   $name =  $results->name;
	   return $name;  
	  }
		
   }
   
    function getdefaultfmstot($site){
	   
	 $resultscn = Dailyreportvalidation::
      where('site', '=', $site)
    ->count();
	
	//echo "COOUNT".$resultscn; exit;
	
	if($resultscn > 0) {

	  $results = Dailyreportvalidation::
      where('site', '=', $site)
    ->first();
	
	 // echo "<pre>"; print_r($results); echo "</pre>"; exit;
	  return $results;
	  }
	   
   } 
    
   function getdefaultfiresafetot($site){
	   
	 $resultscn = Firesafedailyreportvalidation::
      where('site', '=', $site)
    ->count();
	
	//echo "COOUNT".$resultscn; exit;
	
	if($resultscn > 0) {

	  $results = Firesafedailyreportvalidation::
      where('site', '=', $site)
    ->first();
	
	 // echo "<pre>"; print_r($results); echo "</pre>"; exit;
	  return $results;
	  }
	   
   } 
   
   
    function getdefaultsecurity($site){
	   
	 $resultscn = Securitydailyreportvalidation::
      where('site', '=', $site)
    ->count();
	
	//echo "COOUNT".$resultscn; exit;
	
	if($resultscn > 0) {

	  $results = Securitydailyreportvalidation::
      where('site', '=', $site)
    ->first();
	
	 // echo "<pre>"; print_r($results); echo "</pre>"; exit;
	  return $results;
	  }
	   
   }   
   
   function checkFmsdailyStatus($site, $date){
    $date = $date;
	$site = $site;
   
		$rescoun = Fmsdailyreport::
		where('reporton', '=', $startdate)
		->where('site', '=', $site)
		->count();
		
		if($rescoun > 0){
			$resrow = Fmsdailyreport::
			where('reporton', '=', $startdate)
			->where('site', '=', $site)
			->first();
			
			//echo "<pre>"; print_r($resrow); echo "</pre>"; exit;
		}
		
		
   }
   
   
   function getsitenamesAsLogin(){
    $siteattrname = array();
     if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  }
		return $siteattrname;  
   }
   
   
    function getsitenamesAsLoginTemp(){
    $siteattrname = array();
     if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', 'all');
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			if($getemp_info)
			{
				$siteinfo = $getemp_info->community;
				$sitearr = explode(",",$siteinfo);
				$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
			}
		  }
		return $siteattrname;  
   }
   
   
   function sum_the_time($time1, $time2) {
	  $times = array($time1, $time2);
	  $seconds = 0;
	  foreach ($times as $time)
	  {
		list($hour,$minute,$second) = explode(':', $time);
		$seconds += $hour*3600;
		$seconds += $minute*60;
		$seconds += $second;
	  }
	  $hours = floor($seconds/3600);
	  $seconds -= $hours*3600;
	  $minutes  = floor($seconds/60);
	  $seconds -= $minutes*60;
	  // return "{$hours}:{$minutes}:{$seconds}";
	  return sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds); // Thanks to Patrick
	}
   
    function getDgsetsNum($site){
  
   
    $resultscn = Dailyreportvalidation::
      where('site', '=', $site)
    ->count();
	 
	if($resultscn){
	
	$resultsrw = Dailyreportvalidation::
      where('site', '=', $site)
    ->first();
	
	  return $resultsrw->dgsetsnum;
	  
	}
		
		
   }
   
   
   // CHECK DAILY STATUS
   
   function checkDailyStatus($date,$site){
      

    //redirect('pages.roombooking');

   //return 'success';

   $date=  $date;

   $site= $site;

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

//if(strlen($pmsresrw->extra_act_multching) == 0)$pmsflagcn = $pmsflagcn + 1;

//if(strlen($pmsresrw->extra_act_gap_filling) == 0)$pmsflagcn = $pmsflagcn + 1;

//if(strlen($pmsresrw->extra_act_gap_staking) == 0)$pmsflagcn = $pmsflagcn + 1; 

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

 


  return $response;
   

  //print json_encode($response);

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
   
   // GET MIS REPORT STATUS
   function checkmisstatus($month, $year) {
       $fresult = array();
	   $sitenames = array();
	   $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');  
	   $sitesarr = array();
	   $brnw_st_count = 0;
	   $firesafe_st_count = 0;
	   $equipment_st_count = 0;
	   $stp_st_count = 0;
	   $wsp_st_count = 0;
	   $cmd_st_count = 0;
	   $security_st_count = 0;
	   $hskp_st_count = 0;
	   $horticul_st_count = 0; 
	   $clubhs_st_count = 0;
	   $indented_st_count = 0;
	   $apnscomp_st_count = 0;
	   $mockdrill_st_count = 0;
	   $traffic_st_count = 0;
	    
	   
	   if(count($sitenames) > 0){
	         foreach($sitenames as $sk => $siten){
			 	$match_fields = ['month' => $month, 'year' => $year, 'site' => $sk, 'report_status' => 1]; 
				$match_in_fields = ['month' => $month, 'year' => $year, 'site' => $sk]; 
				$brnw_res_cn = \App\Borewellsnwmisreport::where($match_fields)->count();
				$fire_res_cn = \App\Firesafetymisreport::where($match_fields)->count();
			    $equipment_res_cn = \App\Firesafetymisreport::where($match_fields)->count();
				$stp_res_cn = \App\Stpmisreport::where($match_fields)->count();
				$wsp_res_cn = \App\Wspmisreport::where($match_fields)->count();
				$cmd_res_cn = \App\Cmdmisreport::where($match_fields)->count();
				$secu_res_cn = \App\Securitymisreport::where($match_fields)->count();
				$hskp_res_cn = \App\Housekpmisreport::where($match_fields)->count();
				$horticul_res_cn = \App\Horticulturemisreport::where($match_fields)->count();
				$clubhs_res_cn = \App\Clubutilizationmisreport::where($match_fields)->count();
				$indented_res_cn = \App\Indentedmisreport::where($match_in_fields)->count();
				$apna_res_cn = \App\Apnacomplaintmisreport::where($match_in_fields)->count();
				$mockdrill_res_cn = \App\Mockdrillmisreport::where($match_in_fields)->count();  
				$traffic_res_cn = \App\Trafficmisreport::where($match_fields)->count();
				
				
				
				if($brnw_res_cn > 0){
				  
				} else{
				 $brnw_st_count = $brnw_st_count + 1;
				} 
				
				if($fire_res_cn > 0){
				  
				} else{
				 $firesafe_st_count = $firesafe_st_count + 1;
				} 
				
				if($equipment_res_cn > 0){
				  
				} else{
				 $equipment_st_count = $equipment_st_count + 1;
				} 
				
				if($stp_res_cn > 0){
				  
				} else{
				 $stp_st_count = $stp_st_count + 1;
				} 
				
				if($wsp_res_cn > 0){
				  
				} else{
				 $wsp_st_count = $wsp_st_count + 1;
				} 
				
				if($cmd_res_cn > 0){
				    
				} else{
				 $cmd_st_count = $cmd_st_count + 1;
				} 
				
				if($secu_res_cn > 0){
				    
				} else{
				 $security_st_count = $security_st_count + 1;
				} 
				
				if($hskp_res_cn > 0){
				    
				} else{
				 $hskp_st_count = $hskp_st_count + 1;
				} 
				
				if($horticul_res_cn > 0){
				    
				} else{
				 $horticul_st_count = $horticul_st_count + 1;
				} 
				
				if($clubhs_res_cn > 0){
				    
				} else{
				 $clubhs_st_count = $clubhs_st_count + 1;
				} 
				
				if($indented_res_cn > 0){
				    
				} else{
				 $indented_st_count = $indented_st_count + 1;
				} 
				if($apna_res_cn > 0){
				    
				} else{
				 $apnscomp_st_count = $apnscomp_st_count + 1;
				} 
				
				if($mockdrill_res_cn > 0){
				    
				} else{
				 $mockdrill_st_count = $mockdrill_st_count + 1;
				} 
				
				if($traffic_res_cn > 0){
				    
				} else{
				 $traffic_st_count = $traffic_st_count + 1;
				} 
				
				
			 }
	   }
	     
     $fresult['borewellsnw'] = $brnw_st_count;    
	 $fresult['firesafety'] = $firesafe_st_count;    
	 $fresult['euipmendata'] = $equipment_st_count;   
	 $fresult['stpstatus'] = $stp_st_count; 
	 $fresult['wspstatus'] = $wsp_st_count;  
	 $fresult['cmdstatus'] = $wsp_st_count;
	 $fresult['security'] = $security_st_count; 
	 $fresult['hskp'] = $security_st_count; 
	 $fresult['horticulture'] = $horticul_st_count; 
	 $fresult['clubhouse'] = $clubhs_st_count; 
	 $fresult['indented'] = $indented_st_count; 
	 $fresult['apnacomplaint'] = $apnscomp_st_count; 
	 $fresult['firemockdrill'] = $mockdrill_st_count;   
	 $fresult['traffic'] = $traffic_st_count;     

	 return $fresult;
	  
   }
   
   
   // END GET MIS REPORT STATUS
   
   
   // GET SUBCAT ITEMS
   
   function getitemsubcat($mainid){
   
        $category_id = $mainid?$mainid:0;
       // $sub_cats = AssetcatType::select('id','name')->where('category', $category_id)->orderBy('name','asc')->get();
		$catList = \App\AssetcatType::where('category', $category_id)->orderBy('name','asc')->get()->pluck('name', 'id');
       // return view('items.items_subcategory_selectbox', compact('sub_cats'));
		 return $catList;
   }
   
    function getitemslist($mainid){
   
        $subcategory_id = $mainid?$mainid:0;
       // $sub_cats = AssetcatType::select('id','name')->where('category', $category_id)->orderBy('name','asc')->get();
		$catList = \App\Item::where('itemsubcategory', $subcategory_id)->orderBy('itemcode','asc')->get()->pluck('itemcode', 'id');
       // return view('items.items_subcategory_selectbox', compact('sub_cats'));
		 return $catList;
   }
   
   
    function getvendorname($id){
	   $name = '';
		  $resultscn = \App\Vendor::
      where('id', '=', $id)
    ->count();
	
	  if($resultscn > 0){
	       $results = \App\Vendor::
      where('id', '=', $id)
    ->first();
	
	
	   $name =  $results->name;
	   return $name;  
   }
    return $name;  
   }
   
  
  
  // RESIZE BY RATIO
  

	function resize_byratio($img, $w, $h, $newfilename) {
	 //Check if GD extension is loaded

	 if (!extension_loaded('gd') && !extension_loaded('gd2')) {
	  trigger_error("GD is not loaded", E_USER_WARNING);
	  return false;
	 }


	 //Get Image size info
	 $imgInfo = getimagesize($img);
	 switch ($imgInfo[2]) {
	  case 1: $im = imagecreatefromgif($img); break;
	  case 2: $im = imagecreatefromjpeg($img);  break;
	  case 3: $im = imagecreatefrompng($img); break;
	  default:  trigger_error('Unsupported filetype!', E_USER_WARNING);  break;
	 }
		$ratio1=$imgInfo[0]/$w;
		$ratio2=$imgInfo[1]/$h;
		if($ratio1>$ratio2)
		{
			$thumb_w=$w;
			$thumb_h=$imgInfo[1]/$ratio1;
		}
		else
		{
			$thumb_h=$h;
			$thumb_w=$imgInfo[0]/$ratio2;
		}
	 $nWcidth = round($thumb_w);
	 $nHeight = round($thumb_h);
	 $newImg = imagecreatetruecolor($nWcidth, $nHeight);
	 /* Check if this image is PNG or GIF, then set if Transparent*/  
	 if(($imgInfo[2] == 1) OR ($imgInfo[2]==3)){
	  imagealphablending($newImg, false);
	  imagesavealpha($newImg,true);
	  $transparent = imagecolorallocatealpha($newImg, 255, 255, 255, 127);
	  imagefilledrectangle($newImg, 0, 0, $nWcidth, $nHeight, $transparent);
	 }

	 imagecopyresampled($newImg, $im, 0, 0, 0, 0, $nWcidth, $nHeight, $imgInfo[0], $imgInfo[1]);
	 switch ($imgInfo[2]) {
	  case 1: imagegif($newImg,$newfilename); break;
	  case 2: imagejpeg($newImg,$newfilename);  break;
	  case 3: imagepng($newImg,$newfilename); break;
	  default:  trigger_error('Failed resize image!', E_USER_WARNING);  break;
	 }
	   return $newfilename;
	} 

  
  
  // END  RESIZE BY RATIO


?>