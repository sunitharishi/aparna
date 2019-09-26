@extends('layouts.app')

@section('content')
<div class="forums-tasks">
    <div class="panel panel-default panelmar forums-view-page">
            <div class="forumtitle">
            <h1><span>Forum</span></h1>
            <a href="{{ route('forums.index') }}" class="btn btn-back-list pull-right">Back</a>  
            </div>
        <div class="panel-heading">      
            <div class="task-title"><h2>{{ $task->title }}</h2></div>
        </div><br /><br />
        <div class="col-sm-8 forums-view-first-section">
            <div class="panel-body sites-view">
                <div class="row">
                    <div class="col-sm-12">
                              
                               
                                <div class="raise-down">
                                    <a href="{{ route('forums.raiseforum',[$task->id]) }}" class="raise" style="color:green;"><img src="../images/up.jpg" /></a>
                                    <span class="count">326</span>	
                                    <a href="{{ route('forums.downforum',[$task->id]) }}" class="down" style="color:red;"><img src="../images/dwn.jpg" /></a>
                                  </div>
                                
                                   <div class="descp">
                                    {!! $task->description !!}
                                    </div>
                           		  @if ($taskfiles) 
                            <div class="attachments">
                           		<b><u>Attachments</u></b><br />
                                @foreach($taskfiles as $taval)
                                <div class="attchfiles"><img src="{{ $task_files_path.$taval->file }}" width="54px"  /><a href="{{ $task_files_path.$taval->file }}" target="_blank">{{ $taval->title }}</a></div>
                                @endforeach                          
                            @endif                                                     
                            <div class="user-info">
                                <div class="info">
	                                Asked by <b>{{ $taskownername }}</b><br />on <b>{{ date("M d,Y",strtotime($task->created_at))}}</b><img src="/images/ambika.jpg" alt="" width="32px" height="32px" /> at <b>{{ date("h:i a",strtotime($task->created_at))}}</b>
                                </div>
                            </div>
                            </div> 
                        
                       
                    </div>
                </div> 
    
                        
            </div>
            
    		<hr />
            
            @if($taskcomments)
            <div class="panel-heading">
                <h2>Replies</h2>
            </div>

            <div class="panel-body">
                @foreach($taskcomments as $cval)
                <div class="comment">
                    <div>
                    	@if($current_userid==1 || $current_userid==$cval->user_id)
                        <a href="{{ route('forums.commentdel',[$cval->id]) }}" onclick="if(!confirm('Are you sure you want to delete?')) return false;" class="deletebtn"><i class="fa fa-trash"></i></a> @endif                        
                    </div>
                </div>
                <div>{!! $cval->reply !!}</div>            
                @if (isset($task_CommentFiles[$cval->id]) && $task_CommentFiles[$cval->id]) 
                <div>
                    @foreach($task_CommentFiles[$cval->id] as $aval)
                    <div><a href="{{ $task_files_path.$aval['file'] }}" target="_blank">{{ $aval['title'] }}</a></div>
                    @endforeach
                </div>
                @endif
	             <div class="repliedby">        
                 	<div class="cnt">
                    	replied {{ date("M d, y ",strtotime($cval->created_at))}} {{ date("h:i a",strtotime($cval->created_at))}}
	                 	<img src="/userprofile.jpg" alt="" width="32px" height="32px"  /><br /><b><?php if(isset($cval->user->name)) echo $cval->user->name; ?> </b> 
                    </div>
                 </div>
                <hr />    
                <div class="subreplies">
                @if (isset($commentReply[$cval->id]) && $commentReply[$cval->id]) 
                 @foreach($commentReply[$cval->id] as $avalr)
                   @if($current_userid==1 || $current_userid==$avalr->user_id)
                        <a href="{{ route('forums.commentreplydel',[$avalr->id]) }}" onclick="if(!confirm('Are you sure you want to delete?')) return false;" class="deletebtn"><i class="fa fa-trash"></i></a> @endif
                    <div class="cmntreply">{!! $avalr->commentreply !!}</div>                    
                    <div class="subreplies-in">
                    	<div class="left">
                        <button onclick="setcommentstatus(<?php echo $avalr->id;?>,<?php echo $cval->id; ?>,<?php echo $task->id;?>,'like');" class="btn btn-info" style="padding:8px 0px;"><i class="fa fa-thumbs-up" aria-hidden="true"><span id="likecount"><?php echo $commentlikesres[$avalr->id]['likes']; ?></span></i></button>
                        <button onclick="setcommentstatus(<?php echo $avalr->id;?>,<?php echo $cval->id; ?>,<?php echo $task->id;?>,'dislike');" class="btn btn-info" style="padding:8px 0px;"><i class="fa fa-thumbs-down" aria-hidden="true"><span id="dislikecount"><?php echo $commentlikesres[$avalr->id]['dislikes']; ?></span></i></button></div> 
                        <div class="right"><span>-</span> <span class="nm">{{ getlogeedname($avalr->user_id) }}</span> <span class="dt">{{ date("M d,Y",strtotime($avalr->created_at))}}</span> at <span>{{ date("h:i a",strtotime($avalr->created_at))}}</span></div></div><hr />
                    @endforeach
                 @endif	
                </div>
                <button onclick="displycommentdiv(<?php  echo $cval->id; ?>);" class="btn btn-info">add a comment</button>
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
                {!! Form::submit('Post your answer', ['class' => 'btn btn-primary']) !!}                
                {!! Form::close() !!}
            </div>
                @endforeach
            </div>
 
        	@endif

            <div class="panel-heading" style="font-size:16px; color:#003087; font-weight:bold;">
                Your Answer...
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
    
                {!! Form::submit('Post your answer', ['class' => 'btn btn-primary']) !!}                
                {!! Form::close() !!}
            </div>
        </div>
        <div class="col-sm-4 forums-view-second-section">
        	<div class="taskcnt">
	        	<div class="cnt"><span>Task :</span> {{ $task->frcode }}</div>
	        	<div class="cnt"><span>Asked :</span> 7 years, 11 months ago</div>
	        	<div class="cnt"><span>Viewed :</span> 1,203,921 times</div>
	        	<!--<div class="cnt"><span>Active :</span> 3 months ago</div>-->
            </div>
            <hr />
            <div class="related">
            	<div>
                	<h4><b>Related</b></h4>
                </div>
            	<ul>	
                	<li><a href="#"><span>2000</span> How many times has the matter in our solar system been recycled from previous stars?</a></li>
                	<li><a href="#"><span>50</span> How many times has the matter in our solar system been recycled from previous stars?</a></li>	
                	<li><a href="#"><span>10</span> How many times has the matter in our solar system been recycled from previous stars?</a></li>
                	<li><a href="#"><span>100</span> How many times has the matter in our solar system been recycled from previous stars?</a></li>	
                	<li><a href="#"><span>3000</span> How many times has the matter in our solar system been recycled from previous stars?</a></li>
                	<li><a href="#"><span>20</span> How many times has the matter in our solar system been recycled from previous stars?</a></li>
                </ul>
            </div>
            <hr />
            <div class="tabs">
            	<div>
                	<h4><b>Tags</b></h4>
                </div>
            	 <div class="tag">FMS <i class="closetag fa fa-times"></i></div> <div class="tag">PMS <i class="closetag fa fa-times"></i></div>  <div class="tag">Fire safety <i class="closetag fa fa-times"></i></div> 
            	 <div class="tag">FMS <i class="closetag fa fa-times"></i></div> <div class="tag">PMS <i class="closetag fa fa-times"></i></div>  <div class="tag">Fire safety <i class="closetag fa fa-times"></i></div> 
            	 <div class="tag">FMS <i class="closetag fa fa-times"></i></div> <div class="tag">PMS <i class="closetag fa fa-times"></i></div>  <div class="tag">Fire safety <i class="closetag fa fa-times"></i></div> 
            </div>
            <hr />
            
        </div>
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
 
 function setcommentstatus(cr,re,fr,status){
  
   
     $.ajax({
				type: "get",
				cache:false,
				dataType: "json",
				url: '{{ route('forum.likecomment') }}',
				data: { commentreply: cr, reply: re, forum: fr, status:status },
				success: function( response ) {
				 //var obj = jQuery.parseJSON( response);
                   //alert(obj.status);
			   
			  $("#likecount").html(response["likes"]);
			  $("#dislikecount").html(response["dislikes"]);
				}  
        });
 }
 

</script> 
  @include('partials.footer')
@stop