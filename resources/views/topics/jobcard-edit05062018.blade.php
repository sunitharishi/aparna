@extends('layouts.app')

@section('content')
<style type="text/css">
    .empids .commoncom{clear: both;padding: 4px;margin: 4px;}
    .empids .empbox{float: left;padding: 4px;border: 1px solid #cccccc;margin: 4px;}
    .empids .empbox i{color:red; font-size:20px;}
</style>
    <!--<h3 class="page-title">Community Assets</h3>-->
    {!! Form::open(['method' => 'POST', 'route' => ['jobcard.save'],'id'=>'frmJobcard','onsubmit'=>'return saveJobcard()']) !!}
    {!! Form::hidden('taction', 'save') !!}
    {!! Form::hidden('id', isset($jobcard)?$jobcard->id:'') !!}
    <div class="panel panel-default smoonity-asstess">
        <p class="help-block" id="frmerror"></p>
        <div class="panel-heading">
            Job Card {{ (isset($jobcard)?'Edit':'New') }}
            <p class="ptag">
              <a href="/topics/jobcard" class="btn green-back">Back</a>
            </p>
        </div>
        
        <div class="panel-body jobacard nobcardds">
            <div class="row class-ctration">
                @if($userid==1)
                <div class="col-sm-2 form-group joncard-community">
                    {!! Form::label('site_id', 'Community', ['class' => 'control-label']) !!}
                    {!! Form::select('site_id', $communities, old('site_id')?old('site_id'):(isset($jobcard)?$jobcard->site_id:''), ['class' => 'form-control select2mes erequired','onchange'=>'setJcSite_changed();']) !!}
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
                <div class="col-sm-2 form-group inreponsibleee">
                    {!! Form::label('jctype', 'Job card type', ['class' => 'control-label']) !!}
                    {!! Form::select('jctype', $jbtypes, old('jctype')?old('jctype'):(isset($jobcard)?$jobcard->jctype:''), ['class' => 'form-control select2mes erequired','onchange'=>'setJobtype(this)']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('jctype'))
                        <p class="help-block">
                            {{ $errors->first('jctype') }}
                        </p>
                    @endif
                    <?php 
                        $jctype = old('jctype')?old('jctype'):(isset($jobcard)?$jobcard->jctype:'');
                        $jctype12='';
                        if($jctype=='3' || $jctype=='4')
                            $jctype12 = old('asset_id')?old('asset_id'):(isset($jobcard)?$jobcard->jcref:'');
                        else if($jctype=='1' || $jctype=='2')
                            $jctype12 = old('jctype12')?old('jctype12'):(isset($jobcard)?$jobcard->jcref:'');
                    ?>
                </div>

                <div class="col-sm-3 form-group sparess jctypeoptions1 breadksoen1" <?php if($jctype<>'1' && $jctype<>'2') echo ' style="display: none;"';?>>
                    @if(isset($jobcard) && $jobcard && ($jctype=='1' || $jctype=='2'))
                    {!! Form::label('jctype12', $jctype=='1'?'Breadown ID':'Incident ID', ['class' => 'control-label']) !!}
                    {!! Form::select('jctype12', $jcoptions, $jctype12, ['class' => 'form-control select2mes','onchange'=>'getJobCardEmployees(this);getItemDetails(this);']) !!}
                    @endif
                </div>

                <div class="col-sm-2 form-group jctypeoptions2 job-card-catergoru" <?php if($jctype<>'3' && $jctype<>'4') echo ' style="display: none;"';?>>
                    {!! Form::label('category_id', 'Category', ['class' => 'control-label']) !!}<br>
                    {!! Form::select('category_id', $categories, old('category_id')?old('category_id'):(isset($comasset)?$comasset->category_id:''), ['class' => 'form-control select2mes'.(($jctype=='3' || $jctype=='4')?' erequired':''),'onchange'=>'getTopicsCommunityAssets()']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('category_id'))
                        <p class="help-block">
                            {{ $errors->first('category_id') }}
                        </p>
                    @endif
                </div>

                <div  id="topics_assets" class="col-sm-2 form-group jctypeoptions2 jon-care-saasets" <?php if($jctype<>'3' && $jctype<>'4') echo ' style="display: none;"';?>>
                    {!! Form::label('asset_id', 'Asset', ['class' => 'control-label']) !!}<br>
                    <select name="asset_id" id="asset_id" class="form-control select2mes<?php echo (($jctype=='3' || $jctype=='4')?' erequired':'')?>" onchange="getAssetEmployees(this)">
                       <option>Please select asset</option>
                       @if($comm_assets) 
                       @foreach($comm_assets as $casset)  
                       <option value="{{ $casset->id }}" @if(($jctype=='3' || $jctype=='4') && $jctype12==$casset->id) selected="selected" @endif >{{ $casset->sitename }} : {{ $casset->code }}-{{ $casset->name }}</option>
                       @endforeach 
                       @endif  
                    </select>
                    <p class="help-block"></p>
                    @if($errors->has('asset_id'))
                        <p class="help-block">
                            {{ $errors->first('asset_id') }}
                        </p>
                    @endif
                </div>
               
                <div class="col-sm-2 form-group incident-idb" id="sparesblock">
                    {!! Form::label('spares', 'Spares', ['class' => 'control-label']) !!}
                    {!! Form::select('spares', $sparestypes, old('spares')?old('spares'):(isset($jobcard)?$jobcard->spares:''), ['class' => 'form-control select2mes erequired','id'=>'spare_id']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('spares'))
                        <p class="help-block">
                            {{ $errors->first('spares') }}
                        </p>
                    @endif
                </div>
            </div>  
            <div class="row">
                <div class="col-sm-2 form-group vendor-reduction hide">
                    {!! Form::label('vendor', 'Vendor', ['class' => 'control-label']) !!}
                    {!! Form::select('vendor', $vendors, old('vendor')?old('vendor'):(isset($jobcard)?$jobcard->vendor:''), ['class' => 'form-control select2mes']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('vendor'))
                        <p class="help-block">
                            {{ $errors->first('vendor') }}
                        </p>
                    @endif
                </div>
                <div class="col-sm-2 form-group optjdate" <?php if($jctype<>'4') echo ' style="display: none;"';?>>
                    {!! Form::label('jdate', 'Date', ['class' => 'control-label']) !!}
                    {!! Form::text('jdate', old('jdate')?old('jdate'):(isset($jobcard)?date("d-m-Y",strtotime($jobcard->jdate)):''), ['class' => 'form-control datepick'.($jctype=='4'?' erequired':''), 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                </div>
                <div class="col-sm-2 form-group optjdate" <?php if($jctype<>'4') echo ' style="display: none;"';?>>
                    {!! Form::label('bdtime', 'Time', ['class' => 'control-label']) !!}
                    {!! Form::text('bdtime', old('bdtime')?old('bdtime'):(isset($jobcard)?date("H:i",strtotime($jobcard->jdate)):''), ['class' => 'form-control timepick'.($jctype=='4'?' erequired':''), 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                </div>
                <div class="col-sm-2 form-group joncard-statuss">
                    {!! Form::label('status', 'Status', ['class' => 'control-label']) !!}
                    {!! Form::select('status', $statuses, old('status')?old('status'):(isset($jobcard)?$jobcard->status:''), ['class' => 'form-control']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('status'))
                        <p class="help-block">
                            {{ $errors->first('status') }}
                        </p>
                    @endif
                </div> 
                <div class="col-sm-2 form-group employeee">
                    
                </div>
                <div class="col-sm-8 form-group empids employee-recuritment">
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
                        @if ($jobcardusers) 
                        <?php $sitet_id = 0; ?> 
                            @foreach($jobcardusers as $tuval)
                             <?php if($sitet_id != $tuval->siteid) {  ?> <div  class="site_<?php echo $tuval->siteid; ?> commoncom"><div><b><?php echo $tuval->sitename; ?>:</b></div> <?php } ?>
                            <div class="empbox empid{{ $tuval->user_id }}">
                                <a onclick="task_emp_delete(this)"><i class="fa fa-close"></i></a> {{ $tuval->username }}
                                {!! Form::hidden('empid[]',$tuval->user_id) !!}     
                                {!! Form::hidden('siteidval[]',$tuval->siteid) !!}   
                                {!! Form::hidden('sitenameval[]',$tuval->sitename) !!}                        
                                {!! Form::hidden('empname[]',$tuval->sitename.':'.$tuval->username) !!}
                            </div> 
                              <?php if($sitet_id != $tuval->siteid) {  ?></div> <?php $sitet_id = $tuval->siteid; } ?>
                            @endforeach
                        @endif
                    @endif
                </div>

             </div> 
             <div class="row">     
                
                <div class="row form-group work-activity">
                    {!! Form::label('work_activity', 'Work Activity', ['class' => 'control-label']) !!}
                    {!! Form::textarea('work_activity', old('work_activity')?old('work_activity'):(isset($jobcard)?$jobcard->work_activity:''), ['class' => 'form-control summernote', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                </div>               
            </div>
        </div>
    </div>
    <span class="loader"></span>
    <div class="btn-save"> {!! Form::submit('Submit', ['class' => 'btn btn-danger btn-submitt']) !!}
    
    {!! Form::close() !!}
    </div>


@include('partials.footer')

@stop

