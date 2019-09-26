@extends('layouts.app')


@section('content')

<style type="text/css">
	.empids .commoncom{clear: both;padding: 4px;margin: 4px;}
    .empids .empbox{float: left;padding: 4px;border: 1px solid #cccccc;margin: 4px;}
    .empids .empbox i{color:red; font-size:20px;}
</style>

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

   <!-- <h3 class="page-title">Tasks</h3>-->
    {!! Form::open(['method' => 'POST', 'route' => ['dailyreports.storelockpermission']]) !!}

    <div class="panel panel-default panelmar tsas-crseations">
        <div class="panel-heading">
            Lock Permission  
        </div>
        
        <div class="panel-body">

            <div class="row class-ctration">
			
			     <div class="col-sm-1 form-group employee-toiele">
                    {!! Form::label('user_id', 'User', ['class' => 'control-label']) !!}
                     {!! Form::select('user_id', $users, '', ['class' => 'form-control', 'id' => 'user_id']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('user_id'))
                        <p class="help-block">
                            {{ $errors->first('user_id') }}
                        </p>
                    @endif   
                </div>
				<?php $todaydate = date('d-m-Y'); ?>
				<span class="permission-space"><input type="text" id="example1" name="permissiondate" value="<?php echo $todaydate; ?>" class="hasDatePicker form-control"></span>
                
            </div>

            
            
        </div>
    </div>  
   
    {!! Form::submit('Submit', ['class' => 'btn btn-danger btn-save']) !!}
    {!! Form::close() !!}
	
	
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type="text/javascript">

	$( document ).ready(function() { 
	$('#example1').datepicker({ dateFormat: "dd-mm-yy" });
	
	 });
			</script>
 @include('partials.footer')

@stop

