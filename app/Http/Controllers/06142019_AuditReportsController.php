<?php
namespace App\Http\Controllers;
use App\Task;
use App\Indent;
use App\TaskUser;
use App\TaskAttachment;
use App\TaskReply;
use App\Emp;
use PDF;
use App\User;
use DB;
use Excel;
use PHPExcel_Style_Border;
use Auth;
use Config;
use App\Dailylockpermission;
use PHPExcel_Worksheet_Drawing;

use App\Snagcategory;
use App\Snagreport;
use App\Site; 

use App\Fmsdailyreport;
use App\Pmsdailyreport;
use App\Firesafedailyreport;
use App\Firesafedailyreportvalidation;
use App\Securitydailyreport;
use App\Dailyreportvalidation;
use App\Pmsdailyreportvalidation;
use App\Securitydailyreportvalidation;
use App\AuditApnaComplaint;  
use App\AuditHrmanageUpload;


use Illuminate\Http\Request;

use App\Http\Requests\StoreIndentsRequest;

use App\Http\Requests\UpdateIndentsRequest;

use App\Http\Requests\StoreSnagRequest;


class AuditReportsController extends Controller

{



    /**

     * Display a listing of Client.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()
 
    { 
	   
       // $assets = Audit::all();
		
		 return view('audit.index');

    }  
 
  public function fmsa1()

    { 
	    if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $startdate)
				->where('reporton', '<=', $today)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $startdate)
				->where('reporton', '<=', $today)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];   
			
			 return view('audit.auditdetail.fmsa1', $relations);
		    // return view('audit.auditdetail.fmsa1');

    }   
	
	
   public function getfmsdarauditreports(Request $request)
    { 	
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];   
			
		 return view('audit.auditdetail.fmstemplate.fmsa1template', $relations);
 
    }  
	
	
	
public function getfmsdarauditreportsexport(Request $request)
    {
	
	
		/*  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site; */
	  
	  $from_date = $_GET['fromdate'];
	   $to_date = $_GET['todate'];
	    $site = $_GET['site'];
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];  
			
			$paymentsArray = array();
			$paymentsArray[] = ['Site', 'Category', 'Date', 'Report Date','Status'];			
			if(count($results) > 0) {
			  foreach ($results as $kk => $client) {
                  if (count($client) > 0) {
                      foreach ($client as $tt){
					          $rdate = date("d-m-Y", strtotime($tt->reporton)); 
							    $checkval = checkDailyStatus($rdate, $kk);
								 if($checkval[0] == 'yes'){ } else {
									$resrow = array();
									$resrow['site'] = $siteattrname[$kk];
									 $resrow['category'] = "FMS";
									 $resrow['sumit_date'] = date("F j, Y, g:i a",strtotime($tt['created_at']));
									$resrow['report_on'] =  date("d-m-Y", strtotime($tt->reporton)); 
									$rdate = date("d-m-Y", strtotime($tt->reporton));
									$checkval = checkDailyStatus($rdate, $kk);
									if($checkval[0] == 'yes'){ 
						   if($tt->blockflag == 1) { 
						   	$resrow['status'] = "DAR Submitted with Delay";
						   }
						    else{
							   	$resrow['status'] = "DAR Submitted";
							}
						 } else {
						  	$resrow['status'] = "DAR Not Submitted";
						 }
						 
						 
						 $paymentsArray[] =  $resrow;
								
						      }
					     }
					   }
					 }
			
			}
	 /*  echo "<pre>";
	     print_r($paymentsArray);
	   echo "</pre>"; */

	// Generate and return the spreadsheet
    /*Excel::create('users', function($excel) use ($paymentsArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('Users');
        $excel->setCreator('Laravel')->setCompany('WJ Gilmore, LLC');
        $excel->setDescription('users file');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($paymentsArray) {
            $sheet->fromArray($paymentsArray, null, 'A1', false, false);
        });

    })->download('xlsx'); */
	
	/*$paymentsArray = array();
	
	 $users = User::where('id','!=',1)->get();
	  $usrsArray = []; 
	   $paymentsArray[] = ['id', 'name','email'];
	   
	   foreach ($users as $payment) {
	     $resrow = array();
		 $resrow['id'] = $payment['id'];
		 $resrow['name'] = $payment['name'];
		 $resrow['idemail'] = $payment['email'];
		 
		   
        $paymentsArray[] =  $resrow;
    } */
	
	
	
	// Generate and return the spreadsheet
    Excel::create('FMS_DAR_SUBMISSION', function($excel) use ($paymentsArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('FMS_DAR_SUBMISSION');
        $excel->setCreator('Laravel')->setCompany('Aparna');
        $excel->setDescription('users file');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($paymentsArray) {
            $sheet->fromArray($paymentsArray, null, 'A1', false, false);
        });

    })->download('xlsx');
 
	
	} 
	  
	public function fmsa2()

    { 	
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $startdate)
				->where('reporton', '<=', $today)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $startdate)
				->where('reporton', '<=', $today)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];   
			
		 return view('audit.auditdetail.fmsa2', $relations);
 
    }  
	
	
	public function getctptauditreports(Request $request)
    { 	
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}
		
		 
		  if(count($results)>0)
		  {
			  foreach($results as $key=>$client)
			  {	
			  		  
			  		if(count($client)>0)
					{				 
						foreach($client as $k=>$tt)
						{
							$day_before = date( 'Y-m-d', strtotime( $tt->reporton . ' -1 day' ) );
							$audit_ores = Fmsdailyreport::where('reporton', '=', $day_before)->where('site', '=', $tt->site)->orderBy('reporton', 'ASC')->first();

							$opening = $audit_ores['pwr_ctpt'];
							$openinglt = $audit_ores['pwr_tot_lt'];

							$closing = $tt->pwr_ctpt;
							$consumption = (int)$closing-(int)$opening;

							$closinglt = $tt->pwr_tot_lt;

							$consumptionlt = (int)$closinglt-(int)$openinglt;


							$sloss = (float)$consumption*4/100;
							$aloss = (float)$consumption-$consumptionlt;
							$variance = (float)$sloss-(float)$aloss;
							//$varianceper = +(float)$variance/(float)$sloss;

							 $data[$k]['site'] =  $siteattrname[$tt->site];
							 $data[$k]['reporton'] = $tt->reporton;
							 $data[$k]['opening'] = $opening;
							 $data[$k]['closing'] = $closing;
							 $data[$k]['consumption'] = $consumption;
							 $data[$k]['openinglt'] = $openinglt;
							 $data[$k]['closinglt'] = $closinglt;
							 $data[$k]['consumptionlt'] = $consumptionlt;
							 $data[$k]['sloss'] = $sloss;
							 $data[$k]['aloss'] = $aloss;
							 $data[$k]['variance'] = $variance;
						}
					}
				$results[$key] = $data;
			  }
		  }

		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];   
			
		 return view('audit.auditdetail.fmstemplate.fmstemplate', $relations);
 
    }  



    public function getfmsctptauditreportexport(Request $request)
    { 	
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}
		
		 
		  if(count($results)>0)
		  {
			  foreach($results as $key=>$client)
			  {	
			  		  
			  		if(count($client)>0)
					{				 
						foreach($client as $k=>$tt)
						{
							$day_before = date( 'Y-m-d', strtotime( $tt->reporton . ' -1 day' ) );
							$audit_ores = Fmsdailyreport::where('reporton', '=', $day_before)->where('site', '=', $tt->site)->orderBy('reporton', 'ASC')->first();

							$opening = $audit_ores['pwr_ctpt'];
							$openinglt = $audit_ores['pwr_tot_lt'];

							$closing = $tt->pwr_ctpt;
							$consumption = (int)$closing-(int)$opening;
							$closinglt = $tt->pwr_tot_lt;
							$consumptionlt = (int)$closinglt-(int)$openinglt;
							$sloss = (float)$consumption*4/100;
							$aloss = (float)$consumption-$consumptionlt;
							$variance = (float)$sloss-(float)$aloss;
							//$varianceper = +(float)$variance/(float)$sloss;

							 $data[$k]['site'] =  $siteattrname[$tt->site];
							 $data[$k]['reporton'] = $tt->reporton;
							 $data[$k]['opening'] = $opening;
							 $data[$k]['closing'] = $closing;
							 $data[$k]['consumption'] = $consumption;
							 $data[$k]['openinglt'] = $openinglt;
							 $data[$k]['closinglt'] = $closinglt;
							 $data[$k]['consumptionlt'] = $consumptionlt;
							 $data[$k]['sloss'] = $sloss;
							 $data[$k]['aloss'] = $aloss;
							 $data[$k]['variance'] = $variance;
						}
					}
				$results[$key] = $data;
			  }
		  }

		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];


			$paymentsArray = array();
		$paymentsArray[] = ['S.No', 'Site', 'Date', 'Opening', 'Closing Reading', 'Consumption for the day', 'Opening', 'Closing Reading', 'Consumption for the day', 'Standard Loss', 'Actual Loss(In usints)', 'Variance'];
		 $i = 1;
		 if (count($results) > 0) {
			 foreach ($results as $kk => $client) {
		 		if (count($client) > 0) {
					foreach ($client as $tt) {
					   $resrow = array();
					   $resrow['sno'] = $i;
					   $resrow['site'] = $tt['site'];
					   $resrow['report_on'] = date("d-m-Y", strtotime($tt['reporton']));
					   $resrow['opening'] = $tt['opening'];
					   $resrow['closing'] = $tt['closing'];
					   $resrow['consumption'] = $tt['consumption'];
					   $resrow['openinglt'] = $tt['openinglt'];
					   $resrow['closinglt'] = $tt['closinglt'];
					   $resrow['consumptionlt'] = $tt['consumptionlt'];
					   $resrow['sloss'] = $tt['sloss'];
					   $resrow['aloss'] = $tt['aloss'];
					   $resrow['variance'] = $tt['variance'];
					   $i = $i + 1; 
					   $paymentsArray[] =  $resrow;
					}
				}
			}
		}
			

		// Generate and return the spreadsheet
	    Excel::create('FMS_CTPT_Submission', function($excel) use ($paymentsArray) {

	        // Set the spreadsheet title, creator, and description
	        $excel->setTitle('FMS_CTPT_Submission');
	        $excel->setCreator('Laravel')->setCompany('Aparna');
	        $excel->setDescription('fmssubmission file');

	        // Build the spreadsheet, passing in the payments array
	        $excel->sheet('sheet1', function($sheet) use ($paymentsArray) {
	            $sheet->fromArray($paymentsArray, null, 'A1', false, false);
	        });

	    })->download('xlsx');	   
 
    }  
	
	public function fmsa3()

    { 	
	
	      if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $startdate)
				->where('reporton', '<=', $today)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $startdate)
				->where('reporton', '<=', $today)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];   
			
		 return view('audit.auditdetail.fmsa3', $relations);
		 //return view('audit.auditdetail.fmsa3');

    }  
	
	
   public function getfmsltauditreports(Request $request)
    { 	
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];   
			
		 return view('audit.auditdetail.fmstemplate.fmsa3template', $relations);
 
    }  
	
	
	public function fmsa4()

    { 	
	
	    if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
			$validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }  
			
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'validkva' => $validkva,
			];   
			
		 return view('audit.auditdetail.fmsa4', $relations);

    }  
	
	
	
	public function getfmskvaauditreports(Request $request)
    { 	
	 $validkva = array();
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		 $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site'); 
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		   $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			 $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			    if($kk!=95){
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }}
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		   $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			 $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}  
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			'validkva' => $validkva,
			];         
			  
			 
		//	exit; 
			
		 return view('audit.auditdetail.fmstemplate.fmsa4template', $relations);
 
    }  
	
	
	public function getfmskvaauditreportexport(Request $request)
    { 	
	 $validkva = array();
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		 $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site'); 
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		   $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			 $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		   $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			 $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}  
			

		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			'validkva' => $validkva,
			];         
			  
		
		$paymentsArray = array();
		$paymentsArray[] = ['S.No', 'Site', 'Date', 'Desired KVA', 'Recorded KVA', 'Variance'];
		 $i = 1;
		 if (count($results) > 0) {
			 foreach ($results as $kk => $client) {
			 	if($kk!=95){
		 		if (count($client) > 0) {
					foreach ($client as $tt) {
					   $resrow = array();
					   $resrow['sno'] = $i;
					   $resrow['site'] = $siteattrname[$kk];
					   $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
					   $resrow['desired_kva'] = $validkva[$kk];
					   $resrow['recorded_kva'] = $tt->pwr_recordedkva;
					   $resrow['variance'] = (float)$validkva[$kk] - (float)$tt->pwr_recordedkva;
					   $i = $i + 1; 
					   $paymentsArray[] =  $resrow;
					}
				}}
			}
		}
			

	// Generate and return the spreadsheet
    Excel::create('FMS_KVA_Submission', function($excel) use ($paymentsArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('FMS_KVA_Submission');
        $excel->setCreator('Laravel')->setCompany('Aparna');
        $excel->setDescription('fmskvasubmission file');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($paymentsArray) {
            $sheet->fromArray($paymentsArray, null, 'A1', false, false);
        });

    })->download('xlsx');	 
		
 
    }
	
	public function fmsa5()

    { 	
		
	    if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
			$validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $startdate)
				->where('reporton', '<=', $today)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $startdate)
				->where('reporton', '<=', $today)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			 
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			'validkva' => $validkva,
			];   
			
		 return view('audit.auditdetail.fmsa5', $relations);


    }  
	
	
		 
	public function getfmspwrfauditreports(Request $request)
    { 	
	 $validkva = array();
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		 $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site'); 
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		   $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			 $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		   $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			 $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}  
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			'validkva' => $validkva,
			];         
			  
			 
		//	exit; 
			
		 return view('audit.auditdetail.fmstemplate.fmsa5template', $relations);
 
    } 
	
	
	public function getfmspwrfauditreportexport(Request $request)
    {
	
		 	
	 $validkva = array();
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		 $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site'); 
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		   $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			 $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		   $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			 $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}  
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			'validkva' => $validkva,
			];  
		
		$paymentsArray = array();
		$paymentsArray[] = ['S.No', 'Site', 'Date', 'Power Factor (as per given month)', 'Actual Power Factor'];
		 $i = 1;
		 if (count($results) > 0) {
			 foreach ($results as $kk => $client) {
		 		if (count($client) > 0) {
					foreach ($client as $tt) {
					   if(($tt->pwr_pwrfactor)<0.99 || ($tt->pwr_pwrfactor)>1.00){
					   $resrow = array();
					   $resrow['sno'] = $i;
					   $resrow['site'] = $siteattrname[$kk];
					   $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
					   $resrow['desired_pwr'] = "0.99 to 1.00";
					   $resrow['pwr_pwrfactor'] = $tt->pwr_pwrfactor;
					   $i = $i + 1; 
					   $paymentsArray[] =  $resrow;
					   }
					}
				}
			}
		}
			

	// Generate and return the spreadsheet
    Excel::create('FMS_Power_Factor_Submission', function($excel) use ($paymentsArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('FMS_Power_Factor_Submission');
        $excel->setCreator('Laravel')->setCompany('Aparna');
        $excel->setDescription('fmspowerfactorsubmission file');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($paymentsArray) {
            $sheet->fromArray($paymentsArray, null, 'A1', false, false);
        });

    })->download('xlsx');	 
		
 
    }
	
	
	public function fmsa6()

    { 	
	   		
	    if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
			$validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $startdate)
				->where('reporton', '<=', $today)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $startdate)
				->where('reporton', '<=', $today)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			 
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			'validkva' => $validkva,
			];   
			
		 return view('audit.auditdetail.fmsa6', $relations);
		// return view('audit.auditdetail.fmsa6');

    }  
	
	
			 
	public function getfmspwrtwauditreports(Request $request)
    { 	
	 $validkva = array();
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		 $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site'); 
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		   $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			 $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		   $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			 $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}  
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			'validkva' => $validkva,
			];         
			  
			 
		//	exit; 
			
		 return view('audit.auditdetail.fmstemplate.fmsa6template', $relations);
 
    } 
	
	public function fmsa7()

    { 	
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $startdate)
				->where('reporton', '<=', $today)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $startdate)
				->where('reporton', '<=', $today)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];   
			
		 return view('audit.auditdetail.fmsa7', $relations);
 
    }  
	
	
	public function getfmssludgeauditreports(Request $request)
    { 	
	  $month = $request->audit_month."-31";
	  $year = $request->audit_year;
	  $dateToTest = $request->audit_year."-".$request->audit_month."-01";
	  $lastday = date('t',strtotime($dateToTest));
	  $site = $request->site;

	  $from_date = $request->audit_year."-".$request->audit_month."-".$lastday;

	  $fromdate = date("Y-m-d", strtotime($from_date));
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '=', $fromdate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '=', $fromdate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			}
			else{

		 $dateToTest = date("Y-m-01");
	  	$lastday = date('t',strtotime($dateToTest));

	  	 $from_date = $request->audit_year."-".$request->audit_month."-".$lastday;

	   $fromdate = date("Y-m-d", strtotime($from_date));

	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '=', $fromdate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '=', $fromdate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}
		
		//echo "<pre>"; print_r($results); echo "</pre>";
		//exit;
		 
		  if(count($results)>0)
		  {
			  foreach($results as $key=>$client)
			  {	
			  		  
			  		if(count($client)>0)
					{				 
						foreach($client as $k=>$tt)
						{
							$day_before = date( 'Y-m-d', strtotime( $tt->reporton . ' -1 day' ) );
							$audit_ores = Fmsdailyreport::where('reporton', '=', $day_before)->where('site', '=', $tt->site)->orderBy('reporton', 'ASC')->first();

							$opening = $audit_ores['pwr_ctpt'];
							$openinglt = $audit_ores['pwr_tot_lt'];

							$closing = $tt->pwr_ctpt;
							$consumption = (int)$closing-(int)$opening;

							$closinglt = $tt->pwr_tot_lt;

							$consumptionlt = (int)$closinglt-(int)$openinglt;


							$sloss = (float)$consumption*4/100;
							$aloss = (float)$consumption-$consumptionlt;
							$variance = (float)$sloss-(float)$aloss;
							//$varianceper = +(float)$variance/(float)$sloss;

							 $data[$k]['site'] =  $siteattrname[$tt->site];
							 $data[$k]['reporton'] = $tt->reporton;
							 $data[$k]['opening'] = $opening;
							 $data[$k]['closing'] = $closing;
							 $data[$k]['consumption'] = $consumption;
							 $data[$k]['openinglt'] = $openinglt;
							 $data[$k]['closinglt'] = $closinglt;
							 $data[$k]['consumptionlt'] = $consumptionlt;
							 $data[$k]['sloss'] = $sloss;
							 $data[$k]['aloss'] = $aloss;
							 $data[$k]['variance'] = $variance;
						}
					}
				$results[$key] = $data;
			  }
		  }

		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];   
			
		 return view('audit.auditdetail.fmstemplate.fmsa7template', $relations);
 
    }  



    public function getfmssludgeauditreportexport(Request $request)
    { 	
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}
		
		 
		  if(count($results)>0)
		  {
			  foreach($results as $key=>$client)
			  {	
			  		  
			  		if(count($client)>0)
					{				 
						foreach($client as $k=>$tt)
						{
							$day_before = date( 'Y-m-d', strtotime( $tt->reporton . ' -1 day' ) );
							$audit_ores = Fmsdailyreport::where('reporton', '=', $day_before)->where('site', '=', $tt->site)->orderBy('reporton', 'ASC')->first();

							$opening = $audit_ores['pwr_ctpt'];
							$openinglt = $audit_ores['pwr_tot_lt'];

							$closing = $tt->pwr_ctpt;
							$consumption = (int)$closing-(int)$opening;
							$closinglt = $tt->pwr_tot_lt;
							$consumptionlt = (int)$closinglt-(int)$openinglt;
							$sloss = (float)$consumption*4/100;
							$aloss = (float)$consumption-$consumptionlt;
							$variance = (float)$sloss-(float)$aloss;
							//$varianceper = +(float)$variance/(float)$sloss;

							 $data[$k]['site'] =  $siteattrname[$tt->site];
							 $data[$k]['reporton'] = $tt->reporton;
							 $data[$k]['opening'] = $opening;
							 $data[$k]['closing'] = $closing;
							 $data[$k]['consumption'] = $consumption;
							 $data[$k]['openinglt'] = $openinglt;
							 $data[$k]['closinglt'] = $closinglt;
							 $data[$k]['consumptionlt'] = $consumptionlt;
							 $data[$k]['sloss'] = $sloss;
							 $data[$k]['aloss'] = $aloss;
							 $data[$k]['variance'] = $variance;
						}
					}
				$results[$key] = $data;
			  }
		  }

		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];


			$paymentsArray = array();
		$paymentsArray[] = ['S.No', 'Site', 'Date', 'Opening', 'Closing Reading', 'Consumption for the day', 'Opening', 'Closing Reading', 'Consumption for the day', 'Standard Loss', 'Actual Loss(In usints)', 'Variance'];
		 $i = 1;
		 if (count($results) > 0) {
			 foreach ($results as $kk => $client) {
		 		if (count($client) > 0) {
					foreach ($client as $tt) {
					   $resrow = array();
					   $resrow['sno'] = $i;
					   $resrow['site'] = $tt['site'];
					   $resrow['report_on'] = date("d-m-Y", strtotime($tt['reporton']));
					   $resrow['opening'] = $tt['opening'];
					   $resrow['closing'] = $tt['closing'];
					   $resrow['consumption'] = $tt['consumption'];
					   $resrow['openinglt'] = $tt['openinglt'];
					   $resrow['closinglt'] = $tt['closinglt'];
					   $resrow['consumptionlt'] = $tt['consumptionlt'];
					   $resrow['sloss'] = $tt['sloss'];
					   $resrow['aloss'] = $tt['aloss'];
					   $resrow['variance'] = $tt['variance'];
					   $i = $i + 1; 
					   $paymentsArray[] =  $resrow;
					}
				}
			}
		}
			

		// Generate and return the spreadsheet
	    Excel::create('FMS_CTPT_Submission', function($excel) use ($paymentsArray) {

	        // Set the spreadsheet title, creator, and description
	        $excel->setTitle('FMS_CTPT_Submission');
	        $excel->setCreator('Laravel')->setCompany('Aparna');
	        $excel->setDescription('fmssubmission file');

	        // Build the spreadsheet, passing in the payments array
	        $excel->sheet('sheet1', function($sheet) use ($paymentsArray) {
	            $sheet->fromArray($paymentsArray, null, 'A1', false, false);
	        });

	    })->download('xlsx');	   
 
    }
	public function fmsa8()

    { 	
	    		
	    if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
			$validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $startdate)
				->where('reporton', '<=', $today)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $startdate)
				->where('reporton', '<=', $today)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			 
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			'validkva' => $validkva,
			];   
			
		 return view('audit.auditdetail.fmsa8', $relations);
		// return view('audit.auditdetail.fmsa8');

    }  
	
	public function getfmsmlssfauditreports(Request $request)
    { 	
	 $validkva = array();
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		 $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site'); 
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		   $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			 $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		   $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			 $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}  
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			'validkva' => $validkva,
			];         
			  
			 
		//	exit; 
			
		 return view('audit.auditdetail.fmstemplate.fmsa8template', $relations);
 
    }
	
	
	
	
	public function getfmsmlssfauditreportexport(Request $request)
    { 	
	 $validkva = array();
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		 $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site'); 
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		   $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			 $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		   $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			 $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}  
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			'validkva' => $validkva,
			];  
			
		$paymentsArray = array();
		$paymentsArray[] = ['S.No', 'Site', 'Date', 'MLSS Standard Value', 'Actuals MLSS Value'];
		 $i = 1;
		 if (count($results) > 0) {
			 foreach ($results as $kk => $client) {
		 		if (count($client) > 0) {
					foreach ($client as $tt) {
					   if(($tt->stp_mlss)>500){
					   $resrow = array();
					   $resrow['sno'] = $i;
					   $resrow['site'] = $siteattrname[$kk];
					   $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
					   $resrow['range'] = "500";
					   $resrow['othser_swim_ph'] = $tt->stp_mlss;
					   $i = $i + 1; 
					   $paymentsArray[] =  $resrow;
					   }
					}
				}
			}
		}
			

	// Generate and return the spreadsheet
    Excel::create('FMS_MLSS_Submission', function($excel) use ($paymentsArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('FMS_MLSS_Submission');
        $excel->setCreator('Laravel')->setCompany('Aparna');
        $excel->setDescription('fmsmlsssubmission file');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($paymentsArray) {
            $sheet->fromArray($paymentsArray, null, 'A1', false, false);
        });

    })->download('xlsx');	 
    } 
	
	
	public function fmsa9()

    { 	
	    	   	    		
	    if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
			$validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $startdate)
				->where('reporton', '<=', $today)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $startdate)
				->where('reporton', '<=', $today)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			 
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			'validkva' => $validkva,
			];   
			
		 return view('audit.auditdetail.fmsa9', $relations);

    }  
	
		
   public function getfmsliftauditreports(Request $request)
    { 	
	 $validbws = array();
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		 $validbws = \App\Dailyreportvalidation::get()->pluck('lifsnum', 'site'); 
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		   $validbws = \App\Dailyreportvalidation::get()->pluck('lifsnum', 'site');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			 $validbws = \App\Dailyreportvalidation::get()->pluck('lifsnum', 'site');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		   $validbws = \App\Dailyreportvalidation::get()->pluck('lifsnum', 'site');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			 $validbws = \App\Dailyreportvalidation::get()->pluck('lifsnum', 'site');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}  
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			'validbws' => $validbws,
			];         
			  
			 
		//	exit; 
			
		 return view('audit.auditdetail.fmstemplate.fmsa9template', $relations);
 
    } 
	
	
	
	public function getfmsliftauditreportexport(Request $request)
    {
		
		 	
	 $validbws = array();
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		 $validbws = \App\Dailyreportvalidation::get()->pluck('lifsnum', 'site'); 
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		   $validbws = \App\Dailyreportvalidation::get()->pluck('lifsnum', 'site');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			 $validbws = \App\Dailyreportvalidation::get()->pluck('lifsnum', 'site');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		   $validbws = \App\Dailyreportvalidation::get()->pluck('lifsnum', 'site');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			 $validbws = \App\Dailyreportvalidation::get()->pluck('lifsnum', 'site');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}  
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			'validbws' => $validbws,
			];   
			
		$paymentsArray = array();
		$paymentsArray[] = ['S.No', 'Site', 'Date', 'No of Lifts', 'Lifts-Not working'];
		 $i = 1;
		 if (count($results) > 0) {
			 foreach ($results as $kk => $client) {
		 		if (count($client) > 0) {
					foreach ($client as $tt) {
					   if($tt->othser_lifts_nw > 0) {
						   $resrow = array();
						   $resrow['sno'] = $i;
						   $resrow['site'] = $siteattrname[$kk];
						   $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
						   $resrow['validbws'] = $validbws[$kk];
						   $resrow['othser_lifts_nw'] = $tt->othser_lifts_nw;
						   $i = $i + 1; 
						   $paymentsArray[] =  $resrow;
					   }
					}
				}
			}
		}
			

	// Generate and return the spreadsheet
    Excel::create('FMS_LIFT_Submission', function($excel) use ($paymentsArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('FMS_LIFT_Submission');
        $excel->setCreator('Laravel')->setCompany('Aparna');
        $excel->setDescription('fmsliftsubmission file');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($paymentsArray) {
            $sheet->fromArray($paymentsArray, null, 'A1', false, false);
        });

    })->download('xlsx');	 
		
 
    }

	
	
  
	public function fmsa10()

    { 	
	    	   	    		
	    if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
			$validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $startdate)
				->where('reporton', '<=', $today)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $startdate)
				->where('reporton', '<=', $today)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			 
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			'validkva' => $validkva,
			];   
			
		 return view('audit.auditdetail.fmsa10', $relations);

    }  
	
		
   public function getfmsbnwauditreports(Request $request)
    { 	
	 $validbws = array();
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		 $validbws = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site'); 
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		   $validbws = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			 $validbws = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
			    if($kk!=95)
				{
					$audit_cn = Fmsdailyreport::
					where('reporton', '>=', $fromdate)
					->where('reporton', '<=', $todate)
					->where('site', '=', $kk)
					->count();
				   if($audit_cn > 0){
					$audit_res = Fmsdailyreport::
					where('reporton', '>=', $fromdate)
					->where('reporton', '<=', $todate)
					->where('site', '=', $kk)
					->orderBy('reporton', 'ASC')
					->get();
				   $results[$kk] = $audit_res;
			    }
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		   $validbws = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			 $validbws = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			  	if($kk!=95)
				{
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }}
			   }
			}  
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			'validbws' => $validbws,
			];         
			  
			 
		//	exit; 
			
		 return view('audit.auditdetail.fmstemplate.fmsa10template', $relations);
 
    } 
	
	
	
	public function getfmsbnwauditreportexport(Request $request)
    {
		
		 	
	 $validbws = array();
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		 $validbws = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site'); 
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		   $validbws = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			 $validbws = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
			   if($kk!=95) {
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }}
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		   $validbws = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			 $validbws = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
			    if($kk!=95) {
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }}
			   }
			}  
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			'validbws' => $validbws,
			];   
			
		$paymentsArray = array();
		$paymentsArray[] = ['S.No', 'Site', 'Date', 'No of Borewells', 'Borewell -Not working'];
		 $i = 1;
		 if (count($results) > 0) {
			 foreach ($results as $kk => $client) {
		 		if (count($client) > 0) {
					foreach ($client as $tt) {
					   if($tt->othser_gas_borewells > 0) {
						   $resrow = array();
						   $resrow['sno'] = $i;
						   $resrow['site'] = $siteattrname[$kk];
						   $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
						   $resrow['validbws'] = $validbws[$kk];
						   $resrow['othser_gas_borewells'] = $tt->othser_gas_borewells;
						   $i = $i + 1; 
						   $paymentsArray[] =  $resrow;
					   }
					}
				}
			}
		}
			

	// Generate and return the spreadsheet
    Excel::create('FMS_BNW_Submission', function($excel) use ($paymentsArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('FMS_BNW_Submission');
        $excel->setCreator('Laravel')->setCompany('Aparna');
        $excel->setDescription('fmsbnwsubmission file');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($paymentsArray) {
            $sheet->fromArray($paymentsArray, null, 'A1', false, false);
        });

    })->download('xlsx');	 
		
 
    }
	
	
	
	public function fmsa11()

    { 	
	
	    if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }  
			
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			];   
			
		 return view('audit.auditdetail.fmsa11', $relations);

    }  
	
	
	
	public function getfmshodauditreports(Request $request)
    { 	
	 $validkva = array();
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}  
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results
			];         
			  
			 
		//	exit; 
			
		 return view('audit.auditdetail.fmstemplate.fmsa11template', $relations);
 
    }  
	
	
	public function getfmshodauditreportexport(Request $request)
    { 
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}  
			

		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];         
			  
		
		$paymentsArray = array();
		$paymentsArray[] = ['S.No', 'Site', 'Date', 'If field Kept Blank'];
		 $i = 1;
		 if (count($results) > 0) {
			 foreach ($results as $kk => $client) {
		 		if (count($client) > 0) {
					foreach ($client as $tt) {
					   if($tt->points_dis_hod_meeting=="" || $tt->points_dis_hod_meeting=="NIL" || $tt->points_dis_hod_meeting=="Nil" || $tt->points_dis_hod_meeting=="nil")
					   {
					   $resrow = array();
					   $resrow['sno'] = $i;
					   $resrow['site'] = $siteattrname[$kk];
					   $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
					   $resrow['hod_status'] = $tt->points_dis_hod_meeting;
					   $i = $i + 1; 
					   $paymentsArray[] =  $resrow;
					   }
					}
				}
			}
		}
			

	// Generate and return the spreadsheet
    Excel::create('FMS_HOD_Submission', function($excel) use ($paymentsArray) {
        // Set the spreadsheet title, creator, and description
        $excel->setTitle('FMS_HOD_Submission');
        $excel->setCreator('Laravel')->setCompany('Aparna');
        $excel->setDescription('fmshodsubmission file');
        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($paymentsArray) {
            $sheet->fromArray($paymentsArray, null, 'A1', false, false);
        });
    })->download('xlsx');	 	
 
  }

	  
	
	public function fmsa12()
	{ 	
		if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }else{
	
			$role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
			$validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }  		
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'validkva' => $validkva,
			];   		
		 return view('audit.auditdetail.fmsa12', $relations);
	
	}
		
	public function getfmsdsnwauditreports(Request $request)
	{
		 	
	 $validkva = array();
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		 $validkva = \App\Dailyreportvalidation::get()->pluck('dgsetsnum', 'site'); 
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		   $validkva = \App\Dailyreportvalidation::get()->pluck('dgsetsnum', 'site');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			 $validkva = \App\Dailyreportvalidation::get()->pluck('dgsetsnum', 'site');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		   $validkva = \App\Dailyreportvalidation::get()->pluck('dgsetsnum', 'site');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			 $validkva = \App\Dailyreportvalidation::get()->pluck('dgsetsnum', 'site');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}  
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			'validkva' => $validkva,
			];         
			  
			 
		//	exit; 
			
		 return view('audit.auditdetail.fmstemplate.fmsa12template', $relations);
 
    
	}  
	
	
	public function getfmsdsnwauditreportexport(Request $request)
	{
	
		
		 	
	 $validkva = array();
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		 $validkva = \App\Dailyreportvalidation::get()->pluck('dgsetsnum', 'site'); 
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		   $validkva = \App\Dailyreportvalidation::get()->pluck('dgsetsnum', 'site');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			 $validkva = \App\Dailyreportvalidation::get()->pluck('dgsetsnum', 'site');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		   $validkva = \App\Dailyreportvalidation::get()->pluck('dgsetsnum', 'site');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			 $validkva = \App\Dailyreportvalidation::get()->pluck('dgsetsnum', 'site');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}  
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			'validkva' => $validkva,
			];    
		  
		
		$paymentsArray = array();
		$paymentsArray[] = ['S.No', 'Site', 'Date', 'Total No of DG Sets', 'Total No of DG Sets not working'];
		 $i = 1;
		 if (count($results) > 0) {
			 foreach ($results as $kk => $client) {
				if (count($client) > 0) {
					foreach ($client as $tt) {
					   if($tt->dgset_notworking>1){
					   $resrow = array();
					   $resrow['sno'] = $i;
					   $resrow['site'] = $siteattrname[$kk];
					   $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
					   $resrow['dgsets'] = $validkva[$kk];
					   $resrow['tankers'] = $tt->dgset_notworking;
					   $i = $i + 1; 
					   $paymentsArray[] =  $resrow;
					   }
					}
				}
			}
		}
			
	
	// Generate and return the spreadsheet
	Excel::create('FMS_DG_SETS_NOT_WORKING_Submission', function($excel) use ($paymentsArray) {
	
		// Set the spreadsheet title, creator, and description
		$excel->setTitle('FMS_DG_SETS_NOT_WORKING_Submission');
		$excel->setCreator('Laravel')->setCompany('Aparna');
		$excel->setDescription('fmsdgsetssubmission file');
	
		// Build the spreadsheet, passing in the payments array
		$excel->sheet('sheet1', function($sheet) use ($paymentsArray) {
			$sheet->fromArray($paymentsArray, null, 'A1', false, false);
		});
	
	})->download('xlsx');	 
		
	
	}

	
	public function fmsa13()

    { 	
		 return view('audit.auditdetail.fmsa13');

    }  
	
	public function fmsa14()

    { 	
		 return view('audit.auditdetail.fmsa14');

    }  
	
 
 	public function fmsa15()
    { 
			
	    if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }  
		
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			
			 
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames
			];   
			
		 return view('audit.auditdetail.fmsa15', $relations);


    }  
	
	
		 
	public function getfmsppmtwauditreports(Request $request)
    { 	
	 	$from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}  
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];         
			  
			 
		//	exit; 
			
		 return view('audit.auditdetail.fmstemplate.fmsa15template', $relations);
 
    } 
	
	
	public function getfmsppmtwauditreportexport(Request $request)
    {
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}  
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];  
		
		$paymentsArray = array();
		$paymentsArray[] = ['S.No', 'Site', 'Date', 'Sump', 'Flat'];
		 $i = 1;
		 if (count($results) > 0) {
			 foreach ($results as $kk => $client) {
		 		if (count($client) > 0) {
					foreach ($client as $tt) {
					   if(($tt->wsp_ppm_tw_sump)>200 || ($tt->wsp_ppm_tw_flat)>200){
					   $resrow = array();
					   $resrow['sno'] = $i;
					   $resrow['site'] = $siteattrname[$kk];
					   $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
					   $resrow['fump'] = $tt->wsp_ppm_tw_sump;
					   $resrow['flat'] = $tt->wsp_ppm_tw_flat;
					   $i = $i + 1; 
					   $paymentsArray[] =  $resrow;
					   }
					}
				}
			}
		}
			

	// Generate and return the spreadsheet
    Excel::create('FMS_PPM_TW_MORE_THAN_200_Submission', function($excel) use ($paymentsArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('FMS_PPM_TW_MORE_THAN_200_Submission');
        $excel->setCreator('Laravel')->setCompany('Aparna');
        $excel->setDescription('fmsppmtwmorethan200submission file');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($paymentsArray) {
            $sheet->fromArray($paymentsArray, null, 'A1', false, false);
        });

    })->download('xlsx');	 
		
 
    }
	
	public function fmsa16()
    { 
			
	    if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }  
		
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			
			 
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames
			];   
			
		 return view('audit.auditdetail.fmsa16', $relations);


    }  
	
	
		 
	public function getfmsppmrwauditreports(Request $request)
    { 	
	 	$from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}  
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];         
			  
			 
		//	exit; 
			
		 return view('audit.auditdetail.fmstemplate.fmsa16template', $relations);
 
    } 
	
	
	public function getfmsppmrwauditreportexport(Request $request)
    {
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}  
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];  
		
		$paymentsArray = array();
		$paymentsArray[] = ['S.No', 'Site', 'Date', 'Actuals As Per DAR'];
		 $i = 1;
		 if (count($results) > 0) {
			 foreach ($results as $kk => $client) {
		 		if (count($client) > 0) {
					foreach ($client as $tt) {
					   if(($tt->wsp_ppm_rw)>400){
					   $resrow = array();
					   $resrow['sno'] = $i;
					   $resrow['site'] = $siteattrname[$kk];
					   $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
					   $resrow['fump'] = $tt->wsp_ppm_rw;
					   $i = $i + 1; 
					   $paymentsArray[] =  $resrow;
					   }
					}
				}
			}
		}
			

	// Generate and return the spreadsheet
    Excel::create('FMS_PPM_RW_MORE_THAN_400_Submission', function($excel) use ($paymentsArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('FMS_PPM_RW_MORE_THAN_400_Submission');
        $excel->setCreator('Laravel')->setCompany('Aparna');
        $excel->setDescription('fmsppmrwmorethan400submission file');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($paymentsArray) {
            $sheet->fromArray($paymentsArray, null, 'A1', false, false);
        });

    })->download('xlsx');	 
		
 
    }
	
	public function fmsa17()
    { 
			
	    if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }  
		
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			
			 
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames
			];   
			
		 return view('audit.auditdetail.fmsa17', $relations);


    }  
	
	
		 
	public function getfmsfrcauditreports(Request $request)
    { 	
	 $validkva = array();
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}  
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];         
			  
			 
		//	exit; 
			
		 return view('audit.auditdetail.fmstemplate.fmsa17template', $relations);
 
    } 
	
	
	public function getfmsfrcauditreportexport(Request $request)
    {
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}  
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];  
		
		$paymentsArray = array();
		$paymentsArray[] = ['S.No', 'Site', 'Date', 'Standard Range-0.1 to 1', 'Actuals'];
		 $i = 1;
		 if (count($results) > 0) {
			 foreach ($results as $kk => $client) {
		 		if (count($client) > 0) {
					foreach ($client as $tt) {
					   if(($tt->stp_residual_chlorine) > 1){
					   $resrow = array();
					   $resrow['sno'] = $i;
					   $resrow['site'] = $siteattrname[$kk];
					   $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
					   $resrow['range'] = "0.1 to 1";
					   $resrow['residual_chlorine'] = $tt->stp_residual_chlorine;
					   $i = $i + 1; 
					   $paymentsArray[] =  $resrow;
					   }
					}
				}
			}
		}
			

	// Generate and return the spreadsheet
    Excel::create('FMS_RC_Submission', function($excel) use ($paymentsArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('FMS_RC_Submission');
        $excel->setCreator('Laravel')->setCompany('Aparna');
        $excel->setDescription('fmsrcsubmission file');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($paymentsArray) {
            $sheet->fromArray($paymentsArray, null, 'A1', false, false);
        });

    })->download('xlsx');	 
		
 
    }
	
	public function fmsa18()
    { 
			
	    if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }  
		
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			
			 
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames
			];   
			
		 return view('audit.auditdetail.fmsa18', $relations);


    }  
	
	
		 
	public function getfmssppauditreports(Request $request)
    { 	
	 $validkva = array();
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}  
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];         
			  
			 
		//	exit; 
			
		 return view('audit.auditdetail.fmstemplate.fmsa18template', $relations);
 
    } 
	
	
	public function getfmssppauditreportexport(Request $request)
    {
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}  
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];  
		
		$paymentsArray = array();
		$paymentsArray[] = ['S.No', 'Site', 'Date', 'Swimming pool pH is out of range', 'Actuals'];
		 $i = 1;
		 if (count($results) > 0) {
			 foreach ($results as $kk => $client) {
		 		if (count($client) > 0) {
					foreach ($client as $tt) {
					   if(($tt->othser_swim_ph)<6.5 || ($tt->othser_swim_ph)>7.8){
					   $resrow = array();
					   $resrow['sno'] = $i;
					   $resrow['site'] = $siteattrname[$kk];
					   $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
					   $resrow['range'] = "6.5 to 7.8";
					   $resrow['othser_swim_ph'] = $tt->othser_swim_ph;
					   $i = $i + 1; 
					   $paymentsArray[] =  $resrow;
					   }
					}
				}
			}
		}
			

	// Generate and return the spreadsheet
    Excel::create('FMS_SPP_Submission', function($excel) use ($paymentsArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('FMS_SPP_Submission');
        $excel->setCreator('Laravel')->setCompany('Aparna');
        $excel->setDescription('fmssppsubmission file');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($paymentsArray) {
            $sheet->fromArray($paymentsArray, null, 'A1', false, false);
        });

    })->download('xlsx');	 
		
 
    }
	
	public function fmsa19()
    { 
			
	    if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }  
		
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			
			 
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames
			];   
			
		 return view('audit.auditdetail.fmsa19', $relations);


    }  
	
	
		 
	public function getfmsisaauditreports(Request $request)
    {
	  $validkva = array();
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		 $validkva = \App\Dailyreportvalidation::get()->pluck('misirrgsprinkautosys', 'site'); 
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		   $validkva = \App\Dailyreportvalidation::get()->pluck('misirrgsprinkautosys', 'site');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			 $validkva = \App\Dailyreportvalidation::get()->pluck('misirrgsprinkautosys', 'site');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   if($kk!=95){
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }}
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		   $validkva = \App\Dailyreportvalidation::get()->pluck('misirrgsprinkautosys', 'site');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			 $validkva = \App\Dailyreportvalidation::get()->pluck('misirrgsprinkautosys', 'site');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			    if($kk!=95){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }}
			   }
			}  
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			'validkva' => $validkva,
			];         
			  
			 
		//	exit; 
			
		 return view('audit.auditdetail.fmstemplate.fmsa19template', $relations);	
	} 
	
	
	public function getfmsisaauditreportexport(Request $request)
    {
	  	
	  $validkva = array();
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		 $validkva = \App\Dailyreportvalidation::get()->pluck('misirrgsprinkautosys', 'site'); 
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		   $validkva = \App\Dailyreportvalidation::get()->pluck('misirrgsprinkautosys', 'site');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			 $validkva = \App\Dailyreportvalidation::get()->pluck('misirrgsprinkautosys', 'site');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
				if($kk!=95){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }}
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		   $validkva = \App\Dailyreportvalidation::get()->pluck('misirrgsprinkautosys', 'site');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			 $validkva = \App\Dailyreportvalidation::get()->pluck('misirrgsprinkautosys', 'site');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			  if($kk!=95){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }}
			}  
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			'validkva' => $validkva,
			];    
	
		$paymentsArray = array();
		$paymentsArray[] = ['S.No', 'Site', 'Date', 'Irrigation splinkler(Report Validation)', 'Irrigation splinkler Status'];
		 $i = 1;
		 if (count($results) > 0) {
			 foreach ($results as $kk => $client) {
		 		if (count($client) > 0) {
					foreach ($client as $tt) {					   
					   $resrow = array();
					   $resrow['sno'] = $i;
					   $resrow['site'] = $siteattrname[$kk];
					   $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
					   $resrow['range'] = $validkva[$kk];
					   $resrow['othser_swim_ph'] = $tt->other_irrigation_spinklr;
					   $i = $i + 1; 
					   $paymentsArray[] =  $resrow;					   
					}
				}
			}
		}
			

	// Generate and return the spreadsheet
    Excel::create('FMS_ISA_Submission', function($excel) use ($paymentsArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('FMS_ISA_Submission');
        $excel->setCreator('Laravel')->setCompany('Aparna');
        $excel->setDescription('fmsisasubmission file');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($paymentsArray) {
            $sheet->fromArray($paymentsArray, null, 'A1', false, false);
        });

    })->download('xlsx');	 
		
 
    }
	
	public function fmsa20()

    { 	
	    	   	    		
	    if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
			$validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }  
			 
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			];   
			
		 return view('audit.auditdetail.fmsa20', $relations);

    }  
	
		
   public function getfmssfnwauditreports(Request $request)
    { 	
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}  
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];         
			  
			 
		//	exit; 
			
		 return view('audit.auditdetail.fmstemplate.fmsa20template', $relations);
 
    } 
	
	
	
	public function getfmssfnwauditreportexport(Request $request)
    {
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}  
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results
			];   
			
		$paymentsArray = array();
		$paymentsArray[] = ['S.No', 'Site', 'Date', 'Solar Fencing - Working/Not working'];
		 $i = 1;
		 if (count($results) > 0) {
			 foreach ($results as $kk => $client) {
		 		if (count($client) > 0) {
					foreach ($client as $tt) {
					   if($tt->othser_gas_borewells > 0) {
						   $resrow = array();
						   $resrow['sno'] = $i;
						   $resrow['site'] = $siteattrname[$kk];
						   $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
						   $resrow['othser_solar_fencing'] = $tt->othser_solar_fencing;
						   $i = $i + 1; 
						   $paymentsArray[] =  $resrow;
					   }
					}
				}
			}
		}
			

	// Generate and return the spreadsheet
    Excel::create('FMS_SFN_Submission', function($excel) use ($paymentsArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('FMS_SFN_Submission');
        $excel->setCreator('Laravel')->setCompany('Aparna');
        $excel->setDescription('fmssfnsubmission file');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($paymentsArray) {
            $sheet->fromArray($paymentsArray, null, 'A1', false, false);
        });

    })->download('xlsx');	 
		
 
    }
	
	public function fmsa21()

    { 	
		 return view('audit.auditdetail.fmsa21');

    }  
	
	public function fmsa22()

    { 	
		 return view('audit.auditdetail.fmsa22');

    }  
	
	public function fmsa23()

    { 	
		 return view('audit.auditdetail.fmsa23');

    }  
	
	public function fmsa24()
	{ 	
		if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }else{
	
			$role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
			$validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }  		
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'validkva' => $validkva,
			];   		
		 return view('audit.auditdetail.fmsa24', $relations);
	
	}
		
	public function getfmstwauditreports(Request $request)
	{ 	
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	  $fromdate = date("Y-m-d", strtotime($from_date));
	  $todate = date("Y-m-d", strtotime($to_date));
	  if($site == ""){
		if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
			$role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
				print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
				$cur_year = date("Y");
				$cur_month = date("m");
				$today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
				$audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
		$fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
			$role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
				print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
				$cur_year = date("Y");
				$cur_month = date("m");
				$today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
				$audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}  
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];         
			  
			 
		//	exit; 
			
		 return view('audit.auditdetail.fmstemplate.fmsa24template', $relations);
	
	}  
	
	
	public function getfmstwauditreportexport(Request $request)
	{ 	
	 $validkva = array();
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
		 $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		 $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site'); 
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
			$role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
				print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
				$cur_year = date("Y");
				$cur_month = date("m");
				$today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
				$audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
		$fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
			$role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
				print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
				$cur_year = date("Y");
				$cur_month = date("m");
				$today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
				$audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}  
			
	
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results
			];         
			  
		
		$paymentsArray = array();
		$paymentsArray[] = ['S.No', 'Site', 'Date', 'Tanker Water Used (KLs)'];
		 $i = 1;
		 if (count($results) > 0) {
			 foreach ($results as $kk => $client) {
				if (count($client) > 0) {
					foreach ($client as $tt) {
					   $resrow = array();
					   $resrow['sno'] = $i;
					   $resrow['site'] = $siteattrname[$kk];
					   $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
					   $resrow['tankers'] = $tt->wsp_tankers;
					   $i = $i + 1; 
					   $paymentsArray[] =  $resrow;
					}
				}
			}
		}
			
	
	// Generate and return the spreadsheet
	Excel::create('FMS_Tanker_Water_Used_Submission', function($excel) use ($paymentsArray) {
	
		// Set the spreadsheet title, creator, and description
		$excel->setTitle('FMS_Tanker_Water_Used_Submission');
		$excel->setCreator('Laravel')->setCompany('Aparna');
		$excel->setDescription('fmstankerssubmission file');
	
		// Build the spreadsheet, passing in the payments array
		$excel->sheet('sheet1', function($sheet) use ($paymentsArray) {
			$sheet->fromArray($paymentsArray, null, 'A1', false, false);
		});
	
	})->download('xlsx');	 
		
	
	}
	
	public function fmsa25()

    { 	
		 return view('audit.auditdetail.fmsa25');

    }  
	
	
	public function fmsa26()
	{ 	
		if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }else{
	
			$role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
			$validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }  		
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'validkva' => $validkva,
			];   		
		 return view('audit.auditdetail.fmsa26', $relations);
	
	}
		
	public function getfmspcauditreports(Request $request)
	{ 	
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	  $fromdate = date("Y-m-d", strtotime($from_date));
	  $todate = date("Y-m-d", strtotime($to_date));
	  if($site == ""){
		if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
			$role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
				print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
				$cur_year = date("Y");
				$cur_month = date("m");
				$today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
				$audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
		$fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
			$role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
				print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
				$cur_year = date("Y");
				$cur_month = date("m");
				$today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
				$audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}  
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];  
			
		 return view('audit.auditdetail.fmstemplate.fmsa26template', $relations);
	
	}  
	
	
	public function getfmspcauditreportexport(Request $request)
	{ 	
	 $validkva = array();
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
		 $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		 $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site'); 
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
			$role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
				print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
				$cur_year = date("Y");
				$cur_month = date("m");
				$today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
				$audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
		$fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
			$role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
				print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
				$cur_year = date("Y");
				$cur_month = date("m");
				$today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
				$audit_res = Fmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}  
			
	
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results
			];         
			  
		
		$paymentsArray = array();
		$paymentsArray[] = ['S.No', 'Site', 'Date', 'LT', 'Solar Power Units', 'DG Units', 'Residents', 'Club House', 'STP', 'WSP', 'Lifts', 'Vendors', 'Comman Area', 'Others', 'Variance', '% of Loss'];
		 $i = 1;
		 $dgset_dgunits = "";
		 $pwr_vendors = "";
		 $pwr_common_area = "";
		 $pwr_others = "";
		 $variance = "";
		 $pwr_solarpwrunits = "";
		 $pwr_residents = "";
		 $pwr_club_house = "";
		 $pwr_stp = "";
		 $pwr_wsp = "";
		 $pwr_lifts = "";
		 $sum = 0;
		 if (count($results) > 0) {
			 foreach ($results as $kk => $client) {
				if (count($client) > 0) {
					foreach ($client as $tt) {
					  
					   if(isset($tt->pwr_solarpwrunits)) $pwr_solarpwrunits = $tt->pwr_solarpwrunits;
					   if(isset($tt->dgset_dgunits)) $dgset_dgunits = $tt->dgset_dgunits;					   
					   if(isset($tt->pwr_residents)) $pwr_residents = $tt->pwr_residents;
					   if(isset($tt->pwr_club_house))  $pwr_club_house = $tt->pwr_club_house; 
					   if(isset($tt->pwr_stp))$pwr_stp = $tt->pwr_stp; 
					   if(isset($tt->pwr_wsp))$pwr_wsp = $tt->pwr_wsp;
					   if(isset($tt->pwr_lifts))$pwr_lifts = $tt->pwr_lifts;
					   if(isset($tt->pwr_vendors))  $pwr_vendors = $tt->pwr_vendors; 
					   if(isset($tt->pwr_common_area))$pwr_common_area = $tt->pwr_common_area; 
					   if(isset($tt->pwr_others))$pwr_others = $tt->pwr_others;
					   
					   
					    $pwr_club_house = (int)$tt->pwr_club_house;
						$pwr_stp = (int)$tt->pwr_stp;
						$pwr_wsp = (int)$tt->pwr_wsp;
						$pwr_lifts = (int)$tt->pwr_lifts;
						$pwr_vendors = (int)$tt->pwr_vendors;
						$pwr_common_area = (int)$tt->pwr_common_area;
						$pwr_others = (int)$tt->pwr_others;
						
						if($pwr_club_house>0) $pattendance = $sum+$pwr_club_house;
						if($pwr_stp>0) $pattendance = $sum+$pwr_stp;
						if($pwr_wsp>0) $pattendance = $sum+$pwr_wsp;
						if($pwr_lifts>0) $pattendance = $sum+$pwr_lifts;
						if($pwr_vendors>0) $pattendance = $sum+$pwr_vendors;
						if($pwr_common_area>0) $pattendance = $sum+$pwr_common_area;
						if($pwr_others>0) $pattendance = $sum+$pwr_others;	
					   
					   
					   $datefilter =  date("d-m-Y", strtotime($tt->reporton));
					   $D4 =  $tt->pwr_tot_lt;
					   $E4 =  $pwr_solarpwrunits;
					   //$sum = $tt->pwr_residents +  $tt->pwr_club_house + $tt->pwr_stp + $tt->pwr_wsp + $tt->pwr_lifts + $tt->pwr_vendors + $tt->pwr_common_area + $tt->pwr_others;
					   $variance = $D4-$sum+$E4;
					   if($variance>0) {
						 $loss = $variance/($D4+$E4);
						 $loss = round($loss,2);
						 $loss = $loss * 100;
						}
						else $loss = 0;
					   
					   
					   $resrow = array();
					   $resrow['sno'] = $i;
					   $resrow['site'] = $siteattrname[$kk];
					   $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
					   $resrow['pwr_tot_lt'] = $tt->pwr_tot_lt;
					   $resrow['pwr_solarpwrunits'] = $pwr_solarpwrunits;
					   $resrow['dgset_dgunits'] = $dgset_dgunits;
					   $resrow['pwr_residents'] = $pwr_residents;
					   $resrow['pwr_club_house'] = $pwr_club_house;
					   $resrow['pwr_stp'] = $pwr_stp;
					   $resrow['pwr_wsp'] = $pwr_wsp;
					   $resrow['pwr_lifts'] = $pwr_lifts;
					   $resrow['pwr_vendors'] = $pwr_vendors;
					   $resrow['pwr_common_area'] = $pwr_common_area; 
					   $resrow['pwr_others'] = $pwr_others; 
					   $resrow['variance'] = $variance;
					   $resrow['loss'] = $loss;					   
					   $i = $i + 1; 
					   $paymentsArray[] =  $resrow;
					}
				}
			}
		}
			
	
	// Generate and return the spreadsheet
	Excel::create('FMS_Power_Conumption_Submission', function($excel) use ($paymentsArray) {
	
		// Set the spreadsheet title, creator, and description
		$excel->setTitle('FMS_Power_Conumption_Submission');
		$excel->setCreator('Laravel')->setCompany('Aparna');
		$excel->setDescription('fmspowerconsumptionsubmission file');
	
		// Build the spreadsheet, passing in the payments array
		$excel->sheet('sheet1', function($sheet) use ($paymentsArray) {
			$sheet->fromArray($paymentsArray, null, 'A1', false, false);
		});
	
	})->download('xlsx');	 
		
	
	}



  public function pmsa1()

    { 
	      if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
			$validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $startdate)
				->where('reporton', '<=', $today)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $startdate)
				->where('reporton', '<=', $today)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			 
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			'validkva' => $validkva,
			];   
			
		 return view('audit.auditdetail.pmsa1', $relations);
		 //return view('audit.auditdetail.pmsa1');

    }  
	
	
	   public function getpmsdarauditreports(Request $request)
    { 	
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}
			
		 	$row = array();
			
		   $i = 1;
			if (count($results) > 0){
			foreach ($results as $kk => $client){
			  if (count($client) > 0){
			   foreach ($client as $key=>$tt) {
			   $rdate = date("d-m-Y", strtotime($tt->reporton)); 
			   $checkval = checkDailyStatus($rdate, $kk);
			 if($checkval[0] == 'yes'){ } else { 
			 	$row[$key]['sno'] = $i;
			 	$row[$key]['site'] = $siteattrname[$kk];
				$row[$key]['cdate'] = date("d-m-Y", strtotime($tt->created_at));
				$row[$key]['udate'] = date("d-m-Y", strtotime($tt->updated_at));
				$row[$key]['rdate'] = date("d-m-Y", strtotime($tt->reporton));
				$rdate = date("d-m-Y", strtotime($tt->reporton));
				 if($checkval[0] == 'yes'){ 
				   if($tt->blockflag == 1) { 
					  $row[$key]['msg'] = "DAR Submitted with Delay";
				   }
					else{
					   $row[$key]['msg'] = "DAR Submitted";
					}
				 } else {
				   $row[$key]['msg'] =  "DAR Not Submitted";
				 }
			$i = $i + 1; }}}}}	
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'rows' => $row,
			];
			
			 //echo "<pre>"; print_r($row); echo "</pre>"; exit;
			 
		 return view('audit.auditdetail.pmstemplate.pmsa1template', $relations);
 
    }
	
	public function getpmsdarauditreportsexport(Request $request)
    { 	
	
		$from_date = $_GET['fromdate'];
		$to_date = $_GET['todate'];
		$site = $_GET['site'];
		
	  /* $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site; */
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];   
			
			$paymentsArray = array();
			$paymentsArray[] = ['Site', 'Date', 'Last Updated', 'Report Date','Status'];			
			if(count($results) > 0) {
			  foreach ($results as $kk => $client) {
                  if (count($client) > 0) {
                      foreach ($client as $tt){
					          $rdate = date("d-m-Y", strtotime($tt->reporton)); 
							    $checkval = checkDailyStatus($rdate, $kk);
								 if($checkval[0] == 'yes'){ } else {
									$resrow = array();
									$resrow['site'] = $siteattrname[$kk];
									 $resrow['sumit_date'] = date("F j, Y, g:i a",strtotime($tt['created_at']));
									 $resrow['sumit_udate'] = date("F j, Y, g:i a",strtotime($tt['updated_at']));
									$resrow['report_on'] =  date("d-m-Y", strtotime($tt->reporton)); 
									$rdate = date("d-m-Y", strtotime($tt->reporton));
									$checkval = checkDailyStatus($rdate, $kk);
									if($checkval[0] == 'yes'){ 
						   if($tt->blockflag == 1) { 
						   	$resrow['status'] = "DAR Submitted with Delay";
						   }
						    else{
							   	$resrow['status'] = "DAR Submitted";
							}
						 } else {
						  	$resrow['status'] = "DAR Not Submitted";
						 }
						 
						 
						 $paymentsArray[] =  $resrow;
								
						      }
					     }
					   }
					 }
			}	
	
	// Generate and return the spreadsheet
    Excel::create('PMS_DAR_SUBMISSION', function($excel) use ($paymentsArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('PMS_DAR_SUBMISSION');
        $excel->setCreator('Laravel')->setCompany('Aparna');
        $excel->setDescription('pmsdarsubmission file');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($paymentsArray) {
            $sheet->fromArray($paymentsArray, null, 'A1', false, false);
        });

    })->download('xlsx');
  }  
	
	 public function pmsa2()

    { 	
	
	     if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  } 
		   $valid_sup = \App\Pmsdailyreportvalidation::get()->pluck('land_sup', 'site');  
		   $valid_help = \App\Pmsdailyreportvalidation::get()->pluck('land_helper', 'site');    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $startdate)
				->where('reporton', '<=', $today)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $startdate)
				->where('reporton', '<=', $today)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			 
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			'valid_sup' => $valid_sup,
			'valid_help' => $valid_help,
			];   
			
		 return view('audit.auditdetail.pmsa2', $relations);
		 //return view('audit.auditdetail.pmsa2');

    }  
	
	
	  public function getpmssuphelpauditreports(Request $request)
    { 	
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		   $valid_sup = \App\Pmsdailyreportvalidation::get()->pluck('land_sup', 'site');  
		   $valid_help = \App\Pmsdailyreportvalidation::get()->pluck('land_helper', 'site');    
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
		  
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}
		
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			'valid_sup' => $valid_sup,
			'valid_help' => $valid_help,
			];   
			
		 return view('audit.auditdetail.pmstemplate.pmsa2template', $relations);
 
    }  
	
	
	
	 public function getpmsctptauditreportexport(Request $request)
    {
		 	
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		   $valid_sup = \App\Pmsdailyreportvalidation::get()->pluck('land_sup', 'site');  
		   $valid_help = \App\Pmsdailyreportvalidation::get()->pluck('land_helper', 'site');    
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
		  
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}
		
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			'valid_sup' => $valid_sup,
			'valid_help' => $valid_help,
			];   
			
		$paymentsArray = array();
		$paymentsArray[] = ['Site', 'Date', 'Start Deployment 100%', 'Standard Deployment 84%','Actual Deployment','Short Deployment', 'Observation'];			
		if(count($results) > 0) {
		  foreach ($results as $kk => $client) {
			  if (count($client) > 0) {
				  foreach ($client as $tt)
				  {
					$rdate = date("d-m-Y", strtotime($tt->reporton)); 
					$resrow = array();
					$resrow['site'] = $siteattrname[$kk];
					$resrow['rdate'] = date("d-m-Y", strtotime($tt->reporton));
					$resrow['sd1'] = (int)$valid_sup[$kk] + (int)$valid_help[$kk];
					$resrow['sd2'] = "";
					$resrow['ad'] = (int)$tt->land_atten_sup + (int)$tt->land_atten_helper;
					$resrow['sd'] = "";
					$checkval = checkDailyStatus($rdate, $kk);
					$paymentsArray[] =  $resrow;
				 }
				
			 }
		   }
		 }
 
    	// Generate and return the spreadsheet
    	Excel::create('PMS_LCA_SUBMISSION', function($excel) use ($paymentsArray) {


			// Set the spreadsheet title, creator, and description
			$excel->setTitle('PMS_LCA_SUBMISSION');
			$excel->setCreator('Laravel')->setCompany('Aparna');
			$excel->setDescription('pmslcasubmission file');
	
			// Build the spreadsheet, passing in the payments array
			$excel->sheet('sheet1', function($sheet) use ($paymentsArray) {
				$sheet->fromArray($paymentsArray, null, 'A1', false, false);
			});
	
		})->download('xlsx');
	}  
	
	public function pmsa3()

    { 	
		     if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  } 
		 
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $startdate)
				->where('reporton', '<=', $today)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $startdate)
				->where('reporton', '<=', $today)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			 
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];   
			
		 return view('audit.auditdetail.pmsa3', $relations);
    }  
	
	
  public function getpmswaterauditreports(Request $request)
    { 	
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		   $valid_sup = \App\Pmsdailyreportvalidation::get()->pluck('house_sup', 'site');  
		   $valid_help = \App\Pmsdailyreportvalidation::get()->pluck('house_help', 'site');    
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
		  
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames, 
			'auditresult' => $results,
			];   
			
		 return view('audit.auditdetail.pmstemplate.pmsa3template', $relations);
 
    } 
	 public function getpmswaterauditreportexport(Request $request)
	{
		 	
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		   $valid_sup = \App\Pmsdailyreportvalidation::get()->pluck('house_sup', 'site');  
		   $valid_help = \App\Pmsdailyreportvalidation::get()->pluck('house_help', 'site');    
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
		  
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}
			
		$paymentsArray = array();
		$paymentsArray[] = ['Site', 'Date', 'Time', 'Watering'];			
		if(count($results) > 0) {
		  foreach ($results as $kk => $client) {
			  if (count($client) > 0) {
				  foreach ($client as $tt)
				  {
					$resrow = array();
					$resrow['site'] = $siteattrname[$kk];
					$resrow['rdate'] = date("d-m-Y", strtotime($tt->reporton));
					$resrow['time'] = $tt->land_water_time;
					$resrow['watering'] = $tt->land_water_qty;
					$paymentsArray[] =  $resrow;
				 }
				
			 }
		   }
		 }
 
    	// Generate and return the spreadsheet
    	Excel::create('PMS_WATERING_SUBMISSION', function($excel) use ($paymentsArray) {


			// Set the spreadsheet title, creator, and description
			$excel->setTitle('PMS_WATERING_SUBMISSION');
			$excel->setCreator('Laravel')->setCompany('Aparna');
			$excel->setDescription('pmswatersubmission file');
	
			// Build the spreadsheet, passing in the payments array
			$excel->sheet('sheet1', function($sheet) use ($paymentsArray) {
				$sheet->fromArray($paymentsArray, null, 'A1', false, false);
			});
	
		})->download('xlsx');
    
	}
	public function pmsa4()

    { 	
	
	     if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  } 
		   $valid_sup = \App\Pmsdailyreportvalidation::get()->pluck('house_sup', 'site');  
		   $valid_help = \App\Pmsdailyreportvalidation::get()->pluck('house_help', 'site');    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $startdate)
				->where('reporton', '<=', $today)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $startdate)
				->where('reporton', '<=', $today)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			 
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			'valid_sup' => $valid_sup,
			'valid_help' => $valid_help,
			];   
			
		 return view('audit.auditdetail.pmsa4', $relations);
		 //return view('audit.auditdetail.pmsa2');

    }  
	
	
	  public function getpmshousekeepingsuphelpauditreports(Request $request)
    { 	
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		   $valid_sup = \App\Pmsdailyreportvalidation::get()->pluck('house_sup', 'site');  
		   $valid_help = \App\Pmsdailyreportvalidation::get()->pluck('house_help', 'site');    
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
		  
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}
		
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			'valid_sup' => $valid_sup,
			'valid_help' => $valid_help,
			];   
			
		 return view('audit.auditdetail.pmstemplate.pmsa4template', $relations);
 
    }  
	
	
	
	 public function getpmshousekeepingsuphelpauditreportexport(Request $request)
    {
		 	
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		   $valid_sup = \App\Pmsdailyreportvalidation::get()->pluck('house_sup', 'site');  
		   $valid_help = \App\Pmsdailyreportvalidation::get()->pluck('house_help', 'site');    
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
		  
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}
		
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			'valid_sup' => $valid_sup,
			'valid_help' => $valid_help,
			];   
			
		$paymentsArray = array();
		$paymentsArray[] = ['Site', 'Date', 'Start Deployment 100%', 'Standard Deployment 84%','Actual Deployment','Short Deployment', 'Observation'];			
		if(count($results) > 0) {
		  foreach ($results as $kk => $client) {
			  if (count($client) > 0) {
				  foreach ($client as $tt)
				  {
					$rdate = date("d-m-Y", strtotime($tt->reporton)); 
					$resrow = array();
					$resrow['site'] = $siteattrname[$kk];
					$resrow['rdate'] = date("d-m-Y", strtotime($tt->reporton));
					$resrow['sd1'] = (int)$valid_sup[$kk] + (int)$valid_help[$kk];
					$resrow['sd2'] = "";
					$resrow['ad'] = (int)$tt->housekp_atten_sup + (int)$tt->housekp_atten_helper;
					$resrow['sd'] = "";
					$checkval = checkDailyStatus($rdate, $kk);
					$paymentsArray[] =  $resrow;
				 }
				
			 }
		   }
		 }
 
    	// Generate and return the spreadsheet
    	Excel::create('PMS_HKA_SUBMISSION', function($excel) use ($paymentsArray) {


			// Set the spreadsheet title, creator, and description
			$excel->setTitle('PMS_HKA_SUBMISSION');
			$excel->setCreator('Laravel')->setCompany('Aparna');
			$excel->setDescription('pmshkasubmission file');
	
			// Build the spreadsheet, passing in the payments array
			$excel->sheet('sheet1', function($sheet) use ($paymentsArray) {
				$sheet->fromArray($paymentsArray, null, 'A1', false, false);
			});
	
		})->download('xlsx');
	}  
	
	public function pmsa5()

    { 	
	
	     if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  } 
		   $valid_fo = \App\Pmsdailyreportvalidation::get()->pluck('clu_hs_fo', 'site');  
		   $valid_hk = \App\Pmsdailyreportvalidation::get()->pluck('clu_hs_hk', 'site'); 
		   $valid_others = \App\Pmsdailyreportvalidation::get()->pluck('other', 'site');    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $startdate)
				->where('reporton', '<=', $today)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $startdate)
				->where('reporton', '<=', $today)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			 
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			'valid_fo' => $valid_fo,
			'valid_hk' => $valid_hk,
			'valid_others' => $valid_others,
			];   
			
		 return view('audit.auditdetail.pmsa5', $relations);
		 //return view('audit.auditdetail.pmsa2');

    }  
	
	
	  public function getpmschasuphelpauditreports(Request $request)
    { 	
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		  $valid_fo = \App\Pmsdailyreportvalidation::get()->pluck('clu_hs_fo', 'site');  
		  $valid_hk = \App\Pmsdailyreportvalidation::get()->pluck('clu_hs_hk', 'site'); 
		  $valid_others = \App\Pmsdailyreportvalidation::get()->pluck('other', 'site'); 
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
		  
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}
		
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			'valid_fo' => $valid_fo,
			'valid_hk' => $valid_hk,
			'valid_others' => $valid_others,
			];   
			
		 return view('audit.auditdetail.pmstemplate.pmsa5template', $relations);
 
    }  
	
	
	
	 public function getpmschaauditreportexport(Request $request)
    {
		 	
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		   $valid_fo = \App\Pmsdailyreportvalidation::get()->pluck('clu_hs_fo', 'site');  
		   $valid_hk = \App\Pmsdailyreportvalidation::get()->pluck('clu_hs_hk', 'site'); 
		   $valid_others = \App\Pmsdailyreportvalidation::get()->pluck('other', 'site'); 
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
		  
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}
		
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			'valid_fo' => $valid_fo,
			'valid_hk' => $valid_hk,
			'valid_others' => $valid_others,
			];   
			
		$paymentsArray = array();
		$paymentsArray[] = ['Site', 'Date', 'Start Deployment 100%', 'Standard Deployment 84%','Actual Deployment','Short Deployment', 'Observation'];			
		if(count($results) > 0) {
		  foreach ($results as $kk => $client) {
			  if (count($client) > 0) {
				  foreach ($client as $tt)
				  {
					$rdate = date("d-m-Y", strtotime($tt->reporton)); 
					$resrow = array();
					$resrow['site'] = $siteattrname[$kk];
					$resrow['rdate'] = date("d-m-Y", strtotime($tt->reporton));
					$resrow['sd1'] = (int)$valid_fo[$kk] + (int)$valid_hk[$kk] + (int)$valid_others[$kk];
					$resrow['sd2'] = "";
					$resrow['ad'] = (int)$tt->clbhous_att_frntofc + (int)$tt->clbhous_att_housekp + (int)$tt->supervisor + (int)$tt->clbhous_att_other;
					$resrow['sd'] = "";
					$checkval = checkDailyStatus($rdate, $kk);
					$paymentsArray[] =  $resrow;
				 }
				
			 }
		   }
		 }
 
    	// Generate and return the spreadsheet
    	Excel::create('PMS_CHA_SUBMISSION', function($excel) use ($paymentsArray) {


			// Set the spreadsheet title, creator, and description
			$excel->setTitle('PMS_CHA_SUBMISSION');
			$excel->setCreator('Laravel')->setCompany('Aparna');
			$excel->setDescription('pmschasubmission file');
	
			// Build the spreadsheet, passing in the payments array
			$excel->sheet('sheet1', function($sheet) use ($paymentsArray) {
				$sheet->fromArray($paymentsArray, null, 'A1', false, false);
			});
	
		})->download('xlsx');
	}
	public function pmsa6()

    { 	
		 return view('audit.auditdetail.pmsa6');

    }  
	
	public function pmsa7()

    { 	
		 return view('audit.auditdetail.pmsa7');

    }  
	public function pmsa8()

    { 	
	     if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
			$validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		     $garres = array();
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $startdate)
				->where('reporton', '<=', $today)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $startdate)
				->where('reporton', '<=', $today)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			 $paymentsArray = array();
			foreach ($results as $kk => $client) {
			  if (count($client) > 0)
			    foreach ($client as $tt){
					 //$rdate = date("d-m-Y", strtotime($tt->reporton));
					 $grab_val = $tt->housekp_debr_garbage; 
					
					// if($grab_val == '' || $grab_val == 'not collectd'  || $grab_val == '0' || $grab_val == 'nil' || $grab_val == 'Nil' || $grab_val== '00' || $grab_val== 'None' || $grab_val== 'NOT COLECTTED' || $grab_val== 'Vehicle problem'){
					
					                $totUnits =  \App\Pmsdailyreportvalidation::where('site', '=', $kk)->first();
									$resrow = array();
									$resrow['site'] = $siteattrname[$kk];
									$resrow['units'] = $totUnits->flats;
									$resrow['occupied'] = (int)($tt->occupancy_asdate_owners) + (int)($tt->occupancy_asdate_tenants);
									$resrow['owners'] = $tt->occupancy_asdate_owners;
									$resrow['tenents'] = $tt->occupancy_asdate_tenants;
									$resrow['vacant'] = $tt->occupancy_asdate_vacant;
									$resrow['report_on'] =  date("d-m-Y", strtotime($tt->reporton)); 
						 $paymentsArray[] =  $resrow;
					// }
				}
			} 
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			'garbageresult' => $paymentsArray,
			'validkva' => $validkva,
			];  
		
		// return view('audit.auditdetail.pmsa1', $relations);
		 return view('audit.auditdetail.pmsa8', $relations);

    
		// return view('audit.auditdetail.pmsa8');

    }  
	
	
	 public function getoccupancyauditreports(Request $request)
    { 	
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	  $fromdate = date("Y-m-d", strtotime($from_date));
	  $todate = date("Y-m-d", strtotime($to_date));
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			} 
			
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}
			
			 $paymentsArray = array();
			foreach ($results as $kk => $client) {
			  if (count($client) > 0)
			    foreach ($client as $tt){
					 //$rdate = date("d-m-Y", strtotime($tt->reporton));
					 $grab_val = $tt->housekp_debr_garbage; 
					
					// if($grab_val == '' || $grab_val == 'not collectd'  || $grab_val == '0' || $grab_val == 'nil' || $grab_val == 'Nil' || $grab_val== '00' || $grab_val== 'None' || $grab_val== 'NOT COLECTTED' || $grab_val== 'Vehicle problem'){
					
					                $totUnits =  \App\Pmsdailyreportvalidation::where('site', '=', $kk)->first();
									$resrow = array();
									$resrow['site'] = $siteattrname[$kk];
									$resrow['units'] = $totUnits->flats;
									$resrow['occupied'] = (int)($tt->occupancy_asdate_owners) + (int)($tt->occupancy_asdate_tenants);
									$resrow['owners'] = $tt->occupancy_asdate_owners;
									$resrow['tenents'] = $tt->occupancy_asdate_tenants;
									$resrow['vacant'] = $tt->occupancy_asdate_vacant;
									$resrow['report_on'] =  date("d-m-Y", strtotime($tt->reporton)); 
						  $paymentsArray[] =  $resrow;
					// }
				}
			} 
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			'garbageresult' => $paymentsArray,
			];  
		 return view('audit.auditdetail.pmstemplate.pmsa8template', $relations);
 
    }  
	
	
	
	public function getoccupancyauditreportsexport(Request $request)
    { 	
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		   $valid_sup = \App\Pmsdailyreportvalidation::get()->pluck('house_sup', 'site');  
		   $valid_help = \App\Pmsdailyreportvalidation::get()->pluck('house_help', 'site');    
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
		  
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames, 
			'auditresult' => $results,
			];   			
			 $paymentsArray = array();
			  $paymentsArray[] = ['Project Name ','Date','Total no of units', 'Occupied','Owners','Tenants','Vacant'];	
			foreach ($results as $kk => $client) {
			  if (count($client) > 0){
			    foreach ($client as $tt){
					 //$rdate = date("d-m-Y", strtotime($tt->reporton));
					 $grab_val = $tt->housekp_debr_garbage; 
					
					// if($grab_val == '' || $grab_val == 'not collectd'  || $grab_val == '0' || $grab_val == 'nil' || $grab_val == 'Nil' || $grab_val== '00' || $grab_val== 'None' || $grab_val== 'NOT COLECTTED' || $grab_val== 'Vehicle problem'){
					
					                $totUnits =  \App\Pmsdailyreportvalidation::where('site', '=', $kk)->first();
									$resrow = array();
									$resrow['site'] = $siteattrname[$kk];
									$resrow['report_on'] =  date("d-m-Y", strtotime($tt->reporton)); 
									$resrow['units'] = $totUnits->flats;
									$resrow['occupied'] = (int)($tt->occupancy_asdate_owners) + (int)($tt->occupancy_asdate_tenants);
									$resrow['owners'] = $tt->occupancy_asdate_owners;
									$resrow['tenents'] = $tt->occupancy_asdate_tenants;
									$resrow['vacant'] = $tt->occupancy_asdate_vacant;
									
						  $paymentsArray[] =  $resrow;
					// }
				}
				}
			} 
			
	// Generate and return the spreadsheet
    Excel::create('Occupancy', function($excel) use ($paymentsArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('Occupancy');
        $excel->setCreator('Laravel')->setCompany('Aparna');
        $excel->setDescription('occupancy file');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($paymentsArray) {
            $sheet->fromArray($paymentsArray, null, 'A1', false, false);
        });

    })->download('xlsx');
 
    } 
	
	
	
	
	
	public function pmsa9()

    { 	
		 return view('audit.auditdetail.pmsa9');

    }  
	public function pmsa10()

    { 	
		 return view('audit.auditdetail.pmsa10');

    }  

  public function pmsa11()

    { 	
		 return view('audit.auditdetail.pmsa11');

    }  

 public function pmsa12()

    { 
	     if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  } 
		 
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $startdate)
				->where('reporton', '<=', $today)
				->where('land_hoeing', '=', "0")
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $startdate)
				->where('reporton', '<=', $today)
				->where('land_hoeing', '=', "0")
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			 
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];   
			
		 return view('audit.auditdetail.pmsa12', $relations);	
		// return view('audit.auditdetail.pmsa12');
    }  
	
	
		
  public function getpmscleanauditreports(Request $request)
    { 	
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		   $valid_sup = \App\Pmsdailyreportvalidation::get()->pluck('house_sup', 'site');  
		   $valid_help = \App\Pmsdailyreportvalidation::get()->pluck('house_help', 'site');    
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
		  
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('land_hoeing', '=', "0")
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('land_hoeing', '=', "0")
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('land_hoeing', '=', "0")
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('land_hoeing', '=', "0")
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames, 
			'auditresult' => $results,
			];   
			
		 return view('audit.auditdetail.pmstemplate.pmsa12template', $relations);
 
    } 
	
	
	
			
  public function getcleaningauditreportsexport(Request $request)
    { 	
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		   $valid_sup = \App\Pmsdailyreportvalidation::get()->pluck('house_sup', 'site');  
		   $valid_help = \App\Pmsdailyreportvalidation::get()->pluck('house_help', 'site');    
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
		  
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('land_hoeing', '=', "0")
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('land_hoeing', '=', "0")
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('land_hoeing', '=', "0")
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('land_hoeing', '=', "0")
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames, 
			'auditresult' => $results,
			];   
			
		
		 $paymentsArray = array();
			 $paymentsArray[] = ['Project Name ','Block / Area', 'Cleaning  not done on'];	
			foreach ($results as $kk => $client) {
			  if (count($client) > 0)
			    foreach ($client as $tt){
					 //$rdate = date("d-m-Y", strtotime($tt->reporton));
					
									$resrow['site'] = $siteattrname[$kk];
									// $resrow['sumit_date'] = date("F j, Y, g:i a",strtotime($tt['created_at']));
									 $resrow['report_on'] =  '';
									$resrow['cleaning'] =  date("d/m/Y", strtotime($tt->reporton)); 
						 $paymentsArray[] =  $resrow;
					 
				}
			} 
			
			
	// Generate and return the spreadsheet
    Excel::create('Cleaning', function($excel) use ($paymentsArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('Cleaning');
        $excel->setCreator('Laravel')->setCompany('Aparna');
        $excel->setDescription('cleaning file');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($paymentsArray) {
            $sheet->fromArray($paymentsArray, null, 'A1', false, false);
        });

    })->download('xlsx');
 
    } 
	

 public function pmsa13()

    { 	
		     if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  } 
		 
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $startdate)
				->where('reporton', '<=', $today)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $startdate)
				->where('reporton', '<=', $today)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			 
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];   
			
		 return view('audit.auditdetail.pmsa13', $relations);	

    }  
	
	
			
  public function getpmssparyingauditreports(Request $request)
    { 	
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		   $valid_sup = \App\Pmsdailyreportvalidation::get()->pluck('house_sup', 'site');  
		   $valid_help = \App\Pmsdailyreportvalidation::get()->pluck('house_help', 'site');    
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
		  
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames, 
			'auditresult' => $results,
			];   
			
		 return view('audit.auditdetail.pmstemplate.pmsa3template', $relations);
 
    } 

 public function pmsa14()

    { 	
		 return view('audit.auditdetail.pmsa14');

    }  

 public function pmsa15()

    { 	
	
	      	      if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
			$validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		     $garres = array();
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $startdate)
				->where('reporton', '<=', $today)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $startdate)
				->where('reporton', '<=', $today)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			 $paymentsArray = array();
			foreach ($results as $kk => $client) {
			  if (count($client) > 0)
			    foreach ($client as $tt){
					 //$rdate = date("d-m-Y", strtotime($tt->reporton));
					 $grab_val = $tt->housekp_debr_garbage; 
					
					 if($grab_val == '' || $grab_val == 'not collectd'  || $grab_val == '0' || $grab_val == 'nil' || $grab_val == 'Nil' || $grab_val== '00' || $grab_val== 'None' || $grab_val== 'NOT COLECTTED' || $grab_val== 'Vehicle problem'){
									$resrow = array();
									$resrow['site'] = $siteattrname[$kk];
									 $resrow['sumit_date'] = date("F j, Y, g:i a",strtotime($tt['created_at']));
									$resrow['report_on'] =  date("d-m-Y", strtotime($tt->reporton)); 
						 $paymentsArray[] =  $resrow;
					 }
				}
			} 
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			'garbageresult' => $paymentsArray,
			'validkva' => $validkva,
			]; 
			
		// return view('audit.auditdetail.pmsa1', $relations);
		 return view('audit.auditdetail.pmsa15', $relations);

    }  
	
	
	
	 public function getgarbageauditreports(Request $request)
    { 	
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			} 
			
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}
			
			 $paymentsArray = array();
			foreach ($results as $kk => $client) {
			  if (count($client) > 0)
			    foreach ($client as $tt){
					 //$rdate = date("d-m-Y", strtotime($tt->reporton));
					 $grab_val = $tt->housekp_debr_garbage; 
					 if($grab_val == '' || $grab_val == 'not collectd' || $grab_val == '0' || $grab_val == 'nil' || $grab_val == 'Nil' || $grab_val== '00' || $grab_val== 'None' || $grab_val== 'NOT COLECTTED' || $grab_val== 'Vehicle problem'){
									$resrow = array();
									$resrow['site'] = $siteattrname[$kk];
									 $resrow['sumit_date'] = date("F j, Y, g:i a",strtotime($tt['created_at']));
									$resrow['report_on'] =  date("d-m-Y", strtotime($tt->reporton)); 
						 $paymentsArray[] =  $resrow;
					 }
				}
			} 
			
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'garbageresult' => $paymentsArray,
			'auditresult' => $results,
			];   
			
		 return view('audit.auditdetail.pmstemplate.pmsa15template', $relations);
 
    }  
	
	
	 public function getgarbageauditreportsexport(Request $request)
    { 	
	 /* $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;*/
	  
	  $from_date = $_GET['fromdate'];
		$to_date = $_GET['todate'];
		$site = $_GET['site'];
		
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			} 
			
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}
			
			 $paymentsArray = array();
			foreach ($results as $kk => $client) {
			  if (count($client) > 0)
			    foreach ($client as $tt){
					 //$rdate = date("d-m-Y", strtotime($tt->reporton));
					 $grab_val = $tt->housekp_debr_garbage; 
					 if($grab_val == '' || $grab_val == 'not collectd' || $grab_val == '0' || $grab_val == 'nil' || $grab_val == 'Nil' || $grab_val== '00' || $grab_val== 'None' || $grab_val== 'NOT COLECTTED' || $grab_val== 'Vehicle problem'){
									$resrow = array();
									$resrow['site'] = $siteattrname[$kk];
									 $resrow['sumit_date'] = date("F j, Y, g:i a",strtotime($tt['created_at']));
									$resrow['report_on'] =  date("d-m-Y", strtotime($tt->reporton)); 
						 $paymentsArray[] =  $resrow;
					 }
				}
			} 
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'garbageresult' => $paymentsArray,
			'auditresult' => $results,
			];   
			
			
			 $paymentsArray = array();
			 $paymentsArray[] = ['Site','Date', 'Garbage'];	
			foreach ($results as $kk => $client) {
			  if (count($client) > 0)
			    foreach ($client as $tt){
					 //$rdate = date("d-m-Y", strtotime($tt->reporton));
					 $grab_val = $tt->housekp_debr_garbage; 
					 if($grab_val == '' || $grab_val == 'not collectd' || $grab_val == '0' || $grab_val == 'nil' || $grab_val == 'Nil' || $grab_val== '00' || $grab_val== 'None' || $grab_val== 'NOT COLECTTED' || $grab_val== 'Vehicle problem'){
									$resrow = array();
									$resrow['site'] = $siteattrname[$kk];
									 $resrow['sumit_date'] = date("F j, Y, g:i a",strtotime($tt['created_at']));
									 $resrow['report_on'] =  date("d-m-Y", strtotime($tt->reporton)); 
									$resrow['garbage'] =  'Garbage Not Collected'; 
						 $paymentsArray[] =  $resrow;
					 }
				}
			} 
			
			
	// Generate and return the spreadsheet
    Excel::create('GARBAGE_COLLECTION', function($excel) use ($paymentsArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('GARBAGE_COLLECTION');
        $excel->setCreator('Laravel')->setCompany('Aparna');
        $excel->setDescription('garbagecollection file');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($paymentsArray) {
            $sheet->fromArray($paymentsArray, null, 'A1', false, false);
        });

    })->download('xlsx');

    }  
	
	
	
	 public function pmsa16()

    { 	
		 return view('audit.auditdetail.pmsa16');

    }  
	
	 public function pmsa17()

    { 	
		 return view('audit.auditdetail.pmsa17');

    }  
	
	public function pmsa18()

    { 	
	
	      	      if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
			$validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		     $garres = array();
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $startdate)
				->where('reporton', '<=', $today)
				->where('housekp_rideon_hrs', '<', '04:30')
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $startdate)
				->where('reporton', '<=', $today)
				->where('site', '=', $kk)
				->where('housekp_rideon_hrs', '<', '04:30')
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			 $paymentsArray = array();
			foreach ($results as $kk => $client) {
			  if (count($client) > 0)
			    foreach ($client as $tt){
									$resrow = array();
									$resrow['site'] = $siteattrname[$kk];
									 //$resrow['sumit_date'] = date("F j, Y, g:i a",strtotime($tt['created_at']));
									$resrow['report_on'] =  date("d-m-Y", strtotime($tt->reporton)); 
									$resrow['rideon'] =  "Ride done less Four and Half hours "; 
						 $paymentsArray[] =  $resrow;
				}
			}        
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			'garbageresult' => $paymentsArray,
			'validkva' => $validkva,
			]; 
			
		// return view('audit.auditdetail.pmsa1', $relations);
		 return view('audit.auditdetail.pmsa18', $relations);

    }  
	
	
	
		
	 public function getrideauditreports(Request $request)
    { 	
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('housekp_rideon_hrs', '<', '04:30')
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('housekp_rideon_hrs', '<', '04:30')
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			} 
			
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('housekp_rideon_hrs', '<', '04:30')
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('housekp_rideon_hrs', '<', '04:30')
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}
			
			 $paymentsArray = array();
			foreach ($results as $kk => $client) {
			  if (count($client) > 0)
			    foreach ($client as $tt){
					 //$rdate = date("d-m-Y", strtotime($tt->reporton));
					 $grab_val = $tt->housekp_debr_garbage; 
									$resrow = array();
									$resrow['site'] = $siteattrname[$kk];
									 $resrow['sumit_date'] = date("F j, Y, g:i a",strtotime($tt['created_at']));
									$resrow['report_on'] =  date("d-m-Y", strtotime($tt->reporton)); 
									$resrow['rideon'] =  "Ride done less Four and Half hours "; 
						 $paymentsArray[] =  $resrow;
				}
			} 
			
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'garbageresult' => $paymentsArray,
			'auditresult' => $results,
			];   
			
		 return view('audit.auditdetail.pmstemplate.pmsa18template', $relations);
  
    }
	
	
	 public function getrideauditreportsexport(Request $request)
    { 	
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('housekp_rideon_hrs', '<', '04:30')
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('housekp_rideon_hrs', '<', '04:30')
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			} 
			
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('housekp_rideon_hrs', '<', '04:30')
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('housekp_rideon_hrs', '<', '04:30')
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}
			
			 $paymentsArray = array();
			  $paymentsArray[] = ['Site','Date', 'Ride'];	
			foreach ($results as $kk => $client) {
			  if (count($client) > 0)
			    foreach ($client as $tt){
					 //$rdate = date("d-m-Y", strtotime($tt->reporton));
					 $grab_val = $tt->housekp_debr_garbage; 
									$resrow = array();
									$resrow['site'] = $siteattrname[$kk];
									// $resrow['sumit_date'] = date("F j, Y, g:i a",strtotime($tt['created_at']));
									$resrow['report_on'] =  date("d-m-Y", strtotime($tt->reporton)); 
									$resrow['rideon'] =  "Ride done less Four and Half hours "; 
						 $paymentsArray[] =  $resrow;
				}
			} 
			
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'garbageresult' => $paymentsArray,
			'auditresult' => $results,
			];   
			
			// Generate and return the spreadsheet
    Excel::create('Ridereports', function($excel) use ($paymentsArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('Ridereports');
        $excel->setCreator('Laravel')->setCompany('Aparna');
        $excel->setDescription('ridereports file');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($paymentsArray) {
            $sheet->fromArray($paymentsArray, null, 'A1', false, false);
        });

    })->download('xlsx');
		 
  
    }  
	  
	

	public function pmsa19()

    { 	
	
	      	      if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
			$validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		     $garres = array();
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $startdate)
				->where('reporton', '<=', $today)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $startdate)
				->where('reporton', '<=', $today)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			 $paymentsArray = array();
			foreach ($results as $kk => $client) {
			  if (count($client) > 0)
			    foreach ($client as $tt){
									$resrow = array();
									$resrow['site'] = $siteattrname[$kk];
									 //$resrow['sumit_date'] = date("F j, Y, g:i a",strtotime($tt['created_at']));
									 $resrow['occupancy_asdate_owners'] =  $tt['occupancy_asdate_owners'];
									 $resrow['occupancy_asdate_tenants'] =  $tt['occupancy_asdate_tenants'];
									$resrow['clbhous_users_gym'] =  $tt['clbhous_users_gym'];
									$resrow['clbhous_users_pool'] =  $tt['clbhous_users_pool'];
									$resrow['clbhous_shuttle'] =  $tt['clbhous_shuttle'];
									$resrow['clbhous_users_tennis'] =  $tt['clbhous_users_tennis'];
									$resrow['report_on'] =  date("d-m-Y", strtotime($tt->reporton)); 
									
									
						 $paymentsArray[] =  $resrow;
				}
			}        
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			'garbageresult' => $paymentsArray,
			'validkva' => $validkva,
			]; 
			
		// return view('audit.auditdetail.pmsa1', $relations);
		 return view('audit.auditdetail.pmsa19', $relations);

    }  

 public function getchuserauditreports(Request $request)
    { 	
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			} 
			
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}
			
			 $paymentsArray = array();
			foreach ($results as $kk => $client) {
			  if (count($client) > 0)
			    foreach ($client as $tt){
									$resrow = array();
									$resrow['site'] = $siteattrname[$kk];
									 //$resrow['sumit_date'] = date("F j, Y, g:i a",strtotime($tt['created_at']));
									 $resrow['occupancy_asdate_owners'] =  $tt['occupancy_asdate_owners'];
									 $resrow['occupancy_asdate_tenants'] =  $tt['occupancy_asdate_tenants'];
									$resrow['clbhous_users_gym'] =  $tt['clbhous_users_gym'];
									$resrow['clbhous_users_pool'] =  $tt['clbhous_users_pool'];
									$resrow['clbhous_shuttle'] =  $tt['clbhous_shuttle'];
									$resrow['clbhous_users_tennis'] =  $tt['clbhous_users_tennis'];
									$resrow['report_on'] =  date("d-m-Y", strtotime($tt->reporton)); 
									
						 $paymentsArray[] =  $resrow;
				}
			}        
			
			
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'garbageresult' => $paymentsArray,
			'auditresult' => $results,
			];   
			
		 return view('audit.auditdetail.pmstemplate.pmsa19template', $relations);
  
    }
	
	
	
	 public function getchuserauditreportsexport(Request $request)
    { 	
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			} 
			
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}
			
			 $paymentsArray = array();
			  $paymentsArray[] = ['Site','Occupancy', 'Nof Users(Gym)', 'Nof Users(Badminton)', 'Nof Users(S Pool)', 'Nof Users(Tennis)'];	
			foreach ($results as $kk => $client) {
			  if (count($client) > 0)
			    foreach ($client as $tt){
					 //$rdate = date("d-m-Y", strtotime($tt->reporton));
					 $grab_val = $tt->housekp_debr_garbage; 
									$resrow = array();
								     $resrow['site'] = $siteattrname[$kk];
									 //$resrow['sumit_date'] = date("F j, Y, g:i a",strtotime($tt['created_at']));
									$resrow['report_on'] =  date("d-m-Y", strtotime($tt->reporton)); 
									$resrow['occupancy_asdate_owners'] =  $tt['occupancy_asdate_owners'];
									$resrow['occupancy_asdate_tenants'] =  $tt['occupancy_asdate_tenants'];
									$resrow['clbhous_users_gym'] =  $tt['clbhous_users_gym'];
									$resrow['clbhous_shuttle'] =  $tt['clbhous_shuttle'];
									$resrow['clbhous_users_pool'] =  $tt['clbhous_users_pool'];
									$resrow['clbhous_users_tennis'] =  $tt['clbhous_users_tennis'];
									
						 $paymentsArray[] =  $resrow;
				}
			}    
			
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'garbageresult' => $paymentsArray,
			'auditresult' => $results,
			];   
			
			// Generate and return the spreadsheet
       Excel::create('CHusers', function($excel) use ($paymentsArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('CHusers');
        $excel->setCreator('Laravel')->setCompany('Aparna');
        $excel->setDescription('CHusers file');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($paymentsArray) {
            $sheet->fromArray($paymentsArray, null, 'A1', false, false);
        });

    })->download('xlsx');
		 
  
    }  
	
	
		public function pmsa20()

    { 		
	      if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
			$validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		     $garres = array();
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $startdate)
				->where('reporton', '<=', $today)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $startdate)
				->where('reporton', '<=', $today)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			 $paymentsArray = array();
			foreach ($results as $kk => $client) {
			  if (count($client) > 0)
			    foreach ($client as $tt){
									$resrow = array();
									$resrow['site'] = $siteattrname[$kk];
									 //$resrow['sumit_date'] = date("F j, Y, g:i a",strtotime($tt['created_at']));
									 $resrow['occupancy_asdate_owners'] =  $tt['occupancy_asdate_owners'];
									 $resrow['occupancy_asdate_tenants'] =  $tt['occupancy_asdate_tenants'];
									$resrow['clbhous_users_gym'] =  $tt['clbhous_users_gym'];
									$resrow['clbhous_users_pool'] =  $tt['clbhous_users_pool'];
									$resrow['clbhous_shuttle'] =  $tt['clbhous_shuttle'];
									$resrow['clbhous_users_tennis'] =  $tt['clbhous_users_tennis'];
									$resrow['commercial_activate'] =  $tt['commercial_activate'];
									$resrow['report_on'] =  date("d-m-Y", strtotime($tt->reporton)); 
									$resrow['report_month'] =  date("F Y", strtotime($tt->reporton)); 
									
						 $paymentsArray[] =  $resrow;  
				}
			}        
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			'garbageresult' => $paymentsArray,
			'validkva' => $validkva,
			]; 
			
		// return view('audit.auditdetail.pmsa1', $relations);
		 return view('audit.auditdetail.pmsa20', $relations);

    }  
	
	public function getchusermtdauditreports(Request $request)
    { 	
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			} 
			
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}
			
			 $paymentsArray = array();
			foreach ($results as $kk => $client) {
			  if (count($client) > 0)
			    foreach ($client as $tt){
									$resrow = array();
									$resrow['site'] = $siteattrname[$kk];
									 //$resrow['sumit_date'] = date("F j, Y, g:i a",strtotime($tt['created_at']));
									 $resrow['occupancy_asdate_owners'] =  $tt['occupancy_asdate_owners'];
									 $resrow['occupancy_asdate_tenants'] =  $tt['occupancy_asdate_tenants'];
									$resrow['clbhous_users_gym'] =  $tt['clbhous_users_gym'];
									$resrow['clbhous_users_pool'] =  $tt['clbhous_users_pool'];
									$resrow['clbhous_shuttle'] =  $tt['clbhous_shuttle'];
									$resrow['clbhous_users_tennis'] =  $tt['clbhous_users_tennis'];
									$resrow['commercial_activate'] =  $tt['commercial_activate'];
									$resrow['report_on'] =  date("d-m-Y", strtotime($tt->reporton)); 
									$resrow['report_month'] =  date("F Y", strtotime($tt->reporton)); 
									
						 $paymentsArray[] =  $resrow;
				}
			}        
			
			
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'garbageresult' => $paymentsArray,
			'auditresult' => $results,
			];   
			
		 return view('audit.auditdetail.pmstemplate.pmsa20template', $relations);
  
    }
	
	
	
	 public function getchusermtdauditreportsexport(Request $request)
    { 	
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			} 
			
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}
			
			 $paymentsArray = array();
			  $paymentsArray[] = ['Project Name','Date','Month','Occupancy', 'Nof Users(Gym)', 'Nof Users(Shuttle)', 'Nof Users(S Pool)', 'Nof Users(Tennis)','Total CH Revenue Per Day'];	
			foreach ($results as $kk => $client) {
			  if (count($client) > 0)
			    foreach ($client as $tt){
					 //$rdate = date("d-m-Y", strtotime($tt->reporton));
					 $grab_val = $tt->housekp_debr_garbage; 
									$resrow = array();
								     $resrow['site'] = $siteattrname[$kk];
									 //$resrow['sumit_date'] = date("F j, Y, g:i a",strtotime($tt['created_at']));
									 $resrow['report_on'] =  date("d-m-Y", strtotime($tt->reporton)); 
									 $resrow['report_month'] =  date("F Y", strtotime($tt->reporton)); 
									 $resrow['occupancy'] =  $tt['occupancy_asdate_owners']+$tt['occupancy_asdate_tenants'];
									$resrow['clbhous_users_gym'] =  $tt['clbhous_users_gym'];
									$resrow['clbhous_shuttle'] =  $tt['clbhous_shuttle'];
									$resrow['clbhous_users_pool'] =  $tt['clbhous_users_pool'];
									$resrow['clbhous_users_tennis'] =  $tt['clbhous_users_tennis'];
									$resrow['clbhous_revenue_day'] =  $tt['clbhous_revenue_day'];
									
						 $paymentsArray[] =  $resrow;
				}
			} 
			
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'garbageresult' => $paymentsArray,
			'auditresult' => $results,
			];   
			
			// Generate and return the spreadsheet
       Excel::create('CHusersMTD', function($excel) use ($paymentsArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('CHusersMTD');
        $excel->setCreator('Laravel')->setCompany('Aparna');
        $excel->setDescription('CHusers Mtd file');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($paymentsArray) {
            $sheet->fromArray($paymentsArray, null, 'A1', false, false);
        });

    })->download('xlsx');
		 
  
    }  
	
	
	
	// CMD & RMD
	
	 public function pmsa21()

    { 	
	
		$segment3 = date('Y');
		$segment4 = date('m');
		 
		
		$formfieldarray = array();
		$siteattrname = array();
		$flatres = array();
		$cmdkva = array();
		$transforkva = array();
		$dg_kva = array();
		$service_numb = array();    
		$reportdate_val = "";
		$dateString = $segment3.'-'.$segment4.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$segment4."-".$segment3;

	      if(Auth::user()->id == 1){
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  $cmdkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  $transforkva = \App\Dailyreportvalidation::get()->pluck('transformer_kva', 'site');
		  $dg_kva = \App\Dailyreportvalidation::get()->pluck('dg_set_kva', 'site');
		  $service_numb = \App\Dailyreportvalidation::get()->pluck('service_number', 'site');
		  $backup = \App\Dailyreportvalidation::get()->pluck('mispartialbkp', 'site');
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
			
		   $cmdkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  $transforkva = \App\Dailyreportvalidation::get()->pluck('transformer_kva', 'site');
		  $dg_kva = \App\Dailyreportvalidation::get()->pluck('dg_set_kva', 'site');
		  $service_numb = \App\Dailyreportvalidation::get()->pluck('service_number', 'site');
		  $backup = \App\Dailyreportvalidation::get()->pluck('mispartialbkp', 'site');
			
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
		  	 
			 
			 $matchfields = ['month' => $segment4, 'year' => $segment3]; 

		$res_count = \App\Cmdmisreport::where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Cmdmisreport::where($matchfields)->get();
			
			
			 if(count($formfieldarray) > 0){
			     foreach($formfieldarray as $fieldarr){
				 	 $existing_records[$fieldarr->site] = array("id"=>$fieldarr->id,"total_rmd"=>$fieldarr->total_rmd,"peak_load_record"=>$fieldarr->peak_load_record,"remarks"=>$fieldarr->remarks);
				 } 
				 
				// echo "<pre>"; print_r($existing_records);echo "</pre>";
			 }  
			 }
			 
			 //echo "<pre>"; print_r($existing_records);echo "</pre>"; exit;
			 $occres_res = array();
			 
			 foreach($siteattrname as $kk => $sitearr){
			 
				$dateString = $segment3.'-'.$segment4.'-01';
				//Last date of current month.
				$lastDateOfMonth = date("t", strtotime($dateString));
				$reporton = $lastDateOfMonth."-".$segment4."-".$segment3;
				$reporton = $segment3."-".$segment4."-".$lastDateOfMonth;
				
				$occupanymatch_fileds = ['reporton' => $reporton, 'site' => $kk]; 
				
				$occres_cn = \App\Pmsdailyreport::where($occupanymatch_fileds)->count(); 
				if($occres_cn > 0){
				  $occ_rw = \App\Pmsdailyreport::where($occupanymatch_fileds)->first();
				
				 $occres_res[$kk]['occupency'] = $occ_rw['occupancy_asdate_owners'] + $occ_rw['occupancy_asdate_tenants'];
				
			 } 
			 else{
			    $occres_res[$kk]['occupency'] = "0";
			 }
			 
		} 
		
		
			 
			 //exit;
			  $matchdatafields = ['month' => $segment4, 'year' => $segment3]; 

		$res_data_count = \App\Cmdmisdatareport::where($matchdatafields)->count();
		$cmddata= array();
		if($res_data_count > 0){
		
			$cmddata = \App\Cmdmisdatareport::where($matchdatafields)->first();
	    }
			
			$relations = [  
			'res' => $formfieldarray, 
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'flats' => $flatres,
			'cmdkva' => $cmdkva,
			'transforkva' => $transforkva,
			'dg_kva' => $dg_kva,
			'service_numb' => $service_numb,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			'cost' => $existing_Rates,
			'occupency' => $occres_res, 
			'backup' => $backup, 
			'cmddata' => $cmddata,
			];    
		
		// return view('audit.auditdetail.pmsa1', $relations);
		 return view('audit.auditdetail.pmsa21', $relations);

    }  
	
	
	public function getpmscmdrmdreports(Request $request){
		
	   $segment4 = $request->month;
	  $segment3 = $request->year;
	  $site = $request->site;

		$formfieldarray = array();
		$siteattrname = array();
		$flatres = array();
		$cmdkva = array();
		$transforkva = array();
		$dg_kva = array();
		$service_numb = array();    
		$reportdate_val = "";
		$dateString = $segment3.'-'.$segment4.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$segment4."-".$segment3;
		
		
		  if($site == ""){

	      if(Auth::user()->id == 1){
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  $cmdkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  $transforkva = \App\Dailyreportvalidation::get()->pluck('transformer_kva', 'site');
		  $dg_kva = \App\Dailyreportvalidation::get()->pluck('dg_set_kva', 'site');
		  $service_numb = \App\Dailyreportvalidation::get()->pluck('service_number', 'site');
		  $backup = \App\Dailyreportvalidation::get()->pluck('mispartialbkp', 'site');
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
			
		   $cmdkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  $transforkva = \App\Dailyreportvalidation::get()->pluck('transformer_kva', 'site');
		  $dg_kva = \App\Dailyreportvalidation::get()->pluck('dg_set_kva', 'site');
		  $service_numb = \App\Dailyreportvalidation::get()->pluck('service_number', 'site');
		  $backup = \App\Dailyreportvalidation::get()->pluck('mispartialbkp', 'site');
			
		  }
		  
		  } 
		  else {
		 if(Auth::user()->id == 1){
	      $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  $cmdkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  $transforkva = \App\Dailyreportvalidation::get()->pluck('transformer_kva', 'site');
		  $dg_kva = \App\Dailyreportvalidation::get()->pluck('dg_set_kva', 'site');
		  $service_numb = \App\Dailyreportvalidation::get()->pluck('service_number', 'site');
		  $backup = \App\Dailyreportvalidation::get()->pluck('mispartialbkp', 'site');
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$siteattrname = \App\Sites::where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
			
		   $cmdkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  $transforkva = \App\Dailyreportvalidation::get()->pluck('transformer_kva', 'site');
		  $dg_kva = \App\Dailyreportvalidation::get()->pluck('dg_set_kva', 'site');
		  $service_numb = \App\Dailyreportvalidation::get()->pluck('service_number', 'site');
		  $backup = \App\Dailyreportvalidation::get()->pluck('mispartialbkp', 'site');
			
		  }
		  
		  
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
		  	 
			 
			 $matchfields = ['month' => $segment4, 'year' => $segment3]; 

		$res_count = \App\Cmdmisreport::where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Cmdmisreport::where($matchfields)->get();
			
			
			 if(count($formfieldarray) > 0){
			     foreach($formfieldarray as $fieldarr){
				 	 $existing_records[$fieldarr->site] = array("id"=>$fieldarr->id,"total_rmd"=>$fieldarr->total_rmd,"peak_load_record"=>$fieldarr->peak_load_record,"remarks"=>$fieldarr->remarks);
				 } 
				 
				// echo "<pre>"; print_r($existing_records);echo "</pre>";
			 }  
			 }
			 
			 //echo "<pre>"; print_r($existing_records);echo "</pre>"; exit;
			 $occres_res = array();
			 
			 foreach($siteattrname as $kk => $sitearr){
			 
				$dateString = $segment3.'-'.$segment4.'-01';
				//Last date of current month.
				$lastDateOfMonth = date("t", strtotime($dateString));
				$reporton = $lastDateOfMonth."-".$segment4."-".$segment3;
				$reporton = $segment3."-".$segment4."-".$lastDateOfMonth;
				
				$occupanymatch_fileds = ['reporton' => $reporton, 'site' => $kk]; 
				
				$occres_cn = \App\Pmsdailyreport::where($occupanymatch_fileds)->count(); 
				if($occres_cn > 0){
				  $occ_rw = \App\Pmsdailyreport::where($occupanymatch_fileds)->first();
				
				 $occres_res[$kk]['occupency'] = $occ_rw['occupancy_asdate_owners'] + $occ_rw['occupancy_asdate_tenants'];
				
			 } 
			 else{
			    $occres_res[$kk]['occupency'] = "0";
			 }
			 
		} 
		
		
			 
			 //exit;
			  $matchdatafields = ['month' => $segment4, 'year' => $segment3]; 

		$res_data_count = \App\Cmdmisdatareport::where($matchdatafields)->count();
		$cmddata= array();
		if($res_data_count > 0){
		
			$cmddata = \App\Cmdmisdatareport::where($matchdatafields)->first();
	    }
			
			$relations = [  
			'res' => $formfieldarray, 
			'sites' => $siteattrname,
			'flats' => $flatres,
			'cmdkva' => $cmdkva,
			'transforkva' => $transforkva,
			'dg_kva' => $dg_kva,
			'service_numb' => $service_numb,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			'cost' => $existing_Rates,
			'occupency' => $occres_res, 
			'backup' => $backup, 
			'cmddata' => $cmddata,
			];    

		     return view('audit.auditdetail.pmstemplate.pmsa21template', $relations);
	
	}
	
	
	 public function pmsa22()

    { 	
	
	      if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		   $sitearea = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('built_up_area', 'id');
		  $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
			$sitearea = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('built_up_area', 'id');
			$validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
			
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		     $garres = array();
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $startdate)
				->where('reporton', '<=', $today)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $startdate)
				->where('reporton', '<=', $today)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			 $farrres = array();
			 $paymentsArray = array();
			foreach ($results as $kk => $client) {
			   $pwrfailure = 0;
			  if (count($client) > 0)
			    foreach ($client as $tt){
				   $pwrfailure = $pwrfailure + (float)$tt->clbhous_pwr_units;
					 //$rdate = date("d-m-Y", strtotime($tt->reporton));
					 $grab_val = $tt->housekp_debr_garbage; 
									$resrow = array();
									$resrow['site'] = $siteattrname[$kk];
									//$resrow['area'] = $sitearea->built_up_area;
									$resrow['sumit_date'] = date("F j, Y, g:i a",strtotime($tt['created_at']));
									$resrow['report_on'] =  date("d-m-Y", strtotime($tt->reporton)); 
						 $paymentsArray[] =  $resrow;
				} 
				$pwrcon = 0;
				  if((float)($sitearea[$kk] > 0)){ 
				 
				 $pwrcon =  (float)($pwrfailure/(float)$sitearea[$kk]);
				 }
				$farrres[] = array('site'=>$siteattrname[$kk],'pwrunits'=>$pwrfailure,'caldate'=>$cur_year,'area'=>$sitearea[$kk],'pwrconsumptio'=>$pwrcon);
			}  
		
		$paymentsArray = $farrres;
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			'garbageresult' => $paymentsArray,
			'validkva' => $validkva,
			]; 
			
		// return view('audit.auditdetail.pmsa1', $relations);
		 return view('audit.auditdetail.pmsa22', $relations);

    }  
	
	
		public function getpowervalues(Request $request)
    { 	
	  $year = $request->year;
	  $month = $request->month;
	  $site = $request->site;
	  
	  if($site == ""){
	  
	    if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		   $sitearea = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('built_up_area', 'id');
		  $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
			$sitearea = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('built_up_area', 'id');
			$validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }
		  } 
		    else {
			
			if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		   $sitearea = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('built_up_area', 'id');
		  $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
			$sitearea = \App\Sites::where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('built_up_area', 'id');
			$validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  } 
			
			  
			}   
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		     $garres = array();
			$results = array();
			    $cur_year = $year;
			    $cur_month = $month;
			    $startdate = $cur_year."-".$cur_month."-"."01";
			     $today = date("Y-m-t",strtotime($startdate));
				
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $startdate)
				->where('reporton', '<=', $today)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $startdate)
				->where('reporton', '<=', $today)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			 $farrres = array();
			 $paymentsArray = array();
			foreach ($results as $kk => $client) {
			   $pwrfailure = 0;
			  if (count($client) > 0)
			    foreach ($client as $tt){
				   $pwrfailure = $pwrfailure + (float)$tt->clbhous_pwr_units;				   
					 //$rdate = date("d-m-Y", strtotime($tt->reporton));
					 $grab_val = $tt->housekp_debr_garbage; 
									$resrow = array();
									$resrow['site'] = $siteattrname[$kk];
									//$resrow['area'] = $sitearea->built_up_area;
									$resrow['sumit_date'] = date("F j, Y, g:i a",strtotime($tt['created_at']));
									$resrow['report_on'] =  date("d-m-Y", strtotime($tt->reporton)); 
						 $paymentsArray[] =  $resrow;
				} 
				$pwrcon = 0;
				  if((float)($sitearea[$kk] > 0)){ 
				 
				 $pwrcon =  (float)($pwrfailure/(float)$sitearea[$kk]);
				 }
				 $matchfields = ['site' => $kk];				   
				 $res_row = \App\Siteclubhouse::where($matchfields)->first();				 
				 if($res_row) $area = $res_row->cbharea;
				 else $area = "";					   
				$farrres[] = array('site'=>$siteattrname[$kk],'pwrunits'=> number_format($pwrfailure,2),'caldate'=>date("F Y", strtotime($tt->reporton)),'area'=>$area,'pwrconsumptio'=>$pwrcon);
			}  
		
		$paymentsArray = $farrres;
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			'garbageresult' => $paymentsArray,
			'validkva' => $validkva,
			]; 
			
		 return view('audit.auditdetail.pmstemplate.pmsa22template', $relations);
  
    }
	
	
	
		public function getpowerauditreportsexport(Request $request)
    { 	
	  $year = $request->year;
	  $month = $request->month;
	  $site = $request->site;
	  
	  if($site == ""){
	  
	    if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		   $sitearea = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('built_up_area', 'id');
		  $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
			$sitearea = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('built_up_area', 'id');
			$validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }
		  } 
		    else {
			
			if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		   $sitearea = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('built_up_area', 'id');
		  $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
			$sitearea = \App\Sites::where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('built_up_area', 'id');
			$validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  } 
			
			  
			}   
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		     $garres = array();
			$results = array();
			    $cur_year = $year;
			    $cur_month = $month;
			    $startdate = $cur_year."-".$cur_month."-"."01";
			     $today = date("Y-m-t",strtotime($startdate));
				
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Pmsdailyreport::
				where('reporton', '>=', $startdate)
				->where('reporton', '<=', $today)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Pmsdailyreport::
				where('reporton', '>=', $startdate)
				->where('reporton', '<=', $today)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			 $farrres = array();
			 $farrres[] = ['Project Name', 'Club House Area( sft)', 'Calnder Month', 'Total Power consumption','Power consumption per sft'];		
			 $paymentsArray = array();
			foreach ($results as $kk => $client) {
			   $pwrfailure = 0;
			  if (count($client) > 0)
			    foreach ($client as $tt){
				   $pwrfailure = $pwrfailure + (float)$tt->clbhous_pwr_units;
					 //$rdate = date("d-m-Y", strtotime($tt->reporton));
					 $grab_val = $tt->housekp_debr_garbage; 
									$resrow = array();
									$resrow['site'] = $siteattrname[$kk];
									//$resrow['area'] = $sitearea->built_up_area;
									$resrow['sumit_date'] = date("F j, Y, g:i a",strtotime($tt['created_at']));
									$resrow['report_on'] =  date("d-m-Y", strtotime($tt->reporton)); 
						 $paymentsArray[] =  $resrow;
				} 
				$pwrcon = 0;
				  if((float)($sitearea[$kk] > 0)){ 
				 
				 $pwrcon =  (float)($pwrfailure/(float)$sitearea[$kk]);
				 }
				 $matchfields = ['site' => $kk];				   
				 $res_row = \App\Siteclubhouse::where($matchfields)->first();				 
				 if($res_row) $area = $res_row->cbharea;
				 else $area = "";					   
				$farrres[] = array('site'=>$siteattrname[$kk],'area'=>$area,'caldate'=>date("F Y", strtotime($tt->reporton)),'pwrunits'=>number_format($pwrfailure,2),'pwrconsumptio'=>$pwrcon);
			}  
		
		$paymentsArray = $farrres;
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			'garbageresult' => $paymentsArray,
			'validkva' => $validkva,
			]; 
			
					// Generate and return the spreadsheet
       Excel::create('Power', function($excel) use ($paymentsArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('Power');
        $excel->setCreator('Laravel')->setCompany('Aparna');
        $excel->setDescription('Power  file');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($paymentsArray) {
            $sheet->fromArray($paymentsArray, null, 'A1', false, false);
        });

    })->download('xlsx');
			
		 
  
    }
	
	
	
	 public function pmsa24()
  
    { 	
	
	      if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		   $sitearea = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('built_up_area', 'id');
		  $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
			$sitearea = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('built_up_area', 'id');
			$validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		     $garres = array();
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = AuditApnaComplaint::
				where('year', '=', $cur_year)
				->where('month', '=', $cur_month)
				->where('escalation_level', '=','L2')
				->orWhere('escalation_level', '=', 'L3')
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = AuditApnaComplaint::
				where('year', '=', $cur_year)
				->where('month', '=', $cur_month)
				->where('escalation_level', '=', 'L2')
				->orWhere('escalation_level', '=', 'L3')
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			
			 $farrres = array();
			 $paymentsArray = array();
			 $paymentsArray = $results;
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			'garbageresult' => $paymentsArray,
			'validkva' => $validkva,
			]; 
			
		// return view('audit.auditdetail.pmsa1', $relations);
		 return view('audit.auditdetail.pmsa24', $relations);

    }  
	
	
	
		 public function pmsa25()
  
    { 	
	
	      if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		   $sitearea = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('built_up_area', 'id');
		  $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
			$sitearea = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('built_up_area', 'id');
			$validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		     $garres = array();
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = AuditApnaComplaint::
				where('year', '=', $cur_year)
				->where('month', '=', $cur_month)
				->where('escalation_level', '=','L2')
				->orWhere('escalation_level', '=', 'L3')
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = AuditApnaComplaint::
				where('year', '=', $cur_year)
				->where('month', '=', $cur_month)
				->where('escalation_level', '=', 'L2')
				->orWhere('escalation_level', '=', 'L3')
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			
			 $farrres = array();
			 $paymentsArray = array();
			 $paymentsArray = $results;
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			'garbageresult' => $paymentsArray,
			'validkva' => $validkva,
			]; 
			
		// return view('audit.auditdetail.pmsa1', $relations);
		 return view('audit.auditdetail.pmsa25', $relations);

    }  
	
	
	
		 public function pmsa26()

       { 	
	
	      if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $sitearea = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('built_up_area', 'id');
		  $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
			$sitearea = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('built_up_area', 'id');
			$validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>";*/ 
		     $garres = array();
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			    $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
			  // echo "<br>";
				$audit_cn = AuditHrmanageUpload::
				where('date', '>=', $startdate)
				->where('date', '<=', $today)
				->where('site', '=', $kk)
				->count();
				$audit_cn = AuditHrmanageUpload::
				where('site', '=', $kk)
				->count(); 
				//echo "testest".$audit_cn."tetete";
			   if($audit_cn > 0){
			    $audit_res = AuditHrmanageUpload::
				where('date', '>=', $startdate)
				->where('date', '<=', $today)
				->where('site', '=', $kk)
				->get();
				DB::enableQueryLog();
				//echo $audit_res->toSql();
			   $results[$kk] = $audit_res;
			   }
			}  
			      
			/*echo "<pre>";
			   print_r($results);
			echo "</pre>";
			
			exit; */  
			
			 $farrres = array();
			 $paymentsArray = array();
			foreach ($results as $kk => $client) {
			   $pwrfailure = 0;
			  if (count($client) > 0)
			    foreach ($client as $tt){
				   $pwrfailure = $pwrfailure + (float)$tt->clbhous_pwr_units;
					 //$rdate = date("d-m-Y", strtotime($tt->reporton));
					 $grab_val = $tt->housekp_debr_garbage; 
									$resrow = array();
									$resrow['site'] = $siteattrname[$kk];
									//$resrow['area'] = $sitearea->built_up_area;
									$resrow['sumit_date'] = date("F j, Y, g:i a",strtotime($tt['created_at']));
									$resrow['report_on'] =  date("d-m-Y", strtotime($tt->reporton)); 
						 $paymentsArray[] =  $resrow;
				} 
				$pwrcon = 0;
				  if((float)($sitearea[$kk] > 0)){ 
				 
				 $pwrcon =  (float)($pwrfailure/(float)$sitearea[$kk]);
				 }
				$farrres[] = array('site'=>$siteattrname[$kk],'pwrunits'=>$pwrfailure,'caldate'=>$cur_year,'area'=>$sitearea[$kk],'pwrconsumptio'=>$pwrcon);
			}  
		
		$paymentsArray = $farrres;
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			'garbageresult' => $paymentsArray,
			'validkva' => $validkva,
			]; 
			
		// return view('audit.auditdetail.pmsa1', $relations);
		 return view('audit.auditdetail.pmsa26', $relations);

    }  
	
	
	 public function securitya1()

    { 	
	     if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
			$validkva = \App\Dailyreportvalidation::get()->pluck('cmd_in_kva', 'site');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Securitydailyreport::
				where('reporton', '>=', $startdate)
				->where('reporton', '<=', $today)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Securitydailyreport::
				where('reporton', '>=', $startdate)
				->where('reporton', '<=', $today)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			 
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			'validkva' => $validkva,
			];   
			
		 return view('audit.auditdetail.securitya1', $relations);
		// return view('audit.auditdetail.securitya1');

    }  
	
	
	   public function getsecdarauditreports(Request $request)
    { 	
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Securitydailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Securitydailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Securitydailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Securitydailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];   
			
		 return view('audit.auditdetail.securitytemplate.securitya1template', $relations);
 
    }  
	
	
 public function getsecdarauditreportsexport(Request $request)
    { 	
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Securitydailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Securitydailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_cn = Securitydailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->count();
			   if($audit_cn > 0){
			    $audit_res = Securitydailyreport::
				where('reporton', '>=', $fromdate)
				->where('reporton', '<=', $todate)
				->where('site', '=', $kk)
				->orderBy('reporton', 'ASC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			   }
			}
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];   
			
		$paymentsArray = array();
			$paymentsArray[] = ['Site', 'Category', 'Date', 'Report Date','Status'];			
			if(count($results) > 0) {
			  foreach ($results as $kk => $client) {
                  if (count($client) > 0) {
                      foreach ($client as $tt){
					          $rdate = date("d-m-Y", strtotime($tt->reporton)); 
							    $checkval = checkDailyStatus($rdate, $kk);
								 if($checkval[0] == 'yes'){ } else {
									$resrow = array();
									$resrow['site'] = $siteattrname[$kk];
									 $resrow['category'] = "Security";
									 $resrow['sumit_date'] = date("F j, Y, g:i a",strtotime($tt['created_at']));
									$resrow['report_on'] =  date("d-m-Y", strtotime($tt->reporton)); 
									$rdate = date("d-m-Y", strtotime($tt->reporton));
									$checkval = checkDailyStatus($rdate, $kk);
									if($checkval[0] == 'yes'){ 
						   if($tt->blockflag == 1) { 
						   	$resrow['status'] = "DAR Submitted with Delay";
						   }
						    else{
							   	$resrow['status'] = "DAR Submitted";
							}
						 } else {
						  	$resrow['status'] = "DAR Not Submitted";
						 }
						 
						 
						 $paymentsArray[] =  $resrow;
								
						      }
					     }
					   }
					 }
			}	
	
	// Generate and return the spreadsheet
    Excel::create('SECURITY_DAR_SUBMISSION', function($excel) use ($paymentsArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('SECURITY_DAR_SUBMISSION');
        $excel->setCreator('Laravel')->setCompany('Aparna');
        $excel->setDescription('securitydarsubmission file');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($paymentsArray) {
            $sheet->fromArray($paymentsArray, null, 'A1', false, false);
        });

    })->download('xlsx');
 
    }  
	
	public function securitya2()

    { 	
	     if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  } 
			 
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			];   
			
		 return view('audit.auditdetail.securitya2', $relations);
		// return view('audit.auditdetail.securitya1');

    }  
	
	
	public function getsecuritywicauditreports(Request $request)
    { 	

	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		 $todate = date("Y-m-d", strtotime($to_date));
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				//DB::enableQueryLog();
				$query_eqp = "select * from `securitydailyreports` where `site` in (".$kk.") and (`reporton` BETWEEN '".$fromdate."' AND '".$todate."') and(`aw_maid`>0 or `aw_dri`>0 or `aw_ven`>0 or `aw_cons_workers`>0 or `aw_inte`>0 or `aw_others`>0) and `securitydailyreports`.`deleted_at` is null";
				$audit_res = DB::select($query_eqp);			
			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);

			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$query_eqp = "select * from `securitydailyreports` where `site` in (".$kk.") and (`reporton` BETWEEN '".$fromdate."' AND '".$todate."') and(`aw_maid`>0 or `aw_dri`>0 or `aw_ven`>0 or `aw_cons_workers`>0 or `aw_inte`>0 or `aw_others`>0) and `securitydailyreports`.`deleted_at` is null";
				$audit_res = DB::select($query_eqp);			
			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			   }
			}
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];   
			
		 return view('audit.auditdetail.securitytemplate.securitya2template', $relations);
 
    }  



    public function getsecuritywicauditreportexport(Request $request)
    { 	
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$query_eqp = "select * from `securitydailyreports` where `site` in (".$kk.") and (`reporton` BETWEEN '".$fromdate."' AND '".$todate."') and(`aw_maid`>0 or `aw_dri`>0 or `aw_ven`>0 or `aw_cons_workers`>0 or `aw_inte`>0 or `aw_others`>0) and `securitydailyreports`.`deleted_at` is null";
				$audit_res = DB::select($query_eqp);			
			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    

		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$query_eqp = "select * from `securitydailyreports` where `site` in (".$kk.") and (`reporton` BETWEEN '".$fromdate."' AND '".$todate."') and(`aw_maid`>0 or `aw_dri`>0 or `aw_ven`>0 or `aw_cons_workers`>0 or `aw_inte`>0 or `aw_others`>0) and `securitydailyreports`.`deleted_at` is null";
				$audit_res = DB::select($query_eqp);			
			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			   }
			}
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];   
			
		//echo '<pre>'; print_r($results); echo '</pre>';
		$paymentsArray = array();
		$paymentsArray[] = ['S.No', 'Site', 'Date', 'Maids', 'Drivers','Vendors','Construction Workers','Interiors','Others'];
		 $i = 1;
		 if (count($results) > 0) {
			 foreach ($results as $kk => $client) {
		 		if (count($client) > 0) {
					foreach ($client as $tt) {
						$resrow = array();
		 				$resrow['sno'] = $i;
					    $resrow['site'] = $siteattrname[$kk];
					    $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
					    $rdate = date("d-m-Y", strtotime($tt->reporton));
					    $checkval = checkDailyStatus($rdate, $kk);
					    $resrow['maid'] =  $tt->aw_maid;
					    $resrow['dri'] =  $tt->aw_dri;
					    $resrow['ven'] =  $tt->aw_ven;
					    $resrow['workers'] =  $tt->aw_cons_workers;
					    $resrow['inte'] =  $tt->aw_inte;
					    $resrow['others'] =  $tt->aw_others;
					    $i = $i + 1; 
					    $paymentsArray[] =  $resrow;
					}
				}
			}
		}
			

	// Generate and return the spreadsheet
    Excel::create('Security_Allowedwithoutidcards_Submission', function($excel) use ($paymentsArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('Security_Allowedwithoutidcards_Submission');
        $excel->setCreator('Laravel')->setCompany('Aparna');
        $excel->setDescription('securitywithoutidcardssubmission file');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($paymentsArray) {
            $sheet->fromArray($paymentsArray, null, 'A1', false, false);
        });

    })->download('xlsx');
 
    } 

 
	
	public function securitya3()

    { 	
	     if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  } 
			 
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			];   
			
		 return view('audit.auditdetail.securitya3', $relations);
		// return view('audit.auditdetail.securitya1');

    }  
	
	
	public function getsecuritynwtauditreports(Request $request)
    { 	

	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		 $todate = date("Y-m-d", strtotime($to_date));
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){

				$audit_res =  Securitydailyreport::select('securitydailyreports.*', 'securitydailyreportvalidations.*')
				->leftJoin('securitydailyreportvalidations','securitydailyreportvalidations.site','=','securitydailyreports.site')
				->where('securitydailyreports.reporton','>=',$fromdate)
				->where('securitydailyreports.reporton','<=',$today)
				->where('securitydailyreports.site','=',$kk)
				->whereNull('securitydailyreports.deleted_at')
				->groupBy('securitydailyreports.id')->get();


			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);

			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			  
				$audit_res =  Securitydailyreport::select('securitydailyreports.*', 'securitydailyreportvalidations.*')
				->leftJoin('securitydailyreportvalidations','securitydailyreportvalidations.site','=','securitydailyreports.site')
				->where('securitydailyreports.reporton','>=',$fromdate)
				->where('securitydailyreports.reporton','<=',$today)
				->where('securitydailyreports.site','=',$kk)
				->whereNull('securitydailyreports.deleted_at')
				->groupBy('securitydailyreports.id')->get();

			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			   }
			}
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];   

			
		 return view('audit.auditdetail.securitytemplate.securitya3template', $relations);
 
    } 



    public function getsecuritynwtauditreportexport(Request $request)
    { 	
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_res =  Securitydailyreport::select('securitydailyreports.*', 'securitydailyreportvalidations.*')
				->leftJoin('securitydailyreportvalidations','securitydailyreportvalidations.site','=','securitydailyreports.site')
				->where('securitydailyreports.reporton','>=',$fromdate)
				->where('securitydailyreports.reporton','<=',$today)
				->where('securitydailyreports.site','=',$kk)
				->whereNull('securitydailyreports.deleted_at')
				->groupBy('securitydailyreports.id')->get();

			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    

		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_res =  Securitydailyreport::select('securitydailyreports.*', 'securitydailyreportvalidations.*')
				->leftJoin('securitydailyreportvalidations','securitydailyreportvalidations.site','=','securitydailyreports.site')
				->where('securitydailyreports.reporton','>=',$fromdate)
				->where('securitydailyreports.reporton','<=',$today)
				->where('securitydailyreports.site','=',$kk)
				->whereNull('securitydailyreports.deleted_at')
				->groupBy('securitydailyreports.id')->get();

			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			   }
			}
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];   
			
		//echo '<pre>'; print_r($results); echo '</pre>';
		$paymentsArray = array();
		$paymentsArray[] = ['S.No', 'Site', 'Date', 'CCTV', 'Boom.B','W.T','Torches','Bio.M.'];
		 $i = 1;
		 if (count($results) > 0) {
			 foreach ($results as $kk => $client) {
		 		if (count($client) > 0) {
					foreach ($client as $tt) {
						$resrow = array();
		 				$resrow['sno'] = $i;
					    $resrow['site'] = $siteattrname[$kk];
					    $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
					    $rdate = date("d-m-Y", strtotime($tt->reporton));
					    $checkval = checkDailyStatus($rdate, $kk);
					    if(isset($tt->nw_cctv) && $tt->nw_cctv>0){
					    	$ccres = ltrim($tt->nw_cctv, '0');
					    } else $ccres = '0';
					    if(isset($tt->cctv)) $ccres .= "/ ". $tt->cctv;
					    $resrow['cctv'] =  $ccres;
					    if(isset($tt->nw_cctv) && $tt->nw_boom>0){
					    	$boomres = ltrim($tt->nw_boom, '0');
					    } else $boomres = '0';
					    if(isset($tt->cctv)) $boomres .= "/ ". $tt->boombarrier;
					    $resrow['boom'] =  $boomres;
					    if(isset($tt->nw_wt) && $tt->nw_wt>0){
					    	$wtres = ltrim($tt->nw_wt, '0');
					    } else $wtres = '0';
					    if(isset($tt->wt)) $wtres .= "/ ". $tt->wt;
					    $resrow['wt'] =  $wtres;
					    if(isset($tt->nw_torch) && $tt->nw_torch>0){
					    	$torchres = ltrim($tt->nw_torch, '0');
					    } else $torchres = '0';
					    if(isset($tt->torches)) $torchres .= "/ ". $tt->torches;
					    $resrow['torch'] =  $torchres;
					    if(isset($tt->nw_bio) && $tt->nw_bio>0){
					    	$biochres = ltrim($tt->nw_bio, '0');
					    } else $biochres = '0';
					    if(isset($tt->biomachine)) $biochres .= "/ ". $tt->biomachine;
					    $resrow['bio'] =  $biochres;
					    $i = $i + 1; 
					    $paymentsArray[] =  $resrow;
					}
				}
			}
		}
			

	// Generate and return the spreadsheet
    Excel::create('Security_Notworkingtotalnos_Submission', function($excel) use ($paymentsArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('Security_Notworkingtotalnos_Submission');
        $excel->setCreator('Laravel')->setCompany('Aparna');
        $excel->setDescription('securitysolarnotworkingtotalnosubmission file');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($paymentsArray) {
            $sheet->fromArray($paymentsArray, null, 'A1', false, false);
        });

    })->download('xlsx');
 
    } 

	
	public function securitya4()

    { 	
	     if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  } 
			 
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			];   
			
		 return view('audit.auditdetail.securitya4', $relations);
		// return view('audit.auditdetail.securitya1');

    }  
	
	
	public function getsecurityanauditreports(Request $request)
    { 	

	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		 $todate = date("Y-m-d", strtotime($to_date));
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){

				$audit_res =  Securitydailyreport::select('securitydailyreports.*', 'securitydailyreportvalidations.*')
				->leftJoin('securitydailyreportvalidations','securitydailyreportvalidations.site','=','securitydailyreports.site')
				->where('securitydailyreports.reporton','>=',$fromdate)
				->where('securitydailyreports.reporton','<=',$today)
				->where('securitydailyreports.site','=',$kk)
				->whereNull('securitydailyreports.deleted_at')
				->groupBy('securitydailyreports.id')->get();


			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);

			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			  
				$audit_res =  Securitydailyreport::select('securitydailyreports.*', 'securitydailyreportvalidations.*')
				->leftJoin('securitydailyreportvalidations','securitydailyreportvalidations.site','=','securitydailyreports.site')
				->where('securitydailyreports.reporton','>=',$fromdate)
				->where('securitydailyreports.reporton','<=',$today)
				->where('securitydailyreports.site','=',$kk)
				->whereNull('securitydailyreports.deleted_at')
				->groupBy('securitydailyreports.id')->get();

			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			   }
			}
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];   

			
		 return view('audit.auditdetail.securitytemplate.securitya4template', $relations);
 
    } 



    public function getsecurityanauditreportexport(Request $request)
    { 	
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_res =  Securitydailyreport::select('securitydailyreports.*', 'securitydailyreportvalidations.*')
				->leftJoin('securitydailyreportvalidations','securitydailyreportvalidations.site','=','securitydailyreports.site')
				->where('securitydailyreports.reporton','>=',$fromdate)
				->where('securitydailyreports.reporton','<=',$today)
				->where('securitydailyreports.site','=',$kk)
				->whereNull('securitydailyreports.deleted_at')
				->groupBy('securitydailyreports.id')->get();

			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    

		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$audit_res =  Securitydailyreport::select('securitydailyreports.*', 'securitydailyreportvalidations.*')
				->leftJoin('securitydailyreportvalidations','securitydailyreportvalidations.site','=','securitydailyreports.site')
				->where('securitydailyreports.reporton','>=',$fromdate)
				->where('securitydailyreports.reporton','<=',$today)
				->where('securitydailyreports.site','=',$kk)
				->whereNull('securitydailyreports.deleted_at')
				->groupBy('securitydailyreports.id')->get();

			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			   }
			}
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];   
			
		//echo '<pre>'; print_r($results); echo '</pre>';
		$paymentsArray = array();
		$paymentsArray[] = ['S.No', 'Site', 'Date', 'Tabs', 'Whistles','Batons','Rain.C','Umbrellas'];
		 $i = 1;
		 if (count($results) > 0) {
			 foreach ($results as $kk => $client) {
		 		if (count($client) > 0) {
					foreach ($client as $tt) {
						$resrow = array();
		 				$resrow['sno'] = $i;
					    $resrow['site'] = $siteattrname[$kk];
					    $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
					    $rdate = date("d-m-Y", strtotime($tt->reporton));
					    $checkval = checkDailyStatus($rdate, $kk);
					    if(isset($tt->av_tab) && $tt->av_tab>0){
					    	$tabres = ltrim($tt->av_tab, '0');
					    } else $tabres = '0';
					    if(isset($tt->av_tabs)) $tabres .= "/ ". $tt->av_tabs;
					    $resrow['tabs'] =  $tabres;
					    if(isset($tt->av_whi) && $tt->av_whi>0){
					    	$whis = ltrim($tt->av_whi, '0');
					    } else $whis = '0';
					    if(isset($tt->av_whistles)) $whis .= "/ ". $tt->av_whistles;
					    $resrow['whis'] =  $whis;
					    if(isset($tt->av_bat) && $tt->av_bat>0){
					    	$batons = ltrim($tt->av_bat, '0');
					    } else $batons = '0';
					    if(isset($tt->av_batons)) $batons .= "/ ". $tt->av_batons;
					    $resrow['batons'] =  $batons;
					    if(isset($tt->av_rai) && $tt->av_rai>0){
					    	$rains = ltrim($tt->av_rai, '0');
					    } else $rains = '0';
					    if(isset($tt->av_rain_c)) $rains .= "/ ". $tt->av_rain_c;
					    $resrow['rains'] =  $rains;
					    if(isset($tt->av_umb) && $tt->av_umb>0){
					    	$umbrellas = ltrim($tt->av_umb, '0');
					    } else $umbrellas = '0';
					    if(isset($tt->av_umbrellas)) $umbrellas .= "/ ". $tt->av_umbrellas;
					    $resrow['umbrellas'] =  $umbrellas;
					    $i = $i + 1; 
					    $paymentsArray[] =  $resrow;
					}
				}
			}
		}
			

	// Generate and return the spreadsheet
    Excel::create('Security_Availablenos_Submission', function($excel) use ($paymentsArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('Security_Availablenos_Submission');
        $excel->setCreator('Laravel')->setCompany('Aparna');
        $excel->setDescription('securityavailablenossubmission file');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($paymentsArray) {
            $sheet->fromArray($paymentsArray, null, 'A1', false, false);
        });

    })->download('xlsx');
 
    }

    public function securitya5()

    { 	
	     if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  } 
			 
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			];   
			
		 return view('audit.auditdetail.securitya5', $relations);
		// return view('audit.auditdetail.securitya1');

    }  
	
	
	public function getsecuritysfwsauditreports(Request $request)
    { 	

	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		 $todate = date("Y-m-d", strtotime($to_date));
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				//DB::enableQueryLog();
				$query_eqp = "select * from `securitydailyreports` where `site` in (".$kk.") and (`reporton` BETWEEN '".$fromdate."' AND '".$todate."') and(`sf_zone1`='Not Working' or `sf_zone2`='Not Working' or `sf_zone3`='Not Working' or `sf_zone4`>0 or `sf_tkit`>0) and `securitydailyreports`.`deleted_at` is null";
				$audit_res = DB::select($query_eqp);			
			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);

			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$query_eqp = "select * from `securitydailyreports` where `site` in (".$kk.") and (`reporton` BETWEEN '".$fromdate."' AND '".$todate."') and(`sf_zone1`='Not Working' or `sf_zone2`='Not Working' or `sf_zone3`='Not Working' or `sf_zone4`>0 or `sf_tkit`>0) and `securitydailyreports`.`deleted_at` is null";
				$audit_res = DB::select($query_eqp);			
			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			   }
			}
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];   
			
		 return view('audit.auditdetail.securitytemplate.securitya5template', $relations);
 
 }  	
 
 public function getsecuritysfwsauditreportexport(Request $request)
    { 	
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$query_eqp = "select * from `securitydailyreports` where `site` in (".$kk.") and (`reporton` BETWEEN '".$fromdate."' AND '".$todate."') and(`sf_zone1`='Not Working' or `sf_zone2`='Not Working' or `sf_zone3`='Not Working' or `sf_zone4`>0 or `sf_tkit`>0) and `securitydailyreports`.`deleted_at` is null";
				$audit_res = DB::select($query_eqp);			
			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    

		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$query_eqp = "select * from `securitydailyreports` where `site` in (".$kk.") and (`reporton` BETWEEN '".$fromdate."' AND '".$todate."') and(`sf_zone1`='Not Working' or `sf_zone2`='Not Working' or `sf_zone3`='Not Working' or `sf_zone4`>0 or `sf_tkit`>0) and `securitydailyreports`.`deleted_at` is null";
				$audit_res = DB::select($query_eqp);			
			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			   }
			}
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];   
			
		//echo '<pre>'; print_r($results); echo '</pre>';
		$paymentsArray = array();
		$paymentsArray[] = ['S.No', 'Site', 'Date', 'Zone1', 'Zone2','Zone3','Zone4','T.Kit'];
		 $i = 1;
		 if (count($results) > 0) {
			 foreach ($results as $kk => $client) {
		 		if (count($client) > 0) {
					foreach ($client as $tt) {
						$resrow = array();
		 				$resrow['sno'] = $i;
					    $resrow['site'] = $siteattrname[$kk];
					    $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
					    $rdate = date("d-m-Y", strtotime($tt->reporton));
					    $checkval = checkDailyStatus($rdate, $kk);
					    $resrow['zone1'] =  $tt->sf_zone1;
					    $resrow['zone2'] =  $tt->sf_zone2;
					    $resrow['zone3'] =  $tt->sf_zone3;
					    $resrow['zone4'] =  $tt->sf_zone4;
					    $resrow['tkit'] =  $tt->sf_tkit;
					    $i = $i + 1; 
					    $paymentsArray[] =  $resrow;
					}
				}
			}
		}
			

	// Generate and return the spreadsheet
    Excel::create('Security_Solar_Fencing_Working_Submission', function($excel) use ($paymentsArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('Security_Solar_Fencing_Working_Submission');
        $excel->setCreator('Laravel')->setCompany('Aparna');
        $excel->setDescription('securitysolarfencingworkingstatusssubmission file');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($paymentsArray) {
            $sheet->fromArray($paymentsArray, null, 'A1', false, false);
        });

    })->download('xlsx');
 
    } 

	public function securitya6()

    { 	
	     if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  } 
			 
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			];   
			
		 return view('audit.auditdetail.securitya6', $relations);
		// return view('audit.auditdetail.securitya1');

    }  
	
	
	public function getsecuritydspauditreports(Request $request)
    { 	

	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		 $todate = date("Y-m-d", strtotime($to_date));
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				//DB::enableQueryLog();
				$query_eqp = "select * from `securitydailyreports` where `site` in (".$kk.") and (`reporton` BETWEEN '".$fromdate."' AND '".$todate."') and `securitydailyreports`.`deleted_at` is null";
				$audit_res = DB::select($query_eqp);			
			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);

			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$query_eqp = "select * from `securitydailyreports` where `site` in (".$kk.") and (`reporton` BETWEEN '".$fromdate."' AND '".$todate."') and `securitydailyreports`.`deleted_at` is null";
				$audit_res = DB::select($query_eqp);			
			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			   }
			}
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];   
			
		 return view('audit.auditdetail.securitytemplate.securitya6template', $relations);
 
 }  	
 
 public function getsecuritydspauditreportexport(Request $request)
    { 	
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$query_eqp = "select * from `securitydailyreports` where `site` in (".$kk.") and (`reporton` BETWEEN '".$fromdate."' AND '".$todate."') and `securitydailyreports`.`deleted_at` is null";
				$audit_res = DB::select($query_eqp);			
			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    

		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$query_eqp = "select * from `securitydailyreports` where `site` in (".$kk.") and (`reporton` BETWEEN '".$fromdate."' AND '".$todate."') and `securitydailyreports`.`deleted_at` is null";
				$audit_res = DB::select($query_eqp);			
			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			   }
			}
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];   
			
		//echo '<pre>'; print_r($results); echo '</pre>';
		$paymentsArray = array();
		$paymentsArray[] = ['S.No', 'Site', 'Date', 'Data Sheet Pending'];
		 $i = 1;
		 if (count($results) > 0) {
			 foreach ($results as $kk => $client) {
		 		if (count($client) > 0) {
					foreach ($client as $tt) {
						$resrow = array();
		 				$resrow['sno'] = $i;
					    $resrow['site'] = $siteattrname[$kk];
					    $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
					    $rdate = date("d-m-Y", strtotime($tt->reporton));
					    $checkval = checkDailyStatus($rdate, $kk);
					    $resrow['bchk'] =  $tt->ds_pending;
					    $i = $i + 1; 
					    $paymentsArray[] =  $resrow;
					}
				}
			}
		}
			

	// Generate and return the spreadsheet
    Excel::create('Security_DateSheetsPending', function($excel) use ($paymentsArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('Security_DateSheetsPending');
        $excel->setCreator('Laravel')->setCompany('Aparna');
        $excel->setDescription('securitydatesheetspendingfile');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($paymentsArray) {
            $sheet->fromArray($paymentsArray, null, 'A1', false, false);
        });

    })->download('xlsx');
 
    } 
	
	public function securitya7()

    { 	
		 return view('audit.auditdetail.securitya7');

    }  
	public function securitya8()

    { 	
	     if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  } 
			 
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			];   
			
		 return view('audit.auditdetail.securitya8', $relations);
		// return view('audit.auditdetail.securitya1');

    }  
	
	
	public function getsecuritynbcauditreports(Request $request)
    { 	

	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		 $todate = date("Y-m-d", strtotime($to_date));
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				//DB::enableQueryLog();
				$query_eqp = "select * from `securitydailyreports` where `site` in (".$kk.") and (`reporton` BETWEEN '".$fromdate."' AND '".$todate."') and `securitydailyreports`.`deleted_at` is null";
				$audit_res = DB::select($query_eqp);			
			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);

			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$query_eqp = "select * from `securitydailyreports` where `site` in (".$kk.") and (`reporton` BETWEEN '".$fromdate."' AND '".$todate."') and `securitydailyreports`.`deleted_at` is null";
				$audit_res = DB::select($query_eqp);			
			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			   }
			}
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];   
			
		 return view('audit.auditdetail.securitytemplate.securitya8template', $relations);
 
 }  	
 
 public function getsecuritynbcauditreportexport(Request $request)
    { 	
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$query_eqp = "select * from `securitydailyreports` where `site` in (".$kk.") and (`reporton` BETWEEN '".$fromdate."' AND '".$todate."') and `securitydailyreports`.`deleted_at` is null";
				$audit_res = DB::select($query_eqp);			
			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    

		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$query_eqp = "select * from `securitydailyreports` where `site` in (".$kk.") and (`reporton` BETWEEN '".$fromdate."' AND '".$todate."') and `securitydailyreports`.`deleted_at` is null";
				$audit_res = DB::select($query_eqp);			
			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			   }
			}
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];   
			
		//echo '<pre>'; print_r($results); echo '</pre>';
		$paymentsArray = array();
		$paymentsArray[] = ['S.No', 'Site', 'Date', 'Night Bio Checked'];
		 $i = 1;
		 if (count($results) > 0) {
			 foreach ($results as $kk => $client) {
		 		if (count($client) > 0) {
					foreach ($client as $tt) {
						$resrow = array();
		 				$resrow['sno'] = $i;
					    $resrow['site'] = $siteattrname[$kk];
					    $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
					    $rdate = date("d-m-Y", strtotime($tt->reporton));
					    $checkval = checkDailyStatus($rdate, $kk);
					    $resrow['bchk'] =  $tt->nbc_chk;
					    $i = $i + 1; 
					    $paymentsArray[] =  $resrow;
					}
				}
			}
		}
			

	// Generate and return the spreadsheet
    Excel::create('Security_Night_Bio_Checked', function($excel) use ($paymentsArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('Security_Night_Bio_Checked');
        $excel->setCreator('Laravel')->setCompany('Aparna');
        $excel->setDescription('securitynightbiocheckedsubmission file');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($paymentsArray) {
            $sheet->fromArray($paymentsArray, null, 'A1', false, false);
        });

    })->download('xlsx');
 
    } 
	public function securitya9()

    { 	
	     if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  } 
			 
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			];   
			
		 return view('audit.auditdetail.securitya9', $relations);
		// return view('audit.auditdetail.securitya1');

    }  
	
	
	public function getsecurityvoauditreports(Request $request)
    { 	

	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		 $todate = date("Y-m-d", strtotime($to_date));
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				//DB::enableQueryLog();
				$query_eqp = "select * from `securitydailyreports` where `site` in (".$kk.") and (`reporton` BETWEEN '".$fromdate."' AND '".$todate."') and `securitydailyreports`.`deleted_at` is null";
				$audit_res = DB::select($query_eqp);			
			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);

			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$query_eqp = "select * from `securitydailyreports` where `site` in (".$kk.") and (`reporton` BETWEEN '".$fromdate."' AND '".$todate."') and `securitydailyreports`.`deleted_at` is null";
				$audit_res = DB::select($query_eqp);			
			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			   }
			}
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];   
			
		 return view('audit.auditdetail.securitytemplate.securitya9template', $relations);
 
 }  	
 
 public function getsecurityvoauditreportexport(Request $request)
    { 	
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$query_eqp = "select * from `securitydailyreports` where `site` in (".$kk.") and (`reporton` BETWEEN '".$fromdate."' AND '".$todate."') and `securitydailyreports`.`deleted_at` is null";
				$audit_res = DB::select($query_eqp);			
			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    

		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$query_eqp = "select * from `securitydailyreports` where `site` in (".$kk.") and (`reporton` BETWEEN '".$fromdate."' AND '".$todate."') and `securitydailyreports`.`deleted_at` is null";
				$audit_res = DB::select($query_eqp);			
			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			   }
			}
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];   
			
		//echo '<pre>'; print_r($results); echo '</pre>';
		$paymentsArray = array();
		$paymentsArray[] = ['S.No', 'Site', 'Date', 'Violations', 'Occurances'];
		 $i = 1;
		 if (count($results) > 0) {
			 foreach ($results as $kk => $client) {
		 		if (count($client) > 0) {
					foreach ($client as $tt) {
						$resrow = array();
		 				$resrow['sno'] = $i;
					    $resrow['site'] = $siteattrname[$kk];
					    $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
					    $rdate = date("d-m-Y", strtotime($tt->reporton));
					    $checkval = checkDailyStatus($rdate, $kk);
					    $resrow['violations'] =  $tt->violations;
					    $resrow['occurances'] =  $tt->occurances;
					    $i = $i + 1; 
					    $paymentsArray[] =  $resrow;
					}
				}
			}
		}
			

	// Generate and return the spreadsheet
    Excel::create('Security_Violations_Occurences', function($excel) use ($paymentsArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('Security_Violations_Occurences');
        $excel->setCreator('Laravel')->setCompany('Aparna');
        $excel->setDescription('securityviolcationsandoccurencesfile');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($paymentsArray) {
            $sheet->fromArray($paymentsArray, null, 'A1', false, false);
        });

    })->download('xlsx');
 
    } 
	public function securitya10()

    { 	
		 return view('audit.auditdetail.securitya10');

    }  
	
	public function securitya11()

    { 	
	     if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  } 
			 
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			];   
			
		 return view('audit.auditdetail.securitya11', $relations);
		// return view('audit.auditdetail.securitya1');

    }  
	
	
	public function getsecuritywsauditreports(Request $request)
    { 	

	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		 $todate = date("Y-m-d", strtotime($to_date));
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				//DB::enableQueryLog();
				$query_eqp = "select * from `securitydailyreports` where `site` in (".$kk.") and (`reporton` BETWEEN '".$fromdate."' AND '".$todate."') and(`ws_lguard`>0 or `ws_lguard`>0 or `ws_hguard`>0 or `ws_sup`>0 or `ws_aso`>0 or `ws_so`>0) and `securitydailyreports`.`deleted_at` is null";
				$audit_res = DB::select($query_eqp);			
			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);

			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$query_eqp = "select * from `securitydailyreports` where `site` in (".$kk.") and (`reporton` BETWEEN '".$fromdate."' AND '".$todate."') and(`ws_lguard`>0 or `ws_lguard`>0 or `ws_hguard`>0 or `ws_sup`>0 or `ws_aso`>0 or `ws_so`>0) and `securitydailyreports`.`deleted_at` is null";
				$audit_res = DB::select($query_eqp);			
			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			   }
			}
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];   
			
		 return view('audit.auditdetail.securitytemplate.securitya11template', $relations);
 
    }  
	
	
 public function getsecuritywsauditreportexport(Request $request)
    { 	
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$query_eqp = "select * from `securitydailyreports` where `site` in (".$kk.") and (`reporton` BETWEEN '".$fromdate."' AND '".$todate."') and(`ws_lguard`>0 or `ws_lguard`>0 or `ws_hguard`>0 or `ws_sup`>0 or `ws_aso`>0 or `ws_so`>0) and `securitydailyreports`.`deleted_at` is null";
				$audit_res = DB::select($query_eqp);			
			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    

		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$query_eqp = "select * from `securitydailyreports` where `site` in (".$kk.") and (`reporton` BETWEEN '".$fromdate."' AND '".$todate."') and(`ws_lguard`>0 or `ws_lguard`>0 or `ws_hguard`>0 or `ws_sup`>0 or `ws_aso`>0 or `ws_so`>0) and `securitydailyreports`.`deleted_at` is null";
				$audit_res = DB::select($query_eqp);			
			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			   }
			}
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];   
			
		//echo '<pre>'; print_r($results); echo '</pre>';
		$paymentsArray = array();
		$paymentsArray[] = ['S.No', 'Site', 'Date', 'No.of Persons Without shoes', 'Designation'];
		 $i = 1;
		 if (count($results) > 0) {
			 foreach ($results as $kk => $client) {
		 		if (count($client) > 0) {
					foreach ($client as $tt) {
						$resrow = array();
		 				if(($tt->ws_guard)>0) { 
						   $resrow['sno'] = $i;
						   $resrow['site'] = $siteattrname[$kk];
						   $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
						   $rdate = date("d-m-Y", strtotime($tt->reporton));
						   $checkval = checkDailyStatus($rdate, $kk);
						   $resrow['persons'] = $tt->ws_guard;	
						   $resrow['desc'] = "Guard";   
						   $i = $i + 1; 
						   $paymentsArray[] =  $resrow;
						} 
						if(($tt->ws_lguard)>0) { 
						   $resrow['sno'] = $i;
						   $resrow['site'] = $siteattrname[$kk];
						   $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
						   $rdate = date("d-m-Y", strtotime($tt->reporton));
						   $checkval = checkDailyStatus($rdate, $kk);
						   $resrow['persons'] = $tt->ws_lguard;	
						   $resrow['desc'] = "Lady Guard";   
						   $i = $i + 1; 
						   $paymentsArray[] =  $resrow;
						} 						
						if(($tt->ws_hguard)>0) { 
						   $resrow['sno'] = $i;
						   $resrow['site'] = $siteattrname[$kk];
						   $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
						   $rdate = date("d-m-Y", strtotime($tt->reporton));
						   $checkval = checkDailyStatus($rdate, $kk);
						   $resrow['persons'] = $tt->ws_hguard;	
						   $resrow['desc'] = "Head Guard";	   
						   $i = $i + 1; 
						   $paymentsArray[] =  $resrow;
						} 						
						if(($tt->ws_sup)>0) { 
						   $resrow['sno'] = $i;
						   $resrow['site'] = $siteattrname[$kk];
						   $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
						   $rdate = date("d-m-Y", strtotime($tt->reporton));
						   $checkval = checkDailyStatus($rdate, $kk);
						   $resrow['persons'] = $tt->ws_sup;	
						   $resrow['desc'] = "Sec Supervisor";	   
						   $i = $i + 1; 
						   $paymentsArray[] =  $resrow;
						} 						
						if(($tt->ws_aso)>0) { 
						   $resrow['sno'] = $i;
						   $resrow['site'] = $siteattrname[$kk];
						   $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
						   $rdate = date("d-m-Y", strtotime($tt->reporton));
						   $checkval = checkDailyStatus($rdate, $kk);
						   $resrow['persons'] = $tt->ws_aso;	
						   $resrow['desc'] = "ASO";	   
						   $i = $i + 1; 
						   $paymentsArray[] =  $resrow;
						} 						
						if(($tt->ws_so)>0) { 
						   $resrow['sno'] = $i;
						   $resrow['site'] = $siteattrname[$kk];
						   $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
						   $rdate = date("d-m-Y", strtotime($tt->reporton));
						   $checkval = checkDailyStatus($rdate, $kk);
						   $resrow['persons'] = $tt->ws_so;	
						   $resrow['desc'] = "SO";			 	   
						   $i = $i + 1; 
						   $paymentsArray[] =  $resrow;
						} 
						//echo '<pre>'; print_r($resrow); echo '</pre>';
					}
				}
			}
		}
			

	// Generate and return the spreadsheet
    Excel::create('Security_Shoes_Submission', function($excel) use ($paymentsArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('Security_Shoes_Submission');
        $excel->setCreator('Laravel')->setCompany('Aparna');
        $excel->setDescription('securityshoessubmission file');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($paymentsArray) {
            $sheet->fromArray($paymentsArray, null, 'A1', false, false);
        });

    })->download('xlsx');
 
    } 
	
	public function securitya12()

    { 	
	     if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  } 
			 
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			];   
			
		 return view('audit.auditdetail.securitya12', $relations);
		// return view('audit.auditdetail.securitya1');

    }  
	
	
	public function getsecuritywunauditreports(Request $request)
    { 	

	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		 $todate = date("Y-m-d", strtotime($to_date));
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				//DB::enableQueryLog();
				$query_eqp = "select * from `securitydailyreports` where `site` in (".$kk.") and (`reporton` BETWEEN '".$fromdate."' AND '".$todate."') and(`wu_lguard`>0 or `wu_lguard`>0 or `wu_hguard`>0 or `wu_sup`>0 or `wu_aso`>0 or `wu_so`>0) and `securitydailyreports`.`deleted_at` is null";
				$audit_res = DB::select($query_eqp);			
			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);

			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$query_eqp = "select * from `securitydailyreports` where `site` in (".$kk.") and (`reporton` BETWEEN '".$fromdate."' AND '".$todate."') and(`wu_lguard`>0 or `wu_lguard`>0 or `wu_hguard`>0 or `wu_sup`>0 or `wu_aso`>0 or `wu_so`>0) and `securitydailyreports`.`deleted_at` is null";
				$audit_res = DB::select($query_eqp);			
			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			   }
			}
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];   
			
		 return view('audit.auditdetail.securitytemplate.securitya12template', $relations);
 
    }  
	
	
 public function getsecuritywunauditreportexport(Request $request)
    { 	
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$query_eqp = "select * from `securitydailyreports` where `site` in (".$kk.") and (`reporton` BETWEEN '".$fromdate."' AND '".$todate."') and(`wu_lguard`>0 or `wu_lguard`>0 or `wu_hguard`>0 or `wu_sup`>0 or `wu_aso`>0 or `wu_so`>0) and `securitydailyreports`.`deleted_at` is null";
				$audit_res = DB::select($query_eqp);			
			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    

		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$query_eqp = "select * from `securitydailyreports` where `site` in (".$kk.") and (`reporton` BETWEEN '".$fromdate."' AND '".$todate."') and(`wu_lguard`>0 or `wu_lguard`>0 or `wu_hguard`>0 or `wu_sup`>0 or `wu_aso`>0 or `wu_so`>0) and `securitydailyreports`.`deleted_at` is null";
				$audit_res = DB::select($query_eqp);			
			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			   }
			}
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];   
			
		//echo '<pre>'; print_r($results); echo '</pre>';
		$paymentsArray = array();
		$paymentsArray[] = ['S.No', 'Site', 'Date', 'No.of Persons Without Uniform', 'Designation'];
		 $i = 1;
		 if (count($results) > 0) {
			 foreach ($results as $kk => $client) {
		 		if (count($client) > 0) {
					foreach ($client as $tt) {
						$resrow = array();
		 				if(($tt->wu_guard)>0) { 
						   $resrow['sno'] = $i;
						   $resrow['site'] = $siteattrname[$kk];
						   $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
						   $rdate = date("d-m-Y", strtotime($tt->reporton));
						   $checkval = checkDailyStatus($rdate, $kk);
						   $resrow['persons'] = $tt->wu_guard;	
						   $resrow['desc'] = "Guard";	   
						   $i = $i + 1; 
						   $paymentsArray[] =  $resrow;
						} 
						if(($tt->wu_lguard)>0) { 
						   $resrow['sno'] = $i;
						   $resrow['site'] = $siteattrname[$kk];
						   $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
						   $rdate = date("d-m-Y", strtotime($tt->reporton));
						   $checkval = checkDailyStatus($rdate, $kk);
						   $resrow['persons'] = $tt->wu_lguard;	
						   $resrow['desc'] = "Lady Guard";	   
						   $i = $i + 1; 
						   $paymentsArray[] =  $resrow;
						} 						
						if(($tt->wu_hguard)>0) { 
						   $resrow['sno'] = $i;
						   $resrow['site'] = $siteattrname[$kk];
						   $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
						   $rdate = date("d-m-Y", strtotime($tt->reporton));
						   $checkval = checkDailyStatus($rdate, $kk);
						   $resrow['persons'] = $tt->wu_hguard;	
						   $resrow['desc'] = "Head Guard";	   
						   $i = $i + 1; 
						   $paymentsArray[] =  $resrow;
						} 						
						if(($tt->wu_sup)>0) { 
						   $resrow['sno'] = $i;
						   $resrow['site'] = $siteattrname[$kk];
						   $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
						   $rdate = date("d-m-Y", strtotime($tt->reporton));
						   $checkval = checkDailyStatus($rdate, $kk);
						   $resrow['persons'] = $tt->wu_sup;	
						   $resrow['desc'] = "Sec Supervisor";	   
						   $i = $i + 1; 
						   $paymentsArray[] =  $resrow;
						} 						
						if(($tt->wu_aso)>0) { 
						   $resrow['sno'] = $i;
						   $resrow['site'] = $siteattrname[$kk];
						   $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
						   $rdate = date("d-m-Y", strtotime($tt->reporton));
						   $checkval = checkDailyStatus($rdate, $kk);
						   $resrow['persons'] = $tt->wu_aso;	
						   $resrow['desc'] = "ASO";		   
						   $i = $i + 1; 
						   $paymentsArray[] =  $resrow;
						} 						
						if(($tt->wu_so)>0) { 
						   $resrow['sno'] = $i;
						   $resrow['site'] = $siteattrname[$kk];
						   $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
						   $rdate = date("d-m-Y", strtotime($tt->reporton));
						   $checkval = checkDailyStatus($rdate, $kk);
						   $resrow['persons'] = $tt->wu_so;	
						   $resrow['desc'] = "SO";		 	   
						   $i = $i + 1; 
						   $paymentsArray[] =  $resrow;
						} 
						//echo '<pre>'; print_r($resrow); echo '</pre>';
					}
				}
			}
		}
			

	// Generate and return the spreadsheet
    Excel::create('Security_Uniform_Submission', function($excel) use ($paymentsArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('Security_Uniform_Submission');
        $excel->setCreator('Laravel')->setCompany('Aparna');
        $excel->setDescription('securityuniformsubmission file');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($paymentsArray) {
            $sheet->fromArray($paymentsArray, null, 'A1', false, false);
        });

    })->download('xlsx');
 
    }  
	
	public function securitya13()

    { 	
	     if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  } 
			 
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			];   
			
		 return view('audit.auditdetail.securitya13', $relations);
		// return view('audit.auditdetail.securitya1');

    }  
	
	
	public function getsecuritykffauditreports(Request $request)
    { 	

	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		 $todate = date("Y-m-d", strtotime($to_date));
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				//DB::enableQueryLog();
				$query_eqp = "select * from `securitydailyreports` where `site` in (".$kk.") and (`reporton` BETWEEN '".$fromdate."' AND '".$todate."') and(`kff_guard`>0 or `kff_lguard`>0 or `kff_hguard`>0 or `kff_sup`>0 or `kff_aso`>0 or `kff_so`>0) and `securitydailyreports`.`deleted_at` is null";
				$audit_res = DB::select($query_eqp);			
			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);

			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$query_eqp = "select * from `securitydailyreports` where `site` in (".$kk.") and (`reporton` BETWEEN '".$fromdate."' AND '".$todate."') and(`kff_guard`>0 or `kff_lguard`>0 or `kff_hguard`>0 or `kff_sup`>0 or `kff_aso`>0 or `kff_so`>0) and `securitydailyreports`.`deleted_at` is null";
				$audit_res = DB::select($query_eqp);			
			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			   }
			}
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];   
			
		 return view('audit.auditdetail.securitytemplate.securitya13template', $relations);
 
    }  
	
	
 public function getsecuritykffauditreportexport(Request $request)
    { 	
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$query_eqp = "select * from `securitydailyreports` where `site` in (".$kk.") and (`reporton` BETWEEN '".$fromdate."' AND '".$todate."') and(`kff_guard`>0 or `kff_lguard`>0 or `kff_hguard`>0 or `kff_sup`>0 or `kff_aso`>0 or `kff_so`>0) and `securitydailyreports`.`deleted_at` is null";
				$audit_res = DB::select($query_eqp);			
			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    

		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$query_eqp = "select * from `securitydailyreports` where `site` in (".$kk.") and (`reporton` BETWEEN '".$fromdate."' AND '".$todate."') and(`kff_guard`>0 or `kff_lguard`>0 or `kff_hguard`>0 or `kff_sup`>0 or `kff_aso`>0 or `kff_so`>0) and `securitydailyreports`.`deleted_at` is null";
				$audit_res = DB::select($query_eqp);			
			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			   }
			}
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];   
			
		//echo '<pre>'; print_r($results); echo '</pre>';
		$paymentsArray = array();
		$paymentsArray[] = ['S.No', 'Site', 'Date', 'No.of Persons Knows Fire Fighting', 'Designation'];
		 $i = 1;
		 if (count($results) > 0) {
			 foreach ($results as $kk => $client) {
		 		if (count($client) > 0) {
					foreach ($client as $tt) {
						$resrow = array();
		 				if(($tt->kff_guard)>0) { 
						   $resrow['sno'] = $i;
						   $resrow['site'] = $siteattrname[$kk];
						   $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
						   $rdate = date("d-m-Y", strtotime($tt->reporton));
						   $checkval = checkDailyStatus($rdate, $kk);
						   $resrow['persons'] = $tt->kff_guard;	
						   $resrow['desc'] = "Guard";	   
						   $i = $i + 1; 
						   $paymentsArray[] =  $resrow;
						} 
						if(($tt->kff_lguard)>0) { 
						   $resrow['sno'] = $i;
						   $resrow['site'] = $siteattrname[$kk];
						   $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
						   $rdate = date("d-m-Y", strtotime($tt->reporton));
						   $checkval = checkDailyStatus($rdate, $kk);
						   $resrow['persons'] = $tt->kff_lguard;	
						   $resrow['desc'] = "Lady Guard";   
						   $i = $i + 1; 
						   $paymentsArray[] =  $resrow;
						} 						
						if(($tt->kff_hguard)>0) { 
						   $resrow['sno'] = $i;
						   $resrow['site'] = $siteattrname[$kk];
						   $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
						   $rdate = date("d-m-Y", strtotime($tt->reporton));
						   $checkval = checkDailyStatus($rdate, $kk);
						   $resrow['persons'] = $tt->kff_hguard;	
						   $resrow['desc'] = "Head Guard";   
						   $i = $i + 1; 
						   $paymentsArray[] =  $resrow;
						} 						
						if(($tt->kff_sup)>0) { 
						   $resrow['sno'] = $i;
						   $resrow['site'] = $siteattrname[$kk];
						   $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
						   $rdate = date("d-m-Y", strtotime($tt->reporton));
						   $checkval = checkDailyStatus($rdate, $kk);
						   $resrow['persons'] = $tt->kff_sup;	
						   $resrow['desc'] = "Sec Supervisor";   
						   $i = $i + 1; 
						   $paymentsArray[] =  $resrow;
						} 						
						if(($tt->kff_aso)>0) { 
						   $resrow['sno'] = $i;
						   $resrow['site'] = $siteattrname[$kk];
						   $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
						   $rdate = date("d-m-Y", strtotime($tt->reporton));
						   $checkval = checkDailyStatus($rdate, $kk);
						   $resrow['persons'] = $tt->kff_aso;	
						   $resrow['desc'] = "ASO";		   
						   $i = $i + 1; 
						   $paymentsArray[] =  $resrow;
						} 						
						if(($tt->kff_so)>0) { 
						   $resrow['sno'] = $i;
						   $resrow['site'] = $siteattrname[$kk];
						   $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
						   $rdate = date("d-m-Y", strtotime($tt->reporton));
						   $checkval = checkDailyStatus($rdate, $kk);
						   $resrow['persons'] = $tt->kff_so;	
						   $resrow['desc'] = "SO";		 	   
						   $i = $i + 1; 
						   $paymentsArray[] =  $resrow;
						} 
						//echo '<pre>'; print_r($resrow); echo '</pre>';
					}
				}
			}
		}
	// Generate and return the spreadsheet
    Excel::create('Security_Knows_Fire_Fighting', function($excel) use ($paymentsArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('Security_Knows_Fire_Fighting');
        $excel->setCreator('Laravel')->setCompany('Aparna');
        $excel->setDescription('securityknowsfirefighting');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($paymentsArray) {
            $sheet->fromArray($paymentsArray, null, 'A1', false, false);
        });

    })->download('xlsx');
 
    }  
	
	public function securitya14()

    { 	
	     if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  } 
			 
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			];   
			
		 return view('audit.auditdetail.securitya14', $relations);
		// return view('audit.auditdetail.securitya1');

    }  
	
	
	public function getsecurityheightauditreports(Request $request)
    { 	

	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		 $todate = date("Y-m-d", strtotime($to_date));
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				//DB::enableQueryLog();
				$query_eqp = "select * from `securitydailyreports` where `site` in (".$kk.") and (`reporton` BETWEEN '".$fromdate."' AND '".$todate."') and(`lt52_guard`>0 or `lt52_lguard`>0 or `lt52_hguard`>0 or `lt52_sup`>0 or `lt52_aso`>0 or `lt52_so`>0) and `securitydailyreports`.`deleted_at` is null";
				$audit_res = DB::select($query_eqp);			
			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);

			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$query_eqp = "select * from `securitydailyreports` where `site` in (".$kk.") and (`reporton` BETWEEN '".$fromdate."' AND '".$todate."') and(`lt52_guard`>0 or `lt52_lguard`>0 or `lt52_hguard`>0 or `lt52_sup`>0 or `lt52_aso`>0 or `lt52_so`>0) and `securitydailyreports`.`deleted_at` is null";
				$audit_res = DB::select($query_eqp);			
			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			   }
			}
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];   
			
		 return view('audit.auditdetail.securitytemplate.securitya14template', $relations);
 
    }  
	
	
 public function getsecurityheightauditreportexport(Request $request)
    { 	
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$query_eqp = "select * from `securitydailyreports` where `site` in (".$kk.") and (`reporton` BETWEEN '".$fromdate."' AND '".$todate."') and(`lt52_guard`>0 or `lt52_lguard`>0 or `lt52_hguard`>0 or `lt52_sup`>0 or `lt52_aso`>0 or `lt52_so`>0) and `securitydailyreports`.`deleted_at` is null";
				$audit_res = DB::select($query_eqp);			
			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    

		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$query_eqp = "select * from `securitydailyreports` where `site` in (".$kk.") and (`reporton` BETWEEN '".$fromdate."' AND '".$todate."') and(`lt52_guard`>0 or `lt52_lguard`>0 or `lt52_hguard`>0 or `lt52_sup`>0 or `lt52_aso`>0 or `lt52_so`>0) and `securitydailyreports`.`deleted_at` is null";
				$audit_res = DB::select($query_eqp);			
			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			   }
			}
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];   
			
		//echo '<pre>'; print_r($results); echo '</pre>';
		$paymentsArray = array();
		$paymentsArray[] = ['S.No', 'Site', 'Date', 'No.of Persons Less than 5\' 2', 'Designation'];
		 $i = 1;
		 if (count($results) > 0) {
			 foreach ($results as $kk => $client) {
		 		if (count($client) > 0) {
					foreach ($client as $tt) {
						$resrow = array();
		 				if(($tt->lt52_guard)>0) { 
						   $resrow['sno'] = $i;
						   $resrow['site'] = $siteattrname[$kk];
						   $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
						   $rdate = date("d-m-Y", strtotime($tt->reporton));
						   $checkval = checkDailyStatus($rdate, $kk);
						   $resrow['persons'] = $tt->lt52_guard;	
						   $resrow['desc'] = "Guard";	   
						   $i = $i + 1; 
						   $paymentsArray[] =  $resrow;
						} 
						if(($tt->lt52_lguard)>0) { 
						   $resrow['sno'] = $i;
						   $resrow['site'] = $siteattrname[$kk];
						   $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
						   $rdate = date("d-m-Y", strtotime($tt->reporton));
						   $checkval = checkDailyStatus($rdate, $kk);
						   $resrow['persons'] = $tt->lt52_lguard;	
						   $resrow['desc'] = "Lady Guard";   
						   $i = $i + 1; 
						   $paymentsArray[] =  $resrow;
						} 						
						if(($tt->lt52_hguard)>0) { 
						   $resrow['sno'] = $i;
						   $resrow['site'] = $siteattrname[$kk];
						   $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
						   $rdate = date("d-m-Y", strtotime($tt->reporton));
						   $checkval = checkDailyStatus($rdate, $kk);
						   $resrow['persons'] = $tt->lt52_hguard;	
						   $resrow['desc'] = "Head Guard";   
						   $i = $i + 1; 
						   $paymentsArray[] =  $resrow;
						} 						
						if(($tt->lt52_sup)>0) { 
						   $resrow['sno'] = $i;
						   $resrow['site'] = $siteattrname[$kk];
						   $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
						   $rdate = date("d-m-Y", strtotime($tt->reporton));
						   $checkval = checkDailyStatus($rdate, $kk);
						   $resrow['persons'] = $tt->lt52_sup;	
						   $resrow['desc'] = "Sec Supervisor";   
						   $i = $i + 1; 
						   $paymentsArray[] =  $resrow;
						} 						
						if(($tt->lt52_aso)>0) { 
						   $resrow['sno'] = $i;
						   $resrow['site'] = $siteattrname[$kk];
						   $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
						   $rdate = date("d-m-Y", strtotime($tt->reporton));
						   $checkval = checkDailyStatus($rdate, $kk);
						   $resrow['persons'] = $tt->lt52_aso;	
						   $resrow['desc'] = "ASO";		   
						   $i = $i + 1; 
						   $paymentsArray[] =  $resrow;
						} 						
						if(($tt->lt52_so)>0) { 
						   $resrow['sno'] = $i;
						   $resrow['site'] = $siteattrname[$kk];
						   $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
						   $rdate = date("d-m-Y", strtotime($tt->reporton));
						   $checkval = checkDailyStatus($rdate, $kk);
						   $resrow['persons'] = $tt->lt52_so;	
						   $resrow['desc'] = "SO";		 	   
						   $i = $i + 1; 
						   $paymentsArray[] =  $resrow;
						} 
						//echo '<pre>'; print_r($resrow); echo '</pre>';
					}
				}
			}
		}
	// Generate and return the spreadsheet
    Excel::create('Security_Lessthan5_2', function($excel) use ($paymentsArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('Security_Lessthan5_2');
        $excel->setCreator('Laravel')->setCompany('Aparna');
        $excel->setDescription('securitylessthan52');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($paymentsArray) {
            $sheet->fromArray($paymentsArray, null, 'A1', false, false);
        });

    })->download('xlsx');
 
    }  
	
	public function securitya15()

    { 	
	     if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  } 
			 
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			];   
			
		 return view('audit.auditdetail.securitya15', $relations);
		// return view('audit.auditdetail.securitya1');

    }  
	
	
	public function getsecurityage50auditreports(Request $request)
    { 	

	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		 $todate = date("Y-m-d", strtotime($to_date));
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				//DB::enableQueryLog();
				$query_eqp = "select * from `securitydailyreports` where `site` in (".$kk.") and (`reporton` BETWEEN '".$fromdate."' AND '".$todate."') and(`lt50_lguard`>0 or `lt50_lguard`>0 or `lt50_hguard`>0 or `lt50_sup`>0 or `lt50_aso`>0 or `lt50_so`>0) and `securitydailyreports`.`deleted_at` is null";
				$audit_res = DB::select($query_eqp);			
			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);

			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$query_eqp = "select * from `securitydailyreports` where `site` in (".$kk.") and (`reporton` BETWEEN '".$fromdate."' AND '".$todate."') and(`lt50_lguard`>0 or `lt50_lguard`>0 or `lt50_hguard`>0 or `lt50_sup`>0 or `lt50_aso`>0 or `lt50_so`>0) and `securitydailyreports`.`deleted_at` is null";
				$audit_res = DB::select($query_eqp);			
			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			   }
			}
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];   
			
		 return view('audit.auditdetail.securitytemplate.securitya15template', $relations);
 
    }  
	
	
 public function getsecage50Auditreportexport(Request $request)
    { 	
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$query_eqp = "select * from `securitydailyreports` where `site` in (".$kk.") and (`reporton` BETWEEN '".$fromdate."' AND '".$todate."') and(`lt50_lguard`>0 or `lt50_lguard`>0 or `lt50_hguard`>0 or `lt50_sup`>0 or `lt50_aso`>0 or `lt50_so`>0) and `securitydailyreports`.`deleted_at` is null";
				$audit_res = DB::select($query_eqp);			
			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    

		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$query_eqp = "select * from `securitydailyreports` where `site` in (".$kk.") and (`reporton` BETWEEN '".$fromdate."' AND '".$todate."') and(`lt50_lguard`>0 or `lt50_lguard`>0 or `lt50_hguard`>0 or `lt50_sup`>0 or `lt50_aso`>0 or `lt50_so`>0) and `securitydailyreports`.`deleted_at` is null";
				$audit_res = DB::select($query_eqp);			
			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			   }
			}
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];   
			
		//echo '<pre>'; print_r($results); echo '</pre>';
		$paymentsArray = array();
		$paymentsArray[] = ['S.No', 'Site', 'Date', 'No of persons weighing below 50 kgs', 'Designation'];
		 $i = 1;
		 if (count($results) > 0) {
			 foreach ($results as $kk => $client) {
		 		if (count($client) > 0) {
					foreach ($client as $tt) {
						$resrow = array();
		 				if(($tt->lt50_guard)>0) { 
						   $resrow['sno'] = $i;
						   $resrow['site'] = $siteattrname[$kk];
						   $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
						   $rdate = date("d-m-Y", strtotime($tt->reporton));
						   $checkval = checkDailyStatus($rdate, $kk);
						   $resrow['persons'] = $tt->lt50_guard;	
						   $resrow['desc'] = "Guard";   
						   $i = $i + 1; 
						   $paymentsArray[] =  $resrow;
						} 
						if(($tt->lt50_lguard)>0) { 
						   $resrow['sno'] = $i;
						   $resrow['site'] = $siteattrname[$kk];
						   $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
						   $rdate = date("d-m-Y", strtotime($tt->reporton));
						   $checkval = checkDailyStatus($rdate, $kk);
						   $resrow['persons'] = $tt->lt50_lguard;	
						   $resrow['desc'] = "Lady Guard";	   
						   $i = $i + 1; 
						   $paymentsArray[] =  $resrow;
						} 						
						if(($tt->lt50_hguard)>0) { 
						   $resrow['sno'] = $i;
						   $resrow['site'] = $siteattrname[$kk];
						   $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
						   $rdate = date("d-m-Y", strtotime($tt->reporton));
						   $checkval = checkDailyStatus($rdate, $kk);
						   $resrow['persons'] = $tt->lt50_hguard;	
						   $resrow['desc'] = "Head Guard";   
						   $i = $i + 1; 
						   $paymentsArray[] =  $resrow;
						} 						
						if(($tt->lt50_sup)>0) { 
						   $resrow['sno'] = $i;
						   $resrow['site'] = $siteattrname[$kk];
						   $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
						   $rdate = date("d-m-Y", strtotime($tt->reporton));
						   $checkval = checkDailyStatus($rdate, $kk);
						   $resrow['persons'] = $tt->lt50_sup;	
						   $resrow['desc'] = "Sec Supervisor";	   
						   $i = $i + 1; 
						   $paymentsArray[] =  $resrow;
						} 						
						if(($tt->lt50_aso)>0) { 
						   $resrow['sno'] = $i;
						   $resrow['site'] = $siteattrname[$kk];
						   $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
						   $rdate = date("d-m-Y", strtotime($tt->reporton));
						   $checkval = checkDailyStatus($rdate, $kk);
						   $resrow['persons'] = $tt->lt50_aso;	
						   $resrow['desc'] = "ASO";		   
						   $i = $i + 1; 
						   $paymentsArray[] =  $resrow;
						} 						
						if(($tt->lt50_so)>0) { 
						   $resrow['sno'] = $i;
						   $resrow['site'] = $siteattrname[$kk];
						   $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
						   $rdate = date("d-m-Y", strtotime($tt->reporton));
						   $checkval = checkDailyStatus($rdate, $kk);
						   $resrow['persons'] = $tt->lt50_so;	
						   $resrow['desc'] = "SO";		 	   
						   $i = $i + 1; 
						   $paymentsArray[] =  $resrow;
						} 
						//echo '<pre>'; print_r($resrow); echo '</pre>';
					}
				}
			}
		}
			

	// Generate and return the spreadsheet
    Excel::create('security_weight50_submission', function($excel) use ($paymentsArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('security_weight50_submission');
        $excel->setCreator('Laravel')->setCompany('Aparna');
        $excel->setDescription('securityweight50submission file');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($paymentsArray) {
            $sheet->fromArray($paymentsArray, null, 'A1', false, false);
        });

    })->download('xlsx');
 
    }  
	
	
	
	public function securitya16()

    { 	
	     if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  } 
			 
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			];   
			
		 return view('audit.auditdetail.securitya16', $relations);
		// return view('audit.auditdetail.securitya1');

    }  
	
	
	public function getsecage20auditreports(Request $request)
    { 	

	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		 $todate = date("Y-m-d", strtotime($to_date));
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				//DB::enableQueryLog();
				$query_eqp = "select * from `securitydailyreports` where `site` in (".$kk.") and (`reporton` BETWEEN '".$fromdate."' AND '".$todate."') and(`lt20_lguard`>0 or `lt20_lguard`>0 or `lt20_hguard`>0 or `lt20_sup`>0 or `lt20_aso`>0 or `lt20_so`>0) and `securitydailyreports`.`deleted_at` is null";
				$audit_res = DB::select($query_eqp);			
			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$query_eqp = "select * from `securitydailyreports` where `site` in (".$kk.") and (`reporton` BETWEEN '".$fromdate."' AND '".$todate."') and(`lt20_lguard`>0 or `lt20_lguard`>0 or `lt20_hguard`>0 or `lt20_sup`>0 or `lt20_aso`>0 or `lt20_so`>0) and `securitydailyreports`.`deleted_at` is null";
				$audit_res = DB::select($query_eqp);			
			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			   }
			}
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];   
			
		 return view('audit.auditdetail.securitytemplate.securitya16template', $relations);
 
    }  
	
	
 public function getsecage20Auditreportexport(Request $request)
    { 	
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$query_eqp = "select * from `securitydailyreports` where `site` in (".$kk.") and (`reporton` BETWEEN '".$fromdate."' AND '".$todate."') and(`lt20_lguard`>0 or `lt20_lguard`>0 or `lt20_hguard`>0 or `lt20_sup`>0 or `lt20_aso`>0 or `lt20_so`>0) and `securitydailyreports`.`deleted_at` is null";
				$audit_res = DB::select($query_eqp);			
			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    

		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$query_eqp = "select * from `securitydailyreports` where `site` in (".$kk.") and (`reporton` BETWEEN '".$fromdate."' AND '".$todate."') and(`lt20_lguard`>0 or `lt20_lguard`>0 or `lt20_hguard`>0 or `lt20_sup`>0 or `lt20_aso`>0 or `lt20_so`>0) and `securitydailyreports`.`deleted_at` is null";
				$audit_res = DB::select($query_eqp);			
			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			   }
			}
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];   
			
		//echo '<pre>'; print_r($results); echo '</pre>';
		$paymentsArray = array();
		$paymentsArray[] = ['S.No', 'Site', 'Date', 'No of persons employed below 20 years', 'Designation'];
		 $i = 1;
		 if (count($results) > 0) {
			 foreach ($results as $kk => $client) {
		 		if (count($client) > 0) {
					foreach ($client as $tt) {
						$resrow = array();
		 				if(($tt->lt20_guard)>0) { 
						   $resrow['sno'] = $i;
						   $resrow['site'] = $siteattrname[$kk];
						   $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
						   $rdate = date("d-m-Y", strtotime($tt->reporton));
						   $checkval = checkDailyStatus($rdate, $kk);
						   $resrow['persons'] = $tt->lt20_guard;	
						   $resrow['desc'] = "Guard";	   
						   $i = $i + 1; 
						   $paymentsArray[] =  $resrow;
						} 
						if(($tt->lt20_lguard)>0) { 
						   $resrow['sno'] = $i;
						   $resrow['site'] = $siteattrname[$kk];
						   $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
						   $rdate = date("d-m-Y", strtotime($tt->reporton));
						   $checkval = checkDailyStatus($rdate, $kk);
						   $resrow['persons'] = $tt->lt20_lguard;	
						   $resrow['desc'] = "Lady Guard";	   
						   $i = $i + 1; 
						   $paymentsArray[] =  $resrow;
						} 						
						if(($tt->lt20_hguard)>0) { 
						   $resrow['sno'] = $i;
						   $resrow['site'] = $siteattrname[$kk];
						   $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
						   $rdate = date("d-m-Y", strtotime($tt->reporton));
						   $checkval = checkDailyStatus($rdate, $kk);
						   $resrow['persons'] = $tt->lt20_hguard;	
						   $resrow['desc'] = "Head Guard";   
						   $i = $i + 1; 
						   $paymentsArray[] =  $resrow;
						} 						
						if(($tt->lt20_sup)>0) { 
						   $resrow['sno'] = $i;
						   $resrow['site'] = $siteattrname[$kk];
						   $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
						   $rdate = date("d-m-Y", strtotime($tt->reporton));
						   $checkval = checkDailyStatus($rdate, $kk);
						   $resrow['persons'] = $tt->lt20_sup;	
						   $resrow['desc'] = "Sec Supervisor";	   
						   $i = $i + 1; 
						   $paymentsArray[] =  $resrow;
						} 						
						if(($tt->lt20_aso)>0) { 
						   $resrow['sno'] = $i;
						   $resrow['site'] = $siteattrname[$kk];
						   $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
						   $rdate = date("d-m-Y", strtotime($tt->reporton));
						   $checkval = checkDailyStatus($rdate, $kk);
						   $resrow['persons'] = $tt->lt20_aso;	
						   $resrow['desc'] = "ASO";	   
						   $i = $i + 1; 
						   $paymentsArray[] =  $resrow;
						} 						
						if(($tt->lt20_so)>0) { 
						   $resrow['sno'] = $i;
						   $resrow['site'] = $siteattrname[$kk];
						   $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
						   $rdate = date("d-m-Y", strtotime($tt->reporton));
						   $checkval = checkDailyStatus($rdate, $kk);
						   $resrow['persons'] = $tt->lt20_so;	
						   $resrow['desc'] = "SO";		 	   
						   $i = $i + 1; 
						   $paymentsArray[] =  $resrow;
						} 
						//echo '<pre>'; print_r($resrow); echo '</pre>';
					}
				}
			}
		}
			

	// Generate and return the spreadsheet
    Excel::create('Security_Age20_Submission', function($excel) use ($paymentsArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('Security_Age20_Submission');
        $excel->setCreator('Laravel')->setCompany('Aparna');
        $excel->setDescription('securityage20submission file');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($paymentsArray) {
            $sheet->fromArray($paymentsArray, null, 'A1', false, false);
        });

    })->download('xlsx');
 
    }  
	
	
	public function securitya17()

    { 	
	     if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  } 
			 
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			];   
			
		 return view('audit.auditdetail.securitya17', $relations);
		// return view('audit.auditdetail.securitya1');

    }  
	
	
	public function getsecurityphaauditreports(Request $request)
    { 	

	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		 $todate = date("Y-m-d", strtotime($to_date));
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				//DB::enableQueryLog();
				if($kk!=95){
				$query_eqp = "select * from `securitydailyreports` where `site` in (".$kk.") and (`reporton` BETWEEN '".$fromdate."' AND '".$todate."') and `securitydailyreports`.`deleted_at` is null";
				$audit_res = DB::select($query_eqp);			
			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }}
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);

			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			  if($kk!=95){
			   //echo $kk;
				$query_eqp = "select * from `securitydailyreports` where `site` in (".$kk.") and (`reporton` BETWEEN '".$fromdate."' AND '".$todate."') and `securitydailyreports`.`deleted_at` is null";
				$audit_res = DB::select($query_eqp);			
			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }}
			   }
			}
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];   
			
		 return view('audit.auditdetail.securitytemplate.securitya17template', $relations);
 
    }  

	public function getsecurityphaauditreportexport(Request $request)
    { 	
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
			   if($kk!=95){
				$query_eqp = "select * from `securitydailyreports` where `site` in (".$kk.") and (`reporton` BETWEEN '".$fromdate."' AND '".$todate."') and `securitydailyreports`.`deleted_at` is null";
				$audit_res = DB::select($query_eqp);			
			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }}
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    

		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			  	if($kk!=95){
			   //echo $kk;
				$query_eqp = "select * from `securitydailyreports` where `site` in (".$kk.") and (`reporton` BETWEEN '".$fromdate."' AND '".$todate."') and `securitydailyreports`.`deleted_at` is null";
				$audit_res = DB::select($query_eqp);			
			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			   }}
			}
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];   
			
		//echo '<pre>'; print_r($results); echo '</pre>';
		$paymentsArray = array();
		$paymentsArray[] = ['S.No', 'Site', 'Date', 'Total no of Physical attendance', 'Guard', 'Lady Guard','Head Guard','Sec Sup','ASO','SO'];
		 $i = 1;
		 if (count($results) > 0) {
			 foreach ($results as $kk => $client) {
		 		if (count($client) > 0) {
					$pattendance = 0;
					foreach ($client as $tt) {
						$pha_guard = (int)$tt->pha_guard;
						$pha_lguard = (int)$tt->pha_lguard;
						$pha_hguard = (int)$tt->pha_hguard;
						$pha_sup = (int)$tt->pha_sup;
						$pha_aso = (int)$tt->pha_aso;
						$pha_so = (int)$tt->pha_so;
						$pha_guard = (int)$tt->pha_guard;
						
						if($pha_guard>0) $pattendance = $pattendance+$pha_guard;
						if($pha_lguard>0) $pattendance = $pattendance+$pha_lguard;
						if($pha_hguard>0) $pattendance = $pattendance+$pha_hguard;
						if($pha_sup>0) $pattendance = $pattendance+$pha_sup;
						if($pha_aso>0) $pattendance = $pattendance+$pha_aso;
						if($pha_so>0) $pattendance = $pattendance+$pha_so;
						
						$resrow = array();
		 				$resrow['sno'] = $i;
					    $resrow['site'] = $siteattrname[$kk];
					    $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
					    $rdate = date("d-m-Y", strtotime($tt->reporton));
					    $checkval = checkDailyStatus($rdate, $kk);
					    //$pattendance = (int)$tt->pha_guard + (int)$tt->pha_lguard+ (int)$tt->pha_hguard+ (int)$tt->pha_sup+ (int)$tt->pha_aso+$tt->pha_so;
					    $resrow['paattendance'] =  $pattendance;
					    $resrow['pha_guard'] =  $tt->pha_guard;
					    $resrow['pha_lguard'] =  $tt->pha_lguard;
					    $resrow['pha_hguard'] =  $tt->pha_hguard;
					    $resrow['pha_sup'] =  $tt->pha_sup;
					    $resrow['pha_aso'] =  $tt->pha_aso;
					    $resrow['pha_so'] =  $tt->pha_so;
					    $i = $i + 1; 
					    $paymentsArray[] =  $resrow;
					}
				}
			}
		}
			

	// Generate and return the spreadsheet
    Excel::create('Security_Physicial_Attendance_Submission', function($excel) use ($paymentsArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('Security_Physicial_Attendance_Submission');
        $excel->setCreator('Laravel')->setCompany('Aparna');
        $excel->setDescription('securityphysicialattendancesubmission file');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($paymentsArray) {
            $sheet->fromArray($paymentsArray, null, 'A1', false, false);
        });

    })->download('xlsx');
 
    }
	
	
	
	// Security Audit Reports
	
	 
	public function securitya18()

    { 	
		 return view('audit.auditdetail.securitya18');

    } 
	
	
	
	public function securitya19()

    { 	
	     if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  } 
			 
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			];   
			
		 return view('audit.auditdetail.securitya19', $relations);
		// return view('audit.auditdetail.securitya1');

    }  
	
	
	public function getsecuritydbmauditreports(Request $request)
    { 	

	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		 $todate = date("Y-m-d", strtotime($to_date));
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				//DB::enableQueryLog();
				$query_eqp = "select * from `securitydailyreports` where `site` in (".$kk.") and (`reporton` BETWEEN '".$fromdate."' AND '".$todate."') and `securitydailyreports`.`deleted_at` is null";
				$audit_res = DB::select($query_eqp);			
			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);

			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$query_eqp = "select * from `securitydailyreports` where `site` in (".$kk.") and (`reporton` BETWEEN '".$fromdate."' AND '".$todate."') and `securitydailyreports`.`deleted_at` is null";
				$audit_res = DB::select($query_eqp);			
			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			   }
			}
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];   
			
		 return view('audit.auditdetail.securitytemplate.securitya19template', $relations);
 
    }  



    public function getsecuritydbmauditreportexport(Request $request)
    { 	
	  $from_date = $request->fromdate;
	  $to_date = $request->todate;
	  $site = $request->site;
	     $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
		
	  if($site == ""){
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    
			/*echo "<pre>";
			    print_r($siteattrname);
			echo "</pre>"; */
		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$query_eqp = "select * from `securitydailyreports` where `site` in (".$kk.") and (`reporton` BETWEEN '".$fromdate."' AND '".$todate."') and `securitydailyreports`.`deleted_at` is null";
				$audit_res = DB::select($query_eqp);			
			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			}  
			}
			else{
			  
	    $fromdate = date("Y-m-d", strtotime($from_date));
		$todate = date("Y-m-d", strtotime($to_date));
	  if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->where('id', '=', $site)->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('id', '=', $site)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  }    

		   
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			  
			  foreach($siteattrname as $kk => $site){
			   //echo $kk;
				$query_eqp = "select * from `securitydailyreports` where `site` in (".$kk.") and (`reporton` BETWEEN '".$fromdate."' AND '".$todate."') and `securitydailyreports`.`deleted_at` is null";
				$audit_res = DB::select($query_eqp);			
			   if(count($audit_res) > 0){			    
				$queries = DB::getQueryLog();
			   	$results[$kk] = $audit_res;
			   }
			   }
			}
			
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'auditresult' => $results,
			];   
			
		//echo '<pre>'; print_r($results); echo '</pre>';
		$paymentsArray = array();
		$paymentsArray[] = ['S.No', 'Site', 'Date', 'Total no of Physical attendance', 'Guard', 'Lady Guard','Head Guard','Sec Sup','ASO','SO', 'Guard', 'Lady Guard','Head Guard','Sec Sup','ASO','SO'];
		 $i = 1; $pattendance=0;
		 if (count($results) > 0) {
			 foreach ($results as $kk => $client) {
		 		if (count($client) > 0) {
					foreach ($client as $tt) {
						$pha_guard = (int)$tt->pha_guard;
						$pha_lguard = (int)$tt->pha_lguard;
						$pha_hguard = (int)$tt->pha_hguard;
						$pha_sup = (int)$tt->pha_sup;
						$pha_aso = (int)$tt->pha_aso;
						$pha_so = (int)$tt->pha_so;
						
						if($pha_guard>0) $pattendance = $pattendance+$pha_guard;
						if($pha_lguard>0) $pattendance = $pattendance+$pha_lguard;
						if($pha_hguard>0) $pattendance = $pattendance+$pha_hguard;
						if($pha_sup>0) $pattendance = $pattendance+$pha_sup;
						if($pha_aso>0) $pattendance = $pattendance+$pha_aso;
						if($pha_so>0) $pattendance = $pattendance+$pha_so; 
						$resrow = array();
		 				$resrow['sno'] = $i;
					    $resrow['site'] = $siteattrname[$kk];
					    $resrow['report_on'] = date("d-m-Y", strtotime($tt->reporton));
					    $rdate = date("d-m-Y", strtotime($tt->reporton));
					    $checkval = checkDailyStatus($rdate, $kk);
					   // $pattendance = $tt->pha_guard + $tt->pha_lguard+$tt->pha_hguard+$tt->pha_sup+$tt->pha_aso+$tt->pha_so;
					    $resrow['paattendance'] =  $pattendance;
					    $resrow['bmguard'] =  $tt->bm_guard;
					    $resrow['bmlguard'] =  $tt->bm_lguard;
					    $resrow['bmhguard'] =  $tt->bm_hguard;
					    $resrow['bmsup'] =  $tt->bm_sup;
					    $resrow['bmaso'] =  $tt->bm_aso;
					    $resrow['bmso'] =  $tt->bm_so;
					    $resrow['aeguard'] =  $tt->ae_guard;
					    $resrow['aelguard'] =  $tt->ae_lguard;
					    $resrow['aehguard'] =  $tt->ae_hguard;
					    $resrow['aesup'] =  $tt->ae_sup;
					    $resrow['aeaso'] =  $tt->ae_aso;
					    $resrow['aeso'] =  $tt->ae_so;
					    $i = $i + 1; 
					    $paymentsArray[] =  $resrow;
					}
				}
			}
		}
			

	// Generate and return the spreadsheet
    Excel::create('Security_DailyBriefingAttendance_Submission', function($excel) use ($paymentsArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('Security_DailyBriefingAttendance_Submission');
        $excel->setCreator('Laravel')->setCompany('Aparna');
        $excel->setDescription('securitydailybriefingattendancesubmission file');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($paymentsArray) {
            $sheet->fromArray($paymentsArray, null, 'A1', false, false);
        });

    })->download('xlsx');
 
    } 
	
	public function securitya20()

    { 	
		 return view('audit.auditdetail.securitya20');

    } 
	
	public function securitya21()

    { 	
		 return view('audit.auditdetail.securitya21');

    } 
	
		public function securitya22()

    { 	
		 return view('audit.auditdetail.securitya22');

    } 
	
	
		public function securitya23()

    { 	
		 return view('audit.auditdetail.securitya23');

    } 
		public function securitya24()

    { 	
		 return view('audit.auditdetail.securitya24');

    } 
	


    /**

     * Store a newly created Client in storage.

     *

     * @param  \App\Http\Requests\StoreClientsRequest  $request

     * @return \Illuminate\Http\Response

     */

    public function store(StoreIndentsRequest $request)

    {

        $edata = $request->all();

        /*$taskRow = Task::where('tcode', trim($edata['tcode']))->first();        
        if($taskRow) return redirect()->back()->withErrors('Task code already exists');*/        

        $etinfo = [
                        'item_code' => $edata['item_code'],
						'site' => $edata['site'],
                        'title' => $edata['title'],
                        'user_id' => Auth::user()->id,
						'priority' => $edata['priority'],
                        'description' => $edata['description'],
                        'created_at' => date('Y-m-d H:i:s')
                    ];
        $id = Indent::insertGetId($etinfo);
      

        return redirect()->route('indents.index');

    }



    public function snagindex(Request $request)

    { 	
		 //echo  Auth::user()->id;
		 //echo  Auth::user()->emp_id;
	     if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('name', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('name', 'ASC')->get()->pluck('name', 'id')->prepend('ALL', '');
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('name', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('name', 'ASC')->get()->pluck('name', 'id')->prepend('ALL', '');
		  } 

		  $categorynames = \App\Snagcategory::orderBy('cattitle', 'ASC')->get()->pluck('cattitle', 'id');
		  $categories = \App\Snagcategory::orderBy('cattitle', 'ASC')->get()->pluck('cattitle', 'id')->prepend('ALL', '');
		  
		  //$categorynames = \App\Snagcategory::orderBy('cattitle', 'ASC')->get()->pluck('cattitle', 'id');
		  $locations = \App\Snagreport::groupBy('location')->orderBy('location', 'ASC')->get()->pluck('location', 'location')->prepend('ALL', '');
		
			$results = array();
			    $cur_year = date("Y");
			    $cur_month = date("m");
			    $today = date("Y-m-d");
			   $startdate = $cur_year."-".$cur_month."-"."01";
			foreach($siteattrname as $kk => $site){
				$audit_cn = Snagreport::where('sid', '=', $kk)->where('status', '=','1')
				->orWhere('status', '=', '2')
				->orderBy('reporton', 'DESC')
				->count();
			   if($audit_cn > 0){
			    $audit_res = Snagreport::where('sid', '=', $kk)->where('status', '=','1')
				->orWhere('status', '=', '2')
				->orderBy('reporton', 'DESC')
				->get();
			   $results[$kk] = $audit_res;
			   }
			} 
		  $relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'categories' => $categories,
			'locations' => $locations,
			'categorynames' => $categorynames,
			'auditresult' => $results
			]; 
		 return view('misreports.snagindex', $relations);
    }

	public function getsnagreportcreate()
	{
		if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('name', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', '');;
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('name', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', '');;
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('name', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', '');;
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('name', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', '');;
		  } 

		  $categorynames = \App\Snagcategory::orderBy('cattitle', 'ASC')->get()->pluck('cattitle', 'id')->prepend('Please Select', '');;
		  $categories = \App\Snagcategory::orderBy('cattitle', 'ASC')->get()->pluck('cattitle', 'id')->prepend('Please Select', '');;


		$relations = [
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'categories' => $categories,
			'categorynames' => $categorynames
			]; 
			
					  
		return view('misreports.snagcreate',$relations);
	}

    public function getsnagreports(Request $request)
    { 	
	  
	 $edata = $request->all();
	 $siteCount=0;
	 $fromdate = date("Y-m-d",strtotime($edata['fromdate']));
	 $todate = date("Y-m-d",strtotime($edata['todate']));
	 $site = $edata['site'];
	 $cat = $edata['category'];
	 $location = $edata['location'];
	 $audit_res = array();
	 $data = array();
	 
	 $match = array();
	 
	 
	 if(Auth::user()->id == 1){
	  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
	  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', '');
	  }else{

		$role_id = Auth::user()->role_id;
		$emp_id = Auth::user()->emp_id;
		$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
		$siteinfo = $getemp_info->community;
		$sitearr = explode(",",$siteinfo);
		$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
	  } 
	  
	  
	
	
	if ($edata['fromdate']) {
	  $frm_Date = date("Y-m-d",strtotime($edata['fromdate']));		  
	   $match[] = "snagreports.reporton,>=,$frm_Date";
	   
	}
	
	
   if ($edata['todate']){
		$to_Date = date("Y-m-d",strtotime($edata['todate']));		  
		//$to_Date = date("Y-m-d",strtotime($edata['to_date']))." 23:59:59";			
		  $match[] = "snagreports.reporton,<=,$to_Date";
	} 
	
	if ($edata['site'] && $edata['site']!='') {
	   $siteCount=1;
	   $site = $edata['site']; 
	   $match[] = "snagreports.sid,=,$site";
	}/*
	
	if ($edata['category'] && count($edata['category']==1)) {
	   $category = $edata['category']; 
	   $match[] = "snagreports.cid,=,$category";
	}*/
		
	$str = "";
	$fst = array();
	 if(count($match) > 0){
		
	   foreach($match as $key => $ma){
		$fst[$key] =  explode(",",$ma);
	   }
	 }	
	 $sites = "";
	 foreach($siteattrname as $kk => $site){
	  if($site!="") $sites .= $kk.",";
	}
	$sites = rtrim($sites,' ');
	$sites = explode(",",$sites);
	
	$catCount =  count($edata['category']);
	$cats = "";
	$EmptyTestArray = in_array("",$edata['category']);
	if($catCount>0 && $EmptyTestArray!=1)
	{
		foreach($edata['category'] as $cat){
		 //echo "<pre>"; print_r($cat); echo "</pre>";
		  $cats .= $cat.",";
		}
		$cats = rtrim($cats,',');
		$cats = explode(",",$cats);
	}
	
	$locationCount =  count($edata['location']);
	$locations = "";
	$LEmptyTestArray = in_array("",$edata['location']);
	if($locationCount>0 && $LEmptyTestArray!=1)
	{
		foreach($edata['location'] as $location){
		 //echo "<pre>"; print_r($cat); echo "</pre>";
		  $locations .= $location.",";
		}
		$locations = rtrim($locations,',');
		$locations = explode(",",$locations);
	}
	
	//echo "<pre>"; print_r($cats); echo "</pre>";
	//exit;
	// echo $siteCount;
	 //echo $catCount;
	 if(count($fst)>0)
	 {
	 	  /*if($siteCount==0 && (Auth::user()->id <> 1) && $catCount>0)
		  $audit_res = Snagreport::select('snagreports.*')->Where($fst)->whereIn('sid', $sites)->whereIn('cid', $cats)->get();
		  else if($siteCount==0 && (Auth::user()->id <> 1) && $catCount==0)
		  $audit_res = Snagreport::select('snagreports.*')->Where($fst)->whereIn('sid', $sites)->get();
		  else if($siteCount==1 && (Auth::user()->id <> 1) && $catCount>0)
		  $audit_res = Snagreport::select('snagreports.*')->Where($fst)->whereIn('cid', $cats)->get();
		  else if(Auth::user()->id == 1 && $catCount>0)
		  $audit_res = Snagreport::select('snagreports.*')->Where($fst)->whereIn('cid', $cats)->get();
		  else
		  $audit_res = Snagreport::select('snagreports.*')->Where($fst)->get();*/
		  
		  
		  if(Auth::user()->id == 1)
		  {
		  	 //echo "sdasdsa";
		  	/* if($siteCount==0)
			 {}
			 else
			 {
			 	if($catCount>0 && $EmptyTestArray!=1)
				{
			 		if($edata['status']==1)
					$audit_res = Snagreport::select('snagreports.*')->Where($fst)->whereIn('cid', $cats)->where('status', '=','1')
					->orWhere('status', '=', '2')->get();
					else
					$audit_res = Snagreport::select('snagreports.*')->Where($fst)->whereIn('cid', $cats)->where('status', '=','0')->get();
				}
				else
				{
					if($edata['status']==1)
					$audit_res = Snagreport::select('snagreports.*')->Where($fst)->where('status', '=','1')
					->orWhere('status', '=', '2')->get();
					else
					$audit_res = Snagreport::select('snagreports.*')->Where($fst)->where('status', '=','0')->get();
				}
			 }*/			 
			 
			if(($catCount>0 && $EmptyTestArray!=1) && ($locationCount>0 && $LEmptyTestArray!=1))
			{
				if($edata['status']==1)
				$audit_res = Snagreport::select('snagreports.*')->Where($fst)->whereIn('cid', $cats)->whereIn('location', $locations)->where('status', '=','1')->orWhere('status', '=', '2')->get();
				else
				$audit_res = Snagreport::select('snagreports.*')->Where($fst)->whereIn('cid', $cats)->whereIn('location', $locations)->where('status', '=','0')->get();
			}
			else if($catCount>0 && $EmptyTestArray!=1)
			{
				if($edata['status']==1)
				$audit_res = Snagreport::select('snagreports.*')->Where($fst)->whereIn('cid', $cats)->where('status', '=','1')->orWhere('status', '=', '2')->get();
				else
				$audit_res = Snagreport::select('snagreports.*')->Where($fst)->whereIn('cid', $cats)->where('status', '=','0')->get();
			}
			else if($locationCount>0 && $LEmptyTestArray!=1)
			{
				if($edata['status']==1)
				$audit_res = Snagreport::select('snagreports.*')->Where($fst)->whereIn('location', $locations)->where('status', '=','1')->orWhere('status', '=', '2')->get();
				else
				$audit_res = Snagreport::select('snagreports.*')->Where($fst)->whereIn('location', $locations)->where('status', '=','0')->get();
			}
			else
			{
				if($edata['status']==1)
				$audit_res = Snagreport::select('snagreports.*')->Where($fst)->where('status', '=','1')->orWhere('status', '=', '2')->get();
				else
				$audit_res = Snagreport::select('snagreports.*')->Where($fst)->where('status', '=','0')->get();
			}
		  }
		  else
		  {
		  		if($siteCount==0)
				{
					if(($catCount>0 && $EmptyTestArray!=1) && ($locationCount>0 && $LEmptyTestArray!=1))
					{
						if($edata['status']==1)
						$audit_res = Snagreport::select('snagreports.*')->Where($fst)->whereIn('sid', $sites)->whereIn('cid', $cats)->whereIn('location', $locations)->where('status', '=','1')->orWhere('status', '=', '2')->get();
						else
						$audit_res = Snagreport::select('snagreports.*')->Where($fst)->whereIn('sid', $sites)->whereIn('cid', $cats)->whereIn('location', $locations)->where('status', '=','0')->get();
					}
					else if($catCount>0 && $EmptyTestArray!=1)
					{
						if($edata['status']==1)
						$audit_res = Snagreport::select('snagreports.*')->Where($fst)->whereIn('sid', $sites)->whereIn('cid', $cats)->where('status', '=','1')->orWhere('status', '=', '2')->get();
						else
						$audit_res = Snagreport::select('snagreports.*')->Where($fst)->whereIn('sid', $sites)->whereIn('cid', $cats)->where('status', '=','0')->get();
					}
					else if($locationCount>0 && $LEmptyTestArray!=1)
					{
						if($edata['status']==1)
						$audit_res = Snagreport::select('snagreports.*')->Where($fst)->whereIn('sid', $sites)->whereIn('cid', $cats)->whereIn('location', $locations)->where('status', '=','1')->orWhere('status', '=', '2')->get();
						else
						$audit_res = Snagreport::select('snagreports.*')->Where($fst)->whereIn('sid', $sites)->whereIn('location', $locations)->where('status', '=','0')->get();
					}
					else
					{
						if($edata['status']==1)
						$audit_res = Snagreport::select('snagreports.*')->Where($fst)->whereIn('sid', $sites)->whereIn('cid', $cats)->where('status', '=','1')->orWhere('status', '=', '2')->get();
						else
						$audit_res = Snagreport::select('snagreports.*')->Where($fst)->whereIn('sid', $sites)->whereIn('cid', $cats)->where('status', '=','0')->get();
					}
				}
				else
				{
					if(($catCount>0 && $EmptyTestArray!=1) && ($locationCount>0 && $LEmptyTestArray!=1))
					{
						if($edata['status']==1)
						$audit_res = Snagreport::select('snagreports.*')->Where($fst)->whereIn('cid', $cats)->whereIn('location', $locations)->where('status', '=','1')->orWhere('status', '=', '2')->get();
						else
						$audit_res = Snagreport::select('snagreports.*')->Where($fst)->whereIn('cid', $cats)->whereIn('location', $locations)->where('status', '=','0')->get();
					}
					else if($catCount>0 && $EmptyTestArray!=1)
					{
						if($edata['status']==1)
						$audit_res = Snagreport::select('snagreports.*')->Where($fst)->whereIn('cid', $cats)->where('status', '=','1')->orWhere('status', '=', '2')->get();
						else
						$audit_res = Snagreport::select('snagreports.*')->Where($fst)->whereIn('cid', $cats)->where('status', '=','0')->get();
					}
					else if($locationCount>0 && $LEmptyTestArray!=1)
					{
						if($edata['status']==1)
						$audit_res = Snagreport::select('snagreports.*')->Where($fst)->whereIn('location', $locations)->where('status', '=','1')->orWhere('status', '=', '2')->get();
						else
						$audit_res = Snagreport::select('snagreports.*')->Where($fst)->whereIn('location', $locations)->where('status', '=','0')->get();
					}
					else
					{
						if($edata['status']==1)
						$audit_res = Snagreport::select('snagreports.*')->Where($fst)->where('status', '=','1')->orWhere('status', '=', '2')->get();
						else
						$audit_res = Snagreport::select('snagreports.*')->Where($fst)->where('status', '=','0')->get();
					}
				}
		  }
	 }
	 else
	 {
		if($catCount>0 && $EmptyTestArray!=1)
		{
			if($edata['status']==1)
			$audit_res = Snagreport::select('snagreports.*')->Where($fst)->whereIn('cid', $cats)->where('status', '=','1')
			->orWhere('status', '=', '2')->get();
			else
			$audit_res = Snagreport::select('snagreports.*')->Where($fst)->whereIn('cid', $cats)->where('status', '=','0')->get();
		}
		else
		{
			if($edata['status']==1)
			$audit_res = Snagreport::select('snagreports.*')->Where($fst)->where('status', '=','1')
			->orWhere('status', '=', '2')->get();
			else
			$audit_res = Snagreport::select('snagreports.*')->Where($fst)->where('status', '=','0')->get();
		}		 
	 }
	 
	 $nsite = "";
	 $psite = "";
	 $ncat = "";
	 $pcat = "";
	 $scount=0;
	 $catcount=0;
	 if(count($audit_res)>0)
	 {
		 foreach($audit_res as $key=>$res)
		 {
		 		 $psite = $nsite;
				 $pcat = $ncat;
				 $site = Site::where('id', $res->sid)->where('status', '=', '1')->first();
				 $nsite = $site->name;
				 $category = Snagcategory::where('id', $res->cid)->first();	
				 $ncat = $category->cattitle;
				 if($psite!=$nsite) $scount = $scount +1;
				 if($pcat!=$ncat) $catcount = $catcount +1;
				 $data[$key]['id'] = $res->id;
				 $data[$key]['site'] = $nsite;
				 $data[$key]['category'] = $res->cattitle;
				 $data[$key]['observation'] = $res->observation;
				 $data[$key]['location'] = $res->location;
				 $data[$key]['rectype'] = $res->reporton;
				 $data[$key]['recommendation'] = $res->recommendation;
				 $data[$key]['recimagepath'] = $res->recimagepath;
				 $data[$key]['imagepath'] = $res->imagepath;
				 $data[$key]['reporton'] = $res->reporton;
				 $data[$key]['timeline'] = $res->timeline;
				 $data[$key]['status'] = $res->status;
		 } 
	 }
	
	/*echo "<pre>"; print_r($data); echo "</pre>";
	exit;*/
  	$relations = [
	'auditresult' => $data,
	'scount' => $scount,
	'catcount' => $catcount
	];
	 return view('misreports.snagdetail', $relations);
 	}	
	
	
	public function getsnagreportexport(Request $request)
    {
		$edata = $request->all();
		 $siteCount=0;
		 $catCount = 0;
		 $fromdate = date("Y-m-d",strtotime($edata['fromdate']));
		 $todate = date("Y-m-d",strtotime($edata['todate']));
		 $site = $edata['site'];
		 $cat = $edata['category'];
		 $fields = $edata['sfileds'];
		 $audit_res = array();
		 $data = array();	 
		 $match = array();
		 
		 
		 if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('name', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('name', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', '');
		  }else{
	
			$role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('name', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('name', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  } 
		  
		  
		
		
		if ($edata['fromdate']) {
		  $frm_Date = date("Y-m-d",strtotime($edata['fromdate']));		  
		   $match[] = "snagreports.reporton,>=,$frm_Date";
		   
		}
		
		
	   if ($edata['todate']){
			$to_Date = date("Y-m-d",strtotime($edata['todate']));		  
			//$to_Date = date("Y-m-d",strtotime($edata['to_date']))." 23:59:59";			
			  $match[] = "snagreports.reporton,<=,$to_Date";
		} 
		
		if ($edata['site'] && $edata['site']!='') {
		   $siteCount=1;
		   $site = $edata['site']; 
		   $match[] = "snagreports.sid,=,$site";
		}
		
		if ($edata['category'] && count($edata['category']!='')) {
		   $category = $edata['category']; 
		   $match[] = "snagreports.cid,=,$category";
		}
			
		$str = "";
		$fst = array();
		 if(count($match) > 0){
			
		   foreach($match as $key => $ma){
			$fst[$key] =  explode(",",$ma);
		   }
		 }	
		 $sites = "";
		 foreach($siteattrname as $kk => $site){
		  $sites .= $kk." ";
		}
		$sites = rtrim($sites,' ');
		$sites = explode(",",$sites);
	 if(count($fst)>0)
	 {
	 	 
		 // echo "<pre>"; print_r($fst); echo "</pre>";
		  if(Auth::user()->id == 1)
		  {
		  	if($edata['status']==1)
			//$audit_res =  Snagreport::select('snagreports.*', 'snagcategories.cattitle')->leftJoin('snagcategories','snagcategories.id','=','snagreports.cid')->Where($fst)->Where('location', 'LIKE', "I%")->orderBy('snagcategories.cattitle', 'ASC')->where('status', '=','1')->orWhere('status', '=', '2')->get();
			
			$audit_res =  Snagreport::select('snagreports.*', 'snagcategories.cattitle')->leftJoin('snagcategories','snagcategories.id','=','snagreports.cid')->Where($fst)->Where('location', 'LIKE', "Tennis court")->orderBy('snagcategories.cattitle', 'ASC')->where('status', '=','1')->orWhere('status', '=', '2')->get();
			else
			 $audit_res =  Snagreport::select('snagreports.*', 'snagcategories.cattitle')->leftJoin('snagcategories','snagcategories.id','=','snagreports.cid')->Where($fst)->orderBy('snagcategories.cattitle', 'ASC')->where('status', '=','0')->get();
		  }
		  else
		  {
		  	  if($edata['status']==1)
		  	  $audit_res =  Snagreport::select('snagreports.*', 'snagcategories.cattitle')->leftJoin('snagcategories','snagcategories.id','=','snagreports.cid')->Where($fst)->orderBy('snagcategories.cattitle', 'ASC')->where('status', '=','1')
			->orWhere('status', '=', '2')->get();
			else
			$audit_res =  Snagreport::select('snagreports.*', 'snagcategories.cattitle')->leftJoin('snagcategories','snagcategories.id','=','snagreports.cid')->Where($fst)->orderBy('snagcategories.cattitle', 'ASC')->where('status', '=','0')->get();
		  }
	 }
	 else
	 {
	 	  if($edata['status']==1)
	 	  $audit_res = Snagreport::select('snagreports.*')->where('status', '=','1')->orWhere('status', '=', '2')->get();
		  else
		  $audit_res = Snagreport::select('snagreports.*')->where('status', '=','0')->get();
	 }
	 
		 $paymentsArray = array();
	  	 $paymentsArray[] = ['S.No', 'Site', 'Category', 'Observation', 'Location', 'Picture', 'Recommendation','Snag Report Date','Timeline given by Projects team','Status'];
		 $nsite = "";
		 $psite = "";
		 $ncat = "";
		 $pcat = "";
		 $scount=0;
		 $catcount=0;
		 $i = 0;
		 $nsite = "";
		 $psite = "";
		 $ncat = "";
		 $pcat = "";
		 $scount=0;
		 $catcount=0;
		 $i = 0;
		 if(count($audit_res)>0)
		 {
			 foreach($audit_res as $key=>$res)
			 {
					 $i++;
					 $psite = $nsite;
					 $pcat = $ncat;
					 $site = Site::where('id', $res->sid)->where('status', '=', '1')->first();
					 $nsite = $site->name;
					 $category = Snagcategory::where('id', $res->cid)->first();	
					 $ncat = $category->cattitle;
					 if($psite!=$nsite) $scount = $scount +1;
					 if($pcat!=$ncat) $catcount = $catcount +1;
					 if($res->status==1) $status = "Open"; 
					 else $status = "Closed";
					 $site = Site::where('id', $res->sid)->where('status', '=', '1')->first();
					 $category = Snagcategory::where('id', $res->cid)->first();
					 $data[$key]['i'] = $i;
					 $data[$key]['site'] = $site->name;
					 $data[$key]['category'] = $category->cattitle;
					 $data[$key]['observation'] = $res->observation;
					 $data[$key]['location'] = $res->location;
					 $data[$key]['imagepath'] = $res->imagepath;
					 $data[$key]['rectype'] = $res->rectype;
					 $data[$key]['recimagepath'] = $res->recimagepath;
					 $data[$key]['recommendation'] = $res->recommendation;
					 $data[$key]['reporton'] = date("d/m/Y",strtotime($res->reporton));
					 $data[$key]['timeline'] = $res->timeline;
					 $data[$key]['status'] = $status;
					 $paymentsArray[] =  $data[$key];
			 } 
		 }
		
		
		Excel::create('Snag_Report', function($excel) use ($paymentsArray) {
		$excel->getDefaultStyle()
		->getAlignment()
		->setVertical(\PHPExcel_Style_Alignment::VERTICAL_TOP);
	
		// Set the spreadsheet title, creator, and description
		$excel->setTitle('Snag_Report');
		$excel->setCreator('Laravel')->setCompany('Aparna');
		$excel->setDescription('snagreportsubmission file');
		//echo "<pre>"; print_r($paymentsArray); echo "</pre>";
		// Build the spreadsheet, passing in the payments array
		$excel->sheet('sheet1', function($sheet) use ($paymentsArray) {	
				
				$sheet->fromArray($paymentsArray, null, 'A1', false, false);	
				//$sheet->getColumnDimension('B')->setVisible(false);
				for ($i = 1; $i < count($paymentsArray); $i++) {
					$j = $i+1;
					$maxCell = 'F'; 			 	
					$sheet->setCellValue($maxCell.$j, "");  
					$image2 = $paymentsArray[$i]['imagepath'];
					$image = public_path('uploads/snag/thumb/'.$image2);
					if($image2!="" && file_exists($image))
					{
						$objDrawing = new PHPExcel_Worksheet_Drawing;
						
						$objDrawing = new PHPExcel_Worksheet_Drawing;
						$objDrawing->setPath($image); //your image path
						$objDrawing->setWidthAndHeight(150,150);
						$objDrawing->setResizeProportional(true);
						$objDrawing->setCoordinates($maxCell.$j);
						$sheet->setSize(array(
							'F'.$j => array(
								'width'     => 21,
								'height'    => 113
							)
						));
						$objDrawing->setWorksheet($sheet); 
						$sheet->getStyle('A'.$j)->getAlignment()->setWrapText(true);
						$sheet->getStyle('B'.$j)->getAlignment()->setWrapText(true);
						$sheet->getStyle('C'.$j)->getAlignment()->setWrapText(true);
						$sheet->getStyle('D'.$j)->getAlignment()->setWrapText(true);
						$sheet->getStyle('E'.$j)->getAlignment()->setWrapText(true);
						$sheet->getStyle('F'.$j)->getAlignment()->setWrapText(true);
						$sheet->getStyle('G'.$j)->getAlignment()->setWrapText(true);
						$sheet->getStyle('H'.$j)->getAlignment()->setWrapText(true);
				  }
				}
			});
		  })->download('xlsx');	
		}
		
		
		
		public function getsummaryreport(Request $request)
		{
		
		 $edata = $request->all();
		 $fromdate = date("Y-m-d",strtotime($edata['fromdate']));
		 $todate = date("Y-m-d",strtotime($edata['todate']));
		 $site = $edata['site'];
		 $audit_res = array();
		 $data = array();
		 $match = array();
		
		if ($edata['fromdate']) {
		  $frm_Date = date("Y-m-d",strtotime($edata['fromdate']));		  
		   $match[] = "snagreports.reporton,>=,$frm_Date";
		   
		}
		
		
	   if ($edata['todate']){
			$to_Date = date("Y-m-d",strtotime($edata['todate']));			
			  $match[] = "snagreports.reporton,<=,$to_Date";
		} 
		
		if ($edata['site']) {
		   $site = $edata['site']; 
		   $match[] = "snagreports.sid,=,$site";
		}
		
		$str = "";
		$fst = array();
		 if(count($match) > 0){	   
		   foreach($match as $key => $ma){
			$fst[$key] =  explode(",",$ma);
		   }
		 }
		
		 if(count($fst)>0)
		 {
			  $audit_res =  Snagreport::select('snagreports.*', 'snagcategories.cattitle')->leftJoin('snagcategories','snagcategories.id','=','snagreports.cid')->groupBy('snagreports.cid')->Where($fst)->orderBy('snagcategories.cattitle', 'ASC')->get();
		 }
		 else
		 {
			  $audit_res =  Snagreport::select('snagreports.*', 'snagcategories.cattitle')->leftJoin('snagcategories','snagcategories.id','=','snagreports.cid')->groupBy('snagreports.cid')->Where($fst)->get();
		 }
		 $paymentsArray = array();
		 $sitename = "";
		 $openstatus  = 0;
		 $closedstatus=0;
		 $totalstatus=0;
		 $site = Site::where('id', $edata['site'])->where('status', '=', '1')->first();
		 if($site) $sitename =  $site['name'];
		 $i = 0;
		 $paymentsArray[] =  ["Aparna ".$sitename." - Summary of Snags"];
		 $paymentsArray[] =  ['S.No', 'Description', 'Total as on '.$edata['fromdate'], 'Status as on '.$edata['todate']];
		 $paymentsArray[] =  [];
		 if (count($audit_res) > 0) 
		 {
			$alltotals = 0;
			$allclosed = 0;
			$allopen = 0;
			foreach($audit_res as $key=>$res)
			 {
					
					 $i++;				 
					 $category = Snagcategory::where('id', $res->cid)->first();
					 $openstatus = Snagreport::where('status', 1)->where('cid', $res->cid)->where('sid', $res->sid)->count();				 
					 $closedstatus = Snagreport::where('status', 0)->where('cid', $res->cid)->where('sid', $res->sid)->count();
					 if($openstatus) $openstatus = $openstatus;
					 else $openstatus = 0;	
					 
					 if($closedstatus) $closedstatus = $closedstatus;
					 else $closedstatus = 0;	
					 
					 $data[$key]['sno'] = $i;
					 $data[$key]['category'] = $category->cattitle;
					 $data[$key]['total'] = $openstatus+$closedstatus;
					 $data[$key]['close'] = $closedstatus;
					 $data[$key]['open'] = $openstatus;
					 $alltotals +=  $openstatus+$closedstatus;
					 $allclosed +=  $closedstatus;
					 $allopen +=  $openstatus;
					 $paymentsArray[] =  $data[$key];
			 }	
			$overallCount = count($audit_res)+1;
			$paymentsArray[] = ['Total', '', $alltotals, $allclosed, $allopen];
			$paymentsArray[] = [''];
	 }	
	 
	 
	 
	 //echo "<pre>"; print_r($paymentsArray); echo "</pre>";
	 //exit;
	
	Excel::create('Snag_Report', function($excel) use ($paymentsArray) {
		//$overallCount = count($audit_res);
		// Set the spreadsheet title, creator, and description
		$excel->setTitle('Snag_Report');
		$excel->setCreator('Laravel')->setCompany('Aparna');
		$excel->setDescription('snagreportsubmission file');
	
		// Build the spreadsheet, passing in the payments array
		$excel->sheet('sheet1', function($sheet) use ($paymentsArray) {	
		 	$sheet->fromArray($paymentsArray, null, 'A1', false, false);			
			$styleArray = array(
			  'borders' => array(
				'allborders' => array(
				  'style' => PHPExcel_Style_Border::BORDER_THIN
				)
			  )
			);
			//$sheet->row(1, ["Aparna West Side - Summary of Snags"]);
			$sheet->mergeCells('A1:E1');
			//$sheet->row(2, ['S.No', 'Description', 'Total as on 12.03.2019', 'Status as on 26-3-19']);
			$sheet->mergeCells('A2:A3');
			$sheet->mergeCells('B2:B3');
			$sheet->mergeCells('D2:E2');
			$sheet->setCellValue('C3', "Total"); 
			$sheet->setCellValue('D3', "Closed"); 
			$sheet->setCellValue('E3', "Open"); 
		});
		$excel->getDefaultStyle()
			->getAlignment()
			->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	
	})->download('xlsx');	
	}
	
	public function getsnagreportpdf(Request $request)
    {
		 $edata = $request->all();
		 $siteCount=0;
		 $catCount = 0;
		 $fromdate = date("Y-m-d",strtotime($edata['fromdate']));
		 $todate = date("Y-m-d",strtotime($edata['todate']));
		 $site = $edata['site'];
		 $cat = $edata['category'];
		 $fields = $edata['sfileds'];
		 $audit_res = array();
		 $data = array();	 
		 $match = array();
		 
		 
		 if(Auth::user()->id == 1){
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('name', 'ASC')->get()->pluck('name', 'id');
		  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('name', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', '');
		  }else{
	
			$role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('name', 'ASC')->get()->pluck('name', 'id');
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('name', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  } 
		  
		  
		
		
		if ($edata['fromdate']) {
		  $frm_Date = date("Y-m-d",strtotime($edata['fromdate']));		  
		   $match[] = "snagreports.reporton,>=,$frm_Date";
		   
		}
		
		
	   if ($edata['todate']){
			$to_Date = date("Y-m-d",strtotime($edata['todate']));		  
			//$to_Date = date("Y-m-d",strtotime($edata['to_date']))." 23:59:59";			
			  $match[] = "snagreports.reporton,<=,$to_Date";
		} 
		
		if ($edata['site'] && $edata['site']!='') {
		   $siteCount=1;
		   $site = $edata['site']; 
		   $match[] = "snagreports.sid,=,$site";
		}
		
		if ($edata['category'] && count($edata['category']!='')) {
		   $category = $edata['category']; 
		   $match[] = "snagreports.cid,=,$category";
		}
			
		$str = "";
		$fst = array();
		 if(count($match) > 0){
			
		   foreach($match as $key => $ma){
			$fst[$key] =  explode(",",$ma);
		   }
		 }	
		 $sites = "";
		 foreach($siteattrname as $kk => $site){
		  $sites .= $kk." ";
		}
		$sites = rtrim($sites,' ');
		$sites = explode(",",$sites);
	 if(count($fst)>0)
	 {
	 	 
		 // echo "<pre>"; print_r($fst); echo "</pre>";
		  if(Auth::user()->id == 1)
		  {
		  	if($edata['status']==1)
			$audit_res =  Snagreport::select('snagreports.*', 'snagcategories.cattitle')->leftJoin('snagcategories','snagcategories.id','=','snagreports.cid')->Where($fst)->orderBy('snagcategories.cattitle', 'ASC')->where('status', '=','1')
			->orWhere('status', '=', '2')->get();
			else
			 $audit_res =  Snagreport::select('snagreports.*', 'snagcategories.cattitle')->leftJoin('snagcategories','snagcategories.id','=','snagreports.cid')->Where($fst)->orderBy('snagcategories.cattitle', 'ASC')->where('status', '=','0')->get();
		  }
		  else
		  {
		  	  if($edata['status']==1)
		  	  $audit_res =  Snagreport::select('snagreports.*', 'snagcategories.cattitle')->leftJoin('snagcategories','snagcategories.id','=','snagreports.cid')->Where($fst)->orderBy('snagcategories.cattitle', 'ASC')->where('status', '=','1')
			->orWhere('status', '=', '2')->get();
			else
			$audit_res =  Snagreport::select('snagreports.*', 'snagcategories.cattitle')->leftJoin('snagcategories','snagcategories.id','=','snagreports.cid')->Where($fst)->orderBy('snagcategories.cattitle', 'ASC')->where('status', '=','0')->get();
		  }
	 }
	 else
	 {
	 	  if($edata['status']==1)
	 	  $audit_res = Snagreport::select('snagreports.*')->where('status', '=','1')->orWhere('status', '=', '2')->get();
		  else
		  $audit_res = Snagreport::select('snagreports.*')->where('status', '=','0')->get();
	 }
	 
		 $nsite = "";
		 $psite = "";
		 $ncat = "";
		 $pcat = "";
		 $scount=0;
		 $catcount=0;
		 $i = 0;
		 $nsite = "";
		 $psite = "";
		 $ncat = "";
		 $pcat = "";
		 $scount=0;
		 $catcount=0;
		 $i = 0;
		 if(count($audit_res)>0)
		 {
			 foreach($audit_res as $key=>$res)
			 {
					 $i++;
					 $psite = $nsite;
					 $pcat = $ncat;
					 $site = Site::where('id', $res->sid)->where('status', '=', '1')->first();
					 $nsite = $site->name;
					 $category = Snagcategory::where('id', $res->cid)->first();	
					 $ncat = $category->cattitle;
					 if($psite!=$nsite) $scount = $scount +1;
					 if($pcat!=$ncat) $catcount = $catcount +1;
					 if($res->status==1) $status = "Open"; 
					 else $status = "Closed";
					 $site = Site::where('id', $res->sid)->where('status', '=', '1')->first();
					 $category = Snagcategory::where('id', $res->cid)->first();
					 $data[$key]['i'] = $i;
					 $data[$key]['site'] = $site->name;
					 $data[$key]['category'] = $category->cattitle;
					 $data[$key]['observation'] = $res->observation;
					 $data[$key]['location'] = $res->location;
					 $data[$key]['imagepath'] = $res->imagepath;
					 $data[$key]['rectype'] = $res->rectype;
					 $data[$key]['recimagepath'] = $res->recimagepath;
					 $data[$key]['recommendation'] = $res->recommendation;
					 $data[$key]['reporton'] = $res->reporton;
					 $data[$key]['timeline'] = $res->timeline;
					 $data[$key]['status'] = $status;
			 } 
		 }
		if(count($data) > 0)
		{
			foreach($data as $kk => $tt)
			{
				$site = $tt['site'];
				$category = $tt['category'];
			}
		}
		$relations = ['auditresult' => $data,'fields' => $fields];
	
		
		//return view('asset_template.response', $relations);
		 
		//return view('test.test', $relations);
		ini_set('memory_limit','30000M');
		ini_set('max_execution_time', 30000);
		ini_set('mbstring.encoding_translation', 'On');
		
		$pdf = PDF::loadView('misreports.snagpdf',$relations);

		$pdf->setPaper('A4', 'landscape');
		 
		date_default_timezone_set('Asia/Kolkata');
		$today_date = date('d');
		$today_time = date("g:i a");
		//$monthName = date('F', mktime(0, 0, 0, $segment4, 10)); 
		
		
		// return $pdf->download('metrowater.pdf'); //Download 
		//echo 
		if($scount==1 && $catcount==1) $title = $site."_".$category."_Snagreport.pdf"; 
		else if($scount==1 && $catcount>1) $title = $site."_Snagreport.pdf"; 
		else $title = "Snagreport.pdf"; 
		return $pdf->download($title);
	}
	
	public function getsnagreportedit(Request $request)
    { 
		$sid = $request->all();
		$audit_res = Snagreport::select('snagreports.*')->Where('id',$sid)->first();
		$categorynames = \App\Snagcategory::orderBy('cattitle', 'ASC')->get()->pluck('cattitle', 'id')->prepend('Please Select', '');
		$categories = \App\Snagcategory::orderBy('cattitle', 'ASC')->get()->pluck('cattitle', 'id')->prepend('Please Select', '');		
		$relations = [
            'audit_res' => $audit_res,  
			'categories' => $categories,
			'catid' => $audit_res->cid,
			'categorynames' => $categorynames
        ];  
		return view('misreports.snagedit',$relations);
	}
	
	public function snagedit(Request $request)
    { 
		$sid = $request->all();
		$audit_res = Snagreport::select('snagreports.*')->Where('id',$sid)->first();
		$categorynames = \App\Snagcategory::orderBy('cattitle', 'ASC')->get()->pluck('cattitle', 'id')->prepend('Please Select', '');
		$categories = \App\Snagcategory::orderBy('cattitle', 'ASC')->get()->pluck('cattitle', 'id')->prepend('Please Select', '');		
		
		$relations = [
            'audit_res' => $audit_res,  
			'categories' => $categories,
			'catid' => $audit_res->cid,
			'categorynames' => $categorynames
        ];  
		
		return view('misreports.snagedit', $relations);
	}
	
	public function deletesnagreport(Request $request)
    { 
		$edata = $request->all();
		$id = $request->sid;	
		$client = Snagreport::findOrFail($id);	
		$client->delete();
		return redirect()->route('snagindex');
	}
	public function snagreportedit(StoreSnagRequest $request)
	{
		
	}
	public function storesnag(StoreSnagRequest $request)
	{
		$edata = $request->all();
		$recimagepath  = "";
		$recommendation = "";
		if(isset($edata['observation']) && $edata['observation']!="") $observation = $edata['observation']; else $observation = "";		
		if(isset($edata['location']) && $edata['location']!="") $location = $edata['location']; else $location = "";	
		if(isset($edata['reporton']) && $edata['reporton']!="") $reporton = date('Y-m-d', strtotime($edata['reporton'])); else $reporton = date('Y-m-d');
		if(isset($edata['timeline']) && $edata['timeline']!="") $timeline = date('Y-m-d', strtotime($edata['timeline'])); else $timeline = "";
		if(isset($edata['status']) && $edata['status']!="") $status = $edata['status']; else $status = 1;
		if(isset($edata['imagepath'])) 		
		{

			$filename = uniqid();			
			$req = $edata['imagepath'];
			$extension = $req->getClientOriginalExtension();
			$file = $req->move('uploads/snag/',$filename."_snag.".$extension);
			$filename_extension = $filename."_snag.".$extension;
			$w=150; 
			$h=150; 
			$filename_extension1 = public_path().'/uploads/snag/'.$filename.'_snag.'.$extension;
			$newfilename= public_path().'/uploads/snag/thumb/'.$filename.'_snag.'.$extension;
			resize_byratio($filename_extension1, $w, $h, $newfilename);				
			$imagepath = $filename_extension;
			$store_val  = array('imagepath'=>$imagepath);	 
			$report = Snagreport::where('id', '=', $edata['id'])->update($store_val);
		}
		
		if(isset($edata['rectype']) && $edata['rectype']!="") {
		 $rectype = $edata['rectype'];
		 if($rectype=='image')
		 {
		 	if(isset($edata['recimagepath'])) 		
			{
	
				$filename = uniqid();			
				$req = $edata['recimagepath'];
				$extension = $req->getClientOriginalExtension();
				$file = $req->move('uploads/snag/rec/',$filename."_"."rec.".$extension);
				$filename_extension = $filename."_"."rec.".$extension;
				$w=150; 
				$h=150; 
				$newfilename= public_path().'/uploads/snag/rec/thumb/'.$filename.'_rec.'.$extension;
				resize_byratio($filename_extension, $w, $h, $newfilename);				
				$recimagepath = $filename_extension;
			}
			$store_val  = array('recimagepath'=>$recimagepath);	 
			$report = Snagreport::where('id', '=', $edata['id'])->update($store_val);
		 }
		 else
		 {
		 	if(isset($edata['recommendations']) && $edata['recommendations']!="") $recommendation = $edata['recommendations']; else $recommendation = "";	
		 }
		} 
		else $rectype = "";
		
		
		if(isset($edata['remarks']) && $edata['remarks']!="") $remarks = $edata['remarks']; else $remarks = "";	
		
		 $uid = Auth::user()->id;
		 $snag_array =  array("uid"=>$uid, "observation"=>$observation, "location"=> $location, "reporton"=> $reporton, "timeline"=> $timeline, "status"=> $status, "rectype"=> $rectype, "recommendation"=> $recommendation, "remarks"=> $remarks);	
	   $report = Snagreport::where('id', '=', $edata['id'])->update($snag_array);
	   return redirect()->route('snagindex');
	}
	
	
	
	public function snagpicdelete(StoreSnagRequest $request)
	{
		
		$edata = $request->all();
		$store_val  = array('imagepath'=>"");	 
		$report = Snagreport::where('id', '=', $edata['imageId'])->update($store_val);
	}
	
	public function snagpicrdelete(StoreSnagRequest $request)
	{
		$edata = $request->all();
		$store_val  = array('recimagepath'=>"");	 
		$report = Snagreport::where('id', '=', $edata['imageId'])->update($store_val);
	}
	
	
	public function submitsnag(StoreSnagRequest $request)
	{
		
		$edata = $request->all();
		$recimagepath  = "";
		$recommendation = "";
		
		if(isset($edata['sites']) && $edata['sites']!="") $site = $edata['sites']; else $site = 0;
		if(isset($edata['categories']) && $edata['categories']!="") $category = $edata['categories']; else $category = 0;
		if(isset($edata['observation']) && $edata['observation']!="") $observation = $edata['observation']; else $observation = "";		
		if(isset($edata['location']) && $edata['location']!="") $location = $edata['location']; else $location = "";	
		if(isset($edata['reporton']) && $edata['reporton']!="") $reporton = date('Y-m-d', strtotime($edata['reporton'])); else $reporton = date('Y-m-d');
		if(isset($edata['timeline']) && $edata['timeline']!="") $timeline = date('Y-m-d', strtotime($edata['timeline'])); else $timeline = "";
		if(isset($edata['status']) && $edata['status']!="") $status = $edata['status']; else $status = 1;
		if(isset($edata['imagepath'])) 		
		{

			$filename = uniqid();			
			$req = $edata['imagepath'];
			$extension = $req->getClientOriginalExtension();
			$file = $req->move('uploads/snag/'.$filename."_snag.".$extension);
			$filename_extension = $filename."_snag.".$extension;
			$w=150; 
			$h=150; 
			$filename_extension1 = public_path().'/uploads/snag/'.$filename.'_snag.'.$extension;
			$newfilename= public_path().'/uploads/snag/thumb/'.$filename.'_snag.'.$extension;
			resize_byratio($filename_extension1, $w, $h, $newfilename);				
			$imagepath = $filename_extension;
		}
		else $imagepath = "";
		
		if(isset($edata['rectype']) && $edata['rectype']!="") {
		 $rectype = $edata['rectype'];
		 if($rectype=='image')
		 {
		 	if(isset($edata['recimagepath'])) 		
			{
	
				$filename = uniqid();			
				$req = $edata['recimagepath'];
				$extension = $req->getClientOriginalExtension();
				$file = $req->move('uploads/snag/rec/'.$filename."_rec.".$extension);
				$filename_extension = $filename."_rec.".$extension;
				$w=150; 
				$h=150; 
				$newfilename= public_path().'/uploads/snag/rec/thumb/'.$filename.'_rec.'.$extension;
				resize_byratio($filename_extension, $w, $h, $newfilename);				
				$recimagepath = $filename_extension;
			}
			else $recimagepath = "";
		 }
		 else
		 {
		 	if(isset($edata['recommendation']) && $edata['recommendation']!="") $recommendation = $edata['recommendation']; else $recommendation = "";	
		 }
		} 
		else $rectype = "";
		
		
		if(isset($edata['remarks']) && $edata['remarks']!="") $remarks = $edata['remarks']; else $remarks = "";	
		
		$uid = Auth::user()->id;
		 $snag_array =  array("uid"=>$uid, "sid"=>$site, "cid"=>$category, "observation"=>$observation, "location"=> $location, "reporton"=> $reporton, "timeline"=> $timeline, "status"=> $status, "imagepath"=> $imagepath, "rectype"=> $rectype, "recommendation"=> $recommendation, "remarks"=> $remarks, "recimagepath"=> $recimagepath);	
	   Snagreport::create($snag_array);
	   return redirect()->route('snagindex');
	}
	
	public function massDestroy(Request $request)

    {
        if ($request->input('ids')) {

            $entries = Snagreport::whereIn('id', $request->input('ids'))->get();
            foreach ($entries as $entry) {
                $entry->delete();

            }

        }

    }
	
}

