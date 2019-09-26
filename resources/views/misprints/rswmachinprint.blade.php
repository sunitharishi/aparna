<!DOCTYPE html>

<html lang="en">

  <head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Meta, title, CSS, favicons, etc. -->

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">



    <title>Community Wise Water print</title>



    <!-- Bootstrap -->

    <link rel="icon" href="images/ICON.png">

   

    <style>

	body

	{

	 font-family:Arial, Helvetica, sans-serif;

	}

	.manjeera table tr th 

	{

	padding:4.9px 4px;

	text-align:center;

	font-size:12px;

	vertical-align:middle;

	}

	.manjeera table tr td 

	{

	padding:4.9px 4px;

	text-align:center;

	font-size:12px;

	font-weight:500;
	 line-height:14px !important;

	}

	.wattenmore tbody tr th

	{

	 padding:4px 4px !important;

	}

	.wattenmore tbody tr td

	{

	 padding:4px 4px !important;
	 line-height:14px !important;

	}

	.manjeera table tbody tr td:nth-child(2)

	{

	 padding-left:5px;

	}

	.manjeera 

	{

	 font-size:12px;

	}

	.additional-info p
	{ 
		font-family:Arial, Helvetica, sans-serif !important;
		font-size:12px !important;
		line-height:13px !important;
	}

	table tr td.sarlef

	{

	text-align:left;

	} 

	.manjeera p

	{

	margin-bottom:5px;

	}

	.additional-info p

	{

	 margin:1px;

	}

	table

	{

	/*border:1px solid black;*/

	color:black;

	}



	@media print {



    html, body {

      height:100vh; 

      margin: 0 !important; 

      padding: 0 !important;

      overflow: hidden;

    }



}

	</style>

  </head>



<body>               

<div class="manjeera">

    <table width="100%" border="1" cellspacing="0" <?php if(count($sites) == 10) { echo 'class="watten"';} ?><?php if(count($sites) > 10) { echo 'class="wattenmore"';} ?>>

        <tbody>

            <tr>

            	<th colspan="15" style="font-size:14px;padding:6px 0px;">Ride on sweeping machine report for the month of  <?php echo date("F - Y", strtotime($report_on)); ?></th>

            </tr>

            <tr> 

                <th>S.No</th>

                <th>Community </th>

                <th>Total Sweeping Area (sft.)</th>

                <th>Total</th>

                <th>N/W</th>

                <th>Total Running Hours Per Month</th>

                <th>Avg. Running Hours Per Day</th>

                <th>Avg Machine Running per Hour</th>

                <th>Avg Sweeping Area covered per Day (Sft.)</th>

                <th>Avg Sweeping Area covered per Hour (Sft.)</th>

                <th>Total</th>

                <th>N/W</th>

                <th>Reason for Not working</th>

                <th>Total Down time (Hrs/Days)</th>

                <th>Remarks</th>

            </tr>        

            @if (count($sites) > 0) <?php $i = 1; ?>

            @foreach ($sites as $key => $site)

            	<?php
					
					if(isset($hRhrs[$key])) 
					{ 
						$avg_mrpd = $hRhrs[$key]/$cur_mn_days;
						$avg_mrph = $avg_mrpd/24;
					}
					else 
					{ 
						$avg_mrpd = 0;
						$avg_mrph = 0;
					}
					
					if(isset($rideArea[$key])) 
					{ 
						$avg_smrpd = $rideArea[$key]/$cur_mn_days;
						$avg_smrph = $avg_smrpd/24;
					}
					else 
					{ 
						$avg_smrpd = 0;
						$avg_smrph = 0;
					}
				?>

            <tr>  

                <td><b><?php echo $i++; ?></b>   </td>   

                <td style="text-align:left;"><b><?php  echo $site;   ?></b></td>
				
				<td><b> <?php if(isset($rideArea[$key])) echo $rideArea[$key]; else echo "0"; ?></b></td>

                <td><b> <?php if(isset($rmachine_total[$key])) echo $rmachine_total[$key]; else echo "0"; ?></b></td> 
				
				<td><b> <?php if(isset($rideNw[$key])) echo $rideNw[$key]; else echo "0"; ?></b></td>
				
				<td><b> <?php if(isset($hRhrs[$key])) echo $hRhrs[$key]; else echo "0"; ?></b></td>

                

                <td><?php echo number_format($avg_mrpd,2); ?></td>

                <td><?php echo number_format($avg_mrph,2); ?></td> 

                <td><?php echo number_format($avg_smrpd,2); ?></td>

                <td><?php echo number_format($avg_smrph,2); ?></td>

                <td><b> <?php if(isset($battery_total[$key])) echo $battery_total[$key]; else echo "0"; ?></b></td> 
				
				<td><b> <?php if(isset($batterNw[$key])) echo $batterNw[$key]; else echo "0"; ?></b></td>

                <td>&nbsp;</td>

                <td>&nbsp;</td>

                <td>&nbsp;</td>

            </tr>

        @endforeach

        @endif

    </tbody>

    </table>

<div class="additional-info" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:13px;"> <?php if(isset($additionalinfo)) { if($additionalinfo) echo $additionalinfo; }  ?> </div>

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