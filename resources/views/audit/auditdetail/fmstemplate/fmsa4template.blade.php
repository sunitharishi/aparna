    <div class="table-responsive">
     <table  border="1" class="afms-reporttable">
                    <thead>
                       <tr>
                          <th>S.No</th>
                          <th>Project Name</th>
                          <th>Date</th>
                          <th>Desired KVA</th>
                          <th>Recorded KVA</th>
                          <th>Variance</th>
                          <th>Observation</th>
                       </tr>
                    </thead>
                      <tbody>
                         <?php  $i = 1; ?>
                         @if (count($auditresult) > 0)
                        @foreach ($auditresult as $kk => $client)
                          @if (count($client) > 0)
                           @foreach ($client as $tt)
						   
                           
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td>{{ $sites[$kk] }}</td>
                        <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>
                           <td>{{ $validkva[$kk] }}</td>
                        <td>{{ $tt->pwr_recordedkva }}</td>
                        <td><?php echo   (float)$validkva[$kk] - (float)$tt->pwr_recordedkva ;  ?></td>
                        <td></td>
                       </tr>
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