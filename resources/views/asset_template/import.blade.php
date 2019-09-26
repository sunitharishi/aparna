@extends('layouts.app')

@section('content')


   
	<div class="dailyreports asset-template-import">
    <h3 class="page-title adftempolate-asset">Asset Templates   >>   Import
      
       <p class="ptag">
          <a href="{{ route('asset-templates.index') }}" class="btn btn-back-list">Back</a> 
       </p>
    </h3>

    
	{!! Form::open(['files' => 'true','route' => 'asset-templates.eimport','role' => 'form', 'class'=>'form-inline upload-attendance-form', 'onsubmit' =>"return subform()"]) !!}
	            <div class="row nochossingfiles">
	            	<div class="col-sm-12 col-xs-12 form-group foematltion">
						<label class="sr-only" for="file">Upload File</label>
						<input type="file" name="file" id="file" class="btn" title="Select File" />
						<div class="help-block"><strong>Note!</strong><span style="font-weight:bold;color:#000;"> Only xls or xlsx file is allowed!!</span> <a href="{!! URL::to('/uploads/asset-template-sample.xlsx') !!}">Click here for Sample File.</a></div>
					</div>
					<div class="col-sm-12 col-xs-12">
						<button type="submit" class="btn btn-primary">Upload file</button>
						<a href="{{ route('asset-templates.index') }}" class="btn btn-danger aturl">Cancel</a>
					</div>
					@if($message) <p class="help-block">{{ $message }}</p>@endif
	            </div>	
                
                
                
	            <div class="row class-ctration mistakenparsha">
	            	<!--<div class="col-sm-1"></div>-->
	            	<div class="col-sm-11 col-xs-11">
	            	<b><u>Template:</u></b><br><br>	            	
	            	<div class="row">
        				<div class="col-sm-3 col-xs-3"><b>S.No*: </b></div>
	            		<div class="col-sm-7">Serial Number</div>	<hr>
            		</div>
	            	<div class="row">
        				<div class="col-sm-3 col-xs-3"><b>Template Code*: </b></div>
	            		<div class="col-sm-7 col-xs-7">Should be unique code</div>	<hr>
            		</div>
            		<div class="row">
        				<div class="col-sm-3 col-xs-3"><b>Template Name*: </b></div>
	            		<div class="col-sm-7 col-xs-7">Name of the template</div>	<hr>
            		</div>
					</div>
	            </div>

	            <div class="row parshaity">
	            	<!--<div class="col-sm-1"></div>-->
	            	<div class="col-sm-11 col-xs-11">
		            	<b><u>Section:</u></b><br><br>
		            	Before every section, a column should be there with value "<b>SECTION</b>"<br /><br />
		            	<div class="row">
	        				<div class="col-sm-3 col-xs-3"><b>SECTION*: </b></div>
		            		<div class="col-sm-7 col-xs-7">SECTION</div><hr>	
	            		</div>
		            	<div class="row">
	        				<div class="col-sm-3 col-xs-3"><b>Section Name: </b></div>
		            		<div class="col-sm-7 col-xs-7">Empty / Name of the section</div><hr>	
	            		</div>
	            		<div class="row">
	        				<div class="col-sm-3 col-xs-3"><b>Section Number of columns: </b></div>
		            		<div class="col-sm-7 col-xs-7">1,2,3,4</div><hr>
	            		</div>
	            		<div class="row">
	        				<div class="col-sm-3 col-xs-3"><b>Sort Order: </b></div>
		            		<div class="col-sm-7 col-xs-7">Order of the section</div><hr>
	            		</div>
					</div>
	            </div>

	            <div class="row class-ctration with-value">
	            	<!--<div class="col-sm-1"></div>-->
	            	<div class="col-sm-11 col-xs-11">	            		
	            		<br /><b><u>Field:</u></b><br><br>
	            		Before every field, a column should be there with value "<b>FIELD</b>"<br /><br />
	            		<div class="row">
	            			<div class="col-sm-6 col-xs-6 guidelines">
	            				<div class="row">
			        				<div class="col-sm-4 col-xs-4"><b>FIELD*: </b></div>
				            		<div class="col-sm-7 col-xs-7">FIELD</div><hr>	
			            		</div>
			            		<div class="row">
			        				<div class="col-sm-4 col-xs-4"><b>Field Label*: </b></div>
				            		<div class="col-sm-7 col-xs-7">Name of the field</div><hr>	
			            		</div>
			            		<div class="row">
				            		<div class="col-sm-4 col-xs-4"><b>Field Type: </b></div>
				            		<div class="col-sm-6 col-xs-6">
				            			1 - Text box [ Default ] <br />
										2 - Select Box<br />
										3 - Check box<br />
										4 - Radio button<br />
										5 - Text Area<br />
										6 - Date<br />
										7 - DateTime<br />
										8 - Text Editor<br />
										9 - Attachment<br />
				            		</div><hr>		
			            		</div>
	            			
	            				<div class="row">
		            				<div class="col-sm-4 col-xs-4"><b>Field Required: </b></div>
				            		<div class="col-sm-7 col-xs-7">
				            			Leave it blank if not required<br />
				            			N - NO [ Default ] <br />
										Y - YES<br />
				            		</div><hr>	
			            		</div>
			            		<div class="row"><br />
			            			<div class="col-sm-4 col-xs-4"><b>Field Input Validation: </b></div>
				            		<div class="col-sm-7 col-xs-7">
				            			Leave it blank if no validation<br />
				            			0 - Any [ Default ]<br />
										1 - Alphabets<br />
										2 - Numbers<br />
										3 - Alpha Numeric<br />
				            		</div><hr>
			            		</div>	
			            		<div class="row">
			        				<div class="col-sm-4 col-xs-4"><b>Field Order: </b></div>
				            		<div class="col-sm-7 col-xs-7">Order of the field, leave it blank if not needed</div><hr>	
			            		</div>
			            		<div class="row">
			        				<div class="col-sm-4 col-xs-4"><b>Field Default Value: </b></div>
				            		<div class="col-sm-7 col-xs-7">Leave it blank if not needed</div><hr>	
			            		</div>
			            		<div class="row">
			        				<div class="col-sm-4 col-xs-4"><b>Field Options: </b></div>
				            		<div class="col-sm-7 col-xs-7">For Select box , Check boxes , Radio buttons<br>
				            			Values should be line by line<br>
				            			Press F2 to enter values <br>
				            			Press Alt+Enter to enter new line on that cell
				            		</div><hr>	
			            		</div>
	            			</div>
	            			
		            		<div class="col-sm-1"></div>
		            		
	            		</div>

	            		<div class="row"><br />
		            		
	            		</div>

	            		

	            		
	            	 					

					</div>
	            </div>					  

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