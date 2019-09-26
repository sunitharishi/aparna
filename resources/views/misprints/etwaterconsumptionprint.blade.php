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
	line-height:20px;

	}

	.manjeera table tr td 

	{

	padding:8px 4px;

	text-align:center;

	font-size:14px;

	font-weight:500;
	
	line-height:30px;
	}

	.wattenmore tbody tr th

	{

	 padding:4px 4px !important;
	 
	 

	}

	.wattenmore tbody tr td

	{

	 padding:4px 4px !important;

	}

	.manjeera table tbody tr td:nth-child(2)

	{

	 padding-left:5px;

	}

	.manjeera 

	{

	 font-size:14px;

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

            	<th colspan="14" style="font-size:14px;padding:6px 0px;">Community wise  STP Flush water consumption for the month of <?php echo date("F - Y", strtotime($report_on)); ?></th>

            </tr>

            <tr> 
                        <th rowspan="2">S.No</th>
                        <th rowspan="2">Community </th>
                        <th rowspan="2">Total<br>Units</th>
                        <th rowspan="2">Occupancy<br>(Avg)</th>
                        <th rowspan="2">Garden<br />Area<br />(Acre) </th>
                        <th rowspan="2">Garden<br />Area<br />(sq.m)</th>
                        <th colspan="3">Domestic water consumption per day  (kL)</th>
                        <th  colspan="5">Approx. STP Inflow and Outflow details per day (kL)</th>
                      </tr>
                          
                        <tr>
                         <th>Metro</th>
                         <th>Borewells </th>
                         <th>Tankers</th>
                         <th>STP Inflow</th>
                         <th>Avg. Flush water usage</th>
                         <th>Avg. Garden water Consumption</th>
                         <th>Other Sites usage</th>
                         <th>Excess Treated water outlet</th>
                        </tr>
                             @if (count($sites) > 0) <?php $i = 1; ?>
                        @foreach ($sites as $key => $site)
                        		<?php if($key==9 || $key==15 || $key==11 || $key==8 || $key==5 || $key==14 || $key==7 || $key==12) { ?>
                              <tr>  
                        <td><b><?php echo $i++; ?></b>   </td>   
                        <td style="text-align:left;" class="secondcol"><b><?php  echo $site;   ?></b></td>
                        <td><?php    if(isset($flats[$key])) echo $flats[$key]; ?></td>                        
                        <td><?php if(isset($occupancy[$key])) echo $occupancy[$key]; ?></td>
                        <td><?php if(isset($garea[$key])) echo $garea[$key]; ?></td>
                        <td><?php if(isset($garea[$key])) $f =  round($garea[$key]*4046.86); else $f = ""; echo $f; ?></td>
                         <?php  if( (float)$endoftheday != 0) $m1 = (float)((float)$average[$key]/(float)$endoftheday);
						       if( (float)$endoftheday != 0) $b1 = (float)((float)$boresavg[$key]/(float)$endoftheday);
							   if( (float)$endoftheday != 0) $t1 = (float)((float)$tankdavg[$key]/(float)$endoftheday);
							   if( (float)$endoftheday != 0) $s1 = (float)((float)$inletavg[$key]/(float)$endoftheday);
						?>
                        <td><?php echo  round($m1, 0); ?></td>
                        <td><?php echo  round($b1, 0); ?></td>
                        <td><?php echo  round($t1, 0); ?></td>
                        <td><?php echo  round($s1, 0); ?></td>
                        <td><?php if(isset($ositesfwusage[$key])) echo $ositesfwusage[$key]; else echo 0; ?></td>
                        <td><?php if(isset($ositesgwcon[$key])) echo $ositesgwcon[$key]; else echo 0; ?></td>
                        <td><?php if(isset($ositesothers[$key])) echo $ositesothers[$key]; else echo 0; ?></td>
                        <td><?php if(isset($ositesetwater[$key])) echo $ositesetwater[$key]; else echo 0; ?></td>
                       </tr>
                       
                       <?php } ?>
                           
                           @endforeach
							     
							 @endif
                             
                           
                          
                        </tbody>
                      </table>

<div class="additional-info"> <?php if(isset($additionalinfo)) { if($additionalinfo) echo $additionalinfo; }  ?> </div>

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