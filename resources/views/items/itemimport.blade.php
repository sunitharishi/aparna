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
	width:35%;
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
	.laggedtime label
	{
	 float:left;
	 font-weight:bold;
	 line-height:30px;
	 width:107px;
	}
	.laggedtime
	{
	color:#ff2518;
	font-weight:bold;
	margin-left:0px !important;
	width:100%;
	}
	.dlyrep-select.desi
   {
   width:100% !important;
    margin-bottom:15px !important;
   }
   .dlyrep-select.desi label
   {
   width:25% !important;
   }
   .form-inline .form-control
   {
   width:60% !important;
   }
   .form-group.tran input
   {
   background-color:transparent;
   color:black;
   width:79%;
   float:right;
   }
   .form-group.tran
   {
   float:left;
   margin-left:7%;
   }
   .form-group.tran input:hover:active
   {
   background-color:transparent;
   color:black;
   }
   .desibtn button
   {
   width:auto;
   margin-left:14%;
   background-color:#0b52e9;
   color:white;
   margin-top:6px;
   }
   .desibtn button:active
    {
   background-color:#B22E2E;
   color:white;
   }
   .desibtn button:focus
   {
   background-color:#B22E2E;
   color:white;
   }
   .desibtn button:hover
   {
   background-color:#B22E2E;
   color:white;
   }
   .help-block strong
   {
   color:#ff2518;
   font-weight:bold;
   }
   .help-block a
   {
   color:#1a816f;
   font-weight:bold;
   }
    
   .help-block b 
   {
   color:black !important;
   font-size:12px;
   }
   .desibtn
   {
   width:65%;
   display:inline-block;
   text-align:center;
   }
   .page-title.req
   {
   height:40px;
   color:#023F78;
   font-weight:bold;
   font-size:23px;
   margin-bottom:0px;
   }
	</style>
@extends('layouts.app')

@section('content')
     
<div class="min-phone-height">              
<div class="misback-button"><a href="/items">Back</a></div>
	<div class="dailyreports material-indentedstatus">
    <h3 class="page-title req" style="text-align:center;"> Import Items</h3>

  
	{!! Form::open(['files' => 'true','route' => 'uploadexcel.saveitemsuploadfile','role' => 'form', 'class'=>'form-inline upload-attendance-form', 'onsubmit' =>"return subform()"]) !!}
			
			 <div class="form-group tran">

							<label class="sr-only" for="file">Upload File</label>

							<input type="file" name="file" id="file" class="btn btn-info" title="Select File">

						  </div>
                         <div class="desibtn">
						  <button type="submit" class="btn btn-default">Upload file</button>
                         </div>

						  <div class="help-block"><strong>Note!</strong> <b>Only xls or xlsx file is allowed!!</b> <a href="{!! URL::to('/uploads/item_sample.xlsx') !!}">Click here for Sample File.</a></div>

						{!! Form::close() !!}

            
          
	
	<?php /*?>   <div>Line1:  Status1 </div>
	   <div>Line2:  Status2 </div>
	   <div>Line3:  Status3 </div> 
	   <div>Line4:  Status4 </div><?php */?>
	 </div>  
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">

$( document ).ready(function() {

$('#laggeddate').datepicker({ dateFormat: "dd-mm-yy" });

 
  $( "#select_id" ).change(function() 
  {
   var val = $(this).val();
  
   var href = window.location.href;
   //window.location = href.replace(/getdailyreport\/.*$/, "");
   window.location.href = "http://aparna.greaterkakinada.com/getdailyreport/"+val;
  // window.location.replace('getdailyreport/'+val);
	

  });
  
  $('select[name="sites"]').on('change', function(){    
    //alert($(this).val());   
	
	 var val = $(this).val();
	 
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
 //  alert(val);
   //var href = window.location.href;
   //window.location = href.replace(/getdailyreport\/.*$/, "");
   //window.location.href = "http://report.local/getdailyreportdetail";
    //  window.location.href = "http://aparna.greaterkakinada.com/getmisreportupdatedetailview/"+val; 
	  }
  // window.location.replace('getdailyreport/'+val);
	//alert(id); 
});

});


  function subform()

 {
 
 
  var site = $("#select_id11").val();
  var flag = true;
  
  if(site == ""){
    alert('Please Select Site!');
		   flag = false;
  }

	
	
	
	/*var ext = $('#file').val().split('.').pop().toLowerCase();
	alert(ext);
		if($.inArray(ext, ['xls',' xlsx']) == -1) {
		  alert('invalid extension!');
		   flag = false;
		}*/
		
		 var allowedFiles = [".xls", ".xlsx"];
        var fileUpload = $("#file");
        
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + allowedFiles.join('|') + ")$");
        if (!regex.test(fileUpload.val().toLowerCase())) {
             alert('invalid extension!');
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