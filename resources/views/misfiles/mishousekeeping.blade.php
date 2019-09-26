
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
	text-align:center;
	margin-top:10px;
	margin-bottom:25px;
	}
	.tablesaw-bar
	{
	height:30px;
	}
.x_panel
 {
 border:0px solid white;
 }
 .docs-main .house-serve
 {
  text-align:left;
  font-weight:bold;
  height:auto;
  color:#023F78;
  margin-bottom:10px;
  margin-top:0px; 
  font-size:23px;
 }
 .icluding-cro1
 {
  padding-left:0px !important;
 }	
 .icluding-cro
 {
  padding-left:0px;
  padding-top:0px;
  padding-right:0px;
 }	
 .housesco.actual-link
 {
  padding-left:0px;
 }
 .dlyrep-select.invaluable label
 {
  width:40px !important;
  font-weight:bold;
  line-height:20px;
  color:#ff2518;
  float:left;
 }
 .dlyrep-select.invaluable select
 {
  width:200px;
  float:left;
 }
 .tablesaw.tablesaw-swipe
 {
  width:60%;
  margin:0 auto;
 }
 .x_content.security-safety
 {
  margin-top:0px;
  padding:0px;
 }
 .fireseafmis input[type="checkbox"]
 {
  margin-right:4px;
 }
 .fireseafmis2 input[type="checkbox"]
 {
  margin-right:4px;
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
	.odesittti
	{
	 width:60%;
	 margin:0 auto;
	}
 </style>
@extends('layouts.app')


@section('content')
  <?php $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 
									$year = $uriSegments[3]; 
									$month = $uriSegments[4]; 
									?>
              
<div class="misback-button"><a href="/misreportsoptions/<?php echo $year."/".$month ?>">Back</a></div> 
{!! Form::open(['method' => 'POST', 'route' => ['misreports.storemishousekp'], 'class' => 'for-labelling' ,'onsubmit' =>"return subform()"]) !!}

<div class="col-md-12 col-sm-12 col-xs-12 icluding-cro1" style="padding-right:0px;">
              <div class="x_panel tile fixed_height_400 icluding-cro">
                <div class="x_title">
                   <!--<h3>Metro Water Supply details from  01.12.2017 to 31.12.2017</h3>-->
                </div>
                <div class="x_content housesco1 actual-link">
    
	<div class="docs-main ">
	 
        <h3 class="house-serve"> Report on House keeping </h3> 
        
        <div class="dlyrep-select fire2mis invaluable">
					 {!! Form::label('dailycat1', 'Sites:', ['class' => 'control-label']) !!}
                    {!! Form::select('sites', $sitenames, old('category'), ['class' => 'form-control', 'id' => 'select_id11']) !!}				
					</div>
					{!! Form::hidden('user_id','1', ['class' => 'larev', 'placeholder' => '']) !!}
					  
			
			{!! Form::hidden('month',$report_month, ['class' => 'larev', 'placeholder' => '','id' =>'month']) !!}
			{!! Form::hidden('year',$report_year, ['class' => 'larev', 'placeholder' => '','id' => 'year']) !!}

		 
<div id="reportblock" style="display:none">  
            <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left:0px;padding-right:0px;">
              <div class="x_panel tile fixed_height_400" style="padding-left:0px;padding-right:0px;">
                <div class="x_title">
                   <!--<h3>Metro Water Supply details from  01.12.2017 to 31.12.2017</h3>-->
                </div>
                <div class="x_content security-safety" style="padding-left:0px;">
    
    
	<div class="docs-main housekeeping-editpage">   
	    
       
		<div id="validresponse" class="table-responsive">
    
	    
       <!--   <h3>  Fire Safety Equipment Status </h3>    -->
       
      
                      </div>  
					   <?php  $n=0; ?>  
           <div class="odesittti"><div class="fireseafmis"><input type="checkbox" value="correct" class="confirmed" name="confirmdata"><span style="color:#1a816f;font-weight:bold;">Save as</span><span style="color:#c22804;font-weight:bold;"> Draft</span></div>
        <div class="fireseafmis2"><input type="checkbox" value="1" class=""  name="report_status"><span style="color:#520990;font-weight:bold;">I accept given data period of overall month</span></div></div>
        <div class="col-sm-12 col-xs-12 submit-button save-button">
         <input type="hidden" id="id" value="<?php echo ++$n; ?>">
            
            {!! Form::submit('Save', ['class' => 'btn btn-danger']) !!}
 
	
	</div>
    
                        
                </div>
              </div>
            </div>   
            </div>
			
	
	<?php /*?>   <div>Line1:  Status1 </div>
	   <div>Line2:  Status2 </div>
	   <div>Line3:  Status3 </div> 
	   <div>Line4:  Status4 </div><?php */?>
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
				url: '{{ route('validation.gethousekpmisvalues') }}',
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


/*$( "#jk_pump_nw" ).change(function() {
  alert( "Handler for .change() called." );
   var jkn = $("#jk_pump_nw").val();
   alert(jkn);
   var jv = 0;
 if(jkn != ""){
     jv = parseFloat(jkn);
	 alert(jv);
	 if(jv > 0){
	 	addFormField(); 
	 }
 }
});*/  



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