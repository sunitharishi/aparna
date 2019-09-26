          <style type="text/css">
		  		.error
				{
					border:2px solid #FF0000 !important;
				}
				.multiselect {
				  width: 200px;
				}
				
				.selectBox {
				  position: relative;
				}
				
				.selectBox select {
				  width: 100%;
				  font-weight: bold;
				}
				
				.overSelect {
				  position: absolute;
				  left: 0;
				  right: 0;
				  top: 0;
				  bottom: 0;
				}
				
				#checkboxes1, #checkboxes2, #checkboxes3, .solens {
				  display: none;
				  border: 1px #dadada solid;
				}
				
				#checkboxes1 label, #checkboxes2 label, #checkboxes3 label {
				  display: block;
				}
				
				#checkboxes1 label:hover, #checkboxes2 label:hover, #checkboxes3 label:hover {
				  background-color: #1e90ff;
				}
		  </style>
          <div class="title">&nbsp;</div>          
		  <div class="pmsbg firstrow-pmsvalidation">
			   <div class="piland" style="width:100%;"> 
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
       <div class="pmsbg firstrow-pmsvalidation">
			   <div class="piland" style="width:100%;"> 
					<div class="row sect3">
						<div class="title1">Irrigation System:</div>   
						<div class="col-xs-12 form-group">
							{!! Form::label('solonide_valves', 'Solonide Valves Total', ['class' => 'control-label']) !!}
							{!! Form::text('solonide_valves', $res['solonide_valves'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
							<p class="help-block"></p>
							@if($errors->has('solonide_valves'))
								<p class="help-block">
									{{ $errors->first('solonide_valves') }}
								</p>
							@endif
						</div>
					</div>            
					<div class="row sect3">
						<div class="title1"></div>   
						<div class="col-xs-12 form-group">
							{!! Form::label('sprinklers', 'Sprinklers Total', ['class' => 'control-label']) !!}
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
					<div class="row sect3">
						<div class="title1"></div>   
						<div class="col-xs-12 form-group">
							 	{!! Form::label('quick_coupling_valves', 'Quick Coupling Valves Total', ['class' => 'control-label']) !!}
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
       </div>  
       <div class="updatebtn">
            {!! Form::submit('Update', ['class' => 'btn btn-danger']) !!}
            {!! Form::button('Reset', ['class' => 'btn btn-reser', 'id' => 'resetall']) !!}
       </div> 