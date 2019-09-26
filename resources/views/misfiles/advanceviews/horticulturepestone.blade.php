
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
	overflow-x:scroll;
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
	border::0px;
	}
	.x_content.housesco2
	{
	 margin-top:0px;
	 padding:0px;
	}
	table
	{
	 margin-bottom:10px;
	}
	.text-center
	{
	text-align:center;
	}
	</style>

<div class="col-md-12 col-sm-12 col-xs-12" style="padding-left:0px;padding-right:0px;">
              <div class="x_panel tile fixed_height_400 activity-asrovur">
                <div class="x_title">
                   <!--<h3>Metro Water Supply details from  01.12.2017 to 31.12.2017</h3>-->
                </div>
                <div class="x_content housesco2">
    
	<div class="docs-main manjeera "> 
    
             
                  
                      @if (count($sites) > 0)
                        
                      <table width="100%" border="1" cellspacing="0" style="margin-bottom: 30px;">
                        <tbody>
                          <tr>
                           <th colspan="<?php echo count($sites) + 2; ?>" style="font-size:15px;text-align:center;background-color:#2f4050;color:#fff;"> Report on Horticulture </th>
                          </tr>
                      <tr style="background-color:#e9c085;">
                        <th>S.No</th>
                        <th>Activity </th>
                         <?php foreach($sites as $site) { ?>
                        <th class="text-center"><?php echo $site; ?></th> <?php } ?>
                       <!-- <th>Grande</th>
                        <th>Cyberzon</th>
                        <th> Aura </th>
                        <th> Towers </th>
                        <th>Boulevard</th>
                        <th>Avenues</th>
                        <th>Kanopy</th>
                        <th>Lotus</th>
                        <th>Aparna <br />Country</th>
                        <th>Gardenia</th>
                        <th>Lake Breeze</th>-->
                      </tr>
                          
                             <tr>
                        <th class="text-center">1</th>
                        <th>Varmicompost (Kgs)</th>
                         <?php foreach($sites as  $k => $site) { ?>
                        <th><span><?php echo $existing['varmicompost'][$k]; ?></span></th> <?php } ?>
                       
                       </tr>
                          
                            <tr>
                        <th class="text-center">2</th>
                        <th>Chloropyriphos (Ltrs)</th>
                        <?php foreach($sites as  $k => $site) { ?>
                        <th><span><?php echo $existing['chloropyriphos'][$k]; ?></span></th> <?php } ?>
                       
                          </tr>
                          
                          
                             <tr>
                        <th class="text-center">3</th>
                        <th>Monocrotophos (Ltrs)</th>
                       <?php foreach($sites as  $k => $site) { ?>
                        <th><span><?php echo $existing['monocrotophos'][$k]; ?></span></th> <?php } ?>
                       
                           </tr>
                          
                          
                          
                             <tr>
                        <th class="text-center">4</th>
                        <th>Imidaclopride (Ltrs)</th>
                       <?php foreach($sites as  $k => $site) { ?>
                        <th><span><?php echo $existing['imidaclopride'][$k]; ?></span></th> <?php } ?>
                       
                          </tr>
                          
                          
                         
                             <tr>
                        <th class="text-center">5</th>
                        <th>Bavistin (Kgs)</th>
                       <?php foreach($sites as  $k => $site) { ?>
                        <th><span><?php echo $existing['bavistin'][$k]; ?></span></th> <?php } ?>
                       
                          
                          </tr>
                          
                           <tr>
                        <th class="text-center">6</th>
                        <th>Dhanvit (Ltrs)</th>
                       <?php foreach($sites as  $k => $site) { ?>
                        <th><span><?php echo $existing['dhanvit'][$k]; ?></span></th> <?php } ?>
                       
                          </tr>
                          
                           <tr>
                        <th class="text-center">7</th>
                        <th>Multiplex (Ltrs)</th>
                       <?php foreach($sites as  $k => $site) { ?>
                        <th><span><?php echo $existing['multiplex'][$k]; ?></span></th> <?php } ?>
                       
                          </tr>
                          
                           <tr>
                        <th class="text-center">8</th>
                        <th>Furadon (G) (Kgs)</th>
                     <?php foreach($sites as  $k => $site) { ?>
                        <th><span><?php echo $existing['furadon'][$k]; ?></span></th> <?php } ?>
                       
                          </tr>
                          
                          
                       <tr>
                        <th class="text-center">9</th>
                        <th>Phorate (G) (Kgs)</th>
                       <?php foreach($sites as  $k => $site) { ?>
                        <th><span><?php echo $existing['phorate'][$k]; ?></span></th> <?php } ?>
                       
                            </tr>
                          
                            <tr>
                        <th class="text-center">10</th>
                        <th>19-19-19 (Kgs)</th>
                       <?php foreach($sites as  $k => $site) { ?>
                        <th><span><?php echo $existing['nineteenkgs'][$k]; ?></span></th> <?php } ?>
                       
                          </tr>
                          
                          
                             <tr>
                        <th class="text-center">11</th>
                        <th>19-19-19 (Kgs) Soluble</th>
                       <?php foreach($sites as  $k => $site) { ?>
                        <th><span><?php echo $existing['nineteenkgssoluble'][$k]; ?></span></th> <?php } ?>
                       
                           </tr>
                          
                          
                          
                             <tr>
                        <th class="text-center">12</th>
                        <th>Acephate (75 SP)</th>
                      <?php foreach($sites as  $k => $site) { ?>
                        <th><span><?php echo $existing['acephate'][$k]; ?></span></th> <?php } ?>
                       
                          </tr>
                          
                          
                         
                             <tr>
                        <th class="text-center">13</th>
                        <th>17-17-17 (Kgs)</th>
                     <?php foreach($sites as  $k => $site) { ?>
                        <th><span><?php echo $existing['seventeenkgs'][$k]; ?></span></th> <?php } ?>
                       
                          
                          </tr>
                          
                           <tr>
                        <th class="text-center">14</th>
                        <th>Urea (Kgs)</th>
                       <?php foreach($sites as  $k => $site) { ?>
                        <th><span><?php echo $existing['urea'][$k]; ?></span></th> <?php } ?>
                       
                          </tr>
                          
                           <tr>
                        <th class="text-center">15</th>
                        <th>Potash</th>
                       <?php foreach($sites as  $k => $site) { ?>
                        <th><span><?php echo $existing['potash'][$k]; ?></span></th> <?php } ?>
                       
                          </tr>
                          
                           <tr>
                        <th class="text-center">16</th>
                        <th>Rogor (Ltrs)</th>
                       <?php foreach($sites as  $k => $site) { ?>
                        <th><span><?php echo $existing['rogar'][$k]; ?></span></th> <?php } ?>
                       
                          </tr>
                          
                          
                            
                             <tr>
                        <th class="text-center">17</th>
                        <th>Malathian (Ltrs)</th>
                      <?php foreach($sites as  $k => $site) { ?>
                        <th><span><?php echo $existing['malathian'][$k]; ?></span></th> <?php } ?>
                       
                          </tr>
                          
                          
                         
                             <tr>
                        <th class="text-center">18</th>
                        <th>Fouate (Kgs)</th>
                       <?php foreach($sites as  $k => $site) { ?>
                        <th><span><?php echo $existing['fouate'][$k]; ?></span></th> <?php } ?>
                       
                          
                          </tr>
                          
                           <tr>
                        <th class="text-center">19</th>
                        <th>15-15-15 (Kgs)</th>
                       <?php foreach($sites as  $k => $site) { ?>
                        <th><span><?php echo $existing['fifteenkgs'][$k]; ?></span></th> <?php } ?>
                       
                          </tr>
                          
                           <tr>
                        <th class="text-center">20</th>
                        <th>2-4 D (Kgs)</th>
                      <?php foreach($sites as  $k => $site) { ?>
                        <th><span><?php echo $existing['twofourdkgs'][$k]; ?></span></th> <?php } ?>
                       
                          </tr>
                          
                           <tr>
                        <th class="text-center">21</th>
                        <th>Glycil (Ltrs)</th>
                       <?php foreach($sites as  $k => $site) { ?>
                        <th><span><?php echo $existing['glycil'][$k]; ?></span></th> <?php } ?>
                       
                          </tr>
                          
                            <tr>
                        <th class="text-center">22</th>
                        <th>16-16-16 (Kgs)</th>
                       <?php foreach($sites as  $k => $site) { ?>
                        <th><span><?php echo $existing['sixteenkgs'][$k]; ?></span></th> <?php } ?>
                       
                          </tr>
                          
                          
                            
                             <tr>
                        <th class="text-center">23</th>
                        <th>Arrow (Ltrs)</th>
                       <?php foreach($sites as  $k => $site) { ?>
                        <th><span><?php echo $existing['arrowltrs'][$k]; ?></span></th> <?php } ?>
                       
                          </tr>
                          
                          
                         
                             <tr>
                        <th class="text-center">24</th>
                        <th>Biowet (Ltrs)</th>
                        <?php foreach($sites as  $k => $site) { ?>
                        <th><span><?php echo $existing['biowetltrs'][$k]; ?></span></th> <?php } ?>
                       
                          
                          </tr>
                          
                           <tr>
                        <th class="text-center">25</th>
                        <th>Blitax (fungicide) (Kgs)</th>
                        <?php foreach($sites as  $k => $site) { ?>
                        <th><span><?php echo $existing['blitaxkgs'][$k]; ?></span></th> <?php } ?>
                       
                          </tr>
                          
                           <tr>
                        <th class="text-center">26</th>
                        <th>20-20-20 (Kgs)</th>
                       <?php foreach($sites as  $k => $site) { ?>
                        <th><span><?php echo $existing['twentykgs'][$k]; ?></span></th> <?php } ?>
                       
                          </tr>
                         </tbody>
                      </table>
                      
                      
                        <table width="100%" border="1" cellspacing="0">
                        <tbody>
                          <tr>
                           <th colspan="10" style="font-size:15px;text-align:center;background-color:#2f4050;color:#fff;"> Report on Horticulture </th>
                          </tr>
                      <tr style="background-color:#e9c085;">
                        <th >S.No</th>
                        <th >Activity </th>
                     <?php foreach($existing_two['sites'] as  $k => $site) { ?>
                        <th class="text-center"><?php echo $site; ?></th> <?php } ?>
                       
                      </tr>
                          
                             <tr>
                        <th class="text-center">1</th>
                        <th>Watering</th>
                      <?php foreach($existing_two['watering'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } ?>
                        
                            </tr>
                          
                            <tr>
                        <th class="text-center">2</th>
                        <th>Cleaning</th>
                            <?php foreach($existing_two['cleaning'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } ?>
                          </tr>
                          
                          
                             <tr>
                        <th class="text-center">3</th>
                        <th>Weeding</th>
                             <?php foreach($existing_two['weeding'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } ?>
                           </tr>
                          
                          
                          
                             <tr>
                        <th class="text-center">4</th>
                        <th>Cuting</th>
                           <?php foreach($existing_two['cutting'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } ?>
                          </tr>
                          
                          
                         
                             <tr>
                        <th class="text-center">5</th>
                        <th>Mulching</th>
                            <?php foreach($existing_two['multching'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } ?>
                          
                          </tr>
                          
                           <tr>
                        <th class="text-center">6</th>
                        <th>Trimming</th>
                          <?php foreach($existing_two['trimming'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } ?>
                          </tr>
                          
                           <tr>
                        <th class="text-center">7</th>
                        <th>Training(Shaping)</th>
                           <?php foreach($existing_two['training_shaping'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } ?>
                          </tr>
                          
                           <tr>
                        <th class="text-center">8</th>
                        <th>Pruning</th>
                            <?php foreach($existing_two['pruning'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } ?>
                          </tr>
                          
                         </tbody>
                      </table>
                      
                      
                         <table width="100%" border="1" cellspacing="0">
                        <tbody>
                          <tr>
                           <th colspan="10" style="font-size:15px;text-align:center;background-color:#2f4050;color:#fff;"> Report on Horticulture </th>
                          </tr>
                      <tr style="background-color:#e9c085;">
                        <th >S.No</th>
                        <th >Activity </th>
                     <?php foreach($existing_two['sites'] as  $k => $site) { ?>
                        <th class="text-center"><?php echo $site; ?></th> <?php } ?>
                       
                      </tr>
                          
                             <tr>
                        <th class="text-center">9</th>
                        <th>Hoeing</th>
                      <?php foreach($existing_two['hoeing'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } ?>
                        
                            </tr>
                          
                            <tr>
                        <th class="text-center">10</th>
                        <th>Lawn Moving</th>
                            <?php foreach($existing_two['lawn_moving'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } ?>
                          </tr>
                          
                          
                             <tr>
                        <th class="text-center">11</th>
                        <th>Fertilizer Application</th>
                             <?php foreach($existing_two['fertilizer_application'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } ?>
                           </tr>
                          
                          
                          
                             <tr>
                        <th class="text-center">12</th>
                        <th>Organic Manure Application</th>
                           <?php foreach($existing_two['organic_manure_app'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } ?>
                          </tr>
                          
                          
                         
                             <tr>
                        <th class="text-center">13</th>
                        <th>Spraying-Chemicals(Pest&Disease control)</th>
                            <?php foreach($existing_two['spraying_chemicals'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } ?>
                          
                          </tr>
                          
                           <tr>
                        <th class="text-center">14</th>
                        <th>Micro Nutrients Application</th>
                          <?php foreach($existing_two['micro_nutrients'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } ?>
                          </tr>
                          
                           <tr>
                        <th class="text-center">15</th>
                        <th>Weedicide Application</th>
                           <?php foreach($existing_two['weedicide_application'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } ?>
                          </tr>
                          
                           <tr>
                        <th class="text-center">16</th>
                        <th>Man Days per Day: Physical Presence/ Deployment</th>
                            <?php foreach($existing_two['mandays_perday'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } ?>
                          </tr>
                          
                         </tbody>
                      </table>
                      
                      
                      
                      
                            <table width="100%" border="1" cellspacing="0">
                        <tbody>
                          <tr>
                           <th colspan="10" style="font-size:15px;text-align:center;background-color:#2f4050;color:#fff;"> Report on Horticulture </th>
                          </tr>
                      <tr style="background-color:#e9c085;">
                        <th >S.No</th>
                        <th >Activity </th>
                     <?php foreach($existing_three['sites'] as  $k => $site) { ?>
                        <th class="text-center"><?php echo $site; ?></th> <?php } ?>
                       
                      </tr>
                          
                             <tr>
                        <th class="text-center">1</th>
                        <th>Watering</th>
                      <?php foreach($existing_three['watering'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } ?>
                        
                            </tr>
                          
                            <tr>
                        <th class="text-center">2</th>
                        <th>Cleaning</th>
                            <?php foreach($existing_three['cleaning'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } ?>
                          </tr>
                          
                          
                             <tr>
                        <th class="text-center">3</th>
                        <th>Weeding</th>
                             <?php foreach($existing_three['weeding'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } ?>
                           </tr>
                          
                          
                          
                             <tr>
                        <th class="text-center">4</th>
                        <th>Cuting</th>
                           <?php foreach($existing_three['cutting'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } ?>
                          </tr>
                          
                          
                         
                             <tr>
                        <th class="text-center">5</th>
                        <th>Mulching</th>
                            <?php foreach($existing_three['multching'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } ?>
                          
                          </tr>
                          
                           <tr>
                        <th class="text-center">6</th>
                        <th>Trimming</th>
                          <?php foreach($existing_three['trimming'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } ?>
                          </tr>
                          
                           <tr>
                        <th class="text-center">7</th>
                        <th>Training(Shaping)</th>
                           <?php foreach($existing_three['training_shaping'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } ?>
                          </tr>
                          
                           <tr>
                        <th class="text-center">8</th>
                        <th>Pruning</th>
                            <?php foreach($existing_three['pruning'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } ?>
                          </tr>
                          
                         </tbody>
                      </table>
                      
                      
                        <table width="100%" border="1" cellspacing="0">
                        <tbody>
                          <tr>
                           <th colspan="10" style="font-size:15px;text-align:center;background-color:#2f4050;color:#fff;"> Report on Horticulture </th>
                          </tr>
                      <tr style="background-color:#e9c085;">
                        <th >S.No</th>
                        <th >Activity </th>
                     <?php foreach($existing_three['sites'] as  $k => $site) { ?>
                        <th class="text-center"><?php echo $site; ?></th> <?php } ?>
                       
                      </tr>
                          
                             <tr>
                        <th class="text-center">9</th>
                        <th>Hoeing</th>
                      <?php foreach($existing_three['hoeing'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } ?>
                        
                            </tr>
                          
                            <tr>
                        <th class="text-center">10</th>
                        <th>Lawn Moving</th>
                            <?php foreach($existing_three['lawn_moving'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } ?>
                          </tr>
                          
                          
                             <tr>
                        <th class="text-center">11</th>
                        <th>Fertilizer Application</th>
                             <?php foreach($existing_three['fertilizer_application'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } ?>
                           </tr>
                          
                          
                          
                             <tr>
                        <th class="text-center">12</th>
                        <th>Organic Manure Application</th>
                           <?php foreach($existing_three['organic_manure_app'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } ?>
                          </tr>
                          
                          
                         
                             <tr>
                        <th class="text-center">13</th>
                        <th>Spraying-Chemicals(Pest&Disease control)</th>
                            <?php foreach($existing_three['spraying_chemicals'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } ?>
                          
                          </tr>
                          
                           <tr>
                        <th class="text-center">14</th>
                        <th>Micro Nutrients Application</th>
                          <?php foreach($existing_three['micro_nutrients'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } ?>
                          </tr>
                          
                           <tr>
                        <th class="text-center">15</th>
                        <th>Weedicide Application</th>
                           <?php foreach($existing_three['weedicide_application'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } ?>
                          </tr>
                          
                           <tr>
                        <th class="text-center">16</th>
                        <th>Man Days per Day: Physical Presence/ Deployment</th>
                            <?php foreach($existing_three['mandays_perday'] as  $k => $site) { ?>
                        <td><span><?php echo $site; ?></span></td> <?php } ?>
                          </tr>
                          
                         </tbody>
                      </table>
                      
                      
                       @else
                        
						<div>No entries in table</div>
                        
                    @endif
                      
                    </div>
    
                        
                </div>
              </div>
            </div>
