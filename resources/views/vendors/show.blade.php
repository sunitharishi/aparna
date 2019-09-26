@extends('layouts.app')

@section('content')
<style>
 label
 {
 font-weight:bold;
 color:#520990;
}
</style>
   <!-- <h3 class="page-title">Vendors</h3>-->
    
    <div class="panel panel-default respositroy-view">
        <div class="panel-heading">
            Vendors
            <p class="ptag">
               <a href="{{ route('vendors.index') }}" class="btn green-back">Back</a>
            </p>
        </div>
        
        <div class="panel-body vendorview-section">
            <div class="row">
                   <div class="col-sm-12">
                        <label class="venfor-site-view"><b>Sites:</b></label><?php $sites = $client->site;
						     $sitearr = explode(",", $sites);
							 $sites = array();
							 foreach($sitearr as $si){
							 	$sites[] = get_sitename($si);
							}
							sort($sites);
							foreach($sites as $si){?>
							 	 <div class="vendor-site-name"><?php echo $si; ?></div>
							<?php }
						 ?>
                        
					</div>	 
                <div class="col-sm-12 vendor-companycategory">
                
                
                
                  <div class="row corbackground">
                      <div class="col-sm-3 vendor-companycode">
                          <label>Code</label><br />
                          {{ $client->vcode }}
                      </div>
                      <div class="col-sm-3 vendor-companyname">
                          <label>Company Name</label><br />
                          {{ $client->name }}
                      </div>
                      <div class="col-sm-2 vendor-companycategory">
                          <label>Category</label><br />
                          <?php if(isset($category->name)) echo $category->name; ?>
                      </div>
                    </div>
                    
                    <div class="row corbackground1">
                      <div class="col-sm-12">
                          <label>Description</label><br />
                          {{ $client->description }}
                      </div>
                    </div>
                    
                    <div class="row corbackground">
                      <div class="col-sm-12">
                          <label>Address</label><br />
                          {{ $client->address }}
                      </div>
                   </div>
                   
                   <div class="row corbackground1 phone-typeofservice">
                       <div class="col-sm-2">
                           <label>Phone</label><br />
                           {{ $client->phone }}
                      </div>
                       <div class="col-sm-2">
                          <label>Type of Service </label><br />
                          {{ $client->wartype }}
                      </div>
                       <div class="col-sm-2">
                           <label class="col-sm-12 emptyu">&nbsp;</label><br />
                           {{ $client->warothertxt }}
                      </div>
                      <div class="col-sm-2">
                          <label>Start Date</label><br />
                          {{ $client->startdate }}
                      </div>
                      <div class="col-sm-2">
                          <label>End Date</label><br />
                          {{ $client->enddate }}
                      </div>
                   </div>
                   
                   <div class="row corbackground order-number">
                      <div class="col-sm-2">
                          <label>Order</label><br />
                          {{ $client->potype }}
                      </div>
                       <div class="col-sm-2">
                          <label>Number</label><br />
                          {{ $client->pothetext }}
                      </div>
                      <div class="col-sm-2">
                          <label>Scan Copy</label><br />
                          <?php if(isset($client->poimage)) { ?> <a href="/{{ $client->poimage }}" target="_blank">View </a> <?php } ?>
                      </div>
                  </div>
                
                   <?php /*?> <table class="table table-bordered table-striped to-shoe-show">
                        <tr>
                          
                          <th>Code</th>
                          <td>{{ $client->vcode }}</td>
                          <th>Company Name</th>
                          <td>{{ $client->name }}</td>
                        </tr>
						
						<tr>
                           <th>Category</th>
                           <td colspan="3"> <?php if(isset($category->name)) echo $category->name; ?> </td>
                        </tr>
						<tr>
                           <th>Description</th>
                           <td colspan="3">{{ $client->description }}</td>
                        </tr>
                        <tr>
                          <th>Address</th>
                          <td>{{ $client->address }}</td>
                          <th>Phone</th>
                          <td>{{ $client->phone }}</td>
                       </tr>
                       <tr>
                          <th></th>
                          <td>{{ $client->wartype }}</td>
                          <th></th>
                         <td>{{ $client->warothertxt }}</td>
                       </tr>
						<tr>
                           <th>Start Date</th>
                           <td>{{ $client->startdate }}</td>
                           <th>End Date</th>
                           <td>{{ $client->enddate }}</td>
                       </tr>
						<tr>
                         <th>Order</th>
                         <td>{{ $client->potype }}</td>
                         <th>Number</th>
                         <td>{{ $client->pothetext }}</td>
                      </tr>
					  <tr>
                          <th>Scan Copy</th>
                          <td><?php if(isset($client->poimage)) { ?> <a href="/{{ $client->poimage }}" target="_blank">View<a> <?php } ?></td>
                      </tr>
					 
                    </table>
                    
                 <?php */?>
                 
            <div class="row corbackground1">    
                 	
						 <div class="col-sm-12 vendor-contact-info">Contact Info</div>
                         
                         
               <?php   if(count($contact) > 0){
						     foreach($contact as $con) {  ?>
                 
                 <div class="col-sm-12 contact-infoemationdetails">
                     <div class="col-sm-3">
                         <label>Name</label><br />
                         <?php echo $con['conname']; ?>
                     </div>
                      
                      <div class="col-sm-2">
                         <label>Designation</label><br />
						 <?php echo $con['condesignation']; ?>
                     </div>
                      <div class="col-sm-2">
                         <label>Contact Number</label><br />
						 <?php echo $con['contactnumber']; ?>
                     </div>
                      <div class="col-sm-3">
                           <label>Mail</label><br />
						   <?php echo $con['mail']; ?>
                     </div>
                      <div class="col-sm-2">
                         <label>Location</label><br />
						 <?php echo $con['location']; ?>
                     </div>
                 </div>
                 <?php } }?> 
                  </div>
				
						<?php /*?> <?php
						  if(count($contact) > 0){
						     foreach($contact as $con) {
									echo "<label class='label-vname'>Name<span>:</span> </label> <k class='cvnemae'>".$con['conname']."</k>";
									 echo "<label class='label-vdesignation'>Designation<span>:</span> </label><k class='vendor-sdddignation'>".$con['condesignation']."</k>";
									echo "<label class='label-contactnumber'>Contact Number<span>:</span> </label><k class='vendor-vontact'>".$con['contactnumber']."</k>";
									echo "<label class='label-mail'>Mail<span>:</span> </label><k class='venodr-mail'>".$con['mail']."</k>";
									echo "<label class='label-location'>Location<span>:</span> </label><k class='venodr-location'>".$con['location']."</k><br>";
							 }
						  }
						 ?><?php */?>
                </div>
            </div>

           

           
        </div>
    </div>
    @include('partials.footer')
@stop