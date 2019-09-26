<?php



namespace App\Http\Controllers;



use App\Project;

use Carbon\Carbon;

use App\Transaction;

use Request;

use Auth;

use App\Emp;
 
use DB;

use PDF;

use File; 

use App\Firesafedailyreportvalidation;
use App\Pmsdailyreportvalidation;
use App\Occupancymisreport;
use App\Borewellsnwmisreport;
use App\Fmsdailyreport;
use App\Clubutilizationmisreport;

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


use App\Wspmisreport;
use App\Wspnotworkingissue;

use App\Securitymisreport;


use App\Http\Requests\StoreOccupancyRequest;
use App\Http\Requests\StoreBorewellnwRequest;
use App\Http\Requests\StoreFiresafemisRequest;
use App\Http\Requests\StoreEquipmentmisRequest;
use App\Http\Requests\StoreStpRequest;
use App\Http\Requests\StoreWspRequest;




  
 


class MisReportsController extends Controller

{

    /**

     * Index page

     *

     * @param Request $request

     *

     * @return \Illuminate\View\View

     */

    public function index1(Request $request)

    {

        $q = Transaction::with('project')

            ->with('transaction_type')

            ->with('income_source')

            ->with('currency')

            ->orderBy('transaction_date', 'desc');



        if ($request->has('project') && !empty($request->project)) {

            $q->where('project_id', $request->project);

        }



        $transactions = $q->get();



        $entries = [];

        foreach ($transactions as $row) {

            if ($row->transaction_date != null) {

                $date = Carbon::createFromFormat('Y-m-d', $row->transaction_date)->format("Y-m");

                if (!isset($entries[$date])) {

                    $entries[$date] = [];

                }

                $currency = $row->currency->code;

                if (!isset($entries[$date][$currency])) {

                    $entries[$date][$currency] = [

                        'income'   => 0,

                        'expenses' => 0,

                        'fees'     => 0,

                        'total'    => 0

                    ];

                }

                $income   = 0;

                $expenses = 0;

                $fees     = 0;

                if ($row->amount > 0) {

                    $income += $row->amount;

                } else {

                    $expenses += $row->amount;

                }

                if (!is_null($row->income_source->fee_percent)) {

                    $fees = $row->amount * ($row->income_source->fee_percent / 100);

                }



                $total = $income + $expenses - $fees;

                $entries[$date][$currency]['income'] += $income;

                $entries[$date][$currency]['expenses'] += $expenses;

                $entries[$date][$currency]['fees'] += $fees;

                $entries[$date][$currency]['total'] += $total;

            }

        }

        $projects = Project::pluck('title', 'id')->prepend('--- All projects ---', '');

        if ($request->has('project')) {

            $currentProject = $request->get('project');

        } else {

            $currentProject = '';

        }



        return view('reports.index', compact('entries', 'projects', 'currentProject'));

    }

	

	    public function index(Request $request)

    { 

	      $relations = [

            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			'sites_names' => \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('All', ''),
			'sites_attr_names' => \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id'),

        ]; 



		  return view('misreports.index', $relations);

    }  
 
	

	 public function index2(Request $request)

    {

	      $relations = [

            'client_statuses' => \App\ClientStatus::get()->pluck('title', 'id')->prepend('Please select', ''),

        ]; 

		  return view('dailyreports.index', $relations);

    }



	
		public function geteditdetailview(Request $request)

    {  

      $segment1 = Request::segment(1);
	  $segment2 = Request::segment(2);
		
       $relations = [
            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			//'sites_names' => \App\Sites::where('status', '=', '1')->get()->pluck('title', 'id')->prepend('All', ''),
			'sites_names' => \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', ''),
			'segmentval' => $segment2,  
        ];    

		/*if($segment2 == '1'){ 

		  return view('misfiles.metrowater', $relations);

		} */ 
		
		if($segment2 == '4'){ 

		  return view('misreportsdetail.index', $relations);

		}  
		
		if($segment2 == '5'){ 

		  return view('misreportsdetail.miselectromechanical', $relations);

		}  
		
		if($segment2 == '6'){ 

		  return view('misreportsdetail.misstpstatus', $relations);

		}  
		
		if($segment2 == '7'){ 

		  return view('misreportsdetail.wspstpstatus', $relations);

		}  
		
		if($segment2 == '13'){  

		  return view('misreportsdetail.exporttemp', $relations);

		}  
		
		
		if($segment2 == '14'){ 

		  return view('misreportsdetail.apnaexporttemp', $relations);

		}  
		
		if($segment2 == '15'){ 

		  return view('misreportsdetail.aparnadrill', $relations);

		}  
		
 		
    }
	
		public function getmisupdatedetailview(Request $request)

    {  

      $segment1 = Request::segment(1);
	  $segment2 = Request::segment(2);
		
       $relations = [
            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			//'sites_names' => \App\Sites::where('status', '=', '1')->get()->pluck('title', 'id')->prepend('All', ''),
			'sites_names' => \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', ''),
			'segmentval' => $segment2,  
        ];    

		if($segment2 == '4'){ 

		  return view('misreportsdetail.index2', $relations);

		}  
		
 		//return view('misreportsdetail.index2', $relations);
    }
	

	 public function getprintview(Request $request)

    {

      $segment1 = Request::segment(1);
	  $segment2 = Request::segment(2);
		
       $relations = [
            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			//'sites_names' => \App\Sites::where('status', '=', '1')->get()->pluck('title', 'id')->prepend('All', ''),
			'sites_names' => \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('All', ''),
			'segmentval' => $segment2,  
        ];    

		if($segment2 == '1'){ 
		
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		    $sites_count = \App\Sites::where('status', '=', '1')->count();
		  $sites_res_arr =\App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  
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
		  }
		  
		  
		  $fromdate = $segment3."-".$segment4."-"."1";
		  $todate = $segment3."-".$segment4."-".$lastdatearr[2];
		  
		/*  $sites_count = \App\Sites::where('status', '=', '1')->whereIn('id', $sitearr)->count;
		  if($sites_count > 0){
		  	$sites_res_arr = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
			foreach($sites_res_arr as $ke =>$site_res_row){
				
			}
			
		  } */
		  
		  // $sites_count = \App\Sites::where('status', '=', '1')->count();
		  if($sites_count > 0){
		  	//$sites_res_arr =\App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
			$sitear = array();
			
			$avgcon = array();
			$contracted = array();
			
			foreach($sites_res_arr as $ke =>$site_res_row){
			$getcontractedcount =  Dailyreportvalidation::
				where('site', '=', $ke)
				->count();
				 
				if(count($getcontractedcount)>0){
				 $getcontractedRes =  Dailyreportvalidation::
				where('site', '=', $ke)
				->first(); 
				
				$contracted[$ke] =  $getcontractedRes->contracted_quantity_kl;
				 }
				  else{
				  $contracted[$ke] = "";
				  }
				}
				   
			foreach($sites_res_arr as $ke =>$site_res_row){
				//echo $site_res_row;
				$avgres = "";
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
		  
		  
		$relations = [  
			
			'sites' => $siteattrname,
			'flats' => $flatres,
			'reportfrom_on' => $reportdatefrom_val,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'sitearr' => $datek,
			
			];      

		  return view('misprints.metrowater', $relations);

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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $sites_count = \App\Sites::where('status', '=', '1')->count();
		  $sites_res_arr =\App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
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
		  
		  if($sites_count > 0){
		  	//$sites_res_arr =\App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
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
				 
				if(count($getcontractedcount)>0){
				 $getcontractedRes =  Dailyreportvalidation::
				where('site', '=', $ke)
				->first(); 
				
				$contracted[$ke] =  $getcontractedRes->contracted_quantity_kl;
				$num_borewells[$ke] =  $getcontractedRes->borewellsnum;
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

		  return view('misprints.waterconsumptionprint', $relations);

		}  

		if($segment2 == '3'){
		
		    $segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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

		  return view('misprints.borewellmisprint', $relations);
		

		} 

		if($segment2 == '4'){ 
		
		
		 
		 $segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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
		  
		//  echo "<pre>"; print_r($issuecount); echo "</pre>"; exit;
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
			   		

		//  return view('misfiles.view.misfiresaftey', $relations);

		

		   return view('misprints.firesaftyprint', $relations);

		} 
		
		if($segment2 == '5'){
		
		$segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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
			   		

		  return view('misprints.electomechanical', $relations);

		} 
		
		if($segment2 == '6'){
		 
		 $segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);

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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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

		  return view('misprints.stpstatus', $relations);

		} 
		
		if($segment2 == '7'){
		
		
		
		 
		  	 $segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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
		

		  return view('misprints.wspstatus', $relations);

		} 
		
		if($segment2 == '8'){
		
		
		
		$segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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
					 
					 if($fieldarr->site == 5 || $fieldarr->site == 6 || $fieldarr->site == 7 || $fieldarr->site == 8 || $fieldarr->site ==10 || $fieldarr->site ==14 || $fieldarr->site ==17 || $fieldarr->site == 16) {
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
							
					 } else {
					    
					 
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

		  return view('misprints.missecurityoneprint', $relations);

		} 
		if($segment2 == '9'){
		
		 
		
		
		$segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		   
		  }else{ 

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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
				$deployment['deployment'][$dep] = (float)$depresult['house_sup'] + (float)$depresult['house_help'] + (float)$depresult['clu_hs_fo'] +  (float)$depresult['clu_hs_hk'] +  (float)$depresult['other'];
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
		  
		

		   return view('misprints.housekeepingoneprint', $relations);

		} 

		if($segment2 == '10'){
		 	$segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		   
		  }else{ 

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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
				$deployment['deployment'][$dep] = (float)$depresult['house_sup'] + (float)$depresult['house_help'] + (float)$depresult['clu_hs_fo'] +  (float)$depresult['clu_hs_hk'] +  (float)$depresult['other'];
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
			 if($sk == 5 || $sk == 6 || $sk == 7 || $sk == 8 || $sk ==10 || $sk ==14 || $sk ==17 || $sk == 16) {
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
				 }else{
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
		
		 return view('misprints.horticulturereportprintone', $relations);
		
		} 
		if($segment2 == '11'){
 		 
		 $segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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
		
		 return view('misprints.clubhouseprint', $relations);
		
		} 
		if($segment2 == '12'){
		
		$segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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
			 
			
			  return view('misprints.occupancyprint', $relations);
			 
		}
		  
		     return view('misprints.occupancyprint', $relations);
		
		
		
		} 
		
		if($segment2 == '13'){
		
		
		$segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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
			  // echo "<pre>"; print_r($indentrep_Array);echo "</pre>"; exit;
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
			
		      

		 // return view('misfiles.view.materialindented', $relations);
		
		 
		
		 return view('misprints.materialindented', $relations);
		
		} 
		if($segment2 == '14'){
		
		
		$segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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
				 
				 
		  // $pdf = PDF::loadView('misprints.apnacomplex', $relations);

        //   return $pdf->download('apnacomplex.pdf'); //Download    
     
		//  return view('misfiles.view.misapnacomplex', $relations);
		
		 return view('misprints.apnacomplex', $relations);
		
		} 
		
		if($segment2 == '16'){
		$segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
		$formfieldarray = array();
		$siteattrname = array();
		$flatres = array();
		$exist_Sec = array(); 
		$reportdate_val = "";
		$dateString = $segment3.'-'.$segment4.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$segment4."-".$segment3;

	      if(Auth::user()->id == 1){
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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
		 
		  return view('misprints.mistrafficprint', $relations);

		}

  
    }
	
	
	
	// GET DOWNLOAD MIS
	
	 public function getdownloadview(Request $request)

    {

      $segment1 = Request::segment(1);
	  $segment2 = Request::segment(2);
		
       $relations = [
            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			//'sites_names' => \App\Sites::get()->pluck('title', 'id')->prepend('All', ''),
			'sites_names' => \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('All', ''),
			'segmentval' => $segment2,  
        ];    

		if($segment2 == '1'){ 
		
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $sites_count = \App\Sites::where('status', '=', '1')->count();
		  $sites_res_arr =\App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  
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
		  }
		  
		  
		  $fromdate = $segment3."-".$segment4."-"."1";
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
				 
				if(count($getcontractedcount)>0){
				 $getcontractedRes =  Dailyreportvalidation::
				where('site', '=', $ke)
				->first(); 
				
				$contracted[$ke] =  $getcontractedRes->contracted_quantity_kl;
				 }
				  else{
				  $contracted[$ke] = "";
				  }
				} 
				   
			foreach($sites_res_arr as $ke =>$site_res_row){
				//echo $site_res_row;
				$avgres = "";
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
		  
		  
		$relations = [  
			
			'sites' => $siteattrname,
			'flats' => $flatres,
			'reportfrom_on' => $reportdatefrom_val,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'sitearr' => $datek,
			
			]; 
			$pdf = PDF::loadView('misprints.metrowaterdownload', $relations);

             $pdf->setPaper('A4', 'landscape');
			 
			date_default_timezone_set('Asia/Kolkata');
			$today_date = date('d');
			$today_time = date("g:i a");
			$monthName = date('F', mktime(0, 0, 0, $segment4, 10)); 
			
			 $fnam = 'MetroWater_'.$monthName."_".$today_date."_".$segment3."_".$today_time.".pdf";
            // return $pdf->download('metrowater.pdf'); //Download    
			  return $pdf->download($fnam);
			 
			  
		//	  return $pdf->stream('metrowater.pdf');

		  //return view('misprints.metrowaterdownload', $relations);

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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $sites_count = \App\Sites::where('status', '=', '1')->count();
		  $sites_res_arr =\App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
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
				 
				if(count($getcontractedcount)>0){
				 $getcontractedRes =  Dailyreportvalidation::
				where('site', '=', $ke)
				->first(); 
				
				$contracted[$ke] =  $getcontractedRes->contracted_quantity_kl;
				$num_borewells[$ke] =  $getcontractedRes->borewellsnum;
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


		//  return view('misprints.waterconsumptionprint', $relations);

		}  

		if($segment2 == '3'){
		
		
		  $segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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
  
		  //return view('misprints.borewellmisprint', $relations);
		

		} 

		if($segment2 == '4'){
		
		 $segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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
			   		

		  // return view('misprints.firesaftyprint', $relations);
		   
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
		
		if($segment2 == '5'){
		
		   $segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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
			   		

		 // return view('misprints.electomechanical', $relations);

		}  
		
		if($segment2 == '6'){
		
		  $segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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

		//  return view('misprints.stpstatus', $relations);

		} 
		
		if($segment2 == '7'){
		
		   $segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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

		 // return view('misprints.wspstatus', $relations);

		} 
		
		if($segment2 == '8'){
		$segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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
					 
					 if($fieldarr->site == 5 || $fieldarr->site == 6 || $fieldarr->site == 7 || $fieldarr->site == 8 || $fieldarr->site ==10 || $fieldarr->site ==14 || $fieldarr->site ==17 || $fieldarr->site == 16) {
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
							
					 } else {
					    
					 
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

		 // return view('misprints.missecurityoneprint', $relations);

		}  
		if($segment2 == '9'){ 
		
		
		$segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		   
		  }else{ 

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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
				$deployment['deployment'][$dep] = (float)$depresult['house_sup'] + (float)$depresult['house_help'] + (float)$depresult['clu_hs_fo'] +  (float)$depresult['clu_hs_hk'] +  (float)$depresult['other'];
			} 	else{
			   $deployment['deployment'][$dep] = 0;
			}
		  }

		$matchfields = ['month' => $segment4, 'year' => $segment3]; 

		$res_count = \App\Housekpmisreport::where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Housekpmisreport::where($matchfields)->get();
				
			 $existing_records = array();
			 foreach($formfieldarray  as $existing){
			    $existing_records[$existing['site']] = $existing;
			 }
			
		  }
		  
		 //  echo "<pre>"; print_r($existing_records);echo "</pre>";
			// exit; 
		  
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
		      

		  //return view('misprints.housekeepingoneprint', $relations);
		   
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

		if($segment2 == '10'){
		
		$segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		   
		  }else{ 

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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
				$deployment['deployment'][$dep] = (float)$depresult['house_sup'] + (float)$depresult['house_help'] + (float)$depresult['clu_hs_fo'] +  (float)$depresult['clu_hs_hk'] +  (float)$depresult['other'];
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
			 $existing_records_two = array();
			 $existing_records_three = array();
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
			 if($sk == 5 || $sk == 6 || $sk == 7 || $sk == 8 || $sk ==10 || $sk ==14 || $sk ==17 || $sk == 16) {
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
				 }else{

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
		 //  return view('misfiles.view.horticulturepestone', $relations);
		   
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
		if($segment2 == '11'){
		
		  		 $segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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
		
		// return view('misprints.clubhouseprint', $relations);
		 
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
		if($segment2 == '12'){
		
		$segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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
			 
			
			 // return view('misprints.occupancyprint', $relations);
			 
		}
		
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
		  
		    // return view('misprints.occupancyprint', $relations);
		
		
		
		} 
		
		if($segment2 == '13'){
		
		  		$segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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
			  // echo "<pre>"; print_r($indentrep_Array);echo "</pre>"; exit;
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
			
		      

		 // return view('misfiles.view.materialindented', $relations);
		
		 
		
		// return view('misprints.materialindented', $relations);
		 
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
		if($segment2 == '14'){
		
		 		$segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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
		
		// return view('misprints.apnacomplex', $relations);
		 
		   
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
		
				if($segment2 == '16'){
		$segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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
		 
		//  return view('misprints.mistrafficprint', $relations);
		  
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
	
	
	
	public function geteditview(Request $request)

    {  

      $segment1 = Request::segment(1);
	  $segment2 = Request::segment(2);
	  $segment3 = Request::segment(3);
	  $segment4 = Request::segment(4);
		
       $relations = [
            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			//'sites_names' => \App\Sites::get()->pluck('title', 'id')->prepend('All', ''),
			'sites_names' => \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('All', ''),
			'segmentval' => $segment2,  
        ];    

		if($segment2 == '1'){ 

		  return view('misfiles.metrowater', $relations);

		}  

		if($segment2 == '2'){

		  return view('misfiles.watersourceconsumption', $relations);

		} 

		if($segment2 == '3'){

		  return view('misfiles.borewellmis', $relations);

		} 

		if($segment2 == '4'){

		  return view('misfiles.misfiresaftey', $relations);

		} 
		
		if($segment2 == '5'){

		  return view('misfiles.miselectromechanical', $relations);

		} 
		if($segment2 == '9'){

		  return view('misfiles.mishousekeeping', $relations);

		} 
		
		if($segment2 == '8'){

		  return view('misfiles.missecurityone', $relations);

		} 
		
		if($segment2 == '10'){

		  return view('misfiles.horticulturepestone', $relations);

		} 
		
		if($segment2 == '11'){

		  return view('misfiles.misclubhouse', $relations);

		} 
		
		if($segment2 == '12'){

		  return view('misfiles.occupancy', $relations);

		} 
		if($segment2 == '14'){

		  return view('misfiles.misapnacomplex', $relations);

		} 
  
		if($segment2 == '16'){

		  return view('misfiles.traffic-movement', $relations);

		} 
		
		
		

    }
	
	
	
	
	
	
	
	public function getupdateview(Request $request)

    {  

      $segment1 = Request::segment(1);
	  $segment2 = Request::segment(2);
	  $segment3 = Request::segment(3);
	  $segment4 = Request::segment(4);
		
       $relations = [
            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			//'sites_names' => \App\Sites::get()->pluck('title', 'id')->prepend('All', ''),
			'sites_names' => \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', ''),
			'segmentval' => $segment2,  
        ];    

		if($segment2 == '1'){ 

		  return view('misfiles.metrowater', $relations);

		}  

		if($segment2 == '2'){

		  return view('misfiles.watersourceconsumption', $relations);

		} 

		if($segment2 == '3'){

		  return view('misfiles.borewellmis', $relations);

		} 

		if($segment2 == '4'){

		  return view('misfiles.misfiresaftey', $relations);

		} 
		
		if($segment2 == '5'){

		  return view('misfiles.miselectromechanical', $relations);

		} 
		if($segment2 == '9'){

		  return view('misfiles.mishousekeeping', $relations);

		} 
		
		if($segment2 == '8'){

		  return view('misfiles.missecurityone', $relations);

		} 
		
		if($segment2 == '10'){

		  return view('misfiles.horticulturepestone', $relations);

		} 
		
		if($segment2 == '11'){

		  return view('misfiles.misclubhouse', $relations);

		} 
		
		if($segment2 == '12'){
		
		$segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }
		  
		$relations = [
			'res' => $formfieldarray, 
			'sites' => $siteattrname,
			'flats' => $flatres,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			];    

		

		$matchfields = ['month' => $segment4, 'year' => $segment3]; 

		$res_count = \App\Occupancymisreport::where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Occupancymisreport::where($matchfields)->get();
			
			$existing_records = array();
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
			];     
			return view('misfiles.editoccupancy', $relations);
			
		}
		  
		  return view('misfiles.occupancy', $relations);

		} 
		if($segment2 == '14'){

		  return view('misfiles.misapnacomplex', $relations);

		} 
		
		

    }
	
	
	
	
	
	public function geteditformview(Request $request)

    {  

      $segment1 = Request::segment(1);
	  $segment2 = Request::segment(2);
	  $segment3 = Request::segment(3);
	  $segment4 = Request::segment(4);
		
       $relations = [
            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			//'sites_names' => \App\Sites::get()->pluck('title', 'id')->prepend('All', ''),
			'sites_names' => \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('All', ''),
			'segmentval' => $segment2,  
        ];    

		if($segment2 == '1'){ 

		  return view('misfiles.metrowater', $relations);

		}  
 
		if($segment2 == '2'){

		  return view('misfiles.watersourceconsumption', $relations);

		} 

		if($segment2 == '3'){
		
		
		  $segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please Select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please Select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }
		  
		$relations = [
			'res' => $formfieldarray, 
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'flats' => $flatres,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			];    

		  return view('misfiles.borewellmis', $relations);

		} 

		if($segment2 == '4'){

         $segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please Select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please Select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }
		  
		$relations = [
			'res' => $formfieldarray, 
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'flats' => $flatres,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			];   
		 // return view('misfiles.misfiresaftey', $relations);
		   return view('misreportsdetail.index', $relations);
		  
		  

		} 
		
		if($segment2 == '5'){
		
		   $segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please Select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please Select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }
		  
		$relations = [
			'res' => $formfieldarray, 
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'flats' => $flatres,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			];

           return view('misreportsdetail.miselectromechanical', $relations);
		 // return view('misfiles.miselectromechanical', $relations);

		} 
		
		if($segment2 == '6'){
		
		
		 
		$segment1 = Request::segment(1); 
		$segment2 = Request::segment(2); 
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please Select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please Select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }
		  
		$relations = [
			'res' => $formfieldarray, 
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'flats' => $flatres,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			];
 
          
		   return view('misreportsdetail.misstpstatus', $relations);
		}
		
			if($segment2 == '7'){
		
		
		 
		$segment1 = Request::segment(1); 
		$segment2 = Request::segment(2); 
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please Select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please Select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }
		  
		$relations = [
			'res' => $formfieldarray, 
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'flats' => $flatres,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			];
 
          
		   return view('misreportsdetail.wspstpstatus', $relations);
		}
		
		if($segment2 == '8'){
		
		$segment1 = Request::segment(1); 
		$segment2 = Request::segment(2); 
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please Select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please Select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }
		  
		$relations = [
			'res' => $formfieldarray, 
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'flats' => $flatres,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			];
 
		
		  return view('misfiles.missecurityone', $relations);

		} 
		
	 	if($segment2 == '9'){
		
			
		$segment1 = Request::segment(1); 
		$segment2 = Request::segment(2); 
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please Select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please Select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }
		  
		$relations = [
			'res' => $formfieldarray, 
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'flats' => $flatres,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			];
 
		
		 
		  return view('misfiles.mishousekeeping', $relations);

		} 
		
	/*	if($segment2 == '8'){

		  return view('misfiles.missecurityone', $relations);

		} */ 
		
		if($segment2 == '10'){
		
		$segment1 = Request::segment(1); 
		$segment2 = Request::segment(2); 
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please Select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please Select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }
		  
		$relations = [
			'res' => $formfieldarray, 
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'flats' => $flatres,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			];
  

		  return view('misfiles.horticulturepestone', $relations);

		} 
		
		if($segment2 == '11'){
		
		$segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please Select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please Select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }
		  
		$relations = [ 
			'res' => $formfieldarray, 
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'flats' => $flatres,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			];    
  
		  return view('misfiles.misclubhouse', $relations);

		} 

		
		if($segment2 == '12'){
		
		$segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please Select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please Select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }
		  
		$relations = [
			'res' => $formfieldarray, 
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'flats' => $flatres,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			];    

		

		$matchfields = ['month' => $segment4, 'year' => $segment3]; 

	/*	$res_count = \App\Occupancymisreport::where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Occupancymisreport::where($matchfields)->get();
			
			$existing_records = array();
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
			'sitenames' => $sitenames,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			];     
			return view('misfiles.editoccupancy', $relations);
			
		}*/
		  
		  return view('misfiles.occupancy', $relations);

		} 
		
		if($segment2 == '13'){
		
		  $segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please Select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please Select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }
		  
		   
		  
		$relations = [
			'res' => $formfieldarray, 
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'flats' => $flatres,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			];    
			


		 return view('misreportsdetail.exporttemp', $relations);

		} 
		if($segment2 == '14'){
		
		$segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please Select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{

		    $role_id = Auth::user()->role_id; 
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please Select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }
		  
		   
		   
		$relations = [
			'res' => $formfieldarray, 
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'flats' => $flatres,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			];    
			

		  //return view('misfiles.misapnacomplex', $relations);
		  
		  return view('misreportsdetail.apnaexporttemp', $relations);

		} 
		
		if($segment2 == '15'){
		
		$segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please Select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please Select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }
		  
		   
		  
		   
		   
		$relations = [
			'res' => $formfieldarray, 
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'flats' => $flatres,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			];    
			

		  //return view('misfiles.misapnacomplex', $relations);
		  
		
		   return view('misreportsdetail.aparnadrill', $relations);

		}    
		
		if($segment2 == 16){
			
		 $segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please Select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please Select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }
		  
		$relations = [
			'res' => $formfieldarray, 
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'flats' => $flatres,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			];
			
			  
           return view('misfiles.traffic-movement', $relations);
		 // return view('misfiles.miselectromechanical', $relations);
		}
		 
		   

    }
	
	
	
	  
	
	public function getpreview(Request $request)

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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		    $sites_count = \App\Sites::where('status', '=', '1')->count();
		  $sites_res_arr =\App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  
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
		  }
		  
		  
		  $fromdate = $segment3."-".$segment4."-"."1";
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
				 
				if(count($getcontractedcount)>0){
				 $getcontractedRes =  Dailyreportvalidation::
				where('site', '=', $ke)
				->first(); 
				
				$contracted[$ke] =  $getcontractedRes->contracted_quantity_kl;
				 }
				  else{
				  $contracted[$ke] = "";
				  }
				}
				   
			foreach($sites_res_arr as $ke =>$site_res_row){
				//echo $site_res_row;
				$avgres = "";
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
		  
		  
		$relations = [  
			
			'sites' => $siteattrname,
			'flats' => $flatres,
			'reportfrom_on' => $reportdatefrom_val,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'sitearr' => $datek,
			
			];      
			 

		  return view('misfiles.view.metrowater', $relations);  

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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $sites_count = \App\Sites::where('status', '=', '1')->count();
		  $sites_res_arr =\App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
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
				 
				if(count($getcontractedcount)>0){
				 $getcontractedRes =  Dailyreportvalidation::
				where('site', '=', $ke)
				->first(); 
				
				$contracted[$ke] =  $getcontractedRes->contracted_quantity_kl;
				$num_borewells[$ke] =  $getcontractedRes->borewellsnum;
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

		  return view('misfiles.view.watersourceconsumption', $relations);

		} 

		if($segment2 == '3'){
		
		 $segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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
	

		  return view('misfiles.view.borewellmis', $relations);

		} 

		if($segment2 == '4'){
		 
		 $segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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
			   		

		  return view('misfiles.view.misfiresaftey', $relations);

		} 
		
		if($segment2 == '5'){
		
		
		
		 
		 $segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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

		

		  return view('misfiles.view.miselectromechanical', $relations);

		} 
		if($segment2 == '6'){

          		
		 
		 $segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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
			   		

		  return view('misfiles.view.stpstatus', $relations);

		} 
		if($segment2 == '7'){
		
		 
		  	 $segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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
			   		
		  return view('misfiles.view.wspstatus', $relations);

		} 
		if($segment2 == '8'){
		
		$segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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
					 
					 if($fieldarr->site == 5 || $fieldarr->site == 6 || $fieldarr->site == 7 || $fieldarr->site == 8 || $fieldarr->site ==10 || $fieldarr->site ==14 || $fieldarr->site ==17 || $fieldarr->site == 16) {
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
							
					 } else {
					    
					 
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

		  return view('misfiles.view.missecurityone', $relations);

		} 
		if($segment2 == '9'){
		
		
		$segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		   
		  }else{ 

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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
				$deployment['deployment'][$dep] = (float)$depresult['house_sup'] + (float)$depresult['house_help'] + (float)$depresult['clu_hs_fo'] +  (float)$depresult['clu_hs_hk'] +  (float)$depresult['other'];
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
		  
		
		  

		  return view('misfiles.view.mishousekeeping', $relations);

		} 
			
		if($segment2 == '10'){
		
		
		  	
		$segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		   
		  }else{ 

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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
				$deployment['deployment'][$dep] = (float)$depresult['house_sup'] + (float)$depresult['house_help'] + (float)$depresult['clu_hs_fo'] +  (float)$depresult['clu_hs_hk'] +  (float)$depresult['other'];
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
			 if($sk == 5 || $sk == 6 || $sk == 7 || $sk == 8 || $sk ==10 || $sk ==14 || $sk ==17 || $sk == 16) {
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
				 }else{
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
		  
		  
		  return view('misfiles.view.horticulturepestone', $relations);

		} 
		
		if($segment2 == '11'){
		 
		$segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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
			 

		  return view('misfiles.view.misclubhouse', $relations);

		} 
		
		if($segment2 == '12'){

		 
		$segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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
			 
			
			 return view('misfiles.view.occupancy', $relations);
			 
		}
		  
		     return view('misfiles.view.occupancy', $relations);

		} 
		if($segment2 == '13'){
		
		
		 $segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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
			
		     

		  return view('misfiles.view.materialindented', $relations);

		}  
		
	
		if($segment2 == '14'){


	
		$segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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
     
		  return view('misfiles.view.misapnacomplex', $relations);

		} 
		
		if($segment2 == '15'){
		
		   	$segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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
			 
			 //exit;
			
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
			}   
   
		  return view('misfiles.view.mismockdrill', $relations);

		} 
		
			if($segment2 == '16'){
			
		$segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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

		  return view('misfiles.view.trafiicview', $relations);

		} 
		
		
		

    }
	
	
	 public function printpage(Request $request)

    {

      $segment1 = Request::segment(1);
	  $segment2 = Request::segment(2);
		
       $relations = [
            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			//'sites_names' => \App\Sites::get()->pluck('title', 'id')->prepend('All', ''),
			'sites_names' => \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('All', ''),
			'segmentval' => $segment2,  
        ];    

		if($segment2 == '1'){

		  return view('firesecurityprint', $relations);

		} 

		if($segment2 == '2'){

		  return view('fmsprint', $relations);

		} 

		if($segment2 == '3'){

		  return view('pmsprint', $relations);

		} 

		if($segment2 == '4'){

		  return view('securityprint', $relations);

		} 

		 else{

		  return view('dailyreports.index', $relations);

		 }

		

    }
	 
	
	
	
	 public function storeoccupancy(StoreOccupancyRequest $request)
 
    {  
	 if(isset($request['report_status'])) { $request['report_status'] = $request['report_status'];}
	 else {$request['report_status'] = 0;}
	 
     
		   if((int)$request['record_id'] > 0){
		     $report = Occupancymisreport::findOrFail($request['record_id']);

					   $store_val  = array('site'=>$request['site'], 'owners'=>(int)$request['owners'], 'tenants'=>(int)$request['tenants'],'vacant'=>(int)$request['vacant'],'report_status'=>$request['report_status']);
					   
					   $report = Occupancymisreport::findOrFail($request['record_id']);

					 $report->update($store_val); 

					 return redirect()->route('misreports.index');
		   } 
		 else{  
		
				  
				     $store_val  = array('site'=>$request['site'], 'month'=>$request['month'], 'year'=>$request['year'],  'user_id'=>$request['user_id'], 'owners'=>(int)$request['owners'], 'tenants'=>(int)$request['tenants'],'vacant'=>(int)$request['vacant'],'report_status'=>$request['report_status']);
					/* echo "<pre>";     
					 print_r($store_val);
					 echo "</pre>"; */
					  Occupancymisreport::create($store_val); 
				
				 return redirect()->route('misreports.index');
			   
			}
           
           return redirect()->route('misreports.index');
		
    } 
	
	
	// STORE CLUB HOUSE
	 public function storeclubhouse(StoreOccupancyRequest $request)
 
    {  
	 if(isset($request['report_status'])) { $request['report_status'] = $request['report_status'];}
	 else {$request['report_status'] = 0;}
	 
     
		   if((int)$request['record_id'] > 0){
		     $report = Clubutilizationmisreport::findOrFail($request['record_id']);

					   $store_val  = array('site'=>$request['site'], 'avg_occupancy'=>$request['avg_occupancy'], 'avg_daily_swim'=>$request['avg_daily_swim'],'avg_daily_gym'=>$request['avg_daily_gym'],'occ_flat_swim'=>$request['occ_flat_swim'],'occ_gym_swim'=>$request['occ_gym_swim'],'report_status'=>$request['report_status']);
					   
					   $report = Clubutilizationmisreport::findOrFail($request['record_id']);

					 $report->update($store_val); 

					 return redirect()->route('misreports.index');
		   } 
		 else{  
		
				  
				     $store_val  = array('site'=>$request['site'], 'avg_occupancy'=>$request['avg_occupancy'], 'avg_daily_swim'=>$request['avg_daily_swim'],'avg_daily_gym'=>$request['avg_daily_gym'],'occ_flat_swim'=>$request['occ_flat_swim'],'occ_gym_swim'=>$request['occ_gym_swim'],'report_status'=>$request['report_status']);
					/* echo "<pre>";     
					 print_r($store_val);
					 echo "</pre>"; */
					  Clubutilizationmisreport::create($store_val); 
				
				 return redirect()->route('misreports.index');
			   
			} 
           
           return redirect()->route('misreports.index');
		
    } 

 // STORE CLUB HOUSE


 // STORE BOREWELL NOTWORKING
 
   public function storeborewellnw(StoreBorewellnwRequest $request)
 
    {  
	 if(isset($request['report_status'])) { $request['report_status'] = $request['report_status'];}
	 else {$request['report_status'] = 0;}
	 
     
		   if((int)$request['record_id'] > 0){
		     $report = Borewellsnwmisreport::findOrFail($request['record_id']);

					   $store_val  = array('site'=>$request['site'],'nw_bores_num'=>$request['nw_bores_num'], 'no_ground_water'=>$request['no_ground_water'],'over_load'=>$request['over_load'],'motor_brunt'=>$request['motor_brunt'],'cable_prblm'=>$request['cable_prblm'],'pumpormotorwear'=>$request['pumpormotorwear'],'others'=>$request['others'],'motor_brunt'=>$request['motor_brunt'],'dry_run_protectn'=>$request['dry_run_protectn'],'flow_meter'=>$request['flow_meter'],'remarks'=>$request['remarks'],'report_status'=>$request['report_status']);
					   
					   $report = Borewellsnwmisreport::findOrFail($request['record_id']);

					 $report->update($store_val); 

					 return redirect()->route('misreports.index');
		   } 
		 else{  
		  
				  
				     $store_val  = array('site'=>$request['site'], 'month'=>$request['month'], 'year'=>$request['year'],  'user_id'=>$request['user_id'], 'nw_bores_num'=>$request['nw_bores_num'], 'no_ground_water'=>$request['no_ground_water'],'over_load'=>$request['over_load'],'motor_brunt'=>$request['motor_brunt'],'cable_prblm'=>$request['cable_prblm'],'pumpormotorwear'=>$request['pumpormotorwear'],'others'=>$request['others'],'motor_brunt'=>$request['motor_brunt'],'dry_run_protectn'=>$request['dry_run_protectn'],'flow_meter'=>$request['flow_meter'],'remarks'=>$request['remarks'],'report_status'=>$request['report_status']);
					/* echo "<pre>";     
					 print_r($store_val);
					 echo "</pre>"; */ 
					  Borewellsnwmisreport::create($store_val); 
				
				 return redirect()->route('misreports.index');
			   
			}
           
           return redirect()->route('misreports.index');
		
    } 
  
 // END STORE BOREWELL NOTWORKING
 
 // STORE FIRE SAFE
 
 
   public function storemisfiresafe(StoreFiresafemisRequest $request)
 
    {  
	
	
	
	 if(isset($request['report_status'])) { $request['report_status'] = $request['report_status'];}
	 else {$request['report_status'] = 0;}
	 
     
		   if((int)$request['record_id'] > 0){
		     $report = Firesafetymisreport::findOrFail($request['record_id']);

					  /* $store_val  = array('site'=>$request['site'],'nw_bores_num'=>$request['nw_bores_num'], 'no_ground_water'=>$request['no_ground_water'],'over_load'=>$request['over_load'],'motor_brunt'=>$request['motor_brunt'],'cable_prblm'=>$request['cable_prblm'],'pumpormotorwear'=>$request['pumpormotorwear'],'others'=>$request['others'],'motor_brunt'=>$request['motor_brunt'],'dry_run_protectn'=>$request['dry_run_protectn'],'flow_meter'=>$request['flow_meter'],'remarks'=>$request['remarks'],'report_status'=>$request['report_status']);
					   
					    */
					   
					   
                     $report = Firesafetymisreport::findOrFail($request['record_id']);
					 $report->update($request->all()); 
					 
					// $firesafe_issue =  Firesafenotworkingissue::create($cat_arr);
					 DB::table('firesafenotworkingissues')->where('ref_id', '=', $request['record_id'])->delete();
					 
					  $edata = $request->all();
					  if(isset($edata['category'])){
					 if(count($edata['category'])> 0){
					 	foreach($edata['category'] as $key => $cat){
						   $cat_arr =  array("category"=>$cat,"issue_des"=>$edata['issue_des'][$key],"root_cause"=>$edata['root_cause'][$key],"act_req_plan"=>$edata['act_req_plan'][$key],"pendingfromdays"=>$edata['pendingfromdays'][$key],"reponsibility"=>$edata['reponsibility'][$key],"notify_concern"=>$edata['notify_concern'][$key],"ref_id"=>$request['record_id'],"site"=>$edata['site']);
						    $firesafe_issue =  Firesafenotworkingissue::create($cat_arr);
						}
					 }
					 }
					 
					 
					 return redirect()->route('misreports.index');
		   } 
		 else{  
		  
				  
				   //  $store_val  = array('site'=>$request['site'], 'month'=>$request['month'], 'year'=>$request['year'],  'user_id'=>$request['user_id'], 'nw_bores_num'=>$request['nw_bores_num'], 'no_ground_water'=>$request['no_ground_water'],'over_load'=>$request['over_load'],'motor_brunt'=>$request['motor_brunt'],'cable_prblm'=>$request['cable_prblm'],'pumpormotorwear'=>$request['pumpormotorwear'],'others'=>$request['others'],'motor_brunt'=>$request['motor_brunt'],'dry_run_protectn'=>$request['dry_run_protectn'],'flow_meter'=>$request['flow_meter'],'remarks'=>$request['remarks'],'report_status'=>$request['report_status']);
				
					
					
					  $create = Firesafetymisreport::create($request->all()); 
					 $firesafeid = $create->id;
					 
					 $edata = $request->all();
					 if(isset($edata['category'])){
					 if(count($edata['category'])> 0){
					 	foreach($edata['category'] as $key => $cat){
						   $cat_arr =  array("category"=>$cat,"issue_des"=>$edata['issue_des'][$key],"root_cause"=>$edata['root_cause'][$key],"act_req_plan"=>$edata['act_req_plan'][$key],"pendingfromdays"=>$edata['pendingfromdays'][$key],"reponsibility"=>$edata['reponsibility'][$key],"notify_concern"=>$edata['notify_concern'][$key],"ref_id"=>$firesafeid,"site"=>$edata['site']);
						    $firesafe_issue =  Firesafenotworkingissue::create($cat_arr);
						}
					 }
					 }
					   
					
				 return redirect()->route('misreports.index');
			   
			}
           
           return redirect()->route('misreports.index');
		
    } 
 
 // END STORE FIRE SAFE
 
 
 
 // STORE MIS EQUIPMENT
 
 
   public function storemisequipment(StoreEquipmentmisRequest $request)
 
    {  
	
	 
	
	 if(isset($request['report_status'])) { $request['report_status'] = $request['report_status'];}
	 else {$request['report_status'] = 0;}
	 
     
		   if((int)$request['record_id'] > 0){
		     $report = Equipmentmisreport::findOrFail($request['record_id']);

					  /* $store_val  = array('site'=>$request['site'],'nw_bores_num'=>$request['nw_bores_num'], 'no_ground_water'=>$request['no_ground_water'],'over_load'=>$request['over_load'],'motor_brunt'=>$request['motor_brunt'],'cable_prblm'=>$request['cable_prblm'],'pumpormotorwear'=>$request['pumpormotorwear'],'others'=>$request['others'],'motor_brunt'=>$request['motor_brunt'],'dry_run_protectn'=>$request['dry_run_protectn'],'flow_meter'=>$request['flow_meter'],'remarks'=>$request['remarks'],'report_status'=>$request['report_status']);
					   
					    */
					    
					   
                     $report = Equipmentmisreport::findOrFail($request['record_id']);
					 $report->update($request->all()); 
					 
					// $firesafe_issue =  Firesafenotworkingissue::create($cat_arr);
					 DB::table('equipmentnotworkingissues')->where('ref_id', '=', $request['record_id'])->delete();
					 
					 
					  $edata = $request->all();
					   if(isset($edata['category'])){
					 if(count($edata['category'])> 0){
					 	foreach($edata['category'] as $key => $cat){
						   $cat_arr =  array("category"=>$cat,"issue_des"=>$edata['issue_des'][$key],"root_cause"=>$edata['root_cause'][$key],"act_req_plan"=>$edata['act_req_plan'][$key],"pendingfromdays"=>$edata['pendingfromdays'][$key],"reponsibility"=>$edata['reponsibility'][$key],"notify_concern"=>$edata['notify_concern'][$key],"ref_id"=>$request['record_id'],"site"=>$edata['site']);
						    $firesafe_issue =  Equipmentnotworkingissue::create($cat_arr);
						}
					 }
					 }
					 

					 return redirect()->route('misreports.index');
		   } 
		 else{  
		  
				  
				   //  $store_val  = array('site'=>$request['site'], 'month'=>$request['month'], 'year'=>$request['year'],  'user_id'=>$request['user_id'], 'nw_bores_num'=>$request['nw_bores_num'], 'no_ground_water'=>$request['no_ground_water'],'over_load'=>$request['over_load'],'motor_brunt'=>$request['motor_brunt'],'cable_prblm'=>$request['cable_prblm'],'pumpormotorwear'=>$request['pumpormotorwear'],'others'=>$request['others'],'motor_brunt'=>$request['motor_brunt'],'dry_run_protectn'=>$request['dry_run_protectn'],'flow_meter'=>$request['flow_meter'],'remarks'=>$request['remarks'],'report_status'=>$request['report_status']);
				
					
					
					  $create = Equipmentmisreport::create($request->all()); 
					 $firesafeid = $create->id;
					 
					 $edata = $request->all(); 
					 if(isset($edata['category'])){
					 if(count($edata['category'])> 0){
					 	foreach($edata['category'] as $key => $cat){
						   $cat_arr =  array("category"=>$cat,"issue_des"=>$edata['issue_des'][$key],"root_cause"=>$edata['root_cause'][$key],"act_req_plan"=>$edata['act_req_plan'][$key],"pendingfromdays"=>$edata['pendingfromdays'][$key],"reponsibility"=>$edata['reponsibility'][$key],"notify_concern"=>$edata['notify_concern'][$key],"ref_id"=>$firesafeid,"site"=>$edata['site']);
						    $firesafe_issue =  Equipmentnotworkingissue::create($cat_arr);
						}
					 }
					   
					   }
					
				 return redirect()->route('misreports.index');
			   
			}
           
           return redirect()->route('misreports.index');
		
    } 
 
 // STORE MIS EQUIPMENT




// STORE MIS STP
 
 
   public function storemisstp(StoreStpRequest $request)
 
    {  
	
	 
	  
	 if(isset($request['report_status'])) { $request['report_status'] = $request['report_status'];}
	 else {$request['report_status'] = 0;}
	 
     
		   if((int)$request['record_id'] > 0){
		     $report = Stpmisreport::findOrFail($request['record_id']);

					  /* $store_val  = array('site'=>$request['site'],'nw_bores_num'=>$request['nw_bores_num'], 'no_ground_water'=>$request['no_ground_water'],'over_load'=>$request['over_load'],'motor_brunt'=>$request['motor_brunt'],'cable_prblm'=>$request['cable_prblm'],'pumpormotorwear'=>$request['pumpormotorwear'],'others'=>$request['others'],'motor_brunt'=>$request['motor_brunt'],'dry_run_protectn'=>$request['dry_run_protectn'],'flow_meter'=>$request['flow_meter'],'remarks'=>$request['remarks'],'report_status'=>$request['report_status']);
					   
					    */
					    
					   
                     $report = Stpmisreport::findOrFail($request['record_id']);
					 $report->update($request->all()); 
					 
					// $firesafe_issue =  Firesafenotworkingissue::create($cat_arr);
					 DB::table('stpnotworkingissues')->where('ref_id', '=', $request['record_id'])->delete();
					 
					 
					  $edata = $request->all();
					   if(isset($edata['category'])){
					 if(count($edata['category'])> 0){
					 	foreach($edata['category'] as $key => $cat){
						   $cat_arr =  array("category"=>$cat,"issue_des"=>$edata['issue_des'][$key],"root_cause"=>$edata['root_cause'][$key],"act_req_plan"=>$edata['act_req_plan'][$key],"pendingfromdays"=>$edata['pendingfromdays'][$key],"reponsibility"=>$edata['reponsibility'][$key],"notify_concern"=>$edata['notify_concern'][$key],"ref_id"=>$request['record_id'],"site"=>$edata['site']);
						   $firesafe_issue =  Stpnotworkingissue::create($cat_arr);
						}
					 }
					 
					 }

					 return redirect()->route('misreports.index');
		   } 
		 else{  
		  
				  
				   //  $store_val  = array('site'=>$request['site'], 'month'=>$request['month'], 'year'=>$request['year'],  'user_id'=>$request['user_id'], 'nw_bores_num'=>$request['nw_bores_num'], 'no_ground_water'=>$request['no_ground_water'],'over_load'=>$request['over_load'],'motor_brunt'=>$request['motor_brunt'],'cable_prblm'=>$request['cable_prblm'],'pumpormotorwear'=>$request['pumpormotorwear'],'others'=>$request['others'],'motor_brunt'=>$request['motor_brunt'],'dry_run_protectn'=>$request['dry_run_protectn'],'flow_meter'=>$request['flow_meter'],'remarks'=>$request['remarks'],'report_status'=>$request['report_status']);
				
					
					
					  $create = Stpmisreport::create($request->all()); 
					 $firesafeid = $create->id;
					 
					 $edata = $request->all(); 
					 if(isset($edata['category'])){
					 if(count($edata['category'])> 0){
					 	foreach($edata['category'] as $key => $cat){
						   $cat_arr =  array("category"=>$cat,"issue_des"=>$edata['issue_des'][$key],"root_cause"=>$edata['root_cause'][$key],"act_req_plan"=>$edata['act_req_plan'][$key],"pendingfromdays"=>$edata['pendingfromdays'][$key],"reponsibility"=>$edata['reponsibility'][$key],"notify_concern"=>$edata['notify_concern'][$key],"ref_id"=>$firesafeid,"site"=>$edata['site']);
						    $firesafe_issue =  Stpnotworkingissue::create($cat_arr);
						}
					 }
					   
					   }
					
				 return redirect()->route('misreports.index');
			   
			}
           
           return redirect()->route('misreports.index');
		
    } 
 
 // STORE MIS STP
 
 // STORE MIS TRAFFIC
  
   public function storemistraffic(StoreStpRequest $request)
 
    {  
	
	 if(isset($request['report_status'])) { $request['report_status'] = $request['report_status'];}
	 else {$request['report_status'] = 0;}
	 
     
		   if((int)$request['record_id'] > 0){
					   
                     $report = Trafficmisreport::findOrFail($request['record_id']);
					 $report->update($request->all()); 

					 return redirect()->route('misreports.index');
		   } 
		 else{  
					  $create = Trafficmisreport::create($request->all()); 
					 $firesafeid = $create->id;
					 
					 $edata = $request->all(); 
					 
					
				 return redirect()->route('misreports.index');
			   
			}
           
           return redirect()->route('misreports.index');
		
    } 
  
 // END STORE MIS TRAFFIC
 
 // STORE MIS WSP
 
 
   public function storemiswsp(StoreWspRequest $request)
 
    {  
	
	  
	 if(isset($request['report_status'])) { $request['report_status'] = $request['report_status'];}
	 else {$request['report_status'] = 0;}
	 
     
		   if((int)$request['record_id'] > 0){
		     $report = Wspmisreport::findOrFail($request['record_id']);

					  /* $store_val  = array('site'=>$request['site'],'nw_bores_num'=>$request['nw_bores_num'], 'no_ground_water'=>$request['no_ground_water'],'over_load'=>$request['over_load'],'motor_brunt'=>$request['motor_brunt'],'cable_prblm'=>$request['cable_prblm'],'pumpormotorwear'=>$request['pumpormotorwear'],'others'=>$request['others'],'motor_brunt'=>$request['motor_brunt'],'dry_run_protectn'=>$request['dry_run_protectn'],'flow_meter'=>$request['flow_meter'],'remarks'=>$request['remarks'],'report_status'=>$request['report_status']);
					   
					    */ 
					       	 
					   
                     $report = Wspmisreport::findOrFail($request['record_id']);
					 $report->update($request->all()); 
					 
					// $firesafe_issue =  Firesafenotworkingissue::create($cat_arr);
					 DB::table('wspnotworkingissues')->where('ref_id', '=', $request['record_id'])->delete();
					 
					  $edata = $request->all();
					   if(isset($edata['category'])){
					 if(count($edata['category'])> 0){
					 	foreach($edata['category'] as $key => $cat){
						   $cat_arr =  array("category"=>$cat,"issue_des"=>$edata['issue_des'][$key],"root_cause"=>$edata['root_cause'][$key],"act_req_plan"=>$edata['act_req_plan'][$key],"pendingfromdays"=>$edata['pendingfromdays'][$key],"reponsibility"=>$edata['reponsibility'][$key],"notify_concern"=>$edata['notify_concern'][$key],"ref_id"=>$request['record_id'],"site"=>$edata['site']);
						   $firesafe_issue =  Wspnotworkingissue::create($cat_arr);
						}
					 }
					 }
					 

					 return redirect()->route('misreports.index');
		   } 
		 else{  
		  
				  
				   //  $store_val  = array('site'=>$request['site'], 'month'=>$request['month'], 'year'=>$request['year'],  'user_id'=>$request['user_id'], 'nw_bores_num'=>$request['nw_bores_num'], 'no_ground_water'=>$request['no_ground_water'],'over_load'=>$request['over_load'],'motor_brunt'=>$request['motor_brunt'],'cable_prblm'=>$request['cable_prblm'],'pumpormotorwear'=>$request['pumpormotorwear'],'others'=>$request['others'],'motor_brunt'=>$request['motor_brunt'],'dry_run_protectn'=>$request['dry_run_protectn'],'flow_meter'=>$request['flow_meter'],'remarks'=>$request['remarks'],'report_status'=>$request['report_status']);
				
					
					
					  $create = Wspmisreport::create($request->all()); 
					 $firesafeid = $create->id;
					 
					 $edata = $request->all(); 
					 if(isset($edata['category'])){
					 if(count($edata['category'])> 0){
					 	foreach($edata['category'] as $key => $cat){
						   $cat_arr =  array("category"=>$cat,"issue_des"=>$edata['issue_des'][$key],"root_cause"=>$edata['root_cause'][$key],"act_req_plan"=>$edata['act_req_plan'][$key],"pendingfromdays"=>$edata['pendingfromdays'][$key],"reponsibility"=>$edata['reponsibility'][$key],"notify_concern"=>$edata['notify_concern'][$key],"ref_id"=>$firesafeid,"site"=>$edata['site']);
						    $firesafe_issue =  Wspnotworkingissue::create($cat_arr);
						}
					 }
					   
					   }
					
				 return redirect()->route('misreports.index');
			   
			}
           
           return redirect()->route('misreports.index');
		
    } 
   
 // STORE MIS STP
 
 
 
  // STORE MIS SECURITY
 
 
   public function storemissecurity(StoreWspRequest $request)
 
    {  
	
	  
	 if(isset($request['report_status'])) { $request['report_status'] = $request['report_status'];}
	 else {$request['report_status'] = 0;}
	 
     
		   if((int)$request['record_id'] > 0){
		     $report = Securitymisreport::findOrFail($request['record_id']);

					  /* $store_val  = array('site'=>$request['site'],'nw_bores_num'=>$request['nw_bores_num'], 'no_ground_water'=>$request['no_ground_water'],'over_load'=>$request['over_load'],'motor_brunt'=>$request['motor_brunt'],'cable_prblm'=>$request['cable_prblm'],'pumpormotorwear'=>$request['pumpormotorwear'],'others'=>$request['others'],'motor_brunt'=>$request['motor_brunt'],'dry_run_protectn'=>$request['dry_run_protectn'],'flow_meter'=>$request['flow_meter'],'remarks'=>$request['remarks'],'report_status'=>$request['report_status']);
					   
					    */ 
					       	 
					   
                     $report = Securitymisreport::findOrFail($request['record_id']);
					 $report->update($request->all()); 
					 

					 return redirect()->route('misreports.index');
		   } 
		 else{  
		  
				  
				   //  $store_val  = array('site'=>$request['site'], 'month'=>$request['month'], 'year'=>$request['year'],  'user_id'=>$request['user_id'], 'nw_bores_num'=>$request['nw_bores_num'], 'no_ground_water'=>$request['no_ground_water'],'over_load'=>$request['over_load'],'motor_brunt'=>$request['motor_brunt'],'cable_prblm'=>$request['cable_prblm'],'pumpormotorwear'=>$request['pumpormotorwear'],'others'=>$request['others'],'motor_brunt'=>$request['motor_brunt'],'dry_run_protectn'=>$request['dry_run_protectn'],'flow_meter'=>$request['flow_meter'],'remarks'=>$request['remarks'],'report_status'=>$request['report_status']);
				
					
					
					  $create = Securitymisreport::create($request->all()); 
					
				 return redirect()->route('misreports.index');
			   
			}
           
           return redirect()->route('misreports.index');
		
    } 
   
 // STORE MIS SECURITY
 
 
 
  // STORE MIS HOUSEKEEP
 
 
   public function storemishousekp(StoreWspRequest $request)
 
    {  
	
	  
	 if(isset($request['report_status'])) { $request['report_status'] = $request['report_status'];}
	 else {$request['report_status'] = 0;}
	 
     
		   if((int)$request['record_id'] > 0){
		     $report = Housekpmisreport::findOrFail($request['record_id']);

					  /* $store_val  = array('site'=>$request['site'],'nw_bores_num'=>$request['nw_bores_num'], 'no_ground_water'=>$request['no_ground_water'],'over_load'=>$request['over_load'],'motor_brunt'=>$request['motor_brunt'],'cable_prblm'=>$request['cable_prblm'],'pumpormotorwear'=>$request['pumpormotorwear'],'others'=>$request['others'],'motor_brunt'=>$request['motor_brunt'],'dry_run_protectn'=>$request['dry_run_protectn'],'flow_meter'=>$request['flow_meter'],'remarks'=>$request['remarks'],'report_status'=>$request['report_status']);
					   
					    */ 
					       	 
					   
                     $report = Housekpmisreport::findOrFail($request['record_id']);
					 $report->update($request->all()); 
					 

					 return redirect()->route('misreports.index');
		   } 
		 else{  
		  
				  
				   //  $store_val  = array('site'=>$request['site'], 'month'=>$request['month'], 'year'=>$request['year'],  'user_id'=>$request['user_id'], 'nw_bores_num'=>$request['nw_bores_num'], 'no_ground_water'=>$request['no_ground_water'],'over_load'=>$request['over_load'],'motor_brunt'=>$request['motor_brunt'],'cable_prblm'=>$request['cable_prblm'],'pumpormotorwear'=>$request['pumpormotorwear'],'others'=>$request['others'],'motor_brunt'=>$request['motor_brunt'],'dry_run_protectn'=>$request['dry_run_protectn'],'flow_meter'=>$request['flow_meter'],'remarks'=>$request['remarks'],'report_status'=>$request['report_status']);
				
					
					
					  $create = Housekpmisreport::create($request->all()); 
					
				 return redirect()->route('misreports.index');
			   
			}
           
           return redirect()->route('misreports.index');
		
    }  
   
 // END STORE MIS HOUSEKEEP
 
 
 
  // STORE MIS HORTICULTURE
 
 
   public function storemishorticulture(StoreWspRequest $request)
 
    {  
	  
	 if(isset($request['report_status'])) { $request['report_status'] = $request['report_status'];}
	 else {$request['report_status'] = 0;}
	 
     
		   if((int)$request['record_id'] > 0){
		     $report = Horticulturemisreport::findOrFail($request['record_id']);

					   
                     $report = Horticulturemisreport::findOrFail($request['record_id']);
					 $report->update($request->all()); 
					 

					 return redirect()->route('misreports.index');
		   } 
		 else{  
					  $create = Horticulturemisreport::create($request->all()); 
					
				 return redirect()->route('misreports.index');
			   
			}
           
           return redirect()->route('misreports.index');
		
    }  
   
 // END STORE MIS HORTICULTURE




// DOWNLOAD OVERALL MIS

// GET DOWNLOAD MIS
	 
	 public function downloadoverallmis(Request $request)

    {

      $segment1 = Request::segment(1);
	  $segment2 = Request::segment(2);
		
       $relations = [
            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			//'sites_names' => \App\Sites::get()->pluck('title', 'id')->prepend('All', ''),
			'sites_names' => \App\Sites::get()->pluck('name', 'id')->prepend('All', ''),
			'segmentval' => $segment2,  
        ];    

		
		
		//METRO WATER 
		
		
		  
		
		$segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
		
		$segment3 = Request::segment(2);
		$segment4 = Request::segment(3);
	
		
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $sites_count = \App\Sites::where('status', '=', '1')->count();
		  $sites_res_arr =\App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  
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
		  }
		  
		  
		  $fromdate = $segment3."-".$segment4."-"."1";
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
				 
				if(count($getcontractedcount)>0){
				 $getcontractedRes =  Dailyreportvalidation::
				where('site', '=', $ke)
				->first(); 
				
				$contracted[$ke] =  $getcontractedRes->contracted_quantity_kl;
				 }
				  else{
				  $contracted[$ke] = "";
				  }
				} 
				   
			foreach($sites_res_arr as $ke =>$site_res_row){
				//echo $site_res_row;
				$avgres = "";
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
		  
		  
		$relations = [  
			
			'sites' => $siteattrname,
			'flats' => $flatres,
			'reportfrom_on' => $reportdatefrom_val,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'sitearr' => $datek,
			
			]; 
			
			//$pdf = PDF::loadView('misprints.metrowaterdownload', $relations);

        //      return $pdf->download('metrowater.pdf'); 
		
	
			  $pdf = PDF::loadView('misprints.metrowaterdownload', $relations);
			  
			  $pdf->setPaper('A4', 'landscape');
				
		
				$pdf->save(storage_path('/pdffiles/some-filename11.pdf')); 
		
		 
		
		// END METRO WATER
		
		
		// WATER CONSUMPTION
		
			     /* WATER CONSUMPTION */
				 
		
		  
		 $segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
		$segment3 = Request::segment(2);
		$segment4 = Request::segment(3);
		
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $sites_count = \App\Sites::where('status', '=', '1')->count();
		  $sites_res_arr =\App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
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
				 
				if(count($getcontractedcount)>0){
				 $getcontractedRes =  Dailyreportvalidation::
				where('site', '=', $ke)
				->first(); 
				
				$contracted[$ke] =  $getcontractedRes->contracted_quantity_kl;
				$num_borewells[$ke] =  $getcontractedRes->borewellsnum;
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

		  
		  	$pdf = PDF::loadView('misprints.waterconsumptionprint', $relations);

        //      return $pdf->download('metrowater.pdf'); 
		
		       $pdf->setPaper('A4', 'landscape');
				
		
				$pdf->save(storage_path('/pdffiles/water-consumption.pdf')); 
				
				
		
		
		// END WATER CONSUMPTION
		
		
		
		
		
		
		// BOREWELL NOTWORKING
		
		       $segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
		
		$segment3 = Request::segment(2);
		$segment4 = Request::segment(3);
		
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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
		  
		    	$pdf = PDF::loadView('misprints.borewellmisprint', $relations);

        //      return $pdf->download('metrowater.pdf'); 
				
		  $pdf->setPaper('A4', 'landscape');
				$pdf->save(storage_path('/pdffiles/borewellnotworking.pdf')); 
		  
		// END BOREWELL NOT WORKING
		
		
		
		
		$segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
		$segment3 = Request::segment(2);
		$segment4 = Request::segment(3);
		
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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
			 
			
			 // return view('misprints.occupancyprint', $relations);
			 
		
		
				$pdf = PDF::loadView('misprints.occupancyprint', $relations);
				
				$pdf->save(storage_path('/pdffiles/some-filename.pdf')); 
				
				
				
				// FIRESAFE STATUS
				 
				
		
		 $segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
		$segment3 = Request::segment(2);
		$segment4 = Request::segment(3);
		
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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
			   		

		  // return view('misprints.firesaftyprint', $relations);
		   
		  $pdf = PDF::loadView('misprints.firesaftyprint', $relations);  
          $pdf->save(storage_path('/pdffiles/firesafe.pdf')); 
		  
		  
		  // ELECTRO MECANICAL EQUIPMENT
		  
		  
		$segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
		$segment3 = Request::segment(2);
		$segment4 = Request::segment(3);
		
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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
			
			 $pdf = PDF::loadView('misprints.electomechanical', $relations);  
              $pdf->save(storage_path('/pdffiles/electomechanical.pdf')); 
				
				
				
				// STP STATUS
				
		$segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
		$segment3 = Request::segment(2);
		$segment4 = Request::segment(3);
			
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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
			   		
		   $pdf = PDF::loadView('misprints.stpstatus', $relations);  
           $pdf->save(storage_path('/pdffiles/stpstatus.pdf')); 
		   
		    
		   
		   //WSP STATUS
		$segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
		$segment3 = Request::segment(2);
		$segment4 = Request::segment(3);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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
			
			  $pdf = PDF::loadView('misprints.wspstatus', $relations);  
              $pdf->save(storage_path('/pdffiles/wspstatus.pdf')); 
			  
			  
			  
			  // SECURITY
			  
	    $segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
		$segment3 = Request::segment(2);
		$segment4 = Request::segment(3);
		
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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
					 
					 if($fieldarr->site == 5 || $fieldarr->site == 6 || $fieldarr->site == 7 || $fieldarr->site == 8 || $fieldarr->site ==10 || $fieldarr->site ==14 || $fieldarr->site ==17 || $fieldarr->site == 16) {
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
							
					 } else {
					    
					 
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
		      
		    $pdf = PDF::loadView('misprints.missecurityoneprint', $relations);  
		    $pdf->save(storage_path('/pdffiles/missecurityoneprint.pdf')); 
			  
			  // END SECURITY
			  
			  
			  
			  // HOUSE KEEPING DOWNLOAD
   
		$segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
		$segment3 = Request::segment(2);
		$segment4 = Request::segment(3);
		
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		   
		  }else{ 

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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
				$deployment['deployment'][$dep] = (float)$depresult['house_sup'] + (float)$depresult['house_help'] + (float)$depresult['clu_hs_fo'] +  (float)$depresult['clu_hs_hk'] +  (float)$depresult['other'];
			} 	else{
			   $deployment['deployment'][$dep] = 0;
			}
		  }

		$matchfields = ['month' => $segment4, 'year' => $segment3]; 

		$res_count = \App\Housekpmisreport::where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Housekpmisreport::where($matchfields)->get();
				
			 $existing_records = array();
			 foreach($formfieldarray  as $existing){
			    $existing_records[$existing['site']] = $existing;
			 }
			
		  }
		  
		 //  echo "<pre>"; print_r($existing_records);echo "</pre>";
			// exit; 
		  
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
		      

		  //return view('misprints.housekeepingoneprint', $relations);
		   
		  $pdf = PDF::loadView('misprints.housekeepingoneprint', $relations);  
		  
		  $pdf->setPaper('A4', 'landscape');
		   
		  $pdf->save(storage_path('/pdffiles/housekeepingoneprint.pdf')); 
				  
			// END 	 HOUSEKEEPING DOWNLOAD
			
			
			// HORTICULTURE
			
		$segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
		$segment3 = Request::segment(2);
		$segment4 = Request::segment(3);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		   
		  }else{ 

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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
				$deployment['deployment'][$dep] = (float)$depresult['house_sup'] + (float)$depresult['house_help'] + (float)$depresult['clu_hs_fo'] +  (float)$depresult['clu_hs_hk'] +  (float)$depresult['other'];
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
			 $existing_records_two = array();
			 $existing_records_three = array();
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
				
				//HORTICULTURE
				$existing_records['watering'][$sk] = $hsk_arr['watering'];
				$existing_records['cleaning'][$sk] = $hsk_arr['cleaning'];
				$existing_records['weeding'][$sk] = $hsk_arr['weeding'];
				$existing_records['cutting'][$sk] = $hsk_arr['cutting'];
				$existing_records['multching'][$sk] = $hsk_arr['multching'];
				$existing_records['trimming'][$sk] = $hsk_arr['trimming'];
				$existing_records['training_shaping'][$sk] = $hsk_arr['training_shaping'];
				$existing_records['pruning'][$sk] = $hsk_arr['pruning'];
				$existing_records['hoeing'][$sk] = $hsk_arr['hoeing'];
				$existing_records['lawn_moving'][$sk] = $hsk_arr['lawn_moving'];
				$existing_records['fertilizer_application'][$sk] = $hsk_arr['fertilizer_application'];
				$existing_records['organic_manure_app'][$sk] = $hsk_arr['organic_manure_app'];
				$existing_records['spraying_chemicals'][$sk] = $hsk_arr['spraying_chemicals'];
				$existing_records['micro_nutrients'][$sk] = $hsk_arr['micro_nutrients'];
				$existing_records['weedicide_application'][$sk] = $hsk_arr['weedicide_application'];
				$existing_records['mandays_perday'][$sk] = $hsk_arr['mandays_perday'];
				
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
				
				
				//HORTICULTURE
				$existing_records['watering'][$sk] = "";
				$existing_records['cleaning'][$sk] = "";
				$existing_records['weeding'][$sk] = "";
				$existing_records['cutting'][$sk] = "";
				$existing_records['multching'][$sk] = "";
				$existing_records['trimming'][$sk] = "";
				$existing_records['training_shaping'][$sk] = "";
				$existing_records['pruning'][$sk] = "";
				$existing_records['hoeing'][$sk] = "";
				$existing_records['lawn_moving'][$sk] = "";
				$existing_records['fertilizer_application'][$sk] = "";
				$existing_records['organic_manure_app'][$sk] = "";
				$existing_records['spraying_chemicals'][$sk] = "";
				$existing_records['micro_nutrients'][$sk] = "";
				$existing_records['weedicide_application'][$sk] = "";
				$existing_records['mandays_perday'][$sk] = "";
				
			 }
			 
			
		    
		  }
		  
		   foreach($siteattrname as $sk => $sitena){
		  
		    $matchhuskpfields = ['month' => $segment4, 'year' => $segment3, 'site' => $sk];
			 if($sk == 5 || $sk == 6 || $sk == 7 || $sk == 8 || $sk ==10 || $sk ==14 || $sk ==17 || $sk == 16) {
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
				 }else{
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
		 //  return view('misfiles.view.horticulturepestone', $relations);
		   
		    $pdf = PDF::loadView('misprints.horticulturereportprintone', $relations);  

         // return $pdf->download('horticulture.pdf');   
		
	/*	 $monthName = date('F', mktime(0, 0, 0, $segment4, 10));   
			   $fnam = 'HorticultureReport'.$monthName."_".$segment3.".pdf";
			  return $pdf->download($fnam);  */
			  
			    $pdf->setPaper('A4', 'landscape');
				
				  $pdf->save(storage_path('/pdffiles/horticulturereportprintone.pdf')); 
			// END HORTICULTURE
			
			
			//CLUBHOUSE
			
		$segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4); 
		$segment3 = Request::segment(2);
		$segment4 = Request::segment(3);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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
		
		// return view('misprints.clubhouseprint', $relations);
		 
		 $pdf = PDF::loadView('misprints.clubhouseprint', $relations);

		  $pdf->save(storage_path('/pdffiles/clubhouseprint.pdf')); 

			 
			// END CLUB HOUSE
			
			
			$segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
		$segment3 = Request::segment(2);
		$segment4 = Request::segment(3);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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
			  // echo "<pre>"; print_r($indentrep_Array);echo "</pre>"; exit;
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
			
		      

		 // return view('misfiles.view.materialindented', $relations);
		
		 
		
		// return view('misprints.materialindented', $relations);
		 
		    $pdf = PDF::loadView('misprints.materialindented', $relations);
		 	$pdf->save(storage_path('/pdffiles/materialindented.pdf')); 
			
			// APNACOMLEX COMPLAINT REORT
			
				$segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
		$segment3 = Request::segment(2);
		$segment4 = Request::segment(3);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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
		
		// return view('misprints.apnacomplex', $relations);
		 
		   
		$pdf = PDF::loadView('misprints.apnacomplex', $relations);
		$pdf->save(storage_path('/pdffiles/apnacomplex.pdf')); 
		
		
		//TRAFFIC
		$segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
		$segment3 = Request::segment(2);
		$segment4 = Request::segment(3);
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
	      $sitenames = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->get()->pluck('name', 'id');
		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		  
		  
		  }else{       

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
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
		 
		//  return view('misprints.mistrafficprint', $relations);
		  
		$pdf = PDF::loadView('misprints.mistrafficprint', $relations);
		$pdf->save(storage_path('/pdffiles/mistrafficprint.pdf')); 
			
				
				//$pdf->save(storage_path('/pdffiles/some-filename11.pdf')); 
				
				$pdfFile2Path = storage_path() . '/pdffiles/some-filename.pdf';
				$pdfFile1Path = storage_path() . '/pdffiles/some-filename11.pdf';
				$pdfFile3Path = storage_path() . '/pdffiles/water-consumption.pdf';
				$pdfFile4Path = storage_path() . '/pdffiles/borewellnotworking.pdf';
				$pdfFile5Path = storage_path() . '/pdffiles/firesafe.pdf';
				$pdfFile6Path = storage_path() . '/pdffiles/electomechanical.pdf';
				$pdfFile7Path = storage_path() . '/pdffiles/stpstatus.pdf';
				$pdfFile8Path = storage_path() . '/pdffiles/wspstatus.pdf';
				$pdfFile9Path = storage_path() . '/pdffiles/missecurityoneprint.pdf';
				$pdfFile16Path = storage_path() . '/pdffiles/mistrafficprint.pdf';
				$pdfFile10Path = storage_path() . '/pdffiles/housekeepingoneprint.pdf';
				$pdfFile11Path = storage_path() . '/pdffiles/horticulturereportprintone.pdf';
				$pdfFile12Path = storage_path() . '/pdffiles/clubhouseprint.pdf';
				$pdfFile13Path = storage_path() . '/pdffiles/materialindented.pdf';
				$pdfFile14Path = storage_path() . '/pdffiles/apnacomplex.pdf';
				$pdfFile15Path = storage_path() . '/pdffiles/mistrafficprint.pdf';
				
				
				$pdf = new \PDFMerger();
				
				
				
				$pdf->addPDF($pdfFile1Path, 'all');
				$pdf->addPDF($pdfFile3Path, 'all'); 
				$pdf->addPDF($pdfFile4Path, 'all');
				$pdf->addPDF($pdfFile5Path, 'all'); 
			 	$pdf->addPDF($pdfFile6Path, 'all'); 
				$pdf->addPDF($pdfFile7Path, 'all'); 
				$pdf->addPDF($pdfFile8Path, 'all'); 
				$pdf->addPDF($pdfFile9Path, 'all'); 
				$pdf->addPDF($pdfFile16Path, 'all'); 
				$pdf->addPDF($pdfFile10Path, 'all'); 
				$pdf->addPDF($pdfFile11Path, 'all');
				$pdf->addPDF($pdfFile12Path, 'all');
				$pdf->addPDF($pdfFile2Path, 'all');
				$pdf->addPDF($pdfFile13Path, 'all');
				$pdf->addPDF($pdfFile14Path, 'all');
				
				 
				
				
				$pathForTheMergedPdf = storage_path() . "/pdffiles/result.pdf";
				
				 
				$pdf->merge('download', $pathForTheMergedPdf);

        		 // return $pdf->download('occupancy.pdf'); //Download      
		  
		    // return view('misprints.occupancyprint', $relations);
		
		
		
		} 
		
  
    }
	

	

	
  
}

