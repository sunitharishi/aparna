
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
	<link media="all" type="text/css" rel="stylesheet" href="{{ url('scripts/third/summernote') }}/summernote.css">
    <style>
	.errval
   {
	border-color: red !important;
	border-width: 1.5px !important;
   } 
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
	.docs-main h3
	{
	text-align:left;
	margin-top:0px;
	margin-bottom:10px;
	color:#023F78;
	}
	.tablesaw-bar
	{
	height:30px;
	}
	.form-group.padin
	{
	padding-left:0px;
	}
	.tablesaw
	{
	width:50%;
	margin-bottom:10px;
	clear:both;
	margin:0 auto;
	}
	.mische3
	{
	 padding-top:6px;
	}
	.x_panel
	{
	border:0px solid white;
	}
	.submit-button input[type="submit"]:hover
	{
	 background-color:#003087;
	}
	.mische4 input[type="checkbox"]
	{
	 margin-right:4px;
	}
	.mische3 input[type="checkbox"]
	{
	 margin-right:4px !important;
	 
	}
	.save-button input[type="submit"]
	{
	 text-shadow: 0px -1px 0px rgba(0,0,0,.5);
    color: #ffffff;
    padding: 7px 30px;
    background-color: #B22E2E;
    background-image: -moz-linear-gradient(top, #E95D5D, #E40304);
    background-image: -ms-linear-gradient(top, #E95D5D, #E40304);
    background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#E95D5D), to(#E40304));
    background-image: -webkit-linear-gradient(top, #E95D5D, #E40304);
    background-image: -o-linear-gradient(top, #E95D5D, #E40304);
    background-image: linear-gradient(top, #E95D5D, #E40304);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#E95D5D', endColorstr='#E40304', GradientType=0);
    border-color: #C00;
    border-color: rgba(0, 0, 0, 0.15);
	width:100px;
	}
	.x_content.housesco2.housellly
	{
	 margin-top:0px;
	 padding-left:0px;
	}
	</style>
    <title>Metro water Report</title>
@extends('layouts.app')


@section('content')

  <?php $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 
									$year = $uriSegments[3]; 
									$month = $uriSegments[4]; 
									?>
              
<div class="misback-button"><a href="/misreportsoptions/<?php echo $year."/".$month ?>">Back</a></div>
<div class="col-md-12 col-sm-12 col-xs-12" style="padding-left:0px;padding-right:0px;">
              <div class="x_panel tile fixed_height_400" style="padding-top:0px;padding-left:0px;padding-right:0px;">
                <div class="x_title">
                   <!--<h3>Metro Water Supply details from  01.12.2017 to 31.12.2017</h3>-->
                </div>
                <div class="x_content housellly">
    
<div class="docs-main watersource-editpage">
	   
       <?php /*?> <h3><b>Metro water Report <span style="color:#ff2518;"><?php echo $report_on; ?></b></h3></span><?php */?>
		{!! Form::open(['method' => 'POST', 'route' => ['misreports.storemetrowater'], 'class' => 'for-labelling' ,'onsubmit' =>"return subform()"]) !!}
       <!-- <div class="col-xs-4 form-group padin">-->
				
				<?php /*?> {!! Form::label('dailycat', 'Community', ['class' => 'control-label']) !!}
				   
					{{ Form::select('sites', [
					'0' => 'All', 
					'1' => 'Sarovar', 
					'2' => 'Grande','3' => 'CyberZon'], ['class' => 'form-control', 'id' => 'select_id']
					) }} <br/><?php */?>
					
					
					
               <!-- </div>-->
                  <div id="reportblock"> 

		                
					
			 <div class="additional-information" id="addtionalinfo">
		<span>Additional Information:</span>
					  <textarea class="form-control summernote-small" placeholder="Enter Description" name="additional_info" cols="50" rows="10" id="additional_info"><?php if(isset($res['additional_info'])) echo $res['additional_info']; ?></textarea>
					  </div>
                 
                 
		
            
 		    {!! Form::hidden('user_id','1', ['class' => 'larev', 'placeholder' => '']) !!}
			{!! Form::hidden('record_id',$res['record_id'], ['class' => 'larev', 'placeholder' => '','id' => 'record_id']) !!}
			{!! Form::hidden('month',$report_month, ['class' => 'larev', 'placeholder' => '','id' =>'month']) !!}
			{!! Form::hidden('year',$report_year, ['class' => 'larev', 'placeholder' => '','id' => 'year']) !!}
			{!! Form::hidden('flats','', ['class' => '', 'placeholder' => '', 'id' => 'flats_id']) !!}
                  
                  
                          
	

       <div class="mische3"> <input type="checkbox" value="correct" class="confirmed" name="confirmdata"><span style="color:#1a816f;font-weight:bold;">Save as</span><span style="color:#c22804;font-weight:bold;"> Draft</span></div>
        <div class="mische4"><input type="checkbox" value="1" class=""  name="report_status" style="margin-right:7px;"><span style="color:#520990;font-weight:bold;">I accept given data period of overall month</span></div>
        <div class="col-sm-12 col-xs-12 submit-button save-button">
            
            {!! Form::submit('Save', ['class' => 'btn btn-danger']) !!}
            
           
            
        </div>
		</div>   
       {!! Form::close() !!}
	
	</div>
    
                        
                </div>
              </div>
            </div>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>		
    <script src="/build/js/custom.min.js"></script>	
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script>	
 $( document ).ready(function() {
 
   $('#additional_info').summernote({

              height:200,

            });
  
	$('select[name="sites"]').on('change', function(){    
	var val = $(this).val();
	var year = $("#year").val();
	var month = $("#month").val();
	if(val == "") {
	$("#reportblock").css("display", "none");
	} else {
	$("#reportblock").css("display", "block"); 
	var thisvalue = $( this ).text();
	var selectedText = $(this).find("option:selected").text();
	// alert(selectedText);
	$(".communityname").html(selectedText);
	$("#siteid").val(val);
	
	//AJAX CALL
	
	   $.ajax({
				type: "get",
				cache:false,
				dataType: "json",
				url: '{{ route('validation.getwaterconsump') }}',
				data: { site: val, year: year, month: month},
				success: function( response ) {
				 //var obj = jQuery.parseJSON( response);
			  //$("#additional_info").text(response["additional_info"]);
			  $("#record_id").val(response["record_id"]);
			  $("#addtionalinfo").html('Additional Information: <textarea class="form-control summernote-small" placeholder="Enter Description" name="additional_info" cols="50" rows="10" id="additional_info">'+response["additional_info"] +'</textarea>');
			  
			   $('#additional_info').summernote({

              height:200,

            });
			 
			  
			    
				}  
        });

	 
	//END AJAX CALL
	
	
	}
	
	});
 
 });
 
 function getvalidSum(dis)
 {

  var resocc = 0;
  var totfl = 0;
  
 var  nwbores = $("#nw_bores_num").val();
 var  over_load = $("#over_load").val();
 var motor_brunt = $("#motor_brunt").val();
	/*alert(nwbores);
	alert(over_load);
	alert(motor_brunt);*/
	if(nwbores == "") { nwbores = 0;}
  if(over_load == "") { over_load = 0;}
   if(motor_brunt == "") { motor_brunt = 0;}
   
   totfl = parseFloat(over_load) + parseFloat(motor_brunt);
  
   if(parseFloat(nwbores) < parseFloat(totfl)) {   
	  $("#over_load").addClass('errval');
	  $("#motor_brunt").addClass('errval'); 
   }
    else{
	  $("#over_load").removeClass('errval');
	  $("#motor_brunt").removeClass('errval');
	}
} 

	 
function subform()

 {

	var flag = true;

	$( ".number" ).each(function() {

		if(($( this ).val().length <= 0)){


		}

		else{
		 if(isNaN($( this ).val())){

			     flag = false;


				 $(this).addClass("numerror");

			 }

			 else{

			    $(this).removeClass("numerror"); 
			 }

		}

	}); 
	
	
	if ($('.confirmed:checked').length == 0) {

	

	 alert("Please confirm given data period of overall month")

	 flag = false;

	} 


if(flag == true){

  return true; 

}

else{
return false;    
}

 }


  </script>
   @include('partials.footer')
@stop