<?php 

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Fmsdailyreport;
use App\Pmsdailyreport;
use App\Firesafedailyreport;
use App\Securitydailyreport;
use App\CommunityAsset;

use Carbon\Carbon;
use App\Forum;
use App\Task;
use App\TaskUser;
use Auth;
use App\Communityassetmaintenance; 
class HomeController extends Controller
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
    public function index()
    {
        return view('home');
    }
	public function indexdashboard()
    {
	  $siteattrname = array();
	  $forum = array(); 
	  $fmsrec = array();
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
	       
		
	 $uid = Auth::user()->id;
	if($uid==1) 
            $assets = Task::select("tasks.*",'categories.name as catgname')
                        ->leftJoin('categories','categories.id','=','tasks.category')->take(5)->get();
        else {
            //$assets = Task::join('task_users','tasks.id','=','task_users.task_id')->where('task_users.user_id',$uid)->get();
            $assets = TaskUser::select("tasks.*",'categories.name as catgname')
                ->leftJoin('tasks','tasks.id','=','task_users.task_id')
                ->leftJoin('users','users.emp_id','=','task_users.user_id')
                ->leftJoin('categories','categories.id','=','tasks.category')
                ->where('users.id',$uid)->take(5)->get();
        }
		
		  $forum  = Forum::select("forums.*",'categories.name as catgname')
                        ->leftJoin('categories','categories.id','=','forums.category')->take(5)->get(); 
						
						foreach($siteattrname as $kk => $siten){
						    $resdate = date("Y-m-d");
							$date = date('Y-m-d');
							$resdate = date('Y-m-d', strtotime($date .' -1 day')); 
							$datefilter = date('d-m-Y', strtotime($date .' -1 day'));   
							
							$match_pmp_fields = ['site' => $kk, 'reporton' => $resdate]; 
							$match_tot_pmp_fields = ['site' => $kk]; 
							$match_count = \App\Firesafedailyreport::where($match_pmp_fields)->count();
							$match_tao_count = \App\Firesafedailyreportvalidation::where($match_tot_pmp_fields)->count();
							if($match_count > 0) {
							   $match_pmp_Res = \App\Firesafedailyreport::where($match_pmp_fields)->first();
							  
								$dgpump['nw'][$kk] =  $match_pmp_Res['dgpumpnotworking'];
								$dgpump['auto'][$kk] =  $match_pmp_Res['dgpumpauto'];
								$dgpump['off'][$kk]=  $match_pmp_Res['dgpumpoff'];
								 
								$mainpump['nw'][$kk] =  $match_pmp_Res['mainpumpnotworking'];
								$mainpump['auto'][$kk] =  $match_pmp_Res['mainpumpauto'];
								$mainpump['off'][$kk]=  $match_pmp_Res['mainpumpoff'];
								
								$jockeypmp['nw'][$kk] =  $match_pmp_Res['jockeypumpnotworking'];
								$jockeypmp['auto'][$kk] =  $match_pmp_Res['jockeypumpauto'];
								$jockeypmp['off'][$kk]=  $match_pmp_Res['jockeypumpoff'];
								
								$exahuster['co2'][$kk] =  $match_pmp_Res['co2firenotworking'];
								$exahuster['dcp'][$kk] =  $match_pmp_Res['dcpfirenotworking'];
								$exahuster['water'][$kk]=  $match_pmp_Res['waterfirenotworking'];
								
							       
								
							}
							else{
							   $dgpump['nw'][$kk]  = "";
							   $dgpump['auto'][$kk] =  "";
								$dgpump['off'][$kk]=  "";
								 
								$mainpump['nw'][$kk] =  "";
								$mainpump['auto'][$kk] = "";
								$mainpump['off'][$kk]=  "";
								
								$jockeypmp['nw'][$kk] = "";
								$jockeypmp['auto'][$kk] =  "";
								$jockeypmp['off'][$kk]= "";
								
								$exahuster['co2'][$kk] = "";
								$exahuster['dcp'][$kk] =  "";
								$exahuster['water'][$kk]= "";
							}  
							if($match_tao_count > 0){
							 $match_tot_res = \App\Firesafedailyreportvalidation::where($match_tot_pmp_fields)->first();
							 $dgpump['tot'][$kk] =  $match_tot_res['dgpump'];
							 $mainpump['tot'][$kk] =  $match_tot_res['mainpump'];
							 $jockeypmp['tot'][$kk]=  $match_tot_res['jockeypump'];
							 $exahuster['tot'][$kk]=  $match_tot_res['fireextinguishers'];
							 
							 
							}
							else{
							 $dgpump['tot'][$kk] = "";
							 $mainpump['tot'][$kk] =  "";
							 $jockeypmp['tot'][$kk]= "";
							 $exahuster['tot'][$kk] = "";
							}
							
							$match_fms_count = \App\Fmsdailyreport::where($match_pmp_fields)->count();
							if($match_fms_count > 0){
							    $match_fms_Res = \App\Fmsdailyreport::where($match_pmp_fields)->first();
									$fmsrec['pwr_ctpt'][$kk] =  getmtdfms($datefilter,$kk,'pwr_ctpt');// $match_fms_Res['pwr_ctpt'];
									$fmsrec['pwr_tot_lt'][$kk] = getmtdfms($datefilter,$kk,'pwr_tot_lt');//$match_fms_Res['pwr_tot_lt'];
									$fmsrec['pwr_residents'][$kk] = getmtdfms($datefilter,$kk,'pwr_residents');//$match_fms_Res['pwr_residents'];
									$fmsrec['pwr_club_house'][$kk] = getmtdfms($datefilter,$kk,'pwr_club_house');//$match_fms_Res['pwr_club_house'];
									$fmsrec['pwr_stp'][$kk] = getmtdfms($datefilter,$kk,'pwr_stp');//$match_fms_Res['pwr_stp'];
									$fmsrec['pwr_wsp'][$kk] = getmtdfms($datefilter,$kk,'pwr_wsp');//$match_fms_Res['pwr_wsp'];
									$fmsrec['pwr_lifts'][$kk] = getmtdfms($datefilter,$kk,'pwr_lifts');//$match_fms_Res['pwr_lifts'];
									$fmsrec['pwr_solarpwrunits'][$kk] = getmtdfms($datefilter,$kk,'pwr_solarpwrunits');//$match_fms_Res['pwr_solarpwrunits'];
									//$fmsrec['pwr_pwrfactor'][$kk] = getmtdfms($datefilter,$kk,'pwr_pwrfactor');//$match_fms_Res['pwr_pwrfactor'];
									$fmsrec['pwr_pwrfactor'][$kk] = getmtdfms($datefilter,$kk,'dgset_pwrfailure');
									$fmsrec['dset_dieselconsume'][$kk] = getmtdfms($datefilter,$kk,'dset_dieselconsume');//$match_fms_Res['dset_dieselconsume'];
									  
									$wsppwr['wsp_metro'][$kk] =  getmtdfms($datefilter,$kk,'wsp_metro'); //$match_fms_Res['wsp_metro']; 
									$wsppwr['wsp_tankers'][$kk] = getmtdfms($datefilter,$kk,'wsp_tankers'); // $match_fms_Res['wsp_tankers']; 
									$wsppwr['wsp_bores'][$kk] = getmtdfms($datefilter,$kk,'wsp_bores');  //$match_fms_Res['wsp_bores'];
									$wsppwr['wsp_tot_water'][$kk] =  getmtdfms($datefilter,$kk,'wsp_tot_water');  //$match_fms_Res['wsp_tot_water'];
									$wsppwr['wsp_ppm_tw_sump'][$kk] = getmtdfms($datefilter,$kk,'wsp_ppm_tw_sump');  //$match_fms_Res['wsp_ppm_tw_sump'];
									$wsppwr['wsp_ppm_tw_flat'][$kk] = getmtdfms($datefilter,$kk,'wsp_ppm_tw_flat');  //$match_fms_Res['wsp_ppm_tw_flat'];
									
									$stpppwr['stp_avg_inlet_water'][$kk] = getmtdfms($datefilter,$kk,'stp_avg_inlet_water');  //$match_fms_Res['stp_avg_inlet_water'];
									$stpppwr['stp_avg_treat_water'][$kk] =  getmtdfms($datefilter,$kk,'stp_avg_treat_water');  //$match_fms_Res['stp_avg_treat_water'];
									$stpppwr['stp_avg_water_bypass'][$kk] = getmtdfms($datefilter,$kk,'stp_avg_water_bypass');  //$match_fms_Res['stp_avg_water_bypass'];
									 
									  
									
									
							}
							else{
							    
								    $fmsrec['pwr_ctpt'][$kk] = "";
									$fmsrec['pwr_tot_lt'][$kk] = "";
									$fmsrec['pwr_residents'][$kk] = "";
									$fmsrec['pwr_club_house'][$kk] = "";
									$fmsrec['pwr_stp'][$kk] = "";
									$fmsrec['pwr_wsp'][$kk] = "";
									$fmsrec['pwr_lifts'][$kk] = "";
									$fmsrec['pwr_solarpwrunits'][$kk] = "";
									$fmsrec['pwr_pwrfactor'][$kk] = "";
									$fmsrec['dset_dieselconsume'][$kk] = "";
									
									$wsppwr['wsp_metro'][$kk] = ""; 
									$wsppwr['wsp_tankers'][$kk] = ""; 
									$wsppwr['wsp_bores'][$kk] = ""; 
									$wsppwr['wsp_tot_water'][$kk] = ""; 
									$wsppwr['wsp_ppm_tw_sump'][$kk] = ""; 
									$wsppwr['wsp_ppm_tw_flat'][$kk] = ""; 
									
								    $stpppwr['stp_avg_inlet_water'][$kk] = "";
									$stpppwr['stp_avg_treat_water'][$kk] =  "";
									$stpppwr['stp_avg_water_bypass'][$kk] =  "";
							  
							}
							
							$match_fms_count = \App\Pmsdailyreport::where($match_pmp_fields)->count();
							if($match_fms_count > 0){
							    $match_fms_Res = \App\Pmsdailyreport::where($match_pmp_fields)->first();
									
									$pms_apna_apms['apna_apms_previous'][$kk] = $match_fms_Res['apna_apms_previous']; 
									$pms_apna_apms['apna_apms_opened_help'][$kk] = $match_fms_Res['apna_apms_opened_help']; 
									$pms_apna_apms['apna_apms_opened_login'][$kk] = $match_fms_Res['apna_apms_opened_login'];
									$pms_apna_apms['apna_apms_opened_total'][$kk] = $match_fms_Res['apna_apms_opened_total'];
									$pms_apna_apms['apna_apms_resolved'][$kk] = $match_fms_Res['apna_apms_resolved'];
									$pms_apna_apms['apna_apms_pending'][$kk] = $match_fms_Res['apna_apms_pending'];
									
									$pms_apna_projet['apna_project_previous'][$kk] = $match_fms_Res['apna_project_previous']; 
									$pms_apna_projet['apna_project_opened_help'][$kk] = $match_fms_Res['apna_project_opened_help']; 
									$pms_apna_projet['apna_project_opened_login'][$kk] = $match_fms_Res['apna_project_opened_login'];
									$pms_apna_projet['apna_project_opened_total'][$kk] = $match_fms_Res['apna_project_opened_total'];
									$pms_apna_projet['apna_project_resolved'][$kk] = $match_fms_Res['apna_project_resolved'];
									$pms_apna_projet['apna_project_pending'][$kk] = $match_fms_Res['apna_project_pending'];
									
									
									$club_house['clbhous_revenue_day'][$kk] = $match_fms_Res['clbhous_revenue_day']; 
									$club_house['clbhous_pwr_units'][$kk] = $match_fms_Res['clbhous_pwr_units']; 
									$club_house['clbhous_users_gym'][$kk] = $match_fms_Res['clbhous_users_gym'];
									$club_house['clbhous_users_pool'][$kk] = $match_fms_Res['clbhous_users_pool'];
									$club_house['clbhous_users_tennis'][$kk] = $match_fms_Res['clbhous_users_tennis'];
									$club_house['clbhous_shuttle'][$kk] = $match_fms_Res['clbhous_shuttle'];
									 
									
								
							}
							else{
								    $pms_apna_apms['apna_apms_previous'][$kk] = ""; 
									$pms_apna_apms['apna_apms_opened_help'][$kk] =  ""; 
									$pms_apna_apms['apna_apms_opened_login'][$kk] =  ""; 
									$pms_apna_apms['apna_apms_opened_total'][$kk] =  ""; 
									$pms_apna_apms['apna_apms_resolved'][$kk] =  ""; 
									$pms_apna_apms['apna_apms_pending'][$kk] =  ""; 
									
									$pms_apna_projet['apna_project_previous'][$kk] = "";
									$pms_apna_projet['apna_project_opened_help'][$kk] =  "";
									$pms_apna_projet['apna_project_opened_login'][$kk] =  "";
									$pms_apna_projet['apna_project_opened_total'][$kk] =  "";
									$pms_apna_projet['apna_project_resolved'][$kk] =  "";
									$pms_apna_projet['apna_project_pending'][$kk] =  "";
									
									$club_house['clbhous_revenue_day'][$kk] = "";
									$club_house['clbhous_pwr_units'][$kk] =  "";
									$club_house['clbhous_users_gym'][$kk] = "";
									$club_house['clbhous_users_pool'][$kk] =  "";
									$club_house['clbhous_users_tennis'][$kk] =  "";
									$club_house['clbhous_shuttle'][$kk] = "";
							}
							
							
								$match_sec_count = \App\Securitydailyreport::where($match_pmp_fields)->count();
							if($match_sec_count > 0){
							    $match_fms_Res = \App\Securitydailyreport::where($match_pmp_fields)->first();
									
									$security['nw_cctv'][$kk] = $match_fms_Res['nw_cctv']; 
									$security['nw_boom'][$kk] = $match_fms_Res['nw_boom']; 
									$security['sf_zone1'][$kk] = $match_fms_Res['sf_zone1'];
									$security['sf_zone2'][$kk] = $match_fms_Res['sf_zone2'];
									$security['sf_zone3'][$kk] = $match_fms_Res['sf_zone3'];
									$security['sf_zone4'][$kk] = $match_fms_Res['sf_zone4'];
									$security['sf_tkit'][$kk] = $match_fms_Res['sf_tkit'];
							}   
							else{
									$security['nw_cctv'][$kk] = "";
									$security['nw_boom'][$kk] =  "";
									$security['sf_zone1'][$kk] = "";
									$security['sf_zone2'][$kk] =  "";
									$security['sf_zone3'][$kk] =  "";
									$security['sf_zone4'][$kk] = "";
									$security['sf_tkit'][$kk] = "";
							}
							
						}
						
						
		//Breakdowns
		$breakdowns = \App\Breakdown::select('breakdowns.*','sites.name as sitename')->leftJoin('sites','sites.id','=','breakdowns.site_id')->limit(4)->orderBy('id', 'desc')->get();	

		//Incident
		$incidents = \App\Incident::select('incidents.*','sites.name as sitename')->leftJoin('sites','sites.id','=','incidents.site_id')->limit(4)->orderBy('id', 'desc')->get();	

		$jobcards = \App\Jobcard::select("jobcards.*",'sites.name as sitename','vendors.name as vendorname')
            ->leftJoin('sites','sites.id','=','jobcards.site_id')
            ->leftJoin('vendors','vendors.id','=','jobcards.vendor')
            ->where('jobcards.status','<>','Completed')
            ->get();
        $jbtypes = array(''=>'Please select',1=>'Break Down',2=>'Incident Report',3=>'AMC',4=>'New');
        //History cards
		$historycards = \App\Historycard::limit(4)->orderBy('updated_at', 'desc')->get();
		$hctypes = array(1=>'Break Down',2=>'Incident Report',3=>'Break Down',4=>'Incident Report',5=>'AMC',6=>'New');
		$relations = [
            //'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			'sitenames' => $siteattrname,
			'assets' => $assets,
			'categories' => \App\Category::get()->pluck('name', 'id')->prepend('All', ''),
			'forums' => $forum,
			'dgpump' => $dgpump,
			'mainpump' => $mainpump,
			'jockeypmp' => $jockeypmp,
			'exahuster' => $exahuster,
			'pwrcon' => $fmsrec,
			'wspcon' => $wsppwr, 
			'stpcon' => $stpppwr,
			'apnaapms' => $pms_apna_apms,
			'apnaproj' => $pms_apna_projet,
			'clubhouse' => $club_house,
			'security' => $security,   
			'breakdownCount' => \App\Breakdown::count(),
			'breakdowns' => $breakdowns,
			'incidentCount' => \App\Incident::count(),
			'incidents' => $incidents,
			'jobcardCount' => \App\Jobcard::where('jobcards.status','<>','Completed')->count(),
			'jobcards' => $jobcards,
			'jbtypes' => $jbtypes,
			'historycards' => $historycards,
			'hctypes' => $hctypes,
			
        ]; 
   
        return view('home', $relations);
    }
	
	
	public function indexdashboardtemp()
    {
	  $siteattrname = array();
	  $sitenames = array();
	  $siteattrnameon = array();
	  $flatres = array();
	  $jobcards = array();
	  $forum = array();
	  $fmsrec = array();
	  $dgpump = array();
	  $mainpump = array();
	  $jockeypmp = array();
	  $exahuster = array();
	  $wsppwr = array();
	  $stpppwr = array();
	  $pms_apna_apms = array();
	  $pms_apna_projet = array();
	  $club_house = array();
	  $security = array();
	  $userid = Auth::user()->id;
	  $site_id = 0;
	  if($userid>1) {	  	
	  	$emprow = \App\Emp::where('id', '=', (int)Auth::user()->emp_id)->first();
	  	if($emprow) $site_id = (int)$emprow->community;
	  }
	 if(Auth::user()->id == 1){
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', '');
		  $siteattrnameon = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		    
		  }else{
 
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			if($getemp_info){
				$siteinfo = $getemp_info->community;
				$sitearr = explode(",",$siteinfo);
				$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', '');
				$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please Select', '');
				$siteattrnameon = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			}
			$flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
		  }  
	       
		
	 $uid = Auth::user()->id;
	if($uid==1) 
            $assets = Task::select("tasks.*",'categories.name as catgname')
                        ->leftJoin('categories','categories.id','=','tasks.category')->take(5)->get();
        else {
            //$assets = Task::join('task_users','tasks.id','=','task_users.task_id')->where('task_users.user_id',$uid)->get();
            $assets = TaskUser::select("tasks.*",'categories.name as catgname')
                ->leftJoin('tasks','tasks.id','=','task_users.task_id')
                ->leftJoin('users','users.emp_id','=','task_users.user_id')
                ->leftJoin('categories','categories.id','=','tasks.category')
                ->where('users.id',$uid)->take(5)->get();
        }
		
		  $forum  = Forum::select("forums.*",'categories.name as catgname')
                        ->leftJoin('categories','categories.id','=','forums.category')->take(5)->get(); 
						
						foreach($siteattrname as $kk => $siten){
						    $resdate = date("Y-m-d");
							$date = date('Y-m-d');
							$resdate = date('Y-m-d', strtotime($date .' -1 day')); 
							$datefilter = date('d-m-Y', strtotime($date .' -1 day'));   
							
							$match_pmp_fields = ['site' => $kk, 'reporton' => $resdate]; 
							$match_tot_pmp_fields = ['site' => $kk]; 
							$match_count = \App\Firesafedailyreport::where($match_pmp_fields)->count();
							$match_tao_count = \App\Firesafedailyreportvalidation::where($match_tot_pmp_fields)->count();
							if($match_count > 0) {
							   $match_pmp_Res = \App\Firesafedailyreport::where($match_pmp_fields)->first();
							  
								$dgpump['nw'][$kk] =  $match_pmp_Res['dgpumpnotworking'];
								$dgpump['auto'][$kk] =  $match_pmp_Res['dgpumpauto'];
								$dgpump['off'][$kk]=  $match_pmp_Res['dgpumpoff'];
								 
								$mainpump['nw'][$kk] =  $match_pmp_Res['mainpumpnotworking'];
								$mainpump['auto'][$kk] =  $match_pmp_Res['mainpumpauto'];
								$mainpump['off'][$kk]=  $match_pmp_Res['mainpumpoff'];
								
								$jockeypmp['nw'][$kk] =  $match_pmp_Res['jockeypumpnotworking'];
								$jockeypmp['auto'][$kk] =  $match_pmp_Res['jockeypumpauto'];
								$jockeypmp['off'][$kk]=  $match_pmp_Res['jockeypumpoff'];
								
								$exahuster['co2'][$kk] =  $match_pmp_Res['co2firenotworking'];
								$exahuster['dcp'][$kk] =  $match_pmp_Res['dcpfirenotworking'];
								$exahuster['water'][$kk]=  $match_pmp_Res['waterfirenotworking'];
								
							       
								
							}
							else{
							   $dgpump['nw'][$kk]  = "";
							   $dgpump['auto'][$kk] =  "";
								$dgpump['off'][$kk]=  "";
								 
								$mainpump['nw'][$kk] =  "";
								$mainpump['auto'][$kk] = "";
								$mainpump['off'][$kk]=  "";
								
								$jockeypmp['nw'][$kk] = "";
								$jockeypmp['auto'][$kk] =  "";
								$jockeypmp['off'][$kk]= "";
								
								$exahuster['co2'][$kk] = "";
								$exahuster['dcp'][$kk] =  "";
								$exahuster['water'][$kk]= "";
							}  
							if($match_tao_count > 0){
							 $match_tot_res = \App\Firesafedailyreportvalidation::where($match_tot_pmp_fields)->first();
							 $dgpump['tot'][$kk] =  $match_tot_res['dgpump'];
							 $mainpump['tot'][$kk] =  $match_tot_res['mainpump'];
							 $jockeypmp['tot'][$kk]=  $match_tot_res['jockeypump'];
							 $exahuster['tot'][$kk]=  $match_tot_res['fireextinguishers'];
							 
							 
							}
							else{
							 $dgpump['tot'][$kk] = "";
							 $mainpump['tot'][$kk] =  "";
							 $jockeypmp['tot'][$kk]= "";
							 $exahuster['tot'][$kk] = "";
							}
							
							$match_fms_count = \App\Fmsdailyreport::where($match_pmp_fields)->count();
							if($match_fms_count > 0){
							    $match_fms_Res = \App\Fmsdailyreport::where($match_pmp_fields)->first();
									$fmsrec['pwr_ctpt'][$kk] =  getmtdfms($datefilter,$kk,'pwr_ctpt');// $match_fms_Res['pwr_ctpt'];
									$fmsrec['pwr_tot_lt'][$kk] = getmtdfms($datefilter,$kk,'pwr_tot_lt');//$match_fms_Res['pwr_tot_lt'];
									$fmsrec['pwr_residents'][$kk] = getmtdfms($datefilter,$kk,'pwr_residents');//$match_fms_Res['pwr_residents'];
									$fmsrec['pwr_club_house'][$kk] = getmtdfms($datefilter,$kk,'pwr_club_house');//$match_fms_Res['pwr_club_house'];
									$fmsrec['pwr_stp'][$kk] = getmtdfms($datefilter,$kk,'pwr_stp');//$match_fms_Res['pwr_stp'];
									$fmsrec['pwr_wsp'][$kk] = getmtdfms($datefilter,$kk,'pwr_wsp');//$match_fms_Res['pwr_wsp'];
									$fmsrec['pwr_lifts'][$kk] = getmtdfms($datefilter,$kk,'pwr_lifts');//$match_fms_Res['pwr_lifts'];
									$fmsrec['pwr_solarpwrunits'][$kk] = getmtdfms($datefilter,$kk,'pwr_solarpwrunits');//$match_fms_Res['pwr_solarpwrunits'];
									//$fmsrec['pwr_pwrfactor'][$kk] = getmtdfms($datefilter,$kk,'pwr_pwrfactor');//$match_fms_Res['pwr_pwrfactor'];
									$fmsrec['pwr_pwrfactor'][$kk] = getmtdfms($datefilter,$kk,'dgset_pwrfailure');
									$fmsrec['dset_dieselconsume'][$kk] = getmtdfms($datefilter,$kk,'dset_dieselconsume');//$match_fms_Res['dset_dieselconsume'];
									  
									$wsppwr['wsp_metro'][$kk] =  getmtdfms($datefilter,$kk,'wsp_metro'); //$match_fms_Res['wsp_metro']; 
									$wsppwr['wsp_tankers'][$kk] = getmtdfms($datefilter,$kk,'wsp_tankers'); // $match_fms_Res['wsp_tankers']; 
									$wsppwr['wsp_bores'][$kk] = getmtdfms($datefilter,$kk,'wsp_bores');  //$match_fms_Res['wsp_bores'];
									$wsppwr['wsp_tot_water'][$kk] =  getmtdfms($datefilter,$kk,'wsp_tot_water');  //$match_fms_Res['wsp_tot_water'];
									$wsppwr['wsp_ppm_tw_sump'][$kk] = getmtdfms($datefilter,$kk,'wsp_ppm_tw_sump');  //$match_fms_Res['wsp_ppm_tw_sump'];
									$wsppwr['wsp_ppm_tw_flat'][$kk] = getmtdfms($datefilter,$kk,'wsp_ppm_tw_flat');  //$match_fms_Res['wsp_ppm_tw_flat'];
									
									$stpppwr['stp_avg_inlet_water'][$kk] = getmtdfms($datefilter,$kk,'stp_avg_inlet_water');  //$match_fms_Res['stp_avg_inlet_water'];
									$stpppwr['stp_avg_treat_water'][$kk] =  getmtdfms($datefilter,$kk,'stp_avg_treat_water');  //$match_fms_Res['stp_avg_treat_water'];
									$stpppwr['stp_avg_water_bypass'][$kk] = getmtdfms($datefilter,$kk,'stp_avg_water_bypass');  //$match_fms_Res['stp_avg_water_bypass'];
									 
									  
									
									
							}
							else{
							    
								    $fmsrec['pwr_ctpt'][$kk] = "";
									$fmsrec['pwr_tot_lt'][$kk] = "";
									$fmsrec['pwr_residents'][$kk] = "";
									$fmsrec['pwr_club_house'][$kk] = "";
									$fmsrec['pwr_stp'][$kk] = "";
									$fmsrec['pwr_wsp'][$kk] = "";
									$fmsrec['pwr_lifts'][$kk] = "";
									$fmsrec['pwr_solarpwrunits'][$kk] = "";
									$fmsrec['pwr_pwrfactor'][$kk] = "";
									$fmsrec['dset_dieselconsume'][$kk] = "";
									
									$wsppwr['wsp_metro'][$kk] = ""; 
									$wsppwr['wsp_tankers'][$kk] = ""; 
									$wsppwr['wsp_bores'][$kk] = ""; 
									$wsppwr['wsp_tot_water'][$kk] = ""; 
									$wsppwr['wsp_ppm_tw_sump'][$kk] = ""; 
									$wsppwr['wsp_ppm_tw_flat'][$kk] = ""; 
									
								    $stpppwr['stp_avg_inlet_water'][$kk] = "";
									$stpppwr['stp_avg_treat_water'][$kk] =  "";
									$stpppwr['stp_avg_water_bypass'][$kk] =  "";
							  
							}
							
							$match_fms_count = \App\Pmsdailyreport::where($match_pmp_fields)->count();
							if($match_fms_count > 0){
							    $match_fms_Res = \App\Pmsdailyreport::where($match_pmp_fields)->first();
									
									$pms_apna_apms['apna_apms_previous'][$kk] = $match_fms_Res['apna_apms_previous']; 
									$pms_apna_apms['apna_apms_opened_help'][$kk] = $match_fms_Res['apna_apms_opened_help']; 
									$pms_apna_apms['apna_apms_opened_login'][$kk] = $match_fms_Res['apna_apms_opened_login'];
									$pms_apna_apms['apna_apms_opened_total'][$kk] = $match_fms_Res['apna_apms_opened_total'];
									$pms_apna_apms['apna_apms_resolved'][$kk] = $match_fms_Res['apna_apms_resolved'];
									$pms_apna_apms['apna_apms_pending'][$kk] = $match_fms_Res['apna_apms_pending'];
									
									$pms_apna_projet['apna_project_previous'][$kk] = $match_fms_Res['apna_project_previous']; 
									$pms_apna_projet['apna_project_opened_help'][$kk] = $match_fms_Res['apna_project_opened_help']; 
									$pms_apna_projet['apna_project_opened_login'][$kk] = $match_fms_Res['apna_project_opened_login'];
									$pms_apna_projet['apna_project_opened_total'][$kk] = $match_fms_Res['apna_project_opened_total'];
									$pms_apna_projet['apna_project_resolved'][$kk] = $match_fms_Res['apna_project_resolved'];
									$pms_apna_projet['apna_project_pending'][$kk] = $match_fms_Res['apna_project_pending'];
									
									
									$club_house['clbhous_revenue_day'][$kk] = $match_fms_Res['clbhous_revenue_day']; 
									$club_house['clbhous_pwr_units'][$kk] = $match_fms_Res['clbhous_pwr_units']; 
									$club_house['clbhous_users_gym'][$kk] = $match_fms_Res['clbhous_users_gym'];
									$club_house['clbhous_users_pool'][$kk] = $match_fms_Res['clbhous_users_pool'];
									$club_house['clbhous_users_tennis'][$kk] = $match_fms_Res['clbhous_users_tennis'];
									$club_house['clbhous_shuttle'][$kk] = $match_fms_Res['clbhous_shuttle'];
									 
									
								
							}
							else{
								    $pms_apna_apms['apna_apms_previous'][$kk] = ""; 
									$pms_apna_apms['apna_apms_opened_help'][$kk] =  ""; 
									$pms_apna_apms['apna_apms_opened_login'][$kk] =  ""; 
									$pms_apna_apms['apna_apms_opened_total'][$kk] =  ""; 
									$pms_apna_apms['apna_apms_resolved'][$kk] =  ""; 
									$pms_apna_apms['apna_apms_pending'][$kk] =  ""; 
									
									$pms_apna_projet['apna_project_previous'][$kk] = "";
									$pms_apna_projet['apna_project_opened_help'][$kk] =  "";
									$pms_apna_projet['apna_project_opened_login'][$kk] =  "";
									$pms_apna_projet['apna_project_opened_total'][$kk] =  "";
									$pms_apna_projet['apna_project_resolved'][$kk] =  "";
									$pms_apna_projet['apna_project_pending'][$kk] =  "";
									
									$club_house['clbhous_revenue_day'][$kk] = "";
									$club_house['clbhous_pwr_units'][$kk] =  "";
									$club_house['clbhous_users_gym'][$kk] = "";
									$club_house['clbhous_users_pool'][$kk] =  "";
									$club_house['clbhous_users_tennis'][$kk] =  "";
									$club_house['clbhous_shuttle'][$kk] = "";
							}
							
							
								$match_sec_count = \App\Securitydailyreport::where($match_pmp_fields)->count();
							if($match_sec_count > 0){
							    $match_fms_Res = \App\Securitydailyreport::where($match_pmp_fields)->first();
									
									$security['nw_cctv'][$kk] = $match_fms_Res['nw_cctv']; 
									$security['nw_boom'][$kk] = $match_fms_Res['nw_boom']; 
									$security['sf_zone1'][$kk] = $match_fms_Res['sf_zone1'];
									$security['sf_zone2'][$kk] = $match_fms_Res['sf_zone2'];
									$security['sf_zone3'][$kk] = $match_fms_Res['sf_zone3'];
									$security['sf_zone4'][$kk] = $match_fms_Res['sf_zone4'];
									$security['sf_tkit'][$kk] = $match_fms_Res['sf_tkit'];
							}   
							else{
									$security['nw_cctv'][$kk] = "";
									$security['nw_boom'][$kk] =  "";
									$security['sf_zone1'][$kk] = "";
									$security['sf_zone2'][$kk] =  "";
									$security['sf_zone3'][$kk] =  "";
									$security['sf_zone4'][$kk] = "";
									$security['sf_tkit'][$kk] = "";
							}
							
						}
						
						
		//Breakdowns
		if($userid>1) {					
			$breakdowns = \App\Breakdown::select('breakdowns.*','sites.name as sitename')->leftJoin('sites','sites.id','=','breakdowns.site_id')->where('site_id','=',$site_id)->limit(4)->orderBy('id', 'desc')->get();	
			$breakdown_count = \App\Breakdown::where('breakdowns.site_id','=',$site_id)->count();
		}
		else {
			$breakdowns = \App\Breakdown::select('breakdowns.*','sites.name as sitename')->leftJoin('sites','sites.id','=','breakdowns.site_id')->limit(4)->orderBy('id', 'desc')->get();
			$breakdown_count = \App\Breakdown::count();
		}

		//Incident
		if($userid>1) {
			$incidents = \App\Incident::select('incidents.*','sites.name as sitename')->leftJoin('sites','sites.id','=','incidents.site_id')->where('incidents.site_id','=',$site_id)->limit(4)->orderBy('id', 'desc')->get();
			$incident_count = \App\Incident::where('site_id','=',$site_id)->count();
		}
		else {
			$incidents = \App\Incident::select('incidents.*','sites.name as sitename')->leftJoin('sites','sites.id','=','incidents.site_id')->limit(4)->orderBy('id', 'desc')->get();	
			$incident_count = \App\Incident::count();
		}

		if($userid>1) {
			$ctype = "";
			$jobcard_count = \App\Jobcard::where('site_id','=',$site_id)->where('jobcards.status','<>','Completed')->count();
			if($jobcard_count>0)
			{
				$jobcards1 = \App\Jobcard::select("jobcards.*",'sites.name as sitename','vendors.name as vendorname')
					->leftJoin('sites','sites.id','=','jobcards.site_id')
					->leftJoin('vendors','vendors.id','=','jobcards.vendor')
					->where('jobcards.status','<>','Completed')
					->where('jobcards.site_id','=',$site_id)
					->get();
					
				
				foreach($jobcards1 as $key=>$row)
				{
					if($row->jctype==1)
					{
						$ctype_res = \App\Breakdown::select('breakdowns.*')->where('breakdowns.id','=',$row->jcref)->first();
						if($ctype_res) $ctype = $ctype_res->title;
					}
					else if($row->jctype==2)
					{
						$ctype_res = \App\Incident::select('incidents.*')->where('incidents.id','=',$row->jcref)->first();
						if($ctype_res) $ctype = $ctype_res->title;
					}
					else if($row->jctype==3)
					{
						$ctype = $row->category_id;
					}
					else if($row->jctype==4)
					{
						$ctype = $row->category_id;
					}
					$jobcards[$key]['id'] = $row->sitename;
					$jobcards[$key]['refid'] = $row->refid;
					$jobcards[$key]['sitename'] = $row->sitename;
					$jobcards[$key]['jdate'] = $row->jdate;
					$jobcards[$key]['jctype'] = $row->jctype;
					$jobcards[$key]['ctype'] = $ctype;
					$jobcards[$key]['vendorname'] = $row->vendorname;
					$jobcards[$key]['status'] = $row->status;
				}
	        }
		}
        else 
		{
			$jobcard_count = \App\Jobcard::where('jobcards.status','<>','Completed')->count();
			if($jobcard_count>0)
			{
				$jobcards1 = \App\Jobcard::select("jobcards.*",'sites.name as sitename','vendors.name as vendorname')
					->leftJoin('sites','sites.id','=','jobcards.site_id')
					->leftJoin('vendors','vendors.id','=','jobcards.vendor')
					->where('jobcards.status','<>','Completed')
					->get();
				
				foreach($jobcards1 as $key=>$row)
				{
					if($row->jctype==1)
					{
						$ctype_res = \App\Breakdown::select('breakdowns.*')->where('breakdowns.id','=',$row->jcref)->first();
						if($ctype_res) $ctype = $ctype_res->title;
					}
					else if($row->jctype==2)
					{
						$ctype_res = \App\Incident::select('incidents.*')->where('incidents.id','=',$row->jcref)->first();
						if($ctype_res) $ctype = $ctype_res->title;
					}
					else if($row->jctype==3)
					{
						$ctype = $row->category_id;
					}
					else if($row->jctype==4)
					{
						$ctype = $row->category_id;
					}
					$jobcards[$key]['id'] = $row->sitename;
					$jobcards[$key]['refid'] = $row->refid;
					$jobcards[$key]['sitename'] = $row->sitename;
					$jobcards[$key]['jdate'] = $row->jdate;
					$jobcards[$key]['jctype'] = $row->jctype;
					$jobcards[$key]['ctype'] = $ctype;
					$jobcards[$key]['vendorname'] = $row->vendorname;
					$jobcards[$key]['status'] = $row->status;
				}
	       } 
		  //echo $ctype;
        }
		

        $jbtypes = array(''=>'Please select',1=>'Break Down',2=>'Incident Report',3=>'AMC',4=>'New');
        //History cards
        if($userid>1) 
			$historycards = \App\Historycard::where('site_id','=',$site_id)->limit(4)->orderBy('updated_at', 'desc')->get();
		else
			$historycards = \App\Historycard::limit(4)->orderBy('updated_at', 'desc')->get();
			
	   // AMC
	   if($userid>1) {
			   //$amcs = \App\CommunityAsset::where('site_id','=',$site_id)->limit(4)->orderBy('amc_enddate', 'desc')->get();
			 $today = date("Y-m-d");
			 $startdate =date('Y-m-01');
			 $lastdate = date("Y-m-t");
			   /*$amcs = CommunityAsset::select("community_assets.*",'categories.name as catgname')
                        ->leftJoin('categories','categories.id','=','community_assets.category_id')->where('site_id','=',$site_id)->limit(4)->orderBy('amc_enddate', 'desc')->get(); */
							/*$amcs = CommunityAsset::select("community_assets.*",'categories.name as catgname','vendors.name as vendorname','assets.name as assetname','sites.name as sitename')
                        ->leftJoin('categories','categories.id','=','community_assets.category_id') ->leftJoin('vendors','vendors.id','=','community_assets.vendor')->leftJoin('assets','assets.id','=','community_assets.asset_id')->leftJoin('sites','sites.id','=','community_assets.site_id')->limit(4)->where('site_id','=',$site_id)->where('amc_enddate','>=',$startdate)->where('amc_enddate','<=',$lastdate)->where('amc_type','=','amc')->groupBy('asset_group')->orderBy('amc_enddate', 'desc')->get(); */
						
							$amcs = CommunityAsset::select("community_assets.*",'categories.name as catgname','vendors.name as vendorname','assets.name as assetname','sites.name as sitename')
                        ->leftJoin('categories','categories.id','=','community_assets.category_id') ->leftJoin('vendors','vendors.id','=','community_assets.vendor')->leftJoin('assets','assets.id','=','community_assets.asset_id')->leftJoin('sites','sites.id','=','community_assets.site_id')->where('site_id','=',$site_id)->where('amc_type','=','amc')->groupBy('asset_group')->orderBy('amc_enddate', 'desc')->get();
						}
		else {
		     $today = date("Y-m-d");
			 $startdate =date('Y-m-01');
			 $lastdate = date("Y-m-t");
			/*$amcs = CommunityAsset::select("community_assets.*",'categories.name as catgname','vendors.name as vendorname','assets.name as assetname','sites.name as sitename')
                        ->leftJoin('categories','categories.id','=','community_assets.category_id') ->leftJoin('vendors','vendors.id','=','community_assets.vendor')->leftJoin('assets','assets.id','=','community_assets.asset_id')->leftJoin('sites','sites.id','=','community_assets.site_id')->limit(4)->where('amc_enddate','>=',$startdate)->where('amc_enddate','<=',$lastdate)->where('amc_type','=','amc')->groupBy('asset_group')->orderBy('amc_enddate', 'desc')->get(); */
						
						/*$amcs = CommunityAsset::select("community_assets.*",'categories.name as catgname','vendors.name as vendorname','assets.name as assetname','sites.name as sitename')
                        ->leftJoin('categories','categories.id','=','community_assets.category_id') ->leftJoin('vendors','vendors.id','=','community_assets.vendor')->leftJoin('assets','assets.id','=','community_assets.asset_id')->leftJoin('sites','sites.id','=','community_assets.site_id')->where('amc_type','=','amc')->groupBy('asset_group')->orderBy('amc_enddate', 'desc')->get();*/
						
						
						//$toDate = new Carbon('now');
						
						$amcs = Communityassetmaintenance::select("communityassetmaintenances.*",'categories.name as catgname','vendors.name as vendorname','assets.name as assetname','sites.name as sitename')->leftJoin('community_assets','community_assets.id','=','communityassetmaintenances.cam_id')->leftJoin('categories','categories.id','=','communityassetmaintenances.category_id')->leftJoin('vendors','vendors.id','=','community_assets.vendor')->leftJoin('assets','assets.id','=','community_assets.asset_id')->leftJoin('sites','sites.id','=','communityassetmaintenances.site_id')->where('communityassetmaintenances.status','=',1)->whereMonth('communityassetmaintenances.alert_date', Carbon::now()->month)->groupBy('asset_group')->where('communityassetmaintenances.amc_type','=','amc')->orWhere('communityassetmaintenances.amc_type','=','waranty')->orderBy('amc_enddate', 'desc')->get();
						
			}
			
			
			/*echo "<pre>";
			   print_r($amcs);
			echo "</pre>";

           exit;*/
		$hctypes = array(1=>'Break Down',2=>'Incident Report',3=>'Break Down',4=>'Incident Report',5=>'AMC',6=>'New');
		if(count($siteattrname) > 0) $siteattrname = $siteattrname;
		else $siteattrname = "";
		$relations = [
            //'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			'sitenames' => $siteattrname,
			'sitenameson' => $siteattrnameon,
			'assets' => $assets,
			'categories' => \App\Category::get()->pluck('name', 'id')->prepend('All', ''),
			'forums' => $forum,
			'dgpump' => $dgpump,
			'mainpump' => $mainpump,
			'jockeypmp' => $jockeypmp,
			'exahuster' => $exahuster,
			'pwrcon' => $fmsrec,
			'wspcon' => $wsppwr, 
			'stpcon' => $stpppwr,
			'apnaapms' => $pms_apna_apms,
			'apnaproj' => $pms_apna_projet,
			'clubhouse' => $club_house,
			'security' => $security,   
			'breakdownCount' => $breakdown_count,
			'breakdowns' => $breakdowns,
			'incidentCount' => $incident_count,
			'incidents' => $incidents,
			'jobcardCount' => $jobcard_count,
			'jobcards' => $jobcards,
			'jbtypes' => $jbtypes,
			'historycards' => $historycards,
			'hctypes' => $hctypes,
			'userid' => $userid,
			'amcs' => $amcs,
			
        ];  
   
        return view('hometemp', $relations);
    }
}
