<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
     <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Manjeera Water</title>

    <style>
	*
	{
	font-family:Arial, Helvetica, sans-serif;
	}
	table 
	{
	color:#000000;
	margin-top:0px !important;
	padding-top:0px !important;
	}
	
	.leapyear  tr th 
	{
	padding:5px 2px !important;
 	}
	.leapyear  tr td 
	{
	padding:5px 2px !important;
 	}
	.advancedcls  tr th 
	{
	padding:5px 2px !important;
 	}
	.advancedcls  tr td 
	{
	padding:5px 2px !important;
 	}
	.manjeera table tr th 
	{
	padding:4px 2px;
	text-align:center;
	color:#000000;
	font-size:11px;
	font-weight:600;
	vertical-align:middle;
 	}
	.manjeera table tr td 
	{
	padding:4px 2px;
	text-align:center;
	color:#000000;
	font-size:11px;
	}
	.manjeera table tr th p, table tr th p
	{
	 white-space:nowrap;
	 word-break:normal;
	 margin-top:0px;
	 margin-bottom:0px;
	}

	@media print {

    html, body {
	color:#000000;
      height:100vh; 
      margin: 0 !important; 
      padding: 0 !important;
      overflow: hidden;
     }

}
  
 @supports (-moz-appearance:none) {
       line-height:1;
    }

	</style>
  </head>

<body>
    <div class="row">
        <div class="manjeera">
            <table width="100%" border="1" cellspacing="0"  <?php if(count($sitearr['dateres']) == 28) {  echo "class='leapyear'"; } if(count($sitearr['dateres']) > 28) {  echo "class='notleapyear'"; } if(count($sitearr['dateres']) < 23 || count($sitearr['dateres']) > 21) {  echo "class='advancedcls'";}?>>
                <tbody>
                    <tr>
                        <th colspan="<?php echo count($sitearr['community']) + 14 ?>" style="font-size:15px;">Ride on sweeping machine details from  <?php echo $reportfrom_on." to ".$report_on; ?> </th>
                    </tr> 
					<tr>
						<td  rowspan="2">
							Date
						</td>
						<td rowspan="2">
							Total Sweeping Area (sft.)
						</td>
						<td colspan="8">
							Ride on Sweeping Machine
						</td>
						<td colspan="2">
							Battery
						</td>
						<td  rowspan="2">
							Reason for Not working
						</td>
						<td  rowspan="2">
							Total Down time (Hrs/Days)
						</td>
						<td  rowspan="2">
							Remarks
						</td>
					</tr>
					<tr>						
						<td>
							Total
						</td>
						<td>
							N/W
						</td>
                        <td>
							Location
						</td>
						<td>
							Total Running Hours Per Month
						</td>
						<td>
							Avg. Running Hours Per Day
						</td>
						<td>
							Total Sweeping Area Covered per Month(Sft.)
						</td>
						<td>
							Avg Sweeping Area covered per Day (Sft.)
						</td>
						<td>
							Avg Sweeping Area covered per Hour (Sft.)
						</td>						
                        <td>
							Total
						</td>
						<td>
							N/W
						</td>
					</tr>
					<?php $i= 1; 
					
						
					foreach($sitearr['dateres'] as $dateke => $datevalue) {
					?>
                    <tr>
                        <?php /*?><?php  if($i == 1) { ?>  <th rowspan="<?php echo count($sitearr['dateres']); ?>"><img src="images/date.png" ></th> <?php } ?><?php */?>
                        <th>
							<p>
							<?php
								$i = $i + 1;
								echo date('d-m-Y', strtotime($dateke)); ?>
							</p>
						</th>
						<?php foreach($datevalue as $val) { ?>   
						<td><?php echo $val['rsweeping_area']; ?> </td>
						<?php } 
						?>
						<?php foreach($datevalue as $val) { ?>   
						<td><?php echo $val['rideontotal']; ?> </td>
						<?php } 
						?>
						<?php foreach($datevalue as $val) { ?>   
						<td><?php echo $val['ride_nw']; ?> </td>
						<?php } 
						?>
                        <?php foreach($datevalue as $val) { ?>   
						<td><?php echo $val['housekp_location']; ?> </td>
						<?php } 
						?>
						<?php foreach($datevalue as $val) { ?>   
						<td><?php echo $val['ride_nw']; ?> </td>
						<?php } 
						?>
						<?php foreach($datevalue as $val) { ?>   
						<td><?php echo $val['ride_nw']; ?> </td>
						<?php } 
						?>
						<?php foreach($datevalue as $val) { ?>   
						<td><?php echo $val['ride_nw']; ?> </td>
						<?php } 
						?>
						<?php foreach($datevalue as $val) { ?>   
						<td><?php echo $val['ride_acovered']; ?> </td>
						<?php } 
						?>
						<?php foreach($datevalue as $val) { ?>   
						<td><?php echo round($val['ride_acovered']/24,2); ?> </td>
						<?php } 
						?>
						<?php foreach($datevalue as $val) { ?>   
						<td><?php echo $val['ride_nw']; ?> </td>
						<?php } 
						?>
						<?php foreach($datevalue as $val) { ?>   
						<td><?php echo $val['ride_btotal']; ?> </td>
						<?php } 
						?>
						<?php foreach($datevalue as $val) { ?>   
						<td><?php echo $val['ride_bnw']; ?> </td>
						<?php } 
						?>
						<?php foreach($datevalue as $val) { ?>   
						<td><?php echo $val['ride_nw']; ?> </td>
						<?php } 
						?>
						<?php foreach($datevalue as $val) { ?>   
						<td><?php echo $val['ride_nw']; ?> </td>
						<?php } 
						?>
                    </tr>
                    <?php  } ?>
                   <?php /*?> <tr>
                        <th><span>Community</span></th>
                        <?php foreach($sitearr['community'] as $community) {?>
                        <td><b><?php echo  $community;?></b></td>
                        <?php 	}?>
                    <tr>
                        <th colspan="3"><span>Total Sweeping Area (sft.)</span></th>
                        <?php foreach($sitearr['concentrated'] as $cont => $contval) { ?>
                        <td><b><?php echo $contval; ?></b></td> 
                        <?php } ?>
                    </tr>
					 <tr>
                        <th colspan="3"><span>Total</span></th>
                        <?php foreach($sitearr['concentrated'] as $cont => $contval) { ?>
                        <td><b><?php echo $contval; ?></b></td> 
                        <?php } ?>
                    </tr>
					<tr>
                        <th colspan="3"><span>N/W</span></th>
                        <?php foreach($sitearr['concentrated'] as $cont => $contval) { ?>
                        <td><b><?php echo $contval; ?></b></td> 
                        <?php } ?>
                    </tr>
					<tr>
                        <th colspan="3"><span>Total Running Hours Per Month</span></th>
                        <?php foreach($sitearr['concentrated'] as $cont => $contval) { ?>
                        <td><b><?php echo $contval; ?></b></td> 
                        <?php } ?>
                    </tr>
					<tr>
                        <th colspan="3"><span>Avg. Running Hours Per Day</span></th>
                        <?php foreach($sitearr['concentrated'] as $cont => $contval) { ?>
                        <td><b><?php echo $contval; ?></b></td> 
                        <?php } ?>
                    </tr>
					<tr>
                        <th colspan="3"><span>Total Sweeping Area Covered per Month(Sft.)</span></th>
                        <?php foreach($sitearr['concentrated'] as $cont => $contval) { ?>
                        <td><b><?php echo $contval; ?></b></td> 
                        <?php } ?>
                    </tr>
					<tr>
                        <th colspan="3"><span>Avg Sweeping Area covered per Day (Sft.)</span></th>
                        <?php foreach($sitearr['concentrated'] as $cont => $contval) { ?>
                        <td><b><?php echo $contval; ?></b></td> 
                        <?php } ?>
                    </tr>
					<tr>
                        <th colspan="3"><span>Avg Sweeping Area covered per Day (Sft.)</span></th>
                        <?php foreach($sitearr['concentrated'] as $cont => $contval) { ?>
                        <td><b><?php echo $contval; ?></b></td> 
                        <?php } ?>
                    </tr>
					<tr>
                        <th colspan="3"><span>Total</span></th>
                        <?php foreach($sitearr['concentrated'] as $cont => $contval) { ?>
                        <td><b><?php echo $contval; ?></b></td> 
                        <?php } ?>
                    </tr>
					<tr>
                        <th colspan="3"><span>N/W</span></th>
                        <?php foreach($sitearr['concentrated'] as $cont => $contval) { ?>
                        <td><b><?php echo $contval; ?></b></td> 
                        <?php } ?>
                    </tr>
					<tr>
                        <th colspan="3"><span>Reason for Not working</span></th>
                        <?php foreach($sitearr['concentrated'] as $cont => $contval) { ?>
                        <td><b><?php echo $contval; ?></b></td> 
                        <?php } ?>
                    </tr>
					<tr>
                        <th colspan="3"><span>Total Down time (Hrs/Days)</span></th>
                        <?php foreach($sitearr['concentrated'] as $cont => $contval) { ?>
                        <td><b><?php echo $contval; ?></b></td> 
                        <?php } ?>
                    </tr>
					<tr>
                        <th colspan="3"><span>Remarks</span></th>
                        <?php foreach($sitearr['concentrated'] as $cont => $contval) { ?>
                        <td><b><?php echo $contval; ?></b></td> 
                        <?php } ?>
                    </tr>
                        
                    <tr>
                        <th colspan="3"><span>Avg per day	</span></th>
                        <?php foreach($sitearr['average'] as $avgke => $avgval) { ?>
                        <td><?php echo round(((float)$avgval/count($sitearr['dateres']))); ?></td>
                        <?php } ?>  
                    </tr>
                    <tr>
                        <th colspan="3"><span>% on contracted<br> per day</span></th>
                        <?php foreach($sitearr['persent'] as $perke => $perval) { ?>
                        <td><?php echo round($perval); ?></td>
                        <?php } ?>  
                    </tr><?php */?>
                </tbody>
            </table>
            <div class="additional-info"> <?php if(isset($additionalinfo)) { if($additionalinfo) echo $additionalinfo; }  ?> </div>
        </div>
    </div>
</body>
</html>
  
 
