
    <link href="/vendors1/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">  
    <!-- Font Awesome -->
    <link href="/vendors1/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
   <!-- <link href="vendors1/nprogress/nprogress.css" rel="stylesheet">-->
    <!-- iCheck -->
    <!--<link href="vendors1/iCheck/skins/flat/green.css" rel="stylesheet">-->
	
    <!-- bootstrap-progressbar -->
    <link href="/vendors1/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
   <!-- <link href="vendors1/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>-->
    <!-- bootstrap-daterangepicker -->
    <!--<link href="vendors1/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">-->

    <!-- Custom Theme Style -->
    <link href="/build/css/custom.css" rel="stylesheet">

	<link rel="stylesheet" href="/dist/tablesaw.css"> 
	<link rel="stylesheet" href="/demo/demo.css">
	<link rel="stylesheet" href="//filamentgroup.github.io/demo-head/demohead.css">
    <style>
	.manjeera table tr th 
	{
	padding:5px;
	font-size:11px;
	}
	.manjeera table tr td 
	{
	padding:5px;
	font-size:11px;
	}
 	.manjeera
	{
	font-size:11px;
	}
	.x_title
	{
	border-bottom:none;
	padding:0px;
	margin:0px;
	}
	.borewell
	{
	margin-left:30px;
	}
	.docs-main
	{
	max-width:100%;
		 margin:0px;
	}
	.tablesaw-bar
	{
	height: 30px;
    display: block;
    padding-bottom: 11px;
    margin-bottom: 10px;
	}
	.communityinpu tr td input 
	{
	width:100%;
	 font-size:11px;
 	}
	.docs-main h3 
	{
	margin-bottom:25px;
	margin-top:10px;
 	}
 	.tablesaw-bar
	{
	height:30px;
	}
	.manjeera span
	{
	color:#041586;
	font-weight:bold;
	}
	.x_panel.deeeetails
	{
	 border:0px;
	 padding:0px;
	}
	.text-center
	{
	 text-align:center;
	}
	</style>

<div class="col-sm-12 col-md-12 col-xs-12" style="padding-left:0px;padding-right:0px;">
              <div class="x_panel tile fixed_height_400 deeeetails">
                <div class="x_title">
                   <!--<h3>Metro Water Supply details from  01.12.2017 to 31.12.2017</h3>-->
                </div>
                <div class="x_content housesco212">
    
	<div class="docs-main manjeera">
                      <table width="100%" border="1" cellspacing="0">
                        <tbody>
                          <tr>
                           <th colspan="7" style="font-size:15px;text-align:center;background-color:#2f4050;color:#fff;"> Club House Utilization Data</th>
                          </tr>
                      <tr style="background-color:#e9c085;">
                        <th rowspan="2" class="text-center">Community </th>
                        <th rowspan="2" class="text-center">Total Flats/Villas</th>
                        <th rowspan="2" class="text-center">Avg Occupancy</th>
                        <th colspan="2" style="text-align:center;">Average daily usage  </th>
                        <th colspan="2" style="text-align:center;"> % against occupied flats</th>
                       </tr>
                          
                        <tr style="background-color:#e9c085;">
                         <th class="text-center">Swimming Pool </th>
                         <th class="text-center">Gym </th>
                         <th class="text-center">Swimming Pool </th>
                         <th class="text-center">Gym </th>
                         </tr>
                         @if (count($sites) > 0)
                        @foreach ($sites as $key => $site)
                             <tr>
                           <td><b><?php  echo $site;   ?></b></td>
                        <td class="text-center"><b> <?php   echo  $flats[$key]; ?></b></td> 
                     
						<td class="text-center"><span> <?php if(isset($existing[$key]['avg_occupancy'])) { echo $existing[$key]['avg_occupancy']; } ?></span></td>
						<td class="text-center"> <span><?php if(isset($existing[$key]['avg_daily_swim'])) { echo $existing[$key]['avg_daily_swim']; } ?></span></td>
						<td class="text-center"><span><?php if(isset($existing[$key]['avg_daily_gym'])) { echo $existing[$key]['avg_daily_gym']; } ?> </span></td>
						<td class="text-center"><span><?php if(isset($existing[$key]['occ_flat_swim'])) { echo $existing[$key]['occ_flat_swim']; } ?> </span></td>
						<td class="text-center"><span><?php if(isset($existing[$key]['occ_gym_swim'])) { echo $existing[$key]['occ_gym_swim']; } ?> </span></td>
					
					    </tr>  
							    
							 @endforeach
							   
							 @endif
                         

                         </tbody>
                      </table>
                      
                    </div>
    
                        
                </div>
              </div>
            </div>
            
