<?php



namespace App\Http\Controllers;


use App\Task;
use App\TaskUser;
use App\TaskAttachment;
use App\TaskReply;
use App\Emp;
use App\User;
use DB;
use Auth;
use Config;
use App\Http\Requests;

use Illuminate\Http\Request;
use App\CommunityAsset;



class ContactusController extends Controller

{

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {

      //  $this->middleware('auth');

    }



    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        return view('contactus');

    }
	
	 public function mapindex()

    {

        return view('map');

    }
	
	 public function management()

    {

        return view('management');

    }
	
	 public function benfit()

    {

        return view('benefits');

    }
	
	 public function calendarview()

    {
	       $uid = Auth::user()->id;
        if($uid==1) 
            $assets = Task::select("tasks.*",'categories.name as catgname')
                        ->leftJoin('categories','categories.id','=','tasks.category')->get();
        else {
            //$assets = Task::join('task_users','tasks.id','=','task_users.task_id')->where('task_users.user_id',$uid)->get();
            $assets = TaskUser::select("tasks.*",'categories.name as catgname')
                ->leftJoin('tasks','tasks.id','=','task_users.task_id')
                ->leftJoin('users','users.emp_id','=','task_users.user_id')
                ->leftJoin('categories','categories.id','=','tasks.category')
                ->where('users.id',$uid)->get();
        }

        $userid = Auth::user()->id;
        $site_id = 0;
        if($userid>1) {       
            $emprow = \App\Emp::where('id', '=', (int)Auth::user()->emp_id)->first();
            if($emprow) $site_id = (int)$emprow->community;
        }
		  $sites = array();
		    if($userid>1) {
            $sites = array();
			}
        else { 
			 $sites = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			}
        if($userid>1) {
           // $comassets = CommunityAsset::select("community_assets.*",'assets.name as assetname')->leftJoin('assets','assets.id','=','community_assets.asset_id')->where('amc_interval','>',0)->where('amc_type','=','amc')->where('site_id','=',$site_id)->groupBy('asset_group')->orderBy('amc_startdate','asc')->get();
			
			$comassets = CommunityAsset::select("community_assets.*",'assets.name as assetname')->leftJoin('assets','assets.id','=','community_assets.asset_id')->leftJoin('sites','sites.id','=','community_assets.site_id')->where('site_id','=',$site_id)->where('amc_type','=','amc')->groupBy('asset_group')->orderBy('amc_startdate', 'asc')->get();
			}
        else { 
            //$comassets = CommunityAsset::select("community_assets.*",'assets.name as assetname')->leftJoin('assets','assets.id','=','community_assets.asset_id')->where('amc_interval','>',0)->where('amc_type','=','amc')->groupBy('asset_group')->orderBy('amc_startdate','asc')->get();
			
			$comassets = CommunityAsset::select("community_assets.*",'assets.name as assetname')->leftJoin('assets','assets.id','=','community_assets.asset_id')->leftJoin('sites','sites.id','=','community_assets.site_id')->where('amc_type','=','amc')->groupBy('asset_group')->orderBy('amc_startdate', 'asc')->get();
			
			/*$amcs = CommunityAsset::select("community_assets.*",'categories.name as catgname','vendors.name as vendorname','assets.name as assetname','sites.name as sitename')
                        ->leftJoin('categories','categories.id','=','community_assets.category_id') ->leftJoin('vendors','vendors.id','=','community_assets.vendor')->leftJoin('assets','assets.id','=','community_assets.asset_id')->leftJoin('sites','sites.id','=','community_assets.site_id')->where('site_id','=',$site_id)->where('amc_type','=','amc')->groupBy('asset_group')->orderBy('amc_enddate', 'desc')->get();*/
						}
 
        $comassets_events = '';
        if($comassets) {
          $sdate = date("Y-m-d");
          $edate = date("Y-m-d",strtotime("+12 month"));
          foreach($comassets as $caval) {
            $dt_interval = $caval->amc_interval;
            $dt_val = $caval->amc_startdate;
            //echo " :: $dt_interval - $dt_val - $sdate - $edate :   ";
            $dt=strtotime($sdate);
            if(strtotime($dt_val)>=$dt) $dt = strtotime($dt_val);
            while($dt<=strtotime($edate)) {
              $evtdate = date("Y-m-d",$dt); //echo " $evtdate ";
              //$comassets_events .= '{"title":"AMC : '.$caval->code.' - '.$caval->name.'","allday":"false","start":"'.$evtdate.'","end":"'.$evtdate.'","url":"/commassets/'.$caval->id.'/edit","backgroundColor": "#378006"},';
			   $comassets_events .= '{"title":"AMC : '.$caval->assetname.'","allday":"false","start":"'.$evtdate.'","end":"'.$evtdate.'","url":"/commassets/'.$caval->id.'/edit","backgroundColor": "#378006"},';
              $dt += $dt_interval*24*60*60;
            }

          }
        }
		    //echo $comassets_events;
        return view('calendar', compact('assets','comassets_events','sites'));
	 

      //  return view('calendar');

    }
	
	
		 public function tplancalendar()

    {
	   
	       $uid = Auth::user()->id;
        if($uid==1) 
            $assets = Task::select("tasks.*",'categories.name as catgname')
                        ->leftJoin('categories','categories.id','=','tasks.category')->get();
        else {
            //$assets = Task::join('task_users','tasks.id','=','task_users.task_id')->where('task_users.user_id',$uid)->get();
            $assets = TaskUser::select("tasks.*",'categories.name as catgname')
                ->leftJoin('tasks','tasks.id','=','task_users.task_id')
                ->leftJoin('users','users.emp_id','=','task_users.user_id')
                ->leftJoin('categories','categories.id','=','tasks.category')
                ->where('users.id',$uid)->get();
        }

        $userid = Auth::user()->id;
        $site_id = 0;
        if($userid>1) {       
            $emprow = \App\Emp::where('id', '=', (int)Auth::user()->emp_id)->first();
            if($emprow) $site_id = (int)$emprow->community;
        }
		  $sites = array();
		    if($userid>1) {
            $sites = array();
			}
        else { 
			 $sites = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			}
        if($userid>1) {
           // $comassets = CommunityAsset::select("community_assets.*",'assets.name as assetname')->leftJoin('assets','assets.id','=','community_assets.asset_id')->where('amc_interval','>',0)->where('amc_type','=','amc')->where('site_id','=',$site_id)->groupBy('asset_group')->orderBy('amc_startdate','asc')->get();
			
			$comassets = CommunityAsset::select("community_assets.*",'assets.name as assetname')->leftJoin('assets','assets.id','=','community_assets.asset_id')->leftJoin('sites','sites.id','=','community_assets.site_id')->where('site_id','=',$site_id)->where('amc_type','=','amc')->groupBy('asset_group')->orderBy('amc_startdate', 'asc')->get();
			}
        else { 
            //$comassets = CommunityAsset::select("community_assets.*",'assets.name as assetname')->leftJoin('assets','assets.id','=','community_assets.asset_id')->where('amc_interval','>',0)->where('amc_type','=','amc')->groupBy('asset_group')->orderBy('amc_startdate','asc')->get();
			
			$comassets = CommunityAsset::select("community_assets.*",'assets.name as assetname')->leftJoin('assets','assets.id','=','community_assets.asset_id')->leftJoin('sites','sites.id','=','community_assets.site_id')->where('amc_type','=','amc')->groupBy('asset_group')->orderBy('amc_startdate', 'asc')->get();
			
			/*$amcs = CommunityAsset::select("community_assets.*",'categories.name as catgname','vendors.name as vendorname','assets.name as assetname','sites.name as sitename')
                        ->leftJoin('categories','categories.id','=','community_assets.category_id') ->leftJoin('vendors','vendors.id','=','community_assets.vendor')->leftJoin('assets','assets.id','=','community_assets.asset_id')->leftJoin('sites','sites.id','=','community_assets.site_id')->where('site_id','=',$site_id)->where('amc_type','=','amc')->groupBy('asset_group')->orderBy('amc_enddate', 'desc')->get();*/
						}
 
        $comassets_events = '';
        if($comassets) {
          $sdate = date("Y-m-d");
          $edate = date("Y-m-d",strtotime("+12 month"));
          foreach($comassets as $caval) {
            $dt_interval = $caval->amc_interval;
            $dt_val = $caval->amc_startdate;
            //echo " :: $dt_interval - $dt_val - $sdate - $edate :   ";
            $dt=strtotime($sdate);
            if(strtotime($dt_val)>=$dt) $dt = strtotime($dt_val);
            while($dt<=strtotime($edate)) {
              $evtdate = date("Y-m-d",$dt); //echo " $evtdate ";
              //$comassets_events .= '{"title":"AMC : '.$caval->code.' - '.$caval->name.'","allday":"false","start":"'.$evtdate.'","end":"'.$evtdate.'","url":"/commassets/'.$caval->id.'/edit","backgroundColor": "#378006"},';
			   $comassets_events .= '{"title":"AMC : '.$caval->assetname.'","allday":"false","start":"'.$evtdate.'","end":"'.$evtdate.'","url":"/commassets/'.$caval->id.'/edit","backgroundColor": "#378006"},';
              $dt += $dt_interval*24*60*60;
            }

          }
        }
		    //echo $comassets_events;
        return view('taskplancalendar', compact('assets','sites'));
	 

      //  return view('calendar');

    }
	
	 public function eventcomingsn()

    {

        return view('eventComingsoon');

    }
	 
	public function getSitecalendarview(Request $request){
	  
	   $site= $request->site;
	     $uid = Auth::user()->id;
        if($uid==1) 
            $assets = Task::select("tasks.*",'categories.name as catgname')
                        ->leftJoin('categories','categories.id','=','tasks.category')->get();
        else {
            //$assets = Task::join('task_users','tasks.id','=','task_users.task_id')->where('task_users.user_id',$uid)->get();
            $assets = TaskUser::select("tasks.*",'categories.name as catgname')
                ->leftJoin('tasks','tasks.id','=','task_users.task_id')
                ->leftJoin('users','users.emp_id','=','task_users.user_id')
                ->leftJoin('categories','categories.id','=','tasks.category')
                ->where('users.id',$uid)->get();
        }

        $userid = Auth::user()->id;
        $site_id = 0;
        if($userid>1) {       
            $emprow = \App\Emp::where('id', '=', (int)Auth::user()->emp_id)->first();
            if($emprow) $site_id = (int)$emprow->community;
        }
		  $sites = array();
		    if($userid>1) {
            $sites = array();
			}
        else { 
			 $sites = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			}
        if($site == 'all') {
          $comassets = CommunityAsset::select("community_assets.*",'assets.name as assetname')->leftJoin('assets','assets.id','=','community_assets.asset_id')->leftJoin('sites','sites.id','=','community_assets.site_id')->where('amc_type','=','amc')->groupBy('asset_group')->orderBy('amc_startdate', 'asc')->get();
			
			}
        else { 
		   $site_id = $site;
			$comassets = CommunityAsset::select("community_assets.*",'assets.name as assetname')->leftJoin('assets','assets.id','=','community_assets.asset_id')->leftJoin('sites','sites.id','=','community_assets.site_id')->where('site_id','=',$site_id)->where('amc_type','=','amc')->groupBy('asset_group')->orderBy('amc_startdate', 'asc')->get();
			}
 
        $comassets_events = '';
        if($comassets) {
          $sdate = date("Y-m-d");
          $edate = date("Y-m-d",strtotime("+12 month"));
          foreach($comassets as $caval) {
            $dt_interval = $caval->amc_interval;
            $dt_val = $caval->amc_startdate;
            //echo " :: $dt_interval - $dt_val - $sdate - $edate :   ";
            $dt=strtotime($sdate);
            if(strtotime($dt_val)>=$dt) $dt = strtotime($dt_val);
            while($dt<=strtotime($edate)) {
              $evtdate = date("Y-m-d",$dt); //echo " $evtdate ";
              //$comassets_events .= '{"title":"AMC : '.$caval->code.' - '.$caval->name.'","allday":"false","start":"'.$evtdate.'","end":"'.$evtdate.'","url":"/commassets/'.$caval->id.'/edit","backgroundColor": "#378006"},';
			   $comassets_events .= '{"title":"AMC : '.$caval->assetname.'","allday":"false","start":"'.$evtdate.'","end":"'.$evtdate.'","url":"/commassets/'.$caval->id.'/edit","backgroundColor": "#378006"},';
              $dt += $dt_interval*24*60*60;
            }

          }
        }
		    //echo $comassets_events;
			
  $response = array();
  $response['assets'] =  $assets;
  $response['comassets_events'] =  $comassets_events;
  $response['sites'] =  $sites;
  print json_encode($response); 
      
	}  
	   
}

