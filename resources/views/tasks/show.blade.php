@extends('layouts.app')

@section('content')

    <style>
	 body
	 {
	  font-size:12px !important;
	 }
	</style>
    <div class="panel panel-default panelmar tasks-view-page">
    
        <a href="{{ route('tasks.index') }}" class="btn btn-back-list backto-to-list">Back</a> 
    <div class="panel-heading task-header">
    
       <div class="first-section">
          <div class="selection">
              <span class="page-title task-manager">Task : </span>
              <span class="three-opmee" valign="middle">@if($catg) {{{ $catg->name }}}- @endif</span>
              <span class="taskkk-number">{{ $task->tcode }} </span>
         </div>
          @if ($taskusers)
        <div class="assign-employee"> 
            <div class="employee-name"><label class="assign-label">Assign</label>
			 <?php $sitenameval = ""; ?>
                @foreach($taskusers as $tuval)
                <div class="employeemame"><?php if($sitenameval != $tuval->sitename) { ?><div class="employeemame"><span class="bg-color community-color">{{ $tuval->sitename }} :</span></div> <?php } ?> <a href="#">{{ $tuval->username }}</a></div>
                 <?php $sitenameval = $tuval->sitename; ?>
                  @endforeach
               </div>
        </div> 
        
         
          <div class="task-name"><b>Created by</b> <span class="bg-color"> {{ $taskownername }}</span> <b> on </b> <span class="bg-color">{{ date("M d,Y",strtotime($task->created_at))}}</span> <b> at </b> <span class="bg-color">{{ date("h:i a",strtotime($task->created_at))}} </span></div>
       </div>
       
       <div class="second-section">
            <div class="priority-low"><label>Priority<span>:</span></label> <span class="bg-color">{{ $task->priority }} </span></div>
             <div class="high-priority"><label>Status<span>:</span></label> <span class="bg-color"> {{ $task->status }} </span></div>
             <div class="task-nature"><label>Task Nature<span>:</span></label> {{ $task->task_nature }}</div>
            <div class="task-type"><label>Task Type<span>:</span></label> {{ $task->task_type }}</div>
       </div>
     
            
    </div>
        
        <!--  <div class="task-sescription"></div>
          <div class="descrioption-clode"></div>-->
          <div class="remaining-color">
        <div class="panel-body sites-view">
            <div class="row">
                <div class="col-sm-12 description-table">
                       <div class="title"><b>Title:</b> {{ $task->title }} </div>
                        <div class="description"><b>Description</b> </div>
                       
                        <table class="table table-bordered table-striped generatorrr">
                       <tbody>
                       <tr>
                         <td colspan="3">{!! $task->description !!}</td>
                        </tr> 
                        </tbody>
                        @endif
                       </table>
                   
                      
                      <div class="attachments">
                         <div class="attachments-label">Attachments</div>
                      
                        @if ($taskfiles) 
                        <table> 
                        
                            @foreach($taskfiles as $taval)
                              <tr><td colspan="4">
                            <div class="image-files-path"><img src="{{ $task_files_path.$taval->file }}" width="54px"  /><a href="{{ $task_files_path.$taval->file }}" target="_blank">{{ $taval->title }}</a>
                                 <div>2.05MB</div>
                            </div>
                            </td></tr>
                            @endforeach
                        
                          </table>
                        @endif
						
                  
                    </div>
                </div>
            </div> 

            </div>         
        </div>


     <div class="comments-section">
        @if($taskcomments)
        <div class="comments">
            Comments
        </div>

       
            @foreach($taskcomments as $cval)
              <div class="panel-body comment-odddy">
            <div class="comment">
                <div>@if($current_userid==1 || $current_userid==$cval->user_id)
                    <a href="{{ route('tasks.commentdel',[$cval->id]) }}" onclick="if(!confirm('Are you sure you want to delete?')) return false;"><i class="fa fa-trash"></i></a> @endif
                    <b>{{ $cval->user->name }} </b> on <b>{{ date("M d,Y",strtotime($cval->created_at))}}</b> at <b>{{ date("h:i a",strtotime($cval->created_at))}}</b></div>
            </div>
            
            <div>{!! $cval->reply !!}</div>           
            @if (isset($task_CommentFiles[$cval->id]) && $task_CommentFiles[$cval->id]) 
            <div class="image-upload">
                @foreach($task_CommentFiles[$cval->id] as $aval)
                <div class="multiple-file-upsown"><img src="{{ $task_files_path.$aval['file'] }}"  width="54px"  /><a href="{{ $task_files_path.$aval['file'] }}" target="_blank">{{ $aval['title'] }}</a>
                          <div>2.05MB</div>
                </div>
                @endforeach
            </div>
           
            @endif
            </div>
           <!-- <hr />-->
            @endforeach
        

        @endif
      </div>
    
      <div class="fctaker">
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
                <div id="fileUploader_0" class="inputfileuipoad">Attachments</div>
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
          
            {!! Form::submit('Add this comment', ['class' => 'btn btn-default comment']) !!}                
            {!! Form::close() !!}
        </div>
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