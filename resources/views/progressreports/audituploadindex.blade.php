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
    <h3 class="page-title"><span>Audit Upload Reports</span></h3>
</div>
    <div class="row">   
                <div class="col-xs-12 form-group"> 
	
	<div class="yeeeeaa">
             
             <div class="selection-producure power-report">
              <span style="color:#ff2518;font-weight:bold;width:40px;float:left;line-height:29px;">Year:</span><div class="dlyrep-select"> 
					 
					
					<!--<span><input type="text" id="example1" value="<?php // echo date("d/m/Y"); ?>" class="hasDatePicker form-control"></span>-->
					 <?php $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 
								if(isset($uriSegments[2])) {	$yearn = $uriSegments[2];  }
								if(isset($uriSegments[3])) {	$monthn = $uriSegments[3]; }
									if($uriSegments[1] == 'misreportsoptions'){
									   $year = $yearn; 
						                $month = $monthn; 
									} else {
						  $year = $syear;
						  $month = $smonth;
						  }
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
					
                   <!--   <span class="misreports-labelindex">Index Date:</span> 
                      <input type="text" id="example1" value="<?php  echo date("d-m-Y"); ?>" class="hasDatePicker form-control index-date1">-->
                      </div>
                      
                      <!--<div class="downloads-section">
                      <button type="button" class="btn btn-secondary btn-downloadindex" id="download_misindex"> DOWNLOAD INDEX</button>
					 <div class="dlyrep-select wholeee"><button type="button" class="btn btn-secondary" id="download_mis"><i class="fa fa-print" aria-hidden="true" ></i> DOWNLOAD MIS REPORT</button></div></div>-->
                     </div>

				
			
				
						<table class="table table-striped2 report-status-work zebra-crossingtable">  
					<thead class="thead-dark head-color"> 
					<tr> 
					  <th>Report</th> 
					 <!-- <th style="padding-left:0px;">Status</th>-->
					  <th>Action</th> 
					
					</tr> 
					</thead>
                   
					<tbody>
					   <tr> 
					  <td><b>Club House Collection</b></td>
				<!--	  <td><i class="fa fa-check" aria-hidden="true"></i></td>-->
					  <th class="misadg"><div id="target4" class="edt"><button type="button" id="chbcedit" class="btn btn-inverse btn-xs">Edit</button></div><div id="target2" class="edt"><button type="button" id="chbcview"  class="btn btn-success btn-xs">View</button></div><button type="button" id="chbcprint" class="btn btn-print btn-xs"> Print</button> <button type="button" id="chbcdownload" class="btn btn-download btn-xs boredow">Download</button></th>
					</tr> 
                    
                     <tr> 
					  <td><b>Horticulture</b></td>
				<!--	  <td><i class="fa fa-check" aria-hidden="true"></i></td>-->
					  <th class="misadg"><div id="target4" class="edt"><button type="button" id="hortiedit" class="btn btn-inverse btn-xs">Edit</button></div><div id="target2" class="edt"><button type="button" id="hortiview"  class="btn btn-success btn-xs">View</button></div><button type="button" id="hortiprint" class="btn btn-print btn-xs"> Print</button> <button type="button" id="hortidownload" class="btn btn-download btn-xs boredow">Download</button></th>
					</tr>  
                    
                     <tr> 
					  <td><b>HR Management</b></td>
				<!--	  <td><i class="fa fa-check" aria-hidden="true"></i></td>-->
					  <th class="misadg"><div id="target4" class="edt"><button type="button" id="hrmsedit" class="btn btn-inverse btn-xs">Edit</button></div><div id="target2" class="edt"><button type="button" id="hrmsview"  class="btn btn-success btn-xs">View</button></div><button type="button" id="hrmsprint" class="btn btn-print btn-xs"> Print</button> <button type="button" id="hrmsdownload" class="btn btn-download btn-xs boredow">Download</button></th>
					</tr>  
                     
                        <tr> 
					  <td><b>Apna Complaint Report</b></td>
				<!--	  <td><i class="fa fa-check" aria-hidden="true"></i></td>-->
					  <th class="misadg"><div id="target4" class="edt"><button type="button" id="apnacompedit" class="btn btn-inverse btn-xs">Edit</button></div><div id="target2" class="edt"><button type="button" id="apnacompview"  class="btn btn-success btn-xs">View</button></div><button type="button" id="apnacompprint" class="btn btn-print btn-xs"> Print</button> <button type="button" id="apnacompdownload" class="btn btn-download btn-xs boredow">Download</button></th>
					</tr>  
					
					
					   <tr> 
					  <td><b>Petty Cash Upload</b></td>
				<!--	  <td><i class="fa fa-check" aria-hidden="true"></i></td>-->
					  <th class="misadg"><div id="target4" class="edt"><button type="button" id="pretcashedit" class="btn btn-inverse btn-xs">Edit</button></div><div id="target2" class="edt"><button type="button" id="pretcashview"  class="btn btn-success btn-xs">View</button></div><button type="button" id="pretcashprint" class="btn btn-print btn-xs"> Print</button> <button type="button" id="pretcashdownload" class="btn btn-download btn-xs boredow">Download</button></th>
					</tr>  
					
					  <tr> 
					  <td><b>Petty Cash Expense</b></td>
				<!--	  <td><i class="fa fa-check" aria-hidden="true"></i></td>-->
					  <th class="misadg"><div id="target4" class="edt"><button type="button" id="expcashedit" class="btn btn-inverse btn-xs">Edit</button></div><div id="target2" class="edt"><button type="button" id="expcashview"  class="btn btn-success btn-xs">View</button></div><button type="button" id="expcashprint" class="btn btn-print btn-xs"> Print</button> <button type="button" id="expcashdownload" class="btn btn-download btn-xs boredow">Download</button></th>
					</tr>  
                    
                     <tr> 
					  <td><b>Club House Rate Card</b></td>
				<!--	  <td><i class="fa fa-check" aria-hidden="true"></i></td>-->
					  <th class="misadg"><div id="target4" class="edt"><button type="button" id="chrtedit" class="btn btn-inverse btn-xs">Edit</button></div><div id="target2" class="edt"><button type="button" id="chrtview"  class="btn btn-success btn-xs">View</button></div><button type="button" id="chrtprint" class="btn btn-print btn-xs"> Print</button> <button type="button" id="chrtdownload" class="btn btn-download btn-xs boredow">Download</button></th>
					</tr>  
					
					</tbody>    
    
					</table>
					</div>  
					 
            </div>
					
					  
	 
	<?php /*?>   <div>Line1:  Status1 </div>
	   <div>Line2:  Status2 </div>
	   <div>Line3:  Status3 </div> 
	   <div>Line4:  Status4 </div><?php */?>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">

$( document ).ready(function() {

//STATUS REPORTS

var year = $("#mis_year").val();
var month = $("#mis_month").val();


$('#example1').datepicker({ dateFormat: "dd-mm-yy" });
	
	$( "#poweredt" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/progressreports";  
		} else {
		window.location.href = "/getprogressreportrecupdate/1/"+year+"/"+month; 
		}
	
	});
	
		$( "#chbcedit" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/auditupload";  
		} else {
		window.location.href = "/getauditreportrecupdate/1/"+year+"/"+month; 
		}
	
	});  
	
	$( "#chrtedit" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/auditupload";  
		} else {
		window.location.href = "/getauditreportrecupdate/7/"+year+"/"+month; 
		}
	
	});  
	
			$( "#hortiedit" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/auditupload";  
		} else {
		window.location.href = "/getauditreportrecupdate/2/"+year+"/"+month; 
		}
	
	});  
	
	
	$( "#hrmsedit" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/auditupload";  
		} else {
		window.location.href = "/getauditreportrecupdate/3/"+year+"/"+month; 
		}
	
	});  
	
	
	$( "#apnacompedit" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/auditupload";  
		} else {
		window.location.href = "/getauditreportrecupdate/4/"+year+"/"+month; 
		}
	
	});  
	
		$( "#pretcashedit" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/auditupload";  
		} else {
		window.location.href = "/getauditreportrecupdate/5/"+year+"/"+month; 
		}
	
	}); 
	
	$( "#expcashedit" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/auditupload";  
		} else {
		window.location.href = "/getauditreportrecupdate/6/"+year+"/"+month; 
		}
	
	}); 
	
	 
	
	
	$( "#occupncview" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecview/12/"+year+"/"+month; 
		}
	
	});
	
	$( "#occupncprint" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecprint/12/"+year+"/"+month; 
		}
	
	});
	
	$( "#occupncdownload" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecdownload/12/"+year+"/"+month; 
		}
	
	});
	
	
	
	
	/*Daily METRO Water Consumption*/

	
	$( "#firepreparedownload" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecdownload/18/"+year+"/"+month; 
		}
	
	}); 

});

 

  </script>
@include('partials.footer')
@stop