@extends('layouts.app')

@section('content')
<style>
    .demo-container *
    {
        color:#000;
        font-weight:700 !important;
    }
</style>

<div class="dx-viewport">

    <div class="demo-container">
      <div class="col-sm-6">
            <h3 class="graphs-heading"></h3>
        <div id="chart" class="bar-charts-statistics">
            
        </div> 
      </div>
      <div class="col-sm-6">
           <h3 class="graphs-heading"></h3>
    	<div id="chart2" class="bar-charts-statistics2">    	    
    	</div> 
      </div>
      <div class="col-sm-6">
          <h3></h3>
    	<div id="chart3" class="bar-charts-statistics3"></div>
     </div>
       <div class="col-sm-6">
            <h3></h3>
    	<div id="chart4" class="bar-charts-statistics3"></div>      
       </div>
        <div class="row" id="buttonGroup">

            <div class="row-element" id="export"></div>

        </div>

    </div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <script>window.jQuery || document.write(decodeURIComponent('%3Cscript src="js/jquery.min.js"%3E%3C/script%3E'))</script>

    <link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/18.2.6/css/dx.common.css" />

    <link rel="dx-theme" data-theme="generic.light" href="https://cdn3.devexpress.com/jslib/18.2.6/css/dx.light.css" />

    <script src="https://cdn3.devexpress.com/jslib/18.2.6/js/dx.all.js"></script>

	<?php 
	
		
	
		$cmonth = $month." ".$year;
		
		$cmonth = $cmonthname." ".$year;
		
		$pmonth = $pmonthname." ".$pyear;
		
		$bpmonth = $bmonthname." ".$poyear;
		
		
		

		
	?>

    <script type="text/javascript">

      var dataSource = [{

      state: "EB Power in units",

      nov2018: <?php if($site==87) echo '1462'; else echo $Power_Consumption3; ?>,

      dec2018: <?php if($site==87) echo '1913'; else echo $Power_Consumption2; ?>,

      jan2019: <?php if($site==87) echo '751'; else echo $Power_Consumption1; ?>

    }, {

      state: "Solar Power in units",

      nov2018: <?php echo $Solar_Power_Units3; ?>,

      dec2018: <?php echo $Solar_Power_Units2; ?>,

      jan2019: <?php echo $Solar_Power_Units1; ?>

    },  {

      state: "DG Units Generated",

      nov2018: <?php echo $DG_Units3; ?>,

      dec2018: <?php echo $DG_Units2; ?>,

      jan2019: <?php echo $DG_Units1; ?>

    }];

	

	var dataSource1 = [{

      state: "Metro in KL",

      nov2018: <?php echo $Wsp_Metro3; ?>,

      dec2018: <?php echo $Wsp_Metro2; ?>,

      jan2019: <?php echo $Wsp_Metro1; ?>

    }, {

      state: "Bores in KL",

      nov2018: <?php echo $Wsp_Bores3; ?>,

      dec2018: <?php echo $Wsp_Bores2; ?>,

      jan2019: <?php echo $Wsp_Bores1; ?>

    }, {

      state: "Tanker in KL",

      nov2018: <?php echo $Wsp_Tankers3; ?>,

      dec2018: <?php echo $Wsp_Tankers2; ?>,

      jan2019: <?php echo $Wsp_Tankers1; ?>

    }, {

      state: "STP Treated in KL",

      nov2018: <?php echo $Wsp_Treatwater3; ?>,

      dec2018: <?php echo $Wsp_Treatwater2; ?>,

      jan2019: <?php echo $Wsp_Treatwater1; ?>

    }];
	
	
	var dataSource2 = [{

      state: "Power failure hours",

      nov2018: <?php if($site==87) echo '33'; else echo  $Power_Failure_Hrs3; ?>,

      dec2018: <?php if($site==87) echo '47'; else echo  $Power_Failure_Hrs2; ?>,

      jan2019: <?php if($site==87) echo '20'; else echo  $Power_Failure_Hrs1; ?>

    }];

   var dataSource3 = [{

      state: " ",

      nov2018: <?php if($site==87) echo '510'; else echo  $Diesel_Consume3; ?>,

      dec2018: <?php if($site==87) echo '647'; else echo  $Diesel_Consume2; ?>,

      jan2019: <?php if($site==87) echo '285'; else echo  $Diesel_Consume1; ?>

    }];


  </script>

    <script type="text/javascript">

    $(function(){

      var chartInstance = $("#chart").dxChart({

        dataSource: dataSource,

        commonSeriesSettings: {

          argumentField: "state",

          type: "bar",

          hoverMode: "allArgumentPoints",

          selectionMode: "allArgumentPoints",

          label: {

            visible: true,

            format: {

              type: "fixedPoint",

              precision: 0

            }

          }

        },

        series: [

          { valueField: "nov2018", name: "<?php echo $bpmonth; ?>" },

          { valueField: "dec2018", name: "<?php echo $pmonth; ?>" },

          { valueField: "jan2019", name: "<?php echo $cmonth; ?>" }

        ],

        title: "Power Consumption (Units)",

        legend: {

          verticalAlignment: "bottom",

          horizontalAlignment: "center"

        },

        "export": {

          enabled: false,

        

        },

        onPointClick: function (e) {

          e.target.select();

        }

      }).dxChart("instance");

      

      

      var chartInstance1 = $("#chart3").dxChart({

        dataSource: dataSource2,

        commonSeriesSettings: {

          argumentField: "state",

          type: "bar",

          hoverMode: "allArgumentPoints",

          selectionMode: "allArgumentPoints",

          label: {

            visible: true,

            format: {

              type: "fixedPoint",

              precision: 0

            }

          }

        },

        series: [

          { valueField: "nov2018", name: "<?php echo $bpmonth; ?>" },

          { valueField: "dec2018", name: "<?php echo $pmonth; ?>" },

          { valueField: "jan2019", name: "<?php echo $cmonth; ?>" }

        ],

        title: "Power Failure (Hrs)",

        legend: {

          verticalAlignment: "bottom",

          horizontalAlignment: "center"

        },

        "export": {

          enabled: false,

        

        },

        onPointClick: function (e) {

          e.target.select();

        }

      }).dxChart("instance");

      
	  var chartInstance2 = $("#chart2").dxChart({

        dataSource: dataSource1,

        commonSeriesSettings: {

          argumentField: "state",

          type: "bar",

          hoverMode: "allArgumentPoints",

          selectionMode: "allArgumentPoints",

          label: {

            visible: true,

            format: {

              type: "fixedPoint",

              precision: 0

            }

          }

        },

        series: [

          { valueField: "nov2018", name: "<?php echo $bpmonth; ?>" },

          { valueField: "dec2018", name: "<?php echo $pmonth; ?>" },

          { valueField: "jan2019", name: "<?php echo $cmonth; ?>" }

        ],

        title: "Water Consumption (KL)",

        legend: {

          verticalAlignment: "bottom",

          horizontalAlignment: "center"

        },

        "export": {

          enabled: false,

        

        },

        onPointClick: function (e) {

          e.target.select();

        }

      }).dxChart("instance");

	  
	  var chartInstance3 = $("#chart4").dxChart({

        dataSource: dataSource3,

        commonSeriesSettings: {

          argumentField: "state",

          type: "bar",

          hoverMode: "allArgumentPoints",

          selectionMode: "allArgumentPoints",

          label: {

            visible: true,

            format: {

              type: "fixedPoint",

              precision: 0

            }

          }

        },

        series: [

          { valueField: "nov2018", name: "<?php echo $bpmonth; ?>" },

          { valueField: "dec2018", name: "<?php echo $pmonth; ?>" },

          { valueField: "jan2019", name: "<?php echo $cmonth; ?>" }

        ],

        title: "Diesel Consumption (Ltrs)",

        legend: {

          verticalAlignment: "bottom",

          horizontalAlignment: "center"

        },

        "export": {

          enabled: false,

        

        },

        onPointClick: function (e) {

          e.target.select();

        }

      }).dxChart("instance");
	  
	  

      $("#export").dxButton({

        icon: "export",

        text: "Export",

        onClick: function() {

          chartInstance.exportTo("PowerConsumption", "png");

          chartInstance1.exportTo("PowerFailure", "png");
		  
		  chartInstance2.exportTo("WaterConsumption", "png");
		  
		  chartInstance3.exportTo("DieselConsumed", "png");

        }

      });

    });

  </script>

@include('partials.footer')

@stop

