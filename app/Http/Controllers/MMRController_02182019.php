<?php



namespace App\Http\Controllers;



use App\Task;
use App\Indent;
use App\TaskUser;
use App\TaskAttachment;
use App\TaskReply;
use App\Emp;
use App\User;
use DB;
use Excel;
use PDF;
use File; 
use Auth;
use Config;
use App\Mmrvalidationreport;
use App\Dailylockpermission;
use Dompdf\Dompdf;
use App\Mmrhousekpact;
use App\Mmrhousekconsume;
use App\Mmrmonthlyreport;

use App\Fmsdailyreport;
use App\Pmsdailyreport;
use App\Firesafedailyreport;
use App\Firesafedailyreportvalidation;
use App\Securitydailyreport;
use App\Dailyreportvalidation;
use App\Pmsdailyreportvalidation;
use App\Securitydailyreportvalidation;
use App\Mmrmanpowerreport;
use App\Mmrmajorincident; 
use App\Mmrppmreport; 



use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input; 


use App\Http\Requests\StoreIndentsRequest;

use App\Http\Requests\UpdateIndentsRequest;



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
		 if($resnoc_count > 0){
		     $resnoc_cres = \App\Blocknocmonthreport::where($matchfields_fornoc)->get();
		    $noc_f_res[$site] = $resnoc_cres;
			if($site == 9) {$sarovar_fr =  $noc_f_res[$site];}
			   if($site == 12) {$cyber_fr =  $noc_f_res[$site];}
			   if($site == 11) {$aura_fr =  $noc_f_res[$site];}
			   if($site == 10) {$hill_aven_fr =  $noc_f_res[$site];}
			    if($site == 5) {$hill_lake_fr =  $noc_f_res[$site];}
			    if($site == 18) {$twrs_fr =  $noc_f_res[$site];}
				 if($site == 15) {$sarovargran_fr =  $noc_f_res[$site];}
		 }
		   else{
		     $matchfields_f = ['site' => $site]; 
			  $firenocdata_month_res_cn = \App\Blocknocmonthreport::where($matchfields_f)->orderBy('valid_month', 'desc')->count();
			  if($firenocdata_month_res_cn > 0) {
		     $firenocdata_month_res_emp = \App\Blocknocmonthreport::where($matchfields_f)->orderBy('valid_month', 'desc')->first();
			 $matchfields_fornoc = ['valid_month' => $firenocdata_month_res_emp->month, 'valid_year' => $year, 'site' =>$site];
		      $resnoc_cres = \App\Blocknocmonthreport::where($matchfields_fornoc)->get();
			  $noc_f_res[$site] = $resnoc_cres;
			   if($site == 9) {$sarovar_fr =  $noc_f_res[$site];}
			   if($site == 12) {$cyber_fr =  $noc_f_res[$site];}
			   if($site == 11) {$aura_fr =  $noc_f_res[$site];}
			   if($site == 10) {$hill_aven_fr =  $noc_f_res[$site];}
			    if($site == 5) {$hill_lake_fr =  $noc_f_res[$site];}
			    if($site == 18) {$twrs_fr =  $noc_f_res[$site];}
				 if($site == 15) {$sarovargran_fr =  $noc_f_res[$site];}
			  }else{
			  
			  $noc_f_res[$site] = array();  	
			   if($site == 9) {$sarovar_fr =  $noc_f_res[$site];}
			   if($site == 13) {$cyber_fr =  $noc_f_res[$site];}
			   if($site == 11) {$aura_fr =  $noc_f_res[$site];}
			   if($site == 10) {$hill_aven_fr =  $noc_f_res[$site];}
			    if($site == 5) {$hill_lake_fr =  $noc_f_res[$site];}
			    if($site == 18) {$twrs_fr =  $noc_f_res[$site];}
				 if($site == 15) {$sarovargran_fr =  $noc_f_res[$site];}
			      
			  }
			   
		   }
		   $fnmatchfields_fornoc = ['month' => $month, 'year' => $year, 'site' =>$site]; 
		   $fnresnoc_count = \App\Firesafetymisreport::where($fnmatchfields_fornoc)->count();
		   if($fnresnoc_count > 0){
		   		$fresnoc_cres = \App\Firesafetymisreport::where($fnmatchfields_fornoc)->get();
		   		$noc_f_res = $fresnoc_cres->noc_info;
				if($site == 9) {$sarovar_noc =  $noc_fn_res[$site];}
			   if($site == 12) {$cyber_noc =  $noc_fn_res[$site];}
			   if($site == 11) {$aura_noc =  $noc_fn_res[$site];}
			   if($site == 10) {$hill_aven_noc =  $noc_fn_res[$site];}
			    if($site == 5) {$hill_lake_noc =  $noc_fn_res[$site];}
			    if($site == 18) {$twrs_noc =  $noc_fn_res[$site];}
				 if($site == 15) {$sarovargran_noc =  $noc_fn_res[$site];}

		   }
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
			'sarovarinfo' => $sarovar_noc,
			'cyberinfo' => $cyber_noc,
			'gradeinfo' => $sarovargran_noc,
			'towersinfo' => $twrs_noc,
			'avenuesinfo' => $hill_aven_noc,
			'lakebinfo' => $hill_lake_noc,
			'aurainfo' => $aura_noc,
			];
			
			
			
		echo "<pre>"; print_r($relations); echo "</pre>";
		exit;
		
		
		
		$pdf = PDF::loadView('mmrreports.mmrnoc', $relations);
		//$pdf->setPaper('A4', 'landscape');
		$pdf->save(storage_path('/mmrfiles/file30.pdf'));  
		
		
		 
		
		$pdf = PDF::loadView('mmrreports.mmrpets', $relations);
		//$pdf->setPaper('A4', 'landscape');
		$pdf->save(storage_path('/mmrfiles/file31.pdf'));   
		
		$pdf = PDF::loadView('mmrreports.mmrmetrowater', $relations);
		//$pdf->setPaper('A4', 'landscape');
		$pdf->save(storage_path('/mmrfiles/file32.pdf'));   
		
		$pdf = PDF::loadView('mmrreports.mmramctrackers', $relations);
		//$pdf->setPaper('A4', 'landscape');
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
			 $flabels['sh_dgm_facility']=  "Manager - T & D";
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
		
		$resullt = array();
		$matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year, 'type'=>'metrowater']; 
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
	  
	    $pdf = PDF::loadView('mmrreports.mmr_metrowater', $relations);
		//$pdf->setPaper('A4', 'landscape');
		$pdf->save(storage_path('/mmrfiles/file14.pdf')); 
		
		
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
		
		
		// END DRILLS
	        
			

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
				$pdf->addPDF($pdfFile14Path, 'all');
				$pdf->addPDF($pdfFile20Path, 'all');  	
				if((int)$mockdrillcount > 0) { $pdf->addPDF($pdfFile17Path, 'all'); }
				if((int)$fireprepare_cn > 0) { $pdf->addPDF($pdfFile18Path, 'all'); }
				$pdf->addPDF($pdfFile30Path, 'all');
				$pdf->addPDF($pdfFile16Path, 'all');			
				$pdf->addPDF($pdfFile5Path, 'all');	
				$pdf->addPDF($pdfFile9Path, 'all');			
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

    /*echo "<pre>";
	  print_r($uriSegments);
	echo "</pre>";*/
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
	  
	  }else if($type == 3){
	  
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
	    
	   }else if($type == 7){
	  
	    $mmr_res  = array();
		$resullt = array();
	    $matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year]; 
		$matchfields = ['site' => $site]; 
		$formfieldarray = \App\Manpowervalidation::where($matchfields)->first();
		$resullt = \App\Mmrmanpowerreport::where($matchfields_hskpact)->first();
		
		//print_r($matchfields_mmr_eb);
	    $mmr_count = \App\Mmrmanpowerreport::where($matchfields_hskpact)->count();
		if($mmr_count > 0){
		$mmr_res = \App\Mmrmanpowerreport::where($matchfields_hskpact)->first();		
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
		 
		 return redirect('/updatemmr?year='.$year.'&month='.$month.'&site='.$site);
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
			    echo $edata['report_on'][$ckey] = date("Y-m-d",strtotime($edata['report_on'][$ckey]));
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
						$filename_extension = 'hosekpact/'.$filename."_"."hosekpact_before".$Transid.".".$extension;
						$req_array =  array("beforeimage"=> $filename_extension);
						$report = Mmrhousekpact::findOrFail($Transid);
						$report->update($req_array);
					}
					
					 if(isset($edata['afterimage'][$ckey])) {
					    $req = $edata['afterimage'][$ckey];
					    $Transid = $edata['pbaid'][$ckey];
						$extension = $req->getClientOriginalExtension();
						$file = $req->move('hosekpact',$filename."_"."hosekpact_after".$Transid.".".$extension);
						$filename_extension = 'hosekpact/'.$filename."_"."hosekpact_after".$Transid.".".$extension;
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
						$filename_extension = 'hosekpact/'.$filename."_"."hosekpact_before".$Transid.".".$extension;
						$req_array =  array("beforeimage"=> $filename_extension);
						$report = Mmrhousekpact::findOrFail($Transid);
						$report->update($req_array);
						} 
						
						 if(isset($edata['afterimage'][$ckey])) {
					    $req = $edata['afterimage'][$ckey];
						$extension = $req->getClientOriginalExtension();
						$file = $req->move('hosekpact',$filename."_"."hosekpact_after".$Transid.".".$extension);
						$filename_extension = 'hosekpact/'.$filename."_"."hosekpact_after".$Transid.".".$extension;
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
		 
		 return redirect('/updatemmr?year='.$year.'&month='.$month.'&site='.$site);
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
						$filename_extension = 'hosekpact/'.$filename."_"."incident_before".$Transid.".".$extension;
						$req_array =  array("beforeimage"=> $filename_extension);
						$report = Mmrmajorincident::findOrFail($Transid);
						$report->update($req_array);
					}
					
					 if(isset($edata['afterimage'][$ckey])) {
					    $req = $edata['afterimage'][$ckey];
					    $Transid = $edata['pbaid'][$ckey];
						$extension = $req->getClientOriginalExtension();
						$file = $req->move('hosekpact',$filename."_"."incident_after".$Transid.".".$extension);
						$filename_extension = 'hosekpact/'.$filename."_"."incident_after".$Transid.".".$extension;
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
						$filename_extension = 'hosekpact/'.$filename."_"."incident_before".$Transid.".".$extension;
						$req_array =  array("beforeimage"=> $filename_extension);
						$report = Mmrmajorincident::findOrFail($Transid);
						$report->update($req_array);
						} 
						
						 if(isset($edata['afterimage'][$ckey])) {
					    $req = $edata['afterimage'][$ckey];
					    $Transid = $edata['pbaid'][$ckey];
						$extension = $req->getClientOriginalExtension();
						$file = $req->move('hosekpact',$filename."_"."incident_after".$Transid.".".$extension);
						$filename_extension = 'hosekpact/'.$filename."_"."incident_before".$Transid.".".$extension;
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
		 
		 return redirect('/updatemmr?year='.$year.'&month='.$month.'&site='.$site);
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
				
				 $diconsumptn = array("site"=>$edata['site'],"month"=>$edata['month'],"year"=>$edata['year'],'asset_name'=>$consuption,'category'=>$edata['category'][$ckey],'report_on'=>$edata['report_on'][$ckey],'status'=>$edata['status'][$ckey]);   
				 $report->update($diconsumptn);
				  $filename = uniqid();
				     if(isset($edata['beforeimage'][$ckey])) {
					    $req = $edata['beforeimage'][$ckey];
					    $Transid = $edata['pbaid'][$ckey];
						$extension = $req->getClientOriginalExtension();
						$file = $req->move('hosekpact',$filename."_"."mmrbrowse".$Transid.".".$extension);
						$filename_extension = 'hosekpact/'.$filename."_"."mmrbrowse".$Transid.".".$extension;
						$req_array =  array("beforeimage"=> $filename_extension);
						$report = Mmrppmreport::findOrFail($Transid);
						$report->update($req_array);
					}
					
					
				 }else {
				 
				  $filename = uniqid();
					  $diconsumptn = array("site"=>$edata['site'],"month"=>$edata['month'],"year"=>$edata['year'],'asset_name'=>$consuption,'category'=>$edata['category'][$ckey],'report_on'=>$edata['report_on'][$ckey],'status'=>$edata['status'][$ckey],'beforeimage'=>'','afterimage'=>'');   
					  $insertcon = Mmrppmreport::create($diconsumptn); 
					  $Transid = $insertcon->id;
					  if(isset($edata['beforeimage'][$ckey])) {
					   $req = $edata['beforeimage'][$ckey];
						$extension = $req->getClientOriginalExtension();
						$file = $req->move('hosekpact',$filename."_"."mmrbrowse".$Transid.".".$extension);
						$filename_extension = 'hosekpact/'.$filename."_"."mmrbrowse".$Transid.".".$extension;
						$req_array =  array("beforeimage"=> $filename_extension);
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
		 
		 return redirect('/updatemmr?year='.$year.'&month='.$month.'&site='.$site);
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
				
				 $diconsumptn = array("site"=>$edata['site'],"month"=>$edata['month'],"year"=>$edata['year'],'title'=>$consuption,'type'=>$type);   
				 $report->update($diconsumptn);
				  $filename = uniqid();
				     if(isset($edata['before_image'][$ckey])) {
					    $req = $edata['before_image'][$ckey];
					    $Transid = $edata['pbaid'][$ckey];
						$extension = $req->getClientOriginalExtension();
						$file = $req->move('hosekpact',$filename."_"."mmrmonthly".$Transid.".".$extension);
						$filename_extension = 'hosekpact/'.$filename."_"."mmrmonthly".$Transid.".".$extension;
						$req_array =  array("before_image"=> $filename_extension);
						$report = Mmrmonthlyreport::findOrFail($Transid);
						$report->update($req_array);
					}
					
					
				 }else {
				 
				  $filename = uniqid();
				  $diconsumptn = array("site"=>$edata['site'],"month"=>$edata['month'],"year"=>$edata['year'],'title'=>$consuption,'before_image'=>'','type'=>$type); 
					  $insertcon = Mmrmonthlyreport::create($diconsumptn); 
					  $Transid = $insertcon->id;
					  if(isset($edata['before_image'][$ckey])) {
					   $req = $edata['before_image'][$ckey];
						$extension = $req->getClientOriginalExtension();
						$file = $req->move('hosekpact',$filename."_"."mmrmonthly".$Transid.".".$extension);
						$filename_extension = 'hosekpact/'.$filename."_"."mmrmonthly".$Transid.".".$extension;
						$req_array =  array("before_image"=> $filename_extension);
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
		 
		 return redirect('/updatemmr?year='.$year.'&month='.$month.'&site='.$site);
		 //return view('updatemmr',$relations);

    }  
	
	
	
		 public function storemanpower(Request $request)

    { 
	   
       // $assets = Audit::all();
		
		$edata = $request->all();
		$site = $edata['site'];
		$month = $edata['month'];
		$year = $edata['year'];
			 if($edata['record'] > 0) {
		 $report = Mmrmanpowerreport::findOrFail($edata['record']);
						$report->update($edata);
				}else {
				$insertcon = Mmrmanpowerreport::create($edata); 
				}
		
	    $relations = [
			'sites_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', ''),
			'sites_attr_names' => \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id'),
			'site' => $site,
			'month' => $month,
			'year' => $year,

        ];
	
//	return redirect('/misreports?y='.$year.'&m='.$month);
		 
		 return redirect('/updatemmr?year='.$year.'&month='.$month.'&site='.$site);
		 //return view('updatemmr',$relations);

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
				 $diconsumptn = array("site"=>$edata['site'],"month"=>$edata['month'],"year"=>$edata['year'],'category'=>$consuption,'location'=>$edata['location'][$ckey],'description'=>$edata['description'][$ckey],'report_on'=>$edata['report_on'][$ckey],'remarks'=>$edata['remarks'][$ckey],'type'=>$type);   
				 $report->update($diconsumptn);
				    
				 }else {
				 
				  $filename = uniqid();
					  $diconsumptn = array("site"=>$edata['site'],"month"=>$edata['month'],"year"=>$edata['year'],'category'=>$consuption,'location'=>$edata['location'][$ckey],'description'=>$edata['description'][$ckey],'report_on'=>$edata['report_on'][$ckey],'remarks'=>$edata['remarks'][$ckey],'beforeimage'=>'','afterimage'=>'','type'=>$type);   
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
		 
		 return redirect('/updatemmr?year='.$year.'&month='.$month.'&site='.$site);
		 //return view('updatemmr',$relations);

    } 
	
	
	 
 

}

