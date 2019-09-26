
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
	.x_panel.activity-asrovur
	{
	padding:0px;
	border:0px;
	}
	.x_content.housesco21
	{
	 margin-top:0px;
	 padding:0px;
	}
	.manjeera table tbody tr td:nth-child(2)
	{
	 font-weight:bold;
	}
	.manjeera table tbody tr td:nth-child(1)
	{
	 font-weight:bold;
	}
	.text-center
	{
	text-align:center;
	}
	</style>
@extends('layouts.app')


@section('content')
  <?php $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 
									$year = $uriSegments[3]; 
									$month = $uriSegments[4]; 
									?>
              
<div class="misback-button"><a href="/misreportsoptions/<?php echo $year."/".$month ?>">Back</a></div>
<div class="col-md-12 col-sm-12 col-xs-12 mis-horticulture-viewpage" style="padding-left:0px;padding-right:0px;">
              <div class="x_panel tile fixed_height_400 activity-asrovur">
                <div class="x_title">
                   <!--<h3>Metro Water Supply details from  01.12.2017 to 31.12.2017</h3>-->
                </div>
                <div class="x_content housesco21">
    
	<div class="docs-main manjeera "> 
    
             
                  
                      @if (count($sites) > 0)
                        
                        <?php if(isset($existing_two['sites'])) { if(count($existing_two['sites']) > 0) {  ?>
                      
                      <div class="horicultureactivity1-viewtable" style="page-break-after:always;margin-bottom:10px;">
                      <!-- <div style="font-size:15px;text-align:center;background-color:#2f4050;color:#fff;padding:4px;font-weight:bold;">
                           Report on Horticulture 
                       </div>-->
                      <div class="horticulture-tableone">
                        <table width="100%" border="1" cellspacing="0" class="man-per-dauys">
                        <tbody>
                          <tr class="tr-color">
                           <th colspan="<?php echo count($existing_two['sites']) + 2; ?>" style="font-size:15px;text-align:center;"> Report on Horticulture </th>
                          </tr>
                      <tr style="background-color:#e9c085;">
                        <th class="col1">S.No</th>
                        <th class="col2">Activity </th>
                     <?php if(isset($existing_two['sites'])) { foreach($existing_two['sites'] as  $k => $site) { ?>
                        <th class="text-center"><?php echo $site; ?></th> <?php } } ?>
                       
                      </tr>
                          
                             <tr>
                        <th class="text-center col3">1</th>
                        <th class="col4">Watering</th>
                      <?php if(isset($existing_two['watering'])) { foreach($existing_two['watering'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } } ?>
                        
                            </tr>
                          
                            <tr>
                        <th class="text-center col3">2</th>
                        <th class="col4">Cleaning</th>
                            <?php  if(isset($existing_two['cleaning'])) { foreach($existing_two['cleaning'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php }} ?>
                          </tr>
                          
                          
                             <tr>
                        <th class="text-center col3">3</th>
                        <th class="col4">Weeding</th>
                             <?php if(isset($existing_two['weeding'])) { foreach($existing_two['weeding'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } } ?>
                           </tr>
                          
                          
                          
                             <tr>
                        <th class="text-center col3">4</th>
                        <th class="col4">Cuting</th>
                           <?php  if(isset($existing_two['cutting'])) { foreach($existing_two['cutting'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } } ?>
                          </tr>
                          
                          
                         
                             <tr>
                        <th class="text-center col3">5</th>
                        <th class="col4">Mulching</th>
                            <?php  if(isset($existing_two['multching'])) { foreach($existing_two['multching'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } } ?>
                          
                          </tr>
                          
                           <tr>
                        <th class="text-center col3">6</th>
                        <th class="col4">Trimming</th>
                          <?php  if(isset($existing_two['trimming'])) { foreach($existing_two['trimming'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } } ?>
                          </tr>
                          
                           <tr>
                        <th class="text-center col3">7</th>
                        <th class="col4">Training(Shaping)</th>
                           <?php  if(isset($existing_two['training_shaping'])) { foreach($existing_two['training_shaping'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } } ?>
                          </tr>
                          
                           <tr>
                        <th class="text-center col3">8</th>
                        <th class="col4">Pruning</th>
                            <?php   if(isset($existing_two['pruning'])) { foreach($existing_two['pruning'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } } ?>
                          </tr>
                          
                         </tbody>
                      </table>
                      </div>
                      </div>
                      
                        
                      
                       <?php }} if(isset($existing_two['sites'])) { if(count($existing_two['sites']) > 0) {  ?>
                       <div class="horicultureactivity2-viewtable" style="page-break-after:always;margin-bottom:10px;">
                         <table width="100%" border="1" cellspacing="0" class="man-per-dauys1">
                        <tbody>
                          <tr class="tr-color">
                           <th colspan="<?php echo count($existing_two['sites']) + 2; ?>" style="font-size:15px;text-align:center;"> Report on Horticulture </th>
                          </tr>
                      <tr style="background-color:#e9c085;">
                        <th >S.No</th>
                        <th >Activity </th>
                     <?php  if(isset($existing_two['sites'])) {  foreach($existing_two['sites'] as  $k => $site) { ?>
                        <th class="text-center"><?php echo $site; ?></th> <?php } } ?>
                       
                      </tr>
                          
                             <tr>
                        <th class="text-center">9</th>
                        <th>Hoeing</th>
                      <?php if(isset($existing_two['hoeing'])) {  foreach($existing_two['hoeing'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } } ?>
                        
                            </tr>
                          
                            <tr>
                        <th class="text-center">10</th>
                        <th>Lawn Moving</th>
                            <?php if(isset($existing_two['lawn_moving'])) { foreach($existing_two['lawn_moving'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } }?>
                          </tr>
                          
                          
                             <tr>
                        <th class="text-center">11</th>
                        <th>Fertilizer Application</th>
                             <?php if(isset($existing_two['fertilizer_application'])) { foreach($existing_two['fertilizer_application'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } }?>
                           </tr>
                          
                          
                          
                             <tr>
                        <th class="text-center">12</th>
                        <th>Organic Manure Application</th>
                           <?php if(isset($existing_two['organic_manure_app'])) { foreach($existing_two['organic_manure_app'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } } ?>
                          </tr>
                          
                          
                         
                             <tr>
                        <th class="text-center">13</th>
                        <th>Spraying-Chemicals(Pest&Disease control)</th>
                            <?php  if(isset($existing_two['spraying_chemicals'])) { foreach($existing_two['spraying_chemicals'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } } ?>
                          
                          </tr>
                          
                           <tr>
                        <th class="text-center">14</th>
                        <th>Micro Nutrients Application</th>
                          <?php  if(isset($existing_two['micro_nutrients'])) { foreach($existing_two['micro_nutrients'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } } ?>
                          </tr>
                          
                           <tr>
                        <th class="text-center">15</th>
                        <th>Weedicide Application</th>
                           <?php  if(isset($existing_two['weedicide_application'])) { foreach($existing_two['weedicide_application'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } } ?>
                          </tr>
                          
                           <tr>
                        <th class="text-center">16</th>
                        <th>Avg Man Days per Day: Deployment / Total</th>
                            <?php if(isset($existing_two['mandays_perday'])) { foreach($existing_two['mandays_perday'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } } ?>
                          </tr>
                          
                         </tbody>
                      </table>
                      </div>
                      
                      
                      <?php } }?>
                       <?php if(isset($existing_three['sites'])) { if(count($existing_three['sites']) > 0) {  ?>
                      <div class="horicultureactivity3-viewtable" style="page-break-after:always;margin-bottom:10px;">
                            <table width="100%" border="1" cellspacing="0" class="man-per-dauys2">
                        <tbody>
                          <tr class="tr-color">
                           <th colspan="<?php echo count($existing_three['sites']) + 2; ?>" style="font-size:15px;text-align:center;"> Report on Horticulture </th>
                          </tr>
                      <tr style="background-color:#e9c085;">
                        <th >S.No</th>
                        <th >Activity </th>
                     <?php if(isset($existing_three['sites'])) {  foreach($existing_three['sites'] as  $k => $site) { ?>
                        <th class="text-center"><?php echo $site; ?></th> <?php } } ?>
                       
                      </tr>
                          
                             <tr>
                        <th class="text-center">1</th>
                        <th>Watering</th>
                      <?php if(isset($existing_three['watering'])) {  foreach($existing_three['watering'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } } ?>
                        
                            </tr>
                          
                            <tr>
                        <th class="text-center">2</th>
                        <th>Cleaning</th>
                            <?php if(isset($existing_three['cleaning'])) { foreach($existing_three['cleaning'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } } ?>
                          </tr>
                          
                          
                             <tr>
                        <th class="text-center">3</th>
                        <th>Weeding</th>
                             <?php  if(isset($existing_three['weeding'])) { foreach($existing_three['weeding'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } }?>
                           </tr>
                          
                          
                          
                             <tr>
                        <th class="text-center">4</th>
                        <th>Cuting</th>
                           <?php  if(isset($existing_three['cutting'])) { foreach($existing_three['cutting'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } } ?>
                          </tr>
                          
                          
                         
                             <tr>
                        <th class="text-center">5</th>
                        <th>Mulching</th>
                            <?php  if(isset($existing_three['multching'])) { foreach($existing_three['multching'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } } ?>
                          
                          </tr>
                          
                           <tr>
                        <th class="text-center">6</th>
                        <th>Trimming</th>
                          <?php if(isset($existing_three['trimming'])) { foreach($existing_three['trimming'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } }?>
                          </tr>
                          
                           <tr>
                        <th class="text-center">7</th>
                        <th>Training(Shaping)</th>
                           <?php if(isset($existing_three['training_shaping'])) { foreach($existing_three['training_shaping'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } } ?>
                          </tr>
                          
                           <tr>
                        <th class="text-center">8</th>
                        <th>Pruning</th>
                            <?php if(isset($existing_three['pruning'])) { foreach($existing_three['pruning'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } } ?>
                          </tr>
                          
                         </tbody>
                      </table>
                      </div>
                      
                       <?php } }?>
					   <?php if(isset($existing_three['sites'])) { if(count($existing_three['sites']) > 0) {  ?>
                      <div class="horicultureactivity4-viewtable" style="page-break-after:always;margin-bottom:10px;">
                        <table width="100%" border="1" cellspacing="0" class="man-per-dauys2">
                        <tbody>
                          <tr class="tr-color">
                           <th colspan="<?php echo count($existing_three['sites']) + 2; ?>" style="font-size:15px;text-align:center;"> Report on Horticulture </th>
                          </tr>
                      <tr style="background-color:#e9c085;">
                        <th >S.No</th>
                        <th >Activity </th>
                     <?php if(isset($existing_three['sites'])) {  foreach($existing_three['sites'] as  $k => $site) { ?>
                        <th class="text-center"><?php echo $site; ?></th> <?php } }?>
                       
                      </tr>
                          
                             <tr>
                        <th class="text-center">9</th>
                        <th>Hoeing</th>
                      <?php if(isset($existing_three['hoeing'])) { foreach($existing_three['hoeing'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } }?>
                        
                            </tr>
                          
                            <tr>
                        <th class="text-center">10</th>
                        <th>Lawn Moving</th>
                            <?php if(isset($existing_three['lawn_moving'])) { foreach($existing_three['lawn_moving'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } } ?>
                          </tr>
                          
                          
                             <tr>
                        <th class="text-center">11</th>
                        <th>Fertilizer Application</th>
                             <?php if(isset($existing_three['fertilizer_application'])) { foreach($existing_three['fertilizer_application'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } } ?>
                           </tr>
                          
                          
                          
                             <tr>
                        <th class="text-center">12</th>
                        <th>Organic Manure Application</th>
                           <?php if(isset($existing_three['organic_manure_app'])) { foreach($existing_three['organic_manure_app'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } } ?>
                          </tr>
                          
                          
                         
                             <tr>
                        <th class="text-center">13</th>
                        <th>Spraying-Chemicals(Pest&Disease control)</th>
                            <?php if(isset($existing_three['spraying_chemicals'])) { foreach($existing_three['spraying_chemicals'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } } ?>
                          
                          </tr>
                          
                           <tr>
                        <th class="text-center">14</th>
                        <th>Micro Nutrients Application</th>
                          <?php if(isset($existing_three['micro_nutrients'])) { foreach($existing_three['micro_nutrients'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } } ?>
                          </tr>
                          
                           <tr>
                        <th class="text-center">15</th>
                        <th>Weedicide Application</th>
                           <?php  if(isset($existing_three['weedicide_application'])) { foreach($existing_three['weedicide_application'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } }?>
                          </tr>
                          
                           <tr>
                        <th class="text-center">16</th>
                        <th>Avg Man Days per Day: Deployment / Total</th>
                            <?php if(isset($existing_three['mandays_perday'])) { foreach($existing_three['mandays_perday'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } } ?>
                          </tr>
                          
                         </tbody>
                      </table>
					  </div>
                       <?php } } ?>
					   
					   <div class="horiculturefertilizers-viewtable" style="margin-bottom: 15px;">
                      <table width="100%" border="1" cellspacing="0"  class="nile-chikle">
                        <tbody>
                          <tr class="tr-color">
                           <th colspan="<?php echo count($sites) + 3; ?>" style="font-size:15px;text-align:center;">Horticulture - Pesticides / Fertilizers and Fungicides Consumption Report for <?php echo date("F - Y", strtotime($report_on)); ?> </th>
                          </tr>
                      	<tr style="background-color:#e9c085;">
                            <th>S.No</th>
                            <th>Pesticides / Fertilizers and Fungicides </th>
                            <th>UOM</th>
                        	<?php foreach($sites as $site) { ?>
                        	<th class="text-center"><?php echo $site; ?></th> <?php } ?>
                      </tr>
                      <tr>
                    <td class="text-center">1</td>
                    <td>Varmicompost</td>
                    <td>Kgs</td>
                    <?php foreach($sites as  $k => $site) { ?>
                    <td><span><?php echo $existing['varmicompost'][$k]; ?></span></td> <?php } ?>
                    
                </tr>
                
                <tr>
                    <td class="text-center">2</td>
                    <td>Chloropyriphos</td>
                    <td>Ltrs</td>
                    <?php foreach($sites as  $k => $site) { ?>
                    <td><span><?php echo $existing['chloropyriphos'][$k]; ?></span></td> <?php } ?>
                    
                </tr>
                
                
                <tr>
                    <td class="text-center">3</td>
                    <td>Monocrotophos</td>
                    <td>Ltrs</td>
                    <?php foreach($sites as  $k => $site) { ?>
                    <td><span><?php echo $existing['monocrotophos'][$k]; ?></span></td> <?php } ?>
                    
                </tr>
                
                
                
                <tr>
                    <td class="text-center">4</td>
                    <td>Imidaclopride</td>
                    <td>Ltrs</td>
                    <?php foreach($sites as  $k => $site) { ?>
                    <td><span><?php echo $existing['imidaclopride'][$k]; ?></span></td> <?php } ?>
                    
                </tr>
                
                
                
                <tr>
                    <td class="text-center">5</td>
                    <td>Bavistin</td>
                    <td>Kgs</td>
                    <?php foreach($sites as  $k => $site) { ?>
                    <td><span><?php echo $existing['bavistin'][$k]; ?></span></td> <?php } ?>
                    
                
                </tr>
                
                <tr>
                    <td class="text-center">6</td>
                    <td>Dhanvit</td>
                    <td>Ltrs</td>
                    <?php foreach($sites as  $k => $site) { ?>
                    <td><span><?php echo $existing['dhanvit'][$k]; ?></span></td> <?php } ?>
                    
                </tr>
                
                <tr>
                    <td class="text-center">7</td>
                    <td>Multiplex</td>
                    <td>Ltrs</td>
                    <?php foreach($sites as  $k => $site) { ?>
                    <td><span><?php echo $existing['multiplex'][$k]; ?></span></td> <?php } ?>
                
                </tr>
                
                <tr>
                    <td class="text-center">8</td>
                    <td>Furadon (G)</td>
                    <td>Kgs</td>
                    <?php foreach($sites as  $k => $site) { ?>
                    <td><span><?php echo $existing['furadon'][$k]; ?></span></td> <?php } ?>
                    
                </tr>
                
                
                <tr>
                    <td class="text-center">9</td>
                    <td>Phorate (G)</td>
                    <td>Kgs</td>
                    <?php foreach($sites as  $k => $site) { ?>
                    <td><span><?php echo $existing['phorate'][$k]; ?></span></td> <?php } ?>
                    
                </tr>
                
                <tr>
                    <td class="text-center">10</td>
                    <td>19-19-19</td>
                    <td>Kgs</td>
                    <?php foreach($sites as  $k => $site) { ?>
                    <td><span><?php echo $existing['nineteenkgs'][$k]; ?></span></td> <?php } ?>
                    
                </tr>
                
                
                <tr>
                    <td class="text-center">11</td>
                    <td>19-19-19 (Soluble)</td>
                    <td>Kgs</td>
                    <?php foreach($sites as  $k => $site) { ?>
                    <td><span><?php echo $existing['nineteenkgssoluble'][$k]; ?></span></td> <?php } ?>
                    
                </tr>
                
                
                
                <tr>
                    <td class="text-center">12</td>
                    <td>Acephate</td>
                    <td>75 SP</td>
                    <?php foreach($sites as  $k => $site) { ?>
                    <td><span><?php echo $existing['acephate'][$k]; ?></span></td> <?php } ?>
                    
                </tr>
                
                
                
                <tr>
                    <td class="text-center">13</td>
                    <td>17-17-17</td>
                    <td>Kgs</td>
                    <?php foreach($sites as  $k => $site) { ?>
                    <td><span><?php echo $existing['seventeenkgs'][$k]; ?></span></td> <?php } ?>
                    
                
                </tr>
                
                <tr>
                    <td class="text-center">14</td>
                    <td>Urea</td>
                    <td>Kgs</td>
                    <?php foreach($sites as  $k => $site) { ?>
                    <td><span><?php echo $existing['urea'][$k]; ?></span></td> <?php } ?>
                    
                </tr>
                
                <tr>
                    <td class="text-center">15</td>
                    <td>Potash</td>
                    <td>Kgs</td>
                    <?php foreach($sites as  $k => $site) { ?>
                    <td><span><?php echo $existing['potash'][$k]; ?></span></td> <?php } ?>
                    
                </tr>
                
                <tr>
                    <td class="text-center">16</td>
                    <td>Rogor</td>
                    <td>Ltrs</td>
                    <?php foreach($sites as  $k => $site) { ?>
                    <td><span><?php echo $existing['rogar'][$k]; ?></span></td> <?php } ?>
                    
                </tr>
                
                
                
                <tr>
                    <td class="text-center">17</td>
                    <td>Malathian</td>
                    <td>Ltrs</td>
                    <?php foreach($sites as  $k => $site) { ?>
                    <td><span><?php echo $existing['malathian'][$k]; ?></span></td> <?php } ?>
                    
                </tr>
                
                
                
                <tr>
                    <td class="text-center">18</td>
                    <td>Sempra</td>
                    <td>Kgs</td>
                    <?php foreach($sites as  $k => $site) { ?>
                    <td><span><?php echo $existing['fouate'][$k]; ?></span></td> <?php } ?>
                    
                
                </tr>
                
                <tr>
                    <td class="text-center">19</td>
                    <td>15-15-15</td>
                    <td>Kgs</td>
                    <?php foreach($sites as  $k => $site) { ?>
                    <td><span><?php echo $existing['fifteenkgs'][$k]; ?></span></td> <?php } ?>
                    
                </tr>
                
                <tr>
                    <td class="text-center">20</td>
                    <td>2-4 D</td>
                    <td>Kgs</td>
                    <?php foreach($sites as  $k => $site) { ?>
                    <td><span><?php echo $existing['twofourdkgs'][$k]; ?></span></td> <?php } ?>
                    
                </tr>
                
                <tr>
                    <td class="text-center">21</td>
                    <td>Glycil</td>
                    <td>Ltrs</td>
					<?php foreach($sites as  $k => $site) { ?>
                    <td><span><?php echo $existing['glycil'][$k]; ?></span></td> <?php } ?>
                    
                </tr>
                
                <tr>
                    <td class="text-center">22</td>
                    <td>16-16-16</td>
                    <td>Kgs</td>
                    <?php foreach($sites as  $k => $site) { ?>
                    <td><span><?php echo $existing['sixteenkgs'][$k]; ?></span></td> <?php } ?>
                    
                </tr>
                
                
                
                <tr>
                    <td class="text-center">23</td>
                    <td>Arrow</td>
                    <td>Kgs</td>
                    <?php foreach($sites as  $k => $site) { ?>
                    <td><span><?php echo $existing['arrowltrs'][$k]; ?></span></td> <?php } ?>
                    
                </tr>
                
                
                
                <tr>
                    <td class="text-center">24</td>
                    <td>Biowet</td>
                    <td>Ltrs</td>
                    <?php foreach($sites as  $k => $site) { ?>
                    <td><span><?php echo $existing['biowetltrs'][$k]; ?></span></td> <?php } ?>
                    
                
                </tr>
                
                <tr>
                    <td class="text-center">25</td>
                    <td>Blitax (fungicide)</td>
                    <td>Kgs</td>
                    <?php foreach($sites as  $k => $site) { ?>
                    <td><span><?php echo $existing['blitaxkgs'][$k]; ?></span></td> <?php } ?>
                    
                </tr>
                
                <tr>
                    <td class="text-center">26</td>
                    <td>20-20-20</td>
                    <td>Kgs</td>
                    <?php foreach($sites as  $k => $site) { ?>
                    <td><span><?php echo $existing['twentykgs'][$k]; ?></span></td> <?php } ?>
                    
                </tr>
                
                <tr>
                    <td class="text-center">27</td>
                    <td>Lambda cyhalothrin</td>
                    <td>Ltrs</td>
                    <?php foreach($sites as  $k => $site) { ?>
                    <td><span><?php echo $existing['cyhalothrinltrs'][$k]; ?></span></td> <?php } ?>
                    
                </tr>
				
				 <tr>
                    <td class="text-center">28</td>
                    <td>Effinity</td>
                    <td>Kgs</td>
                    <?php foreach($sites as  $k => $site) { ?>
                    <td><span><?php if(isset($existing['effinity'][$k]) && $existing['effinity'][$k]!="") echo $existing['effinity'][$k];  else echo ""; ?></span></td> <?php } ?>
                    
                </tr>
                      
                         </tbody>
                      </table>
                      </div>
                      
                       @else
                        
						<div>No entries in table</div>
                        
                    @endif
                      
                    </div>
    
                        
                </div>
              </div>
            </div>
			
    <script src="/build/js/custom.min.js"></script>	
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    @include('partials.footer')
@stop