<div class="col-sm-3">
 <?php $sitearr = getsitenamesAsLogin(); ?>
            <div class="download">
                <div class="widget-header">
                    <h3><i class="fa fa-newspaper-o"></i> Communities</h3>
                    <div class="widget-actions" style="margin-top:5px;"><button class="btn"><a href="{{ route('sites.index') }}" class="shortcut" title="Communities">Details</a></button></div>
                </div>
                
                <div class="widget-content">
                	<select class="form-control">
                       @if (count($sitearr) > 0)
                        @foreach ($sitearr as $kk => $client)
                    <option>{{ $client }}</option>
                    @endforeach
                    @endif</select>
                    
                </div>           	
            </div>
        	<div class="shortcuts">
                <div class="widget-header">
                    <h3><i class="fa fa-bookmark"></i> Shortcuts</h3>
                </div>
                <div class="widget-content">
                    <div class="shortcuts" style="margin-bottom:0px;">
						<a href="{{ route('vendors.index') }}" class="shortcut" title="Vendors"><i class="fa fa-users"></i><span class="shortcut-label">Vendors</span></a>
						<a href="/attendance" class="shortcut" title="Reports"><img src="images/personattendance.png" class="attendance" /><span class="shortcut-label">Attendance</span></a>
						<a href="{{ route('repository.index') }}" class="shortcut" title="Repositories"><i class="fa fa-hospital-o"></i><span class="shortcut-label">Repositories</span></a>
                        <a href="{{ route('tasks.index') }}" class="shortcut" title="Tasks"><i class="fa fa-list-alt"></i><span class="shortcut-label">Tasks</span></a>
						<a href="/calendar" class="shortcut" title="AMC"><i class="fa fa-building-o"></i><span class="shortcut-label">AMC</span></a>
						<!--<a href="{{ route('emps.index') }}" class="shortcut" title="Users"><i class="fa fa-user"></i><span class="shortcut-label">Users</span></a>-->
						<a href="{{ route('category.index') }}" class="shortcut" title="Categories"><i class="fa fa-sitemap"></i><span class="shortcut-label">Categories</span></a>
						<a href="{{ route('amc.index') }}" class="shortcut" title="PPM"><i class="fa fa-bolt"></i><span class="shortcut-label">PPM</span></a>
						<a href="{{ route('items.index') }}" class="shortcut" title="Items"><i class="fa fa-file-text-o"></i><span class="shortcut-label">Items</span></a>
						
                        
                        <a href="/topics/breakdown" class="shortcut avacdo" title="Items"><img src="images/breakdown.png" class="dashboardimage1"/><span class="shortcut-label">Break Down</span></a>
                        <a href="/topics/incident" class="shortcut" title="Items"><img src="images/incident.png" class="dashboardimage1"/><span class="shortcut-label">Incident</span></a>
                        <a href="/topics/jobcard" class="shortcut" title="Items"><img src="images/jobcard.png" class="dashboardimage3"/><span class="shortcut-label">Job Card</span></a>
                        <a href="/topics/historycard" class="shortcut" title="Items"><img src="images/history.png" class="dashboardimage2"/><span class="shortcut-label">History Card</span></a>
						 
                       <!-- <a href="{{ route('sites.index') }}" class="shortcut" title="Sites"><i class="fa fa-sitemap"></i><span class="shortcut-label">Sites</span></a>
                        <a href="{{ route('sites.index') }}" class="shortcut" title="Forums"><i class="fa fa-building-o"></i><span class="shortcut-label">Forums</span></a>
                        <a href="javascript:;" class="shortcut" title="Users"><i class="fa fa-user"></i><span class="shortcut-label">Users</span></a>
                        <a href="javascript:;" class="shortcut" title="Docs"><i class="fa fa-file-text-o"></i><span class="shortcut-label">Docs</span></a>
                        <a href="javascript:;" class="shortcut" title="Alerts"><i class="fa fa-bolt"></i><span class="shortcut-label">Alerts</span></a>-->
                       
                         
                        <!--<a href="{{ route('repository.index') }}"><i class="fa fa-bolt"></i><span class="shortcut-label">Repositories</span></a>-->
                    </div> <!-- /.shortcuts -->
                </div>
            </div>   
            <div class="shortcuts">
                <div class="widget-header">
                    <h3><i class="fa fa-newspaper-o"></i> Daily Reports</h3>
                    <div class="widget-actions" style="margin-top:0px;"><?php echo date('d-m-Y'); ?><button class="btn"><a href="{{ route('dailyreports.index') }}" class="shortcut" title="Reports">More</a></button></div>
                </div>
                <div class="widget-content" style="padding:20px 0px;">
              
                	<table cellpadding="0" cellspacing="0" border="0" width="100%" class="table table-striped" style="margin-bottom:0px;">
                    	<thead class="thead-dark">
                        	<tr>	
                            	<th></th><th>Fire</th><th>FMS</th><th>PMS</th><th>Security</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(isset($sitearr)) { ?>
						   @if (count($sitearr) > 0)
                        @foreach ($sitearr as $kk => $client)
                      <?php  $date =  date('d-m-Y'); 
                       $resarr =  checkDailyStatus($date, $kk); ?>  
                        	<tr>
                            	<td>{{ $client }}</td><td style="text-align:center;"><?php if($kk == '8' || $kk == '14' || $kk == '16' || $kk == '19'){ echo "<b>"."NA"."</b>";}else{ ?><i class="fa <?php if($resarr[0] == 'yes') echo 'fa-check'; else echo 'fa-times';?>" style="color:<?php if($resarr[0] == 'yes') echo 'green'; else echo 'red';?>;"></i><?php } ?></td><td style="text-align:center;"><i class="fa <?php if($resarr[1] == 'yes') echo 'fa-check'; else echo 'fa-times';?>" style="color:<?php if($resarr[1] == 'yes') echo 'green'; else echo 'red';?>;"></i></td><td style="text-align:center;"><i class="fa  <?php if($resarr[2] == 'yes') echo 'fa-check'; else echo 'fa-times';?>" style="color:<?php if($resarr[2] == 'yes') echo 'green'; else echo 'red';?>;"></i></td><td style="text-align:center;"><i class="fa  <?php if($resarr[3] == 'yes') echo 'fa-check'; else echo 'fa-times';?>" style="color:<?php if($resarr[3] == 'yes') echo 'green'; else echo 'red';?>;"></i></td>
                            </tr>
                          
							@endforeach
                    @endif
                    
					  <?php } ?>
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
                    <h3><i class="fa fa-newspaper-o"></i> MIS Report</h3>
                    <div class="widget-actions" style="margin-top:0px;"><?php echo date('d-m-Y'); ?> <button class="btn">Details</button></div>
                </div> <!-- /.widget-header --> 
                <div class="widget-content">
                	<button class="btn">Download</button>
                </div>           	
            </div>
            <!--<div class="download">
                <div class="widget-header">
                    <h3><i class="fa fa-newspaper-o"></i> Daily Reports</h3>
                    <div class="widget-actions" style="margin-top:0px;">21-02-2018 <button class="btn">Details</button></div>
                </div>
                <div class="widget-content">                	
			        <div id="chart1"></div>
                </div>           	
            </div>-->
        </div>
		