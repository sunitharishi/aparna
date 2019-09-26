
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
	.x_title
	{
	border-bottom:none;
	padding:0px;
	margin:0px;
	}
	.traffic-view table tr th
	{
	 padding:5px;
	 text-align:center;
	 font-size:11px;
	}
	.traffic-view table tr td
	{
	 padding:5px;
	 text-align:center;
	 font-size:11px;
	}
	.traffic-view table tr td span
	{
	 color:#041586;
	 font-weight:bold;
	}
	.note-points
	{
	 margin-top:10px;
	}
	.note-points label
	{
	 float:left;
	 margin-top:4px;
	}
	.note-points ol
	{
	 padding-left:20px;
	 float:left;
	}
	.note-points ol li
	{
	 padding:4px;
	}
	.x_panel.fixed_height_400
	{
	 border:0px;
	 padding:0px;
	}
	.x_content.conteent-view
	{
	 margin-top:0px;
	 padding:0px;
	}
	.traffic-view table tr td.text-left
	{
	text-align:left;
	}
	</style>

<div class="col-md-12 col-sm-12 col-xs-12" style="padding-left:0px;padding-right:0px;">
              <div class="x_panel tile fixed_height_400">
                <div class="x_title">
                   <!--<h3>Metro Water Supply details from  01.12.2017 to 31.12.2017</h3>-->
                </div>
                <div class="x_content conteent-view">
     
                  <div class="traffic-view">
                 
                  
                     <table border="1" width="100%">
                     	<tr>
                        	<td colspan="16" style="text-align:center;text-align:center;background-color:#2f4050;color:#fff;"><b>Traffic movement data on avg. per day</b></td>
                        </tr>
                        <tr style="background-color:#e9c085;">
                        	<td><b>Particulars</b></td>
                             <?php foreach($existsec['sites'] as $skey => $siterec) { ?>
                        <td ><b> <?php  echo $siterec; ?></b> </td>
                       <?php }?>
                        <td ><b>Total</b></td>
                        </tr> 
                        <tr>
                        	<td class="text-left"><b>Residents Vehicle (4 & 2 wheelers)</b></td>
                           <?php $resd = 0; foreach($existsec['resident_vehicle'] as $skey => $siterec) { ?>
                        <td> <span><?php  echo $siterec;
						    $resd = $resd + (float)$siterec;
						 ?> </span></td>
                       <?php }?>
                            <td><span><?php echo $resd; ?></span></td>
                        </tr>
                         <tr>
                        	<td class="text-left"><b>Temporary Vendors (persons)</b></td>
                            <?php $resdv = 0; foreach($existsec['temp_vendors'] as $skey => $siterecv) { ?>
                        <td><span> <?php  echo $siterecv; 
						       $resdv = $resdv + (float)$siterecv;
						?> </span></td>
                       <?php }?>
                            <td><span><?php echo $resdv; ?></span></td>
                        </tr>
                         <tr>
                        	<td class="text-left"><b>Courier Delivery Boys (Persons)</b></td>
                             <?php $resdp = 0; foreach($existsec['courier_delivery'] as $skey => $siterecp) { ?>
                        <td><span><?php  echo $siterecp;
						       $resdp = $resdp + (float)$siterecp;
						 ?> </span></td>
                       <?php }?>
                            <td><span><?php echo $resdp; ?></span></td>
                        </tr>
                         <tr>
                        	<td class="text-left"><b>Visitors</b></td>
                           <?php $resdvs = 0; foreach($existsec['visitors'] as $skey => $visit) { ?>
                        <td><span> <?php  
						  $resdvs = $resdvs + (float)$visit;
						echo $visit; ?> </span></td>
                       <?php }?>
                            <td><span><?php echo $resdvs; ?></span></td>
                        </tr>
                         <tr>
                        	<td class="text-left"><b>Construction Team (persons)</b></td>
                            <?php $resdcon = 0; foreach($existsec['construc_team'] as $skey => $siterecons) { ?>
                        <td> <span><?php  echo $siterecons;
						   $resdcon = $resdcon + (float)$siterecons;
						 ?> </span></td>
                       <?php }?>
                             <td><span><?php echo $resdcon; ?></span></td>
                        </tr>
                         <tr>
                        	<td class="text-left"><b>Inter Works in flats/Villas</b></td>
                             <?php  $resdins = 0; foreach($existsec['interworks_inflats'] as $skey => $siterecint) { ?>
                        <td><span><?php  echo $siterecint;
						$resdins = $resdins + (float)$siterecint;
						 ?></span> </td>
                       <?php }?>
                             <td><span><?php echo $resdins; ?></span></td>
                        </tr>
                         <tr>
                        	<td class="text-left"><b>Interior Workers per day</b></td>
                            <?php $resdiwr = 0; foreach($existsec['interior_works_per_day'] as $skey => $siterewr) { ?>
                        <td><span> <?php  
						$resdiwr = $resdiwr + (float)$siterewr;
						echo $siterewr; ?> </span></td>
                       <?php }?>  
                            <td><span><?php echo $resdiwr; ?></span></td>
                        </tr>
                         <tr style="background-color:#b5a46b;">  
                        	<td class="text-left"><b>Total</b></td>
                               <?php  $ttres = 0; foreach($existsec['ctotval'] as $skey => $sitett) { ?>
                        <td><span> <?php  echo $sitett;
						  $ttres = $ttres + (float)$sitett;
						 ?> </span></td>
                       <?php }?>
                            <td><span><?php  echo (float)$ttres +  (float)$resdiwr + (float)$resdins + (float)$resdcon + (float)$resdvs + (float)$resdp + (float)$resdv + (float)$resd;?></span></td>
                        </tr>
                     </table> 
                  </div>
               
                  <!-- <div class="note-points">
                   		<label>Note-</label>
                        <ol type="1">
                        	<li>62 School buses are included in Sarovar traffic.</li>
                            <li>Traffic is for only one side. Total traffic controlled by security is double the indicated figures</li>
                        </ol>
                   </div>-->
                        
                </div>
              </div>
            </div>
