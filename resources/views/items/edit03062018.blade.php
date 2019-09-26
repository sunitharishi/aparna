@extends('layouts.app')

@section('content')
  <!--  <h3 class="page-title">Vendors</h3>-->
    
    {!! Form::model($vendors, ['method' => 'PUT', 'route' => ['items.update', $vendors->id]]) !!}

    <div class="panel panel-default respositroy-view irresponibleees">
        <div class="panel-heading sub-menyheading">
            Items
              <p class="ptag back-button">
            <a href="{{ route('items.index') }}" class="btn btn-back-list">Back</a>
            </p>
        </div> 
		<?php $fly = 'false'; if($vendors['typeofasset'] == 'asset') { $fly = 'true'; }
		      $fln = 'false'; if($vendors['typeofasset'] == 'other') { $fln = 'true'; }
		 ?>
		    <?php $fln = true; 
						 $fly = false;
						if($vendors['typeofasset'] == 'asset') { $fln = false ; $fly =true; }
						
						?>
		

        <div class="panel-body sites-create class-ctration arrangememt">
		<div class="radio-items"> {{ Form::radio('selectasset', 'Yes', $fly, array('id'=>'assetyes')) }}Asset
		{{ Form::radio('selectasset', 'no', $fln, array('id'=>'otherasset')) }}Other</div>
			 <div class="row">
                 <div class="col-xs-12 form-group vensor-assets specsific-eselction1 veiificaiton-cose" id="assetdiv" style="display:<?php if($vendors['typeofasset'] == 'asset') echo 'block'; else echo 'none'; ?>"> 
                    {!! Form::label('site', 'Asset', ['class' => 'control-label']) !!} <br />
                    {!! Form::select('asset', $asset, old('asset'), ['class' => 'form-control select2mes ']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('asset'))
                        <p class="help-block">
                            {{ $errors->first('asset') }}
                        </p>
                    @endif
                </div> 
				
            </div>
			 <input type="hidden" name="typeofasset" value="" id="typeofasset">
			<div class="row"> 
               <div class="col-xs-12 form-group vensor-assets" id="otherdiv" style="display:<?php if($vendors['typeofasset'] == 'other') echo 'block'; else echo 'none'; ?>"> 
                     {!! Form::label('site', 'Other', ['class' => 'control-label']) !!}
					{!! Form::text('other', old('other'), ['class' => 'form-control', 'placeholder' => '', 'id' => 'other']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('other'))
                        <p class="help-block">
                            {{ $errors->first('other') }}
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
            
              <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('title', 'Type', ['class' => 'control-label']) !!}
                    <select name="type" class="form-control">
                    	<option value=""></option>
                        <option value="Kilo Grams">Kilo Grams</option>
                        <option value="Litre">Litre</option>
                    </select>
                </div> 
            </div>  
            
             <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('title', 'Image', ['class' => 'control-label']) !!}
                    <input type="file" class="form-control">  
                </div> 
            </div>    
			 
			<div class="row">
                <div class="col-xs-12 form-group">
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
    </div>
   <div class="update-button">
    {!! Form::submit('Update', ['class' => 'btn btn-danger btn-save']) !!}</div>
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

