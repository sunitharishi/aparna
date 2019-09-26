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
	.mmrreport-eading
	{
	    margin-bottom:20px;
	}
	 .mmrreport-eading h2
{
 font-size: 18px;
    font-weight: 600;
    color: #666262;
    text-align: center;
text-transform:uppercase;
margin:-8px 0px  8px 0px;
}
.aparna-logo

{



 background-color:#0157a4;



 position:absolute;



 right:0px;



 top:-20px;



 padding:4px;



 width:120px;



 height:auto;



}
  .incident-summary
    {
 position:relative;
 font-size: 17px;
vertical-align:top;
font-weight:600;
margin-bottom:8px;
overflow:hidden;
}
.footer
{
 font-weight:100;
 font-size:16px !important;
 text-align:right;
 position:absolute;
 bottom:-20px;
 right:0px;
}
.soft-services
{
 font-weight:600;
 font-size:17px;
 text-decoration:underline;
}
	</style>
  </head>

  <body>                   
<div class="manjeera">
    <div class="mmrreport-eading">
    <h2>MMR REPORT FOR THE MONTH OF {{$monthname }}-{{ $report_year }}</h2>
      <img src="images/apms-logo.png" class="aparna-logo" >
</div>
	
	 
	<div class="incident-summary">Status of Fire NOC Renewals as on <?php echo date("d-m-Y",strtotime($report_on)); ?></div>

  
    <div class="row">
        <div class="first-div">
        
            <table width="100%" border="0">
                <tr>
               	 <td style="border:0px;vertical-align:top;padding-right:6px;">
                
                    @if (count($nocres) > 0)
                        <table cellpadding="0" cellspacing="0" border="1" width="100%" class="table table-bordered">
                            <thead>
                                <tr>
                                	<th colspan="4" style="overflow:hidden;padding:6px;"><?php echo strtoupper($sitename); ?> FIRE NOC DETAILS</th>
                                </tr>
                                <tr>
                                    <th style="line-height:30px;" >S.No</th>
                                    <th style="line-height:30px;">Block</th>
                                    <th style="line-height:30px;">Valid up to</th>
                                    <th style="line-height:30px;">Name Changed to Society</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; foreach($nocres as $nocdata) {?>
                            <tr>
                                
                                <td style="border:1px solid #000000;line-height:30px;"><?php echo $i; ?></td>
                                <td style="line-height:30px;"><?php echo  $nocdata['blockname'];?></td>
                                <td style="line-height:30px;"><?php echo $nocdata['valid_upto'];?></td>
                                <td style="line-height:30px;"><?php echo $nocdata['name_change_socity'];?></td>  
                            
                            </tr>     
                            <?php $i = $i + 1; } ?>
                             <?php  if(isset($noc_info) && $noc_info !="") { ?>
							<tr>
								<td colspan="4">
									<?php echo $noc_info; ?>
								</td>
							</tr>
							<?php } ?>
                            </tbody>
                        </table>
                    
                        @endif  <br><br>
                        
                      
                    
                    </td>
                        
                </tr>
            
            
            </table>
        </div>
   </div>
    <p class="footer">Aparna Property Management Services Pvt.Ltd.,</p>	
</div>
       
  </body>
</html>
 <script src="/vendors1/jquery/dist/jquery.min.js"></script>
 
