@extends('layouts.app')


@section('content')

<style type="text/css">
	.empids .commoncom{clear: both;padding: 4px;margin: 4px;}
    .empids .empbox{float: left;padding: 4px;border: 1px solid #cccccc;margin: 4px;}
    .empids .empbox i{color:red; font-size:20px;}
</style>

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <!--<h3 class="page-title">Tasks</h3>-->
    
    {!! Form::model($task, ['method' => 'PUT', 'route' => ['indents.update', $task->id]]) !!}
        {!! Form::hidden('attachment_delete',old('attachment_delete'),['id'=>'attachment_delete']) !!}
    <div class="panel panel-default panelmar tsas-crseations">
        <div class="panel-heading">
           Indents
        </div>    

        <div class="panel-body">

            <div class="row class-ctration">
			
			     <div class="col-sm-1 form-group employee-toiele">
                    {!! Form::label('item_code', 'Item Code', ['class' => 'control-label']) !!}
                    {!! Form::text('item_code', old('item_code'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('item_code'))
                        <p class="help-block">
                            {{ $errors->first('item_code') }}
                        </p>
                    @endif   
                </div>
				
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
				
				<div class="col-sm-3 form-group employee-toiele">
                    {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
                    {!! Form::text('description', old('description'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div> 
				   
				<div class="col-sm-1 form-group employee-toiele">
                    {!! Form::label('priority', 'Priority', ['class' => 'control-label']) !!}
                    <select name="priority" class="form-control">
						 <option value="Low" <?php  if($task->priority == 'Low') echo 'selected = "Selected"';?>>Low</option>
						 <option value="Medium" <?php  if($task->priority == 'Medium') echo 'selected = "Selected"';?>>Medium</option>
						 <option value="High" <?php  if($task->priority == 'High') echo 'selected = "Selected"';?>>High</option>
					</select>  
                    <p class="help-block"></p>
                    @if($errors->has('priority'))
                        <p class="help-block">
                            {{ $errors->first('priority') }}
                        </p>
                    @endif
                </div> 
                
            </div>
            
        </div>
    </div>

    {!! Form::submit('Update', ['class' => 'btn btn-danger btn-save']) !!}
    {!! Form::close() !!}
<script type="text/javascript">
    fu_inputs = {};
    fu_inputs['refid']=<?php echo $task->id?>;
    fu_inputs['multiple']=true;
    fu_inputs['ufilename']='task_file';
</script>    
  @include('partials.footer')
@stop

