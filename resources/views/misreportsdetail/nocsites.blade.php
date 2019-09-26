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
	.numerror
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
	.communityinpu tr td input.board
	{
	 width:40%;
	 float:left;
	}
	.communityinpu tr td input.boardblack
	{
	 width:50%;
	 float:left;
	 margin-left:8px;
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
	.x_panel
	{
	border:0px solid white;
	}
	.page-title.fire-sfty
	{
	 height:auto;
	 color:#023F78 !important;
	 font-weight:bold;
	 font-size:23px;
	}
	.sub-hydrant
	{
	 margin-bottom:0px !important;
	}
	.sub-hydrant .sub-ordinate
	{
	 margin-bottom:0px !important;
	}
	.sub-hydrant .dlyrep-select.sub-ordinate label
	{
	 font-weight:bold;
	 color:#ff2518;
	 line-height:16px;
	 width:40px;
	 font-size:14px;
	}
	.suupply
	{
	 padding-left:0px !important;
	 padding-right:0px !important;
	}
	.god-sake
	{
	 padding-left:0px;
	 padding-right:0px;
	}
	.description-issue
	{
	 overflow:hidden;
	 width:70%;
	 margin:0 auto;
	}
	.description-issue .col-sm-4
	{
	 margin-bottom:10px;
	}
	.description-issue .col-sm-8
	{
	
	 margin-bottom:10px;
	}
	.description-issue .col-sm-8 input
	{
	 border: 1px solid #949393;
	}
	.description-issue .col-sm-6
	{
	 margin-bottom: 10px;
    margin-top: 10px;
	}
	.description-issue .col-sm-6 input
	{
	 border: 1px solid #949393;
	}
	.textname
	{
	 margin-top:10px;
	 padding-left: 15px;
    font-weight: bold;
	}
	.docs-main input[type=checkbox]
	{
	 margin-right: 4px;
     margin-left: 2px;
	}
	.housesco212
	{
	 padding-left:0px;
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
	.tablesaw.tablesaw-swipe
	{
	 width:70%;
	 margin:0 auto;
	}
	.accippt-report
	{
	 width:70%;
	 margin:0 auto;
	}
	.eeight
	{
	border: 1px solid #8a8787;
    border-radius: 5px;
    overflow: hidden;
    margin: 18px 0px;
    background-color: #f7f6f6;
	}
	.ddescrrriptioon
	{
	 margin-top:10px;
	}
	</style>
@extends('layouts.app')

@section('content')

<?php 
	$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 
?>           

<div class="dailyreports">
    <h3 class="page-title fire-sfty">Fire Reports >> NOC</h3>
	<div class="row">
		<div class="col-xs-12 form-group sub-hydrant">			
			<div class="dlyrep-select sub-ordinate" style="float:left; width:210px;">
            	  <input type="hidden" value="<?php echo $year; ?>"  id="valid_year"/>
                  <input type="hidden" value="<?php echo $month; ?>"  id="valid_month"/>
				 {!! Form::select('sites', $sitenames, old('category'), ['class' => 'form-control', 'id' => 'select_id11']) !!}				
			</div>				
		</div>
	</div>
	<div class="docs-main"><div id="validresponse" class="firesafety-editpage"></div></div>
</div>  

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="/build/js/custom.min.js"></script>	
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script type="text/javascript">
	$('select[name="sites"]').on('change', function()
	{  
		var val = $(this).val();
		var year = $("#valid_year").val();
		var month = $("#valid_month").val();		 
		if(val == "")  $("#reportblock").css("display", "none");
		else 
		{		 
		 $("#reportblock").css("display", "block");
		 var thisvalue = $( this ).text();
		 var selectedText = $(this).find("option:selected").text();
		 $("#communityname").html(selectedText);
		 $.ajax(
		 {
			type: "get",
			cache:false,
			url: '{{ route('validation.getfiresafenocvalues') }}',
			data: { site: val, year: year, month: month},
			success: function( response ) {
			
			$("#validresponse").html(response);
			 //var obj = jQuery.parseJSON( response);
			 //  alert(response); 
			$("#fire_mock_drill_next").datepicker({
				dateFormat: "dd-mm-yy",
			});
			$("#fire_mock_drill").datepicker({
				dateFormat: "dd-mm-yy",
			}); 
			
			$('#additional_info').summernote({

		  height:200,

		});
	   }  
	  }); 
	}});
   $( document ).ready(function() 
   {
   		$(".dtpick").datepicker({
	 	dateFormat: "dd-mm-yy",
		});
	});
	function sclub(id,dis)
	{
		if(dis=='No') { 
			$(".clubhouse_dispaly").hide();
			$(".blockname").val("");
			$(".clubhouse_dispaly input").removeClass("ereq");
		}
		else 
		{
			$(".clubhouse_dispaly").show();
			$(".blockname").val("Club House");
			$(".clubhouse_dispaly input").addClass("ereq");
		}
		
	}
	function selectvalid123(id){
	
	  if($("#dateval_"+id).hasClass("dtpick")) {
		 $("#dateval_"+id).removeClass('dtpick')
		 $("#dateval_"+dis).removeClass("hasDatepicker");
	  }else{
	   $("#dateval_"+id).removeClass('dtpick');
	   $("#dateval_"+id).removeClass("hasDatepicker");
	   $("#dateval_"+id).addClass("dtpick");
	   $(".dtpick").datepicker({
		 dateFormat: "dd-mm-yy",
		});  
	  }
	}
	
	function disselectvalid123(dis){
	  $("#dateval_"+dis).removeClass("dtpick");
	  $("#dateval_"+dis).removeClass("hasDatepicker"); 
	  var parent =  $("#dateval_"+dis).parent();
	  var htmltext =  $("#dateval_"+dis).parent().html(); 
	   $("#dateval_"+dis).remove();
	   parent.html(htmltext);
	   
	}
	function subform()
	{
		var flag = 0;
		$("input.ereq,select.ereq").each(function(){
			var s = $(this).attr('name');
			if (($(this).val())== ""){
				console.log("One"+s);
				$(this).addClass("error");
				flag = flag+1;
			}
			else
			{
				$(this).removeClass("error");
			}  
		});
		if(flag>0) { 
			alert("All Fields Required");
			$("html, body").animate({ scrollTop: 0 }, "slow");
			return false;
		}
		else {
			alert("Success");
			return true;
		}
	}
</script>
   @include('partials.footer')
@stop