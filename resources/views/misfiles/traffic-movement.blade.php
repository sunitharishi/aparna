
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
    <link rel="stylesheet" href="../css/component.css">
	<link rel="stylesheet" href="/dist/tablesaw.css">
	<link rel="stylesheet" href="/demo/demo.css">
	<link rel="stylesheet" href="//filamentgroup.github.io/demo-head/demohead.css">
    <style>
	.errval
   {
	border-color: red !important;
	border-width: 1.5px !important;
   } 
   
	.movement table tr td
	{
	 padding:2px;
	}
	.x_panel
	{
	 border:0px;
	}
	.x_title
	{
	 border-bottom:0px;
	}
	.select-site
	{
	 padding-left:0px !important;
	 margin-bottom:20px;
	}
	.select-site select
	{
	 border:1px solid #ccc;
	}
	.submit-button input[type="submit"]
	{
	 background-color: #0099FF;
    width: 200px;
    height: 35px;
    color: #FFFFFF;
    font-size: 16px;
    border-radius: 4px;
    font-weight: bold;
    cursor: pointer;
    border: 0px solid;
	}
	.momentt-datta
	{
	 height:auto;
	 margin-top:0px;
	 margin-bottom:10px;
	 font-weight:bold;
	 color:#023F78;
	 font-size:23px;
	}
	.docs-main
	{
	 max-width:100%;
	 margin:0px;
	}
	.dlyrep-select.fire2mis.delay
	{
	 margin-bottom:10px;
	 overflow:hidden;
	}
	.dlyrep-select.fire2mis.delay label
	{
	 width:40px;
	 font-weight:bold;
	 color:#ff2518;
	 line-height:16px;
	 font-size:14px;
	 float:left;
	}
	.dlyrep-select.fire2mis.delay select
	{
	 width:200px;
	 float:left;
	}
	.tablesaw.tablesaw-swipe
	{
	 clear:both;
	 margin-top:10px;
	 width:40%;
	 margin:0 auto;
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
	.save-button input[type="submit"]:hover
	{
	 background-color:#003087;
	}
	
	.fireseafmis input[type="checkbox"]
	{
	 margin-right:4px;
	}
	.fireseafmis2 input[type="checkbox"]
	{
	 margin-right:4px;
	
	}
	.simplllly
	{
	 width:25%;
	 margin:0 auto;
	}
	.x_panel.fixed_height_400
	{
	 padding:0px;
	}
	.trafficpeg input
	{
	 width:4%;
	}
	</style>
    <title>Traffic Movement</title>
@extends('layouts.app')


@section('content')
  <?php $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 
									$year = $uriSegments[3]; 
									$month = $uriSegments[4]; 
									?>
              
<div class="misback-button"><a href="/misreportsoptions/<?php echo $year."/".$month ?>">Back</a></div>
{!! Form::open(['method' => 'POST', 'route' => ['misreports.storemistraffic'], 'class' => 'for-labelling' ,'onsubmit' =>"return subform()"]) !!}
<div class="col-md-12 col-sm-12 col-xs-12" style="padding-left:0px;padding-right:0px;">
	<div class="x_panel tile fixed_height_400">
		<div class="x_content">
    
<div class="docs-main ">
	   
        <h3 class="momentt-datta"><b>Traffic Movement data on avg. per day</b></h3>
      <div class="dlyrep-select fire2mis delay">
					 {!! Form::label('dailycat1', 'Sites:', ['class' => 'control-label']) !!}
                    {!! Form::select('sites', $sitenames, old('category'), ['class' => 'form-control', 'id' => 'select_id11']) !!}				
					</div>
					{!! Form::hidden('user_id','1', ['class' => 'larev', 'placeholder' => '']) !!}
					  
			
			{!! Form::hidden('month',$report_month, ['class' => 'larev', 'placeholder' => '','id' =>'month']) !!}
			{!! Form::hidden('year',$report_year, ['class' => 'larev', 'placeholder' => '','id' => 'year']) !!}
					
                </div>
                 
   <div id="reportblock" style="display:none">
       <div id="validresponse">
    
	    
       <!--   <h3>  Fire Safety Equipment Status </h3>    -->
       
      
                      </div>  
       
        <?php  $n=0; ?>  
            <div class="simplllly traffic-movement"><div class="fireseafmis"><input type="checkbox" value="correct" class="confirmed" name="confirmdata"><span style="color:#1a816f;font-weight:bold;">Save as</span><span style="color:#c22804;font-weight:bold;"> Draft</span></div>
         <div class="fireseafmis2"><input type="checkbox" value="1" class=""  name="report_status" ><span style="color:#520990;font-weight:bold;">I accept given data period of overall month</span></div></div>
        <div class="col-sm-12 col-xs-12 submit-button save-button">
         <input type="hidden" id="id" value="<?php echo ++$n; ?>">
            
            {!! Form::submit('Save', ['class' => 'btn btn-danger']) !!}
	    
       <!--   <h3>  Fire Safety Equipment Status </h3>    -->
   
		
		

	
	</div>
    </div> 
    
                        
                </div>
              </div>
            </div>
	 {!! Form::close() !!}
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="/build/js/custom.min.js"></script>	
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script type="text/javascript">

$( document ).ready(function() {

  $('select[name="sites"]').on('change', function(){    
    //alert($(this).val());   

	 var val = $(this).val();
	var year = $("#year").val();
	var month = $("#month").val();
	 
	  if(val == "") {  
	  
	   $("#reportblock").css("display", "none");
	//  var href = window.location.href;
   //window.location = href.replace(/getdailyreport\/.*$/, "");
   //window.location.href = "http://aparna.greaterkakinada.com/dailyreports";  
	   
	 } else {
	 
	 $("#reportblock").css("display", "block");
	 var thisvalue = $( this ).text();
	  var selectedText = $(this).find("option:selected").text();
            	// alert(selectedText);
				 $("#communityname").html(selectedText);
				 
				 //AJAX CALL
	
	   $.ajax({
				type: "get",
				cache:false,
				url: '{{ route('validation.gettrafficvalues') }}',
				data: { site: val, year: year, month: month},
				success: function( response ) {
				
				$("#validresponse").html(response);
				 //var obj = jQuery.parseJSON( response);
                 //  alert(response); 
			   
			         
				}  
        }); 

	   
	//END AJAX CALL
 
	  }
  // window.location.replace('getdailyreport/'+val);
	//alert(id); 
});






});
  
  
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
 
