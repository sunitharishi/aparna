
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
	text-align:center;
	}
	.manjeera table tr td 
	{
	padding:5px;
	font-size:11px;
	text-align:center;
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
	 font-size:12px;
 	} 
	.docs-main h3 
	{
	margin-bottom:25px;
	margin-top:10px;
	text-align:center;
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
	.x_panel.raccce
	{
	 border:0px;
	 padding:0px;
	}
	.text-center
	{
	 text-align:center;
	}
	
	</style>

<div class="col-md-12 col-sm-12 col-xs-12" style="padding-left:0px;padding-right:0px;">
              <div class="x_panel tile fixed_height_400 raccce">
                <div class="x_title">
                   <!--<h3>Metro Water Supply details from  01.12.2017 to 31.12.2017</h3>-->
                </div>
                <div class="x_content housesco">
    
	<div class="docs-main manjeera">
   
                      <table width="100%" border="1" cellspacing="0">
                        <tbody>
                          <tr>
                           <th colspan="19" style="font-size:15px;text-align:center;background-color:#2f4050;color:#fff;">Report on House keeping </th>
                          </tr>
                      <tr style="background-color:#e9c085;">
                        <th rowspan="3" >S.No</th>
                        <th rowspan="3" >Community </th>
                        <th rowspan="3" >No.Of Units </th>
                        <th rowspan="2" colspan="2" >ManPower including CH </th>
                        <th   rowspan="3" >Garbage disposal</th>
                        <th colspan="5" >Average Monthly Consumption</th>
                        <th  rowspan="3" >Debris trips Ave / day</th>
                        <th  colspan="7" >Daily and periodical cleanings</th>
                      </tr>
                          
                        <tr style="background-color:#e9c085;">
                        
                         <th colspan="2" >Brooms (Nos.) </th>
                         <th colspan="2" >Cleaners (ltr)</th>
                         <th rowspan="2" >Freshner</th>
                         <th rowspan="2" >Corridors Sweeping and mopping</th>
                         <th rowspan="2" >Corridor  deep cleaning / water wash</th>
                         <th rowspan="2" >Stair case cleaning  </th>
                          <th rowspan="2" >Cellar & Sub cellar cleaning </th>
                          <th rowspan="2" >Cellar and sub cellar  deep cleaning / water wash </th>
                          <th rowspan="2" >Cob webs removal </th>
                          <th rowspan="2" > Road Sweeping and Cleaning (Villas)  </th>   
                        </tr>
                          
                       <tr style="background-color:#e9c085;">
                         <th >Deployment</th>
                         <th >Physical Presence Avg / day</th>
                         <th >Hard</th>
                         <th >Soft</th>
                         <th >Floor</th>
                         <th >Toilet</th>
                          </tr>
                           
                           <?php $nn = 1; ?>
                            @if (count($sites) > 0)
                        @foreach ($sites as $key => $site)
                            <tr>
                        <th ><?php echo $nn; ?></th>
                        <td style="text-align:left;"><b><?php  echo $site;   ?></b></td>
                        <td ><b> <?php   echo  $flats[$key]; ?></b></td> 
                        <td ><span><?php  if(isset($deployment['deployment'][$key])) { echo $deployment['deployment'][$key]; } ?></span> </td>
                        <td ><span><?php if(isset($existing[$key]['physical_presence'])) {  echo $existing[$key]['physical_presence']; }?></span> </td>
                        <td><span><?php if(isset($existing[$key]['garbage_disposal'])) {  echo $existing[$key]['garbage_disposal']; }?></span></td>
                        <td ><span><?php if(isset($existing[$key]['brooms_hard'])) {  echo $existing[$key]['brooms_hard']; }?></span></td>
                        <td ><span><?php if(isset($existing[$key]['brooms_soft'])) {  echo $existing[$key]['brooms_soft']; }?></span></td>
                        <td ><span><?php if(isset($existing[$key]['cleaners_floor'])) {  echo $existing[$key]['cleaners_floor']; }?></span></td> 
                        <td ><span><?php if(isset($existing[$key]['cleaners_tolet'])) {  echo $existing[$key]['cleaners_tolet']; }?></span> </td>
                        <td ><span><?php if(isset($existing[$key]['freshner'])) {  echo $existing[$key]['freshner']; }?></span> </td>
                        <td ><span><?php if(isset($existing[$key]['debristripavg'])) {  echo $existing[$key]['debristripavg']; }?></span></td>
                        <td><span><?php if(isset($existing[$key]['corridors_sweeping'])) {  echo $existing[$key]['corridors_sweeping']; }?></span></td>
                        <td><span><?php if(isset($existing[$key]['corridors_water_wash'])) {  echo $existing[$key]['corridors_water_wash']; }?></span></td>
                        <td><span><?php if(isset($existing[$key]['staircase_clean'])) {  echo $existing[$key]['staircase_clean']; }?></span></td>
                        <td><span><?php if(isset($existing[$key]['cell_subcel_clean'])) {  echo $existing[$key]['cell_subcel_clean']; }?></span></td>
                        <td><span><?php if(isset($existing[$key]['cell_subcel_clean_wtr_wash'])) {  echo $existing[$key]['cell_subcel_clean_wtr_wash']; }?></span></td>
                        <td><span><?php if(isset($existing[$key]['cobwebsremoval'])) {  echo $existing[$key]['cobwebsremoval']; }?></span></td>
                        <td><span><?php if(isset($existing[$key]['roadsweepclean'])) {  echo $existing[$key]['roadsweepclean']; }?></span></td>
                        <?php $nn++; ?>
                          </tr>
                          
                           @endforeach
							   
							 @endif
                          
                          
                           
                         </tbody>
                      </table>
                      
               <!-- <p style="padding-top:3px;margin-bottom:5px;">Note: 1.Above consumption includes clubhouse, swimming pool refilling, carwash & public rest rooms.</p>  
                        <p class="borewell">2.Treated water recycled for flushing not included above .</p>
                        <p class="borewell">  3. Refer page 3 for Borewells not working status.</p>
                        <p class="borewell">  4. Refer pages 30,32,34,36,38,39  for STP treated water details. </p>-->
                     
                    </div>
    
                        
                </div>
              </div>
            </div>
