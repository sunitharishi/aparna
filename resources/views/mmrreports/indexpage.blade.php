<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Mis Reports</title>
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
							$totalCount = 0;
							if($Metro_Water_Report>0) { $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>Metro Water Report</td>
							<?php /*?><td><?php echo $Metro_Water_Report; $totalCount += $Metro_Water_Report; ?></td>   <?php */?>                    
                       </tr>
					   <?php } ?>
					   <?php if($Water_Source_and_Consumption>0) {  $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>Water Source and Consumption</td>
							<?php /*?><td><?php $totalCount +=$Water_Source_and_Consumption; echo $totalCount; ?></td>        <?php */?>               
                       </tr>
					   <?php } ?>
					   <?php if($Borewells_Not_Working_Status>0) {  $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>Borewells Not Working Status</td>
							<?php /*?><td><?php $totalCount +=$Borewells_Not_Working_Status; echo $totalCount; ?></td>    <?php */?>                   
                       </tr>
					   <?php } ?>
					   <?php if($Fire_Safety_Status>0) {  $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>Fire Safety Status</td>
							<?php /*?><td>
								<?php 
									if($Fire_Safety_Status>1) echo ($totalCount + 1)." - ".($totalCount + $Fire_Safety_Status) ; 
									else echo $totalCount + $Fire_Safety_Status; 
									$totalCount +=$Fire_Safety_Status; 
								?>
							</td> <?php */?>                      
                       </tr>
					   <?php } ?>
					   <?php if($Electro_Mechanical_Equipment_Status>0) {  $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>Electro Mechanical Equipment Status</td>
							<?php /*?><td>
								<?php 
									if($Electro_Mechanical_Equipment_Status>1) echo ($totalCount + 1)." - ".($totalCount + $Electro_Mechanical_Equipment_Status) ; 
									else echo $totalCount + $Electro_Mechanical_Equipment_Status; 
									$totalCount +=$Electro_Mechanical_Equipment_Status; 
								?>
							</td><?php */?>                       
                       </tr>
					   <?php } ?>
					   <?php if($STP_Status>0) {  $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>STP Status</td>
							<?php /*?><td>
								<?php 
									if($STP_Status>1) echo ($totalCount + 1)." - ".($totalCount + $STP_Status) ; 
									else echo $totalCount + $STP_Status; 
									$totalCount +=$STP_Status; 
								?>
							</td> <?php */?>                      
                       </tr>
					   <?php } ?>
					   <?php if($WSP_Status>0) {  $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>WSP Status</td>
							<?php /*?><td>
								<?php 
									if($WSP_Status>1) echo ($totalCount + 1)." - ".($totalCount + $WSP_Status) ; 
									else echo $totalCount + $WSP_Status; 
									$totalCount +=$WSP_Status; 
								?>
							</td> <?php */?>                      
                       </tr>
					   <?php } ?>
					   <?php if($CMD_vs_RMD>0) {  $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>CMD vs RMD</td>
							<?php /*?><td>
								<?php 
									if($CMD_vs_RMD>1) echo ($totalCount + 1)." - ".($totalCount + $CMD_vs_RMD) ; 
									else echo $totalCount + $CMD_vs_RMD; 
									$totalCount +=$CMD_vs_RMD; 
								?>
							</td>  <?php */?>                     
                       </tr>
					   <?php } ?>
					   <?php if($Security_Report>0) {  $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>Security Report</td>
							<?php /*?><td>
								<?php 
									if($Security_Report>1) echo ($totalCount + 1)." - ".($totalCount + $Security_Report) ; 
									else echo $totalCount + $Security_Report; 
									$totalCount +=$Security_Report; 
								?>
							</td> <?php */?>                      
                       </tr>
					   <?php } ?>
					   <?php if($Traffic_Movement>0) {  $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>Traffic Movement</td>
							<?php /*?><td>
								<?php 
									if($Traffic_Movement>1) echo ($totalCount + 1)." - ".($totalCount + $Traffic_Movement) ; 
									else echo $totalCount + $Traffic_Movement; 
									$totalCount +=$Traffic_Movement; 
								?>
							</td> <?php */?>                      
                       </tr>
					   <?php } ?>
					   <?php if($Housekeeping_Report>0) {  $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>Housekeeping Report</td>
							<?php /*?><td>
								<?php 
									if($Housekeeping_Report>1) echo ($totalCount + 1)." - ".($totalCount + $Housekeeping_Report) ; 
									else echo $totalCount + $Housekeeping_Report; 
									$totalCount +=$Housekeeping_Report; 
								?>
							</td> <?php */?>                      
                       </tr>
					   <?php } ?>
					   <?php if($Horticulture_Report>0) {  $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>Horticulture Report</td>
							<?php /*?><td>
								<?php 
									if($Horticulture_Report>1) echo ($totalCount + 1)." - ".($totalCount + $Horticulture_Report) ; 
									else echo $totalCount + $Horticulture_Report; 
									$totalCount +=$Horticulture_Report; 
								?>
							</td> <?php */?>                      
                       </tr>
					   <?php } ?>
					   <?php if($Club_House_Utilization_Data>0) {   $i++;?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>Club House Utilization Data</td>
							<?php /*?><td>
								<?php 
									if($Club_House_Utilization_Data>1) echo ($totalCount + 1)." - ".($totalCount + $Club_House_Utilization_Data) ; 
									else echo $totalCount + $Club_House_Utilization_Data; 
									$totalCount +=$Club_House_Utilization_Data; 
								?>
							</td><?php */?>                       
                       </tr>
					   <?php } ?>
					   <?php if($Occupancy_Data>0) {  $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>Occupancy Data</td>
							<?php /*?><td>
								<?php 
									if($Occupancy_Data>1) echo ($totalCount + 1)." - ".($totalCount + $Occupancy_Data) ; 
									else echo $totalCount + $Occupancy_Data; 
									$totalCount +=$Occupancy_Data; 
								?>
							</td> <?php */?>                      
                       </tr>
					   <?php } ?>
					   <?php if($Indented_Material_Status>0) {  $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>Indented Material Status</td>
							<?php /*?><td>
								<?php 
									if($Indented_Material_Status>1) echo ($totalCount + 1)." - ".($totalCount + $Indented_Material_Status) ; 
									else echo $totalCount + $Indented_Material_Status; 
									$totalCount +=$Indented_Material_Status; 
								?>
							</td> <?php */?>                      
                       </tr>
					   <?php } ?>
					   <?php if($Apna_Complex_Complaint>0) { $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>Apna Complex Complaint Report</td>
							<?php /*?><td>
								<?php 
									if($Apna_Complex_Complaint>1) echo ($totalCount + 1)." - ".($totalCount + $Apna_Complex_Complaint) ; 
									else echo $totalCount + $Apna_Complex_Complaint; 
									$totalCount +=$Apna_Complex_Complaint; 
								?>
							</td>  <?php */?>                     
                       </tr>
					   <?php } ?>
					   <?php if($Mismockdrillprint>0) { $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>Fire Mock Drill</td>
							<?php /*?><td>
								<?php 
									if($Mismockdrillprint>1) echo ($totalCount + 1)." - ".($totalCount + $Mismockdrillprint) ; 
									else echo $totalCount + $Mismockdrillprint; 
									$totalCount +=$Mismockdrillprint; 
								?>
							</td> <?php */?>                      
                       </tr>
					   <?php } ?>
					   <?php if($Fire_Safety_Preparedness>0) {  $i++; ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>Fire Safety Preparedness & Fire Alarm Operation Training</td>
							<?php /*?><td>
								<?php 
									if($Fire_Safety_Preparedness>1) echo ($totalCount + 1)." - ".($totalCount + $Fire_Safety_Preparedness) ; 
									else echo $totalCount + $Fire_Safety_Preparedness; 
								?>
							</td><?php */?>                       
                       </tr>
					   <?php } ?>
				  </tbody>
			</table>
		</div>
  </body>
</html>