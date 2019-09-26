<div class="security-divfor">
<table border="1" class="apms-reporttable">
                    <thead>
                       <tr> 
                          <th>S.No</th>
                          <th>Project Name</th>
                          <th>Date</th>
                          <th>No of persons weighing below 50 kgs</th>
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
                           <?php if(($tt->lt50_guard)>0) { ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td>{{ $sites[$kk] }}</td>
                              <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>
                              <td><?php if(isset($tt->lt50_guard))echo $tt->lt50_guard; ?></td> 
                              <td>Guard</td>
                              <td>Yes</td>
                           </tr>
                         <?php $i = $i + 1; } ?>
                         <?php if(($tt->lt50_lguard)>0) { ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td>{{ $sites[$kk] }}</td>
                              <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>
                              <td><?php if(isset($tt->lt50_lguard))echo $tt->lt50_lguard; ?></td> 
                              <td>Lady Guard</td>
                              <td>Yes</td>
                           </tr>
                         <?php $i = $i + 1; } ?>
                         <?php if(($tt->lt50_hguard)>0) { ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td>{{ $sites[$kk] }}</td>
                              <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>
                              <td><?php if(isset($tt->lt50_hguard))echo $tt->lt50_hguard; ?></td> 
                              <td>Head Guard</td>
                              <td>Yes</td>
                           </tr>
                         <?php $i = $i + 1; } ?>
                         <?php if(($tt->lt50_sup)>0) { ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td>{{ $sites[$kk] }}</td>
                              <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>
                              <td><?php if(isset($tt->lt50_sup))echo $tt->lt50_sup; ?></td> 
                              <td>Sec Supervisor</td>
                              <td>Yes</td>
                           </tr>
                         <?php $i = $i + 1; } ?>
                         <?php if(($tt->lt50_aso)>0) { ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td>{{ $sites[$kk] }}</td>
                              <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>
                              <td><?php if(isset($tt->lt50_aso))echo $tt->lt50_aso; ?></td> 
                              <td>ASO</td>
                              <td>Yes</td>
                           </tr>
                         <?php $i = $i + 1; } ?>
                         <?php if(($tt->lt50_so)>0) { ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td>{{ $sites[$kk] }}</td>
                              <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>
                              <td><?php if(isset($tt->lt50_so))echo $tt->lt50_so; ?></td> 
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
                              <td colspan="11">No Securityguards found under 50kgs</td>
                          </tr>  
                        <?php } ?>  
                    @else 
                        <tr>
                            <td colspan="11">No Securityguards found under 50kgs</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
</div>