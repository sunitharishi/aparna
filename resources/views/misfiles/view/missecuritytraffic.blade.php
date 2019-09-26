<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Daily Security Data </title>
    
     <link rel="icon" href="images/ICON.png">
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
   <!-- <link href="vendors/nprogress/nprogress.css" rel="stylesheet">-->
    <!-- iCheck -->
    <!--<link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">-->
	
    <!-- bootstrap-progressbar -->
    <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
   <!-- <link href="vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>-->
    <!-- bootstrap-daterangepicker -->
    <!--<link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">-->

    <!-- Custom Theme Style -->
    <link href="build/css/custom.css" rel="stylesheet">

	<link rel="stylesheet" href="dist/tablesaw.css">
	<link rel="stylesheet" href="demo/demo.css">
	<link rel="stylesheet" href="//filamentgroup.github.io/demo-head/demohead.css">
    
    
      <style>
	.manjeera table tr th 
	{
	padding:5px;
	text-align:center;
	}
	.manjeera table tr td 
	{
	padding:5px;
	text-align:center;
	}
	.rotate
	{
	transform: rotate(270deg) ;
-webkit-transform: rotate(270deg) ;
-moz-transform: rotate(270deg) ;
-o-transform: rotate(270deg) ;
-ms-transform: rotate(270deg) ;
	}
	.manjeera
	{
	font-size:12px;
	}
	.x_title
	{
	border-bottom:none;
	padding:0px;
	margin:0px;
	}
	.borewell
	{
	margin-left:30px;
	}
	.docs-main
	{
	max-width:100%;
		 margin:0px;
	}
	.tablesaw-bar
	{
	height: 30px;
    display: block;
    padding-bottom: 11px;
    margin-bottom: 10px;
	}
	.communityinpu tr td input 
	{
	width:100%;
	 font-size:12px;

	}
	.tablesaw-bar
	{
	height:30px;
	}
	.communityinpu tr td 
	{
	font-size:12px;
	text-align:center;
	}
	.communityinpu tr th 
	{
	font-size:12px;
	text-align:center;
	}
	.tablcomu tr th
	{
	font-size:12px;
	text-align:center;
	}
	</style>
    
	<script>
	var TablesawConfig = {
		i18n: {
			swipePreviousColumn: "The column before",
			swipeNextColumn: "The column after"
		},
		swipe: {
			horizontalThreshold: 45,
			verticalThreshold: 45
		}
	};
	</script>
	<!-- <script src="../dist/dependencies/jquery.js"></script>
	<script src="../dist/tablesaw.jquery.js"></script> -->
	<script src="dist/tablesaw.js"></script>
	<script src="dist/tablesaw-init.js"></script>
	<script src="http://filamentgroup.github.io/demo-head/loadfont.js"></script>
    
    
    
    
</head>
<body>
	
    
       <body class="nav-md">
    <div class="container body">
      <div class="main_container">
    
    	<?php include "header.php" ?>
        
        <div class="right_col" role="main">

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel tile fixed_height_400">
                <div class="x_title">
                   <!--<h3>Metro Water Supply details from  01.12.2017 to 31.12.2017</h3>-->
                </div>
                <div class="x_content">
    
	<div class="docs-main">
	

		<table class="tablesaw tablesaw-swipe" data-tablesaw-mode="swipe" data-tablesaw-minimap width="100%" border="1" cellspacing="1">
         <!-- <tr>
            <th colspan="10">Daily Security Data </th>
          </tr>-->
			<thead class="tablcomu">
            
            
				<tr>
                
					<th class="title" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Particulars</th>
				    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" >Aura</th>
					<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" >Avenues</th>
					<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" >Aparna County</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" >Boulevard</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" >Chandra deep</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" >Cyber Zon</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" >Gardenia</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" >Kanopy Tulip</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" >Kanopy Lotus</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" >Lake Breeze</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" >Sarovar</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" >Sarovar Grande</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" >Towers</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" >Oosman's Everest</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" >Total</th>
                      
				</tr>
             
                
                 
                
			</thead>
			<tbody class="communityinpu">
            
 				
                             <tr>
                        <th class="title" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Residents  vehicle (4 & 2 wheelers)</th>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                       </tr>
                          
                        <tr>
                        <th class="title" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Temporary  Vendors (persons)</th>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                       </tr>
                          
                           
                         <tr>
                        <th class="title" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Courier  Delivery Boys ( persons)</th>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                       </tr>
                          
                         <tr>
                        <th class="title" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Visitors</th>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                       </tr>
                          
                            <tr>
                        <th class="title" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Construction Team (persons)</th>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                       </tr>
                          
                          
                          <tr>
                        <th class="title" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Inter Works in flats/Villas</th>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                       </tr>
                          
                          
                         
                              <tr>
                        <th class="title" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Interior Workers per day</th>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                       </tr>
                          
                          <tr>
                       <th class="title" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Total</th>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                        <td><input type="text" name="fname" value=""> </td>
                       </tr>
			</tbody>
		</table>

		

	
	</div>
    
                        
                </div>
              </div>
            </div>            
          </div>
          


          
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php include "footer.php" ?>
        <!-- /footer content -->
      </div>
    </div>

    
  <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
   <!-- <script src="vendors/nprogress/nprogress.js"></script>-->
    <!-- Chart.js -->
    <script src="vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
   <!-- <script src="vendors/gauge.js/dist/gauge.min.js"></script>-->
    <!-- bootstrap-progressbar -->
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
   <!-- <script src="vendors/iCheck/icheck.min.js"></script>-->
    <!-- Skycons -->
   <!-- <script src="vendors/skycons/skycons.js"></script>-->
    <!-- Flot -->
   <!-- <script src="vendors/Flot/jquery.flot.js"></script>
    <script src="vendors/Flot/jquery.flot.pie.js"></script>
    <script src="vendors/Flot/jquery.flot.time.js"></script>
    <script src="vendors/Flot/jquery.flot.stack.js"></script>
    <script src="vendors/Flot/jquery.flot.resize.js"></script>-->
    <!-- Flot plugins -->
  <!--  <script src="vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="vendors/flot.curvedlines/curvedLines.js"></script>-->
    <!-- DateJS -->
   <!-- <script src="vendors/DateJS/build/date.js"></script>-->
    <!-- JQVMap -->
   <!-- <script src="vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>-->
    <!-- bootstrap-daterangepicker -->
   <!-- <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
-->
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>	
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
    
    
    
    
</body>
</html>
