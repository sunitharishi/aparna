  <table   border="1" class="apms-reporttable">
                    <thead>
                       <tr>
                          <th>S.No</th>
                          <th>Project Name</th>
                          <th>Date</th>
                          <th>Ride</th>
                       </tr>
                    </thead>
                     <?php  $i = 1; ?>
                    <tbody>
                    @if (count($garbageresult) > 0)
                    @foreach ($garbageresult as $kk => $client)
                      <tr>
                         <td><?php echo $i; ?></td>
                        <td>{{ $client['site'] }}</td>
                        <td>{{ $client['report_on'] }}</td>
                        <td>Ride Done  less than Four and Half hours</td>
                      </tr>
                       <?php $i = $i + 1; ?>
                     @endforeach 
                      @else 
                        <tr>
                            <td colspan="3">No entries in table</td>
                        </tr>
                    @endif
                    </tbody>
                </table> 