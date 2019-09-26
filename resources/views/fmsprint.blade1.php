<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>FMS</title>

    <!-- Bootstrap -->
    <link rel="icon" href="images/ICON.png">
    <link href="/vendors1/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/vendors1/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
   
    <!-- iCheck -->
   
    <!-- Datatables -->
    <link href="/vendors1/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/build/css/custom.css" rel="stylesheet">
    <style>
	.date
	{
	 text-align:right;
	 
	}
	.fms-incharge table tbody tr th
	{
	 padding:3px;
	 font-size:12px;
	}
	.fms-incharge table tbody tr td
	{
	 padding:3px;
	 font-size:12px;
	}
	</style>
  </head>
    <div class="container body">
      <div class="main_container">
     <?php /*?> <?php include "header.php"; ?><?php */?>
        <!-- /top navigation -->
     
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="models">
            <!--<div class="clearfix"></div>-->
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div style="padding-top:8px;">
                  <div class="row x_title" style="border-bottom:none;margin-bottom:0px;padding-bottom:0px;">
                            <span class="col-sm-9 col-xs-8" style="font-size:17px;">APMS – Daily Report by FMS incharge for ............<?php echo $datefilter;?></span>
                        <div class="col-sm-3 col-xs-4 date"><?php echo get_sitename($sitefilter);?></div>
                  </div>
                  <div class="x_content fms-incharge">
                    	<table width="100%" border="1" style="font-size:10px;vertical-align:top;">
                        <tbody style="border:1px solid #000;">
                        <tr>
                        	<!--<td>-->
                            	<table width="100%">
                                	<tbody>
        <tr>
        <td rowspan="6"><b>Power Consumption</b></td>
        <td></td>
         <td><b>CTPT</b></td>
        <td><b>Total LT</b></td>
        <td><b>Losses</b></td>
        <td><b>Residents</b></td>
        <td><b>Clubhouse</b></td>
        <td><b>STP</b></td>
        <td><b>WSP</b></td>
        <td><b>Lifts</b></td>
            </tr>
            <tr>
            
            <td>Day</td>
            <td><?php if(isset($res['pwr_ctpt']))echo $res['pwr_ctpt']; ?></td>
            <td><?php if(isset($res['pwr_tot_lt']))echo $res['pwr_tot_lt']; ?></td>
            <td> <?php if(isset($res['pwr_tot_lt']) && isset($res['pwr_tot_lt'])) echo  ($res['pwr_ctpt'] -  $res['pwr_tot_lt']);?><!--style="color:#FF0000;">203--></td>
            <td><?php if(isset($res['pwr_residents']))echo $res['pwr_residents']; ?></td>
            <td><?php if(isset($res['pwr_club_house']))echo $res['pwr_club_house']; ?></td>
            <td><?php if(isset($res['pwr_stp']))echo $res['pwr_stp']; ?></td>
            <td><?php if(isset($res['pwr_wsp']))echo $res['pwr_wsp']; ?></td>
            <td><?php if(isset($res['pwr_lifts']))echo $res['pwr_lifts']; ?></td>
            </tr>
            <tr>
            <td>MTD</td>
             <td><?php echo getmtdfms($datefilter,$sitefilter,'pwr_ctpt');?></td>
            <td><?php echo getmtdfms($datefilter,$sitefilter,'pwr_tot_lt');?></td>
            <td><?php echo (getmtdfms($datefilter,$sitefilter,'pwr_ctpt') - getmtdfms($datefilter,$sitefilter,'pwr_tot_lt'));?></td> 
            <td><?php echo getmtdfms($datefilter,$sitefilter,'pwr_residents');?></td>
            <td><?php echo getmtdfms($datefilter,$sitefilter,'pwr_club_house');?></td>
            <td><?php echo getmtdfms($datefilter,$sitefilter,'pwr_stp');?></td>
            <td><?php echo getmtdfms($datefilter,$sitefilter,'pwr_wsp');?></td>
            <td><?php echo getmtdfms($datefilter,$sitefilter,'pwr_lifts');?></td>
            </tr>

<tr>
            <td></td>
            <td style="padding-top:1px;"><b>Vendors</b></td>
            <td style="padding-top:1px;"><b>Common Area</b></td>
            <td style="padding-top:1px;"><b>Others</b></td>
            <td style="padding-top:1px;"><b>Solar power units</b></td>
            <td style="padding-top:1px;"><b>Power factor</b></td>
            <td style="padding-top:1px;"><b> Recorded KVA</b></td>
            <td colspan="2" style="padding-top:1px;"><b>Remarks</b></td>
           
           
            </tr>
            <tr>
            <td>Day</td>
            <td><?php if(isset($res['pwr_vendors']))echo $res['pwr_vendors']; ?></td>
            <td><?php if(isset($res['pwr_common_area']))echo $res['pwr_common_area']; ?></td>
            <td><?php if(isset($res['pwr_others']))echo $res['pwr_others']; ?></td>
            <td><?php if(isset($res['pwr_solarpwrunits']))echo $res['pwr_solarpwrunits']; ?></td>
           
            <td rowspan="2"><?php if(isset($res['pwr_pwrfactor']))echo $res['pwr_pwrfactor']; ?> </td>
            <td rowspan="2"><?php if(isset($res['pwr_recordedkva']))echo $res['pwr_recordedkva']; ?> </td>
             <td rowspan="2" colspan="2"> <?php if(isset($res['pwr_remarks']))echo $res['pwr_remarks']; ?></td>
           
            </tr>
            <tr>
            <td>MTD</td>
             <td><?php echo getmtdfms($datefilter,$sitefilter,'pwr_vendors');?></td>
            <td><?php echo getmtdfms($datefilter,$sitefilter,'pwr_common_area');?></td>
            <td><?php echo getmtdfms($datefilter,$sitefilter,'pwr_others');?></td>
            <td><?php echo getmtdfms($datefilter,$sitefilter,'pwr_solarpwrunits');?></td>
            </tr>
            
            </tbody>
            </table>
           <!-- </td>-->
            </tr>
            
            
            <tr>
            	<table width="100%">
                	<tbody>
            
            <tr>
            <td rowspan="3"><b>DG sets :</b><span>06</span>NW /<br> Total =<span><?php if(isset($res['dgset_notworking']))echo $res['dgset_notworking']; ?>/06</span></td>
            <td></td>
           <td style="padding-top:1px;"><b>Power failure(hrs)</b></td>
            <td style="padding-top:1px;"><b>Diesel consum(ltrs)</b></td>
            <td style="padding-top:1px;"><b>Diesel stock(ltrs)</b></td>
            <td style="padding-top:1px;"><b>Diesel filled (ltrs)</b></td>
            <td style="padding-top:1px;"><b>Battery status</b></td>
            <td style="padding-top:1px;"><b>DG Units</b></td>
            <td colspan="2" style="padding-top:1px;"><b>Abnormalities / servicing</b></td>
            </tr>
           <tr>
           <td>Day</td>
           <td><?php if(isset($res['dgset_pwrfailure']))echo $res['dgset_pwrfailure']; ?></td>
           <td><?php if(isset($res['dset_dieselconsume']))echo $res['dset_dieselconsume']; ?></td>
           <td><?php if(isset($res['dgset_dieselstock']))echo $res['dgset_dieselstock']; ?></td>
           <td><?php if(isset($res['dgset_dieselfilled']))echo $res['dgset_dieselfilled']; ?></td>
           <td><?php if(isset($res['dgset_batterystatus']))echo $res['dgset_batterystatus']; ?></td>
           <td><?php if(isset($res['dgset_dgunits']))echo $res['dgset_dgunits']; ?></td>
           <td colspan="2" rowspan="2"><?php if(isset($res['dgset_abnormalities']))echo $res['dgset_abnormalities']; ?></td>
           </tr>

<tr>
            <td>MTD</td>
            <td><?php echo getmtdfms($datefilter,$sitefilter,'dgset_pwrfailure');?></td>
            <td><?php echo getmtdfms($datefilter,$sitefilter,'dset_dieselconsume');?></td>
            <td><?php echo getmtdfms($datefilter,$sitefilter,'dgset_dieselstock');?></td>
            <td><?php echo getmtdfms($datefilter,$sitefilter,'dgset_dieselfilled');?></td>
            <td><?php echo getmtdfms($datefilter,$sitefilter,'dgset_batterystatus');?></td>
            <td><?php echo getmtdfms($datefilter,$sitefilter,'dgset_dgunits');?></td>
           </tr>
           
           </tbody>
           </table>
           </tr>
           
           
<tr>
            <td rowspan="3"><b>WSP DWS Cons.</b></td>
            <td></td>
           <td style="padding-top:1px;"><b>Salt (kgs)</b></td>
            <td style="padding-top:1px;"><b>Chlorine (ltrs)</b></td>
            <td style="padding-top:1px;"><b>Metro (Kl)</b></td>
            <td style="padding-top:1px;"><b>Tankers (Kl)</b></td>
            <td style="padding-top:1px;"><b>Bores(Kl)</b></td>
            <td style="padding-top:1px;"><b>Total water Consum (KI)</b> </td>
            <td style="padding-top:1px;"><b>PPM – RW </b></td>
            <td style="padding-top:1px;"><b>PPM - TW</b></td>
            </tr>
            <tr>
            <td>Day</td>
            <td><?php if(isset($res['wsp_salt']))echo $res['wsp_salt']; ?></td>
            <td><?php if(isset($res['wsp_chlorine']))echo $res['wsp_chlorine']; ?></td>
           <td><?php if(isset($res['wsp_metro']))echo $res['wsp_metro']; ?></td>
            <td><?php if(isset($res['wsp_tankers']))echo $res['wsp_tankers']; ?></td>
            <td><?php if(isset($res['wsp_bores']))echo $res['wsp_bores']; ?></td>
           <td><?php if(isset($res['wsp_tot_water']))echo $res['wsp_tot_water']; ?></td>
            <td rowspan="2"><?php if(isset($res['wsp_ppm_rw']))echo $res['wsp_ppm_rw']; ?></td>
            <td rowspan="2">Sump:<?php if(isset($res['wsp_ppm_tw_sump']))echo $res['wsp_ppm_tw_sump']; ?> </br>Flat:<?php if(isset($res['wsp_ppm_tw_flat']))echo $res['wsp_ppm_tw_flat']; ?></td>
            </tr>
            <tr>
            <td>MTD</td>
            <td><?php echo getmtdfms($datefilter,$sitefilter,'wsp_salt');?></td>
            <td><?php echo getmtdfms($datefilter,$sitefilter,'wsp_chlorine');?></td>
            <td><?php echo getmtdfms($datefilter,$sitefilter,'wsp_metro');?></td>
            <td><?php echo getmtdfms($datefilter,$sitefilter,'wsp_tankers');?></td>
            <td><?php echo getmtdfms($datefilter,$sitefilter,'wsp_bores');?></td>
            <td><?php echo getmtdfms($datefilter,$sitefilter,'wsp_tot_water');?></td>
            </tr>
            <tr>
            <td rowspan="3" style="padding-top:1px;"><b>STP FWS Cons.</b></td>
            <td></td>
           <td style="padding-top:1px;"><b>Avg Inlet Water (Kl)</b></td>
            <td style="padding-top:1px;"><b>Avg treated Water (Kl)</b></td>
            <td style="padding-top:1px;"><b>Avg Water Bypassed (Kl)</b></td>
            <td style="padding-top:1px;"><b>Chlorine (Ltrs)</b></td>
            <td style="padding-top:1px;"><b>Sludge (Kgs)</b></td>
            <td style="padding-top:1px;"><b>Residual Chlorine</b> </td>
            <td style="padding-top:1px;"><b>MLSS</b></td>
            <td style="padding-top:1px;"><b>Abnormalities / Pumps /
            Repair / Tanks cleaning </b></td>
            </tr>
                    <tr>
                        <td>Day</td>
                        <td><?php if(isset($res['stp_avg_inlet_water']))echo $res['stp_avg_inlet_water']; ?></td>
                        <td><?php if(isset($res['stp_avg_treat_water']))echo $res['stp_avg_treat_water']; ?></td>
                        <td><?php if(isset($res['stp_avg_water_bypass']))echo $res['stp_avg_water_bypass']; ?></td>
                        <td><?php if(isset($res['stp_residual_chlorine']))echo $res['stp_residual_chlorine']; ?></td>
                        <td><?php if(isset($res['stp_sludge']))echo $res['stp_sludge']; ?></td>
                        <td><?php if(isset($res['stp_residual_chlorine']))echo $res['stp_residual_chlorine']; ?></td>
                        <td><?php if(isset($res['stp_mlss']))echo $res['stp_mlss']; ?></td>
                        <td rowspan="2" style="padding-top:1px;"><?php if(isset($res['stp_abnormalities']))echo $res['stp_abnormalities']; ?></td>
                    </tr>
                    <tr>
                        <td>MTD</td>
                        <td><?php echo getmtdfms($datefilter,$sitefilter,'stp_avg_inlet_water');?></td>
                        <td><?php echo getmtdfms($datefilter,$sitefilter,'stp_avg_treat_water');?></td>
                        <td><?php echo getmtdfms($datefilter,$sitefilter,'stp_avg_water_bypass');?></td>
                        <td><?php echo getmtdfms($datefilter,$sitefilter,'stp_residual_chlorine');?></td>
                        <td><?php echo getmtdfms($datefilter,$sitefilter,'stp_sludge');?></td>
                        <td><?php echo getmtdfms($datefilter,$sitefilter,'stp_residual_chlorine');?></td>
                    </tr>
                    
                    <tr>
                    	<td rowspan="2"><b>Man power Act / depl</b></td>
                        <td colspan="2"><b>Electricians:</b></td>
                        <td><b>Plumbers:</b></td>
                        <td><b>STP Oper :</b></td>
                        <td colspan="2"><b>F & S :</b></td>
                        <td><b>Gas</b><span></span></td>
                        <td colspan="2"><b>Others </b></td>
                     </tr>
                    <tr>
                    	  <td colspan="2"><span><?php if(isset($res['manpw_elect_actual']))echo $res['manpw_elect_actual']; ?>/<?php if(isset($res['manpw_elect_deploy']))echo $res['manpw_elect_deploy']; ?></span></td>
                        <td><span><?php if(isset($res['manpw_plumb_actual']))echo $res['manpw_plumb_actual']; ?>/<?php if(isset($res['manpw_plumb_deploy']))echo $res['manpw_plumb_deploy']; ?></span></td>
                        <td><span><?php if(isset($res['manpw_stp_actual']))echo $res['manpw_stp_actual']; ?>/<?php if(isset($res['manpw_stp_deploy']))echo $res['manpw_stp_deploy']; ?></span></td>
                        <td colspan="2"><span><?php if(isset($res['manpw_fire_actual']))echo $res['manpw_fire_actual']; ?>/<?php if(isset($res['manpw_fire_deploy']))echo $res['manpw_fire_deploy']; ?></span></td>
                        <td><span><?php if(isset($res['manpw_gas_actual']))echo $res['manpw_gas_actual']; ?>/<?php if(isset($res['manpw_gas_deploy']))echo $res['manpw_gas_deploy']; ?></span></td>
                        <td colspan="2"><span><?php if(isset($res['manpw_other_actual']))echo $res['manpw_other_actual']; ?>/<?php if(isset($res['manpw_other_deploy']))echo $res['manpw_other_deploy']; ?></span> </td>
                     </tr>

                   <tr>
                    	<td rowspan="2"><b>Other Services</b></td>
                        <td  colspan="2"><b>Lifts:</b><span>49</span><br>
                                      <b>  NW / Total:</b><span><?php if(isset($res['othser_lifts_nw']))echo $res['othser_lifts_nw']; ?>/49</span>
                        </td>
                        <td><b>Swimpool</b></td>
                        <td><b>Water Bodies</b></td>
                        <td><b>Irrigation<br> Sprinkler<br> Automation</b></td>
                        <td><b>Solar<br> fencing</b></td>
                        <td><b>Gas</b></td>
                        <td style="padding:0px;">
                        	<table width="100%" style="border:1px solid #fff;">
                            	<tbody>
                                	<tr style="border-bottom:1px solid #000;">
                                    	<td style="border-right:1px solid #000;padding-top:1px;"><b>Total Cons/<br> day </b></td>
                                        <td ><span><?php if(isset($res['othser_gas_totcons']))echo $res['othser_gas_totcons']; ?></span>kgs</td>
                                    </tr>
                                    <tr>
                                    	<td style="border-right:1px solid #000;">MTD</td>
                                        <td><span>8415</span>kgs</td>
                                    </tr>
                                </tbody>
                            </table>
                          </td>
                        <td colspan="2"><b>Bore Wells<br> NW /  T</b></td>
                     </tr>

                    <tr>
                    	<td colspan="2">S:<span><?php if(isset($res['othser_lifts_ser']))echo $res['othser_lifts_ser']; ?></span> &nbsp;&nbsp;&nbsp; BS:<span><?php if(isset($res['othser_lifts_bdser']))echo $res['othser_lifts_bdser']; ?></span> </td>
                        <td>PH:<span><?php if(isset($res['othser_swim_ph']))echo $res['othser_swim_ph']; ?></span> &nbsp;&nbsp;&nbsp; RH:<span><?php if(isset($res['othser_swim_runhrs']))echo $res['othser_swim_runhrs']; ?></span> </td>
                        <td>PH:<span><?php if(isset($res['othser_watbody_ph']))echo $res['othser_watbody_ph']; ?></span> &nbsp;&nbsp;&nbsp; RH:<span><?php if(isset($res['othser_watbody_runhrs']))echo $res['othser_watbody_runhrs']; ?></span> </td>
                        <td><span><?php if(isset($res['other_irrigation_spinklr']))echo $res['other_irrigation_spinklr']; ?></span></td> 
                        <td><span><?php if(isset($res['othser_solar_fencing']))echo $res['othser_solar_fencing']; ?></span></td>
                        <td colspan="2">
                        	<table width="100%" border="0">
                            	<tbody>
                                	<tr>
                                    	<td>Empty:<span><?php if(isset($res['othser_gas_empty']))echo $res['othser_gas_empty']; ?></span></td>
                                        <td>Full:<span><?php if(isset($res['othser_gas_full']))echo $res['othser_gas_full']; ?></span></td>
                                        <td>Rung:<span><?php if(isset($res['othser_gas_running']))echo $res['othser_gas_running']; ?></span></td>
                                    </tr>
                                </tbody>
                            </table>
                        <!--Empty:<span>365</span>&nbsp; Full:<span>172</span>&nbsp; Rung:<span>359</span>--></td>
                         <td colspan="2"><span><?php if(isset($res['othser_gas_borewells']))echo $res['othser_gas_borewells']; ?>/13</span></td>
                    </tr>


                    <tr>
                    	 <td rowspan="2"><b>Complaints</b><br> Close / Total</td>
                        <td colspan="2"><b>Electrical</b></td>
                        <td><b>Plumbing:</b></td>
                        <td><b>Lifts</b></td>
                        <td ><b>Carpentry</b></td>
                        <td><b>Gas</b></td>
                        <td ><b>Civil / Project</b> </td>
                        <td><b>Society Scope</b></td>
                        <td><b>Others</b></td>
                     </tr>
                    <tr>
                    	 <!--<td colspan="1"><span></span></td>-->
                        <td colspan="2"><span><?php if(isset($res['comp_electrical_close']))echo $res['comp_electrical_close']; ?>/<?php if(isset($res['comp_electrical_tot']))echo $res['comp_electrical_tot']; ?></span></td>
                        <td><span><?php if(isset($res['comp_plumbing_close']))echo $res['comp_plumbing_close']; ?>/<?php if(isset($res['comp_plumbing_tot']))echo $res['comp_plumbing_tot']; ?></span></td>
                        <td ><span><?php if(isset($res['comp_lifts_close']))echo $res['comp_lifts_close']; ?>/<?php if(isset($res['comp_lifts_tot']))echo $res['comp_lifts_tot']; ?></span></td>
                        <td><span><?php if(isset($res['comp_carpentary_close']))echo $res['comp_carpentary_close']; ?>/<?php if(isset($res['comp_carpentary_tot']))echo $res['comp_carpentary_tot']; ?></span></td>
                        <td ><span><?php if(isset($res['comp_gas_close']))echo $res['comp_gas_close']; ?>/<?php if(isset($res['comp_gas_tot']))echo $res['comp_gas_tot']; ?></span> </td>
                        <td ><span><?php if(isset($res['comp_civil_close']))echo $res['comp_civil_close']; ?>/<?php if(isset($res['comp_civil_tot']))echo $res['comp_civil_tot']; ?></span> </td>
						  <td ><span><?php if(isset($res['comp_ss_close']))echo $res['comp_ss_close']; ?>/<?php if(isset($res['comp_ss_tot']))echo $res['comp_ss_tot']; ?></span> </td>
                        <td ><span><?php if(isset($res['comp_other_close']))echo $res['comp_other_close']; ?>/<?php if(isset($res['comp_other_tot']))echo $res['comp_other_tot']; ?></span> </td>
                     </tr>
                     
                   <!--  <tr>
                     	<td rowspan="3">Check List<br> Verified</td>
                        <td rowspan="3" colspan="2">STP</td>
                        <td rowspan="3">WSP</td>
                        <td colspan="8" rowspan="3" style="padding:0px;">
                        	<table width="100%">
                            	<tbody>
                                	<tr style="border-bottom:1px solid #6666;text-align:center;">
                                        <td colspan="7">Irrigation Chambers/Surface Drain Chambers/Podium Drain Lines/Soil lines/WASTE Lines/RWH Pits</td>
                                    </tr>
                                    <tr style="border-bottom:1px solid #6666;text-align:center;">
                                        <td colspan="7">Solar Fencing/Capacitor Banks/DG sets/HT Panels/LT Panels/2 Hrs Readings/4 Hrs Readings</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Daily Briefing:<span></span> </td>
                                        <td>Start Time:<span></span></td>
                                        <td> End Time:<span></span></td>
                                        <td> No. of Attendies:<span></span></td>
                                     </tr>
                        			
                        		</tbody>
                        	</table>
                        </td>
                     </tr>-->
                     
                     
                     <tr>
                       <td rowspan="3"><b>Check Lists<br> Verified</b></td>
                       <td rowspan="3" colspan="2" style="vertical-align:top;"><b>STP</b><br><span><?php if(isset($res['clveri_stp']))echo $res['clveri_stp']; ?></span></td>
                       <td rowspan="3" style="vertical-align:top;"><b>WSP</b><br><span><?php if(isset($res['clveri_wsp']))echo $res['clveri_wsp']; ?></span></td>
                       <td colspan="6" style="padding-top:1px;"><b>Irrigation Chambers / Surface Drain Chambers / Podium Drain Lines / Soil lines / Waste Lines / RWH Pits</b></td>
                     </tr>
                      
                      <tr>
                      
                       <td colspan="6" style="padding-top:1px;"><b><?php if(isset($res['clveri_wsp']))echo str_replace(",","/",$res['lists_verified']); ?></b></td>
                      
                      </tr>
                      
                       <tr>
                         <td colspan="6">
                      		<table width="100%" border="0">
                            	<tbody>
                                	<tr>
                                    	<td><b>Daily Briefing:</b> <span><?php if(isset($res['clveri_daily_brief']))echo $res['clveri_daily_brief']; ?></span></td>
                                        <td><b>Start Time:</b> <span><?php if(isset($res['clveri_start_time']))echo $res['clveri_start_time']; ?></span></td>
                                        <td><b> End Time:</b> <span><?php if(isset($res['clveri_end_time']))echo $res['clveri_end_time']; ?></span></td>
                                        <td> <b>No. of Attendees:</b> <span><?php if(isset($res['clveri_attend_num']))echo $res['clveri_attend_num']; ?></span></td>
                                    </tr>
                                </tbody>
                            </table>
                          </td>
                     <!-- <td colspan="2"><b>Daily Briefing:</b> <span>Yes</span> </td>
                                        <td ><b>Start Time:</b> <span>9:10</span></td>
                                        <td ><b> End Time:</b> <span>9:40</span></td>
                                        <td colspan="2"> <b>No. of Attendees:</b> <span>14</span></td>-->
                      
                      </tr>
                     
                     
                   <tr>
                        <td colspan="8"><b>Assets Critically Observed:</b> </br><span><?php if(isset($res['asset_critical_observe']))echo $res['asset_critical_observe']; ?></span></td>
                        <td colspan="2" style="vertical-align:top;"><b>Local Purchase</b><br><span><?php if(isset($res['local_purchase']))echo $res['local_purchase']; ?></span></td>
                   </tr>
                   
                   
                   
                   <tr>
                   		<td colspan="10"><b>Points Discussed in HOD's Meeting:</b> <span> <?php if(isset($res['points_dis_hod_meeting']))echo $res['points_dis_hod_meeting']; ?></span></td>
                   </tr>
                   
                   
                   
                    <tr>
                   		<td colspan="10"><b>AMC Visits / Preventive Maintenance / Break Downs if any:</b><br> <span><?php if(isset($res['amc_visits']))echo $res['amc_visits']; ?></span></td>
                   </tr>
                    
                  


                  <tr>
                   		<td colspan="10"><b>Any commun<br>from / to MC:</b> <span><?php if(isset($res['any_communication']))echo $res['any_communication']; ?></span></td>
                   </tr>
                   
             </tbody>      

</table>
                        
                  </div>
                </div>
              </div>

              

              

              

              

              
            </div>
          </div>
        </div>
        <!-- /page content -->

       
      </div>
    </div>


 <!-- footer content -->
        <?php /*?> <?php include "footer.php"; ?><?php */?>
        <!-- /footer content -->
    <!-- jQuery -->
    <script src="/vendors1/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/vendors1/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
   
    <!-- NProgress -->
    
    <!-- iCheck -->
   
    <!-- Datatables -->
    <script src="/vendors1/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/vendors1/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="/vendors1/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <!--<script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>-->

    <!-- Custom Theme Scripts -->
    <script src="/build/js/custom.min.js"></script>

</html>
<script>
$( document ).ready(function() {
    window.print(); 
	close(); 
	window.location.href = "http://aparna.greaterkakinada.com/dailyreports";  
});

</script>