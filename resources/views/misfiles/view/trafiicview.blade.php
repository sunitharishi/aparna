
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
	.x_title
	{
	border-bottom:none;
	padding:0px;
	margin:0px;
	}
	.traffic-view table tr th
	{
	 padding:5px;
	 text-align:center;
	 font-size:11px;
	}
	.traffic-view table tr td
	{
	 padding:5px;
	 text-align:center;
	 font-size:11px;
	}
	.traffic-view table tr td span
	{
	 color:#041586;
	 font-weight:bold;
	}
	.note-points
	{
	 margin-top:10px;
	}
	.note-points label
	{
	 float:left;
	 margin-top:4px;
	}
	.note-points ol
	{
	 padding-left:20px;
	 float:left;
	}
	.note-points ol li
	{
	 padding:4px;
	}
	.x_panel.fixed_height_400
	{
	 border:0px;
	 padding:0px;
	}
	.x_content.conteent-view
	{
	 margin-top:0px;
	 padding:0px;
	}
	.traffic-view table tr td.text-left
	{
	text-align:left;
	}
	</style>
@extends('layouts.app')


@section('content')
  <?php $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 
									$year = $uriSegments[3]; 
									$month = $uriSegments[4]; 
									?>
              
<div class="misback-button"><a href="/misreportsoptions/<?php echo $year."/".$month ?>">Back</a></div>
<div class="col-md-12 col-sm-12 col-xs-12 mis-traffic-viewpage" style="padding-left:0px;padding-right:0px;">
              <div class="x_panel tile fixed_height_400">
                <div class="x_title">
                   <!--<h3>Metro Water Supply details from  01.12.2017 to 31.12.2017</h3>-->
                </div>
                <div class="x_content conteent-view">
                      <div class="traffic-viewcolor" style="text-align:center;font-size:15px;padding:4px;">
                        <b>Traffic movement data on avg. per day</b>
                     </div>
                  <div class="traffic-view">
                 
                   
                     <table border="1" width="100%">
                     	<!--<tr>
                        	<td colspan="16" style="text-align:center;font-size:15px;background-color:#2f4050;color:#fff;"><b>Traffic movement data on avg. per day</b></td>
                        </tr>-->
                        <tr style="background-color:#e9c085;">
                        	<td class="col1"><b>Particulars</b></td>
                             <?php foreach($existsec['sites'] as $skey => $siterec) { ?>
                        <td ><b> <?php  echo $siterec; ?></b> </td>
                       <?php }?>
                        <td ><b>Total</b></td>
                        </tr> 
                        <tr>
                        	<td class="text-left col2"><b>Residents Vehicle (4 & 2 wheelers)</b></td>
							<?php 
                                $vtotal = 0; 
								$ftotal=0; $saro_total=0; $tower_total=0;$oosman_total=0;
								$elina_total=0;$lotus_total=0;$tulip_total=0;$lake_total=0;$grande_total=0;$cyber_total=0;
								$aura_total=0;$boulevard_total=0;$gardenia_total=0;$county_total=0;
								$rv=array();
                                foreach($resident_vehicle as $skey => $vehicle)
                                { 
								if( (float)$numdays != 0) $vehicle = (float)((float)$vehicle/(float)$numdays);
								$rv[$skey]=$vehicle;
                           ?>
                           <td> 
                                <span><?php  echo round($vehicle,0);
								$vtotal = $vtotal + (float)$vehicle;
								?></span>
                           </td>
                            <?php } $saro_total = $saro_total + (float)$rv[9];
									$tower_total = $tower_total + (float)$rv[18]; 
									$oosman_total = $oosman_total + (float)$rv[17];
									$elina_total = $elina_total + (float)$rv[20];
									$lotus_total = $lotus_total + (float)$rv[16];
									$tulip_total = $tulip_total + (float)$rv[7];
									$lake_total = $lake_total + (float)$rv[5];
									$grande_total = $grande_total + (float)$rv[15];
									$cyber_total = $cyber_total + (float)$rv[12];
									$aura_total = $aura_total + (float)$rv[11];
									$boulevard_total = $boulevard_total + (float)$rv[8];
									$gardenia_total = $gardenia_total + (float)$rv[14];
									$county_total = $county_total + (float)$rv[19];?>
                            <td><span><?php echo round($vtotal,0); ?></span></td>
                        </tr>
                         <tr>
                        	<td class="text-left col2"><b>Temporary Vendors (persons)</b></td>
                            <?php 
                                $resd = 0; 
                                foreach($temp_vendors as $skey => $siterec)
                                { 
                                    if( (float)$numdays != 0) $siterec = (float)((float)$siterec/(float)$numdays);
									$rv[$skey]=$siterec;
                           ?>
                           <td> 
                                <span><?php  echo round($siterec,0);
								$resd = $resd + (float)$siterec;?></span>
                           </td>
                            <?php } $saro_total = $saro_total + (float)$rv[9];
									$tower_total = $tower_total + (float)$rv[18];
									$oosman_total = $oosman_total + (float)$rv[17];
									$elina_total = $elina_total + (float)$rv[20];
									$lotus_total = $lotus_total + (float)$rv[16];
									$tulip_total = $tulip_total + (float)$rv[7];
									$lake_total = $lake_total + (float)$rv[5];
									$grande_total = $grande_total + (float)$rv[15];
									$cyber_total = $cyber_total + (float)$rv[12];
									$aura_total = $aura_total + (float)$rv[11];
									$boulevard_total = $boulevard_total + (float)$rv[8];
									$gardenia_total = $gardenia_total + (float)$rv[14];
									$county_total = $county_total + (float)$rv[19];  ?>
                            <td><span><?php echo round($resd,0); ?></span></td>
                        </tr>
                         <tr>
                        	<td class="text-left col2"><b>Courier / Delivery Boys (Persons)</b></td>
                             <?php 
                                $cdtotal = 0; 
                                foreach($courier_delivery as $skey => $cdelivery)
                                { 
                                    if( (float)$numdays != 0) $cdelivery = (float)((float)$cdelivery/(float)$numdays);
									$rv[$skey]=$cdelivery;
                           ?>
                           <td> 
                                <span><?php  echo round($cdelivery,0);
								$cdtotal = $cdtotal + (float)$cdelivery;?></span>
                           </td>
                            <?php } $saro_total = $saro_total + (float)$rv[9];
									$tower_total = $tower_total + (float)$rv[18];
									$oosman_total = $oosman_total + (float)$rv[17];
									$elina_total = $elina_total + (float)$rv[20];
									$lotus_total = $lotus_total + (float)$rv[16];
									$tulip_total = $tulip_total + (float)$rv[7];
									$lake_total = $lake_total + (float)$rv[5];
									$grande_total = $grande_total + (float)$rv[15];
									$cyber_total = $cyber_total + (float)$rv[12];
									$aura_total = $aura_total + (float)$rv[11];
									$boulevard_total = $boulevard_total + (float)$rv[8];
									$gardenia_total = $gardenia_total + (float)$rv[14];
									$county_total = $county_total + (float)$rv[19];  ?>
                            <td><span><?php echo round($cdtotal,0); ?></span></td>
                        </tr>
                         <tr>
                        	<td class="text-left col2"><b>Visitors</b></td>
                          <?php 
                                $vcount = 0; 
                                foreach($visitors as $skey => $visitor)
                                { 
                                    if( (float)$numdays != 0) $visitor = (float)((float)$visitor/(float)$numdays);
									$rv[$skey]=$visitor;
                           ?>
                           <td> 
                                <span><?php  echo round($visitor,0);
								$vcount = $vcount + (float)$visitor;?></span>
                           </td>
                            <?php } $saro_total = $saro_total + (float)$rv[9];
									$tower_total = $tower_total + (float)$rv[18]; 
									$oosman_total = $oosman_total + (float)$rv[17];
									$elina_total = $elina_total + (float)$rv[20];
									$lotus_total = $lotus_total + (float)$rv[16];
									$tulip_total = $tulip_total + (float)$rv[7];
									$lake_total = $lake_total + (float)$rv[5];
									$grande_total = $grande_total + (float)$rv[15];
									$cyber_total = $cyber_total + (float)$rv[12];
									$aura_total = $aura_total + (float)$rv[11];
									$boulevard_total = $boulevard_total + (float)$rv[8];
									$gardenia_total = $gardenia_total + (float)$rv[14];
									$county_total = $county_total + (float)$rv[19]; ?>
                            <td><span><?php echo round($vcount,0); ?></span></td>
                        </tr>
                         <tr>
                        	<td class="text-left col2"><b>Construction Team (persons)</b></td>
                           <?php 
                                $ctcount = 0; 
                                foreach($construc_team as $skey => $cteam)
                                { 
                                    if( (float)$numdays != 0) $cteam = (float)((float)$cteam/(float)$numdays);
									$rv[$skey]=$cteam;
                           ?>
                           <td> 
                                <span><?php  echo round($cteam,0);
								$ctcount = $ctcount + (float)$cteam;?></span>
                           </td>
                            <?php } $saro_total = $saro_total + (float)$rv[9];
									$tower_total = $tower_total + (float)$rv[18];
									$oosman_total = $oosman_total + (float)$rv[17];
									$elina_total = $elina_total + (float)$rv[20];
									$lotus_total = $lotus_total + (float)$rv[16];
									$tulip_total = $tulip_total + (float)$rv[7];
									$lake_total = $lake_total + (float)$rv[5];
									$grande_total = $grande_total + (float)$rv[15];
									$cyber_total = $cyber_total + (float)$rv[12];
									$aura_total = $aura_total + (float)$rv[11];
									$boulevard_total = $boulevard_total + (float)$rv[8];
									$gardenia_total = $gardenia_total + (float)$rv[14];
									$county_total = $county_total + (float)$rv[19];  ?>
                            <td><span><?php echo round($ctcount,0); ?></span></td>
                        </tr>
                         <tr>
                        	<td class="text-left col2"><b>Inter Works in flats/Villas</b></td>
                            <?php 
                                $icount = 0; 
                                foreach($interworks_inflats as $skey => $inflats)
                                { 
                                    if( (float)$numdays != 0) $inflats = (float)((float)$inflats/(float)$numdays);
									$rv[$skey]=$inflats;
                           ?>
                           <td> 
                                <span><?php  echo round($inflats,0);
								$icount = $icount + (float)$inflats;?></span>
                           </td>
                            <?php } $saro_total = $saro_total + (float)$rv[9];
									$tower_total = $tower_total + (float)$rv[18]; 
									$oosman_total = $oosman_total + (float)$rv[17];
									$elina_total = $elina_total + (float)$rv[20];
									$lotus_total = $lotus_total + (float)$rv[16];
									$tulip_total = $tulip_total + (float)$rv[7];
									$lake_total = $lake_total + (float)$rv[5];
									$grande_total = $grande_total + (float)$rv[15];
									$cyber_total = $cyber_total + (float)$rv[12];
									$aura_total = $aura_total + (float)$rv[11];
									$boulevard_total = $boulevard_total + (float)$rv[8];
									$gardenia_total = $gardenia_total + (float)$rv[14];
									$county_total = $county_total + (float)$rv[19]; ?>
                            <td><span><?php echo round($icount,0); ?></span></td>
                        </tr>
                         <tr>
                        	<td class="text-left col2"><b>Interior Workers per day</b></td>
                            <?php 
                                $wcount = 0; 
                                foreach($interior_works_per_day as $skey => $works)
                                { 
                                    if( (float)$numdays != 0) $works = (float)((float)$works/(float)$numdays);
									$rv[$skey]=$works;
                           ?>
                           <td> 
                                <span><?php  echo round($works,0);
								$wcount = $wcount + (float)$works;?></span>
                           </td>
                            <?php } 
									$overall_total=0;
									$saro_total = $saro_total + (float)$rv[9]; 
									$tower_total = $tower_total + (float)$rv[18];
									$oosman_total = $oosman_total + (float)$rv[17];
									$elina_total = $elina_total + (float)$rv[20];
									$lotus_total = $lotus_total + (float)$rv[16];
									$tulip_total = $tulip_total + (float)$rv[7];
									$lake_total = $lake_total + (float)$rv[5];
									$grande_total = $grande_total + (float)$rv[15];
									$cyber_total = $cyber_total + (float)$rv[12];
									$aura_total = $aura_total + (float)$rv[11];
									$boulevard_total = $boulevard_total + (float)$rv[8];
									$gardenia_total = $gardenia_total + (float)$rv[14];
									$county_total = $county_total + (float)$rv[19];
									$overall_total=$saro_total+$tower_total+$oosman_total+$elina_total+$lotus_total+$tulip_total+$lake_total+$grande_total+$cyber_total+$aura_total+$boulevard_total+$gardenia_total+$county_total; ?>
                            <td><span><?php echo round($wcount,0); ?></span></td>
                        </tr>
                         <tr style="background-color:#b5a46b;">  
                        	<td class="text-left col3"><b>Total</b></td>
                           <td>
                                <span><?php echo round($saro_total,0);?></span>
                           </td>
                           <td>
                                <span><?php echo round($tower_total,0);?></span>
                           </td>
                           <td>
                               <span> <?php echo round($oosman_total,0);?></span>
                           </td>
                           <td>
                                <span><?php echo round($elina_total,0);?></span>
                           </td>
                           <td>
                               <span> <?php echo round($lotus_total,0);?></span>
                           </td>
                           <td>
                                <span><?php echo round($tulip_total,0);?></span>
                           </td>
                           <td>
                                <span><?php echo round($lake_total,0);?></span>
                           </td>
                           <td>
                                <span><?php echo round($grande_total,0);?></span>
                           </td>
                           <td>
                                <span><?php echo round($cyber_total,0);?></span>
                           </td>
                           <td>
                                <span><?php echo round($aura_total,0);?></span>
                           </td>
                           <td>
                                <span><?php echo round($boulevard_total,0);?></span>
                           </td>
                           <td>
                                <span><?php echo round($gardenia_total,0);?></span>
                           </td>
                           <td>
                                <span><?php echo round($county_total,0);?></span>
                           </td>
                           <td><span><?php echo round($overall_total,0); ?></span></td>
                        </tr>
                     </table> 
                  </div>
               
                  <!-- <div class="note-points">
                   		<label>Note-</label>
                        <ol type="1">
                        	<li>62 School buses are included in Sarovar traffic.</li>
                            <li>Traffic is for only one side. Total traffic controlled by security is double the indicated figures</li>
                        </ol>
                   </div>-->
                        
                </div>
              </div>
            </div>
			
    <script src="/build/js/custom.min.js"></script>	
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    @include('partials.footer')
@stop