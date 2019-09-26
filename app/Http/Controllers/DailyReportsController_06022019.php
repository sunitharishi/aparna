<?php



namespace App\Http\Controllers;











use PDF; 



use App\Project; 
use App\Dailylockpermission;
use App\Dailyreportvalidation;






use Carbon\Carbon;







use App\Transaction;







use App\Fmsdailyreport;



use App\Pmsdailyreport;



use App\Firesafedailyreport;
use App\Firesafedailyreportvalidation;


use App\Securitydailyreport;

use App\Dailyfmsdgsetreport;
use App\Dailylocktime;
use App\Dailyfmsdieselconsumptionreport;



use Request;
use App\User;

use Auth;

use App\Emp;

use DB;


use App\Http\Requests\StoreFpmRequest;

use App\Http\Requests\StoreDailyLocktime;

use App\Http\Requests\StoreLockPermissionRequest;





use App\Http\Requests\StoreSecurityRequest;



use App\Http\Requests\StorePmsRequest;



use App\Http\Requests\StoreFiresafeRequest;




class DailyReportsController extends Controller







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


		$siteattrname = array();
	
		 $sitenames = array();


	      if(Auth::user()->id == 1){


	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');



		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');



		  



		  }else{



		    $role_id = Auth::user()->role_id;



			$emp_id = Auth::user()->emp_id;

			//echo $emp_id;


			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();



			//print_r($getemp_info);exit;



			//$users = User::where('id','!=',1)->get();

			if($getemp_info){


			 $siteinfo = $getemp_info->community;

			 $sitearr = explode(",",$siteinfo);



			//if($siteinfo)  {}



			//$sitenames = \App\Sites::get()->pluck('name', 'id')->prepend('All', '');



			



			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');



			



			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');

			}

		  }







	    /*  $relations = [







            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),



			'sites_names' => \App\Sites::get()->pluck('name', 'id')->prepend('All', ''),



			'sites_attr_names' => \App\Sites::get()->pluck('name', 'id'),







        ]; */



		
		


		$relations = [







            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),



			'sites_names' => $sitenames,



			'sites_attr_names' => $siteattrname,


			'roleid' => Auth::user()->role_id,




        ];




		//echo "<pre>"; print_r($siteattrname); echo "</pre>"; exit;


		  return view('dailyreports.index', $relations);







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
		
		
		
		
        $segment1 = Request::segment(1);



		$segment2 = Request::segment(2);



		$segment3 = Request::segment(3);



		$formfieldarray = array();

	$validres = array();
		$siteid = $segment2;

		
    $matchValidFields = ['site' => $siteid]; 
		$valid_count = \App\Firesafedailyreportvalidation::where($matchValidFields)->count();
		
		if($valid_count > 0){
			$validres = \App\Firesafedailyreportvalidation::where($matchValidFields)->first();
		}


       $relations = [



            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),



			//'sites_names' => \App\Sites::get()->pluck('title', 'id')->prepend('All', ''),



			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),



			'res' => $formfieldarray, 



			'segmentval' => $segment3,  
			
			'validres' => $validres,



        ];    







		if($segment3 == '1'){

	$segment1 = Request::segment(1);
		
	$segment2 = Request::segment(2);

	$segment4 = Request::segment(4);
	

		$siteid = $segment2;

		$reportdate = date("Y-m-d");
          $reportdate = $segment4;


		$formfieldarray = array();

		$resdate = date("Y-m-d", strtotime($reportdate) );



		



		$matchfields = ['site' => $siteid, 'reporton' => $resdate]; 



		//  echo "<pre>";	print_r($matchfields); echo "</pre>";



		// $formfieldarray = \App\Fmsdailyreport::where($matchfields)->first();



		



		



		$res_count = \App\Firesafedailyreport::where($matchfields)->count();



		



		if($res_count > 0){



		$formfieldarray = \App\Firesafedailyreport::where($matchfields)->first();


		$matchValidFields = ['site' => $siteid]; 
		$valid_count = \App\Firesafedailyreportvalidation::where($matchValidFields)->count();
		
		if($valid_count > 0){
			$validres = \App\Firesafedailyreportvalidation::where($matchValidFields)->first();
		}



		$relations = [



		'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),



		//'sites_names' => \App\Sites::get()->pluck('title', 'id')->prepend('All', ''),



		'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),



		'res' => $formfieldarray, 

		'validres' => $validres,
		
		

		



		];    



		



		return view('editfiresecurity', $relations);



		}



		







		  return view('firesecurity', $relations);



 



		} 







		if($segment3 == '2'){



		$segment1 = Request::segment(1);



		$segment2 = Request::segment(2);

       $segment4 = Request::segment(4);

		

		$siteid = $segment2;



		$reportdate = date("Y-m-d");



		$formfieldarray = array();


          	$reportdate = $segment4;
		



		$resdate = date("Y-m-d", strtotime($reportdate) );



		



		$matchfields = ['site' => $siteid, 'reporton' => $resdate]; 
		$match_fms_fields = ['site' => $siteid]; 
		$pwrctpt = 0;
		$validation_cn =   \App\Dailyreportvalidation::where($match_fms_fields)->count();
		$validation_res = array();
		if($validation_cn > 0){
		  $validation_res =   \App\Dailyreportvalidation::where($match_fms_fields)->first();
		  $pwrctpt = $validation_res->ctptmin;
		}
		
      $deiselconsump_res = array();
         $prev_date = date('Y-m-d', strtotime($resdate .' -1 day'));
		$prevmatch_flds = ['site' => $siteid, 'reporton' => $prev_date]; 
		
		$prevrec_count = \App\Fmsdailyreport::where($prevmatch_flds)->count();
		
		if($prevrec_count > 0){
		   $prevrec_res = \App\Fmsdailyreport::where($prevmatch_flds)->first();
		   $prev_ref_id =  $prevrec_res['id'];
		   
		   $consump_match = ['site' => $siteid, 'ref_id' => $prev_ref_id];
		   $deiselconsump_cn = \App\Dailyfmsdieselconsumptionreport::where($consump_match)->count();
		   
		   if($deiselconsump_cn > 0){
		       $deiselconsump_res = \App\Dailyfmsdieselconsumptionreport::where($consump_match)->get();
		   }
		   else
		   {
		   		$deiselconsump_rescn = \App\Dailyfmsdieselconsumptionreport::where('site',"=",$siteid)->orderBy('ref_id', 'DESC')->count();
				if($deiselconsump_rescn>0)
				{
					$deiselconsump_res1 = \App\Dailyfmsdieselconsumptionreport::where('site',"=",$siteid)->orderBy('ref_id', 'DESC')->first();
		   			$deiselconsump_res = \App\Dailyfmsdieselconsumptionreport::where('site',"=",$siteid)->where('ref_id',"=",$deiselconsump_res1->ref_id)->get();
				}
		   }
		       
		}  

		// echo "<pre>";	print_r($deiselconsump_res); echo "</pre>";

      //exit;

		// $formfieldarray = \App\Fmsdailyreport::where($matchfields)->first();



        $dgconsumparray = array();
		 
		
		$relations = [

		'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
		'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),
		'res' => $formfieldarray, 
        'dgconsuption' =>$dgconsumparray,
		'dieselconsump' => $deiselconsump_res,
		'pwrctpt' => $pwrctpt,
		
		
		];    

		$res_count = \App\Fmsdailyreport::where($matchfields)->count();

  
		if($res_count > 0){


        
		$formfieldarray = \App\Fmsdailyreport::where($matchfields)->first();
		
		

          $match_dg_fields =  ['site' => $siteid, 'ref_id' => $formfieldarray->id];
		  
		  $dgconsumparray_cn = \App\Dailyfmsdieselconsumptionreport::where($match_dg_fields)->count();
		  
         if($dgconsumparray_cn > 0){
		     $dgconsumparray = \App\Dailyfmsdieselconsumptionreport::where($match_dg_fields)->get();
		 }
		 else
		 {
		 	$match_dg_fields =  ['site' => $siteid, 'ref_id' => $formfieldarray->id];
		 	 $dgconsumparray = \App\Dailyfmsdieselconsumptionreport::where($match_dg_fields)->get();
		 }
		 
		
		



		$relations = [



		'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),



		//'sites_names' => \App\Sites::get()->pluck('title', 'id')->prepend('All', ''),



		'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),



		'res' => $formfieldarray, 
        'dgconsuption' =>$dgconsumparray,
		'dieselconsump' => $deiselconsump_res,
		'pwrctpt' => $pwrctpt,
		
		
	

		];    

		
		


		return view('editfms', $relations);



		}

		  return view('fms', $relations);

		} 







		if($segment3 == '3'){



		



		 $segment1 = Request::segment(1);



		$segment2 = Request::segment(2);
		$segment4 = Request::segment(4);



		



		



		$siteid = $segment2;
		
		$deppmatchfields = ['site' => $siteid];
		$deprescn = \App\Pmsdailyreportvalidation::where($deppmatchfields)->first();
		if($deprescn) $flats =  $deprescn->flats;
		else $flats = "";


		$reportdate = date("Y-m-d");
		
		$reportdate = $segment4;



		$formfieldarray = array();


		$resdate = date("Y-m-d", strtotime($reportdate) );



		
          $prev_date = date('Y-m-d', strtotime($resdate .' -1 day'));
		  
		  
       $matchprevfields =  ['site' => $siteid, 'reporton' => $prev_date]; 

		$matchfields = ['site' => $siteid, 'reporton' => $resdate]; 



		//  echo "<pre>";	print_r($matchfields); echo "</pre>";



		// $formfieldarray = \App\Fmsdailyreport::where($matchfields)->first();



		
        $prev_apms_pending = "";
		 $prev_project_pending = "";

		$prev_count = \App\Pmsdailyreport::where($matchprevfields)->count();
		if($prev_count > 0){
		  $formfieldprevarray = \App\Pmsdailyreport::where($matchprevfields)->first();
		  $prev_apms_pending = $formfieldprevarray->apna_apms_pending;
		  $prev_project_pending = $formfieldprevarray->apna_project_pending; 
		}
		$matchValidFields = ['site' => $siteid]; 
		$valid_count = \App\Pmsdailyreportvalidation::where($matchValidFields)->count();
		
		if($valid_count > 0){
			$validres = \App\Pmsdailyreportvalidation::where($matchValidFields)->first();
		}

		
		

		$res_count = \App\Pmsdailyreport::where($matchfields)->count();
		if($res_count > 0){



		$formfieldarray = \App\Pmsdailyreport::where($matchfields)->first();


		
		



		$relations = [



		'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),



		//'sites_names' => \App\Sites::get()->pluck('title', 'id')->prepend('All', ''),



		'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),



		'res' => $formfieldarray, 
		
		'validres' => $validres,
		
		'flats' => $flats, 
		
		'pending_apna_apms' => $prev_apms_pending,
		
        'pending_apna_project' => $prev_project_pending,


		];    

       // return view('underconstruction', $relations);

		return view('editpms', $relations);



		} 
    
		$relations = [



		'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),



		//'sites_names' => \App\Sites::get()->pluck('title', 'id')->prepend('All', ''),



		'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),



		'res' => $formfieldarray, 
		
		'validres' => $validres,
		
		'flats' => $flats, 
		
		'pending_apna_apms' => $prev_apms_pending,
		
        'pending_apna_project' => $prev_project_pending,
		
		
		
		


  
		];    

  
 
       //return view('underconstruction', $relations);

		  return view('pms', $relations);







		} 







		if($segment3 == '4'){



		



		   	 $segment1 = Request::segment(1);



		$segment2 = Request::segment(2);

$segment4 = Request::segment(4);

		



		



		$siteid = $segment2;



		$reportdate = date("Y-m-d");



		$formfieldarray = array();



		$reportdate = $segment4;



		$resdate = date("Y-m-d", strtotime($reportdate) );


       
		



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
		
		
		
		


		];    


		return view('editsecurity', $relations);

		} 

		  return view('security', $relations);

		} 

		 else{

		  return view('dailyreports.index', $relations);

		 }

    }



// DAY LOCKTIME FORM


 public function daylocktimeform(Request $request)

    {

		$relations = [

		'lock_time' => \App\Dailylocktime::where('id', '=', '1')->first(),

		];    

           
		  return view('dailylocktime.daylocktime', $relations);

    }



	

// END DAY LOCKTIME FORM
	


// *********************** CONSTRUCTION ***********************************//


  
	 public function massconstructionDestroy(Request $request)







    {







        $segment1 = Request::segment(1);



		$segment2 = Request::segment(2);



		$segment3 = Request::segment(3);



		$formfieldarray = array();



		$validres = array();
		$siteid = $segment2;

		
    $matchValidFields = ['site' => $siteid]; 
		$valid_count = \App\Firesafedailyreportvalidation::where($matchValidFields)->count();
		
		if($valid_count > 0){
			$validres = \App\Firesafedailyreportvalidation::where($matchValidFields)->first();
		}



       $relations = [



            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),



			//'sites_names' => \App\Sites::get()->pluck('title', 'id')->prepend('All', ''),



			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),



			'res' => $formfieldarray, 



			'segmentval' => $segment3,  
			
			'validres' => $validres,



        ];    







		if($segment3 == '1'){



		



	$segment1 = Request::segment(1);
	
	
	
	$segment2 = Request::segment(2);
	
	
	$segment4 = Request::segment(4);
	



		


		
		$siteid = $segment2;
		
		
		$reportdate = date("Y-m-d");
		$reportdate = $segment4;
		
		
		$formfieldarray = array();
		

		



		$resdate = date("Y-m-d", strtotime($reportdate) );



		



		$matchfields = ['site' => $siteid, 'reporton' => $resdate]; 



		//  echo "<pre>";	print_r($matchfields); echo "</pre>";



		// $formfieldarray = \App\Fmsdailyreport::where($matchfields)->first();



		



		



		$res_count = \App\Firesafedailyreport::where($matchfields)->count();



		



		if($res_count > 0){



		$formfieldarray = \App\Firesafedailyreport::where($matchfields)->first();

        $matchValidFields = ['site' => $siteid]; 

		$valid_count = \App\Firesafedailyreportvalidation::where($matchValidFields)->count();

                if($valid_count > 0){
				  $validres = \App\Firesafedailyreportvalidation::where($matchValidFields)->first();
				}



		$relations = [



		'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),



		//'sites_names' => \App\Sites::get()->pluck('title', 'id')->prepend('All', ''),



		'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),



		'res' => $formfieldarray, 

       'validres' => $validres,


		



		];    



		



		return view('editfiresecurity', $relations);



		}



		







		  return view('firesecurity', $relations);



 



		} 







		if($segment3 == '2'){



		



		 



		$segment1 = Request::segment(1);



		$segment2 = Request::segment(2);

       $segment4 = Request::segment(4);

		



		



		$siteid = $segment2;



		$reportdate = date("Y-m-d");



		$formfieldarray = array();
		$dgconsumparray = array();
		
		
		$relations = [



		'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),



		//'sites_names' => \App\Sites::get()->pluck('title', 'id')->prepend('All', ''),



		'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),



		'res' => $formfieldarray, 
		
		'dgconsuption' =>$dgconsumparray,


		];    


          	$reportdate = $segment4;
		



		$resdate = date("Y-m-d", strtotime($reportdate) );



		



		$matchfields = ['site' => $siteid, 'reporton' => $resdate]; 



		//  echo "<pre>";	print_r($matchfields); echo "</pre>";



		// $formfieldarray = \App\Fmsdailyreport::where($matchfields)->first();




		$res_count = \App\Fmsdailyreport::where($matchfields)->count();




		if($res_count > 0){



		$formfieldarray = \App\Fmsdailyreport::where($matchfields)->first();


           $match_dg_fields =  ['site' => $siteid, 'ref_id' => $formfieldarray->id];
		  
		  $dgconsumparray_cn = \App\Dailyfmsdieselconsumptionreport::where($match_dg_fields)->count();
         if($dgconsumparray_cn > 0){
		     $dgconsumparray = \App\Dailyfmsdieselconsumptionreport::where($match_dg_fields)->get();
		 }
		
        


		$relations = [



		'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),



		//'sites_names' => \App\Sites::get()->pluck('title', 'id')->prepend('All', ''),



		'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),



		'res' => $formfieldarray, 
		'dgconsuption' =>$dgconsumparray,


		];    

 

		return view('editfms', $relations);



		}


		  return view('fms', $relations);


		} 







		if($segment3 == '3'){



		



		 $segment1 = Request::segment(1);



		$segment2 = Request::segment(2);
		$segment4 = Request::segment(4);



		



		



		$siteid = $segment2;



		$reportdate = date("Y-m-d");
		
		$reportdate = $segment4;



		$formfieldarray = array();


		$resdate = date("Y-m-d", strtotime($reportdate) );



		
          $prev_date = date('Y-m-d', strtotime($resdate .' -1 day'));
		  
		  
       $matchprevfields =  ['site' => $siteid, 'reporton' => $prev_date]; 

		$matchfields = ['site' => $siteid, 'reporton' => $resdate]; 



		//  echo "<pre>";	print_r($matchfields); echo "</pre>";



		// $formfieldarray = \App\Fmsdailyreport::where($matchfields)->first();



		
        $prev_apms_pending = "";
		 $prev_project_pending = "";

		$prev_count = \App\Pmsdailyreport::where($matchprevfields)->count();
		if($prev_count > 0){
		  $formfieldprevarray = \App\Pmsdailyreport::where($matchprevfields)->first();
		  $prev_apms_pending = $formfieldprevarray->apna_apms_pending;
		  $prev_project_pending = $formfieldprevarray->apna_project_pending; 
		}
		  


		$res_count = \App\Pmsdailyreport::where($matchfields)->count();



		



		if($res_count > 0){



		$formfieldarray = \App\Pmsdailyreport::where($matchfields)->first();



		



		$relations = [



		'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),



		//'sites_names' => \App\Sites::get()->pluck('title', 'id')->prepend('All', ''),



		'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),



		'res' => $formfieldarray, 
		
		'pending_apna_apms' => $prev_apms_pending,
		
        'pending_apna_project' => $prev_project_pending,


		];    

       

		return view('editpms', $relations);



		} 
    
		$relations = [



		'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),



		//'sites_names' => \App\Sites::get()->pluck('title', 'id')->prepend('All', ''),



		'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),



		'res' => $formfieldarray, 
		
		'pending_apna_apms' => $prev_apms_pending,
		
        'pending_apna_project' => $prev_project_pending,


  
		];    

  
 
      

		  return view('pms', $relations);







		} 







		if($segment3 == '4'){



		



		   	 $segment1 = Request::segment(1);



		$segment2 = Request::segment(2);

$segment4 = Request::segment(4);

		



		



		$siteid = $segment2;



		$reportdate = date("Y-m-d");



		$formfieldarray = array();



		$reportdate = $segment4;



		$resdate = date("Y-m-d", strtotime($reportdate) );


       
		



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



		



		];    



		



		return view('editsecurity', $relations);



		} 







		  return view('security', $relations);







		} 







		 else{







		  return view('dailyreports.index', $relations);







		 }







		  







    }


// ************************ END CONSTRUCTION *********************************//
	



	



	 public function getformdata(Request $request)


    {



	   $segment1 = Request::segment(1);



		$segment2 = Request::segment(2);



		$segment3 = Request::segment(3);


		$siteid = $segment2;



		$reportdate = $segment3;   



		  $formfieldarray = array();
		  $dgconsumparray = array();




		$resdate = date("Y-m-d", strtotime($reportdate) );



		   if(isset($reportdate)) {



			   $matchfields = ['site' => $siteid, 'reporton' => $resdate]; 

			$res_count = \App\Fmsdailyreport::where($matchfields)->count();

			if($res_count > 0){

			    $formfieldarray = \App\Fmsdailyreport::where($matchfields)->first();
				 $match_dg_fields =  ['site' => $siteid, 'ref_id' => $formfieldarray->id];
		  
		  $dgconsumparray_cn = \App\Dailyfmsdgsetreport::where($match_dg_fields)->count();
         if($dgconsumparray_cn > 0){
		     $dgconsumparray = \App\Dailyfmsdgsetreport::where($match_dg_fields)->get();
		 }

				 $relations = [

 

            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
  


			//'sites_names' => \App\Sites::get()->pluck('title', 'id')->prepend('All', ''),



			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),



			'res' => $formfieldarray, 
			'dgconsuption' =>$dgconsumparray,

        ];    
		return view('editfms', $relations);

			}
		   } 

		 $relations = [
 


            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),

			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),

			'res' => $formfieldarray, 
			
			'dgconsuption' =>$dgconsumparray,

        ];    


		return view('fms', $relations);


	}



	



	



		 public function getpmsformdata(Request $request)







    {



	   $segment1 = Request::segment(1);



		$segment2 = Request::segment(2);



		$segment3 = Request::segment(3);



		



		$siteid = $segment2;



		$reportdate = $segment3;  



		  $formfieldarray = array();



		



		$resdate = date("Y-m-d", strtotime($reportdate) );
		
		 $prev_date = date('Y-m-d', strtotime($resdate .' -1 day'));



		   if(isset($reportdate)) {



		   	 
$matchprevfields =  ['site' => $siteid, 'reporton' => $prev_date]; 


			   $matchfields = ['site' => $siteid, 'reporton' => $resdate]; 



			$res_count = \App\Pmsdailyreport::where($matchfields)->count();



			


$prev_apms_pending = "";
		 $prev_project_pending = "";

		$prev_count = \App\Pmsdailyreport::where($matchprevfields)->count();
		if($prev_count > 0){
		  $formfieldprevarray = \App\Pmsdailyreport::where($matchprevfields)->first();
		  $prev_apms_pending = $formfieldprevarray->apna_apms_pending;
		  $prev_project_pending = $formfieldprevarray->apna_project_pending; 
		}
			



			



			if($res_count > 0){



			    $formfieldarray = \App\Pmsdailyreport::where($matchfields)->first();



				


	$relations = [



		'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),



		//'sites_names' => \App\Sites::get()->pluck('title', 'id')->prepend('All', ''),



		'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),



		'res' => $formfieldarray, 
		
		'pending_apna_apms' => $prev_apms_pending,
		
        'pending_apna_project' => $prev_project_pending,


		];    





//return view('underconstruction', $relations);

		return view('editpms', $relations);



			}



			  



			



		   }  



		      



			



			



		



			$relations = [



		'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),



		//'sites_names' => \App\Sites::get()->pluck('title', 'id')->prepend('All', ''),



		'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),



		'res' => $formfieldarray, 
		
		'pending_apna_apms' => $prev_apms_pending,
		
        'pending_apna_project' => $prev_project_pending,


  
		];    





//return view('underconstruction', $relations);

		return view('pms', $relations);


	}



	 public function getfiresafeformdata(Request $request)

    {
	   $segment1 = Request::segment(1);



		$segment2 = Request::segment(2);



		$segment3 = Request::segment(3);


        $validres = array();
		$siteid = $segment2;

		
      $matchValidFields = ['site' => $siteid]; 
		$valid_count = \App\Firesafedailyreportvalidation::where($matchValidFields)->count();
		
		if($valid_count > 0){
			$validres = \App\Firesafedailyreportvalidation::where($matchValidFields)->first();
		}


		$siteid = $segment2;

		$reportdate = $segment3;

		  $formfieldarray = array();


		$resdate = date("Y-m-d", strtotime($reportdate) );



		   if(isset($reportdate)) {

			$matchfields = ['site' => $siteid, 'reporton' => $resdate]; 


			$res_count = \App\Firesafedailyreport::where($matchfields)->count();
			
			$matchValidFields = ['site' => $siteid]; 


			if($res_count > 0){



			    $formfieldarray = \App\Firesafedailyreport::where($matchfields)->first(); 
				
				$valid_count = \App\Firesafedailyreportvalidation::where($matchValidFields)->count();

                if($valid_count > 0){
				  $validres = \App\Firesafedailyreportvalidation::where($matchValidFields)->first();
				}
				 $relations = [ 



            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			
			//'sites_names' => \App\Sites::get()->pluck('title', 'id')->prepend('All', ''),



			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),

  

			'res' => $formfieldarray,
			
			'validres' => $validres,



        ];    



		



		return view('editfiresecurity', $relations);



			}



			  



			//echo "sssssssssssss".$res_count;



			



		//echo "<pre>";	print_r($formfieldarray); echo "</pre>";



			//exit;



		   } 



		      



			



			



		



		 $relations = [



            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),



			//'sites_names' => \App\Sites::get()->pluck('title', 'id')->prepend('All', ''),



			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),



			'res' => $formfieldarray, 


           'validres' => $validres,
			 



        ];    







		return view('firesecurity', $relations);



	



	}



	



	



	



	



	 public function getsecurityformdata(Request $request)







    {



	   $segment1 = Request::segment(1);



		$segment2 = Request::segment(2);



		$segment3 = Request::segment(3);



		



		$siteid = $segment2;



		$reportdate = $segment3;  



		  $formfieldarray = array();



		



		$resdate = date("Y-m-d", strtotime($reportdate) );



		   if(isset($reportdate)) {



		   	 



			   $matchfields = ['site' => $siteid, 'reporton' => $resdate]; 



			



			 



			$res_count = \App\Securitydailyreport::where($matchfields)->count();



			



			



			



			if($res_count > 0){



			    $formfieldarray = \App\Securitydailyreport::where($matchfields)->first();



				



				 $relations = [



            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),



			//'sites_names' => \App\Sites::get()->pluck('title', 'id')->prepend('All', ''),



			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),



			'res' => $formfieldarray, 



			  



        ];      







		return view('editsecurity', $relations);



			}



			  



			



		   }  



		      



			



			



		



		 $relations = [



            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),



			//'sites_names' => \App\Sites::get()->pluck('title', 'id')->prepend('All', ''),



			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),



			'res' => $formfieldarray, 



			 



        ];    







		return view('security', $relations);



	



	}



	  



	



	



	 public function store(StoreFpmRequest $request)

    { 
	
		
		$isverify = array();
		
		$isverify = $request['lists_verified'];
		//echo "<pre>"; print_r($isverify); echo "</pre>"; exit;
		
		$verify_str = ""; 
		
		$edata = $request->all();
		
		$redate = $edata['reporton'];
		$resdate = date("Y-m-d", strtotime($redate));
		// echo $resdate;
		
		$request['reporton'] = $resdate;
		
		if(count($isverify) > 0){
		
		$verify_str = implode(",",$isverify);
		} 
		
		$request['lists_verified'] = $verify_str;
		$site = $edata['site'];
		
		// echo "<pre>"; print_r($request->all()); echo "</pre>"; exit;
		
		$matchfields = ['site' => $site, 'reporton' => $resdate]; 
		
		
		$res_count = \App\Fmsdailyreport::where($matchfields)->count();
		
		if($res_count > 0){
		$formfieldarray = \App\Fmsdailyreport::where($matchfields)->first();
		
		$request['record_id'] = $formfieldarray->id;
		$id = $request['record_id'];
		$report = Fmsdailyreport::findOrFail($id);
		
		
		
		// LOCK TIME
		$resdate = date("Y-m-d", strtotime($redate));
		$res_ar =  checkDailyStatus($resdate, $site );
		if($res_ar[1] == 'yes'){}else{
		$locktime = 0;
		$redate = $edata['reporton'];
		$reporton_time = strtotime($redate);
		 $did = 1;
		 $gettime = Dailylocktime::find($did);
		  if($gettime){
		   $timeinterval = $gettime->daylocktime;
			$lock_format =  date("H:i", strtotime($timeinterval));
			 $locktime_tfr =   $lock_format.":00"; 
			 $time = $locktime_tfr;
              $locktime = strtotime($time) - strtotime('TODAY');
			 
			}
			$today_time = time();
			$consttime = 24*60*60;
			$tot_comp_time = (24*60*60) + $locktime;
			$res_time =  $today_time  - $reporton_time;
			
			if($res_time > (24*60*60 + $locktime)) {
			   $request['blockflag'] = 1;
			} 
		}  
		
		// END LOCK TIME
		
		$report->update($request->all());
		$diconsumptn = array();  
		 DB::table('dailyfmsdieselconsumptionreports')->where('ref_id', '=', $request['record_id'])->delete();
		$last_insert_id = $request['record_id'];
		 if(isset($edata['dgblock'])) {
		 if(count($edata['dgblock']) > 0){
		 	   foreach($edata['present_dg_runtm'] as $ckey => $consuption){
			   		if($consuption){ 
					  $diconsumptn = array("site"=>$site,"dgblock"=>$edata['dgblock'][$ckey],"present_dg_runtm"=>$edata['present_dg_runtm'][$ckey],"prev_dg_runtm"=>$edata['prev_dg_runtm'][$ckey],"dg_run_difference"=>$edata['dg_run_difference'][$ckey],"present_dg_units"=>$edata['present_dg_units'][$ckey],"prev_dg_units"=>$edata['prev_dg_units'][$ckey],"dg_units_difference"=>$edata['dg_units_difference'][$ckey],"dg_diesel_op_con"=>$edata['dg_diesel_op_con'][$ckey],"dg_diesel_clos_con"=>$edata['dg_diesel_clos_con'][$ckey],"dg_diesel_diff_con"=>$edata['dg_diesel_diff_con'][$ckey],"dg_diesel_filled"=>$edata['dg_diesel_filled'][$ckey],"ref_id"=>$last_insert_id,"reporton"=>$resdate);  
					 
					  $insertcon = Dailyfmsdieselconsumptionreport::create($diconsumptn);  
					} 
			   }
		 }    
		 }
		 
		  
		}
		else{
		
		// Lock Update
		$request['blockflag'] = 0;
		$locktime = 0;
		$redate = $edata['reporton'];
		$reporton_time = strtotime($redate);
		 $did = 1;
		 $gettime = Dailylocktime::find($did);
		  if($gettime){
		   $timeinterval = $gettime->daylocktime;
			$lock_format =  date("H:i", strtotime($timeinterval));
			 $locktime_tfr =   $lock_format.":00"; 
			 $time = $locktime_tfr;
              $locktime = strtotime($time) - strtotime('TODAY');
			 
			}
			$today_time = time();
			$consttime = 24*60*60;
			$tot_comp_time = (24*60*60) + $locktime;
			$res_time =  $today_time  - $reporton_time;
			
			if($res_time > (24*60*60 + $locktime)) {
			   $request['blockflag'] = 1;
			} 
			
			
			//echo   $request['blockflag'];
		 //	exit;
			
		// End Lock Update
		
		$insert = Fmsdailyreport::create($request->all());
		$last_insert_id = $insert->id;
		$diconsumptn = array();
		 if(isset($edata['dgblock'])) {
		 if(count($edata['dgblock']) > 0){
		 	   foreach($edata['present_dg_runtm'] as $ckey => $consuption){
			   		if($consuption){ 
					  //$diconsumptn = array("site"=>$site,"dgblock"=>$edata['dgblock'][$ckey],"dgrun_hr"=>$edata['dgrun_hr'][$ckey],"dgrun_die_consump"=>$edata['dgrun_die_consump'][$ckey],"dgrun_un_grn"=>$edata['dgrun_un_grn'][$ckey],"ref_id"=>$last_insert_id);   
					   $diconsumptn = array("site"=>$site,"dgblock"=>$edata['dgblock'][$ckey],"present_dg_runtm"=>$edata['present_dg_runtm'][$ckey],"prev_dg_runtm"=>$edata['prev_dg_runtm'][$ckey],"dg_run_difference"=>$edata['dg_run_difference'][$ckey],"present_dg_units"=>$edata['present_dg_units'][$ckey],"prev_dg_units"=>$edata['prev_dg_units'][$ckey],"dg_units_difference"=>$edata['dg_units_difference'][$ckey],"dg_diesel_op_con"=>$edata['dg_diesel_op_con'][$ckey],"dg_diesel_clos_con"=>$edata['dg_diesel_clos_con'][$ckey],"dg_diesel_diff_con"=>$edata['dg_diesel_diff_con'][$ckey],"dg_diesel_filled"=>$edata['dg_diesel_filled'][$ckey],"ref_id"=>$last_insert_id,"reporton"=>$resdate);   
					  $insertcon = Dailyfmsdieselconsumptionreport::create($diconsumptn);  
					} 
			   }
		 } 
		 }   
		}   
		
		//return redirect()->route('dailyreports.index');
			
		return redirect()->route('dailyreportsdetail.index3',$site);



    }

	



	 public function storepms(StorePmsRequest $request)







    {   





  $edata = $request->all();
  //echo $edata['reasontext'];

         
		  // echo "<pre>"; print_r($request->all()); echo "</pre>";



		  
         
$site = $edata['site'];

		   $redate = $request['reporton'];



		



			$resdate = date("Y-m-d", strtotime($redate) );



		    // echo $resdate;



			$request['reporton'] = $resdate;

			



		   //echo "<pre>"; print_r($request->all()); echo "</pre>"; exit;



		   



		   if(isset($request['record_id'])){



		      if($request['record_id'] > 0){

			        $id = $request['record_id'];



					$report = Pmsdailyreport::findOrFail($id);
					
					// LOCK TIME
		$resdate = date("Y-m-d", strtotime($redate));
		$res_ar =  checkDailyStatus($resdate, $site );
		if($res_ar[2] == 'yes'){}else{
		$locktime = 0;
		$redate = $edata['reporton'];
		$reporton_time = strtotime($redate);
		 $did = 1;
		 $gettime = Dailylocktime::find($did);
		  if($gettime){
		   $timeinterval = $gettime->daylocktime;
			$lock_format =  date("H:i", strtotime($timeinterval));
			 $locktime_tfr =   $lock_format.":00"; 
			 $time = $locktime_tfr;
              $locktime = strtotime($time) - strtotime('TODAY');
			 
			}
			$today_time = time();
			$consttime = 24*60*60;
			$tot_comp_time = (24*60*60) + $locktime;
			$res_time =  $today_time  - $reporton_time;
			
			if($res_time > (24*60*60 + $locktime)) {
			   $request['blockflag'] = 1;
			} 
		}  
		
		// END LOCK TIME 

 

					 $report->update($request->all());  



					 



					 //return redirect()->route('dailyreports.index');
					 
					 return redirect()->route('dailyreportsdetail.index3',$site);



				}



		   } 



		 else{
		 
		   
		   		// Lock Update
		$request['blockflag'] = 0;
		$locktime = 0;
		$redate = $edata['reporton'];
		$reporton_time = strtotime($redate);
		 $did = 1;
		 $gettime = Dailylocktime::find($did);
		  if($gettime){
		   $timeinterval = $gettime->daylocktime;
			$lock_format =  date("H:i", strtotime($timeinterval));
			 $locktime_tfr =   $lock_format.":00"; 
			 $time = $locktime_tfr;
              $locktime = strtotime($time) - strtotime('TODAY');
			 
			}
			$today_time = time();
			$consttime = 24*60*60;
			$tot_comp_time = (24*60*60) + $locktime;
			$res_time =  $today_time  - $reporton_time;
			
			if($res_time > (24*60*60 + $locktime)) {
			   $request['blockflag'] = 1;
			} 
			
			
			//echo   $request['blockflag'];
		 //	exit;
			
		// End Lock Update



          Pmsdailyreport::create($request->all());







           //return redirect()->route('dailyreports.index');
		   
		   return redirect()->route('dailyreportsdetail.index3',$site);



		}



 



    }



	

// STORE DAILY LOCK TIME

	
	public function storedailylock(StoreDailyLocktime $request)


    {   


  $edata = $request->all();

           // $loctime = $edata['daylocktime'];

			        $id = "1";

					$report = Dailylocktime::findOrFail($id);
					 $report->update($request->all());  
					 
					 $relations = [

		'lock_time' => \App\Dailylocktime::where('id', '=', '1')->first(),

		];    

		   
		 //  return view('dailylocktime.daylocktime',$relations);
		   
		    return redirect()->route('dailyreports.dailylocktime',$relations);
	


    }



// END STORE DAILY LOCK TIME

	



	



	



	 public function storesecurity(StoreSecurityRequest $request)







    {   







         // echo "<pre>"; //print_r($request->all()); echo "</pre>";



		  



		   



		   



		



		    //echo "<pre>"; print_r($isverify); echo "</pre>"; exit;



		  



		   $redate = $request['reporton'];


  $edata = $request->all();
		
		$site = $edata['site'];



			$resdate = date("Y-m-d", strtotime($redate) );



		    // echo $resdate;



			$request['reporton'] = $resdate;



		  



		   //echo "<pre>"; print_r($request->all()); echo "</pre>"; exit;



		   



		   if(isset($request['record_id'])){



		      if($request['record_id'] > 0){



			//  echo "<pre>"; print_r($request->all()); echo "</pre>";



			       



			        $id = $request['record_id'];



					$report = Securitydailyreport::findOrFail($id);

                      	// LOCK TIME
		$resdate = date("Y-m-d", strtotime($redate));
		$res_ar =  checkDailyStatus($resdate, $site );
		if($res_ar[3] == 'yes'){}else{
		$locktime = 0;
		$redate = $edata['reporton'];
		$reporton_time = strtotime($redate);
		 $did = 1;
		 $gettime = Dailylocktime::find($did);
		  if($gettime){
		   $timeinterval = $gettime->daylocktime;
			$lock_format =  date("H:i", strtotime($timeinterval));
			 $locktime_tfr =   $lock_format.":00"; 
			 $time = $locktime_tfr;
              $locktime = strtotime($time) - strtotime('TODAY');
			 
			}
			$today_time = time();
			$consttime = 24*60*60;
			$tot_comp_time = (24*60*60) + $locktime;
			$res_time =  $today_time  - $reporton_time;
			
			if($res_time > (24*60*60 + $locktime)) {
			   $request['blockflag'] = 1;
			} 
		}  
		
		// END LOCK TIME 


					 $report->update($request->all());  



					 



					// return redirect()->route('dailyreports.index');
					 
					 	   return redirect()->route('dailyreportsdetail.index3',$site);



				}



		   } 



		 else{
		 
		 
		   // Lock Update
		$request['blockflag'] = 0;
		$locktime = 0;
		$redate = $edata['reporton'];
		$reporton_time = strtotime($redate);
		 $did = 1;
		 $gettime = Dailylocktime::find($did);
		  if($gettime){
		   $timeinterval = $gettime->daylocktime;
			$lock_format =  date("H:i", strtotime($timeinterval));
			 $locktime_tfr =   $lock_format.":00"; 
			 $time = $locktime_tfr;
              $locktime = strtotime($time) - strtotime('TODAY');
			 
			}
			$today_time = time();
			$consttime = 24*60*60;
			$tot_comp_time = (24*60*60) + $locktime;
			$res_time =  $today_time  - $reporton_time;
			
			if($res_time > (24*60*60 + $locktime)) {
			   $request['blockflag'] = 1;
			} 
			
			
			//echo   $request['blockflag'];
		 //	exit;
			
		// End Lock Update

               

          Securitydailyreport::create($request->all());



 return redirect()->route('dailyreportsdetail.index3',$site);



          // return redirect()->route('dailyreports.index');



		}



 



    }



	



	 public function storefiresafe(StoreFiresafeRequest $request)







    {   







         // echo "<pre>"; //print_r($request->all()); echo "</pre>";



		  

  $edata = $request->all();
		
		$site = $edata['site'];


		     $isverify = array();



			 $trainpeo = array();



		   $isverify = $request['trainsubject'];



		   $trainpeo = $request['trainedpeople'];



		    //echo "<pre>"; print_r($isverify); echo "</pre>"; exit;



		   $verify_str = "";



		  $train_str = "";



		   if(count($isverify) > 0){



		   	  $verify_str = implode(",",$isverify);



		   } 



		   $request['trainsubject'] = $verify_str;



		   



		     if(count($trainpeo) > 0){



		   	  $train_str = implode(",",$trainpeo);



		   } 



		   $request['trainedpeople'] = $train_str;



		   



		



		    //echo "<pre>"; print_r($isverify); echo "</pre>"; exit;



		  



		   $redate = $request['reporton'];



		



			$resdate = date("Y-m-d", strtotime($redate) );



		    // echo $resdate;



			$request['reporton'] = $resdate;



			



			



		  



		   // echo "<pre>"; print_r($request->all()); echo "</pre>"; exit;



		   



		   if(isset($request['record_id'])){



		      if($request['record_id'] > 0){



			//  echo "<pre>"; print_r($request->all()); echo "</pre>";



			       



			        $id = $request['record_id'];



					$report = Firesafedailyreport::findOrFail($id);
					
					// LOCK TIME
		$resdate = date("Y-m-d", strtotime($redate));
		$res_ar =  checkDailyStatus($resdate, $site );
		if($res_ar[0] == 'yes'){}else{
		$locktime = 0;
		$redate = $edata['reporton'];
		$reporton_time = strtotime($redate);
		 $did = 1;
		 $gettime = Dailylocktime::find($did);
		  if($gettime){
		   $timeinterval = $gettime->daylocktime;
			$lock_format =  date("H:i", strtotime($timeinterval));
			 $locktime_tfr =   $lock_format.":00"; 
			 $time = $locktime_tfr;
              $locktime = strtotime($time) - strtotime('TODAY');
			 
			}
			$today_time = time();
			$consttime = 24*60*60;
			$tot_comp_time = (24*60*60) + $locktime;
			$res_time =  $today_time  - $reporton_time;
			
			if($res_time > (24*60*60 + $locktime)) {
			   $request['blockflag'] = 1;
			} 
		}  
		
		// END LOCK TIME 




					 $report->update($request->all());  



					 



					 //return redirect()->route('dailyreports.index');
					  return redirect()->route('dailyreportsdetail.index3',$site);



				}



		   }



		 else{


    // Lock Update
		$request['blockflag'] = 0;
		$locktime = 0;
		$redate = $edata['reporton'];
		$reporton_time = strtotime($redate);
		 $did = 1;
		 $gettime = Dailylocktime::find($did);
		  if($gettime){
		   $timeinterval = $gettime->daylocktime;
			$lock_format =  date("H:i", strtotime($timeinterval));
			 $locktime_tfr =   $lock_format.":00"; 
			 $time = $locktime_tfr;
              $locktime = strtotime($time) - strtotime('TODAY');
			 
			}
			$today_time = time();
			$consttime = 24*60*60;
			$tot_comp_time = (24*60*60) + $locktime;
			$res_time =  $today_time  - $reporton_time;
			
			if($res_time > (24*60*60 + $locktime)) {
			   $request['blockflag'] = 1;
			} 
			
			
			//echo   $request['blockflag'];
		 //	exit;
			
		// End Lock Update


          Firesafedailyreport::create($request->all());

          // return redirect()->route('dailyreports.index');
		    return redirect()->route('dailyreportsdetail.index3',$site);



		}



 



    }











	



	



	



	



	



	



	 public function printpage(Request $request)







    {







      $segment1 = Request::segment(1);



	  $segment2 = Request::segment(2);



	  $segment2 = Request::segment(3);



		



       $relations = [



            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),



			//'sites_names' => \App\Sites::get()->pluck('title', 'id')->prepend('All', ''),



			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),



			'sites_attr_names' =>  \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id'),



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



	  



	



	 public function printfpmpage(Request $request)







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





//return view('fmsdownload', $relations);

		  return view('fmsprint', $relations);



		







    }



	



	



	 public function printpmspage(Request $request)







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







		  return view('pmsprint', $relations);



		







    }









 public function printsecuritypage(Request $request)







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







		  return view('securityprint', $relations);



		







    }









	



	



	 public function printfiresafepage(Request $request)







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







		  return view('firesecurityprint', $relations);



		







    }



	



	

	

	 public function downloadsecurepage(Request $request)



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
		
		
		      $sitename=get_sitename($segment2);
            
			$file_name = $sitename."_".$reportdate."_security."."pdf";
			
		 $pdf = PDF::loadView('securitydownload', $relations);

        return $pdf->download($file_name); //Download        

         //return $pdf->stream('security.pdf'); //Stream 
		 
		 
		 
		  //return view('securitydownload', $relations);


    } 
	
	
	// DOWNLOAD PMS PAGE
	
	
	 public function downloadpmspage(Request $request)



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



              $sitename=get_sitename($segment2);
            
			$file_name = $sitename."_".$reportdate."_pms."."pdf";
			
		
		

		 $pdf = PDF::loadView('pmsdownload', $relations);

         return $pdf->download($file_name); //Download        

       // return $pdf->stream('pms.pdf'); //Stream 
	   
	    // return view('pmsdownload', $relations);


    } 


 // FMS PRINT PAGE
 	 public function downloadfmspage(Request $request)

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

		$resdate = date("Y-m-d", strtotime($reportdate) );



		   if(isset($reportdate)) {

			   $matchfields = ['site' => $siteid, 'reporton' => $resdate]; 


			$res_count = \App\Fmsdailyreport::where($matchfields)->count();
			if($res_count > 0){
		    $formfieldarray = \App\Fmsdailyreport::where($matchfields)->first();
			$relations = [
            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),
			'res' => $formfieldarray, 
			'datefilter' => $segment3,
			'sitefilter' => $segment2,
        ];    



		}   



		}  

           $sitename=get_sitename($segment2);
            
			$file_name = $sitename."_".$reportdate."_fms."."pdf";
			
        // return view('fmsdownload', $relations);
		$pdf = PDF::loadView('fmsdownload', $relations);
		return $pdf->download($file_name); 
		
		// return view('fmsdownload', $relations);

    }


 
  // FIRE SAFE DOWNLOAD PAGE
   // FMS PRINT PAGE
 	 public function downloadfiresafepage(Request $request)

    { 

  $segment1 = Request::segment(1);



	  $segment2 = Request::segment(2);



	  $segment3 = Request::segment(3);

 
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

			$res_count = \App\Firesafedailyreport::where($matchfields)->count();

			if($res_count > 0){



			    $formfieldarray = \App\Firesafedailyreport::where($matchfields)->first();

				 $relations = [



            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),

			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),



			'res' => $formfieldarray, 



			'datefilter' => $segment3,



			'sitefilter' => $segment2,

        ];   
		} 
		}   

			$sitename=get_sitename($segment2);
			$file_name = $sitename."_".$reportdate."_firesafe."."pdf";
			
			
      //return view('firesecuritydownload', $relations);
		$pdf = PDF::loadView('firesecuritydownload', $relations);
		return $pdf->download($file_name); 

    }
	
	// GET LOCK PERMISSIONS
		 public function lockpermission(Request $request)

    { 
		$users = array();
		$did = 1;
		  $gettime = Dailylocktime::find($did);
		  if($gettime){
		   $timeinterval = $gettime->daylocktime;
			$currenttime = date('H:i A');
			$timef = date("H:i", strtotime($timeinterval)).":00";
			$datef  = date("Y-m-d");
			$tot_date =   $datef." ".$timef;
			$time_diff = time() - strtotime($tot_date); 
			
		
			/*if($time_diff < 0){
			 
			 $users = array();
			}
			else{ */
			
			 $users = \App\User::where('id', '!=', '1')->get();
			//}
			} 
			$users = \App\User::where('id', '!=', '1')->get(); 
			$perarray = array();
			$lstatus = array();
			if(count($users) > 0){
			   foreach($users as $user){
			      $user_id = $user->id;
				   //$perdate = date("Y-m-d");
			        $dailypermission_cn = \App\Dailylockpermission::where('user_id','=',$user_id)->count();
					if($dailypermission_cn > 0){
					  $dailypermission_res = \App\Dailylockpermission::where('user_id','=',$user_id)->first();
					  $perarray[$user->id] =  $user->id;
					  $lstatus[$user->id]['lockstatus'] = $dailypermission_res->lockstatus;
					}
					else{ 
					  $perarray[$user->id] = 0;
					}
				}
			}
			
			 $relations = [
			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', ''),
             'users' =>  $users,
			 'permissions' => \App\Dailylockpermission::get(), 
			 'perstatus' =>  $perarray,
			 'lstatus' => $lstatus,
        ]; 
		
		return view('lockpermission.index', $relations);
  
    }
	
	
	 public function sentsms(Request $request)

    {   
	

	date_default_timezone_set('Asia/Kolkata');
     $timestamp = date("Y-m-d H:i:s");
	 
	$fusers = array();
	$notented = array();
	$notented_ind = array();
	$sitearr =  \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
	 $notentered_sites = array();
	  if (count($sitearr) > 0) {
        foreach ($sitearr as $kk => $client) {
		   $dateval =  date('d-m-Y'); 
		   $rdate = date('Y-m-d', strtotime($dateval));
		   $prev_date = date('Y-m-d', strtotime($rdate .' -1 day'));
		   $date = date('d-m-Y', strtotime($prev_date));
            $resarr =  checkDailyStatus($date, $kk); 
			if($kk == 8 || $kk == 14 || $kk == 19 || $kk == 16 || $kk == 87 || $kk == 17){
			
			  if( $resarr[1] == 'yes' && $resarr[2] == 'yes' && $resarr[3] == 'yes'){
			     
			}else{
			   $notented[$kk] = $client;
			   $notentered_sites[] = $kk;  
			}
			if($resarr[1] == 'yes'){}else{
			  $notented_ind['fms'][$kk] = $client;
			  $notentered_sites[] = $kk;
			}
			if($resarr[2] == 'yes'){}else{
			  $notented_ind['pms'][$kk] = $client;
			  $notentered_sites[] = $kk;
			}
			if($resarr[3] == 'yes'){}else{
			  $notented_ind['security'][$kk] = $client;
			  $notentered_sites[] = $kk;
			}
			
			}
			else if($kk == 12){
			
			  if( $resarr[3] == 'yes'){
			  
			}else{
			   $notented[$kk] = $client;
			   $notentered_sites[] = $kk;
			}
			if($resarr[3] == 'yes'){}else{
			  $notented_ind['security'][$kk] = $client;
			  $notentered_sites[] = $kk;
			}
			
			}
			else {
			if($resarr[0] == 'yes' && $resarr[1] == 'yes' && $resarr[2] == 'yes' && $resarr[3] == 'yes'){
			  
			}else{
			   $notented[$kk] = $client;
			   $notentered_sites[] = $kk;
			}
			if($resarr[0] == 'yes'){}else{
			  $notented_ind['firesafe'][$kk] = $client;
			  $notentered_sites[] = $kk;
			}
			
			if($resarr[1] == 'yes'){}else{
			  $notented_ind['fms'][$kk] = $client;
			  $notentered_sites[] = $kk;
			}
			if($resarr[2] == 'yes'){}else{
			  $notented_ind['pms'][$kk] = $client;
			  $notentered_sites[] = $kk;
			}
			if($resarr[3] == 'yes'){}else{
			  $notented_ind['security'][$kk] = $client;
			  $notentered_sites[] = $kk;
			}
			}
			   
		  }
		}
		

		 
	
		 $array_un = array_unique($notentered_sites);
		// print_r($array_un);
		 
		 $fusers = array();
		 foreach($array_un as $arrv){
		   $fusers[] = \App\User::where('id', '!=', '1')->where('community','=',$arrv)->get()->pluck('name', 'id');
		 }
		$final_users = array(); 
		
       // PMS
	   
	    $pms_lock_sites = $notented_ind['pms'];
		 foreach($pms_lock_sites as $key => $arrv){
		    $pms_lock_users = User::select('users.id','users.name','roles.permisstatus as permission')->leftJoin('roles','roles.id','=','users.role_id')->where('community','=',$key) ->whereRaw("find_in_set('edit_pms',roles.permisstatus)")->get();
		      $final_users[] = $pms_lock_users ;
		 }
		 
		 // FMS
		 $fms_lock_sites = $notented_ind['fms'];
		 foreach($fms_lock_sites as $key => $arrv){
		    $fms_lock_users = User::select('users.id','users.name','roles.permisstatus as permission')->leftJoin('roles','roles.id','=','users.role_id')->where('community','=',$key) ->whereRaw("find_in_set('edit_fms',roles.permisstatus)")->get();
		      $final_users[] = $fms_lock_users ;
		 }
		 
		 // FIRESAFETY
		 
		 $firesafe_lock_sites = $notented_ind['firesafe'];
		 foreach($firesafe_lock_sites as $key => $arrv){
		    $firesa_lock_users = User::select('users.id','users.name','roles.permisstatus as permission')->leftJoin('roles','roles.id','=','users.role_id')->where('community','=',$key) ->whereRaw("find_in_set('edit_firesafety',roles.permisstatus)")->get();
		      $final_users[] = $firesa_lock_users ;
		 }
		 
		  // Security
		 
		 $secure_lock_sites = $notented_ind['security'];
		 foreach($secure_lock_sites as $key =>$arrv){
		    $secu_lock_users = User::select('users.id','users.name','roles.permisstatus as permission')->leftJoin('roles','roles.id','=','users.role_id')->where('community','=',$key) ->whereRaw("find_in_set('edit_security',roles.permisstatus)")->get();
		      $final_users[] = $secu_lock_users ;
		 }
		
		$finalus = array();
		foreach($final_users as $fuserv){
		foreach($fuserv as $fu){
		   $finalus[$fu->id] = $fu->name;
		
		 }
		}
		
		   
		$string = "";
		$cn = count($notented);
		if($cn > 0){
		   $string = implode(",",$notented);
		}
		
		$firesafe_string = "";
		$frs_cn = count($notented_ind['firesafe']);
		if($frs_cn > 0){
		   $firesafe_string = implode(",",$notented_ind['firesafe']);
		}
		
		$fms_string = "";
		$fms_cn = count($notented_ind['fms']);
		if($fms_cn > 0){
		   $fms_string = implode(",",$notented_ind['fms']);
		}
		
		$pms_string = "";
		$pms_cn = count($notented_ind['pms']);
		if($pms_cn > 0){
		   $pms_string = implode(",",$notented_ind['pms']);
		}
		
		$secu_string = "";
		$secu_cn = count($notented_ind['security']);
		if($secu_cn > 0){
		   $secu_string = implode(",",$notented_ind['security']);
		}
		
		
		 $did = 1;
		  $gettime = Dailylocktime::find($did);
		  if($gettime){
		   $timeinterval = $gettime->daylocktime;
			$currenttime = date('H:i A');
			$timef = date("H:i", strtotime($timeinterval)).":00";
			$datef  = date("Y-m-d");
			$tot_date =   $datef." ".$timef;
			$time_diff = time() - strtotime($tot_date); 
			 $timestamp = date("Y-m-d H:i:s");
			//$myfile = fopen("cronfolder/test".$timestamp."file.txt", "w");
			
			$curtimr = time();
			$checktime =  strtotime($tot_date);
			$excesstime = (int)$checktime + 60;
			/*  $curtimr."<br/>";
			  echo $checktime."<br/>";
			   echo $excesstime."<br/>"; */
			   
			   
			   
			   	
			
			// UPDATE LOCKTIME
			   
			  
			  
			//if($curtimr >= $checktime && $curtimr <=  $excesstime) {
			
			    // UNLOCK UESRS
				
     /* if(count($fusers) > 0 ) {
     foreach($fusers as $frr){
		  	 foreach($frr as $uk => $fr){
			$dailypermission_cn = Dailylockpermission::
			//where('permissiondate', '=', $perdate)
			where('user_id', '=', $uk)
			->count();
			
			if($dailypermission_cn > 0){
			
			$dailypermission_res = Dailylockpermission::
			//where('permissiondate', '=', $perdate)
			where('user_id', '=', $uk)
			->first();
			
			
			$comment = Dailylockpermission::findOrFail($dailypermission_res->id);
			
			$etinfo = [
			'lockstatus' => 'rejected'
			];
			
			$comment->update($etinfo);
			
			}else{
			
			$etinfo = array( 
			'user_id' => $uk,
			'permissiondate' => date('Y-m-d'),
			'lockstatus' => 'rejected'
			);
			
			$insert = Dailylockpermission::create($etinfo);
			} 
			 
			 }
		 }  
        }  */
		
		   
		 if(count($finalus) > 0 ) {
		 
		  foreach($finalus as $uk => $fr){
		  
		    
			$dailypermission_cn = Dailylockpermission::
			//where('permissiondate', '=', $perdate)
			where('user_id', '=', $uk)
			->count();
			
			if($dailypermission_cn > 0){
			
			$dailypermission_res = Dailylockpermission::
			//where('permissiondate', '=', $perdate)
			where('user_id', '=', $uk)
			->first();
			
			
			$comment = Dailylockpermission::findOrFail($dailypermission_res->id);
			
			$etinfo = [
			'lockstatus' => 'rejected'
			];
			
			$comment->update($etinfo);
			
			}else{
			
			$etinfo = array( 
			'user_id' => $uk,
			'permissiondate' => date('Y-m-d'),
			'lockstatus' => 'rejected'
			);
			
			$insert = Dailylockpermission::create($etinfo);
			} 
			 
			 
		  
		  }
		 
		 }
		 // UNLOCK UESRS	
		  
		 
			 $timestamp = date("Y-m-d H:i:s");
			//$myfiletest = fopen("cronfoldertest/test".$timestamp."file.txt", "w");
				 $data =   $date.':Data Not Entered -'.$cn.' sites ('.$string.')';
				$data = str_replace(" ","%20",$data);  
				
				$firesafetext =  $date.':FIRE SAFETY - Data Not Entered -'.$frs_cn.' sites ('.$firesafe_string.')';
				
				 $firesafetext = str_replace(" ","%20",$firesafetext);  
				
				$fmstext =  $date.':FMS - Data Not Entered -'.$fms_cn.' sites ('.$fms_string.')';
				
				 $fmstext = str_replace(" ","%20",$fmstext);  
				
				$pmstext =  $date.':PMS - Data Not Entered -'.$pms_cn.' sites ('.$pms_string.')';
				
				 $pmstext = str_replace(" ","%20",$pmstext);  
				
				$securitytext =  $date.':SECURITY - Data Not Entered -'.$secu_cn.' sites ('.$secu_string.')'; 
				
				  $securitytext = str_replace(" ","%20",$securitytext); 
				 
				   
				
				//echo $data; 
				//9603347573
				//8499981218 
				////9502826126
				////8897289540
				//9000977822
				//9948663172 /// RKSir
				// 8247429276 // Security manager
				//7997099090 DGM SIR
				// 7997859955 // SEnior manager Kiran
				// YADAYYAH SIR 7661063311
				// $ch = curl_init('http://tra.bulksmshyderabad.co.in/websms/sendsms.aspx?userid=ZONUPT&password=tech12344&sender=ZONUPT&mobileno=9246698435,9502826126,8897289540&msg='.$data.'');  
				// $ch = curl_init('http://tra.bulksmshyderabad.co.in/websms/sendsms.aspx?userid=ZONUPT&password=tech12344&sender=ZONUPT&mobileno=9246698435,9502826126,9603347573,8499981218,9000977822,8897289540&msg='.$data.'');   
				 
				 // $ch = curl_init('http://tra.bulksmshyderabad.co.in/websms/sendsms.aspx?userid=ZONUPT&password=tech12344&sender=ZONUPT&mobileno=9246698435&msg='.$data.''); 
				 
		 $ch1 = curl_init('http://tra.bulksmshyderabad.co.in/websms/sendsms.aspx?userid=ZONUPT&password=tech12344&sender=ZONUPT&mobileno=9246698435,9502826126,9603347573,8499981218,9000977822,8897289540,9948663172,8247429276,7997099090,7997859955,7661063311&msg='.$firesafetext.''); 
				 
				 $ch2 = curl_init('http://tra.bulksmshyderabad.co.in/websms/sendsms.aspx?userid=ZONUPT&password=tech12344&sender=ZONUPT&mobileno=9246698435,9502826126,9603347573,8499981218,9000977822,8897289540,9948663172,8247429276,7997099090,7997859955,7661063311&msg='.$fmstext.''); 
				 
				 $ch3 = curl_init('http://tra.bulksmshyderabad.co.in/websms/sendsms.aspx?userid=ZONUPT&password=tech12344&sender=ZONUPT&mobileno=9246698435,9502826126,9603347573,8499981218,9000977822,8897289540,9948663172,8247429276,7997099090,7997859955,7661063311&msg='.$pmstext.''); 
				 
				 $ch4 = curl_init('http://tra.bulksmshyderabad.co.in/websms/sendsms.aspx?userid=ZONUPT&password=tech12344&sender=ZONUPT&mobileno=9246698435,9502826126,9603347573,8499981218,9000977822,8897289540,9948663172,8247429276,7997099090,7997859955,7661063311&msg='.$securitytext.'');  
				 
	/*	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);	
		echo $json = curl_exec($ch); 
		$info = curl_getinfo($ch); 

// close cURL resource, and free up system resources
curl_close($ch); */

	    curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);				
		echo $json = curl_exec($ch1);
		 
		  
	
$info = curl_getinfo($ch1); 

curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);				
		echo $json = curl_exec($ch2);
$info2 = curl_getinfo($ch2); 

curl_setopt($ch3, CURLOPT_RETURNTRANSFER, true);				
		echo $json = curl_exec($ch3);
$info3 = curl_getinfo($ch3); 

curl_setopt($ch4, CURLOPT_RETURNTRANSFER, true);				
		echo $json = curl_exec($ch4);
$info4 = curl_getinfo($ch4); 

// close cURL resource, and free up system resources
curl_close($ch1);
curl_close($ch2);
curl_close($ch3);
curl_close($ch4);


		  		
	//	} 
			
              
			}
	
			/*$phone = '9010435435';
			$msg = "All IS WELL";
 $url ="http://tra.bulksmshyderabad.co.in/websms/sendsms.aspx?userid=ZONUPT&password=tech12344&sender=ZONUPT&mobileno=".$phone."&msg=".$msg."";
 
 
 
 
		$phone = '9010435435';
			$msg = "All IS WELL";
 $url ="http://tra.bulksmshyderabad.co.in/websms/sendsms.aspx?userid=ZONUPT&password=tech12344&sender=ZONUPT&mobileno=".$phone."&msg=".$msg.""; */
// Apmspl: 5 sites(sarovar,grande,lotus,tulip,) data not entered
   $data =   $cn.' sites ('.$string.') Data Not Entered:';
   $data = str_replace(",","%20",$data);
   echo $data;
 
    
echo 'http://tra.bulksmshyderabad.co.in/websms/sendsms.aspx?userid=ZONUPT&password=tech12344&sender=ZONUPT&mobileno=7207255435&msg='.$data.'';



 
 /*$json_url = "http://tra.bulksmshyderabad.co.in/websms/sendsms.aspx?userid=ZONUPT&password=tech12344&sender=ZONUPT&mobileno=7207255435&msg=".$data."";
$json = file_get_contents($json_url);
$parseJ = json_decode($json,true); */
 
    
 

//print_r($info);

 
 
 /*echo $url;
  $ch = curl_init(); 

    curl_setopt($ch, CURLOPT_URL, $url); 

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

    curl_setopt($ch, CURLOPT_TIMEOUT, 4); 

    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: close')); 



    $start = array_sum(explode(' ', microtime())); 

    echo $result = curl_exec($ch); */
	//$url = "https://www.google.com";  


		
  
    }
	
	
	 public function sentfiresms(Request $request)

    {   
	

	date_default_timezone_set('Asia/Kolkata');
     $timestamp = date("Y-m-d H:i:s");
	
	 
	$fusers = array();
	$notented = array();
	$notented_ind = array();
	 $notented_ind['fms'] = array();
	$notented_ind['pms'] = array();
	$notented_ind['fms'] = array();
	$notented_ind['security'] = array();
	$sitearr =  \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
	 $notentered_sites = array();
	  if (count($sitearr) > 0) {
        foreach ($sitearr as $kk => $client) {
		   $dateval =  date('d-m-Y'); 
		   $rdate = date('Y-m-d', strtotime($dateval));
		   $prev_date = date('Y-m-d', strtotime($rdate .' -1 day'));
		   $date = date('d-m-Y', strtotime($prev_date));
            $resarr =  checkDailyStatus($date, $kk); 
			if($kk == 8 || $kk == 14 || $kk == 19 || $kk == 16 || $kk == 87 || $kk == 17){
			
			  if( $resarr[1] == 'yes' && $resarr[2] == 'yes' && $resarr[3] == 'yes'){
			  
			}else{
			   $notented[$kk] = $client;
			   $notentered_sites[] = $kk;
			}
			if($resarr[1] == 'yes'){}else{
			  $notented_ind['fms'][$kk] = $client;
			  $notentered_sites[] = $kk;
			}
			if($resarr[2] == 'yes'){}else{
			  $notented_ind['pms'][$kk] = $client;
			  $notentered_sites[] = $kk;
			}
			if($resarr[3] == 'yes'){}else{
			  $notented_ind['security'][$kk] = $client;
			  $notentered_sites[] = $kk;
			}
			
			}
			else if($kk == 12){
			
			  if( $resarr[3] == 'yes'){
			  
			}else{
			   $notented[$kk] = $client;
			   $notentered_sites[] = $kk;
			}
			if($resarr[3] == 'yes'){}else{
			  $notented_ind['security'][$kk] = $client;
			  $notentered_sites[] = $kk;
			}
			
			}
			else {
			if($resarr[0] == 'yes' && $resarr[1] == 'yes' && $resarr[2] == 'yes' && $resarr[3] == 'yes'){
			  
			}else{
			   $notented[$kk] = $client;
			   $notentered_sites[] = $kk;
			}
			if($resarr[0] == 'yes'){}else{
			  $notented_ind['firesafe'][$kk] = $client;
			  $notentered_sites[] = $kk;
			}
			
			if($resarr[1] == 'yes'){}else{
			  $notented_ind['fms'][$kk] = $client;
			  $notentered_sites[] = $kk;
			}
			if($resarr[2] == 'yes'){}else{
			  $notented_ind['pms'][$kk] = $client;
			  $notentered_sites[] = $kk;
			}
			if($resarr[3] == 'yes'){}else{
			  $notented_ind['security'][$kk] = $client;
			  $notentered_sites[] = $kk;
			}
			}
			   
		  }
		}
		

		 
	
		 $array_un = array_unique($notentered_sites);
		// print_r($array_un);
		 
		 $fusers = array();
		 foreach($array_un as $arrv){
		   $fusers[] = \App\User::where('id', '!=', '1')->where('community','=',$arrv)->get()->pluck('name', 'id');
		 }
		$final_users = array(); 
		
       // PMS
	     
	    $pms_lock_sites = $notented_ind['pms'];
		 foreach($pms_lock_sites as $key => $arrv){
		    $pms_lock_users = User::select('users.id','users.name','roles.permisstatus as permission')->leftJoin('roles','roles.id','=','users.role_id')->where('community','=',$key) ->whereRaw("find_in_set('edit_pms',roles.permisstatus)")->get();
		      $final_users[] = $pms_lock_users ;
		 }
		 
		 // FMS
		 $fms_lock_sites = $notented_ind['fms'];
		 foreach($fms_lock_sites as $key => $arrv){
		    $fms_lock_users = User::select('users.id','users.name','roles.permisstatus as permission')->leftJoin('roles','roles.id','=','users.role_id')->where('community','=',$key) ->whereRaw("find_in_set('edit_fms',roles.permisstatus)")->get();
		      $final_users[] = $fms_lock_users ;
		 }
		 
		 // FIRESAFETY
		 
		 $firesafe_lock_sites = $notented_ind['firesafe'];
		 foreach($firesafe_lock_sites as $key => $arrv){
		    $firesa_lock_users = User::select('users.id','users.name','roles.permisstatus as permission')->leftJoin('roles','roles.id','=','users.role_id')->where('community','=',$key) ->whereRaw("find_in_set('edit_firesafety',roles.permisstatus)")->get();
		      $final_users[] = $firesa_lock_users ;
		 }
		 
		  // Security
		 
		 $secure_lock_sites = $notented_ind['security'];
		 foreach($secure_lock_sites as $key =>$arrv){
		    $secu_lock_users = User::select('users.id','users.name','roles.permisstatus as permission')->leftJoin('roles','roles.id','=','users.role_id')->where('community','=',$key) ->whereRaw("find_in_set('edit_security',roles.permisstatus)")->get();
		      $final_users[] = $secu_lock_users ;
		 }
		
		$finalus = array();
		foreach($final_users as $fuserv){
		foreach($fuserv as $fu){
		   $finalus[$fu->id] = $fu->name;
		
		 }
		}
		
		   
		$string = "";
		$cn = count($notented);
		if($cn > 0){
		   $string = implode(",",$notented);
		}
		
		$firesafe_string = "";
		$frs_cn = count($notented_ind['firesafe']);
		if($frs_cn > 0){
		   $firesafe_string = implode(",",$notented_ind['firesafe']);
		}
				   
	
		 
			 $timestamp = date("Y-m-d H:i:s");
			//$myfiletest = fopen("cronfoldertest/test".$timestamp."file.txt", "w");
				 $data =   $date.':Data Not Entered -'.$cn.' sites ('.$string.')';
				$data = str_replace(" ","%20",$data);  
				
				$firesafetext =  $date.':FIRE SAFETY - Data Not Entered -'.$frs_cn.' sites ('.$firesafe_string.')';
				
				 $firesafetext = str_replace(" ","%20",$firesafetext);  
			
				 if($frs_cn > 0) {
				   
			
				 //$ch1 = curl_init('http://tra.bulksmshyderabad.co.in/websms/sendsms.aspx?userid=ZONUPT&password=tech12344&sender=ZONUPT&mobileno=9246698435&msg='.$firesafetext.''); 
				 
		$ch1 = curl_init('http://tra.bulksmshyderabad.co.in/websms/sendsms.aspx?userid=ZONUPT&password=tech12344&sender=ZONUPT&mobileno=9246698435,9502826126,9603347573,8499981218,9000977822,8897289540,9948663172,8247429276,7997099090,7997859955,7661063311&msg='.$firesafetext.''); 
				 

				 


	    curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);				
		echo $json = curl_exec($ch1);
		 	  
	
$info = curl_getinfo($ch1); 

// close cURL resource, and free up system resources
curl_close($ch1);
 }

	
			/*$phone = '9010435435';
			$msg = "All IS WELL";
 $url ="http://tra.bulksmshyderabad.co.in/websms/sendsms.aspx?userid=ZONUPT&password=tech12344&sender=ZONUPT&mobileno=".$phone."&msg=".$msg."";
 
 
 
 
		$phone = '9010435435';
			$msg = "All IS WELL";
 $url ="http://tra.bulksmshyderabad.co.in/websms/sendsms.aspx?userid=ZONUPT&password=tech12344&sender=ZONUPT&mobileno=".$phone."&msg=".$msg.""; */
// Apmspl: 5 sites(sarovar,grande,lotus,tulip,) data not entered
   $data =   $cn.' sites ('.$string.') Data Not Entered:';
   $data = str_replace(",","%20",$data);
   echo $data;
 
    
echo 'http://tra.bulksmshyderabad.co.in/websms/sendsms.aspx?userid=ZONUPT&password=tech12344&sender=ZONUPT&mobileno=7207255435&msg='.$data.'';


  
    }
	
	 
	
	// SENT FMS
	
	
		 public function sentfmssms(Request $request)

    {   
	

	date_default_timezone_set('Asia/Kolkata');
     $timestamp = date("Y-m-d H:i:s");
	 
	$fusers = array();
	$notented = array();
	$notented_ind = array();
	$notented_ind['fms'] = array();
	$notented_ind['pms'] = array();
	$notented_ind['fms'] = array();
	$notented_ind['security'] = array();
	$sitearr =  \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
	 $notentered_sites = array();
	  if (count($sitearr) > 0) {
        foreach ($sitearr as $kk => $client) {
		   $dateval =  date('d-m-Y'); 
		   $rdate = date('Y-m-d', strtotime($dateval));
		   $prev_date = date('Y-m-d', strtotime($rdate .' -1 day'));
		   $date = date('d-m-Y', strtotime($prev_date));
            $resarr =  checkDailyStatus($date, $kk); 
			if($kk == 8 || $kk == 14 || $kk == 19 || $kk == 16 || $kk == 87 || $kk == 17){
			
			  if( $resarr[1] == 'yes' && $resarr[2] == 'yes' && $resarr[3] == 'yes'){
			  
			}else{
			   $notented[$kk] = $client;
			   $notentered_sites[] = $kk;
			}
			if($resarr[1] == 'yes'){}else{
			  $notented_ind['fms'][$kk] = $client;
			  $notentered_sites[] = $kk;
			}
			if($resarr[2] == 'yes'){}else{
			  $notented_ind['pms'][$kk] = $client;
			  $notentered_sites[] = $kk;
			}
			if($resarr[3] == 'yes'){}else{
			  $notented_ind['security'][$kk] = $client;
			  $notentered_sites[] = $kk;
			}
			
			}
			else if($kk == 12){
			
			  if( $resarr[3] == 'yes'){
			  
			}else{
			   $notented[$kk] = $client;
			   $notentered_sites[] = $kk;
			}
			if($resarr[3] == 'yes'){}else{
			  $notented_ind['security'][$kk] = $client;
			  $notentered_sites[] = $kk;
			}
			
			}
			else {
			if($resarr[0] == 'yes' && $resarr[1] == 'yes' && $resarr[2] == 'yes' && $resarr[3] == 'yes'){
			  
			}else{
			   $notented[$kk] = $client;
			   $notentered_sites[] = $kk;
			}
			if($resarr[0] == 'yes'){}else{
			  $notented_ind['firesafe'][$kk] = $client;
			  $notentered_sites[] = $kk;
			}
			
			if($resarr[1] == 'yes'){}else{
			  $notented_ind['fms'][$kk] = $client;
			  $notentered_sites[] = $kk;
			}
			if($resarr[2] == 'yes'){}else{
			  $notented_ind['pms'][$kk] = $client;
			  $notentered_sites[] = $kk;
			}
			if($resarr[3] == 'yes'){}else{
			  $notented_ind['security'][$kk] = $client;
			  $notentered_sites[] = $kk;
			}
			}
			   
		  }
		}
		

		 
	
		 $array_un = array_unique($notentered_sites);
		// print_r($array_un);
		 
		 $fusers = array();
		 foreach($array_un as $arrv){
		   $fusers[] = \App\User::where('id', '!=', '1')->where('community','=',$arrv)->get()->pluck('name', 'id');
		 }
		$final_users = array(); 
		
       // PMS
	   
	    $pms_lock_sites = $notented_ind['pms'];
		 foreach($pms_lock_sites as $key => $arrv){
		    $pms_lock_users = User::select('users.id','users.name','roles.permisstatus as permission')->leftJoin('roles','roles.id','=','users.role_id')->where('community','=',$key) ->whereRaw("find_in_set('edit_pms',roles.permisstatus)")->get();
		      $final_users[] = $pms_lock_users ;
		 }
		 
		 // FMS
		 $fms_lock_sites = $notented_ind['fms'];
		 foreach($fms_lock_sites as $key => $arrv){
		    $fms_lock_users = User::select('users.id','users.name','roles.permisstatus as permission')->leftJoin('roles','roles.id','=','users.role_id')->where('community','=',$key) ->whereRaw("find_in_set('edit_fms',roles.permisstatus)")->get();
		      $final_users[] = $fms_lock_users ;
		 }
		 
		 // FIRESAFETY
		 
		 $firesafe_lock_sites = $notented_ind['firesafe'];
		 foreach($firesafe_lock_sites as $key => $arrv){
		    $firesa_lock_users = User::select('users.id','users.name','roles.permisstatus as permission')->leftJoin('roles','roles.id','=','users.role_id')->where('community','=',$key) ->whereRaw("find_in_set('edit_firesafety',roles.permisstatus)")->get();
		      $final_users[] = $firesa_lock_users ;
		 }
		 
		  // Security
		 
		 $secure_lock_sites = $notented_ind['security'];
		 foreach($secure_lock_sites as $key =>$arrv){
		    $secu_lock_users = User::select('users.id','users.name','roles.permisstatus as permission')->leftJoin('roles','roles.id','=','users.role_id')->where('community','=',$key) ->whereRaw("find_in_set('edit_security',roles.permisstatus)")->get();
		      $final_users[] = $secu_lock_users ;
		 }
		
		$finalus = array();
		foreach($final_users as $fuserv){
		foreach($fuserv as $fu){
		   $finalus[$fu->id] = $fu->name;
		
		 }
		}
		
		   
		$string = "";
		$cn = count($notented);
		if($cn > 0){
		   $string = implode(",",$notented);
		}
		
		
		$fms_string = "";
		$fms_cn = count($notented_ind['fms']);
		if($fms_cn > 0){
		   $fms_string = implode(",",$notented_ind['fms']);
		}
		
				  
		 
			 $timestamp = date("Y-m-d H:i:s");
			//$myfiletest = fopen("cronfoldertest/test".$timestamp."file.txt", "w");
				 $data =   $date.':Data Not Entered -'.$cn.' sites ('.$string.')';
			
			 if($fms_cn > 0) {
				
				
				
				 $fmstext =  $date.':FMS - Data Not Entered -'.$fms_cn.' sites ('.$fms_string.')';
				
				 $fmstext = str_replace(" ","%20",$fmstext);  
				
			
				$ch2 = curl_init('http://tra.bulksmshyderabad.co.in/websms/sendsms.aspx?userid=ZONUPT&password=tech12344&sender=ZONUPT&mobileno=9246698435,9502826126,9603347573,8499981218,9000977822,8897289540,9948663172,8247429276,7997099090,7997859955,7661063311&msg='.$fmstext.''); 
				 
				 
				// $ch2 = curl_init('http://tra.bulksmshyderabad.co.in/websms/sendsms.aspx?userid=ZONUPT&password=tech12344&sender=ZONUPT&mobileno=9246698435&msg='.$fmstext.''); 
				 
		  
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);				
		echo $json = curl_exec($ch2);
$info2 = curl_getinfo($ch2); 

curl_close($ch2);
}


		  		
	
   $data =   $cn.' sites ('.$string.') Data Not Entered:';
   $data = str_replace(",","%20",$data);
   echo $data;
 
    
echo 'http://tra.bulksmshyderabad.co.in/websms/sendsms.aspx?userid=ZONUPT&password=tech12344&sender=ZONUPT&mobileno=7207255435&msg='.$data.'';
		
  
    }
	
	// END SENT FMS
	
	
	// SENT PMS
	
	
public function sentpmssms(Request $request)

    {   
	

	date_default_timezone_set('Asia/Kolkata');
     $timestamp = date("Y-m-d H:i:s");
	 
	$fusers = array();
	$notented = array();
	$notented_ind = array();
	$notented_ind['fms'] = array();
	$notented_ind['pms'] = array();
	$notented_ind['fms'] = array();
	$notented_ind['security'] = array();
	
	$sitearr =  \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
	 $notentered_sites = array();
	  if (count($sitearr) > 0) {
        foreach ($sitearr as $kk => $client) {
		   $dateval =  date('d-m-Y'); 
		   $rdate = date('Y-m-d', strtotime($dateval));
		   $prev_date = date('Y-m-d', strtotime($rdate .' -1 day'));
		   $date = date('d-m-Y', strtotime($prev_date));
            $resarr =  checkDailyStatus($date, $kk); 
			if($kk == 8 || $kk == 14 || $kk == 19 || $kk == 16 || $kk == 87 || $kk == 17){
			
			  if( $resarr[1] == 'yes' && $resarr[2] == 'yes' && $resarr[3] == 'yes'){
			  
			}else{
			   $notented[$kk] = $client;
			   $notentered_sites[] = $kk;
			}
			if($resarr[1] == 'yes'){}else{
			  $notented_ind['fms'][$kk] = $client;
			  $notentered_sites[] = $kk;
			}
			if($resarr[2] == 'yes'){}else{
			  $notented_ind['pms'][$kk] = $client;
			  $notentered_sites[] = $kk;
			}
			if($resarr[3] == 'yes'){}else{
			  $notented_ind['security'][$kk] = $client;
			  $notentered_sites[] = $kk;
			}
			
			}
			else if($kk == 12){
			
			  if( $resarr[3] == 'yes'){
			  
			}else{
			   $notented[$kk] = $client;
			   $notentered_sites[] = $kk;
			}
			if($resarr[3] == 'yes'){}else{
			  $notented_ind['security'][$kk] = $client;
			  $notentered_sites[] = $kk;
			}
			
			}
			else {
			if($resarr[0] == 'yes' && $resarr[1] == 'yes' && $resarr[2] == 'yes' && $resarr[3] == 'yes'){
			  
			}else{
			   $notented[$kk] = $client;
			   $notentered_sites[] = $kk;
			}
			if($resarr[0] == 'yes'){}else{
			  $notented_ind['firesafe'][$kk] = $client;
			  $notentered_sites[] = $kk;
			}
			
			if($resarr[1] == 'yes'){}else{
			  $notented_ind['fms'][$kk] = $client;
			  $notentered_sites[] = $kk;
			}
			if($resarr[2] == 'yes'){}else{
			  $notented_ind['pms'][$kk] = $client;
			  $notentered_sites[] = $kk;
			}
			if($resarr[3] == 'yes'){}else{
			  $notented_ind['security'][$kk] = $client;
			  $notentered_sites[] = $kk;
			}
			}
			   
		  }
		}
		

		 
	
		 $array_un = array_unique($notentered_sites);
		// print_r($array_un);
		 
		 $fusers = array();
		 foreach($array_un as $arrv){
		   $fusers[] = \App\User::where('id', '!=', '1')->where('community','=',$arrv)->get()->pluck('name', 'id');
		 }
		$final_users = array(); 
		
       // PMS
	   
	    $pms_lock_sites = $notented_ind['pms'];
		 foreach($pms_lock_sites as $key => $arrv){
		    $pms_lock_users = User::select('users.id','users.name','roles.permisstatus as permission')->leftJoin('roles','roles.id','=','users.role_id')->where('community','=',$key) ->whereRaw("find_in_set('edit_pms',roles.permisstatus)")->get();
		      $final_users[] = $pms_lock_users ;
		 }
		 
		 // FMS
		 $fms_lock_sites = $notented_ind['fms'];
		 foreach($fms_lock_sites as $key => $arrv){
		    $fms_lock_users = User::select('users.id','users.name','roles.permisstatus as permission')->leftJoin('roles','roles.id','=','users.role_id')->where('community','=',$key) ->whereRaw("find_in_set('edit_fms',roles.permisstatus)")->get();
		      $final_users[] = $fms_lock_users ;
		 }
		 
		 // FIRESAFETY
		 
		 $firesafe_lock_sites = $notented_ind['firesafe'];
		 foreach($firesafe_lock_sites as $key => $arrv){
		    $firesa_lock_users = User::select('users.id','users.name','roles.permisstatus as permission')->leftJoin('roles','roles.id','=','users.role_id')->where('community','=',$key) ->whereRaw("find_in_set('edit_firesafety',roles.permisstatus)")->get();
		      $final_users[] = $firesa_lock_users ;
		 }
		 
		  // Security
		 
		 $secure_lock_sites = $notented_ind['security'];
		 foreach($secure_lock_sites as $key =>$arrv){
		    $secu_lock_users = User::select('users.id','users.name','roles.permisstatus as permission')->leftJoin('roles','roles.id','=','users.role_id')->where('community','=',$key) ->whereRaw("find_in_set('edit_security',roles.permisstatus)")->get();
		      $final_users[] = $secu_lock_users ;
		 }
		
		$finalus = array();
		foreach($final_users as $fuserv){
		foreach($fuserv as $fu){
		   $finalus[$fu->id] = $fu->name;
		
		 }
		}
		
		   
		$string = "";
		$cn = count($notented);
		if($cn > 0){
		   $string = implode(",",$notented);
		}
		
		$firesafe_string = "";
		$frs_cn = count($notented_ind['firesafe']);
		if($frs_cn > 0){
		   $firesafe_string = implode(",",$notented_ind['firesafe']);
		}
		
		$fms_string = "";
		$fms_cn = count($notented_ind['fms']);
		if($fms_cn > 0){
		   $fms_string = implode(",",$notented_ind['fms']);
		}
		
		$pms_string = "";
		$pms_cn = count($notented_ind['pms']);
		if($pms_cn > 0){
		   $pms_string = implode(",",$notented_ind['pms']);
		}
		
				 
			 $timestamp = date("Y-m-d H:i:s");
			//$myfiletest = fopen("cronfoldertest/test".$timestamp."file.txt", "w");
				// $data =   $date.':Data Not Entered -'.$cn.' sites ('.$string.')';
				//$data = str_replace(" ","%20",$data);  

            if($pms_cn > 0) {
				
				$pmstext =  $date.':PMS - Data Not Entered -'.$pms_cn.' sites ('.$pms_string.')';
				
				 $pmstext = str_replace(" ","%20",$pmstext);  
				
			
				 $ch3 = curl_init('http://tra.bulksmshyderabad.co.in/websms/sendsms.aspx?userid=ZONUPT&password=tech12344&sender=ZONUPT&mobileno=9246698435,9502826126,9603347573,8499981218,9000977822,8897289540,9948663172,8247429276,7997099090,7997859955,7661063311&msg='.$pmstext.''); 
				 
				 // $ch3 = curl_init('http://tra.bulksmshyderabad.co.in/websms/sendsms.aspx?userid=ZONUPT&password=tech12344&sender=ZONUPT&mobileno=9246698435&msg='.$pmstext.''); 
				 
				 
		 
curl_setopt($ch3, CURLOPT_RETURNTRANSFER, true);				
		echo $json = curl_exec($ch3);
$info3 = curl_getinfo($ch3); 

curl_close($ch3);

              
  }
   //echo 'http://tra.bulksmshyderabad.co.in/websms/sendsms.aspx?userid=ZONUPT&password=tech12344&sender=ZONUPT&mobileno=7207255435&msg='.$data.'';
		
  
    }
	
	
	// END SENT PMS
	
	
	
	
	
	// SENT SMS NEW CRON JOBS
	
	
	
	 public function sentsecuresms(Request $request)

    {    
	

	date_default_timezone_set('Asia/Kolkata');
     $timestamp = date("Y-m-d H:i:s");
	 
	$fusers = array();
	$notented = array();
	$notented_ind = array();
	$notented_ind['fms'] = array();
	$notented_ind['pms'] = array();
	$notented_ind['fms'] = array();
	$notented_ind['security'] = array();
	
	$sitearr =  \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
	 $notentered_sites = array();
	  if (count($sitearr) > 0) {
        foreach ($sitearr as $kk => $client) {
		   $dateval =  date('d-m-Y'); 
		   $rdate = date('Y-m-d', strtotime($dateval));
		   $prev_date = date('Y-m-d', strtotime($rdate .' -1 day'));
		   $date = date('d-m-Y', strtotime($prev_date));
            $resarr =  checkDailyStatus($date, $kk); 
			if($kk == 8 || $kk == 14 || $kk == 19 || $kk == 16 || $kk == 87 || $kk == 17){
			
			  if( $resarr[1] == 'yes' && $resarr[2] == 'yes' && $resarr[3] == 'yes'){
			  
			}else{
			   $notented[$kk] = $client;
			   $notentered_sites[] = $kk;
			}
			if($resarr[1] == 'yes'){}else{
			  $notented_ind['fms'][$kk] = $client;
			  $notentered_sites[] = $kk;
			}
			if($resarr[2] == 'yes'){}else{
			  $notented_ind['pms'][$kk] = $client;
			  $notentered_sites[] = $kk;
			}
			if($resarr[3] == 'yes'){}else{
			  $notented_ind['security'][$kk] = $client;
			  $notentered_sites[] = $kk;
			}
			
			}
			else if($kk == 12){
			
			  if( $resarr[3] == 'yes'){
			  
			}else{
			   $notented[$kk] = $client;
			   $notentered_sites[] = $kk;
			}
			if($resarr[3] == 'yes'){}else{
			  $notented_ind['security'][$kk] = $client;
			  $notentered_sites[] = $kk;
			}
			
			}
			else {
			if($resarr[0] == 'yes' && $resarr[1] == 'yes' && $resarr[2] == 'yes' && $resarr[3] == 'yes'){
			  
			}else{
			   $notented[$kk] = $client;
			   $notentered_sites[] = $kk;
			}
			if($resarr[0] == 'yes'){}else{
			  $notented_ind['firesafe'][$kk] = $client;
			  $notentered_sites[] = $kk;
			}
			
			if($resarr[1] == 'yes'){}else{
			  $notented_ind['fms'][$kk] = $client;
			  $notentered_sites[] = $kk;
			}
			if($resarr[2] == 'yes'){}else{
			  $notented_ind['pms'][$kk] = $client;
			  $notentered_sites[] = $kk;
			}
			if($resarr[3] == 'yes'){}else{
			  $notented_ind['security'][$kk] = $client;
			  $notentered_sites[] = $kk;
			}
			}
			   
		  }
		}
		

		 
	
		 $array_un = array_unique($notentered_sites);
		// print_r($array_un);
		 
		 $fusers = array();
		 foreach($array_un as $arrv){
		   $fusers[] = \App\User::where('id', '!=', '1')->where('community','=',$arrv)->get()->pluck('name', 'id');
		 }
		$final_users = array(); 
		
       // PMS
	   
	    $pms_lock_sites = $notented_ind['pms'];
		 foreach($pms_lock_sites as $key => $arrv){
		    $pms_lock_users = User::select('users.id','users.name','roles.permisstatus as permission')->leftJoin('roles','roles.id','=','users.role_id')->where('community','=',$key) ->whereRaw("find_in_set('edit_pms',roles.permisstatus)")->get();
		      $final_users[] = $pms_lock_users ;
		 }
		 
		 // FMS
		 $fms_lock_sites = $notented_ind['fms'];
		 foreach($fms_lock_sites as $key => $arrv){
		    $fms_lock_users = User::select('users.id','users.name','roles.permisstatus as permission')->leftJoin('roles','roles.id','=','users.role_id')->where('community','=',$key) ->whereRaw("find_in_set('edit_fms',roles.permisstatus)")->get();
		      $final_users[] = $fms_lock_users ;
		 }
		 
		 // FIRESAFETY
		 
		 $firesafe_lock_sites = $notented_ind['firesafe'];
		 foreach($firesafe_lock_sites as $key => $arrv){
		    $firesa_lock_users = User::select('users.id','users.name','roles.permisstatus as permission')->leftJoin('roles','roles.id','=','users.role_id')->where('community','=',$key) ->whereRaw("find_in_set('edit_firesafety',roles.permisstatus)")->get();
		      $final_users[] = $firesa_lock_users ;
		 }
		 
		  // Security
		 
		 $secure_lock_sites = $notented_ind['security'];
		 foreach($secure_lock_sites as $key =>$arrv){
		    $secu_lock_users = User::select('users.id','users.name','roles.permisstatus as permission')->leftJoin('roles','roles.id','=','users.role_id')->where('community','=',$key) ->whereRaw("find_in_set('edit_security',roles.permisstatus)")->get();
		      $final_users[] = $secu_lock_users ;
		 }
		
		$finalus = array();
		foreach($final_users as $fuserv){
		foreach($fuserv as $fu){
		   $finalus[$fu->id] = $fu->name;
		
		 }
		}
		
		   
		$string = "";
		$cn = count($notented);
		if($cn > 0){
		   $string = implode(",",$notented);
		}
		
		$firesafe_string = "";
		$frs_cn = count($notented_ind['firesafe']);
		if($frs_cn > 0){
		   $firesafe_string = implode(",",$notented_ind['firesafe']);
		}
		
		$fms_string = "";
		$fms_cn = count($notented_ind['fms']);
		if($fms_cn > 0){
		   $fms_string = implode(",",$notented_ind['fms']);
		}
		
		$pms_string = "";
		$pms_cn = count($notented_ind['pms']);
		if($pms_cn > 0){
		   $pms_string = implode(",",$notented_ind['pms']);
		}
		
		$secu_string = "";
		$secu_cn = count($notented_ind['security']);
		if($secu_cn > 0){
		   $secu_string = implode(",",$notented_ind['security']);
		}
		

		   
		 if(count($finalus) > 0 ) {
		 
		  foreach($finalus as $uk => $fr){
		  
		    
			$dailypermission_cn = Dailylockpermission::
			//where('permissiondate', '=', $perdate)
			where('user_id', '=', $uk)
			->count();
			
			if($dailypermission_cn > 0){
			
			$dailypermission_res = Dailylockpermission::
			//where('permissiondate', '=', $perdate)
			where('user_id', '=', $uk)
			->first();
			
			
			$comment = Dailylockpermission::findOrFail($dailypermission_res->id);
			
			$etinfo = [
			'lockstatus' => 'rejected'
			];
			
			$comment->update($etinfo);
			
			}else{
			
			$etinfo = array( 
			'user_id' => $uk,
			'permissiondate' => date('Y-m-d'),
			'lockstatus' => 'rejected'
			);
			
			$insert = Dailylockpermission::create($etinfo);
			} 
			 
			 
		  
		  }
		 
		 }
		 // UNLOCK UESRS	
		  
		 
			 $timestamp = date("Y-m-d H:i:s");
			//$myfiletest = fopen("cronfoldertest/test".$timestamp."file.txt", "w");
				 $data =   $date.':Data Not Entered -'.$cn.' sites ('.$string.')';
				$data = str_replace(" ","%20",$data);  
				
				$securitytext =  $date.':SECURITY - Data Not Entered -'.$secu_cn.' sites ('.$secu_string.')'; 
				
				  $securitytext = str_replace(" ","%20",$securitytext);
				  
				  	 if($secu_cn > 0) { 
				 
				 $ch4 = curl_init('http://tra.bulksmshyderabad.co.in/websms/sendsms.aspx?userid=ZONUPT&password=tech12344&sender=ZONUPT&mobileno=9246698435,9502826126,9603347573,8499981218,9000977822,8897289540,9948663172,8247429276,7997099090,7997859955,7661063311&msg='.$securitytext.'');  
				
			
	  
	
$info4 = curl_getinfo($ch4); 


curl_setopt($ch4, CURLOPT_RETURNTRANSFER, true);				
		echo $json = curl_exec($ch4);
$info4 = curl_getinfo($ch4); 


curl_close($ch4);

  }

	

   $data =   $cn.' sites ('.$string.') Data Not Entered:';
   $data = str_replace(",","%20",$data);
   echo $data;
 
    
echo 'http://tra.bulksmshyderabad.co.in/websms/sendsms.aspx?userid=ZONUPT&password=tech12344&sender=ZONUPT&mobileno=7207255435&msg='.$data.'';
		
  
    }
	
	
	// END SENT SMS NEW CRON JOBS
	
	
	 public function createlockpermission(Request $request)

    { 
	 
	 
       $relations = [
			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', ''),
             'users' =>  \App\User::get()->pluck('name', 'id')->prepend('Please select', ''),
			 'permissions' => \App\Dailylockpermission::get(), 
        ];   
		
		
		
		return view('lockpermission.create', $relations);
  
    }
	
	
	 public function massApprove(Request $request)

    {
	 
 
	
	  if ($request->input('ids')) {

            $entries = User::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
			
			// $comment = User::findOrFail($entry->id);
			$perdate = date("Y-m-d");
			$presentcn_cn = Dailylockpermission::
				where('permissiondate', '=', $perdate)
				->where('user_id', '=', $$entry->id)
				->count();
				
			if($dailypermission_cn > 0){}
			else{
		       $etinfo = array( 
                       'user_id' => $entry->id,
					   'permissiondate' => date('Y-m-d')
                    );
					
					$insert = Dailylockpermission::create($etinfo);
					} 
            }

        } 

    }
	
	
	
	
	
	 public function storelockpermission(StoreLockPermissionRequest $request) 

    {  
	
	
	   $edata = $request->all();
	   $permissiondate = $edata['permissiondate'];
	   $fpermissiondate = date("Y-m-d",strtotime($permissiondate));
	   $edata['permissiondate'] = $fpermissiondate;
       $relations = [
			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', ''),
              'permissions' => \App\Dailylockpermission::get(), 
        ];   
		
		$insert = Dailylockpermission::create($edata);
		
		return redirect()->route('dailyreports.lockpermission',$relations);
		
  
    }
	
	/* public function storelockpermission(StoreLockPermissionRequest $request) 

    {  
	
	
	   $edata = $request->all();
	   $permissiondate = $edata['permissiondate'];
	   $fpermissiondate = date("Y-m-d",strtotime($permissiondate));
	   $edata['permissiondate'] = $fpermissiondate;
       $relations = [
			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', ''),
              'permissions' => \App\Dailylockpermission::get(), 
        ];   
		
		$insert = Dailylockpermission::create($edata);
		
		return redirect()->route('dailyreports.lockpermission',$relations);
		
  
    }*/
	
	 public function destroy($id)

    {

        $client = Dailylockpermission::findOrFail($id);

        $client->delete();


 $relations = [
			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', ''),
              'permissions' => \App\Dailylockpermission::get(), 
        ];   

       return redirect()->route('dailyreports.lockpermission',$relations);
    }

	
	  public function destroypermission(StoreLockPermissionRequest $request, $id)

    {

        $client = Dailylockpermission::findOrFail($id);

        $client->delete();

 $relations = [
			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', ''),
              'permissions' => \App\Dailylockpermission::get(), 
        ];   

       return redirect()->route('dailyreports.lockpermission',$relations);

    }
	
	  public function massDailydestroy(Request $request)

    {
	
	exit;

        if ($request->input('ids')) {

            $entries = Dailylockpermission::whereIn('id', $request->input('ids'))->get();



            foreach ($entries as $entry) {

                $entry->delete();

            }

        }

    }




 	 public function test1(Request $request)

    { 
	   
             return view('testtime');
    }
	
	
	
	
	
	
	 public function demofiles(Request $request)


    {



        $segment1 = Request::segment(1);



		$segment2 = Request::segment(2);



		$segment3 = Request::segment(3);



		$formfieldarray = array();

	$validres = array();
		$siteid = $segment2;

		
    $matchValidFields = ['site' => $siteid]; 
		$valid_count = \App\Firesafedailyreportvalidation::where($matchValidFields)->count();
		
		if($valid_count > 0){
			$validres = \App\Firesafedailyreportvalidation::where($matchValidFields)->first();
		}


       $relations = [



            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),



			//'sites_names' => \App\Sites::get()->pluck('title', 'id')->prepend('All', ''),



			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),



			'res' => $formfieldarray, 



			'segmentval' => $segment3,  
			
			'validres' => $validres,



        ];    


		if($segment3 == '2'){


		$segment1 = Request::segment(1);



		$segment2 = Request::segment(2);

       $segment4 = Request::segment(4);

		



		



		$siteid = $segment2;



		$reportdate = date("Y-m-d");



		$formfieldarray = array();


          	$reportdate = $segment4;
		



		$resdate = date("Y-m-d", strtotime($reportdate) );



		



		$matchfields = ['site' => $siteid, 'reporton' => $resdate]; 



		//  echo "<pre>";	print_r($matchfields); echo "</pre>";



		// $formfieldarray = \App\Fmsdailyreport::where($matchfields)->first();



        $dgconsumparray = array();
		 
		
		$relations = [

		'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
		'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),
		'res' => $formfieldarray, 
        'dgconsuption' =>$dgconsumparray,
		];    

		$res_count = \App\Fmsdailyreport::where($matchfields)->count();


		if($res_count > 0){


        
		$formfieldarray = \App\Fmsdailyreport::where($matchfields)->first();

          $match_dg_fields =  ['site' => $siteid, 'ref_id' => $formfieldarray->id];
		  $dgconsumparray_cn = \App\Dailyfmsdgsetreport::where($match_dg_fields)->count();
         if($dgconsumparray_cn > 0){
		     $dgconsumparray = \App\Dailyfmsdgsetreport::where($match_dg_fields)->get();
		 }
		



		$relations = [



		'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),



		//'sites_names' => \App\Sites::get()->pluck('title', 'id')->prepend('All', ''),



		'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),

		'res' => $formfieldarray, 
        'dgconsuption' =>$dgconsumparray,
		];    

		return view('editfms_latest', $relations);



		}

		  return view('fms_latest', $relations);

		} 


		 else{

		  return view('dailyreports.index', $relations);

		 }

    }





}







