<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> Occupancy &amp; Rental Details</title>

    <!-- Bootstrap -->
    <link rel="icon" href="images/ICON.png">
    <link href="/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/build/css/custom.css" rel="stylesheet">
    
    <style>
		
		body
	{
	  font-family:Arial, Helvetica, sans-serif;
	}
	.manjeera table tr th 
	{
	padding:7px 4px;
	text-align:center;
	vertical-align:middle;
	}
	.manjeera table tr td 
	{
	padding:7px 4px;
	text-align:center;
	}
	.manjeera table tr td:nth-child(2)
	{
	text-align:left;
	}
 	.manjeera
	{
	font-size:12px;
	}
	

	.manjeera table tr td.text-left
	{
	text-align:left;
	}
	.adinfo tbody tr th 
	{
	padding:5px 4px !important;
	}
	.adinfo tbody tr td 
	{
	padding:5px 4px !important;
	}
	
	.additional-information p
	{
	 font-size:13px;
	}
	.additional-information .col-sm-6 p
	{
	 margin-top:0px;
	 font-size:13px;
	}
	.additional-information .col-sm-6
	{
	 float:left;
	 padding-right:15px;
	 width:50%;
	}
	.manjeera table td
	{
		height:30px;
	}
	
	</style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
      

        <!-- page content -->
        <div class="right_col" role="main">

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12"  style="width:100%;">
              <div class="x_panel tile fixed_height_400">
                <div class="x_title">
                   <!--<h3>Metro Water Supply details from  01.12.2017 to 31.12.2017</h3>-->
                </div>
                <div class="x_content">
                	<!--<div class="land-scaping">
                    	<h4><b>Land Scaping</b></h4>
                    </div>  -->
                    
                    <div class="manjeera">
                                            <table width="100%" border="1" cellspacing="0" <?php if(isset($cmddata['additional_info'])) { if($cmddata['additional_info']) { echo "class='adinfo'"; } }  ?>>
                        <tbody>
                          <tr>
                           <th colspan="19" style="font-size:15px;text-align:center;">Installed capacity Vs Maximum recorded demand (load) as on <span><?php echo $report_on; ?></span></th>
                          </tr>
                      <tr>
					        <th rowspan="2">S.No</th>
							<th rowspan="2"> Project Name </th>
							<th   rowspan="2">No. of Units</th>
							<th  rowspan="2">Occupancy </th>
							<th   rowspan="2">Occupancy in %</th>
							<th   colspan="2">CMD in KVA</th>
							<th  colspan="2">RMD in KVA</th>
							<th   colspan="3">Transformer Capacity (KVA)</th>
							<th   colspan="4">DG Set Capacity (KVA)</th>
							<th   rowspan="2">Service No.</th>
							<th   rowspan="2">Peak Load recorded in Month</th>
							<th   rowspan="2">Remarks</th>
						  
					</tr>
					<tr>
						<th>Total</th>
						<th>Per Flat</th>
						<th> Total</th>
						<th> Per Flat</th>
						<th>Total</th>
						<th>Per Flat</th>
						<th>Load % on tranformer</th>
						<th>Total</th>
						<th>Per Flat</th>
						<th>Load % on DG</th>
						<th>DG Backup</th>
                    </tr>
                          
						  @if (count($sites) > 0) <?php $i = 0; 
						$occ = array(); 
						$trcontent = array(); ?>
                        @foreach ($sites as $key => $site)
                       
						 <?php  
							 	
								ob_start(); 
						 ?>
                              <tr>
                              <td>[SNO]</td>
                         <td class="sboteheight"><b><?php  echo $site;   ?></b></td> 
                        <td class="text-center"><b> <?php  if(isset($flats[$key])) {  echo  $flats[$key]; }?></b></td> 
						
						<td> <?php  if(isset($occupency[$key]['occupency'])) echo $occupency[$key]['occupency']; ?> </td>
						<td><?php if(isset($occupency[$key]['occupency']) && isset($flats[$key])){ if((int)$flats[$key] > 0) {
							 $k =  round(((float)$occupency[$key]['occupency']/(float)$flats[$key]),2) * 100; 
						     echo $k; echo "%";
						} }  ?></td> 
						<td> <?php  if(isset($cmdkva[$key])) echo $cmdkva[$key]; ?> </td>
						<td><?php if(isset($cmdkva[$key]) && isset($flats[$key])){ if((int)$flats[$key] > 0) {
						     echo round((float)((float)$cmdkva[$key]/(int)$flats[$key]),2);
						} }  ?></td> 
						<td> <?php  if(isset($existing[$key]['total_rmd'])) echo $existing[$key]['total_rmd']; ?> </td>
						<td><?php if(isset($existing[$key]['total_rmd']) && isset($occupency[$key]['occupency'])) {
						    if((float)$occupency[$key]['occupency'] > 0) {
						     echo round((float)((float)$existing[$key]['total_rmd']/$occupency[$key]['occupency']),2);
						} } ?></td> 
						<td> <?php  if(isset($transforkva[$key])) echo $transforkva[$key]; ?> </td> 
						<td> <?php if(isset($transforkva[$key]) && isset($flats[$key])) { if((int)$flats[$key] > 0) {
 						     echo round((float)((float)$transforkva[$key]/(int)$flats[$key]),2);
						} } ?></td>
						<td> <?php if(isset($existing[$key]['total_rmd']) && isset($transforkva[$key])) { 
						     if((float)($transforkva[$key]) > 0) {
						     echo round((float)((float)$existing[$key]['total_rmd']/(float)$transforkva[$key]),2) * 100; echo "%";
						} }  ?></td>
						<td> <?php  if(isset($dg_kva[$key])) echo $dg_kva[$key]; ?> </td>
						<td><?php if(isset($dg_kva[$key])  && isset($flats[$key])){  if((int)$flats[$key] > 0) {
						     echo round((float)((float)$dg_kva[$key]/$flats[$key]),2);
						}  } ?></td> 
						<td><?php if(isset($existing[$key]['total_rmd']) && isset($transforkva[$key])) {  if ((float)$dg_kva[$key] > 0) {
						     echo round((float)((float)$existing[$key]['total_rmd']/(float)$dg_kva[$key]),2) * 100;echo "%";
						} } ?></td> 
						<td> <?php   if(isset($backup[$key])) { echo  $backup[$key]; }  ?></td> 
						   
						<td> <?php  if(isset($service_numb[$key])) echo $service_numb[$key]; ?> </td>
						<td> <?php  if(isset($existing[$key]['peak_load_record'])) echo $existing[$key]['peak_load_record']; ?> </td>
						<?php /*?><td> <?php  if(isset($existing[$key]['remarks'])) echo $existing[$key]['remarks']; ?> </td><?php */?>[REPLACETDWITHCONTENT]</tr><?php 
								$content = ob_get_contents();
								ob_end_clean();
							 	$occ[$i] = $k; 
                             	$trcontent[$i] = $content;
								$i++;
							 ?>  
							 @endforeach
							   <?php //echo '<pre>';  print_r($occ); echo '</pre>';
							   asort($occ); 
							   //echo '<pre>';  print_r($occ); echo '</pre>';
							   $occ = array_reverse($occ, true);
							  // echo '<pre>'; print_r($occ); echo '</pre>';
							   //exit;
							   //print_r($trcontent); echo '</pre>';
							  // exit;
							   $tcount = count($occ); 
							   $above = 0;
							   $below = 0; 
							   $bkpos = 0;
							   
							   $occ_temp =  array_values($occ);
							   foreach($occ_temp as $key=>$oc)
							   {
							   		if($oc<80)
									{
										 $bkpos =  $key+1;
										 break;
									}
							   }
							   if($bkpos>0)
							   {
							   	  $below = $tcount-$bkpos+1;								 
							   }
							    
							   $above = $tcount-$below;
							   $ars = -1;
							   $brs = -1;
							   if($above) $ars = 0;
							   if($below) $brs = $tcount-$below;
							   
							   //echo "$above - $below";
							   
							   $j = 0;	
							   						   
							   foreach($occ as $key=>$con)
							   {
							   		$j++;
									$n = $trcontent[$key];
									$n =  str_replace("[SNO]",$j,$n);
									if($j-1==$ars) $rmark = '<td rowspan="'.$above.'">Can be assumed as full occupancy reached. Remaining can be extra polated.</td>';
									else if($j-1==$brs) $rmark = '<td rowspan="'.$below.'">-</td>';
									else $rmark = "";									
									$n =  str_replace("[REPLACETDWITHCONTENT]",$rmark,$n);
									echo $n;
							   }
							  //exit; ?>
							 @endif
                              
                        </tbody>
                      </table> 
                      
                          <?php if(isset($cmddata['additional_info'])) echo $cmddata['additional_info'];  ?>
                    </div>
                    
                      <div class="additional-information">
                        <div class="col-sm-6">
                        	<p>* CMD : Contracted maximum demand</p>
                        </div>
                        <div class="col-sm-6">
                        	<p>* RMD : Recorded maximum demand</p>
                        </div>
                    </div>
                    
                </div>
              </div> 
            </div>            
          </div>
          


          
        </div>
        <!-- /page content -->

        <!-- footer content -->
       
        <!-- /footer content -->
      </div>
    </div>


  </body>
</html>
 <script src="/vendors1/jquery/dist/jquery.min.js"></script>
 
<script>
$( document ).ready(function() {
    window.print(); 
	close();
	
	window.location.href = "/misreports"; 
});

</script>