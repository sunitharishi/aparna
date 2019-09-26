   <div class="movement">
		<!--<table class="tablesaw tablesaw-swipe" data-tablesaw-mode="swipe" data-tablesaw-minimap="" width="100%" border="1" cellspacing="1">
         {!! Form::hidden('record_id',(isset($res['id'])) ? $res['id']: '0', ['class' => 'larev', 'placeholder' => '','id' => 'record_id']) !!}
						    {!! Form::hidden('site',$site, ['class' => 'larev', 'placeholder' => '']) !!}
			<tr style="background-color:#416a7b;color:#fff;">
            	<td colspan="2" style="text-align:center;"> </td>
            </tr>
            <tr style="background-color:#416a7b;color:#fff;">
               <td><b>Particulars</b></td>
               <td><b><?php echo $selsitename;  ?></b></td>
            </tr>
            <tr>
             	<td><b></b></td>
                <td> </td>
            </tr>
             <tr>
             	<td></td>
                <td> </td>
            </tr>
             <tr>
             	<td></td>
                <td> </td>
            </tr>
             <tr>
             	<td></td>
                 <td> </td>
            </tr>
             <tr>
             	<td></td>
                 <td></td>
            </tr>
             <tr>
             	<td></td>
                <td> </td>
            </tr>
             <tr>
             	<td></td>
                <td></td>
            </tr>
		</table> --> 
        <div class="traffipage trffica-page-edit">
       
         {!! Form::hidden('record_id',(isset($res['id'])) ? $res['id']: '0', ['class' => 'larev', 'placeholder' => '','id' => 'record_id']) !!}
						    {!! Form::hidden('site',$site, ['class' => 'larev', 'placeholder' => '']) !!}
         <div class="trafficpeg">
           <label ><b>Residents Vehicle (4 & 2 wheelers)</b></label>
           {!! Form::text('resident_vehicle',(isset($res['resident_vehicle'])) ? $res['resident_vehicle']: '', ['class' => '', 'placeholder' => '']) !!}
          </div>
           
          <div class="trafficpeg"> 
             <label > <b>Temporary Vendors (persons)</b></label>
             {!! Form::text('temp_vendors',(isset($res['temp_vendors'])) ? $res['temp_vendors']: '', ['class' => '', 'placeholder' => '']) !!}
         </div>
         
           <div class="trafficpeg"> 
             <label ><b>Courier / Delivery Boys (Persons)</b></label>
             {!! Form::text('courier_delivery',(isset($res['courier_delivery'])) ? $res['courier_delivery']: '', ['class' => '', 'placeholder' => '']) !!}
         </div>
         
          <div class="trafficpeg"> 
             <label ><b>Visitors</b></label>
            {!! Form::text('visitors',(isset($res['visitors'])) ? $res['visitors']: '', ['class' => '', 'placeholder' => '']) !!}
         </div>
         
          <div class="trafficpeg"> 
             <label ><b>Construction Team (persons)</b></label>
           {!! Form::text('construc_team',(isset($res['construc_team'])) ? $res['construc_team']: '', ['class' => '', 'placeholder' => '']) !!} 
         </div>
         
          <div class="trafficpeg"> 
             <label ><b>Inter Works in flats/Villas</b></label>
          {!! Form::text('interworks_inflats',(isset($res['interworks_inflats'])) ? $res['interworks_inflats']: '', ['class' => '', 'placeholder' => '']) !!}
         </div>
         
          <div class="trafficpeg"> 
             <label ><b>Interior Workers per day</b></label>
            {!! Form::text('interior_works_per_day',(isset($res['interior_works_per_day'])) ? $res['interior_works_per_day']: '', ['class' => '', 'placeholder' => '']) !!}          </div>
         
     
       </div>
        
       </div>