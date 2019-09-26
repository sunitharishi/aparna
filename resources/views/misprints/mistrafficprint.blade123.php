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
	.manjeera table tr th 
	{
	padding:15px 5px;
	text-align:center;
	font-size:15.2px;
	vertical-align:middle;
	} 
	.testertwo tr th
	{
	 padding:19px 5px !important;
	 font-size:14.5px !important;
	}
	.testertwo tr td
	{
	 padding:19px 5px !important;
	 font-size:14.5px !important;
	}
	.tester tr th
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
        	<td colspan="<?php echo (int)(count($existsec['sites']) + 2); ?>" style="text-align:center;font-size:15px;padding:5px;"><b>Traffic movement data on avg. per day (One Way)</b></td>
        </tr>
        <tr>
            <th ><b>Particulars</b></th>
            
            <?php  foreach($existsec['sites'] as $skey => $siterec) { ?>
            <th><b> <?php  echo $siterec; ?></b> </th>
            <?php }?>
            <th><b>Total</b></th>
        </tr> 
        <tr>
            <td class="text-left"><b>Residents Vehicle (4 & 2 wheelers)</b></td>
            <?php $resd = 0; foreach($existsec['resident_vehicle'] as $skey => $siterec) { ?>
            <td> <span><?php  echo $siterec;
            $resd = $resd + (float)$siterec;
            ?> </span></td>
            <?php }?>
            <td><span><?php echo $resd; ?></span></td>
        </tr>
        <tr>
            <td class="text-left"><b>Temporary Vendors (persons)</b></td>
            <?php $resdv = 0; foreach($existsec['temp_vendors'] as $skey => $siterecv) { ?>
            <td><span> <?php  echo $siterecv; 
            $resdv = $resdv + (float)$siterecv;
            ?> </span></td>
            <?php }?>
            <td><span><?php echo $resdv; ?></span></td>
        </tr>
        <tr>
            <td class="text-left"><b>Courier / Delivery Boys (Persons)</b></td>
            <?php $resdp = 0; foreach($existsec['courier_delivery'] as $skey => $siterecp) { ?>
            <td><span><?php  echo $siterecp;
            $resdp = $resdp + (float)$siterecp;
            ?> </span></td>
            <?php }?>
            <td><span><?php echo $resdp; ?></span></td>
        </tr>
        <tr>
            <td class="text-left"><b>Visitors</b></td>
            <?php $resdvs = 0; foreach($existsec['visitors'] as $skey => $visit) { ?>
            <td><span> <?php  
            $resdvs = $resdvs + (float)$visit;
            echo $visit; ?> </span></td>
            <?php }?>
            <td><span><?php echo $resdvs; ?></span></td>
        </tr>
        <tr>
            <td class="text-left"><b>Construction Team (persons)</b></td>
            <?php $resdcon = 0; foreach($existsec['construc_team'] as $skey => $siterecons) { ?>
            <td> <span><?php  echo $siterecons;
            $resdcon = $resdcon + (float)$siterecons;
            ?> </span></td>
            <?php }?>
            <td><span><?php echo $resdcon; ?></span></td>
        </tr>
        <tr>
            <td class="text-left"><b>Interior Works in flats/Villas</b></td>
            <?php  $resdins = 0; foreach($existsec['interworks_inflats'] as $skey => $siterecint) { ?>
            <td><span><?php  echo $siterecint;
            $resdins = $resdins + (float)$siterecint;
            ?></span> </td>
            <?php }?>
            <td><span><?php echo $resdins; ?></span></td>
        </tr>
        <tr>
            <td class="text-left"><b>Interior Workers per day</b></td>
            <?php $resdiwr = 0; foreach($existsec['interior_works_per_day'] as $skey => $siterewr) { ?>
            <td><span> <?php  
            $resdiwr = $resdiwr + (float)$siterewr;
            echo $siterewr; ?> </span></td>
            <?php }?>  
            <td><span><?php echo $resdiwr; ?></span></td>
        </tr>
        <tr>  
            <td class="text-left"><b>Total</b></td>
            <?php  $ttres = 0; foreach($existsec['ctotval'] as $skey => $sitett) { ?>
            <td><span> <?php  echo $sitett;
            $ttres = $ttres + (float)$sitett;
            ?> </span></td>
            <?php }?>
            <td><span><?php  echo (float)$resdiwr + (float)$resdins + (float)$resdcon + (float)$resdvs + (float)$resdp + (float)$resdv + (float)$resd;?></span></td>
        </tr>
    </table>
<?php if(isset($pagenumberval)) { if($pagenumberval > 0) {echo "page -".$pagenumberval; } } ?>
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