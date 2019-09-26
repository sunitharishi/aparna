@extends('layouts.app')
@section('content')
<div class="apms-table-page">
    {!! Form::open(['method' => 'GET', 'route' => ['amc.index'],'id'=>'frmBreakdown']) !!}
    <div class="col-sm-2 form-group cateresss">
        {!! Form::label('site_id', 'Community', ['class' => 'control-label']) !!}
        {!! Form::select('site_id', $communities, $site_id, ['class' => 'form-control select2mes erequired','onchange'=>'this.form.submit()']) !!}
        <p class="help-block"></p>
        @if($errors->has('site_id'))
            <p class="help-block">
                {{ $errors->first('site_id') }}
            </p>
        @endif
    </div>
    <span class="aparna-property">Planned Preventive Maintenance Schedule for the year -<span style="color:#ff2518;"> 2018</span></span>
    <span class="aparna-weeks"><span style="color:#ff2518;">52</span>-Weeks</span>
	<table cellpadding="0" cellspacing="0" width="100%" class="table table-bordered table-ppm">
    	<thead>
        	
            <tr>
            	<th rowspan="2">Category</th>
            	<th rowspan="2">Job Description</th>
            	<th rowspan="2">PM Frequency</th>
            	<th rowspan="2">Remarks</th>
                @foreach($monthnames as $mi=>$mv)
                <th style="color:#ffd800;" colspan="{{ $months[$mi] }}">{{ $mv}}</th>
                @endforeach
            </tr>
            <tr>
                @for($wn=1;$wn<=52;$wn++)
                <th style="background-color:#c19b63;color:#000;">{{ $wn }}</th>
                @endfor
            </tr>
            @if($cassets)
                @foreach($cassets as $ci=>$cval)
                        @foreach($cval['assets'] as $asi=>$caval)
                        <tr>
                            @if($asi==0)
                            <td style="vertical-align: middle;" rowspan="{{ $cval['rows'] }}"><b>{{ $categories[$ci] }}</b></td>
                            @endif
                            <td>{{ $caval->name }}</td>
                            <td>{{ (isset($amc_intervals[$caval->amc_interval])?$amc_intervals[$caval->amc_interval]:'') }}</td>
                            <td></td>
                            <?php 
                                $bgcolor = '';
                                $amcdate = $caval->amc_startdate?strtotime($caval->amc_startdate):0;
                                if($amcdate && $caval->amc_interval) {
                                    $bgcolor = '#'.$colorLetters[rand(0,15)].$colorLetters[rand(0,15)].$colorLetters[rand(0,15)].$colorLetters[rand(0,15)].$colorLetters[rand(0,15)].$colorLetters[rand(0,15)];
                                    $bgcolor = 'style="background:'.$bgcolor.'";';
                                }
                            ?>
                            @for($wn=1;$wn<=52;$wn++)
                            <?php
                                $tdcolor = '';
                                $tdval = '';
                                if($caval->amc_interval) {
                                    if(date("W",$amcdate)==$wn) {
                                        //$tdval = 'Y';
                                        $tdcolor = $bgcolor;
                                        $amcdate += $caval->amc_interval*24*60*60;
                                    }
                                }
                             ?>
                            <td {!! $tdcolor !!} style="paddding:0px ;"></td>
                            @endfor
                        </tr>
                        @endforeach
                @endforeach
            @endif
        </thead>
    </table>
    
</div> 
<!--<div class="color-indication">
        <ul>
           <li><label class="color1"></label> - Pending</li>
           <li><label class="color2"></label> - Completed</li>
        </ul>
    </div>-->  
@include('partials.footer')
@stop 
