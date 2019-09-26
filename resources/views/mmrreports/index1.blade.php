<style>
.dlyrep-select button
{
 background-color: #8dbb3c;
 color: #fff;
 font-weight: 600;
}
.table.report-status-work
{
 width:70%;
 margin:0 auto;
}
.table-striped2 tbody tr th
{
 padding:4px !important;
} 
.table-striped2 tbody tr td
{
 padding:4px !important;
}
.table-striped2 tbody tr:nth-of-type(odd) 
{
 background-color: #f0f3f7;
}
.table.table-striped2.report-status-work button
{
 height:23px;
 width:40px;
 float:left;
}
.table.table-striped2.report-status-work button.btn-download
{
 height:23px;
 width:72px;
 float:left;
}
.table.table-striped2 tr td i.fa-check
{
 color:green;
}
.table.table-striped2 tr td i.fa-times
{
 color:red;
}
.dlyrep-select select
{
 width:80px;
 float:left;
 margin-right:10px;
}
.yeeeeaa
{
 width:70%;
 margin:0 auto;
 margin-bottom:15px;
 overflow:hidden;
}
.dailyreports.getdailyreport
{
 width:70%;
 margin:0 auto;
}
#metrowaedit, .viewclass, .report-status-work.zebra-crossingtable tbody tr th.misadg #clubutilview
{
 margin-left:17.5%;
}


.dlyrep-select.wholeee
{
 float:right;
}
.misadg .occupancy-date, .occupancy-date
{
 margin-left:17.5% !important;
}
.downloads-section
{
 float:left;
 width:44%;
} 
.selection-producure
{
 float:left;
 width:56%;
} 
</style>
 

@extends('layouts.app')

@section('content')
	<div class="dailyreports getdailyreport">
    <h3 class="page-title"><span> MMR</span></h3>
</div>
    <div class="row">  
                <div class="col-xs-12 form-group"> 
	
	<div class="yeeeeaa">
             
             <div class="selection-producure">
              <span style="color:#ff2518;font-weight:bold;width:40px;float:left;line-height:29px;">Year:</span><div class="dlyrep-select"> 
					 
				      <?php  $year = date("Y");
				          $month = date('m');
				   ?>
					 <select name='mis_year' id="mis_year" class="form-control"> 
                         <option value="">Select Year</option>
						 <?php for($i=2018;$i<=2030;$i++){ ?>
						 <option value="<?php echo $i; ?>" <?php if($year == $i) echo 'Selected';?>><?php echo $i; ?></option>
						 <?php } ?>
					</select> 
					</div>  
					
						<span style="color:#ff2518;font-weight:bold;width:50px;float:left;line-height:29px;">Month:</span><div class="dlyrep-select"> 
					 
					 
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
                      
                      <div class="downloads-section">
             
					 <div class="dlyrep-select wholeee"><button type="button" class="btn btn-secondary" id="download_mis"><i class="fa fa-print" aria-hidden="true" ></i> DOWNLOAD MMR REPORT</button></div></div>
                     </div>
					</div>  					 
            </div>
					
					


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">

$( document ).ready(function() {

//STATUS REPORTS

var year = $("#mis_year").val();
var month = $("#mis_month").val();

      $.ajax({
				type: "get",
				cache:false,
				url: '{{ route('validation.checkmisstatusreports') }}',
				data: { year: year, month: month},
				success: function( response ) {
				 //var obj = jQuery.parseJSON( response);
                   //alert(obj.status);
			 //  alert(response[0]);
			     $("#validresponse").html(response);
				 setenablebtn();
				
				}  
        });
 


$('#example1').datepicker({ dateFormat: "dd-mm-yy" });

$( "#download_mis" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/mmr";  
		} else {
		window.location.href = "/downloadoverallmmr/"+year+"/"+month; 
		}
	});
 
});



  </script>
@include('partials.footer')
@stop 