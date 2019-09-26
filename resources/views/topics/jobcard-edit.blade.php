@extends('layouts.app')

@section('content')
<style type="text/css">
    .empids .commoncom{clear: both;padding: 4px 0px;margin: 4px 0px;}
    .empids .empbox{float: left;padding: 4px 0px;border: 1px solid #cccccc;margin: 4px 0px;}
    .empids .empbox i{color:red; font-size:20px;}
</style>
    <!--<h3 class="page-title">Community Assets</h3>-->
     <div class="panel panel-default smoonity-asstess">
    {!! Form::open(['method' => 'POST', 'files' => 'true', 'route' => ['jobcard.save'],'id'=>'frmJobcard','onsubmit'=>'return saveJobcard()']) !!}
    {!! Form::hidden('taction', 'save') !!}
    {!! Form::hidden('id', isset($jobcard)?$jobcard->id:'') !!}
   
        <p class="help-block" id="frmerror"></p>
        <div class="panel-heading">
            Job Card {{ (isset($jobcard)?'Edit':'New') }}
            <p class="ptag">
              <a href="/topics/jobcard" class="btn green-back">Back</a>
            </p>
        </div>
        
        <div class="panel-body jobacard nobcardds">
    <div class="row jobcard-editbackground">
        @if($userid==1)
        <div class="col-sm-2 form-group joncard-community">
            {!! Form::label('site_id', 'Community', ['class' => 'control-label']) !!}
            {!! Form::select('site_id', $communities, old('site_id')?old('site_id'):(isset($jobcard)?$jobcard->site_id:''), ['class' => 'form-control select2mes erequired','onchange'=>'setJcSite_changed();']) !!}
            <p class="help-block"></p>
            @if($errors->has('site_id'))
                <p class="help-block">
                    {{ $errors->first('site_id') }}
                </p>
            @endif
        </div>
        
        @else 
        {!! Form::hidden('site_id',$site_id,['id'=>'site_id']) !!}
        @endif
        <div class="col-sm-2 form-group inreponsibleee">
            {!! Form::label('jctype', 'Job card type', ['class' => 'control-label']) !!}
            {!! Form::select('jctype', $jbtypes, old('jctype')?old('jctype'):(isset($jobcard)?$jobcard->jctype:''), ['class' => 'form-control select2mes erequired','onchange'=>'setJobtype(this)']) !!}
            <p class="help-block"></p>
            @if($errors->has('jctype'))
                <p class="help-block">
                    {{ $errors->first('jctype') }}
                </p>
            @endif
            <?php   
                $jctype = old('jctype')?old('jctype'):(isset($jobcard)?$jobcard->jctype:'');
                $jctype12='';
                if($jctype=='3' || $jctype=='4')
                    $jctype12 = old('asset_id')?old('asset_id'):(isset($jobcard)?$jobcard->jcref:'');
                else if($jctype=='1' || $jctype=='2')
                    $jctype12 = old('jctype12')?old('jctype12'):(isset($jobcard)?$jobcard->jcref:'');
				
				$cid = isset($jobcard)?$jobcard->category_id:'';
				$other_text = isset($jobcard)?$jobcard->other_text:'';
            ?>
        </div>
		<?php //echo $jctype12;  ?>
        <div class="col-sm-3 form-group sparess jctypeoptions1 breadksoen1" <?php if($jctype<>'1' && $jctype<>'2') echo ' style="display: none;"';?>>
            @if(isset($jobcard) && $jobcard && ($jctype=='1' || $jctype=='2'))
            {!! Form::label('jctype12', $jctype=='1'?'Breakdown ID':'Incident ID', ['class' => 'control-label']) !!}
            {!! Form::select('jctype12', $jcoptions, $jctype12, ['class' => 'form-control select2mes','onchange'=>'getJobCardEmployeesnew(this);']) !!}
            @endif
        </div>

        <div class="col-sm-2 form-group jctypeoptions2 job-card-catergoru" <?php if($jctype<>'3' && $jctype<>'4') echo ' style="display: none;"';?>>
            {!! Form::label('category_id', 'Category', ['class' => 'control-label']) !!}<br>
            {!! Form::select('category_id', $categories, $cid, ['class' => 'form-control select2mes'.(($jctype=='3' || $jctype=='4')?' erequired':''),'onchange'=>'getTopicsCommunityAssets()']) !!}
            <p class="help-block"></p>
            @if($errors->has('category_id'))
                <p class="help-block">
                    {{ $errors->first('category_id') }}
                </p>
            @endif
        </div>

        <div  class="col-sm-2 form-group" style="width:auto;">
        	<?php //echo $jctype; ?>
        	<div id="topics_assets" class="jctypeoptions2 jon-care-saasets" <?php if($jctype=='1' || $jctype=='2') echo 'style="display: none;"';?>>
            {!! Form::label('asset_id', 'Asset', ['class' => 'control-label']) !!}<br>
            <select name="asset_id" id="asset_id" class="form-control select2mes<?php echo (($jctype=='3' || $jctype=='4')?' erequired':'')?>" onchange="getAssetEmployees(this)">
               <option>Please select asset</option>
               <option value="1000000000" <?php if($jctype12==1000000000) echo "selected='selected'"; ?>>Other</option>
               @if($comm_assets)   
               @foreach($comm_assets as $casset)  
               <option value="{{ $casset->id }}" @if(($jctype=='3' || $jctype=='4') && $jctype12==$casset->id) selected="selected" @endif >{{ $casset->sitename }} : {{ $casset->code }}-{{ $casset->name }}</option>
               @endforeach  
               @endif  
            </select>
           <?php if($other_text) { ?>
            <input type="text" id="other_text" class="form-control" name="other_text" value="<?php echo $other_text; ?>"  
            style="display:block;margin-top:10px;"/>
            <?php } else { ?>
            <input type="text" id="other_text" class="form-control" name="other_text" value="" style="display:none;margin-top:10px;"/>
            <?php } ?> 
            </div>
            
            <p class="help-block"></p>
            @if($errors->has('asset_id'))
                <p class="help-block">
                    {{ $errors->first('asset_id') }}
                </p>
            @endif
        </div>
        
        
          <div class="col-sm-2 form-group">
            <label>Spares required</label>
            <select name="sparesreq" onchange="sparesblockreq(this.value);" class="form-control">
              <option value="">Please Select</option>
              <option value="yes" <?php if(isset($jobcard) && $jobcard->spares=="yes") echo "selected='selected'"; ?>>Yes</option>
               <option value="no" <?php if(isset($jobcard) &&  $jobcard->spares=="no") echo "selected='selected'"; ?>>No</option>
            </select>
          </div>
       <div  id="sparesmedia" class="col-sm-12 three-ross" style="display:<?php  if(count($jobcard_spares) > 0) echo 'block;'; else echo 'none;';?>">
      
            <!--{!! Form::select('spares', $spares_list, old('spares')?old('spares'):(isset($jobcard)?$jobcard->spares:''), ['multiple','class' => 'form-control select2mes erequired','id'=>'spare_id']) !!}-->
            <div class="row first-addingpopup">
            	<div class="col-sm-8 col-xs-8">
                	<label>Spares</label>
                </div>
                <div class="col-sm-4 col-xs-4">
                	<label>Qnty</label>
                </div>
            </div>
         <?php $m = 0; if(count($jobcard_spares) > 0) {
         $m = 0;
         
    foreach($jobcard_spares as $dgcon) {
    ?> 
    <div class="row first-addingpopup">
      <div class="col-sm-8 col-xs-8 form-group"> 
         
           <select name="spares[]" class="form-control">
           <option value="">Please Select</option>
            <?php
            $options = "";
            foreach($spares_list as $key => $spare){
            $spare = str_replace('"',"",$spare);
             ?>
              <option value="<?php echo $key; ?>" <?php if($key == $dgcon['item_id']) echo "selected='selected'"; ?>><?php echo $spare; ?></option> 
        <?php	}
            ?>
           </select>
    </div>
       
        <div class="col-sm-4 col-xs-4 form-group"> 
        <input type="text" class="form-control" name="quantity[]" value="<?php if(isset($dgcon['quantity'])) echo  $dgcon['quantity']; ?>"  />
        </div>   
        </div>
        <?php } } else { ?>
        <div class="row">
        <div class="col-sm-8 col-xs-8 form-group"> 
            {!! Form::select('spares[]', $spares_list, old('spares')?old('spares'):(isset($jobcard)?$selected_spares:''), ['class' => 'form-control select2mes','id'=>'spare_id']) !!}
        </div>
        <div class="col-sm-4 col-xs-4 form-group">
         <input type="text" class="form-control" name="quantity[]"  />
        </div>   
        </div>
        <?php } ?>  
          <?php if($m > 0){  $n=$m - 1; } else {$n = 0;} ?>
<input type="hidden" id="id" value="<?php echo ++$n; ?>">
        <a href="#" onclick="addFormField(); return false;" class="adding-more" style="font-weight:bold; font-size:21px; color:#0b1cff; text-decoration:none; float: right;display:inline-block;width:auto;position:absolute;">+</a>
        
      
            <div id="divTxt" class="row">  

            </div>  
        
        </div> 
     </div>
             
              
    <div class="row jobcard-editwhite">
       
        <div class="col-sm-2 form-group" <?php // if($jctype<>'4') echo ' style="display: none;"';?>>
            {!! Form::label('jdate', 'Date', ['class' => 'control-label']) !!}
            {!! Form::text('jdate', old('jdate')?old('jdate'):(isset($jobcard)?date("d-m-Y",strtotime($jobcard->jdate)):''), ['class' => 'form-control datepick'.($jctype=='4'?' erequired':''), 'placeholder' => '']) !!}
            <p class="help-block"></p>
        </div>
		<div class="col-sm-2 form-group" <?php // if($jctype<>'4') echo ' style="display: none;"';?>>
            {!! Form::label('jenddate', 'End Date', ['class' => 'control-label']) !!}
            {!! Form::text('jenddate', old('jenddate')?old('jenddate'):(isset($jobcard)?date("d-m-Y",strtotime($jobcard->jenddate)):''), ['class' => 'form-control datepick'.($jctype=='4'?' erequired':''), 'placeholder' => '']) !!}
            <p class="help-block"></p>
        </div>
        <div class="col-sm-2 form-group" <?php //if($jctype<>'4') echo ' style="display: none;"';?>>
            {!! Form::label('bdtime', 'Time', ['class' => 'control-label']) !!}
            {!! Form::text('bdtime', old('bdtime')?old('bdtime'):(isset($jobcard)?date("H:i",strtotime($jobcard->jdate)):''), ['class' => 'form-control timepick'.($jctype=='4'?' erequired':''), 'placeholder' => '']) !!}
            <p class="help-block"></p>
        </div>
        <div class="col-sm-2 form-group">
            {!! Form::label('status', 'Status', ['class' => 'control-label']) !!}
            {!! Form::select('status', $statuses, old('status')?old('status'):(isset($jobcard)?$jobcard->status:''), ['class' => 'form-control']) !!}
            <p class="help-block"></p>
            @if($errors->has('status'))
                <p class="help-block">
                    {{ $errors->first('status') }}
                </p>
            @endif
        </div>  
        <div class="col-sm-2 form-group apmspl-venfor" style="display:none<?php if(isset($jobcard['emp_type'])){ echo 'block;'; } else { echo 'none;'; }?>">
          <label>Serviced By</label>
          <select name="emp_type" onchange="employeeetypeget(this.value);" class="form-control">
          <option value="">Please Select</option>
            <option value="1"  <?php if(isset($jobcard['emp_type'])){ if($jobcard['emp_type'] == '1') echo 'Selected="Selected"'; }?>>APMSPL</option>
            <option value="2"  <?php if(isset($jobcard['emp_type'])){ if($jobcard['emp_type'] == '2') echo 'Selected="Selected"'; }?>>VENDOR</option>
          </select>  
        </div>
        
         <div class="col-sm-2 form-group vendor-selection" id="vendorblock" style="display:<?php if(isset($jobcard['emp_type'])){ if($jobcard['emp_type'] == 2) {echo 'block;'; } else { echo 'none;'; } } else {echo 'none';}?>">
            {!! Form::label('vendor', 'Vendor', ['class' => 'control-label']) !!}
            {!! Form::select('vendor', $vendors, old('vendor')?old('vendor'):(isset($jobcard)?$jobcard->vendor:''), ['class' => 'form-control select2mes']) !!}
            <p class="help-block"></p>
            @if($errors->has('vendor'))
                <p class="help-block">
                    {{ $errors->first('vendor') }}
                </p>
            @endif
        </div>
        
           <div class="col-sm-2 form-group vendor-name" id="vendortextblock" style="display:<?php if(isset($jobcard['emp_type'])){ if($jobcard['emp_type'] == 2) {echo 'block;'; } else { echo 'none;'; } } else {echo 'none';}?>">
            {!! Form::label('vendor', 'Vendor Name', ['class' => 'control-label']) !!}
           {!! Form::text('vendor_name', old('vendor_name')?old('vendor_name'):(isset($jobcard)?$jobcard->vendor_name:''), ['class' => 'form-control'.($jctype=='4'?' erequired':''), 'placeholder' => '']) !!}
            <p class="help-block"></p>
            @if($errors->has('vendor'))
                <p class="help-block">
                    {{ $errors->first('vendor') }}
                </p>
            @endif
        </div>
        <div class="col-sm-2 form-group employeee">
            
        </div>
        <div class="col-sm-8 form-group empids employee-recuritment1">
        <?php if(isset($jobcard['emp_type'])){
           if($jobcard['emp_type'] == 1) { ?>
            @if (old('empid'))
                <?php $site_id = 0; ?> 
                @foreach(old('empid') as $ui=>$tuval)
                 <?php if($site_id != old('siteidval')[$ui]) {  ?> <div  class="site_{{ old('siteidval')[$ui] }} commoncom"><div><b>{{ old('sitenameval')[$ui] }}:</b></div> <?php } ?>
                <div class="empbox empid{{ $tuval }}">
                    <a onclick="task_emp_delete(this)"><i class="fa fa-close"></i></a> {{ old('empname')[$ui] }}
                    {!! Form::hidden('empid[]',$tuval) !!}
                    {!! Form::hidden('siteidval[]',old('siteidval')[$ui]) !!}   
                     {!! Form::hidden('sitenameval[]',old('sitenameval')[$ui]) !!}  
                    {!! Form::hidden('empname[]',old('empname')[$ui]) !!}
                </div> 
                <?php if($site_id != old('siteidval')[$ui]) {  ?></div> <?php $site_id = old('siteidval')[$ui]; } ?>
                @endforeach
            @else 
                @if ($jobcardusers) 
                <?php $sitet_id = 0; ?> 
                    @foreach($jobcardusers as $tuval)
                     <?php if($sitet_id != $tuval->siteid) {  ?> <div  class="site_<?php echo $tuval->siteid; ?> commoncom"><div><b><?php echo $tuval->sitename; ?>:</b></div> <?php } ?>
                    <div class="empbox empid{{ $tuval->user_id }}">
                        <a onclick="task_emp_delete(this)"><i class="fa fa-close"></i></a> {{ $tuval->username }}
                        {!! Form::hidden('empid[]',$tuval->user_id) !!}     
                        {!! Form::hidden('siteidval[]',$tuval->siteid) !!}   
                        {!! Form::hidden('sitenameval[]',$tuval->sitename) !!}                        
                        {!! Form::hidden('empname[]',$tuval->sitename.':'.$tuval->username) !!}
                    </div> 
                      <?php if($sitet_id != $tuval->siteid) {  ?></div> <?php $sitet_id = $tuval->siteid; } ?>
                    @endforeach
                @endif
            @endif
          <?php } }?>
        </div>

     </div> 
             
             
              <div class="row jobcard-editbackground">
                <div class="col-sm-12">
                    {!! Form::label('title', 'Image', ['class' => 'control-label']) !!}
                    <input type="file" class="form-control" name="image">  <?php if(isset($jobcard->image)) { ?> <img src="/<?php echo  $jobcard->image;?>"> <?php } ?>
                </div>
            </div> 
               
                
            <div class="row form-group jobcard-editwhite">
               <div class="col-sm-12">
                    {!! Form::label('work_activity', 'Work Activity', ['class' => 'control-label']) !!}
                    {!! Form::textarea('work_activity', old('work_activity')?old('work_activity'):(isset($jobcard)?$jobcard->work_activity:''), ['class' => 'form-control summernote', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
               </div>
            </div> 
            
    </div>
    
    
    <span class="loader"></span>
    <div class="btn-save btn-jobcard"> {!! Form::submit('Submit', ['class' => 'btn btn-danger btn-submitt']) !!}
    
    {!! Form::close() !!}
    </div>
    
    </div>
    
    
    
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
<?php
 $options = "";
  $options .="<option value=''>Please Select</option>"; 
  foreach($spares_list as $key => $spare){
    $spare = str_replace('"',"",$spare);
	
   $options .="<option value=".$key.">".$spare."</option>"; 
  }
 
 ?>
function addFormField() {
		var id = document.getElementById("id").value;

		var feet = "";
		var cn = parseInt(id) + 1;

		if($("#feet").val()!=null) feet=$("#feet").val();  
		
		$("#divTxt").append("<div class='wonderlaaa jobcard' id='row" + id + "' ><div class='col-sm-8 col-xs-8 form-group'><select name='spares[]' class='form-control select2mes'><?php echo $options; ?></select></div><div class='col-sm-4 col-xs-4 form-group'><input type='text' name='quantity[]' class='form-control getblocknum'></div><a href='#' onClick='removeFormField(\"#row" + id + "\"); return false;' class='remove removerla jobcard-close'>X</a></div></div>");
		id = parseInt(id) + 1;

		console.log('id: ', id);     

		document.getElementById("id").value = id;	

	}
	
	
	function removeFormField(id) {

		$(id).remove(); 

		var id = document.getElementById("id").value;

		id = (id - 1);

		document.getElementById("id").value = id;

	}
	
	function  sparesblockreq(dis){
	
	  if(dis == 'yes'){
	   $("#sparesmedia").show();
	  }else{
	    $("#sparesmedia").hide();
	  }
	}
</script>

@include('partials.footer')

@stop

