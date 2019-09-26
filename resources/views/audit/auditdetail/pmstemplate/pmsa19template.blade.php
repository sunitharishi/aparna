 <table   border="1" class="apms-reporttable">
                    <thead>
                       <tr>
                          <th>S.No</th>
                          <th>Project Name</th>
                          <th>Date</th>
                          <th>Occupancy</th>
                          <th>Nof Users(Gym)</th>
                          <th>Nof Users(Badminton)</th>
                          <th>Nof Users(S Pool)</th>
                          <th>Nof Users(Tennis)</th>
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
                        <td>{{ (float)$client['occupancy_asdate_owners'] +  (float)$client['occupancy_asdate_tenants'] }}</td>
                        <td>{{ $client['clbhous_users_gym'] }}</td>
                        <td>{{ $client['clbhous_shuttle'] }}</td>
                        <td>{{ $client['clbhous_users_pool'] }}</td>
                        <td>{{ $client['clbhous_users_tennis'] }}</td>
                      </tr>
                       <?php $i = $i + 1; ?>
                     @endforeach 
                      @else 
                        <tr>
                            <td colspan="7">No entries in table</td>
                        </tr>
                    @endif
                    </tbody>
                </table>