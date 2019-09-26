
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
	.manjeera table tr th 
	{
	padding:5px;
	font-size:11px;
	}
	.manjeera table tr td 
	{
	padding:5px;
	font-size:11px;
	}
	
	.manjeera
	{
	font-size:11px;
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
	.docs-main
	{
	max-width:100%;
		 margin:0px;
	}
	.tablesaw-bar
	{
	height: 30px;
    display: block;
    padding-bottom: 11px;
    margin-bottom: 10px;
	}
	.communityinpu tr td input 
	{
	width:100%;
	 font-size:12px;
 	}
	.docs-main h3
	{
	margin-bottom:25px;
	margin-top:10px;
	} 
	.tablesaw-bar
	{
	height:30px;
	}
	.manjeera span
	{
	color:#041586;
	font-weight:bold;
	}
	.x_panel.xerolimit
	{
	 border:0px;
	 padding:0px;
	}
	.x_content.meera-jasmine
	{
	 margin-top:0px;
	 padding-left:0px;
	 padding-right:0px;
	}
	.code-table
	{
	 float:left;
	}
	.code-table table tr td
	{
	 padding:2px;
	 border-right:0px !important;
	 vertical-align:top;
	 color:#041586;
	font-weight:bold;
	font-size:13px;
	}
	.codel-infoirmation b
	{
	 float:left;
	}
	.text-center
	{
	 text-align:center;
	}
	</style>
     <style type="text/css" media="screen,print">
    .previewprrrr{
      display: block;
      clear: both;
      page-break-after: always;
  }
  </style>

<div class="col-md-12 col-sm-12 col-xs-12" style="padding-left:0px;padding-right:0px;">
              <div class="x_panel tile fixed_height_400 xerolimit">
                <div class="x_title">
                   <!--<h3>Metro Water Supply details from  01.12.2017 to 31.12.2017</h3>-->
                </div>
                <div class="x_content meera-jasmine">
    
    
	<div class="manjeera">  
	<?php //echo "<pre>"; print_r($issuetemp); echo "</pre>"; ?>
    
     <?php $keysarray =array("1"=>"Jockey Pump","2"=>"Main Pump","3"=>"DG Pump","4"=>"Booster Pumps","5"=>"Dewatering Pumps","6"=>"Yard Hydrant Points","7"=>"Cellar Hydrant Points","8"=>"Sub Cellar Hydrant Points","9"=>"Fire Hose Reel Drums","10"=>"Fire Alarm System","11"=>"Public Addressing System","12"=>"Fire Extinguishers","13"=>"Carbon Emission System","14"=>"Flow Meter Paneles - Fire Sprinkler","15"=>"CP Hoses","16"=>"Fire Alaram Repeater Panels","17"=>"Sprinkler Charged (floor wise)","18"=>"Fire Mock Drill & Emergency Evacuation","19"=>"False Fire Alarms","20"=>"Wet Raisers","21"=>"Sub Cellar-3 Hydrant Points","22"=>"PA System Repeater Panel","23"=>"Group Indication Panel"); ?>
    
                        @if (count($issuecount) > 0)
                        @foreach ($issuecount as $ikey => $issuecn)
                        <?php // echo "<pre>"; print_r($issues[$ikey]); echo "</pre>"; ?>
                      
                        <div class="previewprrrr">
                           <table width="100%" border="1" cellspacing="0" style="margin-bottom:10px;">
                        <thead>
                          <tr>
                           <th colspan="8" style="font-size:15px;text-align:center;background-color:#2f4050;color:#fff;"> <span style="color:#ffd800;"><?php echo get_sitename($ikey); ?> </span> Status as on<span style="color:#ffd800;"> <?php echo  $report_on ?></span></th>
                          </tr>
                      <tr style="background-color:#e9c085;">
                        <th rowspan="2" class="text-center">S.No </th>
                        <th rowspan="2" class="text-center">Description</th>
                        <th colspan="2" style="text-align:center;font-size:15px;"><?php if(isset($sites[$ikey])) echo $sites[$ikey]; ?></th>
                        <th colspan="3" style="text-align:center;">Fire pumps Status  </th>
                         <th rowspan="2"  class="text-center">Total downtime (Hrs). of Equipment </th>
                       </tr>
                          
                        <tr style="background-color:#a99f91;">
                         <th class="text-center">Total</th>
                         <th  class="text-center">NW</th>
                         <th class="text-center">Auto</th>
                         <th class="text-center">Manual</th>
                         <th class="text-center">Off</th>
                          </tr>
                        </thead>
                        <tbody>
                             <tr>
                         <td class="text-center"><b>1</b></td>
                        <td><b>Jockey Pump</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['jockeypump'])) echo $validation[$ikey]['jockeypump']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['jk_pump_nw'])) echo $misres[$ikey]['jk_pump_nw']; ?></span> </td>
                         <td class="text-center"><span><?php if(isset($misres[$ikey]['jk_pump_auto']))echo $misres[$ikey]['jk_pump_auto']; ?></span></td>
                           <td class="text-center"><span><?php if(isset($misres[$ikey]['jk_pump_manual']))echo $misres[$ikey]['jk_pump_manual']; ?></span></td>
                             <td class="text-center"><span><?php if(isset($misres[$ikey]['jk_pump_off']))echo $misres[$ikey]['jk_pump_off']; ?></span></td>
                         <td><span><?php if(isset($misres[$ikey]['jk_dwn_tm'])) echo $misres[$ikey]['jk_dwn_tm']; ?></span></td>
                       
                             </tr>
                           
                           <tr>
                         <td class="text-center"><b>2</b></td>
                        <td><b>Main Pump</b></td>
                         <td class="text-center"><span><?php if(isset($validation[$ikey]['mainpump'])) echo $validation[$ikey]['mainpump']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['main_pump_nw'])) echo $misres[$ikey]['main_pump_nw']; ?></span> </td>
                          <td class="text-center"><span><?php if(isset($misres[$ikey]['main_pump_auto']))echo $misres[$ikey]['main_pump_auto']; ?></span></td>
                           <td class="text-center"><span><?php if(isset($misres[$ikey]['main_pump_manual']))echo $misres[$ikey]['main_pump_manual']; ?></span></td>
                             <td class="text-center"><span><?php if(isset($misres[$ikey]['main_pump_off']))echo $misres[$ikey]['main_pump_off']; ?></span></td>
                       
                         <td><span><?php  if(isset($misres[$ikey]['main_dwn_tm'])) echo $misres[$ikey]['main_dwn_tm']; ?></span></td>
                             </tr>
                          
                          
                               <tr>
                         <td class="text-center"><b>3</b></td>
                        <td><b>DG Pump</b></td>
                         <td class="text-center"><span><?php if(isset($validation[$ikey]['dgpump'])) echo $validation[$ikey]['dgpump']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['dg_pump_nw'])) echo $misres[$ikey]['dg_pump_nw']; ?></span> </td>
                         <td class="text-center"><span><?php if(isset($misres[$ikey]['dg_pump_auto']))echo $misres[$ikey]['dg_pump_auto']; ?></span></td>
                           <td class="text-center"><span><?php if(isset($misres[$ikey]['dg_pump_manual']))echo $misres[$ikey]['dg_pump_manual']; ?></span></td>
                             <td class="text-center"><span><?php if(isset($misres[$ikey]['dg_pump_off']))echo $misres[$ikey]['dg_pump_off']; ?></span></td>
                       
                         <td><span><?php  if(isset($misres[$ikey]['dg_dwn_tm'])) echo $misres[$ikey]['dg_dwn_tm']; ?></span></td>
                             </tr>
                             
                              <tr>
                         <td class="text-center"><b>4</b></td>
                        <td><b>Booster Pump</b></td>
                         <td class="text-center"><span><?php if(isset($validation[$ikey]['boosterpumps'])) echo $validation[$ikey]['boosterpumps']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['boostr_pump_nw'])) echo $misres[$ikey]['boostr_pump_nw']; ?></span> </td>
                         <td class="text-center"><span><?php if(isset($misres[$ikey]['boostr_pump_auto']))echo $misres[$ikey]['boostr_pump_auto']; ?></span></td>
                           <td class="text-center"><span><?php if(isset($misres[$ikey]['boostr_pump_manual']))echo $misres[$ikey]['boostr_pump_manual']; ?></span></td>
                             <td class="text-center"><span><?php if(isset($misres[$ikey]['boostr_pump_off']))echo $misres[$ikey]['boostr_pump_off']; ?></span></td>
                        
                         <td><span><?php  if(isset($misres[$ikey]['boostr_dwn_tm'])) echo $misres[$ikey]['boostr_dwn_tm']; ?></span></td>
                             </tr>
                          
                              <tr>
                         <td class="text-center"><b>5</b></td>
                        <td><b>Dewatering Pumps</b></td>
                         <td class="text-center"><span><?php if(isset($validation[$ikey]['dewaterpumps'])) echo $validation[$ikey]['dewaterpumps']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['dewatr_pump_nw'])) echo $misres[$ikey]['dewatr_pump_nw']; ?></span> </td>
                         <td class="text-center"><span><?php if(isset($misres[$ikey]['dewatr_pump_auto']))echo $misres[$ikey]['dewatr_pump_auto']; ?></span></td>
                           <td class="text-center"><span><?php if(isset($misres[$ikey]['dewatr_pump_manual']))echo $misres[$ikey]['dewatr_pump_manual']; ?></span></td>
                             <td class="text-center"><span><?php if(isset($misres[$ikey]['dewatr_pump_off']))echo $misres[$ikey]['dewatr_pump_off']; ?></span></td>
                        
                         <td><span><?php  if(isset($misres[$ikey]['dewatr_dwn_tm'])) echo $misres[$ikey]['dewatr_dwn_tm']; ?></span></td>
                             </tr>
                          
                           <tr>
                         <td class="text-center"><b>6</b></td>
                        <td> <b>Yard Hydrant Points</b></td>
                        <td class="text-center"><span><?php  if(isset($validation[$ikey]['yardhydrantpoints'])) echo $validation[$ikey]['yardhydrantpoints']; ?></span></td>
                       <td class="text-center"><span><?php  if(isset($misres[$ikey]['yard_hyd_pns'])) echo $misres[$ikey]['yard_hyd_pns']; ?></span></td>
                        <td colspan="3" class="text-center"><span> </span></td>
                        <td><span><?php  if(isset($misres[$ikey]['yard_hyd_dwn_tm'])) echo $misres[$ikey]['yard_hyd_dwn_tm']; ?></span></td>
                             </tr>
                             
                              <tr>
                         <td class="text-center"><b>7</b></td>
                        <td> <b>Cellar Hydrant Points</b></td>
                        <td class="text-center"><span><?php  if(isset($validation[$ikey]['cellarhydrantpoints'])) echo $validation[$ikey]['cellarhydrantpoints']; ?></span></td>
                       <td class="text-center"><span><?php  if(isset($misres[$ikey]['cell_hyd_pns'])) echo $misres[$ikey]['cell_hyd_pns']; ?></span></td>
                        <td colspan="3" class="text-center"><span> </span></td>
                        <td><span><?php  if(isset($misres[$ikey]['cell_hyd_dwn_tm'])) echo $misres[$ikey]['cell_hyd_dwn_tm']; ?></span></td>
                             </tr>
                             
                             
                              <tr>
                        <td class="text-center"><b>8</b></td>
                         <td><b> Sub Cellar Hydrant Points</b></td>
                        <td class="text-center"><span><?php  if(isset($validation[$ikey]['subcellarhydrapoints'])) echo $validation[$ikey]['subcellarhydrapoints']; ?></span></td>
                       <td class="text-center"><span><?php  if(isset($misres[$ikey]['sbcell_hyd_pns'])) echo $misres[$ikey]['sbcell_hyd_pns']; ?></span></td>
                        <td colspan="3" class="text-center"><span> </span></td>
                        <td><span><?php  if(isset($misres[$ikey]['sbcell_hyd_dwn_tm'])) echo $misres[$ikey]['sbcell_hyd_dwn_tm']; ?></span></td>
                             </tr>
                       
                       <tr>
                       <td class="text-center"><b>9</b></td>
                         <td><b> Fire Hose Reel Drums</b></td>
                        <td class="text-center"><span><?php  if(isset($validation[$ikey]['firehosereeldrums'])) echo $validation[$ikey]['firehosereeldrums']; ?></span></td>
                       <td class="text-center"><span><?php  if(isset($misres[$ikey]['frhsreel_drums'])) echo $misres[$ikey]['frhsreel_drums']; ?></span></td>
                        <td colspan="3" class="text-center"><span> </span></td>
                        <td><span><?php  if(isset($misres[$ikey]['frhsreel_drums_dwn_tm'])) echo $misres[$ikey]['frhsreel_drums_dwn_tm']; ?></span></td>
                             </tr>    
                             
                               <tr>
                        <td class="text-center"><b>10</b></td>
                         <td><b>Fire Alarm System</b></td>
                        <td class="text-center"><span><?php  if(isset($validation[$ikey]['firealarmsystem'])) echo $validation[$ikey]['firealarmsystem']; ?></span></td>
                       <td class="text-center"><span><?php  if(isset($misres[$ikey]['firealarm_sysm'])) echo $misres[$ikey]['firealarm_sysm']; ?></span></td>
                        <td colspan="3" class="text-center"><span> </span></td>
                        <td><span><?php  if(isset($misres[$ikey]['firealarm_sysm_dwn_tm'])) echo $misres[$ikey]['firealarm_sysm_dwn_tm']; ?></span></td>
                             </tr>      
                             
                              <tr>
                        <td class="text-center"><b>11</b></td>
                         <td><b>Public Addressing System</b></td>
                        <td class="text-center"><span><?php  if(isset($validation[$ikey]['publicaddressys'])) echo $validation[$ikey]['publicaddressys']; ?></span></td>
                       <td class="text-center"><span><?php  if(isset($misres[$ikey]['pa_sysm'])) echo $misres[$ikey]['pa_sysm']; ?></span></td>
                        <td colspan="3" class="text-center"><span> </span></td>
                        <td><span><?php  if(isset($misres[$ikey]['pa_sysm_dwn_tm'])) echo $misres[$ikey]['pa_sysm_dwn_tm']; ?></span></td>
                             </tr>      
                             
                             <tr>
                        <td class="text-center"><b>12</b></td>
                         <td><b>Fire Extinguishers</b></td>
                        <td class="text-center"><span><?php  if(isset($validation[$ikey]['fireextinguishers'])) echo $validation[$ikey]['fireextinguishers']; ?></span></td>
                       <td class="text-center"><span><?php  if(isset($misres[$ikey]['fire_exting_sysm'])) echo $misres[$ikey]['fire_exting_sysm']; ?></span></td>
                        <td colspan="3" class="text-center"><span> </span></td>
                        <td><span><?php  if(isset($misres[$ikey]['fire_exting_dwn_tm'])) echo $misres[$ikey]['fire_exting_dwn_tm']; ?></span></td>
                             </tr>      
                             
                               <tr>
                           <td class="text-center"><b>13</b></td>
                         <td><b>Carbon Emission System</b></td>
                        <td class="text-center"><span><?php  if(isset($validation[$ikey]['carbonemissionsys'])) echo $validation[$ikey]['carbonemissionsys']; ?></span></td>
                       <td class="text-center"><span><?php  if(isset($misres[$ikey]['carbn_emiss_sysm'])) echo $misres[$ikey]['carbn_emiss_sysm']; ?></span></td>
                        <td colspan="3" class="text-center"><span> </span></td>
                        <td><span><?php  if(isset($misres[$ikey]['carbn_emiss_dwn_tm'])) echo $misres[$ikey]['carbn_emiss_dwn_tm']; ?></span></td>
                             </tr>      
                             
                                <tr>
                            <td class="text-center"><b>14</b></td>
                         <td><b>Flow Meter Paneles - Fire Sprinkler</b></td>
                        <td class="text-center"><span><?php  if(isset($validation[$ikey]['flwmeterpanels'])) echo $validation[$ikey]['flwmeterpanels']; ?></span></td>
                       <td class="text-center"><span><?php  if(isset($misres[$ikey]['flow_mtr_fire_sprink'])) echo $misres[$ikey]['flow_mtr_fire_sprink']; ?></span></td>
                        <td colspan="3" class="text-center"><span> </span></td>
                        <td><span><?php  if(isset($misres[$ikey]['flow_mtr_fire_sprink_dtm'])) echo $misres[$ikey]['flow_mtr_fire_sprink_dtm']; ?></span></td>
                             </tr>      
                             
                              <tr>
                            <td class="text-center"><b>15</b></td>
                         <td><b>CP Hoses</b></td>
                        <td class="text-center"><span><?php  if(isset($validation[$ikey]['cphoses'])) echo $validation[$ikey]['cphoses']; ?></span></td>
                       <td class="text-center"><span><?php  if(isset($misres[$ikey]['cp_hoses'])) echo $misres[$ikey]['cp_hoses']; ?></span></td>
                        <td colspan="3" class="text-center"><span> </span></td>
                        <td><span><?php  if(isset($misres[$ikey]['cp_hoses_dwn_tm'])) echo $misres[$ikey]['cp_hoses_dwn_tm']; ?></span></td>
                             </tr>      
                             
                               <tr>
                          <td class="text-center"><b>16</b></td>
                         <td><b>Fire Alaram Repeater Panels</b></td>
                        <td class="text-center"><span><?php  if(isset($validation[$ikey]['firealarmrepeatpanel'])) echo $validation[$ikey]['firealarmrepeatpanel']; ?></span></td>
                       <td class="text-center"><span><?php  if(isset($misres[$ikey]['fire_ala_rep_panel'])) echo $misres[$ikey]['fire_ala_rep_panel']; ?></span></td>
                        <td colspan="3" class="text-center"><span> </span></td>
                        <td><span><?php  if(isset($misres[$ikey]['fire_ala_rep_panel_dtm'])) echo $misres[$ikey]['fire_ala_rep_panel_dtm']; ?></span></td>
                             </tr>      
                             
                                <tr>
                          <td class="text-center"><b>17</b></td>
                        <td> <b>Sprinkler Charged (floor wise)</b></td>
                        <td class="text-center"><span><?php  if(isset($validation[$ikey]['sprinklercharged'])) echo $validation[$ikey]['sprinklercharged']; ?></span></td>
                       <td class="text-center"><span><?php  if(isset($misres[$ikey]['sprink_charged'])) echo $misres[$ikey]['sprink_charged']; ?></span></td>
                        <td colspan="3" class="text-center"><span> </span></td>
                        <td><span><?php  if(isset($misres[$ikey]['sprink_charged_dwn_tm'])) echo $misres[$ikey]['sprink_charged_dwn_tm']; ?></span></td>
                             </tr>      
                             
                                <tr>
                           <td class="text-center"><b>18</b></td>
                         <td><b>Fire Mock Drill & Emergency Evacuation</b> </td>
                        <td class="text-center"><span><?php  if(isset($validation[$ikey]['firemockdrill'])) echo $validation[$ikey]['firemockdrill']; ?></span></td>
                       <td class="text-center"><span><?php  if(isset($misres[$ikey]['fire_mock_drill'])) echo $misres[$ikey]['fire_mock_drill']; ?></span></td>
                        <td colspan="3" class="text-center"><span> </span></td>
                        <td><span><?php  if(isset($misres[$ikey]['fire_mock_drill_dwn_tm'])) echo $misres[$ikey]['fire_mock_drill_dwn_tm']; ?></span></td>
                             </tr>      
                             
                               <tr>
                          <td class="text-center"><b>19</b></td>
                         <td><b>False Fire Alarms</b></td>
                        <td class="text-center"><span><?php  if(isset($validation[$ikey]['falsefirealaram'])) echo $validation[$ikey]['falsefirealaram']; ?></span></td>
                       <td class="text-center"><span><?php  if(isset($misres[$ikey]['false_alaram_sys'])) echo $misres[$ikey]['false_alaram_sys']; ?></span></td>
                        <td colspan="3" class="text-center"><span> </span></td>
                        <td><span><?php  if(isset($misres[$ikey]['false_alaram_dwn_tm'])) echo $misres[$ikey]['false_alaram_dwn_tm']; ?></span></td>
                             </tr>      
                             
                                 <tr>
                       <td class="text-center"><b>20</b></td>
                         <td> <b>Wet Raisers</b></td>
                        <td class="text-center"><span><?php  if(isset($validation[$ikey]['wetraisers'])) echo $validation[$ikey]['wetraisers']; ?></span></td>
                       <td class="text-center"><span><?php  if(isset($misres[$ikey]['wet_raiser'])) echo $misres[$ikey]['wet_raiser']; ?></span></td>
                        <td colspan="3" class="text-center"><span> </span></td>
                        <td><span><?php  if(isset($misres[$ikey]['wet_raiser_dwn_tm'])) echo $misres[$ikey]['wet_raiser_dwn_tm']; ?></span></td>
                             </tr>      
                             
                             <tr>
                         <td class="text-center"><b>21</b></td>
                         <td> <b>Sub Cellar-3 Hydrant Points</b></td>
                        <td class="text-center"><span><?php  if(isset($validation[$ikey]['pasysrepeaterpanel'])) echo $validation[$ikey]['pasysrepeaterpanel']; ?></span></td>
                       <td class="text-center"><span><?php  if(isset($misres[$ikey]['pa_sys_panel'])) echo $misres[$ikey]['pa_sys_panel']; ?></span></td>
                        <td colspan="3" class="text-center"><span> </span></td>
                        <td><span><?php  if(isset($misres[$ikey]['pa_sys_panel_dwn_tm'])) echo $misres[$ikey]['pa_sys_panel_dwn_tm']; ?></span></td>
                             </tr>    
                             
                              
                             <tr>
                         <td class="text-center"><b>22</b></td> 
                          <td><b>Group Indication Panel</b></td>
                        <td class="text-center"><span><?php  if(isset($validation[$ikey]['groundindicationpanel'])) echo $validation[$ikey]['groundindicationpanel']; ?></span></td>
                       <td class="text-center"><span><?php  if(isset($misres[$ikey]['gr_ind_panel'])) echo $misres[$ikey]['gr_ind_panel']; ?></span></td>
                        <td colspan="3" class="text-center"><span> </span></td>
                        <td><span><?php  if(isset($misres[$ikey]['gr_ind_panel_dwn_tm'])) echo $misres[$ikey]['gr_ind_panel_dwn_tm']; ?></span></td>
                             </tr>    
                       
                        </tbody>
                      </table>
                       <div class="codel-infoirmation"> <?php  if(isset($misres[$ikey]['additional_info'])){ $te = strip_tags($misres[$ikey]['additional_info']); if($te) { echo "<b>Note:</b>".$misres[$ikey]['additional_info']; } } ?></div> </div>
                        
                           <?php if($issuecn > 5) { ?>
						    <?php if(isset($issuetemp[$ikey])) { ?>
                            <div class="previewprrrr">
						   <table width="100%" border="1" cellspacing="0" style="margin-bottom:15px;">
                        <tbody>
                          <tr>
                           <th colspan="<?php echo (int)$issuecn + 1;?>" style="font-size:15px;text-align:center;background-color:#2f4050;color:#fff;"> <span style="color:#ffd800;"><?php echo get_sitename($ikey); ?> </span> Equipment Not working Data</th>
                          </tr>
                     
                       <tr style="background-color:#e9c085;" class="text-center">
                        <td class="text-center"><b>Category</b></td>
                        
                           <?php $cnn = 0;
						       foreach($issuetemp[$ikey]['category'] as $ky => $issuer) { 
						          
						        if($issuer == "19") { $cnn = $cnn + 1; }  ?>
                              
                           <?php }  
						   ?>
                           
                            <?php $cm = "";foreach($issuetemp[$ikey]['category'] as $ky => $issuer) { 
						          
						       if($issuer == "19") { $colspan = "colspan='".$cnn."'"; } else {$colspan = "";} if($issuer == $cm) { }  else {?>
                                 <td <?php echo $colspan ?>><b><?php echo $keysarray[$issuer];  $cm = $issuer;} ?></b></td>
                                
                              
                           <?php } ?>
						   
                       </tr>
                             <tr> 
                             <td class="text-center"><b>S.No</b></td>
                           <?php $c = "";foreach($issuetemp[$ikey]['category'] as $ky => $issuer) { 
						          
						       if($issuer == "19") { $colspan = "colspan='".$cnn."'"; } else {$colspan = "";} if($issuer == $c) { }  else {?>
                                 <td class="text-center" <?php echo $colspan ?>><span><?php echo $issuer;  $c = $issuer;} ?></span></td>
                                
                              
                           <?php } ?>
                           </tr>
                           <tr>
                            <td><b>Description Of Issue</b></td>
                              
                           <?php foreach($issuetemp[$ikey]['issue_des'] as $ky => $issuer) { ?>
                                 <td><span><?php echo $issuer; ?></span></td>
                              
                           <?php } ?>
                           </tr>
                            <tr>
                              <td><b>Root Cause</b></td>
                           <?php foreach($issuetemp[$ikey]['root_cause'] as $ky => $issuer) { ?>
                                 <td><span><?php echo $issuer; ?></span></td>
                              
                           <?php } ?>
                           </tr>
                             <tr>
                               <td><b>Action Required/ Planned</b></td>
                           <?php foreach($issuetemp[$ikey]['act_req_plan'] as $ky => $issuer) { ?>
                                 <td><span><?php echo $issuer; ?></span></td>
                              
                           <?php } ?>
                           </tr> 
                            <tr>
                            <td><b>Pending from days</b></td>
                           <?php foreach($issuetemp[$ikey]['pendingfromdays'] as $ky => $issuer) { ?>
                                 <td><span><?php echo $issuer; ?></span></td>
                              
                           <?php } ?>
                           </tr>
                           <tr>
                            <td><b>Responsibility</b></td>
                           <?php foreach($issuetemp[$ikey]['reponsibility'] as $ky => $issuer) { ?>
                                 <td><span><?php echo $issuer; ?></span></td>
                              
                           <?php } ?>
                           </tr>
                             <tr>
                             <td><b>Notified to the concerned</b></td>
                           <?php foreach($issuetemp[$ikey]['notify_concern'] as $ky => $issuer) { ?>
                                 <td><span><?php echo $issuer; ?></span></td>
                              
                           <?php } ?>
                           </tr>
                      
                        </tbody>
                      </table>
						 </div>  
						   
						 
						 <?php  }}else{  if(isset($issuetemp[$ikey])) { if(isset($issuetemp[$ikey]['category'])) { ?>
                        
						       <table width="100%" border="1" cellspacing="0" style="margin-bottom:10px;">
                        <tbody>
                          <tr>
                           <th colspan="<?php echo (int)$issuecn + 1;   ?>" style="font-size:15px;text-align:center;background-color:#2f4050;color:#fff;"> <span style="color:#ffd800;"><?php echo get_sitename($ikey); ?> </span> Equipment Not working Data</th>
                          </tr>
                     
                       <tr style="background-color:#e9c085;">
                        <td class="text-center"><b>Category</b> </td>
                           
                           <?php $cnn = 0;
						       foreach($issuetemp[$ikey]['category'] as $ky => $issuer) { 
						          
						        if($issuer == "19") { $cnn = $cnn + 1; }  ?>
                              
                           <?php }  
						   ?>
                           
                            <?php $cm = "";foreach($issuetemp[$ikey]['category'] as $ky => $issuer) { 
						          
						       if($issuer == "19") { $colspan = "colspan='".$cnn."'"; } else {$colspan = "";} if($issuer == $cm) { }  else {?>
                                 <td class="text-center" <?php echo $colspan ?>><b><?php echo $keysarray[$issuer];  $cm = $issuer;} ?></b></td>
                                
                              
                           <?php } ?>
						   
                       </tr>
                             <tr> 
                             <td><b>S.No</b></td>
                           <?php $c = "";foreach($issuetemp[$ikey]['category'] as $ky => $issuer) { 
						          
						       if($issuer == "19") { $colspan = "colspan='".$cnn."'"; } else {$colspan = "";} if($issuer == $c) { }  else {?>
                                 <td <?php echo $colspan ?>><span><?php echo $issuer;  $c = $issuer;} ?></span></td>
                                
                              
                           <?php } ?>
                           </tr>
                           <tr>
                            <td><b>Description Of Issue</b></td>
                           <?php foreach($issuetemp[$ikey]['issue_des'] as $ky => $issuer) { ?>
                                 <td><span><?php echo $issuer; ?></span></td>
                              
                           <?php } ?>
                           </tr>
                            <tr>
                              <td><b>Root Cause</b></td>
                           <?php foreach($issuetemp[$ikey]['root_cause'] as $ky => $issuer) { ?>
                                 <td><span><?php echo $issuer; ?></span></td>
                              
                           <?php } ?>
                           </tr>
                             <tr>
                               <td><b>Action Required/ Planned</b></td>
                           <?php foreach($issuetemp[$ikey]['act_req_plan'] as $ky => $issuer) { ?>
                                 <td><span><?php echo $issuer; ?></span></td>
                              
                           <?php } ?>
                           </tr> 
                            <tr>
                            <td><b>Pending from days</b></td>
                           <?php foreach($issuetemp[$ikey]['pendingfromdays'] as $ky => $issuer) { ?>
                                 <td><span><?php echo $issuer; ?></span></td>
                              
                           <?php } ?>
                           </tr>
                           <tr>
                            <td><b>Responsibility</b></td>
                           <?php foreach($issuetemp[$ikey]['reponsibility'] as $ky => $issuer) { ?>
                                 <td><span><?php echo $issuer; ?></span></td>
                              
                           <?php } ?>
                           </tr>
                             <tr>
                             <td><b>Notified to the concerned</b></td>
                           <?php foreach($issuetemp[$ikey]['notify_concern'] as $ky => $issuer) { ?>
                                 <td><span><?php echo $issuer; ?></span></td>
                              
                           <?php } ?>
                           </tr>
                             <?php }  ?>
                        </tbody>
                      </table>
						     
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
