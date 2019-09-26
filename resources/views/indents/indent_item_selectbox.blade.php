{!! Form::label('emp', 'Spares', ['class' => 'control-label']) !!}
{!! Form::select('item_code[]', $items_List, '', ['class' => 'form-control select2mes','id'=>'spare_id']) !!}