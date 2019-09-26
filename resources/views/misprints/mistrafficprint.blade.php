<!DOCTYPE html>

<html lang="en">

  <head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Meta, title, CSS, favicons, etc. -->

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">



    <title>Material Indented Status</title>



    <!-- Bootstrap -->

    <link rel="icon" href="images/ICON.png">

   

    

    <style>

	body

	{

	 font-family:Arial, Helvetica, sans-serif;

	}

	.manjeera table tr:nth-of-type(1) th 

	{

	padding:15px 5px;

	text-align:center;

	font-size:15.2px;

	vertical-align:middle;

	} 

	.testertwo tr:nth-of-type(1) th

	{

	 padding:19px 5px !important;

	 font-size:14.5px !important;

	}

	.testertwo tr td

	{

	 padding:19px 5px !important;

	 font-size:14.5px !important;

	}

	.tester tr:nth-of-type(1) th

	{

	 padding:11px 5px !important;

	 font-size:13px !important;

	}

	.tester, .testertwo

	{

	 border-collapse:collapse;

	}

	.tester tr td

	{

	 padding:11px 5px !important;

	 font-size:13px !important;

	}

	table

	{

	 border-collapse:collapse;

	}

	.manjeera table tr td 

	{

	padding:15px 5px;

	text-align:center;

	font-size:15.2px;

	}

  

	.manjeera table tr td.text-left

	{

	text-align:center;

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
<?php if(count($existsec) > 0) { if($existsec['sites']) { ?>

    <table border="1" width="100%"  <?php if(count($existsec['sites']) > 10) { echo "class='tester'";}?><?php if(count($existsec['sites']) < 5) { echo "class='testertwo'";}?>>
        <tr>
        	<td colspan="<?php echo (int)(count($existsec['sites']) + 2); ?>" style="text-align:center;font-size:14px;padding:6px 0px;">
            	<b>Traffic movement data on avg. per day (One Way)</b>
             </td>
        </tr>
        <tr>
        	<td>
            	Particulars
            </td>
           <?php foreach($existsec['sites'] as $skey => $siterec) { 
		   ?>

           <td><b> <?php  echo $siterec; ?></b> </td>

           <?php }?>
           
            <td ><b>Total</b></td>
        </tr>
        <tr>
        	<td class="text-left col2"><b>Residents Vehicle (4 & 2 wheelers)</b></td>
            <?php
				$rv=array();
				$vtotal = 0; 
				$ftotal=0; 
				$allsitesTotal = array();								
				foreach($existsec['sites'] as $skey => $siterec) 
				{ 
					$sname = strtolower(mb_substr($siterec, 0, 3));
					$sitesTotal = $sname."_total";
					$sitesTotal = 0;
					$allsitesTotal[$skey] = $sitesTotal;
				}
				foreach($resident_vehicle as $skey => $vehicle)
				{ 
					//echo "vehicle".$vehicle."<br/>";
					//echo "numdays".$numdays."<br/>";
				if( (float)$numdays != 0) $vehicle = (float)((float)$vehicle/(float)$numdays);
				$rv[$skey]=$vehicle;
			?>
            <td>
				 <?php 
				 	echo round($vehicle,0);
				 	$k = $vehicle;
					$vtotal = $vtotal + (float)$k;
				?>
            </td>
            <?php  } foreach($allsitesTotal as $skey => $siterec) 
				{ 
					$sname = strtolower(mb_substr($siterec, 0, 3));
					$sitesTotal = $sname."_total";
					$sitesTotal = (float)$siterec + (float)$rv[$skey];
					$allsitesTotal[$skey] = $sitesTotal;
				} ?>
            <td><span><?php echo round($vtotal,0); ?></span></td>
        </tr>
        <tr>
        	<td class="text-left col2"><b>Temporary Vendors (persons)</b></td>
            <?php
				$resd=0;
				foreach($temp_vendors as $skey => $siterec)
				{ 
				if( (float)$numdays != 0) $siterec = (float)((float)$siterec/(float)$numdays);
				$rv[$skey]=$siterec;
			?>
            <td>
				 <?php 
				 	echo round($siterec,0);
				 	$k = $siterec;
					$resd = $resd + (float)$k;
				?>
            </td>
            <?php }
				foreach($allsitesTotal as $skey => $siterec) 
				{ 
					$sname = strtolower(mb_substr($siterec, 0, 3));
					$sitesTotal = $sname."_total";
					$sitesTotal = (float)$siterec + (float)$rv[$skey];
					$allsitesTotal[$skey] = $sitesTotal;
				} 
			?>
            <td><span><?php echo round($resd,0); ?></span></td>
        </tr>
        <tr>
        	<td class="text-left col2"><b>Courier / Delivery Boys (Persons)</b></td>
            <?php
				$cdtotal=0;
				foreach($courier_delivery as $skey => $cdelivery)
				{ 
				if( (float)$numdays != 0) $cdelivery = (float)((float)$cdelivery/(float)$numdays);
				$rv[$skey]=$cdelivery;
			?>
            <td>
				 <?php 
				 	echo round($cdelivery,0);
				 	$k = $cdelivery;
					$cdtotal = $cdtotal + (float)$k;
				?>
            </td>
            <?php } foreach($allsitesTotal as $skey => $siterec) 
			{ 
				$sname = strtolower(mb_substr($siterec, 0, 3));
				$sitesTotal = $sname."_total";
				$sitesTotal = (float)$siterec + (float)$rv[$skey];
				$allsitesTotal[$skey] = $sitesTotal;
			}?>
            <td><span><?php echo round($cdtotal,0); ?></span></td>
        </tr>
        <tr>
        	<td class="text-left col2"><b>Visitors</b></td>
            <?php
				$vcount = 0; 
				foreach($visitors as $skey => $vehicle)
				{ 
				if( (float)$numdays != 0) $visitor = (float)((float)$vehicle/(float)$numdays);
				$rv[$skey]=$visitor;
			?>
            <td>
				 <?php 
				 	echo round($visitor,0);
				 	$k = $visitor;
					$vcount = $vcount + (float)$k;
				?>
            </td>
            <?php } foreach($allsitesTotal as $skey => $siterec) 
			{ 
				$sname = strtolower(mb_substr($siterec, 0, 3));
				$sitesTotal = $sname."_total";
				$sitesTotal = (float)$siterec + (float)$rv[$skey];
				$allsitesTotal[$skey] = $sitesTotal;
			}?>
            <td><span><?php echo round($vcount,0); ?></span></td>
        </tr>
        <tr>
        	<td class="text-left col2"><b>Construction Team (persons)</b></td>
            <?php
				$ctcount=0;
				foreach($construc_team as $skey => $cteam)
				{ 
				if( (float)$numdays != 0) $cteam = (float)((float)$cteam/(float)$numdays);
				$rv[$skey]=$cteam;
			?>
            <td>
				 <?php 
				 	echo round($cteam,0);
				 	$k = $cteam;
					$ctcount = $ctcount + (float)$k;
				?>
            </td>
            <?php } foreach($allsitesTotal as $skey => $siterec) 
									{ 
										$sname = strtolower(mb_substr($siterec, 0, 3));
										$sitesTotal = $sname."_total";
										$sitesTotal = (float)$siterec + (float)$rv[$skey];
										$allsitesTotal[$skey] = $sitesTotal;
									}?>
            <td><span><?php echo round($ctcount,0); ?></span></td>
        </tr>
        <tr>
        	<td class="text-left col2"><b>Interior Works in flats/Villas</b></td>
           <?php
				$icount = 0; 
				foreach($interworks_inflats as $skey => $inflats)
				{ 
				if( (float)$numdays != 0) $inflats = (float)((float)$inflats/(float)$numdays);
				$rv[$skey]=$inflats;
			?>
            <td>
				 <?php 
				 	echo round($inflats,0);
				 	$k = $inflats;
					$icount = $icount + (float)$k;
				?>
            </td>
            <?php } foreach($allsitesTotal as $skey => $siterec) 
									{ 
										$sname = strtolower(mb_substr($siterec, 0, 3));
										$sitesTotal = $sname."_total";
										$sitesTotal = (float)$siterec + (float)$rv[$skey];
										$allsitesTotal[$skey] = $sitesTotal;
									}?>
            <td><span><?php echo round($icount,0); ?></span></td>
        </tr>
        <tr>
        	<td class="text-left col2"><b>Interior Workers per day</b></td>
            <?php
				$wcount = 0; 
				foreach($interior_works_per_day as $skey => $works)
				{ 
				if( (float)$numdays != 0) $works = (float)((float)$works/(float)$numdays);
				$rv[$skey]=$works;
			?>
            <td>
				 <?php 
				 	echo round($works,0);
				 	$k = $works;
					$wcount = $wcount + (float)$k;
				?>
            </td>
            <?php } $overall_total=0; foreach($allsitesTotal as $skey => $siterec) 
									{ 
										$sname = strtolower(mb_substr($siterec, 0, 3));
										$sitesTotal = $sname."_total";
										$sitesTotal = (float)$siterec + (float)$rv[$skey];
										$allsitesTotal[$skey] = $sitesTotal;
									} foreach($allsitesTotal as $skey => $siterec) 
										{ 
											//echo $overall_total."<br/>";
											$siterec = round($siterec,0);
											//echo (float)$siterec."<br/>";
											$overall_total = $overall_total+(float)$siterec;
											//echo (float)$overall_total."<br/>";
										}?>
            <td><span><?php echo round($wcount,0); ?></span></td>
        </tr>
        <tr>
        	<td>
            	Total
            </td>
             <?php foreach($allsitesTotal as $skey => $siterec) { ?>
            <td>
            	 <span><?php echo round($siterec,0);?></span>
            </td>
            <?php } ?>
            <td><span><?php echo round($overall_total,0); ?></span></td>
        </tr>
	</table>

<?php  if(isset($pagenumberval)) { if($pagenumberval > 0) {echo "page -".$pagenumberval; } } ?>

<?php }} else { echo "No Data available";}?>



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