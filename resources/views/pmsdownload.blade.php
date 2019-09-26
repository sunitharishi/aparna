<!DOCTYPE html>

<html lang="en">

  <head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Meta, title, CSS, favicons, etc. -->

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">



    <title>PMS </title>



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
	



   .security table tr td table tr td
  {
   font-size:10.7px;
   padding:0px 0px 0px 5px;
  }

  .security table tbody tr td.left-align

  {

   vertical-align:top;

   padding-left:2px;

  }
  .security table
  {
   border-collapse:collapse;
  }

  .date

  {

   font-weight:bold;

   font-size:14px;

   color:#000;

   text-align:right;

  }
tr td p
{
    word-break: normal;
    white-space: nowrap;
}

	table tbody tr th

	{

	 font-weight:bold;

	}

	table tbody tr td

	{

	 font-weight:400;

	}

	.pms-report table tbody tr th

	{

	 padding:0px;

	 font-size:10.7px;

	 }
	 .pms-report table
	 {
	  border-collapse:collapse;
	  margin-top:0px;
	  margin-bottom:0px;
	 }

	.pms-report table tbody tr td

	{

	 padding:0px;

	 font-size:10.7px;

	 }

	.aplication table thody tr
	{
	 border:1px solid #000;
	}
    .headings
	{
	 text-align:center;
	 margin:0 auto;
	 width:50px;
	}
	.security table thody tr td.bottom
	{
	 border-bottom:1px solid #fff;
	}
	.ptag p
	{
		margin-bottom:0px;
		word-break:normal;
		white-space:nowrap;
		/*vertical-align:top;*/
	}
	.last-modified
	{
	 margin-top:4px;
	 font-size:12px;
	 float:left;
	}
	.sign1
	{
	 margin-top:4px;
	 font-size:12px;
	 float:right;
	}
	</style>

  </head>

<body>

  

    <div class="container body">

      <div class="main_container">

      	<?php /*?><?php include "header.php" ?><?php */?>



        <!-- page content -->

        <div class="right_col" role="main">



          <div class="models">
          	<div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">

              <div>

                <div class="row x_title" style="border-bottom:none;margin-bottom:0px;padding-bottom:0px; clear:both; width:100%;">

                   <span class="col-sm-6 col-xs-6" style="font-weight:bold;font-size:14px;color:#000; float:left;">APMS |  <?php echo get_sitename($sitefilter);?></span>

                   <div class="col-sm-6 col-xs-6 date" style="float:right;">PMS | DATE: <?php echo $datefilter;?> | TIME: <?php date_default_timezone_set('Asia/Kolkata'); echo date("h:i:sa"); $pemsresv = getdefaultpmstot($sitefilter); ?></div>

                </div>

                <div class="x_content security" style="color:#000;clear:both;width:100%;">
                 
                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                    	<tr>
                           <td style="padding:0px;">                
                            <table width="100%" border="1" style="text-align:left;font-size:10px;">
                                    <tr style="text-align:left;">
                                         <td rowspan="9" class="headings" style="border-bottom:1px solid #fff;font-size:7.8px;"><img src="images/land-scaping.png" ></td>
                                        <td><b>Attendance</b></td>
                                        <td><b>Watering</b></td>
                                        <td><b>Sprinklers</b></td>
                                        <td><b>Solonide Valves</b></td>
                                        <td><b>Quick Coupling valves</b></td>
                                        <td><b>Power point</b></td>
                                      <!--  <td><b>Extra Activities</b></td>-->
                                    </tr>
                                    <tr style="border-bottom:0px;">
                                        <td>Sup: <span><?php if(isset($res['land_atten_sup']))echo $res['land_atten_sup']; ?> / <?php echo $pemsresv['land_sup'];?></span><br>
                                            Helper: <span><?php if(isset($res['land_atten_helper']))echo $res['land_atten_helper']; ?> /  <?php echo $pemsresv['land_helper'];?></span>
                                        </td>
                                        <td>Qty (Kl): <span><?php if(isset($res['land_water_qty']))echo $res['land_water_qty']; ?></span><br>
                                           Time: <span><?php if(isset($res['land_water_time']))echo $res['land_water_time']; ?></span>
                                        </td>
                                        <?php /*?><td>Time: <span><?php if(isset($res['land_clean_time']))echo $res['land_clean_time']; ?></span></td><?php */?>
                                        <td>Total: <span><?php echo $pemsresv['sprinklers'];?></span><br>
                                            Not Working: <span><?php if(isset($res['land_clean_sprinknw']))echo $res['land_clean_sprinknw']; ?></span>
                                        </td> 
                                         <td>Not Working: <span><?php if(isset($res['solonide_valve_nw']))echo $res['solonide_valve_nw']; ?></span></td>
                                         <td>Not Working: <span><?php if(isset($res['quick_couple_nw']))echo $res['quick_couple_nw']; ?></span></td>
                                          <td>Not Working: <span><?php if(isset($res['power_point_nw']))echo $res['power_point_nw']; ?></span></td>
                                         <?php /*?><td rowspan="2"> <?php if(isset($res['extra_act_multching'])) { if($res['extra_act_multching']) echo '<b>Multching:</b> <span>'.$res['extra_act_multching']."</span><br>"; } ?>
                                          <?php if(isset($res['extra_act_gap_filling'])) { if($res['extra_act_gap_filling']) echo '<b>Gap filling:</b> <span>'.$res['extra_act_gap_filling']."</span><br>"; } ?>
                                           <?php if(isset($res['extra_act_gap_staking'])) { if($res['extra_act_gap_staking']) echo '<b>Staking:</b> <span>'.$res['extra_act_gap_staking']."</span><br>"; } ?>
                                                       
                                         </td><?php */?>
                                        
                                      <?php /*?>  <td rowspan="2" style="border-bottom:1px solid #000;"><span><?php if(isset($res['land_spray_location'])) { if($res['land_spray_location']) echo 'Lawn Mowing: '.$res['land_spray_location']."<br>"; } ?><?php if(isset($res['land_Weeding_location'])) { if($res['land_Weeding_location']) echo 'Lawn Edge Cutting: '.$res['land_Weeding_location']."<br>"; }?><?php if(isset($res['land_mowing_location'])) { if($res['land_mowing_location']) echo 'Pesticide Application: '.$res['land_mowing_location']."<br>"; }?></span></td> <?php */?>
                                    </tr>  
                                   
                                     <tr>
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
                                        
                                        <tr>
                                         <?php } if(isset($res['land_garden_waste'])) {?>
                                          
                                        	<td style="text-align:left;border-bottom:1px solid #fff;">Garden Waste Disposal </td>
                                            <td style="text-align:left;border-bottom:1px solid #fff;"><span><?php if(isset($res['land_garden_waste']))echo $res['land_garden_waste']; ?></span></td>
                                            <td style="text-align:left;border-bottom:1px solid #fff;"><span><?php if(isset($res['land_garden_waste_mem']))echo $res['land_garden_waste_mem']; ?></span></td>
                                        
                                         <?php } if(isset($res['land_extra_activity'])) {?>
                                          
                                        	<td style="text-align:left;border-bottom:1px solid #fff;">Extra Activities </td>
                                            <td style="text-align:left;border-bottom:1px solid #fff;"><span><?php if(isset($res['land_extra_activity']))echo $res['land_extra_activity']; ?></span></td>
                                           <td style="text-align:left;border-bottom:1px solid #fff;"><span><?php if(isset($res['land_extra_activity_mem']))echo $res['land_extra_activity_mem']; ?></span></td>
                                        </tr>
                                         <?php }  ?>
                                   
                                   
                                    
                                    <?php /*?><tr>
                                      <td colspan="3"  style="border-top:1px solid #fff;border-left:1px solid #fff; vertical-align:top;border-bottom:1px solid #fff;">
                                      	  <b>Fertilizer Application:</b> <?php if(isset($res['land_application']))echo $res['land_application']; ?><br>
                                          <b>Garden Waste Disposal:</b> <?php if(isset($res['land_garden_waste']))echo $res['land_garden_waste']; ?><br>
                                          <b>Extra Activities:</b> <?php if(isset($res['land_extra_activity']))echo $res['land_extra_activity']; ?><br>
                                          
                                      </td>
                                        <td colspan="2" style="border-bottom:1px solid #fff;">
                                        <b>Manual Watering: </b><?php if(isset($res['land_mulching'])) { if($res['land_mulching']) echo '<span>Manual Watering: '.$res['land_mulching']."</span><br>"; } ?>
                                        <b>Weeding: </b><?php if(isset($res['land_trimming'])) { if($res['land_trimming']) echo '<span>Weeding: '.$res['land_trimming']."</span><br>"; } ?>
                                        <b>Hoeing: </b><?php if(isset($res['land_cutting'])) { if($res['land_cutting']) echo '<span>Hoeing: '.$res['land_cutting']."</span><br>"; }?>
                                        <b>Trimming: </b><?php if(isset($res['land_pruning'])){ if($res['land_pruning']) echo '<span>Trimming: '.$res['land_pruning']."</span><br>"; }?>
                                        <b>Pruning: </b><?php if(isset($res['land_shaping'])){ if($res['land_shaping']) echo '<span>Pruning: '.$res['land_shaping']."</span><br>"; }?>
                                        <b>Cleaning: </b><?php if(isset($res['land_hoeing'])) { if($res['land_hoeing']) echo '<span>Cleaning: '.$res['land_hoeing']."</span><br>"; }?>
                                      </td>                                      
                                 </tr><?php */?>
                            </table>
	                  </td>
                	 </tr> 
                     <tr>
                     	<td>
                        	<table cellpadding="0" cellspacing="0" border="1px" width="100%" style="font-size:10.8px;">
                            	<tr>
                                	<td rowspan="4" class="headings" style="border-bottom:1px solid #fff;"><img src="images/house-keeping.png" ></td>
                                    <td><b>Attendence</b></td>
                                    <td><b>Ride on</b></td>
                                    <td><b>Scrubbing</b></td>
                                    <td><b>Fogging</b></td>
                                    <td><b>Garbage</b></td>
                                    <td><b>Debris</b></td>
                                     
                                    
                                </tr>
                                <tr>
                                	<td>Sup: <?php if(isset($res['housekp_atten_sup']))echo $res['housekp_atten_sup']; ?> /<?php echo $pemsresv['house_sup'];?></td>
                                    <td>Hrs Run: <?php if(isset($res['housekp_rideon_hrs']))echo $res['housekp_rideon_hrs']; ?></td>
                                    <td>Hrs Run: <?php if(isset($res['scrub_hrs_run']))echo $res['scrub_hrs_run']; ?></td>
                                    <td>Hrs Run: <span><?php if(isset($res['fogg_hrs_run']))echo $res['fogg_hrs_run']; ?></span></td>
                                    <td rowspan="2" style="border-bottom:1px solid #fff;">Out Time: <?php if(isset($res['housekp_debr_garbage']))echo $res['housekp_debr_garbage']; ?></td>
                                    <td>No.of Trips: <?php if(isset($res['housekp_debr_tipsnum']))echo $res['housekp_debr_tipsnum']; ?></td>
									
									
                                </tr>
                                <tr>
                                	<td style="border-bottom:1px solid #fff;">Helper: <?php if(isset($res['housekp_atten_helper']))echo $res['housekp_atten_helper']; ?> /<?php echo $pemsresv['house_help'];?></td>
                                    <td style="border-bottom:1px solid #fff;">Location: <?php if(isset($res['housekp_location']))echo $res['housekp_location']; ?></td>
                                    <td style="border-bottom:1px solid #fff;">Location: <?php if(isset($res['scrub_location']))echo $res['scrub_location']; ?></td>
                                    <td style="border-bottom:1px solid #fff;">Location: <span><?php if(isset($res['fogg_location']))echo $res['fogg_location']; ?></span></td>
                                    <td style="border-bottom:1px solid #fff;">Vol (CFT): <?php if(isset($res['housekp_debr_vol']))echo $res['housekp_debr_vol']; ?></td>
                                </tr>  
                                <tr>
                                  <td colspan="4" style="border-bottom:1px solid #fff;"><?php if(isset($res['housekp_thefts'])) {if($res['housekp_thefts']) echo '<b>Thefts: </b><span>'.$res['housekp_thefts']."</span><br>"; } ?>
								<?php if(isset($res['housekp_violation_notice'])) {if($res['housekp_violation_notice'])echo '<b>Violation Noticed: </b><span>'.$res['housekp_violation_notice']."</span><br>"; } ?>
								<?php if(isset($res['housekp_area_inspect'])) {if($res['housekp_area_inspect']) echo '<b>Areas Inspected: </b><span>'.$res['housekp_area_inspect']."</span><br>"; }?><?php if(isset($res['housekp_pest'])) {if($res['housekp_pest']) echo '<span><b>Pest: </b>'.$res['housekp_pest']."</span><br>"; }?></td>

                                    <td colspan="2" style="border-bottom:1px solid #fff;"><b>Remarks</b><br> <span><?php if(isset($res['housekp_remarks']))echo $res['housekp_remarks']; ?></span></td>

                                </tr>
                            </table>
                        </td>
                     </tr>  
                     <tr>
                     	<td>
                        	<table cellpadding="0" cellspacing="0" border="1px" width="100%" style="font-size:10.8px;">                            
                               <tr>
                                  <td rowspan="3" class="headings" style="vertical-align:middle;font-size:7.8px;border-bottom:1px solid #fff;"><img src="images/club-house.png" ></td>
                                  <td><b>Attendance</b></td>
                                  <td><b>Power</b></td>
                                  <td><b>No. of Users</b></td>
                                  <td ><b>Rev. (<i class="fa fa-inr" aria-hidden="true"></i>)</b></td>
                                 
                                </tr>
                                <tr>
                                  <td >F.O: <span><?php if(isset($res['clbhous_att_frntofc']))echo $res['clbhous_att_frntofc']; ?> /<?php echo $pemsresv['clu_hs_fo'];?> </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                     H.K: <span><?php if(isset($res['clbhous_att_housekp']))echo $res['clbhous_att_housekp']; ?> / <?php echo $pemsresv['clu_hs_hk'];?> </span><br>
                                      Supervisor: <span><?php if(isset($res['supervisor']))echo $res['supervisor']; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      Others: <span><?php if(isset($res['clbhous_att_other']))echo $res['clbhous_att_other']; ?> /<?php echo $pemsresv['other'];?> </span>
                                   </td>
                                   <td ><span><?php if(isset($res['clbhous_pwr_units']))echo $res['clbhous_pwr_units']; ?></span></td>
                                   <td>Gym: <span><?php if(isset($res['clbhous_users_gym']))echo $res['clbhous_users_gym']; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      Pool: <span><?php if(isset($res['clbhous_users_pool']))echo $res['clbhous_users_pool']; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      Tennis: <span><?php if(isset($res['clbhous_users_tennis']))echo $res['clbhous_users_tennis']; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      Shuttle: <span><?php if(isset($res['clbhous_shuttle']))echo $res['clbhous_shuttle']; ?></span>
                                   </td>
                                   <td >Day: <span><?php if(isset($res['clbhous_revenue_day']))echo $res['clbhous_revenue_day']; ?></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        Cum.: <span><?php if(isset($res['clbhous_revenue_cum']))echo $res['clbhous_revenue_cum']; ?></span><br>
                                        Commercial Activity: <span><?php if(isset($res['commercial_activate']))echo $res['commercial_activate']; ?></span>
                                   </td> 
                                   
                                </tr>
                                <tr>
                                  <td class="text-left" colspan="4" style="border-bottom:1px solid #fff;"> <b>Remarks:</b> <span><?php if(isset($res['clbhous_users_remarks']))echo $res['clbhous_users_remarks']; ?></span></td>
                                </tr>
                                                        	
                            </table>
                        </td>
                     </tr>
                     <tr>
                     	<td>
                        	<table cellpadding="0" cellspacing="0" border="1px" width="100%" style="font-size:10.8px;">
                            <tr>
                               <td rowspan="5" class="headings" style="border-bottom:1px solid #fff;vertical-align:middle;font-size:7.8px;"><img src="images/apna-complex.png" ></td>
                               <td rowspan="2" ></td>
                                <td rowspan="2"><b>Previous</b></td>
                                <td colspan="3" style="text-align:center;"><b>Opened</b></td>
                                <td rowspan="2"><b>Resolved</b></td>
                                <td rowspan="2"><b>Pending</b></td>
                                <td rowspan="2"><b>Remarks</b></td>
                           	</tr>
                            <tr>
                                <td><b>Help Desk</b></td>
                                <td><b>Login</b></td>
                                <td><b>Total</b></td>
                           	</tr>
                            <tr>
                            	<td>APMS</td>
                                <td><span><?php if(isset($res['apna_apms_previous']))echo $res['apna_apms_previous']; ?></span></td>
                                <td><span><?php if(isset($res['apna_apms_opened_help']))echo $res['apna_apms_opened_help']; ?></span></td>
                                <td><span><?php if(isset($res['apna_apms_opened_login']))echo $res['apna_apms_opened_login']; ?></span></td>
                                <td><span><?php if(isset($res['apna_apms_opened_total']))echo $res['apna_apms_opened_total']; ?></span></td>
                                <td><span><?php if(isset($res['apna_apms_resolved']))echo $res['apna_apms_resolved']; ?></span></td>
                                <td><span><?php if(isset($res['apna_apms_pending']))echo $res['apna_apms_pending']; ?></span></td>
                                <td rowspan="3" style="border-bottom:1px solid #fff;"><?php if(isset($res['apna_apms_remarks'])) { if($res['apna_apms_remarks']) echo '<span>APMS: '.$res['apna_project_remarks']."</span><br>";} ?><?php if(isset($res['apna_apms_remarks'])) {  if($res['apna_project_remarks']) echo '<span>Project: '.$res['apna_project_remarks']."</span><br>"; } ?>
                                </td>
                            </tr>
                            <tr>
							  <?php $pro_prev = 0;
								      $pro_op_tot = 0;
									  $pro_resol = 0;
								 ?>
                            	<td>PROJECT</td>
                                 <!--<td>PROJECT</td>-->
                                 <td><span><?php if(isset($res['apna_project_previous'])) { $pro_prev = $res['apna_project_previous'];  echo $res['apna_project_previous']; } ?></span></td>

                                <td><span><?php if(isset($res['apna_project_opened_help']))echo $res['apna_project_opened_help']; ?></span></td>

                                <td><span><?php if(isset($res['apna_project_opened_login']))echo $res['apna_project_opened_login']; ?></span></td>

                                <td><span><?php if(isset($res['apna_project_opened_total'])) { $pro_op_tot = $res['apna_project_opened_total'];  echo $res['apna_project_opened_total']; } ?></span></td>

                                <td><span><?php if(isset($res['apna_project_resolved'])) {  $pro_resol = $res['apna_project_resolved']; echo $res['apna_project_resolved']; }  ?></span></td>
								
								<?php $RESap = 0;
								$opap = 0;
								$resolveap = 0;
								  if(isset($res['apna_project_previous'])) { $RESap =  $res['apna_project_previous'];}
								   if(isset($res['apna_project_opened_total'])) { $opap =  $res['apna_project_opened_total'];}
								    if(isset($res['apna_project_resolved'])) { $resolveap =  $res['apna_project_resolved'];}
								$pro_pen = $RESap + $opap - $resolveap; ?>

                                <td><span><?php echo $pro_pen = $pro_prev + $pro_op_tot - $pro_resol ; //if(isset($res['apna_project_pending']))echo $res['apna_project_pending']; ?></span></td>
                            </tr>
                            <tr>
                            	<td style="border-bottom:1px solid #fff;">TOTAL</td>
                                 <td style="border-bottom:1px solid #fff;"><span><?php $ap=0; $pp = 0; if(isset($res['apna_apms_previous'])) { $res['apna_apms_previous']; $ap = (float)$res['apna_apms_previous']; } ?>
								 		   <?php if(isset($res['apna_project_previous'])) { $res['apna_project_previous']; $pp = (float)$res['apna_project_previous']; } 
										   echo $ap + $pp; ?></span></td>
								  <td style="border-bottom:1px solid #fff;"><span><?php if(isset($res['apna_apms_opened_help'])) { $res['apna_apms_opened_help']; $ap = (float)$res['apna_apms_opened_help']; } ?>
								 		   <?php if(isset($res['apna_project_opened_help'])) { $res['apna_project_opened_help']; $pp = (float)$res['apna_project_opened_help']; } 
										   echo $ap + $pp; ?></span></td>
								 <td style="border-bottom:1px solid #fff;"><span><?php if(isset($res['apna_apms_opened_login'])) { $res['apna_apms_opened_login']; $ap = (float)$res['apna_apms_opened_login']; } ?>
								 		   <?php if(isset($res['apna_project_opened_login'])) { $res['apna_project_opened_login']; $pp = (float)$res['apna_project_opened_login']; } 
										   echo $ap + $pp; ?></span></td>
								 <td style="border-bottom:1px solid #fff;"><span><?php if(isset($res['apna_apms_opened_total'])) { $res['apna_apms_opened_total']; $ap = (float)$res['apna_apms_opened_total']; } ?>
								 		   <?php if(isset($res['apna_project_opened_total'])) { $res['apna_project_opened_total']; $pp = (float)$res['apna_project_opened_total']; } 
										   echo $ap + $pp; ?></span></td>
								<td style="border-bottom:1px solid #fff;"><span><?php if(isset($res['apna_apms_resolved'])) { $res['apna_apms_resolved']; $ap = (float)$res['apna_apms_resolved']; } ?>
								 		   <?php if(isset($res['apna_project_resolved'])) { $res['apna_project_resolved']; $pp = (float)$res['apna_project_resolved']; } 
										   echo $ap + $pp; ?></span></td>
								<td style="border-bottom:1px solid #fff;"><span><?php if(isset($res['apna_apms_pending'])) { $res['apna_apms_pending']; $ap = (float)$res['apna_apms_pending']; } ?>
								 		   <?php if(isset($res['apna_project_pending'])) { $res['apna_project_pending']; $pp = (float)$res['apna_project_pending']; } 
										   echo $ap +  $pro_pen; ?></span></td>
                            </tr>
                            </table>
                        </td>
                     </tr>
                     <tr>
                     	<td>
                        	<table cellpadding="0" cellspacing="0" border="1px" width="100%" style="font-size:10.8px;">
                            	 <tr>
                                    <td rowspan="4" class="headings" style="border-bottom:1px solid #fff;vertical-align:middle;font-size:7.8px;"><img src="images/occupancy.png" ></td>
                                    <td colspan="2"><b>On The Day</b></td>
                                    <td colspan="3" style="text-align:center;"><b>Occupancy as on Date</b></td>
                                    <td><b>Remarks</b></td>
                                </tr>
                                <tr>
                                    <td >Moved in</td>
                                    <td>Vacated</td>
                                    <td>Owners</td>
                                    <td>Tenants</td>
                                    <td>Vacant</td>
                                     <td rowspan="3" style="border-bottom:1px solid #fff;"><span><?php if(isset($res['occupancy_asdate_remarks']))echo $res['occupancy_asdate_remarks']; ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td >Owners: <span><?php if(isset($res['occupancy_move_owners']))echo $res['occupancy_move_owners']; ?></span></td>
                                    <td >Owners: <span><?php if(isset($res['occupancy_vacated_owners']))echo $res['occupancy_vacated_owners']; ?></span></td>
                                    <td><span><?php if(isset($res['occupancy_asdate_owners']))echo $res['occupancy_asdate_owners']; ?></span></td>
                                    <td><span><?php if(isset($res['occupancy_asdate_tenants']))echo $res['occupancy_asdate_tenants']; ?></span></td>
                                    <td><span><?php if(isset($res['occupancy_asdate_vacant']))echo $res['occupancy_asdate_vacant']; ?></span></td>
                                </tr>
                                <tr>
                                    <td style="border-bottom:1px solid #fff;">Tenants: <span><?php if(isset($res['occupancy_move_tenants']))echo $res['occupancy_move_tenants']; ?></span></td>
                                     <td style="border-bottom:1px solid #fff;">Tenants: <span><?php if(isset($res['occupancy_vacated_tenants']))echo $res['occupancy_vacated_tenants']; ?></span></td>
                                    <!--<td><span></span></td>-->
                                    <td colspan="2"  style="text-align:center;border-bottom:1px solid #fff;"><span><?php $apw = 0; $ppw =0; if(isset($res['occupancy_asdate_owners'])) { $res['occupancy_asdate_owners']; $apw = (float)$res['occupancy_asdate_owners']; } ?>
                                               <?php if(isset($res['occupancy_asdate_tenants'])) { $res['occupancy_asdate_tenants']; $ppw = (float)$res['occupancy_asdate_tenants']; } 
                                               echo $apw + $ppw; ?></span></td>
                                    <td style="border-bottom:1px solid #fff;"><span></span></td>
                                </tr>
                            </table>
                        </td>
                     </tr>
                     <tr>
                     	<td>
                        	<table cellpadding="0" cellspacing="0" border="1px" width="100%" style="font-size:10.8px;">
                            <tr>
                                <td rowspan="2" class="headings" style="border-bottom:1px solid #fff;vertical-align:middle;"><img src="images/imprest.png" ></td>
                                <td><b>Cash on Hand (<i class="fa fa-inr" aria-hidden="true"></i>):</b></td>
                                <td><b>Bills on Hand (<i class="fa fa-inr" aria-hidden="true"></i>):</b></td>
                                <td><b>Date of Statement Sent &amp; Amount</b></td>
                           	</tr>
                            <tr>
                                <td style="border-bottom:1px solid #fff;"><span><?php if(isset($res['imprest_cash_on_hand']))echo $res['imprest_cash_on_hand']; ?></span></td>
                                <td style="border-bottom:1px solid #fff;"><span><?php if(isset($res['imprest_bills_on_hand']))echo $res['imprest_bills_on_hand']; ?></span></td>
                                <td style="border-bottom:1px solid #fff;"><span><?php if(isset($res['imprest_dateof_statement']))echo $res['imprest_dateof_statement']; ?><?php if(isset($res['dateof_statement_amount'])) { if($res['dateof_statement_amount']) echo ": " .$res['dateof_statement_amount']; }?></span></td>
                           	</tr>
                            </table>
                        </td>
                     </tr>
                     <tr>
                     	<td>
                        	<table cellpadding="0" cellspacing="0" border="1px" width="100%" style="font-size:10.8px;">
                            <tr>
                                <td rowspan="3" class="headings" style="vertical-align:middle;border-bottom:1px solid #fff;font-size:7.8px;"><img src="images/gas.png"></td>
                                <td colspan="3"><b>Transaction Supervised by:</b> </td>
                                <td rowspan="2" style="border-right:1px solid #fff;border-bottom:0px;"><b>Full Cyl. Recd:</b> </td>
                                <td rowspan="2" style="border-bottom:0px;"><b>Empty Cyl. Taken Out:</b> </td>
                           	</tr>
                            <tr>
                                <td><b>APMS</b></td>
                                <td><b>Society</b></td>
                                <td><b>Security</b></td>
                            </tr>
                            <tr>
                            	<td style="border-bottom:1px solid #fff;"><span><?php if(isset($res['gas_transact_supervise_by']))echo $res['gas_transact_supervise_by']; ?></span></td>
                                <td style="border-bottom:1px solid #fff;"><span><?php if(isset($res['gas_transact_socity']))echo $res['gas_transact_socity']; ?></span></td>
                                <td style="border-bottom:1px solid #fff;"><span><?php if(isset($res['gas_transact_security']))echo $res['gas_transact_security']; ?></span></td>
                                 <td style="border-right:1px solid #fff;border-bottom:1px solid #fff;"><span><?php if(isset($res['gas_transact_full_cyl_recd']))echo $res['gas_transact_full_cyl_recd']; ?></span></td>
                                <td style="border-bottom:1px solid #fff;"><span><?php if(isset($res['gas_empty_cyl_taken_out']))echo $res['gas_empty_cyl_taken_out']; ?></span></td>
                           	</tr>
                            </table>
                        </td>
                     </tr>
                     <tr>
                     	<td>
                        	<table cellpadding="0" cellspacing="0" border="1px" width="100%" style="font-size:10.8px;">
                             <tr>
                                <td><b>Attendance Verified: </b><span><?php if(isset($res['info_attend_verified']))echo $res['info_attend_verified']; ?></span></td>
                                <td><b>Data Sheets Pending: </b> <span><?php if(isset($res['info_attend_datesheet_pend']))echo $res['info_attend_datesheet_pend']; ?></span></td>                                
                                <td><b>Parking Display Pending: </b> <span><?php if(isset($res['info_parking_display']))echo $res['info_parking_display']; ?></span></td>
                           	</tr>
                            <tr>
                                 <td colspan="3" class="text-left" style="font-size:10.7px;"><b>Jobs Pending / Communication with MC: </b><br><span><?php if(isset($res['jobs_pending'])) {if($res['jobs_pending']) echo '<span>Jobs Pending: '.$res['jobs_pending']."</span><br>"; }?><?php if(isset($res['comminication_with_mc'])) {if($res['jobs_pending']) echo '<span>Communication with MC: '.$res['comminication_with_mc']."</span><br>"; }?></span></td>
                           	</tr>
                             <tr style="padding:0px;">
                            	 <td colspan="3" class="text-left"><b>Additional Information:</b> <?php if(isset($res['reasontext']))echo $res['reasontext']; ?></td>
                                
							</tr>
                            </table>
                        </td>
                     </tr>
                    
               </table>
			     <?php  date_default_timezone_set('Asia/Calcutta'); ?> 
						<?php
						 if(isset($res['updated_at'])){ 
						    
						    $datearr =  explode(" ",$res['updated_at']);
							$dateday = $datearr[0];
							$datetime = $datearr[1];
							$dateday = date('d-m-Y', strtotime($dateday));
							 ?>
					<div class="last-modified"><b> Last Modified Date:</b> </b> <?php echo $dateday." ".$datetime; }?></div>

                    <div class="sign1">

                    	<div class="report-by">

                        	<label><b>Report By:</b> <?php if(isset($res['user_id'])) { echo getlogeedname($res['user_id']); } ?>  </label>

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







</script>


  
</body>
</html>