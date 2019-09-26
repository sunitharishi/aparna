@extends('layouts.app')

@section('content')
    <!--<h3 class="page-title">Communities</h3>-->
    
    {!! Form::model($sites, ['files' => 'true','method' => 'PUT', 'route' => ['sitesbkp.update', $sites->id]]) !!}

    <div class="panel panel-default panelmar tsas-crseations">
        <div class="panel-heading">
            Communities
        </div> 

        <div class="panel-body full-setails">
        
			<div class="row calervification">
                <div class="col-xs-3">
                    {!! Form::label('scode', 'Project Code', ['class' => 'control-label']) !!}
                    {!! Form::text('scode', old('scode'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('scode'))
                        <p class="help-block">
                            {{ $errors->first('scode') }}
                        </p>
                    @endif 
                </div> 
           
                <div class="col-xs-6">
                    {!! Form::label('name', 'Project Name', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div> 
            </div>
            
            <div class="row calervification1">
               <label class="col-sm-12  col-xs-12 address">Address</label>
                <div class="col-xs-3">
                    {!! Form::label('plot_num', 'Plot No', ['class' => 'control-label']) !!}
                    {!! Form::text('plot_num', old('plot_num'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('plot_num'))
                        <p class="help-block">
                            {{ $errors->first('plot_num') }}
                        </p>
                    @endif
                </div>
                
                <div class="col-sm-3">
                    <label>H.NO</label>
                    {!! Form::text('hnum', old('hnum'), ['class' => 'form-control', 'placeholder' => '']) !!}
                </div>
                 <div class="col-sm-3">
                    <label>Near By Place</label>
                     {!! Form::text('near_place', old('near_place'), ['class' => 'form-control', 'placeholder' => '']) !!}
                </div>
                 <div class="col-sm-3">
                    <label>Village / Town</label>
                   {!! Form::text('village', old('village'), ['class' => 'form-control', 'placeholder' => '']) !!}
                </div>
              </div>
                
             <div class="row calervification"> 
                 <div class="col-sm-3">
                    <label>Mandal</label>
                     {!! Form::text('mandal', old('mandal'), ['class' => 'form-control', 'placeholder' => '']) !!}
                </div>
                 <div class="col-sm-3">
                    <label>District</label>
                   {!! Form::text('district', old('district'), ['class' => 'form-control', 'placeholder' => '']) !!}
                </div>
                 <div class="col-sm-3">
                    <label>State</label>
                     {!! Form::text('state', old('state'), ['class' => 'form-control', 'placeholder' => '']) !!}
                </div>
                 <div class="col-sm-3">
                    <label>Pin Code</label>
                   {!! Form::text('pincode', old('pincode'), ['class' => 'form-control', 'placeholder' => '']) !!}
                </div>
            </div>
            
             <div class="row latiti-longitude calervification1">
                  <div class="col-sm-6 geo">
                      <label class="col-sm-12 col-zs-13 geographical-area">Geographical Location</label>
                     <div class="col-sm-6">
                        <label>Latitude</label>
                         {!! Form::text('geo_latitude', old('geo_latitude'), ['class' => 'form-control', 'placeholder' => '']) !!}
                     </div>
                      <div class="col-sm-6">
                        <label>Longitude</label>
                         {!! Form::text('geo_longitude', old('geo_longitude'), ['class' => 'form-control', 'placeholder' => '']) !!}
                     </div>
                  </div>
                  
                  
                 <div class="col-sm-6 rest-ger">
                   <label class="col-sm-12 col-xs-12">&nbsp; </label>
                    <div class="col-xs-6 form-group res">
                        {!! Form::label('total_site_area', 'Total Site Area', ['class' => 'control-label']) !!}
                        {!! Form::text('tot_site_area', old('tot_site_area'), ['class' => 'form-control', 'placeholder' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('tot_site_area'))
                            <p class="help-block">
                                {{ $errors->first('tot_site_area') }}
                            </p>
                        @endif
                    </div>
           
                    <div class="col-xs-6 form-group">
                        {!! Form::label('built_up_area', 'Built Up Area', ['class' => 'control-label']) !!}
                        {!! Form::text('built_up_area', old('built_up_area'), ['class' => 'form-control', 'placeholder' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('built_up_area'))
                            <p class="help-block">
                                {{ $errors->first('built_up_area') }}
                            </p>
                        @endif
                    </div>
                 </div>
            </div>
            
            
            <div class="row calervification blocks-floores">
                <div class="col-xs-2 form-group">
                    {!! Form::label('blocks_num', 'No. of Blocks', ['class' => 'control-label']) !!}
                     <select class="form-control" name="blocks_num" onchange="setblocknum(this.value);">
                     <option value="">Please Select</option>
                       <option value="Yes" <?php if($sites['blocks_num'] == 'Yes') echo 'Selected = "selected"'  ?>>Yes</option>
                       <option value="No"  <?php if($sites['blocks_num'] == 'No') echo 'Selected = "selected"'  ?>>No</option> 
                    </select>
                   <?php /*?> {!! Form::text('blocks_num', old('blocks_num'), ['class' => 'form-control', 'placeholder' => '', 'onchange' => 'getblockslist()']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('blocks_num'))
                        <p class="help-block">
                            {{ $errors->first('blocks_num') }}
                        </p>
                    @endif<?php */?>
                </div>
           
                <div class="col-sm-1" style="display:<?php if($sites['blocks_num'] == 'Yes') echo 'block;'; else echo 'none;' ; ?>" id="numblocksdiv">
                    <label>&nbsp;</label>
                     {!! Form::text('num_of_blocks_text', old('num_of_blocks_text'), ['class' => 'form-control', 'placeholder' => 'Blocks Num', 'onchange' => 'getblockslist()']) !!}
                </div>
           
                <div class="col-xs-2 form-group">
                   {!! Form::label('floors_num', 'No Of Floors', ['class' => 'control-label']) !!}
                      <select class="form-control" name="num_of_floors" onchange="setfloornum(this.value);">
                      <option value="">Please Select</option>
                       <option value="Yes" <?php if($sites['num_of_floors'] == 'Yes') echo 'Selected = "selected"'  ?>>Yes</option>
                       <option value="No" <?php if($sites['num_of_floors'] == 'No') echo 'Selected = "selected"'  ?>>No</option> 
                    </select>
                   <?php /*?> {!! Form::text('floors_num', old('floors_num'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('floors_num'))
                        <p class="help-block">
                            {{ $errors->first('floors_num') }}
                        </p>
                    @endif<?php */?>
                </div>
                 <div class="col-sm-1" id="numfloordiv" style="display:<?php if($sites['num_of_floors'] == 'Yes') echo 'block;'; else echo 'none;' ; ?>">
                    <label>&nbsp;</label>
                    {!! Form::text('num_of_floors_text', old('num_of_floors_text'), ['class' => 'form-control', 'placeholder' => '']) !!}
                </div>
                
                <div class="col-sm-2">
                   <label>Basement 1</label>
                  <select class="form-control" name="basement_one">
                       <option value="Yes"  <?php if($sites['basement_one'] == 'Yes') echo 'Selected = "selected"';  ?>>Yes</option>
                       <option value="No"  <?php if($sites['basement_one'] == 'Yes') echo 'Selected = "selected"';  ?>>No</option>
                       <option value="NA"  <?php if($sites['basement_one'] == 'Yes') echo 'Selected = "selected"';  ?>>NA</option>
                    </select>
                </div>
                 <div class="col-sm-2">
                   <label>Basment 2</label>
                   <select class="form-control" name="basement_two">
                    <option value="Yes"  <?php if($sites['basement_two'] == 'Yes') echo 'Selected = "selected"' ; ?>>Yes</option>
                       <option value="No"  <?php if($sites['basement_two'] == 'Yes') echo 'Selected = "selected"';  ?>>No</option>
                       <option value="NA"  <?php if($sites['basement_two'] == 'Yes') echo 'Selected = "selected"' ; ?>>NA</option>
                    </select>
                </div>
                 <div class="col-sm-2">
                   <label>Basement 3</label>
                    <select class="form-control" name="basement_three">
                      <option value="Yes"  <?php if($sites['basement_three'] == 'Yes') echo 'Selected = "selected"'; ?>>Yes</option>
                       <option value="No"  <?php if($sites['basement_three'] == 'Yes') echo 'Selected = "selected"'; ?>>No</option>
                       <option value="NA"  <?php if($sites['basement_three'] == 'Yes') echo 'Selected = "selected"'; ?>>NA</option>
                    </select>
                </div>
            </div>
            
            
            <div class="row calervification1">
               <div class="col-xs-2 form-group">
                    {!! Form::label('num_of_flats', 'No.of Flats / Villas', ['class' => 'control-label']) !!}
                    {!! Form::text('num_of_flats', old('num_of_flats'), ['class' => 'form-control', 'placeholder' => '', 'onchange' => 'getflatslist()']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('num_of_flats'))
                        <p class="help-block">
                            {{ $errors->first('num_of_flats') }}
                        </p>
                    @endif
                </div>
                
                <div class="col-sm-2">
                   <label>Landscape Area</label>
                   {!! Form::text('landscape_area', old('landscape_area'), ['class' => 'form-control', 'placeholder' => '']) !!}
                </div>
                
                
                <div class="col-xs-2 form-group">
                    {!! Form::label('helipad_area', 'Helipad Area', ['class' => 'control-label']) !!}
                      <select class="form-control" name="helipad">
                       <option value="Yes"  <?php if($sites['helipad'] == 'Yes') echo 'Selected = "selected"'; ?>>Yes</option>
                       <option value="No"  <?php if($sites['helipad'] == 'Yes') echo 'Selected = "selected"'; ?>>No</option>
                    </select>
                    <?php /*?>{!! Form::text('helipad_area', old('helipad_area'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('helipad_area'))
                        <p class="help-block">
                            {{ $errors->first('helipad_area') }}
                        </p>
                    @endif<?php */?>
                </div>
                
                <div class="col-sm-3 heliareaa">
                   <label class="col-sm-12">&nbsp;</label>
                  {!! Form::text('helipad_text', old('helipad_text'), ['class' => 'form-control', 'placeholder' => '']) !!}<span>(Mtrs)</span>
                </div>
                
                
                <div class="col-sm-3">
                    <label>&nbsp;</label>
                   <input type="file" class="form-control" name="helippad_file"  /><?php if(isset($sites['helippad_file'])) echo $sites['helippad_file']; ?>
                </div>
                
            </div>
            
            
            
            <div class="row calervification">
            
                <div class="col-xs-3 form-group">
                    {!! Form::label('transformers', 'Transformers', ['class' => 'control-label']) !!}
                    {!! Form::text('transformers', old('transformers'), ['class' => 'form-control', 'placeholder' => '', 'onchange' => 'gettransformerslist()']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('transformers'))
                        <p class="help-block">
                            {{ $errors->first('transformers') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-3 form-group">
                   {!! Form::label('dgsets', 'DG sets', ['class' => 'control-label']) !!}
                    {!! Form::text('dgsets', old('dgsets'), ['class' => 'form-control', 'placeholder' => '', 'onchange' => 'getdgsetslist()']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('dgsets'))
                        <p class="help-block">
                            {{ $errors->first('dgsets') }}
                        </p>
                    @endif
                </div>
                
                <div class="col-xs-2 form-group">
                    <label>Power Back-Up</label>
                     {!! Form::text('power_backup', old('power_backup'), ['class' => 'form-control', 'placeholder' => '']) !!}
                </div>
                
               
                <div class="col-sm-3">
                     <label>&nbsp;</label>
                     <input type="file" class="form-control"  name="power_backup_file" /><?php if(isset($sites['power_backup_file'])) echo $sites['power_backup_file']; ?>
                </div>
               
            </div>
			 
             
             <div class="row calervification1">
                 <div class="col-xs-2 form-group solar-power">
                    {!! Form::label('solar_power', 'Solar Power', ['class' => 'control-label']) !!}
                     <select class="form-control" name="solar_power">
                       <option value="Yes" <?php if($sites['solar_power'] == 'Yes') echo 'Selected = "selected"'; ?>>Yes</option>
                       <option value="No" <?php if($sites['solar_power'] == 'Yes') echo 'Selected = "selected"'; ?>>No</option>
                    </select>
                   <?php /*?> {!! Form::text('solar_power', old('solar_power'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('solar_power'))
                        <p class="help-block">
                            {{ $errors->first('solar_power') }}
                        </p>
                    @endif<?php */?>
                </div>
                
                <div class="col-xs-2 form-group">
                   <label>&nbsp;</label>
                    {!! Form::text('solar_pwr_text', old('solar_pwr_text'), ['class' => 'form-control', 'placeholder' => '']) !!}
                </div>
                
                 <div class="col-xs-2 form-group power-browser">
                     <label>&nbsp;</label>
                      <input type="file" class="form-control" name="solar_pwr_file" /><?php if(isset($sites['solar_pwr_file'])) echo $sites['solar_pwr_file']; ?>
                 </div>
                 
                 <div class="col-xs-2 form-group">
                    {!! Form::label('wsp', 'WSP', ['class' => 'control-label']) !!}
                    {!! Form::text('wsp', old('wsp'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('wsp'))
                        <p class="help-block">
                            {{ $errors->first('wsp') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-3">
                    <label>&nbsp;</label>
                  <input type="file" class="form-control" name="wsp_file"  /> <?php if(isset($sites['wsp_file'])) echo $sites['wsp_file']; ?>
                </div>>
                
              
                
              
             </div>
             
             <div class="row calervification">
                   <div class="col-xs-2 form-group">
                    {!! Form::label('stp', 'STP', ['class' => 'control-label']) !!}
                    {!! Form::text('stp', old('stp'), ['class' => 'form-control', 'placeholder' => '', 'onchange' => 'getstplist()']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('stp'))
                        <p class="help-block">
                            {{ $errors->first('stp') }}
                        </p>
                    @endif
                </div>
                 
                   <div class="col-xs-2 form-group">
                    {!! Form::label('gas_banks', 'Gas Banks', ['class' => 'control-label']) !!}
                    {!! Form::text('gas_banks', old('gas_banks'), ['class' => 'form-control', 'placeholder' => '', 'onchange' => 'getgasbanklist()']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('gas_banks'))
                        <p class="help-block">
                            {{ $errors->first('gas_banks') }}
                        </p>
                    @endif
                </div>
                     <div class="col-xs-2 form-group">
                    {!! Form::label('fire_pump_rooms', 'Fire Pump Rooms', ['class' => 'control-label']) !!}
                    {!! Form::text('fire_pump_rooms', old('fire_pump_rooms'), ['class' => 'form-control', 'placeholder' => '', 'onchange' => 'getpumproomslist()']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('fire_pump_rooms'))
                        <p class="help-block">
                            {{ $errors->first('fire_pump_rooms') }}
                        </p>
                    @endif
                </div>
                    <div class="col-xs-2 form-group">
                    {!! Form::label('lifts', 'Lifts', ['class' => 'control-label']) !!}
                    {!! Form::text('lifts', old('lifts'), ['class' => 'form-control', 'placeholder' => '', 'id' => 'lifts', 'onchange' => 'getliftlist()']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('lifts'))
                        <p class="help-block">
                            {{ $errors->first('lifts') }}
                        </p>
                    @endif
                </div>
                 <div class="col-xs-3 form-group">
                    {!! Form::label('prepaid_systems', 'Prepaid Systems', ['class' => 'control-label']) !!}
                    {!! Form::text('prepaid_systems', old('prepaid_systems'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('prepaid_systems'))
                        <p class="help-block">
                            {{ $errors->first('prepaid_systems') }}
                        </p>
                    @endif
                </div>
                
               
             </div>
         
             <div class="row calervification1">
             
                 
                  <div class="col-xs-9 form-group">
                   <label>Hydro Pneumatic System</label>
                   {!! Form::text('hydro_pneumatic_sys', old('hydro_pneumatic_sys'), ['class' => 'form-control', 'placeholder' => '']) !!}
                </div>
                <div class="col-xs-3">
                   <label>&nbsp;</label>
                 <input type="file" class="form-control" name="hydro_pneumatic_sys_file" /> <?php if(isset($sites['hydro_pneumatic_sys_file'])) echo $sites['hydro_pneumatic_sys_file']; ?>
                </div>
                  <label>Guide</label>
				 <div class="col-xs-3">
                   <label>&nbsp;</label>
                   <input type="file" class="form-control" name="guide_file" /> <?php if(isset($sites['guide_file'])) echo $sites['guide_file']; ?>
                </div>
             </div>
         
         
         
         
      
            
        </div>
       
    <div class="modal fade whatwhlll" id="sectionModal" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
      <div class="modal-dialog tempcreat-popbox" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title bloskinformation" id="favoritesModalLabel">Blocks Information</h4>
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
            <div class="col-xs-1 dunacinnumner">
                <label><?php $m = $m + 1; echo $m; ?>.</label>
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
                <div class="col-sm-1 dunacinnumner">
                	<label>1.</label>
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
              class="btn btn-default btn-closse" data-dismiss="modal" style="margin-right:10px;" onclick="closepopup();">Close</button>
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
                 <div class="col-sm-3 form-group one-check">
                    1BHK
                 </div> 
                  <div class="col-sm-6 form-group">
                    <input type="text" name="onebhk" value="<?php if(isset($flats['onebhk']))  echo $flats['onebhk'] ; ?>" class="form-control"  /> 
                 </div>      
             </div>
              <div class="row">
                 <div class="col-sm-3 form-group two-check">
                   2BHK
                 </div> 
                  <div class="col-sm-6 form-group">
                    <input type="text" name="twobhk" value="<?php if(isset($flats['twobhk']))  echo $flats['twobhk'] ; ?>"  class="form-control"  /> 
                 </div>      
             </div>
              <div class="row">
                 <div class="col-sm-3 form-group three-check">
                    3BHK
                 </div> 
                  <div class="col-sm-6 form-group">
                    <input type="text" name="threebhk"  value="<?php if(isset($flats['threebhk']))  echo $flats['threebhk'] ; ?>" class="form-control"  /> 
                 </div>      
             </div>
              <div class="row">
                 <div class="col-sm-3 form-group four-check">
                     4BHK
                 </div> 
                  <div class="col-sm-6 form-group">
                    <input type="text" name="fourbhk" value="<?php if(isset($flats['fourbhk']))  echo $flats['fourbhk'] ; ?>"  class="form-control"  /> 
                 </div>      
             </div>
              <div class="row">
                 <div class="col-sm-3 form-group five-check">
                   5BHK
                 </div> 
                  <div class="col-sm-6 form-group">
                    <input type="text" name="fivebhk" value="<?php if(isset($flats['fivebhk']))  echo $flats['fivebhk'] ; ?>"  class="form-control"  /> 
                 </div>      
             </div>
           </div>   
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-closse" data-dismiss="modal" style="margin-right:10px;" onclick="closepopup();">Close</button>
          </div>
        </div>
    </div>
</div>

 <?php  $trans=0; ?>
    
<div class="modal fade whatwhlll" id="sectionModal2" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
      <div class="modal-dialog tempcreat-popbox transformercapacity" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close clsepopup" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title bloskinformation" id="favoritesModalLabel">Transformers</h4>
          </div>
          <div class="modal-body blockoverhead">
             <div class="row transofrmers">
                 <div class="col-sm-1 numbering">
                     <label>S.No</label><br />
                   
                 </div>
                 <div class="col-sm-5">
                     <label>Capacity</label>
                    
              </div>
              <div class="col-sm-6">
                   <label>Browse</label>
                 
              </div>
             
              
                     <?php $mt = 0; if(count($transformer) > 0) {
				 $mt = 0;
			foreach($transformer as $dgcon) { //echo "<pre>"; print_r($dgcon); echo "</pre>";?>
            <div class="col-sm-1 dunacinnumner">
                <label><?php $mt = $mt + 1; echo $mt; ?>.</label>
            </div>
            <div class="col-sm-5 form-group"> 
                      <input type="text" class="form-control" name="transcapacity[]" value="<?php echo  $dgcon['capacity']; ?>"/>
                </div>
                <div class="col-sm-6 form-group">
				
				<div class="col-sm-12 select-groupw"> <input type="file" class="form-control" name="transfilename[]"   /><?php if(isset($dgcon['filename']))  echo $dgcon['filename']; ?>
                </div>   
                </div>  
             
                <?php } } else { ?>
                <div class="col-sm-1 numbering">
                	<span>1.</span>
                </div>
                <div class="col-sm-5 form-group"> 
                     <input type="text" class="form-control" name="transcapacity[]"  />
                </div>
                <div class="col-sm-6 form-group">  <input type="file" class="form-control" name="transfilename[]"   />
                </div>   
                
                <?php } ?> 
				  <?php if($mt > 0){  $trans=$mt - 1; } else {$trans = 0;} ?>
    
    <input type="hidden" id="trans" value="<?php echo ++$trans; ?>">
              
              
			  <a href="#" onclick="addtransFormField(); return false;" class="adding-more" style="font-weight:bold; font-size:21px; color:#0b1cff; text-decoration:none; text-align:center;display:inline-block;width:auto;">+</a>
           </div>   
                        <div id="divTxttrans"> 

                       	</div>  
          <div class="modal-footer" style="overflow:hidden;">
            <button type="button" class="btn btn-default btn-closse" data-dismiss="modal" style="margin-right:10px;" onclick="closepopup();">Close</button>
          </div>
        </div>
    </div>
</div>
</div>  

<?php  $dgsetsc=0; ?>
  
 
<div class="modal fade whatwhlll" id="sectionModal3" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
      <div class="modal-dialog tempcreat-popbox transformercapacity" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close clsepopup" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title bloskinformation" id="favoritesModalLabel">DG Sets</h4>
          </div>
          <div class="modal-body blockoverhead">
             <div class="row transofrmers dg-teransfermers">
                 <div class="col-sm-1  numbering">
                     <label>S.No</label><br />
                     <span></span>
                 </div>
                 <div class="col-sm-5 ">
                     <label>Capacity</label>
                   
              </div>
              <div class="col-sm-6 ">
                   <label>Browse</label>
                  
              </div>
              
                <?php $md = 0; if(count($dgsets) > 0) {
				 $md = 0;
			foreach($dgsets as $dgcon) { //echo "<pre>"; print_r($dgcon); echo "</pre>";?>
            <div class="col-sm-1 dunacinnumner">
                <span><?php $md = $md + 1; echo $md; ?>.</span>
            </div>
            <div class="col-sm-5 form-group"> 
                      <input type="text" class="form-control" name="dgcapacity[]" value="<?php echo  $dgcon['capacity']; ?>"/>
                </div>
                <div class="col-sm-6 form-group">
				
				<div class="col-sm-12 select-groupw"> <input type="file" class="form-control" name="dgfilename[]"   /><?php if(isset($dgcon['filename']))  echo $dgcon['filename']; ?>
                </div>   
                </div>  
             
                <?php } } else { ?>
                <div class="col-sm-1 form-group numbering">
                	<span>1.</span>
                </div>
                <div class="col-sm-5 form-group"> 
                     <input type="text" class="form-control" name="dgcapacity[]"  />
                </div>
                <div class="col-sm-6 form-group">  <input type="file" class="form-control" name="dgfilename[]"   />
                </div>   
                
                <?php } ?> 
				  <?php if($md > 0){  $dgsetsc=$md - 1; } else {$dgsetsc = 0;} ?>
                  <input type="hidden" id="dgsetsc" value="<?php echo ++$dgsetsc; ?>">
    
              
			  <a href="#" onclick="adddgsFormField(); return false;" class="adding-more" style="font-weight:bold; font-size:21px; color:#0b1cff; text-decoration:none; text-align:center;display:inline-block;width:auto;">+</a>
           </div> 
		   
		    <div id="divTxtdgs" > 

                       	</div>    
              
              
          <div class="modal-footer" style="overflow:hidden;">
            <button type="button" class="btn btn-default btn-closse" data-dismiss="modal" style="margin-right:10px;" onclick="closepopup();">Close</button>
          </div>
        </div>
    </div>
</div>
</div>

 <?php  $stpc=0; ?>
    
<div class="modal fade whatwhlll" id="sectionModal4" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
      <div class="modal-dialog tempcreat-popbox transformercapacity" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close clsepopup" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title bloskinformation" id="favoritesModalLabel">STP </h4>
          </div>
          <div class="modal-body blockoverhead">
              <div class="row transofrmers stp-overblick">
                 <div class="col-sm-1 numbering">
                     <label>S.No</label><br />
                   
                 </div>
                 <div class="col-sm-5">
                     <label>Capacity</label>
                    
              </div>
              <div class="col-sm-6">
                   <label>Browse</label>
                  
              </div>
              
                       <?php $ms = 0; if(count($stp) > 0) {
				 $ms = 0;
			foreach($stp as $dgcon) { //echo "<pre>"; print_r($dgcon); echo "</pre>";?>
            <div class="col-sm-1 form-group numbering">
                <span><?php $ms = $ms + 1; echo $ms; ?>.</span>
            </div>
            <div class="col-sm-5 form-group"> 
                      <input type="text" class="form-control" name="stpcapacity[]" value="<?php echo  $dgcon['capacity']; ?>"/>
                </div>
                <div class="col-sm-6 form-group">
				
				<div class="col-sm-12 select-groupw"> <input type="file" class="form-control" name="stpfilename[]"/><?php if(isset($dgcon['filename']))  echo $dgcon['filename']; ?>
                </div>   
                </div>  
             
                <?php } } else { ?>
                <div class="col-sm-1 form-group numbering">
                	<span>1.</span>
                </div>
                <div class="col-sm-5 form-group"> 
                     <input type="text" class="form-control" name="stpcapacity[]"  />
                </div>
                <div class="col-sm-6 form-group">  <input type="file" class="form-control" name="stpfilename[]"   />
                </div>   
                
                <?php } ?> 
				  <?php if($ms > 0){  $stpc=$ms - 1; } else {$stpc = 0;} ?>
                  <input type="hidden" id="stpc" value="<?php echo ++$stpc; ?>">
			  <a href="#" onclick="addstpFormField(); return false;" class="adding-more" style="font-weight:bold; font-size:21px; color:#0b1cff; text-decoration:none; text-align:center;display:inline-block;width:auto;">+</a>
           </div> 
		   
		    <div id="divTxtstp" > 

                       	</div>    
                 
              
              
          <div class="modal-footer" style="overflow:hidden;">
            <button type="button" class="btn btn-default btn-closse" data-dismiss="modal" style="margin-right:10px;" onclick="closepopup();">Close</button>
          </div>
        </div>
    </div>
</div>
</div>

 <?php  $gasbc=0; ?>
   

<div class="modal fade whatwhlll" id="sectionModal5" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
      <div class="modal-dialog tempcreat-popbox transformercapacity" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close clsepopup" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title bloskinformation" id="favoritesModalLabel">Gas Banks</h4>
          </div>
          <div class="modal-body blockoverhead">
                
              
           <div class="row transofrmers gasbanks-update">
                 <div class="col-sm-1  numbering">
                     <label>S.No</label><br />
                    
                 </div>
                 <div class="col-sm-5 ">
                     <label>Capacity</label>
                    
              </div>
              <div class="col-sm-6">
                   <label>Browse</label>
                  
              </div>
              
                                     <?php $mg = 0; if(count($gasbank) > 0) {
				 $mg = 0;
			foreach($gasbank as $dgcon) { //echo "<pre>"; print_r($dgcon); echo "</pre>";?>
            <div class="col-sm-1 form-group numbering">
                <span><?php $mg = $mg + 1; echo $mg; ?>.</span>
            </div>
            <div class="col-sm-5 form-group"> 
                      <input type="text" class="form-control" name="gacapacity[]" value="<?php echo  $dgcon['capacity']; ?>"/>
                </div>
                <div class="col-sm-6 form-group">
				
				<div class="col-sm-12 select-groupw"> <input type="file" class="form-control" name="gafilename[]"/><?php if(isset($dgcon['filename']))  echo $dgcon['filename']; ?>
                </div>   
                </div>  
             
                <?php } } else { ?>
                <div class="col-sm-1 form-group numbering">
                	<span>1.</span>
                </div>
                <div class="col-xs-5 form-group"> 
                     <input type="text" class="form-control" name="gacapacity[]"  />
                </div>
                <div class="col-xs-6 form-group">  <input type="file" class="form-control" name="gafilename[]"   />
                </div>   
                
                <?php } ?> 
				  <?php if($mg > 0){  $gasbc=$mg - 1; } else {$gasbc = 0;} ?>
                  <input type="hidden" id="gasbc" value="<?php echo ++$gasbc; ?>">
                  
			  <a href="#" onclick="addgasbFormField(); return false;" class="adding-more" style="font-weight:bold; font-size:21px; color:#0b1cff; text-decoration:none; text-align:center;display:inline-block;width:auto;">+</a> 
           </div> 
		   
		    <div id="divTxtgasb" > 

                       	</div>    
                    
          <div class="modal-footer" style="overflow:hidden;">
            <button type="button" class="btn btn-default btn-closse" data-dismiss="modal" style="margin-right:10px;" onclick="closepopup();">Close</button>
          </div>
        </div>
    </div>
</div>
</div>


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
                   <input type="text" name="jockey" class="form-control" value="<?php if(isset($powerpumps['jockey']))  echo $powerpumps['jockey'] ; ?>"  />
              </div>
              <div class="col-sm-6 form-group">
                   <input type="file" name="jockeyfile" class="form-control" /> <?php if(isset($powerpumps['jockeyfile'])) echo $powerpumps['jockeyfile']; ?>
              </div>
           </div>   
          <div class="row pumproomw">
                 <div class="col-sm-2 form-group numbering">
                     <label>Main</label>
                 </div>
                 <div class="col-sm-4 form-group">
                   <input type="text" name="main" class="form-control" value="<?php if(isset($powerpumps['main']))  echo $powerpumps['main'] ; ?>"  />
              </div>
              <div class="col-sm-6 form-group">
                   <input type="file" name="mainfile" class="form-control"   /> <?php if(isset($powerpumps['mainfile'])) echo $powerpumps['mainfile']; ?>
              </div>
           </div>   
          <div class="row pumproomw">
                 <div class="col-sm-2 form-group numbering">
                     <label>DG</label>
                 </div>
                 <div class="col-sm-4 form-group">
                   <input type="text" name="dg" class="form-control"  value="<?php if(isset($powerpumps['dg']))  echo $powerpumps['dg'] ; ?>" />
              </div>
              <div class="col-sm-6 form-group">
                   <input type="file" name="dgfile" class="form-control"   /> <?php if(isset($powerpumps['dgfile'])) echo $powerpumps['dgfile']; ?>
              </div>
           </div>   
           <div class="row pumproomw">
                 <div class="col-sm-2 form-group numbering">
                     <label>Booster</label>
                 </div>
                 <div class="col-sm-4 form-group">
                  <input type="text" name="booster" class="form-control"  value="<?php if(isset($powerpumps['booster']))  echo $powerpumps['booster'] ; ?>" />
              </div>
              <div class="col-sm-6 form-group">
                    <input type="file" name="boosterfile" class="form-control"   />  <?php if(isset($powerpumps['boosterfile'])) echo $powerpumps['boosterfile']; ?>
              </div>
           </div>   
          <div class="modal-footer" style="overflow:hidden;">
            <button type="button" class="btn btn-default btn-closse" data-dismiss="modal" style="margin-right:10px;" onclick="closepopup();">Close</button>
          </div>
        </div>
    </div>
</div>
</div>

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
             <div class="row pumproomw">
                 <div class="col-sm-6 form-group numbering">
                     <label>Passenger Lifts</label>
                     
                     <input type="text" name="passenger_lifts"  id="passenger_lifts" value="<?php if(isset($lifts['passenger_lifts']))  echo $lifts['passenger_lifts'] ; ?>" class="form-control"   />
                 </div>
              <div class="col-sm-6 form-group">
                   <label>Service Lifts</label>
                   <input type="text" name="service_lifts" id="service_lifts"  value="<?php if(isset($lifts['service_lifts']))  echo $lifts['service_lifts'] ; ?>" class="form-control"   />
              </div>
           </div>   
          <div class="row pumproomw">
                 <div class="col-sm-6 form-group numbering">
                     <label>Mitsubishi Electric</label>
                 </div>
              <div class="col-sm-6 form-group">
                   <input type="text" name="mitsub_electric" value="<?php if(isset($lifts['mitsub_electric']))  echo $lifts['mitsub_electric'] ; ?>" class="form-control"   />
              </div>
           </div>  
             <div class="row pumproomw">
                 <div class="col-sm-6 form-group numbering">
                     <label>Jhonson</label>
                 </div>
              <div class="col-sm-6 form-group">
                   <input type="text" name="jhonson"  value="<?php if(isset($lifts['jhonson']))  echo $lifts['jhonson'] ; ?>" class="form-control"   />
              </div>
           </div>   
         
           
          <div class="modal-footer" style="overflow:hidden;">
            <button type="button" class="btn btn-default btn-closse" data-dismiss="modal" style="margin-right:10px;" onclick="closepopup();">Close</button>
          </div>
        </div>
    </div>
</div>
</div>



<?php // END MODEL ?>
      
   

    {!! Form::submit('Update', ['class' => 'btn btn-danger btn-register']) !!}
    {!! Form::close() !!}
  @include('partials.footer')
   <script>
   
function closepopup(){
 $("#sectionModal").modal('hide');
 var blnum = document.getElementById("id").value;
 $("#blocks_num").val(blnum);   
}

function getblockslist(){ 
 $("#sectionModal").modal();
}   
 
function closepopup(){
 $("#sectionModal1").modal('hide');
 var blnum = document.getElementById("id").value;
 $("#blocks_num").val(blnum);   
} 
 
function getflatslist(){ 
 $("#sectionModal1").modal();
}   

function closepopup(){
 $("#sectionModal2").modal('hide');
 var blnum = document.getElementById("id").value;
 $("#blocks_num").val(blnum);   
} 
 
function gettransformerslist(){ 
 $("#sectionModal2").modal();
}   

function closepopup(){
 $("#sectionModal3").modal('hide');
 var blnum = document.getElementById("id").value;
 $("#blocks_num").val(blnum);   
} 
 
function getdgsetslist(){ 
 $("#sectionModal3").modal();
}   

function closepopup(){
 $("#sectionModal4").modal('hide');
 var blnum = document.getElementById("id").value;
 $("#blocks_num").val(blnum);   
} 
 
function getstplist(){ 
 $("#sectionModal4").modal();
}  
function closepopup(){
 $("#sectionModal5").modal('hide');
 var blnum = document.getElementById("id").value;
 $("#blocks_num").val(blnum);   
} 
 
function getgasbanklist(){ 
 $("#sectionModal5").modal();
}  

 
function closepopup(){
 $("#sectionModal6").modal('hide');
 var blnum = document.getElementById("id").value;
 $("#blocks_num").val(blnum);   
} 
 
function getpumproomslist(){ 
 $("#sectionModal6").modal();
}   
 
function closepopup(){
 $("#sectionModal7").modal('hide');
 var blnum = document.getElementById("id").value;
 $("#blocks_num").val(blnum);   
} 
 
function getliftlist(){ 
 $("#sectionModal7").modal();
}    
  
    
function addFormField() {
		var id = document.getElementById("id").value;

		var feet = "";

		if($("#feet").val()!=null) feet=$("#feet").val();   
		
		$("#divTxt").append("<div class='row wonderlaaa' id='row" + id + "' ><div class='col-xs-1 dunacinnumner1'><label>"+parseInt(parseInt(id) + 1)+"</label></div><div class='col-xs-4 form-group'><input type='text' name='blockname[]' class='form-control'></div><div class='col-xs-6 form-group'><select name='name_change_socity[]' class='form-control'><option value='Yes'>Yes</option><option value='No'>No</option><option value='N/A'>N/A</option></select></div><div class='col-sm-1 enterthetedd'><a href='#' onClick='removeFormField(\"#row" + id + "\"); return false;' class='remove removerla'>X</a></div></div></div>");
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

		if($("#feet").val()!=null) feet=$("#feet").val();  
		
		
		$("#divTxttrans").append("<div class='row transofrmers' id='row" + id + "'><div class='col-sm-1 form-group numbering'><span>2.</span></div><div class='col-sm-5 form-group'><input type='text' name='transcapacity[]' class='form-control'/></div><div class='col-sm-6 form-group'><input type='file' name='transfilename[]' class='form-control'/></div><a href='#' onClick='removetransFormField(\"#row" + id + "\"); return false;' class='remove removerla'>X</a></div>");
		
		
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

  // DGSETS
	
	function adddgsFormField() {
		var id = document.getElementById("dgsetsc").value;

		var feet = "";

		if($("#feet").val()!=null) feet=$("#feet").val();  
		
		
		$("#divTxtdgs").append("<div class='row transofrmers' id='row" + id + "'><div class='col-sm-1 form-group numbering'><span>2.</span></div><div class='col-sm-5 form-group'><input type='text' name='dgcapacity[]' class='form-control'/></div><div class='col-sm-6 form-group'><input type='file' name='dgfilename[]' class='form-control'/></div><a href='#' onClick='removedgsFormField(\"#row" + id + "\"); return false;' class='remove removerla'>X</a></div>");
		
		
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

		if($("#feet").val()!=null) feet=$("#feet").val();  
		
		
		$("#divTxtstp").append("<div class='row transofrmers' id='row" + id + "'><div class='col-sm-1 form-group numbering'><span>2.</span></div><div class='col-sm-5 form-group'><input type='text' name='stpcapacity[]' class='form-control'/></div><div class='col-sm-6 form-group'><input type='file' name='stpfilename[]' class='form-control'/></div><a href='#' onClick='removestpFormField(\"#row" + id + "\"); return false;' class='remove removerla'>X</a></div>");
		
		
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
	
	 //GAS BANKS
	 
	 function addgasbFormField() {
		var id = document.getElementById("gasbc").value;

		var feet = "";

		if($("#feet").val()!=null) feet=$("#feet").val();  
		
		
		$("#divTxtgasb").append("<div class='row transofrmers' id='row" + id + "'><div class='col-sm-1 form-group numbering'><span>2.</span></div><div class='col-sm-5 form-group'><input type='text' name='gacapacity[]' class='form-control'/></div><div class='col-sm-6 form-group'><input type='file' name='gafilename[]' class='form-control'/></div><a href='#' onClick='removestpFormField(\"#row" + id + "\"); return false;' class='remove removerla'>X</a></div>");
		
		
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
  
  
 </script>
@stop

