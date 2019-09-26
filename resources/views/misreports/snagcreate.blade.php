@extends('layouts.app')

@section('content')
   
 <div class="getdailyreport snag-edit-page">
    <h3 class="page-title"><span>Create Snag Report</span>
       
    </h3>
     <p class="ptag">
          <a href="{{ route('snagindex') }}" class="btn green-back">Back</a>
       </p>
</div>
{!! Form::open(['files' => 'true','method' => 'POST', 'route' => ['misreports.submitsnag'], 'class' => 'for-labelling','onsubmit' =>"return subform()"]) !!}
<div class="row">  
      <div class="col-xs-12 form-group"> 
        <div class="snag-reports-edit">
         <div class="col-sm-6">
		     <label>Site</label><br>
		     {!! Form::select('sites', $sitenames, old('category'), ['class' => 'form-control pms-auditreport', 'id' => 'site', 'required']) !!} 
		 </div>
		 <div class="col-sm-6 form-group">
		     <label>Category</label><br>
		     {!! Form::select('categories', $categories, old('category'), ['class' => 'form-control pms-auditreport', 'id' => 'category', 'required']) !!}
		 </div>
		 <div class="col-sm-6">
		     <label>Observation</label><br>
		     <textarea name="observation" id="observation" required  style="width:100%; height:50px;"></textarea>
		 </div>
		  <div class="col-sm-6 form-group">
		     <label>Location</label><br>
		     <textarea name="location" id="location" required style="width:100%; height:50px;"></textarea>
		 </div>
		 <div class="col-sm-6 form-group">
		      <label>Snag Report Date</label><br>
		     <input type="text" value="<?php echo date("d-m-Y"); ?>" id="example1" name="reporton" class="hasDatePicker form-control">
		 </div>
		 <div class="col-sm-6 form-group">
		     <label>Timeline given by projects team</label><br>
		     <input type="text" id="example2" name="timeline" class="hasDatePicker form-control">
		 </div>
		 <div class="col-sm-6 form-group status" style="height:auto !Important;">
		    <label>Status</label><br>
		    <input type="radio" name="status" checked="checked" value="1" id="status"> Open
			<input type="radio" name="status" value="2" id="status"> In Progress
			<input type="radio" name="status" value="0" id="status"> Closed
		 </div>
		 <div class="col-sm-6 form-group">
		      <label>Upload Image</label><br>
		     <input type="file" class="form-control"  name="imagepath" />
		 </div>
		 <div class="col-sm-6 form-group">
		     <label>Recommendations</label><br>
             <input type="radio" value="image" name="rectype"/> Image
             <input type="radio" value="text" name="rectype"/> Text
             <div class="image" style="display:none;">
		     	  <input type="file" class="form-control"  name="recimagepath" />
             </div>
             <div class="text" style="display:none;">		     	
                <textarea name="recommendations" id="recommendations" style="width:100%; height:50px;"></textarea>
             </div>
		 </div>
         <div class="col-sm-6 form-group">
		      <label>Remarks</label><br>
		     <textarea name="remarks" id="remarks" style="width:100%; height:50px;"></textarea>
		 </div>
	   </div>
	   
	   <div class="col-sm-12">
	       <div class="snag-edit-submit">
			   {!! Form::submit('Submit', ['class' => 'btn btn-danger']) !!}
	       </div>
	   </div>
	</div>
	{!! Form::close() !!}
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
    $( document ).ready(function() {
       $('#example1').datepicker({ dateFormat: "dd-mm-yy" });
       $('#example2').datepicker({ dateFormat: "dd-mm-yy" });
           $("input[name$='rectype']").click(function() {
			var inputValue = $(this).attr("value");
			if(inputValue=='image')
			{
				$(".image").show();
				$(".text").hide();
			}
			else
			{
				$(".image").hide();
				$(".text").show();
			}
		});
       
    });

    </script>
    @include('partials.footer')
@stop

