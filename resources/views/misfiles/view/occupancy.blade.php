
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
	}
	.manjeera table tr td 
	{
	padding:5px;
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
	.manjeera span
	{
	color:#041586;
	font-weight:bold; 
	}
	.x_panel.commmunittty
	{
	 border:0px;
	 padding:0px;
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
<div class="col-md-12 col-sm-12 col-xs-12 mis-occupancy-viewpage" style="padding-left:0px;padding-right:0px;">
              <div class="x_panel tile fixed_height_400 commmunittty">
                <div class="x_title">
                   <!--<h3>Metro Water Supply details from  01.12.2017 to 31.12.2017</h3>-->
                </div>
                <div class="x_content">
    
	<div class="manjeera occupancydate-viewtable">
	  
                      <table width="100%" border="1" cellspacing="0">
                        <tbody>
                          <tr class="tr-color">
                           <th colspan="9" style="font-size:15px;text-align:center;"> Occupancy & Rental Details as on <span style="color:#ffd800;"><?php echo $report_on; ?></span></th>
                          </tr>
                      <tr style="background-color:#e9c085;">
                        <th rowspan="2" class="text-center">Community</th>
                        <th rowspan="2" class="text-center">Total No. of Flats </th>
                        <th rowspan="2" class="text-center">Total Occupied</th>
                        <th rowspan="2" class="text-center">Owners  </th>
                        <th rowspan="2" class="text-center">Tenants</th>
                        <th  rowspan="2" class="text-center">Vacant</th>
                        
                        <th  colspan="3" style="text-align:center;">Prevailing rent per month (INR)</th>
                      
                      </tr>
                          
                        <tr style="background-color:#e9c085;">
                        <!-- <th class="text-center">1BHK</th>-->
                         <th class="text-center">2BHK</th>
                         <th class="text-center">3BHK</th>
                         <th class="text-center">4BHK</th>
                         </tr>
                        
						
						  @if (count($sites) > 0)
                        @foreach ($sites as $key => $site)
                              <tr>
                         <td><b><?php  echo $site;   ?></b></td>
                        <td class="text-center"><b> <?php     if(isset($flats[$key])) { echo $flats[$key]; } ?></b></td> 
						
						<!--{!! Form::text('ctptmin[]','', ['class' => 'larev', 'placeholder' => 'minimum']) !!}-->
						 
                       
						<td class="text-center"> <b><?php  if(isset($existing[$key]['owners']) && isset($existing[$key]['tenants'])) { echo $existing[$key]['owners'] + $existing[$key]['tenants']; } ?> </b></td>
						<td class="text-center"><b> <?php if(isset($existing[$key]['owners'])) { echo $existing[$key]['owners']; } ?></b></td>
						<td class="text-center"> <b><?php if(isset($existing[$key]['tenants'])) { echo $existing[$key]['tenants']; } ?></b> </td>
						<td class="text-center"><b><?php if(isset($existing[$key]['vacant'])) { echo $existing[$key]['vacant']; } ?> </b></td>
                        <!-- {!! Form::text('ctptmax[]', '', ['class' => 'larev2', 'placeholder' => '']) !!}-->
						<?php /*?><td class="text-center"><span><?php if(isset($cost[$key]['one_bhk'])) { echo $cost[$key]['one_bhk']; } ?> </span></td><?php */?>
						<td class="text-center"><span><?php if(isset($cost[$key]['two_bhk'])) { echo $cost[$key]['two_bhk']; } ?> </span></td>
						<td class="text-center"><span><?php if(isset($cost[$key]['three_bhk'])) { echo $cost[$key]['three_bhk']; } ?> </span></td>
						<td class="text-center"><span><?php if(isset($cost[$key]['four_bhk'])) { echo $cost[$key]['four_bhk']; } ?> </span></td>
                      
					    </tr>  
							    
							 @endforeach
							   
							 @endif
                            
                          
                        </tbody>
                      </table>
                      
                    </div>
    
                        
                </div>
              </div>
            </div>
			
    <script src="/build/js/custom.min.js"></script>	
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    @include('partials.footer')
@stop