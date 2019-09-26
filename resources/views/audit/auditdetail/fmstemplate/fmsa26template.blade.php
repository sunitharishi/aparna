    <div class="table-responsive">
     <table  border="1" class="afms-reporttable">
                    <thead>
                       <tr bgcolor="#000033">
                       		<td colspan="17" align="center" style="color:#FFFFFF; height:30px;">
                            	<b>Total of LT is not equelling to sum of Residents+ Club House +STP+WSP+Lifts+Vendors+comman area+Others- Solar Power Units generated</b>
                            </td>
                       </tr>
                       <tr>
                          <th>S.No</th>
                          <th>Site</th>
                          <th>Date</th>
                          <th>LT</th>
                          <th>Solar Power Units</th>
                          <th>DG Units</th>
                          <th>Residents</th>
                          <th>Club House</th>
                          <th>STP</th>
                          <th>WSP</th>
                          <th>Lifts</th>
                          <th>Vendors</th>
                          <th>Comman Area</th>
                          <th>Others</th>
                          <th>Variance</th>
                          <th>% of Loss</th>
                       </tr>
                    </thead>
                    <tbody>
                         <?php  
						 	$i = 1; $sum = 0;
						  ?>
                         @if (count($auditresult) > 0)
                        @foreach ($auditresult as $kk => $client)
                          @if (count($client) > 0)
                           @foreach ($client as $tt)
                           <?php 
						   		$pwr_club_house = (int)$tt->pwr_club_house;
								$pwr_stp = (int)$tt->pwr_stp;
								$pwr_wsp = (int)$tt->pwr_wsp;
								$pwr_lifts = (int)$tt->pwr_lifts;
								$pwr_vendors = (int)$tt->pwr_vendors;
								$pwr_common_area = (int)$tt->pwr_common_area;
								$pwr_others = (int)$tt->pwr_others;
								
								if($pwr_club_house>0) $pattendance = $sum+$pwr_club_house;
								if($pwr_stp>0) $pattendance = $sum+$pwr_stp;
								if($pwr_wsp>0) $pattendance = $sum+$pwr_wsp;
								if($pwr_lifts>0) $pattendance = $sum+$pwr_lifts;
								if($pwr_vendors>0) $pattendance = $sum+$pwr_vendors;
								if($pwr_common_area>0) $pattendance = $sum+$pwr_common_area;
								if($pwr_others>0) $pattendance = $sum+$pwr_others;	
											
						   		$datefilter =  date("d-m-Y", strtotime($tt->reporton));
								$D4 =  $tt->pwr_tot_lt;
								$E4 =  $tt->pwr_solarpwrunits;
								//$sum = $tt->pwr_residents +  $tt->pwr_club_house + $tt->pwr_stp + $tt->pwr_wsp + $tt->pwr_lifts + $tt->pwr_vendors + $tt->pwr_common_area + $tt->pwr_others;
								$variance = (int)$D4-(int)$sum+(int)$E4;
								if($variance>0) {
								 $loss = $variance/($D4+$E4);
								 $loss = round($loss,2);
								 $loss = $loss * 100;
								}
								else $loss = 0;
						   ?>
                           
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td>{{ $sites[$kk] }}</td>
                        <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>
                        <td>{{ $tt->pwr_tot_lt }}</td>
                        <td><?php if(isset($tt->pwr_solarpwrunits))echo $tt->pwr_solarpwrunits; ?></td>
                        <td><?php if(isset($tt->dgset_dgunits))echo $tt->dgset_dgunits; ?></td>
                        <td><?php if(isset($tt->pwr_residents))echo $tt->pwr_residents; ?></td>
                        <td><?php if(isset($tt->pwr_club_house))echo $tt->pwr_club_house; ?></td>
                        <td><?php if(isset($tt->pwr_stp))echo $tt->pwr_stp; ?></td>
                        <td><?php if(isset($tt->pwr_wsp))echo $tt->pwr_wsp; ?></td>
                        <td><?php if(isset($tt->pwr_lifts))echo $tt->pwr_lifts; ?></td>
                        <td><?php if(isset($tt->pwr_vendors))echo $tt->pwr_vendors; ?></td>
                        <td><?php if(isset($tt->pwr_common_area))echo $tt->pwr_common_area; ?></td>
                        <td><?php if(isset($tt->pwr_others))echo $tt->pwr_others; ?></td>
                        <td><?php echo $variance; ?></td>
                        <td><?php echo $loss; ?>%</td>
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