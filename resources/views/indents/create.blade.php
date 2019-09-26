@extends('layouts.app')


@section('content')

<style type="text/css">
	.empids .commoncom{clear: both;padding: 4px;margin: 4px;}
    .empids .empbox{float: left;padding: 4px;border: 1px solid #cccccc;margin: 4px;}
    .empids .empbox i{color:red; font-size:20px;}
	.footer-main
	{
	 margin-left:-5px;
	}
</style>

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
 <link media="all" type="text/css" rel="stylesheet" href="{{ url('scripts/third/summernote') }}/summernote.css">

   <!-- <h3 class="page-title">Tasks</h3>-->
    {!! Form::open(['method' => 'POST', 'route' => ['indents.store']]) !!}

    <div class="panel panel-default panelmar tsas-crseations">
        <div class="panel-heading">
            Indents 
            <p class="ptag">
                <a href="{{ route('indents.index') }}" class="btn btn-back-list">Back</a> 
            </p> 
        </div>
        
        <div class="panel-body">

            <div class="row class-ctration category-title-priority">
			
			 <div class="col-sm-2 form-group employee-toiele">
                    {!! Form::label('item_code', 'Community', ['class' => 'control-label']) !!}
                    {!! Form::select('site', $sites, old('site'), ['class' => 'form-control', 'id' => 'select_id11']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('item_code'))
                        <p class="help-block">
                            {{ $errors->first('item_code') }}
                        </p>
                    @endif   
                </div>
               
				
                 <div class="col-sm-3 form-group employee-toiele">
                    {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div> 
				
				  
				
				<div class="col-sm-2 form-group employee-toiele">
                    {!! Form::label('priority', 'Priority', ['class' => 'control-label']) !!}
                    <select name="priority" class="form-control">
						 <option value="Low">Low</option>
						 <option value="Medium">Medium</option>
						 <option value="High">High</option>
					</select>
                    <p class="help-block"></p>
                    @if($errors->has('priority'))
                        <p class="help-block">
                            {{ $errors->first('priority') }}
                        </p>
                    @endif
                </div>  
                </div>
                
                <div class="row fck-noteditor">
                   <div class="col-sm-12 form-group">
                    {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
                   <!-- {!! Form::text('description', old('description'), ['class' => 'form-control', 'placeholder' => '']) !!}-->
                     <textarea class="form-control summernote-small" placeholder="Enter Description" name="description" cols="50" rows="10" id="description">
                    </textarea>
                    <p class="help-block"></p>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>
                </div>
                
                 <?php  $itemct=0; ?>
                 <input type="hidden" id="itemct" value="<?php echo ++$itemct; ?>">
                
                
               
                 
             <div class="overall-indent-reportadding class-ctration">     
                  
                <div class="row class-ctration adding-headingindent">
                    <h4 class="sub-itemsheadings">Items</h4>
                	<div class="col-sm-2 category-id">
                        {!! Form::label('category_id', 'Category', ['class' => 'control-label']) !!} 
                    </div>
                    <div class="col-sm-2 sub-category-id">
                        {!! Form::label('sub_category_id', 'Sub Category', ['class' => 'control-label']) !!} 
                    </div>
                    <div class="col-sm-1 asset-category-itemcode">
                       {!! Form::label('item_code', 'Item Code', ['class' => 'control-label']) !!}
                    </div>
                </div>  
                  
                  
                <div class="row class-ctration adding-sectionindent">
                  <div class="col-sm-2 form-group breakdown-categoryund">
                   
                    {!! Form::select('category_id[]', $categories, old('category_id'), ['class' => 'form-control erequired','onchange'=>'getindentsubCatRecords(this.value)']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('category_id'))
                        <p class="help-block">
                            {{ $errors->first('category_id') }}
                        </p>
                    @endif
                </div>
                
                <div class="col-sm-2 form-group breakdown-categoryund" id="subcatdiv">
                   
                    {!! Form::select('sub_category_id[]', $subcategories, old('sub_category_id'), ['class' => 'form-control erequired','onchange'=>'getItembysubcat(this.value)']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('sub_category_id'))
                        <p class="help-block">
                            {{ $errors->first('sub_category_id') }}
                        </p>
                    @endif
                </div> 
			 
			     <div class="col-sm-1 form-group breakdown-categoryund" id="itemsdiv">
                    
                    {!! Form::text('item_code[]', old('item_code'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('item_code'))
                        <p class="help-block">
                            {{ $errors->first('item_code') }}
                        </p>
                    @endif   
                </div>
                
               
                <div class="col-sm-1">
                <a href="#" onclick="addonemoreitem(); return false;" class=" " style="font-weight:bold; font-size:21px; color:#0b1cff; text-decoration:none; text-align:center;display:inline-block;width:auto;">+</a>
                 </div>
                </div> 
                   <div id="divTxtItemcat" class="row"></div>
                </div>
            </div>

            
            
      
    
   
    {!! Form::submit('Submit', ['class' => 'btn btn-danger btn-save']) !!}
    {!! Form::close() !!}
     </div>
    </div>  
<script type="text/javascript">
    fu_inputs = {};
    fu_inputs['refid']=0;
    fu_inputs['multiple']=true;
    fu_inputs['ufilename']='task_file';
	$( document ).ready(function() {	
	$('#description').summernote({

              height:300,
 
            });
			 });
	
	</script>
    <script type="text/javascript">
	 function addonemoreitem() {
		var id = document.getElementById("itemct").value;
		
             var vid = parseInt(id) + 1;
		
		$("#divTxtItemcat").append("<div class='row pumnphysro masterocard adding-sectionindent' id='row" + id + "'> <div class='col-sm-2 form-group breakdown-categoryund'><select name='category_id[]' id='maincat_"+ id +"' onchange='getsubincatRecords(this.value, "+ id+")' class='form-control'><?php foreach($categories as $key => $cat) { ?> <option value='<?php echo $key; ?>'><?php echo $cat; ?></option> <?php } ?></select></div><div class='col-sm-2 form-group breakdown-categoryund' id='subcat_"+ id +"'><select name='sub_category_id[]'  onchange='getinitemRecords(this.value, "+ id+")' class='form-control'></select></div><div class='col-sm-1 form-group employee-toiele' id='itemcat_"+ id +"'><select name='item_code[]' class='form-control'></select></div><div class='col-sm-1'><a href='#' onClick='removeliftsFormField(\"#row" + id + "\"); return false;' class='remove removerla'>X</a></div></div>" );
		
		id = parseInt(id) + 1;

		console.log('id: ', id);

		document.getElementById("itemct").value = id;	

	}
	
	
	
	
	function removeliftsFormField(id) {

		$(id).remove(); 

		var id = document.getElementById("itemct").value;

		id = (id - 1);

		document.getElementById("itemct").value = id;


	}
	
		</script>
  
 @include('partials.footer')

@stop

