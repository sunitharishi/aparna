<table class="tablesaw tablesaw-swipe" data-tablesaw-mode="swipe" data-tablesaw-minimap width="100%" border="1" cellspacing="1">
         <!-- <tr>
            <th colspan="10">Daily Security Data </th>
          </tr>-->
			<thead class="tablcomu head-color21">
            
              {!! Form::hidden('record_id',(isset($res['id'])) ? $res['id']: '0', ['class' => 'larev', 'placeholder' => '','id' => 'record_id']) !!}
						    {!! Form::hidden('site',$site, ['class' => 'larev', 'placeholder' => '']) !!} 
				<tr>
                
					<th class="title" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">S.No</th>
				    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" >Pesticides/Fertilizers and Fungicides </th>
					<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2" ><?php echo $selsitename; ?></th>
                      
				</tr>
             
                
			</thead>
			<tbody class="communityinpu">
            
 				 
                            <tr>
                        <td><b>1</b></td>
                        <td><b>Varmicompost (Kgs)</b></td>
                        <td>{!! Form::text('varmicompost',(isset($res['varmicompost'])) ? $res['varmicompost']: '', ['class' => '', 'placeholder' => '']) !!}  </td>
                            </tr>
                          
                            <tr>
                        <td><b>2</b></td>
                       <td><b>Chloropyriphos (Ltrs)</b></td>
                        <td>{!! Form::text('chloropyriphos',(isset($res['chloropyriphos'])) ? $res['chloropyriphos']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                          </tr>
                          
                             <tr>
                        <td><b>3</b></td>
                       <td><b>Monocrotophos (Ltrs)</b></td>
                        <td>{!! Form::text('monocrotophos',(isset($res['monocrotophos'])) ? $res['monocrotophos']: '', ['class' => '', 'placeholder' => '']) !!}  </td>
                           </tr>
                          
                             <tr>
                        <th><b>4</b></th>
                        <td><b>Imidaclopride (Ltrs)</b></td>
                        <td>{!! Form::text('imidaclopride',(isset($res['imidaclopride'])) ? $res['imidaclopride']: '', ['class' => '', 'placeholder' => '']) !!}  </td>
                          </tr>
                          
                         
                             <tr>
                        <th><b>5</b></th>
                         <td><b>Bavistin (Kgs)</b></td>
                        <td>{!! Form::text('bavistin',(isset($res['bavistin'])) ? $res['bavistin']: '', ['class' => '', 'placeholder' => '']) !!}  </td>
                          </tr>
                          
                           <tr>
                        <td><b>6</b></td>
                        <td><b>Dhanvit (Ltrs)</b></td>
                        <td>{!! Form::text('dhanvit',(isset($res['dhanvit'])) ? $res['dhanvit']: '', ['class' => '', 'placeholder' => '']) !!}  </td>
                          </tr>
                          
                           <tr>
                        <td><b>7</b></td>
                        <td><b>Multiplex (Ltrs)</b></td>
                        <td>{!! Form::text('multiplex',(isset($res['multiplex'])) ? $res['multiplex']: '', ['class' => '', 'placeholder' => '']) !!}  </td>
                          </tr>
                          
                           <tr>
                        <td><b>8</b></td>
                        <td><b>Furadon (G) (Kgs)</b></td>
                        <td>{!! Form::text('furadon',(isset($res['furadon'])) ? $res['furadon']: '', ['class' => '', 'placeholder' => '']) !!}  </td>
                          </tr>
                          
                            <tr>
                        <td><b>9</b></td>
                        <td><b>Phorate (G) (Kgs)</b></td>
                        <td>{!! Form::text('phorate',(isset($res['phorate'])) ? $res['phorate']: '', ['class' => '', 'placeholder' => '']) !!}  </td>
                          </tr>
                           
                            <tr>
                        <td><b>10</b></td>
                        <td><b>19-19-19 (Kgs)</b></td>
                        <td>{!! Form::text('nineteenkgs',(isset($res['nineteenkgs'])) ? $res['nineteenkgs']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                          </tr>
                          
                           <tr>
                        <td><b>11</b></td>
                        <td><b>19-19-19 (Kgs) Soluble</b></td>
                        <td>{!! Form::text('nineteenkgssoluble',(isset($res['nineteenkgssoluble'])) ? $res['nineteenkgssoluble']: '', ['class' => '', 'placeholder' => '']) !!}  </td>
                          </tr>
                          
                           
                           <tr>
                        <td><b>12</b></td>
                        <td><b>Acephate (75 SP)</b></td>
                        <td>{!! Form::text('acephate',(isset($res['acephate'])) ? $res['acephate']: '', ['class' => '', 'placeholder' => '']) !!}  </td>
                          </tr>
                            
                           <tr>
                        <td><b>13</b></td>
                        <td><b>17-17-17 (Kgs)</b></td>
                        <td>{!! Form::text('seventeenkgs',(isset($res['seventeenkgs'])) ? $res['seventeenkgs']: '', ['class' => '', 'placeholder' => '']) !!}  </td>
                          </tr>
                          
                            <tr>
                        <td><b>14</b></td>
                        <td><b>Urea (Kgs)</b></td>
                        <td>{!! Form::text('urea',(isset($res['urea'])) ? $res['urea']: '', ['class' => '', 'placeholder' => '']) !!}  </td>
                          </tr>
                          
                           <tr>
                        <td><b>15</b></td>
                        <td><b>Potash</b></td>
                        <td>{!! Form::text('potash',(isset($res['potash'])) ? $res['potash']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                          </tr>
                          
                           <tr>
                        <td><b>16</b></td>
                        <td><b>Rogor (Ltrs)</b></td>
                        <td>{!! Form::text('rogar',(isset($res['rogar'])) ? $res['rogar']: '', ['class' => '', 'placeholder' => '']) !!}  </td>
                          </tr>
                          
                          <tr>
                        <td><b>17</b></td>
                        <td><b>Malathian (Ltrs)</b></td>
                        <td>{!! Form::text('malathian',(isset($res['malathian'])) ? $res['malathian']: '', ['class' => '', 'placeholder' => '']) !!}  </td>
                          </tr>
                          
                            <tr>
                        <td><b>18</b></td>
                        <td><b>Fouate (Kgs)</b></td>
                        <td>{!! Form::text('fouate',(isset($res['fouate'])) ? $res['fouate']: '', ['class' => '', 'placeholder' => '']) !!}  </td>
                          </tr>
                          
                           <tr>
                        <td><b>19</b></td>
                        <td><b>15-15-15 (Kgs)</b></td>
                        <td>{!! Form::text('fifteenkgs',(isset($res['fifteenkgs'])) ? $res['fifteenkgs']: '', ['class' => '', 'placeholder' => '']) !!}  </td>
                          </tr>
                          
                           <tr>
                        <td><b>20</b></td>
                        <td><b>2-4 D (Kgs)</b></td>
                        <td>{!! Form::text('twofourdkgs',(isset($res['twofourdkgs'])) ? $res['twofourdkgs']: '', ['class' => '', 'placeholder' => '']) !!}  </td>
                          </tr>
                          
                           <tr>
                        <td><b>21</b></td>
                        <td><b>Glycil (Ltrs)</b></td>
                        <td>{!! Form::text('glycil',(isset($res['glycil'])) ? $res['glycil']: '', ['class' => '', 'placeholder' => '']) !!}  </td>
                          </tr>
                          
                           <tr>
                        <td><b>22</b></td>
                        <td><b>16-16-16 (Kgs)</b></td>
                        <td>{!! Form::text('sixteenkgs',(isset($res['sixteenkgs'])) ? $res['sixteenkgs']: '', ['class' => '', 'placeholder' => '']) !!}  </td>
                          </tr>
                          
                           <tr>
                        <td><b>23</b></td>
                        <td><b>Arrow (Ltrs)</b></td>
                        <td>{!! Form::text('arrowltrs',(isset($res['arrowltrs'])) ? $res['arrowltrs']: '', ['class' => '', 'placeholder' => '']) !!}  </td>
                          </tr>
                          
                           <tr>
                        <td><b>24</b></td>
                        <td><b>Biowet (Ltrs)</b></td>
                        <td>{!! Form::text('biowetltrs',(isset($res['biowetltrs'])) ? $res['biowetltrs']: '', ['class' => '', 'placeholder' => '']) !!} </td>
                          </tr>
                          
                          <tr>
                        <td><b>25</b></td>
                        <td><b>Blitax (fungicide) (Kgs)</b></td>
                        <td>{!! Form::text('blitaxkgs',(isset($res['blitaxkgs'])) ? $res['blitaxkgs']: '', ['class' => '', 'placeholder' => '']) !!}  </td>
                          </tr>
                          
                          <tr>
                            <td><b>26</b></td>
                            <td><b>20-20-20 (Kgs)</b></td>
                            <td>{!! Form::text('twentykgs',(isset($res['twentykgs'])) ? $res['twentykgs']: '', ['class' => '', 'placeholder' => '']) !!}  </td>
                          </tr>
                          
                           <tr>
                            <td><b>27</b></td>
                            <td><b>Lambda cyhalothrin (Ltrs)</b></td>
                            <td>{!! Form::text('cyhalothrinltrs',(isset($res['cyhalothrinltrs'])) ? $res['cyhalothrinltrs']: '', ['class' => '', 'placeholder' => '']) !!}  </td>
                          </tr>
						  
						  <tr>
                            <td><b>28</b></td>
                            <td><b>Effinity (Kgs)</b></td>
                            <td>{!! Form::text('effinity',(isset($res['effinity'])) ? $res['effinity']: '', ['class' => '', 'placeholder' => '']) !!}  </td>
                          </tr>
                          
                           <tr>
                        <td><b>29</b></td>
                        <td><b>Watering</b></td>
                        <td>{!! Form::text('watering',(isset($res['watering'])) ? $res['watering']: '', ['class' => '', 'placeholder' => '']) !!}  </td>
                          </tr>
                          
                           <tr>
                        <td><b>30</b></td>
                        <td><b>Cleaning</b></td>
                        <td>{!! Form::text('cleaning',(isset($res['cleaning'])) ? $res['cleaning']: '', ['class' => '', 'placeholder' => '']) !!}  </td>
                          </tr>
                           <tr>
                        <td><b>31</b></td>
                        <td><b>Weeding</b></td>
                        <td>{!! Form::text('weeding',(isset($res['weeding'])) ? $res['weeding']: '', ['class' => '', 'placeholder' => '']) !!}  </td>
                          </tr>
                           <tr>
                        <td><b>32</b></td>
                        <td><b>Cutting</b></td>
                        <td>{!! Form::text('cutting',(isset($res['cutting'])) ? $res['cutting']: '', ['class' => '', 'placeholder' => '']) !!}  </td>
                          </tr>
                           <tr>
                        <td><b>33</b></td>
                        <td><b>Mulching</b></td>
                        <td>{!! Form::text('multching',(isset($res['multching'])) ? $res['multching']: '', ['class' => '', 'placeholder' => '']) !!}  </td>
                          </tr>
                           <tr>
                        <td><b>34</b></td>
                        <td><b>Trimming</b></td>
                        <td>{!! Form::text('trimming',(isset($res['trimming'])) ? $res['trimming']: '', ['class' => '', 'placeholder' => '']) !!}  </td>
                          </tr>
                           <tr>
                        <td><b>35</b></td>
                        <td><b>Training(Shaping)</b></td>
                        <td>{!! Form::text('training_shaping',(isset($res['training_shaping'])) ? $res['training_shaping']: '', ['class' => '', 'placeholder' => '']) !!}  </td>
                          </tr>
                           <tr>
                        <td><b>36</b></td>
                        <td><b>Pruning</b></td>
                        <td>{!! Form::text('pruning',(isset($res['pruning'])) ? $res['pruning']: '', ['class' => '', 'placeholder' => '']) !!}  </td>
                          </tr>
                           <tr>
                        <td><b>37</b></td>
                        <td><b>Hoeing</b></td>
                        <td>{!! Form::text('hoeing',(isset($res['hoeing'])) ? $res['hoeing']: '', ['class' => '', 'placeholder' => '']) !!}  </td>
                          </tr>
                           <tr>
                        <td><b>38</b></td>
                        <td><b>Lawn Moving</b></td>
                        <td>{!! Form::text('lawn_moving',(isset($res['lawn_moving'])) ? $res['lawn_moving']: '', ['class' => '', 'placeholder' => '']) !!}  </td>
                          </tr>
                           <tr>
                        <td><b>39</b></td>
                        <td><b>Fertilizer Application</b></td>
                        <td>{!! Form::text('fertilizer_application',(isset($res['fertilizer_application'])) ? $res['fertilizer_application']: '', ['class' => '', 'placeholder' => '']) !!}  </td>
                          </tr>
                           <tr>
                        <td><b>40</b></td>
                        <td><b>Organic Manure Application</b></td>
                        <td>{!! Form::text('organic_manure_app',(isset($res['organic_manure_app'])) ? $res['organic_manure_app']: '', ['class' => '', 'placeholder' => '']) !!}  </td>
                          </tr>
                           <tr>
                        <td><b>41</b></td>
                        <td><b>Spraying-Chemicals(Pest&Disease control)</b></td>
                        <td>{!! Form::text('spraying_chemicals',(isset($res['spraying_chemicals'])) ? $res['spraying_chemicals']: '', ['class' => '', 'placeholder' => '']) !!}  </td>
                          </tr>
                           <tr>
                        <td><b>42</b></td>
                        <td><b>Micro Nutrients Application</b></td>
                        <td>{!! Form::text('micro_nutrients',(isset($res['micro_nutrients'])) ? $res['micro_nutrients']: '', ['class' => '', 'placeholder' => '']) !!}  </td>
                          </tr>
                           <tr>
                        <td><b>43</b></td>
                        <td><b>Weedicide Application</b></td>
                        <td>{!! Form::text('weedicide_application',(isset($res['weedicide_application'])) ? $res['weedicide_application']: '', ['class' => '', 'placeholder' => '']) !!}  </td>
                          </tr>
                           <tr>
                        <td><b>44</b></td>
                        <td><b>Avg Man Days per Day: Deployment / Total</b></td>
                        <td>{!! Form::text('mandays_perday',(isset($res['mandays_perday'])) ? $res['mandays_perday']: '', ['class' => '', 'placeholder' => '']) !!}  </td>
                          </tr>
			</tbody>
		</table>  