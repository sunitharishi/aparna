@extends('layouts.app')
@section('content')
    <!--<h3 class="page-title">Tasks</h3>-->
  
 
    <div class="panel panel-default panelmar add-nnnewww">
        <div class="panel-heading dark-lightss">
            <span>Attendance</span>  
             
       <p class="under-ptagh">
	   <a href="/attendance" class="btn-primary task-calendar" title="Calendar">List</a> 
        <a href="/getattendanceformview" class="btn-primary task-calendar" title="Calendar">Import</a> 
		<a href="/attendscan" class="btn-primary task-calendar" title="Calendar">Scan</a> 
       </p>  
        </div> 
		
		<div class="scan-page">
		<?php  $date = date("d-m-Y");?>
		  <div class="col-sm-3 datepoilicy-in">
			 <label class="lollepop">Date:</label> <span class="box"><input type="text" name="fromdate" id="fromdate" value="<?php echo $date; ?>" class="hasDatePicker form-control"></span> 
          </div>
		  <div class="col-sm-3 has-datepoicker"><label class="emp-codeq">Emp Code:</label><span class="box"><input type="text" name="empcode" id="empcode" value="" class="hasDatePicker form-control"></span> </div>
		   <div class="col-sm-2 attendance-search"><input type="button" name="search" value="Search" onclick="refine_search();" class="btn btn-primary"></div>
		 
		  <div id="searchresponse" class="result-employeecode table-responsive">
	


			</div>
		
		
		</div> 
		
           
         
	
    </div>
	

	
	
	
   @include('partials.footer')
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
	<script type="text/javascript">
		$( document ).ready(function() {
 $("#fromdate").datepicker({
		dateFormat: "dd-mm-yy",
		}); 
	});
	
	

	function refine_search(){

	   var fromdate = $("#fromdate").val();
	   var empcode = $("#empcode").val();
	    if(empcode == ""){
		   alert("Enter Employee Code");
		}else{
		  $.ajax({
				type: "get",
				cache:false, 
				url: '{{ route('attendance.gettrackres') }}',
				data: { fromdate: fromdate, empcode: empcode  },
				success: function( response ) {
			
			  $("#searchresponse").html(response);
				}  
        });
		}
	}
	
	
	</script>
@stop 

