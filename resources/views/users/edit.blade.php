@extends('layouts.app')

@section('content')
    <!--<h3 class="page-title">Users</h3>-->
    
    {!! Form::model($user, ['method' => 'PUT', 'route' => ['users.update', $user->id]]) !!}

    <div class="panel panel-default smoonity-asstess ectra-fat">
        <div class="panel-heading">
            Users
            <p class="ptag">
                <a href="{{ route('users.index') }}" class="btn btn-back-list">Back</a>
            </p>
        </div>
         <?php $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
					      $uri_segments = explode('/', $uri_path); 
						  $comu = "";
						  $empv = "";
						   $user_id =  $uri_segments[2];
						  if($uri_segments[3] > 0){
						     $user_id =  $uri_segments[2];
							 $comu =  $uri_segments[3];
						  }
						  if(isset($uri_segments[4])){
						   if($uri_segments[4] > 0){
						     $comu =  $uri_segments[4];
						  }
						  }
						   if(isset($uri_segments[5])){
						  if($uri_segments[5] > 0){
						     $empv =  $uri_segments[5];
						  }
						  } 
					?>
               {!! Form::hidden('user_id', old('name') , ['class' => 'form-control', 'placeholder' => '', 'id' => 'user_id']) !!}  
               {!! Form::hidden('community', old('community') , ['class' => 'form-control', 'placeholder' => '', 'id' => '']) !!}  
               {!! Form::hidden('emp_id', old('emp_id') , ['class' => 'form-control', 'placeholder' => '', 'id' => '']) !!}      
                   
        <div class="eleeleele"><span style="color:#ff2518">Community:</span><b> <?php echo $empcommunity; ?></b></div>
      
        <div class="panel-body users-create-page">
            <div class="row class-ctration">
                <div class="col-xs-2 form-group rollee">
                    {!! Form::label('name', 'Name*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '','id' => 'emp_name','']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div> 
           <!-- </div>
            <div class="row">-->
                <div class="col-xs-2 form-group rollwe-coder">
                    {!! Form::label('email', 'Email*', ['class' => 'control-label']) !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => '','readonly']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('email'))
                        <p class="help-block">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>
           <!-- </div>
            <div class="row">-->
                <div class="col-xs-3 form-group rotaitn">
                    {!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('password'))
                        <p class="help-block">
                            {{ $errors->first('password') }}
                        </p>
                    @endif
                </div>
           <!-- </div>
            <div class="row">-->
                <div class="col-xs-3 form-group revolofin">
                    {!! Form::label('role_id', 'Role*', ['class' => 'control-label']) !!}
                    {!! Form::select('role_id', $roles, old('role_id'), ['class' => 'form-control']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('role_id'))
                        <p class="help-block">
                            {{ $errors->first('role_id') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
   

    <span class="pull-right">{!! Form::submit('Update', ['class' => 'btn btn-danger']) !!}</span>
    {!! Form::close() !!}
     </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>




  @include('partials.footer')
@stop

