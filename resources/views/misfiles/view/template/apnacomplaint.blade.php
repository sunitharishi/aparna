<table width="100%" border="1" cellspacing="0">
                        <tbody>
                          <tr>
                           <th colspan="8" style="font-size:15px;text-align:center;background-color:#2f4050;color:#fff;"><?php echo $sitename; ?></th>
                          </tr>
                          <tr>
                           <th colspan="8" style="font-size:15px;text-align:center;background-color:#e9c085;"><?php 
$monthName = date("F", mktime(0, 0, 0, $report_month, 10));
echo $monthName;?> - <?php echo $report_year;?> </th>
                          </tr>
                      <tr style="background-color:#a99f91;">
                       
                        <th >Complaint Category</th>
                        <th >Previous Pending</th>
                        <th >Opened</th>
                        <th >Resolved</th>
                        <th >Total Outstanding </th>
                        <th > No Escalation </th>
                        <th > Escalated to L2</th>
                        <th > Escalated to L3</th> 
                        
                       </tr>
                        
						      @if (count($res) > 0)
 
                        @foreach ($res as $record)
                          
                             <tr>
                       <td><span><?php echo  $record['complaint_category'];?></span></td>
                       <td><span><?php echo  $record['previous_pending'];?></span></td>
                       <td><span><?php echo  $record['opened'];?></span></td>
                       <td><span><?php echo  $record['resolved'];?></span></td>
                       <td><span><?php echo  $record['total_outstanding'];?></span></td>
                       <td><span><?php echo  $record['no_escalation'];?></span></td>
                       <td><span><?php echo  $record['escalated_to_l2'];?></span></td>
                       <td><span><?php echo  $record['escalated_to_l3'];?></span></td>
                       
                            </tr>
                          
                      @endforeach   

                    @else

                          <tr>

                            <td colspan="12">No entries in table</td>

                        </tr>

                    @endif  
                            
                          
                         </tbody>
                      </table>