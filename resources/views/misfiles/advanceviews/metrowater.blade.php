
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
	padding:4px;
	text-align:center;
	font-size:12px;
	}
	.manjeera table tr td 
	{
	padding:4px;
	text-align:center;
	font-size:12px;
	}
	.manjeera table
	{
	 width:auto;
	 margin:0 auto;
	}
	.rotate
	{
	transform: rotate(270deg) ;
-webkit-transform: rotate(270deg) ;
-moz-transform: rotate(270deg) ;
-o-transform: rotate(270deg) ;
-ms-transform: rotate(270deg) ;
	}
	.manjeera
	{
	font-size:12px;
	padding-bottom:25px;
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
    margin-top:10px;
	margin-bottom:25px;
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
	.x_panel.commmmm
	{
	  padding-left:0px;
	 padding-top:0px;
	 border:0px;
	 padding-right:0px;
	}
	.x_content.housesco212
	{
	 margin-top:0px;
	 padding-left:0px;
	}
	.commmmm1
	{
	 padding-left:0px !important;
	 padding-right:0px !important;
	}
	</style> 

<div class="col-md-12 col-sm-12 col-xs-12 commmmm1">
              <div class="x_panel tile fixed_height_400 commmmm">
                <div class="x_title">
                   <!--<h3>Metro Water Supply details from  01.12.2017 to 31.12.2017</h3>-->
                </div>
                <div class="x_content housesco212">
     
<div class="manjeera">
                     <?php // echo "<pre>"; print_r($sitearr); echo "</pre>"; ?>
                      <table  border="1" cellspacing="0">
                        <tbody>
                          <tr>
                           <th colspan="<?php echo count($sitearr['community']) + 2; ?>" style="font-size:15px;background-color:#2f4050;color:#fff;text-align:center;">Metro Water Supply details from <span style="color:#ffd800;"> <?php echo $reportfrom_on."<span style='color:#fff;'> to </span> ".$report_on; ?> </span></th>
                          </tr> 
                          <tr style="background-color:#e9c085;">
                        <th>Community<br /> Date Wise</th>
						<?php foreach($sitearr['community'] as $community) {?>
						 <th><?php echo  $community;?></th>
						<?php 	}?>
						
                           <tr style="background-color:#a99f91;">
                        <th>Contracted<br> Quantity in KL</th>
						
						<?php foreach($sitearr['concentrated'] as $cont => $contval) { ?>
                        
						<th><?php echo $contval; ?></th>
						<?php } ?>
                          </tr>
                          
                       
                           <?php foreach($sitearr['dateres'] as $dateke => $datevalue) {  ?>
                            <tr>
                        <th><?php
echo date('d-m-Y', strtotime($dateke)); ?></th>
						<?php foreach($datevalue as $mk => $val) {  if($mk == 0) continue;?>   <td><span><?php echo $val; ?></span> </td><?php } ?>
                       
                          </tr>
						  
						  <?php  } ?>
                          
                      
                          
                          <tr  style="background-color:#b5a46b;">  
                        <th>Avg per day	</th>
						 <?php foreach($sitearr['average'] as $avgke => $avgval) { ?>
                        <td><b><?php echo round(((float)$avgval/count($sitearr['dateres']))); ?></b> </td>
                      
						<?php } ?>  
                          </tr>
                          
                           <tr style="background-color:#f9f0b7;">
                        <th>% on contracted<br> per day</th>
						 <?php foreach($sitearr['persent'] as $perke => $perval) { ?>
						
                        <td><b><?php echo round($perval); ?></b> </td>
                       
						<?php } ?>  
                          </tr>
                          	

                           
                        </tbody>
                      </table>
                      
                     <!-- <p style="padding-top:3px;margin-bottom:10px;">* In Sarovar 'metro water meter' not working</p>-->
                     
                    </div>
    
                        
                </div>
              </div>
            </div>
			