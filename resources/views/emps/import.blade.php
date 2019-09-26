@extends('layouts.app')

@section('content')


   
	<div class="dailyreports employee-imports">
    <h3 class="page-title employee-import upload-employees">Employees   >>   Import
       <p class="ptag">
          <a href="{{ route('emps.index') }}" class="btn btn-back-list">Back</a>
       </p>
    </h3>

    
	{!! Form::open(['files' => 'true','route' => 'emps.import','role' => 'form', 'class'=>'form-inline upload-attendance-form form-import-employee', 'onsubmit' =>"return subform()"]) !!}
	            
			
			 <div class="form-group">

							<label class="sr-only" for="file">Upload File</label>

							<input type="file" name="file" id="file" class="btn btn-upload" title="Select File">

						  </div>

						  <button type="submit" class="btn btn-default upload-btfile">Upload file</button>

						  <div class="help-block"><strong style="color:#ff2518;">Note!</strong> <span style="font-weight:bold;font-size:12px;color:#000;">Only xls or xlsx file is allowed!!</span> <a href="{!! URL::to('/uploads/emp-sample.xlsx') !!}">Click here for Sample File.</a></div>

						{!! Form::close() !!}

            
          
	
	 </div>  

<script type="text/javascript">


function subform() { 
  
	var flag = true;

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