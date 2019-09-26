@extends('layouts.app')

@section('content')
    <div class="panel panel-default smoonity-asstess break-down">
        <p class="help-block" id="frmerror"></p>
        <div class="panel-heading">
            Breakdown
            <p class="under-ptagh">
               <a href="/topics/breakdown" class="btn green-back">Back</a>
            </p>
        </div>
        
        <div class="panel-body breakdown-car">
            <div class="row breakdown-viewtable">
             
              <table width="100%" class="breakdown-table">
                 <tbody>
                   <tr>
                      <td>{!! Form::label('refid', 'ID', ['class' => 'control-label']) !!}</td>
                      <td>{{ $breakdown->refid }}</td>
                      <td> {!! Form::label('site_id', 'Community', ['class' => 'control-label']) !!}</td>
                      <td> {{ $sitename }}</td>
                   </tr>
                   <tr>
                      <td> {!! Form::label('catg', 'Category', ['class' => 'control-label']) !!}</td>
                      <td> {{ $catgname }}</td>
                      <td>{!! Form::label('title', 'Asset', ['class' => 'control-label']) !!}</td>
                      <td> {{ $comasset?$comasset->code.' - '.$comasset->name:'' }}</td>
                   </tr>
                   <tr>
                      <td>{!! Form::label('title', 'Title', ['class' => 'control-label']) !!}</td>
                      <td> {{ $breakdown->title }}</td>
                      <td> {!! Form::label('bdate', 'Date', ['class' => 'control-label']) !!}</td>
                      <td>{{ date("d.m.Y h:i A",strtotime($breakdown->bdate)) }}</td>
                   </tr>
                   <tr>
                      <td>{!! Form::label('info', 'Description', ['class' => 'control-label']) !!}</td>
                      <td colspan="3"> {!! $breakdown->info !!}</td>
                   </tr>
                   <tr>
                      <td>{!! Form::label('action', 'Action to be taken', ['class' => 'control-label']) !!}</td>
                      <td colspan="3"> {!! $breakdown->action !!}</td>
                   </tr>
                 </tbody>
              </table>
            
            <?php /*?>    <div class="col-sm-4 form-group breakdown-title">
                    {!! Form::label('refid', 'ID', ['class' => 'control-label']) !!}<br>
                    {{ $breakdown->refid }}
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
                    {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}<br>
                    {{ $breakdown->title }}
                </div>
                <div class="col-sm-2 form-group breakdown-title">
                    {!! Form::label('bdate', 'Date', ['class' => 'control-label']) !!}<br>
                    {{ date("d.m.Y h:i A",strtotime($breakdown->bdate)) }}
                </div>
              </div> 
                <div class="row form-group fckrarr">
                   <div class="col-sm-12">
                    {!! Form::label('info', 'Description', ['class' => 'control-label']) !!}<br>
                    {!! $breakdown->info !!}
                   </div>
                </div> <?php */?>
                
              <?php /*?>   <div class="row form-group fckrarr class-ctration">
                   <div class="col-sm-12">
                    {!! Form::label('action', 'Action to be taken', ['class' => 'control-label']) !!}<br>
                    {!! $breakdown->action !!}
                   </div>
                </div><?php */?>

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


@include('partials.footer')

@stop

