@extends('layouts.app')
@section('content')
    <!--<h3 class="page-title">Tasks</h3>-->
    <div class="panel panel-default panelmar add-nnnewww">
        <div class="panel-heading dark-lightss vendorheading-section" style="margin-bottom:10px;">
            <span>Attendance</span>               
           <p class="under-ptagh">
            <a href="/getattendanceformview" class="btn-primary task-calendar" title="Calendar" >Import</a> 
            <a href="/attendscan" class="btn-primary task-calendar" title="Calendar" >Scan</a> 
			<a href="/attendtrack" class="btn-primary task-calendar" title="Calendar" >Track</a> 
           </p>  
        </div> 		
		<div class="attend-search">
		<?php  $date = date("d-m-Y");?>
		
		 <div class="col-sm-3"><label class="label-fromdate">From Date:</label><span class="box"><input type="text" name="fromdate" id="fromdate" value="<?php echo $date; ?>" class="hasDatePicker form-control"></span> </div>
		 <div class="col-sm-3"><label class="label-todate">To Date:</label><span class="box"><input type="text" name="todate" id="todate" value="<?php echo $date; ?>" class="hasDatePicker form-control"></span></div>
		 <div class="col-sm-3"><label class="label-empcode">Emp Code:</label><span class="box"><input type="text" name="empcode" id="empcode" value="" class="hasDatePicker form-control"></span> </div>
		 <div class="col-sm-3"><input type="button" name="search" value="Search" onclick="refine_search();" class="btn btn-primary"></div>
		</div> 
           
        <div class="panel-body attendance-section" id="listview">
        	<div class="emplog">Employee | Login | Logouts</div>
            <table id="dTableColSearch" class="table table-bordered table-striped ckient-serever insearch {{ count($assets) > 0 ? 'dTableColSearch' : '' }}">  
                <thead class="head-color">
                    <tr>
                       
                        <th style="width:30px;">S.No</th>
                        <th>Date</th>
                       <th style="width:90px;">Emp Code</th>
					    <th style="width:200px;">Name </th>
                       <th style="width:80px;">department</th>
					   <th>shift</th>
                        <th>intime</th>
                        <th style="width:50px;">outtime</th>
                        <th style="width:75px;">Status</th>                       
                        
                    </tr>
                </thead> 
                <thead>
                    <tr class="plachelolder">
                        <td style="border-bottom:0px;"></td>
						 <td class="wkkdd"><input type="text" placeholder="Search" data-index="1" class="reposnsciefe1"/></td>
                        <td class="wkkdd"><input type="text" placeholder="Search" data-index="2" class="reposnsciefe1"/></td>
                        <td class="wkkdd"><input type="text" placeholder="Search" data-index="3" class="reposnsciefe" /></td>
                        <td class="wkkdd"><input type="text" placeholder="Search" data-index="4" class="reposnsciefe1" /></td>
                        <td class="wkkdd"><input type="text" placeholder="Search" data-index="5" class="reposnsciefe1" /></td>
						<td class="wkkdd"><input type="text" placeholder="Search" data-index="6" class="reposnsciefe1" /></td>
						<td class="wkkdd"><input type="text" placeholder="Search" data-index="7" class="reposnsciefe1"/></td>
						<td class="wkkdd"><input type="text" placeholder="Search" data-index="8" class="reposnsciefe1"/></td>
                       
                    </tr> 
                </thead>
                <tbody>
                    @if (count($assets) > 0)
					<?php $i = 0; ?>
                        @foreach ($assets as $client)
						<?php $i = $i + 1; ?>
                            <tr data-entry-id="{{ $client->id }}">
                                <td>{{ $i }}</td>
								<?php $originalDate = $client->report_date;
                                  $newDate = date("d-m-Y", strtotime($originalDate)); ?>
                                 <td>{{ $newDate }}</td> 
								 <td>{{ $client->empcode }}</td>
								  <td>{{ $client->name }}</td>
                                 <td>{{ $client->department }}</td> 
                                 <td>{{ $client->shift }}</td>
                                 <td>{{ $client->intime }}</td>
                                 <td>{{ $client->outtime }}</td>
                                 <td>{{ $client->status }}</td>
                              
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
		<div id="searchresponse" style="display:none;">
		
		</div>
    </div>
   @include('partials.footer')
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
	<script type="text/javascript">
		$( document ).ready(function() {
		$("#fromdate").datepicker({
		dateFormat: "dd-mm-yy",
		}); 
		$("#todate").datepicker({
		dateFormat: "dd-mm-yy",
		}); 
	});
	
	function refine_search(){

	   
	   var fromdate = $("#fromdate").val();
	   var todate = $("#todate").val();
	   var empcode = $("#empcode").val();
	    
		  $.ajax({
				type: "get",
				cache:false, 
				url: '{{ route('attendance.getsearchres') }}',
				data: { fromdate: fromdate, todate: todate, empcode: empcode  },
				success: function( response ) {
			
			  $("#searchresponse").html(response);
			  $("#searchresponse").show();
			  $("#listview").hide();
				}  
        });
	}
	</script>
@stop 

