<?php
if($ufiles) {
    foreach($ufiles as $ufdoc) {
    ?>
    <div class="ufileBox">{!! Form::hidden('ufilepath[]', $ufdoc['fullpath'], ['class'=>'ufilepath']) !!}{!! Form::hidden('ufilename[]', $ufdoc['filename'], ['class'=>'ufilename']) !!}<a href="/{{ $ufdoc['fullpath'] }}" target="_blank">{{ $ufdoc['filename'] }}</a> <a href="javascript:void(0)" onclick="delete_uploaded_file(this)"><i class="fa fa-close"></i></a></div>
    <?php
    }
}
?>