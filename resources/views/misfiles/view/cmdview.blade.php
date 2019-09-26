
    <link href="/vendors1/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">  
    <!-- Font Awesome -->
    <link href="/vendors1/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
   <!-- <link href="vendors1/nprogress/nprogress.css" rel="stylesheet">-->
    <!-- iCheck -->
    <!--<link href="vendors1/iCheck/skins/flat/green.css" rel="stylesheet">-->
	
    <!-- bootstrap-progressbar -->
    <link href="/vendors1/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
   <!-- <link href="vendors1/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>-->
    <!-- bootstrap-daterangepicker -->
    <!--<link href="vendors1/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">-->

    <!-- Custom Theme Style -->
    <link href="/build/css/custom.css" rel="stylesheet">

	<link rel="stylesheet" href="/dist/tablesaw.css">
	<link rel="stylesheet" href="/demo/demo.css">
	<link rel="stylesheet" href="//filamentgroup.github.io/demo-head/demohead.css">
    <style>
	.manjeera table tr th 
	{
	padding:5px;
	font-size:11px;
	text-align:center;
	}
	.manjeera table tr td 
	{
	padding:5px;
	font-size:11px;
	text-align:center;
	}
	.manjeera table tr td:nth-child(2)
	{
	 text-align:left;
	}
 	.manjeera
	{
	font-size:11px;
	}
	.x_title
	{
	border-bottom:none;
	padding:0px;
	margin:0px;
	}
	.borewell
	{
	margin-left:30px;
	}
	.docs-main
	{
	max-width:100%;
		 margin:0px;
	}
	.tablesaw-bar
	{
	height: 30px;
    display: block;
    padding-bottom: 11px;
    margin-bottom: 10px;
	}
	.communityinpu tr td input 
	{
	width:100%;
	 font-size:11px;
 	}
	.docs-main h3 
	{
	margin-bottom:25px;
	margin-top:10px;
 	}
	.tablesaw-bar
	{
	height:30px;
	}
	.manjeera table tr td span
	{
	color:#041586;
	font-weight:bold; 
	}
	.x_panel.commmunittty
	{
	 border:0px;
	 padding:0px;
	}
	
	</style>
@extends('layouts.app')


@section('content')
  <?php $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 
									$year = $uriSegments[3]; 
									$month = $uriSegments[4]; 
									?>
              
<div class="misback-button"><a href="/misreportsoptions/<?php echo $year."/".$month ?>">Back</a></div>
<div class="col-md-12 col-sm-12 col-xs-12 mis-cmdview-page" style="padding-left:0px;padding-right:0px;">
              <div class="x_panel tile fixed_height_400 commmunittty">
                <div class="x_title">
                   <!--<h3>Metro Water Supply details from  01.12.2017 to 31.12.2017</h3>-->
                </div>
                <div class="x_content">
    
	<div class="manjeera cmdrmd-viewtable">
	
	  
                      <table width="100%" border="1" cellspacing="0">
                        <tbody>
                          <tr class="tr-color">
                           <th colspan="20" style="font-size:15px;text-align:center;"> Installed capacity Vs Maximum recorded demand (load) as on <span style="color:#ffd800;"><?php echo $report_on; ?></span></th>
                          </tr>
                      <tr style="background-color:#e9c085;">
                        <th rowspan="2">S.No</th>
                        <th  rowspan="2"> Project Name </th>
                        <th rowspan="2">No. of Units</th>
                        <th  rowspan="2">Occupancy </th>
                        <th   rowspan="2">Occupancy in %</th>
                        <th   colspan="2">CMD in KVA</th>
						 <th  colspan="2">RMD in KVA</th>
                        <th   colspan="3">Transformation Capacity (KVA)</th>
						
						 <th   colspan="4">DG Set Capacity (KVA)</th>
                        <th   rowspan="2">Service No.</th>
						 <th   rowspan="2">Peak Load recorded in Month</th>
						 
						  <th  rowspan="2">Remarks</th>
						  
					</tr>
					<tr style="background-color:#e9c085;">
                        <th  >Total</th>
						 <th  >Per Flat</th>
						  <th  > Total</th>
						  <th  > Per Flat</th>
						    <th  >Total</th>
							<th  >Per Flat</th>
							<th >Load % on tranformer</th>
							 <th  >Total</th>
							<th  >Per Flat</th>
                             <th >Load % on DG</th>
							 <th >DG Backup</th>
                      
                      
                      </tr>
                          
                     
       
						
						  @if (count($sites) > 0) <?php $i = 0; ?>
                        @foreach ($sites as $key => $site)
						 <?php $i = $i + 1; ?>
                            <tr>
						 <td style="text-align:center;"><b><?php  echo $i;   ?></b></td>  
                         <td class="sboteheight"><b><?php  echo $site;   ?></b></td> 
                        <td class="text-center"><b> <?php  if(isset($flats[$key])) {  echo  $flats[$key]; }?></b></td> 
						
						<td> <?php  if(isset($occupency[$key]['occupency'])) echo $occupency[$key]['occupency']; ?> </td>
						<td><?php if(isset($occupency[$key]['occupency']) && isset($flats[$key])){ if((int)$flats[$key] > 0) {
						     echo round(($occupency[$key]['occupency']/$flats[$key]),2) * 100; echo "%";
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
						<td> <?php  if(isset($existing[$key]['remarks'])) echo $existing[$key]['remarks']; ?> </td>
						
                      
					    </tr>   
							      
							 @endforeach
							   
							 @endif
                            
                          
                        </tbody>
                      </table>
					</div>
                    
                    <div class="additional-information">
                    	<p>Going by the above data, the capacities of transformers, switch gears, panels and DG sets can be considerably reduced (after analysis of the data in detail by the consultants & MEP) for our ongoing and furture projects resulting in saving in initial capital cost and recurring diesel & maintenance cost.</p>
                        <div class="col-sm-6 col-xs-6">
                        	<p>* CMD : Contracted maximum demand</p>
                        </div>
                        <div class="col-sm-6 col-xs-6">
                        	<p>* RMD : Recorded maximum demand</p>
                        </div>
                    </div>
					  <?php if(isset($cmddata['additional_info'])) echo $cmddata['additional_info'];  ?>
                      
                    
    
                        
                </div>
              </div>
            </div>
			
    <script src="/build/js/custom.min.js"></script>	
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    @include('partials.footer')
@stop