@extends('layouts.app')


@section('content')

<style type="text/css">
	.empids .commoncom{clear: both;padding: 4px;margin: 4px;}
    .empids .empbox{float: left;padding: 4px;border: 1px solid #cccccc;margin: 4px;}
    .empids .empbox i{color:red; font-size:20px;}
</style>

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <div class="panel panel-default panelmar tsas-crseations">
    <!--<h3 class="page-title">Forums</h3>-->
    {!! Form::open(['method' => 'POST', 'route' => ['forums.store']]) !!}

  
        <div class="panel-heading">
            Forums
            <p class="ptag">
                <a href="{{ route('forums.index') }}" class="btn btn-back-list pull-right">Back</a>  
            </p>
        </div>
        
        <div class="panel-body">
			<div>
               <div class="row class-ctration">
                <div class="col-sm-2 form-group forms-catrgory">
                    {!! Form::label('category', 'Category', ['class' => 'control-label']) !!}
                    {!! Form::select('category', $categories, old('category'), ['class' => 'form-control select2mes']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('category'))
                        <p class="help-block">
                            {{ $errors->first('category') }}
                        </p>
                    @endif
                </div> 
				
            
                 <div class="col-sm-3 form-group fiens-tiele">
                    {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>  
            </div>

            <div class="row">
                <div class="col-sm-12 form-group forums-descrioption">
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
                <div class="col-sm-12 form-group formsu-attachement">
                    {!! Form::label('', 'Attachments', ['class' => 'control-label']) !!}
                    <div id="fileUploader_0">Attachments</div>
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
    </div>  
 
    {!! Form::submit('Submit', ['class' => 'btn btn-danger btn-save']) !!}
    {!! Form::close() !!}
      </div>
<script type="text/javascript">
    fu_inputs = {};
    fu_inputs['refid']=0;
    fu_inputs['multiple']=true;
    fu_inputs['ufilename']='task_file';
			</script>
 @include('partials.footer')

@stop

