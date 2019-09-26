@extends('layouts.app')
@section('content')
    <!--<h3 class="page-title">Tasks</h3>-->
  
 
    <div class="panel panel-default panelmar add-nnnewww">
        <div class="panel-heading dark-lightss">
            <span>Attendance</span>  
             
       <p class="under-ptagh">
        <a href="/getattendanceformview" class="btn-primary task-calendar" title="Calendar">Import</a> 
		<a href="/attendscan" class="btn-primary task-calendar" title="Calendar">Scan</a> 
       </p>  
        </div> 
		
		<div class="scan-page">
		<?php  $date = date("d-m-Y");?>
		  <div class="form-group scan-date">
			 <label class="label-scandate">Date:</label> <span class="box"><input type="text" name="fromdate" id="fromdate" value="<?php echo $date; ?>" class="hasDatePicker form-control"></span> 
          </div>
		  <div id="searchresponse">
		<div class="scan-table table-responsive">
		    @if (count($categories) > 0)
			
			   	
                       	<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover">
                        <thead class="head-color">
                        <tr>
					     <th> Category </th>
						 <th> Total </th>
						 <th> Uploaded </th>
						 <th> Not Yet </th>
						 <th> Present </th>
						 <th> Absent </th>
                         </tr>
					   </thead>
                       <tbody>

                        @foreach ($categories as $kk => $asset)  
						
						  <tr>
                            <td>
						    {{ $asset }}  
						    </td>
                             <td>
						    {{ $empcount[$kk] }} 
                             </td>
                             <td> 
							{{ $uploadedcn[$kk] }}  
                             </td>
                             <td onclick="notenteredcount(<?php echo $kk; ?>);">
							{{ $notenteredcn[$kk] }} 
                             </td>
                             <td onclick="getpresentcount(<?php echo $kk; ?>);">
							{{ $presentcn[$kk] }} 
                             </td>
                             <td onclick="getabsentcount(<?php echo $kk; ?>);"> 
							{{ $absentcn[$kk] }}  
						  </td>
                          </tr>
                          
						  
						    @endforeach

                    @else

                        <tr>

                            <td colspan="11">No entries in table</td>

                        </tr>

                    @endif
                    </tbody>
                    </table>
		</div>
		
		
			<div class="modal fade" id="sectionModal" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel">
    <div class="modal-dialog tempcreat-popbox" role="document">
        <div class="modal-content not-enterteddate">
          <div class="modal-header">
            <button type="button" class="close remedies" 
              data-dismiss="modal" 
              aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title presen-label" 
            id="favoritesModalLabel">Status - Present List</h4>
          </div>
          <div class="modal-body more-notenteredlost">
          
            <div class="row" id="popes">
           
		  
           </div>  
          </div>
          <div class="modal-footer">
            <button type="button" 
              class="btn btn-closse" data-dismiss="modal" style="margin-right:10px;">Close</button>
          </div>
        </div>
    </div>
</div>


<div class="modal fade" id="sectionModal2" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel">
    <div class="modal-dialog tempcreat-popbox" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close remedies" 
              data-dismiss="modal" 
              aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title presen-label" 
            id="favoritesModalLabel">Status - Absent List</h4>
          </div>
          <div class="modal-body more-notenteredlost">
          
            <div class="row" id="popes2">
           
		  
           </div>  
          </div>
          <div class="modal-footer">
            <button type="button" 
              class="btn btn-closse" data-dismiss="modal" style="margin-right:10px;">Close</button>
          </div>
        </div>
    </div>
</div>

<div class="modal fade" id="sectionModal3" 
     tabindex="-1" role="dialog" 
     aria-labelledby="favoritesModalLabel">
    <div class="modal-dialog tempcreat-popbox" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close remedies" 
              data-dismiss="modal" 
              aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title presen-label" 
            id="favoritesModalLabel">Status - Not Entered List</h4>
          </div>
          <div class="modal-body more-notenteredlost">
          
            <div class="row" id="popes3">
           
		  
           </div>  
          </div>
          <div class="modal-footer">
            <button type="button" 
              class="btn btn-closse" data-dismiss="modal" style="margin-right:10px;">Close</button>
          </div>
        </div>
    </div>
</div>
			</div>
		
		
		</div> 
		
           
         
	
    </div>
	

	
	
	
   @include('partials.footer')
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
	<script type="text/javascript">
		$( document ).ready(function() {
		
		
$("#fromdate").datepicker({
 dateFormat: "dd-mm-yy",
  onSelect: function(dateText) {
	   $.ajax({
				type: "get",
				cache:false, 
				url: '{{ route('attendance.getscansearchres') }}',
				data: { fromdate: dateText},
				success: function( response ) {
			  $("#searchresponse").html(response);
				}  
        });

  }

});
	});
	
	
	function getpresentcount(ck){	
	
	var dateText =  $("#fromdate").val();
	
	 $.ajax({
				type: "get",
				cache:false, 
				url: '{{ route('attendance.getpopupres') }}',
				data: { cat: ck, fromdate: dateText},
				success: function( response ) {
				$("#popes").html(response);
				
				   $("#sectionModal").modal();
			        
				}  
        });	   
	    
	}
	
	function getabsentcount(ck){
	var dateText =  $("#fromdate").val();
	 $.ajax({
				type: "get",
				cache:false, 
				url: '{{ route('attendance.getpopupabres') }}',
				data: { cat: ck, fromdate: dateText},
				success: function( response ) {
				$("#popes2").html(response);
				
				   $("#sectionModal2").modal();
			        
				}  
        });	   

	}
	
	function notenteredcount(ck){
	var dateText =  $("#fromdate").val();
	 $.ajax({
				type: "get",
				cache:false, 
				url: '{{ route('attendance.getnotenteredres') }}',
				data: { cat: ck, fromdate: dateText},
				success: function( response ) {
				$("#popes3").html(response);
				
				   $("#sectionModal3").modal();
			        
				}  
        });	   

	}
	
	
	</script>
@stop 

