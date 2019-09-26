   <div class="table-responsive">
   <table  border="1" class="afms-reporttable">
                    <thead>
                       <tr>
                           <th rowspan="2" style="text-align:center;">S.No</th>
                          <th rowspan="2" style="text-align:center;">Site</th>
                          <th rowspan="2" style="text-align:center;">Date</th>
                            <th colspan="3" style="text-align:center;color:#FFF;font-weight: bold;">
                                 CTPT
                            </th>
                            <th colspan="3" style="text-align:center;color:#FFF;font-weight: bold;">
                                 LT
                            </th>
                            <th colspan="3" style="text-align:center;color:#FFF;font-weight: bold;">
                                 LOSS
                            </th>
                       </tr>
                       <tr>
                         
                          <th style="text-align:center;">Opening</th>
                          <th style="text-align:center;">Closing  Reading</th>
                          <th style="text-align:center;">Consumption for the day</th>
                          <th style="text-align:center;">Opening</th>
                          <th style="text-align:center;">Closing Reading</th>
                          <th style="text-align:center;">Consumption for the day</th>
                          <th style="text-align:center;">Standard Loss</th>
                          <th style="text-align:center;">Actual Loss(In usints)</th>
                          <th style="text-align:center;">Variance</th>
                       </tr>
                    </thead>
                    <tbody>
                    <?php  $i = 1; ?>
                         @if (count($auditresult) > 0)
                        @foreach ($auditresult as $kk => $client)
                         @if (count($client) > 0)
                           @foreach ($client as $tt)
                           <?php //echo "<pre>"; print_r($tt); echo "</pre>"; exit; ?>
                      <tr>
                        <td style="text-align:center;"><?php echo $i; ?></td>
                        <td style="text-align:center;" style="text-align:center;"><?php echo $tt['site'];?></td>
                        <td style="text-align:center;"><?php echo date("d-m-Y", strtotime($tt['reporton'])); ?></td>
                        <td style="text-align:center;"><?php echo $tt['opening']; ?></td>
                        <td style="text-align:center;"><?php echo $tt['closing']; ?></td>
                        <td style="text-align:center;"><?php echo $tt['consumption']; ?></td>
                        <td style="text-align:center;"><?php echo $tt['openinglt']; ?></td>
                        <td style="text-align:center;"><?php echo $tt['closinglt']; ?></td>
                        <td style="text-align:center;"><?php echo $tt['consumptionlt']; ?></td>
                        <td style="text-align:center;"><?php echo $tt['sloss']; ?></td>
                        <td style="text-align:center;"><?php echo $tt['aloss']; ?></td>
                        <td style="text-align:center;"><?php echo $tt['variance']; ?></td>
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