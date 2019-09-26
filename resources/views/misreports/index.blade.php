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
 
<?php 
	/*$editAction = "";
	if($userid==1 || $userid==3 || $userid==25 || $userid==27 || $userid==61 || $userid==29 || $userid==41 || $userid==47 || $userid==57 || $userid==84 || $userid==93)
	{
		$editAction = "On";
	}
	else
	{
		$editAction = "On";
	}*/
	$role_id = Auth::user()->role_id;
	if($role_id==1 || $role_id==17 || $userid==15 || $userid==11)
	{
		$editAction = "On";
	}
	else
	{
		$editAction = "On";
	}
	//echo $editAction;
 ?>
@extends('layouts.app')

@section('content')
	<div class="dailyreports getdailyreport">
    <h3 class="page-title"><span>MIS Reports</span></h3>
</div>
    <div class="row getmis-reports">  
                <div class="col-xs-12 form-group"> 
				<?php checkmisstatus('3','2018','borewellsnw');?>
	
	<div class="yeeeeaa">
             
             <div class="selection-producure">
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
					
                      <span class="misreports-labelindex">Index Date:</span> 
                      <input type="text" id="example1" value="<?php  echo date("d-m-Y"); ?>" class="hasDatePicker form-control index-date1">
                      </div>
                      
                      <div class="downloads-section">
                      <?php /*?><button type="button" class="btn btn-secondary btn-downloadindex" id="download_misindex"> DOWNLOAD INDEX</button><?php */?>
					  <a  href="/missiteselection" class="btn btn-secondary btn-downloadindex">MIS SITES SELECTION</a>
					 <div class="dlyrep-select wholeee"><button type="button" class="btn btn-secondary" id="download_mis"><i class="fa fa-print" aria-hidden="true" ></i> DOWNLOAD MIS REPORT</button></div></div>
                     </div>

				
				<?php /*?> {!! Form::label('dailycat', 'Community', ['class' => 'control-label']) !!}
				   
					{{ Form::select('sites', [ 
					'0' => 'All',
					'1' => 'Sarovar', 
					'2' => 'Grande','3' => 'CyberZon'], ['class' => 'form-control', 'id' => 'select_id']
					) }} <br/><?php */?>
					<div id="validresponse">
						<table class="table table-striped2 report-status-work zebra-crossingtable">  
					<thead class="thead-dark head-color"> 
					<tr> 
					  <th>Report</th> 
					  <?php /*?><th style="padding-left:0px;">Status</th><?php */?>
					  <th>Action</th> 
					
					</tr> 
					</thead>
                   
					<tbody>
					 <tr> 
					  <td><b>Metro water Report</b></td>
					  <?php /*?><td><i class="fa fa-check" aria-hidden="true"></i></td><?php */?>
					   <th class="misadg"><?php if($editAction=='On'){ ?><div id="watesedit" class="edt"><button type="button" id="watereditbtn" class="btn btn-inverse btn-xs">Edit</button></div><?php } ?><div id="target2" class="edt"><button type="button" id="metrowaedit" class="btn btn-success btn-xs">View</button></div><button type="button" class="btn btn-print btn-xs" id="metroprint"> Print</button> <button id="metrowdownload" type="button" class="btn btn-download btn-xs boredow"> Download</button></th>
					</tr> 
					 <tr>
					  <td><b>Water source and consumption</b></td>
					  <?php /*?><td><i class="fa fa-times" aria-hidden="true"></i></td><?php */?>
					  <th class="misadg"><?php if($editAction=='On'){ ?><div id="consedit" class="edt"><button type="button" id="conseditbtn" class="btn btn-inverse btn-xs">Edit</button></div><?php } ?><div id="target2" class="edt qwwww"><button type="button" id="waterconview" class="btn btn-success btn-xs">View</button></div><button type="button" id="waterconprint" class="btn btn-print btn-xs">Print</button><button type="button" id="watercondownload" class="btn btn-download btn-xs boredow"> Download</button></th>
					</tr>
                    <tr>
					  <td><b>STP Flush water report</b></td>
					  <?php /*?><td><i class="fa fa-times" aria-hidden="true"></i></td><?php */?>
					  <th class="misadg"><?php if($editAction=='On'){ ?><div id="consedit" class="edt"><button type="button" id="flushseditbtn" class="btn btn-inverse btn-xs">Edit</button></div><?php } ?><div id="target2" class="edt qwwww"><button type="button" id="flushview" class="btn btn-success btn-xs">View</button></div><button type="button" id="flushprint" class="btn btn-print btn-xs">Print</button><button type="button" id="flushdownload" class="btn btn-download btn-xs boredow"> Download</button></th>
					</tr>
					 <tr>
					  <td><b>Borewells not working status</b></td>
					  <?php /*?><td><i class="fa fa-check" aria-hidden="true"></i></td><?php */?>
					  <th class="misadg"><?php if($editAction=='On'){ ?><div id="target4" class="edt"><button type="button" id="borewellnwedt" class="btn btn-inverse btn-xs">Edit</button></div><?php } ?><div id="target2" class="edt"><button type="button" id="borewellnwview"  class="btn btn-success btn-xs">View</button></div><button type="button" id="borewlnwprint" class="btn btn-print btn-xs"> Print</button> <button type="button" id="brewlnwdownload" class="btn btn-download btn-xs boredow">Download</button></th>
					</tr>
					 <tr>
					  <td><b>Fire safety status</b></td>
					 <?php /*?> <td><i class="fa fa-check" aria-hidden="true"></i></td><?php */?>
					  <th class="misadg"><?php if($editAction=='On'){ ?><div id="target4" class="edt"><button id="firesafeedit" type="button" class="btn btn-inverse btn-xs"> Edit</button></div><?php } ?><div id="target2" class="edt"><button type="button" class="btn btn-success btn-xs" id="firesafemisview">View</button></div><button type="button" id="firesafemisprint" class="btn btn-print btn-xs borewln"> Print</button> <button type="button" id="firesafedownload" class="btn btn-download btn-xs boredow"> Download</button></th>
					</tr>
					 <tr>
					  <td><b>Electro Mechanical Equipment status</b></td>
					  <?php /*?><td><i class="fa fa-check" aria-hidden="true"></i></td><?php */?>
					  <th class="misadg"><?php if($editAction=='On'){ ?><div id="target4" class="edt"><button type="button" id="equipmentedit" class="btn btn-inverse btn-xs"> Edit</button></div><?php } ?> <div id="target2" class="edt"><button type="button" id="equpmentview" class="btn btn-success btn-xs">View</button><button type="button" id="equipmentprint" class="btn btn-print btn-xs borewln">Print</button> <button type="button" class="btn btn-download btn-xs boredow" id="equpmentdownload"> Download</button></th>
					</tr>
					 <tr>
					  <td><b>STP Status</b></td>
					 <?php /*?> <td><i class="fa fa-check" aria-hidden="true"></i></td><?php */?>
					  <th class="misadg"><?php if($editAction=='On'){ ?><div id="target4" class="edt"><button type="button" id="stpedit" class="btn btn-inverse btn-xs"> Edit</button></div><?php } ?><div id="target2" class="edt"><button type="button" class="btn btn-success btn-xs" id="stpmisview">View</button></div><button type="button" id="stpprint" class="btn btn-print btn-xs borewln"> Print</button> <button type="button" class="btn btn-download btn-xs boredow" id="stpdownload"> Download</button></th>
					</tr>
					 <tr>
					  <td><b>WSP Status</b></td>
					  <?php /*?><td><i class="fa fa-check" aria-hidden="true"></i></td<?php */?>>
					  <th class="misadg"><?php if($editAction=='On'){ ?><div id="target4" class="edt"><button type="button" id="wspedit" class="btn btn-inverse btn-xs"> Edit</button></div><?php } ?><div id="target2" class="edt"><button id="wspmisview" type="button" class="btn btn-success btn-xs">View</button></div><button type="button"  id="wspprint" class="btn btn-print btn-xs borewln"> Print</button><button type="button" class="btn btn-download btn-xs boredow" id="wspdownload"> Download</button></th>
					</tr>
					 <tr>
					  <td><b>CMD vs RMD</b></td>
					  <?php /*?><td><i class="fa fa-check" aria-hidden="true"></i></td><?php */?>
					  <th class="misadg"><?php if($editAction=='On'){ ?><div id="target4" class="edt"><button type="button" id="cmdedit" class="btn btn-inverse btn-xs"> Edit</button></div><?php } ?><div id="target2" class="edt"><button id="cmdmisview" type="button" class="btn btn-success btn-xs">View</button></div><button type="button"  id="cmdprint" class="btn btn-print btn-xs borewln"> Print</button><button type="button" class="btn btn-download btn-xs boredow" id="cmddownload"> Download</button></th>
					</tr>
					 <tr>
					  <td><b>Security Report</b></td>
					  <?php /*?><td><i class="fa fa-check" aria-hidden="true"></i></td><?php */?>
					  <th class="misadg"><?php if($editAction=='On'){ ?><div id="target4" class="edt"><button type="button" id="missecureedit" class="btn btn-inverse btn-xs">Edit</button></div><?php } ?><div id="target2"  class="edt"><button type="button" id="missecureview" class="btn btn-success btn-xs">View</button></div><button type="button" id="secprint" class="btn btn-print btn-xs borewln"> Print</button>  <button type="button" id="securitydownload" class="btn btn-download btn-xs boredow"> Download</button></th>
					</tr>
                    <tr>
					  <td><b>Traffic Movement</b></td>
					  <?php /*?><td><i class="fa fa-check" aria-hidden="true"></i></td><?php */?>
					  <th class="misadg"><!--<div id="target4" class="edt">--><!--<button id="trafficedit" type="button" class="btn btn-inverse btn-xs">Edit</button>--><!--</div>--><div id="target2" class="edt traffic"><button type="button" id="mistrafficview" class="btn btn-success btn-xs">View</button></div><button type="button" class="btn btn-print btn-xs borewln" id="trafficprint"> Print</button> <button type="button" id="trafficdownload" class="btn btn-download btn-xs boredow"> Download</button></th>
					</tr>
					 <tr>
					  <td><b>Housekeeping Report</b></td>
					  <?php /*?>td><i class="fa fa-check" aria-hidden="true"></i></td><?php */?>
					  <th class="misadg"><?php if($editAction=='On'){ ?><div id="target4" class="edt"><button type="button" class="btn btn-inverse btn-xs" id="housekeepedit"> Edit</button></div><?php } ?><div id="target2" class="edt"><button type="button" id="housekeepview" class="btn btn-success btn-xs"><!--<i class="fa fa-eye" aria-hidden="true"></i></i>-->View</button></div><!--</a>--> <!--<a href="http://aparna.greaterkakinada.com/getmisreportprint/9" target="_blank">--><button type="button" id="housekeepprint" class="btn btn-print btn-xs borewln"><!--<i class="fa fa-print" aria-hidden="true"></i>--> Print</button><!--</a>-->  <button type="button" class="btn btn-download btn-xs boredow" id="hskpdownload"><!--<i class="fa fa-download" aria-hidden="true"></i> -->Download</button></th>
					</tr>
					 <tr>
					  <td><b>Horticulture Report</b></td>
					  <?php /*?><td><i class="fa fa-check" aria-hidden="true"></i></td><?php */?>
					  <th class="misadg"><!--<a href="http://aparna.greaterkakinada.com/getmisreportupdate/10">--><?php if($editAction=='On'){ ?><div id="target4" class="edt"><button type="button" id="horticultureedit" class="btn btn-inverse btn-xs"><!--<i class="fa fa-pencil-square-o" aria-hidden="true"></i>--> Edit</button></div><?php } ?><!--</a>--> <!--<a href="http://aparna.greaterkakinada.com/getmisreportpreview/10">--><div id="target2" class="edt"><button type="button" id="horticultureview" class="btn btn-success btn-xs"><!--<i class="fa fa-eye" aria-hidden="true"></i></i>-->View</button></div><!--</a>--><!-- <a href="http://aparna.greaterkakinada.com/getmisreportprint/10" target="_blank">--><button type="button" id="horticultureprint" class="btn btn-print btn-xs borewln"><!--<i class="fa fa-print" aria-hidden="true"></i>--> Print</button><!--</a>-->  <button type="button" class="btn btn-download btn-xs boredow" id="horticulturedownload"><!--<i class="fa fa-download" aria-hidden="true"></i>--> Download</button></th>
					</tr>  
					 <tr>
					  <td><b>Club House Utilization Data</b></td>
					  <?php /*?><td><!--<i class="fa fa-check" aria-hidden="true"></i>--></td><?php */?>
					  <th class="misadg"><!--<a href="http://aparna.greaterkakinada.com/getmisreportupdate/11">--><!--<div id="target4" class="edt"><button type="button" id="clubutiledit" class="btn btn-inverse btn-xs">--><!--<i class="fa fa-pencil-square-o" aria-hidden="true"></i>--> <!--Edit</button>--></div><!--</a> --><!--<a href="http://aparna.greaterkakinada.com/getmisreportpreview/11">--><div id="target2" class="edt"><button type="button" id="clubutilview" class="btn btn-success btn-xs"><!--<i class="fa fa-eye" aria-hidden="true"></i></i>-->View</button></div><!--</a>--> <!--<a href="http://aparna.greaterkakinada.com/getmisreportprint/11" target="_blank">--><button type="button" class="btn btn-print btn-xs borewln" id="clubutilprint"><!--<i class="fa fa-print" aria-hidden="true"></i>--> Print</button><!--</a>-->  <button type="button" id="clubutilviewdownload" class="btn btn-download btn-xs boredow"><!--<i class="fa fa-download" aria-hidden="true"></i>--> Download</button></th>
					</tr>
					 <tr>
					  <td><b>Occupancy Data</b></td>
					  <?php /*?><td><i class="fa fa-times" id="occupancy_status" aria-hidden="true"></i></td><?php */?>
					  <th class="misadg"><!--<a href="http://aparna.greaterkakinada.com/getmisreportupdate/12">--><!--</a>--> <!--<a href="http://aparna.greaterkakinada.com/getmisreportpreview/12"><div id="target2" class="edt">--><button type="button" id="occupncview" class="btn btn-success btn-xs occupancy-date"><!--<i class="fa fa-eye" aria-hidden="true"></i></i>-->View</button><!--</a> --><!--<a href="http://aparna.greaterkakinada.com/getmisreportprint/12" target="_blank">--><button type="button" class="btn btn-print btn-xs borewln" id="occupncprint"><!--<i class="fa fa-print" aria-hidden="true"></i>--> Print</button><!--</a>-->  <button type="button" id="occupncdownload" class="btn btn-download btn-xs boredow"><!--<i class="fa fa-download" aria-hidden="true"></i>--> Download</button></th>
					</tr>
					 <tr> 
					  <td><b>Indented Material Status</b></td>
					 <?php /*?> <td><i class="fa fa-check" aria-hidden="true"></i></td><?php */?>
					  <th class="misadg"><!--<a href="http://aparna.greaterkakinada.com/getmisreportupdatedetail/13">--><?php if($editAction=='On'){ ?><div id="target4" class="edt"><button type="button" id="indented" class="btn btn-inverse btn-xs"><!--<i class="fa fa-pencil-square-o" aria-hidden="true"></i>--> Edit</button></div><?php } ?><!--</a> --><!--<a href="http://aparna.greaterkakinada.com/getmisreportpreview/13">--><div id="target2" class="edt"><button type="button" id="indentedview" class="btn btn-success btn-xs"><!--<i class="fa fa-eye" aria-hidden="true"></i></i>-->View</button></div><!--</a>--><!-- <a href="http://aparna.greaterkakinada.com/getmisreportprint/13" target="_blank">--><button type="button" class="btn btn-print btn-xs borewln" id="indentedprint"><!--<i class="fa fa-print" aria-hidden="true"></i>--> Print</button><!--</a>-->  <button type="button" class="btn btn-download btn-xs boredow" id="indenteddownload"><!--<i class="fa fa-download" aria-hidden="true"></i>--> Download</button></th>
					</tr>
					 <tr> 
					  <td><b>Apna Complex Complaint Report</b></td>
					  <?php /*?><td><i class="fa fa-check" aria-hidden="true"></i></td><?php */?>
					  <th class="misadg"><!--<a href="http://aparna.greaterkakinada.com/getmisreportupdatedetail/14">--><?php if($editAction=='On'){ ?><div id="target4" class="edt"><button type="button" id="apnacompview"  class="btn btn-inverse btn-xs"><!--<i class="fa fa-pencil-square-o" aria-hidden="true"></i>--> Edit</button></div><?php } ?><!--</a>--> <!--<a href="http://aparna.greaterkakinada.com/getmisreportpreview/14">--><div id="target2" class="edt"><button type="button" id="apnacompviewde" class="btn btn-success btn-xs"><!--<i class="fa fa-eye" aria-hidden="true"></i></i>-->View</button></div><!--</a>--> <!--<a href="http://aparna.greaterkakinada.com/getmisreportprint/14" target="_blank">--><button type="button" class="btn btn-print btn-xs borewln" id="apnacompprint"><!--<i class="fa fa-print" aria-hidden="true"></i>--> Print</button><!--</a> --> <button type="button" class="btn btn-download btn-xs boredow" id="apnacompdownload"><!--<i class="fa fa-download" aria-hidden="true"></i>--> Download</button></th>
					</tr>
					 <tr> 
					  <td><b>Fire Mock Drill</b></td>
					  <?php /*?><td><i class="fa fa-check" aria-hidden="true"></i></td><?php */?>
					  <th class="misadg"><!--<a href="http://aparna.greaterkakinada.com/getmisreportupdatedetail/15">--><?php if($editAction=='On'){ ?><div id="target4" class="edt"><button type="button" id="mocdrilledit" class="btn btn-inverse btn-xs"><!--<i class="fa fa-pencil-square-o" aria-hidden="true"></i>--> Edit</button></div><?php } ?><!--</a>--><!--<a href="http://aparna.greaterkakinada.com/getmisreportpreview/15">--><div id="target2" class="edt"><button type="button" id="mockdrillview" class="btn btn-success btn-xs"><!--<i class="fa fa-eye" aria-hidden="true"></i></i>-->View</button></div><!--</a>-->  <button type="button" class="btn btn-print btn-xs borewln" id="mockdrillprint"><!--<i class="fa fa-print" aria-hidden="true"></i>--> Print</button>  <button type="button" class="btn btn-download btn-xs boredow" id="mockdrilldownload"><!--<i class="fa fa-download" aria-hidden="true"></i>--> Download</button></th>
					</tr>
                    
                    <tr> 
					  <td><b>Fire Safety Preparedness & Fire Alarm Operation Training</b></td>
					 <?php /*?> <td><i class="fa fa-check" aria-hidden="true"></i></td><?php */?>
					  <th class="misadg"><?php if($editAction=='On'){ ?><div id="target4" class="edt"><button type="button" id="fireprepareedit" class="btn btn-inverse btn-xs"> Edit</button></div><?php } ?><div id="target2" class="edt"><button type="button" id="fireprepareview" class="btn btn-success btn-xs">View</button></div> <button type="button" class="btn btn-print btn-xs borewln" id="fireprepareprint">Print</button>  <button type="button" class="btn btn-download btn-xs boredow" id="firepreparedownload">Download</button></th>
					</tr>
					</tbody>
    
					</table>
					</div>  
					 
            </div>
					
					
	 
	<?php /*?>   <div>Line1:  Status1 </div>
	   <div>Line2:  Status2 </div>
	   <div>Line3:  Status3 </div> 
	   <div>Line4:  Status4 </div><?php */?>
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



 $( "#mis_year" ).change(function() 
 
  {
  
    var year = $("#mis_year").val();
    var month = $("#mis_month").val();

      $.ajax({
				type: "get",
				cache:false,
				dataType: "json",
				url: '{{ route('validation.checkmisstatus') }}',
				data: { year: year, month: month},
				success: function( response ) {
				 //var obj = jQuery.parseJSON( response);
                   //alert(obj.status);
			 //  alert(response[0]);
			     if(response[12] == 'yes'){
				    $("#occupancy_status").addClass("fa-check");
				   $("#occupancy_status").removeClass("fa-times");
				 }
				  if(response[12] == 'no'){
				   $("#occupancy_status").addClass("fa-times");
				   $("#occupancy_status").removeClass("fa-check");
				 }
				
				}  
        });
    });
  
   $( "#mis_month" ).change(function() 
 
  {
 
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
  });
  
  
  

	$('#example1').datepicker({ dateFormat: "dd-mm-yy" });
	
	$( "#occupncedit" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecupdate/12/"+year+"/"+month; 
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
	
	
	
	$( "#metrowaedit" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecview/1/"+year+"/"+month; 
		}
	
	});
	
	
	
	$( "#metrowdownload" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecdownload/1/"+year+"/"+month; 
		}
	
	});
	
	
	
	
	$( "#metroprint" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecprint/1/"+year+"/"+month; 
		}
	
	});
	
	/*End  METRODaily Water Consumption*/
	
	
	$( "#download_mis" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/downloadoverallmis/"+year+"/"+month; 
		}
	
	});
	
	
	/* WAATER CONXUMPTION */
	
	 
	
	/* END WATER CONSUMPTION */
	
	$( "#waterconview" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecview/2/"+year+"/"+month; 
		}
	
	});
	
 	
	$( "#borewellnwedt" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecupdate/3/"+year+"/"+month; 
		}
	
	});
	
	
	
	$( "#watereditbtn" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecupdate/1/"+year+"/"+month; 
		}
	
	});
	
		$( "#conseditbtn" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecupdate/2/"+year+"/"+month; 
		}
	
	});
	
	
	
	
	
	
	$( "#borewellnwview" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecview/3/"+year+"/"+month; 
		}
	 
	});
	
	$( "#borewlnwprint" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecprint/3/"+year+"/"+month; 
		}
	
	});
	
	
	$( "#waterconprint" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecprint/2/"+year+"/"+month; 
		}
	
	});
	
	
	
	$( "#brewlnwdownload" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecdownload/3/"+year+"/"+month; 
		}
	
	});
	
	$( "#watercondownload" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecdownload/2/"+year+"/"+month; 
		}
	
	});
	
	
	
	$( "#firesafeedit" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecupdate/4/"+year+"/"+month; 
		}
	
	});
	
	$( "#equipmentedit" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecupdate/5/"+year+"/"+month; 
		}
	
	});
	
	$( "#stpedit" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecupdate/6/"+year+"/"+month; 
		}
	 
	});
	
	
	$( "#wspedit" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecupdate/7/"+year+"/"+month; 
		}
	 
	});
	
	$( "#cmdedit" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecupdate/17/"+year+"/"+month; 
		}
	 
	}); 
	
	
	
	
	$( "#indented" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecupdate/13/"+year+"/"+month; 
		}
	 
	});
	
	
	$( "#indentedview" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecview/13/"+year+"/"+month; 
		}
	
	});
	  
	
	$( "#apnacompview" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecupdate/14/"+year+"/"+month; 
		}
	 
	});
	
	
	$( "#apnacompviewde" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecview/14/"+year+"/"+month; 
		}
	
	});
	
	$( "#mocdrilledit" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecupdate/15/"+year+"/"+month; 
		}
	
	});
	
	$( "#fireprepareedit" ).click(function() {
	    alert("sfedf");
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecupdate/18/"+year+"/"+month; 
		}
	
	});
	
	
	
	
	$( "#firesafemisview" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecview/4/"+year+"/"+month; 
		}
	
	});
	
	$( "#equpmentview" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecview/5/"+year+"/"+month; 
		}
	
	});
	
	
	$( "#stpmisview" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecview/6/"+year+"/"+month; 
		}
	
	});
	
	$( "#wspmisview" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecview/7/"+year+"/"+month; 
		}
	
	});
	
	$( "#cmdmisview" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecview/17/"+year+"/"+month; 
		}
	
	});

	
		$( "#missecureedit" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecupdate/8/"+year+"/"+month; 
		}
	
	});
	
		$( "#missecureview" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecview/8/"+year+"/"+month; 
		}
	 
	}); 
	
	$( "#mockdrillview" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecview/15/"+year+"/"+month; 
		}
	 
	}); 
	
 
	$( "#trafficedit" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecupdate/16/"+year+"/"+month; 
		}
	 
	}); 
	
	$( "#mistrafficview" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecview/16/"+year+"/"+month; 
		}
	 
	}); 
	
	$( "#clubutiledit" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecupdate/11/"+year+"/"+month; 
		}
	 
	}); 
	
	$( "#housekeepedit" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecupdate/9/"+year+"/"+month; 
		}   
	 
	}); 
	
	$( "#horticultureedit" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecupdate/10/"+year+"/"+month; 
		}   
	 
	}); 
	
	$( "#clubutilview" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecview/11/"+year+"/"+month; 
		}
	 
	}); 
	
	$( "#housekeepview" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecview/9/"+year+"/"+month; 
		}
	 
	}); 
	 
	$( "#horticultureview" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecview/10/"+year+"/"+month; 
		}
	 
	}); 
	
	
	/* PRINT */
	
	$( "#firesafemisprint" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecprint/4/"+year+"/"+month; 
		}
	
	});
	
	$( "#equipmentprint" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecprint/5/"+year+"/"+month; 
		}
	
	});
	
	$( "#stpprint" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecprint/6/"+year+"/"+month; 
		}
	
	});
	
	$( "#wspprint" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecprint/7/"+year+"/"+month; 
		}
	
	});
	
	$( "#cmdprint" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecprint/17/"+year+"/"+month; 
		}
	});
	
	  
	
	$( "#secprint" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecprint/8/"+year+"/"+month; 
		}
	
	});
	
	$( "#housekeepprint" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecprint/9/"+year+"/"+month; 
		}
	
	});
	
	$( "#horticultureprint" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecprint/10/"+year+"/"+month; 
		}
	
	});
	
		$( "#firesafedownload" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecdownload/4/"+year+"/"+month; 
		}
	
	}); 
	
	$( "#equpmentdownload" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecdownload/5/"+year+"/"+month; 
		}
	
	}); 
	
	$( "#stpdownload" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecdownload/6/"+year+"/"+month; 
		}
	
	}); 
	
	$( "#wspdownload" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecdownload/7/"+year+"/"+month; 
		}
	
	}); 
	
	$( "#cmddownload" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecdownload/17/"+year+"/"+month; 
		}
	
	}); 
	
	$( "#securitydownload" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecdownload/8/"+year+"/"+month; 
		}
	
	}); 
	
	
	$( "#hskpdownload" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecdownload/9/"+year+"/"+month; 
		}
	
	}); 
	
	$( "#horticulturedownload" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecdownload/10/"+year+"/"+month; 
		}
	
	}); 
	
	$( "#clubutilprint" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecprint/11/"+year+"/"+month; 
		}
	
	});
	
	$( "#clubutilviewdownload" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecdownload/11/"+year+"/"+month; 
		}
	
	}); 
	
	$( "#trafficprint" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecprint/16/"+year+"/"+month; 
		}
	
	});
	
	$( "#trafficdownload" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecdownload/16/"+year+"/"+month; 
		}
	
	}); 
	
	$( "#indentedprint" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecprint/13/"+year+"/"+month; 
		}
	
	});
	
	$( "#apnacompprint" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecprint/14/"+year+"/"+month; 
		}
	
	});
	
	
	
	$( "#mockdrillprint" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecprint/15/"+year+"/"+month; 
		}
	
	});
	
	
	$( "#indenteddownload" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecdownload/13/"+year+"/"+month; 
		}
	
	}); 
	
	$( "#apnacompdownload" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecdownload/14/"+year+"/"+month; 
		}
	
	}); 
	
	$( "#mockdrilldownload" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecdownload/15/"+year+"/"+month; 
		}
	
	}); 
	  
	
});


function setenablebtn(){

  	$( "#occupncedit" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecupdate/12/"+year+"/"+month; 
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
	
	
	
	$( "#metrowaedit" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecview/1/"+year+"/"+month; 
		}
	
	});
	
	
	
	$( "#metrowdownload" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecdownload/1/"+year+"/"+month; 
		}
	
	});
	
	
	
	
	$( "#metroprint" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecprint/1/"+year+"/"+month; 
		}
	
	});
	
	/*End  METRODaily Water Consumption*/
	
	
	$( "#download_mis" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		var dateval = $("#example1").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/downloadoverallmis/"+year+"/"+month+"/"+dateval; 
		}
	
	});
	
	
	
	$( "#download_misindex" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		var dateval = $("#example1").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/downloadoverallmisindex/"+year+"/"+month+"/"+dateval; 
		} 
	//	alert(year);
	//	alert(month); 
	//	alert(dateval);
	
	});
	
	/* WAATER CONXUMPTION */
	
	 
	
	/* END WATER CONSUMPTION */
	
	$( "#waterconview" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecview/2/"+year+"/"+month; 
		}
	
	});
	
	
	$( "#flushview" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecview/19/"+year+"/"+month; 
		}
	
	});
	
	
	$( "#flushseditbtn" ).click(function() {
  		//alert("asdsdas");
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecupdate/19/"+year+"/"+month; 
		}
	
	});

	
 	
	$( "#borewellnwedt" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecupdate/3/"+year+"/"+month; 
		}
	
	});
	
	$( "#watereditbtn" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecupdate/1/"+year+"/"+month; 
		}
	
	});
	
		$( "#conseditbtn" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecupdate/2/"+year+"/"+month; 
		}
	
	});
	
	
	
	
	
	$( "#borewellnwview" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecview/3/"+year+"/"+month; 
		}
	 
	});
	
	$( "#borewlnwprint" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecprint/3/"+year+"/"+month; 
		}
	
	});
	
	
	$( "#waterconprint" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecprint/2/"+year+"/"+month; 
		}
	
	});
	
	
	
	$( "#brewlnwdownload" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecdownload/3/"+year+"/"+month; 
		}
	
	});
	
	$( "#watercondownload" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecdownload/2/"+year+"/"+month; 
		}
	
	});
	
	
	$( "#flushdownload" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecdownload/19/"+year+"/"+month; 
		}
	
	});
	
	
	
	$( "#firesafeedit" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecupdate/4/"+year+"/"+month; 
		}
	
	});
	
	$( "#equipmentedit" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecupdate/5/"+year+"/"+month; 
		}
	
	});
	
	$( "#stpedit" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecupdate/6/"+year+"/"+month; 
		}
	 
	});
	
	
	$( "#wspedit" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecupdate/7/"+year+"/"+month; 
		}
	 
	});
	
	$( "#cmdedit" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecupdate/17/"+year+"/"+month; 
		}
	 
	}); 
	
	
	
	
	$( "#indented" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecupdate/13/"+year+"/"+month; 
		}
	 
	});
	
	
	$( "#indentedview" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecview/13/"+year+"/"+month; 
		}
	
	});
	  
	
	$( "#apnacompview" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecupdate/14/"+year+"/"+month; 
		}
	 
	});
	
	
	$( "#apnacompviewde" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecview/14/"+year+"/"+month; 
		}
	
	});
	
	$( "#mocdrilledit" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecupdate/15/"+year+"/"+month; 
		}
	
	});
	
		$( "#fireprepareedit" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecupdate/18/"+year+"/"+month; 
		}
	
	});
	
	$( "#firesafemisview" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecview/4/"+year+"/"+month; 
		}
	
	});
	
	$( "#equpmentview" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecview/5/"+year+"/"+month; 
		}
	
	});
	
	
	$( "#stpmisview" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecview/6/"+year+"/"+month; 
		}
	
	});
	
	$( "#wspmisview" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecview/7/"+year+"/"+month; 
		}
	
	});
	
	$( "#cmdmisview" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecview/17/"+year+"/"+month; 
		}
	
	});

	
		$( "#missecureedit" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecupdate/8/"+year+"/"+month; 
		}
	
	});
	
		$( "#missecureview" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecview/8/"+year+"/"+month; 
		}
	 
	}); 
	
	$( "#mockdrillview" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecview/15/"+year+"/"+month; 
		}
	 
	}); 
	
	$( "#fireprepareview" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecview/18/"+year+"/"+month; 
		}
	 
	}); 
	
 
	$( "#trafficedit" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecupdate/16/"+year+"/"+month; 
		}
	 
	}); 
	
	$( "#mistrafficview" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecview/16/"+year+"/"+month; 
		}
	 
	}); 
	
	$( "#clubutiledit" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecupdate/11/"+year+"/"+month; 
		}
	 
	}); 
	
	$( "#housekeepedit" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecupdate/9/"+year+"/"+month; 
		}   
	 
	}); 
	
	$( "#horticultureedit" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecupdate/10/"+year+"/"+month; 
		}   
	 
	}); 
	
	$( "#clubutilview" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecview/11/"+year+"/"+month; 
		}
	 
	}); 
	
	$( "#housekeepview" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecview/9/"+year+"/"+month; 
		}
	 
	}); 
	 
	$( "#horticultureview" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecview/10/"+year+"/"+month; 
		}
	 
	}); 
	
	
	/* PRINT */
	
	$( "#firesafemisprint" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecprint/4/"+year+"/"+month; 
		}
	
	});
	
	$( "#equipmentprint" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecprint/5/"+year+"/"+month; 
		}
	
	});
	
	$( "#stpprint" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecprint/6/"+year+"/"+month; 
		}
	
	});
	
	$( "#wspprint" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecprint/7/"+year+"/"+month; 
		}
	
	});
	
	$( "#cmdprint" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecprint/17/"+year+"/"+month; 
		}
	});
	
	  
	
	$( "#secprint" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecprint/8/"+year+"/"+month; 
		}
	
	});
	
	$( "#housekeepprint" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecprint/9/"+year+"/"+month; 
		}
	
	});
	
	$( "#horticultureprint" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecprint/10/"+year+"/"+month; 
		}
	
	});
	
		$( "#firesafedownload" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecdownload/4/"+year+"/"+month; 
		}
	
	}); 
	
	$( "#equpmentdownload" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecdownload/5/"+year+"/"+month; 
		}
	
	}); 
	
	$( "#stpdownload" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecdownload/6/"+year+"/"+month; 
		}
	
	}); 
	
	$( "#wspdownload" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecdownload/7/"+year+"/"+month; 
		}
	
	}); 
	
	$( "#cmddownload" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecdownload/17/"+year+"/"+month; 
		}
	
	}); 
	
	$( "#securitydownload" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecdownload/8/"+year+"/"+month; 
		}
	
	}); 
	
	
	$( "#hskpdownload" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecdownload/9/"+year+"/"+month; 
		}
	
	}); 
	
	$( "#horticulturedownload" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecdownload/10/"+year+"/"+month; 
		}
	
	}); 
	
	$( "#clubutilprint" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecprint/11/"+year+"/"+month; 
		}
	
	});
	
	$( "#clubutilviewdownload" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecdownload/11/"+year+"/"+month; 
		}
	
	}); 
	
	$( "#trafficprint" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecprint/16/"+year+"/"+month; 
		}
	
	});
	
	$( "#trafficdownload" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecdownload/16/"+year+"/"+month; 
		}
	
	}); 
	
	$( "#indentedprint" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecprint/13/"+year+"/"+month; 
		}
	
	});
	
	$( "#apnacompprint" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecprint/14/"+year+"/"+month; 
		}
	
	});
	
	
	
	$( "#mockdrillprint" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecprint/15/"+year+"/"+month; 
		}
	
	});
	
	 
	$( "#fireprepareprint" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecprint/18/"+year+"/"+month; 
		}
	
	});
	
	
	$( "#indenteddownload" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecdownload/13/"+year+"/"+month; 
		}
	
	}); 
	
	$( "#apnacompdownload" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecdownload/14/"+year+"/"+month; 
		}
	
	}); 
	
	$( "#mockdrilldownload" ).click(function() {
		var year = $("#mis_year").val();
		var month = $("#mis_month").val();
		if(year == "" || month == "") { 
		var href = window.location.href;
		//window.location = href.replace(/getdailyreport\/.*$/, "");
		window.location.href = "/misreports";  
		} else {
		window.location.href = "/getmisreportrecdownload/15/"+year+"/"+month; 
		}
	
	}); 
	
	
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
} 

 

  </script>
@include('partials.footer')
@stop