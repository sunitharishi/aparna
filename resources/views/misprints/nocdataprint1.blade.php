<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Daily Security Data</title>

    <!-- Bootstrap -->
    <link rel="icon" href="images/ICON.png">
    <link href="/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/build/css/custom.css" rel="stylesheet">
    
    <style>
	
 	body
	{
	 font-family: "Open Sans", sans-serif;
	}

	.x_title
	{
	border-bottom:none;
	padding:0px;
	margin:0px;
	}
	.heading-div
	{
	text-align:center;
	border:1px solid #000;
	margin-bottom:10px;
	clear:both;
	}
	.first-div
	{
	 overflow:hidden;
	 width:100%;
	 float:left;
	 clear:both;
	}
	.first-div table
	{
	 border-collapse:collapse;
	 float:left;
	}
	.first-div table thead tr th
	{
	text-align:center;
	padding:4px;
	font-size:12px;
	}
	.first-div table tbody tr td
	{
	text-align:center;
	padding:4px;
	font-size:12px;
	}
	.second-div
	{
	 overflow:hidden;
	  width:100%;
	 float:left;
	}
	.second-div  table
	{
	 border-collapse:collapse;
	 border:1px solid #000;
	}
	.second-div table thead tr th
	{
	text-align:center;
	padding:4px;
	font-size:12px;
	border:1px solid #000 !important;
	}
	.second-div  table tbody tr td
	{
	text-align:center;
	padding:4px;
	font-size:12px;
	border:1px solid #000 !important;
	}
	.x_panel.fixed_height_400
	{
	 border:0px;
	 padding:0px;
	}
	
	
	</style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
      

        <!-- page content -->
        <div class="right_col" role="main">

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12" style="width:100%;">
              <div class="x_panel tile fixed_height_400">
                <div class="x_title">
                   <!--<h3>Metro Water Supply details from  01.12.2017 to 31.12.2017</h3>-->
                </div>
                <div class="x_content"> 
                	<!--<div class="land-scaping">
                    	<h4><b>Land Scaping</b></h4>
                    </div>  -->
                    
                    <div class="manjeera">
                         
                         <?php /*?><!--<div class="heading-div">
                           <h3>Status of Fire NOC Renewals as on <?php echo $report_on; ?></h3>
                        </div>
                        <br>--><?php */?>
                     	<div style="width:100%; display:block; clear:both;">
                        	<div class="row" style="clear:both;width:100%;">
                      <div class="first-div" style="display:inline-block; width:100%;">
					   @if (count($graderes) > 0)
                         <table width="100%" border="1" style="margin-bottom:20px;">
                            <thead>
                               <tr>
                                   <th colspan="4">SAROVAR GRANDE FIRE NOC DETAILS</th>
                               </tr>
                               <tr>
                                  <th>S.No</th>
                                  <th>Block</th>
                                 <th>Valid up to</th>
                                 <th>Name Changed to Society</th>
                               </tr>
                            </thead>
                            <tbody>
                             <?php $i = 1; if(isset($graderes)) { foreach($graderes as $nocdata) {?>
                        <tr>
                        
						<td><span><?php echo $i; ?></span></td>
						<td><span><?php echo  $nocdata['blockname'];?></span></td>
						<td><span><?php echo $nocdata['valid_upto'];?></span></td>
						<td><span><?php echo $nocdata['name_change_socity'];?></span></td>  
                      
					    </tr>     
						<?php $i = $i + 1; } }?>
                              </tbody>
                             </table>
                             @endif
                             
                             
                              
                              <?php /*?> @if (count($avenues) > 0) 
                              <table width="50%" border="1">
                                 <thead>
                                <tr style="border:1px solid #000;">
                                  <th colspan="4"><b>Hill Park Avenues FIRE NOC DETAILS</b></th>
                               </tr>
                                <tr>
                                  <th>S.No</th>
                                  <th>Block</th>
                                 <th>Valid up to</th>
                                 <th>Name Changed to Society</th>
                               </tr>
                               </thead>
                               <tbody>
                               <?php $i = 1; if(isset($avenues)) { foreach($avenues as $nocdata) {?>
                        <tr>
                        
						<td><span><?php echo $i; ?></span></td>
						<td><span><?php echo  $nocdata['blockname'];?></span></td>
						<td><span><?php echo $nocdata['valid_upto'];?></span></td>
						<td><span><?php echo $nocdata['name_change_socity'];?></span></td>  
                      
					    </tr>     
						<?php $i = $i + 1; }  }?>
                               </tbody>
                            </tbody>
                         </table>
                     
					   @endif<?php */?>
                       
                       
                       <?php /*?> @if (count($lakeb) > 0)
                              <table width="50%" border="1" style="margin-bottom:40px;border:1px solid #000;">
                            <thead>
                               <tr>
                                   <th colspan="4" style="border:1px solid #000;">Hill Park Lake Breeze FIRE NOC DETAILS</th>
                               </tr>
                               <tr>
                                  <th>S.No</th>
                                  <th>Block</th>
                                 <th>Valid up to</th>
                                 <th>Name Changed to Society</th>
                               </tr>
                            </thead>
                            <tbody>
                              <?php $i = 1; if(isset($lakeb)) { foreach($lakeb as $nocdata) {?>
                        <tr>
                        
						<td><span><?php echo $i; ?></span></td>
						<td><span><?php echo  $nocdata['blockname'];?></span></td>
						<td><span><?php echo $nocdata['valid_upto'];?></span></td>
						<td><span><?php echo $nocdata['name_change_socity'];?></span></td>  
                      
					    </tr>     
						<?php $i = $i + 1; } }?>
                            </tbody>
                         </table> 
                             @endif<?php */?>
                         </div>
					 <?php /*?> @if (count($lakeb) > 0)<?php */?> 
                      <div class="second-div">
                        <?php /*?> <table width="100%" border="1" style="margin-bottom:40px;border:1px solid #000;">
                            <thead>
                               <tr>
                                   <th colspan="4" style="border:1px solid #000;">Hill Park Lake Breeze FIRE NOC DETAILS</th>
                               </tr>
                               <tr>
                                  <th>S.No</th>
                                  <th>Block</th>
                                 <th>Valid up to</th>
                                 <th>Name Changed to Society</th>
                               </tr>
                            </thead>
                            <tbody>
                              <?php $i = 1; if(isset($lakeb)) { foreach($lakeb as $nocdata) {?>
                        <tr>
                        
						<td><span><?php echo $i; ?></span></td>
						<td><span><?php echo  $nocdata['blockname'];?></span></td>
						<td><span><?php echo $nocdata['valid_upto'];?></span></td>
						<td><span><?php echo $nocdata['name_change_socity'];?></span></td>  
                      
					    </tr>     
						<?php $i = $i + 1; } }?>
                            </tbody>
                         </table>
						  @endif<?php */?>
                       <?php /*?>  @if (count($towers) > 0) 
                         <table width="100%" border="1" style="border:1px solid #000;">
                            <thead>
                                <tr>
                                   <th colspan="4">TOWERS FIRE NOC DETAILS</th>
                                </tr>
                                 <tr>
                                  <th>S.No</th>
                                  <th>Block</th>
                                 <th>Valid up to</th>
                                 <th>Name Changed to Society</th>
                               </tr>
                            </thead>
                            <tbody>
                             <?php $i = 1; if(isset($towers)) { foreach($towers as $nocdata) {?>
                        <tr>
                        
						<td><span><?php echo $i; ?></span></td>
						<td><span><?php echo  $nocdata['blockname'];?></span></td>
						<td><span><?php echo $nocdata['valid_upto'];?></span></td>
						<td><span><?php echo $nocdata['name_change_socity'];?></span></td>  
					    </tr>     
						<?php $i = $i + 1; } }?>
                            </tbody>
                         </table>
						 
						  @endif<?php */?>
                      </div>
                      </div>
                        </div>
                    </div>
                    
                </div>
              </div>
            </div>            
          </div>
          
 

          
        </div>
        <!-- /page content -->

        <!-- footer content -->
       
        <!-- /footer content -->
      </div>
    </div>


  </body>
</html>
 <script src="/vendors1/jquery/dist/jquery.min.js"></script>
 
