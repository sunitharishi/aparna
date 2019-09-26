

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
	 color:#00754d;
	 font-size:14px;
	}
	.fms-incharge table tbody tr th
	{
	 padding:3px;
	 font-size:11px;
	 text-align:center;
	}
	.fms-incharge table tbody tr td
	{
	 padding:3px;
	 font-size:11px;
	 text-align:center
	}
	.fms-incharge table tbody tr td.text-left
	{
	 text-align:left;
	}
	.fms-incharge table tbody tr td span
	{
	 color:#0000FF;
	 font-weight:bold;
	}
	.fms-incharge table
	{
	 width:80%;
	 margin:0 auto;
	}
	.fms-incharge table tr td table
	{
	 width:100%;
	}
	.color-text
	{
	 color:#FF0000;
	}
	.date input
	{
	 border:1px solid #000;
	 width:90%;
	}
	.back-button
	{
	 width: 80%;
    margin: 0 auto;
    padding-bottom: 10px;
	text-align:right;
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
	.row.x_title
	{
	 width:80%;
	 margin:0 auto;
	}
	
	.last-modified
{
 float:left;
 padding-top:6px;
}
.report-by
{
float:right;
}
.lasrrrr
{
 width:80%;
 margin:0 auto;
}
.sign1
{
 margin-top:4px;
}
.vendor-color
{
background-color:#ffc1070f;
}
	</style>
     @extends('layouts.app')


@section('content')

    <div class="body">
      <div class="main_container fmsblade">
     <?php /*?> <?php include "header.php"; ?><?php */?>
        <!-- /top navigation -->
     
        <!-- page content -->
		  <?php $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 

									$sitevv = $uriSegments[2]; ?>

			 <div class="back-button"><a href="/getdailyreportdetail/<?php echo $sitevv;  ?>/<?php echo $uriSegments[3];  ?>">Back</a></div>
		
        <div class="right_col" role="main">
          <div class="models">
            <!--<div class="clearfix"></div>-->
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12 pms-view-page">
                <div  style="padding-top:8px;">
                  <div class="row x_title pumpkinllnkl" style="border-bottom:none;margin-bottom:0px;padding-bottom:0px;">
                            <span class="col-sm-6 col-xs-6" style="font-size:14px;font-weight:bold;color:#ff5f20;padding:0px;">APMS | <?php echo get_sitename($sitefilter);?></span>
                        <div class="col-sm-6 col-xs-6 date fms"><!--<input type="text"  value="">--> FMS | DATE: <?php echo $datefilter;?> | TIME:  <?php date_default_timezone_set('Asia/Kolkata'); echo date("h:i:sa");?></div>
                  </div>
				  <?php $fresval = getdefaultfmstot($sitefilter);?>
                  <div class="x_content fms-incharge fms-view">
                    	<table  border="1" style="font-size:10px;vertical-align:top;">
                        <tbody style="border:1px solid #000;">
        <tr>
        <td rowspan="6" style="background-color:#b8cde6;"><b>Power Consumption</b></td>
        <td></td>
        <td class="vendor-color"><b>CTPT</b></td>
        <td class="vendor-color"><b>Total LT</b></td>
        <td class="vendor-color"><b>Losses</b></td>
        <td class="vendor-color"><b>Residents</b></td>
        <td colspan="2" class="vendor-color"><b>Clubhouse</b></td>
        <td colspan="2" class="vendor-color"><b>STP</b></td>
        <td colspan="2" class="vendor-color"><b>WSP</b></td>
        <td colspan="2" class="vendor-color"><b>Lifts</b></td>
            </tr>
            <tr>
            
            <td>Day</td>
            <td><span><?php if(isset($res['pwr_ctpt']))echo (float)$res['pwr_ctpt']; ?></span></td>
            <td><span><?php if(isset($res['pwr_tot_lt']))echo (float)$res['pwr_tot_lt']; ?></span></td>
            <td><span> <?php if(isset($res['pwr_tot_lt']) && isset($res['pwr_tot_lt'])) echo  ((float)$res['pwr_ctpt'] -  (float)$res['pwr_tot_lt']);?><!--style="color:#FF0000;">203</span>--></td>
            <td><span><?php if(isset($res['pwr_residents']))echo $res['pwr_residents']; ?></span></td>
            <td colspan="2"><span><?php if(isset($res['pwr_club_house']))echo $res['pwr_club_house']; ?></span></td>
            <td colspan="2"><span><?php if(isset($res['pwr_stp']))echo $res['pwr_stp']; ?></span></td>
            <td colspan="2"><span><?php if(isset($res['pwr_wsp']))echo $res['pwr_wsp']; ?></span></td>
            <td colspan="2"><span><?php if(isset($res['pwr_lifts']))echo $res['pwr_lifts']; ?></span></td>
            </tr>
            <tr>
            <td>MTD</td>
            <td><span><?php echo getmtdfms($datefilter,$sitefilter,'pwr_ctpt');?></span></td>
            <td><span><?php echo getmtdfms($datefilter,$sitefilter,'pwr_tot_lt');?></span></td>
            <td><span><?php echo (getmtdfms($datefilter,$sitefilter,'pwr_ctpt') - getmtdfms($datefilter,$sitefilter,'pwr_tot_lt'));?></span></td> 
            <td><span><?php echo getmtdfms($datefilter,$sitefilter,'pwr_residents');?></span></td>
            <td colspan="2"><span><?php echo getmtdfms($datefilter,$sitefilter,'pwr_club_house');?></span></td>
            <td colspan="2"><span><?php echo getmtdfms($datefilter,$sitefilter,'pwr_stp');?></span></td>
            <td colspan="2"><span><?php echo getmtdfms($datefilter,$sitefilter,'pwr_wsp');?></span></td>
            <td colspan="2"><span><?php echo getmtdfms($datefilter,$sitefilter,'pwr_lifts');?></span></td>
            </tr>

<tr>
            <td></td>
            <td style="padding-top:1px;" class="vendor-color"><b>Vendors</b></td>
            <td style="padding-top:1px;" class="vendor-color"><b>Common Area</b></td>
            <td style="padding-top:1px;" class="vendor-color"><b>Others</b></td>
            <td colspan="2" style="padding-top:1px;" class="vendor-color"><b>Solar power units</b></td>
            <td  style="padding-top:1px;" class="vendor-color"><b>Power factor</b></td>
            <td colspan="2" style="padding-top:1px;" class="vendor-color"><b> Recorded KVA</b></td>
            <td colspan="4" class="text-left vendor-color" style="padding-top:1px;"><b>Remarks</b></td>
           
           
            </tr>
            <tr>
            <td>Day</td>
            <td><span><?php if(isset($res['pwr_vendors']))echo $res['pwr_vendors']; ?></span></td>
            <td><span><?php if(isset($res['pwr_common_area']))echo $res['pwr_common_area']; ?></span></td>
            <td><span><?php if(isset($res['pwr_others']))echo $res['pwr_others']; ?></span></td>
            <td colspan="2"><span><?php if(isset($res['pwr_solarpwrunits']))echo $res['pwr_solarpwrunits']; ?></span></td>
           
            <td rowspan="2"><span><?php if(isset($res['pwr_pwrfactor']))echo $res['pwr_pwrfactor']; ?></span> </td>
            <td rowspan="2" colspan="2"><span><?php if(isset($res['pwr_recordedkva']))echo $res['pwr_recordedkva']; ?></span> </td>
             <td rowspan="2" colspan="4" class="text-left"> <span><?php if(isset($res['pwr_remarks']))echo $res['pwr_remarks']; ?></span></td>
           
            </tr>
            <tr>
            <td>MTD</td>
            <td><span><?php echo getmtdfms($datefilter,$sitefilter,'pwr_vendors');?></span></td>
            <td><span><?php echo getmtdfms($datefilter,$sitefilter,'pwr_common_area');?></span></td>
            <td><span><?php echo getmtdfms($datefilter,$sitefilter,'pwr_others');?></span></td>
            <td colspan="2"><span><?php echo getmtdfms($datefilter,$sitefilter,'pwr_solarpwrunits');?></span></td>
            </tr>
            <tr>
            <td rowspan="3" style="background-color:#cce0d0;"><b>DG sets :</b><span><?php echo $fresval['dgsetsnum']; ?></span><br />NW =<span><?php if(isset($res['dgset_notworking']))echo $res['dgset_notworking']; ?></span></td>
            <td></td>
           <td class="vendor-color" style="padding-top:1px;"><b>Power failure(hrs)</b></td>
            <td colspan="2" class="vendor-color" style="padding-top:1px;"><b>Diesel consum(ltrs)</b></td>
            <td colspan="2" class="vendor-color" style="padding-top:1px;"><b>Diesel stock(ltrs)</b></td>
            <td colspan="2" class="vendor-color" style="padding-top:1px;"><b>Diesel filled (ltrs)</b></td>
            <td class="vendor-color" style="padding-top:1px;"><b>Battery status</b></td>
            <td class="vendor-color" style="padding-top:1px;"><b>DG Units</b></td>
            <td colspan="3" class="vendor-color" style="padding-top:1px;"><b>Abnormalities / servicing</b></td>
            </tr>
           <tr> 
           <td>Day</td>
           <td><span><?php if(isset($res['dgset_pwrfailure']))echo $res['dgset_pwrfailure']; ?></span></td>
           <td colspan="2"><span><?php if(isset($res['dset_dieselconsume']))echo $res['dset_dieselconsume']; ?></span></td>
           <td rowspan="2" colspan="2"><span><?php if(isset($res['dgset_dieselstock']))echo $res['dgset_dieselstock']; ?></span></td>
           <td colspan="2"><span><?php if(isset($res['dgset_dieselfilled']))echo $res['dgset_dieselfilled']; ?></span></td>
           <td rowspan="2"><span><?php if(isset($res['dgset_batterystatus']))echo $res['dgset_batterystatus']; ?></span></td>
           <td><span><?php if(isset($res['dgset_dgunits']))echo $res['dgset_dgunits']; ?></span></td>
           <td colspan="4" rowspan="2" class="text-left"><span><?php if(isset($res['dgset_abnormalities']))echo $res['dgset_abnormalities']; ?></span></td>
           </tr>

<tr>
            <td>MTD</td>
            <td><span><?php echo getmtdfms($datefilter,$sitefilter,'dgset_pwrfailure');?></span></td>
            <td colspan="2"><span><?php echo getmtdfms($datefilter,$sitefilter,'dset_dieselconsume');?></span></td>
          <?php /*?>  <td><span><?php echo getmtdfms($datefilter,$sitefilter,'dgset_dieselstock');?></span></td><?php */?>
            <td colspan="2"><span><?php echo getmtdfms($datefilter,$sitefilter,'dgset_dieselfilled');?></span></td>
            
            <td><span><?php echo getmtdfms($datefilter,$sitefilter,'dgset_dgunits');?></span></td>
           </tr>
<tr>
            <td rowspan="5" style="background-color:#b8cde6;"><b>WSP DWS Cons.</b></td>
            <td></td>
           <td class="vendor-color" style="padding-top:1px;"><b>Salt (kgs)</b></td>
            <td colspan="2" class="vendor-color" style="padding-top:1px;"><b>Chlorine (ltrs)</b></td>
            <td class="vendor-color" style="padding-top:1px;"><b>Metro (Kl)</b></td>
            <td class="vendor-color" style="padding-top:1px;"><b>Tankers (Kl)</b></td>
            <td colspan="3" class="vendor-color" style="padding-top:1px;"><b>Bores(Kl)</b></td>
            <td colspan="4" class="vendor-color" style="padding-top:1px;"><b>Total water Consum (KI)</b> </td>
           
            </tr>
            <tr>
            <td>Day</td>
            <td><span><?php if(isset($res['wsp_salt']))echo $res['wsp_salt']; ?></span></td>
            <td colspan="2"><span><?php if(isset($res['wsp_chlorine']))echo $res['wsp_chlorine']; ?></span></td>
           <td><span><?php if(isset($res['wsp_metro']))echo $res['wsp_metro']; ?></span></td>
            <td><span><?php if(isset($res['wsp_tankers']))echo $res['wsp_tankers']; ?></span></td>
            <td colspan="3"><span><?php if(isset($res['wsp_bores']))echo $res['wsp_bores']; ?></span></td>
          
           <td colspan="4"><span><?php if(isset($res['wsp_tot_water']))echo $res['wsp_tot_water']; ?></span></td>
           
            </tr>
            <tr>
            <td>MTD</td>
            <td><span><?php echo getmtdfms($datefilter,$sitefilter,'wsp_salt');?></span></td>
            <td colspan="2"><span><?php echo getmtdfms($datefilter,$sitefilter,'wsp_chlorine');?></span></td>
            <td><span><?php echo getmtdfms($datefilter,$sitefilter,'wsp_metro');?></span></td>
            <td><span><?php echo getmtdfms($datefilter,$sitefilter,'wsp_tankers');?></span></td>
            <td colspan="3"><span><?php echo getmtdfms($datefilter,$sitefilter,'wsp_bores');?></span></td>
            <td colspan="4"><span><?php echo getmtdfms($datefilter,$sitefilter,'wsp_tot_water');?></span></td>
             
            </tr>
            <tr>
               
               <td colspan="2" class="vendor-color" style="padding-top:1px;"><b>PPM – RW </b></td>
               <td colspan="2" class="vendor-color" style="padding-top:1px;"><b>PPM - TW</b></td>
               <td class="vendor-color" style="padding-top:1px;"><b>Back wash</b></td>
               <td colspan="2" class="vendor-color" style="padding-top:1px;"><b>Filter feed pumps</b></td>
               <td colspan="3" class="vendor-color" style="padding-top:1px;"><b>Hydropnuematic pumps</b></td>
               <td colspan="3" class="vendor-color" style="padding-top:1px;"><b>Dewatering pumps</b></td>
            </tr>
            
            <tr> 
              
               <td colspan="2"><span><?php if(isset($res['wsp_ppm_rw']))echo $res['wsp_ppm_rw']; ?></span></td>
            <td colspan="2">Sump:<span><?php if(isset($res['wsp_ppm_tw_sump']))echo $res['wsp_ppm_tw_sump']; ?></span> &nbsp;&nbsp; Flat:<span><?php if(isset($res['wsp_ppm_tw_flat']))echo $res['wsp_ppm_tw_flat']; ?></span>           </td>
              <td><span><?php if(isset($res['wsp_back_wash_rnhrs']))echo $res['wsp_back_wash_rnhrs']; ?></span></td>
             <td colspan="2"><span><?php if(isset($res['wsp_filter_feed_pmp_rnhrs']))echo $res['wsp_filter_feed_pmp_rnhrs']; ?></span></td>
              <td colspan="3"><span><?php if(isset($res['wsp_hydro_pmp_sw_rnhrs']))echo $res['wsp_hydro_pmp_sw_rnhrs']; ?></span></td>
               <td colspan="3"><span><?php if(isset($res['wsp_dewater_pmp_rnhrns']))echo $res['wsp_dewater_pmp_rnhrns']; ?></span></td>
            </tr>
            
            
            <tr>
            <td rowspan="5" style="padding-top:1px;background-color:#cce0d0;"><b>STP FWS Cons.</b></td>
            <td></td>
            <td class="vendor-color" style="padding-top:1px;"><b>Avg Inlet Water (Kl)</b></td>
            <td colspan="2" class="vendor-color" style="padding-top:1px;"><b>Avg treated Water (Kl)</b></td>
            <td colspan="3" class="vendor-color" style="padding-top:1px;"><b>Avg Water Bypassed (Kl)</b></td>
             <td colspan="2" class="vendor-color" style="padding-top:1px;"><b>Residual Chlorine</b> </td>
            <td colspan="2" class="vendor-color" style="padding-top:1px;"><b>Chlorine (Ltrs)</b></td>
            <td colspan="2" class="vendor-color" style="padding-top:1px;"><b>Sludge (Kgs)</b></td>
          
          
            </tr>
                    <tr>
                        <td>Day</td>
                        <td><span><?php if(isset($res['stp_avg_inlet_water']))echo $res['stp_avg_inlet_water']; ?></span></td>
                        <td colspan="2"><span><?php if(isset($res['stp_avg_treat_water']))echo $res['stp_avg_treat_water']; ?></span></td>
                        <td colspan="3"><span><?php if(isset($res['stp_avg_water_bypass']))echo $res['stp_avg_water_bypass']; ?></span></td>
                         <td rowspan="2" colspan="2"><span><?php if(isset($res['stp_residual_chlorine']))echo $res['stp_residual_chlorine']; ?></span></td>
						 <td colspan="2"><span><?php if(isset($res['stp_chlorine']))echo $res['stp_chlorine']; ?></span></td>
                        <td colspan="2"><span><?php if(isset($res['stp_sludge']))echo $res['stp_sludge']; ?></span></td>
                      
                     
                    </tr>
                    <tr> 
                        <td>MTD</td>
                        <td><span><?php echo getmtdfms($datefilter,$sitefilter,'stp_avg_inlet_water');?></span></td>
                        <td colspan="2"><span><?php echo getmtdfms($datefilter,$sitefilter,'stp_avg_treat_water');?></span></td>
                        <td colspan="3"><span><?php echo getmtdfms($datefilter,$sitefilter,'stp_avg_water_bypass');?></span></td>
                       <?php /*?><td class="bottom"><span><?php echo getmtdfms($datefilter,$sitefilter,'stp_residual_chlorine');?></span></td><?php */?>
						<td colspan="2"><span><?php echo getmtdfms($datefilter,$sitefilter,'stp_chlorine');?></span></td>
                        <td colspan="2"><span><?php echo getmtdfms($datefilter,$sitefilter,'stp_sludge');?></span></td>
						<?php /*?><td><span><?php echo getmtdfms($datefilter,$sitefilter,'stp_residual_chlorine');?></span></td><?php */?>
                    </tr>
                    
                    <tr>
                        <td style="padding-top:1px;"><b>MLSS</b></td>
                       <td colspan="3" class="text-left" style="padding-top:1px;"><b>Abnormalities / Pumps Repair / Tanks cleaning </b></td>
                       <td colspan="2" class="vendor-color" style="padding-top:1px;"><b>Back wash</b></td>
                       <td colspan="2" class="vendor-color" style="padding-top:1px;"><b>Filter feed pumps</b></td>
                       <td colspan="3" class="vendor-color" style="padding-top:1px;"><b>Hydropnuematic pumps </b></td>
                       <td colspan="2" class="vendor-color" style="padding-top:1px;"><b>Dewatering pumps</b></td>
                    </tr>
                     <tr>
                        <td><span><?php if(isset($res['stp_mlss']))echo $res['stp_mlss']; ?></span></td>
                        <td colspan="3" class="text-left" style="padding-top:1px;"><span><?php if(isset($res['stp_abnormalities']))echo $res['stp_abnormalities']; ?></span></td>
                         <td colspan="2"><span><?php if(isset($res['stp_back_wash_rnhrs']))echo $res['stp_back_wash_rnhrs']; ?></span></td>
                        <td colspan="2"><span><?php if(isset($res['stp_filter_feed_pmp_rnhrs']))echo $res['stp_filter_feed_pmp_rnhrs']; ?></span></td>
                        <td colspan="3"><span><?php if(isset($res['stp_hydro_pmp_sw_rnhrs']))echo $res['stp_hydro_pmp_sw_rnhrs']; ?></span></td>
                        <td colspan="2"><span><?php if(isset($res['stp_dewater_pmp_rnhrns']))echo $res['stp_dewater_pmp_rnhrns']; ?></span></td>
                     </tr>
                    
                    <tr>
                    	 <td rowspan="2" style="background-color:#b8cde6;"><b>Man power Act / depl</b></td>
                        <td colspan="3" class="vendor-color"><b>Electricians:</b></td>
                        <td colspan="2" class="vendor-color"><b>Plumbers:</b></td>
                        <td class="vendor-color"><b>STP Oper :</b></td>
                        <td colspan="2" class="vendor-color"><b>F & S :</b></td>
                        <td colspan="2" class="vendor-color"><b>Gas</b><span></span></td>
                        <td colspan="3" class="vendor-color"><b>Others </b></td>
                     </tr>
                    <tr>
                    	 <td colspan="3"><span><?php if(isset($res['manpw_elect_actual']))echo $res['manpw_elect_actual']; ?>/<?php if(isset($res['manpw_elect_deploy']))echo $res['manpw_elect_deploy']; ?></span></td>
                        <td colspan="2"><span><?php if(isset($res['manpw_plumb_actual']))echo $res['manpw_plumb_actual']; ?>/<?php if(isset($res['manpw_plumb_deploy']))echo $res['manpw_plumb_deploy']; ?></span></td>
                        <td><span><?php if(isset($res['manpw_stp_actual']))echo $res['manpw_stp_actual']; ?>/<?php if(isset($res['manpw_stp_deploy']))echo $res['manpw_stp_deploy']; ?></span></td>
                        <td colspan="2"><span><?php if(isset($res['manpw_fire_actual']))echo $res['manpw_fire_actual']; ?>/<?php if(isset($res['manpw_fire_deploy']))echo $res['manpw_fire_deploy']; ?></span></td>
                        <td colspan="2"><span><?php if(isset($res['manpw_gas_actual']))echo $res['manpw_gas_actual']; ?>/<?php if(isset($res['manpw_gas_deploy']))echo $res['manpw_gas_deploy']; ?></span></td>
                        <td colspan="3"><span><?php if(isset($res['manpw_other_actual']))echo $res['manpw_other_actual']; ?>/<?php if(isset($res['manpw_other_deploy']))echo $res['manpw_other_deploy']; ?></span> </td>
                     </tr>

                   <tr>
                    	 <td rowspan="5" style="background-color:#cce0d0;"><b>Other Services</b></td>
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
                        <td> <b>  NW:</b><span><?php if(isset($res['othser_lifts_nw']))echo $res['othser_lifts_nw']; ?></span></td>
                        <td>S:<span><?php if(isset($res['othser_lifts_ser']))echo $res['othser_lifts_ser']; ?></span></td>
                        <td>BS:<span><?php if(isset($res['othser_lifts_bdser']))echo $res['othser_lifts_bdser']; ?></span></td>
                        <td>1</td>
                        <td>2</td>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                     </tr>
                     <tr>
                       <td colspan="5"><b>Irrigation Sprinkler Automation: </b> <span><?php if(isset($res['other_irrigation_spinklr']))echo $res['other_irrigation_spinklr']; ?></span></td>
                       <td>Empty:<span><?php if(isset($res['othser_gas_empty']))echo $res['othser_gas_empty']; ?></span></td>
                       <td><b>Total Cons/ day </b></td>
                       <td style="width:3%;"><b>PH</b></td>
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
                          <td colspan="5"><b>Bore Wells  NW /  T:</b> <span><?php if(isset($res['othser_gas_borewells']))echo $res['othser_gas_borewells']; ?>/<?php echo $fresval['borewellsnum']; ?></span></td>
                          <td>Rung:<span><?php if(isset($res['othser_gas_running']))echo $res['othser_gas_running']; ?></span></td>
                          <td><b>MTD: </b> <span><?php echo getmtdfms($datefilter,$sitefilter,'othser_gas_totcons');?></span>kgs</td>
                          <td><b>RH</b></td>
                          <td><span><?php if(isset($res['othser_swim_runhrs']))echo $res['othser_swim_runhrs']; ?></span></td>
                          <td><span><?php if(isset($res['swim_pool_two_rn_hrs']))echo $res['swim_pool_two_rn_hrs']; ?></span></td>
                          <td><span><?php if(isset($res['othser_watbody_runhrs']))echo $res['othser_watbody_runhrs']; ?></span></td>
                          <td><span><?php if(isset($res['water_body_two_rn_hrs']))echo $res['water_body_two_rn_hrs']; ?></span></td>
                          <td><span><?php if(isset($res['water_body_three_rn_hrs']))echo $res['water_body_three_rn_hrs']; ?></span></td>
                       </tr>
                      
                       
               
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
                    	 <td rowspan="2" style="background-color:#b8cde6;"><b>Complaints</b><br> <?php echo $clval."/".$cltotval; ?></td>
                        <td colspan="2" class="vendor-color"><b>Electrical</b></td>
                        <td class="vendor-color"><b>Plumbing:</b></td>
                        <td class="vendor-color"><b>Lifts</b></td>
                        <td colspan="2" class="vendor-color"><b>Carpentry</b></td>
                        <td class="vendor-color"><b>Gas</b></td>
                        <td colspan="2" class="vendor-color"><b>Civil / Project</b> </td>
                        <td colspan="2" class="vendor-color"><b>Society Scope</b></td>
                        <td colspan="2" class="vendor-color"><b>Others</b></td>
                     </tr>
                    <tr>
                    	 <!--<td colspan="1"><span></span></td>-->
                        <td colspan="2"><span><?php if(isset($res['comp_electrical_close']))echo $res['comp_electrical_close']; ?>/<?php if(isset($res['comp_electrical_tot']))echo $res['comp_electrical_tot']; ?></span></td>
                        <td><span><?php if(isset($res['comp_plumbing_close']))echo $res['comp_plumbing_close']; ?>/<?php if(isset($res['comp_plumbing_tot']))echo $res['comp_plumbing_tot']; ?></span></td>
                        <td ><span><?php if(isset($res['comp_lifts_close']))echo $res['comp_lifts_close']; ?>/<?php if(isset($res['comp_lifts_tot']))echo $res['comp_lifts_tot']; ?></span></td>
                        <td colspan="2"><span><?php if(isset($res['comp_carpentary_close']))echo $res['comp_carpentary_close']; ?>/<?php if(isset($res['comp_carpentary_tot']))echo $res['comp_carpentary_tot']; ?></span></td>
                        <td ><span><?php if(isset($res['comp_gas_close']))echo $res['comp_gas_close']; ?>/<?php if(isset($res['comp_gas_tot']))echo $res['comp_gas_tot']; ?></span> </td>
                        <td colspan="2"><span><?php if(isset($res['comp_civil_close']))echo $res['comp_civil_close']; ?>/<?php if(isset($res['comp_civil_tot']))echo $res['comp_civil_tot']; ?></span> </td>
						  <td colspan="2"><span><?php if(isset($res['comp_ss_close']))echo $res['comp_ss_close']; ?>/<?php if(isset($res['comp_ss_tot']))echo $res['comp_ss_tot']; ?></span> </td>
                        <td colspan="2"><span><?php if(isset($res['comp_other_close']))echo $res['comp_other_close']; ?>/<?php if(isset($res['comp_other_tot']))echo $res['comp_other_tot']; ?></span> </td>
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
                       <td rowspan="2" style="background-color:#cce0d0;"><b>Check Lists<br> Verified</b></td>
                       <td rowspan="2" colspan="2"><article style="vertical-align:top;" class="vendor-color"><b>STP</b></article><br><span><?php if(isset($res['clveri_stp']))echo $res['clveri_stp']; ?></span></td> 
                       <td rowspan="2"><article style="vertical-align:top;" class="vendor-color"><b>WSP</b></article><br><span><?php if(isset($res['clveri_wsp']))echo $res['clveri_wsp']; ?></span></td>
                       <!--<td colspan="6" style="padding-top:1px;"><b>Irrigation Chambers / Surface Drain Chambers / Podium Drain Lines / Soil lines / Waste Lines / RWH Pits</b></td>-->
                        <td colspan="10" style="padding-top:1px;" class="vendor-color"><b><?php if(isset($res['clveri_wsp']))echo str_replace(",","/",$res['lists_verified']); ?></b></td>
                     </tr>
                      
                     
                      
                       <tr>    
                          <td colspan="10"> 
                      		<table width="100%" border="0">
                            	<tbody> 
                                	<tr>
                                    	<td ><b>Daily Briefing:</b> <span><?php if(isset($res['clveri_daily_brief']))echo $res['clveri_daily_brief']; ?></span></td>
                                        <td><b>Start Time:</b> <span><?php if(isset($res['clveri_start_time']))echo $res['clveri_start_time']; ?></span></td>
                                        <td><b> End Time:</b> <span><?php if(isset($res['clveri_end_time']))echo $res['clveri_end_time']; ?></span></td>
                                        <td> <b>No. of Attendees:</b> <span><?php if(isset($res['clveri_attend_num']))echo $res['clveri_attend_num']; ?></span></td>
                                    </tr>
                                </tbody>
                            </table>
                         </td>
                   
                      
                      </tr>
                      
                      
                      
                     <tr>
                        	<td style="background-color:#b8cde6;"><b>Pump Status</b></td>
                           <td colspan="4" style="padding:0px;border-top:1px solid #fff;border-left:1px solid #fff;">
                            	<table width="100%" border="1" style="border:1px solid #000;">
                                	<tr>
                                    	<td rowspan="2" style="border-bottom: 1px solid #fff;" class="vendor-color"><b>SWP:</b></td>
                                        <td>A</td>
                                         <td>M</td>
                                          <td>O</td>
                                           <td style="border-right:1px solid #fff;">NW</td>
                                    </tr>
                                    <tr style="border-bottom:1px solid #fff;">
                                    	
                                        <td><span><?php if(isset($res['storm_water_auto_pumps']))echo $res['storm_water_auto_pumps']; ?></span></td>
                                         <td><span><?php if(isset($res['storm_water_manual_pumps']))echo $res['storm_water_manual_pumps']; ?></span></td>
                                          <td><span><?php if(isset($res['storm_water_off_pumps']))echo $res['storm_water_off_pumps']; ?></span></td>
                                           <td style="border-right:1px solid #fff;"><span><?php if(isset($res['storm_water_nw_pumps']))echo $res['storm_water_nw_pumps']; ?></span></td>
                                    </tr> 
                                </table> 
                                </td>
                            <td colspan="3" style="padding:0px;border-top:1px solid #fff;border-left:1px solid #fff;">
                            	<table width="100%" border="1" style="border:1px solid #000;">
                                	<tr>
                                    	<td rowspan="2" style="border-bottom: 1px solid #fff;" class="vendor-color"><b>DP:</b></td>
                                        <td>A</td>
                                         <td>M</td>
                                          <td>O</td>
                                           <td style="border-right:1px solid #fff;">NW</td>
                                    </tr>
                                    <tr style="border-bottom:1px solid #fff;">
                                    	
                                        <td><span><?php if(isset($res['de_water_auto_pumps']))echo $res['de_water_auto_pumps']; ?></span></td>
                                         <td><span><?php if(isset($res['de_water_manual_pumps']))echo $res['de_water_manual_pumps']; ?></span></td>
                                          <td><span><?php if(isset($res['de_water_off_pumps']))echo $res['de_water_off_pumps']; ?></span></td>
                                           <td style="border-right:1px solid #fff;"><span><?php if(isset($res['de_water_nw_pumps']))echo $res['de_water_nw_pumps']; ?></span></td>
                                    </tr>
                                </table> 
                                </td>
                            <td colspan="3" style="padding:0px;border-top:1px solid #fff;border-left:1px solid #fff;">
                            	<table width="100%" border="1" style="border:1px solid #000;">
                                	<tr>
                                    	<td rowspan="2" style="border-bottom: 1px solid #fff;" class="vendor-color"><b>OP:</b></td>
                                        <td>A</td>
                                         <td>M</td>
                                          <td>O</td>
                                           <td style="border-right:1px solid #fff;">NW</td>
                                    </tr>
                                    <tr style="border-bottom:1px solid #fff;">
                                    	
                                        <td><span><?php if(isset($res['oozing_water_auto_pumps']))echo $res['oozing_water_auto_pumps']; ?></span></td>
                                         <td><span><?php if(isset($res['oozing_water_manual_pumps']))echo $res['oozing_water_manual_pumps']; ?></span></td>
                                          <td><span><?php if(isset($res['oozing_water_off_pumps']))echo $res['oozing_water_off_pumps']; ?></span></td>
                                           <td style="border-right:1px solid #fff;"><span><?php if(isset($res['oozing_water_nw_pumps']))echo $res['oozing_water_nw_pumps']; ?></span></td>
                                    </tr>
                                </table> 
                                </td>
                            <td colspan="3" style="padding:0px;border-top:1px solid #fff;border-left:1px solid #fff;">
                            	<table width="100%" border="1" style="border:1px solid #000;">
                                	<tr>
                                    	<td rowspan="2" style="border-bottom: 1px solid #fff;" class="vendor-color"><b>RWP:</b></td>
                                        <td>A</td>
                                         <td>M</td>
                                          <td>O</td>
                                           <td style="border-right:1px solid #fff;">NW</td>
                                    </tr>
                                    <tr style="border-bottom:1px solid #fff;">
                                    	
                                        <td><span><?php if(isset($res['rain_water_auto_pumps']))echo $res['rain_water_auto_pumps']; ?></span></td>
                                         <td><span><?php if(isset($res['rain_water_manual_pumps']))echo $res['rain_water_manual_pumps']; ?></span></td>
                                          <td><span><?php if(isset($res['rain_water_off_pumps']))echo $res['rain_water_off_pumps']; ?></span></td>
                                           <td style="border-right:1px solid #fff;"><span><?php if(isset($res['rain_water_nw_pumps']))echo $res['rain_water_nw_pumps']; ?></span></td>
                                    </tr>
                                </table> 
                                </td>
                        </tr>
                      
                      
                      
                     
                     
                   <tr>
                        <td colspan="11" class="text-left"><b>Assets Critically Observed:</b> </br><span><?php if(isset($res['asset_critical_observe']))echo $res['asset_critical_observe']; ?></span></td>
                        <td colspan="3" class="text-left"><b>Local Purchase: </b><span><?php if(isset($res['local_purchase']))echo $res['local_purchase']; ?></span></td>
                   </tr>
                   
                   
                   
                   <tr>
                   		<td colspan="14" class="text-left"><b>Points Discussed in HOD's Meeting:</b> <span> <?php if(isset($res['points_dis_hod_meeting']))echo $res['points_dis_hod_meeting']; ?></span></td>
                   </tr>
                   
                   
                   
                    <tr>
                   		<td colspan="14" class="text-left"><?php if(isset($res['amc_visits'])) { if($res['amc_visits'])echo "<b>AMC Visits :</b><span>".$res['amc_visits']."</span><br/>"; } if(isset($res['preventive_maintain'])) { if($res['preventive_maintain'])echo "<b>Preventive Maintenance :</b><span>".$res['preventive_maintain']."</span><br/>"; }  if(isset($res['break_down_any'])) { if($res['break_down_any'])echo "<b>Break Downs if any :</b><span>".$res['break_down_any']."</span>"; } ?></td>
                   </tr>
                   
                  


                  <tr>
                   		<td colspan="14" class="text-left"><b>Any commun<br>from / to MC: </b><span><?php if(isset($res['any_communication']))echo $res['any_communication']; ?></span></td>
                   </tr>
                   
                   <tr>
                      <td colspan="14" style="text-align:left;"><b>Additional Information:</b> <span><?php if(isset($res['reasontext']))echo $res['reasontext']; ?></span></td>
				  </tr>
                  
             </tbody>      

</table>
  <?php  date_default_timezone_set('Asia/Calcutta'); ?> 
						
                             
                     <div class="lasrrrr">
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
   <span style="color:#ff2518;font-weight:bold;">Last Modified On:</span> <b> <?php echo $dateday." ".$datetime; ?></b>
    <?php } ?>
    </div>
   
                      <div class="sign1"  style="float:right; width:auto;">
                    	<div class="report-by">
                        	<label><span style="color:#ff2518;font-weight:bold;">Report By:</span> <b><?php if(isset($res['user_id'])) { echo getlogeedname($res['user_id']); } ?></b></label>
                        </div>
                       
                    </div>
                    </div>
                        
                  </div>
                </div>
              </div>

              

              

              

              

              
            </div>
          </div>
        </div>
        <!-- /page content -->

       
      </div>
      @include('partials.footer')
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
    <script src="/build/js/jquery.CongelarFilaColumna.js"></script>
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
    

@stop