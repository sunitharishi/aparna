@extends('layouts.app')

@section('content')
    <h3 class="page-title">Asset Template</h3>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            Form
        </div>

        <div class="panel-body">
            {!! Form::open(['method' => 'POST', 'route' => ['assets.etemplate',$asset->id],'id'=>'frmTemplateForm','files' => true]) !!}
            <?php 
            if(isset($sections) && $sections) {
                foreach($sections as $sv) {
                    $n=1;
                    $cols = $sv['cols'];
                    $cw = 12/$cols;
            ?>
                @if(isset($sv['head']) && $sv['head'])
                <div>
                    <strong><u>{{ $sv['head'] }}:</u></strong>
                </div>
                @endif                
                    
                @if(isset($sv['fields']) && $sv['fields']) 
                <div class="row"> 
                    @foreach($sv['fields'] as $fval)
                    <?php 
                        $vreq = $fval->required=='Y'?' erequired':'';
                        $ireq = $fval->ivalids<>'0'?$fval->ivalids:'';
                        $ioptions = array();
                        if($fval->itype=='2' || $fval->itype=='3' || $fval->itype=='4') {                            
                            if($fval->itype=='2') $ioptions = array(''=>"Select");
                            if($fval->ioptions) {
                                $iopts = explode("\n", $fval->ioptions);
                                foreach($iopts as $iov) {
                                    $iov = trim($iov);
                                    $iov = str_replace("\n", "", $iov);
                                    if(empty($iov)) continue;
                                    $ioptions["$iov"]=$iov;
                                }
                            }
                        }
                    ?>

                    <div class="col-xs-{{ $cw }} form-group">
                        {!! Form::label('', $fval->label.($fval->required=='Y'?'*':''), ['class' => 'control-label']) !!}
                        {!! Form::hidden('atfid[]', $fval->id,['class'=>'efid']) !!}
                        {!! Form::hidden('atftype[]', $fval->itype,['class'=>'efid']) !!}

                        @if($fval->itype=='1')
                        {!! Form::text('atfvalue['.$fval->id.']', '', ['class' => 'form-control'.$vreq,'ivalids'=>$ireq, 'placeholder' => '']) !!}

                        @elseif ($fval->itype=='2')
                        {!! Form::select('atfvalue['.$fval->id.']', $ioptions, '', ['class' => 'form-control'.$vreq,'ivalids'=>$ireq]) !!}

                        @elseif ($fval->itype=='3')
                        <div>
                        @foreach($ioptions as $sval)
                        {!! Form::checkbox('atfvalue['.$fval->id.'][]', $sval); !!} <label>{{ $sval }}</label>
                        @endforeach
                        </div>

                        @elseif ($fval->itype=='4')
                        <div>
                        @foreach($ioptions as $sval)
                        {!! Form::radio('atfvalue['.$fval->id.']', $sval); !!} <label>{{ $sval }}</label>
                        @endforeach
                        </div>

                        @elseif ($fval->itype=='5')
                        {!! Form::textarea('atfvalue['.$fval->id.']', '', ['class' => 'form-control'.$vreq,'ivalids'=>$ireq, 'placeholder' => '']) !!}

                        @elseif($fval->itype=='6')
                        {!! Form::text('atfvalue['.$fval->id.']', '', ['class' => 'form-control datepick'.$vreq,'ivalids'=>$ireq,  'placeholder' => 'Date']) !!}

                        @elseif($fval->itype=='7')
                        {!! Form::text('atfvalue['.$fval->id.'][date]', '', ['class' => 'form-control datepick'.$vreq,'ivalids'=>$ireq, 'placeholder' => 'Date']) !!}
                        {!! Form::text('atfvalue['.$fval->id.'][time]', '', ['class' => 'form-control timepick'.$vreq,'ivalids'=>$ireq, 'placeholder' => 'Time']) !!}

                        @elseif ($fval->itype=='8')
                        {!! Form::textarea('atfvalue['.$fval->id.']', '', ['class' => 'form-control summernote'.$vreq,'ivalids'=>$ireq, 'placeholder' => '']) !!}

                        @elseif($fval->itype=='9')
                        {!! Form::file('atfvalue['.$fval->id.']', ['class' => 'form-control'.$vreq,'ivalids'=>$ireq]) !!}

                        @endif
                        
                        <p class="help-block"></p>
                    </div>
                    @endforeach
                </div>
                @endif                                        
                
            <?php 
                }
            }
            ?>

            <div style="float:right;">
                <span class="loader"></span>
                {!! Form::submit('Save', ['class' => 'btn btn-danger']) !!}
                <a href="{{ route('assets.index') }}" class="btn btn-primary aturl">Cancel</a>
                {!! Form::close() !!}
            </div>
            {!! Form::close() !!}

            <p>&nbsp;</p>

            <a href="{{ route('assets.index') }}" class="btn btn-default">Back to list</a> 
        </div>
    </div>
@stop