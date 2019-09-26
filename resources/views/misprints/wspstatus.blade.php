<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>WSP Equipment Status</title>

  
    
    <style>
	body {
  font-family:Arial, Helvetica, sans-serif;
}
	
	.classic-folk tbody tr th 
	{
	padding:16px 6px;
	text-align:center;
	font-size:13.5px;
	vertical-align:middle;
	}
	.classic-folk tbody tr td 
	{
	padding:16px 6px;
	text-align:center;
	font-size:13.5px;
	}
	
 	.wspequadditionin tbody tr th
	{
	 padding:14px 6px;
	}
	.wspequadditionin tbody tr td
	{
	 padding:14px 6px;
	}
	
	
	table tr td.sarlef
	{
	text-align:left;
	}
	
	table tbody tr td p
	{
	 white-space:nowrap;
	 word-break:normal;
	 margin-bottom:5px;
	}
	.great-concerned tbody tr td
	{
	 font-size:14px;
	 text-align:center;
	 padding:17px 2px;
	 
	}
	.great-concerned tbody tr td:nth-child(1)
	{
	 padding-left:5px;
	}
	.great-concerned tbody tr td.sarlef
	{
	text-align:left;
	}
	.great-concerned tbody tr th
	{
	 font-size:14px;
	 text-align:center;
	 padding:17px 2px;
	}
	.great-concerned tbody tr th.sarlef
	{
	text-align:left;
	}
	.codel-infoirmation
	{
	 font-size:13px;
	 width:100%;
	  margin-top:4px;
	}
	 .codel-infoirmation .note-information
	 {
	  width:auto;
	  float:left;
	 }
	
	.codel-infoirmation b
	{
	 float:left;
	 margin-right:4px;
	}
	.codel-infoirmation p
	{
	 float:left;
	 margin-top:0px;
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
                                  
<div class="manjeera">
	<?php $keysarray =array("1"=>"Filter Feed Pump","2"=>"De-watering Pump","3"=>"Chlorine Dosing Pump","4"=>"Hydro Pneumatic Pump","5"=>"Pneumatic System Panel","6"=>"WSP MCC Panel","7"=>"Pressure Sand Filter","8"=>"Softener"); ?> 
    @if (count($issuecount) > 0) <?php $xc = 0; ?>
    @foreach ($issuecount as $ikey => $issuecn)
    <?php $xc = $xc + 1;; ?>
    <div <?php if($xc == count($issuecount) && $issuecn == 0) {} else { ?>style=" page-break-after: always;" <?php } ?>>
        <table width="100%" border="1" cellspacing="0" class="classic-folk <?php  if(isset($misres[$ikey]['additional_info'])){ $te = strip_tags($misres[$ikey]['additional_info']); if($te) { echo 'wspequadditionin'; } } ?>" style="font-size:12px;">
            <tbody>
                <tr>
                	<th colspan="6" style="font-size:14px;padding:6px 0px;text-align:center;">  <span><?php echo get_sitename($ikey); ?> - </span>WSP Equipment Status</th>
                </tr>
                <tr>
                    <th rowspan="2">Category </th>
                    <th rowspan="2">S.No </th>
                    <th rowspan="2">Description </th>
                    <th colspan="2"> <?php if(isset($validation[$ikey]['wspmiscapacity'])) echo "Capacity - ".$validation[$ikey]['wspmiscapacity']; ?></th>
                    <th rowspan="2">Total Downtime (Hrs/days) of all Equipment  </th>
                </tr>
                <tr> 
                    <th  >Total  </th>
                    <th  >Not Working</th>   
                </tr>
                
                <tr> 
                    <td rowspan="4"><b>Electro-<br>Mechanical<br> Equipment</b> </td>
                    <td><b>1</b></td>
                    <td class="sarlef"><b>Filter Feed Pump</b></td>
                    <td><span><?php if(isset($validation[$ikey]['filterfeedpump'])) echo $validation[$ikey]['filterfeedpump']; ?></span> </td>
                    <td><span><?php if(isset($misres[$ikey]['filter_feed_pmp'])) echo $misres[$ikey]['filter_feed_pmp']; ?><?php if(isset($misprevious[$ikey]['filter_feed_pmp'])) { if((int)$misprevious[$ikey]['filter_feed_pmp'] > 0 ) echo  "(".$misprevious[$ikey]['filter_feed_pmp'].")"; } ?></span> </td>
                    <td><span><?php if(isset($misres[$ikey]['filter_feed_pmp_dtm'])) echo $misres[$ikey]['filter_feed_pmp_dtm']; ?></span> </td>
                </tr>
                
                <tr>
                    <td><b>2</b></td>
                    <td class="sarlef"><b>De-watering Pump</b></td>
                    <td><span><?php if(isset($validation[$ikey]['wspdewateringpump'])) echo $validation[$ikey]['wspdewateringpump']; ?></span> </td>
                    <td><span><?php if(isset($misres[$ikey]['de_Water_pump'])) echo $misres[$ikey]['de_Water_pump']; ?><?php if(isset($misprevious[$ikey]['de_Water_pump'])) { if((int)$misprevious[$ikey]['de_Water_pump'] > 0 ) echo  "(".$misprevious[$ikey]['de_Water_pump'].")"; } ?></span> </td>
                    <td><span><?php if(isset($misres[$ikey]['de_Water_pump_dtm'])) echo $misres[$ikey]['de_Water_pump_dtm']; ?></span> </td>
                </tr>
                
                
                <tr>
                    <td><b>3</b></td>
                    <td class="sarlef"><b>Chlorine Dosing Pump</b></td>
                    <td><span><?php if(isset($validation[$ikey]['wspchlorinedospmp'])) echo $validation[$ikey]['wspchlorinedospmp']; ?></span> </td>
                    <td><span><?php if(isset($misres[$ikey]['chlr_dos_pump'])) echo $misres[$ikey]['chlr_dos_pump']; ?><?php if(isset($misprevious[$ikey]['chlr_dos_pump'])) { if((int)$misprevious[$ikey]['chlr_dos_pump'] > 0 ) echo  "(".$misprevious[$ikey]['chlr_dos_pump'].")"; } ?></span> </td>
                    <td><span><?php if(isset($misres[$ikey]['chlr_dos_pump_dtm'])) echo $misres[$ikey]['chlr_dos_pump_dtm']; ?></span> </td>
                </tr>
                
                <tr>
                    <td><b>4</b></td>
                    <td class="sarlef"><b>Hydro Pneumatic Pump</b></td>
                    <td><span><?php if(isset($validation[$ikey]['wsphydronumaticpump'])) echo $validation[$ikey]['wsphydronumaticpump']; ?></span> </td>
                    <td><span><?php if(isset($misres[$ikey]['hydro_pneuamt_pump'])) echo $misres[$ikey]['hydro_pneuamt_pump']; ?><?php if(isset($misprevious[$ikey]['hydro_pneuamt_pump'])) { if((int)$misprevious[$ikey]['hydro_pneuamt_pump'] > 0 ) echo  "(".$misprevious[$ikey]['hydro_pneuamt_pump'].")"; } ?></span> </td>
                    <td><span><?php if(isset($misres[$ikey]['hydro_pneuamt_pump_dtm'])) echo $misres[$ikey]['hydro_pneuamt_pump_dtm']; ?></span> </td>
                </tr>
                <tr>
                    <td rowspan="2"><b>Electrical <br>Panels</b> </td>
                    <td><b>5</b></td>
                    <td class="sarlef"><b>Pneumatic System Panel</b></td>
                    <td><span><?php if(isset($validation[$ikey]['wspnumaticsyspanel'])) echo $validation[$ikey]['wspnumaticsyspanel']; ?></span> </td>
                    <td><span><?php if(isset($misres[$ikey]['pneumatic_sys_pa'])) echo $misres[$ikey]['pneumatic_sys_pa']; ?><?php if(isset($misprevious[$ikey]['pneumatic_sys_pa'])) { if((int)$misprevious[$ikey]['pneumatic_sys_pa'] > 0 ) echo  "(".$misprevious[$ikey]['pneumatic_sys_pa'].")"; } ?></span> </td>
                    <td><span><?php if(isset($misres[$ikey]['pneumatic_sys_pa_dtm'])) echo $misres[$ikey]['pneumatic_sys_pa_dtm']; ?></span> </td>
                </tr>
                
                <tr>
                    <td><b>6</b></td>
                    <td class="sarlef"><p><b>WSP MCC Panel </b></p> </td>
                    <td><span><?php if(isset($validation[$ikey]['wspmccpanel'])) echo $validation[$ikey]['wspmccpanel']; ?></span> </td>
                    <td><span><?php if(isset($misres[$ikey]['wsp_mcc_panel'])) echo $misres[$ikey]['wsp_mcc_panel']; ?><?php if(isset($misprevious[$ikey]['wsp_mcc_panel'])) { if((int)$misprevious[$ikey]['wsp_mcc_panel'] > 0 ) echo  "(".$misprevious[$ikey]['wsp_mcc_panel'].")"; } ?></span> </td>
                    <td><span><?php if(isset($misres[$ikey]['wsp_mcc_panel_dtm'])) echo $misres[$ikey]['wsp_mcc_panel_dtm']; ?></span> </td>
                </tr>
                
                
                <tr>
                    <td rowspan="2"><b>Filtration</b></td>
                    <td><b>7</b></td>
                    <td class="sarlef"><b>Pressure Sand Filter</b></td>
                    <td><span><?php if(isset($validation[$ikey]['wsppresssandfilter'])) echo $validation[$ikey]['wsppresssandfilter']; ?></span> </td>
                    <td><span><?php if(isset($misres[$ikey]['pressure_san_filt'])) echo $misres[$ikey]['pressure_san_filt']; ?><?php if(isset($misprevious[$ikey]['pressure_san_filt'])) { if((int)$misprevious[$ikey]['pressure_san_filt'] > 0 ) echo  "(".$misprevious[$ikey]['pressure_san_filt'].")"; } ?></span> </td>
                    <td><span><?php if(isset($misres[$ikey]['pressure_san_filt_dtm'])) echo $misres[$ikey]['pressure_san_filt_dtm']; ?></span> </td>
                </tr>
                
                <tr>
                    <td><b>8</b></td>
                    <td class="sarlef"><b>Softener </b></td>
                    <td><span><?php if(isset($validation[$ikey]['wspsoftener'])) echo $validation[$ikey]['wspsoftener']; ?></span> </td>
                    <td><span><?php if(isset($misres[$ikey]['softner'])) echo $misres[$ikey]['softner']; ?><?php if(isset($misprevious[$ikey]['softner'])) { if((int)$misprevious[$ikey]['softner'] > 0 ) echo  "(".$misprevious[$ikey]['softner'].")"; } ?></span> </td>
                    <td><span><?php if(isset($misres[$ikey]['softner_dtm'])) echo $misres[$ikey]['softner_dtm']; ?></span> </td>
                </tr>
                
                
                
                <tr>
                	<td colspan="6"><b>Flow details in Kilo Liters(KL)/Day</td>
                
                
                </tr>
                
                <tr>
                    <td rowspan="3"><b>Flow Details</b></td>
                    <td><b>9</b></td>
                    <td colspan="2" class="sarlef"><b>OBR Value </b></td>
                    <td><span><?php if(isset($validation[$ikey]['wspobrvalue'])) echo $validation[$ikey]['wspobrvalue']; ?></span> </td>
                    <td><span><?php if(isset($misres[$ikey]['obr_value_dtm'])) echo $misres[$ikey]['obr_value_dtm']; ?></span></td>
                </tr>
                
                <tr>
                    <td><b>10</b></td>
                    <td colspan="2" class="sarlef"><b>Average Bore Water PPM Level</b></td>
                    <td><span><?php if(isset($validation[$ikey]['wsprawwatppm'])) echo $validation[$ikey]['wsprawwatppm']; ?></span> </td>
                    <td><span><?php if(isset($misres[$ikey]['raw_water_ppm_dtm'])) echo $misres[$ikey]['raw_water_ppm_dtm']; ?></span></td>
                </tr>
                
                <tr>
                    <td><b>11</b></td>
                    <td colspan="2" class="sarlef"><b>Water PPM standard to be maintained as per IS:10500(2012)</b> </td>
                    <td><span><?php if(isset($validation[$ikey]['wspwaterppmstand'])) echo $validation[$ikey]['wspwaterppmstand']; ?></span> </td>
                    <td><span><?php if(isset($misres[$ikey]['water_ppm_main_Stnd_dtm'])) echo $misres[$ikey]['water_ppm_main_Stnd_dtm']; ?></span></td>
                </tr>
                
                <tr>
                    <td colspan="4" class="sarlef"><b>Next filter media replacement date</b></td>
                    <td><span><?php if(isset($validation[$ikey]['wspmediarepladate'])) echo $validation[$ikey]['wspmediarepladate']; ?></span> </td>
                    <td></td>
                </tr>
                
            </tbody>
        </table>
    <div class="codel-infoirmation"> <?php  if(isset($misres[$ikey]['additional_info'])){ $te = strip_tags($misres[$ikey]['additional_info']); if($te) { echo "<div class='cote-i'><b>Note:</b></div><div class='note-information'>".$misres[$ikey]['additional_info']."</div>"; } } ?></div>
    </div>
<?php if($issuecn > 5) { ?>
<?php if(isset($issuetemp[$ikey])) { ?>



    <div <?php  if($xc == count($issuecount)) {} else { ?>style="page-break-after: always;" <?php } ?>>
        <table width="100%" border="1" cellspacing="0" class="great-concerned" >
            <tbody>
                <tr>
                	<th colspan="<?php echo (int)$issuecn + 1;   ?>" style="font-size:14px;padding:6px 0px;text-align:center;"> <span><?php echo get_sitename($ikey); ?> </span> - WSP Not Working Data</th>
                </tr>
                
                <tr>
                    <td class="sarlef"><b>Category</b></td>
                    
                    
                    
                    <?php $cm = "";foreach($issuetemp[$ikey]['category'] as $ky => $issuer) { ?>
                    
                    <td><b><?php echo $keysarray[$issuer];  ?></b></td>
                    
                    
                    <?php } ?>
                
                </tr>
                <tr> 
                    <td><b>S.No</b></td>
                    <?php $c = "";foreach($issuetemp[$ikey]['category'] as $ky => $issuer) { ?>
                    <td><span><?php echo $issuer;   ?></span></td>
                    
                    
                    <?php } ?>
                </tr>
                <tr>
                    <td class="sarlef"><b>Description of Issue</b></td>
                    
                    <?php foreach($issuetemp[$ikey]['issue_des'] as $ky => $issuer) { ?>
                    <td><span><?php echo $issuer; ?></span></td>
                    
                    <?php } ?>
                </tr>
                <tr>
                    <td class="sarlef"><b>Root Cause</b></td>
                    <?php foreach($issuetemp[$ikey]['root_cause'] as $ky => $issuer) { ?>
                    <td><span><?php echo $issuer; ?></span></td>
                    
                    <?php } ?>
                </tr>
                <tr>
                    <td class="sarlef"><b>Action Required / Planned</b></td>
                    <?php foreach($issuetemp[$ikey]['act_req_plan'] as $ky => $issuer) { ?>
                    <td><span><?php echo $issuer; ?></span></td>
                    
                    <?php } ?>
                </tr> 
                <tr>
                    <td class="sarlef"><b>Pending from days</b></td>
                    <?php foreach($issuetemp[$ikey]['pendingfromdays'] as $ky => $issuer) { ?>
                    <td><span><?php echo $issuer; ?></span></td>
                    
                    <?php } ?>
                </tr>

                 <tr>
                    <td class="sarlef"><b>Estimated Date of Completion</b></td>
                    <?php foreach($issuetemp[$ikey]['estimation_time'] as $ky => $issuer) { ?>
                    <td><span><?php echo $issuer; ?></span></td>
                    
                    <?php } ?>
                </tr>

                <tr>
                    <td class="sarlef"><b>Responsibility</b></td>
                    <?php foreach($issuetemp[$ikey]['reponsibility'] as $ky => $issuer) { ?>
                    <td><span><?php echo $issuer; ?></span></td>
                    
                    <?php } ?>
                </tr>
                <tr>
                    <td class="sarlef"><b>Notified to the concerned</b></td>
                    <?php foreach($issuetemp[$ikey]['notify_concern'] as $ky => $issuer) { ?>
                    <td><span><?php echo $issuer; ?></span></td>
                    
                    <?php } ?>
                </tr>
            	
            </tbody>
        </table>
    </div>



<?php  }}else{  if(isset($issuetemp[$ikey])) { if(isset($issuetemp[$ikey]['category'])) { ?>
    <div <?php if($xc == count($issuecount)) {} else { ?>style=" page-break-after: always;" <?php } ?>>
        <table width="100%" border="1" cellspacing="0" class="great-concerned" >
            <tbody>
                <tr>
                	<th colspan="<?php echo (int)$issuecn + 1;   ?>" style="font-size:14px;padding:6px 0px;text-align:center;"> <span><?php echo get_sitename($ikey); ?> </span> - WSP Not Working Data</th>
                </tr>
                
                <tr>
                    <td class="sarlef"><b>Category</b> </td>
                    
                    
                    
                    <?php $cm = "";foreach($issuetemp[$ikey]['category'] as $ky => $issuer) { ?>
                    
                    <td><b><?php echo $keysarray[$issuer];  $cm = $issuer; ?></b></td>
                    
                    
                    <?php } ?>
                    
                </tr>
                <tr> 
                    <td class="sarlef"><b>S.No</b></td>
                    <?php $c = "";foreach($issuetemp[$ikey]['category'] as $ky => $issuer) {  ?>
                    
                    <td><span><?php echo $issuer;  $c = $issuer;?></span></td>
                    
                    <?php } ?>
                </tr>
                <tr>
                    <td class="sarlef"><b>Description of Issue</b></td>
                    <?php foreach($issuetemp[$ikey]['issue_des'] as $ky => $issuer) { ?>
                    <td><span><?php echo $issuer; ?></span></td>
                    
                    <?php } ?>
                </tr>
                <tr>
                    <td class="sarlef"><b>Root Cause</b></td>
                    <?php foreach($issuetemp[$ikey]['root_cause'] as $ky => $issuer) { ?>
                    <td><span><?php echo $issuer; ?></span></td>
                    
                    <?php } ?>
                </tr>
                <tr>
                    <td class="sarlef"><b>Action Required / Planned</b></td>
                    <?php foreach($issuetemp[$ikey]['act_req_plan'] as $ky => $issuer) { ?>
                    <td><span><?php echo $issuer; ?></span></td>
                    
                    <?php } ?>
                </tr> 
                <tr>
                    <td class="sarlef"><b>Pending from days</b></td>
                    <?php foreach($issuetemp[$ikey]['pendingfromdays'] as $ky => $issuer) { ?>
                    <td><span><?php echo $issuer; ?></span></td>
                    
                    <?php } ?>
                </tr>
                  <tr>
                    <td class="sarlef"><b>Estimated Date of Completion</b></td>
                    <?php foreach($issuetemp[$ikey]['estimation_time'] as $ky => $issuer) { ?>
                    <td><span><?php echo $issuer; ?></span></td>
                    
                    <?php } ?>
                </tr>
                <tr>
                    <td class="sarlef"><b>Responsibility</b></td>
                    <?php foreach($issuetemp[$ikey]['reponsibility'] as $ky => $issuer) { ?>
                    <td><span><?php echo $issuer; ?></span></td>
                    
                    <?php } ?>
                </tr>
                <tr>
                    <td class="sarlef"><b>Notified to the concerned</b></td>
                    <?php foreach($issuetemp[$ikey]['notify_concern'] as $ky => $issuer) { ?>
                    <td><span><?php echo $issuer; ?></span></td>
                    
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
  
  </body>
</html>
  <script src="/vendors1/jquery/dist/jquery.min.js"></script>
 
<script>
$( document ).ready(function() {
    window.print(); 
	close();
	window.location.href = "/misreports";
});

</script>