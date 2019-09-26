
        <style>
		.blue-strip p
		{
		 margin:5px 0px;
		}
		.error
		{
			border:2px solid #FF0000 !important;
		}
		.hedbg 
		{
		width:100%;
		margin-bottom:6px;
		margin-top:5px;
		padding:0px;
		background-color:#ffc10724;
		}
		.hedbg2 
		{
		width:100%;
		margin-bottom:6px;
		padding:0px;
		background-color:#f9f7f7;
		}
		</style>
         
         <div class="title">&nbsp;</div>
         <div class="hedbg">
			<div class="row firerwe">
            	<div class="title1">Jockey Pump:</div>
                <div class="col-xs-12 form-group hedin">
                    {!! Form::label('jpmin', 'Total', ['class' => 'control-label']) !!}
                    {!! Form::text('jockeypump', $res['jockeypump'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
					 {{ Form::hidden('record', $res['id']) }}
                    <p class="help-block"></p>
                    @if($errors->has('jpmin'))
                        <p class="help-block">
                            {{ $errors->first('jpmin') }}
                        </p>
                    @endif
                </div> 
            </div>
           <!-- <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('jpmax', 'Max Value', ['class' => 'control-label']) !!}
                    {!! Form::text('jpmax', old('jpmax'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('jpmax'))
                        <p class="help-block">
                            {{ $errors->first('jpmax') }}
                        </p>
                    @endif
                </div>
            </div>-->
            
           
			 	<div class="row firerwe">
                <div class="title1">Main Pump:</div> 
                <div class="col-xs-12 form-group hedin">
                    {!! Form::label('mainpump', 'Total', ['class' => 'control-label']) !!}
                   {!! Form::text('mainpump', $res['mainpump'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('jpmin'))
                        <p class="help-block">
                            {{ $errors->first('jpmin') }}
                        </p>
                    @endif
                </div>
            </div>
           <!-- <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('jpmax', 'Max Value', ['class' => 'control-label']) !!}
                    {!! Form::text('jpmax', old('jpmax'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('jpmax'))
                        <p class="help-block">
                            {{ $errors->first('jpmax') }}
                        </p>
                    @endif
                </div>
            </div>-->
           
           	<div class="row firerwe">
            	<div class="title1">DG PUMP:</div>  
                <div class="col-xs-12 form-group hedin">
                    {!! Form::label('dgpump', 'Total', ['class' => 'control-label']) !!}
                    {!! Form::text('dgpump', $res['dgpump'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('jpmin'))
                        <p class="help-block">
                            {{ $errors->first('jpmin') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row firerwe">
            	<div class="title1">Diesel Tank:</div>  
                <div class="col-xs-12 form-group hedin">
                    {!! Form::label('dgtank', 'Total', ['class' => 'control-label']) !!}
                    {!! Form::text('dgtank', $res['dgtank'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('jpmin'))
                        <p class="help-block">
                            {{ $errors->first('jpmin') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row firerwe">
            	<div class="title1">Battery:</div>  
                <div class="col-xs-12 form-group hedin">
                    {!! Form::label('battery', 'Total', ['class' => 'control-label']) !!}
                    {!! Form::text('battery', $res['battery'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('jpmin'))
                        <p class="help-block">
                            {{ $errors->first('jpmin') }}
                        </p>
                    @endif
                </div>
            </div>
            <!--<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('jpmax', 'Max Value', ['class' => 'control-label']) !!}
                    {!! Form::text('jpmax', old('jpmax'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('jpmax'))
                        <p class="help-block">
                            {{ $errors->first('jpmax') }}
                        </p>
                    @endif
                </div>
            </div>-->
            
             	<div class="row firerwe">
            	<div class="title1">CO2:</div>  
                <div class="col-xs-12 form-group hedin">
                    {!! Form::label('co2', 'Total', ['class' => 'control-label']) !!}
                    {!! Form::text('co2', $res['co2'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('jpmin'))
                        <p class="help-block">
                            {{ $errors->first('jpmin') }}
                        </p>
                    @endif
                </div>
            </div>
            
             	<div class="row firerwe">
            	<div class="title1">DCP:</div>  
                <div class="col-xs-12 form-group hedin">
                    {!! Form::label('dcp', 'Total', ['class' => 'control-label']) !!}
                    {!! Form::text('dcp', $res['dcp'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('jpmin'))
                        <p class="help-block">
                            {{ $errors->first('jpmin') }}
                        </p>
                    @endif
                </div>
            </div>
            
             	<div class="row firerwe">
            	<div class="title1">Water (H2O):</div>  
                <div class="col-xs-12 form-group hedin">
                    {!! Form::label('water', 'Total', ['class' => 'control-label']) !!}
                    {!! Form::text('water', $res['water'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('jpmin'))
                        <p class="help-block">
                            {{ $errors->first('jpmin') }}
                        </p>
                    @endif
                </div>
            </div>
        </div>
            
             <div class="hedbg2">
             	<div class="row firerwe">
            	<div class="title1">Booster Pumps:</div>  
                <div class="col-xs-12 form-group">
                    {!! Form::label('boosterpumps', 'Total', ['class' => 'control-label']) !!}
                    {!! Form::text('boosterpumps', $res['boosterpumps'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('jpmin'))
                        <p class="help-block">
                            {{ $errors->first('jpmin') }}
                        </p>
                    @endif
                </div>
            </div>
            
             	<div class="row firerwe">
            	<div class="title1">Fire Alarm System:</div>  
                <div class="col-xs-12 form-group">
                    {!! Form::label('firealarmsystem', 'Total', ['class' => 'control-label']) !!}
                    {!! Form::text('firealarmsystem', $res['firealarmsystem'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('jpmin'))
                        <p class="help-block">
                            {{ $errors->first('jpmin') }}
                        </p>
                    @endif
                </div>
            </div>
            
             	<div class="row firerwe">
            	<div class="title1">Public Addressing System:</div>  
                <div class="col-xs-12 form-group">
                    {!! Form::label('publicaddressys', 'Total', ['class' => 'control-label']) !!}
                   {!! Form::text('publicaddressys', $res['publicaddressys'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('jpmin'))
                        <p class="help-block">
                            {{ $errors->first('jpmin') }}
                        </p>
                    @endif
                </div>
            </div>
          
             	<div class="row firerwe">
            	<div class="title1">Carbon emission system:</div>  
                <div class="col-xs-12 form-group">
                    {!! Form::label('carbonemissionsys', 'Total', ['class' => 'control-label']) !!}
                    {!! Form::text('carbonemissionsys', $res['carbonemissionsys'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('jpmin'))
                        <p class="help-block">
                            {{ $errors->first('jpmin') }}
                        </p>
                    @endif
                </div>
            </div>
         
           <!-- <div class="blue-strip">
            	<p><span><b>MIS </b></span></p>
            </div>-->
 
      <!--<div class="title">&nbsp;</div> -->          
           
             <!--<div class="row">
                <div class="title1">Jockey Pump:</div> 
                <div class="col-xs-12 form-group">
                    {!! Form::label('jpmin', 'Total', ['class' => 'control-label']) !!}
                    {!! Form::text('jpmin', old('jpmin'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('jpmin'))
                        <p class="help-block">
                            {{ $errors->first('jpmin') }}
                        </p>
                    @endif
                </div>
            </div>-->
            
            <!--<div class="row">
                <div class="title1">Main Pump:</div> 
                <div class="col-xs-12 form-group">
                    {!! Form::label('jpmin', 'Total', ['class' => 'control-label']) !!}
                    {!! Form::text('jpmin', old('jpmin'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('jpmin'))
                        <p class="help-block">
                            {{ $errors->first('jpmin') }}
                        </p>
                    @endif
                </div>
            </div>-->
            
            <!--<div class="row">
                <div class="title1">DG Pump:</div> 
                <div class="col-xs-12 form-group">
                    {!! Form::label('jpmin', 'Total', ['class' => 'control-label']) !!}
                    {!! Form::text('jpmin', old('jpmin'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('jpmin'))
                        <p class="help-block">
                            {{ $errors->first('jpmin') }}
                        </p>
                    @endif
                </div>
            </div>-->
            
            <!--<div class="row">
                <div class="title1">Booster Pumps:</div> 
                <div class="col-xs-12 form-group">
                    {!! Form::label('jpmin', 'Total', ['class' => 'control-label']) !!}
                    {!! Form::text('jpmin', old('jpmin'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('jpmin'))
                        <p class="help-block">
                            {{ $errors->first('jpmin') }}
                        </p>
                    @endif
                </div>
            </div>-->
            
            <div class="row firerwe">
                <div class="title1">Dewatering Pumps:</div> 
                <div class="col-xs-12 form-group">
                    {!! Form::label('dewaterpumps', 'Total', ['class' => 'control-label']) !!}
                   {!! Form::text('dewaterpumps', $res['dewaterpumps'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('jpmin'))
                        <p class="help-block">
                            {{ $errors->first('jpmin') }}
                        </p>
                    @endif
                </div>
            </div>
            
            <div class="row firerwe">
                <div class="title1">Yard Hydrant Points:</div> 
                <div class="col-xs-12 form-group">
                    {!! Form::label('yardhydrantpoints', 'Total', ['class' => 'control-label']) !!}
                    {!! Form::text('yardhydrantpoints', $res['yardhydrantpoints'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('jpmin'))
                        <p class="help-block">
                            {{ $errors->first('jpmin') }}
                        </p>
                    @endif
                </div>
            </div>
       </div>     
            
          <div class="hedbg">   
             <div class="row firerwe">
                <div class="title1">Cellar Hydrant Points:</div> 
                <div class="col-xs-12 form-group">
                    {!! Form::label('cellarhydrantpoints', 'Total', ['class' => 'control-label']) !!}
                   {!! Form::text('cellarhydrantpoints', $res['cellarhydrantpoints'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('jpmin'))
                        <p class="help-block">
                            {{ $errors->first('jpmin') }}
                        </p>
                    @endif
                </div>
            </div>
            
            <div class="row firerwe">
                <div class="title1">Sub Cellar Hydrant Points:</div> 
                <div class="col-xs-12 form-group">
                    {!! Form::label('subcellarhydrapoints', 'Total', ['class' => 'control-label']) !!}
                    {!! Form::text('subcellarhydrapoints', $res['subcellarhydrapoints'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('jpmin'))
                        <p class="help-block">
                            {{ $errors->first('jpmin') }}
                        </p>
                    @endif
                </div>
            </div>
            
            <div class="row firerwe">
                <div class="title1">Fire Hose Reel Drums:</div> 
                <div class="col-xs-12 form-group">
                    {!! Form::label('firehosereeldrums', 'Total', ['class' => 'control-label']) !!}
                    {!! Form::text('firehosereeldrums', $res['firehosereeldrums'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('jpmin'))
                        <p class="help-block">
                            {{ $errors->first('jpmin') }}
                        </p>
                    @endif
                </div>
            </div>
            
            <!--<div class="row">
                <div class="title1">Fire Alarm System:</div> 
                <div class="col-xs-12 form-group">
                    {!! Form::label('jpmin', 'Total', ['class' => 'control-label']) !!}
                    {!! Form::text('jpmin', old('jpmin'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('jpmin'))
                        <p class="help-block">
                            {{ $errors->first('jpmin') }}
                        </p>
                    @endif
                </div>
            </div>-->
            
            <!--<div class="row">
                <div class="title1">Public Addressing System:</div> 
                <div class="col-xs-12 form-group">
                    {!! Form::label('jpmin', 'Total', ['class' => 'control-label']) !!}
                    {!! Form::text('jpmin', old('jpmin'), ['class' => 'form-control ereq', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('jpmin'))
                        <p class="help-block">
                            {{ $errors->first('jpmin') }}
                        </p>
                    @endif
                </div>
            </div>-->
            
            <div class="row firerwe">
                <div class="title1">Fire Extinguishers:</div> 
                <div class="col-xs-12 form-group">
                    {!! Form::label('fireextinguishers', 'Total', ['class' => 'control-label']) !!}
                    {!! Form::text('fireextinguishers', $res['fireextinguishers'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('jpmin'))
                        <p class="help-block">
                            {{ $errors->first('jpmin') }}
                        </p>
                    @endif
                </div>
            </div>
            
            <div class="row firerwe">
                <div class="title1">False Fire Alarm:</div> 
                <div class="col-xs-12 form-group">
                    {!! Form::label('falsefirealaram', 'Total', ['class' => 'control-label']) !!}
                    {!! Form::text('falsefirealaram', $res['falsefirealaram'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('jpmin'))
                        <p class="help-block">
                            {{ $errors->first('jpmin') }}
                        </p>
                    @endif
                </div>
            </div>
            
             <div class="row firerwe">
                <div class="title1">Wet Raisers:</div> 
                <div class="col-xs-12 form-group">
                    {!! Form::label('wetraisers', 'Total', ['class' => 'control-label']) !!}
                    {!! Form::text('wetraisers', $res['wetraisers'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('jpmin'))
                        <p class="help-block">
                            {{ $errors->first('jpmin') }}
                        </p>
                    @endif
                </div>
            </div>
            
           
         </div>    
          <div class="hedbg2">   
            
            <!-- <div class="row firerwe">
                <div class="title1">Carbon Emission System:</div> 
                <div class="col-xs-12 form-group">
                    {!! Form::label('carbonemissionsys', 'Total', ['class' => 'control-label']) !!}
                    {!! Form::text('carbonemissionsys', $res['carbonemissionsys'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('jpmin'))
                        <p class="help-block">
                            {{ $errors->first('jpmin') }}
                        </p>
                    @endif
                </div>
            </div>-->
            
            <div class="row firerwe">
                <div class="title1">Flow Meter Panels-Fire Sprinkler:</div> 
                <div class="col-xs-12 form-group">
                    {!! Form::label('flwmeterpanels', 'Total', ['class' => 'control-label']) !!}
                   {!! Form::text('flwmeterpanels', $res['flwmeterpanels'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('jpmin'))
                        <p class="help-block">
                            {{ $errors->first('jpmin') }}
                        </p>
                    @endif
                </div>
            </div>  
            
            <div class="row firerwe">
                <div class="title1">CP Hoses:</div> 
                <div class="col-xs-12 form-group">
                    {!! Form::label('cphoses', 'Total', ['class' => 'control-label']) !!}
                   {!! Form::text('cphoses', $res['cphoses'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('jpmin'))
                        <p class="help-block">
                            {{ $errors->first('jpmin') }}
                        </p>
                    @endif
                </div>
            </div>
            
            <div class="row firerwe">
                <div class="title1">Fire Alarm Repeater Panel:</div> 
                <div class="col-xs-12 form-group">
                    {!! Form::label('firealarmrepeatpanel', 'Total', ['class' => 'control-label']) !!}
                    {!! Form::text('firealarmrepeatpanel', $res['firealarmrepeatpanel'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('jpmin'))
                        <p class="help-block">
                            {{ $errors->first('jpmin') }}
                        </p>
                    @endif
                </div>
            </div>
            
            <div class="row firerwe">
                <div class="title1">Sprinkler Charged (floor wise):</div> 
                <div class="col-xs-12 form-group">
                    {!! Form::label('sprinklercharged', 'Total', ['class' => 'control-label']) !!}
                    {!! Form::text('sprinklercharged', $res['sprinklercharged'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('jpmin'))
                        <p class="help-block">
                            {{ $errors->first('jpmin') }}
                        </p>
                    @endif
                </div>
            </div>
            
            <div class="row firerwe">
                <div class="title1">Fire Mock Drill & Emergency Evacuation Drill:</div> 
                <div class="col-xs-12 form-group">
                    {!! Form::label('firemockdrill', 'Total', ['class' => 'control-label']) !!}
                    {!! Form::text('firemockdrill', $res['firemockdrill'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('jpmin'))
                        <p class="help-block">
                            {{ $errors->first('jpmin') }}
                        </p>
                    @endif
                </div>
            </div>
            
         </div>
         
         <div class="hedbg ">   
               
              <div class="row firerwe">
                <div class="title1">Sub Cellar-3 Hydrant Points:</div> 
                <div class="col-xs-12 form-group">
                    {!! Form::label('subcellarhydrant', 'Total', ['class' => 'control-label']) !!}
                    {!! Form::text('subcellarhydrant', $res['subcellarhydrant'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('jpmin'))
                        <p class="help-block">
                            {{ $errors->first('jpmin') }}
                        </p>
                    @endif
                </div>
            </div>
            
             <div class="row firerwe">
                <div class="title1">PA System Repeater Panel:</div> 
                <div class="col-xs-12 form-group">
                    {!! Form::label('pasysrepeaterpanel', 'Total', ['class' => 'control-label']) !!}
                   {!! Form::text('pasysrepeaterpanel', $res['pasysrepeaterpanel'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('jpmin'))
                        <p class="help-block">
                            {{ $errors->first('jpmin') }}
                        </p>
                    @endif
                </div>
            </div>
            
            <div class="row firerwe">
                <div class="title1">Group Indication Panel</div> 
                <div class="col-xs-12 form-group">
                    {!! Form::label('groundindicationpanel', 'Total', ['class' => 'control-label']) !!}
                   {!! Form::text('groundindicationpanel', $res['groundindicationpanel'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('groundindicationpanel'))
                        <p class="help-block">
                            {{ $errors->first('groundindicationpanel') }}
                        </p>
                    @endif
                </div>
            </div>
			
			<div class="row firerwe">
                <div class="title1">Attendance</div> 
                <div class="col-xs-12 form-group">
                    {!! Form::label('attendance', 'Total', ['class' => 'control-label']) !!}
                   {!! Form::text('attendance', $res['attendance'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('attendance'))
                        <p class="help-block">
                            {{ $errors->first('attendance') }} 
                        </p>
                    @endif
                </div>
            </div>
            
          </div>  
          
             
             <?php /*?>@if (count($firenocres) > 0)<div class="report-validation-blockslist">
              <div class="blockable"> <div class="title12"><b>Blocks Information</b></div>
               <div class="dividerssd" style="overflow:hidden;">      
               <div class="col-sm-2 reportvalidation-blockname">
                    <label>Block Name</label>
               </div>
                <div class="col-sm-2 worst-of-worst name-changed">
                    <label>Name Changed to Society</label>
               </div>
               <div class="col-sm-2 valid-upto">
                   <label>Valid up to</label>
               </div>
               
                <div class="col-sm-2 reportvalidation-blockname1">
                    <label>Block Name</label>
               </div>
                <div class="col-sm-2 worst-of-worst name-changed1">
                    <label>Name Changed to Society</label>
               </div>
               <div class="col-sm-2 valid-upto1">
                   <label>Valid up to</label>
               </div>
               
               </div>
              <?php // echo '<pre>'; print_r($firenocres); echo '</pre>'; ?>
               @foreach ($firenocres as $noc)
          			
                    <?php 
						$upto = $noc->valid_upto;
						if (strpos($upto, '-')!== false) 
						{
							$valid = 'Date';
						}
						else
						{
							$valid = 'Other';
						}
					?>
               
                    <div class="col-xs-2 nameofthebloadk"><b> {{ $noc->blockname }} </b></div> 
					
					<input type="hidden" name="recordid[]" value="<?php if($noc->mnrecord_id) echo $noc->mnrecord_id;?>">
                    <input type="hidden" name="validid[]" value="<?php echo $noc->id; ?>">
					<input type="hidden" name="blockname[]" value="<?php if($noc->blockname) echo $noc->blockname;?>">
					<input type="hidden" name="name_change_socity[]" value="<?php if($noc->name_change_socity) echo $noc->name_change_socity;?>">
                    <div class="col-xs-2 socitynamechages"> {{ $noc->name_change_socity }} </div>
                      <div class="col-xs-2 decalrewar"> <div><input type="radio" value="date" <?php if($valid=='Date') echo "checked=checked"; ?> name="validate_<?php echo $noc->id; ?>" onchange="selectvalid123(<?php echo $noc->id; ?>);">Date
                       <input type="radio" name="validate_<?php echo $noc->id; ?>" value="other" <?php if($valid=='Other') echo "checked=checked"; ?>  onchange="disselectvalid123(<?php echo $noc->id; ?>);">Other </div>
                       <div id="div_<?php echo $noc->id; ?>"> {!! Form::text('valid_upto[]', $noc->valid_upto, ['class' => 'form-control ereq resetval', 'placeholder' => '', 'id'=> 'dateval_'.$noc->id]) !!} </div></div>
                       
                       
                      
                  @endforeach
                    @endif 
                    </div>
                 </div><?php */?>
             <div class="updatebtn firesafety-update">
            	{!! Form::submit('Update', ['class' => 'btn btn-danger']) !!}
				{!! Form::button('Reset', ['class' => 'btn btn-reser', 'id' => 'resetall']) !!}
             </div>  
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>        
   <script>
   $( document ).ready(function() {
   $(".dtpick").datepicker({
 dateFormat: "dd-mm-yy",
});
});
function selectvalid123(id){

  if($("#dateval_"+id).hasClass("dtpick")) {
     $("#dateval_"+id).removeClass('dtpick')
	 $("#dateval_"+dis).removeClass("hasDatepicker");
  }else{
   $("#dateval_"+id).removeClass('dtpick');
   $("#dateval_"+id).removeClass("hasDatepicker");
   $("#dateval_"+id).addClass("dtpick");
   $(".dtpick").datepicker({
     dateFormat: "dd-mm-yy",
    });  
  }
}

function disselectvalid123(dis){
  $("#dateval_"+dis).removeClass("dtpick");
  $("#dateval_"+dis).removeClass("hasDatepicker"); 
  var parent =  $("#dateval_"+dis).parent();
  var htmltext =  $("#dateval_"+dis).parent().html(); 
   $("#dateval_"+dis).remove();
   parent.html(htmltext);
   
}

   </script>
