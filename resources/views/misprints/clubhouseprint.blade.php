<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Club House </title>

    <!-- Bootstrap -->
    <link rel="icon" href="images/ICON.png">
   
    <style>
	body
	{
	  font-family:Arial, Helvetica, sans-serif;
	}
	.manjeera table tr th 
	{
	padding:11.5px 5px;
	text-align:center;
	font-size:13.5px;
	vertical-align:middle;
	}
	.manjeera table tr td 
	{
	padding:11.5px 5px;
	text-align:center;
	font-size:13.5px;
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
    <table width="100%" border="1" cellspacing="0">
        <tbody>
            <tr>
            	<th colspan="11" style="font-size:14px;padding:6px 0px;"> Club House Utilization Data</th>
            </tr>
            <tr>
                <th rowspan="2">Community </th>
                <th rowspan="2">Total Flats/Villas</th>
                <th rowspan="2">Avg Occupancy</th>
                <th colspan="4">Average daily usage  </th>
                <th colspan="4" > % against occupied flats</th>
            </tr>
            
            <tr>
                <th >Swimming Pool </th>
                <th>Gym </th>
                <th>Tennis </th>
                <th>Badminton </th>
                <th>Swimming Pool </th>
                <th>Gym </th>
                <th>Tennis </th>
                <th>Badminton </th>
            </tr>
    
            @if (count($sites) > 0)
            @foreach ($sites as $key => $site)
            <tr>
                <td><b><?php  echo $site;   ?></b></td>
                <td><b> <?php     if(isset($flats[$key])) { echo $flats[$key]; } ?></b></td> 
                
                <?php /*?><td><span> <?php if(isset($existing[$key]['avg_occupancy'])) { echo $existing[$key]['avg_occupancy']; } ?></span></td>
                <td> <span><?php if(isset($existing[$key]['avg_daily_swim'])) { echo $existing[$key]['avg_daily_swim']; } ?></span></td>
                <td><span><?php if(isset($existing[$key]['avg_daily_gym'])) { echo $existing[$key]['avg_daily_gym']; } ?> </span></td>
                <td><span><?php if(isset($existing[$key]['occ_flat_swim'])) { echo $existing[$key]['occ_flat_swim']; } ?> </span></td>
                <td><span><?php if(isset($existing[$key]['occ_gym_swim'])) { echo $existing[$key]['occ_gym_swim']; } ?> </span></td><?php */?>
                <td class="text-center"><span> <?php if(isset($avgoccuapncy[$key])) { echo $avgoccuapncy[$key]; } ?></span></td>
                <td class="text-center"> <span><?php if(isset($swimpoll_res[$key])) { echo $swimpoll_res[$key]; } ?></span></td>
                <td class="text-center"><span><?php if(isset($gym_res[$key])) { echo $gym_res[$key]; } ?> </span></td>
                <td class="text-center"><span><?php if(isset($tennis_res[$key])) { echo $tennis_res[$key]; } ?> </span></td>
                <td class="text-center"><span><?php if(isset($badminton_res[$key])) { echo $badminton_res[$key]; } ?> </span></td>
                <td class="text-center"><span><?php if(isset($swimpoll_per[$key])) { echo $swimpoll_per[$key]; } ?> </span></td>
                <td class="text-center"><span><?php if(isset($gym_per[$key])) { echo $gym_per[$key]; } ?> </span></td>
                <td class="text-center"><span><?php if(isset($tennis_per[$key])) { echo $tennis_per[$key]; } ?> </span></td>
                <td class="text-center"><span><?php if(isset($badminton_per[$key])) { echo $badminton_per[$key]; } ?> </span></td>
                
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