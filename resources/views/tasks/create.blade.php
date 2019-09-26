@extends('layouts.app')


@section('content')

<style type="text/css">
	.empids .commoncom{clear: both;padding: 4px;margin: 4px;}
    .empids .empbox{float: left;padding: 4px;border: 1px solid #cccccc;margin: 4px;}
    .empids .empbox i{color:red; font-size:20px;}
</style>

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

   <!-- <h3 class="page-title">Tasks</h3>-->
    {!! Form::open(['method' => 'POST', 'route' => ['tasks.store']]) !!}

    <div class="panel panel-default panelmar tsas-crseations">
        <div class="panel-heading">
            Tasks
            
            <p class="ptag">
             <a href="{{ route('tasks.index') }}" class="btn btn-back-list">Back</a> 
            </p>
        </div>
        
        <div class="panel-body">
			<div class="row class-ctration">
                <div class="col-sm-2 form-group category-celections">
                    {!! Form::label('category', 'Category', ['class' => 'control-label']) !!}
                    {!! Form::select('category', $categories, old('category'), ['class' => 'form-control select2mes']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('category'))
                        <p class="help-block">
                            {{ $errors->first('category') }}
                        </p>
                    @endif
                </div>

                <div class="col-sm-3 form-group cateforuy-cinnunity">
                    {!! Form::label('site', 'Community', ['class' => 'control-label']) !!}
                    {!! Form::select('site', $sites, '', ['class' => 'form-control select2mes','onchange'=>'getCommunityUsers(this)']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('site'))
                        <p class="help-block">
                            {{ $errors->first('site') }}
                        </p>
                    @endif
                </div> 

                 
            </div>

            <div class="row">
              <div class="col-sm-3 form-group empgroup clategoruy-emploayee">
                    {!! Form::label('emp', 'Task Responsibility', ['class' => 'control-label']) !!}
                    {!! Form::select('emp', $empList, '', ['class' => 'form-control select2mes','id'=>'emp_id','onchange'=>'select_site_emp(this)']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('site'))
                        <p class="help-block">
                            {{ $errors->first('site') }}
                        </p>
                    @endif
                </div>
               <!-- {!! Form::label('', 'Task Assigners', ['class' => 'control-label']) !!}-->
                <div class="col-sm-9 form-group empids employee-recuritment" style="width:250px;">
                    @if (old('empid')) 
                        @foreach(old('empid') as $ui=>$tuval)
                        <div class="empbox empid{{ $tuval }}">
                            <a onclick="task_emp_delete(this)"><i class="fa fa-close"></i></a> {{ old('empname')[$ui] }}
                            {!! Form::hidden('empid[]',$tuval) !!}
                            {!! Form::hidden('empname[]',old('empname')[$ui]) !!}
                        </div> 
                        @endforeach
                    @endif
                </div>
            </div>
             <div class="row task-created-date">
              <div class="col-sm-2 form-group">
                    {!! Form::label('title', 'Task Created Date', ['class' => 'control-label']) !!}
                    <?php //$dateval = date('Y-m-d'); ?>
                     <span class="permission-space"><input type="text" name="task_create_date" id="example1" class="hasDatePicker form-control"></span>
                </div>
               <!-- {!! Form::label('', 'Task Assigners', ['class' => 'control-label']) !!}-->
                <div>
                  	 &nbsp;
                </div>
            </div>

            <div class="row class-ctration">
                 <div class="col-sm-3 form-group employee-toiele">
                    {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div> 
 
                <div class="col-sm-1 form-group emploauyee-prigfority">
                    {!! Form::label('priority', 'Priority', ['class' => 'control-label']) !!}
                    {!! Form::select('priority', $priorities, old('priority'), ['class' => 'form-control']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('priority'))
                        <p class="help-block">
                            {{ $errors->first('priority') }}
                        </p>
                    @endif
                </div>
				
				  <div class="col-sm-2 form-group emploauyee-prigfority">
                    {!! Form::label('task_nature', 'Task Nature', ['class' => 'control-label']) !!}
                    {!! Form::select('task_nature', $tasknature, old('priority'), ['class' => 'form-control']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('task_nature'))
                        <p class="help-block">
                            {{ $errors->first('task_nature') }}
                        </p>
                    @endif
                </div>
				
				  <div class="col-sm-2 form-group emploauyee-prigfority">
                    {!! Form::label('task_type', 'Task Type', ['class' => 'control-label']) !!} 
					 {!! Form::select('task_type', $tasktype, old('priority'), ['class' => 'form-control']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('task_type'))
                        <p class="help-block">
                            {{ $errors->first('task_type') }}
                        </p>
                    @endif
                </div>

                <div class="col-sm-2 form-group emploauee-strsatus">
                    {!! Form::label('status', 'Status', ['class' => 'control-label']) !!}
                    {!! Form::select('status', $statuses, old('status'), ['class' => 'form-control']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('status'))
                        <p class="help-block">
                            {{ $errors->first('status') }}
                        </p>
                    @endif
                </div>

            </div>

            <div class="row">
                <div class="col-sm-12 form-group catrogory-slectioh-descriotp">
                    {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
                    {!! Form::textarea('description', old('description'), ['class' => 'form-control summernote', 'placeholder' => 'Enter Details here']) !!}
                    <p class="help-block"></p>
                    
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 form-group conr-corm-pop">
                    {!! Form::label('', 'Attachments', ['class' => 'control-label']) !!}
                    <div id="fileUploader_0" class="attachment-ufilepath">Attachments</div>
                    <div class="statusUploader" id="statusUploader_0"></div>
                    <div class="statusFailed" id="statusFailed_0"></div>
                    <div class="attachment_files">
                        @if (old('ufilepath')) 
                            @foreach(old('ufilepath') as $ai=>$aval)
                            <div class="ufileBox">{!! Form::hidden('ufilepath[]', $aval, ['class'=>'ufilepath']) !!}{!! Form::hidden('ufilename[]', old('empname')[$ai], ['class'=>'ufilename']) !!}<a href="/{{ $aval }}" target="_blank">{{ old('ufilename')[$ai] }}</a> <a href="javascript:void(0)" onclick="delete_uploaded_file(this)"><i class="fa fa-close"></i></a></div>
                            @endforeach
                        @endif
                    </div>
                    <p class="help-block"></p>                    
                    
                </div>
            </div>
           
         
		
            
        </div>  
   
    {!! Form::submit('Submit', ['class' => 'btn btn-danger btn-save']) !!}
    </div>
    {!! Form::close() !!}
<script type="text/javascript">
    fu_inputs = {};
    fu_inputs['refid']=0;
    fu_inputs['multiple']=true;
    fu_inputs['ufilename']='task_file';
	$( document ).ready(function() {
		$("#example1").datepicker({
	
		 dateFormat: "dd-mm-yy",
		  minDate:new Date()		
		});});

			</script>
 @include('partials.footer')

@stop

