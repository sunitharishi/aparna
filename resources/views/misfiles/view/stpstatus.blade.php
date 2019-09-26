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
	 font-size:11px;
 	}
	.communityinpu tr td.text-center
	{
	 text-align:center;
	}
	.docs-main h3
	{
    margin-top:10px;
	margin-bottom:25px;
	text-align:center;
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
	.x_panel.fixed_height_400
	{
	 border:0px;
	 padding:0px;
	}
	.x_content.housesco212
	{
	 padding:0px;
	 margin-top:0px;
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
              <div class="x_panel tile fixed_height_400">
                <div class="x_title">
                   <!--<h3>Metro Water Supply details from  01.12.2017 to 31.12.2017</h3>-->
                </div>
                <div class="x_content">
    
<div class="manjeera stpequipment-viewpage">
  <?php $keysarray =array("1"=>"Bar Screen Chamber","2"=>"Raw Sewage Pumps","3"=>"Air Blowers","4"=>"Return Sludge Pumps","5"=>"Filter Feed Pumps","6"=>"Screw / Centrifuge Feed Pumps","7"=>"Centrifuge / Filter Press","8"=>"De-watering Pump","9"=>"Air Handling Unit","10"=>"Chlorine Dosing Pump","11"=>"UV System","12"=>"Hydro Pneumatic Pumps","13"=>"Pneumatic System Panel","14"=>"STP MCC Panel","15"=>"Pressure Sand Filter","16"=>"Activated Carbon Filter"); ?> 
         
                   @if (count($issuecount) > 0)
                        @foreach ($issuecount as $ikey => $issuecn)
                     <div class="stpstatus-viewtable" style="margin-bottom:10px;">
                      <table width="100%" border="1" cellspacing="0">
                        <tbody>
                          <tr class="tr-color">
                           <th colspan="6" style="font-size:15px;text-align:center;">  <span style="color:#ffd800;"><?php echo get_sitename($ikey); ?> </span> STP Equipment Status </th>
                          </tr>
                      <tr style="background-color:#e9c085;">
                        <th class="text-center" rowspan="2">Category </th>
                        <th class="text-center" rowspan="2">S.No </th>
                        <th class="text-center" rowspan="2">Description </th>
                         <th colspan="2"><?php if(isset($validation[$ikey]['stpmiscapacity'])) echo "Capacity - ".$validation[$ikey]['stpmiscapacity']; ?> </th>
                         <th class="text-center" rowspan="2">Total downtime (Hrs/days) of all Equipment </th>
                       </tr>
                          
                       <tr style="background-color:#e9c085;">
                         <th style="width:65px;" class="text-center">Total </th>
                         <th class="text-center">NW</th>
                       </tr>
                        
                       <tr>
                        <td rowspan="12" style="background-color:#b8cde6;"><b>Electro-<br>Mechanical<br> Equipment</b> </td>
                        <td class="text-center"><b>1</b></td>
                        <td><b>Bar Screen Chamber</b></td>
                       <td class="text-center"><span><?php if(isset($validation[$ikey]['stpbarscreencham'])) echo $validation[$ikey]['stpbarscreencham']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['bar_scr_chbr_nw'])) echo $misres[$ikey]['bar_scr_chbr_nw']; ?><?php if(isset($misprevious[$ikey]['bar_scr_chbr_nw'])) { if((int)$misprevious[$ikey]['bar_scr_chbr_nw'] > 0 ) echo  "(".$misprevious[$ikey]['bar_scr_chbr_nw'].")"; } ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['bar_scr_chbr_dtm'])) echo $misres[$ikey]['bar_scr_chbr_dtm']; ?></span> </td>
                      </tr>
                     
                      <tr>
                        <td class="text-center"><b>2</b></td>
                        <td><b>Raw Sewage Pumps</b></td>
                       <td class="text-center"><span><?php if(isset($validation[$ikey]['stprawsewagepump'])) echo $validation[$ikey]['stprawsewagepump']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['raw_sav_pmp_nw'])) echo $misres[$ikey]['raw_sav_pmp_nw']; ?><?php if(isset($misprevious[$ikey]['raw_sav_pmp_nw'])) { if((int)$misprevious[$ikey]['raw_sav_pmp_nw'] > 0 ) echo  "(".$misprevious[$ikey]['raw_sav_pmp_nw'].")"; } ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['raw_sav_pmp_dtm'])) echo $misres[$ikey]['raw_sav_pmp_dtm']; ?></span> </td>
                      </tr>
                          
                            
                       <tr>
                        <td class="text-center"><b>3</b></td>
                        <td><b>Air Blowers</b></td>
                      <td class="text-center"><span><?php if(isset($validation[$ikey]['stpairbowlers'])) echo $validation[$ikey]['stpairbowlers']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['air_blow_nw'])) echo $misres[$ikey]['air_blow_nw']; ?><?php if(isset($misprevious[$ikey]['air_blow_nw'])) { if((int)$misprevious[$ikey]['air_blow_nw'] > 0 ) echo  "(".$misprevious[$ikey]['air_blow_nw'].")"; } ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['air_blow_dtm'])) echo $misres[$ikey]['air_blow_dtm']; ?></span> </td>
                      </tr>
                          
                        <tr>
                        <td class="text-center"><b>4</b></td>
                        <td><b>Return Sludge Pumps</b></td>
                      <td class="text-center"><span><?php if(isset($validation[$ikey]['stpretsludpumps'])) echo $validation[$ikey]['stpretsludpumps']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['retrn_sludge_nw'])) echo $misres[$ikey]['retrn_sludge_nw']; ?><?php if(isset($misprevious[$ikey]['retrn_sludge_nw'])) { if((int)$misprevious[$ikey]['retrn_sludge_nw'] > 0 ) echo  "(".$misprevious[$ikey]['retrn_sludge_nw'].")"; } ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['retrn_sludge_dtm'])) echo $misres[$ikey]['retrn_sludge_dtm']; ?></span> </td>
                      </tr>
                          
                          
                         
                       <tr>
                        <td class="text-center"><b>5</b></td>
                        <td><b>Filter Feed Pumps</b></td>
                       <td class="text-center"><span><?php if(isset($validation[$ikey]['stpfilterfeedpump'])) echo $validation[$ikey]['stpfilterfeedpump']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['filter_feed_nw'])) echo $misres[$ikey]['filter_feed_nw']; ?><?php if(isset($misprevious[$ikey]['filter_feed_nw'])) { if((int)$misprevious[$ikey]['filter_feed_nw'] > 0 ) echo  "(".$misprevious[$ikey]['filter_feed_nw'].")"; } ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['filter_feed_dtm'])) echo $misres[$ikey]['filter_feed_dtm']; ?></span> </td>
                      </tr>
                          
                      <tr>
                        <td class="text-center"><b>6</b></td>
                        <td><b>Screw / Centrifuge Feed Pumps</b></td>
                       <td class="text-center"><span><?php if(isset($validation[$ikey]['stpscrewpumps'])) echo $validation[$ikey]['stpscrewpumps']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['screw_cent_nw'])) echo $misres[$ikey]['screw_cent_nw']; ?><?php if(isset($misprevious[$ikey]['screw_cent_nw'])) { if((int)$misprevious[$ikey]['screw_cent_nw'] > 0 ) echo  "(".$misprevious[$ikey]['screw_cent_nw'].")"; } ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['screw_cent_dtm'])) echo $misres[$ikey]['screw_cent_dtm']; ?></span> </td>
                      </tr>
                          
                       <tr>
                        <td class="text-center"><b>7</b></td>
                        <td><b>Centrifuge / Filter Press</b></td>
                       <td class="text-center"><span><?php if(isset($validation[$ikey]['stpcentrifilpress'])) echo $validation[$ikey]['stpcentrifilpress']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['centri_filter_nw'])) echo $misres[$ikey]['centri_filter_nw']; ?><?php if(isset($misprevious[$ikey]['centri_filter_nw'])) { if((int)$misprevious[$ikey]['centri_filter_nw'] > 0 ) echo  "(".$misprevious[$ikey]['centri_filter_nw'].")"; } ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['centri_filter_dtm'])) echo $misres[$ikey]['centri_filter_dtm']; ?></span> </td>
                      </tr>
                          
                      <tr>
                        <td class="text-center"><b>8</b></td>
                        <td><b>De-watering Pump</b></td>
                      <td class="text-center"><span><?php if(isset($validation[$ikey]['stpdewaterpump'])) echo $validation[$ikey]['stpdewaterpump']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['de_Water_nw'])) echo $misres[$ikey]['de_Water_nw']; ?><?php if(isset($misprevious[$ikey]['de_Water_nw'])) { if((int)$misprevious[$ikey]['de_Water_nw'] > 0 ) echo  "(".$misprevious[$ikey]['de_Water_nw'].")"; } ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['de_Water_dtm'])) echo $misres[$ikey]['de_Water_dtm']; ?></span> </td>
                      </tr>

                           
                       <tr>
                        <td class="text-center"><b>9</b></td>
                        <td><b>Air Handling Unit</b> </td>
                      <td class="text-center"><span><?php if(isset($validation[$ikey]['stphairhandunit'])) echo $validation[$ikey]['stphairhandunit']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['air_handling_nw'])) echo $misres[$ikey]['air_handling_nw']; ?><?php if(isset($misprevious[$ikey]['air_handling_nw'])) { if((int)$misprevious[$ikey]['air_handling_nw'] > 0 ) echo  "(".$misprevious[$ikey]['air_handling_nw'].")"; } ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['air_handling_dtm'])) echo $misres[$ikey]['air_handling_dtm']; ?></span> </td>
                      </tr>
                          
                           
                      <tr>
                        <td class="text-center"><b>10</b></td>
                        <td><b>Chlorine Dosing Pump</b></td>
                       <td class="text-center"><span><?php if(isset($validation[$ikey]['chlorinedosingpump'])) echo $validation[$ikey]['chlorinedosingpump']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['chlorine_dos_nw'])) echo $misres[$ikey]['chlorine_dos_nw']; ?><?php if(isset($misprevious[$ikey]['chlorine_dos_nw'])) { if((int)$misprevious[$ikey]['chlorine_dos_nw'] > 0 ) echo  "(".$misprevious[$ikey]['chlorine_dos_nw'].")"; } ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['chlorine_dos_dtm'])) echo $misres[$ikey]['chlorine_dos_dtm']; ?></span> </td>
                      </tr>
                          
                      <tr>
                        <td class="text-center"><b>11</b></td>
                        <td><b>UV System </b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['uvsystem'])) echo $validation[$ikey]['uvsystem']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['uv_sys_nw'])) echo $misres[$ikey]['uv_sys_nw']; ?><?php if(isset($misprevious[$ikey]['uv_sys_nw'])) { if((int)$misprevious[$ikey]['uv_sys_nw'] > 0 ) echo  "(".$misprevious[$ikey]['uv_sys_nw'].")"; } ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['uv_sys_dtm'])) echo $misres[$ikey]['uv_sys_dtm']; ?></span> </td>
                      </tr>
                      
                      <tr>
                        <td class="text-center"><b>12</b></td>
                        <td><b>Hydro Pneumatic Pumps</b></td>
                       <td class="text-center"><span><?php if(isset($validation[$ikey]['hydronumaticpump'])) echo $validation[$ikey]['hydronumaticpump']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['hydro_numa_nw'])) echo $misres[$ikey]['hydro_numa_nw']; ?><?php if(isset($misprevious[$ikey]['hydro_numa_nw'])) { if((int)$misprevious[$ikey]['hydro_numa_nw'] > 0 ) echo  "(".$misprevious[$ikey]['hydro_numa_nw'].")"; } ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['hydro_numa_dtm'])) echo $misres[$ikey]['hydro_numa_dtm']; ?></span> </td>
                      </tr>
                      
                      <!-- <tr>
                        <td colspan="7"></td>
                      </tr>-->
                      
                      <tr>
                        <td rowspan="2" style="background-color:#cce0d0;"><b>Electrical<br> Panels</b> </td>
                        <td class="text-center"><b>13</b></td>
                        <td><b>Pneumatic System Panel</b></td>
                      <td class="text-center"><span><?php if(isset($validation[$ikey]['pneumaticsyspanel'])) echo $validation[$ikey]['pneumaticsyspanel']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['pnumatic_sys_nw'])) echo $misres[$ikey]['pnumatic_sys_nw']; ?><?php if(isset($misprevious[$ikey]['pnumatic_sys_nw'])) { if((int)$misprevious[$ikey]['pnumatic_sys_nw'] > 0 ) echo  "(".$misprevious[$ikey]['pnumatic_sys_nw'].")"; } ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['pnumatic_sys_dtm'])) echo $misres[$ikey]['pnumatic_sys_dtm']; ?></span> </td>
                      </tr>
                         
                      <tr>
                        <td class="text-center"><b>14</b></td>
                        <td><b>STP MCC Panel</b> </td>
                       <td class="text-center"><span><?php if(isset($validation[$ikey]['stpmccpanel'])) echo $validation[$ikey]['stpmccpanel']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['stp_mcc_nw'])) echo $misres[$ikey]['stp_mcc_nw']; ?><?php if(isset($misprevious[$ikey]['stp_mcc_nw'])) { if((int)$misprevious[$ikey]['stp_mcc_nw'] > 0 ) echo  "(".$misprevious[$ikey]['stp_mcc_nw'].")"; } ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['stp_mcc_dtm'])) echo $misres[$ikey]['stp_mcc_dtm']; ?></span> </td>
                      </tr>
                      
                      <!-- <tr>
                        <td colspan="7"></td>
                      </tr>-->
                      
                      
                      <tr>
                        <td rowspan="2" style="background-color:#b8cde6;"><b>Filtration</b></td>
                        <td class="text-center"><b>15</b></td>
                        <td><b>Pressure Sand Filter</b></td>
                       <td class="text-center"><span><?php if(isset($validation[$ikey]['pressuresandfilter'])) echo $validation[$ikey]['pressuresandfilter']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['pressure_san_nw'])) echo $misres[$ikey]['pressure_san_nw']; ?><?php if(isset($misprevious[$ikey]['pressure_san_nw'])) { if((int)$misprevious[$ikey]['pressure_san_nw'] > 0 ) echo  "(".$misprevious[$ikey]['pressure_san_nw'].")"; } ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['pressure_san_dtm'])) echo $misres[$ikey]['pressure_san_dtm']; ?></span> </td>
                      </tr>
                         
                      <tr>
                        <td class="text-center"><b>16</b></td>
                        <td><b>Activated Carbon Filter</b> </td>
                       <td class="text-center"><span><?php if(isset($validation[$ikey]['activatedcarbonfilter'])) echo $validation[$ikey]['activatedcarbonfilter']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['act_carb_nw'])) echo $misres[$ikey]['act_carb_nw']; ?><?php if(isset($misprevious[$ikey]['act_carb_nw'])) { if((int)$misprevious[$ikey]['act_carb_nw'] > 0 ) echo  "(".$misprevious[$ikey]['act_carb_nw'].")"; } ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['act_carb_dtm'])) echo $misres[$ikey]['act_carb_dtm']; ?></span> </td>
                      </tr>
                        
                      <!-- <tr>
                       <td colspan="7" ></td>
                       </tr> -->
                       
                       <tr>
                        <td colspan="6" style="background-color:#84926b;color:#fff;"><b>Flow details in Kilo Liters (KL) / Day</b></td>
                       <!-- <th colspan="2"> Sarovar</th>-->
                       </tr>
                         
                       <tr>
                        <td rowspan="5" style="background-color:#cce0d0;"><b>Flow Details</b></td>
                        <td class="text-center"><b>17</b></td>
                        <td><b>Average Inflow</b></td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['avg_inflow'])) echo $misres[$ikey]['avg_inflow']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['avg_inflow_dtm'])) echo $misres[$ikey]['avg_inflow_dtm']; ?></span> </td>
                        <td><span></span></td>
                      </tr>
                         
                      <tr>
                        <td class="text-center"><b>18</b></td>
                        <td><b>Average Outflow to garden, fire and flush</b></td>
                       <td class="text-center"><span><?php if(isset($misres[$ikey]['avg_out_flow'])) echo $misres[$ikey]['avg_out_flow']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['avg_out_flow_dtm'])) echo $misres[$ikey]['avg_out_flow_dtm']; ?></span> </td>
                        <td><span></span></td>
                       </tr>
                       
                       <tr>
                        <td class="text-center"><b>19</b></td>
                        <td><b>Surplus Treated Water Outlet</b> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['avg_bypass'])) echo $misres[$ikey]['avg_bypass']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['avg_bypass_dtm'])) echo $misres[$ikey]['avg_bypass_dtm']; ?></span> </td>
                         <td><span></span></td>
                       </tr>
                       
                       <tr>
                        <td class="text-center"><b>20</b></td>
                        <td><b>Average Outflow to other sites</b> </td>
                       <td class="text-center"><span><?php if(isset($misres[$ikey]['avg_outflow_other'])) echo $misres[$ikey]['avg_outflow_other']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['avg_outflow_other_dtm'])) echo $misres[$ikey]['avg_outflow_other_dtm']; ?></span> </td>
                         <td><span></span></td>
                       </tr>
					   
					    <tr>   
                        <td class="text-center"><b>21</b></td>
                        <td><b>Sludge Extracted(Kgs)</b> </td>
                        <td class="text-center"> <span><?php echo getmtdfms($report_on,$ikey,'stp_sludge'); ?></span></td>
                        <!--  <td>{!! Form::text('avg_outflow_other_dtm',(isset($res['avg_outflow_other_dtm'])) ? $res['avg_outflow_other_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>-->
						<td colspan="2"></td>
                        </tr>
                       
                      <!--  <tr> 
                        <td colspan="7"></td>  
                        </tr> -->
                       <!-- <tr>-->
                        
                        <!-- <th colspan="2"> Sarovar</th>-->
                       
                        <!-- </tr>-->
                         <tr>
                         <td colspan="3" style="background-color:#b8cde6;"><b>Next filter media replacement date</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['nextfilterreplacement'])) echo $validation[$ikey]['nextfilterreplacement']; ?></span> </td>
                        <td class="text-center"></td>
                        <td><span></span></td>
                         </tr>
                           
                        </tbody>
                      </table>
                      <div class="codel-infoirmation"> <?php  if(isset($misres[$ikey]['additional_info'])){ $te = strip_tags($misres[$ikey]['additional_info']); if($te) { echo "<b>Note:</b>".$misres[$ikey]['additional_info']; } } ?></div>
                     </div>
                      
					     <?php if($issuecn > 5) { ?>
						    <?php if(isset($issuetemp[$ikey])) { ?>
                            <div class="stpnot-viewtable" style="margin-bottom:15px;">
						   <table width="100%" border="1" cellspacing="0" >
                        <tbody>
                          <tr class="tr-color">
                           <th colspan="<?php echo (int)$issuecn + 1;   ?>" style="font-size:15px;text-align:center;"> <span style="color:#ffd800;"><?php echo get_sitename($ikey); ?> </span> - STP Not working Data</th>
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
                        <div class="stpnot2-viewtable" style="margin-bottom:10px;">
						       <table width="100%" border="1" cellspacing="0">
                        <tbody>
                          <tr class="tr-color">
                           <th colspan="<?php echo (int)$issuecn + 1;   ?>" style="font-size:15px;text-align:center;"> <span style="color:#ffd800;"><?php echo get_sitename($ikey); ?> </span> - Equipment Not working Data</th>
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
                          <?php }  ?>     
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
			
    <script src="/build/js/custom.min.js"></script>	
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    @include('partials.footer')
@stop