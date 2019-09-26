<?php



namespace App\Http\Controllers;



use App\Reportvalidation;

use App\Dailyreportvalidation;

use App\Firesafedailyreportvalidation;

use App\Pmsdailyreportvalidation;

use App\Securitydailyreportvalidation;

use App\Manpowervalidation;

use App\Manpowersvalidation;

use App\Horticuturedailyreportvalidation;


use App\AparnaAsset; 



use Request;

use DB;

use Auth;



use App\Blocknocreport;

use App\Blocknocmonthreport; 



use App\Http\Requests\StoreReportvalidationRequest;

use App\Http\Requests\UpdateCategoryRequest;



class ReportvalidationController extends Controller

{



    /**  

     * Display a listing of ClientStatus.  

     *

     * @return \Illuminate\Http\Response

     */ 

    public function index() 

    {

	   $matchThese = ['type' => 'fpm'];

	   

	   $segment1 = Request::segment(1);

	   $segment2 = Request::segment(2);

	   $segment3 = Request::segment(3);

	    $typecat = "";  

		 $sval = "";

		 $typeval = "";

		 $sitenames  = array();

		 $siteattrname = array();

		 $statusarray = array();

		 

         if(Auth::user()->id == 1){

	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');

		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');

		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');

		   $statusarray = array("0"=>'Please select',"1"=>'Fire Safety',"2"=>'FMS',"3"=>'PMS',"4"=>'Security',"5"=>'Man Power', "6"=> 'Horti Culture');

		  

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

			

			$statusarray['0'] = "Please select";

			if(getlogperms('valid_firesafety')) { $statusarray['1'] = 'Fire Safety';}

			if(getlogperms('valid_fms')) { $statusarray['2'] = 'FMS';}

			if(getlogperms('valid_pms')) { $statusarray['3'] = 'PMS';}

			if(getlogperms('valid_security')) { $statusarray['4'] = 'Security';}
			

			if(getlogperms('valid_manpower')) { $statusarray['5'] = 'Man Power';}
			
			
			if(getlogperms('valid_horti')) { $statusarray['6'] = 'Horti Culture';}

			

			

		  }



	   



// if you need another group of wheres as an alternative: 

        

		

		 $relations = [



           // 'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),

		   'client_statuses' => $statusarray,

			'sites_names' => $sitenames,

			'sites_attr_names' => $siteattrname,

			'fieldnames' => \App\Tool::where($matchThese)->get(),

			 'formfields' => "", 

			 'res' => "",

			 'typecat' => "",

			 'siteselected' => $sval,

			'typeselected' => $typeval,



        ]; 



		  return view('reportvalidation.index', $relations);



    } 

	

	public function addform()

    {

	   $matchThese = ['type' => 'fpm'];

	   

	   $segment1 = Request::segment(1);

	   $segment2 = Request::segment(2);

	   $segment3 = Request::segment(3); 

	   $segment4 = Request::segment(4); 

	   $segment5 = Request::segment(5); 

	   $typecat = ""; 
		
	 $data = array();
	 $updated = "";

	   $statusarray = array();
	   
	   $assetTypes = array();
	   $Allblocks = array();

	   $firenocdata_res = array();

	   if($segment2 > 0 && $segment3 > 0){

	    $typecat = $segment3;

	   }

	   $matchfields = array();

	   if($segment3 == 2){

	      $matchfields = ['type' => 'fpm', 'site' => $segment2]; 

	   }

	   if($segment3 == 1){

	      $matchfields = ['type' => 'firesafety', 'site' => $segment2]; 

	   }

	    if($segment3 == 3){

	      $matchfields = ['type' => 'pms', 'site' => $segment2]; 

	   }

	    if($segment3 == 4){

	      $matchfields = ['type' => 'security', 'site' => $segment2]; 

	   }

	   if($segment3 == 5){

	      $matchfields = ['type' => '5', 'site' => $segment2]; 

	   }
	   
	   if($segment3 == 6){

	      $matchfields = ['type' => 'horti', 'site' => $segment2]; 

	   }

	   

	   //  $formfieldarray = \App\Reportvalidation::where($matchfields)->get();

	   

	    $formfieldarray = "";

	     if($segment3 == 2){

	     $formfieldarray = \App\Dailyreportvalidation::where($matchfields)->first();

		 }

		  if($segment3 == 1){

		 	

	     $formfieldarray = \App\Firesafedailyreportvalidation::where($matchfields)->first();

		  /*$matchnocdata = ['site' => $segment2];

		  $firenocdata_cn =  \App\Blocknocreport::where($matchnocdata)->count();

		  if($firenocdata_cn > 0){

		  	 $firenocdata_res = \App\Blocknocreport::where($matchnocdata)->get();

			 $firenocdata_res2 = \App\Blocknocreport::where($matchnocdata)->get();

			 

			 $getrecentval = array();

			 foreach($firenocdata_res as $resval){

			     //$matchfields = ['site' => $segment2,'ref_id' => $resval->id,'valid_month'=>$segment5,'valid_year'=>$segment4]; 

				  $matchfields = ['site' => $segment2, 'valid_month'=>$segment5,'valid_year'=>$segment4]; 

				// echo '<pre>'; print_r($matchfields); echo '</pre>';

				 //$matchfields = ['site' => $segment2,'valid_month'=> 3,'valid_year'=>$segment4]; 

				 $firenocdata_month_res = \App\Blocknocmonthreport::where($matchfields)->orderBy('id', 'desc')->first();

				 $firenocdata_month_res2 = \App\Blocknocmonthreport::where($matchfields)->orderBy('id', 'desc')->first();

				 //echo '<pre>'; print_r($firenocdata_month_res); echo '</pre>';

				 if($firenocdata_month_res)

				 {

					   $resval['mnrecord_id'] = $firenocdata_month_res['id']; 

					   $resval['valid_upto'] =  $firenocdata_month_res['valid_upto']; 

				 }   

				 else

				 {

					   $resval['mnrecord_id'] = ""; 

					   $matchfields_f = ['ref_id' => $resval->id]; 

					   $matchfields_f = ['ref_id' => $resval->id,'site' => $segment2,'valid_month'=> $segment5]; 

					   $firenocdata_month_res_emp = \App\Blocknocmonthreport::where($matchfields_f)->orderBy('valid_month', 'desc')->first();

					   $firenocdata_month_res_emp = \App\Blocknocmonthreport::where($matchfields_f)->first();

					   $resval['valid_upto'] =  $firenocdata_month_res_emp['valid_upto']; 

				 }

			 } 

			

			 

		 } */

		    

		 

		 

		 } 

		 

		 if($segment3 == 3){

		 	
		
	     $formfieldarray = \App\Pmsdailyreportvalidation::where($matchfields)->first();
		 
		 $smatchfields = ['site_id' => $segment2, 'category_id'=>23]; 
		 
		  $assets = \App\AparnaAsset::select("aparna_assets.code",'aparna_assets.id')->where($smatchfields)->orderBy('aparna_assets.code','asc')->get();
		
		  if(count($assets)>0)
		  {
		  	foreach($assets as $akey=>$avalue)
			{
				$assetTypes[$avalue->id] = $avalue->code;
			}
		  }
		 }

		 if($segment3 == 6){

		 	

	     $formfieldarray = \App\Horticuturedailyreportvalidation::where($matchfields)->first();
		 
		 }
		 if($segment3 == 4)
		 {
	     	$formfieldarray = \App\Securitydailyreportvalidation::where($matchfields)->first();

		 }

		 

		 if($segment3 == 5){
		
				   $segment1 = Request::segment(1);
			
				   $segment2 = Request::segment(2);
			
				   $segment3 = Request::segment(3); 
			
				   $segment4 = Request::segment(4); 
			
				   $segment5 = Request::segment(5); 
				   
				   $matchfields = ['site' => $segment2,'month'=>$segment5,'year'=>$segment4]; 
				   
				   $mmr_sres_cn = \App\Manpowersvalidation::where($matchfields)->count();
				   if($mmr_sres_cn>0)
				   {
						$mmr_sres_res = \App\Manpowersvalidation::where($matchfields)->orderBy('sorder', 'asc')->get();
						$updated = 'Yes';
				   }
				   else
				   {
						$mmr_sres_res = \App\Manpowersvalidation::where('site','=',$segment2)->orderBy('id', 'desc')->first();
						if($mmr_sres_res)
						{
							$year = $mmr_sres_res['year'];
							$month = $mmr_sres_res['month'];
							$matchfields = ['site' => $segment2,'month'=>$month,'year'=>$year]; 
							$mmr_sres_cn = \App\Manpowersvalidation::where($matchfields)->count();
							if($mmr_sres_cn>0)
							{
								$mmr_sres_res = \App\Manpowersvalidation::where($matchfields)->orderBy('sorder', 'asc')->get();
								$updated = 'no';
							}
						}
						else
						{
							$matchfields = ['site' => 0]; 
							$mmr_sres_res = \App\Manpowersvalidation::where($matchfields)->orderBy('sorder', 'asc')->get();
							$updated = 'no';
						}
				   }
				   
				   if(count($mmr_sres_res)>0)
				   {
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
							$data[$mkey]['sorder'] = $mres->sorder;
						}
				   }
				   
				  // echo "<pre>"; print_r($data); echo "</pre>";

		 }

		// $formfieldarray = \App\Dailyreportvalidation::where($matchfields)->first();

		 

	  

		// echo $formfieldarray->ctptmin;  

		

		  $resfrom = array();

		  $siteattrname = array();

		  

		/* foreach( $formfieldarray  as $fromarra){

		   // $resfrom[$fromarra->field_name] = array("max"=>$fromarra->maxvalue,"min"=>$fromarra->minvalue,"id"=>$fromarra->id);

			// echo "<pre>"; print_r($fromarra);   echo "</pre>";

		  //	echo $fromarra->ctptmin;

			

		 }  */

		 

		// exit;

		 $sval = $segment2;

		 $typeval = $segment3;

		 

// if you need another group of wheres as an alternative: 

		/* $relations = [



            'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),

			'sites_names' => \App\Sites::get()->pluck('name', 'id')->prepend('Please select', ''),

			'sites_attr_names' => \App\Sites::get()->pluck('name', 'id'),

			'fieldnames' => \App\Tool::where($matchThese)->get(),

			'formfields' => \App\Reportvalidation::where($matchfields)->get(), 

            'res' => $formfieldarray,

			'typecat' => $typecat,

			'siteselected' => $sval,

			'typeselected' => $typeval,

			

			

        ];  */

		$sitenames = array();

		  if(Auth::user()->id == 1){

	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');

		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');

		  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');

		  $statusarray = array("0"=>'Please select',"1"=>'Fire Safety',"2"=>'FMS',"3"=>'PMS',"4"=>'Security',"5"=>'Man Power', "6"=> 'Horti Culture');

		  

		  

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

			

			$statusarray['0'] = "Please select";

			if(getlogperms('valid_firesafety')) { $statusarray['1'] = 'Fire Safety';}

			if(getlogperms('valid_fms')) { $statusarray['2'] = 'FMS';}

			if(getlogperms('valid_pms')) { $statusarray['3'] = 'PMS';}

			if(getlogperms('valid_security')) { $statusarray['4'] = 'Security';}

			if(getlogperms('valid_manpower')) { $statusarray['5'] = 'Man Power';}
			
			if(getlogperms('valid_horti')) { $statusarray['6'] = 'Horti Culture';}

			

		  } 

		 if($firenocdata_res) $firenocdata_res = $firenocdata_res2;

		 else $firenocdata_res = $firenocdata_res;
		 
		 $smatchfields = ['coomunity_id' => Request::segment(2)]; 
		 
		  //$locations = \App\Horticulture::select("horticultures.*","blocks.block_name")->leftJoin('blocks', 'blocks.id', '=', 'horticultures.block_id')->where($smatchfields)->orderBy('blocks.block_name','asc')->get();
		  
		 
		  
		 // $blocks = \App\Block::select("blocks.*","blocks.block_name")->where($smatchfields)->orderBy('blocks.block_name','asc')->get();
		  $blocks = \App\Block::where($smatchfields)->get();
		
		  if(count($blocks)>0)
		  {
		  	foreach($blocks as $bkey=>$bvalue)
			{
				$Allblocks[$bvalue['id']] = $bvalue['block_name'];
			}
		  }

		  //echo "<pre>"; print_r($Allblocks); echo "</pre>";
		
		 $relations = [



            //'client_statuses' => \App\DailyreportStatus::get()->pluck('title', 'id')->prepend('Please select', ''),
					
			'site' => $segment2,
			
			'year' => $segment4,
			
			'month' => $segment5,

			'client_statuses' => $statusarray,

			'sites_names' => $sitenames,

			'sites_attr_names' => $siteattrname,

            'res' => $formfieldarray,

			'firenocres' =>  $firenocdata_res,

			'typecat' => $typecat,
			
			'assetTypes' => $assetTypes,
			
			'Allblocks' => $Allblocks,

			'siteselected' => $sval, 

			'typeselected' => $typeval,
			
			'manpowers' => $data,
			
			'updated' => $updated

        ]; 

		return view('reportvalidation.index', $relations);
    } 
	
	public function getlocations(StoreReportvalidationRequest $request)
	{
		$edata = $request->all();
		$blockId = $edata['block_id'];
		$blockLocations = array();
		$smatchfields = ['horticultures.block_id' => $blockId]; 
		$locations = \App\Horticulture::select("horticultures.*","blocks.block_name")->leftJoin('blocks', 'blocks.id', '=', 'horticultures.block_id')->where($smatchfields)->orderBy('blocks.block_name','asc')->get();
		$blockLocations = array(''=>'Please select');
		if(count($locations)>0)
		{
			foreach($locations as $key=>$loc)
			{
				$blockLocations[$loc->id] = $loc->sub_location." - ".$loc->plant_name;
			}
		}
		return view('validationtemplates.getlocations', compact('blockLocations')); 
	}

	public function summaryform()
	{
		
	   $segment1 = Request::segment(1);

	   $segment2 = Request::segment(2);

	   $segment3 = Request::segment(3); 

	   $segment4 = Request::segment(4); 

	   $segment5 = Request::segment(5); 
	   
	   $siteares = \App\Sites::where('id', $segment2)->first();	   
	   $siteattrname = $siteares['name'];
	   
	   $matchfields = ['site' => $segment2,'month'=>$segment4,'year'=>$segment5]; 
	   
	   $mmr_sres_cn = \App\Manpowersvalidation::where($matchfields)->count();
	   if($mmr_sres_cn>0)
	   {
	   		$mmr_sres_res = \App\Manpowersvalidation::where($matchfields)->orderBy('sorder', 'asc')->get();
			$updated = 'Yes';
	   }
	   else
	   {
			$mmr_sres_res = \App\Manpowersvalidation::where('site','=',$segment2)->where('month','<',$segment4)->where('year','<=',$segment4)->orderBy('id', 'desc')->first();
			if($mmr_sres_res)
			{
				$year = $mmr_sres_res['year'];
				$month = $mmr_sres_res['month'];
				$matchfields = ['site' => $segment2,'month'=>$month,'year'=>$year]; 
				$mmr_sres_cn = \App\Manpowersvalidation::where($matchfields)->count();
				if($mmr_sres_cn>0)
				{
					$mmr_sres_res = \App\Manpowersvalidation::where($matchfields)->orderBy('id', 'asc')->get();
					$updated = 'no';
				}
			}
			else
			{
				$matchfields = ['site' => "",'month'=>"",'year'=>""]; 
				$mmr_sres_res = \App\Manpowersvalidation::where($matchfields)->orderBy('id', 'asc')->get();
				$updated = 'no';
			}
	   }
	   
	   if(count($mmr_sres_res)>0)
	   {
	   		foreach($mmr_sres_res as $mkey=>$mres)
			{
				$data[$mkey]['ids'] = $mres->id; 
				$data[$mkey]['title'] = $mres->title; 
				$data[$mkey]['type'] = $mres->type;
				$data[$mkey]['general'] = $mres->general;
				$data[$mkey]['a'] = $mres->a;
				$data[$mkey]['b'] = $mres->b;
				$data[$mkey]['c'] = $mres->c;
				$data[$mkey]['mnos'] = $mres->mnos;
				$data[$mkey]['sorder'] = $mres->sorder;
			}
	   }
	   
	  
	   
	   
	   $relations = [
		
			'site' => $segment2,
			
			'sitename' => $segment2,
			
			'year' => $segment4,
			
			'month' => $segment5,
			
			'manpowers' => $data,
			
			'updated' => $updated
	    ];

	   return view('reportvalidation.summary', $relations);
	}
	
	
	public function deleteexcess(StoreReportvalidationRequest $request)
	{
		$edata = $request->all();
		$site = $edata['site'];
		$year = $edata['year'];
		$month = $edata['month'];
		$matchmonthf = ['id' => $edata['excessId']];
		DB::table('manpowersvalidations')->where($matchmonthf)->delete();
		return redirect('/reportdetailfrom/'.$site.'/5/'.$year.'/'.$month);
	}

	public function summaryform_old04242019()

	{

	   $segment1 = Request::segment(1);

	   $segment2 = Request::segment(2);

	   $segment3 = Request::segment(3); 

	   $segment4 = Request::segment(4); 

	   $segment5 = Request::segment(5); 

	   $typecat = ""; 
	   
	   $mrid = "";

	   $statusarray = array();

	   $firenocdata_res = array();

	   if($segment2 > 0 && $segment3 > 0){

	    $typecat = $segment3;

	   }

	   $matchfields = array();

	   if($segment3 == 5){

	      $matchfields = ['type' => 5, 'site' => $segment2]; 

	   }

	   $sresar = array();

	   $sflabels = array();

	   $fresar = array();

	   $fflabels = array();

	   $cresar = array();

	   $cflabels = array();

	   $type=0;
	   
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
			   
			   
			   if($mmr_sres_cn>0)
			   {			   
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
		
		$relations = [
		
			'site' => $segment2,
			
			'year' => $segment4,
			
			'month' => $segment5,
		
			'mrid' => $mrid,
			
			'msres' => $mmr_sres,
			
			'site' =>$segment2,

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

		 return view('reportvalidation.summary', $relations);

	}
	
	
	

	

 

    /**

     * Show the form for creating new ClientStatus.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        return view('category.create');

    }



    /**

     * Store a newly created ClientStatus in storage.

     *

     * @param  \App\Http\Requests\StoreClientStatusesRequest  $request

     * @return \Illuminate\Http\Response

     */
	 
	 
 	 public function storesummary(StoreReportvalidationRequest $request)
	 {
	 	  $edata = $request->all();
		  foreach($edata['title'] as $key=>$val)
		  {
		  		$title = $val;
				$type = $edata['type'][$key];
				$mnos = $edata['mnos'][$key];
				if($edata['general'][$key]!="") $general = $edata['general'][$key]; else $general = "";
				if($edata['a'][$key]!="") $a = $edata['a'][$key]; else $a = "";
				if($edata['b'][$key]!="") $b = $edata['b'][$key]; else $b = "";
				if($edata['c'][$key]!="") $c = $edata['c'][$key]; else $c = "";
				$order = $edata['order'][$key];				
				$savearr = array('site'=>$edata['site'], 'title' => $title, 'type' =>$type, 'mnos' =>$mnos, 'general' =>$general, 'a' =>$a, 'b' =>$b, 'c' =>$c, 'order' =>$order);
				$insertcon = Manpowersvalidation::create($savearr); 
		  }
		  if($edata['record'] > 0)
		  {

			$category = Manpowersvalidation::find($edata['record']);

			$category->update($edata);

		}else{
		 
		  $insertcon = Manpowersvalidation::create($edata);  

		}
		 
	 }

	public function excessmanpower(StoreReportvalidationRequest $request)
	{
		$edata = $request->all();
		foreach($edata['title'] as $key=>$val)
		 {
			$title = $val;
			if(isset($edata['ids'][$key]) && $edata['ids'][$key]!="") $id =  $edata['ids'][$key]; else $id="";
			$title =  $edata['title'][$key];
			$type =  $edata['types'][$key];
			if($edata['general'][$key]) $general = $edata['general'][$key]; else $general = "";
			if($edata['a'][$key]) $a = $edata['a'][$key]; else $a = "";
			if($edata['b'][$key]) $b = $edata['b'][$key]; else $b = "";
			if($edata['c'][$key]) $c = $edata['c'][$key]; else $c = "";
			if($edata['mnos'][$key]) $mnos = $edata['mnos'][$key]; else $mnos = "";
			$sorder =  $edata['sorder'][$key];
			
			$site = $edata['site'];
			$month = $edata['month'];
			$year = $edata['year'];
			if($id > 0){
				
				$data = array("year"=>$year, "month"=>$month, "title"=>$title, "type"=>$type, "general"=>$general, "a"=>$a, "b"=>$b, "c"=>$c, "mnos"=>$mnos, "sorder"=>$sorder);
				$category = Manpowersvalidation::find($id);
		
				$category->update($data);
		
			}
			else
			{
			
			  $data = array("site"=>$site, "year"=>$year, "month"=>$month, "title"=>$title, "type"=>$type, "general"=>$general, "a"=>$a, "b"=>$b, "c"=>$c, "mnos"=>$mnos, "sorder"=>$sorder);			  
			  $insertcon = Manpowersvalidation::create($data);  
		
			}
		 }
		 return redirect('/reportdetailfrom/'.$site.'/5/'.$year.'/'.$month);
	}
	
    public function store(StoreReportvalidationRequest $request)

    {

	

	    $edata = $request->all();

	

		

		//exit;

		

      //  Reportvalidation::create($request->all());

	 

		/* foreach($edata['ctpt'] as $key => $record){

		  

		   //$matchfieldscase = ['site' => $edata['ctpt'], 'type' => $edata['type']]; 

		   // $getc = DB::table('reportvalidations')->where($matchfieldscase)->sharedLock()->get();

			

			

			

			$savearr = array('minvalue' => $edata['ctptmin'][$key], 'maxvalue' =>$edata['ctptmax'][$key]);

			$category = Reportvalidation::find($record);

			

              $category->update($savearr);

			 

		 } */

		  $edata = $request->all();   
		  
		   if($edata['type'] == 1) {
		   
		   		if($edata['type']==1) $edata['type'] = "firesafety";

			   if($edata['record'] > 0){

		  		$category = Firesafedailyreportvalidation::find($edata['record']);

				$category->update($edata);

				}else{

				  $insertcon = Firesafedailyreportvalidation::create($edata);  

				}

			}
			  

		    if($edata['type'] == 2) {
			
				if($edata['type']==2) $edata['type'] = "fpm";

				if(isset($edata['record']) && $edata['record']!=""){

					$category = Dailyreportvalidation::find($edata['record']);

					$category->update($edata);

				}

				else{

				  $insertcon = Dailyreportvalidation::create($edata);  

				}

			}
			
			 if($edata['type'] == 3) {
			 
			   if(isset($edata['ride_machines']) && $edata['ride_machines']!="")
			   {
			   		$edata['ride_machines'] = implode(",",$edata['ride_machines']);
			   }
			   if(isset($edata['scrub_machines']) && $edata['scrub_machines']!="")
			   {
			   		$edata['scrub_machines'] = implode(",",$edata['scrub_machines']);
			   }
			   
			 
			   if($edata['type']==3) $edata['type'] = "pms";

			   if($edata['record'] > 0){

		  		$category = Pmsdailyreportvalidation::find($edata['record']);
				//exit;

				$category->update($edata);

				}else{

				  $insertcon = Pmsdailyreportvalidation::create($edata);  

				}

			}

			if($edata['type'] == 4) {
			
			   if($edata['type']==4) $edata['type'] = "security";

			   if($edata['record'] > 0){

		  		$category = Securitydailyreportvalidation::find($edata['record']);

				$category->update($edata);

				}else{

				  $insertcon = Securitydailyreportvalidation::create($edata);  

				}

			}
			
			
			if($edata['type'] == 6) {
			
			   if($edata['type']==6) $edata['type'] = "horti";

			   if($edata['record'] > 0){

		  		$category = Horticuturedailyreportvalidation::find($edata['record']);

				$category->update($edata);

				}else{

				  $insertcon = Horticuturedailyreportvalidation::create($edata);  

				}

			}

			  /*if($edata['type'] == 1) {  

			  

			 	if(isset($edata['record']) && $edata['record']!=""){

					$category = Firesafedailyreportvalidation::find($edata['record']);

					$category->update($edata);

				}

				

				if(isset($edata['blockname'])) {

					if(count($edata['blockname'] > 0)){

						if(isset($edata['valid_month']) && $edata['valid_month']!='') $valid_month =  $edata['valid_month'];

						else $valid_month = "";

						

						if(isset($edata['valid_year']) && $edata['valid_year']!='') $valid_year =  $edata['valid_year'];

						else $valid_year = "";

						

					    $matchmonthf = ['valid_month' => $edata['valid_month'], 'valid_year' => $edata['valid_year'], 'site' =>$edata['site']];

						echo '<pre>'; print_r($matchmonthf); echo '</pre>';  

						 DB::table('blocknocmonthreports')->where($matchmonthf)->delete();

						 DB::table('blocknocreports')->where($matchmonthf)->delete();

						$matchmon_count = \App\Blocknocmonthreport::where($matchmonthf)->count();

						echo '<pre>'; print_r($edata); echo '</pre>'; 

						exit;

						foreach($edata['blockname'] as $ckey => $consuption){

							if($consuption){ 

								 $diconsumptn = array("site"=>$edata['site'],"valid_year"=>$edata['valid_year'],"valid_month"=>$edata['valid_month'],"blockname"=>$edata['blockname'][$ckey],"name_change_socity"=>$edata['name_change_socity'][$ckey],"valid_upto"=>$edata['valid_upto'][$ckey], "ref_id"=>$edata['validid'][$ckey]);

					             $insertcon = Blocknocreport::create($diconsumptn);

								 

								 $diconsumptn = array("site"=>$edata['site'],"valid_year"=>$edata['valid_year'],"valid_month"=>$edata['valid_month'],"blockname"=>$edata['blockname'][$ckey],"name_change_socity"=>$edata['name_change_socity'][$ckey],"valid_upto"=>$edata['valid_upto'][$ckey], "ref_id"=>$edata['validid'][$ckey]);

					             $insertcon = Blocknocmonthreport::create($diconsumptn);  

							}     

						 }

						  

					} 

				}

			}*/

			

			

			

			if($edata['type'] == 5) {
			
			/*

			

				if(isset($edata['mmr_agm_hr']) && $edata['mmr_agm_hr']!="") $edata['mmr_agm_hr'] = $edata['mmr_agm_hr']; else $edata['mmr_agm_hr'] = "";

				if(isset($edata['mmr_assistant']) && $edata['mmr_assistant']!="") $edata['mmr_assistant'] = $edata['mmr_assistant']; else $edata['mmr_assistant'] = "";

				if(isset($edata['mmr_asst_help_desk']) && $edata['mmr_asst_help_desk']!="") $edata['mmr_asst_help_desk'] = $edata['mmr_asst_help_desk']; else $edata['mmr_asst_help_desk'] = "";

				if(isset($edata['mmr_asst_sec_officer']) && $edata['mmr_asst_sec_officer']!="") $edata['mmr_asst_sec_officer'] = $edata['mmr_asst_sec_officer']; else $edata['mmr_asst_sec_officer'] = "";

				if(isset($edata['mmr_asst_stores']) && $edata['mmr_asst_stores']!="") $edata['mmr_asst_stores'] = $edata['mmr_asst_stores']; else $edata['mmr_asst_stores'] = "";

				if(isset($edata['mmr_asst_eng_facility']) && $edata['mmr_asst_eng_facility']!="") $edata['mmr_asst_eng_facility'] = $edata['mmr_asst_eng_facility']; else $edata['mmr_asst_eng_facility'] = "";

				if(isset($edata['mmr_asst_mngr_pms']) && $edata['mmr_asst_mngr_pms']!="") $edata['mmr_asst_mngr_pms'] = $edata['mmr_asst_mngr_pms']; else $edata['mmr_agm_hr'] = "";

				if(isset($edata['mmr_asst_mngr_security']) && $edata['mmr_asst_mngr_security']!="") $edata['mmr_asst_mngr_security'] = $edata['mmr_asst_mngr_security']; else $edata['mmr_asst_mngr_security'] = "";

				if(isset($edata['mmr_bms_operator']) && $edata['mmr_bms_operator']!="") $edata['mmr_bms_operator'] = $edata['mmr_bms_operator']; else $edata['mmr_bms_operator'] = "";

				if(isset($edata['mmr_care_taker_ch']) && $edata['mmr_care_taker_ch']!="") $edata['mmr_care_taker_ch'] = $edata['mmr_care_taker_ch']; else $edata['mmr_care_taker_ch'] = "";

				if(isset($edata['mmr_carpenter']) && $edata['mmr_carpenter']!="") $edata['mmr_carpenter'] = $edata['mmr_carpenter']; else $edata['mmr_carpenter'] = "";

				if(isset($edata['mmr_attendant']) && $edata['mmr_attendant']!="") $edata['mmr_attendant'] = $edata['mmr_attendant']; else $edata['mmr_attendant'] = "";

				if(isset($edata['mmr_dgm_facility']) && $edata['mmr_dgm_facility']!="") $edata['mmr_dgm_facility'] = $edata['mmr_dgm_facility']; else $edata['mmr_dgm_facility'] = "";

				if(isset($edata['mmr_dgm_bd_operations']) && $edata['mmr_dgm_bd_operations']!="") $edata['mmr_dgm_bd_operations'] = $edata['mmr_dgm_bd_operations']; else $edata['mmr_dgm_bd_operations'] = "";

				if(isset($edata['mmr_drivers']) && $edata['mmr_drivers']!="") $edata['mmr_drivers'] = $edata['mmr_drivers']; else $edata['mmr_drivers'] = "";

			  

			    if($edata['record'] > 0){

					//echo "<pre>"; print_r($edata); echo "</pre>";

					//exit;

		  			$category = Manpowervalidation::find($edata['record']);

					$category->update($edata);

				}else{

				 // echo "<pre>"; print_r($edata); echo "</pre>";

				 // exit;

				  $insertcon = Manpowervalidation::create($edata);  

				}

			*/
			
			 foreach($edata['title'] as $key=>$val)
			 {
			 	$title = $val;
				if(isset($edata['ids'][$key]) && $edata['ids'][$key]!="") $id = $edata['ids'][$key]; else $id=0;
				$title =  $edata['title'][$key];
				$type =  $edata['types'][$key];
				if($edata['general'][$key]) $general = $edata['general'][$key]; else $general = "";
				if($edata['a'][$key]) $a = $edata['a'][$key]; else $a = "";
				if($edata['b'][$key]) $b = $edata['b'][$key]; else $b = "";
				if($edata['c'][$key]) $c = $edata['c'][$key]; else $c = "";
				if($edata['mnos'][$key]) $mnos = $edata['mnos'][$key]; else $mnos = "";
				$sorder =  $edata['sorder'][$key];
				
				$site = $edata['site'];
				$month = $edata['month'];
				$year = $edata['year'];
				if($id > 0){
					
					$data = array("year"=>$year, "month"=>$month, "title"=>$title, "type"=>$type, "general"=>$general, "a"=>$a, "b"=>$b, "c"=>$c, "mnos"=>$mnos, "sorder"=>$sorder);
		  			$category = Manpowersvalidation::find($id);

					$category->update($data);

				}
				else
				{
				
				  $data = array("site"=>$site, "year"=>$year, "month"=>$month, "title"=>$title, "type"=>$type, "general"=>$general, "a"=>$a, "b"=>$b, "c"=>$c, "mnos"=>$mnos, "sorder"=>$sorder);

				  $insertcon = Manpowersvalidation::create($data);  

				}
			 }
			
			}

			



 // echo "<pre>"; print_r($edata); echo "</pre>"; exit;

						 //exit;

        return redirect()->route('reportvalidation.index');

    }



    /**

     * Show the form for editing ClientStatus.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {

        $category  = Category::findOrFail($id);



        return view('category.edit', compact('category'));

    }



    /**

     * Update ClientStatus in storage.

     *

     * @param  \App\Http\Requests\UpdateClientStatusesRequest  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function update(UpdateCategoryRequest $request, $id)

    {

        $category = Category::findOrFail($id);

        $category->update($request->all());



        return redirect()->route('category.index');

    }



    /**

     * Remove ClientStatus from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        $client_status = Category::findOrFail($id);

        $client_status->delete();



        return redirect()->route('category.index');

    }



    /**

     * Delete all selected ClientStatus at once.

     *

     * @param Request $request

     */

    public function massDestroy(Request $request)

    {

        if ($request->input('ids')) {

            $entries = Category::whereIn('id', $request->input('ids'))->get();



            foreach ($entries as $entry) {

                $entry->delete();

            }

        }

    }



}

