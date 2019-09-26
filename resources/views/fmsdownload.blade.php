<!DOCTYPE html>

<html lang="en">

  <head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Meta, title, CSS, favicons, etc. -->

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">



    <title>FMS</title>

<style>
 .fms-incharge table
 {
  border-collapse:collapse;
 }
 .fms-incharge table tr td
 {
  font-size:12px;
 }
 .fms-incharge table tr td.bottom
 {
  border-bottom:1px solid #fff;
 }
 .fms-incharge table tr td.all-sides
 {
  border:1px solid #fff;
 }
 .date
 {
  text-align:right;
  font-weight:bold;
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
   table tr td p
   {
    white-space:nowrap;
	word-break:normal;
	margin-bottom:0px;
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

				<?php $fresval = getdefaultfmstot($sitefilter);?>

                  <div class="row x_title" style="border-bottom:none;margin-bottom:3px;padding-bottom:0px;">

                            <span class="col-sm-6 col-xs-6" style="font-size:19px;font-weight:bold;color:#000;padding-right:0px;float:left;">APMS | <?php echo get_sitename($sitefilter);?></span>

                        <div class="col-sm-6 col-xs-6 date">FMS | DATE: <?php echo $datefilter;?> | TIME: <?php date_default_timezone_set('Asia/Kolkata'); echo date("h:i:sa"); ?></div>

                  </div>

                  <div class="x_content fms-incharge">

                    	

                            	<table width="100%" border="1" >

                                	<tbody>

        <tr>

        <td rowspan="6" style="width:90px;border-bottom:1px solid #fff;"><b>Power<br> Consumption</b></td>

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

            

            <td><label style="font-weight:600;">Day</label></td>

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

            <td><label style="font-weight:600;">MTD</label></td>

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

            <td ><b>Vendors</b></td>

            <td><b>Common Area</b></td>

            <td ><b>Others</b></td>

            <td ><b>Solar power units</b></td>

            <td><b>Power factor</b></td>

            <td ><b> Recorded KVA</b></td>

            <td colspan="2" ><b>Remarks</b></td>

           

           

            </tr>

            <tr>

            <td><label style="font-weight:600;">Day</label></td>

            <td><?php if(isset($res['pwr_vendors']))echo $res['pwr_vendors']; ?></td>

            <td><?php if(isset($res['pwr_common_area']))echo $res['pwr_common_area']; ?></td>

            <td><?php if(isset($res['pwr_others']))echo $res['pwr_others']; ?></td>

            <td><?php if(isset($res['pwr_solarpwrunits']))echo $res['pwr_solarpwrunits']; ?></td>

           

            <td rowspan="2" class="bottom"><?php if(isset($res['pwr_pwrfactor']))echo $res['pwr_pwrfactor']; ?> </td>

            <td rowspan="2" class="bottom"><?php if(isset($res['pwr_recordedkva']))echo $res['pwr_recordedkva']; ?> </td>

             <td rowspan="2" colspan="2" class="bottom"> <?php if(isset($res['pwr_remarks']))echo $res['pwr_remarks']; ?></td>

           

            </tr>

            <tr>

            <td class="bottom"><label style="font-weight:600;">MTD</label></td>

             <td class="bottom"><?php echo getmtdfms($datefilter,$sitefilter,'pwr_vendors');?></td>

            <td class="bottom"><?php echo getmtdfms($datefilter,$sitefilter,'pwr_common_area');?></td>

            <td class="bottom"><?php echo getmtdfms($datefilter,$sitefilter,'pwr_others');?></td>

            <td class="bottom"><?php echo getmtdfms($datefilter,$sitefilter,'pwr_solarpwrunits');?></td>

            </tr>

            

            </tbody>

            </table>

         

            <table width="100%" border="1" >

            <tbody>

            

            <tr>

            <td rowspan="3" class="bottom" style="width:90px;"><b>DG sets :</b><span><span><?php echo $fresval['dgsetsnum']; ?></span></span><br>NW  =<span><?php if(isset($res['dgset_notworking']))echo $res['dgset_notworking']; ?></span></td>

            <td></td>

           <td ><b>Power failure(hrs)</b></td>

            <td><b>Diesel consum(ltrs)</b></td>

            <td><b>Diesel stock(ltrs)</b></td>

            <td><b>Diesel filled (ltrs)</b></td>

            <td><b>Battery status</b></td>

            <td><b>DG Units</b></td>

            <td colspan="2"><b>Abnormalities / servicing</b></td>

            </tr>

            

            

            

            

           <tr>

           <td><label style="font-weight:600;">Day</label></td>

           <td ><?php if(isset($res['dgset_pwrfailure']))echo $res['dgset_pwrfailure']; ?></td>

           <td><?php if(isset($res['dset_dieselconsume']))echo $res['dset_dieselconsume']; ?></td>

           <td rowspan="2" class="bottom"><?php if(isset($res['dgset_dieselstock']))echo $res['dgset_dieselstock']; ?></td>

           <td><?php if(isset($res['dgset_dieselfilled']))echo $res['dgset_dieselfilled']; ?></td>

           <td rowspan="2" class="bottom"><?php if(isset($res['dgset_batterystatus']))echo $res['dgset_batterystatus']; ?></td>

           <td><?php if(isset($res['dgset_dgunits']))echo $res['dgset_dgunits']; ?></td>

           <td colspan="2" rowspan="2" class="bottom"><?php if(isset($res['dgset_abnormalities']))echo $res['dgset_abnormalities']; ?></td>

           </tr>



<tr>

            <td class="bottom"><label style="font-weight:600;">MTD</label></td>

            <td class="bottom"><?php echo getmtdfms($datefilter,$sitefilter,'dgset_pwrfailure');?></td>

            <td class="bottom"><?php echo getmtdfms($datefilter,$sitefilter,'dset_dieselconsume');?></td>

           <?php /*?> <td><?php echo getmtdfms($datefilter,$sitefilter,'dgset_dieselstock');?></td><?php */?>

            <td class="bottom"><?php echo getmtdfms($datefilter,$sitefilter,'dgset_dieselfilled');?></td>

           <?php /*?> <td><?php echo getmtdfms($datefilter,$sitefilter,'dgset_batterystatus');?></td><?php */?>

            <td class="bottom"><?php echo getmtdfms($datefilter,$sitefilter,'dgset_dgunits');?></td>

           </tr>

           

           </tbody>

           </table>

         
           <table width="100%" border="1" >

           <tbody>

           

<tr>

            <td rowspan="5" style="width:90px;border-bottom:1px solid #fff;"><b>WSP DWS Cons.</b></td>

            <td></td>

           <td ><b>Salt (kgs)</b></td>

            <td ><b>Chlorine (ltrs)</b></td>

            <td><b>Metro (Kl)</b></td>

            <td ><b>Tankers (Kl)</b></td>

            <td ><b>Bores(Kl)</b></td>

            <td><b>Total water <br> Consum (KI)</b> </td>
            </tr>
            
           

            <tr>

            <td>Day</td>

            <td><?php if(isset($res['wsp_salt']))echo $res['wsp_salt']; ?></td>

            <td><?php if(isset($res['wsp_chlorine']))echo $res['wsp_chlorine']; ?></td>

           <td><?php if(isset($res['wsp_metro']))echo $res['wsp_metro']; ?></td>

            <td><?php if(isset($res['wsp_tankers']))echo $res['wsp_tankers']; ?></td>

            <td><?php if(isset($res['wsp_bores']))echo $res['wsp_bores']; ?></td>

           <td><?php if(isset($res['wsp_tot_water']))echo $res['wsp_tot_water']; ?></td>
          </tr>
          
         

            <tr>

            <td class="bottom">MTD</td>

            <td class="bottom"><?php echo getmtdfms($datefilter,$sitefilter,'wsp_salt');?></td>

            <td class="bottom"><?php echo getmtdfms($datefilter,$sitefilter,'wsp_chlorine');?></td>

            <td class="bottom"><?php echo getmtdfms($datefilter,$sitefilter,'wsp_metro');?></td>

            <td class="bottom"><?php echo getmtdfms($datefilter,$sitefilter,'wsp_tankers');?></td>

            <td class="bottom"><?php echo getmtdfms($datefilter,$sitefilter,'wsp_bores');?></td>

            <td class="bottom"><?php echo getmtdfms($datefilter,$sitefilter,'wsp_tot_water');?></td>

            </tr>

             <tr>
            <td ><b>PPM – RW </b></td>

            <td ><b>PPM - TW</b></td>
            <td ><b>Back wash</b></td>
              <td ><b>Filter feed pumps</b></td>
               <td ><b>Hydropnuematic pumps</b></td>
                <td colspan="2"><b>Dewatering pumps</b></td>

            </tr>
              <tr>
            <td  class="bottom"><?php if(isset($res['wsp_ppm_rw']))echo $res['wsp_ppm_rw']; ?></td>

            <td  class="bottom"><label style="font-weight:600;">Sump:</label> <?php if(isset($res['wsp_ppm_tw_sump']))echo $res['wsp_ppm_tw_sump']; ?> </br><label style="font-weight:600;">Flat:</label><?php if(isset($res['wsp_ppm_tw_flat']))echo $res['wsp_ppm_tw_flat']; ?></td>
            <td style="border-bottom:1px solid #fff;"><span><?php if(isset($res['wsp_back_wash_rnhrs']))echo $res['wsp_back_wash_rnhrs']; ?></span></td>
             <td  style="border-bottom:1px solid #fff;"><span><?php if(isset($res['wsp_filter_feed_pmp_rnhrs']))echo $res['wsp_filter_feed_pmp_rnhrs']; ?></span></td>
              <td  style="border-bottom:1px solid #fff;"><span><?php if(isset($res['wsp_hydro_pmp_sw_rnhrs']))echo $res['wsp_hydro_pmp_sw_rnhrs']; ?></span></td>
               <td  colspan="2" style="border-bottom:1px solid #fff;"><span><?php if(isset($res['wsp_dewater_pmp_rnhrns']))echo $res['wsp_dewater_pmp_rnhrns']; ?></span></td>

            </tr>
            </tbody>

            </table>

         

            <table width="100%" border="1" >

            <tbody>

            

            

            

            <tr>

            <td rowspan="5"  style="width:90px;border-bottom:1px solid #fff;"><b>STP FWS Cons.</b></td>

            <td></td>

           <td><b>Avg Inlet Water (Kl)</b></td>

            <td><b>Avg treated Water (Kl)</b></td>

            <td><b>Avg Water Bypassed (Kl)</b></td>
             <td><b>Residual Chlorine</b> </td>
            <td><b>Chlorine (Ltrs)</b></td>

            <td><b>Sludge (Kgs)</b></td>

            </tr>
            
           
                    <tr>

                        <td>Day</td> 

                        <td><?php if(isset($res['stp_avg_inlet_water']))echo $res['stp_avg_inlet_water']; ?></td>

                        <td><?php if(isset($res['stp_avg_treat_water']))echo $res['stp_avg_treat_water']; ?></td>

                        <td><?php if(isset($res['stp_avg_water_bypass']))echo $res['stp_avg_water_bypass']; ?></td>
                         <td rowspan="2" style="border-bottom:1px solid #fff;"><?php if(isset($res['stp_residual_chlorine']))echo $res['stp_residual_chlorine']; ?></td>
                        <td><?php if(isset($res['stp_chlorine']))echo $res['stp_chlorine']; ?></td>

                        <td><?php if(isset($res['stp_sludge']))echo $res['stp_sludge']; ?></td>
                      </tr>
                       
                     

                    <tr>

                        <td class="bottom">MTD</td>

                        <td class="bottom"><?php echo getmtdfms($datefilter,$sitefilter,'stp_avg_inlet_water');?></td>

                        <td class="bottom"><?php echo getmtdfms($datefilter,$sitefilter,'stp_avg_treat_water');?></td>

                        <td class="bottom"><?php echo getmtdfms($datefilter,$sitefilter,'stp_avg_water_bypass');?></td>
                        <?php /*?> <td class="bottom"><?php echo getmtdfms($datefilter,$sitefilter,'stp_residual_chlorine');?></td><?php */?>
                       <td class="bottom"><?php echo getmtdfms($datefilter,$sitefilter,'stp_chlorine');?></td>

                        <td class="bottom"><?php echo getmtdfms($datefilter,$sitefilter,'stp_sludge');?></td>
                       
						

                    </tr>
                    <tr>

            <td><b>MLSS</b></td>

            <td><b>Abnormalities / Pumps Repair / Tanks cleaning </b></td>
             <td ><b>Back wash</b></td>
              <td ><b>Filter feed pumps</b></td>
               <td colspan="2"><b>Hydropnuematic<br/> pumps </b></td>
                <td><b>Dewatering pumps</b></td>

            </tr>
              <tr>
                        <td  class="bottom"><?php if(isset($res['stp_mlss']))echo $res['stp_mlss']; ?></td>

                        <td  class="bottom" style="padding-top:1px;"><?php if(isset($res['stp_abnormalities']))echo $res['stp_abnormalities']; ?></td>
                           <td  style="border-bottom:1px solid #fff;"><span><?php if(isset($res['stp_back_wash_rnhrs']))echo $res['stp_back_wash_rnhrs']; ?></span></td>
                        <td  style="border-bottom:1px solid #fff;"><span><?php if(isset($res['stp_filter_feed_pmp_rnhrs']))echo $res['stp_filter_feed_pmp_rnhrs']; ?></span></td>
                        <td  colspan="2" style="border-bottom:1px solid #fff;"><span><?php if(isset($res['stp_hydro_pmp_sw_rnhrs']))echo $res['stp_hydro_pmp_sw_rnhrs']; ?></span></td>
                        <td  style="border-bottom:1px solid #fff;"><span><?php if(isset($res['stp_dewater_pmp_rnhrns']))echo $res['stp_dewater_pmp_rnhrns']; ?></span></td>

                    </tr>
                    

                    </tbody>

                    </table>

                  
                  
                  
                  

                    <table width="100%" border="1" >

                    <tbody>

                    

                    <tr>

                    	<td rowspan="2" style="width:90px;border-bottom:1px solid #fff;"><b>Man power <br> Act / depl</b></td>

                        <td colspan="2"><b>Electricians:</b></td>

                        <td><b>Plumbers:</b></td>

                        <td><b>STP Oper :</b></td>

                        <td colspan="2"><b>F & S :</b></td>

                        <td><b>Gas</b><span></span></td>

                        <td colspan="2"><b>Others </b></td>

                     </tr>

                    <tr>

                    	  <td colspan="2" class="bottom"><span><?php if(isset($res['manpw_elect_actual']))echo $res['manpw_elect_actual']; ?>/<?php if(isset($res['manpw_elect_deploy']))echo $res['manpw_elect_deploy']; ?></span></td>

                        <td class="bottom"><span><?php if(isset($res['manpw_plumb_actual']))echo $res['manpw_plumb_actual']; ?>/<?php if(isset($res['manpw_plumb_deploy']))echo $res['manpw_plumb_deploy']; ?></span></td>

                        <td class="bottom"><span><?php if(isset($res['manpw_stp_actual']))echo $res['manpw_stp_actual']; ?>/<?php if(isset($res['manpw_stp_deploy']))echo $res['manpw_stp_deploy']; ?></span></td>

                        <td colspan="2" class="bottom"><span><?php if(isset($res['manpw_fire_actual']))echo $res['manpw_fire_actual']; ?>/<?php if(isset($res['manpw_fire_deploy']))echo $res['manpw_fire_deploy']; ?></span></td>

                        <td class="bottom"><span><?php if(isset($res['manpw_gas_actual']))echo $res['manpw_gas_actual']; ?>/<?php if(isset($res['manpw_gas_deploy']))echo $res['manpw_gas_deploy']; ?></span></td>

                        <td colspan="2" class="bottom"><span><?php if(isset($res['manpw_other_actual']))echo $res['manpw_other_actual']; ?>/<?php if(isset($res['manpw_other_deploy']))echo $res['manpw_other_deploy']; ?></span> </td>

                     </tr>

                     

                     </tbody>

                     </table>

                   
                   <table width="100%" border="1" >

                   <tbody>


 <tr>
                    	 <td rowspan="5" style="width:90px;border-bottom:1px solid #fff;"><b>Other Services</b></td>
                         <td rowspan="2"><b>Lifts:</b></td>
                         <td><b>Total</b></td>
                         <td><b>NW</b></td>
                         <td><b>S</b></td>
                         <td><b>BS</b></td>
                         <td rowspan="2" colspan="2"><b>Gas</b></td>
                         <td rowspan="2"></td>
                         <td colspan="2"><b>Swimpool</b></td>
                         <td colspan="3"><b>Water Bodies</b></td>
                     </tr>
                     
                     <tr>
                        <td><span><?php echo $fresval['lifsnum']; ?></span></td>
                        <td><span><?php if(isset($res['othser_lifts_nw']))echo $res['othser_lifts_nw']; ?></span></td>
                        <td><span><?php if(isset($res['othser_lifts_ser']))echo $res['othser_lifts_ser']; ?></span></td>
                        <td><span><?php if(isset($res['othser_lifts_bdser']))echo $res['othser_lifts_bdser']; ?></span></td>
                        <td>1</td>
                        <td>2</td>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                     </tr>
                     <tr>
                       <td colspan="5"><b>Irrigation Sprinkler Automation: </b> <span><?php if(isset($res['other_irrigation_spinklr']))echo $res['other_irrigation_spinklr']; ?></span></td>
                       <td style="border-bottom:0px;">Empty:<span><?php if(isset($res['othser_gas_empty']))echo $res['othser_gas_empty']; ?></span></td>
                       <td style="border-bottom:0px;"><p><b>Total Cons/ day </b></p></td>
                       <td><b>PH</b></td>
                       <td><span><?php if(isset($res['othser_swim_ph']))echo $res['othser_swim_ph']; ?></span></td>
                       <td><span><?php if(isset($res['swim_pool_two_ph']))echo $res['swim_pool_two_ph']; ?></span></td>
                       <td><span><?php if(isset($res['othser_watbody_ph']))echo $res['othser_watbody_ph']; ?></span></td>
                       <td><span><?php if(isset($res['water_body_two_ph']))echo $res['water_body_two_ph']; ?></span></td>
                       <td><span><?php if(isset($res['water_body_three_ph']))echo $res['water_body_three_ph']; ?></span></td>
                     </tr> 
                      
                      <tr>
                         <td colspan="5" class="vendor-color"><b>Solar fencing:</b> <span><?php if(isset($res['othser_solar_fencing']))echo $res['othser_solar_fencing']; ?></span></td>
                         <td>Full:<span><?php if(isset($res['othser_gas_full']))echo $res['othser_gas_full']; ?></span></td>
                         <td><span><?php if(isset($res['othser_gas_totcons']))echo $res['othser_gas_totcons']; ?></span>kgs</td>
                         <td><b>CL</b></td>
                         <td><span><?php if(isset($res['othser_swim_chlorine']))echo $res['othser_swim_chlorine']; ?></span></td>
                         <td><span><?php if(isset($res['swim_pool_two_chlr']))echo $res['swim_pool_two_chlr']; ?></span></td>
                         <td><span><?php if(isset($res['othser_watbody_chlorine']))echo $res['othser_watbody_chlorine']; ?></span></td>
                         <td><span><?php if(isset($res['water_body_two_chlr']))echo $res['water_body_two_chlr']; ?></span></td>
                         <td><span><?php if(isset($res['water_body_three_chlr']))echo $res['water_body_three_chlr']; ?></span></td>
                      </tr> 
                       <tr>
                          <td colspan="5" style="border-bottom:1px solid #fff;"><b>Bore Wells  NW /  T:</b> <span><?php if(isset($res['othser_gas_borewells']))echo $res['othser_gas_borewells']; ?>/<?php echo $fresval['borewellsnum']; ?></span></td>
                          <td style="border-bottom:1px solid #fff;">Rung:<span><?php if(isset($res['othser_gas_running']))echo $res['othser_gas_running']; ?></span></td>
                          <td style="border-bottom:1px solid #fff;"><b>MTD: </b> <span><?php echo getmtdfms($datefilter,$sitefilter,'othser_gas_totcons');?></span>kgs</td>
                          <td style="border-bottom:1px solid #fff;"><b>RH</b></td>
                          <td style="border-bottom:1px solid #fff;"><span><?php if(isset($res['othser_swim_runhrs']))echo $res['othser_swim_runhrs']; ?></span></td>
                          <td style="border-bottom:1px solid #fff;"><span><?php if(isset($res['swim_pool_two_rn_hrs']))echo $res['swim_pool_two_rn_hrs']; ?></span></td>
                          <td style="border-bottom:1px solid #fff;"><span><?php if(isset($res['othser_watbody_runhrs']))echo $res['othser_watbody_runhrs']; ?></span></td>
                          <td style="border-bottom:1px solid #fff;"><span><?php if(isset($res['water_body_two_rn_hrs']))echo $res['water_body_two_rn_hrs']; ?></span></td>
                          <td style="border-bottom:1px solid #fff;"><span><?php if(isset($res['water_body_three_rn_hrs']))echo $res['water_body_three_rn_hrs']; ?></span></td>
                       </tr>

















<?php /*?>





                   <tr>

                    	<td rowspan="3" style="width:90px;border-bottom:1px solid #fff;"><b>Other <br>Services</b></td>

                        <td  colspan="2" rowspan="2"><b>Lifts:</b><span><?php echo $fresval['lifsnum']; ?></span><br>

                                      <b>  NW :</b><span><?php if(isset($res['othser_lifts_nw']))echo $res['othser_lifts_nw']; ?></span>

                        </td>

                       
                           <td colspan="2"><b><p>Swimpool</p></b></td>
                           <td colspan="3"><b><p>Water Bodies</p></b></td>
                        <td rowspan="2"><b>Irrigation<br> Sprinkler<br> Automation</b></td>

                        <td rowspan="2"><b>Solar<br> fencing</b></td>

                        <td rowspan="2"><b>Gas</b></td>

                        <td rowspan="2" style="padding:0px;">

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

                        <td colspan="2" rowspan="2"><b>Bore Wells<br> NW / T</b></td>

                     </tr>
                     <tr>
                       <td>1</td>
                       <td>2</td>
                       <td>1</td>
                       <td>2</td>
                       <td>3</td>
                     </tr>


                    <tr>

                    	<td colspan="2" class="bottom">S:<span><?php if(isset($res['othser_lifts_ser']))echo $res['othser_lifts_ser']; ?></span> &nbsp;&nbsp;&nbsp; BS:<span><?php if(isset($res['othser_lifts_bdser']))echo $res['othser_lifts_bdser']; ?></span> </td>
     
                       
     
                       <td class="bottom" style="border-right:1px solid #000;"><label style="font-weight:600;font-size:12px;">PH:</label><span><?php if(isset($res['othser_swim_ph']))echo $res['othser_swim_ph']; ?></span><br><label style="font-weight:600;font-size:12px;">CL:</label><span><?php if(isset($res['othser_swim_chlorine']))echo $res['othser_swim_chlorine']; ?></span> <br><label style="font-weight:600;font-size:12px;">RH:</label><span><?php if(isset($res['othser_swim_runhrs']))echo $res['othser_swim_runhrs']; ?></span> </td>
                         <td class="bottom"><label style="font-weight:600;font-size:12px;">PH:</label><span><?php if(isset($res['swim_pool_two_ph']))echo $res['swim_pool_two_ph']; ?></span><br><label style="font-weight:600;font-size:12px;">CL:</label><span><?php if(isset($res['swim_pool_two_chlr']))echo $res['swim_pool_two_chlr']; ?></span><br><label style="font-weight:600;font-size:12px;">RH:</label><span><?php if(isset($res['swim_pool_two_rn_hrs']))echo $res['swim_pool_two_rn_hrs']; ?></span></td>
                               
                        
                        
                        <td class="bottom" style="border-right:1px solid #000;"><label style="font-weight:600;font-size:12px;">PH:</label><span><?php if(isset($res['othser_watbody_ph']))echo $res['othser_watbody_ph']; ?></span> <br> <label style="font-weight:600;font-size:12px;">CL:</label><span><?php if(isset($res['othser_watbody_chlorine']))echo $res['othser_watbody_chlorine']; ?></span><br><label style="font-weight:600;font-size:12px;"> RH:</label><span><?php if(isset($res['othser_watbody_runhrs']))echo $res['othser_watbody_runhrs']; ?></span> </td>
                        
                            <td class="bottom" style="border-right:1px solid #000;"><label style="font-weight:600;font-size:12px;">PH:</label><span><?php if(isset($res['water_body_two_ph']))echo $res['water_body_two_ph']; ?></span><br><label style="font-weight:600;font-size:12px;">CL:</label><span><?php if(isset($res['water_body_two_chlr']))echo $res['water_body_two_chlr']; ?></span><br><label style="font-weight:600;font-size:12px;">RH:</label><span><?php if(isset($res['water_body_two_rn_hrs']))echo $res['water_body_two_rn_hrs']; ?></span></td>
                            
                          <td class="bottom"><label style="font-weight:600;font-size:12px;">PH:</label><span><?php if(isset($res['water_body_three_ph']))echo $res['water_body_three_ph']; ?></span><br><label style="font-weight:600;font-size:12px;">CL:</label><span><?php if(isset($res['water_body_three_chlr']))echo $res['water_body_three_chlr']; ?></span><br><label style="font-weight:600;font-size:12px;">RH:</label><span><?php if(isset($res['water_body_three_rn_hrs']))echo $res['water_body_three_rn_hrs']; ?></span></td>
                        
                         

                        <td class="bottom"><span><?php if(isset($res['other_irrigation_spinklr']))echo $res['other_irrigation_spinklr']; ?></span></td> 

                        <td class="bottom"><span><?php if(isset($res['othser_solar_fencing']))echo $res['othser_solar_fencing']; ?></span></td>

                        <td colspan="2" class="bottom">

                        	<table width="100%" border="0">

                            	<tbody>

                                	<tr>

                                    	<td class="text-left"><label style="font-weight:600;">Empty:</label><span><?php if(isset($res['othser_gas_empty']))echo $res['othser_gas_empty']; ?></span></td>

                                        <td class="text-left"><label style="font-weight:600;">Full:</label><span><?php if(isset($res['othser_gas_full']))echo $res['othser_gas_full']; ?></span></td>

                                        <td class="text-left"><label style="font-weight:600;">Rung:</label><span><?php if(isset($res['othser_gas_running']))echo $res['othser_gas_running']; ?></span></td>

                                    </tr>

                                </tbody>

                            </table>

                        <!--Empty:<span>365</span>&nbsp; Full:<span>172</span>&nbsp; Rung:<span>359</span>--></td>

                         <td colspan="2" class="bottom"><span><?php if(isset($res['othser_gas_borewells']))echo $res['othser_gas_borewells']; ?>/<?php echo $fresval['borewellsnum']; ?></span></td>

                    </tr>
<?php */?>


                    </tbody>

                    </table>

                  

                    <table width="100%" border="1" >

                    <tbody>



                    <tr>
					
					 <?php $clval = 0; $cltotval = 0;
					    if(isset($res['comp_electrical_close'])) $clval = (float)$clval + (float)$res['comp_electrical_close']; 
					    if(isset($res['comp_plumbing_close'])) $clval = (float)$clval + (float)$res['comp_plumbing_close']; 
						if(isset($res['comp_lifts_close'])) $clval = (float)$clval + (float)$res['comp_lifts_close']; 
						if(isset($res['comp_carpentary_close'])) $clval = (float)$clval + (float)$res['comp_carpentary_close']; 
						if(isset($res['comp_gas_close'])) $clval = (float)$clval + (float)$res['comp_gas_close']; 
						if(isset($res['comp_civil_close'])) $clval = (float)$clval + (float)$res['comp_civil_close']; 
						if(isset($res['comp_ss_close'])) $clval = (float)$clval + (float)$res['comp_ss_close']; 
						if(isset($res['comp_other_close'])) $clval = (float)$clval + (float)$res['comp_other_close']; 
						
						if(isset($res['comp_electrical_tot'])) $cltotval = (float)$cltotval + (float)$res['comp_electrical_tot']; 
					    if(isset($res['comp_plumbing_tot'])) $cltotval = (float)$cltotval + (float)$res['comp_plumbing_tot']; 
						if(isset($res['comp_lifts_tot'])) $cltotval = (float)$cltotval + (float)$res['comp_lifts_tot']; 
						if(isset($res['comp_carpentary_tot'])) $cltotval = (float)$cltotval + (float)$res['comp_carpentary_tot']; 
						if(isset($res['comp_gas_tot'])) $cltotval = (float)$cltotval + (float)$res['comp_gas_tot']; 
						if(isset($res['comp_civil_tot'])) $cltotval = (float)$cltotval + (float)$res['comp_civil_tot']; 
						if(isset($res['comp_ss_tot'])) $cltotval = (float)$cltotval + (float)$res['comp_ss_tot']; 
					   if(isset($res['comp_other_tot'])) $cltotval = (float)$cltotval + (float)$res['comp_other_tot']; 
					  
					   ?>
  
                    	 <td rowspan="2" style="width:90px;border-bottom:1px solid #fff;"><b>Complaints</b><br><?php echo $clval."/".$cltotval; ?></td>

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

                        <td colspan="2" class="bottom"><span><?php if(isset($res['comp_electrical_close']))echo $res['comp_electrical_close']; ?>/<?php if(isset($res['comp_electrical_tot']))echo $res['comp_electrical_tot']; ?></span></td>

                        <td class="bottom"><span><?php if(isset($res['comp_plumbing_close']))echo $res['comp_plumbing_close']; ?>/<?php if(isset($res['comp_plumbing_tot']))echo $res['comp_plumbing_tot']; ?></span></td>

                        <td class="bottom"><span><?php if(isset($res['comp_lifts_close']))echo $res['comp_lifts_close']; ?>/<?php if(isset($res['comp_lifts_tot']))echo $res['comp_lifts_tot']; ?></span></td>

                        <td class="bottom"><span><?php if(isset($res['comp_carpentary_close']))echo $res['comp_carpentary_close']; ?>/<?php if(isset($res['comp_carpentary_tot']))echo $res['comp_carpentary_tot']; ?></span></td>

                        <td class="bottom"><span><?php if(isset($res['comp_gas_close']))echo $res['comp_gas_close']; ?>/<?php if(isset($res['comp_gas_tot']))echo $res['comp_gas_tot']; ?></span> </td>

                        <td class="bottom"><span><?php if(isset($res['comp_civil_close']))echo $res['comp_civil_close']; ?>/<?php if(isset($res['comp_civil_tot']))echo $res['comp_civil_tot']; ?></span> </td>

						  <td class="bottom"><span><?php if(isset($res['comp_ss_close']))echo $res['comp_ss_close']; ?>/<?php if(isset($res['comp_ss_tot']))echo $res['comp_ss_tot']; ?></span> </td>

                        <td class="bottom"><span><?php if(isset($res['comp_other_close']))echo $res['comp_other_close']; ?>/<?php if(isset($res['comp_other_tot']))echo $res['comp_other_tot']; ?></span> </td>

                     </tr>

                     


                     </tbody>

                     </table>

                   

                     <table width="100%" border="1" >

                     <tbody>

                     

                     <tr style="border-bottom:1px solid #000;">

                       <td rowspan="2" style="width:90px;border-bottom:1px solid #fff;"><b>Check Lists<br> Verified</b></td>

                       <td rowspan="2" colspan="2" style="vertical-align:top;border-bottom:1px solid #fff;width:10%;"><b>STP</b><br><span style="vertical-align:middle;"><?php if(isset($res['clveri_stp']))echo $res['clveri_stp']; ?></span></td>

                       <td rowspan="2" style="vertical-align:top;border-bottom:1px solid #fff;"><b>WSP</b><br><span><?php if(isset($res['clveri_wsp']))echo $res['clveri_wsp']; ?></span></td>

                      <!-- <td colspan="6"  class-"text-left"><b>Irrigation Chambers/Surface Drain Chambers/Podium Drain Lines/Soil lines/Waste Lines/RWH Pits</b></td>-->
                       <td colspan="6"><b><?php if(isset($res['clveri_wsp']))echo str_replace(",","/",$res['lists_verified']); ?></b></td>

                     </tr>

                      

                    

                      

                       <tr>

                         <td colspan="6" class="bottom">

                      		<table width="100%" border="0">

                            	<tbody>

                                	<tr style="border-bottom:1px solid #000;">

                                    <td class="text-left"><b>Daily Briefing:</b> <span><?php if(isset($res['clveri_daily_brief']))echo $res['clveri_daily_brief']; ?></span></td>
                                    <td class="text-left"><b>Start Time:</b> <span><?php if(isset($res['clveri_start_time']))echo $res['clveri_start_time']; ?></span></td>
                                   <td class="text-left"><b> End Time:</b> <span><?php if(isset($res['clveri_end_time']))echo $res['clveri_end_time']; ?></span></td>
                                   <td class="text-left"> <b>No. of Attendees:</b> <span><?php if(isset($res['clveri_attend_num']))echo $res['clveri_attend_num']; ?></span></td>

                                    </tr>

                                </tbody>

                            </table>

                          </td>

                    
                      

                      </tr>

                     

                     </tbody>

                     </table>

                    

                     
                     
                   
                     <table width="100%" border="1">
                     <tbody>
                     	<tr>
                        	<td style="width:90px;border-bottom:1px solid #fff;"><b>Pump Status</b></td>
                            <td colspan="3" class="pump-auto all-sides" style="padding:0px;">
                            	<table width="100%" border="1">
                                	<tr>
                                       <td rowspan="2" style="border-bottom: 1px solid #fff;border-left:1px solid #fff;"><b>SWP:</b></td>
                                       <td>A</td>
                                       <td>M</td>
                                       <td>O</td>
                                       <td style="border-right:1px solid #fff;">NW</td>
                                    </tr>
                                    <tr style="border-bottom:1px solid #fff;">
                                        <td class="bottom"><span><?php if(isset($res['storm_water_auto_pumps']))echo $res['storm_water_auto_pumps']; ?></span></td>
                                        <td class="bottom"><span><?php if(isset($res['storm_water_manual_pumps']))echo $res['storm_water_manual_pumps']; ?></span></td>
                                        <td class="bottom"><span><?php if(isset($res['storm_water_off_pumps']))echo $res['storm_water_off_pumps']; ?></span></td>
                                        <td class="bottom" style="border-right:1px solid #fff;"><span><?php if(isset($res['storm_water_nw_pumps']))echo $res['storm_water_nw_pumps']; ?></span></td>
                                    </tr>
                                </table> 
                                </td>
                            <td colspan="2" class="pump-auto all-sides" style="padding:0px;">
                            	<table width="100%" border="1">
                                	<tr>
                                    	<td rowspan="2" style="border-bottom: 1px solid #fff;"><b>DP:</b></td>
                                        <td>A</td>
                                       <td>M</td>
                                       <td>O</td>
                                       <td style="border-right:1px solid #fff;">NW</td>
                                    </tr>
                                    <tr style="border-bottom:1px solid #fff;">
                                        <td class="bottom"><span><?php if(isset($res['de_water_auto_pumps']))echo $res['de_water_auto_pumps']; ?></span></td>
                                        <td class="bottom"><span><?php if(isset($res['de_water_manual_pumps']))echo $res['de_water_manual_pumps']; ?></span></td>
                                        <td class="bottom"><span><?php if(isset($res['de_water_off_pumps']))echo $res['de_water_off_pumps']; ?></span></td>
                                       <td class="bottom" style="border-right:1px solid #fff;"><span><?php if(isset($res['de_water_nw_pumps']))echo $res['de_water_nw_pumps']; ?></span></td>
                                    </tr>
                                </table> 
                                </td>
                            <td colspan="2" class="pump-auto all-sides" style="padding:0px;">
                            	<table width="100%" border="1">
                                	<tr>
                                    	<td rowspan="2" style="border-bottom: 1px solid #fff;"><b>OP:</b></td>
                                        <td>A</td>
                                        <td>M</td>
                                        <td>O</td>
                                        <td style="border-right:1px solid #fff;">NW</td>
                                    </tr>
                                    <tr style="border-bottom:1px solid #fff;">
                                       <td class="bottom"><span><?php if(isset($res['oozing_water_auto_pumps']))echo $res['oozing_water_auto_pumps']; ?></span></td>
                                       <td class="bottom"><span><?php if(isset($res['oozing_water_manual_pumps']))echo $res['oozing_water_manual_pumps']; ?></span></td>
                                       <td class="bottom"><span><?php if(isset($res['oozing_water_off_pumps']))echo $res['oozing_water_off_pumps']; ?></span></td>
                                       <td class="bottom" style="border-right:1px solid #fff;"><span><?php if(isset($res['oozing_water_nw_pumps']))echo $res['oozing_water_nw_pumps']; ?></span></td>
                                    </tr>
                                </table> 
                                </td>
                            <td colspan="2" class="pump-auto" style="padding:0px;border-top:1px solid #fff;border-left:1px solid #fff;border-bottom:1px solid #fff;">
                            	<table width="100%" border="1">
                                	<tr>
                                       <td rowspan="2" style="border-bottom: 1px solid #fff;"><b>RWP:</b></td>
                                       <td>A</td>
                                       <td>M</td>
                                       <td>O</td>
                                       <td style="border-right:1px solid #fff;">NW</td>
                                    </tr>
                                    <tr style="border-bottom:1px solid #fff;">
                                       <td class="bottom"><span><?php if(isset($res['rain_water_auto_pumps']))echo $res['rain_water_auto_pumps']; ?></span></td>
                                       <td class="bottom"><span><?php if(isset($res['rain_water_manual_pumps']))echo $res['rain_water_manual_pumps']; ?></span></td>
                                       <td class="bottom"><span><?php if(isset($res['rain_water_off_pumps']))echo $res['rain_water_off_pumps']; ?></span></td>
                                       <td class="bottom" style="border-right:1px solid #fff;"><span><?php if(isset($res['rain_water_nw_pumps']))echo $res['rain_water_nw_pumps']; ?></span></td>
                                    </tr>
                                </table> 
                                </td>
                        </tr>
                     </tbody>
                     </table>
                    
                     <table width="100%" border="1" >

                     <tbody>

                     

                   <tr style="border-bottom:1px solid #fff;">

                        <td colspan="8" class="text-left"><b>Assets Critically Observed:</b> </br><span><?php if(isset($res['asset_critical_observe']))echo $res['asset_critical_observe']; ?></span></td>

                        <td colspan="2" style="vertical-align:top;" class="text-left"><b>Local Purchase:</b> <span><?php if(isset($res['local_purchase']))echo $res['local_purchase']; ?></span></td>

                   </tr>
                       <tr>

                   		<td colspan="10" class="text-left"><b>Points Discussed in HOD's Meeting:</b> <span> <?php if(isset($res['points_dis_hod_meeting']))echo $res['points_dis_hod_meeting']; ?></span></td>

                   </tr>
                    
                    <tr>

                   		<td colspan="10" class="text-left"><span><?php if(isset($res['amc_visits'])) { if($res['amc_visits'])echo "<b>AMC Visits : </b>".$res['amc_visits']."<br/>"; } if(isset($res['preventive_maintain'])) { if($res['preventive_maintain'])echo "<b>Preventive Maintenance : </b>".$res['preventive_maintain']."<br/>"; }  if(isset($res['break_down_any'])) { if($res['break_down_any'])echo "<b>Break Downs if any : </b>".$res['break_down_any']; } ?></span></td>

                   </tr>
                    <tr>

                   		<td colspan="10" class="text-left"><b>Any commun from / to MC:</b> <span><?php if(isset($res['any_communication']))echo $res['any_communication']; ?></span></td>

                   </tr>
                   
                    <tr>
                      <td colspan="10" class="text-left"><b>Additional Information:</b> <span><?php if(isset($res['reasontext']))echo $res['reasontext']; ?></span></td>
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
                             
                          </div>
                          
                          
<div class="mubarakas">
    <div class="last-modified"><b>Last Modified Date:</b> <?php echo $dateday." ".$datetime; }?></div>
    <div class="sign1">
        <label><b>Report By:</b> <?php if(isset($res['user_id'])) { echo getlogeedname($res['user_id']); } ?>  </label>
    </div>
</div>

              </div>
              

            </div>

          </div>

        </div>

        <!-- /page content -->



       

      </div>

    </div>





</html>

