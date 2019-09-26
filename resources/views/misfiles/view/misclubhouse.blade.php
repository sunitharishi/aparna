
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
	.x_panel.deeeetails
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
<div class="col-sm-12 col-md-12 col-xs-12 mis-clubhouse-viewpage" style="padding-left:0px;padding-right:0px;">
              <div class="x_panel tile fixed_height_400 deeeetails">
                <div class="x_title">
                   <!--<h3>Metro Water Supply details from  01.12.2017 to 31.12.2017</h3>-->
                </div>
                <div class="x_content">
    
	<div class="docs-main manjeera clubhouse-viewtable">
                      <table width="100%" border="1" cellspacing="0">
                        <tbody>
                          <tr class="tr-color">
                           <th colspan="11" style="font-size:15px;text-align:center;"> Club House Utilization Data</th>
                          </tr>
                      <tr style="background-color:#e9c085;">
                        <th rowspan="2" class="text-center">Community </th>
                        <th rowspan="2" class="text-center">Total Flats/Villas</th>
                        <th rowspan="2" class="text-center">Avg Occupancy</th>
                        <th colspan="4" style="text-align:center;">Average daily usage  </th>
                        <th colspan="4" style="text-align:center;"> % against occupied flats</th>
                       </tr>
                          
                        <tr style="background-color:#e9c085;">
                         <th class="text-center">Swimming Pool </th>
                         <th class="text-center">Gym </th>
                         <th class="text-center">Tennis</th>
                         <th class="text-center">Badminton</th>
                         <th class="text-center">Swimming Pool </th>
                         <th class="text-center">Gym </th>
                         <th class="text-center">Tennis</th>
                         <th class="text-center">Badminton</th>
                         </tr>
                         @if (count($sites) > 0)
                        @foreach ($sites as $key => $site)
                             <tr>
                           <td><b><?php  echo $site;   ?></b></td>
                        <td class="text-center"><b> <?php     if(isset($flats[$key])) echo $flats[$key]; ?></b></td> 
                     
						<td class="text-center"><span> <?php if(isset($avgoccuapncy[$key])) { echo $avgoccuapncy[$key]; } ?></span></td>
						<td class="text-center"> <span><?php if(isset($swimpoll_res[$key])) { echo $swimpoll_res[$key]; } ?></span></td>
						<td class="text-center"><span><?php if(isset($gym_res[$key])) { echo $gym_res[$key]; } ?> </span></td>
						<td class="text-center"><span><?php if(isset($tennis_res[$key])) { echo $tennis_res[$key]; } ?> </span></td>
						<td class="text-center"><span><?php if(isset($badminton_res[$key])) { echo $badminton_res[$key]; } ?> </span></td>
						<td class="text-center"><span><?php if(isset($swimpoll_per[$key])) { echo $swimpoll_per[$key]; } ?> </span></td>
						<td class="text-center"><span><?php if(isset($gym_per[$key])) { echo $gym_per[$key]; } ?> </span></td>
						<td class="text-center"><span><?php if(isset($tennis_per[$key])) { echo $tennis_per[$key]; } ?> </span></td>
						<td class="text-center"><span><?php if(isset($badminton_per[$key])) { echo $badminton_per[$key]; } ?> </span></td>
					
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