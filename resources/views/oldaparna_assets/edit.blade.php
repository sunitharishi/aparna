@extends('layouts.app')

@section('content')
    <!--<h3 class="page-title">Community Assets</h3>-->
    {!! Form::open(['method' => 'PUT', 'files' => true, 'route' => ['aparnaassets.update',$comm_asset->id],'id'=>'frmcommAsset']) !!}
   <div class="complicate-community-assets">
    <div class="panel panel-default smoonity-asstess community-assets-edit">
        <p class="help-block" id="frmerror"></p>
        <div class="panel-heading">
            Aparna Asset
            <p class="ptag">
               <a href="{{ route('aparnaassets.index') }}" class="btn aturl green-back">Back</a>
            </p>
        </div>
        
        <div class="panel-body communities-assets-edit">
            <div class="row">
                <div class="col-sm-2 form-group">
                    {!! Form::label('community', 'Community', ['class' => 'control-label']) !!}<br>
                    {{ $sitename }}
                </div>
                <div class="col-sm-2 form-group">
                    {!! Form::label('category', 'Category', ['class' => 'control-label']) !!}<br>
                    {{ $catgname }}
                </div>
                <div class="col-sm-2 form-group">
                    {!! Form::label('code', 'Code*', ['class' => 'control-label']) !!}
                    {!! Form::text('code', $comm_asset->code, ['class' => 'form-control erequired', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                </div>
                <div class="col-sm-3 form-group">
                    {!! Form::label('name', 'Name*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', $comm_asset->name, ['class' => 'form-control erequired', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                </div>
            </div>       
        </div>
    </div>
    
    
    <div class="panel panel-default">
        <div class="panel-body second-half">
             <div class="row">
                <div class="col-sm-2 form-group hide">
                    {!! Form::label('location', 'Location', ['class' => 'control-label']) !!}
                    {!! Form::text('location', $comm_asset->location, ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('location'))
                        <p class="help-block">
                            {{ $errors->first('location') }}
                        </p>
                    @endif
                </div>   
                <div class="col-sm-2 form-group">
                    {!! Form::label('amc_interval', 'PM Frequency*', ['class' => 'control-label']) !!}
                    {!! Form::select('amc_interval', $amc_intervals, $comm_asset->amc_interval, ['class' => 'form-control erequired']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('amc_interval'))
                        <p class="help-block">
                            {{ $errors->first('amc_interval') }}
                        </p>
                    @endif
                </div>
				<div class="col-sm-2 form-group">
                    {!! Form::label('amc_type', 'Type*', ['class' => 'control-label']) !!}
                    {!! Form::select('amc_type', $amc_type, $comm_asset->amc_type, ['class' => 'form-control erequired', 'onchange' => 'gettimeblock(this.value)']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('amc_type'))
                        <p class="help-block">
                            {{ $errors->first('amc_type') }}
                        </p>
                    @endif
                </div> 
				<div id="amcblock">
                    <div class="col-sm-2 form-group">
                        {!! Form::label('amc_startdate', 'AMC Start Date', ['class' => 'control-label']) !!}
                        {!! Form::text('amc_startdate', ((int)$comm_asset->amc_startdate?date("d-m-Y",strtotime($comm_asset->amc_startdate)):''), ['class' => 'form-control datepick', 'placeholder' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('amc_startdate'))
                            <p class="help-block">
                                {{ $errors->first('amc_startdate') }}
                            </p>
                        @endif
                    </div> 
                   <div class="col-sm-2 form-group">
                    {!! Form::label('amc_startdate', 'AMC End Date', ['class' => 'control-label']) !!}
                    {!! Form::text('amc_enddate', ((int)$comm_asset->amc_enddate?date("d-m-Y",strtotime($comm_asset->amc_enddate)):''), ['class' => 'form-control datepick', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('amc_enddate'))
                        <p class="help-block">
                            {{ $errors->first('amc_enddate') }}
                        </p>
                    @endif
                	</div>
				</div> 
                <div id="warantyblock">
                    <div class="col-sm-2 form-group">
                        {!! Form::label('waranty_startdate', 'Waranty Start Date', ['class' => 'control-label']) !!}
                        {!! Form::text('waranty_startdate', ((int)$comm_asset->waranty_startdate?date("d-m-Y",strtotime($comm_asset->waranty_startdate)):''), ['class' => 'form-control datepick', 'placeholder' => '']) !!}
                        <p class="help-block"></p>
                        @if($errors->has('waranty_startdate'))
                            <p class="help-block">
                                {{ $errors->first('waranty_startdate') }}
                            </p>
                        @endif
                    </div> 
                   <div class="col-sm-2 form-group">
                    {!! Form::label('waranty_enddate', 'Waranty End Date', ['class' => 'control-label']) !!}
                    {!! Form::text('waranty_enddate', ((int)$comm_asset->waranty_enddate?date("d-m-Y",strtotime($comm_asset->waranty_enddate)):''), ['class' => 'form-control datepick', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('waranty_enddate'))
                        <p class="help-block">
                            {{ $errors->first('waranty_enddate') }}
                        </p>
                    @endif
                	</div>
				</div> 
				<div id="ppmblock">
				  <div class="col-sm-2 form-group">
                    {!! Form::label('ppm_startdate', 'PPM Date', ['class' => 'control-label']) !!}
                    {!! Form::text('ppm_startdate', ((int)$comm_asset->ppm_startdate?date("d-m-Y",strtotime($comm_asset->ppm_startdate)):''), ['class' => 'form-control datepick', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('ppm_startdate'))
                        <p class="help-block">
                            {{ $errors->first('ppm_startdate') }}
                        </p>
                    @endif
                </div> 
				</div>
                <div class="col-sm-2 form-group vendoreselectionlist">
                    {!! Form::label('vendor', 'Vendor', ['class' => 'control-label']) !!}
                    {!! Form::select('vendor', $vendors, old('vendor')?old('vendor'):(isset($comm_asset)?$comm_asset->vendor:''), ['class' => 'form-control select2mes erequired']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('vendor'))
                        <p class="help-block">
                            {{ $errors->first('vendor') }}
                        </p>
                    @endif
                </div>
               <!-- <div class="col-sm-2 form-group">
                    {!! Form::label('sop', 'SOP', ['class' => 'control-label']) !!}
                    {!! Form::text('sop', $comm_asset->sop, ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('sop'))
                        <p class="help-block">
                            {{ $errors->first('sop') }}
                        </p>
                    @endif
                </div>-->  
                
               <div class="col-sm-2 form-group">
                
                    {!! Form::label('sop', 'SOP', ['class' => 'control-label']) !!} <?php if(isset($comm_asset)) { if($comm_asset->sop) {?> <a href="/uploads/communityassets/<?php echo  $comm_asset->sop; ?>" target="_blank">View</a> <?php } } ?>
                    <input type="file" class="form-control" name="sop">   
                
               </div>

              <!--  <div class="col-sm-2 form-group">
                    {!! Form::label('name_plate', 'Name Plate', ['class' => 'control-label']) !!}
                    {!! Form::text('name_plate', $comm_asset->name_plate, ['class' => 'form-control', 'placeholder' => '']) !!}                    
                    <p class="help-block"></p>
                    @if($errors->has('name_plate'))
                        <p class="help-block">
                            {{ $errors->first('name_plate') }}
                        </p>
                    @endif
                </div>
                -->
               <div class="col-sm-2 form-group">
               
                    {!! Form::label('sop', 'Name Plate', ['class' => 'control-label']) !!} <?php if(isset($comm_asset)) { if($comm_asset->name_plate) { ?> <a href="/uploads/communityassets/<?php echo  $comm_asset->name_plate; ?>" target="_blank">View</a> <?php }} ?>
                    <input type="file" class="form-control" name="name_plate">  
               
               </div>
               <!-- <div class="col-sm-2 form-group">
                    {!! Form::label('service_report', 'Service Report', ['class' => 'control-label']) !!}
                    {!! Form::text('service_report', $comm_asset->service_report, ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('service_report'))
                        <p class="help-block">
                            {{ $errors->first('sop') }}
                        </p>
                    @endif
                </div>-->
                <div class="col-sm-2 form-group">
               
                    {!! Form::label('sop', 'Service Report', ['class' => 'control-label']) !!}<?php if(isset($comm_asset)) { if($comm_asset->service_report) { ?> <a href="/uploads/communityassets/<?php echo  $comm_asset->service_report; ?>" target="_blank">View</a> <?php } } ?>
                    <input type="file" class="form-control" name="service_report">  
               
               </div>
                <div class="col-sm-2 form-group">
                    {!! Form::label('asset_image', 'Asset Image', ['class' => 'control-label']) !!}
                    {!! Form::file('asset_image', ['class' => 'form-control']) !!}
                    @if($comm_asset->asset_image)                    
                    <a href="/uploads/template/{{ $comm_asset->asset_image }}" target="_blank"><img src="/uploads/template/{{ $comm_asset->asset_image }}" width="100px" /></a>
                    @endif
                    <p class="help-block"></p>
                    @if($errors->has('asset_image'))
                        <p class="help-block">
                            {{ $errors->first('asset_image') }}
                        </p>
                    @endif
                </div>
              </div>
            </div>
            
            
        </div>
    @include('community_assets.template')

    <span class="loader"></span>
    <div class="btn-save"> {!! Form::submit('Submit', ['class' => 'btn btn-danger btn-submitt']) !!}
   
    {!! Form::close() !!}
    </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
$( document ).ready(function() {
	<?php 
		if($comm_asset->amc_type=='waranty') { ?> 
		$("#amcblock").hide(); 
		$("#warantyblock").show();
	<?php } else { ?>
		$("#warantyblock").hide(); 
		$("#amcblock").show();
	<?php } ?>
 });
 
 function gettimeblock(dis){
    //alert(dis);
	if(dis == 'amc'){
	  $("#amcblock").show();
	  $("#warantyblock").hide();
	}else if(dis == 'waranty'){
	 $("#amcblock").hide();
	  $("#warantyblock").show();
	}
 }
 
 </script>

@include('partials.footer')

@stop

