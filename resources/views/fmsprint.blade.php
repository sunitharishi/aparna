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
	 font-weight:bold;
     color:#000;
	 font-size:15px;
	 

	}

	.fms-incharge table tbody tr th

	{

	 padding:1px;

	 font-size:12px;

	 text-align:center;

	}

	.fms-incharge table tbody tr td

	{

	 padding:1px;

	 font-size:12px;

	 text-align:center;

	}

	.fms-incharge table tbody tr th.text-left

	{

	 text-align:left;

	}

	.fms-incharge table tbody tr td.text-left

	{

	 text-align:left;

	}
	.pump-auto
	{
	 border:none !important;
	}
   .last-modified
   {
    margin-top:0px;
	font-size:12px;
   }
    .sign
   {
    margin-top:0px;
	padding-top:0px;
	font-size:12px;
	padding-left:4px;
	text-align:right;
   }
   p
   {
    white-space:nowrap;
	break-word:normal;
	margin-bottom:0px;
	padding-bottom:0px;
   }
   hr
   {
    margin-top:0px;
	margin-bottom:0px;
	border-bottom:1px solid #000;
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

                  <div class="row x_title" style="border-bottom:none;margin-bottom:0px;padding-bottom:0px;">

                            <span class="col-sm-6 col-xs-6" style="font-size:19px;font-weight:bold;color:#000;padding-right:0px;">APMS | <?php echo get_sitename($sitefilter);?></span>

                        <div class="col-sm-6 col-xs-6 date">FMS | DATE: <?php echo $datefilter;?> | TIME: <?php date_default_timezone_set('Asia/Kolkata'); echo date("h:i:sa"); ?></div>

                  </div>

                  <div class="x_content fms-incharge">

                    	<table width="100%" border="1" style="font-size:10px;vertical-align:top;">

                        <tbody style="border:1px solid #000;">

                        	<tr>

                            	<table width="100%" border="1" >

                                	<tbody>

        <tr>

        <td rowspan="6" style="width:86px;border-bottom:1px solid #fff;"><b>Power<br> Consumption</b></td>

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

            

            <td><b>Day</b></td>

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

            <td><b>MTD</b></td>

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

            <td><b>Day</b></td>

            <td><?php if(isset($res['pwr_vendors']))echo $res['pwr_vendors']; ?></td>

            <td><?php if(isset($res['pwr_common_area']))echo $res['pwr_common_area']; ?></td>

            <td><?php if(isset($res['pwr_others']))echo $res['pwr_others']; ?></td>

            <td><?php if(isset($res['pwr_solarpwrunits']))echo $res['pwr_solarpwrunits']; ?></td>

           

            <td rowspan="2" style="border-bottom:1px solid #fff;"><?php if(isset($res['pwr_pwrfactor']))echo $res['pwr_pwrfactor']; ?> </td>

            <td rowspan="2" style="border-bottom:1px solid #fff;"><?php if(isset($res['pwr_recordedkva']))echo $res['pwr_recordedkva']; ?> </td>

             <td rowspan="2" colspan="2" style="border-bottom:1px solid #fff;"> <?php if(isset($res['pwr_remarks']))echo $res['pwr_remarks']; ?></td>

           

            </tr>

            <tr style="border-bottom:1px solid #fff;">

            <td><b>MTD</b></td>

             <td><?php echo getmtdfms($datefilter,$sitefilter,'pwr_vendors');?></td>

            <td><?php echo getmtdfms($datefilter,$sitefilter,'pwr_common_area');?></td>

            <td><?php echo getmtdfms($datefilter,$sitefilter,'pwr_others');?></td>

            <td><?php echo getmtdfms($datefilter,$sitefilter,'pwr_solarpwrunits');?></td>

            </tr>

            

            </tbody>

            </table>

            </tr>

            

            

            <tr>

            <table width="100%" border="1" >

            <tbody>

            

            <tr>

            <td rowspan="3" style="width:86px;border-bottom:1px solid #fff;"><b>DG sets :</b><span><span><?php echo $fresval['dgsetsnum']; ?></span></span><br>NW  =<span><?php if(isset($res['dgset_notworking']))echo $res['dgset_notworking']; ?></span></td>

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

           <td><b>Day</b></td>

           <td><?php if(isset($res['dgset_pwrfailure']))echo $res['dgset_pwrfailure']; ?></td>

           <td><?php if(isset($res['dset_dieselconsume']))echo $res['dset_dieselconsume']; ?></td>

           <td rowspan="2" style="border-bottom:1px solid #fff;"><?php if(isset($res['dgset_dieselstock']))echo $res['dgset_dieselstock']; ?></td>

           <td><?php if(isset($res['dgset_dieselfilled']))echo $res['dgset_dieselfilled']; ?></td>

           <td rowspan="2" style="border-bottom:1px solid #fff;"><?php if(isset($res['dgset_batterystatus']))echo $res['dgset_batterystatus']; ?></td>

           <td><?php if(isset($res['dgset_dgunits']))echo $res['dgset_dgunits']; ?></td>

           <td colspan="2" rowspan="2" style="border-bottom:1px solid #fff;"><?php if(isset($res['dgset_abnormalities']))echo $res['dgset_abnormalities']; ?></td>

           </tr>



<tr style="border-bottom:1px solid #fff;">

            <td><b>MTD</b></td>

            <td><?php echo getmtdfms($datefilter,$sitefilter,'dgset_pwrfailure');?></td>

            <td><?php echo getmtdfms($datefilter,$sitefilter,'dset_dieselconsume');?></td>

           <?php /*?> <td><?php echo getmtdfms($datefilter,$sitefilter,'dgset_dieselstock');?></td><?php */?>

            <td><?php echo getmtdfms($datefilter,$sitefilter,'dgset_dieselfilled');?></td>

           <?php /*?> <td><?php echo getmtdfms($datefilter,$sitefilter,'dgset_batterystatus');?></td><?php */?>

            <td><?php echo getmtdfms($datefilter,$sitefilter,'dgset_dgunits');?></td>

           </tr>

           

           </tbody>

           </table>

           </tr>

           

           <tr>

           <table width="100%" border="1" >

           <tbody>

           

<tr>

            <td rowspan="6" style="width:86px;border-bottom:1px solid #fff;"><b>WSP DWS Cons.</b></td>

            <td></td>

           <td style="text-align:left;padding:0px;"><p><b>Salt (kgs)</b></p></td>

            <td><p><b>Chlorine (ltrs)</b></p></td>

            <td><b>Metro (Kl)</b></td>

            <td><p><b>Tankers (Kl)</b></p></td>

            <td ><b>Bores(Kl)</b></td>

            <td><b>Total water  Consum (KI)</b> </td>
          </tr>
          
         

            <tr>

            <td><b>Day</b></td>

            <td><?php if(isset($res['wsp_salt']))echo $res['wsp_salt']; ?></td>

            <td><?php if(isset($res['wsp_chlorine']))echo $res['wsp_chlorine']; ?></td>

           <td><?php if(isset($res['wsp_metro']))echo $res['wsp_metro']; ?></td>

            <td><?php if(isset($res['wsp_tankers']))echo $res['wsp_tankers']; ?></td>

            <td><?php if(isset($res['wsp_bores']))echo $res['wsp_bores']; ?></td>

           <td><?php if(isset($res['wsp_tot_water']))echo $res['wsp_tot_water']; ?></td>
           
           </tr>
           
           

            <tr>

            <td><b>MTD</b></td>

            <td><?php echo getmtdfms($datefilter,$sitefilter,'wsp_salt');?></td>

            <td><?php echo getmtdfms($datefilter,$sitefilter,'wsp_chlorine');?></td>

            <td><?php echo getmtdfms($datefilter,$sitefilter,'wsp_metro');?></td>

            <td><?php echo getmtdfms($datefilter,$sitefilter,'wsp_tankers');?></td>

            <td><?php echo getmtdfms($datefilter,$sitefilter,'wsp_bores');?></td>

            <td><?php echo getmtdfms($datefilter,$sitefilter,'wsp_tot_water');?></td>
            
            </tr>
              <tr>
              
            <td style="font-size:11px;text-align:left;padding:0px;"><b><p>PPM–RW </p></b></td>

            <td colspan="2" style="font-size:11px;"><b>PPM - TW</b></td>
           
            <td style="font-size:11px;"><b>Back wash</b></td>
              <td style="font-size:11px;"><b>Filter feed pumps</b></td>
                <td style="font-size:11px;"><b><p>Hydropnuematic pumps</p> (STP & WSP)</b></td>
                <td style="font-size:11px;"><b>Dewatering pumps (STP & WSP)</b></td>

            </tr>
            <tr>
           
            <td rowspan="2"  style="border-bottom:1px solid #fff;"><?php if(isset($res['wsp_ppm_rw']))echo $res['wsp_ppm_rw']; ?></td>

            <td rowspan="2" colspan="2" style="border-bottom:1px solid #fff;">Sump:<?php if(isset($res['wsp_ppm_tw_sump']))echo $res['wsp_ppm_tw_sump']; ?> &nbsp;&nbsp; Flat:<?php if(isset($res['wsp_ppm_tw_flat']))echo $res['wsp_ppm_tw_flat']; ?></td>
             
             <td rowspan="2" style="border-bottom:1px solid #fff;"><span><?php if(isset($res['wsp_back_wash_rnhrs']))echo $res['wsp_back_wash_rnhrs']; ?></span></td>
             <td rowspan="2" style="border-bottom:1px solid #fff;"><span><?php if(isset($res['wsp_filter_feed_pmp_rnhrs']))echo $res['wsp_filter_feed_pmp_rnhrs']; ?></span></td>
              <td rowspan="2" style="border-bottom:1px solid #fff;"><span><?php if(isset($res['wsp_hydro_pmp_sw_rnhrs']))echo $res['wsp_hydro_pmp_sw_rnhrs']; ?></span></td>
               <td rowspan="2" style="border-bottom:1px solid #fff;"><span><?php if(isset($res['wsp_dewater_pmp_rnhrns']))echo $res['wsp_dewater_pmp_rnhrns']; ?></span></td>

            </tr>

            </tbody>

            </table>

            </tr>

            

            <tr>

            <table width="100%" border="1" >

            <tbody>

            

            

            

            <tr>

            <td rowspan="6"  style="width:86px;border-bottom:1px solid #fff;"><b>STP FWS Cons.</b></td>

            <td></td>

           <td><b>Avg Inlet Water (Kl)</b></td>

            <td><b>Avg treated Water (Kl)</b></td>

            <td><b>Avg Water Bypassed (Kl)</b></td>
             <td><b>Residual Chlorine</b> </td>
            <td><b>Chlorine (Ltrs)</b></td>

            <td><b>Sludge (Kgs)</b></td>
          </tr>
          
        
                    <tr>

                        <td><b>Day</b></td>

                        <td><?php if(isset($res['stp_avg_inlet_water']))echo $res['stp_avg_inlet_water']; ?></td>

                        <td><?php if(isset($res['stp_avg_treat_water']))echo $res['stp_avg_treat_water']; ?></td>

                        <td><?php if(isset($res['stp_avg_water_bypass']))echo $res['stp_avg_water_bypass']; ?></td>
                          <td rowspan="2"><?php if(isset($res['stp_residual_chlorine']))echo $res['stp_residual_chlorine']; ?></td>
                        <td><?php if(isset($res['stp_chlorine']))echo $res['stp_chlorine']; ?></td>

                        <td><?php if(isset($res['stp_sludge']))echo $res['stp_sludge']; ?></td>
                       </tr>
                       
                       
                     

                    <tr>

                        <td><b>MTD</b></td>

                        <td><?php echo getmtdfms($datefilter,$sitefilter,'stp_avg_inlet_water');?></td>

                        <td><?php echo getmtdfms($datefilter,$sitefilter,'stp_avg_treat_water');?></td>

                        <td><?php echo getmtdfms($datefilter,$sitefilter,'stp_avg_water_bypass');?></td>
                        <?php /*?> <td class="bottom"><?php echo getmtdfms($datefilter,$sitefilter,'stp_residual_chlorine');?></td><?php */?>
                       <td><?php echo getmtdfms($datefilter,$sitefilter,'stp_chlorine');?></td>

                        <td><?php echo getmtdfms($datefilter,$sitefilter,'stp_sludge');?></td>
                       
						

                    </tr>
                     <tr>
            

            <td ><b>MLSS</b></td>

            <td ><b>Abnormalities / Pumps Repair / Tanks cleaning </b></td>
            <td ><b>Back wash</b></td>
              <td ><b>Filter feed pumps</b></td>
               <td colspan="2"><b>Hydropnuematic<br/> pumps (STP & WSP)</b></td>
                <td><b>Dewatering pumps (STP & WSP)</b></td>

            </tr>
               <tr>
                        <td rowspan="2"  style="border-bottom:1px solid #fff;"><?php if(isset($res['stp_mlss']))echo $res['stp_mlss']; ?></td>

                        <td rowspan="2"  style="padding-top:1px;border-bottom:1px solid #fff;"><?php if(isset($res['stp_abnormalities']))echo $res['stp_abnormalities']; ?></td>
                          <td rowspan="2" style="border-bottom:1px solid #fff;"><span><?php if(isset($res['stp_back_wash_rnhrs']))echo $res['stp_back_wash_rnhrs']; ?></span></td>
                        <td rowspan="2" style="border-bottom:1px solid #fff;"><span><?php if(isset($res['stp_filter_feed_pmp_rnhrs']))echo $res['stp_filter_feed_pmp_rnhrs']; ?></span></td>
                        <td rowspan="2" colspan="2" style="border-bottom:1px solid #fff;"><span><?php if(isset($res['stp_hydro_pmp_sw_rnhrs']))echo $res['stp_hydro_pmp_sw_rnhrs']; ?></span></td>
                        <td rowspan="2" style="border-bottom:1px solid #fff;"><span><?php if(isset($res['stp_dewater_pmp_rnhrns']))echo $res['stp_dewater_pmp_rnhrns']; ?></span></td>

                    </tr>
                    

                    </tbody>

                    </table>

                    </tr>

                    

                    

                    <tr>

                    <table width="100%" border="1" >

                    <tbody>

                    

                    <tr>

                    	<td rowspan="2" style="width:86px;border-bottom:1px solid #fff;"><b>Man power <br> Act / depl</b></td>

                        <td colspan="2"><b>Electricians:</b></td>

                        <td><b>Plumbers:</b></td>

                        <td><b>STP Oper :</b></td>

                        <td colspan="2"><b>F & S :</b></td>

                        <td><b>Gas</b><span></span></td>

                        <td colspan="2"><b>Others </b></td>

                     </tr>

                    <tr style="border-bottom:1px solid #fff;">

                    	  <td colspan="2"><span><?php if(isset($res['manpw_elect_actual']))echo $res['manpw_elect_actual']; ?>/<?php if(isset($res['manpw_elect_deploy']))echo $res['manpw_elect_deploy']; ?></span></td>

                        <td><span><?php if(isset($res['manpw_plumb_actual']))echo $res['manpw_plumb_actual']; ?>/<?php if(isset($res['manpw_plumb_deploy']))echo $res['manpw_plumb_deploy']; ?></span></td>

                        <td><span><?php if(isset($res['manpw_stp_actual']))echo $res['manpw_stp_actual']; ?>/<?php if(isset($res['manpw_stp_deploy']))echo $res['manpw_stp_deploy']; ?></span></td>

                        <td colspan="2"><span><?php if(isset($res['manpw_fire_actual']))echo $res['manpw_fire_actual']; ?>/<?php if(isset($res['manpw_fire_deploy']))echo $res['manpw_fire_deploy']; ?></span></td>

                        <td><span><?php if(isset($res['manpw_gas_actual']))echo $res['manpw_gas_actual']; ?>/<?php if(isset($res['manpw_gas_deploy']))echo $res['manpw_gas_deploy']; ?></span></td>

                        <td colspan="2"><span><?php if(isset($res['manpw_other_actual']))echo $res['manpw_other_actual']; ?>/<?php if(isset($res['manpw_other_deploy']))echo $res['manpw_other_deploy']; ?></span> </td>

                     </tr>

                     

                     </tbody>

                     </table>

                     </tr>

                     

                     





                   <tr>

                   <table width="100%" border="0" >

                   <tbody>

                   <tr style="border-top:1px solid #000;">

                    	<td rowspan="3" style="width:86px;border-bottom:1px solid #fff;border-left:1px solid #000;"><b>Other <br>Services</b></td>

                        <td rowspan="3" colspan="2" style="padding:0px;">
                        	<table width="100%" border="1">
                               <tr>
                                   <td rowspan="2" style="border-top:1px solid #fff;"><b>Lifts:</b></td>
                                   <td style="border-top:1px solid #fff;"><b>Total</b></td>
                                   <td style="border-top:1px solid #fff;"><b>NW</b></td>
                                   <td style="border-top:1px solid #fff;"><b>S</b></td>
                                   <td style="border-top:1px solid #fff;"><b>BS</b></td>
                                </tr>
                                <tr>
                                     <td><span><?php echo $fresval['lifsnum']; ?></span></td>
                                      <td><span><?php if(isset($res['othser_lifts_nw']))echo $res['othser_lifts_nw']; ?></span></td>
                                      <td><span><?php if(isset($res['othser_lifts_ser']))echo $res['othser_lifts_ser']; ?></span></td>
                                      <td><span><?php if(isset($res['othser_lifts_bdser']))echo $res['othser_lifts_bdser']; ?></span></td>
                                </tr>
                                <tr>
                                   <td colspan="5" style="text-align:left;"><b>Irrigation  Sprinkler Automation:</b> <span><?php if(isset($res['other_irrigation_spinklr']))echo $res['other_irrigation_spinklr']; ?></span></td>
                                  
                                </tr>
                                <tr>
                                  <td colspan="5" style="text-align:left;"><b>Solar  fencing:</b> <span><?php if(isset($res['othser_solar_fencing']))echo $res['othser_solar_fencing']; ?></span></td>
                                   
                                </tr>
                                <tr style="border-bottom:1px solid #fff;">
                                    <td colspan="5" rowspan="2" style="text-align:left;border-bottom:1px solid #fff;"><b>Bore Wells NW / T:</b> <span><?php if(isset($res['othser_gas_borewells']))echo $res['othser_gas_borewells']; ?> / <?php echo $fresval['borewellsnum']; ?></span></td>
                                    
                                </tr>
                             </table>
                        </td>
                         
                         
                         
                         <td colspan="2" rowspan="2" style="border-bottom:1px solid #000;border-right:1px solid #000;"><b>Gas</b></td>
                          
                           <td rowspan="2" style="border-right:1px solid #000;"></td>
                         <td colspan="2" style="border-bottom:1px solid #000;border-right:1px solid #000;"><b>Swimpool</b></td>
                          
                           <td colspan="3" style="border-bottom:1px solid #000;border-right:1px solid #000;"><b>Water Bodies</b></td>
                         
                       </tr>
                       
                       <tr style="border-bottom:1px solid #000;">
                          
                          <td style="border-right:1px solid #000;">1</td>
                           <td style="border-right:1px solid #000;">2</td>
                           <td style="border-right:1px solid #000;">1</td>
                           <td style="border-right:1px solid #000;">2</td>
                            <td style="border-right:1px solid #000;">3</td>
                        </tr>

                  


                    <tr style="border-bottom:1px solid #fff;">

                    	
                          
                         
                          
                          <td class="text-left" style="border-right:1px solid #000;"><b>Empty:</b><span><?php if(isset($res['othser_gas_empty']))echo $res['othser_gas_empty']; ?></span><br>
                                       <b>Full:</b><span><?php if(isset($res['othser_gas_full']))echo $res['othser_gas_full']; ?></span><br>
                                       <b>Rung:</b><span><?php if(isset($res['othser_gas_running']))echo $res['othser_gas_running']; ?></span></td>
                          <td style="border-right:1px solid #000;"><b><p style="font-size:10px;">Total Cons/ day</p> </b>
                                        <span><?php if(isset($res['othser_gas_totcons']))echo $res['othser_gas_totcons']; ?></span>kgs<br>
                                       <label style="font-weight:bold;font-size:10px;"> MTD:</label> <span><?php echo getmtdfms($datefilter,$sitefilter,'othser_gas_totcons');?></span>kgs</td>
                          
                          
                          
                       <td style="border-top:1px solid #000;border-right:1px solid #000;"><b>PH:</b><hr><b>CL:</b><hr><b>RH:</b></td>
                       <td style="border-right:1px solid #000;"><span><?php if(isset($res['othser_swim_ph']))echo $res['othser_swim_ph']; ?></span><hr><span><?php if(isset($res['othser_swim_chlorine']))echo $res['othser_swim_chlorine']; ?></span><hr> <span><?php if(isset($res['othser_swim_runhrs']))echo $res['othser_swim_runhrs']; ?></span> </td>
                        
                           <td style="border-right:1px solid #000;"><span><?php if(isset($res['swim_pool_two_ph']))echo $res['swim_pool_two_ph']; ?></span><hr><span><?php if(isset($res['swim_pool_two_chlr']))echo $res['swim_pool_two_chlr']; ?></span><hr><span><?php if(isset($res['swim_pool_two_rn_hrs']))echo $res['swim_pool_two_rn_hrs']; ?></span></td>
                              
                        <td style="border-right:1px solid #000;"><span><?php if(isset($res['othser_watbody_ph']))echo $res['othser_watbody_ph']; ?></span> <hr><span><?php if(isset($res['othser_watbody_chlorine']))echo $res['othser_watbody_chlorine']; ?></span> <hr> <span><?php if(isset($res['othser_watbody_runhrs']))echo $res['othser_watbody_runhrs']; ?></span> </td>
                         <td style="border-right:1px solid #000;"><span><?php if(isset($res['water_body_two_ph']))echo $res['water_body_two_ph']; ?></span><hr><span><?php if(isset($res['water_body_two_chlr']))echo $res['water_body_two_chlr']; ?></span><hr><span><?php if(isset($res['water_body_two_rn_hrs']))echo $res['water_body_two_rn_hrs']; ?></span></td>
                          <td style="border-right:1px solid #000;"><span><?php if(isset($res['water_body_three_ph']))echo $res['water_body_three_ph']; ?></span><hr><span><?php if(isset($res['water_body_three_chlr']))echo $res['water_body_three_chlr']; ?></span><hr><span><?php if(isset($res['water_body_three_rn_hrs']))echo $res['water_body_three_rn_hrs']; ?></span></td>

                        

                    </tr>



                    </tbody>

                    </table>

                    </tr>

                    

                    

                    <tr> 

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

                    	 <td rowspan="2" style="width:86px;border-bottom:1px solid #fff;"><b>Complaints</b><br><?php echo $clval."/".$cltotval; ?></td>

                        <td colspan="2"><b>Electrical</b></td>

                        <td><b>Plumbing:</b></td>

                        <td><b>Lifts</b></td>

                        <td ><b>Carpentry</b></td>

                        <td><b>Gas</b></td>

                        <td ><b>Civil / Project</b> </td>

                        <td><b>Society Scope</b></td>

                        <td><b>Others</b></td>

                     </tr>

                    <tr style="border-bottom:1px solid #fff;">

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

                     </tbody>

                     </table>

                     </tr>

                     

                     

                     <tr>

                     <table width="100%" border="1" >

                     <tbody>

                     

                     <tr style="border-bottom:1px solid #000;">

                       <td rowspan="3" style="width:86px;border-bottom:1px solid #fff;"><b>Check Lists<br> Verified</b></td>

                       <td rowspan="3" colspan="2" style="vertical-align:top;border-bottom:1px solid #fff;"><b>STP</b><br><span style="vertical-align:middle;"><?php if(isset($res['clveri_stp']))echo $res['clveri_stp']; ?></span></td>

                       <td rowspan="3" style="vertical-align:top;border-bottom:1px solid #fff;"><b>WSP</b><br><span><?php if(isset($res['clveri_wsp']))echo $res['clveri_wsp']; ?></span></td>

                      <!-- <td colspan="6"  class-"text-left"><b>Irrigation Chambers/Surface Drain Chambers/Podium Drain Lines/Soil lines/Waste Lines/RWH Pits</b></td>-->
                       <td colspan="6"><b><?php if(isset($res['clveri_wsp']))echo str_replace(",","/",$res['lists_verified']); ?></b></td>

                     </tr>

                      

                    

                      

                       <tr style="border-bottom:1px solid #fff;">

                         <td colspan="6">

                      		<table width="100%" border="0">

                            	<tbody>

                                	<tr style="border-bottom:1px solid #000;">

                                    	<td class="text-left" style="border-bottom:1px solid #fff;"><b>Daily Briefing:</b> <span><?php if(isset($res['clveri_daily_brief']))echo $res['clveri_daily_brief']; ?></span></td>

                                        <td class="text-left" style="border-bottom:1px solid #fff;"><b>Start Time:</b> <span><?php if(isset($res['clveri_start_time']))echo $res['clveri_start_time']; ?></span></td>

                                        <td class="text-left" style="border-bottom:1px solid #fff;"><b> End Time:</b> <span><?php if(isset($res['clveri_end_time']))echo $res['clveri_end_time']; ?></span></td>

                                        <td class="text-left" style="border-bottom:1px solid #fff;"> <b>No. of Attendees:</b> <span><?php if(isset($res['clveri_attend_num']))echo $res['clveri_attend_num']; ?></span></td>

                                    </tr>

                                </tbody>

                            </table>

                          </td>

                     <!-- <td colspan="2"><b>Daily Briefing:</b> <span>Yes</span> </td>

                                        <td ><b>Start Time:</b> <span>9:10</span></td>

                                        <td ><b> End Time:</b> <span>9:40</span></td>

                                        <td colspan="2"> <b>No. of Attendees:</b> <span>14</span></td>-->

                      

                      </tr>

                     

                     </tbody>

                     </table>

                     </tr>

                     
                     
                     <tr style="border-bottom:1px solid #fff;border-top:1px solid #000;">
                     <table width="100%" border="1">
                     <tbody>
                     	<tr>
                        	<td style="width:86px;"><b>Pump Status</b></td>
                            <td colspan="3" class="pump-auto" style="padding:0px;">
                            	<table width="100%" border="1">
                                	<tr>
                                       <td rowspan="2" style="border-bottom: 1px solid #fff;border-left:1px solid #fff;border-top:1px solid #fff;"><b>SWP:</b></td>
                                       <td style="border-top:1px solid #fff;"><b>A</b></td>
                                       <td style="border-top:1px solid #fff;"><b>M</b></td>
                                       <td style="border-top:1px solid #fff;"><b>O</b></td>
                                       <td style="border-right:1px solid #fff;border-top:1px solid #fff;"><b>NW</b></td>
                                    </tr>
                                    <tr style="border-bottom:1px solid #fff;">
                                        <td style="border-bottom:1px solid #fff;"><span><?php if(isset($res['storm_water_auto_pumps']))echo $res['storm_water_auto_pumps']; ?></span></td>
                                        <td style="border-bottom:1px solid #fff;"><span><?php if(isset($res['storm_water_manual_pumps']))echo $res['storm_water_manual_pumps']; ?></span></td>
                                        <td style="border-bottom:1px solid #fff;"><span><?php if(isset($res['storm_water_off_pumps']))echo $res['storm_water_off_pumps']; ?></span></td>
                                        <td style="border-right:1px solid #fff;border-bottom:1px solid #fff;"><span><?php if(isset($res['storm_water_nw_pumps']))echo $res['storm_water_nw_pumps']; ?></span></td>
                                    </tr>
                                </table> 
                                </td>
                            <td colspan="2" class="pump-auto" style="padding:0px;">
                            	<table width="100%" border="1">
                                	<tr>
                                    	<td rowspan="2" style="border-bottom: 1px solid #fff;border-top:1px solid #fff;"><b>DP:</b></td>
                                        <td style="border-top:1px solid #fff;"><b>A</b></td>
                                       <td style="border-top:1px solid #fff;"><b>M</b></td>
                                       <td style="border-top:1px solid #fff;"><b>O</b></td>
                                       <td style="border-top:1px solid #fff;border-right:1px solid #fff;"><b>NW</b></td>
                                    </tr>
                                    <tr style="border-bottom:1px solid #fff;">
                                        <td style="border-bottom:1px solid #fff;"><span><?php if(isset($res['de_water_auto_pumps']))echo $res['de_water_auto_pumps']; ?></span></td>
                                        <td style="border-bottom:1px solid #fff;"><span><?php if(isset($res['de_water_manual_pumps']))echo $res['de_water_manual_pumps']; ?></span></td>
                                        <td style="border-bottom:1px solid #fff;"><span><?php if(isset($res['de_water_off_pumps']))echo $res['de_water_off_pumps']; ?></span></td>
                                       <td style="border-right:1px solid #fff;border-bottom:1px solid #fff;"><span><?php if(isset($res['de_water_nw_pumps']))echo $res['de_water_nw_pumps']; ?></span></td>
                                    </tr>
                                </table> 
                                </td>
                            <td colspan="2" class="pump-auto" style="padding:0px;">
                            	<table width="100%" border="1">
                                	<tr>
                                    	<td rowspan="2" style="border-bottom: 1px solid #fff;border-top:1px solid #fff;"><b>OP:</b></td>
                                        <td style="border-top:1px solid #fff;"><b>A</b></td>
                                        <td style="border-top:1px solid #fff;"><b>M</b></td>
                                        <td style="border-top:1px solid #fff;"><b>O</b></td>
                                        <td style="border-right:1px solid #fff;border-top:1px solid #fff;"><b>NW</b></td>
                                    </tr>
                                    <tr style="border-bottom:1px solid #fff;">
                                       <td style="border-bottom:1px solid #fff;"><span><?php if(isset($res['oozing_water_auto_pumps']))echo $res['oozing_water_auto_pumps']; ?></span></td>
                                       <td style="border-bottom:1px solid #fff;"><span><?php if(isset($res['oozing_water_manual_pumps']))echo $res['oozing_water_manual_pumps']; ?></span></td>
                                       <td style="border-bottom:1px solid #fff;"><span><?php if(isset($res['oozing_water_off_pumps']))echo $res['oozing_water_off_pumps']; ?></span></td>
                                       <td style="border-right:1px solid #fff;border-bottom:1px solid #fff;"><span><?php if(isset($res['oozing_water_nw_pumps']))echo $res['oozing_water_nw_pumps']; ?></span></td>
                                    </tr>
                                </table> 
                                </td>
                            <td colspan="2" class="pump-auto" style="padding:0px;">
                            	<table width="100%" border="1">
                                	<tr>
                                       <td rowspan="2" style="border-bottom: 1px solid #fff;border-top:1px solid #fff;"><b>RWP:</b></td>
                                       <td style="border-top:1px solid #fff;"><b>A</b></td>
                                       <td style="border-top:1px solid #fff;"><b>M</b></td>
                                       <td style="border-top:1px solid #fff;"><b>O</b></td>
                                       <td style="border-top:1px solid #fff;border-right:1px solid #fff;"><b>NW</b></td>
                                    </tr>
                                    <tr style="border-bottom:1px solid #fff;">
                                       <td style="border-bottom:1px solid #fff;"><span><?php if(isset($res['rain_water_auto_pumps']))echo $res['rain_water_auto_pumps']; ?></span></td>
                                       <td style="border-bottom:1px solid #fff;"><span><?php if(isset($res['rain_water_manual_pumps']))echo $res['rain_water_manual_pumps']; ?></span></td>
                                       <td style="border-bottom:1px solid #fff;"><span><?php if(isset($res['rain_water_off_pumps']))echo $res['rain_water_off_pumps']; ?></span></td>
                                       <td style="border-right:1px solid #fff;border-bottom:1px solid #fff;"><span><?php if(isset($res['rain_water_nw_pumps']))echo $res['rain_water_nw_pumps']; ?></span></td>
                                    </tr>
                                </table> 
                                </td>
                        </tr>
                     </tbody>
                     </table>
                     </tr>
                     
                     
                     
                     
                     
                     
                     
                     

                     

                     <tr>

                     <table width="100%" border="1" >

                     <tbody>

                     

                   <tr style="border-bottom:1px solid #fff;border-top:1px solid #000;">

                        <td colspan="8" class="text-left" style="border-top:1px solid #fff;"><b>Assets Critically Observed:</b><span><?php if(isset($res['asset_critical_observe']))echo $res['asset_critical_observe']; ?></span></td>

                        <td colspan="2" style="vertical-align:top;border-top:1px solid #fff;" class="text-left"><b>Local Purchase</b><span><?php if(isset($res['local_purchase']))echo $res['local_purchase']; ?></span></td>

                   </tr>

                   

                   </tbody>

                   </table>

                   </tr>

                   

                   <tr>

                   <table width="100%" border="1" >

                   <tbody>

                   

                   <tr style="border-bottom:1px solid #fff;">

                   		<td colspan="10" class="text-left"><b>Points Discussed in HOD's Meeting:</b> <span> <?php if(isset($res['points_dis_hod_meeting']))echo $res['points_dis_hod_meeting']; ?></span></td>

                   </tr>

                   </tbody>

                   </table>

                   </tr>

                   

                   

                   <tr>

                   <table width="100%" border="1">

                   <tbody>

                   

                    <tr>

                   		<td colspan="10" class="text-left"><span><?php if(isset($res['amc_visits'])) { if($res['amc_visits'])echo "<b>AMC Visits : </b>".$res['amc_visits']."<br/>"; } if(isset($res['preventive_maintain'])) { if($res['preventive_maintain'])echo "<b>Preventive Maintenance : </b>".$res['preventive_maintain']."<br/>"; }  if(isset($res['break_down_any'])) { if($res['break_down_any'])echo "<b>Break Downs if any : </b>".$res['break_down_any']; } ?></span></td>

                   </tr>

                    

                  





                  <tr>

                   		<td colspan="10" class="text-left"><b>Any commun from / to MC:</b> <span><?php if(isset($res['any_communication']))echo $res['any_communication']; ?></span></td>

                   </tr>
                   
                   
                    <tr>
                      <td colspan="10" style="text-align:left;"><b>Additional Information:</b> <span><?php if(isset($res['reasontext']))echo $res['reasontext']; ?></span></td>
                     
				  </tr>

                   </tbody>

                   </table>

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
                   <div class="row">
					<div class="col-xs-6 last-modified"><b> Last Modified Date:</b> <?php echo $dateday." ".$datetime; }?></div>
                    <div class="col-xs-6 sign">
                    	<div class="report-by">
                        	<label><b>Report By:</b> <?php if(isset($res['user_id'])) { echo getlogeedname($res['user_id']); } ?>  </label>
                        </div>
                  </div>
                 </div>

              </div>



              



              



              



              



              

            </div>

          </div>

        </div>

        <!-- /page content -->



       

      </div>

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

	//window.location.href = "http://aparna.greaterkakinada.com/dailyreports"; 

	window.location.href = "/getdailyreportdetail/"+<?php echo $sitefilter;?>; 

	

});



</script>