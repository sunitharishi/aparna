<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Fire Safety</title>
 

    
    <style>
	@media print
{
.previewprrrr {page-break-after:always !important;
}
}
	body
	{
	 font-family: "Open Sans", sans-serif;
	}
	.wquipment-statue1 tbody tr th 
	{
	padding:6px;
	text-align:center;
	font-size:12px;
	vertical-align:middle;
	}
	
	.wquipment-statue1 tbody tr td 
	{
	padding:6px;
	text-align:center;
	font-size:12px;
	}
	.templates-count tbody tr th
	{
	 font-size:13px;
	 padding:10px 2px;
	 vertical-align:middle;
	}
	.templates-count tbody tr th.text-center
	{
	 text-align:center;
	}
	.templates-count tbody tr td.text-center
	{
	 text-align:center;
	}
	.templates-count tbody tr td
	{
	 font-size:13px;
	 padding:10px 2px;
	}
	.templates-count tbody tr td:nth-child(1)
	{
	 padding-left:5px;
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
	.manjeera span 
	{
	color:black;
	}
	table tr td.sarlef
	{
	text-align:left;
	}
	.x_panel.fixed_height_400
	{
	 border:0px;
	 padding:0px;
	}
	p
	{
	 white-space:nowrap;
	 word-break:normal;
	 margin:0px;
	}
	.codel-infoirmation b
	{
	 float:left;
	}
	.codel-infoirmation table
	{
	 width:80% !important;
	 float:left;
	  margin-top:4px;
	}
	.codel-infoirmation table tr td
	{
	 vertical-align:top;
	  width:80% !important;
	  border-right:0px !important;
	  font-size:12px;
	 
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
	 <style type="text/css" media="screen,print">
    .previewprrrr{
      display: block;
      clear: both;
      page-break-after: always;
  }
  </style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
       

        <!-- page content -->
        <div class="right_col" role="main">

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12" style="width:100%;padding:0px;">
              <div class="x_panel tile fixed_height_400">
                <div class="x_title">
                   <!--<h3>Metro Water Supply details from  01.12.2017 to 31.12.2017</h3>-->
                </div>
                <div class="x_content">
                	<!--<div class="land-scaping">
                    	<h4><b>Land Scaping</b></h4>
                    </div>  -->
                    
                    <div class="manjeera">
					 <?php $keysarray =array("1"=>"Jockey Pump","2"=>"Main Pump","3"=>"DG Pump","4"=>"Booster Pumps","5"=>"Dewatering Pumps","6"=>"Yard Hydrant Points","7"=>"Cellar Hydrant Points","8"=>"Sub Cellar Hydrant Points","9"=>"Fire Hose Reel Drums","10"=>"Fire Alarm System","11"=>"Public Addressing System","12"=>"Fire Extinguishers","13"=>"Carbon Emission System","14"=>"Flow Meter Paneles - Fire Sprinkler","15"=>"CP Hoses","16"=>"Fire Alaram Repeater Panels","17"=>"Sprinkler Charged (floor wise)","18"=>"Fire Mock Drill & Emergency Evacuation","19"=>"False Fire Alarms","20"=>"Wet Raisers","21"=>"Sub Cellar-3 Hydrant Points","22"=>"PA System Repeater Panel","23"=>"Group Indication Panel"); ?>
                          @if (count($issuecount) > 0) <?php $xc = 0; ?>
                        @foreach ($issuecount as $ikey => $issuecn)
						 <?php $xc = $xc + 1;; ?>
                        <?php // echo "<pre>"; print_r($issues[$ikey]); echo "</pre>"; ?>
                      
                        <div class="myElementClass previewprrrr" <?php if($xc == count($issuecount) && $issuecn == 0) {} else { ?>style="margin-bottom:10px; page-break-after: always;" <?php } ?>>
                           <table width="100%" border="1" cellspacing="0" cellpadding="2" class="wquipment-statue1" style="margin-bottom:10px;font-size:11px;text-align:center;">
                        <tbody>
                          <tr>
                           <th colspan="8" style="font-size:15px;text-align:center;"> Fire Safety Equipment Status as on<span> <?php echo  $report_on ?></span></th>
                          </tr>
                      <tr>
                        <th rowspan="2">S.No</th>
                        <th rowspan="2">Description</th>
                        <th colspan="2" style="text-align:center;font-size:15px;vertical-align:middle;"><?php if(isset($sites[$ikey])) echo $sites[$ikey]; ?></th>
                        <th colspan="3" style="text-align:center;">Fire pumps Status  </th>
                         <th rowspan="2">Total downtime (Hrs). of Equipment </th>
                       </tr>
                          
                        <tr>
                         <th >Total</th>
                         <th>Not Working</th>
                         <th>Auto</th>
                         <th>Manual</th>
                         <th>Off</th>
                          </tr>
                        
                             <tr>
                         <td><b>1</b></td>
                        <td class="sarlef"><b>Jockey Pump</b></td>
                        <td><span><?php if(isset($validation[$ikey]['jockeypump'])) echo $validation[$ikey]['jockeypump']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['jk_pump_nw'])) echo $misres[$ikey]['jk_pump_nw']; ?></span> </td>
                         <td><span><?php if(isset($misres[$ikey]['jk_pump_auto']))echo $misres[$ikey]['jk_pump_auto']; ?></span></td>
                           <td><span><?php if(isset($misres[$ikey]['jk_pump_manual']))echo $misres[$ikey]['jk_pump_manual']; ?></span></td>
                             <td><span><?php if(isset($misres[$ikey]['jk_pump_off']))echo $misres[$ikey]['jk_pump_off']; ?></span></td>
                         <td><span><?php if(isset($misres[$ikey]['jk_dwn_tm'])) echo $misres[$ikey]['jk_dwn_tm']; ?></span></td>
                       
                             </tr>
                           
                           <tr>
                         <td><b>2</b></td>
                        <td class="sarlef"><b>Main Pump</b></td>
                         <td><span><?php if(isset($validation[$ikey]['mainpump'])) echo $validation[$ikey]['mainpump']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['main_pump_nw'])) echo $misres[$ikey]['main_pump_nw']; ?></span> </td>
                          <td><span><?php if(isset($misres[$ikey]['main_pump_auto']))echo $misres[$ikey]['main_pump_auto']; ?></span></td>
                           <td><span><?php if(isset($misres[$ikey]['main_pump_manual']))echo $misres[$ikey]['main_pump_manual']; ?></span></td>
                             <td><span><?php if(isset($misres[$ikey]['main_pump_off']))echo $misres[$ikey]['main_pump_off']; ?></span></td>
                       
                         <td><span><?php  if(isset($misres[$ikey]['main_dwn_tm'])) echo $misres[$ikey]['main_dwn_tm']; ?></span></td>
                             </tr>
                          
                          
                               <tr>
                         <td><b>3</b></td>
                        <td class="sarlef"><b>DG Pump</b></td>
                         <td><span><?php if(isset($validation[$ikey]['dgpump'])) echo $validation[$ikey]['dgpump']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['dg_pump_nw'])) echo $misres[$ikey]['dg_pump_nw']; ?></span> </td>
                         <td><span><?php if(isset($misres[$ikey]['dg_pump_auto']))echo $misres[$ikey]['dg_pump_auto']; ?></span></td>
                           <td><span><?php if(isset($misres[$ikey]['dg_pump_manual']))echo $misres[$ikey]['dg_pump_manual']; ?></span></td>
                             <td><span><?php if(isset($misres[$ikey]['dg_pump_off']))echo $misres[$ikey]['dg_pump_off']; ?></span></td>
                       
                         <td><span><?php  if(isset($misres[$ikey]['dg_dwn_tm'])) echo $misres[$ikey]['dg_dwn_tm']; ?></span></td>
                             </tr>
                             
                              <tr>
                         <td><b>4</b></td>
                        <td class="sarlef"><b>Booster Pump</b></td>
                         <td><span><?php if(isset($validation[$ikey]['boosterpumps'])) echo $validation[$ikey]['boosterpumps']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['boostr_pump_nw'])) echo $misres[$ikey]['boostr_pump_nw']; ?></span> </td>
                         <td><span><?php if(isset($misres[$ikey]['boostr_pump_auto']))echo $misres[$ikey]['boostr_pump_auto']; ?></span></td>
                           <td><span><?php if(isset($misres[$ikey]['boostr_pump_manual']))echo $misres[$ikey]['boostr_pump_manual']; ?></span></td>
                             <td><span><?php if(isset($misres[$ikey]['boostr_pump_off']))echo $misres[$ikey]['boostr_pump_off']; ?></span></td>
                        
                         <td><span><?php  if(isset($misres[$ikey]['boostr_dwn_tm'])) echo $misres[$ikey]['boostr_dwn_tm']; ?></span></td>
                             </tr>
                          
                              <tr>
                         <td><b>5</b></td>
                        <td class="sarlef"><b>Dewatering Pumps</b></td>
                         <td><span><?php if(isset($validation[$ikey]['dewaterpumps'])) echo $validation[$ikey]['dewaterpumps']; ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['dewatr_pump_nw'])) echo $misres[$ikey]['dewatr_pump_nw']; ?></span> </td>
                         <td><span><?php if(isset($misres[$ikey]['dewatr_pump_auto']))echo $misres[$ikey]['dewatr_pump_auto']; ?></span></td>
                           <td><span><?php if(isset($misres[$ikey]['dewatr_pump_manual']))echo $misres[$ikey]['dewatr_pump_manual']; ?></span></td>
                             <td><span><?php if(isset($misres[$ikey]['dewatr_pump_off']))echo $misres[$ikey]['dewatr_pump_off']; ?></span></td>
                        
                         <td><span><?php  if(isset($misres[$ikey]['dewatr_dwn_tm'])) echo $misres[$ikey]['dewatr_dwn_tm']; ?></span></td>
                             </tr>
                          
                           <tr>
                         <td ><b>6</b></td>
                        <td class="sarlef"> <b>Yard Hydrant Points</b></td>
                        <td><span><?php  if(isset($validation[$ikey]['yardhydrantpoints'])) echo $validation[$ikey]['yardhydrantpoints']; ?></span></td>
                       <td><span><?php  if(isset($misres[$ikey]['yard_hyd_pns'])) echo $misres[$ikey]['yard_hyd_pns']; ?></span></td>
                        <td colspan="3"><span> </span></td>
                        <td><span><?php  if(isset($misres[$ikey]['yard_hyd_dwn_tm'])) echo $misres[$ikey]['yard_hyd_dwn_tm']; ?></span></td>
                             </tr>
                             
                              <tr>
                         <td><b>7</b></td>
                        <td class="sarlef"> <b>Cellar Hydrant Points</b></td>
                        <td><span><?php  if(isset($validation[$ikey]['cellarhydrantpoints'])) echo $validation[$ikey]['cellarhydrantpoints']; ?></span></td>
                       <td><span><?php  if(isset($misres[$ikey]['cell_hyd_pns'])) echo $misres[$ikey]['cell_hyd_pns']; ?></span></td>
                        <td colspan="3"><span> </span></td>
                        <td><span><?php  if(isset($misres[$ikey]['cell_hyd_dwn_tm'])) echo $misres[$ikey]['cell_hyd_dwn_tm']; ?></span></td>
                             </tr>
                             
                             
                              <tr>
                        <td><b>8</b></td>
                         <td class="sarlef"><b> Sub Cellar Hydrant Points</b></td>
                        <td><span><?php  if(isset($validation[$ikey]['subcellarhydrapoints'])) echo $validation[$ikey]['subcellarhydrapoints']; ?></span></td>
                       <td><span><?php  if(isset($misres[$ikey]['sbcell_hyd_pns'])) echo $misres[$ikey]['sbcell_hyd_pns']; ?></span></td>
                        <td colspan="3"><span> </span></td>
                        <td><span><?php  if(isset($misres[$ikey]['sbcell_hyd_dwn_tm'])) echo $misres[$ikey]['sbcell_hyd_dwn_tm']; ?></span></td>
                             </tr>
                       
                       <tr>
                       <td><b>9</b></td>
                         <td class="sarlef"><b> Fire Hose Reel Drums</b></td>
                        <td><span><?php  if(isset($validation[$ikey]['firehosereeldrums'])) echo $validation[$ikey]['firehosereeldrums']; ?></span></td>
                       <td><span><?php  if(isset($misres[$ikey]['frhsreel_drums'])) echo $misres[$ikey]['frhsreel_drums']; ?></span></td>
                        <td colspan="3"><span> </span></td>
                        <td><span><?php  if(isset($misres[$ikey]['frhsreel_drums_dwn_tm'])) echo $misres[$ikey]['frhsreel_drums_dwn_tm']; ?></span></td>
                             </tr>    
                             
                               <tr>
                        <td><b>10</b></td>
                         <td class="sarlef"><b>Fire Alarm System</b></td>
                        <td><span><?php  if(isset($validation[$ikey]['firealarmsystem'])) echo $validation[$ikey]['firealarmsystem']; ?></span></td>
                       <td><span><?php  if(isset($misres[$ikey]['firealarm_sysm'])) echo $misres[$ikey]['firealarm_sysm']; ?></span></td>
                        <td colspan="3"><span> </span></td>
                        <td><span><?php  if(isset($misres[$ikey]['firealarm_sysm_dwn_tm'])) echo $misres[$ikey]['firealarm_sysm_dwn_tm']; ?></span></td>
                             </tr>      
                             
                              <tr>
                        <td><b>11</b></td>
                         <td class="sarlef"><b>Public Addressing System</b></td>
                        <td><span><?php  if(isset($validation[$ikey]['publicaddressys'])) echo $validation[$ikey]['publicaddressys']; ?></span></td>
                       <td><span><?php  if(isset($misres[$ikey]['pa_sysm'])) echo $misres[$ikey]['pa_sysm']; ?></span></td>
                        <td colspan="3"><span> </span></td>
                        <td><span><?php  if(isset($misres[$ikey]['pa_sysm_dwn_tm'])) echo $misres[$ikey]['pa_sysm_dwn_tm']; ?></span></td>
                             </tr>      
                             
                             <tr>
                        <td><b>12</b></td>
                         <td class="sarlef"><b>Fire Extinguishers</b></td>
                        <td><span><?php  if(isset($validation[$ikey]['fireextinguishers'])) echo $validation[$ikey]['fireextinguishers']; ?></span></td>
                       <td><span><?php  if(isset($misres[$ikey]['fire_exting_sysm'])) echo $misres[$ikey]['fire_exting_sysm']; ?></span></td>
                        <td colspan="3"><span> </span></td>
                        <td><span><?php  if(isset($misres[$ikey]['fire_exting_dwn_tm'])) echo $misres[$ikey]['fire_exting_dwn_tm']; ?></span></td>
                             </tr>      
                             
                               <tr>
                           <td><b>13</b></td>
                         <td class="sarlef"><b>Carbon Emission System</b></td>
                        <td><span><?php  if(isset($validation[$ikey]['carbonemissionsys'])) echo $validation[$ikey]['carbonemissionsys']; ?></span></td>
                       <td><span><?php  if(isset($misres[$ikey]['carbn_emiss_sysm'])) echo $misres[$ikey]['carbn_emiss_sysm']; ?></span></td>
                        <td colspan="3"><span> </span></td>
                        <td><span><?php  if(isset($misres[$ikey]['carbn_emiss_dwn_tm'])) echo $misres[$ikey]['carbn_emiss_dwn_tm']; ?></span></td>
                             </tr>      
                             
                                <tr>
                            <td><b>14</b></td>
                         <td class="sarlef"><b>Flow Meter Panels - Fire Sprinkler</b></td>
                        <td><span><?php  if(isset($validation[$ikey]['flwmeterpanels'])) echo $validation[$ikey]['flwmeterpanels']; ?></span></td>
                       <td><span><?php  if(isset($misres[$ikey]['flow_mtr_fire_sprink'])) echo $misres[$ikey]['flow_mtr_fire_sprink']; ?></span></td>
                        <td colspan="3"><span> </span></td>
                        <td><span><?php  if(isset($misres[$ikey]['flow_mtr_fire_sprink_dtm'])) echo $misres[$ikey]['flow_mtr_fire_sprink_dtm']; ?></span></td>
                             </tr>      
                             
                              <tr>
                            <td><b>15</b></td>
                         <td class="sarlef"><b>CP Hoses</b></td>
                        <td><span><?php  if(isset($validation[$ikey]['cphoses'])) echo $validation[$ikey]['cphoses']; ?></span></td>
                       <td><span><?php  if(isset($misres[$ikey]['cp_hoses'])) echo $misres[$ikey]['cp_hoses']; ?></span></td>
                        <td colspan="3"><span> </span></td>
                        <td><span><?php  if(isset($misres[$ikey]['cp_hoses_dwn_tm'])) echo $misres[$ikey]['cp_hoses_dwn_tm']; ?></span></td>
                             </tr>      
                             
                               <tr>
                          <td><b>16</b></td>
                         <td class="sarlef"><b>Fire Alarm Repeater Panels</b></td>
                        <td><span><?php  if(isset($validation[$ikey]['firealarmrepeatpanel'])) echo $validation[$ikey]['firealarmrepeatpanel']; ?></span></td>
                       <td><span><?php  if(isset($misres[$ikey]['fire_ala_rep_panel'])) echo $misres[$ikey]['fire_ala_rep_panel']; ?></span></td>
                        <td colspan="3"><span> </span></td>
                        <td><span><?php  if(isset($misres[$ikey]['fire_ala_rep_panel_dtm'])) echo $misres[$ikey]['fire_ala_rep_panel_dtm']; ?></span></td>
                             </tr>      
                             
                                <tr>
                          <td><b>17</b></td>
                        <td class="sarlef"> <b>Sprinkler Charged (floor wise)</b></td>
                        <td><span><?php  if(isset($validation[$ikey]['sprinklercharged'])) echo $validation[$ikey]['sprinklercharged']; ?></span></td>
                       <td><span><?php  if(isset($misres[$ikey]['sprink_charged'])) echo $misres[$ikey]['sprink_charged']; ?></span></td>
                        <td colspan="3"><span> </span></td>
                        <td><span><?php  if(isset($misres[$ikey]['sprink_charged_dwn_tm'])) echo $misres[$ikey]['sprink_charged_dwn_tm']; ?></span></td>
                             </tr>      
                             
                                 <tr>
                           <td class="text-center"><b>18</b></td>
                         <td class="sarlef"><b>Fire Mock Drill & Emergency Evacuation</b> </td>  
                         <td class="text-center"><b>Prev:</b><br> <p><span><?php  if(isset($misres[$ikey]['fire_mock_drill'])) echo $misres[$ikey]['fire_mock_drill']; ?> </span></p></td>
                         <td class="text-center"><b>Next:</b><br> <span><?php  if(isset($misres[$ikey]['fire_mock_drill_next'])) echo $misres[$ikey]['fire_mock_drill_next']; ?> </span></td>
                        <?php /*?><td class="text-center"><span><?php  if(isset($validation[$ikey]['firemockdrill'])) echo $validation[$ikey]['firemockdrill']; ?></span></td>
                       <td class="text-center"><span><?php  if(isset($misres[$ikey]['fire_mock_drill'])) echo $misres[$ikey]['fire_mock_drill']; ?></span></td><?php */?>
                        <td colspan="3" class="text-center"><span> </span></td>
                        <td><span><?php  if(isset($misres[$ikey]['fire_mock_drill_dwn_tm'])) echo $misres[$ikey]['fire_mock_drill_dwn_tm']; ?></span></td>
                             </tr>      
                             
                               <tr>
                          <td><b>19</b></td>
                         <td class="sarlef"><b>No. of False Alarms</b></td>
                        <td><span><?php  if(isset($validation[$ikey]['falsefirealaram'])) echo $validation[$ikey]['falsefirealaram']; ?></span></td>
                       <td><span><?php  if(isset($misres[$ikey]['false_alaram_sys'])) echo $misres[$ikey]['false_alaram_sys']; ?></span></td>
                        <td colspan="3"><span> </span></td>
                        <td><span><?php  if(isset($misres[$ikey]['false_alaram_dwn_tm'])) echo $misres[$ikey]['false_alaram_dwn_tm']; ?></span></td>
                             </tr>      
                             
                                 <tr>
                       <td><b>20</b></td>
                         <td class="sarlef"> <b>Wet Raisers</b></td>
                        <td><span><?php  if(isset($validation[$ikey]['wetraisers'])) echo $validation[$ikey]['wetraisers']; ?></span></td>
                       <td><span><?php  if(isset($misres[$ikey]['wet_raiser'])) echo $misres[$ikey]['wet_raiser']; ?></span></td>
                        <td colspan="3"><span> </span></td>
                        <td><span><?php  if(isset($misres[$ikey]['wet_raiser_dwn_tm'])) echo $misres[$ikey]['wet_raiser_dwn_tm']; ?></span></td>
                             </tr>      
                             
                             <tr>
                         <td><b>21</b></td>
                         <td class="sarlef"> <b>Sub Cellar-3 Hydrant Points</b></td>
                        <td><span><?php  if(isset($validation[$ikey]['pasysrepeaterpanel'])) echo $validation[$ikey]['pasysrepeaterpanel']; ?></span></td>
                       <td><span><?php  if(isset($misres[$ikey]['pa_sys_panel'])) echo $misres[$ikey]['pa_sys_panel']; ?></span></td>
                        <td colspan="3"><span> </span></td>
                        <td><span><?php  if(isset($misres[$ikey]['pa_sys_panel_dwn_tm'])) echo $misres[$ikey]['pa_sys_panel_dwn_tm']; ?></span></td>
                             </tr>    
                             
                              
                             <tr>
                         <td><b>22</b></td> 
                          <td class="sarlef"><b>Group Indication Panel</b></td>
                        <td><span><?php  if(isset($validation[$ikey]['groundindicationpanel'])) echo $validation[$ikey]['groundindicationpanel']; ?></span></td>
                       <td><span><?php  if(isset($misres[$ikey]['gr_ind_panel'])) echo $misres[$ikey]['gr_ind_panel']; ?></span></td>
                        <td colspan="3"><span> </span></td>
                        <td><span><?php  if(isset($misres[$ikey]['gr_ind_panel_dwn_tm'])) echo $misres[$ikey]['gr_ind_panel_dwn_tm']; ?></span></td>
                             </tr>    
                       
                        </tbody>
                      </table>
					    <div class="codel-infoirmation"> <?php  if(isset($misres[$ikey]['additional_info'])){ $te = strip_tags($misres[$ikey]['additional_info']); if($te) { echo "<b>Note:</b>".$misres[$ikey]['additional_info']; } } ?></div>
                        </div>  
                       		
                       <?php if($issuecn > 5) { ?>
						    <?php if(isset($issuetemp[$ikey])) { ?>
                             <div class="myElementClass previewprrrr" <?php  if($xc == count($issuecount)) {} else { ?>style="margin-bottom:10px; page-break-after: always;" <?php } ?>>
						   <table width="100%" border="1" cellspacing="0" class="templates-count" style="margin-bottom:15px;">
                        <tbody>
                          <tr>
                           <th colspan="<?php echo (int)$issuecn + 1;?>" style="font-size:15px;text-align:center;padding:5px;"> <span><?php echo get_sitename($ikey); ?> </span> Equipment Not working Data</th>
                          </tr>
                     
                       <tr>
                        <th style="text-align:left;padding-left:5px;"><b>Category</b></th>
                        
                           <?php $cnn = 0;
						       foreach($issuetemp[$ikey]['category'] as $ky => $issuer) { 
						          
						        if($issuer == "19") { $cnn = $cnn + 1; }  ?>
                              
                           <?php }  
						   ?>
                           
                            <?php $cm = "";foreach($issuetemp[$ikey]['category'] as $ky => $issuer) { 
						          
						       if($issuer == "19") { $colspan = "colspan='".$cnn."'"; } else {$colspan = "";} if($issuer == $cm) { }  else {?>
                                 <th <?php echo $colspan ?> class="text-center"><b><?php echo $keysarray[$issuer];  $cm = $issuer;} ?></b></th>
                                
                              
                           <?php } ?>
						   
                       </tr>
                             <tr> 
                             <td class="sarlef"><b>S.No</b></td>
                           <?php $c = "";foreach($issuetemp[$ikey]['category'] as $ky => $issuer) { 
						          
						       if($issuer == "19") { $colspan = "colspan='".$cnn."'"; } else {$colspan = "";} if($issuer == $c) { }  else {?>
                                 <td class="text-center" <?php echo $colspan ?>><span><?php echo $issuer;  $c = $issuer;} ?></span></td>
                                
                              
                           <?php } ?>
                           </tr>
                           <tr>
                            <td class="sarlef"><b>Description of Issue</b></td>
                              
                           <?php foreach($issuetemp[$ikey]['issue_des'] as $ky => $issuer) { ?>
                                 <td class="text-center"><span><?php echo $issuer; ?></span></td>
                              
                           <?php } ?>
                           </tr>
                            <tr>
                              <td class="sarlef"><b>Root Cause</b></td>
                           <?php foreach($issuetemp[$ikey]['root_cause'] as $ky => $issuer) { ?>
                                 <td class="text-center"><span><?php echo $issuer; ?></span></td>
                              
                           <?php } ?>
                           </tr>
                             <tr>
                               <td class="sarlef"><b>Action Required/ Planned</b></td>
                           <?php foreach($issuetemp[$ikey]['act_req_plan'] as $ky => $issuer) { ?>
                                 <td class="text-center"><span><?php echo $issuer; ?></span></td>
                              
                           <?php } ?>
                           </tr> 
                            <tr>
                            <td class="sarlef"><b>Pending from days</b></td>
                           <?php foreach($issuetemp[$ikey]['pendingfromdays'] as $ky => $issuer) { ?>
                                 <td class="text-center"><span><?php echo $issuer; ?></span></td>
                              
                           <?php } ?>
                           </tr>
                           <tr>
                            <td class="sarlef"><b>Responsibility</b></td>
                           <?php foreach($issuetemp[$ikey]['reponsibility'] as $ky => $issuer) { ?>
                                 <td class="text-center"><span><?php echo $issuer; ?></span></td>
                              
                           <?php } ?>
                           </tr>
                           <tr>
                             <td class="sarlef"><b>Notified to the concerned</b></td>
                           <?php foreach($issuetemp[$ikey]['notify_concern'] as $ky => $issuer) { ?>
                                 <td class="text-center"><span><?php echo $issuer; ?></span></td>
                              
                           <?php } ?>
                           </tr>
                           
                           <tr>
                             <td class="sarlef"><b>Estimated Date of Completion</b></td>
                           <?php foreach($issuetemp[$ikey]['estimation_time'] as $ky => $issuer) { ?>
                                 <td class="text-center"><span><?php echo $issuer; ?></span></td>
                              
                           <?php } ?>
                           </tr>
                      
                        </tbody>
                      </table>
					
						 </div>  
						   
						 
						 <?php  }}else{  if(isset($issuetemp[$ikey])) { if(isset($issuetemp[$ikey]['category'])) { ?>
                          <div class="myElementClass previewprrrr" <?php if($xc == count($issuecount)) {} else { ?>style="margin-bottom:10px; page-break-after: always;" <?php } ?>>
						       <table width="100%" border="1" cellspacing="0" class="templates-count" style="margin-bottom:10px;">
                        <tbody>
                          <tr>
                           <th colspan="<?php echo (int)$issuecn + 1;   ?>" style="font-size:15px;text-align:center;padding:5px;"> <span><?php echo get_sitename($ikey); ?> </span> Equipment Not working Data</th>
                          </tr>
                     
                       <tr>
                        <th style="text-align:left;padding-left:5px;"><b>Category</b> </th>
                           
                           <?php $cnn = 0;
						       foreach($issuetemp[$ikey]['category'] as $ky => $issuer) { 
						          
						        if($issuer == "19") { $cnn = $cnn + 1; }  ?>
                              
                           <?php }  
						   ?>
                           
                            <?php $cm = "";foreach($issuetemp[$ikey]['category'] as $ky => $issuer) { 
						          
						       if($issuer == "19") { $colspan = "colspan='".$cnn."'"; } else {$colspan = "";} if($issuer == $cm) { }  else {?>
                                 <th class="text-center" <?php echo $colspan ?>><b><?php echo $keysarray[$issuer];  $cm = $issuer;} ?></b></th>
                                
                              
                           <?php } ?>
						   
                       </tr>
                             <tr> 
                             <td class="sarlef"><b>S.No</b></td>
                           <?php $c = "";foreach($issuetemp[$ikey]['category'] as $ky => $issuer) { 
						          
						       if($issuer == "19") { $colspan = "colspan='".$cnn."'"; } else {$colspan = "";} if($issuer == $c) { }  else {?>
                                 <td class="text-center" <?php echo $colspan ?>><span><?php echo $issuer;  $c = $issuer;} ?></span></td>
                                
                              
                           <?php } ?>
                           </tr>
                           <tr>
                            <td class="sarlef"><b>Description of Issue</b></td>
                           <?php foreach($issuetemp[$ikey]['issue_des'] as $ky => $issuer) { ?>
                                 <td class="text-center"><span><?php echo $issuer; ?></span></td>
                              
                           <?php } ?>
                           </tr>
                            <tr>
                              <td class="sarlef"><b>Root Cause</b></td>
                           <?php foreach($issuetemp[$ikey]['root_cause'] as $ky => $issuer) { ?>
                                 <td class="text-center"><span><?php echo $issuer; ?></span></td>
                              
                           <?php } ?>
                           </tr>
                             <tr>
                               <td class="sarlef"><b>Action Required/ Planned</b></td>
                           <?php foreach($issuetemp[$ikey]['act_req_plan'] as $ky => $issuer) { ?>
                                 <td class="text-center"><span><?php echo $issuer; ?></span></td>
                              
                           <?php } ?>
                           </tr> 
                            <tr>
                            <td class="sarlef"><b>Pending from days</b></td>
                           <?php foreach($issuetemp[$ikey]['pendingfromdays'] as $ky => $issuer) { ?>
                                 <td class="text-center"><span><?php echo $issuer; ?></span></td>
                              
                           <?php } ?>
                           </tr>
                           <tr>
                            <td class="sarlef"><b>Responsibility</b></td>
                           <?php foreach($issuetemp[$ikey]['reponsibility'] as $ky => $issuer) { ?>
                                 <td class="text-center"><span><?php echo $issuer; ?></span></td>
                              
                           <?php } ?>
                           </tr>
                             <tr>
                             <td class="sarlef"><b>Notified to the concerned</b></td>
                           <?php foreach($issuetemp[$ikey]['notify_concern'] as $ky => $issuer) { ?>
                                 <td class="text-center"><span><?php echo $issuer; ?></span></td>
                              
                           <?php } ?>
                           </tr>
                            <tr>
                             <td class="sarlef"><b>Estimated Date of Completion</b></td>
                           <?php foreach($issuetemp[$ikey]['estimation_time'] as $ky => $issuer) { ?>
                                 <td class="text-center"><span><?php echo $issuer; ?></span></td>
                              
                           <?php } ?>
                           </tr>
                             <?php }  ?>
                        </tbody>
                      </table>
						   </div>  
						 <?php  }} 
                          
                            ?> 
                         @endforeach
                    @else
                        
						<div>No entries in table</div>
                        
                    @endif
                        
                     
                      
                    </div>
                    
                </div>
              </div>
            </div>            
          </div>
          


          
        </div>
        <!-- /page content -->

        <!-- footer content -->
       
        <!-- /footer content -->
      </div>
    </div>


  </body>
</html>

 <script src="/vendors1/jquery/dist/jquery.min.js"></script>
 
	<script type="text/javascript">
$( document ).ready(function() {
//var thestyl = "always";
//$('.myElementClass').css('pageBreakBefore',thestyl); 
    window.print(); 
	close();
	window.location.href = "/misreports"; 
	
}); 
   
</script>