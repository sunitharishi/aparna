
@extends('layouts.appview')

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
        
        
           <div class="panel-heading dirtylkjljj">
               Community
             <a href="{{ route('sites.index') }}" class="btn green-back" style="float:right;margin-bottom:10px;">Back</a>
		  </div>
        
  <!------------------project------------------->  
		   <div class="col-sm-12 communitybackgroundview">
		      <div class="col-sm-3"><b>Project Code: </b> <?php if(isset($site['scode'])) echo $site['scode'];  ?></div>
			  <div class="col-sm-6"><b>Project Name: </b> <?php if(isset($site['name'])) echo $site['name'];  ?> </div>
			<?php if(isset($site['logoimage'])) { if($site['logoimage']) { ?> <div class="col-sm-3"><b>Logo: </b><a href="/<?php if(isset($site['logoimage'])) echo $site['logoimage'];  ?>" target="_blank">View</a> </div> <?php } } ?>
		   </div>
    <!------------------project------------------->  
       
    <!------------------address------------------->       
         <div class="col-sm-12 communitybackgroundview1">
         
		   <div class="assresss">ADDRESS</div>
		   <?php if(isset($site['plot_num'])) { if($site['plot_num']) { ?>
		    <div class="col-sm-2 form-group"><b>Plot No: </b><br /><?php echo $site['plot_num']; ?></div>
		   <?php }} ?>
           
		     <?php if(isset($site['hnum'])) { if($site['hnum']) { ?>
		    <div class="col-sm-2 form-group"><b>H.NO </b><br /><?php echo $site['hnum']; ?></div>
		   <?php }} ?>
           
		     <?php if(isset($site['hnum'])) { if($site['hnum']) { ?>
		    <div class="col-sm-2 form-group"><b>Near By Place </b><br /><?php echo $site['hnum']; ?></div>
		   <?php }} ?>
           
		     <?php if(isset($site['village'])) { if($site['village']) { ?>
		    <div class="col-sm-2 form-group"><b>Village / Town </b><br /><?php echo $site['village']; ?> </div>
		   <?php }} ?>
           
		     <?php if(isset($site['mandal'])) { if($site['mandal']) { ?>
		    <div class="col-sm-2 form-group"><b>Mandal </b><br /><?php echo $site['mandal']; ?> </div>
		   <?php }} ?>
           
		     <?php if(isset($site['district'])) { if($site['district']) { ?>
		    <div class="col-sm-2 form-group"><b>District </b><br /><?php echo $site['district']; ?> </div>
		   <?php }} ?>
           
		  
		     <?php if(isset($site['state'])) { if($site['state']) { ?>
		    <div class="col-sm-2 form-group"><label class="col-sm-12">&nbsp;</label><b>State </b><br /><?php echo $site['state']; ?> </div>
		   <?php }} ?>
		   
		     <?php if(isset($site['pincode'])) { if($site['pincode']) { ?>
		    <div class="col-sm-2 form-group"><label class="col-sm-12">&nbsp;</label><b>Pin Code </b><br /><?php echo $site['pincode']; ?> </div>
		   <?php }} ?>
		 
         
         <div class="col-sm-3 form-group lalitiuse-loigniture">
		     <div class="geograpjical-location">Geographical Location</div>
		     <?php if(isset($site['geo_latitude'])) { if($site['geo_latitude']) { ?>
		    <div class="col-sm-6 form-group"><b>Latitude </b><br /><?php echo $site['geo_latitude']; ?> </div>
		   <?php }} ?>
		   
		    
		     <?php if(isset($site['geo_longitude'])) { if($site['geo_longitude']) { ?>
		    <div class="col-sm-6 form-group"><b>Longitude </b><br /><?php echo $site['geo_longitude']; ?> </div>
            
             
		   <?php }} ?>
		 </div>
          
        </div>
     <!------------------address------------------->   
       <!----------renewal-maintainance-------->
           <div class="col-sm-12 communitybackgroundview">
           
		   <div class="project-renewal-maintaincence">Project Renewal Maintenance</div>
           
            <div class="col-sm-12 maintenance-section">
              <div class="col-sm-3 prepaid-maintenance">
		     <div><b class="prepadi-card">Prepaid</b></div>
		    <?php if(isset($site['prepaid_start_date'])) { if($site['prepaid_start_date']) { ?>
		    <div class="col-sm-6"><label>Start Date </label><br /> <?php echo $site['prepaid_start_date']; ?> </div>
		   <?php }} ?>
		    <?php if(isset($site['prepaid_end_date'])) { if($site['prepaid_end_date']) { ?>
		    <div class="col-sm-6"><label>End Date </label><br /> <?php echo $site['prepaid_end_date']; ?></div>
		   <?php }} ?>
		   </div>
           
             <div class="col-sm-3 postpaid-maintenance odd-evencolors">
             <?php $mgp = 0; if(count($postpaid) > 0) {
				 $mgp = 0; ?> <div class="pstl-padi-margin"><b class="past-paid-card">Post Paid</b></div>
                 
                  <div class="col-sm-2 postpaidlabel-sno">
                 <label>S.No</label>
              </div>
                 
              <div class="col-sm-5 postpaidlabel-startdate">
                <label>Start Date</label>
             </div>
              <div class="col-sm-5 postpaidlabel-enddate">
                 <label>End Date</label> 
             </div>
                 
				 <?php 
			foreach($postpaid as $dgcon) { //echo "<pre>"; // print_r($dgcon); echo "</pre>";?>
            
            <div class="col-sm-2 form-group">
               <span><?php $mgp = $mgp + 1; echo $mgp; ?></span>
            </div>
            
			  <div class="col-sm-5 form-group">
                
                   <?php echo  $dgcon['post_start_date']; ?>
              </div>
			    <div class="col-sm-5 form-group">
                  <?php echo  $dgcon['post_end_date']; ?>
              </div>
			     <?php } } ?> 
		         </div>
               </div>
             </div>
      <!----------renewal-maintainance-------->
     <!---------------overview--------------> 
         <div class="col-sm-12 communitybackgroundview1">    
		    <div class="community-overivew"> Over View</div>
            
		<?php if(isset($site['igbc_certified'])) { if($site['igbc_certified']) { ?>
		<div class="col-sm-2"><b>IGBC Certified </b><br /> <?php echo $site['igbc_certified']; ?></div>
		
		<?php if($site['igbc_certified'] == 'Yes') { ?>
		
		   <div class="col-sm-2"><b>Rating </b><br /> <?php if(isset($site['rating']))echo $site['rating']; ?></div>
		 
		<?php }} } ?>
		
		 <?php if(isset($site['tot_site_area'])) { if($site['tot_site_area']) { ?>
		    <div class="col-sm-2"><b>Total Site Area </b><br /> <?php echo $site['tot_site_area']; ?></div>
		   <?php }} ?>
		    <?php if(isset($site['built_up_area'])) { if($site['built_up_area']) { ?>
		    <div class="col-sm-2"><b>Built-up Area </b><br /> <?php echo $site['built_up_area']; ?></div>
		   <?php }} ?>
		     <?php if(isset($site['scalablearea'])) { if($site['scalablearea']) { ?>
		    <div class="col-sm-2"><b>Saleable Area </b><br /> <?php echo $site['scalablearea']; ?></div>
		   <?php }} ?>
		    <?php if(isset($site['open_space'])) { if($site['open_space']) { ?>
		    <div class="col-sm-2"><b>Open Space </b><br /> <?php echo $site['open_space']; ?></div>
		   <?php }} ?>
           
         </div>
		 <!---------------overview-------------->    
           
           
        <!---------------flats-villas-------------->      
         <div class="col-sm-12 communitybackgroundview"> 
            
		   <?php if(isset($site['flat_type'])) { if($site['flat_type']) { ?>
		    <div class="col-sm-2"><b>Flats / Villas </b><br /> <?php echo $site['flat_type']; ?></div>
            
             <?php if($site['flat_type'] == 'villas') { ?>
		    <div class="col-sm-2"><b>No. of Villas </b><br /> <?php echo $site['num_of_vallas']; ?></div>
		   <?php } ?>
             <?php if($site['flat_type'] == 'flats') { ?>
		    <div class="col-sm-4 flats-begin"><div class="col-sm-4 form-group"><b>No. of Flats </b><br /> <span class="colunt"><?php echo $site['num_of_flats']; ?></span></div>
		   <?php } ?>
            
			 <?php if($site['flat_type'] == 'flats') { ?>
             <div class="col-sm-12 flats-section odd-evencolors">
            <div class="col-sm-2 onebhk"><label>1BHK </label><br /> <?php if(isset($flats['onebhk'])) echo $flats['onebhk']; ?></div>
            <div class="col-sm-3"><label>2BHK </label><br /> <?php  if(isset($flats['twobhk'])) echo $flats['twobhk']; ?></div>
            <div class="col-sm-2"><label>3BHK</label><br /> <?php  if(isset($flats['threebhk']))echo $flats['threebhk']; ?></div>
            <div class="col-sm-3"><label>4BHK</label><br /> <?php  if(isset($flats['fourbhk'])) echo $flats['fourbhk']; ?></div>
            <div class="col-sm-2"><label>5BHK </label><br /> <?php   if(isset($flats['fivebhk'])) echo $flats['fivebhk']; ?></div> 
            </div>
		   <?php } ?>
          </div> 
           
		   
		   
	 <?php if($site['flat_type'] == 'flats') { ?>
			<?php if($site['blocks_num'] == 'Yes') { ?>
			  <?php if(isset($site['num_of_blocks_text'])) { if($site['num_of_blocks_text']) { ?>
		    <div class="col-sm-4"><div class="col-sm-12 form-group"><b>No. of Blocks </b><br /> <?php echo $site['num_of_blocks_text']; ?></div><br /><br />
			
            
            <div class="col-sm-12 total-blockss odd-evencolors">
             <div class="col-sm-2 sno">
                 <label>S.No</label>
              </div>
              <div class="col-sm-4">
                  <label>Block Name</label> 
              </div>
             <div class="col-sm-6">
                <label>Name Change Society</label>
              </div>
			 <?php $m = 0; if(count($firenoc) > 0) {
				 $m = 0;
			foreach($firenoc as $dgcon) {?>
            
                <div class="col-sm-2 snocount">
                   <span><?php $m = $m + 1; echo $m; ?></span>
                </div>
			 <div class="col-sm-4 blicl-naeme">
                  
                 <?php echo  $dgcon['blockname']; ?>
              </div>
			    <div class="col-sm-6 name-changed">
                 <?php echo  $dgcon['name_change_socity']; ?>
              </div>
                <?php } } ?>
                
                </div>
		   <?php } } } }?></div>
           <br>
		   
           
           <div class="col-sm-12 floors-basement-number">
		   <?php if($site['num_of_floors'] == 'Yes') { ?>
			  <?php if(isset($site['num_of_floors_text'])) { if($site['num_of_floors_text']) { ?>
		    <div class="col-sm-2 form-group"><b>No. of Floors </b><br /> <?php echo $site['num_of_floors_text']; ?></div>
			
		   <?php } } } ?>
		   
		     
		   <?php } }?>
		    
		    <?php if(isset($site['basement_one'])) { if($site['basement_one']) { ?>
		<div class="col-sm-2 form-group"><b>Basement </b><br /> <?php echo $site['basement_one']; ?></div>
		
		<?php if($site['basement_one'] == 'Yes') { ?>
		
		   <div class="col-sm-2 form-group"><b>Number </b><br /> <?php if(isset($site['basement_text']))echo $site['basement_text']; ?></div>
		 
         
		<?php } ?> <?php } } ?></div>
		
        </div>
        
		
      <!---------------flats-villas-------------->
       <!---------------helipad-------------->
         <div class="col-sm-12 communitybackgroundview1"> 
		   <?php if(isset($site['hard_land_scpae_area'])) { if($site['hard_land_scpae_area']) { ?>
		    <div class="col-sm-2 form-group"><b>Hardlandscape Area </b><br /> <?php echo $site['hard_land_scpae_area']; ?></div>
		   <?php }} ?>
           
		   <?php if(isset($site['soft_land_scpae_area'])) { if($site['soft_land_scpae_area']) { ?>
		    <div class="col-sm-2 form-group"><b>Softlandscape Area </b><br /> <?php echo $site['soft_land_scpae_area']; ?></div>
		   <?php }} ?>
		   
		 <?php if(isset($site['helipad'])) { if($site['helipad']) { ?>
		<div class="col-sm-2 form-group"><b>Helipad Area </b><br /> <?php echo $site['helipad']; ?></div>
		
		<?php if($site['helipad'] == 'Yes') { ?>
		
		   <div class="col-sm-2 form-group"><b>Number </b><br /> <?php if(isset($site['helipad_text']))echo $site['helipad_text']." Mtrs."; ?></div>
		   
		   <?php if(isset($site['helippad_file'])) { if($site['helippad_file']) { ?> <div class="col-sm-2 form-group"><b>Helipad: </b><br /> <a href="/<?php if(isset($site['helippad_file'])) echo $site['helippad_file'];  ?>" target="_blank">View</a></div> <?php } } ?>
		 
		<?php }} } ?>
			
           </div>
  <!---------------helipad-------------->
 <!---------------elevators-bms-------------->
         <div class="col-sm-12 communitybackgroundview elevationss">    
			<div class="elevatorea-showpage"></div>
			
		   <?php if(isset($site['rainwater_harvest'])) { if($site['rainwater_harvest']) { ?>
		    <div class="col-sm-2"><b>Rainwater Harvesting Pits </b><br /> <?php echo $site['rainwater_harvest']; ?></div>
		   <?php }} ?>
		   
		      <?php if(isset($site['borewells'])) { if($site['borewells']) { ?>
		    <div class="col-sm-2"><b> Borewells </b><br /> <?php echo $site['borewells']; ?></div>
		   <?php }} ?>
		 
		  
		   <?php if(isset($site['lifts'])) { if($site['lifts']) { ?>
		     <div class="col-sm-4 elevstors-lidts"><div class="col-sm-3 form-group"><b>Lifts/Elevators </b><br /> <span class="lifts-count"><?php echo $site['lifts']; ?></span></div>
			
			
            
            <div class="row lifts-elevators-section odd-evencolors">
            
             <div class="col-sm-2">
                 <label>S.No</label>
             </div>
             <div class="col-sm-4">
                 <label>Lift Number</label>
             </div>
             <div class="col-sm-3">
                <label>Make </label>
             </div>
             <div class="col-sm-3">
                <label>Type</label>
             </div>
			  <?php $mgl = 0; if(count($lifts) > 0) {
				 $mgl = 0;
			foreach($lifts as $dgcon) { //echo "<pre>"; print_r($dgcon); echo "</pre>";?>
			 
               <div class="col-sm-2">
                    <span><?php $mgl = $mgl + 1; echo $mgl; ?></span>
               </div>
             
                 <div class="col-sm-4" >
                  
                  <?php echo  $dgcon['lift_num']; ?> 
              </div>
			    <div class="col-sm-3">
                <?php echo  $dgcon['make']; ?>
              </div>
              <div class="col-sm-3">
                 <?php echo  $dgcon['type']; ?>
              </div>
			     <?php } } ?></div>
			
			
          
		   </div>
             <?php 
			  
		  }} ?>
           
           
           <div class="col-sm-4 solar-popup">
			 <?php if(isset($site['solar_water_heater'])) { if($site['solar_water_heater']) { ?>
		<div class="col-sm-6 form-group"><b>Solar Water Heaters </b><br /> <span><?php echo $site['solar_water_heater']; ?></span></div>
		
		<?php if($site['solar_water_heater'] == 'Yes') { ?>
		
		  <?php if(isset($site['solar_water_heat_text'])) { if($site['solar_water_heat_text']) { ?>
		  <div class="col-sm-6 form-group dolsfd-popuup"><b> Number </b><br /> <span><?php echo $site['solar_water_heat_text']; ?></span> </div>  
		   <?php }} ?>
        
            <div class="col-sm-12 solar-heater-popup">
              <div class="col-sm-2">
                 <label>S.No</label>
              </div>
               <div class="col-sm-4">
                 <label>Location</label> 
           </div>
            <div class="col-sm-3">
                 <label>Capacity</label> 
           </div>
            <div class="col-sm-3">
                 <label>Make</label> 
           </div>
        
         </div>
         
           <?php $mt = 0; if(count($solarsys) > 0) {
				 $mt = 0;
			foreach($solarsys as $dgcon) { //echo "<pre>"; print_r($dgcon); echo "</pre>";?>
          
		<div class="col-sm-12 solar-heater-popup">
               <div class="col-sm-2">
                  <span><?php $mt = $mt + 1; echo $mt; ?></span>
               </div>
		        <div class="col-sm-4 form-group"> 
                   <?php    echo  $dgcon['location']; ?>
                </div>
				
              <div class="col-sm-3 form-group"> 
                   <?php    echo  $dgcon['capacity']; ?>
                </div>
				 <div class="col-sm-3 form-group"> 
                      <?php echo  $dgcon['make']; ?>
                </div>
              
                  
                </div>
             
                <?php }  ?> <?php  } ?> 
		
		 
		 
		<?php }} } ?>
        
       
        
		 </div>
           
           
           
         </div>
         
          <div class="col-sm-12 communitybackgroundview1 elevationss">    
           
		  <div class="msmss">BMS</div>
		   <?php if(isset($site['bms_prepaid'])) { if($site['bms_prepaid']) { ?>
		    <div class="col-sm-4"><b>Prepaid  Systems </b><br /> <?php echo $site['bms_prepaid']; ?></div>
		   <?php }} ?>
		   
		    <?php if(isset($site['bms_postpaid'])) { if($site['bms_postpaid']) { ?>
		    <div class="col-sm-4"><b>PostPaid Systems </b><br /> <?php echo $site['bms_postpaid']; ?></div>
		   <?php }} ?>
		   
		    <?php if(isset($site['bms_irrigation_sys'])) { if($site['bms_irrigation_sys']) { ?>
		    <div class="col-sm-4"><b>Irrigation System</b><br /> <?php echo $site['bms_irrigation_sys']; ?></div>
		   <?php }} ?>
		</div>
	 <!---------------elevators-bms-------------->
     
     	 <!----------------electrical-distribution--------------> 
	    <div class="col-sm-12 communitybackgroundview">    
			<div class="electical-disteibutionview">Electrical Distribution System</div>
			
			  <?php if(isset($site['contracted_md'])) { if($site['contracted_md']) { ?>
		    <div class="col-sm-2 form-group"><b>Contracted MD (KVA/HP)</b><br /> <?php echo $site['contracted_md']; ?></div>
		   <?php }} ?>
		   
		     <?php if(isset($site['specified_voltage'])) { if($site['specified_voltage']) { ?>
		    <div class="col-sm-3 form-group"><b>Specified Voltage(KV)</b><br /> <?php echo $site['specified_voltage']; ?></div>
		   <?php }} ?>
		   
		      <?php if(isset($site['actuval_voltage'])) { if($site['actuval_voltage']) { ?>
		    <div class="col-sm-2 form-group"><b>Actual Voltage(KV)</b><br /> <?php echo $site['actuval_voltage']; ?></div>
		   <?php }} ?>
		   
		      <?php if(isset($site['feeder'])) { if($site['feeder']) { ?>
		    <div class="col-sm-2 form-group"><b>Feeder</b><br /> <?php echo $site['feeder']; ?></div>
		   <?php }} ?>
		   
		    <?php if(isset($site['category'])) { if($site['category']) { ?>
		    <div class="col-sm-2 form-group"><b>Category</b><br /> <?php echo $site['category']; ?></div>
		   <?php }} ?>
		   
           
             <!-------transformers-set--------------->
        <div class="col-sm-12 transrer-section">
		   <?php if(isset($site['transformers'])) { if($site['transformers']) { ?>
		   <div class="col-sm-6 padding-transformers"> <div class="col-sm-12 form-group"><b>Transformers </b><br /> <span><?php echo $site['transformers']; ?></span></div>
			
   
                 <div class="col-sm-2">
             <label>S.No</label>
          </div>
          <div class="col-sm-3">
             <label>Capacity</label>
          </div>
           <div class="col-sm-3">
              <label>Location</label>
          </div>
           <div class="col-sm-2">
               <label>Make</label>
          </div>
           <div class="col-sm-2">
              <label>Image</label>
          </div>
			
			  <?php $mt = 0; if(count($transformer) > 0) {
				 $mt = 0;
			foreach($transformer as $dgcon) { //echo "<pre>"; print_r($dgcon); echo "</pre>";?>
          
       
          
          
             <div class="col-sm-2">
                <span><?php $mt = $mt + 1; echo $mt; ?></span>
             </div>
            <div class="col-sm-3 form-group"> 
                    <?php    echo  $dgcon['capacity']; ?>
                </div>
				 <div class="col-sm-3 form-group"> 
				    <?php    echo  $dgcon['location']; ?>
                </div>
				 <div class="col-sm-2 form-group"> 
                      <?php echo  $dgcon['make']; ?>
                </div>
                <div class="col-sm-2 form-group">
					 <?php if(isset($dgcon['filename'])) { if($dgcon['filename']) { ?> <div></div><a href="/<?php if(isset($dgcon['filename'])) echo $dgcon['filename'];  ?>" target="_blank">View</a><?php } } ?>
                  
                </div>  
            
              
                <?php } } ?> 
		   <?php }} ?></div>
            
           
		 <!-------transformers-set--------------->	
            
           
			 <?php if(isset($site['dgsets'])) { if($site['dgsets']) { ?>
		   <div class="col-sm-6 tengatrnassste"> <div class="col-sm-12 form-group bullshetss"><b>DG Sets:</b><br /> <span><?php echo $site['dgsets']; ?></span></div>
			
      <!-----------------dg-set--------------->
			 <div class="col-sm-12 dg-setess">
             
             <div class="col-sm-2">
                <label>S.No</label>
             </div>
             <div class="col-sm-3">
                 <label> Capacity </label>
             </div>
             <div class="col-sm-3">
                <label>Location</label>
             </div>
             <div class="col-sm-2">
                <label> Make</label>
             </div>
             <div class="col-sm-2">
                <label>Image</label>
             </div>
             
             
                <?php $mt = 0; if(count($dgsets) > 0) {
				 $mt = 0;
			foreach($dgsets as $dgcon) { //echo "<pre>"; print_r($dgcon); echo "</pre>";?>
           
               <div class="col-sm-2 form-group">
                   <span><?php $mt = $mt + 1; echo $mt; ?></span>
               </div>
          
            <div class="col-sm-3 form-group"> 
                  
                 <?php    echo  $dgcon['capacity']; ?>
                </div>
				 <div class="col-sm-3 form-group"> 
				   <?php    echo  $dgcon['location']; ?>
                </div>
				 <div class="col-sm-2 form-group"> 
                   <?php echo  $dgcon['make']; ?>
                </div>
                <div class="col-sm-2 form-group">
					  <?php if(isset($dgcon['filename'])) { if($dgcon['filename']) { ?> <div></div><a href="/<?php if(isset($dgcon['filename'])) echo $dgcon['filename'];  ?>" target="_blank">View</a><?php } } ?>
                  
                </div>  
             
                <?php } } ?>
              </div></div>
			 <?php
		    }} ?>
            </div> 
        <!-----------------dg-set--------------->
		   
           
         <div class="col-sm-12 power-solarpowersection">  
		  
		     <?php if(isset($site['power_backup'])) { if($site['power_backup']) { ?>
		    <div class="col-sm-2 form-group power-backkups"><b> Power Back-Up</b><br /> <span> <?php echo $site['power_backup']; ?></span></div>
		   <?php }} ?>
           
	<!---------------solar-number------------->
		 <div class="col-sm-6 solar-powernumbner">
		    <?php if(isset($site['solar_power'])) { if($site['solar_power']) { ?>
		<div class="col-sm-6 form-group"><b>Solar Power </b><br />  <?php echo $site['solar_power']; ?></div>
		
		<?php if($site['solar_power'] == 'Yes') { ?>
		
		  <?php if(isset($site['solar_pwr_text'])) { if($site['solar_pwr_text']) { ?>
		  <div class="col-sm-6 form-group"><b>Solar Power Number </b><br /> <span> <?php echo $site['solar_pwr_text']; ?></span></div>
		   <?php }} ?>
          
           
		<!---------------solar-number------------->
        
        <!---------------solar-adding------------->
          <div class="col-sm-12 solar-poweradding">
            <div class="col-sm-2">
               <label>S.No</label>
            </div>
            <div class="col-sm-3">
                <label>Capacity</label>
            </div>
             <div class="col-sm-3">
                <label>Location</label>
            </div>
             <div class="col-sm-2">
                <label>Make</label>
            </div>
             <div class="col-sm-2">
                <label>Image</label>
            </div>
          
          
            <?php $mt = 0; if(count($solarpwrsys) > 0) {
				 $mt = 0;
			foreach($solarpwrsys as $dgcon) { //echo "<pre>"; print_r($dgcon); echo "</pre>";?>
         
         
                <div class="col-sm-2">
                   <span><?php $mt = $mt + 1; echo $mt; ?></span>
                </div>
            
              <div class="col-sm-3 form-group"> 
                    <?php    echo  $dgcon['capacity']; ?>
                </div>
				 <div class="col-sm-3 form-group"> 
				    <?php    echo  $dgcon['location']; ?>
                </div>
				 <div class="col-sm-2 form-group"> 
                     <?php echo  $dgcon['make']; ?>
                </div>
                <div class="col-sm-2 form-group">
					<?php if(isset($dgcon['filename'])) { if($dgcon['filename']) { ?> <a href="/<?php if(isset($dgcon['filename'])) echo $dgcon['filename'];  ?>" target="_blank">View</a><?php } } ?>
                  
                </div>  
            
                <?php } } ?>
		  
		  </div>
		<?php }} } ?>
         </div>
		<!---------------solar-adding------------->
		</div>
      </div>  
       <!----------------electrical-distribution--------------> 
      <!--------------water-distribution------------->
        <div class="col-sm-12 communitybackgroundview">  
           <div class="water-sidtributin-system">Water Distribution System</div>  
		
		    <?php if(isset($site['municipal_water'])) { if($site['municipal_water']) { ?>
		<div class="col-sm-2 form-group"><b>Municipal Water </b><br /> <?php echo $site['municipal_water']; ?></div>
		
		<?php if($site['municipal_water'] == 'Yes') { ?>
		
		  <?php if(isset($site['contracted_kl'])) { if($site['contracted_kl']) { ?>
		  <div class="col-sm-2 form-group"><b>Contracted (KL) </b><br /> <?php echo $site['contracted_kl']; ?></div>
		   <?php }} ?>
		
		<?php }} } ?>
		
		
        
        <div class="col-sm-12 wsp-stpsection">
		   <?php if(isset($site['wsp'])) { if($site['wsp']) { ?>
           <div class="col-sm-6 wsp-section">
		    <div class="col-sm-12 form-group wsp-addingpoopup"><b>Wsp</b><br /> <span><?php echo $site['wsp']; ?></span></div>
			
			<div class="col-sm-12 wspadding-display">
              
              
              <div class="col-sm-2">
                  <label>S.No</label>
              </div>
              <div class="col-sm-3">
                  <label>Phase</label>
              </div>
               <div class="col-sm-3">
                  <label>Capacity</label>
              </div>
               <div class="col-sm-2">
                  <label>Make</label>
              </div>
               <div class="col-sm-2">
                  <label>Image</label>
              </div>
              
             <?php $mt = 0; if(count($wsp) > 0) {
				 $mt = 0;
			foreach($wsp as $dgcon) { //echo "<pre>"; print_r($dgcon); echo "</pre>";?>
			
            <div class="col-sm-2">
               <span><?php $mt = $mt + 1; echo $mt; ?></span>
            </div>
               
			  <div class="col-sm-3 form-group"> 
                  
                     <?php    echo  $dgcon['type']; ?>
                </div>
          
               <div class="col-sm-3 form-group"> 
                     <?php    echo  $dgcon['capacity']; ?>
                </div>
				 <div class="col-sm-2 form-group"> 
                    <?php echo  $dgcon['make']; ?>
                </div>
                <div class="col-sm-2 form-group">
					 <?php if(isset($dgcon['filename'])) { if($dgcon['filename']) { ?> <div></div><a href="/<?php if(isset($dgcon['filename'])) echo $dgcon['filename'];  ?>" target="_blank">View</a><?php } } ?>
                  
                </div>  
            
                <?php } } ?> 
			</div></div>   <?php
		    }} ?>
			
          
           
			
			 <?php if(isset($site['stp'])) { if($site['stp']) { ?>
		   <div class="col-sm-6 sep-section"> <div class="col-sm-12 form-group stp-popupadding"><b>Stp</b><br /> <span><?php echo $site['stp']; ?></span></div>
			
			<div class="col-sm-12 stp-adding-popup">
            
            <div class="col-sm-1">
               <label>S.No</label>
            </div>
            <div class="col-sm-2">
               <label>Phase</label>
            </div>
            <div class="col-sm-2">
               <label>Capacity</label>
            </div>
            <div class="col-sm-2">
               <label>Make</label>
            </div>
            <div class="col-sm-2">
               <label>Image</label>
            </div>
             <div class="col-sm-3">
               <label>Technology</label>
            </div>
            
             <?php $mt = 0; if(count($stp) > 0) {
				 $mt = 0;
			foreach($stp as $dgcon) { //echo "<pre>"; print_r($dgcon); echo "</pre>";?>
			
            <div class="col-sm-1 form-group">
               <span><?php $mt = $mt + 1; echo $mt; ?></span>
            </div>
            
			<div class="col-sm-2 form-group"> 
                     <?php    echo  $dgcon['type']; ?>
                </div>
                <div class="col-sm-2 form-group"> 
                   <?php    echo  $dgcon['capacity']; ?>
                </div>
				 <div class="col-sm-2 form-group"> 
                    <?php echo  $dgcon['make']; ?>
                </div>
                <div class="col-sm-2 form-group">
					<?php if(isset($dgcon['filename'])) { if($dgcon['filename']) { ?> <a href="/<?php if(isset($dgcon['filename'])) echo $dgcon['filename'];  ?>" target="_blank">View</a><?php } } ?>
				  
                </div>  
             
			  <div class="col-sm-3"> 
                     <?php echo  $dgcon['technology']; ?>
                </div>
               
                <?php } } ?> 
			   </div></div><?php
		    }} ?>
            
            </div>
           
  <div>
		<div class="col-sm-12 hydro-popupadding"><b>Hydro Pneumatic System: </b> </div>
      
      
      <div class="col-sm-6 form-group municipal-water-supply1">
			 <label class="col-sm-12 control-label">Municipal Water Supply</label>
			 
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
		 <label class="col-sm-12 control-label">Domestic Water Supply</label>
		
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
		 <label class="col-sm-12 control-label">Flush Water Supply</label>
		
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
       
		</div>
      <!--------------water-distribution------------->
        <!--------------reticulated-piped------------->
		  <div class="col-sm-12 communitybackgroundview1"> 
            <div class="reticulated-pipedgas">Reticulated Piped Gas</div> 
		<?php if(isset($site['gas_banks'])) { if($site['gas_banks']) { ?>
		    <div class="col-sm-12 form-group gas-banks"><b>Gas Banks</b><br /> <span><?php echo $site['gas_banks']; ?></span></div>
			
			
          <div class="col-sm-12 gasbanks-popup">
            <div class="col-sm-1">
               <label>S.No</label>
            </div>
            <div class="col-sm-2">
               <label>Bank Name</label>
            </div>
             <div class="col-sm-3">
                <label>Location</label>
            </div>
             <div class="col-sm-2">
                <label>Capacity</label>
            </div>
             <div class="col-sm-2">
                <label>Make</label>
            </div>
           <div class="col-sm-2">
              <label>Image</label>
           </div>
          
          <?php $mt = 0; if(count($gasbank) > 0) {
				 $mt = 0;
			foreach($gasbank as $dgcon) { //echo "<pre>"; print_r($dgcon); echo "</pre>";?>
            
            <div class="col-sm-1">
               <span><?php $mt = $mt + 1; echo $mt; ?></span>
            </div>
			 <div class="col-sm-2"> 
                   
                   <?php    echo  $dgcon['name']; ?>
                </div>
				<div class="col-sm-3"> 
                   <?php    echo  $dgcon['location']; ?>
                </div>
               <div class="col-sm-2"> 
                   <?php    echo  $dgcon['capacity']; ?>
                </div>
				 <div class="col-sm-2"> 
                       <?php echo  $dgcon['make']; ?>
                </div>
                <div class="col-sm-2">
					 <?php if(isset($dgcon['filename'])) { if($dgcon['filename']) { ?> <a href="/<?php if(isset($dgcon['filename'])) echo $dgcon['filename'];  ?>" target="_blank">View</a><?php } } ?>
                  
                </div>  
             
                <?php } } ?>
			 </div> <?php
		    }} ?>
           
			
			  <?php if(isset($site['num_of_cylinders'])) { if($site['num_of_cylinders']) { ?>
		    <div class="col-sm-2"><label class="col-sm-12 emptuu">&nbsp;</label><b> No of Cylinders</b><br /> <?php echo $site['num_of_cylinders']; ?></div>
		   <?php }} ?>
		   
		   </div>
      <!--------------reticulated-piped------------->
        
        
         <!--------------fire-safety------------->
		 <div class="col-sm-12 communitybackgroundview"> 
            <div class="fireand-fatety">Fire & Safety</div>  
			
			   <div class="detectors-popup"><b>Detectors</b></div>
		   
		   	  <?php if(isset($site['smoke'])) { if($site['smoke']) { ?>
		    <div class="col-sm-2 form-group smoke-popup1"><label> Smoke</label><br /> <?php echo $site['smoke']; ?></div>
		   <?php }} ?>
		   <?php if(isset($site['smoke_image'])) { if($site['smoke_image']) { ?> <div class="col-sm-2 form-group"><b>Image: </b> <br /><a href="/<?php if(isset($site['smoke_image'])) echo $site['smoke_image'];  ?>" target="_blank">View</a></div><?php } } ?>
		   
		    <?php if(isset($site['heat'])) { if($site['heat']) { ?>
		    <div class="col-sm-2 form-group"><label> Heat</label><br /> <?php echo $site['heat']; ?></div>
		   <?php }} ?>
		   <?php if(isset($site['heat_image'])) { if($site['heat_image']) { ?> <div class="col-sm-2 form-group"><b>Image: </b><br /><a href="/<?php if(isset($site['heat_image'])) echo $site['heat_image'];  ?>" target="_blank">View</a></div><?php } } ?>
           
           
           
		 <div class="col-sm-12 firepump-publicsection">  
		   <?php if(isset($site['fire_pump_rooms'])) { if($site['fire_pump_rooms']) { ?>
		   <div class="col-sm-6 fire-pumpsection"> <div class="col-sm-12 form-group fire-pumpopoup"><b>Fire Pump Rooms</b><br /> <span><?php echo $site['fire_pump_rooms']; ?></span></div>
			
			<?php if((int)$site['fire_pump_rooms'] > 0) {
			
			?><div>
              
             
              
              <div class="col-sm-2">
                 <label>S.No</label>
              </div>
              <div class="col-sm-2">
                 <label>Location</label>
              </div>
              <div class="col-sm-2">
                 <label>Jockey</label>
              </div>
              <div class="col-sm-2">
                   <label>Main</label>
              </div>
              <div class="col-sm-2">
                  <label>DG</label>
              </div>
             <div class="col-sm-2">
                <label>Booster</label>
             </div>
            
			  <?php  if((int)$site['fire_pump_rooms'] > 0) {
			   if(count($powerpumps) > 0) {
			   foreach($powerpumps as $dgcn) {
			 ?>
			 
                <div class="col-sm-2">
                   <span></span>
              </div>
             
			 	<div class="col-sm-2 pumpee">
			  <?php if(isset($dgcn['location']))  echo $dgcn['location'] ; ?>
              </div>
			<div class="col-sm-2 pumpee">
			  <?php if(isset($dgcn['jockey']))  echo $dgcn['jockey'] ; ?>
              </div>
			  <div class="col-sm-2 pumpeee1">
                 <?php if(isset($dgcn['main']))  echo $dgcn['main'] ; ?>
              </div>
           <div class="col-sm-2 pumpeee2">
                 <?php if(isset($dgcn['dg']))  echo $dgcn['dg'] ; ?>
              </div>
           
           <div class="col-sm-2 pumpeee3">
               <?php if(isset($dgcn['booster']))  echo $dgcn['booster'] ; ?>
            
			 </div>
			
		    <?php }} } ?> </div>
			  <?php } ?> </div> <?php }} ?>
			
			
			
			
			<?php if(isset($site['public_addressing_system'])) { if($site['public_addressing_system']) { ?>
		    <div class="col-sm-6 pubkic-sector"><div class="col-sm-12 form-group punlic-popupup"><b>Public Addressing System</b><br /> <span><?php echo $site['public_addressing_system']; ?></span></div>
			
		
            <div class="col-sm-12 pubkic-ppopup public-addressing">
            <div class="col-sm-2">
               <label>S.No</label>
            </div>
            <div class="col-sm-4">
               <label>Location</label>
            </div>
            <div class="col-sm-3">
               <label> Make</label>
            </div>
            <div class="col-sm-3">
                <label>Image</label>
            </div>
            
			  <?php $mt = 0; if(count($pbasys) > 0) {
				 $mt = 0;
			foreach($pbasys as $dgcon) { //echo "<pre>"; print_r($dgcon); echo "</pre>";?>
           
           
               <div class="col-sm-2">
                   <span><?php $mt = $mt + 1; echo $mt; ?></span>
               </div>
               <div class="col-sm-4"> 
                  
                  <?php    echo  $dgcon['location']; ?>
                </div>
				 <div class="col-sm-3"> 
                    <?php echo  $dgcon['make']; ?>
                </div>
                <div class="col-sm-3">
					 <?php if(isset($dgcon['filename'])) { if($dgcon['filename']) { ?> <a href="/<?php if(isset($dgcon['filename'])) echo $dgcon['filename'];  ?>" target="_blank">View</a><?php } } ?></div>
                  
                 
             
                <?php } } ?> 
			 </div></div>
		    <?php }} ?>
	    </div>
    
      <div class="col-sm-12 firealarm-flowannunicator">
			<?php if(isset($site['fire_alaram_system'])) { if($site['fire_alaram_system']) { ?>
		    <div class="col-sm-6 firealarm-section"><div class="col-sm-12 form-group friwals-popoup"><b>Fire Alarm System:</b><br /> <span><?php echo $site['fire_alaram_system']; ?></span></div>
			
			<div class="fire-alarm-system">
            <div class="col-sm-2">
               <label>S.No</label>
            </div>
             <div class="col-sm-4">
                <label>Location</label>
            </div>
             <div class="col-sm-3">
               <label>Make</label>
            </div>
             <div class="col-sm-3">
                <label>Image</label>
            </div>
            
            <?php $mt = 0; if(count($firealaram) > 0) {
				 $mt = 0;
			foreach($firealaram as $dgcon) { //echo "<pre>"; print_r($dgcon); echo "</pre>";?>
            
            
               <div class="col-sm-2 form-group">
                   <span><?php $mt = $mt + 1; echo $mt; ?></span>
               </div>
               
               <div class="col-sm-4 form-group"> 
                    
                   <?php    echo  $dgcon['location']; ?>
                </div>
				 <div class="col-sm-3 form-group"> 
                     <?php echo  $dgcon['make']; ?>
                </div>
                <div class="col-sm-3 form-group">
					 <?php if(isset($dgcon['filename'])) { if($dgcon['filename']) { ?> <a href="/<?php if(isset($dgcon['filename'])) echo $dgcon['filename'];  ?>" target="_blank">View</a><?php } } ?> </div>
                  
               
             
                <?php } }  ?> 
			 </div> <?php
		    } ?>  </div>
             <?php } ?>
			
			
			<?php if(isset($site['flow_anounciator'])) { if($site['flow_anounciator']) { ?>
		   <div class="col-sm-6 flowannunicator-section"> <div class="col-sm-12 form-group friwals-popoup"><b>Flow Annuciator Panel</b><br /> <span><?php echo $site['flow_anounciator']; ?></span></div>
			
			<div class="fire-alarm-system">
              
              <div class="col-sm-2">
                 <label>S.No</label>
              </div>
              <div class="col-sm-3">
                 <label>Location</label>
              </div>
              <div class="col-sm-3">
                 <label>Make</label>
              </div>
              <div class="col-sm-2">
                 <label>Zone</label>
              </div>
              <div class="col-sm-2">
                 <label>Image</label>
              </div>
              
              
            <?php $mt = 0; if(count($siteflowann) > 0) {
				 $mt = 0;
			foreach($siteflowann as $dgcon) { //echo "<pre>"; print_r($dgcon); echo "</pre>";?>
            
               <div class="col-sm-2">
                  <span><?php $mt = $mt + 1; echo $mt; ?></span>
               </div>
            
               <div class="col-sm-3 form-group"> 
                    
                   <?php    echo  $dgcon['location']; ?>
                </div>
				 <div class="col-sm-3 form-group"> 
                      <?php echo  $dgcon['make']; ?>
                </div>
				 <div class="col-sm-2 form-group"> 
                      <?php echo  $dgcon['flowzone']; ?>
                </div>
                <div class="col-sm-2 form-group">
					<?php if(isset($dgcon['filename'])) { if($dgcon['filename']) { ?> <a href="/<?php if(isset($dgcon['filename'])) echo $dgcon['filename'];  ?>" target="_blank">View</a><?php } } ?> </div>
                  
               
             
                <?php } }  ?>
			  </div> <?php
		    } ?> <?php } ?>
			
			 </div> 
			
			
            
      </div>
    <!--------------fire-safety------------->   
  <!--------------security--------------->  
         	
	 <div class="col-sm-12 communitybackgroundview1">
          <div class="col-sm-12 form-group">
             <div class="security">Security</div> 
			 
			 
			
		<?php if(isset($site['boombarier_meter'])) { if($site['boombarier_meter']) { ?>
		    <div class="col-sm-6 last-boombarriersectuib"><div class="col-sm-12 form-group gas-banks" style="padding-left:0px;"><b>Boom Barrier</b><br /> <span><?php echo $site['boombarier_meter']; ?></span></div>
			
			
         <div class="col-sm-12 gasbanks-popup" style="padding-left:0px;">
         
           <div class="col-sm-2 gasbanks-sno">
              <label>S.No</label>
           </div>
           <div class="col-sm-4">
              <label>Length</label>
           </div>
            <div class="col-sm-3">
               <label>Make</label>
           </div>
            <div class="col-sm-3">
               <label>Location</label>
           </div>
         
			  <?php $mt = 0; if(count($boombarrier) > 0) {
				 $mt = 0;
			foreach($boombarrier as $dgcon) { //echo "<pre>"; print_r($dgcon); echo "</pre>";?>
           
           
              <div class="col-sm-2">
                 <span><?php $mt = $mt + 1; echo $mt; ?></span>
              </div>
               <div class="col-sm-4"> 
                   
                   <?php    echo  $dgcon['length']; ?>
                </div>
				 <div class="col-sm-3"> 
                      <?php echo  $dgcon['make']; ?>
                </div>
				 <div class="col-sm-3"> 
                     <?php echo  $dgcon['location']; ?>
                </div>
               
             
                <?php } } ?>  </div></div> <?php
		    }} ?>
			 
			 
		 
          
          
          <div class="col-sm-6 form-group cctv-lastsection">
             
			<div><b>CCTV</b></div><br />
		    <?php if(isset($site['cctv_number'])) { if($site['cctv_number']) { ?>
		    <div class="col-sm-6" style="padding-left:0px;"><label> Number</label><br /> <?php echo $site['cctv_number']; ?></div>
		   <?php }} ?>
		    <?php if(isset($site['cctv_make'])) { if($site['cctv_make']) { ?>
		    <div class="col-sm-6"><label> Make</label><br /> <?php echo $site['cctv_make']; ?></div>
		   <?php }} ?>
		  </div> 
		   
           
           <div class="col-sm-6 form-group last-solarsection">
             <label class="col-sm-12 emptyu">&nbsp;</label>
			<div><b>Solar Fencing</b></div>
		    <?php if(isset($site['solar_fence_zones'])) { if($site['solar_fence_zones']) { ?>
		    <div class="col-sm-4" style="padding-left:0px;"><label> Number of zones</label><br /> <?php echo $site['solar_fence_zones']; ?></div>
		   <?php }} ?>
		    <?php if(isset($site['solar_fence_make'])) { if($site['solar_fence_make']) { ?>
		    <div class="col-sm-4"><label> Make</label><br /> <?php echo $site['solar_fence_make']; ?></div>
		   <?php }} ?>
		   
		     <?php if(isset($site['solar_fence_length'])) { if($site['solar_fence_length']) { ?>
		    <div class="col-sm-4"><label> Length</label><br /> <?php echo $site['solar_fence_length']; ?></div>
		   <?php }} ?>
		   
		     <?php if(isset($site['lighten_protection'])) { if($site['lighten_protection']) { ?>
		    <div class="col-sm-4"><label> Length</label><br /> <?php echo $site['lighten_protection']; ?></div>
		   <?php }} ?>
		 </div> 
         
          </div> 
		</div>   
	<!--------------security---------------> 
     
    	   
		 <div class="col-sm-12 communitybackgroundview club-housesection">   
		   <div class="col-sm-12 club-house-popup">CLUB HOUSE</div>
           
            <div class="col-sm-2 form-group clubhouse-heading">
           </div>
           <div class="col-sm-2 form-group available-heading">
           </div>
           <div class="col-sm-1 form-group textbox-heading">
           </div>
           <div class="col-sm-1 fomr-group image-section">
              <label>Image</label>
           </div>
            <div class="col-sm-2 form-group clubhouse-heading">
           </div>
           <div class="col-sm-2 form-group available-heading">
           </div>
           <div class="col-sm-1 form-group textbox-heading">
           </div>
           <div class="col-sm-1 fomr-group image-section">
              <label>Image</label>
           </div>
		   
		   <?php if(isset($clubhouse['badminton_court'])) {  ?><div class="col-sm-2 form-group"><b>Badminton Court</b></div>
           <div class="col-sm-2 form-group">
		    <?php if(isset($clubhouse['badminton_court'])) { if($clubhouse['badminton_court']) { ?>
		    <?php echo $clubhouse['badminton_court']; ?>
		   <?php }} ?></div> <?php } ?>
		   
		    <?php if(isset($clubhouse['badminton_text'])) {  ?>  <div class="col-sm-1 form-group badminton-text"> <?php if(isset($clubhouse['badminton_text'])) { if($clubhouse['badminton_text']) { ?>
		    <?php echo $clubhouse['badminton_text']; ?>
		   <?php }} ?></div><?php } ?>
		   
		  <?php if(isset($clubhouse['badminton_file'])) {  ?>  <div class="col-sm-1 form-group badminton-image">
					 <?php if(isset($clubhouse['badminton_file'])) { if($clubhouse['badminton_file']) { ?>  <a href="/<?php if(isset($clubhouse['badminton_file'])) echo $clubhouse['badminton_file'];  ?>" target="_blank">View</a><?php } } ?></div> <?php } ?>
					
					
					
				  <?php if(isset($clubhouse['squash'])) {  ?> 	 <div class="col-sm-2 form-group"><b>Squash Court</b></div>
                  <div class="col-sm-2 form-group">
		    <?php if(isset($clubhouse['squash'])) { if($clubhouse['squash']) { ?>
		    <?php echo $clubhouse['squash']; ?><?php } ?>
		   <?php }} ?></div>
		   
		      <?php if(isset($clubhouse['squash_text'])) {  ?> 	<div class="col-sm-1 form-group squash-courttext"> <?php if(isset($clubhouse['squash_text'])) { if($clubhouse['squash_text']) { ?>
		    <?php echo $clubhouse['squash_text']; ?>
		   <?php }} ?></div><?php } ?>
		   
		  <?php if(isset($clubhouse['squash_file'])) {  ?> <div class="col-sm-1 form-group squash-courtimage">
					 <?php if(isset($clubhouse['squash_file'])) { if($clubhouse['squash_file']) { ?> <a href="/<?php if(isset($clubhouse['squash_file'])) echo $clubhouse['squash_file'];  ?>" target="_blank">View</a><?php } } ?>
					
					</div><?php } ?>
					
				  <?php if(isset($clubhouse['squash_file'])) {  ?>	
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
					
					</div><?php } ?>
					
					
			 <?php if(isset($clubhouse['multi_purpose_hall'])) {  ?>		
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
				<?php } ?>	
				
				   <?php if(isset($clubhouse['clicnic_court'])) {  ?>	
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
					 <?php } ?>	
					
					  <?php if(isset($clubhouse['gym'])) {  ?>	
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
					 <?php } ?>	
					
				  <?php if(isset($clubhouse['aerobics_court'])) {  ?>	
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
					 <?php } ?>	
					
					   <?php if(isset($clubhouse['cafeteria'])) {  ?>	 
					
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
					<?php } ?>	
					
					<?php if(isset($clubhouse['lounge_court'])) {  ?>	 
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
				<?php } ?>		
				 <?php if(isset($clubhouse['library'])) {  ?>		
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
					  <?php } ?>		
					
				  <?php if(isset($clubhouse['spa_court'])) {  ?>	
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
				  <?php } ?>			
					<?php if(isset($clubhouse['yoga'])) {  ?>
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
					   <?php } ?>		
					
				<?php if(isset($clubhouse['homethatre_court'])) {  ?>	
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
				  <?php } ?>	
				  
				    <?php if(isset($clubhouse['guest'])) {  ?>		
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
					  <?php } ?>	
					
				<?php if(isset($clubhouse['indoorgam_court'])) {  ?>		
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
					 <?php } ?>	
					
			 <?php if(isset($clubhouse['waiting'])) {  ?>			
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
					 <?php } ?>	
					
					
				 <?php if(isset($clubhouse['changingrm_court'])) {  ?>		
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
					  <?php } ?>	
					
					<?php if(isset($clubhouse['banquet'])) {  ?>
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
				<?php } ?>	
					
				   <?php if(isset($clubhouse['pantry_court'])) {  ?>	
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
					  <?php } ?>	
					
				 <?php if(isset($clubhouse['service'])) {  ?>		
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
				 <?php } ?>	
                 
               <div class="col-sm-12 swimming-poolsection">
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
					<?php } ?>	</div>
					
				  <?php if(isset($clubhouse['openrestu_court'])) {  ?>	
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
					<?php } ?>		
					
					 <?php if(isset($clubhouse['sitting'])) {  ?>
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
				<?php } ?>		
					
					 <?php if(isset($clubhouse['supermark_court'])) {  ?>
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
					 <?php } ?>	
					
					
			   <?php if(isset($clubhouse['creche'])) {  ?>		<div class="col-sm-2 form-group"><b>Creche</b></div>
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
					 <?php } ?>	
				
					  <?php if(isset($clubhouse['tenniescourt_court'])) {  ?>
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
					   <?php } ?>	
				
				<?php if(isset($clubhouse['basket'])) {  ?>	
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
					<?php } ?>	
					
				 <?php if(isset($clubhouse['cricketnet'])) {  ?>	<div class="col-sm-2 form-group"><b>Cricket Net</b></div>
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
					 <?php } ?>	
				
				  <?php if(isset($clubhouse['volley'])) {  ?>	
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
				 <?php } ?>	
					 <?php if(isset($clubhouse['staking'])) {  ?>	
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
					  <?php } ?>	
					
					   <?php if(isset($clubhouse['guide'])) {  ?>	
					<div class="col-sm-12"><b>Guide</b><br />
					 <?php if(isset($clubhouse['guide'])) { if($clubhouse['guide']) { ?> Image: <a href="/<?php if(isset($clubhouse['guide'])) echo $clubhouse['guide'];  ?>" target="_blank">View</a><?php } } ?>
					   <?php } ?>	
					
					</div>
		  
        </div>
    </div>
   </div> 
    
        
    
 
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
		<script src="../js1/videopopup.js"></script>
         @include('partials.footer')
@stop 
      
 