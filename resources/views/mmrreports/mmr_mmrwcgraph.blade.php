
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Exporting Chart to PDF using toDataurl &amp; jsPDF - CanvasJS</title>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta name="robots" content="noindex, nofollow">
  <meta name="googlebot" content="noindex, nofollow">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <script
    type="text/javascript"
    src="//code.jquery.com/jquery-1.11.0.js"
    
  ></script>

    <link rel="stylesheet" type="text/css" href="/css/result-light.css">

      <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.min.js"></script>
      <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

  <style id="compiled-css" type="text/css">
      
  </style>


  <!-- TODO: Missing CoffeeScript 2 -->

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
				{ x: 40, y: 4 }, 
				{ x: 60, y: 7 },
				{ x: 70, y: 2 },
				{ x: 90, y: 3 },
				{ x: 100, y: 5 }
			]
		}
		]
});
chart.render();

var canvas = $("#chartContainer .canvasjs-chart-canvas").get(0);
var dataURL = canvas.toDataURL();
//console.log(dataURL);

	$("#exportButton").click(function(){
		var pdf = new jsPDF();
		pdf.addImage(dataURL, 'JPEG', 0, 0);
		pdf.save("download.pdf");
	});



    });

</script>

</head>
<body>
    <br/><!-- Just so that JSFiddle's Result label doesn't overlap the Chart -->

<div id="chartContainer" style="height: 360px; width: 100%;"></div>
<button id="exportButton" type="button">Export as PDF</button>

  
  <script>
    // tell the embed parent frame the height of the content
    if (window.parent && window.parent.parent){
      window.parent.parent.postMessage(["resultsFrame", {
        height: document.body.getBoundingClientRect().height,
        slug: "y80fjtxn"
      }], "*")
    }
  </script>
</body>
</html>
