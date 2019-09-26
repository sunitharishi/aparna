<div class="page-header-inner">

    <div class="page-header-innerin">

        <div class="navbar-header">

            <a href="{{ url('/dashboard') }}"

               class="navbar-brand">

                <img src="/images/apms-logo.png" style="margin:0 auto;" />

            </a>

        </div>

       

		<?php /*?><div class="head-datetime">

		<b style="margin:0px 10px 0px 0px;">IP Address:</b> <?php   echo $_SERVER['REMOTE_ADDR'];  ?>

        

       <?php  date_default_timezone_set('Asia/Calcutta'); ?>

	   

	   

	   <b style="margin:0px 8px 0px 10px;">Date:</b> <?php echo  date("F j, Y"); ?>

	   

	   <b style="margin:0px 6px 0px 10px;">Time:</b> <?php echo  date("g:i a") ?>

        </div><?php */?> 

         

 

        

		<div class="login-info"> 

        	<div class="auth-infodetails">

             @if(Auth::user()->id == 1)

				<a href="#" onClick="myFunction()"> <span><h3>Welcome, Ambika Prasad</h3>Logged in as Admin</span> <img src="/images/ambika.jpg" /></a>

				@else

				<a href="#" onClick="myFunction()"> <span><h3>Welcome, <?php echo Auth::user()->name; ?></h3>Logged in as <?php echo getrolename(Auth::user()->role_id) ?></span> <img src="/userprofile.jpg" /></a>

             @endif        

            </div> 

		</div>

        <div class="top-menu">

           <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>

        <div class="page-sidebar-wrapper">

        <div class="page-sidebar navbar-collapse collapse">

              <!-- <div class="logotext"><a href="{{ url('/dashboard') }}"><img src="/images/logo-txt.png" /></a></div>-->

               <ul class="page-sidebar-menu"

                data-keep-expanded="false"

                data-auto-scroll="true"

                data-slide-speed="200">

                

                 <?php /*?> <li class="middle-adding-list"><a href="{{ url('/dashboard') }}"><!--<i class="fa fa-home"></i>-->Home</a></li><?php */?>

                

                <li><a href="{{ url('/dashboard') }}" title="Home"><i class="fa fa-home" style="color:#FFFFFF; font-size:30px;padding:13px 0px;"></i></a></li>

               <?php /*?> <li class="">

                    <a href="{{ url('/dashboard') }}"><span class="title">Dashboard</span></a>  

                </li><?php */?>

             	@if(getlogperms('add_site') || getlogperms('edit_site') || getlogperms('view_site') || getlogperms('delete_site'))<li class="">

                    <a href="{{ route('sites.index') }}"><span class="title">Communities</span></a>  

                </li>

                @endif

                @if(getlogperms('view_template') || getlogperms('delete_template') || getlogperms('edit_template') || getlogperms('add_template') || getlogperms('add_asset') || getlogperms('edit_asset') || getlogperms('delete_asset') ||  getlogperms('view_asset') || getlogperms('view_site_asset') )   

             	<li class=""> 

                    <a href="javascript:void(0)"><span class="title">Assets</span><span class="fa arrow"></span></a>

                    <ul class="sub-menu">

                   <!--  @if(getlogperms('add_asset'))<li class="">

                        <li class="">

                    		<a href="{{ route('assets.create') }}"><i class="fa fa-building"></i> <span class="title">New Asset</span></a>

                        </li>

                         @endif   -->

                           @if(getlogperms('view_asset') || getlogperms('delete_asset') || getlogperms('edit_asset'))           

                        <li class="">

                    		<a href="{{ route('assets.index') }}"><i class="fa fa-building"></i> <span class="title">Overview</span></a>

                        </li>

                        @endif   

                        @if(getlogperms('view_site_asset'))

                        <li class="">

                        <a href="{{ route('commassets.index') }}"><i class="fa fa-list"></i> <span class="title">Community Assets</span></a>

                        </li>

                        @endif

						@if(getlogperms('view_site_asset'))

                        <li class="">

                        <a href="{{ route('aparnaassets.index') }}"><i class="fa fa-list"></i> <span class="title">Aparna Assets</span></a>

                        </li>

                        @endif

                        @if(getlogperms('view_template') || getlogperms('delete_template') || getlogperms('edit_template') || getlogperms('add_template'))   

                        <li class="">

                    		<a href="{{ route('asset-templates.index') }}"><i class="fa fa-columns"></i> <span class="title">Templates</span></a>

                        </li>   

                         @endif  

                        <li class="">

                            <a href="{{ route('asset-types.index') }}"><i class="fa fa-columns"></i> <span class="title">Asset Types</span></a>

                        </li>

                         

                           <li class="">

                    		<a href="{{ route('amc.index') }}"><i class="fa fa-calendar" aria-hidden="true"></i> <span class="title">PPM</span></a>

                        </li>   

						 @if(getlogperms('add_asset'))<li class="">

                        <li class="">

                    		<a href="{{ route('items.index') }}"><i class="fa fa-file-text-o"></i> <span class="title">Items</span></a>

                        </li>

                         @endif   

                         

                         @if(getlogperms('add_asset'))<li class="">

                        <li class="">

                    		<a href="{{ route('otherassets.index') }}"><i class="fa fa-file-text-o"></i> <span class="title">Other Assets</span></a>

                        </li>

                         @endif  

                        

                        <li class="">

                    		<a href="{{ route('commassets.report') }}"><i class="fa fa-file-text-o"></i> <span class="title">Asset Reports</span></a>

                        </li>                

                  </ul>

                </li>  

                     @endif 

                

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

                            <a href="{{ route('misreports.index') }}"><i class="fa fa-file-text-o" aria-hidden="true"></i> <span class="title">MIS Reports</span></a>

                        </li>

						

						 <li class="">

                            <a href="/advancedindex"><i class="fa fa-file" aria-hidden="true"></i> <span class="title">Advanced Reports</span></a>

                        </li>

						<li class="">

                            <a href="/advanceddailyindex"><i class="fa fa-file-text-o" aria-hidden="true"></i> <span class="title">Audit Reports</span></a>

                        </li>

						<li class="">

                            <a href="{{ route('indents.index') }}"><i class="fa fa-newspaper-o" aria-hidden="true"></i> <span class="title">Indent Reports</span></a>

                        </li>

                          @endif  

                          @if(getlogperms('valid_firesafety') || getlogperms('valid_fms') || getlogperms('valid_pms') || getlogperms('valid_security') ) 

                         <li class="">

                            <a href="{{ route('reportvalidation.index') }}"><i class="fa fa-check-square-o" aria-hidden="true"></i> <span class="title">Report Validation</span></a>

                        </li>

						<li class="">

                            <a href="{{ route('mmr.main') }}"><i class="fa fa-check-square-o" aria-hidden="true"></i> <span class="title">MMR</span></a>

                        </li>

                         @endif  

						<li class="">

                            <a href="/horticultures"><i class="fa fa-check-square-o" aria-hidden="true"></i> <span class="title">Horticulture</span></a>

                        </li>

                        

                     </ul>       

                  </li>

                <li class="">

                     <a href="javascript:void(0)"><span class="title">FireSafety</span><span class="fa arrow"></span></a>

					<ul class="sub-menu">
                        <li class="">
                            <a href="#"><span class="title">NOC</span></a>
                        </li>
						<li class="">
                            <a href="#"><span class="title">Work Permits</span></a>
                        </li>
                        <li class="">
                        	<a href="javascript:void(0)"><span class="title">Fire Drills</span><span class="fa arrow right-side-arrow"></span></a>
							<ul class="sub-menu sub-menu-right" style="z-index:1;">
                                <li class="">
                                    <a href="#"><span class="title">NOC</span></a>
                                </li>
                                <li class="">
                                    <a href="#"><span class="title">Work Permits</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="">
                        	<a href="javascript:void(0)"><span class="title">Annual Report</span><span class="fa arrow right-side-arrow"></span></a>
							<ul class="sub-menu sub-menu-right" style="z-index:1;">
                                <li class="">
                                    <a href="#"><span class="title">NOC</span></a>
                                </li>
                                <li class="">
                                    <a href="#"><span class="title">Work Permits</span></a>
                                </li>
                            </ul>
                        </li>
                     </ul>
                </li> 

                <li class="">

                    <a href="javascript:void(0)"><span class="title">Stores</span><span class="fa arrow"></span></a>

                    <ul class="sub-menu">                    

                        <li class="">

                            <a href="#"><span class="title">Items</span></a>

                        </li>

						<li class="">

                            <a href="#"><span class="title">Stocks</span></a>

                        </li>

                        <li class="">

                            <a href="#"><span class="title">Indents</spa></a>

                            

                        </li>

                        <li class="">

                            <a href="#"><span class="title">Others</spa></a>

                            

                        </li>

                   </ul>

                </li>

      			

				<li class="">

                    <a href="javascript:void(0)"><span class="title">Budgets</span><span class="fa arrow"></span></a>

					<ul class="sub-menu">                    

                        <li class="">

                            <a href="#"><span class="title">Capex</span></a>

                        </li>

						<li class="">

                            <a href="#"><span class="title">Opex</span></a>

                        </li>

                   </ul>

                </li>

				<li class="">

                    <a href="javascript:void(0)"><span class="title">Transition</span><span class="fa arrow"></span></a>

                    <ul class="sub-menu">                    

                         

                        <li class="">

                            <a href="/snagindex"><span class="title">Snag Reports</span></a>

                        </li>

						

						<li class="">

                            <a href="#"><span class="title">HOTO</span></a>

                        </li>

                        <li class="">

                            <a href="#"><span class="title">Statutory Report</span></a>

                        </li>

                   </ul>

                </li>

				 @if(getlogperms('add_emp') || getlogperms('edit_emp') || getlogperms('view_emp') || getlogperms('delete_emp') || getlogperms('add_user') || getlogperms('edit_user') || getlogperms('view_user') || getlogperms('delete_user') || getlogperms('permission_add') || getlogperms('permission_edit') || getlogperms('permission_view') || getlogperms('permission_delete') )

                  <li>  

                    <a href="javascript:void(0)"><span class="title">HRM</span><span class="fa arrow"></span></a>                    

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

                

                <li class="">

                   <!-- <a href="{{ route('tasks.index') }}"><span class="title">Work Planner</span></a>-->

				    <a href="javascript:void(0)"><span class="title">Work Planner</span><span class="fa arrow"></span></a> 

                    <ul class="sub-menu">

                         <?php /*?><li class=""> 

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

                         </li><?php */?>

						@if(getlogperms('delete_task') || getlogperms('view_task') || getlogperms('add_task') || getlogperms('edit_task'))  

						<li class="">

							<a href="/tplancalendar"><span class="title">Task Manager</span></a>

						</li>  

						@endif 

						@if(getlogperms('add_meetup') || getlogperms('view_meetup') || getlogperms('add_meetup') || getlogperms('edit_meetup')) 

						<li class="">

							<a href="{{ route('meetups.index') }}"><span class="title">MOM</span></a>

						</li>  

						@endif 

                   </ul>

                </li>				

                <li class="">

					<a href="javascript:void(0)"><span class="title">Forums</span><span class="fa arrow"></span></a>

					<ul class="sub-menu">                    

                        <li class="">

                            <a href="{{ route('forums.index') }}"><span class="title">Discussion Forum</span></a>

                        </li>

						<li class="">

                            <a href="#"><span class="title">Notice Board</span></a>

                        </li>

						<li class="">

                            <a href="#"><span class="title">Best Practices</span></a>

                        </li>

						<li class="">

                            <a href="#"><span class="title">Eyesore</span></a>

                        </li>

                   </ul>

                </li> 

                

				<li class="">

                    <a href="#"><span class="title">T&D </span></a>

                </li> 

                    <li class="middle-adding-list"><a href="/calendar" ><!--<i class="fa fa-calendar" aria-hidden="true"></i>-->Calendar</a></li>

                    <li class="middle-adding-list"><a href="#" ><!--<i class="fa fa-user"></i>-->User</a></li>

                    <li class="setting-dropdown middle-adding-list">

					@if(Auth::user()->id == 1)

                    	<a href="/daylocktime" class="seting"><!--<i class="fa fa-cog" aria-hidden="true"></i>-->Settings</a>

						@else

						<a href="#" class="seting"><!--<i class="fa fa-cog" aria-hidden="true"></i>-->Settings</a>

					@endif  

					

                       <!-- <ol style="display:none;">

                            

                        	 @if(Auth::user()->id == 1)<li> <a href="{{ route('category.index') }}">Categories</a></li>@endif

                        	<li><a href="#">Setting two</a></li>

                        	<li><a href="#">Setting three</a></li>

                        </ol>-->  

                    </li>

                    <li class="middle-adding-list"><a href="#logout" onClick="$('#logout').submit();" ><!--<i class="fa fa-power-off"></i>-->Logout</a></li>             

                </ul>         

                <ul class="hmsl">

                	<?php /*?><li><a href="{{ url('/dashboard') }}" title="Home"><i class="fa fa-home"></i></a></li>

                    <li><a href="/calendar" title="Calendar"><i class="fa fa-calendar" aria-hidden="true"></i></a></li><?php */?>

                    <li><a href="#" title="Profile"><i class="fa fa-user"></i></a></li>

                    <li class="setting-dropdown">

					@if(Auth::user()->id == 1)

                    	<a href="/daylocktime" class="seting" title="Settings"><i class="fa fa-cog" aria-hidden="true"></i></a>

						@else

						<a href="#" class="seting" title="Settings"><i class="fa fa-cog" aria-hidden="true"></i></a>

					@endif  

					

                       <!-- <ol style="display:none;">

                            

                        	 @if(Auth::user()->id == 1)<li> <a href="{{ route('category.index') }}">Categories</a></li>@endif

                        	<li><a href="#">Setting two</a></li>

                        	<li><a href="#">Setting three</a></li>

                        </ol>-->  

                    </li>

                    <li><a href="#logout" onClick="$('#logout').submit();" title="Logout"><i class="fa fa-power-off"></i></a></li>

                </ul>

                </div>

            </div>

        </div>

    </div>

	{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}

        <button type="submit">Logout</button>

    {!! Form::close() !!}

</div>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>

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