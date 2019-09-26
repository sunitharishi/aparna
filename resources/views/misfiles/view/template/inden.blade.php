  

   <table width="100%" border="1" cellspacing="0">
                        <tbody>
                          <tr>
                           <th colspan="15" style="font-size:15px;text-align:center;background-color:#2f4050;color:#fff;"> Project Name : <?php echo $sitename; ?> &nbsp;&nbsp;&nbsp; <span style="color:#ffd800;"><?php 
$monthName = date("F", mktime(0, 0, 0, $report_month, 10));
echo $monthName;?> - <?php echo $report_year;?> </span> </th>
                          </tr>
                      <tr style="background-color:#e9c085;"> 
                        <th >PR Nos</th>
                        <th >PR Date </th>
                        <th >Item Code</th>
                        <th >Item  Desc</th>
                        <th >UOM</th>
                        <th > PR Qty </th>
                        <th > PO No </th>
                        <th>PO Date</th>
                        <th > Lead Time of days </th>
                        <th > Date of Submission </th>
                        <th > Date Form Submission </th>
                        <th > Lagged Time Up to <?php echo $laaggeddate; ?></th>
                      </tr>
                             
						      @if (count($res) > 0)

                        @foreach ($res as $record)
                             <tr>
								<td><span><?php echo  $record['pr_nos'];?></span></td>
								<td><span><?php echo  $record['pr_date'];?></span></td>
								<td><span><?php echo  $record['item_code'];?></span></td>
								<td><span><?php echo  $record['item_desc'];?></span></td>
								<td><span><?php echo  $record['uom'];?></span></td>
								<td><span><?php echo  $record['pr_qty'];?></span></td>
								<td><span><?php echo  $record['po_no'];?></span></td>
								<td><span><?php echo  $record['po_date'];?></span></td>
								<td><span><?php echo  $record['lead_time_of_days'];?></span></td>
								<td><span><?php echo  $record['date_of_submission'];?></span></td>
								<td><span><?php echo  $record['days_from_submission'];?></span></td>
								<td><span><?php echo  $record['lagged_time_upto'];?></span></td>
                            </tr>
                          
						    @endforeach   

                    @else

                        <tr>

                            <td colspan="12">No entries in table</td>

                        </tr>

                    @endif
                            
                            
                          
                         </tbody>
                      </table>