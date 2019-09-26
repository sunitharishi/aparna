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



	html



	{



	 



	 margin:0px;



	 



	}



	.date



	{



	 text-align:right;

	 font-weight:bold;

	 color:#000;

	 font-size:16px;



	}



	table tbody tr th



	{



	 font-weight:bold;



	}



	table tbody tr td



	{



	 font-weight:400;



	}



	.sign1



	{



	 margin-top:4px;
	 text-align:right;



	}



	.pms-report table tbody tr th



	{



	 padding:3px;



	 font-size:12.3px;



	 }



	.pms-report table tbody tr td



	{



	 padding:3px;



	 font-size:12.3px;



	 }


.last-modified
{
 margin-top:4px;
}
label
{
 font-weight:600;
}	
.text-center
{
 text-align:center;
}


/*@media print {
   html, body {
     height:100vh; 
     margin: 0 !important; 
     padding: 0 !important;
     overflow: hidden;
   }
}*/



	</style>



  </head>







  



    <div class="container body">



      <div class="main_container">



      	<?php /*?><?php include "header.php" ?><?php */?>







        <!-- page content -->



        <div class="right_col" role="main">







          <div class="row">



            <div class="col-md-12 col-sm-12 col-xs-12">



              <div class=" tile fixed_height_400">



                <div class="x_title" style="border-bottom:none;margin-bottom:16px;">



                   <span class="col-sm-6 col-xs-6" style="color:#000;font-weight:bold;padding-right:0px;">APMS |  <?php echo get_sitename($sitefilter);?></span>



                   <div class="col-sm-6 col-xs-6 date"><?php /*?><input type="text" style="border:1px solid #000;" value=""><?php */?>PMS | DATE: <?php echo $datefilter;?> | TIME: <?php date_default_timezone_set('Asia/Kolkata'); echo date("h:i:sa"); $pemsresv = getdefaultpmstot($sitefilter); ?></div>



                </div>



                <div class="x_content pms-report" style="color:#000;">



                	<table width="100%" border="1" style="text-align:left;font-size:13px;border:1px solid #000;" class="print">



                    	<tbody style="border:1px solid #000;">



                        	<tr>



                            	<td rowspan="11" class="rotate-text" style="border-bottom:1px solid #fff;"><div style="width: 55px;">Land Scaping</div></td>



                            </tr>



                        	<tr style="text-align:left;">
                            	<th>Attendance</th>
                                <th>Watering</th>
                                
                                <th>Sprinklers</th>
                                <th>Solonide Valves</th>
                                <th colspan="2">Quick Coupling valves</th>
                                <th>Power point</th>
                               
                               



                           	</tr>



                            <tr>
                            	<td>Sup: <span><?php if(isset($res['land_atten_sup']))echo $res['land_atten_sup']; ?> / <?php echo $pemsresv['land_sup'];?></span><br>
                                   Helper: <span><?php if(isset($res['land_atten_helper']))echo $res['land_atten_helper']; ?> /  <?php echo $pemsresv['land_helper'];?></span>
                                </td>
                                <td>Qty (Kl): <span><?php if(isset($res['land_water_qty']))echo $res['land_water_qty']; ?></span><br>
                                    Time: <span><?php if(isset($res['land_water_time']))echo $res['land_water_time']; ?></span>
                                </td>



                               <?php /*?> <td>Time: <span><?php if(isset($res['land_clean_time']))echo $res['land_clean_time']; ?></span></td><?php */?>



                                <td>Total: <span><?php echo $pemsresv['sprinklers'];?></span>&nbsp;&nbsp;&nbsp;
                                    Not Working: <span><?php if(isset($res['land_clean_sprinknw']))echo $res['land_clean_sprinknw']; ?></span>
                                </td> 
                                 
                                 <td>Not Working: <span><?php if(isset($res['solonide_valve_nw']))echo $res['solonide_valve_nw']; ?></span></td>
                                   <td colspan="2">Not Working: <span><?php if(isset($res['quick_couple_nw']))echo $res['quick_couple_nw']; ?></span></td>
                                  <td>Not Working: <span><?php if(isset($res['power_point_nw']))echo $res['power_point_nw']; ?></span></td>
                                  
                                   <?php /*?><td rowspan="2"> <?php if(isset($res['extra_act_multching'])) { if($res['extra_act_multching']) echo '<b>Multching:</b> <span>'.$res['extra_act_multching']."</span><br>"; } ?>
								  <?php if(isset($res['extra_act_gap_filling'])) { if($res['extra_act_gap_filling']) echo '<b>Gap filling:</b> <span>'.$res['extra_act_gap_filling']."</span><br>"; } ?>
								   <?php if(isset($res['extra_act_gap_staking'])) { if($res['extra_act_gap_staking']) echo '<b>Staking:</b> <span>'.$res['extra_act_gap_staking']."</span><br>"; } ?>
                                               
                                 </td><?php */?>
                          
                                 <?php /*?><td rowspan="2" style="border-bottom:1px solid #000;"><span><?php if(isset($res['land_spray_location'])) { if($res['land_spray_location']) echo 'Lawn Mowing: '.$res['land_spray_location']."<br>"; } ?><?php if(isset($res['land_Weeding_location'])) { if($res['land_Weeding_location']) echo 'Lawn Edge Cutting: '.$res['land_Weeding_location']."<br>"; }?><?php if(isset($res['land_mowing_location'])) { if($res['land_mowing_location']) echo 'Pesticide Application: '.$res['land_mowing_location']."<br>"; }?></span></td><?php */?>



                            </tr> 



                          
                            
                            
                           <tr>
                             <td><b>Activity</b></td>
                             <td><b>Lawn Mowing </b></td>
                             <td><b>Lawn Edge Cutting</b></td>
                             <td><b>Pesticide Application</b></td>
                             <td><b>Fertilizer Application</b></td>
                             <td><b>Manual Watering</b></td>
                             <td><b>Weeding</b></td>
                            
                           </tr>
                           
                           <tr>
                             <td><b>Location</b></td>
								<?php if(isset($res['land_spray_location'])) {?>
                               	 	<td><span><?php if(isset($res['land_spray_location']))echo $res['land_spray_location']; ?></span></td>
                                <?php } if(isset($res['land_Weeding_location'])) {?>
                                	<td><span><?php if(isset($res['land_Weeding_location']))echo $res['land_Weeding_location']; ?></span></td>
                                <?php } if(isset($res['land_mowing_location'])) {?>
                                	<td><span><?php if(isset($res['land_mowing_location']))echo $res['land_mowing_location']; ?></span></td>
                                <?php } if(isset($res['land_application'])) {?>
                                	<td><span><?php if(isset($res['land_application']))echo $res['land_application']; ?></span></td>
                                <?php } if(isset($res['land_mulching'])) {?>
                                	<td><span><?php if(isset($res['land_mulching']))echo $res['land_mulching']; ?></span></td>
                                <?php } if(isset($res['land_trimming'])) {?>
                                	<td><span><?php if(isset($res['land_trimming']))echo $res['land_trimming']; ?></span></td>
                                 <?php }  ?>    
                                    
                                    
                               
                           </tr>
                           <tr>
                           	<td><b>Count</b></td>
                            
								<?php if(isset($res['land_spray_mem'])) {?>
                               		 <td style="text-align:center;"><span><?php if(isset($res['land_spray_mem']))echo $res['land_spray_mem']; ?></span></td>
                                <?php } if(isset($res['land_Weeding_memcn'])) {?>
                                	 <td style="text-align:center;"><span><?php if(isset($res['land_Weeding_memcn']))echo $res['land_Weeding_memcn']; ?></span></td>
                                <?php } if(isset($res['land_mowing_memcn'])) {?>
                                	<td style="text-align:center;"><span><?php if(isset($res['land_mowing_memcn']))echo $res['land_mowing_memcn']; ?></span></td>
                                <?php } if(isset($res['land_application_mem'])) {?>
                                	<td style="text-align:center;"><span><?php if(isset($res['land_application_mem']))echo $res['land_application_mem']; ?></span></td>
                                <?php } if(isset($res['land_mulching_mem'])) {?>
                                	<td style="text-align:center;"><span><?php if(isset($res['land_mulching_mem']))echo $res['land_mulching_mem']; ?></span></td>
                                <?php } if(isset($res['land_trimming_mem'])) {?>
                                	<td style="text-align:center;"><span><?php if(isset($res['land_trimming_mem']))echo $res['land_trimming_mem']; ?></span></td>
                                   <?php }  ?>   
                                    
                                    
                              
                            
                           </tr>
                            
                            <tr>
                              <td><b>Activity</b></td>
                               <td><b>Hoeing</b></td>
                             <td><b>Trimming</b></td>
                             <td><b>Pruning</b></td>
                             <td><b>Cleaning</b></td>
                             <td><b>Garden Waste Disposal</b></td>
                             <td><b>Extra Activities</b></td>
                            </tr>
                            
                            <tr>
                               <td><b>Location</b></td>
                                <?php  if(isset($res['land_cutting'])) {?>
                                	<td><span><?php if(isset($res['land_cutting']))echo $res['land_cutting']; ?></span></td>
                                <?php } if(isset($res['land_pruning'])) {?>
                                	<td><span><?php if(isset($res['land_pruning']))echo $res['land_pruning']; ?></span></td>
                                <?php } if(isset($res['land_shaping'])) {?>
                                	<td><span><?php if(isset($res['land_shaping']))echo $res['land_shaping']; ?></span></td>
                                <?php } if(isset($res['land_hoeing'])) {?>
                                	<td><span><?php if(isset($res['land_hoeing']))echo $res['land_hoeing']; ?></span></td>
                                <?php } if(isset($res['land_garden_waste'])) {?>
                                	<td><span><?php if(isset($res['land_garden_waste']))echo $res['land_garden_waste']; ?></span></td>
                                <?php } if(isset($res['land_extra_activity'])) {?>
                                	<td><span><?php if(isset($res['land_extra_activity']))echo $res['land_extra_activity']; ?></span></td>
                                
                                <?php }  ?>
                            </tr>
                            
                            <tr style="border-bottom:1px solid #fff;">
                              <td><b>Count</b></td>
                                <?php  if(isset($res['land_cutting_mem'])) {?>
                                	<td style="text-align:center;"><span><?php if(isset($res['land_cutting_mem']))echo $res['land_cutting_mem']; ?></span></td>
                                <?php } if(isset($res['land_pruning_mem'])) {?>
                                	<td style="text-align:center;"><span><?php if(isset($res['land_pruning_mem']))echo $res['land_pruning_mem']; ?></span></td>
                                <?php } if(isset($res['land_shaping_mem'])) {?>
                                	<td style="text-align:center;"><span><?php if(isset($res['land_shaping_mem']))echo $res['land_shaping_mem']; ?></span></td>
                                <?php } if(isset($res['land_hoeing_mem'])) {?>
                                	<td style="text-align:center;"><span><?php if(isset($res['land_hoeing_mem']))echo $res['land_hoeing_mem']; ?></span></td>
                                <?php } if(isset($res['land_garden_waste_mem'])) {?>
                                	<td style="text-align:center;"><span><?php if(isset($res['land_garden_waste_mem']))echo $res['land_garden_waste_mem']; ?></span></td>
                                <?php } if(isset($res['land_extra_activity_mem'])) {?>
                                	<td style="text-align:center;"><span><?php if(isset($res['land_extra_activity_mem']))echo $res['land_extra_activity_mem']; ?></span></td>
                                <?php }  ?>
                            </tr>	
                                       
                            
                          
                        </tbody>
                    </table>



                    <table width="100%" border="1" style="font-size:13px;border:1px solid #000;">



                    	<tbody style="border:1px solid #000;">
                        	

                        	<tr>
                                <td rowspan="5" class="rotate-text" style="border-bottom:1px solid #fff;"><div style="width: 55px;">House Keeping</div></td>
                            	<td><b>Attendance</b></td>

                                <td><b>Ride on</b></td>
                                <td><b>Scrubbing</b></td>
                                <td><b>Fogging</b></td>
                                <td><b>Garbage</b></td>
                                <td><b>Debris</b></td>
                               
                           	</tr>



                            <tr>
                            	<td><label>Sup:</label> <span><?php if(isset($res['housekp_atten_sup']))echo $res['housekp_atten_sup']; ?> /<?php echo $pemsresv['house_sup'];?></span><br>
                                    <label>Helper:</label> <span><?php if(isset($res['housekp_atten_helper']))echo $res['housekp_atten_helper']; ?> /<?php echo $pemsresv['house_help'];?> </span>
                                 </td>
                                <td><label>Hrs Run:</label> <span><?php if(isset($res['housekp_rideon_hrs']))echo $res['housekp_rideon_hrs']; ?></span><br>
                                	<label>Location:</label> <span><?php if(isset($res['housekp_location']))echo $res['housekp_location']; ?></span>
                                </td>
								 <td><label>Hrs Run:</label> <span><?php if(isset($res['scrub_hrs_run']))echo $res['scrub_hrs_run']; ?></span><br>
                                     <label>Location:</label> <span><?php if(isset($res['scrub_location']))echo $res['scrub_location']; ?></span>
                                 </td>
                                 <td><label>Hrs Run:</label> <span><?php if(isset($res['fogg_hrs_run']))echo $res['fogg_hrs_run']; ?></span><br>
                                     <label>Location:</label> <span><?php if(isset($res['fogg_location']))echo $res['fogg_location']; ?></span>
                                 </td>
                                <td><label>Out Time:</label> <span><?php if(isset($res['housekp_debr_garbage']))echo $res['housekp_debr_garbage']; ?></span></td>
                                <td><label>No.of Trips:</label> <span><?php if(isset($res['housekp_debr_tipsnum']))echo $res['housekp_debr_tipsnum']; ?></span><br>
                                    <label>Vol (CFT):</label> <span><?php if(isset($res['housekp_debr_vol']))echo $res['housekp_debr_vol']; ?></span>
                                </td>
                                
                                

                            </tr>
    


                            <tr style="border-bottom:1px solid #fff;">

                            	 <td rowspan="2" colspan="3"><?php if(isset($res['housekp_thefts'])) {if($res['housekp_thefts']) echo '<b>Thefts: </b>'.$res['housekp_thefts']."<br>"; } ?>
								<?php if(isset($res['housekp_violation_notice'])) {if($res['housekp_violation_notice'])echo '<b>Violation Noticed: </b>'.$res['housekp_violation_notice']."<br>"; } ?>
								<?php if(isset($res['housekp_area_inspect'])) {if($res['housekp_area_inspect']) echo '<b>Areas Inspected: </b>'.$res['housekp_area_inspect']."<br>"; }?><?php if(isset($res['housekp_pest'])) {if($res['housekp_pest']) echo '<b>Pest: </b>'.$res['housekp_pest']."<br>"; }?></td>
                                 <td colspan="3"><b>Remarks:</b><br><span><?php if(isset($res['housekp_remarks']))echo $res['housekp_remarks']; ?></span></td>

                            </tr>
                           

                            </tbody>

                    </table>



                    <table width="100%" border="1" style="font-size:13px;border:1px solid #000;">
                    	<tbody style="border:1px solid #000;">
                        	<tr>
                            	<td rowspan="6" class="rotate-text" style="border-bottom:1px solid #fff;"><div style="width: 55px;">Club House</div></td>
                            </tr>

                        	<tr>
                            	<th>Attendance</th>
                                <th>Power</th>
                                <th>No. of Users</th>
                                <th>Rev. (<i class="fa fa-inr" aria-hidden="true"></i>)</th>
                                
                           	</tr>



                            <tr>
                            	<td><label>F.O:</label> <span><?php if(isset($res['clbhous_att_frntofc']))echo $res['clbhous_att_frntofc']; ?> /<?php echo $pemsresv['clu_hs_fo'];?> </span> &nbsp;&nbsp;
                                    <label>H.K:</label> <span><?php if(isset($res['clbhous_att_housekp']))echo $res['clbhous_att_housekp']; ?> / <?php echo $pemsresv['clu_hs_hk'];?> </span> &nbsp;&nbsp;
                                    <label>Supervisor:</label> <span><?php if(isset($res['supervisor']))echo $res['supervisor']; ?></span><br>
                                     <label>Others:</label> <span><?php if(isset($res['clbhous_att_other']))echo $res['clbhous_att_other']; ?> /<?php echo $pemsresv['other'];?> </span>
                                </td>
                                <td class="text-center"><span><?php if(isset($res['clbhous_pwr_units']))echo $res['clbhous_pwr_units']; ?></span></td>
                                <td><label>Gym:</label> <span><?php if(isset($res['clbhous_users_gym']))echo $res['clbhous_users_gym']; ?></span>&nbsp;&nbsp;
                                    <label>Pool:</label> <span><?php if(isset($res['clbhous_users_pool']))echo $res['clbhous_users_pool']; ?></span>&nbsp;&nbsp;
                                    <label>Tennis:</label> <span><?php if(isset($res['clbhous_users_tennis']))echo $res['clbhous_users_tennis']; ?></span> <br>
                                    <label>Shuttle:</label> <span><?php if(isset($res['clbhous_shuttle']))echo $res['clbhous_shuttle']; ?></span> 
                                </td>

                                <td><label>Day:</label> <span><?php if(isset($res['clbhous_revenue_day']))echo $res['clbhous_revenue_day']; ?></span> &nbsp;&nbsp;
                                    <label>Cum.:</label> <span><?php if(isset($res['clbhous_revenue_cum']))echo $res['clbhous_revenue_cum']; ?></span> <br>
                                    <label>Commercial Activity:</label> <span><?php if(isset($res['commercial_activate']))echo $res['commercial_activate']; ?></span>
                                </td> 
                               

                            </tr>
                                <tr style="border-bottom:1px solid #fff;">
                                  <td colspan="4"><b>Remarks:</b> <span><?php if(isset($res['clbhous_users_remarks']))echo $res['clbhous_users_remarks']; ?></span></td>
                                  
                                </tr>

                            </tbody>
                    </table>


                     <table width="100%" border="1" style="font-size:13px;border:1px solid #000;">

                    	<tbody style="border:1px solid #000;">

                        	<tr>

                            	<td rowspan="7" class="rotate-text" style="border-bottom:1px solid #fff;"><div style="width: 55px;">Apna Complex</div></td>
                            </tr>
                        	<tr>
                            	<th rowspan="2"></th>



                                <th rowspan="2">Previous</th>



                                <th colspan="3" style="text-align:center;">Opened</th>



                                <th rowspan="2" class="text-center">Resolved</th>



                                <th rowspan="2" class="text-center">Pending</th>



                                <th rowspan="2">Remarks</th>



                           	</tr>



                            <tr>



                            	



                                <th>Help Desk</th>



                                <th>Login</th>



                                <th>Total</th>



                               



                           	</tr>



                            <tr>



                            	<td><label>APMS</label></td>



                                <td class="text-center"><span><?php if(isset($res['apna_apms_previous']))echo $res['apna_apms_previous']; ?></span></td>



                                <td class="text-center"><span><?php if(isset($res['apna_apms_opened_help']))echo $res['apna_apms_opened_help']; ?></span></td>



                                <td class="text-center"><span><?php if(isset($res['apna_apms_opened_login']))echo $res['apna_apms_opened_login']; ?></span></td>



                                <td class="text-center"><span><?php if(isset($res['apna_apms_opened_total']))echo $res['apna_apms_opened_total']; ?></span></td>



                                <td class="text-center"><span><?php if(isset($res['apna_apms_resolved']))echo $res['apna_apms_resolved']; ?></span></td>



                                <td class="text-center"><span><?php if(isset($res['apna_apms_pending']))echo $res['apna_apms_pending']; ?></span></td>



                                <td rowspan="3" style="border-bottom:1px solid #fff;"><?php if(isset($res['apna_apms_remarks'])) { if($res['apna_apms_remarks']) echo '<label>APMS: </label>'.$res['apna_project_remarks']."<br>";} ?><?php if(isset($res['apna_apms_remarks'])) {  if($res['apna_project_remarks']) echo '<label>Project: </label>'.$res['apna_project_remarks']."<br>"; } ?>



                                </td>



                            </tr>



                            <tr>



                            	<td><label>PROJECT</label></td>

	                            <?php $pro_prev = 0;
								      $pro_op_tot = 0;
									  $pro_resol = 0;
								 ?>

                                 <!--<td>PROJECT</td>-->



                                 <td><span><?php if(isset($res['apna_project_previous'])) { $pro_prev = $res['apna_project_previous'];  echo $res['apna_project_previous']; } ?></span></td>

                                <td><span><?php if(isset($res['apna_project_opened_help']))echo $res['apna_project_opened_help']; ?></span></td>

                                <td><span><?php if(isset($res['apna_project_opened_login']))echo $res['apna_project_opened_login']; ?></span></td>

                                <td><span><?php if(isset($res['apna_project_opened_total'])) { $pro_op_tot = $res['apna_project_opened_total'];  echo $res['apna_project_opened_total']; } ?></span></td>

                                <td><span><?php if(isset($res['apna_project_resolved'])) {  $pro_resol = $res['apna_project_resolved']; echo $res['apna_project_resolved']; }  ?></span></td>
								
								<?php $pro_pen = $res['apna_project_previous'] + $res['apna_project_opened_total'] - $res['apna_project_resolved']; ?>

                                <td><span><?php echo $pro_pen = $pro_prev + $pro_op_tot - $pro_resol ; //if(isset($res['apna_project_pending']))echo $res['apna_project_pending']; ?></span></td>



                            </tr>



                            <tr style="border-bottom:1px solid #fff;">



                            	<td><label>TOTAL</label></td>



                                 <td class="text-center"><span><?php $ap=0; $pp = 0; if(isset($res['apna_apms_previous'])) { $res['apna_apms_previous']; $ap = (float)$res['apna_apms_previous']; } ?>



								 		   <?php if(isset($res['apna_project_previous'])) { $res['apna_project_previous']; $pp = (float)$res['apna_project_previous']; } 



										   echo $ap + $pp; ?></span></td>



								  <td class="text-center"><span><?php if(isset($res['apna_apms_opened_help'])) { $res['apna_apms_opened_help']; $ap = (float)$res['apna_apms_opened_help']; } ?>



								 		   <?php if(isset($res['apna_project_opened_help'])) { $res['apna_project_opened_help']; $pp = (float)$res['apna_project_opened_help']; } 



										   echo $ap + $pp; ?></span></td>



								 <td class="text-center"><span><?php if(isset($res['apna_apms_opened_login'])) { $res['apna_apms_opened_login']; $ap = (float)$res['apna_apms_opened_login']; } ?>



								 		   <?php if(isset($res['apna_project_opened_login'])) { $res['apna_project_opened_login']; $pp = (float)$res['apna_project_opened_login']; } 



										   echo $ap + $pp; ?></span></td>



								 <td class="text-center"><span><?php if(isset($res['apna_apms_opened_total'])) { $res['apna_apms_opened_total']; $ap = (float)$res['apna_apms_opened_total']; } ?>



								 		   <?php if(isset($res['apna_project_opened_total'])) { $res['apna_project_opened_total']; $pp = (float)$res['apna_project_opened_total']; } 



										   echo $ap + $pp; ?></span></td>



								<td class="text-center"><span><?php if(isset($res['apna_apms_resolved'])) { $res['apna_apms_resolved']; $ap = (float)$res['apna_apms_resolved']; } ?>



								 		   <?php if(isset($res['apna_project_resolved'])) { $res['apna_project_resolved']; $pp = (float)$res['apna_project_resolved']; } 



										   echo $ap + $pp; ?></span></td>



								<td class="text-center"><span><?php if(isset($res['apna_apms_pending'])) { $res['apna_apms_pending']; $ap = (float)$res['apna_apms_pending']; } ?>



								 		   <?php if(isset($res['apna_project_pending'])) { $res['apna_project_pending']; $pp = (float)$res['apna_project_pending']; } 



										   echo $ap + $pro_pen; ?></span></td>



                            </tr>



                            



                            </tbody>



                    </table>



                    



                     <table width="100%" border="1" style="font-size:13px;border:1px solid #000;">
                    	<tbody style="border:1px solid #000;">
                        	<tr>
                            	<td rowspan="7" class="rotate-text" style="border-bottom:1px solid #fff;"><div style="width: 55px;">Occupancy</div></td>
                            </tr>

                        	<tr>
                                <th colspan="2">On The Day</th>
                                <th colspan="3" style="text-align:center;">Occupancy as on Date</th>
                                <th>Remarks</th>
                           	</tr>



                            <tr>
                                <td><label>Moved in</label></td>
                                <td><label>Vacated</label></td>
                                <td class="text-center"><label>Owners</label></td>
                                <td class="text-center"><label>Tenants</label></td>
                                <td class="text-center"><label>Vacant</label></td>
                                 <td rowspan="3" style="border-bottom:none;"><span><?php if(isset($res['occupancy_asdate_remarks']))echo $res['occupancy_asdate_remarks']; ?></span>
                                </td>
                           	</tr>



                            <tr style="border-bottom:0px;">



                            	<td style="border-bottom:1px solid #fff;"><label>Owners:</label> <span><?php if(isset($res['occupancy_move_owners']))echo $res['occupancy_move_owners']; ?></span></td>



                                <td><label>Owners:</label> <span><?php if(isset($res['occupancy_vacated_owners']))echo $res['occupancy_vacated_owners']; ?></span></td>



                                <td style="border-bottom:1px solid #000;" class="text-center"><span><?php if(isset($res['occupancy_asdate_owners']))echo $res['occupancy_asdate_owners']; ?></span></td>



                                <td style="border-bottom:1px solid #000;" class="text-center"><span><?php if(isset($res['occupancy_asdate_tenants']))echo $res['occupancy_asdate_tenants']; ?></span></td>



                                <td class="text-center"><span><?php if(isset($res['occupancy_asdate_vacant']))echo $res['occupancy_asdate_vacant']; ?></span></td>



                               



                            </tr>



                            <tr style="border-bottom:none;">



                            	<td><label>Tenants:</label> <span><?php if(isset($res['occupancy_move_tenants']))echo $res['occupancy_move_tenants']; ?></span></td>



                                 <td><label>Tenants:</label> <span><?php if(isset($res['occupancy_vacated_tenants']))echo $res['occupancy_vacated_tenants']; ?></span></td>



                                <!--<td><span></span></td>-->



                                <td colspan="2" style="text-align:center;"><span><?php $apw = 0; $ppw =0; if(isset($res['occupancy_asdate_owners'])) { $res['occupancy_asdate_owners']; $apw = (float)$res['occupancy_asdate_owners']; } ?>



								 		   <?php if(isset($res['occupancy_asdate_tenants'])) { $res['occupancy_asdate_tenants']; $ppw = (float)$res['occupancy_asdate_tenants']; } 



										   echo $apw + $ppw; ?></span></td>



                                <td><span></span></td>



                            </tr>



                            </tbody>



                    </table>



                    



                     <table width="100%" border="1" style="font-size:13px;border:1px solid #000;">



                    	<tbody style="border:1px solid #000;">



                        	<tr style="border-bottom:1px solid #fff;">



                            	<td rowspan="3" class="rotate-text"><div style="width: 55px;">IMPREST</div></td>



                            </tr>



                        	<tr>



                                <th style="padding:6px;" class="text-center">Cash on Hand (<i class="fa fa-inr" aria-hidden="true"></i>):</th>

                                <th style="padding:6px;" class="text-center">Date of Statement Sent &amp; Amount</th>

                                <th style="padding:6px;" class="text-center">Bills on Hand (<i class="fa fa-inr" aria-hidden="true"></i>):</th>



                                <th style="padding:6px;" class="text-center">Date of Statement Sent &amp; Amount</th>



                           	</tr>



                            <tr style="border-bottom:1px solid #fff;">



                            	



                                <td style="padding:6px;" class="text-center"><span><?php if(isset($res['imprest_cash_on_hand']))echo $res['imprest_cash_on_hand']; ?></span></td>

                                  <td style="padding:6px;" class="text-center"><span><?php if(isset($res['imprest_dateof_statement']))echo $res['imprest_dateof_statement']; ?><?php if(isset($res['dateof_statement_amount'])) { if($res['dateof_statement_amount']) echo ": " .$res['dateof_statement_amount']; }?></span></td>

                                <td style="padding:6px;" class="text-center"><span><?php if(isset($res['imprest_bills_on_hand']))echo $res['imprest_bills_on_hand']; ?></span></td>

                                   <td><span><?php if(isset($res['imprest_dateof_statement_2']))echo $res['imprest_dateof_statement_2']; ?><?php if(isset($res['dateof_statement_amount_2'])) { if($res['imprest_dateof_statement_2']) echo ": " .$res['dateof_statement_amount_2']; }?></span></td>

                              



                           	</tr>



                            



                            </tbody>



                    </table>



                    



                    <table width="100%" border="1" style="font-size:13px;border:1px solid #000;">



                    	<tbody style="border:1px solid #000;">


                        	<tr>
                                <td rowspan="2" class="rotate-text" style="border-bottom:1px solid #fff;"><div style="width: 55px;">gas</div></td>
                                <th colspan="3">Transaction Supervised by: </th>
                     <td rowspan="2" style="border-right:1px solid #fff;border-bottom:1px solid #fff;"><b>Full Cyl. Recd:</b> <span><?php if(isset($res['gas_transact_full_cyl_recd']))echo $res['gas_transact_full_cyl_recd']; ?></span></td>
                     <td rowspan="2" style="border-bottom:1px solid #fff;"><b>Empty Cyl. Taken Out:</b>  <span><?php if(isset($res['gas_empty_cyl_taken_out']))echo $res['gas_empty_cyl_taken_out']; ?></span></td>
                           	</tr>

                            <tr style="border-bottom:1px solid #fff;">
                                <td><b>APMS:</b> <span><?php if(isset($res['gas_transact_supervise_by']))echo $res['gas_transact_supervise_by']; ?></span></td>
                                <td><b>Society:</b> <span><?php if(isset($res['gas_transact_socity']))echo $res['gas_transact_socity']; ?></span></td>
                                <td><b>Security:</b> <span><?php if(isset($res['gas_transact_security']))echo $res['gas_transact_security']; ?></span></td>
                            </tr>

                            </tbody>
                    </table>


                     <table width="100%" border="1" style="font-size:13px;border:1px solid #000;">



                    	<tbody style="border:1px solid #000;">



                            <tr style="border-bottom:1px solid #fff;">



                                <td><b>Attendance Verified: </b><span><?php if(isset($res['info_attend_verified']))echo $res['info_attend_verified']; ?></span></td>



                                <td><b>Data Sheets Pending: </b> <span><?php if(isset($res['info_attend_datesheet_pend']))echo $res['info_attend_datesheet_pend']; ?></span></td>



                                <td><b>Parking Display Pending: </b> <span><?php if(isset($res['info_parking_display']))echo $res['info_parking_display']; ?></span></td>



                           	</tr>



                            </tbody>



                    </table>



                     <table width="100%" border="1" class="text-left" style="font-size:13px;border:1px solid #000;">



                    	<tbody style="border:1px solid #000;">



                           <!-- <tr>



                                <th>Jobs Pending / Communication with MC:</th>



                           	</tr>-->



                             <tr>



                                 <td colspan="2" class="text-left"><span><?php if(isset($res['jobs_pending'])) {if($res['jobs_pending']) echo '<b>Jobs Pending: </b>'.$res['jobs_pending']."<br>"; }?><?php if(isset($res['comminication_with_mc'])) {if($res['jobs_pending']) echo '<b>Communication with MC: </b>'.$res['comminication_with_mc']."<br>"; }?></span></td>



                           	</tr>
                             
                             
                             <tr>
                            	 <td class="text-left"><b>Additional Information:</b> <span><?php if(isset($res['reasontext']))echo $res['reasontext']; ?></span></td>
                                 
							</tr>


                            </tbody>



                    </table>
					
					  <?php  date_default_timezone_set('Asia/Calcutta'); ?> 
						<?php
						 if(isset($res['updated_at'])){ 
						    
						    $datearr =  explode(" ",$res['updated_at']);
							$dateday = $datearr[0];
							$datetime = $datearr[1];
							$dateday = date('d-m-Y', strtotime($dateday));
							 ?>
                      <div class="row">
					 <div class="col-xs-6 last-modified"><b>Last Modified Date:</b> <?php echo $dateday." ".$datetime; }?></div>

                    <div class="col-xs-6 sign1">
                    	<div class="report-by">
                        	<b>Report By:</b> <?php if(isset($res['user_id'])) { echo getlogeedname($res['user_id']); } ?> 
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











  



</html>



<script>



$( document ).ready(function() {



    window.print(); 



	close(); 



	window.location.href = "/getdailyreportdetail/"+<?php echo $sitefilter;?>;  



});







</script>