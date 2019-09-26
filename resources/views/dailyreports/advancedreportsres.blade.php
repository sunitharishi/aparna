        <h4 class="report-headings">DAR Status Report  <span style="font-weight:600;color:#b909c3;"><?php echo date('F', mktime(0, 0, 0, $month, 10));?></span>, <span style="color:#2abb07;font-weight:600;"><?php echo $year; ?></span> <span style="color:red;font-weight:bold;"><?php echo $category; ?></span></h4>
                   <div id="touchHorizScroll" class="wholedailyreportmon" style="vertical-align:top;">
							<table cellpadding="0" cellspacing="0" border="1" width="100%" class="table table-striped table-fixed attend-table advdaily-rport" style="vertical-align:top;">
                       <thead class="fixedtr">
                       <tr>
                         <th style="background-color:#334454;color:#ffd800;">Date</th> <?php for($i=1; $i <=$daycount; $i++){
						       echo '<th>'.$i.'</th>';
						 } ?>   
                      </tr>
                      </thead>
                      <tbody class="fixedbodytr">
						@if (count($sites_attr_names) > 0)
							@foreach ($sites_attr_names as $kk => $client)
							 <?php if($category == 'Fire Safety'){
							    if($kk == 16 || $kk == 8 || $kk == 14 || $kk == 19 ||  $kk == 17) continue;
							 } ?>
							<tr>
								<td>{{ $client }} </td> <?php foreach($res_Status[$kk] as $kb => $temp){ ?>
								  <td> <?php //if($blockstatus[$kk][$kb] ==  1) { echo "bb"; }  //else { ?><i class="fa 
								   <?php if($temp == 'yes') {  if($blockstatus[$kk][$kb] ==  1) { echo "fa-exclamation-triangle"; } else { echo 'fa-check'; } } else { echo 'fa-times'; } ?>
								   " aria-hidden="true"></i><?php //} ?></td>
								<?php } ?>
							</tr>
							@endforeach  
						@endif
                 </tbody>
              </table>
					</div>		 