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
	 font-family:Arial, Helvetica, sans-serif;
	}
	.wquipment-statue1 tbody tr th 
	{
	padding:7px 6px;
	text-align:center;
	font-size:12px;
	vertical-align:middle;
	}
	
	.wquipment-statue1 tbody tr td 
	{
	padding:7px 6px;
	text-align:center;
	font-size:12px;
	}
	
	.wquipment-statue1 tbody tr td:nth-child(2)
	{
	 padding-left:5px;
	}
	
	table tr td.sarlef
	{
	text-align:left;
	}
	
	table tr td p, table tr th p
	{
	 white-space:nowrap;
	 word-break:normal;
	 margin:0px;
	}
	.codel-infoirmation b
	{
	 float:left;
	}
	.codel-infoirmation
	{
	 padding-top:4px;
	 font-size:12px;
	 white-space:normal !important;
	}
	.codel-infoirmation table
	{
	 width:80% !important;
	 float:left;
	  margin-top:4px;
	  font-size:12px;
	}
	.codel-infoirmation table tr td
	{
	 vertical-align:top;
	  width:80% !important;
	  border-right:0px !important;
	  font-size:12px;
	}
     .codel-infoirmation .note-information
	 {
	  width:auto;
	  float:left;
	 }
	 .codel-infoirmation .note-information p
	 {
	  margin-top:0px;
	 }
	 .codel-infoirmation 
	 {
	  margin-top:4px;
	 }
	.additionin tbody tr th
	{
	 padding:5px 2px !important;
	}
	.additionin tbody tr td
	{
	 padding:5px 2px !important;
	}
	.additionin tbody tr td:nth-child(2)
	{
	 padding:8px 2px 8px 5px !important;
	}
	  .aparna-logo
{
 background-color:#0157a4;
 position:absolute;
 right:0px;
 top:-20px;
 padding:4px;
 width:110px;
 height:auto;
}
.mmrreport-eading
{
    margin-bottom:20px;
}
.mmrreport-eading h2
{
 font-size: 18px;
    font-weight: 600;
    color: #666262;
    text-align: center;
text-transform:uppercase;
}
.footer
{
 font-weight:100;
 font-size:16px !important;
 text-align:right;
 position:absolute;
 bottom:-40px;
 right:0px;
vertical-align:bottom;
}
.soft-services
{
 font-weight:600;
 font-size:17px;
 text-decoration:underline;
}
.heading-nature
{
 position:relative;
 font-size: 17px;
vertical-align:top;
font-weight:600;
}
.main-heading
{
    margin:-8px 0px 10px 0px;
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

  <body>
   
<body>
    <div class="mmrreport-eading">
   <h2  class="main-heading">MMR REPORT FOR THE MONTH OF {{$monthname }}-{{ $report_year }}</h2>
    <img src="images/apms-logo.png" class="aparna-logo" >
</div>
<div class="heading-nature"><?php echo $tCount; ?>(a). Fire Safety</div>
<div class="manjeera">
	<?php $keysarray =array("1"=>"Jockey Pump","2"=>"Main Pump","3"=>"DG Pump","4"=>"Booster Pumps","5"=>"Dewatering Pumps","6"=>"Yard Hydrant Points","7"=>"Cellar Hydrant Points","8"=>"Sub Cellar Hydrant Points","9"=>"Fire Hose Reel Drums","10"=>"Fire Alarm System","11"=>"Public Addressing System","12"=>"Fire Extinguishers","13"=>"Carbon Emission System","14"=>"Flow Meter Paneles - Fire Sprinkler","15"=>"CP Hoses","16"=>"Fire Alarm Repeater Panels","17"=>"Sprinkler Charged (floor wise)","18"=>"Fire Mock Drill & Emergency Evacuation","19"=>"False Fire Alarms","20"=>"Wet Raisers","21"=>"Sub Cellar-3 Hydrant Points","22"=>"PA System Repeater Panel","23"=>"Group Indication Panel"); ?>

    <div class="myElementClass">
        <table width="100%" border="1" cellspacing="0" cellpadding="2" class="wquipment-statue1 <?php  if(isset($misres[$ikey]['additional_info'])){ $te = strip_tags($misres[$ikey]['additional_info']); if($te) { echo 'additionin'; } } ?>" style="text-align:center;">
            <tbody>
                <tr>
                	<th colspan="8" style="font-size:14px;padding:6px 0px;text-align:center;"> Fire Safety Equipment Status as on<span> <?php echo  $report_on ?></span></th>
                </tr>
                <tr>
                    <th rowspan="2">S.No</th>
                    <th rowspan="2">Description</th>
                    <th colspan="2" style="text-align:center;font-size:15px;vertical-align:middle;"><?php if(isset($sites[$ikey])) echo $sites[$ikey]; ?></th>
                    <th colspan="3" style="text-align:center;">Fire Pumps Status  </th>
                    <th rowspan="2">Total Downtime (Hrs/days) of all Equipment</th>
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
                    <td><span><?php if(isset($misres[$ikey]['jk_pump_nw'])) echo $misres[$ikey]['jk_pump_nw']; ?><?php if(isset($misprevious[$ikey]['jk_pump_nw'])) { if((int)$misprevious[$ikey]['jk_pump_nw'] > 0 ) echo  "(".$misprevious[$ikey]['jk_pump_nw'].")"; } ?></span> </td>
                    <td><span><?php if(isset($misres[$ikey]['jk_pump_auto']))echo $misres[$ikey]['jk_pump_auto']; ?></span></td>
                    <td><span><?php if(isset($misres[$ikey]['jk_pump_manual']))echo $misres[$ikey]['jk_pump_manual']; ?></span></td>
                    <td><span><?php if(isset($misres[$ikey]['jk_pump_off']))echo $misres[$ikey]['jk_pump_off']; ?></span></td>
                    <td><span><?php if(isset($misres[$ikey]['jk_dwn_tm'])) echo $misres[$ikey]['jk_dwn_tm']; ?></span></td>
                
                </tr>
                
                <tr>
                    <td><b>2</b></td>
                    <td class="sarlef"><b>Main Pump</b></td>
                    <td><span><?php if(isset($validation[$ikey]['mainpump'])) echo $validation[$ikey]['mainpump']; ?></span> </td>
                    <td><span><?php if(isset($misres[$ikey]['main_pump_nw'])) echo $misres[$ikey]['main_pump_nw']; ?><?php if(isset($misprevious[$ikey]['main_pump_nw'])) { if((int)$misprevious[$ikey]['main_pump_nw'] > 0 ) echo  "(".$misprevious[$ikey]['main_pump_nw'].")"; } ?></span> </td>
                    <td><span><?php if(isset($misres[$ikey]['main_pump_auto']))echo $misres[$ikey]['main_pump_auto']; ?></span></td>
                    <td><span><?php if(isset($misres[$ikey]['main_pump_manual']))echo $misres[$ikey]['main_pump_manual']; ?></span></td>
                    <td><span><?php if(isset($misres[$ikey]['main_pump_off']))echo $misres[$ikey]['main_pump_off']; ?></span></td>
                    
                    <td><span><?php  if(isset($misres[$ikey]['main_dwn_tm'])) echo $misres[$ikey]['main_dwn_tm']; ?></span></td>
                </tr>
                
                
                <tr>
                    <td><b>3</b></td>
                    <td class="sarlef"><b>DG Pump</b></td>
                    <td><span><?php if(isset($validation[$ikey]['dgpump'])) echo $validation[$ikey]['dgpump']; ?></span> </td>
                    <td><span><?php if(isset($misres[$ikey]['dg_pump_nw'])) echo $misres[$ikey]['dg_pump_nw']; ?><?php if(isset($misprevious[$ikey]['dg_pump_nw'])) { if((int)$misprevious[$ikey]['dg_pump_nw'] > 0 ) echo  "(".$misprevious[$ikey]['dg_pump_nw'].")"; } ?></span> </td>
                    <td><span><?php if(isset($misres[$ikey]['dg_pump_auto']))echo $misres[$ikey]['dg_pump_auto']; ?></span></td>
                    <td><span><?php if(isset($misres[$ikey]['dg_pump_manual']))echo $misres[$ikey]['dg_pump_manual']; ?></span></td>
                    <td><span><?php if(isset($misres[$ikey]['dg_pump_off']))echo $misres[$ikey]['dg_pump_off']; ?></span></td>
                    
                    <td><span><?php  if(isset($misres[$ikey]['dg_dwn_tm'])) echo $misres[$ikey]['dg_dwn_tm']; ?></span></td>
                </tr>
                
                <tr>
                    <td><b>4</b></td>
                    <td class="sarlef"><b>Booster Pump</b></td>
                    <td><span><?php if(isset($validation[$ikey]['boosterpumps'])) echo $validation[$ikey]['boosterpumps']; ?></span> </td>
                    <td><span><?php if(isset($misres[$ikey]['boostr_pump_nw'])) echo $misres[$ikey]['boostr_pump_nw']; ?><?php if(isset($misprevious[$ikey]['boostr_pump_nw'])) { if((int)$misprevious[$ikey]['boostr_pump_nw'] > 0 ) echo  "(".$misprevious[$ikey]['boostr_pump_nw'].")"; } ?></span> </td>
                    <td><span><?php if(isset($misres[$ikey]['boostr_pump_auto']))echo $misres[$ikey]['boostr_pump_auto']; ?></span></td>
                    <td><span><?php if(isset($misres[$ikey]['boostr_pump_manual']))echo $misres[$ikey]['boostr_pump_manual']; ?></span></td>
                    <td><span><?php if(isset($misres[$ikey]['boostr_pump_off']))echo $misres[$ikey]['boostr_pump_off']; ?></span></td>
                    
                    <td><span><?php  if(isset($misres[$ikey]['boostr_dwn_tm'])) echo $misres[$ikey]['boostr_dwn_tm']; ?></span></td>
                </tr>
                
                <tr>
                    <td><b>5</b></td>
                    <td class="sarlef"><b>Dewatering Pumps</b></td>
                    <td><span><?php if(isset($validation[$ikey]['dewaterpumps'])) echo $validation[$ikey]['dewaterpumps']; ?></span> </td>
                    <td><span><?php if(isset($misres[$ikey]['dewatr_pump_nw'])) echo $misres[$ikey]['dewatr_pump_nw']; ?><?php if(isset($misprevious[$ikey]['dewatr_pump_nw'])) { if((int)$misprevious[$ikey]['dewatr_pump_nw'] > 0 ) echo  "(".$misprevious[$ikey]['dewatr_pump_nw'].")"; } ?></span> </td>
                    <td><span><?php if(isset($misres[$ikey]['dewatr_pump_auto']))echo $misres[$ikey]['dewatr_pump_auto']; ?></span></td>
                    <td><span><?php if(isset($misres[$ikey]['dewatr_pump_manual']))echo $misres[$ikey]['dewatr_pump_manual']; ?></span></td>
                    <td><span><?php if(isset($misres[$ikey]['dewatr_pump_off']))echo $misres[$ikey]['dewatr_pump_off']; ?></span></td>
                    
                    <td><span><?php  if(isset($misres[$ikey]['dewatr_dwn_tm'])) echo $misres[$ikey]['dewatr_dwn_tm']; ?></span></td>
                </tr>
                
                <tr>
                    <td ><b>6</b></td>
                    <td class="sarlef"> <b>Yard Hydrant Points</b></td>
                    <td><span><?php  if(isset($validation[$ikey]['yardhydrantpoints'])) echo $validation[$ikey]['yardhydrantpoints']; ?></span></td>
                    <td><span><?php  if(isset($misres[$ikey]['yard_hyd_pns'])) echo $misres[$ikey]['yard_hyd_pns']; ?><?php if(isset($misprevious[$ikey]['yard_hyd_pns'])) { if((int)$misprevious[$ikey]['yard_hyd_pns'] > 0 ) echo  "(".$misprevious[$ikey]['yard_hyd_pns'].")"; } ?></span></td>
                    <td colspan="3"><span> </span></td>
                    <td><span><?php  if(isset($misres[$ikey]['yard_hyd_dwn_tm'])) echo $misres[$ikey]['yard_hyd_dwn_tm']; ?></span></td>
                </tr>
                
                <tr>
                    <td><b>7</b></td>
                    <td class="sarlef"> <b>Cellar Hydrant Points</b></td>
                    <td><span><?php  if(isset($validation[$ikey]['cellarhydrantpoints'])) echo $validation[$ikey]['cellarhydrantpoints']; ?></span></td>
                    <td><span><?php  if(isset($misres[$ikey]['cell_hyd_pns'])) echo $misres[$ikey]['cell_hyd_pns']; ?><?php if(isset($misprevious[$ikey]['cell_hyd_pns'])) { if((int)$misprevious[$ikey]['cell_hyd_pns'] > 0 ) echo  "(".$misprevious[$ikey]['cell_hyd_pns'].")"; } ?></span></td>
                    <td colspan="3"><span> </span></td>
                    <td><span><?php  if(isset($misres[$ikey]['cell_hyd_dwn_tm'])) echo $misres[$ikey]['cell_hyd_dwn_tm']; ?></span></td>
                </tr>
                
                
                <tr>
                    <td><b>8</b></td>
                    <td class="sarlef"><b> Sub Cellar Hydrant Points</b></td>
                    <td><span><?php  if(isset($validation[$ikey]['subcellarhydrapoints'])) echo $validation[$ikey]['subcellarhydrapoints']; ?></span></td>
                    <td><span><?php  if(isset($misres[$ikey]['sbcell_hyd_pns'])) echo $misres[$ikey]['sbcell_hyd_pns']; ?><?php if(isset($misprevious[$ikey]['sbcell_hyd_pns'])) { if((int)$misprevious[$ikey]['sbcell_hyd_pns'] > 0 ) echo  "(".$misprevious[$ikey]['sbcell_hyd_pns'].")"; } ?></span></td>
                    <td colspan="3"><span> </span></td>
                    <td><span><?php  if(isset($misres[$ikey]['sbcell_hyd_dwn_tm'])) echo $misres[$ikey]['sbcell_hyd_dwn_tm']; ?></span></td>
                </tr>
                
                <tr>
                    <td><b>9</b></td>
                    <td class="sarlef"><b> Fire Hose Reel Drums</b></td>
                    <td><span><?php  if(isset($validation[$ikey]['firehosereeldrums'])) echo $validation[$ikey]['firehosereeldrums']; ?></span></td>
                    <td><span><?php  if(isset($misres[$ikey]['frhsreel_drums'])) echo $misres[$ikey]['frhsreel_drums']; ?><?php if(isset($misprevious[$ikey]['frhsreel_drums'])) { if((int)$misprevious[$ikey]['frhsreel_drums'] > 0 ) echo  "(".$misprevious[$ikey]['frhsreel_drums'].")"; } ?></span></td>
                    <td colspan="3"><span> </span></td>
                    <td><span><?php  if(isset($misres[$ikey]['frhsreel_drums_dwn_tm'])) echo $misres[$ikey]['frhsreel_drums_dwn_tm']; ?></span></td>
                </tr>    
                
                <tr>
                    <td><b>10</b></td>
                    <td class="sarlef"><b>Fire Alarm System</b></td>
                    <td><span><?php  if(isset($validation[$ikey]['firealarmsystem'])) echo $validation[$ikey]['firealarmsystem']; ?></span></td>
                    <td><span><?php  if(isset($misres[$ikey]['firealarm_sysm'])) echo $misres[$ikey]['firealarm_sysm']; ?><?php if(isset($misprevious[$ikey]['firealarm_sysm'])) { if((int)$misprevious[$ikey]['firealarm_sysm'] > 0 ) echo  "(".$misprevious[$ikey]['firealarm_sysm'].")"; } ?></span></td>
                    <td colspan="3"><span> </span></td>
                    <td><span><?php  if(isset($misres[$ikey]['firealarm_sysm_dwn_tm'])) echo $misres[$ikey]['firealarm_sysm_dwn_tm']; ?></span></td>
                </tr>      
                
                <tr>
                    <td><b>11</b></td>
                    <td class="sarlef"><b>Public Addressing System</b></td>
                    <td><span><?php  if(isset($validation[$ikey]['publicaddressys'])) echo $validation[$ikey]['publicaddressys']; ?></span></td>
                    <td><span><?php  if(isset($misres[$ikey]['pa_sysm'])) echo $misres[$ikey]['pa_sysm']; ?><?php if(isset($misprevious[$ikey]['pa_sysm'])) { if((int)$misprevious[$ikey]['pa_sysm'] > 0 ) echo  "(".$misprevious[$ikey]['pa_sysm'].")"; } ?></span></td>
                    <td colspan="3"><span> </span></td>
                    <td><span><?php  if(isset($misres[$ikey]['pa_sysm_dwn_tm'])) echo $misres[$ikey]['pa_sysm_dwn_tm']; ?></span></td>
                </tr>      
                
                <tr>
                    <td><b>12</b></td>
                    <td class="sarlef"><b>Fire Extinguishers</b></td>
                    <td><span><?php  if(isset($validation[$ikey]['fireextinguishers'])) echo $validation[$ikey]['fireextinguishers']; ?></span></td>
                    <td><span><?php  if(isset($misres[$ikey]['fire_exting_sysm'])) echo $misres[$ikey]['fire_exting_sysm']; ?><?php if(isset($misprevious[$ikey]['fire_exting_sysm'])) { if((int)$misprevious[$ikey]['fire_exting_sysm'] > 0 ) echo  "(".$misprevious[$ikey]['fire_exting_sysm'].")"; } ?></span></td>
                    <td colspan="3"><span> </span></td>
                    <td><span><?php  if(isset($misres[$ikey]['fire_exting_dwn_tm'])) echo $misres[$ikey]['fire_exting_dwn_tm']; ?></span></td>
                </tr>      
                
                <tr>
                    <td><b>13</b></td>
                    <td class="sarlef"><b>Carbon Emission System</b></td>
                    <td><span><?php  if(isset($validation[$ikey]['carbonemissionsys'])) echo $validation[$ikey]['carbonemissionsys']; ?></span></td>
                    <td><span><?php  if(isset($misres[$ikey]['carbn_emiss_sysm'])) echo $misres[$ikey]['carbn_emiss_sysm']; ?><?php if(isset($misprevious[$ikey]['carbn_emiss_sysm'])) { if((int)$misprevious[$ikey]['carbn_emiss_sysm'] > 0 ) echo  "(".$misprevious[$ikey]['carbn_emiss_sysm'].")"; } ?></span></td>
                    <td colspan="3"><span> </span></td>
                    <td><span><?php  if(isset($misres[$ikey]['carbn_emiss_dwn_tm'])) echo $misres[$ikey]['carbn_emiss_dwn_tm']; ?></span></td>
                </tr>      
                
                <tr>
                    <td><b>14</b></td>
                    <td class="sarlef"><b> Flow Annunciator Panels - Fire Sprinkler</b></td>
                    <td><span><?php  if(isset($validation[$ikey]['flwmeterpanels'])) echo $validation[$ikey]['flwmeterpanels']; ?></span></td>
                    <td><span><?php  if(isset($misres[$ikey]['flow_mtr_fire_sprink'])) echo $misres[$ikey]['flow_mtr_fire_sprink']; ?><?php if(isset($misprevious[$ikey]['flow_mtr_fire_sprink'])) { if((int)$misprevious[$ikey]['flow_mtr_fire_sprink'] > 0 ) echo  "(".$misprevious[$ikey]['flow_mtr_fire_sprink'].")"; } ?></span></td>
                    <td colspan="3"><span> </span></td>
                    <td><span><?php  if(isset($misres[$ikey]['flow_mtr_fire_sprink_dtm'])) echo $misres[$ikey]['flow_mtr_fire_sprink_dtm']; ?></span></td>
                </tr>      
                
                <tr>
                    <td><b>15</b></td>
                    <td class="sarlef"><b>CP Hoses</b></td>
                    <td><span><?php  if(isset($validation[$ikey]['cphoses'])) echo $validation[$ikey]['cphoses']; ?></span></td>
                    <td><span><?php  if(isset($misres[$ikey]['cp_hoses'])) echo $misres[$ikey]['cp_hoses']; ?><?php if(isset($misprevious[$ikey]['cp_hoses'])) { if((int)$misprevious[$ikey]['cp_hoses'] > 0 ) echo  "(".$misprevious[$ikey]['cp_hoses'].")"; } ?></span></td>
                    <td colspan="3"><span> </span></td>
                    <td><span><?php  if(isset($misres[$ikey]['cp_hoses_dwn_tm'])) echo $misres[$ikey]['cp_hoses_dwn_tm']; ?></span></td>
                </tr>      
                
                <tr>
                    <td><b>16</b></td>
                    <td class="sarlef"><b>Fire Alarm Repeater Panels</b></td>
                    <td><span><?php  if(isset($validation[$ikey]['firealarmrepeatpanel'])) echo $validation[$ikey]['firealarmrepeatpanel']; ?></span></td>
                    <td><span><?php  if(isset($misres[$ikey]['fire_ala_rep_panel'])) echo $misres[$ikey]['fire_ala_rep_panel']; ?><?php if(isset($misprevious[$ikey]['fire_ala_rep_panel'])) { if((int)$misprevious[$ikey]['fire_ala_rep_panel'] > 0 ) echo  "(".$misprevious[$ikey]['fire_ala_rep_panel'].")"; } ?></span></td>
                    <td colspan="3"><span> </span></td>
                    <td><span><?php  if(isset($misres[$ikey]['fire_ala_rep_panel_dtm'])) echo $misres[$ikey]['fire_ala_rep_panel_dtm']; ?></span></td>
                </tr>      
                
                <tr>
                    <td><b>17</b></td>
                    <td class="sarlef"> <b>Sprinkler Charged (floor wise)</b></td>
                    <td><span><?php  if(isset($validation[$ikey]['sprinklercharged'])) echo $validation[$ikey]['sprinklercharged']; ?></span></td>
                    <td><span><?php  if(isset($misres[$ikey]['sprink_charged'])) echo $misres[$ikey]['sprink_charged']; ?><?php if(isset($misprevious[$ikey]['sprink_charged'])) { if((int)$misprevious[$ikey]['sprink_charged'] > 0 ) echo  "(".$misprevious[$ikey]['sprink_charged'].")"; } ?></span></td>
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
                    <td><span><?php  if(isset($misres[$ikey]['false_alaram_sys'])) echo $misres[$ikey]['false_alaram_sys']; ?><?php if(isset($misprevious[$ikey]['false_alaram_sys'])) { if((int)$misprevious[$ikey]['false_alaram_sys'] > 0 ) echo  "(".$misprevious[$ikey]['false_alaram_sys'].")"; } ?></span></td>
                    <td colspan="3"><span> </span></td>
                    <td><span><?php  if(isset($misres[$ikey]['false_alaram_dwn_tm'])) echo $misres[$ikey]['false_alaram_dwn_tm']; ?></span></td>
                </tr>      
                
                <tr>
                    <td><b>20</b></td>
                    <td class="sarlef"> <b>Wet Raisers</b></td>
                    <td><span><?php  if(isset($validation[$ikey]['wetraisers'])) echo $validation[$ikey]['wetraisers']; ?></span></td>
                    <td><span><?php  if(isset($misres[$ikey]['wet_raiser'])) echo $misres[$ikey]['wet_raiser']; ?><?php if(isset($misprevious[$ikey]['wet_raiser'])) { if((int)$misprevious[$ikey]['wet_raiser'] > 0 ) echo  "(".$misprevious[$ikey]['wet_raiser'].")"; } ?></span></td>
                    <td colspan="3"><span> </span></td>
                    <td><span><?php  if(isset($misres[$ikey]['wet_raiser_dwn_tm'])) echo $misres[$ikey]['wet_raiser_dwn_tm']; ?></span></td>
                </tr>      
                
                <tr>
                    <td><b>21</b></td>
                    <td class="sarlef"> <b>Sub Cellar-3 Hydrant Points</b></td>
                    <td><span><?php  if(isset($validation[$ikey]['pasysrepeaterpanel'])) echo $validation[$ikey]['pasysrepeaterpanel']; ?></span></td>
                    <td><span><?php  if(isset($misres[$ikey]['pa_sys_panel'])) echo $misres[$ikey]['pa_sys_panel']; ?><?php if(isset($misprevious[$ikey]['pa_sys_panel'])) { if((int)$misprevious[$ikey]['pa_sys_panel'] > 0 ) echo  "(".$misprevious[$ikey]['pa_sys_panel'].")"; } ?></span></td>
                    <td colspan="3"><span> </span></td>
                    <td><span><?php  if(isset($misres[$ikey]['pa_sys_panel_dwn_tm'])) echo $misres[$ikey]['pa_sys_panel_dwn_tm']; ?></span></td>
                </tr>    
                
                
                <tr>
                    <td><b>22</b></td> 
                    <td class="sarlef"><b>Group Indication Panel</b></td>
                    <td><span><?php  if(isset($validation[$ikey]['groundindicationpanel'])) echo $validation[$ikey]['groundindicationpanel']; ?></span></td>
                    <td><span><?php  if(isset($misres[$ikey]['gr_ind_panel'])) echo $misres[$ikey]['gr_ind_panel']; ?><?php if(isset($misprevious[$ikey]['gr_ind_panel'])) { if((int)$misprevious[$ikey]['gr_ind_panel'] > 0 ) echo  "(".$misprevious[$ikey]['gr_ind_panel'].")"; } ?></span></td>
                    <td colspan="3"><span> </span></td>
                    <td><span><?php  if(isset($misres[$ikey]['gr_ind_panel_dwn_tm'])) echo $misres[$ikey]['gr_ind_panel_dwn_tm']; ?></span></td>
                </tr>    
                
                </tbody>
            </table>
        <div class="codel-infoirmation"> <?php  if(isset($misres[$ikey]['additional_info'])){ $te = strip_tags($misres[$ikey]['additional_info']); if($te) { echo "<div class='cote-i'><b>Note:</b></div><div class='note-information'>".$misres[$ikey]['additional_info']."</div>"; } } ?></div>
    </div>  

<?php if(isset($pagenumberval)) { echo "page -".$pagenumberval; } ?>

</div>
 <p class="footer">Aparna Property Management Services Pvt.Ltd.,</p>	
</body>
</html>

