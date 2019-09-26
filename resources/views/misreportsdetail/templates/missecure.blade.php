        <div class="security-editpage">
		<table class="tablesaw tablesaw-swipe" data-tablesaw-mode="swipe" data-tablesaw-minimap width="100%" border="1" cellspacing="1">
         <!-- <tr>
            <th colspan="10">Daily Security Data </th>
          </tr>-->
			<thead class="tablcomu head-color">
            
            
				<tr>
                
					<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" colspan="2" style="text-align:center;">Category</th>
				    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" class="waterwi"><?php echo $selsitename; ?></th>
					
                   
                    
				</tr>
                 
                
			</thead>
			<tbody class="communityinpu">
             {!! Form::hidden('record_id',(isset($res['id'])) ? $res['id']: '0', ['class' => 'larev', 'placeholder' => '','id' => 'record_id']) !!}
						    {!! Form::hidden('site',$site, ['class' => 'larev', 'placeholder' => '']) !!} 
            
 				
                             <tr>
                        <th rowspan="8" style="background-color:#b8cde6;">Manpower</th>
                        <td><b>Guards</b></td>
                         <td>{!! Form::text('guards',(isset($res['guards'])) ? $res['guards']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                       
                            </tr>
                          
                            <tr>
                        <td><b>Lady Guards</b></td>
                         <td>{!! Form::text('l_guards',(isset($res['l_guards'])) ? $res['l_guards']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                       
                          </tr>
                          
                          
                             <tr>
                        <td><b>Head guard</b></td>
                        <td>{!! Form::text('h_guards',(isset($res['h_guards'])) ? $res['h_guards']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                        
                        
                          </tr>
                          
                          
                          
                             <tr>
                      <td><b>Supervisors</b></td>
                        <td>{!! Form::text('supervisors',(isset($res['supervisors'])) ? $res['supervisors']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                       
                        
                          </tr>
                          
                          
                         
                             <tr>
                          <td><b>ASO</b></td>
                         <td>{!! Form::text('aso',(isset($res['aso'])) ? $res['aso']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                    
                          
                          </tr>
                          
                           <tr>
                       <td><b>SO</b></td>
                         <td>{!! Form::text('so_num',(isset($res['so_num'])) ? $res['so_num']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                        
                          </tr>
                          <tr>
                       <td><b>Nallagandla - Hub Reserves</b></td>
                         <td>{!! Form::text('nalla_gandla_hub',(isset($res['nalla_gandla_hub'])) ? $res['nalla_gandla_hub']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                        
                          </tr>
                           <tr>
                       <td><b>HillPark - Hub Reserves</b></td>
                         <td>{!! Form::text('hillpark_hub',(isset($res['hillpark_hub'])) ? $res['hillpark_hub']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                        
                          </tr>
                          
                          
                           
                           <tr>
                        <th style="background-color:#cce0d0;">Walkie Talkies</th>
                        <td><b>Not Working / Total</b></td>
                         <td class="secuhr"><?php echo (isset($previous['nw_wt'])) ? $previous['nw_wt']: '' ; ?>/<?php echo (isset($validation['wt'])) ? $validation['wt']: '' ; ?></td>
                        
                      
                           </tr>

                           
                           <tr>
                        <th style="background-color:#b8cde6;">Biometric</th>
                         <td><b>Not Working / Total</b></td>
                        <td class="secuhr"><?php echo (isset($previous['nw_bio'])) ? $previous['nw_bio']: '' ; ?>/<?php echo (isset($validation['biomachine'])) ? $validation['biomachine']: '' ;?></td>
                      
                       
                          </tr>
                          
                           
                           <tr>
                          <th style="background-color:#cce0d0;">Bi-cycle</th>
                           <td><b>Not Working / Total</b></td>
                        <td class="secuhr">{!! Form::text('bicycle_num',(isset($res['bicycle_num'])) ? $res['bicycle_num']: '', ['class' => '', 'placeholder' => '']) !!} </td><td>/<?php echo (isset($validation['bicycle'])) ? $validation['bicycle']: '' ;?></td>
                          </tr>
                          
                           <tr>
                       <th style="background-color:#b8cde6;">Computers</th>
                        <td><b>Not Working / Total</b></td>
                        <td class="secuhr">{!! Form::text('computers_num',(isset($res['computers_num'])) ? $res['computers_num']: '', ['class' => '', 'placeholder' => '']) !!} </td><td>/ <?php  echo (isset($validation['computers'])) ? $validation['computers']: '' ;?></td>
                          </tr>
                          
                              <tr>
                        <th style="background-color:#cce0d0;">Internet  Connection</th>
                         <td><b>Available</b></td>
                        <td class="secuhr"> <?php  echo (isset($validation['internetcon'])) ? $validation['internetcon']: '' ;?></td>
                       
                          </tr>
                          
                           <tr>
                       <th style="background-color:#b8cde6;">Street Lights</th>
                        <td><b>Status</b></td>
                       <td class="secuhr"> <?php  echo (isset($validation['street_lights'])) ? $validation['street_lights']: '' ; ?></td>
                      
                      
                          </tr>
                          
                             <tr>
                       <th style="background-color:#cce0d0;">Torch Lights</th>
                        <td><b>Not Working / Total</b></td>
                        <td class="secuhr"><?php echo (isset($previous['nw_torch'])) ? $previous['nw_torch']: '' ; ?> / <?php  echo (isset($validation['torches'])) ? $validation['torches']: '' ;?></td>
                       
                       
                          </tr>
                             
                            <tr>
                       <th style="background-color:#b8cde6;">Batons</th>
                        <td><b>Total</b></td>
                        <td class="secuhr"> <?php  echo (isset($validation['av_batons'])) ? $validation['av_batons']: '' ;?></td>
                        
                       
                          </tr>
			</tbody>
		</table>
        </div>