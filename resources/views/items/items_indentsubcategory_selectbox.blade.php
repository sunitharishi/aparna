{!! Form::select('sub_category_id[]', $catList, '', ['class' => 'form-control','id'=>'sub_cats','onchange'=>'getItembysubcat(this.value)']) !!}