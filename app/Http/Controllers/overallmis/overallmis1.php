<?php
		$siteattrname = array();
		$flatres = array();
		$reportdate_val = "";
		$dateString = $segment3.'-'.$segment4.'-04';
		//Last date of current month.
		$lastDateOfMonth = date("Y-m-t", strtotime($dateString));
		$lastdatearr = explode("-",$lastDateOfMonth);
		$reportdate_val = $lastdatearr[2]."-".$segment4."-".$segment3;
		$reportdatefrom_val = "1"."-".$segment4."-".$segment3;
	      if(Auth::user()->id == 1){
	      $sitenames = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('All', '');
		  $siteattrname = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  $sites_count = \App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->count();
		  $sites_res_arr =\App\Sites::where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');		  
		  }else{
		    $role_id = Auth::user()->role_id;
			$emp_id = Auth::user()->emp_id;
			$getemp_info = \App\Emp::where('id','=',$emp_id)->first();
			$siteinfo = $getemp_info->community;
			$sitearr = explode(",",$siteinfo);
			$sitenames = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id')->prepend('Please select', '');
			$siteattrname = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
			$sites_count = \App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->count();
			$sites_res_arr =\App\Sites::whereIn('id', $sitearr)->where('status', '=', '1')->orderBy('scode', 'ASC')->get()->pluck('name', 'id');
		  }	  
		  $fromdate = $segment3."-".$segment4."-"."1";
		  $todate = $segment3."-".$segment4."-".$lastdatearr[2];		  
		  $skarra= array();
		  foreach($sites_res_arr as $keys => $site){
		    if($keys == 9 || $keys == 15 || $keys == 13 || $keys == 11 || $keys == 8 || $keys == 5 || $keys == 14 || $keys == 7 || $keys == 16 || $keys == 20 || $keys == 12 ){
			   $skarra[0] = 9;
			   $skarra[1] = 15;
			   $skarra[2] = 13;
			   $skarra[3] = 11;
			   $skarra[4] = 8;
			   $skarra[5] = 5;
			   $skarra[6] = 14;
			   $skarra[7] = 7;
			   $skarra[8] = 16;
			   $skarra[9] = 20;
			   $skarra[10] = 12;			   
			}
		  }
		  $sites_res_arr_res = array();
		  foreach($skarra as $kv){
		    if(isset($sites_res_arr[$kv])) {
		    $sites_res_arr_res[$kv] = $sites_res_arr[$kv];
			}
		  }
		   $sites_res_arr = $sites_res_arr_res;  
		  if($sites_count > 0){
			$sitear = array();
			
			$avgcon = array();
			$contracted = array();
			
			foreach($sites_res_arr as $ke =>$site_res_row){
			$getcontractedcount =  Dailyreportvalidation::
				where('site', '=', $ke)
				->count();

				 
				if($getcontractedcount>0){
				 $getcontractedRes =  Dailyreportvalidation::
				where('site', '=', $ke)
				->first(); 
				
				$contracted[$ke] =  $getcontractedRes->contracted_quantity_kl;
				 }
				  else{
				  $contracted[$ke] = "";
				  }
				} 
				   
			foreach($sites_res_arr as $ke =>$site_res_row){
				//echo $site_res_row;
				$avgres = "";
				for($i=1;$i<=$lastdatearr[2];$i++){
				$ondate = $segment3."-".$segment4."-".$i;
				$resultcn = Fmsdailyreport::
				where('reporton', '=', $ondate)
				->where('site', '=', $ke)
				->count();
				if($resultcn > 0){
				 $getsiteMetro =  Fmsdailyreport::
				  where('reporton', '=', $ondate)
				->where('site', '=', $ke)
				->first();
				  $avgres = (float)$avgres + (float)$getsiteMetro->wsp_metro; 
				}   
				
				}
				
				$avgcon[$ke] = $avgres;
			}
			  
			  $contractpercent = array();
			  
			
			
			
			   foreach($sites_res_arr as $ke =>$site_res_row){
			     $community[$ke] =$site_res_row;
			   }
			   $datek["community"] = $community;
			   $datek["average"] = $avgcon;   
			   $datek["concentrated"] = $contracted; 
			
			for($i=1;$i<=$lastdatearr[2];$i++){
			    $ondate = $segment3."-".$segment4."-".$i;
				$sitearr = array();
			    foreach($sites_res_arr as $ke =>$site_res_row){
				 
				$resultcn = Fmsdailyreport::
				where('reporton', '=', $ondate)
				->where('site', '=', $ke)
				->count();
				 if($resultcn > 0){
				 $getsiteMetro =  Fmsdailyreport::
				  where('reporton', '=', $ondate)
				->where('site', '=', $ke)
				->first();
				     $sitearr[$ke] = $getsiteMetro->wsp_metro;
				  } 
				  else{
				   $sitearr[$ke] = "";
				  }
				}
				
				$datekres[$ondate] = $sitearr;
			}
			$datek["dateres"] = $datekres;			
			 foreach($contracted as $ke =>$cons_row){
			     if($cons_row > 0){
			     $contractpercent[$ke] =  ((float)(round((float)$avgcon[$ke]/count($datek["dateres"])) * 100) /(float)$cons_row);
				 }
				 else{
				  $contractpercent[$ke] = "";
				 }				 
			   }
			   $datek["persent"] = $contractpercent;
		  } 
		  $additional_text = "";  
			   $matchfields_m = ['month' => $segment4, 'year' => $segment3]; 
		$reswtre_count = \App\Metrowatermisreport::where($matchfields_m)->count();
		if($reswtre_count > 0) {
		 $reswtre_res  = \App\Metrowatermisreport::where($matchfields_m)->first(); 
		 $additional_text = $reswtre_res['additional_info'];
		} 		  
		$relations = [  			
			'sites' => $siteattrname,
			'flats' => $flatres,
			'reportfrom_on' => $reportdatefrom_val,
			'report_on' => $reportdate_val,
			'report_year' => $segment3,
			'report_month' => $segment4,
			'sitearr' => $datek,
			'additionalinfo' => $additional_text,			
			]; 			
		$metro = 1;
		  
		$relations2 = [  			
			'year' => $segment3,
			'month' => $segment4,			
			]; 			
			$pdf = PDF::loadView('misprints.metrowaterdownload', $relations);
			$pdf->save(storage_path('/pdffiles/some-filename11.pdf')); 
?>