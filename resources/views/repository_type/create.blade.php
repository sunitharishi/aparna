@extends('layouts.app')

@section('content')
   <!-- <h3 class="page-title">Categories</h3>-->
    {!! Form::open(['method' => 'POST', 'route' => ['repository-types.store']]) !!}

    <div class="panel panel-default respositroy-view maalajljd">
        <div class="panel-heading">
           Repository > Folder
            <p class="ptag">
             <a href="{{ route('repository-types.index') }}" class="btn btn-back-list">Back</a> 
           </p>
        </div>
        
        <div class="panel-body impossinble-mission">
        <div class="class-ctration repository">
            <div class="row repository-type">
                <div class="col-xs-3 col-sm-3 form-group">
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
    {!! Form::submit('Submit', ['class' => 'btn btn-danger btn-save']) !!}
    {!! Form::close() !!}
    
     
    </div>
    
     @include('partials.footer')
@stop

