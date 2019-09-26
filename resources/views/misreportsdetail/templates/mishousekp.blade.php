<table class="tablesaw tablesaw-swipe" data-tablesaw-mode="swipe" data-tablesaw-minimap width="100%" border="1" cellspacing="1">
			
            {!! Form::hidden('record_id',(isset($res['id'])) ? $res['id']: '0', ['class' => 'larev', 'placeholder' => '','id' => 'record_id']) !!}
						    {!! Form::hidden('site',$site, ['class' => 'larev', 'placeholder' => '']) !!}
            <thead class="head-color">
				<!--<tr style="background-color:#416a7b;color:#fff;">
                
					<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" colspan="3">S.No</th>
                    <th>1</th>
                 </tr>-->
				    
				
			
                <tr>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" colspan="3">Community</th>
                     <td><b><?php if(isset($selsitename)) echo $selsitename; ?></b></td>
                </tr>
                
					
				
                
                  <tr>
                     <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" colspan="3">Total Units</th>
                      <td><?php if(isset($flatsnum[$site])) echo $flatsnum[$site]; ?></td>
                  </tr>
                  
                
			</thead>
			<tbody class="communityinpu">
            
 				 <tr>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" colspan="2" rowspan="2">ManPower including CH </th>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">Deployment</th>
                        <td><?php if(isset($deployment['deployment'][$site])) echo $deployment['deployment'][$site]; ?> </td>
                   </tr>
                   
                   <tr>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="3">Physical Presence Avg / day</th>
                        <td>{!! Form::text('physical_presence',(isset($res['physical_presence'])) ? $res['physical_presence']: '', ['class' => '', 'placeholder' => '']) !!}  </td>
                    </tr>
                    
                    <tr>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4" colspan="3">Garbage disposal</th>
                        <td><select name="garbage_disposal">
                        <option value="Daily" <?php if( isset($res['physical_presence'])) { if($res['physical_presence'] == "Daily") echo "selected='selected'"; } ?>>Daily</option>
                        <option value="Alternate Days" <?php if( isset($res['physical_presence'])) { if($res['physical_presence'] == "Alternate Days") echo "selected='selected'"; } ?>>Alternate Days</option>
                        </select></td>
                    </tr>
                    
                    <tr>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4"  rowspan="5">Average Monthly Consumption</th>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4" rowspan="2">Brooms (Nos.) </th>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">Hard</th>
                        <td>{!! Form::text('brooms_hard',(isset($res['brooms_hard'])) ? $res['brooms_hard']: '', ['class' => '', 'placeholder' => '']) !!}  </td>
                     </tr>
                     
                     <tr>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">Soft</th>
                        <td>{!! Form::text('brooms_soft',(isset($res['brooms_soft'])) ? $res['brooms_soft']: '', ['class' => '', 'placeholder' => '']) !!}  </td>
                      </tr>
                      
                      <tr>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="3" rowspan="2">Cleaners (ltr)</th>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">Floor</th>
                        <td>{!! Form::text('cleaners_floor',(isset($res['cleaners_floor'])) ? $res['cleaners_floor']: '', ['class' => '', 'placeholder' => '']) !!}  </td>
                      </tr>
                      
                      <tr>
                         <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">Toilet</th>
                        <td>{!! Form::text('cleaners_tolet',(isset($res['cleaners_tolet'])) ? $res['cleaners_tolet']: '', ['class' => '', 'placeholder' => '']) !!}  </td>
                      </tr>
                      
                      <tr>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" colspan="2">Freshner</th>
                        <td>{!! Form::text('freshner',(isset($res['freshner'])) ? $res['freshner']: '', ['class' => '', 'placeholder' => '']) !!}  </td>
                      </tr>
                      
                      <tr>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4" colspan="3">Debris trips Ave / day</th>
                        <td>{!! Form::text('debristripavg',(isset($res['debristripavg'])) ? $res['debristripavg']: '', ['class' => '', 'placeholder' => '']) !!}  </td>
                      </tr>
                        
                        
                       <tr>
                         <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="4"  rowspan="7" class="" data-tablesaw-maxcolspan="7">Daily and periodical cleanings</th>
                         <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="4" colspan="2" class="" data-tablesaw-maxrowspan="2">Corridors Sweeping and mopping</th>
                          <td><select name="corridors_sweeping">
                        <option value="Daily" <?php if( isset($res['corridors_sweeping'])) { if($res['corridors_sweeping'] == "Daily") echo "selected='selected'"; } ?>>Daily</option>
                        <option value="Alternate Days" <?php if( isset($res['corridors_sweeping'])) { if($res['corridors_sweeping'] == "Alternate Days") echo "selected='selected'"; } ?>>Alternate Days</option>
						  <option value="NA" <?php if( isset($res['corridors_sweeping'])) { if($res['corridors_sweeping'] == "NA") echo "selected='selected'"; } ?>>NA</option>
                        </select></td>
                      </tr>
                      
                       <tr>
                         <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="4" colspan="2" class="" data-tablesaw-maxrowspan="2">	Corridor  deep cleaning / water wash</th>
                        <td><select name="corridors_water_wash">
                        <option value="Monthly Once" <?php if( isset($res['corridors_water_wash'])) { if($res['corridors_water_wash'] == "Monthly Once") echo "selected='selected'"; } ?>>Monthly Once</option>
                        <option value="Monthly Twice" <?php if( isset($res['corridors_water_wash'])) { if($res['corridors_water_wash'] == "Monthly Twice") echo "selected='selected'"; } ?>>Monthly Twice</option>
						 <option value="NA" <?php if( isset($res['corridors_water_wash'])) { if($res['corridors_water_wash'] == "NA") echo "selected='selected'"; } ?>>NA</option>
                        </select></td>
                      </tr>
                      
                       <tr>
                           <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4" colspan="2">Stair case cleaning  </th>
                          <td><select name="staircase_clean">
                        <option value="Daily" <?php if( isset($res['staircase_clean'])) { if($res['staircase_clean'] == "Daily") echo "selected='selected'"; } ?>>Daily</option>
                        <option value="Alternate Days" <?php if( isset($res['staircase_clean'])) { if($res['staircase_clean'] == "Alternate Days") echo "selected='selected'"; } ?>>Alternate Days</option>
                         <option value="For Every Three Days" <?php if( isset($res['staircase_clean'])) { if($res['staircase_clean'] == "For Every Three Days") echo "selected='selected'"; } ?>>For Every Three Days</option>
                          <option value="Weekly Twice" <?php if( isset($res['staircase_clean'])) { if($res['staircase_clean'] == "Weekly Twice") echo "selected='selected'"; } ?>>Weekly Twice</option>
						  <option value="NA" <?php if( isset($res['staircase_clean'])) { if($res['staircase_clean'] == "NA") echo "selected='selected'"; } ?>>NA</option>
                        </select></td>
                       </tr>
                        
                        <tr>
                          <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4" colspan="2">Cellar & Sub cellar sweeping   </th>
                         <td><select name="cell_subcel_clean">
                        <option value="Daily" <?php if( isset($res['cell_subcel_clean'])) { if($res['cell_subcel_clean'] == "Daily") echo "selected='selected'"; } ?>>Daily</option>
                        <option value="Alternate Days" <?php if( isset($res['cell_subcel_clean'])) { if($res['cell_subcel_clean'] == "Alternate Days") echo "selected='selected'"; } ?>>Alternate Days</option>
                         <option value="For Every Three Days" <?php if( isset($res['cell_subcel_clean'])) { if($res['cell_subcel_clean'] == "For Every Three Days") echo "selected='selected'"; } ?>>For Every Three Days</option>
						 
						 <option value="Monthly Once" <?php if( isset($res['cell_subcel_clean'])) { if($res['cell_subcel_clean'] == "Monthly Once") echo "selected='selected'"; } ?>>Monthly Once</option>
						 
						 <option value="Monthly Twice" <?php if( isset($res['cell_subcel_clean'])) { if($res['cell_subcel_clean'] == "Monthly Twice") echo "selected='selected'"; } ?>>Monthly Twice</option>
						 
						 <option value="Weekly Once" <?php if( isset($res['cell_subcel_clean'])) { if($res['cell_subcel_clean'] == "Weekly Once") echo "selected='selected'"; } ?>>Weekly Once</option>
						 
                          <option value="Weekly Twice" <?php if( isset($res['cell_subcel_clean'])) { if($res['cell_subcel_clean'] == "Weekly Twice") echo "selected='selected'"; } ?>>Weekly Twice</option>
                          
                           <option value="Weekly Thrice" <?php if( isset($res['cell_subcel_clean'])) { if($res['cell_subcel_clean'] == "Weekly Thrice") echo "selected='selected'"; } ?>>Weekly Thrice</option>
						    <option value="NA" <?php if( isset($res['cell_subcel_clean'])) { if($res['cell_subcel_clean'] == "NA") echo "selected='selected'"; } ?>>NA</option>
                        </select></td>
                        
                        <tr>
                           <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4" colspan="2">Cellar and sub cellar  deep cleaning / water wash </th>
                          <td><select name="cell_subcel_clean_wtr_wash">
                        <option value="Monthly" <?php if( isset($res['cell_subcel_clean_wtr_wash'])) { if($res['cell_subcel_clean_wtr_wash'] == "Monthly") echo "selected='selected'"; } ?>>Monthly</option>
                        <option value="Monthly Twice" <?php if( isset($res['cell_subcel_clean_wtr_wash'])) { if($res['cell_subcel_clean_wtr_wash'] == "Monthly Twice") echo "selected='selected'"; } ?>>Monthly Twice</option>
                           <option value="Monthly Thrice" <?php if( isset($res['cell_subcel_clean_wtr_wash'])) { if($res['cell_subcel_clean_wtr_wash'] == "Monthly Thrice") echo "selected='selected'"; } ?>>Monthly Thrice</option>
						    <option value="NA" <?php if( isset($res['cell_subcel_clean_wtr_wash'])) { if($res['cell_subcel_clean_wtr_wash'] == "NA") echo "selected='selected'"; } ?>>NA</option>
                         
                        </select></td>
                        </tr>
                        
                        <tr>
                          <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4" colspan="2">Cob webs removal </th>
                         <td><select name="cobwebsremoval">
                        <option value="Need Basis" <?php if( isset($res['cobwebsremoval'])) { if($res['cobwebsremoval'] == "Need Basis") echo "selected='selected'"; } ?>>Need Basis</option>
                         <option value="Weekly Once" <?php if( isset($res['cobwebsremoval'])) { if($res['cobwebsremoval'] == "Weekly Once") echo "selected='selected'"; } ?>>Weekly Once</option>
                        <option value="For Every 15 days" <?php if( isset($res['cobwebsremoval'])) { if($res['cobwebsremoval'] == "For Every 15 days") echo "selected='selected'"; } ?>>For Every 15 days</option>
                          
                            <option value="Once a Month" <?php if( isset($res['cobwebsremoval'])) { if($res['cobwebsremoval'] == "Once a Month") echo "selected='selected'"; } ?>>Once a Month</option> 
							 <option value="NA" <?php if( isset($res['cobwebsremoval'])) { if($res['cobwebsremoval'] == "NA") echo "selected='selected'"; } ?>>NA</option>
                        </select></td>
                       </tr>
                       
                       <tr>
                          <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4" colspan="2"> Road Sweeping and Cleaning (Villas)   </th>
                           <td><select name="roadsweepclean">
                        <option value="Daily" <?php if( isset($res['roadsweepclean'])) { if($res['roadsweepclean'] == "Daily") echo "selected='selected'"; } ?>>Daily</option>
                        <option value="Alternate Days" <?php if( isset($res['roadsweepclean'])) { if($res['roadsweepclean'] == "Alternate Days") echo "selected='selected'"; } ?>>Alternate Days</option>
                         <option value="For Every Three Days" <?php if( isset($res['roadsweepclean'])) { if($res['roadsweepclean'] == "For Every Three Days") echo "selected='selected'"; } ?>>For Every Three Days</option>
                          <option value="Weekly Twice" <?php if( isset($res['roadsweepclean'])) { if($res['roadsweepclean'] == "Weekly Twice") echo "selected='selected'"; } ?>>Weekly Twice</option>
						   <option value="NA" <?php if( isset($res['roadsweepclean'])) { if($res['roadsweepclean'] == "NA") echo "selected='selected'"; } ?>>NA</option>
						  </select>
                          
                        </td>
                          </tr>
                          
                          
			</tbody>
		</table>