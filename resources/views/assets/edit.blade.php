@extends('layouts.app')

@section('content')
    <!--<h3 class="page-title">Assets</h3>-->
     <div class="panel panel-default assets-heading ios-android">
    {!! Form::model($asset, ['method' => 'PUT', 'route' => ['assets.update', $asset->id]]) !!}

   
        <div class="panel-heading">
            Assets
             <p class="ptag">
              <a href="{{ route('assets.index') }}" class="btn green-back">Back</a>
           </p>
        </div>

        <div class="panel-body sites-create code-rpritority-select class-ctration">
            <div class="row">
                <div class="col-xs-12 template-endif form-group">
                    {!! Form::label('category_id', 'Category', ['class' => 'control-label']) !!}
                    {!! Form::select('category_id', $categories, old('category_id'), ['class' => 'form-control select2mes']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('category_id'))
                        <p class="help-block">
                            {{ $errors->first('category_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('template_id', 'Template', ['class' => 'control-label']) !!}
                    {!! Form::select('template_id', $templates, old('template_id'), ['class' => 'form-control']) !!}                    
                    <p class="help-block"></p>
                    @if($errors->has('template_id'))
                        <p class="help-block">
                            {{ $errors->first('template_id') }}
                        </p>
                    @endif
                    
                </div>
            </div>
            <div class="row">
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
            <div class="row imjustices">
                <div class="col-xs-12 form-group">
                    {!! Form::label('acode', 'Code', ['class' => 'control-label']) !!}
                    {!! Form::text('acode', old('last_name'), ['class' => 'form-control', 'placeholder' => '']) !!}                    
                    <p class="help-block"></p>
                    @if($errors->has('acode'))
                        <p class="help-block">
                            {{ $errors->first('acode') }}
                        </p>
                    @endif
                </div>
            </div>
        </div>
   

  <div class="">
    {!! Form::submit('Update', ['class' => 'btn btn-danger btn-save']) !!}
    {!! Form::close() !!}
  </div>
  
 </div>
    @include('partials.footer')
@stop

