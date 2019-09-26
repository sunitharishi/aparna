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
            	<th>S.no</th>
                <th>Date</th>
                <th>Running hours</th>
                <th>Location</th>
                <th>Daily average running hours</th>
                <th>No. of break downs</th>
                <th>Down time hours</th>
                <th>Avg Area covered in sft.</th>            
            </tr>            
            
            @if (count($sites) > 0)
            @foreach ($sites as $key => $site)
            <tr>
               	<th>S.no</th>
                <th>Date</th>
                <th>Running hours</th>
                <th>Location</th>
                <th>Daily average running hours</th>
                <th>No. of break downs</th>
                <th>Down time hours</th>
                <th>Avg Area covered in sft.</th>  
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