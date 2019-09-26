@extends('layouts.app')

@section('content')
   <!-- <h3 class="page-title">Categories</h3>-->
    
    {!! Form::model($category, ['method' => 'PUT', 'route' => ['category.update', $category->id]]) !!}

    <div class="panel panel-default respositroy-view category-editpage">
        <div class="panel-heading">
            Categories
             <p class="ptag">
            <a href="{{ route('category.index') }}" class="btn btn-back-list">Back</a> 
           </p>
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
			
			

    {!! Form::submit('Update', ['class' => 'btn btn-danger btn-save']) !!}
    {!! Form::close() !!}
     </div>
      </div>
     @include('partials.footer')
@stop

