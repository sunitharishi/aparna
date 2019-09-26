@extends('layouts.app')

@section('content')
    <!--<h3 class="page-title">Community Assets</h3>-->
    {!! Form::open(['method' => 'POST', 'route' => ['commbreakdown.save'],'id'=>'frmBreakdown']) !!}
    {!! Form::hidden('taction', 'save') !!}
    {!! Form::hidden('id', isset($breakdown)?$breakdown->id:'') !!}
    {!! Form::hidden('attachment_delete',old('attachment_delete'),['id'=>'attachment_delete']) !!}
    <div class="panel panel-default smoonity-asstess break-down">
        <p class="help-block" id="frmerror"></p>
        <div class="panel-heading">
            Breakdown {{ (isset($breakdown)?'Edit':'New') }}
            <p class="ptag">
               <a href="/commassets/<?php echo $casset->id; ?>" class="btn green-back">Back</a>
            </p>
        </div> 
        
        <div class="panel-body breakdown-car">
            <div class="row class-ctration">
                @if(isset($breakdown))
                <div class="col-sm-3 form-group breakdown-title">
                    {!! Form::label('refid', 'ID', ['class' => 'control-label']) !!}
                    {!! Form::text('refid', $breakdown->refid, ['class' => 'form-control', 'placeholder' => '','readonly'=>'readonly']) !!}
                    <p class="help-block"></p>
                </div>
                @endif
                <?php 
                    $jctype12 = old('asset_id')?old('asset_id'):(isset($breakdown)?$breakdown->asset_id:'');
                ?>
				 {!! Form::hidden('site_id', $casset->site_id) !!}
          <!--      @if($userid==1)
                <div class="col-sm-2 form-group community-breaksoen">
				
                    {!! Form::label('site_id', 'Community', ['class' => 'control-label']) !!}
                    {!! Form::select('site_id', $communities, old('site_id')?old('site_id'):(isset($breakdown)?$breakdown->site_id:''), ['class' => 'form-control select2mes erequired','onchange'=>'getTopicsCommunityAssets()']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('site_id'))
                        <p class="help-block">
                            {{ $errors->first('site_id') }}
                        </p>
                    @endif
                </div>
                @else 
                {!! Form::hidden('site_id',$site_id,['id'=>'site_id']) !!}
                @endif
                <div class="col-sm-2 form-group breakdown-categoryund">
                    {!! Form::label('category_id', 'Category', ['class' => 'control-label']) !!} <br />
                    {!! Form::select('category_id', $categories, old('category_id')?old('category_id'):(isset($comasset)?$comasset->category_id:''), ['class' => 'form-control select2mes erequired','onchange'=>'getTopicsCommunityAssets()']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('category_id'))
                        <p class="help-block">
                            {{ $errors->first('category_id') }}
                        </p>
                    @endif
                </div>-->
			
				 {!! Form::hidden('asset_id', $casset->id) !!}
				 {!! Form::hidden('category_id', $casset->category_id) !!}
				 
                <!--<div class="col-sm-3 form-group community-assoeknf" id="topics_assets">
                    {!! Form::label('asset_id', 'Asset', ['class' => 'control-label']) !!}
                    <br>
                    <select name="asset_id" id="asset_id" class="form-control select2mes" onchange="getAssetEmployees(this)">
                       <option>Please select asset</option>
                     //  @if($comm_assets)
                       @foreach($comm_assets as $casset)
                       <option value="{{ $casset->id }}" @if($jctype12==$casset->id) selected="selected" @endif >{{ $casset->code }}-{{ $casset->name }}</option>
                     //  @endforeach
                       @endif 
                    </select>
                    <p class="help-block"></p>
                    @if($errors->has('asset_id'))
                        <p class="help-block">
                            {{ $errors->first('asset_id') }}
                        </p>
                    @endif
                </div>-->
                
            </div>
            <div class="row">
            	<div class="col-sm-2 form-group breakdown-title">
                    {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
                    {!! Form::text('title', old('title')?old('title'):(isset($breakdown)?$breakdown->title:''), ['class' => 'form-control erequired', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                </div>
                <div class="col-sm-2 form-group breakdown-title">
                    {!! Form::label('bdate', 'Date', ['class' => 'control-label']) !!}
                    {!! Form::text('bdate', old('bdate')?old('bdate'):(isset($breakdown)?date("d-m-Y",strtotime($breakdown->bdate)):''), ['class' => 'form-control erequired datepick', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                </div>
                <div class="col-sm-2 form-group breakdown-title">
                    {!! Form::label('bdtime', 'Time', ['class' => 'control-label']) !!}
                    {!! Form::text('bdtime', old('bdtime')?old('bdtime'):(isset($breakdown)?date("H:i",strtotime($breakdown->bdate)):''), ['class' => 'form-control erequired timepick', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                </div>
              </div> 
                <div class="row form-group fckrarr">
                    {!! Form::label('info', 'Description', ['class' => 'control-label']) !!}
                    {!! Form::textarea('info', old('info')?old('info'):(isset($breakdown)?$breakdown->info:''), ['class' => 'form-control summernote', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                </div> 
                
                 <div class="row form-group fckrarr">
                    {!! Form::label('action', 'Action to be taken', ['class' => 'control-label']) !!}
                    {!! Form::textarea('action', old('action')?old('action'):(isset($breakdown)?$breakdown->action:''), ['class' => 'form-control summernote', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                </div> 

                <div class="row class-ctration">
	                <div class="col-sm-12 form-group primary-ateexhedd">
	                    {!! Form::label('', 'Attachments', ['class' => 'control-label']) !!}
	                    <div id="fileUploader_<?php echo (isset($breakdown)?$breakdown->id:0)?>" class="secondary-ateedhees">Attachments</div>
	                    <div class="statusUploader" id="statusUploader_<?php echo (isset($breakdown)?$breakdown->id:0)?>"></div>
	                    <div class="statusFailed" id="statusFailed_<?php echo (isset($breakdown)?$breakdown->id:0)?>"></div>
	                    <div>Type: JPG, GIF, PNG</div>
	                    <div class="attachment_files ulopload-images">
	                        @if (old('ufilepath')) 
	                            @foreach(old('ufilepath') as $ai=>$aval)
	                            <div class="ufileBox">{!! Form::hidden('ufilepath[]', $aval, ['class'=>'ufilepath']) !!}{!! Form::hidden('ufilename[]', old('empname')[$ai], ['class'=>'ufilename']) !!}<a href="/{{ $aval }}" target="_blank">{{ old('ufilename')[$ai] }}</a> <a href="javascript:void(0)" onclick="delete_uploaded_file(this)"><i class="fa fa-close"></i></a></div>
	                            @endforeach

	                            @if (old('afileid')) 
	                                @foreach(old('afileid') as $ai=>$aid)
	                                <div class="ufileBox"><a href="{{ '/uploads/'.old('afiletype')[$ai].'/'.old('afilepath')[$ai] }}" target="_blank">{{ old('afilename')[$ai] }}</a> <a href="javascript:void(0)" onclick="delete_task_attachment(this,{{ $aid }})"><i class="fa fa-close"></i></a>

	                                    {!! Form::hidden('afileid[]', $aid, ['class'=>'ufileid']) !!}
	                                    {!! Form::hidden('afiletype[]', old('afiletype')[$ai], ['class'=>'ufiletype']) !!}
	                                    {!! Form::hidden('afilepath[]', old('afilepath')[$ai], ['class'=>'ufilepath']) !!}
	                                    {!! Form::hidden('afilename[]', old('afilename')[$ai], ['class'=>'ufilename']) !!}
	                                </div>
	                                @endforeach                        
	                            @endif

	                        @else
	                            @if (isset($attachments) && $attachments)                         
	                                @foreach($attachments as $taval)
	                                <div class="ufileBox"><a href="{{ '/uploads/'.$taval->atype.'/'.$taval->file }}" target="_blank">{{ $taval->title }}</a> <a href="javascript:void(0)" onclick="delete_task_attachment(this,{{ $taval->id }})"><i class="fa fa-close"></i></a>
	                                    {!! Form::hidden('afileid[]', $taval->id, ['class'=>'ufileid']) !!}
	                                    {!! Form::hidden('afiletype[]', $taval->atype, ['class'=>'ufiletype']) !!}
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
    </div>
    <span class="loader"></span>
    <div class="btn-save btn-community-breakdown"> {!! Form::submit('Submit', ['class' => 'btn btn-danger btn-submitt']) !!}
    
    {!! Form::close() !!}
    </div>

<script type="text/javascript">
    fu_inputs = {};
    fu_inputs['refid']=<?php echo (isset($breakdown)?$breakdown->id:0)?>;
    fu_inputs['multiple']=true;
    fu_inputs['ufilename']='topic_file';
    fu_inputs['uTypes']='jpg,png,gif';
</script>
@include('partials.footer')
@stop

