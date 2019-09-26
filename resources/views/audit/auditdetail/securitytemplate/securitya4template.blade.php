<div class="security-divfor">
<table border="1" class="apms-reporttable">
                    <thead>
                       <tr> 
                          <th>S.No</th>
                          <th>Project Name</th>
                          <th>Date</th>
                          <th>Tabs</th>
                          <th>Whistles</th>
                          <th>Batons</th>
                          <th>Rain.C</th>
                          <th>Umbrellas</th>
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
                              <td><?php if(isset($tt->av_tab) && $tt->av_tab>0) echo ltrim($tt->av_tab, '0'); else echo '0'; ?> 
                              <?php if(isset($tt->av_tabs)) echo "/ ". $tt->av_tabs; ?></td> 
                              <td><?php if(isset($tt->av_whi) && $tt->av_whi>0) echo ltrim($tt->av_whi, '0');  else echo '0';  ?>
                                <?php if(isset($tt->av_whistles)) echo "/ ". $tt->av_whistles; ?>
                              </td>
                              <td><?php if(isset($tt->av_bat) && $tt->av_bat>0) echo ltrim($tt->av_bat, '0');  else echo '0';  ?>
                                <?php if(isset($tt->av_batons)) echo "/ ". $tt->av_batons; ?>
                              </td>
                              <td><?php if(isset($tt->av_rai) && $tt->av_rai>0) echo ltrim($tt->av_rai, '0');  else echo '0';  ?>
                                <?php if(isset($tt->av_rain_c)) echo "/ ". $tt->av_rain_c; ?>
                              </td>
                              <td><?php if(isset($tt->av_umb) && $tt->av_umb>0) echo ltrim($tt->av_umb, '0');  else echo '0';  ?>
                                <?php if(isset($tt->av_umbrellas)) echo "/ ". $tt->av_umbrellas; ?>
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