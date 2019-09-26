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

            	<th colspan="16" style="font-size:14px;padding:6px 0px;">Community Wise Water Source & Consumption for the month of <?php echo date("F - Y", strtotime($report_on)); ?></th>

            </tr>

            <tr> 

                <th rowspan="3">S.No</th>

                <th rowspan="3">Community </th>

                <th rowspan="3">Total<br> Units </th>

                <th rowspan="3">Occupancy<br> (Avg) </th>

                <th colspan="2" rowspan="2">Borewells</th>

                <th colspan="2">Metro Water</th>

                <th  colspan="8">Consumption in KL</th>

            </tr>

            

            <tr>

                <th  rowspan="2">Contracted <br>Qty <br>(KL)</th>

                <th  rowspan="2">Water <br>supplied: %<br> on<br>contracted <br>quantity</th>

                <th colspan="2">Metro </th>

                <th  colspan="2" >Borewells</th>

                <th colspan="2">Tankers</th>

                <th colspan="2">Total</th>

            </tr>

            

            <tr>

                <th >Total </th>

                <th >No.of<br> bores: Not <br>Working</th>

                <th>Avg per<br> day  (Kl)</th>

                <th>% on total <br>consumption</th>

                <th>Avg per<br>day(kl)</th>

                <th>% on total <br>consumption</th>

                <th>Avg per<br>day(kl)</th>

                <th>% on total <br>consumption</th>

                <th>Avg Water <br>consumption per <br>day(kl)</th>

                <th>Avg Water <br>consumption per unit <br>per day(kl)</th>

            </tr>

        

            @if (count($sites) > 0) <?php $i = 1; ?>

            @foreach ($sites as $key => $site)

            

            <tr>  

                <td><b><?php echo $i++; ?></b>   </td>   

                <td style="text-align:left;"><b><?php  echo $site;   ?></b></td>

                <td><b> <?php    if(isset($flats[$key])) echo $flats[$key]; ?></b></td> 

                <td><span><?php if(isset($occupancy[$key])) echo $occupancy[$key]; ?></span> </td>

                <td><span><?php if(isset($borewellsnum[$key])) echo $borewellsnum[$key]; ?></span> </td>

                <td><span><?php  if(isset($nwbrwnum[$key]))echo $nwbrwnum[$key]; ?></span></td> 

                <td><span><?php  if(isset($concentrated[$key])) echo $concentrated[$key]; else echo "-"; ?></span></td>

                <?php  if( (float)$endoftheday != 0) $m1 = (float)((float)$average[$key]/(float)$endoftheday);

                if( (float)$endoftheday != 0) $b1 = (float)((float)$boresavg[$key]/(float)$endoftheday);

                if( (float)$endoftheday != 0) $t1 = (float)((float)$tankdavg[$key]/(float)$endoftheday);

                ?>

                <td> <b><?php if(isset($concentrated[$key])) { if((float)$concentrated[$key] != 0) echo round((($m1 * 100)/(float)$concentrated[$key]) , 0); else echo "-"; }?></b></td>

                <td><span><?php echo  round($m1, 0); ?></span></td>

                <td><span><?php  if((float)($m1 + $b1 + $t1) >0) echo round(((float)($m1 * 100)/($m1 + $b1 + $t1)), 0); else echo "0";  ?></span> </td>

                <td><span><?php echo round($b1, 0); ?></span></td>

                <td><span><?php  if((float)($m1 + $b1 + $t1) >0) echo round(((float)($b1 * 100)/($m1 + $b1 + $t1)), 0);  else echo "0";  ?></span></td>

                <td><span><?php echo round($t1,0); ?></span></td>

                <td><span><?php  if((float)($m1 + $b1 + $t1) >0) echo round(((float)($t1 * 100)/($m1 + $b1 + $t1)), 0);  else echo "0"; ?></span></td>

                <td><span><?php echo round(((float)($m1 + $b1 + $t1)),0);  ?></span></td>

                <td><span><?php if(isset($occupancy[$key])) { if($occupancy[$key] > 0) {$xv = ($m1 + $b1 + $t1)/$occupancy[$key]; 

				//echo round($xv,2);

				echo number_format((float)$xv, 2, '.', '');

				} } //  round((($m1 + $b1 + $t1)/ $flats[$key]), 2);?></span></td>

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