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

use App\Newsite;

use Illuminate\Http\Request;

use App\Http\Requests\StoreSitesRequest;

use App\Http\Requests\UpdateSitesRequest;

use App\Blocknocreport;

use DB;



class SitesbkpController extends Controller

{

 

    /** 

     * Display a listing of Client.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    { 

        $sites = Newsite::all();



        return view('sitesbkp.index', compact('sites'));

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



        return view('sitesbkp.create', $relations);

    }
	
	
	//ENABLE
	
	 public function enable(Request $request, $rep_id, $status)

    {  

        $task = Newsite::findOrFail($rep_id);
		
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

    public function store(Request $request)

    {

	    
        $edata = $request->all();	
		
		
		
		if(!isset($edata['helippad_file'])) { $edata['helippad_file'] = "";}
		if(!isset($edata['power_backup_file'])) { $edata['power_backup_file'] = "";}
		if(!isset($edata['solar_pwr_file'])) { $edata['solar_pwr_file'] = "";}
		if(!isset($edata['wsp_file'])) { $edata['wsp_file'] = "";}
		if(!isset($edata['hydro_pneumatic_sys_file'])) { $edata['hydro_pneumatic_sys_file'] = "";}
		if(!isset($edata['guide_file'])) { $edata['guide_file'] = "";} 
		

		// $sitedate = array("site"=>$last_insert_id,"blockname"=>$consuption,"name_change_socity"=>$edata['name_change_socity'][$ckey],"ref_id"=>$last_insert_id);
		
		/*echo "<pre>";
		  print_r($edata);
		echo "</pre>";
		exit; */
			
		$insert = Newsite::create($edata);
	
		$last_insert_id = $insert->id;
		$filename = uniqid();
	    if(isset($edata['helippad_file']))	{
		 if($edata['helippad_file'] != ""){
		        $filerow = $request->file('helippad_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('sitefiles',$filename."_"."helipad".$last_insert_id.".".$extension);
		  $filename_extension = 'sitefiles/'.$filename."_"."helipad".$last_insert_id.".".$extension;
		  $req_array =  array("helippad_file"=> $filename_extension);
		  $report = Newsite::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("helippad_file"=> "");
		   $report = Newsite::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		
		
		 if(isset($edata['power_backup_file']))	{
		 if($edata['power_backup_file'] != ""){
		        $filerow = $request->file('power_backup_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('sitefiles',$filename."_"."pwrbkp".$last_insert_id.".".$extension);
		  $filename_extension = 'sitefiles/'.$filename."_"."pwrbkp".$last_insert_id.".".$extension;
		  $req_array =  array("power_backup_file"=> $filename_extension);
		  $report = Newsite::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("power_backup_file"=> "");
		   $report = Newsite::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		
		 if(isset($edata['solar_pwr_file']))	{
		 if($edata['solar_pwr_file'] != ""){
		        $filerow = $request->file('solar_pwr_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('sitefiles',$filename."_"."solarpwr".$last_insert_id.".".$extension);
		  $filename_extension = 'sitefiles/'.$filename."_"."solarpwr".$last_insert_id.".".$extension;
		  $req_array =  array("solar_pwr_file"=> $filename_extension);
		  $report = Newsite::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("solar_pwr_file"=> "");
		   $report = Newsite::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		 if(isset($edata['wsp_file']))	{
		 if($edata['wsp_file'] != ""){
		        $filerow = $request->file('wsp_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('sitefiles',$filename."_"."wsp".$last_insert_id.".".$extension);
		  $filename_extension = 'sitefiles/'.$filename."_"."wsp".$last_insert_id.".".$extension;
		  $req_array =  array("wsp_file"=> $filename_extension);
		  $report = Newsite::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("wsp_file"=> "");
		   $report = Newsite::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		 if(isset($edata['hydro_pneumatic_sys_file']))	{
		 if($edata['hydro_pneumatic_sys_file'] != ""){
		        $filerow = $request->file('hydro_pneumatic_sys_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('sitefiles',$filename."_"."hydronuma".$last_insert_id.".".$extension);
		  $filename_extension = 'sitefiles/'.$filename."_"."hydronuma".$last_insert_id.".".$extension;
		  $req_array =  array("hydro_pneumatic_sys_file"=> $filename_extension);
		  $report = Newsite::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("hydro_pneumatic_sys_file"=> "");
		   $report = Newsite::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		
		
		 if(isset($edata['guide_file']))	{
		 if($edata['guide_file'] != ""){
		        $filerow = $request->file('guide_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('sitefiles',$filename."_"."guide".$last_insert_id.".".$extension);
		  $filename_extension = 'sitefiles/'.$filename."_"."guide".$last_insert_id.".".$extension;
		  $req_array =  array("guide_file"=> $filename_extension);
		  $report = Newsite::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("guide_file"=> "");
		   $report = Newsite::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		
		
		 if(isset($edata['transcapacity'])) {
		 if(count($edata['transcapacity'] > 0)){
		 if(isset($edata['transfilename'])) {
		 	   foreach($request->file('transfilename') as $ckey => $consuption){
			   
			 
			   $filename = uniqid();
			   		if($consuption){ 
					  $diconsumptn = array("site"=>$last_insert_id,"capacity"=>$edata['transcapacity'][$ckey],"filename"=>'');   
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
					  $diconsumptn = array("site"=>$last_insert_id,"capacity"=>$edata['dgcapacity'][$ckey],"filename"=>'');   
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
		 
		   if(isset($edata['lifts'])) {
		 if((int)($edata['lifts'] > 0)){
	
					  $diconsumptn = array("site"=>$last_insert_id,"passenger_lifts"=>$edata['passenger_lifts'],"service_lifts"=>$edata['service_lifts'],"mitsub_electric"=>$edata['mitsub_electric'],"jhonson"=>$edata['jhonson']);    
					  $insertcon = Sitelift::create($diconsumptn); 
						
		 } 
		 } 
		 
		 // END LIFTS
		 
		 // FLATS
		 
		  if(isset($edata['num_of_flats'])) {
		 if((int)($edata['num_of_flats'] > 0)){
	
					  $diconsumptn = array("site"=>$last_insert_id,"onebhk"=>$edata['onebhk'],"twobhk"=>$edata['twobhk'],"threebhk"=>$edata['threebhk'],"fourbhk"=>$edata['fourbhk'],"fivebhk"=>$edata['fivebhk']);    
					  $insertcon = Siteflat::create($diconsumptn); 
						
		 } 
		 } 
		 
		 // END FLATS
		 
		 
		 // PUMP ROOMS
		 
		  if(isset($edata['fire_pump_rooms'])) {
		 if((int)($edata['fire_pump_rooms'] > 0)){
		 	   
			   
			 
			   $filename = uniqid();
			   		
					  $diconsumptn = array("site"=>$last_insert_id,"jockey"=>$edata['jockey'],"jockeyfile"=>'',"main"=>$edata['main'],"mainfile"=>'',"dg"=>$edata['dg'],"dgfile"=>'',"booster"=>$edata['booster'],'boosterfile'=>'');   
					  $insertcon = Sitefirepumproom::create($diconsumptn); 
					  $Transid = $insertcon->id;
					  if(isset($edata['jockeyfile'])) {
					     $consuption = $request->file('jockeyfile');
						$extension = $consuption->getClientOriginalExtension();
						$file = $consuption->move('pumprooms',$filename."_"."pr_jockey".$Transid.".".$extension);
						$filename_extension = 'pumprooms/'.$filename."_"."pr_jockey".$Transid.".".$extension;
						$req_array =  array("jockeyfile"=> $filename_extension);
						$report = Sitefirepumproom::findOrFail($Transid);
						$report->update($req_array);
						}
						
						 if(isset($edata['mainfile'])) {
					     $consuption = $request->file('mainfile');
						$extension = $consuption->getClientOriginalExtension();
						$file = $consuption->move('pumprooms',$filename."_"."pr_main".$Transid.".".$extension);
						$filename_extension = 'pumprooms/'.$filename."_"."pr_main".$Transid.".".$extension;
						$req_array =  array("mainfile"=> $filename_extension);
						$report = Sitefirepumproom::findOrFail($Transid);
						$report->update($req_array);
						}
						
						 if(isset($edata['dgfile'])) {
					     $consuption = $request->file('dgfile');
						$extension = $consuption->getClientOriginalExtension();
						$file = $consuption->move('pumprooms',$filename."_"."pr_dg".$Transid.".".$extension);
						$filename_extension = 'pumprooms/'.$filename."_"."pr_dg".$Transid.".".$extension;
						$req_array =  array("dgfile"=> $filename_extension);
						$report = Sitefirepumproom::findOrFail($Transid);
						$report->update($req_array);
						}
						
							 if(isset($edata['boosterfile'])) {
					     $consuption = $request->file('boosterfile');
						$extension = $consuption->getClientOriginalExtension();
						$file = $consuption->move('pumprooms',$filename."_"."pr_booster".$Transid.".".$extension);
						$filename_extension = 'pumprooms/'.$filename."_"."pr_booster".$Transid.".".$extension;
						$req_array =  array("boosterfile"=> $filename_extension);
						$report = Sitefirepumproom::findOrFail($Transid);
						$report->update($req_array);
						}
						
						
					
			  
		 } 
		 } 
		 
		 // END PUMP ROOMS
		  
		  
		 //pumprooms
		 
		  if(isset($edata['stpcapacity'])) {
		 if(count($edata['stpcapacity'] > 0)){
		 if(isset($edata['stpfilename'])) {
		 	   foreach($request->file('stpfilename') as $ckey => $consuption){
			   
			 
			   $filename = uniqid();
			   		if($consuption){ 
					  $diconsumptn = array("site"=>$last_insert_id,"capacity"=>$edata['stpcapacity'][$ckey],"filename"=>'');   
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


     if(isset($edata['gacapacity'])) {
		 if(count($edata['gacapacity'] > 0)){
		  if(isset($edata['gafilename'])) { 
		 	   foreach($request->file('gafilename') as $ckey => $consuption){
			   
			 
			   $filename = uniqid();
			   		if($consuption){ 
					  $diconsumptn = array("site"=>$last_insert_id,"capacity"=>$edata['gacapacity'][$ckey],"filename"=>'');   
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
        return redirect()->route('sitesbkp.index');

    }



    /**

     * Show the form for editing Client.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {

        $sites = Newsite::findOrFail($id);
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
		     $liftval = \App\Sitelift::where($match_trans_fields)->first();
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
		     $pwrpumps = \App\Sitefirepumproom::where($match_trans_fields)->first();
		 }
		 

       $relations = [

            'client_statuses' => \App\ClientStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
			'sitedata' => $sites,
			'firenoc' => $dgconsumparray,
			'transformer' => $transformers,
			'stp' => $stpval,
			'gasbank' => $gasbanksval,
			'dgsets' => $dgsetval,
			'powerpumps' => $pwrpumps,
			'lifts' => $liftval,
			'flats' => $flatval,

        ];
		
	/*	echo "<pre>";
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

        exit;*/

        return view('sitesbkp.edit', compact('sites') + $relations);

    }



    /**

     * Update Client in storage.

     *

     * @param  \App\Http\Requests\UpdateClientsRequest  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function update(UpdateSitesRequest $request, $id)

    {

        $site = Newsite::findOrFail($id);

        $site->update($request->all());
		
		$edata = $request->all();
		
		$diconsumptn = array();
		 
		 
		  DB::table('blocknocreports')->where('site', '=', $id)->delete();
		  DB::table('sitefirepumprooms')->where('site', '=', $id)->delete();
		  DB::table('siteflats')->where('site', '=', $id)->delete();
		  DB::table('sitelifts')->where('site', '=', $id)->delete();
		 
		 
		  
		  
		  
			 
		 
		$last_insert_id = $id;
		$filename = uniqid();
	    if(isset($edata['helippad_file']))	{
		 if($edata['helippad_file'] != ""){
		        $filerow = $request->file('helippad_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('sitefiles',$filename."_"."helipad".$last_insert_id.".".$extension);
		  $filename_extension = 'sitefiles/'.$filename."_"."helipad".$last_insert_id.".".$extension;
		  $req_array =  array("helippad_file"=> $filename_extension);
		  $report = Newsite::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("helippad_file"=> "");
		   $report = Newsite::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		
		
		 if(isset($edata['power_backup_file']))	{
		 if($edata['power_backup_file'] != ""){
		        $filerow = $request->file('power_backup_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('sitefiles',$filename."_"."pwrbkp".$last_insert_id.".".$extension);
		  $filename_extension = 'sitefiles/'.$filename."_"."pwrbkp".$last_insert_id.".".$extension;
		  $req_array =  array("power_backup_file"=> $filename_extension);
		  $report = Newsite::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("power_backup_file"=> "");
		   $report = Newsite::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		
		 if(isset($edata['solar_pwr_file']))	{
		 if($edata['solar_pwr_file'] != ""){
		        $filerow = $request->file('solar_pwr_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('sitefiles',$filename."_"."solarpwr".$last_insert_id.".".$extension);
		  $filename_extension = 'sitefiles/'.$filename."_"."solarpwr".$last_insert_id.".".$extension;
		  $req_array =  array("solar_pwr_file"=> $filename_extension);
		  $report = Newsite::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("solar_pwr_file"=> "");
		   $report = Newsite::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		 if(isset($edata['wsp_file']))	{
		 if($edata['wsp_file'] != ""){
		        $filerow = $request->file('wsp_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('sitefiles',$filename."_"."wsp".$last_insert_id.".".$extension);
		  $filename_extension = 'sitefiles/'.$filename."_"."wsp".$last_insert_id.".".$extension;
		  $req_array =  array("wsp_file"=> $filename_extension);
		  $report = Newsite::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("wsp_file"=> "");
		   $report = Newsite::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		 if(isset($edata['hydro_pneumatic_sys_file']))	{
		 if($edata['hydro_pneumatic_sys_file'] != ""){
		        $filerow = $request->file('hydro_pneumatic_sys_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('sitefiles',$filename."_"."hydronuma".$last_insert_id.".".$extension);
		  $filename_extension = 'sitefiles/'.$filename."_"."hydronuma".$last_insert_id.".".$extension;
		  $req_array =  array("hydro_pneumatic_sys_file"=> $filename_extension);
		  $report = Newsite::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("hydro_pneumatic_sys_file"=> "");
		   $report = Newsite::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		
		
		 if(isset($edata['guide_file']))	{
		 if($edata['guide_file'] != ""){
		        $filerow = $request->file('guide_file');
				
		  $extension = $filerow->getClientOriginalExtension();
	 	  $file = $filerow->move('sitefiles',$filename."_"."guide".$last_insert_id.".".$extension);
		  $filename_extension = 'sitefiles/'.$filename."_"."guide".$last_insert_id.".".$extension;
		  $req_array =  array("guide_file"=> $filename_extension);
		  $report = Newsite::findOrFail($last_insert_id);
		  $report->update($req_array);
		  }
		   else {
		    $req_array =  array("guide_file"=> "");
		   $report = Newsite::findOrFail($last_insert_id);
		  $report->update($req_array);
		   }
		}
		
		
		
		 if(isset($edata['transcapacity'])) {
		 if(count($edata['transcapacity'] > 0)){
		 if(isset($edata['transfilename'])) {
		 
		    DB::table('sitetransformers')->where('site', '=', $id)->delete();
		 	   foreach($request->file('transfilename') as $ckey => $consuption){
			   
			 
			   $filename = uniqid();
			   		if($consuption){ 
					  $diconsumptn = array("site"=>$last_insert_id,"capacity"=>$edata['transcapacity'][$ckey],"filename"=>'');   
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
		  DB::table('sitedgsets')->where('site', '=', $id)->delete();
		 	   foreach($request->file('dgfilename') as $ckey => $consuption){
			   
			 
			   $filename = uniqid();
			   		if($consuption){ 
					  $diconsumptn = array("site"=>$last_insert_id,"capacity"=>$edata['dgcapacity'][$ckey],"filename"=>'');   
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
		 
		   if(isset($edata['lifts'])) {
		 if((int)($edata['lifts'] > 0)){
	
					  $diconsumptn = array("site"=>$last_insert_id,"passenger_lifts"=>$edata['passenger_lifts'],"service_lifts"=>$edata['service_lifts'],"mitsub_electric"=>$edata['mitsub_electric'],"jhonson"=>$edata['jhonson']);    
					  $insertcon = Sitelift::create($diconsumptn); 
						
		 } 
		 } 
		 
		 // END LIFTS
		 
		 // FLATS
		 
		  if(isset($edata['num_of_flats'])) {
		 if((int)($edata['num_of_flats'] > 0)){
	
					  $diconsumptn = array("site"=>$last_insert_id,"onebhk"=>$edata['onebhk'],"twobhk"=>$edata['twobhk'],"threebhk"=>$edata['threebhk'],"fourbhk"=>$edata['fourbhk'],"fivebhk"=>$edata['fivebhk']);    
					  $insertcon = Siteflat::create($diconsumptn); 
						
		 } 
		 } 
		 
		 // END FLATS
		 
		 
		 // PUMP ROOMS
		 
		  if(isset($edata['fire_pump_rooms'])) {
		 if((int)($edata['fire_pump_rooms'] > 0)){
		 	   
			   
			 
			   $filename = uniqid();
			   		
					  $diconsumptn = array("site"=>$last_insert_id,"jockey"=>$edata['jockey'],"jockeyfile"=>'',"main"=>$edata['main'],"mainfile"=>'',"dg"=>$edata['dg'],"dgfile"=>'',"booster"=>$edata['booster'],'boosterfile'=>'');   
					  $insertcon = Sitefirepumproom::create($diconsumptn); 
					  $Transid = $insertcon->id;
					  if(isset($edata['jockeyfile'])) {
					     $consuption = $request->file('jockeyfile');
						$extension = $consuption->getClientOriginalExtension();
						$file = $consuption->move('pumprooms',$filename."_"."pr_jockey".$Transid.".".$extension);
						$filename_extension = 'pumprooms/'.$filename."_"."pr_jockey".$Transid.".".$extension;
						$req_array =  array("jockeyfile"=> $filename_extension);
						$report = Sitefirepumproom::findOrFail($Transid);
						$report->update($req_array);
						}
						
						 if(isset($edata['mainfile'])) {
					     $consuption = $request->file('mainfile');
						$extension = $consuption->getClientOriginalExtension();
						$file = $consuption->move('pumprooms',$filename."_"."pr_main".$Transid.".".$extension);
						$filename_extension = 'pumprooms/'.$filename."_"."pr_main".$Transid.".".$extension;
						$req_array =  array("mainfile"=> $filename_extension);
						$report = Sitefirepumproom::findOrFail($Transid);
						$report->update($req_array);
						}
						
						 if(isset($edata['dgfile'])) {
					     $consuption = $request->file('dgfile');
						$extension = $consuption->getClientOriginalExtension();
						$file = $consuption->move('pumprooms',$filename."_"."pr_dg".$Transid.".".$extension);
						$filename_extension = 'pumprooms/'.$filename."_"."pr_dg".$Transid.".".$extension;
						$req_array =  array("dgfile"=> $filename_extension);
						$report = Sitefirepumproom::findOrFail($Transid);
						$report->update($req_array);
						}
						
							 if(isset($edata['boosterfile'])) {
					     $consuption = $request->file('boosterfile');
						$extension = $consuption->getClientOriginalExtension();
						$file = $consuption->move('pumprooms',$filename."_"."pr_booster".$Transid.".".$extension);
						$filename_extension = 'pumprooms/'.$filename."_"."pr_booster".$Transid.".".$extension;
						$req_array =  array("boosterfile"=> $filename_extension);
						$report = Sitefirepumproom::findOrFail($Transid);
						$report->update($req_array);
						}
						
						
					
			  
		 } 
		 } 
		 
		 // END PUMP ROOMS
		  
		  
		 //pumprooms
		 
		  if(isset($edata['stpcapacity'])) {
		 if(count($edata['stpcapacity'] > 0)){
		 if(isset($edata['stpfilename'])) {
		 
		  DB::table('sitestps')->where('site', '=', $id)->delete();
		 	   foreach($request->file('stpfilename') as $ckey => $consuption){
			   
			 
			   $filename = uniqid();
			   		if($consuption){ 
					  $diconsumptn = array("site"=>$last_insert_id,"capacity"=>$edata['stpcapacity'][$ckey],"filename"=>'');   
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


     if(isset($edata['gacapacity'])) {
		 if(count($edata['gacapacity'] > 0)){
		  if(isset($edata['gafilename'])) { 
		  
		  DB::table('sitegasbanks')->where('site', '=', $id)->delete();
		 	   foreach($request->file('gafilename') as $ckey => $consuption){
			   
			 
			   $filename = uniqid();
			   		if($consuption){ 
					  $diconsumptn = array("site"=>$last_insert_id,"capacity"=>$edata['gacapacity'][$ckey],"filename"=>'');   
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



        return redirect()->route('sitesbkp.index');

    }



    /**

     * Display Client.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {

        $relations = [

            'client_statuses' => \App\ClientStatus::get()->pluck('title', 'id')->prepend('Please select', ''),

        ];



        $site = Newsite::findOrFail($id);



        return view('sitesbkp.show', compact('site') + $relations);

    }



    /**

     * Remove Client from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    { 

        $site = Newsite::findOrFail($id);

        $site->delete();



        return redirect()->route('sitesbkp.index');

    }



    /**

     * Delete all selected Client at once.

     *

     * @param Request $request

     */

    public function massDestroy(Request $request)

    {

        if ($request->input('ids')) {

            $entries = Newsite::whereIn('id', $request->input('ids'))->get();



            foreach ($entries as $entry) {

                $entry->delete();

            }

        }

    }



}

