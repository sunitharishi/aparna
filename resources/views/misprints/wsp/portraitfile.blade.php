<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Fire Safety</title>


    
    <style>
	body {
	  font-family:Arial, Helvetica, sans-serif;
	}
	
	.classic-folk tbody tr th 
	{
	padding:16px 6px;
	text-align:center;
	font-size:13.5px;
	vertical-align:middle;
	}
	.classic-folk tbody tr td 
	{
	padding:16px 6px;
	text-align:center;
	font-size:13.5px;
	}
	
 	.wspequadditionin tbody tr th
	{
	 padding:14px 6px;
	}
	.wspequadditionin tbody tr td
	{
	 padding:14px 6px;
	}
	
	
	table tr td.sarlef
	{
	text-align:left;
	}
	
	table tbody tr td p
	{
	 white-space:nowrap;
	 word-break:normal;
	 margin-bottom:5px;
	}
	.great-concerned tbody tr td
	{
	 font-size:14px;
	 text-align:center;
	 padding:17px 2px;
	 
	}
	.great-concerned tbody tr td:nth-child(1)
	{
	 padding-left:5px;
	}
	.great-concerned tbody tr td.sarlef
	{
	text-align:left;
	}
	.great-concerned tbody tr th
	{
	 font-size:14px;
	 text-align:center;
	 padding:17px 2px;
	}
	.great-concerned tbody tr th.sarlef
	{
	text-align:left;
	}
	.codel-infoirmation
	{
	 font-size:13px;
	 width:100%;
	  margin-top:4px;
	}
	 .codel-infoirmation .note-information
	 {
	  width:auto;
	  float:left;
	 }
	
	.codel-infoirmation b
	{
	 float:left;
	 margin-right:4px;
	}
	.codel-infoirmation p
	{
	 float:left;
	 margin-top:0px;
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

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
       

        <!-- page content -->
        <div class="right_col" role="main">

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12" style="width:100%;padding:0px;">
              <div class="x_panel tile fixed_height_400">
                <div class="x_title"> 
                   <!--<h3>Metro Water Supply details from  01.12.2017 to 31.12.2017</h3>-->
                </div>
                <div class="x_content">
                	<!--<div class="land-scaping">
                    	<h4><b>Land Scaping</b></h4>
                    </div>  -->
                    
                    <div class="manjeera">
				 <?php $keysarray =array("1"=>"Filter Feed Pump","2"=>"De-watering Pump","3"=>"Chlorine Dosing Pump","4"=>"Hydro Pneumatic Pump","5"=>"Pneumatic System Panel","6"=>"WSP MCC Panel","7"=>"Pressure Sand Filter","8"=>"Softener"); ?> 
                       
                        <?php // echo "<pre>"; print_r($issues[$ikey]); echo "</pre>"; ?>
                      
                       <?php  if(isset($issuetemp[$ikey])) { if(isset($issuetemp[$ikey]['category'])) { ?>
                          <div class="myElementClass">
						       <table width="100%" border="1" cellspacing="0" class="chlorine-dosing-pump" style="margin-bottom:15px;">
                        <tbody>
                          <tr>
                           <th colspan="<?php echo (int)$issuecn + 1;   ?>" style="font-size:15px;text-align:center;padding:5px;"> <span><?php echo get_sitename($ikey); ?> </span> STP Not working Data</th>
                          </tr>
                      
                       <tr>
                        <td style="text-align:left;vertical-align:middle;"><b>Category</b></td>
                        
                            
                           
                            <?php $cm = "";foreach($issuetemp[$ikey]['category'] as $ky => $issuer) { ?>
						          
                                 <td class="text-center" style="vertical-align:middle;"><b><?php  echo $keysarray[$issuer];  ?></b></td>
                                
                              
                           <?php } ?>
						   
                       </tr>
                             <tr> 
                             <td class="sarlef"><b>S.No</b></td>
                           <?php $c = "";foreach($issuetemp[$ikey]['category'] as $ky => $issuer) { ?>
                                 <td class="text-center"><span><?php echo $issuer;   ?></span></td>
                                
                              
                           <?php } ?>
                           </tr>
                           <tr>
                            <td style="text-align:left;"><b>Description of Issue</b></td>
                              
                           <?php foreach($issuetemp[$ikey]['issue_des'] as $ky => $issuer) { ?>
                                 <td class="text-center"><span><?php echo $issuer; ?></span></td>
                              
                           <?php } ?>
                           </tr>
                            <tr>
                              <td class="sarlef"><b>Root Cause</b></td>
                           <?php foreach($issuetemp[$ikey]['root_cause'] as $ky => $issuer) { ?>
                                 <td class="text-center"><span><?php echo $issuer; ?></span></td>
                              
                           <?php } ?>
                           </tr>
                             <tr>
                               <td class="sarlef"><b>Action Required / Planned</b></td>
                           <?php foreach($issuetemp[$ikey]['act_req_plan'] as $ky => $issuer) { ?>
                                 <td class="text-center"><span><?php echo $issuer; ?></span></td>
                              
                           <?php } ?>
                           </tr> 
                            <tr>
                            <td class="sarlef"><b>Pending from days</b></td>
                           <?php foreach($issuetemp[$ikey]['pendingfromdays'] as $ky => $issuer) { ?>
                                 <td class="text-center"><span><?php echo $issuer; ?></span></td>
                              
                           <?php } ?>
                           </tr>
                           <tr>
                            <td class="sarlef"><b>Responsibility</b></td>
                           <?php foreach($issuetemp[$ikey]['reponsibility'] as $ky => $issuer) { ?>
                                 <td class="text-center"><span><?php echo $issuer; ?></span></td>
                              
                           <?php } ?>
                           </tr>
						    <tr>
								<td class="sarlef"><b>Estimated Date of Completion</b></td>
								<?php foreach($issuetemp[$ikey]['estimation_time'] as $ky => $issuer) { ?>
								<td><span><?php echo $issuer; ?></span></td>
								
								<?php } ?>
							</tr>
                             <tr>
                             <td class="sarlef"><b>Notified to the concerned</b></td>
                           <?php foreach($issuetemp[$ikey]['notify_concern'] as $ky => $issuer) { ?>
                                 <td class="text-center"><span><?php echo $issuer; ?></span></td>
                              
                           <?php } ?>
                           </tr>
                      
                        </tbody>
                      </table>
						   </div>  
						   <?php //echo "page -".$pagenumberval; ?>
						 <?php  } }
                            ?> 
                      
                        
                     
                      
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

