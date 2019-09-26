@extends('layouts.appgraph')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script>window.jQuery || document.write(decodeURIComponent('%3Cscript src="js/jquery-3.1.0.min.js"%3E%3C/script%3E'))</script>
    <script src="https://cdn3.devexpress.com/jslib/17.2.5/js/dx.all.js"></script>
    <script>
	 var dataSource = [{
    state: "Clubhouse",
    year1998: 2,
    year2001: 28,
    year2004: 30
}, {
    state: "Fire & Safety",
    year1998: 0,
    year2001: 37,
    year2004: 37
}, {
    state: "FMS",
    year1998: 7,
    year2001: 115,
    year2004: 122
}, {
    state: "Housekeeping",
    year1998: 263,
    year2001: 91,
    year2004: 354
},  {
    state: "Landscaping",
    year1998: 71,
    year2001: 85,
    year2004: 156
}, {
    state: "PMS", 
    year1998: 6,
    year2001: 42,
    year2004: 48
}, {
    state: "Security", 
    year1998: 77,
    year2001: 375,
    year2004: 452
}, {
    state: "Shared Services",
    year1998: 0,
    year2001: 18,
    year2004: 18  
}];
	</script>
    <style>
		#chartdiv1
		{
			width:100%;
			height:300px;
			font-size:11px;
		}
		#chartdiv2
		{
			width:100%;
			height:300px;
			font-size:11px;
		}
		#chartdiv3
		{
			width:100%;
			height:300px;
			font-size:11px;
		}
		a[title="JavaScript charts"]
		{
			display:none !important;
		}
	</style>
    <div class="row">
    	 @include('partials.left')
        <div class="col-sm-9">
            <div class="panel page-dashboard">  
               	<div class="text-marquee"><legend><span>Latest News</span><marquee>We've been leading the future of the Real Estate with our astonishing innovations and advances. We were the first movers to explore and implement many new avenues in the city.</marquee></legend></div>
                <div class="dashboard-tab-section">
                	<ul class='tabs'>
                        <li><a href='#tab1'>Dashboard</a></li>
                        <li><a href='#tab2'>Fire Safety</a></li>
                        <li><a href='#tab3'>FMS</a></li>
                        <li><a href='#tab4'>PMS</a></li>
                        <li><a href='#tab5'>Security</a></li>
                    </ul>
                    <div class="tabcontent">
                        <div id='tab1'>
                        	<fieldset> 
	                            <div class="panel-body">
                                    <div class="row">                    	
                                        <div class="col-sm-12 top-colorboxes">
                                           <div class="col-sm-2">
                                                <div class="colorboxes" style="background-color:#da7226; border-color:#da7226;">
                                                    <h3>Vendors</h3>
	                                                <div class="circle-img"><i class="fa fa-life-ring" aria-hidden="true"></i><span>120</span></div>
                                                    <a href="{{ route('vendors.index') }}" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="colorboxes" style="background-color:#593d28; border-color:#593d28;">
                                                    <h3>Tasks</h3>
	                                                <div class="circle-img"><i class="fa fa-tasks" aria-hidden="true"></i><span>150</span></div>
                                                    <a href="{{ route('tasks.index') }}" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="colorboxes" style="background-color:#314d55; border-color:#314d55;">
                                                    <h3>Break Down Reports</h3>
	                                                <div class="circle-img"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i><span>{{ $breakdownCount }}</span></div>
                                                    <a href="/topics/breakdown" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="colorboxes" style="background-color:#1c87bf; border-color:#1c87bf;">
                                                    <h3>Incident Cards</h3>
	                                                <div class="circle-img"><i class="fa fa-indent" aria-hidden="true"></i><span>{{ $incidentCount }}</span></div>
                                                    <a href="/topics/incident" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="colorboxes" style="background-color:#8e4383; border-color:#8e4383;">
                                                    <h3>Job Cards</h3>
	                                                <div class="circle-img"><i class="fa fa-thumb-tack" aria-hidden="true"></i><span>{{ $jobcardCount }}</span></div>
                                                    <a href="/topics/jobcard" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="colorboxes" style="background-color:#16a6b7; border-color:#16a6b7;">
                                                    <h3>Indent</h3>
	                                                <div class="circle-img"><i class="fa fa-building" aria-hidden="true"></i><span>16</span></div>
                                                    <a href="{{ route('sites.index') }}" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                                                </div>	
                                            </div>
                                            
											
                                        </div> <br clear="all" /><br />
                                        <div class="col-sm-12 demo-container">
                                            <div id="chart"></div>
                                        </div>
                                       <br />
                                        <div class="col-sm-12">
                                        
                                           <div class="inner-title">
                                                <h4><b>Tasks</b></h4>
                                            </div>
                                            <table class="table table-hover taasstable">
                                                <thead class="thead-dark">
                                                    <tr>
                                                         <th>Code</th>
                                                          <th>Category</th>
                                                        <th>Title</th>
                                                        
                                                       
                                                        <th>Priority</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                 @if (count($assets) > 0)
                        							@foreach ($assets as $client)
                                                    <tr>
                                                      <td>{{ $client->tcode }}</td>
                                                       <td>{{ (isset($client->catgname)?$client->catgname:'') }}</td>
                                                      <td><a href="{{ route('tasks.show',[$client->id]) }}">{{ $client->title }}</a></td>
                                                      
                                                        
                                                        <td>{{ $client->priority }}</td>
                                                         <td>{{ $client->status }}</td>
                                                    </tr>
                                                       @endforeach
                                                   @endif
                                                   
                                                </tbody>
                                            </table>
                                            
                                            <div class="inner-title">
                                                <h4><b>Forums</b></h4>
                                            </div>
                                            <table class="table table-hover foeeetable">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Title</th>
                                                        <th>Category</th>
                                                      
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                 @if (count($forums) > 0)
                        							@foreach ($forums as $client)
                                                    <tr>
                                                      <td><a href="{{ route('forums.show',[$client->id]) }}">{{ $client->title }}</a></td>
                                                       <td>{{ (isset($client->catgname)?$client->catgname:'') }}</td>
                                                      
                                                    </tr>
                                                       @endforeach
                                                   @endif
                                                   
                                                </tbody>
                                            </table>
                                            @if (count($jobcards) > 0)
                                            <div class="inner-title">
                                                <h4><b>Job Cards</b></h4>
                                            </div>
                                            <table class="table table-hover">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Community</th>
                                                        <th>ID</th>
                                                        <th>Date</th>
                                                        <th>Jobcard Type</th>
                                                        <th>Vendor</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($jobcards as $row)
                                                   <tr>
                                                        <td>{{ $row->sitename }}</td>
                                                        <td><a href="{{ route('jobcard.view',[$row->id]) }}">{{ $row->refid }}</a></td>
                                                      <td>{{ date("d.m.Y",strtotime($row->jdate)) }}</td>
                                                      <td>{{ $jbtypes[$row->jctype] }}</td>
                                                      
                                                      <td>{{ $row->vendorname }}</td>
                                                      <td>{{ $row->status }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            @endif
                                            @if($incidents)
                                            <div class="inner-title">
                                                <h4><b>Incident Cards</b></h4>
                                            </div>
                                            <table class="table table-hover">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Community</th>
                                                        <th>ID</th>
                                                        <th>Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($incidents as $ival)
                                                    <tr>
                                                        <td>{{ $ival->sitename }}</td>
                                                        <td><a href="{{ route('incident.view',[$ival->id]) }}">{{ $ival->refid }}</a></td>
                                                        <td>{{ date("d.m.Y",strtotime($ival->idate)) }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            @endif
                                            @if($breakdowns)
                                            <div class="inner-title">
                                                <h4><b>Break Down Report</b></h4>
                                            </div>
                                            <table class="table table-hover">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Community</th>
                                                        <th>Title</th>
                                                        <th>ID</th>
                                                        <th>Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($breakdowns as $bval)
                                                    <tr>
                                                        <td>{{ $bval->sitename }}</td>
                                                        <td><a href="{{ route('breakdown.view',[$bval->id]) }}">{{ $bval->title }}</a></td>
                                                        <td>{{ $bval->refid }}</td>
                                                        <td>{{ date("d.m.Y",strtotime($bval->bdate)) }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            @endif
                                            @if (count($historycards) > 0)
                                            <div class="inner-title">
                                                <h4><b>History Cards</b></h4>
                                            </div>
                                            <table class="table table-hover">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Time</th>
                                                        <th>Type</th>
                                                        <th>Reference No</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($historycards as $row)
                                                   <tr>
                                                            <td>{{ date("d.m.Y",strtotime($row->updated_at)) }}</td>
                                                          <td>{{ date("h:i A",strtotime($row->updated_at)) }}</td>
                                                          <td>{{ $hctypes[$row->htype] }}</td>
                                                          <td>
                                                            
                                                            @if($row->htype=='1')
                                                            <a href="{{ route('breakdown.view',[$row->refid]) }}">{{ $row->ref_idno }}</a>
                                                            @elseif($row->htype=='2')
                                                            <a href="{{ route('incident.view',[$row->refid]) }}">{{ $row->ref_idno }}</a>
                                                            @else
                                                            <a href="{{ route('jobcard.view',[$row->refid]) }}">{{ $row->ref_idno }}</a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            @endif
                                            <div class="inner-title">
                                                <h4><b>Upcoming AMC</b></h4>
                                            </div>
                                            <table class="table table-hover">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Site</th>
                                                        <th>Category</th>
                                                        <th>Asset</th>
                                                        <th>Location</th>
                                                        <th>Vendor</th>
                                                        <th>Date</th>
                                                        <th>Time</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Aparna</td>
                                                        <td>Buildings</td>
                                                        <td>Complaint</td>
                                                        <td>painting for balcony grills....</td>
                                                        <td>200sqf</td>
                                                        <td>of Complaints Re-opened till date in past 30 days:</td>
                                                        <td>01.01.2018</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aparna</td>
                                                        <td>Buildings</td>
                                                        <td>Complaint</td>
                                                        <td>painting for balcony grills....</td>
                                                        <td>200sqf</td>
                                                        <td>of Complaints Re-opened till date in past 30 days:</td>
                                                        <td>01.01.2018</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aparna</td>
                                                        <td>Buildings</td>
                                                        <td>Complaint</td>
                                                        <td>painting for balcony grills....</td>
                                                        <td>200sqf</td>
                                                        <td>of Complaints Re-opened till date in past 30 days:</td>
                                                        <td>01.01.2018</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aparna</td>
                                                        <td>Buildings</td>
                                                        <td>Complaint</td>
                                                        <td>painting for balcony grills....</td>
                                                        <td>200sqf</td>
                                                        <td>of Complaints Re-opened till date in past 30 days:</td>
                                                        <td>01.01.2018</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>	
                                </div>
                            </fieldset>
                        </div>
                        <div id='tab2'>
                        	<div class="dashboard-tab-section">
                                <ul class='tabs tabs-routine' style="position:relative; float:left; right:0px; margin-bottom:20px;">
                                    <li><a href='#tab6' style="background:#339783; border-top-left-radius:5px; border-bottom-left-radius:5px;">Jockey Pump</a></li>
                                    <li><a href='#tab7' style="background:#1b658b;">Main Pump</a></li>
                                    <li><a href='#tab8' style="background:#725185;">DG Pump</a></li>
									<li><a href='#tab9' style="background:#a07834; border-top-right-radius:5px; border-bottom-right-radius:5px;">Fire Extinguishers</a></li>
                                   <!-- <li><a href='#tab9'>PMS</a></li>
                                    <li><a href='#tab10'>Security</a></li>-->
                                </ul>
                                <div class="neighbour-tab">
                                	<span><?php 
									$date = date('Y-m-d');
									echo date('d-m-Y', strtotime($date .' -1 day')); ?></span>
									
                                </div>    
                                <div class="tabcontent">
								 <?php 
												    $jktot = 0;
													 $jkoff = 0;
													$jknw = 0;
													$jkauto = 0;
												 foreach($sitenames as $kk =>  $siten) {
												    $jktot = $jktot + (int)$jockeypmp['tot'][$kk];
													  $jkoff = $jkoff + (int)$jockeypmp['off'][$kk];
													$jknw = $jknw + (int)$jockeypmp['nw'][$kk];
													$jkauto = $jkauto + (int)$jockeypmp['auto'][$kk];
												   
												    }
												   ?>
												    
                                    <div id='tab6'>
                                         <div class="row firesafety-colorboxes">
                                        	<div class="col-sm-3">
                                            	<div class="green-boxes">
                                                     <div class="greencolor">
                                                        <i class="fa fa-align-justify" aria-hidden="true"></i>
                                                     </div>
                                                     <div class="totaltext">
                                                         <p>Total</p>
                                                         <span>{{ $jktot }}</span>
                                                     </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                 <div class="blue-boxes">
                                                      <div class="bluecolor">
                                                         <i class="fa fa-power-off" aria-hidden="true"></i>
                                                     </div>
                                                     <div class="totaltext">
                                                        <p>Off</p>
                                                       <span>{{ $jkoff }}</span>
                                                    </div>
                                                 </div>
                                            </div>
                                            <div class="col-sm-3">
                                                 <div class="red-boxes">
                                                       <div class="redcolor">
                                                  	      <i class="fa fa-times" aria-hidden="true"></i>
                                                      </div>
                                                      <div class="totaltext">
                                                         <p>NW</p>
                                                         <span>{{ $jknw }}</span>
                                                     </div>
                                                 </div>
                                            </div>
                                            <div class="col-sm-3">
                                                 <div class="yellow-boxes">
                                                      <div class="yellowcolor">
                                                          <i class="fa fa-check" aria-hidden="true"></i>
                                                     </div>
                                                     <div class="totaltext">
                                                           <p>Auto</p>
                                                         <span>{{ $jkauto }}</span>
                                                     </div>
                                                 </div>
                                            </div>
                                        </div>
                                            
                                            
                                            
                                        
                                    	<div class="col-sm-6">
										     
												TOT <span>{{ $jktot }}</span>
												 OFF<span>{{ $jkoff }}</span>
												 NW<span>{{ $jknw }}</span>
												 AUTO<span>{{ $jkauto }}</span>
												 
										<h2 class="bluered">Total : <span>{{ $jktot }}</span></h2>
										    <div>
											 <?php if($jknw == 0 && $jkoff == 0 && $jkauto == 0) { ?>
											         <img src="images/piechart.png" width="357;" height="357px;">
											 <?php }  else {?>
	                                       <div id="chartdiv1">
                                              
                                           </div>  
										   <?php } ?>
                                           <!--<table cellpadding="0" cellspacing="0">
                                           	<tr>  
                                            	<th>Off : </th><td>{{ $jkoff }}</td>
                                            </tr>
                                            <tr>
                                            	<th>Not Working : </th><td>{{ $jknw }}</td>
                                            </tr>
                                            <tr>
                                            	<th>Auto : </th><td>{{ $jkauto }}</td>
                                            </tr>
                                           </table>-->
                                       </div>
									   </div>
                                       <div class="col-sm-6">
									    <?php /*?><h2 class="bluered">Jockey Pump Data as on <span><?php echo date("d-m-Y"); ?></span></h2><?php */?>
                                       	   <table cellpadding="0" cellspacing="0" class="table table-bordered table-striped add-edit-rreg no-footer">
                                           		<thead style="">
                                                	<tr style="background:#293b4c; color:#FFFFFF;">
                                                    	<th>Community</th><th>Total</th><th>Off</th><th>NW</th><th>Auto</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
												<?php 
												    $jktot = 0;
												    $jkoff = 0;
													$jknw = 0;
													$jkauto = 0;
												?>
												 @foreach($sitenames as $kk =>  $siten)
												   <?php 
												    $jktot = $jktot + (int)$jockeypmp['tot'][$kk];
												    $jkoff = $jkoff + (int)$jockeypmp['off'][$kk];
													$jknw = $jknw + (int)$jockeypmp['nw'][$kk];
													$jkauto = $jkauto + (int)$jockeypmp['auto'][$kk];
												   
												   ?>
                                                	<tr>
                                                    	<td>{{ $siten }}</td>
														<td>{{ $jockeypmp['tot'][$kk] }}</td>
														<td>{{ $jockeypmp['off'][$kk] }}</td>
														<td>{{ $jockeypmp['nw'][$kk] }}</td>
														<td>{{ $jockeypmp['auto'][$kk] }}</td>
                                                    </tr>
                                                	  
													@endforeach
													
													<tr style="background:#6685a2; color:#FFFFFF;">
                                                    	<th>Total</th>
														<th>{{  $jktot }}</th>
														<th>{{ $jkoff }}</th>
														<th>{{ $jknw }}</th>
														<th>{{ $jkauto }}</th>
                                                    </tr>
                                                </tbody>
                                           </table>	
                                       </div>
                                    </div>
                                    <div id='tab7'>
									   <?php 
												    $maintot = 0;
													$mainoff = 0;
													$mainnw = 0;
													$mainauto = 0;
												   foreach($sitenames as $kk =>  $siten) {
												    $maintot = $maintot + (int)$mainpump['tot'][$kk];
													$mainoff = $mainoff + (int)$mainpump['off'][$kk];
													$mainnw = $mainnw + (int)$mainpump['nw'][$kk];
													$mainauto = $mainauto + (int)$mainpump['auto'][$kk];
												    }
												   ?>
                                        <div class="row firesafety-colorboxes">
                                        	<div class="col-sm-3">
                                            	<div class="green-boxes">
                                                     <div class="greencolor">
                                                        <i class="fa fa-align-justify" aria-hidden="true"></i>
                                                     </div>
                                                     <div class="totaltext">
                                                         <p>Total</p>
                                                         <span>{{ $maintot }}</span>
                                                     </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                 <div class="blue-boxes">
                                                      <div class="bluecolor">
                                                         <i class="fa fa-power-off" aria-hidden="true"></i>
                                                     </div>
                                                     <div class="totaltext">
                                                        <p>Off</p>
                                                       <span>{{ $mainoff }}</span>
                                                    </div>
                                                 </div>
                                            </div>
                                            <div class="col-sm-3">
                                                 <div class="red-boxes">
                                                       <div class="redcolor">
                                                  	      <i class="fa fa-times" aria-hidden="true"></i>
                                                      </div>
                                                      <div class="totaltext">
                                                         <p>NW</p>
                                                         <span>{{ $mainauto }}</span>
                                                     </div>
                                                 </div>
                                            </div>
                                            <div class="col-sm-3">
                                                 <div class="yellow-boxes">
                                                      <div class="yellowcolor">
                                                          <i class="fa fa-check" aria-hidden="true"></i>
                                                     </div>
                                                     <div class="totaltext">
                                                           <p>Auto</p>
                                                         <span>{{ $maintot }}</span>
                                                     </div>
                                                 </div>
                                            </div>
                                        </div>
                                       <div class="col-sm-6">
									 
										<h2 class="bluered">Total : <span>{{ $maintot }}</span></h2>
										  <div>
										   <?php if($mainnw == 0 && $mainoff == 0 && $mainauto == 0) { ?>
											         <img src="images/piechart.png" width="357px;" height="357px;">
											 <?php }  else {?>
	                                       <div id="chartdiv2">
                                              
                                           </div>  
										   <?php } ?>
	                                   
										   
                                          <!-- <table cellpadding="0" cellspacing="0">
                                           	<tr>
                                            	<th>Off : </th><td>{{ $mainoff }}</td>
                                            </tr>
                                            <tr>
                                            	<th>Not Working : </th><td>{{ $mainnw }}</td>
                                            </tr>
                                            <tr>
                                            	<th>Auto : </th><td>{{ $mainauto }}</td>
                                            </tr> 
                                           </table>-->
										   </div>
                                       </div>
                                       <div class="col-sm-6">
									   <?php /*?><h2 class="bluered">Main Pump Data as on <span><?php echo date("d-m-Y"); ?></span></h2><?php */?>
                                       	   <table cellpadding="0" cellspacing="0" class="table table-bordered table-striped add-edit-rreg no-footer">
                                           		<thead style="">
                                                	<tr style="background:#293b4c; color:#FFFFFF;">
                                                    	<th>Community</th><th>Total</th><th>Off</th><th>NW</th><th>Auto</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
												<?php 
												    $maintot = 0;
												    $mainoff = 0;
													$mainnw = 0;
													$mainauto = 0;
												?>
												 @foreach($sitenames as $kk =>  $siten)
												   <?php 
												    $maintot = $maintot + (int)$mainpump['tot'][$kk];
												    $mainoff = $mainoff + (int)$mainpump['off'][$kk];
													$mainnw = $mainnw + (int)$mainpump['nw'][$kk];
													$mainauto = $mainauto + (int)$mainpump['auto'][$kk];
												   
												   ?>
                                                	<tr>
                                                    	<td>{{ $siten }}</td>
														<td>{{ $mainpump['tot'][$kk] }}</td>
														<td>{{ $mainpump['off'][$kk] }}</td>
														<td>{{ $mainpump['nw'][$kk] }}</td>
														<td>{{ $mainpump['auto'][$kk] }}</td>
                                                    </tr>
                                                	  
													@endforeach
													
													<tr style="background:#6685a2; color:#FFFFFF;">
                                                    	<th>Total</td>
														<th>{{  $maintot }}</th>
														<th>{{ $mainoff }}</th>
														<th>{{ $mainnw }}</th>
														<th>{{ $mainauto }}</th>
                                                    </tr>
                                                </tbody>
                                           </table>	
                                       </div>
                                    </div>
                                    <div id='tab8'>
									
									    <?php    $dgtot = 0;
										            $dgoff = 0;
													$dgnw = 0;
													$dgauto = 0;
												 foreach($sitenames as $kk =>  $siten) {
												    $dgtot = $dgtot + (int)$dgpump['tot'][$kk];
													$dgoff = $dgoff + (int)$dgpump['off'][$kk];
													$dgnw = $dgnw + (int)$dgpump['nw'][$kk];
													$dgauto = $dgauto + (int)$dgpump['auto'][$kk];
												    }
												   ?>
                                       <div class="row firesafety-colorboxes">
                                        	<div class="col-sm-3">
                                            	<div class="green-boxes">
                                                     <div class="greencolor">
                                                        <i class="fa fa-align-justify" aria-hidden="true"></i>
                                                     </div>
                                                     <div class="totaltext">
                                                         <p>Total</p>
                                                         <span>{{ $dgtot }}</span>
                                                     </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                 <div class="blue-boxes">
                                                      <div class="bluecolor">
                                                         <i class="fa fa-power-off" aria-hidden="true"></i>
                                                     </div>
                                                     <div class="totaltext">
                                                        <p>Off</p>
                                                       <span>{{ $dgoff }}</span>
                                                    </div>
                                                 </div>
                                            </div>
                                            <div class="col-sm-3">
                                                 <div class="red-boxes">
                                                       <div class="redcolor">
                                                  	      <i class="fa fa-times" aria-hidden="true"></i>
                                                      </div>
                                                      <div class="totaltext">
                                                         <p>NW</p>
                                                         <span>{{ $dgnw }}</span>
                                                     </div>
                                                 </div>
                                            </div>
                                            <div class="col-sm-3">
                                                 <div class="yellow-boxes">
                                                      <div class="yellowcolor">
                                                          <i class="fa fa-check" aria-hidden="true"></i>
                                                     </div>
                                                     <div class="totaltext">
                                                           <p>Auto</p>
                                                         <span>{{ $dgauto }}</span>
                                                     </div>
                                                 </div>
                                            </div>
                                        </div>
                                       <div class="col-sm-6">
									
										<h2 class="bluered">Total : <span>{{ $dgtot }}</span></h2>
										<div>
										  <?php if($mainnw == 0 && $mainoff == 0 && $mainauto == 0) { ?>
											         <img src="images/piechart.png" width="357px;" height="357px;">
											 <?php }  else {?>
	                                       <div id="chartdiv3">
                                              
                                           </div>  
										   <?php } ?>
	                                     
                                           <!--<table cellpadding="0" cellspacing="0">
                                           	<tr>
                                            	<th>Off : </th><td>{{ $dgoff }}</td>
                                            </tr>
                                            <tr>
                                            	<th>Not Working : </th><td>{{ $dgnw }}</td>
                                            </tr>
                                            <tr>
                                            	<th>Auto : </th><td>{{ $dgauto }}</td>
                                            </tr>
                                           </table>-->
										   </div>
                                       </div>
                                       <div class="col-sm-6">
									    <?php /*?> <h2 class="bluered">DG Pump Data as on <span><?php echo date("d-m-Y"); ?></span></h2><?php */?>
                                       	   <table cellpadding="0" cellspacing="0" class="table table-bordered table-striped add-edit-rreg no-footer">
                                           		<thead style="">
                                                	<tr style="background:#293b4c; color:#FFFFFF;">
                                                    	<th>Community</th><th>Total</th><th>Off</th><th>NW</th><th>Auto</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
												<?php 
												    $dgtot = 0;
												    $dgoff = 0;
													$dgnw = 0;
													$dgauto = 0;
												?>
												 @foreach($sitenames as $kk =>  $siten)
												   <?php 
												    $dgtot = $dgtot + (int)$dgpump['tot'][$kk];
												    $dgoff = $dgoff + (int)$dgpump['off'][$kk];
													$dgnw = $dgnw + (int)$dgpump['nw'][$kk];
													$dgauto = $dgauto + (int)$dgpump['auto'][$kk];
												    
												   ?>
                                                	<tr>
                                                    	<td>{{ $siten }}</td>
														<td>{{ $dgpump['tot'][$kk] }}</td>
														<td>{{ $dgpump['off'][$kk] }}</td>
														<td>{{ $dgpump['nw'][$kk] }}</td>
														<td>{{ $dgpump['auto'][$kk] }}</td>
                                                    </tr>
                                                	  
													@endforeach
													
													<tr style="background:#6685a2; color:#FFFFFF;">
                                                    	<th>Total</th>
														<th>{{  $dgtot }}</th>
														<th>{{ $dgoff }}</th>
														<th>{{ $dgnw }}</th>
														<th>{{ $dgauto }}</th>
                                                    </tr>
                                                </tbody>
                                           </table>	
                                       </div>
                                    </div>
                                    <div id='tab9'>
                                       <div class="row firesafety-colorboxes">
                                        	<div class="col-sm-3">
                                            	<div class="green-boxes">
                                                     <div class="greencolor">
                                                        <i class="fa fa-align-justify" aria-hidden="true"></i>
                                                     </div>
                                                     <div class="totaltext">
                                                         <p>Total</p>
                                                         <span>54</span>
                                                     </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                 <div class="blue-boxes">
                                                      <div class="bluecolor">
                                                         <img src="images/co2.png"  />
                                                     </div>
                                                     <div class="totaltext">
                                                        <p>CO<sub>2</sub></p>
                                                       <span>54</span>
                                                    </div>
                                                 </div>
                                            </div>
                                            <div class="col-sm-3">
                                                 <div class="red-boxes">
                                                       <div class="redcolor">
                                                  	      <img src="images/flask.png"  />
                                                      </div>
                                                      <div class="totaltext">
                                                         <p>DCP</p>
                                                         <span>54</span>
                                                     </div>
                                                 </div>
                                            </div>
                                            <div class="col-sm-3">
                                                 <div class="yellow-boxes">
                                                      <div class="yellowcolor water">
                                                          <i class="fa fa-tint" aria-hidden="true"></i>
                                                     </div>
                                                     <div class="totaltext">
                                                           <p>Water</p>
                                                         <span>54</span>
                                                     </div>
                                                 </div>
                                            </div>
                                        </div>
                                       <div>
							  <?php /*?> <h2 class="bluered">Fire Extinguishers Data as on <span><?php  echo date("d-m-Y"); ?></span></h2><?php */?>
							     <table cellpadding="0" cellspacing="0" class="table table-bordered table-striped add-edit-rreg no-footer">
                                           		<thead style="">
                                                	<tr style="background:#293b4c; color:#FFFFFF;">
                                                    	<th>Community</th><th>Total</th><th>C02 </th><th>DCP</th><th>Water</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
												<?php 
												    $firetot = 0;
												    $co2 = 0;
													$dcp = 0;
													$water = 0;
												?>
												 @foreach($sitenames as $kk =>  $siten)
												   <?php 
												    $firetot = $firetot + (int)$exahuster['tot'][$kk];
												    $co2 = $co2 + (int)$exahuster['co2'][$kk];
													$dcp = $dcp + (int)$exahuster['dcp'][$kk];
													$water = $water + (int)$exahuster['water'][$kk];
												      
												   ?>   
                                                	<tr>
                                                    	<td>{{ $siten }}</td>
														<td>{{ $exahuster['tot'][$kk] }}</td>
														<td>{{ $exahuster['co2'][$kk] }}</td>
														<td>{{ $exahuster['dcp'][$kk] }}</td>
														<td>{{ $exahuster['water'][$kk] }}</td>
                                                    </tr>
                                                	  
													@endforeach 
													
													<tr style="background:#6685a2; color:#FFFFFF;">
                                                    	<th>Total</th>
														<th>{{  $firetot }}</th>
														<th>{{ $co2 }}</th>
														<th>{{ $dcp }}</th>
														<th>{{ $water }}</th>
                                                    </tr>
                                                </tbody>
                                           </table>	
							</div>
                                    </div>
                                  <!--  <div id='tab10'>
                                        tab10
                                    </div>-->
                                </div>
                            </div>
                           <!-- <hr style="clear:both" />-->
							
                        </div>
                        <div id='tab3'>
						
						 <h2 class="bluered">Power Consumption Data as on <span><?php 
									$date = date('Y-m-d');
									echo date('d-m-Y', strtotime($date .' -1 day')); ?></span></h2>
							     <table cellpadding="0" cellspacing="0" class="table table-bordered table-striped add-edit-rreg no-footer community-ctpt">
                                           		<thead style="">
                                                	<tr style="background:#293b4c; color:#FFFFFF;">
                                                    	<th>Community</th><th>CTPT</th><th>Total LT </th><th>Residents</th><th>Club House
</th>
<th>STP</th><th>WSP</th><th>Lifts</th><th>Solar Power Units</th><th>Power Failure</th><th>Diesel Consumed</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
												 @foreach($sitenames as $kk =>  $siten)
                                                	<tr>
                                                    	<td>{{ $siten }}</td>
														<td>{{ $pwrcon['pwr_ctpt'][$kk] }}</td>
														<td>{{ $pwrcon['pwr_tot_lt'][$kk] }}</td>
														<td>{{ $pwrcon['pwr_residents'][$kk] }}</td>
														<td>{{ $pwrcon['pwr_club_house'][$kk] }}</td>
														<td>{{ $pwrcon['pwr_stp'][$kk] }}</td>
														<td>{{ $pwrcon['pwr_wsp'][$kk] }}</td>
														<td>{{ $pwrcon['pwr_lifts'][$kk] }}</td>
														<td>{{ $pwrcon['pwr_solarpwrunits'][$kk] }}</td>
														<td>{{ $pwrcon['pwr_pwrfactor'][$kk] }}</td>
														<td>{{ $pwrcon['dset_dieselconsume'][$kk] }}</td>
                                                    </tr>
                                                	      
													@endforeach 
													
                                                </tbody>
                                           </table>	
										   
										   
										    <h2 class="bluered">WSP DWS Consumption Data as on <span><?php 
									$date = date('Y-m-d');
									echo date('d-m-Y', strtotime($date .' -1 day')); ?></span></h2>
							     <table cellpadding="0" cellspacing="0" class="table table-bordered table-striped add-edit-rreg no-footer">
                                           		<thead style="">
                                                	<tr style="background:#293b4c; color:#FFFFFF;">
                                                    	<th>Community</th><th>Metro</th><th>Tankers </th><th>Bores</th><th>Total Water
</th>
<th>PPM-TW (Sump)</th><th>PPM-TW (Flat)</th>
                                                    </tr>
                                                </thead>   
                                                <tbody>
												 @foreach($sitenames as $kk =>  $siten)
                                                	<tr>
                                                    	<td>{{ $siten }}</td>
														<td>{{ $wspcon['wsp_metro'][$kk] }}</td>
														<td>{{ $wspcon['wsp_tankers'][$kk] }}</td>
														<td>{{ $wspcon['wsp_bores'][$kk] }}</td>
														<td>{{ $wspcon['wsp_tot_water'][$kk] }}</td>
														<td>{{ $wspcon['wsp_ppm_tw_sump'][$kk] }}</td>
														<td>{{ $wspcon['wsp_ppm_tw_flat'][$kk] }}</td>
                                                    </tr>
                                                	  
													@endforeach 
													
                                                </tbody>
                                           </table>	
										     <span><?php 
									$date = date('Y-m-d');
									 ?></span>
										     <h2 class="bluered">STP FWS Consumption Data as on <span><?php echo date('d-m-Y', strtotime($date .' -1 day'));?></span></h2>
							     <table cellpadding="0" cellspacing="0" class="table table-bordered table-striped add-edit-rreg no-footer">
                                           		<thead style="">
                                                	<tr style="background:#293b4c; color:#FFFFFF;">
                                                    	<th>Community</th><th>Avg Inlet Water</th><th>Avg Treated Water </th><th>Avg Water Bypassed</th>
                                                    </tr>
                                                </thead>   
                                                <tbody>
												 @foreach($sitenames as $kk =>  $siten)
                                                	<tr>   
                                                    	<td>{{ $siten }}</td>
														<td>{{ $stpcon['stp_avg_inlet_water'][$kk] }}</td>
														<td>{{ $stpcon['stp_avg_treat_water'][$kk] }}</td>
														<td>{{ $stpcon['stp_avg_water_bypass'][$kk] }}</td>
                                                    </tr>
                                                	  
													@endforeach 
													
                                                </tbody>
                                           </table>	
                        	<!--<fieldset> 
	                            <div class="panel-body">
                                    <div class="row">                    	
                                        <div class="col-sm-12 top-colorboxes">
                                            <div class="col-sm-2">
                                                <div class="colorboxes" style="background-color:#16a6b7; border-color:#16a6b7;">
                                                    <h3>Communities</h3>
	                                                <div class="circle-img"><i class="fa fa-building" aria-hidden="true"></i><span>16</span></div>
                                                    <a href="#" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                                                </div>	
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="colorboxes" style="background-color:#da7226; border-color:#da7226;">
                                                    <h3>Vendors</h3>
	                                                <div class="circle-img"><i class="fa fa-life-ring" aria-hidden="true"></i><span>120</span></div>
                                                    <a href="#" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="colorboxes" style="background-color:#8e4383; border-color:#8e4383;">
                                                    <h3>Job Cards</h3>
	                                                <div class="circle-img"><i class="fa fa-thumb-tack" aria-hidden="true"></i><span>150</span></div>
                                                    <a href="#" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="colorboxes" style="background-color:#1c87bf; border-color:#1c87bf;">
                                                    <h3>Incident Cards</h3>
	                                                <div class="circle-img"><i class="fa fa-indent" aria-hidden="true"></i><span>45</span></div>
                                                    <a href="#" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="colorboxes" style="background-color:#314d55; border-color:#314d55;">
                                                    <h3>Break Down Reports</h3>
	                                                <div class="circle-img"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i><span>56</span></div>
                                                    <a href="#" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="colorboxes" style="background-color:#593d28; border-color:#593d28;">
                                                    <h3>Tasks</h3>
	                                                <div class="circle-img"><i class="fa fa-tasks" aria-hidden="true"></i><span>150</span></div>
                                                    <a href="#" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="inner-title">
                                                <h4><b>Job Cards</b></h4>
                                            </div>
                                            <table class="table table-hover">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Site</th>
                                                        <th>Asset</th>
                                                        <th>Nature of Work</th>
                                                        <th>Work Carried Out By</th>
                                                        <th>Required Spares</th>
                                                        <th>Incharge - Facilities</th>
                                                        <th>Reviewed By</th>
                                                        <th>Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Aparna</td>
                                                        <td>Buildings</td>
                                                        <td>Complaint</td>
                                                        <td>painting for balcony grills....</td>
                                                        <td>200sqf</td>
                                                        <td>of Complaints Re-opened till date in past 30 days:</td>
                                                        <td>Owner</td>
                                                        <td>01.01.2018</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aparna</td>
                                                        <td>Buildings</td>
                                                        <td>Complaint</td>
                                                        <td>painting for balcony grills....</td>
                                                        <td>200sqf</td>
                                                        <td>of Complaints Re-opened till date in past 30 days:</td>
                                                        <td>Owner</td>
                                                        <td>01.01.2018</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aparna</td>
                                                        <td>Buildings</td>
                                                        <td>Complaint</td>
                                                        <td>painting for balcony grills....</td>
                                                        <td>200sqf</td>
                                                        <td>of Complaints Re-opened till date in past 30 days:</td>
                                                        <td>Owner</td>
                                                        <td>01.01.2018</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aparna</td>
                                                        <td>Buildings</td>
                                                        <td>Complaint</td>
                                                        <td>painting for balcony grills....</td>
                                                        <td>200sqf</td>
                                                        <td>of Complaints Re-opened till date in past 30 days:</td>
                                                        <td>Owner</td>
                                                        <td>01.01.2018</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="inner-title">
                                                <h4><b>Incident Cards</b></h4>
                                            </div>
                                            <table class="table table-hover">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Site</th>
                                                        <th>Asset</th>
                                                        <th>Failure Reason</th>
                                                        <th>Required Spares</th>
                                                        <th>Process of Work Done</th>
                                                        <th>Incharge - Facilities</th>
                                                        <th>Reviewed By</th>
                                                        <th>Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Aparna</td>
                                                        <td>Buildings</td>
                                                        <td>Complaint</td>
                                                        <td>painting for balcony grills....</td>
                                                        <td>200sqf</td>
                                                        <td>of Complaints Re-opened till date in past 30 days:</td>
                                                        <td>Owner</td>
                                                        <td>01.01.2018</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aparna</td>
                                                        <td>Buildings</td>
                                                        <td>Complaint</td>
                                                        <td>painting for balcony grills....</td>
                                                        <td>200sqf</td>
                                                        <td>of Complaints Re-opened till date in past 30 days:</td>
                                                        <td>Owner</td>
                                                        <td>01.01.2018</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aparna</td>
                                                        <td>Buildings</td>
                                                        <td>Complaint</td>
                                                        <td>painting for balcony grills....</td>
                                                        <td>200sqf</td>
                                                        <td>of Complaints Re-opened till date in past 30 days:</td>
                                                        <td>Owner</td>
                                                        <td>01.01.2018</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aparna</td>
                                                        <td>Buildings</td>
                                                        <td>Complaint</td>
                                                        <td>painting for balcony grills....</td>
                                                        <td>200sqf</td>
                                                        <td>of Complaints Re-opened till date in past 30 days:</td>
                                                        <td>Owner</td>
                                                        <td>01.01.2018</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="inner-title">
                                                <h4><b>Break Down Report</b></h4>
                                            </div>
                                            <table class="table table-hover">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Site</th>
                                                        <th>Asset</th>
                                                        <th>Work Carried Out by</th>
                                                        <th>RCA</th>
                                                        <th>Incharge - Facilities</th>
                                                        <th>Reviewed By</th>
                                                        <th>Job Card</th>
                                                        <th>Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Aparna</td>
                                                        <td>Buildings</td>
                                                        <td>Complaint</td>
                                                        <td>painting for balcony grills....</td>
                                                        <td>200sqf</td>
                                                        <td>of Complaints Re-opened till date in past 30 days:</td>
                                                        <td>Owner</td>
                                                        <td>01.01.2018</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aparna</td>
                                                        <td>Buildings</td>
                                                        <td>Complaint</td>
                                                        <td>painting for balcony grills....</td>
                                                        <td>200sqf</td>
                                                        <td>of Complaints Re-opened till date in past 30 days:</td>
                                                        <td>Owner</td>
                                                        <td>01.01.2018</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aparna</td>
                                                        <td>Buildings</td>
                                                        <td>Complaint</td>
                                                        <td>painting for balcony grills....</td>
                                                        <td>200sqf</td>
                                                        <td>of Complaints Re-opened till date in past 30 days:</td>
                                                        <td>Owner</td>
                                                        <td>01.01.2018</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aparna</td>
                                                        <td>Buildings</td>
                                                        <td>Complaint</td>
                                                        <td>painting for balcony grills....</td>
                                                        <td>200sqf</td>
                                                        <td>of Complaints Re-opened till date in past 30 days:</td>
                                                        <td>Owner</td>
                                                        <td>01.01.2018</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="inner-title">
                                                <h4><b>Upcoming AMC</b></h4>
                                            </div>
                                            <table class="table table-hover">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Site</th>
                                                        <th>Category</th>
                                                        <th>Asset</th>
                                                        <th>Location</th>
                                                        <th>Vendor</th>
                                                        <th>Date</th>
                                                        <th>Time</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Aparna</td>
                                                        <td>Buildings</td>
                                                        <td>Complaint</td>
                                                        <td>painting for balcony grills....</td>
                                                        <td>200sqf</td>
                                                        <td>of Complaints Re-opened till date in past 30 days:</td>
                                                        <td>01.01.2018</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aparna</td>
                                                        <td>Buildings</td>
                                                        <td>Complaint</td>
                                                        <td>painting for balcony grills....</td>
                                                        <td>200sqf</td>
                                                        <td>of Complaints Re-opened till date in past 30 days:</td>
                                                        <td>01.01.2018</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aparna</td>
                                                        <td>Buildings</td>
                                                        <td>Complaint</td>
                                                        <td>painting for balcony grills....</td>
                                                        <td>200sqf</td>
                                                        <td>of Complaints Re-opened till date in past 30 days:</td>
                                                        <td>01.01.2018</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aparna</td>
                                                        <td>Buildings</td>
                                                        <td>Complaint</td>
                                                        <td>painting for balcony grills....</td>
                                                        <td>200sqf</td>
                                                        <td>of Complaints Re-opened till date in past 30 days:</td>
                                                        <td>01.01.2018</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>	
                                </div>
                            </fieldset>-->
                        </div>
                        <div id='tab4'> 
	                         <h2 class="bluered">Apna Complex (APMS ) Data as on <span><?php $date = date('Y-m-d'); echo date('d-m-Y', strtotime($date .' -1 day'));  ?></span></h2>
							     <table cellpadding="0" cellspacing="0" class="table table-bordered table-striped add-edit-rreg no-footer">
                                           		<thead style="">
                                                	<tr style="background:#293b4c; color:#FFFFFF;">
                                                    	<th>Community</th><th>Previous</th><th>HelpDesk(Opened)</th><th>Login(Opened)</th><th>Total</th><th>Resolved
</th>
<th>Pending</th>
                                                    </tr>
                                                </thead>   
                                                <tbody>
												 @foreach($sitenames as $kk =>  $siten)

                                                	<tr>
                                                    	<td>{{ $siten }}</td>
														<td>{{ $apnaapms['apna_apms_previous'][$kk] }}</td>
														<td>{{ $apnaapms['apna_apms_opened_help'][$kk] }}</td>
														<td>{{ $apnaapms['apna_apms_opened_login'][$kk] }}</td>
														<td>{{ (int)$apnaapms['apna_apms_previous'][$kk] +  (int)$apnaapms['apna_apms_opened_help'][$kk] + (int)$apnaapms['apna_apms_opened_login'][$kk] }}</td>
														<td>{{ $apnaapms['apna_apms_resolved'][$kk] }}</td>
														<td>{{ $apnaapms['apna_apms_pending'][$kk] }}</td>
                                                    </tr>
                                                	  
													@endforeach 
													
                                                </tbody>
                                           </table>	
										   
										   
										     <h2 class="bluered">Apna Complex (Project ) Data as on <span><?php $date = date('Y-m-d'); echo date('d-m-Y', strtotime($date .' -1 day'));  ?></span></h2>
							     <table cellpadding="0" cellspacing="0" class="table table-bordered table-striped add-edit-rreg no-footer">
                                           		<thead style="">
                                                	<tr style="background:#293b4c; color:#FFFFFF;">
                                                    	<th>Community</th><th>Previous</th><th>HelpDesk(Opened)</th><th>Login(Opened)</th><th>Total</th><th>Resolved
</th>
<th>Pending</th>
                                                    </tr> 
                                                </thead>   
                                                <tbody>
												 @foreach($sitenames as $kk =>  $siten)
                                                	<tr>
                                                    	<td>{{ $siten }}</td>
														<td>{{ $apnaproj['apna_project_previous'][$kk] }}</td>
														<td>{{ $apnaproj['apna_project_opened_help'][$kk] }}</td>
														<td>{{ $apnaproj['apna_project_opened_login'][$kk] }}</td>
														<td>{{  (int)$apnaproj['apna_project_previous'][$kk] + (int)$apnaproj['apna_project_opened_help'][$kk] + (int)$apnaproj['apna_project_opened_login'][$kk] }}</td>
														<td>{{ $apnaproj['apna_project_resolved'][$kk] }}</td>
														<td>{{ $apnaproj['apna_project_pending'][$kk] }}</td>
                                                    </tr>
                                                	  
													@endforeach 
													
                                                </tbody>
                                           </table>	
										   
										        <h2 class="bluered">Club House Data as on <span><?php $date = date('Y-m-d'); echo date('d-m-Y', strtotime($date .' -1 day'));  ?></span></h2>
							     <table cellpadding="0" cellspacing="0" class="table table-bordered table-striped add-edit-rreg no-footer">
                                           		<thead style="">
                                                	<tr style="background:#293b4c; color:#FFFFFF;">
                                                    	<th>Community</th><th>Revenue Day</th><th>Power(Units)</th><th>Gym</th><th>Pool
</th>
<th>Tennis</th><th>Shuttle</th>
                                                    </tr> 
                                                </thead>   
                                                <tbody>
												 @foreach($sitenames as $kk =>  $siten)
                                                	<tr>
                                                    	<td>{{ $siten }}</td>
														<td>{{ $clubhouse['clbhous_revenue_day'][$kk] }}</td>
														<td>{{ $clubhouse['clbhous_pwr_units'][$kk] }}</td>
														<td>{{ $clubhouse['clbhous_users_gym'][$kk] }}</td>
														<td>{{ $clubhouse['clbhous_users_pool'][$kk] }}</td>
														<td>{{ $clubhouse['clbhous_users_tennis'][$kk] }}</td>
														<td>{{ $clubhouse['clbhous_shuttle'][$kk] }}</td>
                                                    </tr>
                                                	  
													@endforeach 
													
                                                </tbody>
                                           </table>	
										   
										    
                        	<!--<fieldset>    
	                            <div class="panel-body">
                                    <div class="row">                    	
                                        <div class="col-sm-12 top-colorboxes">
                                            <div class="col-sm-2">
                                                <div class="colorboxes" style="background-color:#16a6b7; border-color:#16a6b7;">
                                                    <h3>Communities</h3>
	                                                <div class="circle-img"><i class="fa fa-building" aria-hidden="true"></i><span>16</span></div>
                                                    <a href="#" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                                                </div>	
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="colorboxes" style="background-color:#da7226; border-color:#da7226;">
                                                    <h3>Vendors</h3>
	                                                <div class="circle-img"><i class="fa fa-life-ring" aria-hidden="true"></i><span>120</span></div>
                                                    <a href="#" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="colorboxes" style="background-color:#8e4383; border-color:#8e4383;">
                                                    <h3>Job Cards</h3>
	                                                <div class="circle-img"><i class="fa fa-thumb-tack" aria-hidden="true"></i><span>150</span></div>
                                                    <a href="#" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="colorboxes" style="background-color:#1c87bf; border-color:#1c87bf;">
                                                    <h3>Incident Cards</h3>
	                                                <div class="circle-img"><i class="fa fa-indent" aria-hidden="true"></i><span>45</span></div>
                                                    <a href="#" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="colorboxes" style="background-color:#314d55; border-color:#314d55;">
                                                    <h3>Break Down Reports</h3>
	                                                <div class="circle-img"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i><span>56</span></div>
                                                    <a href="#" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="colorboxes" style="background-color:#593d28; border-color:#593d28;">
                                                    <h3>Tasks</h3>
	                                                <div class="circle-img"><i class="fa fa-tasks" aria-hidden="true"></i><span>150</span></div>
                                                    <a href="#" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="inner-title">
                                                <h4><b>Job Cards</b></h4>
                                            </div>
                                            <table class="table table-hover">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Site</th>
                                                        <th>Asset</th>
                                                        <th>Nature of Work</th>
                                                        <th>Work Carried Out By</th>
                                                        <th>Required Spares</th>
                                                        <th>Incharge - Facilities</th>
                                                        <th>Reviewed By</th>
                                                        <th>Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Aparna</td>
                                                        <td>Buildings</td>
                                                        <td>Complaint</td>
                                                        <td>painting for balcony grills....</td>
                                                        <td>200sqf</td>
                                                        <td>of Complaints Re-opened till date in past 30 days:</td>
                                                        <td>Owner</td>
                                                        <td>01.01.2018</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aparna</td>
                                                        <td>Buildings</td>
                                                        <td>Complaint</td>
                                                        <td>painting for balcony grills....</td>
                                                        <td>200sqf</td>
                                                        <td>of Complaints Re-opened till date in past 30 days:</td>
                                                        <td>Owner</td>
                                                        <td>01.01.2018</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aparna</td>
                                                        <td>Buildings</td>
                                                        <td>Complaint</td>
                                                        <td>painting for balcony grills....</td>
                                                        <td>200sqf</td>
                                                        <td>of Complaints Re-opened till date in past 30 days:</td>
                                                        <td>Owner</td>
                                                        <td>01.01.2018</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aparna</td>
                                                        <td>Buildings</td>
                                                        <td>Complaint</td>
                                                        <td>painting for balcony grills....</td>
                                                        <td>200sqf</td>
                                                        <td>of Complaints Re-opened till date in past 30 days:</td>
                                                        <td>Owner</td>
                                                        <td>01.01.2018</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="inner-title">
                                                <h4><b>Incident Cards</b></h4>
                                            </div>
                                            <table class="table table-hover">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Site</th>
                                                        <th>Asset</th>
                                                        <th>Failure Reason</th>
                                                        <th>Required Spares</th>
                                                        <th>Process of Work Done</th>
                                                        <th>Incharge - Facilities</th>
                                                        <th>Reviewed By</th>
                                                        <th>Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Aparna</td>
                                                        <td>Buildings</td>
                                                        <td>Complaint</td>
                                                        <td>painting for balcony grills....</td>
                                                        <td>200sqf</td>
                                                        <td>of Complaints Re-opened till date in past 30 days:</td>
                                                        <td>Owner</td>
                                                        <td>01.01.2018</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aparna</td>
                                                        <td>Buildings</td>
                                                        <td>Complaint</td>
                                                        <td>painting for balcony grills....</td>
                                                        <td>200sqf</td>
                                                        <td>of Complaints Re-opened till date in past 30 days:</td>
                                                        <td>Owner</td>
                                                        <td>01.01.2018</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aparna</td>
                                                        <td>Buildings</td>
                                                        <td>Complaint</td>
                                                        <td>painting for balcony grills....</td>
                                                        <td>200sqf</td>
                                                        <td>of Complaints Re-opened till date in past 30 days:</td>
                                                        <td>Owner</td>
                                                        <td>01.01.2018</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aparna</td>
                                                        <td>Buildings</td>
                                                        <td>Complaint</td>
                                                        <td>painting for balcony grills....</td>
                                                        <td>200sqf</td>
                                                        <td>of Complaints Re-opened till date in past 30 days:</td>
                                                        <td>Owner</td>
                                                        <td>01.01.2018</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="inner-title">
                                                <h4><b>Break Down Report</b></h4>
                                            </div>
                                            <table class="table table-hover">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Site</th>
                                                        <th>Asset</th>
                                                        <th>Work Carried Out by</th>
                                                        <th>RCA</th>
                                                        <th>Incharge - Facilities</th>
                                                        <th>Reviewed By</th>
                                                        <th>Job Card</th>
                                                        <th>Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Aparna</td>
                                                        <td>Buildings</td>
                                                        <td>Complaint</td>
                                                        <td>painting for balcony grills....</td>
                                                        <td>200sqf</td>
                                                        <td>of Complaints Re-opened till date in past 30 days:</td>
                                                        <td>Owner</td>
                                                        <td>01.01.2018</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aparna</td>
                                                        <td>Buildings</td>
                                                        <td>Complaint</td>
                                                        <td>painting for balcony grills....</td>
                                                        <td>200sqf</td>
                                                        <td>of Complaints Re-opened till date in past 30 days:</td>
                                                        <td>Owner</td>
                                                        <td>01.01.2018</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aparna</td>
                                                        <td>Buildings</td>
                                                        <td>Complaint</td>
                                                        <td>painting for balcony grills....</td>
                                                        <td>200sqf</td>
                                                        <td>of Complaints Re-opened till date in past 30 days:</td>
                                                        <td>Owner</td>
                                                        <td>01.01.2018</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aparna</td>
                                                        <td>Buildings</td>
                                                        <td>Complaint</td>
                                                        <td>painting for balcony grills....</td>
                                                        <td>200sqf</td>
                                                        <td>of Complaints Re-opened till date in past 30 days:</td>
                                                        <td>Owner</td>
                                                        <td>01.01.2018</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="inner-title">
                                                <h4><b>Upcoming AMC</b></h4>
                                            </div>
                                            <table class="table table-hover">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Site</th>
                                                        <th>Category</th>
                                                        <th>Asset</th>
                                                        <th>Location</th>
                                                        <th>Vendor</th>
                                                        <th>Date</th>
                                                        <th>Time</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Aparna</td>
                                                        <td>Buildings</td>
                                                        <td>Complaint</td>
                                                        <td>painting for balcony grills....</td>
                                                        <td>200sqf</td>
                                                        <td>of Complaints Re-opened till date in past 30 days:</td>
                                                        <td>01.01.2018</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aparna</td>
                                                        <td>Buildings</td>
                                                        <td>Complaint</td>
                                                        <td>painting for balcony grills....</td>
                                                        <td>200sqf</td>
                                                        <td>of Complaints Re-opened till date in past 30 days:</td>
                                                        <td>01.01.2018</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aparna</td>
                                                        <td>Buildings</td>
                                                        <td>Complaint</td>
                                                        <td>painting for balcony grills....</td>
                                                        <td>200sqf</td>
                                                        <td>of Complaints Re-opened till date in past 30 days:</td>
                                                        <td>01.01.2018</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aparna</td>
                                                        <td>Buildings</td>
                                                        <td>Complaint</td>
                                                        <td>painting for balcony grills....</td>
                                                        <td>200sqf</td>
                                                        <td>of Complaints Re-opened till date in past 30 days:</td>
                                                        <td>01.01.2018</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>	
                                </div>
                            </fieldset>-->  
                        </div>
                        <div id='tab5'>
						
						     <h2 class="bluered">Security Data as on <span><?php  $date = date('Y-m-d'); echo date('d-m-Y', strtotime($date .' -1 day'));  ?></span></h2>
							     <table cellpadding="0" cellspacing="0" class="table table-bordered table-striped add-edit-rreg no-footer">
                                           		<thead style="">
                                                	<tr style="background:#293b4c; color:#FFFFFF;">
                                                    	<th>Community</th><th>CCTV</th><th>Boom.B</th><th>Solar Fencing(Zone 1)</th><th>Zone 2
</th>
<th>Zone 3</th><th>Zone 4</th><th>T.Kit</th>
                                                    </tr> 
                                                </thead>   
                                                <tbody> 
												 @foreach($sitenames as $kk =>  $siten)
                                                	<tr>
                                                    	<td>{{ $siten }}</td>
														<td>{{ $security['nw_cctv'][$kk] }}</td>
														<td>{{ $security['nw_boom'][$kk] }}</td>
										 				<td>{{ $security['sf_zone1'][$kk] }}</td>
														<td>{{ $security['sf_zone2'][$kk] }}</td>
														<td>{{ $security['sf_zone3'][$kk] }}</td>
														<td>{{ $security['sf_zone4'][$kk] }}</td>
														<td>{{ $security['sf_tkit'][$kk] }}</td>
                                                    </tr>
                                                	  
													@endforeach 
													
                                                </tbody>
                                           </table>	
                        	<!--<fieldset> 
	                            <div class="panel-body">
                                    <div class="row">                    	
                                        <div class="col-sm-12 top-colorboxes">
                                            <div class="col-sm-2">
                                                <div class="colorboxes" style="background-color:#16a6b7; border-color:#16a6b7;">
                                                    <h3>Communities</h3>
	                                                <div class="circle-img"><i class="fa fa-building" aria-hidden="true"></i><span>16</span></div>
                                                    <a href="#" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                                                </div>	
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="colorboxes" style="background-color:#da7226; border-color:#da7226;">
                                                    <h3>Vendors</h3>
	                                                <div class="circle-img"><i class="fa fa-life-ring" aria-hidden="true"></i><span>120</span></div>
                                                    <a href="#" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="colorboxes" style="background-color:#8e4383; border-color:#8e4383;">
                                                    <h3>Job Cards</h3>
	                                                <div class="circle-img"><i class="fa fa-thumb-tack" aria-hidden="true"></i><span>150</span></div>
                                                    <a href="#" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="colorboxes" style="background-color:#1c87bf; border-color:#1c87bf;">
                                                    <h3>Incident Cards</h3>
	                                                <div class="circle-img"><i class="fa fa-indent" aria-hidden="true"></i><span>45</span></div>
                                                    <a href="#" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="colorboxes" style="background-color:#314d55; border-color:#314d55;">
                                                    <h3>Break Down Reports</h3>
	                                                <div class="circle-img"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i><span>56</span></div>
                                                    <a href="#" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="colorboxes" style="background-color:#593d28; border-color:#593d28;">
                                                    <h3>Tasks</h3>
	                                                <div class="circle-img"><i class="fa fa-tasks" aria-hidden="true"></i><span>150</span></div>
                                                    <a href="#" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="inner-title">
                                                <h4><b>Job Cards</b></h4>
                                            </div>
                                            <table class="table table-hover">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Site</th>
                                                        <th>Asset</th>
                                                        <th>Nature of Work</th>
                                                        <th>Work Carried Out By</th>
                                                        <th>Required Spares</th>
                                                        <th>Incharge - Facilities</th>
                                                        <th>Reviewed By</th>
                                                        <th>Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Aparna</td>
                                                        <td>Buildings</td>
                                                        <td>Complaint</td>
                                                        <td>painting for balcony grills....</td>
                                                        <td>200sqf</td>
                                                        <td>of Complaints Re-opened till date in past 30 days:</td>
                                                        <td>Owner</td>
                                                        <td>01.01.2018</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aparna</td>
                                                        <td>Buildings</td>
                                                        <td>Complaint</td>
                                                        <td>painting for balcony grills....</td>
                                                        <td>200sqf</td>
                                                        <td>of Complaints Re-opened till date in past 30 days:</td>
                                                        <td>Owner</td>
                                                        <td>01.01.2018</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aparna</td>
                                                        <td>Buildings</td>
                                                        <td>Complaint</td>
                                                        <td>painting for balcony grills....</td>
                                                        <td>200sqf</td>
                                                        <td>of Complaints Re-opened till date in past 30 days:</td>
                                                        <td>Owner</td>
                                                        <td>01.01.2018</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aparna</td>
                                                        <td>Buildings</td>
                                                        <td>Complaint</td>
                                                        <td>painting for balcony grills....</td>
                                                        <td>200sqf</td>
                                                        <td>of Complaints Re-opened till date in past 30 days:</td>
                                                        <td>Owner</td>
                                                        <td>01.01.2018</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="inner-title">
                                                <h4><b>Incident Cards</b></h4>
                                            </div>
                                            <table class="table table-hover">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Site</th>
                                                        <th>Asset</th>
                                                        <th>Failure Reason</th>
                                                        <th>Required Spares</th>
                                                        <th>Process of Work Done</th>
                                                        <th>Incharge - Facilities</th>
                                                        <th>Reviewed By</th>
                                                        <th>Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Aparna</td>
                                                        <td>Buildings</td>
                                                        <td>Complaint</td>
                                                        <td>painting for balcony grills....</td>
                                                        <td>200sqf</td>
                                                        <td>of Complaints Re-opened till date in past 30 days:</td>
                                                        <td>Owner</td>
                                                        <td>01.01.2018</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aparna</td>
                                                        <td>Buildings</td>
                                                        <td>Complaint</td>
                                                        <td>painting for balcony grills....</td>
                                                        <td>200sqf</td>
                                                        <td>of Complaints Re-opened till date in past 30 days:</td>
                                                        <td>Owner</td>
                                                        <td>01.01.2018</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aparna</td>
                                                        <td>Buildings</td>
                                                        <td>Complaint</td>
                                                        <td>painting for balcony grills....</td>
                                                        <td>200sqf</td>
                                                        <td>of Complaints Re-opened till date in past 30 days:</td>
                                                        <td>Owner</td>
                                                        <td>01.01.2018</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aparna</td>
                                                        <td>Buildings</td>
                                                        <td>Complaint</td>
                                                        <td>painting for balcony grills....</td>
                                                        <td>200sqf</td>
                                                        <td>of Complaints Re-opened till date in past 30 days:</td>
                                                        <td>Owner</td>
                                                        <td>01.01.2018</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="inner-title">
                                                <h4><b>Break Down Report</b></h4>
                                            </div>
                                            <table class="table table-hover">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Site</th>
                                                        <th>Asset</th>
                                                        <th>Work Carried Out by</th>
                                                        <th>RCA</th>
                                                        <th>Incharge - Facilities</th>
                                                        <th>Reviewed By</th>
                                                        <th>Job Card</th>
                                                        <th>Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Aparna</td>
                                                        <td>Buildings</td>
                                                        <td>Complaint</td>
                                                        <td>painting for balcony grills....</td>
                                                        <td>200sqf</td>
                                                        <td>of Complaints Re-opened till date in past 30 days:</td>
                                                        <td>Owner</td>
                                                        <td>01.01.2018</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aparna</td>
                                                        <td>Buildings</td>
                                                        <td>Complaint</td>
                                                        <td>painting for balcony grills....</td>
                                                        <td>200sqf</td>
                                                        <td>of Complaints Re-opened till date in past 30 days:</td>
                                                        <td>Owner</td>
                                                        <td>01.01.2018</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aparna</td>
                                                        <td>Buildings</td>
                                                        <td>Complaint</td>
                                                        <td>painting for balcony grills....</td>
                                                        <td>200sqf</td>
                                                        <td>of Complaints Re-opened till date in past 30 days:</td>
                                                        <td>Owner</td>
                                                        <td>01.01.2018</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aparna</td>
                                                        <td>Buildings</td>
                                                        <td>Complaint</td>
                                                        <td>painting for balcony grills....</td>
                                                        <td>200sqf</td>
                                                        <td>of Complaints Re-opened till date in past 30 days:</td>
                                                        <td>Owner</td>
                                                        <td>01.01.2018</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="inner-title">
                                                <h4><b>Upcoming AMC</b></h4>
                                            </div>
                                            <table class="table table-hover">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Site</th>
                                                        <th>Category</th>
                                                        <th>Asset</th>
                                                        <th>Location</th>
                                                        <th>Vendor</th>
                                                        <th>Date</th>
                                                        <th>Time</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Aparna</td>
                                                        <td>Buildings</td>
                                                        <td>Complaint</td>
                                                        <td>painting for balcony grills....</td>
                                                        <td>200sqf</td>
                                                        <td>of Complaints Re-opened till date in past 30 days:</td>
                                                        <td>01.01.2018</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aparna</td>
                                                        <td>Buildings</td>
                                                        <td>Complaint</td>
                                                        <td>painting for balcony grills....</td>
                                                        <td>200sqf</td>
                                                        <td>of Complaints Re-opened till date in past 30 days:</td>
                                                        <td>01.01.2018</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aparna</td>
                                                        <td>Buildings</td>
                                                        <td>Complaint</td>
                                                        <td>painting for balcony grills....</td>
                                                        <td>200sqf</td>
                                                        <td>of Complaints Re-opened till date in past 30 days:</td>
                                                        <td>01.01.2018</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Aparna</td>
                                                        <td>Buildings</td>
                                                        <td>Complaint</td>
                                                        <td>painting for balcony grills....</td>
                                                        <td>200sqf</td>
                                                        <td>of Complaints Re-opened till date in past 30 days:</td>
                                                        <td>01.01.2018</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>	
                                </div>
                            </fieldset>-->
                        </div>
                    </div>
                </div>

                <div class="panel-body">
					
                </div>
            </div>
        </div>
    </div>
    <div>
   </div>
@include('partials.footer')
@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/pie.js"></script>
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>

<script>
	// Wait until the DOM has loaded before querying the document
	$(document).ready(function(){
		$('ul.tabs').each(function(){
			// For each set of tabs, we want to keep track of
			// which tab is active and its associated content
			var $active, $content, $links = $(this).find('a');

			// If the location.hash matches one of the links, use that as the active tab.
			// If no match is found, use the first link as the initial active tab.
			$active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
			$active.addClass('active');

			$content = $($active[0].hash);

			// Hide the remaining content
			$links.not($active).each(function () {
				$(this.hash).hide();
			});

			// Bind the click event handler
			$(this).on('click', 'a', function(e){
				// Make the old tab inactive.
				$active.removeClass('active');
				$content.hide();

				// Update the variables with the new link and content
				$active = $(this);
				$content = $(this.hash);

				// Make the tab active.
				$active.addClass('active');
				$content.show();

				// Prevent the anchor's default click action
				e.preventDefault();
			});
		});
	});
</script>
<script>
$(function(){
    $("#chart").dxChart({
        dataSource: dataSource,
        commonSeriesSettings: {
            argumentField: "state",
            type: "bar",
            hoverMode: "allArgumentPoints",
            selectionMode: "allArgumentPoints",
            label: {
                visible: true,
                format: {
                    type: "fixedPoint",
                    precision: 0
                }
            }
        }, 
        series: [
            { valueField: "year2004", name: "Total" },
            { valueField: "year2001", name: "Male" },
            { valueField: "year1998", name: "Female" }
        ], 
        title: "Employee Department wise distribution [<b><span style='color:#F90;'>Total:</span> 1217</b>]",
        legend: {
            verticalAlignment: "bottom",
            horizontalAlignment: "center"
        },
        "export": {
            enabled: true
        },
        onPointClick: function (e) {
            e.target.select();
        }
    });

});
</script>

<script>
var chart = AmCharts.makeChart( "chartdiv1", {
  "type": "pie",
  "theme": "light",
  "dataProvider": [ {
    "title": "Off",
    "value": <?php echo $jkoff; ?>
  }, {
    "title": "NW",
    "value": <?php echo $jknw; ?>
  } , {
    "title": "Auto",
    "value": <?php echo $jkauto;  ?>
  } ],
  "titleField": "title",
  "valueField": "value",
  "labelRadius": 5,

  "radius": "42%",
  "innerRadius": "60%",
  "labelText": "[[title]]",
  "export": {
    "enabled": true
  }
} );

var chart = AmCharts.makeChart( "chartdiv2", {
  "type": "pie",
  "theme": "light",
  "dataProvider": [ {
    "title": "Off",
    "value": <?php echo $mainoff; ?>
  }, {
    "title": "NW",
    "value": <?php echo $mainnw; ?>
  } , {
    "title": "Auto",
    "value": <?php echo $mainauto;  ?>
  } ],
  "titleField": "title",
  "valueField": "value",
  "labelRadius": 5,

  "radius": "42%",
  "innerRadius": "60%",
  "labelText": "[[title]]",
  "export": {
    "enabled": true
  }
} );

var chart = AmCharts.makeChart( "chartdiv3", {
  "type": "pie",
  "theme": "light",
  "dataProvider": [ {
    "title": "Off",
    "value": <?php echo $dgoff; ?>
  }, {
    "title": "NW",
    "value": <?php echo $dgnw; ?>
  } , {
    "title": "Auto",
    "value": <?php echo $dgauto;  ?>
  } ],
  "titleField": "title",
  "valueField": "value",
  "labelRadius": 5,

  "radius": "42%",
  "innerRadius": "60%",
  "labelText": "[[title]]",
  "export": {
    "enabled": true
  }
} );
</script>