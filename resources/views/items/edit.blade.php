@extends('layouts.app')

@section('content')
  <!--  <h3 class="page-title">Vendors</h3>-->
    
    {!! Form::model($vendors, ['files' => 'true','method' => 'PUT', 'route' => ['items.update', $vendors->id]]) !!}

    <div class="panel panel-default respositroy-view irresponibleees">
        <div class="panel-heading sub-menyheading">
            Items
              <p class="ptag back-button">
            <a href="{{ route('items.index') }}" class="btn btn-back-list">Back</a>
            </p>
        </div>

        <div class="panel-body items-creations items-edit class-ctration arrangememt">
		 <div class="row">
                <div class="col-xs-12 form-group vensor-assets specsific-eselction" id="assetdiv"> 
                    {!! Form::label('site', 'Category', ['class' => 'control-label']) !!}
                    {!! Form::select('itemcategory', $category, old('itemcategory'), ['class' => 'form-control select2mes', 'id' => 'itemcategory','onchange'=>'getsubCatRecords(this.value)']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('itemcategory'))
                        <p class="help-block">
                            {{ $errors->first('itemcategory') }}
                        </p>
                    @endif
                </div>   
		    </div>
            
             
		   <div class="row">
				<div class="col-xs-12 form-group vensor-assets" id="subcatdiv"> 
                    {!! Form::label('site', 'Sub Category', ['class' => 'control-label']) !!}
					 {!! Form::select('itemsubcategory', $subcategory, old('itemsubcategory'), ['class' => 'form-control select2mes', 'id' => 'itemsubcategory']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('itemsubcategory'))
                        <p class="help-block">
                            {{ $errors->first('itemsubcategory') }}
                        </p>
                    @endif
                </div>
				 
            </div>
            
            <div class="row">  
                <div class="col-xs-12 form-group">
                    {!! Form::label('ItemCode', 'Item Code', ['class' => 'control-label']) !!}
                    {!! Form::text('itemcode', old('itemcode'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('itemcode'))
                        <p class="help-block">
                            {{ $errors->first('itemcode') }}
                        </p>
                    @endif
                </div> 
            </div>
			
		    <div class="row">  
                <div class="col-xs-12 form-group">
                    {!! Form::label('ItemName', 'Item Name', ['class' => 'control-label']) !!}
                    {!! Form::text('itemname', old('itemname'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('itemname'))
                        <p class="help-block">
                            {{ $errors->first('itemname') }}
                        </p>
                    @endif
                </div> 
            </div>  
			
            
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('title', 'UOM', ['class' => 'control-label']) !!}
                    <select name="uom" class="form-control">
                    	<option value="">Please Select</option>
                        <option value="Kilo Grams" <?php if($vendors['uom'] == 'Kilo Grams')  echo 'Selected="selected"'; ?>>Kilo Grams</option>
                        <option value="Litre" <?php if($vendors['uom'] == 'Litre')  echo 'Selected="selected"'; ?>>Litre</option>
                    </select>
                </div> 
            </div>
            
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('title', 'Image', ['class' => 'control-label']) !!}
                    <input type="file" class="form-control" name="browse"> <?php if(isset($vendors['browse'])) { ?> <a href="/<?php echo $vendors['browse']; ?>" target="_blank">View</a> <?php } ?>
                </div> 
            </div>
            
		<div class="row description-row">
                <div class="col-xs-12 form-group edit-description">
                    {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
                    {!! Form::text('description', old('description'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div> 
            </div>
			
         
        </div>
   
   <div class="update-button">
    {!! Form::submit('Update', ['class' => 'btn btn-danger btn-save']) !!}
   </div>
   
    </div>
    {!! Form::close() !!}
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
   $( document ).ready(function() {
   var sel ="";
	$("input[name='selectasset']").click(function () {
            if ($("#assetyes").is(":checked")) {
                $("#assetdiv").show();
				 $("#otherdiv").hide();
				 $("#typeofasset").val('asset');
				 $("#other").val("");
				
            }  if ($("#otherasset").is(":checked")) {
                $("#otherdiv").show();
				$("#assetdiv").hide();
				 $("#typeofasset").val('other');
				  $("#asset").val("");
            } 
        }); 
		
		 }); 
		
</script>
@include('partials.footer')
@stop

