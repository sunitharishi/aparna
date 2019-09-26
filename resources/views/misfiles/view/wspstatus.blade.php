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
	.manjeera table tr td.text-center
	{
	 text-align:center;
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
	}
	
	</style>
@extends('layouts.app')


@section('content')

  <?php $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 
									$year = $uriSegments[3]; 
									$month = $uriSegments[4]; 
									?>
              
<div class="misback-button"><a href="/misreportsoptions/<?php echo $year."/".$month ?>">Back</a></div>
<div class="col-md-12 col-sm-12 col-xs-12 mis-wsp-viewtable" style="padding-left:0px;padding-right:0px;">
              <div class="x_panel tile fixed_height_400">
                <div class="x_title">
                   <!--<h3>Metro Water Supply details from  01.12.2017 to 31.12.2017</h3>-->
                </div>
                <div class="x_content">
    
<div class="manjeera">
 <?php $keysarray =array("1"=>"Filter Feed Pump","2"=>"De-watering Pump","3"=>"Chlorine Dosing Pump","4"=>"Hydro Pneumatic Pump","5"=>"Pneumatic System Panel","6"=>"WSP MCC Panel","7"=>"Pressure Sand Filter","8"=>"Softener"); ?> 
  @if (count($issuecount) > 0)
                        @foreach ($issuecount as $ikey => $issuecn)
                       <div class="wspstatus-viewtable" style="margin-bottom:10px;">
                      <table width="100%" border="1" cellspacing="0">
                        <tbody>
                          <tr class="tr-color">
                           <th colspan="7" style="font-size:15px;text-align:center;">  <span style="color:#ffd800;"><?php echo get_sitename($ikey); ?> </span>WSP Equipment Status</th>
                          </tr>
                      <tr style="background-color:#e9c085;">
                        <th class="text-center" rowspan="2">Category </th>
                        <th class="text-center" rowspan="2">S.No </th>
                        <th class="text-center" rowspan="2">Description </th>
                        <th colspan="2"><?php if(isset($validation[$ikey]['wspmiscapacity'])) echo "Capacity - ".$validation[$ikey]['wspmiscapacity']; ?></th>
                          <th style="width:475px;" class="text-center" rowspan="2">Total downtime (Hrs/days) of all Equipment </th>
                       </tr>
                          
                     <tr style="background-color:#e9c085;">
                         <th class="text-center">Total  </th>
                         <th class="text-center">NW</th>
                      </tr>
                       <tr> 
                        <td rowspan="4" style="background-color:#b8cde6;"><b>Electro-<br>Mechanical<br> Equipment</b> </td>
                        <td class="text-center"><b>1</b></td>
                        <td><b>Filter Feed Pump</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['filterfeedpump'])) echo $validation[$ikey]['filterfeedpump']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['filter_feed_pmp'])) echo $misres[$ikey]['filter_feed_pmp']; ?><?php if(isset($misprevious[$ikey]['filter_feed_pmp'])) { if((int)$misprevious[$ikey]['filter_feed_pmp'] > 0 ) echo  "(".$misprevious[$ikey]['filter_feed_pmp'].")"; } ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['filter_feed_pmp_dtm'])) echo $misres[$ikey]['filter_feed_pmp_dtm']; ?></span> </td>
                      </tr>
                      
                      <tr>
                        <td class="text-center"><b>2</b></td>
                        <td><b>De-watering Pump</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['wspdewateringpump'])) echo $validation[$ikey]['wspdewateringpump']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['de_Water_pump'])) echo $misres[$ikey]['de_Water_pump']; ?><?php if(isset($misprevious[$ikey]['de_Water_pump'])) { if((int)$misprevious[$ikey]['de_Water_pump'] > 0 ) echo  "(".$misprevious[$ikey]['de_Water_pump'].")"; } ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['de_Water_pump_dtm'])) echo $misres[$ikey]['de_Water_pump_dtm']; ?></span> </td>
                      </tr>
                          
                            
                       <tr>
                        <td class="text-center"><b>3</b></td>
                        <td><b>Chlorine Dosing Pump</b></td>
                         <td class="text-center"><span><?php if(isset($validation[$ikey]['wspchlorinedospmp'])) echo $validation[$ikey]['wspchlorinedospmp']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['chlr_dos_pump'])) echo $misres[$ikey]['chlr_dos_pump']; ?><?php if(isset($misprevious[$ikey]['chlr_dos_pump'])) { if((int)$misprevious[$ikey]['chlr_dos_pump'] > 0 ) echo  "(".$misprevious[$ikey]['chlr_dos_pump'].")"; } ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['chlr_dos_pump_dtm'])) echo $misres[$ikey]['chlr_dos_pump_dtm']; ?></span> </td>
                      </tr>
                          
                        <tr>
                        <td class="text-center"><b>4</b></td>
                        <td><b>Hydro Pneumatic Pump</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['wsphydronumaticpump'])) echo $validation[$ikey]['wsphydronumaticpump']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['hydro_pneuamt_pump'])) echo $misres[$ikey]['hydro_pneuamt_pump']; ?><?php if(isset($misprevious[$ikey]['hydro_pneuamt_pump'])) { if((int)$misprevious[$ikey]['hydro_pneuamt_pump'] > 0 ) echo  "(".$misprevious[$ikey]['hydro_pneuamt_pump'].")"; } ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['hydro_pneuamt_pump_dtm'])) echo $misres[$ikey]['hydro_pneuamt_pump_dtm']; ?></span> </td>
                      </tr>
                      <tr>
                        <td rowspan="2" style="background-color:#cce0d0;"><b>Electrical <br>Panels</b> </td>
                        <td class="text-center"><b>5</b></td>
                        <td><b>Pneumatic System Panel</b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['wspnumaticsyspanel'])) echo $validation[$ikey]['wspnumaticsyspanel']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['pneumatic_sys_pa'])) echo $misres[$ikey]['pneumatic_sys_pa']; ?><?php if(isset($misprevious[$ikey]['pneumatic_sys_pa'])) { if((int)$misprevious[$ikey]['pneumatic_sys_pa'] > 0 ) echo  "(".$misprevious[$ikey]['pneumatic_sys_pa'].")"; } ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['pneumatic_sys_pa_dtm'])) echo $misres[$ikey]['pneumatic_sys_pa_dtm']; ?></span> </td>
                      </tr>
                         
                      <tr>
                        <td class="text-center"><b>6</b></td>
                        <td><b>WSP MCC Panel </b> </td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['wspmccpanel'])) echo $validation[$ikey]['wspmccpanel']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['wsp_mcc_panel'])) echo $misres[$ikey]['wsp_mcc_panel']; ?><?php if(isset($misprevious[$ikey]['wsp_mcc_panel'])) { if((int)$misprevious[$ikey]['wsp_mcc_panel'] > 0 ) echo  "(".$misprevious[$ikey]['wsp_mcc_panel'].")"; } ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['wsp_mcc_panel_dtm'])) echo $misres[$ikey]['wsp_mcc_panel_dtm']; ?></span> </td>
                      </tr>
                      
                     <!-- <tr>
                      <th colspan="7"></th>
                      </tr>-->
                      <tr>
                        <td rowspan="2" style="background-color:#b8cde6;"><b>Filtration</b></td>
                        <td class="text-center"><b>7</b></td>
                        <td><b>Pressure Sand Filter</b></td>
                       <td class="text-center"><span><?php if(isset($validation[$ikey]['wsppresssandfilter'])) echo $validation[$ikey]['wsppresssandfilter']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['pressure_san_filt'])) echo $misres[$ikey]['pressure_san_filt']; ?><?php if(isset($misprevious[$ikey]['pressure_san_filt'])) { if((int)$misprevious[$ikey]['pressure_san_filt'] > 0 ) echo  "(".$misprevious[$ikey]['pressure_san_filt'].")"; } ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['pressure_san_filt_dtm'])) echo $misres[$ikey]['pressure_san_filt_dtm']; ?></span> </td>
                      </tr>
                         
                      <tr>
                        <td class="text-center"><b>8</b></td>
                        <td><b>Softener </b></td>
                        <td class="text-center"><span><?php if(isset($validation[$ikey]['wspsoftener'])) echo $validation[$ikey]['wspsoftener']; ?></span> </td>
                        <td class="text-center"><span><?php if(isset($misres[$ikey]['softner'])) echo $misres[$ikey]['softner']; ?><?php if(isset($misprevious[$ikey]['softner'])) { if((int)$misprevious[$ikey]['softner'] > 0 ) echo  "(".$misprevious[$ikey]['softner'].")"; } ?></span> </td>
                        <td><span><?php if(isset($misres[$ikey]['softner_dtm'])) echo $misres[$ikey]['softner_dtm']; ?></span> </td>
                      </tr>
                        
                      <!-- <tr>
                       <td colspan="7"></td>
                       </tr> -->
                       
                       <tr>
                        <td colspan="6" style="background-color:#84926b;color:#fff;"><b>Flow details in Kilo Liters(KL)/Day</td>
                       <!-- <th colspan="2"> Sarovar</th>-->
                       
                       </tr>
                         
                       <tr>
                        <td rowspan="3" style="background-color:#cce0d0;"><b>Flow Details</b></td>
                        <td class="text-center"><b>9</b></td>
                        <td><b>OBR Value </b></td>
                          <td  colspan="2"class="text-center"><span><?php if(isset($validation[$ikey]['wspobrvalue'])) echo $validation[$ikey]['wspobrvalue']; ?></span> </td>
                        
                        <td><span><?php if(isset($misres[$ikey]['obr_value_dtm'])) echo $misres[$ikey]['obr_value_dtm']; ?></span></td>
                       </tr>
                         
                      <tr>
                        <td class="text-center"><b>10</b></td>
                        <td><b>Average Bore Water PPM Level</b></td>
                         <td  colspan="2" class="text-center"><span><?php if(isset($validation[$ikey]['wsprawwatppm'])) echo $validation[$ikey]['wsprawwatppm']; ?></span> </td>
                       
                         <td ><span><?php if(isset($misres[$ikey]['raw_water_ppm_dtm'])) echo $misres[$ikey]['raw_water_ppm_dtm']; ?></span></td>
                        </tr>
                       
                       <tr>
                        <td class="text-center"><b>11</b></td>
                        <td ><b>Water PPM to be maintained as per IS standard</b> </td>
                         <td   colspan="2"class="text-center"><span><?php if(isset($validation[$ikey]['wspwaterppmstand'])) echo $validation[$ikey]['wspwaterppmstand']; ?></span> </td>
                       
                         <td><span><?php if(isset($misres[$ikey]['water_ppm_main_Stnd_dtm'])) echo $misres[$ikey]['water_ppm_main_Stnd_dtm']; ?></span></td>
                        </tr>
                       <!-- <tr>
                        <th colspan="7"></th>
                        </tr> -->     
                      <!--  <tr>-->
                       
                        <!-- <th colspan="2"> Sarovar</th>-->
                        
                        <!-- </tr>-->
                         <tr>
                          <td colspan="3" style="background-color:#b8cde6;"><b>Next filter media replacement date</b></td>
                          <td  class="text-center" colspan="2"><span><?php if(isset($validation[$ikey]['wspmediarepladate'])) echo $validation[$ikey]['wspmediarepladate']; ?></span> </td>
                       
                        <td></td>
                         </tr>
                            
                        </tbody>
                      </table>
                       <div class="codel-infoirmation"> <?php  if(isset($misres[$ikey]['additional_info'])){ $te = strip_tags($misres[$ikey]['additional_info']); if($te) { echo "<b>Note:</b>".$misres[$ikey]['additional_info']; } } ?></div>
                       </div>
                       
                       <?php if($issuecn > 5) { ?>
						    <?php if(isset($issuetemp[$ikey])) { ?>
                         <div class="wspnot-viewtable" style="margin-bottom:15px;">
						   <table width="100%" border="1" cellspacing="0">
                        <tbody>
                          <tr class="tr-color">
                           <th colspan="<?php echo (int)$issuecn + 1;   ?>" style="font-size:15px;text-align:center;"> <span style="color:#ffd800;"><?php echo get_sitename($ikey); ?> </span> - Equipment Not working Data</th>
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
                        <div class="wspnot2-viewtable"  style="margin-bottom:10px;">
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