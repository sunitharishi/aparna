<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> Occupancy &amp; Rental Details</title>

    <!-- Bootstrap -->
    <link rel="icon" href="images/ICON.png">
   
    
    <style>
	body
	{
	 font-family:Arial, Helvetica, sans-serif;
	}
	.manjeera table tr th 
	{
	padding:10px 6px;
	text-align:center;
	vertical-align:middle;
	}
	.manjeera table tr td 
	{
	padding:10px 6px;
	text-align:center;
	}
 	.manjeera
	{
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
            	<th colspan="9" style="font-size:14px;padding:6px 0px;"> Occupancy & Rental Details as on <?php echo $report_on; ?></th>
            </tr>
            <tr>
                <th rowspan="2">Community </th>
                <th rowspan="2">Total No. of Flats </th>
                <th rowspan="2">Total Occupied</th>
                <th rowspan="2">Owners  </th>
                <th rowspan="2" >Tenants</th>
                <th  rowspan="2">Vacant</th>
                
                <th  colspan="3">Prevailing rent per month (INR)</th>
            
            </tr>
            
            <tr>
                <!-- <th >1BHK</th>-->
                <th>2BHK</th>
                <th>3BHK</th>
                <th>4BHK</th>
            </tr>
            
            
            @if (count($sites) > 0)
            @foreach ($sites as $key => $site)
            <tr>
                <td class="text-left"><b><?php  echo $site;   ?></b></td>
                <td> <?php    if(isset($flats[$key])) { echo $flats[$key]; } ?></td> 
                
                <!--{!! Form::text('ctptmin[]','', ['class' => 'larev', 'placeholder' => 'minimum']) !!}-->
                
                
                <td> <?php  if(isset($existing[$key]['owners']) && isset($existing[$key]['tenants'])) { echo $existing[$key]['owners'] + $existing[$key]['tenants']; } ?> </td>
                <td> <?php if(isset($existing[$key]['owners'])) { echo $existing[$key]['owners']; } ?></td>
                <td> <?php if(isset($existing[$key]['owners'])) { echo $existing[$key]['tenants']; } ?> </td>
                <td><?php if(isset($existing[$key]['owners'])) { echo $existing[$key]['vacant']; } ?> </td>
                <!-- {!! Form::text('ctptmax[]', '', ['class' => 'larev2', 'placeholder' => '']) !!}-->
                <!--<td><span><?php  //if(isset($cost[$key]['one_bhk'])) { echo $cost[$key]['one_bhk']; } ?> </span></td>-->
                <td><span><?php if(isset($cost[$key]['two_bhk'])) { echo $cost[$key]['two_bhk']; } ?> </span></td>
                <td><span><?php if(isset($cost[$key]['three_bhk'])) { echo $cost[$key]['three_bhk']; } ?> </span></td>
                <td><span><?php if(isset($cost[$key]['four_bhk'])) { echo $cost[$key]['four_bhk']; } ?> </span></td>
                
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