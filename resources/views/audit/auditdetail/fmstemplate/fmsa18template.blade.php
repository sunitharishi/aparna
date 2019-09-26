   <div class="table-responsive">
   <table  border="1" class="afms-reporttable">
                    <thead>
                       <tr>
                          <th>S.No</th>
                          <th>Project Name</th>
                          <th>Date</th>
                          <th>Standard Range-6.5 to 7.8</th>
                          <th>Actuals </th>
                       </tr>
                    </thead>
                    <tbody>
                         <?php  $i = 1; ?>
                         @if (count($auditresult) > 0)
                        @foreach ($auditresult as $kk => $client)
                          @if (count($client) > 0)
                           @foreach ($client as $tt)
                           <?php if(($tt->othser_swim_ph)<6.5 || ($tt->othser_swim_ph)>7.8){ ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td>{{ $sites[$kk] }}</td>
                        <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>
                           <td>6.5 to 7.8</td>
                        <td>{{ $tt->othser_swim_ph }}</td>
                    </tr>
                    <?php $i = $i + 1;  } ?>
                       @endforeach
                       @endif
                        @endforeach
                    @endif  
					<?php //echo $i; ?>    
                    @if($i < 2 || count($auditresult) == 0) 
                        <tr>
                            <td colspan="11">No entries in table</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
        </div>