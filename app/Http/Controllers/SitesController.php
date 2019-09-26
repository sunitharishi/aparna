<?php



namespace App\Http\Controllers;


use App\Site;

use App\Sitetransformer;
use App\Sitedgset;
use App\Sitestp;
use App\Sitegasbank;
use App\Sitefirepumproom; 
use App\Siteflat; 
use App\Sitelift; 
use App\Sitewsp;
use App\Siteclubhouse;
use App\Sitehydron;
use App\Sitesolar;
use App\Siteppostpaid;
use App\Sitepba;
use App\Sitefirealar;
use App\Sitepwrsolar;
use App\Siteboombarrier;
use App\Siteflowann;



 


use App\Newsite;

use Illuminate\Http\Request;

use App\Http\Requests\StoreSitesRequest;

use App\Http\Requests\UpdateSitesRequest;

use App\Blocknocreport;

use DB;



class SitesController extends Controller

{



    /** 

     * Display a listing of Client.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    { 
 
        $sites = Site::all();



        return view('sites.index', compact('sites'));

    }



    /**

     * Show the form for creating new Client.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        $relations = [

            'client_statuses' => \App\ClientStatus::get()->pluck('title', 'id')->prepend('Please select', ''),

        ];



        return view('sites.create', $relations);

    }
	
	
	//ENABLE
	
	 public function enable(Request $request, $rep_id, $status)

    {  

        $task = Site::findOrFail($rep_id);
		
		if($status == '0') $fstatus = '1';
		if($status == '1') $fstatus = '0';
 
        $etinfo = [
                       'status' => $fstatus
                    ];
					

        $task->update($etinfo);
		return redirect()->route('sites.index');

    }

 

    /** 

     * Store a newly created Client in storage.

     *

     * @param  \App\Http\Requests\StoreClientsRequest  $request

     * @return \Illuminate\Http\Response

     */

   /* public function store(StoreSitesRequest $request)

    {

	    
        $edata = $request->all();		
		$insert = Site::create($request->all());
		$last_insert_id = $insert->id;
		$diconsumptn = array();
		 if(isset($edata['blockname'])) {
		 if(count($edata['blockname'] > 0)){
		 	   foreach($edata['blockname'] as $ckey => $consuption){
			   		if($consuption){ 
					  $diconsumptn = array("site"=>$last_insert_id,"blockname"=>$consuption,"name_change_socity"=>$edata['name_change_socity'][$ckey],"ref_id"=>$last_insert_id);   
					  $insertcon = Blocknocreport::create($diconsumptn);  
					} 
			   }
		 } 
		 }    
        return redirect()->route('sites.index');

    } */
	
	 public function movenext(Request $request, $site_id)

    {
	 
	  $sitenextres= array();
	  
	   $matchfields = ['site' => $site_id];
		  
		  $res_count = \App\Siteclubhouse::where($matchfields)->count();
		  if($res_count > 0){
		   $sitenextres = \App\Siteclubhouse::where($matchfields)->first();
		   }
	  
	     $relations = [
             'site_id' => $site_id,
			 'sitenxdata' => $sitenextres,
        ];

        return view('sites.next',  $relations);
     }
	
	
	 public function store(Request $request)

    {
 
        $edata = $request->all();
			
		if(isset($edata['site_iD'])) {	
		
		  $matchfields = ['site' => $edata['site_iD']];
		  
		  $res_count = \App\Siteclubhouse::where($matchfields)->count();
		  if($res_count > 0){
		   $res_row = \App\Siteclubhouse::where($matchfields)->first();
		    $report_res = Siteclubhouse::findOrFail($res_row->id);
	    	$report_res->update($edata);
			
			 $last_insert_id = $res_row->id;
			 
			$filename = uniqid();
	    if(isset($edata['badminton_file']))	{
		 if($edata['badminton_file'] != ""){
		  $filerow = $request->file('badminton_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."badminton".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."badminton".$last_insert_id.".".$extension;
		  $req_array =  array("badminton_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("badminton_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		$filename = uniqid();
	    if(isset($edata['kitchen_file']))	{
		 if($edata['kitchen_file'] != ""){
		  $filerow = $request->file('kitchen_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."kitchen".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."kitchen".$last_insert_id.".".$extension;
		  $req_array =  array("kitchen_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("kitchen_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		$filename = uniqid();
	    if(isset($edata['clicnic_file']))	{
		 if($edata['clicnic_file'] != ""){
		  $filerow = $request->file('clicnic_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."clinic".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."clinic".$last_insert_id.".".$extension;
		  $req_array =  array("kitchen_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("clicnic_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		
			$filename = uniqid();
	    if(isset($edata['aerobics_file']))	{
		 if($edata['aerobics_file'] != ""){
		  $filerow = $request->file('aerobics_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."aerobics".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."aerobics".$last_insert_id.".".$extension;
		  $req_array =  array("aerobics_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("aerobics_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		
			$filename = uniqid();
	    if(isset($edata['lounge_file']))	{
		 if($edata['lounge_file'] != ""){
		  $filerow = $request->file('lounge_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."lounge".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."lounge".$last_insert_id.".".$extension;
		  $req_array =  array("lounge_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("lounge_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		$filename = uniqid();
	    if(isset($edata['spa_file']))	{
		 if($edata['spa_file'] != ""){
		  $filerow = $request->file('spa_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."spa".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."spa".$last_insert_id.".".$extension;
		  $req_array =  array("spa_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("spa_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		
			$filename = uniqid();
	    if(isset($edata['homethatre_file']))	{
		 if($edata['homethatre_file'] != ""){
		  $filerow = $request->file('homethatre_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."homet".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."homet".$last_insert_id.".".$extension;
		  $req_array =  array("homethatre_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("homethatre_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		
		$filename = uniqid();
	    if(isset($edata['indoorgam_file']))	{
		 if($edata['indoorgam_file'] != ""){
		  $filerow = $request->file('indoorgam_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."indoor".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."indoor".$last_insert_id.".".$extension;
		  $req_array =  array("indoorgam_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("indoorgam_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		$filename = uniqid();
	    if(isset($edata['changingrm_file']))	{
		 if($edata['changingrm_file'] != ""){
		  $filerow = $request->file('changingrm_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."changrrm".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."changrrm".$last_insert_id.".".$extension;
		  $req_array =  array("changingrm_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("changingrm_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		
			$filename = uniqid();
	    if(isset($edata['pantry_file']))	{
		 if($edata['pantry_file'] != ""){
		  $filerow = $request->file('pantry_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."pantry".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."pantry".$last_insert_id.".".$extension;
		  $req_array =  array("pantry_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("pantry_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		$filename = uniqid();
	    if(isset($edata['swimming_file']))	{
		 if($edata['swimming_file'] != ""){
		  $filerow = $request->file('swimming_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."swim".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."swim".$last_insert_id.".".$extension;
		  $req_array =  array("swimming_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("swimming_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		$filename = uniqid();
	    if(isset($edata['openrestu_file']))	{
		 if($edata['openrestu_file'] != ""){
		  $filerow = $request->file('openrestu_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."openres".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."openres".$last_insert_id.".".$extension;
		  $req_array =  array("openrestu_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("openrestu_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		$filename = uniqid();
	    if(isset($edata['supermark_file']))	{
		 if($edata['supermark_file'] != ""){
		  $filerow = $request->file('supermark_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."superma".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."superma".$last_insert_id.".".$extension;
		  $req_array =  array("supermark_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("supermark_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		$filename = uniqid();
	    if(isset($edata['tenniescourt_file']))	{
		 if($edata['tenniescourt_file'] != ""){
		  $filerow = $request->file('tenniescourt_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."tennis".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."tennis".$last_insert_id.".".$extension;
		  $req_array =  array("tenniescourt_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("tenniescourt_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
			$filename = uniqid();
	    if(isset($edata['cricketnet_file']))	{
		 if($edata['cricketnet_file'] != ""){
		  $filerow = $request->file('cricketnet_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."cricket".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."cricket".$last_insert_id.".".$extension;
		  $req_array =  array("cricketnet_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("cricketnet_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		$filename = uniqid();
	    if(isset($edata['staking_file']))	{
		 if($edata['staking_file'] != ""){
		  $filerow = $request->file('staking_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."stak".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."stak".$last_insert_id.".".$extension;
		  $req_array =  array("staking_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("staking_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		
		$filename = uniqid();
	    if(isset($edata['squash_file']))	{
		 if($edata['squash_file'] != ""){
		  $filerow = $request->file('squash_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."squash".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."squash".$last_insert_id.".".$extension;
		  $req_array =  array("squash_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("squash_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		$filename = uniqid();
	    if(isset($edata['multi_purpose_file']))	{
		 if($edata['multi_purpose_file'] != ""){
		  $filerow = $request->file('multi_purpose_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."mpf".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."mpf".$last_insert_id.".".$extension;
		  $req_array =  array("multi_purpose_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("multi_purpose_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		
		$filename = uniqid();
	    if(isset($edata['gym_file']))	{
		 if($edata['gym_file'] != ""){
		  $filerow = $request->file('gym_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."gym".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."gym".$last_insert_id.".".$extension;
		  $req_array =  array("gym_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("gym_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		
		$filename = uniqid();
	    if(isset($edata['cafeteria_file']))	{
		 if($edata['cafeteria_file'] != ""){
		  $filerow = $request->file('cafeteria_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."cafeteria".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."cafeteria".$last_insert_id.".".$extension;
		  $req_array =  array("cafeteria_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("cafeteria_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		
		$filename = uniqid();
	    if(isset($edata['library_file']))	{
		 if($edata['library_file'] != ""){
		  $filerow = $request->file('library_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."lib".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."lib".$last_insert_id.".".$extension;
		  $req_array =  array("library_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("library_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
			$filename = uniqid();
	    if(isset($edata['yoga_file']))	{
		 if($edata['yoga_file'] != ""){
		  $filerow = $request->file('yoga_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."yoga".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."yoga".$last_insert_id.".".$extension;
		  $req_array =  array("yoga_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("yoga_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		$filename = uniqid();
	    if(isset($edata['guest_file']))	{
		 if($edata['guest_file'] != ""){
		  $filerow = $request->file('guest_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."guest".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."guest".$last_insert_id.".".$extension;
		  $req_array =  array("guest_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("guest_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		
			$filename = uniqid();
	    if(isset($edata['waiting_file']))	{
		 if($edata['waiting_file'] != ""){
		  $filerow = $request->file('waiting_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."wait".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."wait".$last_insert_id.".".$extension;
		  $req_array =  array("waiting_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("waiting_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		
			$filename = uniqid();
	    if(isset($edata['banquet_file']))	{
		 if($edata['banquet_file'] != ""){
		  $filerow = $request->file('banquet_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."banq".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."banq".$last_insert_id.".".$extension;
		  $req_array =  array("banquet_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("banquet_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		$filename = uniqid();
	    if(isset($edata['service_file']))	{
		 if($edata['service_file'] != ""){
		  $filerow = $request->file('service_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."service".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."service".$last_insert_id.".".$extension;
		  $req_array =  array("service_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("service_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		$filename = uniqid();
	    if(isset($edata['sitting_file']))	{
		 if($edata['sitting_file'] != ""){
		  $filerow = $request->file('sitting_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."sit".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."sit".$last_insert_id.".".$extension;
		  $req_array =  array("sitting_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("sitting_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		$filename = uniqid();
	    if(isset($edata['creche_file']))	{
		 if($edata['creche_file'] != ""){
		  $filerow = $request->file('creche_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."crech".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."crech".$last_insert_id.".".$extension;
		  $req_array =  array("creche_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("creche_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		
		$filename = uniqid();
	    if(isset($edata['basket_file']))	{
		 if($edata['basket_file'] != ""){
		  $filerow = $request->file('basket_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."basket".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."basket".$last_insert_id.".".$extension;
		  $req_array =  array("basket_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("basket_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		$filename = uniqid();
	    if(isset($edata['volley_file']))	{
		 if($edata['volley_file'] != ""){
		  $filerow = $request->file('volley_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."volley".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."volley".$last_insert_id.".".$extension;
		  $req_array =  array("volley_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("volley_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		 
		$filename = uniqid();
	    if(isset($edata['guide']))	{
		 if($edata['guide'] != ""){
		  $filerow = $request->file('guide');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."guide".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."guide".$last_insert_id.".".$extension;
		  $req_array =  array("guide"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("guide"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		       return redirect()->route('sites.index');
		      
		  } else{
		    $edata['site'] = $edata['site_iD'];
		  if(!isset($edata['badminton_file'])) { $edata['badminton_file'] = "";}
		  if(!isset($edata['kitchen_file'])) { $edata['kitchen_file'] = "";}
		  if(!isset($edata['clicnic_file'])) { $edata['clicnic_file'] = "";}
		  if(!isset($edata['aerobics_file'])) { $edata['aerobics_file'] = "";}
		  if(!isset($edata['lounge_file'])) { $edata['lounge_file'] = "";}
		  if(!isset($edata['spa_file'])) { $edata['spa_file'] = "";}
		  if(!isset($edata['homethatre_file'])) { $edata['homethatre_file'] = "";}
		  if(!isset($edata['indoorgam_file'])) { $edata['indoorgam_file'] = "";}
		  if(!isset($edata['changingrm_file'])) { $edata['changingrm_file'] = "";}
		  if(!isset($edata['pantry_file'])) { $edata['pantry_file'] = "";}
		  if(!isset($edata['swimming_file'])) { $edata['swimming_file'] = "";}
		  if(!isset($edata['openrestu_file'])) { $edata['openrestu_file'] = "";}
		  if(!isset($edata['supermark_file'])) { $edata['supermark_file'] = "";}
		  if(!isset($edata['tenniescourt_file'])) { $edata['tenniescourt_file'] = "";}
		  if(!isset($edata['cricketnet_file'])) { $edata['cricketnet_file'] = "";}
		  if(!isset($edata['staking_file'])) { $edata['staking_file'] = "";}
		  if(!isset($edata['squash_file'])) { $edata['squash_file'] = "";}
		  if(!isset($edata['multi_purpose_file'])) { $edata['multi_purpose_file'] = "";}
		  if(!isset($edata['gym_file'])) { $edata['gym_file'] = "";}
			if(!isset($edata['cafeteria_file'])) { $edata['cafeteria_file'] = "";}
			if(!isset($edata['library_file'])) { $edata['library_file'] = "";}
			if(!isset($edata['yoga_file'])) { $edata['yoga_file'] = "";}
			if(!isset($edata['guest_file'])) { $edata['guest_file'] = "";}
			if(!isset($edata['waiting_file'])) { $edata['waiting_file'] = "";}
			if(!isset($edata['banquet_file'])) { $edata['banquet_file'] = "";}
			if(!isset($edata['service_file'])) { $edata['service_file'] = "";}
			if(!isset($edata['sitting_file'])) { $edata['sitting_file'] = "";}
			if(!isset($edata['creche_file'])) { $edata['creche_file'] = "";}
			if(!isset($edata['basket_file'])) { $edata['basket_file'] = "";}
			if(!isset($edata['volley_file'])) { $edata['volley_file'] = "";}
			if(!isset($edata['guide'])) { $edata['guide'] = "";}
			
			
			
			
		     $insert = Siteclubhouse::create($edata);
			 
			 $last_insert_id = $insert->id;
			 
		$filename = uniqid();
	    if(isset($edata['badminton_file']))	{
		 if($edata['badminton_file'] != ""){
		  $filerow = $request->file('badminton_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."badminton".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."badminton".$last_insert_id.".".$extension;
		  $req_array =  array("badminton_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("badminton_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		$filename = uniqid();
	    if(isset($edata['kitchen_file']))	{
		 if($edata['kitchen_file'] != ""){
		  $filerow = $request->file('kitchen_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."kitchen".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."kitchen".$last_insert_id.".".$extension;
		  $req_array =  array("kitchen_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("kitchen_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		$filename = uniqid();
	    if(isset($edata['clicnic_file']))	{
		 if($edata['clicnic_file'] != ""){
		  $filerow = $request->file('clicnic_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."clinic".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."clinic".$last_insert_id.".".$extension;
		  $req_array =  array("kitchen_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("clicnic_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		
			$filename = uniqid();
	    if(isset($edata['aerobics_file']))	{
		 if($edata['aerobics_file'] != ""){
		  $filerow = $request->file('aerobics_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."aerobics".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."aerobics".$last_insert_id.".".$extension;
		  $req_array =  array("aerobics_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("aerobics_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		
			$filename = uniqid();
	    if(isset($edata['lounge_file']))	{
		 if($edata['lounge_file'] != ""){
		  $filerow = $request->file('lounge_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."lounge".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."lounge".$last_insert_id.".".$extension;
		  $req_array =  array("lounge_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("lounge_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		$filename = uniqid();
	    if(isset($edata['spa_file']))	{
		 if($edata['spa_file'] != ""){
		  $filerow = $request->file('spa_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."spa".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."spa".$last_insert_id.".".$extension;
		  $req_array =  array("spa_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("spa_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		
			$filename = uniqid();
	    if(isset($edata['homethatre_file']))	{
		 if($edata['homethatre_file'] != ""){
		  $filerow = $request->file('homethatre_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."homet".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."homet".$last_insert_id.".".$extension;
		  $req_array =  array("homethatre_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("homethatre_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		
		$filename = uniqid();
	    if(isset($edata['indoorgam_file']))	{
		 if($edata['indoorgam_file'] != ""){
		  $filerow = $request->file('indoorgam_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."indoor".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."indoor".$last_insert_id.".".$extension;
		  $req_array =  array("indoorgam_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("indoorgam_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		$filename = uniqid();
	    if(isset($edata['changingrm_file']))	{
		 if($edata['changingrm_file'] != ""){
		  $filerow = $request->file('changingrm_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."changrrm".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."changrrm".$last_insert_id.".".$extension;
		  $req_array =  array("changingrm_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("changingrm_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		
			$filename = uniqid();
	    if(isset($edata['pantry_file']))	{
		 if($edata['pantry_file'] != ""){
		  $filerow = $request->file('pantry_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."pantry".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."pantry".$last_insert_id.".".$extension;
		  $req_array =  array("pantry_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("pantry_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		$filename = uniqid();
	    if(isset($edata['swimming_file']))	{
		 if($edata['swimming_file'] != ""){
		  $filerow = $request->file('swimming_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."swim".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."swim".$last_insert_id.".".$extension;
		  $req_array =  array("swimming_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("swimming_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		$filename = uniqid();
	    if(isset($edata['openrestu_file']))	{
		 if($edata['openrestu_file'] != ""){
		  $filerow = $request->file('openrestu_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."openres".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."openres".$last_insert_id.".".$extension;
		  $req_array =  array("openrestu_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("openrestu_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		$filename = uniqid();
	    if(isset($edata['supermark_file']))	{
		 if($edata['supermark_file'] != ""){
		  $filerow = $request->file('supermark_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."superma".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."superma".$last_insert_id.".".$extension;
		  $req_array =  array("supermark_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("supermark_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		$filename = uniqid();
	    if(isset($edata['tenniescourt_file']))	{
		 if($edata['tenniescourt_file'] != ""){
		  $filerow = $request->file('tenniescourt_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."tennis".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."tennis".$last_insert_id.".".$extension;
		  $req_array =  array("tenniescourt_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("tenniescourt_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
			$filename = uniqid();
	    if(isset($edata['cricketnet_file']))	{
		 if($edata['cricketnet_file'] != ""){
		  $filerow = $request->file('cricketnet_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."cricket".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."cricket".$last_insert_id.".".$extension;
		  $req_array =  array("cricketnet_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("cricketnet_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		$filename = uniqid();
	    if(isset($edata['staking_file']))	{
		 if($edata['staking_file'] != ""){
		  $filerow = $request->file('staking_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."stak".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."stak".$last_insert_id.".".$extension;
		  $req_array =  array("staking_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("staking_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		
		$filename = uniqid();
	    if(isset($edata['squash_file']))	{
		 if($edata['squash_file'] != ""){
		  $filerow = $request->file('squash_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."squash".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."squash".$last_insert_id.".".$extension;
		  $req_array =  array("squash_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("squash_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		$filename = uniqid();
	    if(isset($edata['multi_purpose_file']))	{
		 if($edata['multi_purpose_file'] != ""){
		  $filerow = $request->file('multi_purpose_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."mpf".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."mpf".$last_insert_id.".".$extension;
		  $req_array =  array("multi_purpose_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("multi_purpose_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		
		$filename = uniqid();
	    if(isset($edata['gym_file']))	{
		 if($edata['gym_file'] != ""){
		  $filerow = $request->file('gym_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."gym".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."gym".$last_insert_id.".".$extension;
		  $req_array =  array("gym_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("gym_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		
		$filename = uniqid();
	    if(isset($edata['cafeteria_file']))	{
		 if($edata['cafeteria_file'] != ""){
		  $filerow = $request->file('cafeteria_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."cafeteria".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."cafeteria".$last_insert_id.".".$extension;
		  $req_array =  array("cafeteria_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("cafeteria_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		
		$filename = uniqid();
	    if(isset($edata['library_file']))	{
		 if($edata['library_file'] != ""){
		  $filerow = $request->file('library_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."lib".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."lib".$last_insert_id.".".$extension;
		  $req_array =  array("library_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("library_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
			$filename = uniqid();
	    if(isset($edata['yoga_file']))	{
		 if($edata['yoga_file'] != ""){
		  $filerow = $request->file('yoga_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."yoga".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."yoga".$last_insert_id.".".$extension;
		  $req_array =  array("yoga_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("yoga_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		$filename = uniqid();
	    if(isset($edata['guest_file']))	{
		 if($edata['guest_file'] != ""){
		  $filerow = $request->file('guest_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."guest".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."guest".$last_insert_id.".".$extension;
		  $req_array =  array("guest_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("guest_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		
			$filename = uniqid();
	    if(isset($edata['waiting_file']))	{
		 if($edata['waiting_file'] != ""){
		  $filerow = $request->file('waiting_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."wait".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."wait".$last_insert_id.".".$extension;
		  $req_array =  array("waiting_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("waiting_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		
			$filename = uniqid();
	    if(isset($edata['banquet_file']))	{
		 if($edata['banquet_file'] != ""){
		  $filerow = $request->file('banquet_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."banq".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."banq".$last_insert_id.".".$extension;
		  $req_array =  array("banquet_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("banquet_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		$filename = uniqid();
	    if(isset($edata['service_file']))	{
		 if($edata['service_file'] != ""){
		  $filerow = $request->file('service_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."service".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."service".$last_insert_id.".".$extension;
		  $req_array =  array("service_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("service_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		$filename = uniqid();
	    if(isset($edata['sitting_file']))	{
		 if($edata['sitting_file'] != ""){
		  $filerow = $request->file('sitting_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."sit".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."sit".$last_insert_id.".".$extension;
		  $req_array =  array("sitting_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("sitting_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		$filename = uniqid();
	    if(isset($edata['creche_file']))	{
		 if($edata['creche_file'] != ""){
		  $filerow = $request->file('creche_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."crech".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."crech".$last_insert_id.".".$extension;
		  $req_array =  array("creche_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("creche_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		
		$filename = uniqid();
	    if(isset($edata['basket_file']))	{
		 if($edata['basket_file'] != ""){
		  $filerow = $request->file('basket_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."basket".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."basket".$last_insert_id.".".$extension;
		  $req_array =  array("basket_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("basket_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		$filename = uniqid();
	    if(isset($edata['volley_file']))	{
		 if($edata['volley_file'] != ""){
		  $filerow = $request->file('volley_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."volley".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."volley".$last_insert_id.".".$extension;
		  $req_array =  array("volley_file"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("volley_file"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		
			$filename = uniqid();
	    if(isset($edata['guide']))	{
		 if($edata['guide'] != ""){
		  $filerow = $request->file('guide');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('clubhouse',$filename."_"."guide".$last_insert_id.".".$extension);
		  $filename_extension = 'clubhouse/'.$filename."_"."guide".$last_insert_id.".".$extension;
		  $req_array =  array("guide"=> $filename_extension);
		  $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("guide"=> "");
		   $report = Siteclubhouse::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		return redirect()->route('sites.index');
		    
		  }
		}
		else{
		
		
			
		if(!isset($edata['logoimage'])) { $edata['logoimage'] = "";}
		if(!isset($edata['helippad_file'])) { $edata['helippad_file'] = "";}
		if(!isset($edata['power_backup_file'])) { $edata['power_backup_file'] = "";}
		if(!isset($edata['solar_pwr_file'])) { $edata['solar_pwr_file'] = "";}
		if(!isset($edata['wsp_file'])) { $edata['wsp_file'] = "";}
		if(!isset($edata['hydro_pneumatic_sys_file'])) { $edata['hydro_pneumatic_sys_file'] = "";}
		if(!isset($edata['guide'])) { $edata['guide'] = "";} 
		if(!isset($edata['smoke_image'])) { $edata['smoke_image'] = "";} 
		if(!isset($edata['heat_image'])) { $edata['heat_image'] = "";} 
		
		if(!isset($edata['num_of_blocks_text'])) { $edata['num_of_blocks_text'] = "";} 
		if(!isset($edata['num_of_floors'])) { $edata['num_of_floors'] = "";} 
		if(!isset($edata['basement_one'])) { $edata['basement_one'] = "";} 
		if(!isset($edata['num_of_flats'])) { $edata['num_of_flats'] = "";} 
		if(!isset($edata['num_of_vallas'])) { $edata['num_of_vallas'] = "";} 
		if(!isset($edata['landscape_area'])) { $edata['landscape_area'] = "";}  
		if(!isset($edata['helipad'])) { $edata['helipad'] = "";} 
		if(!isset($edata['helipad_text'])) { $edata['helipad_text'] = "";} 
		if(!isset($edata['power_backup'])) { $edata['power_backup'] = "";} 
		if(!isset($edata['fire_pump_rooms'])) { $edata['fire_pump_rooms'] = "";} 
		if(!isset($edata['hydro_pneumatic_sys'])) { $edata['hydro_pneumatic_sys'] = "";} 
		if(!isset($edata['rainwater_harvest'])) { $edata['rainwater_harvest'] = "";} 
		if(!isset($edata['flat_type'])) { $edata['flat_type'] = "";} 
		if(!isset($edata['wsppahetwotext'])) { $edata['wsppahetwotext'] = "";} 
		if(!isset($edata['stppahetwotext'])) { $edata['stppahetwotext'] = "";} 
		
		
		
		
		$prear = "";
		$postp = "";
        if(isset($edata['bms_prepaid'])) { if(count($edata['bms_prepaid']) > 0) {$prear = implode("," ,$edata['bms_prepaid']); } }
	    if(isset($edata['bms_postpaid'])) {if(count($edata['bms_postpaid']) > 0) {$postp = implode("," ,$edata['bms_postpaid']); }}
		$edata['bms_prepaid'] = $prear;
		$edata['bms_postpaid'] = $postp; 
		
			
		$insert = Site::create($edata);
		$last_insert_id = $insert->id;
		
		echo  $site_id = $last_insert_id;
		
		/////////////////////return redirect()->route('sites.next',$site_id);
		
		
	
		
		$filename = uniqid();
	    if(isset($edata['helippad_file']))	{
		 if($edata['helippad_file'] != ""){
		        $filerow = $request->file('helippad_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('sitefiles',$filename."_"."helipad".$last_insert_id.".".$extension);
		  $filename_extension = 'sitefiles/'.$filename."_"."helipad".$last_insert_id.".".$extension;
		  $req_array =  array("helippad_file"=> $filename_extension);
		  $report = Site::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("helippad_file"=> "");
		   $report = Site::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		$filename = uniqid();
	    if(isset($edata['logoimage']))	{
		 if($edata['logoimage'] != ""){
		        $filerow = $request->file('logoimage');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('sitefiles',$filename."_"."logo".$last_insert_id.".".$extension);
		  $filename_extension = 'sitefiles/'.$filename."_"."logo".$last_insert_id.".".$extension;
		  $req_array =  array("logoimage"=> $filename_extension);
		  $report = Site::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("logoimage"=> "");
		   $report = Site::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
			$filename = uniqid();
	    if(isset($edata['heat_image']))	{
		 if($edata['heat_image'] != ""){
		        $filerow = $request->file('heat_image');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('sitefiles',$filename."_"."heat".$last_insert_id.".".$extension);
		  $filename_extension = 'sitefiles/'.$filename."_"."heat".$last_insert_id.".".$extension;
		  $req_array =  array("heat_image"=> $filename_extension);
		  $report = Site::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("heat_image"=> "");
		   $report = Site::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		
			$filename = uniqid();
	    if(isset($edata['smoke_image']))	{
		 if($edata['smoke_image'] != ""){
		        $filerow = $request->file('smoke_image');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('sitefiles',$filename."_"."heat".$last_insert_id.".".$extension);
		  $filename_extension = 'sitefiles/'.$filename."_"."heat".$last_insert_id.".".$extension;
		  $req_array =  array("smoke_image"=> $filename_extension);
		  $report = Site::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("smoke_image"=> "");
		   $report = Site::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		
		
		 if(isset($edata['transcapacity'])) {
		 if(count($edata['transcapacity'] > 0)){
		 if(isset($edata['transfilename'])) {
		 	   foreach($request->file('transfilename') as $ckey => $consuption){
			   
			   $filename = uniqid();
			   		if($consuption){ 
					  $diconsumptn = array("site"=>$last_insert_id,"capacity"=>$edata['transcapacity'][$ckey],"filename"=>'','make'=>$edata['transmake'][$ckey],'location'=>$edata['translocation'][$ckey]);   
					  $insertcon = Sitetransformer::create($diconsumptn); 
					  $Transid = $insertcon->id;
					  if(isset($edata['transfilename'][$ckey])) {
						$extension = $consuption->getClientOriginalExtension();
						$file = $consuption->move('sitetransformers',$filename."_"."trans".$Transid.".".$extension);
						$filename_extension = 'sitetransformers/'.$filename."_"."trans".$Transid.".".$extension;
						$req_array =  array("filename"=> $filename_extension);
						$report = Sitetransformer::findOrFail($Transid);
						$report->update($req_array);
						}
					} 
			   }
			   }
		 } 
		 }   
		 
		  if(isset($edata['dgcapacity'])) {
		 if(count($edata['dgcapacity'] > 0)){
		 if(isset($edata['dgfilename'])) {
		 	   foreach($request->file('dgfilename') as $ckey => $consuption){
			   
			 
			   $filename = uniqid();
			   		if($consuption){ 
					  $diconsumptn = array("site"=>$last_insert_id,"capacity"=>$edata['dgcapacity'][$ckey],"filename"=>'','make'=>$edata['dgmake'][$ckey],'location'=>$edata['dglocation'][$ckey]);   
					  $insertcon = Sitedgset::create($diconsumptn); 
					  $Transid = $insertcon->id;
					  if(isset($edata['dgfilename'][$ckey])) {
						$extension = $consuption->getClientOriginalExtension();
						$file = $consuption->move('sitedgsets',$filename."_"."dgsets".$Transid.".".$extension);
						$filename_extension = 'sitedgsets/'.$filename."_"."dgsets".$Transid.".".$extension;
						$req_array =  array("filename"=> $filename_extension);
						$report = Sitedgset::findOrFail($Transid);
						$report->update($req_array);
						}
					} 
			   }
			   }
		 } 
		 } 
		 
		 
		 //LIFT
		 
		 	 
		$diconsumptn = array();
		 if(isset($edata['lifts'])) {
		 if(count($edata['lifts'] > 0)){
		 	   foreach($edata['lift_num'] as $ckey => $consuption){
			   		if($consuption){ 
					  $diconsumptn = array("site"=>$last_insert_id,"lift_num"=>$consuption,"make"=>$edata['make'][$ckey],"type"=>$edata['type'][$ckey]);   
					  $insertcon = Sitelift::create($diconsumptn);  
					} 
			   }
		 } 
		 }    
		 
		 // END LIFTS
		 
		 // BOOM BARRIER
		    
			
		$diconsumptn = array();
		 if(isset($edata['bmbrlocation'])) {
		 if(count($edata['bmbrlocation'] > 0)){
		 	   foreach($edata['bmbrlocation'] as $ckey => $consuption){
			   		if($consuption){ 
					  $diconsumptn = array("site"=>$last_insert_id,"location"=>$consuption,"make"=>$edata['bmbrmake'][$ckey],"length"=>$edata['bmbrlength'][$ckey]);   
					  $insertcon = Siteboombarrier::create($diconsumptn);  
					} 
			   }
		 } 
		 }     
		 // END BOOM BARRIER
		 
		 // FLATS
		 
		  if(isset($edata['num_of_flats'])) {
		 if((int)($edata['num_of_flats'] > 0)){
	
					  $diconsumptn = array("site"=>$last_insert_id,"onebhk"=>$edata['onebhk'],"twobhk"=>$edata['twobhk'],"threebhk"=>$edata['threebhk'],"fourbhk"=>$edata['fourbhk'],"fivebhk"=>$edata['fivebhk']);    
					  $insertcon = Siteflat::create($diconsumptn); 
						
		 } 
		 } 
		 
		 // END FLATS
		 
		 
		 // FIRE PUMP ROOMS
		 
		 	$diconsumptn = array();
		 if(isset($edata['pmplocation'])) {
		 if(count($edata['pmplocation'] > 0)){
		 	   foreach($edata['pmplocation'] as $ckey => $consuption){
			   		if($consuption){ 
					  $diconsumptn = array("site"=>$last_insert_id,"location"=>$consuption,"jockey"=>$edata['jockey'][$ckey],"main"=>$edata['main'][$ckey],"dg"=>$edata['dg'][$ckey],"booster"=>$edata['booster'][$ckey]);   
					  $insertcon = Sitefirepumproom::create($diconsumptn);  
					} 
			   }
		 } 
		 }    
		 
		 
		  
		  
		 //STP
		 
		  if(isset($edata['stpcapacity'])) {
		 if(count($edata['stpcapacity'] > 0)){
		 if(isset($edata['stpfilename'])) {
		 	   foreach($request->file('stpfilename') as $ckey => $consuption){
			   
			 
			   $filename = uniqid();
			   		if($consuption){ 
					  $diconsumptn = array("site"=>$last_insert_id,"capacity"=>$edata['stpcapacity'][$ckey],"filename"=>'','make'=>$edata['stpmake'][$ckey],'technology'=>$edata['stptechnology'][$ckey],'type'=>$edata['stpphase'][$ckey]);   
					  $insertcon = Sitestp::create($diconsumptn); 
					  $Transid = $insertcon->id;
					  if(isset($edata['stpfilename'][$ckey])) {
						$extension = $consuption->getClientOriginalExtension();
						$file = $consuption->move('stps',$filename."_"."stp".$Transid.".".$extension);
						$filename_extension = 'stps/'.$filename."_"."stp".$Transid.".".$extension;
						$req_array =  array("filename"=> $filename_extension);
						$report = Sitestp::findOrFail($Transid);
						$report->update($req_array);
						}
					} 
			   }
			   }
		 } 
		 } 
		 
		 
	

 //WSP
  
		  if(isset($edata['wspcapacity'])) {
		 if(count($edata['wspcapacity'] > 0)){
		 if(isset($edata['wspfilename'])) {
		 	   foreach($request->file('wspfilename') as $ckey => $consuption){
			   
			 
			   $filename = uniqid();
			   		if($consuption){ 
					  $diconsumptn = array("site"=>$last_insert_id,"capacity"=>$edata['wspcapacity'][$ckey],"filename"=>'','make'=>$edata['wspmake'][$ckey],'type'=>$edata['wspphase'][$ckey]);   
					  $insertcon = Sitewsp::create($diconsumptn); 
					  $Transid = $insertcon->id;
					  if(isset($edata['wspfilename'][$ckey])) {
						$extension = $consuption->getClientOriginalExtension();
						$file = $consuption->move('wsps',$filename."_"."wsp".$Transid.".".$extension);
						$filename_extension = 'wsps/'.$filename."_"."wsp".$Transid.".".$extension;
						$req_array =  array("filename"=> $filename_extension);
						$report = Sitewsp::findOrFail($Transid);
						$report->update($req_array);
						}
					} 
			   }
			   }
		 } 
		 }   
		 
		 
		 
	
		 
		 /* if(isset($edata['num_of_pumps'])) {
		 if(count($edata['num_of_pumps'] > 0)){
		 if(isset($edata['hydrofilename'])) {
		 	   foreach($request->file('hydrofilename') as $ckey => $consuption){
			   
			 
			   $filename = uniqid();
			   		if($consuption){ 
					  $diconsumptn = array("site"=>$last_insert_id,"num_of_pumps"=>$edata['num_of_pumps'][$ckey],"capacity"=>$edata['hydrocapacity'][$ckey],"filename"=>'','make'=>$edata['hydromake'][$ckey]);   
					  $insertcon = Sitehydron::create($diconsumptn); 
					  $Transid = $insertcon->id;
					  if(isset($edata['hydrofilename'][$ckey])) {
						$extension = $consuption->getClientOriginalExtension();
						$file = $consuption->move('hydro',$filename."_"."hydro".$Transid.".".$extension);
						$filename_extension = 'hydro/'.$filename."_"."hydro".$Transid.".".$extension;
						$req_array =  array("filename"=> $filename_extension);
						$report = Sitehydron::findOrFail($Transid);
						$report->update($req_array);
						}
					} 
			   }
			   }
		 } 
		 }   */
		 
		 
		  // SOLAR
		  if(isset($edata['solarcapacity'])) {
		 if(count($edata['solarcapacity'] > 0)){
		 if(isset($edata['solarfilename'])) {
		 	   foreach($request->file('solarfilename') as $ckey => $consuption){
			   
			 
			   $filename = uniqid();
			   		if($consuption){ 
					  $diconsumptn = array("site"=>$last_insert_id,"capacity"=>$edata['solarcapacity'][$ckey],"filename"=>'','make'=>$edata['solarmake'][$ckey],'location'=>$edata['solarlocation'][$ckey]);   
					  $insertcon = Sitesolar::create($diconsumptn); 
					  $Transid = $insertcon->id;
					  if(isset($edata['solarfilename'][$ckey])) {
						$extension = $consuption->getClientOriginalExtension();
						$file = $consuption->move('solar',$filename."_"."solar".$Transid.".".$extension);
						$filename_extension = 'solar/'.$filename."_"."solar".$Transid.".".$extension;
						$req_array =  array("filename"=> $filename_extension);
						$report = Sitesolar::findOrFail($Transid);
						$report->update($req_array);
						}
					} 
			   }
			   }
		 } 
		 }   
		 
		 
		   // SOLAR POWER
		  if(isset($edata['solarpwrcapacity'])) {
		 if(count($edata['solarpwrcapacity'] > 0)){
		 if(isset($edata['solarpwrfilename'])) {
		 	   foreach($request->file('solarpwrfilename') as $ckey => $consuption){
			   
			 
			   $filename = uniqid();
			   		if($consuption){ 
					  $diconsumptn = array("site"=>$last_insert_id,"capacity"=>$edata['solarpwrcapacity'][$ckey],"filename"=>'','make'=>$edata['solarpwrmake'][$ckey],'location'=>$edata['solarpwrlocation'][$ckey]);   
					  $insertcon = Sitepwrsolar::create($diconsumptn); 
					  $Transid = $insertcon->id;
					  if(isset($edata['solarpwrfilename'][$ckey])) {
						$extension = $consuption->getClientOriginalExtension();
						$file = $consuption->move('solarpwr',$filename."_"."solarpwr".$Transid.".".$extension);
						$filename_extension = 'solarpwr/'.$filename."_"."solarpwr".$Transid.".".$extension;
						$req_array =  array("filename"=> $filename_extension);
						$report = Sitepwrsolar::findOrFail($Transid);
						$report->update($req_array);
						}
					} 
			   }
			   }
		 } 
		 }   
		 
		 
		 //Public Addressing System
		 
		   if(isset($edata['pbalocation'])) {
		 if(count($edata['pbalocation'] > 0)){
		 if(isset($edata['pbafilename'])) {
		 	   foreach($request->file('pbafilename') as $ckey => $consuption){
			   
			 
			   $filename = uniqid();
			   		if($consuption){ 
					  $diconsumptn = array("site"=>$last_insert_id,"location"=>$edata['pbalocation'][$ckey],"filename"=>'','make'=>$edata['pbamake'][$ckey]);   
					  $insertcon = Sitepba::create($diconsumptn); 
					  $Transid = $insertcon->id;
					  if(isset($edata['pbafilename'][$ckey])) {
						$extension = $consuption->getClientOriginalExtension();
						$file = $consuption->move('pba',$filename."_"."pba".$Transid.".".$extension);
						$filename_extension = 'pba/'.$filename."_"."pba".$Transid.".".$extension;
						$req_array =  array("filename"=> $filename_extension);
						$report = Sitepba::findOrFail($Transid);
						$report->update($req_array);
						}
					} 
			   }
			   }
		 } 
		 }   
		 
		 // FIRE ALARAM
		 
		   if(isset($edata['faslocation'])) {
		 if(count($edata['faslocation'] > 0)){
		 if(isset($edata['fasfilename'])) {
		 	   foreach($request->file('fasfilename') as $ckey => $consuption){
			   
			 
			   $filename = uniqid();
			   		if($consuption){ 
					  $diconsumptn = array("site"=>$last_insert_id,"location"=>$edata['faslocation'][$ckey],"filename"=>'','make'=>$edata['fasmake'][$ckey]);   
					  $insertcon = Sitefirealar::create($diconsumptn); 
					  $Transid = $insertcon->id;
					  if(isset($edata['fasfilename'][$ckey])) {
						$extension = $consuption->getClientOriginalExtension();
						$file = $consuption->move('fas',$filename."_"."fas".$Transid.".".$extension);
						$filename_extension = 'fas/'.$filename."_"."fas".$Transid.".".$extension;
						$req_array =  array("filename"=> $filename_extension);
						$report = Sitefirealar::findOrFail($Transid);
						$report->update($req_array);
						}
					} 
			   }
			   }
		 } 
		 }   
		 
		 
		
		  
		 // FLOW ANNOUNCIATOR
		 
		 if(isset($edata['flowanlocation'])) {
		 if(count($edata['flowanlocation'] > 0)){
		 if(isset($edata['flowanfilename'])) {
		   
		 
		 	   foreach($request->file('flowanfilename') as $ckey => $consuption){
			   
			  
			   $filename = uniqid();
			   		if($consuption){ 
					  $diconsumptn = array("site"=>$last_insert_id,"location"=>$edata['flowanlocation'][$ckey],"filename"=>'','make'=>$edata['flowanmake'][$ckey],'flowzone'=>$edata['flowanzone'][$ckey]);
					  $insertcon = Siteflowann::create($diconsumptn); 
					  $Transid = $insertcon->id;
					  if(isset($edata['flowanfilename'][$ckey])) {
						$extension = $consuption->getClientOriginalExtension();
						$file = $consuption->move('flowann',$filename."_"."flowann".$Transid.".".$extension);
						$filename_extension = 'flowann/'.$filename."_"."flowann".$Transid.".".$extension;
						$req_array =  array("filename"=> $filename_extension);
						$report = Siteflowann::findOrFail($Transid);
						$report->update($req_array);
						}
					} 
			   }
			   } 
		 } 
		 }   
		 


     if(isset($edata['gacapacity'])) {
		 if(count($edata['gacapacity'] > 0)){
		  if(isset($edata['gafilename'])) { 
		 	   foreach($request->file('gafilename') as $ckey => $consuption){
			   
			 
			   $filename = uniqid();
			   		if($consuption){ 
					  $diconsumptn = array("site"=>$last_insert_id,"capacity"=>$edata['gacapacity'][$ckey],"filename"=>'',"make" => $edata['gamake'][$ckey],"location" => $edata['galocation'][$ckey],"name"=>$edata['gabankname'][$ckey]);   
					  $insertcon = Sitegasbank::create($diconsumptn); 
					  $Transid = $insertcon->id;
					  if(isset($edata['gafilename'][$ckey])) {
						$extension = $consuption->getClientOriginalExtension();
						$file = $consuption->move('gasbanks',$filename."_"."gasbanks".$Transid.".".$extension);
						$filename_extension = 'gasbanks/'.$filename."_"."gasbanks".$Transid.".".$extension;
						$req_array =  array("filename"=> $filename_extension);
						$report = Sitegasbank::findOrFail($Transid);
						$report->update($req_array);
						}
					} 
			   }
			   }
		 } 
		 }     
		 
		 
		$diconsumptn = array();
		 if(isset($edata['blockname'])) {
		 if(count($edata['blockname'] > 0)){
		 	   foreach($edata['blockname'] as $ckey => $consuption){
			   		if($consuption){ 
					  $diconsumptn = array("site"=>$last_insert_id,"blockname"=>$consuption,"name_change_socity"=>$edata['name_change_socity'][$ckey],"ref_id"=>$last_insert_id);   
					  $insertcon = Blocknocreport::create($diconsumptn);  
					} 
			   }
		 } 
		 }    
		 
		  // POST PAIDS
		 
		 $diconsumptn = array();
		 if(isset($edata['post_start_date'])) {
		 if(count($edata['post_start_date'] > 0)){
		 	   foreach($edata['post_start_date'] as $ckey => $consuption){
			   		if($consuption){ 
					  $diconsumptn = array("site"=>$last_insert_id,"post_start_date"=>$consuption,"post_end_date"=>$edata['post_end_date'][$ckey]);   
					  $insertcon = Siteppostpaid::create($diconsumptn);  
					} 
			   }
		 } 
		 }    
		 
		 echo  $site_id = $last_insert_id;
		
		return redirect()->route('sites.next',$site_id);
        return redirect()->route('sites.index');
		}

    }




    /**

     * Show the form for editing Client.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

   /* public function edit($id)

    {

       


        $sites = Site::findOrFail($id);
		$dgconsumparray = array();
		 $match_dg_fields =  ['ref_id' => $id, 'site' => $id];
		  
		  $dgconsumparray_cn = \App\Blocknocreport::where($match_dg_fields)->count();
         if($dgconsumparray_cn > 0){
		     $dgconsumparray = \App\Blocknocreport::where($match_dg_fields)->get();
		 }

       $relations = [

            'client_statuses' => \App\ClientStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			'firenoc' => $dgconsumparray,

        ];



        return view('sites.edit', compact('sites') + $relations);

    } */
	
	  public function edit($id)

    {

        $sites = Site::findOrFail($id);
		$dgconsumparray = array();
		 $match_dg_fields =  ['ref_id' => $id, 'site' => $id];
		  
		  $dgconsumparray_cn = \App\Blocknocreport::where($match_dg_fields)->count();
         if($dgconsumparray_cn > 0){
		     $dgconsumparray = \App\Blocknocreport::where($match_dg_fields)->get();
		 }
		 
		 // TRANSFORMERS
		 
		 $match_trans_fields =  ['site' => $id];
		 $transformers = array();
		 $dgconsumparray_cn = \App\Sitetransformer::where($match_trans_fields)->count();
         if($dgconsumparray_cn > 0){
		     $transformers = \App\Sitetransformer::where($match_trans_fields)->get();
		 }
		 
		  // STP 
		 
		 $match_trans_fields =  ['site' => $id];
		 $stpval = array();
		 $dgconsumparray_cn = \App\Sitestp::where($match_trans_fields)->count();
         if($dgconsumparray_cn > 0){
		     $stpval = \App\Sitestp::where($match_trans_fields)->get();
		 }
		 
		   // WSP 
		 
		 $match_trans_fields =  ['site' => $id];
		 $wspval = array();
		 $dgconsumparray_cn = \App\Sitewsp::where($match_trans_fields)->count();
         if($dgconsumparray_cn > 0){
		     $wspval = \App\Sitewsp::where($match_trans_fields)->get();
		 }
		 
		 // GAS BANKS
		 
		  $match_trans_fields =  ['site' => $id];
		 $gasbanksval = array();
		 $dgconsumparray_cn = \App\Sitegasbank::where($match_trans_fields)->count();
         if($dgconsumparray_cn > 0){
		     $gasbanksval = \App\Sitegasbank::where($match_trans_fields)->get();
		 }
		 
		 // DGSETS
		 
		 $match_trans_fields =  ['site' => $id];
		 $dgsetval = array();
		 $dgconsumparray_cn = \App\Sitedgset::where($match_trans_fields)->count();
         if($dgconsumparray_cn > 0){
		     $dgsetval = \App\Sitedgset::where($match_trans_fields)->get();
		 }
		 
		 // LIFTS
		  $match_trans_fields =  ['site' => $id];
		 $liftval = array();
		 $dgconsumparray_cn = \App\Sitelift::where($match_trans_fields)->count();
         if($dgconsumparray_cn > 0){
		     $liftval = \App\Sitelift::where($match_trans_fields)->get();
		 }
		 
		 //FLATS
		
		
		 $match_trans_fields =  ['site' => $id];
		 $flatval = array();
		 $dgconsumparray_cn = \App\Siteflat::where($match_trans_fields)->count();
         if($dgconsumparray_cn > 0){
		     $flatval = \App\Siteflat::where($match_trans_fields)->first();
		 }
		 
		 // POWER PUMPS
		 
		  $match_trans_fields =  ['site' => $id];
		 $pwrpumps = array();
		 $dgconsumparray_cn = \App\Sitefirepumproom::where($match_trans_fields)->count();
         if($dgconsumparray_cn > 0){
		     $pwrpumps = \App\Sitefirepumproom::where($match_trans_fields)->get();
		 }
		 
		 
		 // HYDRO PUMPS
		 
		/*  $match_trans_fields =  ['site' => $id];
		 $hydrosys = array();
		 $dgconsumparray_cn = \App\Sitehydron::where($match_trans_fields)->count();
         if($dgconsumparray_cn > 0){
		     $hydrosys = \App\Sitehydron::where($match_trans_fields)->get();
		 } */
		 
		 // POSTPAID
		 
		   $match_trans_fields =  ['site' => $id];
		 $postpaid = array();
		 $dgconsumparray_cn = \App\Siteppostpaid::where($match_trans_fields)->count();
         if($dgconsumparray_cn > 0){
		     $postpaid = \App\Siteppostpaid::where($match_trans_fields)->get();
		 }
		 
		 // PBA
		 
		   $match_trans_fields =  ['site' => $id];
		 $pbasys = array();
		 $dgconsumparray_cn = \App\Sitepba::where($match_trans_fields)->count();
         if($dgconsumparray_cn > 0){
		     $pbasys = \App\Sitepba::where($match_trans_fields)->get();
		 }
		 
		  
		 // FIRE ALARAM
		 
		   $match_trans_fields =  ['site' => $id];
		 $firealaram = array();
		 $dgconsumparray_cn = \App\Sitefirealar::where($match_trans_fields)->count();
         if($dgconsumparray_cn > 0){
		     $firealaram = \App\Sitefirealar::where($match_trans_fields)->get();
		 }
		 
		 
		  // Solar
		 
		   $match_trans_fields =  ['site' => $id];
		 $solarsys = array();
		 $dgconsumparray_cn = \App\Sitesolar::where($match_trans_fields)->count();
         if($dgconsumparray_cn > 0){
		     $solarsys = \App\Sitesolar::where($match_trans_fields)->get();
		 }
		 
		 
		   // SolarPwr
		 
		   $match_trans_fields =  ['site' => $id];
		 $solarpwrsys = array();
		 $dgconsumparray_cn = \App\Sitepwrsolar::where($match_trans_fields)->count();
         if($dgconsumparray_cn > 0){
		     $solarpwrsys = \App\Sitepwrsolar::where($match_trans_fields)->get();
		 }
		 
		 
		  //FLOW ANNUATORS
		   $match_trans_fields =  ['site' => $id];
		 $siteflowann_res = array();
		 $siteflowann_cn = \App\Siteflowann::where($match_trans_fields)->count();
         if($siteflowann_cn > 0){
		     $siteflowann_res = \App\Siteflowann::where($match_trans_fields)->get();
		 }
		 
		 // SECURITY BOOM BARRIER
		 
		 $match_trans_fields =  ['site' => $id];
		 $boombarier_res = array();
		 $boombarier_cn = \App\Siteboombarrier::where($match_trans_fields)->count();
         if($boombarier_cn > 0){
		     $boombarier_res = \App\Siteboombarrier::where($match_trans_fields)->get();
		 }
		 
		 
		/* echo "<pre>";
		   print_r($boombarier_res);
		 echo "</pre>";exit; */

       $relations = [

            'client_statuses' => \App\ClientStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			'sitedata' => $sites,
			'firenoc' => $dgconsumparray,
			'transformer' => $transformers,
			'stp' => $stpval,
			'wsp' => $wspval,
			'gasbank' => $gasbanksval,
			'dgsets' => $dgsetval,
			'powerpumps' => $pwrpumps,
			'lifts' => $liftval,
			'flats' => $flatval,
			'postpaid' =>  $postpaid,
			'pbasys' => $pbasys,
			'firealaram' => $firealaram,
			'solarsys' => $solarsys,
			'solarpwrsys' => $solarpwrsys,
			'flowannres' => $siteflowann_res,
			'barrierres' => $boombarier_res,
			
			
			

        ];
		
		/*echo "POST";
		echo "<pre>";
		  print_r($postpaid);
		echo "</pre>";

echo "pbasys";
echo "<pre>";
		  print_r($pbasys);
		echo "</pre>";

echo "firealaram";
echo "<pre>";
		  print_r($firealaram);
		echo "</pre>";

echo "solarsys";
echo "<pre>";
		  print_r($solarsys);
		echo "</pre>";

echo "solarpwrsys";
echo "<pre>";
		  print_r($solarpwrsys);
		echo "</pre>";
	echo "hydrosys";
	
	echo "<pre>";
		  print_r($hydrosys);
		echo "</pre>";	
		//exit; */
		
	/*	echo "
	<pre>";
		  print_r($sites);
		echo "</pre>";


echo "<pre>";
		  print_r($dgconsumparray);
		echo "</pre>";


echo "<pre>";
		  print_r($transformers);
		echo "</pre>";


echo "<pre>";
		  print_r($stpval);
		echo "</pre>";


echo "<pre>";
		  print_r($gasbanksval);
		echo "</pre>";
		echo "DGSET";
		echo "<pre>";
		  print_r($dgsetval);
		echo "</pre>";
		echo "<pre>";
		  print_r($pwrpumps);
		echo "</pre>";
		
		echo "<pre>";
		  print_r($liftval);
		echo "</pre>";
		
		echo "<pre>";
		  print_r($flatval);
		echo "</pre>";

       // exit; */

        return view('sites.edit', compact('sites') + $relations);

    }





    /**

     * Update Client in storage.

     *

     * @param  \App\Http\Requests\UpdateClientsRequest  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

   /* public function update(UpdateSitesRequest $request, $id)

    {

        $site = Site::findOrFail($id);

        $site->update($request->all());
		
		$edata = $request->all();
		
		$diconsumptn = array();
		 DB::table('blocknocreports')->where('ref_id', '=', $id)->delete();
		 if(isset($edata['blockname'])) {
		 if(count($edata['blockname'] > 0)){
		 	   foreach($edata['blockname'] as $ckey => $consuption){
			   		if($consuption){ 
					  $diconsumptn = array("site"=>$id,"blockname"=>$consuption,"name_change_socity"=>$edata['name_change_socity'][$ckey],"ref_id"=>$id);   
					  $insertcon = Blocknocreport::create($diconsumptn);  
					} 
			   }
		 } 
		 } 



        return redirect()->route('sites.index');

    }*/
	
	 
	 public function update(Request $request, $id)

    {
		$edata1 = $request->all();
		$blocknames = array();
		$blocknames = $edata1['blockname'];
		
	    $prear = "";
		$postp = "";
        if(isset($edata['bms_prepaid'])) { if(count($edata['bms_prepaid']) > 0) {$prear = implode("," ,$edata['bms_prepaid']); } }
	    if(isset($edata['bms_postpaid'])) {if(count($edata['bms_postpaid']) > 0) {$postp = implode("," ,$edata['bms_postpaid']); }}
		$edata['bms_prepaid'] = $prear;
		$edata['bms_postpaid'] = $postp; 

        $site = Site::findOrFail($id);
		
		 if(isset($edata['helippad_file']))	{
		 $edata['helippad_file'] = "";
		 }

       if(isset($edata['logoimage']))	{
	   $edata['logoimage'] = "";
	   }
	   
	   if(isset($edata['heat_image']))	{
	   $edata['heat_image'] = "";
	   }
	   
	   if(isset($edata['smoke_image']))	{
	   $edata['smoke_image'] = "";
	   }
        $site->update($edata);
		
		$diconsumptn = array();
		
		$last_insert_id = $id;
		 	 
		  DB::table('blocknocreports')->where('site', '=', $id)->delete();
		  DB::table('siteppostpaids')->where('site', '=', $id)->delete();
		  DB::table('siteflats')->where('site', '=', $id)->delete();
		  DB::table('sitelifts')->where('site', '=', $id)->delete();
		  DB::table('siteboombarriers')->where('site', '=', $id)->delete();
		  DB::table('sitefirepumprooms')->where('site', '=', $id)->delete();
			 
		 
		$last_insert_id = $id;
			$filename = uniqid();
	    if(isset($edata['helippad_file']))	{
		 if($edata['helippad_file'] != ""){
		        $filerow = $request->file('helippad_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('sitefiles',$filename."_"."helipad".$last_insert_id.".".$extension);
		  $filename_extension = 'sitefiles/'.$filename."_"."helipad".$last_insert_id.".".$extension;
		  $req_array =  array("helippad_file"=> $filename_extension);
		  $report = Site::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("helippad_file"=> "");
		   $report = Site::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		
		$filename = uniqid();
	    if(isset($edata['logoimage']))	{
		 if($edata['logoimage'] != ""){
		        $filerow = $request->file('logoimage');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('sitefiles',$filename."_"."logo".$last_insert_id.".".$extension);
		  $filename_extension = 'sitefiles/'.$filename."_"."logo".$last_insert_id.".".$extension;
		  $req_array =  array("logoimage"=> $filename_extension);
		  $report = Site::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("logoimage"=> "");
		   $report = Site::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		
		
			$filename = uniqid();
	    if(isset($edata['heat_image']))	{
		 if($edata['heat_image'] != ""){
		        $filerow = $request->file('heat_image');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('sitefiles',$filename."_"."heat".$last_insert_id.".".$extension);
		  $filename_extension = 'sitefiles/'.$filename."_"."heat".$last_insert_id.".".$extension;
		  $req_array =  array("heat_image"=> $filename_extension);
		  $report = Site::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("heat_image"=> "");
		   $report = Site::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		
			$filename = uniqid();
	    if(isset($edata['smoke_image']))	{
		 if($edata['smoke_image'] != ""){
		        $filerow = $request->file('smoke_image');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('sitefiles',$filename."_"."heat".$last_insert_id.".".$extension);
		  $filename_extension = 'sitefiles/'.$filename."_"."heat".$last_insert_id.".".$extension;
		  $req_array =  array("smoke_image"=> $filename_extension);
		  $report = Site::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("smoke_image"=> "");
		   $report = Site::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
	
		
		
		 if(isset($edata['transcapacity'])) {
		 if(count($edata['transcapacity'] > 0)){
		 if(isset($edata['transfilename'])) {
		 	   foreach($request->file('transfilename') as $ckey => $consuption){
			   
			   $filename = uniqid();
			   		if($consuption){ 
					  $diconsumptn = array("site"=>$last_insert_id,"capacity"=>$edata['transcapacity'][$ckey],"filename"=>'','make'=>$edata['transmake'][$ckey],'location'=>$edata['translocation'][$ckey]);   
					  $insertcon = Sitetransformer::create($diconsumptn); 
					  $Transid = $insertcon->id;
					  if(isset($edata['transfilename'][$ckey])) {
						$extension = $consuption->getClientOriginalExtension();
						$file = $consuption->move('sitetransformers',$filename."_"."trans".$Transid.".".$extension);
						$filename_extension = 'sitetransformers/'.$filename."_"."trans".$Transid.".".$extension;
						$req_array =  array("filename"=> $filename_extension);
						$report = Sitetransformer::findOrFail($Transid);
						$report->update($req_array);
						}
					} 
			   }
			   }
		 } 
		 }  
		 
		 
		
		 
		  if(isset($edata['dgcapacity'])) {
		 if(count($edata['dgcapacity'] > 0)){
		 if(isset($edata['dgfilename'])) {
		 	   foreach($request->file('dgfilename') as $ckey => $consuption){
			   $filename = uniqid();
			   		if($consuption){ 
					  $diconsumptn = array("site"=>$last_insert_id,"capacity"=>$edata['dgcapacity'][$ckey],"filename"=>'','make'=>$edata['dgmake'][$ckey],'location'=>$edata['dglocation'][$ckey]);   
					  $insertcon = Sitedgset::create($diconsumptn); 
					  $Transid = $insertcon->id;
					  if(isset($edata['dgfilename'][$ckey])) {
						$extension = $consuption->getClientOriginalExtension();
						$file = $consuption->move('sitedgsets',$filename."_"."dgsets".$Transid.".".$extension);
						$filename_extension = 'sitedgsets/'.$filename."_"."dgsets".$Transid.".".$extension;
						$req_array =  array("filename"=> $filename_extension);
						$report = Sitedgset::findOrFail($Transid);
						$report->update($req_array);
						}
					} 
			   }
			   }
		 } 
		 } 
		 
		 
		 //LIFT
		 
		 
		 
		  
		 	 
		$diconsumptn = array();
		 if(isset($edata['lifts'])) {
		 if(count($edata['lifts'] > 0)){
		 	   foreach($edata['lift_num'] as $ckey => $consuption){
			   		if($consuption){ 
					  $diconsumptn = array("site"=>$last_insert_id,"lift_num"=>$consuption,"make"=>$edata['make'][$ckey],"type"=>$edata['type'][$ckey]);   
					  $insertcon = Sitelift::create($diconsumptn);  
					} 
			   }
		 } 
		 }    
		 
		 
		 
		 
		 // END LIFTS
		 
		  // BOOM BARRIER
		    
			
		$diconsumptn = array();
		 if(isset($edata['bmbrlocation'])) {
		 if(count($edata['bmbrlocation'] > 0)){
		 	   foreach($edata['bmbrlocation'] as $ckey => $consuption){
			   		if($consuption){ 
					  $diconsumptn = array("site"=>$last_insert_id,"location"=>$consuption,"make"=>$edata['bmbrmake'][$ckey],"length"=>$edata['bmbrlength'][$ckey]);   
					  $insertcon = Siteboombarrier::create($diconsumptn);  
					} 
			   }
		 } 
		 }      
		 // END BOOM BARRIER
		 
		
		 
		 // FLATS
		 
		  if(isset($edata['num_of_flats'])) {
		 if((int)($edata['num_of_flats'] > 0)){
	
					  $diconsumptn = array("site"=>$last_insert_id,"onebhk"=>$edata['onebhk'],"twobhk"=>$edata['twobhk'],"threebhk"=>$edata['threebhk'],"fourbhk"=>$edata['fourbhk'],"fivebhk"=>$edata['fivebhk']);    
					  $insertcon = Siteflat::create($diconsumptn); 
						
		 } 
		 } 
		 
		 // END FLATS
		 
		  
		 
		 // FIRE PUMP ROOMS
		 
		 	$diconsumptn = array();
		 if(isset($edata['pmplocation'])) {
		 if(count($edata['pmplocation'] > 0)){
		 	   foreach($edata['pmplocation'] as $ckey => $consuption){
			   		if($consuption){ 
					  $diconsumptn = array("site"=>$last_insert_id,"location"=>$consuption,"jockey"=>$edata['jockey'][$ckey],"main"=>$edata['main'][$ckey],"dg"=>$edata['dg'][$ckey],"booster"=>$edata['booster'][$ckey]);   
					  $insertcon = Sitefirepumproom::create($diconsumptn);  
					} 
			   }
		 } 
		 }    
		  
		 //pumprooms
		 
		
		 
		  if(isset($edata['stpcapacity'])) {
		 if(count($edata['stpcapacity'] > 0)){
		 if(isset($edata['stpfilename'])) {
		 	   foreach($request->file('stpfilename') as $ckey => $consuption){
			   
			 
			   $filename = uniqid();
			   		if($consuption){ 
					  $diconsumptn = array("site"=>$last_insert_id,"capacity"=>$edata['stpcapacity'][$ckey],"filename"=>'','make'=>$edata['stpmake'][$ckey],'technology'=>$edata['stptechnology'][$ckey],'type'=>$edata['stpphase'][$ckey]);   
					  $insertcon = Sitestp::create($diconsumptn); 
					  $Transid = $insertcon->id;
					  if(isset($edata['stpfilename'][$ckey])) {
						$extension = $consuption->getClientOriginalExtension();
						$file = $consuption->move('stps',$filename."_"."stp".$Transid.".".$extension);
						$filename_extension = 'stps/'.$filename."_"."stp".$Transid.".".$extension;
						$req_array =  array("filename"=> $filename_extension);
						$report = Sitestp::findOrFail($Transid);
						$report->update($req_array);
						}
					} 
			   }
			   }
		 } 
		 }    
		 
		 
		 // WSP
		 
		
		 
		   if(isset($edata['wspcapacity'])) {
		 if(count($edata['wspcapacity'] > 0)){
		 if($edata['wspcapacity']) {
		 	   foreach($edata['wspcapacity'] as $ckey => $consuption){
			   	 if($edata['ws_id'][$ckey] > 0) {
				  
				 $report = Sitewsp::findOrFail($edata['ws_id'][$ckey]);
				 
				 $diconsumptn = array("site"=>$last_insert_id,"capacity"=>$edata['wspcapacity'][$ckey],'make'=>$edata['wspmake'][$ckey],'type'=>$edata['wspphase'][$ckey]); 
				 $report->update($diconsumptn);
				  $filename = uniqid();
				     if(isset($edata['wspfilename'][$ckey])) {
					    $req = $edata['wspfilename'][$ckey];
					    $Transid = $edata['ws_id'][$ckey];
						$extension = $req->getClientOriginalExtension();
						$file = $req->move('wsps',$filename."_"."wsp".$Transid.".".$extension);
						$filename_extension = 'wsps/'.$filename."_"."wsp".$Transid.".".$extension;
						$req_array =  array("filename"=> $filename_extension);
						$report = Sitewsp::findOrFail($Transid);
						$report->update($req_array);
					}
				 
				 }else {
				 
				  $filename = uniqid();
					  $diconsumptn = array("site"=>$last_insert_id,"capacity"=>$edata['wspcapacity'][$ckey],"filename"=>'','make'=>$edata['wspmake'][$ckey],'type'=>$edata['wspphase'][$ckey]);   
					  $insertcon = Sitewsp::create($diconsumptn); 
					  $Transid = $insertcon->id;
					  if(isset($edata['wspfilename'][$ckey])) {
					   $req = $edata['wspfilename'][$ckey];
						$extension = $req->getClientOriginalExtension();
						$file = $req->move('wsps',$filename."_"."wsp".$Transid.".".$extension);
						$filename_extension = 'wsps/'.$filename."_"."wsp".$Transid.".".$extension;
						$req_array =  array("filename"=> $filename_extension);
						$report = Sitewsp::findOrFail($Transid);
						$report->update($req_array);
						} 
				     }
				 }
			    } 
			   }
		 }  
		 
		 
		  // FLOW ANNOUNCIATOR
		 
		 if(isset($edata['flowanlocation'])) {
		 if(count($edata['flowanlocation'] > 0)){
		 if(isset($edata['flowanfilename'])) {
		   
		 
		 	   foreach($request->file('flowanfilename') as $ckey => $consuption){
			   
			  
			   $filename = uniqid();
			   		if($consuption){ 
					  $diconsumptn = array("site"=>$last_insert_id,"location"=>$edata['flowanlocation'][$ckey],"filename"=>'','make'=>$edata['flowanmake'][$ckey],'flowzone'=>$edata['flowanzone'][$ckey]);   
					  $insertcon = Siteflowann::create($diconsumptn); 
					  $Transid = $insertcon->id;
					  if(isset($edata['flowanfilename'][$ckey])) {
						$extension = $consuption->getClientOriginalExtension();
						$file = $consuption->move('flowann',$filename."_"."flowann".$Transid.".".$extension);
						$filename_extension = 'flowann/'.$filename."_"."flowann".$Transid.".".$extension;
						$req_array =  array("filename"=> $filename_extension);
						$report = Siteflowann::findOrFail($Transid);
						$report->update($req_array);
						}
					} 
			   }
			   } 
		 } 
		 }   
		 
		 
		   // SOLAR 
		  if(isset($edata['solarcapacity'])) {
		 if(count($edata['solarcapacity'] > 0)){
		 if($edata['solarcapacity']) {
		 	   foreach($edata['solarcapacity'] as $ckey => $consuption){
			   	 if($edata['solid'][$ckey] > 0) {
				  
				 $report = Sitesolar::findOrFail($edata['solid'][$ckey]);
				 
				 $diconsumptn = array("site"=>$last_insert_id,"capacity"=>$edata['solarcapacity'][$ckey],'make'=>$edata['solarmake'][$ckey],'location'=>$edata['solarlocation'][$ckey]); 
				 $report->update($diconsumptn);
				  $filename = uniqid();
				     if(isset($edata['solarfilename'][$ckey])) {
					    $req = $edata['solarfilename'][$ckey];
					    $Transid = $edata['solid'][$ckey];
						$extension = $req->getClientOriginalExtension();
						$file = $req->move('solar',$filename."_"."solar".$Transid.".".$extension);
						$filename_extension = 'solar/'.$filename."_"."solar".$Transid.".".$extension;
						$req_array =  array("filename"=> $filename_extension);
						$report = Sitesolar::findOrFail($Transid);
						$report->update($req_array);
					}
				 
				 }else {
				 
				  $filename = uniqid();
					  //$diconsumptn = array("site"=>$last_insert_id,"capacity"=>$edata['solarcapacity'][$ckey],"filename"=>'','make'=>$edata['solarmake'][$ckey]);   
					   $diconsumptn = array("site"=>$last_insert_id,"capacity"=>$edata['solarcapacity'][$ckey],"filename"=>'','make'=>$edata['solarmake'][$ckey],'location'=>$edata['solarlocation'][$ckey]); 
					  $insertcon = Sitesolar::create($diconsumptn); 
					  $Transid = $insertcon->id;
					  if(isset($edata['solarfilename'][$ckey])) {
					   $req = $edata['solarfilename'][$ckey];
						$extension = $req->getClientOriginalExtension();
						$file = $req->move('solar',$filename."_"."solar".$Transid.".".$extension);
						$filename_extension = 'solar/'.$filename."_"."solar".$Transid.".".$extension;
						$req_array =  array("filename"=> $filename_extension);
						$report = Sitesolar::findOrFail($Transid);
						$report->update($req_array);
						} 
				     }
				 }
			    } 
			   }
		 }  
		 
		 
		 
		 
		 
		 
		  // SOLAR POWER 
		  if(isset($edata['solarpwrcapacity'])) {
		 if(count($edata['solarpwrcapacity'] > 0)){
		 if($edata['solarpwrcapacity']) {
		 	   foreach($edata['solarpwrcapacity'] as $ckey => $consuption){
			   	 if($edata['spid'][$ckey] > 0) {
				  
				 $report = Sitepwrsolar::findOrFail($edata['spid'][$ckey]);
				 
				 $diconsumptn = array("site"=>$last_insert_id,"capacity"=>$edata['solarpwrcapacity'][$ckey],'make'=>$edata['solarpwrmake'][$ckey]); 
				 $report->update($diconsumptn);
				  $filename = uniqid();
				     if(isset($edata['solarpwrfilename'][$ckey])) {
					    $req = $edata['solarpwrfilename'][$ckey];
					    $Transid = $edata['spid'][$ckey];
						$extension = $req->getClientOriginalExtension();
						$file = $req->move('solarpwr',$filename."_"."solarpwr".$Transid.".".$extension);
						$filename_extension = 'solarpwr/'.$filename."_"."solarpwr".$Transid.".".$extension;
						$req_array =  array("filename"=> $filename_extension);
						$report = Sitepwrsolar::findOrFail($Transid);
						$report->update($req_array);
					}
				 
				 }else {
				 
				  $filename = uniqid(); 
					    $diconsumptn = array("site"=>$last_insert_id,"capacity"=>$edata['solarpwrcapacity'][$ckey],"filename"=>'','make'=>$edata['solarpwrmake'][$ckey],'location'=>$edata['solarpwrlocation'][$ckey]);    
					  $insertcon = Sitepwrsolar::create($diconsumptn); 
					  $Transid = $insertcon->id;
					  if(isset($edata['solarpwrfilename'][$ckey])) {
					   $req = $edata['solarpwrfilename'][$ckey];
						$extension = $req->getClientOriginalExtension();
						$file = $req->move('solarpwr',$filename."_"."solarpwr".$Transid.".".$extension);
						$filename_extension = 'solarpwr/'.$filename."_"."solarpwr".$Transid.".".$extension;
						$req_array =  array("filename"=> $filename_extension);
						$report = Sitepwrsolar::findOrFail($Transid);
						$report->update($req_array);
						} 
				     }
				 }
			    } 
			   }
		 }  
		 
		 
		 // PUBLIC ADDRESSING SYSTEM NEW
		 
		  // SOLAR POWER 
		  
		  
		
		  
		 if(isset($edata['pbalocation'])) {
		 if(count($edata['pbalocation'] > 0)){
		 if($edata['pbalocation']) {
		 	   foreach($edata['pbalocation'] as $ckey => $consuption){
			   	 if($edata['pbaid'][$ckey] > 0) {
				  
				 $report = Sitepba::findOrFail($edata['spid'][$ckey]);
				 $diconsumptn = array("site"=>$last_insert_id,"location"=>$edata['pbalocation'][$ckey],'make'=>$edata['pbamake'][$ckey]); 
				 $report->update($diconsumptn);
				  $filename = uniqid();
				     if(isset($edata['pbafilename'][$ckey])) {
					    $req = $edata['pbafilename'][$ckey];
					    $Transid = $edata['pbaid'][$ckey];
						$extension = $req->getClientOriginalExtension();
						$file = $req->move('pba',$filename."_"."pba".$Transid.".".$extension);
						$filename_extension = 'pba/'.$filename."_"."pba".$Transid.".".$extension;
						$req_array =  array("filename"=> $filename_extension);
						$report = Sitepba::findOrFail($Transid);
						$report->update($req_array);
					}
				 
				 }else {
				 
				  $filename = uniqid(); 
						$diconsumptn = array("site"=>$last_insert_id,"location"=>$edata['pbalocation'][$ckey],"filename"=>'','make'=>$edata['pbamake'][$ckey]); 
					  $insertcon = Sitepba::create($diconsumptn); 
					  $Transid = $insertcon->id;
					  if(isset($edata['pbafilename'][$ckey])) {
					   $req = $edata['pbafilename'][$ckey];
						$extension = $req->getClientOriginalExtension();
						$file = $req->move('pba',$filename."_"."pba".$Transid.".".$extension);
						$filename_extension = 'pba/'.$filename."_"."pba".$Transid.".".$extension;
						$req_array =  array("filename"=> $filename_extension);
						$report = Sitepba::findOrFail($Transid);
						$report->update($req_array);
						} 
				     }
				 }
			    } 
			   }
		 } 
		 
		 
		 
		 	 // FIRE ALARAM
		 
		   if(isset($edata['faslocation'])) {
		 if(count($edata['faslocation'] > 0)){
		 if(isset($edata['fasfilename'])) {
		 	   foreach($request->file('fasfilename') as $ckey => $consuption){
			   
			 
			   $filename = uniqid();
			   		if($consuption){ 
					  $diconsumptn = array("site"=>$last_insert_id,"location"=>$edata['faslocation'][$ckey],"filename"=>'','make'=>$edata['fasmake'][$ckey]);   
					  $insertcon = Sitefirealar::create($diconsumptn); 
					  $Transid = $insertcon->id;
					  if(isset($edata['fasfilename'][$ckey])) {
						$extension = $consuption->getClientOriginalExtension();
						$file = $consuption->move('fas',$filename."_"."fas".$Transid.".".$extension);
						$filename_extension = 'fas/'.$filename."_"."fas".$Transid.".".$extension;
						$req_array =  array("filename"=> $filename_extension);
						$report = Sitefirealar::findOrFail($Transid);
						$report->update($req_array);
						}
					} 
			   }
			   }
		 } 
		 }   


     if(isset($edata['gacapacity'])) {
		 if(count($edata['gacapacity'] > 0)){
		  if(isset($edata['gafilename'])) { 
		 	   foreach($request->file('gafilename') as $ckey => $consuption){
			   
			 
			   $filename = uniqid();
			   		if($consuption){ 
					  $diconsumptn = array("site"=>$last_insert_id,"capacity"=>$edata['gacapacity'][$ckey],"filename"=>'',"make" => $edata['gamake'][$ckey],"location" => $edata['galocation'][$ckey],"name"=>$edata['gabankname'][$ckey]);   
					  $insertcon = Sitegasbank::create($diconsumptn); 
					  $Transid = $insertcon->id;
					  if(isset($edata['gafilename'][$ckey])) {
						$extension = $consuption->getClientOriginalExtension();
						$file = $consuption->move('gasbanks',$filename."_"."gasbanks".$Transid.".".$extension);
						$filename_extension = 'gasbanks/'.$filename."_"."gasbanks".$Transid.".".$extension;
						$req_array =  array("filename"=> $filename_extension);
						$report = Sitegasbank::findOrFail($Transid);
						$report->update($req_array);
						}
					} 
			   }
			   }
		 } 
		 }  		 
		 $diconsumptn = array();
		 if(isset($blocknames)) 
		 {
		 	 
			 if(count($blocknames > 0))
			 {
				   foreach($blocknames as $ckey => $consuption){
						if($consuption){ 
						  $diconsumptn = array("site"=>$last_insert_id,"blockname"=>$consuption,"name_change_socity"=>$edata1['name_change_socity'][$ckey],"ref_id"=>$last_insert_id);   
						  $insertcon = Blocknocreport::create($diconsumptn);  
						} 
				   }
			   } 
		 }  
		  
		 
		 // POST PAIDS
		 
		 $diconsumptn = array();
		 if(isset($edata['post_start_date'])) {
		 if(count($edata['post_start_date'] > 0)){
		 	   foreach($edata['post_start_date'] as $ckey => $consuption){
			   		if($consuption){ 
					  $diconsumptn = array("site"=>$last_insert_id,"post_start_date"=>$consuption,"post_end_date"=>$edata['post_end_date'][$ckey]);   
					  $insertcon = Siteppostpaid::create($diconsumptn);  
					} 
			   }
		 } 
		 }   
		 
		   $site_id = $last_insert_id;
		   
		   
		  // echo   $site_id;
		   //exit;
		
		return redirect()->route('sites.next',$site_id);	//return redirect()->route('sites.next',$site_id); 

       // return redirect()->route('sites.index');
		
		

    }





    /**

     * Display Client.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {
	
	
	 $sites = Site::findOrFail($id);
		$dgconsumparray = array();
		 $match_dg_fields =  ['ref_id' => $id, 'site' => $id];
		  
		  $dgconsumparray_cn = \App\Blocknocreport::where($match_dg_fields)->count();
         if($dgconsumparray_cn > 0){
		     $dgconsumparray = \App\Blocknocreport::where($match_dg_fields)->get();
		 }
		 
		 // TRANSFORMERS
		 
		 $match_trans_fields =  ['site' => $id];
		 $transformers = array();
		 $dgconsumparray_cn = \App\Sitetransformer::where($match_trans_fields)->count();
         if($dgconsumparray_cn > 0){
		     $transformers = \App\Sitetransformer::where($match_trans_fields)->get();
		 }
		 
		  // STP 
		 
		 $match_trans_fields =  ['site' => $id];
		 $stpval = array();
		 $dgconsumparray_cn = \App\Sitestp::where($match_trans_fields)->count();
         if($dgconsumparray_cn > 0){
		     $stpval = \App\Sitestp::where($match_trans_fields)->get();
		 }
		 
		   // WSP 
		 
		 $match_trans_fields =  ['site' => $id];
		 $wspval = array();
		 $dgconsumparray_cn = \App\Sitewsp::where($match_trans_fields)->count();
         if($dgconsumparray_cn > 0){
		     $wspval = \App\Sitewsp::where($match_trans_fields)->get();
		 }
		 
		 // GAS BANKS
		 
		  $match_trans_fields =  ['site' => $id];
		 $gasbanksval = array();
		 $dgconsumparray_cn = \App\Sitegasbank::where($match_trans_fields)->count();
         if($dgconsumparray_cn > 0){
		     $gasbanksval = \App\Sitegasbank::where($match_trans_fields)->get();
		 }
		 
		 // DGSETS 
		 
		 $match_trans_fields =  ['site' => $id];
		 $dgsetval = array();
		 $dgconsumparray_cn = \App\Sitedgset::where($match_trans_fields)->count();
         if($dgconsumparray_cn > 0){
		     $dgsetval = \App\Sitedgset::where($match_trans_fields)->get();
		 }
		 
		 // LIFTS
		  $match_trans_fields =  ['site' => $id];
		 $liftval = array();
		 $dgconsumparray_cn = \App\Sitelift::where($match_trans_fields)->count();
         if($dgconsumparray_cn > 0){
		     $liftval = \App\Sitelift::where($match_trans_fields)->get();
		 }
		 
		 //FLATS
		
		
		 $match_trans_fields =  ['site' => $id];
		 $flatval = array();
		 $dgconsumparray_cn = \App\Siteflat::where($match_trans_fields)->count();
         if($dgconsumparray_cn > 0){
		     $flatval = \App\Siteflat::where($match_trans_fields)->first();
		 }
		 
		 // POWER PUMPS
		 
		  $match_trans_fields =  ['site' => $id];
		 $pwrpumps = array();
		 $dgconsumparray_cn = \App\Sitefirepumproom::where($match_trans_fields)->count();
         if($dgconsumparray_cn > 0){
		     $pwrpumps = \App\Sitefirepumproom::where($match_trans_fields)->get();
		 }
		 
		 
		 // HYDRO PUMPS
		 
		/*  $match_trans_fields =  ['site' => $id];
		 $hydrosys = array();
		 $dgconsumparray_cn = \App\Sitehydron::where($match_trans_fields)->count();
         if($dgconsumparray_cn > 0){
		     $hydrosys = \App\Sitehydron::where($match_trans_fields)->get();
		 } */
		 
		 // POSTPAID
		 
		   $match_trans_fields =  ['site' => $id];
		 $postpaid = array();
		 $dgconsumparray_cn = \App\Siteppostpaid::where($match_trans_fields)->count();
         if($dgconsumparray_cn > 0){
		     $postpaid = \App\Siteppostpaid::where($match_trans_fields)->get();
		 }
		 
		 // PBA
		 
		   $match_trans_fields =  ['site' => $id];
		 $pbasys = array();
		 $dgconsumparray_cn = \App\Sitepba::where($match_trans_fields)->count();
         if($dgconsumparray_cn > 0){
		     $pbasys = \App\Sitepba::where($match_trans_fields)->get();
		 }
		 
		  
		 // FIRE ALARAM
		 
		   $match_trans_fields =  ['site' => $id];
		 $firealaram = array();
		 $dgconsumparray_cn = \App\Sitefirealar::where($match_trans_fields)->count();
         if($dgconsumparray_cn > 0){
		     $firealaram = \App\Sitefirealar::where($match_trans_fields)->get();
		 }
		 
		 
		  // Solar
		 
		   $match_trans_fields =  ['site' => $id];
		 $solarsys = array();
		 $dgconsumparray_cn = \App\Sitesolar::where($match_trans_fields)->count();
         if($dgconsumparray_cn > 0){
		     $solarsys = \App\Sitesolar::where($match_trans_fields)->get();
		 }
		 
		 
		   // SolarPwr
		 
		   $match_trans_fields =  ['site' => $id];
		 $solarpwrsys = array();
		 $dgconsumparray_cn = \App\Sitepwrsolar::where($match_trans_fields)->count();
         if($dgconsumparray_cn > 0){
		     $solarpwrsys = \App\Sitepwrsolar::where($match_trans_fields)->get();
		 }
		 
		 //FLOW ANNUATORS
		   $match_trans_fields =  ['site' => $id];
		 $siteflowann_res = array();
		 $siteflowann_cn = \App\Siteflowann::where($match_trans_fields)->count();
         if($siteflowann_cn > 0){
		     $siteflowann_res = \App\Siteflowann::where($match_trans_fields)->get();
		 }
		 
		 // SECURITY BOOM BARRIER
		 
		 $match_trans_fields =  ['site' => $id];
		 $boombarier_res = array();
		 $boombarier_cn = \App\Siteboombarrier::where($match_trans_fields)->count();
         if($boombarier_cn > 0){
		     $boombarier_res = \App\Siteboombarrier::where($match_trans_fields)->get();
		 }
		 
		 
		 // CLUB HOUSE DATA
		 
		   $matchfields = ['site' => $id];
		  $clubhouse = array();
		  $res_count = \App\Siteclubhouse::where($matchfields)->count();
		  if($res_count > 0){
		   $clubhouse = \App\Siteclubhouse::where($matchfields)->first();
		   }
	 
		 

       $relations = [

            'client_statuses' => \App\ClientStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			'sitedata' => $sites,
			'firenoc' => $dgconsumparray,
			'transformer' => $transformers,
			'stp' => $stpval,
			'wsp' => $wspval,
			'gasbank' => $gasbanksval,
			'dgsets' => $dgsetval,
			'powerpumps' => $pwrpumps,
			'lifts' => $liftval,
			'flats' => $flatval,
			'postpaid' =>  $postpaid,
			'pbasys' => $pbasys,
			'firealaram' => $firealaram,
			'solarsys' => $solarsys,
			'solarpwrsys' => $solarpwrsys,
			'clubhouse' => $clubhouse,
			'siteflowann' => $siteflowann_res,
			'boombarrier' => $boombarier_res,
			

        ];
		


        $site = Site::findOrFail($id);



        return view('sites.show', compact('site') + $relations);

    }



    /**

     * Remove Client from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    { 

        $site = Site::findOrFail($id);

        $site->delete();



        return redirect()->route('sites.index');

    }



    /**

     * Delete all selected Client at once.

     *

     * @param Request $request

     */

    public function massDestroy(Request $request)

    {

        if ($request->input('ids')) {

            $entries = Site::whereIn('id', $request->input('ids'))->get();



            foreach ($entries as $entry) {

                $entry->delete();

            }

        }

    }



}

