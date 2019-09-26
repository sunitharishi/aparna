
   <div class="wep-editpage">
<table class="tablesaw tablesaw-swipe" data-tablesaw-mode="swipe" data-tablesaw-minimap width="100%" border="1" cellspacing="1" style="margin-bottom:10px;">
         <!-- <tr>
            <th colspan="10">Daily Security Data </th>
          </tr>-->
			<thead class="tablcomu head-color">
            
			
            
				<tr>
                
					<th class="title" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist" rowspan="3">Category</th>
				    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" rowspan="3">S.No </th>
					<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" rowspan="3" style="width:200px;">Description</th>
					 <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">Total</th>
                   <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">NW</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" rowspan="3" style="width:420px;">Total downtime (Hrs / days) of all Equipment</th>
                     
 				</tr>
             
             <!--   <tr>
                   <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="2" colspan="2" class="" data-tablesaw-maxcolspan="2">Capacity - 470 KLD</th>
                   <!--<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" colspan="2">Capacity - 130 KLD</th>-->
                 <!--</tr>
                 <tr>
                   <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">Total</th>
                   <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">Not Working</th>-->
                   <!--<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">Total</th>
                   <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">Not Working</th-->
              <!--  </tr>-->
                
			</thead>
			<tbody class="communityinpu">
			<?php if($type=='Current') { ?>
			  {!! Form::hidden('record_id',(isset($res['id'])) ? $res['id']: '0', ['class' => 'larev', 'placeholder' => '','id' => 'record_id']) !!}
			  <?php } ?>
						    {!! Form::hidden('site',$site, ['class' => 'larev', 'placeholder' => '']) !!}
            
 				
                                <tr>
                        <th rowspan="4" style="background-color:#b8cde6;">Electro-<br>Mechanical<br> Equipment </th>
                        <td><b>1</b></td>
                        <td><b>Filter Feed Pump</b></td>
                        <td><?php if(isset($validation['filterfeedpump'])) echo $validation['filterfeedpump']; ?></td>
                          <td>{!! Form::text('filter_feed_pmp',(isset($res['filter_feed_pmp'])) ? $res['filter_feed_pmp']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,1,"Filter Feed Pump")']) !!} </td>
                       <!-- <td>2 </td>-->
                         <td>{!! Form::text('filter_feed_pmp_dtm',(isset($res['filter_feed_pmp_dtm'])) ? $res['filter_feed_pmp_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                      </tr>
                      
                      <tr>
                        <td><b>2</b></td>
                        <td><b>De-watering Pump</b></td>
                         <td><?php if(isset($validation['wspdewateringpump'])) echo $validation['wspdewateringpump']; ?></td>
                         <td>{!! Form::text('de_Water_pump',(isset($res['de_Water_pump'])) ? $res['de_Water_pump']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,2,"De-watering Pump")']) !!} </td>
                      <!--  <td>1 </td>-->
                       <td>{!! Form::text('de_Water_pump_dtm',(isset($res['de_Water_pump_dtm'])) ? $res['de_Water_pump_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                      </tr>
                          
                            
                       <tr>
                        <td><b>3</b></td>
                        <td><b>Chlorine Dosing Pump</b></td>
                        <td><?php if(isset($validation['wspchlorinedospmp'])) echo $validation['wspchlorinedospmp']; ?></td>
                         <td>{!! Form::text('chlr_dos_pump',(isset($res['chlr_dos_pump'])) ? $res['chlr_dos_pump']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,3,"Chlorine Dosing Pump")']) !!} </td>
                       <!-- <td>1 </td>-->
                       <td>{!! Form::text('chlr_dos_pump_dtm',(isset($res['chlr_dos_pump_dtm'])) ? $res['chlr_dos_pump_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                      </tr>
                      </tr>
                          
                        <tr> 
                        <td><b>4</b></td>
                        <td><b>Hydro Pneumatic Pump</b></td>
                        <td><?php if(isset($validation['wsphydronumaticpump'])) echo $validation['wsphydronumaticpump']; ?></td>
                          <td>{!! Form::text('hydro_pneuamt_pump',(isset($res['hydro_pneuamt_pump'])) ? $res['hydro_pneuamt_pump']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,4,"Hydro Pneumatic Pump")']) !!} </td>
                        <!--<td>5 </td>-->
                        <td>{!! Form::text('hydro_pneuamt_pump_dtm',(isset($res['hydro_pneuamt_pump_dtm'])) ? $res['hydro_pneuamt_pump_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                      </tr>
                      <tr>
                        <th rowspan="2" style="background-color:#cce0d0;">Electrical <br>Panels </th>
                        <td><b>5</b></td>
                        <td><b>Pneumatic System Panel</b></td>
                        <td><?php if(isset($validation['wspnumaticsyspanel'])) echo $validation['wspnumaticsyspanel']; ?></td>
                          <td>{!! Form::text('pneumatic_sys_pa',(isset($res['pneumatic_sys_pa'])) ? $res['pneumatic_sys_pa']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,5,"Pneumatic System Panel")']) !!} </td>
                       <!-- <td>2</td>-->
                        <td>{!! Form::text('pneumatic_sys_pa_dtm',(isset($res['pneumatic_sys_pa_dtm'])) ? $res['pneumatic_sys_pa_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                      </tr>
                         
                      <tr>
                        <td><b>6</b></td>
                        <td><b>WSP MCC Panel</b>  </td>
                         <td><?php if(isset($validation['wspmccpanel'])) echo $validation['wspmccpanel']; ?></td>
                         <td>{!! Form::text('wsp_mcc_panel',(isset($res['wsp_mcc_panel'])) ? $res['wsp_mcc_panel']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,6,"WSP MCC Panel")']) !!} </td>
                        <!--<td>1 </td>-->
                        <td>{!! Form::text('wsp_mcc_panel_dtm',(isset($res['wsp_mcc_panel_dtm'])) ? $res['wsp_mcc_panel_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                      </tr>
                      
                     <!-- <tr>
                      <th colspan="5"></th>
                      </tr>-->
                      <tr>
                        <th rowspan="2" style="background-color:#b8cde6;">Filtration</th>
                        <td><b>7</b></td>
                        <td><b>Pressure Sand Filter</b></td>
                         <td><?php if(isset($validation['wsppresssandfilter'])) echo $validation['wsppresssandfilter']; ?></td>
                          <td>{!! Form::text('pressure_san_filt',(isset($res['pressure_san_filt'])) ? $res['pressure_san_filt']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,7,"Pressure Sand Filter")']) !!} </td>
                       <!-- <td>1</td>-->
                         <td>{!! Form::text('pressure_san_filt_dtm',(isset($res['pressure_san_filt_dtm'])) ? $res['pressure_san_filt_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                      </tr>
                         
                      <tr>
                        <td><b>8</b></td>
                        <td><b>Softener</b> </td>
                         <td><?php if(isset($validation['wspsoftener'])) echo $validation['wspsoftener']; ?></td>
                         <td>{!! Form::text('softner',(isset($res['softner'])) ? $res['softner']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,8,"Softener")']) !!} </td>
                        <!--<td>1 </td>-->
                         <td>{!! Form::text('softner_dtm',(isset($res['softner_dtm'])) ? $res['softner_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                      </tr>
                        
                      <!-- <tr>
                       <th colspan="6"></th>
                       </tr> -->
                       
                       <tr>
                        <td colspan="6" style="background-color:#84926b;color:#fff;"><b>Flow details in Kilo Liters (KL) / Day</b></td>
                       <!-- <th colspan="3"> <p class="communityname"></p></th>-->
                       <!-- <th colspan="2"> Aura</th>-->
                       </tr>
                         
                       <tr>
                        <th rowspan="3" style="background-color:#cce0d0;">Flow Details</th>
                        <td><b>9</b></td>
                        <td colspan="2"><b>OBR Value</b> </td>
                        <td ><?php if(isset($validation['wspobrvalue'])) echo $validation['wspobrvalue']; ?></td>
                        <td colspan="2">{!! Form::text('obr_value_dtm',(isset($res['obr_value_dtm'])) ? $res['obr_value_dtm']: '', ['class' => '', 'placeholder' => '']) !!} 
						
                       </tr>
                           
                      <tr>
                        <td><b>10</b></td>
                        <td colspan="2"><b>Average Bore Water PPM Level</b></td>
                        <td  class="" data-tablesaw-maxcolspan="2">
						<?php if(isset($validation['wsprawwatppm'])) echo $validation['wsprawwatppm']; ?>
						 </td>
                        <td colspan="2" class="" data-tablesaw-maxcolspan="2">{!! Form::text('raw_water_ppm_dtm',(isset($res['raw_water_ppm_dtm'])) ? $res['raw_water_ppm_dtm']: '', ['class' => '', 'placeholder' => '']) !!}  </td>
                       </tr>
                       
                       <tr>  
                        <td><b>11</b></td>
                        <td  colspan="2"><b>Water PPM to be maintained as per IS standard</b> </td>
                        <td class="" data-tablesaw-maxcolspan="2">
						<?php if(isset($validation['wspwaterppmstand'])) echo $validation['wspwaterppmstand']; ?>  
						</td>
                        <td colspan="2" class="" data-tablesaw-maxcolspan="2">{!! Form::text('water_ppm_main_Stnd_dtm',(isset($res['water_ppm_main_Stnd_dtm'])) ? $res['water_ppm_main_Stnd_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                       </tr>
                       <!-- <tr>
                        <th colspan="6"></th>
                        </tr> -->
                       <!-- <tr>-->
                         
                        <!-- <th colspan="3"> <p class="communityname"></p></th>-->
                       <!-- <th colspan="2"> Aura</th>-->
                        <!-- </tr>-->
                         <tr>
                          <th colspan="4" style="background-color:#b8cde6;">Next filter media replacement date</th>
						  <td  class="tablesaw-swipe-cellpersist" data-tablesaw-maxcolspan="2"> <?php if(isset($validation['wspmediarepladate'])) echo $validation['wspmediarepladate']; ?></td>
                        <td colspan="2" class="" data-tablesaw-maxcolspan="2">{!! Form::text('filter_media_repl_date_dtm',(isset($res['filter_media_repl_date_dtm'])) ? $res['filter_media_repl_date_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                         </tr>
			</tbody>
		</table>
		  </div>
         
		   <div id="divTxt" class="fire-issssue"> 
             <?php 
			 $cn = 1;
			 $cat = "";
			 $firesafeissue_text_arr = array("1"=>'Filter Feed Pump',"2"=>'De-watering Pump',"3"=>'Chlorine Dosing Pump',"4"=>'Hydro Pneumatic Pump',"5"=>'Pneumatic System Panel',"6"=>'WSP MCC Panel',"7"=>'Pressure Sand Filter',"8"=>'Softener');
			  if(count($firesafeissues) > 0){
			    //  echo "<pre>"; print_r($firesafeissues);echo "</pre>"; 
				  foreach($firesafeissues as $ikey => $foreissue){ 
				      // echo "<pre>"; print_r($foreissue);echo "</pre>";
					 
					  if($foreissue['category'] == $cat){
					    $cn = $cn + 1;
					  }      
					  
					    ?>
					   <div id='row<?php echo $foreissue['category']; ?>' class='row<?php echo $foreissue['category']; ?> straigh-tcurve'><div class="foreissuew"><?php echo $foreissue['category']; ?>:<?php echo $firesafeissue_text_arr[$foreissue['category']]; ?> </div><div class='col-sm-4 col-xs-4 notificestobe-keep'><label>Description of Issue</label></div><div class='col-sm-8 col-xs-8 notificestobe-keep'><input type='hidden' name='category[]' value='<?php echo $foreissue['category']; ?>'><input type='text' class='form-control' placeholder=' ' name='issue_des[]' value='<?php echo $foreissue['issue_des']; ?>'/></div><div class='col-sm-4 col-xs-4'><label>Root Cause</label></div><div class='col-sm-8 col-xs-8'><input type='text' class='form-control' placeholder=' ' name='root_cause[]' value='<?php echo $foreissue['root_cause']; ?>'/></div><div class='col-sm-4 col-xs-4'><label>Action Required/Planned</label></div><div class='col-sm-8 col-xs-8'><input type='text' class='form-control' placeholder='' name='act_req_plan[]' value='<?php echo $foreissue['act_req_plan']; ?>'/></div><div class='col-sm-4 col-xs-4'><label>Pending From Days</label></div><div class='col-sm-8 col-xs-8'><input type='text' class='form-control' placeholder='' name='pendingfromdays[]' value='<?php echo $foreissue['pendingfromdays']; ?>'/></div><div class='col-sm-4 col-xs-4'><label>Responsibility</label></div><div class='col-sm-8 col-xs-8'><input type='text' class='form-control' placeholder='' name='reponsibility[]' value='<?php echo $foreissue['reponsibility']; ?>'/></div><div class='col-sm-4 col-xs-4'><label>Notified to the Concern</label></div><div class='col-sm-8 col-xs-8'><input type='text' class='form-control' placeholder='' name='notify_concern[]' value='<?php echo $foreissue['notify_concern']; ?>'/></div><div class='col-sm-4 col-xs-4'><label>Estimated Date of Completion</label></div><div class='col-sm-8 col-xs-8'><input type='text' class='form-control' placeholder=' ' name='estimation_time[]' value='<?php echo $foreissue['estimation_time']; ?>'/></div></div>
					   
					   
				<?php  $cat =  $foreissue['category']; }
			  }
			 
			 ?>
       </div>
	     <div class="additional-information synamic-wep-status">
		<label>Additional Information:</label>
					  <textarea class="form-control summernote-small" placeholder="Enter Description" name="additional_info" cols="50" rows="10" id="additional_info"><?php if(isset($res['additional_info'])) echo $res['additional_info']; ?></textarea>
					  </div>
         