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
use App\Blocknocreport;
use App\Blocknocmonthreport;
use App\Waterconsumpmisreport;
use App\Cmdmisdatareport;
use App\Firepreparemisreport;
use App\Securitydailyreport;



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
	 
	$year = isset($_GET['y'])?$_GET['y']:date("Y");
	$month =isset($_GET['m'])?$_GET['m']:date("m");

	      $relations = [

            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),
			'sites_attr_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id'),
			'syear' => $year,
			'smonth' => $month,

        ]; 

		  return view('misreports.index', $relations);

    } 
	
	
	  public function testnoc(Request $request)

    { 
	
	
	   
		  // FIRE NOC
		  
	    $segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
		
		  
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
		$noc_f_res = array();
		$sarovar_fr = array();
		$cyber_fr = array();
		$aura_fr = array();
		$hill_aven_fr = array();
		$hill_lake_fr = array();
		$sarovargran_fr = array();
		$twrs_fr = array();
		 foreach($siteattrname as $kk =>$siteat) {
		 $matchfields_fornoc = ['valid_month' => $segment4, 'valid_year' => $segment3, 'site' =>$kk]; 
		 $resnoc_count = \App\Blocknocmonthreport::where($matchfields_fornoc)->count();
		 if($resnoc_count > 0){
		     $resnoc_cres = \App\Blocknocmonthreport::where($matchfields_fornoc)->get();
		    $noc_f_res[$kk] = $resnoc_cres;
			if($kk == 9) {$sarovar_fr =  $noc_f_res[$kk];}
			   if($kk == 13) {$cyber_fr =  $noc_f_res[$kk];}
			   if($kk == 11) {$aura_fr =  $noc_f_res[$kk];}
			   if($kk == 10) {$hill_aven_fr =  $noc_f_res[$kk];}
			    if($kk == 5) {$hill_lake_fr =  $noc_f_res[$kk];}
			    if($kk == 18) {$twrs_fr =  $noc_f_res[$kk];}
				 if($kk == 15) {$sarovargran_fr =  $noc_f_res[$kk];}
		 }
		   else{
		     $matchfields_f = ['site' => $kk]; 
			  $firenocdata_month_res_cn = \App\Blocknocmonthreport::where($matchfields_f)->orderBy('valid_month', 'desc')->count();
			  if($firenocdata_month_res_cn > 0) {
		     $firenocdata_month_res_emp = \App\Blocknocmonthreport::where($matchfields_f)->orderBy('valid_month', 'desc')->first();
			 $matchfields_fornoc = ['valid_month' => $firenocdata_month_res_emp->valid_month, 'valid_year' => $segment3, 'site' =>$kk];
		      $resnoc_cres = \App\Blocknocmonthreport::where($matchfields_fornoc)->get();
			  $noc_f_res[$kk] = $resnoc_cres;
			   if($kk == 9) {$sarovar_fr =  $noc_f_res[$kk];}
			   if($kk == 13) {$cyber_fr =  $noc_f_res[$kk];}
			   if($kk == 11) {$aura_fr =  $noc_f_res[$kk];}
			   if($kk == 10) {$hill_aven_fr =  $noc_f_res[$kk];}
			    if($kk == 5) {$hill_lake_fr =  $noc_f_res[$kk];}
			    if($kk == 18) {$twrs_fr =  $noc_f_res[$kk];}
				 if($kk == 15) {$sarovargran_fr =  $noc_f_res[$kk];}
			  }else{
			  
			  $noc_f_res[$kk] = array();  	
			   if($kk == 9) {$sarovar_fr =  $noc_f_res[$kk];}
			   if($kk == 13) {$cyber_fr =  $noc_f_res[$kk];}
			   if($kk == 11) {$aura_fr =  $noc_f_res[$kk];}
			   if($kk == 10) {$hill_aven_fr =  $noc_f_res[$kk];}
			    if($kk == 5) {$hill_lake_fr =  $noc_f_res[$kk];}
			    if($kk == 18) {$twrs_fr =  $noc_f_res[$kk];}
				 if($kk == 15) {$sarovargran_fr =  $noc_f_res[$kk];}
			      
			  }
			   
		   }
		}
		 $reportdate_val = "2-3-2018";
			$relations = [
			
			'sites' => $siteattrname,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'nocres' => $noc_f_res, 
			'sarovarres' => $sarovar_fr,
			'cyberres' => $cyber_fr,
			'graderes' => $sarovargran_fr,
			'towers' => $twrs_fr,
			'avenues' => $hill_aven_fr,
			'lakeb' => $hill_lake_fr,
			'aurares' => $aura_fr,
			
			  
			];     
			   		
           $nocCount = 0;
		   foreach($siteattrname as $nk => $sitenoc){
		     if(count($noc_f_res[$nk]) > 0) {
			    $nocCount =  $nocCount + 1;
			 }
		   }
		   
		  return view('misprints.nocdataprintbkp', $relations);

		
 
		  // return view('misprints.firenocrenewals', $relations);
		   
		 // $pdf = PDF::loadView('misprints.firenocrenewals', $relations);  
          //$pdf->save(storage_path('/pdffiles/firenocrenewal.pdf')); 
		  
		  
		  $pdf = PDF::loadView('misprints.nocdataprintbkp', $relations);  
          $pdf->save(storage_path('/pdffiles/nocdataprintbkp.pdf')); 
		  
		  $pdf = PDF::loadView('misprints.nocdataprint', $relations);  
          $pdf->save(storage_path('/pdffiles/nocdataprint.pdf')); 
		  
		      	$pdfFile2Path = storage_path() . '/pdffiles/nocdataprintbkp.pdf';
				$pdfFile1Path = storage_path() . '/pdffiles/nocdataprint.pdf';
		  
		  
		  	$pdf = new \PDFMerger();
				
				
				
				$pdf->addPDF($pdfFile2Path, 'all');
				$pdf->addPDF($pdfFile1Path, 'all'); 
				
				$pathForTheMergedPdf = storage_path() . "/pdffiles/result.pdf";
				
				 
				$pdf->merge('download', $pathForTheMergedPdf);
		  
		
	  // FIRE NOC
	 /* $segment4 = "2";
	    $segment3 = "2018";
		    
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
		$noc_f_res = array();
		$sarovar_fr = array();
		$cyber_fr = array();
		$aura_fr = array();
		$hill_aven_fr = array();
		$hill_lake_fr = array();
		$sarovargran_fr = array();
		$twrs_fr = array();
		 foreach($siteattrname as $kk =>$siteat) {
		 $matchfields_fornoc = ['valid_month' => $segment4, 'valid_year' => $segment3, 'site' =>$kk]; 
		 $resnoc_count = \App\Blocknocmonthreport::where($matchfields_fornoc)->count();
		 if($resnoc_count > 0){
		     $resnoc_cres = \App\Blocknocmonthreport::where($matchfields_fornoc)->get();
		    $noc_f_res[$kk] = $resnoc_cres;
			if($kk == 9) {$sarovar_fr =  $noc_f_res[$kk];}
			   if($kk == 13) {$cyber_fr =  $noc_f_res[$kk];}
			   if($kk == 11) {$aura_fr =  $noc_f_res[$kk];}
			   if($kk == 10) {$hill_aven_fr =  $noc_f_res[$kk];}
			    if($kk == 5) {$hill_lake_fr =  $noc_f_res[$kk];}
			    if($kk == 18) {$twrs_fr =  $noc_f_res[$kk];}
				 if($kk == 15) {$sarovargran_fr =  $noc_f_res[$kk];}
		 }
		   else{
		     $matchfields_f = ['site' => $kk]; 
			  $firenocdata_month_res_cn = \App\Blocknocmonthreport::where($matchfields_f)->orderBy('valid_month', 'desc')->count();
			  if($firenocdata_month_res_cn > 0) {
		     $firenocdata_month_res_emp = \App\Blocknocmonthreport::where($matchfields_f)->orderBy('valid_month', 'desc')->first();
			 $matchfields_fornoc = ['valid_month' => $firenocdata_month_res_emp->valid_month, 'valid_year' => $segment3, 'site' =>$kk];
		      $resnoc_cres = \App\Blocknocmonthreport::where($matchfields_fornoc)->get();
			  $noc_f_res[$kk] = $resnoc_cres;
			   if($kk == 9) {$sarovar_fr =  $noc_f_res[$kk];}
			   if($kk == 13) {$cyber_fr =  $noc_f_res[$kk];}
			   if($kk == 11) {$aura_fr =  $noc_f_res[$kk];}
			   if($kk == 10) {$hill_aven_fr =  $noc_f_res[$kk];}
			    if($kk == 5) {$hill_lake_fr =  $noc_f_res[$kk];}
			    if($kk == 18) {$twrs_fr =  $noc_f_res[$kk];}
				 if($kk == 15) {$sarovargran_fr =  $noc_f_res[$kk];}
			  }else{
			  
			  $noc_f_res[$kk] = array();  	
			   if($kk == 9) {$sarovar_fr =  $noc_f_res[$kk];}
			   if($kk == 13) {$cyber_fr =  $noc_f_res[$kk];}
			   if($kk == 11) {$aura_fr =  $noc_f_res[$kk];}
			   if($kk == 10) {$hill_aven_fr =  $noc_f_res[$kk];}
			    if($kk == 5) {$hill_lake_fr =  $noc_f_res[$kk];}
			    if($kk == 18) {$twrs_fr =  $noc_f_res[$kk];}
				 if($kk == 15) {$sarovargran_fr =  $noc_f_res[$kk];}
			      
			  }
			   
		   }
		}
		 
			$relations = [
			'report_on' => "2018-12-23",
			'sarovarres' => $sarovar_fr,
			'cyberres' => $cyber_fr,
			'graderes' => $sarovargran_fr,
			'towers' => $twrs_fr,
			'avenues' => $hill_aven_fr,
			'lakeb' => $hill_lake_fr,
			'aurares' => $aura_fr,
			
			  
			];     
	 

		  return view('misprints.nocdataprint', $relations); */

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
	   
	 public function advanceddailyindex(Request $request)

    { 
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
	      $relations = [

            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),
			'sites_attr_names' => $siteattrname,

        ]; 
		  return view('dailyreports.advanceddailyindex', $relations);

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
			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', ''),
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
			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', ''),
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
			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		    $sites_count = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->count();
		  $sites_res_arr =\App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sites_count = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->count();
			$sites_res_arr =\App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
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
				 
				if($getcontractedcount>0){
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
				$sitearr = array();
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
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sites_count = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->count();
			$sites_res_arr =\App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
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
				 
				if($getcontractedcount>0){
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
			'sitenames' =>  $siteattrname,
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
		  
		   $sitearrnew = array();
		  foreach( $siteattrname as $kkk => $site){
		     $sitearrnew[]=$kkk;
		  }
		
		$matchfields = ['month' => $segment4, 'year' => $segment3]; 
		
		if(Auth::user()->id == 1){
		$res_count = \App\Firesafetymisreport::whereIn('site', $sitearrnew)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Firesafetymisreport::whereIn('site', $sitearrnew)->where($matchfields)->get();
		}
		
		}
		else
		{
		  $res_count = \App\Firesafetymisreport::whereIn('site', $sitearrnew)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Firesafetymisreport::whereIn('site', $sitearrnew)->where($matchfields)->get();
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
		  $misprevresult = array();
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
			
					if($segment4 == 1){
			  $prev_mon = 12;
			  $prev_year = $segment3 - 1;
 			}
			else{
			  $prev_mon = $segment4 - 1;;
			  $prev_year = $segment3;
			}
			
			$mismatchprevfields = ['month' => $prev_mon, 'year' => $prev_year, 'site' =>$skey]; 
			$misprevmatchcount = \App\Firesafetymisreport::where($mismatchprevfields)->count();
			
			if($misprevmatchcount > 0){
				 $mismatch_prev_ress = \App\Firesafetymisreport::where($mismatchprevfields)->first();
				 $misprevresult[$skey] = $mismatch_prev_ress;
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
			'misprevious' => $misprevresult,
			
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
		
				   $sitearrnew = array();
		  foreach( $siteattrname as $kkk => $site){
		     $sitearrnew[]=$kkk;
		  }
		
		$matchfields = ['month' => $segment4, 'year' => $segment3]; 
		
		if(Auth::user()->id == 1){
		$res_count = \App\Equipmentmisreport::whereIn('site', $sitearrnew)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Equipmentmisreport::whereIn('site', $sitearrnew)->where($matchfields)->get();
		}
		
		}
		else
		{
		  $res_count = \App\Equipmentmisreport::whereIn('site', $sitearrnew)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Equipmentmisreport::whereIn('site', $sitearrnew)->where($matchfields)->get();
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
		 $misprevresult = array();
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
			
			
		if($segment4 == 1){
			  $prev_mon = 12;
			  $prev_year = $segment3 - 1;
 			}
			else{
			  $prev_mon = $segment4 - 1;;
			  $prev_year = $segment3;
			}
			
			$mismatchprevfields = ['month' => $prev_mon, 'year' => $prev_year, 'site' =>$skey]; 
			$misprevmatchcount = \App\Equipmentmisreport::where($mismatchprevfields)->count();
			
			if($misprevmatchcount > 0){
				 $mismatch_prev_ress = \App\Equipmentmisreport::where($mismatchprevfields)->first();
				 $misprevresult[$skey] = $mismatch_prev_ress;
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
			  // $ref_record_temp_val = \App\Equipmentnotworkingissue::where($matchreffields)->get();
			   $ref_record_temp_val = \App\Equipmentnotworkingissue::where($matchreffields)->orderBy('category', 'asc')->get();
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
			'misprevious' => $misprevresult,
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
		
		   $sitearrnew = array();
		  foreach( $siteattrname as $kkk => $site){
		     $sitearrnew[]=$kkk;
		  }
		
		$matchfields = ['month' => $segment4, 'year' => $segment3]; 
		
		if(Auth::user()->id == 1){
		$res_count = \App\Stpmisreport::whereIn('site', $sitearrnew)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Stpmisreport::whereIn('site', $sitearrnew)->where($matchfields)->get();
		}
		
		}
		else
		{
		  $res_count = \App\Stpmisreport::whereIn('site', $sitearrnew)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Stpmisreport::whereIn('site', $sitearrnew)->where($matchfields)->get();
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
		 $misprevresult = array();
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
			
			if($segment4 == 1){
			  $prev_mon = 12;
			  $prev_year = $segment3 - 1;
 			}
			else{
			  $prev_mon = $segment4 - 1;;
			  $prev_year = $segment3;
			}
			
			$mismatchprevfields = ['month' => $prev_mon, 'year' => $prev_year, 'site' =>$skey]; 
			$misprevmatchcount = \App\Stpmisreport::where($mismatchprevfields)->count();
			
			if($misprevmatchcount > 0){
				 $mismatch_prev_ress = \App\Stpmisreport::where($mismatchprevfields)->first();
				 $misprevresult[$skey] = $mismatch_prev_ress;
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
			   //$ref_record_temp_val = \App\Stpnotworkingissue::where($matchreffields)->get();
			   $ref_record_temp_val = \App\Stpnotworkingissue::where($matchreffields)->orderBy('category', 'asc')->get();
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
			'misprevious' => $misprevresult,
			
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
		
		   $sitearrnew = array();
		  foreach( $siteattrname as $kkk => $site){
		     $sitearrnew[]=$kkk;
		  }
		
		$matchfields = ['month' => $segment4, 'year' => $segment3]; 
		
		if(Auth::user()->id == 1){
		$res_count = \App\Wspmisreport::whereIn('site', $sitearrnew)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Wspmisreport::whereIn('site', $sitearrnew)->where($matchfields)->get();
		}
		
		}
		else
		{
		  $res_count = \App\Wspmisreport::whereIn('site', $sitearrnew)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Wspmisreport::whereIn('site', $sitearrnew)->where($matchfields)->get();
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
		 $misprevresult = array();
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
			
				if($segment4 == 1){
			  $prev_mon = 12;
			  $prev_year = $segment3 - 1;
 			}
			else{
			  $prev_mon = $segment4 - 1;;
			  $prev_year = $segment3;
			}
			
			$mismatchprevfields = ['month' => $prev_mon, 'year' => $prev_year, 'site' =>$skey]; 
			$misprevmatchcount = \App\Wspmisreport::where($mismatchprevfields)->count();
			
			if($misprevmatchcount > 0){
				 $mismatch_prev_ress = \App\Wspmisreport::where($mismatchprevfields)->first();
				 $misprevresult[$skey] = $mismatch_prev_ress;
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
			  // $ref_record_temp_val = \App\Wspnotworkingissue::where($matchreffields)->get();
			   $ref_record_temp_val = \App\Wspnotworkingissue::where($matchreffields)->orderBy('category', 'asc')->get();
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
			'misprevious' => $misprevresult,
			
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
								$dateString = $segment3.'-'.$segment4.'-04';
							//Last date of current month.
							$lastDateOfMonth = date("t", strtotime($dateString));
							$reportdate_val = $lastDateOfMonth."-".$segment4."-".$segment3;
							
							$security_match_fields = ['site' => $fieldarr->site,'reporton' => $reportdate_val];
							
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
					  $exist_Sec['computers_num'][$fieldarr->site] = $fieldarr->computers_num;
					 $exist_Sec['bicycle_num'][$fieldarr->site] = $fieldarr->bicycle_num;
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
					 
					  $exist_SecTwo['computers_num'][$fieldarr->site] = $fieldarr->computers_num;
					 $exist_SecTwo['bicycle_num'][$fieldarr->site] = $fieldarr->bicycle_num;
					 
					 
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		   
		  }else{ 

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
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
				$deployment['deployment'][$dep] =  (float)$depresult['house_help'] +  (float)$depresult['clu_hs_hk'];
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		   
		  }else{ 

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
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
				$deployment['deployment'][$dep] =  (float)$depresult['house_help'] +  (float)$depresult['clu_hs_hk'];
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
			 	$hsk_arr = \App\Horticulturemisreport::where($matchhuskpfields)->first();
				
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
			 	$hsk_arr = \App\Horticulturemisreport::where($matchhuskpfields)->first();
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
			 	$hsk_arr = \App\Horticulturemisreport::where($matchhuskpfields)->first();
				
				
				
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
		$avg_swimpool_per_res = array();
		$avg_gym_per_res = array();
		$avg_occupan_res = array();
		$swimpool_res_Arr = array();
		$gym_res_Arr = array();
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
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
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
				 
				 
				$stdate = $dateString;
				$endate = $reporton;
				$getavg_info_count = \App\Pmsdailyreport::where('reporton','>=',$stdate)->where('reporton','<=',$endate)->where('site','=',$site)->count();
				$swimpool = 0;
				$gym = 0;
				if($getavg_info_count > 0){
				$getavg_info_res = \App\Pmsdailyreport::where('reporton','>=',$stdate)->where('reporton','<=',$endate)->where('site','=',$site)->get();
				
				foreach($getavg_info_res as $rowres){
				$swimpool += $rowres->clbhous_users_pool;
				$gym += $rowres->clbhous_users_gym;
				}
				}
				$day_cn=cal_days_in_month(CAL_GREGORIAN,$month,$year);
				
				
				$avg_gym = round((float)($gym/$day_cn));
				$avg_swimpool = round((float)($swimpool/$day_cn));
				$av_occ = round((float)(($owners + $tenents)/2));
				$avg_swimpool_per = 0;
				$avg_gym_per = 0;
				if($av_occ > 0){
				$avg_swimpool_per = round(($avg_swimpool * 100)/($av_occ));
				$avg_gym_per = round(($avg_gym * 100)/($av_occ));
				}
				 
				$avg_swimpool_per_res[$kk] = $avg_swimpool_per;
				$avg_gym_per_res[$kk] = $avg_gym_per;
				$avg_occupan_res[$kk] = $av_occ;
				$swimpool_res_Arr[$kk] = $avg_swimpool;
				$gym_res_Arr[$kk] = $avg_gym;
				$pow[$kk] = $prev_owners ;
				$pte[$kk] = $prev_tenents ;
				
			    $powcur[$kk] = $cur_owners ;
				$ptecur[$kk] = $cur_tenents ;
				
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
			'swimpoll_per' => $avg_swimpool_per_res,
			'gym_per' => $avg_gym_per_res,
			'avgoccuapncy' => $avg_occupan_res,
			'swimpoll_res' => $swimpool_res_Arr,
			'gym_res' => $gym_res_Arr,
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
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
 
 
 
		

 foreach($siteattrname as $kk => $siter){
			 
				$dateString = $segment3.'-'.$segment4.'-01';
				//Last date of current month.
				$lastDateOfMonth = date("t", strtotime($dateString));
				 $reporton = $lastDateOfMonth."-".$segment4."-".$segment3;
				$reporton = $segment3."-".$segment4."-".$lastDateOfMonth;
			
				$occupanymatch_fileds = ['reporton' => $reporton, 'site' => $kk]; 
				
				 $occres_cn = \App\Pmsdailyreport::where($occupanymatch_fileds)->count(); 
				if($occres_cn > 0){
				$occres_res = \App\Pmsdailyreport::where($occupanymatch_fileds)->first();
				
				$existing_records[$kk] = array("owners"=>$occres_res->occupancy_asdate_owners,"tenants"=>$occres_res->occupancy_asdate_tenants,"vacant"=>$occres_res->occupancy_asdate_vacant);
				} 
				else{
				   $existing_records[$kk] = array("owners"=>"0","tenants"=>"0","vacant"=>"0");
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
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
				 
				
			 }  
			 
			 }
			 
			 $indentrep_Array = array();
			 $lagged_date = array();
			 $Recordcount =  array();
			 foreach($siteattrname as $stk => $siten) {
			 
			  $match_in_fields = ['month' => $segment4, 'year' => $segment3, 'site' =>$stk]; 
			  $match_in_count = \App\Indentedmisreport::where($match_in_fields)->count();
		
		       if($match_in_count > 0){
			   	    $match_in_array = \App\Indentedmisreport::where($match_in_fields)->get();
					$match_lag_array = \App\Indentedmisreport::where($match_in_fields)->first();
					
					$indentrep_Array[$stk] = $match_in_array;
					$lagged_date[$stk] = $match_lag_array->laggeddate;
					$Recordcount[$stk] = $match_in_count;
			   }
			   else{
			       $indentrep_Array[$stk] = array();
				   $Recordcount[$stk] = 0;
			   }
			   
			   
			 }
			  // echo "<pre>"; print_r($indentrep_Array);echo "</pre>"; exit;
			 //exit;
			 
			 asort($Recordcount);
			 
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
			'recordcount' => $Recordcount,
			
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
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

		

		/*$matchfields = ['month' => $segment4, 'year' => $segment3]; 

		$res_count = \App\Occupancymisreport::where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Occupancymisreport::where($matchfields)->get();
			
			
			 if(count($formfieldarray) > 0){
			     foreach($formfieldarray as $fieldarr){
				 	 $existing_records[$fieldarr->site] = array("id"=>$fieldarr->id,"owners"=>$fieldarr->owners,"tenants"=>$fieldarr->tenants,"vacant"=>$fieldarr->vacant);
				 } 
				 
				// echo "<pre>"; print_r($existing_records);echo "</pre>";
			 }  */ 
			 
			  $apnarecord = array();
			 $indentrep_Array = array();
			 $lagged_date = array();
			 foreach($siteattrname as $stk => $siten) {
			 
			  $match_in_fields = ['month' => $segment4, 'year' => $segment3, 'site' =>$stk]; 
			  $match_in_count = \App\Apnacomplaintmisreport::where($match_in_fields)->count();
		
		       if($match_in_count > 0){
			   	    $match_in_array = \App\Apnacomplaintmisreport::where($match_in_fields)->get();
					
					$indentrep_Array[$stk] = $match_in_array;
					$apnarecord[$stk] = $match_in_count;
			   }
			   else{
			       $indentrep_Array[$stk] = array();
				   $apnarecord[$stk] = 0;
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
			'cost' => $existing_Rates,
			'apnarep' => $indentrep_Array,
			'recordcount' => $apnarecord,
			];   
				 
				 
		  // $pdf = PDF::loadView('misprints.apnacomplex', $relations);

        //   return $pdf->download('apnacomplex.pdf'); //Download    
     
		//  return view('misfiles.view.misapnacomplex', $relations);
		
		 return view('misprints.apnacomplex', $relations);
		
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
			
		  }
		  $existing_records = array();
		  
			 $indentrep_Array = array();
			 $lagged_date = array();
			 foreach($siteattrname as $stk => $siten) {
			 
			  $match_in_fields = ['month' => $segment4, 'year' => $segment3, 'site' =>$stk]; 
			  $match_in_count = \App\Mockdrillmisreport::where($match_in_fields)->count();
		
		       if($match_in_count > 0){
			   	    $match_in_array = \App\Mockdrillmisreport::where($match_in_fields)->get();
					
					$indentrep_Array[$stk] = $match_in_array;
			   }
			   else{
			       $indentrep_Array[$stk] = array();
			   }
			   
			   
			 }
			 
			
			
			$relations = [
			'res' => $formfieldarray,  
			'sites' => $sitenames,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			'drill' => $indentrep_Array,
			];   
				  
		
		 return view('misprints.mismockdrillprint', $relations);
		
		}  
		
		if($segment2 == '18'){
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
			
		  }
		  $existing_records = array();
		  
			 $indentrep_Array = array();
			 $lagged_date = array();
			 foreach($siteattrname as $stk => $siten) {
			 
			  $match_in_fields = ['month' => $segment4, 'year' => $segment3, 'site' =>$stk]; 
			  $match_in_count = \App\Firepreparemisreport::where($match_in_fields)->count();
		
		       if($match_in_count > 0){
			   	    $match_in_array = \App\Firepreparemisreport::where($match_in_fields)->get();
					
					$indentrep_Array[$stk] = $match_in_array;
			   }
			   else{
			       $indentrep_Array[$stk] = array();
			   }
			   
			   
			 }
			 
			
			
			$relations = [
			'res' => $formfieldarray,  
			'sites' => $sitenames,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			'drill' => $indentrep_Array,
			];   
				  
		
		 return view('misprints.misfireprepareprint', $relations);
		
		}  
		
		if($segment2 == '17'){

		 
		$segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
			'backup' => $backup,  
			];    

	
			 
			 
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
			'cmddata'=> $cmddata,
			];    

			 
			
			  
		  
		     return view('misprints.cmdprint', $relations);

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
			 
			 
			 			   $exist_Sec = array();
			 foreach($sitenames as $kk => $siten){
			     $matchfields = ['month' => $segment4, 'year' => $segment3, 'site'=>$kk];
				 $formfieldarray_cn = \App\Trafficmisreport::where($matchfields)->count();
				 if($formfieldarray_cn > 0){
				    $fieldarr = \App\Trafficmisreport::where($matchfields)->first();
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
		   
		   
		   
		   	       $dateString = $segment3.'-'.$segment4.'-04';
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		
		
		 $exist_Sec = array();
			 foreach($siteattrname as $kk => $siten){
			     $matchfields = ['reporton' => $lastDateOfMonth, 'site'=>$kk];
				 	
				 $formfieldarray_cn = \App\Securitydailyreport::where($matchfields)->count();
				 if($formfieldarray_cn > 0){
				    $fieldarr = \App\Securitydailyreport::where($matchfields)->first();
					 $exist_Sec['sites'][$fieldarr->site] = get_sitename($fieldarr->site);
					 $exist_Sec['resident_vehicle'][$fieldarr->site] = $fieldarr->tr_resident_vehicle;
					 $exist_Sec['temp_vendors'][$fieldarr->site] = $fieldarr->tr_temp_vendors;
					 $exist_Sec['courier_delivery'][$fieldarr->site] = $fieldarr->tr_courier_delivery;
					 $exist_Sec['visitors'][$fieldarr->site] = $fieldarr->tr_visitors;
					 $exist_Sec['construc_team'][$fieldarr->site] = $fieldarr->tr_construction;
					 $exist_Sec['interworks_inflats'][$fieldarr->site] = $fieldarr->tr_inter_works;
					 $exist_Sec['interior_works_per_day'][$fieldarr->site] = $fieldarr->tr_interior_works_perday;  
					 $exist_Sec['ctotval'][$fieldarr->site] = (float)$fieldarr->tr_resident_vehicle + (float)$fieldarr->tr_temp_vendors + (float)$fieldarr->tr_courier_delivery + (float)$fieldarr->tr_visitors + (float)$fieldarr->tr_construction + (float)$fieldarr->tr_inter_works + (float)$fieldarr->tr_interior_works_perday;
				 }
				 
				 else{
				     $exist_Sec['sites'][$kk] = get_sitename($kk);
					 $exist_Sec['resident_vehicle'][$kk] = "";
					 $exist_Sec['temp_vendors'][$kk] = "";
					 $exist_Sec['courier_delivery'][$kk] = "";
					 $exist_Sec['visitors'][$kk] = "";
					 $exist_Sec['construc_team'][$kk] = "";
					 $exist_Sec['interworks_inflats'][$kk] = "";
					 $exist_Sec['interior_works_per_day'][$kk] = "";
					 $exist_Sec['ctotval'][$kk] = 0; 
				 
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
	ini_set('max_execution_time', 300);
	ini_set('mbstring.encoding_translation', 'On');
	

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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sites_count = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->count();
		  $sites_res_arr =\App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sites_count = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->count();
			$sites_res_arr =\App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
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
				 
				if($getcontractedcount>0){
				
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
			$sitearr = array();
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
			 // return view('misprints.metrowaterdownload', $relations);  
			$pdf = PDF::loadView('misprints.metrowaterdownload', $relations);

            // $pdf->setPaper('A4', 'landscape');
			 
			date_default_timezone_set('Asia/Kolkata');
			$today_date = date('d');
			$today_time = date("g:i a");
			$monthName = date('F', mktime(0, 0, 0, $segment4, 10)); 
			
			 $fnam = 'MetroWater_'.$monthName."_".$today_date."_".$segment3."_".$today_time.".pdf";
            // return $pdf->download('metrowater.pdf'); //Download    
			 return $pdf->download($fnam);
			 
			  
		//	  return $pdf->stream('metrowater.pdf');

		//  return view('misprints.metrowaterdownload', $relations);

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
			'sitenames' =>  $siteattrname,
			
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

		if($segment2 == '4'){/*
		
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
		
		   $sitearrnew = array();
		  foreach( $siteattrname as $kkk => $site){
		     $sitearrnew[]=$kkk;
		  }
		
		$matchfields = ['month' => $segment4, 'year' => $segment3]; 
		
		if(Auth::user()->id == 1){
		$res_count = \App\Firesafetymisreport::whereIn('site', $sitearrnew)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Firesafetymisreport::whereIn('site', $sitearrnew)->where($matchfields)->get();
		}
		
		}
		else
		{
		  $res_count = \App\Firesafetymisreport::whereIn('site', $sitearrnew)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Firesafetymisreport::whereIn('site', $sitearrnew)->where($matchfields)->get();
		}
		 
		}
		
		$refid = array();
		
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

       
			  
			  date_default_timezone_set('Asia/Kolkata');
			$today_date = date('d');
			$today_time = date("g:i a");
			$monthName = date('F', mktime(0, 0, 0, $segment4, 10)); 
			 $fnam = 'FireSafety_'.$monthName."_".$today_date."_".$segment3."_".$today_time.".pdf";
            // return $pdf->download('metrowater.pdf'); //Download    
			  return $pdf->download($fnam);

		*/
		
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
		
		   $sitearrnew = array();
		  foreach( $siteattrname as $kkk => $site){
		     $sitearrnew[]=$kkk;
		  }
		
		$matchfields = ['month' => $segment4, 'year' => $segment3]; 
		
		if(Auth::user()->id == 1){
		$res_count = \App\Firesafetymisreport::whereIn('site', $sitearrnew)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Firesafetymisreport::whereIn('site', $sitearrnew)->where($matchfields)->get();
		}
		
		}
		else
		{
		  $res_count = \App\Firesafetymisreport::whereIn('site', $sitearrnew)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Firesafetymisreport::whereIn('site', $sitearrnew)->where($matchfields)->get();
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
		  $misprevresult = array();
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
			
			
			if($segment4 == 1){
			  $prev_mon = 12;
			  $prev_year = $segment3 - 1;
 			}
			else{
			  $prev_mon = $segment4 - 1;;
			  $prev_year = $segment3;
			}
			
			$mismatchprevfields = ['month' => $prev_mon, 'year' => $prev_year, 'site' =>$skey]; 
			$misprevmatchcount = \App\Firesafetymisreport::where($mismatchprevfields)->count();
			
			if($misprevmatchcount > 0){
				 $mismatch_prev_ress = \App\Firesafetymisreport::where($mismatchprevfields)->first();
				 $misprevresult[$skey] = $mismatch_prev_ress;
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
			   $ref_record_temp_val = \App\Firesafenotworkingissue::where($matchreffields)->orderBy('category', 'asc')->get();
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
			 'misprevious' => $misprevresult,
			
			];     
			
			
			
			  if (count($issuecount) > 0) {
			      $mc = 0;$issuet = array();
                        foreach ($issuecount as $ikey => $issuecn) {
						$mc = $mc + 1;
							$relations = [
							'sites' => $siteattrname,
								'ikey' => $ikey,  
								'issuecn' => $issuecn,
								'report_on' => $reportdate_val,
								'report_year' => $segment3,
								'report_month' => $segment4,
								'issues' => $ref_overall, 
								'issuecount' => $issuecount,
								'validation' => $ref_total, 
								'misres' => $misresult, 
								 'misprevious' => $misprevresult,
								'issuetemp' => $ref_overall_temp,
							];  
							
								$pdf = PDF::loadView('misprints.firesafeviews.mainfile', $relations);
		                      // $pdf->setPaper('A4', 'landscape');
		                       $pdf->save(storage_path('/pdffiles/firesafe/mistrafficprint'.$ikey.'.pdf'));  
						  
						  if($issuecn > 5) {
						       $issuet[$ikey] = $ikey;
						       	$relations = [
								'sites' => $siteattrname,
								'ikey' => $ikey,  
								'issuecn' => $issuecn,
								'report_on' => $reportdate_val,
								'report_year' => $segment3,
								'report_month' => $segment4,
								'issues' => $ref_overall, 
								'issuecount' => $issuecount,
								'validation' => $ref_total, 
								'misres' => $misresult, 
								 'misprevious' => $misprevresult,
								'issuetemp' => $ref_overall_temp,
							];  
							
						    
							  $pdf = PDF::loadView('misprints.firesafeviews.landscpaefile', $relations);
		                      $pdf->setPaper('A4', 'landscape');
		                       $pdf->save(storage_path('/pdffiles/firesafe/mistrafficprintissue'.$ikey.'.pdf'));  
							 
						  } else
						  {
						   if($issuecn > 0){
						 
						  $issuet[$ikey] = $ikey;
						    
							 	$relations = [
								'sites' => $siteattrname,
								'ikey' => $ikey,  
								'issuecn' => $issuecn,
								'report_on' => $reportdate_val,
								'report_year' => $segment3,
								'report_month' => $segment4,
								'issues' => $ref_overall, 
								'issuecount' => $issuecount,
								'validation' => $ref_total, 
								'misres' => $misresult, 
								 'misprevious' => $misprevresult,
								'issuetemp' => $ref_overall_temp,
							];  
							
						    
							  $pdf = PDF::loadView('misprints.firesafeviews.portraitfile', $relations);
		                      
		                       $pdf->save(storage_path('/pdffiles/firesafe/mistrafficprintissue'.$ikey.'.pdf'));  
							   
						   
						  }
						  }
						  
						}  
						
						}
						
							$pdf = new \PDFMerger();
						
						 foreach ($issuecount as $ikey => $issuecn) {
						 
						   $pdf->addPDF(storage_path() .'/pdffiles/firesafe/mistrafficprint'.$ikey.'.pdf', 'all');
						   
						   if(isset($issuet[$ikey])) {
						      
							   $pdf->addPDF(storage_path() .'/pdffiles/firesafe/mistrafficprintissue'.$ikey.'.pdf', 'all');
						   }
						   
						 }
						 
						 $pathForTheMergedPdf_fire = storage_path() . "/pdffiles/firesafe/finalresult.pdf";
				
					
				 
				$pdf->merge('download', $pathForTheMergedPdf_fire);
		
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
		
		   $sitearrnew = array();
		  foreach( $siteattrname as $kkk => $site){
		     $sitearrnew[]=$kkk;
		  }
		
		$matchfields = ['month' => $segment4, 'year' => $segment3]; 
		
		if(Auth::user()->id == 1){
		$res_count = \App\Equipmentmisreport::whereIn('site', $sitearrnew)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Equipmentmisreport::whereIn('site', $sitearrnew)->where($matchfields)->get();
		}
		
		}
		else
		{
		  $res_count = \App\Equipmentmisreport::whereIn('site', $sitearrnew)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Equipmentmisreport::whereIn('site', $sitearrnew)->where($matchfields)->get();
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
		  $misprevresult = array();
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
			
					if($segment4 == 1){
			  $prev_mon = 12;
			  $prev_year = $segment3 - 1;
 			}
			else{
			  $prev_mon = $segment4 - 1;;
			  $prev_year = $segment3;
			}
			
			$mismatchprevfields = ['month' => $prev_mon, 'year' => $prev_year, 'site' =>$skey]; 
			$misprevmatchcount = \App\Equipmentmisreport::where($mismatchprevfields)->count();
			
			if($misprevmatchcount > 0){
				 $mismatch_prev_ress = \App\Equipmentmisreport::where($mismatchprevfields)->first();
				 $misprevresult[$skey] = $mismatch_prev_ress;
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
			   //$ref_record_temp_val = \App\Equipmentnotworkingissue::where($matchreffields)->get();
			    $ref_record_temp_val = \App\Equipmentnotworkingissue::where($matchreffields)->orderBy('category', 'asc')->get();
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
			 'misprevious' => $misprevresult,
			'issuetemp' => $ref_overall_temp,
			
			];     
			
			 $pdf = PDF::loadView('misprints.electomechanical', $relations);  

         // return $pdf->download('electomechanical.pdf'); 
		  /*  $monthName = date('F', mktime(0, 0, 0, $segment4, 10));   
			   $fnam = 'ElectroMechanicalEquipment_'.$monthName."_".$segment3.".pdf";
			  return $pdf->download($fnam); */
			  
			   /* date_default_timezone_set('Asia/Kolkata');
			$today_date = date('d');
			$today_time = date("g:i a");
			$monthName = date('F', mktime(0, 0, 0, $segment4, 10)); 
			 $fnam = 'ElectroMechanicalEquipment_'.$monthName."_".$today_date."_".$segment3."_".$today_time.".pdf";
            // return $pdf->download('metrowater.pdf'); //Download    
			  return $pdf->download($fnam); */
			  
			  
			  // LATEST DOWNLOAD
			  
			      if (count($issuecount) > 0) {
			      $mc = 0;$issuet = array();
                        foreach ($issuecount as $ikey => $issuecn) {
						$mc = $mc + 1;
							$relations = [
								'ikey' => $ikey,  
								'sites' => $siteattrname,
								'issuecn' => $issuecn,
								'report_on' => $reportdate_val,
								'report_year' => $segment3,
								'report_month' => $segment4,
								'issues' => $ref_overall, 
								'issuecount' => $issuecount,
								'validation' => $ref_total, 
								'misres' => $misresult, 
								 'misprevious' => $misprevresult,
								'issuetemp' => $ref_overall_temp,
							];  
							
								$pdf = PDF::loadView('misprints.equipment.mainfile', $relations);
		                      // $pdf->setPaper('A4', 'landscape');
		                       $pdf->save(storage_path('/pdffiles/equipment/mistrafficprint'.$ikey.'.pdf'));  
						  
						  if($issuecn > 5) {
						       $issuet[$ikey] = $ikey;
						       	$relations = [
								'ikey' => $ikey,  
								'sites' => $siteattrname,
								'issuecn' => $issuecn,
								'report_on' => $reportdate_val,
								'report_year' => $segment3,
								'report_month' => $segment4,
								'issues' => $ref_overall, 
								'issuecount' => $issuecount,
								'validation' => $ref_total, 
								'misres' => $misresult, 
								 'misprevious' => $misprevresult,
								'issuetemp' => $ref_overall_temp,
							];  
							
						    
							  $pdf = PDF::loadView('misprints.equipment.landscpaefile', $relations);
		                      $pdf->setPaper('A4', 'landscape');
		                       $pdf->save(storage_path('/pdffiles/equipment/mistrafficprintissue'.$ikey.'.pdf'));  
							 
						  } else
						  {
						   if($issuecn > 0){
						 
						  $issuet[$ikey] = $ikey;
						    
							 	$relations = [
								'ikey' => $ikey,  
								'sites' => $siteattrname,
								'issuecn' => $issuecn,
								'report_on' => $reportdate_val,
								'report_year' => $segment3,
								'report_month' => $segment4,
								'issues' => $ref_overall, 
								'issuecount' => $issuecount,
								'validation' => $ref_total, 
								'misres' => $misresult, 
								 'misprevious' => $misprevresult,
								'issuetemp' => $ref_overall_temp,
							];  
							
						    
							  $pdf = PDF::loadView('misprints.equipment.portraitfile', $relations);
		                      
		                       $pdf->save(storage_path('/pdffiles/equipment/mistrafficprintissue'.$ikey.'.pdf'));  
							   
						   
						  }
						  }
						  
						}  
						
						}
						
							$pdf = new \PDFMerger();
						
						 foreach ($issuecount as $ikey => $issuecn) {
						 
						   $pdf->addPDF(storage_path() .'/pdffiles/equipment/mistrafficprint'.$ikey.'.pdf', 'all');
						   
						   if(isset($issuet[$ikey])) {
						      
							   $pdf->addPDF(storage_path() .'/pdffiles/equipment/mistrafficprintissue'.$ikey.'.pdf', 'all');
						   }
						   
						 }
						 
						 $pathForTheMergedPdf_fire = storage_path() . "/pdffiles/equipment/finalresult.pdf";
				
					
					  date_default_timezone_set('Asia/Kolkata');
			$today_date = date('d');
			$today_time = date("g:i a");
			$monthName = date('F', mktime(0, 0, 0, $segment4, 10)); 
			 $fnam = 'ElectroMechanicalEquipment_'.$monthName."_".$today_date."_".$segment3."_".$today_time.".pdf";
            // return $pdf->download('metrowater.pdf'); //Download    
			//  return $pdf->download($fnam);
				 
				$pdf->merge('download', $fnam);
			  
			  
			  // END LATEST DOWNLOAD
			   		

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
		
		   $sitearrnew = array();
		  foreach( $siteattrname as $kkk => $site){
		     $sitearrnew[]=$kkk;
		  }
		
		$matchfields = ['month' => $segment4, 'year' => $segment3]; 
		
		if(Auth::user()->id == 1){
		$res_count = \App\Stpmisreport::whereIn('site', $sitearrnew)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Stpmisreport::whereIn('site', $sitearrnew)->where($matchfields)->get();
		}
		
		}
		else
		{
		  $res_count = \App\Stpmisreport::whereIn('site', $sitearrnew)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Stpmisreport::whereIn('site', $sitearrnew)->where($matchfields)->get();
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
		 $misprevresult = array();
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
			
			if($segment4 == 1){
			  $prev_mon = 12;
			  $prev_year = $segment3 - 1;
 			}
			else{
			  $prev_mon = $segment4 - 1;;
			  $prev_year = $segment3;
			}
			
			$mismatchprevfields = ['month' => $prev_mon, 'year' => $prev_year, 'site' =>$skey]; 
			$misprevmatchcount = \App\Stpmisreport::where($mismatchprevfields)->count();
			
			if($misprevmatchcount > 0){
				 $mismatch_prev_ress = \App\Stpmisreport::where($mismatchprevfields)->first();
				 $misprevresult[$skey] = $mismatch_prev_ress;
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
			   //$ref_record_temp_val = \App\Stpnotworkingissue::where($matchreffields)->get();
			   $ref_record_temp_val = \App\Stpnotworkingissue::where($matchreffields)->orderBy('category', 'asc')->get();
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
			'misprevious' => $misprevresult,
			
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

		// return view('misprints.stpstatus', $relations);

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
		
		   $sitearrnew = array();
		  foreach( $siteattrname as $kkk => $site){
		     $sitearrnew[]=$kkk;
		  }
		
		$matchfields = ['month' => $segment4, 'year' => $segment3]; 
		
		if(Auth::user()->id == 1){
		$res_count = \App\Wspmisreport::whereIn('site', $sitearrnew)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Wspmisreport::whereIn('site', $sitearrnew)->where($matchfields)->get();
		}
		
		}
		else
		{
		  $res_count = \App\Wspmisreport::whereIn('site', $sitearrnew)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Wspmisreport::whereIn('site', $sitearrnew)->where($matchfields)->get();
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
		  $misprevresult = array();
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
			
			if($segment4 == 1){
			  $prev_mon = 12;
			  $prev_year = $segment3 - 1;
 			}
			else{
			  $prev_mon = $segment4 - 1;;
			  $prev_year = $segment3;
			}
			
			$mismatchprevfields = ['month' => $prev_mon, 'year' => $prev_year, 'site' =>$skey]; 
			$misprevmatchcount = \App\Wspmisreport::where($mismatchprevfields)->count();
			
			if($misprevmatchcount > 0){
				 $mismatch_prev_ress = \App\Wspmisreport::where($mismatchprevfields)->first();
				 $misprevresult[$skey] = $mismatch_prev_ress;
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
			   //$ref_record_temp_val = \App\Wspnotworkingissue::where($matchreffields)->get();
			   $ref_record_temp_val = \App\Wspnotworkingissue::where($matchreffields)->orderBy('category', 'asc')->get();
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
			 'misprevious' => $misprevresult,
			
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
							
								$dateString = $segment3.'-'.$segment4.'-04';
							//Last date of current month.
							$lastDateOfMonth = date("t", strtotime($dateString));
							$reportdate_val = $lastDateOfMonth."-".$segment4."-".$segment3;
							
							$security_match_fields = ['site' => $fieldarr->site,'reporton' => $reportdate_val];
							
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
					  $exist_Sec['computers_num'][$fieldarr->site] = $fieldarr->computers_num;
					 $exist_Sec['bicycle_num'][$fieldarr->site] = $fieldarr->bicycle_num;
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
					  $exist_SecTwo['computers_num'][$fieldarr->site] = $fieldarr->computers_num;
					 $exist_SecTwo['bicycle_num'][$fieldarr->site] = $fieldarr->bicycle_num;
					 
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		   
		  }else{ 

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
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
				$deployment['deployment'][$dep] =  (float)$depresult['house_help'] +  (float)$depresult['clu_hs_hk'];
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		   
		  }else{ 

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
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
				$deployment['deployment'][$dep] =  (float)$depresult['house_help'] +  (float)$depresult['clu_hs_hk'];
			} 	else{
			   $deployment['deployment'][$dep] = 0;
			}
		  }

             $existing_records = array();
			 $existing_records_two = array();
			 $existing_records_three = array();
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
			 	$hsk_arr = \App\Horticulturemisreport::where($matchhuskpfields)->first();
				
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
			 	$hsk_arr = \App\Horticulturemisreport::where($matchhuskpfields)->first();
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
			 	$hsk_arr = \App\Horticulturemisreport::where($matchhuskpfields)->first();
				
				
				
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
		$avg_swimpool_per_res = array();
		$avg_gym_per_res = array();
		$avg_occupan_res = array();
		$swimpool_res_Arr = array();
		$gym_res_Arr = array();
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
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
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
				 
				 
				$stdate = $dateString;
				$endate = $reporton;
				$getavg_info_count = \App\Pmsdailyreport::where('reporton','>=',$stdate)->where('reporton','<=',$endate)->where('site','=',$site)->count();
				$swimpool = 0;
				$gym = 0;
				if($getavg_info_count > 0){
				$getavg_info_res = \App\Pmsdailyreport::where('reporton','>=',$stdate)->where('reporton','<=',$endate)->where('site','=',$site)->get();
				
				foreach($getavg_info_res as $rowres){
				$swimpool += $rowres->clbhous_users_pool;
				$gym += $rowres->clbhous_users_gym;
				}
				}
				$day_cn=cal_days_in_month(CAL_GREGORIAN,$month,$year);
				
				
				$avg_gym = round((float)($gym/$day_cn));
				$avg_swimpool = round((float)($swimpool/$day_cn));
				$av_occ = round((float)(($owners + $tenents)/2));
				$avg_swimpool_per = 0;
				$avg_gym_per = 0;
				if($av_occ > 0){
				$avg_swimpool_per = round(($avg_swimpool * 100)/($av_occ));
				$avg_gym_per = round(($avg_gym * 100)/($av_occ));
				}
				 
				$avg_swimpool_per_res[$kk] = $avg_swimpool_per;
				$avg_gym_per_res[$kk] = $avg_gym_per;
				$avg_occupan_res[$kk] = $av_occ;
				$swimpool_res_Arr[$kk] = $avg_swimpool;
				$gym_res_Arr[$kk] = $avg_gym;
				$pow[$kk] = $prev_owners ;
				$pte[$kk] = $prev_tenents ;
				
			    $powcur[$kk] = $cur_owners ;
				$ptecur[$kk] = $cur_tenents ;
				
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
			'swimpoll_per' => $avg_swimpool_per_res,
			'gym_per' => $avg_gym_per_res,
			'avgoccuapncy' => $avg_occupan_res,
			'swimpoll_res' => $swimpool_res_Arr,
			'gym_res' => $gym_res_Arr,
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
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

		

 foreach($siteattrname as $kk => $siter){
			 
				$dateString = $segment3.'-'.$segment4.'-01';
				//Last date of current month.
				$lastDateOfMonth = date("t", strtotime($dateString));
				 $reporton = $lastDateOfMonth."-".$segment4."-".$segment3;
				$reporton = $segment3."-".$segment4."-".$lastDateOfMonth;
			
				$occupanymatch_fileds = ['reporton' => $reporton, 'site' => $kk]; 
				
				 $occres_cn = \App\Pmsdailyreport::where($occupanymatch_fileds)->count(); 
				if($occres_cn > 0){
				$occres_res = \App\Pmsdailyreport::where($occupanymatch_fileds)->first();
				
				$existing_records[$kk] = array("owners"=>$occres_res->occupancy_asdate_owners,"tenants"=>$occres_res->occupancy_asdate_tenants,"vacant"=>$occres_res->occupancy_asdate_vacant);
				} 
				else{
				   $existing_records[$kk] = array("owners"=>"0","tenants"=>"0","vacant"=>"0");
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
		
		if($segment2 == '17'){

		 
		$segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
			'backup' => $backup,  
			];    

	
			 
			 
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
		
			 $matchdatafields = ['month' => $segment4, 'year' => $segment3]; 

		$res_data_count = \App\Cmdmisdatareport::where($matchdatafields)->count();
		$cmddata= array();
		if($res_data_count > 0){
		
			$cmddata = \App\Cmdmisdatareport::where($matchdatafields)->first();
			}
			 
			 //exit;
			
			
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

			 
			
			   
		 $pdf = PDF::loadView('misprints.cmdprint', $relations);

 $pdf->setPaper('A4', 'landscape');
           //return $pdf->download('materialindented.pdf'); //Download     
		   
		    /* $monthName = date('F', mktime(0, 0, 0, $segment4, 10));   
			   $fnam = 'IndentedMaterialStatus'.$monthName."_".$segment3.".pdf";
			  return $pdf->download($fnam);   */   
			  
			   date_default_timezone_set('Asia/Kolkata');
			$today_date = date('d');
			$today_time = date("g:i a");
			$monthName = date('F', mktime(0, 0, 0, $segment4, 10)); 
			 $fnam = 'cmd_rmd_'.$monthName."_".$today_date."_".$segment3."_".$today_time.".pdf";
            // return $pdf->download('metrowater.pdf'); //Download    
			  return $pdf->download($fnam);    
		   
		     return view('misprints.cmdprint', $relations);

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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
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
				 
				
			 }  
			 
			 }
			 
			 $indentrep_Array = array();
			 $lagged_date = array();
			 $Recordcount =  array();
			 foreach($siteattrname as $stk => $siten) {
			 
			  $match_in_fields = ['month' => $segment4, 'year' => $segment3, 'site' =>$stk]; 
			  $match_in_count = \App\Indentedmisreport::where($match_in_fields)->count();
		
		       if($match_in_count > 0){
			   	    $match_in_array = \App\Indentedmisreport::where($match_in_fields)->get();
					$match_lag_array = \App\Indentedmisreport::where($match_in_fields)->first();
					
					$indentrep_Array[$stk] = $match_in_array;
					$lagged_date[$stk] = $match_lag_array->laggeddate;
					$Recordcount[$stk] = $match_in_count;
			   }
			   else{
			       $indentrep_Array[$stk] = array();
				   $Recordcount[$stk] = 0;
			   }
			   
			   
			 }
			  // echo "<pre>"; print_r($indentrep_Array);echo "</pre>"; exit;
			 //exit;
			 
			  asort($Recordcount);
			 
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
			'recordcount' => $Recordcount,
			];   
			
			
			
			/*echo "<pre>";
			   print_r($indentrep_Array);
			echo "</pre>"; */
			
			 $fccn = 0;
			 $fr = array();
			 $fm = array();
			foreach($Recordcount as $kk => $recn){
				 if($recn > 10){
				   $fr[$kk] = $recn;
				 }
				 elseif($recn > 1 && $recn < 9) {
				  
				 $fm[$kk] = $recn;
				 }
			}
			
			
			
			$k = 0;
			$fres = 0;
			foreach($fm as $km => $val){
			 
			  if($fres < 10) {
			   $k = $k + 1;
			      
				$fres = $fres + $val;
				 
				}
				
			}
			
			//exit;      
			  
		      

		 //return view('misfiles.view.materialindented', $relations);
		
		 
		
		//return view('misprints.materialindented', $relations);
		 
		 $pdf = PDF::loadView('misprints.materialindented', $relations);
		 $pdf->setPaper('A4', 'landscape');

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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
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
		
		/*if($res_count > 0){
		
			$formfieldarray = \App\Occupancymisreport::where($matchfields)->get();
			
			
			 if(count($formfieldarray) > 0){
			     foreach($formfieldarray as $fieldarr){
				 	 $existing_records[$fieldarr->site] = array("id"=>$fieldarr->id,"owners"=>$fieldarr->owners,"tenants"=>$fieldarr->tenants,"vacant"=>$fieldarr->vacant);
				 } 
				 
				// echo "<pre>"; print_r($existing_records);echo "</pre>";
			 }  */
			 
			  $apnarecord = array();
			 $indentrep_Array = array();
			 $lagged_date = array();
			 foreach($siteattrname as $stk => $siten) {
			 
			  $match_in_fields = ['month' => $segment4, 'year' => $segment3, 'site' =>$stk]; 
			  $match_in_count = \App\Apnacomplaintmisreport::where($match_in_fields)->count();
		
		       if($match_in_count > 0){
			   	    $match_in_array = \App\Apnacomplaintmisreport::where($match_in_fields)->get();
					
					$indentrep_Array[$stk] = $match_in_array;
					$apnarecord[$stk] = $match_in_count;
			   }
			   else{
			       $indentrep_Array[$stk] = array();
				      $apnarecord[$stk] = 0;
			   }
			   
			   
			 }
			 //exit;
			
			//}
			
			asort($apnarecord);
			
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
			'recordcount' => $apnarecord,
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
			
		  }
		  $existing_records = array();
		  
			 $indentrep_Array = array();
			 $lagged_date = array();
			 foreach($siteattrname as $stk => $siten) {
			 
			  $match_in_fields = ['month' => $segment4, 'year' => $segment3, 'site' =>$stk]; 
			  $match_in_count = \App\Mockdrillmisreport::where($match_in_fields)->count();
		
		       if($match_in_count > 0){
			   	    $match_in_array = \App\Mockdrillmisreport::where($match_in_fields)->get();
					
					$indentrep_Array[$stk] = $match_in_array;
			   }
			   else{
			       $indentrep_Array[$stk] = array();
			   }
			   
			   
			 }
			 
			
			
			$relations = [
			'res' => $formfieldarray,  
			'sites' => $sitenames,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			'drill' => $indentrep_Array,
			];   
			
			
			
			//return view('misprints.mismockdrillprint', $relations);
				$pdf = PDF::loadView('misprints.mismockdrillprint', $relations);
	
		
	//	return $pdf->download('traffic.pdf'); //Download  
		
		/*  $monthName = date('F', mktime(0, 0, 0, $segment4, 10));   
			   $fnam = 'TrafficMovement'.$monthName."_".$segment3.".pdf";
			  return $pdf->download($fnam);  */  
			  
			   date_default_timezone_set('Asia/Kolkata');
			$today_date = date('d');
			$today_time = date("g:i a");
			$monthName = date('F', mktime(0, 0, 0, $segment4, 10)); 
			 $fnam = 'MockDrill'.$monthName."_".$today_date."_".$segment3."_".$today_time.".pdf";
            // return $pdf->download('metrowater.pdf'); //Download    
			  return $pdf->download($fnam);          
				   
		
		}
		
		
		
		if($segment2 == '18'){
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
			
		  }
		  $existing_records = array();
		  
			 $indentrep_Array = array();
			 $lagged_date = array();
			 foreach($siteattrname as $stk => $siten) {
			 
			  $match_in_fields = ['month' => $segment4, 'year' => $segment3, 'site' =>$stk]; 
			  $match_in_count = \App\Firepreparemisreport::where($match_in_fields)->count();
		
		       if($match_in_count > 0){
			   	    $match_in_array = \App\Firepreparemisreport::where($match_in_fields)->get();
					
					$indentrep_Array[$stk] = $match_in_array;
			   }
			   else{
			       $indentrep_Array[$stk] = array();
			   }
			   
			   
			 }
			 
			
			
			$relations = [
			'res' => $formfieldarray,  
			'sites' => $sitenames,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			'drill' => $indentrep_Array,
			];   
			
			
			
			//return view('misprints.mismockdrillprint', $relations);
				$pdf = PDF::loadView('misprints.misfireprepareprint', $relations);
	
		
	//	return $pdf->download('traffic.pdf'); //Download  
		
		/*  $monthName = date('F', mktime(0, 0, 0, $segment4, 10));   
			   $fnam = 'TrafficMovement'.$monthName."_".$segment3.".pdf";
			  return $pdf->download($fnam);  */  
			  
			   date_default_timezone_set('Asia/Kolkata');
			$today_date = date('d');
			$today_time = date("g:i a");
			$monthName = date('F', mktime(0, 0, 0, $segment4, 10)); 
			 $fnam = 'Fireprepare'.$monthName."_".$today_date."_".$segment3."_".$today_time.".pdf";
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
			 
			 			   $exist_Sec = array();
			 foreach($sitenames as $kk => $siten){
			     $matchfields = ['month' => $segment4, 'year' => $segment3, 'site'=>$kk];
				 $formfieldarray_cn = \App\Trafficmisreport::where($matchfields)->count();
				 if($formfieldarray_cn > 0){
				    $fieldarr = \App\Trafficmisreport::where($matchfields)->first();
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
		   
		       $dateString = $segment3.'-'.$segment4.'-04';
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		
		
		 $exist_Sec = array();
			 foreach($siteattrname as $kk => $siten){
			     $matchfields = ['reporton' => $lastDateOfMonth, 'site'=>$kk];
				 	
				 $formfieldarray_cn = \App\Securitydailyreport::where($matchfields)->count();
				 if($formfieldarray_cn > 0){
				    $fieldarr = \App\Securitydailyreport::where($matchfields)->first();
					 $exist_Sec['sites'][$fieldarr->site] = get_sitename($fieldarr->site);
					 $exist_Sec['resident_vehicle'][$fieldarr->site] = $fieldarr->tr_resident_vehicle;
					 $exist_Sec['temp_vendors'][$fieldarr->site] = $fieldarr->tr_temp_vendors;
					 $exist_Sec['courier_delivery'][$fieldarr->site] = $fieldarr->tr_courier_delivery;
					 $exist_Sec['visitors'][$fieldarr->site] = $fieldarr->tr_visitors;
					 $exist_Sec['construc_team'][$fieldarr->site] = $fieldarr->tr_construction;
					 $exist_Sec['interworks_inflats'][$fieldarr->site] = $fieldarr->tr_inter_works;
					 $exist_Sec['interior_works_per_day'][$fieldarr->site] = $fieldarr->tr_interior_works_perday;  
					 $exist_Sec['ctotval'][$fieldarr->site] = (float)$fieldarr->tr_resident_vehicle + (float)$fieldarr->tr_temp_vendors + (float)$fieldarr->tr_courier_delivery + (float)$fieldarr->tr_visitors + (float)$fieldarr->tr_construction + (float)$fieldarr->tr_inter_works + (float)$fieldarr->tr_interior_works_perday;
				 }
				 
				 else{
				   $exist_Sec['sites'][$kk] = get_sitename($kk);
					 $exist_Sec['resident_vehicle'][$kk] = "";
					 $exist_Sec['temp_vendors'][$kk] = "";
					 $exist_Sec['courier_delivery'][$kk] = "";
					 $exist_Sec['visitors'][$kk] = "";
					 $exist_Sec['construc_team'][$kk] = "";
					 $exist_Sec['interworks_inflats'][$kk] = "";
					 $exist_Sec['interior_works_per_day'][$kk] = "";
					 $exist_Sec['ctotval'][$kk] = 0; 
				 
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
		   $pdf->setPaper('A4', 'landscape');
		
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
			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),
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
			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', ''),
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
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
			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),
			'segmentval' => $segment2,  
        ];    

		if($segment2 == '1'){ 

		  return view('misfiles.metrowater', $relations);

		}  
 
		if($segment2 == '2'){
		
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }
		  
		  $matchcomfields = ['month' => $segment4, 'year' => $segment3]; 
		  $response = array();
		  
		  $occupan_count = \App\Waterconsumpmisreport::where($matchcomfields)->count();
		
		if($occupan_count > 0){
		
			$formfieldarray = \App\Waterconsumpmisreport::where($matchcomfields)->first();
				
				
				$response['record_id'] = $formfieldarray->id;
				$response['additional_info'] = $formfieldarray->additional_info;
		
			 }  
			 else{ 
				
				$response['record_id'] = "";
				$response['additional_info'] = "";
				
			 }
		  
		$relations = [
			'res' => $response, 
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'flats' => $flatres,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			];      

		  return view('misfiles.watersourceconsump', $relations);
 
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
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
		
		
		
	if($segment2 == '17'){
		
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }
		  
		  $matchdatafields = ['month' => $segment4, 'year' => $segment3]; 

		$res_data_count = \App\Cmdmisdatareport::where($matchdatafields)->count();
		$cmddata= array();
		if($res_data_count > 0){
		
			$cmddata = \App\Cmdmisdatareport::where($matchdatafields)->first();
	    }
		  
		 /* echo "<pre>";
		     print_r($cmddata);
		  echo "</pre>";
		  exit;*/
		$relations = [
			'res' => $formfieldarray, 
			'sites' => $siteattrname,
			'sitenames' => $sitenames,
			'flats' => $flatres,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'cmddata' => $cmddata,
			];    

		

		

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
		  
		  return view('misfiles.cmdedit', $relations);

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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
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
		
		
				if($segment2 == '18'){
		 
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
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
		  
		
		   return view('misreportsdetail.firepreparedrill', $relations);

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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		    $sites_count = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->count();
		  $sites_res_arr =\App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sites_count = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->count();
			$sites_res_arr =\App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
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
			$community = array();
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
				$sitearr = array();
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
		   $sitearrnew = array();
		  foreach( $siteattrname as $kkk => $site){
		     $sitearrnew[]=$kkk;
		  }
		
		   $sitearrnew = array();
		  foreach( $siteattrname as $kkk => $site){
		     $sitearrnew[]=$kkk;
		  }
		
		$matchfields = ['month' => $segment4, 'year' => $segment3]; 
		
		if(Auth::user()->id == 1){
		$res_count = \App\Firesafetymisreport::whereIn('site', $sitearrnew)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Firesafetymisreport::whereIn('site', $sitearrnew)->where($matchfields)->get();
		}
		
		}
		else
		{
		  $res_count = \App\Firesafetymisreport::whereIn('site', $sitearrnew)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Firesafetymisreport::whereIn('site', $sitearrnew)->where($matchfields)->get();
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
		 $misprevresult = array();
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
			
			if($segment4 == 1){
			  $prev_mon = 12;
			  $prev_year = $segment3 - 1;
 			}
			else{
			  $prev_mon = $segment4 - 1;;
			  $prev_year = $segment3;
			}
			
			$mismatchprevfields = ['month' => $prev_mon, 'year' => $prev_year, 'site' =>$skey]; 
			$misprevmatchcount = \App\Firesafetymisreport::where($mismatchprevfields)->count();
			
			if($misprevmatchcount > 0){
				 $mismatch_prev_ress = \App\Firesafetymisreport::where($mismatchprevfields)->first();
				 $misprevresult[$skey] = $mismatch_prev_ress;
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
			   //$ref_record_temp_val = \App\Firesafenotworkingissue::where($matchreffields)->get();
			   $ref_record_temp_val = \App\Firesafenotworkingissue::where($matchreffields)->orderBy('category', 'asc')->get();
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
			'misprevious' => $misprevresult,
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
		
		   $sitearrnew = array();
		  foreach( $siteattrname as $kkk => $site){
		     $sitearrnew[]=$kkk;
		  }
		
		$matchfields = ['month' => $segment4, 'year' => $segment3]; 
		
		if(Auth::user()->id == 1){
		$res_count = \App\Equipmentmisreport::whereIn('site', $sitearrnew)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Equipmentmisreport::whereIn('site', $sitearrnew)->where($matchfields)->get();
		}
		
		}
		else
		{
		  $res_count = \App\Equipmentmisreport::whereIn('site', $sitearrnew)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Equipmentmisreport::whereIn('site', $sitearrnew)->where($matchfields)->get();
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
		  $misprevresult = array();
		 $misresult = array();
		 $totalValues = array();
		  $ref_total = array();
		  if(count($refid) > 0){
		    $ref_overall = array();
			foreach($refid as $skey =>$ref){
			 $ref_a = array();
			 
			// echo "ID: ".$ref;
			
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
			
			
			if($segment4 == 1){
			  $prev_mon = 12;
			  $prev_year = $segment3 - 1;
 			}
			else{
			  $prev_mon = $segment4 - 1;;
			  $prev_year = $segment3;
			}
			
			$mismatchprevfields = ['month' => $prev_mon, 'year' => $prev_year, 'site' =>$skey]; 
			$misprevmatchcount = \App\Equipmentmisreport::where($mismatchprevfields)->count();
			
			if($misprevmatchcount > 0){
				 $mismatch_prev_ress = \App\Equipmentmisreport::where($mismatchprevfields)->first();
				 $misprevresult[$skey] = $mismatch_prev_ress;
			} 
			
			
		  	$ref_count = \App\Equipmentnotworkingissue::where($matchreffields)->count();
			if($ref_count > 0){
			    $ref_count_val = \App\Equipmentnotworkingissue::where($matchreffields)->count(); 
			  // echo" Count:". $ref_count_val;
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
			  // $ref_record_temp_val = \App\Equipmentnotworkingissue::where($matchreffields)->get();
			   $ref_record_temp_val = \App\Equipmentnotworkingissue::where($matchreffields)->orderBy('category', 'asc')->get();
			   
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
			 'misprevious' => $misprevresult,
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
		
			   $sitearrnew = array();
		  foreach( $siteattrname as $kkk => $site){
		     $sitearrnew[]=$kkk;
		  }
		
		$matchfields = ['month' => $segment4, 'year' => $segment3]; 
		
		if(Auth::user()->id == 1){
		$res_count = \App\Stpmisreport::whereIn('site', $sitearrnew)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Stpmisreport::whereIn('site', $sitearrnew)->where($matchfields)->get();
		}
		
		}
		else
		{
		  $res_count = \App\Stpmisreport::whereIn('site', $sitearrnew)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Stpmisreport::whereIn('site', $sitearrnew)->where($matchfields)->get();
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
		  $misprevresult = array();
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
			
			if($segment4 == 1){
			  $prev_mon = 12;
			  $prev_year = $segment3 - 1;
 			}
			else{
			  $prev_mon = $segment4 - 1;;
			  $prev_year = $segment3;
			}
			
			$mismatchprevfields = ['month' => $prev_mon, 'year' => $prev_year, 'site' =>$skey]; 
			$misprevmatchcount = \App\Stpmisreport::where($mismatchprevfields)->count();
			
			if($misprevmatchcount > 0){
				 $mismatch_prev_ress = \App\Stpmisreport::where($mismatchprevfields)->first();
				 $misprevresult[$skey] = $mismatch_prev_ress;
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
			    //$ref_record_temp_val = \App\Stpnotworkingissue::where($matchreffields)->get();
			    $ref_record_temp_val = \App\Stpnotworkingissue::where($matchreffields)->orderBy('category', 'asc')->get();
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
			'misprevious' => $misprevresult,
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
		
		   $sitearrnew = array();
		  foreach( $siteattrname as $kkk => $site){
		     $sitearrnew[]=$kkk;
		  }
		
		$matchfields = ['month' => $segment4, 'year' => $segment3]; 
		
		if(Auth::user()->id == 1){
		$res_count = \App\Wspmisreport::whereIn('site', $sitearrnew)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Wspmisreport::whereIn('site', $sitearrnew)->where($matchfields)->get();
		}
		
		}
		else
		{
		  $res_count = \App\Wspmisreport::whereIn('site', $sitearrnew)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Wspmisreport::whereIn('site', $sitearrnew)->where($matchfields)->get();
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
		  $misprevresult = array();
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
			
				if($segment4 == 1){
			  $prev_mon = 12;
			  $prev_year = $segment3 - 1;
 			}
			else{
			  $prev_mon = $segment4 - 1;;
			  $prev_year = $segment3;
			}
			
			$mismatchprevfields = ['month' => $prev_mon, 'year' => $prev_year, 'site' =>$skey]; 
			$misprevmatchcount = \App\Wspmisreport::where($mismatchprevfields)->count();
			
			if($misprevmatchcount > 0){
				 $mismatch_prev_ress = \App\Wspmisreport::where($mismatchprevfields)->first();
				 $misprevresult[$skey] = $mismatch_prev_ress;
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
			  // $ref_record_temp_val = \App\Wspnotworkingissue::where($matchreffields)->get();
			   $ref_record_temp_val = \App\Wspnotworkingissue::where($matchreffields)->orderBy('category', 'asc')->get();
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
			'misprevious' => $misprevresult,
			
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
							
							$dateString = $segment3.'-'.$segment4.'-04';
							//Last date of current month.
							$lastDateOfMonth = date("t", strtotime($dateString));
							$reportdate_val = $lastDateOfMonth."-".$segment4."-".$segment3;
							
							$security_match_fields = ['site' => $fieldarr->site,'reporton' => $reportdate_val];
							$prev_sec_report_cn = \App\Securitydailyreport::where($security_match_fields)->count();
							 
							$eqpmatchfields = ['site' => $fieldarr->site]; 
							$equipcn = \App\Securitydailyreportvalidation::where($eqpmatchfields)->count();
							 if($equipcn > 0){
								$equipvalidation = \App\Securitydailyreportvalidation::where($eqpmatchfields)->first();
					          } 
							  
							 // $previousmatch_fields = 
							  
							 
							
							
					 if($fieldarr->site == 5 || $fieldarr->site == 6 || $fieldarr->site == 7 || $fieldarr->site == 8 || $fieldarr->site ==10 || $fieldarr->site ==14 || $fieldarr->site ==17 || $fieldarr->site == 16) {
					 
					 $exist_Sec['sites'][$fieldarr->site] = get_sitename($fieldarr->site);
					 $exist_Sec['guards'][$fieldarr->site] = $fieldarr->guards;
					 $exist_Sec['l_guards'][$fieldarr->site] = $fieldarr->l_guards;
					 $exist_Sec['h_guards'][$fieldarr->site] = $fieldarr->h_guards;
					 $exist_Sec['supervisors'][$fieldarr->site] = $fieldarr->supervisors;  
					 $exist_Sec['aso'][$fieldarr->site] = $fieldarr->aso;
					 $exist_Sec['computers_num'][$fieldarr->site] = $fieldarr->computers_num;
					 $exist_Sec['bicycle_num'][$fieldarr->site] = $fieldarr->bicycle_num;
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
					 
					  $exist_SecTwo['computers_num'][$fieldarr->site] = $fieldarr->computers_num;
					 $exist_SecTwo['bicycle_num'][$fieldarr->site] = $fieldarr->bicycle_num;
					 
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		   
		  }else{ 

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
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
				$deployment['deployment'][$dep] =  (float)$depresult['house_help'] +  (float)$depresult['clu_hs_hk'];
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		   
		  }else{ 

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
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
				$deployment['deployment'][$dep] =  (float)$depresult['house_help'] +  (float)$depresult['clu_hs_hk'];
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
			 	$hsk_arr = \App\Horticulturemisreport::where($matchhuskpfields)->first();
				
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
			 	$hsk_arr = \App\Horticulturemisreport::where($matchhuskpfields)->first();
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
			 	$hsk_arr = \App\Horticulturemisreport::where($matchhuskpfields)->first();
				
				
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
		$avg_swimpool_per_res = array();
		$avg_gym_per_res = array();
		$avg_occupan_res = array();
		$swimpool_res_Arr = array();
		$gym_res_Arr = array();
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
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
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
				 
				 
				$stdate = $dateString;
				$endate = $reporton;
				$getavg_info_count = \App\Pmsdailyreport::where('reporton','>=',$stdate)->where('reporton','<=',$endate)->where('site','=',$site)->count();
				$swimpool = 0;
				$gym = 0;
				if($getavg_info_count > 0){
				$getavg_info_res = \App\Pmsdailyreport::where('reporton','>=',$stdate)->where('reporton','<=',$endate)->where('site','=',$site)->get();
				
				foreach($getavg_info_res as $rowres){
				$swimpool += $rowres->clbhous_users_pool;
				$gym += $rowres->clbhous_users_gym;
				}
				}
				$day_cn=cal_days_in_month(CAL_GREGORIAN,$month,$year);
				
				
				$avg_gym = round((float)($gym/$day_cn));
				$avg_swimpool = round((float)($swimpool/$day_cn));
				$av_occ = round((float)(($owners + $tenents)/2));
				$avg_swimpool_per = 0;
				$avg_gym_per = 0;
				if($av_occ > 0){
				$avg_swimpool_per = round(($avg_swimpool * 100)/($av_occ));
				$avg_gym_per = round(($avg_gym * 100)/($av_occ));
				}
				 
				$avg_swimpool_per_res[$kk] = $avg_swimpool_per;
				$avg_gym_per_res[$kk] = $avg_gym_per;
				$avg_occupan_res[$kk] = $av_occ;
				$swimpool_res_Arr[$kk] = $avg_swimpool;
				$gym_res_Arr[$kk] = $avg_gym;
				$pow[$kk] = $prev_owners ;
				$pte[$kk] = $prev_tenents ;
				
			    $powcur[$kk] = $cur_owners ;
				$ptecur[$kk] = $cur_tenents ;
				
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
			'swimpoll_per' => $avg_swimpool_per_res,
			'gym_per' => $avg_gym_per_res,
			'avgoccuapncy' => $avg_occupan_res,
			'swimpoll_res' => $swimpool_res_Arr,
			'gym_res' => $gym_res_Arr,
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
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

		


			 
			 
			 foreach($siteattrname as $kk => $siter){
			 
				$dateString = $segment3.'-'.$segment4.'-01';
				//Last date of current month.
				$lastDateOfMonth = date("t", strtotime($dateString));
				 $reporton = $lastDateOfMonth."-".$segment4."-".$segment3;
				$reporton = $segment3."-".$segment4."-".$lastDateOfMonth;
			
				$occupanymatch_fileds = ['reporton' => $reporton, 'site' => $kk]; 
				
				 $occres_cn = \App\Pmsdailyreport::where($occupanymatch_fileds)->count(); 
				if($occres_cn > 0){
				$occres_res = \App\Pmsdailyreport::where($occupanymatch_fileds)->first();
				
				$existing_records[$kk] = array("owners"=>$occres_res->occupancy_asdate_owners,"tenants"=>$occres_res->occupancy_asdate_tenants,"vacant"=>$occres_res->occupancy_asdate_vacant);
				} 
				else{
				   $existing_records[$kk] = array("owners"=>"0","tenants"=>"0","vacant"=>"0");
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
			 
			
			
		  
		     return view('misfiles.view.occupancy', $relations);

		} 
		
			if($segment2 == '17'){

		 
		$segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
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
			 'backup' => $backup,  
			];    
 
	
			 
			 
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

			 
			
			  
		  
		     return view('misfiles.view.cmdview', $relations);

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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
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
		$indentrep_Array = array();
		$reportdate_val = "";
		$dateString = $segment3.'-'.$segment4.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$segment4."-".$segment3;

	      if(Auth::user()->id == 1){
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
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

		

		/*$matchfields = ['month' => $segment4, 'year' => $segment3]; 

		$res_count = \App\Occupancymisreport::where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Occupancymisreport::where($matchfields)->get();
			
			
			 if(count($formfieldarray) > 0){
			     foreach($formfieldarray as $fieldarr){
				 	 $existing_records[$fieldarr->site] = array("id"=>$fieldarr->id,"owners"=>$fieldarr->owners,"tenants"=>$fieldarr->tenants,"vacant"=>$fieldarr->vacant);
				 } 
				 
				// echo "<pre>"; print_r($existing_records);echo "</pre>";
			 }  */
			 
			 
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
			
			//}
			
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
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
		
		
		if($segment2 == '18'){
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
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
   
		  return view('misfiles.view.misfireprepare', $relations);

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
		  $existing_records = array();
		  $existing_Rates = array();
		  $exist_Sec = array();
		  

        $dateString = $segment3.'-'.$segment4.'-04';
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		
		
		 $exist_Sec = array();
			 
			 foreach($siteattrname as $kk => $siten){
			    
			     $matchfields = ['reporton' => $lastDateOfMonth, 'site'=>$kk];
				 	
				 $formfieldarray_cn = \App\Securitydailyreport::where($matchfields)->count();
				 if($formfieldarray_cn > 0){
				    $fieldarr = \App\Securitydailyreport::where($matchfields)->first();
					 $exist_Sec['sites'][$fieldarr->site] = get_sitename($fieldarr->site);
					 $exist_Sec['resident_vehicle'][$fieldarr->site] = $fieldarr->tr_resident_vehicle;
					 $exist_Sec['temp_vendors'][$fieldarr->site] = $fieldarr->tr_temp_vendors;
					 $exist_Sec['courier_delivery'][$fieldarr->site] = $fieldarr->tr_courier_delivery;
					 $exist_Sec['visitors'][$fieldarr->site] = $fieldarr->tr_visitors;
					 $exist_Sec['construc_team'][$fieldarr->site] = $fieldarr->tr_construction;
					 $exist_Sec['interworks_inflats'][$fieldarr->site] = $fieldarr->tr_inter_works;
					 $exist_Sec['interior_works_per_day'][$fieldarr->site] = $fieldarr->tr_interior_works_perday;  
					 $exist_Sec['ctotval'][$fieldarr->site] = (float)$fieldarr->tr_resident_vehicle + (float)$fieldarr->tr_temp_vendors + (float)$fieldarr->tr_courier_delivery + (float)$fieldarr->tr_visitors + (float)$fieldarr->tr_construction + (float)$fieldarr->tr_inter_works + (float)$fieldarr->tr_interior_works_perday;
				 }
				 
				 else{
				     $exist_Sec['sites'][$kk] = get_sitename($kk);
					 $exist_Sec['resident_vehicle'][$kk] = "";
					 $exist_Sec['temp_vendors'][$kk] = "";
					 $exist_Sec['courier_delivery'][$kk] = "";
					 $exist_Sec['visitors'][$kk] = "";
					 $exist_Sec['construc_team'][$kk] = "";
					 $exist_Sec['interworks_inflats'][$kk] = "";
					 $exist_Sec['interior_works_per_day'][$kk] = "";
					 $exist_Sec['ctotval'][$kk] = 0; 
				 
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
			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),
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
	
	
	
	 public function storecmd(StoreOccupancyRequest $request)
 
    {  
	 
	$year = $request['year'];
	$month = $request['month'];  
	
	/*echo "<pre>";
	  print_r($request->all());
	echo "</pre>";
	exit; */
	
	if($request['type'] == 'data'){
	
	    if((int)$request['datarecord_id'] > 0){
		     $report = Cmdmisdatareport::findOrFail($request['datarecord_id']);

					   $store_val  = array('month'=>$request['month'], 'year'=>$request['year'],'user_id'=>$request['user_id'],'additional_info'=>$request['additional_info']);
					   
					   $report = Cmdmisdatareport::findOrFail($request['datarecord_id']);

					 $report->update($store_val); 

					return redirect('/misreports?y='.$year.'&m='.$month);
		   } 
		 else{ 
				    $store_val  = array('month'=>$request['month'], 'year'=>$request['year'],'user_id'=>$request['user_id'],'additional_info'=>$request['additional_info']);
					
					  Cmdmisdatareport::create($store_val); 
				
				 return redirect('/misreports?y='.$year.'&m='.$month);
			}
	
	 
	  return redirect('/misreports?y='.$year.'&m='.$month);
	
	} else{
	
	 if(isset($request['report_status'])) { $request['report_status'] = $request['report_status'];}
	 else {$request['report_status'] = 0;}
	 
     
		   if((int)$request['record_id'] > 0){
		     $report = Cmdmisreport::findOrFail($request['record_id']);

					   $store_val  = array('site'=>$request['site'], 'total_rmd'=>$request['total_rmd'], 'peak_load_record'=>$request['peak_load_record'],'remarks'=>$request['remarks'],'report_status'=>$request['report_status']);
					   
					   $report = Cmdmisreport::findOrFail($request['record_id']);

					 $report->update($store_val); 

					return redirect('/misreports?y='.$year.'&m='.$month);
		   } 
		 else{  
		
				  
				     $store_val  = array('site'=>$request['site'], 'month'=>$request['month'], 'year'=>$request['year'],  'user_id'=>$request['user_id'], 'total_rmd'=>$request['total_rmd'], 'peak_load_record'=>$request['peak_load_record'],'remarks'=>$request['remarks'],'report_status'=>$request['report_status']);
					/* echo "<pre>";     
					 print_r($store_val);
					 echo "</pre>"; */
					  Cmdmisreport::create($store_val); 
				
				 return redirect('/misreports?y='.$year.'&m='.$month);
			   
			}
           
           return redirect('/misreports?y='.$year.'&m='.$month);
		   
		   }
		
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
 
 
 
  // STORE WATER CONSUMPTION
 
   public function storewaterconsump(StoreBorewellnwRequest $request)
 
    {  
	
	
	 if(isset($request['report_status'])) { $request['report_status'] = $request['report_status'];}
	 else {$request['report_status'] = 0;}
	 
         $year = $request['year'];
		 $month = $request['month'];
	 
		   if((int)$request['record_id'] > 0){
		     $report = Waterconsumpmisreport::findOrFail($request['record_id']);

					   $store_val  = array('report_status'=>$request['report_status'],'additional_info'=>$request['additional_info']);
					   
					   $report = Waterconsumpmisreport::findOrFail($request['record_id']);

					 $report->update($store_val); 

					 return redirect('/misreports?y='.$year.'&m='.$month);
		   } 
		 else{   
		  
				  
				     $store_val  = array('month'=>$request['month'], 'year'=>$request['year'],  'user_id'=>$request['user_id'], 'report_status'=>$request['report_status'],'additional_info'=>$request['additional_info']);
					/* echo "<pre>";     
					 print_r($store_val);
					 echo "</pre>"; */ 
					  Waterconsumpmisreport::create($store_val); 
				
				 return redirect('/misreports?y='.$year.'&m='.$month);
			   
			}
            return redirect('/misreports?y='.$year.'&m='.$month);
           //return redirect()->route('misreports.index');
		
    } 
   
 // END  STORE WATER CONSUMPTION
 


 // STORE BOREWELL NOTWORKING
 
   public function storeborewellnw(StoreBorewellnwRequest $request)
 
    {  
	
	
	 if(isset($request['report_status'])) { $request['report_status'] = $request['report_status'];}
	 else {$request['report_status'] = 0;}
	 
         $year = $request['year'];
		 $month = $request['month'];
	 
		   if((int)$request['record_id'] > 0){
		     $report = Borewellsnwmisreport::findOrFail($request['record_id']);

					   $store_val  = array('site'=>$request['site'],'nw_bores_num'=>$request['nw_bores_num'], 'no_ground_water'=>$request['no_ground_water'],'over_load'=>$request['over_load'],'motor_brunt'=>$request['motor_brunt'],'cable_prblm'=>$request['cable_prblm'],'pumpormotorwear'=>$request['pumpormotorwear'],'others'=>$request['others'],'motor_brunt'=>$request['motor_brunt'],'dry_run_protectn'=>$request['dry_run_protectn'],'flow_meter'=>$request['flow_meter'],'remarks'=>$request['remarks'],'report_status'=>$request['report_status']);
					   
					   $report = Borewellsnwmisreport::findOrFail($request['record_id']);

					 $report->update($store_val); 

					 return redirect('/misreports?y='.$year.'&m='.$month);
		   } 
		 else{  
		  
				  
				     $store_val  = array('site'=>$request['site'], 'month'=>$request['month'], 'year'=>$request['year'],  'user_id'=>$request['user_id'], 'nw_bores_num'=>$request['nw_bores_num'], 'no_ground_water'=>$request['no_ground_water'],'over_load'=>$request['over_load'],'motor_brunt'=>$request['motor_brunt'],'cable_prblm'=>$request['cable_prblm'],'pumpormotorwear'=>$request['pumpormotorwear'],'others'=>$request['others'],'motor_brunt'=>$request['motor_brunt'],'dry_run_protectn'=>$request['dry_run_protectn'],'flow_meter'=>$request['flow_meter'],'remarks'=>$request['remarks'],'report_status'=>$request['report_status']);
					/* echo "<pre>";     
					 print_r($store_val);
					 echo "</pre>"; */ 
					  Borewellsnwmisreport::create($store_val); 
				
				 return redirect('/misreports?y='.$year.'&m='.$month);
			   
			}
            return redirect('/misreports?y='.$year.'&m='.$month);
           //return redirect()->route('misreports.index');
		
    } 
  
 // END STORE BOREWELL NOTWORKING
 
 // STORE FIRE SAFE
 
 
   public function storemisfiresafe(StoreFiresafemisRequest $request)
 
    {  
	
	   $year = $request['year'];
		 $month = $request['month'];
	
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
					 
					 
					  return redirect('/misreports?y='.$year.'&m='.$month);
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
					   
					
				 return redirect('/misreports?y='.$year.'&m='.$month);
			   
			}
           
            return redirect('/misreports?y='.$year.'&m='.$month);
		
    } 
 
 // END STORE FIRE SAFE
 
 
 
 // STORE MIS EQUIPMENT
 
 
   public function storemisequipment(StoreEquipmentmisRequest $request)
 
    {  
	
	  $year = $request['year'];
		 $month = $request['month'];
	
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
					 

					 return redirect('/misreports?y='.$year.'&m='.$month);
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
					
				  return redirect('/misreports?y='.$year.'&m='.$month);
			   
			}
           
            return redirect('/misreports?y='.$year.'&m='.$month);
		
    } 
 
 // STORE MIS EQUIPMENT




// STORE MIS STP
 
 
   public function storemisstp(StoreStpRequest $request)
 
    {  
	
	 $year = $request['year'];
	 $month = $request['month'];
	
	  
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

					 return redirect('/misreports?y='.$year.'&m='.$month);
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
					
				 return redirect('/misreports?y='.$year.'&m='.$month);
			   
			}
           
           return redirect('/misreports?y='.$year.'&m='.$month);
		
    } 
 
 // STORE MIS STP
 
 // STORE MIS TRAFFIC
  
   public function storemistraffic(StoreStpRequest $request)
 
    {  
	
	 $year = $request['year'];
	 $month = $request['month'];
	
	 if(isset($request['report_status'])) { $request['report_status'] = $request['report_status'];}
	 else {$request['report_status'] = 0;}
	 
     
		   if((int)$request['record_id'] > 0){
					   
                     $report = Trafficmisreport::findOrFail($request['record_id']);
					 $report->update($request->all()); 

					  return redirect('/misreports?y='.$year.'&m='.$month);
		   } 
		 else{  
					  $create = Trafficmisreport::create($request->all()); 
					 $firesafeid = $create->id;
					 
					 $edata = $request->all(); 
					 
					
				  return redirect('/misreports?y='.$year.'&m='.$month);
			   
			}
           
            return redirect('/misreports?y='.$year.'&m='.$month);
		
    } 
  
 // END STORE MIS TRAFFIC
 
 // STORE MIS WSP
 
 
   public function storemiswsp(StoreWspRequest $request)
 
    {  
	
	 $year = $request['year'];
	 $month = $request['month'];
	
	  
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
					 

					 return redirect('/misreports?y='.$year.'&m='.$month);
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
					
				return redirect('/misreports?y='.$year.'&m='.$month);
			   
			}    
           
           return redirect('/misreports?y='.$year.'&m='.$month);
		
    } 
   
 // STORE MIS STP
 
 
 
  // STORE MIS SECURITY
 
 
   public function storemissecurity(StoreWspRequest $request)
 
    {  
	
	$year = $request['year'];
	 $month = $request['month'];
	  
	 if(isset($request['report_status'])) { $request['report_status'] = $request['report_status'];}
	 else {$request['report_status'] = 0;}
	 
     
		   if((int)$request['record_id'] > 0){
		     $report = Securitymisreport::findOrFail($request['record_id']);

					  /* $store_val  = array('site'=>$request['site'],'nw_bores_num'=>$request['nw_bores_num'], 'no_ground_water'=>$request['no_ground_water'],'over_load'=>$request['over_load'],'motor_brunt'=>$request['motor_brunt'],'cable_prblm'=>$request['cable_prblm'],'pumpormotorwear'=>$request['pumpormotorwear'],'others'=>$request['others'],'motor_brunt'=>$request['motor_brunt'],'dry_run_protectn'=>$request['dry_run_protectn'],'flow_meter'=>$request['flow_meter'],'remarks'=>$request['remarks'],'report_status'=>$request['report_status']);
					   
					    */ 
					       	 
					   
                     $report = Securitymisreport::findOrFail($request['record_id']);
					 $report->update($request->all()); 
					 

					 return redirect('/misreports?y='.$year.'&m='.$month);
		   } 
		 else{  
		  
				  
				   //  $store_val  = array('site'=>$request['site'], 'month'=>$request['month'], 'year'=>$request['year'],  'user_id'=>$request['user_id'], 'nw_bores_num'=>$request['nw_bores_num'], 'no_ground_water'=>$request['no_ground_water'],'over_load'=>$request['over_load'],'motor_brunt'=>$request['motor_brunt'],'cable_prblm'=>$request['cable_prblm'],'pumpormotorwear'=>$request['pumpormotorwear'],'others'=>$request['others'],'motor_brunt'=>$request['motor_brunt'],'dry_run_protectn'=>$request['dry_run_protectn'],'flow_meter'=>$request['flow_meter'],'remarks'=>$request['remarks'],'report_status'=>$request['report_status']);
				
					
					
					  $create = Securitymisreport::create($request->all()); 
					
				// return redirect()->route('misreports.index');
			    return redirect('/misreports?y='.$year.'&m='.$month);
			}
           
            return redirect('/misreports?y='.$year.'&m='.$month);
		 
    } 
   
 // STORE MIS SECURITY
 
 
 
  // STORE MIS HOUSEKEEP
 
 
   public function storemishousekp(StoreWspRequest $request)
 
    {  
	
		$year = $request['year'];
	 $month = $request['month'];
	  
	 if(isset($request['report_status'])) { $request['report_status'] = $request['report_status'];}
	 else {$request['report_status'] = 0;}
	 
     
		   if((int)$request['record_id'] > 0){
		     $report = Housekpmisreport::findOrFail($request['record_id']);

					  /* $store_val  = array('site'=>$request['site'],'nw_bores_num'=>$request['nw_bores_num'], 'no_ground_water'=>$request['no_ground_water'],'over_load'=>$request['over_load'],'motor_brunt'=>$request['motor_brunt'],'cable_prblm'=>$request['cable_prblm'],'pumpormotorwear'=>$request['pumpormotorwear'],'others'=>$request['others'],'motor_brunt'=>$request['motor_brunt'],'dry_run_protectn'=>$request['dry_run_protectn'],'flow_meter'=>$request['flow_meter'],'remarks'=>$request['remarks'],'report_status'=>$request['report_status']);
					   
					    */ 
					       	 
					   
                     $report = Housekpmisreport::findOrFail($request['record_id']);
					 $report->update($request->all()); 
					 

					 //return redirect()->route('misreports.index');
					  return redirect('/misreports?y='.$year.'&m='.$month);
		   } 
		 else{  
		  
				  
				   //  $store_val  = array('site'=>$request['site'], 'month'=>$request['month'], 'year'=>$request['year'],  'user_id'=>$request['user_id'], 'nw_bores_num'=>$request['nw_bores_num'], 'no_ground_water'=>$request['no_ground_water'],'over_load'=>$request['over_load'],'motor_brunt'=>$request['motor_brunt'],'cable_prblm'=>$request['cable_prblm'],'pumpormotorwear'=>$request['pumpormotorwear'],'others'=>$request['others'],'motor_brunt'=>$request['motor_brunt'],'dry_run_protectn'=>$request['dry_run_protectn'],'flow_meter'=>$request['flow_meter'],'remarks'=>$request['remarks'],'report_status'=>$request['report_status']);
				
					
					
					  $create = Housekpmisreport::create($request->all()); 
					
				// return redirect()->route('misreports.index');
				  return redirect('/misreports?y='.$year.'&m='.$month);
			   
			}
           
          return redirect('/misreports?y='.$year.'&m='.$month);
		   
		
    }  
   
 // END STORE MIS HOUSEKEEP
 
 
 
  // STORE MIS HORTICULTURE
 
 
   public function storemishorticulture(StoreWspRequest $request)
 
    {  
	$year = $request['year'];
	$month = $request['month'];  
	  
	 if(isset($request['report_status'])) { $request['report_status'] = $request['report_status'];}
	 else {$request['report_status'] = 0;}
	 
     
		   if((int)$request['record_id'] > 0){
		     $report = Horticulturemisreport::findOrFail($request['record_id']);

					   
                     $report = Horticulturemisreport::findOrFail($request['record_id']);
					 $report->update($request->all()); 
					 

					  return redirect('/misreports?y='.$year.'&m='.$month);
		   } 
		 else{  
					  $create = Horticulturemisreport::create($request->all()); 
					
				  return redirect('/misreports?y='.$year.'&m='.$month);
			   
			}
           
            return redirect('/misreports?y='.$year.'&m='.$month);
		
    }  
   
 // END STORE MIS HORTICULTURE




// DOWNLOAD OVERALL MIS

// GET DOWNLOAD MIS  
	 
	 public function downloadoverallmis(Request $request)

    {
	ini_set('max_execution_time', 300);
	ini_set('memory_limit', '256M');

	
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sites_count = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->count();
		  $sites_res_arr =\App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sites_count = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->count();
			$sites_res_arr =\App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  }
		  
		  
		  $fromdate = $segment3."-".$segment4."-"."1";
		  $todate = $segment3."-".$segment4."-".$lastdatearr[2];
		  
		/*  $sites_count = \App\Sites::whereIn('id', $sitearr)->count;
		  if($sites_count > 0){
		  	$sites_res_arr = \App\Sites::whereIn('id', $sitearr)->get()->pluck('name', 'id');
			foreach($sites_res_arr as $ke =>$site_res_row){
				
			}
			
		  } */
		  
		
		  
		  		  $skarra= array();
		 // if(Auth::user()->id == 1){
		  foreach($sites_res_arr as $keys => $site){
		    if($keys == 9 || $keys == 15 || $keys == 13 || $keys == 11 || $keys == 8 || $keys == 5 || $keys == 14 || $keys == 7 || $keys == 16 || $keys == 20 ){
			   $skarra[0] = 9;
			   $skarra[1] = 15;
			   $skarra[2] = 13;
			   $skarra[3] = 11;
			   $skarra[4] = 8;
			   $skarra[5] = 5;
			   $skarra[6] = 14;
			   $skarra[7] = 7;
			   $skarra[8] = 16;
			   $skarra[9] = 20;
			   
			}
		  }
		 
		  $sites_res_arr_res = array();
		  foreach($skarra as $kv){
		    if(isset($sites_res_arr[$kv])) {
		    $sites_res_arr_res[$kv] = $sites_res_arr[$kv];
			}
		  }
		   
		   $sites_res_arr = $sites_res_arr_res;  
		// }
		  
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
				$sitearr = array();
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
		
		$metro = 1;
		  
		$relations2 = [  
			
			'year' => $segment3,
			'month' => $segment4,
			
			]; 
			
			  $pdf = PDF::loadView('misprints.metrowaterdownload', $relations);
			  
			  //$pdf->setPaper('A4', 'landscape');
				
		
				$pdf->save(storage_path('/pdffiles/some-filename11.pdf')); 
		
		
		    

			/*  $pdf = PDF::loadView('misprints.startpage', $relations2);
		
				$pdf->save(storage_path('/pdffiles/startpage.pdf')); 
		
		        $pdf = PDF::loadView('misprints.indexpage', $relations2);
		
				$pdf->save(storage_path('/pdffiles/indexpage.pdf'));  */
		 
		     
		
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
		$sitenames_val = array();
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
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sites_count = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->count();
			$sites_res_arr =\App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }
		  
		  $sitenames_val = $siteattrname;
		  $fromdate = $segment3."-".$segment4."-"."1";
		  $todate = $segment3."-".$segment4."-".$lastdatearr[2];
		  
		   $skarra= array();
		 // if(Auth::user()->id == 1){
		  foreach($sites_res_arr as $keys => $site){
		    if($keys == 9 || $keys == 15 || $keys == 13 || $keys == 11 || $keys == 8 || $keys == 5 || $keys == 14 || $keys == 7 || $keys == 16 || $keys == 17 || $keys == 20){
			   $skarra[0] = 9;
			   $skarra[1] = 15;
			   $skarra[2] = 13;
			   $skarra[3] = 11;
			   $skarra[4] = 8;
			   $skarra[5] = 5;
			   $skarra[6] = 14;
			   $skarra[7] = 7;
			   $skarra[8] = 16;
			   $skarra[9] = 17;
			   $skarra[10] = 20;
			   
			}
		  }
		  $sites_res_arr_res = array();
		  foreach($skarra as $kv){
		   if(isset($sites_res_arr[$kv])) {
		    $sites_res_arr_res[$kv] = $sites_res_arr[$kv];
			}
		  }
		   $sites_res_arr = $sites_res_arr_res;  
		// }
		  
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
			
			'sites' => $sites_res_arr,
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
			'sitenames' =>  $sitenames_val,
			
			];   

		    $waterpcn = 2;
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
			 
			    $skarra= array();
		  //if(Auth::user()->id == 1){
		  foreach($siteattrname as $keys => $site){
		    if($keys == 9 || $keys == 15 || $keys == 13 || $keys == 11 || $keys == 8 || $keys == 5 || $keys == 14 || $keys == 7 || $keys == 16 || $keys == 17 || $keys == 20){
			   $skarra[0] = 9;
			   $skarra[1] = 15;
			   $skarra[2] = 13;
			   $skarra[3] = 11;
			   $skarra[4] = 8;
			   $skarra[5] = 5;
			   $skarra[6] = 14;
			   $skarra[7] = 7;
			   $skarra[8] = 16;
			   $skarra[9] = 17; 
			   $skarra[10] = 20; 
			   
			}
		  } 
		  $sites_res_arr_res = array();
		  foreach($skarra as $kv){
		   if(isset($sites_res_arr[$kv])) {
		    $sites_res_arr_res[$kv] = $sites_res_arr[$kv];
			}
		  }
		   $siteattrname = $sites_res_arr_res;  
		// }
			  
			 
			 if(count($siteattrname) > 0){
			     foreach($siteattrname as $sk => $siteval){
				     
					 $matchreffields = ['month' => $segment4, 'year' => $segment3, 'site'=>$sk]; 
					 
					 $mc_cnn = \App\Borewellsnwmisreport::where($matchreffields)->count();
					 if($mc_cnn > 0){
					     $fieldarr = \App\Borewellsnwmisreport::where($matchreffields)->first();
						 
						  $existing_records[$sk] = array("id"=>$fieldarr->id,"nw_bores_num"=>$fieldarr->nw_bores_num,"no_ground_water"=>$fieldarr->no_ground_water,"over_load"=>$fieldarr->over_load,"motor_brunt"=>$fieldarr->motor_brunt,"cable_prblm"=>$fieldarr->cable_prblm,"pumpormotorwear"=>$fieldarr->pumpormotorwear,"others"=>$fieldarr->others,"dry_run_protectn"=>$fieldarr->dry_run_protectn,"flow_meter"=>$fieldarr->flow_meter,"remarks"=>$fieldarr->remarks);
					 }
					 
				 	
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
		     $borewellpcn = 3;
		    	$pdf = PDF::loadView('misprints.borewellmisprint', $relations);

        //      return $pdf->download('metrowater.pdf'); 
				
		  $pdf->setPaper('A4', 'landscape');
				$pdf->save(storage_path('/pdffiles/borewellnotworking.pdf')); 
		  
		// END BOREWELL NOT WORKING
		
		
		
		
		
				
				
				
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
		 
		 $sites_res_arr = $siteattrname;
		   $skarra= array();
		 // if(Auth::user()->id == 1){
		  foreach($siteattrname as $keys => $site){
		    if($keys == 9 || $keys == 15 || $keys == 13 || $keys == 11 || $keys == 18 || $keys == 5 || $keys == 7 || $keys == 20){
			   $skarra[0] = 9;
			   $skarra[1] = 15;
			   $skarra[2] = 13;
			   $skarra[3] = 11;
			   $skarra[4] = 18;
			   $skarra[5] = 5;
			   $skarra[6] = 7;
			   $skarra[7] = 20;         
			}
		  }  
		  
		  $sites_res_arr_res = array();
		  foreach($skarra as $kv){
		   if(isset($sites_res_arr[$kv])) {
		    $sites_res_arr_res[$kv] = $siteattrname[$kv];
			}
		  }
		   $siteattrname = $sites_res_arr_res;  
		// }    
		 
		   $sitearrnew = array();
		  foreach( $siteattrname as $kkk => $site){
		     $sitearrnew[]=$kkk;
		  }
		  

		
		$matchfields = ['month' => $segment4, 'year' => $segment3]; 
		
		if(Auth::user()->id == 1){
		$res_count = \App\Firesafetymisreport::whereIn('site', $sitearrnew)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Firesafetymisreport::whereIn('site', $sitearrnew)->where($matchfields)->get();
		}
		
		}
		else
		{
		  $res_count = \App\Firesafetymisreport::whereIn('site', $sitearrnew)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Firesafetymisreport::whereIn('site', $sitearrnew)->where($matchfields)->get();
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
		  $misprevresult = array();
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
			
			
				if($segment4 == 1){
			  $prev_mon = 12;
			  $prev_year = $segment3 - 1;
 			}
			else{
			  $prev_mon = $segment4 - 1;;
			  $prev_year = $segment3;
			}
			
			$mismatchprevfields = ['month' => $prev_mon, 'year' => $prev_year, 'site' =>$skey]; 
			$misprevmatchcount = \App\Firesafetymisreport::where($mismatchprevfields)->count();
			
			if($misprevmatchcount > 0){
				 $mismatch_prev_ress = \App\Firesafetymisreport::where($mismatchprevfields)->first();
				 $misprevresult[$skey] = $mismatch_prev_ress;
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
			   //$ref_record_temp_val = \App\Firesafenotworkingissue::where($matchreffields)->get();
			    $ref_record_temp_val = \App\Firesafenotworkingissue::where($matchreffields)->orderBy('category', 'asc')->get();
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
		     
			
		
			
			$farray = array();
			foreach($siteattrname as $kk => $res){
			  if(isset($issuecount[$kk])) $farray[$kk] = $issuecount[$kk];
			}
		
			
		$issuecount = $farray;
		
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
			 'misprevious' => $misprevresult,
			'issuetemp' => $ref_overall_temp,
			
			];     
			   		
					
          			  if (count($issuecount) > 0) {
			      $mc = 0;$issuet = array();
				    $fi = 0;
                        foreach ($issuecount as $ikey => $issuecn) {
						$mc = $mc + 1;
						$fi = $fi + 1;
							$relations = [
								'ikey' => $ikey,  
								'sites' => $siteattrname,
								'issuecn' => $issuecn,
								'report_on' => $reportdate_val,
								'report_year' => $segment3,
								'report_month' => $segment4,
								'issues' => $ref_overall, 
								'issuecount' => $issuecount,
								'validation' => $ref_total, 
								'misres' => $misresult, 
								 'misprevious' => $misprevresult,
								'issuetemp' => $ref_overall_temp,
							];  
							
								$pdf = PDF::loadView('misprints.firesafeviews.mainfile', $relations);
		                      // $pdf->setPaper('A4', 'landscape');
		                       $pdf->save(storage_path('/pdffiles/firesafe/mistrafficprint'.$ikey.'.pdf'));  
						  
						  if($issuecn > 5) {
						   $fi = $fi + 1;
						       $issuet[$ikey] = $ikey;
						       	$relations = [
								'ikey' => $ikey,  
								'sites' => $siteattrname,
								'issuecn' => $issuecn,
								'report_on' => $reportdate_val,
								'report_year' => $segment3,
								'report_month' => $segment4,
								'issues' => $ref_overall, 
								'issuecount' => $issuecount,
								'validation' => $ref_total, 
								'misres' => $misresult, 
								 'misprevious' => $misprevresult,
								'issuetemp' => $ref_overall_temp,
							];  
							
						    
							  $pdf = PDF::loadView('misprints.firesafeviews.landscpaefile', $relations);
		                      $pdf->setPaper('A4', 'landscape');
		                       $pdf->save(storage_path('/pdffiles/firesafe/mistrafficprintissue'.$ikey.'.pdf'));  
							 
						  } else
						  {
						   if($issuecn > 0){
						     $fi = $fi + 1;
						 
						  $issuet[$ikey] = $ikey;
						    
							 	$relations = [
								'ikey' => $ikey,  
								'sites' => $siteattrname,
								'issuecn' => $issuecn,
								'report_on' => $reportdate_val,
								'report_year' => $segment3,
								'report_month' => $segment4,
								'issues' => $ref_overall, 
								'issuecount' => $issuecount,
								'validation' => $ref_total, 
								'misres' => $misresult, 
								 'misprevious' => $misprevresult,
								'issuetemp' => $ref_overall_temp,
							];  
							
						    
							  $pdf = PDF::loadView('misprints.firesafeviews.portraitfile', $relations);
		                      
		                       $pdf->save(storage_path('/pdffiles/firesafe/mistrafficprintissue'.$ikey.'.pdf'));  
							   
						   
						  }
						  }
						  
						}  
						
						}
						
						
						
						$pdf = new \PDFMerger();
						
						 foreach ($issuecount as $ikey => $issuecn) {
						 
						   $pdf->addPDF(storage_path() .'/pdffiles/firesafe/mistrafficprint'.$ikey.'.pdf', 'all');
						   
						   if(isset($issuet[$ikey])) {
						      
							   $pdf->addPDF(storage_path() .'/pdffiles/firesafe/mistrafficprintissue'.$ikey.'.pdf', 'all');
						   }
						   
						 }
						 
						 $pathForTheMergedPdf_fire_firesafe = storage_path() . "/pdffiles/firesafe/finalresult.pdf";
						 
						 $pdf->merge('file', storage_path('/pdffiles/firesafe.pdf'));
						 
						 $firesafe_final_Count = $issuecount;
						 
						  //$fcount = $fi + 3;
						  
						  $firesafepcn = $fi;
						 
						
                        // $pdf->save(storage_path('/pdffiles/firesafe.pdf')); 
				
					// $pdf->save(storage_path('/pdffiles/firesafe.pdf'));
				 
				 //$pdf->merge('download', $pathForTheMergedPdf_fire);

		
		  
		 /*  
		   
		  $pdf = PDF::loadView('misprints.firesaftyprint', $relations);  
          $pdf->save(storage_path('/pdffiles/firesafe.pdf'));  */
		  
		  
		  
		  // FIRE NOC
		  
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
		$noc_f_res = array();
		$sarovar_fr = array();
		$cyber_fr = array();
		$aura_fr = array();
		$hill_aven_fr = array();
		$hill_lake_fr = array();
		$sarovargran_fr = array();
		$twrs_fr = array();
		 foreach($siteattrname as $kk =>$siteat) {
		 $matchfields_fornoc = ['valid_month' => $segment4, 'valid_year' => $segment3, 'site' =>$kk]; 
		 $matchfields_fornoc = ['valid_month' => 3, 'valid_year' => $segment3, 'site' =>$kk]; 
		 $resnoc_count = \App\Blocknocmonthreport::where($matchfields_fornoc)->count();
		 if($resnoc_count > 0){
		     $resnoc_cres = \App\Blocknocmonthreport::where($matchfields_fornoc)->get();
		    $noc_f_res[$kk] = $resnoc_cres;
			if($kk == 9) {$sarovar_fr =  $noc_f_res[$kk];}
			   if($kk == 13) {$cyber_fr =  $noc_f_res[$kk];}
			   if($kk == 11) {$aura_fr =  $noc_f_res[$kk];}
			   if($kk == 10) {$hill_aven_fr =  $noc_f_res[$kk];}
			    if($kk == 5) {$hill_lake_fr =  $noc_f_res[$kk];}
			    if($kk == 18) {$twrs_fr =  $noc_f_res[$kk];}
				 if($kk == 15) {$sarovargran_fr =  $noc_f_res[$kk];}
		 }
		   else{
		     $matchfields_f = ['site' => $kk]; 
			  $firenocdata_month_res_cn = \App\Blocknocmonthreport::where($matchfields_f)->orderBy('valid_month', 'desc')->count();
			  if($firenocdata_month_res_cn > 0) {
		     $firenocdata_month_res_emp = \App\Blocknocmonthreport::where($matchfields_f)->orderBy('valid_month', 'desc')->first();
			 $matchfields_fornoc = ['valid_month' => $firenocdata_month_res_emp->valid_month, 'valid_year' => $segment3, 'site' =>$kk];
		      $resnoc_cres = \App\Blocknocmonthreport::where($matchfields_fornoc)->get();
			  $noc_f_res[$kk] = $resnoc_cres;
			   if($kk == 9) {$sarovar_fr =  $noc_f_res[$kk];}
			   if($kk == 13) {$cyber_fr =  $noc_f_res[$kk];}
			   if($kk == 11) {$aura_fr =  $noc_f_res[$kk];}
			   if($kk == 10) {$hill_aven_fr =  $noc_f_res[$kk];}
			    if($kk == 5) {$hill_lake_fr =  $noc_f_res[$kk];}
			    if($kk == 18) {$twrs_fr =  $noc_f_res[$kk];}
				 if($kk == 15) {$sarovargran_fr =  $noc_f_res[$kk];}
			  }else{
			  
			  $noc_f_res[$kk] = array();  	
			   if($kk == 9) {$sarovar_fr =  $noc_f_res[$kk];}
			   if($kk == 13) {$cyber_fr =  $noc_f_res[$kk];}
			   if($kk == 11) {$aura_fr =  $noc_f_res[$kk];}
			   if($kk == 10) {$hill_aven_fr =  $noc_f_res[$kk];}
			    if($kk == 5) {$hill_lake_fr =  $noc_f_res[$kk];}
			    if($kk == 18) {$twrs_fr =  $noc_f_res[$kk];}
				 if($kk == 15) {$sarovargran_fr =  $noc_f_res[$kk];}
			      
			  }
			   
		   }
		}
		 
		/* echo "<pre>";
		  print_r($sarovargran_fr);
		  
		 echo "</pre>";*/
		// exit;
		//$sarovar_fr = array();
		//$cyber_fr = array();
		//$sarovargran_fr = array();
		//$twrs_fr = array();
		//$hill_aven_fr = array();
		//$hill_lake_fr = array();
		//$aura_fr = array();
		
		
			$relations = [
			'res' => $formfieldarray,  
			'sites' => $siteattrname,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'nocres' => $noc_f_res, 
			'sarovarres' => $sarovar_fr,
			'cyberres' => $cyber_fr,
			'graderes' => $sarovargran_fr,
			'towers' => $twrs_fr,
			'avenues' => $hill_aven_fr,
			'lakeb' => $hill_lake_fr,
			'aurares' => $aura_fr,
				  
			];     
			
			  
			
			   		
           $nocCount = 0;
		   foreach($siteattrname as $nk => $sitenoc){
		     if(count($noc_f_res[$nk]) > 0) {
			    $nocCount =  $nocCount + 1;
			 }
		   }
		   $fcount = 0;
		   
		    $pageone_val = 0;
				 $pagetwo_val = 0;
				 if(count($hill_lake_fr) > 0 || count($hill_aven_fr) > 0 || count($twrs_fr) > 0 || count($sarovargran_fr) > 0) {
				  $fcount = $fcount + 1;
				    $pageoneval = $fcount;
					$firesafepcn = $firesafepcn + 1;
				 }
				 if(count($cyber_fr) > 0 || count($sarovar_fr) > 0 || count($aura_fr) > 0) {
				  $fcount = $fcount + 1;
				    $pagetwo_val = $fcount;
					$firesafepcn = $firesafepcn + 1;
				 } 
				  
		//  return view('misfiles.view.misfiresaftey', $relations);

		

		   //return view('misprints.nocdataprint', $relations);
		 // exit; 
		 // $pdf = PDF::loadView('misprints.firenocrenewals', $relations);  
          //$pdf->save(storage_path('/pdffiles/firenocrenewal.pdf'));
		  

		  
		/*  echo "<pre>";
		     print_r($sarovar_fr);
		  echo "</pre>";
		  
		  
		  echo "<pre>";
		     print_r($cyber_fr);
		  echo "</pre>";
		  
		   echo "<pre>";
		     print_r($sarovargran_fr);
		  echo "</pre>";
		  
		   echo "<pre>";
		     print_r($twrs_fr);
		  echo "</pre>";
		  
		    echo "<pre>";
		     print_r($hill_aven_fr);
		  echo "</pre>";
		  
		     echo "<pre>";
		     print_r($hill_lake_fr);
		  echo "</pre>";
		  
		   echo "<pre>";
		     print_r($aura_fr);
		  echo "</pre>";
		  
		  
		  exit;     */
		   
	
		  
		  
		  $pdf = PDF::loadView('misprints.nocdataprintbkp', $relations);  
          $pdf->save(storage_path('/pdffiles/nocdataprintbkp.pdf')); 
		  
		  $pdf = PDF::loadView('misprints.nocdataprint', $relations);  
          $pdf->save(storage_path('/pdffiles/nocdataprint.pdf')); 
		  
		  
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
		  
		  
		  $sites_res_arr = $siteattrname;
		   $skarra= array();
		  //if(Auth::user()->id == 1){
		  foreach($siteattrname as $keys => $site){
		    if($keys == 9 || $keys == 15 || $keys == 13 || $keys == 11 || $keys == 8 || $keys == 5 || $keys == 14 || $keys == 7 || $keys == 19 || $keys == 18 || $keys == 17 || $keys == 20){
			   $skarra[0] = 9;
			   $skarra[1] = 15;
			   $skarra[2] = 13;
			   $skarra[3] = 11;
			   $skarra[4] = 8;
			   $skarra[5] = 5;
			   $skarra[6] = 14;
			   $skarra[7] = 7;
			   $skarra[8] = 19;
			   $skarra[9] = 18;
			   $skarra[10] = 17;
			   $skarra[11] = 20;          
			}
		  }  
		  
		  $sites_res_arr_res = array();
		  foreach($skarra as $kv){
		   if(isset($sites_res_arr[$kv])) {
		    $sites_res_arr_res[$kv] = $siteattrname[$kv];
			}
		  }
		   $siteattrname = $sites_res_arr_res;  
		// }   
		
		   $sitearrnew = array();
		  foreach( $siteattrname as $kkk => $site){
		     $sitearrnew[]=$kkk;
		  }
		
		$matchfields = ['month' => $segment4, 'year' => $segment3]; 
		
		if(Auth::user()->id == 1){
		$res_count = \App\Equipmentmisreport::whereIn('site', $sitearrnew)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Equipmentmisreport::whereIn('site', $sitearrnew)->where($matchfields)->get();
		}
		
		}
		else
		{
		  $res_count = \App\Equipmentmisreport::whereIn('site', $sitearrnew)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Equipmentmisreport::whereIn('site', $sitearrnew)->where($matchfields)->get();
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
		 $misprevresult = array();
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
			
			if($segment4 == 1){
			  $prev_mon = 12;
			  $prev_year = $segment3 - 1;
 			}
			else{
			  $prev_mon = $segment4 - 1;;
			  $prev_year = $segment3;
			}
			
			$mismatchprevfields = ['month' => $prev_mon, 'year' => $prev_year, 'site' =>$skey]; 
			$misprevmatchcount = \App\Equipmentmisreport::where($mismatchprevfields)->count();
			
			if($misprevmatchcount > 0){
				 $mismatch_prev_ress = \App\Equipmentmisreport::where($mismatchprevfields)->first();
				 $misprevresult[$skey] = $mismatch_prev_ress;
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
			   //$ref_record_temp_val = \App\Equipmentnotworkingissue::where($matchreffields)->get();
			   $ref_record_temp_val = \App\Equipmentnotworkingissue::where($matchreffields)->orderBy('category', 'asc')->get();
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
		  
		  $farray = array();
			foreach($siteattrname as $kk => $res){
			  if(isset($issuecount[$kk])) $farray[$kk] = $issuecount[$kk];
			}
		
			
		$issuecount = $farray;
		     arsort($issuecount);
			 
			// FOR APRIL-2018
			 unset($issuecount['17']);
			 
			 $new_issuecn = array('17' => '0') + $issuecount;
			 
			 $issuecount = $new_issuecn;
			 
			 // FOR APRIL-2018
			 /* echo "<pre>";
			   print_r($issuecount);
			 echo "</pre>"; exit;  */
		
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
			'misprevious' => $misprevresult,
			'issuetemp' => $ref_overall_temp,
			
			];     
			
			 $Equipment_mechanical_Count = $issuecount;
			
			 $pdf = PDF::loadView('misprints.electomechanical', $relations);  
           ////sss////   $pdf->save(storage_path('/pdffiles/electomechanical.pdf')); 
			  
			     $fi = 0;
			  
			     if (count($issuecount) > 0) {
			      $mc = 0;$issuet = array();
				  $fi = 0;
                        foreach ($issuecount as $ikey => $issuecn) {
						$mc = $mc + 1;
						$fi = $fi + 1;
							$relations = [
								'ikey' => $ikey,  
								'sites' => $siteattrname,
								'issuecn' => $issuecn,
								'report_on' => $reportdate_val,
								'report_year' => $segment3,
								'report_month' => $segment4,
								'issues' => $ref_overall, 
								'issuecount' => $issuecount,
								'validation' => $ref_total, 
								'misres' => $misresult, 
								'issuetemp' => $ref_overall_temp,
								'misprevious' => $misprevresult,
								'pagenumberval' => $fi + $fcount,
							];  
							// if($mc == 5) {
							//  return view('misprints.equipment.mainfile', $relations);
							//  }
								$pdf = PDF::loadView('misprints.equipment.mainfile', $relations);
		                      // $pdf->setPaper('A4', 'landscape');
		                       $pdf->save(storage_path('/pdffiles/equipment/mistrafficprint'.$ikey.'.pdf'));  
						  
						  if($issuecn > 5) {
						  $fi = $fi + 1;
						       $issuet[$ikey] = $ikey;
						       	$relations = [
								'ikey' => $ikey,  
								'sites' => $siteattrname,
								'issuecn' => $issuecn,
								'report_on' => $reportdate_val,
								'report_year' => $segment3,
								'report_month' => $segment4,
								'issues' => $ref_overall, 
								'issuecount' => $issuecount,
								'validation' => $ref_total, 
								'misres' => $misresult, 
								'misprevious' => $misprevresult,
								'issuetemp' => $ref_overall_temp,
								'pagenumberval' => $fi + $fcount,
							];  
							
						    
							  $pdf = PDF::loadView('misprints.equipment.landscpaefile', $relations);
		                      $pdf->setPaper('A4', 'landscape');
		                       $pdf->save(storage_path('/pdffiles/equipment/mistrafficprintissue'.$ikey.'.pdf'));  
							 
						  } else
						  {
						 
						   if($issuecn > 0){
						  $fi = $fi + 1;
						  $issuet[$ikey] = $ikey;
						    
							 	$relations = [
								'ikey' => $ikey,  
								'sites' => $siteattrname,
								'issuecn' => $issuecn,
								'report_on' => $reportdate_val,
								'report_year' => $segment3,
								'report_month' => $segment4,
								'issues' => $ref_overall, 
								'issuecount' => $issuecount,
								'validation' => $ref_total, 
								'misres' => $misresult, 
								'misprevious' => $misprevresult,
								'issuetemp' => $ref_overall_temp,
								'pagenumberval' => $fi + $fcount,
							];  
							
						    
							  $pdf = PDF::loadView('misprints.equipment.portraitfile', $relations);
		                      
		                       $pdf->save(storage_path('/pdffiles/equipment/mistrafficprintissue'.$ikey.'.pdf'));  
							   
						   
						  }
						  }
						  
						}  
						
						}
						
						 $fcount =   $fcount + $fi;
						 
						 $pdf = new \PDFMerger();
						
						 foreach ($issuecount as $ikey => $issuecn) {
						 
						   $pdf->addPDF(storage_path() .'/pdffiles/equipment/mistrafficprint'.$ikey.'.pdf', 'all');
						   
						   if(isset($issuet[$ikey])) {
						      
							   $pdf->addPDF(storage_path() .'/pdffiles/equipment/mistrafficprintissue'.$ikey.'.pdf', 'all');
						   }
						   
						 }
						 
						 $pathForTheMergedPdf_fire_firesafe = storage_path() . "/pdffiles/equipment/finalresult.pdf";
						 
						 $pdf->merge('file', storage_path('/pdffiles/electomechanical.pdf'));
						 
						 $firesafe_final_Count = $issuecount;
						 
						  //$fcount = $fi + 3;
						  
						  $wqupmentcn =  $fi;
					
				
				
				
				
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
		  
		
		   $skarra= array();
		//  if(Auth::user()->id == 1){
		  foreach($siteattrname as $keys => $site){
		    if($keys == 9 || $keys == 15 || $keys == 13 || $keys == 11 || $keys == 8 || $keys == 5 || $keys == 14 || $keys == 7 || $keys == 18 || $keys == 19 || $keys == 17 || $keys == 20){
			   $skarra[0] = 9;
			   $skarra[1] = 15;
			   $skarra[2] = 13;
			   $skarra[3] = 11;
			   $skarra[4] = 8;
			   $skarra[5] = 5;
			   $skarra[6] = 14;
			   $skarra[7] = 7;
			   $skarra[8] = 18;
			   $skarra[9] = 19;
			   $skarra[10] = 17;     
			    $skarra[11] = 20;         
			}
		  }   
		   $sites_res_arr = $siteattrname;
		  $sites_res_arr_res = array();
		  foreach($skarra as $kv){
		   if(isset($sites_res_arr[$kv])) {
		    $sites_res_arr_res[$kv] = $siteattrname[$kv];
			}
		  }
		   $siteattrname = $sites_res_arr_res;  
		 //}    
		
		   $sitearrnew = array();
		  foreach( $siteattrname as $kkk => $site){
		     $sitearrnew[]=$kkk;
		  }
		
		$matchfields = ['month' => $segment4, 'year' => $segment3]; 
		
		if(Auth::user()->id == 1){
		$res_count = \App\Stpmisreport::whereIn('site', $sitearrnew)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Stpmisreport::whereIn('site', $sitearrnew)->where($matchfields)->get();
		}
		
		} 
		else
		{
		  $res_count = \App\Stpmisreport::whereIn('site', $sitearrnew)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Stpmisreport::whereIn('site', $sitearrnew)->where($matchfields)->get();
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
		 $misprevresult = array();
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
			
			if($segment4 == 1){
			  $prev_mon = 12;
			  $prev_year = $segment3 - 1;
 			}
			else{
			  $prev_mon = $segment4 - 1;;
			  $prev_year = $segment3;
			}
			
			$mismatchprevfields = ['month' => $prev_mon, 'year' => $prev_year, 'site' =>$skey]; 
			$misprevmatchcount = \App\Stpmisreport::where($mismatchprevfields)->count();
			
			if($misprevmatchcount > 0){
				 $mismatch_prev_ress = \App\Stpmisreport::where($mismatchprevfields)->first();
				 $misprevresult[$skey] = $mismatch_prev_ress;
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
			 //  $ref_record_temp_val = \App\Stpnotworkingissue::where($matchreffields)->get();
			     $ref_record_temp_val = \App\Stpnotworkingissue::where($matchreffields)->orderBy('category', 'asc')->get();
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
		  
		    $farray = array();
			foreach($siteattrname as $kk => $res){
			  if(isset($issuecount[$kk])) $farray[$kk] = $issuecount[$kk];
			}
			
			$issuecount = $farray;
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
			'misprevious' => $misprevresult,
			
			];      
			
			$stp_issue_Count = $issuecount;
			   		
		   $pdf = PDF::loadView('misprints.stpstatus', $relations);  
           $pdf->save(storage_path('/pdffiles/stpstatus.pdf')); 
		   
		   
		    $fi = 0;
			  if (count($issuecount) > 0) {
			      $mc = 0;$issuet = array();
				  $fi = 0;
                        foreach ($issuecount as $ikey => $issuecn) {
						$mc = $mc + 1;
						$fi = $fi + 1;
							$relations = [
								'ikey' => $ikey,  
								'sites' => $siteattrname,
								'issuecn' => $issuecn,
								'report_on' => $reportdate_val,
								'report_year' => $segment3,
								'report_month' => $segment4,
								'issues' => $ref_overall, 
								'issuecount' => $issuecount,
								'validation' => $ref_total, 
								'misres' => $misresult, 
								'issuetemp' => $ref_overall_temp,
								'pagenumberval' => $fi + $fcount,
							];  
							
								$pdf = PDF::loadView('misprints.stp.mainfile', $relations);
		                      // $pdf->setPaper('A4', 'landscape');
		                       $pdf->save(storage_path('/pdffiles/stp/mistrafficprint'.$ikey.'.pdf'));  
						  
						  if($issuecn > 5) {
						  $fi = $fi + 1;
						       $issuet[$ikey] = $ikey;
						       	$relations = [
								'ikey' => $ikey,  
								'sites' => $siteattrname,
								'issuecn' => $issuecn,
								'report_on' => $reportdate_val,
								'report_year' => $segment3,
								'report_month' => $segment4,
								'issues' => $ref_overall, 
								'issuecount' => $issuecount,
								'validation' => $ref_total, 
								'misres' => $misresult, 
								'issuetemp' => $ref_overall_temp,
								'pagenumberval' => $fi + $fcount,
							];  
							
						    
							  $pdf = PDF::loadView('misprints.stp.landscpaefile', $relations);
		                      $pdf->setPaper('A4', 'landscape');
		                       $pdf->save(storage_path('/pdffiles/stp/mistrafficprintissue'.$ikey.'.pdf'));  
							 
						  } else
						  {
						 
						   if($issuecn > 0){
						  $fi = $fi + 1;
						  $issuet[$ikey] = $ikey;
						    
							 	$relations = [
								'ikey' => $ikey,  
								'sites' => $siteattrname,
								'issuecn' => $issuecn,
								'report_on' => $reportdate_val,
								'report_year' => $segment3,
								'report_month' => $segment4,
								'issues' => $ref_overall, 
								'issuecount' => $issuecount,
								'validation' => $ref_total, 
								'misres' => $misresult, 
								'issuetemp' => $ref_overall_temp,
								'pagenumberval' => $fi + $fcount,
							];  
							
						    
							  $pdf = PDF::loadView('misprints.stp.portraitfile', $relations);
		                      
		                       $pdf->save(storage_path('/pdffiles/stp/mistrafficprintissue'.$ikey.'.pdf'));  
							   
						   
						  }
						  }
						  
						}  
						
						}
						
						 $stppcn =  $fi;
						 
		   
		    
		   
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
		  
		    $skarra= array();
		 // if(Auth::user()->id == 1){
		  foreach($siteattrname as $keys => $site){
		    if($keys == 9 || $keys == 15 || $keys == 13 || $keys == 11 || $keys == 8 || $keys == 5 || $keys == 14 || $keys == 7 || $keys == 16 || $keys == 19 || $keys == 17 || $keys == 20 ){
			   $skarra[0] = 9;
			   $skarra[1] = 15;
			   $skarra[2] = 13;
			   $skarra[3] = 11;
			   $skarra[4] = 8;
			   $skarra[5] = 5;
			   $skarra[6] = 14;
			   $skarra[7] = 7;
			   $skarra[8] = 16;
			   $skarra[9] = 19;
			   $skarra[10] = 17;  
			   $skarra[11] = 20;        
			}
		  }   
		  
		  $sites_res_arr_res = array();
		  foreach($skarra as $kv){
		   if(isset($sites_res_arr[$kv])) {
		    $sites_res_arr_res[$kv] = $siteattrname[$kv];
			}
		  }
		   $siteattrname = $sites_res_arr_res;  
	//	 }    
		
		   $sitearrnew = array();
		  foreach( $siteattrname as $kkk => $site){
		     $sitearrnew[]=$kkk;
		  }
		
		$matchfields = ['month' => $segment4, 'year' => $segment3]; 
		
		if(Auth::user()->id == 1){
		$res_count = \App\Wspmisreport::whereIn('site', $sitearrnew)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Wspmisreport::whereIn('site', $sitearrnew)->where($matchfields)->get();
		}
		
		}
		else
		{
		  $res_count = \App\Wspmisreport::whereIn('site', $sitearrnew)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Wspmisreport::whereIn('site', $sitearrnew)->where($matchfields)->get();
		}
		 
		}
		
		$refid = array();
		/* GET REF ID*/
		if($formfieldarray){
		 foreach($formfieldarray as $formres){
		    $refid[$formres->site] = $formres->id;
		 }
		   
		 }
		 $misprevresult = array();
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
			
			if($segment4 == 1){
			  $prev_mon = 12;
			  $prev_year = $segment3 - 1;
 			}
			else{
			  $prev_mon = $segment4 - 1;;
			  $prev_year = $segment3;
			}
			
			$mismatchprevfields = ['month' => $prev_mon, 'year' => $prev_year, 'site' =>$skey]; 
			$misprevmatchcount = \App\Wspmisreport::where($mismatchprevfields)->count();
			
			if($misprevmatchcount > 0){
				 $mismatch_prev_ress = \App\Wspmisreport::where($mismatchprevfields)->first();
				 $misprevresult[$skey] = $mismatch_prev_ress;
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
			   //$ref_record_temp_val = \App\Wspnotworkingissue::where($matchreffields)->get();
			   $ref_record_temp_val = \App\Wspnotworkingissue::where($matchreffields)->orderBy('category', 'asc')->get();
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
		  
		      $farray = array();
			foreach($siteattrname as $kk => $res){
			  if(isset($issuecount[$kk])) $farray[$kk] = $issuecount[$kk];
			}
			
			$issuecount = $farray;
		  
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
			'misprevious' => $misprevresult,
			
			];       
			
			$wsp_issue_Count = $issuecount;
			
			  $pdf = PDF::loadView('misprints.wspstatus', $relations);  
              $pdf->save(storage_path('/pdffiles/wspstatus.pdf')); 
			    $fi = 0; 		
			  if (count($issuecount) > 0) {
			      $mc = 0;$issuet = array();
				  $fi = 0;
                        foreach ($issuecount as $ikey => $issuecn) {
						$mc = $mc + 1;
						$fi = $fi + 1;
							$relations = [
								'ikey' => $ikey,  
								'sites' => $siteattrname,
								'issuecn' => $issuecn,
								'report_on' => $reportdate_val,
								'report_year' => $segment3,
								'report_month' => $segment4,
								'issues' => $ref_overall, 
								'issuecount' => $issuecount,
								'validation' => $ref_total, 
								'misres' => $misresult, 
								'issuetemp' => $ref_overall_temp,
								'pagenumberval' => $fi + $fcount,
							];  
							
								$pdf = PDF::loadView('misprints.wsp.mainfile', $relations);
		                      // $pdf->setPaper('A4', 'landscape');
		                       $pdf->save(storage_path('/pdffiles/wsp/mistrafficprint'.$ikey.'.pdf'));  
						  
						  if($issuecn > 5) {
						  $fi = $fi + 1;
						       $issuet[$ikey] = $ikey;
						       	$relations = [
								'ikey' => $ikey,  
								'sites' => $siteattrname,
								'issuecn' => $issuecn,
								'report_on' => $reportdate_val,
								'report_year' => $segment3,
								'report_month' => $segment4,
								'issues' => $ref_overall, 
								'issuecount' => $issuecount,
								'validation' => $ref_total, 
								'misres' => $misresult, 
								'issuetemp' => $ref_overall_temp,
								'pagenumberval' => $fi + $fcount,
							];  
							
						    
							  $pdf = PDF::loadView('misprints.wsp.landscpaefile', $relations);
		                      $pdf->setPaper('A4', 'landscape');
		                       $pdf->save(storage_path('/pdffiles/wsp/mistrafficprintissue'.$ikey.'.pdf'));  
							 
						  } else
						  {
						 
						   if($issuecn > 0){
						  $fi = $fi + 1;
						  $issuet[$ikey] = $ikey;
						    
							 	$relations = [
								'ikey' => $ikey,  
								'sites' => $siteattrname,
								'issuecn' => $issuecn,
								'report_on' => $reportdate_val,
								'report_year' => $segment3,
								'report_month' => $segment4,
								'issues' => $ref_overall, 
								'issuecount' => $issuecount,
								'validation' => $ref_total, 
								'misres' => $misresult, 
								'issuetemp' => $ref_overall_temp,
								'pagenumberval' => $fi + $fcount,
							];  
							
						    
							  $pdf = PDF::loadView('misprints.wsp.portraitfile', $relations);
		                      
		                       $pdf->save(storage_path('/pdffiles/wsp/mistrafficprintissue'.$ikey.'.pdf'));  
							   
						   
						  }
						  }
						  
						}  
						
						}
						
						 $fcount =   $fcount + $fi;
						   
                          $wsppcn =  $fi;
			    
	  //// CMD AND RMD
			  
		$segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
		$segment3 = Request::segment(2);
		$segment4 = Request::segment(3);
		
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
			'backup' => $backup,  
			];    

	
			 
			 
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
			 
			 $occres_res = array();
			 
			  $skarra= array();
		 // if(Auth::user()->id == 1){
		  foreach($siteattrname as $keys => $site){
		    if($keys == 18 || $keys == 9 || $keys == 19 || $keys == 8 || $keys == 11 || $keys == 5 || $keys == 13 || $keys == 15 || $keys == 14 ){
			   $skarra[0] = 18;
			   $skarra[1] = 9;
			   $skarra[2] = 19;
			   $skarra[3] = 8;
			   $skarra[4] = 11;
			   $skarra[5] = 5;
			   $skarra[6] = 13;
			   $skarra[7] = 15;
			   $skarra[8] = 14;
			       
			}
		  }   
		  
		  $sites_res_arr_res = array();
		  foreach($skarra as $kv){
		   if(isset($siteattrname[$kv])) {
		    $sites_res_arr_res[$kv] = $siteattrname[$kv];
			}
		  }
		   $siteattrname = $sites_res_arr_res;  
			 
			 
			 
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
			
			  
		  
		   //  return view('misprints.cmdprintnew', $relations);
			// exit;
			 $cmdpcn = 1;
			 
			$pdf = PDF::loadView('misprints.cmdprintnew', $relations);  
			$pdf->setPaper('A4', 'landscape');  
			$pdf->save(storage_path('/pdffiles/cmdprintnew.pdf')); 

			    
			  
	  //// END CMD AND RMD
			  
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
							
								$dateString = $segment3.'-'.$segment4.'-04';
							//Last date of current month.
							$lastDateOfMonth = date("t", strtotime($dateString));
							$reportdate_val = $lastDateOfMonth."-".$segment4."-".$segment3;
							
							$security_match_fields = ['site' => $fieldarr->site,'reporton' => $reportdate_val];
							
							$prev_sec_report_cn = \App\Securitydailyreport::where($security_match_fields)->count();
							 
							$eqpmatchfields = ['site' => $fieldarr->site]; 
							$equipcn = \App\Securitydailyreportvalidation::where($eqpmatchfields)->count();
							 if($equipcn > 0){
								$equipvalidation = \App\Securitydailyreportvalidation::where($eqpmatchfields)->first();
					          } 
					 
					 
					 
					  if($fieldarr->site == 8 || $fieldarr->site == 5 || $fieldarr->site == 14 || $fieldarr->site == 7 || $fieldarr->site == 16 || $fieldarr->site == 17 ){
					 $exist_Sec['sites'][$fieldarr->site] = get_sitename($fieldarr->site);
					 $exist_Sec['guards'][$fieldarr->site] = $fieldarr->guards;
					 $exist_Sec['l_guards'][$fieldarr->site] = $fieldarr->l_guards;
					 $exist_Sec['h_guards'][$fieldarr->site] = $fieldarr->h_guards;
					 $exist_Sec['supervisors'][$fieldarr->site] = $fieldarr->supervisors;
					 $exist_Sec['aso'][$fieldarr->site] = $fieldarr->aso;
					  $exist_Sec['computers_num'][$fieldarr->site] = $fieldarr->computers_num;
					 $exist_Sec['bicycle_num'][$fieldarr->site] = $fieldarr->bicycle_num;
					 $exist_Sec['so_num'][$fieldarr->site] = $fieldarr->so_num;
					 $exist_Sec['ctotval'][$fieldarr->site] = (float)$fieldarr->guards + (float)$fieldarr->l_guards + (float)$fieldarr->h_guards + (float)$fieldarr->supervisors + (float)$fieldarr->aso + (float)$fieldarr->so_num;
					 
					 $exist_Sec['nalla_gandla_hub'][$fieldarr->site] = $fieldarr->nalla_gandla_hub;
					 $exist_Sec['hillpark_hub'][$fieldarr->site] = $fieldarr->hillpark_hub;
					 
					  
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
					  
					   
							
					 } else
					     if($fieldarr->site == 9 || $fieldarr->site == 15 || $fieldarr->site == 13 || $fieldarr->site == 11 || $fieldarr->site == 18 || $fieldarr->site == 19 ){
					 
					  $exist_SecTwo['sites'][$fieldarr->site] = get_sitename($fieldarr->site);
					 $exist_SecTwo['guards'][$fieldarr->site] = $fieldarr->guards;
					 $exist_SecTwo['l_guards'][$fieldarr->site] = $fieldarr->l_guards;
					 $exist_SecTwo['h_guards'][$fieldarr->site] = $fieldarr->h_guards;
					 $exist_SecTwo['supervisors'][$fieldarr->site] = $fieldarr->supervisors;
					 $exist_SecTwo['aso'][$fieldarr->site] = $fieldarr->aso;
					 $exist_SecTwo['so_num'][$fieldarr->site] = $fieldarr->so_num;
					 
					   $exist_SecTwo['computers_num'][$fieldarr->site] = $fieldarr->computers_num;
					 $exist_SecTwo['bicycle_num'][$fieldarr->site] = $fieldarr->bicycle_num;
					 
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
			 $sitearrname1 = $siteattrname;
			 $sitearrname2 = $siteattrname;
			 $skarra= array();
		  //if(Auth::user()->id == 1){
		  foreach($sitearrname1 as $keys => $site){
		    if($keys == 8 || $keys == 5 || $keys == 14 || $keys == 7 || $keys == 16 || $keys == 17 || $keys == 20){
			   $skarra[0] = 8;
			   $skarra[1] = 5;
			   $skarra[2] = 14;
			   $skarra[3] = 7;
			   $skarra[4] = 16;
			   $skarra[5] = 17;
			   $skarra[6] = 20;
			 
			}
		  }   
		  
		  $sites_res_arr_res = array();
		  $one_guardsarr = array();
		  $one_l_guards = array();
		  $one_h_guards = array();
		  $one_supervisor = array();
		  $one_aso = array();
		  $one_so_num = array();
		  $one_ctotval = array();
		  $one_nallahub = array();
		  $one_hillhub = array();
		  $one_wlkt = array();
		  $one_torch = array();
		  $one_biometric = array();
		  $one_computer = array();
		  $one_internetcon = array();
		  $one_batons = array();
		  $one_stlights = array();
		  $one_bicycle = array();
		  
		  foreach($skarra as $kv){
		   if(isset($sites_res_arr[$kv])) {
		    $sites_res_arr_res[$kv] = $sitearrname1[$kv];
			}
		  }
		   $sitearrname1 = $sites_res_arr_res;  
		// }    
			 
			 
			 $farray = array();
			foreach($sitearrname1 as $kk => $res){
				if(isset($exist_Sec['sites'][$kk])) $farray[$kk] = $exist_Sec['sites'][$kk];
				if(isset($exist_Sec['guards'][$kk])) $one_guardsarr[$kk] = $exist_Sec['guards'][$kk];
				if(isset($exist_Sec['l_guards'][$kk])) $one_l_guards[$kk] = $exist_Sec['l_guards'][$kk];
				if(isset($exist_Sec['h_guards'][$kk])) $one_h_guards[$kk] = $exist_Sec['h_guards'][$kk];
				if(isset($exist_Sec['supervisors'][$kk])) $one_supervisor[$kk] = $exist_Sec['supervisors'][$kk];
				if(isset($exist_Sec['aso'][$kk])) $one_aso[$kk] = $exist_Sec['aso'][$kk];
				if(isset($exist_Sec['so_num'][$kk])) $one_so_num[$kk] = $exist_Sec['so_num'][$kk];
				if(isset($exist_Sec['ctotval'][$kk])) $one_ctotval[$kk] = $exist_Sec['ctotval'][$kk];
				if(isset($exist_Sec['nalla_gandla_hub'][$kk])) $one_nallahub[$kk] = $exist_Sec['nalla_gandla_hub'][$kk];
				if(isset($exist_Sec['hillpark_hub'][$kk])) $one_hillhub[$kk] = $exist_Sec['hillpark_hub'][$kk];
				if(isset($exist_Sec['wlkt'][$kk])) $one_wlkt[$kk] = $exist_Sec['wlkt'][$kk];
				if(isset($exist_Sec['torch'][$kk])) $one_torch[$kk] = $exist_Sec['torch'][$kk];
				if(isset($exist_Sec['biometric'][$kk])) $one_biometric[$kk] = $exist_Sec['biometric'][$kk];
				if(isset($exist_Sec['computer'][$kk])) $one_computer[$kk] = $exist_Sec['computer'][$kk];
				if(isset($exist_Sec['internetcon'][$kk])) $one_internetcon[$kk] = $exist_Sec['internetcon'][$kk];
				if(isset($exist_Sec['batons'][$kk])) $one_batons[$kk] = $exist_Sec['batons'][$kk];
				if(isset($exist_Sec['stlights'][$kk])) $one_stlights[$kk] = $exist_Sec['stlights'][$kk];
				if(isset($exist_Sec['bicycle'][$kk])) $one_bicycle[$kk] = $exist_Sec['bicycle'][$kk];
			  
			}
				
		$exist_Sec['sites'] =  $farray;
		$exist_Sec['guards'] = $one_guardsarr;
		$exist_Sec['l_guards'] = $one_l_guards;
		$exist_Sec['h_guards'] = $one_h_guards;
		$exist_Sec['supervisors'] = $one_supervisor;
		$exist_Sec['aso'] = $one_aso;
		$exist_Sec['so_num'] = $one_so_num;
		$exist_Sec['ctotval'] = $one_ctotval;
		$exist_Sec['nalla_gandla_hub'] = $one_nallahub;
		$exist_Sec['hillpark_hub'] = $one_hillhub;
		$exist_Sec['wlkt'] = $one_wlkt;
		$exist_Sec['torch'] = $one_torch;
		$exist_Sec['biometric'] = $one_biometric;
		$exist_Sec['computer'] = $one_computer;
		$exist_Sec['internetcon'] = $one_internetcon;
		$exist_Sec['batons'] = $one_batons;
		$exist_Sec['stlights'] = $one_stlights;
		$exist_Sec['bicycle'] = $one_bicycle;
		
		
		 $skarranew= array();
		//  if(Auth::user()->id == 1){
		  foreach($sitearrname2 as $keys => $site){
		    if($keys == 9 || $keys == 15 || $keys == 13 || $keys == 11 || $keys == 18 || $keys == 19 ){
			   $skarranew[0] = 9;
			   $skarranew[1] = 15;
			   $skarranew[2] = 13;
			   $skarranew[3] = 11;
			   $skarranew[4] = 18;
			   $skarranew[5] = 19;
			 
			}
		  }   
		  
		  $sites_res_arr_res2 = array();
		  
		  $two_guardsarr = array();
		  $two_l_guards = array();
		  $two_h_guards = array();
		  $two_supervisor = array();
		  $two_aso = array();
		  $two_so_num = array();
		  $two_ctotval = array();
		  $two_nallahub = array();
		  $two_hillhub = array();
		  $two_wlkt = array();
		  $two_torch = array();
		  $two_biometric = array();
		  $two_computer = array();
		  $two_internetcon = array();
		  $two_batons = array();
		  $two_stlights = array();
		  $two_bicycle = array();
		  
		  foreach($skarranew as $kv){
		     if(isset($sitearrname2[$kv])) {
		    $sites_res_arr_res2[$kv] = $sitearrname2[$kv];
			} 
		  }
		   $sitearrname2 = $sites_res_arr_res2;  
		 //}   
			 
			 $farray2 = array();
			foreach($sitearrname2 as $kk => $res){
			  if(isset($exist_SecTwo['sites'][$kk])) $farray2[$kk] = $exist_SecTwo['sites'][$kk];
			  
			  if(isset($exist_SecTwo['guards'][$kk])) $two_guardsarr[$kk] = $exist_SecTwo['guards'][$kk];
				if(isset($exist_SecTwo['l_guards'][$kk])) $two_l_guards[$kk] = $exist_SecTwo['l_guards'][$kk];
				if(isset($exist_SecTwo['h_guards'][$kk])) $two_h_guards[$kk] = $exist_SecTwo['h_guards'][$kk];
				if(isset($exist_SecTwo['supervisors'][$kk])) $two_supervisor[$kk] = $exist_SecTwo['supervisors'][$kk];
				if(isset($exist_SecTwo['aso'][$kk])) $two_aso[$kk] = $exist_SecTwo['aso'][$kk];
				if(isset($exist_SecTwo['so_num'][$kk])) $two_so_num[$kk] = $exist_SecTwo['so_num'][$kk];
				if(isset($exist_SecTwo['ctotval'][$kk])) $two_ctotval[$kk] = $exist_SecTwo['ctotval'][$kk];
				if(isset($exist_SecTwo['nalla_gandla_hub'][$kk])) $two_nallahub[$kk] = $exist_SecTwo['nalla_gandla_hub'][$kk];
				if(isset($exist_SecTwo['hillpark_hub'][$kk])) $two_hillhub[$kk] = $exist_SecTwo['hillpark_hub'][$kk];
				if(isset($exist_SecTwo['wlkt'][$kk])) $two_wlkt[$kk] = $exist_SecTwo['wlkt'][$kk];
				if(isset($exist_SecTwo['torch'][$kk])) $two_torch[$kk] = $exist_SecTwo['torch'][$kk];
				if(isset($exist_SecTwo['biometric'][$kk])) $two_biometric[$kk] = $exist_SecTwo['biometric'][$kk];
				if(isset($exist_SecTwo['computer'][$kk])) $two_computer[$kk] = $exist_SecTwo['computer'][$kk];
				if(isset($exist_SecTwo['internetcon'][$kk])) $two_internetcon[$kk] = $exist_SecTwo['internetcon'][$kk];
				if(isset($exist_SecTwo['batons'][$kk])) $two_batons[$kk] = $exist_SecTwo['batons'][$kk];
				if(isset($exist_SecTwo['stlights'][$kk])) $two_stlights[$kk] = $exist_SecTwo['stlights'][$kk];
				if(isset($exist_SecTwo['bicycle'][$kk])) $two_bicycle[$kk] = $exist_SecTwo['bicycle'][$kk];
			}
			  
		$exist_SecTwo['sites'] = $farray2;
		
			$exist_SecTwo['guards'] = $two_guardsarr;
		$exist_SecTwo['l_guards'] = $two_l_guards;
		$exist_SecTwo['h_guards'] = $two_h_guards;
		$exist_SecTwo['supervisors'] = $two_supervisor;
		$exist_SecTwo['aso'] = $two_aso;
		$exist_SecTwo['so_num'] = $two_so_num;
		$exist_SecTwo['ctotval'] = $two_ctotval;
		$exist_SecTwo['nalla_gandla_hub'] = $two_nallahub;
		$exist_SecTwo['hillpark_hub'] = $two_hillhub;
		$exist_SecTwo['wlkt'] = $two_wlkt;
		$exist_SecTwo['torch'] = $two_torch;
		$exist_SecTwo['biometric'] = $two_biometric;
		$exist_SecTwo['computer'] = $two_computer;
		$exist_SecTwo['internetcon'] = $two_internetcon;
		$exist_SecTwo['batons'] = $two_batons;
		$exist_SecTwo['stlights'] = $two_stlights;
		$exist_SecTwo['bicycle'] = $two_bicycle;
			
		$exist_Sec_Secu = $exist_Sec;
		$exist_SecTwo_Secu = $exist_SecTwo;
			
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
		      $securepcn = 2;
		    $pdf = PDF::loadView('misprints.missecurityoneprint', $relations);  
		    $pdf->save(storage_path('/pdffiles/missecurityoneprint.pdf')); 
			  
			  // END SECURITY
			  
			  
			  
			  		
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
			 
			 
			 			   $exist_Sec = array();
			 foreach($sitenames as $kk => $siten){
			     $matchfields = ['month' => $segment4, 'year' => $segment3, 'site'=>$kk];
				 $formfieldarray_cn = \App\Trafficmisreport::where($matchfields)->count();
				 if($formfieldarray_cn > 0){
				    $fieldarr = \App\Trafficmisreport::where($matchfields)->first();
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
		   
		    $dateString = $segment3.'-'.$segment4.'-04';
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		
		
		 $exist_Sec = array();
			 foreach($siteattrname as $kk => $siten){
			     $matchfields = ['reporton' => $lastDateOfMonth, 'site'=>$kk];
				 	
				 $formfieldarray_cn = \App\Securitydailyreport::where($matchfields)->count();
				 if($formfieldarray_cn > 0){
				    $fieldarr = \App\Securitydailyreport::where($matchfields)->first();
					 $exist_Sec['sites'][$fieldarr->site] = get_sitename($fieldarr->site);
					 $exist_Sec['resident_vehicle'][$fieldarr->site] = $fieldarr->tr_resident_vehicle;
					 $exist_Sec['temp_vendors'][$fieldarr->site] = $fieldarr->tr_temp_vendors;
					 $exist_Sec['courier_delivery'][$fieldarr->site] = $fieldarr->tr_courier_delivery;
					 $exist_Sec['visitors'][$fieldarr->site] = $fieldarr->tr_visitors;
					 $exist_Sec['construc_team'][$fieldarr->site] = $fieldarr->tr_construction;
					 $exist_Sec['interworks_inflats'][$fieldarr->site] = $fieldarr->tr_inter_works;
					 $exist_Sec['interior_works_per_day'][$fieldarr->site] = $fieldarr->tr_interior_works_perday;  
					 $exist_Sec['ctotval'][$fieldarr->site] = (float)$fieldarr->tr_resident_vehicle + (float)$fieldarr->tr_temp_vendors + (float)$fieldarr->tr_courier_delivery + (float)$fieldarr->tr_visitors + (float)$fieldarr->tr_construction + (float)$fieldarr->tr_inter_works + (float)$fieldarr->tr_interior_works_perday;
				 }
				 
				 else{
				   $exist_Sec['sites'][$kk] = get_sitename($kk);
					 $exist_Sec['resident_vehicle'][$kk] = "";
					 $exist_Sec['temp_vendors'][$kk] = "";
					 $exist_Sec['courier_delivery'][$kk] = "";
					 $exist_Sec['visitors'][$kk] = "";
					 $exist_Sec['construc_team'][$kk] = "";
					 $exist_Sec['interworks_inflats'][$kk] = "";
					 $exist_Sec['interior_works_per_day'][$kk] = "";
					 $exist_Sec['ctotval'][$kk] = 0; 
				 
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
		  
		$trafficpcn = 1;
		$pdf = PDF::loadView('misprints.mistrafficprint', $relations);
		$pdf->setPaper('A4', 'landscape');
		$pdf->save(storage_path('/pdffiles/mistrafficprint.pdf')); 
			  
			  
			  
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		   
		  }else{ 

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
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
		  
		  
		   $skarra= array();
		 // if(Auth::user()->id == 1){
		  foreach($siteattrname as $keys => $site){
		    if($keys == 9 || $keys == 15 || $keys == 13 || $keys == 11 || $keys == 19 || $keys == 18 || $keys == 8 || $keys == 5 || $keys == 14 || $keys == 7 || $keys == 20){
			   $skarra[0] = 9;
			   $skarra[1] = 15;
			   $skarra[2] = 13;
			   $skarra[3] = 11;
			   $skarra[4] = 19;
			   $skarra[5] = 18;
			   $skarra[6] = 8;
			   $skarra[7] = 5;
			   $skarra[8] = 14;
			   $skarra[9] = 7; 
			   $skarra[10] = 20;          
			}
		  }   
		  
		  $sites_res_arr_res = array();
		  foreach($skarra as $kv){
		   if(isset($sites_res_arr[$kv])) {
		    $sites_res_arr_res[$kv] = $siteattrname[$kv];
			}
		  }
		   $siteattrname = $sites_res_arr_res;  
		/// }    
		
		
			
        foreach($siteattrname as $dep => $deploy){
		   $deppmatchfields = ['site' => $dep];
		   $deprescn = \App\Pmsdailyreportvalidation::where($deppmatchfields)->count();
		   if($deprescn > 0){
		   		$depresult = \App\Pmsdailyreportvalidation::where($deppmatchfields)->first();
				//$deployment['deployment'][$dep] = (float)$depresult['house_sup'] + (float)$depresult['house_help'] + (float)$depresult['clu_hs_fo'] +  (float)$depresult['clu_hs_hk'] +  (float)$depresult['other'];
				$deployment['deployment'][$dep] =  (float)$depresult['house_help'] +  (float)$depresult['clu_hs_hk'];
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
		  $housekppcn = 1;
		   
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		   
		  }else{ 

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
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
				$deployment['deployment'][$dep] =  (float)$depresult['house_help'] +  (float)$depresult['clu_hs_hk'];
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
		  
		   $skarra= array();
		   $siteattrnamenew = $siteattrname;
		   
		//  if(Auth::user()->id == 1){
		  $siteattrnamenew = array();
		  foreach($siteattrname as $keys => $site){
		    if($keys == 9 || $keys == 15 || $keys == 13 || $keys == 11 || $keys == 19 || $keys == 18 || $keys == 8 || $keys == 5 || $keys == 14 || $keys == 7 || $keys == 20){
			   $skarra[0] = 9;
			   $skarra[1] = 15;
			   $skarra[2] = 13;
			   $skarra[3] = 11;
			   $skarra[4] = 19;
			   $skarra[5] = 18;
			   $skarra[6] = 8;
			   $skarra[7] = 5;
			   $skarra[8] = 14;
			   $skarra[9] = 7;     
			   $skarra[10] = 20;           
			}
		  }   
		  
		  $sites_res_arr_res = array();
		  foreach($skarra as $kv){
		   if(isset($sites_res_arr[$kv])) {
		    $sites_res_arr_res[$kv] = $siteattrname[$kv];
			}
		  }
		   $siteattrnamenew = $sites_res_arr_res;  
		// } 
		  
		 
		 
		    
		  foreach($siteattrnamenew as $sk => $sitena){
		  
		    $matchhuskpfields = ['month' => $segment4, 'year' => $segment3, 'site' => $sk];
			 $hsk_count = \App\Horticulturemisreport::where($matchhuskpfields)->count();
			 if($hsk_count > 0){
			 	$hsk_arr = \App\Horticulturemisreport::where($matchhuskpfields)->first();
				
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
		  
		  
		    $skarra= array();
			$siteattrnamenew_one =  $siteattrname;
		   $siteattrnamenew_one = array();
		  //if(Auth::user()->id == 1){
		   $siteattrnamenew_one = array();
		  foreach($siteattrname as $keys => $site){
		    if($keys == 9 || $keys == 15 || $keys == 13 || $keys == 11 || $keys == 19 || $keys == 20 ){
			   $skarra[0] = 9;
			   $skarra[1] = 15;
			   $skarra[2] = 13;
			   $skarra[3] = 11;
			   $skarra[4] = 19;
			   $skarra[5] = 20;
			}
		  }   
		  
		  $sites_res_arr_res = array();
		  foreach($skarra as $kv){
		  if(isset($sites_res_arr[$kv])) {
		    $sites_res_arr_res[$kv] = $siteattrname[$kv];
			}
		  }
		   $siteattrnamenew_one = $sites_res_arr_res;  
		 
		 // }
		   foreach($siteattrnamenew_one as $sk => $sitena){
		  
		    $matchhuskpfields = ['month' => $segment4, 'year' => $segment3, 'site' => $sk];
			 if($sk == 9 || $sk == 15 || $sk == 13 || $sk == 11 || $sk ==19) {
			 
			    
				 $existing_records_two['sites'][$sk] = get_sitename($sk);
			 $hsk_count = \App\Horticulturemisreport::where($matchhuskpfields)->count();
			 if($hsk_count > 0){
			 	$hsk_arr = \App\Horticulturemisreport::where($matchhuskpfields)->first();
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
				 }
				 }
				 
				$skarra= array();
				$siteattrnamenew_two =  $siteattrname;
				//if(Auth::user()->id == 1){
				$siteattrnamenew_two = array();
				foreach($siteattrname as $keys => $site){
				 if($keys == 18 || $keys == 8 || $keys == 5 || $keys == 14 || $keys == 7){
					$skarra[0] = 18;
					$skarra[1] = 8;
					$skarra[2] = 5;
					$skarra[3] = 14;
					$skarra[4] = 7;
				}  
				} 
				
				$sites_res_arr_res = array();
				foreach($skarra as $kv){
				$sites_res_arr_res[$kv] = $siteattrname[$kv];
				}
				$siteattrnamenew_two = $sites_res_arr_res;  
			//	}
				
		     foreach($siteattrnamenew_two as $sk => $sitena){
		  
		    $matchhuskpfields = ['month' => $segment4, 'year' => $segment3, 'site' => $sk];
			 if($sk == 18 || $sk == 8 || $sk == 5 || $sk == 14 || $sk ==7) {
			 
			 
				 $existing_records_three['sites'][$sk] = get_sitename($sk);
				  $hsk_count = \App\Horticulturemisreport::where($matchhuskpfields)->count();
			 if($hsk_count > 0){
			 	$hsk_arr = \App\Horticulturemisreport::where($matchhuskpfields)->first();
				
				
				
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
			'sites' => $siteattrnamenew,
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
				  
				  $horticulpcn = 5;
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
		$avg_swimpool_per_res = array();
		$avg_gym_per_res = array();
		$avg_occupan_res = array();
		$swimpool_res_Arr = array();
		$gym_res_Arr = array();
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
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
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
   $skarra= array();
		 // if(Auth::user()->id == 1){
		  foreach($siteattrname as $keys => $site){
		    if($keys == 9 || $keys == 15 || $keys == 13 || $keys == 11 || $keys == 19 || $keys == 18 || $keys == 8 || $keys == 5 || $keys == 14 || $keys == 7 || $keys == 20){
			   $skarra[0] = 9;
			   $skarra[1] = 15;
			   $skarra[2] = 13;
			   $skarra[3] = 11;
			   $skarra[4] = 19;
			   $skarra[5] = 18;
			   $skarra[6] = 8;   
			   $skarra[7] = 5;   
			   $skarra[8] = 14;  
			   $skarra[9] = 7; 
			   $skarra[10] = 20;         
			}
		  }  
		  
		
		  $sites_res_arr = $siteattrname;
		  $sites_res_arr_res = array();
		  foreach($skarra as $kv){
		   if(isset($sites_res_arr[$kv])) {
		    $sites_res_arr_res[$kv] = $siteattrname[$kv];
			}
		  }
		   $siteattrname = $sites_res_arr_res;  
	//	 }     		  
		     
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
				 
				 
				$stdate = $dateString;
				$endate = $reporton;
				$getavg_info_count = \App\Pmsdailyreport::where('reporton','>=',$stdate)->where('reporton','<=',$endate)->where('site','=',$site)->count();
				$swimpool = 0;
				$gym = 0;
				if($getavg_info_count > 0){
				$getavg_info_res = \App\Pmsdailyreport::where('reporton','>=',$stdate)->where('reporton','<=',$endate)->where('site','=',$site)->get();
				
				foreach($getavg_info_res as $rowres){
				$swimpool += (float)$rowres->clbhous_users_pool;
				$gym += (float)$rowres->clbhous_users_gym;
				}
				}
				$day_cn=cal_days_in_month(CAL_GREGORIAN,$month,$year);
				
				
				$avg_gym = round((float)($gym/$day_cn));
				$avg_swimpool = round((float)($swimpool/$day_cn));
				$av_occ = round((float)(($owners + $tenents)/2));
				$avg_swimpool_per = 0;
				$avg_gym_per = 0;
				if($av_occ > 0){
				$avg_swimpool_per = round(($avg_swimpool * 100)/($av_occ));
				$avg_gym_per = round(($avg_gym * 100)/($av_occ));
				}
				 
				$avg_swimpool_per_res[$kk] = $avg_swimpool_per;
				$avg_gym_per_res[$kk] = $avg_gym_per;
				$avg_occupan_res[$kk] = $av_occ;
				$swimpool_res_Arr[$kk] = $avg_swimpool;
				$gym_res_Arr[$kk] = $avg_gym;
				$pow[$kk] = $prev_owners ;
				$pte[$kk] = $prev_tenents ;
				
			    $powcur[$kk] = $cur_owners ;
				$ptecur[$kk] = $cur_tenents ;
				
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
			'swimpoll_per' => $avg_swimpool_per_res,
			'gym_per' => $avg_gym_per_res,
			'avgoccuapncy' => $avg_occupan_res,
			'swimpoll_res' => $swimpool_res_Arr,
			'gym_res' => $gym_res_Arr,
			];     
		
		// return view('misprints.clubhouseprint', $relations);
		
		$clubhspcn = 1;
		 
		 $pdf = PDF::loadView('misprints.clubhouseprint', $relations);
		 $pdf->setPaper('A4', 'landscape');

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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
			
		  }
		  
		  $sitenames_val = $siteattrname;
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
			
	  	
			$skarra= array();
		//  if(Auth::user()->id == 1){
		  foreach($siteattrname as $keys => $site){
		    if($keys == 9 || $keys == 15 || $keys == 13 || $keys == 11 || $keys == 19 || $keys == 18 || $keys == 8 || $keys == 5 || $keys == 14 || $keys == 7 || $keys == 16 || $keys == 20){
			   $skarra[0] = 9;
			   $skarra[1] = 15;
			   $skarra[2] = 13;
			   $skarra[3] = 11;
			   $skarra[4] = 19;
			   $skarra[5] = 18;
			   $skarra[6] = 8;
			   $skarra[7] = 5;
			   $skarra[8] = 14;
			   $skarra[9] = 7;
			   $skarra[10] = 16;
			   $skarra[11] = 20;
			}
		  } 
		  
		   $sites_res_arr = $siteattrname;
		  $sites_res_arr_res = array();
		  foreach($skarra as $kv){
		   if(isset($sites_res_arr[$kv])) {
		    $sites_res_arr_res[$kv] = $siteattrname[$kv];
			}
		  }
		   $siteattrname = $sites_res_arr_res;  
		   
		 
		   
		 
		// }  

		

		 foreach($siteattrname as $kk => $siter){
			 
				$dateString = $segment3.'-'.$segment4.'-01';
				//Last date of current month.
				$lastDateOfMonth = date("t", strtotime($dateString));
				 $reporton = $lastDateOfMonth."-".$segment4."-".$segment3;
				$reporton = $segment3."-".$segment4."-".$lastDateOfMonth;
			
				$occupanymatch_fileds = ['reporton' => $reporton, 'site' => $kk]; 
				
				 $occres_cn = \App\Pmsdailyreport::where($occupanymatch_fileds)->count(); 
				if($occres_cn > 0){
				$occres_res = \App\Pmsdailyreport::where($occupanymatch_fileds)->first();
				
				$existing_records[$kk] = array("owners"=>$occres_res->occupancy_asdate_owners,"tenants"=>$occres_res->occupancy_asdate_tenants,"vacant"=>$occres_res->occupancy_asdate_vacant);
				} 
				else{
				   $existing_records[$kk] = array("owners"=>"0","tenants"=>"0","vacant"=>"0");
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
			 
	 		
			 // return view('misprints.occupancyprint', $relations);
			 
		$occupencypcn = 1;
		
				$pdf = PDF::loadView('misprints.occupancyprint', $relations);
				$pdf->setPaper('A4', 'landscape');
				$pdf->save(storage_path('/pdffiles/some-filename.pdf')); 
			
			
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
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
				 
				
			 }  
			 
			 }
			 
			 $indentrep_Array = array();
			 $lagged_date = array();
			 $Recordcount =  array();
			 foreach($siteattrname as $stk => $siten) {
			 
			  $match_in_fields = ['month' => $segment4, 'year' => $segment3, 'site' =>$stk]; 
			  $match_in_count = \App\Indentedmisreport::where($match_in_fields)->count();
		
		       if($match_in_count > 0){
			   	    $match_in_array = \App\Indentedmisreport::where($match_in_fields)->get();
					$match_lag_array = \App\Indentedmisreport::where($match_in_fields)->first();
					
					$indentrep_Array[$stk] = $match_in_array;
					$lagged_date[$stk] = $match_lag_array->laggeddate;
					$Recordcount[$stk] = $match_in_count;
			   }
			   else{
			       $indentrep_Array[$stk] = array();
				   $Recordcount[$stk] = 0;
			   }
			   
			   
			 }
			  // echo "<pre>"; print_r($indentrep_Array);echo "</pre>"; exit;
			 //exit;
			asort($Recordcount); 
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
			'recordcount' => $Recordcount,
			];   
			
		     
			  $indentrep_issue_Count = 0;
			  foreach ($indentrep_Array as $k => $indrec){
					 if (count($indrec) > 0){
					    $indentrep_issue_Count = $indentrep_issue_Count + 1;
					 }
					 }

		 // return view('misfiles.view.materialindented', $relations);
		
		 
		
		// return view('misprints.materialindented', $relations);
		   
		    $pdf = PDF::loadView('misprints.materialindented', $relations);
			$pdf->setPaper('A4', 'landscape'); 
		 	$pdf->save(storage_path('/pdffiles/materialindented.pdf')); 
			$materialpcn = 0;
			if($indentrep_issue_Count > 0) {
			   $matrial = new \Imagick();
           $matrial->pingImage(storage_path() . '/pdffiles/materialindented.pdf');
           $materialpcn =  $matrial->getNumberImages(); 
		   }
			
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
		 $apnarecord = array();
		$reportdate_val = "";
		$dateString = $segment3.'-'.$segment4.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$segment4."-".$segment3;

	      if(Auth::user()->id == 1){
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
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
			 
			 }
			 
			 $apnarow_count = array();
			 $indentrep_Array = array();
			 $lagged_date = array();
			 $apnarecord = array();
			 foreach($siteattrname as $stk => $siten) {
			 
			  $match_in_fields = ['month' => $segment4, 'year' => $segment3, 'site' =>$stk]; 
			  $match_in_count = \App\Apnacomplaintmisreport::where($match_in_fields)->count();
		
		       if($match_in_count > 0){
			   	    $match_in_array = \App\Apnacomplaintmisreport::where($match_in_fields)->get();
					
					$indentrep_Array[$stk] = $match_in_array;
					$apnarecord[$stk] = $match_in_count;
			   }
			   else{
			       $indentrep_Array[$stk] = array();
				    $apnarecord[$stk] = 0;
			   }
			   
			   
			 }
			 //exit; 
			
			
			 if(count($apnarecord) > 0){
			asort($apnarecord);
			}
			// asort($apnarecord);
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
			'recordcount' => $apnarecord,
			];   
			
			$apna_issue_Count = 0; 
			
			  foreach ($indentrep_Array as $k => $indrec){
					 if (count($indrec) > 0){
					    $apna_issue_Count = $apna_issue_Count + 1;
					 }
					 }    
		
		// return view('misprints.apnacomplex', $relations);
		
		$apnaplcn = 0;
			if($apna_issue_Count > 0) {
			   $apna = new \Imagick();
           $apna->pingImage(storage_path() . '/pdffiles/apnacomplex.pdf');
           $apnaplcn =  $apna->getNumberImages(); 
		   }
		 
		   
		$pdf = PDF::loadView('misprints.apnacomplex', $relations);
		//$pdf->setPaper('A4', 'landscape'); 
		$pdf->save(storage_path('/pdffiles/apnacomplex.pdf')); 
		
		  
		
		// MOCK DRILL
		
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
			
		  }
		  $existing_records = array();  
		  
			 $indentrep_Array = array();
			 $lagged_date = array();
			 foreach($siteattrname as $stk => $siten) {
			 
			  $match_in_fields = ['month' => $segment4, 'year' => $segment3, 'site' =>$stk]; 
			  $match_in_count = \App\Mockdrillmisreport::where($match_in_fields)->count();
		
		       if($match_in_count > 0){
			   	    $match_in_array = \App\Mockdrillmisreport::where($match_in_fields)->get();
					
					$indentrep_Array[$stk] = $match_in_array;
			   }
			   else{
			       $indentrep_Array[$stk] = array();
			   }
			   
			   
			 }
			 
			$fdrillcount = count($indentrep_Array);
			
			$relations = [
			'res' => $formfieldarray,  
			'sites' => $sitenames,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			'drill' => $indentrep_Array,
			];   
			
			$pdf = PDF::loadView('misprints.mismockdrillprint', $relations);
		    $pdf->save(storage_path('/pdffiles/mismockdrillprint.pdf')); 		
			
			//$im = new Imagick();
			
		   ///////////////////////GET PDF PAGES COUNT
		   $mockpagecount = 0;
		   if($fdrillcount > 0) {
		   $im = new \Imagick();
           $im->pingImage(storage_path() . '/pdffiles/mismockdrillprint.pdf');
           $mockpagecount =  $im->getNumberImages(); 
		   }
		   
		   
		   // FIRE PREAPRE
		
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
			
		  }
		  $existing_records = array();  
		  
			 $indentrep_Array = array();
			 $lagged_date = array();
			 foreach($siteattrname as $stk => $siten) {
			 
			  $match_in_fields = ['month' => $segment4, 'year' => $segment3, 'site' =>$stk]; 
			  $match_in_count = \App\Firepreparemisreport::where($match_in_fields)->count();
		
		       if($match_in_count > 0){
			   	    $match_in_array = \App\Firepreparemisreport::where($match_in_fields)->get();
					
					$indentrep_Array[$stk] = $match_in_array;
			   }
			   else{
			       $indentrep_Array[$stk] = array();
			   }
			   
			   
			 }
			 
			$ffirecount = count($indentrep_Array);
			
			$relations = [
			'res' => $formfieldarray,  
			'sites' => $sitenames,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			'drill' => $indentrep_Array,
			];   
			
			$pdf = PDF::loadView('misprints.misfireprepareprint', $relations);
		    $pdf->save(storage_path('/pdffiles/misfireprepareprint.pdf')); 		
			
			//$im = new Imagick();
			
		   ///////////////////////GET PDF PAGES COUNT
		   $preparepagecount = 0;
		   if($ffirecount > 0) {
		   $im = new \Imagick();
           $im->pingImage(storage_path() . '/pdffiles/misfireprepareprint.pdf');
           $preparepagecount =  $im->getNumberImages(); 
		   }
		   
		   
		   
		   
		   
			/*echo "METRO".$metro."<br/>";
			echo "consump".$waterpcn."<br/>";
			echo "borewell".$borewellpcn."<br/>";
			echo "fire".$firesafepcn."<br/>";
			echo "electro".$wqupmentcn."<br/>";
			echo "stp".$stppcn."<br/>"; 
			echo "wsp".$wsppcn."<br/>";
			echo "cmd".$cmdpcn."<br/>";
			echo "security".$securepcn."<br/>";
			echo "traffic".$trafficpcn."<br/>";
			echo "housekp".$housekppcn."<br/>";
			echo "horticul".$horticulpcn."<br/>";
			echo "clubhouse".$clubhspcn."<br/>";
			echo "occupancy".$occupencypcn."<br/>";
			echo "indented".$materialpcn."<br/>";
			echo "apna".$apnaplcn."<br/>";
			echo "mockdrill".$mockpagecount."<br/>"; 
			
			
			
			
			
			exit; */
			
			$relations3 = [
			'metro' => $metro,  
			'waterpcn' => $waterpcn,
			'borewellpcn' => $borewellpcn,
			'firesafepcn' => $firesafepcn,
			'wqupmentcn' => $wqupmentcn,
			'stppcn' => $stppcn,
			'wsppcn' => $wsppcn,
			'cmdpcn' => $cmdpcn,
			'securepcn' => $securepcn,
			'trafficpcn' => $trafficpcn,
			'housekppcn' => $housekppcn,
			'horticulpcn' => $horticulpcn,
			'clubhspcn' => $clubhspcn,
			'occupencypcn' => $occupencypcn,
			'materialpcn' => $materialpcn,
			'apnaplcn' => $apnaplcn,
			'mockpagecount' => $mockpagecount,
			'preparepagecount' => $preparepagecount,
			];   
			
			
				   
				   
				 $pdf = PDF::loadView('misprints.startpage', $relations2);
		
				$pdf->save(storage_path('/pdffiles/startpage.pdf')); 
		
		        $pdf = PDF::loadView('misprints.indexpage', $relations3);
		
				$pdf->save(storage_path('/pdffiles/indexpage.pdf')); 
				   
		   
		   
		   
			
		/////////////////////// END GET PDF PAGES COUNT		
				//$pdf->save(storage_path('/pdffiles/some-filename11.pdf')); 
				
				$pdfFilestartPath = storage_path() . '/pdffiles/startpage.pdf';
				$pdfFileindexPath = storage_path() . '/pdffiles/indexpage.pdf';
				
				$pdfFile2Path = storage_path() . '/pdffiles/some-filename.pdf';
				$pdfFile1Path = storage_path() . '/pdffiles/some-filename11.pdf';
				$pdfFile3Path = storage_path() . '/pdffiles/water-consumption.pdf';
				$pdfFile4Path = storage_path() . '/pdffiles/borewellnotworking.pdf';
				$pdfFile5Path = storage_path() . '/pdffiles/firesafe.pdf';
				//$pdfFile5Path = $pathForTheMergedPdf_fire_firesafe;
				
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
				
				
				//$pdfFile17Path = storage_path() . '/pdffiles/firenocrenewal.pdf';
				
				$pdfFile17Path = storage_path() . '/pdffiles/nocdataprint.pdf';
				$pdfFile18Path = storage_path() . '/pdffiles/nocdataprintbkp.pdf';
				$pdfFile19Path = storage_path() . '/pdffiles/cmdprintnew.pdf';
				$pdfFile20Path = storage_path() . '/pdffiles/mismockdrillprint.pdf';
				$pdfFile21Path = storage_path() . '/pdffiles/misfireprepareprint.pdf';
				
					
				$pdf = new \PDFMerger();
				
				//ss//$pdf->addPDF($pdfFilestartPath, 'all');
				//ss//$pdf->addPDF($pdfFileindexPath, 'all');
				$pdf->addPDF($pdfFile1Path, 'all');
				$pdf->addPDF($pdfFile3Path, 'all');  
				$pdf->addPDF($pdfFile4Path, 'all');   
				if(count($firesafe_final_Count) > 0) { $pdf->addPDF($pdfFile5Path, 'all'); }  
				if((int)$nocCount > 0) { $pdf->addPDF($pdfFile17Path, 'all'); }  
				if((int)$nocCount > 0) { $pdf->addPDF($pdfFile18Path, 'all'); }  
			 	if(count($Equipment_mechanical_Count) > 0) { $pdf->addPDF($pdfFile6Path, 'all'); }		
				if(count($stp_issue_Count) > 0) { $pdf->addPDF($pdfFile7Path, 'all'); }
				$pdf->addPDF($pdfFile19Path, 'all'); 
				if(count($wsp_issue_Count) > 0) { $pdf->addPDF($pdfFile8Path, 'all');  }
				//$pdf->addPDF($pdfFile19Path, 'all'); 
				if(isset($exist_Sec_Secu['sites']) || isset($exist_SecTwo_Secu['sites'])) { $pdf->addPDF($pdfFile9Path, 'all');  }
				$pdf->addPDF($pdfFile16Path, 'all'); 
				$pdf->addPDF($pdfFile10Path, 'all'); 
				$pdf->addPDF($pdfFile11Path, 'all');
				$pdf->addPDF($pdfFile12Path, 'all');
				$pdf->addPDF($pdfFile2Path, 'all');
				if((int)$indentrep_issue_Count > 0) { $pdf->addPDF($pdfFile13Path, 'all');  }
				if((int)$apna_issue_Count > 0) { $pdf->addPDF($pdfFile14Path, 'all');  } 
				if((int)$fdrillcount > 0) { $pdf->addPDF($pdfFile20Path, 'all');  }  
				if((int)$ffirecount > 0) { $pdf->addPDF($pdfFile21Path, 'all');  }  
				 
				
				
				$pathForTheMergedPdf = storage_path() . "/pdffiles/result.pdf";
				
				$dwnfilename = date("F", mktime(0, 0, 0, $segment4, 10))."-".$segment3.".pdf";	
				 
				$pdf->merge('download', $dwnfilename);
				
			  
  
        		 // return $pdf->download('occupancy.pdf'); //Download      
		  
		    // return view('misprints.occupancyprint', $relations);
		
		
		
	 
		
  
    }
	
	
	
	
 public function downloadoverallmisindex(Request $request)

    {
	ini_set('max_execution_time', 300);
	ini_set('memory_limit', '256M');
	
		$metro = 1;
		$waterpcn = 2;
		$borewellpcn = 3;
	
		$segment1 = Request::segment(1); 
		$segment2 = Request::segment(2);
		$segment3 = Request::segment(3);
		$segment4 = Request::segment(4);
		$segment3 = Request::segment(2);
		$segment4 = Request::segment(3);
		$segment5 = Request::segment(4);
		
		
		//echo $segment3;
		//echo $segment4;
		
		
		
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
		   $sites_res_arr =\App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');  
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			 $sites_res_arr =\App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');  
			$borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
			
		  }
		 
		 
		 
		
		   $skarra= array();
		 // if(Auth::user()->id == 1){
		  foreach($siteattrname as $keys => $site){
		    if($keys == 9 || $keys == 15 || $keys == 13 || $keys == 11 || $keys == 18 || $keys == 5 || $keys == 7 || $keys == 20){
			   $skarra[0] = 9;
			   $skarra[1] = 15;
			   $skarra[2] = 13;
			   $skarra[3] = 11;
			   $skarra[4] = 18;
			   $skarra[5] = 5;
			   $skarra[6] = 7;   
			   $skarra[7] = 20;        
			}
		  }  
		  
		  
		  
		  $sites_res_arr_res = array();
		  foreach($skarra as $kv){
		   if(isset($sites_res_arr[$kv])) {
		    $sites_res_arr_res[$kv] = $siteattrname[$kv];
			}
		  }
		   $siteattrname = $sites_res_arr_res;  
		// }  
		
		
		
		/*	echo "<pre>";
			  print_r($siteattrname);
			echo "</pre>";
		
		
		exit; */
		
		
		
		   $sitearrnew = array();
		  foreach( $siteattrname as $kkk => $site){
		     $sitearrnew[]=$kkk;
		  }
		  

		
		$matchfields = ['month' => $segment4, 'year' => $segment3]; 
		
	
		if(Auth::user()->id == 1){
		$res_count = \App\Firesafetymisreport::whereIn('site', $sitearrnew)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Firesafetymisreport::whereIn('site', $sitearrnew)->where($matchfields)->get();
		}
		
		}
		else
		{
		  $res_count = \App\Firesafetymisreport::whereIn('site', $sitearrnew)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Firesafetymisreport::whereIn('site', $sitearrnew)->where($matchfields)->get();
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
		  $misprevresult = array();
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
			
			
				if($segment4 == 1){
			  $prev_mon = 12;
			  $prev_year = $segment3 - 1;
 			}
			else{
			  $prev_mon = $segment4 - 1;;
			  $prev_year = $segment3;
			}
			
			$mismatchprevfields = ['month' => $prev_mon, 'year' => $prev_year, 'site' =>$skey]; 
			$misprevmatchcount = \App\Firesafetymisreport::where($mismatchprevfields)->count();
			
			if($misprevmatchcount > 0){
				 $mismatch_prev_ress = \App\Firesafetymisreport::where($mismatchprevfields)->first();
				 $misprevresult[$skey] = $mismatch_prev_ress;
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
			   //$ref_record_temp_val = \App\Firesafenotworkingissue::where($matchreffields)->get();
			    $ref_record_temp_val = \App\Firesafenotworkingissue::where($matchreffields)->orderBy('category', 'asc')->get();
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
		     
			
		
			
			$farray = array();
			foreach($siteattrname as $kk => $res){
			  if(isset($issuecount[$kk])) $farray[$kk] = $issuecount[$kk];
			}
		
			
		$issuecount = $farray;
		
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
			 'misprevious' => $misprevresult,
			'issuetemp' => $ref_overall_temp,
			
			];   
			
		
				 $fi = 0;	
          			  if (count($issuecount) > 0) {
			      $mc = 0;$issuet = array();
				    $fi = 0;
                        foreach ($issuecount as $ikey => $issuecn) {
						$mc = $mc + 1;
						$fi = $fi + 1;
							$relations = [
								'ikey' => $ikey,  
								'sites' => $siteattrname,
								'issuecn' => $issuecn,
								'report_on' => $reportdate_val,
								'report_year' => $segment3,
								'report_month' => $segment4,
								'issues' => $ref_overall, 
								'issuecount' => $issuecount,
								'validation' => $ref_total, 
								'misres' => $misresult, 
								 'misprevious' => $misprevresult,
								'issuetemp' => $ref_overall_temp,
							];  
						  
						  if($issuecn > 5) {
						   $fi = $fi + 1;
						       $issuet[$ikey] = $ikey;
						       	$relations = [
								'ikey' => $ikey,  
								'sites' => $siteattrname,
								'issuecn' => $issuecn,
								'report_on' => $reportdate_val,
								'report_year' => $segment3,
								'report_month' => $segment4,
								'issues' => $ref_overall, 
								'issuecount' => $issuecount,
								'validation' => $ref_total, 
								'misres' => $misresult, 
								 'misprevious' => $misprevresult,
								'issuetemp' => $ref_overall_temp,
							];  
							 
						  } else
						  {
						   if($issuecn > 0){
						     $fi = $fi + 1;
						 
						  $issuet[$ikey] = $ikey;
						    
							 	$relations = [
								'ikey' => $ikey,  
								'sites' => $siteattrname,
								'issuecn' => $issuecn,
								'report_on' => $reportdate_val,
								'report_year' => $segment3,
								'report_month' => $segment4,
								'issues' => $ref_overall, 
								'issuecount' => $issuecount,
								'validation' => $ref_total, 
								'misres' => $misresult, 
								 'misprevious' => $misprevresult,
								'issuetemp' => $ref_overall_temp,
							];  
							
						    
						  }
						  }
						  
						}  
						
						}
						
						  $firesafepcn = $fi;
						 
						
		  
		  // FIRE NOC
		  
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
		$noc_f_res = array();
		$sarovar_fr = array();
		$cyber_fr = array();
		$aura_fr = array();
		$hill_aven_fr = array();
		$hill_lake_fr = array();
		$sarovargran_fr = array();
		$twrs_fr = array();
		 foreach($siteattrname as $kk =>$siteat) {
		 $matchfields_fornoc = ['valid_month' => $segment4, 'valid_year' => $segment3, 'site' =>$kk]; 
		 $resnoc_count = \App\Blocknocmonthreport::where($matchfields_fornoc)->count();
		 if($resnoc_count > 0){
		     $resnoc_cres = \App\Blocknocmonthreport::where($matchfields_fornoc)->get();
		    $noc_f_res[$kk] = $resnoc_cres;
			if($kk == 9) {$sarovar_fr =  $noc_f_res[$kk];}
			   if($kk == 13) {$cyber_fr =  $noc_f_res[$kk];}
			   if($kk == 11) {$aura_fr =  $noc_f_res[$kk];}
			   if($kk == 10) {$hill_aven_fr =  $noc_f_res[$kk];}
			    if($kk == 5) {$hill_lake_fr =  $noc_f_res[$kk];}
			    if($kk == 18) {$twrs_fr =  $noc_f_res[$kk];}
				 if($kk == 15) {$sarovargran_fr =  $noc_f_res[$kk];}
		 }
		   else{
		     $matchfields_f = ['site' => $kk]; 
			  $firenocdata_month_res_cn = \App\Blocknocmonthreport::where($matchfields_f)->orderBy('valid_month', 'desc')->count();
			  if($firenocdata_month_res_cn > 0) {
		     $firenocdata_month_res_emp = \App\Blocknocmonthreport::where($matchfields_f)->orderBy('valid_month', 'desc')->first();
			 $matchfields_fornoc = ['valid_month' => $firenocdata_month_res_emp->valid_month, 'valid_year' => $segment3, 'site' =>$kk];
		      $resnoc_cres = \App\Blocknocmonthreport::where($matchfields_fornoc)->get();
			  $noc_f_res[$kk] = $resnoc_cres;
			   if($kk == 9) {$sarovar_fr =  $noc_f_res[$kk];}
			   if($kk == 13) {$cyber_fr =  $noc_f_res[$kk];}
			   if($kk == 11) {$aura_fr =  $noc_f_res[$kk];}
			   if($kk == 10) {$hill_aven_fr =  $noc_f_res[$kk];}
			    if($kk == 5) {$hill_lake_fr =  $noc_f_res[$kk];}
			    if($kk == 18) {$twrs_fr =  $noc_f_res[$kk];}
				 if($kk == 15) {$sarovargran_fr =  $noc_f_res[$kk];}
			  }else{
			  
			  $noc_f_res[$kk] = array();  	
			   if($kk == 9) {$sarovar_fr =  $noc_f_res[$kk];}
			   if($kk == 13) {$cyber_fr =  $noc_f_res[$kk];}
			   if($kk == 11) {$aura_fr =  $noc_f_res[$kk];}
			   if($kk == 10) {$hill_aven_fr =  $noc_f_res[$kk];}
			    if($kk == 5) {$hill_lake_fr =  $noc_f_res[$kk];}
			    if($kk == 18) {$twrs_fr =  $noc_f_res[$kk];}
				 if($kk == 15) {$sarovargran_fr =  $noc_f_res[$kk];}
			      
			  }
			   
		   }
		}
		 
		/* echo "<pre>";
		  print_r($sarovargran_fr);
		  
		 echo "</pre>";*/
		// exit;
			$relations = [
			'res' => $formfieldarray,  
			'sites' => $siteattrname,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'nocres' => $noc_f_res, 
			'sarovarres' => $sarovar_fr,
			'cyberres' => $cyber_fr,
			'graderes' => $sarovargran_fr,
			'towers' => $twrs_fr,
			'avenues' => $hill_aven_fr,
			'lakeb' => $hill_lake_fr,
			'aurares' => $aura_fr,
			
			  
			];     
			
			
			
			   		
           $nocCount = 0;
		   foreach($siteattrname as $nk => $sitenoc){
		     if(count($noc_f_res[$nk]) > 0) {
			    $nocCount =  $nocCount + 1;
			 }
		   }
		   $fcount = 0;
		   
		    $pageone_val = 0;
				 $pagetwo_val = 0;
				 if(count($hill_lake_fr) > 0 || count($hill_aven_fr) > 0 || count($twrs_fr) > 0 || count($sarovargran_fr) > 0) {
				  $fcount = $fcount + 1;
				    $pageoneval = $fcount;
					$firesafepcn = $firesafepcn + 1;
				 }
				 if(count($cyber_fr) > 0 || count($sarovar_fr) > 0 || count($aura_fr) > 0) {
				  $fcount = $fcount + 1;
				    $pagetwo_val = $fcount;
					$firesafepcn = $firesafepcn + 1;
				 } 
				  

		  // ELECTRO MECANICAL EQUIPMENT
	
		
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
		  
		   $skarra= array();
		  //if(Auth::user()->id == 1){
		  foreach($siteattrname as $keys => $site){
		    if($keys == 9 || $keys == 15 || $keys == 13 || $keys == 11 || $keys == 8 || $keys == 5 || $keys == 14 || $keys == 7 || $keys == 19 || $keys == 18 || $keys == 17 || $keys == 20){
			   $skarra[0] = 9;
			   $skarra[1] = 15;
			   $skarra[2] = 13;
			   $skarra[3] = 11;
			   $skarra[4] = 8;
			   $skarra[5] = 5;
			   $skarra[6] = 14;
			   $skarra[7] = 7;
			   $skarra[8] = 19;
			   $skarra[9] = 18;
			   $skarra[10] = 17;
			   $skarra[11] = 20;          
			}
		  }  
		  
		  $sites_res_arr_res = array();
		  foreach($skarra as $kv){
		   if(isset($sites_res_arr[$kv])) {
		    $sites_res_arr_res[$kv] = $siteattrname[$kv];
			}
		  }
		   $siteattrname = $sites_res_arr_res;  
		// }    
		
		   $sitearrnew = array();
		  foreach( $siteattrname as $kkk => $site){
		     $sitearrnew[]=$kkk;
		  }
		
		$matchfields = ['month' => $segment4, 'year' => $segment3]; 
		
		if(Auth::user()->id == 1){
		$res_count = \App\Equipmentmisreport::whereIn('site', $sitearrnew)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Equipmentmisreport::whereIn('site', $sitearrnew)->where($matchfields)->get();
		}
		
		}
		else
		{
		  $res_count = \App\Equipmentmisreport::whereIn('site', $sitearrnew)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Equipmentmisreport::whereIn('site', $sitearrnew)->where($matchfields)->get();
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
		 $misprevresult = array();
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
			
			if($segment4 == 1){
			  $prev_mon = 12;
			  $prev_year = $segment3 - 1;
 			}
			else{
			  $prev_mon = $segment4 - 1;;
			  $prev_year = $segment3;
			}
			
			$mismatchprevfields = ['month' => $prev_mon, 'year' => $prev_year, 'site' =>$skey]; 
			$misprevmatchcount = \App\Equipmentmisreport::where($mismatchprevfields)->count();
			
			if($misprevmatchcount > 0){
				 $mismatch_prev_ress = \App\Equipmentmisreport::where($mismatchprevfields)->first();
				 $misprevresult[$skey] = $mismatch_prev_ress;
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
			   //$ref_record_temp_val = \App\Equipmentnotworkingissue::where($matchreffields)->get();
			   $ref_record_temp_val = \App\Equipmentnotworkingissue::where($matchreffields)->orderBy('category', 'asc')->get();
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
		  
		  $farray = array();
			foreach($siteattrname as $kk => $res){
			  if(isset($issuecount[$kk])) $farray[$kk] = $issuecount[$kk];
			}
		
			
		$issuecount = $farray;
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
			'misprevious' => $misprevresult,
			'issuetemp' => $ref_overall_temp,
			
			];     
			
			 $Equipment_mechanical_Count = $issuecount;
		
			     $fi = 0;
			  
			            			  if (count($issuecount) > 0) {
			      $mc = 0;$issuet = array();
				  $fi = 0;
                        foreach ($issuecount as $ikey => $issuecn) {
						$mc = $mc + 1;
						$fi = $fi + 1;
							$relations = [
								'ikey' => $ikey,  
								'sites' => $siteattrname,
								'issuecn' => $issuecn,
								'report_on' => $reportdate_val,
								'report_year' => $segment3,
								'report_month' => $segment4,
								'issues' => $ref_overall, 
								'issuecount' => $issuecount,
								'validation' => $ref_total, 
								'misres' => $misresult, 
								'issuetemp' => $ref_overall_temp,
								'pagenumberval' => $fi + $fcount,
							];  
							
						
						  
						  if($issuecn > 5) {
						  $fi = $fi + 1;
						       $issuet[$ikey] = $ikey;
						       	$relations = [
								'ikey' => $ikey,  
								'sites' => $siteattrname,
								'issuecn' => $issuecn,
								'report_on' => $reportdate_val,
								'report_year' => $segment3,
								'report_month' => $segment4,
								'issues' => $ref_overall, 
								'issuecount' => $issuecount,
								'validation' => $ref_total, 
								'misres' => $misresult, 
								'issuetemp' => $ref_overall_temp,
								'pagenumberval' => $fi + $fcount,
							];  
							
					
							 
						  } else
						  {
						 
						   if($issuecn > 0){
						  $fi = $fi + 1;
						  $issuet[$ikey] = $ikey;
						    
							 	$relations = [
								'ikey' => $ikey,  
								'sites' => $siteattrname,
								'issuecn' => $issuecn,
								'report_on' => $reportdate_val,
								'report_year' => $segment3,
								'report_month' => $segment4,
								'issues' => $ref_overall, 
								'issuecount' => $issuecount,
								'validation' => $ref_total, 
								'misres' => $misresult, 
								'issuetemp' => $ref_overall_temp,
								'pagenumberval' => $fi + $fcount,
							];  
							
						   
						  }
						  }
						  
						}  
						
						}
						
						 $fcount =   $fcount + $fi;
						 $wqupmentcn =  $fi;
					
				
				
				
				// STP STATUS
	
			
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
		  
		   $skarra= array();
		//  if(Auth::user()->id == 1){
		  foreach($siteattrname as $keys => $site){
		    if($keys == 9 || $keys == 15 || $keys == 13 || $keys == 11 || $keys == 8 || $keys == 5 || $keys == 14 || $keys == 7 || $keys == 18 || $keys == 19 || $keys == 17 || $keys == 20){
			   $skarra[0] = 9;
			   $skarra[1] = 15;
			   $skarra[2] = 13;
			   $skarra[3] = 11;
			   $skarra[4] = 8;
			   $skarra[5] = 5;
			   $skarra[6] = 14;
			   $skarra[7] = 7;
			   $skarra[8] = 18;
			   $skarra[9] = 19;
			   $skarra[10] = 17;
			   $skarra[11] = 20;          
			}
		  }   
		  
		  $sites_res_arr_res = array();
		  foreach($skarra as $kv){
		   if(isset($sites_res_arr[$kv])) {
		    $sites_res_arr_res[$kv] = $siteattrname[$kv];
			}
		  }
		   $siteattrname = $sites_res_arr_res;  
		 //}    
		
		   $sitearrnew = array();
		  foreach( $siteattrname as $kkk => $site){
		     $sitearrnew[]=$kkk;
		  }
		
		$matchfields = ['month' => $segment4, 'year' => $segment3]; 
		
		if(Auth::user()->id == 1){
		$res_count = \App\Stpmisreport::whereIn('site', $sitearrnew)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Stpmisreport::whereIn('site', $sitearrnew)->where($matchfields)->get();
		}
		
		} 
		else
		{
		  $res_count = \App\Stpmisreport::whereIn('site', $sitearrnew)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Stpmisreport::whereIn('site', $sitearrnew)->where($matchfields)->get();
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
		 $misprevresult = array();
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
			
			if($segment4 == 1){
			  $prev_mon = 12;
			  $prev_year = $segment3 - 1;
 			}
			else{
			  $prev_mon = $segment4 - 1;;
			  $prev_year = $segment3;
			}
			
			$mismatchprevfields = ['month' => $prev_mon, 'year' => $prev_year, 'site' =>$skey]; 

			$misprevmatchcount = \App\Stpmisreport::where($mismatchprevfields)->count();
			
			if($misprevmatchcount > 0){
				 $mismatch_prev_ress = \App\Stpmisreport::where($mismatchprevfields)->first();
				 $misprevresult[$skey] = $mismatch_prev_ress;
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
			 //  $ref_record_temp_val = \App\Stpnotworkingissue::where($matchreffields)->get();
			     $ref_record_temp_val = \App\Stpnotworkingissue::where($matchreffields)->orderBy('category', 'asc')->get();

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
		  
		    $farray = array();
			foreach($siteattrname as $kk => $res){
			  if(isset($issuecount[$kk])) $farray[$kk] = $issuecount[$kk];
			}
			
			$issuecount = $farray;
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
			'misprevious' => $misprevresult,
			
			];      
			
			$stp_issue_Count = $issuecount;
		
		    $fi = 0;
			  if (count($issuecount) > 0) {
			      $mc = 0;$issuet = array();
				  $fi = 0;
                        foreach ($issuecount as $ikey => $issuecn) {
						$mc = $mc + 1;
						$fi = $fi + 1;
							$relations = [
								'ikey' => $ikey,  
								'sites' => $siteattrname,
								'issuecn' => $issuecn,
								'report_on' => $reportdate_val,
								'report_year' => $segment3,
								'report_month' => $segment4,
								'issues' => $ref_overall, 
								'issuecount' => $issuecount,
								'validation' => $ref_total, 
								'misres' => $misresult, 
								'issuetemp' => $ref_overall_temp,
								'pagenumberval' => $fi + $fcount,
							];  
							
					
						  
						  if($issuecn > 5) {
						  $fi = $fi + 1;
						       $issuet[$ikey] = $ikey;
						       	$relations = [
								'ikey' => $ikey,  
								'sites' => $siteattrname,
								'issuecn' => $issuecn,
								'report_on' => $reportdate_val,
								'report_year' => $segment3,
								'report_month' => $segment4,
								'issues' => $ref_overall, 
								'issuecount' => $issuecount,
								'validation' => $ref_total, 
								'misres' => $misresult, 
								'issuetemp' => $ref_overall_temp,
								'pagenumberval' => $fi + $fcount,
							];  
							
						    
					
							 
						  } else
						  {
						 
						   if($issuecn > 0){
						  $fi = $fi + 1;
						  $issuet[$ikey] = $ikey;
						    
							 	$relations = [
								'ikey' => $ikey,  
								'sites' => $siteattrname,
								'issuecn' => $issuecn,
								'report_on' => $reportdate_val,
								'report_year' => $segment3,
								'report_month' => $segment4,
								'issues' => $ref_overall, 
								'issuecount' => $issuecount,
								'validation' => $ref_total, 
								'misres' => $misresult, 
								'issuetemp' => $ref_overall_temp,
								'pagenumberval' => $fi + $fcount,
							];  
							
				
						   
						  }
						  }
						  
						}  
						
						}
						
						 $stppcn =  $fi;
						 
		   
		    
		   
		   //WSP STATUS
	
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
		  
		    $skarra= array();
		 // if(Auth::user()->id == 1){
		  foreach($siteattrname as $keys => $site){
		    if($keys == 9 || $keys == 15 || $keys == 13 || $keys == 11 || $keys == 8 || $keys == 5 || $keys == 14 || $keys == 7 || $keys == 16 || $keys == 19 || $keys == 17 || $keys == 20){
			   $skarra[0] = 9;
			   $skarra[1] = 15;
			   $skarra[2] = 13;
			   $skarra[3] = 11;
			   $skarra[4] = 8;
			   $skarra[5] = 5;
			   $skarra[6] = 14;
			   $skarra[7] = 7;
			   $skarra[8] = 16;
			   $skarra[9] = 19;
			   $skarra[10] = 17;
			   $skarra[11] = 20;          
			}
		  }   
		  
		  $sites_res_arr_res = array();
		  foreach($skarra as $kv){
		   if(isset($sites_res_arr[$kv])) {
		    $sites_res_arr_res[$kv] = $siteattrname[$kv];
			}
		  }
		   $siteattrname = $sites_res_arr_res;  
	//	 }    
		
		   $sitearrnew = array();
		  foreach( $siteattrname as $kkk => $site){
		     $sitearrnew[]=$kkk;
		  }
		
		$matchfields = ['month' => $segment4, 'year' => $segment3]; 
		
		if(Auth::user()->id == 1){
		$res_count = \App\Wspmisreport::whereIn('site', $sitearrnew)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Wspmisreport::whereIn('site', $sitearrnew)->where($matchfields)->get();
		}
		
		}
		else
		{
		  $res_count = \App\Wspmisreport::whereIn('site', $sitearrnew)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Wspmisreport::whereIn('site', $sitearrnew)->where($matchfields)->get();
		}
		 
		}
		
		$refid = array();
		/* GET REF ID*/
		if($formfieldarray){
		 foreach($formfieldarray as $formres){
		    $refid[$formres->site] = $formres->id;
		 }
		   
		 }
		 $misprevresult = array();
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
			
			if($segment4 == 1){
			  $prev_mon = 12;
			  $prev_year = $segment3 - 1;
 			}
			else{
			  $prev_mon = $segment4 - 1;;
			  $prev_year = $segment3;
			}
			
			$mismatchprevfields = ['month' => $prev_mon, 'year' => $prev_year, 'site' =>$skey]; 
			$misprevmatchcount = \App\Wspmisreport::where($mismatchprevfields)->count();
			
			if($misprevmatchcount > 0){
				 $mismatch_prev_ress = \App\Wspmisreport::where($mismatchprevfields)->first();
				 $misprevresult[$skey] = $mismatch_prev_ress;
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
			   //$ref_record_temp_val = \App\Wspnotworkingissue::where($matchreffields)->get();
			   $ref_record_temp_val = \App\Wspnotworkingissue::where($matchreffields)->orderBy('category', 'asc')->get();
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
		  
		      $farray = array();
			foreach($siteattrname as $kk => $res){
			  if(isset($issuecount[$kk])) $farray[$kk] = $issuecount[$kk];
			}
			
			$issuecount = $farray;
		  
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
			'misprevious' => $misprevresult,
			
			];       
			
			$wsp_issue_Count = $issuecount;
			
	
			    $fi = 0; 		
			  if (count($issuecount) > 0) {
			      $mc = 0;$issuet = array();
				  $fi = 0;
                        foreach ($issuecount as $ikey => $issuecn) {
						$mc = $mc + 1;
						$fi = $fi + 1;
							$relations = [
								'ikey' => $ikey,  
								'sites' => $siteattrname,
								'issuecn' => $issuecn,
								'report_on' => $reportdate_val,
								'report_year' => $segment3,
								'report_month' => $segment4,
								'issues' => $ref_overall, 
								'issuecount' => $issuecount,
								'validation' => $ref_total, 
								'misres' => $misresult, 
								'issuetemp' => $ref_overall_temp,
								'pagenumberval' => $fi + $fcount,
							];  
							
						  
						  if($issuecn > 5) {
						  $fi = $fi + 1;
						       $issuet[$ikey] = $ikey;
						       	$relations = [
								'ikey' => $ikey,  
								'sites' => $siteattrname,
								'issuecn' => $issuecn,
								'report_on' => $reportdate_val,
								'report_year' => $segment3,
								'report_month' => $segment4,
								'issues' => $ref_overall, 
								'issuecount' => $issuecount,
								'validation' => $ref_total, 
								'misres' => $misresult, 
								'issuetemp' => $ref_overall_temp,
								'pagenumberval' => $fi + $fcount,
							];  
							
							 
						  } else
						  {
						 
						   if($issuecn > 0){
						  $fi = $fi + 1;
						  $issuet[$ikey] = $ikey;
						    
							 	$relations = [
								'ikey' => $ikey,  
								'sites' => $siteattrname,
								'issuecn' => $issuecn,
								'report_on' => $reportdate_val,
								'report_year' => $segment3,
								'report_month' => $segment4,
								'issues' => $ref_overall, 
								'issuecount' => $issuecount,
								'validation' => $ref_total, 
								'misres' => $misresult, 
								'issuetemp' => $ref_overall_temp,
								'pagenumberval' => $fi + $fcount,
							];  
							
						   
						  }
						  }
						  
						}  
						
						}
						
						 $fcount =   $fcount + $fi;
						   
                          $wsppcn =  $fi;
			    

		  
		   //  return view('misprints.cmdprintnew', $relations);
			// exit;
			$cmdpcn = 1;
			$securepcn = 2;
			$trafficpcn = 1;
			$housekppcn = 1;
		    $horticulpcn = 5;
		    $clubhspcn = 1;
		    $occupencypcn = 1;
		
	
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		    
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
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
				 
				
			 }  
			 
			 }
			 
			 $indentrep_Array = array();
			 $lagged_date = array();
			 $Recordcount =  array();
			 foreach($siteattrname as $stk => $siten) {
			 
			  $match_in_fields = ['month' => $segment4, 'year' => $segment3, 'site' =>$stk]; 
			  $match_in_count = \App\Indentedmisreport::where($match_in_fields)->count();
		
		       if($match_in_count > 0){
			   	    $match_in_array = \App\Indentedmisreport::where($match_in_fields)->get();
					$match_lag_array = \App\Indentedmisreport::where($match_in_fields)->first();
					
					$indentrep_Array[$stk] = $match_in_array;
					$lagged_date[$stk] = $match_lag_array->laggeddate;
					$Recordcount[$stk] = $match_in_count;
			   }
			   else{
			       $indentrep_Array[$stk] = array();
				   $Recordcount[$stk] = 0;
			   }
			   
			   
			 }
			  // echo "<pre>"; print_r($indentrep_Array);echo "</pre>"; exit;
			 //exit;
			asort($Recordcount); 
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
			'recordcount' => $Recordcount,
			];   
			
		     
			  $indentrep_issue_Count = 0;
			  foreach ($indentrep_Array as $k => $indrec){
					 if (count($indrec) > 0){
					    $indentrep_issue_Count = $indentrep_issue_Count + 1;
					 }
					 }

	
		    $pdf = PDF::loadView('misprints.materialindented', $relations);
			$pdf->setPaper('A4', 'landscape'); 
		 	$pdf->save(storage_path('/pdffiles/materialindented.pdf')); 
			$materialpcn = 0;
			if($indentrep_issue_Count > 0) {
			   $matrial = new \Imagick();
           $matrial->pingImage(storage_path() . '/pdffiles/materialindented.pdf');
           $materialpcn =  $matrial->getNumberImages(); 
		   }
			
			// APNACOMLEX COMPLAINT REORT
	
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
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

		
 $apnarecord = array();
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
			 
			 }
			 
			 $apnarow_count = array();
			 $indentrep_Array = array();
			 $lagged_date = array();
			
			 foreach($siteattrname as $stk => $siten) {
			 
			  $match_in_fields = ['month' => $segment4, 'year' => $segment3, 'site' =>$stk]; 
			  $match_in_count = \App\Apnacomplaintmisreport::where($match_in_fields)->count();
		
		       if($match_in_count > 0){
			   	    $match_in_array = \App\Apnacomplaintmisreport::where($match_in_fields)->get();
					
					$indentrep_Array[$stk] = $match_in_array;
					$apnarecord[$stk] = $match_in_count;
			   }
			   else{
			       $indentrep_Array[$stk] = array();
				    $apnarecord[$stk] = 0;
			   }
			   
			   
			 }
			 //exit; 
			
			
			asort($apnarecord);
			// asort($apnarecord);
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
			'recordcount' => $apnarecord,
			];   
			
			$apna_issue_Count = 0; 
			
			  foreach ($indentrep_Array as $k => $indrec){
					 if (count($indrec) > 0){
					    $apna_issue_Count = $apna_issue_Count + 1;
					 }
					 }    
		
		// return view('misprints.apnacomplex', $relations);
		
		$apnaplcn = 0;
			if($apna_issue_Count > 0) {
			   $apna = new \Imagick();
           $apna->pingImage(storage_path() . '/pdffiles/apnacomplex.pdf');
           $apnaplcn =  $apna->getNumberImages(); 
		   }
		 
		   
		$pdf = PDF::loadView('misprints.apnacomplex', $relations);
		//$pdf->setPaper('A4', 'landscape'); 
		$pdf->save(storage_path('/pdffiles/apnacomplex.pdf')); 
		
		  
		
		// MOCK DRILL
	
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
			
		  }
		  $existing_records = array();  
		  
			 $indentrep_Array = array();
			 $lagged_date = array();
			 foreach($siteattrname as $stk => $siten) {
			 
			  $match_in_fields = ['month' => $segment4, 'year' => $segment3, 'site' =>$stk]; 
			  $match_in_count = \App\Mockdrillmisreport::where($match_in_fields)->count();
		
		       if($match_in_count > 0){
			   	    $match_in_array = \App\Mockdrillmisreport::where($match_in_fields)->get();
					
					$indentrep_Array[$stk] = $match_in_array;
			   }
			   else{
			       $indentrep_Array[$stk] = array();
			   }
			   
			   
			 }
			 
			$fdrillcount = count($indentrep_Array);
			
			$relations = [
			'res' => $formfieldarray,  
			'sites' => $sitenames,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			'drill' => $indentrep_Array,
			];   
			
			$pdf = PDF::loadView('misprints.mismockdrillprint', $relations);
		    $pdf->save(storage_path('/pdffiles/mismockdrillprint.pdf')); 		
			
			//$im = new Imagick();
			
		   ///////////////////////GET PDF PAGES COUNT
		   $mockpagecount = 0;
		   if($fdrillcount > 0) {
		   $im = new \Imagick();
           $im->pingImage(storage_path() . '/pdffiles/mismockdrillprint.pdf');
           $mockpagecount =  $im->getNumberImages(); 
		   }
		   
			/*echo "METRO".$metro."<br/>";
			echo "consump".$waterpcn."<br/>";
			echo "borewell".$borewellpcn."<br/>";
			echo "fire".$firesafepcn."<br/>";
			echo "electro".$wqupmentcn."<br/>";
			echo "stp".$stppcn."<br/>"; 
			echo "wsp".$wsppcn."<br/>";
			echo "cmd".$cmdpcn."<br/>";
			echo "security".$securepcn."<br/>";
			echo "traffic".$trafficpcn."<br/>";
			echo "housekp".$housekppcn."<br/>";
			echo "horticul".$horticulpcn."<br/>";
			echo "clubhouse".$clubhspcn."<br/>";
			echo "occupancy".$occupencypcn."<br/>";
			echo "indented".$materialpcn."<br/>";
			echo "apna".$apnaplcn."<br/>";
			echo "mockdrill".$mockpagecount."<br/>"; */
			
			
			
			 // FIRE PREAPRE
	
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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
			
		  }
		  $existing_records = array();  
		  
			 $indentrep_Array = array();
			 $lagged_date = array();
			 foreach($siteattrname as $stk => $siten) {
			 
			  $match_in_fields = ['month' => $segment4, 'year' => $segment3, 'site' =>$stk]; 
			  $match_in_count = \App\Firepreparemisreport::where($match_in_fields)->count();
		
		       if($match_in_count > 0){
			   	    $match_in_array = \App\Firepreparemisreport::where($match_in_fields)->get();
					
					$indentrep_Array[$stk] = $match_in_array;
			   }
			   else{
			       $indentrep_Array[$stk] = array();
			   }
			   
			   
			 }
			 
			$ffirecount = count($indentrep_Array);
			
			$relations = [
			'res' => $formfieldarray,  
			'sites' => $sitenames,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'existing' => $existing_records,
			'drill' => $indentrep_Array,
			];   
			
			$pdf = PDF::loadView('misprints.misfireprepareprint', $relations);
		    $pdf->save(storage_path('/pdffiles/misfireprepareprint.pdf')); 		
			
			//$im = new Imagick();
			
		   ///////////////////////GET PDF PAGES COUNT
		   $preparepagecount = 0;
		   if($ffirecount > 0) {
		   $im = new \Imagick();
           $im->pingImage(storage_path() . '/pdffiles/misfireprepareprint.pdf');
           $preparepagecount =  $im->getNumberImages(); 
		   }
		   
			
			
			
			
			
		
			
			$relations3 = [
			'metro' => $metro,  
			'waterpcn' => $waterpcn,
			'borewellpcn' => $borewellpcn,
			'firesafepcn' => $firesafepcn,
			'wqupmentcn' => $wqupmentcn,
			'stppcn' => $stppcn,
			'wsppcn' => $wsppcn,
			'cmdpcn' => $cmdpcn,
			'securepcn' => $securepcn,
			'trafficpcn' => $trafficpcn,
			'housekppcn' => $housekppcn,
			'horticulpcn' => $horticulpcn,
			'clubhspcn' => $clubhspcn,
			'occupencypcn' => $occupencypcn,
			'materialpcn' => $materialpcn,
			'apnaplcn' => $apnaplcn,
			'mockpagecount' => $mockpagecount,
			'preparepagecount' => $preparepagecount,
			];   
			
				   
				   $relations2 = [  
			
			'year' => $segment3,
			'month' => $segment4,
			'dateval' =>  $segment5,
			
			]; 
				   
					 $pdf = PDF::loadView('misprints.startpage', $relations2);
		
				$pdf->save(storage_path('/pdffiles/startpage.pdf')); 
		
		        $pdf = PDF::loadView('misprints.indexpage', $relations3);
		
				$pdf->save(storage_path('/pdffiles/indexpage.pdf')); 
				   
		   
		   
		   
			
		/////////////////////// END GET PDF PAGES COUNT		
				//$pdf->save(storage_path('/pdffiles/some-filename11.pdf')); 
				
				$pdfFilestartPath = storage_path() . '/pdffiles/startpage.pdf';
				$pdfFileindexPath = storage_path() . '/pdffiles/indexpage.pdf';
				
			/*	$pdfFile2Path = storage_path() . '/pdffiles/some-filename.pdf';
				$pdfFile1Path = storage_path() . '/pdffiles/some-filename11.pdf';
				$pdfFile3Path = storage_path() . '/pdffiles/water-consumption.pdf';
				$pdfFile4Path = storage_path() . '/pdffiles/borewellnotworking.pdf';
				$pdfFile5Path = storage_path() . '/pdffiles/firesafe.pdf';
				//$pdfFile5Path = $pathForTheMergedPdf_fire_firesafe;
				
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
				
				
				//$pdfFile17Path = storage_path() . '/pdffiles/firenocrenewal.pdf';
				
				$pdfFile17Path = storage_path() . '/pdffiles/nocdataprint.pdf';
				$pdfFile18Path = storage_path() . '/pdffiles/nocdataprintbkp.pdf';
				$pdfFile19Path = storage_path() . '/pdffiles/cmdprintnew.pdf';
				$pdfFile20Path = storage_path() . '/pdffiles/mismockdrillprint.pdf'; */
				
					
				$pdf = new \PDFMerger();
				
				$pdf->addPDF($pdfFilestartPath, 'all');
				$pdf->addPDF($pdfFileindexPath, 'all');
				/*$pdf->addPDF($pdfFile1Path, 'all');
				$pdf->addPDF($pdfFile3Path, 'all');  
				$pdf->addPDF($pdfFile4Path, 'all');   
				if(count($firesafe_final_Count) > 0) { $pdf->addPDF($pdfFile5Path, 'all'); }  
				if((int)$nocCount > 0) { $pdf->addPDF($pdfFile17Path, 'all'); }  
				if((int)$nocCount > 0) { $pdf->addPDF($pdfFile18Path, 'all'); }  
			 	if(count($Equipment_mechanical_Count) > 0) { $pdf->addPDF($pdfFile6Path, 'all'); }
				$pdf->addPDF($pdfFile19Path, 'all'); 
				if(count($stp_issue_Count) > 0) { $pdf->addPDF($pdfFile7Path, 'all'); }
				if(count($wsp_issue_Count) > 0) { $pdf->addPDF($pdfFile8Path, 'all');  }
				//$pdf->addPDF($pdfFile19Path, 'all'); 
				if(isset($exist_Sec_Secu['sites']) || isset($exist_SecTwo_Secu['sites'])) { $pdf->addPDF($pdfFile9Path, 'all');  }
				$pdf->addPDF($pdfFile16Path, 'all'); 
				$pdf->addPDF($pdfFile10Path, 'all'); 
				$pdf->addPDF($pdfFile11Path, 'all');
				$pdf->addPDF($pdfFile12Path, 'all');
				$pdf->addPDF($pdfFile2Path, 'all');
				if((int)$indentrep_issue_Count > 0) { $pdf->addPDF($pdfFile13Path, 'all');  }
				if((int)$apna_issue_Count > 0) { $pdf->addPDF($pdfFile14Path, 'all');  } 
				if((int)$fdrillcount > 0) { $pdf->addPDF($pdfFile20Path, 'all');  }   */
				 
				
				
				$pathForTheMergedPdf = storage_path() . "/pdffiles/result.pdf";
				
				$dwnfilename = date("F", mktime(0, 0, 0, $segment4, 10))."-index".$segment3.".pdf";	
				 
				$pdf->merge('download', $dwnfilename);
				
				
				

    }


	
  public function testpdf(Request $request)

    {
	
	 	ini_set('max_execution_time', 300);

      $segment1 = Request::segment(1);
	  $segment2 = Request::segment(2);
		
       $relations = [
            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			//'sites_names' => \App\Sites::get()->pluck('title', 'id')->prepend('All', ''),
			'sites_names' => \App\Sites::get()->pluck('name', 'id')->prepend('All', ''),
			'segmentval' => $segment2,  
        ];    

		

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
		
		   $sitearrnew = array();
		  foreach( $siteattrname as $kkk => $site){
		     $sitearrnew[]=$kkk;
		  }
		
		$matchfields = ['month' => $segment4, 'year' => $segment3]; 
		
		if(Auth::user()->id == 1){
		$res_count = \App\Firesafetymisreport::whereIn('site', $sitearrnew)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Firesafetymisreport::whereIn('site', $sitearrnew)->where($matchfields)->get();
		}
		
		}
		else
		{
		  $res_count = \App\Firesafetymisreport::whereIn('site', $sitearrnew)->where($matchfields)->count();
		
		if($res_count > 0){
		
			$formfieldarray = \App\Firesafetymisreport::whereIn('site', $sitearrnew)->where($matchfields)->get();
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
		  $misprevresult = array();
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
			
			if($segment4 == 1){
			  $prev_mon = 12;
			  $prev_year = $segment3 - 1;
 			}
			else{
			  $prev_mon = $segment4 - 1;;
			  $prev_year = $segment3;
			}
			
			$mismatchprevfields = ['month' => $prev_mon, 'year' => $prev_year, 'site' =>$skey]; 
			$misprevmatchcount = \App\Firesafetymisreport::where($mismatchprevfields)->count();
			
			if($misprevmatchcount > 0){
				 $mismatch_prev_ress = \App\Firesafetymisreport::where($mismatchprevfields)->first();
				 $misprevresult[$skey] = $mismatch_prev_ress;
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
			   //$ref_record_temp_val = \App\Firesafenotworkingissue::where($matchreffields)->get();
			    $ref_record_temp_val = \App\Firesafenotworkingissue::where($matchreffields)->orderBy('category', 'asc')->get();
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
			 'misprevious' => $misprevresult,
			'issuetemp' => $ref_overall_temp,
			
			];     
			
			
			
			  if (count($issuecount) > 0) {
			      $mc = 0;$issuet = array();
                        foreach ($issuecount as $ikey => $issuecn) {
						$mc = $mc + 1;
							$relations = [
								'ikey' => $ikey,  
								'issuecn' => $issuecn,
								'report_on' => $reportdate_val,
								'report_year' => $segment3,
								'report_month' => $segment4,
								'issues' => $ref_overall, 
								'issuecount' => $issuecount,
								'validation' => $ref_total, 
								'misres' => $misresult, 
								 'misprevious' => $misprevresult,
								'issuetemp' => $ref_overall_temp,
							];  
							
								$pdf = PDF::loadView('misprints.firesafeviews.mainfile', $relations);
		                      // $pdf->setPaper('A4', 'landscape');
		                       $pdf->save(storage_path('/pdffiles/firesafe/mistrafficprint'.$ikey.'.pdf'));  
						  
						  if($issuecn > 5) {
						       $issuet[$ikey] = $ikey;
						       	$relations = [
								'ikey' => $ikey,  
								'issuecn' => $issuecn,
								'report_on' => $reportdate_val,
								'report_year' => $segment3,
								'report_month' => $segment4,
								'issues' => $ref_overall, 
								'issuecount' => $issuecount,
								'validation' => $ref_total, 
								'misres' => $misresult, 
								 'misprevious' => $misprevresult,
								'issuetemp' => $ref_overall_temp,
							];  
							
						    
							  $pdf = PDF::loadView('misprints.firesafeviews.landscpaefile', $relations);
		                      $pdf->setPaper('A4', 'landscape');
		                       $pdf->save(storage_path('/pdffiles/firesafe/mistrafficprintissue'.$ikey.'.pdf'));  
							 
						  } else
						  {
						   if($issuecn > 0){
						 
						  $issuet[$ikey] = $ikey;
						    
							 	$relations = [
								'ikey' => $ikey,  
								'issuecn' => $issuecn,
								'report_on' => $reportdate_val,
								'report_year' => $segment3,
								'report_month' => $segment4,
								'issues' => $ref_overall, 
								'issuecount' => $issuecount,
								'validation' => $ref_total, 
								'misres' => $misresult, 
								 'misprevious' => $misprevresult,
								'issuetemp' => $ref_overall_temp,
							];  
							
						    
							  $pdf = PDF::loadView('misprints.firesafeviews.portraitfile', $relations);
		                      
		                       $pdf->save(storage_path('/pdffiles/firesafe/mistrafficprintissue'.$ikey.'.pdf'));  
							   
						   
						  }
						  }
						  
						}  
						
						}
						
						} 
						
						$pdf = new \PDFMerger();
						
						 foreach ($issuecount as $ikey => $issuecn) {
						 
						   $pdf->addPDF(storage_path() .'/pdffiles/firesafe/mistrafficprint'.$ikey.'.pdf', 'all');
						   
						   if(isset($issuet[$ikey])) {
						      
							   $pdf->addPDF(storage_path() .'/pdffiles/firesafe/mistrafficprintissue'.$ikey.'.pdf', 'all');
						   }
						   
						 }
						 
						 $pathForTheMergedPdf_fire = storage_path() . "/pdffiles/firesafe/finalresult.pdf";
				
					
				 
				$pdf->merge('download', "finaldownload.pdf");
							
				
				
						 echo "<pre>";
						   print_r($issuet);
						 echo "</pre>";
						exit;
						
						
	
	}
	
	
	
	
	
	// TEST DOWNLOAD
	
	public function getdownloadviewtest(Request $request)

    {
	ini_set('max_execution_time', 300);
	ini_set('mbstring.encoding_translation', 'On');
	

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
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sites_count = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->count();
		  $sites_res_arr =\App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sites_count = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->count();
			$sites_res_arr =\App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  }
		  
		  
		  $fromdate = $segment3."-".$segment4."-"."1";
		  $todate = $segment3."-".$segment4."-".$lastdatearr[2];
		  
		
		  if($sites_count > 0){
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
			$sitearr = array();
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
			
		  // return view('misprints.metrowaterdownloadtest', $relations);
			
			$pdf = PDF::loadView('misprints.metrowaterdownloadtest', $relations);

          
			date_default_timezone_set('Asia/Kolkata');
			$today_date = date('d');
			$today_time = date("g:i a");
			$monthName = date('F', mktime(0, 0, 0, $segment4, 10)); 
			
			 $fnam = 'testMetroWater_'.$monthName."_".$today_date."_".$segment3."_".$today_time.".pdf";
       
			 return $pdf->download($fnam);
			 
		

		}  
	
	}

	
  
}

