@extends('layouts.app')


@section('content')

<style type="text/css">
	.empids .commoncom{clear: both;padding: 4px;margin: 4px;}
    .empids .empbox{float: left;padding: 4px;border: 1px solid #cccccc;margin: 4px;}
    .empids .empbox i{color:red; font-size:20px;}
</style>

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <!--<h3 class="page-title">Tasks</h3>-->
     <div class="panel panel-default panelmar tsas-crseations">
    <div class="meetups-createedit">
    {!! Form::model($task, ['method' => 'PUT', 'route' => ['tasks.update', $task->id]]) !!}
        {!! Form::hidden('attachment_delete',old('attachment_delete'),['id'=>'attachment_delete']) !!}
   
        <div class="panel-heading">
           MOM
           <p class="ptag">
              <a href="{{ route('meetups.index') }}" class="btn btn-back-list backto-to-list">Back</a>  
           </p>
        </div>    

        <div class="panel-body">
			 
            <div class="row class-ctration">
                <div class="col-sm-2 form-group edit-emplaoiyee">
                    {!! Form::label('category', 'Category', ['class' => 'control-label']) !!}
                    {!! Form::select('category', $categories, old('category'), ['class' => 'form-control select2mes']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('category'))
                        <p class="help-block">
                            {{ $errors->first('category') }}
                        </p>
                    @endif
                </div>

                <div class="col-sm-2 form-group edit-employee-communities">
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
                <div class="col-sm-2 form-group empgroup maggie-mioosenls">
                    {!! Form::label('emp', 'Responsibility', ['class' => 'control-label']) !!}
                    {!! Form::select('emp', $empList, '', ['class' => 'form-control select2mes','id'=>'emp_id','onchange'=>'select_site_emp(this)']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('site'))
                        <p class="help-block">
                            {{ $errors->first('site') }}
                        </p>
                    @endif
                </div>
               <!-- {!! Form::label('', 'Task Assigners', ['class' => 'control-label']) !!}-->
                <div class="col-sm-10 form-group empids seashore-beauty">
                    @if (old('empid'))
                        <?php $site_id = 0; ?> 
                        @foreach(old('empid') as $ui=>$tuval)
                         <?php if($site_id != old('siteidval')[$ui]) {  ?> <div  class="site_{{ old('siteidval')[$ui] }} commoncom"><div><b>{{ old('sitenameval')[$ui] }}:</b></div> <?php } ?>
                        <div class="empbox empid{{ $tuval }}">
                            <a onclick="task_emp_delete(this)"><i class="fa fa-close"></i></a> {{ old('empname')[$ui] }}
                            {!! Form::hidden('empid[]',$tuval) !!}
                            {!! Form::hidden('siteidval[]',old('siteidval')[$ui]) !!}   
                             {!! Form::hidden('sitenameval[]',old('sitenameval')[$ui]) !!}  
                            {!! Form::hidden('empname[]',old('empname')[$ui]) !!}
                        </div> 
                        <?php if($site_id != old('siteidval')[$ui]) {  ?></div> <?php $site_id = old('siteidval')[$ui]; } ?>
                        @endforeach
                    @else 
                        @if ($taskusers) 
                        <?php $sitet_id = 0; ?> 
                            @foreach($taskusers as $tuval)
                             <?php if($sitet_id != $tuval->siteid) {  ?> <div  class="site_<?php echo $tuval->siteid; ?> commoncom"><div><b><?php echo $tuval->sitename; ?>:</b></div> <?php } ?>
                            <div class="empbox empid{{ $tuval->user_id }}">
                                <a onclick="task_emp_delete(this)"><i class="fa fa-close"></i></a> {{ $tuval->username }}
                                {!! Form::hidden('empid[]',$tuval->user_id) !!}     
                                {!! Form::hidden('siteidval[]',$tuval->siteid) !!}   
                                {!! Form::hidden('sitenameval[]',$tuval->sitename) !!}                        
                                {!! Form::hidden('empname[]',$tuval->sitename.':'.$tuval->username) !!}
                            </div> 
                              <?php if($sitet_id != $tuval->siteid) {  ?> <?php $sitet_id = $tuval->siteid; } ?>
                            @endforeach
                        @endif
                    @endif
                   </div>
                </div>
            </div>

            <div class="row class-ctration row-title">
            
              
            
                 <div class="col-sm-3 edit-ontrol-titla">
                    {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>
                
                
              

                <div class="col-sm-1 form-group edit-cold-code">
                    {!! Form::label('tcode', 'Code', ['class' => 'control-label']) !!}
                    {!! Form::text('tcode', old('tcode'), ['class' => 'form-control', 'placeholder' => '','readonly']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('tcode'))
                        <p class="help-block">
                            {{ $errors->first('tcode') }}
                        </p>
                    @endif 
                </div> 

                <div class="col-sm-1 form-group edit-protiory">
                    {!! Form::label('priority', 'Priority', ['class' => 'control-label']) !!}
                    {!! Form::select('priority', $priorities, old('priority'), ['class' => 'form-control']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('priority'))
                        <p class="help-block">
                            {{ $errors->first('priority') }}
                        </p>
                    @endif
                </div>

                <div class="col-sm-2 form-group esdit-staas">
                    {!! Form::label('status', 'Status', ['class' => 'control-label']) !!}
                    {!! Form::select('status', $statuses, old('status'), ['class' => 'form-control']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('status'))
                        <p class="help-block">
                            {{ $errors->first('status') }}
                        </p>
                    @endif
                </div>
                
                 <div class="col-sm-2 description-toiele">
               		<label class="control-label">Dead Line</label>
                    <input type="text" class="form-control"  />
               </div>

            </div>
         
         
             <div class="row">
                <div class="col-sm-12 form-group catrogory-slectioh-descriotp">
                   <label>Action Required</label>
                  <textarea class="form-control summer-note"></textarea>
                   
                </div>
            </div>
         
         
			<div class="row">
                <div class="col-sm-12 form-group fontr-descrioptionm">
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
                <div class="col-sm-12 form-group primary-ateexhedd">
                    {!! Form::label('', 'Attachments', ['class' => 'control-label']) !!}
                    <div id="fileUploader_<?php echo $task->id?>" class="secondary-ateedhees">Attachments</div>
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
    

    {!! Form::submit('Update', ['class' => 'btn btn-danger btn-save']) !!}
    {!! Form::close() !!}
    </div>
    </div>
<script type="text/javascript">
    fu_inputs = {};
    fu_inputs['refid']=<?php echo $task->id?>;
    fu_inputs['multiple']=true;
    fu_inputs['ufilename']='task_file';
</script>    
  @include('partials.footer')
@stop

