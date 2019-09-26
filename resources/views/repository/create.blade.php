@extends('layouts.app')


@section('content')

<style type="text/css">
	.empids .commoncom{clear: both;padding: 4px;margin: 4px;}
    .empids .empbox{float: left;padding: 4px;border: 1px solid #cccccc;margin: 4px;}
    .empids .empbox i{color:red; font-size:20px;}
</style>

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  <div class="repository-create-edit">
    {!! Form::open(['method' => 'POST', 'route' => ['repository.store']]) !!}

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
			<div class="row commybitye class-ctration">
           

                <div class="row checkbox-fields fljslala">
                <div class="col-xs-12 form-group fomelations">
                      <label>Sites</label>  
                     @if (count($sites_names) > 0)  
                      <?php    
						?> 
						<span class="select_all"><input type="checkbox" id="all_select"> <label> All</label></span>
                        <div style="display:block; width:100%; clear:both;">
                        @foreach ($sites_names as $site)
					  <div class="checkbox-cnt checklistsee"><span class="boxcheck">{{ Form::checkbox('site[]', $site->id,'',array('class'=>'use_select')) }}</span><span>{{ $site->name }}</span></div>
                           @endforeach 
                      </div>
                          
                    @endif   
                   
                    <p class="help-block"></p>
                    @if($errors->has('site'))
                        <p class="help-block">
                            {{ $errors->first('site') }}
                        </p>
                    @endif
                </div> 
            </div> 
                
            </div>
            <?php /*?><div class="row repository-category-subcategory">
                <div class="col-xs-3 form-group respostory-view"> 
                    {!! Form::label('site', 'Category', ['class' => 'control-label']) !!}
                    {!! Form::select('category', $category, '', ['class' => 'form-control select2mes', 'id' => 'itemcategory' ,'onchange'=>'getsubRCatRecords(this.value)']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('itemcategory'))
                        <p class="help-block">
                            {{ $errors->first('itemcategory') }}
                        </p>
                    @endif
                </div>   
			
                <div class="col-xs-3 form-group respostory-view" id="subcatdiv"> 
                    {!! Form::label('site', 'Sub Category', ['class' => 'control-label']) !!}
                    <select class="form-control"></select>
                </div>   
			</div><?php */?>
            <div class="row commybitye1">
                 <div class="col-sm-3 form-group">
                 	<input type="hidden" name="category" value="<?php echo $cid; ?>" />
                    <input type="hidden" name="itemsubcategory" value="<?php echo $sid; ?>" />
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
              

            <div class="row class-ctration">
                <div class="col-sm-12 form-group arrowma-catteach">
                    {!! Form::label('', 'Attachments', ['class' => 'control-label']) !!}
                    <div id="fileUploader_0" class="acrome-acro">Attachments</div>
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
function getsubRCatRecords(dis) {
	  
    var category_id = dis;    
    //Get list
    $.ajax({
        type: "POST",
        cache: false,
        url: "/repository/sucategories",
        data: 'category_id='+category_id
    })
    .done(function( resp ) {           
        $("#subcatdiv").html(resp);
    })
    .fail(function() {
        alert( "Unable to process, please try again" );
    });
}

</script>
 @include('partials.footer')

@stop

