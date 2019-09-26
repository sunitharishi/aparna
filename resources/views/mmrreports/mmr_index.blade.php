<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MMR Index</title>
    <!-- Bootstrap -->
    <link rel="icon" href="images/ICON.png">
   <!-- <link href="/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">-->
     <!--<link href="/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">-->

    <!-- Custom Theme Style -->
    <link href="/build/css/custom.css" rel="stylesheet">
    
    <style>
	html
	{
	 font-family: "Open Sans", sans-serif;
	 
	}
	 .mmr-indexpage
	 {
	 text-align:center;
	 }
	 .mmr-indexpage h1
	{
	 font-weight:bold;
	 font-size: 60px;
	 margin-top:30%;
	}
	.mmr-indexpage h4
	{
	 font-size: 26px;
     font-weight: 200;
	 letter-spacing: 0.5px;
	 margin-top: 1%;
	}
	.mmr-indexpage p
	{
	font-size: 36px;
    margin-top: 1%;
	font-weight:600;
	}
	.mmr-indexpage p span
	{
	 font-size: 36px;
     font-weight: 600;
	}
 	</style>
  </head>

  
<div class="manjeera">
    <div class="panel panel-default respositroy-view maalajljd">
        <div class="row">
            <div class="mmr-indexpage">
                <h1>Monthly Management Report</h1> 
                <h4>Aparna Property Management Services Ltd</h4>
                <p>{{ $report_month }} -  <span>{{ $report_year }}</span></p>
                <div id="chartContainer" style="height: 300px; opacity:1; width: 100%;"></div>
            </div>
        </div>
    </div>
</div>
    

 </html>

 <script src="/vendors1/jquery/dist/jquery.min.js"></script>
 
<script>
$( document ).ready(function() {
    window.print(); 
	close();
	window.location.href = "/misreports"; 
});

</script>


<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.min.js"></script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script type="text/javascript">
		$(window).load(function(){      
			var chart = new CanvasJS.Chart("chartContainer",
			{
					title: {
						text: "Exporting chart using jsPDF & toDataurl"
					},
					data: [
					{
						type: "spline",
						dataPoints: [ 
							{ x: 10, y: 4 }, 
							{ x: 20, y: 7 },
							{ x: 30, y: 2 },
							{ x: 40, y: 3 },
							{ x: 50, y: 5 }
						]
					}
					]
			});
			chart.render();		
			var canvas = $("#chartContainer .canvasjs-chart-canvas").get(0);
			var dataURL = canvas.toDataURL();			
		});
</script>
