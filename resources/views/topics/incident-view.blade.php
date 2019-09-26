@extends('layouts.app')

@section('content')
    <div class="panel panel-default smoonity-asstess break-down">
        <p class="help-block" id="frmerror"></p>
        <div class="panel-heading">
            Incident
            <p class="ptag">
              <a href="/topics/incident" class="btn green-back">Back</a>
            </p>
        </div>
        
        <div class="panel-body breakdown-car">
            <div class="row">
            <div class="incidentview-table1">
              <table width="100%" class="incidentview-table">
                <tbody>
                   <tr>
                      <td>{!! Form::label('refid', 'ID', ['class' => 'control-label']) !!}</td>
                      <td> {{ $incident->refid }}</td>
                      <td>{!! Form::label('site_id', 'Community', ['class' => 'control-label']) !!}</td>
                      <td>{{ $sitename }}</td>
                   </tr>
                   <tr>
                     <td>{!! Form::label('catg', 'Category', ['class' => 'control-label']) !!}</td>
                     <td> {{ $catgname }}</td>
                     <td>{!! Form::label('title', 'Asset', ['class' => 'control-label']) !!}</td>
                     <td> {{ $comasset?$comasset->code.' - '.$comasset->name:'' }}</td>
                   </tr>
                   <tr>
                     <td>{!! Form::label('idate', 'Date', ['class' => 'control-label']) !!}</td>
                     <td>{{ date("d.m.Y h:i A",strtotime($incident->idate)) }}</td>
                     <td>{!! Form::label('failure_reason', 'Failure Reason', ['class' => 'control-label']) !!}</td>
                     <td>{!! $incident->failure_reason !!}</td>
                   </tr>
                   <tr>
                     <td>{!! Form::label('required_spares', 'Required Spares', ['class' => 'control-label']) !!}</td>
                     <td>{!! $incident->required_spares !!}</td>
                     <td> {!! Form::label('process_work', 'Process of work', ['class' => 'control-label']) !!}</td>
                     <td> {!! $incident->process_work !!}</td>
                   </tr>
                </tbody>
              </table>
           
              <?php /*?>  <div class="col-sm-4 form-group breakdown-title">
                    {!! Form::label('refid', 'ID', ['class' => 'control-label']) !!}<br>
                    {{ $incident->refid }}
                </div>
                <div class="col-sm-2 form-group cateresss">
                    {!! Form::label('site_id', 'Community', ['class' => 'control-label']) !!}<br>
                    {{ $sitename }}
                </div>
                <div class="col-sm-2 form-group cateresss">
                    {!! Form::label('catg', 'Category', ['class' => 'control-label']) !!}<br>
                    {{ $catgname }}
                </div>
                <div class="col-sm-2 form-group breakdown-title">
                    {!! Form::label('title', 'Asset', ['class' => 'control-label']) !!}<br>
                    {{ $comasset?$comasset->code.' - '.$comasset->name:'' }}
                </div>
                <div class="col-sm-2 form-group breakdown-title">
                    {!! Form::label('idate', 'Date', ['class' => 'control-label']) !!}<br>
                    {{ date("d.m.Y h:i A",strtotime($incident->idate)) }}
                </div>
              </div> 
                <div class="row form-group fckrarr">
                   <div class="col-sm-12">
                    {!! Form::label('failure_reason', 'Failure Reason', ['class' => 'control-label']) !!}<br>
                    {!! $incident->failure_reason !!}
                   </div>
                </div> 
                
                 <div class="row form-group fckrarr">
                    <div class="col-sm-12">
                    {!! Form::label('required_spares', 'Required Spares', ['class' => 'control-label']) !!}<br>
                    {!! $incident->required_spares !!}
                    </div>
                </div>   
                <div class="row form-group fckrarr">
                  <div class="col-sm-12">
                    {!! Form::label('process_work', 'Process of work', ['class' => 'control-label']) !!}<br>
                    {!! $incident->process_work !!}
                  </div>
                </div> <?php */?>

                @if ($attachments) 
                <div class="row">
                   <div class="col-sm-12">
                    {!! Form::label('action', 'Attachments', ['class' => 'control-label']) !!}<br>
                    <div>
                        @foreach($attachments as $taval)
                        <div class="image-files-path"><img src="{{ '/uploads/'.$taval->atype.'/'.$taval->file }}" width="54px"  /><a href="{{ '/uploads/'.$taval->atype.'/'.$taval->file }}" target="_blank">{{ $taval->title }}</a>
                        </div>
                        @endforeach
                    </div>
                    </div>
                </div>
                    @endif              
               </div>   
        </div>
    </div>
    
    </div>


@include('partials.footer')

@stop

