

<style>

.downloads-section button

{

 background-color: #8dbb3c;

 color: #fff;

 font-weight: 600;

}



.dlyrep-select select

{

 width:80px;

 float:left;

 margin-right:10px;

}

.yeeeeaa

{

 width:100%;

 margin:0 auto;

 margin-bottom:15px;

 overflow:hidden;

}

.dailyreports.getdailyreport

{

 width:70%;

 margin:0 auto;

}



.dlyrep-select.wholeee

{

 float:right;

}



.selection-producure

{

 float:left;

 width:73%;

} 

.communities-selsction

{

 width:230px;

 float:left;

}

.selection-producure span.label-lllyear

{

 color:#ff2518;

 font-weight:bold;

 width:40px;

 float:left;

 line-height:29px;

}

.selection-producure span.label-llmonth

{

 color:#ff2518;

 font-weight:

 bold;width:50px;

 float:left;

 line-height:29px;

}

.communities-selsction label.label-communities

{

 width:auto;

 float:left;

 margin-right:4px;

 color:#ff2518;

 font-weight:bold;

 line-height:29px;

}

.communities-selsction select

{

 float:left;

 width:186px;

}

.mmr-reinovation

{

 width:70%;

 margin:0 auto;

 padding-bottom:15px;

}

</style>

<link media="all" type="text/css" rel="stylesheet" href="{{ url('scripts/third/summernote') }}/summernote.css">



@extends('layouts.app')



@section('content')

<div class="dailyreports getdailyreport mmr-reportamain">

    <h3 class="page-title"><span> MMR</span></h3>

</div>



<div class="row  mmr-index-page">  

    <div class="mmr-reinovation"> 

        <div class="yeeeeaa mmrreports-main">

            <div class="selection-producure">

               <div class="mmrreports-mainyear">

                 <span class="label-lllyear">Year:</span>

                 <div class="dlyrep-select"> 

					<?php

						 $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 

						 if(isset($uriSegments[2])) {	$yearn = $uriSegments[2];  }

						 if(isset($uriSegments[3])) {	$monthn = $uriSegments[3]; }

						 $year = $syear;

						 $month = $smonth;

						 $site = $site;

					?>

                    <select name='mis_year' id="mis_year" class="form-control"> 

                        <option value="">Select Year</option>

                        <?php for($i=2018;$i<=2030;$i++){ ?>

                        <option value="<?php echo $i; ?>" <?php if($year == $i) echo 'Selected';?>><?php echo $i; ?></option>

                        <?php } ?>

                    </select> 

                   </div>

                </div>  

                <div class="mmrreports-mainmonth">

                   <span class="label-llmonth">Month:</span>

                   <div class="dlyrep-select"> 

                        <!--<span><input type="text" id="example1" value="<?php // echo date("d/m/Y"); ?>" class="hasDatePicker form-control"></span>-->

                        <select name='mis_month' id="mis_month" class="form-control">  

                            <option value="">Select Month</option>

                            <option value="1" <?php if($month == "1") echo 'Selected';?>>Jan</option>

                            <option value="2" <?php if($month == "2") echo 'Selected';?>>Feb</option>

                            <option value="3" <?php if($month == "3") echo 'Selected';?>>Mar</option>

                            <option value="4" <?php if($month == "4") echo 'Selected';?>>April</option>

                            <option value="5" <?php if($month == "5") echo 'Selected';?>>May</option>

                            <option value="6" <?php if($month == "6") echo 'Selected';?>>June</option>

                            <option value="7" <?php if($month == "7") echo 'Selected';?>>July</option>

                            <option value="8" <?php if($month == "8") echo 'Selected';?>>Aug</option>

                            <option value="9" <?php if($month == "9") echo 'Selected';?>>Sept</option>

                            <option value="10" <?php if($month == "10") echo 'Selected';?>>Oct</option>

                            <option value="11" <?php if($month == "11") echo 'Selected';?>>Nov</option>

                            <option value="12" <?php if($month == "12") echo 'Selected';?>>Dec</option>

                        </select> 

                    </div>

                </div>

                <div class="mmrreports-mmrsites">    

                  <div class="communities-selsction">

                    <label class="label-communities">Sites:</label>

                    {!! Form::select('site', $sites_names, $site, ['class' => 'form-control erequired', 'id' => 'site']) !!}

                  </div>

                </div>

             </div>

            <div class="downloads-section">
				<div id="chartContainer" style="height: auto; opacity:0; width: 100%;"></div>
                <button type="button" class="btn btn-secondary" id="download_mis" style="position:absolute;">
					<i class="fa fa-print" aria-hidden="true" ></i> DOWNLOAD MMR REPORT
				</button> 

                <!--<button type="button" class="btn btn-secondary" id="get_editview"> MMR Validation </button>-->

            </div>           

        </div>

        <div class="mmr-indexpage-table" id="validresponse">

        	<div class="col-sm-12 showing-month-details form-group">

                 <h3>{{  $monthname }} - {{ $year }} - {{ $sitename }}</h3>

            </div>
			
			

            <table width="100%" border="1">

                <thead>

                    <tr>

                        <th>Report</th>

                        <th>Action</th>

                    </tr>

                </thead>

                <tbody>

                     <tr>

                        <td>Man Power</td>

                        <td><button id="manpower" class="btn btn-inverse btn-xs">Edit</button></td>

                    </tr> 

                      <tr>

                        <td>Service Level Agreement(SLA) adherence Report</td>

                        <td><button id="slaedit" class="btn btn-inverse btn-xs">Edit</button></td>

                    </tr>

                     <tr>

                        <td>Major Incidents</td>

                        <td><button id="major_incident" class="btn btn-inverse btn-xs">Edit</button></td>

                    </tr>

                      <tr>

                        <td>Planned Preventives Maintenance</td>

                        <td><button id="ppm_mmr" class="btn btn-inverse btn-xs">Edit</button></td>

                    </tr>

                    

                  <!--  <tr>

                        <td>Power Consumption</td>

                        <td><button id="eb_poweredit" class="btn btn-inverse btn-xs">Edit</button></td>

                    </tr>

                    <tr>

                        <td>Water Consumption</td>

                        <td><button id="metrowater" class="btn btn-inverse btn-xs">Edit</button></td>

                    </tr>-->
					
					<tr>

                        <td>Water Test Reports (WSP - Inlet)</td>

                        <td><button id="winlet" class="btn btn-inverse btn-xs">Edit</button></td>

                    </tr>
					
					<tr>

                        <td>Water Test Reports (WSP - Outlet)</td>

                        <td><button id="woutlet" class="btn btn-inverse btn-xs">Edit</button></td>

                    </tr>
					
					<tr>

                        <td>Water Test Reports (STP - Inlet)</td>

                        <td><button id="sinlet" class="btn btn-inverse btn-xs">Edit</button></td>

                    </tr>
					
					<tr>

                        <td>Water Test Reports (STP - Outlet)</td>

                        <td><button id="soutlet" class="btn btn-inverse btn-xs">Edit</button></td>

                    </tr>

                    

                     <tr>

                        <td>Initiative taken / Proactive </td>

                        <td><button id="initiative_take" class="btn btn-inverse btn-xs">Edit</button></td>

                    </tr>

                    

                    <tr>

                        <td>Housekeeping Activities</td>

                        <td><button id="hskp_activity" class="btn btn-inverse btn-xs">Edit</button></td>

                    </tr>

                    <tr>

                        <td>Housekeeping Consumables</td>

                        <td> <button id="hskp_consumable" class="btn btn-inverse btn-xs">Edit</button></td>

                    </tr>

                    <tr>

                        <td>Horticulture Activities</td>

                        <td><button id="horticul_activity" class="btn btn-inverse btn-xs">Edit</button></td>

                    </tr>

                  <!--   <tr>

                        <td>Horticulture Consumables</td>

                        <td><button id="horticul_consumable" class="btn btn-inverse btn-xs">Edit</button></td>

                    </tr> -->

                   

                    

                   

                  

                    

                     <tr>

                        <td>Violations</td>

                        <td><button id="violation" class="btn btn-inverse btn-xs">Edit</button></td>

                    </tr>

                    

                     <tr>

                        <td>Value Adds</td>

                        <td><button id="valueadds" class="btn btn-inverse btn-xs">Edit</button></td>

                    </tr>

                    

                     <tr>

                        <td>Suggestions</td>

                        <td><button id="suggestion" class="btn btn-inverse btn-xs">Edit</button></td>

                    </tr>

                    

                     <tr>

                        <td>Indents and Requisition</td>

                        <td><button id="indesntreq" class="btn btn-inverse btn-xs">Edit</button></td>

                    </tr>

                     

                    

                </tbody>

            </table>

 		</div>

    </div>

</div>  

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type="text/javascript">

$( document ).ready(function() {

//STATUS REPORTS

var year = $("#mis_year").val();

var month = $("#mis_month").val();

var site = $("#site").val();

$.ajax({

	type: "get",

	cache:false,

	url: '{{ route('validation.checkmmrstatusreports') }}',

	data: { year: year, month: month, site: site},

	success: function( response ) {

		 $("#validresponse").html(response);

	}  

}); 

$( "#mis_year" ).change(function()  

  {

  

    var year = $("#mis_year").val();

    var month = $("#mis_month").val();

	var site = $("#site").val();



      $.ajax({

				type: "get",

				cache:false,

				dataType: "json",

				url: '{{ route('validation.checkmmrstatusreports') }}',

				data: { year: year, month: month, site: site},

				success: function( response ) {

				  $("#validresponse").html(response);				

				}  

        });

    });

  

   $( "#mis_month" ).change(function()  

  {

 

   var year = $("#mis_year").val();

   var month = $("#mis_month").val();

    var site = $("#site").val();



      $.ajax({

				type: "get",

				cache:false,

				url: '{{ route('validation.checkmmrstatusreports') }}',

				data: { year: year, month: month, site: site},

				success: function( response ) {

			     $("#validresponse").html(response);				

				}  

        });

  });

  $( "#site" ).change(function()  

  {

    var year = $("#mis_year").val();

	var month = $("#mis_month").val();

	var site = $("#site").val();

      $.ajax({

				type: "get",

				cache:false,

				url: '{{ route('validation.checkmmrstatusreports') }}',

				data: { year: year, month: month, site: site},

				success: function( response ) {

			     $("#validresponse").html(response);				

				}  

        });

  });

  $('#example1').datepicker({ dateFormat: "dd-mm-yy" });

  $( "#get_editview" ).click(function() {

	var year = $("#mis_year").val();

	var month = $("#mis_month").val();

	var site = $("#site").val();

	

	if(year == "" || month == "" || site == "") { 

	var href = window.location.href;

	//window.location = href.replace(/getdailyreport\/.*$/, "");

	window.location.href = "/mmr/main";  

	} else {

	window.location.href = "/updatemmr?year="+year+"&month="+month+"&site="+site; 

	}	

  }); 

});

function getmmreditform(val){



var year = $("#year").val();

var month = $("#month").val();

var site = $("#site").val();

var mmr_type = $("#mmr_type").val();



if(val == ""){} else { 

      $.ajax({

				type: "get",

				cache:false,

				url: '{{ route('mmr.mmreditform') }}',

				data: { year: year, month: month, site: site, mmr_type: mmr_type},

				success: function( response ) {

				 //var obj = jQuery.parseJSON( response);

                   //alert(obj.status);

			 //  alert(response[0]);

			     $("#validresponse").html(response);

				  $('#reasontext').summernote({



              height:300,



            });

				 

				}  

        });

   

}

}

</script>

<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.min.js"></script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script type="text/javascript">
		/*$(window).load(function(){      
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
			$("#exportButton").click(function(){
				var pdf = new jsPDF();
				pdf.addImage(dataURL, 'JPEG', 0, 0);
				pdf.save("D:/java/download.pdf");				
			});
		});*/
</script>

@include('partials.footer')

@stop 