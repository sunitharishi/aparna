              <div class="pms-about-water">  
                <table   border="1" class="apms-reporttable pms-water-table">
                    <thead>
                       <tr> 
                          <th>S.No</th>
                          <th>Project Name</th>
                          <th>Date</th>
                          <th>Time</th>
                          <th>Watering</th>
                          <th>Reason</th>
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
                        <td>{{ $tt->land_water_time }}</td> 
                         <td>{{ $tt->land_water_qty }}</td>
						 <td>{{ $tt->land_water_qty_reson }}</td>
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