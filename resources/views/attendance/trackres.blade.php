  
   <div class="col-sm-3"> <label class="date">Date:</label>  <?php echo $newDate = date("d-m-Y", strtotime($fdate)); ?></div>
	 
     <div class="col-sm-3"><label class="empxoddd">Code:</label> <?php echo $empcode;?></div>
	 
	 <div class="col-sm-3"><label class="empnameee">Name:</label> <?php echo $empname;?></div>
	 
	 <div class="col-sm-3"><label class="emodepartnment">Department:</label> <?php echo $department;?></div>
	 
	       <div class="table-responsive">
             <table border="1" class="employeedutiessa">  
                <thead class="head-color">
                    <tr>
                       
                        <th style="width:34px;">S.No</th>
					     <th>Shift</th>
                        <th>Intime</th>
                        <th>Outtime</th>
                        <th>Status</th>                       
                        
                    </tr>
                </thead> 
                    
                <tbody>
                    @if (count($results) > 0)
					<?php $i = 0; ?>
                        @foreach ($results as $client)
						<?php $i = $i + 1; ?>
                            <tr data-entry-id="{{ $client->id }}">
                                <td>{{ $i }}</td>
								
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