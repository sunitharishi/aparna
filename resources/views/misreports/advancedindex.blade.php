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
 width:120px;
 float:left;
 margin-right:10px;
}
.yeeeeaa
{
 width:70%;
 margin:0 auto;
 margin-bottom:15px;
 overflow:hidden;
 font-size:13px;
}
.dailyreports.getdailyreport
{
 width:70%;
 margin:0 auto;
}
#metrowaedit, .viewclass
{
 margin-left:14%;
}
.edt.qwwww
{
 margin-left:14%;
}
.dlyrep-select.wholeee
{
 float:right;
}
</style>
 

@extends('layouts.app')

@section('content')

<div class="dailyreports getdailyreport notprint" >
    <h3 class="page-title"><span>Advanced Reports</span></h3>
</div>
<div class="notprint">
<div class="row">  
    <div class="col-xs-12 form-group"> 
        <div class="yeeeeaa">
          {!! Form::open(['method' => 'GET', 'route' => ['validation.getadvancedownload'], 'id'=>'frmadvancereports']) !!}
                <div class="fromdate-section">
                    <div class="from-date">From Date:</div>
                    <div class="dlyrep-select1">
                        <input type="text" id="fromdate" name="fromdate" value="<?php  echo date("d-m-Y"); ?>" class="hasDatePicker form-control">
                        <input type="hidden" name="reportviewtype"  id="reportviewtype" value="view">
                    </div>  
                </div>
                 <div class="todate-section">
                    <div class="to-date">To Date:</div>
                    <div class="dlyrep-select1">
                        <input type="text" id="todate" name="todate" value="<?php  echo date("d-m-Y"); ?>" class="hasDatePicker form-control">
                    </div>   
                 </div>
                 <div class="reporttype-section">
                    <div class="report-type">Report Type:</div>
                    <div class="dlyrep-select1 aprana-sarvouer">
                     <select name='report_type' id="report_type" class="form-control">  
                            <option value="metro_water">Metro water Report</option> 
                            <option value="water_consumption">Water source and consumption</option> 
                            <option value="borewell_notworking">Borewell not working status</option> 
                            <option value="fire_safe_status">Fire safety status</option> 
                            <option value="electro_mechanical_equipment">Electro Mechanical Equipment status</option> 
                            <option value="stp_status">STP Status</option> 
                            <option value="wsp_status">WSP Status</option> 
                            <option value="security_report">Security Report</option> 
                            <option value="traffic_movement">Traffic Movement</option> 
                            <option value="house_keeping_report">Housekeeping Report</option> 
                            <option value="horticulture_report">Horticulture Report</option> 
                            <option value="club_house_utilization_data">Club House Utilization Data</option> 
                            <option value="occupancy_data">Occupancy Data</option> 
                            <option value="indented_material_status">Indented Material Status</option> 
                            <option value="apna_complex">Apna Complex Complaint Report</option>
                            <option value="machinery_report">Machinery Report</option>    
                    </select>    
                    </div>
                </div>
                <div class="sites">
                	<label class="site-block">Sites</label>
                    @if (count($sites_attr_names) > 0)  
                    <?php    
                    ?> 
                    <span class="select_all"><input type="checkbox" id="all_select"> <label> All</label></span>
                    @foreach ($sites_attr_names as $key => $site)
                    <div id="checkboxlist" class="checkbox-cnt checklistsee">
                    <span class="boxcheck">{{ Form::checkbox('site[]', $key,'',array('class'=>'use_select')) }}</span><span>{{ $site }}</span>
                    </div> 
                    @endforeach 
                    @endif 
                </div>  
    		
		{!! Form::close() !!} 
        </div>
   	</div>
</div>  
		
        <div class="view-button"> 
            <button id="viewtarget" onclick="checkselected();" class="btn btn-success btn-sm">View</buttton>
            <button id="viewdownload" onclick="viewdownload();" class="btn btn-download btn-sm">Download</buttton>
            <button id="getprint" onclick="printview();" class="btn btn-print btn-sm">Print</buttton>
        </div> 

			 
		<div id="validresponse" class="validprint advanced-misreports"></div>
 </div>       
        
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">

$( document ).ready(function() {
var chkSelected = "";

$( "#all_select" ).change(function() {
		if($(this).prop('checked')==true) {
		$(".use_select").prop('checked', true);
		} else {
		$(".use_select").prop('checked', false);
		}	
	});
	$( ".use_select" ).change(function() {
		if($( ".use_select:checked" ).length == $( ".use_select" ).length) $("#all_select").prop('checked', true);
		else $("#all_select").prop('checked', false);	
	});

//STATUS REPORTS

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


$('#fromdate').datepicker({ dateFormat: "dd-mm-yy" });
$('#todate').datepicker({ dateFormat: "dd-mm-yy" });
	
	
});

function getValueUsingParentTag(){
	var chkArray = []; 
	
	/* look for all checkboes that have a parent id called 'checkboxlist' attached to it and check if it was checked */
	$("#checkboxlist input:checked").each(function() {
		chkArray.push($(this).val());
	});
	
	/* we join the array separated by the comma */
	var selected;
	selected = chkArray.join(',') ;
	
	/* check if there is selected checkboxes, by default the length is 1 as it contains one single comma */
	if(selected.length > 0){
		//alert("You have selected " + selected);	
		chkSelected = selected;
	}else{
		alert("Please at least check one of the checkbox");	
	}
}

function checkselected(){
getValueUsingParentTag();
//alert("You have selected " + chkSelected);	

var fromdate = $('#fromdate').val();
var todate = $('#todate').val();
var reporttype = $('#report_type').val();


   $.ajax({
				type: "get",
				cache:false,
				url: '{{ route('validation.getadvanceReports') }}',
				data: { fromdate: fromdate, todate: todate, sites: chkSelected, reporttype: reporttype},
				success: function( response ) {
				     
				$("#validresponse").html(response);
				}   
        });

}




function viewdownload(){
  getValueUsingParentTag();
  $("#reportviewtype").val('download');
  $("#frmadvancereports").submit();
  
}

  

  </script>
  <script>
     function printview(){
	  getValueUsingParentTag();
	  
	  var fromdate = $('#fromdate').val();
var todate = $('#todate').val();
var reporttype = $('#report_type').val();


   $.ajax({
				type: "get",
				cache:false,
				url: '{{ route('validation.getadvanceprintReports') }}',
				data: { fromdate: fromdate, todate: todate, sites: chkSelected, reporttype: reporttype},
				success: function( response ) {
				     
				$("#validresponse").html(response);
					 window.print();
					 
					 close();
				}   
        });

	 }
  </script>
  <script>
function printDiv(divName) {

   alert(divName);
      var printContents = document.getElementById(divName).innerHTML;     
   var originalContents = document.body.innerHTML;       
   document.body.innerHTML = printContents;      
   window.print();      
   document.body.innerHTML = originalContents;
   }
</script>
<div class="noprint">
	@include('partials.footer')
</div>
@stop     