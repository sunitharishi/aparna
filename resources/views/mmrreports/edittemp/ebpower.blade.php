<div class="col-sm-12 form-group mmrebpower-page">
    <div class="col-sm-3">
     {!! Form::text('ebpower', $ebpower, ['class' => 'form-control', 'id' =>'eb_power', 'placeholder' => '']) !!}
    </div>
</div>

<div class="col-sm-12">
{!! Form::submit('Save', ['class' => 'btn btn-danger']) !!}
</div>                
  {!! Form::close() !!}                    