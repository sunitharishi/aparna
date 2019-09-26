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
.misadg .occupancy-date, .occupancy-date, .edt.traffic
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
    <h3 class="page-title"><span>Fire Reports</span></h3>
</div>
    <div class="row getmis-reports">  
        <div class="col-xs-12 form-group"> 
            <div class="yeeeeaa">                     
                 <div class="selection-producure">
                  	    <span style="color:#ff2518;font-weight:bold;width:40px;float:left;line-height:29px;">Year:</span>
                        <div class="dlyrep-select"> 
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
                        	<span style="color:#ff2518;font-weight:bold;width:50px;float:left;line-height:29px;">Month:</span>
                            <div class="dlyrep-select"> 
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
                    </div>
                    <table class="table table-striped2 report-status-work zebra-crossingtable">  
                    		<thead class="thead-dark head-color"> 
                                    <tr> 
                                      <th>Report</th> 
                                      <th width="100px">Action</th>                                     
                                    </tr> 
							</thead>
                            <tbody>
                                 <tr> 
                                  <td><b>Status of Fire NOC Renewals</b></td>
                                  <th class="misadg"><div id="nocedit" class="edt"><button type="button" id="noceditbtn" class="btn btn-inverse btn-xs">Edit</button></div></th>
                                </tr> 
                    		</tbody>
                    </table>					 
            </div>
	 </div>  

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">

$( document ).ready(function(){
   var year = $("#mis_year").val();
   var month = $("#mis_month").val();
   $('#example1').datepicker({ dateFormat: "dd-mm-yy" });	
   $( "#noceditbtn" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		window.location.href = "/firereports";  
		} else {
			window.location.href = "/getnocrecupdate/"+year+"/"+month; 
		}
	});
});

 

  </script>
@include('partials.footer')
@stop