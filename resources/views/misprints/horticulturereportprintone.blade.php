<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Horticulture Report</title>

   
    
    <style>
	body
	{
	 font-family:Arial, Helvetica, sans-serif;
	}
	.nile-chikle tbody tr th 
	{
	padding:3px 2px;
	text-align:center;
	font-size:12px;
	vertical-align:middle;
	}
	
	.nile-chikle tbody tr td 
	{
	padding:3px 2px;
	text-align:center;
	font-size:12px;
	}
	.hostsite tbody tr th 
	{
	padding:3px 2px !important;
	}
	.hostsite tbody tr td 
	{
	padding:3px 2px !important;
	line-height: 14px;
	}
	.nile-chikle tbody tr td:nth-child(1)
	{
	 font-weight:bold;
	}
	.nile-chikle tbody tr td:nth-child(2)
	{
	 font-weight:bold;
	}
	.man-per-dauys tbody  tr th
	{
	 font-size:11px;
	 padding:8px 2px;
	text-align:center;
	vertical-align:middle;
	}
	.man-per-dauys tbody  tr th.watering-height
	{
	 height:52px;
	}
	.man-per-dauys tbody tr th:nth-child(2)
	{
	 padding-left:5px;
	}
	.man-per-dauys tbody  tr th.text-center
	{
	 text-align:center;
	}
	.man-per-dauys tbody  tr td
	{
	 text-align:center;
	 font-size:11px;
	 padding:8px 2px;
	}
	.man-per-dauys2 tbody  tr th
	{
	 font-size:11px;
	 padding:5px 2px;
	 text-align:center;
	vertical-align:middle;
	}
	.man-per-dauys2 tbody  tr th.trimming-height
	{
	 height:55px;
	}
	.man-per-dauys2 tbody  tr th.particular-height
	{
	 height:60px;
	}
	.man-per-dauys2 tbody  tr th.text-center
	{
	 text-align:center;
	}
	.man-per-dauys2 tbody  tr td.text-center
	{
	 text-align:center;
	}
	.man-per-dauys2 tbody  tr td
	{
	 font-size:11px;
	 padding:5px 2px;
	 text-align:center;
	vertical-align:middle;
	}
	.man-per-dauys1 tbody tr th.heightly
	{
	 height:55px;
	}
	
	.man-per-dauys1 tbody  tr th
	{
	 font-size:11px;
	 padding:7px 2px;
	 text-align:center;
	word-wrap:break-word;
	vertical-align:middle;
	}
	.man-per-dauys1 tbody  tr td
	{
	 font-size:11px;
	 padding:7px 2px;
	 text-align:center;
	word-wrap:break-word;
	}
	.man-per-dauys1 tbody  tr th.text-center
	{
	text-align:center;
	}
	.man-per-dauys1 tbody  tr td.text-center
	{
	text-align:center;
	}
	.man-per-dauys tbody  tr td.text-center
	{
	 text-align:center;
	}
	.man-per-dauys tbody  tr th.text-center
	{
	 text-align:center;
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
	.manjeera span 
	{
	color:black;
	}
	.x_panel.fixed_height_400
	{
	 border:0px;
	 padding:0px;
	}
	.manjeera table tr td.text-left
	{
	 text-align:left;
	}
	.manjeera table tr th.text-left
	{
	 text-align:left;
	}
	table
	{
	 margin-bottom:10px;
	}
	/*@media print {

    html, body {
      height:100vh; 
      margin: 0 !important; 
      padding: 0 !important;
      overflow: hidden;
    }

}*/
	</style>
     <style type="text/css" media="screen,print">
    .previewprrrr{
      display: block;
      clear: both;
      page-break-after: always;
  }
  </style>
  </head>

  <body>
<div class="docs-main manjeera "> 
@if (count($sites) > 0)

<?php if(isset($existing_two['sites'])) { if(count($existing_two['sites']) > 0) {  ?>

    <div style="page-break-after:always;">
        <table width="100%" border="1" cellspacing="0" class="man-per-dauys">
            <tbody>
                <tr>
                	<th colspan="<?php echo count($existing_two['sites']) + 2; ?>" style="font-size:14px;padding:6px 0px;text-align:center;"> Report on Horticulture </th>
                </tr>
                <tr>
                    <th >S.No</th>
                    <th >Activity </th>
                    <?php if(isset($existing_two['sites'])) { foreach($existing_two['sites'] as  $k => $site) { ?>
                    <th class="text-center"><?php echo $site; ?></th> <?php } } ?>
                    
                </tr>
                
                <tr>
                    <th class="text-center">1</th>
                    <th class="watering-height">Watering</th>
                    <?php if(isset($existing_two['watering'])) { foreach($existing_two['watering'] as  $k => $site) { ?>
                    <td><span><?php echo $site; ?></span></td> <?php } } ?>
                    
                </tr>
                
                <tr>
                    <th class="text-center">2</th>
                    <th class="watering-height">Cleaning</th>
                    <?php  if(isset($existing_two['cleaning'])) { foreach($existing_two['cleaning'] as  $k => $site) { ?>
                    <td><span><?php echo $site; ?></span></td> <?php }} ?>
                </tr>
                
                
                <tr>
                    <th class="text-center">3</th>
                    <th class="watering-height">Weeding</th>
                    <?php if(isset($existing_two['weeding'])) { foreach($existing_two['weeding'] as  $k => $site) { ?>
                    <td><span><?php echo $site; ?></span></td> <?php } } ?>
                </tr>
                
                
                
                <tr>
                    <th class="text-center">4</th>
                    <th class="watering-height">Cuting</th>
                    <?php  if(isset($existing_two['cutting'])) { foreach($existing_two['cutting'] as  $k => $site) { ?>
                    <td><span><?php echo $site; ?></span></td> <?php } } ?>
                </tr>
                
                
                
                <tr>
                    <th class="text-center">5</th>
                    <th class="watering-height">Mulching</th>
                    <?php  if(isset($existing_two['multching'])) { foreach($existing_two['multching'] as  $k => $site) { ?>
                    <td><span><?php echo $site; ?></span></td> <?php } } ?>
                
                </tr>
                
                <tr>
                    <th class="text-center">6</th>
                    <th class="watering-height">Trimming</th>
                    <?php  if(isset($existing_two['trimming'])) { foreach($existing_two['trimming'] as  $k => $site) { ?>
                    <td><span><?php echo $site; ?></span></td> <?php } } ?>
                </tr>
                
                <tr>
                    <th class="text-center">7</th>
                    <th class="watering-height">Training(Shaping)</th>
                    <?php  if(isset($existing_two['training_shaping'])) { foreach($existing_two['training_shaping'] as  $k => $site) { ?>
                    <td><span><?php echo $site; ?></span></td> <?php } } ?>
                </tr>
                
                <tr>
                    <th class="text-center">8</th>
                    <th class="watering-height">Pruning</th>
                    <?php   if(isset($existing_two['pruning'])) { foreach($existing_two['pruning'] as  $k => $site) { ?>
                    <td><span><?php echo $site; ?></span></td> <?php } } ?>
                </tr>
            
            </tbody>
        </table>
    <?php if(isset($pagenumberval_one)) { if($pagenumberval_one > 0) {echo "page -".$pagenumberval_one; } } ?>
    </div>



<?php }} if(isset($existing_two['sites'])) { if(count($existing_two['sites']) > 0) {  ?>
    <div style="page-break-after:always;">
        <table width="100%" border="1" cellspacing="0" class="man-per-dauys1">
            <tbody>
                <tr>
                	<th colspan="<?php echo count($existing_two['sites']) + 2; ?>" style="font-size:14px;padding:6px 0px;text-align:center;"> Report on Horticulture </th>
                </tr>
                <tr>
                    <th >S.No</th>
                    <th >Activity </th>
                    <?php  if(isset($existing_two['sites'])) {  foreach($existing_two['sites'] as  $k => $site) { ?>
                    <th class="text-center"><?php echo $site; ?></th> <?php } } ?>
                    
                </tr>
                
                <tr>
                    <th class="text-center">9</th>
                    <th class="heightly">Hoeing</th>
                    <?php if(isset($existing_two['hoeing'])) {  foreach($existing_two['hoeing'] as  $k => $site) { ?>
                    <td><span><?php echo $site; ?></span></td> <?php } } ?>
                    
                </tr>
                
                <tr>
                    <th class="text-center">10</th>
                    <th class="heightly">Lawn Moving</th>
                    <?php if(isset($existing_two['lawn_moving'])) { foreach($existing_two['lawn_moving'] as  $k => $site) { ?>
                    <td><span><?php echo $site; ?></span></td> <?php } }?>
                </tr>
                
                
                <tr>
                    <th class="text-center">11</th>
                    <th class="heightly">Fertilizer Application</th>
                    <?php if(isset($existing_two['fertilizer_application'])) { foreach($existing_two['fertilizer_application'] as  $k => $site) { ?>
                    <td><span><?php echo $site; ?></span></td> <?php } }?>
                </tr>
                
                
                
                <tr>
                    <th class="text-center">12</th>
                    <th class="heightly">Organic Manure Application</th>
                    <?php if(isset($existing_two['organic_manure_app'])) { foreach($existing_two['organic_manure_app'] as  $k => $site) { ?>
                    <td><span><?php echo $site; ?></span></td> <?php } } ?>
                </tr>
                
                
                
                <tr>
                    <th class="text-center">13</th>
                    <th class="heightly">Spraying-Chemicals(Pest&Disease control)</th>
                    <?php  if(isset($existing_two['spraying_chemicals'])) { foreach($existing_two['spraying_chemicals'] as  $k => $site) { ?>
                    <td><span><?php echo $site; ?></span></td> <?php } } ?>
                
                </tr>
                
                <tr>
                    <th class="text-center">14</th>
                    <th class="heightly">Micro Nutrients Application</th>
                    <?php  if(isset($existing_two['micro_nutrients'])) { foreach($existing_two['micro_nutrients'] as  $k => $site) { ?>
                    <td><span><?php echo $site; ?></span></td> <?php } } ?>
                </tr>
                
                <tr>
                    <th class="text-center">15</th>
                    <th class="heightly">Weedicide Application</th>
                    <?php  if(isset($existing_two['weedicide_application'])) { foreach($existing_two['weedicide_application'] as  $k => $site) { ?>
                    <td><span><?php echo $site; ?></span></td> <?php } } ?>
                </tr>
                
                <tr>
                    <th class="text-center">16</th>
                    <th class="heightly">Avg Man Days per Day: Deployment / Total</th>
                    <?php if(isset($existing_two['mandays_perday'])) { foreach($existing_two['mandays_perday'] as  $k => $site) { ?>
                    <td><span><?php echo $site; ?></span></td> <?php } } ?>
                </tr>
            
            </tbody>
        </table>
    <?php if(isset($pagenumberval_tw)) { if($pagenumberval_tw > 0) {echo "page -".$pagenumberval_tw; } } ?>
    </div>
<?php } }?>
<?php if(isset($existing_three['sites'])) { if(count($existing_three['sites']) > 0) {  ?>
    <div style="page-break-after:always;">
        <table width="100%" border="1" cellspacing="0" class="man-per-dauys2">
            <tbody>
                <tr>
                	<th colspan="<?php echo count($existing_three['sites']) + 2; ?>" style="font-size:14px;padding:6px 0px;text-align:center;"> Report on Horticulture </th>
                </tr>
                <tr>
                    <th >S.No</th>
                    <th >Activity </th>
                    <?php if(isset($existing_three['sites'])) {  foreach($existing_three['sites'] as  $k => $site) { ?>
                    <th class="text-center"><?php echo $site; ?></th> <?php } } ?>
                    
                </tr>
                
                <tr>
                    <th class="text-center">1</th>
                    <th class="trimming-height">Watering</th>
                    <?php if(isset($existing_three['watering'])) {  foreach($existing_three['watering'] as  $k => $site) { ?>
                    <td><span><?php echo $site; ?></span></td> <?php } } ?>
                    
                </tr>
                
                <tr>
                    <th class="text-center">2</th>
                    <th class="trimming-height">Cleaning</th>
                    <?php if(isset($existing_three['cleaning'])) { foreach($existing_three['cleaning'] as  $k => $site) { ?>
                    <td><span><?php echo $site; ?></span></td> <?php } } ?>
                </tr>
                
                
                <tr>
                    <th class="text-center">3</th>
                    <th class="trimming-height">Weeding</th>
                    <?php  if(isset($existing_three['weeding'])) { foreach($existing_three['weeding'] as  $k => $site) { ?>
                    <td><span><?php echo $site; ?></span></td> <?php } }?>
                </tr>
                
                
                
                <tr>
                    <th class="text-center">4</th>
                    <th class="trimming-height">Cuting</th>
                    <?php  if(isset($existing_three['cutting'])) { foreach($existing_three['cutting'] as  $k => $site) { ?>
                    <td><span><?php echo $site; ?></span></td> <?php } } ?>
                </tr>
                
                
                
                <tr>
                    <th class="text-center">5</th>
                    <th class="trimming-height">Mulching</th>
                    <?php  if(isset($existing_three['multching'])) { foreach($existing_three['multching'] as  $k => $site) { ?>
                    <td><span><?php echo $site; ?></span></td> <?php } } ?>
                
                </tr>
                
                <tr>
                    <th class="text-center">6</th>
                    <th class="trimming-height">Trimming</th>
                    <?php if(isset($existing_three['trimming'])) { foreach($existing_three['trimming'] as  $k => $site) { ?>
                    <td><span><?php echo $site; ?></span></td> <?php } }?>
                </tr>
                
                <tr>
                    <th class="text-center">7</th>
                    <th class="trimming-height">Training(Shaping)</th>
                    <?php if(isset($existing_three['training_shaping'])) { foreach($existing_three['training_shaping'] as  $k => $site) { ?>
                    <td><span><?php echo $site; ?></span></td> <?php } } ?>
                </tr>
                
                <tr>
                    <th class="text-center">8</th>
                    <th class="trimming-height">Pruning</th>
                    <?php if(isset($existing_three['pruning'])) { foreach($existing_three['pruning'] as  $k => $site) { ?>
                    <td><span><?php echo $site; ?></span></td> <?php } } ?>
                </tr>
                
            </tbody>
        </table>
    <?php if(isset($pagenumberval_thr)) { if($pagenumberval_thr > 0) {echo "page -".$pagenumberval_thr; } } ?>
    </div>
<?php } }?>
<?php if(isset($existing_three['sites'])) { if(count($existing_three['sites']) > 0) {  ?>
    <div style="page-break-after:always;">
        <table width="100%" border="1" cellspacing="0" class="man-per-dauys2">
            <tbody>
                <tr>
                	<th colspan="<?php echo count($existing_three['sites']) + 2; ?>" style="font-size:14px;padding:6px 0px;text-align:center;"> Report on Horticulture </th>
                </tr>
                <tr>
                    <th >S.No</th>
                    <th >Activity </th>
                    <?php if(isset($existing_three['sites'])) {  foreach($existing_three['sites'] as  $k => $site) { ?>
                    <th class="text-center"><?php echo $site; ?></th> <?php } }?>
                    
                </tr>
                
                <tr>
                    <th class="text-center">9</th>
                    <th class="particular-height">Hoeing</th>
                    <?php if(isset($existing_three['hoeing'])) { foreach($existing_three['hoeing'] as  $k => $site) { ?>
                    <td><span><?php echo $site; ?></span></td> <?php } }?>
                    
                </tr>
                
                <tr>
                    <th class="text-center">10</th>
                    <th class="particular-height">Lawn Moving</th>
                    <?php if(isset($existing_three['lawn_moving'])) { foreach($existing_three['lawn_moving'] as  $k => $site) { ?>
                    <td><span><?php echo $site; ?></span></td> <?php } } ?>
                </tr>
                
                
                <tr>
                    <th class="text-center">11</th>
                    <th class="particular-height">Fertilizer Application</th>
                    <?php if(isset($existing_three['fertilizer_application'])) { foreach($existing_three['fertilizer_application'] as  $k => $site) { ?>
                    <td><span><?php echo $site; ?></span></td> <?php } } ?>
                </tr>
                
                
                
                <tr>
                    <th class="text-center">12</th>
                    <th class="particular-height">Organic Manure Application</th>
                    <?php if(isset($existing_three['organic_manure_app'])) { foreach($existing_three['organic_manure_app'] as  $k => $site) { ?>
                    <td><span><?php echo $site; ?></span></td> <?php } } ?>
                </tr>
                
                
                
                <tr>
                    <th class="text-center">13</th>
                    <th class="particular-height">Spraying-Chemicals(Pest&Disease control)</th>
                    <?php if(isset($existing_three['spraying_chemicals'])) { foreach($existing_three['spraying_chemicals'] as  $k => $site) { ?>
                    <td><span><?php echo $site; ?></span></td> <?php } } ?>
                
                </tr>
                
                <tr>
                    <th class="text-center">14</th>
                    <th class="particular-height">Micro Nutrients Application</th>
                    <?php if(isset($existing_three['micro_nutrients'])) { foreach($existing_three['micro_nutrients'] as  $k => $site) { ?>
                    <td><span><?php echo $site; ?></span></td> <?php } } ?>
                </tr>
                
                <tr>
                    <th class="text-center">15</th>
                    <th class="particular-height">Weedicide Application</th>
                    <?php  if(isset($existing_three['weedicide_application'])) { foreach($existing_three['weedicide_application'] as  $k => $site) { ?>
                    <td><span><?php echo $site; ?></span></td> <?php } }?>
                </tr>
                
                <tr>
                    <th class="text-center">16</th>
                    <th class="particular-height">Avg Man Days per Day: Deployment / Total</th>
                    <?php if(isset($existing_three['mandays_perday'])) { foreach($existing_three['mandays_perday'] as  $k => $site) { ?>
                    <td><span><?php echo $site; ?></span></td> <?php } } ?>
                </tr>
                
            </tbody>
        </table>
    <?php if(isset($pagenumberval_fr)) { if($pagenumberval_fr > 0) {echo "page -".$pagenumberval_fr; } } ?>
    </div>
<?php } } ?>

    <div>
        <table width="100%" border="1" cellspacing="0"  class="nile-chikle <?php if(count($sites) > 10) { echo 'hostsite'; } ?>">
            <tbody>
                <tr>
                	<th colspan="<?php echo count($sites) + 3; ?>" style="font-size:14px;padding:6px 0px;text-align:center;">Horticulture - Pesticides / Fertilizers and Fungicides Consumption Report for <?php echo date("F - Y", strtotime($report_on)); ?> </th>
                </tr>
                <tr>
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
<?php if(isset($pagenumberval_fv)) { if($pagenumberval_fv > 0) {echo "page -".$pagenumberval_fv; } } ?>
</div>

@else

<div>No entries in table</div>

@endif

</div>
       

  </body>
</html>

 <script src="/vendors1/jquery/dist/jquery.min.js"></script>
 
<script>
$( document ).ready(function() {
    window.print(); 
	close();
	window.location.href = "/misreports"; 
});

</script>