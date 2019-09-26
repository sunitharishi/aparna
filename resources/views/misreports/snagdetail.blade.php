<div class="table-responsive">
<table id="dTableColSearch" class="table datatable table-bordered table-striped emploiyee-table {{ count($auditresult) > 0 ? 'dTableColSearch' : '' }} dt-select">  

                    <thead class="head-color">

                       <tr>
                       	
						  <td>S.No</td>

                          <?php if($scount>1){ ?><th valign="top">Site</th> <?php } ?>

                          <?php if($catcount>1){ ?><th valign="top">Category</th><?php } ?>

                          <th valign="top">Observation</th>

                          <th valign="top">Location</th>

                          <th valign="top">Picture</th>

                          <th valign="top">Recommendations</th>
						  
						  <th valign="top">Snag Date</th>

                          <th valign="top">Timeline given by Projects team</th>

                          <th valign="top">Status</th>

                           <th valign="top">Action</th>

                       </tr>

                    </thead>

                       <tbody>

                         <?php  $i = 1; //echo count($auditresult);  ?>

                         @if (count($auditresult) > 0)

                        @foreach ($auditresult as $kk => $tt)
						
						<?php 
								if($tt['timeline']=='1970-01-01' || $tt['timeline']=='0000-00-00' || $tt['timeline']=='') $timeline = "";
								else $timeline = $tt['timeline'];
						 ?>

                      <tr id="record_<?php echo $tt['id']; ?>">
					  	
						 <td><?php echo $i; ?></td>
					  
                        <?php if($scount>1){ ?><td  ><?php echo $tt['site'];?></td><?php } ?>

                       <?php if($catcount>1){ ?> <td ><?php echo $tt['category'];?></td> <?php } ?>

                        <td ><?php echo $tt['observation'];?></td>

                        <td ><?php echo $tt['location'];?></td>

                        <td >

                           <?php if($tt['imagepath']!="") { ?>



                         



                                
								<div   id="image_pic">
                                <a href="/uploads/snag/<?php echo $tt['imagepath']; ?>" style="width:500px;" class="open-lightbox"><img src="/uploads/snag/thumb/<?php echo $tt['imagepath']; ?>" class="img-responsive" style="max-width:150px; width:150px; height:150px;"></a>



                             <div style="position: absolute;margin-left: 127px;margin-top: -150px;">
							 	 <a href="javascript:void(0)" onclick="imgDelete(<?php echo $tt['id']; ?>);" style="color: #FF0000;font-size: 22px;font-weight: bold;">X</a>
							 </div>
							 </div>



                          <?php } ?>
                        </td>

                         <td>
							<?php 
							//echo $tt->recommendation;
							if($tt['rectype']=='image') 
							{
								if($tt['recimagepath']!="") { ?>
                                
								<div   id="rimage_pic">
                                <a href="/uploads/snag/rec/<?php echo $tt['recimagepath']; ?>" style="width:500px;" class="open-lightbox"><img src="/uploads/snag/rec/thumb/<?php echo $tt['recimagepath']; ?>" class="img-responsive" style="max-width:150px; width:150px; height:150px;"></a>
                             <div style="position: absolute;margin-left: 127px;margin-top: -150px;">
							 	 <a href="javascript:void(0)" onclick="recimgDelete(<?php echo $tt['id']; ?>);" style="color: #FF0000;font-size: 22px;font-weight: bold;">X</a>
							 </div>
							 </div>
                          <?php } 
							} else if($tt['rectype']=='text') {  if($tt['recommendation']!="") echo $tt['recommendation']; }  ?>
						</td>


                        <td width="82px" style="text-align:center !important;"><?php echo date("d-m-Y",strtotime($tt['reporton'])); ?></td>
						
						
						<td width="82px" style="text-align:center !important;"><?php echo $timeline; ?></td>
						
                        <td ><?php if($tt['status']==1) echo "Open"; else echo "Closed"; ?></td>

                        <td><a target="_blank" href="/getsnagreportedit?sid=<?php echo $tt['id']; ?>" class="btn btn-xs btn-inverse">Edit</a> <a href="#" onclick="deleteSnag(<?php echo $tt['id']; ?>)" class="btn btn-xs btn-danger">Delete</a></td>

                      <?php $i = $i + 1; ?>

                       @endforeach

                    @else 

                        <tr>

                            <td colspan="10">No entries in table</td>

                        </tr>

                    @endif

                    </tbody>

                </table>

             </div>

  