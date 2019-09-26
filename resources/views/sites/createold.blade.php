@extends('layouts.app')

@section('content')
<style>
.footer-main
{
 margin-left:-5px;
}
</style>
  <!--  <h3 class="page-title">Sites</h3>-->
  
    {!! Form::open(['files' => 'true','method' => 'POST', 'route' => ['sites.store']]) !!}

    <div class="panel panel-default panelmar tsas-crseations">
        <div class="panel-heading">
            Communities
        </div>
        
        <div class="panel-body site-seeing">
         
			<div class="row communitybackground">
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
                   <input type="file" class="form-control"  />
                </div>
            </div>
            
            
            <div class="row communitybackground1">
               <label class="col-sm-12  col-xs-12 address">Address</label>
                <div class="col-xs-2 form-group plot-nos">
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
                    <label class="col-sm-12 emptyu">&nbsp;</label>
                    <label>State</label>
                     {!! Form::text('state', old('state'), ['class' => 'form-control', 'placeholder' => '']) !!}
                </div>
                 <div class="col-sm-2 form-group">
                 <label class="col-sm-12 emptyu">&nbsp;</label>
                    <label>Pin Code</label>
                     {!! Form::text('pincode', old('pincode'), ['class' => 'form-control', 'placeholder' => '']) !!}
                </div>
                <div class="col-sm-4 geo">
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
            </div>
                
                <div class="row latiti-longitude communitybackground">
                  
                    
                    
                   <label class="col-sm-12 control-label project-renewal">Project Renewal Maintenance</label>
                   <div class="col-sm-2"> 
                       <label class="control-label">Prepaid</label>
                       <input type="text" class="form-control" placeholder="Start Date" />
                   </div>
                    <div class="col-sm-2"> 
                       <label class="control-label">&nbsp;</label>
                       <input type="text" class="form-control"  placeholder="End Date" />
                   </div>
                   <div class="col-sm-2"> 
                       <label class="control-label">Postpaid</label>
                       <input type="text" class="form-control"  onchange="getpostpaidmaint()" />
                   </div>
                  
                  </div>
                    
                 <div class="row communitybackground1 cerificed-rating"> 
                     
                     <label class="col-sm-12 overview">Over View</label>  
                        <div class="col-sm-2">
                           <label class="control-label">IGBC Certified</label>
                           <select class="form-control" >
                               <option>Yes</option>
                               <option>No</option>
                           </select>
                        </div>
                        <div class="col-sm-2">
                           <label class="control-label">Rating</label>
                           <select class="form-control">
                               <option>Platinum</option>
                               <option>Gold</option>
                               <option>Silver</option>
                           </select>
                        </div>
                 
                    
                    
                   
                  
                     <div class="col-xs-2 form-group rest-ger">
                    {!! Form::label('tot_site_area', 'Total Site Area', ['class' => 'control-label']) !!}
                    {!! Form::text('tot_site_area', old('tot_site_area'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('tot_site_area'))
                        <p class="help-block">
                            {{ $errors->first('tot_site_area') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-2 form-group">
                    {!! Form::label('built_up_area', 'Built Up Area', ['class' => 'control-label']) !!}
                    {!! Form::text('built_up_area', old('built_up_area'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('built_up_area'))
                        <p class="help-block">
                            {{ $errors->first('built_up_area') }}
                        </p>
                    @endif
                </div>
               
                 <div class=" col-sm-2 opensource">
                       <label class="control-label">Open Space</label>
                       <input type="text" class="form-control"  />
                    </div>
              </div>
                
                <div class="row communitybackground blocks-floores">
                    <div class="col-xs-2 form-group flats-villas">
                    {!! Form::label('num_of_flats', 'No.of Flats / Villas', ['class' => 'control-label']) !!}
                    {!! Form::text('num_of_flats', old('num_of_flats'), ['class' => 'form-control', 'placeholder' => '', 'onchange' => 'getflatslist()']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('num_of_flats'))
                        <p class="help-block">
                            {{ $errors->first('num_of_flats') }}
                        </p>
                    @endif
                </div>
                   <div class="col-xs-2 form-group">
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
                  <div class="col-sm-1" style="display:none" id="numblocksdiv">
                    <label>&nbsp;</label>
                    {!! Form::text('num_of_blocks_text', old('plot_num'), ['class' => 'form-control', 'placeholder' => 'Blocks Num', 'onchange' => 'getblockslist()']) !!}
                </div>
                
                
                   <div class="col-xs-2 form-group floors">
                    {!! Form::label('floors_num', 'No of Floors', ['class' => 'control-label']) !!}
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
                 <div class="col-sm-1 floors-text" id="numfloordiv" style="display:none">
                    <label>&nbsp;</label>
					{!! Form::text('num_of_floors_text', old('num_of_floors_text'), ['class' => 'form-control', 'placeholder' => '']) !!}
                </div>
                
                
                <div class="col-sm-2">
                   <label>Basement 1</label>
                   <select class="form-control" name="basement_one">
                       <option value="Yes">Yes</option>
                       <option value="No">No</option>
                       <option value="NA">NA</option>
                    </select>
                </div>
               <!--  <div class="col-sm-2">
                   <label>Basment 2</label>
                   <select class="form-control" name="basement_two">
                       <option value="Yes">Yes</option>
                       <option value="No">No</option>
                       <option value="NA">NA</option>
                    </select>
                </div>-->
                
               
             </div>
             
             
               <div class="row communitybackground1 helicopert">
                 
               <!--  <div class="col-sm-2">
                   <label>Basement 3</label>
                   <select class="form-control" name="basement_three">
                       <option value="Yes">Yes</option>
                       <option value="No">No</option>
                       <option value="NA"> NA</option>
                    </select>
                </div>-->
                
                 <div class="col-sm-2 landscape-area">
                   <label>Landscape Area</label>
				    {!! Form::text('landscape_area', old('landscape_area'), ['class' => 'form-control', 'placeholder' => '']) !!}
                  
                </div>
                <div class="col-xs-2 form-group helopasd">
                    {!! Form::label('helipad_area', 'Helipad Area', ['class' => 'control-label']) !!}
                     <select class="form-control" name="helipad">
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
                  <div class="col-sm-2 heliareaa">
                   <label class="col-sm-12">&nbsp;</label>
                    {!! Form::text('helipad_text', old('helipad_text'), ['class' => 'form-control', 'placeholder' => '']) !!}<span>(Mtrs)</span>
                </div>
                
                
                <div class="col-sm-3">
                    <label>&nbsp;</label>
                    <input type="file" class="form-control" name="helippad_file"  />
                </div>
             </div>
             
             
             <div class="row communitybackground group-elevators">
                
                   <label class="col-sm-12 control-label elevators">Elevators</label>
                   <div class="col-sm-2 form-group rainwater-harvesting">
                       <label class="control-label">Rainwater Harvesting Pits</label>
                       <input type="text" class="form-control"  />
                   </div>
                   <div class="col-xs-2 form-group lisfts">
                    {!! Form::label('lifts', 'Lifts', ['class' => 'control-label']) !!}
                    {!! Form::text('lifts', old('lifts'), ['class' => 'form-control', 'placeholder' => '', 'id' => 'lifts', 'onchange' => 'getliftlist()']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('lifts'))
                        <p class="help-block">
                            {{ $errors->first('lifts') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-2 form-group">
                    <label class="control-label">BMS</label>
                    <select class="form-control">
                        <option>Prepaid  Systems</option>
                        <option>PostPaid Systems</option>
                    </select>
                    <?php /*?>{!! Form::label('prepaid_systems', 'Prepaid Systems', ['class' => 'control-label']) !!}<?php */?>
                   <?php /*?> {!! Form::text('prepaid_systems', old('prepaid_systems'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('prepaid_systems'))
                        <p class="help-block">
                            {{ $errors->first('prepaid_systems') }}
                        </p>
                    @endif<?php */?>
                </div>
               <div class="col-sm-4 form-group bms-group">
                    <label class="col-sm-12 emptyu">&nbsp;</label>
                    <ul>
                       <li><input type="checkbox"  /> Electricity </li>
                       <li><input type="checkbox"  /> Recticulated Gas system</li>
                       <li><input type="checkbox"  /> Water </li>
                    </ul>
               </div>
               <div class="col-sm-2">
                   <label class="control-label">Irrigation System </label>
                   <select class="form-control">
                       <option>Auto</option>
                       <option>Manual</option>
                   </select>
               </div>
             </div>
             
               <div class="row communitybackground1 electical-distribution-sustem">
                   <label class="col-sm-12 control-label sidtrinution">Electrical Distribution System</label>
                   <div class="col-sm-3 form-group">
                       <label class="control-label">Contracted MD (KVA/HP)</label>
                       <input type="text" class="form-control"  />
                   </div>
                    <div class="col-sm-2 form-group">
                       <label class="control-label">Specified Voltage(KV)</label>
                       <input type="text" class="form-control"  />
                   </div>
                   <div class="col-sm-2 form-group">
                       <label class="control-label">Actual Voltage(KV)</label>
                       <input type="text" class="form-control"  />
                   </div>
                   <div class="col-sm-2 form-group">
                       <label class="control-label">Feeder</label>
                       <input type="text" class="form-control"  />
                   </div>
                   <div class="col-sm-2 form-group">
                       <label class="control-label">Category</label>
                       <input type="text" class="form-control"  />
                   </div>
                   
                   <div class="col-xs-2 form-group transfomerss">
                    {!! Form::label('transformers', 'Transformers', ['class' => 'control-label']) !!}
                    {!! Form::text('transformers', old('transformers'), ['class' => 'form-control', 'placeholder' => '', 'onchange' => 'gettransformerslist()']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('transformers'))
                        <p class="help-block">
                            {{ $errors->first('transformers') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-2 form-group setsdg">
                    {!! Form::label('dgsets', 'DG sets', ['class' => 'control-label']) !!}
                    {!! Form::text('dgsets', old('dgsets'), ['class' => 'form-control', 'placeholder' => '', 'onchange' => 'getdgsetslist()']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('dgsets'))
                        <p class="help-block">
                            {{ $errors->first('dgsets') }}
                        </p>
                    @endif
                </div>
                   <div class="col-xs-2 form-group power-bakcup">
                    <label>Power Back-Up</label>
                    {!! Form::text('power_backup', old('power_backup'), ['class' => 'form-control', 'placeholder' => '']) !!}
                </div>
                
               
                <div class="col-sm-2 no-file-chosem">
                     <label>&nbsp;</label>
                     <input type="file" class="form-control"  name="power_backup_file" />
                </div>
                  <div class="col-xs-2 form-group solar-power">
                    {!! Form::label('solar_power', 'Solar Power', ['class' => 'control-label']) !!}
                      <select class="form-control" name="solar_power">
                       <option>Yes</option>
                       <option>No</option>
                    </select>
                   <?php /*?> {!! Form::text('solar_power', old('solar_power'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('solar_power'))
                        <p class="help-block">
                            {{ $errors->first('solar_power') }}
                        </p>
                    @endif<?php */?>
                </div>
                 <div class="col-xs-2 form-group solar-powert-text">
                   <label>&nbsp;</label>
                    {!! Form::text('solar_pwr_text', old('solar_pwr_text'), ['class' => 'form-control', 'placeholder' => '']) !!}
                </div>
                
                 <div class="col-xs-2 form-group power-browser">
                     <label>&nbsp;</label>
                     <input type="file" class="form-control" name="solar_pwr_file" />
                 </div>
                
               </div>
               
                <div class="row communitybackground srp-wep">
                    <label class="col-sm-12 control-label municipal">Water Distribution System</label>
                    <div class="col-sm-2 water-muncicipat">
                       <label class="control-label">Municipal Water</label>
                       <input type="text" class="form-control"  />
                    </div>
                    
                    
                    <div class="col-xs-2 form-group wsp">
                     
                    {!! Form::label('wsp', 'WSP', ['class' => 'control-label']) !!}
                    {!! Form::text('wsp', old('wsp'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('wsp'))
                        <p class="help-block">
                            {{ $errors->first('wsp') }}
                        </p>
                    @endif
                </div> 
                   <div class="col-xs-3 no-file-chosen">
                    <label>&nbsp;</label>
                    <input type="file" class="form-control" name="wsp_file"  />
                </div>
                   <div class="col-xs-2 form-group stp">
                   
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
                
                   <label>Hydro Pneumatic System</label>
                  {!! Form::text('hydro_pneumatic_sys', old('hydro_pneumatic_sys'), ['class' => 'form-control', 'placeholder' => '', 'onchange' => 'gethydropneumaticlist()']) !!}
                </div>
                <div class="col-xs-3 no-file-chosen">
                   <label>&nbsp;</label>
                   <input type="file" class="form-control" name="hydro_pneumatic_sys_file" />
                </div>
                
             </div>
             
             <div class="row communitybackground1 all-fiee-measure">
                     <div class="col-sm-2 reticulated">
                     <label class="reticulatedpoped">Reticulated Piped Gas  </label>
                    {!! Form::label('gas_banks', 'Gas Banks', ['class' => 'control-label']) !!}
                    {!! Form::text('gas_banks', old('gas_banks'), ['class' => 'form-control', 'placeholder' => '', 'onchange' => 'getgasbanklist()']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('gas_banks'))
                        <p class="help-block">
                            {{ $errors->first('gas_banks') }}
                        </p>
                    @endif
                    </div>
               
                  
                    <label class="col-sm-10 fire-safety">Fire & Safety</label>
                    <div class="col-sm-2 form-group fire-pump-hosese">
                    {!! Form::label('fire_pump_rooms', 'Fire Pump Rooms', ['class' => 'control-label']) !!}
                    {!! Form::text('fire_pump_rooms', old('fire_pump_rooms'), ['class' => 'form-control', 'placeholder' => '',  'onchange' => 'getpumproomslist()']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('fire_pump_rooms'))
                        <p class="help-block">
                            {{ $errors->first('fire_pump_rooms') }}
                        </p>
                    @endif
                  </div>
                  <div class="col-sm-2 form-group">
                      <label class="control-label">Public Addressing  System</label>
                      <input type="text" class="form-control"  />
                  </div>
                   <div class="col-sm-3 form-group no-file-chosen">
                      <label class="control-label emptyu">&nbsp;</label>
                      <input type="file" class="form-control"  />
                  </div>
                   <div class="col-sm-2 form-group">
                      <label class="control-label">Fire Alarm System</label>
                      <input type="text" class="form-control"  />
                  </div>
                   <div class="col-sm-3 form-group no-file-chosen">
                      <label class="control-label emptyu">&nbsp;</label>
                      <input type="file" class="form-control"  />
                  </div>
                   <div class="col-sm-2 form-group">
                      <label class="control-label">Dectectors</label>
                      <input type="text" class="form-control"  />
                  </div>
                   <div class="col-sm-3 form-group no-file-chosen">
                      <label class="control-label emptyu">&nbsp;</label>
                      <input type="file" class="form-control"  />
                  </div>
                 <div class="col-sm-2"> 
                   
                    <label class="control-label">Solar Water Heaters</label>
                    <input type="text" class="form-control"  />
                </div>
                <div class="col-sm-3 no-file-chosen">
                   
                    <label class="col-sm-12 emptyu">&nbsp;</label>
                    <input type="file" class="form-control"  />
                </div>
             </div>
             
              <div class="row communitybackground secuirty-puropose">
                   <label class="col-sm-12 control-label security">Security</label>
                   <div class="col-sm-2 boom-barrier">
                       <label class="col-sm-12">Boom Barrier</label>
                       <input type="text" class="form-control"  />
                   </div>
                   <div class="col-sm-3 no-file-chosen">
                       <label class="control-label emptyu">&nbsp;</label>
                       <input type="file" class="form-control" />
                   </div>
                   
                    <div class="col-sm-2 cctv">
                       <label class="col-sm-12">CCTV</label>
                       <input type="text" class="form-control"  />
                   </div>
                     <div class="col-sm-3 no-file-chosen">
                       <label class="control-label emptyu">&nbsp;</label>
                       <input type="file" class="form-control" />
                   </div>
                    <div class="col-sm-2 solar-fencing">
                       <label class="col-sm-12">Solar Fencing</label>
                       <input type="text" class="form-control"  />
                   </div>
                     <div class="col-sm-3 no-file-chosen">
                       <label class="control-label emptyu">&nbsp;</label>
                       <input type="file" class="form-control" />
                   </div>
             </div>
             
             <div class="row communitybackground1 slub-house">
                 <label class="col-sm-12 control-label label-house">Club House</label>
                 <div class="col-sm-2 form-group badimonth-court">
                     <label class="control-label">Badminton Court</label>
                     <select class="form-control">
                         <option>Available</option>
                         <option>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group ">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="text" class="form-control" />
                 </div>
                  <div class="col-sm-2 form-group badimonth-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control" />
                 </div>
                 
                 <div class="col-sm-2 form-group squash-court">
                     <label class="control-label">Squash Court</label>
                     <select class="form-control">
                         <option>Available</option>
                         <option>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="text" class="form-control" />
                 </div>
                  <div class="col-sm-2 form-group squash-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control" />
                 </div>
                 
                 <div class="col-sm-2 form-group kitchen">
                     <label class="control-label">Kitchen</label>
                     <select class="form-control">
                         <option>Available</option>
                         <option>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="text" class="form-control" />
                 </div>
                  <div class="col-sm-2 form-group kitchen-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control" />
                 </div>
                 
                 <div class="col-sm-2 form-group multi-purpose">
                     <label class="control-label">Multi Purpose Hall</label>
                     <select class="form-control">
                         <option>Available</option>
                         <option>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="text" class="form-control" />
                 </div>
                  <div class="col-sm-2 form-group multi-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control" />
                 </div>
                 
                 <div class="col-sm-2 form-group clinic">
                     <label class="control-label">Clinic</label>
                     <select class="form-control">
                         <option>Available</option>
                         <option>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="text" class="form-control" />
                 </div>
                  <div class="col-sm-2 form-group clinic-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control" />
                 </div>
                 
                 <div class="col-sm-2 form-group gym">
                     <label class="control-label">GYM</label>
                     <select class="form-control">
                         <option>Available</option>
                         <option>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="text" class="form-control" />
                 </div>
                  <div class="col-sm-2 form-group gym-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control" />
                 </div>
                 
                   <div class="col-sm-2 form-group aerobices">
                     <label class="control-label">Aerobics</label>
                     <select class="form-control">
                         <option>Available</option>
                         <option>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="text" class="form-control" />
                 </div>
                  <div class="col-sm-2 form-group aerobics-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control" />
                 </div>
                 
                   <div class="col-sm-2 form-group cafeteria">
                     <label class="control-label">Cafeteria</label>
                     <select class="form-control">
                         <option>Available</option>
                         <option>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="text" class="form-control" />
                 </div>
                  <div class="col-sm-2 form-group cafeteria-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control" />
                 </div>
                 
                   <div class="col-sm-2 form-group lounge">
                     <label class="control-label">Lounge</label>
                     <select class="form-control">
                         <option>Available</option>
                         <option>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="text" class="form-control" />
                 </div>
                  <div class="col-sm-2 form-group lounge-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control" />
                 </div>
                 
                   <div class="col-sm-2 form-group library">
                     <label class="control-label">Library</label>
                     <select class="form-control">
                         <option>Available</option>
                         <option>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="text" class="form-control" />
                 </div>
                  <div class="col-sm-2 form-group library-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control" />
                 </div>
                 
                   <div class="col-sm-2 form-group spa">
                     <label class="control-label">SPA</label>
                     <select class="form-control">
                         <option>Available</option>
                         <option>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="text" class="form-control" />
                 </div>
                  <div class="col-sm-2 form-group spa-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control" />
                 </div>
                 
                   <div class="col-sm-2 form-group yoga">
                     <label class="control-label">Yoga/Meditation Room</label>
                     <select class="form-control">
                         <option>Available</option>
                         <option>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group yoga-input">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="text" class="form-control" />
                 </div>
                  <div class="col-sm-2 form-group yoga-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control" />
                 </div>
                 
                   <div class="col-sm-2 form-group home-theatre">
                     <label class="control-label">Home Theatre</label>
                     <select class="form-control">
                         <option>Available</option>
                         <option>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="text" class="form-control" />
                 </div>
                  <div class="col-sm-2 form-group home-theatre-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control" />
                 </div>
                 
                 <div class="col-sm-2 form-group guest-rooms">
                     <label class="control-label">Guest Rooms</label>
                     <select class="form-control">
                         <option>Available</option>
                         <option>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="text" class="form-control" />
                 </div>
                  <div class="col-sm-2 form-group guest-rooms-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control" />
                 </div>
                 
                 <div class="col-sm-2 form-group indoor-games">
                     <label class="control-label">Indoor Games</label>
                     <select class="form-control">
                         <option>Available</option>
                         <option>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="text" class="form-control" />
                 </div>
                  <div class="col-sm-2 form-group indoor-games-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control" />
                 </div>
                 
                 <div class="col-sm-2 form-group waiting-lounge">
                     <label class="control-label">Waiting lounge</label>
                     <select class="form-control">
                         <option>Available</option>
                         <option>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="text" class="form-control" />
                 </div>
                  <div class="col-sm-2 form-group waiting-lounge-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control" />
                 </div>
                 
                 <div class="col-sm-2 form-group changing-rooms">
                     <label class="control-label">Changing Rooms</label>
                     <select class="form-control">
                         <option>Available</option>
                         <option>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="text" class="form-control" />
                 </div>
                  <div class="col-sm-2 form-group changing-rooms-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control" />
                 </div>
                 
                 <div class="col-sm-2 form-group banquet-halls">
                     <label class="control-label">Banquet Hall</label>
                     <select class="form-control">
                         <option>Available</option>
                         <option>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="text" class="form-control" />
                 </div>
                  <div class="col-sm-2 form-group banquet-halls-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control" />
                 </div>
                 
                 <div class="col-sm-2 form-group pantry">
                     <label class="control-label">Pantry</label>
                     <select class="form-control">
                         <option>Available</option>
                         <option>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="text" class="form-control" />
                 </div>
                  <div class="col-sm-2 form-group pantry-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control" />
                 </div>
                 
                 <div class="col-sm-2 form-group service-rooms">
                     <label class="control-label">Service Room</label>
                     <select class="form-control">
                         <option>Available</option>
                         <option>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="text" class="form-control" />
                 </div>
                  <div class="col-sm-2 form-group service-rooms-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control" />
                 </div>
                 
                 <div class="col-sm-2 form-group swimming-pool">
                     <label class="control-label">Swimming Pool</label>
                     <select class="form-control">
                         <option>Available</option>
                         <option>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2">
                    <label class="control-label">Indoor pool</label>
                    <input type="text" class="form-control"  />
                 </div>
                  <div class="col-sm-2">
                    <label class="control-label">Outdoor Pool</label>
                    <input type="text" class="form-control"  />
                 </div>
                  <div class="col-sm-2">
                    <label class="control-label">Baby Pool</label>
                    <input type="text" class="form-control"  />
                 </div>
                 
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="text" class="form-control" />
                 </div>
                  <div class="col-sm-2 form-group swimming-pool-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control" />
                 </div>
                  <div class="col-sm-2 form-group open-restaurant">
                     <label class="control-label">Open Restaurant</label>
                     <select class="form-control">
                         <option>Available</option>
                         <option>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="text" class="form-control" />
                 </div>
                  <div class="col-sm-2 form-group open-restaurant-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control" />
                 </div>
                  <div class="col-sm-2 form-group sitting-area">
                     <label class="control-label">Sitting area</label>
                     <select class="form-control">
                         <option>Available</option>
                         <option>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="text" class="form-control" />
                 </div>
                  <div class="col-sm-2 form-group sitting-area-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control" />
                 </div>
                  <div class="col-sm-2 form-group super-market">
                     <label class="control-label">Super market</label>
                     <select class="form-control">
                         <option>Available</option>
                         <option>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="text" class="form-control" />
                 </div>
                  <div class="col-sm-2 form-group super-market-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control" />
                 </div>
                  <div class="col-sm-2 form-group creche">
                     <label class="control-label">Creche</label>
                     <select class="form-control">
                         <option>Available</option>
                         <option>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="text" class="form-control" />
                 </div>
                  <div class="col-sm-2 form-group creche-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control" />
                 </div>
                  <div class="col-sm-2 form-group tennis-court">
                     <label class="control-label">Tennis Court</label>
                     <select class="form-control">
                         <option>Available</option>
                         <option>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="text" class="form-control" />
                 </div>
                  <div class="col-sm-2 form-group tennis-court-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control" />
                 </div>
                  <div class="col-sm-2 form-group basketball-court">
                     <label class="control-label">Basketball Court</label>
                     <select class="form-control">
                         <option>Available</option>
                         <option>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="text" class="form-control" />
                 </div>
                  <div class="col-sm-2 form-group basketball-court-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control" />
                 </div>
                  <div class="col-sm-2 form-group cricket-net">
                     <label class="control-label">Cricket Net</label>
                     <select class="form-control">
                         <option>Available</option>
                         <option>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="text" class="form-control" />
                 </div>
                  <div class="col-sm-2 form-group cricket-net-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control" />
                 </div>
                  <div class="col-sm-2 form-group volley-ball">
                     <label class="control-label">Volley Ball</label>
                     <select class="form-control">
                         <option>Available</option>
                         <option>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="text" class="form-control" />
                 </div>
                  <div class="col-sm-2 form-group volley-ball-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control" />
                 </div>
                  <div class="col-sm-2 form-group skating">
                     <label class="control-label">Skating</label>
                     <select class="form-control">
                         <option>Available</option>
                         <option>Not Available</option>
                     </select>
                 </div>
                 <div class="col-sm-2 form-group">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="text" class="form-control" />
                 </div>
                  <div class="col-sm-2 form-group skating-text">
                    <label class="control-label emnptyu">&nbsp;</label>
                    <input type="file" class="form-control" />
                 </div>
                 
                 
                 <div class="col-xs-3 form-group">
                   <label>Guide</label>
                   <input type="file" class="form-control" name="guide_file" />
                </div>
             </div>
             		  
            
        </div>
    </div>  
    <?php  $n=0; ?>
    <input type="hidden" id="id" value="<?php echo ++$n; ?>">
    <div class="modal fade whatwhlll" id="sectionModal" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel">
    <div class="modal-dialog tempcreat-popbox" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" 
              data-dismiss="modal" 
              aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title bloskinformation" 
            id="favoritesModalLabel">Blocks Information</h4>
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
                <div class="col-xs-1 dunacinnumner">
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
                 <a href="#" onclick="addFormField(); return false;" class="adding-more" style="font-weight:bold; font-size:21px; color:#0b1cff; text-decoration:none; text-align:center;display:inline-block;width:auto;position:relative;">+</a></div>
                        <div id="divTxt" class="row"> 

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
                    <input type="text" name="onebhk" class="form-control"  /> 
                 </div>      
             </div>
              <div class="row">
                 <div class="col-sm-3 form-group two-check">
                   2BHK
                 </div> 
                  <div class="col-sm-6 form-group">
                    <input type="text" name="twobhk" class="form-control"  /> 
                 </div>      
             </div>
              <div class="row">
                 <div class="col-sm-3 form-group three-check">
                    3BHK
                 </div> 
                  <div class="col-sm-6 form-group">
                    <input type="text" name="threebhk" class="form-control"  /> 
                 </div>      
             </div>
              <div class="row">
                 <div class="col-sm-3 form-group four-check">
                     4BHK
                 </div> 
                  <div class="col-sm-6 form-group">
                    <input type="text" name="fourbhk" class="form-control"  /> 
                 </div>      
             </div>
              <div class="row">
                 <div class="col-sm-3 form-group five-check">
                   5BHK
                 </div> 
                  <div class="col-sm-6 form-group">
                    <input type="text" name="fivebhk" class="form-control"  /> 
                 </div>      
             </div>
           </div>   
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-closse" data-dismiss="modal" style="margin-right:10px;" onclick="closepopup();">Submit</button>
          </div>
        </div>
    </div>
</div>

 <?php  $trans=0; ?>
    <input type="hidden" id="trans" value="<?php echo ++$trans; ?>">
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
                 <div class="col-sm-1 form-group numbering">
                     <label>S.No</label><br />
                     <span>1.</span>
                 </div>
                 <div class="col-sm-5 form-group">
                     <label>Capacity</label>
                     <input type="text" class="form-control" name="transcapacity[]"  />
              </div>
              <div class="col-sm-6 form-group">
                   <label>Browse</label>
                   <input type="file" class="form-control" name="transfilename[]"   />
              </div>
			  <a href="#" onclick="addtransFormField(); return false;" class="adding-more" style="font-weight:bold; font-size:21px; color:#0b1cff; text-decoration:none; text-align:center;display:inline-block;width:auto;">+</a>
           </div>   
                        <div id="divTxttrans"> 

                       	</div>  
          <div class="modal-footer" style="overflow:hidden;">
            <button type="button" class="btn btn-default btn-closse" data-dismiss="modal" style="margin-right:10px;" onclick="closepopup();">Submit</button>
          </div>
        </div>
    </div>
</div>
</div>
 <?php  $dgsetsc=0; ?>
    <input type="hidden" id="dgsetsc" value="<?php echo ++$dgsetsc; ?>">

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
                 <div class="col-sm-1 form-group numbering">
                     <label>S.No</label><br />
                     <span>1.</span>
                 </div>
                 <div class="col-sm-5 form-group">
                     <label>Capacity</label>
                     <input type="text" class="form-control" name="dgcapacity[]"  />
              </div>
              <div class="col-sm-6 form-group">
                   <label>Browse</label>
                   <input type="file" class="form-control"  name="dgfilename[]"   />
              </div>
			  <a href="#" onclick="adddgsFormField(); return false;" class="adding-more" style="font-weight:bold; font-size:21px; color:#0b1cff; text-decoration:none; text-align:center;display:inline-block;width:auto;">+</a>
           </div> 
		   
		    <div id="divTxtdgs"> 

                       	</div>    
              
              
          <div class="modal-footer" style="overflow:hidden;">
            <button type="button" class="btn btn-default btn-closse" data-dismiss="modal" style="margin-right:10px;" onclick="closepopup();">Submit</button>
          </div>
        </div>
    </div>
</div>
</div>
 <?php  $stpc=0; ?>
    <input type="hidden" id="stpc" value="<?php echo ++$stpc; ?>">
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
                 <div class="col-sm-1 form-group numbering">
                     <label>S.No</label><br />
                     <span>1.</span>
                 </div>
                 <div class="col-sm-5 form-group">
                     <label>Capacity</label>
                     <input type="text" class="form-control"  name="stpcapacity[]"  />
              </div>
              <div class="col-sm-6 form-group">
                   <label>Browse</label>
                   <input type="file" class="form-control"   name="stpfilename[]"   />
              </div>
			  <a href="#" onclick="addstpFormField(); return false;" class="adding-more" style="font-weight:bold; font-size:21px; color:#0b1cff; text-decoration:none; text-align:center;display:inline-block;width:auto;">+</a>
           </div> 
		   
		    <div id="divTxtstp"> 

                       	</div>    
                 
              
              
          <div class="modal-footer" style="overflow:hidden;">
            <button type="button" class="btn btn-default btn-closse" data-dismiss="modal" style="margin-right:10px;" onclick="closepopup();">Submit</button>
          </div>
        </div>
    </div>
</div>
</div>

 <?php  $gasbc=0; ?>
    <input type="hidden" id="gasbc" value="<?php echo ++$gasbc; ?>">

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
                 <div class="col-sm-1 form-group numbering">
                     <label>S.No</label><br />
                     <span>1.</span>
                 </div>
                 <div class="col-sm-5 form-group">
                     <label>Capacity</label>
                     <input type="text" class="form-control" name="gacapacity[]"  />
              </div>
              <div class="col-sm-6 form-group">
                   <label>Browse</label>
                   <input type="file" class="form-control"  name="gafilename[]"   />
              </div>
			  <a href="#" onclick="addgasbFormField(); return false;" class="adding-more" style="font-weight:bold; font-size:21px; color:#0b1cff; text-decoration:none; text-align:center;display:inline-block;width:auto;">+</a>
           </div> 
		   
		    <div id="divTxtgasb"> 

                       	</div>    
                    
          <div class="modal-footer" style="overflow:hidden;">
            <button type="button" class="btn btn-default btn-closse" data-dismiss="modal" style="margin-right:10px;" onclick="closepopup();">Submit</button>
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
                   <input type="text" name="jockey" class="form-control"  />
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
                   <input type="text" name="main" class="form-control"  />
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
                   <input type="text" name="dg" class="form-control"  />
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
                  <input type="text" name="booster" class="form-control"  />
              </div>
              <div class="col-sm-6 form-group">
                    <input type="file" name="boosterfile" class="form-control"   /> 
              </div>
           </div>   
          <div class="modal-footer" style="overflow:hidden;">
            <button type="button" class="btn btn-default btn-closse" data-dismiss="modal" style="margin-right:10px;" onclick="closepopup();">Submit</button>
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
                     <input type="text" name="passenger_lifts"  id="passenger_lifts" class="form-control"   />
                 </div>
              <div class="col-sm-6 form-group">
                   <label>Service Lifts</label>
                   <input type="text" name="service_lifts" id="service_lifts" class="form-control"   />
              </div>
           </div>   
          <div class="row pumproomw">
                 <div class="col-sm-6 form-group numbering">
                     <label>Mitsubishi Electric</label>
                 </div>
              <div class="col-sm-6 form-group">
                   <input type="text" name="mitsub_electric" class="form-control"   />
              </div>
           </div>  
             <div class="row pumproomw">
                 <div class="col-sm-6 form-group numbering">
                     <label>Jhonson</label>
                 </div>
              <div class="col-sm-6 form-group">
                   <input type="text" name="jhonson" class="form-control"   />
              </div>
           </div>   
         
           
          <div class="modal-footer" style="overflow:hidden;">
            <button type="button" class="btn btn-default btn-closse" data-dismiss="modal" style="margin-right:10px;" onclick="closepopup();">Submit</button>
          </div>
        </div>
    </div>
</div>
</div>


<div class="modal fade whatwhlll" id="sectionModal8" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
      <div class="modal-dialog tempcreat-popbox pneumactic-information" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close clsepopup" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title bloskinformation" id="favoritesModalLabel">Hydro Pneumatic System</h4>
          </div>
          <div class="modal-body blockoverhead">
          <div class="row pumproomw">
                 <div class="col-sm-4  numbering">
                     <label>Water Supply</label>
                 </div>
                 <div class="col-sm-4">
                   <label class="control-label">No of Pumps</label>
              </div>
              <div class="col-sm-4">
                   <label class="control-label">Capacity</label>
              </div>
           </div>
             <div class="row pumnphysro">
                 <div class="col-sm-4 form-group numbering">
                     <label>Municipal</label>
                 </div>
                 <div class="col-sm-4 form-group">
                   <input type="text"  class="form-control"  />
              </div>
              <div class="col-sm-4 form-group">
                   <input type="text"  class="form-control"   />
              </div>
           </div>   
          <div class="row pumnphysro">
                 <div class="col-sm-4 form-group numbering">
                     <label>Domestic</label>
                 </div>
                 <div class="col-sm-4 form-group">
                   <input type="text"  class="form-control"  />
              </div>
              <div class="col-sm-4 form-group">
                   <input type="text"  class="form-control"   />
              </div>
           </div>  
             <div class="row pumnphysro">
                 <div class="col-sm-4 form-group numbering">
                     <label>Flush</label>
                 </div>
                 <div class="col-sm-4 form-group">
                   <input type="text"  class="form-control"  />
              </div>
              <div class="col-sm-4 form-group">
                   <input type="text" class="form-control"   />
              </div>
           </div>   
         
           
          <div class="modal-footer" style="overflow:hidden;">
            <button type="button" class="btn btn-default btn-closse" data-dismiss="modal" style="margin-right:10px;" onclick="closepopup();">Submit</button>
          </div>
        </div>
    </div>
</div>
</div>


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
                 <div class="col-sm-2  numbering">
                     <label>S.No</label>
                 </div>
                 <div class="col-sm-5">
                   <label class="control-label">Start Date</label>
              </div>
              <div class="col-sm-5">
                   <label class="control-label">End Date</label>
              </div>
           </div>
             <div class="row pumnphysro">
                 <div class="col-sm-2 form-group numbering">
                     <label>1.</label>
                 </div>
                 <div class="col-sm-5 form-group">
                   <input type="text"  class="form-control"  />
              </div>
              <div class="col-sm-5 form-group">
                   <input type="text"  class="form-control"   />
              </div>
           </div>   
          <div class="row pumnphysro">
                 <div class="col-sm-2 form-group numbering">
                     <label>2.</label>
                 </div>
                 <div class="col-sm-5 form-group">
                   <input type="text"  class="form-control"  />
              </div>
              <div class="col-sm-5 form-group">
                   <input type="text"  class="form-control"   />
              </div>
           </div>  
             <div class="row pumnphysro">
                 <div class="col-sm-2 form-group numbering">
                     <label>3.</label>
                 </div>
                 <div class="col-sm-5 form-group">
                   <input type="text"  class="form-control"  />
              </div>
              <div class="col-sm-5 form-group">
                   <input type="text" class="form-control"   />
              </div>
           </div>   
         
           
          <div class="modal-footer" style="overflow:hidden;">
            <button type="button" class="btn btn-default btn-closse" data-dismiss="modal" style="margin-right:10px;" onclick="closepopup();">Submit</button>
          </div>
        </div>
    </div>
</div>
</div>
<?php // END MODEL ?>
              



</div>
   
{!! Form::submit('Submit', ['class' => 'btn btn-danger btn-register']) !!}
{!! Form::close() !!}

 <script>
function getDeiselsum(){

 $("#sectionModal").modal('hide');

}


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
 $("#sectionModal8").modal('hide');
 var blnum = document.getElementById("id").value;
 $("#blocks_num").val(blnum);   
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
 $("#sectionModal9").modal();
}   
 
 
function closepopup(){

  var lifone = 0;
   var lifttwo = 0;
   
  lifone = document.getElementById("passenger_lifts").value;
   lifttwo = document.getElementById("service_lifts").value;
  if(lifone == ""){lifone = 0;}
  if(lifttwo == ""){lifttwo = 0;} 
  var intval = parseInt(lifone) + parseInt(lifttwo)
 $("#lifts").val(intval);   
  $("#sectionModal7").modal('hide');
} 
 
function getliftlist(){ 
 $("#sectionModal7").modal();
}   

function addFormField() {
		var id = document.getElementById("id").value;

		var feet = "";

		if($("#feet").val()!=null) feet=$("#feet").val();   
		
		$("#divTxt").append("<div class='wonderlaaa' id='row" + id + "' ><div class='col-xs-1 dunacinnumner1'><label>"+parseInt(parseInt(id) + 1)+"</label></div><div class='col-xs-4 form-group'><input type='text' name='blockname[]' class='form-control'></div><div class='col-xs-6 form-group'><select name='name_change_socity[]' class='form-control'><option value='Yes'>Yes</option><option value='No'>No</option><option value='N/A'>N/A</option></select></div><div class='col-sm-1 enterthetedd'><a href='#' onClick='removeFormField(\"#row" + id + "\"); return false;' class='remove removerla'>X</a></div></div></div>");
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
  @include('partials.footer')
@stop

