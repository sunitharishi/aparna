<div class="security-divfor">
<table border="1" class="apms-reporttable">
                    <thead>
                       <tr> 
                          <th>S.No</th>
                          <th>Project Name</th>
                          <th>Date</th>
                          <th>No of persons height less than 5' 2''</th>
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
                           <?php if(($tt->lt52_guard)>0) { ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td>{{ $sites[$kk] }}</td>
                              <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>
                              <td><?php if(isset($tt->lt52_guard))echo $tt->lt52_guard; ?></td> 
                              <td>Guard</td>
                              <td>Yes</td>
                           </tr>
                         <?php $i = $i + 1; } ?>
                         <?php if(($tt->lt52_lguard)>0) { ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td>{{ $sites[$kk] }}</td>
                              <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>
                              <td><?php if(isset($tt->lt52_lguard))echo $tt->lt52_lguard; ?></td> 
                              <td>Lady Guard</td>
                              <td>Yes</td>
                           </tr>
                         <?php $i = $i + 1; } ?>
                         <?php if(($tt->lt52_hguard)>0) { ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td>{{ $sites[$kk] }}</td>
                              <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>
                              <td><?php if(isset($tt->lt52_hguard))echo $tt->lt52_hguard; ?></td> 
                              <td>Head Guard</td>
                              <td>Yes</td>
                           </tr>
                         <?php $i = $i + 1; } ?>
                         <?php if(($tt->lt52_sup)>0) { ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td>{{ $sites[$kk] }}</td>
                              <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>
                              <td><?php if(isset($tt->lt52_sup))echo $tt->lt52_sup; ?></td> 
                              <td>Sec Supervisor</td>
                              <td>Yes</td>
                           </tr>
                         <?php $i = $i + 1; } ?>
                         <?php if(($tt->lt52_aso)>0) { ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td>{{ $sites[$kk] }}</td>
                              <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>
                              <td><?php if(isset($tt->lt52_aso))echo $tt->lt52_aso; ?></td> 
                              <td>ASO</td>
                              <td>Yes</td>
                           </tr>
                         <?php $i = $i + 1; } ?>
                         <?php if(($tt->lt52_so)>0) { ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td>{{ $sites[$kk] }}</td>
                              <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>
                              <td><?php if(isset($tt->lt52_so))echo $tt->lt52_so; ?></td> 
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
                              <td colspan="11">No Securityguards found less than 5' 2'' height</td>
                          </tr>  
                        <?php } ?>  
                    @else 
                        <tr>
                            <td colspan="11">No Securityguards found less than 5' 2'' height/td>
                        </tr>
                    @endif
                    </tbody>
                </table>
</div>