        <div class="table-responsive">
             <table   border="1" class="apms-reporttable">
                    <thead>
                       <tr>
                          <th>S.No</th>
                          <th>Project Name</th>
                          <th>Date</th>
                          <th>Standard Deployment 100%</th>
                          <th>Standard Deployment 80%</th>
                          <th>Actual Deployment</th>
                          <th>Short Deployment</th>
                          <th>Observation</th>
                       </tr>
                    </thead>
                       <tbody>
                         <?php  $i = 1; ?>
                         @if (count($auditresult) > 0)
                        @foreach ($auditresult as $kk => $client)
                          @if (count($client) > 0)
                           @foreach ($client as $tt)
						   <?php
						   		if(isset($valid_fo[$kk])) $valid_fo[$kk] = $valid_fo[$kk]; else $valid_fo[$kk] = 0;
								if(isset($valid_hk[$kk])) $valid_hk[$kk] = $valid_hk[$kk]; else $valid_hk[$kk] = 0;
								if(isset($valid_others[$kk])) $valid_others[$kk] = $valid_others[$kk]; else $valid_others[$kk] = 0;
						   ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td>{{ $sites[$kk] }}</td>
                        <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>
                        <td><?php echo (int)$valid_fo[$kk] + (int)$valid_hk[$kk] + (int)$valid_others[$kk];  ?></td>
                        <td>&nbsp;</td>
                        <td><?php echo (int)$tt->clbhous_att_frntofc + (int)$tt->clbhous_att_housekp + (int)$tt->supervisor + (int)$tt->clbhous_att_other; ?>
                        <td>&nbsp;</td>
                        <td></td>
                      <?php $i = $i + 1; ?>
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