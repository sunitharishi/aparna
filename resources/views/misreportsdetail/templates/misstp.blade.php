
   <div class="stp-singletable">
<table class="tablesaw tablesaw-swipe" data-tablesaw-mode="swipe" data-tablesaw-minimap width="100%" border="1" cellspacing="1">
         <!-- <tr>
            <th colspan="10">Daily Security Data </th>
          </tr>-->
			<thead class="tablcomu head-color">
            
            
				<tr>
                
					<th class="title" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist" rowspan="3">Category</th>
				    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" rowspan="3">S.No </th>
					<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" rowspan="3" style="width:206px;">Description</th>
 					 <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">Total</th>
                   <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">NW</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" rowspan="3" style="width:420px;">Total downtime (Hrs / days) of all Equipment</th>
                     
 				</tr>
             
                <!--<tr>
                   <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="2" colspan="2" class="" data-tablesaw-maxcolspan="2">Capacity - 470 KLD</th>
                   <!--<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" colspan="2">Capacity - 130 KLD</th>-->
                 <!--</tr>
                 <tr>-->
                  
                  <!-- <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">Total</th>
                   <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">Not Working</th>-->
              <!--  </tr>-->
                
			</thead>
			<tbody class="communityinpu">
			<?php if($type=='Current') { ?>
            {!! Form::hidden('record_id',(isset($res['id'])) ? $res['id']: '0', ['class' => 'larev', 'placeholder' => '','id' => 'record_id']) !!}
			<?php } ?>
						    {!! Form::hidden('site',$site, ['class' => 'larev', 'placeholder' => '']) !!}
 				
                               <tr>
                        <th rowspan="12" style="background-color:#b8cde6;">Electro-<br>Mechanical<br> Equipment </th>
                        <td><b>1</b></td>
                        <td><b>Bar Screen Chamber</b></td>
                       <td><?php if(isset($validation['stpbarscreencham'])) echo $validation['stpbarscreencham']; ?></td>
                        <td>{!! Form::text('bar_scr_chbr_nw',(isset($res['bar_scr_chbr_nw'])) ? $res['bar_scr_chbr_nw']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,1,"Bar Screen Chamber")']) !!} </td>
                       <!-- <td>1 </td>-->
                        <td>{!! Form::text('bar_scr_chbr_dtm',(isset($res['bar_scr_chbr_dtm'])) ? $res['bar_scr_chbr_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                      </tr>
                       
                      <tr>
                        <td><b>2</b></td>
                        <td><b>Raw Sewage Pumps</b></td>
                        <td><?php if(isset($validation['stprawsewagepump'])) echo $validation['stprawsewagepump']; ?></td>
                         <td>{!! Form::text('raw_sav_pmp_nw',(isset($res['raw_sav_pmp_nw'])) ? $res['raw_sav_pmp_nw']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,2,"Raw Sewage Pumps")']) !!} </td>
                        <!--<td>2 </td>-->
                        <td>{!! Form::text('raw_sav_pmp_dtm',(isset($res['raw_sav_pmp_dtm'])) ? $res['raw_sav_pmp_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                      </tr>
                          
                            
                       <tr>
                        <td><b>3</b></td>
                        <td><b>Air Blowers</b></td>
                      <td><?php if(isset($validation['stpairbowlers'])) echo $validation['stpairbowlers']; ?></td>
                        <td>{!! Form::text('air_blow_nw',(isset($res['air_blow_nw'])) ? $res['air_blow_nw']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,3,"Air Blowers")']) !!} </td>
                        <!--<td>2 </td>-->
                         <td>{!! Form::text('air_blow_dtm',(isset($res['air_blow_dtm'])) ? $res['air_blow_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                      </tr>
                          
                        <tr>
                        <td><b>4</b></td>
                        <td><b>Return Sludge Pumps</b></td>
                        <td><?php if(isset($validation['stpretsludpumps'])) echo $validation['stpretsludpumps']; ?></td>
                        <td>{!! Form::text('retrn_sludge_nw',(isset($res['retrn_sludge_nw'])) ? $res['retrn_sludge_nw']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,4,"Return Sludge Pumps")']) !!} </td>
                    <!--    <td>1 </td>-->
                        <td>{!! Form::text('retrn_sludge_dtm',(isset($res['retrn_sludge_dtm'])) ? $res['retrn_sludge_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                      </tr>
                          
                          
                         
                       <tr>
                        <td><b>5</b></td>
                        <td><b>Filter Feed Pumps</b></td>
                        <td><?php if(isset($validation['stpfilterfeedpump'])) echo $validation['stpfilterfeedpump']; ?></td>
                         <td>{!! Form::text('filter_feed_nw',(isset($res['filter_feed_nw'])) ? $res['filter_feed_nw']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,5,"Filter Feed Pumps")']) !!} </td>
                        <!--<td>2 </td>-->
                        <td>{!! Form::text('filter_feed_dtm',(isset($res['filter_feed_dtm'])) ? $res['filter_feed_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                      </tr>
                          
                      <tr>
                        <td><b>6</b></td>
                        <td><b>Screw / Centrifuge Feed<br /> Pumps</b></td>
                       <td><?php if(isset($validation['stpscrewpumps'])) echo $validation['stpscrewpumps']; ?></td>
                       <td>{!! Form::text('screw_cent_nw',(isset($res['screw_cent_nw'])) ? $res['screw_cent_nw']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,6,"Screw / Centrifuge Feed Pumps")']) !!} </td>
                       <!-- <td>1 </td>-->
                        <td>{!! Form::text('screw_cent_dtm',(isset($res['screw_cent_dtm'])) ? $res['screw_cent_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                      </tr>
                          
                       <tr>
                        <td><b>7</b></td>
                        <td><b>Centrifuge / Filter Press</b></td>
                       <td><?php if(isset($validation['stpcentrifilpress'])) echo $validation['stpcentrifilpress']; ?></td>
                        <td>{!! Form::text('centri_filter_nw',(isset($res['centri_filter_nw'])) ? $res['centri_filter_nw']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,7,"Centrifuge / Filter Press")']) !!} </td>
                    <!--    <td>1 </td>-->
                       <td>{!! Form::text('centri_filter_dtm',(isset($res['centri_filter_dtm'])) ? $res['centri_filter_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                      </tr>
                          
                      <tr>
                        <td><b>8</b></td>
                        <td><b>De-watering Pump</b></td>
                        <td><?php if(isset($validation['stpdewaterpump'])) echo $validation['stpdewaterpump']; ?></td>
                         <td>{!! Form::text('de_Water_nw',(isset($res['de_Water_nw'])) ? $res['de_Water_nw']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,8,"De-watering Pump")']) !!} </td>
                      <!--  <td>1 </td>-->
                        <td>{!! Form::text('de_Water_dtm',(isset($res['de_Water_dtm'])) ? $res['de_Water_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                      </tr>

                           
                       <tr>
                        <td><b>9</b></td>
                        <td><b>Air Handling Unit </b></td>
                       <td><?php if(isset($validation['stphairhandunit'])) echo $validation['stphairhandunit']; ?></td>
                        <td>{!! Form::text('air_handling_nw',(isset($res['air_handling_nw'])) ? $res['air_handling_nw']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,9,"Air Handling Unit")']) !!} </td>
                      <!--  <td>1 </td>-->
                        <td>{!! Form::text('air_handling_dtm',(isset($res['air_handling_dtm'])) ? $res['air_handling_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                      </tr>
                          
                           
                      <tr>
                        <td><b>10</b></td>
                        <td><b>Chlorine Dosing Pump</b></td>
                       <td><?php if(isset($validation['chlorinedosingpump'])) echo $validation['chlorinedosingpump']; ?></td>
                        <td>{!! Form::text('chlorine_dos_nw',(isset($res['chlorine_dos_nw'])) ? $res['chlorine_dos_nw']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,10,"Chlorine Dosing Pump")']) !!} </td>
                        
                    <!--    <td>2 </td>-->
                        <td>{!! Form::text('chlorine_dos_dtm',(isset($res['chlorine_dos_dtm'])) ? $res['chlorine_dos_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                      </tr>
                          
                      <tr>
                        <td><b>11</b></td>
                        <td><b>UV System</b> </td>
                        <td><?php if(isset($validation['uvsystem'])) echo $validation['uvsystem']; ?></td>
                       <td>{!! Form::text('uv_sys_nw',(isset($res['uv_sys_nw'])) ? $res['uv_sys_nw']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,11,"UV System")']) !!} </td>
                  <!--      <td>1 </td>-->
                        <td>{!! Form::text('uv_sys_dtm',(isset($res['uv_sys_dtm'])) ? $res['uv_sys_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                      </tr>
                      
                      <tr>
                        <td><b>12</b></td>
                        <td><b>Hydro Pneumatic Pumps</b></td>
                        <td><?php if(isset($validation['hydronumaticpump'])) echo $validation['hydronumaticpump']; ?></td>
                       <td>{!! Form::text('hydro_numa_nw',(isset($res['hydro_numa_nw'])) ? $res['hydro_numa_nw']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,12,"Hydro Pneumatic Pumps")']) !!} </td>
                       <!-- <td>2 </td>-->
                        <td>{!! Form::text('hydro_numa_dtm',(isset($res['hydro_numa_dtm'])) ? $res['hydro_numa_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                      </tr>
                      
                      <tr>
                        <th rowspan="2" style="background-color:#cce0d0;">Electrical-<br>Panels </th>
                        <td><b>13</b></td>
                        <td><b>Pneumatic System Panel</b></td>
                        <td><?php if(isset($validation['pneumaticsyspanel'])) echo $validation['pneumaticsyspanel']; ?></td>
                         <td>{!! Form::text('pnumatic_sys_nw',(isset($res['pnumatic_sys_nw'])) ? $res['pnumatic_sys_nw']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,13,"Pneumatic System Panel")']) !!} </td>
                  <!--      <td>1 </td>-->
                        <td>{!! Form::text('pnumatic_sys_dtm',(isset($res['pnumatic_sys_dtm'])) ? $res['pnumatic_sys_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                      </tr>
                         
                      <tr>
                        <td><b>14</b></td>
                        <td><b>STP MCC Panel</b> </td>
                       <td><?php if(isset($validation['stpmccpanel'])) echo $validation['stpmccpanel']; ?></td>
                       <td>{!! Form::text('stp_mcc_nw',(isset($res['stp_mcc_nw'])) ? $res['stp_mcc_nw']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,14,"STP MCC Panel")']) !!} </td>
                      <!--  <td>1 </td>-->
                         <td>{!! Form::text('stp_mcc_dtm',(isset($res['stp_mcc_dtm'])) ? $res['stp_mcc_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                      </tr>
                      
                      <tr>
                      </tr>
                      <tr>
                        <th rowspan="2" style="background-color:#b8cde6;">Filtration</th>
                        <td><b>15</b></td>
                        <td><b>Pressure Sand Filter</b></td>
                        <td><?php if(isset($validation['pressuresandfilter'])) echo $validation['pressuresandfilter']; ?></td>
                         <td>{!! Form::text('pressure_san_nw',(isset($res['pressure_san_nw'])) ? $res['pressure_san_nw']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,15,"Pressure Sand Filter")']) !!} </td>
                     <!--   <td>2</td>-->
                        <td>{!! Form::text('pressure_san_dtm',(isset($res['pressure_san_dtm'])) ? $res['pressure_san_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                      </tr>
                         
                      <tr>
                        <td><b>16</b></td>
                        <td><b>Activated Carbon Filter</b> </td>
                        <td><?php if(isset($validation['activatedcarbonfilter'])) echo $validation['activatedcarbonfilter']; ?></td>
                        <td>{!! Form::text('act_carb_nw',(isset($res['act_carb_nw'])) ? $res['act_carb_nw']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,16,"Activated Carbon Filter")']) !!} </td>
                       <!-- <td>1 </td>-->
                        <td>{!! Form::text('act_carb_dtm',(isset($res['act_carb_dtm'])) ? $res['act_carb_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                      </tr>
                        
                      <!-- <tr>
                       <th colspan="6"></th>
                       </tr> -->
                       
                       <tr>
                        <th colspan="6" style="background-color:#84926b;color:#fff;">Flow details in Kilo Liters(KL)/ Day</th>
                       <!-- <th colspan="3"> <p class="communityname"></p></th>-->
                        <!--<th colspan="2"> Aura</th>-->
                       </tr>
                         
                       <tr>
                        <td rowspan="5" style="background-color:#cce0d0;"><b>Flow Details</b></td>
                        <td><b>17</b></td>
                        <td colspan="2"><b>Average Inflow</b></td>
                        <td><?php  //if(isset($validation['averageinflow'])) echo $validation['averageinflow']; ?> {!! Form::text('avg_inflow',(isset($res['avg_inflow'])) ? $res['avg_inflow']: '', ['class' => 'required', 'placeholder' => '']) !!}</td>
                       <!-- <td colspan="2"><input type="text" name="fname" value=""> </td>-->
					   
                        <td>  {!! Form::text('avg_inflow_dtm',(isset($res['avg_inflow_dtm'])) ? $res['avg_inflow_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                         
                      </tr>  
                         
                      <tr>
                        <td><b>18</b></td>
                        <td colspan="2"><b>Average Outflow to garden, fire and flush</b></td>
                        <td >{!! Form::text('avg_out_flow',(isset($res['avg_out_flow'])) ? $res['avg_out_flow']: '', ['class' => 'required', 'placeholder' => '']) !!}
						     <?php //if(isset($validation['avgoutflowtogar'])) echo $validation['avgoutflowtogar']; ?>
						 </td>
                        <!--<td colspan="2"><input type="text" name="fname" value=""> </td>-->
                         <td>{!! Form::text('avg_out_flow_dtm',(isset($res['avg_out_flow_dtm'])) ? $res['avg_out_flow_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                        </tr>
                       
                       <tr>
                        <td><b>19</b></td>
                        <td colspan="2"><b>Surplus Treated Water Outlet</b> </td>
                        <td class="tablesaw-swipe-cellpersist" data-tablesaw-maxcolspan="2">{!! Form::text('avg_bypass',(isset($res['avg_bypass'])) ? $res['avg_bypass']: '', ['class' => 'required', 'placeholder' => '']) !!}
						 <?php  // if(isset($validation['avgbypass'])) echo $validation['avgbypass']; ?>
						</td>
                        <!--<td colspan="2"><input type="text" name="fname" value=""> </td>-->
                         <td>{!! Form::text('avg_bypass_dtm',(isset($res['avg_bypass_dtm'])) ? $res['avg_bypass_dtm']: '', ['class' => '', 'placeholder' => '']) !!} 
						    
						 </td>
                        </tr>
                        
                       <tr>   
                        <td><b>20</b></td>
                        <td colspan="2"><b>Average Outflow to other sites</b> </td>
                        <td>
						{!! Form::text('avg_outflow_other',(isset($res['avg_outflow_other'])) ? $res['avg_outflow_other']: '', ['class' => 'required', 'placeholder' => '']) !!} 
						  <?php //if(isset($validation['avgoutflowothersites'])) echo $validation['avgoutflowothersites']; ?>
						 </td>
                       <?php /*?> <<!--td colspan="2"><input type="text" name="fname" value=""> </td>--><?php */?>
                          <td>{!! Form::text('avg_outflow_other_dtm',(isset($res['avg_outflow_other_dtm'])) ? $res['avg_outflow_other_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                        </tr>
						
						 <tr>   
                        <td><b>21</b></td>
                        <td colspan="2"><b>Sludge Extracted(Kgs)</b> </td>
                        <td>
						 	 <?php echo getmtdfms($report_on,$site,'stp_sludge'); ?>
						 </td>
                        <!--  <td>{!! Form::text('avg_outflow_other_dtm',(isset($res['avg_outflow_other_dtm'])) ? $res['avg_outflow_other_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>-->
						<td></td>
                        </tr>
						
                             
                       <!-- <tr>
                        <th colspan="6"></th>
                        </tr> -->
                        <tr>
                        <th colspan="4" style="background-color:#b8cde6;">Next filter media replacement date</th>
                         
                         <!-- <td><input type="text" name="fname" value=""> </td>-->
                       <!-- <th colspan="2"> Aura</th>-->
                         <!--</tr>
                         <tr>-->
                        <td  class="tablesaw-swipe-cellpersist" data-tablesaw-maxcolspan="2"> <?php if(isset($validation['nextfilterreplacement'])) echo $validation['nextfilterreplacement']; ?></td>
<!--                        <td colspan="2" class="tablesaw-swipe-cellpersist" data-tablesaw-maxcolspan="2"><input type="text" name="fname" value=""> </td>
 -->                        
 <td>{!! Form::text('next_filter_media_dtm',(isset($res['next_filter_media_dtm'])) ? $res['next_filter_media_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>
  </tr>
			</tbody>
		</table> 
          </div>
		 
         
		   <div id="divTxt" class="screen-chamber"> 
             <?php 
			 $cn = 1;
			 $cat = "";
			 $firesafeissue_text_arr = array("1"=>'Bar Screen Chamber',"2"=>'Raw Sewage Pumps',"3"=>'Air Blowers',"4"=>'Return Sludge Pumps',"5"=>'Filter Feed Pumps',"6"=>'Screw / Centrifuge Feed Pumps',"7"=>'Centrifuge / Filter Press',"8"=>'De-watering Pump',"9"=>'Air Handling Unit',"10"=>'Chlorine Dosing Pump',"11"=>'UV System',"12"=>'Hydro Pneumatic Pumps',"13"=>'Pneumatic System Panel',"14"=>'STP MCC Panel',"15"=>'Pressure Sand Filter',"16"=>'Activated Carbon Filter');
			  if(count($firesafeissues) > 0){
			    //  echo "<pre>"; print_r($firesafeissues);echo "</pre>"; 
				  foreach($firesafeissues as $ikey => $foreissue){ 
				      // echo "<pre>"; print_r($foreissue);echo "</pre>";
					 
					  if($foreissue['category'] == $cat){
					    $cn = $cn + 1;
					  }
					  
					    ?>
					   <div id='row<?php echo $foreissue['category']; ?>' class='row<?php echo $foreissue['category']; ?> nootifyconcerrrn'><div class="screeen-label"><?php echo $foreissue['category']; ?>:<?php echo $firesafeissue_text_arr[$foreissue['category']]; ?> </div><div class='col-sm-4 col-xs-4 xctuibreqyured'><label>Description of Issue</label></div><div class='col-sm-8 col-xs-8 xctuibreqyured'><input type='hidden' name='category[]' value='<?php echo $foreissue['category']; ?>'><input type='text' class='form-control' placeholder='' name='issue_des[]' value='<?php echo $foreissue['issue_des']; ?>'/></div><div class='col-sm-4 col-xs-4'><label>Root Cause</label></div><div class='col-sm-8 col-xs-8'><input type='text' class='form-control' placeholder='' name='root_cause[]' value='<?php echo $foreissue['root_cause']; ?>'/></div><div class='col-sm-4 col-xs-4'><label>Action Required / Planned</label></div><div class='col-sm-8 col-xs-8'><input type='text' class='form-control' placeholder='' name='act_req_plan[]' value='<?php echo $foreissue['act_req_plan']; ?>'/></div><div class='col-sm-4 col-xs-4'><label>Pending From Days</label></div><div class='col-sm-8 col-xs-8'><input type='text' class='form-control' placeholder='' name='pendingfromdays[]' value='<?php echo $foreissue['pendingfromdays']; ?>'/></div><div class='col-sm-4 col-xs-4'><label>Responsibility</label></div><div class='col-sm-8 col-xs-8'><input type='text' class='form-control' placeholder=' ' name='reponsibility[]' value='<?php echo $foreissue['reponsibility']; ?>'/></div><div class='col-sm-4 col-xs-4'><label>Notified to the Concerned</label></div><div class='col-sm-8 col-xs-8'><input type='text' class='form-control' placeholder='' name='notify_concern[]' value='<?php echo $foreissue['notify_concern']; ?>'/></div><div class='col-sm-4 col-xs-4'><label>Estimated Date of Completion</label></div><div class='col-sm-8 col-xs-8'><input type='text' class='form-control' placeholder=' ' name='estimation_time[]' value='<?php echo $foreissue['estimation_time']; ?>'/></div></div>
					   
					   
				<?php  $cat =  $foreissue['category']; }
			  }
			 
			 ?>
       </div>
           <div class="additional-information dynamic-stp-stastus">
		<label>Additional Information:</label>
					  <textarea class="form-control summernote-small" placeholder="Enter Description" name="additional_info" cols="50" rows="10" id="additional_info"><?php if(isset($res['additional_info'])) echo $res['additional_info']; ?></textarea>
					  </div>