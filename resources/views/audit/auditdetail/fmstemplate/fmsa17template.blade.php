  <div class="table-responsive">
   <table  border="1" class="afms-reporttable">
                    <thead>
                       <tr>
                          <th>S.No</th>
                          <th>Project Name</th>
                          <th>Date</th>
                          <th>Standard Range-0.1 to 1</th>
                          <th>Actuals</th>
                       </tr>
                    </thead>
                    <tbody>
                         <?php  $i = 1; ?>
                         @if (count($auditresult) > 0)
                        @foreach ($auditresult as $kk => $client)
                          @if (count($client) > 0)
                           @foreach ($client as $tt)
                           <?php if(($tt->stp_residual_chlorine) > 1){ ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td>{{ $sites[$kk] }}</td>
                        <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>
                           <td>0.1 to 1</td>
                        <td>{{ $tt->stp_residual_chlorine }}</td>
                    </tr>
                    <?php $i = $i + 1;  } ?>
                       @endforeach
                       @endif
                        @endforeach
                    @endif      
                    @if(count($i) < 1) 
                        <tr>
                            <td colspan="11">No entries in table</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>