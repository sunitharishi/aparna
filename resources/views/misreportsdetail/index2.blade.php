@extends('layouts.app')

@section('content')
	<div class="getdailyreport">
    <h3 class="page-title">Daily Reports</h3>

   
	
	<div class="row">
                <div class="col-xs-12 form-group">
				
					
				     
                  <?php /*?> {!! Form::label('dailycat', 'category', ['class' => 'control-label']) !!}
                    {!! Form::select('category', $client_statuses, old('category'), ['class' => 'form-control', 'id' => 'select_id']) !!}<?php */?>
					 
					<div class="dlyrep-select">
					 {!! Form::label('dailycat1', 'Site:', ['class' => 'control-label']) !!}
                    {!! Form::select('sites', $sites_names, $segmentval, ['class' => 'form-control', 'id' => 'select_id11']) !!}
					 
					 
					<?php /*?> {!! Form::label('dailycat', 'Community', ['class' => 'control-label']) !!}
				   
					{{ Form::select('sites', [
					'0' => 'All',
					'1' => 'Sarovar', 
					'2' => 'Grande','3' => 'CyberZon'], ['class' => 'form-control', 'id' => 'select_id']
					) }} <?php */?>
					
					<span><input type="text" id="example1" value="<?php echo date("d/m/Y"); ?>" class="hasDatePicker form-control"></span>
					</div>
					  
					<table class="table">
					<thead class="thead-dark">
					<tr>
					  <th>Report</th> 
					  <th>Staus</th>
					  <th>Action</th>
					
					</tr>
					</thead>
					<tbody>
					 <tr>
					  <td>Fire Safety</td>
					  <td><i class="fa fa-check" aria-hidden="true"></i></td>
					   <th><div id="target" class="edt"><button type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></div> <a href="http://aparna.greaterkakinada.com/getdailyreportprint/1" target="_blank"><button type="button" class="btn btn-secondary" id=""><i class="fa fa-print" aria-hidden="true" ></i> Print</button></a>  <a href="#" target="_blank"><button type="button" class="btn btn-success" id=""><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>  <button type="button" class="btn btn-info"><i class="fa fa-download" aria-hidden="true"></i> Download</button></th>
					</tr>
					 <tr>
					  <td>FMS</td>
					  <td><i class="fa fa-times" aria-hidden="true"></i></td>
					  <th><div id="target2" class="edt"><button type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></div> <a href="http://aparna.greaterkakinada.com/getdailyreportprint/2" target="_blank"><button type="button" class="btn btn-secondary"><i class="fa fa-print" aria-hidden="true"></i> Print</button></a>  <a href="#" target="_blank"><button type="button" class="btn btn-success" id=""><i class="fa fa-eye" aria-hidden="true"></i> View</button></a> <button type="button" class="btn btn-info"><i class="fa fa-download" aria-hidden="true"></i> Download</button></th>
					</tr>
					 <tr>
					  <td>PMS</td>
					  <td><i class="fa fa-check" aria-hidden="true"></i></td>
					  <th><div id="target3" class="edt"><button type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></div> <a href="http://aparna.greaterkakinada.com/getdailyreportprint/3" target="_blank"><button type="button" class="btn btn-secondary"><i class="fa fa-print" aria-hidden="true"></i> Print</button></a> <a href="#" target="_blank"><button type="button" class="btn btn-success" id=""><i class="fa fa-eye" aria-hidden="true"></i> View</button></a> <button type="button" class="btn btn-info"><i class="fa fa-download" aria-hidden="true"></i> Download</button></th>
					</tr>
					 <tr>
					  <td>Security</td>
					  <td><i class="fa fa-check" aria-hidden="true"></i></td>
					  <th><div id="target4" class="edt"><button type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></div> <a href="http://aparna.greaterkakinada.com/getdailyreportprint/4" target="_blank"><button type="button" class="btn btn-secondary"><i class="fa fa-print" aria-hidden="true"></i> Print</button></a>  <a href="#" target="_blank"><button type="button" class="btn btn-success" id=""><i class="fa fa-eye" aria-hidden="true"></i> View</button></a> <button type="button" class="btn btn-info"><i class="fa fa-download" aria-hidden="true"></i> Download</button></th>
					</tr>
					</tbody>
					</table>
					 
				  
					
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
@stop
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">

$( document ).ready(function() {
  $( "#select_id" ).change(function() 
  {
   var val = $(this).val();
 
   var href = window.location.href;
   //window.location = href.replace(/getdailyreport\/.*$/, "");
   window.location.href = "http://aparna.greaterkakinada.com/getdailyreport/"+val;
  // window.location.replace('getdailyreport/'+val);
	

  });
  
  $('select[name="sites"]').on('change', function(){    
  //  alert($(this).val());   
	
	 var val = $(this).val();
	 
	 if(val == "") {
	  var href = window.location.href;
   //window.location = href.replace(/getdailyreport\/.*$/, "");
   window.location.href = "http://aparna.greaterkakinada.com/dailyreports";  
	   
	 } else {
	 
	 //http://aparna.greaterkakinada.com/dailyreports
  
   var href = window.location.href;
   //window.location = href.replace(/getdailyreport\/.*$/, "");
   window.location.href = "http://aparna.greaterkakinada.com/getdailyreportdetail/"+val;  
   }
  // window.location.replace('getdailyreport/'+val);
	
});

//$("#example1").datepicker();

$('#example1').datepicker({ dateFormat: "dd/mm/yy" });



$( "#target" ).click(function() {
window.location.href = "http://aparna.greaterkakinada.com/getdailyreport/1"; 
 
});
$( "#target2" ).click(function() {
window.location.href = "http://aparna.greaterkakinada.com/getdailyreport/2"; 
 
});
$( "#target3" ).click(function() {
window.location.href = "http://aparna.greaterkakinada.com/getdailyreport/3"; 
 
});
$( "#target4" ).click(function() {
window.location.href = "http://aparna.greaterkakinada.com/getdailyreport/4"; 
 
});

$( "#printfire" ).click(function() {

 window.location.href = "http://aparna.greaterkakinada.com/getdailyreportprint/1"; 
 
});



     
});



  
  </script>
