@extends('layouts.app')

@section('content')
<style>
#footer
{
 left:0px;
 right:0px;
 margin:0 auto;
}
</style>
    <link href="../css1/bootstrap-responsive.css" rel="stylesheet">
    <div class="community-show-pg editshowpage">
    	<div class="col-sm-12" style="padding:0px;">
        
        
           <div class="panel-heading dirtylkjljj sites-view-heading">
               Community
             <a href="{{ route('sites.index') }}" class="btn green-back" style="float:right;">Back</a>
		  </div>
        
  <!------------------project------------------->  
		   <div class="col-sm-12 col-xs-12 project-details">
		      <div class="col-sm-3 project-code"><b>Project Code: </b> <?php if(isset($site['scode'])) echo $site['scode'];  ?></div>
			  <div class="col-sm-6 project-name"><b>Project Name: </b> <?php if(isset($site['name'])) echo $site['name'];  ?> </div>
			<?php if(isset($site['logoimage'])) { if($site['logoimage']) { ?> <div class="col-sm-3 project-logo"><b>Logo: </b><a href="/<?php if(isset($site['logoimage'])) echo $site['logoimage'];  ?>" target="_blank">View Image</a> </div> <?php } } ?>
		   </div>
    <!------------------project------------------->  
       
    <!------------------address------------------->       
         <div class="col-sm-12 col-xs-12 address-details">
         
		   <div class="col-sm-12 col-xs-12 project-address">ADDRESS</div>
		   <?php if(isset($site['plot_num'])) { if($site['plot_num']) { ?>
		    <div class="col-sm-2 form-group project-plotno"><b>Plot No </b><br /><?php echo $site['plot_num']; ?></div>
		   <?php }} ?>
           
		     <?php if(isset($site['hnum'])) { if($site['hnum']) { ?>
		    <div class="col-sm-2 form-group project-houseno"><b>H.NO </b><br /><?php echo $site['hnum']; ?></div>
		   <?php }} ?>
           
		     <?php if(isset($site['hnum'])) { if($site['hnum']) { ?>
		    <div class="col-sm-2 form-group project-nearplace"><b>Near By Place </b><br /><?php echo $site['hnum']; ?></div>
		   <?php }} ?>
           
		     <?php if(isset($site['village'])) { if($site['village']) { ?>
		    <div class="col-sm-2 form-group project-village"><b>Village / Town </b><br /><?php echo $site['village']; ?> </div>
		   <?php }} ?>
           
		     <?php if(isset($site['mandal'])) { if($site['mandal']) { ?>
		    <div class="col-sm-2 form-group project-mandal"><b>Mandal </b><br /><?php echo $site['mandal']; ?> </div>
		   <?php }} ?>
           
		     <?php if(isset($site['district'])) { if($site['district']) { ?>
		    <div class="col-sm-2 form-group project-district"><b>District </b><br /><?php echo $site['district']; ?> </div>
		   <?php }} ?>
           
		  
		     <?php if(isset($site['state'])) { if($site['state']) { ?>
		    <div class="col-sm-2 form-group project-state"><b>State </b><br /><?php echo $site['state']; ?> </div>
		   <?php }} ?>
		   
		     <?php if(isset($site['pincode'])) { if($site['pincode']) { ?>
		    <div class="col-sm-2 form-group project-pincode"><b>Pin Code </b><br /><?php echo $site['pincode']; ?> </div>
		   <?php }} ?>
		  </div>
          <!------------------address------------------->     
      
   <!------------------geographical-location------------------->   
         <div class="col-sm-12 col-xs-12 geographical-location">
		     <div class="col-sm-12 col-xs-12 geographical-heading">Geographical Location</div>
		     <?php if(isset($site['geo_latitude'])) { if($site['geo_latitude']) { ?>
		    <div class="col-sm-2 form-group geographical-latitude"><b>Latitude </b><br /><?php echo $site['geo_latitude']; ?> </div>
		   <?php }} ?>
		   
		    
		     <?php if(isset($site['geo_longitude'])) { if($site['geo_longitude']) { ?>
		    <div class="col-sm-2 form-group geographical-longitude"><b>Longitude </b><br /><?php echo $site['geo_longitude']; ?> </div>
            
             
		   <?php }} ?>
		 </div>
          
       
     <!------------------geographical-location------------------->  
      
       <!----------renewal-maintainance-------->



           <div class="col-sm-12 col-xs-12 project-renewal1">
           
		   <div class="col-sm-12 col-xs-12 project-renewal-maintenance">Project Renewal Maintenance</div>
           
            <div class="col-sm-12 col-xs-12 maintenance-section">
            
            
              <div class="col-sm-3 prepaid-maintenance">
		     <div class="col-sm-12 col-xs-12 prepaid-card"><b>Prepaid</b></div>
		    <?php if(isset($site['prepaid_start_date'])) { if($site['prepaid_start_date']) { ?>
		    <div class="col-sm-6 start-date"><label>Start Date </label><br /> <?php echo $site['prepaid_start_date']; ?> </div>
		   <?php }} ?>
		    <?php if(isset($site['prepaid_end_date'])) { if($site['prepaid_end_date']) { ?>
		    <div class="col-sm-6 end-date"><label>End Date </label><br /> <?php echo $site['prepaid_end_date']; ?></div>
		   <?php }} ?>
		   </div>
           
             <div class="col-sm-3 postpaid-maintenance">
             <?php $mgp = 0; if(count($postpaid) > 0) {
				 $mgp = 0; ?> <div class="postpaid-card"><b>Post Paid</b></div>
                 
                 <div class="postpaid-tablediv table-responsive">
                 <table width="100%" border="1" class="postpaid-table">
                    <thead>
                      <tr>
                        <th>S.No</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                      </tr>
                    </thead>
                
                 
                  <tbody>
				 <?php 
			foreach($postpaid as $dgcon) { //echo "<pre>"; // print_r($dgcon); echo "</pre>";?>
            
           
               <tr>
                 <td> <?php $mgp = $mgp + 1; echo $mgp; ?></td>
                 <td><?php echo  $dgcon['post_start_date']; ?></td>
                 <td><?php echo  $dgcon['post_end_date']; ?></td>
               </tr>
           
			     <?php } ?> 
               </tbody> 
          </table>
          </div>
                 <?php  } ?> 
                 
                 
                 
		         </div>
                 
                 
               </div>
             </div>
      <!----------renewal-maintainance-------->
      
      
     <!---------------overview--------------> 
         <div class="col-sm-12 col-xs-12 project-overview">    
		    <div class="col-sm-12 col-xs-12 community-overivew"> Over View</div>
            
		<?php if(isset($site['igbc_certified'])) { if($site['igbc_certified']) { ?>
		<div class="col-sm-2 igbc-ceritified"><b>IGBC Certified </b><br /> <?php echo $site['igbc_certified']; ?></div>
		
		<?php if($site['igbc_certified'] == 'Yes') { ?>
		
		   <div class="col-sm-2 rating"><b>Rating </b><br /> <?php if(isset($site['rating']))echo $site['rating']; ?></div>
		 
		<?php }} } ?>
		
		 <?php if(isset($site['tot_site_area'])) { if($site['tot_site_area']) { ?>
		    <div class="col-sm-2 total-site-area"><b>Total Site Area </b><br /> <?php echo $site['tot_site_area']; ?></div>
		   <?php }} ?>
		    <?php if(isset($site['built_up_area'])) { if($site['built_up_area']) { ?>
		    <div class="col-sm-2 builtup-area"><b>Built-up Area </b><br /> <?php echo $site['built_up_area']; ?></div>
		   <?php }} ?>
		     <?php if(isset($site['scalablearea'])) { if($site['scalablearea']) { ?>
		    <div class="col-sm-2 saleable-area"><b>Saleable Area </b><br /> <?php echo $site['scalablearea']; ?></div>
		   <?php }} ?>
		    <?php if(isset($site['open_space'])) { if($site['open_space']) { ?>
		    <div class="col-sm-2 open-space"><b>Open Space </b><br /> <?php echo $site['open_space']; ?></div>
		   <?php }} ?>
           
         </div>
		 <!---------------overview-------------->    
           
           
        <!---------------flats-villas-------------->      
         <div class="col-sm-12 col-xs-12 flats-villas1"> 
            
		   <?php if(isset($site['flat_type'])) { if($site['flat_type']) { ?>
		    <div class="col-sm-12 form-group flatsvillas-selection"><b>Flats / Villas </b><br /> <?php echo $site['flat_type']; ?></div>
            
             <?php if($site['flat_type'] == 'villas') { ?>
		    <div class="col-sm-2 no-ofvillas"><b>No. of Villas </b><br /> <?php echo $site['num_of_vallas']; ?></div>
		   <?php } ?>
             <?php if($site['flat_type'] == 'flats') { ?>
		    <div class="col-sm-4 flats-begin"><div class="form-group"><b>No. of Flats: </b> <span class="colunt"><?php echo $site['num_of_flats']; ?></span></div>
		   <?php } ?>
            
			 <?php if($site['flat_type'] == 'flats') { ?>
             <div class="flats-tablediv table-responsive">
             <table width="100%" border="1" class="flats-table">
                 <thead>
                   <tr>
                     <th>1BHK</th>
                     <th>2BHK</th>
                     <th>3BHK</th>
                     <th>4BHK</th>
                     <th>5BHK</th>
                   </tr>
                 </thead>
            
             
            <tbody> 
              <tr>
                <td> <?php if(isset($flats['onebhk'])) echo $flats['onebhk']; ?></td>
                <td> <?php  if(isset($flats['twobhk'])) echo $flats['twobhk']; ?></td>
                <td> <?php  if(isset($flats['threebhk']))echo $flats['threebhk']; ?></td>
                <td> <?php  if(isset($flats['fourbhk'])) echo $flats['fourbhk']; ?></td>
                <td> <?php   if(isset($flats['fivebhk'])) echo $flats['fivebhk']; ?></td>
               </tr>
           </tbody>
            </table>
            </div>
		   <?php } ?>
          </div> 
           
		   
		   
	 <?php if($site['flat_type'] == 'flats') { ?>
			<?php if($site['blocks_num'] == 'Yes') { ?>
			  <?php if(isset($site['num_of_blocks_text'])) { if($site['num_of_blocks_text']) { ?>
		    <div class="col-sm-4 blocks-begin"><div class="form-group"><b>No. of Blocks: </b> <?php echo $site['num_of_blocks_text']; ?></div>
			
            <?php if(count($firenoc) > 0) { ?>
            <div class="blocks-tablediv table-responsive">
            <table width="100%" border="1" class="blocks-table">
               <thead>
                 <tr>
                   <th>S.No</th>
                   <th>Block Name</th>
                   <th>Name Change Society</th>
                 </tr>
               </thead>
           
              <tbody>
			 <?php $m = 0; if(count($firenoc) > 0) {
				 $m = 0;
			foreach($firenoc as $dgcon) {?>
            
                <tr>
                  <td><?php $m = $m + 1; echo $m; ?></td>
                  <td><?php echo  $dgcon['blockname']; ?></td>
                 <td><?php echo  $dgcon['name_change_socity']; ?></td>
               </tr>
                <?php } } ?>
                </tbody>
                </table>
                </div>
                <?php } ?>
		   <?php } } } }?></div>
           
		   
           
           <div class="col-sm-12 col-xs-12 floors-basement-number">
		   <?php if($site['num_of_floors'] == 'Yes') { ?>
			  <?php if(isset($site['num_of_floors_text'])) { if($site['num_of_floors_text']) { ?>
		    <div class="col-sm-2 form-group no-of-floors"><b>No. of Floors </b><br /> <?php echo $site['num_of_floors_text']; ?></div>
			
		   <?php } } } ?>
		   
		     
		   <?php } }?>
		    
		    <?php if(isset($site['basement_one'])) { if($site['basement_one']) { ?>
		<div class="col-sm-2 form-group basement"><b>Basement </b><br /> <?php echo $site['basement_one']; ?></div>
		
		<?php if($site['basement_one'] == 'Yes') { ?>
		
		   <div class="col-sm-2 form-group number"><b>Number </b><br /> <?php if(isset($site['basement_text']))echo $site['basement_text']; ?></div>
		 
         
		<?php } ?> <?php } } ?></div>
		
        </div>
        
		
      <!---------------flats-villas-------------->
       <!---------------helipad-------------->
         <div class="col-sm-12 col-xs-12 helipad-overview"> 
		   <?php if(isset($site['hard_land_scpae_area'])) { if($site['hard_land_scpae_area']) { ?>
		    <div class="col-sm-2 form-group hardlandscape-area"><b>Hardlandscape Area </b><br /> <?php echo $site['hard_land_scpae_area']; ?></div>
		   <?php }} ?>
           
		   <?php if(isset($site['soft_land_scpae_area'])) { if($site['soft_land_scpae_area']) { ?>
		    <div class="col-sm-2 form-group softlandscape-area"><b>Softlandscape Area </b><br /> <?php echo $site['soft_land_scpae_area']; ?></div>
		   <?php }} ?>
		   
		 <?php if(isset($site['helipad'])) { if($site['helipad']) { ?>
		<div class="col-sm-2 form-group helipad-area"><b>Helipad Area </b><br /> <?php echo $site['helipad']; ?></div>
		
		<?php if($site['helipad'] == 'Yes') { ?>
		
		   <div class="col-sm-2 form-group helipad-number"><b>Number </b><br /> <?php if(isset($site['helipad_text']))echo $site['helipad_text']." Mtrs."; ?></div>
		   
		   <?php if(isset($site['helippad_file'])) { if($site['helippad_file']) { ?> <div class="col-sm-2 form-group helipad-view"><b>Helipad </b><br /> <a href="/<?php if(isset($site['helippad_file'])) echo $site['helippad_file'];  ?>" target="_blank">View Image</a></div> <?php } } ?>
		 
		<?php }} } ?>
			
           </div>
  <!---------------helipad-------------->
  
  
 <!---------------harvesting-------------->
         <div class="col-sm-12 col-xs-12 harvesting">    
			
			
		   <?php if(isset($site['rainwater_harvest'])) { if($site['rainwater_harvest']) { ?>
		    <div class="col-sm-3 rainwater-harvestingpits"><b>Rainwater Harvesting Pits </b><br /> <?php echo $site['rainwater_harvest']; ?></div>
		   <?php }} ?>
		   
		      <?php if(isset($site['borewells'])) { if($site['borewells']) { ?>
		    <div class="col-sm-1 borewells"><b> Borewells </b><br /> <?php echo $site['borewells']; ?></div>
		   <?php }} ?>
		 </div>
    <!---------------harvesting-------------->
    <!---------------elevators-------------->     
         
		 <div class="col-sm-12 col-xs-12 elevators-section"> 
		   <?php if(isset($site['lifts'])) { if($site['lifts']) { ?>
		     <div class="col-sm-4 elevstors-lifts"><div class="form-group"><b>Lifts/Elevators: </b>  <span class="lifts-count"><?php echo $site['lifts']; ?></span></div>
			
            <?php if(count($lifts) > 0) { ?>
            <div class="liftselevators-tablediv table-responsive">
            <table width="100%" border="1" class="liftselevators-table">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Lift Number</th>
                  <th>Make</th>
                  <th>Type</th>
                </tr>
              </thead>
            
            <tbody>
			  <?php $mgl = 0; if(count($lifts) > 0) {
				 $mgl = 0;
			foreach($lifts as $dgcon) { //echo "<pre>"; print_r($dgcon); echo "</pre>";?>
			     <tr>
                   <td><?php $mgl = $mgl + 1; echo $mgl; ?></td>
                   <td><?php echo  $dgcon['lift_num']; ?></td> 
                   <td><?php echo  $dgcon['make']; ?></td>
                   <td><?php echo  $dgcon['type']; ?></td>
                 </tr>
			     <?php } } ?>
			   </tbody>
            </table>
            </div>
			<?php } ?>
          
		   </div>
             <?php }} ?>
           
           
           <div class="col-sm-6 solar-popup">
			 <?php if(isset($site['solar_water_heater'])) { if($site['solar_water_heater']) { ?>
		      <div class="col-sm-7 col-xs-7 form-group solarwater-heater"><b>Solar Water Heaters: </b> <span><?php echo $site['solar_water_heater']; ?></span></div>
		
		      <?php if($site['solar_water_heater'] == 'Yes') { ?>
		
		  <?php if(isset($site['solar_water_heat_text'])) { if($site['solar_water_heat_text']) { ?>
		      <div class="col-sm-5 col-xs-5 form-group solar-number"><b> Number: </b> <span><?php echo $site['solar_water_heat_text']; ?></span> </div>  
		   <?php }} ?>
         <?php if(count($solarsys) > 0) { ?>
         <div class="solarwater-tablediv table-responsive">
          <table width="100%" border="1" class="solarwater-table">
             <thead>
                <tr>
                  <th>S.No</th>
                  <th>Location</th>
                  <th>Capacity</th>
                  <th>Make</th>
                </tr>
           </thead>
        <tbody>
         
           <?php $mt = 0; if(count($solarsys) > 0) {
				 $mt = 0;
			foreach($solarsys as $dgcon) { //echo "<pre>"; print_r($dgcon); echo "</pre>";?>
          
		      <tr>
                 <td><?php $mt = $mt + 1; echo $mt; ?></td>
                 <td> <?php    echo  $dgcon['location']; ?></td>
                  <td><?php    echo  $dgcon['capacity']; ?></td>
                  <td> <?php echo  $dgcon['make']; ?></td>
               </tr>
               
                <?php }  ?> <?php  } ?> 
		    </tbody>
		 </table>
         </div>
		 <?php } ?>
		<?php }} } ?>
       
		 </div>
       </div>
         
         
         <!---------------elevators--------------> 
         
         <!---------------bms-------------->         
          <div class="col-sm-12 col-xs-12 bms-section">    
           
		  <div class="col-sm-12 col-xs-12 bms-heading">BMS</div>
		   <?php if(isset($site['bms_prepaid'])) { if($site['bms_prepaid']) { ?>
		    <div class="col-sm-4 form-group prepaid-systems"><b>Prepaid  Systems </b><br /> <?php echo $site['bms_prepaid']; ?></div>
		   <?php }} ?>
		   
		    <?php if(isset($site['bms_postpaid'])) { if($site['bms_postpaid']) { ?>
		    <div class="col-sm-4 form-group postpaid-systems"><b>PostPaid Systems </b><br /> <?php echo $site['bms_postpaid']; ?></div>
		   <?php }} ?>
		   
		    <?php if(isset($site['bms_irrigation_sys'])) { if($site['bms_irrigation_sys']) { ?>
		    <div class="col-sm-4 form-group irrigation-systems"><b>Irrigation System</b><br /> <?php echo $site['bms_irrigation_sys']; ?></div>
		   <?php }} ?>
		</div>
	 <!----------------bms-------------->
     
     	 <!----------------electrical-distribution--------------> 
	    <div class="col-sm-12 col-xs-12 electrical-distribution">    
			<div class="col-sm-12 col-xs-12 electrical-distributionview">Electrical Distribution System</div>
			
			  <?php if(isset($site['contracted_md'])) { if($site['contracted_md']) { ?>
		    <div class="col-sm-2 form-group contracted-md"><b>Contracted MD (KVA/HP)</b><br /> <?php echo $site['contracted_md']; ?></div>
		   <?php }} ?>
		   
		     <?php if(isset($site['specified_voltage'])) { if($site['specified_voltage']) { ?>
		    <div class="col-sm-3 form-group specified-voltage"><b>Specified Voltage(KV)</b><br /> <?php echo $site['specified_voltage']; ?></div>
		   <?php }} ?>
		   
		      <?php if(isset($site['actuval_voltage'])) { if($site['actuval_voltage']) { ?>
		    <div class="col-sm-2 form-group actual-voltage"><b>Actual Voltage(KV)</b><br /> <?php echo $site['actuval_voltage']; ?></div>
		   <?php }} ?>
		   
		      <?php if(isset($site['feeder'])) { if($site['feeder']) { ?>
		    <div class="col-sm-2 form-group feeder"><b>Feeder</b><br /> <?php echo $site['feeder']; ?></div>
		   <?php }} ?>
		   
		    <?php if(isset($site['category'])) { if($site['category']) { ?>
		    <div class="col-sm-2 form-group category"><b>Category</b><br /> <?php echo $site['category']; ?></div>
		   <?php }} ?>
		   
           
             <!-------transformers-set--------------->
        <div class="col-sm-12 col-xs-12 transrer-section">
		   <?php if(isset($site['transformers'])) { if($site['transformers']) { ?>
		   <div class="col-sm-5 transformers-section"> <div class="form-group"><b>Transformers: </b> <span><?php echo $site['transformers']; ?></span></div>
			
            <?php if(count($transformer) > 0) { ?>
            <div class="transformers-tablediv table-responsive">
              <table width="100%" border="1" class="transformers-table">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Capacity</th>
                    <th>Location</th>
                    <th>Make</th>
                    <th>Image</th>
                  </tr>
                </thead>
                
			<tbody>
			  <?php $mt = 0; if(count($transformer) > 0) {
				 $mt = 0;
			foreach($transformer as $dgcon) { //echo "<pre>"; print_r($dgcon); echo "</pre>";?>
          
       
             <tr>
                <td><?php $mt = $mt + 1; echo $mt; ?></td>
                <td> <?php    echo  $dgcon['capacity']; ?></td>
				 <td><?php    echo  $dgcon['location']; ?></td>
                 <td><?php echo  $dgcon['make']; ?></td>
				 <td><?php if(isset($dgcon['filename'])) { if($dgcon['filename']) { ?> <div></div><a href="/<?php if(isset($dgcon['filename'])) echo $dgcon['filename'];  ?>" target="_blank">View</a><?php } } ?></td>
                  
                  </tr>
                <?php } } ?> 
                </tbody>
                </table>
                </div>
               <?php } ?>
               
               
               </div>
		   <?php }} ?>
        
            
           
		 <!-------transformers-set--------------->	
            
            <!-----------------dg-set--------------->
            <div class="col-sm-12 col-xs-12 desets-section">
			 <?php if(isset($site['dgsets'])) { if($site['dgsets']) { ?>
		   <div class="col-sm-5 dgsets-section"> <div class="form-group"><b>DG Sets:</b> <span><?php echo $site['dgsets']; ?></span></div>
			
           <?php if(count($dgsets) > 0) { ?>
           <div class="dgsets-tablediv table-responsive">
           
			<table width="100%" border="1" class="dgsets-table">
             <thead>
               <tr>
                  <th>S.No</th>
                  <th>Capacity</th>
                  <th>Location</th>
                  <th>Make</th>
                  <th>Image</th>
               </tr>
             </thead>
            
              <tbody>
                <?php $mt = 0; if(count($dgsets) > 0) {
				 $mt = 0;
			foreach($dgsets as $dgcon) { //echo "<pre>"; print_r($dgcon); echo "</pre>";?>
           
              <tr>
                   <td><?php $mt = $mt + 1; echo $mt; ?></td>
                   <td><?php    echo  $dgcon['capacity']; ?></td>
				    <td><?php    echo  $dgcon['location']; ?></td>
                   <td><?php echo  $dgcon['make']; ?></td>
					<td> <?php if(isset($dgcon['filename'])) { if($dgcon['filename']) { ?> <div></div><a href="/<?php if(isset($dgcon['filename'])) echo $dgcon['filename'];  ?>" target="_blank">View</a><?php } } ?></td>
                 </tr>
                <?php } } ?>
                 </tbody>
              </table>
              </div>
              <?php } ?>
            </div>
			 <?php }} ?>
             
               <?php if(isset($site['power_backup'])) { if($site['power_backup']) { ?>
		    <div class="col-sm-2 form-group power-backup"><b> Power Back-Up:</b> <span> <?php echo $site['power_backup']; ?></span></div>
            
            
		   <?php }} ?>
             </div>
            </div> 
        <!-----------------dg-set--------------->
		   
        <!---------------solar-------------->
        
         <div class="col-sm-12 col-xs-12 power-solarpowersection">  
		  
		   
		 <div class="col-sm-6 solar-powernumbner">
		    <?php if(isset($site['solar_power'])) { if($site['solar_power']) { ?>
		<div class="col-sm-6 form-group solarpower"><b>Solar Power: </b> <?php echo $site['solar_power']; ?></div>
		
		<?php if($site['solar_power'] == 'Yes') { ?>
		
		  <?php if(isset($site['solar_pwr_text'])) { if($site['solar_pwr_text']) { ?>
		  <div class="col-sm-6 form-group solarnumber"><b>Solar Power Number: </b> <span> <?php echo $site['solar_pwr_text']; ?></span></div>
		   <?php }} ?>
          
           
		<?php if(count($solarpwrsys) > 0) { ?>
        
        <div class="solarpower-tablediv table-responsive">
          <table width="100%" border="1" class="solarpower-table">
          
            <thead>
              <tr>
                <th>S.No</th>
                <th>Capacity</th>
                <th>Location</th>
                <th>Make</th>
                <th>Image</th>
              </tr>
            </thead>
           
          <tbody>
          
            <?php $mt = 0; if(count($solarpwrsys) > 0) {
				 $mt = 0;
			foreach($solarpwrsys as $dgcon) { //echo "<pre>"; print_r($dgcon); echo "</pre>";?>
         
                 <tr>
              
                   <td><?php $mt = $mt + 1; echo $mt; ?></td>
                
                    <td><?php    echo  $dgcon['capacity']; ?></td>
                
				    <td><?php    echo  $dgcon['location']; ?></td>
              
                     <td><?php echo  $dgcon['make']; ?></td>
               
					<td><?php if(isset($dgcon['filename'])) { if($dgcon['filename']) { ?> <a href="/<?php if(isset($dgcon['filename'])) echo $dgcon['filename'];  ?>" target="_blank">View</a><?php } } ?></td>
                  
                
                   </tr>
                <?php } } ?>
		     </tbody>
		  </table>
          </div>
          <?php } ?>
		<?php }} } ?>
         </div>
		<!---------------solar------------->
		</div>
       </div>
       <!----------------electrical-distribution--------------> 
       
       
      <!--------------water-distribution------------->
        <div class="col-sm-12 col-xs-12 waterdistribution-system">  
           <div class="col-sm-12 col-xs-12 waterdistribution-heading">Water Distribution System</div>  
		
		    <?php if(isset($site['municipal_water'])) { if($site['municipal_water']) { ?>
		<div class="col-sm-2 form-group municipal-water"><b>Municipal Water </b><br /> <?php echo $site['municipal_water']; ?></div>
		
		<?php if($site['municipal_water'] == 'Yes') { ?>
		
		  <?php if(isset($site['contracted_kl'])) { if($site['contracted_kl']) { ?>
		  <div class="col-sm-2 form-group contracted-kl"><b>Contracted (KL) </b><br /> <?php echo $site['contracted_kl']; ?></div>
		   <?php }} ?>
		
		<?php }} } ?>
		
		
        
        <div class="col-sm-12 col-xs-12 wsp-stpsection">
		   <?php if(isset($site['wsp'])) { if($site['wsp']) { ?>
           <div class="col-sm-6 wsp-section">
		    <div class="col-sm-12 form-group wsp-addingpoopup"><b>Wsp:</b> <span><?php echo $site['wsp']; ?></span></div>
			
         <?php if(count($wsp) > 0) { ?>
         <div class="wep-tablediv table-responsive">
		<table width="100%" border="1" class="wsp-table">
              
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Phase</th>
                  <th>Capacity</th>
                  <th>Make</th>
                  <th>Image</th>
                </tr>
              </thead>
          
          <tbody>    
             <?php $mt = 0; if(count($wsp) > 0) {
				 $mt = 0;
			foreach($wsp as $dgcon) { //echo "<pre>"; print_r($dgcon); echo "</pre>";?>
			
             <tr>
               <td><?php $mt = $mt + 1; echo $mt; ?></td>
            
                  
                     <td><?php    echo  $dgcon['type']; ?></td>
              
                     <td><?php    echo  $dgcon['capacity']; ?></td>
              
                    <td><?php echo  $dgcon['make']; ?></td>
               
					 <td><?php if(isset($dgcon['filename'])) { if($dgcon['filename']) { ?> <div></div><a href="/<?php if(isset($dgcon['filename'])) echo $dgcon['filename'];  ?>" target="_blank">View</a><?php } } ?></td>
                  
                </tr>
            
                <?php } } ?> 
              </tbody>
			</table>
            </div>
              <?php } ?>
            </div>  
             <?php }} ?>
			
          
           
			
			 <?php if(isset($site['stp'])) { if($site['stp']) { ?>
		   <div class="col-sm-6 sep-section"> <div class="col-sm-12 form-group stp-popupadding"><b>Stp:</b> <span><?php echo $site['stp']; ?></span></div>
			
            <?php if(count($stp) > 0) { ?>
            <div class="stp-tablediv table-responsive">
			<table width="100%" border="1" class="stp-table">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Phase</th>
                  <th>Capacity</th>
                  <th>Make</th>

                  <th>Image</th>
                  <th>Technology</th>
                </tr>
              </thead>
          
          <tbody>  
             <?php $mt = 0; if(count($stp) > 0) {
				 $mt = 0;
			foreach($stp as $dgcon) { //echo "<pre>"; print_r($dgcon); echo "</pre>";?>
			
            
              <tr>
               <td> <?php $mt = $mt + 1; echo $mt; ?></td>
            
               <td><?php    echo  $dgcon['type']; ?></td>
               
                   <td><?php    echo  $dgcon['capacity']; ?></td>
                
				
                    <td><?php echo  $dgcon['make']; ?></td>
                
              
					<td><?php if(isset($dgcon['filename'])) { if($dgcon['filename']) { ?> <a href="/<?php if(isset($dgcon['filename'])) echo $dgcon['filename'];  ?>" target="_blank">View</a><?php } } ?></td>

                    <td> <?php echo  $dgcon['technology']; ?></td>
               
                
                 </tr>
                <?php } } ?> 
                </tbody>
			  </table>
              </div>
              <?php } ?>
              </div>
			  <?php }} ?>
            
            </div>
            
            <!------------hydropneumatic----------->
           
     <div class="col-sm-12 col-xs-12 water-supply">
		<div class="col-sm-12 col-xs-12 hydro-popupadding"><b>Hydro Pneumatic System </b> </div>
      
      
      <div class="col-sm-6 form-group municipal-water-supply1">
			 <label class="col-sm-12 col-xs-12 control-label">Municipal Water Supply</label>
			 
			  <?php if(isset($site['mws_pums_num'])) { if($site['mws_pums_num']) { ?>
		<div class="col-sm-4"><b>Pumps Number </b><br /> <?php echo $site['mws_pums_num']; ?></div>
		<?php }} ?>
		
		 <?php if(isset($site['mws_make'])) { if($site['mws_make']) { ?>
		<div class="col-sm-4"><b>Make </b><br /> <?php echo $site['mws_make']; ?></div>
		<?php }} ?>
		
		 <?php if(isset($site['mws_capacity'])) { if($site['mws_capacity']) { ?>
		<div class="col-sm-4"><b>Capacity</b><br /> <?php echo $site['mws_capacity']; ?></div>
		<?php }} ?>
		</div>
		
        
        <div class="col-sm-6 form-group domestic-water-supply1">
		 <label class="col-sm-12 col-xs-12 control-label">Domestic Water Supply</label>
		
		  <?php if(isset($site['dws_pums_num'])) { if($site['dws_pums_num']) { ?>
		<div class="col-sm-4"><b>Pumps Number </b><br /> <?php echo $site['dws_pums_num']; ?></div>
		<?php }} ?>
		
		 <?php if(isset($site['dws_make'])) { if($site['dws_make']) { ?>
		<div class="col-sm-4"><b>Make </b><br /> <?php echo $site['dws_make']; ?></div>
		<?php }} ?>
		
		 <?php if(isset($site['dws_capacity'])) { if($site['dws_capacity']) { ?>
		<div class="col-sm-4"><b>Capacity </b><br /> <?php echo $site['dws_capacity']; ?></div>
		<?php }} ?>
		</div>
		
        <div class="col-sm-6 form-group flush-water-supply1">
		 <label class="col-sm-12 col-xs-12 control-label">Flush Water Supply</label>
		
		  <?php if(isset($site['fws_pums_num'])) { if($site['fws_pums_num']) { ?>
		<div class="col-sm-4"><b>Pumps Number </b><br /> <?php echo $site['fws_pums_num']; ?></div>
		<?php }} ?>
		
		 <?php if(isset($site['fws_make'])) { if($site['fws_make']) { ?>
		<div class="col-sm-4"><b>Make </b><br /> <?php echo $site['fws_make']; ?></div>
		<?php }} ?>
		
		 <?php if(isset($site['fws_capacity'])) { if($site['fws_capacity']) { ?>
		<div class="col-sm-4"><b>Capacity </b><br /> <?php echo $site['fws_capacity']; ?></div>
			 
			 <?php }} ?>
		</div>	 
	  </div>
       <!------------hydropneumatic----------->
		</div>
      <!--------------water-distribution------------->
      
      
        <!--------------reticulated-piped------------->
		  <div class="col-sm-12 col-xs-12 reticulated-section"> 
            <div class="col-sm-12 col-xs-12 reticulated-pipedgas">Reticulated Piped Gas</div> 
		<?php if(isset($site['gas_banks'])) { if($site['gas_banks']) { ?>
		    <div class="form-group gas-banks"><b>Gas Banks:</b> <span><?php echo $site['gas_banks']; ?></span></div>
			
	  <?php if(count($gasbank) > 0) { ?>
      <div class="gasbanks-tablediv table-responsive">
          <table width="100%" border="1" class="gsabanks-table">
            <thead>
               <tr>
                 <th>S.No</th>
                 <th>Bank Name</th>
                 <th>Location</th>
                 <th>Capacity</th>
                 <th>Make</th>
                 <th>Image</th>
               </tr>
            </thead>
           
          <tbody>
          <?php $mt = 0; if(count($gasbank) > 0) {
				 $mt = 0;
			foreach($gasbank as $dgcon) { //echo "<pre>"; print_r($dgcon); echo "</pre>";?>
            
            <tr>
               <td><?php $mt = $mt + 1; echo $mt; ?></td>
           
                <td>   <?php    echo  $dgcon['name']; ?></td>
              
                 <td>  <?php    echo  $dgcon['location']; ?></td>
             
                  <td> <?php    echo  $dgcon['capacity']; ?></td>
               
                   <td>    <?php echo  $dgcon['make']; ?></td>
               
					<td> <?php if(isset($dgcon['filename'])) { if($dgcon['filename']) { ?> <a href="/<?php if(isset($dgcon['filename'])) echo $dgcon['filename'];  ?>" target="_blank">View</a><?php } } ?></td>
                  
               
                </tr>
                <?php } } ?>
                 </tbody>
			 </table>
             </div> 
             <?php } ?>
			 <?php }} ?>
           
			
			  <?php if(isset($site['num_of_cylinders'])) { if($site['num_of_cylinders']) { ?>
		    <div class="col-sm-2"><label class="col-sm-12 emptuu">&nbsp;</label><b> No of Cylinders</b><br /> <?php echo $site['num_of_cylinders']; ?></div>
		   <?php }} ?>
		   
		   </div>
      <!--------------reticulated-piped------------->
        
        
         <!--------------fire-safety------------->
		 <div class="col-sm-12 col-xs-12 firesafety-section"> 
            <div class="col-sm-12 col-xs-12 fireand-satetyheading">Fire & Safety</div>  
			
			   <div class="detectors-popup"><b>Detectors</b></div>
		   
		   	  <?php if(isset($site['smoke'])) { if($site['smoke']) { ?>
		    <div class="col-sm-2 form-group smoke-popup1"> <b>Smoke</b><br /> <?php echo $site['smoke']; ?></div>
		   <?php }} ?>
           
           
		   <?php if(isset($site['smoke_image'])) { if($site['smoke_image']) { ?> <div class="col-sm-2 form-group"><b>Image: </b> <br /><a href="/<?php if(isset($site['smoke_image'])) echo $site['smoke_image'];  ?>" target="_blank">View</a></div><?php } } ?>
		   
		    <?php if(isset($site['heat'])) { if($site['heat']) { ?>
		    <div class="col-sm-2 form-group heat-popup"> <b>Heat</b><br /> <?php echo $site['heat']; ?></div>
		   <?php }} ?>
           
           
		   <?php if(isset($site['heat_image'])) { if($site['heat_image']) { ?> <div class="col-sm-2 form-group"><b>Image: </b><br /><a href="/<?php if(isset($site['heat_image'])) echo $site['heat_image'];  ?>" target="_blank">View</a></div><?php } } ?>
           
           
           <!------fire-pump----------->
		 <div class="col-sm-12 col-xs-12 firepump-publicsection">  
		   <?php if(isset($site['fire_pump_rooms'])) { if($site['fire_pump_rooms']) { ?>
		   <div class="col-sm-6 fire-pumpsection"> <div class="col-sm-12 col-xs-12 form-group fire-pumpopoup"><b>Fire Pump Rooms:</b> <span><?php echo $site['fire_pump_rooms']; ?></span></div>
			
			<?php if((int)$site['fire_pump_rooms'] > 0) { ?>
            <div class="firepump-tablediv table-responsive">
           <table width="100%" border="1" class="firepump-table">
             <thead>
               <tr>
                 <th>S.No</th>
                 <th>Location</th>
                 <th>Jockey</th>
                 <th>Main</th>
                 <th>DG</th>
                 <th>Booster</th>
               </tr>
             </thead>
              
            <tbody>
            
			  <?php  if((int)$site['fire_pump_rooms'] > 0) {
			   if(count($powerpumps) > 0) {
			   foreach($powerpumps as $dgcn) {
			 ?>
			 
             
               <tr>
                 <td></td>
			    <td> <?php if(isset($dgcn['location']))  echo $dgcn['location'] ; ?></td>
            
			    <td><?php if(isset($dgcn['jockey']))  echo $dgcn['jockey'] ; ?></td>
           
                 <td><?php if(isset($dgcn['main']))  echo $dgcn['main'] ; ?></td>
        
                <td> <?php if(isset($dgcn['dg']))  echo $dgcn['dg'] ; ?></td>
           
               <td><?php if(isset($dgcn['booster']))  echo $dgcn['booster'] ; ?></td>
            
			
			  
              </tr>
              
		    <?php }} } ?> 
              </tbody>
            </table>
            </div>
			  <?php } ?> 
              </div> 
			  <?php }} ?>
			
			
			
			
			<?php if(isset($site['public_addressing_system'])) { if($site['public_addressing_system']) { ?>
		    <div class="col-sm-6 pubkic-sector"><div class="col-sm-12 col-xs-12 form-group punlic-popupup"><b>Public Addressing System:</b> <span><?php echo $site['public_addressing_system']; ?></span></div>
			
		<?php if(count($pbasys) > 0) { ?>
        <div class="publicadd-tablediv table-responsive">
          <table width="100%" border="1" class="publicadd-table">
            <thead>
              <tr>
                <th>S.No</th>
                <th>Location</th>
                <th>Make</th>
                <th>Image</th>
              </tr>
            </thead>
          
           <tbody>
            
			  <?php $mt = 0; if(count($pbasys) > 0) {
				 $mt = 0;
			foreach($pbasys as $dgcon) { //echo "<pre>"; print_r($dgcon); echo "</pre>";?>
           
               <tr>
              
                   <td><?php $mt = $mt + 1; echo $mt; ?></td>
              
                  
                  <td><?php    echo  $dgcon['location']; ?></td>
               
                   <td> <?php echo  $dgcon['make']; ?></td>
             
					<td> <?php if(isset($dgcon['filename'])) { if($dgcon['filename']) { ?> <a href="/<?php if(isset($dgcon['filename'])) echo $dgcon['filename'];  ?>" target="_blank">View</a><?php } } ?></td>
                  
                  </tr>
             
                <?php } } ?> 
               </tbody>
			</table>
            </div>
             <?php } ?>
             </div>
		    <?php }} ?>
	    </div>
     <!------fire-pump----------->
     
      <!------fire-flow----------->
      <div class="col-sm-12 col-xs-12 firealarm-flowannunicator">
			<?php if(isset($site['fire_alaram_system'])) { if($site['fire_alaram_system']) { ?>
		    <div class="col-sm-6 firealarm-section"><div class="col-sm-12 col-xs-12 form-group friwals-popoup"><b>Fire Alarm System:</b> <span><?php echo $site['fire_alaram_system']; ?></span></div>
			
            <?php  if(count($firealaram) > 0) { ?>
            <div class="firealarm-tablediv table-responsive">
			<table width="100%" border="1" class="firealarm-table">
             <thead>
                <tr>
                  <th>S.No</th>
                  <th>Location</th>
                  <th>Make</th>
                  <th>Image</th>
                </tr>
             </thead>
            
           <tbody>
            
            <?php $mt = 0; if(count($firealaram) > 0) {
				 $mt = 0;
			foreach($firealaram as $dgcon) { //echo "<pre>"; print_r($dgcon); echo "</pre>";?>
            
              <tr>
               
                   <td><?php $mt = $mt + 1; echo $mt; ?></td>
           
                    
                   <td><?php    echo  $dgcon['location']; ?></td>
               
			
                    <td> <?php echo  $dgcon['make']; ?></td>
              
					<td> <?php if(isset($dgcon['filename'])) { if($dgcon['filename']) { ?> <a href="/<?php if(isset($dgcon['filename'])) echo $dgcon['filename'];  ?>" target="_blank">View</a><?php } } ?> </td>
                  
                 </tr>
             
                <?php } }  ?>
                
               </tbody> 
			</table>
            </div>
             <?php } ?>
             
              </div>
              <?php } ?>  
              
             
             <?php } ?>
			
			
			<?php if(isset($site['flow_anounciator'])) { if($site['flow_anounciator']) { ?>
		   <div class="col-sm-6 flowannunicator-section"> <div class="col-sm-12 col-xs-12 form-group friwals-popoup"><b>Flow Annuciator Panel:</b> <span><?php echo $site['flow_anounciator']; ?></span></div>
			
            <?php if(count($siteflowann) > 0) { ?>
            <div class="flow-tablediv table-responsive">
			<table width="100%" border="1" class="flow-table">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Location</th>
                  <th>Make</th>
                  <th>Zone</th>
                  <th>Image</th>
                </tr>
              </thead>
              
           <tbody>
              
              
            <?php $mt = 0; if(count($siteflowann) > 0) {
				 $mt = 0;
			foreach($siteflowann as $dgcon) { //echo "<pre>"; print_r($dgcon); echo "</pre>";?>
            
            
               <tr>
              
                <td> <?php $mt = $mt + 1; echo $mt; ?></td>
             
                    
                 <td>  <?php    echo  $dgcon['location']; ?></td>
            
                  <td>    <?php echo  $dgcon['make']; ?></td>
               
                   <td>   <?php echo  $dgcon['flowzone']; ?></td>
               
					<td><?php if(isset($dgcon['filename'])) { if($dgcon['filename']) { ?> <a href="/<?php if(isset($dgcon['filename'])) echo $dgcon['filename'];  ?>" target="_blank">View</a><?php } } ?> </td>
                  
                </tr>
             
                <?php } }  ?>
                </tbody>
			 </table>
             </div>
             <?php } ?>
             
              </div> 
			  <?php } ?> 
              
			  <?php } ?>
			
			
			
			
            
      </div>
       <!------fire-flow----------->
      
      
      </div>
    <!--------------fire-safety------------->   
  <!--------------security--------------->  
         	
	 <div class="col-sm-12 col-xs-12 form-group security-section">
          
             <div class="security">Security</div> 
			 
			 
			
		<?php if(isset($site['boombarier_meter'])) { if($site['boombarier_meter']) { ?>
		    <div class="col-sm-8 last-boombarriersectuib"><div class="form-group gas-banks"><b>Boom Barrier:</b> <span><?php echo $site['boombarier_meter']; ?></span></div>
			
		<?php if(count($boombarrier) > 0) { ?>
        <div class="boombarrier-tablediv table-responsive">
         <table width="100%" border="1" class="boombarrier-table">
          <thead>
            <tr>
              <th>S.No</th>
              <th>Length</th>
              <th>Make</th>
              <th>Location</th>
            </tr>
          </thead>
         
          <tbody>
         
			  <?php $mt = 0; if(count($boombarrier) > 0) {
				 $mt = 0;
			foreach($boombarrier as $dgcon) { //echo "<pre>"; print_r($dgcon); echo "</pre>";?>
           
             <tr>
            
                  <td><?php $mt = $mt + 1; echo $mt; ?></td>
            
                   
                   <td><?php    echo  $dgcon['length']; ?></td>
              
                     <td> <?php echo  $dgcon['make']; ?></td>
               
                     <td><?php echo  $dgcon['location']; ?></td>
               
                 </tr>
             
                <?php } } ?>  
                  </tbody>
                </table>
                </div>
                <?php } ?>
                </div> 
				<?php }} ?>
			 
			 
		 
          
          
          <div class="col-sm-4 form-group cctv-lastsection">
             
			<div class="community-cctv"><b>CCTV</b></div>
		    <?php if(isset($site['cctv_number'])) { if($site['cctv_number']) { ?>
		    <div class="col-sm-6 number" style="padding-left:0px;"><label> Number:</label> <?php echo $site['cctv_number']; ?></div>
		   <?php }} ?>
		    <?php if(isset($site['cctv_make'])) { if($site['cctv_make']) { ?>
		    <div class="col-sm-6 make"><label> Make:</label> <?php echo $site['cctv_make']; ?></div>
		   <?php }} ?>
		  </div> 
		   
           
           <div class="col-sm-12 col-xs-12 form-group last-solarsection">
            
			<div class="solarfencing-section"><b>Solar Fencing</b></div>
		    <?php if(isset($site['solar_fence_zones'])) { if($site['solar_fence_zones']) { ?>
		    <div class="col-sm-3 form-group number-of-zones" style="padding-left:0px;"><label> Number of zones:</label> <?php echo $site['solar_fence_zones']; ?></div>
		   <?php }} ?>
		    <?php if(isset($site['solar_fence_make'])) { if($site['solar_fence_make']) { ?>
		    <div class="col-sm-3 form-group make"><label> Make:</label> <?php echo $site['solar_fence_make']; ?></div>
		   <?php }} ?>
		   
		     <?php if(isset($site['solar_fence_length'])) { if($site['solar_fence_length']) { ?>
		    <div class="col-sm-3 form-group length-section"><label> Length:</label> <?php echo $site['solar_fence_length']; ?></div>
		   <?php }} ?>
		   
		     <?php if(isset($site['lighten_protection'])) { if($site['lighten_protection']) { ?>
		    <div class="col-sm-3 form-group lighting-protection"><label> Lightening Protection:</label> <?php echo $site['lighten_protection']; ?></div>
		   <?php }} ?>
		 </div> 
         
         
		</div>   
	<!--------------security---------------> 
     
    	   
		 <div class="col-sm-12 col-xs-12  club-housesection">   
		   <div class="col-sm-12 col-xs-12 club-house-popup">CLUB HOUSE</div>
           
         <div class="col-sm-12 clubhouse-tablediv">
           <table  border="1" class="totalclubhouse-table">
                <thead>
                   <tr>
                     <th style="width:175px;">Name of Club House</th>
                     <th style="width:201px;">Available / Not Available</th>
                     <th>Description</th>
                     <th>Image</th>
                   </tr>
                </thead>
                <tbody>
                   <?php if(isset($clubhouse['badminton_court'])) {  ?>
                   <tr>
                      <td><b>Badminton Court</b></td>
                      <td> <?php if(isset($clubhouse['badminton_court'])) { if($clubhouse['badminton_court']) { ?>
		    <?php echo $clubhouse['badminton_court']; ?>
		   <?php }} ?></td>
                       <td><?php if(isset($clubhouse['badminton_text'])) { if($clubhouse['badminton_text']) { ?>
		    <?php echo $clubhouse['badminton_text']; ?>
		   <?php }} ?></td>
                       <td> <?php if(isset($clubhouse['badminton_file'])) { if($clubhouse['badminton_file']) { ?>  <a href="/<?php if(isset($clubhouse['badminton_file'])) echo $clubhouse['badminton_file'];  ?>" target="_blank">View</a><?php } } ?></td>
                   </tr>
                    <?php } ?>
                    
                    
                    <?php if(isset($clubhouse['squash'])) {  ?> 
                    <tr>
                       <td><b>Squash Court</b></td>
                       <td>  <?php if(isset($clubhouse['squash'])) { if($clubhouse['squash']) { ?>
		    <?php echo $clubhouse['squash']; ?><?php } } ?></td>
                       <td><?php if(isset($clubhouse['squash_text'])) { if($clubhouse['squash_text']) { ?>
		    <?php echo $clubhouse['squash_text']; ?>
		   <?php }} ?></td>
                       <td><?php if(isset($clubhouse['squash_file'])) { if($clubhouse['squash_file']) { ?> <a href="/<?php if(isset($clubhouse['squash_file'])) echo $clubhouse['squash_file'];  ?>" target="_blank">View</a><?php } } ?></td>
                    </tr>
                    <?php } ?>
                    
                      <?php if(isset($clubhouse['squash_file'])) {  ?>	
                      <tr>
                       <td><b>Kitchen</b></td>
                       <td> <?php if(isset($clubhouse['kitchen_court'])) { if($clubhouse['kitchen_court']) { ?>
		    <?php echo $clubhouse['kitchen_court']; ?>
		   <?php }} ?></td>
                       <td><?php if(isset($clubhouse['kitchen_text'])) { if($clubhouse['kitchen_text']) { ?>
		    <?php echo $clubhouse['kitchen_text']; ?>
		   <?php }} ?></td>
                       <td> <?php if(isset($clubhouse['kitchen_file'])) { if($clubhouse['kitchen_file']) { ?> <a href="/<?php if(isset($clubhouse['kitchen_file'])) echo $clubhouse['kitchen_file'];  ?>" target="_blank">View</a><?php } } ?></td>
                    </tr>
                    <?php } ?>
                    
                    
                     <?php if(isset($clubhouse['multi_purpose_hall'])) {  ?>	
                      <tr>
                       <td><b>Multi Purpose Hall</b></td>
                       <td> <?php if(isset($clubhouse['multi_purpose_hall'])) { if($clubhouse['multi_purpose_hall']) { ?>
		    <?php echo $clubhouse['multi_purpose_hall']; ?>
		   <?php }} ?></td>
                       <td> <?php if(isset($clubhouse['multi_purpose_text'])) { if($clubhouse['multi_purpose_text']) { ?>
		    <?php echo $clubhouse['multi_purpose_text']; ?>
		   <?php }} ?></td>
                       <td><?php if(isset($clubhouse['multi_purpose_file'])) { if($clubhouse['multi_purpose_file']) { ?>  <a href="/<?php if(isset($clubhouse['multi_purpose_file'])) echo $clubhouse['multi_purpose_file'];  ?>" target="_blank">View</a><?php } } ?></td>
                    </tr>
                     <?php } ?>
                     
                     <?php if(isset($clubhouse['clicnic_court'])) {  ?>	
                      <tr>
                       <td><b>Clinic</b></td>
                       <td> <?php if(isset($clubhouse['clicnic_court'])) { if($clubhouse['clicnic_court']) { ?>
		    <?php echo $clubhouse['clicnic_court']; ?>
		   <?php }} ?></td>
                       <td><?php if(isset($clubhouse['clicnic_text'])) { if($clubhouse['clicnic_text']) { ?>
		    <?php echo $clubhouse['clicnic_text']; ?>
		   <?php }} ?></td>
                       <td> <?php if(isset($clubhouse['clicnic_file'])) { if($clubhouse['multi_purpose_file']) { ?>  <a href="/<?php if(isset($clubhouse['clicnic_file'])) echo $clubhouse['clicnic_file'];  ?>" target="_blank">View</a><?php } } ?></td>
                    </tr>
                     <?php } ?>
                     
                       <?php if(isset($clubhouse['gym'])) {  ?>	
                      <tr>
                       <td><b>GYM</b></td>
                       <td>  <?php if(isset($clubhouse['gym'])) { if($clubhouse['gym']) { ?>
		    <?php echo $clubhouse['gym']; ?>
		   <?php }} ?></td>
                       <td> <?php if(isset($clubhouse['gym_text'])) { if($clubhouse['gym_text']) { ?>
		    <?php echo $clubhouse['gym_text']; ?>
		   <?php }} ?></td>
                       <td> <?php if(isset($clubhouse['gym_file'])) { if($clubhouse['gym_file']) { ?>  <a href="/<?php if(isset($clubhouse['gym_file'])) echo $clubhouse['gym_file'];  ?>" target="_blank">View</a><?php } } ?></td>
                    </tr>
                     <?php } ?>
                     
                      <?php if(isset($clubhouse['aerobics_court'])) {  ?>
                     <tr>
                       <td><b>Aerobics</b></td>
                       <td> <?php if(isset($clubhouse['aerobics_court'])) { if($clubhouse['aerobics_court']) { ?>
		    <?php echo $clubhouse['aerobics_court']; ?>
		   <?php }} ?></td>
                       <td><?php if(isset($clubhouse['aerobics_text'])) { if($clubhouse['aerobics_text']) { ?>
		    <?php echo $clubhouse['aerobics_text']; ?>
		   <?php }} ?></td>
                       <td> <?php if(isset($clubhouse['aerobics_file'])) { if($clubhouse['aerobics_file']) { ?> <a href="/<?php if(isset($clubhouse['aerobics_file'])) echo $clubhouse['aerobics_file'];  ?>" target="_blank">View</a><?php } } ?></td>
                    </tr>
                     <?php } ?>
                    
                    
                    <?php if(isset($clubhouse['cafeteria'])) {  ?>	 
                     <tr>
                       <td><b>Cafeteria</b></td>
                       <td> <?php if(isset($clubhouse['cafeteria'])) { if($clubhouse['cafeteria']) { ?>
		    <?php echo $clubhouse['cafeteria']; ?>
		   <?php }} ?></td>
                       <td><?php if(isset($clubhouse['cafeteria_text'])) { if($clubhouse['cafeteria_text']) { ?>
		    <?php echo $clubhouse['cafeteria_text']; ?>
		   <?php }} ?></td>
                       <td> <?php if(isset($clubhouse['cafeteria_file'])) { if($clubhouse['cafeteria_file']) { ?>  <a href="/<?php if(isset($clubhouse['cafeteria_file'])) echo $clubhouse['cafeteria_file'];  ?>" target="_blank">View</a><?php } } ?>
					</td>
                    </tr>
                     <?php } ?>
                     
                     <?php if(isset($clubhouse['lounge_court'])) {  ?>	
                     <tr>
                       <td><b>Lounge</b></td>
                       <td> <?php if(isset($clubhouse['lounge_court'])) { if($clubhouse['lounge_court']) { ?>
		    <?php echo $clubhouse['lounge_court']; ?>
		   <?php }} ?></td>
                       <td><?php if(isset($clubhouse['lounge_text'])) { if($clubhouse['lounge_text']) { ?>
		    <?php echo $clubhouse['lounge_text']; ?>
		   <?php }} ?></td>
                       <td><?php if(isset($clubhouse['lounge_file'])) { if($clubhouse['lounge_file']) { ?>  <a href="/<?php if(isset($clubhouse['lounge_file'])) echo $clubhouse['lounge_file'];  ?>" target="_blank">View</a><?php } } ?></td>
                    </tr>
                     <?php } ?>
                     
                     <?php if(isset($clubhouse['library'])) {  ?>	
                      <tr>
                       <td><b>Library</b></td>
                       <td> <?php if(isset($clubhouse['library'])) { if($clubhouse['library']) { ?>
		    <?php echo $clubhouse['library']; ?>
		   <?php }} ?></td>
                       <td><?php if(isset($clubhouse['library_text'])) { if($clubhouse['library_text']) { ?>
		    <?php echo $clubhouse['library_text']; ?>
		   <?php }} ?></td>
                       <td> <?php if(isset($clubhouse['library_file'])) { if($clubhouse['library_file']) { ?>  <a href="/<?php if(isset($clubhouse['library_file'])) echo $clubhouse['library_file'];  ?>" target="_blank">View</a><?php } } ?></td>
                    </tr>
                    <?php } ?>
                    
                     <?php if(isset($clubhouse['spa_court'])) {  ?>
                     <tr>
                       <td><b>SPA</b></td>
                       <td> <?php if(isset($clubhouse['spa_court'])) { if($clubhouse['spa_court']) { ?>
		    <?php echo $clubhouse['spa_court']; ?>
		   <?php }} ?></td>
                       <td><?php if(isset($clubhouse['spa_text'])) { if($clubhouse['spa_text']) { ?>
		    <?php echo $clubhouse['spa_text']; ?>
		   <?php }} ?></td>
                       <td><?php if(isset($clubhouse['spa_file'])) { if($clubhouse['spa_file']) { ?>  <a href="/<?php if(isset($clubhouse['spa_file'])) echo $clubhouse['spa_file'];  ?>" target="_blank">View</a><?php } } ?></td>
                    </tr>
                    <?php } ?>
                    
                    
                    <?php if(isset($clubhouse['yoga'])) {  ?>
                     <tr>
                       <td><b>Yoga</b></td>
                       <td> <?php if(isset($clubhouse['yoga'])) { if($clubhouse['yoga']) { ?>
		    <?php echo $clubhouse['yoga']; ?>
		   <?php }} ?></td>
                       <td> <?php if(isset($clubhouse['yoga_text'])) { if($clubhouse['yoga_text']) { ?>
		    <?php echo $clubhouse['yoga_text']; ?>
		   <?php }} ?></td>
                       <td> <?php if(isset($clubhouse['yoga_file'])) { if($clubhouse['yoga_file']) { ?>  <a href="/<?php if(isset($clubhouse['yoga_file'])) echo $clubhouse['yoga_file'];  ?>" target="_blank">View</a><?php } } ?></td>
                    </tr>
                     <?php } ?>
                    
                    <?php if(isset($clubhouse['homethatre_court'])) {  ?>
                     <tr>
                       <td><b>Home Theatre</b></td>
                       <td> <?php if(isset($clubhouse['homethatre_court'])) { if($clubhouse['homethatre_court']) { ?>
		    <?php echo $clubhouse['homethatre_court']; ?>
		   <?php }} ?></td>
                       <td> <?php if(isset($clubhouse['homethatre_text'])) { if($clubhouse['homethatre_text']) { ?>
		    <?php echo $clubhouse['homethatre_text']; ?>
		   <?php }} ?></td>
                       <td><?php if(isset($clubhouse['homethatre_file'])) { if($clubhouse['homethatre_file']) { ?> <a href="/<?php if(isset($clubhouse['homethatre_file'])) echo $clubhouse['homethatre_file'];  ?>" target="_blank">View</a><?php } } ?></td>
                    </tr>
                    <?php } ?>
                    
                    
                     <?php if(isset($clubhouse['guest'])) {  ?>	
                     <tr>
                       <td><b>Guest Rooms</b></td>
                       <td> <?php if(isset($clubhouse['guest'])) { if($clubhouse['guest']) { ?>
		    <?php echo $clubhouse['guest']; ?>
		   <?php }} ?></td>
                       <td><?php if(isset($clubhouse['guest_text'])) { if($clubhouse['guest_text']) { ?>
		    <?php echo $clubhouse['guest_text']; ?>
		   <?php }} ?></td>
                       <td> <?php if(isset($clubhouse['guest_file'])) { if($clubhouse['guest_file']) { ?>  <a href="/<?php if(isset($clubhouse['guest_file'])) echo $clubhouse['guest_file'];  ?>" target="_blank">View</a><?php } } ?></td>
                    </tr>
                     <?php } ?>
                    
                    
                    <?php if(isset($clubhouse['indoorgam_court'])) {  ?>	
                     <tr>
                       <td><b>Indoor Games</b></td>
                       <td><?php if(isset($clubhouse['indoorgam_court'])) { if($clubhouse['indoorgam_court']) { ?>
		    <?php echo $clubhouse['indoorgam_court']; ?>
		   <?php }} ?></td>
                       <td><?php if(isset($clubhouse['indoorgam_text'])) { if($clubhouse['indoorgam_text']) { ?>
		    <?php echo $clubhouse['indoorgam_text']; ?>
		   <?php }} ?></td>
                       <td> <?php if(isset($clubhouse['indoorgam_file'])) { if($clubhouse['guest_file']) { ?>  <a href="/<?php if(isset($clubhouse['indoorgam_file'])) echo $clubhouse['indoorgam_file'];  ?>" target="_blank">View</a><?php } } ?></td>
                    </tr>
                    <?php } ?>
                    
                     <?php if(isset($clubhouse['waiting'])) {  ?>		
                     <tr>
                       <td><b>Waiting lounge</b></td>
                       <td> <?php if(isset($clubhouse['waiting'])) { if($clubhouse['waiting']) { ?>
		    <?php echo $clubhouse['waiting']; ?>
		   <?php }} ?></td>
                       <td><?php if(isset($clubhouse['waiting_text'])) { if($clubhouse['waiting_text']) { ?>
		    <?php echo $clubhouse['waiting_text']; ?>
		   <?php }} ?></td>
                       <td> <?php if(isset($clubhouse['waiting_file'])) { if($clubhouse['waiting_file']) { ?>  <a href="/<?php if(isset($clubhouse['waiting_file'])) echo $clubhouse['waiting_file'];  ?>" target="_blank">View</a><?php } } ?></td>
                    </tr>
                      <?php } ?>
                      
                      
                     <?php if(isset($clubhouse['changingrm_court'])) {  ?>	
                     <tr>
                        <td><b>Changing Rooms</b></td>
                        <td> <?php if(isset($clubhouse['changingrm_court'])) { if($clubhouse['changingrm_court']) { ?>
		    <?php echo $clubhouse['changingrm_court']; ?>
		   <?php }} ?></td>
                        <td> <?php if(isset($clubhouse['changingrm_text'])) { if($clubhouse['changingrm_text']) { ?>
		    <?php echo $clubhouse['changingrm_text']; ?>
		   <?php }} ?></td>
                        <td> <?php if(isset($clubhouse['changingrm_file'])) { if($clubhouse['changingrm_file']) { ?>  <a href="/<?php if(isset($clubhouse['changingrm_file'])) echo $clubhouse['changingrm_file'];  ?>" target="_blank">View</a><?php } } ?></td>
                     </tr>
                     <?php } ?>  
                    
                    <?php if(isset($clubhouse['banquet'])) {  ?>
                     <tr>
                        <td><b>Banquet Hall</b></td>
                        <td><?php if(isset($clubhouse['banquet'])) { if($clubhouse['banquet']) { ?>
		    <?php echo $clubhouse['banquet']; ?>
		   <?php }} ?></td>
                        <td> <?php if(isset($clubhouse['banquet_text'])) { if($clubhouse['banquet_text']) { ?>
		    <?php echo $clubhouse['banquet_text']; ?>
		   <?php }} ?></td>
                        <td> <?php if(isset($clubhouse['banquet_file'])) { if($clubhouse['banquet_file']) { ?>  <a href="/<?php if(isset($clubhouse['banquet_file'])) echo $clubhouse['banquet_file'];  ?>" target="_blank">View</a><?php } } ?></td>
                     </tr>
                     <?php } ?>  
                     
                       <?php if(isset($clubhouse['pantry_court'])) {  ?>	
                      <tr>
                        <td><b>Pantry</b></td>
                        <td> <?php if(isset($clubhouse['pantry_court'])) { if($clubhouse['pantry_court']) { ?>
		    <?php echo $clubhouse['pantry_court']; ?>
		   <?php }} ?></td>
                        <td><?php if(isset($clubhouse['pantry_text'])) { if($clubhouse['pantry_text']) { ?>
		    <?php echo $clubhouse['pantry_text']; ?>
		   <?php }} ?></td>
                        <td> <?php if(isset($clubhouse['pantry_file'])) { if($clubhouse['pantry_file']) { ?> <a href="/<?php if(isset($clubhouse['pantry_file'])) echo $clubhouse['pantry_file'];  ?>" target="_blank">View</a><?php } } ?></td>
                     </tr>
                      <?php } ?>  
                     
                     
                      <?php if(isset($clubhouse['service'])) {  ?>	
                      <tr>
                        <td><b>Service Room</b></td>
                        <td>  <?php if(isset($clubhouse['service'])) { if($clubhouse['service']) { ?>
		    <?php echo $clubhouse['service']; ?>
		   <?php }} ?></td>
                        <td><?php if(isset($clubhouse['service_text'])) { if($clubhouse['service_text']) { ?>
		    <?php echo $clubhouse['service_text']; ?>
		   <?php }} ?></td>
                        <td> <?php if(isset($clubhouse['service_file'])) { if($clubhouse['service_file']) { ?>  <a href="/<?php if(isset($clubhouse['service_file'])) echo $clubhouse['service_file'];  ?>" target="_blank">View</a><?php } } ?></td>
                     </tr>
                     <?php } ?>  
                     
                     <?php if(isset($clubhouse['swimmingpool'])) {  ?>	
                      <tr>
                        <td><b>Swimming Pool</b></td>
                        <td> <?php if(isset($clubhouse['swimmingpool'])) { if($clubhouse['swimmingpool']) { ?>
		    <?php echo $clubhouse['swimmingpool']; ?>
		   <?php }} ?></td>
                       
                        <td> <?php if(isset($clubhouse['swimmingtext'])) { if($clubhouse['swimmingtext']) { ?>
		    <?php echo $clubhouse['swimmingtext']; ?>
		   <?php }} ?></td>
                        <td> <?php if(isset($clubhouse['swimming_file'])) { if($clubhouse['swimming_file']) { ?>  <a href="/<?php if(isset($clubhouse['swimming_file'])) echo $clubhouse['swimming_file'];  ?>" target="_blank">View</a><?php } } ?></td>
                     </tr>
                     <?php } ?>  
                     
                         <?php if(isset($clubhouse['indoorpool'])) {  ?>	
                      <tr>
                        <td class="indoor-pool"><b>Indoor pool</b></td>
                        <td colspan="3"> <?php if(isset($clubhouse['indoorpool'])) { if($clubhouse['indoorpool']) { ?>
		    <?php echo $clubhouse['indoorpool']; ?>
		   <?php }} ?></td>
                     </tr>
                     <?php } ?>  
                     
                      <?php if(isset($clubhouse['outdoorpool'])) {  ?>	
                      <tr>
                        <td class="indoor-pool"><b>Outdoor pool</b></td>
                        <td colspan="3"> <?php if(isset($clubhouse['outdoorpool'])) { if($clubhouse['outdoorpool']) { ?>
		    <?php echo $clubhouse['outdoorpool']; ?>
		   <?php }} ?></td>
                     </tr>
                     <?php } ?>  
                     
                      <?php if(isset($clubhouse['babypool'])) {  ?>	
                      <tr>
                        <td class="indoor-pool"><b>Baby pool</b></td>
                        <td colspan="3"> <?php if(isset($clubhouse['babypool'])) { if($clubhouse['babypool']) { ?>
		    <?php echo $clubhouse['babypool']; ?>
		   <?php }} ?></td>
                     </tr>
                     <?php } ?>  
                     
                     
                     
                      <?php if(isset($clubhouse['openrestu_court'])) {  ?>	
                      <tr>
                        <td><b>Open Restaurant</b></td>
                        <td> <?php if(isset($clubhouse['openrestu_court'])) { if($clubhouse['openrestu_court']) { ?>
		    <?php echo $clubhouse['openrestu_court']; ?>
		   <?php }} ?></td>
                        <td> <?php if(isset($clubhouse['openrestu_text'])) { if($clubhouse['openrestu_text']) { ?>
		    <?php echo $clubhouse['openrestu_text']; ?>
		   <?php }} ?></td>
                        <td> <?php if(isset($clubhouse['openrestu_file'])) { if($clubhouse['openrestu_file']) { ?>  <a href="/<?php if(isset($clubhouse['openrestu_file'])) echo $clubhouse['openrestu_file'];  ?>" target="_blank">View</a><?php } } ?></td>
                     </tr>
                     <?php } ?> 
                     
                     
                      <?php if(isset($clubhouse['sitting'])) {  ?>
                      <tr>
                        <td><b>Sitting area</b></td>
                        <td> <?php if(isset($clubhouse['sitting'])) { if($clubhouse['sitting']) { ?>
		    <?php echo $clubhouse['sitting']; ?>
		   <?php }} ?></td>
                        <td><?php if(isset($clubhouse['sitting_text'])) { if($clubhouse['sitting_text']) { ?>
		    <?php echo $clubhouse['sitting_text']; ?>
		   <?php }} ?></td>
                        <td> <?php if(isset($clubhouse['sitting_file'])) { if($clubhouse['sitting_file']) { ?>  <a href="/<?php if(isset($clubhouse['sitting_file'])) echo $clubhouse['sitting_file'];  ?>" target="_blank">View</a><?php } } ?></td>
                     </tr>
                       <?php } ?> 
                       
                        <?php if(isset($clubhouse['supermark_court'])) {  ?>
                      <tr>
                        <td><b>Super market</b></td>
                        <td > <?php if(isset($clubhouse['supermark_court'])) { if($clubhouse['supermark_court']) { ?>
		    <?php echo $clubhouse['supermark_court']; ?>
		   <?php }} ?></td>
                        <td> <?php if(isset($clubhouse['supermark_text'])) { if($clubhouse['supermark_text']) { ?>
		    <?php echo $clubhouse['supermark_text']; ?>
		   <?php }} ?></td>
                        <td> <?php if(isset($clubhouse['supermark_file'])) { if($clubhouse['supermark_file']) { ?>  <a href="/<?php if(isset($clubhouse['supermark_file'])) echo $clubhouse['supermark_file'];  ?>" target="_blank">View</a><?php } } ?></td>
                     </tr>
                        <?php } ?> 
                        
                      <?php if(isset($clubhouse['creche'])) {  ?>
                      <tr>
                         <td><b>Creche</b></td>
                         <td> <?php if(isset($clubhouse['creche'])) { if($clubhouse['creche']) { ?>
		    <?php echo $clubhouse['creche']; ?>
		   <?php }} ?></td>
                         <td> <?php if(isset($clubhouse['creche_text'])) { if($clubhouse['creche_text']) { ?>
		    <?php echo $clubhouse['creche_text']; ?>
		   <?php }} ?></td>
                         <td> <?php if(isset($clubhouse['creche_file'])) { if($clubhouse['creche_file']) { ?>  <a href="/<?php if(isset($clubhouse['creche_file'])) echo $clubhouse['creche_file'];  ?>" target="_blank">View</a><?php } } ?></td>
                      </tr>
                       <?php } ?> 
                       
                       
                         <?php if(isset($clubhouse['tenniescourt_court'])) {  ?>
                         <tr>
                            <td><b>Tennis Court</b></td>
                            <td> <?php if(isset($clubhouse['tenniescourt_court'])) { if($clubhouse['tenniescourt_court']) { ?>
		    <?php echo $clubhouse['tenniescourt_court']; ?>
		   <?php }} ?></td>
                            <td><?php if(isset($clubhouse['tenniescourt_text'])) { if($clubhouse['tenniescourt_text']) { ?>
		    <?php echo $clubhouse['tenniescourt_text']; ?>
		   <?php }} ?></td>
                            <td><?php if(isset($clubhouse['tenniescourt_file'])) { if($clubhouse['tenniescourt_file']) { ?>  <a href="/<?php if(isset($clubhouse['tenniescourt_file'])) echo $clubhouse['tenniescourt_file'];  ?>" target="_blank">View</a><?php } } ?></td>
                         </tr>
                        <?php } ?> 
                     
                     
                     <?php if(isset($clubhouse['basket'])) {  ?>	
                     <tr>
                        <td><b>Basketball Court</b></td>
                        <td> <?php if(isset($clubhouse['basket'])) { if($clubhouse['basket']) { ?>
		    <?php echo $clubhouse['basket']; ?>
		   <?php }} ?></td>
                        <td><?php if(isset($clubhouse['basket_text'])) { if($clubhouse['basket_text']) { ?>
		    <?php echo $clubhouse['basket_text']; ?>
		   <?php }} ?></td>
                        <td> <?php if(isset($clubhouse['basket_file'])) { if($clubhouse['basket_file']) { ?>  <a href="/<?php if(isset($clubhouse['basket_file'])) echo $clubhouse['basket_file'];  ?>" target="_blank">View</a><?php } } ?></td>
                      </tr>
                       <?php } ?>    
                       
                       
                      <?php if(isset($clubhouse['cricketnet'])) {  ?>  
                     <tr>
                        <td><b>Cricket Net</b></td>
                        <td> <?php if(isset($clubhouse['cricketnet'])) { if($clubhouse['cricketnet']) { ?>
		    <?php echo $clubhouse['cricketnet']; ?>
		   <?php }} ?></td>
                        <td> <?php if(isset($clubhouse['cricketnet_text'])) { if($clubhouse['cricketnet_text']) { ?>
		    <?php echo $clubhouse['cricketnet_text']; ?>
		   <?php }} ?></td>
                        <td> <?php if(isset($clubhouse['cricketnet_file'])) { if($clubhouse['cricketnet_file']) { ?>  <a href="/<?php if(isset($clubhouse['cricketnet_file'])) echo $clubhouse['cricketnet_file'];  ?>" target="_blank">View</a><?php } } ?></td>
                     </tr>
                     <?php } ?> 
                     
                     
                     <?php if(isset($clubhouse['volley'])) {  ?>	
                      <tr>
                        <td><b>Volley Ball</b></td>
                        <td> <?php if(isset($clubhouse['volley'])) { if($clubhouse['volley']) { ?>
		    <?php echo $clubhouse['volley']; ?>
		   <?php }} ?></td>
                        <td><?php if(isset($clubhouse['volley_text'])) { if($clubhouse['volley_text']) { ?>
		    <?php echo $clubhouse['volley_text']; ?>
		   <?php }} ?></td>
                        <td> <?php if(isset($clubhouse['volley_file'])) { if($clubhouse['volley_file']) { ?>  <a href="/<?php if(isset($clubhouse['volley_file'])) echo $clubhouse['volley_file'];  ?>" target="_blank">View</a><?php } } ?></td>
                     </tr>
                      <?php } ?> 
                     
                     
                      <?php if(isset($clubhouse['staking'])) {  ?>
                      <tr>
                        <td><b>Skating</b></td>
                        <td> <?php if(isset($clubhouse['staking'])) { if($clubhouse['staking']) { ?>
		    <?php echo $clubhouse['staking']; ?>
		   <?php }} ?></td>
                        <td> <?php if(isset($clubhouse['staking_text'])) { if($clubhouse['staking_text']) { ?>
		    <?php echo $clubhouse['staking_text']; ?>
		   <?php }} ?></td>
                        <td> <?php if(isset($clubhouse['staking_file'])) { if($clubhouse['staking_file']) { ?>  <a href="/<?php if(isset($clubhouse['staking_file'])) echo $clubhouse['volley_file'];  ?>" target="_blank">View</a><?php } } ?></td>
                     </tr>
                      <?php } ?> 
                         
                </tbody>
           </table>
           </div>
           
		   
		  <?php /*?> <?php if(isset($clubhouse['badminton_court'])) {  ?><div class="col-sm-2 form-group"><b>Badminton Court</b></div>
           <div class="col-sm-2 form-group">
		    <?php if(isset($clubhouse['badminton_court'])) { if($clubhouse['badminton_court']) { ?>
		    <?php echo $clubhouse['badminton_court']; ?>
		   <?php }} ?></div> <?php } ?>
		   
		    <?php if(isset($clubhouse['badminton_text'])) {  ?>  <div class="col-sm-1 form-group badminton-text"> <?php if(isset($clubhouse['badminton_text'])) { if($clubhouse['badminton_text']) { ?>
		    <?php echo $clubhouse['badminton_text']; ?>
		   <?php }} ?></div><?php } ?>
		   
		  <?php if(isset($clubhouse['badminton_file'])) {  ?>  <div class="col-sm-1 form-group badminton-image">
					 <?php if(isset($clubhouse['badminton_file'])) { if($clubhouse['badminton_file']) { ?>  <a href="/<?php if(isset($clubhouse['badminton_file'])) echo $clubhouse['badminton_file'];  ?>" target="_blank">View</a><?php } } ?></div> <?php } ?><?php */?>
					
					
                    
                    
					
				<?php /*?>  <?php if(isset($clubhouse['squash'])) {  ?> 	 <div class="col-sm-2 form-group"><b>Squash Court</b></div>
                  <div class="col-sm-2 form-group">
		    <?php if(isset($clubhouse['squash'])) { if($clubhouse['squash']) { ?>
		    <?php echo $clubhouse['squash']; ?><?php } ?>
		   <?php }} ?></div>
		   
		      <?php if(isset($clubhouse['squash_text'])) {  ?> 	<div class="col-sm-1 form-group squash-courttext"> <?php if(isset($clubhouse['squash_text'])) { if($clubhouse['squash_text']) { ?>
		    <?php echo $clubhouse['squash_text']; ?>
		   <?php }} ?></div><?php } ?>
		   
		  <?php if(isset($clubhouse['squash_file'])) {  ?> <div class="col-sm-1 form-group squash-courtimage">
					 <?php if(isset($clubhouse['squash_file'])) { if($clubhouse['squash_file']) { ?> <a href="/<?php if(isset($clubhouse['squash_file'])) echo $clubhouse['squash_file'];  ?>" target="_blank">View</a><?php } } ?>
					
					</div><?php } ?><?php */?>
                    
                    
                    
					
				 <?php /*?> <?php if(isset($clubhouse['squash_file'])) {  ?>	
					 <div class="col-sm-2 form-group"><b>Kitchen</b></div>
                     <div class="col-sm-2 form-group">
		   <?php if(isset($clubhouse['kitchen_court'])) { if($clubhouse['kitchen_court']) { ?>
		    <?php echo $clubhouse['kitchen_court']; ?>
		   <?php }} ?></div><?php } ?>
		   
		     <?php if(isset($clubhouse['kitchen_text'])) {  ?>	
		     <div class="col-sm-1 form-group kitchen-text"> <?php if(isset($clubhouse['kitchen_text'])) { if($clubhouse['kitchen_text']) { ?>
		    <?php echo $clubhouse['kitchen_text']; ?>
		   <?php }} ?></div><?php } ?>
		   
		    <?php if(isset($clubhouse['kitchen_file'])) {  ?>	
		   <div class="col-sm-1 form-group kitchen-image">
					 <?php if(isset($clubhouse['kitchen_file'])) { if($clubhouse['kitchen_file']) { ?> <a href="/<?php if(isset($clubhouse['kitchen_file'])) echo $clubhouse['kitchen_file'];  ?>" target="_blank">View</a><?php } } ?>
					
					</div><?php } ?><?php */?>
					
                    
                    
					
			<?php /*?> <?php if(isset($clubhouse['multi_purpose_hall'])) {  ?>		
			<div class="col-sm-2 form-group"><b>Multi Purpose Hall</b></div>
            <div class="col-sm-2 form-group">
		    <?php if(isset($clubhouse['multi_purpose_hall'])) { if($clubhouse['multi_purpose_hall']) { ?>
		    <?php echo $clubhouse['multi_purpose_hall']; ?>
		   <?php }} ?></div>
		   <?php } ?>
		   
		     
			  <?php if(isset($clubhouse['multi_purpose_text'])) {  ?>	<div class="col-sm-1 form-group multipurpose-halltext"> <?php if(isset($clubhouse['multi_purpose_text'])) { if($clubhouse['multi_purpose_text']) { ?>
		    <?php echo $clubhouse['multi_purpose_text']; ?>
		   <?php }} ?></div>
		     <?php } ?>
		   
		    <?php if(isset($clubhouse['multi_purpose_file'])) {  ?>
		   <div class="col-sm-1 form-group multipurpose-hallimage">
					 <?php if(isset($clubhouse['multi_purpose_file'])) { if($clubhouse['multi_purpose_file']) { ?>  <a href="/<?php if(isset($clubhouse['multi_purpose_file'])) echo $clubhouse['multi_purpose_file'];  ?>" target="_blank">View</a><?php } } ?>
					
					</div>
				<?php } ?>	<?php */?>
                
                
                
				
				  <?php /*?> <?php if(isset($clubhouse['clicnic_court'])) {  ?>	
					 <div class="col-sm-2 form-group"><b>Clinic</b></div>
                     <div class="col-sm-2 form-group">
		   <?php if(isset($clubhouse['clicnic_court'])) { if($clubhouse['clicnic_court']) { ?>
		    <?php echo $clubhouse['clicnic_court']; ?>
		   <?php }} ?></div>
		   <?php } ?>	
		   
		    <?php if(isset($clubhouse['clicnic_text'])) {  ?>	
		     <div class="col-sm-1 form-group clinic-text"> <?php if(isset($clubhouse['clicnic_text'])) { if($clubhouse['clicnic_text']) { ?>
		    <?php echo $clubhouse['clicnic_text']; ?>
		   <?php }} ?></div>
		     <?php } ?>	
		   
		   <?php if(isset($clubhouse['clicnic_file'])) {  ?>	
		   <div class="col-sm-1 form-group clinic-image">
					 <?php if(isset($clubhouse['clicnic_file'])) { if($clubhouse['multi_purpose_file']) { ?>  <a href="/<?php if(isset($clubhouse['clicnic_file'])) echo $clubhouse['clicnic_file'];  ?>" target="_blank">View</a><?php } } ?>
					
					</div>
					 <?php } ?><?php */?>	
                     
                     
					
				<?php /*?>	  <?php if(isset($clubhouse['gym'])) {  ?>	
					 <div class="col-sm-2 form-group"><b>GYM</b></div>
                     <div class="col-sm-2 form-group">
		   <?php if(isset($clubhouse['gym'])) { if($clubhouse['gym']) { ?>
		    <?php echo $clubhouse['gym']; ?>
		   <?php }} ?></div>
		    <?php } ?>	
		     <?php if(isset($clubhouse['gym_text'])) {  ?>	
		     <div class="col-sm-1 form-group gym-text"> <?php if(isset($clubhouse['gym_text'])) { if($clubhouse['gym_text']) { ?>
		    <?php echo $clubhouse['gym_text']; ?>
		   <?php }} ?></div>
		     <?php } ?>	
		   
		    <?php if(isset($clubhouse['gym_file'])) {  ?>
		   <div class="col-sm-1 form-group gym-image">
					 <?php if(isset($clubhouse['gym_file'])) { if($clubhouse['gym_file']) { ?>  <a href="/<?php if(isset($clubhouse['gym_file'])) echo $clubhouse['gym_file'];  ?>" target="_blank">View</a><?php } } ?>
					
					</div>
					 <?php } ?>	<?php */?>
					
                    
                    
			<?php /*?>	  <?php if(isset($clubhouse['aerobics_court'])) {  ?>	
					 <div class="col-sm-2 form-group"><b>Aerobics</b></div>
                     <div class="col-sm-2 form-group">
		   <?php if(isset($clubhouse['aerobics_court'])) { if($clubhouse['aerobics_court']) { ?>
		    <?php echo $clubhouse['aerobics_court']; ?>
		   <?php }} ?></div>
		    <?php } ?>	
			
		    <?php if(isset($clubhouse['aerobics_text'])) {  ?>	
		     <div class="col-sm-1 form-group aerobics-text"> <?php if(isset($clubhouse['aerobics_text'])) { if($clubhouse['aerobics_text']) { ?>
		    <?php echo $clubhouse['aerobics_text']; ?>
		   <?php }} ?></div>
		    <?php } ?>	
		  
		     <?php if(isset($clubhouse['aerobics_file'])) {  ?>	 
		   <div class="col-sm-1 form-group aerobics-image">
					 <?php if(isset($clubhouse['aerobics_file'])) { if($clubhouse['aerobics_file']) { ?> <a href="/<?php if(isset($clubhouse['aerobics_file'])) echo $clubhouse['aerobics_file'];  ?>" target="_blank">View</a><?php } } ?>
					
					</div>
					 <?php } ?>	<?php */?>
                     
                     
					
				<?php /*?>	   <?php if(isset($clubhouse['cafeteria'])) {  ?>	 
					
					 <div class="col-sm-2 form-group"><b>Cafeteria</b></div>
                     <div class="col-sm-2 form-group">
		   <?php if(isset($clubhouse['cafeteria'])) { if($clubhouse['cafeteria']) { ?>
		    <?php echo $clubhouse['cafeteria']; ?>
		   <?php }} ?></div>
		    <?php } ?>	
		      <?php if(isset($clubhouse['cafeteria_text'])) {  ?>	 
		     <div class="col-sm-1 form-group cafeteria-text"> <?php if(isset($clubhouse['cafeteria_text'])) { if($clubhouse['cafeteria_text']) { ?>
		    <?php echo $clubhouse['cafeteria_text']; ?>
		   <?php }} ?></div>
		    <?php } ?>	
		   
		       <?php if(isset($clubhouse['cafeteria_file'])) {  ?>	 
		   <div class="col-sm-1 form-group cafeteria-image">
					 <?php if(isset($clubhouse['cafeteria_file'])) { if($clubhouse['cafeteria_file']) { ?>  <a href="/<?php if(isset($clubhouse['cafeteria_file'])) echo $clubhouse['cafeteria_file'];  ?>" target="_blank">View</a><?php } } ?>
					
					</div>
					<?php } ?>	<?php */?>
                    
                    
					
					<?php /*?><?php if(isset($clubhouse['lounge_court'])) {  ?>	 
					 <div class="col-sm-2 form-group"><b>Lounge</b></div>
                     <div class="col-sm-2 form-group">
		    <?php if(isset($clubhouse['lounge_court'])) { if($clubhouse['lounge_court']) { ?>
		    <?php echo $clubhouse['lounge_court']; ?>
		   <?php }} ?></div>
		   <?php } ?>
           	
		   <?php if(isset($clubhouse['lounge_text'])) {  ?>	
		     <div class="col-sm-1 form-group lounge-text"> <?php if(isset($clubhouse['lounge_text'])) { if($clubhouse['lounge_text']) { ?>
		    <?php echo $clubhouse['lounge_text']; ?>
		   <?php }} ?></div>
		    <?php } ?>	
		      <?php if(isset($clubhouse['lounge_file'])) {  ?>	
		   <div class="col-sm-1 form-group lounge-image">
					 <?php if(isset($clubhouse['lounge_file'])) { if($clubhouse['lounge_file']) { ?> Image: <a href="/<?php if(isset($clubhouse['lounge_file'])) echo $clubhouse['lounge_file'];  ?>" target="_blank">View</a><?php } } ?>
					
					</div>
				<?php } ?>	<?php */?>
                
                
                	
				<?php /*?> <?php if(isset($clubhouse['library'])) {  ?>		
					 <div class="col-sm-2 form-group"><b>Library</b></div>
                     <div class="col-sm-2 form-group">
		   <?php if(isset($clubhouse['library'])) { if($clubhouse['library']) { ?>
		    <?php echo $clubhouse['library']; ?>
		   <?php }} ?></div>
		   <?php } ?>		
		   
		    <?php if(isset($clubhouse['library_text'])) {  ?>	
		     <div class="col-sm-1 form-group library-text"> <?php if(isset($clubhouse['library_text'])) { if($clubhouse['library_text']) { ?>
		    <?php echo $clubhouse['library_text']; ?>
		   <?php }} ?></div>
		    <?php } ?>		
		   
		    <?php if(isset($clubhouse['library_file'])) {  ?>
		   <div class="col-sm-1 form-group library-image">
					 <?php if(isset($clubhouse['library_file'])) { if($clubhouse['library_file']) { ?>  <a href="/<?php if(isset($clubhouse['library_file'])) echo $clubhouse['library_file'];  ?>" target="_blank">View</a><?php } } ?>
					
					</div>
					  <?php } ?><?php */?>	
                      
                      	
					
				<?php /*?>  <?php if(isset($clubhouse['spa_court'])) {  ?>	
					 <div class="col-sm-2 form-group"><b>SPA</b></div>
                     <div class="col-sm-2 from-group">
		   <?php if(isset($clubhouse['spa_court'])) { if($clubhouse['spa_court']) { ?>
		    <?php echo $clubhouse['spa_court']; ?>
		   <?php }} ?></div>
		     <?php } ?>		
		   
		   <?php if(isset($clubhouse['spa_text'])) {  ?>
		     <div class="col-sm-1 form-group spa-text"> <?php if(isset($clubhouse['spa_text'])) { if($clubhouse['spa_text']) { ?>

		    <?php echo $clubhouse['spa_text']; ?>
		   <?php }} ?></div>
		   <?php } ?>		
		   
		     <?php if(isset($clubhouse['spa_file'])) {  ?>
		   <div class="col-sm-1 form-group spa-image">
					 <?php if(isset($clubhouse['spa_file'])) { if($clubhouse['spa_file']) { ?> Image: <a href="/<?php if(isset($clubhouse['spa_file'])) echo $clubhouse['spa_file'];  ?>" target="_blank">View</a><?php } } ?>
					
					</div>
				  <?php } ?><?php */?>
                  
                  
                  			
					<?php /*?><?php if(isset($clubhouse['yoga'])) {  ?>
						 <div class="col-sm-2 form-group"><b>Yoga</b></div>
                         <div class="col-sm-2 form-group">
		    <?php if(isset($clubhouse['yoga'])) { if($clubhouse['yoga']) { ?>
		    <?php echo $clubhouse['yoga']; ?>
		   <?php }} ?></div>
		    <?php } ?>		
		   
		   <?php if(isset($clubhouse['yoga_text'])) {  ?>
		     <div class="col-sm-1 form-group yoga-text"> <?php if(isset($clubhouse['yoga_text'])) { if($clubhouse['yoga_text']) { ?>
		    <?php echo $clubhouse['yoga_text']; ?>
		   <?php }} ?></div>
		   <?php } ?>		
		   
		     <?php if(isset($clubhouse['yoga_file'])) {  ?>
		   <div class="col-sm-1 form-group yoga-image">
					 <?php if(isset($clubhouse['yoga_file'])) { if($clubhouse['yoga_file']) { ?>  <a href="/<?php if(isset($clubhouse['yoga_file'])) echo $clubhouse['yoga_file'];  ?>" target="_blank">View</a><?php } } ?>
					
					</div>
					   <?php } ?>	<?php */?>
                       	
					
				<?php /*?><?php if(isset($clubhouse['homethatre_court'])) {  ?>	
					 <div class="col-sm-2 form-group"><b>Home Theatre</b></div>
                     <div class="col-sm-2 form-group">
		    <?php if(isset($clubhouse['homethatre_court'])) { if($clubhouse['homethatre_court']) { ?>
		    <?php echo $clubhouse['homethatre_court']; ?>
		   <?php }} ?></div>
		     <?php } ?>	
		   
		   <?php if(isset($clubhouse['homethatre_text'])) {  ?>	
		     <div class="col-sm-1 form-group hometheatre-text"> <?php if(isset($clubhouse['homethatre_text'])) { if($clubhouse['homethatre_text']) { ?>
		    <?php echo $clubhouse['homethatre_text']; ?>
		   <?php }} ?></div>
		     <?php } ?>	
		   
		    <?php if(isset($clubhouse['homethatre_file'])) {  ?>	
		   <div class="col-sm-1 form-group hometheatre-image">
					 <?php if(isset($clubhouse['homethatre_file'])) { if($clubhouse['homethatre_file']) { ?> <a href="/<?php if(isset($clubhouse['homethatre_file'])) echo $clubhouse['homethatre_file'];  ?>" target="_blank">View</a><?php } } ?>
					
					</div>
				  <?php } ?><?php */?>	
				  
                  
				   <?php /*?> <?php if(isset($clubhouse['guest'])) {  ?>		
					 <div class="col-sm-2 form-group"><b>Guest Rooms</b></div>
                     <div class="col-sm-2 form-group">
		  <?php if(isset($clubhouse['guest'])) { if($clubhouse['guest']) { ?>
		    <?php echo $clubhouse['guest']; ?>
		   <?php }} ?></div>
		    <?php } ?>	
			
			 <?php if(isset($clubhouse['guest_text'])) {  ?>		
		     <div class="col-sm-1 form-group guestrooms-text"> <?php if(isset($clubhouse['guest_text'])) { if($clubhouse['guest_text']) { ?>
		    <?php echo $clubhouse['guest_text']; ?>
		   <?php }} ?></div>
		   <?php } ?>	
		   
		   <?php if(isset($clubhouse['guest_file'])) {  ?>	
		   <div class="col-sm-1 form-group guestrooms-image">
					 <?php if(isset($clubhouse['guest_file'])) { if($clubhouse['guest_file']) { ?>  <a href="/<?php if(isset($clubhouse['guest_file'])) echo $clubhouse['guest_file'];  ?>" target="_blank">View</a><?php } } ?>
					
					</div>
					  <?php } ?>	<?php */?>
                      
                      
					
				<?php /*?><?php if(isset($clubhouse['indoorgam_court'])) {  ?>		
					<div class="col-sm-2 form-group"><b>Indoor Games</b></div>
                    <div class="col-sm-2 form-group">
		    <?php if(isset($clubhouse['indoorgam_court'])) { if($clubhouse['indoorgam_court']) { ?>
		    <?php echo $clubhouse['indoorgam_court']; ?>
		   <?php }} ?></div>
		     <?php } ?>	
		   
		   <?php if(isset($clubhouse['indoorgam_text'])) {  ?>	
		     <div class="col-sm-1 form-group indoorgames-text"> <?php if(isset($clubhouse['indoorgam_text'])) { if($clubhouse['indoorgam_text']) { ?>
		    <?php echo $clubhouse['indoorgam_text']; ?>
		   <?php }} ?></div>
		     <?php } ?>	
		   
		   <?php if(isset($clubhouse['indoorgam_file'])) {  ?>	
		   <div class="col-sm-1 form-group indoorgames-image">
					 <?php if(isset($clubhouse['indoorgam_file'])) { if($clubhouse['guest_file']) { ?>  <a href="/<?php if(isset($clubhouse['indoorgam_file'])) echo $clubhouse['indoorgam_file'];  ?>" target="_blank">View</a><?php } } ?>
					
					</div>
					 <?php } ?>	<?php */?>
                     
                     
					
			<?php /*?> <?php if(isset($clubhouse['waiting'])) {  ?>			
					<div class="col-sm-2 form-group"><b>Waiting lounge</b></div>
                    <div class="col-sm-2 form-group">
		    <?php if(isset($clubhouse['waiting'])) { if($clubhouse['waiting']) { ?>
		    <?php echo $clubhouse['waiting']; ?>
		   <?php }} ?></div>
		    <?php } ?>	
		   
		    <?php if(isset($clubhouse['waiting_text'])) {  ?>			
		     <div class="col-sm-1 form-group waitinglounge-text"> <?php if(isset($clubhouse['waiting_text'])) { if($clubhouse['waiting_text']) { ?>
		    <?php echo $clubhouse['waiting_text']; ?>
		   <?php }} ?></div>
		   <?php } ?>	
		   
		    <?php if(isset($clubhouse['waiting_file'])) {  ?>	
		   <div class="col-sm-1 form-group waitinglounge-image">
					 <?php if(isset($clubhouse['waiting_file'])) { if($clubhouse['waiting_file']) { ?>  <a href="/<?php if(isset($clubhouse['waiting_file'])) echo $clubhouse['waiting_file'];  ?>" target="_blank">View</a><?php } } ?>
					
					</div>
					 <?php } ?>	<?php */?>
					
					
				<?php /*?> <?php if(isset($clubhouse['changingrm_court'])) {  ?>		
					<div class="col-sm-2 form-group"><b>Changing Rooms</b></div>
                    <div class="col-sm-2 form-group">
		   <?php if(isset($clubhouse['changingrm_court'])) { if($clubhouse['changingrm_court']) { ?>
		    <?php echo $clubhouse['changingrm_court']; ?>
		   <?php }} ?></div>
		   <?php } ?>	
		   
		    <?php if(isset($clubhouse['changingrm_text'])) {  ?>	
		     <div class="col-sm-1 form-group changingrooms-text"> <?php if(isset($clubhouse['changingrm_text'])) { if($clubhouse['changingrm_text']) { ?>
		    <?php echo $clubhouse['changingrm_text']; ?>
		   <?php }} ?></div>
		   <?php } ?>	
		   
		     <?php if(isset($clubhouse['changingrm_file'])) {  ?>	
		   <div class="col-sm-1 form-group changingrooms-image">
					 <?php if(isset($clubhouse['changingrm_file'])) { if($clubhouse['changingrm_file']) { ?> Image: <a href="/<?php if(isset($clubhouse['changingrm_file'])) echo $clubhouse['changingrm_file'];  ?>" target="_blank">View</a><?php } } ?>
					
					</div>
					  <?php } ?>	<?php */?>
                      
                      
					
					<?php /*?><?php if(isset($clubhouse['banquet'])) {  ?>
					<div class="col-sm-2 form-group"><b>Banquet Hall</b></div>
                    <div class="col-sm-2 form-group">
		    <?php if(isset($clubhouse['banquet'])) { if($clubhouse['banquet']) { ?>
		    <?php echo $clubhouse['banquet']; ?>
		   <?php }} ?></div>
		     <?php } ?>	
		   
		   <?php if(isset($clubhouse['banquet_text'])) {  ?>
		     <div class="col-sm-1 form-group banquethall-text"> <?php if(isset($clubhouse['banquet_text'])) { if($clubhouse['banquet_text']) { ?>
		    <?php echo $clubhouse['banquet_text']; ?>
		   <?php }} ?></div>
		    <?php } ?>	
		   
		    <?php if(isset($clubhouse['banquet_file'])) {  ?>
		   <div class="col-sm-1 form-group banquethall-image">
					 <?php if(isset($clubhouse['banquet_file'])) { if($clubhouse['banquet_file']) { ?> Image: <a href="/<?php if(isset($clubhouse['banquet_file'])) echo $clubhouse['banquet_file'];  ?>" target="_blank">View</a><?php } } ?>
					
					</div>
				<?php } ?>	<?php */?>
                
                
					
				 <?php /*?>  <?php if(isset($clubhouse['pantry_court'])) {  ?>	
					<div class="col-sm-2 form-group"><b>Pantry</b></div>
                    <div class="col-sm-2 form-group">
		    <?php if(isset($clubhouse['pantry_court'])) { if($clubhouse['pantry_court']) { ?>
		    <?php echo $clubhouse['pantry_court']; ?>
		   <?php }} ?></div>
		   <?php } ?>	
		   
		   <?php if(isset($clubhouse['pantry_text'])) {  ?>	
		   
		     <div class="col-sm-1 form-group pantry-text"> <?php if(isset($clubhouse['pantry_text'])) { if($clubhouse['pantry_text']) { ?>
		    <?php echo $clubhouse['pantry_text']; ?>
		   <?php }} ?></div>
		    <?php } ?>	
		   
		    <?php if(isset($clubhouse['pantry_file'])) {  ?>	
		   <div class="col-sm-1 form-group pantry-image">
					 <?php if(isset($clubhouse['pantry_file'])) { if($clubhouse['pantry_file']) { ?> <a href="/<?php if(isset($clubhouse['pantry_file'])) echo $clubhouse['pantry_file'];  ?>" target="_blank">View</a><?php } } ?>
					
					</div>
					  <?php } ?>	<?php */?>
					
				<?php /*?> <?php if(isset($clubhouse['service'])) {  ?>		
					<div class="col-sm-2 form-group"><b>Service Room</b></div>
                    <div class="col-sm-2 form-group">
		  <?php if(isset($clubhouse['service'])) { if($clubhouse['service']) { ?>
		    <?php echo $clubhouse['service']; ?>
		   <?php }} ?></div>
		     <?php } ?>	
		   
		    <?php if(isset($clubhouse['service_text'])) {  ?>		
		     <div class="col-sm-1 form-group serviceroom-text"><?php if(isset($clubhouse['service_text'])) { if($clubhouse['service_text']) { ?>
		    <?php echo $clubhouse['service_text']; ?>
		   <?php }} ?></div>
		    <?php } ?>	
		   
		     <?php if(isset($clubhouse['service_file'])) {  ?>
		   <div class="col-sm-1 form-group serviceroom-image">
					 <?php if(isset($clubhouse['service_file'])) { if($clubhouse['service_file']) { ?> Image: <a href="/<?php if(isset($clubhouse['service_file'])) echo $clubhouse['service_file'];  ?>" target="_blank">View</a><?php } } ?>
					
					</div>
				 <?php } ?>	<?php */?>
                 
             <?php /*?>  <div class="col-sm-12 swimming-poolsection">
				   <?php if(isset($clubhouse['swimmingpool'])) {  ?>	
					
					<div class="col-sm-2 form-group"><b>Swimming Pool</b></div>
                    <div class="col-sm-2 form-group">
		   <?php if(isset($clubhouse['swimmingpool'])) { if($clubhouse['swimmingpool']) { ?>
		    <?php echo $clubhouse['swimmingpool']; ?>
		   <?php }} ?></div>
		   <?php } ?>	
		   </div>
           
            <div class="col-sm-12 swimmingpool-innersection">
		   <?php if(isset($clubhouse['indoorpool'])) {  ?>
		   <div class="col-sm-12 form-group"><div class="col-sm-2" style="padding-left:0px;"><b>Indoor pool</b></div>
           <div class="col-sm-2">
		      <?php if(isset($clubhouse['indoorpool'])) { if($clubhouse['indoorpool']) { ?>
		    <?php echo $clubhouse['indoorpool']; ?>
		   <?php }} ?></div></div>
		     <?php } ?>	
		   
		      <?php if(isset($clubhouse['outdoorpool'])) {  ?>
		    <div class="col-sm-12 form-group"><div class="col-sm-2" style="padding-left:0px;"><b>Outdoor Pool</b></div>
            <div class="col-sm-2">
		     <?php if(isset($clubhouse['outdoorpool'])) { if($clubhouse['outdoorpool']) { ?>
		    <?php echo $clubhouse['outdoorpool']; ?>
		   <?php }} ?></div></div>
		   <?php } ?>	
		   
		    <?php if(isset($clubhouse['babypool'])) {  ?>
		      <div class="col-sm-12 form-group"><div class="col-sm-2" style="padding-left:0px;"><b>Baby Pool</b></div>
              <div class="col-sm-2">
		      <?php if(isset($clubhouse['babypool'])) { if($clubhouse['babypool']) { ?>
		    <?php echo $clubhouse['babypool']; ?>
		   <?php }} ?></div></div>
		    <?php } ?>	
		   
		     <?php if(isset($clubhouse['swimmingtext'])) {  ?>
		    <div class="col-sm-12 form-group"><label class="col-sm-12">&nbsp;</label> <?php if(isset($clubhouse['swimmingtext'])) { if($clubhouse['swimmingtext']) { ?>
		    <?php echo $clubhouse['swimmingtext']; ?>
		   <?php }} ?></div>
		     <?php } ?>	
		   
		    <?php if(isset($clubhouse['swimming_file'])) {  ?>
		   <div class="col-sm-12 form-group"><label class="col-sm-12">&nbsp;</label>
					 <?php if(isset($clubhouse['swimming_file'])) { if($clubhouse['swimming_file']) { ?> Image: <a href="/<?php if(isset($clubhouse['swimming_file'])) echo $clubhouse['swimming_file'];  ?>" target="_blank">View</a><?php } } ?>
					
					</div>
					<?php } ?>	</div><?php */?>
                    
                    
                    
					
				<?php /*?>  <?php if(isset($clubhouse['openrestu_court'])) {  ?>	
						<div class="col-sm-2 form-group"><b>Open Restaurant</b></div>
                        <div class="col-sm-2 form-group">
		    <?php if(isset($clubhouse['openrestu_court'])) { if($clubhouse['openrestu_court']) { ?>
		    <?php echo $clubhouse['openrestu_court']; ?>
		   <?php }} ?></div>
		   	<?php } ?>	
		   
		     <?php if(isset($clubhouse['openrestu_text'])) {  ?>	
		     <div class="col-sm-1 form-group open-restauranttext"> <?php if(isset($clubhouse['openrestu_text'])) { if($clubhouse['openrestu_text']) { ?>
		    <?php echo $clubhouse['openrestu_text']; ?>
		   <?php }} ?></div>
		    	<?php } ?>	
		   
		    <?php if(isset($clubhouse['openrestu_file'])) {  ?>
		   <div class="col-sm-1 form-group open-restaurantimage">
					 <?php if(isset($clubhouse['openrestu_file'])) { if($clubhouse['openrestu_file']) { ?>  <a href="/<?php if(isset($clubhouse['openrestu_file'])) echo $clubhouse['openrestu_file'];  ?>" target="_blank">View</a><?php } } ?>
					
					</div>
					<?php } ?>		<?php */?>
					
					 <?php /*?><?php if(isset($clubhouse['sitting'])) {  ?>
					<div class="col-sm-2 form-group"><b>Sitting area</b></div>
                    <div class="col-sm-2 form-group">
		   <?php if(isset($clubhouse['sitting'])) { if($clubhouse['sitting']) { ?>
		    <?php echo $clubhouse['sitting']; ?>
		   <?php }} ?></div>
		   <?php } ?>	
		   	 <?php if(isset($clubhouse['sitting_text'])) {  ?>
		     <div class="col-sm-1 form-group sittingarea-text"> <?php if(isset($clubhouse['sitting_text'])) { if($clubhouse['sitting_text']) { ?>
		    <?php echo $clubhouse['sitting_text']; ?>
		   <?php }} ?></div>
		   	   <?php } ?>	
		   
		   <?php if(isset($clubhouse['sitting_file'])) {  ?>
		   <div class="col-sm-1 form-group sittingarea-image">
					 <?php if(isset($clubhouse['sitting_file'])) { if($clubhouse['sitting_file']) { ?>  <a href="/<?php if(isset($clubhouse['sitting_file'])) echo $clubhouse['sitting_file'];  ?>" target="_blank">View</a><?php } } ?>
					
					</div>
				<?php } ?>	<?php */?>	
					
					<?php /*?> <?php if(isset($clubhouse['supermark_court'])) {  ?>
					<div class="col-sm-2 form-group"><b>Super market</b></div>
                    <div class="col-sm-2 form-group">
		   <?php if(isset($clubhouse['supermark_court'])) { if($clubhouse['supermark_court']) { ?>
		    <?php echo $clubhouse['supermark_court']; ?>
		   <?php }} ?></div>
		   <?php } ?>		
		   
		    <?php if(isset($clubhouse['supermark_text'])) {  ?>
		     <div class="col-sm-1 form-group supermarket-text"> <?php if(isset($clubhouse['supermark_text'])) { if($clubhouse['supermark_text']) { ?>
		    <?php echo $clubhouse['supermark_text']; ?>
		   <?php }} ?></div>
		      <?php } ?>	
		   
		      <?php if(isset($clubhouse['supermark_file'])) {  ?>
		   <div class="col-sm-1 form-group supermarket-image">
					 <?php if(isset($clubhouse['supermark_file'])) { if($clubhouse['supermark_file']) { ?>  <a href="/<?php if(isset($clubhouse['supermark_file'])) echo $clubhouse['supermark_file'];  ?>" target="_blank">View</a><?php } } ?>
					
					</div>
					 <?php } ?>	<?php */?>
					
					
			  <?php /*?> <?php if(isset($clubhouse['creche'])) {  ?>		<div class="col-sm-2 form-group"><b>Creche</b></div>
               <div class="col-sm-2 form-group">
		    <?php if(isset($clubhouse['creche'])) { if($clubhouse['creche']) { ?>
		    <?php echo $clubhouse['creche']; ?>
		   <?php }} ?></div>
		   	 <?php } ?>	
		   
		    <?php if(isset($clubhouse['creche_text'])) {  ?>	
		     <div class="col-sm-1 form-group creche-text"> <?php if(isset($clubhouse['creche_text'])) { if($clubhouse['creche_text']) { ?>
		    <?php echo $clubhouse['creche_text']; ?>
		   <?php }} ?></div>
		    <?php } ?>	
		   
		      <?php if(isset($clubhouse['creche_file'])) {  ?>
		   <div class="col-sm-1 form-group creche-image">
					 <?php if(isset($clubhouse['creche_file'])) { if($clubhouse['creche_file']) { ?> Image: <a href="/<?php if(isset($clubhouse['creche_file'])) echo $clubhouse['creche_file'];  ?>" target="_blank">View</a><?php } } ?>
					
					</div>
					 <?php } ?>	<?php */?>
				
					<?php /*?>  <?php if(isset($clubhouse['tenniescourt_court'])) {  ?>
					<div class="col-sm-2 form-group"><b>Tennis Court</b></div>
                    <div class="col-sm-2 form-group">
		    <?php if(isset($clubhouse['tenniescourt_court'])) { if($clubhouse['tenniescourt_court']) { ?>
		    <?php echo $clubhouse['tenniescourt_court']; ?>
		   <?php }} ?></div>
		    <?php } ?>	
		   
		   <?php if(isset($clubhouse['tenniescourt_text'])) {  ?>
		     <div class="col-sm-1 form-group tenniscourt-text"> <?php if(isset($clubhouse['tenniescourt_text'])) { if($clubhouse['tenniescourt_text']) { ?>
		    <?php echo $clubhouse['tenniescourt_text']; ?>
		   <?php }} ?></div>
		    <?php } ?>	
		   
		   <?php if(isset($clubhouse['tenniescourt_file'])) {  ?>
		   <div class="col-sm-1 form-group tenniscourt-image">
					 <?php if(isset($clubhouse['tenniescourt_file'])) { if($clubhouse['tenniescourt_file']) { ?> Image: <a href="/<?php if(isset($clubhouse['tenniescourt_file'])) echo $clubhouse['tenniescourt_file'];  ?>" target="_blank">View</a><?php } } ?>
					
					</div>
					   <?php } ?>	<?php */?>
				
			<?php /*?>	<?php if(isset($clubhouse['basket'])) {  ?>	
					<div class="col-sm-2 form-group"><b>Basketball Court</b></div>
                    <div class="col-sm-2 form-group">
		    <?php if(isset($clubhouse['basket'])) { if($clubhouse['basket']) { ?>
		    <?php echo $clubhouse['basket']; ?>
		   <?php }} ?></div>
		    <?php } ?>	
			<?php if(isset($clubhouse['basket_text'])) {  ?>	
		     <div class="col-sm-1 form-group basketball-text"> <?php if(isset($clubhouse['basket_text'])) { if($clubhouse['basket_text']) { ?>
		    <?php echo $clubhouse['basket_text']; ?>
		   <?php }} ?></div>
		   <?php } ?>	
		   <?php if(isset($clubhouse['basket_file'])) {  ?>
		   <div class="col-sm-1 form-group basketball-image">
					 <?php if(isset($clubhouse['basket_file'])) { if($clubhouse['basket_file']) { ?> Image: <a href="/<?php if(isset($clubhouse['basket_file'])) echo $clubhouse['basket_file'];  ?>" target="_blank">View</a><?php } } ?>
					
					</div>
					<?php } ?>	<?php */?>
					
				<?php /*?> <?php if(isset($clubhouse['cricketnet'])) {  ?>	<div class="col-sm-2 form-group"><b>Cricket Net</b></div>
                 <div class="col-sm-2 form-group">
		   <?php if(isset($clubhouse['cricketnet'])) { if($clubhouse['cricketnet']) { ?>
		    <?php echo $clubhouse['cricketnet']; ?>
		   <?php }} ?></div>
		   <?php } ?>	
		    <?php if(isset($clubhouse['cricketnet_text'])) {  ?>
		     <div class="col-sm-1 form-group cricketnet-text"> <?php if(isset($clubhouse['cricketnet_text'])) { if($clubhouse['cricketnet_text']) { ?>
		    <?php echo $clubhouse['cricketnet_text']; ?>
		   <?php }} ?></div>
		   <?php } ?>	
		     <?php if(isset($clubhouse['cricketnet_file'])) {  ?>
		   <div class="col-sm-1 form-group cricketnet-image">
					 <?php if(isset($clubhouse['cricketnet_file'])) { if($clubhouse['cricketnet_file']) { ?>  <a href="/<?php if(isset($clubhouse['cricketnet_file'])) echo $clubhouse['cricketnet_file'];  ?>" target="_blank">View</a><?php } } ?>
					
					</div>
					 <?php } ?>	<?php */?>
				
				<?php /*?>  <?php if(isset($clubhouse['volley'])) {  ?>	
					<div class="col-sm-2 form-group"><b>Volley Ball</b></div>
                    <div class="col-sm-2 form-group">
		   <?php if(isset($clubhouse['volley'])) { if($clubhouse['volley']) { ?>
		    <?php echo $clubhouse['volley']; ?>
		   <?php }} ?></div>
		   
		    <?php } ?>	
			 <?php if(isset($clubhouse['volley_text'])) {  ?>	
		     <div class="col-sm-1 form-group volleyball-text"> <?php if(isset($clubhouse['volley_text'])) { if($clubhouse['volley_text']) { ?>
		    <?php echo $clubhouse['volley_text']; ?>
		   <?php }} ?></div>
		    <?php } ?>	
		   
		    <?php if(isset($clubhouse['volley_file'])) {  ?>	
		   <div class="col-sm-1 form-group volleyball-image">
					 <?php if(isset($clubhouse['volley_file'])) { if($clubhouse['volley_file']) { ?> Image: <a href="/<?php if(isset($clubhouse['volley_file'])) echo $clubhouse['volley_file'];  ?>" target="_blank">View</a><?php } } ?>
					
					</div>
				 <?php } ?>	<?php */?>
                 
                 
					<?php /*?> <?php if(isset($clubhouse['staking'])) {  ?>	
						<div class="col-sm-2 form-group"><b>Skating</b></div>
                        <div class="col-sm-2 form-group">
		  <?php if(isset($clubhouse['staking'])) { if($clubhouse['staking']) { ?>
		    <?php echo $clubhouse['staking']; ?>
		   <?php }} ?></div>
		    <?php } ?>	
		    <?php if(isset($clubhouse['staking_text'])) {  ?>	
		     <div class="col-sm-1 form-group skating-text"> <?php if(isset($clubhouse['staking_text'])) { if($clubhouse['staking_text']) { ?>
		    <?php echo $clubhouse['staking_text']; ?>
		   <?php }} ?></div>
		    <?php } ?>	
		   
		     <?php if(isset($clubhouse['staking_file'])) {  ?>	
		   <div class="col-sm-1 form-group skating-image">
					 <?php if(isset($clubhouse['staking_file'])) { if($clubhouse['staking_file']) { ?> Image: <a href="/<?php if(isset($clubhouse['staking_file'])) echo $clubhouse['volley_file'];  ?>" target="_blank">View</a><?php } } ?>
					
					</div>
					  <?php } ?><?php */?>	
					
					   <?php if(isset($clubhouse['guide'])) {  ?>	
					<div class="col-sm-12 guide-section"><b>Guide</b><br />
					 <?php if(isset($clubhouse['guide'])) { if($clubhouse['guide']) { ?> Image: <a href="/<?php if(isset($clubhouse['guide'])) echo $clubhouse['guide'];  ?>" target="_blank">View</a><?php } } ?>
					   <?php } ?>	
					
					</div>
		  
        </div>
        
    </div>
   </div> 
    
         
   
         @include('partials.footer')
@stop 
      
 