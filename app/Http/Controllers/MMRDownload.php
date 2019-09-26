<?php
	namespace App\Http\Controllers;
	use App\Manpowervalidation;
	use App\Manpowersvalidation;
	use App\Misreportselectedsite;
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
	
	class MMRDownload extends Controller 
	{
	
		public function downloadoverallmmr(Request $request)
		{
			
			ini_set('max_execution_time', 3000);	
				
			ini_set('memory_limit','1024M');
			$omispdfFile1Count = 0;	
			$omispdfFile2Count = 0;
			$omispdfFile3Count = 0;
			$omispdfFile4Count = 0;
			$omispdfFile5Count = 0;
			$omispdfFile6Count = 0;
			$omispdfFile7Count = 0;
			$omispdfFile8Count = 0;
			$omispdfFile9Count = 0;
			$omispdfFile10Count = 0;
			$omispdfFile11Count = 0;
			$omispdfFile12aCount = 0;
			$omispdfFile12bCount = 0;
			$omispdfFile12cCount = 0;
			$omispdfFile12dCount = 0;
			$omispdfFile13Count = 0;
			$omispdfFile14Count = 0;
			$omispdfFile15Count = 0;
			$omispdfFile16Count = 0;
			$omispdfFile17Count = 0;
			$omispdfFile17aCount = 0;
			$omispdfFile17bCount = 0;
			$omispdfFile17cCount = 0;
			$omispdfFile17dCount = 0;
			$omispdfFile18Count = 0;
			$omispdfFile19Count = 0;
			$omispdfFile20Count = 0;
			$omispdfFile21Count = 0;
			$omispdfFile22Count = 0;
			$omispdfFile23Count = 0;
			$omispdfFile24Count = 0;
			$omispdfFile25Count = 0;
			$omispdfFile26Count = 0;
			$omispdfFile26aCount = 0;
			$omispdfFile27Count = 0;
			$omispdfFile28Count = 0;
			$omispdfFile29Count = 0;
			$omispdfFile29bCount = 0;
			$omispdfFile30Count = 0;
			$omispdfFile31Count = 0;
			$omispdfFile32Count = 0;
			$omispdfFile33Count = 0;
			$omispdfFile34Count = 0;
			$omispdfFile35Count = 0;
			$omispdfFile36Count = 0;
			$omispdfFile37Count = 0;
			$omispdfFile38Count = 0;
			$omispdfFile39Count = 0;
			$omispdfFile40Count = 0;
			
			
			
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
			
		
			/*-------------------------------------------PAGE1-Scope of Services-----------------------------*/
			
			$relations = [
	
			'report_month' => $mn,
	
			'report_year' => $segment2,
	
			'sitename' => get_sitename($site),
	
			]; 
	
			$pdf = PDF::loadView('mmrreports.mmr_mmrtechservices', $relations);
	
			$pdf->save(storage_path('/mmrfiles/mmrtechservices.pdf'));  
			
			
			/*-------------------------------------------PAGE1-Manpower-----------------------------*/
			
			
			$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
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
		
		   $ndays=cal_days_in_month(CAL_GREGORIAN,$month,$year);
		   $relations = [		
				'year' => $segment2,			
				'month' => $segment3, 			
				'monthname' => date("F", mktime(0, 0, 0, $month, 10)),			
				'sitename' => get_sitename($site),			
				'site' => $site,			
				'manpowers' => $data,			
				'ndays' => $ndays,			
				'updated' => ""	
			];
			
			if($Manpower_Count>0)
			{
				$pdf = PDF::loadView('mmrreports.mmr_mmrmanpower', $relations);
				$pdf->save(storage_path('/mmrfiles/mmrmanpower.pdf')); 
				$im = new \Imagick();
				$im->pingImage(storage_path() . '/mmrfiles/mmrmanpower.pdf');
				$omispdfFile2Count =  $im->getNumberImages(); 
			}
	
			
			/*-------------------------------------------PAGE1-SLA Adherence Report-----------------------------*/
			
		   $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
		   $segment1 = $uriSegments[1]; 	
		   $segment2 = $uriSegments[2];	
		   $segment3 = $uriSegments[3];	
		   $site = $uriSegments[4];
		   $ndays=cal_days_in_month(CAL_GREGORIAN,$month,$year);
		   $sresullt = array();
		   $matchfields_hskpact = ['site' => $site, 'month' =>$segment3, 'year' => $segment2];
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
				'sresullt' => $sresullt		
			];
			if($SLAAdherenceCount > 0)
			{
				$pdf = PDF::loadView('mmrreports.mmr_mmrsla', $relations);
				$pdf->save(storage_path('/mmrfiles/mmrsla.pdf')); 
				$im = new \Imagick();
				$im->pingImage(storage_path() . '/mmrfiles/mmrsla.pdf');
				$omispdfFile3Count =  $im->getNumberImages(); 
			}
			
			
			/*-------------------------------------------PAGE1-Complaints-----------------------------*/
			
			
			$formfieldarray = array();
			$siteattrname = array();
			$flatres = array();
			$apnarecord = array();
			$reportdate_val = "";
			$dateString = $segment2.'-'.$segment3.'-04';
			//Last date of current month.
			$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
			$lastdatearr = explode("-",$lastDateOfMonth);
			$reportdate_val = $lastdatearr[2]."-".$segment3."-".$segment2;
	
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
				'report_year' => $segment2,
				'report_month' => $segment3,
				'existing' => $existing_records,
				'cost' => $existing_Rates,
				];    
	
			
	
			$matchfields = ['month' => $segment3, 'year' => $segment2]; 
	
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
				 $sites_res_arr = $siteattrname;
				 $skarra= array();				  
		   		 $mislist = $uriSegments[4];	  
				  $allsitesList = explode(",",$mislist);
				  $i=0;
				  foreach($sites_res_arr as $keys => $site){
					if (in_array($keys, $allsitesList)) 
					{
						$skarra[$i] = $keys;
						$i = $i+1;
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
				  
				 foreach($siteattrname as $stk => $siten) {
				 
				  $match_in_fields = ['month' => $segment3, 'year' => $segment2, 'site' =>$stk]; 
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
				'report_year' => $segment2,
				'report_month' => $segment3,
				'existing' => $existing_records,
				'cost' => $existing_Rates,
				'apnarep' => $indentrep_Array,
				'recordcount' => $apnarecord,
				];   
				
				$omisapnacomplexCount = 0; 
				
				foreach ($indentrep_Array as $k => $indrec)
				{
					 if (count($indrec) > 0){
						$omisapnacomplexCount = $omisapnacomplexCount + 1;
					 }
				 }    
			
			// return view('misprints.apnacomplex', $relations);			 
			   
			
			//$pdf->setPaper('A4', 'landscape'); 
			if($omisapnacomplexCount > 0)
			{
				$pdf = PDF::loadView('misprints.apnacomplex', $relations);
				$pdf->save(storage_path('/mmrfiles/omisapnacomplex.pdf')); 
				$im = new \Imagick();
				$im->pingImage(storage_path() . '/mmrfiles/omisapnacomplex.pdf');
				$omispdfFile4Count =  $im->getNumberImages(); 
			}
			
			
			/*-------------------------------------------PAGE1-Major Incidents/Accidents-----------------------------*/			
			
			$resullt = array();

			$matchfields_hskpact = ['site' => $uriSegments[4], 'month' =>$segment3, 'year' => $segment2]; 
	
			$MajorIncidents_Count = \App\Mmrmajorincident::where($matchfields_hskpact)->count();
	
			if($MajorIncidents_Count > 0){
	
				$resullt = \App\Mmrmajorincident::where($matchfields_hskpact)->get();
	
			}
			
			$relations = [
	
				'year' => $segment2,
	
				'month' => $segment3, 
	
				'monthname' => date("F", mktime(0, 0, 0, $segment3, 10)),
	
				'sitename' => get_sitename($site),
	
				'site' => $uriSegments[4],
	
				'resval' => $resullt
	
			];
			if($MajorIncidents_Count > 0)
			{
				$pdf = PDF::loadView('mmrreports.mmr_mmrtechnicalservices', $relations);
				$pdf->save(storage_path('/mmrfiles/mmrmajor_incidents_Accidents.pdf')); 
				$im = new \Imagick();
				$im->pingImage(storage_path() . '/mmrfiles/mmrmajor_incidents_Accidents.pdf');
				$omispdfFile5Count =  $im->getNumberImages(); 
			}
			
			/*-----------------------------------------------Technical Services---------------------------------------*/
			
			
			
			
			
			
			/*-------------------------------------------PAGE1-Fire Safety Equipment Status-----------------------------*/
			
			$formfieldarray = array();
			$siteattrname = array(); 
			$flatres = array(); 
			$ref_overall = array();
			$ref_overall_temp = array();
			
			$reportdate_val = "";
			$dateString = $segment2.'-'.$segment3.'-04';
			//Last date of current month.
			$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
			$lastdatearr = explode("-",$lastDateOfMonth);
			$reportdate_val = $lastdatearr[2]."-".$segment3."-".$segment2;
			
			
			
			
			 if(Auth::user()->id == 1){
			  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('name', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
			  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('name', 'ASC')->get()->pluck('name', 'id');
			  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
			  
			  
			  }else{
	
				$role_id = Auth::user()->role_id;
				$emp_id = Auth::user()->emp_id;
				$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
				$siteinfo = $getemp_info->community;
				$sitearr = explode(",",$siteinfo);
				$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('name', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
				$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('name', 'ASC')->get()->pluck('name', 'id');
				$borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
				
			  }
			 
			 $sites_res_arr = $siteattrname;
			 $skarra= array();
			 $mislist =   $uriSegments[4];		  
			  $allsitesList = explode(",",$mislist);
			  $i=0;
			  foreach($sites_res_arr as $keys => $site){
				if (in_array($keys, $allsitesList)) 
				{
					$skarra[$i] = $keys;
					$i = $i+1;
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
			  
	
			
			$matchfields = ['month' => $segment3, 'year' => $segment2]; 
			
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
				$mismatchfields = ['month' => $segment3, 'year' => $segment2, 'site' =>$skey]; 
				
				$mismatchcount = \App\Firesafetymisreport::where($mismatchfields)->count();
				
				if($mismatchcount > 0){
					 $mismatch_ress = \App\Firesafetymisreport::where($mismatchfields)->first();
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
				'report_year' => $segment2,
				'report_month' => $segment3,
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
									'report_year' => $segment2,
									'report_month' => $segment3,
									'issues' => $ref_overall, 
									'issuecount' => $issuecount,
									'validation' => $ref_total, 
									'misres' => $misresult, 
									 'misprevious' => $misprevresult,
									'issuetemp' => $ref_overall_temp,
								];  
								
									$pdf = PDF::loadView('misprints.firesafeviews.mainfile', $relations);
								  // $pdf->setPaper('A4', 'landscape');
								   $pdf->save(storage_path('/mmrfiles/firesafe/mistrafficprint'.$ikey.'.pdf'));  
							  
							  if($issuecn > 5) {
							   $fi = $fi + 1;
								   $issuet[$ikey] = $ikey;
									$relations = [
									'ikey' => $ikey,  
									'sites' => $siteattrname,
									'issuecn' => $issuecn,
									'report_on' => $reportdate_val,
									'report_year' => $segment2,
									'report_month' => $segment3,
									'issues' => $ref_overall, 
									'issuecount' => $issuecount,
									'validation' => $ref_total, 
									'misres' => $misresult, 
									 'misprevious' => $misprevresult,
									'issuetemp' => $ref_overall_temp,
								];  
								
								
								  $pdf = PDF::loadView('misprints.firesafeviews.landscpaefile', $relations);
								  $pdf->setPaper('A4', 'landscape');
								   $pdf->save(storage_path('/mmrfiles/firesafe/mistrafficprintissue'.$ikey.'.pdf'));  
								 
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
									'report_year' => $segment2,
									'report_month' => $segment3,
									'issues' => $ref_overall, 
									'issuecount' => $issuecount,
									'validation' => $ref_total, 
									'misres' => $misresult, 
									 'misprevious' => $misprevresult,
									'issuetemp' => $ref_overall_temp,
								];  
								
								
								  $pdf = PDF::loadView('misprints.firesafeviews.portraitfile', $relations);
								  
								   $pdf->save(storage_path('/mmrfiles/firesafe/mistrafficprintissue'.$ikey.'.pdf'));  
								   
							   
							  }
							  }
							  
							}  
							
							$pdf = new \PDFMerger();
							foreach ($issuecount as $ikey => $issuecn) {
						 
							 $pdf->addPDF(storage_path() .'/mmrfiles/firesafe/mistrafficprint'.$ikey.'.pdf', 'all');
						   
							   if(isset($issuet[$ikey])) {
								  
								   $pdf->addPDF(storage_path() .'/mmrfiles/firesafe/mistrafficprintissue'.$ikey.'.pdf', 'all');
							   }
							   
							 }
							 
							 $pathForTheMergedPdf_fire_firesafe = storage_path() . "/mmrfiles/firesafe/finalresult.pdf";
							 
							 $pdf->merge('file', storage_path('/mmrfiles/omisfiresafeequipment.pdf'));
							 
							 $firesafe_final_Count = $issuecount;
							 
							  //$fcount = $fi + 3;
							  
							  $firesafepcn = $fi;
			 
			 $im = new \Imagick();
             $im->pingImage(storage_path() . '/mmrfiles/omisfiresafeequipment.pdf');
             $omispdfFile6Count =  $im->getNumberImages();
			 
							
							} 
			 
			 /*----------------------------------REPORT Five End (Fire Safety Equipment)-----------------------------------------*/
			
			
			
			/*-------------------------------------------PAGE1-Fire Safety - NOC-----------------------------*/
		

		

		$matchfields_fornoc = ['valid_month' => $segment3, 'valid_year' => $segment2, 'site' =>$uriSegments[4]];		

		$MMRNOC_Count = \App\Blocknocmonthreport::where($matchfields_fornoc)->count();

		$resnoc_cres = array();

		if($MMRNOC_Count>0)

		$resnoc_cres = \App\Blocknocmonthreport::where($matchfields_fornoc)->get();

		else

		$resnoc_cres = \App\Blocknocmonthreport::where('site',$uriSegments[4])->get();
		
		if(count($resnoc_cres)>0)
		{
			$fnmatchfields_fornoc = ['month' => $segment3, 'year' => $segment2, 'site' =>$uriSegments[4]]; 
	
			$fnresnoc_count = \App\Firesafetymisreport::where($fnmatchfields_fornoc)->count();
	
			if($fnresnoc_count > 0)
	
			{
	
				$fresnoc_cres = \App\Firesafetymisreport::where($fnmatchfields_fornoc)->first();
	
				$noc_info = $fresnoc_cres->noc_info;
	
			
			
			$noc_info = "";  
	
			$relations = [
	
				'report_on' => date($year."-".$month."-t"),
	
				'report_year' => $year,
	
				'report_month' => $month,
	
				'monthname' => date("F", mktime(0, 0, 0, $month, 10)), 
	
				'nocres' => $resnoc_cres,
	
				'noc_info' => $noc_info,
	
				'sitename' => get_sitename($uriSegments[4])
				];
	
			$pdf = PDF::loadView('mmrreports.mmrnoc', $relations);
	
			$pdf->save(storage_path('/mmrfiles/mmrnoc.pdf'));
			
			
			 $im = new \Imagick();
			 $im->pingImage(storage_path() . '/mmrfiles/mmrnoc.pdf');
			 $omispdfFile7Count =  $im->getNumberImages(); 
	
			}
		}
			
			/*-------------------------------------------PAGE1-Equipment Status-----------------------------*/
			
			/*----------------------------------REPORT Seven First (Equipment Status)-----------------------------------------*/
			 
			 
			 
			$formfieldarray = array();
			$siteattrname = array();
			$flatres = array(); 
			$ref_overall = array();
			$ref_overall_temp = array();
			
			$fcount = 0;
			
			$reportdate_val = "";
			$dateString = $segment2.'-'.$segment3.'-04';
			//Last date of current month.
			$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
			$lastdatearr = explode("-",$lastDateOfMonth);
			$reportdate_val = $lastdatearr[2]."-".$segment3."-".$segment2;
			
			
			
			
			 if(Auth::user()->id == 1){
			  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('name', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
			  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('name', 'ASC')->get()->pluck('name', 'id');
			  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
			  
			  
			  }else{
	
				$role_id = Auth::user()->role_id;
				$emp_id = Auth::user()->emp_id;
				$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
				$siteinfo = $getemp_info->community;
				$sitearr = explode(",",$siteinfo);
				$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('name', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
				$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('name', 'ASC')->get()->pluck('name', 'id');
				$borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
				
			  }
			  
			  
			  $sites_res_arr = $siteattrname;			  
			  $skarra= array();
			  //$mis_sites_list = Misreportselectedsite::where('reportname', '=', 'Electro_Mechanical_Equipment_status')->first();
			 // if($mis_sites_list) $mislist = $mis_sites_list['slist'];		  
			 // else $mislist = "9,15,13,11,8,5,14,7,19,18,20,12,87,17";	
			  $mislist = $uriSegments[4];	  
			  $allsitesList = explode(",",$mislist);
			  $i=0;
			  foreach($sites_res_arr as $keys => $site){
				if (in_array($keys, $allsitesList)) 
				{
					$skarra[$i] = $keys;
					$i = $i+1;
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
			
			$matchfields = ['month' => $segment3, 'year' => $segment2]; 
			
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
				 
				// FOR APRIL-2018
				 //unset($issuecount['17']);
				 
				 //$new_issuecn = array('17' => '0') + $issuecount;
				 
				 //$issuecount = $new_issuecn;
				 
				 // FOR APRIL-2018
				 /* echo "<pre>";
				   print_r($issuecount);
				 echo "</pre>"; exit;  */
			
			$relations = [
				'res' => $formfieldarray,  
				'sites' => $siteattrname,
				'report_on' => $reportdate_val,
				'report_year' => $segment2,
				'report_month' => $segment3,
				'issues' => $ref_overall, 
				'issuecount' => $issuecount,
				'validation' => $ref_total, 
				'misres' => $misresult, 
				'misprevious' => $misprevresult,
				'issuetemp' => $ref_overall_temp,
				
				];     
				
				 $Equipment_mechanical_Count = $issuecount;
				
				 $pdf = PDF::loadView('misprints.electomechanical', $relations);  
			   ////sss////   $pdf->save(storage_path('/mmrfiles/electomechanical.pdf')); 
				  
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
									'report_year' => $segment2,
									'report_month' => $segment3,
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
								   $pdf->save(storage_path('/mmrfiles/equipment/mistrafficprint'.$ikey.'.pdf'));  
							  
							  if($issuecn > 5) {
							  $fi = $fi + 1;
								   $issuet[$ikey] = $ikey;
									$relations = [
									'ikey' => $ikey,  
									'sites' => $siteattrname,
									'issuecn' => $issuecn,
									'report_on' => $reportdate_val,
									'report_year' => $segment2,
									'report_month' => $segment3,
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
								   $pdf->save(storage_path('/mmrfiles/equipment/mistrafficprintissue'.$ikey.'.pdf'));  
								 
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
									'report_year' => $segment2,
									'report_month' => $segment3,
									'issues' => $ref_overall, 
									'issuecount' => $issuecount,
									'validation' => $ref_total, 
									'misres' => $misresult, 
									'misprevious' => $misprevresult,
									'issuetemp' => $ref_overall_temp,
									'pagenumberval' => $fi + $fcount,
								];  
								
								
								  $pdf = PDF::loadView('misprints.equipment.portraitfile', $relations);
								  
								   $pdf->save(storage_path('/mmrfiles/equipment/mistrafficprintissue'.$ikey.'.pdf'));  
								   
							   
							  }
							  }
							  
							}  
							
							
							
							 $fcount =   $fcount + $fi;
							 
							 
							 $pdf = new \PDFMerger();
							 $k="";
							 foreach ($issuecount as $ikey => $issuecn) {
							
							 $pdf->addPDF(storage_path() .'/mmrfiles/equipment/mistrafficprint'.$ikey.'.pdf', 'all');
						   
							   if(isset($issuet[$ikey])) {
								  
								   $pdf->addPDF(storage_path() .'/mmrfiles/equipment/mistrafficprintissue'.$ikey.'.pdf', 'all');
							   }
							   
							 }
							 
							 
							 
							 $pathForTheMergedPdf_fire_firesafe = storage_path() . "/mmrfiles/equipment/finalresult.pdf";
							 
							 $pdf->merge('file', storage_path('/mmrfiles/omiselectomechanical.pdf'));
							 
							 $firesafe_final_Count = $issuecount;
							 
							  //$fcount = $fi + 3;
							  
							 $wqupmentcn =  $fi;
							 $im = new \Imagick();
							 $im->pingImage(storage_path() . '/mmrfiles/omiselectomechanical.pdf');
							 $omispdfFile8Count =  $im->getNumberImages();
							 
							 } 
							
			/*----------------------------------REPORT Seven First (Equipment Status)-----------------------------------------*/
			
			/*-------------------------------------------PAGE1-STP Status-----------------------------*/
			$formfieldarray = array();
			$siteattrname = array();
			$flatres = array(); 
			$ref_overall = array();
			$ref_overall_temp = array();
			
			$reportdate_val = "";
			$dateString = $segment2.'-'.$segment3.'-04';
			//Last date of current month.
			$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
			$lastdatearr = explode("-",$lastDateOfMonth);
			$reportdate_val = $lastdatearr[2]."-".$segment3."-".$segment2;
			
			
			 if(Auth::user()->id == 1){
			  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('name', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
			  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('name', 'ASC')->get()->pluck('name', 'id');
			  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
			  
			  
			  }else{
		
				$role_id = Auth::user()->role_id;
				$emp_id = Auth::user()->emp_id;
				$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
				$siteinfo = $getemp_info->community;
				$sitearr = explode(",",$siteinfo);
				$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('name', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
				$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('name', 'ASC')->get()->pluck('name', 'id');
				$borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
				
			  }
			  
			
			   $skarra= array();
			   
		/*	   $mis_sites_list = Misreportselectedsite::where('reportname', '=', 'STP_Status')->first();
			  if($mis_sites_list) $mislist = $mis_sites_list['slist'];		  
			  else $mislist = "9,15,13,11,8,5,14,7,19,18,20,12,87,17";	*/
			  $mislist = $uriSegments[4];	  	  
			  $allsitesList = explode(",",$mislist);
			  $i=0;
			  foreach($sites_res_arr as $keys => $site){
				if (in_array($keys, $allsitesList)) 
				{
					$skarra[$i] = $keys;
					$i = $i+1;
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
			
			$matchfields = ['month' => $segment3, 'year' => $segment2]; 
			
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
				$mismatchfields = ['month' => $segment3, 'year' => $segment2, 'site' =>$skey]; 
				
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
				  $prev_mon = $segment3 - 1;;
				  $prev_year = $segment2;
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
					 
				 /*echo "<pre>";
				   print_r($ref_overall_temp);
				 echo "</pre>"; exit; */
			
				$relations = [
					'res' => $formfieldarray,  
					'sites' => $siteattrname,
					'report_on' => $reportdate_val,
					'report_year' => $segment2,
					'report_month' => $segment3,
					'issues' => $ref_overall, 
					'issuecount' => $issuecount,
					'validation' => $ref_total, 
					'misres' => $misresult, 
					'issuetemp' => $ref_overall_temp,
					'misprevious' => $misprevresult,
				
				];      
				
				$stp_issue_Count = $issuecount;
						
			   $pdf = PDF::loadView('misprints.stpstatus', $relations);  
			   //$pdf->save(storage_path('/mmrfiles/omisstpstatus.pdf')); 
			   
			   
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
									'report_year' => $segment2,
									'report_month' => $segment3,
									'issues' => $ref_overall, 
									'issuecount' => $issuecount,
									'validation' => $ref_total, 
									'misres' => $misresult, 
									'misprevious' => $misprevresult,
									'issuetemp' => $ref_overall_temp,
									'pagenumberval' => $fi + $fcount,
								];  
								
									$pdf = PDF::loadView('misprints.stp.mainfile', $relations);
								  // $pdf->setPaper('A4', 'landscape');
								   $pdf->save(storage_path('/mmrfiles/stp/mistrafficprint'.$ikey.'.pdf'));  
							  
							  if($issuecn > 5) {
							  $fi = $fi + 1;
								   $issuet[$ikey] = $ikey;
									$relations = [
									'ikey' => $ikey,  
									'sites' => $siteattrname,
									'issuecn' => $issuecn,
									'report_on' => $reportdate_val,
									'report_year' => $segment2,
									'report_month' => $segment3,
									'issues' => $ref_overall, 
									'issuecount' => $issuecount,
									'validation' => $ref_total, 
									'misres' => $misresult, 
									'issuetemp' => $ref_overall_temp,
									'pagenumberval' => $fi + $fcount,
								];  
								
								
								  $pdf = PDF::loadView('misprints.stp.landscpaefile', $relations);
								  $pdf->setPaper('A4', 'landscape');
								   $pdf->save(storage_path('/mmrfiles/stp/mistrafficprintissue'.$ikey.'.pdf'));  
								 
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
									'report_year' => $segment2,
									'report_month' => $segment3,
									'issues' => $ref_overall, 
									'issuecount' => $issuecount,
									'validation' => $ref_total, 
									'misres' => $misresult, 
									'issuetemp' => $ref_overall_temp,
									'pagenumberval' => $fi + $fcount,
								];  
								
								
								  $pdf = PDF::loadView('misprints.stp.portraitfile', $relations);
								  
								   $pdf->save(storage_path('/mmrfiles/stp/mistrafficprintissue'.$ikey.'.pdf'));  
								   
							   
							  }
							  }
							  
							}  
							
						$fcount =   $fcount + $fi;
						$pdf = new \PDFMerger();
						$k="";
						foreach ($issuecount as $ikey => $issuecn) {
						
						 $pdf->addPDF(storage_path() .'/mmrfiles/stp/mistrafficprint'.$ikey.'.pdf', 'all');
					   
						   if(isset($issuet[$ikey])) {
							  
							   $pdf->addPDF(storage_path() .'/mmrfiles/stp/mistrafficprintissue'.$ikey.'.pdf', 'all');
						   }
						   
						 }
						 
						 $pathForTheMergedPdf_fire_firesafe = storage_path() . "/mmrfiles/stp/finalresult.pdf";
						 
						 $pdf->merge('file', storage_path('/mmrfiles/omisstpstatus.pdf'));
						 
						 $stp_issue_Count = $issuecount;
						
						 $stppcn =  $fi;
						 
						 $im = new \Imagick();
						 $im->pingImage(storage_path() . '/mmrfiles/omisstpstatus.pdf');
						 $omispdfFile9Count =  $im->getNumberImages(); 
			
						
							
							}
			/*-------------------------------------------PAGE1-WSP Status-----------------------------*/
			$formfieldarray = array();
			$siteattrname = array();
			$flatres = array(); 
			$ref_overall = array();
			$ref_overall_temp = array();
			
			$reportdate_val = "";
			$dateString = $segment2.'-'.$segment3.'-04';
			//Last date of current month.
			$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
			$lastdatearr = explode("-",$lastDateOfMonth);
			$reportdate_val = $lastdatearr[2]."-".$segment3."-".$segment2;
			
			
			
			
			 if(Auth::user()->id == 1){
			  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('name', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
			  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('name', 'ASC')->get()->pluck('name', 'id');
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
			   
			  /*$mis_sites_list = Misreportselectedsite::where('reportname', '=', 'WSP_Status')->first();
			  if($mis_sites_list) $mislist = $mis_sites_list['slist'];		  
			  else $mislist = "9,15,13,11,8,5,14,7,19,18,20,12,87,17";*/		
			  
			  
			  $mislist = $uriSegments[4];	  	    
			  $allsitesList = explode(",",$mislist);
			  $i=0;
			  foreach($sites_res_arr as $keys => $site){
				if (in_array($keys, $allsitesList)) 
				{
					$skarra[$i] = $keys;
					$i = $i+1;
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
			
			$matchfields = ['month' => $segment3, 'year' => $segment2]; 
			
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
				$mismatchfields = ['month' => $segment3, 'year' => $segment2, 'site' =>$skey]; 
				
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
				  $prev_mon = $segment3 - 1;;
				  $prev_year = $segment2;
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
				 
				 /*echo "<pre>";
				   print_r($ref_overall_temp);
				 echo "</pre>"; exit; */
			
				$relations = [ 
					'res' => $formfieldarray,  
					'sites' => $siteattrname,
					'report_on' => $reportdate_val,
					'report_year' => $segment2,
					'report_month' => $segment3,
					'issues' => $ref_overall, 
					'issuecount' => $issuecount,
					'validation' => $ref_total, 
					'misres' => $misresult, 
					'issuetemp' => $ref_overall_temp,
					'misprevious' => $misprevresult,
				
				];       
				
				$wsp_issue_Count = $issuecount;
				
				  $pdf = PDF::loadView('misprints.wspstatus', $relations);  
				  //$pdf->save(storage_path('/mmrfiles/omiswspstatus.pdf')); 
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
									'report_year' => $segment2,
									'report_month' => $segment3,
									'issues' => $ref_overall, 
									'issuecount' => $issuecount,
									'validation' => $ref_total, 
									'misres' => $misresult, 
									'misprevious' => $misprevresult,
									'issuetemp' => $ref_overall_temp,
									'pagenumberval' => $fi + $fcount,
								];  
								
									$pdf = PDF::loadView('misprints.wsp.mainfile', $relations);
								  // $pdf->setPaper('A4', 'landscape');
								   $pdf->save(storage_path('/mmrfiles/wsp/mistrafficprint'.$ikey.'.pdf'));  
							  
							  if($issuecn > 5) {
							  $fi = $fi + 1;
								   $issuet[$ikey] = $ikey;
									$relations = [
									'ikey' => $ikey,  
									'sites' => $siteattrname,
									'issuecn' => $issuecn,
									'report_on' => $reportdate_val,
									'report_year' => $segment2,
									'report_month' => $segment3,
									'issues' => $ref_overall, 
									'issuecount' => $issuecount,
									'validation' => $ref_total, 
									'misres' => $misresult, 
									'issuetemp' => $ref_overall_temp,
									'pagenumberval' => $fi + $fcount,
								];  
								
								
								  $pdf = PDF::loadView('misprints.wsp.landscpaefile', $relations);
								  $pdf->setPaper('A4', 'landscape');
								   $pdf->save(storage_path('/mmrfiles/wsp/mistrafficprintissue'.$ikey.'.pdf'));  
								 
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
									'report_year' => $segment2,
									'report_month' => $segment3,
									'issues' => $ref_overall, 
									'issuecount' => $issuecount,
									'validation' => $ref_total, 
									'misres' => $misresult, 
									'issuetemp' => $ref_overall_temp,
									'pagenumberval' => $fi + $fcount,
								];  
								
								
								  $pdf = PDF::loadView('misprints.wsp.portraitfile', $relations);
								  
								   $pdf->save(storage_path('/mmrfiles/wsp/mistrafficprintissue'.$ikey.'.pdf'));  
								   
							   
							  }
							  }
							  
							}  
							
							$fcount =   $fcount + $fi;
							
							$pdf = new \PDFMerger();
							$k="";
							
							
							foreach ($issuecount as $ikey => $issuecn) {
							
							 $pdf->addPDF(storage_path() .'/mmrfiles/wsp/mistrafficprint'.$ikey.'.pdf', 'all');
						   
							   if(isset($issuet[$ikey])) {
								  
								   $pdf->addPDF(storage_path() .'/mmrfiles/wsp/mistrafficprintissue'.$ikey.'.pdf', 'all');
							   }
							   
							 }
							 
							 $pathForTheMergedPdf_fire_firesafe = storage_path() . "/mmrfiles/wsp/finalresult.pdf";
							 
							 $pdf->merge('file', storage_path('/mmrfiles/omiswspstatus.pdf'));
							 
							 $stp_issue_Count = $issuecount;
							
							 $wsppcn =  $fi;
							 
							 $im = new \Imagick();
							 $im->pingImage(storage_path() . '/mmrfiles/omiswspstatus.pdf');
							 $omispdfFile10Count =  $im->getNumberImages(); 
			
							
							
							}
			/*-------------------------------------------PAGE1-Warranty / AMC Status-----------------------------*/
			
			$wresullt = array();
		
			$site = $uriSegments[4];
			$wresullt = Communityassetmaintenance::select("communityassetmaintenances.*",'categories.name as catgname','vendors.name as vendorname','assets.name as assetname','sites.name as sitename')->leftJoin('community_assets','community_assets.id','=','communityassetmaintenances.cam_id')->leftJoin('categories','categories.id','=','communityassetmaintenances.category_id')->leftJoin('vendors','vendors.id','=','community_assets.vendor')->leftJoin('assets','assets.id','=','community_assets.asset_id')->leftJoin('sites','sites.id','=','communityassetmaintenances.site_id')->where('communityassetmaintenances.status','=',1)->where('communityassetmaintenances.site_id', $site)->where('communityassetmaintenances.status',1)->whereIn('communityassetmaintenances.amc_type',['amc','waranty'])->where('assets.name','!=','')->groupBy('communityassetmaintenances.id')->orderBy('communityassetmaintenances.alert_date', 'asc')->get();	
	
			$amctracker_Count = count($wresullt);
			
			if($amctracker_Count>0 && $site!=95)
			{
			
		
				$relations = [
		
				'year' => $segment2,
		
				'month' => $segment3, 
		
				'monthname' => date("F", mktime(0, 0, 0, $segment3, 10)),
		
				'sitename' => get_sitename($site),
		
				'site' => $site,
		
				'wresval' => $wresullt
				];  
		
				$pdf = PDF::loadView('mmrreports.mmr_mmramctrackers', $relations);
		
				$pdf->setPaper('A4', 'landscape');
		
				$pdf->save(storage_path('/mmrfiles/amctracker.pdf'));
				$im = new \Imagick();
				$im->pingImage(storage_path() . '/mmrfiles/amctracker.pdf');
				$omispdfFile11Count =  $im->getNumberImages(); 
			}
		
		
		/*-----------------------------------------------Power Consumption-----------------------------------------------*/

		
		$Power_Consumption1 = 0;
		$Power_Consumption2 = 0;
		$Power_Consumption3 = 0;
		
		$Solar_Power_Units1 = 0;
		$Solar_Power_Units2 = 0;
		$Solar_Power_Units3 = 0;
		
		$DG_Units1 = 0;
		$DG_Units2 = 0;
		$DG_Units3 = 0;
		
		$sitefilter = $uriSegments[4];
		
		$dateString = $segment2."-".$segment3."-01";
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
		

		$resullt = array();

		$image = "";

		$matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year, 'type' => 'graphs', 'title' => 'Power Consumtion']; 



		$resullt_cn = \App\Mmrmonthlyreport::where($matchfields_hskpact)->count();

		if($resullt_cn > 0){

			$resullt = \App\Mmrmonthlyreport::where($matchfields_hskpact)->first();

			$image = $resullt->before_image;

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
			
			'Power_Consumption1' => $Power_Consumption1,

			'Power_Consumption2' => $Power_Consumption2,

			'Power_Consumption3' => $Power_Consumption3,

			'Solar_Power_Units1' => $Solar_Power_Units1,

			'Solar_Power_Units2' => $Solar_Power_Units2,

			'Solar_Power_Units3' => $Solar_Power_Units3,

			'DG_Units1' => $DG_Units1,

			'DG_Units2' => $DG_Units2,

			'DG_Units3' => $DG_Units3

        ];  

	    $pdf = PDF::loadView('mmrreports.mmr_power', $relations);

		if($Power_Consumption1>0 || $Power_Consumption2>0 || $Power_Consumption3>0) 
		{ 
			$pdf->save(storage_path('/mmrfiles/ebpower.pdf'));
			$im = new \Imagick();
			$im->pingImage(storage_path() . '/mmrfiles/ebpower.pdf');
			$omispdfFile12aCount =  $im->getNumberImages(); 
		}

		 

		

		

		/*-----------------------------------------------Power Failure Analysis-----------------------------------------------*/

		
		$Power_Failure_Hrs1 = '0:00';
		$Power_Failure_Hrs2 = '0:00';
		$Power_Failure_Hrs3 = '0:00';
		
		$Diesel_Consume1 = 0;
		$Diesel_Consume2 = 0;
		$Diesel_Consume3 = 0;
		
		$sitefilter = $uriSegments[4];
		
		$dateString = $segment2."-".$segment3."-01";
		$datefilter1 = date("t-m-Y", strtotime($dateString));
		$datefilter2 =   date("t-m-Y", strtotime($dateString." -1 month"));
		$datefilter3 =   date("t-m-Y", strtotime($dateString." -2 months"));
		
		$prev_omonth = date("m", strtotime($dateString." -1 month"));
		
		$prev_tmonth = date("m", strtotime($dateString." -2 months"));
		
		$Power_Failure_Hrs1 = getmtdfms($datefilter1,$sitefilter,'dgset_pwrfailure');		
		$Power_Failure_Hrs2 = getmtdfms($datefilter2,$sitefilter,'dgset_pwrfailure');		
		$Power_Failure_Hrs3 = getmtdfms($datefilter3,$sitefilter,'dgset_pwrfailure');
		
		$Diesel_Consume1 = getmtdfms($datefilter1,$sitefilter,'dset_dieselconsume');
		$Diesel_Consume2 = getmtdfms($datefilter2,$sitefilter,'dset_dieselconsume');
		$Diesel_Consume3 = getmtdfms($datefilter3,$sitefilter,'dset_dieselconsume');
				
		

		$resullt = array();

		$image = "";
		
		$image2 = "";

		$matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year, 'type' => 'graphs', 'title' => 'Power Failure']; 



		$resullt_cn = \App\Mmrmonthlyreport::where($matchfields_hskpact)->count();

		if($resullt_cn > 0){

			$resullt = \App\Mmrmonthlyreport::where($matchfields_hskpact)->first();

			$image = $resullt->before_image;

		}
		
		$matchfields_hskpact1 = ['site' => $site, 'month' =>$month, 'year' => $year, 'type' => 'graphs', 'title' => 'Diesel Consumed']; 



		$resullt_cn = \App\Mmrmonthlyreport::where($matchfields_hskpact1)->count();

		if($resullt_cn > 0){

			$resullt = \App\Mmrmonthlyreport::where($matchfields_hskpact1)->first();

			$image2 = $resullt->before_image;

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

			'ebgraph1' => $image,
			
			'ebgraph2' => $image2,
			
			'Power_Failure_Hrs1' => $Power_Failure_Hrs1,

			'Power_Failure_Hrs2' => $Power_Failure_Hrs2,

			'Power_Failure_Hrs3' => $Power_Failure_Hrs3,

			'Diesel_Consume1' => $Diesel_Consume1,

			'Diesel_Consume2' => $Diesel_Consume2,

			'Diesel_Consume3' => $Diesel_Consume3

        ];  

	    $pdf = PDF::loadView('mmrreports.mmrpfanalysis', $relations);

		if($Power_Failure_Hrs1>0 || $Power_Failure_Hrs2>0 || $Power_Failure_Hrs3>0  || $Diesel_Consume1>0  || $Diesel_Consume2>0  || $Diesel_Consume3>0) 
		{ 
			$pdf->save(storage_path('/mmrfiles/pfanalysis.pdf'));
			$im = new \Imagick();
			$im->pingImage(storage_path() . '/mmrfiles/pfanalysis.pdf');
			$omispdfFile12bCount =  $im->getNumberImages(); 
		}
		 

		
		/*------------------------------------------------------Diesel Report-------------------------------------------------------------*/
		
		
		$Power_Failure_Hrs1 = '0:00';
		$Power_Failure_Hrs2 = '0:00';
		$Power_Failure_Hrs3 = '0:00';
		
		$Diesel_Consume1 = 0;
		$Diesel_Consume2 = 0;
		$Diesel_Consume3 = 0;
		
		$sitefilter = $uriSegments[4];
		
		$dateString = $segment2."-".$segment3."-01";
		$datefilter1 = date("t-m-Y", strtotime($dateString));
		$datefilter2 =   date("t-m-Y", strtotime($dateString." -1 month"));
		$datefilter3 =   date("t-m-Y", strtotime($dateString." -2 months"));
		
		$prev_omonth = date("m", strtotime($dateString." -1 month"));
		
		$prev_tmonth = date("m", strtotime($dateString." -2 months"));
		
		$dgset_pwrfailure1 = getmtdfms($datefilter1,$sitefilter,'dgset_pwrfailure');
		$dgset_pwrfailure2 = getmtdfms($datefilter2,$sitefilter,'dgset_pwrfailure');
		$dgset_pwrfailure3 = getmtdfms($datefilter3,$sitefilter,'dgset_pwrfailure');
		
		$dset_dieselconsume1 =  getmtdfms($datefilter1,$sitefilter,'dset_dieselconsume');
		$dset_dieselconsume2 =  getmtdfms($datefilter2,$sitefilter,'dset_dieselconsume');
		$dset_dieselconsume3 =  getmtdfms($datefilter3,$sitefilter,'dset_dieselconsume');
		
		$dgset_dieselfilled1 = getmtdfms($datefilter1,$sitefilter,'dgset_dieselfilled');
		$dgset_dieselfilled2 = getmtdfms($datefilter2,$sitefilter,'dgset_dieselfilled');
		$dgset_dieselfilled3 = getmtdfms($datefilter3,$sitefilter,'dgset_dieselfilled');
		
		$dgset_dgunits1 = getmtdfms($datefilter1,$sitefilter,'dgset_dgunits');
		$dgset_dgunits2 = getmtdfms($datefilter2,$sitefilter,'dgset_dgunits');
		$dgset_dgunits3 = getmtdfms($datefilter3,$sitefilter,'dgset_dgunits');
				
		

		$resullt = array();

		$image = "";

		$matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year, 'type' => 'graphs', 'title' => 'Water Consumtion']; 



		$resullt_cn = \App\Mmrmonthlyreport::where($matchfields_hskpact)->count();

		if($resullt_cn > 0){

			$resullt = \App\Mmrmonthlyreport::where($matchfields_hskpact)->first();

			$image = $resullt->before_image;

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
			
			'dgset_pwrfailure1' => $dgset_pwrfailure1,

			'dgset_pwrfailure2' => $dgset_pwrfailure2,

			'dgset_pwrfailure3' => $dgset_pwrfailure3,

			'dset_dieselconsume1' => $dset_dieselconsume1,

			'dset_dieselconsume2' => $dset_dieselconsume2,

			'dset_dieselconsume3' => $dset_dieselconsume3,

			'dgset_dieselfilled1' => $dgset_dieselfilled1,

			'dgset_dieselfilled2' => $dgset_dieselfilled2,

			'dgset_dieselfilled3' => $dgset_dieselfilled3,

			'dgset_dgunits1' => $dgset_dgunits1,

			'dgset_dgunits2' => $dgset_dgunits2,

			'dgset_dgunits3' => $dgset_dgunits3,

        ];  

	    $pdf = PDF::loadView('mmrreports.mmrdgpkwh', $relations);

		if($dgset_pwrfailure1>0 || $dgset_pwrfailure2>0 || $dgset_pwrfailure3>0  || $dgset_dieselfilled1>0  || $dgset_dieselfilled2>0  || $dgset_dieselfilled3>0  || $dgset_dgunits1>0  || $dgset_dgunits2>0  || $dgset_dgunits1>0) 
		{ 
			$pdf->save(storage_path('/mmrfiles/dggenerated.pdf'));
			$im = new \Imagick();
			$im->pingImage(storage_path() . '/mmrfiles/dggenerated.pdf');
			$omispdfFile12cCount =  $im->getNumberImages(); 
		}
		

		/*-----------------------------------------------Metro Water Consumption-----------------------------------------------*/

		$Power_Failure_Hrs1 = '0:00';
		$Power_Failure_Hrs2 = '0:00';
		$Power_Failure_Hrs3 = '0:00';
		
		$Diesel_Consume1 = 0;
		$Diesel_Consume2 = 0;
		$Diesel_Consume3 = 0;
		
		$sitefilter = $uriSegments[4];
		
		$dateString = $segment2."-".$segment3."-01";
		$datefilter1 = date("t-m-Y", strtotime($dateString));
		$datefilter2 =   date("t-m-Y", strtotime($dateString." -1 month"));
		$datefilter3 =   date("t-m-Y", strtotime($dateString." -2 months"));
		
		$prev_omonth = date("m", strtotime($dateString." -1 month"));
		
		$prev_tmonth = date("m", strtotime($dateString." -2 months"));
		
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
				
		

		$resullt = array();

		$image = "";

		$matchfields_hskpact = ['site' => $site, 'month' =>$month, 'year' => $year, 'type' => 'graphs', 'title' => 'Water Consumtion']; 



		$resullt_cn = \App\Mmrmonthlyreport::where($matchfields_hskpact)->count();

		if($resullt_cn > 0){

			$resullt = \App\Mmrmonthlyreport::where($matchfields_hskpact)->first();

			$image = $resullt->before_image;

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

        ];  

	    $pdf = PDF::loadView('mmrreports.mmr_water', $relations);

		if($Wsp_Metro1>0 || $Wsp_Metro2>0 || $Wsp_Metro3>0  || $Wsp_Bores1>0  || $Wsp_Bores2>0  || $Wsp_Bores3>0  || $Wsp_Tankers1>0  || $Wsp_Tankers2>0  || $Wsp_Tankers3>0   || $Wsp_Treatwater1>0  || $Wsp_Treatwater2>0  || $Wsp_Treatwater3>0) 
		{ 
			$pdf->save(storage_path('/mmrfiles/metrowaterconsumtion.pdf'));
			$im = new \Imagick();
			$im->pingImage(storage_path() . '/mmrfiles/metrowaterconsumtion.pdf');
			$omispdfFile12dCount =  $im->getNumberImages(); 
		}
		
			
			
		/*-------------------------------------------PAGE1-PPM - Vendor-----------------------------*/
		$resullt = array();

		$matchfields_hskpact = ['site' => $uriSegments[4], 'month' =>$month, 'year' => $year, 'type'=>'Vendor']; 

		$PlannedPreventives_Count = \App\Mmrppmreport::where($matchfields_hskpact)->count();

		if($PlannedPreventives_Count > 0){

			$resullt = \App\Mmrppmreport::where($matchfields_hskpact)->get();

		}

		$last_month = $month-1%12;

		$lstmn = ($last_month==0?'12':$last_month);

		$lyear =  ($last_month==0?($year-1):$year);

		$lresullt = array();

		$lmatchfields_hskpact = ['site' => $uriSegments[4], 'month' =>$lstmn, 'year' => $lyear, 'type'=>'Vendor']; 

		$PlannedPreventives_NCount = \App\Mmrppmreport::where($lmatchfields_hskpact)->count();

		if($PlannedPreventives_NCount > 0){

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

		$pdf = PDF::loadView('mmrreports.mmr_mmrplannedperventives', $relations);

		if($PlannedPreventives_Count>0 || $PlannedPreventives_NCount>0)
		{
		 	$pdf->save(storage_path('/mmrfiles/ppmvendor.pdf'));
			$im = new \Imagick();
			$im->pingImage(storage_path() . '/mmrfiles/ppmvendor.pdf');
			$omispdfFile14Count =  $im->getNumberImages(); 
		 }
			/*-------------------------------------------PAGE1-PPM - In-house-----------------------------*/
			
			$resullt = array();

		$matchfields_hskpact = ['site' => $uriSegments[4], 'month' =>$month, 'year' => $year, 'type'=>'Inhouse']; 

		$PlannedPreventives_InCount = \App\Mmrppmreport::where($matchfields_hskpact)->count();

		if($PlannedPreventives_InCount > 0){

			$resullt = \App\Mmrppmreport::where($matchfields_hskpact)->get();

		}

		$last_month = $month-1%12;

		$lstmn = ($last_month==0?'12':$last_month);

		$lyear =  ($last_month==0?($year-1):$year);

		$lresullt = array();

		$lmatchfields_hskpact = ['site' => $uriSegments[4], 'month' =>$lstmn, 'year' => $lyear, 'type'=>'Inhouse']; 

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

			'lresval' => $lresullt

        ];  

		$pdf = PDF::loadView('mmrreports.mmr_mmrinplannedperventives', $relations);
		if($PlannedPreventives_InCount>0 || $PlannedPreventives_INNCount>0)
		{ 
			$pdf->save(storage_path('/mmrfiles/ppminhouse.pdf'));
			$im = new \Imagick();
			$im->pingImage(storage_path() . '/mmrfiles/ppminhouse.pdf');
			$omispdfFile15Count =  $im->getNumberImages(); 
		}

			


			
			
			
			/*-------------------------------------------PAGE1-Water Test Reports-----------------------------*/
			
			
			$wsp_cres = array();

			$wsp_cres1 = array();
	
			$wsp_match = ['month' => $month, 'year' => $year, 'site' => $uriSegments[4]]; 
	
			$Wspinlet_Count = \App\Wspmtreport::where($wsp_match)->count();
	
			if($Wspinlet_Count > 0){
	
				$wsp_cres = \App\Wspmtreport::where($wsp_match)->first();
	
			}
	
			$wsp_match1 = ['month' => $month, 'year' => $year, 'site' => $uriSegments[4]]; 
	
			$Wspoutlet_Count = \App\Wspmotreport::where($wsp_match1)->count();
	
			if($Wspoutlet_Count > 0){
	
				$wsp_cres1 = \App\Wspmotreport::where($wsp_match1)->first();
	
			}
			$relations = [		 
	
	
	
				'report_on' => date($year."-".$month."-t"),
	
				'report_year' => $year,
	
				'report_month' => $month,
	
				'monthname' => date("F", mktime(0, 0, 0, $month, 10)),
	
				'pbasys' => $wsp_cres,
	
				'pbasys1' => $wsp_cres1,
	
				'sitename' => get_sitename($site)
	
				];
	
	
	
			$pdf = PDF::loadView('mmrreports.mmr_wsp_inlet', $relations);
	
			
	
			if($Wspinlet_Count>0) 
			{ 		
				$pdf->save(storage_path('/mmrfiles/wspinlet.pdf'));
				$im = new \Imagick();
				$im->pingImage(storage_path() . '/mmrfiles/wspinlet.pdf');
				$omispdfFile17aCount =  $im->getNumberImages(); 
			}
			
	
			$pdf = PDF::loadView('mmrreports.mmr_wsp_outlet', $relations);
	
	
	
			if($Wspoutlet_Count>0)
			{
				 $pdf->save(storage_path('/mmrfiles/wspoutlet.pdf'));
				 $im = new \Imagick();
				 $im->pingImage(storage_path() . '/mmrfiles/wspoutlet.pdf');
				 $omispdfFile17bCount =  $im->getNumberImages();  
			}
			
			
			
			$wsp_cres = array();

			$wsp_cres1 = array();
	
			$wsp_match = ['month' => $month, 'year' => $year, 'site' => $uriSegments[4]]; 
	
			$Stpinlet_Count = \App\Stpintreport::where($wsp_match)->count();
	
			if($Stpinlet_Count > 0){
	
				$wsp_cres = \App\Stpintreport::where($wsp_match)->first();
				
	
			}
	
			$wsp_match1 = ['month' => $month, 'year' => $year, 'site' => $uriSegments[4]]; 
	
			$Stpoutlet_Count = \App\Stpoutreport::where($wsp_match1)->count();
	
			if($Stpoutlet_Count > 0){
	
				$wsp_cres1 = \App\Stpoutreport::where($wsp_match1)->first();
	
			}
	
			
	
			$relations = [		 
	
	
	
				'report_on' => date($year."-".$month."-t"),
	
				'report_year' => $year,
	
				'report_month' => $month,
	
				'monthname' => date("F", mktime(0, 0, 0, $month, 10)),
	
				'pbasys' => $wsp_cres,
	
				'pbasys1' => $wsp_cres1,
	
				'sitename' => get_sitename($site)
	
				];
	
	
	
			$pdf = PDF::loadView('mmrreports.mmr_stp_inlet', $relations);
	
			
	
			if($Stpinlet_Count>0)
			{  		
				$pdf->save(storage_path('/mmrfiles/stpinlet.pdf'));
				$im = new \Imagick();
				$im->pingImage(storage_path() . '/mmrfiles/stpinlet.pdf');
				$omispdfFile17cCount =  $im->getNumberImages(); 
			}
	
			
	
			$pdf = PDF::loadView('mmrreports.mmr_stp_outlet', $relations);
	
	
	
			if($Stpoutlet_Count>0) 
			{ 
				$pdf->save(storage_path('/mmrfiles/stpoutlet.pdf'));
				$im = new \Imagick();
				$im->pingImage(storage_path() . '/mmrfiles/stpoutlet.pdf');
				$omispdfFile17dCount =  $im->getNumberImages();
			}

		


			
			
			/*-----------------------------------------------Soft Services---------------------------------------*/
			
			
			
			
			/*-------------------------------------------PAGE1-Housekeeping Machinery Status-----------------------------*/
			
			$resullt = array();

			$matchfields_hskpact = ['site' => $uriSegments[4], 'month' =>$month, 'year' => $year, 'type'=>'hkcm']; 
	
			$HkCriticalMachinery_Count = \App\Mmrhkcmmonthlyreport::where($matchfields_hskpact)->count();
	
			if($HkCriticalMachinery_Count > 0){
		
				$resullt = \App\Mmrhkcmmonthlyreport::where($matchfields_hskpact)->get();
	
			}
	
			 $relations = [
	
				'year' => $year,
	
				'month' => $month, 
	
				'monthname' => date("F", mktime(0, 0, 0, $month, 10)),
	
				'sitename' => get_sitename($site),
	
				'site' => $site,
	
				'resval' => $resullt,
	
			];  
	
			$pdf = PDF::loadView('mmrreports.mmr_mmrhkcriticalmachinery', $relations);
			
			if($HkCriticalMachinery_Count>0)
			{
			 	$pdf->save(storage_path('/mmrfiles/hkcriticalmachinery.pdf')); 
				$im = new \Imagick();
				$im->pingImage(storage_path() . '/mmrfiles/hkcriticalmachinery.pdf');
				$omispdfFile18Count =  $im->getNumberImages(); 
			}

			
			/*-------------------------------------------PAGE1-Housekeeping Machinery Status-----------------------------*/
			
			$resullt = array();

			$matchfields_hskpact = ['site' => $uriSegments[4], 'month' =>$month, 'year' => $year, 'type'=>'housekeeping']; 
	
			$Housekeeping_Count = \App\Mmrhousekpact::where($matchfields_hskpact)->count();
	
			if($Housekeeping_Count > 0){
	
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
	
			$pdf = PDF::loadView('mmrreports.mmr_mmrsofthousekeeping', $relations);
	
			//$pdf->setPaper('A4', 'landscape');
	
			if($Housekeeping_Count>0)
			{
			 	$pdf->save(storage_path('/mmrfiles/housekeeping.pdf')); 
				$im = new \Imagick();
				$im->pingImage(storage_path() . '/mmrfiles/housekeeping.pdf');
				$omispdfFile19Count =  $im->getNumberImages(); 
			}
			
			/*-------------------------------------------PAGE1-Garbage Disposal-----------------------------*/
			/*-------------------------------------------PAGE1-Housekeeping Consumables-----------------------------*/
			$formfieldarray = array();
			$siteattrname = array();
			$flatres = array();
			$reportdate_val = "";
			$dateString = $segment2.'-'.$segment3.'-04';
			//Last date of current month.
			$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
			$lastdatearr = explode("-",$lastDateOfMonth);
			$reportdate_val = $lastdatearr[2]."-".$segment3."-".$segment2;
	
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
			
			  $mislist = $uriSegments[4];
			  $allsitesList = explode(",",$mislist);
			  $i=0;
			  foreach($sites_res_arr as $keys => $site){
				if (in_array($keys, $allsitesList)) 
				{
					$skarra[$i] = $keys;
					$i = $i+1;
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
	
			$matchfields = ['month' => $segment3, 'year' => $segment2]; 
	
			$res_count = \App\Housekpmisreport::where($matchfields)->count();
			
			if($res_count > 0)
			{
			
					$formfieldarray = \App\Housekpmisreport::where($matchfields)->get();
						
					 $existing_records = array();
					 foreach($formfieldarray  as $existing){
						$existing_records[$existing['site']] = $existing;
					 }
					
				  
				  
				 //  echo "<pre>"; print_r($existing_records);echo "</pre>";
					// exit; 
				  
				  $relations = [
					'res' => $formfieldarray,  
					'sites' => $siteattrname,
					'flats' => $flatres,
					'report_on' => $reportdate_val,
					'report_year' => $segment2,
					'report_month' => $segment3,
					'existing' => $existing_records,
					'cost' => $existing_Rates,
					'deployment' => $deployment, 
					];   
					  
		
				  //return view('misprints.housekeepingoneprint', $relations);
				  $housekppcn = 1;
				   
				  $pdf = PDF::loadView('misprints.housekeepingoneprint', $relations);  
				  
				  $pdf->setPaper('A4', 'landscape');
				   
				  $pdf->save(storage_path('/mmrfiles/omishousekeepingdownload.pdf')); 
						  
				  $im = new \Imagick();
				  $im->pingImage(storage_path() . '/mmrfiles/omishousekeepingdownload.pdf');
				  $omispdfFile21Count =  $im->getNumberImages(); 
			  }
			
			/*-------------------------------------------PAGE1-Pest control Activities-----------------------------*/
			
			$resullt = array();

			$matchfields_hskpact = ['site' => $uriSegments[4], 'month' =>$segment3, 'year' => $segment2]; 
			
	
			$Pets_Count = \App\Mmrpetreport::where($matchfields_hskpact)->count();
	
			if($Pets_Count > 0){
			
				$resullt = \App\Mmrpetreport::where($matchfields_hskpact)->get();
	
			}
	
			 $relations = [
	
				'year' => $year,
	
				'month' => $month, 
	
				'monthname' => date("F", mktime(0, 0, 0, $month, 10)),
	
				'sitename' => get_sitename($site),
	
				'site' => $site,
	
				'resval' => $resullt
			];  
	
			
	
			if($Pets_Count>0)
			{ 
				$pdf = PDF::loadView('mmrreports.mmr_mmrpets', $relations);
				$pdf->save(storage_path('/mmrfiles/pets.pdf'));
				$im = new \Imagick();
			  $im->pingImage(storage_path() . '/mmrfiles/pets.pdf');
			  $omispdfFile22Count =  $im->getNumberImages(); 
			}

		

		


			/*-------------------------------------------PAGE1-Horticulture Machinery Status-----------------------------*/
			
			$resullt = array();

			$matchfields_hskpact = ['site' => $uriSegments[4], 'month' =>$month, 'year' => $year, 'type'=>'hocm']; 
	
			$HkCriticalMachinery_Count = \App\Mmrhkcmmonthlyreport::where($matchfields_hskpact)->count();
	
			if($HkCriticalMachinery_Count > 0){
	
				$resullt = \App\Mmrhkcmmonthlyreport::where($matchfields_hskpact)->get();
	
			}
	
			 $relations = [
	
				'year' => $year,
	
				'month' => $month, 
	
				'monthname' => date("F", mktime(0, 0, 0, $month, 10)),
	
				'sitename' => get_sitename($site),
	
				'site' => $site,
	
				'resval' => $resullt,
	
				'HKMCount' => $HkCriticalMachinery_Count
	
			];  
	
			$pdf = PDF::loadView('mmrreports.mmr_mmrhocriticalmachinery', $relations);
	
			if($HkCriticalMachinery_Count>0){
				 $pdf->save(storage_path('/mmrfiles/hocriticalmachinery.pdf'));
				 $im = new \Imagick();
				 $im->pingImage(storage_path() . '/mmrfiles/hocriticalmachinery.pdf');
				 $omispdfFile23Count =  $im->getNumberImages(); 
			}

			
			/*-------------------------------------------PAGE1-Horticulture Activities-----------------------------*/
			$resullt = array();

			$matchfields_hskpact = ['site' => $uriSegments[4], 'month' =>$month, 'year' => $year, 'type'=>'horticulture']; 
	
			$Horticulture_Count = \App\Mmrhousekpact::where($matchfields_hskpact)->count();
	
			if($Horticulture_Count > 0){
	
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
	
			$pdf = PDF::loadView('mmrreports.mmr_mmrsofthorticulture', $relations);
	
			//$pdf->setPaper('A4', 'landscape');
	
			if($Horticulture_Count>0)
			{
			 	$pdf->save(storage_path('/mmrfiles/horticulture.pdf')); 
				$im = new \Imagick();
				$im->pingImage(storage_path() . '/mmrfiles/horticulture.pdf');
				$omispdfFile24Count =  $im->getNumberImages(); 
			}
			/*-------------------------------------------PAGE1-Horticulture Consumables-----------------------------*/
			
			$formfieldarray = array();
			$siteattrname = array();
			$flatres = array(); 
			$reportdate_val = "";
			$dateString = $segment2.'-'.$segment3.'-04';
			//Last date of current month.
			$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
			$lastdatearr = explode("-",$lastDateOfMonth);
			$reportdate_val = $lastdatearr[2]."-".$segment3."-".$segment2;
	
			   if(Auth::user()->id == 1){
			  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('name', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('name', 'ASC')->get()->pluck('name', 'id');
			  $flatres = \App\Pmsdailyreportvalidation::get()->pluck('flats', 'site');
			  
			   
			  }else{ 

			$role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('name', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('name', 'ASC')->get()->pluck('name', 'id');
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

		$matchfields = ['month' => $segment3, 'year' => $segment2]; 

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
				$existing_records['cyhalothrinltrs'][$existing['site']] = $existing['cyhalothrinltrs'];
				$existing_records['effinity'][$existing['site']] = $existing['effinity'];
				
			 }
			
		  }
		  
		   $skarra= array();
		   $siteattrnamenew = $siteattrname;
		   $mislist = $uriSegments[4];	
		   if($mislist==9 || $mislist==15 || $mislist==13 || $mislist==11 || $mislist==19 || $mislist==20  || $mislist==87 || $mislist==8 || $mislist==5  || $mislist==14   || $mislist==7 || $mislist==18 || $mislist==20 || $mislist==12 || $mislist==17)
		   {
			  $allsitesList = explode(",",$mislist);
			  $i=0;
			  foreach($sites_res_arr as $keys => $site){
				if (in_array($keys, $allsitesList)) 
				{
					$skarra[$i] = $keys;
					$i = $i+1;
					$acount = $i;
				}
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
		  
		    $matchhuskpfields = ['month' => $segment3, 'year' => $segment2, 'site' => $sk];
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
				$existing_records['cyhalothrinltrs'][$sk] = $hsk_arr['cyhalothrinltrs'];
				$existing_records['effinity'][$sk] = $hsk_arr['effinity'];
				
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
				$existing_records['cyhalothrinltrs'][$sk] = ""; 
				$existing_records['effinity'][$sk] = "";   
				
				
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
		  $siteattrnamenew_one = array();
		  $mislist = $uriSegments[4];	
		  if($mislist==9 || $mislist==15 || $mislist==13 || $mislist==11 || $mislist==19 || $mislist==20  || $mislist==87)
		  {
			  $allsitesList = explode(",",$mislist);
			  $i=0;
			  foreach($siteattrname as $keys => $site){
				if (in_array($keys, $allsitesList)) 
				{
					$skarra[$i] = $keys;
					$i = $i+1;
				}
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
		  
		    $matchhuskpfields = ['month' => $segment3, 'year' => $segment2, 'site' => $sk];
			 if (in_array($sk, $allsitesList)) 
			 {
				 $existing_records_two['sites'][$sk] = get_sitename($sk);
				 $hsk_count = \App\Horticulturemisreport::where($matchhuskpfields)->count();
				 if($hsk_count > 0)
				 {
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
					
				 }
				 else
				 {
					
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
			    $siteattrnamenew_two = array();	  
				  $mislist = $uriSegments[4];
				  if($mislist==18 || $mislist==8 || $mislist==5 || $mislist==14 || $mislist==7 || $mislist==12)
				  {
					  $allsitesList = explode(",",$mislist);
					  $i=0;
					  foreach($siteattrname as $keys => $site){
						if (in_array($keys, $allsitesList)) 
						{
							$skarra[$i] = $keys;
							$i = $i+1;
						}
					  }	
				 } 
				
				$sites_res_arr_res = array();
				foreach($skarra as $kv){
				$sites_res_arr_res[$kv] = $siteattrname[$kv];
				}
				$siteattrnamenew_two = $sites_res_arr_res;  
			//	}
				
		     foreach($siteattrnamenew_two as $sk => $sitena)
			 {
		     $matchhuskpfields = ['month' => $segment3, 'year' => $segment2, 'site' => $sk];
			 if (in_array($sk, $allsitesList)) 
			 {
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
			'report_year' => $segment2,
			'report_month' => $segment3,
			'existing' => $existing_records,
			'existing_two' => $existing_records_two,
			'existing_three' => $existing_records_three,
			'cost' => $existing_Rates, 
			'deployment' => $deployment, 
			];   
			
			if(count($existing_records_two)>0 || count($existing_records_three)>0)
			{
		 //  return view('misfiles.view.horticulturepestone', $relations);
		   
		    $pdf = PDF::loadView('misprints.horticulturereportprintone', $relations);  

         // return $pdf->download('horticulture.pdf');   
		
	/*	 $monthName = date('F', mktime(0, 0, 0, $segment4, 10));   
			   $fnam = 'HorticultureReport'.$monthName."_".$segment3.".pdf";
			  return $pdf->download($fnam);  */
			  
			    //$pdf->setPaper('A4', 'landscape'); 
				
				  $pdf->save(storage_path('/mmrfiles/omisreportonhorticulture.pdf')); 
				  
				  $horticulpcn = 5;
			// END HORTICULTURE
			
			
			$im = new \Imagick();
			$im->pingImage(storage_path() . '/mmrfiles/omisreportonhorticulture.pdf');
			$omispdfFile26aCount =  $im->getNumberImages();
			} 
			
			
			/*-----------------------------------------------Security Services---------------------------------------*/
			
			/*----------------------------------REPORT Elevel Start (Daily Security Data)-----------------------------------------*/
			
			$formfieldarray = array();
			$siteattrname = array();
			$flatres = array();
			$reportdate_val = "";
			$dateString = $segment2.'-'.$segment3.'-04';
			//Last date of current month.
			$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
			$lastdatearr = explode("-",$lastDateOfMonth);
			$reportdate_val = $lastdatearr[2]."-".$segment3."-".$segment2;
	
			  if(Auth::user()->id == 1){
			  $sitenames = \App\Sites::where('status', '=', '1')->orderBy('name', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
			  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('name', 'ASC')->get()->pluck('name', 'id');
			  $borewellsnum = \App\Dailyreportvalidation::get()->pluck('borewellsnum', 'site');
			  $sites_res_arr = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			  
			  
			  }else{
	
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
			  $existing_records = array();
			  $existing_Rates = array();
			  
			
			  
			$relations = [  
				'res' => $formfieldarray, 
				'sites' => $siteattrname,
				'borewellsnum' => $borewellsnum,
				'report_on' => $reportdate_val,
				'report_year' => $segment2,
				'report_month' => $segment3,
				'existing' => $existing_records,
				];    
	
			
	
			$matchfields = ['month' => $segment3, 'year' => $segment2]; 
	
			//$res_count = \App\Securitymisreport::where($matchfields)->count();
			
			 $res_count =  Securitymisreport::select('securitymisreports.*')->leftJoin('sites','sites.id','=','securitymisreports.site')->orderBy('sites.name', 'ASC')->where($matchfields)->count();
			
			if($res_count > 0){
			
				$formfieldarray = Securitymisreport::select('securitymisreports.*')->leftJoin('sites','sites.id','=','securitymisreports.site')->orderBy('sites.name', 'ASC')->where($matchfields)->get();
				
				  $exist_Sec = array();
				  $exist_SecTwo = array();
				 if(count($formfieldarray) > 0){
					 foreach($formfieldarray as $fieldarr){
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
								//$reportdate_val = $lastDateOfMonth."-".$segment3."-".$segment2;
								
								$reportdate_val = $segment2."-".$segment3."-".$lastDateOfMonth;
								
								$security_match_fields = ['site' => $fieldarr->site,'reporton' => $reportdate_val];
								
								$prev_sec_report_cn = \App\Securitydailyreport::where($security_match_fields)->count();
								 
								$eqpmatchfields = ['site' => $fieldarr->site]; 
								$equipcn = \App\Securitydailyreportvalidation::where($eqpmatchfields)->count();
								 if($equipcn > 0){
									$equipvalidation = \App\Securitydailyreportvalidation::where($eqpmatchfields)->first();
								  } 
						 
						 
						 /* $mis_sites_list = Misreportselectedsite::where('reportname', '=', 'Security_Report2')->first();
						  if($mis_sites_list) $mislist = $mis_sites_list['slist'];		  
						  else $mislist = "8,19,14,5,7,16,17,18";
						  */
						  $mislist = $uriSegments[4];
						  
						  if($mislist==8 || $mislist==19 || $mislist==14 || $mislist==5 || $mislist==7 || $mislist==16 || $mislist==17 || $mislist==18)
						  {
						  
							  $allsitesList = explode(",",$mislist);
							  if(in_array($fieldarr->site, $allsitesList))
							  {
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
						  }
								
						 } else
						 	/* $mis_sites_list = Misreportselectedsite::where('reportname', '=', 'Security_Report1')->first();
							  if($mis_sites_list) $mislist = $mis_sites_list['slist'];	
							  else $mislist = "11,12,20,87,9,15";*/
							  
							  $mislist = $uriSegments[4];
							  if($mislist==11 || $mislist==12 || $mislist==20 || $mislist==87 || $mislist==9 || $mislist==15 || $mislist==95  || $mislist==99)
			  				  {
								  
								  $allsitesList = explode(",",$mislist);
								  if(in_array($fieldarr->site, $allsitesList))
								  {
						 
									 $exist_SecTwo['sites'][$fieldarr->site] = get_sitename($fieldarr->site);
									 $exist_SecTwo['guards'][$fieldarr->site] = $fieldarr->guards;
									 $exist_SecTwo['l_guards'][$fieldarr->site] = $fieldarr->l_guards;
									 $exist_SecTwo['h_guards'][$fieldarr->site] = $fieldarr->h_guards;
									 $exist_SecTwo['supervisors'][$fieldarr->site] = $fieldarr->supervisors;
									 $exist_SecTwo['aso'][$fieldarr->site] = $fieldarr->aso;
									 $exist_SecTwo['so_num'][$fieldarr->site] = $fieldarr->so_num;
									 $exist_SecTwo['nalla_gandla_hub'][$fieldarr->site] = $fieldarr->nalla_gandla_hub;
									 $exist_SecTwo['hillpark_hub'][$fieldarr->site] = $fieldarr->hillpark_hub;						 
									 $exist_SecTwo['computers_num'][$fieldarr->site] = $fieldarr->computers_num;
									 $exist_SecTwo['bicycle_num'][$fieldarr->site] = $fieldarr->bicycle_num;
						 
									 $exist_SecTwo['ctotval'][$fieldarr->site] = (float)$fieldarr->guards + (float)$fieldarr->l_guards + (float)$fieldarr->h_guards + (float)$fieldarr->supervisors + (float)$fieldarr->aso + (float)$fieldarr->so_num + (float)$fieldarr->nalla_gandla_hub;
						  
						 
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
					 }   
					 
					//echo "<pre>"; print_r($exist_SecTwo);echo "</pre>";
				 }  
				 
				 //exit;
				 $sitearrname1 = $siteattrname;
				 $sitearrname2 = $siteattrname;
				 $skarra= array();
			  //if(Auth::user()->id == 1){
			  
				$skarra= array();
				/*$mis_sites_list = Misreportselectedsite::where('reportname', '=', 'Security_Report2')->first();
				  if($mis_sites_list) $mislist = $mis_sites_list['slist'];		  
				  else $mislist = "8,19,14,5,7,16,17,18";*/	
				  
				  $mislist = $uriSegments[4];	
				  if($mislist==8 || $mislist==19 || $mislist==14 || $mislist==5 || $mislist==7 || $mislist==16 || $mislist==17 || $mislist==18)
				  {  	  
				  $allsitesList = explode(",",$mislist);
				  $i=0;
				  foreach($sites_res_arr as $keys => $site){
					if (in_array($keys, $allsitesList)) 
					{
						$skarra[$i] = $keys;
						$i = $i+1;
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
			
			}
			  
			$skarranew= array();
			/*$mis_sites_list = Misreportselectedsite::where('reportname', '=', 'Security_Report1')->first();
			  if($mis_sites_list) $mislist = $mis_sites_list['slist'];		  
			  else $mislist = "11,12,20,87,9,15";	*/
			  $mislist = $uriSegments[4];	  
			  if($mislist==11 || $mislist==12 || $mislist==20 || $mislist==87 || $mislist==9 || $mislist==15 || $mislist==95  || $mislist==99)
			  {
				  $allsitesList = explode(",",$mislist);
				  $i=0;
				  foreach($sites_res_arr as $keys => $site){
					if (in_array($keys, $allsitesList)) 
					{
						$skarranew[$i] = $keys;
						$i = $i+1;
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
					 if(isset($sites_res_arr[$kv])) {
					$sites_res_arr_res2[$kv] = $sitearrname2[$kv];
					} 
				  }
				   $sitearrname2 = $sites_res_arr_res2;  
				 
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
			}
				
			$exist_Sec_Secu = $exist_Sec;
			$exist_SecTwo_Secu = $exist_SecTwo;
				
				$relations = [
				'res' => $formfieldarray,  
				'sites' => $siteattrname,
				'borewellsnum' => $borewellsnum,
				'report_on' => $reportdate_val,
				'report_year' => $segment2,
				'report_month' => $segment3,
				'existing' => $existing_records,
				'existsec' => $exist_Sec,
				'existsectwo' => $exist_SecTwo,
				];     
				  
			 }
		    $securepcn = 2;
		    $pdf = PDF::loadView('misprints.missecurityoneprint', $relations);  
		    $pdf->save(storage_path('/mmrfiles/omisdailysecuritydata.pdf')); 
			
			
			$im = new \Imagick();
			$im->pingImage(storage_path() . '/mmrfiles/omisdailysecuritydata.pdf');
			$omispdfFile26Count =  $im->getNumberImages(); 
			
			
			/*----------------------------------REPORT Elevel End (Daily Security Data)-----------------------------------------*/
			
			
			/*-------------------------------------------Security report-----------------------------*/
			/*-------------------------------------------Traffic Movement-----------------------------*/
			
			
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
			$skarra= array();
			  $site = $uriSegments[4];
			  $mislist =$site;  
			  $allsitesList = explode(",",$site);
			  $i=0;
			  foreach($sites_res_arr as $keys => $site){
				if (in_array($keys, $allsitesList)) 
				{
					$skarra[$i] = $keys;
					$i = $i+1;
				}
			  }	
			  
			  $sites_res_arr_res = array();
			  foreach($skarra as $kv){
			   if(isset($sites_res_arr[$kv])) {
				$sites_res_arr_res[$kv] = $siteattrname[$kv];
				}
			  }
			   $siteattrname = $sites_res_arr_res;  
			  
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
							$temp_vendors = (float)$temp_vendors + (float)$getsiteMetro->tr_temp_vendors;  
							$courier_delivery = (float)$courier_delivery + (float)$getsiteMetro->tr_courier_delivery;  
							$visitors = (float)$visitors + (float)$getsiteMetro->tr_visitors;  
							$construc_team = (float)$construc_team + (float)$getsiteMetro->tr_construction;  
							$interworks_inflats = (float)$interworks_inflats + (float)$getsiteMetro->tr_inter_works;  
							$interior_works_per_day = (float)$interior_works_per_day + (float)$getsiteMetro->tr_interior_works_perday; 	
						}   
					}
					$rvehicle[$ke] = $resident_vehicle;
					$vendors[$ke] = $temp_vendors;
					$cdelivery[$ke] = $courier_delivery;
					$cvisitors[$ke] = $visitors;
					$cteam[$ke] = $construc_team;
					$inflats[$ke] = $interworks_inflats;
					$interior_works[$ke] = $interior_works_per_day;
				}
			
			
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
			 
				  
				$trafficpcn = 1;
				$pdf = PDF::loadView('misprints.mistrafficprint', $relations);
				$pdf->save(storage_path('/mmrfiles/omistrafficmovement.pdf')); 
				
				
				$im = new \Imagick();
				$im->pingImage(storage_path() . '/mmrfiles/omistrafficmovement.pdf');
				$omispdfFile27Count =  $im->getNumberImages(); 
				//if($omispdfFile12Count>0) $tmismmrfilesCount = $tmismmrfilesCount+$omispdfFile12Count;
			
			
			/*----------------------------------REPORT Twelve End (Traffic movement Data)-----------------------------------------*/
			
			
			
			/*-----------------------------------------------General---------------------------------------*/
			
			
			
			/*-------------------------------------------Initiative / Pro-active-----------------------------*/
			
			$resullt = array();



		$matchfields_hskpact = ['site' => $uriSegments[4], 'month' =>$month, 'year' => $year,'type' => 'initiative']; 

		$Initiative_Count = \App\Mmrhousekpact::where($matchfields_hskpact)->count();

		if($Initiative_Count > 0){

			$resullt = \App\Mmrhousekpact::where($matchfields_hskpact)->get();

			//$technicalServices_Count = $technicalServices_Count+1;

		}

		 $relations = [

			'year' => $year,

			'month' => $month, 

			'monthname' => date("F", mktime(0, 0, 0, $month, 10)),

			'sitename' => get_sitename($site),

			'site' => $site,

			'resval' => $resullt

        ];  

		 $pdf = PDF::loadView('mmrreports.mmr_initiative', $relations);

			if($Initiative_Count>0) {
			 	$pdf->save(storage_path('/mmrfiles/initiative.pdf')); 
				$im = new \Imagick();
			    $im->pingImage(storage_path() . '/mmrfiles/initiative.pdf');
			    $omispdfFile28Count =  $im->getNumberImages(); 
			}

			
			
			/*-------------------------------------------Occupancy Report-----------------------------*/
			
			$formfieldarray = array();
			$siteattrname = array();
			$flatres = array();
			$reportdate_val = "";
			$dateString = $segment2.'-'.$segment3.'-04';
			//Last date of current month.
			$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
			$lastdatearr = explode("-",$lastDateOfMonth);
			$reportdate_val = $lastdatearr[2]."-".$segment3."-".$segment2;
	
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
				'report_year' => $segment2,
				'report_month' => $segment3,
				'existing' => $existing_records,
				'cost' => $existing_Rates,
				];  
				
			
			  $skarra= array();	  
			  $mislist = $uriSegments[4];		 
			  $allsitesList = explode(",",$mislist);
			  $i=0;
			  foreach($sites_res_arr as $keys => $site){
				if (in_array($keys, $allsitesList)) 
				{
					$skarra[$i] = $keys;
					$i = $i+1;
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
			  foreach($siteattrname as $kk => $siter)
			  {
			 
				$dateString = $segment2.'-'.$segment3.'-01';
				//Last date of current month.
				$lastDateOfMonth = date("t", strtotime($dateString));
				$reporton = $lastDateOfMonth."-".$segment3."-".$segment2;
				$reporton = $segment2."-".$segment3."-".$lastDateOfMonth;
			
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
			'report_year' => $segment2,
			'report_month' => $segment3,
			'existing' => $existing_records,
			'cost' => $existing_Rates,
			
			];     
			 
	 		
			// return view('misprints.occupancyprint', $relations);
		 	$omisoccupancyCount = $occres_cn;
			if($omisoccupancyCount>0)
			{
			   $pdf = PDF::loadView('misprints.occupancyprint', $relations);
			   $pdf->setPaper('A4', 'landscape');
			   $pdf->save(storage_path('/mmrfiles/omisoccupancy_rdetails.pdf')); 
			   //$pdf->setPaper('A4', 'landscape'); 
			   $im = new \Imagick();
			   $im->pingImage(storage_path() . '/mmrfiles/omisoccupancy_rdetails.pdf');
			   $omispdfFile29Count =  $im->getNumberImages(); 
			   //if($omispdfFile16Count>0) $tmispdfFilesCount = $tmispdfFilesCount+$omispdfFile16Count;
			}
			
			/*----------------------------------REPORT Sixteen End (Occupancy Data Download)-----------------------------------------*/
			
			/*----------------------------------REPORT Seventeen End (Indented Material Status)-----------------------------------------*/
			$formfieldarray = array();
			$siteattrname = array();
			$flatres = array();
			$reportdate_val = "";
			$dateString = $segment2.'-'.$segment3.'-04';
			//Last date of current month.
			$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
			$lastdatearr = explode("-",$lastDateOfMonth);
			$reportdate_val = $lastdatearr[2]."-".$segment3."-".$segment2;
	
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
				'report_year' => $segment2,
				'report_month' => $segment3,
				'existing' => $existing_records,
				'cost' => $existing_Rates,
				];    
	
			
			
			$matchfields = ['month' => $segment3, 'year' => $segment2]; 
	
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
				 
				  $skarra= array();
				  $mislist = $uriSegments[4];		  
				  $allsitesList = explode(",",$mislist);
				  $i=0;
				  foreach($sites_res_arr as $keys => $site){
					if (in_array($keys, $allsitesList)) 
					{
						$skarra[$i] = $keys;
						$i = $i+1;
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
				 
				 foreach($siteattrname as $stk => $siten) {
				 
				  $match_in_fields = ['month' => $segment3, 'year' => $segment2, 'site' =>$stk]; 
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
				'report_year' => $segment2,
				'report_month' => $segment3,
				'existing' => $existing_records,
				'indentrep' => $indentrep_Array,
				'cost' => $existing_Rates,
				'laggeddate' => $lagged_date,
				'recordcount' => $Recordcount,
				];   
				
				 
				  $omismindentedCount = 0;
				  foreach ($indentrep_Array as $k => $indrec){
					 if (count($indrec) > 0){
						$omismindentedCount = $omismindentedCount + 1;
					 }
				 }
				 if($omismindentedCount > 0) 
				{
				   $pdf = PDF::loadView('misprints.materialindented', $relations);
				   //$pdf->setPaper('A4', 'landscape'); 
				   $pdf->save(storage_path('/mmrfiles/omismaterialindented.pdf')); 
				   $im = new \Imagick();
				   $im->pingImage(storage_path() . '/mmrfiles/omismaterialindented.pdf');
				   $omispdfFile29bCount =  $im->getNumberImages(); 
			  	}
			
			/*-------------------------------------------Club House Usage-----------------------------*/
			
			$formfieldarray = array();
			$siteattrname = array();
			$flatres = array();
			$avg_swimpool_per_res = array();
			$avg_gym_per_res = array();
			$avg_tennis_per_res = array();
			$avg_badminton_per_res = array();
			$avg_occupan_res = array();
			$swimpool_res_Arr = array();
			$gym_res_Arr = array();
			$tennis_res_Arr = array();
			$badminton_res_Arr = array();
			$reportdate_val = "";
			$dateString = $segment2.'-'.$segment3.'-04';
			//Last date of current month.
			$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
			$lastdatearr = explode("-",$lastDateOfMonth);
			$reportdate_val = $lastdatearr[2]."-".$segment3."-".$segment2;
	
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
			  $mislist = $uriSegments[4];		  
			  $allsitesList = explode(",",$mislist);
			  $i=0;
			  foreach($sites_res_arr as $keys => $site){
				if (in_array($keys, $allsitesList)) 
				{
					$skarra[$i] = $keys;
					$i = $i+1;
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
				'report_year' => $segment2,
				'report_month' => $segment3,
				'existing' => $existing_records,
				'cost' => $existing_Rates,
				];    
	
			 
	
			$matchfields = ['month' => $segment3, 'year' => $segment2]; 
	
			$res_count = \App\Clubutilizationmisreport::where($matchfields)->count();
			
			if($res_count > 0){
			
				$formfieldarray = \App\Clubutilizationmisreport::where($matchfields)->get();
				
				
				 if(count($formfieldarray) > 0){
					 foreach($formfieldarray as $fieldarr){
						 $existing_records[$fieldarr->site] = array("id"=>$fieldarr->id,"avg_occupancy"=>$fieldarr->avg_occupancy,"avg_daily_swim"=>$fieldarr->avg_daily_swim,"avg_daily_gym"=>$fieldarr->avg_daily_gym,'occ_flat_swim' =>$fieldarr->occ_flat_swim,'occ_gym_swim' =>$fieldarr->occ_gym_swim);
					 } 
				   }  
				 }
				 //exit;
				 
				 
					 foreach($siteattrname as $kk => $siteval){
				 
						$owners = 0; 
						$tenents = 0; 
						
					$year = $segment2;
					$month = $segment3;
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
					$tennis = 0;
					$badminton = 0;
					if($getavg_info_count > 0){
					$getavg_info_res = \App\Pmsdailyreport::where('reporton','>=',$stdate)->where('reporton','<=',$endate)->where('site','=',$site)->get();
					
					foreach($getavg_info_res as $rowres){
					$swimpool += (float)$rowres->clbhous_users_pool;
					$gym += (float)$rowres->clbhous_users_gym;
					$tennis += (float)$rowres->clbhous_users_tennis;
					if($rowres->clbhous_shuttle!="") $badminton += (float)$rowres->clbhous_shuttle;
					}
					}
					$day_cn=cal_days_in_month(CAL_GREGORIAN,$month,$year);
					
					
					$avg_gym = round((float)($gym/$day_cn));
					$avg_swimpool = round((float)($swimpool/$day_cn));
					$avg_tennis = round((float)($tennis/$day_cn));
					$avg_badminton= round((float)($badminton/$day_cn));
					$av_occ = round((float)(($owners + $tenents)/2));
					$avg_swimpool_per = 0;
					$avg_gym_per = 0;
					$avg_tennis_per = 0;
					$avg_badminton_per = 0;
					if($av_occ > 0){
					$avg_swimpool_per = round(($avg_swimpool * 100)/($av_occ));
					$avg_gym_per = round(($avg_gym * 100)/($av_occ));
					$avg_tennis_per = round(($avg_tennis * 100)/($av_occ));
					$avg_badminton_per = round(($avg_badminton * 100)/($av_occ));
					}
					 
					$avg_swimpool_per_res[$kk] = $avg_swimpool_per;
					$avg_gym_per_res[$kk] = $avg_gym_per;
					$avg_tennis_per_res[$kk] = $avg_tennis_per;
					$avg_badminton_per_res[$kk] = $avg_badminton_per;
					$avg_occupan_res[$kk] = $av_occ;
					$swimpool_res_Arr[$kk] = $avg_swimpool;
					$gym_res_Arr[$kk] = $avg_gym;
					$tennis_res_Arr[$kk] = $avg_tennis;
					$badminton_res_Arr[$kk] = $avg_badminton;
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
				'report_year' => $segment2,
				'report_month' => $segment3,
				'existing' => $existing_records,
				'cost' => $existing_Rates,
				'swimpoll_per' => $avg_swimpool_per_res,
				'gym_per' => $avg_gym_per_res,
				'tennis_per' => $avg_tennis_per_res,
				'badminton_per' => $avg_badminton_per_res,
				'avgoccuapncy' => $avg_occupan_res,
				'swimpoll_res' => $swimpool_res_Arr,
				'gym_res' => $gym_res_Arr,
				'tennis_res' => $tennis_res_Arr,
				'badminton_res' => $badminton_res_Arr,
	
				];     
			
			// return view('misprints.clubhouseprint', $relations);
			
			 $omisclubhouseCount = count($formfieldarray);
			 
			 if($omisclubhouseCount>0)
			 {
			   $pdf = PDF::loadView('misprints.clubhouseprint', $relations);
			   $pdf->setPaper('A4', 'landscape'); 
			   $pdf->save(storage_path('/mmrfiles/omisclubhouseutilization.pdf')); 
			   $im = new \Imagick();
			   $im->pingImage(storage_path() . '/mmrfiles/omisclubhouseutilization.pdf');
			   $omispdfFile30Count =  $im->getNumberImages(); 
			}
			
			/*-------------------------------------------Violations-----------------------------*/
			
			/*---------------------------------Violations------------------------------------*/	
			

			$resullt = array();
	
			$matchfields_hskpact = ['site' => $uriSegments[4], 'month' =>$month, 'year' => $year, 'type'=>'violation']; 
	
			$Violation_Count = \App\Mmrmonthlyreport::where($matchfields_hskpact)->count();
	
	
	
			if($Violation_Count > 0){
	
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
	
			if($Violation_Count>0)
			{ 
				$pdf->save(storage_path('/mmrfiles/violation.pdf'));
				$im = new \Imagick();
			    $im->pingImage(storage_path() . '/mmrfiles/violation.pdf');
			    $omispdfFile31Count =  $im->getNumberImages(); 
			}
		
		
			/*-------------------------------------------Suggestions-----------------------------*/
			
			$resullt = array();

			$matchfields_hskpact = ['site' => $uriSegments[4], 'month' =>$month, 'year' => $year, 'type'=>'suggestion']; 
	
			$Suggestions_Count = \App\Mmrmonthlyreport::where($matchfields_hskpact)->count();
	
			if($Suggestions_Count > 0)
			{
		
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
			if($Suggestions_Count>0) 
			{
				$pdf->save(storage_path('/mmrfiles/suggestion.pdf'));
				$im = new \Imagick();
			    $im->pingImage(storage_path() . '/mmrfiles/suggestion.pdf');
			    $omispdfFile32Count =  $im->getNumberImages(); 
			}

			
			/*-------------------------------------------Indents/Requisitions-----------------------------*/

			$resulltrequistion = array();
		
			$matchfields_hskpact = ['site' => $uriSegments[4], 'month' =>$month, 'year' => $year, 'type'=>'indentreq']; 
		
			$Requisition_Count = \App\Mmrmonthlyreport::where($matchfields_hskpact)->count();
		
			if($Requisition_Count > 0)
			{
			
					$resulltrequistion = \App\Mmrmonthlyreport::where($matchfields_hskpact)->get();
		
				}
		
				 $relations = [
		
					'year' => $year,
		
					'month' => $month, 
		
					'monthname' => date("F", mktime(0, 0, 0, $month, 10)),
		
					'sitename' => get_sitename($site),
		
					'site' => $site,
		
					'resulltrequistion' => $resulltrequistion
		
				];  
		
				$pdf = PDF::loadView('mmrreports.mmr_requisitionn', $relations);
				if($Requisition_Count>0) 
				{
					$pdf->save(storage_path('/mmrfiles/requisitionn.pdf'));
					$im = new \Imagick();
					$im->pingImage(storage_path() . '/mmrfiles/requisitionn.pdf');
					$omispdfFile33Count =  $im->getNumberImages(); 
				}
		
		
			/*-------------------------------------------Value Adds-----------------------------*/

			$resullt = array();
	
			$matchfields_hskpact = ['site' => $uriSegments[4], 'month' =>$month, 'year' => $year, 'type'=>'valueadd']; 
	
			$ValueAdds_Count = \App\Mmrmonthlyreport::where($matchfields_hskpact)->count();
	
			if($ValueAdds_Count > 0){
	
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
	
			if($ValueAdds_Count>0) 
			{ 
				$pdf->save(storage_path('/mmrfiles/valueadd.pdf'));
				$im = new \Imagick();
			    $im->pingImage(storage_path() . '/mmrfiles/valueadd.pdf');
			    $omispdfFile34Count =  $im->getNumberImages(); 
			}



			/*-------------------------------------------Events-----------------------------*/
			
			
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
	
			if($Events_Count>0) 
			{
				$pdf->save(storage_path('/mmrfiles/events.pdf'));
				$im = new \Imagick();
			    $im->pingImage(storage_path() . '/mmrfiles/events.pdf');
			    $omispdfFile35Count =  $im->getNumberImages(); 
			}

		
			/*-------------------------------------------Fire Safety Drills/Trainings-----------------------------*/
			
			
			/*----------------------------------FIRE MOCK DRILL-----------------------------------------*/
			
			
			$formfieldarray = array();
			$siteattrname = array();
			$flatres = array();
			$reportdate_val = "";
			$dateString = $segment2.'-'.$segment3.'-04';
			//Last date of current month.
			$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
			$lastdatearr = explode("-",$lastDateOfMonth);
			$reportdate_val = $lastdatearr[2]."-".$segment3."-".$segment2;
	
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
				 
				 $skarra= array();
				 //$mis_sites_list = Misreportselectedsite::where('reportname', '=', 'Fire_Mock_Drill')->first();
				  //if($mis_sites_list) $mislist = $mis_sites_list['slist'];		  
				  //else $mislist = "9,15,13,11,19,18,8,5,14,7,20,12,87,17";		
				  $mislist= $uriSegments[4];  
				  $allsitesList = explode(",",$mislist);
				  $i=0;
				  foreach($sites_res_arr as $keys => $site){
					if (in_array($keys, $allsitesList)) 
					{
						$skarra[$i] = $keys;
						$i = $i+1;
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
				 
				 foreach($siteattrname as $stk => $siten) {
				 
				  $match_in_fields = ['month' => $segment3, 'year' => $segment2, 'site' =>$stk]; 
				  $match_in_count = \App\Mockdrillmisreport::where($match_in_fields)->count();
			
				   if($match_in_count > 0){
						$match_in_array = \App\Mockdrillmisreport::where($match_in_fields)->get();
						
						$indentrep_Array[$stk] = $match_in_array;
				   }
				   else{
					   $indentrep_Array[$stk] = array();
				   }
				   
				   
				 }
				 
				$omismdrillCount = $match_in_count;
				
				$relations = [
				'res' => $formfieldarray,  
				'sites' => $sitenames,
				'report_on' => $reportdate_val,
				'report_year' => $segment2,
				'report_month' => $segment3,
				'existing' => $existing_records,
				'drill' => $indentrep_Array,
				];   
				
			   
			   if($omismdrillCount>0) 
			   {		
			   	   $pdf = PDF::loadView('misprints.mismockdrillprint', $relations);	   
			       $pdf->save(storage_path('/mmrfiles/omismockdrillprint.pdf')); 			   
				   $im = new \Imagick();
				   $im->pingImage(storage_path() . '/mmrfiles/omismockdrillprint.pdf');
				   $omispdfFile36Count =  $im->getNumberImages(); 
			   }
			
			/*----------------------------------FIRE PREPARE-----------------------------------------*/
			
			$formfieldarray = array();
			$siteattrname = array();
			$flatres = array();
			$reportdate_val = "";
			$dateString = $segment2.'-'.$segment3.'-04';
			//Last date of current month.
			$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
			$lastdatearr = explode("-",$lastDateOfMonth);
			$reportdate_val = $lastdatearr[2]."-".$segment3."-".$segment2;
	
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
				 $skarra= array();
				 //$mis_sites_list = Misreportselectedsite::where('reportname', '=', 'Fire_Safety_Preparedness')->first();
				 // if($mis_sites_list) $mislist = $mis_sites_list['slist'];		
				  $site = $uriSegments[4];  
				  $mislist = $site;		  
				  $allsitesList = explode(",",$mislist);
				  $i=0;
				  foreach($sites_res_arr as $keys => $site){
					if (in_array($keys, $allsitesList)) 
					{
						$skarra[$i] = $keys;
						$i = $i+1;
					}
				  }	
				  $sites_res_arr = $siteattrname;
				  $sites_res_arr_res = array();
				  foreach($skarra as $kv){
				   if(isset($sites_res_arr[$kv])) {
					$sites_res_arr_res[$kv] = $siteattrname[$kv];
					}
				  }
				 $match_in_fields = ['month' => $segment3, 'year' => $segment2, 'site' =>$stk]; 
				  $match_in_count = \App\Firepreparemisreport::where($match_in_fields)->count();
			
				   if($match_in_count > 0){
						$match_in_array = \App\Firepreparemisreport::where($match_in_fields)->get();
						
						$indentrep_Array[$stk] = $match_in_array;
				   }
				   else{
					   $indentrep_Array[$stk] = array();
				   }
				 
				
				$omisfprepareCount = $match_in_count;
				
				$relations = [
				'res' => $formfieldarray,  
				'sites' => $sitenames,
				'report_on' => $reportdate_val,
				'report_year' => $segment2,
				'report_month' => $segment3,
				'existing' => $existing_records,
				'drill' => $indentrep_Array,
				];   
			if($omisfprepareCount>0) 
		    {	
			   $pdf = PDF::loadView('misprints.misfireprepareprint', $relations);		   
			   $pdf->save(storage_path('/mmrfiles/omisfireprepareprint.pdf')); 			   
			   $im = new \Imagick();
			   $im->pingImage(storage_path() . '/mmrfiles/omisfireprepareprint.pdf');
			   $omispdfFile37Count =  $im->getNumberImages(); 
			}
			
			
			/*----------------------------------MMR THANK YOU------------------------------------*/	

			$relations = [
	
			'report_month' => $mn,
	
			'report_year' => $segment2,
	
			'sitename' => get_sitename($uriSegments[4]),
	
			]; 
	
			$pdf = PDF::loadView('mmrreports.mmr_mmrthankyou', $relations);
	
			$pdf->save(storage_path('/mmrfiles/thankyou.pdf'));   
	
			
	
			$pdf = new \PDFMerger();  
			
			
			/*----------------------------------MMR INDEX------------------------------------*/	

			$relations = [
	
			'report_month' => $mn,
	
			'report_year' => $segment2,
	
			'sitename' => get_sitename($site),
				
			'mmrmanpower' =>  $omispdfFile2Count,	
			'mmrsla' =>  $omispdfFile3Count,	
			'omisapnacomplex' =>  $omispdfFile4Count,	
			'mmrmajor_incidents_Accidents' => $omispdfFile5Count,	
			'omisfiresafeequipment' => $omispdfFile6Count,	
			'mmrnoc' => $omispdfFile7Count,	
			'omiselectomechanical' => $omispdfFile8Count,
			'omisstpstatus' => $omispdfFile9Count,
			'omiswspstatus' => $omispdfFile10Count,
			'amctracker' => $omispdfFile11Count,
			'ebpower' => $omispdfFile12aCount,
			'pfanalysis' => $omispdfFile12bCount,
			'dggenerated' => $omispdfFile12cCount,
			'metrowaterconsumtion' => $omispdfFile12dCount,
			'ppmvendor' => $omispdfFile14Count,
			'ppminhouse' => $omispdfFile15Count,
			'wspinlet' => $omispdfFile17aCount,
			'wspoutlet' => $omispdfFile17bCount,
			'stpinlet' => $omispdfFile17cCount,
			'stpoutlet' => $omispdfFile17dCount,
			'hkcriticalmachinery' => $omispdfFile18Count,
			'housekeeping' => $omispdfFile19Count,
			'omishousekeepingdownload' => $omispdfFile21Count,
			'pets' => $omispdfFile22Count,
			'hocriticalmachinery' => $omispdfFile23Count,
			'horticulture' => $omispdfFile24Count,
			'omisreportonhorticulture' => $omispdfFile26aCount,
			'omisdailysecuritydata' => $omispdfFile26Count,
			'omistrafficmovement' => $omispdfFile27Count,
			'initiative' => $omispdfFile28Count,
			'omisoccupancy_rdetails' => $omispdfFile29Count,
			'omismaterialindented' => $omispdfFile29bCount,
			'omisclubhouseutilization' => $omispdfFile30Count,
			'violation' => $omispdfFile31Count,
			'suggestion' => $omispdfFile32Count,
			'requisitionn' => $omispdfFile33Count,
			'valueadd' => $omispdfFile34Count,
			'events' => $omispdfFile35Count,
			'omismockdrillprint' => $omispdfFile36Count,
			'omisfireprepareprint' => $omispdfFile37Count
			];  
	
			
	
			$pdf = PDF::loadView('mmrreports.mmr_indexpage', $relations);
	
			$pdf->save(storage_path('/mmrfiles/index.pdf')); 
			
			/*-------------------------------------------Trainings-----------------------------*/
			
			
			/*------------------------------------ALL MMR PDFS-----------------------------------*/
			
			$pdfFile0Path = "";
			$pdfFile01Path = "";
			$pdfFile1Path = "";
			$pdfFile2Path = "";
			$pdfFile3Path = "";
			$pdfFile4Path = "";
			$pdfFile5Path = "";
			$pdfFile6Path = "";
			$pdfFile7Path = "";
			$pdfFile8Path = "";
			$pdfFile9Path = "";
			$pdfFile10Path = "";
			$pdfFile11path = "";
			$pdfFile12Path = "";
			$pdfFile13Path = "";
			$pdfFile14Path = "";
			$pdfFile15Path = "";
			$pdfFile16Path = "";
			$pdfFile17aPath = "";
			$pdfFile17bPath = "";
			$pdfFile17cPath = "";
			$pdfFile17dPath = "";
			$pdfFile18Path = "";
			$pdfFile19Path = "";
			$pdfFile20Path = "";			
			$pdfFile21path = "";
			$pdfFile2Path = "";
			$pdfFile23Path = "";
			$pdfFile24Path = "";
			$pdfFile25Path = "";
			$pdfFile26Path = "";
			$pdfFile27Path = "";
			$pdfFile28Path = "";
			$pdfFile28bPath = "";
			$pdfFile29Path = "";
			$pdfFile30Path = "";		
			$pdfFile31path = "";
			$pdfFile3Path = "";
			$pdfFile33Path = "";
			$pdfFile34Path = "";
			$pdfFile35Path = "";
			$pdfFile36Path = "";
			$pdfFile37Path = "";
			$pdfFile38Path = "";
			$pdfFile39Path = "";
			$pdfFile40Path = "";
			
			$pdfFile0Path = storage_path() . '/mmrfiles/welcome.pdf';
			$pdfFile01Path = storage_path() . '/mmrfiles/index.pdf';
			$pdfFile1Path = storage_path() . '/mmrfiles/mmrtechservices.pdf';
			if($omispdfFile2Count>0) $pdfFile2Path = storage_path() . '/mmrfiles/mmrmanpower.pdf';
			if($omispdfFile3Count>0) $pdfFile3Path = storage_path() . '/mmrfiles/mmrsla.pdf';
			if($omispdfFile4Count>0) $pdfFile4Path = storage_path() . '/mmrfiles/omisapnacomplex.pdf';
			if($omispdfFile5Count>0) $pdfFile5Path = storage_path() . '/mmrfiles/mmrmajor_incidents_Accidents.pdf';
			if($omispdfFile6Count>0) $pdfFile6Path = storage_path() . '/mmrfiles/omisfiresafeequipment.pdf';
			if($omispdfFile7Count>0) $pdfFile7Path = storage_path() . '/mmrfiles/mmrnoc.pdf';
			if($omispdfFile8Count>0) $pdfFile8Path = storage_path() . '/mmrfiles/omiselectomechanical.pdf';
			if($omispdfFile9Count>0) $pdfFile9Path = storage_path() . '/mmrfiles/omisstpstatus.pdf';
			if($omispdfFile10Count>0) $pdfFile10Path = storage_path() . '/mmrfiles/omiswspstatus.pdf';
			if($omispdfFile11Count>0) $pdfFile11Path = storage_path() . '/mmrfiles/amctracker.pdf';
			if($omispdfFile12aCount>0) $pdfFile12aPath = storage_path() . '/mmrfiles/ebpower.pdf';
			if($omispdfFile12bCount>0) $pdfFile12bPath = storage_path() . '/mmrfiles/pfanalysis.pdf';
			if($omispdfFile12cCount>0) $pdfFile12cPath = storage_path() . '/mmrfiles/dggenerated.pdf';
			if($omispdfFile12dCount>0) $pdfFile12dPath = storage_path() . '/mmrfiles/metrowaterconsumtion.pdf';
			if($omispdfFile14Count>0) $pdfFile14Path = storage_path() . '/mmrfiles/ppmvendor.pdf';
			if($omispdfFile15Count>0) $pdfFile15Path = storage_path() . '/mmrfiles/ppminhouse.pdf'; 
			if($omispdfFile17aCount>0)  $pdfFile17aPath = storage_path() . '/mmrfiles/wspinlet.pdf';
			if($omispdfFile17bCount>0) $pdfFile17bPath = storage_path() . '/mmrfiles/wspoutlet.pdf';	
			if($omispdfFile17cCount>0) $pdfFile17cPath = storage_path() . '/mmrfiles/stpinlet.pdf';	
			if($omispdfFile17dCount>0) $pdfFile17dPath = storage_path() . '/mmrfiles/stpoutlet.pdf';
			if($omispdfFile18Count>0) $pdfFile18Path = storage_path() . '/mmrfiles/hkcriticalmachinery.pdf';	
			if($omispdfFile19Count>0) $pdfFile19Path = storage_path() . '/mmrfiles/housekeeping.pdf';
			if($omispdfFile21Count>0) $pdfFile21Path = storage_path() . '/mmrfiles/omishousekeepingdownload.pdf';
			if($omispdfFile22Count>0) $pdfFile22Path = storage_path() . '/mmrfiles/pets.pdf';
			if($omispdfFile23Count>0) $pdfFile23Path = storage_path() . '/mmrfiles/hocriticalmachinery.pdf'; 
			if($omispdfFile24Count>0) $pdfFile24Path = storage_path() . '/mmrfiles/horticulture.pdf';			
			if($omispdfFile26aCount>0) $pdfFile26aPath = storage_path() . '/mmrfiles/omisreportonhorticulture.pdf'; 
			if($omispdfFile26Count>0) $pdfFile26Path = storage_path() . '/mmrfiles/omisdailysecuritydata.pdf'; 
			if($omispdfFile27Count>0) $pdfFile27Path = storage_path() . '/mmrfiles/omistrafficmovement.pdf';
			if($omispdfFile28Count>0) $pdfFile28Path = storage_path() . '/mmrfiles/initiative.pdf';
			if($omispdfFile29Count>0) $pdfFile29Path = storage_path() . '/mmrfiles/omisoccupancy_rdetails.pdf';
			if($omispdfFile29bCount>0) $pdfFile29bPath = storage_path() . '/mmrfiles/omismaterialindented.pdf';
			if($omispdfFile30Count>0) $pdfFile30Path = storage_path() . '/mmrfiles/omisclubhouseutilization.pdf';
			if($omispdfFile31Count>0) $pdfFile31Path =  storage_path() . '/mmrfiles/violation.pdf';
			if($omispdfFile32Count>0) $pdfFile32Path =  storage_path() . '/mmrfiles/suggestion.pdf';
			if($omispdfFile33Count>0) $pdfFile33Path =  storage_path() . '/mmrfiles/requisitionn.pdf';
			if($omispdfFile34Count>0) $pdfFile34Path = storage_path() . '/mmrfiles/valueadd.pdf';
			if($omispdfFile35Count>0) $pdfFile35Path = storage_path() . '/mmrfiles/events.pdf';
			if($omispdfFile36Count>0) $pdfFile36Path = storage_path() . '/mmrfiles/omismockdrillprint.pdf';
			if($omispdfFile37Count>0) $pdfFile37Path = storage_path() . '/mmrfiles/omisfireprepareprint.pdf';			
			$pdfFile38Path = storage_path() . '/mmrfiles/thankyou.pdf';
			
			
			$pdf = new \PDFMerger();  
			
			/*------------------------------------ALL MMR PDFS COMBINE-----------------------------------*/
			$pdf->addPDF($pdfFile0Path, 'all');	
			$pdf->addPDF($pdfFile01Path, 'all');	
			$pdf->addPDF($pdfFile1Path, 'all');	
			if(isset($pdfFile2Path) && $pdfFile2Path!="") $pdf->addPDF($pdfFile2Path, 'all');
			if(isset($pdfFile3Path) && $pdfFile3Path!="") $pdf->addPDF($pdfFile3Path, 'all');
			if(isset($pdfFile4Path) && $pdfFile4Path!="") $pdf->addPDF($pdfFile4Path, 'all');
			if(isset($pdfFile5Path) && $pdfFile5Path!="") $pdf->addPDF($pdfFile5Path, 'all');
			if(isset($pdfFile6Path) && $pdfFile6Path!="") $pdf->addPDF($pdfFile6Path, 'all');
			if(isset($pdfFile7Path) && $pdfFile7Path!="") $pdf->addPDF($pdfFile7Path, 'all');
			if(isset($pdfFile8Path) && $pdfFile8Path!="") $pdf->addPDF($pdfFile8Path, 'all');
			if(isset($pdfFile9Path) && $pdfFile9Path!="") $pdf->addPDF($pdfFile9Path, 'all');
			if(isset($pdfFile10Path) && $pdfFile10Path!="") $pdf->addPDF($pdfFile10Path, 'all');
			if(isset($pdfFile11Path) && $pdfFile11Path!="") $pdf->addPDF($pdfFile11Path, 'all');
			if(isset($pdfFile12aPath) && $pdfFile12aPath!="") $pdf->addPDF($pdfFile12aPath, 'all');
			if(isset($pdfFile12bPath) && $pdfFile12bPath!="") $pdf->addPDF($pdfFile12bPath, 'all');
			if(isset($pdfFile12cPath) && $pdfFile12cPath!="") $pdf->addPDF($pdfFile12cPath, 'all');
			if(isset($pdfFile12dPath) && $pdfFile12dPath!="") $pdf->addPDF($pdfFile12dPath, 'all');
			if(isset($pdfFile14Path) && $pdfFile14Path!="") $pdf->addPDF($pdfFile14Path, 'all');
			if(isset($pdfFile15Path) && $pdfFile15Path!="") $pdf->addPDF($pdfFile15Path, 'all');
			if(isset($pdfFile17aPath) && $pdfFile17aPath!="") $pdf->addPDF($pdfFile17aPath, 'all');
			if(isset($pdfFile17bPath) && $pdfFile17bPath!="") $pdf->addPDF($pdfFile17bPath, 'all');
			if(isset($pdfFile17cPath) && $pdfFile17cPath!="") $pdf->addPDF($pdfFile17cPath, 'all');
			if(isset($pdfFile17dPath) && $pdfFile17dPath!="") $pdf->addPDF($pdfFile17dPath, 'all');			
			if(isset($pdfFile18Path) && $pdfFile18Path!="") $pdf->addPDF($pdfFile18Path, 'all');		
			if(isset($pdfFile19Path) && $pdfFile19Path!="") $pdf->addPDF($pdfFile19Path, 'all');
			if(isset($pdfFile21Path) && $pdfFile21Path!="") $pdf->addPDF($pdfFile21Path, 'all');
			if(isset($pdfFile22Path) && $pdfFile22Path!="") $pdf->addPDF($pdfFile22Path, 'all');			
			if(isset($pdfFile23Path) && $pdfFile23Path!="") $pdf->addPDF($pdfFile23Path, 'all');
			if(isset($pdfFile24Path) && $pdfFile24Path!="") $pdf->addPDF($pdfFile24Path, 'all');
			if(isset($pdfFile26aPath) && $pdfFile26aPath!="") $pdf->addPDF($pdfFile26aPath, 'all');			
			if(isset($pdfFile26Path) && $pdfFile26Path!="") $pdf->addPDF($pdfFile26Path, 'all');
			if(isset($pdfFile27Path) && $pdfFile27Path!="") $pdf->addPDF($pdfFile27Path, 'all');
			if(isset($pdfFile28Path) && $pdfFile28Path!="") $pdf->addPDF($pdfFile28Path, 'all');
			if(isset($pdfFile29Path) && $pdfFile29Path!="") $pdf->addPDF($pdfFile29Path, 'all');
			if(isset($pdfFile29bPath) && $pdfFile29bPath!="") $pdf->addPDF($pdfFile29bPath, 'all');
			if(isset($pdfFile30Path) && $pdfFile30Path!="") $pdf->addPDF($pdfFile30Path, 'all');
			if(isset($pdfFile31Path) && $pdfFile31Path!="") $pdf->addPDF($pdfFile31Path, 'all');
			if(isset($pdfFile32Path) && $pdfFile32Path!="") $pdf->addPDF($pdfFile32Path, 'all');
			if(isset($pdfFile33Path) && $pdfFile33Path!="") $pdf->addPDF($pdfFile33Path, 'all');
			if(isset($pdfFile34Path) && $pdfFile34Path!="") $pdf->addPDF($pdfFile34Path, 'all');
			if(isset($pdfFile35Path) && $pdfFile35Path!="") $pdf->addPDF($pdfFile35Path, 'all');
			if(isset($pdfFile36Path) && $pdfFile36Path!="") $pdf->addPDF($pdfFile36Path, 'all');
			if(isset($pdfFile37Path) && $pdfFile37Path!="") $pdf->addPDF($pdfFile37Path, 'all');
			if(isset($pdfFile38Path) && $pdfFile38Path!="") $pdf->addPDF($pdfFile38Path, 'all');
			//if(isset($pdfFile4Path) && $pdfFile4Path!="") $pdf->addPDF($pdfFile4Path, 'all');
			//if(isset($pdfFile5Path) && $pdfFile5Path!="") $pdf->addPDF($pdfFile5Path, 'all');
			//if(isset($pdfFile6Path) && $pdfFile6Path!="") $pdf->addPDF($pdfFile6Path, 'all');
			
			
			/*------------------------------------DOWNLOAD MMR PDF-----------------------------------*/
			$reportDate = "01-".$segment3."-".$segment2;
			$dwnfilename = "MMR_".$siteName."_".date("F",strtotime($reportDate))."-".$segment2.".pdf";	
			$pdf->merge('download', $dwnfilename);
		}
	
	}
?>