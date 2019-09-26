@extends('layouts.appgraph')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>window.jQuery || document.write(decodeURIComponent('%3Cscript src="js/jquery-3.1.0.min.js"%3E%3C/script%3E'))</script>
    <link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/17.2.5/css/dx.spa.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/17.2.5/css/dx.common.css" />
    <link rel="dx-theme" data-theme="generic.light" href="https://cdn3.devexpress.com/jslib/17.2.5/css/dx.light.css" />
    <script src="https://cdn3.devexpress.com/jslib/17.2.5/js/dx.all.js"></script>
    <script>
	 var dataSource = [{
    state: "Illinois",
    year1998: 423.721,
    year2001: 476.851,
    year2004: 528.904
}, {
    state: "Indiana",
    year1998: 178.719,
    year2001: 195.769,
    year2004: 227.271
}, {
    state: "Michigan",
    year1998: 308.845,
    year2001: 335.793,
    year2004: 372.576
}, {
    state: "Ohio",
    year1998: 348.555,
    year2001: 374.771,
    year2004: 418.258
}, {
    state: "Wisconsin",
    year1998: 160.274,
    year2001: 182.373,
    year2004: 211.727
}];
	</script>
   
    <style>
	  #chart {
    height: 440px;
}
	</style> 


    <div class="demo-container">
        <div id="chart"></div>
    </div>

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
            { valueField: "year2004", name: "2004" },
            { valueField: "year2001", name: "2001" },
            { valueField: "year1998", name: "1998" }
        ],
        title: "Gross State Product within the Great Lakes Region",
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
 <div class="row">
    	<div class="col-sm-3">
        	<div class="shortcuts">
                <div class="widget-header">
                    <h3><i class="fa fa-bookmark"></i> Shortcuts</h3>
                    <div class="widget-actions"><span class="badge">8</span></div> <!-- /.widget-actions -->
                </div>
                <div class="widget-content">
                    <div class="shortcuts">
                        <a href="javascript:;" class="shortcut"><i class="fa fa-list-alt"></i><span class="shortcut-label">Apps</span></a>
                        <a href="javascript:;" class="shortcut"><i class="fa fa-bookmark"></i><span class="shortcut-label">Bookmarks</span></a>
                        <a href="javascript:;" class="shortcut"><i class="fa fa-signal"></i><span class="shortcut-label">Reports</span></a>
                        <a href="javascript:;" class="shortcut"><i class="fa fa-comment"></i><span class="shortcut-label">Comments</span></a>
                        <a href="javascript:;" class="shortcut"><i class="fa fa-user"></i><span class="shortcut-label">Users</span></a>
                        <a href="javascript:;" class="shortcut"><i class="fa fa-file-text-o"></i><span class="shortcut-label">Notes</span></a>
                    </div> <!-- /.shortcuts -->
                </div>
            </div>
            <div class="shortcuts">
                <div class="widget-header">
                    <h3><i class="fa fa-newspaper-o"></i> Daily Reports</h3>
                    <div class="widget-actions" style="margin-top:0px;">19-02-2018 <button class="btn">More</button></div>
                </div>
                <div class="widget-content" style="padding:20px 0px;">
                	<table cellpadding="0" cellspacing="0" border="0" width="100%" class="table table-striped">
                    	<thead>
                        	<tr>	
                            	<th></th><th style="color:#009cde;">Fire</th><th style="color:#009cde;">FMS</th><th style="color:#009cde;">PMS</th><th style="color:#009cde;">Security</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<tr>
                            	<td>Cyberzon</td><td style="text-align:center;"><i class="fa fa-check" style="color:green;"></i></td><td style="text-align:center;"><i class="fa fa-times" style="color:red;"></i></td><td style="text-align:center;"><i class="fa fa-check" style="color:green;"></i></td><td style="text-align:center;"><i class="fa fa-times" style="color:red;"></i></td>
                            </tr>
                        	<tr>
                            	<td>Kanopy Tulip Phase 1B</td><td style="text-align:center;"><i class="fa fa-check" style="color:green;"></i></td><td style="text-align:center;"><i class="fa fa-times" style="color:red;"></i></td><td style="text-align:center;"><i class="fa fa-check" style="color:green;"></i></td><td style="text-align:center;"><i class="fa fa-times" style="color:red;"></i></td>
                            </tr>
                        	<tr>
                            	<td>Serena Park</td><td style="text-align:center;"><i class="fa fa-check" style="color:green;"></i></td><td style="text-align:center;"><i class="fa fa-times" style="color:red;"></i></td><td style="text-align:center;"><i class="fa fa-check" style="color:green;"></i></td><td style="text-align:center;"><i class="fa fa-times" style="color:red;"></i></td>
                            </tr>
                        	<tr>
                            	<td>Elina</td><td style="text-align:center;"><i class="fa fa-check" style="color:green;"></i></td><td style="text-align:center;"><i class="fa fa-times" style="color:red;"></i></td><td style="text-align:center;"><i class="fa fa-check" style="color:green;"></i></td><td style="text-align:center;"><i class="fa fa-times" style="color:red;"></i></td>
                            </tr>
                        	<tr>
                            	<td>Amaravati One</td><td style="text-align:center;"><i class="fa fa-check" style="color:green;"></i></td><td style="text-align:center;"><i class="fa fa-times" style="color:red;"></i></td><td style="text-align:center;"><i class="fa fa-check" style="color:green;"></i></td><td style="text-align:center;"><i class="fa fa-times" style="color:red;"></i></td>
                            </tr>
                        	<tr>
                            	<td>Hillpark Silver Oaks</td><td style="text-align:center;"><i class="fa fa-check" style="color:green;"></i></td><td style="text-align:center;"><i class="fa fa-times" style="color:red;"></i></td><td style="text-align:center;"><i class="fa fa-check" style="color:green;"></i></td><td style="text-align:center;"><i class="fa fa-times" style="color:red;"></i></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="widget-accordion">
                <div class="widget-header">
                    <h3><i class="fa fa-sort"></i> Quick Data</h3>					
                </div> <!-- /.widget-header -->
                <div class="widget-content">
                	<div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 data-toggle="collapse" data-parent="#accordion" href="#collapse1" class="panel-title expand">
                               <div class="right-arrow pull-right">+</div>
                              <a href="#">Job Cards</a>
                            </h4>
                          </div>
                          <div id="collapse1" class="panel-collapse collapse">
                            <div class="panel-body">
                            	<table cellpadding="0" cellspacing="0" border="0" width="100%" class="table table-hover">
                                	<thead class="thead-dark">
                                    	<tr>
                                        	<th>Site</th><th>Asset</th><th>Reason</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<tr>
                                        	<td>Aparna</td><td>House</td><td>Damage</td>
                                        </tr>
                                    	<tr>
                                        	<td>Aparna</td><td>Building</td><td>Construction</td>
                                        </tr>
                                    	<tr>
                                        	<td>Aparna</td><td>Road</td><td>Damage</td>
                                        </tr>
                                    	<tr>
                                        	<td>Aparna</td><td>House</td><td>Build</td>
                                        </tr>
                                    	<tr>
                                        	<td>Aparna</td><td>House</td><td>Damage</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                          </div>
                        </div>
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 data-toggle="collapse" data-parent="#accordion" href="#collapse2" class="panel-title expand">
                                <div class="right-arrow pull-right">+</div>
                              <a href="#">Incident Cards</a>
                            </h4>
                          </div>
                          <div id="collapse2" class="panel-collapse collapse">
                            <div class="panel-body">
                            	<table cellpadding="0" cellspacing="0" border="0" width="100%" class="table table-hover">
                                	<thead class="thead-dark">
                                    	<tr>
                                        	<th>Site</th><th>Asset</th><th>Reason</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<tr>
                                        	<td>Aparna</td><td>House</td><td>Damage</td>
                                        </tr>
                                    	<tr>
                                        	<td>Aparna</td><td>Building</td><td>Construction</td>
                                        </tr>
                                    	<tr>
                                        	<td>Aparna</td><td>Road</td><td>Damage</td>
                                        </tr>
                                    	<tr>
                                        	<td>Aparna</td><td>House</td><td>Build</td>
                                        </tr>
                                    	<tr>
                                        	<td>Aparna</td><td>House</td><td>Damage</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                          </div>
                        </div>
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 data-toggle="collapse" data-parent="#accordion" href="#collapse3" class="panel-title expand">
                                <div class="right-arrow pull-right">+</div>
                              <a href="#">Break Down Report</a>
                            </h4>
                          </div>
                          <div id="collapse3" class="panel-collapse collapse">
                            <div class="panel-body">
                            	<table cellpadding="0" cellspacing="0" border="0" width="100%" class="table table-hover">
                                	<thead class="thead-dark">
                                    	<tr>
                                        	<th>Site</th><th>Asset</th><th>Reason</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<tr>
                                        	<td>Aparna</td><td>House</td><td>Damage</td>
                                        </tr>
                                    	<tr>
                                        	<td>Aparna</td><td>Building</td><td>Construction</td>
                                        </tr>
                                    	<tr>
                                        	<td>Aparna</td><td>Road</td><td>Damage</td>
                                        </tr>
                                    	<tr>
                                        	<td>Aparna</td><td>House</td><td>Build</td>
                                        </tr>
                                    	<tr>
                                        	<td>Aparna</td><td>House</td><td>Damage</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                          </div>
                        </div>
  				</div>
                </div>  <!-- /.widget-content -->
			</div>
            <div class="download">
                <div class="widget-header">
                    <h3><i class="fa fa-newspaper-o"></i> Daily Reports</h3>
                    <div class="widget-actions" style="margin-top:0px;">21-02-2018 <button class="btn">Details</button></div>
                </div> <!-- /.widget-header --> 
                <div class="widget-content">
                	<button class="btn">Download</button>
                </div>           	
            </div>
        </div>
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
                                                    <h3>Sites</h3>
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
                                        </div> <br clear="all" /><br />
                                      <!--<div id="chartContainer" style="height: 370px; width: 100%;"></div>-->
                                       <br />
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
                        <div id='tab2'>
                        	<fieldset> 
	                            <div class="panel-body">
                                    <div class="row">                    	
                                        <div class="col-sm-12 top-colorboxes">
                                            <div class="col-sm-2">
                                                <div class="colorboxes" style="background-color:#16a6b7; border-color:#16a6b7;">
                                                    <h3>Sites</h3>
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
                                                    <h3>Sites</h3>
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
                                                    <h3>Sites</h3>
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
                                                    <h3>Sites</h3>
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