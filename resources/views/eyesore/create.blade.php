@extends('layouts.app')

@section('content')
   
 <div class="getdailyreport snag-edit-page">
    <h3 class="page-title"><span>Create Eyesore</span>
       
    </h3>
     <p class="ptag">
          <a href="{{ route('eyesore') }}" class="btn green-back">Back</a>
       </p>
</div>
{!! Form::open(['files' => 'true','method' => 'POST', 'route' => ['eyesore.submitsore'], 'class' => 'for-labelling','onsubmit' =>"return subform()"]) !!}
<div class="row">  
      <div class="col-xs-12 form-group"> 
        <div class="snag-reports-edit">
         <div class="col-sm-6">
		     <label>Site</label><br>
		     {!! Form::select('sites', $sitenames, old('category'), ['class' => 'form-control pms-auditreport', 'id' => 'site', 'required']) !!} 
		 </div>
		  <div class="col-sm-6 form-group">
			 <label>Start Date</label><br>
		     <input type="text" value="<?php echo date("d-m-Y"); ?>" id="example1" name="reporton" class="hasDatePicker form-control">
		 </div>
		 <div class="col-sm-6">
		     <label>Description</label><br>
		     <textarea name="observation" id="observation" required  style="width:100%; height:50px;"></textarea>
		 </div>
         <div class="col-sm-6">
		      <label>Remarks</label><br>
		     <textarea name="remarks" id="remarks" style="width:100%; height:50px;"></textarea>
		 </div>
		 <div class="col-sm-6 form-group">
		      <label>Before Image</label><br>
		     <input type="file" class="form-control"  name="before_image" />
		 </div>
		 <div class="col-sm-6 form-group status" style="height:auto !Important;">
		    <label>Status</label><br>
		    <input type="radio" name="status" checked="checked" value="1" id="status"> Open
			<input type="radio" name="status" value="2" id="status"> In Progress
			<input type="radio" name="status" value="0" id="status"> Closed
		 </div>
		 <div class="col-sm-6 form-group" >
		     <label>Location</label><br>
		     <textarea name="location" id="location" required style="width:100%; height:50px;"></textarea>
		 </div>
		 <div class="col-sm-6 form-group">
		 	&nbsp;
		 </div>
	   </div>
	   
	   <div class="col-sm-12">
	       <div class="snag-edit-submit">
			   {!! Form::submit('Submit', ['class' => 'btn btn-danger']) !!}
	       </div>
	   </div>
	</div>
	{!! Form::close() !!}
    @include('partials.footer')
@stop

