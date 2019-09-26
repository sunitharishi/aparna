{!! Form::hidden('sitename', $sitename,['id'=>'sitename']) !!}
{!! Form::label('emp', 'Employee', ['class' => 'control-label']) !!}
{!! Form::select('emp', $empList, '', ['class' => 'form-control select2mes','id'=>'emp_id','onchange'=>'select_jobcard_emp(this)']) !!}