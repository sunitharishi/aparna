             <div class="table-reponsive">

             <table   border="1" class="apms-reporttable pms-attendance-scaping {{ count($auditresult) > 0 ? 'datatable' : '' }}">

                    <thead>

                       <tr>

                          <th>S.No</th>

                          <th>Project Name</th>

                          <th>Date</th>

                          <th>Standard Deployment 100%</th>

                          <th>Standard Deployment 80%</th>

                          <th>Actual Deployment</th>

                          <th>Short Deployment</th>

                          <th>Observation</th>

                       </tr>

                    </thead>

                       <tbody>

                         <?php  $i = 1; ?>

                         @if (count($auditresult) > 0)

                        @foreach ($auditresult as $kk => $client)

                          @if (count($client) > 0)

                           @foreach ($client as $tt)
						   
						   <?php
						   		if(isset($valid_sup[$kk])) $valid_sup[$kk] = $valid_sup[$kk]; else $valid_sup[$kk] = 0;
								if(isset($valid_help[$kk])) $valid_help[$kk] = $valid_help[$kk]; else $valid_help[$kk] = 0;
						   ?>

                      <tr>

                        <td><?php echo $i; ?></td>

                        <td>{{ $sites[$kk] }}</td>

                        <td><?php echo date("d-m-Y", strtotime($tt->reporton)); ?></td>

                        <td><?php echo (int)$valid_sup[$kk] + (int)$valid_help[$kk];  ?></td>

                        <td>&nbsp;</td>

                         <td><?php echo (int)$tt->land_atten_sup + (int)$tt->land_atten_helper; ?>

                         <td>&nbsp;</td>

                           <td></td>

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