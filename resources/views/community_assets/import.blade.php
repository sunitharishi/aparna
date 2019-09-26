@extends('layouts.app')

@section('content')


   
	<div class="dailyreports community-asset-importpage">
    <h3 class="page-title adftempolate-asset">Community Asset
      
       <div class="ptag">
		   <a href="{{ route('commassets.index') }}" class="btn green-back">Back</a>
	   </div>  
    
    </h3>

    {!! Form::open(['files' => 'true','route' => 'commassets.eimport','role' => 'form', 'class'=>'form-inline download-asset-form', 'onsubmit' =>"return download_asset()"]) !!}
    	{!! Form::hidden('ca_action','download') !!}
    	<div class="row class-ctration sybb-oman">
                <div class="col-sm-3 form-group cateresss catergrouies1">
                    {!! Form::label('site_id', 'Community', ['class' => 'control-label']) !!}
                    {!! Form::select('site_id', $communities, old('site_id'), ['class' => 'form-control select2mes erequired']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('site_id'))
                        <p class="help-block">
                            {{ $errors->first('site_id') }}
                        </p>
                    @endif
                </div>
                <div class="col-sm-3 form-group cateresss catergrouies1">
                    {!! Form::label('category_id', 'Category', ['class' => 'control-label']) !!}
                    {!! Form::select('category_id', $categories, old('category_id'), ['class' => 'form-control select2mes erequired','onchange'=>'getCatgAssets(this)']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('category_id'))
                        <p class="help-block">
                            {{ $errors->first('category_id') }}
                        </p>
                    @endif
                </div>
                <div class="col-sm-3 form-group catergrouies1 communities-assetsed" id="asset_id_box">
                    {!! Form::label('asset_id', 'Asset', ['class' => 'control-label']) !!}
                    {!! Form::select('asset_id', $assets, old('asset_id'), ['class' => 'form-control select2mes erequired']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('asset_id'))
                        <p class="help-block">
                            {{ $errors->first('asset_id') }}
                        </p>
                    @endif
                </div>   
                   
                   
                <div class="col-sm-3 form-group soenload-button">
            	    {!! Form::radio('catype','Download',false,['class'=>'catype']); !!} Download 
            	    <button type="submit" class="btn btn-primary" name="btn_download" value="Yes">Download</button> 
            	</div>       
            </div>   
           
           
            	
           
            
            <div class="row uplpad-downloadss">
            	<div class="col-sm-3 form-group foematltion">
            		<label class="upload-radion">{!! Form::radio('catype','Upload',false,['class'=>'catype']); !!} Upload</label>
					<label class="sr-only" for="file">Upload File</label>
					<input type="file" name="file" id="file" class="btn" title="Select File" />
					<div class="help-block help-bote"><strong>Note!</strong><span style="font-weight:bold;color:#000;"> Only xls or xlsx file is allowed!!</span></div>
					<p class="help-block afile"></p>
				</div>
				<div class="col-sm-3">
					<button type="submit" class="btn btn-primary" name="btn_upload" value="Yes">Upload file</button>
				</div> 
            </div>    
            <div class="row">	            	
				@if($message) <p class="help-block">{{ $message }}</p>@endif
            </div>
            <div class="row class-ctration date-timeformat">
            	
				<div class="col-sm-4"><b>DATE FORMAT:</b>  <span>DD/MM/YYYY</span></div><br>
    			<div class="col-sm-7"><b>DATE TIME FORMAT:</b>  <span>DD/MM/YYYY HH:II</span></div>	
			    
            </div>  
        
    {!! Form::close() !!}
    
    

            
          
	
	 </div>  

  @include('partials.footer')
@stop