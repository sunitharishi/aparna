@extends('layouts.app')

@section('content')
  <!--  <h3 class="page-title">Vendors</h3>-->
    {!! Form::open(['files' => 'true','method' => 'POST', 'route' => ['snaglocations.store']]) !!}
    	<!--{!! Form::open(['files' => 'true','route' => 'items.store','role' => 'form', 'class'=>'']) !!}-->

    <div class="panel panel-default respositroy-view lauoutp-app vendor-loreas">
        <div class="panel-heading vendor-heading">
            Snag Locations 
              <p class="ptag back-button">
            <a href="{{ route('snagcategories.index') }}" class="btn btn-back-list">Back</a>
            </p>
        </div>
        
        <div class="panel-body items-creations items-edit class-ctration">
            
            <div class="row">  
                <div class="col-xs-12 form-group">
					 {!! Form::label('Select Communuity', 'Select Communuity', ['class' => 'control-label']) !!}
                    {!! Form::select('site_id', $siteattrname, '', ['class' => 'form-control erequired', 'id' => 'site']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('site_id'))
                        <p class="help-block">
                            {{ $errors->first('site_id') }}
                        </p>
                    @endif
                </div> 
            </div> 
			<div class="row">  
                <div class="col-xs-12 form-group">
                    {!! Form::label('Location Name', 'Location Name', ['class' => 'control-label']) !!}
                    {!! Form::text('location_name', old('location_name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('location_name'))
                        <p class="help-block">
                            {{ $errors->first('location_name') }}
                        </p>
                    @endif
                </div> 
            </div> 
        </div>
    
	<div class="saudi-arbiea1">
		{!! Form::submit('Submit', ['class' => 'btn btn-danger btn-save']) !!}
    </div>
    </div> 
    
    
    {!! Form::close() !!}
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
 @include('partials.footer')
@stop

