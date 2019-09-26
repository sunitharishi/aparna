<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Report on House keeping</title>

    <!-- Bootstrap -->
    <link rel="icon" href="images/ICON.png">
   
     <style>
	*
	{
	   font-family:Arial, Helvetica, sans-serif;
		
		background:none;
		background:transparent;
	}
	.manjeera table tr th 
	{
	padding:2px;
	text-align:center;
	font-size:11px;
	vertical-align:middle;
	}
	.manjeera table tr td 
	{
	padding:2px;
	text-align:center;
	font-size:11px;
	}
	.manjeera table tbody tr td:nth-child(2)
	{
	 padding-left:5px;
	}
	.manjeera table tr td.roller-coahcer
	{
	 height:70px;
	}
	.moreright tbody tr td.roller-coahcer
	{
	 height:30px !important;
	}
	.manjeera
	{
	font-size:11px;
	}
	
	.secuhr hr
	{
	border-color:gray;
	margin:0px 20px;
	}
	
	
	/*.manjeera span 
	{
	color:black;
	}*/
	</style>
   
  </head>

  <body>
   
<div class="docs-main manjeera" >

    <table width="100%" border="1" cellspacing="0" <?php if(count($sites) > 8) {echo 'class="moreright"';} ?>>
        <tbody>
            <tr>
            	<th colspan="19" style="font-size:14px;padding:6px 0px;">Report on House keeping </th>
            </tr>
            <tr>
                <th rowspan="3">S.No</th>
                <th rowspan="3" style="padding-left:5px;">Community </th>
                <th rowspan="3">No.Of Units </th>
                <th rowspan="2" colspan="2">Man Power including CH </th>
                <th   rowspan="3">Garbage disposal</th>
                <th colspan="5">Average Monthly Consumption</th>
                <th  rowspan="3">Debris trips Ave / day</th>
                <th  colspan="7" >Daily and periodical cleanings</th>
            </tr>
            
            <tr>
            
                <th colspan="2" >Brooms (Nos.) </th>
                <th colspan="2">Cleaners (ltr)</th>
                <th rowspan="2" >Freshner</th>
                <th rowspan="2">Corridors Sweeping and mopping</th>
                <th rowspan="2">Corridor  deep cleaning / water wash</th>
                <th rowspan="2">Staircase cleaning  </th>
                <th rowspan="2">Cellar & Sub cellar cleaning </th>
                <th rowspan="2">Cellar and sub cellar  deep cleaning / water wash </th>
                <th rowspan="2">Cob webs removal </th>
                <th rowspan="2"> Road Sweeping and Cleaning (Villas)  </th>   
            </tr>
        
            <tr>
                <th>Deployment</th>
                <th>Physical Presence Avg / day</th>
                <th>Hard</th>
                <th>Soft</th>
                <th>Floor</th>
                <th>Toilet</th>
            </tr>
        
			<?php $nn = 1; ?>
        @if (count($sites) > 0)
        @foreach ($sites as $key => $site)
        <tr> 
            <td><b><?php echo $nn; ?></b></td>
            <td style="text-align:left;"><b><?php  echo $site;   ?></b></td>
            <td><b> <?php     if(isset($flats[$key])) { echo $flats[$key]; } ?></b></td> 
            <td><span><?php  if(isset($deployment['deployment'][$key])) { echo $deployment['deployment'][$key]; } ?></span> </td>
            <td><span><?php if(isset($existing[$key]['physical_presence'])) {  echo $existing[$key]['physical_presence']; }?></span> </td>
            <td><span><?php if(isset($existing[$key]['garbage_disposal'])) {  echo $existing[$key]['garbage_disposal']; }?></span></td>
            <td><span><?php if(isset($existing[$key]['brooms_hard'])) {  echo $existing[$key]['brooms_hard']; }?></span></td>
            <td><span><?php if(isset($existing[$key]['brooms_soft'])) {  echo $existing[$key]['brooms_soft']; }?></span></td>
            <td><span><?php if(isset($existing[$key]['cleaners_floor'])) {  echo $existing[$key]['cleaners_floor']; }?></span></td> 
            <td><span><?php if(isset($existing[$key]['cleaners_tolet'])) {  echo $existing[$key]['cleaners_tolet']; }?></span> </td>
            <td><span><?php if(isset($existing[$key]['freshner'])) {  echo $existing[$key]['freshner']; }?></span> </td>
            <td class="roller-coahcer"><span><?php if(isset($existing[$key]['debristripavg'])) {  echo $existing[$key]['debristripavg']; }?></span></td>
            <td><span><?php if(isset($existing[$key]['corridors_sweeping'])) {  echo $existing[$key]['corridors_sweeping']; }?></span></td>
            <td><span><?php if(isset($existing[$key]['corridors_water_wash'])) {  echo $existing[$key]['corridors_water_wash']; }?></span></td>
            <td><span><?php if(isset($existing[$key]['staircase_clean'])) {  echo $existing[$key]['staircase_clean']; }?></span></td>
            <td><span><?php if(isset($existing[$key]['cell_subcel_clean'])) {  echo $existing[$key]['cell_subcel_clean']; }?></span></td>
            <td><span><?php if(isset($existing[$key]['cell_subcel_clean_wtr_wash'])) {  echo $existing[$key]['cell_subcel_clean_wtr_wash']; }?></span></td>
            <td><span><?php if(isset($existing[$key]['cobwebsremoval'])) {  echo $existing[$key]['cobwebsremoval']; }?></span></td>
            <td><span><?php if(isset($existing[$key]['roadsweepclean'])) {  echo $existing[$key]['roadsweepclean']; }?></span></td>
            <?php $nn++; ?>
        </tr>
        
        @endforeach
    
    	@endif
    
    </tbody>
  </table>

<?php if(isset($pagenumberval)) { if($pagenumberval > 0) {echo "page -".$pagenumberval; } } ?>

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