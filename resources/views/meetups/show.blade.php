@extends('layouts.app')

@section('content')
<style>
.panel-heading.task-header:hover 
{
     background-color: transparent; 
}
</style>
    
    <div class="panel panel-default panelmar mom-meetups">
    
        <a href="{{ route('meetups.index') }}" class="btn btn-back-list backto-to-list">Back</a>  
        <div class="panel-heading task-header eatinffobrai">
          <div class="meetups-index mom">
          
               <div class="mom-first-section">
                    <div class="selection">
                     <span class="page-title task-manager">MOM : </span>
                     <span class="three-opmee" valign="middle">@if($catg) {{{ $catg->name }}}- @endif</span>
                     <span class="taskkk-number">{{ $task->tcode }} </span>
                   </div>
                    @if ($taskusers)
                    <div class="mom-responsbility"><label class="responsibility">Responsibility:</label>
                       <?php $sitenameval = ""; $tucn = count($taskusers);?>
                        @foreach($taskusers as $tuval)
                        <div class="employeemame"><span class="bg-color"><?php if($sitenameval != $tuval->sitename) { ?></span><div class="employeemame"><span class="bg-color">{{ $tuval->sitename }}</span> :</div> <?php } ?> <a href="#">{{ $tuval->username }}</a></div>
                         <?php $sitenameval = $tuval->sitename; ?>
                        @endforeach
                    </div>
                    
                    <div class="mom-creation"><b>Created by</b> <span class="bg-color">{{ $taskownername }}</span> <b> on </b> <span class="bg-color">{{ date("M d,Y",strtotime($task->created_at))}}</span> <b> at </b> <span class="bg-color">{{ date("h:i a",strtotime($task->created_at))}}</span></div>
               </div>
               
               <div class="mom-second-section">
               	   <div class="priority"><label>Priority<span>:</span></label> <span class="bg-color">{{ $task->priority }}</span></div>
                   <div class="status"><label>Status<span>:</span></label><span class="bg-color"> {{ $task->status }} </span></div>
                    <div class="dead-line"><label>Dead Line<span>:</span> </label></div>
                     <div class="remaining-list">
                	<ul>
                    	<li><a href="#">Timelog</a></li>
                        <li><a href="#">Files</a></li>
                        <li><a href="#">Search</a></li>
                    </ul>
                </div>
               </div>
         
           </div>       
          </div>
     
     
     
        <div class="panel-body mom-view">
            <div class="row">
                <div class="col-sm-12">
                       <div class="mom-title"><label>Title<span>:</span></label> {{ $task->title }}</div>
                       <div class="mom-action"><label>Action Required<span>:</span></label></div>
                        <div class="mom-description"><b>Description </b></div>
                    <table class="table table-bordered table-striped generatorrr">
                       <tr>
                         <td colspan="3" class="tsaskwoner-taks"> {!! $task->description !!}</td>
                        </tr> 
                        @endif
                     </table>
                     
                     <div class="audio-files"><td><b>Audio Files</b></td></div>
                     <table class="table table-bordered table-striped generatorrr"> 
                       <tr >
                          <td colspan="2"></td>
                       </tr>
                      </table>
                      
                      <div class="mom-attachments"> <b>Attachments</b></div>
                      
                        @if ($taskfiles) 
                          <table class="table table-bordered table-striped generatorrr">  
                        <tr><td colspan="4">
                            @foreach($taskfiles as $taval)
                            <div class="image-files-path"><img src="../images/phone.jpg"  /><a href="{{ $task_files_path.$taval->file }}" target="_blank">{{ $taval->title }}</a>
                                 <div>2.05MB</div>
                            </div>
                            @endforeach
                        </td></tr>
                        </table>
                        @endif
						
                    
                </div>
            </div> 

                    
        </div>
       
       
       <div class="mom-comments">
        @if($taskcomments)
        <div class="mom-comments-heading">
            Comments
        </div>

       
            @foreach($taskcomments as $cval)
             <div class="panel-body mom-comments-section">
            <div class="mom-section">
            <div class="comment-mom">
                <div>@if($current_userid==1 || $current_userid==$cval->user_id)
                    <a href="{{ route('tasks.commentdel',[$cval->id]) }}" onclick="if(!confirm('Are you sure you want to delete?')) return false;"><i class="fa fa-trash"></i></a> @endif
                    <b>{{ $cval->user->name }} </b> on <b>{{ date("M d,Y",strtotime($cval->created_at))}}</b> at <b>{{ date("h:i a",strtotime($cval->created_at))}}</b></div>
           
            
            <div>{!! $cval->reply !!}</div>  </div>          
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
            </div>
            @endforeach
       

        @endif
      </div>
      
      <div class="mom-leave-comment">
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

            {!! Form::submit('Add this comment', ['class' => 'btn btn-default mom-comment']) !!}                
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