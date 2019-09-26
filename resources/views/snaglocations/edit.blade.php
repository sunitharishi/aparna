@extends('layouts.app')

@section('content')
  <!--  <h3 class="page-title">Vendors</h3>-->
    
    {!! Form::model($vendors, ['files' => 'true','method' => 'PUT', 'route' => ['snaglocations.update', $vendors->id]]) !!}

    <div class="panel panel-default respositroy-view irresponibleees">
        <div class="panel-heading sub-menyheading">
            Snag Locations 
              <p class="ptag back-button">
            <a href="{{ route('snaglocations.index') }}" class="btn btn-back-list">Back</a>
            </p>
        </div>             
        <div class="panel-body items-creations items-edit class-ctration arrangememt">
			<div class="row">  
                <div class="col-xs-12 form-group">
					 {!! Form::label('Select Communuity', 'Select Communuity', ['class' => 'control-label']) !!}
                    {!! Form::select('site_id', $siteattrname, old('site_id'), ['class' => 'form-control erequired', 'id' => 'site']) !!}
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
   
   <div class="update-button">
    {!! Form::submit('Update', ['class' => 'btn btn-danger btn-save']) !!}
   </div>
   
    </div>
    {!! Form::close() !!}
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

@include('partials.footer')
@stop

