@extends('layouts.app')

@section('content')

    <div class="panel panel-default smoonity-asstess break-down">
        <p class="help-block" id="frmerror"></p>
        <div class="panel-heading">
            Job Card
            <p class="ptag">
               <a href="/topics/jobcard" class="btn green-back">Back</a>
            </p>
        </div>
        
        <div class="panel-body breakdown-car">
            <div class="row">
            <table width="100%" class="jobcard-views">
                 <tbody>
                   <tr>
                      <td>{!! Form::label('refid', 'ID', ['class' => 'control-label']) !!}</td>
                      <td> {{ $jobcard->refid }}</td>
                      <td>{!! Form::label('site_id', 'Community', ['class' => 'control-label']) !!}</td>
                      <td> {{ $sitename }}</td>
                   </tr>
                    <tr>
                      <td>{!! Form::label('site_id', 'Jobcard Type', ['class' => 'control-label']) !!}</td>
                      <td>{{ $jbtypes[$jobcard->jctype] }}</td>
                      <td> @if($jobcard->jctype==1) {!! Form::label('site_id', 'Breakdown ID', ['class' => 'control-label']) !!}  @elseif($jobcard->jctype==2) {!! Form::label('site_id', 'Incident ID', ['class' => 'control-label']) !!}@endif</td>
                      <td> @if($jobcard->jctype==1) @if($jbref){{ $jbref->refid }} {{ $jbref->title }}  @endif @elseif($jobcard->jctype==2)  @if($jbref){{ $jbref->refid }}@endif @endif</td>
                   </tr>
                    <tr>
                        <td> {!! Form::label('title', 'Category', ['class' => 'control-label']) !!}</td>
                      <td> {{ $catgname }}</td>
                      <td>{!! Form::label('title', 'Asset', ['class' => 'control-label']) !!}</td>
                      <td> {{ $comasset?$comasset->code.' - '.$comasset->name:'' }}</td>
                   </tr>
                    <tr>
                      <td>{!! Form::label('site_id', 'Vendor', ['class' => 'control-label']) !!}</td>
                      <td>{{ $vendorname }}</td>
                      <td>{!! Form::label('status', 'Status', ['class' => 'control-label']) !!}</td>
                      <td> {{ $jobcard->status }}</td>
                   </tr>
                    <tr>
                      <td>{!! Form::label('bdate', 'Updated', ['class' => 'control-label']) !!}</td>
                      <td>{{ date("d.m.Y h:i A",strtotime($jobcard->updated_at)) }}</td>
                      <td></td>
                      <td></td>
                   </tr>
                 </tbody>
                 
              </table>
              
              
               <?php /*?> <div class="col-sm-2 form-group">
                    {!! Form::label('refid', 'ID', ['class' => 'control-label']) !!}<br>
                    {{ $jobcard->refid }}
                </div>
                <div class="col-sm-2 form-group">
                    {!! Form::label('site_id', 'Community', ['class' => 'control-label']) !!}<br>
                    {{ $sitename }}
                </div>
                <div class="col-sm-2 form-group">
                    {!! Form::label('site_id', 'Jobcard Type', ['class' => 'control-label']) !!}<br>
                    {{ $jbtypes[$jobcard->jctype] }}
                </div>
                @if($jobcard->jctype==1)
                <div class="col-sm-2 form-group">
                    {!! Form::label('site_id', 'Breakdown ID', ['class' => 'control-label']) !!}<br>
                    @if($jbref){{ $jbref->refid }} {{ $jbref->title }}@endif
                </div>
                @elseif($jobcard->jctype==2)
                <div class="col-sm-2 form-group">
                    {!! Form::label('site_id', 'Incident ID', ['class' => 'control-label']) !!}<br>
                    @if($jbref){{ $jbref->refid }}@endif
                </div>
                @endif
                <div class="col-sm-2 form-group">
                    {!! Form::label('title', 'Category', ['class' => 'control-label']) !!}<br>
                    {{ $catgname }}
                </div>               
                <div class="col-sm-2 form-group">
                    {!! Form::label('title', 'Asset', ['class' => 'control-label']) !!}<br>
                    {{ $comasset?$comasset->code.' - '.$comasset->name:'' }}
                </div>

            </div>
            <div class="row class-ctration">
                <div class="col-sm-2 form-group">
                    {!! Form::label('site_id', 'Vendor', ['class' => 'control-label']) !!}<br>
                    {{ $vendorname }}
                </div>
                <div class="col-sm-2 form-group">
                    {!! Form::label('status', 'Status', ['class' => 'control-label']) !!}<br>
                    {{ $jobcard->status }}
                </div>
                <div class="col-sm-2 form-group">
                    {!! Form::label('bdate', 'Date', ['class' => 'control-label']) !!}<br>
                    {{ date("d.m.Y h:i A",strtotime($jobcard->jdate)) }}
                </div>
                <div class="col-sm-2 form-group">
                    {!! Form::label('bdate', 'Updated', ['class' => 'control-label']) !!}<br>
                    {{ date("d.m.Y h:i A",strtotime($jobcard->updated_at)) }}
                </div><?php */?>
                @if ($jobcardusers)
                <div class="col-sm-12 form-group emplouyee"> 
                    <div class="emplouee-aname">
                        {!! Form::label('bdate', 'Employee', ['class' => 'control-label']) !!}<br>
                         <?php $sitenameval = ""; ?>
                        @foreach($jobcardusers as $tuval)
                        <div class="employeemame"><?php if($sitenameval != $tuval->sitename) { ?><div class="employeemame"><b>{{ $tuval->sitename }}</b> :</div> <?php } ?> <a href="#">{{ $tuval->username }}</a></div>
                         <?php $sitenameval = $tuval->sitename; ?>
                        @endforeach
                    </div>
                </div>
                @endif

              </div> 
                <div class="row form-group fckrarr">
                  <div class="col-sm-12">
                    {!! Form::label('work_activity', 'Work Activity', ['class' => 'control-label']) !!}<br>
                    {!! $jobcard->work_activity !!}
                   </div>
                </div> 
                            
                 
        </div>
    </div>
    
    </div>


@include('partials.footer')

@stop

