

    <!-- Bootstrap -->

    <link rel="icon" href="images/ICON.png">

    <link href="/vendors1/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->

    <link href="/vendors1/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- NProgress -->

    <link href="/vendors1/nprogress/nprogress.css" rel="stylesheet">

    <!-- iCheck -->

    <link href="/vendors1/iCheck/skins/flat/green.css" rel="stylesheet">

	

    <!-- bootstrap-progressbar -->

    <link href="/vendors1/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">

    <!-- JQVMap -->

    <link href="/vendors1/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>

    <!-- bootstrap-daterangepicker -->

    <link href="/vendors1/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">



    <!-- Custom Theme Style -->

    <link href="/build/css/custom.css" rel="stylesheet">

    <style>

	html

	{

	 height:95%;

	 margin:0px;

	 font-size:12px;

	}

	.date

	{

	 text-align:right;

	 font-weight:bold;

	 color:#00754d;

	 font-size:14px;

	}
	.back-button
{
     width: 80%;
    margin: 0 auto;
    padding-bottom: 10px;
	text-align:right;
}

	table tbody tr th

	{

	 font-weight:bold;

	}

	table tbody tr td

	{

	 font-weight:400;

	}

	.sign

	{

	 margin-top:4px;

	}

	.pms-report table tbody tr th

	{

	 padding:7px;

	 text-align:center;

	 }

	.pms-report table tbody tr td

	{

	 padding:7px;

	 text-align:center;

	 }
	/* .pms-report table
	 {
	  width:80%;
	 }
      .pms-report table tbody tr td.strict
	  {
	   width:100%;
	  }*/
	 .pms-report table tbody tr td.text-left

	{

	 

	 text-align:left;

	 }

	  .pms-report table tbody tr th.text-left

	{

	 

	 text-align:left;

	 }

	.pms-report table tbody tr td span

	{

	  color:#0000FF;

	 font-weight:bold;

	}
	.back-button a
	{
	 background-color:#8dbb3c;
	 color:white;
	 padding:4px 10px;
	 font-weight:600;
	 border-radius:4px;
	 text-decoration:none;
	}
    .back-button a:hover
	{
	 color:#000;
	 text-decoration:none;
	}
   .x_title
   {
    width:80%;
	margin:0 auto;
	overflow:hidden;
	border-bottom:none;
	margin-bottom:0px;
   }
   .only-for-table table
   {
    width:80%;
	margin:0 auto;
   }
 
.report-by
{
 float:right;
}
.last-modified
{
 float:left;
 padding-top:6px;
}
.bukaraa
{
 width:80%;
 margin:0 auto;
}
b
{
 color:#000;
}
	</style>

     @extends('layouts.app')



@section('content')

  

    <div class="body">

      <div class="main_container pme-man-pow">

 <?php $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 

									$sitevv = $uriSegments[2]; ?>

			 <div class="back-button"><a href="/getdailyreportdetail/<?php echo $sitevv;  ?>/<?php echo $uriSegments[3];  ?>">Back</a></div>
      	<?php /*?><?php include "header.php" ?><?php */?>



        <!-- page content -->

        <div class="right_col" role="main">

 

          <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">

              <div class="tile fixed_height_400">

                <div class="x_title main-tera-hero">

                   <span class="col-sm-6 col-xs-6" style="color:#ff4800;font-weight:bold;padding-right:0px;font-size:14px;margin-top:7px;">APMS | <?php echo get_sitename($sitefilter);?></span>

                   <div class="col-sm-6 col-xs-6 date pms"><?php /*?><input type="text" style="border:1px solid #000;" value=""><?php */?>HORTICULTURE | DATE: <?php echo $datefilter;?> | TIME: <?php date_default_timezone_set('Asia/Kolkata'); echo date("h:i:sa"); $pemsresv = getdefaultpmstot($sitefilter); ?></div>

                </div>

                <div class="x_content pms-report pms-view" style="color:#000;">
                  <div class="only-for-table">
                	<table  border="1" width="80%" style="text-align:left;font-size:12px;border:1px solid #000;" class="print">

                    	<tbody style="border:1px solid #000;">

                        	<tr style="background-color:#b8cde6;">

                            	<td rowspan="11" class="rotate-text" style="border-bottom:1px solid #fff;"><div style="width: 55px;">Manpower</div></td>

                            </tr>

                        	<tr style="text-align:left;background-color:#ffc1070f;">
                            	<td><b>Attendance</b></td>
                                <td><b>Watering</b></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                           	</tr>

                            <tr>

                         <td>Sup: <span><?php if(isset($res['land_atten_sup']))echo $res['land_atten_sup']; ?> /<?php echo $pemsresv['land_sup'];?> </span>&nbsp;&nbsp;&nbsp;&nbsp;
                             Helper: <span><?php if(isset($res['land_atten_helper']))echo $res['land_atten_helper']; ?> / <?php echo $pemsresv['land_helper'];?> </span>
                         </td>

                        <td>
                            Qty (Kl): <span><?php if(isset($res['land_water_qty']))echo $res['land_water_qty']; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
                            Time: <span><?php if(isset($res['land_water_time']))echo $res['land_water_time']; ?></span>
                        </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                                
                        </tr> 

                           

                           <tr style="background-color:#ffc1070f;">
                             <td><b>Activity</b></td>
                             <td ><b>Location</b></td>
                              <td><b>Count</b></td>
                              <td><b>Activity</b></td>
                             <td><b>Location</b></td>
                              <td><b>Count</b></td>
                           </tr>
                           
                                      
                                    	<tr>
                                          <?php if(isset($res['land_spray_location'])) {?>
                                        	<td style="text-align:left;">Lawn Mowing </td>
                                            <td  style="text-align:left;"><span><?php if(isset($res['land_spray_location']))echo $res['land_spray_location']; ?></span></td>
                                            <td style="text-align:left;"><span><?php if(isset($res['land_spray_mem']))echo $res['land_spray_mem']; ?></span></td>
                                       
                                        <?php } if(isset($res['land_garden_waste'])) {?>
                                       
                                        	<td style="text-align:left;">Lawn Edge Cutting </td>
                                            <td style="text-align:left;"><span><?php if(isset($res['land_Weeding_location']))echo $res['land_Weeding_location']; ?></span></td>
                                            <td style="text-align:left;"><span><?php if(isset($res['land_Weeding_memcn']))echo $res['land_Weeding_memcn']; ?></span></td>
                                        </tr>
                                        
                                        <tr style="text-align:left;">
                                         <?php } if(isset($res['land_mowing_location'])) {?>
                                        	<td style="text-align:left;">Pesticide Application </td>
                                            <td  style="text-align:left;"><span><?php if(isset($res['land_mowing_location']))echo $res['land_mowing_location']; ?></span></td>
                                            <td style="text-align:left;"><span><?php if(isset($res['land_mowing_memcn']))echo $res['land_mowing_memcn']; ?></span></td>
                                       
                                         <?php } if(isset($res['land_application'])) {?>
                                         
                                        	<td style="text-align:left;">Fertilizer Application</td>
                                            <td style="text-align:left;"><span><?php if(isset($res['land_application']))echo $res['land_application']; ?></span></td>
                                            <td style="text-align:left;"><span><?php if(isset($res['land_application_mem']))echo $res['land_application_mem']; ?></span></td>
                                        </tr>
                                        
                                       <tr style="text-align:left;">  
                                         <?php } if(isset($res['land_mulching'])) {?>
                                          
                                        	<td style="text-align:left;">Manual Watering </td>
                                            <td style="text-align:left;"><span><?php if(isset($res['land_mulching']))echo $res['land_mulching']; ?></span></td>
                                            <td style="text-align:left;"><span><?php if(isset($res['land_mulching_mem']))echo $res['land_mulching_mem']; ?></span></td>
                                        
                                         <?php } if(isset($res['land_trimming'])) {?>
                                         
                                        	<td style="text-align:left;">Weeding </td>
                                            <td style="text-align:left;"><span><?php if(isset($res['land_trimming']))echo $res['land_trimming']; ?></span></td>
                                           <td style="text-align:left;"><span><?php if(isset($res['land_trimming_mem']))echo $res['land_trimming_mem']; ?></span></td>
                                        </tr>
                                        
                                        
                                       <tr style="text-align:left;"> 
                                         <?php } if(isset($res['land_cutting'])) {?>
                                           
                                        	<td style="text-align:left;">Hoeing </td>
                                            <td style="text-align:left;"><span><?php if(isset($res['land_cutting']))echo $res['land_cutting']; ?></span></td>
                                            <td style="text-align:left;"><span><?php if(isset($res['land_cutting_mem']))echo $res['land_cutting_mem']; ?></span></td>
                                       
                                         <?php } if(isset($res['land_pruning'])) {?>
                                          
                                        	<td style="text-align:left;">Trimming </td>
                                            <td style="text-align:left;"><span><?php if(isset($res['land_pruning']))echo $res['land_pruning']; ?></span></td>
                                            <td style="text-align:left;"><span><?php if(isset($res['land_pruning_mem']))echo $res['land_pruning_mem']; ?></span></td>
                                        </tr>
                                        
                                        
                                         <tr style="text-align:left;">
                                         <?php } if(isset($res['land_shaping'])) {?>
                                         
                                        	<td style="text-align:left;">Pruning </td>
                                            <td style="text-align:left;"><span><?php if(isset($res['land_shaping']))echo $res['land_shaping']; ?></span></td>
                                            <td style="text-align:left;"><span><?php if(isset($res['land_shaping_mem']))echo $res['land_shaping_mem']; ?></span></td>
                                        
                                         <?php } if(isset($res['land_hoeing'])) {?>
                                         
                                        	<td style="text-align:left;">Cleaning </td>
                                            <td style="text-align:left;"><span><?php if(isset($res['land_hoeing']))echo $res['land_hoeing']; ?></span></td>
                                            <td style="text-align:left;"><span><?php if(isset($res['land_hoeing_mem']))echo $res['land_hoeing_mem']; ?></span></td>
                                        </tr>
                                        
                                        <tr style="border-bottom:1px solid #fff;text-align:left;">
                                         <?php } if(isset($res['land_garden_waste'])) {?>
                                          
                                        	<td style="text-align:left;">Garden Waste Disposal </td>
                                            <td style="text-align:left;"><span><?php if(isset($res['land_garden_waste']))echo $res['land_garden_waste']; ?></span></td>
                                            <td style="text-align:left;"><span><?php if(isset($res['land_garden_waste_mem']))echo $res['land_garden_waste_mem']; ?></span></td>
                                        
                                         <?php } if(isset($res['land_extra_activity'])) {?>
                                          
                                        	<td style="text-align:left;">Extra Activities </td>
                                            <td style="text-align:left;"><span><?php if(isset($res['land_extra_activity']))echo $res['land_extra_activity']; ?></span></td>
                                           <td style="text-align:left;"><span><?php if(isset($res['land_extra_activity_mem']))echo $res['land_extra_activity_mem']; ?></span></td>
                                        </tr>
                                         <?php }  ?>
                                         
                                  
                          
<!--
                            <tr> 

                            	<td colspan="3" class="text-left" style="border-left:1px solid #fff; vertical-align:top;border-bottom:1px solid #fff;">
                                    
                                </td>
                                <td colspan="2" class="text-left" style="border-bottom:1px solid #fff;">

								
                                </td>
                            </tr>-->

                           

                        </tbody>  

                    </table> 

                    <table border="1" width="80%" style="font-size:12px;border:1px solid #000;">

                    	<tbody style="border:1px solid #000;">

                        	<tr style="background-color:#cce0d0;">

                            	<td rowspan="5" class="rotate-text" style="border-bottom:1px solid #fff;"><div style="width: 55px;">Irrigation System</div></td>

                            </tr>

                        	<tr>

                            	<td style="background-color:#ffc1070f;"><b>Solenoid Valves</b></td>
                                <td style="background-color:#ffc1070f;"><b>Sprinklers</b></td>
                                <td style="background-color:#ffc1070f;"><b>Qucik Coupling Values</b></td>
                                <td style="background-color:#ffc1070f;"><b>Schedule-1</b></td>
                                <td style="background-color:#ffc1070f;"><b>Schedule-2</b></td>
                                <td style="background-color:#ffc1070f;"><b>Schedule-3</b></td>
                                
                           	</tr>

                            <tr> 

                            	<td>
                                		Total: <span><?php echo $pemsresv['solonide_valves'];?></span><br />
                                        Not Working: <?php if(isset($res['solonide_valve_nw']))echo "<span>".$res['solonide_valve_nw']."</span><br/>"; ?>
                                        Repaired: <?php if(isset($res['solonide_valve_rw']))echo "<span>".$res['solonide_valve_rw']."</span><br/>"; ?>
                                       <?php if(isset($res['solonide_valve_reason']))echo " Reason:<span>".$res['solonide_valve_reason']."</span><br/>"; ?>
                                </td>
                                <td>
                                		Total: <span><?php echo $pemsresv['sprinklers'];?></span><br />
                                        Not Working: <?php if(isset($res['land_clean_sprinknw']))echo "<span>".$res['land_clean_sprinknw']."</span><br/>"; ?>
                                        Repaired: <?php if(isset($res['land_clean_sprinkrw']))echo "<span>".$res['land_clean_sprinkrw']."</span><br/>"; ?>
                                       <?php if(isset($res['land_clean_sprink_reason']))echo " Reason:<span>".$res['land_clean_sprink_reason']."</span><br/>"; ?>
                                </td>
                                <td>
                                	Total: <span><?php echo $pemsresv['quick_coupling_valves'];?></span><br />
                                    Not Working: <?php if(isset($res['quick_couple_nw']))echo "<span>".$res['quick_couple_nw']."</span><br/>"; ?>
                                    Repaired: <?php if(isset($res['quick_couple_rw']))echo "<span>".$res['quick_couple_rw']."</span><br/>"; ?>
                                   <?php if(isset($res['quick_couple_reason']))echo " Reason:<span>".$res['quick_couple_reason']."</span><br/>"; ?>
                                </td>
                                <td>
                                	<b>Drip:</b><br />
                                    Start Time: <?php if(isset($res['drip_stime1']))echo "<span>".$res['drip_stime1']."</span><br/>"; ?>
                                    Stop Time: <?php if(isset($res['drip_sotime1']))echo "<span>".$res['drip_sotime1']."</span><br/>"; ?>
                                    <b>Sprinkler:</b><br />                                    
                                    Start Time: <?php if(isset($res['sprink_stime1']))echo "<span>".$res['sprink_stime1']."</span><br/>"; ?>
                                    Stop Time: <?php if(isset($res['sprink_sotime1']))echo "<span>".$res['sprink_sotime1']."</span><br/>"; ?>
                                </td>
                                <td>
                                	<b>Drip:</b><br />
                                    Start Time: <?php if(isset($res['drip_stime2']))echo "<span>".$res['drip_stime2']."</span><br/>"; ?>
                                    Stop Time: <?php if(isset($res['drip_sotime2']))echo "<span>".$res['drip_sotime2']."</span><br/>"; ?>
                                    <b>Sprinkler:</b><br />                                    
                                    Start Time: <?php if(isset($res['sprink_stime2']))echo "<span>".$res['sprink_stime2']."</span><br/>"; ?>
                                    Stop Time: <?php if(isset($res['sprink_sotime2']))echo "<span>".$res['sprink_sotime2']."</span><br/>"; ?>
                                </td>

                                <td>
                                	<b>Drip:</b><br />
                                    Start Time: <?php if(isset($res['drip_stime3']))echo "<span>".$res['drip_stime3']."</span><br/>"; ?>
                                    Stop Time: <?php if(isset($res['drip_sotime3']))echo "<span>".$res['drip_sotime3']."</span><br/>"; ?>
                                    <b>Sprinkler:</b><br />                                    
                                    Start Time: <?php if(isset($res['sprink_stime3']))echo "<span>".$res['sprink_stime3']."</span><br/>"; ?>
                                    Stop Time: <?php if(isset($res['sprink_sotime3']))echo "<span>".$res['sprink_sotime3']."</span><br/>"; ?>
                                </td>

                               
                                

                            </tr> 

                            </tbody>

                    </table>

                    <table  border="1" width="80%" style="font-size:12px;border:1px solid #000;">

                    	<tbody style="border:1px solid #000;">

                        	<tr style="background-color:#b8cde6;">

                            	<td rowspan="5" class="rotate-text" style="border-bottom:1px solid #fff;"><div style="width: 55px;">Watering</div></td>

                            </tr>

                        	<tr style="background-color:#ffc1070f;">

                            	<th>Location</th>

                                <th>Manpower</th>

                                <th>Watering Hrs.</th>
                                
                                <th>Location</th>

                                <th>Manpower</th>

                                <th>Watering Hrs.</th>

                           	</tr>
                            <?php 
								if(count($waterRes)>0) { 
								$i=0;
								foreach($waterRes as $water) {
								$i++;
								//echo "<pre>"; print_r($water); echo "</pre>";
							?>
                            <tr>
                            	<?php if($i%2==0) { ?>
                            	<td>
                                	<?php if($water['location']!="") echo $water['location']; else echo ""; ?>
                                </td>
                                <td>
                                	<?php if($water['manpower']!="") echo $water['manpower']; else echo ""; ?>
                                </td>
                                <td>
                                	<?php if($water['hrs']!="") echo $water['hrs']; else echo ""; ?>
                                </td>
                                <?php } else { ?>
                                <td>
                                	<?php if($water['location']!="") echo $water['location']; else echo ""; ?>
                                </td>
                                <td>
                                	<?php if($water['manpower']!="") echo $water['manpower']; else echo ""; ?>
                                </td>
                                <td>
                                	<?php if($water['hrs']!="") echo $water['hrs']; else echo ""; ?>
                                </td>
                                <?php } ?>
                            </tr>
                            <?php }} ?>

                           

                            </tbody> 

                    </table>

                    

                     <table  border="1"  width="80%" style="font-size:12px;border:1px solid #000;">

                    	<tbody style="border:1px solid #000;">

                        	<tr style="background-color:#cce0d0;">

                            	<td rowspan="7" class="rotate-text" style="border-bottom:1px solid #fff;"><div style="width: 55px;">Apna Complex</div></td>

                            </tr>

                        	<tr style="background-color:#ffc1070f;">

                            	<th rowspan="2"></th>

                                <th rowspan="2">Previous</th>

                                <th colspan="3">Opened</th>

                                <th rowspan="2">Resolved</th>

                                <th rowspan="2">Pending</th>

                                <th rowspan="2">Remarks</th>

                           	</tr>

                            <tr style="background-color:#ffc1070f;">

                            	

                                <th>Help Desk</th>

                                <th>Login</th>

                                <th>Total</th>

                               

                           	</tr>

                            <tr>

                            	<td>APMS</td>
								

                                <td><span><?php if(isset($res['apna_apms_previous']))echo $res['apna_apms_previous']; ?></span></td>

                                <td><span><?php if(isset($res['apna_apms_opened_help']))echo $res['apna_apms_opened_help']; ?></span></td>

                                <td><span><?php if(isset($res['apna_apms_opened_login']))echo $res['apna_apms_opened_login']; ?></span></td>

                                <td><span><?php if(isset($res['apna_apms_opened_total']))echo $res['apna_apms_opened_total']; ?></span></td>

                                <td><span><?php if(isset($res['apna_apms_resolved']))echo $res['apna_apms_resolved']; ?></span></td>
								
                                  <?php $apna_pend = 0; ?>
                                <td><span><?php if(isset($res['apna_apms_pending'])) { $apna_pend = $res['apna_apms_pending']; echo $res['apna_apms_pending'];} ?></span></td>

                             <td rowspan="3" class="text-left" style="border-bottom:1px solid #fff;"><?php if(isset($res['apna_apms_remarks'])) { if($res['apna_apms_remarks']) echo '<span>APMS: '.$res['apna_project_remarks']."</span><br>";} ?><?php if(isset($res['apna_apms_remarks'])) {  if($res['apna_project_remarks']) echo '<span>Project: '.$res['apna_project_remarks']."</span><br>"; } ?>

                                </td>

                            </tr>

                            <tr>

                            	<td>PROJECT</td>
								<?php $pro_prev = 0;
								      $pro_op_tot = 0;
									  $pro_resol = 0;
								 ?>

                                 <td><span><?php if(isset($res['apna_project_previous'])) { $pro_prev = $res['apna_project_previous'];  echo $res['apna_project_previous']; } ?></span></td>

                                <td><span><?php if(isset($res['apna_project_opened_help']))echo $res['apna_project_opened_help']; ?></span></td>

                                <td><span><?php if(isset($res['apna_project_opened_login']))echo $res['apna_project_opened_login']; ?></span></td>

                                <td><span><?php if(isset($res['apna_project_opened_total'])) { $pro_op_tot = $res['apna_project_opened_total'];  echo $res['apna_project_opened_total']; } ?></span></td>

                                <td><span><?php if(isset($res['apna_project_resolved'])) {  $pro_resol = $res['apna_project_resolved']; echo $res['apna_project_resolved']; }  ?></span></td>
								
								<?php $pro_pen = $res['apna_project_previous'] + $res['apna_project_opened_total'] - $res['apna_project_resolved']; ?>

                                <td><span><?php echo $pro_pen = $pro_prev + $pro_op_tot - $pro_resol ; //if(isset($res['apna_project_pending']))echo $res['apna_project_pending']; ?></span></td>
  
                            </tr>

                            <tr style="border-bottom:1px solid #fff;">

                            	<td>TOTAL</td>

                                 <td><span><?php $ap=0; $pp = 0; if(isset($res['apna_apms_previous'])) { $res['apna_apms_previous']; $ap = (float)$res['apna_apms_previous']; } ?>

								 		   <?php if(isset($res['apna_project_previous'])) { $res['apna_project_previous']; $pp = (float)$res['apna_project_previous']; } 

										   echo $ap + $pp; ?></span></td>

								  <td><span><?php if(isset($res['apna_apms_opened_help'])) { $res['apna_apms_opened_help']; $ap = (float)$res['apna_apms_opened_help']; } ?>

								 		   <?php if(isset($res['apna_project_opened_help'])) { $res['apna_project_opened_help']; $pp = (float)$res['apna_project_opened_help']; } 

										   echo $ap + $pp; ?></span></td>

								 <td><span><?php if(isset($res['apna_apms_opened_login'])) { $res['apna_apms_opened_login']; $ap = (float)$res['apna_apms_opened_login']; } ?>

								 		   <?php if(isset($res['apna_project_opened_login'])) { $res['apna_project_opened_login']; $pp = (float)$res['apna_project_opened_login']; } 

										   echo $ap + $pp; ?></span></td>

								 <td><span><?php if(isset($res['apna_apms_opened_total'])) { $res['apna_apms_opened_total']; $ap = (float)$res['apna_apms_opened_total']; } ?>

								 		   <?php if(isset($res['apna_project_opened_total'])) { $res['apna_project_opened_total']; $pp = (float)$res['apna_project_opened_total']; } 

										   echo $ap + $pp; ?></span></td>

								<td><span><?php if(isset($res['apna_apms_resolved'])) { $res['apna_apms_resolved']; $ap = (float)$res['apna_apms_resolved']; } ?>

								 		   <?php if(isset($res['apna_project_resolved'])) { $res['apna_project_resolved']; $pp = (float)$res['apna_project_resolved']; } 

										   echo $ap + $pp; ?></span></td>

								<td><span><?php if(isset($res['apna_apms_pending'])) { $res['apna_apms_pending']; $ap = (float)$res['apna_apms_pending']; } ?>

								 		   <?php if(isset($res['apna_project_pending'])) { $res['apna_project_pending']; $pp = (float)$res['apna_project_pending']; } 

										   echo $ap + $pro_pen; ?></span></td>

                            </tr>

                            

                            </tbody>

                    </table>  

                    

                     <table  border="1" width="80%" style="font-size:12px;border:1px solid #000;">

                    	<tbody style="border:1px solid #000;">

                        	<tr style="background-color:#b8cde6;">

                            	<td rowspan="7" class="rotate-text" style="border-bottom:1px solid #fff;"><div style="width: 55px;">Occupancy</div></td>

                            </tr>

                        	<tr style="background-color:#ffc1070f;">

                                <th colspan="2">On The Day</th>

                                <th colspan="3">Occupancy as on Date</th>

                                <th>Remarks</th>

                           	</tr>

                            <tr>

                            	

                                <td>Moved in</td>

                                <td>Vacated</td>

                                <td>Owners</td>

                                <td>Tenants</td>

                                <td>Vacant</td>

                                 <td rowspan="3" class="text-left" style="border-bottom:none;"><span><?php if(isset($res['occupancy_asdate_remarks']))echo $res['occupancy_asdate_remarks']; ?></span>

                                </td>

                           	</tr>

                            <tr style="border-bottom:0px;">

                            	<td style="border-bottom:1px solid #fff;">Owners: <span><?php if(isset($res['occupancy_move_owners']))echo $res['occupancy_move_owners']; ?></span></td>

                                <td>Owners: <span><?php if(isset($res['occupancy_vacated_owners']))echo $res['occupancy_vacated_owners']; ?></span></td>

                                <td style="border-bottom:1px solid #000;"><span><?php if(isset($res['occupancy_asdate_owners']))echo $res['occupancy_asdate_owners']; ?></span></td>

                                <td style="border-bottom:1px solid #000;"><span><?php if(isset($res['occupancy_asdate_tenants']))echo $res['occupancy_asdate_tenants']; ?></span></td>

                                <td><span><?php if(isset($res['occupancy_asdate_vacant']))echo $res['occupancy_asdate_vacant']; ?></span></td>

                               

                            </tr>

                            <tr style="border-bottom:none;">

                            	<td>Tenants: <span><?php if(isset($res['occupancy_move_tenants']))echo $res['occupancy_move_tenants']; ?></span></td>

                                 <td>Tenants: <span><?php if(isset($res['occupancy_vacated_tenants']))echo $res['occupancy_vacated_tenants']; ?></span></td>

                                <!--<td><span></span></td>-->

                                <td colspan="2"><span><?php $apw = 0; $ppw =0; if(isset($res['occupancy_asdate_owners'])) { $res['occupancy_asdate_owners']; $apw = (float)$res['occupancy_asdate_owners']; } ?>

								 		   <?php if(isset($res['occupancy_asdate_tenants'])) { $res['occupancy_asdate_tenants']; $ppw = (float)$res['occupancy_asdate_tenants']; } 

										   echo $apw + $ppw; ?></span></td>

                                <td><span></span></td>

                            </tr>

                            </tbody> 

                    </table>

                    

                     <table  border="1"  width="80%" style="font-size:12px;border:1px solid #000;">

                    	<tbody style="border:1px solid #000;">

                        	<tr style="border-bottom:1px solid #fff;background-color:#cce0d0;">

                            	<td rowspan="3" class="rotate-text"><div style="width: 55px;">IMPREST</div></td>

                            </tr>

                        	<tr style="background-color:#ffc1070f;">

                                <th>Cash on Hand (<i class="fa fa-inr" aria-hidden="true"></i>):</th>
                                   <th>Date of Statement Sent &amp; Amount</th>

                                <th>Bills on Hand (<i class="fa fa-inr" aria-hidden="true"></i>):</th>

                              
                                
                                <th>Date of Statement Sent &amp; Amount</th>
                                

                           	</tr>

                            <tr style="border-bottom:1px solid #fff;">

                            	

                                <td><span><?php if(isset($res['imprest_cash_on_hand']))echo $res['imprest_cash_on_hand']; ?></span></td>
                                <td><span><?php if(isset($res['imprest_dateof_statement']))echo $res['imprest_dateof_statement']; ?><?php if(isset($res['dateof_statement_amount'])) { if($res['dateof_statement_amount']) echo ": " .$res['dateof_statement_amount']; }?></span></td>

                                <td><span><?php if(isset($res['imprest_bills_on_hand']))echo $res['imprest_bills_on_hand']; ?></span></td>

                                
                                     <td><span><?php if(isset($res['imprest_dateof_statement_2']))echo $res['imprest_dateof_statement_2']; ?><?php if(isset($res['dateof_statement_amount_2'])) { if($res['imprest_dateof_statement_2']) echo ": " .$res['dateof_statement_amount_2']; }?></span></td>
                                
                                
                           	</tr>

                            

                            </tbody>

                    </table>

                    

                    <table  border="1" width="80%" style="font-size:12px;border:1px solid #000;">

                    	<tbody style="border:1px solid #000;">

                        	<tr style="background-color:#b8cde6;">

                            	<td rowspan="4" class="rotate-text" style="border-bottom:1px solid #fff;"><div style="width: 55px;">gas</div></td>

                            </tr>

                        	<tr style="background-color:#ffc1070f;">

                                <th colspan="3">Transaction Supervised by:</th>

                                <th rowspan="2" style="border-right:1px solid #fff;border-bottom:0px;">Full Cyl. Recd:</th>

                                <th rowspan="2" style="border-bottom:0px;">Empty Cyl. Taken Out:</th>

                           	</tr>

                            <tr style="background-color:#ffc1070f;">

                            	<th>APMS</th>

                                <th>Society</th>

                                <th>Security</th>

                            </tr>

                            <tr style="border-bottom:1px solid #fff;">

                            	<td><span><?php if(isset($res['gas_transact_supervise_by']))echo $res['gas_transact_supervise_by']; ?></span></td>

                                <td><span><?php if(isset($res['gas_transact_socity']))echo $res['gas_transact_socity']; ?></span></td>

                                <td><span><?php if(isset($res['gas_transact_security']))echo $res['gas_transact_security']; ?></span></td>

                                <td style="border-right:1px solid #fff;"><span><?php if(isset($res['gas_transact_full_cyl_recd']))echo $res['gas_transact_full_cyl_recd']; ?></span></td>

                                <td><span><?php if(isset($res['gas_empty_cyl_taken_out']))echo $res['gas_empty_cyl_taken_out']; ?></span></td>

                           	</tr>

                            

                            </tbody>

                    </table>

                    

                     <table  border="1" width="80%" style="font-size:12px;border:1px solid #000;">

                    	<tbody style="border:1px solid #000;">

                            <tr style="border-bottom:1px solid #fff;">

                                <td class="text-left" style="border-right:1px solid #fff;"><b>Attendance Verified:</b> <span><?php if(isset($res['info_attend_verified']))echo $res['info_attend_verified']; ?> </span></td>

                                <td class="text-left" style="border-right:1px solid #fff;"><b>Data Sheets Pending:</b><span><?php if(isset($res['info_attend_datesheet_pend']))echo $res['info_attend_datesheet_pend']; ?></span></td>

                                <td class="text-left"><b>Parking Display Pending:</b><span><?php if(isset($res['info_parking_display']))echo $res['info_parking_display']; ?></span></td>

                           	</tr>

                            </tbody>

                    </table>

                     <table  border="1" width="80%" style="font-size:12px;border:1px solid #000;">

                    	<tbody style="border:1px solid #000;">

                           
                             <tr>

                                 <td colspan="2" class="text-left"><span><?php if(isset($res['jobs_pending'])) {if($res['jobs_pending']) echo '<b>Jobs Pending: </b><span>'.$res['jobs_pending']."</span><br>"; }?><?php if(isset($res['comminication_with_mc'])) {if($res['jobs_pending']) echo '<b>Communication with MC: </b><span>'.$res['comminication_with_mc']."</span><br>"; }?></span></td>

                           	</tr>
							
							<tr>
                            	 <td style="text-align:left;"><b>Additional Information:</b> <span><?php if(isset($res['reasontext']))echo $res['reasontext']; ?></span></td>
                                 
							</tr>
 
                            </tbody>

                    </table>
					  <?php  date_default_timezone_set('Asia/Calcutta'); ?> 
						

                         
</div>
 <div class="bukaraa">
 <div class="last-modified">
 <?php
					   		if(isset($res['created_at'])){ 
						    
						    $datearr1 =  explode(" ",$res['created_at']);
							$dateday1 = $datearr1[0];
							$datetime1 = $datearr1[1];
							$dateday1 = date('d-m-Y', strtotime($dateday1));
					   ?>
                  <span style="color:#ff2518;font-weight:bold;">First Updated On:</span> <b><?php echo $dateday1." ".$datetime1;?></b> &nbsp; | &nbsp;<?php } ?>
     <?php
						 if(isset($res['updated_at'])){ 
						    
						    $datearr =  explode(" ",$res['updated_at']);
							$dateday = $datearr[0];
							$datetime = $datearr[1];
							$dateday = date('d-m-Y', strtotime($dateday));
							 ?>
   <span style="color:#ff2518;font-weight:bold;">Last Updated On:</span> <b> <?php echo $dateday." ".$datetime; ?></b>
    <?php } ?>
    </div>
    <div class="sign"  style="float:right; width:auto;">
        <div class="report-by">
        	 <label><span style="color:#ff2518;font-weight:bold;">Report By:</span> <b> <?php if(isset($res['user_id'])) { echo getlogeedname($res['user_id']); } ?></b> </label>
        </div>
    </div>    
</div>
                    

                </div>

              </div>

            </div>            

          </div>

          





          

        </div>

        <!-- /page content -->



        <!-- footer content -->

       <?php /*?> <?php include "footer.php" ?><?php */?>

        <!-- /footer content -->

      </div>
      @include('partials.footer') 

    </div>



    <!-- jQuery -->

    <script src="/vendors1/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap -->

    <script src="/vendors1/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- FastClick -->

    <script src="/vendors1/fastclick/lib/fastclick.js"></script>

    <!-- NProgress -->

    <script src="/vendors1/nprogress/nprogress.js"></script>

    <!-- Chart.js -->

    <script src="/vendors1/Chart.js/dist/Chart.min.js"></script>

    <!-- gauge.js -->

    <script src="/vendors1/gauge.js/dist/gauge.min.js"></script>

    <!-- bootstrap-progressbar -->

    <script src="/vendors1/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>

    <!-- iCheck -->

    <script src="/vendors1/iCheck/icheck.min.js"></script>

    <!-- Skycons -->

    <script src="/vendors1/skycons/skycons.js"></script>

    <!-- Flot -->

    <script src="/vendors1/Flot/jquery.flot.js"></script>

    <script src="/vendors1/Flot/jquery.flot.pie.js"></script>

    <script src="/vendors1/Flot/jquery.flot.time.js"></script>

    <script src="/vendors1/Flot/jquery.flot.stack.js"></script>

    <script src="/vendors1/Flot/jquery.flot.resize.js"></script>

    <!-- Flot plugins -->

    <script src="/vendors1/flot.orderbars/js/jquery.flot.orderBars.js"></script>

    <script src="/vendors1/flot-spline/js/jquery.flot.spline.min.js"></script>

    <script src="/vendors1/flot.curvedlines/curvedLines.js"></script>

    <!-- DateJS -->

    <script src="/vendors1/DateJS/build/date.js"></script>

    <!-- JQVMap -->

    <script src="/vendors1/jqvmap/dist/jquery.vmap.js"></script>

    <script src="/vendors1/jqvmap/dist/maps/jquery.vmap.world.js"></script>

    <script src="/vendors1/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>

    <!-- bootstrap-daterangepicker -->

    <script src="/vendors1/moment/min/moment.min.js"></script>

    <script src="/vendors1/bootstrap-daterangepicker/daterangepicker.js"></script>



    <!-- Custom Theme Scripts -->

    <script src="/build/js/custom.min.js"></script>	

    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    
   



  @stop

