<div class="table-responsive">
   <table  border="1" class="afms-reporttable">
                    <thead>
                       <tr>
                          <th>S.No</th>
                          <th>Project Name</th>
                          <th>Date</th>
                          <th>Power Factor ( as per given norms)</th>
                          <th>Actual Power Factor</th>
                       </tr>
                    </thead>
                    <tbody>
                         <?php  $i = 1; ?>
                         @if (count($auditresult) > 0)
                        @foreach ($auditresult as $kk => $client)
                          @if (count($client) > 0)
                           @foreach ($client as $tt)
                           <?php if(($tt->pwr_pwrfactor)<0.99 || ($tt->pwr_pwrfactor)>1.00){ ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td>{{ $sites[$kk] }}</td>
                        <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>
                           <td>0.99 to 1.00</td>
                        <td>{{ $tt->pwr_pwrfactor }}</td>
                    </tr>
                    <?php $i = $i + 1;  } ?>
                       @endforeach
                       @endif
                        @endforeach
                    @endif      
                    @if(count($i) < 2) 
                        <tr>
                            <td colspan="11">No entries in table</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
                </div>