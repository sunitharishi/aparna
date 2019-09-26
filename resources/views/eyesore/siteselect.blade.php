<div class="table-responsive">
                 <table id="dTableColSearch" class="table datatable table-bordered table-striped emploiyee-table {{ count($auditresult) > 0 ? 'dTableColSearch' : '' }} dt-select">  



                    <thead class="head-color">



                       <tr>



                          <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>

						  <th>S.NO</th>



                          <th>Description</th>



                          <th>Location</th>



                          <th>Picture</th>
						  
						  
						   <th>Start Date</th>



                          <th>Status</th>



                          <th style="text-align:center; width:130px;">Action</th>
						


                          



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


                        <td ><?php echo $tt->observation; ?></td>



                        <td ><?php echo $tt->location; ?></td>



                        <td>



                            <?php if($tt->before_image!="") { ?>



                         



                                
								<div   id="image_pic">
                                <a href="/uploads/sore/<?php echo $tt->before_image; ?>" style="width:500px;" class="open-lightbox"><img src="/uploads/sore/thumb/<?php echo $tt->before_image; ?>" class="img-responsive" style="max-width:150px; width:150px; height:150px;"></a>



                             <div style="position: absolute;margin-left: 127px;margin-top: -150px;">
							 	 <a href="javascript:void(0)" onclick="imgDelete(<?php echo $tt->id; ?>);" style="color: #FF0000;font-size: 22px;font-weight: bold;">X</a>
							 </div>
							 </div>



                          <?php } ?>



                        </td>



                        <?php /*?><td>
							<?php 
								if($tt->after_image!="") { ?>
                                
								<div   id="rimage_pic">
                                <a href="/uploads/sore/rec/<?php echo $tt->after_image; ?>" style="width:500px;" class="open-lightbox"><img src="/uploads/sore/rec/<?php echo $tt->after_image; ?>" class="img-responsive" style="max-width:150px; width:150px; height:150px;"></a>
                             <div style="position: absolute;margin-left: 127px;margin-top: -150px;">
							 	 <a href="javascript:void(0)" onclick="recimgDelete(<?php echo $tt->id; ?>);" style="color: #FF0000;font-size: 22px;font-weight: bold;">X</a>
							 </div>
							 </div>
                          <?php }  ?>
						</td><?php */?>



                        <td width="82px" style="text-align:center !important;"><?php echo date("d-m-Y",strtotime($tt->reporton)); ?></td>
						
						

						<?php /*?><td width="82px" style="text-align:center !important;">
                        	<?php
								$year = date('Y',strtotime($tt->timeline));
								if($year!='1970' || $year!='0000' || $year!='0001' || $year!='-0001') $timeline = date("d-m-Y",strtotime($tt->timeline));
				 				else  $timeline = ""; 
							?>
                        </td><?php */?>



                        <td ><?php if($tt->status==1) echo "Open"; else echo "Closed"; ?></td>



                        <td style="text-align:center; width:130px;">
                            <?php /*?><a target="_blank" href="/getsnagreportedit?sid=<?php echo $tt->id; ?>" class="btn btn-xs btn-inverse">Edit</a><?php */?>
							<a href="javascript:void(0);" onclick="snagEdit(<?php echo $tt->id; ?>);" class="btn btn-xs btn-inverse">Edit</a> 
                            <a href="#" onclick="deleteSnag(<?php echo $tt->id; ?>)" class="btn btn-xs btn-danger">Delete</a></td>



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