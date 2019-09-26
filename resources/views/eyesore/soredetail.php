<div class="table-responsive">
                 <table id="dTableColSearch" class="table datatable table-bordered table-striped emploiyee-table {{ count($auditresult) > 0 ? 'dTableColSearch' : '' }} dt-select">  



                    <thead class="head-color">



                       <tr>



                          <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>

						  <th>S.NO</th>

                          <th>Site</th>

                          <th>Description</th>

                          <th>Location</th>

                          <th>Before</th>
						  
						  <th>After</th>
						  
						  <th>State Date</th>

                          <th>End Date</th>

                          <th>Status</th>

                          <th style="text-align:center; width:130px;">Action</th>

                       </tr>



                    </thead>
					
					 <thead>   
							<tr class="plachelolder">
								<td style="border-bottom:0px;"></td>
								 <td style="border-bottom:0px;">&nbsp;</td>
								<td class="wkkdd"><input type="text" placeholder="Search" data-index="2" class="reposnsciefe1" /></td>
								<td class="wkkdd"><input type="text" placeholder="Search" data-index="3" class="reposnsciefe1" /></td>
								<td class="wkkdd"><input type="text" placeholder="Search" data-index="4" class="reposnsciefe1" /></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr> 
						</thead>



                       <tbody>



                         <?php  $i = 1; ?>



                         @if (count($auditresult) > 0)



                        @foreach ($auditresult as $kk => $client)



                          @if (count($client) > 0)



                           @foreach ($client as $tt)



                           <?php $site_id = $tt->sid; //echo "asda";
						   //echo "<pre>"; print_r($tt); echo "</pre>"; exit; ?>



                      <tr data-entry-id="{{ $tt->id }}" id="record_{{ $tt->id }}">



                        <td></td>
						
						<td><?php echo $i; ?></td>

                        <td><?php echo $sites[$tt->sid]; ?></td>


                        <td class="observation_col{{ $tt->id }}"><?php echo $tt->observation; ?></td>



                        <td class="location_col{{ $tt->id }}"><?php echo $tt->location; ?></td>



                        <td  class="snagimage_col{{ $tt->id }}">
                            <?php if($tt->before_image!="") { ?>
								<div   id="bimage_pic">
									<a href="/uploads/sore/<?php echo $tt->before_image; ?>" style="width:500px;" class="open-lightbox"><img src="/uploads/sore/thumb/<?php echo $tt->before_image; ?>" class="img-responsive" style="max-width:150px; width:150px; height:150px;"></a>
							 </div>
                          <?php } ?>
                        </td>
						
						<td  class="snagimage_col{{ $tt->id }}">
                            <?php if($tt->after_image!="") { ?>
								<div  id="aimage_pic">
									<a href="/uploads/sore/<?php echo $tt->after_image; ?>" style="width:500px;" class="open-lightbox"><img src="/uploads/sore/thumb/<?php echo $tt->after_image; ?>" class="img-responsive" style="max-width:150px; width:150px; height:150px;"></a>
							 </div>
                          <?php } ?>
                        </td>

                        <td class="reporton_col{{ $tt->id }}" width="82px" style="text-align:center !important;"><?php echo date("d-m-Y",strtotime($tt->reporton)); ?></td>
						
						

						<td class="timeline_col{{ $tt->id }}" width="82px" style="text-align:center !important;">
                        	<?php
								$year = date('Y',strtotime($tt->timeline));
								if($year!='1970' || $year!='0000' || $year!='0001' || $year!='-0001') $timeline = date("d-m-Y",strtotime($tt->timeline));
				 				else  $timeline = ""; 
							?>
                        </td>




                        <td class="status_col{{ $tt->id }}"><?php if($tt->status==1) echo "Open"; else echo "Closed"; ?></td>



                        <td style="text-align:center; width:130px;">
							<a href="#" class="btn btn-xs btn-inverse">Edit</a> 
                            <a href="#"  class="btn btn-xs btn-danger">Delete</a></td>



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

  