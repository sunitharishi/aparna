       <table  border="1" class="apms-reporttable">
                    <thead>
                       <tr>
                            <th>S.No</th>
                            <th>Project Name</th>
                            <th>Date & Time of Submission</th>
                            <th>Last Updated</th>
                            <th>Date</th>
                            <th>Remarks</th>
                       </tr>
                    </thead>
                <tbody>
                    <?php  $i = 1; ?>
                         @if (count($rows) > 0)
                       <?php //echo "< pre>"; print_r($rows); echo "</pre>"; exit;?>
                        @foreach ($rows as $client)
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $client['site']; ?></td>
                        <td><?php echo $client['cdate']; ?></td>
                        <td><?php echo $client['udate']; ?></td>
                        <td><?php echo $client['rdate']; ?></td>
                        <td><?php echo $client['msg']; ?></td>
                      </tr> 
                       @endforeach
                        <?php //exit; ?>  
                    @else 
                        <tr>
                            <td colspan="6">No entries in table</td>
                        </tr>
                    @endif
                    </tbody>
                </table>