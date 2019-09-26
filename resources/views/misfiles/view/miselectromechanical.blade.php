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
	.manjeera table tbody tr th 
	{
	padding:5px;
	font-size:11px;
	}
	.manjeera table tbody tr td 
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
	.communityinpu tr td.text-center
	{
	text-align:center;
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
	.x_panel.clinicplus
	{
	 border:0px;
	 padding:0px;
	}
	.x_content.housesco212
	{
	  margin-top:0px;
	 padding-left:0px;
	 padding-right:0px;
	}
	.codel-infoirmation b
	{
	 float:left;
	 margin-right:4px;
	}
	.codel-infoirmation p
	{
	 font-weight:bold;
	 color:#041586;
	 float:left;
	 text-transform:capitalize;
	}
	.codel-infoirmation span
	{
	 text-transform:capitalize;
	 }
	
	</style>
@extends('layouts.app')


@section('content')
  <?php $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 
									$year = $uriSegments[3]; 
									$month = $uriSegments[4]; 
									?>
              
<div class="misback-button"><a href="/misreportsoptions/<?php echo $year."/".$month ?>">Back</a></div>
<div class="col-md-12 col-sm-12 col-xs-12" style="padding-left:0px;padding-right:0px;">
              <div class="x_panel tile fixed_height_400 clinicplus">
                <div class="x_title">
                   <!--<h3>Metro Water Supply details from  01.12.2017 to 31.12.2017</h3>-->
                </div>
                <div class="x_content mis-electromechanical-view-page"> 
    
		<div class="manjeera">
        
          <?php $keysarray =array("1"=>"3 Panel","2"=>"4 Panel","3"=>"CTPT","4"=>"5 Panel","5"=>"Transformers","6"=>"Main Pcc Panel","7"=>"APFCR","8"=>"Common Supply Panel","9"=>"Bus Duct","10"=>"Distrbution Board","11"=>"VCB","12"=>"ACB","13"=>"Landscape Lighting Panel","14"=>"Club House Panel","15"=>"Lighting Arrestor","16"=>"Total No. Of Lights","17"=>"Lifts","18"=>"ARD Batteries","19"=>"DG Sets","20"=>"Partial Backup","21"=>"Bore Wells","22"=>"HMWS&SB Meter","23"=>"Water Distribution System","24"=>"FWS","25"=>"PRVs","26"=>"Sewerage System","27"=>"Irrigation Pumps","28"=>"Irrigation Pump Panels","29"=>"Irrigation Sprinkler Automation System","30"=>"Water Body Pumps","31"=>"Fountain","32"=>"Storm Water Pump","33"=>"Oozing Pumps","34"=>"Excess Rain Water Pump","35"=>"Rain Water Harvesting Pits","36"=>"Indoor Pool Pumps","37"=>"Outdoor Pool Pumps","38"=>"Baby Pool","39"=>"Boom Barrier","40"=>"Solar Fencing","41"=>"CCTV","42"=>"Gas Bank & Chambers"); ?>
         
          @if (count($issuecount) > 0)
                        @foreach ($issuecount as $ikey => $issuecn)
                    <div class="equipmentstatus-viewtable" style="margin-bottom:10px;">
                      <table width="100%" border="1" cellspacing="0" >
                        <tbody>
                          <tr>
                           <th colspan="9" style="font-size:15px;text-align:center;background-color:#2f4050;color:#fff;"> <span style="color:#ffd800;"><?php echo get_sitename($ikey); ?> </span> Equipment Status as on <span style="color:#ffd800;"><?php echo  $report_on ?></span></th>
                          </tr>
                      <tr style="background-color:#e9c085;">
                        <th rowspan="2" class="text-center">Category </th>
                        <th rowspan="2" class="text-center">S.No </th>
                        <th rowspan="2" class="text-center">Description</th>
                        <th colspan="2" style="text-align:center;font-size:15px;"> <?php echo get_sitename($ikey); ?> </th>
                        <th colspan="3" class="text-center">Pumps Status</th>
                        <th rowspan="2" style="width:450px;" class="text-center">Total downtime (Hrs/days) of all Equipment </th>
                       </tr>
                          
                        <tr style="background-color:#e9c085;">
                         <th class="text-center">Total</th>
                         <th class="text-center">NW</th>
                         <th>Auto</th>
                         <th>Manual</th>
                         <th>Off</th>
                         </tr>
                        
                             <tr>
                         <th rowspan="4" style="background-color:#b8cde6;">Electrical Distribution System (HT)</th>
                        <td class="text-center"><b>1</b></td>
                        <td><b>3 Panel</b> </td>
                       <td class="text-center"><span><?php if(isset($validation[$ikey]['mis3panel'])) echo $validation[$ikey]['mis3panel']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['3panel_nw'])) echo $misres[$ikey]['3panel_nw']; ?><?php if(isset($misprevious[$ikey]['3panel_nw'])) { if((int)$misprevious[$ikey]['3panel_nw'] > 0 ) echo  "(".$misprevious[$ikey]['3panel_nw'].")"; } ?></span> </td>
                         <td colspan="3" class="text-center"><span></span></td>
                        <td ><span><?php if(isset($misres[$ikey]['3panel_dtm'])) echo $misres[$ikey]['3panel_dtm']; ?></span> </td>
                       
                             </tr>
                          
                            <tr>
                        <td class="text-center"><b>2</b></td>
                        <td><b>4 Panel</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['mis4panel'])) echo $validation[$ikey]['mis4panel']; ?></span> </td>
                       <td class="text-center"><span><?php if(isset($misres[$ikey]['4panel_nw'])) echo $misres[$ikey]['4panel_nw']; ?><?php if(isset($misprevious[$ikey]['4panel_nw'])) { if((int)$misprevious[$ikey]['4panel_nw'] > 0 ) echo  "(".$misprevious[$ikey]['4panel_nw'].")"; } ?></span> </td>
                       <td colspan="3" class="text-center"><span></span></td>
                        <td ><span><?php if(isset($misres[$ikey]['4panel_dtm'])) echo $misres[$ikey]['4panel_dtm']; ?></span> </td>
                       
                             </tr>
                             
                           <tr>
                        <td class="text-center"><b>3</b></td>
                        <td><b>CTPT</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['misctpt'])) echo $validation[$ikey]['misctpt']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['ctpt_nw'])) echo $misres[$ikey]['ctpt_nw']; ?><?php if(isset($misprevious[$ikey]['ctpt_nw'])) { if((int)$misprevious[$ikey]['ctpt_nw'] > 0 ) echo  "(".$misprevious[$ikey]['ctpt_nw'].")"; } ?></span> </td>
                         <td colspan="3" class="text-center"><span></span></td>
                        <td ><span><?php if(isset($misres[$ikey]['ctpt_dtm'])) echo $misres[$ikey]['ctpt_dtm']; ?></span> </td>
                      
                             </tr>
                            <tr>
                        <td class="text-center"><b>4</b></td>
                        <td><b>5 Panel</b> </td>
                         <td class="text-center"><span><?php if(isset($validation[$ikey]['mis5panel'])) echo $validation[$ikey]['mis5panel']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['5panel_nw'])) echo $misres[$ikey]['5panel_nw']; ?><?php if(isset($misprevious[$ikey]['5panel_nw'])) { if((int)$misprevious[$ikey]['5panel_nw'] > 0 ) echo  "(".$misprevious[$ikey]['5panel_nw'].")"; } ?></span> </td>
                        <td colspan="3" class="text-center"><span></span></td>
                        <td ><span><?php if(isset($misres[$ikey]['5panel_dtm'])) echo $misres[$ikey]['5panel_dtm']; ?></span> </td>
                        
                             </tr>
                          
                             <tr>
                             <th rowspan="12" style="background-color:#cce0d0;">Electrical Distribution System(LT)</th>
                           <td class="text-center"><b>5</b></td>
                        <td><b>Transformers</b> </td>
                         <td class="text-center"><span><?php if(isset($validation[$ikey]['mistransformers'])) echo $validation[$ikey]['mistransformers']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['transformer_nw'])) echo $misres[$ikey]['transformer_nw']; ?><?php if(isset($misprevious[$ikey]['transformer_nw'])) { if((int)$misprevious[$ikey]['transformer_nw'] > 0 ) echo  "(".$misprevious[$ikey]['transformer_nw'].")"; } ?></span> </td>
                        <td colspan="3" class="text-center"><span></span></td>
                        <td ><span><?php if(isset($misres[$ikey]['transformer_dtm'])) echo $misres[$ikey]['transformer_dtm']; ?></span> </td>
                       
                          </tr>
                          
                              <tr>
                              <td class="text-center"><b>6</b></td>
                        <td><b>Main Pcc Panel</b></td>
                         <td class="text-center"><span><?php if(isset($validation[$ikey]['mismainpccpanel'])) echo $validation[$ikey]['mismainpccpanel']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['mainpcc_nw'])) echo $misres[$ikey]['mainpcc_nw']; ?><?php if(isset($misprevious[$ikey]['mainpcc_nw'])) { if((int)$misprevious[$ikey]['mainpcc_nw'] > 0 ) echo  "(".$misprevious[$ikey]['mainpcc_nw'].")"; } ?></span> </td>
                        <td colspan="3" class="text-center"><span></span></td>
                        <td ><span><?php if(isset($misres[$ikey]['mainpcc_dtm'])) echo $misres[$ikey]['mainpcc_dtm']; ?></span> </td>
                       
                          </tr>
                          
                          
                         
                             <tr>
                             <td class="text-center"><b>7</b></td>
                         <td><b>APFCR</b></td>
                         <td class="text-center"><span><?php if(isset($validation[$ikey]['misapfcr'])) echo $validation[$ikey]['misapfcr']; ?></span> </td>
                         <td class="text-center"><span><?php if(isset($misres[$ikey]['apfcr_nw'])) echo $misres[$ikey]['apfcr_nw']; ?><?php if(isset($misprevious[$ikey]['apfcr_nw'])) { if((int)$misprevious[$ikey]['apfcr_nw'] > 0 ) echo  "(".$misprevious[$ikey]['apfcr_nw'].")"; } ?></span> </td>
                         <td colspan="3" class="text-center"><span></span></td>
                        <td ><span><?php if(isset($misres[$ikey]['apfcr_dtm'])) echo $misres[$ikey]['apfcr_dtm']; ?></span> </td>
                        
                          </tr>
                          
                           <tr>
                         <td class="text-center"><b>8</b></td>
                        <td><b>Common Supply Panel</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['miscommsuppanel'])) echo $validation[$ikey]['miscommsuppanel']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['common_supply_nw'])) echo $misres[$ikey]['common_supply_nw']; ?><?php if(isset($misprevious[$ikey]['common_supply_nw'])) { if((int)$misprevious[$ikey]['common_supply_nw'] > 0 ) echo  "(".$misprevious[$ikey]['common_supply_nw'].")"; } ?></span> </td>
                          <td colspan="3" class="text-center"><span></span></td>
                        <td ><span><?php if(isset($misres[$ikey]['common_supply_dtm'])) echo $misres[$ikey]['common_supply_dtm']; ?></span> </td>
                    
                          </tr>
                          
                           <tr>
                         <td class="text-center"><b>9</b></td>
                        <td><b>Bus Duct</b></td>
                       <td class="text-center"><span><?php if(isset($validation[$ikey]['misbusduct'])) echo $validation[$ikey]['misbusduct']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['bus_duct_nw'])) echo $misres[$ikey]['bus_duct_nw']; ?><?php if(isset($misprevious[$ikey]['bus_duct_nw'])) { if((int)$misprevious[$ikey]['bus_duct_nw'] > 0 ) echo  "(".$misprevious[$ikey]['bus_duct_nw'].")"; } ?></span> </td>
                        <td colspan="3" class="text-center"><span></span></td>
                        <td ><span><?php if(isset($misres[$ikey]['bus_duct_dtm'])) echo $misres[$ikey]['bus_duct_dtm']; ?></span> </td>
                        
                          </tr>
                          
                           <tr>
                         <td class="text-center"><b>10</b></td>
                        <td><b>Distribution Board</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['misdistriboard'])) echo $validation[$ikey]['misdistriboard']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['distribu_board_nw'])) echo $misres[$ikey]['distribu_board_nw']; ?><?php if(isset($misprevious[$ikey]['distribu_board_nw'])) { if((int)$misprevious[$ikey]['distribu_board_nw'] > 0 ) echo  "(".$misprevious[$ikey]['distribu_board_nw'].")"; } ?></span> </td>
                        <td colspan="3" class="text-center"><span></span></td>
                        <td ><span><?php if(isset($misres[$ikey]['distribu_board_dtm'])) echo $misres[$ikey]['distribu_board_dtm']; ?></span> </td>
                        
                          </tr>

                           
                           <tr>
                         <td class="text-center"><b>11</b></td>
                        <td><b>VCB</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['misvcb'])) echo $validation[$ikey]['misvcb']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['vcb_nw'])) echo $misres[$ikey]['vcb_nw']; ?><?php if(isset($misprevious[$ikey]['vcb_nw'])) { if((int)$misprevious[$ikey]['vcb_nw'] > 0 ) echo  "(".$misprevious[$ikey]['vcb_nw'].")"; } ?></span> </td>
                         <td colspan="3" class="text-center"><span></span></td>
                        <td ><span><?php if(isset($misres[$ikey]['vcb_dtm'])) echo $misres[$ikey]['vcb_dtm']; ?></span> </td>
                       
                       
                          </tr>
                          
                           
                           <tr>
                         <td class="text-center"><b>12</b></td>
                        <td><b>ACB</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['misacb'])) echo $validation[$ikey]['misacb']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['acb_nw'])) echo $misres[$ikey]['acb_nw']; ?><?php if(isset($misprevious[$ikey]['acb_nw'])) { if((int)$misprevious[$ikey]['acb_nw'] > 0 ) echo  "(".$misprevious[$ikey]['acb_nw'].")"; } ?></span> </td>
                         <td colspan="3" class="text-center"><span></span></td>
                        <td ><span><?php if(isset($misres[$ikey]['acb_dtm'])) echo $misres[$ikey]['acb_dtm']; ?></span> </td>
                       
                       
                          </tr>
                          
                           <tr>
                         <td class="text-center"><b>13</b></td>
                        <td><b>Landscape Lighting Panel</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['mislandpanel'])) echo $validation[$ikey]['mislandpanel']; ?></span> </td>
                         <td class="text-center"><span><?php if(isset($misres[$ikey]['landscape_lpanel_nw'])) echo $misres[$ikey]['landscape_lpanel_nw']; ?><?php if(isset($misprevious[$ikey]['landscape_lpanel_nw'])) { if((int)$misprevious[$ikey]['landscape_lpanel_nw'] > 0 ) echo  "(".$misprevious[$ikey]['landscape_lpanel_nw'].")"; } ?></span> </td>
                         <td colspan="3" class="text-center"><span></span></td>
                        <td ><span><?php if(isset($misres[$ikey]['landscape_lpanel_dtm'])) echo $misres[$ikey]['landscape_lpanel_dtm']; ?></span> </td>
                       
                          </tr>
                           <tr>
                         <td class="text-center"><b>14</b></td>
                        <td><b>Club House Panel</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['ch_panel'])) echo $validation[$ikey]['ch_panel']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['club_house_panel_nw'])) echo $misres[$ikey]['club_house_panel_nw']; ?><?php if(isset($misprevious[$ikey]['club_house_panel_nw'])) { if((int)$misprevious[$ikey]['club_house_panel_nw'] > 0 ) echo  "(".$misprevious[$ikey]['club_house_panel_nw'].")"; } ?></span> </td>
                        <td colspan="3" class="text-center"><span></span></td>
                        <td ><span><?php if(isset($misres[$ikey]['club_house_panel_dtm'])) echo $misres[$ikey]['club_house_panel_dtm']; ?></span> </td>
                       
                          </tr>
                           <tr>
                         <td class="text-center"><b>15</b></td>
                        <td><b>Lighting Arrestor</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['mislightarestr'])) echo $validation[$ikey]['mislightarestr']; ?></span> </td>
                         <td class="text-center"><span><?php if(isset($misres[$ikey]['lighting_arrestor_nw'])) echo $misres[$ikey]['lighting_arrestor_nw']; ?><?php if(isset($misprevious[$ikey]['lighting_arrestor_nw'])) { if((int)$misprevious[$ikey]['lighting_arrestor_nw'] > 0 ) echo  "(".$misprevious[$ikey]['lighting_arrestor_nw'].")"; } ?></span> </td>
                          <td colspan="3" class="text-center"><span></span></td>
                        <td ><span><?php if(isset($misres[$ikey]['lighting_arrestor_dtm'])) echo $misres[$ikey]['lighting_arrestor_dtm']; ?></span> </td>
                      
                          </tr>
                           <tr>
                         <td class="text-center"><b>16</b></td>
                        <td><b>Total No. Of Lights</b></td>
                       <td class="text-center"><span><?php if(isset($validation[$ikey]['mistotlightsnum'])) echo $validation[$ikey]['mistotlightsnum']; ?></span> </td>
                       <td class="text-center"><span><?php if(isset($misres[$ikey]['tot_no_lights_nw'])) echo $misres[$ikey]['tot_no_lights_nw']; ?><?php if(isset($misprevious[$ikey]['tot_no_lights_nw'])) { if((int)$misprevious[$ikey]['tot_no_lights_nw'] > 0 ) echo  "(".$misprevious[$ikey]['tot_no_lights_nw'].")"; } ?></span> </td>
                       <td colspan="3" class="text-center"><span></span></td>
                        <td ><span><?php if(isset($misres[$ikey]['tot_no_lights_dtm'])) echo $misres[$ikey]['tot_no_lights_dtm']; ?></span> </td>
                        
                          </tr>
                          <tr>
                          <th rowspan="4" style="background-color:#b8cde6;">Elevators & Backup Power</th>
                         <td class="text-center"><b>17</b></td>
                        <td><b>Lifts</b></td>
                       <td class="text-center"><span><?php if(isset($validation[$ikey]['lifsnum'])) echo $validation[$ikey]['lifsnum']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['lifts_nw'])) echo $misres[$ikey]['lifts_nw']; ?><?php if(isset($misprevious[$ikey]['lifts_nw'])) { if((int)$misprevious[$ikey]['lifts_nw'] > 0 ) echo  "(".$misprevious[$ikey]['lifts_nw'].")"; } ?></span> </td>
                         <td colspan="3" class="text-center"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['lifts_dtm'])) echo $misres[$ikey]['lifts_dtm']; ?></span> </td>
                      
                          </tr>
                           <tr>
                          <td class="text-center"><b>18</b></td>
                        <td><b>ARD Batteries</b></td>
                       <td class="text-center"><span><?php if(isset($validation[$ikey]['misfullbkp'])) echo $validation[$ikey]['misfullbkp']; ?></span> </td>
                       <td class="text-center"><span><?php if(isset($misres[$ikey]['misfull_nw'])) echo $misres[$ikey]['misfull_nw']; ?><?php if(isset($misprevious[$ikey]['misfull_nw'])) { if((int)$misprevious[$ikey]['misfull_nw'] > 0 ) echo  "(".$misprevious[$ikey]['misfull_nw'].")"; } ?></span> </td>
                       <td colspan="3" class="text-center"><span></span></td>
                        <td ><span><?php if(isset($misres[$ikey]['full_bkp_dtm'])) echo $misres[$ikey]['full_bkp_dtm']; ?></span> </td>
                       
                          </tr>
                          <tr>
                          <td class="text-center"><b>19</b></td>
                        <td><b>DG Sets</b></td>
                       <td class="text-center"><span><?php if(isset($validation[$ikey]['dgsetsnum'])) echo $validation[$ikey]['dgsetsnum']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['dg_sets_nw'])) echo $misres[$ikey]['dg_sets_nw']; ?><?php if(isset($misprevious[$ikey]['dg_sets_nw'])) { if((int)$misprevious[$ikey]['dg_sets_nw'] > 0 ) echo  "(".$misprevious[$ikey]['dg_sets_nw'].")"; } ?></span> </td>
                         <td colspan="3" class="text-center"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['dg_sets_dtm'])) echo $misres[$ikey]['dg_sets_dtm']; ?></span> </td>
                      
                          </tr>
                         
                          <tr>
                          <td class="text-center"><b>20</b></td>
                        <td><b>Partial / Full Backup</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['mispartialbkp'])) echo $validation[$ikey]['mispartialbkp']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['partia_nw'])) echo $misres[$ikey]['partia_nw']; ?><?php if(isset($misprevious[$ikey]['partia_nw'])) { if((int)$misprevious[$ikey]['partia_nw'] > 0 ) echo  "(".$misprevious[$ikey]['partia_nw'].")"; } ?></span></td>
                        <td colspan="3" class="text-center"><span></span></td>
                        <td ><span><?php if(isset($misres[$ikey]['partial_bkp_dtm'])) echo $misres[$ikey]['partial_bkp_dtm']; ?></span> </td>
                      
                          </tr>
                          <tr>
                          <th style="background-color:#cce0d0;">Ground Water Source</th>
                          <td class="text-center"><b>21</b></td>
                        <td><b>Borewells</b></td>
                       <td class="text-center"><span><?php if(isset($validation[$ikey]['borewellsnum'])) echo $validation[$ikey]['borewellsnum']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['bore_wells_nw'])) echo $misres[$ikey]['bore_wells_nw']; ?><?php if(isset($misprevious[$ikey]['bore_wells_nw'])) { if((int)$misprevious[$ikey]['bore_wells_nw'] > 0 ) echo  "(".$misprevious[$ikey]['bore_wells_nw'].")"; } ?></span> </td>
                         <td colspan="3" class="text-center"><span></span></td>
                        <td ><span><?php if(isset($misres[$ikey]['bore_wells_dtm'])) echo $misres[$ikey]['bore_wells_dtm']; ?></span> </td>
                       
                          </tr>
                           <tr>
                          <th style="background-color:#b8cde6;">Metro Water Supply</th>
                          <td class="text-center"><b>22</b></td>
                        <td><b>HMWS & SB Meter</b></td>
                       <td class="text-center"><span><?php if(isset($validation[$ikey]['mishmws'])) echo $validation[$ikey]['mishmws']; ?></span> </td>
                         <td class="text-center"><span><?php if(isset($misres[$ikey]['hmws_nw'])) echo $misres[$ikey]['hmws_nw']; ?><?php if(isset($misprevious[$ikey]['hmws_nw'])) { if((int)$misprevious[$ikey]['hmws_nw'] > 0 ) echo  "(".$misprevious[$ikey]['hmws_nw'].")"; } ?></span> </td>
                          <td colspan="3" class="text-center"><span></span></td>
                        <td ><span><?php if(isset($misres[$ikey]['hmws_dtm'])) echo $misres[$ikey]['hmws_dtm']; ?></span> </td>
                      
                          </tr>
                          <tr>
                          <th rowspan="4" style="background-color:#cce0d0;">Water Distribution System</th>
                          <td class="text-center"><b>23</b></td>
                        <td><b>DWS</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['misdws'])) echo $validation[$ikey]['misdws']; ?></span> </td>
                         <td class="text-center"><span><?php if(isset($misres[$ikey]['dws_nw'])) echo $misres[$ikey]['dws_nw']; ?><?php if(isset($misprevious[$ikey]['dws_nw'])) { if((int)$misprevious[$ikey]['dws_nw'] > 0 ) echo  "(".$misprevious[$ikey]['dws_nw'].")"; } ?></span></td>
                         <td colspan="3" class="text-center"><span></span></td>
                        <td ><span><?php if(isset($misres[$ikey]['water_ds_dtm'])) echo $misres[$ikey]['water_ds_dtm']; ?></span> </td>
                        
                          </tr>
                          <tr>
                          <td class="text-center"><b>24</b></td>
                        <td><b>FWS</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['misfws'])) echo $validation[$ikey]['misfws']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['fws_nw'])) echo $misres[$ikey]['fws_nw']; ?><?php if(isset($misprevious[$ikey]['fws_nw'])) { if((int)$misprevious[$ikey]['fws_nw'] > 0 ) echo  "(".$misprevious[$ikey]['fws_nw'].")"; } ?></span></td>
                        <td colspan="3" class="text-center"><span></span></td>
                        <td ><span><?php if(isset($misres[$ikey]['fws_dtm'])) echo $misres[$ikey]['fws_dtm']; ?></span> </td>
                       
                          </tr>
                           <tr>
                          <td class="text-center"><b>25</b></td>
                        <td><b>PRV's</b></td>
                       <td class="text-center"><span><?php if(isset($validation[$ikey]['misprv'])) echo $validation[$ikey]['misprv']; ?></span> </td>
                         <td class="text-center"><span><?php if(isset($misres[$ikey]['prvs_nw'])) echo $misres[$ikey]['prvs_nw']; ?><?php if(isset($misprevious[$ikey]['prvs_nw'])) { if((int)$misprevious[$ikey]['prvs_nw'] > 0 ) echo  "(".$misprevious[$ikey]['prvs_nw'].")"; } ?></span> </td>
                         <td colspan="3" class="text-center"><span></span></td>
                        <td ><span><?php if(isset($misres[$ikey]['prvs_dtm'])) echo $misres[$ikey]['prvs_dtm']; ?></span> </td>
                        
                          </tr>
                           <tr>
                          <td class="text-center"><b>26</b></td>
                        <td><b>Sewerage System</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['missewaragesys'])) echo $validation[$ikey]['missewaragesys']; ?></span> </td>
                         <td class="text-center"><span><?php if(isset($misres[$ikey]['sewerage_nw'])) echo $misres[$ikey]['sewerage_nw']; ?><?php if(isset($misprevious[$ikey]['sewerage_nw'])) { if((int)$misprevious[$ikey]['sewerage_nw'] > 0 ) echo  "(".$misprevious[$ikey]['sewerage_nw'].")"; } ?></span></td>
                         <td colspan="3" class="text-center"><span></span></td>
                        <td ><span><?php if(isset($misres[$ikey]['sewerage_dtm'])) echo $misres[$ikey]['sewerage_dtm']; ?></span> </td>
                       
                          </tr>
                           <tr>
                           <th rowspan="3" style="background-color:#b8cde6;">Landscape Water Distribution</th>
                          <td class="text-center"><b>27</b></td>
                        <td><b>Irrigation Pumps</b></td>
                       <td class="text-center"><span><?php if(isset($validation[$ikey]['misirrigationpumps'])) echo $validation[$ikey]['misirrigationpumps']; ?></span> </td>
                       <td class="text-center"><span><?php if(isset($misres[$ikey]['irrigatn_pmp_nw'])) echo $misres[$ikey]['irrigatn_pmp_nw']; ?><?php if(isset($misprevious[$ikey]['irrigatn_pmp_nw'])) { if((int)$misprevious[$ikey]['irrigatn_pmp_nw'] > 0 ) echo  "(".$misprevious[$ikey]['irrigatn_pmp_nw'].")"; } ?></span> </td>
                        <td colspan="3" class="text-center"><span></span></td>
                        <td ><span><?php if(isset($misres[$ikey]['irrigatn_pmp_dtm'])) echo $misres[$ikey]['irrigatn_pmp_dtm']; ?></span> </td>
                       
                          </tr>
                          <tr>
                          <td class="text-center"><b>28</b></td>
                        <td><b>Irrigation Pump Panels</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['misirrigationpmppan'])) echo $validation[$ikey]['misirrigationpmppan']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['irrigatn_pmp_panel_nw'])) echo $misres[$ikey]['irrigatn_pmp_panel_nw']; ?><?php if(isset($misprevious[$ikey]['irrigatn_pmp_panel_nw'])) { if((int)$misprevious[$ikey]['irrigatn_pmp_panel_nw'] > 0 ) echo  "(".$misprevious[$ikey]['irrigatn_pmp_panel_nw'].")"; } ?></span> </td>
                         <td colspan="3" class="text-center"><span></span></td>
                        <td ><span><?php if(isset($misres[$ikey]['irrigatn_pmp_panel_dtm'])) echo $misres[$ikey]['irrigatn_pmp_panel_dtm']; ?></span> </td>
                       
                          </tr>
                          <tr>
                          <td class="text-center"><b>29</b></td>
                        <td><b>Irrigation Sprinkler Automation System</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['misirrgsprinkautosys'])) echo $validation[$ikey]['misirrgsprinkautosys']; ?></span> </td>
                         <td class="text-center"><span><?php if(isset($misres[$ikey]['irrigatn_spr_as_nw'])) echo $misres[$ikey]['irrigatn_spr_as_nw']; ?><?php if(isset($misprevious[$ikey]['irrigatn_spr_as_nw'])) { if((int)$misprevious[$ikey]['irrigatn_spr_as_nw'] > 0 ) echo  "(".$misprevious[$ikey]['irrigatn_spr_as_nw'].")"; } ?></span> </td>
                          <td colspan="3" class="text-center"><span></span></td>
                        <td ><span><?php if(isset($misres[$ikey]['irrigatn_spr_as_dtm'])) echo $misres[$ikey]['irrigatn_spr_as_dtm']; ?></span> </td>
                     
                          </tr>
                          <tr>
                          <th rowspan="2" style="background-color:#cce0d0;">Water Features </th>
                          <td class="text-center"><b>30</b></td>
                        <td><b>Water Body Pumps</b></td>
                       <td class="text-center"><span><?php if(isset($validation[$ikey]['miswatrbodypumps'])) echo $validation[$ikey]['miswatrbodypumps']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['water_body_pumps_nw'])) echo $misres[$ikey]['water_body_pumps_nw']; ?><?php if(isset($misprevious[$ikey]['water_body_pumps_nw'])) { if((int)$misprevious[$ikey]['water_body_pumps_nw'] > 0 ) echo  "(".$misprevious[$ikey]['water_body_pumps_nw'].")"; } ?></span> </td>
                         <td colspan="3" class="text-center"><span></span></td>
                        <td ><span><?php if(isset($misres[$ikey]['water_body_pumps_dtm'])) echo $misres[$ikey]['water_body_pumps_dtm']; ?></span> </td>
                       
                          </tr>
                           <tr>
                          <td class="text-center"><b>31</b></td>
                        <td><b>Fountain</b></td>
                       <td class="text-center"><span><?php if(isset($validation[$ikey]['mismistfoun'])) echo $validation[$ikey]['mismistfoun']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['mist_fountain_nw'])) echo $misres[$ikey]['mist_fountain_nw']; ?><?php if(isset($misprevious[$ikey]['mist_fountain_nw'])) { if((int)$misprevious[$ikey]['mist_fountain_nw'] > 0 ) echo  "(".$misprevious[$ikey]['mist_fountain_nw'].")"; } ?></span> </td>
                        <td colspan="3" class="text-center"><span></span></td>
                        <td ><span><?php if(isset($misres[$ikey]['mist_fountain_dtm'])) echo $misres[$ikey]['mist_fountain_dtm']; ?></span> </td>
                       
                          </tr>
                           <tr>
                           <th rowspan="2" style="background-color:#b8cde6;">De-watering System</th>
                          <td class="text-center"><b>32</b></td>
                        <td><b>Storm Water Pump</b></td>
                       <td class="text-center"><span><?php if(isset($validation[$ikey]['misstromwaterpump'])) echo $validation[$ikey]['misstromwaterpump']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['strm_Water_nw'])) echo $misres[$ikey]['strm_Water_nw']; ?><?php if(isset($misprevious[$ikey]['strm_Water_nw'])) { if((int)$misprevious[$ikey]['strm_Water_nw'] > 0 ) echo  "(".$misprevious[$ikey]['strm_Water_nw'].")"; } ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['strm_Water_auto'])) echo $misres[$ikey]['strm_Water_auto']; ?></span></td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['strm_Water_man'])) echo $misres[$ikey]['strm_Water_man']; ?></span></td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['strm_Water_off'])) echo $misres[$ikey]['strm_Water_off']; ?></span></td>
                          <?php /*?><td colspan="3"><span><?php if(isset($misres[$ikey]['strm_Water_auto'])) echo $misres[$ikey]['strm_Water_auto']."-A<br>". $misres[$ikey]['strm_Water_man']."-M<br>".$misres[$ikey]['strm_Water_off']."-Off"; ?></span></td><?php */?>
                        <td><span><?php if(isset($misres[$ikey]['strm_Water_dtm'])) echo $misres[$ikey]['strm_Water_dtm']; ?></span> </td>
                       
                          </tr>
                          <tr>
                          <td class="text-center"><b>33</b></td>
                        <td><b>Oozing Pumps</b></td>
                       <td class="text-center"><span><?php if(isset($validation[$ikey]['misoozingpump'])) echo $validation[$ikey]['misoozingpump']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['oozing_pump_nw'])) echo $misres[$ikey]['oozing_pump_nw']; ?><?php if(isset($misprevious[$ikey]['oozing_pump_nw'])) { if((int)$misprevious[$ikey]['oozing_pump_nw'] > 0 ) echo  "(".$misprevious[$ikey]['oozing_pump_nw'].")"; } ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['oozing_pump_auto'])) echo $misres[$ikey]['oozing_pump_auto']; ?></span></td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['oozing_pump_man'])) echo $misres[$ikey]['oozing_pump_man']; ?></span></td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['oozing_pump_off'])) echo $misres[$ikey]['oozing_pump_off']; ?></span></td>
                       <?php /*?>  <td colspan="3"><span><?php if(isset($misres[$ikey]['oozing_pump_auto'])) echo $misres[$ikey]['oozing_pump_auto']."-A<br>". $misres[$ikey]['oozing_pump_man']."-M<br>".$misres[$ikey]['oozing_pump_off']."-Off"; ?></span></td><?php */?>
                        <td><span><?php if(isset($misres[$ikey]['oozing_pump_dtm'])) echo $misres[$ikey]['oozing_pump_dtm']; ?></span> </td>
                      
                          </tr>
                          <tr>
                          <th rowspan="2" style="background-color:#cce0d0;">Rain Water System</th>
                          <td class="text-center"><b>34</b></td>
                        <td><b>Excess Rain Water Pump</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['misexsrainwatpmp'])) echo $validation[$ikey]['misexsrainwatpmp']; ?></span> </td>
                         <td class="text-center"><span><?php if(isset($misres[$ikey]['excess_rain_wt_nw'])) echo $misres[$ikey]['excess_rain_wt_nw']; ?><?php if(isset($misprevious[$ikey]['excess_rain_wt_nw'])) { if((int)$misprevious[$ikey]['excess_rain_wt_nw'] > 0 ) echo  "(".$misprevious[$ikey]['excess_rain_wt_nw'].")"; } ?></span> </td> 	
                          <td class="text-center"><span><?php if(isset($misres[$ikey]['excess_rain_wt_auto'])) echo $misres[$ikey]['excess_rain_wt_auto']; ?></span></td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['excess_rain_wt_man'])) echo $misres[$ikey]['excess_rain_wt_man']; ?></span></td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['excess_rain_wt_off'])) echo $misres[$ikey]['excess_rain_wt_off']; ?></span></td>
                        <td colspan="3"><span><?php if(isset($misres[$ikey]['excess_rain_wt_dtm'])) echo $misres[$ikey]['excess_rain_wt_dtm']; ?></span> </td>
                       <!--<td><span></span></td>-->
                          </tr>
                           <tr>
                          <td class="text-center"><b>35</b></td>
                        <td><b>Rain Water Harvesting Pits</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['misrainharvest'])) echo $validation[$ikey]['misrainharvest']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['rain_water_har_nw'])) echo $misres[$ikey]['rain_water_har_nw']; ?><?php if(isset($misprevious[$ikey]['rain_water_har_nw'])) { if((int)$misprevious[$ikey]['rain_water_har_nw'] > 0 ) echo  "(".$misprevious[$ikey]['rain_water_har_nw'].")"; } ?></span> </td>
                        <td colspan="3" class="text-center"><span></span></td>
                        <td ><span><?php if(isset($misres[$ikey]['rain_water_har_dtm'])) echo $misres[$ikey]['rain_water_har_dtm']; ?></span> </td>
                       
                          </tr> 
                          <tr>
                          <th rowspan="3" style="background-color:#b8cde6;">Swimming Pool</th>
                          <td class="text-center"><b>36</b></td>
                        <td><b>Indoor Pool Pumps</b></td>
                       <td class="text-center"><span><?php if(isset($validation[$ikey]['misindoorpool'])) echo $validation[$ikey]['misindoorpool']; ?></span> </td>
                       <td class="text-center"><span><?php if(isset($misres[$ikey]['mis_indoorpool_nw'])) echo $misres[$ikey]['mis_indoorpool_nw']; ?></span></td>
                        <td colspan="3" class="text-center"><span></span></td>
                         <td ><span><?php if(isset($misres[$ikey]['indoor_dtm'])) echo $misres[$ikey]['indoor_dtm']; ?></span> </td>
                      
                       
                          </tr>
                          <tr>
                          <td class="text-center"><b>37</b></td>
                        <td><b>Outdoor Pool Pumps</b></td>
                       <td class="text-center"><span><?php if(isset($validation[$ikey]['misoutdoorpool'])) echo $validation[$ikey]['misoutdoorpool']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['mis_outdoorpool_nw'])) echo $misres[$ikey]['mis_outdoorpool_nw']; ?></span></td>
                         <td colspan="3" class="text-center"><span></span></td>
                        <td ><span><?php if(isset($misres[$ikey]['outdoor_dtm'])) echo $misres[$ikey]['outdoor_dtm']; ?></span> </td>
                     
                          </tr>
                          <tr>
                          <td class="text-center"><b>38</b></td>
                        <td><b>Baby Pool</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['misbabypool'])) echo $validation[$ikey]['misbabypool']; ?></span> </td>
                       <td class="text-center"><?php if(isset($misres[$ikey]['mis_babypool_nw'])) echo $misres[$ikey]['mis_babypool_nw']; ?><?php if(isset($misprevious[$ikey]['mis_babypool_nw'])) { if((int)$misprevious[$ikey]['mis_babypool_nw'] > 0 ) echo  "(".$misprevious[$ikey]['mis_babypool_nw'].")"; } ?></span></td>
                        <td colspan="3" class="text-center"><span></span></td>
                        <td ><span><?php if(isset($misres[$ikey]['baby_dtm'])) echo $misres[$ikey]['baby_dtm']; ?></span> </td>
                      
                          </tr>
                          
                           <tr>
                           <th rowspan="3" style="background-color:#cce0d0;">Security</th>
                          <td class="text-center"><b>39</b></td>
                        <td><b>Boom Barrier</b></td>  
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['misboombarrier'])) echo $validation[$ikey]['misboombarrier']; ?></span> </td>
                         <td class="text-center"><span><?php if(isset($misres[$ikey]['boom_bar_nw'])) echo $misres[$ikey]['boom_bar_nw']; ?><?php if(isset($misprevious[$ikey]['boom_bar_nw'])) { if((int)$misprevious[$ikey]['boom_bar_nw'] > 0 ) echo  "(".$misprevious[$ikey]['boom_bar_nw'].")"; } ?></span> </td>
                         <td colspan="3" class="text-center"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['boom_bar_dtm'])) echo $misres[$ikey]['boom_bar_dtm']; ?></span> </td>
                       
                          </tr>
                          
                           <tr>
                          <td class="text-center"><b>40</b></td>
                        <td><b>Solar Fencing(Zones)</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['missolarfencingzone'])) echo $validation[$ikey]['missolarfencingzone']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['solar_fen_nw'])) echo $misres[$ikey]['solar_fen_nw']; ?><?php if(isset($misprevious[$ikey]['solar_fen_nw'])) { if((int)$misprevious[$ikey]['solar_fen_nw'] > 0 ) echo  "(".$misprevious[$ikey]['solar_fen_nw'].")"; } ?></span> </td>
                         <td colspan="3" class="text-center"><span></span></td>
                        <td ><span><?php if(isset($misres[$ikey]['solar_fen_dtm'])) echo $misres[$ikey]['solar_fen_dtm']; ?></span> </td>
                       
                          </tr>
                           <tr>
                          <td class="text-center"><b>41</b></td>
                        <td><b>CCTV</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['miscctv'])) echo $validation[$ikey]['miscctv']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['cctv_nw'])) echo $misres[$ikey]['cctv_nw']; ?><?php if(isset($misprevious[$ikey]['cctv_nw'])) { if((int)$misprevious[$ikey]['cctv_nw'] > 0 ) echo  "(".$misprevious[$ikey]['cctv_nw'].")"; } ?></span> </td>
                         <td colspan="3" class="text-center"><span></span></td>
                        <td ><span><?php if(isset($misres[$ikey]['cctv_dtm'])) echo $misres[$ikey]['cctv_dtm']; ?></span> </td>
                       
                          </tr>
                           <tr>
                           <th style="background-color:#b8cde6;">Reticulated Piped Gas</th>
                          <td class="text-center"><b>42</td>
                        <td><b>Gas Bank & Chambers</td>
                      <td class="text-center"><span><?php if(isset($validation[$ikey]['misgasbankcham'])) echo $validation[$ikey]['misgasbankcham']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['gas_bank_chambr_nw'])) echo $misres[$ikey]['gas_bank_chambr_nw']; ?><?php if(isset($misprevious[$ikey]['gas_bank_chambr_nw'])) { if((int)$misprevious[$ikey]['gas_bank_chambr_nw'] > 0 ) echo  "(".$misprevious[$ikey]['gas_bank_chambr_nw'].")"; } ?></span></td>
                         <td colspan="3" class="text-center"><span></span></td>
                        <td><span><?php if(isset($misres[$ikey]['gas_bank_chambr_dtm'])) echo $misres[$ikey]['gas_bank_chambr_dtm']; else echo "-"; ?></span> </td>
                      
                          </tr>
                          
                          
                        </tbody>
                      </table>
                       <div class="codel-infoirmation"> <?php  if(isset($misres[$ikey]['additional_info'])){ $te = strip_tags($misres[$ikey]['additional_info']); if($te) { echo "<b>Note:</b>".$misres[$ikey]['additional_info']; } } ?></div>
                     </div>
                      
                       <?php if($issuecn > 5) { ?>
						    <?php if(isset($issuetemp[$ikey])) { ?>
                        <div class="equipmentnot-viewtable">
						   <table width="100%" border="1" cellspacing="0" class="not-worming-date" style="margin-bottom:15px;">
                        <tbody>
                          <tr>
                           <th colspan="<?php echo (int)$issuecn + 1;   ?>" style="font-size:15px;text-align:center;background-color:#2f4050;color:#fff;"> <span style="color:#ffd800;"><?php echo get_sitename($ikey); ?> </span> - Equipment Not working Data</th>
                          </tr>
                      
                       <tr style="background-color:#e9c085;">
                        <td class="text-center"><b>Category</b></td>
                        
                          
                           
                            <?php $cm = "";foreach($issuetemp[$ikey]['category'] as $ky => $issuer) { ?>
						          
                                 <td class="text-center"><b><?php echo $keysarray[$issuer];  ?></b></td>
                                
                              
                           <?php } ?>
						   
                       </tr>
                             <tr> 
                             <td><b>S.No</b></td>
                           <?php $c = "";foreach($issuetemp[$ikey]['category'] as $ky => $issuer) { ?>
                                 <td><span><?php echo $issuer;   ?></span></td>
                                
                              
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
                               <td><b>Action Required / Planned</b></td>
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
                             <td><b>Estimated Date of Completion</b></td>
                           <?php foreach($issuetemp[$ikey]['estimation_time'] as $ky => $issuer) { ?>
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
                         <div class="equipmentnot2-viewtable">
						       <table width="100%" border="1" cellspacing="0" class="not-worming-date" style="margin-bottom:10px;">
                        <tbody>
                          <tr>
                           <th colspan="<?php echo (int)$issuecn + 1;   ?>" style="font-size:15px;text-align:center;background-color:#2f4050;color:#fff;"> <span style="color:#ffd800;"><?php echo get_sitename($ikey); ?> </span> - Equipment Not working Data</th>
                          </tr>
                     
                       <tr style="background-color:#e9c085;">
                        <td class="text-center"><b>Category</b> </td>
                           
                       
                           
                            <?php $cm = "";foreach($issuetemp[$ikey]['category'] as $ky => $issuer) { ?>
						          
                                 <td class="text-center"><b><?php echo $keysarray[$issuer];  $cm = $issuer; ?></b></td>
                                
                              
                           <?php } ?>
						   
                       </tr>
                             <tr> 
                             <td><b>S.No</b></td>
                           <?php $c = "";foreach($issuetemp[$ikey]['category'] as $ky => $issuer) {  ?>
						          
                                 <td><span><?php echo $issuer;  $c = $issuer;?></span></td>
                              
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
                               <td><b>Action Required / Planned</b></td>
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
                             <td><b>Estimated Date of Completion</b></td>
                           <?php foreach($issuetemp[$ikey]['estimation_time'] as $ky => $issuer) { ?>
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
						 <?php  }}}
                            
                            ?>
                         @endforeach
                    @else
                        
						<div>No entries in table</div>
                        
                    @endif
                      
                    </div>
    
                        
                </div>
              </div>
            </div>
			
    <script src="/build/js/custom.min.js"></script>	
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    @include('partials.footer')
@stop