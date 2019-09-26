@extends('layouts.app')


@section('content')

<style type="text/css">
	.empids .commoncom{clear: both;padding: 4px;margin: 4px;}
    .empids .empbox{float: left;padding: 4px;border: 1px solid #cccccc;margin: 4px;}
    .empids .empbox i{color:red; font-size:20px;}
</style>

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

   <div class="repository-create-edit">
    
    {!! Form::model($task, ['method' => 'PUT', 'route' => ['repository.update', $task->id]]) !!}
        {!! Form::hidden('attachment_delete',old('attachment_delete'),['id'=>'attachment_delete']) !!}
    <div class="panel panel-default panelmar respositroy-view">
        <div class="panel-heading">
            Repository > <a href="/repository-types">All Folders</a>  
			<?php if($sid > 0) { ?> 
            	> <a href="/repositorycat_types/<?php echo $cid;?>">
				<?php echo $cat_name;  ?> 
                </a> > 
				<?php echo $scat_name;
			}  else { ?> > <?php echo $cat_name; } ?> 
           <p class="ptag">
             <?php if($sid > 0) { ?>  
             	<a href="/repositorycat_types/<?php echo $cid;?>" class="btn btn-back-list">Back</a> 
			 <?php } else { ?>
             <a href="/repository-types" class="btn btn-back-list">Back</a> 
             <?php } ?> 
           </p>
        </div>    

        <div class="panel-body onchagemge">
			 <div class="row  class-ctration">
            <div class="row checkbox-fields fiellssss" style="margin:0px;">
                <div class="col-xs-12 form-group site-nameshill">
                    <label>Sites</label>  
                   <ul>
                     @if (count($sites_names) > 0)  
                      <?php  
					     
						  $community_arr = explode(",",$task->site); 
						?> 
						<span class="select_all"><input type="checkbox" id="all_select"> <label> All</label></span>
                        @foreach ($sites_names as $site)
						 <?php $res = ""; if(in_array($site->id, $community_arr)) $res = $site->id; ?>
					  <li><span class="boxcheck">{{ Form::checkbox('community[]', $site->id,$res,array('class'=>'use_select')) }}</span><span>{{ $site->name }}</span> </li> 
                           @endforeach 
                        </ul>  
                    @endif      
                   
                    <p class="help-block"></p>
                    @if($errors->has('community'))
                        <p class="help-block">
                            {{ $errors->first('community') }}
                        </p>
                    @endif
                </div> 
            </div>
            </div>
            
            <?php /*?><div class="row repository-category-subcategory">
                <div class="col-xs-3 form-group respostory-view"> 
                    {!! Form::label('site', 'Category', ['class' => 'control-label']) !!}
                    {!! Form::select('category', $category, old('category'), ['class' => 'form-control select2mes', 'id' => 'itemcategory']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('itemcategory'))
                        <p class="help-block">
                            {{ $errors->first('itemcategory') }}
                        </p>
                    @endif
                </div>   
				
                <div class="col-xs-3 form-group respostory-view"> 
                    {!! Form::label('site', 'Sub Category', ['class' => 'control-label']) !!}
                    {!! Form::select('itemsubcategory', $subcategory, old('itemsubcategory'), ['class' => 'form-control select2mes', 'id' => 'itemsubcategory']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('itemcategory'))
                        <p class="help-block">
                            {{ $errors->first('itemcategory') }}
                        </p>
                    @endif
                </div>   
				</div><?php */?>   
            <div class="row">
                 <div class="col-sm-3 form-group respostory-view">
                    {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
                    <input type="hidden" name="category" value="<?php echo $cid; ?>" />
                    <input type="hidden" name="itemsubcategory" value="<?php echo $sid; ?>" />
                    {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>
             </div>  
            
            <div class="row class-ctration">
                <div class="col-sm-12 form-group repositoriy-atteacment">
                    {!! Form::label('', 'Attachments', ['class' => 'control-label']) !!}
                    <div id="fileUploader_<?php echo $task->id?>">Attachments</div>
                    <div class="statusUploader" id="statusUploader_<?php echo $task->id?>"></div>
                    <div class="statusFailed" id="statusFailed_<?php echo $task->id?>"></div>
                    <div class="attachment_files for-anchortag">
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
    fu_inputs['multiple']=false;
    fu_inputs['ufilename']='task_file';
</script>  

			
<script>
$(document).ready(function() {
	$( "#all_select" ).change(function() {
		if($(this).prop('checked')==true) {
		$(".use_select").prop('checked', true);
		} else {
		$(".use_select").prop('checked', false);
		}	
	});
	$( ".use_select" ).change(function() {
		if($( ".use_select:checked" ).length == $( ".use_select" ).length) $("#all_select").prop('checked', true);
		else $("#all_select").prop('checked', false);	
	});
	
	
	
}); 

</script>  
  @include('partials.footer')
@stop

