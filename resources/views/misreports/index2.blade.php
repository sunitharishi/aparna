@extends('layouts.app')

@section('content')
	<div class="getdailyreport">
    <h3 class="page-title">MIS Reports</h3>

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
                <div class="col-xs-12 form-group">
				
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
					 
					<div class="dlyrep-select">
					<?php /*?> {!! Form::label('dailycat1', 'Site:', ['class' => 'control-label']) !!}
                    {!! Form::select('sites', $sites_names, $segmentval, ['class' => 'form-control', 'id' => 'select_id11']) !!}<?php */?>
					 
					 
					<?php /*?> {!! Form::label('dailycat', 'Community', ['class' => 'control-label']) !!}
				   
					{{ Form::select('sites', [
					'0' => 'All',
					'1' => 'Sarovar', 
					'2' => 'Grande','3' => 'CyberZon'], ['class' => 'form-control', 'id' => 'select_id']
					) }} <?php */?>
					
					<span><input type="text" id="example1" value="<?php echo date("d/m/Y"); ?>" class="hasDatePicker form-control"></span>
					</div>
					  
					<table class="table table-striped2 report-status-work zebra-crossingtable">
					<thead class="thead-dark head-color">
					<tr>
					  <th>Report</th> 
					  <th>Staus</th>
					  <th>Action</th>
					
					</tr>
					</thead>
					<tbody>
					 <tr>
					  <td>Metro water Report</td>
					  <td><i class="fa fa-check" aria-hidden="true"></i></td>
					   <th><div id="target" class="edt"><button type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></div> <a href="http://aparna.greaterkakinada.com/getmisreportprint/1" target="_blank"><button type="button" class="btn btn-secondary" id=""><i class="fa fa-print" aria-hidden="true" ></i> Print</button></a>  <button type="button" class="btn btn-info"><i class="fa fa-download" aria-hidden="true"></i> Download</button></th>
					</tr>
					 <tr>
					  <td>Water source and consumption</td>
					  <td><i class="fa fa-times" aria-hidden="true"></i></td>
					  <th><div id="target2" class="edt"><button type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></div> <a href="http://aparna.greaterkakinada.com/getmisreportprint/2" target="_blank"><button type="button" class="btn btn-secondary"><i class="fa fa-print" aria-hidden="true"></i> Print</button></a>  <button type="button" class="btn btn-info"><i class="fa fa-download" aria-hidden="true"></i> Download</button></th>
					</tr>
					 <tr>
					  <td>Borewells not working status</td>
					  <td><i class="fa fa-check" aria-hidden="true"></i></td>
					  <th><div id="target3" class="edt"><button type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></div> <a href="http://aparna.greaterkakinada.com/getmisreportprint/3" target="_blank"><button type="button" class="btn btn-secondary"><i class="fa fa-print" aria-hidden="true"></i> Print</button></a> <button type="button" class="btn btn-info"><i class="fa fa-download" aria-hidden="true"></i> Download</button></th>
					</tr>
					 <tr>
					  <td>Fire safety status</td>
					  <td><i class="fa fa-check" aria-hidden="true"></i></td>
					  <th><div id="target4" class="edt"><button type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></div> <a href="http://aparna.greaterkakinada.com/getmisreportprint/4" target="_blank"><button type="button" class="btn btn-secondary"><i class="fa fa-print" aria-hidden="true"></i> Print</button></a>  <button type="button" class="btn btn-info"><i class="fa fa-download" aria-hidden="true"></i> Download</button></th>
					</tr>
					 <tr>
					  <td>Electro Mechanical Equipment status</td>
					  <td><i class="fa fa-check" aria-hidden="true"></i></td>
					  <th><div id="target4" class="edt"><button type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></div> <a href="http://aparna.greaterkakinada.com/getmisreportprint/5" target="_blank"><button type="button" class="btn btn-secondary"><i class="fa fa-print" aria-hidden="true"></i> Print</button></a>  <button type="button" class="btn btn-info"><i class="fa fa-download" aria-hidden="true"></i> Download</button></th>
					</tr>
					 <tr>
					  <td>STP Status</td>
					  <td><i class="fa fa-check" aria-hidden="true"></i></td>
					  <th><div id="target4" class="edt"><button type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></div> <a href="http://aparna.greaterkakinada.com/getmisreportprint/6" target="_blank"><button type="button" class="btn btn-secondary"><i class="fa fa-print" aria-hidden="true"></i> Print</button></a>  <button type="button" class="btn btn-info"><i class="fa fa-download" aria-hidden="true"></i> Download</button></th>
					</tr>
					 <tr>
					  <td>WSP Status</td>
					  <td><i class="fa fa-check" aria-hidden="true"></i></td>
					  <th><div id="target4" class="edt"><button type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></div> <a href="http://aparna.greaterkakinada.com/getmisreportprint/7" target="_blank"><button type="button" class="btn btn-secondary"><i class="fa fa-print" aria-hidden="true"></i> Print</button></a>  <button type="button" class="btn btn-info"><i class="fa fa-download" aria-hidden="true"></i> Download</button></th>
					</tr>
					 <tr>
					  <td>Security Report</td>
					  <td><i class="fa fa-check" aria-hidden="true"></i></td>
					  <th><div id="target4" class="edt"><button type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></div> <a href="http://aparna.greaterkakinada.com/getmisreportprint/8" target="_blank"><button type="button" class="btn btn-secondary"><i class="fa fa-print" aria-hidden="true"></i> Print</button></a>  <button type="button" class="btn btn-info"><i class="fa fa-download" aria-hidden="true"></i> Download</button></th>
					</tr>
					 <tr>
					  <td>Housekeeping Report</td>
					  <td><i class="fa fa-check" aria-hidden="true"></i></td>
					  <th><div id="target4" class="edt"><button type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></div> <a href="http://aparna.greaterkakinada.com/getmisreportprint/9" target="_blank"><button type="button" class="btn btn-secondary"><i class="fa fa-print" aria-hidden="true"></i> Print</button></a>  <button type="button" class="btn btn-info"><i class="fa fa-download" aria-hidden="true"></i> Download</button></th>
					</tr>
					 <tr>
					  <td>Horticulture Report</td>
					  <td><i class="fa fa-check" aria-hidden="true"></i></td>
					  <th><div id="target4" class="edt"><button type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></div> <a href="http://aparna.greaterkakinada.com/getmisreportprint/10" target="_blank"><button type="button" class="btn btn-secondary"><i class="fa fa-print" aria-hidden="true"></i> Print</button></a>  <button type="button" class="btn btn-info"><i class="fa fa-download" aria-hidden="true"></i> Download</button></th>
					</tr>
					 <tr>
					  <td>Club House Utilization Data</td>
					  <td><i class="fa fa-check" aria-hidden="true"></i></td>
					  <th><div id="target4" class="edt"><button type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></div> <a href="http://aparna.greaterkakinada.com/getmisreportprint/11" target="_blank"><button type="button" class="btn btn-secondary"><i class="fa fa-print" aria-hidden="true"></i> Print</button></a>  <button type="button" class="btn btn-info"><i class="fa fa-download" aria-hidden="true"></i> Download</button></th>
					</tr>
					 <tr>
					  <td>Occupancy Data</td>
					  <td><i class="fa fa-check" aria-hidden="true"></i></td>
					  <th><div id="target4" class="edt"><button type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></div> <a href="http://aparna.greaterkakinada.com/getmisreportprint/12" target="_blank"><button type="button" class="btn btn-secondary"><i class="fa fa-print" aria-hidden="true"></i> Print</button></a>  <button type="button" class="btn btn-info"><i class="fa fa-download" aria-hidden="true"></i> Download</button></th>
					</tr>
					 <tr>
					  <td>Indented Material Status</td>
					  <td><i class="fa fa-check" aria-hidden="true"></i></td>
					  <th><div id="target4" class="edt"><button type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></div> <a href="http://aparna.greaterkakinada.com/getmisreportprint/13" target="_blank"><button type="button" class="btn btn-secondary"><i class="fa fa-print" aria-hidden="true"></i> Print</button></a>  <button type="button" class="btn btn-info"><i class="fa fa-download" aria-hidden="true"></i> Download</button></th>
					</tr>
					 <tr>
					  <td>Apna Complex Complaint Report</td>
					  <td><i class="fa fa-check" aria-hidden="true"></i></td>
					  <th><div id="target4" class="edt"><button type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></div> <a href="http://aparna.greaterkakinada.com/getmisreportprint/14" target="_blank"><button type="button" class="btn btn-secondary"><i class="fa fa-print" aria-hidden="true"></i> Print</button></a>  <button type="button" class="btn btn-info"><i class="fa fa-download" aria-hidden="true"></i> Download</button></th>
					</tr>
					 <tr>
					  <td>Fire Mock Drill</td>
					  <td><i class="fa fa-check" aria-hidden="true"></i></td>
					  <th><div id="target4" class="edt"><button type="button" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></div> <a href="http://aparna.greaterkakinada.com/getmisreportprint/15" target="_blank"><button type="button" class="btn btn-secondary"><i class="fa fa-print" aria-hidden="true"></i> Print</button></a>  <button type="button" class="btn btn-info"><i class="fa fa-download" aria-hidden="true"></i> Download</button></th>
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
