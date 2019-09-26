@extends('layouts.app')

@section('content')
<style>
.titinp 
{
width:30%;
border:1px solid lightgray;
}
.dailyrep
{
color:red;
}
</style>
   <!-- <h3 class="page-title">Login Permissions</h3>-->
   <div class="panel panel-default smoonity-asstess permission-checking permission-edit"> 
    {!! Form::model($role, ['method' => 'PUT', 'route' => ['roles.update', $role->id]]) !!}

    
        <div class="panel-heading">
            Login Permissions
             <p class="ptag">
               <a href="{{ route('roles.index') }}" class="btn btn-back-list">Back</a>
            </p>
        </div>

        <div class="panel-body users-permsission">
            <div class="row">
                <div class="col-xs-3 form-group paddddding">
                    {!! Form::label('title', 'Title*', ['class' => 'control-label']) !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => 'Supervisor']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>
            </div>
			
            <div class="dailyroles">
			<span class="select_all"><input type="checkbox" id="all_select"> <label>Select All</label></span>
             <?php $titles =  array(); ?>
             @if (count($permissionsList) > 0)  <?php $cat = ""; $maincat =""; $first = 1; ?>
                        @foreach ($permissionsList as $premission)
                       <?php //if(in_array($premission->category, $titles)) {} else { array_push($titles,$premission->category); echo '<div class="rolesreport"> <div class="title"><b>'.$premission->category.'</b></div><div class="teste">';};
						?> 
                         <?php if($premission->display_title=='Daily Reports')
								{
								if($maincat != $premission->display_title) { 
						   $indual = str_replace(" ","_",$premission->display_title);
									//echo '<div class="dailyrep"><b>'.$premission->display_title.'</b></div>'; }
									echo '<br/><br/><div class="dailyrep"><b> '.$premission->display_title.'</b>'.Form::checkbox('individrep[]', '','',array('class'=>'semi_select', 'id'=>$indual, 'onclick'=>'setsubselected(this)')).' Select All</div>'; }?>  
                        <?php if($cat != $premission->category) { if($first == 0) echo "</div>";
						 
									echo '<div class="rolesreport"> <div class="title"><b>'.$premission->display_cat.'</b></div>'; }?> 
                                    
                                    <?php $permisarray = explode(",",$perstatus);
						    $flag = "";
							
							 if(in_array($premission->name,$permisarray)) $flag = "true"; else $flag = "";
						 ?> 
					 
                         <div class="textcheck"><span class="boxcheck">{{ Form::checkbox('permisstatus[]', $premission->name,$flag,array('class'=>'use_select '.$indual)) }}</span><span>{{ $premission->display_name }}</span> </div>       
                         <?php //if(in_array($premission->category, $titles)) {} else { echo '</div>';  };  
						 
						    $cat =   $premission->category; 
							$maincat =   $premission->display_title; 
							$first = 0; }?> 
                         
                           @endforeach 
                           
                           @foreach ($permissionsList as $premission)
                       <?php //if(in_array($premission->category, $titles)) {} else { array_push($titles,$premission->category); echo '<div class="rolesreport"> <div class="title"><b>'.$premission->category.'</b></div><div class="teste">';};
						?> 
                         <?php if($premission->display_title!='Daily Reports')
								{
								if($maincat != $premission->display_title) { 
						   $indual = str_replace(" ","_",$premission->display_title);
									//echo '<div class="dailyrep"><b>'.$premission->display_title.'</b></div>'; }
									echo '<br/><br/><div class="dailyrep"><b> '.$premission->display_title.'</b>'.Form::checkbox('individrep[]', '','',array('class'=>'semi_select', 'id'=>$indual, 'onclick'=>'setsubselected(this)')).' Select All</div>'; }?>  
                        <?php if($cat != $premission->category) { if($first == 0) echo "</div>";
						 
									echo '<div class="rolesreport"> <div class="title"><b>'.$premission->display_cat.'</b></div>'; }?> 
                                    
                                    <?php $permisarray = explode(",",$perstatus);
						    $flag = "";
							
							 if(in_array($premission->name,$permisarray)) $flag = "true"; else $flag = "";
						 ?> 
					 
                         <div class="textcheck"><span class="boxcheck">{{ Form::checkbox('permisstatus[]', $premission->name,$flag,array('class'=>'use_select '.$indual)) }}</span><span>{{ $premission->display_name }}</span> </div>       
                         <?php //if(in_array($premission->category, $titles)) {} else { echo '</div>';  };  
						 
						    $cat =   $premission->category; 
							$maincat =   $premission->display_title; 
							$first = 0; }?> 
                         
                           @endforeach 
                           </div>
                    @endif   
             </div> 
    </div>
	

    {!! Form::submit('Update', ['class' => 'btn btn-danger pull-right']) !!}
    {!! Form::close() !!}
    
    </div>
        @include('partials.footer')
@stop

 
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script>  

$(document).ready(function() {
	$( "#all_select" ).change(function() {
		if($(this).prop('checked')==true) {
		$(".use_select").prop('checked', true);
		} else {
		$(".use_select").prop('checked', false);
		}	
	});
	$( ".use_select" ).change(function() {
		if($( ".use_select:checked" ).length == $( ".use_select" ).length) $("#all_select").prop('checked', true);
		else $("#all_select").prop('checked', false);	
	});
});

function setsubselected(me)
{

   $( "#"+me.id ).change(function() {
		if($(this).prop('checked')==true) {
		$("."+me.id).prop('checked', true);
		} else {
		$(".use_select").prop('checked', false);
		}	
	});
	$( "."+me.id ).change(function() {
		if($( ".use_select:checked" ).length == $( ".use_select" ).length) $("#"+me.id).prop('checked', true);
		else $("#"+me.id).prop('checked', false);	
	});
}
</script>


