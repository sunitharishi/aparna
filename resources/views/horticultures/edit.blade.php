@extends('layouts.app')

@section('content')
<style>
.erroremp{
 border: 2px solid red;
}
#reason
{
	height:100px;
}


</style>
<div class="panel panel-default panelmar tsas-crseations communities-sited">
    	{!! Form::model($horticultures, ['files' => 'true','method' => 'PUT', 'route' => ['horticultures.update', $horticultures->id]]) !!}
        <div class="panel-heading">
            Horticultures
            <a href="{{ route('horticultures.index') }}" class="btn green-back" style="float:right;">Back</a>
        </div>        
        <div class="panel-body site-seeing">
            <div class="row communitybackground project">
                <div class="col-xs-3 form-group">
                    {!! Form::label('community_id', 'Community Name', ['class' => 'control-label']) !!}
                    {!! Form::select('community_id', $communities, old('community_id'), ['class' => 'form-control required', 'id' => 'community_id']) !!}  
                </div> 
           
                <div class="col-xs-3 form-group" id="blocks" style="display:none;">
                    {!! Form::label('block_id', 'Location', ['class' => 'control-label']) !!}
                    {!! Form::text('block_id', old('block_id'), ['class' => 'form-control required', 'id'=> 'block_id', 'onchange'=>'sublocation(this.value)', 'placeholder' => '']) !!}
                </div> 
                <div class="col-sm-3 form-group plot-nos" id="locations">
                    {!! Form::label('sub_location', 'Sub Location', ['class' => 'control-label']) !!}
                    {!! Form::text('sub_location', old('sub_location'), ['class' => 'form-control required', 'placeholder' => '']) !!}
                </div>
                <div class="col-xs-3 form-group">
                   <label class="control-label">Upload Image</label>
                   <input type="file" class="form-control required" name="himage" id="himage"  />
				   <img src="/uploads/horticulture/<?php echo $horticultures->block_image; ?>"
				    class="img-responsive" style="max-width:50px; width:50px; height:50px;">
                </div>
            </div>       
            <div class="row communitybackground1 address-locations">
               <label class="col-sm-12  col-xs-12 address"></label>                
                  <div class="col-sm-4 form-group">
                    <label>Plant name</label>
                     {!! Form::text('plant_name', old('plant_name'), ['class' => 'form-control required', 'id'=> 'plant_name', 'placeholder' => '']) !!}
                </div>
                 <div class="col-sm-4 form-group">
                    <label>No. of Plants</label>
                     {!! Form::number('no_plants', old('no_plants'), ['class' => 'form-control required', 'id'=> 'no_plants', 'placeholder' => '']) !!}
                </div>
                <div class="col-sm-4 form-group">
                    <label>Soil type</label>
                    {!! Form::text('soil_type', old('soil_type'), ['class' => 'form-control required', 'id'=> 'soil_type', 'placeholder' => '']) !!}
                </div>    
            </div>
            <div class="row communitybackground1 address-locations" id="reason_text" 
			style="display: <?php if($horticultures->type=='Re-Plantation') echo 'block'; else echo 'none'; ?>">
               <label class="col-sm-12  col-xs-12 address"></label>  
			      <div class="col-sm-3 form-group">
                    <label>Report Date</label>
                    {!! Form::text('report_on', old('report_on'), ['class' => 'form-control example1', 'id'=> 'report_on', 'placeholder' => '']) !!}
                </div>              
                  <div class="col-sm-3 form-group">
                    <label>Man Power Nos</label>
                    {!! Form::number('man_power_nos', old('man_power_nos'), ['class' => 'form-control', 'id'=> 'man_power_nos', 'placeholder' => '']) !!}
                </div>
                 <div class="col-sm-3 form-group">
                    <label>No of Hours</label>
                    {!! Form::text('no_of_hrs', old('no_of_hrs'), ['class' => 'form-control', 'id'=> 'no_of_hrs', 'placeholder' => '']) !!}
                </div>
                <div class="col-sm-3 form-group">
                    <label>Reason</label>
                    {!! Form::textarea('reason', old('reason'), ['class' => 'form-control', 'id'=> 'reason', 'placeholder' => '']) !!}
                </div>    
            </div>	      
         </div>
        {!! Form::submit('Submit', ['class' => 'btn btn-danger btn-register sites-next-button']) !!}
        {!! Form::close() !!}
</div> 
@include('partials.footer')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
		$( document ).ready(function() {
			  $('.example1').datepicker({ dateFormat: "dd-mm-yy" });
		});
		$('select[name="community_id"]').on('change', function(){   
		var val = $(this).val();	 
		if(val == "") {		  
		   $("#blocks").css("display", "none");
		   
		 } 
		 else 
		 {		 
		 	var thisvalue = $( this ).text();
		  	var selectedText = $(this).find("option:selected").text();
			$("#communityname").html(selectedText);		
		    $.ajax({
				type: "get",
				cache:false,
				url: 'http://testing.rreg.in/getbloacksforsite',
				data: { site: val},
				success: function(response) 
				{	
		 			$("#blocks").css("display", "block");				
					$("#blocks").html(response);
			  	}  
			}); 	 
		 }
	 });
	 function subform()
	 {	
		var errors=0;
		$('.required').each( function () { 
			var itemId = $(this).attr('id');
			 
			if($('#'+itemId).val()==""){
				 $('#'+itemId).css('border','1px solid #FF0000');
				errors =  errors+1; 
			}
			else
			{
				$('#'+itemId).css('border','1px solid #EAC9BA');
			}
		 });
		 if(errors>0){
			$("html, body").animate({ scrollTop: 0 }, "slow");
			return false;
		}
		$('#updateForm').submit();
	 }
	 function sublocation()
	 {
		var type = $("input[name='type']:checked").val();
		console.log(type);
	 	if(type=="Re-Plantation")
		{
			var block_id = $("#block_id").val();	
			$.ajax({
				type: "get",
				cache:false,
				url: 'http://testing.rreg.in/gethoslocations',
				data: { block_id: block_id},
				success: function(response) 
				{		
					$("#locations").html(response);
				}  
			}); 
		}
	 }
	 function changeType(dis)
	 {
	 	if(dis=='Re-Plantation')
		{
		  	$("#reason_text").show();
			$("#no_of_hrs").addClass("required");
			$("#report_on").addClass("required");
			$("#man_power_nos").addClass("required");
			$("#reason").addClass("required");
		 }
		else 
		{
			$("#reason_text").hide();
			$("#no_of_hrs").removeClass("required");
			$("#report_on").removeClass("required");
			$("#man_power_nos").removeClass("required");
			$("#reason").removeClass("required");
		}
	 }
</script>
@stop