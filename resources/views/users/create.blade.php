@extends('layouts.app')

@section('content')
  <span style="color:#FF0000";><?php  echo $emailerror;?></span>
   <!-- <h3 class="page-title">Users</h3>-->
    {!! Form::open(['method' => 'POST', 'route' => ['users.store']]) !!}

    <div class="panel panel-default panelmar smoonity-asstess anothewea">
        <div class="panel-heading" style="width:100%;">
            Users
             <p class="ptag">
                <a href="{{ route('users.index') }}" class="btn btn-back-list">Back</a>
            </p>
        </div>
        
        <div class="panel-body vector-assign class-ctration novations users-create-page">
		          <?php $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
					      $uri_segments = explode('/', $uri_path); 
						  $comu = "";
						  $empv = "";
						  if(isset($uri_segments[2])) {
						  if($uri_segments[2] > 0){ 
						     $comu =  $uri_segments[2];
						  }
						  }
						  if(isset($uri_segments[3])){
						   if($uri_segments[3] > 0){
						     $comu =  $uri_segments[3];
						  }
						  }
						   if(isset($uri_segments[4])){
						  if($uri_segments[4] > 0){
						     $empv =  $uri_segments[4];
						  }
						  }
					?>
				
		
				<div class="col-xs-2 col-sm-2 form-group">
                    {!! Form::label('community', 'Community*', ['class' => 'control-label']) !!}
                    {!! Form::select('community', $sites_names, $comu, ['class' => 'form-control', 'id' => 'community_id']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('community'))
                        <p class="help-block">
                            {{ $errors->first('community') }}
                        </p>
                    @endif
                </div>
				
				<div class="col-xs-2 col-sm-2 form-group">
                    {!! Form::label('emp_id', 'Employee*', ['class' => 'control-label']) !!}
                    {!! Form::select('emp_id', $emp_names, $empv, ['class' => 'form-control', 'id' => 'emp_id']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('emp_id'))
                        <p class="help-block">
                            {{ $errors->first('emp_id') }}
                        </p>
                    @endif
                </div>
				
				<div class="col-xs-3 col-sm-3 form-group">
                    {!! Form::label('role_id', 'Role*', ['class' => 'control-label']) !!}
                    {!! Form::select('role_id', $roles, old('role_id'), ['class' => 'form-control']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('role_id'))
                        <p class="help-block">
                            {{ $errors->first('role_id') }}
                        </p>
                    @endif
                </div>
				 {!! Form::hidden('name', $empname, ['class' => 'form-control', 'placeholder' => '', 'id' => 'emp_name']) !!}
               <!-- <div class="col-xs-3 col-sm-3 form-group">
                    {!! Form::label('name', 'Name*', ['class' => 'control-label']) !!}
                    {!! Form::hidden('name', $empname, ['class' => 'form-control', 'placeholder' => '', 'id' => 'emp_name']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>-->
                <div class="col-xs-3 col-sm-3 form-group">
                    {!! Form::label('email', 'Email*', ['class' => 'control-label']) !!}
                    {!! Form::email('email', $emailv, ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('email'))
                        <p class="help-block">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>
                <div class="col-xs-2 col-sm-2 form-group">
                    {!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('password'))
                        <p class="help-block">
                            {{ $errors->first('password') }}
                        </p>
                    @endif
                </div>
                
            
        </div>
  

   <span class="pull-right"> {!! Form::submit('Submit', ['class' => 'btn btn-danger']) !!} </span>
    {!! Form::close() !!}
    
      </div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type="text/javascript">

$( document ).ready(function() {
  $( "#community_id" ).change(function() 
  {
   var val = $(this).val(); 
   
   //var href = window.location.href;
   //window.location = href.replace(/getdailyreport\/.*$/, "");
   //window.location.href = "http://aparna.greaterkakinada.com/getdailyreport/"+val;
  // window.location.replace('getdailyreport/'+val);
  
  /*$.ajax({
    method: 'POST', // Type of response and matches what we said in the route
    url: '/customer/ajaxupdate', // This is the url we gave in the route
    data: {'id' : id}, // a JSON object to send back
    success: function(response){ // What to do if we succeed
        console.log(response); 
    },
    error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
        console.log(JSON.stringify(jqXHR));
        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
    }
}); */

if(val == ""){}else{

 var href = window.location.href;
   //window.location = href.replace(/getdailyreport\/.*$/, "");
   window.location.href = "/userscreate/"+val;  
 
    // alert(val);
	 
}
  });
  
  
 $( "#emp_id" ).change(function() 
  {
    //emp_name  
	var textn = $("#emp_id option:selected").text();
	//$("#emp_name").val(text);
	
	 
	var community = $("#community_id").val();    
	var emp = $("#emp_id").val();  
	
	 
	
	
	if(community != "" && emp != ""){
	
	var href = window.location.href;
	//window.location = href.replace(/getdailyreport\/.*$/, "");
	window.location.href = "/userscreateemp/updation/"+community+"/"+emp;  
	}
	
	 if(emp != ""){
	   //$("#emp_name").val(textn);
	   
	 // alert(textn);
	   document.getElementById('emp_name').value=textn;
	 }
	 
 });
 
 var textn = $("#emp_id option:selected").text();
   document.getElementById('emp_name').value=textn;
 
     
});
</script>

    @include('partials.footer')
@stop

