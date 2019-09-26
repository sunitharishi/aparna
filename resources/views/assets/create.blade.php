@extends('layouts.app')

@section('content')
   <!-- <h3 class="page-title">Assets</h3>-->
    {!! Form::open(['method' => 'POST', 'route' => ['assets.store']]) !!}

    <div class="panel panel-default bosy-asstes encitchloading">
        <div class="panel-heading">
            Assign <span style="color:#ce3b41;">Template</span> to <span style="color:#ce3b41;">Category</span>
            
             <p class="ptag">
              <a href="{{ route('assets.index') }}" class="btn green-back">Back</a>
           </p>
        </div>
        
        <div class="panel-body sites-create asstes-creations">
            <div class="row create-aasser">
                <div class="col-xs-12 form-group asstes-catrgoruy deownaareepw">
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
            
            
            <div class="row etemplatecode">
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
            
            <h4 style="clear:both;color:#023F78;" class="asset-detailss"><b>Asset Details</b></h4>
            <div class="row imjustices inusitf-code fsfnsdnf">
                <div class="col-xs-12 form-group">
                    {!! Form::label('acode', 'Asset Code', ['class' => 'control-label']) !!}
                    {!! Form::text('acode', old('last_name'), ['class' => 'form-control', 'placeholder' => '']) !!}                    
                    <p class="help-block"></p>
                    @if($errors->has('acode'))
                        <p class="help-block">
                            {{ $errors->first('acode') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row inusuicjk-name">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Asset Name', ['class' => 'control-label']) !!}
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
         {!! Form::submit('Submit', ['class' => 'btn btn-danger pull-right catch']) !!}
    {!! Form::close() !!}
    </div>

   
     @include('partials.footer')
@stop

