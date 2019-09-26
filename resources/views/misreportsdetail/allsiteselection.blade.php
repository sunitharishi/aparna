 <link href="/vendors1/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">  
    <!-- Font Awesome -->
    <link href="/vendors1/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
   <!-- <link href="vendors1/nprogress/nprogress.css" rel="stylesheet">-->
    <!-- iCheck -->
    <!--<link href="vendors1/iCheck/skins/flat/green.css" rel="stylesheet">-->
	
    <!-- bootstrap-progressbar -->
    <link href="/vendors1/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
   <!-- <link href="vendors1/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>-->
    <!-- bootstrap-daterangepicker -->
    <!--<link href="vendors1/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">-->

    <!-- Custom Theme Style -->
    <link href="/build/css/custom.css" rel="stylesheet">

	<link rel="stylesheet" href="/dist/tablesaw.css">
	<link rel="stylesheet" href="/demo/demo.css">
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
	.tablcomu tr th
	{
	text-align:center;
	}
	.docs-main h3
	{
	margin-bottom:25px;
	margin-top:10px;
	}
	.upload-attendance-form
	{
	width:50%;
	padding:28px;
	border:1px solid #c1c4c7;
	border-radius:5px;
	margin:0 auto;
	background-color:#f5f5f5;
	}
	.dlyrep-select label
	{
	color:#ff2518;
	font-weight:bold;
	}
     
    .dlyrep-select.desi
   {
		margin-bottom:15px !important;
		width:600px !important;
   }
   .form-group.desi2 input
   {
   width:40%;
   margin:0 auto;
   color:black;
   background-color:transparent;
   display:inline-block;
   margin-left:10px;
    }
   .pre 
   {
   display:inline-block;
   width:100%;
    text-align:center;
   }
   
   .pre a
   {
    color: #ff2518;
    font-weight: bold;
    position: relative;
    width:auto;
    display:inline-block;
    float:right;
    }
   .desibtn button
   {
   width:auto;
   margin-left:14%;
   background-color:#0b52e9;
   color:white;
   margin-top:6px;
   }
   .desibtn button:active:hover
    {
   background-color:#B22E2E;
   color:white;
   }
   .btn-info:active:hover
   {
   background-color:transparent;
   }
   
   .page-title.req
   {
   height:40px;
   color:#023F78;
   font-weight:bold;
   font-size:23px;
   margin-bottom:0px;
   }
   .desi3 
   {
   width:100%;
   display:inline-block;
   margin:o auto;
   text-align:center;
   }
   .desi3 input
   {
   margin-left:10px;
   }
   .desi3 input[type="text"]
   {
   		width: 45%;
		margin: 0 auto;
		color: black;
		background-color: white;
		display: inline-block;
		margin-left: 10px;
		border: 1px solid #CCC;
		margin-top:10px !Important;
   }
 	</style>
@extends('layouts.app')

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="misback-button"><a href="/misreports">Back</a></div>
	<div class="dailyreports">
    	<h3 class="page-title fire-sfty">MIS Reports   &gt;&gt;  Sites Selection</h3>
        	{!! Form::open(['method' => 'POST', 'route' => ['misreports.storemisallsite'], 'class' => 'for-labelling' ,'onsubmit' =>"return subform()"]) !!}
			<div class="row">
				<div class="col-xs-12 form-group sub-hydrant">
					<div class="dlyrep-select sub-ordinate">
						 <label for="dailycat1" class="control-label">Reports:</label>
						 <input type="hidden" name="report_id" id="report_id" value="" />
                         <input type="hidden" name="user_id" id="user_id" value="1" />
						 <select class="form-control" id="select_id11" name="reports">
								<option value="">Select Report</option>
								<option value="Metro_water_Report">Metro water Report</option>
								<option value="Water_source_and_consumption">Water source and consumption</option>
								<option value="STP_Flush_water_report">STP Flush water report</option>
								<option value="Borewells_not_working_status">Borewells not working status</option>
								<option value="Fire_safety_status">Fire safety status</option>
								<option value="Fire_NOC_Renewals">Fire NOC Renewals</option>
								<option value="Electro_Mechanical_Equipment_status">Electro Mechanical Equipment status</option>
								<option value="STP_Status">STP Status</option>
								<option value="WSP_Status">WSP Status</option>
								<option value="CMD_vs_RMD">CMD vs RMD</option>
								<option value="Security_Report1">Security Report(Nallagandla)</option>
								<option value="Security_Report2">Security Report(HillPark)</option>
								<option value="Traffic_Movement">Traffic Movement</option>
								<option value="Housekeeping_Report">Housekeeping Report</option>
								<option value="Housekeeping_Report1">Horticulture Report1</option>
								<option value="Housekeeping_Report2">Horticulture Report2</option>
								<option value="Horticulture_Pesticides">Horticulture - Pesticides</option>
								<option value="Club_House_Utilization_Data">Club House Utilization Data</option>
								<option value="Occupancy_Data">Occupancy Data</option>
								<option value="Indented_Material_Status">Indented Material Status</option>
								<option value="Apna_Complex_Complaint_Report">Apna Complex Complaint Report</option>
								<option value="Fire_Mock_Drill">Fire Mock Drill</option>
								<option value="Fire_Safety_Preparedness">Fire Safety Preparedness & Fire Alarm Operation Training</option>
						</select>				
					</div>
					<div id="reportblock"></div>
				</div>
			</div>
		{!! Form::close() !!}
	</div> 
</div>  
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
		$( document ).ready(function() {
			$('select[name="reports"]').on('change', function(){  
				 var sval = $(this).val();				 
				 if(sval == "") {				  
				   $("#reportblock").css("display", "none");	
				   $("#reportname").val(sval);			   
				 } else {				 
				 $("#reportblock").css("display", "block");
				 var thisvalue = $( this ).text();
				 var selectedText = $(this).find("option:selected").text();
					$("#communityname").html(selectedText);
					$.ajax({
						type: "get",
						cache:false,
						url: '{{ route('validation.getsiteslection') }}',
						data: { report: sval},
						success: function( response ) 
						{
							$("#reportblock").html(response);	 
						}  
					}); 
				}
			});
		});
		function checkALL(ele) {
			 var checkboxes = $(".checkboxClass");
			 if (ele.checked) {
				 for (var i = 0; i < checkboxes.length; i++) {
					 if (checkboxes[i].type == 'checkbox') {
						 checkboxes[i].checked = true;
					 }
				 }
			 } else {
				 for (var i = 0; i < checkboxes.length; i++) {
					 console.log(i)
					 if (checkboxes[i].type == 'checkbox') {
						 checkboxes[i].checked = false;
					 }
				 }
			 }
		 }
</script>
@include('partials.footer')
@stop
