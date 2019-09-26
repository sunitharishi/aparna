@extends('layouts.app')

@section('content')
    <h3 class="page-title">Employees</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['employees.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            Create 
        </div>
        
        <div class="panel-body sites-create">
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('ecode', 'Code', ['class' => 'control-label']) !!}
                    {!! Form::text('ecode', old('ecode'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('ecode'))
                        <p class="help-block">
                            {{ $errors->first('ecode') }}
                        </p>
                    @endif 
                </div> 
            </div> 
            <div class="row">
                <div class="col-xs-12 form-group">
                   
                     @if (count($sites_names) > 0)  
                      <?php   
						?> 
                        @foreach ($sites_names as $site)
					  <span class="boxcheck">{{ Form::checkbox('community[]', $site->id,'',array('class'=>'use_select')) }}</span><span>{{ $site->name }}</span>  <br>
                           @endforeach 
                          
                    @endif   
                   
                    <p class="help-block"></p>
                    @if($errors->has('community'))
                        <p class="help-block">
                            {{ $errors->first('community') }}
                        </p>
                    @endif
                </div> 
            </div>
			 <div class="row"> 
                <div class="col-xs-12 form-group">
                   {!! Form::label('dailycat1', 'Category:', ['class' => 'control-label']) !!}
                    {!! Form::select('category', $cat_names, old('category'), ['class' => 'form-control', 'id' => 'select_id11']) !!}	
                    <p class="help-block"></p>
                    @if($errors->has('category'))
                        <p class="help-block"> 
                            {{ $errors->first('category') }}
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
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('surname', 'Surname', ['class' => 'control-label']) !!}
                    {!! Form::text('surname', old('surname'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('surname'))
                        <p class="help-block">
                            {{ $errors->first('surname') }}
                        </p>
                    @endif
                </div>
            </div>
			 <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('age', 'Age', ['class' => 'control-label']) !!}
                    {!! Form::text('age', old('age'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('age'))
                        <p class="help-block">
                            {{ $errors->first('age') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('maritalstatus', 'Marital Status', ['class' => 'control-label']) !!}
                    {!! Form::text('maritalstatus', old('maritalstatus'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('maritalstatus'))
                        <p class="help-block">
                            {{ $errors->first('maritalstatus') }}
                        </p>
                    @endif
                </div>
            </div>
           
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('gender', 'Gender', ['class' => 'control-label']) !!}
                    {!! Form::text('gender', old('gender'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('gender'))
                        <p class="help-block">
                            {{ $errors->first('gender') }}
                        </p>
                    @endif
                </div>
            </div>
	    <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('refname', 'Father / Husband Name', ['class' => 'control-label']) !!}
                    {!! Form::text('refname', old('refname'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('refname'))
                        <p class="help-block">
                            {{ $errors->first('refname') }}
                        </p>
                    @endif
                </div>
            </div> 
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('aadhar_num', 'Aadhar Number', ['class' => 'control-label']) !!}
                    {!! Form::text('aadhar_num', old('aadhar_num'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('aadhar_num'))
                        <p class="help-block">
                            {{ $errors->first('aadhar_num') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('phone', 'Mobile Number', ['class' => 'control-label']) !!}
                    {!! Form::text('phone', old('phone'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('phone'))
                        <p class="help-block">
                            {{ $errors->first('phone') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('alterphone', 'Mobile Number 2', ['class' => 'control-label']) !!}
                    {!! Form::text('alterphone', old('alterphone'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('alterphone'))
                        <p class="help-block">
                            {{ $errors->first('alterphone') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('homephone', 'Home Phone', ['class' => 'control-label']) !!}
                    {!! Form::text('homephone', old('homephone'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('homephone'))
                        <p class="help-block">
                            {{ $errors->first('homephone') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
                    {!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('email')) 
                        <p class="help-block">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('temp_address', 'Temporary Address', ['class' => 'control-label']) !!}
                    {!! Form::text('temp_address', old('temp_address'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('temp_address'))
                        <p class="help-block">
                            {{ $errors->first('temp_address') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('permanent_address', 'Permanent Address', ['class' => 'control-label']) !!}
                    {!! Form::text('permanent_address', old('permanent_address'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('permanent_address'))
                        <p class="help-block">
                            {{ $errors->first('permanent_address') }}
                        </p>
                    @endif
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('other', 'Notes', ['class' => 'control-label']) !!}
                    {!! Form::text('other', old('other'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('other'))
                        <p class="help-block">
                            {{ $errors->first('other') }}
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>  
   
    {!! Form::submit('Save', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

