<div class="table-responsive">
 <table  border="1" class="afms-reporttable">
                    <thead>
                       <tr>
                          <th>S.No</th>
                          <th>Project Name</th>
                          <th>Date</th>
                          <th>Actuals As Per DAR</th>
                       </tr>
                    </thead>
                   <tbody>
                         <?php  $i = 1; ?>
                         @if (count($auditresult) > 0)
                        @foreach ($auditresult as $kk => $client)
                          @if (count($client) > 0)
                           @foreach ($client as $tt)
                           <?php if(($tt->wsp_ppm_rw)>400){ ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td>{{ $sites[$kk] }}</td>
                        <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>
                        <td>{{ $tt->wsp_ppm_rw }}</td>
                    </tr>
                     
                     <?php $i = $i + 1;  } ?>
                       @endforeach
                        @if(count($i) < 2) 
                            <tr>
                                <td colspan="11">No entries in table</td>
                            </tr>
                        @endif
                       @endif
                        @endforeach
                    @endif
                    
                    </tbody>
                </table>
                </div>