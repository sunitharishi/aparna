@extends('layouts.app')

@section('content')
    <h3 class="page-title">Forums</h3>
    
    <div class="panel panel-default panelmar">
        <div class="panel-heading">
            View
            <a href="{{ route('forums.index') }}" class="btn btn-default">Back to list</a>        
        </div>
        
        <div class="panel-body sites-view">
            <div class="row">
                <div class="col-sm-12">
                  <div>@if($catg) {{{ $catg->name }}} @endif</div>
                   
                      
                          <div>  <b>Task {{ $task->frcode }}: </b>{{ $task->title }} </div>
                      
                            <div>Created by <b>{{ $taskownername }}</b> on <b>{{ date("M d,Y",strtotime($task->created_at))}}</b> at <b>{{ date("h:i a",strtotime($task->created_at))}}</b></div>
                       <div>
                        {!! $task->description !!}
                        </div>
                        @if ($taskfiles) 
                        <div>
                       Attachments
                      
                            @foreach($taskfiles as $taval)
                            <div><a href="{{ $task_files_path.$taval->file }}" target="_blank">{{ $taval->title }}</a></div>
                            @endforeach
                      
                        @endif
                        </div>
					
                   
                </div>
            </div> 

                    
        </div>
		 @if($current_userid==$task->user_id) @else
		 <a href="{{ route('forums.raiseforum',[$task->id]) }}" >Raise</i></a>
		  <a href="{{ route('forums.downforum',[$task->id]) }}" >Down</i></a>
		  @endif

        @if($taskcomments)
        <div class="panel-heading">
            Comments
        </div>

        <div class="panel-body">
            @foreach($taskcomments as $cval)
            <div class="comment">
                <div>@if($current_userid==1 || $current_userid==$cval->user_id)
                    <a href="{{ route('forums.commentdel',[$cval->id]) }}" onclick="if(!confirm('Are you sure you want to delete?')) return false;"><i class="fa fa-trash"></i></a> @endif
                    <b>{{ $cval->user->name }} </b> on <b>{{ date("M d,Y",strtotime($cval->created_at))}}</b> at <b>{{ date("h:i a",strtotime($cval->created_at))}}</b></div>
            </div>
            <div>{!! $cval->reply !!}</div>            
            @if (isset($task_CommentFiles[$cval->id]) && $task_CommentFiles[$cval->id]) 
            <div>
                @foreach($task_CommentFiles[$cval->id] as $aval)
                <div><a href="{{ $task_files_path.$aval['file'] }}" target="_blank">{{ $aval['title'] }}</a></div>
                @endforeach
            </div>
            @endif
            <hr /> 
			@if (isset($commentReply[$cval->id]) && $commentReply[$cval->id]) 
			 @foreach($commentReply[$cval->id] as $avalr)
			   @if($current_userid==1 || $current_userid==$avalr->user_id)
                    <a href="{{ route('forums.commentreplydel',[$avalr->id]) }}" onclick="if(!confirm('Are you sure you want to delete?')) return false;"><i class="fa fa-trash"></i></a> @endif
                <div>{!! $avalr->commentreply !!}</div>
				<div>Created by <b>{{ getlogeedname($avalr->user_id) }}</b> on <b>{{ date("M d,Y",strtotime($avalr->created_at))}}</b> at <b>{{ date("h:i a",strtotime($avalr->created_at))}}</b></div>
                @endforeach
			 @endif	
			
			<button onclick="displycommentdiv(<?php  echo $cval->id; ?>);">add a comment</button>
			<div class="panel-body sites-view" id="comment_div_<?php  echo $cval->id; ?>" style="display:none">
            {!! Form::open(['method' => 'POST', 'route' => ['forums.commentreply'],'id'=>'frmTaskCommentrply']) !!}
            {!! Form::hidden('comment_id',0) !!}
			 {!! Form::hidden('forum_id',$task->id) !!}  
			{!! Form::hidden('reply_id',$cval->id) !!}
            {!! Form::hidden('comment_action','comment') !!}
            <div class="col-xs-12 form-group foptions">
                {!! Form::textarea('commentreply', old('commentreply'), ['class' => 'form-control summernote', 'placeholder' => '']) !!}
                <p class="help-block"></p>
                @if($errors->has('comment'))
                    <p class="help-block">
                        {{ $errors->first('comment') }}
                    </p>
                @endif
            </div>
            {!! Form::submit('Add this comment', ['class' => 'btn btn-primary']) !!}                
            {!! Form::close() !!}
        </div>
            @endforeach
        </div>
 
        @endif

        <div class="panel-heading">
            Leave a comment...
        </div>   

        <div class="panel-body sites-view">
            {!! Form::open(['method' => 'POST', 'route' => ['forums.comment'],'id'=>'frmTaskComment']) !!}
            {!! Form::hidden('task_id',$task->id) !!}
            {!! Form::hidden('comment_id',0) !!}
            {!! Form::hidden('comment_action','comment') !!}
            <div class="col-xs-12 form-group foptions">
                {!! Form::textarea('comment', old('comment'), ['class' => 'form-control summernote', 'placeholder' => '']) !!}
                <p class="help-block"></p>
                @if($errors->has('comment'))
                    <p class="help-block">
                        {{ $errors->first('comment') }}
                    </p>
                @endif
            </div>

            <div class="col-sm-12 form-group">
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

            {!! Form::submit('Add this comment', ['class' => 'btn btn-primary']) !!}                
            {!! Form::close() !!}
        </div>
    </div>
<script type="text/javascript">
    fu_inputs = {};
    fu_inputs['refid']=0;
    fu_inputs['multiple']=true;
    fu_inputs['ufilename']='task_file';
</script>   
<script>
 function displycommentdiv(dis){
 //  alert(dis);
   $("#comment_div_"+dis).toggle('slow');
 }
</script> 
  @include('partials.footer')
@stop