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
.table-fixed tbody 
{
height: auto;
overflow-y: auto;
width: 100%;
}
.table-fixed thead,
.table-fixed tbody,
.table-fixed tr,
.table-fixed td,
.table-fixed th {
display: block;

}
.table-fixed tr:after {
content: "";
display: block;
visibility: hidden;
clear: both;
}
.table-fixed tbody td,
.table-fixed thead > tr > th {
float: left;
}
.fixedtr tr th:first-child
{
width:112px;
}
.fixedtr tr th
{
width:37.6px;
text-align:center;
}

.fixedbodytr tr td:first-child
{
font-weight:bold;
width:112px;
height:50px;
vertical-align:middle !important;
}
.fixedbodytr tr td
{
width:37.6px;
height:50px;
text-align:center;
vertical-align:middle !important;
}
.advdaily-rport .fixedtr tr th
{
 background-color:#c19b63;
 color:#000;
 border: 1px solid #966a28;
}
.fixedbodytr tr td i.fa
{
 line-height:35px !important;
}
@media print
{
.table-fixed tbody 
{
    height:100%;
}
.viewprintdowunload, .advancedddailyrerport
{
 display:none;
}
.table-fixed tbody 
{
 overflow-y:hidden;
}
.advdaily-rport thead tr th
{
 border:1px solid #000;
}
.advdaily-rport tbody tr td
{
 border:1px solid #000;
}
.advdaily-rport thead tr th
{
 background-color:transparent;
 border:1px solid #000;
}
.report-headings
{
 color:#000;
 font-weight:bold;
}
.notprint
{
 display:none;
}
} 
</style>
 

@extends('layouts.app')

@section('content')

  <div class="dailyreports1 getdailyreport notprint" >    
    <h3 class="page-title"><span>Audit Reports</span></h3> 
  </div> 
  

    
<div class="auditreport-headings notprint">   					 
{!! Form::open(['method' => 'GET', 'route' => ['validation.getdailyadvancedownload'], 'class'=>'advancedddailyrerport', 'id'=>'frmadvancereports']) !!} 
<div class="dlyrep-select1">
   <div class="audit-yearselection">   
    <label class="label-year">Year : </label>
    <select name="year" id="year" class="form-control select-year" >
    	<option value="2018">2018</option>
    </select>
    <input type="hidden" name="reportviewtype"  id="reportviewtype" value="view">
 </div>
 <div class="audit-monthselection">
    <label class="label-month">Month : </label>
    <select name="month" id="month" class="form-control select-month">  
    <option value="">Select Month</option>
        <option value="1" <?php if(date('m') == "1") echo "selected='selected'"; ?>>Jan</option>
        <option value="2" <?php if(date('m') == "2") echo "selected='selected'"; ?>>Feb</option>
        <option value="3" <?php if(date('m') == "3") echo "selected='selected'"; ?>>Mar</option>
        <option value="4" <?php if(date('m') == "4") echo "selected='selected'"; ?>>April</option>
        <option value="5" <?php if(date('m') == "5") echo "selected='selected'"; ?>>May</option>
        <option value="6" <?php if(date('m') == "6") echo "selected='selected'"; ?>>June</option>
        <option value="7" <?php if(date('m') == "7") echo "selected='selected'"; ?>>July</option>
        <option value="8" <?php if(date('m') == "8") echo "selected='selected'"; ?>>Aug</option>
        <option value="9" <?php if(date('m') == "9") echo "selected='selected'"; ?>>Sept</option>
        <option value="10" <?php if(date('m') == "10") echo "selected='selected'"; ?>>Oct</option>
        <option value="11" <?php if(date('m') == "11") echo "selected='selected'"; ?>>Nov</option>
        <option value="12" <?php if(date('m') == "12") echo "selected='selected'"; ?>>Dec</option>
    </select>
  </div>
  
  <div class="audit-categoryselection">
    <label class="label-category">Category : </label>
    <select name="category" id="category" class="form-control select-category"> 
        <option value="PMS">PMS</option>
        <option value="FMS">FMS</option> 
        <option value="Security">Security</option>
        <option value="Fire Safety">Fire Safety</option>
   </select>
   </div>
</div>  
					             
{!! Form::close() !!}   
                        
<div class="viewprintdowunload notprint">
    <button onclick="checkselectednvw();"  class="btn btn-success btn-sm">View</button>
    <button onclick="printview();"  class="btn btn-print btn-sm">Print</button>
    <button onclick="viewdownload();"  class="btn btn-download btn-sm">Download</button>
</div>	
 <div class="audit-specialbuttons notprint"> 
   <ul>  
     <li><a href="/auditupload"> Audit Upload</a></li>
     <li>|</li>
     <li><a href="/audit" > Summary</a></li>
   </ul>
 </div>	
 </div>  													
<div class="loader" style="text-align:center;"></div>

<div id="validresponse">
</div>
							
							
<div class="noprint">
	@include('partials.footer')
</div>
      
		
		
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">

$( document ).ready(function() {

var year = $('#year').val();
var month = $('#month').val();
var category = $('#category').val();
$(".loader").html('<img src="/images/loadinganimation2.gif" style="width:100px;" />');

   $.ajax({
				type: "get",
				cache:false,
				url: '{{ route('validation.getdailymonthstatus') }}',
				data: { year: year, month: month, category: category},
				success: function( response ) {
				 $(".loader").html('');         
				$("#validresponse").html(response);
				}   ,error: function (textStatus, errorThrown) {
                  $(".loader").html('');
				  
            } 
        });

	
});


function checkselectednvw(){
//alert("You have selected " + chkSelected);	
 $(".loader").html('<img src="/images/loadinganimation2.gif" width="100px" />');
var year = $('#year').val();
var month = $('#month').val();
var category = $('#category').val();
$("#validresponse").html();    

   $.ajax({
				type: "get",
				cache:false,
				url: '{{ route('validation.getdailymonthstatus') }}',
				data: { year: year, month: month, category: category},
				success: function( response ) {
				$(".loader").html('');     
				$("#validresponse").html(response);
				} ,error: function (textStatus, errorThrown) {
                  $(".loader").html('');
            } 
        });

}
  

function viewdownload(){    

  $("#frmadvancereports").submit();
  
}
  </script>
  
    <script>
 function printview(){
$(".loader").html('<img src="/images/loadinganimation2.gif" style="width:100px;" />');
var year = $('#year').val();
var month = $('#month').val();
var category = $('#category').val();
$("#validresponse").html();    
   $.ajax({
				type: "get",
				cache:false,
				url: '{{ route('validation.getdailymonthstatus') }}',
				data: { year: year, month: month, category: category},
				success: function( response ) {
				   $(".loader").html(''); 
				$("#validresponse").html(response);
				$('.table-fixed .tbody').css("height", "100%"); 
				 window.print();
					
					
					 close();
					
				} ,error: function (textStatus, errorThrown) {
				$(".loader").html('');
                 
            } 
        });
	 }
  </script>

<script>
  function touchHorizScroll(id){
    if(isTouchDevice()){ //if touch events exist...
        var el=document.getElementById(id);
        var scrollStartPos=0;

        document.getElementById(id).addEventListener("touchstart", function(event) {
            scrollStartPos=this.scrollLeft+event.touches[0].pageX;              
        },false);

        document.getElementById(id).addEventListener("touchmove", function(event) {
            this.scrollLeft=scrollStartPos-event.touches[0].pageX;              
        },false);
    }
}
function isTouchDevice(){
    try{
        document.createEvent("TouchEvent");
        return true;
    }catch(e){
        return false;
    }
}  
 </script>
 @stop   

  