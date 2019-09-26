<div class="security-divfor">
<table border="1" class="apms-reporttable">
                    <thead>
                       <tr> 
                          <th>S.No</th>
                          <th>Project Name</th>
                          <th>Date</th>
                          <th>CCTV</th>
                          <th>Boom.B</th>
                          <th>W.T</th>
                          <th>Torches</th>
                          <th>Bio.M.</th>
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
                              <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>
                              <td><?php if(isset($tt->nw_cctv) && $tt->nw_cctv>0) echo ltrim($tt->nw_cctv, '0'); else echo '0'; ?> 
                              <?php if(isset($tt->cctv)) echo "/ ". $tt->cctv; ?></td> 
                              <td><?php if(isset($tt->nw_boom) && $tt->nw_boom>0) echo ltrim($tt->nw_boom, '0');  else echo '0';  ?>
                                <?php if(isset($tt->boombarrier)) echo "/ ". $tt->boombarrier; ?>
                              </td>
                              <td><?php if(isset($tt->nw_wt) && $tt->nw_wt>0) echo ltrim($tt->nw_wt, '0');  else echo '0';  ?>
                                <?php if(isset($tt->wt)) echo "/ ". $tt->wt; ?>
                              </td>
                              <td><?php if(isset($tt->nw_torch) && $tt->nw_torch>0) echo ltrim($tt->nw_torch, '0');  else echo '0';  ?>
                                <?php if(isset($tt->torches)) echo "/ ". $tt->torches; ?>
                              </td>
                              <td><?php if(isset($tt->nw_bio) && $tt->nw_bio>0) echo ltrim($tt->nw_bio, '0');  else echo '0';  ?>
                                <?php if(isset($tt->biomachine)) echo "/ ". $tt->biomachine; ?>
                              </td>
                           </tr>
                           <?php  $i++; ?>
                       @endforeach
                       @endif
                        @endforeach
                    @else 
                        <tr>
                            <td colspan="11">No Securityguards found without uniform</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
</div>