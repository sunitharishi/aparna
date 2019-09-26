<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>NOC</title>

    <!-- Bootstrap -->
    <link rel="icon" href="images/ICON.png">
  
    
    <style>
	
 	body
	{
	 font-family:Arial, Helvetica, sans-serif;
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
	margin-bottom:5px;
	}
	.first-div
	{
	 width:100%;
	 float:left;
	 
	 overflow:hidden;
	}
	.first-div table
	{
	 border-collapse:collapse;
	  overflow:hidden;
	}
	.first-div table thead tr th
	{
	text-align:center;
	padding:1px;
	font-size:12px;
	}
	.first-div table tbody tr td
	{
	text-align:center;
	padding:1px;
	font-size:12px;
	}
	.first-div table tbody tr td table thead tr th
	{
	 padding:6px 0px;
	}
	.first-div table tbody tr td table tbody tr td
	{
	 padding:6px 0px;
	}
	.x_panel.fixed_height_400
	{
	 border:0px;
	 padding:0px;
	}
	p
	{
	 white-space:nowrap;
	 word-break:normal;
	 margin-top:4px;
	 margin-bottom:4px;
	}
	.inner-sarvoure tr td, .inner-sarvoure tr th
	{
	 padding:6px;
	}
	</style>
  </head>

  <body>                   
<div class="manjeera">
    <div class="heading-div">
    	<h3 style="font-size:14px;padding:6px 0px;margin:0px;">Status of Fire NOC Renewals as on <?php echo $report_on; ?></h3>
    </div>
    <div class="row">
        <div class="first-div">
        
            <table width="100%" border="0">
                <tr>
                        <td style="border:0px;vertical-align:top;width:50%;">
                		@if (count($graderes) > 0)
                    <table width="100%" border="1"  class="inner-sarvoure" cellpadding="6">
                        <thead>
                            <tr>
                            	<th colspan="4">SAROVAR GRANDE FIRE NOC DETAILS</th>
                            </tr>
                            <tr>
                                <th style="line-height:30px;">S.No</th>
                                <th style="line-height:30px;">Block</th>
                                <th style="line-height:30px;"><p>Valid up to</p></th>
                                <th style="line-height:30px;">Name Changed to Society</th>
                            </tr>
                        </thead>
                        <tbody>
							<?php $i = 1; if(isset($graderes)) { foreach($graderes as $nocdata) {?>
                            <tr>
                            
                            <td style="line-height:30px;"><span><?php echo $i; ?></span></td>
                            <td style="line-height:30px;"><span><?php echo  $nocdata['blockname'];?></span></td>
                            <td style="line-height:30px;"><span><?php echo $nocdata['valid_upto'];?></span></td>
                            <td style="line-height:30px;"><span><?php echo $nocdata['name_change_socity'];?></span></td>  
                        
                        </tr>     
                        <?php $i = $i + 1; } }?>
                        <?php  if(isset($gradeinfo) && $gradeinfo !="") { ?>
                        <tr>
                        	<td colspan="4">
                            	<?php echo $gradeinfo; ?>
                            </td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table> 
                    @endif
                    <br><br>
                      @if (count($aurares) > 0)
                        <table cellpadding="0" cellspacing="0" border="1" width="100%" class="table table-bordered">
                            <thead>
                                <tr>
                                	<th colspan="4" style="padding:6px;">AURA FIRE NOC DETAILS</th>
                                </tr>
                                <tr>
                                    <th>S.No</th>
                                    <th>Block</th>
                                    <th><p>Valid up to</p></th>
                                    <th>Name Changed to Society</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; if(isset($aurares)) { foreach($aurares as $nocdata) {?>
                                <tr>
                                
                                    <td style="border:1px solid #000000;"><?php echo $i; ?></td>
                                    <td><?php echo  $nocdata['blockname'];?></td>
                                    <td><?php echo $nocdata['valid_upto'];?></td>
                                    <td><?php echo $nocdata['name_change_socity'];?></td> 
                                
                                </tr>     
                            <?php $i = $i + 1; } }?>
							<?php  if(isset($aurainfo)  && $aurainfo !="") { ?>
							<tr>
								<td colspan="4">
									<?php echo $aurainfo; ?>
								</td>
							</tr>
							<?php } ?>
                            </tbody>
                    </table>
                    
                    @endif
               
            </td>
            <td style="border:0px;vertical-align:top;padding-right:6px;">
                
                    @if (count($cyberres) > 0)
                        <table cellpadding="0" cellspacing="0" border="1" width="100%" class="table table-bordered">
                            <thead>
                                <tr>
                                	<th colspan="4" style="overflow:hidden;padding:6px;">CYBER LIFE FIRE NOC DETAILS</th>
                                </tr>
                                <tr>
                                    <th style="line-height:30px;" >S.No</th>
                                    <th style="line-height:30px;">Block</th>
                                    <th style="line-height:30px;">Valid up to</th>
                                    <th style="line-height:30px;">Name Changed to Society</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; if(isset($cyberres)) { foreach($cyberres as $nocdata) {?>
                            <tr>
                                
                                <td style="border:1px solid #000000;line-height:30px;"><?php echo $i; ?></td>
                                <td style="line-height:30px;"><?php echo  $nocdata['blockname'];?></td>
                                <td style="line-height:30px;"><?php echo $nocdata['valid_upto'];?></td>
                                <td style="line-height:30px;"><?php echo $nocdata['name_change_socity'];?></td>  
                            
                            </tr>     
                            <?php $i = $i + 1; } }?>
							 <?php  if(isset($cyberinfo) && $cyberinfo !="") { ?>
							<tr>
								<td colspan="4">
									<?php echo $cyberinfo; ?>
								</td>
							</tr>
							<?php } ?>
                            </tbody>
                        </table>
                    
                        @endif  <br><br>
                        
                      
                    
                    </td>
                    
                    <?php /*?><td style="border:0px;vertical-align:top;">
                    @if (count($cyberres) > 0)
                    
                    
                        <table cellpadding="0" cellspacing="0" border="1" width="100%" class="table table-bordered">
                            <thead>
                                <tr>
                                	<th colspan="4" style="padding:6px;">CYBERZON FIRE NOC DETAILS</th>
                                </tr>
                                <tr>
                                    <th style="border:1px solid #000000;">S.No</th>
                                    <th>Block</th>
                                    <th>Valid up to</th>
                                    <th>Name Changed to Society</th> 
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; if(isset($cyberres)) { foreach($cyberres as $nocdata) {?>
                                <tr>
                                
                                    <td style="border:1px solid #000000;"><span><?php echo $i; ?></span></td>
                                    <td><span><?php echo  $nocdata['blockname'];?></span></td>
                                    <td><span><?php echo $nocdata['valid_upto'];?></span></td>
                                    <td><span><?php echo $nocdata['name_change_socity'];?></span></td>  
                                
                                </tr>     
                            <?php $i = $i + 1; } } ?>
                            </tbody>
                        </table>
                        @endif
                    </td><?php */?>
                </tr>
            
            
            </table>
        </div>
   </div>
</div>
       
  </body>
</html>
 <script src="/vendors1/jquery/dist/jquery.min.js"></script>
 
