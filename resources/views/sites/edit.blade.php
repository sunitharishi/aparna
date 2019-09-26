@extends('layouts.app')

@section('content')
<style>
.erroremp{
 border: 2px solid red;
}

</style>

  <!--  <h3 class="page-title">Sites</h3>-->
  <div class="panel panel-default panelmar tsas-crseations communities-sited">
   {!! Form::model($sites, ['files' => 'true','method' => 'PUT', 'route' => ['sites.update', $sites->id]]) !!}


    <div class="panel-heading">
        Communities
        <a href="{{ route('sites.index') }}" class="btn green-back" style="float:right;">Back</a>
    </div> 
        
    <div class="panel-body site-seeing">
<!----------------project------------------->           
<div class="row communitybackground project">
    <div class="col-xs-3 form-group">
        {!! Form::label('scode', 'Project Code', ['class' => 'control-label']) !!}
        {!! Form::text('scode', old('scode'), ['class' => 'form-control', 'placeholder' => '']) !!}
        <p class="help-block"></p>
        @if($errors->has('scode'))
            <p class="help-block">
                {{ $errors->first('scode') }}
            </p>
        @endif 
    </div> 

    <div class="col-xs-6 form-group">
        {!! Form::label('name', 'Project Name', ['class' => 'control-label']) !!}
        {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '']) !!}
        <p class="help-block"></p>
        @if($errors->has('name'))
            <p class="help-block">
                {{ $errors->first('name') }}
            </p>
        @endif
    </div> 
    <div class="col-xs-3 form-group">
       <label class="control-label">Logo</label>
     <input type="file" class="form-control" name="logoimage"  /> <?php if(isset($sites['logoimage'])) echo $sites['logoimage']; ?>
    </div>
</div>
<!----------------project------------------->               
<!----------------address------------------->               
            
    <div class="row communitybackground1 address-locations">
       <label class="col-sm-12  col-xs-12 address">Address</label>
        <div class="col-sm-2 form-group plot-nos">
            {!! Form::label('plot_num', 'Plot No', ['class' => 'control-label']) !!}
            {!! Form::text('plot_num', old('plot_num'), ['class' => 'form-control', 'placeholder' => '']) !!}
            <p class="help-block"></p>
            @if($errors->has('plot_num'))
                <p class="help-block">
                    {{ $errors->first('plot_num') }}
                </p>
            @endif
        </div>
          <div class="col-sm-2 form-group">
            <label>H.NO</label>
             {!! Form::text('hnum', old('hnum'), ['class' => 'form-control', 'placeholder' => '']) !!}
        </div>
         <div class="col-sm-2 form-group">
            <label>Near By Place</label>
             {!! Form::text('near_place', old('near_place'), ['class' => 'form-control', 'placeholder' => '']) !!}
        </div>
         <div class="col-sm-2 form-group">
            <label>Village / Town</label>
            {!! Form::text('village', old('village'), ['class' => 'form-control', 'placeholder' => '']) !!}
        </div>
    
         <div class="col-sm-2 form-group">
            <label>Mandal</label>
             {!! Form::text('mandal', old('mandal'), ['class' => 'form-control', 'placeholder' => '']) !!}
        </div>
         <div class="col-sm-2 form-group">
            <label>District</label>
             {!! Form::text('district', old('district'), ['class' => 'form-control', 'placeholder' => '']) !!}
        </div>
         <div class="col-sm-2 form-group">
            <label class="col-sm-12 col-xs-12  emptyu">&nbsp;</label>
            <label>State</label>
             {!! Form::text('state', old('state'), ['class' => 'form-control', 'placeholder' => '']) !!}
        </div>
         <div class="col-sm-2 form-group">
         <label class="col-sm-12 col-xs-12 emptyu">&nbsp;</label>
            <label>Pin Code</label>
             {!! Form::text('pincode', old('pincode'), ['class' => 'form-control', 'placeholder' => '']) !!}
        </div>
        <div class="col-sm-4 geo">
              <label class="col-sm-12 col-xs-12 geographical-area">Geographical Location</label>
             <div class="col-sm-6 latitude">
                <label>Latitude</label>
                {!! Form::text('geo_latitude', old('geo_latitude'), ['class' => 'form-control', 'placeholder' => '']) !!}
             </div>
              <div class="col-sm-6 longitude">
                <label>Longitude</label>
                 {!! Form::text('geo_longitude', old('geo_longitude'), ['class' => 'form-control', 'placeholder' => '']) !!}
             </div>
        </div>
    </div>
<!----------------address------------------->    
<!----------------project-renewal------------------->                   
<div class="row latiti-longitude communitybackground">
   <label class="col-sm-12 col-xs-12 control-label project-renewal">Project Maintenance Renewal </label>
   <div class="col-sm-2 form-group"> 
       <label class="control-label">Prepaid</label>
       {!! Form::text('prepaid_start_date', old('prepaid_start_date'), ['class' => 'form-control datetpick', 'placeholder' => 'Start Date']) !!}
   </div>
    <div class="col-sm-2 form-group"> 
       <label class="control-label">&nbsp;</label>
       {!! Form::text('prepaid_end_date', old('prepaid_end_date'), ['class' => 'form-control datetpick', 'placeholder' => 'End Date']) !!}
   </div>
      <div class="col-sm-2 form-group floors">
    {!! Form::label('postpaid', 'Postpaid', ['class' => 'control-label']) !!}
      <select class="form-control" name="postpaid" onchange="postpaidtextnum(this.value);">
      <option value="">Please Select</option>
       <option value="Yes" <?php if($sites['postpaid'] == 'Yes') echo "selected='Selected'"; ?>>Yes</option>
       <option value="No" <?php if($sites['postpaid'] == 'No') echo "selected='Selected'"; ?>>No</option> 
    </select>
    <?php /*?>{!! Form::text('floors_num', old('floors_num'), ['class' => 'form-control', 'placeholder' => '']) !!}
    <p class="help-block"></p>
    @if($errors->has('floors_num'))
        <p class="help-block">
            {{ $errors->first('floors_num') }}
        </p>
    @endif<?php */?>
    </div>
     <div class="col-sm-1 form-group floors-text" id="numpostpaiddiv" style="display:<?php if($sites['postpaid'] == 'Yes') echo 'block;'; else echo 'none;';?>">
        <label>&nbsp;</label>
        {!! Form::text('postpaid', old('postpaid_numtext'), ['class' => 'form-control', 'id'=>'postpaidcval','placeholder' => '','onfocus' =>'getpostpaidmaint()']) !!}
    </div>
 </div>
<!----------------project-renewal------------------->                     
<!----------------overview------------------->   
                    
  <div class="row communitybackground1 cerificed-rating"> 
     <label class="col-sm-12 col-xs-12 overview">Over View</label>  
        <div class="col-sm-2 form-group">
           <label class="control-label">IGBC Certified</label>
           <select class="form-control" name="igbc_certified" onchange="changecertified(this.value);" >
            <option value="">Select</option>
               <option value="Yes"  <?php if($sites['igbc_certified'] == 'Yes') echo "selected='Selected'"; ?>>Yes</option>
               <option value="No"  <?php if($sites['igbc_certified'] == 'No') echo "selected='Selected'"; ?>>No</option>
           </select>
        </div>
        <div class="col-sm-2 form-group" id="rating_block" style="display:<?php if($sites['igbc_certified'] == 'Yes') echo 'block;'; else echo 'none;';?>">
           <label class="control-label">Rating</label>
           <select class="form-control" name="rating">
               <option value="Platinum" <?php if($sites['rating'] == 'Platinum') echo "selected='Selected'"; ?>>Platinum</option>
               <option value="Gold" <?php if($sites['rating'] == 'Gold') echo "selected='Selected'"; ?> >Gold</option>
               <option value="Silver" <?php if($sites['rating'] == 'Silver') echo "selected='Selected'"; ?> >Silver</option>
           </select>
        </div>
         
            
        <div class="col-sm-2 form-group rest-ger">
            {!! Form::label('tot_site_area', 'Total Site Area', ['class' => 'control-label']) !!}
            {!! Form::text('tot_site_area', old('tot_site_area'), ['class' => 'form-control', 'placeholder' => '']) !!}
            <p class="help-block"></p>
            @if($errors->has('tot_site_area'))
                <p class="help-block">
                    {{ $errors->first('tot_site_area') }}
                </p>
            @endif
        </div>
        <div class="col-sm-2 form-group">
            {!! Form::label('built_up_area', 'Built Up Area', ['class' => 'control-label']) !!}
            {!! Form::text('built_up_area', old('built_up_area'), ['class' => 'form-control', 'placeholder' => '']) !!}
            <p class="help-block"></p>
            @if($errors->has('built_up_area'))
                <p class="help-block">
                    {{ $errors->first('built_up_area') }}
                </p>
            @endif
        </div>
        
        <div class="col-sm-2 form-group saleable-area">
           <label>Saleable Area</label>
           {!! Form::text('scalablearea', old('scalablearea'), ['class' => 'form-control', 'placeholder' => '']) !!}
        </div>
        
         <div class=" col-sm-2 form-group opensource">
           <label class="control-label">Open Space</label>
           {!! Form::text('open_space', old('open_space'), ['class' => 'form-control', 'placeholder' => '']) !!}
         </div>
      </div>
<!----------------overview------------------->   			  
<!----------------flats-villas-------------------> 					        
                
<div class="row communitybackground blocks-floores">
    <div class="col-sm-2 form-group">
       <label class="control-label">Flats / Villas</label>
       <select class="form-control" name="flat_type" onchange="flattypefn(this.value)">
           <option  value="">Please Select</option>
           <option value="flats" <?php if($sites['flat_type'] == 'flats') echo "selected='Selected'"; ?>>Flats</option>
           <option value="villas <?php if($sites['flat_type'] == 'villas') echo "selected='Selected'"; ?>">Villas</option>
       </select>
    </div>
 
  <div class="col-sm-2 form-group flats-villas" id="villasblock" style="display:<?php if($sites['flat_type'] == 'villas') echo 'block;'; else echo 'none;';?>">
    {!! Form::label('num_of_vallas', 'No.of Villas', ['class' => 'control-label']) !!}
    {!! Form::text('num_of_vallas', old('num_of_vallas'), ['class' => 'form-control', 'placeholder' => '']) !!}
    <p class="help-block"></p>
    @if($errors->has('num_of_flats'))
        <p class="help-block">
            {{ $errors->first('num_of_flats') }}
        </p>
    @endif
</div>

<div class="col-sm-2 form-group flats-villas" id="flatsblock" style="display:<?php if($sites['flat_type'] == 'flats') echo 'block;'; else echo 'none;';?>">
    {!! Form::label('num_of_flats', 'No. of Flats', ['class' => 'control-label']) !!}
    {!! Form::text('num_of_flats', old('num_of_flats'), ['class' => 'form-control', 'id'=> 'num_of_flatsnum', 'placeholder' => '', 'onfocus' => 'getflatslist()']) !!}
    <p class="help-block"></p>
    @if($errors->has('num_of_flats'))
        <p class="help-block">
            {{ $errors->first('num_of_flats') }}
        </p>
    @endif
</div>
<div  id="flatgroupblock" style="display:<?php if($sites['flat_type'] == 'flats') echo 'block;'; else echo 'none;';?>">
   <div class="col-sm-2 form-group">
    {!! Form::label('blocks_num', 'No. of Blocks', ['class' => 'control-label']) !!}
     <select class="form-control" name="blocks_num" onchange="setblocknum(this.value);">
     <option value="">Please Select</option>
       <option value="Yes" <?php if($sites['blocks_num'] == "Yes") echo 'Selected="selected"'; ?>>Yes</option>
       <option value="No" <?php if($sites['blocks_num'] == "No") echo 'Selected="selected"'; ?>>No</option> 
    </select>
   <?php /*?> {!! Form::text('blocks_num', old('blocks_num'), ['class' => 'form-control', 'placeholder' => '', 'onchange' => 'getblockslist()']) !!}
    <p class="help-block"></p>
    @if($errors->has('blocks_num'))
        <p class="help-block">
            {{ $errors->first('blocks_num') }}
        </p> 
    @endif<?php */?>
    </div>
      <div class="col-sm-1 form-group" style="display:<?php if($sites['blocks_num'] == 'Yes') echo 'block;'; else echo 'none;';?>" id="numblocksdiv">
        <label>&nbsp;</label>
        {!! Form::text('num_of_blocks_text', old('num_of_blocks_text'), ['class' => 'form-control', 'id' => 'num_of_blocks_text', 'placeholder' => 'Blocks Num', 'onfocus' => 'getblockslist()']) !!}
    </div>


   <div class="col-sm-2 form-group floors">
    {!! Form::label('floors_num', 'No. of Floors', ['class' => 'control-label']) !!}
      <select class="form-control" name="num_of_floors" onchange="setfloornum(this.value);">
      <option value="">Please Select</option>
       <option value="Yes"  <?php if($sites['num_of_floors'] == "Yes") echo 'Selected="selected"'; ?>>Yes</option>
       <option value="No"  <?php if($sites['num_of_floors'] == "No") echo 'Selected="selected"'; ?>>No</option> 
    </select>
    <?php /*?>{!! Form::text('floors_num', old('floors_num'), ['class' => 'form-control', 'placeholder' => '']) !!}
    <p class="help-block"></p>
    @if($errors->has('floors_num'))
        <p class="help-block">
            {{ $errors->first('floors_num') }}
        </p>
    @endif<?php */?>
    </div>
     <div class="col-sm-1 form-group floors-text" id="numfloordiv" style="display:<?php if($sites['num_of_floors'] == 'Yes') echo 'block;'; else echo 'none;';?>">
        <label>&nbsp;</label>
        {!! Form::text('num_of_floors_text', old('num_of_floors_text'), ['class' => 'form-control', 'placeholder' => '']) !!}
    </div>
    </div>

    <div class="col-sm-2 form-group">
       <label>Basement</label> 
       <select class="form-control" name="basement_one" onchange="basementtext(this.value)">
        <option value="">Please select</option>
           <option value="Yes" <?php if($sites['basement_one'] == "Yes") echo 'Selected="selected"'; ?>>Yes</option>
           <option value="No" <?php if($sites['basement_one'] == "No") echo 'Selected="selected"'; ?>>No</option>
           <option value="NA" <?php if($sites['basement_one'] == "NA") echo 'Selected="selected"'; ?>>NA</option>
        </select>
    </div>
      <div class="col-sm-1 form-group floors-text" id="numofbasementdiv" style="display:<?php if($sites['basement_one'] == 'Yes') echo 'block;'; else echo 'none;';?>">
        <label>&nbsp;</label>
        {!! Form::text('basement_text', old('basement_text'), ['class' => 'form-control', 'placeholder' => '']) !!}
    </div>
</div>
<!----------------flats-villas-------------------> 	             
<!----------------landscape-------------------> 	
             
             
   <div class="row communitybackground1 helicopert">
     <div class="col-sm-2 form-group landscape-area">
       <label>Hardlandscape Area</label>
       {!! Form::text('hard_land_scpae_area', old('hard_land_scpae_area'), ['class' => 'form-control', 'placeholder' => '']) !!}
       
    </div>
    
     <div class="col-sm-2 form-group landscape-area">
       <label>Softlandscape Area</label>
      {!! Form::text('soft_land_scpae_area', old('soft_land_scpae_area'), ['class' => 'form-control', 'placeholder' => '']) !!}
       
    </div>
    <div class="col-sm-2 form-group helopasd">
        {!! Form::label('helipad_area', 'Helipad Area', ['class' => 'control-label']) !!}
         <select class="form-control" name="helipad" onchange="helipadchange(this.value);">
           <option  value="">Please Select</option>
           <option  value="Yes" <?php if($sites['helipad'] == "Yes") echo 'Selected="selected"'; ?>>Yes</option>
           <option  value="No" <?php if($sites['helipad'] == "No") echo 'Selected="selected"'; ?>>No</option>
        </select>
       <?php /*?> {!! Form::text('helipad_area', old('helipad_area'), ['class' => 'form-control', 'placeholder' => '']) !!}
        <p class="help-block"></p>
        @if($errors->has('helipad_area'))
            <p class="help-block">
                {{ $errors->first('helipad_area') }}
            </p>
        @endif<?php */?>
    </div>
    <div id="helipadblock"  id="helipadblock" style="display:<?php if($sites['helipad'] == 'Yes') echo 'block;'; else echo 'none;';?>;">
      <div class="col-sm-2 form-group heliareaa">
       <label class="col-sm-12">Radius</label>
        {!! Form::text('helipad_text', old('helipad_text'), ['class' => 'form-control', 'placeholder' => '']) !!}
      </div>
    
        <div class="col-sm-3 form-group">
            <label>&nbsp;</label>
            <input type="file" class="form-control" name="helippad_file"  /> <?php if(isset($sites['helippad_file'])) echo $sites['helippad_file']; ?>
        </div>
    </div>
</div>
<!----------------landscape------------------->             
<!----------------rainwater-harvesting------------------->               
 <div class="row communitybackground group-elevators">
       <div class="col-sm-3 form-group rainwater-harvesting">
           <label class="control-label">Rainwater Harvesting Pits</label>
           
           {!! Form::text('rainwater_harvest', old('rainwater_harvest'), ['class' => 'form-control', 'placeholder' => '']) !!}
       </div>
       
       <div class="col-sm-2 form-group rainwater-harvesting">
          <label>Borewells</label>
          {!! Form::text('borewells', old('borewells'), ['class' => 'form-control', 'placeholder' => '']) !!}
       </div>
       
       <div class="col-sm-2 form-group lisfts">
        {!! Form::label('lifts', 'Elevators/Lifts', ['class' => 'control-label']) !!}
        {!! Form::text('lifts', old('lifts'), ['class' => 'form-control', 'placeholder' => '', 'id' => 'lifts', 'onfocus' => 'getliftlist()']) !!}
        <p class="help-block"></p>
        @if($errors->has('lifts'))
            <p class="help-block">
                {{ $errors->first('lifts') }}
            </p>
        @endif
    </div>
     <div class="col-sm-2 form-group"> 
       <label class="control-label">Solar Water Heaters</label>
        <select class="form-control" name="solar_water_heater" onchange="solar_heattext(this.value)">
           <option value="Yes" <?php if($sites['solar_water_heater'] == "Yes") echo 'Selected="selected"'; ?>>Yes</option>
           <option value="No" <?php if($sites['solar_water_heater'] == "No") echo 'Selected="selected"'; ?>>No</option> 
        </select>
         </div>
     <div class="col-sm-2" id="solarblock" style="display:<?php if($sites['hydro_pneumatic_sys'] == 'Yes') echo 'block;'; else echo 'none;';?>;"> 
        <label class="control-label empty">&nbsp;</label>
        {!! Form::text('solar_water_heat_text', old('solar_water_heat_text'), ['class' => 'form-control', 'id'=>'solar_water_heat_text','placeholder' => '',  'onfocus' => 'getsolarblockList()']) !!}
    </div>
 </div>
 <!----------------rainwater-harvesting------------------->
<!----------------bms-------------------> 
             
  <div class="row communitybackground1 group-elevators1">  
    <div class="col-sm-3 form-group bms-group">
        <label class="control-label bms">BMS</label>
        <label class="col-sm-12 col-xs-12 prepaid-systeme">Prepaid  Systems</label>
        <ul>
        <?php $bpre = array(); $bpost = array(); if(isset($sites['bms_prepaid'])) { if($sites['bms_prepaid']) { $bpre = explode(",",$sites['bms_prepaid']);}}
               if(isset($sites['bms_postpaid'])) { if($sites['bms_postpaid']) { $bpost = explode(",",$sites['bms_postpaid']);}}
         ?>
           <li><input type="checkbox" name="bms_prepaid[]" value="Electricity" <?php if(in_array('Electricity', $bpre)) echo "checked='checked'"; ?>/> Electricity </li>
           <li><input type="checkbox" name="bms_prepaid[]" value="Recticulated Gas system" <?php if(in_array('Recticulated Gas system', $bpre)) echo "checked='checked'"; ?>/> Recticulated Gas system</li>
           <li><input type="checkbox" name="bms_prepaid[]"  value="Water" <?php if(in_array('Water', $bpre)) echo "checked='checked'"; ?> /> Water </li>
        </ul>
   </div>
  
    <div class="col-sm-3 form-group bms-group">
        <label class="col-sm-12 col-xs-12 emptyu">&nbsp;</label>
        <label class="col-sm-12 col-xs-12 postapsis-system"> PostPaid Systems</label>
        <ul>
           <li><input type="checkbox" name="bms_postpaid[]" value="Electricity"  <?php if(in_array('Electricity', $bpost)) echo "checked='checked'"; ?>/> Electricity </li>
           <li><input type="checkbox" name="bms_postpaid[]" value="Recticulated Gas system"  <?php if(in_array('Recticulated Gas system', $bpost)) echo "checked='checked'"; ?>/> Recticulated Gas system</li>
           <li><input type="checkbox" name="bms_postpaid[]"  value="Water"  <?php if(in_array('Water', $bpost)) echo "checked='checked'"; ?>/> Water </li>
        </ul>
   </div>
   <div class="col-sm-2 irrigation-system">
       <label class="col-sm-12 col-xs-12 emptyu">&nbsp;</label>
       <label class="control-label">Irrigation System </label>
       <select class="form-control" name="bms_irrigation_sys">
           <option value="Auto" <?php if($sites['bms_irrigation_sys'] == 'Auto') echo 'Selected="selected"'; ?>>Auto</option>
           <option value="Manual"  <?php if($sites['bms_irrigation_sys'] == 'Manual') echo 'Selected="selected"'; ?>>Manual</option>
       </select>
   </div>
 </div>
 <!----------------bms------------------->      
<!----------------electrical-distributionsystem-------------------> 
             
   <div class="row communitybackground electical-distribution-sustem">
       <label class="col-sm-12 col-xs-12 control-label sidtrinution">Electrical Distribution System</label>
       <div class="col-sm-2 form-group">
           <label class="control-label">Contracted MD (KVA/HP)</label>
           {!! Form::text('contracted_md', old('contracted_md'), ['class' => 'form-control', 'placeholder' => '']) !!}
       </div>
        <div class="col-sm-2 form-group">
           <label class="control-label">Specified Voltage(KV)</label>
             {!! Form::text('specified_voltage', old('specified_voltage'), ['class' => 'form-control', 'placeholder' => '']) !!}
       </div>
       <div class="col-sm-2 form-group">
           <label class="control-label">Actual Voltage(KV)</label>
             {!! Form::text('actuval_voltage', old('actuval_voltage'), ['class' => 'form-control', 'placeholder' => '']) !!}
       </div>
       <div class="col-sm-2 form-group">
           <label class="control-label">Feeder</label>
             {!! Form::text('feeder', old('feeder'), ['class' => 'form-control', 'placeholder' => '']) !!}
       </div>
       <div class="col-sm-2 form-group">
           <label class="control-label">Category</label>
             {!! Form::text('category', old('category'), ['class' => 'form-control', 'placeholder' => '']) !!}
       </div>
       
       <div class="col-sm-2 form-group transfomerss">
        {!! Form::label('transformers', 'Transformers', ['class' => 'control-label']) !!}
        {!! Form::text('transformers', old('transformers'), ['class' => 'form-control', 'id'=>'transformers', 'placeholder' => '', 'onfocus' => 'gettransformerslist()']) !!}
        <p class="help-block"></p>
        @if($errors->has('transformers'))
            <p class="help-block">
                {{ $errors->first('transformers') }}
            </p>
        @endif
    </div>
    <div class="col-sm-2 form-group setsdg">
        {!! Form::label('dgsets', 'DG Sets', ['class' => 'control-label']) !!}
        {!! Form::text('dgsets', old('dgsets'), ['class' => 'form-control', 'placeholder' => '','id'=>'dscetscnval', 'onfocus' => 'getdgsetslist()']) !!}
        <p class="help-block"></p>
        @if($errors->has('dgsets'))
            <p class="help-block">
                {{ $errors->first('dgsets') }}
            </p>
        @endif
    </div>
       <div class="col-sm-2 form-group power-bakcup">
        <label>Power Back-Up</label>
        {!! Form::text('power_backup', old('power_backup'), ['class' => 'form-control', 'placeholder' => '']) !!}
    </div>
    
   
 
      <div class="col-sm-2 form-group solar-power">
        {!! Form::label('solar_power', 'Solar Power', ['class' => 'control-label']) !!}
          <select class="form-control" name="solar_power" onchange="solarpwrtext(this.value)">
           <option value="Yes" <?php if($sites['solar_power'] == "Yes") echo 'Selected="selected"'; ?>>Yes</option>
           <option value="No" <?php if($sites['solar_power'] == "No") echo 'Selected="selected"'; ?>>No</option> 
        </select>
       <?php /*?> {!! Form::text('solar_power', old('solar_power'), ['class' => 'form-control', 'placeholder' => '']) !!}
        <p class="help-block"></p>
        @if($errors->has('solar_power'))
            <p class="help-block">
                {{ $errors->first('solar_power') }}
            </p>
        @endif<?php */?>
    </div>
     <div class="col-sm-2 form-group solar-powert-text" style="display:<?php if($sites['solar_power'] == 'Yes') echo 'block;'; else echo 'none;';?>;" id="solartextblock">
       <label>&nbsp;</label>
        {!! Form::text('solar_pwr_text', old('solar_pwr_text'), ['class' => 'form-control', 'id' => 'solar_pwr_text', 'placeholder' => '', 'onfocus' => 'getpwrbkplist()']) !!}
    </div>    
</div>
<!----------------electrical-distributionsystem------------------->  
<!----------------water-distributionsystem------------------->  
               
<div class="row communitybackground1 srp-wep">
    <label class="col-sm-12 col-xs-12 control-label municipal">Water Distribution System</label>
    <div class="col-sm-2 form-group water-muncicipat">
       <label class="control-label">Municipal Water</label>
        <select class="form-control" name="municipal_water" onchange="municipalwat(this.value)">
       <option value="Yes" <?php if($sites['municipal_water'] == "Yes") echo 'Selected="selected"'; ?>>Yes</option>
       <option value="No" <?php if($sites['municipal_water'] == "No") echo 'Selected="selected"'; ?>>No</option> 
    </select>
    </div>
    
    <div class="col-sm-2 form-group water-muncicipat" id="contractkldiv" style="display:<?php if($sites['municipal_water'] == 'Yes') echo 'block;'; else echo 'none;';?>;">
       <label class="control-label">Contracted (KL)</label>
         {!! Form::text('contracted_kl', old('contracted_kl'), ['class' => 'form-control', 'placeholder' => '']) !!}
    </div>
    
    
  <div class="col-xs-2 form-group wsp">
     
    {!! Form::label('wsp', 'WSP', ['class' => 'control-label']) !!}
    {!! Form::text('wsp', old('wsp'), ['class' => 'form-control', 'id'=> 'wsp', 'placeholder' => '','onfocus' => 'getwsplist()']) !!}
    <p class="help-block"></p>
    @if($errors->has('wsp'))
        <p class="help-block">
            {{ $errors->first('wsp') }}
        </p>
    @endif
</div> 
  
   <div class="col-xs-2 form-group stp">
   
    {!! Form::label('stp', 'STP', ['class' => 'control-label']) !!}
    {!! Form::text('stp', old('stp'), ['class' => 'form-control', 'id'=> 'stp', 'placeholder' => '', 'onfocus' => 'getstplist()']) !!}
    <p class="help-block"></p>
    @if($errors->has('stp'))
        <p class="help-block">
            {{ $errors->first('stp') }}
        </p>
    @endif
</div>



<div class="col-sm-12 col-xs-12 water-muncicipat1">
       <label class="col-sm-12 control-label hydropneumatic-system-section">Hydro Pneumatic System</label>
       
      <div class="col-sm-6 municipal-water-supply">
           <label class="col-sm-12 col-xs-12 control-label">Municipal Water Supply</label>
        
         <div class="col-sm-4 pump-number">
           <label>Pumps Number</label>
           {!! Form::text('mws_pums_num', old('mws_pums_num'), ['class' => 'form-control', 'id'=> 'mws_pums_num', 'placeholder' => '']) !!}
         </div>
           
           
       <div class="col-sm-4 make-section">  
          <label>Make</label> 
          {!! Form::text('mws_make', old('mws_make'), ['class' => 'form-control', 'id'=> 'mws_make', 'placeholder' => '']) !!}
      </div>
      
      <div class="col-sm-4 capacity-section">
           <label>Capacity</label>
           {!! Form::text('mws_capacity', old('mws_capacity'), ['class' => 'form-control', 'id'=> 'mws_capacity', 'placeholder' => '']) !!}
       </div>
   </div>    
       
       
    <div class="col-sm-6 domestic-water-supply">
         
          <label class="col-sm-12 col-xs-12 control-label">Domestic Water Supply</label>
        
         <div class="col-sm-4 pump-number">
           <label>Pumps Number</label>
           {!! Form::text('dws_pums_num', old('dws_pums_num'), ['class' => 'form-control', 'id'=> 'dws_pums_num', 'placeholder' => '']) !!}
       </div>
       
        <div class="col-sm-4 make-section">
           <label>Make</label>
           {!! Form::text('dws_make', old('dws_make'), ['class' => 'form-control', 'id'=> 'dws_make', 'placeholder' => '']) !!}
       </div>
       
        <div class="col-sm-4 capacity-section">
           <label>Capacity</label>
           {!! Form::text('dws_capacity', old('dws_capacity'), ['class' => 'form-control', 'id'=> 'dws_capacity', 'placeholder' => '']) !!}
        </div>
       </div>
       
       
         <div class="col-sm-6 flush-water-supply">
          <label class="col-sm-12 col-xs-12 control-label">Flush Water Supply</label>
          
        <div class="col-sm-4 pumps-number">
          <label>Pumps Number</label> 
          {!! Form::text('fws_pums_num', old('fws_pums_num'), ['class' => 'form-control', 'id'=> 'fws_pums_num', 'placeholder' => '']) !!}
       </div>
       
       <div class="col-sm-4 make-section">
          <label>Make</label> 
          {!! Form::text('fws_make', old('fws_make'), ['class' => 'form-control', 'id'=> 'fws_make', 'placeholder' => '']) !!}
       </div>
       
        <div class="col-sm-4 capacity-section">
          <label>Capacity</label> 
          {!! Form::text('fws_capacity', old('fws_capacity'), ['class' => 'form-control', 'id'=> 'fws_capacity', 'placeholder' => '']) !!}
        </div>
       </div>
    </div>
<?php /*?>	<div class="col-sm-2 water-muncicipat">
       <label class="control-label">Hydro Pneumatic System</label>
        <select class="form-control" name="hydro_pneumatic_sys" onchange="hydonumabl(this.value)">
       <option value="Yes" <?php if($sites['hydro_pneumatic_sys'] == "Yes") echo 'Selected="selected"'; ?>>Yes</option>
       <option value="No" <?php if($sites['hydro_pneumatic_sys'] == "No") echo 'Selected="selected"'; ?>>No</option> 
    </select>
    </div>
    
<div class="col-xs-2 form-group" id="hydronumablock" style="display:<?php if($sites['hydro_pneumatic_sys'] == 'Yes') echo 'block;'; else echo 'none;';?>;">
  <label class="control-label emptuy">&nbsp;</label>
  {!! Form::text('hydro_pneumatic_sys_text', old('hydro_pneumatic_sys_text'), ['class' => 'form-control', 'id'=>'hydro_pneumatic_sys_text', 'placeholder' => '', 'onfocus' => 'gethydropneumaticlist()']) !!}
</div>
<?php */?>
</div>
             
<div class="row communitybackground1 all-fiee-measure">
  <div class="col-sm-4 reticulated">
     <label class="col-sm-12 reticulatedpoped">Reticulated Piped Gas  </label>
     <div class="col-sm-6 gas-banks">
        {!! Form::label('gas_banks', 'Gas Banks', ['class' => 'control-label']) !!}
        {!! Form::text('gas_banks', old('gas_banks'), ['class' => 'form-control', 'id'=>'gas_banks', 'placeholder' => '', 'onfocus' => 'getgasbanklist()']) !!}
        <p class="help-block"></p>
        @if($errors->has('gas_banks'))
            <p class="help-block">
                {{ $errors->first('gas_banks') }}
            </p>
        @endif
    </div>
  </div>
</div>	
<!----------------water-distributionsystem------------------->   					
<!----------------fire-safety-------------------> 					
               
  <div class="row communitybackground all-fiee-measure">
    <label class="col-sm-12 col-xs-12 fire-safety">Fire & Safety</label>
        <div class="col-sm-2 form-group">
      <label class="control-label">Smoke</label>
       {!! Form::text('smoke', old('smoke'), ['class' => 'form-control', 'placeholder' => '']) !!}
  </div>
   <div class="col-sm-3 form-group no-file-chosen">
      <label class="control-label emptyu">&nbsp;</label>
      <input type="file" class="form-control"  name="smoke_image" /> <?php if(isset($sites['smoke_image'])) echo $sites['smoke_image']; ?>
  </div>
  <div class="col-sm-2 form-group">
      <label class="control-label">Heat</label>
        {!! Form::text('heat', old('heat'), ['class' => 'form-control', 'placeholder' => '']) !!}
  </div>
   <div class="col-sm-3 form-group no-file-chosen">
      <label class="control-label emptyu">&nbsp;</label>
      <input type="file" class="form-control"  name="heat_image" /><?php if(isset($sites['heat_image'])) echo $sites['heat_image']; ?>
  </div>
    <div class="col-sm-2 form-group fire-pump-hosese">
    {!! Form::label('fire_pump_rooms', 'Fire Pump Rooms', ['class' => 'control-label']) !!}
    {!! Form::text('fire_pump_rooms', old('fire_pump_rooms'), ['class' => 'form-control', 'placeholder' => '',  'onfocus' => 'getpumproomslistnew()']) !!}
    <p class="help-block"></p>
    @if($errors->has('fire_pump_rooms'))
        <p class="help-block">
            {{ $errors->first('fire_pump_rooms') }}
        </p>
    @endif
  </div>
      <div class="col-sm-2 form-group">
          <label class="control-label">Public Addressing System</label>
         {!! Form::text('public_addressing_system', old('public_addressing_system'), ['class' => 'form-control', 'id'=>'public_addressing_system', 'placeholder' => '',  'onfocus' => 'getpublicaddressList()']) !!}
      </div>
       <div class="col-sm-3 form-group">
          <label class="control-label">Fire Alarm System</label>
           {!! Form::text('fire_alaram_system', old('fire_alaram_system'), ['class' => 'form-control', 'placeholder' => '', 'id'=>'fire_alaram_system',  'onfocus' => 'getfirealaramList()']) !!}
      </div>
        <div class="col-sm-2 form-group">
          <label class="control-label">Flow Annuciator Panel</label>
           {!! Form::text('flow_anounciator', old('flow_anounciator'), ['class' => 'form-control', 'placeholder' => '', 'id'=>'flow_anounciator',  'onfocus' => 'getflowannounceList()']) !!}
      </div>
</div>
 <!----------------fire-safety-------------------> 
 <!----------------security------------------->                   
<div class="row communitybackground1 secuirty-puropose">
   <label class="col-sm-12 col-xs-12 control-label security">Security</label>
     <div class="col-sm-2 col-xs-12  form-group boom-barrier">
       <label class="col-sm-12 boom-barriererr">Boom Barrier</label>
       <label class="col-sm-12 col-xs-12 emptyu">&nbsp;</label>
       {!! Form::text('boombarier_meter', old('boombarier_meter'), ['class' => 'form-control', 'placeholder' => '','id'=>'boombarier_meter','onfocus' => 'getboombarrierlist()']) !!}
   </div>
  
   
    <div class="col-sm-2 form-group cctv">
       <label class="col-sm-12 col-xs-12 cctn">CCTV</label>
       <label class="col-sm-12 col-xs-12 number">Number</label>
       {!! Form::text('cctv_number', old('cctv_number'), ['class' => 'form-control', 'placeholder' => '']) !!}
   </div>
   <div class="col-sm-2 form-group">
    <label class="col-sm-12 col-xs-12 control-label empty">&nbsp;</label>
       <label class="col-sm-12 col-xs-12 make">Make</label>
       {!! Form::text('cctv_make', old('cctv_make'), ['class' => 'form-control', 'placeholder' => '']) !!}
   </div>
   
    
    <div class="col-sm-2 form-group solar-fencing">
       <label class="col-sm-12 col-xs-12 dolstgrnving">Solar Fencing</label>
       <label class="col-sm-12 col-xs-12 no-of-zones">Number of zones</label>
        {!! Form::text('solar_fence_zones', old('solar_fence_zones'), ['class' => 'form-control', 'placeholder' => '']) !!}
   </div>
    <div class="col-sm-2 form-group">
        <label class="col-sm-12 col-xs-12 control-label empty">&nbsp;</label>
       <label class="col-sm-12 col-xs-12 make">Make </label>
       {!! Form::text('solar_fence_make', old('solar_fence_make'), ['class' => 'form-control', 'placeholder' => '']) !!}
   </div>
    <div class="col-sm-2 form-group">
       <label class="col-sm-12 col-xs-12 control-label empty">&nbsp;</label>
       <label class="col-sm-12 col-xs-12 length">Length </label>
        {!! Form::text('solar_fence_length', old('solar_fence_length'), ['class' => 'form-control', 'placeholder' => '']) !!}
   </div>
     <div class="col-sm-2 form-group lightening-effect"> 
       <label class="col-sm-12 col-xs-12 control-label empty">&nbsp;</label>
       <label class="col-sm-12 col-xs-12 lightening-protection">Lightening Protection </label>
        {!! Form::text('lighten_protection', old('lighten_protection'), ['class' => 'form-control', 'placeholder' => '']) !!}
   </div>
    
</div>
<!----------------security------------------->                    
       
    
    <?php  $n=0; ?>
    <input type="hidden" id="id" value="<?php echo ++$n; ?>">
    <div class="modal fade whatwhlll" id="sectionModal" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel">
    <div class="modal-dialog tempcreat-popbox blocks-popup" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close clsepopup" 
              data-dismiss="modal" 
              aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title bloskinformation" 
            id="favoritesModalLabel">Blocks Information</h4>
          </div>
          <div class="modal-body blockoverhead">
          
       
             <div class="row">
                <div class="col-xs-1 xnooo">
                    <label>S.No</label>
                </div>
			    <div class="col-xs-4 blokalaname">
                 	<label>Name of the Block</label>
                </div>
                 <div class="col-xs-6 name-sociter-changed">
                	 <label>Name Changed to Society </label>
                </div>
                
                <?php $m = 0; if(count($firenoc) > 0) {
				 $m = 0;
			foreach($firenoc as $dgcon) {?> 
            <div class="col-xs-1 dunacinnumner number-weight">
                <label><?php $m = $m + 1; echo $m; ?></label>
            </div>
            <div class="col-xs-4 form-group"> 
                    {!! Form::text('blockname[]', $dgcon['blockname'], ['class' => 'form-control',  'placeholder' => '']) !!}
                </div>
                <div class="col-xs-6 form-group">
				
				<div class="col-xs-12 select-groupw"><select name="name_change_socity[]" class="form-control">
				<option value="Yes" <?php if($dgcon['name_change_socity'] == 'Yes') echo "selected='selected'"; ?>>Yes</option>
				<option value="No" <?php if($dgcon['name_change_socity'] == 'No') echo "selected='selected'"; ?>>No</option>
				<option value="N/A" <?php if($dgcon['name_change_socity'] == 'N/A') echo "selected='selected'"; ?>>N/A</option>
				</select>
                </div>   
                </div>  
             
                <?php } } else { ?>
                <div class="col-sm-1 dunacinnumner number-weight">
                	<label>1</label>
                </div>
                <div class="col-xs-4 form-group"> 
                    {!! Form::text('blockname[]', '', ['class' => 'form-control',  'placeholder' => '']) !!}
                </div>
                <div class="col-xs-6 form-group"><select name="name_change_socity[]" class="form-control">
				<option value="Yes">Yes</option>
				<option value="No">No</option>
				<option value="N/A">N/A</option>
				</select>
                </div>   
                
                <?php } ?> 
				  <?php if($m > 0){  $n=$m - 1; } else {$n = 0;} ?>
    <input type="hidden" id="id" value="<?php echo ++$n; ?>">
                 <a href="#" onclick="addFormField(); return false;" class="adding-more" style="font-weight:bold; font-size:21px; color:#0b1cff; text-decoration:none; float: right;display:inline-block;width:auto;position:absolute;">+</a></div>
                        <div id="divTxt">  

                       	</div>  
              
           </div>   
           
          <div class="modal-footer">
            <button type="button" 
              class="btn btn-default btn-closse" data-dismiss="modal" style="margin-right:10px;" onclick="closepopup();">Submit</button>
           <!--   <span class="pull-right">
                  <button type="button" class="btn btn-primary secsave" onclick="getDeiselsum();">Save</button>
                 
             </span>-->
          </div>
        </div>
    </div>
</div>

<div class="modal fade whatwhlll" id="sectionModal1" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
      <div class="modal-dialog tempcreat-popbox twobedroomflat" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close clsepopup" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title bloskinformation" id="favoritesModalLabel">Flats</h4>
          </div>
          <div class="modal-body blockoverhead">
             <div class="row">
                 <div class="col-sm-3 col-xs-3 form-group one-check">
                    1BHK
                 </div> 
                  <div class="col-sm-9 col-xs-9 form-group">
                    <input type="text" name="onebhk" value="<?php if(isset($flats['onebhk']))  echo $flats['onebhk'] ; ?>" class="form-control faltsnb"  /> 
                 </div>      
             </div>
              <div class="row">
                 <div class="col-sm-3 col-xs-3 form-group two-check">
                   2BHK
                 </div> 
                  <div class="col-sm-9 col-xs-9 form-group">
                    <input type="text" name="twobhk" value="<?php if(isset($flats['twobhk']))  echo $flats['twobhk'] ; ?>"  class="form-control faltsnb"  /> 
                 </div>      
             </div>
              <div class="row">
                 <div class="col-sm-3 col-xs-3 form-group three-check">
                    3BHK
                 </div> 
                  <div class="col-sm-9 col-xs-9 form-group">
                    <input type="text" name="threebhk"  value="<?php if(isset($flats['threebhk']))  echo $flats['threebhk'] ; ?>" class="form-control faltsnb"  /> 
                 </div>      
             </div>
              <div class="row">
                 <div class="col-sm-3 col-xs-3 form-group four-check">
                     4BHK
                 </div> 
                  <div class="col-sm-9 col-xs-9 form-group">
                    <input type="text" name="fourbhk" value="<?php if(isset($flats['fourbhk']))  echo $flats['fourbhk'] ; ?>"  class="form-control faltsnb"  /> 
                 </div>      
             </div>
              <div class="row">
                 <div class="col-sm-3 col-xs-3 form-group five-check">
                   5BHK
                 </div> 
                  <div class="col-sm-9 col-xs-9 form-group">
                    <input type="text" name="fivebhk" value="<?php if(isset($flats['fivebhk']))  echo $flats['fivebhk'] ; ?>"  class="form-control faltsnb"  /> 
                 </div>      
             </div>
           </div>   
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-closse" data-dismiss="modal" style="margin-right:10px;" onclick="closemodel1popup();">Submit</button>
          </div>
        </div>
    </div>
</div>

 <?php  $trans=0; ?>
  
<div class="modal fade whatwhlll" id="sectionModal2" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
      <div class="modal-dialog tempcreat-popbox transformercapacity vavoritemodalcode" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close clsepopup" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title bloskinformation" id="favoritesModalLabel">Transformers</h4>
          </div>
          <div class="modal-body blockoverhead">
             <div class="row transofrmers">
			 
			  <div class="col-sm-1 col-xs-1 numbering">
                     <label>S.No</label><br />
                   
                 </div>
                 <div class="col-sm-3 col-xs-3">
                     <label>Capacity</label>
                    
              </div>
			  <div class="col-sm-2 col-xs-2">
                     <label>Location</label>
                    
              </div>
			    <div class="col-sm-2 col-xs-2">
                     <label>Make</label>
                    
              </div>
              <div class="col-sm-3 col-xs-3">
                   <label>Browse</label>
                 
              </div>
               <div class="col-sm-1 col-xs-1"> <a href="#" onclick="addtransFormField(); return false;" class="adding-more" style="font-weight:bold; font-size:21px; color:#0b1cff; text-decoration:none; text-align:center;display:inline-block;width:auto;">+</a></div>
              </div>
              
          <div class="row transofrmers">
			  
			  <?php $mt = 0; if(count($transformer) > 0) {
				 $mt = 0;
			foreach($transformer as $dgcon) { //echo "<pre>"; print_r($dgcon); echo "</pre>";?>
            <div class="col-sm-1 col-xs-1 numbering">
                <span><?php $mt = $mt + 1; echo $mt; ?></span>
            </div>
            <div class="col-sm-3 col-xs-3 form-group"> 
                      <input type="text" class="form-control" name="transcapacity[]" value="<?php echo  $dgcon['capacity']; ?>"/>
                </div>
				<div class="col-sm-2 col-xs-2 form-group"> 
				
                      <input type="text" class="form-control" name="translocation[]" value="<?php echo  $dgcon['location']; ?>"/>
                </div>
				
				
				 <div class="col-sm-2 col-xs-2 form-group"> 
                      <input type="text" class="form-control" name="transmake[]" value="<?php echo  $dgcon['make']; ?>"/>
                </div>
				
				
                <div class="col-sm-3 col-xs-3 form-group">
				
				 <input type="file" class="form-control" name="transfilename[]"   /> <span><?php if(isset($dgcon['filename']))  echo $dgcon['filename']; ?></span>
               
                </div> 
            </div>
             
              <div class="row transofrmers">
                <?php } } else { ?>
                <div class="col-sm-1 col-xs-1 numbering">
                	<span>1</span>
                </div>
                <div class="col-sm-3 col-xs-3 form-group"> 
                     <input type="text" class="form-control" name="transcapacity[]"  />
                </div>
				<div class="col-sm-2 col-xs-2 form-group"> 
				 <input type="text" class="form-control" name="translocation[]"  />
                    
                </div>
				 <div class="col-sm-2 col-xs-2 form-group"> 
                      <input type="text" class="form-control" name="transmake[]"/>
                </div>
				
                <div class="col-sm-3 col-xs-3 form-group">  <input type="file" class="form-control" name="transfilename[]"   />
                </div>   
                
                <?php } ?> 
				  <?php if($mt > 0){  $trans=$mt - 1; } else {$trans = 0;} ?>
				  
				    <input type="hidden" id="trans" value="<?php echo ++$trans; ?>">
                     
                
			
            
            </div> 
            
                        <div id="divTxttrans"> 

                       	</div>  
              </div>    
          <div class="modal-footer" style="overflow:hidden;">
            <button type="button" class="btn btn-default btn-closse" data-dismiss="modal" onclick="closetranspopup();">Submit</button>
          </div>
       
    </div>
</div>
</div>

 <?php  $dgsetsc=0; ?>
  

<div class="modal fade whatwhlll" id="sectionModal3" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
      <div class="modal-dialog tempcreat-popbox transformercapacity dgscapacitysd editdgsets" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close clsepopup" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title bloskinformation" id="favoritesModalLabel">DG Sets</h4>
          </div>
          <div class="modal-body blockoverhead">
             <div class="row transofrmers dg-teransfermers">
                 <div class="col-sm-1 col-xs-1  numbering">
                     <label>S.No</label>
                     
                 </div>
                 <div class="col-sm-2 col-xs-2">
                     <label>Capacity</label>
                   
              </div>
			  <div class="col-sm-3 col-xs-3">
                     <label>Location</label>
                   
              </div>
			   <div class="col-sm-2 col-xs-2">
                     <label>Make</label>
                   
              </div>
              <div class="col-sm-3 col-xs-3">
                   <label>Browse</label>
                  
              </div>
              <div class="col-sm-1 col-xs-1">
			  <a href="#" onclick="adddgsFormField(); return false;" class="adding-more" style="font-weight:bold; font-size:21px; color:#0b1cff; text-decoration:none; text-align:center;display:inline-block;width:auto;">+</a></div>
              
           </div>
           
           <div class="row dg-teransfermers">
              
                <?php $md = 0; if(count($dgsets) > 0) {
				 $md = 0;
			foreach($dgsets as $dgcon) { //echo "<pre>"; print_r($dgcon); echo "</pre>";?>
            <div class="col-sm-1 col-xs-1 numbering">
                <span><?php $md = $md + 1; echo $md; ?></span>
            </div>
            <div class="col-sm-2 col-xs-2 form-group"> 
                      <input type="text" class="form-control" name="dgcapacity[]" value="<?php echo  $dgcon['capacity']; ?>"/>
                </div>
				<div class="col-sm-3 col-xs-3 form-group"> 
                      <input type="text" class="form-control" name="dglocation[]" value="<?php echo  $dgcon['location']; ?>"/>
                </div>
				
				<div class="col-sm-2 col-xs-2 form-group"> 
                      <input type="text" class="form-control" name="dgmake[]" value="<?php echo  $dgcon['make']; ?>"/>
                </div>
                <div class="col-sm-3 col-xs-3 form-group">
				
				 <input type="file" class="form-control" name="dgfilename[]"   /><?php if(isset($dgcon['filename']))  echo $dgcon['filename']; ?>
                 
                </div>  
             
                <?php } } else { ?>
                <div class="col-sm-1 col-xs-1 form-group numbering">
                	<span>1</span>
                </div>
                <div class="col-sm-2 col-xs-2 form-group"> 
                     <input type="text" class="form-control" name="dgcapacity[]"  />
                </div>
				   <div class="col-sm-3 col-xs-3 form-group"> 
                     <input type="text" class="form-control" name="dglocation[]"  />
                </div>
				
				 <div class="col-sm-2 col-xs-2 form-group"> 
                     <input type="text" class="form-control" name="dgmake[]"  />
                </div>
                <div class="col-sm-3  col-xs-3 form-group">  <input type="file" class="form-control" name="dgfilename[]"   />
                </div>   
                
                <?php } ?> 
				  <?php if($md > 0){  $dgsetsc=$md - 1; } else {$dgsetsc = 0;} ?>
                    <input type="hidden" id="dgsetsc" value="<?php echo ++$dgsetsc; ?>">
    
              
           </div> 
		   
		    <div id="divTxtdgs" > 

                       	</div>  
              
               </div>
          <div class="modal-footer" style="overflow:hidden;">
            <button type="button" class="btn btn-default btn-closse" data-dismiss="modal"  onclick="closedgsetspopup();">Submit</button>
          </div>
       
    </div>
</div>
</div>

<?php  $pwrbkpc=0; ?>
  

<div class="modal fade whatwhlll" id="sectionModal13" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
      <div class="modal-dialog tempcreat-popbox transformercapacity solarpowert-topics" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close clsepopup" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title bloskinformation" id="favoritesModalLabel">Solar Power</h4>
          </div>
          <div class="modal-body blockoverhead">
             <div class="row transofrmers dg-teransfermers solarpwrcls">
                 <div class="col-sm-1 col-xs-1  numbering">
                     <label>S.No</label><br />
                 </div>
				     <div class="col-sm-2 col-xs-2">
                     <label>Capacity</label><br />
                 </div>
				 <div class="col-sm-3 col-xs-3">
                     <label>Location</label><br />
                 </div>
				     <div class="col-sm-2 col-xs-2">
                     <label>Make</label><br />
                 </div>
				  <div class="col-sm-3 col-xs-3">
                     <label>Browse</label><br />
                 </div>
                 <div class="col-sm-1 col-xs-1">   
			  <a href="#" onclick="addpwrbkpFormField(); return false;" class="adding-more" style="font-weight:bold; font-size:21px; color:#0b1cff; text-decoration:none; text-align:center;display:inline-block;width:auto;">+</a></div>
				</div> 
                 
               <div class="solarpwrcls">
				    <?php $mss = 0; if(count($solarpwrsys) > 0) {
				 $mss = 0;
			foreach($solarpwrsys as $dgcon) { //echo "<pre>"; print_r($dgcon); echo "</pre>";?>
             <div class="row transofrmers dg-teransfermers solarpwrcls"> 
            <div class="col-sm-1 col-xs-1 form-group numbering">
                <span><?php $mss = $mss + 1; echo $mss; ?></span>
            </div>
            <div class="col-sm-2 col-xs-2 form-group"> 
			  <input type="hidden" name="spid[]" value="<?php echo  $dgcon['id']; ?>">
                      <input type="text" class="form-control" name="solarpwrcapacity[]" value="<?php echo  $dgcon['capacity']; ?>"/>
                </div>
				 <div class="col-sm-3 col-xs-3 form-group"> 
                      <input type="text" class="form-control" name="solarpwrlocation[]" value="<?php echo  $dgcon['location']; ?>"/>
                </div>
				 <div class="col-sm-2 col-xs-2 form-group"> 
                      <input type="text" class="form-control" name="solarpwrmake[]" value="<?php echo  $dgcon['make']; ?>"/>
                </div>
                <div class="col-sm-3 col-xs-3 form-group">
				
				 <input type="file" class="form-control" name="solarpwrfilename[]"/><?php if(isset($dgcon['filename']))  echo $dgcon['filename']; ?>
                
                </div> 
               </div> 
                <?php } } else { ?>
                <div class="row transofrmers dg-teransfermers solarpwrcls">
                 <div class="col-sm-1 col-xs-1  numbering">
                     <span>1</span>
                 </div>
                 <div class="col-sm-2 col-xs-2 form-group">
				   <input type="hidden" name="spid[]" value="0">
                     <input type="text" class="form-control" name="solarpwrcapacity[]"  />
              </div>
			    <div class="col-sm-3 col-xs-3 form-group">
                     <input type="text" class="form-control" name="solarpwrlocation[]"  />
              </div>
			    <div class="col-sm-2 col-xs-2 form-group">
                     <input type="text" class="form-control" name="solarpwrmake[]"  />
              </div>
              <div class="col-sm-3 col-xs-3 form-group">
                   <input type="file" class="form-control"  name="solarpwrfilename[]"   />
              </div>
                 </div>
                <?php } ?> 
				  <?php if($mss > 0){  $pwrbkpc=$mss - 1; } else {$pwrbkpc = 0;} ?>
                  <input type="hidden" id="pwrbkpc" value="<?php echo ++$pwrbkpc; ?>">
				 
				
           </div> 
		   
		    <div id="divTxtpwrbkp"> 

                       	</div>    
              </div> 
              
          <div class="modal-footer" style="overflow:hidden;">
            <button type="button" class="btn btn-default btn-closse" data-dismiss="modal"  onclick="closesolarpop();">Submit</button>
          </div>
       
    </div>
</div>
</div>
 <?php  $stpc=0; ?>
   
<div class="modal fade whatwhlll" id="sectionModal4" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
      <div class="modal-dialog tempcreat-popbox transformercapacity stpoverloadknggnd" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close clsepopup" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title bloskinformation" id="favoritesModalLabel">STP </h4>
          </div>
          <div class="modal-body blockoverhead">
          <div class="row transofrmers stp-overblick">
               <div class="col-sm-1 col-xs-1 numbering">
                     <label>S.No</label><br />
                   
                 </div>
				   <div class="col-sm-2 col-xs-2">
                     <label>Phase</label>
                    
              </div>
			     <div class="col-sm-2 col-xs-2">
                     <label>Technology</label>
                    
              </div>
                 <div class="col-sm-2 col-xs-2">
                     <label>Capacity</label>
                    
              </div>
			  <div class="col-sm-1 col-xs-1">
                     <label>Make</label>
                    
              </div>
              <div class="col-sm-3 col-xs-3">
                   <label>Browse</label>
                  
              </div>
			 <div class="col-sm-1 col-xs-1">
			  <a href="#" onclick="addstpFormField(); return false;" class="adding-more" style="font-weight:bold; font-size:21px; color:#0b1cff; text-decoration:none; text-align:center;display:inline-block;width:auto;">+</a></div>
              </div>
              
              <div class="row transofrmers stp-overblick">
              
                       <?php $ms = 0; if(count($stp) > 0) {
				 $ms = 0;
			foreach($stp as $dgcon) { //echo "<pre>"; print_r($dgcon); echo "</pre>";?>
              <div class="transofrmers stp-overblick">
            <div class="col-sm-1 col-xs-1 form-group numbering">
                <span><?php $ms = $ms + 1; echo $ms; ?></span>
            </div>
			  <div class="col-sm-2 col-xs-2 form-group"> 
                      <input type="text" class="form-control" name="stpphase[]" value="<?php echo  $dgcon['type']; ?>"/>
                </div>
					<div class="col-sm-2 col-xs-2 form-group"> 
                      <input type="text" class="form-control" name="stptechnology[]" value="<?php echo  $dgcon['technology']; ?>"/>
                </div>
            <div class="col-sm-2 col-xs-2 form-group"> 
                      <input type="text" class="form-control" name="stpcapacity[]" value="<?php echo  $dgcon['capacity']; ?>"/>
                </div>
			
				 <div class="col-sm-1 col-xs-1 form-group"> 
                      <input type="text" class="form-control" name="stpmake[]" value="<?php echo  $dgcon['make']; ?>"/>
                </div>
                <div class="col-sm-3 col-xs-3 form-group">
				
				<input type="file" class="form-control" name="stpfilename[]"/><?php if(isset($dgcon['filename']))  echo $dgcon['filename']; ?>
                
                </div>  
				 </div>
             
                <?php } } else { ?>
                  <div class="transofrmers stp-overblick">
                <div class="col-sm-1 col-xs-1 form-group numbering">
                	<span>1</span>
                </div>
				 <div class="col-sm-2 col-xs-2 form-group"> 
                     <input type="text" class="form-control" name="stpphase[]"  />
                </div>
				  <div class="col-sm-2 col-xs-2 form-group"> 
                     <input type="text" class="form-control" name="stptechnology[]"  />
                </div>   
                <div class="col-sm-2 col-xs-2 form-group"> 
                     <input type="text" class="form-control" name="stpcapacity[]"  />
                </div>
				
				<div class="col-sm-1 col-xs-1 form-group"> 
                     <input type="text" class="form-control" name="stpmake[]"  />
                </div>
                <div class="col-sm-3 col-xs-3  form-group">  
                  <input type="file" class="form-control" name="stpfilename[]"   />
                </div>
                
			  </div>
                <?php } ?> 
				  <?php if($ms > 0){  $stpc=$ms - 1; } else {$stpc = 0;} ?>
                  <input type="hidden" id="stpc" value="<?php echo ++$stpc; ?>">
             
           </div> 
		    <div id="divTxtstp"> 

                       	</div>    
                 
              
               </div>
          <div class="modal-footer" style="overflow:hidden;">
            <button type="button" class="btn btn-default btn-closse" data-dismiss="modal"  onclick="closestppopup();">Submit</button>
          </div>
       
    </div>
</div>
</div>



<?php  $wspc=0; ?>
   
<div class="modal fade whatwhlll" id="sectionModal41" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
      <div class="modal-dialog tempcreat-popbox transformercapacity wspareppodnfdn" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close clsepopup" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title bloskinformation" id="favoritesModalLabel">WSP </h4>
          </div>
          <div class="modal-body blockoverhead">
              <div class="row transofrmers stp-overblick">
                 <div class="col-sm-1 col-xs-1 numbering">
                     <label>S.No</label><br />
                 </div>
                  <div class="col-sm-2 col-xs-2">
                     <label>Phase</label><br />
                 </div>
				  <div class="col-sm-2 col-xs-2">
                     <label>Capacity</label><br />
                 </div>
				  <div class="col-sm-2 col-xs-2">
                     <label>Make</label><br />
                 </div>
				  <div class="col-sm-4 col-xs-4">
                     <label>Browse</label><br />
                 </div>
                 <div class="col-sm-1 col-xs-1">
			  <a href="#" onclick="addwspFormField(); return false;" class="adding-more" style="font-weight:bold; font-size:21px; color:#0b1cff; text-decoration:none; text-align:center;display:inline-block;width:auto;">+</a></div>
				</div>
                
              <div class="row stp-overblick">    
		
			    <?php $msw = 0; if(count($wsp) > 0) {
				 $msw = 0;
			foreach($wsp as $dgcon) { //echo "<pre>"; print_r($dgcon); echo "</pre>";?>
             <div class="transofrmers stp-overblick">
            <div class="col-sm-1 col-xs-1 form-group numbering">
                <span><?php $msw = $msw + 1; echo $msw; ?></span>
            </div>
			
			  <div class="col-sm-2 col-xs-2 form-group"> 
                      <input type="text" class="form-control" name="wspphase[]" value="<?php echo  $dgcon['type']; ?>"/>
                </div>
            <div class="col-sm-2 col-xs-2 form-group"> 
                      <input type="text" class="form-control" name="wspcapacity[]" value="<?php echo  $dgcon['capacity']; ?>"/>
                </div>
				<input type="hidden" name="ws_id[]" value="<?php echo  $dgcon['id']; ?>">
				 <div class="col-sm-2 col-xs-2 form-group"> 
                      <input type="text" class="form-control" name="wspmake[]" value="<?php echo  $dgcon['make']; ?>"/>
                </div>
                <div class="col-sm-4 col-xs-4 form-group">
				
				<input type="file" class="form-control" name="wspfilename[]"/><?php if(isset($dgcon['filename']))  echo $dgcon['filename']; ?>
                
                </div>  
				</div>
             
                <?php } } else { ?>
                 <div class="transofrmers stp-overblick">
                <div class="col-sm-1 col-xs-1 form-group numbering">
                     <span>1</span>
                 </div>
				 <div class="col-sm-2 col-xs-2 form-group">
                     <input type="text" class="form-control"  name="wspphase[]"  />
              </div>
                 <div class="col-sm-2 col-xs-2 form-group">
                     <input type="text" class="form-control"  name="wspcapacity[]"  />
					 <input type="hidden" name="ws_id[]" value="0">
              </div>
			   <div class="col-sm-2 col-xs-2 form-group">
                     <input type="text" class="form-control"  name="wspmake[]"  />
              </div>
              <div class="col-sm-4 col-xs-4 form-group">
                   <input type="file" class="form-control"   name="wspfilename[]"   />
              </div>
              </div>  
                <?php } ?> 
				  <?php if($msw > 0){  $wspc=$msw - 1; } else {$wspc = 0;} ?>
                   <input type="hidden" id="wspc" value="<?php echo ++$wspc; ?>">
              
           </div> 
		   
		    <div id="divTxtwsp"> 

                       	</div>    
                 
              
               </div>
          <div class="modal-footer" style="overflow:hidden;">
            <button type="button" class="btn btn-default btn-closse" data-dismiss="modal"  onclick="closewsppopup();">Submit</button>
          </div>
       
    </div>
</div>
</div>


<?php  $pumprmc=0; ?>
    <input type="hidden" id="pumprmc" value="<?php echo ++$pumprmc; ?>">

<div class="modal fade whatwhlll" id="sectionModal62pmp" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
      <div class="modal-dialog tempcreat-popbox transformercapacity pubkicassredding" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close clsepopup" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title bloskinformation" id="favoritesModalLabel">Fire Pump Rooms</h4>
          </div>
          <div class="modal-body blockoverhead">
                
              
           <div class="row transofrmers gasbanks-update">
                 <div class="col-sm-1 col-xs-1 form-group numbering">
                     <label>S.No</label><br />
                     <span>1</span>
                 </div>
                 <div class="col-sm-2 col-xs-2 form-group">
                     <label>Location</label>
                     <input type="text" class="form-control" name="pmplocation[]"  />
              </div>
			 <div class="col-sm-2 col-xs-2 form-group">
                     <label>Jockey</label>
                     <input type="text" class="form-control" name="jockey[]"  />
              </div>
              <div class="col-sm-2 col-xs-2 form-group">
                     <label>Main</label>
                     <input type="text" class="form-control" name="main[]"  />
              </div>
			   <div class="col-sm-2 col-xs-2 form-group">
                     <label>DG</label>
                     <input type="text" class="form-control" name="dg[]"  />
              </div>
			   <div class="col-sm-2 col-xs-2 form-group">
                     <label>Booster</label>
                     <input type="text" class="form-control" name="booster[]"  />
              </div>
              <div class="col-sm-1 col-xs-1">
			  <a href="#" onclick="addpmpadFormField(); return false;" class="adding-more" style="font-weight:bold; font-size:21px; color:#0b1cff; text-decoration:none; text-align:center;display:inline-block;width:auto;">+</a></div>
           </div> 
		   
		    <div id="divTxtpumprmsy"> 

                       	</div>    
                 </div>     
          <div class="modal-footer" style="overflow:hidden;">
            <button type="button" class="btn btn-default btn-closse" data-dismiss="modal"  onclick="closepmppopup();">Submit</button>
          </div>
      
    </div>
</div>
</div>


  <?php  $gasbc=0; ?>


<div class="modal fade whatwhlll" id="sectionModal5" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
      <div class="modal-dialog tempcreat-popbox transformercapacity gabakbnkss" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close clsepopup" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title bloskinformation" id="favoritesModalLabel">Gas Banks</h4>
          </div>
          <div class="modal-body blockoverhead">
                  <div class="row transofrmers gasbanks-update">
                 <div class="col-sm-1 col-xs-1  numbering">
                     <label>S.No</label><br />
                 </div>
				  <div class="col-sm-2 col-xs-2">
                     <label>Bank Name</label>
               </div>
                 <div class="col-sm-2 col-xs-2">
                     <label>Location</label>
               </div>
			   <div class="col-sm-2 col-xs-2">
                     <label>Capacity</label>
               </div>
			   
			    <div class="col-sm-1 col-xs-1">
                     <label>Make</label>
              </div>
              <div class="col-sm-3 col-xs-3">
                   <label>Browse</label>
              </div>
              <div class="col-sm-1 col-xs-1">
			  <a href="#" onclick="addgasbFormField(); return false;" class="adding-more" style="font-weight:bold; font-size:21px; color:#0b1cff; text-decoration:none; text-align:center;display:inline-block;width:auto;">+</a></div>
              
           </div>
              
         
                 <?php $mg = 0; if(count($gasbank) > 0) {
				 $mg = 0;
			foreach($gasbank as $dgcon) { //echo "<pre>"; print_r($dgcon); echo "</pre>";?>
              <div class="row transofrmers gasbanks-update">
            <div class="col-sm-1 col-xs-1 form-group numbering">
                <span><?php $mg = $mg + 1; echo $mg; ?></span>
            </div>
			  	<div class="col-sm-2 col-xs-2 form-group"> 
                      <input type="text" class="form-control" name="gabankname[]" value="<?php echo  $dgcon['name']; ?>"/>
                </div>
			<div class="col-sm-2 col-xs-2 form-group"> 
                      <input type="text" class="form-control" name="galocation[]" value="<?php echo  $dgcon['location']; ?>"/>
                </div>
            <div class="col-sm-2 col-xs-2 form-group"> 
                      <input type="text" class="form-control" name="gacapacity[]" value="<?php echo  $dgcon['capacity']; ?>"/>
                </div>
				 <div class="col-sm-1 col-xs-1 form-group"> 
                      <input type="text" class="form-control" name="gamake[]" value="<?php echo  $dgcon['make']; ?>"/>
                </div>
                <div class="col-sm-3  col-xs-3 form-group">
				
				 <input type="file" class="form-control" name="gafilename[]"/><?php if(isset($dgcon['filename']))  echo $dgcon['filename']; ?>
               
                </div>  
                   </div>  
             
                <?php } } else { ?>
                  <div class="row transofrmers gasbanks-update">
                <div class="col-sm-1 col-xs-1  form-group numbering">
                	<span>1</span>
                </div>
					<div class="col-xs-2  form-group"> 
                     <input type="text" class="form-control" name="gabankname[]"  />
              </div>
				<div class="col-xs-2 form-group"> 
                     <input type="text" class="form-control" name="galocation[]"  />
              </div>
                <div class="col-xs-2 form-group"> 
                     <input type="text" class="form-control" name="gacapacity[]"  />
                </div>
				  <div class="col-xs-1 form-group"> 
                     <input type="text" class="form-control" name="gamake[]"  />
                </div>
                <div class="col-xs-3 form-group">  
                <input type="file" class="form-control" name="gafilename[]"   />
                </div> 
                   </div>    
                
                <?php } ?> 
				  <?php if($mg > 0){  $gasbc=$mg - 1; } else {$gasbc = 0;} ?>
                  <input type="hidden" id="gasbc" value="<?php echo ++$gasbc; ?>">
              
               <?php if($mg > 0){  $gasbc=$mg - 1; } else {$gasbc = 0;} ?>
                  <input type="hidden" id="gasbc" value="<?php echo ++$gasbc; ?>">
              
          
		   
		    <div id="divTxtgasb"> 

                       	</div>    
              </div>       
          <div class="modal-footer" style="overflow:hidden;">
            <button type="button" class="btn btn-default btn-closse" data-dismiss="modal" onclick="closegaspopup();">Submit</button>
          </div>
       
    </div>
</div>
</div>

<?php  $pubadsy=0; ?>


<div class="modal fade whatwhlll" id="sectionModal62" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
      <div class="modal-dialog tempcreat-popbox transformercapacity pubkicassredding" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close clsepopup" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title bloskinformation" id="favoritesModalLabel">Public Addressing System</h4>
          </div>
          <div class="modal-body blockoverhead">
                
              
           <div class="row transofrmers gasbanks-update">
                 <div class="col-sm-1 col-xs-1">
                     <label>S.No</label><br />
                    
                 </div>
				  <div class="col-sm-3 col-xs-3">
                     <label>Location</label>
                     
              </div>
			   <div class="col-sm-3 col-xs-3" >
                     <label>Make</label>
                    
              </div>
			    <div class="col-sm-4 col-xs-4" >
                     <label>Browse</label>
              </div>
              <div class="col-sm-1 col-xs-1">
			  <a href="#" onclick="addpubadFormField(); return false;" class="adding-more" style="font-weight:bold; font-size:21px; color:#0b1cff; text-decoration:none; text-align:center;display:inline-block;width:auto;">+</a></div>
           </div>
           
           <div class="gasbanks-update">
			    <?php $mgp = 0; if(count($pbasys) > 0) {
				 $mgp = 0;
			foreach($pbasys as $dgcon) { //echo "<pre>"; print_r($dgcon); echo "</pre>";?>
             <div class="row transofrmers gasbanks-update">
			 <div class="col-sm-1 col-xs-1 form-group numbering">
                <span><?php $mgp = $mgp + 1; echo $mgp; ?></span>
            </div>
                 <div class="col-sm-3 col-xs-3 form-group">
                  <input type="hidden" name="pbaid[]" value="<?php echo  $dgcon['id']; ?>">
                     <input type="text" class="form-control" name="pbalocation[]"   value="<?php echo  $dgcon['location']; ?>"/>
              </div>
			    <div class="col-sm-3 col-xs-3 form-group">
                     <input type="text" class="form-control" name="pbamake[]" value="<?php echo  $dgcon['make']; ?>"  />
              </div>
              <div class="col-sm-4 col-xs-4 form-group">
                   <input type="file" class="form-control"  name="pbafilename[]" /><?php if(isset($dgcon['filename']))  echo $dgcon['filename']; ?>
              </div>
              </div>
			     <?php } } else { ?>
                  <div class="row transofrmers gasbanks-update">
				  <div class="col-sm-1 col-xs-1 form-group numbering">
                	<span>1</span>
                </div>
                <div class="col-xs-3 form-group"> 
                <input type="hidden" name="pbaid[]" value="0">
                     <input type="text" class="form-control" name="pbalocation[]"  />
                </div>
				  <div class="col-xs-3 form-group"> 
                     <input type="text" class="form-control" name="pbamake[]"  />
                </div>
                <div class="col-xs-4 form-group">  <input type="file" class="form-control" name="pbafilename[]"   />
                </div>   
                  </div>   
                
                <?php } ?> 
				  <?php if($mgp > 0){  $pubadsy=$mgp - 1; } else {$pubadsy = 0;} ?>
                      <input type="hidden" id="pubadsy" value="<?php echo ++$pubadsy; ?>">
		  
          
           </div> 
		   
		    <div id="divTxtpubadsy"> 

                       	</div>    
                </div>     
          <div class="modal-footer" style="overflow:hidden;">
            <button type="button" class="btn btn-default btn-closse" data-dismiss="modal"  onclick="closepbspopup();">Submit</button>
          </div>
       
    </div>
</div>
</div>


<?php  $firealsy=0; ?>
    

<div class="modal fade whatwhlll" id="sectionModal63" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
      <div class="modal-dialog tempcreat-popbox transformercapacity firealarem-system" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close clsepopup" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title bloskinformation" id="favoritesModalLabel">Fire Alaram System</h4>
          </div>
          <div class="modal-body blockoverhead">
                
              
           <div class="row transofrmers gasbanks-update">
                 <div class="col-sm-1 col-xs-1 numbering">
                     <label>S.No</label><br />
                 </div>
				  <div class="col-sm-3 col-xs-3">
                     <label>Location</label><br />
                 </div>
				  <div class="col-sm-3 col-xs-3">
                     <label>Make</label><br />
                 </div>
				  <div class="col-sm-4 col-xs-4">
                     <label>Browse</label><br />
                 </div>
                 <div class="col-sm-1 col-xs-1">	  
			  <a href="#" onclick="addfirealaramadFormField(); return false;" class="adding-more" style="font-weight:bold; font-size:21px; color:#0b1cff; text-decoration:none; text-align:center;display:inline-block;width:auto;">+</a></div>
              </div>
              
              <div class="gasbanks-update">
				 
				  <?php $mgf = 0; if(count($firealaram) > 0) {
				 $mgf = 0;
			foreach($firealaram as $dgcon) { //echo "<pre>"; print_r($dgcon); echo "</pre>";?>
            <div class="row transofrmers gasbanks-update">
			 <div class="col-sm-1 col-xs-1 form-group numbering">
                <span><?php $mgf = $mgf + 1; echo $mgf; ?></span>
            </div>
                 <div class="col-sm-3 col-xs-3 form-group">
                     <input type="text" class="form-control" name="faslocation[]"  value="<?php echo  $dgcon['location']; ?>" />
              </div>
			    <div class="col-sm-3 col-xs-3 form-group">
                     <input type="text" class="form-control" name="fasmake[]" value="<?php echo  $dgcon['make']; ?>"  />
              </div>
              <div class="col-sm-4 col-xs-3 form-group">
                   <input type="file" class="form-control"  name="fasfilename[]"   /><?php if(isset($dgcon['filename']))  echo $dgcon['filename']; ?>
              </div>
              </div>
			     <?php } } else { ?>
                 <div class="row transofrmers gasbanks-update">
				  <div class="col-sm-1 col-xs-1 form-group numbering">
                	<span>1</span>
                </div>
                <div class="col-xs-3  form-group"> 
                     <input type="text" class="form-control" name="faslocation[]"  />
                </div>
				  <div class="col-xs-3 form-group"> 
                     <input type="text" class="form-control" name="fasmake[]"  />
                </div>
                <div class="col-xs-4 form-group">  <input type="file" class="form-control" name="fasfilename[]"   />
                </div>   
                </div>
                
                <?php } ?> 
				  <?php if($mgf > 0){  $firealsy=$mgf - 1; } else {$firealsy = 0;} ?>
                     <input type="hidden" id="firealsy" value="<?php echo ++$firealsy; ?>">
				
            
           </div> 
		   
		    <div id="divTxtfirealaramsy"> 

                       	</div>    
               </div>      
          <div class="modal-footer" style="overflow:hidden;">
            <button type="button" class="btn btn-default btn-closse" data-dismiss="modal"  onclick="closefirepopup();">Submit</button>
          </div>
       
    </div>
</div>
</div>


<?php  $flowann=0; ?>
    

<div class="modal fade whatwhlll" id="sectionModal634" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
      <div class="modal-dialog tempcreat-popbox transformercapacity firealarem-system" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close clsepopup" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title bloskinformation" id="favoritesModalLabel">Flow Annuciator Panel</h4>
          </div>
          <div class="modal-body blockoverhead">
                
              
           <div class="row transofrmers gasbanks-update">
                 <div class="col-sm-1 col-xs-1 numbering">
                     <label>S.No</label><br />
                 </div>
				  <div class="col-sm-2 col-xs-2">
                     <label>Location</label><br />
                 </div>
				  <div class="col-sm-2 col-xs-2">
                     <label>Make</label><br />
                 </div>
				 <div class="col-sm-2 col-xs-2">
                     <label>Zones</label><br />
                 </div>
				  <div class="col-sm-4 col-xs-4">
                     <label>Browse</label><br />
                 </div>
                 <div class="col-sm-1 col-xs-1">	  
			  <a href="#" onclick="addflowanadFormField(); return false;" class="adding-more" style="font-weight:bold; font-size:21px; color:#0b1cff; text-decoration:none; text-align:center;display:inline-block;width:auto;">+</a></div>
              </div>
              
              <div class="gasbanks-update">
				 
				  <?php $mgfl = 0; if(count($flowannres) > 0) {
				 $mgfl = 0;
			foreach($flowannres as $dgcon) { //echo "<pre>"; print_r($dgcon); echo "</pre>";?>
            <div class="row transofrmers gasbanks-update">
			 <div class="col-sm-1 form-group numbering">
                <span><?php $mgfl = $mgfl + 1; echo $mgfl; ?></span>
            </div>
                 <div class="col-sm-2 col-xs-2 form-group">
                     <input type="text" class="form-control" name="flowanlocation[]"  value="<?php echo  $dgcon['location']; ?>" />
              </div>
			    <div class="col-sm-2 col-xs-2 form-group">
                     <input type="text" class="form-control" name="flowanmake[]" value="<?php echo  $dgcon['make']; ?>"  />
              </div>
			    <div class="col-sm-2 col-xs-2 form-group">
                     <input type="text" class="form-control" name="flowanzone[]" value="<?php echo  $dgcon['flowzone']; ?>"  />
              </div>
              <div class="col-sm-4 col-xs-4 form-group">
                   <input type="file" class="form-control"  name="flowanfilename[]"   /><?php if(isset($dgcon['filename']))  echo $dgcon['filename']; ?>
              </div>
              </div>
			     <?php } } else { ?>
                 <div class="row transofrmers gasbanks-update">
				  <div class="col-sm-1 col-xs-1 form-group numbering">
                	<span>1</span>
                </div>
                <div class="col-xs-2  form-group"> 
                     <input type="text" class="form-control" name="flowanlocation[]"  />
                </div>
				  <div class="col-xs-2 form-group"> 
                     <input type="text" class="form-control" name="flowanmake[]"  />
                </div>
				 <div class="col-xs-2 form-group"> 
                     <input type="text" class="form-control" name="flowanzone[]"  />
                </div>
                <div class="col-xs-4 form-group">  <input type="file" class="form-control" name="flowanfilename[]"   />
                </div>   
                </div>
                
                <?php } ?> 
				  <?php if($mgfl > 0){  $flowann=$mgfl - 1; } else {$flowann = 0;} ?>
                     <input type="hidden" id="flowann" value="<?php echo ++$flowann; ?>">
				
            
           </div> 
		   
		    <div id="divTxtflwannsy"> 

                       	</div>    
                   </div>  
          <div class="modal-footer" style="overflow:hidden;">
            <button type="button" class="btn btn-default btn-closse" data-dismiss="modal"  onclick="closeflowanpopup();">Submit</button>
          </div>
       
    </div>
</div>
</div>


<?php  $bmbar=0; ?>
    

<div class="modal fade whatwhlll" id="sectionModal634bm" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
      <div class="modal-dialog tempcreat-popbox transformercapacity soumentfavorite" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close clsepopup" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title bloskinformation" id="favoritesModalLabel">Boom Barrier</h4>
          </div>
          <div class="modal-body blockoverhead">
                
              
           <div class="row transofrmers gasbanks-update">
                 <div class="col-sm-1 col-xs-1  numbering">
                     <label>S.No</label><br />
                     
                 </div>
				 <div class="col-sm-4 col-xs-4">
                     <label>Location</label><br />
                   
                 </div>
				  <div class="col-sm-3 col-xs-3">
                     <label>Make</label><br />
                    
                 </div>
				  <div class="col-sm-3 col-xs-3">
                      <label>Length</label>
                 </div>
                 <div class="col-sm-1 col-xs-1">
			  <a href="#" onclick="addboombarFormField(); return false;" class="adding-more" style="font-weight:bold; font-size:21px; color:#0b1cff; text-decoration:none; text-align:center;display:inline-block;width:auto;">+</a></div>
              </div>
              
            <div class="gasbanks-update">
				   <?php $mgsb = 0; if(count($barrierres) > 0) {
				 $mgsb = 0;
			foreach($barrierres as $dgcon) { //echo "<pre>"; print_r($dgcon); echo "</pre>";?>
             <div class="row transofrmers gasbanks-update">
			 <div class="col-sm-1 col-xs-1 form-group numbering">
                <span><?php $mgsb = $mgsb + 1; echo $mgsb; ?></span>
            </div>
			  <input type="hidden" name="solid[]" value="<?php echo  $dgcon['id']; ?>">
                 <div class="col-sm-4 col-xs-4 form-group">
                     <input type="text" class="form-control" name="bmbrlocation[]"  value="<?php echo  $dgcon['location']; ?>" />
              </div>
			   <div class="col-sm-3 col-xs-3 form-group">
                     <input type="text" class="form-control" name="bmbrmake[]"  value="<?php echo  $dgcon['make']; ?>" />
              </div>
			    <div class="col-sm-3 col-xs-3 form-group">
                     <input type="text" class="form-control" name="bmbrlength[]" value="<?php echo  $dgcon['length']; ?>"  />
              </div>
              </div>
             
			     <?php } } else { ?>
				  
				 
				 <div class="row transofrmers gasbanks-update">  
				 <div class="col-sm-1 col-xs-1 numbering">
                    <span>1</span>
                 </div>
				  <input type="hidden" name="solid[]" value="0">
                 <div class="col-sm-4 col-xs-4 form-group">
                     <input type="text" class="form-control" name="bmbrlocation[]"  />
              </div>
			     <div class="col-sm-3 col-xs-3 form-group">
                     <input type="text" class="form-control" name="bmbrmake[]"  />
              </div>
			    <div class="col-sm-3 col-xs-3  form-group">
                     <input type="text" class="form-control" name="bmbrlength[]"  />
              </div>
              </div>
			   <?php } ?> 
				  <?php if($mgsb > 0){  $bmbar=$mgsb - 1; } else {$bmbar = 0;} ?>
                   <input type="hidden" id="bmbar" value="<?php echo ++$bmbar; ?>">
			  
           </div> 
		   
		    <div id="divTxtbmbr"> 

                       	</div>    
                 </div>     
          <div class="modal-footer" style="overflow:hidden;">
            <button type="button" class="btn btn-default btn-closse" data-dismiss="modal"  onclick="closebmbrpopup();">Submit</button>
          </div>
      
    </div>
</div>
</div>



<?php  $solarwh=0; ?>
    

<div class="modal fade whatwhlll" id="sectionModal65" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
      <div class="modal-dialog tempcreat-popbox transformercapacity soumentfavorite" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close clsepopup" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title bloskinformation" id="favoritesModalLabel">Solar Water Heaters</h4>
          </div>
          <div class="modal-body blockoverhead">
                
              
           <div class="row transofrmers gasbanks-update">
                 <div class="col-sm-1 col-xs-1  numbering">
                     <label>S.No</label><br />
                     
                 </div>
				  <div class="col-sm-3 col-xs-3">
                     <label>Capacity</label><br />
                   
                 </div>
				 <div class="col-sm-4 col-xs-4">
                     <label>Location</label><br />
                   
                 </div>
				  <div class="col-sm-3 col-xs-3">
                     <label>Make</label><br />
                 </div>
				 <div class="col-sm-1 col-xs-1">
                      <a href="#" onclick="addsolarwhFormField(); return false;" class="adding-more" style="font-weight:bold; font-size:21px; color:#0b1cff; text-decoration:none; text-align:center;display:inline-block;width:auto;">+</a>
                  </div>
              </div>
              
            <div class="gasbanks-update">
				   <?php $mgs = 0; if(count($solarsys) > 0) {
				 $mgs = 0;
			foreach($solarsys as $dgcon) { //echo "<pre>"; print_r($dgcon); echo "</pre>";?>
            
            <div class="row transofrmers gasbanks-update">
			 <div class="col-sm-1 col-xs-1 form-group numbering">
                <span><?php $mgs = $mgs + 1; echo $mgs; ?></span>
            </div>
			  <input type="hidden" name="solid[]" value="<?php echo  $dgcon['id']; ?>">
                 <div class="col-sm-3 col-xs-3 form-group">
                     <input type="text" class="form-control" name="solarcapacity[]"  value="<?php echo  $dgcon['capacity']; ?>" />
              </div>
			   <div class="col-sm-4 col-xs-4 form-group">
                     <input type="text" class="form-control" name="solarlocation[]"  value="<?php echo  $dgcon['location']; ?>" />
              </div>
			    <div class="col-sm-3 col-xs-3 form-group">
                     <input type="text" class="form-control" name="solarmake[]" value="<?php echo  $dgcon['make']; ?>"  />
              </div>
               </div>
             
			     <?php } } else { ?>
				 
				 
				 <div class="row transofrmers gasbanks-update">
                     <div class="col-sm-1 col-xs-1 numbering">
                        <span>1</span>
                     </div>
				  	 <input type="hidden" name="solid[]" value="0">
                     <div class="col-sm-3 col-xs-3 form-group">
                         <input type="text" class="form-control" name="solarcapacity[]"  />
                     </div>
                     <div class="col-sm-4 col-xs-4 form-group">
                         <input type="text" class="form-control" name="solarlocation[]"  />
                     </div>
                    <div class="col-sm-3 col-xs-3 form-group">
                         <input type="text" class="form-control" name="solarmake[]"  />
                    </div>             
              
			   <?php } ?> 
				  <?php if($mgs > 0){  $solarwh=$mgs - 1; } else {$solarwh = 0;} ?>
                   <input type="hidden" id="solarwh" value="<?php echo ++$solarwh; ?>">
                  
               </div>
              
           
		   
		    <div id="divTxtsolarwh"> 

                       	</div>    
               </div> 
               </div>     
          <div class="modal-footer" style="overflow:hidden;">
            <button type="button" class="btn btn-default btn-closse" data-dismiss="modal"  onclick="closesolarwhpopup();">Submit</button>
          </div>
          
        
    </div>
</div>
</div>

<!--
<div class="modal fade whatwhlll" id="sectionModal6" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
      <div class="modal-dialog tempcreat-popbox transformercapacity" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close clsepopup" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title bloskinformation" id="favoritesModalLabel">Fire Pump Rooms</h4>
          </div>
          <div class="modal-body blockoverhead"> 
             <div class="row pumproomw">
                 <div class="col-sm-2 form-group numbering">
                     <label>Jockey</label>
                 </div>
                 <div class="col-sm-4 form-group">
                   <input type="text" name="jockey" class="form-control" value="<?php //if(isset($powerpumps['jockey']))  echo $powerpumps['jockey'] ; ?>"  />
              </div>
              <div class="col-sm-6 form-group">
                   <input type="file" name="jockeyfile" class="form-control" /> <?php //if(isset($powerpumps['jockeyfile'])) echo $powerpumps['jockeyfile']; ?>
              </div>
           </div>   
          <div class="row pumproomw">
                 <div class="col-sm-2 form-group numbering">
                     <label>Main</label>
                 </div>
                 <div class="col-sm-4 form-group">
                   <input type="text" name="main" class="form-control" value="<?php //if(isset($powerpumps['main']))  echo $powerpumps['main'] ; ?>"  />
              </div>
              <div class="col-sm-6 form-group">
                   <input type="file" name="mainfile" class="form-control"   /> <?php //if(isset($powerpumps['mainfile'])) echo $powerpumps['mainfile']; ?>
              </div>
           </div>   
          <div class="row pumproomw">
                 <div class="col-sm-2 form-group numbering">
                     <label>DG</label>
                 </div>
                 <div class="col-sm-4 form-group">
                   <input type="text" name="dg" class="form-control"  value="<?php //if(isset($powerpumps['dg']))  echo $powerpumps['dg'] ; ?>" />
              </div>
              <div class="col-sm-6 form-group">
                   <input type="file" name="dgfile" class="form-control"   /> <?php //if(isset($powerpumps['dgfile'])) echo $powerpumps['dgfile']; ?>
              </div>
           </div>   
           <div class="row pumproomw">
                 <div class="col-sm-2 form-group numbering">
                     <label>Booster</label>
                 </div>
                 <div class="col-sm-4 form-group">
                  <input type="text" name="booster" class="form-control"  value="<?php //if(isset($powerpumps['booster']))  echo $powerpumps['booster'] ; ?>" />
              </div>
              <div class="col-sm-6 form-group">
                    <input type="file" name="boosterfile" class="form-control"   />  <?php //if(isset($powerpumps['boosterfile'])) echo $powerpumps['boosterfile']; ?>
              </div>
           </div>   
          <div class="modal-footer" style="overflow:hidden;">
            <button type="button" class="btn btn-default btn-closse" data-dismiss="modal" style="margin-right:10px;" onclick="closepopup();">Close</button>
          </div>
        </div>
    </div>
</div>
</div>
-->


 <?php  $liftsc=0; ?>
   
<div class="modal fade whatwhlll" id="sectionModal7" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
      <div class="modal-dialog tempcreat-popbox liftsinformaton" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close clsepopup" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title bloskinformation" id="favoritesModalLabel">Lifts </h4>
          </div>
          <div class="modal-body blockoverhead">
		  
		   <div class="row transofrmers gasbanks-update">
                 <div class="col-sm-1 col-xs-1  numbering">
                     <label>S.No</label><br />
                 </div>
				 <div class="col-sm-3 col-xs-3">
                     <label>No. of Lifts</label><br />
                 </div>
				 <div class="col-sm-4 col-xs-4">
                     <label>Make</label><br />
                 </div>
				 <div class="col-sm-3 col-xs-3">
                     <label>Type</label><br />
                 </div>
                 <div class="col-sm-1 col-xs-1">
			  <a href="#" onclick="addliftsFormField(); return false;" class="adding-more" style="font-weight:bold; font-size:21px; color:#0b1cff; text-decoration:none; text-align:center;display:inline-block;width:auto;">+</a></div>
             </div>
             
             <div class="row gasbanks-update">
				  <?php $mgl = 0; if(count($lifts) > 0) {
				 $mgl = 0;
			foreach($lifts as $dgcon) { //echo "<pre>"; print_r($dgcon); echo "</pre>";?>
			 <div class="col-sm-1 col-xs-1 form-group numbering">
                <span><b><?php $mgl = $mgl + 1; echo $mgl; ?></b></span>
            </div>
                 <div class="col-sm-3 col-xs-3 form-group">
                     <input type="text" class="form-control liftscnval" name="lift_num[]"  value="<?php echo  $dgcon['lift_num']; ?>" />
              </div>
			    <div class="col-sm-4 col-xs-4 form-group">
                     <input type="text" class="form-control" name="make[]" value="<?php echo  $dgcon['make']; ?>"  />
              </div>
              <div class="col-sm-3 col-xs-3 form-group">
                 <input type="text" class="form-control"  name="type[]"  value="<?php echo  $dgcon['type']; ?>"  />
              </div>
			     <?php } } else { ?> 
				  
				 <div class="col-sm-1 col-xs-1  numbering">
                     <span><b>1</b></span>
                 </div>
                 <div class="col-sm-3 col-xs-3 form-group">
                     <input type="text" class="form-control liftscnval"  name="lift_num[]"  />
              </div>
              <div class="col-sm-4 col-xs-4 form-group">
                   <input type="text" class="form-control" name="make[]"  />
              </div>
			  
			    <div class="col-sm-3 col-xs-3 form-group">
                  <input type="text" class="form-control" name="type[]"  />
              </div>
			   <?php } ?> 
				  <?php if($mgl > 0){  $liftsc=$mgl - 1; } else {$liftsc = 0;} ?>
                  <input type="hidden" id="liftsc" value="<?php echo ++$liftsc; ?>">
                
           </div> 
		   
		    <div id="divTxtlifts"> 

                       	</div>    
				 </div>		
          <div class="modal-footer" style="overflow:hidden;">
            <button type="button" class="btn btn-default btn-closse" data-dismiss="modal"  onclick="closepopup();">Submit</button>
          </div>
       
    </div>
</div>
</div>

 <?php  $postpaidc=0; ?>

<div class="modal fade whatwhlll" id="sectionModal9" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
      <div class="modal-dialog tempcreat-popbox maintaince-information" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close clsepopup" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title bloskinformation" id="favoritesModalLabel">Postpaid Maintenance</h4>
			
          </div>
          <div class="modal-body blockoverhead">
          <div class="row pumproomw">
                 <div class="col-sm-1 col-xs-1  numbering">
                     <label>S.No</label>
                 </div>
                 <div class="col-sm-5 col-xs-5">
                   <label class="control-label">Start Date</label>
              </div>
              <div class="col-sm-5 col-xs-5">
                   <label class="control-label">End Date</label>
              </div>
              <div class="col-sm-1 col-xs-1">
			   <a href="#" onclick="addpostpaidFormField(); return false;" class="adding-more" style="font-weight:bold; font-size:21px; color:#0b1cff; text-decoration:none; text-align:center;display:inline-block;width:auto;">+</a></div>
           </div>
		  
             
                
			    <?php $mgp = 0; if(count($postpaid) > 0) {
				 $mgp = 0;
			foreach($postpaid as $dgcon) { //echo "<pre>"; // print_r($dgcon); echo "</pre>";?>
            <div class="row pumnphysro postpaidmaint">
			 <div class="col-sm-1 col-xs-1 form-group numbering">
                <span><?php $mgp = $mgp + 1; echo $mgp; ?></span>
            </div>
                 <div class="col-sm-5 col-xs-5 form-group">
                     <input type="text" class="form-control" name="post_start_date[]"  value="<?php echo  $dgcon['post_start_date']; ?>" />
              </div>
			    <div class="col-sm-5 col-xs-5 form-group">
                     <input type="text" class="form-control" name="post_end_date[]" value="<?php echo  $dgcon['post_end_date']; ?>"  />
              </div>
              </div>
			     <?php } } else { ?>
			
           
           
            <div class="row pumnphysro postpaidmaint">  
				 <div class="col-sm-1 col-xs-1 form-group numbering">
                     <label>1</label>
                 </div>
                 <div class="col-sm-5 col-xs-5 form-group">
                   <input type="text" name="post_start_date[]"  class="form-control datetpickpop"  />
              </div>
              <div class="col-sm-5 col-xs-5 form-group">
                   <input type="text" name="post_end_date[]" class="form-control datetpickpop"   />
              </div>
                 </div> 
			   <?php } ?> 
				  <?php if($mgp > 0){  $postpaidc=$mgp - 1; } else {$postpaidc = 0;} ?>
                    <input type="hidden" id="postpaidc" value="<?php echo ++$postpaidc; ?>">
			  
              
          
		   <div id="postpaiddiv"></div>  
            
           </div>
           
          <div class="modal-footer" style="overflow:hidden;">
            <button type="button" class="btn btn-default btn-closse" data-dismiss="modal" style="margin-right:10px;" onclick="closepopuppostpaid();">Submit</button>
          </div>
      
    </div>
</div>
</div>
<?php // END MODEL ?>
              

   
{!! Form::submit('Next', ['class' => 'btn btn-danger btn-register sites-next-edit']) !!}
{!! Form::close() !!}

 		        
        </div>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
 <script>
 
 $( document ).ready(function() {


  $(".datetpick").datepicker({

        dateFormat: "dd-mm-yy",
  });
  
   $(".datetpickpop").datepicker({

        dateFormat: "dd-mm-yy",
  });
 });
	
	
function getDeiselsum(){

 $("#sectionModal").modal('hide');

}


function closeblockspopup(){
var blnum = document.getElementById("id").value;
 $("#num_of_blocks_text").val(blnum); 
 $("#sectionModal").modal('hide');
}

function getblockslist(){
 $("#sectionModal").modal();
 
} 

function getflowannounceList(){ 
 $("#sectionModal634").modal();
}


function getboombarrierlist(){ 
 $("#sectionModal634bm").modal();
}

function closebmbrpopup(){
 var blnum = document.getElementById("bmbar").value;
 $("#boombarier_meter").val(blnum);   
 $("#sectionModal634bm").modal('hide');
}

function closemodel1popup(){

 var blnum = document.getElementById("id").value;
 $("#blocks_num").val(blnum); 
 var a = 0;
    $(".faltsnb").each(function() {
	   if(parseInt($(this).val()) > 0) {
        a += parseInt($(this).val());
		}  
    });
	
	$("#num_of_flatsnum").val(a);  
	
	
	
} 
 
function getflatslist(){ 
 $("#sectionModal1").modal();
}   

function closetranspopup(){
 var trans = document.getElementById("trans").value;
 $("#transformers").val(trans);   
 $("#sectionModal2").modal('hide');
} 
 
function gettransformerslist(){ 
 $("#sectionModal2").modal();
}   

function closepopup(){
 var blnum = document.getElementById("id").value;
 $("#blocks_num").val(blnum); 
 $("#sectionModal3").modal('hide');
  
} 

function closeflowanpopup(){
 var blnum = document.getElementById("flowann").value;
 $("#flow_anounciator").val(blnum);   
 $("#sectionModal634").modal('hide');
} 

function closedgsetspopup(){
 $("#sectionModal3").modal('hide');
 var blnum = document.getElementById("dgsetsc").value;
 $("#dscetscnval").val(blnum);   
} 


 
function getdgsetslist(){ 
 $("#sectionModal3").modal();
}  

function getpwrbkplist(){ 
 $("#sectionModal13").modal();
}   


function closepopup(){
 $("#sectionModal4").modal('hide');
 var blnum = document.getElementById("id").value;
 $("#blocks_num").val(blnum);   
} 

function closestppopup(){
var blnum = document.getElementById("stpc").value;
 $("#stp").val(blnum);  
 $("#sectionModal4").modal('hide');
  
} 

 
function getstplist(){ 
 $("#sectionModal4").modal();
} 
function getstpphasetwolist(){ 
 $("#sectionModal4plus").modal();
}  
function closepopup(){
 $("#sectionModal5").modal('hide');
 var blnum = document.getElementById("id").value;
 $("#blocks_num").val(blnum);   
} 
function closegaspopup(){
 var blnum = document.getElementById("gasbc").value;
 $("#gas_banks").val(blnum);  
 $("#sectionModal5").modal('hide'); 
} 

function getwsplist(){ 
 $("#sectionModal41").modal();
}  

function getwspphasetwolist(){ 
 $("#sectionModal41plus").modal();
} 

function closewsppopup(){
 var blnum = document.getElementById("wspc").value;
 $("#wsp").val(blnum);   
 $("#sectionModal41").modal('hide');

} 

 
function getgasbanklist(){ 
 $("#sectionModal5").modal();
 
}  

 
function closepopup(){
 $("#sectionModal6").modal('hide');
 var blnum = document.getElementById("id").value;
 $("#blocks_num").val(blnum);   
} 

function closesolarpop(){
 $("#sectionModal13").modal('hide');
 var blnum = document.getElementById("pwrbkpc").value;
 $("#solar_pwr_text").val(blnum);   
} 



 
function getpumproomslist(){ 
 $("#sectionModal6").modal();
} 

function getpublicaddressList(){ 
 $("#sectionModal62").modal();
} 
function getfirealaramList(){ 
 $("#sectionModal63").modal();
}  

function getflowannounceList(){ 
 $("#sectionModal634").modal();
}


function getsolarblockList(){ 
 $("#sectionModal65").modal();
} 

  
  function closefirepopup(){
 var blnum = document.getElementById("firealsy").value;
 $("#fire_alaram_system").val(blnum);   
 $("#sectionModal63").modal('hide');
} 
 
 function closesolarwhpopup(){
 var blnum = document.getElementById("solarwh").value;
 $("#solar_water_heat_text").val(blnum);   
 $("#sectionModal65").modal('hide');
}  

 function closepopup(){
 $("#sectionModal8").modal('hide');
 var blnum = document.getElementById("id").value;
 $("#blocks_num").val(blnum);   
} 
 
 function closenumatpopup(){
 var blnum = document.getElementById("hydroc").value;
 $("#hydro_pneumatic_sys_text").val(blnum);  
 $("#sectionModal8").modal('hide'); 
} 

 
function gethydropneumaticlist(){ 
 $("#sectionModal8").modal();
} 

function getpumproomslistnew(){ 
 $("#sectionModal62pmp").modal();
} 

function closepmppopup(){
 var blnum = document.getElementById("pumprmc").value;
 $("#fire_pump_rooms").val(blnum);  
  $("#sectionModal62pmp").modal('hide'); 
} 
  
 function closepopuppostpaid(){
 var blnum = document.getElementById("postpaidc").value;
 $("#postpaidcval").val(blnum);  
 $("#sectionModal9").modal('hide'); 
} 

function closepbspopup(){
 var blnum = document.getElementById("pubadsy").value;
 $("#public_addressing_system").val(blnum);  
  $("#sectionModal62").modal('hide'); 
} 


function closepopup(){
 var blnum = document.getElementById("postpaidc").value;
 $("#blocks_num").val(blnum);   
 $("#sectionModal9").modal('hide');
} 
function getpostpaidmaint(){ 
$(".datetpickpop").datepicker({

        dateFormat: "dd-mm-yy",
  });
 $("#sectionModal9").modal();
   
}   
 
 
function closepopup(){

  /*var lifone = 0;
   var lifttwo = 0;
   
  lifone = document.getElementById("passenger_lifts").value;
   lifttwo = document.getElementById("service_lifts").value;
  if(lifone == ""){lifone = 0;}
  if(lifttwo == ""){lifttwo = 0;} 
  var intval = parseInt(lifone) + parseInt(lifttwo) */

 
  var a = 0;
    $(".liftscnval").each(function() {
	   if(parseInt($(this).val()) > 0) {
        a += parseInt($(this).val());
		}  
    });
	
	 $("#lifts").val(a); 
	  
  $("#sectionModal7").modal('hide');
} 
 
function getliftlist(){ 
 $("#sectionModal7").modal();
}   

function addFormField() {
		var id = document.getElementById("id").value;

		var feet = "";
		var cn = parseInt(id) + 1;

		if($("#feet").val()!=null) feet=$("#feet").val();   
		
		$("#divTxt").append("<div class='row wonderlaaa' id='row" + id + "' ><div class='col-xs-1 dunacinnumner1 number-weight'><label>"+parseInt(parseInt(id) + 1)+"</label></div><div class='col-xs-4 form-group'><input type='text' name='blockname[]' class='form-control getblocknum'></div><div class='col-xs-6 form-group'><select name='name_change_socity[]' class='form-control'><option value='Yes'>Yes</option><option value='No'>No</option><option value='N/A'>N/A</option></select></div><div class='col-sm-1 col-xs-1 enterthetedd'><a href='#' onClick='removeFormField(\"#row" + id + "\"); return false;' class='remove removerla'>X</a></div></div></div>");
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
	
	// TRANSFORMER
	
	function addtransFormField() {
		var id = document.getElementById("trans").value;

		var feet = "";
		var cn = parseInt(id) + 1;

		if($("#feet").val()!=null) feet=$("#feet").val();  
		
		
		$("#divTxttrans").append("<div class='row transofrmers' id='row" + id + "'><div class='col-sm-1 col-xs-1 form-group numbering'><span>"+parseInt( cn )+"</span></div><div class='col-sm-3 col-xs-3 form-group'><input type='text' name='transcapacity[]' class='form-control'/></div><div class='col-sm-2 col-xs-2 form-group'><input type='text' name='translocation[]' class='form-control'/></div><div class='col-sm-2 col-xs-2 form-group'><input type='text' name='transmake[]' class='form-control'/></div><div class='col-sm-3 col-xs-3 form-group'><input type='file' name='transfilename[]' class='form-control'/></div><div class='col-sm-1 col-xs-1'><a href='#' onClick='removetransFormField(\"#row" + id + "\"); return false;' class='remove removerla'>X</a></div></div>");
		
		
		id = parseInt(id) + 1;

		console.log('id: ', id);

		document.getElementById("trans").value = id;	

	}
	
	
	function removetransFormField(id) {

		$(id).remove(); 

		var id = document.getElementById("trans").value;

		id = (id - 1);

		document.getElementById("trans").value = id;

	}
	
	// POWER BACKUPS
	
	
	
	function addpwrbkpFormField() {
		var id = document.getElementById("pwrbkpc").value;

		var feet = "";
		var cn = parseInt(id) + 1;

		if($("#feet").val()!=null) feet=$("#feet").val();  
		
		
			$("#divTxtpwrbkp").append("<div class='row transofrmers solarpwrcls' id='row" + id + "'><div class='col-sm-1 col-xs-1 form-group numbering'><span>"+ parseInt( cn ) +"</span></div><div class='col-sm-2 col-xs-2 form-group'><input type='text' name='solarpwrcapacity[]' class='form-control'/> <input type='hidden' name='spid[]' value='0'></div><div class='col-sm-3 col-xs-3 form-group'><input type='text' name='solarpwrlocation[]' class='form-control'/></div><div class='col-sm-2 col-xs-2 form-group'><input type='text' name='solarpwrmake[]' class='form-control'/></div><div class='col-sm-3 col-xs-3 form-group'><input type='file' name='solarpwrfilename[]' class='form-control'/></div><div class='col-sm-1 col-xs-1'><a href='#' onClick='removepwrbkpFormField(\"#row" + id + "\"); return false;' class='remove removerla'>X</a></div></div>");
		
		
		id = parseInt(id) + 1;
 
		console.log('id: ', id);

		document.getElementById("pwrbkpc").value = id;	

	}
	
	
	function removepwrbkpFormField(id) {

		$(id).remove(); 

		var id = document.getElementById("pwrbkpc").value;

		id = (id - 1);

		document.getElementById("pwrbkpc").value = id;

	}

  // DGSETS
	
	function adddgsFormField() {
		var id = document.getElementById("dgsetsc").value;

		var feet = "";
		
		var cn = parseInt(id) + 1;

		if($("#feet").val()!=null) feet=$("#feet").val();  
		
		
		$("#divTxtdgs").append("<div class='row transofrmers' id='row" + id + "'><div class='col-sm-1 col-xs-1 form-group numbering'><span>"+ parseInt( cn ) +"</span></div><div class='col-sm-2 col-xs-2 form-group'><input type='text' name='dgcapacity[]' class='form-control'/></div><div class='col-sm-3 col-xs-3 form-group'><input type='text' name='dglocation[]' class='form-control'/></div><div class='col-sm-2 col-xs-2 form-group'><input type='text' name='dgmake[]' class='form-control'/></div><div class='col-sm-3 col-xs-3 form-group'><input type='file' name='dgfilename[]' class='form-control'/></div><div class='col-sm-1 col-xs-1'><a href='#' onClick='removedgsFormField(\"#row" + id + "\"); return false;' class='remove removerla'>X</a></div></div>");
		
		
		id = parseInt(id) + 1;

		console.log('id: ', id);

		document.getElementById("dgsetsc").value = id;	

	}
	
	
	function removedgsFormField(id) {

		$(id).remove(); 

		var id = document.getElementById("dgsetsc").value;

		id = (id - 1);

		document.getElementById("dgsetsc").value = id;

	}


//STP

	function addstpFormField() {
		var id = document.getElementById("stpc").value;

		var feet = "";
		var cn = parseInt(id) + 1;

		if($("#feet").val()!=null) feet=$("#feet").val();  
		
		
		$("#divTxtstp").append("<div class='row transofrmers' id='row" + id + "'><div class='col-sm-1 col-xs-1 form-group numbering'><span>"+parseInt( cn )+"</span></div><div class='col-sm-2 col-xs-2 form-group'><input type='text' name='stpphase[]' class='form-control'/></div><div class='col-sm-2 col-xs-2 form-group'><input type='text' name='stptechnology[]' class='form-control'/></div><div class='col-sm-2 col-xs-2 form-group'><input type='text' name='stpcapacity[]' class='form-control'/></div><div class='col-sm-1 col-xs-1 form-group'><input type='text' name='stpmake[]' class='form-control'/></div><div class='col-sm-3 col-xs-3 form-group'><input type='file' name='stpfilename[]' class='form-control'/></div><div class='col-sm-1 col-xs-1'><a href='#' onClick='removestpFormField(\"#row" + id + "\"); return false;' class='remove removerla'>X</a></div></div>");
		
		
		id = parseInt(id) + 1;
 
		console.log('id: ', id);

		document.getElementById("stpc").value = id;	

	}
	
	
	function removestpFormField(id) {

		$(id).remove(); 

		var id = document.getElementById("stpc").value;

		id = (id - 1);

		document.getElementById("stpc").value = id;

	}
	
	
	//WSP

	function addwspFormField() {
		var id = document.getElementById("wspc").value;

		var feet = "";
		
		var cn = parseInt(id) + 1;

		if($("#feet").val()!=null) feet=$("#feet").val();  
		
		
		$("#divTxtwsp").append("<div class='row transofrmers' id='row" + id + "'><div class='col-sm-1 col-xs-1 form-group numbering'><span>"+parseInt( cn )+"</span></div><div class='col-sm-2 col-xs-2 form-group'><input type='text' name='wspphase[]' class='form-control'/></div><div class='col-sm-2 col-xs-2 form-group'><input type='text' name='wspcapacity[]' class='form-control'/></div> <input type='hidden' name='ws_id[]' value='0'><div class='col-sm-2 col-xs-2 form-group'><input type='text' name='wspmake[]' class='form-control'/></div><div class='col-sm-4 col-xs-4 form-group'><input type='file' name='wspfilename[]' class='form-control'/></div><div class='col-sm-1 col-xs-1'><a href='#' onClick='removewspFormField(\"#row" + id + "\"); return false;' class='remove removerla'>X</a></div></div>");
		
		
		id = parseInt(id) + 1;

		console.log('id: ', id);

		document.getElementById("wspc").value = id;	

	}
	
	
	function removewspFormField(id) {

		$(id).remove(); 

		var id = document.getElementById("wspc").value;

		id = (id - 1);

		document.getElementById("wspc").value = id;

	}
	
	
	
		// ESP PHASE TWO
	
	
	
		function addwspphFormField() {
		var id = document.getElementById("wspcph").value;

		var feet = "";
		
		var cn = parseInt(id) + 1;

		if($("#feet").val()!=null) feet=$("#feet").val();  
		
		
		$("#divTxtwsp").append("<div class='row transofrmers' id='row" + id + "'><div class='col-sm-1 col-xs-1 form-group numbering'><span>"+parseInt( cn )+"</span></div><div class='col-sm-3 col-xs-3 form-group'><input type='text' name='wspphcapacity[]' class='form-control'/></div><div class='col-sm-3 col-xs-3 form-group'><input type='text' name='wspphmake[]' class='form-control'/></div><div class='col-sm-4 col-xs-4 form-group'><input type='file' name='wspphfilename[]' class='form-control'/></div><div class='col-sm-1 col-xs-1'><a href='#' onClick='removewspphFormField(\"#row" + id + "\"); return false;' class='remove removerla'>X</a></div></div>");
		
		
		id = parseInt(id) + 1;

		console.log('id: ', id);

		document.getElementById("wspcph").value = id;	

	}
	
	
	function removewspphFormField(id) {

		$(id).remove(); 

		var id = document.getElementById("wspcph").value;

		id = (id - 1);

		document.getElementById("wspcph").value = id;

	}
	
	 //GAS BANKS
	 
	 function addgasbFormField() {
		var id = document.getElementById("gasbc").value;

		var feet = "";

		if($("#feet").val()!=null) feet=$("#feet").val();  
		var cn = parseInt(id) + 1;
		
		
		$("#divTxtgasb").append("<div class='row transofrmers' id='row" + id + "'><div class='col-sm-1 col-xs-1 form-group numbering'><span>"+ parseInt( cn )+"</span></div><div class='col-sm-2 col-xs-2 form-group'><input type='text' name='gabankname[]' class='form-control'/></div><div class='col-sm-2 col-xs-2 form-group'><input type='text' name='galocation[]' class='form-control'/></div><div class='col-sm-2 col-xs-2 form-group'><input type='text' name='gacapacity[]' class='form-control'/></div><div class='col-sm-1 col-xs-1 form-group'><input type='text' name='gamake[]' class='form-control'/></div><div class='col-sm-3 col-xs-3 form-group'><input type='file' name='gafilename[]' class='form-control'/></div><div class='col-sm-1 col-xs-1'><a href='#' onClick='removestpFormField(\"#row" + id + "\"); return false;' class='remove removerla'>X</a></div></div>");
		
		 
		id = parseInt(id) + 1;

		console.log('id: ', id);

		document.getElementById("gasbc").value = id;	

	}
	
	
	function removestpFormField(id) {

		$(id).remove(); 

		var id = document.getElementById("gasbc").value;

		id = (id - 1);

		document.getElementById("gasbc").value = id;

	}
	
	
	// SOLAR WATER HEATERS
		function addsolarwhFormField() {
		var id = document.getElementById("solarwh").value;

		var feet = "";

		if($("#feet").val()!=null) feet=$("#feet").val();  
		var cn = parseInt(id) + 1;
		
		$("#divTxtsolarwh").append("<div class='row transofrmers' id='row" + id + "'><div class='col-sm-1 col-xs-1 form-group numbering'><span>"+ parseInt( cn )+"</span></div><div class='col-sm-3 col-xs-3 form-group'><input type='text' name='solarcapacity[]' class='form-control'/><input type='hidden' name='solid[]' value='0'/></div><div class='col-sm-4 col-xs-4 form-group'><input type='text' name='solarlocation[]' class='form-control'/></div><div class='col-sm-3 col-xs-3 form-group'><input type='text' name='solarmake[]' class='form-control'/></div><div class='col-sm-1 col-xs-1 form-group'><a href='#' onClick='removefirealFormField(\"#row" + id + "\"); return false;' class='remove removerla'>X</a></div></div>");
		
		
		
		
		id = parseInt(id) + 1;

		console.log('id: ', id);

		document.getElementById("solarwh").value = id;	

	}
	
	
	function removefirealFormField(id) {

		$(id).remove(); 

		var id = document.getElementById("solarwh").value;

		id = (id - 1);

		document.getElementById("solarwh").value = id;

	}
	
	// FIREALARAM SYATEM
	

		function addfirealaramadFormField() {
		var id = document.getElementById("firealsy").value;

		var feet = "";

		if($("#feet").val()!=null) feet=$("#feet").val();  
			var cn = parseInt(id) + 1;
		
		
		$("#divTxtfirealaramsy").append("<div class='row transofrmers' id='row" + id + "'><div class='col-sm-1 col-xs-1 form-group numbering'><span>"+parseInt( cn )+"</span></div><div class='col-sm-3 col-xs-3 form-group'><input type='text' name='faslocation[]' class='form-control'/></div><div class='col-sm-3 col-xs-3 form-group'><input type='text' name='fasmake[]' class='form-control'/></div><div class='col-sm-4 col-xs-4 form-group'><input type='file' name='fasfilename[]' class='form-control'/></div><div class='col-sm-1 col-xs-1'><a href='#' onClick='removefirealFormField(\"#row" + id + "\"); return false;' class='remove removerla'>X</a></div></div>");
		
		
		id = parseInt(id) + 1;

		console.log('id: ', id);

		document.getElementById("firealsy").value = id;	

	}
	
	
	function removefirealFormField(id) {

		$(id).remove(); 

		var id = document.getElementById("firealsy").value;

		id = (id - 1);

		document.getElementById("firealsy").value = id;

	}
	
		// FLOW ANNOUNCIATOR ZONES
	
	
	

		function addflowanadFormField() {
		var id = document.getElementById("flowann").value;

		var feet = "";

		if($("#feet").val()!=null) feet=$("#feet").val();  
			var cn = parseInt(id) + 1;
		
		
		$("#divTxtflwannsy").append("<div class='row transofrmers' id='row" + id + "'><div class='col-sm-1 col-xs-1 form-group numbering'><span>"+parseInt( cn )+"</span></div><div class='col-sm-2 col-xs-2 form-group'><input type='text' name='faslocation[]' class='form-control'/></div><div class='col-sm-2 col-xs-2 form-group'><input type='text' name='fasmake[]' class='form-control'/></div><div class='col-sm-2 col-xs-2 form-group'><input type='text' name='flowanzone[]' class='form-control'/></div><div class='col-sm-4 col-xs-4 form-group'><input type='file' name='fasfilename[]' class='form-control'/></div><div class='col-sm-1 col-xs-1'><a href='#' onClick='removeflzFormField(\"#row" + id + "\"); return false;' class='remove removerla'>X</a></div></div>");
		
		  
		id = parseInt(id) + 1;

		console.log('id: ', id);

		document.getElementById("flowann").value = id;	

	}
	
	
	function removeflzFormField(id) {

		$(id).remove(); 

		var id = document.getElementById("flowann").value;

		id = (id - 1);

		document.getElementById("flowann").value = id;

	}
	
	// BOOM BARIER
	
	
	
			function addboombarFormField() {
		var id = document.getElementById("bmbar").value;

		var feet = "";

		if($("#feet").val()!=null) feet=$("#feet").val();  
			var cn = parseInt(id) + 1;
		
		
		$("#divTxtbmbr").append("<div class='row transofrmers' id='row" + id + "'><div class='col-sm-1 col-xs-1 form-group numbering'><span>"+parseInt( cn )+"</span></div><div class='col-sm-4 col-xs-4 form-group'><input type='text' name='bmbrlocation[]' class='form-control'/></div><div class='col-sm-3 col-xs-3 form-group'><input type='text' name='bmbrmake[]' class='form-control'/></div><div class='col-sm-3 col-xs-3 form-group'><input type='text' name='bmbrlength[]' class='form-control'/></div><div class='col-sm-1 col-xs-1'><a href='#' onClick='removebmbrFormField(\"#row" + id + "\"); return false;' class='remove removerla'>X</a></div></div>");
		
		  
		id = parseInt(id) + 1;

		console.log('id: ', id);

		document.getElementById("bmbar").value = id;	

	}
	
	
	function removebmbrFormField(id) {

		$(id).remove(); 

		var id = document.getElementById("bmbar").value;

		id = (id - 1);

		document.getElementById("bmbar").value = id;

	}
	
	
	//Public Addressing System
	
	
	function addpubadFormField() {
		var id = document.getElementById("pubadsy").value;

		var feet = "";

		if($("#feet").val()!=null) feet=$("#feet").val();  
			var cn = parseInt(id) + 1;
		
		
		$("#divTxtpubadsy").append("<div class='row transofrmers' id='row" + id + "'><div class='col-sm-1 col-xs-1 form-group numbering'><span>"+ parseInt( cn )+"</span></div><div class='col-sm-3 col-xs-3 form-group'><input type='text' name='pbalocation[]' class='form-control'/><input type='hidden' name='pbaid[]' value='0'></div><div class='col-sm-3 col-xs-3 form-group'><input type='text' name='pbamake[]' class='form-control'/></div><div class='col-sm-4 col-xs-4 form-group'><input type='file' name='pbafilename[]' class='form-control'/></div><div class='col-sm-1 col-xs-1'><a href='#' onClick='removepublicaddFormField(\"#row" + id + "\"); return false;' class='remove removerla'>X</a></div></div>");
		
		  
		id = parseInt(id) + 1;

		console.log('id: ', id);

		document.getElementById("pubadsy").value = id;	

	}
	
	
	function removepublicaddFormField(id) {

		$(id).remove(); 

		var id = document.getElementById("pubadsy").value;

		id = (id - 1);

		document.getElementById("pubadsy").value = id;

	}
	
	
	
	
	
	// POSTPAID
	

	 function addpostpaidFormField() {
		var id = document.getElementById("postpaidc").value;

		var feet = "";

		if($("#feet").val()!=null) feet=$("#feet").val();  
			var cn = parseInt(id) + 1;
		
	$("#postpaiddiv").append("<div class='row pumnphysro postpaidmaint' id='row" + id + "'><div class='col-sm-1 col-xs-1 form-group numbering'><label>"+parseInt( cn )+"</label></div><div class='col-sm-5 col-xs-5 form-group'><input type='text'  name='post_start_date[]' class='form-control datetpickpop'  /></div><div class='col-sm-5 col-xs-5 form-group'><input type='text' name='post_end_date[]' class='form-control datetpickpop' /></div><div class='col-sm-1 col-xs-1'><a href='#' onClick='removepostpaidFormField(\"#row" + id + "\"); return false;' class='remove removerla'>X</a></div></div>" );
		
		
		  
		$(".datetpickpop").datepicker({

        dateFormat: "dd-mm-yy",
  });
		
		id = parseInt(id) + 1;

		console.log('id: ', id);

		document.getElementById("postpaidc").value = id;	

	}
	
	
	function removepostpaidFormField(id) {

		$(id).remove(); 

		var id = document.getElementById("postpaidc").value;

		id = (id - 1);

		document.getElementById("postpaidc").value = id;

	}
	
	
	
		//Pump Rooms System
	
	
	function addpmpadFormField() {
		var id = document.getElementById("pumprmc").value;

		var feet = "";

		if($("#feet").val()!=null) feet=$("#feet").val();  
			var cn = parseInt(id) + 1;
		
		
		$("#divTxtpumprmsy").append("<div class='row transofrmers' id='row" + id + "'><div class='col-sm-1 col-xs-1 form-group numbering'><span>"+ parseInt( cn )+"</span></div><div class='col-sm-2 col-xs-2 form-group'><input type='text' name='pmplocation[]' class='form-control'/></div><div class='col-sm-2 col-xs-2 form-group'><input type='text' name='jockey[]' class='form-control'/></div><div class='col-sm-2 col-xs-2 form-group'><input type='text' name='main[]' class='form-control'/></div><div class='col-sm-2 col-xs-2 form-group'><input type='text' name='dg[]' class='form-control'/></div><div class='col-sm-2 col-xs-2 form-group'><input type='text' name='booster[]' class='form-control'/></div><div class='col-sm-1 col-xs-1'><a href='#' onClick='removepumpaddFormField(\"#row" + id + "\"); return false;' class='remove removerla'>X</a></div></div>");
		
		
		id = parseInt(id) + 1;

		console.log('id: ', id);

		document.getElementById("pumprmc").value = id;	

	}
	
	
	function removepumpaddFormField(id) {

		$(id).remove(); 

		var id = document.getElementById("pumprmc").value;

		id = (id - 1);

		document.getElementById("pumprmc").value = id;

	}
	
	
	
	// LIFTS
	
	
		 function addliftsFormField() {
		var id = document.getElementById("liftsc").value;

		var feet = "";
             var vid = parseInt(id) + 1;
		if($("#feet").val()!=null) feet=$("#feet").val();  
		
		$("#divTxtlifts").append("<div class='row pumnphysro reolistsinfo' id='row" + id + "'><div class='col-sm-1 col-xs-1 form-group numbering'><label>"+ parseInt(vid)+"</label></div><div class='col-sm-3 col-xs-3 form-group'><input type='text' name='lift_num[]' class='form-control  liftscnval'  /></div><div class='col-sm-4 col-xs-4 form-group'><input type='text'  class='form-control '  name='make[]' /></div><div class='col-sm-3 col-xs-3 form-group'><input type='text'  name='type[]' class='form-control ' /></div><div class='col-sm-1 col-xs-1'><a href='#' onClick='removeliftsFormField(\"#row" + id + "\"); return false;' class='remove removerla'>X</a></div></div>" );
		
		  
		$(".datetpickpop").datepicker({

        dateFormat: "dd-mm-yy",
  });
		
		id = parseInt(id) + 1;

		console.log('id: ', id);

		document.getElementById("liftsc").value = id;	

	}
	
	
	function removeliftsFormField(id) {

		$(id).remove(); 

		var id = document.getElementById("liftsc").value;

		id = (id - 1);

		document.getElementById("liftsc").value = id;

	}
	
	
	// HYDRO WATER PUMPS
	
		
		 function addhydrpFormField() {
		var id = document.getElementById("hydroc").value;

		var feet = "";
             var vid = parseInt(id) + 1;
		if($("#feet").val()!=null) feet=$("#feet").val();  
		
		$("#divTxthydro").append("<div class='row pumnphysro pumping-system' id='row" + id + "'><div class='col-sm-1 col-xs-1 numbering'><span>2</span></div><div class='col-sm-2 col-xs-2 form-group numbering'><input type='text'  class='form-control' name='num_of_pumps[]'  /><input type='hidden' name='hy_id[]' value='0'></div><div class='col-sm-2 col-xs-2 form-group'><input type='text'  class='form-control' name='hydromake' /></div><div class='col-sm-3 col-xs-3 form-group'><input type='text' name='hydrocapacity[]' class='form-control '  /></div><div class='col-sm-3 col-xs-3 form-group'><input type='file' name='hydrofilename[]' class='form-control'/></div><div class='col-sm-1 col-xs-1'><a href='#' onClick='removeliftsFormField(\"#row" + id + "\"); return false;' class='remove removerla'>X</a></div></div>" );
		
		  
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
 <script>
  function setblocknum(sel){
     if(sel == 'Yes'){
	    $("#numblocksdiv").show();
	 }else
	 {
	    $("#numblocksdiv").hide();
	 }
  }
  
  function setfloornum(sel){
     if(sel == 'Yes'){
	    $("#numfloordiv").show();
	 }else
	 {
	    $("#numfloordiv").hide();
	 }
  }
  
  
  function changecertified(val){
     if(val == 'Yes'){
	   $("#rating_block").show();
	 }else{
	    $("#rating_block").hide();
	 }
  }
    function postpaidtextnum(sel){
     if(sel == 'Yes'){
	    $("#numpostpaiddiv").show();
	 }else
	 {
	    $("#numpostpaiddiv").hide();
	 }
  }
  
  function flattypefn(fval){
     if(fval == ''){
	    $("#villasblock").hide();
	   $("#flatsblock").hide();
	   $("#flatgroupblock").hide();
	   
	 }
     else if(fval == 'flats'){
	   $("#villasblock").hide();
	   $("#flatsblock").show();
	    $("#flatgroupblock").show();
	   
	 }else{
	    $("#villasblock").show();
	   $("#flatsblock").hide();
	   $("#flatgroupblock").hide();
	 }
	 
  }
  
 function basementtext(fval){
     if(fval == ''){
	   $("#numofbasementdiv").hide();
	 }
	  else if(fval == 'Yes'){
	  $("#numofbasementdiv").show();
	  }else{
	  $("#numofbasementdiv").hide();
	  }
}

 function solarpwrtext(fval){
     if(fval == ''){
	   $("#solartextblock").hide();
	 }
	  else if(fval == 'Yes'){
	  $("#solartextblock").show();
	  }else{
	  $("#solartextblock").hide();
	  }
}

 function helipadchange(fval){
     if(fval == ''){
	   $("#helipadblock").hide();
	 }
	  else if(fval == 'Yes'){
	  $("#helipadblock").show();
	  }else{
	  $("#helipadblock").hide();
	  }
}
function municipalwat(fval){
     if(fval == ''){
	   $("#contractkldiv").hide();
	 }
	  else if(fval == 'Yes'){
	  $("#contractkldiv").show();
	  }else{
	  $("#contractkldiv").hide();
	  }
}

function hydonumabl(fval){
     if(fval == ''){
	   $("#hydronumablock").hide();
	 }
	  else if(fval == 'Yes'){
	  $("#hydronumablock").show();
	  }else{
	  $("#hydronumablock").hide();
	  }
}

function solar_heattext(fval){
     if(fval == ''){
	   $("#solarblock").hide();
	 }
	  else if(fval == 'Yes'){
	  $("#solarblock").show();
	  }else{
	  $("#solarblock").hide();
	  }
}



function stpdisplay(fval){
     if(fval == ''){
	   $("#stpphaseone").hide();
	   $("#stpphasetwo").hide();
	 }  
	  else if(fval == '1'){
	  $("#stpphaseone").show();
	   $("#stpphasetwo").hide();
	  }else if(fval == '2'){
	  $("#stpphaseone").show();
	  $("#stpphasetwo").show();
	  }
}

function wspdisplay(fval){
     if(fval == ''){
	   $("#wspphaseone").hide();
	   $("#wspphasetwo").hide();
	 }  
	  else if(fval == '1'){
	  $("#wspphaseone").show();
	   $("#wspphasetwo").hide();
	  }else if(fval == '2'){
	  $("#wspphaseone").show();
	  $("#wspphasetwo").show();
	  }
}


 
function subform()

{

	var flag = true;
	
	if(($("#proname").val().length <= 0)){
	flag = false;
	  $("#proname").addClass("erroremp");
       }
	   else{
	    $("#proname").removeClass("erroremp");
	   }
	   if(($("#procode").val().length <= 0)){
	flag = false;
	 $("#procode").addClass("erroremp");
       }
	   else{
	      $("#procode").removeClass("erroremp");
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

