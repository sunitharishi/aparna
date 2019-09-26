<div class="security-divfor">
<table border="1" class="apms-reporttable">
                    <thead>
                       <tr> 
                          <th>S.No</th>
                          <th>Project Name</th>
                          <th>Date</th>
                          <th>No.of Persons Knows Fire Fighting</th>
                          <th>Designation</th>
                       </tr>
                    </thead>
                    <tbody>
                         <?php  $i = 1; ?>
                         @if (count($auditresult) > 0)
                        @foreach ($auditresult as $kk => $client)
                          @if (count($client) > 0)
                           @foreach ($client as $tt)
                           <?php if(($tt->kff_guard)>0) { ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td>{{ $sites[$kk] }}</td>
                              <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>
                              <td><?php if(isset($tt->kff_guard))echo $tt->kff_guard; ?></td> 
                              <td>Guard</td>
                           </tr>
                         <?php $i = $i + 1; } ?>
                         <?php if(($tt->kff_lguard)>0) { ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td>{{ $sites[$kk] }}</td>
                              <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>
                              <td><?php if(isset($tt->kff_lguard))echo $tt->kff_lguard; ?></td> 
                              <td>Lady Guard</td>
                           </tr>
                         <?php $i = $i + 1; } ?>
                         <?php if(($tt->kff_hguard)>0) { ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td>{{ $sites[$kk] }}</td>
                              <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>
                              <td><?php if(isset($tt->kff_hguard))echo $tt->kff_hguard; ?></td> 
                              <td>Head Guard</td>
                           </tr>
                         <?php $i = $i + 1; } ?>
                         <?php if(($tt->kff_sup)>0) { ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td>{{ $sites[$kk] }}</td>
                              <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>
                              <td><?php if(isset($tt->kff_sup))echo $tt->kff_sup; ?></td> 
                              <td>Sec Supervisor</td>
                           </tr>
                         <?php $i = $i + 1; } ?>
                         <?php if(($tt->kff_aso)>0) { ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td>{{ $sites[$kk] }}</td>
                              <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>
                              <td><?php if(isset($tt->kff_aso))echo $tt->kff_aso; ?></td> 
                              <td>ASO</td>
                           </tr>
                         <?php $i = $i + 1; } ?>
                         <?php if(($tt->kff_so)>0) { ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td>{{ $sites[$kk] }}</td>
                              <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>
                              <td><?php if(isset($tt->kff_so))echo $tt->kff_so; ?></td> 
                              <td>SO</td>
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