<?php

namespace App\Http\Controllers;

use App\Manpowervalidation;

use App\Manpowersvalidation;

use App\Task;







use App\Indent;







use App\TaskUser;







use App\TaskAttachment;







use App\TaskReply;







use App\Emp;







use App\User;







use DB;







use Excel;




use App\Securitymisreport;


use PDF;







use File; 







use Auth;







use Config;





use App\Mmrwarantyreport;





use App\Mmrvalidationreport;







use App\Dailylockpermission;







use Dompdf\Dompdf;







use App\Mmrhousekpact;







use App\Mmrhousekconsume;







use App\Mmrmonthlyreport;



use App\Mmrpetreport;


use App\Mmreventreport;


use App\Mmrhkcmmonthlyreport;









use App\Fmsdailyreport;







use App\Pmsdailyreport;







use App\Firesafedailyreport;







use App\Firesafedailyreportvalidation;







use App\Securitydailyreport;







use App\Dailyreportvalidation;







use App\Pmsdailyreportvalidation;







use App\Securitydailyreportvalidation;







use App\Wspmtreport;





use App\Wspmotreport;







use App\Stpintreport;







use App\Stpoutreport;







use App\Mmrmanpowerreport;







use App\Mmrmajorincident; 







use App\Mmrppmreport; 















use App\CommunityAsset;



















use App\Dailyfmsdieselconsumptionreport;











use Illuminate\Http\Request;















use Illuminate\Support\Facades\Input; 























use App\Http\Requests\StoreIndentsRequest;






use App\Http\Requests\StoreManPowerRequest;








use App\Http\Requests\UpdateIndentsRequest;
















use App\Communityassetmaintenance;
use Carbon\Carbon;















class MMRController extends Controller 







 







{































    /**















     * Display a listing of Client.















     *















     * @return \Illuminate\Http\Response















     */











 



    public function index()







 



 



    { 







	   







     







	 







	$year = isset($_GET['y'])?$_GET['y']:date("Y");







	//$month =isset($_GET['m'])?$_GET['m']:date("m");







	







		if(isset($_GET['m']))







		{







			$month = $_GET['m'];







		}







		else







		{







			if($year==date("Y") && date("m")==1)







			{







				$month = 12;







			}







			else







			{







				$month = date("m")-1;







			}







		 }







		 







		 







		if(isset($_GET['y']))







		{







			$year = $_GET['y'];







		}







		else







		{







			if($year==date("Y") && date("m")==1)







			{







				$year = date("Y")-1;







			}







			else







			{







				$year = date("Y");







			}







		 }







		 







		 if(isset($_GET['site']))







		{







			$site = $_GET['site'];







		}







		else







		{







			$site = 9;







		 }















	      $relations = [















            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),







			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', ''),







			'sites_attr_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id'),







			'syear' => $year,







			'smonth' => $month,







			'site' => $site,







			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),







			'sitename' => get_sitename($site),















        ]; 















		 return view('mmrreports.main', $relations);















    















    }  







	







	  public function getindex() 















    { 







	   







       // $assets = Audit::all();







		







		 return view('mmrreports.mmr_index');















    }  







	







	  public function getcontents()















    { 







	   







       // $assets = Audit::all();







		







		 return view('mmrreports.mmr_contents');















    }  







	







	  public function getpower()















    { 







	   







       // $assets = Audit::all();







		







		 return view('mmrreports.mmr_power');















    }  







	







	  public function getwater()















    { 







	   







       // $assets = Audit::all();







		







		 return view('mmrreports.mmr_water');















    }  







	







	







	  public function getmanpower()















    { 







	   







       // $assets = Audit::all();







		







		 return view('mmrreports.mmr_manpower');















    }  







	







	  public function getengineeringservices()















    { 







	   







       // $assets = Audit::all();







		







		 return view('mmrreports.mmr_engineeringservices');















    }  







	 public function getequipmentavailability()















    { 







	   







       // $assets = Audit::all();







		







		 return view('mmrreports.mmr_equipmentavailability');















    }  







	 public function getmmrvendorppm()















    { 







	   







       // $assets = Audit::all();







		







		 return view('mmrreports.mmr_mmrvendorppm');















    }  







	







	 public function getmmrcompletedppmtracker()















    { 







	   







       // $assets = Audit::all();







		







		 return view('mmrreports.mmr_mmrcompletedppmtracker');















    }  







	







	 public function getmmrplannedppmtracker()















    { 







	   







       // $assets = Audit::all();







		







		 return view('mmrreports.mmr_mmrplannedppmtracker');















    }  







	 public function getmmramctracker()















    { 







	   







       // $assets = Audit::all();







		







		 return view('mmrreports.mmr_mmramctracker');















    }  







	 public function getmmrmajoractivities()















    { 







	   







       // $assets = Audit::all();







		







		 return view('mmrreports.mmr_mmrmajoractivities');















    }  







	public function getmmrstatutorycompliances()















    { 







	   







       // $assets = Audit::all();







		







		 return view('mmrreports.mmr_mmrstatutorycompliances');















    }  







		public function getmmrsoftservices()















    { 







	   







       // $assets = Audit::all();







		







		 return view('mmrreports.mmr_mmrsoftservices');















    }  







	public function getmmrhousekeepingmachinery()















    { 







	   







       // $assets = Audit::all();







		







		 return view('mmrreports.mmr_mmrhousekeepingmachinery');















    }  



	public function storemanpowerreport(Request $request)
	{
		$edata = $request->all();
		$k = "";
		if($edata['record'] > 0){
	
			$category = Manpowervalidation::find($edata['record']);
	
			$category->update($edata);
	
		}
		return redirect()->route('reportvalidation.index');
	}


	/*----------------------------------UPDATE DELETE IMAGES----------------------------------*/

	public function deleteImage(Request $request)
	{
		$edata = $request->all();
		if(isset($edata['type']) && $edata['type']!="")
		if($edata['type']=='beforeimage') $store_val  = array('beforeimage'=>"");	 
		else $store_val  = array('afterimage'=>"");	 
		if($edata['tablename']=='mmrppmreports') $report = Mmrppmreport::where('id', '=', $edata['imageId'])->update($store_val);
		else if($edata['tablename']=='mmrmajorincidents') $report = Mmrmajorincident::where('id', '=', $edata['imageId'])->update($store_val);
		else if($edata['tablename']=='technical_activities') $report = Mmrhousekpact::where('id', '=', $edata['imageId'])->where('type', '=', 'technical_activities')->update($store_val);
		else if($edata['tablename']=='wspinlet')
		{
			$store_val  = array('wspinlet_pic'=>"");	
		 	$report = Wspmtreport::where('id', '=', $edata['imageId'])->update($store_val);
		}
		else if($edata['tablename']=='wspoutlet')
		{
			$store_val  = array('wspoutlet_pic'=>"");	
		 	$report = Wspmotreport::where('id', '=', $edata['imageId'])->update($store_val);
		}
		else if($edata['tablename']=='stpinlet')
		{
			$store_val  = array('stpinlet_pic'=>"");	
		 	$report = Stpintreport::where('id', '=', $edata['imageId'])->update($store_val);
		}
		else if($edata['tablename']=='stpoutlet')
		{
			$store_val  = array('stpoutlet_pic'=>"");	
		 	$report = Stpoutreport::where('id', '=', $edata['imageId'])->update($store_val);
		}
		else if($edata['tablename']=='intiative_taken')
		{
		 	$report = Mmrhousekpact::where('id', '=', $edata['imageId'])->where('type', '=', 'initiative')->update($store_val);
		}
		else if($edata['tablename']=='housekeepact')
		{
		 	$report = Mmrhousekpact::where('id', '=', $edata['imageId'])->where('type', '=', 'housekeeping')->update($store_val);
		}
		else if($edata['tablename']=='horticulture')
		{
		 	$report = Mmrhousekpact::where('id', '=', $edata['imageId'])->where('type', '=', 'horticulture')->update($store_val);
		}
		else if($edata['tablename']=='pets')
		{
			$store_val  = array('before_image'=>"");	
		 	$report = Mmrpetreport::where('id', '=', $edata['imageId'])->update($store_val);
		}
		else if($edata['tablename']=='violation')
		{
			if($edata['type']=='beforeimage') $store_val  = array('before_image'=>"");	
			else  $store_val  = array('after_image'=>"");	
		 	$report = Mmrmonthlyreport::where('id', '=', $edata['imageId'])->where('type', '=', 'violation')->update($store_val);
		}else if($edata['tablename']=='valueadd')
		{
			if($edata['type']=='beforeimage') $store_val  = array('before_image'=>"");
		 	$report = Mmrmonthlyreport::where('id', '=', $edata['imageId'])->where('type', '=', 'valueadd')->update($store_val);
		}
		else if($edata['tablename']=='valueadd')
		{
			if($edata['type']=='beforeimage') $store_val  = array('before_image'=>"");
		 	$report = Mmrmonthlyreport::where('id', '=', $edata['imageId'])->where('type', '=', 'suggestion')->update($store_val);
		}else if($edata['tablename']=='indentreq')
		{
			if($edata['type']=='beforeimage') $store_val  = array('before_image'=>"");
		 	$report = Mmrmonthlyreport::where('id', '=', $edata['imageId'])->where('type', '=', 'indentreq')->update($store_val);
		}
		else if($edata['tablename']=='events')
		{
			if($edata['type']=='before_image1') $store_val  = array('before_image1'=>"");
			if($edata['type']=='before_image2') $store_val  = array('before_image2'=>"");
			if($edata['type']=='before_image3') $store_val  = array('before_image3'=>"");
			if($edata['type']=='before_image4') $store_val  = array('before_image4'=>"");
		 	$report = Mmreventreport::where('id', '=', $edata['imageId'])->update($store_val);
		}
		if(isset($edata['fileName']) && $edata['fileName']!="")
		{
			unlink(public_path()."/".$edata['fileName']);
		}
	}
	
	
	/*----------------------------------UPDATE DELETE IMAGES*/




	public function getmmrboardsummary()















    { 







	   







       // $assets = Audit::all();







		







		 return view('mmrreports.mmr_mmrboardsummary');















    }  







	public function getmmrhousekeepingconsumables()















    { 







	   







       // $assets = Audit::all();







		







		 return view('mmrreports.mmr_mmrhousekeepingconsumables');















    }  







    public function getmmrgardenconsumables()















    { 







	   







       // $assets = Audit::all();







		







		 return view('mmrreports.mmr_mmrgardenconsumables');















    }  







	 public function getmmrpestcontrolmanagement()















    { 







	   







       // $assets = Audit::all();







		







		 return view('mmrreports.mmr_mmrpestcontrolmanagement');















    }  







	 public function getmmrgardeningmanagement()















    { 







	   







       // $assets = Audit::all();







		







		 return view('mmrreports.mmr_mmrgardeningmanagement');















    }  







	 public function getmmractivitiesingardening()















    { 







	   







       // $assets = Audit::all();







		







		 return view('mmrreports.mmr_mmractivitiesingardening');















    }  







	 public function getmmrothermatters()















    { 







	   







       // $assets = Audit::all();







		







		 return view('mmrreports.mmr_mmrothermatters');















    }  







	 public function getmmrkeyapprovals()















    { 







	   







       // $assets = Audit::all();







		







		 return view('mmrreports.mmr_mmrkeyapprovals');















    }  







	 public function getmmrmajorincidents()















    { 







	   







       // $assets = Audit::all();







		







		 return view('mmrreports.mmr_mmrmajorincidents');















    }  







	 public function getmmrmonthreports()















    { 







	   







       // $assets = Audit::all();







		







		 return view('mmrreports.mmr_mmrmonthreports');















    }  







    







	 public function getmmrscopenature()















    { 







	   







       // $assets = Audit::all();







		







		 return view('mmrreports.mmr_mmrscopenature');















    }  







	 public function getmmrproposedmanpower()















    { 







	   







       // $assets = Audit::all();







		







		 return view('mmrreports.mmr_mmrproposedmanpower');















    }  







	 public function getmmrtechnicalservices()















    { 







	   







       // $assets = Audit::all();







		







		 return view('mmrreports.mmr_mmrtechnicalservices');















    }  







	 public function getmmrinitiativetaken()















    { 







	   







       // $assets = Audit::all();







		







		 return view('mmrreports.mmr_mmrinitiativetaken');















    }  







	 public function getmmrplannedperventives()















    { 







	   







       // $assets = Audit::all();







		







		 return view('mmrreports.mmr_mmrplannedperventives');















    }  







	 public function getmmrpowerfailureanalysis()















    { 







	   







       // $assets = Audit::all();







		







		 return view('mmrreports.mmr_mmrpowerfailureanalysis');















    }  







	 public function getmmraveragepowerconsumption()















    { 







	   







       // $assets = Audit::all();







		







		 return view('mmrreports.mmr_mmraveragepowerconsumption');















    }  







 







    public function getmmrsofthousekeeping()















    { 







	   







       // $assets = Audit::all();







		







		 return view('mmrreports.mmr_mmrsofthousekeeping');















    }  







	 public function getmmrsofthorticulture()















    { 







	   







       // $assets = Audit::all();







		







		 return view('mmrreports.mmr_mmrsofthorticulture');















    }  







    public function getmmrsoftothers()















    { 







	   







       // $assets = Audit::all();







		







		 return view('mmrreports.mmr_mmrsoftothers');















    }  







 







 







 







 







  







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







	







	//DOWNLOAD OVER ALL MMR







	public function downloadoverallmmr(Request $request)
	{
		ini_set('max_execution_time', 3000);
		
		ini_set('memory_limit','1024M');

		

		$technicalServices_Count = 0;
		
		$Mockdrillmisreport_Count = 0;
		
		$Fireprepareprint_Count = 0;
		
		$Apnacomplaintmisreport_Count = 0;

		$softServices_Count	= 0;

		$softServices_Count1 = 0;

		$softServices_Count2 = 0;

		$others_Count = 0;

		$others_Count1 = 0;

		$others_Count2 = 0;

			

		$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));	

		$segment1 = $uriSegments[1]; 

		$segment2 = $uriSegments[2];

		$segment3 = $uriSegments[3];

		$site = $uriSegments[4];

		

		$siteName = get_sitename($site);

		

		$year = $segment2;

		$month = $segment3;

		

		

		$mn = date("F", mktime(0, 0, 0, $segment3, 10));	

		

		/*----------------------------------MMR WELCOME------------------------------------*/	

		$relations = [

		'report_month' => $mn,

		'report_year' => $segment2,

		'sitename' => get_sitename($site),

		];  

		

		$pdf = PDF::loadView('mmrreports.mmr_mmrwelcome', $relations);

		$pdf->save(storage_path('/mmrfiles/welcome.pdf')); 

		

		

		/*---------------------------------MMR Technical Services-------------------------------*/

		

		

		$relations = [

		'report_month' => $mn,

		'report_year' => $segment2,

		'sitename' => get_sitename($site),

		]; 

		$pdf = PDF::loadView('mmrreports.mmr_mmrtechservices', $relations);

		$pdf->save(storage_path('/mmrfiles/mmrtechservices.pdf'));  

		

		

		/*---------------------------------MMR Man Power-------------------------------*/ 
	   		
	   /*$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));	

	   $segment1 = $uriSegments[1]; 

	   $segment2 = $uriSegments[2];

	   $segment3 = $uriSegments[3];

	   $site = $uriSegments[4];

	   
	   $matchfields = ['site' => $site,'month'=>$segment3,'year'=>$segment2]; 
	   
	   $data = array();
	   
	   $Manpower_Count = \App\Manpowersvalidation::where($matchfields)->count();
	   if($Manpower_Count>0)
	   {
			$mmr_sres_res = \App\Manpowersvalidation::where($matchfields)->orderBy('sorder', 'asc')->get();	
			foreach($mmr_sres_res as $mkey=>$mres)
			{
				$data[$mkey]['ids'] = $mres->id; 
				$data[$mkey]['title'] = $mres->title; 
				$data[$mkey]['type'] = $mres->type;
				if($mres->general) $data[$mkey]['general'] = $mres->general; else $data[$mkey]['general'] = "";
				if($mres->a) $data[$mkey]['a'] = $mres->a; else $data[$mkey]['a'] = "";
				if($mres->b) $data[$mkey]['b'] = $mres->b; else $data[$mkey]['b'] = "";
				if($mres->c) $data[$mkey]['c'] = $mres->c; else $data[$mkey]['c'] = "";
				if($mres->mnos) $data[$mkey]['mnos'] = $mres->mnos; else $data[$mkey]['mnos'] = "";
				if($mres->mpdays) $data[$mkey]['mpdays'] = $mres->mpdays; else $data[$mkey]['mpdays'] = "";
				$data[$mkey]['sorder'] = $mres->sorder;
			}
	   }
	   
		// echo "<pre>"; print_r($data); echo "</pre>";
	
		$ndays=cal_days_in_month(CAL_GREGORIAN,$month,$year);
		
		$sresullt = array();

	    $matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year]; 

	    $SLAAdherenceCount = \App\Mmrslareport::where($matchfields_hskpact)->count();

	    if($SLAAdherenceCount > 0)

	    {

			$sresullt = \App\Mmrslareport::where($matchfields_hskpact)->get();

	    }
	   
		$relations = [
	
		'year' => $segment2,
		
		'month' => $segment3, 
		
		'monthname' => date("F", mktime(0, 0, 0, $month, 10)),
		
		'sitename' => get_sitename($site),
		
		'site' => $site,
		
		'manpowers' => $data,
		
		'ndays' => $ndays,
		
		'updated' => "",
		
		'sresullt' => $sresullt
	
	];
	
	
	$pdf = PDF::loadView('mmrreports.mmr_mmrmanpower', $relations);
	
	//$pdf->setPaper('A4', 'landscape');
	
	if($Manpower_Count>0 || $SLAAdherenceCount>0) $pdf->save(storage_path('/mmrfiles/mmrmanpower.pdf')); 
*/
	   

	   

	   

	   /*---------------------------------MMR Technical Services-------------------------------*/

		

		

		$resullt = array();

		$matchfields_hskpact = ['site' => $site, 'month' =>$segment3, 'year' => $segment2]; 

		$MajorIncidents_Count = \App\Mmrmajorincident::where($matchfields_hskpact)->count();

		if($MajorIncidents_Count > 0){

			$resullt = \App\Mmrmajorincident::where($matchfields_hskpact)->get();

			$technicalServices_Count = $technicalServices_Count+1;

		}

		

		$relations = [

			'year' => $segment2,

			'month' => $segment3, 

			'monthname' => date("F", mktime(0, 0, 0, $segment3, 10)),

			'sitename' => get_sitename($site),

			'site' => $site,

			'resval' => $resullt,

			'tCount' => $technicalServices_Count

        ];

		

		$pdf = PDF::loadView('mmrreports.mmr_mmrtechnicalservices', $relations);

		if($MajorIncidents_Count>0) $pdf->save(storage_path('/mmrfiles/mmrtechnicalservices.pdf'));  

		

		

		/*---------------------------------MMR Equipment Status -------------------------------*/

		

		

		$formfieldarray = array();

		$siteattrname = array();

		$flatres = array(); 

		$ref_overall = array();

		$ref_overall_temp = array();

		$sitearr = array();

		$sitearr[] = $site;

		$reportdate_val = "";

		$dateString = $segment2.'-'.$segment3.'-04';

		//Last date of current month.



		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));

		$lastdatearr = explode("-",$lastDateOfMonth);

		$reportdate_val = $lastdatearr[2]."-".$segment3."-".$segment2;

		 if(Auth::user()->id == 1)

		 {

			  $sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');

			  $siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');

			  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');

		  }

		  else

		  {

		    $role_id = Auth::user()->role_id;

			$emp_id = Auth::user()->emp_id;

			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();

			$siteinfo = $getemp_info->community;

			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');

			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');

			$borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');

		  }

		  $sitearrnew = array();

		  foreach( $siteattrname as $kkk => $site2){

		     $sitearrnew[]=$kkk;

		  }



		$matchfields = ['month' => $segment3, 'year' => $segment2]; 

		if(Auth::user()->id == 1){

			$Equipmentmisres_count = \App\Equipmentmisreport::whereIn('site', $sitearrnew)->where($matchfields)->count();

			if($Equipmentmisres_count > 0){

				$technicalServices_Count = $technicalServices_Count+1;

				$formfieldarray = \App\Equipmentmisreport::whereIn('site', $sitearrnew)->where($matchfields)->get();

			}

		}

		else

		{

		  $Equipmentmisres_count = \App\Equipmentmisreport::whereIn('site', $sitearrnew)->where($matchfields)->count();

		  if($Equipmentmisres_count > 0)

		  {

		  	$technicalServices_Count = $technicalServices_Count+1;

			$formfieldarray = \App\Equipmentmisreport::whereIn('site', $sitearrnew)->where($matchfields)->get();

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

			$mismatchfields = ['month' => $segment3, 'year' => $segment2, 'site' =>$skey]; 

			$mismatchcount = \App\Equipmentmisreport::where($mismatchfields)->count();

			if($mismatchcount > 0){ 

				 $mismatch_ress = \App\Equipmentmisreport::where($mismatchfields)->first();

				 $misresult[$skey] = $mismatch_ress;

			} 		

			if($segment3 == 1){

			  $prev_mon = 12;

			  $prev_year = $segment2 - 1;

 			}

			else{

			  $prev_mon = $segment3 - 1;

			  $prev_year = $segment2;

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

			else

			{

			   $issuecount[$skey] = 0;

			   $ref_overall[$skey]= 0;

			}

			//MODIFIED ARRAY

			$ref_a_temp = array();

			if($ref_count > 0){

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

			else

			{

			   $ref_overall_temp[$skey] = 0;

			}

			}

		  }

		  arsort($issuecount);



		$relations = [
		
			'ikey' => $site,  

			'res' => $formfieldarray,  

			'sites' => $siteattrname,

			'report_on' => $reportdate_val,

			'report_year' => $segment2,

			'report_month' => $segment3,

			'monthname' => date("F", mktime(0, 0, 0, $segment3, 10)),

			'issues' => $ref_overall, 

			'issuecount' => $issuecount,

			'validation' => $ref_total, 

			'misres' => $misresult, 

			 'misprevious' => $misprevresult,

			'issuetemp' => $ref_overall_temp,

			'tCount' => $technicalServices_Count,

			'MICount' => $MajorIncidents_Count

			]; 

		  if (count($issuecount) > 0) 

		  {

			  $mc = 0;$issuet = array();

			  foreach ($issuecount as $ikey => $issuecn) 

			  {

				$mc = $mc + 1;

				if($ikey==$site)

				{

					$relations = [

						'ikey' => $site,  

						'sites' => $siteattrname,

						'issuecn' => $issuecn,

						'report_on' => $reportdate_val,

						'report_year' => $segment2,

						'report_month' => $segment3,

						'monthname' => date("F", mktime(0, 0, 0, $segment3, 10)),

						'issues' => $ref_overall, 

						'issuecount' => $issuecount,

						'validation' => $ref_total, 

						'misres' => $misresult, 

						 'misprevious' => $misprevresult,

						'issuetemp' => $ref_overall_temp,

						'tCount' => $technicalServices_Count,

						'MICount' => $MajorIncidents_Count

						]; 

					if($issuecn > 5) {

						       $issuet[$ikey] = $site;

						       	$relations1 = [

								'ikey' => $site,  

								'sites' => $siteattrname,

								'issuecn' => $issuecn,

								'report_on' => $reportdate_val,

								'monthname' => date("F", mktime(0, 0, 0, $segment3, 10)),

								'report_year' => $segment2,

								'report_month' => $segment3,

								'issues' => $ref_overall, 

								'issuecount' => $issuecount,

								'validation' => $ref_total, 

								'misres' => $misresult, 

								'misprevious' => $misprevresult,

								'issuetemp' => $ref_overall_temp,

							];  

							

						    

							  $pdf = PDF::loadView('mmrreports.landscpaefile', $relations1);

		                      $pdf->setPaper('A4', 'landscape');

		                      $pdf->save(storage_path('/mmrfiles/mmrequipmentcprintissue.pdf'));  

							 

						  } else

						  {

						 

						  if($issuecn > 0)

						   {

						  $issuet[$ikey] = $site;

						    

							 	$relations2 = [

								'ikey' => $site,  

								'sites' => $siteattrname,

								'issuecn' => $issuecn,

								'report_on' => $reportdate_val,

								'report_year' => $segment2,

								'report_month' => $segment3,

								'monthname' => date("F", mktime(0, 0, 0, $segment3, 10)),

								'issues' => $ref_overall, 

								'issuecount' => $issuecount,

								'validation' => $ref_total, 

								'misres' => $misresult, 

								'misprevious' => $misprevresult,

								'issuetemp' => $ref_overall_temp,

							];  

							
						
						    

							  $pdf = PDF::loadView('mmrreports.portraitfile', $relations2);

		                      

		                       $pdf->save(storage_path('/mmrfiles/mmrequipmentcprintissue.pdf'));  

							   

						}	   

					}

				 } 

			  }

			}
			
		$pdf = PDF::loadView('mmrreports.mmr_mmrequipments', $relations);

		//$pdf->setPaper('A4', 'landscape');

		if($Equipmentmisres_count > 0)$pdf->save(storage_path('/mmrfiles/mmrequipmentstatus.pdf'));  
		
		
		
		
		/*---------------------------------MMR Equipment Status -------------------------------*/

		
		
		/*---------------------------------MMR STP Status -------------------------------*/

		

		

		$formfieldarray = array();

		$siteattrname = array();

		$flatres = array(); 

		$ref_overall = array();

		$ref_overall_temp = array();

		$sitearr = array();

		$sitearr[] = $site;

		$reportdate_val = "";

		$dateString = $segment2.'-'.$segment3.'-04';

		//Last date of current month.



		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));

		$lastdatearr = explode("-",$lastDateOfMonth);

		$reportdate_val = $lastdatearr[2]."-".$segment3."-".$segment2;

		 if(Auth::user()->id == 1)

		 {

			  $sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');

			  $siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');

			  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');

		  }

		  else

		  {

		    $role_id = Auth::user()->role_id;

			$emp_id = Auth::user()->emp_id;

			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();

			$siteinfo = $getemp_info->community;

			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');

			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');

			$borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');

		  }

		  $sitearrnew = array();

		  foreach( $siteattrname as $kkk => $site2){

		     $sitearrnew[]=$kkk;

		  }



		$matchfields = ['month' => $segment3, 'year' => $segment2]; 

		if(Auth::user()->id == 1){

			$Stpmisres_count = \App\Stpmisreport::whereIn('site', $sitearrnew)->where($matchfields)->count();

			if($Stpmisres_count > 0){

				$formfieldarray = \App\Stpmisreport::whereIn('site', $sitearrnew)->where($matchfields)->get();

			}

		}

		else

		{

		  $Stpmisres_count = \App\Stpmisreport::whereIn('site', $sitearrnew)->where($matchfields)->count();

		  if($Stpmisres_count > 0)

		  {

			$formfieldarray = \App\Stpmisreport::whereIn('site', $sitearrnew)->where($matchfields)->get();

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

		  $misprevresult = array();

		  $ref_total = array();

		  if(count($refid) > 0){

		    $ref_overall = array();

			foreach($refid as $skey =>$ref){

			 $ref_a = array();

		  	$matchreffields = ['ref_id' => $ref, 'site' => $site]; 

			$matchvalidfields = ['site' => $site]; 

		    $tot_count = \App\Dailyreportvalidation::where($matchvalidfields)->count();

			if($tot_count > 0){

				 $tot_ress = \App\Dailyreportvalidation::where($matchvalidfields)->first();

				 $ref_total[$skey] = $tot_ress;

			} 

			$mismatchfields = ['month' => $segment3, 'year' => $segment2, 'site' =>$site]; 

			$mismatchcount = \App\Stpmisreport::where($mismatchfields)->count();

			if($mismatchcount > 0){ 

				 $mismatch_ress = \App\Stpmisreport::where($mismatchfields)->first();

				 $misresult[$skey] = $mismatch_ress;

			} 		

			if($segment3 == 1){

			  $prev_mon = 12;

			  $prev_year = $segment2 - 1;

 			}

			else{

			  $prev_mon = $segment3 - 1;

			  $prev_year = $segment2;

			}

			$mismatchprevfields = ['month' => $prev_mon, 'year' => $prev_year, 'site' =>$site]; 

			$misprevmatchcount = \App\Stpmisreport::where($mismatchprevfields)->count();

			if($misprevmatchcount > 0){

				 $mismatch_prev_ress = \App\Stpmisreport::where($mismatchprevfields)->first();

				 $misprevresult[$skey] = $mismatch_prev_ress;

			} 

		  	$stpn_count = \App\Stpnotworkingissue::where($matchreffields)->count();

			if($stpn_count > 0){

			   $ref_count_val = \App\Stpnotworkingissue::where($matchreffields)->count(); 

			   $issuecount[$skey] = $ref_count_val;

			   $ref_record_val = \App\Stpnotworkingissue::where($matchreffields)->get();

			   foreach($ref_record_val as $ref_rec){

			      $ref_a[] = $ref_rec;

			   }

			   $ref_overall[$skey] =  $ref_a;

			}

			else

			{

			   $issuecount[$skey] = 0;

			   $ref_overall[$skey]= 0;

			}

			//MODIFIED ARRAY

			$ref_a_temp = array();

			if($stpn_count > 0){

			    $ref_record_temp_val = \App\Stpnotworkingissue::where($matchreffields)->orderBy('category', 'asc')->get();



			   foreach($ref_record_temp_val as $ref_temp_rec){

			     $ref_a_temp['category'][] = $ref_temp_rec->category;
					  $ref_a_temp['issue_des'][] = $ref_temp_rec->issue_des;
					  $ref_a_temp['root_cause'][] = $ref_temp_rec->root_cause;
					  $ref_a_temp['act_req_plan'][] = $ref_temp_rec->act_req_plan;
					  $ref_a_temp['pendingfromdays'][] = $ref_temp_rec->pendingfromdays;
					  $ref_a_temp['reponsibility'][] = $ref_temp_rec->reponsibility;
					  $ref_a_temp['notify_concern'][] = $ref_temp_rec->notify_concern;
					  $ref_a_temp['estimation_time'][] = $ref_temp_rec->estimation_time;
			   } 

			   $ref_overall_temp[$skey] =  $ref_a_temp;

			}

			else

			{

			   $ref_overall_temp[$skey] = 0;

			}

			}

		  }

		  arsort($issuecount);



		$relations = [
		
			'ikey' => $site,  

			'res' => $formfieldarray,  

			'sites' => $siteattrname,

			'report_on' => $reportdate_val,

			'report_year' => $segment2,

			'report_month' => $segment3,

			'monthname' => date("F", mktime(0, 0, 0, $segment3, 10)),

			'issues' => $ref_overall, 

			'issuecount' => $issuecount,

			'validation' => $ref_total, 

			'misres' => $misresult, 

			'misprevious' => $misprevresult,

			'issuetemp' => $ref_overall_temp,

			'tCount' => $technicalServices_Count,

			'MICount' => $MajorIncidents_Count

			]; 

		  if (count($issuecount) > 0) 

		  {

			  $mc = 0;$issuet = array();

			  foreach ($issuecount as $ikey => $issuecn) 

			  {

				$mc = $mc + 1;

				if($ikey==$site)

				{

					$relations = [

						'ikey' => $site,  

						'sites' => $siteattrname,

						'issuecn' => $issuecn,

						'report_on' => $reportdate_val,

						'report_year' => $segment2,

						'report_month' => $segment3,

						'monthname' => date("F", mktime(0, 0, 0, $segment3, 10)),

						'issues' => $ref_overall, 

						'issuecount' => $issuecount,

						'validation' => $ref_total, 

						'misres' => $misresult, 

						 'misprevious' => $misprevresult,

						'issuetemp' => $ref_overall_temp,

						'tCount' => $technicalServices_Count,

						'MICount' => $MajorIncidents_Count

						]; 

					if($issuecn > 5) {

						       $issuet[$ikey] = $site;

						       	$relations1 = [

								'ikey' => $site,  

								'sites' => $siteattrname,

								'issuecn' => $issuecn,

								'report_on' => $reportdate_val,

								'monthname' => date("F", mktime(0, 0, 0, $segment3, 10)),

								'report_year' => $segment2,

								'report_month' => $segment3,

								'issues' => $ref_overall, 

								'issuecount' => $issuecount,

								'validation' => $ref_total, 

								'misres' => $misresult, 

								'misprevious' => $misprevresult,

								'issuetemp' => $ref_overall_temp,

							];  

							

						    

							  $pdf = PDF::loadView('misprints.stp.landscpaefile', $relations1);

		                      $pdf->setPaper('A4', 'landscape');

		                      $pdf->save(storage_path('/mmrfiles/mmrstpcprintissue.pdf'));  

							 

						  } else

						  {

						 

						  if($issuecn > 0)

						   {

						  $issuet[$ikey] = $site;

						    

							 	$relations2 = [

								'ikey' => $site,  

								'sites' => $siteattrname,

								'issuecn' => $issuecn,

								'report_on' => $reportdate_val,

								'report_year' => $segment2,

								'report_month' => $segment3,

								'monthname' => date("F", mktime(0, 0, 0, $segment3, 10)),

								'issues' => $ref_overall, 

								'issuecount' => $issuecount,

								'validation' => $ref_total, 

								'misres' => $misresult, 

								'misprevious' => $misprevresult,

								'issuetemp' => $ref_overall_temp,

							];  

							
						
						    

							  $pdf = PDF::loadView('misprints.stp.portraitfile', $relations2);

		                      

		                       $pdf->save(storage_path('/mmrfiles/mmrstpcprintissue.pdf'));  

							   

						}	   

					}

				 } 

			  }

			}
			
		$pdf = PDF::loadView('misprints.stp.mainfile', $relations);

		//$pdf->setPaper('A4', 'landscape');

		if($Stpmisres_count > 0)$pdf->save(storage_path('/mmrfiles/mmrstpstatus.pdf'));  
		
		
		
		
		/*---------------------------------MMR STP Status -------------------------------*/
		
		


		/*---------------------------------MMR WAP Status -------------------------------*/

		

		

		$formfieldarray = array();

		$siteattrname = array();

		$flatres = array(); 

		$ref_overall = array();

		$ref_overall_temp = array();

		$sitearr = array();

		$sitearr[] = $site;

		$reportdate_val = "";

		$dateString = $segment2.'-'.$segment3.'-04';

		//Last date of current month.



		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));

		$lastdatearr = explode("-",$lastDateOfMonth);

		$reportdate_val = $lastdatearr[2]."-".$segment3."-".$segment2;

		 if(Auth::user()->id == 1)

		 {

			  $sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');

			  $siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');

			  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');

		  }

		  else

		  {

		    $role_id = Auth::user()->role_id;

			$emp_id = Auth::user()->emp_id;

			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();

			$siteinfo = $getemp_info->community;

			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');

			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');

			$borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');

		  }

		  $sitearrnew = array();

		  foreach( $siteattrname as $kkk => $site2){

		     $sitearrnew[]=$kkk;

		  }



		$matchfields = ['month' => $segment3, 'year' => $segment2]; 

		if(Auth::user()->id == 1){

			$Wspmisres_count = \App\Wspmisreport::whereIn('site', $sitearrnew)->where($matchfields)->count();

			if($Wspmisres_count > 0){

				$formfieldarray = \App\Wspmisreport::whereIn('site', $sitearrnew)->where($matchfields)->get();

			}

		}

		else

		{

		  $Wspmisres_count = \App\Wspmisreport::whereIn('site', $sitearrnew)->where($matchfields)->count();

		  if($Wspmisres_count > 0)

		  {

			$formfieldarray = \App\Wspmisreport::whereIn('site', $sitearrnew)->where($matchfields)->get();

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

		  $misprevresult = array();

		  $ref_total = array();

		  if(count($refid) > 0){

		    $ref_overall = array();

			foreach($refid as $skey =>$ref){

			 $ref_a = array();

		  	$matchreffields = ['ref_id' => $ref, 'site' => $site]; 

			$matchvalidfields = ['site' => $site]; 

		    $tot_count = \App\Dailyreportvalidation::where($matchvalidfields)->count();

			if($tot_count > 0){

				 $tot_ress = \App\Dailyreportvalidation::where($matchvalidfields)->first();

				 $ref_total[$skey] = $tot_ress;

			} 

			$mismatchfields = ['month' => $segment3, 'year' => $segment2, 'site' =>$site]; 

			$mismatchcount = \App\Wspmisreport::where($mismatchfields)->count();

			if($mismatchcount > 0){ 

				 $mismatch_ress = \App\Wspmisreport::where($mismatchfields)->first();

				 $misresult[$skey] = $mismatch_ress;

			} 		

			if($segment3 == 1){

			  $prev_mon = 12;

			  $prev_year = $segment2 - 1;

 			}

			else{

			  $prev_mon = $segment3 - 1;

			  $prev_year = $segment2;

			}

			$mismatchprevfields = ['month' => $prev_mon, 'year' => $prev_year, 'site' =>$site]; 

			$misprevmatchcount = \App\Wspmisreport::where($mismatchprevfields)->count();

			if($misprevmatchcount > 0){

				 $mismatch_prev_ress = \App\Wspmisreport::where($mismatchprevfields)->first();

				 $misprevresult[$skey] = $mismatch_prev_ress;

			} 

		  	$wspn_count = \App\Wspnotworkingissue::where($matchreffields)->count();

			if($wspn_count > 0){

			   $ref_count_val = \App\Wspnotworkingissue::where($matchreffields)->count(); 

			   $issuecount[$skey] = $ref_count_val;

			   $ref_record_val = \App\Wspnotworkingissue::where($matchreffields)->get();

			   foreach($ref_record_val as $ref_rec){

			      $ref_a[] = $ref_rec;

			   }

			   $ref_overall[$skey] =  $ref_a;

			}

			else

			{

			   $issuecount[$skey] = 0;

			   $ref_overall[$skey]= 0;

			}

			//MODIFIED ARRAY

			$ref_a_temp = array();

			if($wspn_count > 0){

			    $ref_record_temp_val = \App\Wspnotworkingissue::where($matchreffields)->orderBy('category', 'asc')->get();



			   foreach($ref_record_temp_val as $ref_temp_rec){

			     $ref_a_temp['category'][] = $ref_temp_rec->category;
					  $ref_a_temp['issue_des'][] = $ref_temp_rec->issue_des;
					  $ref_a_temp['root_cause'][] = $ref_temp_rec->root_cause;
					  $ref_a_temp['act_req_plan'][] = $ref_temp_rec->act_req_plan;
					  $ref_a_temp['pendingfromdays'][] = $ref_temp_rec->pendingfromdays;
					  $ref_a_temp['reponsibility'][] = $ref_temp_rec->reponsibility;
					  $ref_a_temp['notify_concern'][] = $ref_temp_rec->notify_concern;
					  $ref_a_temp['estimation_time'][] = $ref_temp_rec->estimation_time;
			   } 

			   $ref_overall_temp[$skey] =  $ref_a_temp;

			}

			else

			{

			   $ref_overall_temp[$skey] = 0;

			}

			}

		  }

		  arsort($issuecount);



		$relations = [
		
			'ikey' => $site,  

			'res' => $formfieldarray,  

			'sites' => $siteattrname,

			'report_on' => $reportdate_val,

			'report_year' => $segment2,

			'report_month' => $segment3,

			'monthname' => date("F", mktime(0, 0, 0, $segment3, 10)),

			'issues' => $ref_overall, 

			'issuecount' => $issuecount,

			'validation' => $ref_total, 

			'misres' => $misresult, 

			'misprevious' => $misprevresult,

			'issuetemp' => $ref_overall_temp,

			'tCount' => $technicalServices_Count,

			'MICount' => $MajorIncidents_Count

			]; 

		  if (count($issuecount) > 0) 

		  {

			  $mc = 0;$issuet = array();

			  foreach ($issuecount as $ikey => $issuecn) 

			  {

				$mc = $mc + 1;

				if($ikey==$site)

				{

					$relations = [

						'ikey' => $site,  

						'sites' => $siteattrname,

						'issuecn' => $issuecn,

						'report_on' => $reportdate_val,

						'report_year' => $segment2,

						'report_month' => $segment3,

						'monthname' => date("F", mktime(0, 0, 0, $segment3, 10)),

						'issues' => $ref_overall, 

						'issuecount' => $issuecount,

						'validation' => $ref_total, 

						'misres' => $misresult, 

						 'misprevious' => $misprevresult,

						'issuetemp' => $ref_overall_temp,

						'tCount' => $technicalServices_Count,

						'MICount' => $MajorIncidents_Count

						]; 

					if($issuecn > 5) {

						       $issuet[$ikey] = $site;

						       	$relations1 = [

								'ikey' => $site,  

								'sites' => $siteattrname,

								'issuecn' => $issuecn,

								'report_on' => $reportdate_val,

								'monthname' => date("F", mktime(0, 0, 0, $segment3, 10)),

								'report_year' => $segment2,

								'report_month' => $segment3,

								'issues' => $ref_overall, 

								'issuecount' => $issuecount,

								'validation' => $ref_total, 

								'misres' => $misresult, 

								'misprevious' => $misprevresult,

								'issuetemp' => $ref_overall_temp,

							];  

							

						    

							  $pdf = PDF::loadView('misprints.wsp.landscpaefile', $relations1);

		                      $pdf->setPaper('A4', 'landscape');

		                      $pdf->save(storage_path('/mmrfiles/mmrwspcprintissue.pdf'));  

							 

						  } else

						  {

						 

						  if($issuecn > 0)

						   {

						  $issuet[$ikey] = $site;

						    

							 	$relations2 = [

								'ikey' => $site,  

								'sites' => $siteattrname,

								'issuecn' => $issuecn,

								'report_on' => $reportdate_val,

								'report_year' => $segment2,

								'report_month' => $segment3,

								'monthname' => date("F", mktime(0, 0, 0, $segment3, 10)),

								'issues' => $ref_overall, 

								'issuecount' => $issuecount,

								'validation' => $ref_total, 

								'misres' => $misresult, 

								'misprevious' => $misprevresult,

								'issuetemp' => $ref_overall_temp,

							];  

							
						
						    

							  $pdf = PDF::loadView('misprints.wsp.portraitfile', $relations2);

		                      

		                       $pdf->save(storage_path('/mmrfiles/mmrwspcprintissue.pdf'));  

							   

						}	   

					}

				 } 

			  }

			}
			
		$pdf = PDF::loadView('misprints.wsp.mainfile', $relations);

		//$pdf->setPaper('A4', 'landscape');

		if($Wspmisres_count > 0)$pdf->save(storage_path('/mmrfiles/mmrwspstatus.pdf'));  
		
		
		
		
		/*---------------------------------MMR WSP Status -------------------------------*/
		

		
			
		/*----------------------------------REPORT Elevel End (Daily Security Data)----------- */
			
		  if(Auth::user()->id == 1)
		  {
			  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('name', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
			  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('name', 'ASC')->get()->pluck('name', 'id');
			  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
			  $sites_res_arr = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  }
		  else
		  {
	
			$role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('name', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('name', 'ASC')->get()->pluck('name', 'id');
			$sites_res_arr = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
		  }

		$matchfields = ['month' => $segment3, 'year' => $segment2, 'site' => $site]; 
		$SecuritymisreportCount =  Securitymisreport::select('securitymisreports.*')->leftJoin('sites','sites.id','=','securitymisreports.site')->orderBy('sites.name', 'ASC')->where($matchfields)->count();
		if($SecuritymisreportCount > 0)
		{
			$fieldarr = Securitymisreport::select('securitymisreports.*')->leftJoin('sites','sites.id','=','securitymisreports.site')->orderBy('sites.name', 'ASC')->where($matchfields)->first();
			$existing_records[$fieldarr->site] = array("id"=>$fieldarr->id,"guards"=>$fieldarr->guards,"l_guards"=>$fieldarr->l_guards,"h_guards"=>$fieldarr->h_guards,"supervisors"=>$fieldarr->supervisors,"aso"=>$fieldarr->aso,"so_num"=>$fieldarr->so_num,"nalla_gandla_hub"=>$fieldarr->nalla_gandla_hub,"hillpark_hub"=>$fieldarr->hillpark_hub);
			
			$current_month=$segment3;
			$current_year=$segment2;
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
			
			$dateString = $segment2.'-'.$segment3.'-04';
			//Last date of current month.
			$lastDateOfMonth = date("t", strtotime($dateString));
			//$reportdate_val = $lastDateOfMonth."-".$segment4."-".$segment3;
			
			$reportdate_val = $segment2."-".$segment3."-".$lastDateOfMonth;
			
			$security_match_fields = ['site' => $fieldarr->site,'reporton' => $reportdate_val];
			
			$prev_sec_report_cn = \App\Securitydailyreport::where($security_match_fields)->count();
			 
			$eqpmatchfields = ['site' => $fieldarr->site]; 
			$equipcn = \App\Securitydailyreportvalidation::where($eqpmatchfields)->count();
			if($equipcn > 0){
				$equipvalidation = \App\Securitydailyreportvalidation::where($eqpmatchfields)->first();
			} 
			
			 $exist_Sec['sites'][$fieldarr->site] = get_sitename($fieldarr->site);
			 $exist_Sec['guards'][$fieldarr->site] = $fieldarr->guards;
			 $exist_Sec['l_guards'][$fieldarr->site] = $fieldarr->l_guards;
			 $exist_Sec['h_guards'][$fieldarr->site] = $fieldarr->h_guards;
			 $exist_Sec['supervisors'][$fieldarr->site] = $fieldarr->supervisors;
			 $exist_Sec['aso'][$fieldarr->site] = $fieldarr->aso;
			  $exist_Sec['computers_num'][$fieldarr->site] = $fieldarr->computers_num;
			 $exist_Sec['bicycle_num'][$fieldarr->site] = $fieldarr->bicycle_num;
			 $exist_Sec['so_num'][$fieldarr->site] = $fieldarr->so_num;
			  $exist_Sec['nalla_gandla_hub'][$fieldarr->site] = $fieldarr->nalla_gandla_hub;
			 $exist_Sec['hillpark_hub'][$fieldarr->site] = $fieldarr->hillpark_hub;
			 
			 $exist_Sec['ctotval'][$fieldarr->site] = (float)$fieldarr->guards + (float)$fieldarr->l_guards + (float)$fieldarr->h_guards + (float)$fieldarr->supervisors + (float)$fieldarr->aso + (float)$fieldarr->so_num+ (float)$fieldarr->hillpark_hub;
			 
			 if($prev_sec_report_cn > 0)
			 {
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
											  
			$relations = [
			'sites' => $siteattrname,
			'borewellsnum' => $borewellsnum,
			'report_on' => $reportdate_val,
			'report_year' => $segment2,
			'report_month' => $segment3,
			'existing' => $existing_records,
			'existsec' => $exist_Sec
			]; 
			
			//echo "<pre>"; print_r($relations); echo "</pre>";
			
			$pdf = PDF::loadView('mmrreports.missecurityoneprint', $relations);  
		    $pdf->save(storage_path('/mmrfiles/omisdailysecuritydata.pdf'));  
		}
		
		
		
		
		
		

		/*----------------------------------MMR AMC TRACKER------------------------------------*/	

		

		
		$wresullt = array();
		
		$wresullt = Communityassetmaintenance::select("communityassetmaintenances.*",'categories.name as catgname','vendors.name as vendorname','assets.name as assetname','sites.name as sitename')->leftJoin('community_assets','community_assets.id','=','communityassetmaintenances.cam_id')->leftJoin('categories','categories.id','=','communityassetmaintenances.category_id')->leftJoin('vendors','vendors.id','=','community_assets.vendor')->leftJoin('assets','assets.id','=','community_assets.asset_id')->leftJoin('sites','sites.id','=','communityassetmaintenances.site_id')->where('communityassetmaintenances.status','=',1)->where('communityassetmaintenances.site_id', $site)->where('communityassetmaintenances.status',1)->whereIn('communityassetmaintenances.amc_type',['amc','waranty'])->groupBy('communityassetmaintenances.id')->orderBy('communityassetmaintenances.alert_date', 'asc')->get();	

		$amctracker_Count = count($wresullt);
		
		
		

		/*$matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year]; 

		$amctracker_Count = \App\Mmrwarantyreport::where($matchfields_hskpact)->count();

		if($amctracker_Count > 0){

			$technicalServices_Count = $technicalServices_Count+1;

			$wresullt = \App\Mmrwarantyreport::where($matchfields_hskpact)->get();

		}
*/
		 		

		$relations = [

		'year' => $segment2,

		'month' => $segment3, 

		'monthname' => date("F", mktime(0, 0, 0, $segment3, 10)),

		'sitename' => get_sitename($site),

		'site' => $site,

		'wresval' => $wresullt,

		'tCount' => $technicalServices_Count,

		'MICount' => $MajorIncidents_Count,

		'EQPCOunt' => $Equipmentmisres_count

        ];  

		$pdf = PDF::loadView('mmrreports.mmr_mmramctrackers', $relations);

		$pdf->setPaper('A4', 'landscape');

		if($amctracker_Count > 0)$pdf->save(storage_path('/mmrfiles/amctracker.pdf')); 

		

		

		

		/*----------------------------------Planned Preventives Vendor Maintenance------------------------------------*/

		

		

		$resullt = array();

		$matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year, 'type'=>'Vendor']; 

		$PlannedPreventives_Count = \App\Mmrppmreport::where($matchfields_hskpact)->count();

		if($PlannedPreventives_Count > 0){

			$technicalServices_Count = $technicalServices_Count+1;

			$resullt = \App\Mmrppmreport::where($matchfields_hskpact)->get();

		}

		$last_month = $month-1%12;

		$lstmn = ($last_month==0?'12':$last_month);

		$lyear =  ($last_month==0?($year-1):$year);

		$lresullt = array();

		$lmatchfields_hskpact = ['site' => $site, 'month' =>$lstmn, 'year' => $lyear, 'type'=>'Vendor']; 

		$PlannedPreventives_NCount = \App\Mmrppmreport::where($lmatchfields_hskpact)->count();

		if($PlannedPreventives_NCount > 0){

			$technicalServices_Count = $technicalServices_Count+1;

			$lresullt = \App\Mmrppmreport::where($lmatchfields_hskpact)->get();

		}

		

		 $relations = [

			'year' => $year,

			'month' => $month, 

			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),

			'sitename' => get_sitename($site),

			'site' => $site,

			'resval' => $resullt,

			'lresval' => $lresullt,

			'tCount' => $technicalServices_Count,			

			'MICount' => $MajorIncidents_Count,

			'EQPCOunt' => $Equipmentmisres_count,			

			'AMCCount' => $amctracker_Count

        ];  

		$pdf = PDF::loadView('mmrreports.mmr_mmrplannedperventives', $relations);

		if($PlannedPreventives_Count>0 || $PlannedPreventives_NCount>0) $pdf->save(storage_path('/mmrfiles/plannedperventives.pdf'));
		
		
		
		
		/*----------------------------------Planned Preventives Inhouse Maintenance------------------------------------*/

		

		

		$resullt = array();

		$matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year, 'type'=>'Inhouse']; 

		$PlannedPreventives_InCount = \App\Mmrppmreport::where($matchfields_hskpact)->count();

		if($PlannedPreventives_InCount > 0){

			$resullt = \App\Mmrppmreport::where($matchfields_hskpact)->get();

		}

		$last_month = $month-1%12;

		$lstmn = ($last_month==0?'12':$last_month);

		$lyear =  ($last_month==0?($year-1):$year);

		$lresullt = array();

		$lmatchfields_hskpact = ['site' => $site, 'month' =>$lstmn, 'year' => $lyear, 'type'=>'Vendor']; 

		$PlannedPreventives_INNCount = \App\Mmrppmreport::where($lmatchfields_hskpact)->count();

		if($PlannedPreventives_INNCount > 0){

			$lresullt = \App\Mmrppmreport::where($lmatchfields_hskpact)->get();

		}

		

		 $relations = [

			'year' => $year,

			'month' => $month, 

			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),

			'sitename' => get_sitename($site),

			'site' => $site,

			'resval' => $resullt,

			'lresval' => $lresullt,

			'tCount' => $technicalServices_Count,			

			'MICount' => $MajorIncidents_Count,

			'EQPCOunt' => $Equipmentmisres_count,			

			'AMCCount' => $amctracker_Count

        ];  

		$pdf = PDF::loadView('mmrreports.mmr_mmrinplannedperventives', $relations);

		if($PlannedPreventives_InCount>0 || $PlannedPreventives_INNCount>0) $pdf->save(storage_path('/mmrfiles/inhouseplannedperventives.pdf'));

		

		

		/*-----------------------------------------------Power Consumption-----------------------------------------------*/

		

		

		$resullt = array();

		$image = "";

		$matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year, 'type' => 'graphs', 'title' => 'Power Consumtion']; 



		$resullt_cn = \App\Mmrmonthlyreport::where($matchfields_hskpact)->count();

		if($resullt_cn > 0){

			$resullt = \App\Mmrmonthlyreport::where($matchfields_hskpact)->first();

			$image = $resullt->before_image;

		}

		

		$prev_omonths = date($year.'-'.$month.'-d.');

		$prev_omonth = date ('m', strtotime ( '-1 month' , strtotime ( $prev_omonths )));

		$prev_oyear = date ('Y', strtotime ( '-1 month' , strtotime ( $prev_omonths )));

		

		$prev_tmonth = date ('m', strtotime ( '-2 month' , strtotime ( $prev_omonths )));

		$prev_tyear = date ('Y', strtotime ( '-2 month' , strtotime ( $prev_omonths )));

		

		$prev_thmonth = date ('m', strtotime ( '-3 month' , strtotime ( $prev_omonths )));

		$prev_thyear = date ('Y', strtotime ( '-3 month' , strtotime ( $prev_omonths )));		

			  

		$ebpower_sdate2 =  date($prev_oyear.'-'.$prev_omonth.'-21');

		$ebpower_edate2 =  date($year.'-'.$month.'-20');

		

		$ebpower_sdate1 =  date($prev_tyear.'-'.$prev_tmonth.'-21');

		$ebpower_edate1 =  date($prev_oyear.'-'.$prev_omonth.'-20');

		

		$ebpower_sdate =  date($prev_thyear.'-'.$prev_thmonth.'-21');

		$ebpower_edate =  date($prev_tyear.'-'.$prev_tmonth.'-20');

		

		$result = array();

		$solarpwrunits3 = 0;

		$pwr_pwrfactor3 = 0;

		$dgunits3 = 0;

		$pwrfailure3 = 0;

		$mincn = 0;

		

		$powerCount1 = Fmsdailyreport::where('reporton', '>=', $ebpower_sdate2)->where('reporton', '<=', $ebpower_edate2)->where('site', '=', $site)->count();

		if($powerCount1>0)

		{

			$result = Fmsdailyreport::where('reporton', '>=', $ebpower_sdate2)->where('reporton', '<=', $ebpower_edate2)->where('site', '=', $site)->get();

			foreach($result as $res)

			{

				$tarr = explode(":",$res->dgset_pwrfailure);

				$solarpwrunits3 += (int)$res->pwr_solarpwrunits;

				$pwr_pwrfactor3 += (int)$res->pwr_ctpt;

				$dgunits3 += (int)$res->dgset_dgunits;

				$hour = (int)$tarr[0];

				$min = (int)$tarr[1];

				$tmin = ($hour * 60) + $min;

				$mincn = $mincn + $tmin;

			}			

			if($mincn > 0)

			{

				$hours = floor($mincn / 60);

				$minutes = ($mincn % 60);

				$pwrfailure3 = $hours.":".$minutes;

		 	} 

		}

		

		$solarpwrunits2 = 0;

		$pwr_pwrfactor2 = 0;

		$dgunits2 = 0;

		$pwrfailure2 = 0;

		$mincn = 0;

		$powerCount2 = Fmsdailyreport::where('reporton', '>=', $ebpower_sdate1)->where('reporton', '<=', $ebpower_edate1)->where('site', '=', $site)->count();

		if($powerCount2>0)

		{

			$result = Fmsdailyreport::where('reporton', '>=', $ebpower_sdate1)->where('reporton', '<=', $ebpower_edate1)->where('site', '=', $site)->get();
			foreach($result as $res)

			{
				//echo $res->reporton."<br/>";
				//echo "sdfsdf".$res->dgset_pwrfailure."<br/>";
				if($res->dgset_pwrfailure!="")
				{
					$tarr = explode(":",$res->dgset_pwrfailure);
					
					$hour = (int)$tarr[0];
	
					$min = (int)$tarr[1];
	
					$tmin = ($hour * 60) + $min;
	
					$mincn = $mincn + $tmin;
				}
				
				//echo "<pre>"; print_r($tarr); echo "</pre>";

				$solarpwrunits2 += (int)$res->pwr_solarpwrunits;

				$pwr_pwrfactor2 += (int)$res->pwr_ctpt;

				$dgunits2 += (int)$res->dgset_dgunits;

				

			}		
			if($mincn > 0)

			{

				$hours = floor($mincn / 60);

				$minutes = ($mincn % 60);

				$pwrfailure2 = $hours.":".$minutes;

		 	}

		}

		



		$solarpwrunits1 = 0;

		$pwr_pwrfactor1 = 0;

		$dgunits1 = 0;

		$pwrfailure1 = 0;

		$mincn = 0;

		

		$powerCount3 = Fmsdailyreport::where('reporton', '>=', $ebpower_sdate)->where('reporton', '<=', $ebpower_edate)->where('site', '=', $site)->count();

		if($powerCount3>0)

		{

			$result = Fmsdailyreport::where('reporton', '>=', $ebpower_sdate)->where('reporton', '<=', $ebpower_edate)->where('site', '=', $site)->get();

			foreach($result as $res)

			{

				$tarr = explode(":",$res->dgset_pwrfailure);

				$solarpwrunits1 += (int)$res->pwr_solarpwrunits;

				$pwr_pwrfactor1 += (int)$res->pwr_ctpt;

				$dgunits1 += (int)$res->dgset_dgunits;

				$hour = (int)$tarr[0];

				$min = (int)$tarr[1];

				$tmin = ($hour * 60) + $min;

				$mincn = $mincn + $tmin;

			}			

			if($mincn > 0)

			{

				$hours = floor($mincn / 60);

				$minutes = ($mincn % 60);

				$pwrfailure1 = $hours.":".$minutes;

		 	}

		}

		

		

		if($powerCount1 >0 || $powerCount2 >0 || $powerCount3 > 0) {

		 	$technicalServices_Count = $technicalServices_Count+1;

			$PConsumption_Count = 1;

		 }

		 else

		 {

		 	$PConsumption_Count = 0;

		 }

		

		

		 $relations = [

			'year' => $year,

			'month' => $month, 

			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),

			'cmonthname' => date("F", mktime(0, 0, 0, $month, 10)),

			'pmonthname' => date("F", mktime(0, 0, 0, $prev_omonth, 10)),

			'bmonthname' => date("F", mktime(0, 0, 0, $prev_tmonth, 10)),

			'sitename' => get_sitename($site),

			'site' => $site,

			'ebgraph' => $image,

			'solarpwrunits1' => $solarpwrunits1,

			'solarpwrunits2' => $solarpwrunits2,

			'solarpwrunits3' => $solarpwrunits3,

			'pwr_pwrfactor1' => $pwr_pwrfactor1,

			'pwr_pwrfactor2' => $pwr_pwrfactor2,

			'pwr_pwrfactor3' => $pwr_pwrfactor3,

			'dgunits1' => $dgunits1,

			'dgunits2' => $dgunits2,

			'dgunits3' => $dgunits3,

			'pwrfailure1' => $pwrfailure1,

			'pwrfailure2' => $pwrfailure2,

			'pwrfailure3' => $pwrfailure3,

			'tCount' => $technicalServices_Count,		

			'MICount' => $MajorIncidents_Count,

			'EQPCOunt' => $Equipmentmisres_count,			

			'AMCCount' => $amctracker_Count,

			'PPCount' => $PlannedPreventives_Count

			

        ];  

	    $pdf = PDF::loadView('mmrreports.mmr_power', $relations);

		if($powerCount1>0 || $powerCount2>0 || $powerCount3>0) $pdf->save(storage_path('/mmrfiles/ebpower.pdf'));

		 

		

		

		/*-----------------------------------------------Power Failure Analysis-----------------------------------------------*/

		

		

		$resullt = array();

		$image1 = "";

		$image2 = "";

		$matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year, 'type' => 'graphs', 'title' => 'Power Failure']; 

		$resullt_cn = \App\Mmrmonthlyreport::where($matchfields_hskpact)->count();

		if($resullt_cn > 0){

			$resullt = \App\Mmrmonthlyreport::where($matchfields_hskpact)->first();

			$image1 = $resullt->before_image;

		}

		

		$matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year, 'type' => 'graphs', 'title' => 'Diesel Consumed']; 

		$resullt_cn = \App\Mmrmonthlyreport::where($matchfields_hskpact)->count();

		if($resullt_cn > 0){

			$resullt = \App\Mmrmonthlyreport::where($matchfields_hskpact)->first();

			$image2 = $resullt->before_image;

		}

		

		$prev_omonths = date($year.'-'.$month.'-d.');

		$prev_omonth = date ('m', strtotime ( '-1 month' , strtotime ( $prev_omonths )));

		$prev_oyear = date ('Y', strtotime ( '-1 month' , strtotime ( $prev_omonths )));

		

		$prev_tmonth = date ('m', strtotime ( '-2 month' , strtotime ( $prev_omonths )));

		$prev_tyear = date ('Y', strtotime ( '-2 month' , strtotime ( $prev_omonths )));

		

		$prev_thmonth = date ('m', strtotime ( '-3 month' , strtotime ( $prev_omonths )));

		$prev_thyear = date ('Y', strtotime ( '-3 month' , strtotime ( $prev_omonths )));		

			  

		$ebpower_sdate2 =  date($prev_oyear.'-'.$prev_omonth.'-21');

		$ebpower_edate2 =  date($year.'-'.$month.'-20');

		

		$ebpower_sdate1 =  date($prev_tyear.'-'.$prev_tmonth.'-21');

		$ebpower_edate1 =  date($prev_oyear.'-'.$prev_omonth.'-20');

		

		$ebpower_sdate =  date($prev_thyear.'-'.$prev_thmonth.'-21');

		$ebpower_edate =  date($prev_tyear.'-'.$prev_tmonth.'-20');

		

		$result = array();

		$solarpwrunits3 = 0;

		$pwr_pwrfactor3 = 0;

		$dgunits3 = 0;

		$pwrfailure3 = 0;

		$dieselconsume3 = 0;

		$dieselstock3 = 0;

		$dieselfilled3 = 0;

		$mincn = 0;

		$powerfailureCount1 = Fmsdailyreport::where('reporton', '>=', $ebpower_sdate2)->where('reporton', '<=', $ebpower_edate2)->where('site', '=', $site)->count();

		if(count($powerfailureCount1)>0)

		{

			$result = Fmsdailyreport::where('reporton', '>=', $ebpower_sdate2)->where('reporton', '<=', $ebpower_edate2)->where('site', '=', $site)->get();

			foreach($result as $res)

			{

				$tarr = explode(":",$res->dgset_pwrfailure);

				$dieselconsume3 += (int)$res->dset_dieselconsume;

				$hour = (int)$tarr[0];

				$min = (int)$tarr[1];

				$tmin = ($hour * 60) + $min;

				$mincn = $mincn + $tmin;

			}			

			if($mincn > 0)

			{

				$hours = floor($mincn / 60);

				$minutes = ($mincn % 60);

				$pwrfailure3 = $hours.":".$minutes;

			} 

		}

		

		$solarpwrunits2 = 0;

		$pwr_pwrfactor2 = 0;

		$dgunits2 = 0;

		$pwrfailure2 = 0;

		$dieselconsume2 = 0;

		$dieselstock2 = 0;

		$dieselfilled2 = 0;

		$mincn = 0;

		$powerfailureCount2 = Fmsdailyreport::where('reporton', '>=', $ebpower_sdate1)->where('reporton', '<=', $ebpower_edate1)->where('site', '=', $site)->count();

		if(count($powerfailureCount2)>0)


		{

			$result = Fmsdailyreport::where('reporton', '>=', $ebpower_sdate1)->where('reporton', '<=', $ebpower_edate1)->where('site', '=', $site)->get();

			foreach($result as $res)

			{
				if($res->dgset_pwrfailure!="")
				{
					$tarr = explode(":",$res->dgset_pwrfailure);
	
					$hour = (int)$tarr[0];
	
					$min = (int)$tarr[1];
	
					$tmin = ($hour * 60) + $min;
	
					$mincn = $mincn + $tmin;
				}

				$dieselconsume2 += (int)$res->dset_dieselconsume;	

			}			

			if($mincn > 0)

			{

				$hours = floor($mincn / 60);

				$minutes = ($mincn % 60);

				$pwrfailure2 = $hours.":".$minutes;

			}

		}		

		$solarpwrunits1 = 0;

		$pwr_pwrfactor1 = 0;

		$dgunits1 = 0;

		$pwrfailure1 = 0;

		$dieselconsume1 = 0;

		$dieselstock1 = 0;

		$dieselfilled1 = 0;

		$mincn = 0;

		$powerfailureCount3 = Fmsdailyreport::where('reporton', '>=', $ebpower_sdate)->where('reporton', '<=', $ebpower_edate)->where('site', '=', $site)->count();

		if(count($result)>0)

		{

			$result = Fmsdailyreport::where('reporton', '>=', $ebpower_sdate)->where('reporton', '<=', $ebpower_edate)->where('site', '=', $site)->get();

			foreach($result as $res)

			{

				$tarr = explode(":",$res->dgset_pwrfailure);

				$dieselconsume1 += (int)$res->dset_dieselconsume;

				$hour = (int)$tarr[0];

				$min = (int)$tarr[1];

				$tmin = ($hour * 60) + $min;

				$mincn = $mincn + $tmin;

			}			

			if($mincn > 0)

			{

				$hours = floor($mincn / 60);

				$minutes = ($mincn % 60);

				$pwrfailure1 = $hours.":".$minutes;

			}

		}

		

		

		if($powerfailureCount1 >0 || $powerfailureCount2 >0 || $powerfailureCount3 > 0) {

			 $technicalServices_Count = $technicalServices_Count+1;

			 $powFailureCount = 1;

		}

		else

		{

			 $powFailureCount = 0;

		}

		

		

		 $relations = [

			'pyear' => $prev_oyear,			

			'poyear' => $prev_tyear,

			'year' => $year,

			'month' => $month, 

			'cmonthname' => date("F", mktime(0, 0, 0, $month, 10)),

			'pmonthname' => date("F", mktime(0, 0, 0, $prev_omonth, 10)),

			'bmonthname' => date("F", mktime(0, 0, 0, $prev_tmonth, 10)),

			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),

			'sitename' => get_sitename($site),

			'site' => $site,

			'ebgraph1' => $image1,

			'ebgraph2' => $image2,

			'pwrfailure1' => $pwrfailure1,

			'pwrfailure2' => $pwrfailure2,

			'pwrfailure3' => $pwrfailure3,

			'dieselconsume1' => $dieselconsume1,

			'dieselconsume2' => $dieselconsume2,

			'dieselconsume3' => $dieselconsume3,

			'tCount' => $technicalServices_Count,		

			'MICount' => $MajorIncidents_Count,

			'EQPCOunt' => $Equipmentmisres_count,			

			'AMCCount' => $amctracker_Count,

			'PPCount' => $PlannedPreventives_Count,

			'PConCount' => $PConsumption_Count

			

        ];  

	    $pdf = PDF::loadView('mmrreports.mmrpfanalysis', $relations);

		if($powerfailureCount1>0 || $powerfailureCount2>0 || $powerfailureCount3>0) $pdf->save(storage_path('/mmrfiles/pfanalysis.pdf'));

		

		

		/*-----------------------------------------------Diesel Report-----------------------------------------------*/

		



		$matchfields_fornoc = ['valid_month' => $month, 'valid_year' => $year, 'site' =>$site];		

		$DieselNOC_Count = \App\Blocknocmonthreport::where($matchfields_fornoc)->count();

		$resnoc_cres = array();

		if($DieselNOC_Count>0)

		$resnoc_cres = \App\Blocknocmonthreport::where($matchfields_fornoc)->get();

		else

		$resnoc_cres = \App\Blocknocmonthreport::where('site',$site)->get();

		$data =array();		

		if(count($resnoc_cres)>0) $technicalServices_Count = $technicalServices_Count+1;

		$data1 =array();

		$results = array();

		foreach($resnoc_cres as $key=>$value)

		{

			//echo "<pre>"; print_r($value); echo "</pre>";

			//echo $value->blockname."<br/>";

			$prev_omonths = date($year.'-'.$month.'-d.');

			$prev_omonth = date ('m', strtotime ( '-1 month' , strtotime ( $prev_omonths )));

			$prev_oyear = date ('Y', strtotime ( '-1 month' , strtotime ( $prev_omonths )));

			

			$ebpower_sdate2 =  date($prev_oyear.'-'.$prev_omonth.'-21');

			$ebpower_edate2 =  date($year.'-'.$month.'-20');

			

			

			$result = Fmsdailyreport::where('reporton', '>=', $ebpower_sdate2)->where('reporton', '<=', $ebpower_edate2)->where('site', '=', $site)->get();					

			$idval = 0;	

			$pwrfailure = '00:00:00';

			$dgunits = 0;

			$dgprunning  = 0;

			$dieselconsume = 0;

			$dieselfilled = 0;

			$results = array();

			if(count($result) > 0)

			{

				foreach($result as $sk => $fmsresrow)

				{

					//echo '<pre>'; print_r($fmsresrow); echo '</pre>';

					$idval =  $fmsresrow['id'];	

					$dgset_pwrfailure = $fmsresrow['dgset_pwrfailure'];

					$block = str_replace("Block -","",$value->blockname);

					$block = str_replace(" ","",$block);

					if($block!="") $block = $block;

					else $block = $value->blockname;

					//echo $block."<br/>";

					$dielselconsum_repors_res = Dailyfmsdieselconsumptionreport:: where('ref_id', '=', $idval)->where('site', '=', $site)->where('dgblock', '=', $block)->first();

					// '<pre>'; print_r($dielselconsum_repors_res); echo '</pre>';

					if(count($dielselconsum_repors_res)>0){

					    $sdate = date("d-m-Y",strtotime($fmsresrow['reporton']));

						$results[$sk]['reporton'] = $sdate;

						$results[$sk]['block'] = $key;

						$results[$sk]['dgset_pwrfailure'] =  $fmsresrow['dgset_pwrfailure'];

						$results[$sk]['dgset_pwrfailure_running'] =  $dielselconsum_repors_res['dg_run_difference'];

						$results[$sk]['dgset_dgunits'] = $dielselconsum_repors_res->dg_units_difference;

						$results[$sk]['dset_dieselconsume'] = $dielselconsum_repors_res->dg_diesel_diff_con;

						$results[$sk]['dgset_dieselstock'] = "";

						$results[$sk]['dgset_dieselfilled'] = $dielselconsum_repors_res->dg_diesel_filled;			

					}

				}

				//echo "<pre>"; print_r($results); echo "</pre>";

				foreach($results as $kk => $dieselreport)

				{

					

					$dgpwrfailure = $dieselreport['dgset_pwrfailure'].':00';

					$pwrfailure = sum_the_time($pwrfailure, $dgpwrfailure);

					$dgprunning = (float)$dgprunning+(float)$dieselreport['dgset_pwrfailure_running'];

					$dgunits = (float)$dgunits+(float)$dieselreport['dgset_dgunits'];

					$dieselconsume = (float) $dieselconsume+(float)$dieselreport['dset_dieselconsume'];

					$dieselfilled = (float)$dieselfilled+(float)$dieselreport['dgset_dieselfilled'];

					$data[$key]['block'] =  $block;

					$data[$key]['pwrfailure'] =  $pwrfailure;

					$data[$key]['dgprunning'] =  $dgprunning;

					$data[$key]['dgunits'] =  $dgunits;

					$data[$key]['dieselconsume'] =  $dieselconsume;

					$data[$key]['dieselfilled'] =  $dieselfilled;

				}

			}

			

			/*

			foreach($results as $kk => $dieselreport)

			{

				$dgpwrfailure = $dieselreport['dgset_pwrfailure'].':00';

				$data[$kk]['pwrfailure'] =  sum_the_time($pwrfailure, $dgpwrfailure);

				$data[$kk]['dgprunning'] =  (float)$dgprunning+(float)$dieselreport['dgset_pwrfailure_running'];

				$data[$kk]['dgunits'] =  (float)$dgunits+(float)$dieselreport['dgset_dgunits'];

				$data[$kk]['dieselconsume'] = (float) $dieselconsume+(float)$dieselreport['dset_dieselconsume'];

				$data[$kk]['dieselfilled'] =  (float)$dieselfilled+(float)$dieselreport['dgset_dieselfilled'];

			}*/

		}

		//echo count($data);

		//echo "<pre>"; print_r($data); echo "</pre>";

		//exit;

		$dggeneratedCount =  count($data);

		$relations = [

		 	'report_on' => date($year."-".$month."-t"),

			'report_year' => $year,

			'report_month' => $month,

			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),

			'nocres' => $data,

			'sitename' => get_sitename($site),

			'tCount' => $technicalServices_Count,		

			'MICount' => $MajorIncidents_Count,

			'EQPCOunt' => $Equipmentmisres_count,			

			'AMCCount' => $amctracker_Count,

			'PPCount' => $PlannedPreventives_Count,

			'PConCount' => $PConsumption_Count,

			'powFailureCount' => $powFailureCount

			];

		$pdf = PDF::loadView('mmrreports.mmrdgpkwh', $relations);

		//if($dggeneratedCount>0) $pdf->save(storage_path('/mmrfiles/dggenerated.pdf'));  

		

		

		/*-----------------------------------------------Metro Water Consumption-----------------------------------------------*/

		

		$resullt = array();

		$matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year, 'type' => 'graphs', 'title' => 'Water Consumtion']; 

		$Metro_Water_Consumption = \App\Mmrmonthlyreport::where($matchfields_hskpact)->count();

		if($Metro_Water_Consumption > 0){

			$technicalServices_Count = $technicalServices_Count+1;

			$resullt = \App\Mmrmonthlyreport::where($matchfields_hskpact)->first();

			$image = $resullt->before_image;

		}

		

		

		$prev_omonths = date('Y-'.$month.'-d.');

		$prev_omonth = date ('m', strtotime ( '-1 month' , strtotime ( $prev_omonths )));

		$prev_oyear = date ('Y', strtotime ( '-1 month' , strtotime ( $prev_omonths )));

		$prev_tmonths = date('Y-'.$month.'-d.');

		$prev_tmonth = date ('m', strtotime ( '-2 month' , strtotime ( $prev_tmonths )));

		$prev_tyear = date ('Y', strtotime ( '-2 month' , strtotime ( $prev_tmonths )));	

		$lreporton1  = date($prev_tyear.'-'.$prev_tmonth.'-1');

		$reporton1 =  date("t-m-Y", strtotime($lreporton1));

		$lreporton2  = date($prev_oyear.'-'.$prev_omonth.'-1');

		$reporton2 =  date("t-m-Y", strtotime($lreporton2));

		$lreporton3  = date("Y".'-'.$month.'-1');

		$reporton3 =  date("t-m-Y", strtotime($lreporton3));

		$occupanymatch_fileds1 = ['reporton' => $reporton1, 'site' => $site]; 

		$wspmetro1 = getmtdfms($reporton1,$site,'wsp_metro');

		$wspmetro2 = getmtdfms($reporton2,$site,'wsp_metro');

		$wspmetro3 = getmtdfms($reporton3,$site,'wsp_metro');

		$wspbores1 = getmtdfms($reporton1,$site,'wsp_bores');



		$wspbores2 = getmtdfms($reporton2,$site,'wsp_bores');

		$wspbores3 = getmtdfms($reporton3,$site,'wsp_bores');

		$wsptankers1 = getmtdfms($reporton1,$site,'wsp_tankers');

		$wsptankers2 = getmtdfms($reporton2,$site,'wsp_tankers');

		$wsptankers3 = getmtdfms($reporton3,$site,'wsp_tankers');

		$treatwater1 = getmtdfms($reporton1,$site,'stp_avg_treat_water');

		$treatwater2 = getmtdfms($reporton2,$site,'stp_avg_treat_water');



		$treatwater3 = getmtdfms($reporton3,$site,'stp_avg_treat_water');

		

		$relations = [

			'year' => $year,

			'month' => $month, 

			'cmonthname' => date("F", mktime(0, 0, 0, $month, 10)),

			'pmonthname' => date("F", mktime(0, 0, 0, $prev_omonth, 10)),

			'bmonthname' => date("F", mktime(0, 0, 0, $prev_tmonth, 10)),

			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),

			'sitename' => get_sitename($site),

			'site' => $site,

			'ebgraph' => $image,

			'wspmetro1' => $wspmetro1,

			'wspmetro2' => $wspmetro2,

			'wspmetro3' => $wspmetro3,

			'wspbores1' => $wspbores1,

			'wspbores2' => $wspbores2,

			'wspbores3' => $wspbores3,

			'wsptankers1' => $wsptankers1,

			'wsptankers2' => $wsptankers2,

			'wsptankers3' => $wsptankers3,

			'treatwater1' => $treatwater1,

			'treatwater2' => $treatwater2,

			'treatwater3' => $treatwater3,

			'tCount' => $technicalServices_Count,		

			'MICount' => $MajorIncidents_Count,

			'EQPCOunt' => $Equipmentmisres_count,			

			'AMCCount' => $amctracker_Count,

			'PPCount' => $PlannedPreventives_Count,

			'PConCount' => $PConsumption_Count,

			'powFailureCount' => $powFailureCount,

			'dggeneratedCount' => $dggeneratedCount,

			

        ];

				

		$pdf = PDF::loadView('mmrreports.mmr_water', $relations);

		if($Metro_Water_Consumption > 0) $pdf->save(storage_path('/mmrfiles/metrowaterconsumtion.pdf')); 

	

	

		/*----------------------------------Water Test Reports (WSP - Inlet) AND (WSP - Outlet)------------------------------------*/	

		$wsp_cres = array();

		$wsp_cres1 = array();

		$wsp_match = ['month' => $month, 'year' => $year, 'site' =>$site]; 

	    $Wspinlet_Count = \App\Wspmtreport::where($wsp_match)->count();

	    if($Wspinlet_Count > 0){

			$wsp_cres = \App\Wspmtreport::where($wsp_match)->first();

	    }

	    $wsp_match1 = ['month' => $month, 'year' => $year, 'site' =>$site]; 

	    $Wspoutlet_Count = \App\Wspmotreport::where($wsp_match1)->count();

	    if($Wspoutlet_Count > 0){

			$wsp_cres1 = \App\Wspmotreport::where($wsp_match1)->first();

	    }

		

		if($Wspinlet_Count >0 || $Wspoutlet_Count > 0) $technicalServices_Count = $technicalServices_Count+1;



		$relations = [		 



		 	'report_on' => date($year."-".$month."-t"),

			'report_year' => $year,

			'report_month' => $month,

			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),

			'pbasys' => $wsp_cres,

			'pbasys1' => $wsp_cres1,

			'sitename' => get_sitename($site),

			'tCount' => $technicalServices_Count,		

			'MICount' => $MajorIncidents_Count,

			'EQPCOunt' => $Equipmentmisres_count,			

			'AMCCount' => $amctracker_Count,

			'PPCount' => $PlannedPreventives_Count,

			'PConCount' => $PConsumption_Count,

			'powFailureCount' => $powFailureCount,

			'dggeneratedCount' => $dggeneratedCount,

			'MWCount' =>$Metro_Water_Consumption

			];



		$pdf = PDF::loadView('mmrreports.mmr_wsp_inlet', $relations);

		

		if($Wspinlet_Count>0) $pdf->save(storage_path('/mmrfiles/wspinlet.pdf')); 		

		

		$pdf = PDF::loadView('mmrreports.mmr_wsp_outlet', $relations);



		if($Wspoutlet_Count>0) $pdf->save(storage_path('/mmrfiles/wspoutlet.pdf'));  

		

		

		

		/*----------------------------------Water Test Reports (STP - Inlet) AND (STP - Outlet)------------------------------------*/	

		$wsp_cres = array();

		$wsp_cres1 = array();

		$wsp_match = ['month' => $month, 'year' => $year, 'site' =>$site]; 

	    $Stpinlet_Count = \App\Stpintreport::where($wsp_match)->count();

	    if($Stpinlet_Count > 0){

			$wsp_cres = \App\Stpintreport::where($wsp_match)->first();

	    }

	    $wsp_match1 = ['month' => $month, 'year' => $year, 'site' =>$site]; 

	    $Stpoutlet_Count = \App\Stpoutreport::where($wsp_match1)->count();

	    if($Stpoutlet_Count > 0){

			$wsp_cres1 = \App\Stpoutreport::where($wsp_match1)->first();

	    }

		

		if($Stpinlet_Count >0 || $Stpoutlet_Count > 0) $technicalServices_Count = $technicalServices_Count+1;



		$relations = [		 



		 	'report_on' => date($year."-".$month."-t"),

			'report_year' => $year,

			'report_month' => $month,

			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),

			'pbasys' => $wsp_cres,

			'pbasys1' => $wsp_cres1,

			'sitename' => get_sitename($site),

			'tCount' => $technicalServices_Count,		

			'MICount' => $MajorIncidents_Count,

			'EQPCOunt' => $Equipmentmisres_count,			

			'AMCCount' => $amctracker_Count,

			'PPCount' => $PlannedPreventives_Count,

			'PConCount' => $PConsumption_Count,

			'powFailureCount' => $powFailureCount,

			'dggeneratedCount' => $dggeneratedCount,

			'MWCount' =>$Metro_Water_Consumption,

			'Wspinlet_Count' => $Wspinlet_Count,

			'Wspoutlet_Count' => $Wspoutlet_Count

			];



		$pdf = PDF::loadView('mmrreports.mmr_stp_inlet', $relations);

		

		if($Stpinlet_Count>0) $pdf->save(storage_path('/mmrfiles/stpinlet.pdf')); 		

		

		$pdf = PDF::loadView('mmrreports.mmr_stp_outlet', $relations);



		if($Stpoutlet_Count>0) $pdf->save(storage_path('/mmrfiles/stpoutlet.pdf'));  

		

		

		/*----------------------------------MMR Initiative taken / Proactive------------------------------------*/			

		

		

		

		$resullt = array();



		$matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year,'type' => 'initiative']; 

		$Initiative_Count = \App\Mmrhousekpact::where($matchfields_hskpact)->count();

		if($Initiative_Count > 0){

			$resullt = \App\Mmrhousekpact::where($matchfields_hskpact)->get();

			$technicalServices_Count = $technicalServices_Count+1;

		}

		 $relations = [

			'year' => $year,

			'month' => $month, 

			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),

			'sitename' => get_sitename($site),

			'site' => $site,

			'resval' => $resullt,

			'tCount' => $technicalServices_Count,		

			'MICount' => $MajorIncidents_Count,

			'EQPCOunt' => $Equipmentmisres_count,			

			'AMCCount' => $amctracker_Count,

			'PPCount' => $PlannedPreventives_Count,

			'PConCount' => $PConsumption_Count,

			'powFailureCount' => $powFailureCount,

			'dggeneratedCount' => $dggeneratedCount,

			'MWCount' =>$Metro_Water_Consumption,

			'Wspinlet_Count' => $Wspinlet_Count,

			'Wspoutlet_Count' => $Wspoutlet_Count,

			'Stpinlet_Count' => $Stpinlet_Count,

			'Stpoutlet_Count' => $Stpoutlet_Count

        ];  

		$pdf = PDF::loadView('mmrreports.mmr_initiative', $relations);

		if($Initiative_Count>0) $pdf->save(storage_path('/mmrfiles/initiative.pdf')); 

		

		

		/*----------------------------------MOCK DRILL------------------------------------*/	

		$formfieldarray = array();

		$matchfields = ['month' => $month, 'year' => $year]; 
		
		$res_count = \App\Firesafetymisreport::where('site', $site)->where($matchfields)->count();
		
		if($res_count > 0)
		
		{		
		
			$formfieldarray = \App\Firesafetymisreport::where('site', $site)->where($matchfields)->get();
		
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
		  $FiresafetymisreportCount = 0;
		  $FiresafenotworkingissueCount = 0;
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
		
			$mismatchfields = ['month' => $month, 'year' => $year, 'site' =>$skey]; 
		
			
		
			$FiresafetymisreportCount = \App\Firesafetymisreport::where($mismatchfields)->count();
		
			
		
			if($FiresafetymisreportCount > 0){
		
				 if($FiresafetymisreportCount >0) $technicalServices_Count = $technicalServices_Count+1;
		
				 $mismatch_ress = \App\Firesafetymisreport::where($mismatchfields)->first();
		
				 $misresult[$skey] = $mismatch_ress;
		
			} 
		
			
		
			
		
				if($month == 1){
		
			  $prev_mon = 12;
		
			  $prev_year = $year - 1;
		
			}
		
			else{
		
			  $prev_mon = $month - 1;;
		
			  $prev_year = $year;
		
			}
		
			
		
			$mismatchprevfields = ['month' => $prev_mon, 'year' => $prev_year, 'site' =>$skey]; 
		
			$misprevmatchcount = \App\Firesafetymisreport::where($mismatchprevfields)->count();
		
			
		
			if($misprevmatchcount > 0){
		
				 $mismatch_prev_ress = \App\Firesafetymisreport::where($mismatchprevfields)->first();
		
				 $misprevresult[$skey] = $mismatch_prev_ress;
		
			} 
		
			
		
			$FiresafenotworkingissueCount = \App\Firesafenotworkingissue::where($matchreffields)->count();
		
			if($FiresafenotworkingissueCount > 0){
		
			   if($FiresafetymisreportCount==0 && $FiresafenotworkingissueCount > 0) $technicalServices_Count = $technicalServices_Count+1;
		
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
		
			if($FiresafenotworkingissueCount > 0){
		
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
		
				  $ref_a_temp['estimation_time'][] = $ref_temp_rec->estimation_time;
		
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
		
			'monthname' => date("F", mktime(0, 0, 0, $month, 10)), 
		
			'report_year' => $year,
		
			'report_month' => $month,
		
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
		
					'monthname' => date("F", mktime(0, 0, 0, $month, 10)), 
		
					'report_on' => $reportdate_val,
		
					'report_year' => $year,
		
					'report_month' => $month,
		
					'issues' => $ref_overall, 
		
					'issuecount' => $issuecount,
		
					'validation' => $ref_total, 
		
					'misres' => $misresult, 
		
					'misprevious' => $misprevresult,
		
					'issuetemp' => $ref_overall_temp,
		
					'tCount' => $technicalServices_Count,		
		
					'MICount' => $MajorIncidents_Count,
		
					'EQPCOunt' => $Equipmentmisres_count,			
		
					'AMCCount' => $amctracker_Count,
		
					'PPCount' => $PlannedPreventives_Count,
		
					'PConCount' => $PConsumption_Count,
		
					'powFailureCount' => $powFailureCount,
		
					'dggeneratedCount' => $dggeneratedCount,
		
					'MWCount' =>$Metro_Water_Consumption,
		
					'Wspinlet_Count' => $Wspinlet_Count,
		
					'Wspoutlet_Count' => $Wspoutlet_Count,
		
					'Stpinlet_Count' => $Stpinlet_Count,
		
					'Stpoutlet_Count' => $Stpoutlet_Count,
		
					'FiresafetymisreportCount' => $FiresafetymisreportCount,
		
					'FiresafenotworkingissueCount' => $FiresafenotworkingissueCount
		
				];  
		
				
		
				if($FiresafetymisreportCount>0)	$pdf = PDF::loadView('mmrreports.firesafeviews.mainfile', $relations);
		
				  // $pdf->setPaper('A4', 'landscape');
		
				if($FiresafetymisreportCount>0)   $pdf->save(storage_path('/mmrfiles/mistrafficprint.pdf'));  
		
			  
		
			  if($issuecn > 5 && $FiresafenotworkingissueCount>0) {
		
			   $fi = $fi + 1;
		
				   $issuet[$ikey] = $ikey;
		
					$relations = [
		
					'ikey' => $ikey,  
		
					'sites' => $siteattrname,
		
					'issuecn' => $issuecn,
		
					'monthname' => date("F", mktime(0, 0, 0, $month, 10)), 
		
					'report_on' => $reportdate_val,
		
					'report_year' => $year,
		
					'report_month' => $month,
		
					'issues' => $ref_overall, 
		
					'issuecount' => $issuecount,
		
					'validation' => $ref_total, 
		
					'misres' => $misresult, 
		
					 'misprevious' => $misprevresult,
		
					'issuetemp' => $ref_overall_temp,
		
					'tCount' => $technicalServices_Count,		
		
					'MICount' => $MajorIncidents_Count,
		
					'EQPCOunt' => $Equipmentmisres_count,			
		
					'AMCCount' => $amctracker_Count,
		
					'PPCount' => $PlannedPreventives_Count,
		
					'PConCount' => $PConsumption_Count,
		
					'powFailureCount' => $powFailureCount,
		
					'dggeneratedCount' => $dggeneratedCount,
		
					'MWCount' =>$Metro_Water_Consumption,
		
					'Wspinlet_Count' => $Wspinlet_Count,
		
					'Wspoutlet_Count' => $Wspoutlet_Count,
		
					'Stpinlet_Count' => $Stpinlet_Count,
		
					'Stpoutlet_Count' => $Stpoutlet_Count,
		
					'FiresafetymisreportCount' => $FiresafetymisreportCount,
		
					'FiresafenotworkingissueCount' => $FiresafenotworkingissueCount
		
				];  
		
				
		
				
		
				  $pdf = PDF::loadView('mmrreports.firesafeviews.landscpaefile', $relations);
		
				  $pdf->setPaper('A4', 'landscape');
		
				   $pdf->save(storage_path('/mmrfiles/mistrafficprintissue.pdf'));  
		
				 
		
			  } else
		
			  {
		
			   if($issuecn > 0 && $FiresafenotworkingissueCount>0){
		
				 $fi = $fi + 1;
		
			 
		
			  $issuet[$ikey] = $ikey;
		
				
		
					$relations = [
		
					'ikey' => $ikey,  
		
					'sites' => $siteattrname,
		
					'issuecn' => $issuecn,
		
					'report_on' => $reportdate_val,
		
					'monthname' => date("F", mktime(0, 0, 0, $month, 10)), 
		
					'report_year' => $year,
		
					'report_month' => $month,
		
					'issues' => $ref_overall, 
		
					'issuecount' => $issuecount,
		
					'validation' => $ref_total, 
		
					'misres' => $misresult, 
		
					 'misprevious' => $misprevresult,
		
					'issuetemp' => $ref_overall_temp,
		
					'tCount' => $technicalServices_Count,		
		
					'MICount' => $MajorIncidents_Count,
		
					'EQPCOunt' => $Equipmentmisres_count,			
		
					'AMCCount' => $amctracker_Count,
		
					'PPCount' => $PlannedPreventives_Count,
		
					'PConCount' => $PConsumption_Count,
		
					'powFailureCount' => $powFailureCount,
		
					'dggeneratedCount' => $dggeneratedCount,
		
					'MWCount' =>$Metro_Water_Consumption,
		
					'Wspinlet_Count' => $Wspinlet_Count,
		
					'Wspoutlet_Count' => $Wspoutlet_Count,
		
					'Stpinlet_Count' => $Stpinlet_Count,
		
					'Stpoutlet_Count' => $Stpoutlet_Count,
		
					'FiresafetymisreportCount' => $FiresafetymisreportCount,
		
					'FiresafenotworkingissueCount' => $FiresafenotworkingissueCount
		
				];  
		
				
		
				
		
				  $pdf = PDF::loadView('mmrreports.firesafeviews.portraitfile', $relations);
		
				  
		
				   $pdf->save(storage_path('/mmrfiles/mistrafficprintissue.pdf'));  
		
				   
		
			   
		
			  }
		
			  }
		
			  
		
			}  
		
			
		
		}
		
		
		
		//echo  $FiresafetymisreportCount."<br/>";
		
		//echo  $FiresafenotworkingissueCount."<br/>";

		

			 
		

		/*----------------------------------Status of Fire NOC Renewals------------------------------------*/

		

		

		$matchfields_fornoc = ['valid_month' => $month, 'valid_year' => $year, 'site' =>$site];		

		$MMRNOC_Count = \App\Blocknocmonthreport::where($matchfields_fornoc)->count();

		$resnoc_cres = array();

		if($MMRNOC_Count>0)

		$resnoc_cres = \App\Blocknocmonthreport::where($matchfields_fornoc)->get();

		else

		$resnoc_cres = \App\Blocknocmonthreport::where('site',$site)->get();

		$fnmatchfields_fornoc = ['month' => $month, 'year' => $year, 'site' =>$site]; 

		$fnresnoc_count = \App\Firesafetymisreport::where($fnmatchfields_fornoc)->count();

		if($fnresnoc_count > 0)

		{

			$fresnoc_cres = \App\Firesafetymisreport::where($fnmatchfields_fornoc)->first();

			$noc_info = $fresnoc_cres->noc_info;

		}

		

		 if($fnresnoc_count>0) $technicalServices_Count = $technicalServices_Count+1;

		

		

		$noc_info = "";  

		$relations = [

		 	'report_on' => date($year."-".$month."-t"),

			'report_year' => $year,

			'report_month' => $month,

			'monthname' => date("F", mktime(0, 0, 0, $month, 10)), 

			'nocres' => $resnoc_cres,

			'noc_info' => $noc_info,

			'sitename' => get_sitename($site),

		    'tCount' => $technicalServices_Count,		

			'MICount' => $MajorIncidents_Count,

			'EQPCOunt' => $Equipmentmisres_count,			

			'AMCCount' => $amctracker_Count,

			'PPCount' => $PlannedPreventives_Count,

			'PConCount' => $PConsumption_Count,

			'powFailureCount' => $powFailureCount,

			'dggeneratedCount' => $dggeneratedCount,

			'MWCount' =>$Metro_Water_Consumption,

			'Wspinlet_Count' => $Wspinlet_Count,

			'Wspoutlet_Count' => $Wspoutlet_Count,

			'Stpinlet_Count' => $Stpinlet_Count,

			'Stpoutlet_Count' => $Stpoutlet_Count,

			'Initiative_Count' => $Initiative_Count,

			'FiresafetymisreportCount' => $FiresafetymisreportCount,

			'FiresafenotworkingissueCount' => $FiresafenotworkingissueCount

			];

		$pdf = PDF::loadView('mmrreports.mmrnoc', $relations);

		if($MMRNOC_Count>0) $pdf->save(storage_path('/mmrfiles/mmrnoc.pdf'));

	

		

		/*----------------------------------MOCK DRILL------------------------------------*/

		

       

		$formfieldarray = array();

		$siteattrname = array();

		$flatres = array();

		$reportdate_val = "";

		$sitearr = array();

		$sitearr[] = $site;

		$dateString = $segment2.'-'.$segment3.'-04';

		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));

		$lastdatearr = explode("-",$lastDateOfMonth);

		$reportdate_val = $lastdatearr[2]."-".$segment3."-".$segment2;

	    if(Auth::user()->id == 1){

	      $sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');

		  $siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');

		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');

		  }else{

		    $role_id = Auth::user()->role_id;

			$emp_id = Auth::user()->emp_id;

			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();

			$siteinfo = $getemp_info->community;

			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');

			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');

			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');

		  }

		  $existing_records = array();

		  $indentrep_Array = array();

		  $lagged_date = array();

		  foreach($siteattrname as $stk => $siten) {

			  $match_in_fields = ['month' => $segment3, 'year' => $segment2, 'site' =>$site]; 

			  $Mockdrillmisreport_Count = \App\Mockdrillmisreport::where($match_in_fields)->count();

		       if($Mockdrillmisreport_Count > 0){			        

		    		if($FiresafetymisreportCount==0 && $FiresafenotworkingissueCount==0 && $fnresnoc_count==0 && $Mockdrillmisreport_Count>0) $technicalServices_Count = $technicalServices_Count+1;

			   	    $match_in_array = \App\Mockdrillmisreport::where($match_in_fields)->get();

					$indentrep_Array[$stk] = $match_in_array;

			   }

			   else{

			       $indentrep_Array[$stk] = array();

			   }

			 }

			$mockdrillcount = count($indentrep_Array);

			$relations = [

			'res' => $formfieldarray, 

			'monthname' => date("F", mktime(0, 0, 0, $segment3, 10)), 

			'sites' => $sitenames,

			'report_on' => $reportdate_val,

			'report_year' => $segment2,

			'report_month' => $segment3,

			'existing' => $existing_records,

			'drill' => $indentrep_Array,			

		    'tCount' => $technicalServices_Count,		

			'MICount' => $MajorIncidents_Count,

			'EQPCOunt' => $Equipmentmisres_count,			

			'AMCCount' => $amctracker_Count,

			'PPCount' => $PlannedPreventives_Count,

			'PConCount' => $PConsumption_Count,

			'powFailureCount' => $powFailureCount,

			'dggeneratedCount' => $dggeneratedCount,

			'MWCount' =>$Metro_Water_Consumption,

			'Wspinlet_Count' => $Wspinlet_Count,

			'Wspoutlet_Count' => $Wspoutlet_Count,

			'Stpinlet_Count' => $Stpinlet_Count,

			'Stpoutlet_Count' => $Stpoutlet_Count,

			'Initiative_Count' => $Initiative_Count,

			'FiresafetymisreportCount' => $FiresafetymisreportCount,

			'FiresafenotworkingissueCount' => $FiresafenotworkingissueCount,

			'MMRNOC_Count' => $MMRNOC_Count

			];   

			

			$pdf = PDF::loadView('mmrreports.mismockdrillprint', $relations);

     	 	if($Mockdrillmisreport_Count>0) $pdf->save(storage_path('/mmrfiles/mockdrillprint.pdf'));

		

		

		/*----------------------------------Fire Safety Preparedness & Fire Alarm Operation Training------------------------------------*/

		

		$formfieldarray = array();

		$siteattrname = array();

		$flatres = array();

		$sitearr = array();

		$sitearr[] = $site;

		$reportdate_val = "";

		$dateString = $segment3.'-'.$segment2.'-04';

		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));

		$lastdatearr = explode("-",$lastDateOfMonth);

		$reportdate_val = $lastdatearr[2]."-".$segment3."-".$segment2;

		  if(Auth::user()->id == 1){

		  $sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');

		  $siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');

		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');

		  }else{

			$role_id = Auth::user()->role_id;

			$emp_id = Auth::user()->emp_id;

			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();

			$siteinfo = $getemp_info->community;

			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');

			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');

			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');

		  }

		  $existing_records = array();

		  $indentrep_Array = array();

		  $lagged_date = array();

			 foreach($siteattrname as $stk => $siten) {

			  $match_in_fields = ['month' => $segment3, 'year' => $segment2, 'site' =>$site]; 

			  $Fireprepareprint_Count = \App\Firepreparemisreport::where($match_in_fields)->count();

			   if($Fireprepareprint_Count > 0){

					$match_in_array = \App\Firepreparemisreport::where($match_in_fields)->get();

					$indentrep_Array[$stk] = $match_in_array;

			   }

			   else{

				   $indentrep_Array[$stk] = array();

			   }

			 }

			 

			 

			if($FiresafetymisreportCount==0 && $FiresafenotworkingissueCount==0 && $fnresnoc_count==0 && $Mockdrillmisreport_Count==0 && $Fireprepareprint_Count > 0) $technicalServices_Count = $technicalServices_Count+1;

			 

			$relations = [

		

			'res' => $formfieldarray, 

			'sites' => $sitenames,

			'report_on' => $reportdate_val,

			'report_year' => $segment2,

			'report_month' => $segment3,

			'monthname' => date("F", mktime(0, 0, 0, $segment3, 10)), 

			'existing' => $existing_records,

			'drill' => $indentrep_Array,

			'mdcount' => $Mockdrillmisreport_Count,

		    'tCount' => $technicalServices_Count,		

			'MICount' => $MajorIncidents_Count,

			'EQPCOunt' => $Equipmentmisres_count,			

			'AMCCount' => $amctracker_Count,

			'PPCount' => $PlannedPreventives_Count,

			'PConCount' => $PConsumption_Count,

			'powFailureCount' => $powFailureCount,

			'dggeneratedCount' => $dggeneratedCount,

			'MWCount' =>$Metro_Water_Consumption,

			'Wspinlet_Count' => $Wspinlet_Count,

			'Wspoutlet_Count' => $Wspoutlet_Count,

			'Stpinlet_Count' => $Stpinlet_Count,

			'Stpoutlet_Count' => $Stpoutlet_Count,

			'Initiative_Count' => $Initiative_Count,

			'FiresafetymisreportCount' => $FiresafetymisreportCount,

			'FiresafenotworkingissueCount' => $FiresafenotworkingissueCount,

			'MMRNOC_Count' => $MMRNOC_Count,

			'Mockdrillmisreport_Count' => $Mockdrillmisreport_Count

			]; 

		

			$pdf = PDF::loadView('mmrreports.misfireprepareprint', $relations);

			if($Fireprepareprint_Count>0) $pdf->save(storage_path('/mmrfiles/fireprepareprint.pdf')); 

		

		

		/*----------------------------------Apna Complex Complaint Report--------------------------------------*/

		

		$matchfields = ['month' => $month, 'year' => $year];

		$formfieldarray = array();

		$siteattrname = array();

		$flatres = array();

		$reportdate_val = "";

		$dateString = $year.'-'.$month.'-04';

		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));

		$lastdatearr = explode("-",$lastDateOfMonth);

		$reportdate_val = $lastdatearr[2]."-".$month."-".$year;

        $sitearr = array();

		$sitearr[] = $site;

		if(Auth::user()->id == 1)

		{

	    	$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');

			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');

			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');

		}

		else

		{

		    $role_id = Auth::user()->role_id;

			$emp_id = Auth::user()->emp_id;

			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();

			$siteinfo = $getemp_info->community;

			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');

			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');

			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');

		}

		$existing_records = array();

		$existing_Rates = array();

		$getratescn =  \App\Pmsdailyreportvalidation::count();

		if($getratescn > 0)

		{

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





			'report_year' => $year,

			'report_month' => $month,

			'existing' => $existing_records,

			'cost' => $existing_Rates,

		];  

		$matchfields = ['month' => $month, 'year' => $year]; 

		$res_count = \App\Occupancymisreport::where($matchfields)->count();

		$apnarecord = array();

		$indentrep_Array = array();

		$lagged_date = array();

		foreach($siteattrname as $stk => $siten) 

		{

		  $match_in_fields = ['month' => $month, 'year' => $year, 'site' =>$site]; 

		  $Apnacomplaintmisreport_Count = \App\Apnacomplaintmisreport::where($match_in_fields)->count();

		  if($Apnacomplaintmisreport_Count > 0)

		  {

		    $technicalServices_Count = $technicalServices_Count+1;

		  	$match_in_array = \App\Apnacomplaintmisreport::where($match_in_fields)->get();

			$indentrep_Array[$stk] = $match_in_array;

			$apnarecord[$stk] = $Apnacomplaintmisreport_Count;

		  }

		  else

		  {

		  	    $technicalServices_Count = $technicalServices_Count+1;

		  		$indentrep_Array[$stk] = array();

				$apnarecord[$stk] = 0;

		   }

		 }

		 $fireprepare_cn = count($indentrep_Array);

		 asort($apnarecord);

		 $relations = [

		 'res' => $formfieldarray,  

		 'sites' => $sitenames,

		 'flats' => $flatres,

		 'report_on' => $reportdate_val,

		 'report_year' => $year,

		 'report_month' => $month,

		 'monthname' => date("F", mktime(0, 0, 0, $month, 10)), 

		 'existing' => $existing_records,

		 'cost' => $existing_Rates,

		 'apnarep' => $indentrep_Array,

		 'recordcount' => $apnarecord,

		 'tCount' => $technicalServices_Count,		

		 'MICount' => $MajorIncidents_Count,

		 'EQPCOunt' => $Equipmentmisres_count,			

		 'AMCCount' => $amctracker_Count,

		 'PPCount' => $PlannedPreventives_Count,

		 'PConCount' => $PConsumption_Count,

		 'powFailureCount' => $powFailureCount,

		 'dggeneratedCount' => $dggeneratedCount,

		 'MWCount' =>$Metro_Water_Consumption,

		 'Wspinlet_Count' => $Wspinlet_Count,

		 'Wspoutlet_Count' => $Wspoutlet_Count,

		 'Stpinlet_Count' => $Stpinlet_Count,

		 'Stpoutlet_Count' => $Stpoutlet_Count,

		 'Initiative_Count' => $Initiative_Count,

		 'Mockdrillmisreport_Count' => $Mockdrillmisreport_Count,

		 'Fireprepareprint_Count' => $Fireprepareprint_Count,

		 'MMRNOC_Count' => $MMRNOC_Count

		];   

		$pdf = PDF::loadView('mmrreports.apnacomplex', $relations);

		if($Apnacomplaintmisreport_Count>0)$pdf->save(storage_path('/mmrfiles/apnacomplex.pdf')); 

		

		/*---------------------------------HK Critical Machinery------------------------------------*/	

		

		$resullt = array();

		$matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year, 'type'=>'hkcm']; 

		$HkCriticalMachinery_Count = \App\Mmrhkcmmonthlyreport::where($matchfields_hskpact)->count();

		if($HkCriticalMachinery_Count > 0){

			$softServices_Count = $softServices_Count+1;

			$resullt = \App\Mmrhkcmmonthlyreport::where($matchfields_hskpact)->get();

		}

		 $relations = [

			'year' => $year,

			'month' => $month, 

			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),

			'sitename' => get_sitename($site),

			'site' => $site,

			'resval' => $resullt,

		 	'sCount' => $softServices_Count,

			'HKMCount' => $HkCriticalMachinery_Count

        ];  

		$pdf = PDF::loadView('mmrreports.mmr_mmrhkcriticalmachinery', $relations);

		if($HkCriticalMachinery_Count>0) $pdf->save(storage_path('/mmrfiles/hkcriticalmachinery.pdf'));

		

		/*----------------------------------House Keeping------------------------------------*/

		

		$resullt = array();

		$matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year, 'type'=>'housekeeping']; 

		$Housekeeping_Count = \App\Mmrhousekpact::where($matchfields_hskpact)->count();

		if($Housekeeping_Count > 0){

			$softServices_Count = $softServices_Count+1;

			$resullt = \App\Mmrhousekpact::where($matchfields_hskpact)->get();

		}

		 $relations = [

			'year' => $year,

			'month' => $month, 

			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),

			'sitename' => get_sitename($site),

			'site' => $site,

			'resval' => $resullt,

		 	'sCount' => $softServices_Count,

			'HKMCount' => $HkCriticalMachinery_Count,

			'HKCount' => $Housekeeping_Count

        ];

		$pdf = PDF::loadView('mmrreports.mmr_mmrsofthousekeeping', $relations);

		//$pdf->setPaper('A4', 'landscape');

		if($Housekeeping_Count>0) $pdf->save(storage_path('/mmrfiles/housekeeping.pdf')); 

		

		

		/*----------------------------------House Keeping Consumable------------------------------------*/

		

		$resulltconsume = array();

		$matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year, 'type'=>'housekeeping']; 

		$Housekeeping_Consume_Count = \App\Mmrhousekconsume::where($matchfields_hskpact)->count();

		if($Housekeeping_Consume_Count > 0){			

			$softServices_Count = $softServices_Count+1;

			$resulltconsume = \App\Mmrhousekconsume::where($matchfields_hskpact)->get();

		}

		 $relations = [

			'year' => $year,

			'month' => $month, 

			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),

			'sitename' => get_sitename($site),

			'site' => $site,

			'resvalconsume' => $resulltconsume,

		 	'sCount' => $softServices_Count,

			'HKMCount' => $HkCriticalMachinery_Count,


			'HKCount' => $Housekeeping_Count,

			'HKCoCount' => $Housekeeping_Consume_Count

        ];

		$pdf = PDF::loadView('mmrreports.mmr_mmrsofthousekeepingconsumable', $relations);

		if($Housekeeping_Consume_Count>0) $pdf->save(storage_path('/mmrfiles/housekeepingconsumable.pdf')); 

		

		/*-----------------------------------------------Pets Control-----------------------------------------------*/

		

		

		$resullt = array();

		$matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year]; 

		$Pets_Count = \App\Mmrpetreport::where($matchfields_hskpact)->count();

		if($Pets_Count > 0){

			$softServices_Count = $softServices_Count+1;

			$resullt = \App\Mmrpetreport::where($matchfields_hskpact)->get();

		}

		 $relations = [

			'year' => $year,

			'month' => $month, 

			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),

			'sitename' => get_sitename($site),

			'site' => $site,

			'resval' => $resullt,

		 	'sCount' => $softServices_Count,

			'HKMCount' => $HkCriticalMachinery_Count,

			'HKCount' => $Housekeeping_Count,

			'HKCoCount' => $Housekeeping_Consume_Count,

			'PetsCount' => $Pets_Count

        ];  

	    $pdf = PDF::loadView('mmrreports.mmr_mmrpets', $relations);

		if($Pets_Count>0) $pdf->save(storage_path('/mmrfiles/pets.pdf'));

		

		

		/*---------------------------------HO Critical Machinery------------------------------------*/	

		

		$resullt = array();

		$matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year, 'type'=>'hocm']; 

		$HoCriticalMachinery_Count = \App\Mmrhkcmmonthlyreport::where($matchfields_hskpact)->count();

		if($HoCriticalMachinery_Count > 0){

			$softServices_Count = $softServices_Count+1;

			$resullt = \App\Mmrhkcmmonthlyreport::where($matchfields_hskpact)->get();

		}

		 $relations = [

			'year' => $year,

			'month' => $month, 

			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),

			'sitename' => get_sitename($site),

			'site' => $site,

			'resval' => $resullt,

		 	'sCount' => $softServices_Count,

			'HKMCount' => $HkCriticalMachinery_Count,

			'HKCount' => $Housekeeping_Count,

			'HKCoCount' => $Housekeeping_Consume_Count,

			'PetsCount' => $Pets_Count,

			'HOMCount' => $HoCriticalMachinery_Count

        ];  

		$pdf = PDF::loadView('mmrreports.mmr_mmrhocriticalmachinery', $relations);

		if($HoCriticalMachinery_Count>0) $pdf->save(storage_path('/mmrfiles/hocriticalmachinery.pdf'));

		

		

		/*---------------------------------Horticulture Activities------------------------------------*/	

		

		$resullt = array();

		$matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year, 'type'=>'horticulture']; 

		$Horticulture_Count = \App\Mmrhousekpact::where($matchfields_hskpact)->count();

		if($Horticulture_Count > 0){

			$softServices_Count = $softServices_Count+1;

			$resullt = \App\Mmrhousekpact::where($matchfields_hskpact)->get();

		}

		 $relations = [

			'year' => $year,

			'month' => $month, 

			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),

			'sitename' => get_sitename($site),

			'site' => $site,

			'resval' => $resullt,

			'resvalconsume' => $resulltconsume,

		 	'sCount' => $softServices_Count,

			'HKMCount' => $HkCriticalMachinery_Count,

			'HKCount' => $Housekeeping_Count,

			'HKCoCount' => $Housekeeping_Consume_Count,

			'PetsCount' => $Pets_Count,

			'HOMCount' => $HoCriticalMachinery_Count,

			'HCCount' => $Horticulture_Count

        ];  

	    $pdf = PDF::loadView('mmrreports.mmr_mmrsofthorticulture', $relations);

		//$pdf->setPaper('A4', 'landscape');

		if($Horticulture_Count>0) $pdf->save(storage_path('/mmrfiles/horticulture.pdf')); 

		

		

		

		/*---------------------------------Horticulture Consumables.------------------------------------*/	

		

		$resulltconsume = array();

		$matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year]; 


		$Horticulture_Consume_Count = \App\Horticulturemisreport::where($matchfields_hskpact)->count();

		if($Horticulture_Consume_Count > 0){

			$softServices_Count = $softServices_Count+1;

			$resulltconsume = \App\Horticulturemisreport::where($matchfields_hskpact)->get();

		}

		 $relations = [

			'year' => $year,

			'month' => $month, 

			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),

			'sitename' => get_sitename($site),

			'site' => $site,

			'resval' => $resullt,

			'resvalconsume' => $resulltconsume,

		 	'sCount' => $softServices_Count,

			'HKMCount' => $HkCriticalMachinery_Count,

			'HKCount' => $Housekeeping_Count,

			'HKCoCount' => $Housekeeping_Consume_Count,

			'PetsCount' => $Pets_Count,

			'HOMCount' => $HoCriticalMachinery_Count,

			'HCCount' => $Horticulture_Count,

			'HCCocount' => $Horticulture_Consume_Count

        ];  

	    $pdf = PDF::loadView('mmrreports.mmr_mmrsofthorticultureconsumable', $relations);

		if($Horticulture_Consume_Count>0) $pdf->save(storage_path('/mmrfiles/horticultureconsumable.pdf')); 

		
		
		/*----------------------------------REPORT Twelve Start (Traffic movement Data)-----------------------------------------*/
			
			$formfieldarray = array();
			$siteattrname = array();
			$flatres = array();
			$reportdate_val = "";
			$dateString = $segment2.'-'.$segment3.'-04';
			//Last date of current month.
			$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
			$lastdatearr = explode("-",$lastDateOfMonth);
			$numdays = $lastdatearr[2];
			$reportdate_val = $lastdatearr[2]."-".$segment3."-".$segment2;
	
			  if(Auth::user()->id == 1){
			  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('name', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
			  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('name', 'ASC')->get()->pluck('name', 'id');
			  
			  $sites_count = \App\Sites::where('status', '=', '1')->orderBy('name', 'ASC')->count();
			  $sites_res_arr =\App\Sites::where('status', '=', '1')->orderBy('name', 'ASC')->get()->pluck('name', 'id');
			  
			  
			  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
			  
			  
			  }else{       
	
				$role_id = Auth::user()->role_id;
				$emp_id = Auth::user()->emp_id;
				$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
				$siteinfo = $getemp_info->community;
				$sitearr = explode(",",$siteinfo);
				$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
				$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
				
				$sites_count = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->count();
				$sites_res_arr =\App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->get()->pluck('name', 'id');
				
				
				$borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
				
			  }
			  $existing_records = array();
			  $existing_Rates = array();
			$exist_Sec = array();
			  
			$dateString = $segment2.'-'.$segment3.'-04';
			$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
			$lastdatearr = explode("-",$lastDateOfMonth);
			  $i=0;
			  foreach($sites_res_arr as $keys => $site){
				if ($keys==$uriSegments[4]) 
				{
					$skarra[$i] = $keys;
					$i = $i+1;
				}
			  }	
			  
			 // echo "<pre>"; print_r($skarra); echo "</pre>";
			  
			  $sites_res_arr_res = array();
			  foreach($skarra as $kv){
			   if(isset($sites_res_arr[$kv])) {
				$sites_res_arr_res[$kv] = $siteattrname[$kv];
				}
			  }
			   $siteattrname = $sites_res_arr_res;  
			   
			  // echo "<pre>"; print_r($siteattrname); echo "</pre>";
			   //exit;
		//	 }    
			
			  /* $sitearrnew = array();
			  foreach( $siteattrname as $kkk => $site){
				 $sitearrnew[]=$kkk;
			  }*/
			  
			  
			  foreach($siteattrname as $ke =>$site_res_row)
			  {
					//echo $site_res_row;
					$avgres = "";
					$resident_vehicle = "";
					$temp_vendors = "";
					$courier_delivery = "";
					$visitors = "";
					$construc_team = "";
					$interworks_inflats = "";
					$interior_works_per_day = "";
					for($i=1;$i<=$lastdatearr[2];$i++)
					{
						$ondate = $segment2."-".$segment3."-".$i;
						$resultcn = Securitydailyreport::
						where('reporton', '=', $ondate)
						->where('site', '=', $ke)
						->count();
						if($resultcn > 0)
						{
							 $getsiteMetro =  Securitydailyreport::
							  where('reporton', '=', $ondate)
							->where('site', '=', $ke)->orderBy('created_at', 'DESC')
							->first();
							
							
							
							
							$resident_vehicle = (float)$resident_vehicle + (float)$getsiteMetro->tr_resident_vehicle;
							// if( (float)$numdays != 0) $vehicle = (float)((float)$resident_vehicle/(float)$numdays);
							
							$temp_vendors = (float)$temp_vendors + (float)$getsiteMetro->tr_temp_vendors;  
							$courier_delivery = (float)$courier_delivery + (float)$getsiteMetro->tr_courier_delivery;  
							$visitors = (float)$visitors + (float)$getsiteMetro->tr_visitors;  
							$construc_team = (float)$construc_team + (float)$getsiteMetro->tr_construction;  
							$interworks_inflats = (float)$interworks_inflats + (float)$getsiteMetro->tr_inter_works;  
							$interior_works_per_day = (float)$interior_works_per_day + (float)$getsiteMetro->tr_interior_works_perday; 	
							
							//echo $resident_vehicle."<br/>";
						}   
					}
					//echo "----------------------------------------"."<br/>"
					$rvehicle[$ke] = $resident_vehicle;
					$vendors[$ke] = $temp_vendors;
					$cdelivery[$ke] = $courier_delivery;
					$cvisitors[$ke] = $visitors;
					$cteam[$ke] = $construc_team;
					$inflats[$ke] = $interworks_inflats;
					$interior_works[$ke] = $interior_works_per_day;
				}
			
			/*if($sites_count > 0){
				$sitear = array();
				
					echo '<pre>'; print_r($sites_res_arr); echo '</pre>';	
					
					
			 }*/
			
			
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
				'report_year' => $segment2,
				'report_month' => $segment3,
				'existing' => $existing_records,
				'existsec' => $exist_Sec,
				'numdays' => $numdays,
				'resident_vehicle' => $rvehicle,
				'temp_vendors' => $vendors,
				'courier_delivery' => $cdelivery,			
				'visitors' => $cvisitors,			
				'construc_team' => $cteam,			
				'interworks_inflats' => $inflats,			
				'interior_works_per_day' => $interior_works
				];     
			 
				//  return view('misprints.mistrafficprint', $relations);
				  
				$trafficpcn = 1;
				$pdf = PDF::loadView('misprints.mistrafficprint', $relations);
				$pdf->setPaper('A4', 'landscape');
				$pdf->save(storage_path('/mmrfiles/ommrtrafficmovement.pdf')); 
			
			
			/*----------------------------------REPORT Twelve End (Traffic movement Data)-----------------------------------------*/

		

		/*---------------------------------Violations------------------------------------*/	

		

		

		$resullt = array();

		$matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year, 'type'=>'violation']; 

		$Violation_Count = \App\Mmrmonthlyreport::where($matchfields_hskpact)->count();



		if($Violation_Count > 0){

			$others_Count = $others_Count+1;

			$resullt = \App\Mmrmonthlyreport::where($matchfields_hskpact)->get();

		}

		 $relations = [

			'year' => $year,

			'month' => $month, 

			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),

			'sitename' => get_sitename($site),

			'site' => $site,

			'oCount' => $others_Count,

			'resval' => $resullt

        ];  

	    $pdf = PDF::loadView('mmrreports.mmr_violation', $relations);

		if($Violation_Count>0) $pdf->save(storage_path('/mmrfiles/violation.pdf')); 

		

		

		/*---------------------------------Value Adds------------------------------------*/	

		

		

		$resullt = array();

		$matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year, 'type'=>'valueadd']; 

		$ValueAdds_Count = \App\Mmrmonthlyreport::where($matchfields_hskpact)->count();

		if($ValueAdds_Count > 0){

			$others_Count = $others_Count+1;

			$resullt = \App\Mmrmonthlyreport::where($matchfields_hskpact)->get();

		}

		 $relations = [

			'year' => $year,

			'month' => $month, 

			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),

			'sitename' => get_sitename($site),

			'site' => $site,

			'oCount' => $others_Count,

			'VICount' => $Violation_Count,

			'resval' => $resullt

        ];  

	    $pdf = PDF::loadView('mmrreports.mmr_valueadd', $relations);

		if($ValueAdds_Count>0) $pdf->save(storage_path('/mmrfiles/valueadd.pdf'));

		



		/*---------------------------------Suggestions------------------------------------*/

		

		

		$resullt = array();

		$matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year, 'type'=>'suggestion']; 

		$Suggestions_Count = \App\Mmrmonthlyreport::where($matchfields_hskpact)->count();

		if($Suggestions_Count > 0){

			$others_Count = $others_Count+1;

			$others_Count1 = $others_Count;

			$resullt = \App\Mmrmonthlyreport::where($matchfields_hskpact)->get();

		}

		

		 $relations = [

			'year' => $year,

			'month' => $month, 

			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),

			'sitename' => get_sitename($site),

			'site' => $site,

			'oCount' => $others_Count1,

			'oCount1' => $others_Count2,

			'VICount' => $Violation_Count,

			'VACount' => $ValueAdds_Count,

			'resval' => $resullt

		

        ];  

	    $pdf = PDF::loadView('mmrreports.mmr_suggestion', $relations);
		if($Suggestions_Count>0) $pdf->save(storage_path('/mmrfiles/suggestion.pdf'));

		

		

		/*---------------------------------Requisition------------------------------------*/

		

		

		

		$resulltrequistion = array();

		$matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year, 'type'=>'indentreq']; 

		$Requisition_Count = \App\Mmrmonthlyreport::where($matchfields_hskpact)->count();

		if($Requisition_Count > 0){

			$others_Count = $others_Count+1;			

			$others_Count2 = $others_Count;

			$resulltrequistion = \App\Mmrmonthlyreport::where($matchfields_hskpact)->get();

		}

		 $relations = [

			'year' => $year,

			'month' => $month, 

			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),

			'sitename' => get_sitename($site),

			'site' => $site,

			'oCount' => $others_Count1,

			'oCount1' => $others_Count2,

			'VICount' => $Violation_Count,

			'VACount' => $ValueAdds_Count,

			'SCount' => $Suggestions_Count,

			'resulltrequistion' => $resulltrequistion

        ];  

	    $pdf = PDF::loadView('mmrreports.mmr_requisitionn', $relations);

		if($Requisition_Count>0) $pdf->save(storage_path('/mmrfiles/requisitionn.pdf'));

		
		
		/*-----------------------------------------------Events Control-----------------------------------------------*/

		

		

		$resullt = array();

		$matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year]; 

		$Events_Count = \App\Mmreventreport::where($matchfields_hskpact)->count();

		if($Events_Count > 0){

			$resullt = \App\Mmreventreport::where($matchfields_hskpact)->get();

		}

		 $relations = [

			'year' => $year,

			'month' => $month, 

			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),

			'sitename' => get_sitename($site),

			'site' => $site,

			'resval' => $resullt,

			'EventsCount' => $Events_Count

        ];  

	    $pdf = PDF::loadView('mmrreports.mmr_mmrevents', $relations);

		if($Events_Count>0) $pdf->save(storage_path('/mmrfiles/events.pdf'));

		

		/*---------------------------------MMR ALL PAGES LIST-------------------------------*/

		

		if($powerCount1==0 && $powerCount2==0 && $powerCount3==0) $PowerConsum_Count = 0;

		else  $PowerConsum_Count = 1;

		

		if($powerfailureCount1==0 && $powerfailureCount2==0 && $powerfailureCount3==0) $PowerfailureCount = 0;

		else  $PowerfailureCount = 1;

		

		if($Wspinlet_Count==0 && $Wspoutlet_Count==0 && $Stpinlet_Count==0  && $Stpoutlet_Count==0) $WtrCount = 0;

		else  $WtrCount = 1;

		

		if($Mockdrillmisreport_Count==0 && $Fireprepareprint_Count==0 && $MMRNOC_Count==0) $FSCount = 0;

		else  $FSCount = 1;

		

		if($Suggestions_Count==0) $Suggestions_Count = 0;

		else $Suggestions_Count = 1;
		
		
		if($Requisition_Count==0) $Requisition_Count = 0;

		else $Requisition_Count = 1;
		
		if($Events_Count==0) $Events_Count = 0;

		else $Events_Count = 1;		

		$relations = [

		'report_month' => $mn,

		'report_year' => $segment2,

		'Manpower_Count' =>0,

		'SLAAdherenceCount' => 0,

		'MajorIncidents_Count' => $MajorIncidents_Count,

		'Equipmentmisres_Count' => $Equipmentmisres_count,

		'Amctracker_Count' => $amctracker_Count,

		'PlannedPreventives_Count' => $PlannedPreventives_Count,

		'PlannedPreventives_NCount' => $PlannedPreventives_NCount,

		'PowerConsum_Count' => $PowerConsum_Count,

		'PowerfailureCount' => $PowerfailureCount,

		'dggeneratedCount' => $dggeneratedCount,

		'Metro_Water_Consumption' => $Metro_Water_Consumption,

		'WtrCount' => $WtrCount,

		'Initiative_Count' => $Initiative_Count,

		'FSCount' => $FSCount,

		'Apnacomplaintmisreport_Count' => $Apnacomplaintmisreport_Count,

		'HkCriticalMachinery_Count' => $HkCriticalMachinery_Count,

		'Housekeeping_Count' => $Housekeeping_Count,

		'Housekeeping_Consume_Count' => $Housekeeping_Consume_Count,

		'Pets_Count' => $Pets_Count,

		'Horticulture_Count' => $Horticulture_Count,

		'Horticulture_Consume_Count' => $Horticulture_Consume_Count,

		'Violation_Count' => $Violation_Count,

		'ValueAdds_Count' => $ValueAdds_Count,
		
		'Suggestions_Count' => $Suggestions_Count,

		'Requisition_Count' => $Requisition_Count,
		
		'Events_Count' => $Events_Count

		]; 

		

		$pdf = PDF::loadView('mmrreports.mmr_mmrmonthreports', $relations);

		$pdf->save(storage_path('/mmrfiles/mmrnotes.pdf'));



		

		/*----------------------------------MMR THANK YOU------------------------------------*/	

		$relations = [

		'report_month' => $mn,

		'report_year' => $segment2,

		'sitename' => get_sitename($site),

		]; 

		$pdf = PDF::loadView('mmrreports.mmr_mmrthankyou', $relations);

		$pdf->save(storage_path('/mmrfiles/thankyou.pdf'));   

		

		$pdf = new \PDFMerger();  

		

		/*------------------------------------ALL MMR PDFS-----------------------------------*/

		

		$pdfFile0Path = storage_path() . '/mmrfiles/welcome.pdf';

		$pdfFile1Path = storage_path() . '/mmrfiles/mmrnotes.pdf';

		$pdfFile2Path = storage_path() . '/mmrfiles/mmrtechservices.pdf';

		/*if($Manpower_Count>0 || $SLAAdherenceCount>0) $pdfFile3Path = storage_path() . '/mmrfiles/mmrmanpower.pdf';*/

		if($MajorIncidents_Count>0) $pdfFile4Path = storage_path() . '/mmrfiles/mmrtechnicalservices.pdf';

		if($Equipmentmisres_count>0) $pdfFile5Path = storage_path() . '/mmrfiles/mmrequipmentstatus.pdf';

		$pdfFile5aPath = storage_path() . '/mmrfiles/mmrequipmentcprintissue.pdf';
		
		if($Stpmisres_count>0)$pdfFile5a1Path = storage_path() . '/mmrfiles/mmrstpstatus.pdf';
		
		if($stpn_count>0)$pdfFile5a2Path = storage_path() . '/mmrfiles/mmrstpcprintissue.pdf';
		
		if($Wspmisres_count>0)$pdfFile5a3Path = storage_path() . '/mmrfiles/mmrwspstatus.pdf';

		if($wspn_count>0)$pdfFile5a4Path = storage_path() . '/mmrfiles/mmrwspcprintissue.pdf';

		if($amctracker_Count>0) $pdfFile6Path = storage_path() . '/mmrfiles/amctracker.pdf';
		
		if($SecuritymisreportCount>0) $pdfFile6aPath = storage_path() . '/mmrfiles/omisdailysecuritydata.pdf'; 
		
		$pdfFile6aaPath = storage_path() . '/mmrfiles/ommrtrafficmovement.pdf';

		if($PlannedPreventives_Count>0) $pdfFile7Path = storage_path() . '/mmrfiles/plannedperventives.pdf';

		if($PlannedPreventives_InCount>0) $pdfFile7aPath = storage_path() . '/mmrfiles/inhouseplannedperventives.pdf';

		if($powerCount1>0 || $powerCount2>0 || $powerCount3>0) $pdfFile8Path = storage_path() . '/mmrfiles/ebpower.pdf';

		if($powerfailureCount1>0 || $powerfailureCount2>0 || $powerfailureCount3>0) $pdfFile9Path = storage_path() . '/mmrfiles/pfanalysis.pdf';

		//if($dggeneratedCount>0) $pdfFile10Path = storage_path() . '/mmrfiles/dggenerated.pdf';		

		if($Metro_Water_Consumption>0) $pdfFile11Path = storage_path() . '/mmrfiles/metrowaterconsumtion.pdf';

		if($Wspinlet_Count>0) $pdfFile13Path = storage_path() . '/mmrfiles/wspinlet.pdf';

		if($Wspoutlet_Count>0)$pdfFile14Path = storage_path() . '/mmrfiles/wspoutlet.pdf';

		if($Stpinlet_Count>0) $pdfFile15Path = storage_path() . '/mmrfiles/stpinlet.pdf';

		if($Stpoutlet_Count>0) $pdfFile16Path = storage_path() . '/mmrfiles/stpoutlet.pdf';

		if($Initiative_Count>0) $pdfFile17Path = storage_path() . '/mmrfiles/initiative.pdf';

		if($FiresafetymisreportCount>0) $pdfFile18aPath = storage_path() . '/mmrfiles/mistrafficprint.pdf';

		if($FiresafenotworkingissueCount>0)  $pdfFile18bPath = storage_path() . '/mmrfiles/mistrafficprintissue.pdf';

		if($MMRNOC_Count>0)$pdfFile18cPath = storage_path() . '/mmrfiles/mmrnoc.pdf';

		if($Mockdrillmisreport_Count>0)$pdfFile18dPath = storage_path() . '/mmrfiles/mockdrillprint.pdf';

		if($Fireprepareprint_Count>0)$pdfFile18ePath = storage_path() . '/mmrfiles/fireprepareprint.pdf';

		if($Apnacomplaintmisreport_Count>0)$pdfFile21Path = storage_path() . '/mmrfiles/apnacomplex.pdf'; 

		if($HkCriticalMachinery_Count>0) $pdfFile22Path = storage_path() . '/mmrfiles/hkcriticalmachinery.pdf';

		if($Housekeeping_Count>0) $pdfFile23Path = storage_path() . '/mmrfiles/housekeeping.pdf';

		if($Housekeeping_Consume_Count>0) $pdfFile24Path = storage_path() . '/mmrfiles/housekeepingconsumable.pdf';

		if($Pets_Count>0) $pdfFile25Path = storage_path() . '/mmrfiles/pets.pdf';

		if($HoCriticalMachinery_Count>0) $pdfFile26Path = storage_path() . '/mmrfiles/hocriticalmachinery.pdf';

		if($Horticulture_Count>0) $pdfFile27Path = storage_path() . '/mmrfiles/horticulture.pdf';

		if($Horticulture_Consume_Count>0) $pdfFile28Path = storage_path() . '/mmrfiles/horticultureconsumable.pdf';

		if($Violation_Count>0) $pdfFile29Path = storage_path() . '/mmrfiles/violation.pdf';

		if($ValueAdds_Count>0) $pdfFile30Path = storage_path() . '/mmrfiles/valueadd.pdf';

		if($Suggestions_Count>0) $pdfFile31Path = storage_path() . '/mmrfiles/suggestion.pdf';

		if($Requisition_Count>0) $pdfFile32Path = storage_path() . '/mmrfiles/requisitionn.pdf';
		
		if($Events_Count>0) $pdfFile33Path = storage_path() . '/mmrfiles/events.pdf';

		$pdfFile34Path = storage_path() . '/mmrfiles/thankyou.pdf'; 

		

		

		

		/*------------------------------------ALL MMR PDFS ADDING-----------------------------------*/

		

		

		$pdf->addPDF($pdfFile0Path, 'all');	

		$pdf->addPDF($pdfFile1Path, 'all');	

		$pdf->addPDF($pdfFile2Path, 'all');	

		/*if(isset($pdfFile3Path) && $pdfFile3Path!="") $pdf->addPDF($pdfFile3Path, 'all');	*/

		if(isset($pdfFile4Path) && $pdfFile4Path!="")$pdf->addPDF($pdfFile4Path, 'all');

		if(isset($pdfFile5Path) && $pdfFile5Path!="")$pdf->addPDF($pdfFile5Path, 'all');

		if(isset($pdfFile5aPath) && $pdfFile5aPath!="")$pdf->addPDF($pdfFile5aPath, 'all');
		
		if(isset($pdfFile5a1Path) && $pdfFile5a1Path!="")$pdf->addPDF($pdfFile5a1Path, 'all');
		
		if(isset($pdfFile5a2Path) && $pdfFile5a2Path!="")$pdf->addPDF($pdfFile5a2Path, 'all');
		
		if(isset($pdfFile5a3Path) && $pdfFile5a3Path!="")$pdf->addPDF($pdfFile5a3Path, 'all');
		
		if(isset($pdfFile5a4Path) && $pdfFile5a4Path!="") $pdf->addPDF($pdfFile5a4Path, 'all');

		if(isset($pdfFile6Path) && $pdfFile6Path!="") $pdf->addPDF($pdfFile6Path, 'all');
		
		if(isset($pdfFile6aPath) && $pdfFile6aPath!="") $pdf->addPDF($pdfFile6aPath, 'all');

		if(isset($pdfFile7Path) && $pdfFile7Path!="")$pdf->addPDF($pdfFile7Path, 'all');
		
		if(isset($pdfFile7aPath) && $pdfFile7aPath!="")$pdf->addPDF($pdfFile7aPath, 'all');

		if(isset($pdfFile8Path) && $pdfFile8Path!="")$pdf->addPDF($pdfFile8Path, 'all');

		if(isset($pdfFile9Path) && $pdfFile9Path!="")$pdf->addPDF($pdfFile9Path, 'all');

		//if(isset($pdfFile10Path) && $pdfFile10Path!="")$pdf->addPDF($pdfFile10Path, 'all');

		if(isset($pdfFile11Path) && $pdfFile11Path!="")$pdf->addPDF($pdfFile11Path, 'all');

		if(isset($pdfFile13Path) && $pdfFile13Path!="")$pdf->addPDF($pdfFile13Path, 'all');

		if(isset($pdfFile14Path) && $pdfFile14Path!="")$pdf->addPDF($pdfFile14Path, 'all');

		if(isset($pdfFile15Path) && $pdfFile15Path!="")$pdf->addPDF($pdfFile15Path, 'all');

		if(isset($pdfFile16Path) && $pdfFile16Path!="")$pdf->addPDF($pdfFile16Path, 'all');

		if(isset($pdfFile17Path) && $pdfFile17Path!="")$pdf->addPDF($pdfFile17Path, 'all');

		if(isset($pdfFile18aPath) && $pdfFile18aPath!="")$pdf->addPDF($pdfFile18aPath, 'all');

		if(isset($pdfFile18bPath) && $pdfFile18bPath!="")$pdf->addPDF($pdfFile18bPath, 'all');

		if(isset($pdfFile18cPath) && $pdfFile18cPath!="")$pdf->addPDF($pdfFile18cPath, 'all');

		if(isset($pdfFile18dPath) && $pdfFile18dPath!="")$pdf->addPDF($pdfFile18dPath, 'all');

		if(isset($pdfFile18ePath) && $pdfFile18ePath!="")$pdf->addPDF($pdfFile18ePath, 'all');

		if(isset($pdfFile21Path) && $pdfFile21Path!="")$pdf->addPDF($pdfFile21Path, 'all');

		if(isset($pdfFile22Path) && $pdfFile22Path!="")$pdf->addPDF($pdfFile22Path, 'all');

		if(isset($pdfFile23Path) && $pdfFile23Path!="")$pdf->addPDF($pdfFile23Path, 'all');

		if(isset($pdfFile24Path) && $pdfFile24Path!="")$pdf->addPDF($pdfFile24Path, 'all');

		if(isset($pdfFile25Path) && $pdfFile25Path!="")$pdf->addPDF($pdfFile25Path, 'all');

		if(isset($pdfFile26Path) && $pdfFile26Path!="")$pdf->addPDF($pdfFile26Path, 'all');

		if(isset($pdfFile27Path) && $pdfFile27Path!="")$pdf->addPDF($pdfFile27Path, 'all');

		if(isset($pdfFile28Path) && $pdfFile28Path!="")$pdf->addPDF($pdfFile28Path, 'all');

		if(isset($pdfFile29Path) && $pdfFile29Path!="")$pdf->addPDF($pdfFile29Path, 'all');

		if(isset($pdfFile30Path) && $pdfFile30Path!="")$pdf->addPDF($pdfFile30Path, 'all');

		if(isset($pdfFile31Path) && $pdfFile31Path!="")$pdf->addPDF($pdfFile31Path, 'all');	

		if(isset($pdfFile32Path) && $pdfFile32Path!="")$pdf->addPDF($pdfFile32Path, 'all');	

		if(isset($pdfFile33Path) && $pdfFile33Path!="")$pdf->addPDF($pdfFile33Path, 'all');	
		
		if(isset($pdfFile6aaPath) && $pdfFile6aaPath!="") $pdf->addPDF($pdfFile6aaPath, 'all');
		
		$pdf->addPDF($pdfFile34Path, 'all');	

		

		$reportDate = "01-".$segment3."-".$segment2;

		

		$dwnfilename = "MMR_".$siteName."_".date("F",strtotime($reportDate))."-".$segment2.".pdf";	

		$pdf->merge('download', $dwnfilename);

	}

	

	







	public function downloadoverallmmr_01032019(Request $request)















    {







	ini_set('max_execution_time', 300);







	ini_set('memory_limit', '256M');







	







	$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));







	







//echo $uriSegments[1];







//echo $uriSegments[2]; 







//echo $uriSegments[3];







	







	$segment1 = $uriSegments[1]; 







	$segment2 = $uriSegments[2];







	$segment3 = $uriSegments[3];







	$site = $uriSegments[4];







	







	$year = $segment2;







	$month = $segment3;







	







		/*$segment1 = Request::segment(1); 







		$segment2 = Request::segment(2);







		$segment3 = Request::segment(3);







		$site = Request::segment(4);*/







		







		$mn = date("F", mktime(0, 0, 0, $segment3, 10));







		







		  $relations = [







			'report_month' => $mn,







			'report_year' => $segment2,







			'sitename' => get_sitename($site),







			];   















		$pdf = PDF::loadView('mmrreports.mmr_mmrwelcome', $relations);







		//$pdf->setPaper('A4', 'landscape');







		$pdf->save(storage_path('/mmrfiles/welcome.pdf'));   







		







		







		$pdf = PDF::loadView('mmrreports.mmr_mmrwcgraph', $relations);







		//$pdf->setPaper('A4', 'landscape');







		$pdf->save(storage_path('/mmrfiles/mmrwcgraph.pdf'));   















		$pdf = PDF::loadView('mmrreports.mmr_mmrmonthreports', $relations);







		//$pdf->setPaper('A4', 'landscape');







		$pdf->save(storage_path('/mmrfiles/file1.pdf')); 







		







		$pdf = PDF::loadView('mmrreports.mmr_mmrscopenature', $relations);







		//$pdf->setPaper('A4', 'landscape');







		$pdf->save(storage_path('/mmrfiles/file2.pdf')); 















		$pdf = PDF::loadView('mmrreports.mmr_mmrthankyou', $relations);







		//$pdf->setPaper('A4', 'landscape');







		$pdf->save(storage_path('/mmrfiles/thankyou.pdf'));   







		







		







		$pdf = PDF::loadView('mmrreports.mmrpfanalysis', $relations);







		//$pdf->setPaper('A4', 'landscape');







		$pdf->save(storage_path('/mmrfiles/file26.pdf'));   







		







		







		$pdf = PDF::loadView('mmrreports.mmrdgpkwh', $relations);







		//$pdf->setPaper('A4', 'landscape');







		$pdf->save(storage_path('/mmrfiles/file27.pdf'));   







		







		







		$pdf = PDF::loadView('mmrreports.mmrapceb', $relations);







		//$pdf->setPaper('A4', 'landscape');







		$pdf->save(storage_path('/mmrfiles/file28.pdf'));   







		







		$pdf = PDF::loadView('mmrreports.mmrmwconsumption', $relations);







		//$pdf->setPaper('A4', 'landscape');







		$pdf->save(storage_path('/mmrfiles/file29.pdf'));   







		







		







		 $matchfields_fornoc = ['valid_month' => $month, 'valid_year' => $year, 'site' =>$site];		







		 $resnoc_count = \App\Blocknocmonthreport::where($matchfields_fornoc)->count();



		 



		 $resnoc_cres = array();







			







		 if($resnoc_count>0)







		 {







		 	$resnoc_cres = \App\Blocknocmonthreport::where($matchfields_fornoc)->get();







		 }







		 else







		 {







		 	$resnoc_cres = \App\Blocknocmonthreport::where('site',$site)->get();







		 }		  















		$fnmatchfields_fornoc = ['month' => $month, 'year' => $year, 'site' =>$site]; 



		   $fnresnoc_count = \App\Firesafetymisreport::where($fnmatchfields_fornoc)->count();



		   if($fnresnoc_count > 0){



		   		$fresnoc_cres = \App\Firesafetymisreport::where($fnmatchfields_fornoc)->first();



		   		$noc_info = $fresnoc_cres->noc_info;







		   }



		 







		$noc_info = "";   







		 $relations = [



		 



		 	'report_on' => date($year."-".$month."-t"),







			'report_year' => $year,







			'report_month' => $month,







			'nocres' => $resnoc_cres,



			



			'noc_info' => $noc_info,



			



			'sitename' => get_sitename($site),







			];







		







		$pdf = PDF::loadView('mmrreports.mmrnoc', $relations);







		//$pdf->setPaper('A4', 'landscape');







		$pdf->save(storage_path('/mmrfiles/file30.pdf'));  







		







		







		 







		







		$pdf = PDF::loadView('mmrreports.mmrpets', $relations);







		//$pdf->setPaper('A4', 'landscape');







		$pdf->save(storage_path('/mmrfiles/file31.pdf'));   



		



		$wsp_cres = array();



		$wsp_cres1 = array();



		$wsp_match = ['month' => $month, 'year' => $year, 'site' =>$site]; 



	    $wsp_count = \App\Wspmtreport::where($wsp_match)->count();



	    if($wsp_count > 0){



			$wsp_cres = \App\Wspmtreport::where($wsp_match)->first();



	    }







	    $wsp_match1 = ['month' => $month, 'year' => $year, 'site' =>$site]; 



	    $wsp_count1 = \App\Wspmotreport::where($wsp_match1)->count();



	    if($wsp_count1 > 0){



			$wsp_cres1 = \App\Wspmotreport::where($wsp_match1)->first();



	    }



		$relations = [		 



		 	'report_on' => date($year."-".$month."-t"),







			'report_year' => $year,







			'report_month' => $month,







			'pbasys' => $wsp_cres,



			'pbasys1' => $wsp_cres1,



			'sitename' => get_sitename($site),



			];



		$pdf = PDF::loadView('mmrreports.mmr_wsp_inlet', $relations);

		

		$pdf->save(storage_path('/mmrfiles/file32.pdf')); 

		

		

		$pdf = PDF::loadView('mmrreports.mmr_wsp_outlet', $relations);



		$pdf->save(storage_path('/mmrfiles/file35.pdf'));  

		

		 



		



		



		$result = array();







		$matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year]; 



		



		



		



		$startdate = date('Y-'.$month.'-d.');



		



		$enddate = date('Y-'.$month.'-t.');







		



		



		$query_eqp = "select `community_assets`.*, `categories`.`name` as `catgname`, `vendors`.`name` as `vendorname`, `assets`.`name` as `assetname`, `sites`.`name` as `sitename` from `community_assets` left join `categories` on `categories`.`id` = `community_assets`.`category_id` left join `vendors` on `vendors`.`id` = `community_assets`.`vendor` left join `assets` on `assets`.`id` = `community_assets`.`asset_id` left join `sites` on `sites`.`id` = `community_assets`.`site_id` where `community_assets`.`amc_type` = 'amc' and `community_assets`.`site_id` = ".$site." and (`community_assets`.`amc_enddate` >= '".$startdate."' OR `community_assets`.`amc_enddate` <= '".$enddate."') group by `asset_group` order by `amc_enddate` desc";		



		$formfieldarray = DB::select($query_eqp);



		



		$data = array();



		



		if(count($formfieldarray) > 0){



			 foreach($formfieldarray as $key=>$formres){



			 	$data[$key]['name'] = $formres->name;



			 	$data[$key]['amc_startdate'] = $formres->amc_startdate;



			 	$data[$key]['amc_enddate'] = $formres->amc_enddate;



			 	$data[$key]['vendorname'] = $formres->vendorname;



			 	$data[$key]['assetname'] = $formres->assetname;



			 }



		}







		 $relations = [







			'year' => $year,







			'month' => $month, 







			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),







			'sitename' => get_sitename($site),







			'site' => $site,







			'resval' => $data







        ];  







		  







		







		$pdf = PDF::loadView('mmrreports.mmramctrackers', $relations);







		$pdf->save(storage_path('/mmrfiles/file33.pdf')); 















	   







	    // MANPOWER REPORTS







	     







		$mmr_res  = array();







		$resullt = array();







		$formfieldarray = array();







		$resar = array();







		$valid_form = array();







		$flabels = array();







	    $matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year]; 







		$matchfields = ['site' => $site]; 







		$resullt = \App\Mmrmanpowerreport::where($matchfields_hskpact)->first();







		







		//print_r($matchfields_mmr_eb);







	    $mmr_count = \App\Mmrmanpowerreport::where($matchfields_hskpact)->count();







		if($mmr_count > 0){







		$mmr_res = \App\Mmrmanpowerreport::where($matchfields_hskpact)->first();







		$valid_form = array();







		$matchfields = ['site' => $site]; 







		$valid_form_cn = \App\Manpowervalidation::where($matchfields)->count();







		if($valid_form_cn > 0){







			$valid_form = \App\Manpowervalidation::where($matchfields)->first();







		}







		







		







		if((int)$mmr_res ->sh_dgm_facility > 0) { $resar['sh_dgm_facility'] = $mmr_res ->sh_dgm_facility;







		    $flabels['sh_dgm_facility']=  "DGM -  Facilities";                  







		 }







		if((int)$mmr_res ->sh_sr_mang_facility > 0) {







		    $resar['sh_sr_mang_facility'] = $mmr_res ->sh_sr_mang_facility;







			$flabels['sh_sr_mang_facility']=  "Sr. Manager - Facilities";                  







			}







		if((int)$mmr_res ->sh_mang_facility > 0) {







			$resar['sh_mang_facility'] = $mmr_res ->sh_mang_facility;







			$flabels['sh_mang_facility']=  "Manager - Facilities";  







			}







		if((int)$mmr_res ->sh_mang_fire_safety > 0) {







			$resar['sh_mang_fire_safety'] = $mmr_res ->sh_mang_fire_safety;







			$flabels['sh_mang_fire_safety']=  "Manager - Fire & Safety";  







			}







		if((int)$mmr_res ->sh_mang_horti > 0) {







			 $resar['sh_mang_horti'] = $mmr_res ->sh_mang_horti;







			 $flabels['sh_mang_horti']=  "Manager - Horticulture";  







			 }







		if((int)$mmr_res ->sh_mang_tnd > 0) {







			 $resar['sh_mang_tnd'] = $mmr_res ->sh_mang_tnd;







			 $flabels['sh_mang_tnd']=  "Manager - T & D";







			 }







		if((int)$mmr_res ->sh_sr_mang > 0) {







			$resar['sh_sr_mang'] = $mmr_res ->sh_sr_mang;







			$flabels['sh_sr_mang']=  "Sr.Manager";







			}







		if((int)$mmr_res ->sh_mang > 0) {







		 	$resar['sh_mang'] = $mmr_res ->sh_mang;







			$flabels['sh_mang']=  "Manager";







		 }







		if((int)$mmr_res ->sh_dy_mang_facility > 0) {







			$resar['sh_dy_mang_facility'] = $mmr_res ->sh_dy_mang_facility;







			$flabels['sh_dy_mang_facility']=  "Dy.Manager - Facilities";







			}







		if((int)$mmr_res ->sh_dy_mang_secure > 0) {







			$resar['sh_dy_mang_secure'] = $mmr_res ->sh_dy_mang_secure;







			$flabels['sh_dy_mang_secure']=  "Dy. Manager - Security";







			}







		if((int)$mmr_res ->sh_dy_mang_hr > 0) {







			 $resar['sh_dy_mang_hr'] = $mmr_res ->sh_dy_mang_hr;







			 $flabels['sh_dy_mang_hr']=  "Dy. Manager - HR";







			 }







		if((int)$mmr_res ->sh_exec_horti > 0) {







		    $resar['sh_exec_horti'] = $mmr_res ->sh_exec_horti;







			$flabels['sh_exec_horti']=  "Sr. Exe - Horticulture";







			}







		if((int)$mmr_res ->sh_sr_officer_stores > 0) {







			$resar['sh_sr_officer_stores'] = $mmr_res ->sh_sr_officer_stores;







			$flabels['sh_sr_officer_stores']=  "Sr. Officer - Stores";







			}







		if((int)$mmr_res ->sh_exec_hr > 0){







		 	$resar['sh_exec_hr'] = $mmr_res ->sh_exec_hr;







			$flabels['sh_exec_hr']=  "Executive - HR";







		 }







		if((int)$mmr_res ->sh_exec_acc > 0) {







			 $resar['sh_exec_acc'] = $mmr_res ->sh_exec_acc;







			 $flabels['sh_exec_acc']=  "Executive - Accounts";







		}







		if((int)$mmr_res ->sh_jr_exec_acc > 0) {







			 $resar['sh_jr_exec_acc'] = $mmr_res ->sh_jr_exec_acc;







			 $flabels['sh_jr_exec_acc']=  "Jr. Executive - Accounts";







		 }







		if((int)$mmr_res ->sh_jr_off_irrigation > 0) {







			$resar['sh_jr_off_irrigation'] = $mmr_res ->sh_jr_off_irrigation;







			$flabels['sh_jr_off_irrigation']=  "Jr.Officer - Irrigation";







		}







		if((int)$mmr_res ->ful_sr_mang > 0) {







			$resar['ful_sr_mang'] = $mmr_res ->ful_sr_mang;







			$flabels['ful_sr_mang']=  "Sr.Manager";







		}







		if((int)$mmr_res ->ful_mang > 0) {







			$resar['ful_mang'] = $mmr_res ->ful_mang;







			$flabels['ful_mang']=  "Manager";







		}







		if((int)$mmr_res ->ful_sr_eng_facility > 0) {







			$resar['ful_sr_eng_facility'] = $mmr_res ->ful_sr_eng_facility;







			$flabels['ful_sr_eng_facility']=  "Sr. Engineer - Facilities";







		}







		if((int)$mmr_res ->ful_eng_facility > 0) {







			$resar['ful_eng_facility'] = $mmr_res ->ful_eng_facility;







			$flabels['ful_eng_facility']=  "Engineer Facilities";







		}







		if((int)$mmr_res ->ful_serv_eng_elevator > 0) {







			$resar['ful_serv_eng_elevator'] = $mmr_res ->ful_serv_eng_elevator;







			$flabels['ful_serv_eng_elevator']=  "Service Engineer - Elevator";







		}







		if((int)$mmr_res ->ful_asst_eng_facility > 0) {







			 $resar['ful_asst_eng_facility'] = $mmr_res ->ful_asst_eng_facility;







			 $flabels['ful_asst_eng_facility']=  "Asst. Engr - Facilities";







		}







		if((int)$mmr_res ->ful_jr_eng_facility > 0) {







			$resar['ful_jr_eng_facility'] = $mmr_res ->ful_jr_eng_facility;







			$flabels['ful_jr_eng_facility']=  "Jr.Engineer - Facilities";







			}







		if((int)$mmr_res ->ful_officer > 0) {







			$resar['ful_officer'] = $mmr_res ->ful_officer;







			$flabels['ful_officer']=  "Officer";







		}







		if((int)$mmr_res ->ful_jr_off_facility > 0) {







			$resar['ful_jr_off_facility'] = $mmr_res ->ful_jr_off_facility;







			$flabels['ful_jr_off_facility']=  "Jr. Officer - Facilities";







		}







		if((int)$mmr_res ->ful_get > 0) {	







			$resar['ful_get'] = $mmr_res ->ful_get;







			$flabels['ful_get']=  "GET";







		}







		if((int)$mmr_res ->ful_sr_supervisor > 0) {







			$resar['ful_sr_supervisor'] = $mmr_res ->ful_sr_supervisor;







			$flabels['ful_sr_supervisor']=  "Sr. Supervisor";







			}







		if((int)$mmr_res ->ful_super_facility > 0) {







			$resar['ful_super_facility'] = $mmr_res ->ful_super_facility;







			$flabels['ful_super_facility']=  "Supervisor - Facilities";







			}







		if((int)$mmr_res ->ful_super_maintainance > 0) {







			$resar['ful_super_maintainance'] = $mmr_res ->ful_super_maintainance;







			$flabels['ful_super_maintainance']=  "Supervisor - Maintenance";







			}







		if((int)$mmr_res ->ful_dy_manger_pms > 0) {







			$resar['ful_dy_manger_pms'] = $mmr_res ->ful_dy_manger_pms;







			$flabels['ful_dy_manger_pms']=  "Dy. Manager - PMS";







			}







		if((int)$mmr_res ->ful_asst_mngr_pms > 0) {







			$resar['ful_asst_mngr_pms'] = $mmr_res ->ful_asst_mngr_pms;







			$flabels['ful_asst_mngr_pms']=  "Asst.Mngr. - PMS";







			}







		if((int)$mmr_res ->ful_sr_exec_pms > 0) {







			$resar['ful_sr_exec_pms'] = $mmr_res ->ful_sr_exec_pms;







			$flabels['ful_sr_exec_pms']=  "Sr. Executive - PMS";







			}







		if((int)$mmr_res ->ful_exec_pms > 0) {







			$resar['ful_exec_pms'] = $mmr_res ->ful_exec_pms;







			$flabels['ful_exec_pms']=  "Executive - PMS";







			}







		if((int)$mmr_res ->ful_jr_officer_pms > 0) {







			 $resar['ful_jr_officer_pms'] = $mmr_res ->ful_jr_officer_pms;







			 $flabels['ful_jr_officer_pms']=  "Jr.Officer - PMS";







			 }







		if((int)$mmr_res ->ful_sr_supervisor_pms > 0) {







			$resar['ful_sr_supervisor_pms'] = $mmr_res ->ful_sr_supervisor_pms;







			$flabels['ful_sr_supervisor_pms']=  "Sr.Supervisor - PMS";







			}







		if((int)$mmr_res ->ful_supervisor > 0) {







			$resar['ful_supervisor'] = $mmr_res ->ful_supervisor;







			$flabels['ful_supervisor']=  "Supervisor";







			}







		if((int)$mmr_res ->ful_adminst_support > 0) {







			$resar['ful_adminst_support'] = $mmr_res ->ful_adminst_support;







			$flabels['ful_adminst_support']=  "Administrative Support";







			}







		if((int)$mmr_res ->ful_office_assistant > 0){







		 $resar['ful_office_assistant'] = $mmr_res ->ful_office_assistant;







		 $flabels['ful_office_assistant']=  "Office Assistant";







		 }







		if((int)$mmr_res ->ful_assistant > 0) {







			$resar['ful_assistant'] = $mmr_res ->ful_assistant;







			$flabels['ful_assistant']=  "Assistant";







		}







		if((int)$mmr_res ->ful_sr_asst_help_desk > 0) {







			$resar['ful_sr_asst_help_desk'] = $mmr_res ->ful_sr_asst_help_desk;







			$flabels['ful_sr_asst_help_desk']=  "Sr. Asst Help Desk";







		}







		if((int)$mmr_res ->ful_asst_help_desk > 0) {







			$resar['ful_asst_help_desk'] = $mmr_res ->ful_asst_help_desk;







			$flabels['ful_asst_help_desk']=  "Assistant - Help Desk";







		}







		if((int)$mmr_res ->ful_office_attendant > 0) {







			$resar['ful_office_attendant'] = $mmr_res ->ful_office_attendant;







			$flabels['ful_office_attendant']=  "Office Attendant";







		}







		if((int)$mmr_res ->ful_asst_stores > 0) {







			$resar['ful_asst_stores'] = $mmr_res ->ful_asst_stores;







			$flabels['ful_asst_stores']=  "Asst. - Stores";







		}







		if((int)$mmr_res ->ful_tr_asst_stores > 0) {







			$resar['ful_tr_asst_stores'] = $mmr_res ->ful_tr_asst_stores;







			$flabels['ful_tr_asst_stores']=  "Tr.Assistant - Stores";







			}







		if((int)$mmr_res ->ful_sr_mechanic > 0) {







			 $resar['ful_sr_mechanic'] = $mmr_res ->ful_sr_mechanic;







			 $flabels['ful_sr_mechanic']=  "Sr. Mechanic";







		}







		if((int)$mmr_res ->ful_sr_supervisor_plumbing > 0) {







			 $resar['ful_sr_supervisor_plumbing'] = $mmr_res ->ful_sr_supervisor_plumbing;







			 $flabels['ful_sr_supervisor_plumbing']=  "Sr. Supervisor - Plumbing";







		}







		if((int)$mmr_res ->ful_sr_technician > 0) {







			$resar['ful_sr_technician'] = $mmr_res ->ful_sr_technician;







			$flabels['ful_sr_technician']=  "Sr. Technician";







		}







		if((int)$mmr_res ->ful_mechanic > 0) {







			 $resar['ful_mechanic'] = $mmr_res ->ful_mechanic;







			 $flabels['ful_mechanic']=  "Mechanic";







		}







		if((int)$mmr_res ->ful_super_plumbing > 0) {







			$resar['ful_super_plumbing'] = $mmr_res ->ful_super_plumbing;







			$flabels['ful_super_plumbing']=  "Supervisor - Plumbing";







		}







		if((int)$mmr_res ->ful_super_stp > 0) {







			$resar['ful_super_stp'] = $mmr_res ->ful_super_stp;







			$flabels['ful_super_stp']=  "Supervisor-STP";







		}







		if((int)$mmr_res ->ful_multi_technician > 0) {







			$resar['ful_multi_technician'] = $mmr_res ->ful_multi_technician;







			$flabels['ful_multi_technician']=  "Multi Technician";







		}







		if((int)$mmr_res ->ful_welder > 0) {







			$resar['ful_welder'] = $mmr_res ->ful_welder;







			$flabels['ful_welder']=  "Welder";







		}







		if((int)$mmr_res ->ful_carpenter > 0) {







			$resar['ful_carpenter'] = $mmr_res ->ful_carpenter;







			$flabels['ful_carpenter']=  "Carpenter";







			}







		if((int)$mmr_res ->ful_gas_technician > 0) {







			$resar['ful_gas_technician'] = $mmr_res ->ful_gas_technician;







			$flabels['ful_gas_technician']=  "Gas - Technician";







			}







		if((int)$mmr_res ->ful_technician > 0) {	







			$resar['ful_technician'] = $mmr_res ->ful_technician;







			$flabels['ful_technician']=  "Technician";







		}







		if((int)$mmr_res ->ful_stp_operator > 0) {	







			$resar['ful_stp_operator'] = $mmr_res ->ful_stp_operator;







			$flabels['ful_stp_operator']=  "STP operators";







		}







		if((int)$mmr_res ->ful_electrician > 0) {







			$resar['ful_electrician'] = $mmr_res ->ful_electrician;







			$flabels['ful_electrician']=  "Electricians";







			}







		if((int)$mmr_res ->ful_plumber > 0) {







			$resar['ful_plumber'] = $mmr_res ->ful_plumber;







			$flabels['ful_plumber']=  "Plumbers";







			}







		if((int)$mmr_res ->ful_painter > 0) {	







			$resar['ful_painter'] = $mmr_res ->ful_painter;







			$flabels['ful_painter']=  "Painter";







			}







		if((int)$mmr_res ->ful_lift_care_taker > 0) {







			$resar['ful_lift_care_taker'] = $mmr_res ->ful_lift_care_taker;







			$flabels['ful_lift_care_taker']=  "Lift Care Taker";







			}







		if((int)$mmr_res ->ful_operator_ros_mach > 0) {







			$resar['ful_operator_ros_mach'] = $mmr_res ->ful_operator_ros_mach;







			$flabels['ful_operator_ros_mach']=  "Operators - ROS Machine";







			}







		if((int)$mmr_res ->ful_tractor_driver > 0) {







			$resar['ful_tractor_driver'] = $mmr_res ->ful_tractor_driver;







			$flabels['ful_tractor_driver']=  "Tractor Drivers";







			}







		if((int)$mmr_res ->full_drivers > 0) {







			$resar['full_drivers'] = $mmr_res ->full_drivers;







			$flabels['full_drivers']=  "Drivers";







			}







		if((int)$mmr_res ->ful_sr_officer_fire_safe > 0) {







			 $resar['ful_sr_officer_fire_safe'] = $mmr_res ->ful_sr_officer_fire_safe;







			 $flabels['ful_sr_officer_fire_safe']=  "tester";







			 }







		if((int)$mmr_res ->ful_officer_fire_safety > 0) {







			$resar['ful_officer_fire_safety'] = $mmr_res ->ful_officer_fire_safety;







			$flabels['ful_officer_fire_safety']=  "Sr.Officer - Fire & Safety";







			}







		if((int)$mmr_res ->ful_sup_fire_safety > 0) {







			$resar['ful_sup_fire_safety'] = $mmr_res ->ful_sup_fire_safety;







			$flabels['ful_sup_fire_safety']=  "Officer - Fire & Safety";







			}







		if((int)$mmr_res ->ful_sup_super_firesafe > 0) {







			$resar['ful_sup_super_firesafe'] = $mmr_res ->ful_sup_super_firesafe;







			$flabels['ful_sup_super_firesafe']=  "Sr.SUP - Fire & Safety";







			}







		if((int)$mmr_res ->ful_tr_sup_fire_safe > 0) {







			$resar['ful_tr_sup_fire_safe'] = $mmr_res ->ful_tr_sup_fire_safe;







			$flabels['ful_tr_sup_fire_safe']=  "Tr.SUP - Fire & Safety";







			}







		if((int)$mmr_res ->ful_steward_fire_safe > 0) {







			$resar['ful_steward_fire_safe'] = $mmr_res ->ful_steward_fire_safe;







			$flabels['ful_steward_fire_safe']=  "Steward - Fire & Safety";







			}







		if((int)$mmr_res ->ful_sr_sup_house_keeping > 0) {







			$resar['ful_sr_sup_house_keeping'] = $mmr_res ->ful_sr_sup_house_keeping;







			$flabels['ful_sr_sup_house_keeping']=  "Sr. Supervisors - Housekeeping";







			}







		if((int)$mmr_res ->ful_sup_house_keeping > 0)	{







			 $resar['ful_sup_house_keeping'] = $mmr_res ->ful_sup_house_keeping;







			 $flabels['ful_sup_house_keeping']=  "Supervisors - Housekeeping";







			 }







		if((int)$mmr_res ->ful_hskp_workers > 0) {







			$resar['ful_hskp_workers'] = $mmr_res ->ful_hskp_workers;







			$flabels['ful_hskp_workers']=  "Housekeeping workers";







			}







		if((int)$mmr_res ->ful_hs_keeper > 0) {







			$resar['ful_hs_keeper'] = $mmr_res ->ful_hs_keeper;







			$flabels['ful_hs_keeper']=  "House Keeper";







			}







		if((int)$mmr_res ->ful_office_boy > 0) {







			$resar['ful_office_boy'] = $mmr_res ->ful_office_boy;







			$flabels['ful_office_boy']=  "Office Boy";







			}







		if((int)$mmr_res ->ful_helper > 0) {







			$resar['ful_helper'] = $mmr_res ->ful_helper;







			$flabels['ful_helper']=  "Helper";







			}







		if((int)$mmr_res ->ful_jr_officer_horti > 0) {







			$resar['ful_jr_officer_horti'] = $mmr_res ->ful_jr_officer_horti;







			$flabels['ful_jr_officer_horti']=  "Jr Officer-Horticulture";







			}







		if((int)$mmr_res ->ful_land_scape_super > 0) {







			$resar['ful_land_scape_super'] = $mmr_res ->ful_land_scape_super;







			$flabels['ful_land_scape_super']=  "Landscaping Supervisor";







			}







		if((int)$mmr_res ->ful_garden_help > 0) {







			$resar['ful_garden_help'] = $mmr_res ->ful_garden_help;







			$flabels['ful_garden_help']=  "Garden Helper";







			}







		if((int)$mmr_res ->ful_sr_officer_security > 0) {







			$resar['ful_sr_officer_security'] = $mmr_res ->ful_sr_officer_security;







			$flabels['ful_sr_officer_security']=  "Sr.Officer-Security";







			}







		if((int)$mmr_res ->ful_security_officer > 0) {







			$resar['ful_security_officer'] = $mmr_res ->ful_security_officer;







			$flabels['ful_security_officer']=  "Security Officer";







			}







		if((int)$mmr_res ->ful_asst_sec_officer > 0) {







			$resar['ful_asst_sec_officer'] = $mmr_res ->ful_asst_sec_officer;







			$flabels['ful_asst_sec_officer']=  "Asst Security Officer";







			}







		if((int)$mmr_res ->ful_sr_asst > 0) {







			$resar['ful_sr_asst'] = $mmr_res ->ful_sr_asst;







			$flabels['ful_sr_asst']=  "Sr. Asst.";







			}







		if((int)$mmr_res ->ful_secu_head_guards > 0) {







			$resar['ful_secu_head_guards'] = $mmr_res ->ful_secu_head_guards;







			$flabels['ful_secu_head_guards']=  "Security Head Guards";







			}







		if((int)$mmr_res ->ful_sr_lady_sup_sec > 0) {







			$resar['ful_sr_lady_sup_sec'] = $mmr_res ->ful_sr_lady_sup_sec;







			$flabels['ful_sr_lady_sup_sec']=  "Sr. Lady Sup - Security";







			}







		if((int)$mmr_res ->ful_sec_super > 0) {







			$resar['ful_sec_super'] = $mmr_res ->ful_sec_super;







			$flabels['ful_sec_super']=  "Security Supervisors";







			}







		if((int)$mmr_res ->ful_jr_super_secu > 0) {







			$resar['ful_jr_super_secu'] = $mmr_res ->ful_jr_super_secu;







			$flabels['ful_jr_super_secu']=  "Jr. Supervisor-Security";







			}







		if((int)$mmr_res ->ful_secu_guards > 0) {







			$resar['ful_secu_guards'] = $mmr_res ->ful_secu_guards;







			$flabels['ful_secu_guards']=  "Security Guards";







			}







		if((int)$mmr_res ->ful_lady_secu_guards > 0) {







			 $resar['ful_lady_secu_guards'] = $mmr_res ->ful_lady_secu_guards;







			 $flabels['ful_lady_secu_guards']=  "Lady Security Guards";







			 }







		if((int)$mmr_res ->ch_executive_ch > 0) {







			$resar['ch_executive_ch'] = $mmr_res ->ch_executive_ch;







			$flabels['sh_dgm_facility']=  "Executive - CH";







			}







		if((int)$mmr_res ->ch_front_office_exec > 0) {







			$resar['ch_front_office_exec'] = $mmr_res ->ch_front_office_exec;







			$flabels['ch_front_office_exec']=  "Front Office Executive";







			}







		if((int)$mmr_res ->ch_asst_front_off > 0) {







			$resar['ch_asst_front_off'] = $mmr_res ->ch_asst_front_off;







			$flabels['ch_asst_front_off']=  "Assistant - Front Office";







			}







		if((int)$mmr_res ->ch_super_club_house > 0) {







			$resar['ch_super_club_house'] = $mmr_res ->ch_super_club_house;







			$flabels['ch_super_club_house']=  "Supervisor- Clubhouse";







			}







		if((int)$mmr_res ->ch_care_taker_ch > 0) {







			$resar['ch_care_taker_ch'] = $mmr_res ->ch_care_taker_ch;







			$flabels['ch_care_taker_ch']=  "Care Taker - Club House";







			}







		if((int)$mmr_res ->ch_attendant > 0) {







			$resar['ch_attendant'] = $mmr_res ->ch_attendant;







			$flabels['ch_attendant']=  "Club house - Attendant";







			}







		if((int)$mmr_res ->ch_hskp_super > 0) {







			$resar['ch_hskp_super'] = $mmr_res ->ch_hskp_super;







			$flabels['ch_hskp_super']=  "Housekeeping Supervisors";







			}







		if((int)$mmr_res ->ch_hskp_worker > 0) {







			$resar['ch_hskp_worker'] = $mmr_res ->ch_hskp_worker;







			$flabels['ch_hskp_worker']=  "Housekeeping Workers";







			}







		if((int)$mmr_res ->ch_secu_guard > 0) {







			$resar['ch_secu_guard'] = $mmr_res ->ch_secu_guard;







			$flabels['ch_secu_guard']=  "Security Guards";







			}







		if((int)$mmr_res ->ch_swimpool_operator > 0) {







			$resar['ch_swimpool_operator'] = $mmr_res ->ch_swimpool_operator;







			$flabels['ch_swimpool_operator']=  "Swimming pool operator";







			}







		if((int)$mmr_res ->ch_badminton_coach > 0) {







			$resar['ch_badminton_coach'] = $mmr_res ->ch_badminton_coach;







			$flabels['ch_badminton_coach']=  "Badminton Coach";







			}







		if((int)$mmr_res ->ch_cricket_coach > 0) {







			$resar['ch_cricket_coach'] = $mmr_res ->ch_cricket_coach;







			$flabels['ch_cricket_coach']=  "Cricket Coach";







			}	







		if((int)$mmr_res ->ch_gym_trainer > 0) {







			$resar['ch_gym_trainer'] = $mmr_res ->ch_gym_trainer;







			$flabels['ch_gym_trainer']=  "Gym Trainer";







			}







		if((int)$mmr_res ->ch_swim_pool_coach > 0) {







			$resar['ch_swim_pool_coach'] = $mmr_res ->ch_swim_pool_coach;







			$flabels['ch_swim_pool_coach']=  "Swimming pool Coach";







			}







		if((int)$mmr_res ->ch_tennis_coach > 0) {







			$resar['ch_tennis_coach'] = $mmr_res ->ch_tennis_coach;







			$flabels['ch_tennis_coach']=  "Tennis Coach";







			}







		if((int)$mmr_res ->ch_yoga_trainer > 0) {







			$resar['ch_yoga_trainer'] = $mmr_res ->ch_yoga_trainer;







			$flabels['ch_yoga_trainer']=  "Yoga trainer";







			}







		if((int)$mmr_res ->ch_zumba_dance_trainer > 0) {







			$resar['ch_zumba_dance_trainer'] = $mmr_res ->ch_zumba_dance_trainer;







			$flabels['ch_zumba_dance_trainer']=  "zumba dance trainer";







			}







					







	   }







	   







	   $relations = [







	        'year' => $year,







			'month' => $month, 







			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),







			'resar' => $resar,







			'flabels' => $flabels,







			'valid_form' => $valid_form







	    ];







		







		//return view('mmrreports.mmr_manpower_report', $relations);







	   $pdf = PDF::loadView('mmrreports.mmr_manpower_report', $relations);







	   $pdf->save(storage_path('/mmrfiles/file3.pdf')); 







	   







	   







	   //MMR SLA ADHERANCE REPORT







	   







	   $resullt = array();







		$matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year]; 







		$resullt_cn = \App\Mmrslareport::where($matchfields_hskpact)->count();







		if($resullt_cn > 0){







			$resullt = \App\Mmrslareport::where($matchfields_hskpact)->get();







		}







		  







		 $relations = [







			'year' => $year,







			'month' => $month, 







			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),







			'sitename' => get_sitename($site),







			'site' => $site,







			'resval' => $resullt







        ];  







		  







		







		$pdf = PDF::loadView('mmrreports.mmr_slareports', $relations);







		//$pdf->setPaper('A4', 'landscape');







		$pdf->save(storage_path('/mmrfiles/file22.pdf')); 







        







	  







      // END SLA ADHERENCE REPORT







		







		







		$resullt = array();







		$matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year]; 







		$resullt_cn = \App\Mmrmajorincident::where($matchfields_hskpact)->count();







		if($resullt_cn > 0){







			$resullt = \App\Mmrmajorincident::where($matchfields_hskpact)->get();







		}







		  







		 $relations = [







			'year' => $year,







			'month' => $month, 







			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),







			'sitename' => get_sitename($site),







			'site' => $site,







			'resval' => $resullt







        ];  







		  







		







		$pdf = PDF::loadView('mmrreports.mmr_mmrtechnicalservices', $relations);







		//$pdf->setPaper('A4', 'landscape');







		$pdf->save(storage_path('/mmrfiles/file4.pdf')); 







		







		







		$resullt = array();







		$matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year, 'type' => 'initiative']; 







		$resullt_cn = \App\Mmrhousekpact::where($matchfields_hskpact)->count();







		if($resullt_cn > 0){







			$resullt = \App\Mmrhousekpact::where($matchfields_hskpact)->get();







		}







		   







		 $relations = [







			'year' => $year,







			'month' => $month, 







			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),







			'sitename' => get_sitename($site),







			'site' => $site,







			'resval' => $resullt







        ];  







		







		//return view('mmrreports.mmr_mmrinitiativetaken', $relations);







		







		$pdf = PDF::loadView('mmrreports.mmr_mmrinitiativetaken', $relations);







		//$pdf->setPaper('A4', 'landscape');







		$pdf->save(storage_path('/mmrfiles/file5.pdf')); 







		







		$resullt = array();







		$matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year]; 







		$resullt_cn = \App\Mmrppmreport::where($matchfields_hskpact)->count();







		if($resullt_cn > 0){







			$resullt = \App\Mmrppmreport::where($matchfields_hskpact)->get();







		}







		







		$last_month = $month-1%12;







		//echo ($last_month==0?($year-1):$year)."-".($last_month==0?'12':$last_month);







		 $lstmn = ($last_month==0?'12':$last_month);







		  $lyear =  ($last_month==0?($year-1):$year);







		  $lresullt = array();







		$lmatchfields_hskpact = ['site' => $lyear, 'month' =>$lstmn, 'year' => $year]; 







		$lresullt_cn = \App\Mmrppmreport::where($lmatchfields_hskpact)->count();







		if($lresullt_cn > 0){







			$lresullt = \App\Mmrppmreport::where($lmatchfields_hskpact)->get();







		}







		  







		 $relations = [







			'year' => $year,







			'month' => $month, 







			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),







			'sitename' => get_sitename($site),







			'site' => $site,







			'resval' => $resullt,







			'lresval' => $lresullt







        ];  







		







		//return view('mmrreports.mmr_mmrplannedperventives', $relations);







		$pdf = PDF::loadView('mmrreports.mmr_mmrplannedperventives', $relations);







		//$pdf->setPaper('A4', 'landscape');







		$pdf->save(storage_path('/mmrfiles/file6.pdf')); 







		







		// EB CONSUMPTION







		







		$segment2 = $year;







		$segment3 = $month;







		$last_month = $month-1%12;







		







		if($last_month==0){







		  $year = $year-1;







		}







		







		if($last_month==0){







		  $last_month = 12;







		}







		















		$blastmonth = $last_month-1%12;







		 $blastyear = $year;







		if($blastmonth==0){







		  $blastyear = $blastyear-1;







		}







		







		if($blastmonth==0){







		  $blastmonth = 12;







		}







		 







       $curdate = $segment2."-".$segment3."-"."01";







	  







	   $prev_date = $year."-".$last_month."-"."01";







	  







	   $b_prev_date = $blastyear."-".$blastmonth."-"."01";







	  







	







	$curmonth_day_power_consump = array();







	







	 $cur_mn_days = date("t",strtotime($curdate));  







	 $prev_mn_days = date("t",strtotime($prev_date));  







	 $b_prev_mn_days = date("t",strtotime($b_prev_date));  







	







	$cur_solarpwr_units = 0;







	$prev_solarpwr_units = 0;







	$b_prev_solarpwr_units = 0;







	







	$cur_dgpwr_units = 0;







	$prev_dgpwr_units = 0;







	$b_prev_dgpwr_units = 0;







	







	$cur_ebpwr_units = 0;







	$prev_ebpwr_units = 0;







	$b_prev_ebpwr_units = 0;







	$cur_powerfail = 0;







	$prev_powerfail = 0;







	$b_prev_powerfail = 0;







	







	// CURRENT







	 $mincn = 0;







	for($i=1;$i<=$cur_mn_days;$i++){







	    $reporton = $segment2."-".$segment3."-".$i;







				$occupanymatch_fileds = ['reporton' => $reporton, 'site' => $site]; 







				$occres_cn = \App\Fmsdailyreport::where($occupanymatch_fileds)->count(); 







				if($occres_cn > 0){







				$occres_res = \App\Fmsdailyreport::where($occupanymatch_fileds)->first();







				  $cur_solarpwr_units = $cur_solarpwr_units + $occres_res->pwr_solarpwrunits;







				  $cur_dgpwr_units = $cur_dgpwr_units + $occres_res->dgset_dgunits;







				  







				  $hr =$occres_res->dgset_pwrfailure;







			 $tarr = explode(":",$hr);







			 $hour = (int)$tarr[0];







			 $min = (int)$tarr[1];







			 $tmin = ($hour * 60) + $min;







			 $mincn = $mincn + $tmin;







				}







	  







	}







	







	  if($mincn > 0){







		    $hours = floor($mincn / 60);







             $minutes = ($mincn % 60);







			 $cur_powerfail = $hours.":".$minutes;







		 } 







	// PREVIOUS







	 $mincn = 0;







	for($i=1;$i<=$prev_mn_days;$i++){







	    $reporton = $year."-".$last_month."-".$i;







				$occupanymatch_fileds = ['reporton' => $reporton, 'site' => $site]; 







				$occres_cn = \App\Fmsdailyreport::where($occupanymatch_fileds)->count(); 







				if($occres_cn > 0){







				$occres_res = \App\Fmsdailyreport::where($occupanymatch_fileds)->first();







				  $prev_solarpwr_units = $prev_solarpwr_units + $occres_res->pwr_solarpwrunits;







				  $prev_dgpwr_units = $prev_dgpwr_units + $occres_res->dgset_dgunits;







				    $hr =$occres_res->dgset_pwrfailure;







			 $tarr = explode(":",$hr);







			 $hour = (int)$tarr[0];







			 $min = (int)$tarr[1];







			 $tmin = ($hour * 60) + $min;







			 $mincn = $mincn + $tmin;







				}







	  







	}







	







	 if($mincn > 0){







		    $hours = floor($mincn / 60);







             $minutes = ($mincn % 60);







			 $prev_powerfail = $hours.":".$minutes;







		 } 







	// BEFORE PREVIOUS







	 $mincn = 0;







	for($i=1;$i<=$b_prev_mn_days;$i++){







	    $reporton = $blastyear."-".$blastmonth."-".$i;







				$occupanymatch_fileds = ['reporton' => $reporton, 'site' => $site]; 







				$occres_cn = \App\Fmsdailyreport::where($occupanymatch_fileds)->count(); 







				if($occres_cn > 0){







				$occres_res = \App\Fmsdailyreport::where($occupanymatch_fileds)->first();







				  $b_prev_solarpwr_units = $b_prev_solarpwr_units + $occres_res->pwr_solarpwrunits;







				  $b_prev_dgpwr_units = $b_prev_dgpwr_units + $occres_res->dgset_dgunits;







				  







				   $hr =$occres_res->dgset_pwrfailure;







			 $tarr = explode(":",$hr);







			 $hour = (int)$tarr[0];







			 $min = (int)$tarr[1];







			 $tmin = ($hour * 60) + $min;







			 $mincn = $mincn + $tmin;







				}







	  







	} if($mincn > 0){







		    $hours = floor($mincn / 60);







             $minutes = ($mincn % 60);







			 $b_prev_powerfail = $hours.":".$minutes;







		 } 







	  	 







		$relations = [







			'cyear' => $segment2,







			'cmonth' =>date("F", mktime(0, 0, 0, $segment3, 10)),







			'prevyear' => $year,







			'prev_month' =>  date("F", mktime(0, 0, 0, $last_month, 10)),







			'bprevyear' => $blastyear,







			'bprev_month' =>  date("F", mktime(0, 0, 0, $blastmonth, 10)),







			'current' => array("solar"=> $cur_solarpwr_units, "dg" => $cur_dgpwr_units),







			'prev' => array("solar"=> $prev_solarpwr_units, "dg" => $prev_dgpwr_units),







			'b_prev' => array("solar"=> $b_prev_solarpwr_units, "dg" => $b_prev_dgpwr_units),







			'pwr_failure' => array("cur"=> $cur_powerfail, "prev" => $prev_powerfail, "bprev" =>$b_prev_powerfail ),







			];   







		  







		







		$pdf = PDF::loadView('mmrreports.mmr_power', $relations);







		//$pdf->setPaper('A4', 'landscape');







		$pdf->save(storage_path('/mmrfiles/file19.pdf')); 







		







		







	   // WATER CONSUMPTION







	   







	   







	$segment2 = $year;







	$segment3 = $month;







	$cur_hmws = 0;







	$prev_hmws = 0;







	$b_prev_hmws = 0;







	







	$cur_borewell = 0;







	$prev_borewell = 0;







	$b_prev_borewell = 0;







	







	$cur_tankers = 0;







	$prev_tankers = 0;







	$b_prev_tankers = 0;







	







	$cur_stp_avg_treat_water = 0;







	$prev_stp_avg_treat_water = 0;







	$b_prev_stp_avg_treat_water = 0;







	







	// CURRENT







	 $mincn = 0;







	for($i=1;$i<=$cur_mn_days;$i++){







	    $reporton = $segment2."-".$segment3."-".$i;







				$occupanymatch_fileds = ['reporton' => $reporton, 'site' => $site]; 







				$occres_cn = \App\Fmsdailyreport::where($occupanymatch_fileds)->count(); 







				if($occres_cn > 0){







				$occres_res = \App\Fmsdailyreport::where($occupanymatch_fileds)->first();







				 $cur_hmws = $cur_hmws + $occres_res->wsp_metro;







				 $cur_borewell = $cur_borewell + $occres_res->wsp_bores;   







				 $cur_tankers = $cur_tankers + $occres_res->wsp_tankers;







				 $cur_stp_avg_treat_water = $cur_stp_avg_treat_water + $occres_res->stp_avg_treat_water;







				  







				}







	}







	







	  







	// PREVIOUS







	 $mincn = 0;







	for($i=1;$i<=$prev_mn_days;$i++){







	    $reporton = $year."-".$last_month."-".$i;







				$occupanymatch_fileds = ['reporton' => $reporton, 'site' => $site]; 







				$occres_cn = \App\Fmsdailyreport::where($occupanymatch_fileds)->count(); 







				if($occres_cn > 0){







				$occres_res = \App\Fmsdailyreport::where($occupanymatch_fileds)->first();







				 $prev_hmws = $prev_hmws + $occres_res->wsp_metro;







				 $prev_borewell = $prev_borewell + $occres_res->wsp_bores; 







				 $prev_tankers = $prev_tankers + $occres_res->wsp_tankers;







				 $prev_stp_avg_treat_water = $prev_stp_avg_treat_water + $occres_res->stp_avg_treat_water;







				}







	  







	}







	  







	// BEFORE PREVIOUS







	 $mincn = 0;







	for($i=1;$i<=$b_prev_mn_days;$i++){







	    $reporton = $blastyear."-".$blastmonth."-".$i;







				$occupanymatch_fileds = ['reporton' => $reporton, 'site' => $site]; 







				$occres_cn = \App\Fmsdailyreport::where($occupanymatch_fileds)->count(); 







				if($occres_cn > 0){







				$occres_res = \App\Fmsdailyreport::where($occupanymatch_fileds)->first();







				 $b_prev_hmws = $b_prev_hmws + $occres_res->wsp_metro;







				 $b_prev_borewell = $b_prev_borewell + $occres_res->wsp_bores;  







				 $b_prev_tankers = $b_prev_tankers + $occres_res->wsp_tankers;







				 $b_prev_stp_avg_treat_water = $b_prev_stp_avg_treat_water + $occres_res->stp_avg_treat_water;







				}







	  







	}  







	  	 







		$relations = [







			'cyear' => $segment2,







			'cmonth' =>date("F", mktime(0, 0, 0, $segment3, 10)),







			'prevyear' => $year,







			'prev_month' =>  date("F", mktime(0, 0, 0, $last_month, 10)),







			'bprevyear' => $blastyear,







			'bprev_month' =>  date("F", mktime(0, 0, 0, $blastmonth, 10)),







			'current' => array("hmws"=> $cur_hmws, "borewell" => $cur_borewell, "tankers" => $cur_tankers, "stp" => $cur_stp_avg_treat_water),







			'prev' => array("hmws"=> $prev_hmws, "borewell" => $prev_borewell, "tankers" => $prev_tankers, "stp" => $prev_stp_avg_treat_water),







			'b_prev' => array("hmws"=> $b_prev_hmws, "borewell" => $b_prev_borewell, "tankers" => $b_prev_tankers, "stp" => $b_prev_stp_avg_treat_water),







			];   







		  







		







		$pdf = PDF::loadView('mmrreports.mmr_water', $relations);







		$pdf->save(storage_path('/mmrfiles/file20.pdf')); 







	







	







	







		







		// EB CONSMPTION







          







		//$pdf = PDF::loadView('mmrreports.mmr_mmrpowerfailureanalysis', $relations);







		//$pdf->setPaper('A4', 'landscape');







		//$pdf->save(storage_path('/mmrfiles/file7.pdf')); 







		







		//$pdf = PDF::loadView('mmrreports.mmr_mmraveragepowerconsumption', $relations);







		//$pdf->setPaper('A4', 'landscape');







		//$pdf->save(storage_path('/mmrfiles/file8.pdf')); 







		







		







		/*$pdf = PDF::loadView('mmrreports.mmr_mmrproposedmanpower', $relations);







		//$pdf->setPaper('A4', 'landscape');







		$pdf->save(storage_path('/mmrfiles/file3.pdf')); */







		







		







		$resullt = array();







		$matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year, 'type'=>'housekeeping']; 







		$resullt_cn = \App\Mmrhousekpact::where($matchfields_hskpact)->count();







		if($resullt_cn > 0){







			$resullt = \App\Mmrhousekpact::where($matchfields_hskpact)->get();







		}







		







		$resulltconsume = array();







		$matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year, 'type'=>'housekeeping']; 







		$resullt_consume_cn = \App\Mmrhousekconsume::where($matchfields_hskpact)->count();







		if($resullt_consume_cn > 0){







			$resulltconsume = \App\Mmrhousekconsume::where($matchfields_hskpact)->get();







		}







		  







		 $relations = [







			'year' => $year,







			'month' => $month, 







			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),







			'sitename' => get_sitename($site),







			'site' => $site,







			'resval' => $resullt,







			'resvalconsume' => $resulltconsume







        ];  







		  







		







		$pdf = PDF::loadView('mmrreports.mmr_mmrsofthousekeeping', $relations);







		//$pdf->setPaper('A4', 'landscape');







		$pdf->save(storage_path('/mmrfiles/file9.pdf')); 

		

		

		

		

		$resullt = array();

		

		

		$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

		

		

		$month = $uriSegments[3];



		$year = $uriSegments[2];





		$matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year, 'type'=>'hkcm']; 







		$resullt_cn = \App\Mmrhkcmmonthlyreport::where($matchfields_hskpact)->count();



		if($resullt_cn > 0){







			$resullt = \App\Mmrhkcmmonthlyreport::where($matchfields_hskpact)->get();







		}

		



		 $relations = [







			'year' => $year,







			'month' => $month, 







			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),







			'sitename' => get_sitename($site),







			'site' => $site,







			'resval' => $resullt







        ];  









	 	//echo "<pre>"; print_r($resullt); echo "</pre>"; exit; 



		  







		







		$pdf = PDF::loadView('mmrreports.mmr_mmrhkcriticalmachinery', $relations);







		//$pdf->setPaper('A4', 'landscape');







		$pdf->save(storage_path('/mmrfiles/file34.pdf')); 

		







		$resullt = array();







		$matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year, 'type'=>'horticulture']; 







		$resullt_cn = \App\Mmrhousekpact::where($matchfields_hskpact)->count();







		if($resullt_cn > 0){







			$resullt = \App\Mmrhousekpact::where($matchfields_hskpact)->get();







		}







		







		$resulltconsume = array();







		$matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year, 'type'=>'horticulture']; 







		$resullt_consume_cn = \App\Mmrhousekconsume::where($matchfields_hskpact)->count();







		if($resullt_consume_cn > 0){







			$resulltconsume = \App\Mmrhousekconsume::where($matchfields_hskpact)->get();







		}







		  







		 $relations = [







			'year' => $year,







			'month' => $month, 







			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),







			'sitename' => get_sitename($site),







			'site' => $site,







			'resval' => $resullt,







			'resvalconsume' => $resulltconsume







        ];  







	







	    $pdf = PDF::loadView('mmrreports.mmr_mmrsofthorticulture', $relations);







		//$pdf->setPaper('A4', 'landscape');







		$pdf->save(storage_path('/mmrfiles/file10.pdf')); 







		







		







		// MMR VIOLATION







		







		$resullt = array();







		$matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year, 'type'=>'violation']; 







		$resullt_cn = \App\Mmrmonthlyreport::where($matchfields_hskpact)->count();







		if($resullt_cn > 0){







			$resullt = \App\Mmrmonthlyreport::where($matchfields_hskpact)->get();







		}







		







		 $relations = [







			'year' => $year,







			'month' => $month, 







			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),







			'sitename' => get_sitename($site),







			'site' => $site,







			'resval' => $resullt







        ];  







	  







	    $pdf = PDF::loadView('mmrreports.mmr_violation', $relations);







		//$pdf->setPaper('A4', 'landscape');







		$pdf->save(storage_path('/mmrfiles/file11.pdf')); 







		







		







		// MMR Value Adds







		







		$resullt = array();







		$matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year, 'type'=>'valueadd']; 







		$resullt_cn = \App\Mmrmonthlyreport::where($matchfields_hskpact)->count();







		if($resullt_cn > 0){







			$resullt = \App\Mmrmonthlyreport::where($matchfields_hskpact)->get();







		}







		







		 $relations = [







			'year' => $year,







			'month' => $month, 







			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),







			'sitename' => get_sitename($site),







			'site' => $site,







			'resval' => $resullt







        ];  







	  







	    $pdf = PDF::loadView('mmrreports.mmr_valueadd', $relations);







		//$pdf->setPaper('A4', 'landscape');







		$pdf->save(storage_path('/mmrfiles/file12.pdf')); 







		







		//







		$resullt = array();







		$matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year, 'type'=>'suggestion']; 







		$resullt_cn = \App\Mmrmonthlyreport::where($matchfields_hskpact)->count();







		if($resullt_cn > 0){







			$resullt = \App\Mmrmonthlyreport::where($matchfields_hskpact)->get();







		}







		







		 $relations = [







			'year' => $year,







			'month' => $month, 







			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),







			'sitename' => get_sitename($site),







			'site' => $site,







			'resval' => $resullt







        ];  







	  







	    $pdf = PDF::loadView('mmrreports.mmr_suggestion', $relations);







		//$pdf->setPaper('A4', 'landscape');







		$pdf->save(storage_path('/mmrfiles/file13.pdf')); 







		







		  







		  







		







		// METRO WATER







		

		$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

		

		

		$month = $uriSegments[3];



		$year = $uriSegments[2];





		$wsp_cres = array();



		$wsp_cres1 = array();



		$wsp_match = ['month' => $month, 'year' => $year, 'site' =>$site]; 



	    $wsp_count = \App\Wspmtreport::where($wsp_match)->count();



	    if($wsp_count > 0){



			$wsp_cres = \App\Wspmtreport::where($wsp_match)->first();



	    }







	    $wsp_match1 = ['month' => $month, 'year' => $year, 'site' =>$site]; 



	    $wsp_count1 = \App\Wspmotreport::where($wsp_match1)->count();



	    if($wsp_count1 > 0){



			$wsp_cres1 = \App\Wspmotreport::where($wsp_match1)->first();



	    }

		

		



		$relations = [		 



		 	'report_on' => date($year."-".$month."-t"),







			'report_year' => $year,







			'report_month' => $month,







			'pbasys' => $wsp_cres,



			'pbasys1' => $wsp_cres1,



			



			'sitename' => get_sitename($site),



			];



		  $pdf = PDF::loadView('mmrreports.mmr_stp_inlet', $relations);

		  

		  $pdf->save(storage_path('/mmrfiles/file14.pdf')); 

		  

		  $pdf = PDF::loadView('mmrreports.mmr_stp_outlet', $relations);





		 

		

		$pdf->save(storage_path('/mmrfiles/file36.pdf'));    





		







		







		//Requisition







		







		$resullt = array();







		$matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year, 'type'=>'indentreq']; 







		$resullt_cn = \App\Mmrmonthlyreport::where($matchfields_hskpact)->count();







		if($resullt_cn > 0){







			$resullt = \App\Mmrmonthlyreport::where($matchfields_hskpact)->get();







		}







		







		 $relations = [







			'year' => $year,







			'month' => $month, 







			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),







			'sitename' => get_sitename($site),







			'site' => $site,







			'resval' => $resullt







        ];  







	  







	    $pdf = PDF::loadView('mmrreports.mmr_indentreq', $relations);







		//$pdf->setPaper('A4', 'landscape');







		$pdf->save(storage_path('/mmrfiles/file15.pdf')); 







		







		







		// APNA COMPLEX







		







	  







		$resullt = array();







		$matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year]; 







		$resullt_cn = \App\Apnacomplaintmisreport::where($matchfields_hskpact)->count();







		if($resullt_cn > 0){







			$resullt = \App\Apnacomplaintmisreport::where($matchfields_hskpact)->get();







		}







		







		 $relations = [







			'year' => $year,







			'month' => $month, 







			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),







			'sitename' => get_sitename($site),







			'site' => $site,







			'resval' => $resullt







        ];  







	  







	   // $pdf = PDF::loadView('mmrreports.mmr_indentreq', $relations);







		//$pdf->setPaper('A4', 'landscape');







	 //	$pdf->save(storage_path('/mmrfiles/file15.pdf')); 







	 







	 







	   // DRILLS





		

		$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

		

		

		$month = $uriSegments[3];



		$year = $uriSegments[2];







        $segment4 = $month;

		$segment3 = $year;

		$formfieldarray = array();

		$siteattrname = array();

		$flatres = array();

		$reportdate_val = "";







		$sitearr = array();







		$sitearr[] = $site;







		$dateString = $segment3.'-'.$segment4.'-04';







		//Last date of current month.







		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));







		$lastdatearr = explode("-",$lastDateOfMonth);







		$reportdate_val = $lastdatearr[2]."-".$segment4."-".$segment3;















	      if(Auth::user()->id == 1){







	      $sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');







		  $siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');







		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');







		  }else{







		    $role_id = Auth::user()->role_id;







			$emp_id = Auth::user()->emp_id;







			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();







			$siteinfo = $getemp_info->community;







			//$sitearr = explode(",",$siteinfo);







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







			 







			$mockdrillcount = count($indentrep_Array);







			







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







     	 	$pdf->save(storage_path('/mmrfiles/file17.pdf'));

		





        $segment4 = $month;







		$segment3 = $year;







		







		$formfieldarray = array();







		$siteattrname = array();







		$flatres = array();







		$sitearr = array();







		$sitearr[] = $site;







		$reportdate_val = "";







		$dateString = $segment3.'-'.$segment4.'-04';







		//Last date of current month.







		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));







		$lastdatearr = explode("-",$lastDateOfMonth);







		$reportdate_val = $lastdatearr[2]."-".$segment4."-".$segment3;















	      if(Auth::user()->id == 1){







	      $sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');







		  $siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');







		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');







		  }else{







		    $role_id = Auth::user()->role_id;







			$emp_id = Auth::user()->emp_id;







			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();







			$siteinfo = $getemp_info->community;







			//$sitearr = explode(",",$siteinfo);







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







				$pdf->save(storage_path('/mmrfiles/file18.pdf')); 







	







		







		// FIRE PREPARE DRILL







		







		







	







		// END FIRE PREPARE DRILL







		







		//APNA COMPLAINT







		







		$segment4 = $month;







		$segment3 = $year;







		







		$matchfields = ['month' => $segment4, 'year' => $segment3];







		$formfieldarray = array();







		$siteattrname = array();







		$flatres = array();







		$reportdate_val = "";







		$dateString = $segment3.'-'.$segment4.'-04';







		//Last date of current month.







		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));







		$lastdatearr = explode("-",$lastDateOfMonth);







		$reportdate_val = $lastdatearr[2]."-".$segment4."-".$segment3;







         $sitearr = array();







		 $sitearr[] = $site;







	      if(Auth::user()->id == 1){







	      $sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');







		  $siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');







		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');







		  







		  







		  }else{















		    $role_id = Auth::user()->role_id;







			$emp_id = Auth::user()->emp_id;







			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();







			$siteinfo = $getemp_info->community;







			//$sitearr = explode(",",$siteinfo);







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







			







			$fireprepare_cn = count($indentrep_Array);







			







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







		







	 	$pdf->save(storage_path('/mmrfiles/file16.pdf')); 







		







		







		







		// ELECTRO MECHANICAL







	







		$segment4 = $month;







		$segment3 = $year;







		$formfieldarray = array();







		$siteattrname = array();







		$flatres = array(); 







		$ref_overall = array();







		$ref_overall_temp = array();







		







		$sitearr = array();







		$sitearr[] = $site;







		







		$reportdate_val = "";







		$dateString = $segment3.'-'.$segment4.'-04';







		//Last date of current month.







		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));







		$lastdatearr = explode("-",$lastDateOfMonth);







		$reportdate_val = $lastdatearr[2]."-".$segment4."-".$segment3;







		







		







		







		







		 if(Auth::user()->id == 1){







	      $sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');







		  $siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');







		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');







		  







		  







		  }else{















		    $role_id = Auth::user()->role_id;







			$emp_id = Auth::user()->emp_id;







			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();







			$siteinfo = $getemp_info->community;







			//$sitearr = explode(",",$siteinfo);







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







			







		///////	 $pdf = PDF::loadView('misprints.electomechanical', $relations);  















      







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







		                       $pdf->save(storage_path('/mmrfiles/mistrafficprint'.$ikey.'.pdf'));  







						  







						 







						  }







						  







						}  







						







						







						







							$pdf = new \PDFMerger();







						







						 foreach ($issuecount as $ikey => $issuecn) {







						 







						   $pdf->addPDF(storage_path() .'/mmrfiles/mistrafficprint'.$ikey.'.pdf', 'all');







						   







						 }  







						 $pdf->merge('file', storage_path('/mmrfiles/file21.pdf'));







			  







			  







			  // END LATEST DOWNLOAD







			   		















		 // return view('misprints.electomechanical', $relations);















		







		// END ELECTRO MECHANICAL







		







		







		







		// END APNA COMPLAINT   







		







		/* $pdf = PDF::loadView('mmrreports.mmr_mmrsoftothers', $relations);







		//$pdf->setPaper('A4', 'landscape');







		$pdf->save(storage_path('/mmrfiles/file11.pdf')); */







	







		 







		   		$pdfFile0Path = storage_path() . '/mmrfiles/welcome.pdf';







				$pdfFile1Path = storage_path() . '/mmrfiles/file1.pdf';







				$pdfFile2Path = storage_path() . '/mmrfiles/file2.pdf';







				$pdfFile3Path = storage_path() . '/mmrfiles/file3.pdf';







				$pdfFile4Path = storage_path() . '/mmrfiles/file4.pdf';







				$pdfFile5Path = storage_path() . '/mmrfiles/file5.pdf';







				$pdfFile6Path = storage_path() . '/mmrfiles/file6.pdf';







				//$pdfFile7Path = storage_path() . '/mmrfiles/file7.pdf';







				//$pdfFile8Path = storage_path() . '/mmrfiles/file8.pdf';







				$pdfFile9Path = storage_path() . '/mmrfiles/file9.pdf';







				$pdfFile10Path = storage_path() . '/mmrfiles/file10.pdf';







				$pdfFile25Path = storage_path() . '/mmrfiles/mmrwcgraph.pdf';







				$pdfFile11Path = storage_path() . '/mmrfiles/file11.pdf';







				$pdfFile12Path = storage_path() . '/mmrfiles/file12.pdf';







				$pdfFile13Path = storage_path() . '/mmrfiles/file13.pdf';







				$pdfFile14Path = storage_path() . '/mmrfiles/file14.pdf';







				$pdfFile15Path = storage_path() . '/mmrfiles/file15.pdf';







				$pdfFile16Path = storage_path() . '/mmrfiles/file16.pdf';







				$pdfFile17Path = storage_path() . '/mmrfiles/file17.pdf';







				$pdfFile18Path = storage_path() . '/mmrfiles/file18.pdf';







				$pdfFile19Path = storage_path() . '/mmrfiles/file19.pdf';







				$pdfFile20Path = storage_path() . '/mmrfiles/file20.pdf';







				$pdfFile21Path = storage_path() . '/mmrfiles/file21.pdf';







				$pdfFile22Path = storage_path() . '/mmrfiles/file22.pdf';







				$pdfFile23Path = storage_path() . '/mmrfiles/thankyou.pdf';







				$pdfFile26Path = storage_path() . '/mmrfiles/file26.pdf';







				$pdfFile27Path = storage_path() . '/mmrfiles/file27.pdf';







				$pdfFile28Path = storage_path() . '/mmrfiles/file28.pdf';







				$pdfFile29Path = storage_path() . '/mmrfiles/file29.pdf';







				$pdfFile30Path = storage_path() . '/mmrfiles/file30.pdf';







				$pdfFile31Path = storage_path() . '/mmrfiles/file31.pdf';







				$pdfFile32Path = storage_path() . '/mmrfiles/file32.pdf';







				$pdfFile33Path = storage_path() . '/mmrfiles/file33.pdf';

				

				

				$pdfFile34Path = storage_path() . '/mmrfiles/file34.pdf';

				

				$pdfFile35Path = storage_path() . '/mmrfiles/file35.pdf';				

				

				$pdfFile36Path = storage_path() . '/mmrfiles/file36.pdf';





				$pdf = new \PDFMerger();







				







				//ss//$pdf->addPDF($pdfFilestartPath, 'all');







				//ss//$pdf->addPDF($pdfFileindexPath, 'all');







				$pdf->addPDF($pdfFile0Path, 'all');				







				$pdf->addPDF($pdfFile1Path, 'all');







				$pdf->addPDF($pdfFile2Path, 'all');







				$pdf->addPDF($pdfFile3Path, 'all');







				//$pdf->addPDF($pdfFile22Path, 'all');







				$pdf->addPDF($pdfFile4Path, 'all');







				$pdf->addPDF($pdfFile21Path, 'all');







				$pdf->addPDF($pdfFile33Path, 'all');







				$pdf->addPDF($pdfFile6Path, 'all');







				$pdf->addPDF($pdfFile19Path, 'all');    







				$pdf->addPDF($pdfFile26Path, 'all');    







				$pdf->addPDF($pdfFile27Path, 'all');    







				$pdf->addPDF($pdfFile28Path, 'all');    







				$pdf->addPDF($pdfFile29Path, 'all');    







				$pdf->addPDF($pdfFile32Path, 'all');  

				

				$pdf->addPDF($pdfFile35Path, 'all'); 







				$pdf->addPDF($pdfFile14Path, 'all');

				

				$pdf->addPDF($pdfFile36Path, 'all');







				$pdf->addPDF($pdfFile20Path, 'all');  	







				if((int)$mockdrillcount > 0) { $pdf->addPDF($pdfFile17Path, 'all'); }







				if((int)$fireprepare_cn > 0) { $pdf->addPDF($pdfFile18Path, 'all'); }







				$pdf->addPDF($pdfFile30Path, 'all');







				$pdf->addPDF($pdfFile16Path, 'all');			







				$pdf->addPDF($pdfFile5Path, 'all');	







				$pdf->addPDF($pdfFile9Path, 'all');		

				

				

				$pdf->addPDF($pdfFile34Path, 'all');		







				$pdf->addPDF($pdfFile31Path, 'all');







				//$pdf->addPDF($pdfFile7Path, 'all');







				//$pdf->addPDF($pdfFile8Path, 'all');







				$pdf->addPDF($pdfFile10Path, 'all');







				$pdf->addPDF($pdfFile25Path, 'all');







				$pdf->addPDF($pdfFile11Path, 'all');







				$pdf->addPDF($pdfFile12Path, 'all');







				$pdf->addPDF($pdfFile13Path, 'all');







				$pdf->addPDF($pdfFile15Path, 'all');







				$pdf->addPDF($pdfFile23Path, 'all');















				







				







				







				$dwnfilename = "MMR_".date("F", mktime(0, 0, 0, $segment3, 10))."-".$segment2.".pdf";				 







				$pdf->merge('download', $dwnfilename);







						  







  







    }







	







	







	 public function downloadoverallmmrlatestbkp(Request $request)















    {







	ini_set('max_execution_time', 300);







	ini_set('memory_limit', '256M');







	







	$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));







	







//echo $uriSegments[1];







//echo $uriSegments[2]; 







//echo $uriSegments[3];







	  







	$segment1 = $uriSegments[1]; 







	$segment2 = $uriSegments[2];







	$segment3 = $uriSegments[3];







	$site = $uriSegments[4];







	







		/*$segment1 = Request::segment(1); 







		$segment2 = Request::segment(2);







		$segment3 = Request::segment(3);







		$site = Request::segment(4);*/







		







		$mn = date("F", mktime(0, 0, 0, $segment3, 10));







		







		  $relations = [







			'report_month' => $mn,







			'report_year' => $segment2,







			];   















		$pdf = PDF::loadView('mmrreports.mmr_mmrmonthreports', $relations);







		//$pdf->setPaper('A4', 'landscape');







		$pdf->save(storage_path('/mmrfiles/file1.pdf')); 







		







		$pdf = PDF::loadView('mmrreports.mmr_mmrscopenature', $relations);







		//$pdf->setPaper('A4', 'landscape');







		$pdf->save(storage_path('/mmrfiles/file2.pdf')); 







	







	







		$pdf = PDF::loadView('mmrreports.mmr_mmrproposedmanpower', $relations);







		//$pdf->setPaper('A4', 'landscape');







		$pdf->save(storage_path('/mmrfiles/file3.pdf')); 







		







		$pdf = PDF::loadView('mmrreports.mmr_mmrtechnicalservices', $relations);







		//$pdf->setPaper('A4', 'landscape');







		$pdf->save(storage_path('/mmrfiles/file4.pdf')); 







		







		$pdf = PDF::loadView('mmrreports.mmr_mmrinitiativetaken', $relations);







		//$pdf->setPaper('A4', 'landscape');







		$pdf->save(storage_path('/mmrfiles/file5.pdf')); 







		







		$pdf = PDF::loadView('mmrreports.mmr_mmrplannedperventives', $relations);







		//$pdf->setPaper('A4', 'landscape');







		$pdf->save(storage_path('/mmrfiles/file6.pdf')); 







		







		$pdf = PDF::loadView('mmrreports.mmr_mmrpowerfailureanalysis', $relations);







		//$pdf->setPaper('A4', 'landscape');







		$pdf->save(storage_path('/mmrfiles/file7.pdf')); 







		







		$pdf = PDF::loadView('mmrreports.mmr_mmraveragepowerconsumption', $relations);







		//$pdf->setPaper('A4', 'landscape');







		$pdf->save(storage_path('/mmrfiles/file8.pdf')); 







		







		$pdf = PDF::loadView('mmrreports.mmr_mmrsofthousekeeping', $relations);







		//$pdf->setPaper('A4', 'landscape');







		$pdf->save(storage_path('/mmrfiles/file9.pdf')); 







	







	    $pdf = PDF::loadView('mmrreports.mmr_mmrsofthorticulture', $relations);







		//$pdf->setPaper('A4', 'landscape');







		$pdf->save(storage_path('/mmrfiles/file10.pdf')); 







		







		 $pdf = PDF::loadView('mmrreports.mmr_mmrsoftothers', $relations);







		//$pdf->setPaper('A4', 'landscape');







		$pdf->save(storage_path('/mmrfiles/file11.pdf')); 







	







		 







		 







				$pdfFile1Path = storage_path() . '/mmrfiles/file1.pdf';







				$pdfFile2Path = storage_path() . '/mmrfiles/file2.pdf';







				$pdfFile3Path = storage_path() . '/mmrfiles/file3.pdf';







				$pdfFile4Path = storage_path() . '/mmrfiles/file4.pdf';







				$pdfFile5Path = storage_path() . '/mmrfiles/file5.pdf';







				$pdfFile6Path = storage_path() . '/mmrfiles/file6.pdf';







				$pdfFile7Path = storage_path() . '/mmrfiles/file7.pdf';







				$pdfFile8Path = storage_path() . '/mmrfiles/file8.pdf';







				$pdfFile9Path = storage_path() . '/mmrfiles/file9.pdf';







				$pdfFile10Path = storage_path() . '/mmrfiles/file10.pdf';







				$pdfFile11Path = storage_path() . '/mmrfiles/file11.pdf';







				







					







				$pdf = new \PDFMerger();







				







				//ss//$pdf->addPDF($pdfFilestartPath, 'all');







				//ss//$pdf->addPDF($pdfFileindexPath, 'all');







				$pdf->addPDF($pdfFile1Path, 'all');







				$pdf->addPDF($pdfFile2Path, 'all');







				$pdf->addPDF($pdfFile3Path, 'all');







				$pdf->addPDF($pdfFile4Path, 'all');







				$pdf->addPDF($pdfFile5Path, 'all');







				







				$pdf->addPDF($pdfFile6Path, 'all');







				$pdf->addPDF($pdfFile7Path, 'all');







				$pdf->addPDF($pdfFile8Path, 'all');







				$pdf->addPDF($pdfFile9Path, 'all');







				$pdf->addPDF($pdfFile10Path, 'all');







				$pdf->addPDF($pdfFile11Path, 'all');







				 







				 







				







				$dwnfilename = "MMR_".date("F", mktime(0, 0, 0, $segment3, 10))."-".$segment2.".pdf";				 







				$pdf->merge('download', $dwnfilename);







						  







  







    }







	







	







		 public function downloadoverallmmrold(Request $request)















    { 







	ini_set('max_execution_time', 300);







	ini_set('memory_limit', '256M');







	







	$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));







	







//echo $uriSegments[1];







//echo $uriSegments[2]; 







//echo $uriSegments[3];







	







	$segment1 = $uriSegments[1]; 







	$segment2 = $uriSegments[2];







	$segment3 = $uriSegments[3];







	$site = $uriSegments[4];







	







		/*$segment1 = Request::segment(1); 







		$segment2 = Request::segment(2);







		$segment3 = Request::segment(3);







		$site = Request::segment(4);*/







		







		$mn = date("F", mktime(0, 0, 0, $segment3, 10));







		







		  $relations = [







			'report_month' => $mn,







			'report_year' => $segment2,







			];   















		$pdf = PDF::loadView('mmrreports.mmr_index', $relations);







		$pdf->setPaper('A4', 'landscape');







		$pdf->save(storage_path('/mmrfiles/index.pdf')); 







		







		







		$month = $segment3;







		$year = $segment2;







		$last_month = $month-1%12;







		







		if($last_month==0){







		  $year = $year-1;







		}







		







		if($last_month==0){







		  $last_month = 12;







		}







		















		$blastmonth = $last_month-1%12;







		 $blastyear = $year;







		if($blastmonth==0){







		  $blastyear = $blastyear-1;







		}







		







		if($blastmonth==0){







		  $blastmonth = 12;







		}







		 







       $curdate = $segment2."-".$segment3."-"."01";







	  







	   $prev_date = $year."-".$last_month."-"."01";







	  







	   $b_prev_date = $blastyear."-".$blastmonth."-"."01";







	  







	







	$curmonth_day_power_consump = array();







	







	 $cur_mn_days = date("t",strtotime($curdate));  







	 $prev_mn_days = date("t",strtotime($prev_date));  







	 $b_prev_mn_days = date("t",strtotime($b_prev_date));  







	







	$cur_solarpwr_units = 0;







	$prev_solarpwr_units = 0;







	$b_prev_solarpwr_units = 0;







	







	$cur_dgpwr_units = 0;







	$prev_dgpwr_units = 0;







	$b_prev_dgpwr_units = 0;







	







	$cur_ebpwr_units = 0;







	$prev_ebpwr_units = 0;







	$b_prev_ebpwr_units = 0;







	$cur_powerfail = 0;







	$prev_powerfail = 0;







	$b_prev_powerfail = 0;







	







	// CURRENT







	 $mincn = 0;







	for($i=1;$i<=$cur_mn_days;$i++){







	    $reporton = $segment2."-".$segment3."-".$i;







				$occupanymatch_fileds = ['reporton' => $reporton, 'site' => $site]; 







				$occres_cn = \App\Fmsdailyreport::where($occupanymatch_fileds)->count(); 







				if($occres_cn > 0){







				$occres_res = \App\Fmsdailyreport::where($occupanymatch_fileds)->first();







				  $cur_solarpwr_units = $cur_solarpwr_units + $occres_res->pwr_solarpwrunits;







				  $cur_dgpwr_units = $cur_dgpwr_units + $occres_res->dgset_dgunits;







				  







				  $hr =$occres_res->dgset_pwrfailure;







			 $tarr = explode(":",$hr);







			 $hour = (int)$tarr[0];







			 $min = (int)$tarr[1];







			 $tmin = ($hour * 60) + $min;







			 $mincn = $mincn + $tmin;







				}







	  







	}







	







	  if($mincn > 0){







		    $hours = floor($mincn / 60);







             $minutes = ($mincn % 60);







			 $cur_powerfail = $hours.":".$minutes;







		 } 







	// PREVIOUS







	 $mincn = 0;







	for($i=1;$i<=$prev_mn_days;$i++){







	    $reporton = $year."-".$last_month."-".$i;







				$occupanymatch_fileds = ['reporton' => $reporton, 'site' => $site]; 







				$occres_cn = \App\Fmsdailyreport::where($occupanymatch_fileds)->count(); 







				if($occres_cn > 0){







				$occres_res = \App\Fmsdailyreport::where($occupanymatch_fileds)->first();







				  $prev_solarpwr_units = $prev_solarpwr_units + $occres_res->pwr_solarpwrunits;







				  $prev_dgpwr_units = $prev_dgpwr_units + $occres_res->dgset_dgunits;







				    $hr =$occres_res->dgset_pwrfailure;







			 $tarr = explode(":",$hr);







			 $hour = (int)$tarr[0];







			 $min = (int)$tarr[1];







			 $tmin = ($hour * 60) + $min;







			 $mincn = $mincn + $tmin;







				}







	  







	}







	







	 if($mincn > 0){







		    $hours = floor($mincn / 60);







             $minutes = ($mincn % 60);







			 $prev_powerfail = $hours.":".$minutes;







		 } 







	// BEFORE PREVIOUS







	 $mincn = 0;







	for($i=1;$i<=$b_prev_mn_days;$i++){







	    $reporton = $blastyear."-".$blastmonth."-".$i;







				$occupanymatch_fileds = ['reporton' => $reporton, 'site' => $site]; 







				$occres_cn = \App\Fmsdailyreport::where($occupanymatch_fileds)->count(); 







				if($occres_cn > 0){







				$occres_res = \App\Fmsdailyreport::where($occupanymatch_fileds)->first();







				  $b_prev_solarpwr_units = $b_prev_solarpwr_units + $occres_res->pwr_solarpwrunits;







				  $b_prev_dgpwr_units = $b_prev_dgpwr_units + $occres_res->dgset_dgunits;







				  







				   $hr =$occres_res->dgset_pwrfailure;







			 $tarr = explode(":",$hr);







			 $hour = (int)$tarr[0];







			 $min = (int)$tarr[1];







			 $tmin = ($hour * 60) + $min;







			 $mincn = $mincn + $tmin;







				}







	  







	} if($mincn > 0){







		    $hours = floor($mincn / 60);







             $minutes = ($mincn % 60);







			 $b_prev_powerfail = $hours.":".$minutes;







		 } 







	  	 







		$relations = [







			'cyear' => $segment2,







			'cmonth' =>date("F", mktime(0, 0, 0, $segment3, 10)),







			'prevyear' => $year,







			'prev_month' =>  date("F", mktime(0, 0, 0, $last_month, 10)),







			'bprevyear' => $blastyear,







			'bprev_month' =>  date("F", mktime(0, 0, 0, $blastmonth, 10)),







			'current' => array("solar"=> $cur_solarpwr_units, "dg" => $cur_dgpwr_units),







			'prev' => array("solar"=> $prev_solarpwr_units, "dg" => $prev_dgpwr_units),







			'b_prev' => array("solar"=> $b_prev_solarpwr_units, "dg" => $b_prev_dgpwr_units),







			'pwr_failure' => array("cur"=> $cur_powerfail, "prev" => $prev_powerfail, "bprev" =>$b_prev_powerfail ),







			];   







		  







		







		$pdf = PDF::loadView('mmrreports.mmr_power', $relations);







		$pdf->setPaper('A4', 'landscape');







		$pdf->save(storage_path('/mmrfiles/power.pdf')); 







		







		//return view('mmrreports.mmr_power',$relations);







	







		







  // WATER







		







	$cur_hmws = 0;







	$prev_hmws = 0;







	$b_prev_hmws = 0;







	







	$cur_borewell = 0;







	$prev_borewell = 0;







	$b_prev_borewell = 0;







	







	$cur_tankers = 0;







	$prev_tankers = 0;







	$b_prev_tankers = 0;







	







	$cur_stp_avg_treat_water = 0;







	$prev_stp_avg_treat_water = 0;







	$b_prev_stp_avg_treat_water = 0;







	







	// CURRENT







	 $mincn = 0;







	for($i=1;$i<=$cur_mn_days;$i++){







	    $reporton = $segment2."-".$segment3."-".$i;







				$occupanymatch_fileds = ['reporton' => $reporton, 'site' => $site]; 







				$occres_cn = \App\Fmsdailyreport::where($occupanymatch_fileds)->count(); 







				if($occres_cn > 0){







				$occres_res = \App\Fmsdailyreport::where($occupanymatch_fileds)->first();







				 $cur_hmws = $cur_hmws + $occres_res->wsp_metro;







				 $cur_borewell = $cur_borewell + $occres_res->wsp_bores;   







				 $cur_tankers = $cur_tankers + $occres_res->wsp_tankers;







				 $cur_stp_avg_treat_water = $cur_stp_avg_treat_water + $occres_res->stp_avg_treat_water;







				  







				}







	}







	







	  







	// PREVIOUS







	 $mincn = 0;







	for($i=1;$i<=$prev_mn_days;$i++){







	    $reporton = $year."-".$last_month."-".$i;







				$occupanymatch_fileds = ['reporton' => $reporton, 'site' => $site]; 







				$occres_cn = \App\Fmsdailyreport::where($occupanymatch_fileds)->count(); 







				if($occres_cn > 0){







				$occres_res = \App\Fmsdailyreport::where($occupanymatch_fileds)->first();







				 $prev_hmws = $prev_hmws + $occres_res->wsp_metro;







				 $prev_borewell = $prev_borewell + $occres_res->wsp_bores; 







				 $prev_tankers = $prev_tankers + $occres_res->wsp_tankers;







				 $prev_stp_avg_treat_water = $prev_stp_avg_treat_water + $occres_res->stp_avg_treat_water;







				}







	  







	}







	  







	// BEFORE PREVIOUS







	 $mincn = 0;







	for($i=1;$i<=$b_prev_mn_days;$i++){







	    $reporton = $blastyear."-".$blastmonth."-".$i;







				$occupanymatch_fileds = ['reporton' => $reporton, 'site' => $site]; 







				$occres_cn = \App\Fmsdailyreport::where($occupanymatch_fileds)->count(); 







				if($occres_cn > 0){







				$occres_res = \App\Fmsdailyreport::where($occupanymatch_fileds)->first();







				 $b_prev_hmws = $b_prev_hmws + $occres_res->wsp_metro;







				 $b_prev_borewell = $b_prev_borewell + $occres_res->wsp_bores;  







				 $b_prev_tankers = $b_prev_tankers + $occres_res->wsp_tankers;







				 $b_prev_stp_avg_treat_water = $b_prev_stp_avg_treat_water + $occres_res->stp_avg_treat_water;







				}







	  







	}  







	  	 







		$relations = [







			'cyear' => $segment2,







			'cmonth' =>date("F", mktime(0, 0, 0, $segment3, 10)),







			'prevyear' => $year,







			'prev_month' =>  date("F", mktime(0, 0, 0, $last_month, 10)),







			'bprevyear' => $blastyear,







			'bprev_month' =>  date("F", mktime(0, 0, 0, $blastmonth, 10)),







			'current' => array("hmws"=> $cur_hmws, "borewell" => $cur_borewell, "tankers" => $cur_tankers, "stp" => $cur_stp_avg_treat_water),







			'prev' => array("hmws"=> $prev_hmws, "borewell" => $prev_borewell, "tankers" => $prev_tankers, "stp" => $prev_stp_avg_treat_water),







			'b_prev' => array("hmws"=> $b_prev_hmws, "borewell" => $b_prev_borewell, "tankers" => $b_prev_tankers, "stp" => $b_prev_stp_avg_treat_water),







			];   







		  







		







		$pdf = PDF::loadView('mmrreports.mmr_water', $relations);







		$pdf->setPaper('A4', 'landscape');







		$pdf->save(storage_path('/mmrfiles/water.pdf')); 























		$pdf = PDF::loadView('mmrreports.mmr_contents', $relations);







		$pdf->setPaper('A4', 'landscape');







		$pdf->save(storage_path('/mmrfiles/content.pdf')); 







		







		$pdf = PDF::loadView('mmrreports.mmr_engineeringservices', $relations);







		$pdf->setPaper('A4', 'landscape');







		$pdf->save(storage_path('/mmrfiles/mmr_engineeringservices.pdf')); 







		







	







		







		   







		







		//NIl ,Nil, NIl	







		 $mincn = 0;







		 $break_down_txt = array();







	for($i=1;$i<=$cur_mn_days;$i++){







	    $reporton = $segment2."-".$segment3."-".$i;







				$occupanymatch_fileds = ['reporton' => $reporton, 'site' => $site]; 







				$occres_cn = \App\Fmsdailyreport::where($occupanymatch_fileds)->count(); 







				if($occres_cn > 0){







				$occres_res = \App\Fmsdailyreport::where($occupanymatch_fileds)->first();







				  $break_down =  $occres_res->break_down_any;







				 if($break_down == 'NIL' || $break_down == 'Nil' || $break_down == 'NIl') continue;







				 else 







				// if($break_down_txt) $break_down_txt .="<br/>";







				 $break_down_txt[]= $occres_res->break_down_any;







				}







	}  







	







	$relations = [







			'break_down_txt' => $break_down_txt,







			];   







		$pdf = PDF::loadView('mmrreports.mmr_mmrmajorincidents', $relations);







		$pdf->setPaper('A4', 'landscape');







		$pdf->save(storage_path('/mmrfiles/mmr_mmrmajorincidents.pdf')); 







		







	   $pdf = PDF::loadView('mmrreports.mmr_mmrsoftservices', $relations);







		$pdf->setPaper('A4', 'landscape');







		$pdf->save(storage_path('/mmrfiles/mmr_mmrsoftservices.pdf')); 







		







		 







				$pdfFile1Path = storage_path() . '/mmrfiles/index.pdf';







				$pdfFile2Path = storage_path() . '/mmrfiles/power.pdf';







				$pdfFile3Path = storage_path() . '/mmrfiles/water.pdf';







				$pdfFile4Path = storage_path() . '/mmrfiles/content.pdf';







				$pdfFile5Path = storage_path() . '/mmrfiles/mmr_engineeringservices.pdf';







				$pdfFile6Path = storage_path() . '/mmrfiles/mmr_mmrmajorincidents.pdf';







				$pdfFile7Path = storage_path() . '/mmrfiles/mmr_mmrsoftservices.pdf';







				







					







				$pdf = new \PDFMerger();







				







				//ss//$pdf->addPDF($pdfFilestartPath, 'all');







				//ss//$pdf->addPDF($pdfFileindexPath, 'all');







				$pdf->addPDF($pdfFile1Path, 'all');







				$pdf->addPDF($pdfFile4Path, 'all');







				$pdf->addPDF($pdfFile5Path, 'all');







				$pdf->addPDF($pdfFile2Path, 'all');







				$pdf->addPDF($pdfFile3Path, 'all');







				$pdf->addPDF($pdfFile6Path, 'all');







				$pdf->addPDF($pdfFile7Path, 'all');







				







				 







				







				$dwnfilename = "MMR_".date("F", mktime(0, 0, 0, $month, 10))."-".$year.".pdf";				 







				$pdf->merge('download', $dwnfilename);







						  







  







    }







	







	







	 public function updatemmr_bkp()















    { 







	   







       // $assets = Audit::all();







		$site = $_GET['site'];







		$month = $_GET['month'];







		$year = $_GET['year'];







	   







	    $relations = [















            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),







			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', ''),







			'sites_attr_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id'),







			'site' => $site,







			'month' => $month,







			'year' => $year,















        ];  







		







		 return view('mmrreports.mmrupdate',$relations);















    }  







	







	







	 public function updatemmr()















    { 







	   







       // $assets = Audit::all();







		$site = $_GET['site'];







		$month = $_GET['month'];







		$year = $_GET['year'];







	   







	    $relations = [















            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),







			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', ''),







			'sites_attr_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id'),







			'site' => $site,







			'month' => $month,







			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),







			'sitename' => get_sitename($site),







			'year' => $year,















        ];  







		







		 return view('mmrreports.mmrupdate',$relations);















    }  







	







	







	 public function geteditmmr(Request $request)















    { 







	  







	  $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));















    //echo "<pre>";print_r($uriSegments);echo "</pre>";







	   $formfieldarray = array();







	  $site = $uriSegments[5];







	  $year = $uriSegments[3];







	  $month = $uriSegments[4];







	  $type = $uriSegments[2];







	  







	  if($type == 1){







	  







	   $reason_text = "";







	   $ebpower = "";







	   







	    $matchfields_mmr_eb = ['site' => $site, 'mmr_type' => $type, 'month' =>$month, 'year' => $year]; 







		//print_r($matchfields_mmr_eb);







	    $mmr_count = \App\Mmrvalidationreport::where($matchfields_mmr_eb)->count();







		if($mmr_count > 0){







		$mmr_res = \App\Mmrvalidationreport::where($matchfields_mmr_eb)->first();	







		$ebpower = $mmr_res->ebpower;	 







		$reason_text = $mmr_res->reason_text;







		} 







		







		







		  $relations = [







			'year' => $year,







			'month' => $month, 







			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),







			'sitename' => get_sitename($site),







			'site' => $site,







			'mmr_type' => $type,







			'ebpower' => $ebpower,







        ];     







		     







		return view('mmrreports.edittemp.ebpowernew', $relations);







	  







	  }







	  else if($type == 2){







	    $mmr_res  = array();







	    $matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year, 'type' => 'housekeeping']; 







		//print_r($matchfields_mmr_eb);







	    $mmr_count = \App\Mmrhousekpact::where($matchfields_hskpact)->count();







		if($mmr_count > 0){







		$mmr_res = \App\Mmrhousekpact::where($matchfields_hskpact)->get();		







	   }







	  







	  $relations = [







			'year' => $year,







			'month' => $month, 







			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),







			'sitename' => get_sitename($site),







			'site' => $site,







			'mmr_type' => $type,







			'pbasys' => $mmr_res,







        ];     







		     







	  







	  return view('mmrreports.edittemp.housekeepact', $relations);







	  







	  }



	  else if($type == 27){







	    $mmr_res  = array();







	    $matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year, 'type' => 'technical_activities']; 







		//print_r($matchfields_mmr_eb);







	    $mmr_count = \App\Mmrhousekpact::where($matchfields_hskpact)->count();







		if($mmr_count > 0){







		$mmr_res = \App\Mmrhousekpact::where($matchfields_hskpact)->get();		







	   }







	  







	  $relations = [







			'year' => $year,







			'month' => $month, 







			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),







			'sitename' => get_sitename($site),







			'site' => $site,







			'mmr_type' => $type,







			'pbasys' => $mmr_res,







        ];     







		     







	  







	  return view('mmrreports.edittemp.techactivities', $relations);







	  







	  }


	  else if($type == 3){







	  







	     $mmr_res  = array();







	    $matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year,'type' => 'housekeeping']; 







		//print_r($matchfields_mmr_eb);







	    $mmr_count = \App\Mmrhousekconsume::where($matchfields_hskpact)->count();







		if($mmr_count > 0){







		$mmr_res = \App\Mmrhousekconsume::where($matchfields_hskpact)->get();		







	   }







	  $relations = [







			'year' => $year,







			'month' => $month, 







			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),







			'sitename' => get_sitename($site),







			'site' => $site,







			'mmr_type' => $type,







			'pbasys' => $mmr_res,







        ];     







		    







	  return view('mmrreports.edittemp.housekconsume', $relations);







	    







	   }else if($type == 4){







	  







	     $mmr_res  = array();







	    $matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year,'type' => 'horticulture']; 







		//print_r($matchfields_mmr_eb);







	    $mmr_count = \App\Mmrhousekpact::where($matchfields_hskpact)->count();







		if($mmr_count > 0){







		$mmr_res = \App\Mmrhousekpact::where($matchfields_hskpact)->get();		







	   }







	  $relations = [







			'year' => $year,







			'month' => $month, 







			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),







			'sitename' => get_sitename($site),







			'site' => $site,







			'mmr_type' => $type,







			'pbasys' => $mmr_res,







        ];     







		    







	  return view('mmrreports.edittemp.horticultureact', $relations);







	    







	  }else if($type == 5){







	  







	     $mmr_res  = array();







	    $matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year,'type' => 'horticulture']; 







		//print_r($matchfields_mmr_eb);







	    $mmr_count = \App\Mmrhousekconsume::where($matchfields_hskpact)->count();







		if($mmr_count > 0){







		$mmr_res = \App\Mmrhousekconsume::where($matchfields_hskpact)->get();		







	   }







	  $relations = [







			'year' => $year,







			'month' => $month, 







			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),







			'sitename' => get_sitename($site),







			'site' => $site,







			'mmr_type' => $type,







			'pbasys' => $mmr_res,







        ];     







		    







	  return view('mmrreports.edittemp.horticultureconsume', $relations);







	    







	   }else if($type == 6){







	  







	     $mmr_res  = array();







	    $matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year,'type' => 'initiative']; 







		//print_r($matchfields_mmr_eb);







	    $mmr_count = \App\Mmrhousekpact::where($matchfields_hskpact)->count();







		if($mmr_count > 0){







		$mmr_res = \App\Mmrhousekpact::where($matchfields_hskpact)->get();		







	   }







	  $relations = [







			'year' => $year,







			'month' => $month, 







			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),







			'sitename' => get_sitename($site),







			'site' => $site,







			'mmr_type' => $type,







			'pbasys' => $mmr_res,







        ];     







		      







	  return view('mmrreports.edittemp.initiativetaken', $relations);







	    







	   }
	   
	   else if($type == 7)
	   {
	   		
				   $data = array();
				   $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));	
			
				   $segment2 = $uriSegments[5]; 
			
				   $segment4 =  $uriSegments[3]; 
			
				   $segment5 =  $uriSegments[4]; 
				   
				   $matchfields = ['site' => $segment2,'month'=>$segment5,'year'=>$segment4]; 
				   
				   $mmr_sres_cn = \App\Manpowersvalidation::where($matchfields)->count();
				   if($mmr_sres_cn>0)
				   {
						$mmr_sres_res = \App\Manpowersvalidation::where($matchfields)->orderBy('sorder', 'asc')->get();	
				  		foreach($mmr_sres_res as $mkey=>$mres)
						{
							$data[$mkey]['ids'] = $mres->id; 
							$data[$mkey]['title'] = $mres->title; 
							$data[$mkey]['type'] = $mres->type;
							if($mres->general) $data[$mkey]['general'] = $mres->general; else $data[$mkey]['general'] = "";
							if($mres->a) $data[$mkey]['a'] = $mres->a; else $data[$mkey]['a'] = "";
							if($mres->b) $data[$mkey]['b'] = $mres->b; else $data[$mkey]['b'] = "";
							if($mres->c) $data[$mkey]['c'] = $mres->c; else $data[$mkey]['c'] = "";
							if($mres->mnos) $data[$mkey]['mnos'] = $mres->mnos; else $data[$mkey]['mnos'] = "";
							if($mres->mpdays) $data[$mkey]['mpdays'] = $mres->mpdays; else $data[$mkey]['mpdays'] = "";
							$data[$mkey]['sorder'] = $mres->sorder;
						}
				   }
				   
				  // echo "<pre>"; print_r($data); echo "</pre>";

		 		$ndays=cal_days_in_month(CAL_GREGORIAN,$month,$year);
				$relations = [
		
				'year' => $year,
				
				'month' => $month, 
				
				'monthname' => date("F", mktime(0, 0, 0, $month, 10)),
				
				'sitename' => get_sitename($site),
				
				'site' => $site,
				
				'manpowers' => $data,
				
				'ndays' => $ndays,
				
				'updated' => ""
	
			];
			
			
			return view('mmrreports.edittemp.manpower', $relations);
	   }
	   
	   else if($type == 777777777777){
	   
	   	   
	   
	   $matchfields = ['type' => 5, 'site' => $site]; 
	   
	   
	   $sresar = array();

	   $sflabels = array();

	   $fresar = array();

	   $fflabels = array();

	   $cresar = array();

	   $cflabels = array();
	   
	   $mmr_pwres = array();

	   $type=0;
	   
	   $matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year]; 
	   $mmr_mpcount = \App\Mmrmanpowerreport::where($matchfields_hskpact)->count();
		if($mmr_mpcount > 0){
		$mmr_pwres = \App\Mmrmanpowerreport::where($matchfields_hskpact)->first();	
		$mmr_pwid = $mmr_pwres->id;
	   }
	   else $mmr_pwid = 0;
	   
	   $mmr_res_cn = \App\Manpowervalidation::where($matchfields)->count();
	   
	   $mmr_res = \App\Manpowervalidation::where($matchfields)->first();
	   
	   $mmr_sres_cn = \App\Manpowersvalidation::where($matchfields)->count();
	   
	   $mmr_sres = \App\Manpowersvalidation::where($matchfields)->first();
	   if($mmr_sres_cn>0) $mrid = $mmr_sres->id;
	   else $mrid = 0;
	   
	   
	   if($mmr_sres_cn > 0)$mmr_sres = \App\Manpowersvalidation::where($matchfields)->first();	   
	   else $mmr_sres = array();	  

	   $summaryArray = array('mmr_agm_hr'=>'A.G.M - HR','mmr_assistant'=>'Assistant','mmr_asst_help_desk'=>'Assistant - Help Desk','mmr_asst_sec_officer'=>'Asst Security Officer','mmr_asst_stores'=>'Asst. - Stores','mmr_asst_eng_facility'=>'Asst. Engr - Facilities','mmr_asst_mngr_pms'=>'Asst.Mngr. - PMS','mmr_asst_mngr_security'=>'Asst.Mngr. - Security','mmr_bms_operator'=>'BMS Operator','mmr_care_taker_ch'=>'Care Taker - Club House','mmr_carpenter'=>'Carpenter','mmr_attendant'=>'Club house - Attendant','mmr_dgm_facility'=>'DGM - Facilities','mmr_dgm_bd_operations'=>'DGM-BD & Operations','mmr_drivers'=>'Drivers','mmr_dy_manger_pms'=>'Dy. Manager - PMS','mmr_dy_mang_facility'=>'Dy.Manager - Facilities','mmr_electrician'=>'Electricians','mmr_eng_facility'=>'Engineer - Facilities','mmr_executive_ch'=>'Executive - CH','mmr_exec_hr'=>'Executive - HR','mmr_exec_pms'=>'Executive - PMS','mmr_front_office_exec'=>'Front Office Executive','mmr_garden_help'=>'Garden Helper','mmr_gardener'=>'Gardener','mmr_gas_technician'=>'Gas - Technician','mmr_general_manager_hr'=>'General Manager - HR','mmr_get'=>'GET','mmr_gymboy'=>'Gym Boy','mmr_gym_trainer'=>'Gym Trainer','mmr_head_guard_security'=>'Head Guards - Security','mmr_helper'=>'Helper','mmr_house_keeper'=>'House Keeper','mmr_hvac_technician'=>'HVAC Technician','mmr_jr_officer_horticulture'=>'Jr Officer-Horticulture','mmr_jr_executive'=>'Jr. Executive','mmr_jr_executive_accounts'=>'Jr. Executive - Accounts','mmr_jr_executive_ch'=>'Jr. Executive - CH','mmr_jr_officer_fs'=>'Jr. Officer - F & S','mmr_jr_officer_facilities'=>'Jr. Officer - Facilities','mmr_jr_supervisor_security'=>'Jr. Supervisor-Security','mmr_jr_executive_admin'=>'Jr.Executive - Admin','mmr_jr_executive_pms'=>'Jr.Executive - PMS','mmr_jr_officer_pms'=>'Jr.Officer - PMS','mmr_lady_security_gaurd'=>'Lady Security Guards','mmr_lift_care_taker'=>'Lift Care Taker','mmr_manager_facilities'=>'Manager - Facilities','mmr_manager_firesafety'=>'Manager - Fire & Safety','mmr_manager_horticulture'=>'Manager - Horticulture','mmr_manager_hr'=>'Manager - HR','mmr_manager_operations'=>'Manager - Operations','mmr_manager_td'=>'Manager - T & D','mmr_mason'=>'Mason','mmr_mechanic'=>'Mechanic','mmr_multi_suill_technician'=>'Multi Suill Technician','mmr_multi_technician'=>'Multi Technician','mmr_office_assistant'=>'Office Assistant','mmr_office_attendant'=>'Office Attendant','mmr_office_boy'=>'Office Boy','mmr_officer'=>'Officer','mmr_officer_security'=>'Officer - Security','mmr_officer_training'=>'Officer - Training','mmr_operator_ros_machine'=>'Operators - ROS Machine','mmr_operator_stp'=>'operators - STP','mmr_painter'=>'Painter','mmr_plumber'=>'Plumbers','mmr_safety_steward'=>'Safety - Steward','mmr_security_guard'=>'Security Guards','mmr_security_supervisor'=>'Security Supervisors','mmr_sr_carpenter'=>'Sr Carpenter','mmr_sr_engineer_facilities'=>'Sr. Engineer - Facilities','mmr_sr_exe_horticulture'=>'Sr. Exe - Horticulture','mmr_sr_executive_accounts'=>'Sr. Executive - Accounts','mmr_sr_executive_pms'=>'Sr. Executive - PMS','mmr_sr_lady_sup_security'=>'Sr. Lady Sup - Security','mmr_sr_manager_facilities'=>'Sr. Manager - Facilities','mmr_sr_officer_safety'=>'Sr.Officer - Safety','mmr_sr_officer_stores'=>'Sr. Officer - Stores','mmr_sr_supervisor'=>'Sr. Supervisor','mmr_sr_supervisor_hk'=>'Sr. Supervisors - Hk','mmr_sr_supervisor_plumbing'=>'Sr. Supervisor - Plumbing','mmr_sr_supervisor_security'=>'Sr. Supervisor - Security','mmr_sr_technician'=>'Sr. Technician','mmr_srasst_help_desk'=>'Sr. Asst Help Desk','mmr_sr_executive_reso_train'=>'Sr.Executive-Reso & Train','mmr_sr_manager'=>'Sr.Manager','mmr_sr_office_assistant'=>'Sr.Office Assistant','mmr_sr_officer_irrigation'=>'Sr.Officer - Irrigation','mmr_sr_officer_sec_train'=>'Sr.Officer - Sec & Train','mmr_sr_officer_horticulture'=>'Sr.Officer-Horitculture','mmr_sr_officer_security'=>'Sr.Officer-Security','mmr_sr_plumber'=>'Sr.Plumber','mmr_sr_supervisor_pms'=>'Sr.Supervisor - PMS','mmr_sr_supervisor_tech'=>'Sr.Supervisor - Tech','mmr_steward_fire_safety'=>'Steward - Fire & Safety','mmr_supervisor'=>'Supervisor','mmr_supervisor_facilities'=>'Supervisor - Facilities','mmr_supervisor_firesafety'=>'Supervisor - Fire & Safety','mmr_supervisor_gardening'=>'Supervisor - Gardening','mmr_supervisor_hk'=>'Supervisors - Hk','mmr_supervisor_maintenance'=>'Supervisor - Maintenance','mmr_supervisor_plumbing'=>'Supervisor - Plumbing','mmr_supervisor_security'=>'Supervisor - Security','mmr_supervisor_technical'=>'Supervisor - Technical','mmr_supervisor_clubhouse'=>'Supervisor- Clubhouse','mmr_supervisor_horticulture'=>'Supervisor - Horticulture','mmr_supervisor_stp'=>'Supervisor-STP','mmr_swimming_coach'=>'Swimming pool Coach','mmr_swimming_pool_operator'=>'Swimming pool operator','mmr_swimming_pool_tech'=>'Swimming pool Tech','mmr_technician'=>'Technician','mmr_tennis_coach'=>'Tennis Coach','mmr_tr_mst'=>'Tr. MST','mmr_tr_sup_fire_safety'=>'Tr.SUP - Fire & Safety','mmr_tr_assistant_stores'=>'Tr.Assistant - Stores','mmr_tractor_driver'=>'Tractor Drivers','mmr_vp_operations'=>'V. P. - Operations','mmr_welder'=>'Welder','mmr_incharge_facilities'=>'Incharge - Facilities','mmr_incharge_fms'=>'Incharge - FMS','mmr_incharge_pms'=>'Incharge - PMS');

	   $key = "";
	   
	   $sskey = "";

	   $key_type = "";

	   $key_type = "";

	   $key_value = "";
	   
	   $sgenar = array();
	   
	   $fgenar = array();
	   
	   $cgenar = array();
	   
	   
	   $sanar = array();
	   
	   $fanar = array();
	   
	   $canar = array();
	   
	   
	   $sbnar = array();
	   
	   $fbnar = array();
	   
	   $cbnar = array();
	   
	   $scnar = array();
	   
	   $fcnar = array();
	   
	   $ccnar = array();
	   
	   
	   
	   if($mmr_res_cn>0)
	   {

		   foreach($summaryArray as $sakey=>$sval)	
		   {
			   $key = $mmr_res->$sakey;
	
			   $key_shared = $sakey."_shared";
	
			   $key_full = $sakey."_full";
			   
			   $key_ch = $sakey."_ch";
	
			   $key_value = $sval;
			   
			   $skey = $mmr_res->$key_shared;
			   
			   $fkey = $mmr_res->$key_full;
			   
			   $ckey = $mmr_res->$key_ch;
			   
			   $key_sgen = $sakey."_sgen";
			   $key_fgen = $sakey."_fgen";
			   $key_cgen = $sakey."_cgen";
			   
			   $sgen = $mmr_sres->$key_sgen;
			   $fgen = $mmr_sres->$key_fgen;
			   $cgen = $mmr_sres->$key_cgen;
			   
			   $key_sa = $sakey."_sa";
			   $key_fa = $sakey."_fa";
			   $key_ca = $sakey."_ca";
			   
			   $sa = $mmr_sres->$key_sa;
			   $fa = $mmr_sres->$key_fa;
			   $ca = $mmr_sres->$key_ca;
			   
			   $key_sb = $sakey."_sb";
			   $key_fb = $sakey."_fb";
			   $key_cb = $sakey."_cb";
			   
			   $sb = $mmr_sres->$key_sb;
			   $fb = $mmr_sres->$key_fb;
			   $cb = $mmr_sres->$key_cb;
			   
			   $key_sc = $sakey."_sc";
			   $key_fc = $sakey."_fc";
			   $key_cc = $sakey."_cc";
			   
			   $sc = $mmr_sres->$key_sc;
			   $fc = $mmr_sres->$key_fc;
			   $cc = $mmr_sres->$key_cc;
			   
			   if(isset($sgen) && ($sgen!=""))
			   {
			   		$sgenar[$sakey] = $sgen;
			   }
			   
			   if(isset($fgen) && ($fgen!=""))
			   {
			   		$fgenar[$sakey] = $fgen;
			   }
			   
			   if(isset($cgen) && ($cgen!=""))
			   {
			   		$cgenar[$sakey] = $cgen;
			   }
			   
			   if(isset($sa) && ($sa!=""))
			   {
			   		$sanar[$sakey] = $sa;
			   }
			   
			   if(isset($fa) && ($fa!=""))
			   {
			   		$fanar[$sakey] = $fa;
			   }
			   
			   if(isset($ca) && ($ca!=""))
			   {
			   		$canar[$sakey] = $ca;
			   }
			   
			   
			   if(isset($sb) && ($sb!=""))
			   {
			   		$sbnar[$sakey] = $sb;
			   }
			   
			   if(isset($fb) && ($fb!=""))
			   {
			   		$fbnar[$sakey] = $fb;
			   }
			   
			   if(isset($cb) && ($cb!=""))
			   {
			   		$cbnar[$sakey] = $cb;
			   }
			   
			   
			   if(isset($sc) && ($sc!=""))
			   {
			   		$scnar[$sakey] = $sc;
			   }
			   
			   if(isset($fb) && ($fc!=""))
			   {
			   		$fcnar[$sakey] = $fc;
			   }
			   
			   if(isset($cc) && ($cc!=""))
			   {
			   		$ccnar[$sakey] = $cc;
			   }
			   
	
			   if(isset($skey) && ($skey!="")) 
	
			   {
					$sresar[$sakey] = $skey;
					$sflabels[$sakey]=  $key_value; 
			   }
			   
			   if(isset($fkey) && ($fkey!="")) 
	
			   {
					$fresar[$sakey] = $fkey;
					$fflabels[$sakey]=  $key_value; 
			   }
			   
			   if(isset($ckey) && ($ckey!="")) 
	
			   {
					$cresar[$sakey] = $ckey;
					$cflabels[$sakey]=  $key_value; 
			   }
	
			}
		}
		
		$ndays=cal_days_in_month(CAL_GREGORIAN,$month,$year);
		
		$relations = [
		
			'year' => $year,
			
			'month' => $month, 
			
			'ndays' => $ndays,
			
			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),
			
			'sitename' => get_sitename($site),
			
			'site' => $site,
			
			'mrid' => $mrid,
			
			'msres' => $mmr_sres,
			
			'resval' => $mmr_pwres,
			
			'mmr_pwid' => $mmr_pwid,

			'sresar' => $sresar,

			'sflabels' => $sflabels,

			'fresar' => $fresar,

			'fflabels' => $fflabels,

			'cresar' => $cresar,

			'cflabels' => $cflabels,
			
			'sgenar' => $sgenar,
			
			'fgenar' => $fgenar,
			
			'cgenar' => $cgenar,
			
			'sanar' => $sanar,
			
			'fanar' => $fanar,
			
			'canar' => $canar,
			
			'sbnar' => $sbnar,
			
			'fbnar' => $fbnar,
			
			'cbnar' => $cbnar,
			
			'scnar' => $scnar,
			
			'fcnar' => $fcnar,
			
			'ccnar' => $ccnar,

	    ];
		
		
		return view('mmrreports.edittemp.manpower', $relations);

	   
	   	
	   }else if($type == 8){







	  







	    $mmr_res  = array();







		$resullt = array();







	    $matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year]; 







		







	    $mmr_count = \App\Mmrmajorincident::where($matchfields_hskpact)->count();







		if($mmr_count > 0){







		$mmr_res = \App\Mmrmajorincident::where($matchfields_hskpact)->get();		







	   }







	  $relations = [







			'year' => $year,







			'month' => $month, 







			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),







			'sitename' => get_sitename($site),







			'site' => $site,







			'res' => $formfieldarray,







			'resval' => $resullt,







			'mmr_type' => $type,







			'pbasys' => $mmr_res,







        ];     







		      







	  return view('mmrreports.edittemp.incident', $relations);







	    







	 }else if($type == 9){







	  







	    $mmr_res  = array();







		$resullt = array();







	    $matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year]; 







		







	    $mmr_count = \App\Mmrppmreport::where($matchfields_hskpact)->count();







		if($mmr_count > 0){







		$mmr_res = \App\Mmrppmreport::where($matchfields_hskpact)->get();		







	   }







	  $relations = [







			'year' => $year,







			'month' => $month, 







			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),







			'sitename' => get_sitename($site),







			'site' => $site,







			'res' => $formfieldarray,







			'resval' => $resullt,







			'mmr_type' => $type,







			'pbasys' => $mmr_res,







        ];     







		      







	  return view('mmrreports.edittemp.mmrppm', $relations);







	    







	 }else if($type == 10){







	  







	    $mmr_res  = array();







		$resullt = array();







	    $matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year,'type'=>'violation']; 







		







	    $mmr_count = \App\Mmrmonthlyreport::where($matchfields_hskpact)->count();







		if($mmr_count > 0){







		$mmr_res = \App\Mmrmonthlyreport::where($matchfields_hskpact)->get();		







	   }







	  $relations = [







			'year' => $year,







			'month' => $month, 







			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),







			'sitename' => get_sitename($site),







			'site' => $site,







			'res' => $formfieldarray,







			'resval' => $resullt,







			'mmr_type' => $type,







			'pbasys' => $mmr_res,







        ];     







		      







	  return view('mmrreports.edittemp.voilation', $relations);







	    







	  }else if($type == 11){







	  







	   $mmr_res  = array();







		$resullt = array();







	    $matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year,'type'=>'valueadd']; 







		







	    $mmr_count = \App\Mmrmonthlyreport::where($matchfields_hskpact)->count();







		if($mmr_count > 0){







		$mmr_res = \App\Mmrmonthlyreport::where($matchfields_hskpact)->get();		







	   }







	  $relations = [







			'year' => $year,







			'month' => $month, 







			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),







			'sitename' => get_sitename($site),







			'site' => $site,







			'res' => $formfieldarray,







			'resval' => $resullt,







			'mmr_type' => $type,







			'pbasys' => $mmr_res,







        ];     







		      







	  return view('mmrreports.edittemp.value', $relations);







	    







	 }else if($type == 12){







	  







	    $mmr_res  = array();







		$resullt = array();







	   // $matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year]; 







		 $matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year,'type'=>'suggestion']; 







		







	    $mmr_count = \App\Mmrmonthlyreport::where($matchfields_hskpact)->count();







		if($mmr_count > 0){







		$mmr_res = \App\Mmrmonthlyreport::where($matchfields_hskpact)->get();		







	   }







	  $relations = [







			'year' => $year,







			'month' => $month, 







			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),







			'sitename' => get_sitename($site),







			'site' => $site,







			'res' => $formfieldarray,







			'resval' => $resullt,







			'mmr_type' => $type,







			'pbasys' => $mmr_res,







        ];     







		      







	  return view('mmrreports.edittemp.suggestion', $relations);







	    







	   }else if($type == 13){







	  







	    $mmr_res  = array();







		$resullt = array();







	    $matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year,'type'=>'indentreq']; 







		







	    $mmr_count = \App\Mmrmonthlyreport::where($matchfields_hskpact)->count();







		if($mmr_count > 0){







		$mmr_res = \App\Mmrmonthlyreport::where($matchfields_hskpact)->get();		







	   }







	  $relations = [







			'year' => $year,







			'month' => $month, 







			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),







			'sitename' => get_sitename($site),







			'site' => $site,







			'res' => $formfieldarray,







			'resval' => $resullt,







			'mmr_type' => $type,







			'pbasys' => $mmr_res,







        ];     







		      







	  return view('mmrreports.edittemp.indentnrequisition', $relations);







	    







	   }else if($type == 14){







	  







	    $mmr_res  = array();







		$resullt = array();







	    $matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year,'type'=>'metrowater']; 







		







	    $mmr_count = \App\Mmrmonthlyreport::where($matchfields_hskpact)->count();







		if($mmr_count > 0){







		$mmr_res = \App\Mmrmonthlyreport::where($matchfields_hskpact)->get();		







	   }







	  $relations = [







			'year' => $year,







			'month' => $month, 







			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),







			'sitename' => get_sitename($site),







			'site' => $site,







			'res' => $formfieldarray,







			'resval' => $resullt,







			'mmr_type' => $type,







			'pbasys' => $mmr_res,







        ];     







		      







	  return view('mmrreports.edittemp.metrowater', $relations);







	    







	     }else if($type == 15){







	  







	    $mmr_res  = array();







		$resullt = array();







	    $matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year]; 







		







	    $mmr_count = \App\Mmrmonthlyreport::where($matchfields_hskpact)->count();







		if($mmr_count > 0){







		$mmr_res = \App\Mmrmonthlyreport::where($matchfields_hskpact)->get();		







	   }







	  $relations = [







			'year' => $year,







			'month' => $month, 







			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),







			'sitename' => get_sitename($site),







			'site' => $site,







			'res' => $formfieldarray,







			'resval' => $resullt,







			'mmr_type' => $type,







			'pbasys' => $mmr_res,







        ];     







		        







	  return view('mmrreports.edittemp.slaexport', $relations);







	//   return view('misreportsdetail.apnaexporttemp', $relations);







	    







	  }







	  else if($type == 16)







	  {



		







	  







	    $mmr_res  = array();







		$resullt = array();







	    $matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year]; 



				



	    $mmr_count = \App\Wspmtreport::where($matchfields_hskpact)->count();







		if($mmr_count > 0){







		$mmr_res = \App\Wspmtreport::where($matchfields_hskpact)->first();		







	   }







	  $relations = [







			'year' => $year,







			'month' => $month, 







			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),







			'sitename' => get_sitename($site),







			'site' => $site,







			'resval' => $resullt,







			'mmr_type' => $type,







			'pbasys' => $mmr_res,







        ];     







		      







	  return view('mmrreports.edittemp.wspinlet', $relations);







	  }  







	  else if($type == 17)







	  {







	  	   $mmr_res  = array();







		$resullt = array();







	    $matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year]; 



				



	    $mmr_count = \App\Wspmotreport::where($matchfields_hskpact)->count();







		if($mmr_count > 0){







		$mmr_res = \App\Wspmotreport::where($matchfields_hskpact)->first();		







	   }







	  $relations = [







			'year' => $year,







			'month' => $month, 







			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),







			'sitename' => get_sitename($site),







			'site' => $site,







			'resval' => $resullt,







			'mmr_type' => $type,







			'pbasys' => $mmr_res,







        ];     







		      







	  	return view('mmrreports.edittemp.wspoutlet', $relations);







	   







	  }







	  else if($type == 18)







	  {



         



         $mmr_res  = array();







		$resullt = array();







	    $matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year]; 



				



	    $mmr_count = \App\Stpintreport::where($matchfields_hskpact)->count();







		if($mmr_count > 0){







		$mmr_res = \App\Stpintreport::where($matchfields_hskpact)->first();		







	   }







	  $relations = [







			'year' => $year,







			'month' => $month, 







			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),







			'sitename' => get_sitename($site),







			'site' => $site,







			'resval' => $resullt,







			'mmr_type' => $type,







			'pbasys' => $mmr_res,







        ];     







		      











	  	return view('mmrreports.edittemp.stpinlet', $relations);







	   







	  }







	  else if($type == 19)







	  {



		

	   



         



         $mmr_res  = array();







		$resullt = array();







	    $matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year]; 



				



	    $mmr_count = \App\Stpoutreport::where($matchfields_hskpact)->count();







		if($mmr_count > 0){







		$mmr_res = \App\Stpoutreport::where($matchfields_hskpact)->first();		







	   }







	  $relations = [







			'year' => $year,







			'month' => $month, 







			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),







			'sitename' => get_sitename($site),







			'site' => $site,







			'resval' => $resullt,







			'mmr_type' => $type,







			'pbasys' => $mmr_res,







        ];  



	  	return view('mmrreports.edittemp.stpoutlet', $relations);







	   







	  }    







	  else if($type == 20)
	  {
	  	
		$Power_Consumption1 = 0;
		$Power_Consumption2 = 0;
		$Power_Consumption3 = 0;
		
		$Solar_Power_Units1 = 0;
		$Solar_Power_Units2 = 0;
		$Solar_Power_Units3 = 0;
		
		$DG_Units1 = 0;
		$DG_Units2 = 0;
		$DG_Units3 = 0;
		
		$Wsp_Metro1 = 0;
		$Wsp_Metro2 = 0;
		$Wsp_Metro3 = 0;
		
		$Wsp_Bores1 = 0;
		$Wsp_Bores2 = 0;
		$Wsp_Bores3 = 0;
		
		
		$Wsp_Tankers1 = 0;
		$Wsp_Tankers2 = 0;
		$Wsp_Tankers3 = 0;
		
		$Wsp_Treatwater1 = 0;
		$Wsp_Treatwater2 = 0;
		$Wsp_Treatwater3 = 0;
		
		
		$Power_Failure_Hrs1 = 0;
		$Power_Failure_Hrs2 = 0;
		$Power_Failure_Hrs3 = 0;
		
		$Diesel_Consume1 = 0;
		$Diesel_Consume2 = 0;
		$Diesel_Consume3 = 0;
		
		$sitefilter = $uriSegments[5];
		
		$year = $uriSegments[3];
		
		$month = $uriSegments[4];
		
		$dateString = $year."-".$month."-01";
		
		$datefilter1 = date("t-m-Y", strtotime($dateString));
		
		$datefilter2 =   date("t-m-Y", strtotime($dateString." -1 month"));
		$datefilter3 =   date("t-m-Y", strtotime($dateString." -2 months"));
		
		$prev_omonth = date("m", strtotime($dateString." -1 month"));
		
		$prev_tmonth = date("m", strtotime($dateString." -2 months"));
		
		$Power_Consumption1 = getmtdfms($datefilter1,$sitefilter,'pwr_ctpt');
		$Power_Consumption2 = getmtdfms($datefilter2,$sitefilter,'pwr_ctpt');
		$Power_Consumption3 = getmtdfms($datefilter3,$sitefilter,'pwr_ctpt');	
		
		
		$Solar_Power_Units1 = getmtdfms($datefilter1,$sitefilter,'pwr_solarpwrunits');
		$Solar_Power_Units2 = getmtdfms($datefilter2,$sitefilter,'pwr_solarpwrunits');
		$Solar_Power_Units3 = getmtdfms($datefilter3,$sitefilter,'pwr_solarpwrunits');	
		
		
		$DG_Units1 = getmtdfms($datefilter1,$sitefilter,'dgset_dgunits');
		$DG_Units2 = getmtdfms($datefilter2,$sitefilter,'dgset_dgunits');
		$DG_Units3 = getmtdfms($datefilter3,$sitefilter,'dgset_dgunits');	
		
		
		$Wsp_Metro1 = getmtdfms($datefilter1,$sitefilter,'wsp_metro');
		$Wsp_Metro2 = getmtdfms($datefilter2,$sitefilter,'wsp_metro');
		$Wsp_Metro3 = getmtdfms($datefilter3,$sitefilter,'wsp_metro');
		
		$Wsp_Bores1 =  getmtdfms($datefilter1,$sitefilter,'wsp_bores');
		$Wsp_Bores2 =  getmtdfms($datefilter2,$sitefilter,'wsp_bores');
		$Wsp_Bores3 =  getmtdfms($datefilter3,$sitefilter,'wsp_bores');
		
		$Wsp_Tankers1 = getmtdfms($datefilter1,$sitefilter,'wsp_tankers');
		$Wsp_Tankers2 = getmtdfms($datefilter2,$sitefilter,'wsp_tankers');
		$Wsp_Tankers3 = getmtdfms($datefilter3,$sitefilter,'wsp_tankers');
		
		$Wsp_Treatwater1 = getmtdfms($datefilter1,$sitefilter,'stp_avg_treat_water');
		$Wsp_Treatwater2 = getmtdfms($datefilter2,$sitefilter,'stp_avg_treat_water');
		$Wsp_Treatwater3 = getmtdfms($datefilter3,$sitefilter,'stp_avg_treat_water');
		
		
		$Power_Failure_Hrs_1 = getmtdfms($datefilter1,$sitefilter,'dgset_pwrfailure');
		$Power_Failure_Hrs_1 = explode(":",$Power_Failure_Hrs_1);
		$Power_Failure_Hrs1 = $Power_Failure_Hrs_1[0];
		
		$Power_Failure_Hrs_2 = getmtdfms($datefilter2,$sitefilter,'dgset_pwrfailure');
		$Power_Failure_Hrs_2 = explode(":",$Power_Failure_Hrs_2);
		$Power_Failure_Hrs2 = $Power_Failure_Hrs_2[0];
		
		$Power_Failure_Hrs_3 = getmtdfms($datefilter3,$sitefilter,'dgset_pwrfailure');
		$Power_Failure_Hrs_3 = explode(":",$Power_Failure_Hrs_3);
		$Power_Failure_Hrs3 = $Power_Failure_Hrs_3[0];
		
		$Diesel_Consume1 = getmtdfms($datefilter1,$sitefilter,'dset_dieselconsume');
		$Diesel_Consume2 = getmtdfms($datefilter2,$sitefilter,'dset_dieselconsume');
		$Diesel_Consume3 = getmtdfms($datefilter3,$sitefilter,'dset_dieselconsume');
		
		
		
		

		$resullt = array();

		 $relations = [

			'year' => $year,

			'month' => $month, 

			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),
			
			'cmonthname' => date("F", mktime(0, 0, 0, $month, 10)),

			'pmonthname' => date("F", mktime(0, 0, 0, $prev_omonth, 10)),

			'bmonthname' => date("F", mktime(0, 0, 0, $prev_tmonth, 10)),

			'sitename' => get_sitename($site),

			'site' => $site,
			
			'pmonth' => $prev_omonth,
			
			'pomonth' =>  $prev_tmonth,
			
			'pyear' =>  date("Y", strtotime($dateString." -1 month")),
			
			'poyear' =>  date("Y", strtotime($dateString." -2 months")),
			
			'Power_Consumption1' => $Power_Consumption1,

			'Power_Consumption1' => $Power_Consumption1,

			'Power_Consumption2' => $Power_Consumption2,

			'Power_Consumption3' => $Power_Consumption3,

			'Solar_Power_Units1' => $Solar_Power_Units1,

			'Solar_Power_Units2' => $Solar_Power_Units2,

			'Solar_Power_Units3' => $Solar_Power_Units3,

			'DG_Units1' => $DG_Units1,

			'DG_Units2' => $DG_Units2,

			'DG_Units3' => $DG_Units3,
			
			'Wsp_Metro1' => $Wsp_Metro1,

			'Wsp_Metro2' => $Wsp_Metro2,

			'Wsp_Metro3' => $Wsp_Metro3,

			'Wsp_Bores1' => $Wsp_Bores1,

			'Wsp_Bores2' => $Wsp_Bores2,

			'Wsp_Bores3' => $Wsp_Bores3,

			'Wsp_Tankers1' => $Wsp_Tankers1,

			'Wsp_Tankers2' => $Wsp_Tankers2,

			'Wsp_Tankers3' => $Wsp_Tankers3,

			'Wsp_Treatwater1' => $Wsp_Treatwater1,

			'Wsp_Treatwater2' => $Wsp_Treatwater2,

			'Wsp_Treatwater3' => $Wsp_Treatwater3,
			
			'Power_Failure_Hrs1' => $Power_Failure_Hrs1,

			'Power_Failure_Hrs2' => $Power_Failure_Hrs2,

			'Power_Failure_Hrs3' => $Power_Failure_Hrs3,

			'Diesel_Consume1' => $Diesel_Consume1,

			'Diesel_Consume2' => $Diesel_Consume2,

			'Diesel_Consume3' => $Diesel_Consume3


           ]; 
		   
		   return view('mmrreports.edittemp.stastistics', $relations);    
	  }







	  else if($type == 20000)

	  {
		
	    $prev_omonths = date($year.'-'.$month.'-d.');

		$prev_omonth = date ('m', strtotime ( '-1 month' , strtotime ( $prev_omonths )));

		$prev_oyear = date ('Y', strtotime ( '-1 month' , strtotime ( $prev_omonths )));

		

		$prev_tmonth = date ('m', strtotime ( '-2 month' , strtotime ( $prev_omonths )));

		$prev_tyear = date ('Y', strtotime ( '-2 month' , strtotime ( $prev_omonths )));

		

		$prev_thmonth = date ('m', strtotime ( '-3 month' , strtotime ( $prev_omonths )));

		$prev_thyear = date ('Y', strtotime ( '-3 month' , strtotime ( $prev_omonths )));		

			  

		$ebpower_sdate2 =  date($prev_oyear.'-'.$prev_omonth.'-21');

		$ebpower_edate2 =  date($year.'-'.$month.'-20');

		

		$ebpower_sdate1 =  date($prev_tyear.'-'.$prev_tmonth.'-21');

		$ebpower_edate1 =  date($prev_oyear.'-'.$prev_omonth.'-20');

		

		$ebpower_sdate =  date($prev_thyear.'-'.$prev_thmonth.'-21');

		$ebpower_edate =  date($prev_tyear.'-'.$prev_tmonth.'-20');

		

		$result = array();

		$solarpwrunits3 = 0;

		$pwr_pwrfactor3 = 0;

		$dgunits3 = 0;

		$pwrfailure3 = 0;

		$dieselconsume3 = 0;

		$dieselstock3 = 0;

		$dieselfilled3 = 0;

		$mincn = 0;

		$result = Fmsdailyreport::where('reporton', '>=', $ebpower_sdate2)->where('reporton', '<=', $ebpower_edate2)->where('site', '=', $site)->get();

		if(count($result)>0)

		{

			foreach($result as $res)

			{

				$tarr = explode(":",$res->dgset_pwrfailure);

				$solarpwrunits3 += (int)$res->pwr_solarpwrunits;

				$pwr_pwrfactor3 += (int)$res->pwr_ctpt;

				$dgunits3 += (int)$res->dgset_dgunits;

				$dieselconsume3 += (int)$res->dset_dieselconsume;				

				$dieselstock3 += (int)$res->dgset_dieselstock;				

				$dieselfilled3 += (int)$res->dgset_dieselfilled;

				$hour = (int)$tarr[0];

				$min = (int)$tarr[1];

				$tmin = ($hour * 60) + $min;

				$mincn = $mincn + $tmin;

			}			

			if($mincn > 0)

			{

				$hours = floor($mincn / 60);

				$minutes = ($mincn % 60);

				$pwrfailure3 = $hours.":".$minutes;

			} 

		}

		

		$solarpwrunits2 = 0;

		$pwr_pwrfactor2 = 0;

		$dgunits2 = 0;

		$pwrfailure2 = 0;

		$dieselconsume2 = 0;

		$dieselstock2 = 0;

		$dieselfilled2 = 0;

		$mincn = 0;

		$result = Fmsdailyreport::where('reporton', '>=', $ebpower_sdate1)->where('reporton', '<=', $ebpower_edate1)->where('site', '=', $site)->get();

		if(count($result)>0)

		{

			foreach($result as $res)

			{

				$tarr = explode(":",$res->dgset_pwrfailure);

				$solarpwrunits2 += (int)$res->pwr_solarpwrunits;

				$pwr_pwrfactor2 += (int)$res->pwr_ctpt;

				$dgunits2 += (int)$res->dgset_dgunits;

				$dieselconsume2 += (int)$res->dset_dieselconsume;				

				$dieselstock2 += (int)$res->dgset_dieselstock;				

				$dieselfilled2 += (int)$res->dgset_dieselfilled;

				$hour = (int)$tarr[0];

				$min = (int)$tarr[1];

				$tmin = ($hour * 60) + $min;

				$mincn = $mincn + $tmin;

			}			

			if($mincn > 0)

			{

				$hours = floor($mincn / 60);

				$minutes = ($mincn % 60);

				$pwrfailure2 = $hours.":".$minutes;

			}

		}

		

		

		$solarpwrunits1 = 0;

		$pwr_pwrfactor1 = 0;

		$dgunits1 = 0;

		$pwrfailure1 = 0;

		$dieselconsume1 = 0;

		$dieselstock1 = 0;

		$dieselfilled1 = 0;

		$mincn = 0;

		$result = Fmsdailyreport::where('reporton', '>=', $ebpower_sdate)->where('reporton', '<=', $ebpower_edate)->where('site', '=', $site)->get();

		if(count($result)>0)

		{

			foreach($result as $res)

			{

				$tarr = explode(":",$res->dgset_pwrfailure);

				$solarpwrunits1 += (int)$res->pwr_solarpwrunits;

				$pwr_pwrfactor1 += (int)$res->pwr_ctpt;

				$dgunits1 += (int)$res->dgset_dgunits;

				$dieselconsume1 += (int)$res->dset_dieselconsume;				

				$dieselstock1 += (int)$res->dgset_dieselstock;				

				$dieselfilled1 += (int)$res->dgset_dieselfilled;

				$hour = (int)$tarr[0];

				$min = (int)$tarr[1];

				$tmin = ($hour * 60) + $min;

				$mincn = $mincn + $tmin;

			}			

			if($mincn > 0)

			{

				$hours = floor($mincn / 60);

				$minutes = ($mincn % 60);

				$pwrfailure1 = $hours.":".$minutes;

			}

		}

		

		

		

		$prev_omonths = date('Y-'.$month.'-d.');

		$prev_omonth = date ('m', strtotime ( '-1 month' , strtotime ( $prev_omonths )));

		$prev_oyear = date ('Y', strtotime ( '-1 month' , strtotime ( $prev_omonths )));

		$prev_tmonths = date('Y-'.$month.'-d.');	

		$prev_tmonth = date ('m', strtotime ( '-2 month' , strtotime ( $prev_tmonths )));

		$prev_tyear = date ('Y', strtotime ( '-2 month' , strtotime ( $prev_tmonths )));

		$lreporton1  = date($prev_tyear.'-'.$prev_tmonth.'-1');

		$reporton1 =  date("t-m-Y", strtotime($lreporton1));

		$lreporton2  = date($prev_oyear.'-'.$prev_omonth.'-1');

		$reporton2 =  date("t-m-Y", strtotime($lreporton2));

		$lreporton3  = date("Y".'-'.$month.'-1');

		$reporton3 =  date("t-m-Y", strtotime($lreporton3));

		$occupanymatch_fileds1 = ['reporton' => $reporton1, 'site' => $site]; 



		

		$wspmetro1 = getmtdfms($reporton1,$site,'wsp_metro');

		

		



		$wspmetro2 = getmtdfms($reporton2,$site,'wsp_metro');







		$wspmetro3 = getmtdfms($reporton3,$site,'wsp_metro');



		$wspbores1 = getmtdfms($reporton1,$site,'wsp_bores');







		$wspbores2 = getmtdfms($reporton2,$site,'wsp_bores');







		$wspbores3 = getmtdfms($reporton3,$site,'wsp_bores');



		$wsptankers1 = getmtdfms($reporton1,$site,'wsp_tankers');







		$wsptankers2 = getmtdfms($reporton2,$site,'wsp_tankers');







		$wsptankers3 = getmtdfms($reporton3,$site,'wsp_tankers');







		







		







		$treatwater1 = getmtdfms($reporton1,$site,'stp_avg_treat_water');







		$treatwater2 = getmtdfms($reporton2,$site,'stp_avg_treat_water');







		$treatwater3 = getmtdfms($reporton3,$site,'stp_avg_treat_water');







		







		







		/*$dgsets = array();







		$blockarr = array("1"=>"A","2"=>"B","3"=>"C","4"=>"D","5"=>"E","6"=>"F","7"=>"G","8"=>"H","9"=>"I","10"=>"J","11"=>"K","12"=>"L","13"=>"M","14"=>"N","15"=>"O","16"=>"P","17"=>"Q","18"=>"R");







		$cn = getDgsetsNum($site);







		for($i = 1; $i <= $cn; $i++) 







		{  







			 $dateval = date("Y-m-d", strtotime($reporton1));







			 $tdateval = date("Y-m-d", strtotime($reporton1));







			







			 $dblock = $blockarr[$i];







		 	







		







				  $fmsresrows = Fmsdailyreport::







			







				  where('reporton', '>=', $dateval)







				  







				 ->where('reporton', '<=', $tdateval)







			







				->where('site', '=', $site)







			







				->get();







				







				foreach($fmsresrows as $sk => $fmsresrow)







				{







					$idval =  $fmsresrow['id'];	







					$dgset_pwrfailure = $fmsresrow['dgset_pwrfailure'];







					$dielselconsum_repors_res = Dailyfmsdieselconsumptionreport:: where('ref_id', '=', $idval)->where('site', '=', $site)->where('dgblock', '=', $dgset)->first();







					//echo '<pre>'; print_r($dielselconsum_repors_res); echo '</pre>';







					if(count($dielselconsum_repors_res)>0){







					  $sdate = date("d-m-Y",strtotime($fmsresrow['reporton']));







						$results[$sk]['reporton'] = $sdate;







						$results[$sk]['dgset_pwrfailure'] =  $fmsresrow['dgset_pwrfailure'];







						$results[$sk]['dgset_pwrfailure_running'] =  $dielselconsum_repors_res['dg_run_difference'];







						$results[$sk]['dgset_dgunits'] = $dielselconsum_repors_res->dg_units_difference;







						$results[$sk]['dset_dieselconsume'] = $dielselconsum_repors_res->dg_diesel_diff_con;







						$results[$sk]['dgset_dieselstock'] = "";







						$results[$sk]['dgset_dieselfilled'] = $dielselconsum_repors_res->dg_diesel_filled;			







					}







				}







			







			 







			 echo "<pre>"; print_r($building_res); echo "</pre>";







			 exit;







			 







			 $dgsets[] = array("state" => $blockarr[$i], "nov2018" => 8,480, "dec2018" => 2,480, "jan2019" => 4,480);







		 }







		 $dgsets = str_replace('"state"','state',json_encode($dgsets));







		 $dgsets =  str_replace('"nov2018"','nov2018',$dgsets);







		 $dgsets =  str_replace('"dec2018"','dec2018',$dgsets);







		 $dgsets =  str_replace('"jan2019"','jan2019',$dgsets);*/




		/*echo $prev_oyear;
		echo $prev_tyear;
		echo $prev_oyear;
		exit;
*/

	   $relations = [



			'pyear' => $prev_oyear,

			

			'poyear' => $prev_tyear,



			'year' => $year,
			
			
			'prev_omonth' => $prev_omonth,

			

			'prev_tmonth' => $prev_tmonth,
			


			'month' => $month, 
			

			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),







			'sitename' => get_sitename($site),







			'site' => $site,







			'solarpwrunits1' => $solarpwrunits1,







			'solarpwrunits2' => $solarpwrunits2,







			'solarpwrunits3' => $solarpwrunits3,







			'pwr_pwrfactor1' => $pwr_pwrfactor1,







			'pwr_pwrfactor2' => $pwr_pwrfactor2,







			'pwr_pwrfactor3' => $pwr_pwrfactor3,







			'dgunits1' => $dgunits1,







			'dgunits2' => $dgunits2,







			'dgunits3' => $dgunits3,







			'pwrfailure1' => $pwrfailure1,







			'pwrfailure2' => $pwrfailure2,







			'pwrfailure3' => $pwrfailure3,







			'wspmetro1' => $wspmetro1,







			'wspmetro2' => $wspmetro2,







			'wspmetro3' => $wspmetro3,







			'wspbores1' => $wspbores1,







			'wspbores2' => $wspbores2,







			'wspbores3' => $wspbores3,







			'wsptankers1' => $wsptankers1,







			'wsptankers2' => $wsptankers2,







			'wsptankers3' => $wsptankers3,







			'treatwater1' => $treatwater1,







			'treatwater2' => $treatwater2,







			'treatwater3' => $treatwater3,

			

			

			'dieselconsume1' => $dieselconsume1,







			'dieselconsume2' => $dieselconsume2,







			'dieselconsume3' => $dieselconsume3,

			

			

			'dieselstock1' => $dieselstock1,







			'dieselstock2' => $dieselstock2,







			'dieselstock3' => $dieselstock3,

			

			

			'dieselfilled1' => $dieselfilled1,







			'dieselfilled2' => $dieselfilled2,







			'dieselfilled3' => $dieselfilled3



        ]; 







		







		







		return view('mmrreports.edittemp.stastistics', $relations);    







	   







	  }     

	  

	  

	  

	  else if($type == 21){







	  







	    $mmr_res  = array();







		$resullt = array();







	    $matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year,'type'=>'hkcm']; 







		







	    $mmr_count = \App\Mmrhkcmmonthlyreport::where($matchfields_hskpact)->count();







		if($mmr_count > 0){







		$mmr_res = \App\Mmrhkcmmonthlyreport::where($matchfields_hskpact)->get();		







	   }







	  $relations = [







			'year' => $year,







			'month' => $month, 







			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),







			'sitename' => get_sitename($site),







			'site' => $site,







			'res' => $formfieldarray,







			'resval' => $resullt,







			'mmr_type' => $type,







			'pbasys' => $mmr_res,







        ];     







		      







	  return view('mmrreports.edittemp.hkcm', $relations);







	    







	  }    

	  

	  

	  

	  

	  else if($type == 22){







	  

		





	   $mmr_res  = array();







		$resullt = array();







	    $matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year]; 







		







	    $mmr_count = \App\Mmrpetreport::where($matchfields_hskpact)->count();







		if($mmr_count > 0){







		$mmr_res = \App\Mmrpetreport::where($matchfields_hskpact)->get();		







	   }







	  $relations = [







			'year' => $year,







			'month' => $month, 







			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),







			'sitename' => get_sitename($site),







			'site' => $site,







			'res' => $formfieldarray,







			'resval' => $resullt,







			'mmr_type' => $type,







			'pbasys' => $mmr_res,







        ];     







		      







	  return view('mmrreports.edittemp.pet', $relations);



}




	

	else if($type == 23)

{

	   $mmr_res  = array();

		$resullt = array();

	    $matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year, 'type' => 'graphs']; 



	    $mmr_count = \App\Mmrmonthlyreport::where($matchfields_hskpact)->count();







		if($mmr_count > 0){







		$mmr_res = \App\Mmrmonthlyreport::where($matchfields_hskpact)->get();		







	   }







	  $relations = [







			'year' => $year,







			'month' => $month, 







			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),







			'sitename' => get_sitename($site),







			'site' => $site,







			'res' => $formfieldarray,







			'resval' => $resullt,







			'mmr_type' => $type,







			'pbasys' => $mmr_res,







        ];     







		      







	  return view('mmrreports.edittemp.chart', $relations);







	    







	 

}



else if($type == 24)

{

	    $mmr_res  = array();

		$resullt = array();

	    $matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year]; 



	    $mmr_count = \App\Mmrwarantyreport::where($matchfields_hskpact)->count();

		if($mmr_count > 0){

		$mmr_res = \App\Mmrwarantyreport::where($matchfields_hskpact)->get();	

	   }

	  $relations = [







			'year' => $year,







			'month' => $month, 







			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),







			'sitename' => get_sitename($site),







			'site' => $site,







			'res' => $formfieldarray,







			'resval' => $resullt,







			'mmr_type' => $type,







			'pbasys' => $mmr_res,



        ];     







		      







	  return view('mmrreports.edittemp.waranty', $relations);







	    







	 

}





else if($type == 25){







	  







	    $mmr_res  = array();







		$resullt = array();







	    $matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year,'type'=>'hocm']; 







		







	    $mmr_count = \App\Mmrhkcmmonthlyreport::where($matchfields_hskpact)->count();







		if($mmr_count > 0){







		$mmr_res = \App\Mmrhkcmmonthlyreport::where($matchfields_hskpact)->get();		







	   }







	  $relations = [







			'year' => $year,







			'month' => $month, 







			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),







			'sitename' => get_sitename($site),







			'site' => $site,







			'res' => $formfieldarray,







			'resval' => $resullt,







			'mmr_type' => $type,







			'pbasys' => $mmr_res,







        ];     







		      







	  return view('mmrreports.edittemp.hocm', $relations);







	    







	  }    
	  
	  
	 else if($type == 26){
	
	
	
	
	
	
	
		  
	
	
			
	
	
	
	
	
		   $mmr_res  = array();
	
	
	
	
	
	
	
			$resullt = array();
	
	
	
	
	
	
	
			$matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year]; 
	
	
	
	
	
	
	
			
	
	
	
	
	
	
	
			$mmr_count = \App\Mmreventreport::where($matchfields_hskpact)->count();
	
	
	
	
	
	
	
			if($mmr_count > 0){
	
	
	
	
	
	
	
			$mmr_res = \App\Mmreventreport::where($matchfields_hskpact)->get();		
	
	
	
	
	
	
	
		   }
	
	
	
	
	
	
	
		  $relations = [
	
	
	
	
	
	
	
				'year' => $year,
	
	
	
	
	
	
	
				'month' => $month, 
	
	
	
	
	
	
	
				'monthname' => date("F", mktime(0, 0, 0, $month, 10)),
	
	
	
	
	
	
	
				'sitename' => get_sitename($site),
	
	
	
	
	
	
	
				'site' => $site,
	
	
	
	
	
	
	
				'res' => $formfieldarray,
	
	
	
	
	
	
	
				'resval' => $resullt,
	
	
	
	
	
	
	
				'mmr_type' => $type,
	
	
	
	
	
	
	
				'pbasys' => $mmr_res,
	
	
	
	
	
	
	
			];     
	
	
	
	
	
	
	
				  
	
	
	
	
	
	
	
		  return view('mmrreports.edittemp.event', $relations);
	
	
	
}



	exit;







	







	   







	}















	







	 public function mmreditform(Request $request)















    { 







	







	   $year = $request->year;







	   $month = $request->month;







	   $site = $request->site;







	   $type = $request->mmr_type;







	   $reason_text = "";







	   $ebpower = "";







	   







	    $matchfields_mmr_eb = ['site' => $site, 'mmr_type' => $type, 'month' =>$month, 'year' => $year]; 







		//print_r($matchfields_mmr_eb);







	    $mmr_count = \App\Mmrhousekpact::where($matchfields_mmr_eb)->count();







		if($mmr_count > 0){







		$mmr_res = \App\Mmrhousekpact::where($matchfields_mmr_eb)->first();	







		$ebpower = $mmr_res->ebpower;	 







		$reason_text = $mmr_res->reason_text;







		} 







	  







	  if($type == 1){







	     	   







	   $relations = [







			'year' => $year,







			'month' => $month, 







			'site' => $site,







			'mmr_type' => $type,







			'ebpower' => $ebpower,







        ];     







		     







		return view('mmrreports.edittemp.ebpower', $relations);







	    







	  }







	  







	  else if($type == 2){







	   $mmr_res  = array();







	    $matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year]; 







		//print_r($matchfields_mmr_eb);







	    $mmr_count = \App\Mmrhousekpact::where($matchfields_hskpact)->count();







		if($mmr_count > 0){







		$mmr_res = \App\Mmrhousekpact::where($matchfields_mmr_eb)->get();		







	   }







	  







	   $relations = [







			'year' => $year,







			'month' => $month, 







			'site' => $site,







			'mmr_type' => $type,







			'reason_text' => $reason_text,







			'pbasys' =>$mmr_res,







        ];     







	    return view('mmrreports.edittemp.reasontxt', $relations);







	  







	  }







	  







	  







	  







    }  







	







		







	







	 public function storeeditform(Request $request)















    { 







	   







       // $assets = Audit::all();







		







		$edata = $request->all();







		$site = $edata['site'];







		$month = $edata['month'];







		$year = $edata['year'];







		$type = $edata['mmr_type']; 







		$reason_text = "";







		$eb_power = "";







		if(isset($edata['ebpower'])) {







		  $eb_power = $edata['ebpower'];







		}







		if(isset($edata['reason_text'])) {







		  $reason_text = $edata['reason_text'];







		}







		 







		







		







		$mmr_res_arr = array("ebpower" => $eb_power,"reason_text" => $reason_text);







	    







	    $matchfields_mmr_eb = ['site' => $site, 'mmr_type' => $type, 'month' =>$month, 'year' => $year]; 







	    $mmr_count = \App\Mmrvalidationreport::where($matchfields_mmr_eb)->count();







		if($mmr_count > 0){







		$mmr_res = \App\Mmrvalidationreport::where($matchfields_mmr_eb)->first();







		 $update_id = $mmr_res['id'];







		    //$edata = array();







			 $report = \App\Mmrvalidationreport::findOrFail($update_id);







			 $report->update($mmr_res_arr); 







		 







		} else {







		  $edata = array("site" => $site, "month" => $month, "year" => $year, "mmr_type" =>$type, "reason_text" => $reason_text, "ebpower" => $eb_power);	  







		  //$mmr_res = \App\Mmrvalidationreport::where($matchfields_fornoc)->first();







		   \App\Mmrvalidationreport::create($edata); 







		}     







		







		







	    $relations = [







            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),







			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', ''),







			'sites_attr_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id'),







			'site' => $site,







			'month' => $month,







			'year' => $year,















        ];







	







//	return redirect('/misreports?y='.$year.'&m='.$month);







		 







		return redirect('/mmr/main?y='.$year.'&m='.$month.'&site='.$site);







		 //return view('updatemmr',$relations);















    }   







	







	







	







		 public function storehousekpact(Request $request)















    {   







	   







       // $assets = Audit::all();







		







		$edata = $request->all();







		$site = $edata['site'];







		$month = $edata['month'];







		$year = $edata['year'];







		$type = $edata['type'];







		







		/*echo "<pre>";







		   print_r($edata);







		echo "</pre>";







		exit;*/







		







		







		 if(isset($edata['category'])) {







		 if(count($edata['category'] > 0)){







		 if($edata['category']) {







		 	   foreach($edata['category'] as $ckey => $consuption){







			     $edata['report_on'][$ckey] = date("Y-m-d",strtotime($edata['report_on'][$ckey]));







			   	 if($edata['pbaid'][$ckey] > 0) {







				  







				 $report = Mmrhousekpact::findOrFail($edata['pbaid'][$ckey]);







				 







				 //$diconsumptn = array("site"=>$last_insert_id,"capacity"=>$edata['wspcapacity'][$ckey],'make'=>$edata['wspmake'][$ckey],'type'=>$edata['wspphase'][$ckey]); 







				







				 $diconsumptn = array("site"=>$edata['site'],"month"=>$edata['month'],"year"=>$edata['year'],'category'=>$consuption,'location'=>$edata['location'][$ckey],'description'=>$edata['description'][$ckey],'report_on'=>$edata['report_on'][$ckey],'remarks'=>$edata['remarks'][$ckey],'type'=>$type);   







				 $report->update($diconsumptn);







				  $filename = uniqid();







				     if(isset($edata['beforeimage'][$ckey])) {







					    $req = $edata['beforeimage'][$ckey];







					    $Transid = $edata['pbaid'][$ckey];







						$extension = $req->getClientOriginalExtension();







						$file = $req->move('hosekpact',$filename."_"."hosekpact_before".$Transid.".".$extension);







						$filename_extension = $filename."_"."hosekpact_before".$Transid.".".$extension;


						$w=200; 
						$h=200; 
						$newfilename= "hosekpact/"."tiny_".$filename_extension;
						resize_byratio("hosekpact/".$filename_extension, $w, $h, $newfilename);




						$req_array =  array("beforeimage"=> $filename_extension);







						$report = Mmrhousekpact::findOrFail($Transid);







						$report->update($req_array);







					}







					







					 if(isset($edata['afterimage'][$ckey])) {







					    $req = $edata['afterimage'][$ckey];







					    $Transid = $edata['pbaid'][$ckey];







						$extension = $req->getClientOriginalExtension();







						$file = $req->move('hosekpact',$filename."_"."hosekpact_after".$Transid.".".$extension);







						$filename_extension = $filename."_"."hosekpact_after".$Transid.".".$extension;



						$w=200; 
						$h=200; 
						$newfilename= "hosekpact/"."tiny_".$filename_extension;
						resize_byratio("hosekpact/".$filename_extension, $w, $h, $newfilename);



						$req_array =  array("afterimage"=> $filename_extension);







						$report = Mmrhousekpact::findOrFail($Transid);







						$report->update($req_array);







					}







				 







				 }else {







				 







				  $filename = uniqid();







					  $diconsumptn = array("site"=>$edata['site'],"month"=>$edata['month'],"year"=>$edata['year'],'category'=>$consuption,'location'=>$edata['location'][$ckey],'description'=>$edata['description'][$ckey],'report_on'=>$edata['report_on'][$ckey],'remarks'=>$edata['remarks'][$ckey],'beforeimage'=>'','afterimage'=>'','type'=>$type);   







					  $insertcon = Mmrhousekpact::create($diconsumptn); 







					  $Transid = $insertcon->id;







					  if(isset($edata['beforeimage'][$ckey])) {







					   $req = $edata['beforeimage'][$ckey];







						$extension = $req->getClientOriginalExtension();







						$file = $req->move('hosekpact',$filename."_"."hosekpact_before".$Transid.".".$extension);







						$filename_extension = $filename."_"."hosekpact_before".$Transid.".".$extension;



						$w=200; 
						$h=200; 
						$newfilename= "hosekpact/"."tiny_".$filename_extension;
						resize_byratio("hosekpact/".$filename_extension, $w, $h, $newfilename);



						$req_array =  array("beforeimage"=> $filename_extension);







						$report = Mmrhousekpact::findOrFail($Transid);







						$report->update($req_array);







						} 







						







						 if(isset($edata['afterimage'][$ckey])) {







					    $req = $edata['afterimage'][$ckey];







						$extension = $req->getClientOriginalExtension();







						$file = $req->move('hosekpact',$filename."_"."hosekpact_after".$Transid.".".$extension);







						$filename_extension = $filename."_"."hosekpact_after".$Transid.".".$extension;
						
						$w=200; 
						$h=200; 
						$newfilename= "hosekpact/"."tiny_".$filename_extension;
						resize_byratio("hosekpact/".$filename_extension, $w, $h, $newfilename);







						$req_array =  array("afterimage"=> $filename_extension);







						$report = Mmrhousekpact::findOrFail($Transid);







						$report->update($req_array);







					}







				     }







				 }







			    } 







			   }







		 }  







		 







		







	    $relations = [







			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', ''),







			'sites_attr_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id'),







			'site' => $site,







			'month' => $month,







			'year' => $year,















        ];







	







//	return redirect('/misreports?y='.$year.'&m='.$month);







		 







		 return redirect('/mmr/main?y='.$year.'&m='.$month.'&site='.$site);







		 //return view('updatemmr',$relations);















    }  







	







	







	




	


	 public function storemajorincident(Request $request)















    { 







	   







       // $assets = Audit::all();







		







		$edata = $request->all();







		$site = $edata['site'];







		$month = $edata['month'];







		$year = $edata['year'];







	/*	echo "<pre>";







		   print_r($edata);







		echo "</pre>";







		exit;







		  */







		







		 if(isset($edata['incident_name'])) {







		 if(count($edata['incident_name'] > 0)){







		 if($edata['incident_name']) {







		 	   foreach($edata['incident_name'] as $ckey => $consuption){







			     $edata['report_on'][$ckey] = date("Y-m-d",strtotime($edata['report_on'][$ckey]));







			   	 if($edata['pbaid'][$ckey] > 0) {







				  







				 $report = Mmrmajorincident::findOrFail($edata['pbaid'][$ckey]);







				 







				 //$diconsumptn = array("site"=>$last_insert_id,"capacity"=>$edata['wspcapacity'][$ckey],'make'=>$edata['wspmake'][$ckey],'type'=>$edata['wspphase'][$ckey]); 







				







				 $diconsumptn = array("site"=>$edata['site'],"month"=>$edata['month'],"year"=>$edata['year'],'incident_name'=>$consuption,'action_taken'=>$edata['action_taken'][$ckey],'description'=>$edata['description'][$ckey],'report_on'=>$edata['report_on'][$ckey],'status'=>$edata['status'][$ckey]);   







				 $report->update($diconsumptn);







				  $filename = uniqid();







				     if(isset($edata['beforeimage'][$ckey])) {







					    $req = $edata['beforeimage'][$ckey];







					    $Transid = $edata['pbaid'][$ckey];







						$extension = $req->getClientOriginalExtension();







						$file = $req->move('hosekpact',$filename."_"."incident_before".$Transid.".".$extension);







						$filename_extension = $filename."_"."incident_before".$Transid.".".$extension;
						
						
						$w=200; 
						$h=200; 
						$newfilename= "hosekpact/"."tiny_".$filename_extension;
						resize_byratio("hosekpact/".$filename_extension, $w, $h, $newfilename);






						$req_array =  array("beforeimage"=> $filename_extension);







						$report = Mmrmajorincident::findOrFail($Transid);







						$report->update($req_array);







					}







					




					 $filename = uniqid();


					 if(isset($edata['afterimage'][$ckey])) {







					    $req = $edata['afterimage'][$ckey];







					    $Transid = $edata['pbaid'][$ckey];







						$extension = $req->getClientOriginalExtension();







						$file = $req->move('hosekpact',$filename."_"."incident_after".$Transid.".".$extension);







						$filename_extension = $filename."_"."incident_after".$Transid.".".$extension;



						$w=200; 
						$h=200; 
						$newfilename= "hosekpact/"."tiny_".$filename_extension;
						resize_byratio("hosekpact/".$filename_extension, $w, $h, $newfilename);
						

						$req_array =  array("afterimage"=> $filename_extension);







						$report = Mmrmajorincident::findOrFail($Transid);







						$report->update($req_array);








					}







				 







				 }else {







				 







				  $filename = uniqid();







					  $diconsumptn = array("site"=>$edata['site'],"month"=>$edata['month'],"year"=>$edata['year'],'incident_name'=>$consuption,'action_taken'=>$edata['action_taken'][$ckey],'description'=>$edata['description'][$ckey],'report_on'=>$edata['report_on'][$ckey],'status'=>$edata['status'][$ckey],'beforeimage'=>'','afterimage'=>'');   







					  $insertcon = Mmrmajorincident::create($diconsumptn); 







					  $Transid = $insertcon->id;







					  if(isset($edata['beforeimage'][$ckey])) {







					   $req = $edata['beforeimage'][$ckey];







						$extension = $req->getClientOriginalExtension();







						$file = $req->move('hosekpact',$filename."_"."incident_before".$Transid.".".$extension);







						$filename_extension = $filename."_"."incident_before".$Transid.".".$extension;



						$w=200; 
						$h=200; 
						$newfilename= "hosekpact/"."tiny_".$filename_extension;
						resize_byratio("hosekpact/".$filename_extension, $w, $h, $newfilename);


						$req_array =  array("beforeimage"=> $filename_extension);







						$report = Mmrmajorincident::findOrFail($Transid);







						$report->update($req_array);







						} 







						







						 if(isset($edata['afterimage'][$ckey])) {







					    $req = $edata['afterimage'][$ckey];







					     $Transid = $insertcon->id;







						$extension = $req->getClientOriginalExtension();







						$file = $req->move('hosekpact',$filename."_"."incident_after".$Transid.".".$extension);







						$filename_extension = $filename."_"."incident_before".$Transid.".".$extension;



						$w=200; 
						$h=200; 
						$newfilename= "hosekpact/"."tiny_".$filename_extension;

						resize_byratio("hosekpact/".$filename_extension, $w, $h, $newfilename);

						$req_array =  array("afterimage"=> $filename_extension);







						$report = Mmrmajorincident::findOrFail($Transid);







						$report->update($req_array);







					}







						







				     }







				 }







			    } 







			   }







		 }  







		 







		







	    $relations = [







			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', ''),







			'sites_attr_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id'),







			'site' => $site,







			'month' => $month,







			'year' => $year,















        ];







	







//	return redirect('/misreports?y='.$year.'&m='.$month);







		 







		 return redirect('/mmr/main?y='.$year.'&m='.$month.'&site='.$site);







		 //return view('updatemmr',$relations);















    }  















	 public function storemmrppm(Request $request)















    { 







	   







       // $assets = Audit::all();







		







		$edata = $request->all();







		$site = $edata['site'];







		$month = $edata['month'];







		$year = $edata['year'];







	/*	echo "<pre>";







		   print_r($edata);







		echo "</pre>";







		exit;







		  */







		







		 if(isset($edata['asset_name'])) {







		 if(count($edata['asset_name'] > 0)){







		 if($edata['asset_name']) {




			    


		 	   foreach($edata['asset_name'] as $ckey => $consuption){







			     $edata['report_on'][$ckey] = date("Y-m-d",strtotime($edata['report_on'][$ckey]));



			   	 if($edata['pbaid'][$ckey] > 0) {







				  







				 $report = Mmrppmreport::findOrFail($edata['pbaid'][$ckey]);







				 







				 //$diconsumptn = array("site"=>$last_insert_id,"capacity"=>$edata['wspcapacity'][$ckey],'make'=>$edata['wspmake'][$ckey],'type'=>$edata['wspphase'][$ckey]); 







				







					 $diconsumptn = array("site"=>$edata['site'],"month"=>$edata['month'],"year"=>$edata['year'],'asset_name'=>$consuption,'location'=>$edata['location'][$ckey],'description'=>$edata['description'][$ckey],'type'=>$edata['type'][$ckey],'category'=>$edata['category'][$ckey],'report_on'=>$edata['report_on'][$ckey],'status'=>$edata['status'][$ckey]);   






				 $report->update($diconsumptn);







				   $filename = uniqid();







				     if(isset($edata['beforeimage'][$ckey])) {







					    $req = $edata['beforeimage'][$ckey];







					    $Transid = $edata['pbaid'][$ckey];







						$extension = $req->getClientOriginalExtension();







						$file = $req->move('hosekpact',$filename."_"."mmrbrowse".$Transid.".".$extension);







						$filename_extension = $filename."_"."mmrbrowse".$Transid.".".$extension;
						
						
						$w=200; 
						$h=200; 
						$newfilename= "hosekpact/"."tiny_".$filename_extension;

						resize_byratio("hosekpact/".$filename_extension, $w, $h, $newfilename);





						$req_array =  array("beforeimage"=> $filename_extension);







						$report = Mmrppmreport::findOrFail($Transid);







						$report->update($req_array);







					}

					$filename = uniqid();

					if(isset($edata['afterimage'][$ckey])) {







					    $req = $edata['afterimage'][$ckey];







					    $Transid = $edata['pbaid'][$ckey];







						$extension = $req->getClientOriginalExtension();







						$file = $req->move('hosekpact',$filename."_"."mmrbrowse".$Transid.".".$extension);







						$filename_extension = $filename."_"."mmrbrowse".$Transid.".".$extension;



						$w=200; 
						$h=200; 
						$newfilename= "hosekpact/"."tiny_".$filename_extension;

						resize_byratio("hosekpact/".$filename_extension, $w, $h, $newfilename);

						$req_array =  array("afterimage"=> $filename_extension);







						$report = Mmrppmreport::findOrFail($Transid);







						$report->update($req_array);







					}






					







					







				 }else {







				 







				  $filename = uniqid();







					  $diconsumptn = array("site"=>$edata['site'],"month"=>$edata['month'],"year"=>$edata['year'],'asset_name'=>$consuption,'location'=>$edata['location'][$ckey],'description'=>$edata['description'][$ckey],'type'=>$edata['type'][$ckey],'category'=>$edata['category'][$ckey],'report_on'=>$edata['report_on'][$ckey],'status'=>$edata['status'][$ckey],'beforeimage'=>'','afterimage'=>'');   







					  $insertcon = Mmrppmreport::create($diconsumptn); 







					  $Transid = $insertcon->id;







					  if(isset($edata['beforeimage'][$ckey])) {







					   $req = $edata['beforeimage'][$ckey];







						$extension = $req->getClientOriginalExtension();







						$file = $req->move('hosekpact',$filename."_"."mmrbrowse".$Transid.".".$extension);


			
		



						$filename_extension = $filename."_"."mmrbrowse".$Transid.".".$extension;



						$w=200; 
						$h=200; 
						$newfilename= "hosekpact/"."tiny_".$filename_extension;
						resize_byratio("hosekpact/".$filename_extension, $w, $h, $newfilename);


						$req_array =  array("beforeimage"=> $filename_extension);







						$report = Mmrppmreport::findOrFail($Transid);







						$report->update($req_array);







						} 


					   $filename = uniqid();

					   if(isset($edata['afterimage'][$ckey])) {







					   $req = $edata['afterimage'][$ckey];







						$extension = $req->getClientOriginalExtension();







						$file = $req->move('hosekpact',$filename."_"."mmrbrowse".$Transid.".".$extension);







						$filename_extension = $filename."_"."mmrbrowse".$Transid.".".$extension;



						$w=200; 
						$h=200; 
						$newfilename= "hosekpact/"."tiny_".$filename_extension;



						$req_array =  array("afterimage"=> $filename_extension);







						$report = Mmrppmreport::findOrFail($Transid);







						$report->update($req_array);







						} 
						

				     }







				 }







			    } 







			   }







		 }  







		 







		







	    $relations = [







			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', ''),







			'sites_attr_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id'),







			'site' => $site,







			'month' => $month,







			'year' => $year,















        ];







	







//	return redirect('/misreports?y='.$year.'&m='.$month);







		 







		return redirect('/mmr/main?y='.$year.'&m='.$month.'&site='.$site);







		 //return view('updatemmr',$relations);















    }  







	







	







	







	







	public function storemmrmonthly(Request $request)















    {  







	   







       // $assets = Audit::all();







		







		$edata = $request->all();







		$site = $edata['site'];







		$month = $edata['month'];







		$year = $edata['year'];







		$type = $edata['type'];  







		







		 if(isset($edata['title'])) {







		 if(count($edata['title'] > 0)){







		 if($edata['title']) {







		 	   foreach($edata['title'] as $ckey => $consuption){







			     //$edata['report_on'][$ckey] = date("Y-m-d",strtotime($edata['report_on'][$ckey]));







			   	 if($edata['pbaid'][$ckey] > 0) {







				  







				 $report = Mmrmonthlyreport::findOrFail($edata['pbaid'][$ckey]);







				 







				 //$diconsumptn = array("site"=>$last_insert_id,"capacity"=>$edata['wspcapacity'][$ckey],'make'=>$edata['wspmake'][$ckey],'type'=>$edata['wspphase'][$ckey]); 







					if($type=="graphs")


				  $diconsumptn = array("site"=>$edata['site'],"month"=>$edata['month'],"year"=>$edata['year'],'title'=>$consuption,'desciption'=>"",'location'=>"",'remarks'=>"",'before_image'=>'','type'=>$type); 
				  
				  else
				  
				  $diconsumptn = array("site"=>$edata['site'],"month"=>$edata['month'],"year"=>$edata['year'],'title'=>$consuption,'desciption'=>$edata['desciption'][$ckey],'location'=>$edata['location'][$ckey],'remarks'=>$edata['remarks'][$ckey],'type'=>$type); 

				





				  







				 $report->update($diconsumptn);







				  $filename = uniqid();



					if(isset($edata['after_image'][$ckey]) && $type=="violation") {
						$req = $edata['after_image'][$ckey];
						$Transid = $edata['pbaid'][$ckey];
						$extension = $req->getClientOriginalExtension();
						$file = $req->move('hosekpact',$filename."_"."mmrmonthly".$Transid.".".$extension);
						$filename_extension = $filename."_"."mmrmonthly".$Transid.".".$extension;
						$req_array =  array("after_image"=> $filename_extension);
						if($type!="graphs")
						{
							$w=200; 
							$h=200; 
							$newfilename= "hosekpact/"."tiny_".$filename."_"."mmrmonthly".$Transid.".".$extension;
							resize_byratio("hosekpact/".$filename_extension, $w, $h, $newfilename);
						}
						$report = Mmrmonthlyreport::findOrFail($Transid);
						$report->update($req_array);
					} 	



				     if(isset($edata['before_image'][$ckey])) {







					    $req = $edata['before_image'][$ckey];







					    $Transid = $edata['pbaid'][$ckey];







						$extension = $req->getClientOriginalExtension();





						if($type=="graphs")

						{

							

							if($consuption=="Power Consumtion") $gname = "pconsumtion";

							if($consuption=="Water Consumtion") $gname = "wconsumtion";

							if($consuption=="Power Failure") $gname = "pfconsumtion";

							if($consuption=="Diesel Consumed") $gname = "dconsumtion";

							$file = $req->move('graphs',$edata['site']."_".$edata['month']."_".$edata['year']."_".$gname.".".$extension);

							$filename_extension = 'graphs/'.$edata['site']."_".$edata['month']."_".$edata['year']."_".$gname.".".$extension;

						}

						else

						{

							$file = $req->move('hosekpact',$filename."_"."mmrmonthly".$Transid.".".$extension);

							$filename_extension = $filename."_"."mmrmonthly".$Transid.".".$extension;
							
							$w=200; 
							$h=200; 
							$newfilename= "hosekpact/"."tiny_".$filename."_"."mmrmonthly".$Transid.".".$extension;
							resize_byratio("hosekpact/".$filename_extension, $w, $h, $newfilename);

						}



						$req_array =  array("before_image"=> $filename_extension);







						$report = Mmrmonthlyreport::findOrFail($Transid);







						$report->update($req_array);







					}







					







					







				 }else {







				 







				  $filename = uniqid();




				   if($type=="graphs")


				  $diconsumptn = array("site"=>$edata['site'],"month"=>$edata['month'],"year"=>$edata['year'],'title'=>$consuption,'desciption'=>"",'location'=>"",'remarks'=>"",'before_image'=>'','type'=>$type); 
				  
				  else
				  
				  $diconsumptn = array("site"=>$edata['site'],"month"=>$edata['month'],"year"=>$edata['year'],'title'=>$consuption,'desciption'=>$edata['desciption'][$ckey],'location'=>$edata['location'][$ckey],'remarks'=>$edata['remarks'][$ckey],'before_image'=>'','type'=>$type); 







					  $insertcon = Mmrmonthlyreport::create($diconsumptn); 







					  $Transid = $insertcon->id;







					  if(isset($edata['before_image'][$ckey])) {







					   $req = $edata['before_image'][$ckey];







						$extension = $req->getClientOriginalExtension();





						if($type=="graphs")

						{

							

							if($consuption=="Power Consumtion") $gname = "pconsumtion";

							if($consuption=="Water Consumtion") $gname = "wconsumtion";

							if($consuption=="Power Failure") $gname = "pfconsumtion";

							if($consuption=="Diesel Consumed") $gname = "dconsumtion";

							$file = $req->move('graphs',$edata['site']."_".$edata['month']."_".$edata['year']."_".$gname.".".$extension);

							$filename_extension = 'graphs/'.$edata['site']."_".$edata['month']."_".$edata['year']."_".$gname.".".$extension;
							
							
						}

						else

						{

							$file = $req->move('hosekpact',$filename."_"."mmrmonthly".$Transid.".".$extension);

							$filename_extension = $filename."_"."mmrmonthly".$Transid.".".$extension;
							$w=200; 
							$h=200; 
							$newfilename= "hosekpact/"."tiny_".$filename."_"."mmrmonthly".$Transid.".".$extension;
							resize_byratio("hosekpact/".$filename_extension, $w, $h, $newfilename);

						}

						/*$file = $req->move('hosekpact',$filename."_"."mmrmonthly".$Transid.".".$extension);







						$filename_extension = 'hosekpact/'.$filename."_"."mmrmonthly".$Transid.".".$extension;*/







						$req_array =  array("before_image"=> $filename_extension);







						$report = Mmrmonthlyreport::findOrFail($Transid);







						$report->update($req_array);







						} 	



						if(isset($edata['after_image'][$ckey])  && $type=="violation") {
							$req = $edata['after_image'][$ckey];
							$extension = $req->getClientOriginalExtension();
							$file = $req->move('hosekpact',$filename."_"."mmrmonthly".$Transid.".".$extension);
							$filename_extension = $filename."_"."mmrmonthly".$Transid.".".$extension;
							
							$w=200; 
							$h=200; 
							$newfilename= "hosekpact/"."tiny_".$filename_extension;
							resize_byratio("hosekpact/".$filename_extension, $w, $h, $newfilename);
							$req_array =  array("after_image"=> $filename_extension);
							$report = Mmrmonthlyreport::findOrFail($Transid);
							$report->update($req_array);
						} 	



				     }







				 }







			    } 







			   }







		 }  







		 







		







	    $relations = [







			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', ''),







			'sites_attr_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id'),







			'site' => $site,







			'month' => $month,







			'year' => $year,















        ];







	







//	return redirect('/misreports?y='.$year.'&m='.$month);







		 







		 return redirect('/mmr/main?y='.$year.'&m='.$month.'&site='.$site);







		 //return view('updatemmr',$relations);















    }  







	public function storemmrpetmonthly(Request $request)















    {  







	   







       // $assets = Audit::all();







		







		$edata = $request->all();







		$site = $edata['site'];







		$month = $edata['month'];







		$year = $edata['year'];







		 if(isset($edata['type'])) {







		 if(count($edata['type'] > 0)){







		 if($edata['type']) {







		 	   foreach($edata['type'] as $ckey => $consuption){

			   

			   

			    if($consuption) $type = $consuption; else $type="";

				

				if($edata['location'][$ckey]!="") $location = $edata['location'][$ckey]; else $location = "";

				

				if($edata['report_date'][$ckey]!="") $report_date = date("Y-m-d",strtotime($edata['report_date'][$ckey])); else $report_date = "";

				

				if($edata['description'][$ckey]!="") $description =  $edata['description'][$ckey]; else $description =  "";







			     //$edata['report_on'][$ckey] = date("Y-m-d",strtotime($edata['report_on'][$ckey]));




				


			   	 if($edata['pbaid'][$ckey] > 0) {







				

				  







				 $report = Mmrpetreport::findOrFail($edata['pbaid'][$ckey]);







				 







				 //$diconsumptn = array("site"=>$last_insert_id,"capacity"=>$edata['wspcapacity'][$ckey],'make'=>$edata['wspmake'][$ckey],'type'=>$edata['wspphase'][$ckey]); 







				







				 $diconsumptn = array("site"=>$edata['site'],"month"=>$edata['month'],"year"=>$edata['year'],'type'=>$type,'location'=>$location,'report_date'=>$report_date,'description'=>$description);   







				 $report->update($diconsumptn);







				  $filename = uniqid();





					

				     if(isset($edata['before_image'][$ckey])) {







					    $req = $edata['before_image'][$ckey];







					    $Transid = $edata['pbaid'][$ckey];







						$extension = $req->getClientOriginalExtension();







						$file = $req->move('hosekpact',$filename."_"."mmrpetmonthly".$Transid.".".$extension);







						$filename_extension = $filename."_"."mmrpetmonthly".$Transid.".".$extension;


						$w=200; 
						$h=200; 
						$newfilename= "hosekpact/"."tiny_".$filename_extension;
						resize_byratio("hosekpact/".$filename_extension, $w, $h, $newfilename);




						$req_array =  array("before_image"=> $filename_extension);




						


						$report = Mmrpetreport::findOrFail($Transid);



					



						$report->update($req_array);







					}





					if(isset($edata['after_image'][$ckey]) && $type=="violation") 
					{
						$req = $edata['after_image'][$ckey];
						$Transid = $edata['pbaid'][$ckey];
						$extension = $req->getClientOriginalExtension();
						$file = $req->move('hosekpact',$filename."_"."mmrmonthly".$Transid.".".$extension);
						$filename_extension = $filename."_"."mmrmonthly".$Transid.".".$extension;
						
						$w=200; 
						$h=200; 
						$newfilename= "hosekpact/"."tiny_".$filename_extension;
						resize_byratio("hosekpact/".$filename_extension, $w, $h, $newfilename);
							
							
						$req_array =  array("after_image"=> $filename_extension);
						$report = Mmrmonthlyreport::findOrFail($Transid);
						$report->update($req_array);
					}

					







					







				 }else {







				 







				  $filename = uniqid();







				  $diconsumptn = array("site"=>$edata['site'],"month"=>$edata['month'],"year"=>$edata['year'],'type'=>$type,'location'=>$location,'report_date'=>$report_date,'description'=>$description);   







					  $insertcon = Mmrpetreport::create($diconsumptn); 







					  $Transid = $insertcon->id;



					if(isset($edata['after_image'][$ckey]) && $type=="violation") 
					{
						$req = $edata['after_image'][$ckey];
						$Transid = $edata['pbaid'][$ckey];
						$extension = $req->getClientOriginalExtension();
						$file = $req->move('hosekpact',$filename."_"."mmrmonthly".$Transid.".".$extension);
						$filename_extension = $filename."_"."mmrmonthly".$Transid.".".$extension;
						
						$w=200; 
						$h=200; 
						$newfilename= "hosekpact/"."tiny_".$filename_extension;
						resize_byratio("hosekpact/".$filename_extension, $w, $h, $newfilename);
							
						$req_array =  array("after_image"=> $filename_extension);
						$report = Mmrpetreport::findOrFail($Transid);
						$report->update($req_array);
					}



					  if(isset($edata['before_image'][$ckey])) {







					   $req = $edata['before_image'][$ckey];







						$extension = $req->getClientOriginalExtension();







						$file = $req->move('hosekpact',$filename."_"."mmrmonthly".$Transid.".".$extension);







						$filename_extension = $filename."_"."mmrmonthly".$Transid.".".$extension;
						
						
						$w=200; 
						$h=200; 
						$newfilename= "hosekpact/"."tiny_".$filename_extension;
						resize_byratio("hosekpact/".$filename_extension, $w, $h, $newfilename);







						$req_array =  array("before_image"=> $filename_extension);







						$report = Mmrpetreport::findOrFail($Transid);







						$report->update($req_array);







						} 	







				     }







				 }







			    } 







			   }







		 }  







		 







		







	    $relations = [







			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', ''),







			'sites_attr_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id'),







			'site' => $site,







			'month' => $month,







			'year' => $year,















        ];







	







//	return redirect('/misreports?y='.$year.'&m='.$month);







		 







		 return redirect('/mmr/main?y='.$year.'&m='.$month.'&site='.$site);







		 //return view('updatemmr',$relations);















    }  




	public function storemmreventmonth(Request $request)
    {  
		$edata = $request->all();
		$site = $edata['site'];
		$month = $edata['month'];
		$year = $edata['year'];
		if(isset($edata['type'])) 
		{
			if(count($edata['type'] > 0))
			{
				 if($edata['type']) 
				 {
					   foreach($edata['type'] as $ckey => $consuption)
					   {
						 if($consuption) $type = $consuption; else $type="";
						 if($edata['location'][$ckey]!="") $location = $edata['location'][$ckey]; else $location = "";
						 if($edata['report_date'][$ckey]!="") $report_date = date("Y-m-d",strtotime($edata['report_date'][$ckey])); else $report_date = "";
						 if($edata['description'][$ckey]!="") $description =  $edata['description'][$ckey]; else $description =  "";
		
						 if($edata['pbaid'][$ckey] > 0) {
						 $report = Mmreventreport::findOrFail($edata['pbaid'][$ckey]);
						 $Transid = $report->id;
							
						 $diconsumptn = array("site"=>$edata['site'],"month"=>$edata['month'],"year"=>$edata['year'],'type'=>$type,'location'=>$location,'report_date'=>$report_date,'description'=>$description); 
						 $report->update($diconsumptn);
						 $filename = uniqid();
						 if(isset($edata['before_image1'][$ckey])) 
						 {
							   $req = $edata['before_image1'][$ckey];
							   $extension = $req->getClientOriginalExtension();
							   $file = $req->move('hosekpact',$filename."_"."events1".$Transid.".".$extension);
							   $filename_extension = $filename."_"."events1".$Transid.".".$extension;
							   
							   $w=200; 
								$h=200; 
								$newfilename= "hosekpact/"."tiny_".$filename_extension;
								resize_byratio("hosekpact/".$filename_extension, $w, $h, $newfilename);
							
							
							   $req_array =  array("before_image1"=> $filename_extension);
							   $report = Mmreventreport::findOrFail($Transid);
							   $report->update($req_array);
						  }
						  if(isset($edata['before_image2'][$ckey])) 
						  {
								$req = $edata['before_image2'][$ckey];
								$extension = $req->getClientOriginalExtension();
								$file = $req->move('hosekpact',$filename."_"."events2".$Transid.".".$extension);
								$filename_extension = $filename."_"."events2".$Transid.".".$extension;
								
								$w=200; 
								$h=200; 
								$newfilename= "hosekpact/"."tiny_".$filename_extension;
								resize_byratio("hosekpact/".$filename_extension, $w, $h, $newfilename);
							
								$req_array =  array("before_image2"=> $filename_extension);
								$report = Mmreventreport::findOrFail($Transid);
								$report->update($req_array);
						  } 
						  if(isset($edata['before_image3'][$ckey])) 
						  {
								$req = $edata['before_image3'][$ckey];
								$extension = $req->getClientOriginalExtension();
								$file = $req->move('hosekpact',$filename."_"."events3".$Transid.".".$extension);
								$filename_extension = $filename."_"."events3".$Transid.".".$extension;
								
								$w=200; 
								$h=200; 
								$newfilename= "hosekpact/"."tiny_".$filename_extension;
								resize_byratio("hosekpact/".$filename_extension, $w, $h, $newfilename);
							
							
								$req_array =  array("before_image3"=> $filename_extension);
								$report = Mmreventreport::findOrFail($Transid);
								$report->update($req_array);
						   } 
						  if(isset($edata['before_image4'][$ckey])) 
						  {
								$req = $edata['before_image4'][$ckey];
								$extension = $req->getClientOriginalExtension();
								$file = $req->move('hosekpact',$filename."_"."events4".$Transid.".".$extension);
								$filename_extension = $filename."_"."events4".$Transid.".".$extension;
								
								$w=200; 
								$h=200; 
								$newfilename= "hosekpact/"."tiny_".$filename_extension;
								resize_byratio("hosekpact/".$filename_extension, $w, $h, $newfilename);
							
							
								$req_array =  array("before_image4"=> $filename_extension);
								$report = Mmreventreport::findOrFail($Transid);
								$report->update($req_array);
						   } 
						 }
						 else 
						 {
						  $filename = uniqid();
						  $diconsumptn = array("site"=>$edata['site'],"month"=>$edata['month'],"year"=>$edata['year'],'type'=>$type,'location'=>$location,'report_date'=>$report_date,'description'=>$description);  
						  $insertcon = Mmreventreport::create($diconsumptn); 
						  $Transid = $insertcon->id;
						  if(isset($edata['before_image1'][$ckey])) 
						  {
							   $req = $edata['before_image1'][$ckey];
							   $extension = $req->getClientOriginalExtension();
							   $file = $req->move('hosekpact',$filename."_"."events1".$Transid.".".$extension);
							   $filename_extension = $filename."_"."events1".$Transid.".".$extension;
							   
							   $w=200; 
								$h=200; 
								$newfilename= "hosekpact/"."tiny_".$filename_extension;
								resize_byratio("hosekpact/".$filename_extension, $w, $h, $newfilename);
							
							
							   $req_array =  array("before_image1"=> $filename_extension);
							   $report = Mmreventreport::findOrFail($Transid);
							   $report->update($req_array);
						  }
						  if(isset($edata['before_image2'][$ckey])) 
						  {
								$req = $edata['before_image2'][$ckey];
								$extension = $req->getClientOriginalExtension();
								$file = $req->move('hosekpact',$filename."_"."events2".$Transid.".".$extension);
								$filename_extension = $filename."_"."events2".$Transid.".".$extension;
								
								$w=200; 
								$h=200; 
								$newfilename= "hosekpact/"."tiny_".$filename_extension;
								resize_byratio("hosekpact/".$filename_extension, $w, $h, $newfilename);
							
							
								$req_array =  array("before_image2"=> $filename_extension);
								$report = Mmreventreport::findOrFail($Transid);
								$report->update($req_array);
						   } 
						  if(isset($edata['before_image3'][$ckey])) 
						  {
								$req = $edata['before_image3'][$ckey];
								$extension = $req->getClientOriginalExtension();
								$file = $req->move('hosekpact',$filename."_"."events3".$Transid.".".$extension);
								$filename_extension = $filename."_"."events3".$Transid.".".$extension;
								
								$w=200; 
								$h=200; 
								$newfilename= "hosekpact/"."tiny_".$filename_extension;
								resize_byratio("hosekpact/".$filename_extension, $w, $h, $newfilename);
								
							
								$req_array =  array("before_image3"=> $filename_extension);
								$report = Mmreventreport::findOrFail($Transid);
								$report->update($req_array);
						   } 
						  if(isset($edata['before_image4'][$ckey])) 
						  {
								$req = $edata['before_image4'][$ckey];
								$extension = $req->getClientOriginalExtension();
								$file = $req->move('hosekpact',$filename."_"."events4".$Transid.".".$extension);
								$filename_extension = $filename."_"."events4".$Transid.".".$extension;
								
								$w=200; 
								$h=200; 
								$newfilename= "hosekpact/"."tiny_".$filename_extension;
								resize_byratio("hosekpact/".$filename_extension, $w, $h, $newfilename);
							
							
								$req_array =  array("before_image4"=> $filename_extension);
								$report = Mmreventreport::findOrFail($Transid);
								$report->update($req_array);
						   } 
						}
					}
				} 
			}
		}   
  		$relations = [
			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', ''),
			'sites_attr_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id'),

			'site' => $site,

			'month' => $month,

			'year' => $year,

        ];
		return redirect('/mmr/main?y='.$year.'&m='.$month.'&site='.$site);

    }  
	

	public function storehkcmmmrmonthly(Request $request)















    {  







	   







       // $assets = Audit::all();







		







		$edata = $request->all();





		$site = $edata['site'];







		$month = $edata['month'];







		$year = $edata['year'];







		$type = $edata['type'];  





		 $eqp_name = "";

		 

		 $qty = "";

		 

		 $purpose_of_use = "";

		 

		 $availability = "";

		 



		 if(isset($edata['eqp_name'])) {







		 if(count($edata['eqp_name'] > 0)){







		 if($edata['eqp_name']) {







		 	   foreach($edata['eqp_name'] as $ckey => $machinery){







			     //$edata['report_on'][$ckey] = date("Y-m-d",strtotime($edata['report_on'][$ckey]));







			   	 if($edata['pbaid'][$ckey] > 0) {



				if($machinery) $eqp_name = $machinery; else $machinery="";

				

				if($edata['qty'][$ckey]!="") $qty = $edata['qty'][$ckey]; else $qty = "";

				

				if($edata['purpose_of_use'][$ckey]!="") $purpose_of_use = $edata['purpose_of_use'][$ckey]; else $purpose_of_use = "";

				

				if($edata['availability'][$ckey]!="") $availability =  $edata['availability'][$ckey]; else $availability =  "";

				  







				 $report = Mmrhkcmmonthlyreport::findOrFail($edata['pbaid'][$ckey]);







				 







				 //$diconsumptn = array("site"=>$last_insert_id,"capacity"=>$edata['wspcapacity'][$ckey],'make'=>$edata['wspmake'][$ckey],'type'=>$edata['wspphase'][$ckey]); 







				







				 $diconsumptn = array("site"=>$edata['site'],"month"=>$edata['month'],"year"=>$edata['year'],'eqp_name'=>$eqp_name,'qty'=>$qty,'purpose_of_use'=>$purpose_of_use,'availability'=>$availability,'type'=>$type);   







				 $report->update($diconsumptn);





				 }else {





				if($machinery) $eqp_name = $machinery; else $machinery="";

				

				if($edata['qty'][$ckey]!="") $qty = $edata['qty'][$ckey]; else $qty = "";

				

				if($edata['purpose_of_use'][$ckey]!="") $purpose_of_use = $edata['purpose_of_use'][$ckey]; else $purpose_of_use = "";

				

				if($edata['availability'][$ckey]!="") $availability =  $edata['availability'][$ckey]; else $availability =  "";

				  

				 







				  $filename = uniqid();







				  $diconsumptn = array("site"=>$edata['site'],"month"=>$edata['month'],"year"=>$edata['year'],'eqp_name'=>$eqp_name,'qty'=>$qty,'purpose_of_use'=>$purpose_of_use,'availability'=>$availability,'type'=>$type); 

				  

				  

				  	//echo "<pre>"; print_r($diconsumptn); echo "</pre>";







					  $insertcon = Mmrhkcmmonthlyreport::create($diconsumptn); 







					  $Transid = $insertcon->id;







				     }







				 }







			    } 







			   }







		 }  







		 







		







	    $relations = [







			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', ''),







			'sites_attr_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id'),







			'site' => $site,







			'month' => $month,







			'year' => $year,















        ];







	







//	return redirect('/misreports?y='.$year.'&m='.$month);







		 







		 return redirect('/mmr/main?y='.$year.'&m='.$month.'&site='.$site);







		 //return view('updatemmr',$relations);















    }  





	public function storewarantymmmrmonthly(Request $request)





	{

		  







	   







       // $assets = Audit::all();







		







		$edata = $request->all();





		$site = $edata['site'];







		$month = $edata['month'];







		$year = $edata['year'];





		 $eqp_name = "";

		 

		 $qty = "";

		 

		 $purpose_of_use = "";

		 

		 $availability = "";

		 



		 if(isset($edata['asset_description'])) {







		 if(count($edata['asset_description'] > 0)){







		 if($edata['asset_description']) {







		 	   foreach($edata['asset_description'] as $ckey => $machinery){







			     //$edata['report_on'][$ckey] = date("Y-m-d",strtotime($edata['report_on'][$ckey]));







			   	if($edata['pbaid'][$ckey] > 0) {



				if($machinery) $eqp_name = $machinery; else $machinery="";

				

				if($edata['capacity_qty'][$ckey]!="") $capacity_qty = $edata['capacity_qty'][$ckey]; else $capacity_qty = "";

				

				if($edata['location'][$ckey]!="") $location = $edata['location'][$ckey]; else $location = "";

				

				if($edata['vendor_name'][$ckey]!="") $vendor_name =  $edata['vendor_name'][$ckey]; else $vendor_name =  "";

				

				

				if($edata['PO/WO'][$ckey]!="") $powo = $edata['PO/WO'][$ckey]; else $powo = "";

				

				if($edata['warranty_from'][$ckey]!="") $warranty_from = date("Y-m-d",strtotime($edata['warranty_from'][$ckey])); else $warranty_from = "";

				

				if($edata['warranty_to'][$ckey]!="") $warranty_to =  date("Y-m-d",strtotime($edata['warranty_to'][$ckey])); else $warranty_to =  "";

				

				

				if($edata['amc_from'][$ckey]!="") $amc_from = date("Y-m-d",strtotime($edata['amc_from'][$ckey])); else $amc_from = "";

				

				if($edata['amc_to'][$ckey]!="") $amc_to =  date("Y-m-d",strtotime($edata['amc_to'][$ckey])); else $amc_to =  "";

				

				if($edata['amc_status'][$ckey]!="") $amc_status =  $edata['amc_status'][$ckey]; else $amc_status =  "";

				  

				if($edata['remarks'][$ckey]!="") $remarks =  $edata['remarks'][$ckey]; else $remarks =  "";



				 $report = Mmrwarantyreport::findOrFail($edata['pbaid'][$ckey]);







				 







				 //$diconsumptn = array("site"=>$last_insert_id,"capacity"=>$edata['wspcapacity'][$ckey],'make'=>$edata['wspmake'][$ckey],'type'=>$edata['wspphase'][$ckey]); 







				

				





				 



				 $diconsumptn = array("site"=>$edata['site'],"month"=>$edata['month'],"year"=>$edata['year'],'asset_description'=>$eqp_name,'capacity_qty'=>$capacity_qty,'location'=>$location,'vendor_name'=>$vendor_name,'PO/WO'=>$powo,'warranty_from'=>$warranty_from,'warranty_to'=>$warranty_to,'amc_from'=>$amc_from,'amc_to'=>$amc_to,'amc_status'=>$amc_status,'remarks'=>$remarks);   







				 







				 $report->update($diconsumptn);





				 }else {





				if($machinery) $eqp_name = $machinery; else $machinery="";

				

				if($edata['capacity_qty'][$ckey]!="") $capacity_qty = $edata['capacity_qty'][$ckey]; else $capacity_qty = "";

				

				if($edata['location'][$ckey]!="") $location = $edata['location'][$ckey]; else $location = "";

				

				if($edata['vendor_name'][$ckey]!="") $vendor_name =  $edata['vendor_name'][$ckey]; else $vendor_name =  "";

				

				

				if($edata['PO/WO'][$ckey]!="") $powo = $edata['PO/WO'][$ckey]; else $powo = "";

				

				if($edata['warranty_from'][$ckey]!="") $warranty_from = date("Y-m-d",strtotime($edata['warranty_from'][$ckey])); else $warranty_from = "";

				

				if($edata['warranty_to'][$ckey]!="") $warranty_to =  date("Y-m-d",strtotime($edata['warranty_to'][$ckey])); else $warranty_to =  "";

				

				

				if($edata['amc_from'][$ckey]!="") $amc_from = date("Y-m-d",strtotime($edata['amc_from'][$ckey])); else $amc_from = "";

				

				if($edata['amc_to'][$ckey]!="") $amc_to =  date("Y-m-d",strtotime($edata['amc_to'][$ckey])); else $amc_to =  "";

				

				if($edata['amc_status'][$ckey]!="") $amc_status =  $edata['amc_status'][$ckey]; else $amc_status =  "";

				  

				if($edata['remarks'][$ckey]!="") $remarks =  $edata['remarks'][$ckey]; else $remarks =  "";





				 



				 $diconsumptn = array("site"=>$edata['site'],"month"=>$edata['month'],"year"=>$edata['year'],'asset_description'=>$eqp_name,'capacity_qty'=>$capacity_qty,'location'=>$location,'vendor_name'=>$vendor_name,'PO/WO'=>$powo,'warranty_from'=>$warranty_from,'warranty_to'=>$warranty_to,'amc_from'=>$amc_from,'amc_to'=>$amc_to,'amc_status'=>$amc_status,'remarks'=>$remarks);   









				





					  $insertcon = Mmrwarantyreport::create($diconsumptn); 







					  $Transid = $insertcon->id;







				     }







				 }







			    } 







			   }







		 }  







		 







		







	    $relations = [







			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', ''),







			'sites_attr_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id'),







			'site' => $site,







			'month' => $month,







			'year' => $year,















        ];







	







//	return redirect('/misreports?y='.$year.'&m='.$month);







		 







		 return redirect('/mmr/main?y='.$year.'&m='.$month.'&site='.$site);







		 //return view('updatemmr',$relations);















    

	}



	







	







	public function storemanpower(Request $request)
    { 

		$edata = $request->all();

		$site = $edata['site'];
		$month = $edata['month'];
		$year = $edata['year'];

		  $edata = $request->all();
		  foreach($edata['mpdays'] as $key=>$val)
		  {
			 	$mpdays = $val;
				$id =  $edata['ids'][$key];
				$site = $edata['site'];
				$month = $edata['month'];
				$year = $edata['year'];
				if($id > 0){					
					$data = array("mpdays"=>$mpdays);
		  			$category = Manpowersvalidation::find($id);
					$category->update($data);
				}
			 }
			
	    $relations = [







			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', ''),







			'sites_attr_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id'),







			'site' => $site,







			'month' => $month,







			'year' => $year,















        ];







	







//	return redirect('/misreports?y='.$year.'&m='.$month);







		 







		 return redirect('/mmr/main?y='.$year.'&m='.$month.'&site='.$site);







		 //return view('updatemmr',$relations);















    }  







	







	



	public function storewsptestreport(Request $request)



    { 



	



		$edata = $request->all();



		



		if(isset($edata['report_idate']) && $edata['report_idate']!="") $edata['report_idate'] = date("Y-m-d",strtotime($edata['report_idate']));



		//if(isset($edata['regis_date']) && $edata['regis_date']!="") $edata['regis_date'] = date("Y-m-d",strtotime($edata['regis_date']));



		//if(isset($edata['ref_date']) && $edata['ref_date']!="") $edata['ref_date'] = date("Y-m-d",strtotime($edata['ref_date']));



		if(isset($edata['analy_startdate']) && $edata['analy_startdate']!="") $edata['analy_startdate'] = date("Y-m-d",strtotime($edata['analy_startdate']));



		if(isset($edata['analy_compdate']) && $edata['analy_compdate']!="") $edata['analy_compdate'] = date("Y-m-d",strtotime($edata['analy_compdate']));



		







		$site = $edata['site'];







		$month = $edata['month'];







		$year = $edata['year'];







		if($edata['record'] > 0) {







		 $report = Wspmtreport::findOrFail($edata['record']);







						$report->update($edata);



					$Transid = $edata['record'];


					if(isset($edata['wspinlet_pic'])) {
						$filename = uniqid();						
					    $req = $edata['wspinlet_pic'];
						$extension = $req->getClientOriginalExtension();
						$file = $req->move('wsp',$filename."_"."wspinlet".$Transid.".".$extension);
						$filename_extension = 'wsp/'.$filename."_"."wspinlet".$Transid.".".$extension;
						$req_array =  array("wspinlet_pic"=> $filename_extension);
						$report->update($req_array);
					}



				}else {







				$insertcon = Wspmtreport::create($edata); 

				$Transid = $insertcon->id;
					
				$report = Wspmotreport::findOrFail($Transid);
				if(isset($edata['wspinlet_pic'])) {
					$filename = uniqid();						
					$req = $edata['wspoutlet_pic'];
					$extension = $req->getClientOriginalExtension();
					$file = $req->move('wsp',$filename."_"."wspinlet".$Transid.".".$extension);
					$filename_extension = 'wsp/'.$filename."_"."wspinlet".$Transid.".".$extension;
					$req_array =  array("wspinlet_pic"=> $filename_extension);
					$report->update($req_array);
				}


			}





		

		







	    $relations = [







			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', ''),







			'sites_attr_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id'),







			'site' => $site,







			'month' => $month,







			'year' => $year,















        ];



		return redirect('/mmr/main?y='.$year.'&m='.$month.'&site='.$site);



    }  

	

	

	

	public function storestptestreport(Request $request)



    { 



	



		$edata = $request->all();



		



		if(isset($edata['report_idate']) && $edata['report_idate']!="") $edata['report_idate'] = date("Y-m-d",strtotime($edata['report_idate']));



		//if(isset($edata['regis_date']) && $edata['regis_date']!="") $edata['regis_date'] = date("Y-m-d",strtotime($edata['regis_date']));



		//if(isset($edata['ref_date']) && $edata['ref_date']!="") $edata['ref_date'] = date("Y-m-d",strtotime($edata['ref_date']));



		if(isset($edata['analy_startdate']) && $edata['analy_startdate']!="") $edata['analy_startdate'] = date("Y-m-d",strtotime($edata['analy_startdate']));



		if(isset($edata['analy_compdate']) && $edata['analy_compdate']!="") $edata['analy_compdate'] = date("Y-m-d",strtotime($edata['analy_compdate']));



		







		$site = $edata['site'];







		$month = $edata['month'];







		$year = $edata['year'];







		if($edata['record'] > 0) {







		 $report = Stpintreport::findOrFail($edata['record']);







						$report->update($edata);

					$Transid = $edata['record'];


					if(isset($edata['stpinlet_pic'])) 
					{
							$filename = uniqid();						
							$req = $edata['stpinlet_pic'];
							$extension = $req->getClientOriginalExtension();
							$file = $req->move('wsp',$filename."_"."stpinlet".$Transid.".".$extension);
							$filename_extension = 'wsp/'.$filename."_"."stpinlet".$Transid.".".$extension;
							$req_array =  array("stpinlet_pic"=> $filename_extension);
							$report->update($req_array);
					}


					




				}else {
				
				$insertcon = Stpintreport::create($edata); 


				$Transid = $insertcon->id;

				$report = Stpintreport::findOrFail($Transid);
				if(isset($edata['stpinlet_pic'])) {
					$filename = uniqid();						
					$req = $edata['stpinlet_pic'];
					$extension = $req->getClientOriginalExtension();
					$file = $req->move('wsp',$filename."_"."stpinlet".$Transid.".".$extension);
					$filename_extension = 'wsp/'.$filename."_"."stpinlet".$Transid.".".$extension;
					$req_array =  array("stpinlet_pic"=> $filename_extension);
					$report->update($req_array);
				}



				}







		







	    $relations = [







			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', ''),







			'sites_attr_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id'),







			'site' => $site,







			'month' => $month,







			'year' => $year,















        ];



		return redirect('/mmr/main?y='.$year.'&m='.$month.'&site='.$site);



    } 

	

	

	

	public function storestptestreport1(Request $request)



    { 



	



		$edata = $request->all();



		



		if(isset($edata['report_idate']) && $edata['report_idate']!="") $edata['report_idate'] = date("Y-m-d",strtotime($edata['report_idate']));



		//if(isset($edata['regis_date']) && $edata['regis_date']!="") $edata['regis_date'] = date("Y-m-d",strtotime($edata['regis_date']));



		//if(isset($edata['ref_date']) && $edata['ref_date']!="") $edata['ref_date'] = date("Y-m-d",strtotime($edata['ref_date']));



		if(isset($edata['analy_startdate']) && $edata['analy_startdate']!="") $edata['analy_startdate'] = date("Y-m-d",strtotime($edata['analy_startdate']));



		if(isset($edata['analy_compdate']) && $edata['analy_compdate']!="") $edata['analy_compdate'] = date("Y-m-d",strtotime($edata['analy_compdate']));



		







		$site = $edata['site'];







		$month = $edata['month'];







		$year = $edata['year'];







		if($edata['record'] > 0) {







					 $report = Stpoutreport::findOrFail($edata['record']);
					 $report->update($edata);


					$Transid = $edata['record'];
					if(isset($edata['stpoutlet_pic'])) 
					{
							$filename = uniqid();						
							$req = $edata['stpoutlet_pic'];
							$extension = $req->getClientOriginalExtension();
							$file = $req->move('wsp',$filename."_"."sepoutlet".$Transid.".".$extension);
							$filename_extension = 'wsp/'.$filename."_"."sepoutlet".$Transid.".".$extension;
							$req_array =  array("stpoutlet_pic"=> $filename_extension);
							$report->update($req_array);
					}




				}else {







				$insertcon = Stpoutreport::create($edata); 


				$Transid = $insertcon->id;


				if(isset($edata['stpoutlet_pic'])) 
				{
						$filename = uniqid();						
					    $req = $edata['stpoutlet_pic'];
						$extension = $req->getClientOriginalExtension();
						$file = $req->move('wsp',$filename."_"."sepoutlet".$Transid.".".$extension);
						$filename_extension = 'wsp/'.$filename."_"."sepoutlet".$Transid.".".$extension;
						$req_array =  array("stpoutlet_pic"=> $filename_extension);
						$report = Stpoutreport::findOrFail($Transid);
						$report->update($edata);
						$report->update($req_array);
				}

				}







		







	    $relations = [







			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', ''),







			'sites_attr_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id'),







			'site' => $site,







			'month' => $month,







			'year' => $year,















        ];



		return redirect('/mmr/main?y='.$year.'&m='.$month.'&site='.$site);



    } 









    public function storewsptestreport1(Request $request)



    { 



	



		$edata = $request->all();



		



		if(isset($edata['report_idate']) && $edata['report_idate']!="") $edata['report_idate'] = date("Y-m-d",strtotime($edata['report_idate']));



		//if(isset($edata['regis_date']) && $edata['regis_date']!="") $edata['regis_date'] = date("Y-m-d",strtotime($edata['regis_date']));



		//if(isset($edata['ref_date']) && $edata['ref_date']!="") $edata['ref_date'] = date("Y-m-d",strtotime($edata['ref_date']));



		if(isset($edata['analy_startdate']) && $edata['analy_startdate']!="") $edata['analy_startdate'] = date("Y-m-d",strtotime($edata['analy_startdate']));



		if(isset($edata['analy_compdate']) && $edata['analy_compdate']!="") $edata['analy_compdate'] = date("Y-m-d",strtotime($edata['analy_compdate']));



		







		$site = $edata['site'];







		$month = $edata['month'];







		$year = $edata['year'];







		if($edata['record'] > 0) {







		 $report = Wspmotreport::findOrFail($edata['record']);







						$report->update($edata);



				$Transid = $edata['record'];


				if(isset($edata['wspoutlet_pic'])) {
						$filename = uniqid();						
					    $req = $edata['wspoutlet_pic'];
						$extension = $req->getClientOriginalExtension();
						$file = $req->move('wsp',$filename."_"."wspoutlet".$Transid.".".$extension);
						$filename_extension = 'wsp/'.$filename."_"."wspoutlet".$Transid.".".$extension;
						$req_array =  array("wspoutlet_pic"=> $filename_extension);
						$report->update($req_array);
					}
				}
				
				else {







				$insertcon = Wspmotreport::create($edata); 


				$Transid = $insertcon->id;

				$report = Wspmotreport::findOrFail($Transid);
				if(isset($edata['wspoutlet_pic'])) {
					$filename = uniqid();						
					$req = $edata['wspoutlet_pic'];
					$extension = $req->getClientOriginalExtension();
					$file = $req->move('wsp',$filename."_"."wspoutlet".$Transid.".".$extension);
					$filename_extension = 'wsp/'.$filename."_"."wspoutlet".$Transid.".".$extension;
					$req_array =  array("wspoutlet_pic"=> $filename_extension);
					$report->update($req_array);
				}
			}
	    $relations = [







			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', ''),







			'sites_attr_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id'),







			'site' => $site,







			'month' => $month,







			'year' => $year,















        ];



		return redirect('/mmr/main?y='.$year.'&m='.$month.'&site='.$site);



    }  







	







			







	public function storehousekpconsume(Request $request)















    {   







	   







       // $assets = Audit::all();







		







		$edata = $request->all();







		$site = $edata['site'];







		$month = $edata['month'];







		$year = $edata['year'];







		$type = $edata['type'];







		







		/*echo "<pre>";







		   print_r($edata);







		echo "</pre>";







		exit;*/







		







		







		 if(isset($edata['category'])) {







		 if(count($edata['category'] > 0)){







		 if($edata['category']) {







		 	   foreach($edata['category'] as $ckey => $consuption){







			      $edata['report_on'][$ckey] = date("Y-m-d",strtotime($edata['report_on'][$ckey]));







			   	 if($edata['pbaid'][$ckey] > 0) {







				  







				 $report = Mmrhousekconsume::findOrFail($edata['pbaid'][$ckey]);







				 







				 //$diconsumptn = array("site"=>$last_insert_id,"capacity"=>$edata['wspcapacity'][$ckey],'make'=>$edata['wspmake'][$ckey],'type'=>$edata['wspphase'][$ckey]); 	







				 $diconsumptn = array("site"=>$edata['site'],"month"=>$edata['month'],"year"=>$edata['year'],'category'=>$consuption,'location'=>$edata['location'][$ckey],'description'=>$edata['description'][$ckey],'qty'=>$edata['qty'][$ckey],'remarks'=>$edata['remarks'][$ckey],'type'=>$type);   







				 $report->update($diconsumptn);







				    







				 }else {







				 







				  $filename = uniqid();







					  $diconsumptn = array("site"=>$edata['site'],"month"=>$edata['month'],"year"=>$edata['year'],'category'=>$consuption,'location'=>$edata['location'][$ckey],'description'=>$edata['description'][$ckey],'qty'=>$edata['qty'][$ckey],'remarks'=>$edata['remarks'][$ckey],'beforeimage'=>'','afterimage'=>'','type'=>$type);   







					  $insertcon = Mmrhousekconsume::create($diconsumptn); 







					







				   }







				 }







			    }   







			   }







		 }  







		  







	    $relations = [







			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', ''),







			'sites_attr_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id'),







			'site' => $site,







			'month' => $month,







			'year' => $year,















        ];







		







//	return redirect('/misreports?y='.$year.'&m='.$month);







		 







		 return redirect('/mmr/main?y='.$year.'&m='.$month.'&site='.$site);







		 //return view('updatemmr',$relations);















    } 


	




	







	







	 







 















}















