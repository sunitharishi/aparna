
 <style>
		.blue-strip
		{
		background: url(../images/strip.jpg) repeat-x center;
		 padding:5px;
		 color:green;
		 font-size:16px;
		 clear:both;
		 display: block;
		}
		/*.blue-strip h4
		{
		
        font-size: 16px;
       
        
		}*/
		
		.error
		{
			border:2px solid #FF0000 !important;
		}
		.blue-strip p
		{
		 margin:5px 0px;
		}
  		.settingsites .row .title
		{
		padding-right:40px;
		}
		</style>       
                   
                   <?php //print_r($res); ?>
        
           
           <div class="title">&nbsp;</div>
         <div class="fmshol">  
            
           <div class="fmwid">
              <div class="row fmshed">
            	  <div class="title12">Title</div> 
                    <div class="title12">Minimum</div> 
                   
                     <div class="title12">Maximum</div> <br/>
                </div>  
                      
                     <div class="ctrr">
                       <div class="larct"><b>CTPT</b></div>   
                      
					   {!! Form::text('ctptmin', $res['ctptmin'], ['class' => 'ereq larev resetval', 'placeholder' => '']) !!}
                       {!! Form::text('ctptmax',$res['ctptmax'], ['class' => 'ereq larev2 resetval', 'placeholder' => '']) !!}
					   
					    {{ Form::hidden('record', $res['id']) }}
                       
                     </div>
                     
                     <div class="ctrr">
                       <div class="larct"><b>Residents</b></div>   
                        {!! Form::text('residentsmin', $res['residentsmin'], ['class' => 'ereq larev resetval', 'placeholder' => '']) !!}
                       {!! Form::text('residentsmax',$res['residentsmax'], ['class' => 'ereq larev2 resetval', 'placeholder' => '']) !!}
                       
                     </div>
                     
                     <div class="ctrr">
                       <div class="larct"><b>Club House</b></div>   
                       {!! Form::text('clubhousemin', $res['clubhousemin'], ['class' => 'ereq larev resetval', 'placeholder' => '']) !!}
                       {!! Form::text('clubhousemax',$res['clubhousemax'], ['class' => 'ereq larev2 resetval', 'placeholder' => '']) !!}
                       
                     </div> 
                     
                      <div class="ctrr">
                       <div class="larct"><b>STP</b></div>   
                       {!! Form::text('stpmin', $res['stpmin'], ['class' => 'ereq larev resetval', 'placeholder' => '']) !!}
                       {!! Form::text('stpmax',$res['stpmax'], ['class' => 'ereq larev2 resetval', 'placeholder' => '']) !!}
                       
                     </div>
                     
                      <div class="ctrr">
                       <div class="larct"><b>WSP</b></div>   
                     {!! Form::text('wspmin', $res['wspmin'], ['class' => 'ereq larev resetval', 'placeholder' => '']) !!}
                       {!! Form::text('wspmax',$res['wspmax'], ['class' => 'ereq larev2 resetval', 'placeholder' => '']) !!}
                       
                     </div>
                     
                      <div class="ctrr">
                       <div class="larct"><b>LIFTS Usage</b></div>   
                       {!! Form::text('liftsusmin', $res['liftsusmin'], ['class' => 'ereq larev resetval', 'placeholder' => '']) !!}
                       {!! Form::text('liftsusmax',$res['liftsusmax'], ['class' => 'ereq larev2 resetval', 'placeholder' => '']) !!}
                       
                     </div>
                     
                      <div class="ctrr">
                       <div class="larct"><b>Vendors</b></div>   
                       {!! Form::text('vendormin', $res['vendormin'], ['class' => 'ereq larev resetval', 'placeholder' => '']) !!}
                       {!! Form::text('vendormax',$res['vendormax'], ['class' => 'ereq larev2 resetval', 'placeholder' => '']) !!}
                       
                     </div>
                   </div>
                   
                   
                   <div class="fmwid2">
              <div class="row fmshed">
            	  <div class="title12">Title</div> 
                    <div class="title12">Minimum</div> 
                   
                     <div class="title12">Maximum</div> <br/>
                </div>  
                      
                     <div class="ctrr2">
                       <div class="larct"><b>Common Area</b></div>   
                      {!! Form::text('commonareamin', $res['commonareamin'], ['class' => 'ereq larev resetval', 'placeholder' => '']) !!}
                       {!! Form::text('commonareamax',$res['commonareamax'], ['class' => 'ereq larev2 resetval', 'placeholder' => '']) !!}
                       
                     </div>
                     
                     <div class="ctrr2">
                       <div class="larct"><b>Metro</b></div>   
                       {!! Form::text('metromin', $res['metromin'], ['class' => 'ereq larev resetval', 'placeholder' => '']) !!}
                       {!! Form::text('metromax',$res['metromax'], ['class' => 'ereq larev2 resetval', 'placeholder' => '']) !!}
                       
                     </div>
                     
                     <div class="ctrr2">
                       <div class="larct"><b>Total Water<br /> Consumption</b></div>   
                      {!! Form::text('twaterconmin', $res['twaterconmin'], ['class' => 'ereq larev resetval', 'placeholder' => '']) !!}
                       {!! Form::text('twaterconmax',$res['twaterconmax'], ['class' => 'ereq larev2 resetval', 'placeholder' => '']) !!}
                       
                     </div>
                     
                      <div class="ctrr2">
                       <div class="larct"><b>Average<br />Treated Water</b></div>   
                      {!! Form::text('avgtreatwatermin', $res['avgtreatwatermin'], ['class' => 'ereq larev resetval', 'placeholder' => '']) !!}
                       {!! Form::text('avgtreatwatermax',$res['avgtreatwatermax'], ['class' => 'ereq larev2 resetval', 'placeholder' => '']) !!}
                       
                     </div>
                     <div class="ctrr2">
                       <div class="larct"><b>Swimming Pool PH</b></div>   
                     {!! Form::text('swimphmin', $res['swimphmin'], ['class' => 'ereq larev resetval', 'placeholder' => '']) !!}
                       {!! Form::text('swimphmax',$res['swimphmax'], ['class' => 'ereq larev2 resetval', 'placeholder' => '']) !!}
					   
                     </div>
                     <div class="ctrr2">
                       <div class="larct"><b>Water Bodies PH</b></div>   
                      {!! Form::text('waterbodyphpmin', $res['waterbodyphpmin'], ['class' => 'ereq larev resetval', 'placeholder' => '']) !!}
                       {!! Form::text('waterbodyphpmax',$res['waterbodyphpmax'], ['class' => 'ereq larev2 resetval', 'placeholder' => '']) !!}
                       
                     </div>
                     
                   </div>
                   
            <div class="fmwid3">
           <div class="title" style="margin-bottom:20px;">&nbsp;</div>
               
           <div class="fmswidw">
             <div class="title1"><b>No of Lifts:</b></div>
                <div class="col-xs-12 form-group">
                    {!! Form::label('residentmin', 'Total', ['class' => 'ereq control-label nlab resetval']) !!}
                    {!! Form::text('lifsnum',$res['lifsnum'], ['class' => 'ereq form-control nlab2 resetval', 'placeholder' => '']) !!}
                </div>
           </div>
                     
         <div class="fmswidw">         
            <div class="title1"><b>No of Borewells:</b></div>
                <div class="col-xs-12 form-group">
                    {!! Form::label('residentmin', 'Total', ['class' => 'ereq control-label nlab resetval']) !!}
                    {!! Form::text('borewellsnum',$res['borewellsnum'], ['class' => 'ereq form-control nlab2 resetval', 'placeholder' => '']) !!}
                    
                </div>
           </div>     
           
         <div class="fmswidw">           
            <div class="title1"><b>No of DG Sets:</b></div>
                <div class="col-xs-12 form-group">
                    {!! Form::label('residentmin', 'Total', ['class' => 'ereq control-label nlab resetval']) !!}
                     {!! Form::text('dgsetsnum',$res['dgsetsnum'], ['class' => 'ereq form-control nlab2 resetval', 'placeholder' => '']) !!}
                    
                </div>
        </div>     
          <div class="fmswidw">      
                <div class="title1"><b>Gas(Cylinders):</b></div>
                <div class="col-xs-12 form-group">
                    {!! Form::label('residentmin', 'Total', ['class' => 'ereq control-label nlab resetval']) !!}
                 {!! Form::text('gascylindernum',$res['gascylindernum'], ['class' => 'ereq form-control nlab2 resetval', 'placeholder' => '']) !!}
                    
                </div>
         </div>
                 
                 </div> 
                 
              </div> 
                     
                       
               
                     
                
         
            
            <div class="blue-strip">
            	<p><b>MIS (Equipment)</b></p>
            </div>
            
          <div class="fmsbag">  
            
            <div class="fmwid22">
              <div class="row fmshed2">
                     <div class="title1">Electrical Distribution System(HT)</div> 
                </div>  
                      
                     <div class="ctrr2">
                       <div class="larctram"><b>3 Panel</b></div>   
                       {!! Form::text('mis3panel', $res['mis3panel'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                         
                     </div>
                     
                      <div class="ctrr2">
                       <div class="larctram"><b>4 Panel</b></div>   
                       {!! Form::text('mis4panel', $res['mis4panel'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                         
                     </div>
                     
                     <div class="ctrr2">
                       <div class="larctram"><b>CTPT</b></div>   
                      {!! Form::text('misctpt', $res['misctpt'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                          
                       
                     </div>
                     
                     <div class="ctrr2">
                       <div class="larctram"><b>5 Panel </b></div>   
                       {!! Form::text('mis5panel', $res['mis5panel'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                      </div>
                     
                     <!-- <div class="ctrr2">
                       <div class="larctram"><b>Average<br />Treated Water</b></div>   
                     {!! Form::text('misavgtreatwater', $res['misavgtreatwater'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                      </div>-->
                      
                     <div class="row fmshed2">
                      <div class="title1">Elevators & Backup  Power</div> 
                    </div> 
                      
                      <div class="ctrr2">
                       <div class="larctram"><b>Partial/Full Backup</b></div>   
                    {!! Form::text('mispartialbkp', $res['mispartialbkp'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                      </div>
                      <div class="ctrr2">
                       <div class="larctram"><b>Ard Battery</b></div>   
                     {!! Form::text('misfullbkp', $res['misfullbkp'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                      </div> 
                      
                      <div class="row fmshed2">
                      <div class="title1">Water Distribution System</div> 
                    </div> 
                      
                      <div class="ctrr2">
                       <div class="larctram"><b>DWS</b></div>   
                       {{ Form::select('misdws', [
                        '' => 'Select',
                        'Yes' => 'Yes',
                          'No' => 'No'],$res['misdws'], ['class' => 'ereq larevv resetval']
                        ) }} 
                       
                      </div>
                      <div class="ctrr2">
                       <div class="larctram"><b>FWS</b></div>   
                       {{ Form::select('misfws', [
                        '' => 'Select',
                        'Yes' => 'Yes',
                          'No' => 'No'],$res['misfws'], ['class' => 'ereq larevv resetval']
                        ) }} 
                         
                      </div>
                      
                      <div class="ctrr2">
                       <div class="larctram"><b>PRV's</b></div>   
                      {!! Form::text('misprv', $res['misprv'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                      </div>
                      <div class="ctrr2">
                       <div class="larctram"><b>Sewerage System</b></div>   
                       {{ Form::select('missewaragesys', [
                        '' => 'Select',
                        'Yes' => 'Yes',
                          'No' => 'No'],$res['missewaragesys'], ['class' => 'ereq larevv resetval']
                        ) }} 
                        
                      </div>
                       
                     <div class="row fmshed2">
                      <div class="title1">De-watering System</div> 
                    </div>
                    
                    <div class="ctrr2">
                       <div class="larctram"><b>Storm Water Pump</b></div>   
                     {!! Form::text('misstromwaterpump', $res['misstromwaterpump'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                      </div>
                      
                      <div class="ctrr2">
                       <div class="larctram"><b>Oozing Pump</b></div>   
                     {!! Form::text('misoozingpump', $res['misoozingpump'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                      </div>
                      
                      <div class="row fmshed2">
                      <div class="title1">Metro Water Supply</div> 
                    </div>
                    
                    <div class="ctrr2">
                       <div class="larctram"><b>HMWS&SB Meter</b></div>   
                     {!! Form::text('mishmws', $res['mishmws'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                      </div>
                      
                </div>
                   
                   
                   
                   <div class="fmwid222">
              <div class="row fmshed2">
                     <div class="title1">Electrical Distribution System(HT)</div> 
                </div>  
                      
                     <div class="ctrr2">
                       <div class="larct22"><b>Transformers</b></div>   
                    {!! Form::text('mistransformers', $res['mistransformers'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                       </div>
                     
                     <div class="ctrr2">
                       <div class="larct22"><b>Main Pcc Panel</b></div>   
                    {!! Form::text('mismainpccpanel', $res['mismainpccpanel'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                       </div>
                     
                     <div class="ctrr2">
                       <div class="larct22"><b>APFCR </b></div>   
                   {!! Form::text('misapfcr', $res['misapfcr'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                       </div>
                     
                      <div class="ctrr2">
                       <div class="larct22"><b>Common Supply Panel </b></div>   
                 {!! Form::text('miscommsuppanel', $res['miscommsuppanel'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                       </div>
                     
                     <div class="ctrr2">
                       <div class="larct22"><b>Bus Duct </b></div>   
                   {!! Form::text('misbusduct', $res['misbusduct'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                      </div>
                     
                     <div class="ctrr2">
                       <div class="larct22"><b>Distribution Board</b></div>   
                   {!! Form::text('misdistriboard', $res['misdistriboard'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                         
                       
                     </div>
                     
                     <div class="ctrr2">
                       <div class="larct22"><b>VCB</b></div>   
                     {!! Form::text('misvcb', $res['misvcb'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                      </div>
                      
                      <div class="ctrr2">
                       <div class="larct22"><b>ACB</b></div>   
                     {!! Form::text('misacb', $res['misacb'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                      </div>
                      
                      <div class="ctrr2">
                       <div class="larct22"><b>Landscape Lighting Panel</b></div>   
                     {!! Form::text('mislandpanel', $res['mislandpanel'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                      </div>
                      
                       <div class="ctrr2">
                       <div class="larct22"><b>Ch Panel</b></div>   
                     {!! Form::text('ch_panel', $res['ch_panel'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                      </div>
                       
                      <div class="ctrr2">
                       <div class="larct22"><b>Lighting Arrestor</b></div>   
                    {!! Form::text('mislightarestr', $res['mislightarestr'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                      </div>
                      
                      <div class="ctrr2">
                       <div class="larct22"><b>Total No. Of Lights</b></div>   
                      {!! Form::text('mistotlightsnum', $res['mistotlightsnum'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                      </div>
                  <div class="row fmshed2">
                     <div class="title1">Rain Water System</div> 
                   </div> 
                      
                     <div class="ctrr2">
                       <div class="larct22"><b>Excess Rain Water Pump</b></div>   
                      {!! Form::text('misexsrainwatpmp', $res['misexsrainwatpmp'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                      </div>
                      
                      <div class="ctrr2">
                       <div class="larct22"><b>Rain Water Harvesting Pits</b></div>   
                     {!! Form::text('misrainharvest', $res['misrainharvest'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                      </div> 
          </div>
            
            <div class="fmwid222">
              <div class="row fmshed2">
                     <div class="title1">Landscape Water Distribution</div> 
                </div>  
                      
                     <div class="ctrr2">
                       <div class="larct22"><b>Irrigation Pumps</b></div>   
                    {!! Form::text('misirrigationpumps', $res['misirrigationpumps'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                          
                       
                     </div>
                     
                     <div class="ctrr2">
                       <div class="larct22"><b>Irrigation Pump Panels</b></div>   
                       {!! Form::text('misirrigationpmppan', $res['misirrigationpmppan'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                          
                       
                     </div>
                     
                     <div class="ctrr2">
                       <div class="larct22"><b>Irrigation Sprinkler Automation System </b></div>   
                      {{ Form::select('misirrgsprinkautosys', [
                        '' => 'Select',
                        'Auto' => 'Auto',
                          'Manual' => 'Manual'],$res['misirrgsprinkautosys'], ['class' => 'ereq larevv resetval']
                        ) }} 
                         
                         
                       
                     </div>
                     
                      <div class="ctrr2">
                       <div class="larct22"><b>Water Body Pumps</b></div>   
                    {!! Form::text('miswatrbodypumps', $res['miswatrbodypumps'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                         
                       
                     </div>
                     
                     <div class="ctrr2">
                       <div class="larct22"><b>Mist Fountain </b></div>   
                   {!! Form::text('mismistfoun', $res['mismistfoun'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                        
                     </div>
                  <div class="row fmshed2">
                     <div class="title1">Swimming Pool</div> 
                </div> 
                   
                   <div class="ctrr2">
                       <div class="larct22"><b>Indoor Pool Pumps</b></div>  
                    <!--    {{ Form::select('misindoorpool', [
                        '' => 'Select',
                        'Yes' => 'Yes',
                          'No' => 'No'],$res['misindoorpool'], ['class' => 'ereq larevv resetval']
                        ) }}  
                        -->
                         {!! Form::text('misindoorpool', $res['misindoorpool'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                          
                        
                     </div>
                     <div class="ctrr2">
                       <div class="larct22"><b>Outdoor Pool Pumps</b></div>   
                     <!--   {{ Form::select('misoutdoorpool', [
                        '' => 'Select',
                        'Yes' => 'Yes',
                          'No' => 'No'],$res['misoutdoorpool'], ['class' => 'ereq larevv resetval']
                        ) }} -->
                        {!! Form::text('misoutdoorpool', $res['misoutdoorpool'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                        
                        
                     </div>
                     <div class="ctrr2">
                       <div class="larct22"><b>Baby Pool</b></div>   
                        {{ Form::select('misbabypool', [
                        '' => 'Select',
                        'Yes' => 'Yes',
                          'No' => 'No'],$res['misbabypool'], ['class' => 'ereq larevv resetval']
                        ) }} 
                        
                        
                     </div> 
                     
                     <div class="row fmshed2">
                     <div class="title1">Security</div> 
                   </div> 
                   
                   <div class="ctrr2">
                       <div class="larct22"><b>Boom Barrier</b></div>   
                    {!! Form::text('misboombarrier', $res['misboombarrier'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                      </div>
                     <div class="ctrr2">
                       <div class="larct22"><b>Solar Fencing Zones</b></div>  
                        {{ Form::select('missolarfencingzone', [
                        '' => 'Select',
                        '1' => '1',
                        '2' => '2',
                        '3' => '3',
                        '4' => '4'],$res['missolarfencingzone'], ['class' => 'ereq larevv resetval']
                        ) }} 
                     <?php /*?>  {!! Form::text('ctptmin[]', $res['ctpt']['min'], ['class' => 'ereq larevv', 'placeholder' => '']) !!}<?php */?>
                         
                      </div>
                     <div class="ctrr2">
                       <div class="larct22"><b>CCTV</b></div>   
                     {!! Form::text('miscctv', $res['miscctv'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                      </div> 
                      
                     <div class="row fmshed2">
                     <div class="title1">Reticulated Piped Gas</div> 
                   </div>
                   
                   <div class="ctrr2">
					   <div class="larct22"><b>Gas Bank & Chambers</b></div>   
				   		{!! Form::text('misgasbankcham', $res['misgasbankcham'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
				   </div>
                      
                         
                  <div class="row fmshed2">
                     <div class="title1">Air Handling Unit(AHU)</div> 
                   </div>
                   <div class="ctrr2">
                       <div class="larct22"><b>Fresh Air</b></div>   
                    {!! Form::text('misfreshair', $res['misfreshair'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                      </div>
                      <div class="ctrr2">
                       <div class="larct22"><b>STP AHU</b></div>   
                    {!! Form::text('misstpahu', $res['misstpahu'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                      </div>
             </div>
             
           </div>  
		   
		   <div class="pmsbg mis-capacity-transformers"> 
          <div class="piland newzealand"> 
          <div class="row sect2">
                <div class="title1"></div>   
                <div class="col-xs-12 form-group pinlan">
                    {!! Form::label('cmd_in_kva', 'CMD in KVA', ['class' => 'ereq control-label']) !!} 
                    {!! Form::text('cmd_in_kva', $res['cmd_in_kva'], ['class' => 'ereq form-control resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('cmd_in_kva'))
                        <p class="help-block">
                            {{ $errors->first('cmd_in_kva') }}
                        </p>
                    @endif
                </div>
             </div>
               
             <div class="row sect2">
                <div class="title1"></div>   
                <div class="col-xs-12 form-group pinlan">
                    {!! Form::label('transformer_kva', 'Transformer Capacity(KVA)', ['class' => 'ereq control-label']) !!}
                    {!! Form::text('transformer_kva', $res['transformer_kva'], ['class' => 'ereq form-control resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('transformer_kva'))
                        <p class="help-block">
                            {{ $errors->first('transformer_kva') }}
                        </p>
                    @endif
                </div>
             </div>
              
          </div>
          
          <div class="piland2 finland"> 
             
             <div class="row sect3"> 
                <div class="title1"></div>   
                <div class="col-xs-12 form-group pinlan">
                    {!! Form::label('dg_set_kva', 'DG Set Capacity(KVA)', ['class' => 'ereq control-label']) !!}
                    {!! Form::text('dg_set_kva', $res['dg_set_kva'], ['class' => 'ereq form-control resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('dg_set_kva'))
                        <p class="help-block">
                            {{ $errors->first('dg_set_kva') }}
                        </p>
                    @endif
                </div>
             </div>  
			 
			 <div class="row sect3">
                <div class="title1"></div>   
                <div class="col-xs-12 form-group pinlan">
                    {!! Form::label('service_number', 'Service Number', ['class' => 'ereq control-label']) !!}
                    {!! Form::text('service_number', $res['service_number'], ['class' => 'ereq form-control resetval', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('service_number'))
                        <p class="help-block">
                            {{ $errors->first('service_number') }}
                        </p>
                    @endif
                </div>
             </div>
             
          </div>
          
          
       </div>
            
            
             <div class="blue-strip">
            	<p><b>MIS (STP)</b></p>
            </div>
            
            <div class="fmshol">
            
               <div class="fmwidmis2">
              <div class="row fmshed2">
                     <div class="title1">Electro-Mechanical Equipment</div> 
                </div>  
                      
                     <div class="ctrr2">
                       <div class="larct22"><b>Bar Screen Chamber</b></div>   
                     {!! Form::text('stpbarscreencham', $res['stpbarscreencham'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                       </div>
                     
                     <div class="ctrr2">
                       <div class="larct22"><b>Raw Sewage Pumps</b></div>   
                     {!! Form::text('stprawsewagepump', $res['stprawsewagepump'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                       </div>
                     
                     <div class="ctrr2">
                       <div class="larct22"><b>Air Blowers </b></div>   
                     {!! Form::text('stpairbowlers', $res['stpairbowlers'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                       </div>
                     
                      <div class="ctrr2">
                       <div class="larct22"><b>Return Sludge Pumps</b></div>   
                    {!! Form::text('stpretsludpumps', $res['stpretsludpumps'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                       </div>
                     
                     <div class="ctrr2">
                       <div class="larct22"><b>Filter Feed Pumps</b></div>   
                      {!! Form::text('stpfilterfeedpump', $res['stpfilterfeedpump'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                      </div>
                     
                     <div class="ctrr2">
                       <div class="larct22"><b>Screw / Centrifuge Feed Pumps</b></div>   
                    {!! Form::text('stpscrewpumps', $res['stpscrewpumps'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                      </div>
                     
                     <div class="ctrr2">
                       <div class="larct22"><b>Centrifuge / Filter Press</b></div>   
                    {!! Form::text('stpcentrifilpress', $res['stpcentrifilpress'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                      </div>
                      
                      <div class="ctrr2">
                       <div class="larct22"><b>De-watering Pump</b></div>   
                    {!! Form::text('stpdewaterpump', $res['stpdewaterpump'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                      </div>
                      
                      <div class="ctrr2">
                       <div class="larct22"><b>Air Handling Unit</b></div>   
                    {!! Form::text('stphairhandunit', $res['stphairhandunit'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                      </div>
                      
                       <div class="ctrr2">
                       <div class="larct22"><b>Chlorine Dosing Pump</b></div>   
                      {!! Form::text('chlorinedosingpump', $res['chlorinedosingpump'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                      </div>
                      
                      <div class="ctrr2">
                       <div class="larct22"><b>UV System</b></div>   
                     {!! Form::text('uvsystem', $res['uvsystem'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                      </div>
                      
                      <div class="ctrr2">
                       <div class="larct22"><b>Hydro Pneumatic Pumps</b></div>   
                      {!! Form::text('hydronumaticpump', $res['hydronumaticpump'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                      </div>
                   
          </div>
          
          <div class="fmwidmis2">
              <div class="row fmshed2">
                     <div class="title1">Electrical Panels</div> 
                </div>  
                      
                     <div class="ctrr2">
                       <div class="larct22"><b>Pneumatic System Panel</b></div>   
                     {!! Form::text('pneumaticsyspanel', $res['pneumaticsyspanel'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                       </div>
                     
                     <div class="ctrr2">
                       <div class="larct22"><b>STP MCC Panel</b></div>   
                   {!! Form::text('stpmccpanel', $res['stpmccpanel'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                       </div>
                       
                    <div class="row fmshed2">
                       <div class="title1">Filtration</div> 
                   </div> 
                     
                     <div class="ctrr2">
                       <div class="larct22"><b>Pressure Sand Filter</b></div>   
                     {!! Form::text('pressuresandfilter', $res['pressuresandfilter'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                       </div>
                     
                      <div class="ctrr2">
                       <div class="larct22"><b>Activated Carbon Filter</b></div>   
                   {!! Form::text('activatedcarbonfilter', $res['activatedcarbonfilter'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                       </div>
                       
                    <div class="row fmshed2">
                       <div class="title1">Flow Details</div> 
                   </div>
                     
                     <div class="ctrr2">
                       <div class="larct22"><b>Average Inflow</b></div>   
                    {!! Form::text('averageinflow', $res['averageinflow'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                      </div>
                     
                     <div class="ctrr2">
                       <div class="larct22"><b>Average Outflow to garden, fire and flush</b></div>   
                     {!! Form::text('avgoutflowtogar', $res['avgoutflowtogar'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                      </div>
                     
                     <div class="ctrr2">
                       <div class="larct22"><b>Average By-Pass</b></div>   
                     {!! Form::text('avgbypass', $res['avgbypass'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                      </div>
                      
                      <div class="ctrr2">
                       <div class="larct22"><b>Average Outflow to other sites</b></div>   
                      {!! Form::text('avgoutflowothersites', $res['avgoutflowothersites'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                      </div>
                      
                       <div class="ctrr2">
                       <div class="larct22"><b>Next filter media replacement date</b></div>   
                    {!! Form::text('nextfilterreplacement', $res['nextfilterreplacement'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                      </div>
					  
					   <div class="ctrr2">
                       <div class="larct22"><b>Capacity</b></div>   
                    {!! Form::text('stpmiscapacity', $res['stpmiscapacity'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                      </div>
                        
                    
          </div>
            
             
      </div>
            
             
             <div class="blue-strip">
            	<p><b>MIS (WSP)</b></p>
            </div>
            
            <!--<div class="col-sm-12 col-xs-12 especially-heading">
               <h4><span><b>MIS (WSP)</b></span></h4>
           </div>-->
            
            <div class="fmsbag">
            
              <div class="fmwidmis2">
              <div class="row fmshed2">
                     <div class="title1">Electro-Mechanical Equipment</div> 
                </div>  
                      
                     <div class="ctrr2">
                       <div class="larct22"><b>Filter Feed Pump</b></div>   
                    {!! Form::text('filterfeedpump', $res['filterfeedpump'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                       </div>
                     
                     <div class="ctrr2">
                       <div class="larct22"><b>De-watering Pump</b></div>   
                    {!! Form::text('wspdewateringpump', $res['wspdewateringpump'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                       </div>
                      
                     <div class="ctrr2">
                       <div class="larct22"><b>Chlorine Dosing Pump</b></div>   
                      {!! Form::text('wspchlorinedospmp', $res['wspchlorinedospmp'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                       </div>
                     
                      <div class="ctrr2">
                       <div class="larct22"><b>Hydro Pneumatic Pump</b></div>   
                     {!! Form::text('wsphydronumaticpump', $res['wsphydronumaticpump'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                       </div>
                       
                    <div class="row fmshed2">
                       <div class="title1">Electrical Panels</div> 
                   </div>
                     
                     <div class="ctrr2">
                       <div class="larct22"><b>Pneumatic System Panel</b></div>   
                      {!! Form::text('wspnumaticsyspanel', $res['wspnumaticsyspanel'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                      </div>
                     
                     <div class="ctrr2">
                       <div class="larct22"><b>WSP MCC Panel</b></div>   
                      {!! Form::text('wspmccpanel', $res['wspmccpanel'], ['class' => 'ereq larevv resetval', 'placeholder resetval' => '']) !!}
                      </div>
               </div>
                
               
               <div class="fmwidmis2">
              <div class="row fmshed2">
                     <div class="title1">Filtration</div> 
                </div>  
                      
                     <div class="ctrr2">
                       <div class="larct22"><b>Pressure Sand Filter</b></div>   
                     {!! Form::text('wsppresssandfilter', $res['wsppresssandfilter'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                       </div>
                     
                     <div class="ctrr2">
                       <div class="larct22"><b>Softener</b></div>   
                    {!! Form::text('wspsoftener', $res['wspsoftener'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                       </div>
                      
                       <div class="row fmshed2">
                       <div class="title1">Flow Details</div> 
                      </div>
                      
                     <div class="ctrr2">
                       <div class="larct22"><b>OBR Value</b></div>   
                       {!! Form::text('wspobrvalue', $res['wspobrvalue'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                       </div>
                     
                      <div class="ctrr2">
                       <div class="larct22"><b>Raw Water PPM Level</b></div>   
                       {!! Form::text('wsprawwatppm', $res['wsprawwatppm'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                       </div>
                       
                      <div class="ctrr2">
                       <div class="larct22"><b>Water PPM to be maintained as per IS standard</b></div>   
                    {!! Form::text('wspwaterppmstand', $res['wspwaterppmstand'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                      </div>
                      
               </div>
               
                 <div class="nextct">
                       <div class="filtermed"><b>Next filter media replacement date</b></div>   
                     {!! Form::text('wspmediarepladate', $res['wspmediarepladate'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                 </div>
                 
                  <div class="nextct">
					   <div class="filtermed"><b>Contracted Quantity in KL</b></div>   
                     {!! Form::text('contracted_quantity_kl', $res['contracted_quantity_kl'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                 </div>
                 
                  <div class="nextct">
					  <div class="filtermed"><b>Capacity</b></div>   
                    {!! Form::text('wspmiscapacity', $res['wspmiscapacity'], ['class' => 'ereq larevv resetval', 'placeholder' => '']) !!}
                      </div> 
					</div>
                    
                       <div class="updatebtn" style="margin-top:10px;">
                            {!! Form::submit('Update', ['class' => 'ereq btn btn-danger']) !!}  
                            {!! Form::button('Reset', ['class' => 'ereq btn btn-reser', 'id' => 'resetall']) !!}
            		 </div>
					 
					 
					 