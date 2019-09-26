<div class="col-sm-12 form-group">
 	<textarea class="form-control summernote-small" placeholder="Enter Description" name="reason_text" cols="50" rows="10" id="reasontext"><?php echo $reason_text; ?></textarea>
</div>
<div class="col-sm-12">
    <span class="pull-right">
        {!! Form::submit('Save', ['class' => 'btn btn-danger']) !!}
    </span>
</div>               
  {!! Form::close() !!}                    