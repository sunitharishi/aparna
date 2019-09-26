<div class="security-divfor">
<table border="1" class="apms-reporttable">
                    <thead>
                       <tr> 
                          <th>S.No</th>
                          <th>Project Name</th>
                          <th>Date</th>
                          <th>No.of Persons Without shoes</th>
                          <th>Designation</th>
                          <th>Observation</th>
                       </tr>
                    </thead>
                    <tbody>
                         <?php  $i = 1; ?>
                         @if (count($auditresult) > 0)
                        @foreach ($auditresult as $kk => $client)
                          @if (count($client) > 0)
                           @foreach ($client as $tt)
                           <?php if(($tt->ws_guard)>0) { ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td>{{ $sites[$kk] }}</td>
                              <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>
                              <td><?php if(isset($tt->ws_guard))echo $tt->ws_guard; ?></td> 
                              <td>Guard</td>
                              <td>Yes</td>
                           </tr>
                         <?php $i = $i + 1; } ?>
                         <?php if(($tt->ws_lguard)>0) { ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td>{{ $sites[$kk] }}</td>
                              <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>
                              <td><?php if(isset($tt->ws_lguard))echo $tt->ws_lguard; ?></td> 
                              <td>Lady Guard</td>
                              <td>Yes</td>
                           </tr>
                         <?php $i = $i + 1; } ?>
                         <?php if(($tt->ws_hguard)>0) { ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td>{{ $sites[$kk] }}</td>
                              <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>
                              <td><?php if(isset($tt->ws_hguard))echo $tt->ws_hguard; ?></td> 
                              <td>Head Guard</td>
                              <td>Yes</td>
                           </tr>
                         <?php $i = $i + 1; } ?>
                         <?php if(($tt->ws_sup)>0) { ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td>{{ $sites[$kk] }}</td>
                              <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>
                              <td><?php if(isset($tt->ws_sup))echo $tt->ws_sup; ?></td> 
                              <td>Sec Supervisor</td>
                              <td>Yes</td>
                           </tr>
                         <?php $i = $i + 1; } ?>
                         <?php if(($tt->ws_aso)>0) { ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td>{{ $sites[$kk] }}</td>
                              <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>
                              <td><?php if(isset($tt->ws_aso))echo $tt->ws_aso; ?></td> 
                              <td>ASO</td>
                              <td>Yes</td>
                           </tr>
                         <?php $i = $i + 1; } ?>
                         <?php if(($tt->ws_so)>0) { ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td>{{ $sites[$kk] }}</td>
                              <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>
                              <td><?php if(isset($tt->ws_so))echo $tt->ws_so; ?></td> 
                              <td>SO</td>
                              <td>Yes</td>
                           </tr>
                         <?php $i = $i + 1; } ?>
                       @endforeach

                        
                       @endif
                        @endforeach
                        <?php if($i==1)
                        { ?>
                           <tr>
                              <td colspan="11">No Securityguards found without shoes</td>
                          </tr>  
                        <?php } ?>  
                    @else 
                        <tr>
                            <td colspan="11">No Securityguards found without shoes</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
</div>