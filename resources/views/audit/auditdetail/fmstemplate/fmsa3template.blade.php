               <table  border="1" class="afms-reporttable">
                    <thead>
                       <tr>
                          <th>S.No</th>
                          <th>Project Name</th>
                          <th>Date</th>
                          <th> LT</th>
                          <th>Solar Power Units</th>
                          <th>DG Units</th>
                          <th>Residents</th>
                          <th>Club House</th>
                          <th>STP</th>
                          <th>WSP</th>
                          <th>Lifts</th>
                          <th>Vendors</th>
                          <th>Comman Area</th>
                          <th>Others</th>
                          <th>Variance</th>
                          <th>% of Loss</th>
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
                        <td><p class="singleline"><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></p></td>
                        <td>{{ $tt->pwr_tot_lt }}</td>
                        <td>{{ $tt->pwr_solarpwrunits }}</td>
                        <td>{{ $tt->dgset_dgunits }}</td>
                        <td>{{ $tt->pwr_residents }}</td>
                        <td>{{ $tt->pwr_club_house }}</td>
                        <td>{{ $tt->pwr_stp }}</td>
                        <td>{{ $tt->pwr_wsp }}</td>
                        <td>{{ $tt->pwr_lifts }}</td>
                        <td>{{ $tt->pwr_vendors }}</td>
                        <td>{{ $tt->pwr_common_area }}</td>
                        <td>{{ $tt->pwr_others }}</td>
                        <td>{{ $tt->pwr_others }}</td>
                        <td>{{ $tt->pwr_others }}</td>
                        <td>{{ $tt->pwr_others }}</td>  
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