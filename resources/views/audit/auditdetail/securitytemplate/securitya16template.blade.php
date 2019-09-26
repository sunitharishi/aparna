<div class="security-divfor">
<table border="1" class="apms-reporttable">
                    <thead>
                       <tr> 
                          <th>S.No</th>
                          <th>Project Name</th>
                          <th>Date</th>
                          <th>No. of persons employed below 20 years</th>
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
                           <?php if(($tt->lt20_guard)>0) { ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td>{{ $sites[$kk] }}</td>
                              <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>
                              <td><?php if(isset($tt->lt20_guard))echo $tt->lt20_guard; ?></td> 
                              <td>Guard</td>
                              <td>Yes</td>
                           </tr>
                         <?php $i = $i + 1; } ?>
                         <?php if(($tt->lt20_lguard)>0) { ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td>{{ $sites[$kk] }}</td>
                              <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>
                              <td><?php if(isset($tt->lt20_lguard))echo $tt->lt20_lguard; ?></td> 
                              <td>Lady Guard</td>
                              <td>Yes</td>
                           </tr>
                         <?php $i = $i + 1; } ?>
                         <?php if(($tt->lt20_hguard)>0) { ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td>{{ $sites[$kk] }}</td>
                              <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>
                              <td><?php if(isset($tt->lt20_hguard))echo $tt->lt20_hguard; ?></td> 
                              <td>Head Guard</td>
                              <td>Yes</td>
                           </tr>
                         <?php $i = $i + 1; } ?>
                         <?php if(($tt->lt20_sup)>0) { ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td>{{ $sites[$kk] }}</td>
                              <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>
                              <td><?php if(isset($tt->lt20_sup))echo $tt->lt20_sup; ?></td> 
                              <td>Sec Supervisor</td>
                              <td>Yes</td>
                           </tr>
                         <?php $i = $i + 1; } ?>
                         <?php if(($tt->lt20_aso)>0) { ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td>{{ $sites[$kk] }}</td>
                              <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>
                              <td><?php if(isset($tt->lt20_aso))echo $tt->lt20_aso; ?></td> 
                              <td>ASO</td>
                              <td>Yes</td>
                           </tr>
                         <?php $i = $i + 1; } ?>
                         <?php if(($tt->lt20_so)>0) { ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td>{{ $sites[$kk] }}</td>
                              <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>
                              <td><?php if(isset($tt->lt20_so))echo $tt->lt20_so; ?></td> 
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
                              <td colspan="11">No Securityguards found below 20years</td>
                          </tr>  
                        <?php } ?>  
                    @else 
                        <tr>
                            <td colspan="11">No Securityguards found below 20years</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
                </div>