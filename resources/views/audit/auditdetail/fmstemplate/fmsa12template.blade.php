    <div class="table-responsive">
        <table  border="1" class="afms-reporttable">
                    <thead>
                       <tr>
                          <th>S.No</th>
                          <th>Project Name</th>
                          <th>Date</th>
                          <th>Total No of DG Sets</th>
                          <th>No.of DG Sets Breakdown</th>
                          <th>Observation</th>
                       </tr>
                    </thead>
                     <tbody>
                         <?php  $i = 1; ?>
                         @if (count($auditresult) > 0)
                        @foreach ($auditresult as $kk => $client)
                          @if (count($client) > 0)
                           @foreach ($client as $tt)
						   <?php if($tt->dgset_notworking>1){ ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td>{{ $sites[$kk] }}</td>
                        <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>
                        <td>{{ $validkva[$kk] }}</td>
                        <td>{{ $tt->dgset_notworking }}</td>
                        <td></td> 
                       </tr>  
					   <?php  $i = $i + 1; } ?>
                       @endforeach
                       @endif
                        @endforeach
                        @endif  
                    	<?php if($i<2){ ?> 
                        <tr>
                            <td colspan="11">No entries in table</td>
                        </tr>
						<?php } ?>
                    
                    </tbody>
                </table>
             </div>   