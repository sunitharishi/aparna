@inject('request', 'Illuminate\Http\Request')
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu"
            data-keep-expanded="false"
            data-auto-scroll="true"
            data-slide-speed="200">
             <li class="{{ $request->segment(1) == 'dashboard' ? 'active' : '' }}">
                <a href="{{ url('/dashboard') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>
		 <li class="{{ $request->segment(1) == 'sites' ? 'active' : '' }}">
                <a href="{{ route('sites.index') }}">
                    <i class="fa fa-user-plus"></i>
                    <span class="title">Sites</span>
                </a>
            </li> 
			
			<!-- <li class="{{ $request->segment(1) == 'assets' ? 'active' : '' }}">
                <a href="{{ route('assets.index') }}">
                    <i class="fa fa-user-plus"></i>
                    <span class="title">Asset Management</span>
                </a>
            </li> -->


          <!--<li>
                        <a href="{{ route('assets.index') }}">
                            <i class="fa fa-calendar"></i>
                            <span class="title">Asset Management</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                                <li class="{{ $request->segment(1) == 'dailyreports' ? 'active active-sub' : '' }}">
                                    <a href="{{ route('assets.index') }}">
                                         <span class="title">
                                            View Assets
                                        </span>
                                    </a>
                                </li>
                                <li class="{{ $request->segment(1) == 'misreports' ? 'active active-sub' : '' }}">
                                    <a href="#">
                                      <i class="fa fa-file-text-o"></i>
                                         <span class="title">
                                            Templates
                                        </span>
                                    </a>
                                </li>
                                
                                 <li class="{{ $request->segment(1) == 'reportvalidation' ? 'active active-sub' : '' }}">
                                    <a href="#">
                                    <i class="fa fa-share-alt"></i>
                                         <span class="title">
                                           AMC Tracker
                                        </span> 
                                    </a>
                                </li>
                                
                                 <li class="{{ $request->segment(1) == 'reportvalidation' ? 'active active-sub' : '' }}">
                                    <a href="#">
                                    <i class="fa fa-calendar-o"></i>
                                    
                                         <span class="title">
                                           PPM Schedule
                                        </span> 
                                    </a>
                                </li>
                                
                                 <li class="{{ $request->segment(1) == 'reportvalidation' ? 'active active-sub' : '' }}">
                                    <a href="#">
                                    <i class="fa fa-book"></i>
                                         <span class="title">
                                           PM Reports
                                        </span> 
                                    </a>
                                </li>
                                
                                </ul>
                    </li>-->


           <!-- <li class="{{ $request->segment(1) == 'clients' ? 'active' : '' }}">
                <a href="{{ route('clients.index') }}">
                    <i class="fa fa-user-plus"></i>
                    <span class="title">Clients</span>
                </a>
            </li>--> 
			
			<!-- <li class="{{ $request->segment(1) == 'vendors' ? 'active' : '' }}">
                <a href="{{ route('vendors.index') }}">
                    <i class="fa fa-user-plus"></i>
                    <span class="title">Vendors</span>
                </a> 
            </li>-->
             
           <!-- <li class="{{ $request->segment(1) == 'projects' ? 'active' : '' }}">
                <a href="{{ route('projects.index') }}">
                    <i class="fa fa-briefcase"></i>
                    <span class="title">Projects</span>
                </a>
            </li>
            <li class="{{ $request->segment(1) == 'notes' ? 'active' : '' }}">
                <a href="{{ route('notes.index') }}">
                    <i class="fa fa-comments-o"></i>
                    <span class="title">Notes</span>
                </a>
            </li>
            <li class="{{ $request->segment(1) == 'documents' ? 'active' : '' }}">
                <a href="{{ route('documents.index') }}">
                    <i class="fa fa-file-text-o"></i>
                    <span class="title">Documents</span>
                </a>
            </li>
            <li class="{{ $request->segment(1) == 'transactions' ? 'active' : '' }}">
                <a href="{{ route('transactions.index') }}">
                    <i class="fa fa-credit-card"></i>
                    <span class="title">Transactions</span>
                </a>
            </li>-->
           <?php /*?> <li class="{{ $request->segment(1) == 'reports' ? 'active' : '' }}">
                <a href="{{ route('reports.index') }}">
                    <i class="fa fa-bar-chart"></i>
                    <span class="title">Reports</span>
                </a>
            </li><?php */?>
			
			<li>
                        <a href="">
                            <i class="fa fa-bar-chart"></i>
                            <span class="title">Reports</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                                <li class="{{ $request->segment(1) == 'dailyreports' ? 'active active-sub' : '' }}">
                                    <a href="{{ route('dailyreports.index') }}">
                                        <i class="fa fa-money"></i>
                                        <span class="title">
                                            Daily Reports
                                        </span>
                                    </a>
                                </li>
                                <li class="{{ $request->segment(1) == 'misreports' ? 'active active-sub' : '' }}">
                                    <a href="{{ route('misreports.index') }}">
                                        <i class="fa fa-server"></i>
                                        <span class="title">
                                            MIS Reports 
                                        </span>
                                    </a>
                                </li>
                                
                                 <li class="{{ $request->segment(1) == 'reportvalidation' ? 'active active-sub' : '' }}">
                                    <a href="{{ route('reportvalidation.index') }}">
                                        <i class="fa fa-money"></i>
                                        <span class="title">
                                            Report Validation 
                                        </span> 
                                    </a>
                                </li>
                                
                                </ul>
                    </li>
       <li>
                        <!--<a href="#">
                            <i class="fa fa-gears"></i>
                            <span class="title">Settings</span>
                            <span class="fa arrow"></span>
                        </a>-->
                        
                        
                        <a href="">
                            <i class="fa fa-user"></i>
                            <span class="title">User Management</span>
                            <span class="fa arrow"></span>
                        </a>
                        
                        <ul class="sub-menu">
                               <!-- <li class="{{ $request->segment(1) == 'currencies' ? 'active active-sub' : '' }}">
                                    <a href="{{ route('currencies.index') }}">
                                        <i class="fa fa-money"></i>
                                        <span class="title">
                                            Currencies
                                        </span>
                                    </a>
                                </li>-->
								 
                                
                             <li class="{{ $request->segment(1) == 'emps' ? 'active' : '' }}">
                              <a href="{{ route('emps.index') }}">
                              <i class="fa fa-users"></i>
                           <span class="title">Employees</span>
                            </a>
                              </li>    
                              
              <li class="{{ $request->segment(1) == 'users' ? 'active' : '' }}">
                <a href="{{ route('users.index') }}">
                    <i class="fa fa-sign-in"></i>
                    <span class="title">Logins</span>
                </a>
            </li>   
                                
                                <!--<li class="{{ $request->segment(1) == 'transaction_types' ? 'active active-sub' : '' }}">
                                    <a href="{{ route('transaction_types.index') }}">
                                        <i class="fa fa-exchange"></i>
                                        <span class="title">
                                            Transaction Types
                                        </span>
                                    </a>
                                </li>
                                <li class="{{ $request->segment(1) == 'income_sources' ? 'active active-sub' : '' }}">
                                    <a href="{{ route('income_sources.index') }}">
                                        <i class="fa fa-database"></i>
                                        <span class="title">
                                            Income Sources
                                        </span>
                                    </a>
                                </li>
                                <li class="{{ $request->segment(1) == 'client_statuses' ? 'active active-sub' : '' }}">
                                    <a href="{{ route('client_statuses.index') }}">
                                        <i class="fa fa-server"></i>
                                        <span class="title">
                                            Client Statuses
                                        </span>
                                    </a>
                                </li>
								
								  <li class="{{ $request->segment(1) == 'dailyreport_statuses' ? 'active active-sub' : '' }}">
                                    <a href="{{ route('dailyreport_statuses.index') }}">
                                        <i class="fa fa-server"></i>
                                        <span class="title">
                                            Daily Report Statuses 
                                        </span>
                                    </a>
                                </li>
								
                                <li class="{{ $request->segment(1) == 'project_statuses' ? 'active active-sub' : '' }}">
                                    <a href="{{ route('project_statuses.index') }}">
                                        <i class="fa fa-server"></i>
                                        <span class="title">
                                            Project Statuses
                                        </span>
                                    </a>
                                </li>-->
                                <li class="{{ $request->segment(1) == 'roles' ? 'active active-sub' : '' }}">
                                    <a href="{{ route('roles.index') }}">
                                        <i class="fa fa-key"></i>
                                        <span class="title">
                                            Login Permissions
                                        </span>
                                    </a>
                                </li>
                                </ul>
                    </li>
                    
  <li class="{{ $request->segment(1) == 'asset-templates' ? 'active' : '' }}">
                <a href="{{ route('asset-templates.index') }}">
                    <i class="fa fa-columns"></i>
                    <span class="title">Templates</span>
                </a>
            </li> 
                    
                    
                    
           @if(Auth::user()->role_id == 1)
            <!--<li class="{{ $request->segment(1) == 'users' ? 'active' : '' }}">
                <a href="{{ route('users.index') }}">
                    <i class="fa fa-users"></i>
                    <span class="title">Logins</span>
                </a>
            </li>-->
            @endif 
            
         <!--     <li class="{{ $request->segment(1) == 'employees' ? 'active' : '' }}">
                <a href="{{ route('employees.index') }}">
                    <i class="fa fa-users"></i>
                    <span class="title">Employees</span>
                </a>
            </li>-->
			
			 
           <!-- <li class="{{ $request->segment(1) == 'user_actions' ? 'active' : '' }}">
                <a href="{{ route('user_actions.index') }}">
                    <i class="fa fa-users"></i>
                    <span class="title">User actions</span>
                </a>
            </li>-->
            

           <!-- <li>
                <a href="# " onclick="$('#logout').submit();">
                   <i class="fa fa-users"></i>
                    <span class="title">Task Manager</span>
                </a>
            </li>
            
             <li>
                <a href="# " onclick="$('#logout').submit();">
                   <i class="fa fa-calendar"></i>
                    <span class="title">Calendar</span>
                </a>
            </li>
            
            <li>
                <a href="# " onclick="$('#logout').submit();">
                   <i class="fa fa-th"></i>
                    <span class="title">Forum</span>
                </a>
            </li>-->
            
             
            
            <!--<li>
                        <a href="#">
                            <i class="fa fa-archive"></i>
                             <span class="title">Repository</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                                <li class="{{ $request->segment(1) == 'dailyreports' ? 'active active-sub' : '' }}">
                                    <a href="#">
                                    <i class="fa fa-pencil-square-o"></i>
                                         <span class="title">
                                           Maintenance Agreement		
                                        </span>
                                    </a>
                                </li>
                                
                            <ul class="sub-sub-menu">
                                <li class="{{ $request->segment(1) == 'dailyreports' ? 'active active-sub' : '' }}">
                                    <a href="#">
                                    <i class="fa fa-credit-card"></i>
                                         <span class="title">
                                          Prepaid	
                                        </span>
                                    </a>
                                </li>
                                
                                <li class="{{ $request->segment(1) == 'dailyreports' ? 'active active-sub' : '' }}">
                                    <a href="#">
                                    <i class="fa fa-money"></i>
                                         <span class="title">
                                          Postpaid
                                        </span>
                                    </a>
                                </li>
                                
                             </ul>
                                 
                                <li class="{{ $request->segment(1) == 'category' ? 'active active-sub' : '' }}">
                                    <a href="{{ route('category.index') }}">
                                        <i class="fa fa-envelope-o"></i>
                                        <span class="title">
                                            Standard notices
                                        </span> 
                                    </a>
                                </li>
                                
                                
                                <ul class="sub-sub-menu">
                                <li class="{{ $request->segment(1) == 'dailyreports' ? 'active active-sub' : '' }}">
                                    <a href="#">
                                    <i class="fa fa-gavel"></i>
                                         <span class="title">
                                          Breakdown	
                                        </span>
                                    </a>
                                </li>
                                
                                <li class="{{ $request->segment(1) == 'dailyreports' ? 'active active-sub' : '' }}">
                                    <a href="#">
                                    <i class="fa fa-dot-circle-o"></i>
                                         <span class="title">
                                          Shut down
                                        </span>
                                    </a>
                                </li>
                                
                             </ul>
                                
                                
                                <li class="{{ $request->segment(1) == 'misreports' ? 'active active-sub' : '' }}">
                                    <a href="#">
                                      <i class="fa fa-user"></i>
                                         <span class="title">
                                            Manpower
                                        </span>
                                    </a>
                                </li>
                                
                                <li class="{{ $request->segment(1) == 'misreports' ? 'active active-sub' : '' }}">
                                    <a href="#">
                                      <i class="fa fa-hourglass-start"></i>
                                         <span class="title">
                                            Time & motion study	
                                        </span>
                                    </a>
                                </li>
                                <li class="{{ $request->segment(1) == 'misreports' ? 'active active-sub' : '' }}">
                                    <a href="#">
                                      <i class="fa fa-briefcase"></i>
                                         <span class="title">
                                            Audit Reports	
                                        </span>
                                    </a>
                                </li>
                                <li class="{{ $request->segment(1) == 'misreports' ? 'active active-sub' : '' }}">
                                    <a href="#">
                                      <i class="fa fa-building"></i>
                                         <span class="title">
                                            Club house Rationale		
                                        </span>
                                    </a>
                                </li>
                                <li class="{{ $request->segment(1) == 'misreports' ? 'active active-sub' : '' }}">
                                    <a href="#">
                                      <i class="fa fa-id-card-o"></i>
                                         <span class="title">
                                          Club House tariff card		
                                        </span>
                                    </a>
                                </li>
                                <li class="{{ $request->segment(1) == 'misreports' ? 'active active-sub' : '' }}">
                                    <a href="#">
                                      <i class="fa fa-cc-diners-club"></i>
                                         <span class="title">
                                           Additional rate card		
                                        </span>
                                    </a>
                                </li>
                                
                                <li class="{{ $request->segment(1) == 'misreports' ? 'active active-sub' : '' }}">
                                    <a href="#">
                                      <i class="fa fa-user"></i>
                                         <span class="title">
                                          Fire sprinkler modification NOC	
                                        </span>
                                    </a>
                                </li>
                                
                                <li class="{{ $request->segment(1) == 'misreports' ? 'active active-sub' : '' }}">
                                    <a href="#">
                                      <i class="fa fa-list-alt"></i>
                                         <span class="title">
                                          Move in/ out checklist		
                                        </span>
                                    </a>
                                </li>
                                <li class="{{ $request->segment(1) == 'misreports' ? 'active active-sub' : '' }}">
                                    <a href="#">
                                      <i class="fa fa-list-ol"></i>
                                         <span class="title">
                                           Vacation Checklist			
                                        </span>
                                    </a>
                                </li>
                                 </ul>
                        </li>-->
            
            
            
                 <!--<li>
                        <a href="#">
                            <i class="fa fa-braille"></i>
                             <span class="title">Security</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                                <li class="{{ $request->segment(1) == 'dailyreports' ? 'active active-sub' : '' }}">
                                    <a href="#">
                                    <i class="fa fa-file-text-o"></i>
                                         <span class="title">
                                          Resident data sheet
                                        </span>
                                    </a>
                                </li>
                                
                                <li class="{{ $request->segment(1) == 'category' ? 'active active-sub' : '' }}">
                                    <a href="{{ route('category.index') }}">
                                        <i class="fa fa-car"></i>
                                        <span class="title">
                                             Car stickers 
                                        </span> 
                                    </a>
                                </li>
                           </ul>
                    </li>-->
                    
                    
                     <!--<li>
                        <a href="#">
                            <i class="fa fa-pagelines"></i>
                             <span class="title">Horticulture</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                                <li class="{{ $request->segment(1) == 'dailyreports' ? 'active active-sub' : '' }}">
                                    <a href="#">
                                    <i class="fa fa-renren"></i>
                                         <span class="title">
                                          Zone wise species
                                        </span>
                                    </a>
                                </li>
                                
                                <li class="{{ $request->segment(1) == 'category' ? 'active active-sub' : '' }}">
                                    <a href="{{ route('category.index') }}">
                                        <i class="fa fa-universal-access"></i>
                                        <span class="title">
                                             Activity schedule
                                        </span> 
                                    </a>
                                </li>
                           </ul>
                    </li>-->
            
            
               <!--<li>
                        <a href="#">
                            <i class="fa fa-hdd-o"></i>
                             <span class="title">Stores</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                                <li class="{{ $request->segment(1) == 'dailyreports' ? 'active active-sub' : '' }}">
                                    <a href="#">
                                    <i class="fa fa-database"></i>
                                         <span class="title">
                                          PR data
                                        </span>
                                    </a>
                                </li>
                                
                                <li class="{{ $request->segment(1) == 'category' ? 'active active-sub' : '' }}">
                                    <a href="{{ route('category.index') }}">
                                        <i class="fa fa-calendar-check-o"></i>
                                        <span class="title">
                                            Goods Recived Note Date
                                        </span> 
                                    </a>
                                </li>
                           </ul>
                    </li>-->
                    
                     <!--<li>
                        <a href="#">
                            <i class="fa fa-line-chart"></i>
                             <span class="title">Training & Devlopment</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                                <li class="{{ $request->segment(1) == 'dailyreports' ? 'active active-sub' : '' }}">
                                    <a href="#">
                                    <i class="fa fa-lock"></i>
                                         <span class="title">
                                         Security
                                        </span>
                                    </a>
                                </li>
                                
                                <li class="{{ $request->segment(1) == 'category' ? 'active active-sub' : '' }}">
                                    <a href="{{ route('category.index') }}">
                                        <i class="fa fa-edge"></i>
                                        <span class="title">
                                            Engineering
                                        </span> 
                                    </a>
                                </li>
                                
                                <li class="{{ $request->segment(1) == 'category' ? 'active active-sub' : '' }}">
                                    <a href="{{ route('category.index') }}">
                                        <i class="fa fa-id-badge"></i>
                                        <span class="title">
                                            Soft services
                                        </span> 
                                    </a>
                                </li> 
                                <li class="{{ $request->segment(1) == 'category' ? 'active active-sub' : '' }}">
                                    <a href="{{ route('category.index') }}">
                                        <i class="fa fa-fire-extinguisher"></i>
                                        <span class="title">
                                            Fire Safety
                                        </span> 
                                    </a>
                                </li>
                                 <li class="{{ $request->segment(1) == 'category' ? 'active active-sub' : '' }}">
                                    <a href="{{ route('category.index') }}">
                                        <i class="fa fa-adn"></i>
                                        <span class="title">
                                            HR & Admin
                                        </span> 
                                    </a>
                                </li>
                                 <li class="{{ $request->segment(1) == 'category' ? 'active active-sub' : '' }}">
                                    <a href="{{ route('category.index') }}">
                                        <i class="fa fa-envira"></i>
                                        <span class="title">
                                          Horticulture
                                        </span> 
                                    </a>
                                </li>
                           </ul>
                    </li>-->
            
            
            
                   <!--<li>
                        <a href="#">
                            <i class="fa fa-gears"></i>
                             <span class="title">Settings</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                                <li class="{{ $request->segment(1) == 'dailyreports' ? 'active active-sub' : '' }}">
                                    <a href="#">
                                    <i class="fa fa-calculator"></i>
                                         <span class="title">
                                          Engineering Calculations
                                        </span>
                                    </a>
                                </li>
                                
                                <li class="{{ $request->segment(1) == 'category' ? 'active active-sub' : '' }}">
                                    <a href="{{ route('category.index') }}">
                                        <i class="fa fa-money"></i>
                                        <span class="title">
                                            Categories 
                                        </span> 
                                    </a>
                                </li>
                                
                                <li class="{{ $request->segment(1) == 'misreports' ? 'active active-sub' : '' }}">
                                    <a href="#">
                                      <i class="fa fa-user"></i>
                                         <span class="title">
                                            My Profile
                                        </span>
                                    </a>
                                </li>
                                
                                 
                                
                                </ul>
                    </li>-->
            
             <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">Logout</span>
                </a>
            </li>
              
        </ul>
        <!--<div class="animation-text">
        	Assures Quality<br />&amp;<br />Safe Living
        </div>-->
        <!--<div class="side-logo">
            <img src="/images/Logo-aparna.png" />
        </div>-->
    </div>
</div>

{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
        <button type="submit">Logout</button>
    {!! Form::close() !!}
<!--{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">Logout</button>
{!! Form::close() !!}-->