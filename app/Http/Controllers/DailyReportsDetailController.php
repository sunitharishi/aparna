<?php


 
namespace App\Http\Controllers;



use App\Project;

use Carbon\Carbon;

use App\Transaction;

use Auth;



use Request;

use App\Horticulture;

use App\Horticuturedailyreport;

use App\Fmsdailyreport;
use App\Pmsdailyreport;
use App\Firesafedailyreport;
use App\Securitydailyreport;



class DailyReportsDetailController extends Controller

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

	

	    public function index3(Request $request)

    { 
	   $segment1 = Request::segment(1);
		 $segment2 = Request::segment(2);
		 $segment3 = Request::segment(3);
		 
		  if(Auth::user()->id == 1){
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		  
		  
		  }else{

		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			//echo $emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();	
			$siteinfo = $getemp_info->community;    
			 //echo "<pre>"; print_r($getemp_info); echo "</pre>";exit; 
			$sitearr = explode(",",$siteinfo);
			//print_r($sitearr);exit;
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
			
		  }
		  if($segment3) {
		   $dateval = $segment3;
		  }
		  else{
		   $dateva = date('Y-m-d');
		   $dateval =  date('d-m-Y', strtotime($dateva .' -1 day'));
		  }
  
	      $relations = [

            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			'sites_names' => $sitenames,
			'segmentval' => $segment2,
			'seldate' => $dateval,

        ]; 

		  return view('dailyreports.index2', $relations);

    }
   

	 public function index2(Request $request)

    {

	      $relations = [

            'client_statuses' => \App\ClientStatus::get()->pluck('title', 'id')->prepend('Please select', ''),

        ]; 

		  return view('dailyreports.index', $relations);

    }

	

	 public function massDestroy(Request $request)

    {

       $relations = [

            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),

			//'sites_names' => \App\Sites::get()->pluck('title', 'id')->prepend('All', ''),

        ];  

		

		$segment1 = Request::segment(1);

		$segment2 = Request::segment(2);

		

		if($segment2 == '1'){

		  return view('firesecurity', $relations);

		} 

		if($segment2 == '2'){

		  return view('fms', $relations);

		} 

		if($segment2 == '3'){

		  return view('pms', $relations);

		} 

		if($segment2 == '4'){

		  return view('security', $relations);

		} 

		 else{

		  return view('dailyreports.index', $relations);

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

		  return view('fms', $relations);

		} 

		if($segment2 == '3'){

		  return view('pms', $relations);

		} 

		if($segment2 == '4'){

		  return view('security', $relations);

		} 

		 else{

		  return view('dailyreports.index', $relations);

		 }

		

    }


	public function viewdetailpage(Request $request)

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

		  return view('dailyfinalreport.firesecurityprint', $relations);

		} 

		if($segment2 == '2'){
		
		  

		  return view('dailyfinalreport.fmsprint', $relations);

		} 

		if($segment2 == '3'){

		  return view('dailyfinalreport.pmsprint', $relations);

		} 

		if($segment2 == '4'){

		  return view('dailyfinalreport.securityprint', $relations);

		} 

		 else{

		  return view('dailyreports.index', $relations);

		 }

		

    }
	
	
	
	public function detailviewdetailpage(Request $request)

    {

      $segment1 = Request::segment(1);
	  $segment2 = Request::segment(2);
	  $segment3 = Request::segment(3);
		
     /*  $relations = [
            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			//'sites_names' => \App\Sites::get()->pluck('title', 'id')->prepend('All', ''),
			'sites_names' => \App\Sites::get()->pluck('name', 'id')->prepend('All', ''),
			'segmentval' => $segment2,  
        ];   */
		$formfieldarray = array();
		 $relations = [
            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			//'sites_names' => \App\Sites::get()->pluck('title', 'id')->prepend('All', ''),
			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),
			'res' => $formfieldarray, 
			'datefilter' => $segment3,
			'sitefilter' => $segment2,
			   ];    
		
		$siteid = $segment2;
		$reportdate = $segment3;
		  $formfieldarray = array();
		
		$resdate = date("Y-m-d", strtotime($reportdate) );
		   if(isset($reportdate)) {
		   	 
			   $matchfields = ['site' => $siteid, 'reporton' => $resdate]; 
			 //  echo "<pre>";	print_r($matchfields); echo "</pre>";
			   
			   
			 
		   // $formfieldarray = \App\Fmsdailyreport::where($matchfields)->first();
			
			$res_count = \App\Fmsdailyreport::where($matchfields)->count();
			
			if($res_count > 0){
			    $formfieldarray = \App\Fmsdailyreport::where($matchfields)->first();
				
				 $relations = [
            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			//'sites_names' => \App\Sites::get()->pluck('title', 'id')->prepend('All', ''),
			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),
			'res' => $formfieldarray, 
			'datefilter' => $segment3,
			'sitefilter' => $segment2,
			 
        ];    
		} 
		}  

        //  echo "<pre>"; print_r($relations); echo "</pre>"; exit;

		  return view('dailyfinalreport.fmsprint', $relations); 
		  
    }
	
	
	
	public function detailviewpmsdetailpage(Request $request)

    {

      $segment1 = Request::segment(1);
	  $segment2 = Request::segment(2);
	  $segment3 = Request::segment(3);
		
     /*  $relations = [
            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			//'sites_names' => \App\Sites::get()->pluck('title', 'id')->prepend('All', ''),
			'sites_names' => \App\Sites::get()->pluck('name', 'id')->prepend('All', ''),
			'segmentval' => $segment2,  
        ];   */ 
		$formfieldarray = array();
		 $relations = [
            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			//'sites_names' => \App\Sites::get()->pluck('title', 'id')->prepend('All', ''),
			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),
			'res' => $formfieldarray, 
			'datefilter' => $segment3,
			'sitefilter' => $segment2,
			   ];    
		
		$siteid = $segment2;
		$reportdate = $segment3;
		  $formfieldarray = array();
		
		$resdate = date("Y-m-d", strtotime($reportdate) );
		   if(isset($reportdate)) {
		   	 
			   $matchfields = ['site' => $siteid, 'reporton' => $resdate]; 
			 //  echo "<pre>";	print_r($matchfields); echo "</pre>";
			   
			   
			 
		   // $formfieldarray = \App\Fmsdailyreport::where($matchfields)->first();
			
			$res_count = \App\Pmsdailyreport::where($matchfields)->count();
			
			if($res_count > 0){
			    $formfieldarray = \App\Pmsdailyreport::where($matchfields)->first();
				
				 $relations = [
            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			//'sites_names' => \App\Sites::get()->pluck('title', 'id')->prepend('All', ''),
			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),
			'res' => $formfieldarray, 
			'datefilter' => $segment3,
			'sitefilter' => $segment2,
			 
        ];    
		} 
		}  
 
        //  echo "<pre>"; print_r($relations); echo "</pre>"; exit;

		  return view('dailyfinalreport.pmsprint', $relations); 
		  
    }
	
	
	public function detailviewhortidetailpage(Request $request)

    {

      $segment1 = Request::segment(1);
	  $segment2 = Request::segment(2);
	  $segment3 = Request::segment(3);
	  
		$formfieldarray = array();
		 $relations = [
            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),
			'res' => $formfieldarray, 
			'datefilter' => $segment3,
			'sitefilter' => $segment2,
			   ];    
		
		$siteid = $segment2;
		$reportdate = $segment3;
		  $formfieldarray = array();
		  $waterRes = array();
		
		$resdate = date("Y-m-d", strtotime($reportdate) );
		
			
			
			
		   if(isset($reportdate)) {
		   	 
			   $matchfields = ['site' => $siteid, 'reporton' => $resdate]; 
			
			$res_count = \App\Horticuturedailyreport::where($matchfields)->count();
			
			if($res_count > 0){
			    $formfieldarray = \App\Horticuturedailyreport::where($matchfields)->first();
				
				$rid = $formfieldarray->id;
				
				$wmatchValidFields = ['type' => 'Watering', 'site' => $siteid, 'report_id' => $rid]; 
				$water_count = \App\HorticultureType::where($wmatchValidFields)->count();
				if($water_count > 0)
				{
				  $watetingprevarray = \App\HorticultureType::where($wmatchValidFields)->get();
				  $locs = array();
				  foreach( $watetingprevarray as $wkey=>$waterres)
				  {
				  	if($waterres->location!="") $locs = explode(",",$waterres->location);
				 	$locName = "";
					$lName = "";
					foreach($locs as $loc)
					{
						$locations =  \App\Horticulture::where('id',$loc)->first();
						$locName .= $locations['sub_location'].", ";
					}
					$lName = rtrim($locName,",");
					$waterRes[$wkey]['location'] = $lName;
					$waterRes[$wkey]['manpower'] = $waterres->manpower;
					$waterRes[$wkey]['hrs'] = $waterres->hrs;
				  }
				}
				
				
				 $relations = [
            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),
			'waterRes' => $waterRes, 
			'res' => $formfieldarray, 
			'datefilter' => $segment3,
			'sitefilter' => $segment2,
			 
        ];    
		} 
		}  
		  return view('dailyfinalreport.hortiprint', $relations); 
		  
    }
	
	
	public function detailviewfiresafedetailpage(Request $request)

    {

      $segment1 = Request::segment(1);
	  $segment2 = Request::segment(2);
	  $segment3 = Request::segment(3);
		
     /*  $relations = [
            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			//'sites_names' => \App\Sites::get()->pluck('title', 'id')->prepend('All', ''),
			'sites_names' => \App\Sites::get()->pluck('name', 'id')->prepend('All', ''),
			'segmentval' => $segment2,  
        ];   */
		$formfieldarray = array();
		 $relations = [
            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			//'sites_names' => \App\Sites::get()->pluck('title', 'id')->prepend('All', ''),
			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),
			'res' => $formfieldarray, 
			'datefilter' => $segment3,
			'sitefilter' => $segment2,
			   ];    
		
		$siteid = $segment2;
		$reportdate = $segment3;
		  $formfieldarray = array();
		
		$resdate = date("Y-m-d", strtotime($reportdate) );
		   if(isset($reportdate)) {
		   	 
			   $matchfields = ['site' => $siteid, 'reporton' => $resdate]; 
			 //  echo "<pre>";	print_r($matchfields); echo "</pre>";
			   
			   
			 
		   // $formfieldarray = \App\Fmsdailyreport::where($matchfields)->first();
			
			$res_count = \App\Firesafedailyreport::where($matchfields)->count();
			
			if($res_count > 0){
			    $formfieldarray = \App\Firesafedailyreport::where($matchfields)->first();
				
				 $relations = [
            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			//'sites_names' => \App\Sites::get()->pluck('title', 'id')->prepend('All', ''),
			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),
			'res' => $formfieldarray, 
			'datefilter' => $segment3,
			'sitefilter' => $segment2,
			 
        ];    
		} 
		}  

        //  echo "<pre>"; print_r($relations); echo "</pre>"; exit;

		  return view('dailyfinalreport.firesecurityprint', $relations); 
		  
    } 
	
		public function detailviewsecuritydetailpage(Request $request)

    {

      $segment1 = Request::segment(1);
	  $segment2 = Request::segment(2);
	  $segment3 = Request::segment(3);
		
     /*  $relations = [
            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			//'sites_names' => \App\Sites::get()->pluck('title', 'id')->prepend('All', ''),
			'sites_names' => \App\Sites::get()->pluck('name', 'id')->prepend('All', ''),
			'segmentval' => $segment2,  
        ];   */
		$formfieldarray = array();
		 $relations = [
            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			//'sites_names' => \App\Sites::get()->pluck('title', 'id')->prepend('All', ''),
			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),
			'res' => $formfieldarray, 
			'datefilter' => $segment3,
			'sitefilter' => $segment2,
			   ];    
		
		$siteid = $segment2;
		$reportdate = $segment3;
		  $formfieldarray = array();
		
		$resdate = date("Y-m-d", strtotime($reportdate) );
		   if(isset($reportdate)) {
		   	 
			   $matchfields = ['site' => $siteid, 'reporton' => $resdate]; 
			 //  echo "<pre>";	print_r($matchfields); echo "</pre>";
			   
			 
			 
		   // $formfieldarray = \App\Fmsdailyreport::where($matchfields)->first();
			
			$res_count = \App\Securitydailyreport::where($matchfields)->count();
			
			if($res_count > 0){
			    $formfieldarray = \App\Securitydailyreport::where($matchfields)->first();
				
				 $relations = [
            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			//'sites_names' => \App\Sites::get()->pluck('title', 'id')->prepend('All', ''),
			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),
			'res' => $formfieldarray, 
			'datefilter' => $segment3,
			'sitefilter' => $segment2,
			 
        ];    
		} 
		}   

        //  echo "<pre>"; print_r($relations); echo "</pre>"; exit;

		  return view('dailyfinalreport.securityprint', $relations); 
		  
    } 
	



	

	

}

