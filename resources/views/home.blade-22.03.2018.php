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
                                                <div class="colorboxes" style="background-color:#16a6b7; border-color:#16a6b7;">
                                                    <h3>Communities</h3>
	                                                <div class="circle-img"><i class="fa fa-building" aria-hidden="true"></i><span>16</span></div>
                                                    <a href="{{ route('sites.index') }}" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                                                </div>	
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="colorboxes" style="background-color:#da7226; border-color:#da7226;">
                                                    <h3>Vendors</h3>
	                                                <div class="circle-img"><i class="fa fa-life-ring" aria-hidden="true"></i><span>120</span></div>
                                                    <a href="{{ route('vendors.index') }}" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
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
                                                    <a href="{{ route('tasks.index') }}" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
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
                            </fieldset>
                        </div>
                        <div id='tab2'>
                        	<fieldset> 
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
                            </fieldset>
                        </div>
                        <div id='tab3'>
                        	<fieldset> 
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
                            </fieldset>
                        </div>
                        <div id='tab4'>
                        	<fieldset> 
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
                            </fieldset>
                        </div>
                        <div id='tab5'>
                        	<fieldset> 
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
                            </fieldset>
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