@extends('layouts.app')

@section('content')

    
    <div class="panel panel-default panelmar">
    
        <a href="{{ route('tasks.index') }}" class="btn btn-default backto-to-list">Back to list</a> 
        <div class="panel-heading task-header">
            <div class="selection"><span class="page-title task-manager">Task:</span>
             <span class="three-opmee" valign="middle">@if($catg) {{{ $catg->name }}}- @endif</span>
             <span class="taskkk-number">{{ $task->tcode }} </span></div>
              <div class="priority-status">
                <div class="bolc-color">Created by <b>{{ $taskownername }}</b> on <b>{{ date("M d,Y",strtotime($task->created_at))}}</b> at <b>{{ date("h:i a",strtotime($task->created_at))}}</b></div>
                <div class="prigorityy-low"><b>Priority:</b> {{ $task->priority }}</div>
                <div class="statruss-jloe"><b>Status:</b> {{ $task->status }}</div>
             </div>
           
            @if ($taskusers)
            <div class="emplouyee"> 
            	<div class="emplouee-aname">Assign<br />
                
                	 <?php $sitenameval = ""; ?>
                                @foreach($taskusers as $tuval)
                                <div class="employeemame"><?php if($sitenameval != $tuval->sitename) { ?><div class="employeemame"><b>{{ $tuval->sitename }}</b> :</div> <?php } ?> <a href="#">{{ $tuval->username }}</a></div>
                                 <?php $sitenameval = $tuval->sitename; ?>
                                @endforeach
                </div>
                <div class="remaining-lidts">
                	<ul>
                    	<li><a href="#">Timelog</a></li>
                        <li><a href="#">Files</a></li>
                        <li><a href="#">Search</a></li>
                    </ul>
                </div>
            </div>       
        </div>
        
        <!--  <div class="task-sescription"></div>
          <div class="descrioption-clode"></div>-->
        <div class="panel-body sites-view">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-bordered table-striped generatorrr">
                       <tr style="background-color:#e1e0dd;">
                       		<td><b>Title:</b> {{ $task->title }}</td>
                            <td colspan="2"></td>
                       </tr>
                       <tr style="background-color:#e1e0dd;">
                         <td colspan="3" class="tsaskwoner-taks"><b>Description:</b> {!! $task->description !!}</td>
                        
                       
                                  
                        </tr> 
                        @endif
                       
                        @if ($taskfiles) 
                        <tr style="background-color:#e1e0dd;"><th colspan="4">Attachments</th></tr>
                        <tr style="background-color:#e1e0dd;"><td colspan="4">
                            @foreach($taskfiles as $taval)
                            <div class="image-files-path"><img src="../images/phone.jpg"  /><a href="{{ $task_files_path.$taval->file }}" target="_blank">{{ $taval->title }}</a>
                                 <div>2.05MB</div>
                            </div>
                            @endforeach
                        </td></tr>
                        @endif
						<tr></tr>
                    </table>
                </div>
            </div> 

                    
        </div>

        @if($taskcomments)
        <div class="comment-byyyyy">
            Comments
        </div>

        <div class="panel-body comment-odddy">
            @foreach($taskcomments as $cval)
            <div class="design-comment">
            <div class="comment">
                <div>@if($current_userid==1 || $current_userid==$cval->user_id)
                    <a href="{{ route('tasks.commentdel',[$cval->id]) }}" onclick="if(!confirm('Are you sure you want to delete?')) return false;"><i class="fa fa-trash"></i></a> @endif
                    <b>{{ $cval->user->name }} </b> on <b>{{ date("M d,Y",strtotime($cval->created_at))}}</b> at <b>{{ date("h:i a",strtotime($cval->created_at))}}</b></div>
            </div>
            
            <div>{!! $cval->reply !!}</div>           
            @if (isset($task_CommentFiles[$cval->id]) && $task_CommentFiles[$cval->id]) 
            <div>
                @foreach($task_CommentFiles[$cval->id] as $aval)
                <div class="multiple-file-upsown"><img src="../images/phone.jpg"  /><a href="{{ $task_files_path.$aval['file'] }}" target="_blank">{{ $aval['title'] }}</a>
                          <div>2.05MB</div>
                </div>
                @endforeach
            </div>
           
            @endif
            </div>  
           <!-- <hr />-->
            @endforeach
        </div>

        @endif

        <div class="leaaaving-commmmtnt">
            Leave a comment...
        </div>   

        <div class="panel-body sites-view">
            {!! Form::open(['method' => 'POST', 'route' => ['tasks.comment'],'id'=>'frmTaskComment']) !!}
            {!! Form::hidden('task_id',$task->id) !!}
            {!! Form::hidden('comment_id',0) !!}
            {!! Form::hidden('comment_action','comment') !!}
            <div class="col-xs-12 form-group foptions old-cmoontt">
                {!! Form::textarea('comment', old('comment'), ['class' => 'form-control summernote', 'placeholder' => '']) !!}
                <p class="help-block"></p>
                @if($errors->has('comment'))
                    <p class="help-block">
                        {{ $errors->first('comment') }}
                    </p>
                @endif
            </div>

            <div class="col-sm-12 form-group attachmenbts">
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

            {!! Form::submit('Add this comment', ['class' => 'btn btn-primary athis-comment']) !!}                
            {!! Form::close() !!}
        </div>
    </div>
<script type="text/javascript">
    fu_inputs = {};
    fu_inputs['refid']=0;
    fu_inputs['multiple']=true;
    fu_inputs['ufilename']='task_file';
</script>    
  @include('partials.footer')
@stop