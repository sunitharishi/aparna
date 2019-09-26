<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MMR Reports</title>
   <style>
   body
	{
	 font-family:Arial, Helvetica, sans-serif;
	}
    table tbody tr td:nth-child(1)
	{
	 text-align:center;
	}
	 table tbody tr td:nth-child(3)
	{
	 text-align:center;
	}
	table tbody tr th
	{
	 padding:12px;
	 font-size:16px;
	}
	table tbody tr td
	{
	 padding:12px;
	 font-size:16px;
	}
   </style>
 

  </head>

  <body class="nav-md">                    
		<div class="">
			<h2 style="text-align:center;font-size:24px;">Index</h2>
			<table width="100%" border="1" cellspacing="0">
				  <tbody>
					    <tr>
							 <th style="text-align:center;"><b>S.No </b></th>
							 <th><b>Description</b> </th>
							 <?php /*?><th style="text-align:center;"><b>Page No.</b> </th><?php */?>
                        </tr>
						<?php 
							$i=0;
							$totalCount = 1;
							$i++;
						?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>Scope of Services</td>
							<?php /*?><td><?php echo $totalCount; $totalCount +=1; ?></td>    <?php */?>              
                       </tr>
					   <?php if($mmrmanpower>0) {  $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>Manpower</td>
							<?php /*?><td><?php  echo $totalCount; $totalCount +=$mmrmanpower; ?></td>    <?php */?>                        
                       </tr>
					   <?php } ?>
						<?php if($mmrsla>0) {  $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>SLA Adherence Report</td>
							<?php /*?><td><?php  echo $totalCount; $totalCount +=$mmrsla; ?></td>    <?php */?>                        
                       </tr>
					   <?php } ?>
						<?php if($omisapnacomplex>0) {  $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>Complaints</td>
							<?php /*?><td><?php  echo $totalCount; $totalCount +=$omisapnacomplex; ?></td>    <?php */?>                        
                       </tr>
					   <?php } ?>
						<?php if($mmrmajor_incidents_Accidents>0) {  $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>Major Incidents/Accidents</td>
							<?php /*?><td><?php  echo $totalCount; $totalCount +=$mmrmajor_incidents_Accidents; ?></td>    <?php */?>                        
                       </tr>
					   <?php } ?>
						<tr>
							<td colspan="2">Technical Services</td>
						</tr>
						<?php if($omisfiresafeequipment>0) {  $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>Fire Safety Equipment Status</td>
							<?php /*?><td><?php  echo $totalCount; $totalCount +=$omisfiresafeequipment; ?></td>    <?php */?>                        
                       </tr>
					   <?php } ?>
						<?php if($mmrnoc>0) {  $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>Fire Safety - NOC</td>
							<?php /*?><td><?php  echo $totalCount; $totalCount +=$mmrnoc; ?></td>    <?php */?>                        
                       </tr>
					   <?php } ?>
						<?php if($omiselectomechanical>0) {  $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>Equipment Status</td>
							<?php /*?><td><?php  echo $totalCount; $totalCount +=$omiselectomechanical; ?></td>    <?php */?>                        
                       </tr>
					   <?php } ?>
						<?php if($omisstpstatus>0) {  $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>STP Status</td>
							<?php /*?><td><?php  echo $totalCount; $totalCount +=$omisstpstatus; ?></td>    <?php */?>                        
                       </tr>
					   <?php } ?>
						<?php if($omiswspstatus>0) {  $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>WSP Status</td>
							<?php /*?><td><?php  echo $totalCount; $totalCount +=$omisstpstatus; ?></td>    <?php */?>                        
                       </tr>
					   <?php } ?>
						<?php if($amctracker>0) {  $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>Warranty / AMC Status</td>
							<?php /*?><td><?php  echo $totalCount; $totalCount +=$amctracker; ?></td>    <?php */?>                        
                       </tr>
					   <?php } ?>
						<?php if($ebpower>0) {  $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>Power Consumption Analysis</td>
							<?php /*?><td><?php  echo $totalCount; $totalCount +=$ebpower; ?></td>    <?php */?>                        
                       </tr>
					   <?php } ?>
						
						<?php if($pfanalysis>0) {  $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>Power Failure Analysis</td>
							<?php /*?><td><?php  echo $totalCount; $totalCount +=$pfanalysis; ?></td>    <?php */?>                        
                       </tr>
					   <?php } ?>
						<?php if($dggenerated>0) {  $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>DG Generated Power (KWH)</td>
							<?php /*?><td><?php  echo $totalCount; $totalCount +=$dggenerated; ?></td>    <?php */?>                        
                       </tr>
					   <?php } ?>
						<?php if($metrowaterconsumtion>0) {  $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>Water Consumption Analysis</td>
							<?php /*?><td><?php  echo $totalCount; $totalCount +=$metrowaterconsumtion; ?></td>    <?php */?>                        
                       </tr>
					   <?php } ?>
						<?php if($ppmvendor>0) {  $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>PPM - Vendor</td>
							<?php /*?><td><?php  echo $totalCount; $totalCount +=$ppmvendor; ?></td>    <?php */?>                        
                       </tr>
					   <?php } ?>
						<?php if($ppminhouse>0) {  $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>PPM - In-house</td>
							<?php /*?><td><?php  echo $totalCount; $totalCount +=$ppminhouse; ?></td>    <?php */?>                        
                       </tr>
					   <?php } ?>
					   <?php if($wspinlet>0 || $wspoutlet>0 || $stpinlet>0 || $stpoutlet>0) {  $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>Water Test Reports </td>
							<?php /*?><td><?php  echo $totalCount; $totalCount +=$wspinlet+$wspoutlet+$stpinlet+$stpoutlet; ?></td>    <?php */?>                        
                       </tr>
					   <?php } ?>
						<tr>
							<td colspan="2">Soft Services</td>
						</tr>
						<?php if($hkcriticalmachinery>0) {  $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>Housekeeping Machinery Status</td>
							<?php /*?><td><?php  echo $totalCount; $totalCount +=$hkcriticalmachinery; ?></td>    <?php */?>                        
                       </tr>
					   <?php } ?>
						<?php if($housekeeping>0) {  $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>Housekeeping Activities</td>
							<?php /*?><td><?php  echo $totalCount; $totalCount +=$housekeeping; ?></td>    <?php */?>                        
                       </tr>
					   <?php } ?>
						<?php if($omishousekeepingdownload>0) {  $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>Housekeeping Consumables</td>
							<?php /*?><td><?php  echo $totalCount; $totalCount +=$omishousekeepingdownload; ?></td>    <?php */?>                        
                       </tr>
					   <?php } ?>
						<?php if($pets>0) {  $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>Pest control Activities</td>
							<?php /*?><td><?php  echo $totalCount; $totalCount +=$pets; ?></td>    <?php */?>                        
                       </tr>
					   <?php } ?>
						<?php if($hocriticalmachinery>0) {  $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>Horticulture Machinery Status</td>
							<?php /*?><td><?php  echo $totalCount; $totalCount +=$hocriticalmachinery; ?></td>    <?php */?>                        
                       </tr>
					   <?php } ?>
						<?php if($horticulture>0) {  $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>Horticulture Activities</td>
							<?php /*?><td><?php  echo $totalCount; $totalCount +=$horticulture; ?></td>    <?php */?>                        
                       </tr>
					   <?php } ?>
					   <?php if($omisreportonhorticulture>0) {  $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>Horticulture Consumables </td>
							<?php /*?><td><?php  echo $totalCount; $totalCount +=$omisreportonhorticulture; ?></td>    <?php */?>                        
                       </tr>
					   <?php } ?>
						<tr>
							<td colspan="2">Security Services</td>
						</tr>
						<?php if($omisdailysecuritydata>0) {  $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>Security report</td>
							<?php /*?><td><?php  echo $totalCount; $totalCount +=$omisdailysecuritydata; ?></td>  <?php */?>        
						</tr>
						<?php } ?>
						<?php if($omistrafficmovement>0) {  $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>Traffic Movement</td>
							<?php /*?><td><?php  echo $totalCount; $totalCount +=$omistrafficmovement;  ?></td>  <?php */?>
						</tr>
						<?php } ?>
						<tr>
							<td colspan="2">General</td>
						</tr>
						<?php if($initiative>0) {  $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>Initiative / Pro-active</td>
							<?php /*?><td><?php  echo $totalCount; $totalCount +=$initiative;  ?></td>  <?php */?>
						</tr>
						<?php } ?>
						<?php if($omisoccupancy_rdetails>0) {  $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>Occupancy Report</td>
							<?php /*?><td><?php  echo $totalCount; $totalCount +=$omisoccupancy_rdetails;  ?></td>  <?php */?>
						</tr>
						<?php } ?>
						<?php if($omisclubhouseutilization>0) {  $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>Club House Usage</td>
							<?php /*?><td><?php  echo $totalCount; $totalCount +=$omisclubhouseutilization; ?></td>  <?php */?>
						</tr>
						<?php } ?>
						<?php if($violation>0) {  $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>Violations</td>
							<?php /*?><td><?php  echo $totalCount; $totalCount +=$violation;  ?></td>  <?php */?>
						</tr>
						<?php } ?>
						<?php if($suggestion>0) {  $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>Suggestions</td>
							<?php /*?><td><?php  echo $totalCount; $totalCount +=$suggestion; ?></td>  <?php */?>
						</tr>
						<?php } ?>
						<?php if($requisitionn>0) {  $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>Indents/Requisitions</td>
							<?php /*?><td><?php  echo $totalCount; $totalCount +=$requisitionn;  ?></td>  <?php */?>
						</tr>
						<?php } ?>
						<?php if($valueadd>0) {  $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>Value Adds</td>
							<?php /*?><td><?php  echo $totalCount; $totalCount +=$valueadd; ?></td>  <?php */?>
						</tr>
						<?php } ?>
						<?php if($events>0) {  $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>Events</td>
							<?php /*?><td><?php  echo $totalCount; $totalCount +=$events;  ?></td>  <?php */?>
						</tr>
						<?php } ?>
						<?php if($omismockdrillprint>0) {  $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>Fire Mock Drill</td>
							<?php /*?><td><?php  echo $totalCount; $totalCount +=$omismockdrillprint;  ?></td>  <?php */?>
						</tr>
						<?php } ?>
						<?php if($omisfireprepareprint>0) {  $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>Fire Safety Drills/Trainings</td>
							<?php /*?><td><?php  echo $totalCount; $totalCount +=$omisfireprepareprint;  ?></td>  <?php */?>
						</tr>
						<?php } ?>
				  </tbody>
			</table>
		</div>
  </body>
</html>