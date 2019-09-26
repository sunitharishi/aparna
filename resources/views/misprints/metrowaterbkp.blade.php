<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
     <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Manjeera Water</title>

     <link href="/build/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="/dist/tablesaw.css">
	<link rel="stylesheet" href="/demo/demo.css">
    <style>
	body
	{
	color:black;
	border-color:black;
	font-family: "Open Sans", sans-serif;
	}
	table 
	{
	/*border:1px solid black;*/
	color:black;
	}
	.manjeera table tr th 
	{
	padding:7px 3px;
	text-align:center;
	color:black;
	font-size:11.5px;
	vertical-align:top;
 	}
	.manjeera table tr td 
	{
	padding:7px 3px;
	text-align:center;
	color:black;
	font-weight:400;
	font-size:11.5px;
	}
	.manjeera table
	{
	color:black;
	}
	.manjeera
	{
	font-size:11px;
	}
	.rotate
	{
	transform: rotate(270deg) ;
-webkit-transform: rotate(270deg) ;
-moz-transform: rotate(270deg) ;
-o-transform: rotate(270deg) ;
-ms-transform: rotate(270deg) ;
	}
	.x_title
	{
 	padding:0px;
	margin:0px;
 	}
	.x_panel
	{
	padding:0px;
	}
	.nav-md .container.body .right_col
	{
	padding:0px;
	}
	@media print
	{
	 .x_panel
	 {
	  border:1px solid #fff;
	  padding:0px;
	  box-shadow:none;
	 }
	 .x_title 
	 {
      border-bottom: none;
      padding: 0px;
     margin: 0px;
    }
	}
	/*@media print {

    html, body {
	color:black;
      height:100vh; 
      margin: 0 !important; 
      padding: 0 !important;
      overflow: hidden;
     }

}*/
  
 @supports (-moz-appearance:none) {
       line-height:1;
    }

 
	</style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
      <?php /*?>	<?php include "header.php" ?><?php */?>

        <!-- page content -->
        <div class="right_col" role="main">

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12" style="width:100%;">
              <div class="x_panel tile fixed_height_400" style="border:none;">
                <div class="x_title">
                   <!--<h3>Metro Water Supply details from  01.12.2017 to 31.12.2017</h3>-->
                </div>
                <div class="x_content">
                	<!--<div class="land-scaping">
                    	<h4><b>Land Scaping</b></h4>
                    </div>  -->
                    
                    <div class="manjeera">
                      <table width="100%" border="1" cellspacing="0">
                        <tbody>
                          <tr>
                           <th colspan="<?php echo count($sitearr['community']) + 3; ?>" style="font-size:14px;">Metro Water Supply details from  <?php echo $reportfrom_on." to ".$report_on; ?> </th>
                          </tr> 
                          <tr>
                        <th colspan="3">Community</th>
						<?php foreach($sitearr['community'] as $community) {?>
						 <th><?php echo  $community;?></th>
						<?php 	}?>
						
                           <tr>
                           
                        
                        <td colspan="3"><b>Contracted<br> Quantity in KL</b></td>
						
						<?php foreach($sitearr['concentrated'] as $cont => $contval) { ?>
                        
						<td><b><?php echo $contval; ?></b></td>
						<?php } ?>
                          </tr>
                          
                       
                           <?php $i= 1; foreach($sitearr['dateres'] as $dateke => $datevalue) { ?>
                            <tr> 
                         <?php  if($i == 1) { ?>  <td rowspan="<?php echo count($sitearr['dateres']); ?>"> <img src="images/date.png" ></td> <?php } ?>
                        <th colspan="2"><?php // echo $dateke;
						 $i = $i + 1;
echo date('d-m-Y', strtotime($dateke)); ?></th>
						<?php foreach($datevalue as $val) { ?>   <td><span><?php echo $val; ?></span> </td><?php } ?>
                       
                          </tr>
						  
						  <?php  } ?>
                          
                      
                          
                          <tr>
                        <th colspan="3">Avg per day	</th>
						 <?php foreach($sitearr['average'] as $avgke => $avgval) { ?>
                        <td><?php echo round(((float)$avgval/count($sitearr['dateres']))); ?> </td>
                      
						<?php } ?>  
                          </tr>
                          
                           <tr>
                        <th colspan="3">% on contracted<br> per day</th>
						 <?php foreach($sitearr['persent'] as $perke => $perval) { ?>
						
                        <td><?php echo round($perval); ?> </td>
                       
						<?php } ?>  
                          </tr>
                          	

                           
                        </tbody>
                      </table>
                      
                     <!-- <p style="padding-top:3px;margin-bottom:0px;">* In Sarovar 'metro water meter' not working</p>-->
                     
                    </div>
                    
                </div>
              </div>  
            </div>            
          </div>
          


          
        </div>
        <!-- /page content -->

        <!-- footer content -->
      <?php /*?>  <?php include "footer.php" ?><?php */?>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <!--<script src="vendors/jquery/dist/jquery.min.js"></script>-->
    <!-- Bootstrap -->
    <!--<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>-->
    <!-- FastClick -->
   <!-- <script src="vendors/fastclick/lib/fastclick.js"></script>-->
    <!-- NProgress -->
   <!-- <script src="vendors/nprogress/nprogress.js"></script>-->
    <!-- Chart.js -->
   <!-- <script src="vendors/Chart.js/dist/Chart.min.js"></script>-->
    <!-- gauge.js -->
   <!-- <script src="vendors/gauge.js/dist/gauge.min.js"></script>-->
    <!-- bootstrap-progressbar -->
   <!-- <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>-->
    <!-- iCheck -->
    <!--<script src="vendors/iCheck/icheck.min.js"></script>-->
    <!-- Skycons -->
   <!-- <script src="vendors/skycons/skycons.js"></script>-->
    <!-- Flot -->
  <!--  <script src="vendors/Flot/jquery.flot.js"></script>
    <script src="vendors/Flot/jquery.flot.pie.js"></script>
    <script src="vendors/Flot/jquery.flot.time.js"></script>
    <script src="vendors/Flot/jquery.flot.stack.js"></script>
    <script src="vendors/Flot/jquery.flot.resize.js"></script>-->
    <!-- Flot plugins -->
   <!-- <script src="vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="vendors/flot.curvedlines/curvedLines.js"></script>-->
    <!-- DateJS -->
    <!--<script src="vendors/DateJS/build/date.js"></script>-->
    <!-- JQVMap -->
    <!--<script src="vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>-->
    <!-- bootstrap-daterangepicker -->
    <!--<script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>-->

    <!-- Custom Theme Scripts -->
<!--    <script src="build/js/custom.min.js"></script>	
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<script>
window.onload = function() {

var chart = new CanvasJS.Chart("chartContainer12", {
	animationEnabled: true,
	data: [{
		type: "pie",
		indexLabelFontSize: 16,
		startAngle: 240,
		yValueFormatString: "##0.00\"%\"",
		indexLabel: "{label} {y}",
		dataPoints: [
			{y: 20, label: "Nike"},
			{y: 20, label: "Blue Ribbon"},
			{y: 20, label: "Flexon"},
			{y: 20, label: "Autoflex"},
			{y: 20, label: "Tres Jolie"},
			{y: 20, label: "Airlock"}
		]
	}]
});
chart.render();

var chart = new CanvasJS.Chart("chartContainer1", {
	theme: "light2",
	animationEnabled: true,
	data: [{
		type: "pie",
		indexLabelFontSize: 16,
		radius: 240,
		indexLabel: "{label} - {y}",
		yValueFormatString: "###0.0\"%\"",
		click: explodePie,
		dataPoints: [
			{ y: 42, label: "Nike" },
			{ y: 21, label: "Blue Ribbon"},
			{ y: 24.5, label: "Flexon" },
			{ y: 9, label: "Autoflex" },
			{ y: 3.1, label: "Tres Jolie" },
			{ y: 3.1, label: "Airlock" }
		]
	}]
});
chart.render();

function explodePie(e) {
	for(var i = 0; i < e.dataSeries.dataPoints.length; i++) {
		if(i !== e.dataPointIndex)
			e.dataSeries.dataPoints[i].exploded = false;
	}
}
 
}
</script>
-->  </body>
</html>
  <script src="/vendors1/jquery/dist/jquery.min.js"></script>
 
<script>
$( document ).ready(function() {
    window.print(); 
	close();
	window.location.href = "/misreports";   
});

</script>