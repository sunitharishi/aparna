
      <div class="firesafety-firsttable" style="margin-bottom:10px;">
		<table class="tablesaw tablesaw-swipe" data-tablesaw-mode="swipe" data-tablesaw-minimap width="100%" border="1" cellspacing="1" >
         <!-- <tr>
            <th colspan="10">Daily Security Data </th>
          </tr>-->
			<thead class="tablcomu head-color">
            
            
				<tr>
                
					<th class="title" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist" rowspan="2">S.No</th>
				    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" rowspan="2">Description</th>
					 <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">Total</th>
                   <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" style="width:60px;">NW</th>
                   <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2"  class="waterwi" style="width:60px;">Auto</th>
                   <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" style="width:60px;">Manual</th>
                   <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" class="waterwi" style="width:60px;">Off</th>
                   <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" rowspan="3" colspan="3" style="width: 327px;">Total downtime (Hrs / days) of all Equipment</th>
<!--                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" rowspan="3" colspan="3" style="border-color:white;"> </th>
                     <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" rowspan="3" colspan="3" style="border-color:white;"> </th>
-->  				</tr>
             
               
<!--                 <tr>
                 <th colspan="3"></th>
                  <th>Manul</th>
                  <th>Auto</th>
                  <th>Off</th>
                 </tr>
-->                
			</thead>
			<tbody class="communityinpu">
                           <?php if($type=='Current') { ?>
 							{!! Form::hidden('record_id',(isset($res['id'])) ? $res['id']: '0', ['class' => 'larev', 'placeholder' => '','id' => 'record_id']) !!}
                            <?php } ?>
						    {!! Form::hidden('site',$site, ['class' => 'larev', 'placeholder' => '']) !!}
 				       <tr>
                         <td><b>1</b></td>
                        <td><b>Jockey Pump</b></td>
                        <td><b><?php if(isset($validation['jockeypump'])) echo $validation['jockeypump']; ?></b></td>
                       <!-- <td>{!! Form::text('jk_pump_nw', (isset($res['jk_pump_nw'])) ? $res['jk_pump_nw']: '', ['class' => '', 'id'=>'jk_pump_nw', 'placeholder' => '']) !!} </td>-->
                     <!--   <td><input name="jk_pump_nw" onchange="reportinfo(this.value,1,'Jockey Pump');"></td>-->
						 <td style="width:60px;">{!! Form::text('jk_pump_nw',(isset($res['jk_pump_nw'])) ? $res['jk_pump_nw']: '', ['class' => 'required', 'id' => 'jk_pump_nw', 'placeholder' => '','onchange' =>'reportinfonew(this.value,1,"Jockey Pump")']) !!} </td>
                        <td style="width:60px;">{!! Form::text('jk_pump_auto',(isset($res['jk_pump_auto'])) ? $res['jk_pump_auto']: '', ['class' => 'required', 'id' => 'jk_pump_auto', 'placeholder' => '']) !!} </td>
                        <td style="width:60px;">{!! Form::text('jk_pump_manual',(isset($res['jk_pump_manual'])) ? $res['jk_pump_manual']: '', ['class' => 'required', 'id' => 'jk_pump_manual', 'placeholder' => '','onchange' =>'reportinfonew(this.value,1,"Jockey Pump")']) !!}</td>
                        <td style="width:60px;">{!! Form::text('jk_pump_off', (isset($res['jk_pump_off'])) ? $res['jk_pump_off']:'', ['class' => 'required', 'placeholder' => '', 'id' => 'jk_pump_off','onchange' =>'reportinfonew(this.value,1,"Jockey Pump")']) !!}</td>
                        <td>{!! Form::text('jk_dwn_tm',(isset($res['jk_dwn_tm'])) ? $res['jk_dwn_tm']:'', ['class' => '', 'placeholder' => '']) !!}</td>
                             </tr>
                          
                           <tr>
                         <td><b>2</b></td>
                        <td><b>Main Pump</b></td>
                        <td><b><?php if(isset($validation['mainpump'])) echo $validation['mainpump']; ?></b></td>
                        <td style="width:60px;">{!! Form::text('main_pump_nw',(isset($res['main_pump_nw'])) ? $res['main_pump_nw']:'', ['class' => 'required', 'id' => 'main_pump_nw', 'placeholder' => '','onchange' =>'reportinfonew(this.value,2,"Main Pump")']) !!} </td>
                        <td style="width:60px;">{!! Form::text('main_pump_auto',(isset($res['main_pump_auto'])) ? $res['main_pump_auto']:'', ['class' => 'required', 'id' => 'main_pump_auto', 'placeholder' => '']) !!} </td>
                        <td style="width:60px;">{!! Form::text('main_pump_manual',(isset($res['main_pump_manual'])) ? $res['main_pump_manual']:'', ['class' => 'required', 'id' => 'main_pump_manual', 'placeholder' => '','onchange' =>'reportinfonew(this.value,2,"Main Pump")']) !!}</td>
                        <td style="width:60px;">{!! Form::text('main_pump_off',(isset($res['main_pump_off'])) ? $res['main_pump_off']:'', ['class' => 'required','id' => 'main_pump_off', 'placeholder' => '','onchange' =>'reportinfonew(this.value,2,"Main Pump")']) !!}</td>
                        <td>{!! Form::text('main_dwn_tm',(isset($res['main_dwn_tm'])) ? $res['main_dwn_tm']:'', ['class' => '', 'placeholder' => '']) !!}</td>
                             </tr>
                          
                          
                             <tr>
                         <td><b>3</b></td>
                        <td><b>DG Pump</b></td>
                        <td><b><?php if(isset($validation['dgpump'])) echo $validation['dgpump']; ?></b></td>
                        <td style="width:60px;">{!! Form::text('dg_pump_nw',(isset($res['dg_pump_nw'])) ? $res['dg_pump_nw']:'', ['class' => 'required', 'id' => 'dg_pump_nw', 'placeholder' => '','onchange' =>'reportinfonew(this.value,3,"DG Pump")']) !!} </td>
                        <td style="width:60px;">{!! Form::text('dg_pump_auto',(isset($res['dg_pump_auto'])) ? $res['dg_pump_auto']:'', ['class' => 'required', 'id' => 'dg_pump_auto', 'placeholder' => '']) !!} </td>
                        <td style="width:60px;">{!! Form::text('dg_pump_manual',(isset($res['dg_pump_manual'])) ? $res['dg_pump_manual']:'', ['class' => 'required', 'id' => 'dg_pump_manual', 'placeholder' => '','onchange' =>'reportinfonew(this.value,3,"DG Pump")']) !!}</td>
                        <td style="width:60px;">{!! Form::text('dg_pump_off',(isset($res['dg_pump_off'])) ? $res['dg_pump_off']:'', ['class' => 'required', 'id' => 'dg_pump_off', 'placeholder' => '','onchange' =>'reportinfonew(this.value,3,"DG Pump")']) !!}</td>
                        <td>{!! Form::text('dg_dwn_tm',(isset($res['dg_dwn_tm'])) ? $res['dg_dwn_tm']:'', ['class' => '', 'placeholder' => '']) !!}</td>
                             </tr>
                          
                              <tr>
                         <td><b>4</b></td>
                        <td> <b>Booster Pumps</b></td>
                        <td><b><?php if(isset($validation['boosterpumps'])) echo $validation['boosterpumps']; ?></b></td>
                       <td style="width:60px;">{!! Form::text('boostr_pump_nw',(isset($res['boostr_pump_nw'])) ? $res['boostr_pump_nw']:'', ['class' => 'required', 'id' => 'boostr_pump_nw', 'placeholder' => '','onchange' =>'reportinfonew(this.value,4,"Booster Pumps")']) !!} </td>
                        <td style="width:60px;">{!! Form::text('boostr_pump_auto',(isset($res['boostr_pump_auto'])) ? $res['boostr_pump_auto']:'', ['class' => 'required', 'id' => 'boostr_pump_auto', 'placeholder' => '']) !!} </td>
                        <td style="width:60px;">{!! Form::text('boostr_pump_manual',(isset($res['boostr_pump_manual'])) ? $res['boostr_pump_manual']:'', ['class' => 'required', 'id' => 'boostr_pump_manual', 'placeholder' => '','onchange' =>'reportinfonew(this.value,4,"Booster Pumps")']) !!}</td>
                        <td style="width:60px;">{!! Form::text('boostr_pump_off',(isset($res['boostr_pump_off'])) ? $res['boostr_pump_off']:'', ['class' => 'required', 'id' => 'boostr_pump_off', 'placeholder' => '','onchange' =>'reportinfonew(this.value,4,"Booster Pumps")']) !!}</td>
                        <td>{!! Form::text('boostr_dwn_tm',(isset($res['boostr_dwn_tm'])) ? $res['boostr_dwn_tm']:'', ['class' => '', 'placeholder' => '']) !!}</td>
                             </tr>
                          
                         
                         <tr>
                         <td><b>5</b></td>
                         <td><b>Dewatering Pumps</b></td>
                        <td><b><?php if(isset($validation['dewaterpumps'])) echo $validation['dewaterpumps']; ?></b></td>
                        <td style="width:60px;">{!! Form::text('dewatr_pump_nw',(isset($res['dewatr_pump_nw'])) ? $res['dewatr_pump_nw']:'', ['class' => 'required', 'id' => 'dewatr_pump_nw', 'placeholder' => '','onchange' =>'reportinfonew(this.value,5,"Dewatering Pumps")']) !!} </td>
                        <td style="width:60px;">{!! Form::text('dewatr_pump_auto',(isset($res['dewatr_pump_auto'])) ? $res['dewatr_pump_auto']:'', ['class' => 'required', 'id' => 'dewatr_pump_auto', 'placeholder' => '','onchange' =>'reportinfonew(this.value,5,"Dewatering Pumps")']) !!} </td>
                        <td style="width:60px;">{!! Form::text('dewatr_pump_manual',(isset($res['dewatr_pump_manual'])) ? $res['dewatr_pump_manual']:'', ['class' => 'required', 'id' => 'dewatr_pump_manual', 'placeholder' => '']) !!}</td>
                        <td style="width:60px;">{!! Form::text('dewatr_pump_off',(isset($res['dewatr_pump_off'])) ? $res['dewatr_pump_off']:'', ['class' => 'required', 'id' => 'dewatr_pump_off', 'placeholder' => '','onchange' =>'reportinfonew(this.value,5,"Dewatering Pumps")']) !!}</td>
                        <td>{!! Form::text('dewatr_dwn_tm',(isset($res['dewatr_dwn_tm'])) ? $res['dewatr_dwn_tm']:'', ['class' => '', 'placeholder' => '']) !!}</td>
                         </tr>
                    </tbody> 
		        </table>
                </div>
                
                <div class="firesafety-secondtable" style="margin-bottom:10px;">
                   <table class="tablesaw tablesaw-swipe" data-tablesaw-mode="swipe" data-tablesaw-minimap width="100%" border="1" cellspacing="1" >
                      <thead class="tablcomu head-color">
            
            
				<tr>
                
					<th class="title" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist" rowspan="2" style="width:50px;">S.No</th>
				    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" rowspan="2" style="width:300px;">Description</th>
					 <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">Total</th>
                   <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" style="width:100px;">NW</th>
					
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1" rowspan="3" colspan="3">Total downtime (Hrs / days) of all Equipment</th>
 				</tr>
             
               
			</thead>
			<tbody class="communityinpu">

                      <tr>
                         <td style="width:50px;"><b>6</b></td>
                        <td style="width:300px;"> <b>Yard Hydrant Points</b></td>
                        <td><b><?php if(isset($validation['yardhydrantpoints'])) echo $validation['yardhydrantpoints']; ?></b></td>
                        <td style="width:100px;">{!! Form::text('yard_hyd_pns',(isset($res['yard_hyd_pns'])) ? $res['yard_hyd_pns']:'', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,6,"Yard Hydrant Points")']) !!}</td>
                        
                         <td>{!! Form::text('yard_hyd_dwn_tm',(isset($res['yard_hyd_dwn_tm'])) ? $res['yard_hyd_dwn_tm']:'', ['class' => '', 'placeholder' => '']) !!}</td>
                              </tr>
                             
                         
                        <tr>
                         <td style="width:50px;"><b>7</b></td>
                         <td style="width:300px;"> <b>Cellar Hydrant Points</b></td>
                        <td><b><?php if(isset($validation['cellarhydrantpoints'])) echo $validation['cellarhydrantpoints']; ?></b></td>
                      <td style="width:100px;">{!! Form::text('cell_hyd_pns',(isset($res['cell_hyd_pns'])) ? $res['cell_hyd_pns']:'', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,7,"Cellar Hydrant Points")']) !!}</td>
                       
                         <td>{!! Form::text('cell_hyd_dwn_tm',(isset($res['cell_hyd_dwn_tm'])) ? $res['cell_hyd_dwn_tm']:'', ['class' => '', 'placeholder' => '']) !!}</td>
                        </tr>
                          
                         <tr>
                         <td style="width:50px;"><b>8</b></td>
                         <td style="width:300px;"><b> Sub Cellar Hydrant Points</b></td>
                        <td><b><?php if(isset($validation['subcellarhydrapoints'])) echo $validation['subcellarhydrapoints']; ?></b></td>
                        <td style="width:100px;">{!! Form::text('sbcell_hyd_pns',(isset($res['sbcell_hyd_pns'])) ? $res['sbcell_hyd_pns']:'', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,8,"Sub Cellar Hydrant Points")']) !!}</td>
                        
                         <td>{!! Form::text('sbcell_hyd_dwn_tm',(isset($res['sbcell_hyd_dwn_tm'])) ? $res['sbcell_hyd_dwn_tm']:'', ['class' => '', 'placeholder' => '']) !!}</td>
                        </tr>

                           
                         <tr>
                         <td style="width:50px;"><b>9</b></td>
                         <td style="width:300px;"><b> Fire Hose Reel Drums</b></td>
                        <td><b><?php if(isset($validation['firehosereeldrums'])) echo $validation['firehosereeldrums']; ?></b></td>
                         <td style="width:100px;">{!! Form::text('frhsreel_drums',(isset($res['frhsreel_drums'])) ? $res['frhsreel_drums']:'', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,9,"Fire Hose Reel Drums")']) !!}</td>
                        
                         <td >{!! Form::text('frhsreel_drums_dwn_tm',(isset($res['frhsreel_drums_dwn_tm'])) ? $res['frhsreel_drums_dwn_tm']:'', ['class' => '', 'placeholder' => '']) !!}</td>
                        </tr>

                          
                           
                         <tr>
                         <td style="width:50px;"><b>10</b></td>
                         <td style="width:300px;"><b>Fire Alarm System</b></td>
                        <td><b><?php if(isset($validation['firealarmsystem'])) echo $validation['firealarmsystem']; ?></b></td>
                        <td style="width:100px;">{!! Form::text('firealarm_sysm',(isset($res['firealarm_sysm'])) ? $res['firealarm_sysm']:'', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,10,"Fire Alarm System")']) !!}</td>
                       
                         <td>{!! Form::text('firealarm_sysm_dwn_tm',(isset($res['firealarm_sysm_dwn_tm'])) ? $res['firealarm_sysm_dwn_tm']:'', ['class' => '', 'placeholder' => '']) !!}</td>
                        </tr>
                          
                            <tr>
                         <td style="width:50px;"><b>11</b></td>
                         <td style="width:300px;"><b>Public Addressing System</b></td>
                        <td><b><?php if(isset($validation['publicaddressys'])) echo $validation['publicaddressys']; ?></b></td>
                        <td style="width:100px;">{!! Form::text('pa_sysm',(isset($res['pa_sysm'])) ? $res['pa_sysm']:'', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,11,"Public Addressing System")']) !!}</td>
                       
                         <td>{!! Form::text('pa_sysm_dwn_tm',(isset($res['pa_sysm_dwn_tm'])) ? $res['pa_sysm_dwn_tm']:'', ['class' => '', 'placeholder' => '']) !!}</td>
                        </tr>
                        
                        <tr>
                         <td style="width:50px;"><b>12</b></td>
                         <td style="width:300px;"><b>Fire Extinguishers</b></td>
                        <td><b><?php if(isset($validation['fireextinguishers'])) echo $validation['fireextinguishers']; ?></b></td>
                         <td style="width:100px;">{!! Form::text('fire_exting_sysm',(isset($res['fire_exting_sysm'])) ? $res['fire_exting_sysm']:'', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,12,"Fire Extinguishers")']) !!}</td>
                       
                         <td>{!! Form::text('fire_exting_dwn_tm',(isset($res['fire_exting_dwn_tm'])) ? $res['fire_exting_dwn_tm']:'', ['class' => '', 'placeholder' => '']) !!}</td>
                        </tr>
                        
                        <tr>
                         <td style="width:50px;"><b>13</b></td>
                         <td style="width:300px;"><b>Carbon Emission System</b></td>
                        <td><b><?php if(isset($validation['carbonemissionsys'])) echo $validation['carbonemissionsys']; ?></b></td>
                       <td style="width:100px;">{!! Form::text('carbn_emiss_sysm',(isset($res['carbn_emiss_sysm'])) ? $res['carbn_emiss_sysm']:'', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,13,"Carbon Emission System")']) !!}</td>
                        
                         <td>{!! Form::text('carbn_emiss_dwn_tm',(isset($res['carbn_emiss_dwn_tm'])) ? $res['carbn_emiss_dwn_tm']:'', ['class' => '', 'placeholder' => '']) !!}</td>
                        </tr>
                        
                        <tr>
                         <td style="width:50px;"><b>14</b></td>
                         <td style="width:300px;"><b>Flow Annunciator Panels - Fire Sprinkler</b></td>
                        <td><b><?php if(isset($validation['flwmeterpanels'])) echo $validation['flwmeterpanels']; ?></b></td>
                        <td style="width:100px;">{!! Form::text('flow_mtr_fire_sprink',(isset($res['flow_mtr_fire_sprink'])) ? $res['flow_mtr_fire_sprink']:'', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,14,"Flow Meter Paneles - Fire Sprinkler")']) !!}</td>
                        
                         <td>{!! Form::text('flow_mtr_fire_sprink_dtm',(isset($res['flow_mtr_fire_sprink_dtm'])) ? $res['flow_mtr_fire_sprink_dtm']:'', ['class' => '', 'placeholder' => '']) !!}</td>
                        </tr>
                        
                        <tr>
                         <td style="width:50px;"><b>15</b></td>
                         <td style="width:300px;"><b>CP Hoses with Brass Couplings</b></td>
                        <td><b><?php if(isset($validation['cphoses'])) echo $validation['cphoses']; ?></b></td>
                        <td style="width:100px;">{!! Form::text('cp_hoses',(isset($res['cp_hoses'])) ? $res['cp_hoses']:'', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,15,"CP Hoses")']) !!}</td>
                       
                         <td>{!! Form::text('cp_hoses_dwn_tm',(isset($res['cp_hoses_dwn_tm'])) ? $res['cp_hoses_dwn_tm']:'', ['class' => '', 'placeholder' => '','onchange' =>'reportinfo(this.value,1,"Jockey Pump")']) !!}</td>
                        </tr>
                        
                        <tr>
                         <td style="width:50px;"><b>16</b></td>
                         <td style="width:300px;"><b>Fire Alaram Repeater Panel</b></td>
                        <td><b><?php if(isset($validation['firealarmrepeatpanel'])) echo $validation['firealarmrepeatpanel']; ?></b></td>
                        <td style="width:100px;">{!! Form::text('fire_ala_rep_panel',(isset($res['fire_ala_rep_panel'])) ? $res['fire_ala_rep_panel']:'', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,16,"Fire Alaram Repeater Panels")']) !!}</td>
                       
                         <td>{!! Form::text('fire_ala_rep_panel_dtm',(isset($res['fire_ala_rep_panel_dtm'])) ? $res['fire_ala_rep_panel_dtm']:'', ['class' => '', 'placeholder' => '']) !!}</td>
                        </tr>
                        
                        <tr>
                         <td style="width:50px;"><b>17</b></td>
                        <td style="width:300px;"><b> Sprinkler Charged (floor wise)</b></td>
                        <td><b><?php if(isset($validation['sprinklercharged'])) echo $validation['sprinklercharged']; ?></b></td>
                        <td style="width:100px;">{!! Form::text('sprink_charged',(isset($res['sprink_charged'])) ? $res['sprink_charged']:'', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,17,"Sprinkler Charged (floor wise)")']) !!}</td>
                        
                         <td>{!! Form::text('sprink_charged_dwn_tm',(isset($res['sprink_charged_dwn_tm'])) ? $res['sprink_charged_dwn_tm']:'', ['class' => '', 'placeholder' => '']) !!}</td>
                        </tr>
                        
                        <tr>
                         <td style="width:50px;"><b>18</b></td>
                         <td style="width:300px;"><b>Fire Mock Drill & Emergency Evacuation</b> </td>
                        <td> Prev: {!! Form::text('fire_mock_drill',(isset($res['fire_mock_drill'])) ? $res['fire_mock_drill']:'', ['class' => 'required', 'id' =>'fire_mock_drill', 'placeholder' => '']) !!}</td>
                       <td> Next: 
					   {!! Form::text('fire_mock_drill_next',(isset($res['fire_mock_drill_next'])) ? $res['fire_mock_drill_next']:'', ['class' => 'required', 'id' =>'fire_mock_drill_next', 'placeholder' => '']) !!}
					   </td>
                       
                         <td>{!! Form::text('fire_mock_drill_dwn_tm',(isset($res['fire_mock_drill_dwn_tm'])) ? $res['fire_mock_drill_dwn_tm']:'', ['class' => '', 'placeholder' => '']) !!}</td>
                        </tr>
                        
                        <tr>
                         <td style="width:50px;"><b>19</b></td>
                         <td style="width:300px;"><b>False Fire Alarms</b></td>
                        <td><b><?php if(isset($validation['falsefirealaram'])) echo $validation['falsefirealaram']; ?></b></td>
                       <td style="width:100px;">{!! Form::text('false_alaram_sys',(isset($res['false_alaram_sys'])) ? $res['false_alaram_sys']:'', ['class' => 'board required', 'placeholder' => '']) !!}
                        {!! Form::text('firealaram_boxes',(isset($res['firealaram_boxes'])) ? $res['firealaram_boxes']:'', ['class' => 'boardblack required', 'id'=>'firealaram_boxes', 'placeholder' => 'Boxes','onchange' =>'boxinfo(this.value,19,"False Fire Alarms")']) !!}    </td> 
                         <td>{!! Form::text('false_alaram_dwn_tm',(isset($res['false_alaram_dwn_tm'])) ? $res['false_alaram_dwn_tm']:'', ['class' => '', 'placeholder' => '']) !!}</td>
                        </tr>
                        
                        <tr>
                        <td style="width:50px;"><b>20</b></td>
                         <td style="width:300px;"> <b>Wet Raisers</b></td>
                        <td><b><?php if(isset($validation['wetraisers'])) echo $validation['wetraisers']; ?></b> </td>
                         <td style="width:100px;">{!! Form::text('wet_raiser',(isset($res['wet_raiser'])) ? $res['wet_raiser']:'', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,20,"Wet Raisers")']) !!}</td>
                        
                         <td>{!! Form::text('wet_raiser_dwn_tm',(isset($res['wet_raiser_dwn_tm'])) ? $res['wet_raiser_dwn_tm']:'', ['class' => '', 'placeholder' => '']) !!}</td>
                        
                        </tr>
                         <tr>
                         <td style="width:50px;"><b>21</b></td>
                         <td style="width:300px;"> <b>Sub Cellar-3 Hydrant Points</b></td>
                        <td><b><?php if(isset($validation['subcellarhydrant'])) echo $validation['subcellarhydrant']; ?></b></td>
                        <td style="width:100px;">{!! Form::text('sub_cellar_one_hyd',(isset($res['sub_cellar_one_hyd'])) ? $res['sub_cellar_one_hyd']:'', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,21,"Sub Cellar-1 Hydrant Points")']) !!}</td>
                        
                         <td>{!! Form::text('sub_cellar_one_hyd_dtm',(isset($res['sub_cellar_one_hyd_dtm'])) ? $res['sub_cellar_one_hyd_dtm']:'', ['class' => '', 'placeholder' => '']) !!}</td>
                        </tr>
                        
                                                 <tr>
                         <td style="width:50px;"><b>22</b></td> 
                         <td style="width:300px;"><b>PA System Repeater Panel</b></td>
                        <td><b><?php if(isset($validation['pasysrepeaterpanel'])) echo $validation['pasysrepeaterpanel']; ?></b></td>
                        <td style="width:100px;">{!! Form::text('pa_sys_panel',(isset($res['pa_sys_panel'])) ? $res['pa_sys_panel']:'', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,22,"PA Systewm Report Panel")']) !!}</td>
                        
                         <td>{!! Form::text('pa_sys_panel_dwn_tm', (isset($res['pa_sys_panel_dwn_tm'])) ? $res['pa_sys_panel_dwn_tm']: '', ['class' => '', 'placeholder' => '']) !!}</td>
                        </tr>
                        
                        <tr>
                         <td style="width:50px;"><b>23</b></td> 
                          <td style="width:300px;"><b>Group Indication Panel</b></td>
                        <td><b><?php if(isset($validation['groundindicationpanel'])) echo $validation['groundindicationpanel']; ?></b></td>
                        <td style="width:100px;">{!! Form::text('gr_ind_panel',(isset($res['gr_ind_panel'])) ? $res['gr_ind_panel']:'', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,23,"Group Indication Panel")']) !!}</td>
                        
                         <td>{!! Form::text('gr_ind_panel_dwn_tm', (isset($res['gr_ind_panel_dwn_tm'])) ? $res['gr_ind_panel_dwn_tm']: '', ['class' => '', 'placeholder' => '']) !!}</td>
                        </tr> 

                          
			</tbody> 
		</table>
        </div>
		   <div id="divTxt" class="description-issue"> 
             <?php  
			 $cn = 1;
			 $cat = "";
			 $firesafeissue_text_arr = array("1"=>'Jockey Pump',"2"=>'Main Pump',"3"=>'DG Pump',"4"=>'Booster Pumps',"5"=>'Dewatering Pumps',"6"=>'Yard Hydrant Points',"7"=>'Cellar Hydrant Points',"8"=>'Sub Cellar Hydrant Points',"9"=>'Fire Hose Reel Drums',"10"=>'Fire Alarm System',"11"=>'Public Addressing System',"12"=>'Fire Extinguishers',"13"=>'Carbon Emission System',"14"=>'Flow Meter Paneles - Fire Sprinkler',"15"=>'CP Hoses',"16"=>'Fire Alaram Repeater Panels',"17"=>'Sprinkler Charged (floor wise)',"18"=>'Fire Mock Drill & Emergency Evacuation',"19"=>'False Fire Alarms',"20"=>'Wet Raisers',"21"=>'Sub Cellar-1 Hydrant Points',"22"=>'PA Systewm Report Panel',"23"=>'Group Indication Panel');
			  if(count($firesafeissues) > 0){
			    //  echo "<pre>"; print_r($firesafeissues);echo "</pre>";
				  foreach($firesafeissues as $ikey => $foreissue){ 
				      // echo "<pre>"; print_r($foreissue);echo "</pre>";
					 
					  if($foreissue['category'] == $cat){
					    $cn = $cn + 1;
					  }
					  
					    ?>
					   <div id='row<?php echo $foreissue['category']; ?>' class='row<?php echo $foreissue['category']; ?> eeight'><div class="col-sm-12 col-xs-12 textname"><?php echo $foreissue['category']; ?>:<?php echo $firesafeissue_text_arr[$foreissue['category']]; ?> </div><input type='hidden' name='category[]' value='<?php echo $foreissue['category']; ?>'><div class='col-sm-4 col-xs-4 ddescrrriptioon'><label>Description of Issue</label></div><div class='col-sm-8 col-xs-8  ddescrrriptioon'><input type='text' class='form-control' placeholder=' ' name='issue_des[]' value='<?php echo $foreissue['issue_des']; ?>'/></div><div class='col-sm-4 col-xs-4'><label>Root Cause</label></div><div class='col-sm-8 col-xs-8'><input type='text' class='form-control' placeholder=' ' name='root_cause[]' value='<?php echo $foreissue['root_cause']; ?>'/></div><div class='col-sm-4 col-xs-4'><label>Action Required/Planned</label></div><div class='col-sm-8 col-xs-8'><input type='text' class='form-control' placeholder=' ' name='act_req_plan[]' value='<?php echo $foreissue['act_req_plan']; ?>'/></div><div class='col-sm-4 col-xs-4'><label>Pending From Days</label></div><div class='col-sm-8 col-xs-8'><input type='text' class='form-control' placeholder=' ' name='pendingfromdays[]' value='<?php echo $foreissue['pendingfromdays']; ?>'/></div><div class='col-sm-4 col-xs-4'><label>Responsibility</label></div><div class='col-sm-8 col-xs-8'><input type='text' class='form-control' placeholder=' ' name='reponsibility[]' value='<?php echo $foreissue['reponsibility']; ?>'/></div><div class='col-sm-4 col-xs-4'><label>Notified to the Concern</label></div><div class='col-sm-8 col-xs-8'><input type='text' class='form-control' placeholder=' ' name='notify_concern[]' value='<?php echo $foreissue['notify_concern']; ?>'/></div><div class='col-sm-4 col-xs-4'><label>Estimated Date of Completion</label></div><div class='col-sm-8 col-xs-8'><input type='text' class='form-control' placeholder=' ' name='estimation_time[]' value='<?php echo $foreissue['estimation_time']; ?>'/></div></div>
					   
					   
				<?php  $cat =  $foreissue['category']; }
			  }
			 
			 ?>
       </div>
	   
	    <div class="additional-information synemic-firesafetylll">
		Additional Information:

					  <textarea class="form-control summernote-small" placeholder="Enter Description" name="additional_info" cols="50" rows="10" id="additional_info"><?php if(isset($res['additional_info'])) echo $res['additional_info']; ?></textarea>
					  </div>
                      	
                       <div class="additional-information synemic-firesafetylll">
                       		  NOC Information:
							  <textarea class="form-control summernote-small" placeholder="Enter NOC Information" name="noc_info" cols="50" rows="10" id="noc_info"><?php if(isset($res['noc_info'])) echo $res['noc_info']; ?></textarea>
					  </div>
         