@extends('layouts.app')

@section('content')
<style>
  #footer
  {
   right:0px;
   left:0px;
   margin:0 auto;
  }
</style>
    <!--<h3 class="page-title">Vendors</h3>-->
    
    {!! Form::model($vendors, ['method' => 'PUT', 'files' => 'true', 'route' => ['vendors.update', $vendors->id]]) !!}

    <div class="panel panel-default respositroy-view">
        <div class="panel-heading">
            Vendors
             <p class="ptag">
               <a href="{{ route('vendors.index') }}" class="btn green-back">Back</a>
            </p>
        </div> 

     <div class="panel-body vendors-checking">
        <div class="row vendors-background for-vnames">
		<div class="sites">
					 		<label class="site-block">Sites</label>
							  @if (count($sites_attr_names) > 0)  
						  <?php    
						     $vsitedata = $vendors['site'];
							  $varray = explode(",",$vsitedata);
							?> 
							<span class="select_all"><input type="checkbox" id="all_select"> <label> All</label></span>
                        	@foreach ($sites_attr_names as $key => $site)
						  <div id="checkboxlist" class="checkbox-cnt checklistsee">
						  
						   <span class="boxcheck"><input type="checkbox" name="site[]"  value="<?php echo $key; ?>" class="use_select" <?php if(in_array($key,$varray)) echo 'checked="checked"'; ?>></span><span><?php echo $site ; ?></span>
						  </div> 
                           @endforeach 
                    @endif 
                 </div>
               </div>
                 
			<div class="row vendors-background1 companyname-code">
                <div class="col-xs-3 form-group">
                    {!! Form::label('vcode', 'Code', ['class' => 'control-label']) !!}
                    {!! Form::text('vcode', old('vcode'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('vcode'))
                        <p class="help-block">
                            {{ $errors->first('vcode') }}
                        </p>
                    @endif
                </div> 
           
                <div class="col-xs-3 form-group">
                    {!! Form::label('name', 'Company Name', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div> 
           
                <div class="col-xs-3 form-group">
                    {!! Form::label('category', 'Category', ['class' => 'control-label']) !!}
					{!! Form::select('category', $category, old('category'), ['class' => 'form-control', 'id' => 'select_id11']) !!}	
                    <p class="help-block"></p>
                    @if($errors->has('category'))
                        <p class="help-block">
                            {{ $errors->first('category') }}
                        </p>
                    @endif
                </div> 
                <div class="col-xs-3 form-group">
                    {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
                    {!! Form::text('description', old('description'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>
            </div>
          
            
			
            <div class="row vendors-background contact-address">
                <div class="col-xs-3 form-group">
                    {!! Form::label('address', 'Address', ['class' => 'control-label']) !!}
                    {!! Form::text('address', old('address'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('address'))
                        <p class="help-block">
                            {{ $errors->first('address') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-3 form-group">
                    {!! Form::label('phone', 'Contact Number', ['class' => 'control-label']) !!}
                    {!! Form::text('phone', old('phone'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('phone'))
                        <p class="help-block">
                            {{ $errors->first('phone') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-3 form-group">
                    <label class="col-sm-12 emptyu">&nbsp;</label>
                    <select class="form-control" name="wartype" onchange="getwartypetxt(this.value)">
						<option value="Warranty" <?php if($vendors['wartype'] == 'Warranty') echo "selected='Selected'"; ?>>Warranty</option>
						<option value="AMC" <?php if($vendors['wartype'] == 'AMC') echo "selected='Selected'"; ?>>AMC</option>
						<option value="Other" <?php if($vendors['wartype'] == 'Other') echo "selected='Selected'"; ?>>Other</option>
					</select>
                    <p class="help-block"></p>
                    @if($errors->has('wartype'))
                        <p class="help-block">
                            {{ $errors->first('wartype') }}
                        </p>
                    @endif
                </div>
				 <?php $st = 'none'; if($vendors['wartype'] == 'Other') {if($vendors['warothertxt']) $st = 'block';} ?>
                  <div class="col-xs-3 form-group" id="varotherblk" style="display:<?php echo $st; ?>;">
                    <label class="col-sm-12 emptyu">&nbsp;</label>
                    {!! Form::text('warothertxt', old('warothertxt'), ['class' => 'form-control', 'placeholder' => '']) !!}
                </div>
            </div>
           
            
			
            <div class="row vendors-background1 startend-dates">
                <div class="col-xs-2 form-group">
                    {!! Form::label('startdate', 'Start Date', ['class' => 'control-label']) !!}
                    {!! Form::text('startdate', old('startdate'), ['class' => 'form-control', 'id'=>'startdate', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('location'))
                        <p class="help-block">
                            {{ $errors->first('location') }}
                        </p>
                    @endif
                </div>
          
                <div class="col-xs-2 form-group">
                    {!! Form::label('enddate', 'End Date', ['class' => 'control-label']) !!}
                    {!! Form::text('enddate', old('enddate'), ['class' => 'form-control', 'id'=>'enddate', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('location'))
                        <p class="help-block">
                            {{ $errors->first('location') }}
                        </p>
                    @endif
                </div>
            
                <div class="col-xs-2 form-group">
                     <label>Order</label>
                     <select class="form-control" name="potype">
						<option value="PO"  <?php if($vendors['potype'] == 'PO') echo "selected='Selected'"; ?>>PO</option>
						<option value="WO"  <?php if($vendors['potype'] == 'WO') echo "selected='Selected'"; ?>>WO</option>
					</select>
                </div>
				<div class="col-xs-3 form-group" id="potherblk" >
                     <label>Number</label>
                    {!! Form::text('pothetext', old('pothetext'), ['class' => 'form-control', 'placeholder' => '']) !!}
                </div>
				<div class="col-xs-3 form-group">
                     <label>Scan Copy</label>
					 <input type="file" class="form-control" name="poimage"  /><?php if(isset($vendors['poimage'])) echo  $vendors['poimage'];?>
                </div>
            </div>
			
         
		   <?php  $hydroc=0; ?>
    <div class="row vendors-background">
        <div class="contactperson-plus">
        <div class="contactperson-innerdiv">
		 <h4 class="contact-person-heading"> Contact Person</h4>
			 <div class="col-sm-12 col-xs-12">
			    <div class="row">
			    <div class="col-sm-2 col-xs-2">
                    {!! Form::label('conname', 'Name', ['class' => 'control-label']) !!}
                  
                </div>
					<div class="col-sm-2 col-xs-2">
                    {!! Form::label('condesignation', 'Designation', ['class' => 'control-label']) !!}
                </div>
				<div class="col-sm-2 col-xs-2">
                    {!! Form::label('contactnumber', 'Contact Number', ['class' => 'control-label']) !!}
                </div>
				<div class="col-sm-3 col-xs-3">
                    {!! Form::label('mail', 'Mail', ['class' => 'control-label']) !!}
                </div>
					<div class="col-sm-3 col-xs-3">
                    {!! Form::label('location', 'Location', ['class' => 'control-label']) !!}
                </div>
		</div>
        
        <div class="row contact-person-details1">
				
				 <?php $mt = 0; if(count($contactdata) > 0) {
				 $mt = 0;
			foreach($contactdata as $dgcon) { //echo "<pre>"; print_r($dgcon); echo "</pre>";?>
           
            <div class="col-sm-2 col-xs-2 form-group"> 
                      <input type="text" class="form-control" name="conname[]" value="<?php echo  $dgcon['conname']; ?>"/>
                </div>
				    <div class="col-sm-2 col-xs-2 form-group"> 
                      <input type="text" class="form-control" name="condesignation[]" value="<?php echo  $dgcon['condesignation']; ?>"/>
                </div>
				    <div class="col-sm-2 col-xs-2 form-group"> 
                      <input type="text" class="form-control" name="contactnumber[]" value="<?php echo  $dgcon['contactnumber']; ?>"/>
                </div>
				    <div class="col-sm-3 col-xs-3 form-group"> 
                      <input type="text" class="form-control" name="mail[]" value="<?php echo  $dgcon['mail']; ?>"/>
                </div>
				    <div class="col-sm-3 col-xs-3 form-group"> 
                      <input type="text" class="form-control" name="location[]" value="<?php echo  $dgcon['location']; ?>"/>
                </div>
             
                <?php } } else { ?>
             
                <div class="col-sm-2 col-xs-2 form-group"> 
                     <input type="text" class="form-control" name="conname[]"  />
                </div>
				   <div class="col-sm-2 col-xs-2 form-group"> 
                     <input type="text" class="form-control" name="condesignation[]"  />
                </div>
				   <div class="col-sm-2 col-xs-2 form-group"> 
                     <input type="text" class="form-control" name="contactnumber[]"  />
                </div>
				   <div class="col-sm-3 col-xs-3 form-group"> 
                     <input type="text" class="form-control" name="mail[]"  />
                </div>
				   <div class="col-sm-3 col-xs-3 form-group"> 
                     <input type="text" class="form-control" name="location[]"  />
                </div>
                
                
                <?php } ?> 
				  <?php if($mt > 0){  $hydroc=$mt - 1; } else {$hydroc = 0;} ?>
    
  
	<input type="hidden" id="hydroc" value="<?php echo ++$hydroc; ?>">
				
				
				 <a href="#" onclick="addhydrpFormField(); return false;" class="adding-more" style="font-weight:bold; font-size:21px; color:#0b1cff; text-decoration:none; text-align:center;display:inline-block;width:auto;">+</a>
				 </div>
				 
				  <div id="divTxthydro"> 

                       	</div> 
						
						   
			 <div> 
				</div>   
			
             
        </div>
    </div>
    </div> 
 </div>
 
 
    {!! Form::submit('Update', ['class' => 'btn btn-danger btn-save vendor-submit']) !!}
    {!! Form::close() !!}
    </div>
    </div>
    @include('partials.footer')
@stop


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



$('#startdate').datepicker({ dateFormat: "dd-mm-yy" });
$('#enddate').datepicker({ dateFormat: "dd-mm-yy" });
	
	
});

function getwartypetxt(val){
  if(val == 'Other'){
    $("#varotherblk").show();
  }
  else{
   $("#varotherblk").hide();
  }
}

function getpotypetxt(val){
  if(val == 'Other'){
    $("#potherblk").show();
  }
  else{
   $("#potherblk").hide();
  }
}


 function addhydrpFormField() {
		var id = document.getElementById("hydroc").value;

		var feet = "";
             var vid = parseInt(id) + 1;
		if($("#feet").val()!=null) feet=$("#feet").val();  
		
		$("#divTxthydro").append("<div class='row pumnphysro vendors-person-adding' id='row" + id + "'><div class='col-xs-2 form-group'><input type='text' name='conname[]'  class='form-control  liftscnval' /></div><div class='col-xs-2 form-group'><input type='text' name='condesignation[]'  class='form-control  liftscnval'  /></div><div class='col-xs-2 form-group'><input type='text' name='contactnumber[]' class='form-control  liftscnval'  /></div><div class='col-xs-3 form-group'><input type='text'  class='form-control liftscnval' name='mail[]'  /></div><div class='col-xs-3 form-group'><input type='text' name='location[]'  class='form-control  liftscnval'  /></div><a href='#' onClick='removeliftsFormField(\"#row" + id + "\"); return false;' class='remove removerla'>X</a></div>" );
	
		  
		$(".datetpickpop").datepicker({

        dateFormat: "dd-mm-yy",
  });
		
		id = parseInt(id) + 1;

		console.log('id: ', id);

		document.getElementById("hydroc").value = id;	

	}
	
	
	function removeliftsFormField(id) {

		$(id).remove(); 

		var id = document.getElementById("hydroc").value;

		id = (id - 1);

		document.getElementById("hydroc").value = id;

	}
</script>


