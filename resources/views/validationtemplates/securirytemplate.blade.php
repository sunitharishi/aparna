		 <style type="text/css">
		  		.error
				{
					border:2px solid #FF0000 !important;
				}
		  </style>
        
         
         <div class="title">&nbsp;</div>
         <div class="pmsbg firstrow-security">
           <div class="title22">Total.No's:</div>
			<div class="row sect">
             	<div class="title1">CCTV:</div>
                <div class="col-xs-12 form-group secutt">
                    {!! Form::label('cctv', ' ', ['class' => 'control-label']) !!}
                    {!! Form::text('cctv', $res['cctv'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
					{{ Form::hidden('record', $res['id']) }}
                    <p class="help-block"></p>
                    @if($errors->has('jpmin'))
                        <p class="help-block">
                            {{ $errors->first('jpmin') }}
                        </p>
                    @endif
                </div>
            </div>
          
          
			 	<div class="row sect">
                 <div class="title1">Boom Barrier:</div> 
                <div class="col-xs-12 form-group secutt">
                    {!! Form::label('boombarrier', ' ', ['class' => 'control-label']) !!}
                    {!! Form::text('boombarrier', $res['boombarrier'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('boombarrier'))
                        <p class="help-block">
                            {{ $errors->first('boombarrier') }}
                        </p>
                    @endif
                </div>
            </div>
          
           
           	<div class="row sect">
            	 <div class="title1">W.T:</div> 
                <div class="col-xs-12 form-group secutt">
                    {!! Form::label('jpmin', ' ', ['class' => 'control-label']) !!}
                    {!! Form::text('wt', $res['wt'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('wt'))
                        <p class="help-block">
                            {{ $errors->first('jpmin') }}
                        </p>
                    @endif
                </div>
            </div>
          
            
            
           	<div class="row sect">
            	 <div class="title1">Torches:</div>  
                <div class="col-xs-12 form-group secutt">
                    {!! Form::label('torches', ' ', ['class' => 'control-label']) !!}
                    {!! Form::text('torches', $res['torches'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('torches'))
                        <p class="help-block">
                            {{ $errors->first('torches') }}
                        </p>
                    @endif
                </div>
            </div>
             
             
           	<div class="row sect">
            	<div class="title1">Bio. Machine:</div>  
                <div class="col-xs-12 form-group secutt">
                    {!! Form::label('biomachine', ' ', ['class' => 'control-label']) !!}
                    {!! Form::text('biomachine', $res['biomachine'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('biomachine'))
                        <p class="help-block">
                            {{ $errors->first('biomachine') }}
                        </p>
                    @endif
                </div>
            </div>
          </div>
          
        <div class="fmsbag secondrow-security">  
         <div class="title22">Available No's:</div>  
          <div class="row sect">
            	<div class="title1">Tabs:</div>  
                <div class="col-xs-12 form-group secutt">
                    {!! Form::label('tabs', ' ', ['class' => 'control-label']) !!}
                    {!! Form::text('av_tabs', $res['av_tabs'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('av_tabs'))
                        <p class="help-block">
                            {{ $errors->first('av_tabs') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row sect">
            	<div class="title1">Whistles:</div>  
                <div class="col-xs-12 form-group secutt">
                    {!! Form::label('av_whistles', ' ', ['class' => 'control-label']) !!}
                    {!! Form::text('av_whistles', $res['av_whistles'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('av_whistles'))
                        <p class="help-block">
                            {{ $errors->first('av_whistles') }}
                        </p>
                    @endif
                </div>
            </div>
             <div class="row sect">
            	<div class="title1">Batons:</div>  
                <div class="col-xs-12 form-group secutt">
                    {!! Form::label('av_batons', ' ', ['class' => 'control-label']) !!}
                    {!! Form::text('av_batons', $res['av_batons'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('av_batons'))
                        <p class="help-block">
                            {{ $errors->first('av_batons') }}
                        </p>
                    @endif
                </div>
            </div>
             <div class="row sect">
            	<div class="title1">Rain.C:</div>  
                <div class="col-xs-12 form-group secutt">
                    {!! Form::label('av_rain_c', ' ', ['class' => 'control-label']) !!}
                    {!! Form::text('av_rain_c', $res['av_rain_c'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('av_rain_c'))
                        <p class="help-block">
                            {{ $errors->first('av_rain_c') }}
                        </p>
                    @endif
                </div>
            </div>
             <div class="row sect">
            	<div class="title1">Umbrellas:</div>  
                <div class="col-xs-12 form-group secutt">
                    {!! Form::label('av_umbrellas', ' ', ['class' => 'control-label']) !!}
                    {!! Form::text('av_umbrellas', $res['av_umbrellas'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('av_umbrellas'))
                        <p class="help-block">
                            {{ $errors->first('av_umbrellas') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row sect">
            	<div class="title1">Bi-cycle:</div>  
                <div class="col-xs-12 form-group secutt">
                    {!! Form::label('tabs', ' ', ['class' => 'control-label']) !!}
                    {!! Form::text('bicycle', $res['bicycle'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('bicycle'))
                        <p class="help-block">
                            {{ $errors->first('bicycle') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row sect">
            	<div class="title1">Computers:</div>  
                <div class="col-xs-12 form-group secutt">
                    {!! Form::label('computers', ' ', ['class' => 'control-label']) !!}
                    {!! Form::text('computers', $res['computers'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('computers'))
                        <p class="help-block">
                            {{ $errors->first('computers') }}
                        </p> 
                    @endif
                </div>
            </div> <div class="row sect">
            	<div class="title1">Internet Connection:</div>  
                <div class="col-xs-12 form-group">
                    <select name="internetcon" class="form-control">
                      <option value="Available" <?php if($res['internetcon'] == 'Available') echo "selected='selected'"; ?>>Available</option>
                      <option value="Not Available" <?php if($res['internetcon'] == 'Not Available') echo "selected='selected'"; ?>>Not Available</option>
                    </select>
                   
                </div>
            </div>
            <div class="row sect">
            	<div class="title1">Street Lights:</div>  
                <div class="col-xs-12 form-group secutt">
                    {!! Form::label('street_lights', ' ', ['class' => 'control-label']) !!}
                    {!! Form::text('street_lights', $res['street_lights'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('street_lights'))
                        <p class="help-block">
                            {{ $errors->first('street_lights') }}
                        </p>
                    @endif
                </div>
            </div>
            
                
        </div>
            
           <!--<div class="pmsbg">
            <div class="title22">ID Cards:</div>  
             <div class="row sect">
            	<div class="title1">Maids:</div>  
                <div class="col-xs-12 form-group secutt">
                    {!! Form::label('id_maids', ' ', ['class' => 'control-label']) !!}
                    {!! Form::text('id_maids', $res['id_maids'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('id_maids'))
                        <p class="help-block">
                            {{ $errors->first('id_maids') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row sect">
            	<div class="title1">Drivers:</div>  
                <div class="col-xs-12 form-group secutt">
                    {!! Form::label('id_drivers', ' ', ['class' => 'control-label']) !!}
                    {!! Form::text('id_drivers', $res['id_drivers'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('id_drivers'))
                        <p class="help-block">
                            {{ $errors->first('id_drivers') }}
                        </p>
                    @endif
                </div>
            </div>
            
            <div class="row sect">
            	<div class="title1">Vendors:</div>  
                <div class="col-xs-12 form-group secutt">
                    {!! Form::label('id_vendors', ' ', ['class' => 'control-label']) !!}
                    {!! Form::text('id_vendors', $res['id_vendors'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('id_vendors'))
                        <p class="help-block">
                            {{ $errors->first('id_vendors') }}
                        </p>
                    @endif
                </div>
            </div>
            
            <div class="row sect">
            	<div class="title1">Interiors:</div>  
                <div class="col-xs-12 form-group secutt">
                    {!! Form::label('id_interiors', ' ', ['class' => 'control-label']) !!}
                    {!! Form::text('id_interiors', $res['id_interiors'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('id_interiors'))
                        <p class="help-block">
                            {{ $errors->first('id_interiors') }}
                        </p>
                    @endif
                </div>
            </div>
            
            <div class="row sect">
            	<div class="title1">Others:</div>  
                <div class="col-xs-12 form-group secutt">
                    {!! Form::label('id_others', ' ', ['class' => 'control-label']) !!}
                    {!! Form::text('id_others', $res['id_others'], ['class' => 'form-control ereq resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('id_others'))
                        <p class="help-block">
                            {{ $errors->first('id_others') }}
                        </p>
                    @endif
                </div>
            </div>
           
           </div>-->
            
            
             <div class="updatebtn">
                {!! Form::submit('Update', ['class' => 'btn btn-danger']) !!} 
				{!! Form::button('Reset', ['class' => 'btn btn-reser', 'id' => 'resetall']) !!}
            </div> 
        
   
