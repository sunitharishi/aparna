@extends('layouts.app')

@section('content')
   <!-- <h3 class="page-title">Categories</h3>-->
    {!! Form::open(['method' => 'POST', 'route' => ['asset-types.store']]) !!}

    <div class="panel panel-default respositroy-view maalajljd">
        <div class="panel-heading">
           Asset Types
           <a href="{{ route('asset-types.index') }}" class="btn green-back" style="float:right;">Back</a>
        </div>
        
        <div class="panel-body impossinble-mission">
        <div class="class-ctration">
		<div class="row colde-impossinle">
                <div class="col-xs-12 form-group">
                    {!! Form::label('ccode', 'Code', ['class' => 'control-label']) !!}
                    {!! Form::text('ccode', old('ccode'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('ccode'))
                        <p class="help-block">
                            {{ $errors->first('ccode') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row name-impossibnle">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row name-impossibnle">
                <div class="col-xs-12 form-group">
                    {!! Form::label('prefix', 'Prefix', ['class' => 'control-label']) !!}
                    {!! Form::text('prefix', old('prefix'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('prefix'))
                        <p class="help-block">
                            {{ $errors->first('prefix') }}
                        </p>
                    @endif
                </div>
            </div>
            </div>
            
				<div class="row">
                <div class="col-xs-12 form-group textaresaads">
                    {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
                    {!! Form::textarea('description', old('description'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>
            </div>
            
			
			
			
		
       

    {!! Form::submit('Submit', ['class' => 'btn btn-danger btn-save']) !!}
    {!! Form::close() !!}
    
     </div>
    </div>
    
     @include('partials.footer')
@stop

