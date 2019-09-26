@extends('layouts.app')

@section('content')
   <!-- <h3 class="page-title">Categories</h3>-->
    {!! Form::open(['method' => 'POST', 'route' => ['assetgroup.store']]) !!}

    <div class="panel panel-default respositroy-view maalajljd">
        <div class="panel-heading">
           Asset Groups
            <p class="ptag">
            <a href="{{ route('category.index') }}" class="btn btn-back-list">Back</a> 
           </p>
        </div>
        
        <div class="panel-body impossinble-mission">
        <div class="class-ctration">
		<div class="row colde-impossinle">
                <div class="col-xs-12 form-group">
                    {!! Form::label('agcode', 'Code', ['class' => 'control-label']) !!}
                    {!! Form::text('agcode', old('agcode'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('agcode'))
                        <p class="help-block">
                            {{ $errors->first('agcode') }}
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
            
			
			
			
		
        </div>
    </div>

    {!! Form::submit('Submit', ['class' => 'btn btn-danger btn-save category-submit']) !!}
    {!! Form::close() !!}
    @include('partials.footer')
@stop

