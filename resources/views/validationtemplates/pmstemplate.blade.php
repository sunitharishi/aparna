          <style type="text/css">
		  		.error
				{
					border:2px solid #FF0000 !important;
				}
		  </style>
          <div class="title">&nbsp;</div>
          
          <div class="pmsbg firstrow-pmsvalidation">
			<div class="row sect">
            	<div class="title1">Sprinklers:</div>   
                <div class="col-xs-12 form-group">
                    {!! Form::label('sprinklers', 'Total', ['class' => 'control-label']) !!}
                    {!! Form::text('sprinklers',$res['sprinklers'] , ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
					 {{ Form::hidden('record', $res['id']) }}
                    <p class="help-block"></p>
                    @if($errors->has('sprinklers'))
                        <p class="help-block">
                            {{ $errors->first('sprinklers') }}
                        </p>
                    @endif
                </div>
            </div>
            
			 	<div class="row sect">
                <div class="title1">Flats:</div>   
                <div class="col-xs-12 form-group">
                    {!! Form::label('flats', 'Total', ['class' => 'control-label']) !!}
                    {!! Form::text('flats', $res['flats'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('flats'))
                        <p class="help-block">
                            {{ $errors->first('flats') }}
                        </p>
                    @endif
                </div>
            </div>
           
           <div class="piland" style="width:50%;"> 
            <div class="row sect3">
                <div class="title1">Land Scaping:</div>   
                <div class="col-xs-12 form-group">
                    {!! Form::label('land', 'Sup', ['class' => 'control-label']) !!}
                    {!! Form::text('land_sup', $res['land_sup'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('land'))
                        <p class="help-block">
                            {{ $errors->first('land') }}
                        </p>
                    @endif
                </div>
            </div>
            
            <div class="row sect3">
                <div class="title1"></div>   
                <div class="col-xs-12 form-group">
                    {!! Form::label('land', 'Helper', ['class' => 'control-label']) !!}
                    {!! Form::text('land_helper', $res['land_helper'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('land_helper'))
                        <p class="help-block">
                            {{ $errors->first('land_helper') }}
                        </p>
                    @endif
                </div>
            </div>
            
            <div class="row sect3">
                <div class="title1"></div>   
                <div class="col-xs-12 form-group">
                    {!! Form::label('garden_area', 'Garden Area', ['class' => 'control-label']) !!}
                    {!! Form::text('garden_area', $res['garden_area'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('garden_area'))
                        <p class="help-block">
                            {{ $errors->first('garden_area') }}
                        </p>
                    @endif
                </div>
            </div>
            
         </div>   
       </div> 
       
       
       <div class="fmsbag secondrow-pmsvalidation">
          <div class="piland"> 
          <div class="row sect2">
                <div class="title1">House Keeping:</div>   
                <div class="col-xs-12 form-group pinlan">
                    {!! Form::label('flats', 'Sup', ['class' => 'control-label']) !!}
                    {!! Form::text('house_sup', $res['house_sup'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('house_sup'))
                        <p class="help-block">
                            {{ $errors->first('house_sup') }}
                        </p>
                    @endif
                </div>
             </div>
               
             <div class="row sect2">
                <div class="title1"></div>   
                <div class="col-xs-12 form-group pinlan">
                    {!! Form::label('flats', 'Helper', ['class' => 'control-label']) !!}
                    {!! Form::text('house_help', $res['house_help'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('house_help'))
                        <p class="help-block">
                            {{ $errors->first('house_help') }}
                        </p>
                    @endif
                </div>
             </div>
             
          </div>                    
          <div class="piland2"> 
          <div class="row sect3">
                <div class="title1">Club House:</div>   
                <div class="col-xs-12 form-group pinlan">
                    {!! Form::label('clube', 'F.O', ['class' => 'control-label']) !!}
                    {!! Form::text('clu_hs_fo', $res['clu_hs_fo'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('clu_hs_fo'))
                        <p class="help-block">
                            {{ $errors->first('clu_hs_fo') }}
                        </p>
                    @endif
                </div>
             </div>
             
             <div class="row sect3">
                <div class="title1"></div>   
                <div class="col-xs-12 form-group pinlan">
                    {!! Form::label('flats', 'H.K', ['class' => 'control-label']) !!}
                    {!! Form::text('clu_hs_hk', $res['clu_hs_hk'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('clu_hs_hk'))
                        <p class="help-block">
                            {{ $errors->first('clu_hs_hk') }}
                        </p>
                    @endif
                </div>
             </div>
             
             <div class="row sect3">
                <div class="title1"></div>   
                <div class="col-xs-12 form-group pinlan">
                    {!! Form::label('flats', 'Others', ['class' => 'control-label']) !!}
                    {!! Form::text('other', $res['other'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('other'))
                        <p class="help-block">
                            {{ $errors->first('other') }}
                        </p>
                    @endif
                </div>
             </div>
             
          </div>
          
          
       </div>
	   
       
       <div class="pmsbg firstrow-pmsvalidation" style="width:100%;">
            <div class="row sect" style="width:100%;">
                <div class="title1">Equipment:</div>   
                <div class="col-xs-2 form-group">
                    {!! Form::label('rmachine_total', 'Ride On Total', ['class' => 'control-label']) !!}
                    {!! Form::text('rmachine_total', $res['rmachine_total'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('house_sup'))
                        <p class="help-block">
                            {{ $errors->first('rmachine_total') }}
                        </p>
                    @endif
                </div>
				 <div class="col-xs-10 form-group">
                   <div style="font-weight:bold;">{!! Form::label('rmachine_total', 'Select Ride On Machines', ['class' => 'control-label']) !!}</div>
				   <?php 
				   		$rides = explode(",",$res['ride_machines']);
				   		foreach($assetTypes as $skey=>$assets)
						{
						 if(in_array($skey, $rides))  $selected = 'checked';
						 else $selected = '';
					?>
					<input type="checkbox" name="ride_machines[]" value="<?php echo $skey ?>" <?php echo $selected; ?>/> <?php echo $assets; ?>
					<?php 		
						}
				   ?>	
                    <p class="help-block"></p>
                    @if($errors->has('house_sup'))
                        <p class="help-block">
                            {{ $errors->first('rmachine_total') }}
                        </p>
                    @endif
                </div>
            </div>        
            <div class="row sect"  style="width:100%;">
               	 <div class="title1">&nbsp;</div>   
                  <div class="col-xs-2 form-group">
                    {!! Form::label('smachine_total', 'Scrub Total', ['class' => 'control-label']) !!}
                    {!! Form::text('smachine_total', $res['smachine_total'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('house_sup'))
                        <p class="help-block">
                            {{ $errors->first('smachine_total') }}
                        </p>
                    @endif
                 </div>
				 <div class="col-xs-10 form-group">
                    <div style="font-weight:bold;">{!! Form::label('rmachine_total', 'Select Scrub Machines', ['class' => 'control-label']) !!}</div>
                   <?php 
				   		$scrubs = explode(",",$res['scrub_machines']);
				   		foreach($assetTypes as $skey=>$assets)
						{
						 if(in_array($skey, $scrubs))  $selected = 'checked';
						 else $selected = '';
					?>
					<input type="checkbox" name="scrub_machines[]" value="<?php echo $skey ?>" <?php echo $selected; ?>/> <?php echo $assets; ?>
					<?php 		
						}
				   ?>	
                    <p class="help-block"></p>
                    @if($errors->has('house_sup'))
                        <p class="help-block">
                            {{ $errors->first('rmachine_total') }}
                        </p>
                    @endif
                </div>
       	    </div>
	   </div>
       <div class="piland" style="width:50%;"> 
        <div class="row sect3">
            <div class="title1">Battery Total:</div>   
            <div class="col-xs-12 form-group">
                {!! Form::label('ride_btotal', 'Ride On', ['class' => 'control-label']) !!}
                {!! Form::text('ride_btotal', $res['ride_btotal'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                <p class="help-block"></p>
                @if($errors->has('ride_btotal'))
                    <p class="help-block">
                        {{ $errors->first('ride_btotal') }}
                    </p>
                @endif
            </div>
        </div>
		<div class="row sect3">
            <div class="title1">Total Sweeping Area (sft.)</div>   
            <div class="col-xs-12 form-group">
                {!! Form::label('rsweeping_area', 'Ride', ['class' => 'control-label']) !!}
                {!! Form::text('rsweeping_area', $res['rsweeping_area'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                <p class="help-block"></p>
                @if($errors->has('rsweeping_area'))
                    <p class="help-block">
                        {{ $errors->first('rsweeping_area') }}
                    </p>
                @endif
            </div>
        </div>
        
        <div class="row sect3">
            <div class="title1"></div>   
            <div class="col-xs-12 form-group">
                {!! Form::label('ssweeping_area', 'Scrub', ['class' => 'control-label']) !!}
                {!! Form::text('ssweeping_area', $res['ssweeping_area'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                <p class="help-block"></p>
                @if($errors->has('ssweeping_area'))
                    <p class="help-block">
                        {{ $errors->first('ssweeping_area') }}
                    </p>
                @endif
            </div>
        </div>
   </div>
   <div class="pmsbg thirdrow-pmsvalidation">
          <div class="piland"> 
          <div class="row sect2">
                <div class="title1">Prevailing rent per month (INR):</div>   
                <div class="col-xs-12 form-group pinlan">
                    {!! Form::label('one_bhk', '1 BHK', ['class' => 'control-label']) !!}
                    {!! Form::text('one_bhk', $res['one_bhk'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('one_bhk'))
                        <p class="help-block">
                            {{ $errors->first('one_bhk') }}
                        </p>
                    @endif
                </div>
             </div>
               
             <div class="row sect2">
                <div class="title1"></div>   
                <div class="col-xs-12 form-group pinlan">
                    {!! Form::label('two_bhk', '2 BHK', ['class' => 'control-label']) !!}
                    {!! Form::text('two_bhk', $res['two_bhk'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('two_bhk'))
                        <p class="help-block">
                            {{ $errors->first('two_bhk') }}
                        </p>
                    @endif
                </div>
             </div>
             
          </div>
          
          <div class="piland2"> 
             
             <div class="row sect3">
                <div class="title1"></div>   
                <div class="col-xs-12 form-group pinlan">
                    {!! Form::label('three_bhk', '3 BHK', ['class' => 'control-label']) !!}
                    {!! Form::text('three_bhk', $res['three_bhk'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('three_bhk'))
                        <p class="help-block">
                            {{ $errors->first('three_bhk') }}
                        </p>
                    @endif
                </div>
             </div>
             
             <div class="row sect3">
                <div class="title1"></div>   
                <div class="col-xs-12 form-group pinlan">
                    {!! Form::label('four_bhk', '4 BHK', ['class' => 'control-label']) !!}
                    {!! Form::text('four_bhk', $res['four_bhk'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('four_bhk'))
                        <p class="help-block">
                            {{ $errors->first('four_bhk') }}
                        </p>
                    @endif
                </div>
             </div>  
             
          </div>
          
          
       </div>
	   
	   <div class="fmsbag pms-coupling">
          <div class="piland newzealand"> 
          <div class="row sect2">
                <div class="title1"></div>   
                <div class="col-xs-12 form-group pinlan">
                    {!! Form::label('solonide_valves', 'Solonide Valves', ['class' => 'control-label']) !!}
                    {!! Form::text('solonide_valves', $res['solonide_valves'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('solonide_valves'))
                        <p class="help-block">
                            {{ $errors->first('solonide_valves') }}
                        </p>
                    @endif
                </div>
             </div>
               
             <div class="row sect2">
                <div class="title1"></div>   
                <div class="col-xs-12 form-group pinlan">
                    {!! Form::label('quick_coupling_valves', 'Quick Coupling Valves', ['class' => 'control-label']) !!}
                    {!! Form::text('quick_coupling_valves', $res['quick_coupling_valves'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('quick_coupling_valves'))
                        <p class="help-block">
                            {{ $errors->first('quick_coupling_valves') }}
                        </p>
                    @endif
                </div>
             </div>
             
          </div>
          
          <div class="piland2 finland"> 
             
             <div class="row sect3"> 
                <div class="title1"></div>   
                <div class="col-xs-12 form-group pinlan">
                    {!! Form::label('power_point', 'Power point', ['class' => 'control-label']) !!}
                    {!! Form::text('power_point', $res['power_point'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('power_point'))
                        <p class="help-block">
                            {{ $errors->first('power_point') }}
                        </p>
                    @endif
                </div>
             </div>  
			 
			 <div class="row sect3">
                <div class="title1"></div>   
                <div class="col-xs-12 form-group pinlan">
                    {!! Form::label('supervisor', 'Supervisor', ['class' => 'control-label']) !!}
                    {!! Form::text('supervisor', $res['supervisor'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('supervisor'))
                        <p class="help-block">
                            {{ $errors->first('supervisor') }}
                        </p>
                    @endif
                </div>
             </div>
             
          </div>
          
          
       </div>
   
            <div class="updatebtn">
            	{!! Form::submit('Update', ['class' => 'btn btn-danger']) !!}
				{!! Form::button('Reset', ['class' => 'btn btn-reser', 'id' => 'resetall']) !!}
           </div>  
       
   
