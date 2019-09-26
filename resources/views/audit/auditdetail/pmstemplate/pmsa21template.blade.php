           <div class="table-responsive">
              <table width="100%" border="1" cellspacing="0" class="apms-reporttable">
                        <thead>
                          <tr>
                           <th colspan="19" style="font-size:15px;text-align:center;"> Installed capacity Vs Maximum recorded demand (load)<span></span></th>
                          </tr>
                      <tr>
					  
							<th  rowspan="2">S.No1</th>
							<th rowspan="2"> Project Name </th>
							<th   rowspan="2">No. of Units</th>
							<th  rowspan="2">Occupancy </th>
							<th   rowspan="2">Occupancy in %</th>
							<th   colspan="2">CMD in KVA</th>
							<th  colspan="2">RMD in KVA</th>
							<th   colspan="3">Transformer Capacity (KVA)</th>
							<th   colspan="4">DG Set Capacity (KVA)</th>
							<th   rowspan="2">Service No.</th>
							<th   rowspan="2">Peak Load recorded in Month</th>
							<th   rowspan="2">Remarks</th>
						  
					</tr>
					<tr>
						<th>Total</th>
						<th>Per Flat</th>
						<th> Total</th>
						<th> Per Flat</th>
						<th>Total</th>
						<th>Per Flat</th>
						<th>Load % on tranformer</th>
						<th>Total</th>
						<th>Per Flat</th>
						<th>Load % on DG</th>
						<th>DG Backup</th>
                    </tr>
                          
					</thead>
					<tbody>
						  @if (count($sites) > 0) <?php $i = 0; ?>
                        @foreach ($sites as $key => $site)
						 <?php $i = $i + 1; ?>
                              <tr>
						 <td style="text-align:center;"><b><?php  echo $i;   ?></b></td>  
                         <td class="sboteheight"><b><?php  echo $site;   ?></b></td> 
                        <td class="text-center"><b> <?php  if(isset($flats[$key])) {  echo  $flats[$key]; }?></b></td> 
						
						<td> <?php  if(isset($occupency[$key]['occupency'])) echo $occupency[$key]['occupency']; ?> </td>
						<td><?php if(isset($occupency[$key]['occupency']) && isset($flats[$key])){ if((int)$flats[$key] > 0) {
						     echo round(($occupency[$key]['occupency']/$flats[$key]),2) * 100; echo "%";
						} }  ?></td> 
						<td> <?php  if(isset($cmdkva[$key])) echo $cmdkva[$key]; ?> </td>
						<td><?php if(isset($cmdkva[$key]) && isset($flats[$key])){ if((int)$flats[$key] > 0) {
						     echo round((float)((float)$cmdkva[$key]/(int)$flats[$key]),2);
						} }  ?></td> 
						<td> <?php  if(isset($existing[$key]['total_rmd'])) echo $existing[$key]['total_rmd']; ?> </td>
						<td><?php if(isset($existing[$key]['total_rmd']) && isset($occupency[$key]['occupency'])) {
						    if((float)$occupency[$key]['occupency'] > 0) {
						     echo round((float)((float)$existing[$key]['total_rmd']/$occupency[$key]['occupency']),2);
						} } ?></td> 
						<td> <?php  if(isset($transforkva[$key])) echo $transforkva[$key]; ?> </td> 
						<td> <?php if(isset($transforkva[$key]) && isset($flats[$key])) { if((int)$flats[$key] > 0) {
 						     echo round((float)((float)$transforkva[$key]/(int)$flats[$key]),2);
						} } ?></td>
						<td> <?php if(isset($existing[$key]['total_rmd']) && isset($transforkva[$key])) { 
						     if((float)($transforkva[$key]) > 0) {
						     echo round((float)((float)$existing[$key]['total_rmd']/(float)$transforkva[$key]),2) * 100; echo "%";
						} }  ?></td>
						<td> <?php  if(isset($dg_kva[$key])) echo $dg_kva[$key]; ?> </td>
						<td><?php if(isset($dg_kva[$key])  && isset($flats[$key])){  if((int)$flats[$key] > 0) {
						     echo round((float)((float)$dg_kva[$key]/$flats[$key]),2);
						}  } ?></td> 
						<td><?php if(isset($existing[$key]['total_rmd']) && isset($transforkva[$key])) {  if ((float)$dg_kva[$key] > 0) {
						     echo round((float)((float)$existing[$key]['total_rmd']/(float)$dg_kva[$key]),2) * 100;echo "%";
						} } ?></td> 
						<td> <?php   if(isset($backup[$key])) { echo  $backup[$key]; }  ?></td> 
						   
						<td> <?php  if(isset($service_numb[$key])) echo $service_numb[$key]; ?> </td>
						<td> <?php  if(isset($existing[$key]['peak_load_record'])) echo $existing[$key]['peak_load_record']; ?> </td>
						<td> <?php  if(isset($existing[$key]['remarks'])) echo $existing[$key]['remarks']; ?> </td>
						
                      
					    </tr>    
							    
							 @endforeach
							   
							 @endif
                              
                          
                        </tbody>
                      </table> 
                      </div>