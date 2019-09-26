<div class="security-divfor">
<table border="1" class="apms-reporttable">
                    <thead>
                       <tr> 
                          <th>S.No</th>
                          <th>Project Name</th>
                          <th>Date</th>
                          <th>No.of Persons Without Uniform</th>
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
                           <?php if(($tt->wu_guard)>0) { ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td>{{ $sites[$kk] }}</td>
                              <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>
                              <td><?php if(isset($tt->wu_guard))echo $tt->wu_guard; ?></td> 
                              <td>Guard</td>
                              <td>Yes</td>
                           </tr>
                         <?php $i = $i + 1; } ?>
                         <?php if(($tt->wu_lguard)>0) { ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td>{{ $sites[$kk] }}</td>
                              <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>
                              <td><?php if(isset($tt->wu_lguard))echo $tt->wu_lguard; ?></td> 
                              <td>Lady Guard</td>
                              <td>Yes</td>
                           </tr>
                         <?php $i = $i + 1; } ?>
                         <?php if(($tt->wu_hguard)>0) { ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td>{{ $sites[$kk] }}</td>
                              <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>
                              <td><?php if(isset($tt->wu_hguard))echo $tt->wu_hguard; ?></td> 
                              <td>Head Guard</td>
                              <td>Yes</td>
                           </tr>
                         <?php $i = $i + 1; } ?>
                         <?php if(($tt->wu_sup)>0) { ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td>{{ $sites[$kk] }}</td>
                              <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>
                              <td><?php if(isset($tt->wu_sup))echo $tt->wu_sup; ?></td> 
                              <td>Sec Supervisor</td>
                              <td>Yes</td>
                           </tr>
                         <?php $i = $i + 1; } ?>
                         <?php if(($tt->wu_aso)>0) { ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td>{{ $sites[$kk] }}</td>
                              <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>
                              <td><?php if(isset($tt->wu_aso))echo $tt->wu_aso; ?></td> 
                              <td>ASO</td>
                              <td>Yes</td>
                           </tr>
                         <?php $i = $i + 1; } ?>
                         <?php if(($tt->wu_so)>0) { ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td>{{ $sites[$kk] }}</td>
                              <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>
                              <td><?php if(isset($tt->wu_so))echo $tt->wu_so; ?></td> 
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
                              <td colspan="11">No Securityguards found without uniform</td>
                          </tr>  
                        <?php } ?>  
                    @else 
                        <tr>
                            <td colspan="11">No Securityguards found without uniform</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
</div>