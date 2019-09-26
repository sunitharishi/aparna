    <div class="table-responsive">
      <table   border="1" class="apms-reporttable">
                    <thead>
                       <tr>
                          <th>S.No</th>
                          <th>Project Name</th>
                          <th>Club House Area( sft)</th>
                          <th>Calnder Month</th>
						  <th>Total Power consumption</th>
						  <th>Power consumption per sft</th>
                       </tr>
                    </thead>
                     <?php  $i = 1; ?>
                    <tbody>
                    @if (count($garbageresult) > 0)
                    @foreach ($garbageresult as $kk => $client)
                      <tr>
                         <td><?php echo $i; ?></td>
                        <td>{{ $client['site'] }}</td>
                        <td>{{ $client['area'] }}</td>
                        <td>{{ $client['caldate'] }}</td>
                        <td>{{ $client['pwrunits'] }}</td>
                        <td>{{ $client['pwrconsumptio'] }}</td>
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
                </div>