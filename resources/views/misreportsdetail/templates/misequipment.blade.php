
  <div class="equipment-firsttable">   
	<table class="tablesaw tablesaw-swipe" data-tablesaw-mode="swipe" data-tablesaw-minimap width="100%" border="1" cellspacing="1">
         <!-- <tr>
            <th colspan="10">Daily Security Data </th>
          </tr>-->
			<thead class="tablcomu head-color">
            
            
				<tr>
                
					<th class="title" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist" rowspan="2">Category</th>
				    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" rowspan="2">S.No</th>
					<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" rowspan="2">Description</th>
                   <!-- <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" colspan="2"><p id="communityname"></p></th>-->
                   <!-- <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" colspan="3">pumps Status</th>-->
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">Total</th>
                   <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" class="nwwidth">Not Working</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" rowspan="2" style="width:303px;">Total downtime (Hrs/days) of all Equipment</th>
   				</tr>
             
                <!--<tr style="background-color:#416a7b;color:#fff;">-->
                  
				  <!-- <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" class="waterwi">Auto</th>
                   <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">Manaul</th>
                   <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" class="waterwi">Off</th> -->
				   
				   
                 
              <!--  </tr>-->
                 
                
			</thead>
			<tbody class="communityinpu">
            				<?php if($type=='Current') { ?>
 							{!! Form::hidden('record_id',(isset($res['id'])) ? $res['id']: '0', ['class' => 'larev', 'placeholder' => '','id' => 'record_id']) !!}
                            <?php } ?>
						    {!! Form::hidden('site',$site, ['class' => 'larev', 'placeholder' => '']) !!}
                         <tr>
                         <th rowspan="4" style="background-color:#b8cde6;">Electrical Distribution System (HT)</th>
                        <td><b>1</b></td>
                        <td><b>3 Panel</b> </td>
                        <td><span><?php if(isset($validation['mis3panel'])) echo $validation['mis3panel']; ?></span> </td>
                        <td class="nwwidth">{!! Form::text('3panel_nw',(isset($res['3panel_nw'])) ? $res['3panel_nw']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,1,"3 Panel")']) !!} </td>
                       
                        <td>{!! Form::text('3panel_dtm',(isset($res['3panel_dtm'])) ? $res['3panel_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                             </tr>
                      <tr>
                        <td><b>2</b></td>
                        <td><b>4 Panel</b> </td>
                        <td><span><?php if(isset($validation['mis4panel'])) echo $validation['mis4panel']; ?></span> </td>
                        <td class="nwwidth">{!! Form::text('4panel_nw',(isset($res['4panel_nw'])) ? $res['4panel_nw']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,2,"4 Panel")']) !!} </td>
                       
                        <td>{!! Form::text('4panel_dtm',(isset($res['4panel_dtm'])) ? $res['4panel_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                      </tr>     
                          
                           <tr>
                        <td><b>3</b></td>
                        <td><b>CTPT</b> </td>
                        <td><span><?php if(isset($validation['misctpt'])) echo $validation['misctpt']; ?></span> </td>
                        <td class="nwwidth">{!! Form::text('ctpt_nw',(isset($res['ctpt_nw'])) ? $res['ctpt_nw']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,3,"CTPT")']) !!}  </td>
                       
                        <td>{!! Form::text('ctpt_dtm',(isset($res['ctpt_dtm'])) ? $res['ctpt_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                             </tr>
                            <tr>
                        <td><b>4</b></td>
                        <td><b>5 Panel</b> </td>
                        <td><span><?php if(isset($validation['mis5panel'])) echo $validation['mis5panel']; ?></span> </td>
                        <td class="nwwidth">{!! Form::text('5panel_nw',(isset($res['5panel_nw'])) ? $res['5panel_nw']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,4,"5 Panel")']) !!} </td>
                       
                        <td>{!! Form::text('5panel_dtm',(isset($res['5panel_dtm'])) ? $res['5panel_dtm']: '', ['class' => '', 'placeholder' => '']) !!}</td>
                             </tr>
                          
                             <tr>
                             <th rowspan="12" style="background-color:#cce0d0;">Electrical Distribution System(LT)</th>
                           <td><b>5</b></td>
                        <td><b>Transformers</b> </td>
                        <td><span><?php if(isset($validation['mistransformers'])) echo $validation['mistransformers']; ?></span> </td>
                        <td class="nwwidth">{!! Form::text('transformer_nw',(isset($res['transformer_nw'])) ? $res['transformer_nw']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,5,"Transformers")']) !!}  </td>
                       
                        <td>{!! Form::text('transformer_dtm',(isset($res['transformer_dtm'])) ? $res['transformer_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                          </tr>
                          
                              <tr> 
                              <td><b>6</b></td>
                        <td><b>Main Pcc Panel</b></td>
                        <td><span><?php if(isset($validation['mismainpccpanel'])) echo $validation['mismainpccpanel']; ?></span> </td>
                        <td class="nwwidth">{!! Form::text('mainpcc_nw',(isset($res['mainpcc_nw'])) ? $res['mainpcc_nw']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,6,"Main Pcc Panel")']) !!}  </td>
                       
                        <td>{!! Form::text('mainpcc_dtm',(isset($res['mainpcc_dtm'])) ? $res['mainpcc_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                          </tr>
                          
                          
                         
                             <tr>
                             <td><b>7</b></td>
                         <td><b>APFCR</b></td>
                        
                        <td><span><?php if(isset($validation['misapfcr'])) echo $validation['misapfcr']; ?></span> </td>
                        <td class="nwwidth">{!! Form::text('apfcr_nw',(isset($res['apfcr_nw'])) ? $res['apfcr_nw']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,7,"APFCR")']) !!}  </td>
                       
                        <td>{!! Form::text('apfcr_dtm',(isset($res['apfcr_dtm'])) ? $res['apfcr_dtm']: '', ['class' => '', 'placeholder' => '']) !!}</td>
                          </tr>
                          
                           <tr>
                         <td><b>8</b></td>
                        <td><b>Common Supply Panel</b></td>
                        <td><span><?php if(isset($validation['miscommsuppanel'])) echo $validation['miscommsuppanel']; ?></span> </td>
                        <td class="nwwidth">{!! Form::text('common_supply_nw',(isset($res['common_supply_nw'])) ? $res['common_supply_nw']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,8,"Common Supply Panel")']) !!} </td>
                       
                        <td>{!! Form::text('common_supply_dtm',(isset($res['common_supply_dtm'])) ? $res['common_supply_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                          </tr>
                          
                           <tr>
                         <td><b>9</b></td>
                        <td><b>Bus Duct</b></td>
                        <td><span><?php if(isset($validation['misbusduct'])) echo $validation['misbusduct']; ?></span> </td>
                        <td class="nwwidth">{!! Form::text('bus_duct_nw',(isset($res['bus_duct_nw'])) ? $res['bus_duct_nw']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,9,"Bus Duct")']) !!} </td>
                       
                        <td>{!! Form::text('bus_duct_dtm',(isset($res['bus_duct_dtm'])) ? $res['bus_duct_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                          </tr>
                          
                           <tr>
                         <td><b>10</b></td>
                        <td><b>Distribution Board</b></td>
                        <td><span><?php if(isset($validation['misdistriboard'])) echo $validation['misdistriboard']; ?></span> </td>
                        <td class="nwwidth">{!! Form::text('distribu_board_nw',(isset($res['distribu_board_nw'])) ? $res['distribu_board_nw']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,10,"Distrbution Board")']) !!}  </td>
                        
                        <td>{!! Form::text('distribu_board_dtm',(isset($res['distribu_board_dtm'])) ? $res['distribu_board_dtm']: '', ['class' => '', 'placeholder' => '']) !!}</td>
                          </tr>

                           
                           <tr>
                         <td><b>11</b></td>
                        <td><b>VCB</b></td>
                        <td><span><?php if(isset($validation['misvcb'])) echo $validation['misvcb']; ?></span> </td>
                        <td class="nwwidth">{!! Form::text('vcb_nw',(isset($res['vcb_nw'])) ? $res['vcb_nw']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,11,"VCB")']) !!}  </td>
                       
                        <td>{!! Form::text('vcb_dtm',(isset($res['vcb_dtm'])) ? $res['vcb_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                        
                          </tr>
                          
                           
                           <tr>
                         <td><b>12</b></td>
                        <td><b>ACB</b></td>
                        <td><span><?php if(isset($validation['misacb'])) echo $validation['misacb']; ?></span> </td>
                        <td class="nwwidth">{!! Form::text('acb_nw',(isset($res['acb_nw'])) ? $res['acb_nw']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,12,"ACB")']) !!}  </td>
                        
                        <td>{!! Form::text('acb_dtm',(isset($res['acb_dtm'])) ? $res['acb_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                       
                          </tr>
                          
                           <tr>
                         <td><b>13</b></td>
                        <td><b>Landscape Lighting Panel</b></td>
                        <td><span><?php if(isset($validation['mislandpanel'])) echo $validation['mislandpanel']; ?></span> </td>
                        <td class="nwwidth">{!! Form::text('landscape_lpanel_nw',(isset($res['landscape_lpanel_nw'])) ? $res['landscape_lpanel_nw']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,13,"Landscape Lighting Panel")']) !!}  </td>
                       
                        <td>{!! Form::text('landscape_lpanel_dtm',(isset($res['landscape_lpanel_dtm'])) ? $res['landscape_lpanel_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>  
                          </tr>
                           <tr>
                         <td><b>14</b></td>
                        <td><b>Club House Panel</b></td>
                        <td><span><?php if(isset($validation['ch_panel'])) echo $validation['ch_panel']; ?></span> </td>
                        <td class="nwwidth">{!! Form::text('club_house_panel_nw',(isset($res['club_house_panel_nw'])) ? $res['club_house_panel_nw']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,14,"Club House Panel")']) !!}  </td>
                        
                        <td>{!! Form::text('club_house_panel_dtm',(isset($res['club_house_panel_dtm'])) ? $res['club_house_panel_dtm']: '', ['class' => '', 'placeholder' => '']) !!}</td>
                          </tr>
                           <tr>
                         <td><b>15</b></td>
                        <td><b>Lighting Arrestor</b></td>
                        <td><span><?php if(isset($validation['mislightarestr'])) echo $validation['mislightarestr']; ?></span> </td>
                        <td class="nwwidth">{!! Form::text('lighting_arrestor_nw',(isset($res['lighting_arrestor_nw'])) ? $res['lighting_arrestor_nw']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,15,"Lighting Arrestor")']) !!}  </td>
                         
                        <td>{!! Form::text('lighting_arrestor_dtm',(isset($res['lighting_arrestor_dtm'])) ? $res['lighting_arrestor_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                          </tr>
                           <tr>
                         <td><b>16</b></td>
                        <td><b>Total No. Of Lights</b></td>
                        <td><span><?php if(isset($validation['mistotlightsnum'])) echo $validation['mistotlightsnum']; ?></span> </td>
                        <td class="nwwidth">{!! Form::text('tot_no_lights_nw',(isset($res['tot_no_lights_nw'])) ? $res['tot_no_lights_nw']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,16,"Total No. Of Lights")']) !!}  </td>
                       
                        <td>{!! Form::text('tot_no_lights_dtm',(isset($res['tot_no_lights_dtm'])) ? $res['tot_no_lights_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                          </tr>
                          <tr>
                          <th rowspan="4" style="background-color:#b8cde6;">Elevators & Backup Power</th>
                         <td><b>17</b></td>
                        <td><b>Lifts</b></td>
                        <td><span><?php if(isset($validation['lifsnum'])) echo $validation['lifsnum']; ?></span> </td>
                        <td class="nwwidth">{!! Form::text('lifts_nw',(isset($res['lifts_nw'])) ? $res['lifts_nw']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,17,"Lifts")']) !!}  </td>
                        
                        <td>{!! Form::text('lifts_dtm',(isset($res['lifts_dtm'])) ? $res['lifts_dtm']: '', ['class' => '', 'placeholder' => '']) !!}</td>
                          </tr>
                          
                           <tr>
                          <td><b>18</b></td>
                        <td><b>ARD Batteries</b></td>
                        <td><span><?php if(isset($validation['misfullbkp'])) echo $validation['misfullbkp']; ?></span> </td>
                        <td class="nwwidth">{!! Form::text('misfull_nw',(isset($res['misfull_nw'])) ? $res['misfull_nw']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,18,"ARD Batteries")']) !!}</td>
                        
                        <td>{!! Form::text('full_bkp_dtm',(isset($res['full_bkp_dtm'])) ? $res['full_bkp_dtm']: '', ['class' => '', 'placeholder' => '']) !!}</td>
                          </tr>
                          <tr>
                          <td><b>19</b></td>
                        <td><b>DG Sets</b></td>
                        <td><span><?php if(isset($validation['dgsetsnum'])) echo $validation['dgsetsnum']; ?></span> </td>
                        <td class="nwwidth">{!! Form::text('dg_sets_nw',(isset($res['dg_sets_nw'])) ? $res['dg_sets_nw']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,19,"DG Sets")']) !!}  </td>
                         
                        <td>{!! Form::text('dg_sets_dtm',(isset($res['dg_sets_dtm'])) ? $res['dg_sets_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                          </tr>
                         
                          <tr>
                          <td><b>20</b></td>
                        <td><b>Partial / Full Backup</b></td>
                        <td><span><?php if(isset($validation['mispartialbkp'])) echo $validation['mispartialbkp']; ?></span> </td>
                        <td class="nwwidth">{!! Form::text('partia_nw',(isset($res['partia_nw'])) ? $res['partia_nw']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,20,"Partial Backup")']) !!}</td>
                        
                        <td>{!! Form::text('partial_bkp_dtm',(isset($res['partial_bkp_dtm'])) ? $res['partial_bkp_dtm']: '', ['class' => '', 'placeholder' => '']) !!}</td>
                      </tr>
                          <tr>
                          <th style="background-color:#cce0d0;">Ground Water Source</th>
                          <td><b>21</b></td> 
                        <td><b>Borewells</b></td>
                        <td><span><?php if(isset($validation['borewellsnum'])) echo $validation['borewellsnum']; ?></span> </td>
                        <td class="nwwidth">{!! Form::text('bore_wells_nw',(isset($res['bore_wells_nw'])) ? $res['bore_wells_nw']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,21,"Bore Wells")']) !!}  </td>
                        
                        <td>{!! Form::text('bore_wells_dtm',(isset($res['bore_wells_dtm'])) ? $res['bore_wells_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                          </tr>
                           <tr>
                          <th style="background-color:#b8cde6;">Metro Water Supply</th>
                          <td><b>22</b></td>
                        <td><b>HMWS & SB Meter</b></td>
                        <td><span><?php if(isset($validation['mishmws'])) echo $validation['mishmws']; ?></span> </td>
                        <td class="nwwidth">{!! Form::text('hmws_nw',(isset($res['hmws_nw'])) ? $res['hmws_nw']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,22,"HMWS&SB Meter")']) !!}  </td>
                        
                        <td>{!! Form::text('hmws_dtm',(isset($res['hmws_dtm'])) ? $res['hmws_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                          </tr>
                          <tr>
                          <th rowspan="4" style="background-color:#cce0d0;">Water Distribution System</th>
                          <td><b>23</b></td>
                        <td><b>DWS</b></td>
                        <td><span><?php if(isset($validation['misdws'])) echo $validation['misdws']; ?></span> </td>
                        <td class="nwwidth">{!! Form::text('dws_nw',(isset($res['dws_nw'])) ? $res['dws_nw']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,23,"DWS")']) !!}</td>
                        
                        <td>{!! Form::text('water_ds_dtm',(isset($res['water_ds_dtm'])) ? $res['water_ds_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                          </tr>
                          <tr>
                          <td><b>24</b></td>
                        <td><b>FWS</b></td>
                        <td><span><?php if(isset($validation['misfws'])) echo $validation['misfws']; ?></span> </td>
                        <td class="nwwidth">{!! Form::text('fws_nw',(isset($res['fws_nw'])) ? $res['fws_nw']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,24,"FWS")']) !!}</td>
                        
                        <td>{!! Form::text('fws_dtm',(isset($res['fws_dtm'])) ? $res['fws_dtm']: '', ['class' => '', 'placeholder' => '']) !!}  </td>
                          </tr>
                           <tr>
                          <td><b>25</b></td>
                        <td><b>PRV's</b></td>
                        <td><span><?php if(isset($validation['misprv'])) echo $validation['misprv']; ?></span> </td>
                        <td class="nwwidth">{!! Form::text('prvs_nw',(isset($res['prvs_nw'])) ? $res['prvs_nw']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,25,"PRV")']) !!}  </td>
                        
                        <td>{!! Form::text('prvs_dtm',(isset($res['prvs_dtm'])) ? $res['prvs_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                          </tr>
                           <tr>
                          <td><b>26</b></td>
                        <td><b>Sewerage System</b></td>
                        <td><span><?php if(isset($validation['missewaragesys'])) echo $validation['missewaragesys']; ?></span> </td>
                        <td class="nwwidth">{!! Form::text('sewerage_nw',(isset($res['sewerage_nw'])) ? $res['sewerage_nw']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,26,"Sewerage System")']) !!}</td>
                         
                        <td>{!! Form::text('sewerage_dtm',(isset($res['sewerage_dtm'])) ? $res['sewerage_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                          </tr>
                           <tr>
                           <th rowspan="3" style="background-color:#b8cde6;">Landscape Water Distribution</th>
                          <td><b>27</b></td>
                        <td><b>Irrigation Pumps</b></td>
                        <td><span><?php if(isset($validation['misirrigationpumps'])) echo $validation['misirrigationpumps']; ?></span> </td>
                        <td class="nwwidth">{!! Form::text('irrigatn_pmp_nw',(isset($res['irrigatn_pmp_nw'])) ? $res['irrigatn_pmp_nw']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,27,"Irrigation Pumps")']) !!} </td>
    <!--                    <td>{!! Form::text('irrigatn_pmp_auto',(isset($res['irrigatn_pmp_auto'])) ? $res['irrigatn_pmp_auto']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                        <td>{!! Form::text('irrigatn_pmp_manual',(isset($res['irrigatn_pmp_manual'])) ? $res['irrigatn_pmp_manual']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                        <td>{!! Form::text('irrigatn_pmp_off',(isset($res['irrigatn_pmp_off'])) ? $res['irrigatn_pmp_off']: '', ['class' => '', 'placeholder' => '']) !!} </td>-->
                        
                        <td>{!! Form::text('irrigatn_pmp_dtm',(isset($res['irrigatn_pmp_dtm'])) ? $res['irrigatn_pmp_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                          </tr>
                          <tr>
                          <td><b>28</b></td>
                        <td><b>Irrigation Pump Panels</b></td>
                        <td><span><?php if(isset($validation['misirrigationpmppan'])) echo $validation['misirrigationpmppan']; ?></span> </td>
                        <td class="nwwidth">{!! Form::text('irrigatn_pmp_panel_nw',(isset($res['irrigatn_pmp_panel_nw'])) ? $res['irrigatn_pmp_panel_nw']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,28,"Irrigation Pump Panels")']) !!}  </td>
                        
                       <td>{!! Form::text('irrigatn_pmp_panel_dtm',(isset($res['irrigatn_pmp_panel_dtm'])) ? $res['irrigatn_pmp_panel_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                          </tr>
                          <tr>
                          <td><b>29</b></td>
                        <td><b>Irrigation Sprinkler Automation System</b></td>
                        <td><span><?php if(isset($validation['misirrgsprinkautosys'])) echo $validation['misirrgsprinkautosys']; ?></span> </td>
                        <td class="nwwidth">{!! Form::text('irrigatn_spr_as_nw',(isset($res['irrigatn_spr_as_nw'])) ? $res['irrigatn_spr_as_nw']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,29,"Irrigation Sprinkler Automation System")']) !!} </td>
                         
                       <td>{!! Form::text('irrigatn_spr_as_dtm',(isset($res['irrigatn_spr_as_dtm'])) ? $res['irrigatn_spr_as_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                          </tr>
                          <tr>
                          <th rowspan="2" style="background-color:#cce0d0;">Water Features </th>
                          <td><b>30</b></td>
                        <td><b>Water Body Pumps</b></td>
                        <td><span><?php if(isset($validation['miswatrbodypumps'])) echo $validation['miswatrbodypumps']; ?></span> </td>
                       <td class="nwwidth">{!! Form::text('water_body_pumps_nw',(isset($res['water_body_pumps_nw'])) ? $res['water_body_pumps_nw']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,30,"Water Body Pumps")']) !!}  </td>
   <!--                    <td>{!! Form::text('water_body_pumps_auto',(isset($res['water_body_pumps_auto'])) ? $res['water_body_pumps_auto']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                       <td>{!! Form::text('water_body_pumps_man',(isset($res['water_body_pumps_man'])) ? $res['water_body_pumps_man']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                       <td>{!! Form::text('water_body_pumps_off',(isset($res['water_body_pumps_off'])) ? $res['water_body_pumps_off']: '', ['class' => '', 'placeholder' => '']) !!} </td>-->
                       
                       <td>{!! Form::text('water_body_pumps_dtm',(isset($res['water_body_pumps_dtm'])) ? $res['water_body_pumps_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                          </tr>
                           <tr>
                          <td><b>31</b></td>
                        <td><b>Fountain</b></td>
                        <td><span><?php if(isset($validation['mismistfoun'])) echo $validation['mismistfoun']; ?></span> </td>
                       <td class="nwwidth">{!! Form::text('mist_fountain_nw',(isset($res['mist_fountain_nw'])) ? $res['mist_fountain_nw']: '', ['class' => 'required', 'placeholder' => '','onchange' =>'reportinfo(this.value,31,"Mist Fountain")']) !!}  </td>
                         
                       <td>{!! Form::text('mist_fountain_dtm',(isset($res['mist_fountain_dtm'])) ? $res['mist_fountain_dtm']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                          </tr>
                          
            </tbody>
		</table>
        </div>
        
        <div class="equipment-secondtable">
        <table class="tablesaw tablesaw-swipe" data-tablesaw-mode="swipe" data-tablesaw-minimap  border="1" cellspacing="1" style="width:70%;">
       
			<thead class="tablcomu head-color">

                          <tr>
                
                            <th class="title" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist" rowspan="2">Category</th>
                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" rowspan="2">S.No</th>
                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" rowspan="2">Description</th>
                           <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">Total</th>
                   <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" style="width:50px;">NW</th>
                             <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" class="waterwi" style="width:50px;">Auto</th>
                   <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" style="width:50px;">Manual</th>
                   <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" class="waterwi" style="width:50px;">Off</th> 
                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" rowspan="2" style="width:299px;">Total downtime (Hrs/days) of all Equipment</th>
                        </tr>
             
              
                          
                 </thead>
                 <tbody>         
                          
                          
                           <tr>
                           <th rowspan="2" style="background-color:#b8cde6;">De-watering System</th>
                          <td><b>32</b></td>
                        <td><b>Storm Water Pump</b></td>
                        <td><span><?php if(isset($validation['misstromwaterpump'])) echo $validation['misstromwaterpump']; ?></span> </td>
                      <td style="width:50px;">{!! Form::text('strm_Water_nw',(isset($res['strm_Water_nw'])) ? $res['strm_Water_nw']: '', ['class' => 'tutoriallla setvaone required', 'placeholder' => '', 'id'=>'strm_Water_nw','onchange' =>'reportinfonew(this.value,32,"Storm Water Pump")']) !!}  </td>
                       <td style="width:50px;">{!! Form::text('strm_Water_auto',(isset($res['strm_Water_auto'])) ? $res['strm_Water_auto']: '', ['class' => 'tutoriallla setvaone required', 'placeholder' => '','id'=>'strm_Water_auto']) !!} </td>
                       <td style="width:50px;">{!! Form::text('strm_Water_man',(isset($res['strm_Water_man'])) ? $res['strm_Water_man']: '', ['class' => 'tutoriallla setvaone required', 'placeholder' => '','id'=>'strm_Water_man','onchange' =>'reportinfonew(this.value,32,"Storm Water Pump")']) !!} </td>
                       <td style="width:50px;">{!! Form::text('strm_Water_off',(isset($res['strm_Water_off'])) ? $res['strm_Water_off']: '', ['class' => 'tutoriallla setvaone required', 'placeholder' => '','id'=>'strm_Water_off','onchange' =>'reportinfonew(this.value,32,"Storm Water Pump")']) !!} </td>
                       <td>{!! Form::text('strm_Water_dtm',(isset($res['strm_Water_dtm'])) ? $res['strm_Water_dtm']: '', ['class' => 'downtimeremark', 'placeholder' => '']) !!} </td>
                          </tr>
                          <tr>
                          <td><b>33</b></td>
                        <td><b>Oozing Pumps</b></td>
                        <td><span><?php if(isset($validation['misoozingpump'])) echo $validation['misoozingpump']; ?></span> </td>
                     <td style="width:50px;">{!! Form::text('oozing_pump_nw',(isset($res['oozing_pump_nw'])) ? $res['oozing_pump_nw']: '', ['class' => 'tutoriallla setvatw required', 'placeholder' => '','id'=>'oozing_pump_nw','onchange' =>'reportinfonew(this.value,33,"Oozing Pumps")']) !!}  </td>
                      <td style="width:50px;">{!! Form::text('oozing_pump_auto',(isset($res['oozing_pump_auto'])) ? $res['oozing_pump_auto']: '', ['class' => 'tutoriallla setvatw required', 'placeholder' => '','id'=>'oozing_pump_auto']) !!} </td>
                      <td style="width:50px;">{!! Form::text('oozing_pump_man',(isset($res['oozing_pump_man'])) ? $res['oozing_pump_man']: '', ['class' => 'tutoriallla setvatw required', 'placeholder' => '','id'=>'oozing_pump_man','onchange' =>'reportinfonew(this.value,33,"Oozing Pumps")']) !!} </td>
                      <td style="width:50px;">{!! Form::text('oozing_pump_off',(isset($res['oozing_pump_off'])) ? $res['oozing_pump_off']: '', ['class' => 'tutoriallla setvatw required', 'placeholder' => '','id'=>'oozing_pump_off','onchange' =>'reportinfonew(this.value,33,"Oozing Pumps")']) !!} </td>
                      <td>{!! Form::text('oozing_pump_dtm',(isset($res['oozing_pump_dtm'])) ? $res['oozing_pump_dtm']: '', ['class' => 'downtimeremark', 'placeholder' => '']) !!} </td>
                          </tr>
                          <tr>
                          <th rowspan="2" style="background-color:#cce0d0;">Rain Water System</th>
                          <td><b>34</b></td>
                        <td><b>Excess Rain Water Pump</b></td>
                        <td><span><?php if(isset($validation['misexsrainwatpmp'])) echo $validation['misexsrainwatpmp']; ?></span> </td>
                     <td style="width:50px;">{!! Form::text('excess_rain_wt_nw',(isset($res['excess_rain_wt_nw'])) ? $res['excess_rain_wt_nw']: '', ['class' => 'tutoriallla setvath required', 'placeholder' => '','id'=>'excess_rain_wt_nw','onchange' =>'reportinfonew(this.value,34,"Excess Rain Water Pump")']) !!}  </td>
                       <td style="width:50px;">{!! Form::text('excess_rain_wt_auto',(isset($res['excess_rain_wt_auto'])) ? $res['excess_rain_wt_auto']: '', ['class' => 'tutoriallla setvath required', 'placeholder' => '','id'=>'excess_rain_wt_auto']) !!}  </td>
                         <td style="width:50px;">{!! Form::text('excess_rain_wt_man',(isset($res['excess_rain_wt_man'])) ? $res['excess_rain_wt_man']: '', ['class' => 'tutoriallla setvath required', 'placeholder' => '','id'=>'excess_rain_wt_man','onchange' =>'reportinfonew(this.value,34,"Excess Rain Water Pump")']) !!}  </td>
                           <td style="width:50px;">{!! Form::text('excess_rain_wt_off',(isset($res['excess_rain_wt_off'])) ? $res['excess_rain_wt_off']: '', ['class' => 'tutoriallla setvath required', 'placeholder' => '','id'=>'excess_rain_wt_off','onchange' =>'reportinfonew(this.value,34,"Excess Rain Water Pump")']) !!}  </td>
                       <td>{!! Form::text('excess_rain_wt_dtm',(isset($res['excess_rain_wt_dtm'])) ? $res['excess_rain_wt_dtm']: '', ['class' => 'downtimeremark', 'placeholder' => '']) !!} </td>
                          </tr> 
                           <tr>
                          <td><b>35</b></td>
                        <td><b>Rain Water Harvesting Pits</b></td>
                        <td><span><?php if(isset($validation['misrainharvest'])) echo $validation['misrainharvest']; ?></span> </td>
                       <td style="width:50px;">{!! Form::text('rain_water_har_nw',(isset($res['rain_water_har_nw'])) ? $res['rain_water_har_nw']: '', ['class' => 'tutoriallla required', 'placeholder' => '','onchange' =>'reportinfo(this.value,35,"Rain Water Harvesting Pits")']) !!}  </td>
                         <td colspan="3" style="width:150px;"> </td>
                       <td>{!! Form::text('rain_water_har_dtm',(isset($res['rain_water_har_dtm'])) ? $res['rain_water_har_dtm']: '', ['class' => 'downtimeremark', 'placeholder' => '']) !!} </td>
                          </tr>
             </tbody>
		</table>
        </div>
        
              <div class="equipment-thirdtable">
               <table class="tablesaw tablesaw-swipe" data-tablesaw-mode="swipe" data-tablesaw-minimap width="100%" border="1" cellspacing="1">
       
			<thead class="tablcomu head-color">

                           <tr>
                
                            <th class="title" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist" rowspan="2">Category</th>
                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" rowspan="2">S.No</th>
                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" rowspan="2" style="width: 165px;">Description</th>
                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">Total</th>
                   <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" style="width:80px;">NW</th>
                           <!-- <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" colspan="3">pumps Status</th>-->
                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" rowspan="2" style="width:299px;">Total downtime (Hrs/days) of all Equipment</th>
                        </tr>
             
               
                </thead>
                <tbody>
                          
                          <tr> 
                          <th rowspan="3" style="background-color:#b8cde6;">Swimming Pool</th>
                          <td><b>36</b></td>
                        <td><b>Indoor Pool Pumps</b></td>
                        <td><span><?php if(isset($validation['misindoorpool'])) echo $validation['misindoorpool']; ?></span> </td>
                        <td style="width:80px;">{!! Form::text('mis_indoorpool_nw',(isset($res['mis_indoorpool_nw'])) ? $res['mis_indoorpool_nw']: '', ['class' => 'tutoriallla required', 'placeholder' => '','onchange' =>'reportinfo(this.value,36,"Indoor Pool Pumps")']) !!}</td>
                         
                       <td>{!! Form::text('indoor_dtm',(isset($res['indoor_dtm'])) ? $res['indoor_dtm']: '', ['class' => 'downtimeremark', 'placeholder' => '']) !!} </td>
                          </tr>
                          
                          <tr>
                          <td><b>37</b></td>
                        <td><b>Outdoor Pool Pumps</b></td>
                        <td><span><?php if(isset($validation['misoutdoorpool'])) echo $validation['misoutdoorpool']; ?></span> </td>
                        <td style="width:80px;">{!! Form::text('mis_outdoorpool_nw',(isset($res['mis_outdoorpool_nw'])) ? $res['mis_outdoorpool_nw']: '', ['class' => 'tutoriallla required', 'placeholder' => '','onchange' =>'reportinfo(this.value,37,"Outdoor Pool Pumps")']) !!}</td>
                        
                       <td>{!! Form::text('outdoor_dtm',(isset($res['outdoor_dtm'])) ? $res['outdoor_dtm']: '', ['class' => 'downtimeremark', 'placeholder' => '']) !!} </td>
                          </tr>
                          
                          
                          <tr>
                          <td><b>38</b></td>
                        <td><b>Baby Pool</b></td>
                        <td><span><?php if(isset($validation['misbabypool'])) echo $validation['misbabypool']; ?></span> </td>
                        <td style="width:80px;">{!! Form::text('mis_babypool_nw',(isset($res['mis_babypool_nw'])) ? $res['mis_babypool_nw']: '', ['class' => 'tutoriallla required', 'placeholder' => '','onchange' =>'reportinfo(this.value,38,"Baby Pool")']) !!}</td>
                         
                       <td>{!! Form::text('baby_dtm',(isset($res['baby_dtm'])) ? $res['baby_dtm']: '', ['class' => 'downtimeremark', 'placeholder' => '']) !!} </td>
                          </tr>
                           <tr>
                           <th rowspan="3" style="background-color:#cce0d0;">Security</th>
                          <td><b>39</b></td>
                        <td><b>Boom Barrier</b></td> 
                        <td><span><?php if(isset($validation['misboombarrier'])) echo $validation['misboombarrier']; ?></span> </td>
                       <td style="width:80px;">{!! Form::text('boom_bar_nw',(isset($res['boom_bar_nw'])) ? $res['boom_bar_nw']: '', ['class' => 'downtimeremark required', 'placeholder' => '','onchange' =>'reportinfo(this.value,39,"Boom Barrier")']) !!}  </td>
                        
                       <td>{!! Form::text('boom_bar_dtm',(isset($res['boom_bar_dtm'])) ? $res['boom_bar_dtm']: '', ['class' => 'downtimeremark', 'placeholder' => '']) !!} </td>
                          </tr>
                           <tr>
                          <td><b>40</b></td> 
                        <td><b>Solar Fencing(Zones)</b></td></td>
                        <td><span><?php if(isset($validation['missolarfencingzone'])) echo $validation['missolarfencingzone']; ?></span> </td>
                        <td style="width:80px;">{!! Form::text('solar_fen_nw',(isset($res['solar_fen_nw'])) ? $res['solar_fen_nw']: '', ['class' => 'downtimeremark required', 'placeholder' => '','onchange' =>'reportinfo(this.value,40,"Solar Fencing")']) !!}  </td>
                        
                       <td>{!! Form::text('solar_fen_dtm',(isset($res['solar_fen_dtm'])) ? $res['solar_fen_dtm']: '', ['class' => 'downtimeremark', 'placeholder' => '']) !!} </td>
                          </tr>
                           <tr>
                          <td><b>41</b></td>
                        <td><b>CCTV</b></td>
                        <td><span><?php if(isset($validation['miscctv'])) echo $validation['miscctv']; ?></span> </td>
                        <td style="width:80px;">{!! Form::text('cctv_nw',(isset($res['cctv_nw'])) ? $res['cctv_nw']: '', ['class' => 'downtimeremark required', 'placeholder' => '','onchange' =>'reportinfo(this.value,41,"CCTV")']) !!}  </td>
                        
                       <td>{!! Form::text('cctv_dtm',(isset($res['cctv_dtm'])) ? $res['cctv_dtm']: '', ['class' => 'downtimeremark', 'placeholder' => '']) !!} </td>
                          </tr>
                           <tr>
                           <th style="background-color:#b8cde6;">Reticulated Piped Gas</th>
                          <td><b>42</b></td>
                        <td><b>Gas Bank & Chambers</b></td>
                       <!-- <td><span>7*4=28</span> </td>
                        <td><input type="text" name="fname" value=""> </td>-->
						 <td><span><?php if(isset($validation['misgasbankcham'])) echo $validation['misgasbankcham']; ?></span> </td>
                        <td style="width:80px;">{!! Form::text('gas_bank_chambr_nw',(isset($res['gas_bank_chambr_nw'])) ? $res['gas_bank_chambr_nw']: '', ['class' => 'downtimeremark required', 'placeholder' => '','onchange' =>'reportinfo(this.value,42,"Gas Bank & Chambers")']) !!} </td>
                        
                        <td>{!! Form::text('gas_bank_chambr_dtm',(isset($res['gas_bank_chambr_dtm'])) ? $res['gas_bank_chambr_dtm']: '', ['class' => 'downtimeremark', 'placeholder' => '']) !!} </td>
                          </tr>
                          
                          <tr>
                           <th rowspan="3" style="background-color:#cce0d0;">Air Handling Unit(AHU)</th>
                           <td><b>43</b></td>
                           <td><b>Fresh Air</b></td> 
                           <td><span><?php if(isset($validation['misfreshair'])) echo $validation['misfreshair']; ?></span> </td>
                           <td style="width:80px;">{!! Form::text('fresh_air_nw',(isset($res['fresh_air_nw'])) ? $res['fresh_air_nw']: '', ['class' => 'downtimeremark required', 'placeholder' => '','onchange' =>'reportinfo(this.value,43,"Fresh Air")']) !!}  </td>  
                           <td>{!! Form::text('fresh_air_dtm',(isset($res['fresh_air_dtm'])) ? $res['fresh_air_dtm']: '', ['class' => 'downtimeremark', 'placeholder' => '']) !!} </td>
                          </tr>
                           <tr>
                          <td><b>44</b></td> 
                        <td><b>STP AHU</b></td></td>
                        <td><span><?php if(isset($validation['misstpahu'])) echo $validation['misstpahu']; ?></span> </td>
                        <td style="width:80px;">{!! Form::text('stp_ahu_nw',(isset($res['stp_ahu_nw'])) ? $res['stp_ahu_nw']: '', ['class' => 'downtimeremark required', 'placeholder' => '','onchange' =>'reportinfo(this.value,44,"STP AHU")']) !!}  </td>                        
                       <td>{!! Form::text('stp_ahu_dtm',(isset($res['stp_ahu_dtm'])) ? $res['stp_ahu_dtm']: '', ['class' => 'downtimeremark', 'placeholder' => '']) !!} </td>
                      </tr>
			</tbody>
		</table>
         </div>
		 
		   <div id="divTxt" class="choose-right"> 
             <?php 
			 $cn = 1;
			 $cat = ""; 
			  $firesafeissue_text_arr =array("1"=>"3 Panel","2"=>"4 Panel","3"=>"CTPT","4"=>"5 Panel","5"=>"Transformers","6"=>"Main Pcc Panel","7"=>"APFCR","8"=>"Common Supply Panel","9"=>"Bus Duct","10"=>"Distrbution Board","11"=>"VCB","12"=>"ACB","13"=>"Landscape Lighting Panel","14"=>"Club House Panel","15"=>"Lighting Arrestor","16"=>"Total No. Of Lights","17"=>"Lifts","18"=>"ARD Batteries","19"=>"DG Sets","20"=>"Partial/Full Backup","21"=>"Bore Wells","22"=>"HMWS&SB Meter","23"=>"Water Distribution System","24"=>"FWS","25"=>"PRVs","26"=>"Sewerage System","27"=>"Irrigation Pumps","28"=>"Irrigation Pump Panels","29"=>"Irrigation Sprinkler Automation System","30"=>"Water Body Pumps","31"=>"Mist Fountain","32"=>"Storm Water Pump","33"=>"Oozing Pumps","34"=>"Excess Rain Water Pump","35"=>"Rain Water Harvesting Pits","36"=>"Indoor Pool Pumps","37"=>"Outdoor Pool Pumps","38"=>"Baby Pool","39"=>"Boom Barrier","40"=>"Solar Fencing","41"=>"CCTV","42"=>"Gas Bank & Chambers","43"=>"Fresh Air","44"=>"STP AHU");   
			  if(count($firesafeissues) > 0){
			    //  echo "<pre>"; print_r($firesafeissues);echo "</pre>"; 
				  foreach($firesafeissues as $ikey => $foreissue){ 
				      // echo "<pre>"; print_r($foreissue);echo "</pre>";
					 
					  if($foreissue['category'] == $cat){
					    $cn = $cn + 1;
					  } 
					   
					    ?>
					   <div id='row<?php echo $foreissue['category']; ?>' class='row<?php echo $foreissue['category']; ?> foressssissue'><div class="alwayyya"><?php echo $foreissue['category']; ?>:<?php echo $firesafeissue_text_arr[$foreissue['category']]; ?> </div><div class='col-sm-4 col-xs-4 adddformfiles'><label>Description of Issue</label></div><div class='col-sm-8 col-xs-8 adddformfiles'><input type='hidden' name='category[]' value='<?php echo $foreissue['category']; ?>'><input type='text' class='form-control' placeholder='' name='issue_des[]' value='<?php echo $foreissue['issue_des']; ?>'/></div><div class='col-sm-4 col-xs-4'><label>Root Cause</label></div><div class='col-sm-8 col-xs-8'><input type='text' class='form-control' placeholder='' name='root_cause[]' value='<?php echo $foreissue['root_cause']; ?>'/></div><div class='col-sm-4 col-xs-4'><label>Action Required / Planned</label></div><div class='col-sm-8 col-xs-8'><input type='text' class='form-control' placeholder='' name='act_req_plan[]' value='<?php echo $foreissue['act_req_plan']; ?>'/></div><div class='col-sm-4 col-xs-4'><label>Pending From Days</label></div><div class='col-sm-8 col-xs-8'><input type='text' class='form-control' placeholder='' name='pendingfromdays[]' value='<?php echo $foreissue['pendingfromdays']; ?>'/></div><div class='col-sm-4 col-xs-4'><label>Responsibility</label></div><div class='col-sm-8 col-xs-8'><input type='text' class='form-control' placeholder='' name='reponsibility[]' value='<?php echo $foreissue['reponsibility']; ?>'/></div><div class='col-sm-4 col-xs-4'><label>Notified to the Concerned</label></div><div class='col-sm-8 col-xs-8'><input type='text' class='form-control' placeholder='' name='notify_concern[]' value='<?php echo $foreissue['notify_concern']; ?>'/></div><div class='col-sm-4 col-xs-4'><label>Estimated Date of Completion</label></div><div class='col-sm-8 col-xs-8'><input type='text' class='form-control' placeholder=' ' name='estimation_time[]' value='<?php echo $foreissue['estimation_time']; ?>'/></div></div>
					   
					    
				<?php  $cat =  $foreissue['category']; }
			  }
			 
			 ?>
       </div>
          <div class="additional-information dynrmicequipment-status">
		<label>Additional Information:</label>
					  <textarea class="form-control summernote-small" placeholder="Enter Description" name="additional_info" cols="50" rows="10" id="additional_info"><?php if(isset($res['additional_info'])) echo $res['additional_info']; ?></textarea>
					  </div>
					  
					   
            