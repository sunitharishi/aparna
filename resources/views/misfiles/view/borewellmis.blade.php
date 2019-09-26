
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
	text-align:center;
	font-size:11px;
	}
	.manjeera table tr td 
	{
	padding:5px;
	text-align:center;
	font-size:11px;
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
	 font-size:12px;
 	}
	.docs-main h3
	{
    margin-top:10px;
	margin-bottom:25px;
	text-align:center;
	}
	.tablesaw-bar
	{
	height:30px;
	}
	.manjeera span
	{
	color:#041586;
	font-weight:bold;
	}
	.x_panel.reason-for-failure
	{
	 padding-left:0px;
	 padding-top:0px;
	 border:0px;
	 padding-right:0px;
	}
	.x_content.look-like
	{
	 margin-top:0px;
	 padding-left:0px;
	 padding-right:0px;
	}
	.text-center
	{
	 text-align:center;
	}
	</style>
@extends('layouts.app')


@section('content')

  <?php $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 
									$year = $uriSegments[3]; 
									$month = $uriSegments[4]; 
									?>
              
<div class="misback-button"><a href="/misreportsoptions/<?php echo $year."/".$month ?>">Back</a></div>
<div class="col-md-12 col-sm-12 col-xs-12" style="padding-left:0px;padding-right:0px;">
              <div class="x_panel tile fixed_height_400 reason-for-failure">
                <div class="x_title">
                   <!--<h3>Metro Water Supply details from  01.12.2017 to 31.12.2017</h3>-->
                </div>
                <div class="x_content look-like">
    
<div class="manjeera borewellnot-viewtable">
                      <table width="100%" border="1" cellspacing="0">
                        <tbody>
                          <tr>
                           <th colspan="15" style="font-size:15px;text-align:center;background-color:#2f4050;color:#fff;">Borewells not working status as on <span style="color:#ffd800;"> <?php echo $report_on; ?></span></th>
                          </tr>
                      <tr style="background-color:#e9c085;">
                        <th rowspan="2">S.No</th>
                        <th rowspan="2" style="width:13%;">Community </th>
                       <!-- <th rowspan="3">Total<br> Units </th>  
                        <th rowspan="3">Occupancy<br> (Avg) </th>-->
                        <th colspan="2">Borewells</th>
                        <th  colspan="11">Reasons for Failure</th>
                      </tr>
                          
                        <tr style="background-color:#e9c085;">
                         <th >Total</th>
                         <th > NW </th>
                         <th >No <br>Ground<br> Water </th>
                         <th >Over<br>Load</th>
                         <th >Motor<br> burnt</th>
                         <th >Cable <br>Problem</th>
                           <th >Pump / Motor <br>wear & tear</th>
                          <th >Others</th>
                          <th style="width:7%;">Dry Run <br>Protection</th>
                          <th >Flow Meter </th>  
                          <th colspan="3"> Remarks</th>
                          
                        </tr>
                        
                          @if (count($sites) > 0) <?php $i = 1;?>
                        @foreach ($sites as $key => $site)
                        
                             <tr>
                        <th><?php echo $i++; ?></th>
                        <td style="text-align:left;width:13%;"><b><?php  echo $site;   ?></b></td>
                         <td> <?php  if(isset($borewellsnum[$key])) {  echo  $borewellsnum[$key]; } ?></td> 
                        <td><span><?php if(isset($existing[$key]['nw_bores_num'])) { echo $existing[$key]['nw_bores_num']; } ?></span> </td>
                        <td><span><?php if(isset($existing[$key]['no_ground_water'])) { echo $existing[$key]['no_ground_water']; } ?></span> </td>
                        <td><span><?php if(isset($existing[$key]['over_load'])) { echo $existing[$key]['over_load']; } ?></span></td>
                        <td><span><?php if(isset($existing[$key]['motor_brunt'])) { echo $existing[$key]['motor_brunt']; } ?></span></td>
                        <td><span><?php if(isset($existing[$key]['cable_prblm'])) { echo $existing[$key]['cable_prblm']; } ?></span></td>
                        <td><span><?php if(isset($existing[$key]['pumpormotorwear'])) { echo $existing[$key]['pumpormotorwear']; } ?></span> </td>
                        <td><span><?php if(isset($existing[$key]['others'])) { echo $existing[$key]['others']; } ?></span></td>
                        <td style="width:7%;"><span><?php if(isset($existing[$key]['dry_run_protectn'])) { echo $existing[$key]['dry_run_protectn']; } ?></span></td>
                        <td><span><?php if(isset($existing[$key]['flow_meter'])) { echo $existing[$key]['flow_meter']; } ?></span></td>
                        <td colspan="3" style="text-align:left;"><span><?php if(isset($existing[$key]['remarks'])) { echo $existing[$key]['remarks']; } ?></span></td>
                           </tr>
                           
                            @endforeach
							   
							 @endif
                          
                        </tbody>
                      </table>
                      
                <!--<p style="padding-top:3px;margin-bottom:5px;">* Dry run protection and single phase preventer is essential to protect the broewell from over load/under load and dry run. </p>-->
                     
                    </div>
    
                        
                </div>
              </div>
            </div>
			
    <script src="/build/js/custom.min.js"></script>	
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
     @include('partials.footer')
@stop