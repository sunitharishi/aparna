 <div class="table-responsive">
 <table   border="1" class="asecurity-reporttable apms-reporttable {{ count($auditresult) > 0 ? 'datatable' : '' }} dt-select" >
                    <thead>
                       <tr>
                          <th>S.No</th>
                          <th>Project Name</th>
                          <th>Date</th>
                          <th>Remarks</th>
                       </tr>
                    </thead>
                <tbody>
                    <?php  $i = 1; ?>
                         @if (count($auditresult) > 0)
                        @foreach ($auditresult as $kk => $client)
                          @if (count($client) > 0)
                           @foreach ($client as $tt)
                         <?php
						           $rdate = date("d-m-Y", strtotime($tt->reporton)); 
      						   $checkval = checkDailyStatus($rdate, $kk);
      						 if($checkval[0] == 'yes'){ } else { ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td>{{ $sites[$kk] }}</td>
                        <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>
                        <td><?php
						  $rdate = date("d-m-Y", strtotime($tt->reporton));
						 $checkval = checkDailyStatus($rdate, $kk);
						 if($checkval[0] == 'yes'){ 
						   if($tt->blockflag == 1) { 
						   	  echo "DAR Submitted with Delay";
						   }
						    else{
							   echo "DAR Submitted";
							}
						 } else {
						   echo "DAR Not Submitted";
						 }
						  ?></td>
                      </tr> 
                       <?php $i = $i + 1; ?>
                      <?php } ?>
                     
                       @endforeach
                       @endif
                        @endforeach
                          
                    @else 
                        <tr>
                            <td colspan="11">No entries in table</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
                </div>