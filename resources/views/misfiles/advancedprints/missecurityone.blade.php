
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
	text-align:center;
	font-size:11px;
	}
	.manjeera table tr td 
	{
	padding:5px;
	text-align:center;
	font-size:11px;
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
	.docs-main h3 
	{
	margin-bottom:25px;
	margin-top:10px;
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
	.secuhr hr
	{
	border-color:gray;
    margin-bottom:0px;
    margin-top:0px;
	width:85px;
	
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
	.x_panel.domestiiic
	{
	 border:0px;
	 padding:0px;
	}
	.manjeera table tr th.text-left
	{
	 text-align:left;
	}
	.manjeera table tr td.text-left
	{
	 text-align:left;
	}
	</style>

<div class="col-md-12 col-sm-12 col-xs-12" style="padding-left:0px;padding-right:0px;">
              <div class="x_panel tile fixed_height_400 domestiiic">
                <div class="x_title">
                   <!--<h3>Metro Water Supply details from  01.12.2017 to 31.12.2017</h3>-->
                </div>
                <div class="x_content">
    
	<div class="manjeera">
    
                             
                      <?php if(isset($existsectwo['sites'])) { ?>
                      
                       <table width="100%" border="1" cellspacing="0">
                        <tbody>
                          <tr style="background-color:#2f4050;color:#fff;">
                           <th colspan="<?php echo count($existsectwo['sites']) + 2; ?>" style="font-size:15px;">Daily Security Data</th>
                          </tr>
                          
                      <tr style="background-color:#e9c085;">
                        <th colspan="2">Category</th>
                        <?php foreach($existsectwo['sites'] as $skey => $siterec) { ?>
                        <th > <?php  echo $siterec; ?> </th>
                       <?php }?>
                      
                      </tr>
                          
                       
                        
                             <tr>
                        <th rowspan="8" style="background-color:#b8cde6;" class="text-left">Manpower</th>
                        <td class="text-left"><b>Guards</b></td>
                         <?php foreach($existsectwo['guards'] as $skey => $siterec) { ?>
                        <th ><span> <?php echo $siterec; ?> </span></th>
                       <?php }?>
                        
                            </tr>
                          
                            <tr>
                        <td class="text-left"><b>Lady Guards</b></td>
                        <?php foreach($existsectwo['l_guards'] as $skey => $siterec) { ?>
                        <th ><span> <?php echo $siterec; ?> </span></th>
                       <?php }?>
                          </tr>
                          
                          
                             <tr>
                        <td class="text-left"><b>Head guard</b></td>
                       <?php foreach($existsectwo['h_guards'] as $skey => $siterec) { ?>
                        <th ><span> <?php echo $siterec; ?> </span></th>
                       <?php }?>
                        
                          </tr>
                          
                          
                          
                             <tr>
                      <td class="text-left"><b>Supervisors</b></td>
                        <?php foreach($existsectwo['supervisors'] as $skey => $siterec) { ?>
                        <th ><span> <?php echo $siterec; ?> </span></th>
                       <?php }?>
                        
                          </tr>
                          
                          
                         
                             <tr>
                          <td class="text-left"><b>ASO</b></td>
                        <?php foreach($existsectwo['aso'] as $skey => $siterec) { ?>
                        <th ><span> <?php echo $siterec; ?> </span></th>
                       <?php }?>
                          
                          </tr>
                          
                           <tr>
                       <td class="text-left"><b>SO</b></td>
                        <?php foreach($existsectwo['so_num'] as $skey => $siterec) { ?>
                        <th ><span> <?php echo $siterec; ?> </span></th>
                       <?php }?>
                          </tr>
                          
                          <tr>
                       <td class="text-left"><b>Nalla Gandla - Hub Reserves</b></td>
                        <?php foreach($existsectwo['nalla_gandla_hub'] as $skey => $siterec) { ?>
                        <th ><span> <?php echo $siterec; ?> </span></th>
                       <?php }?>
                          </tr>
                          
                           
                        <tr>
                          
                        <?php $tvaltw = 0; foreach($existsectwo['ctotval'] as $skey => $siterec) { $tvaltw = $tvaltw + (int)$siterec; } ?>
                         <td class="text-left"><b>Total-<?php echo $tvaltw; ?></b></td>
                         <?php foreach($existsectwo['ctotval'] as $skey => $siterec) { ?>
                        <th ><span> <?php echo $siterec; ?> </span></th>
                       <?php }?>
                           </tr>
                           
                          
                           <tr>
                        <th style="background-color:#cce0d0;" class="text-left">Walkie Talkies</th>
                        <td class="secuhr text-left"><b>Not working / Total</b></td>
                         <?php foreach($existsectwo['wlkt'] as $skey => $siterec) { ?>
                        <th ><span> <?php echo $siterec; ?> </span></th>
                       <?php }?>
                           </tr>

                           
                           <tr>
                        <th style="background-color:#b8cde6;" class="text-left">Biometric</th>
                        <td class="secuhr text-left"><b>Not working / Total</b></td>
                        <?php foreach($existsectwo['biometric'] as $skey => $siterec) { ?>
                        <th ><span> <?php echo $siterec; ?> </span></th>
                       <?php }?>
                          </tr>
                          
                           
                           <tr>
                          <th style="background-color:#cce0d0;" class="text-left">Bi-cycle</th>
                        <td class="secuhr text-left"><b>Not working / Total</b></td>
                       <?php foreach($existsectwo['bicycle'] as $skey => $siterec) { ?>
                        <th ><span> <?php echo $siterec; ?> </span></th>
                       <?php }?>
                          </tr>
                          
                           <tr>
                       <th style="background-color:#b8cde6;" class="text-left">Computers</th>
                        <td class="secuhr text-left"><b>Not working / Total</b></td>
                       <?php foreach($existsectwo['computer'] as $skey => $siterec) { ?>
                        <th ><span> <?php echo $siterec; ?> </span></th>
                       <?php }?>
                          </tr>
                          
                              <tr>
                       <th style="background-color:#cce0d0;" class="text-left">Internet Connection</th>
                        <td class="secuhr text-left"><b>Available / Not</b> </td>
                       <?php foreach($existsectwo['internetcon'] as $skey => $siterec) { ?>
                        <th ><span> <?php echo $siterec; ?> </span></th>
                       <?php }?>
                          </tr>
                          
                           <tr>
                       <th style="background-color:#b8cde6;" class="text-left">Street Lights</th>
                        <td class="secuhr text-left"><b>Status</b></td>
                       <?php foreach($existsectwo['stlights'] as $skey => $siterec) { ?>
                        <th ><span> <?php echo $siterec; ?> </span></th>
                       <?php }?>
                          </tr>
                          
                             <tr>
                       <th style="background-color:#cce0d0;" class="text-left">Tourch Lights</th>
                        <td class="secuhr text-left"><b>Not working / Total</b></td>
                       <?php foreach($existsectwo['torch'] as $skey => $siterec) { ?>
                        <th ><span> <?php echo $siterec; ?> </span></th>
                       <?php }?>
                          </tr>
                          
                            <tr>
                       <th style="background-color:#b8cde6;" class="text-left">Batons</th>
                        <td class="secuhr text-left"><b>Total</b></td>
                        <?php foreach($existsectwo['batons'] as $skey => $siterec) { ?>
                        <th ><span> <?php echo $siterec; ?> </span></th>
                       <?php }?>
                          </tr>
                           
                        </tbody>
                      </table>
                      <?php } ?> <br><br>

                        <?php if(isset($existsec['sites'])) { ?>
                          <table width="100%" border="1" cellspacing="0" style="margin-bottom:50px;">
                        <tbody>
                          <tr style="background-color:#2f4050;color:#fff;">
                           <th colspan="<?php echo count($existsec['sites']) + 2; ?>" style="font-size:15px;">Daily Security Data</th>
                          </tr>
                          
                      <tr style="background-color:#e9c085;">
                        <th colspan="2">Category</th>
                        <?php foreach($existsec['sites'] as $skey => $siterec) { ?>
                        <th > <?php  echo $siterec; ?> </th>
                       <?php }?>
                      
                      </tr>
                          
                       
                        
                             <tr>
                        <th rowspan="8" style="background-color:#b8cde6;" class="text-left">Manpower</th>
                        <td class="text-left"><b>Guards</b></td>
                         <?php foreach($existsec['guards'] as $skey => $siterec) { ?>
                        <th ><span> <?php echo $siterec; ?> </span></th>
                       <?php }?>
                        
                            </tr>
                          
                            <tr>
                        <td class="text-left"><b>Lady Guards</b></td>
                        <?php foreach($existsec['l_guards'] as $skey => $siterec) { ?>
                        <th ><span> <?php echo $siterec; ?> </span></th>
                       <?php }?>
                          </tr>
                          
                          
                             <tr>
                        <td class="text-left"><b>Head guard</b></td>
                       <?php foreach($existsec['h_guards'] as $skey => $siterec) { ?>
                        <th ><span> <?php echo $siterec; ?> </span></th>
                       <?php }?>
                        
                          </tr>
                          
                          
                          
                             <tr>
                      <td class="text-left"><b>Supervisors</b></td>
                        <?php foreach($existsec['supervisors'] as $skey => $siterec) { ?>
                        <th ><span> <?php echo $siterec; ?> </span></th>
                       <?php }?>
                        
                          </tr>
                          
                          
                         
                             <tr>
                          <td class="text-left"><b>ASO</b></td>
                        <?php foreach($existsec['aso'] as $skey => $siterec) { ?>
                        <th ><span> <?php echo $siterec; ?> </span></th>
                       <?php }?>
                          
                          </tr>
                          
                           <tr>
                       <td class="text-left"><b>SO</b></td>
                        <?php foreach($existsec['so_num'] as $skey => $siterec) { ?>
                        <th ><span> <?php echo $siterec; ?> </span></th>
                       <?php }?>
                          </tr>
                          
                          <tr>
                       <td class="text-left"><b>Hill Park - Hub Reserves</b></td>
                        <?php foreach($existsec['hillpark_hub'] as $skey => $siterec) { ?>
                        <th ><span> <?php echo $siterec; ?> </span></th>
                       <?php }?>
                          </tr>
                          
                           <tr>
                           <?php $tval = 0; foreach($existsec['ctotval'] as $skey => $siterec) { $tval = $tval + (int)$siterec; } ?>
                         <td class="text-left"><b>Total-<?php echo $tval; ?></b></td>
                         <?php foreach($existsec['ctotval'] as $skey => $siterec) { ?>
                        <th ><span> <?php echo $siterec; ?> </span></th>
                       <?php }?>
                           </tr>
                          
                           <tr>
                        <th style="background-color:#cce0d0;" class="text-left">Walkie Talkies</th>
                        <td class="secuhr text-left"><b>Not working / Total</b></td>
                         <?php foreach($existsec['wlkt'] as $skey => $siterec) { ?>
                        <th ><span> <?php echo $siterec; ?> </span></th>
                       <?php }?>
                           </tr>

                           
                           <tr>
                        <th style="background-color:#b8cde6;" class="text-left">Biometric</th>
                        <td class="secuhr text-left"><b>Not working / Total</b></td>
                        <?php foreach($existsec['biometric'] as $skey => $siterec) { ?>
                        <th ><span> <?php echo $siterec; ?> </span></th>
                       <?php }?>
                          </tr>
                          
                           
                           <tr>
                          <th style="background-color:#cce0d0;" class="text-left">Bi-cycle</th>
                        <td class="secuhr text-left"><b>Not working / Total</b></td>
                       <?php foreach($existsec['bicycle'] as $skey => $siterec) { ?>
                        <th ><span> <?php echo $siterec; ?> </span></th>
                       <?php }?>
                          </tr>
                          
                           <tr>
                       <th style="background-color:#b8cde6;" class="text-left">Computers</th>
                        <td class="secuhr text-left"><b>Not working / Total</b></td>
                       <?php foreach($existsec['computer'] as $skey => $siterec) { ?>
                        <th ><span> <?php echo $siterec; ?> </span></th>
                       <?php }?>
                          </tr>
                          
                              <tr>
                       <th style="background-color:#cce0d0;" class="text-left">Internet Connection</th>
                        <td class="secuhr text-left"><b>Available /Not </b></td>
                       <?php foreach($existsec['internetcon'] as $skey => $siterec) { ?>
                        <th ><span> <?php echo $siterec; ?> </span></th>
                       <?php }?>
                          </tr>
                          
                           <tr>
                       <th style="background-color:#b8cde6;" class="text-left">Street Lights</th>
                        <td class="secuhr text-left"><b>Status</b></td>
                       <?php foreach($existsec['stlights'] as $skey => $siterec) { ?>
                        <th ><span> <?php echo $siterec; ?> </span></th>
                       <?php }?>
                          </tr>
                          
                             <tr>
                       <th style="background-color:#cce0d0;" class="text-left">Tourch Lights</th>
                        <td class="secuhr text-left"><b>Not working / Total</b></td>
                       <?php foreach($existsec['torch'] as $skey => $siterec) { ?>
                        <th ><span> <?php echo $siterec; ?> </span></th>
                       <?php }?>
                          </tr>
                          
                            <tr>
                       <th style="background-color:#b8cde6;" class="text-left">Batons</th>
                        <td class="secuhr text-left"><b>Total</b></td>
                        <?php foreach($existsec['batons'] as $skey => $siterec) { ?>
                        <th ><span> <?php echo $siterec; ?> </span></th>
                       <?php }?>
                          </tr>
                          
                        </tbody>
                      </table> <?php } ?> 
                   
           <!--     <p style="padding-top:3px;margin-bottom:5px;">* Dry run protection and single phase preventer is essential to protect the broewell from over load/under load and dry run. </p>-->
                     
                    </div>
    
                        
                </div>
              </div>
            </div>
