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

  <?php $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 
									$year = $uriSegments[3]; 
									$month = $uriSegments[4]; 
									?>
              
<div class="misback-button"><a href="/misreportsoptions/<?php echo $year."/".$month ?>">Back</a></div>

   
	<div class="dailyreports firesafety-preparedness">
    <h3 class="page-title req" style="text-align:center;">Fire Mock Drill</h3>
{!! Form::open(['files' => 'true','route' => 'uploadexcel.savemockdrill','role' => 'form', 'class'=>'form-inline upload-attendance-form', 'onsubmit' =>"return subform()"]) !!}
	
	<div class="row">
                <div class="col-xs-12 form-group desi2">
                      <?php  $n=0; ?>
					<div class="dlyrep-select desi" style="width:600px !important;">
                    	<div style="text-align:center; width:295px; margin:0px auto;">
                             {!! Form::label('dailycat1', 'Sites:', ['class' => 'control-label']) !!}
                             {!! Form::select('sites', $sitenames, old('category'), ['class' => 'form-control', 'id' => 'select_id11']) !!}				
                    	</div><br clear="all" />
						<div style="text-align:center; width:370px; margin:0px auto;"><label class="conducterd-label">Conducted Date: </label><input type="text" id="date_of_conducted" style="margin-top:10px;" name="date_of_conducted" value="<?php  echo date("d-m-Y"); ?>" class="hasDatePicker form-control"></div> 
					</div>					
                      <input type="hidden" id="id" value="<?php echo ++$n; ?>">
                      <input type="hidden" id="month" name="month" value="<?php echo $report_month; ?>">
                      <input type="hidden" id="year" name="year" value="<?php echo $report_year; ?>"> 
                      <input type="hidden" name="user_id" value="<?php echo "1"; ?>"> 
                      <div class="desi3">
                      <input type="file" name="file[]" required id="file" class="btn btn-info" title="Select File">
                      <input type="text" name="title[]" required id="title" class="btn btn-info" title="Enter Title">
					 <a href="#" onclick="addFormField(); return false;" class="adding-more" style="font-weight:bold; font-size:21px; color:#0b1cff; text-decoration:none; float: right;display:inline-block;width:auto;position:relative;">+</a></div>
                        <div id="divTxt"> 

                       	</div>
                </div>
            </div>
            <div class="desibtn" style="text-align:center; margin-bottom:20px;">
             <button type="submit" class="btn btn-default">Upload file</button>
            </div>
			<div style="text-align:center;">Upload image Size with[300X150]</div>
            
            {!! Form::close() !!}
		
		  
		 
	
	<?php /*?>   <div>Line1:  Status1 </div>
	   <div>Line2:  Status2 </div>  
	   <div>Line3:  Status3 </div> 
	   <div>Line4:  Status4 </div><?php */?>
	 </div>  
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
  
$( document ).ready(function() {
$('#date_of_conducted').datepicker({ dateFormat: "dd-mm-yy" });
  $( "#select_id" ).change(function()  
  {
   var val = $(this).val();   
  
   var href = window.location.href;
   //window.location = href.replace(/getdailyreport\/.*$/, "");
   window.location.href = "http://aparna.greaterkakinada.com/getdailyreport/"+val;
  // window.location.replace('getdailyreport/'+val);
	

  });
  
  $('select[name="sites"]').on('change', function(){    
     var val = $(this).val();
	 var year = $("#year").val();
	 var month = $("#month").val();
	 
	  if(val == "") {	  
	  	 $("#reportblock").css("display", "none");
	 } 
	 else {
	 
	 	$("#reportblock").css("display", "block");
	 	var thisvalue = $( this ).text();
	    var selectedText = $(this).find("option:selected").text();
		$("#communityname").html(selectedText);
		$.ajax({
			type: "get",
			cache:false,
			url: '{{ route('validation.getmockdrillcount') }}',
			data: { site: val, year: year, month: month},
			success: function( response ) 
			{
				$("#id").val(response);				 
			}  
		}); 
	  }
	});

});

function addFormField() {

		

		var id = document.getElementById("id").value;
		
		if(id>9) 
		{
			alert("Need to upload only 10 Photos");
			return false;
		}

		var feet = "";

		if($("#feet").val()!=null) feet=$("#feet").val();   

		

		$("#divTxt").append("<div id='row" + id + "' class='desi3'><div class='pre'><input type='file' required name='file[]' class='btn btn-info' title='Select File'><input type='text' required name='title[]' class='btn btn-info'><a href='#' onClick='removeFormField(\"#row" + id + "\"); return false;' class='remove'>X</a></div></div>");

		id = parseInt(id) + 1;

		console.log('id: ', id);

		document.getElementById("id").value = id;	

		

	}
	
	
	function removeFormField(id) {

		$(id).remove(); 

		var id = document.getElementById("id").value;

		id = (id - 1);

		document.getElementById("id").value = id;

		;

	}

  
  </script>
  @include('partials.footer')

@stop
