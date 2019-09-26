
<table class="table-striped1 table dieselreport-table">
    <thead class="thead-dark head-color">
    	<tr>
             <th>DATE</th>
             <th>Power Failure </th>
             <?php if($dpr_status=='Yes') { ?>
             <th>DG Running Hrs</th>
             <?php } ?>
             <th>DG Units</th>
             <th>Diesel Consumed</th>
             <th>Diesel Stock</th>
             <th>Diesel filled</th>
        </tr>
    </thead>
    <tbody>
		   <?php 
                $pwrfailure = '00:00:00';
                $dgunits = 0;
				$dgprunning  = 0;
                $dieselconsume = 0;
                $dieselstock = 0;
                $dieselfilled = 0;
				//echo '<pre>'; print_r($dieselreports); echo '</pre>';
           ?>
         @if (count($dieselreports) > 0)
        	@foreach ($dieselreports as $kk => $dieselreport) 
               <tr>
                    <td><?php echo $dieselreport['reporton']; ?></td> 
                    <td><?php echo $dieselreport['dgset_pwrfailure'];  ?></td> 
                     <?php if($dpr_status=='Yes') { ?>
                    <td><?php echo $dieselreport['dgset_pwrfailure_running'];  ?></td> 
                    <?php } ?>
                    <td><?php echo $dieselreport['dgset_dgunits'];?></td> 
                    <td><?php echo $dieselreport['dset_dieselconsume'];?></td> 
                    <td><?php echo $dieselreport['dgset_dieselstock'];?></td>  
                    <td>
						<?php 
							echo $dieselreport['dgset_dieselfilled'];
							$dgpwrfailure = $dieselreport['dgset_pwrfailure'].':00';
							$pwrfailure =  sum_the_time($pwrfailure, $dgpwrfailure);
							//echo "<br/>".$pwrfailure."<br/>";
							$dgprunning =  (float)$dgprunning+(float)$dieselreport['dgset_pwrfailure_running'];
							$dgunits =  (float)$dgunits+(float)$dieselreport['dgset_dgunits'];
							$dieselconsume = (float) $dieselconsume+(float)$dieselreport['dset_dieselconsume'];
							$dieselfilled =  (float)$dieselfilled+(float)$dieselreport['dgset_dieselfilled'];
						?>
                    </td> 
                </tr>
            
           @endforeach
           <?php //echo exit; ?>
           	    <tr>
                	<td>Total</td>
                    <td><?php $tpower = explode(":",$pwrfailure); echo $tpower[0].":".$tpower[1]; ?></td> 
                     <?php if($dpr_status=='Yes') { ?>
                    <td><?php echo $dgprunning; ?></td> 
                    <?php } ?>
                    <td><?php echo $dgunits; ?></td> 
                    <td><?php echo $dieselconsume; ?></td> 
                    <td></td> 
                    <td><?php echo $dieselfilled; ?></td>
                </tr>
        @else
        <tr>
        	<td colspan="6">
            	Data Not Entered
            </td>
        </tr>
        @endif
    </tbody>
</table>