@extends('layouts.app')


@section('content')

<style type="text/css">
	.empids .commoncom{clear: both;padding: 4px;margin: 4px;}
    .empids .empbox{float: left;padding: 4px;border: 1px solid #cccccc;margin: 4px;}
    .empids .empbox i{color:red; font-size:20px;}
</style>

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

   <!-- <h3 class="page-title">Tasks</h3>-->
    {!! Form::open(['method' => 'POST', 'route' => ['indents.store']]) !!}

    <div class="panel panel-default panelmar tsas-crseations">
        <div class="panel-heading">
            Indents 
            <p class="ptag">
                <a href="{{ route('indents.index') }}" class="btn btn-back-list">Back</a> 
            </p> 
        </div>
        
        <div class="panel-body">

            <div class="row class-ctration">
			
			 <div class="col-sm-2 form-group employee-toiele">
                    {!! Form::label('item_code', 'Community', ['class' => 'control-label']) !!}
                    {!! Form::select('site', $sites, old('site'), ['class' => 'form-control', 'id' => 'select_id11']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('item_code'))
                        <p class="help-block">
                            {{ $errors->first('item_code') }}
                        </p>
                    @endif   
                </div>
			
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
						 <option value="Low">Low</option>
						 <option value="Medium">Medium</option>
						 <option value="High">High</option>
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
   
    {!! Form::submit('Submit', ['class' => 'btn btn-danger btn-save']) !!}
    {!! Form::close() !!}
<script type="text/javascript">
    fu_inputs = {};
    fu_inputs['refid']=0;
    fu_inputs['multiple']=true;
    fu_inputs['ufilename']='task_file';
			</script>
 @include('partials.footer')

@stop

