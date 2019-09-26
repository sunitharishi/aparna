@inject('request', 'Illuminate\Http\Request')
<div class="page-header-inner">
    <div class="page-header-innerin">
        <div class="navbar-header">
            <a href="{{ url('/dashboard') }}"
               class="navbar-brand">
                <img src="/images/logo-new.png" style="margin:0 auto;" />
            </a>
        </div>
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
		<?php /*?><div class="head-datetime">
		<b style="margin:0px 10px 0px 0px;">IP Address:</b> <?php   echo $_SERVER['REMOTE_ADDR'];  ?>
        
       <?php  date_default_timezone_set('Asia/Calcutta'); ?>
	   
	   
	   <b style="margin:0px 8px 0px 10px;">Date:</b> <?php echo  date("F j, Y"); ?>
	   
	   <b style="margin:0px 6px 0px 10px;">Time:</b> <?php echo  date("g:i a") ?>
        </div><?php */?> 
         
 
        
		<div class="login-info"> 
        	<div class="auth-infodetails">
             @if(Auth::user()->id == 1)
				<a href="#" onclick="myFunction()"> <span><h3>Welcome, Ambika Prasad</h3>Logged in as Admin</span> <img src="/images/ambika.jpg" /></a>
				@else
				<a href="#" onclick="myFunction()"> <span><h3>Welcome, <?php echo Auth::user()->name; ?></h3>Logged in as <?php echo getrolename(Auth::user()->role_id) ?></span> <img src="/userprofile.jpg" /></a>
             @endif        
            </div> 
		</div>
        <div class="top-menu">
        <div class="page-sidebar-wrapper">
        <div class="page-sidebar navbar-collapse collapse">
               <div class="logotext"><a href="{{ url('/dashboard') }}"><img src="/images/logo-txt.png" /></a></div>
               <ul class="page-sidebar-menu"
                data-keep-expanded="false"
                data-auto-scroll="true"
                data-slide-speed="200">
             	@if(getlogperms('add_site') || getlogperms('edit_site') || getlogperms('view_site') || getlogperms('delete_site'))<li class="">
                    <a href="{{ route('sites.index') }}"><span class="title">Communities</span></a>  
                </li>
                @endif
                @if(getlogperms('view_template') || getlogperms('delete_template') || getlogperms('edit_template') || getlogperms('add_template') || getlogperms('add_asset') || getlogperms('edit_asset') || getlogperms('delete_asset') ||  getlogperms('view_asset') || getlogperms('view_site_asset') )   
             	<li class=""> 
                    <a href="javascript:void(0)"><span class="title">Assets</span><span class="fa arrow"></span></a>
                    <ul class="sub-menu">
                     @if(getlogperms('add_asset'))<li class="">
                        <li class="">
                    		<a href="{{ route('assets.create') }}"><i class="fa fa-building"></i> <span class="title">New Asset</span></a>
                        </li>
                         @endif   
                           @if(getlogperms('view_asset') || getlogperms('delete_asset') || getlogperms('edit_asset'))           
                        <li class="">
                    		<a href="{{ route('assets.index') }}"><i class="fa fa-list"></i> <span class="title">List</span></a>
                        </li>
                        @endif   
                        @if(getlogperms('view_site_asset'))
                        <li class="">
                        <a href="{{ route('commassets.index') }}"><i class="fa fa-list"></i> <span class="title">Community Assets</span></a>
                        </li>
                        @endif
                         @if(getlogperms('view_template') || getlogperms('delete_template') || getlogperms('edit_template') || getlogperms('add_template'))   
                        <li class="">
                    		<a href="{{ route('asset-templates.index') }}"><i class="fa fa-columns"></i> <span class="title">Templates</span></a>
                        </li>   
                         @endif  
                         
                           <li class="">
                    		<a href="{{ route('amc.index') }}"><i class="fa fa-columns"></i> <span class="title">PPM</span></a>
                        </li>   
						 @if(getlogperms('add_asset'))<li class="">
                        <li class="">
                    		<a href="{{ route('items.index') }}"><i class="fa fa-building"></i> <span class="title">Items</span></a>
                        </li>
                         @endif                   
                  </ul>
                </li>  
                     @endif 
                     
                       @if(Auth::user()->id == 1)
                
                <li>
                    <a href="javascript:void(0)"><span class="title">Reports</span><span class="fa arrow"></span></a>
                    <ul class="sub-menu">
                       
                     @if(getlogperms('edit_firesafety') || getlogperms('print_fire_safety') || getlogperms('view_fire_safety') || getlogperms('download_fire_safety') || getlogperms('edit_pms') || getlogperms('print_pms') || getlogperms('view_pms') || getlogperms('download_pms') || getlogperms('edit_fms') || getlogperms('print_fms') || getlogperms('view_fms') || getlogperms('download_fms') || getlogperms('edit_security') || getlogperms('view_security') || getlogperms('print_security') || getlogperms('download_security') ) 
                        <li class="">   
                            <a href="{{ route('dailyreports.index') }}"><i class="fa fa-money"></i> <span class="title">Daily Reports</span></a>
                        </li>  
                        @endif    
                        @if(getlogperms('edit_metro_water_report') || getlogperms('print_metro_water_report') || getlogperms('view_metro_water_report') || getlogperms('download_metro_water_report') || getlogperms('edit_water_source_consump') || getlogperms('print_water_source_consump') || getlogperms('view_water_source_consump') || getlogperms('download_water_source_consump') || getlogperms('edit_borewell_not_work_Status') || getlogperms('print_borewell_not_work_Status') || getlogperms('view_borewell_not_work_Status') || getlogperms('download_borewell_not_work_Status') || getlogperms('edit_fire_safety_status') || getlogperms('print_fire_safety_status') || getlogperms('view_fire_safety_status') || getlogperms('download_fire_safety_status') || getlogperms('edit_electro_mech_equip_status') || getlogperms('print_electro_mech_equip_status') || getlogperms('view_electro_mech_equip_status') || getlogperms('download_electro_mech_equip_status') || getlogperms('edit_stp_status') || getlogperms('view_stp_status') || getlogperms('print_stp_status') || getlogperms('download_stp_status') || getlogperms('edit_wasp_status') || getlogperms('print_wasp_status') || getlogperms('view_wasp_status') || getlogperms('download_wasp_status') || getlogperms('edit_security_report') || getlogperms('print_security_report') || getlogperms('view_security_report') || getlogperms('download_security_report') || getlogperms('edit_housekeeping_report') || getlogperms('print_housekeeping_report') ||     getlogperms('view_housekeeping_report') || getlogperms('download_housekeeping_report') || getlogperms('edit_horticulture_report') || getlogperms('print_horticulture_report') || getlogperms('view_horticulture_report') || getlogperms('download_horticulture_report') || getlogperms('edit_club_house_util') || getlogperms('print_club_house_util') || getlogperms('view_club_house_util') || getlogperms('download_club_house_util') || getlogperms('edit_occupancy_data') || getlogperms('print_occupancy_data') || getlogperms('view_occupancy_data') || getlogperms('download_occupancy_data') || getlogperms('edit_indented_material') || getlogperms('print_indented_material') || getlogperms('view_indented_material') || getlogperms('download_indented_material') || getlogperms('edit_apna_complex_compl') || getlogperms('print_apna_complex_compl') || getlogperms('view_apna_complex_compl') || getlogperms('download_apna_complex_compl') || getlogperms('edit_firemock_drill') || getlogperms('print_firemock_drill') || getlogperms('view_firemock_drill') || getlogperms('download_firemock_drill'))      
                        <li class="">
                            <a href="{{ route('misreports.index') }}"><i class="fa fa-server"></i> <span class="title">MIS Reports</span></a>
                        </li>
						
						 <li class="">
                            <a href="/advancedindex"><i class="fa fa-server"></i> <span class="title">Advanced Reports</span></a>
                        </li>
                          @endif 
                          @if(getlogperms('valid_firesafety') || getlogperms('valid_fms') || getlogperms('valid_pms') || getlogperms('valid_security') ) 
                         <li class="">
                            <a href="{{ route('reportvalidation.index') }}"><i class="fa fa-money"></i> <span class="title">Report Validation</span></a>
                        </li>
                          @endif   
                     </ul>       
                  </li>
                   @else
                   
                  
                     @if(getlogperms('edit_firesafety') || getlogperms('print_fire_safety') || getlogperms('view_fire_safety') || getlogperms('download_fire_safety') || getlogperms('edit_pms') || getlogperms('print_pms') || getlogperms('view_pms') || getlogperms('download_pms') || getlogperms('edit_fms') || getlogperms('print_fms') || getlogperms('view_fms') || getlogperms('download_fms') || getlogperms('edit_security') || getlogperms('view_security') || getlogperms('print_security') || getlogperms('download_security') ) 
                        <li class="">   
                            <a href="{{ route('dailyreports.index') }}"><i class="fa fa-money"></i> <span class="title">Daily Reports</span></a>
                        </li>  
                        @endif    
                        @if(getlogperms('edit_metro_water_report') || getlogperms('print_metro_water_report') || getlogperms('view_metro_water_report') || getlogperms('download_metro_water_report') || getlogperms('edit_water_source_consump') || getlogperms('print_water_source_consump') || getlogperms('view_water_source_consump') || getlogperms('download_water_source_consump') || getlogperms('edit_borewell_not_work_Status') || getlogperms('print_borewell_not_work_Status') || getlogperms('view_borewell_not_work_Status') || getlogperms('download_borewell_not_work_Status') || getlogperms('edit_fire_safety_status') || getlogperms('print_fire_safety_status') || getlogperms('view_fire_safety_status') || getlogperms('download_fire_safety_status') || getlogperms('edit_electro_mech_equip_status') || getlogperms('print_electro_mech_equip_status') || getlogperms('view_electro_mech_equip_status') || getlogperms('download_electro_mech_equip_status') || getlogperms('edit_stp_status') || getlogperms('view_stp_status') || getlogperms('print_stp_status') || getlogperms('download_stp_status') || getlogperms('edit_wasp_status') || getlogperms('print_wasp_status') || getlogperms('view_wasp_status') || getlogperms('download_wasp_status') || getlogperms('edit_security_report') || getlogperms('print_security_report') || getlogperms('view_security_report') || getlogperms('download_security_report') || getlogperms('edit_housekeeping_report') || getlogperms('print_housekeeping_report') ||     getlogperms('view_housekeeping_report') || getlogperms('download_housekeeping_report') || getlogperms('edit_horticulture_report') || getlogperms('print_horticulture_report') || getlogperms('view_horticulture_report') || getlogperms('download_horticulture_report') || getlogperms('edit_club_house_util') || getlogperms('print_club_house_util') || getlogperms('view_club_house_util') || getlogperms('download_club_house_util') || getlogperms('edit_occupancy_data') || getlogperms('print_occupancy_data') || getlogperms('view_occupancy_data') || getlogperms('download_occupancy_data') || getlogperms('edit_indented_material') || getlogperms('print_indented_material') || getlogperms('view_indented_material') || getlogperms('download_indented_material') || getlogperms('edit_apna_complex_compl') || getlogperms('print_apna_complex_compl') || getlogperms('view_apna_complex_compl') || getlogperms('download_apna_complex_compl') || getlogperms('edit_firemock_drill') || getlogperms('print_firemock_drill') || getlogperms('view_firemock_drill') || getlogperms('download_firemock_drill'))      
                        <li class="">
                            <a href="{{ route('misreports.index') }}"><i class="fa fa-server"></i> <span class="title">MIS Reports</span></a>
                        </li>
                          @endif 
                          @if(getlogperms('valid_firesafety') || getlogperms('valid_fms') || getlogperms('valid_pms') || getlogperms('valid_security') ) 
                         <li class="">
                            <a href="{{ route('reportvalidation.index') }}"><i class="fa fa-money"></i> <span class="title">Report Validation</span></a>
                        </li>
                          @endif        
                   
                   
                    @endif 
                    
                    
                    
                   @if(getlogperms('add_emp') || getlogperms('edit_emp') || getlogperms('view_emp') || getlogperms('delete_emp') || getlogperms('add_user') || getlogperms('edit_user') || getlogperms('view_user') || getlogperms('delete_user') || getlogperms('permission_add') || getlogperms('permission_edit') || getlogperms('permission_view') || getlogperms('permission_delete') )
                  <li>  
                    <a href="javascript:void(0)"><span class="title">User Management</span><span class="fa arrow"></span></a>                    
                    <ul class="sub-menu">
                     @if(getlogperms('add_emp') || getlogperms('edit_emp') || getlogperms('view_emp') || getlogperms('delete_emp'))<li class="">
                         <li class="">
                          <a href="{{ route('emps.index') }}"><i class="fa fa-users"></i> <span class="title">Employees</span></a>
                          </li>
                          
                          @endif 
                           @if(getlogperms('add_user') || getlogperms('edit_user') || getlogperms('view_user') || getlogperms('delete_user'))
                          <li class="">
                            <a href="{{ route('users.index') }}"><i class="fa fa-sign-in"></i> <span class="title">Logins</span></a>
                          </li> 
                           @endif 
                            @if(getlogperms('permission_add') || getlogperms('permission_edit') || getlogperms('permission_view') || getlogperms('permission_delete'))
                        <li class="">
                            <a href="{{ route('roles.index') }}"><i class="fa fa-key"></i> <span class="title">Login Authorization</span></a>
                        </li>
                         @endif 
                   </ul>
                </li>
                @endif        
                 @if(getlogperms('delete_task') || getlogperms('view_task') || getlogperms('add_task') || getlogperms('edit_task'))                 
      			<li class="">
                    <a href="{{ route('tasks.index') }}"><span class="title">Task Manager</span></a>
                   <!-- <ul class="sub-menu">
                         <li class="">
                          <a href="{{ route('tasks.index') }}"><i class="fa fa-tasks"></i> <span class="title">Tasks</span></a>
                         </li>
                         <li class="">
                          <a href="#"><i class="fa fa-folder-open-o" aria-hidden="true"></i> <span class="title">Activity</span></a>
                         </li>
                         <li class="">
                          <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> <span class="title">Timelog</span></a>
                         </li>
                         <li class="">
                          <a href="#"><i class="fa fa-file-text-o"></i> <span class="title">Files</span></a>
                         </li>
                         <li class="">
                          <a href="#"><i class="fa fa-search"></i> <span class="title">Search</span></a>
                         </li>
                   </ul>-->
                </li> 
                	<li class="">
                    <a href="{{ route('forums.index') }}"><span class="title">Forums</span></a>
                </li> 
                 @endif 
                  @if(getlogperms('add_meetup') || getlogperms('view_meetup') || getlogperms('add_meetup') || getlogperms('edit_meetup')) 
                <li class="">
                    <a href="{{ route('meetups.index') }}"><span class="title">MOM</span></a>
                </li>  
                @endif              
                </ul>         
                <ul class="hmsl">
                	<li><a href="{{ url('/dashboard') }}" title="Home"><i class="fa fa-home"></i></a></li>
                    <li><a href="/calendar" title="Calendar"><i class="fa fa-calendar" aria-hidden="true"></i></a></li>
                    <li><a href="#" title="Profile"><i class="fa fa-user"></i></a></li>
                    <li class="setting-dropdown">
                    	<a href="#" class="seting" title="Settings"><i class="fa fa-cog" aria-hidden="true"></i></a>
                       <!-- <ol style="display:none;">
                            
                        	 @if(Auth::user()->id == 1)<li> <a href="{{ route('category.index') }}">Categories</a></li>@endif
                        	<li><a href="#">Setting two</a></li>
                        	<li><a href="#">Setting three</a></li>
                        </ol>-->  
                    </li>
                    <li><a href="#logout" onclick="$('#logout').submit();" title="Logout"><i class="fa fa-power-off"></i></a></li>
                </ul>
                </div>
            </div>
        </div>
    </div>
	{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
        <button type="submit">Logout</button>
    {!! Form::close() !!}
</div>
<script>
function myFunction() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";  
    }
}
</script>