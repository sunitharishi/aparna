
    <div class="panel panel-default">

        <div class="panel-body">
           
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
                        $aftvalue = isset($asset_template[$fval->id])?$asset_template[$fval->id]:'';
                        if(!$asset_template && ($fval->itype=='1' || $fval->itype=='2' || $fval->itype=='3' || $fval->itype=='4' || $fval->itype=='5' || $fval->itype=='8') && $fval->idefault) 
                            $aftvalue = $fval->idefault;
                        $aftvalDate = array('','');
                        if($fval->itype=='7' && $aftvalue) $aftvalDate = explode(" ", $aftvalue);
                        if($fval->itype=='3' && $aftvalue) $aftvalDate = explode(",", $aftvalue);
                        $aftvalfile = array('file'=>'','name'=>'');
                        if($fval->itype=='9' && $aftvalue) {
                            $affile = explode("_", $aftvalue);
                            $filepath = '/uploads/template/'.$aftvalue;
                            unset($affile[0]);
                            $affile = implode("", $affile);
                            $aftvalfile = array('file'=>$filepath,'name'=>$affile);
                            $vreq = '';
                        }
                    ?>

                    <div class="col-xs-{{ $cw }} form-group dynamic-textareaa">
                        {!! Form::label('', $fval->label.($vreq?'*':''), ['class' => 'control-label']) !!}
                        {!! Form::hidden('atfid['.$fval->id.']', $fval->id) !!}
                        {!! Form::hidden('atftype['.$fval->id.']', $fval->itype) !!}
                        {!! Form::hidden('atrequired['.$fval->id.']', ($vreq?$fval->required:'')) !!}
                        {!! Form::hidden('ativalids['.$fval->id.']', $fval->itype) !!}
                        {!! Form::hidden('attitle['.$fval->id.']', $fval->label) !!}


                        @if($fval->itype=='1')
                        <div class="textbox">
                        {!! Form::text('atfvalue['.$fval->id.']', $aftvalue, ['class' => 'form-control'.$vreq,'ivalids'=>$ireq, 'placeholder' => '']) !!}
                        </div>

                        @elseif ($fval->itype=='2')
                        <div class="selectbox">
                        {!! Form::select('atfvalue['.$fval->id.']', $ioptions, $aftvalue, ['class' => 'form-control'.$vreq]) !!}
                        </div>

                        @elseif ($fval->itype=='3')
                        <div class="checkbox">
                        @foreach($ioptions as $sval)
                        <span>
                        {!! Form::checkbox('atfvalue['.$fval->id.'][]', $sval,(in_array($sval,$aftvalDate)),['class'=>'echeckbox'.$vreq]); !!} {{ $sval }}
                        </span>
                        @endforeach
                        </div>

                        @elseif ($fval->itype=='4')
                        <div class="radiobox">
                        @foreach($ioptions as $sval)
                        <span>
                        {!! Form::radio('atfvalue['.$fval->id.']', $sval,($aftvalue==$sval),['class'=>'eradiobox'.$vreq]); !!} {{ $sval }}
                        </span>
                        @endforeach
                        </div>

                        @elseif ($fval->itype=='5')
                        <div class="textareabox">
                        {!! Form::textarea('atfvalue['.$fval->id.']', $aftvalue, ['class' => 'form-control'.$vreq,'ivalids'=>$ireq, 'placeholder' => '']) !!}
                        </div>

                        @elseif($fval->itype=='6')
                        <div class="datebox">
                        {!! Form::text('atfvalue['.$fval->id.']', $aftvalue, ['class' => 'form-control datepick'.$vreq,  'placeholder' => 'Date']) !!}
                        </div>

                        @elseif($fval->itype=='7')
                        <div class="datetimebox">
                        {!! Form::text('atfvalue['.$fval->id.'][date]', $aftvalDate[0], ['class' => 'form-control datepick'.$vreq, 'placeholder' => 'Date']) !!}
                        {!! Form::text('atfvalue['.$fval->id.'][time]', $aftvalDate[1], ['class' => 'form-control timepick'.$vreq, 'placeholder' => 'Time']) !!}
                        </div>

                        @elseif ($fval->itype=='8')
                        <div class="texteditorbox">
                        {!! Form::textarea('atfvalue['.$fval->id.']', $aftvalue, ['class' => 'form-control summernote','id'=>'atfvalue'.$fval->id, 'placeholder' => '']) !!}
                        </div>

                        @elseif($fval->itype=='9')
                        <div class="filebox">
                        {!! Form::file('atfvalue['.$fval->id.']', ['class' => 'form-control'.$vreq]) !!}
                        </div>
                        @if($aftvalfile['file'])
                        <a href="{{ $aftvalfile['file'] }}" target="_blank">{{ $aftvalfile['name'] }}</a>
                        @endif
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

        </div>
    </div>