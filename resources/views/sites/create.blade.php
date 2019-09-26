@extends('layouts.app')

@section('content')
<style>
.erroremp{
 border: 2px solid red;
}


</style>
  <!--  <h3 class="page-title">Sites</h3>-->
  <div class="panel panel-default panelmar tsas-crseations communities-sited">
    {!! Form::open(['files' => 'true','method' => 'POST', 'route' => ['sites.store'],'onsubmit' =>"return subform()"]) !!}

    <div class="panel-heading">
        Communities
        <a href="{{ route('sites.index') }}" class="btn green-back" style="float:right;">Back</a>
    </div>
        
<div class="panel-body site-seeing">
<!----------------project------------------->       
    <div class="row communitybackground project">
        <div class="col-xs-3 form-group">
            {!! Form::label('scode', 'Project Code', ['class' => 'control-label']) !!}
            {!! Form::text('scode', old('scode'), ['class' => 'form-control', 'placeholder' => '', 'id'=> 'procode']) !!}
            <p class="help-block"></p>
            @if($errors->has('scode'))
                <p class="help-block">
                    {{ $errors->first('scode') }}
                </p>
            @endif 
        </div> 
   
        <div class="col-xs-6 form-group">
            {!! Form::label('name', 'Project Name', ['class' => 'control-label']) !!}
            {!! Form::text('name', old('name'), ['class' => 'form-control', 'id'=> 'proname', 'placeholder' => '']) !!}
            <p class="help-block"></p>
            @if($errors->has('name'))
                <p class="help-block">
                    {{ $errors->first('name') }}
                </p>
            @endif
        </div> 
        <div class="col-xs-3 form-group">
           <label class="control-label">Logo</label>
           <input type="file" class="form-control" name="logoimage"  />
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
            <label class="col-sm-12 col-xs-12 emptyu">&nbsp;</label>
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
           <option value="Yes">Yes</option>
           <option value="No">No</option> 
        </select>
        <?php /*?>{!! Form::text('floors_num', old('floors_num'), ['class' => 'form-control', 'placeholder' => '']) !!}
        <p class="help-block"></p>
        @if($errors->has('floors_num'))
            <p class="help-block">
                {{ $errors->first('floors_num') }}
            </p>
        @endif<?php */?>
        </div>
         <div class="col-sm-1 form-group floors-text" id="numpostpaiddiv" style="display:none">
            <label>&nbsp;</label>
            {!! Form::text('postpaid_numtext', old('postpaid_numtext'), ['class' => 'form-control', 'id'=>'postpaidcval','placeholder' => '','onfocus' =>'getpostpaidmaint()']) !!}
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
                   <option value="Yes">Yes</option>
                   <option value="No">No</option>
               </select>
            </div>
            <div class="col-sm-2 form-group" id="rating_block" style="display:none">
               <label class="control-label">Rating</label>
               <select class="form-control" name="rating">
                   <option value="">Select</option>
                   <option value="Platinum">Platinum</option>
                   <option value="Gold">Gold</option>
                   <option value="Silver">Silver</option>
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
            {!! Form::label('built_up_area', 'Built-up Area', ['class' => 'control-label']) !!}
            {!! Form::text('built_up_area', old('built_up_area'), ['class' => 'form-control', 'placeholder' => '']) !!}
            <p class="help-block"></p>
            @if($errors->has('built_up_area'))
                <p class="help-block">
                    {{ $errors->first('built_up_area') }}
                </p>
            @endif
        </div>
         <div class="col-sm-2 form-group saleable-area">
            {!! Form::label('scalablearea', 'Saleable Area', ['class' => 'control-label']) !!}
            {!! Form::text('scalablearea', old('scalablearea'), ['class' => 'form-control', 'placeholder' => '']) !!}
            <p class="help-block"></p>
            @if($errors->has('scalablearea'))
                <p class="help-block">
                    {{ $errors->first('scalablearea') }}
                </p>
            @endif
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
               <option value="flats">Flats</option>
               <option value="villas">Villas</option>
           </select>
        </div>
     
          <div class="col-sm-2 form-group flats-villas" id="villasblock" style="display:none">
            {!! Form::label('num_of_vallas', 'No.of Villas', ['class' => 'control-label']) !!}
            {!! Form::text('num_of_vallas', old('num_of_vallas'), ['class' => 'form-control', 'placeholder' => '']) !!}
            <p class="help-block"></p>
            @if($errors->has('num_of_flats'))
                <p class="help-block">
                    {{ $errors->first('num_of_flats') }}
                </p>
            @endif
        </div>
    
        <div class="col-sm-2 form-group flats-villas" id="flatsblock" style="display:none">
            {!! Form::label('num_of_flats', 'No. of Flats', ['class' => 'control-label']) !!}
            {!! Form::text('num_of_flats', old('num_of_flats'), ['class' => 'form-control', 'id'=> 'num_of_flatsnum', 'placeholder' => '', 'onfocus' => 'getflatslist()']) !!}
            <p class="help-block"></p>
            @if($errors->has('num_of_flats'))
                <p class="help-block">
                    {{ $errors->first('num_of_flats') }}
                </p>
            @endif
    	</div>
        <div  id="flatgroupblock" style="display:none">
           <div class="col-sm-2 form-group">
            {!! Form::label('blocks_num', 'No. of Blocks', ['class' => 'control-label']) !!}
             <select class="form-control" name="blocks_num" onchange="setblocknum(this.value);">
             <option value="">Please Select</option>
               <option value="Yes">Yes</option>
               <option value="No">No</option> 
            </select>
           <?php /*?> {!! Form::text('blocks_num', old('blocks_num'), ['class' => 'form-control', 'placeholder' => '', 'onchange' => 'getblockslist()']) !!}
            <p class="help-block"></p>
            @if($errors->has('blocks_num'))
                <p class="help-block">
                    {{ $errors->first('blocks_num') }}
                </p> 
            @endif<?php */?>
        </div>
          <div class="col-sm-1 form-group" style="display:none" id="numblocksdiv">
            <label>&nbsp;</label>
            {!! Form::text('num_of_blocks_text', old('num_of_blocks_text'), ['class' => 'form-control', 'id' => 'num_of_blocks_text', 'placeholder' => 'Blocks Num', 'onfocus' => 'getblockslist()']) !!}
        </div>
    
    
       <div class="col-sm-2 form-group floors">
        {!! Form::label('floors_num', 'No. of Floors', ['class' => 'control-label']) !!}
          <select class="form-control" name="num_of_floors" onchange="setfloornum(this.value);">
          <option value="">Please Select</option>
           <option value="Yes">Yes</option>
           <option value="No">No</option> 
        </select>
        <?php /*?>{!! Form::text('floors_num', old('floors_num'), ['class' => 'form-control', 'placeholder' => '']) !!}
        <p class="help-block"></p>
        @if($errors->has('floors_num'))
            <p class="help-block">
                {{ $errors->first('floors_num') }}
            </p>
        @endif<?php */?>
    </div>
     <div class="col-sm-1 form-group floors-text" id="numfloordiv" style="display:none">
        <label>&nbsp;</label>
        {!! Form::text('num_of_floors_text', old('num_of_floors_text'), ['class' => 'form-control', 'placeholder' => '']) !!}
    </div>
    </div>
    
    <div class="col-sm-2 form-group">
       <label>Basement </label> 
       <select class="form-control" name="basement_one" onchange="basementtext(this.value)">
        <option value="">Please select</option>
           <option value="Yes">Yes</option>
           <option value="No">No</option>
           <option value="NA">NA</option>
        </select>
    </div>
      <div class="col-sm-1 form-group floors-text" id="numofbasementdiv" style="display:none">
        <label>&nbsp;</label>
        {!! Form::text('basement_text', old('basement_text'), ['class' => 'form-control', 'placeholder' => '']) !!}
    </div>
 </div>
<!----------------flats-villas-------------------> 	             
<!----------------landscape-------------------> 	             
   <div class="row communitybackground1 helicopert">
          <div class="col-sm-2 form-group hardlandscape-area">
           <label>Hardlandscape Area</label>
          {!! Form::text('hard_land_scpae_area', old('hard_land_scpae_area'), ['class' => 'form-control', 'placeholder' => '']) !!}
        </div>
        <div class="col-sm-2 form-group">
           <label>Softlandscape Area</label>
        {!! Form::text('soft_land_scpae_area', old('soft_land_scpae_area'), ['class' => 'form-control', 'placeholder' => '']) !!}
       </div>
    
     <div class="col-sm-2 form-group helopasd">
        {!! Form::label('helipad_area', 'Helipad Area', ['class' => 'control-label']) !!}
         <select class="form-control" name="helipad" onchange="helipadchange(this.value);">
           <option  value="">Please Select</option>
           <option  value="Yes">Yes</option>
           <option  value="No">No</option>
        </select>
       <?php /*?> {!! Form::text('helipad_area', old('helipad_area'), ['class' => 'form-control', 'placeholder' => '']) !!}
        <p class="help-block"></p>
        @if($errors->has('helipad_area'))
            <p class="help-block">
                {{ $errors->first('helipad_area') }}
            </p>
        @endif<?php */?>
    </div>
     <div id="helipadblock" style="display:none;">
          <div class="col-sm-2 form-group" id="" >
            {!! Form::label('radius', 'Radius', ['class' => 'control-label']) !!}
          
            {!! Form::text('helipad_text', old('helipad_text'), ['class' => 'form-control', 'placeholder' => '']) !!}
        </div>
        <div class="col-sm-3 form-group">
            <label>&nbsp;</label>
            <input type="file" class="form-control" name="helippad_file"  />
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
           <label class="control-label">Borewells</label>
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
           <option value="Yes">Yes</option>
           <option value="No" <?php echo "selected='selected'"; ?>>No</option> 
        </select>
         </div>
     <div class="col-sm-2" id="solarblock" style="display:none;"> 
        <label class="control-label empty">&nbsp;</label>
        {!! Form::text('solar_water_heat_text', old('solar_water_heat_text'), ['class' => 'form-control', 'placeholder' => '', 'id'=>'solar_water_heat_text',  'onfocus' => 'getsolarblockList()']) !!}
    </div>
 </div>
<!----------------rainwater-harvesting------------------->
<!----------------bms------------------->             
  <div class="row communitybackground1 group-elevators1">  
        <div class="col-sm-3 form-group bms-group">
            <label class="control-label bms">BMS</label>
            <label class="col-sm-12 col-xs-12 prepaid-systeme">Prepaid  Systems</label>
            <ul>
               <li><input type="checkbox" name="bms_prepaid[]" value="Electricity" /> Electricity </li>
               <li><input type="checkbox" name="bms_prepaid[]" value="Recticulated Gas system" /> Recticulated Gas system</li>
               <li><input type="checkbox" name="bms_prepaid[]"  value="Water"/> Water </li>
            </ul>
       </div>
  
        <div class="col-sm-3 form-group bms-group">
            <label class="col-sm-12 col-xs-12 emptyu">&nbsp;</label>
            <label class="col-sm-12 col-xs-12 postapsis-system"> PostPaid Systems</label>
            <ul>
               <li><input type="checkbox" name="bms_postpaid[]" value="Electricity" /> Electricity </li>
               <li><input type="checkbox" name="bms_postpaid[]" value="Recticulated Gas system" /> Recticulated Gas system</li>
               <li><input type="checkbox" name="bms_postpaid[]"  value="Water"/> Water </li>
            </ul>
       </div>
       <div class="col-sm-2 irrigation-system">
           <label class="col-sm-12 col-xs-12 emptyu">&nbsp;</label>
           <label class="control-label">Irrigation System </label>
           <select class="form-control" name="bms_irrigation_sys">
               <option value="Auto">Auto</option>
               <option value="Manual">Manual</option>
           </select>
       </div>
 </div>
<!----------------bms------------------->      
<!----------------electrical-distributionsystem------------------->              
<div class="row communitybackground electical-distribution-sustem">
   <label class="col-sm-12 col-xs-12 control-label sidtrinution">Electrical Distribution System</label>
   <div class="col-sm-2 form-group">
       <label class="control-label">Contracted MD (KVA/HP)</label>
       <input type="text" class="form-control" name="contracted_md"  />
   </div>
    <div class="col-sm-2 form-group">
       <label class="control-label">Specified Voltage(KV)</label>
       <input type="text" class="form-control"  name="specified_voltage" />
   </div>
   <div class="col-sm-2 form-group">
       <label class="control-label">Actual Voltage(KV)</label>
       <input type="text" class="form-control"  name="actuval_voltage" />
   </div>
   <div class="col-sm-2 form-group">
       <label class="control-label">Feeder</label>
       <input type="text" class="form-control"  name="feeder" />
   </div>
   <div class="col-sm-2 form-group">
       <label class="control-label">Category</label>
       <input type="text" class="form-control"  name="category" />
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
        {!! Form::text('dgsets', old('dgsets'), ['class' => 'form-control', 'placeholder' => '', 'id'=>'dscetscnval', 'onfocus' => 'getdgsetslist()']) !!}
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
       <option value="Yes">Yes</option>
       <option value="No" <?php echo "selected='selected'"; ?>>No</option> 
    </select>
   <?php /*?> {!! Form::text('solar_power', old('solar_power'), ['class' => 'form-control', 'placeholder' => '']) !!}
    <p class="help-block"></p>
    @if($errors->has('solar_power'))
        <p class="help-block">
            {{ $errors->first('solar_power') }}
        </p>
    @endif<?php */?>
  </div>
     <div class="col-sm-2 form-group solar-powert-text" style="display:none;" id="solartextblock">
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
           <option value="Yes">Yes</option>
           <option value="No" <?php echo "selected='selected'"; ?>>No</option> 
    	</select>
    </div>
    
    <div class="col-sm-2 form-group water-muncicipat" id="contractkldiv" style="display:none;">
       <label class="control-label">Contracted (KL)</label>
         {!! Form::text('contracted_kl', old('contracted_kl'), ['class' => 'form-control', 'placeholder' => '']) !!}
    </div>
    
     <div class="col-sm-2 form-group wsp"  id="wspphaseone">
        {!! Form::label('wsp', 'WSP', ['class' => 'control-label']) !!}
        {!! Form::text('wsp', old('wsp'), ['class' => 'form-control', 'id'=> 'wsp', 'placeholder' => '','onfocus' => 'getwsplist()']) !!}
        <p class="help-block"></p>
        @if($errors->has('wsp'))
            <p class="help-block">
                {{ $errors->first('wsp') }}
            </p>
        @endif
    </div> 
  
   <div class="col-sm-2 form-group stp" id="stpphaseone">
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
           <label> Number of Pumps</label>
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
           <label>Number of Pumps</label>
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
          <label>Number of Pumps</label> 
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
      <label class="control-label">Smoke Dectectors</label>
       {!! Form::text('smoke', old('smoke'), ['class' => 'form-control', 'placeholder' => '']) !!}
     </div>
       <div class="col-sm-3 form-group no-file-chosen">
          <label class="control-label emptyu">&nbsp;</label>
          <input type="file" class="form-control"  name="smoke_image" />
      </div>
       <div class="col-sm-2 form-group">
          <label class="control-label">Heat Dectectors</label>
            {!! Form::text('heat', old('heat'), ['class' => 'form-control', 'placeholder' => '']) !!}
      </div>
       <div class="col-sm-3 form-group no-file-chosen">
          <label class="control-label emptyu">&nbsp;</label>
          <input type="file" class="form-control"  name="heat_image" />
      </div>
        <div class="col-sm-2 form-group fire-pump-hosese">
        {!! Form::label('fire_pump_rooms', 'Fire Pump Rooms', ['class' => 'control-label']) !!}
        {!! Form::text('fire_pump_rooms', old('fire_pump_rooms'), ['class' => 'form-control', 'placeholder' => '', 'id' => 'fire_pump_rooms',  'onfocus' => 'getpumproomslistnew()']) !!}
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
       <label class="col-sm-12 col-xs-12  control-label security">Security</label>
       <div class="col-sm-2 form-group boom-barrier">
           <label class="col-sm-12 boom-barriererr">Boom Barrier</label>
           <label class="col-sm-12 col-xs-12 emptyu">&nbsp;</label>
           {!! Form::text('boombarier_meter', old('boombarier_meter'), ['class' => 'form-control', 'placeholder' => '','id'=>'boombarier_meter','onfocus' => 'getboombarrierlist()']) !!}
       </div>

       
        <div class="col-sm-2 form-group cctv">
           <label class="col-sm-12 col-xs-12 cctn">CCTV</label>
           <label class="col-sm-12 col-xs-12 number">Total Numbers</label>
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
        <div class="col-sm-2 form-group length">
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
        		        
        </div>
 
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
            id="favoritesModalLabel">Blocks</h4>
          </div>
          <div class="modal-body blockoverhead">
          
       
             <div class="row">
                <div class="col-xs-2 xnooo">
                    <label>S.No</label>
                </div>
			    <div class="col-xs-4 blokalaname">
                 	<label>Name of the Block</label>
                </div>
                 <div class="col-xs-6 name-sociter-changed">
                	 <label>Name Changed to Society </label>
                </div>
                <div class="col-xs-1 dunacinnumner number-weight">
                     <label>1</label>
                </div>
                <div class="col-xs-4 form-group"> 
                    {!! Form::text('blockname[]', '', ['class' => 'form-control getblocknum',  'placeholder' => '']) !!}
                </div>
                <div class="col-xs-6 form-group"><select name="name_change_socity[]" class="form-control">
				<option value="Yes">Yes</option>
				<option value="No">No</option>
				<option value="N/A">N/A</option>
				</select>
                </div>   
                 <a href="#" onclick="addFormField(); return false;" class="adding-more" style="font-weight:bold; font-size:21px; color:#0b1cff; text-decoration:none; text-align:center;display:inline-block;width:auto;position:relative;">+</a></div>
                        <div id="divTxt" class="row"> 

                       	</div>  
             
           </div>   
          
          <div class="modal-footer">
            <button type="button" 
              class="btn btn-default btn-closse" data-dismiss="modal"  onclick="closeblockspopup();">Submit</button>
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
                    <input type="text" name="onebhk" class="form-control faltsnb"  /> 
                 </div>      
             </div>
              <div class="row">
                 <div class="col-sm-3 col-xs-3 form-group two-check">
                   2BHK
                 </div> 
                  <div class="col-sm-9 col-xs-9  form-group">
                    <input type="text" name="twobhk" class="form-control faltsnb"  /> 
                 </div>      
             </div>
              <div class="row">
                 <div class="col-sm-3 col-xs-3 form-group three-check">
                    3BHK
                 </div> 
                  <div class="col-sm-9 col-xs-9 form-group">
                    <input type="text" name="threebhk" class="form-control faltsnb"  /> 
                 </div>      
             </div>
              <div class="row">
                 <div class="col-sm-3 col-xs-3 form-group four-check">
                     4BHK
                 </div> 
                  <div class="col-sm-9 col-xs-9 form-group">
                    <input type="text" name="fourbhk" class="form-control faltsnb"  /> 
                 </div>      
             </div>
              <div class="row">
                 <div class="col-sm-3 col-xs-3 form-group five-check">
                   5BHK
                 </div> 
                  <div class="col-sm-9 col-xs-9 form-group">
                    <input type="text" name="fivebhk" class="form-control faltsnb"  /> 
                 </div>      
             </div>
           </div>   
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-closse" data-dismiss="modal"  onclick="closemodel1popup();">Submit</button>
          </div>
        </div>
    </div>
</div>

 <?php  $trans=0; ?>
    <input type="hidden" id="trans" value="<?php echo ++$trans; ?>">
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
             <div class="row transofrmers transormlistviews">
                 <div class="col-sm-1 col-xs-1 form-group numbering">
                     <label>S.No</label><br />
                     <span>1</span>
                 </div>
                 <div class="col-sm-2 col-xs-2 form-group">
                     <label>Capacity</label>
                     <input type="text" class="form-control" name="transcapacity[]"  />
              </div>
			   <div class="col-sm-2 col-xs-2 form-group">
                     <label>Location</label>
                     <input type="text" class="form-control" name="translocation[]"  />
              </div>
			   <div class="col-sm-2 col-xs-2 form-group">
			    <label>	Make</label>
                     <input type="text" class="form-control" name="transmake[]"  />
              </div>
              <div class="col-sm-4 col-xs-4 form-group">
                   <label>Browse</label>
                   <input type="file" class="form-control" name="transfilename[]"   />
              </div>
              <div class="col-sm-1 col-xs-1">
			  <a href="#" onclick="addtransFormField(); return false;" class="adding-more" style="font-weight:bold; font-size:21px; color:#0b1cff; text-decoration:none; text-align:center;display:inline-block;width:auto;">+</a></div>
           </div>   
                        <div id="divTxttrans"> 

                       	</div>  
                </div>
          <div class="modal-footer" style="overflow:hidden;">
            <button type="button" class="btn btn-default btn-closse" data-dismiss="modal"  onclick="closetranspopup();">Submit</button>
          </div>
        
    </div>
</div>
</div>
 <?php  $dgsetsc=0; ?>
    <input type="hidden" id="dgsetsc" value="<?php echo ++$dgsetsc; ?>">

<div class="modal fade whatwhlll" id="sectionModal3" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
      <div class="modal-dialog tempcreat-popbox transformercapacity dgscapacitysd" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close clsepopup" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title bloskinformation" id="favoritesModalLabel">DG Sets</h4>
          </div>
          <div class="modal-body blockoverhead">
             <div class="row transofrmers dg-teransfermers">
                 <div class="col-sm-1 col-xs-1 form-group numbering">
                     <label>S.No</label><br />
                     <span>1</span>
                 </div>
                 <div class="col-sm-2 col-xs-2 form-group">
                     <label>Capacity</label>
                     <input type="text" class="form-control" name="dgcapacity[]"  />
              </div>
			   <div class="col-sm-2 col-xs-2 form-group">
                     <label>Location</label>
                     <input type="text" class="form-control" name="dglocation[]"  />
              </div>
			    <div class="col-sm-2 col-xs-2 form-group">
			    <label>	Make</label>
                     <input type="text" class="form-control" name="dgmake[]"  />
              </div>
              <div class="col-sm-4 col-xs-4 form-group">
                   <label>Browse</label>
                   <input type="file" class="form-control"  name="dgfilename[]"   />
              </div>
              <div class="col-sm-1">
			  <a href="#" onclick="adddgsFormField(); return false;" class="adding-more" style="font-weight:bold; font-size:21px; color:#0b1cff; text-decoration:none; text-align:center;display:inline-block;width:auto;">+</a></div>
           </div> 
		   
		    <div id="divTxtdgs"> 

                       	</div>    
              
           </div>    
          <div class="modal-footer" style="overflow:hidden;">
            <button type="button" class="btn btn-default btn-closse" data-dismiss="modal"  onclick="closedgsetspopup();">Submit</button>
          </div>
       
    </div>
</div>
</div>

<?php  $pwrbkpc=0; ?>
    <input type="hidden" id="pwrbkpc" value="<?php echo ++$pwrbkpc; ?>">

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
                 <div class="col-sm-1 col-xs-1 form-group numbering">
                     <label>S.No</label><br />
                     <span>1</span>
                 </div>
                 <div class="col-sm-2 col-xs-2 form-group">
                     <label>Capacity</label>
                     <input type="text" class="form-control" name="solarpwrcapacity[]"  />
              </div>
			    <div class="col-sm-2 col-xs-2 form-group">
                     <label>Location</label>
                     <input type="text" class="form-control" name="solarpwrlocation[]"  />
              </div>
			    <div class="col-sm-2 col-xs-2 form-group">
			    <label>	Make</label>
                     <input type="text" class="form-control" name="solarpwrmake[]"  />
              </div>
              <div class="col-sm-4 col-xs-4 form-group">
                   <label>Browse</label>
                   <input type="file" class="form-control"  name="solarpwrfilename[]"   />
              </div>
              <div class="col-sm-1 col-xs-1">
			  <a href="#" onclick="addpwrbkpFormField(); return false;" class="adding-more" style="font-weight:bold; font-size:21px; color:#0b1cff; text-decoration:none; text-align:center;display:inline-block;width:auto;">+</a></div>
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
    <input type="hidden" id="stpc" value="<?php echo ++$stpc; ?>">
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
                 <div class="col-sm-1 col-xs-1 form-group numbering">
                     <label>S.No</label><br />
                     <span>1</span>
                 </div>
				   <div class="col-sm-2 col-xs-2 form-group">
                     <label>Phase</label>
                     <input type="text" class="form-control"  name="stpphase[]"  />
              </div>
			    <div class="col-sm-2 col-xs-2 form-group">
                   <label>Technology</label>
                    <input type="text" class="form-control"  name="stptechnology[]"  />
              </div>
                 <div class="col-sm-2 col-xs-2 form-group">
                     <label>Capacity</label>
                     <input type="text" class="form-control"  name="stpcapacity[]"  />
              </div>
			 
			    <div class="col-sm-1 col-xs-1 form-group">
                     <label>Make</label>
                     <input type="text" class="form-control"  name="stpmake[]"  />
              </div>
              <div class="col-sm-3 col-xs-3 form-group">
                   <label>Browse</label>
                   <input type="file" class="form-control"   name="stpfilename[]"   />
              </div>
			  
              <div class="col-sm-1 col-xs-1">
			  <a href="#" onclick="addstpFormField(); return false;" class="adding-more" style="font-weight:bold; font-size:21px; color:#0b1cff; text-decoration:none; text-align:center;display:inline-block;width:auto;">+</a></div>
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
    <input type="hidden" id="wspc" value="<?php echo ++$wspc; ?>">
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
                 <div class="col-sm-1 col-xs-1 form-group numbering">
                     <label>S.No</label><br />
                     <span>1</span>
                 </div>
				  <div class="col-sm-2 col-xs-2 form-group">
                     <label>Phase</label>
                     <input type="text" class="form-control"  name="wspphase[]"  />
              </div>
                 <div class="col-sm-2 col-xs-2 form-group">
                     <label>Capacity</label>
                     <input type="text" class="form-control"  name="wspcapacity[]"  />
              </div>
			   <div class="col-sm-2 col-xs-2 form-group">
                     <label>Make</label>
                     <input type="text" class="form-control"  name="wspmake[]"  />
              </div>
              <div class="col-sm-4 col-xs-4 form-group">
                   <label>Browse</label>
                   <input type="file" class="form-control"   name="wspfilename[]"   />
              </div>
              <div class="col-sm-1 col-xs-1">
			  <a href="#" onclick="addwspFormField(); return false;" class="adding-more" style="font-weight:bold; font-size:21px; color:#0b1cff; text-decoration:none; text-align:center;display:inline-block;width:auto;">+</a></div>
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


 <?php  $gasbc=0; ?>
    <input type="hidden" id="gasbc" value="<?php echo ++$gasbc; ?>">

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
                 <div class="col-sm-1 col-xs-1 form-group numbering">
                     <label>S.No</label><br />
                     <span>1</span>
                 </div>
				  <div class="col-sm-2 col-xs-2 form-group">
                     <label>Bank Name</label>
                     <input type="text" class="form-control" name="gabankname[]"  />
              </div>
				  <div class="col-sm-2 col-xs-2 form-group">
                     <label>Location</label>
                     <input type="text" class="form-control" name="galocation[]"  />
              </div>
                 <div class="col-sm-2 col-xs-2 form-group">
                     <label>No Of Cylinders</label>
                     <input type="text" class="form-control" name="gacapacity[]" />
              </div>
			    <div class="col-sm-1 col-xs-1 form-group">
                     <label>Make</label>
                     <input type="text" class="form-control" name="gamake[]"  />
              </div>
              <div class="col-sm-3 col-xs-3 form-group">
                   <label>Browse</label>
                   <input type="file" class="form-control"  name="gafilename[]"   />
              </div>
              <div class="col-sm-1 col-xs-1">
			  <a href="#" onclick="addgasbFormField(); return false;" class="adding-more" style="font-weight:bold; font-size:21px; color:#0b1cff; text-decoration:none; text-align:center;display:inline-block;width:auto;">+</a></div>
           </div> 
		   
		    <div id="divTxtgasb"> 

                       	</div>    
            </div>         
          <div class="modal-footer" style="overflow:hidden;">
            <button type="button" class="btn btn-default btn-closse" data-dismiss="modal" onclick="closegaspopup();">Submit</button>
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


<?php  $pubadsy=0; ?>
    <input type="hidden" id="pubadsy" value="<?php echo ++$pubadsy; ?>">

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
                 <div class="col-sm-1 col-xs-1 form-group numbering">
                     <label>S.No</label><br />
                     <span>1</span>
                 </div>
                 <div class="col-sm-3 col-xs-3 form-group">
                     <label>Location</label>
                     <input type="text" class="form-control" name="pbalocation[]"  />
              </div>
			    <div class="col-sm-3 col-xs-3 form-group">
                     <label>Make</label>
                     <input type="text" class="form-control" name="pbamake[]"  />
              </div>
              <div class="col-sm-4 col-xs-4 form-group">
                   <label>Browse</label>
                   <input type="file" class="form-control"  name="pbafilename[]"   />
              </div>
              <div class="col-sm-1 col-xs-1">
			  <a href="#" onclick="addpubadFormField(); return false;" class="adding-more" style="font-weight:bold; font-size:21px; color:#0b1cff; text-decoration:none; text-align:center;display:inline-block;width:auto;">+</a></div>
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
    <input type="hidden" id="firealsy" value="<?php echo ++$firealsy; ?>">

<div class="modal fade whatwhlll" id="sectionModal63" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
      <div class="modal-dialog tempcreat-popbox transformercapacity firealarem-system" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close clsepopup" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title bloskinformation" id="favoritesModalLabel">Fire Alarm System</h4>
          </div>
          <div class="modal-body blockoverhead">
                
              
           <div class="row transofrmers gasbanks-update">
                 <div class="col-sm-1 col-xs-1 form-group numbering">
                     <label>S.No</label><br />
                     <span>1</span>
                 </div>
                 <div class="col-sm-3 col-xs-3 form-group">
                     <label>Location</label>
                     <input type="text" class="form-control" name="faslocation[]"  />
              </div>
			    <div class="col-sm-3 col-xs-3 form-group">
                     <label>Make</label>
                     <input type="text" class="form-control" name="fasmake[]"  />
              </div>
              <div class="col-sm-4 col-xs-4 form-group">
                   <label>Browse</label>
                   <input type="file" class="form-control"  name="fasfilename[]"   />
              </div>
              <div class="col-sm-1 col-xs-1">
			  <a href="#" onclick="addfirealaramadFormField(); return false;" class="adding-more" style="font-weight:bold; font-size:21px; color:#0b1cff; text-decoration:none; text-align:center;display:inline-block;width:auto;">+</a></div>
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
    <input type="hidden" id="flowann" value="<?php echo ++$flowann; ?>">

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
                 <div class="col-sm-1 col-xs-1 form-group numbering">
                     <label>S.No</label><br />
                     <span>1</span>
                 </div>
                 <div class="col-sm-2 col-xs-2 form-group">
                     <label>Location</label>
                     <input type="text" class="form-control" name="flowanlocation[]"  />
              </div>
			    <div class="col-sm-2 col-xs-2 form-group">
                     <label>Make</label>
                     <input type="text" class="form-control" name="flowanmake[]"  />
              </div>
			     <div class="col-sm-2 col-xs-2 form-group">
                     <label>Zones</label>
                     <input type="text" class="form-control" name="flowanzone[]"  />
              </div>
              <div class="col-sm-4 col-xs-4 form-group">
                   <label>Browse</label>
                   <input type="file" class="form-control"  name="flowanfilename[]"   />
              </div>
              <div class="col-sm-1 col-xs-1">
			  <a href="#" onclick="addflowanadFormField(); return false;" class="adding-more" style="font-weight:bold; font-size:21px; color:#0b1cff; text-decoration:none; text-align:center;display:inline-block;width:auto;">+</a></div>
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
    <input type="hidden" id="bmbar" value="<?php echo ++$bmbar; ?>">

<div class="modal fade whatwhlll" id="sectionModal634bm" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
      <div class="modal-dialog tempcreat-popbox transformercapacity firealarem-system" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close clsepopup" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title bloskinformation" id="favoritesModalLabel">Boom Barrier</h4>
          </div>
          <div class="modal-body blockoverhead">
                
              
           <div class="row transofrmers gasbanks-update">
                 <div class="col-sm-1 col-xs-1 form-group numbering">
                     <label>S.No</label><br />
                     <span>1</span>
                 </div>
                 <div class="col-sm-4 col-xs-4 form-group">
                     <label>Location</label>
                     <input type="text" class="form-control" name="bmbrlocation[]"  />
              </div>
			    <div class="col-sm-3 col-xs-3 form-group">
                     <label>Make</label>
                     <input type="text" class="form-control" name="bmbrmake[]"  />
              </div>
			     <div class="col-sm-3 col-xs-3 form-group">
                     <label>Length</label>
                     <input type="text" class="form-control" name="bmbrlength[]"  />
              </div>
              <div class="col-sm-1 col-xs-1">
			  <a href="#" onclick="addboombarFormField(); return false;" class="adding-more" style="font-weight:bold; font-size:21px; color:#0b1cff; text-decoration:none; text-align:center;display:inline-block;width:auto;">+</a></div>
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
    <input type="hidden" id="solarwh" value="<?php echo ++$solarwh; ?>">

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
                 <div class="col-sm-1 col-xs-1 form-group numbering">
                     <label>S.No</label><br />
                     <span>1</span>
                 </div>
                 <div class="col-sm-3 col-xs-3 form-group">
                     <label>Capacity</label>
                     <input type="text" class="form-control solarcapsum" name="solarcapacity[]"  />
              </div>
			   <div class="col-sm-4 col-xs-4 form-group">
                     <label>Location</label>
                     <input type="text" class="form-control" name="solarlocation[]"  />
              </div>
			    <div class="col-sm-3 col-xs-3 form-group">
                     <label>Make</label>
                     <input type="text" class="form-control" name="solarmake[]"  />
              </div>
              <div class="col-sm-1 col-xs-1">
			  <a href="#" onclick="addsolarwhFormField(); return false;" class="adding-more" style="font-weight:bold; font-size:21px; color:#0b1cff; text-decoration:none; text-align:center;display:inline-block;width:auto;">+</a></div>
           </div> 
		   
		    <div id="divTxtsolarwh"> 

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
                   <input type="text" name="jockey" class="form-control frpump"  />
              </div>
              <div class="col-sm-6 form-group">
                   <input type="file" name="jockeyfile" class="form-control"   />
              </div>
           </div>   
          <div class="row pumproomw">
                 <div class="col-sm-2 form-group numbering">
                     <label>Main</label>
                 </div>
                 <div class="col-sm-4 form-group">
                   <input type="text" name="main" class="form-control frpump"  />
              </div>
              <div class="col-sm-6 form-group">
                   <input type="file" name="mainfile" class="form-control"   />
              </div>
           </div>   
          <div class="row pumproomw">
                 <div class="col-sm-2 form-group numbering">
                     <label>DG</label>
                 </div>
                 <div class="col-sm-4 form-group">
                   <input type="text" name="dg" class="form-control frpump"  />
              </div>
              <div class="col-sm-6 form-group">
                   <input type="file" name="dgfile" class="form-control"   />
              </div>
           </div>   
           <div class="row pumproomw">
                 <div class="col-sm-2 form-group numbering">
                     <label>Booster</label>
                 </div>
                 <div class="col-sm-4 form-group">
                  <input type="text" name="booster" class="form-control frpump"  />
              </div>
              <div class="col-sm-6 form-group">
                    <input type="file" name="boosterfile" class="form-control"   /> 
              </div>
           </div>   
          <div class="modal-footer" style="overflow:hidden;">
            <button type="button" class="btn btn-default btn-closse" data-dismiss="modal"  onclick="closefirepumppopup();">Submit</button>
          </div>
        </div>
    </div>
</div>
</div>-->

 <?php  $liftsc=0; ?>
    <input type="hidden" id="liftsc" value="<?php echo ++$liftsc; ?>">
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
                 <div class="col-sm-1 col-xs-1 form-group numbering">
                     <label>S.No</label><br />
                     <span>1</span>
                 </div>
                 <div class="col-sm-3 col-xs-3 form-group">
                     <label>No. of Lifts</label>
                     <input type="text" class="form-control liftscnval"  name="lift_num[]"  />
              </div>
              <div class="col-sm-4 col-xs-4 form-group">
                   <label>Make</label>
                   <input type="text" class="form-control" name="make[]"  />
              </div>
			  
			    <div class="col-sm-3 col-xs-3 form-group">
                   <label>Type</label>
                  <input type="text" class="form-control" name="type[]"  />
              </div>
              <div class="col-sm-1 col-xs-1">
			  <a href="#" onclick="addliftsFormField(); return false;" class="adding-more" style="font-weight:bold; font-size:21px; color:#0b1cff; text-decoration:none; text-align:center;display:inline-block;width:auto;">+</a>
              </div>
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

 <?php  $hydroc=0; ?>
    <input type="hidden" id="hydroc" value="<?php echo ++$hydroc; ?>">
<div class="modal fade whatwhlll" id="sectionModal8" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
      <div class="modal-dialog tempcreat-popbox pneumactic-information" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close clsepopup" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title bloskinformation" id="favoritesModalLabel">Pumping System</h4>
          </div>
          <div class="modal-body blockoverhead">
          <div class="row pumproomw">
                 <div class="col-sm-1 col-xs-1 pusystem">
                     <label>S.No</label>
                 </div>
                 <div class="col-sm-2 col-xs-2 numbering">
                     <label>No of Pumps</label>
                 </div>
                 <div class="col-sm-2 col-xs-2">
                   <label class="control-label">Make</label>
              </div>
              <div class="col-sm-3 col-xs-3">
                   <label class="control-label">Capacity</label>
              </div>
			     <div class="col-sm-3 col-xs-3">
                   <label class="control-label">Image</label>
              </div>
           </div>
             <div class="row pumnphysro pumping-system">
                 <div class="col-sm-1 col-xs-1 form-group pusystem">
                     <span>1</span>
                 </div>
                 <div class="col-sm-2 col-xs-2 form-group numbering">
                      <input type="text" name="num_of_pumps[]"  class="form-control"  />
                 </div>
                 <div class="col-sm-2 col-xs-2 form-group">
                   <input type="text" name="hydromake[]" class="form-control"  />
              </div>
              <div class="col-sm-3 col-xs-3 form-group">
                   <input type="text"  class="form-control" name="hydrocapacity[]"   />
              </div> 
			   <div class="col-sm-3 col-xs-3 form-group">
                   <input type="file"  class="form-control"  name="hydrofilename[]"  />
              </div>
              <div class="col-sm-1 col-xs-1">
			    <a href="#" onclick="addhydrpFormField(); return false;" class="adding-more" style="font-weight:bold; font-size:21px; color:#0b1cff; text-decoration:none; text-align:center;display:inline-block;width:auto;">+</a></div>
           </div>  
		     <div id="divTxthydro"> 

                       	</div>    
             </div>
          <div class="modal-footer" style="overflow:hidden;">
            <button type="button" class="btn btn-default btn-closse" data-dismiss="modal"  onclick="closenumatpopup();">Submit</button>
          </div>
      
    </div>
</div>
</div>

 <?php  $postpaidc=0; ?>
    <input type="hidden" id="postpaidc" value="<?php echo ++$postpaidc; ?>">
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
                 <div class="col-sm-1 col-xs-1 numbering">
                     <label>S.No</label>
                 </div>
                 <div class="col-sm-5 col-xs-5">
                   <label class="control-label">Start Date</label>
              </div>
              <div class="col-sm-5 col-xs-5">
                   <label class="control-label">End Date</label>
              </div>
              <div class="col-sm-1 col-xs-1">
			   <a href="#" onclick="addpostpaidFormField(); return false;" class="adding-more" style="font-weight:bold; font-size:21px; color:#0b1cff; text-decoration:none; text-align:center;display:inline-block;width:auto;">+</a>
               </div>
           </div>
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
		   <div id="postpaiddiv"></div>  
            
         
            </div>
          <div class="modal-footer" style="overflow:hidden;">
            <button type="button" class="btn btn-default btn-closse" data-dismiss="modal"  onclick="closepopuppostpaid();">Submit</button>
          </div>
       
    </div>
</div>
</div>
<?php // END MODEL ?>
              




   
{!! Form::submit('Next', ['class' => 'btn btn-danger btn-register sites-next-button']) !!}
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
 $("#sectionModal3").modal('hide');
 var blnum = document.getElementById("id").value;
 $("#blocks_num").val(blnum);   
} 

function closedgsetspopup(){
 var blnum = document.getElementById("dgsetsc").value;
 $("#dscetscnval").val(blnum);
  $("#sectionModal3").modal('hide');   
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


function closestpphpopup(){
var blnum = document.getElementById("stpcpt").value;
 $("#stppahetwotext").val(blnum);  
 $("#sectionModal4plus").modal('hide');
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

function closewspphpopup(){
 var blnum = document.getElementById("wspcph").value;
 $("#wsp").val(blnum);   
 $("#sectionModal41plus").modal('hide');
} 

 
function getgasbanklist(){ 
 $("#sectionModal5").modal();
 
}  

 function closepopuppostpaid(){
 var blnum = document.getElementById("postpaidc").value;
 $("#postpaidcval").val(blnum);  
 $("#sectionModal9").modal('hide'); 
}
 
function closepopup(){
 $("#sectionModal6").modal('hide');
 var blnum = document.getElementById("id").value;
 $("#blocks_num").val(blnum);   
} 


function closefirepumppopup(){
var blnum = document.getElementById("id").value;
	$("#fire_pump_rooms").val(a);  
	$("#sectionModal6").modal('hide');   
} 


function closesolarpop(){
 $("#sectionModal13").modal('hide');
 var blnum = document.getElementById("pwrbkpc").value;
 $("#solar_pwr_text").val(blnum);   
} 



 
function getpumproomslist(){ 
 $("#sectionModal6").modal();
} 

function getpumproomslistnew(){ 
 $("#sectionModal62pmp").modal();
} 
function getpublicaddressList(){ 
 $("#sectionModal62").modal();
} 

 function closepmppopup(){
 var blnum = document.getElementById("pumprmc").value;
 $("#fire_pump_rooms").val(blnum);  
  $("#sectionModal62pmp").modal('hide'); 
}



function getfirealaramList(){ 
 $("#sectionModal63").modal();
} 

function getflowannounceList(){ 
 $("#sectionModal634").modal();
}


function getboombarrierlist(){ 
 $("#sectionModal634bm").modal();
}



function closefirepopup(){ 
 var blnum = document.getElementById("firealsy").value;
 $("#fire_alaram_system").val(blnum);   
 $("#sectionModal63").modal('hide');
}  


function closebmbrpopup(){
 var blnum = document.getElementById("bmbar").value;
 $("#boombarier_meter").val(blnum);   
 $("#sectionModal634bm").modal('hide');
}

function closeflowanpopup(){
 var blnum = document.getElementById("flowann").value;
 $("#flow_anounciator").val(blnum);   
 $("#sectionModal634").modal('hide');
}  
function closesolarwhpopup(){
 var blnum = document.getElementById("solarwh").value;
 
   var a = 0;
    $(".solarcapsum").each(function() {
	   if(parseInt($(this).val()) > 0) {
        a += parseInt($(this).val());
		}  
    });

 $("#solar_water_heat_text").val(a); 
    
 $("#sectionModal65").modal('hide');
 
}  


function getsolarblockList(){ 
 $("#sectionModal65").modal();
} 

  
 
 function closepopup(){
 $("#sectionModal8").modal('hide');
 var blnum = document.getElementById("id").value;
 $("#blocks_num").val(blnum);   
} 

 function closepbspopup(){
 var blnum = document.getElementById("pubadsy").value;
 $("#public_addressing_system").val(blnum);  
  $("#sectionModal62").modal('hide'); 
} 

 
 function closenumatpopup(){
 var blnum = document.getElementById("hydroc").value;
 $("#hydro_pneumatic_sys_text").val(blnum);  
 $("#sectionModal8").modal('hide'); 
} 

 
function gethydropneumaticlist(){ 
 $("#sectionModal8").modal();
} 

  
function closepopup(){
 $("#sectionModal9").modal('hide');
 var blnum = document.getElementById("id").value;
 $("#blocks_num").val(blnum);   
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
		
		$("#divTxt").append("<div class='wonderlaaa' id='row" + id + "' ><div class='col-xs-1 dunacinnumner1 number-weight'><label>"+parseInt(parseInt(id) + 1)+"</label></div><div class='col-xs-4 form-group'><input type='text' name='blockname[]' class='form-control getblocknum'></div><div class='col-xs-6 form-group'><select name='name_change_socity[]' class='form-control'><option value='Yes'>Yes</option><option value='No'>No</option><option value='N/A'>N/A</option></select></div><div class='col-sm-1 col-xs-1 enterthetedd'><a href='#' onClick='removeFormField(\"#row" + id + "\"); return false;' class='remove removerla'>X</a></div></div></div>");
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
		
		
		$("#divTxttrans").append("<div class='row transofrmers trsnaofmetssadding' id='row" + id + "'><div class='col-sm-1 col-xs-1 form-group numbering'><span>"+parseInt( cn )+"</span></div><div class='col-sm-2 col-xs-2 form-group'><input type='text' name='transcapacity[]' class='form-control'/></div><div class='col-sm-2 col-xs-2 form-group'><input type='text' name='translocation[]' class='form-control'/></div><div class='col-sm-2 col-xs-2 form-group'><input type='text' name='transmake[]' class='form-control'/></div><div class='col-sm-4 col-xs-4 form-group'><input type='file' name='transfilename[]' class='form-control'/></div><div class='col-sm-1 col-xs-1'><a href='#' onClick='removetransFormField(\"#row" + id + "\"); return false;' class='remove removerla'>X</a></div></div>");
		
		
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
		
		
		$("#divTxtpwrbkp").append("<div class='row transofrmers solarpwrcls' id='row" + id + "'><div class='col-sm-1 col-xs-1 form-group numbering'><span>"+ parseInt( cn ) +"</span></div><div class='col-sm-2 col-xs-2 form-group'><input type='text' name='solarpwrcapacity[]' class='form-control'/></div><div class='col-sm-2 col-xs-2 form-group'><input type='text' name='solarpwrlocation[]' class='form-control'/></div><div class='col-sm-2 col-xs-2 form-group'><input type='text' name='solarpwrmake[]' class='form-control'/></div><div class='col-sm-4 col-xs-4 form-group'><input type='file' name='solarpwrfilename[]' class='form-control'/></div><div class='col-sm-1 col-xs-1'><a href='#' onClick='removepwrbkpFormField(\"#row" + id + "\"); return false;' class='remove removerla'>X</a></div></div>");
		  
		
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
		
		
		$("#divTxtdgs").append("<div class='row transofrmers' id='row" + id + "'><div class='col-sm-1 col-xs-1 form-group numbering'><span>"+ parseInt( cn ) +"</span></div><div class='col-sm-2 col-xs-2 form-group'><input type='text' name='dgcapacity[]' class='form-control'/></div><div class='col-sm-2 col-xs-2 form-group'><input type='text' name='dglocation[]' class='form-control'/></div><div class='col-sm-2 col-xs-2 form-group'><input type='text' name='dgmake[]' class='form-control'/></div><div class='col-sm-4 col-xs-4 form-group'><input type='file' name='dgfilename[]' class='form-control'/></div><div class='col-sm-1 col-xs-1'><a href='#' onClick='removedgsFormField(\"#row" + id + "\"); return false;' class='remove removerla'>X</a></div></div>");
		
		
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


// STP SECOND PHASE


	

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
		
		
		$("#divTxtwsp").append("<div class='row transofrmers' id='row" + id + "'><div class='col-sm-1 col-xs-1 form-group numbering'><span>"+parseInt( cn )+"</span></div><div class='col-sm-2 col-xs-2 form-group'><input type='text' name='wspphase[]' class='form-control'/></div><div class='col-sm-2 col-xs-2 form-group'><input type='text' name='wspcapacity[]' class='form-control'/></div><div class='col-sm-2 col-xs-2 form-group'><input type='text' name='wspmake[]' class='form-control'/></div><div class='col-sm-4 col-xs-4 form-group'><input type='file' name='wspfilename[]' class='form-control'/></div><div class='col-sm-1 col-xs-1'><a href='#' onClick='removewspFormField(\"#row" + id + "\"); return false;' class='remove removerla'>X</a></div></div>");
		 
		
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
		
		$("#divTxtsolarwh").append("<div class='row transofrmers' id='row" + id + "'><div class='col-sm-1 col-xs-1 form-group numbering'><span>"+ parseInt( cn )+"</span></div><div class='col-sm-3 col-xs-3 form-group'><input type='text' name='solarcapacity[]' class='form-control solarcapsum'/></div><div class='col-sm-4 col-xs-4 form-group'><input type='text' name='solarlocation[]' class='form-control'/></div><div class='col-sm-3 col-xs-3 form-group'><input type='text' name='solarmake[]' class='form-control'/></div><div class='col-sm-1 col-xs-1'><a href='#' onClick='removefirealFormField(\"#row" + id + "\"); return false;' class='remove removerla'>X</a></div></div>");
		
		
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
	
	
	//Public Addressing System
	
	
	function addpubadFormField() {
		var id = document.getElementById("pubadsy").value;

		var feet = "";

		if($("#feet").val()!=null) feet=$("#feet").val();  
			var cn = parseInt(id) + 1;
		
		
		$("#divTxtpubadsy").append("<div class='row transofrmers' id='row" + id + "'><div class='col-sm-1 col-xs-1 form-group numbering'><span>"+ parseInt( cn )+"</span></div><div class='col-sm-3 col-xs-3 form-group'><input type='text' name='pbalocation[]' class='form-control'/></div><div class='col-sm-3 col-xs-3 form-group'><input type='text' name='pbamake[]' class='form-control'/></div><div class='col-sm-4 col-xs-4 form-group'><input type='file' name='pbafilename[]' class='form-control'/></div><div class='col-sm-1 col-xs-1'><a href='#' onClick='removepublicaddFormField(\"#row" + id + "\"); return false;' class='remove removerla'>X</a></div></div>");
		
		
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
		
		$("#divTxthydro").append("<div class='row pumnphysro masterocard' id='row" + id + "'><div class='col-sm-1 col-xs-1 pusystem'><span>2</span></div><div class='col-sm-2 col-xs-2 form-group numbering'><input type='text'  class='form-control' name='num_of_pumps[]'  /></div><div class='col-sm-2 col-xs-2 form-group'><input type='text'  class='form-control' name='hydromake[]'  /></div><div class='col-sm-3 col-xs-3 form-group'><input type='text' name='hydrocapacity[]' class='form-control '  /></div><div class='col-sm-3 col-xs-3 form-group'><input type='file' name='hydrofilename[]' class='form-control'/></div><div class='col-sm-1 col-xs-1'><a href='#' onClick='removeliftsFormField(\"#row" + id + "\"); return false;' class='remove removerla'>X</a></div></div>" );
		
		  
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
  
   function postpaidtextnum(sel){
     if(sel == 'Yes'){
	    $("#numpostpaiddiv").show();
	 }else
	 {
	    $("#numpostpaiddiv").hide();
	 }
  }
  
  
  function changecertified(val){
     if(val == 'Yes'){
	   $("#rating_block").show();
	 }else{
	    $("#rating_block").hide();
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

