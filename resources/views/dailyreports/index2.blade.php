@extends('layouts.app')



@section('content')
<style>
.table.dailystartpage
{
 width:70%;
 margin:0 auto;
}
.table.dailystartpage tr th
{
 padding:4px;
}
.table.dailystartpage tr td
{
 padding:4px;
}
.spammsn
{
 width:70%;
 margin:0 auto;
}
.hanging-gardens
{
 width:70%;
 margin:0 auto;
}
@media only screen and (max-width:990px)
{
 .footer-main
 {
  left:0px;
  right:0px;
  margin:0 auto;
 }
}
</style>
	<div class="getdailyreport min-phone-height">

    <div class="spammsn"><h3 class="page-title"><span>Daily Reports</span></h3></div>



    <?php /*?>{!! Form::open(['method' => 'get']) !!}

    <div class="row">

        <div class="col-xs-6 col-md-4 form-group">

            {!! Form::label('project','Project',['class' => 'control-label']) !!}

            {!! Form::select('project', $projects, old('project',$currentProject), ['class' => 'form-control']) !!}

        </div>

        <div class="col-xs-4">

            <label class="control-label">&nbsp;</label><br>

            {!! Form::submit('Select project',['class' => 'btn btn-info']) !!}

        </div>

    </div>

    {!! Form::close() !!}



    <div class="table-responsive">

        <table class="table table-striped table-hover table-condensed datatable">

            <thead>

            <tr>

                <th>Month</th>

                <th>Income</th>

                <th>Expenses</th>

                <th>Fees</th>

                <th>Total</th>

            </tr>

            </thead>



            <tbody>

            @foreach ($entries as $date => $info)

                @foreach($info as $currency => $row)

                    <td>{{ $date }}</td>

                    <td>{{ number_format($row['income'],2) }} {{ $currency }}</td>

                    <td>{{ number_format($row['expenses'],2) }} {{ $currency }}</td>

                    <td>{{ number_format($row['fees'],2) }} {{ $currency }}</td>

                    <td>{{ number_format($row['total'],2) }} {{ $currency }}</td>

                    </tr>

                    <?php $date = ''; ?>

                @endforeach

            @endforeach

            </tbody>

        </table>

    </div><?php */?>

	

	<div class="row">

                <div class="col-xs-12 form-group dailyreport-secondindex">

				

			<?php /*?>	 {!! Form::label('dailycat', 'Community', ['class' => 'control-label']) !!}

				   

					{{ Form::select('sites', [

					'0' => 'All',

					'1' => 'Sarovar', 

					'2' => 'Grande','3' => 'CyberZon'], ['class' => 'form-control', 'id' => 'select_id']

					) }} <br/>

					

					

					

					<table width="1000px" height="600px">

					<tr>

					  <th>Community</th> 

					  <th>Fire Security</th>

					  <th>FMS</th>

					  <th>PMS</th>

					  <th>Security</th>

					  <th>Action</th>

					</tr>

					 <tr>

					  <td>Sarovar</td>

					  <td>Yes</td>

					  <td>No</td>

					  <td>Yes</td>

					  <td>No</td>

					   <th>Edit| Print | Download</th>

					</tr>

					 <tr>

					  <td>Grande</td>

					  <td>Yes</td>

					  <td>No</td>

					  <td>Yes</td>

					  <td>No</td>

					  <th>Edit| Print | Download</th>

					</tr>

					 <tr>

					  <td>CyberZon</td>

					  <td>Yes</td>

					  <td>No</td>

					  <td>Yes</td>

					  <td>No</td>

					  <th>Edit| Print | Download</th>

					</tr>

					</table><?php */?>

					

					

				     

                  <?php /*?> {!! Form::label('dailycat', 'category', ['class' => 'control-label']) !!}

                    {!! Form::select('category', $client_statuses, old('category'), ['class' => 'form-control', 'id' => 'select_id']) !!}<?php */?>

					 @if(getlogperms('edit_firesafety') || getlogperms('print_fire_safety') || getlogperms('view_fire_safety') || getlogperms('download_fire_safety') || getlogperms('edit_pms') || getlogperms('print_pms') || getlogperms('view_pms') || getlogperms('download_pms') || getlogperms('edit_fms') || getlogperms('print_fms') || getlogperms('view_fms') || getlogperms('download_fms') || getlogperms('edit_security') || getlogperms('view_security') || getlogperms('print_security') || getlogperms('download_security') ) 

					<div class="hanging-gardens"><div class="dlyrep-select hillpark">

					 {!! Form::label('dailycat1', 'Sites:', ['class' => 'control-label hillpark-sites']) !!}

                    {!! Form::select('sites', $sites_names, $segmentval, ['class' => 'form-control', 'id' => 'select_id11']) !!}

					 

					 

					<?php
					//getlogperms_daily('edit_firesafety');
					 /*?> {!! Form::label('dailycat', 'Community', ['class' => 'control-label']) !!}

				   

					{{ Form::select('sites', [

					'0' => 'All',

					'1' => 'Sarovar', 

					'2' => 'Grande','3' => 'CyberZon'], ['class' => 'form-control', 'id' => 'select_id']

					) }} <?php */?>

					

					<span class="permission-space"><input type="text" id="example1" value="<?php echo $seldate; ?>" class="hasDatePicker form-control"></span>
					

					</div></div>


					<table class="table-striped1 table dailystartpage">

					<thead class="thead-dark head-color">

					<tr>

					  <th>Report</th> 

					  <th>Status</th>

					  <th>Action</th>

					
             
					</tr>

					</thead>

					<tbody>
                    
                     @if(getlogperms('edit_firesafety') || getlogperms('print_fire_safety') || getlogperms('view_fire_safety') || getlogperms('download_fire_safety') ) 

					 <tr>

					  <td><b>Fire Safety</b></td>
					  
						<?php $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 
						//getlogperms_daily
					 ?>

					  <td><?php if($uriSegments[1] == 'getdailyreportdetail') {  if(isset($uriSegments[2])) { if($uriSegments[2] == '8' || $uriSegments[2] == '14' || $uriSegments[2] == '16' || $uriSegments[2] == '19' || $uriSegments[2] == '17' || $uriSegments[2] == '87') { echo "<b>NA</b>"; } else { ?><i id="firesafestaus" class="fa" aria-hidden="true"></i><?php }} }?></td> 
  
					<?php if($uriSegments[1] == 'getdailyreportdetail') {  if(isset($uriSegments[2])) { if($uriSegments[2] == '8' || $uriSegments[2] == '14' || $uriSegments[2] == '16' || $uriSegments[2] == '19' || $uriSegments[2] == '17' || $uriSegments[2] == '87') {  } else { ?>   <th> @if(getlogperms_daily('edit_firesafety'))<div id="target" class="edt"><button type="button" class="btn btn-inverse btn-xs"><!--<i class="fa fa-pencil-square-o" aria-hidden="true"></i>--> Edit</button></div>@endif @if(getlogperms('print_fire_safety'))
 
					   <button type="button" id="firesafeprint" class="btn btn-print btn-xs" ><!--<i class="fa fa-print" aria-hidden="true" ></i>--> Print</button><!--</a>--> @endif @if(getlogperms('view_fire_safety'))  <!--<a href="http://aparna.greaterkakinada.com/getdailyreportview/1" target="_blank">--><button id="viewfiresafe" type="button" class="btn btn-success btn-xs" ><!--<i class="fa fa-eye" aria-hidden="true"></i>--> View</button><!--</a>--> @endif   @if(getlogperms('download_fire_safety'))<button type="button" id="download_firesafe" class="btn btn-download btn-xs"><!--<i class="fa fa-download" aria-hidden="true"></i>--> Download</button>@endif</th> 

<?php }} }?>					</tr>
@endif 
@if(getlogperms('edit_fms') || getlogperms('print_fms') || getlogperms('view_fms') || getlogperms('download_fms')) 
					 <tr>

					  <td><b>FMS</b></td>

					  <td><i id="fmsstaus" class="fa fa-times" aria-hidden="true"></i></td>
					  <th> @if(getlogperms_daily('edit_fms'))<div id="target2" class="edt"><button type="button" class="btn btn-inverse btn-xs"><!--<i class="fa fa-pencil-square-o" aria-hidden="true"></i>--> Edit</button></div> @endif   @if(getlogperms('print_fms'))<button type="button" id="fmsprint" class="btn btn-print btn-xs"><!--<i class="fa fa-print" aria-hidden="true"></i>--> Print</button><!--<a href="http://aparna.greaterkakinada.com/getdailyreportprint/2" target="_blank"><button type="button" class="btn btn-secondary"><i class="fa fa-print" aria-hidden="true"></i> Print</button></a>-->  @endif  @if(getlogperms('view_fms'))  <button id="viewtarget" type="button" class="btn btn-success btn-xs"><!--<i class="fa fa-eye" aria-hidden="true"></i>--> View</button> @endif    @if(getlogperms('download_fms'))<button type="button" id="download_fms" class="btn btn-download btn-xs"><!--<i class="fa fa-download" aria-hidden="true"></i>--> Download</button> @endif  </th>

					</tr>
                     @endif 
                     @if(getlogperms('edit_pms') || getlogperms('print_pms') || getlogperms('view_pms') || getlogperms('download_pms'))

					 <tr>

					  <td><b>PMS</b></td> 

					  <td><i id="pmsstaus" class="fa fa-check" aria-hidden="true"></i></td>

					  <th> @if(getlogperms_daily('edit_pms'))<div id="target3" class="edt"><button type="button" class="btn btn-inverse btn-xs"><!--<i class="fa fa-pencil-square-o" aria-hidden="true"></i>--> Edit</button></div> @endif    @if(getlogperms('print_pms'))<!--<a href="http://aparna.greaterkakinada.com/getdailyreportprint/3" target="_blank">--><button type="button" id="pmsprint" class="btn btn-print btn-xs"><!--<i class="fa fa-print" aria-hidden="true"></i>--> Print</button><!--</a>--> @endif  @if(getlogperms('view_pms'))<button id="pmsviewtarget" type="button" class="btn btn-success btn-xs"><!--<i class="fa fa-eye" aria-hidden="true"></i>--> View</button><!--<a href="http://aparna.greaterkakinada.com/getdailyreportview/3" target="_blank"><button type="button" class="btn btn-success" id=""><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>--> @endif    @if(getlogperms('download_pms'))<button id="download_pms" type="button" class="btn btn-download btn-xs"><!--<i class="fa fa-download" aria-hidden="true"></i>--> Download</button>@endif </th>

					</tr>
@endif 
@if(getlogperms('edit_security') || getlogperms('view_security') || getlogperms('print_security') || getlogperms('download_security'))
					 <tr>

					  <td><b>Security</b></td>

					  <td><i id="securestatus" class="fa fa-check" aria-hidden="true"></i></td>

					  <th>@if(getlogperms_daily('edit_security'))<div id="target4" class="edt"><button type="button" class="btn btn-inverse btn-xs"><!--<i class="fa fa-pencil-square-o" aria-hidden="true"></i>--> Edit</button></div> @endif    @if(getlogperms('print_security')) <!--<a href="/getdailyreportprint/4" target="_blank">--><button type="button" id="securityprint" class="btn btn-print btn-xs"><!--<i class="fa fa-print" aria-hidden="true"></i>--> Print</button><!--</a>-->  <!--<a href="/getdailyreportview/4" target="_blank">-->@endif  @if(getlogperms('view_security'))<button type="button" id="securityviewtarget" class="btn btn-success btn-xs"><!--<i class="fa fa-eye" aria-hidden="true"></i>--> View</button><!--</a>--> @endif    @if(getlogperms('download_security'))<button type="button" id="download_security" class="btn btn-download btn-xs"><!--<i class="fa fa-download" aria-hidden="true"></i>--> Download</button>@endif </th>

					</tr>
   @endif                   
  
					</tbody>

					</table> 

					    @else
                        
                        <div>
                        
                          No Access 
                        </div>
  
				  @endif 

					

					<?php 

					  // echo "<pre>";  print_r($sites_names);  	echo "</pre>";

					?>

                    

                </div>

            </div>

	  

	<?php /*?>   <div>Line1:  Status1 </div>

	   <div>Line2:  Status2 </div>

	   <div>Line3:  Status3 </div> 

	   <div>Line4:  Status4 </div><?php */?>

</div>	   
  @include('partials.footer')
@stop

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type="text/javascript">



$( document ).ready(function() { 

  //alert("Selected date: " + dateText + "; input's current value: " + this.value);
  
   var dateText = $("#example1").val();
	
	 var site = $("#select_id11").val();

 
      $.ajax({
				type: "get",
				cache:false,
				dataType: "json",
				url: '{{ route('validation.checkstatus') }}',
				data: { dateText: dateText, site: site},
				success: function( response ) {
				 //var obj = jQuery.parseJSON( response);
                   //alert(obj.status);
			 //  alert(response[0]);
			     if(response[0] == 'yes'){
				    $("#firesafestaus").addClass("fa-check");
				   $("#firesafestaus").removeClass("fa-times");
				 }
				  if(response[0] == 'no'){
				   $("#firesafestaus").addClass("fa-times");
				   $("#firesafestaus").removeClass("fa-check");
				 }
				  if(response[1] == 'yes'){
				   $("#fmsstaus").addClass("fa-check");
				   $("#fmsstaus").removeClass("fa-times");
				 }
				  if(response[1] == 'no'){
				    $("#fmsstaus").addClass("fa-times");
				   $("#fmsstaus").removeClass("fa-check");
				 }
				  if(response[2] == 'yes'){
				    $("#pmsstaus").addClass("fa-check");
				   $("#pmsstaus").removeClass("fa-times");
				 }
				  if(response[2] == 'no'){
				    $("#pmsstaus").addClass("fa-times");
				   $("#pmsstaus").removeClass("fa-check");
				 }
				  if(response[3] == 'yes'){
				    $("#securestatus").addClass("fa-check");
				   $("#securestatus").removeClass("fa-times");
				 }
				  if(response[3] == 'no'){
				    $("#securestatus").addClass("fa-times");
				   $("#securestatus").removeClass("fa-check");
				 }
				}  
        });




  $( "#select_id" ).change(function() 

  {

   var val = $(this).val();

 

   var href = window.location.href;

   //window.location = href.replace(/getdailyreport\/.*$/, "");

   window.location.href = "/getdailyreport/"+val;

  // window.location.replace('getdailyreport/'+val);

	



  });

  

  $('select[name="sites"]').on('change', function(){    

  //  alert($(this).val());   

	

	 var val = $(this).val();

	 

	 if(val == "") {

	  var href = window.location.href;

   //window.location = href.replace(/getdailyreport\/.*$/, "");

   window.location.href = "/dailyreports";  

	   

	 } else {

	 

	 //http://aparna.greaterkakinada.com/dailyreports

  

   var href = window.location.href;

   //window.location = href.replace(/getdailyreport\/.*$/, "");

   window.location.href = "/getdailyreportdetail/"+val;  

   }

  // window.location.replace('getdailyreport/'+val);

	

});



//$("#example1").datepicker();



//$('#example1').datepicker({ dateFormat: "dd-mm-yy" });

$("#example1").datepicker({

 dateFormat: "dd-mm-yy",
  maxDate: '-1',
 
  onSelect: function(dateText) {

    alert("Selected date: " + dateText + "; input's current value: " + this.value);
	
	 var site = $("#select_id11").val();

	// window.location.href = "/getdailyreportstatusdate/"+site+"/"+dateText; 
	 
	  $.ajax({
				type: "get",
				cache:false,
				dataType: "json",
				url: '{{ route('validation.checkstatus') }}',
				data: { dateText: dateText, site: site},
				success: function( response ) {
				 //var obj = jQuery.parseJSON( response);
                   //alert(obj.status);
			  // alert(response[0]);
			     if(response[0] == 'yes'){
				    $("#firesafestaus").addClass("fa-check");
				   $("#firesafestaus").removeClass("fa-times");
				 }
				  if(response[0] == 'no'){
				   $("#firesafestaus").addClass("fa-times");
				   $("#firesafestaus").removeClass("fa-check");
				 }
				  if(response[1] == 'yes'){
				   $("#fmsstaus").addClass("fa-check");
				   $("#fmsstaus").removeClass("fa-times");
				 }
				  if(response[1] == 'no'){
				    $("#fmsstaus").addClass("fa-times");
				   $("#fmsstaus").removeClass("fa-check");
				 }
				  if(response[2] == 'yes'){
				    $("#pmsstaus").addClass("fa-check");
				   $("#pmsstaus").removeClass("fa-times");
				 }
				  if(response[2] == 'no'){
				    $("#pmsstaus").addClass("fa-times");
				   $("#pmsstaus").removeClass("fa-check");
				 }
				  if(response[3] == 'yes'){
				    $("#securestatus").addClass("fa-check");
				   $("#securestatus").removeClass("fa-times");
				 }
				  if(response[3] == 'no'){
				    $("#securestatus").addClass("fa-times");
				   $("#securestatus").removeClass("fa-check");
				 }
				}  
        });

  }

});





$( "#target" ).click(function() {

 var val = $("#select_id11").val();

 if(val == "") {

	  var href = window.location.href;

   //window.location = href.replace(/getdailyreport\/.*$/, "");

   window.location.href = "/dailyreports";  

	   

	 } else {

 var datev = $("#example1").val();

window.location.href = "/getdailyreport/"+val+"/1/"+datev; 

 

}

 

});



$( "#viewtarget" ).click(function() {

 var val = $("#select_id11").val();

 var datev = $("#example1").val();

 if(val == "") {

	  var href = window.location.href;

   //window.location = href.replace(/getdailyreport\/.*$/, "");

   window.location.href = "/dailyreports";  

	   

	 } else {

 

window.location.href = "/getdailyreportviewdetail/"+val+"/"+datev; 

}

 

});



$( "#viewfiresafe" ).click(function() {

 var val = $("#select_id11").val();

 var datev = $("#example1").val();

 if(val == "") {

	  var href = window.location.href;

   //window.location = href.replace(/getdailyreport\/.*$/, "");

   window.location.href = "/dailyreports";  

	   

	 } else {

  

window.location.href = "/getdailyreportfiresafeviewdetail/"+val+"/"+datev; 

}

 

});









$( "#pmsviewtarget" ).click(function() {

 var val = $("#select_id11").val();

 var datev = $("#example1").val();

 if(val == "") {

	  var href = window.location.href;

   //window.location = href.replace(/getdailyreport\/.*$/, "");

   window.location.href = "/dailyreports";  

	   

	 } else {

 

window.location.href = "/getdailyreportpmsviewdetail/"+val+"/"+datev; 

}

});


$( "#securityviewtarget" ).click(function() {

 var val = $("#select_id11").val();

 var datev = $("#example1").val();

 if(val == "") {

	  var href = window.location.href;

   //window.location = href.replace(/getdailyreport\/.*$/, "");

   window.location.href = "/dailyreports";  

	   

	 } else {

 

window.location.href = "/getdailyreportsecurityviewdetail/"+val+"/"+datev; 

}

 

});






$( "#target2" ).click(function() {

//window.location.href = "http://aparna.greaterkakinada.com/getdailyreport/2"; 

 var val = $("#select_id11").val();
 var datev = $("#example1").val();

if(val == "") {

	  var href = window.location.href;

   //window.location = href.replace(/getdailyreport\/.*$/, "");

   window.location.href = "/dailyreports";  

	   

	 } else {

 

/*window.location.href = "/getdailyreport/"+val+"/2"; */
window.location.href = "/getdailyreport/"+val+"/2/"+datev; 

}

 

});

$( "#target3" ).click(function() {

var val = $("#select_id11").val();
var datev = $("#example1").val();

if(val == "") {

	  var href = window.location.href;

   //window.location = href.replace(/getdailyreport\/.*$/, "");

   window.location.href = "/dailyreports";  

	   

	 } else {

 

/*window.location.href = "/getdailyreport/"+val+"/3"; */
window.location.href = "/getdailyreport/"+val+"/3/"+datev; 

}

//window.location.href = "http://aparna.greaterkakinada.com/getdailyreport/3"; 

 

});

$( "#target4" ).click(function() {

var val = $("#select_id11").val();
var datev = $("#example1").val();

if(val == "") {

	  var href = window.location.href;

   //window.location = href.replace(/getdailyreport\/.*$/, "");

   window.location.href = "/dailyreports";  

	   

	 } else {

 

/*window.location.href = "/getdailyreport/"+val+"/4"; */
window.location.href = "/getdailyreport/"+val+"/4/"+datev; 

}

// 

 

});



$( "#printfire" ).click(function() {



 window.location.href = "/getdailyreportprint/1"; 

 

});





//Print PAGE







$( "#fmsprint" ).click(function() {

 

var val = $("#select_id11").val();

 var datev = $("#example1").val();

 if(val == "") {

	  var href = window.location.href;

   //window.location = href.replace(/getdailyreport\/.*$/, "");

   window.location.href = "/dailyreports";  

	   

	 } else {

 

window.location.href = "/getdailyreportprintfpm/"+val+"/"+datev; 

}



 

});





$( "#firesafeprint" ).click(function() {

 

var val = $("#select_id11").val();

 var datev = $("#example1").val();

 if(val == "") {

	  var href = window.location.href;

   //window.location = href.replace(/getdailyreport\/.*$/, "");

   window.location.href = "/dailyreports";  

	   

	 } else {

 

window.location.href = "/getdailyreportprintfiresafe/"+val+"/"+datev; 

}



 

});






$( "#securityprint" ).click(function() {

 

var val = $("#select_id11").val();

 var datev = $("#example1").val();

 if(val == "") {

	  var href = window.location.href;

   //window.location = href.replace(/getdailyreport\/.*$/, "");

   window.location.href = "/dailyreports";  

	   

	 } else {

 

window.location.href = "/getdailyreportprintsecurity/"+val+"/"+datev; 

}


});





$( "#pmsprint" ).click(function() {

 

var val = $("#select_id11").val();

 var datev = $("#example1").val();

 if(val == "") {

	  var href = window.location.href;

   //window.location = href.replace(/getdailyreport\/.*$/, "");

   window.location.href = "/dailyreports";  

	   

	 } else {

 

window.location.href = "/getdailyreportprintpms/"+val+"/"+datev; 

}

});



$( "#download_security" ).click(function() {

 

var val = $("#select_id11").val();

 var datev = $("#example1").val();

 if(val == "") {

	  var href = window.location.href;

   //window.location = href.replace(/getdailyreport\/.*$/, "");

   window.location.href = "/dailyreports";  

	   

	 } else {

 

window.location.href = "/dailyreportdownloadsecure/"+val+"/"+datev; 

}

});






$( "#download_pms" ).click(function() {

 

var val = $("#select_id11").val();

 var datev = $("#example1").val();

 if(val == "") {

	  var href = window.location.href;

   //window.location = href.replace(/getdailyreport\/.*$/, "");

   window.location.href = "/dailyreports";  

	   

	 } else {

 

window.location.href = "/dailyreportdownloadpms/"+val+"/"+datev; 

}

});




$( "#download_fms" ).click(function() {

 

var val = $("#select_id11").val();

 var datev = $("#example1").val();

 if(val == "") {

	  var href = window.location.href;

   //window.location = href.replace(/getdailyreport\/.*$/, "");

   window.location.href = "/dailyreports";  

	   

	 } else {

 

window.location.href = "/dailyreportdownloadfms/"+val+"/"+datev; 

}

});


$( "#download_firesafe" ).click(function() {

 

var val = $("#select_id11").val();

 var datev = $("#example1").val();

 if(val == "") {

	  var href = window.location.href;

   //window.location = href.replace(/getdailyreport\/.*$/, "");

   window.location.href = "/dailyreports";  

	   

	 } else {

 

window.location.href = "/dailyreportdownloadfiresafe/"+val+"/"+datev; 

}

});







     

});







  

  </script>

