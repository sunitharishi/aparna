@extends('layouts.app')


@section('content')

<style type="text/css">
	.empids .commoncom{clear: both;padding: 4px;margin: 4px;}
    .empids .empbox{float: left;padding: 4px;border: 1px solid #cccccc;margin: 4px;}
    .empids .empbox i{color:red; font-size:20px;}
</style>

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

   <!-- <h3 class="page-title">Tasks</h3>-->
     <div class="panel panel-default panelmar tsas-crseations">
    {!! Form::model($task, ['method' => 'PUT', 'route' => ['forums.update', $task->id]]) !!}
        {!! Form::hidden('attachment_delete',old('attachment_delete'),['id'=>'attachment_delete']) !!}
   
        <div class="panel-heading">
           Forums
           <p class="ptag">
              <a href="{{ route('forums.index') }}" class="btn btn-back-list pull-right">Back</a>  
           </p>
        </div>    

        <div class="panel-body">
			 
            <div>
            <div class="row class-ctration">
                <div class="col-sm-2 form-group edit-class">
                    {!! Form::label('category', 'Category', ['class' => 'control-label']) !!}
                    {!! Form::select('category', $categories, old('category'), ['class' => 'form-control select2mes']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('category'))
                        <p class="help-block">
                            {{ $errors->first('category') }}
                        </p>
                    @endif
                </div>
				
            
                 <div class="col-sm-3 form-group fclass-flass">
                    {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>

                <div class="col-sm-1 form-group coikse-colde">
                    {!! Form::label('frcode', 'Code', ['class' => 'control-label']) !!}
                    {!! Form::text('frcode', old('frcode'), ['class' => 'form-control', 'placeholder' => '','readonly']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('frcode'))
                        <p class="help-block">
                            {{ $errors->first('frcode') }}
                        </p>
                    @endif 
                </div> 
				
            </div>   
         
			<div class="row">
                <div class="col-sm-12 form-group descrioptions">
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

            <div class="row class-ctration">
                <div class="col-sm-12 form-group descseiption-atteasnemt">
                    {!! Form::label('', 'Attachments', ['class' => 'control-label']) !!}
                    <div id="fileUploader_<?php echo $task->id?>">Attachments</div>
                    <div class="statusUploader" id="statusUploader_<?php echo $task->id?>"></div>
                    <div class="statusFailed" id="statusFailed_<?php echo $task->id?>"></div>
                    <div class="attachment_files ulopload-images">
                        @if (old('ufilepath')) 
                            @foreach(old('ufilepath') as $ai=>$aval)
                            <div class="ufileBox">{!! Form::hidden('ufilepath[]', $aval, ['class'=>'ufilepath']) !!}{!! Form::hidden('ufilename[]', old('empname')[$ai], ['class'=>'ufilename']) !!}<a href="/{{ $aval }}" target="_blank">{{ old('ufilename')[$ai] }}</a> <a href="javascript:void(0)" onclick="delete_uploaded_file(this)"><i class="fa fa-close"></i></a></div>
                            @endforeach

                            @if (old('afileid')) 
                                @foreach(old('afileid') as $ai=>$aid)
                                <div class="ufileBox"><a href="{{ $task_files_path.old('afilepath')[$ai] }}" target="_blank">{{ old('afilename')[$ai] }}</a> <a href="javascript:void(0)" onclick="delete_task_attachment(this,{{ $aid }})"><i class="fa fa-close"></i></a>
                                    {!! Form::hidden('afileid[]', $aid, ['class'=>'ufileid']) !!}
                                    {!! Form::hidden('afilepath[]', old('afilepath')[$ai], ['class'=>'ufilepath']) !!}
                                    {!! Form::hidden('afilename[]', old('afilename')[$ai], ['class'=>'ufilename']) !!}
                                </div>
                                @endforeach                        
                            @endif

                        @else
                            @if ($taskfiles)                         
                                @foreach($taskfiles as $taval)
                                <div class="ufileBox"><a href="{{ $task_files_path.$taval->file }}" target="_blank">{{ $taval->title }}</a> <a href="javascript:void(0)" onclick="delete_task_attachment(this,{{ $taval->id }})"><i class="fa fa-close"></i></a>
                                    {!! Form::hidden('afileid[]', $taval->id, ['class'=>'ufileid']) !!}
                                    {!! Form::hidden('afilepath[]', $taval->file, ['class'=>'ufilepath']) !!}
                                    {!! Form::hidden('afilename[]', $taval->title, ['class'=>'ufilename']) !!}
                                </div>
                                @endforeach                        
                            @endif
                        @endif

                        
                    </div>                    
                </div>
            </div>
		
	
		
            
        </div>
    </div>

    {!! Form::submit('Update', ['class' => 'btn btn-danger btn-save']) !!}
    {!! Form::close() !!}
    </div>
<script type="text/javascript">
    fu_inputs = {};
    fu_inputs['refid']=<?php echo $task->id?>;
    fu_inputs['multiple']=true;
    fu_inputs['ufilename']='task_file';
</script>    
  @include('partials.footer')
@stop

