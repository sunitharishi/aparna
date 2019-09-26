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
	@media print
{
.previewprrrr {page-break-after:always !important;
}
}
	body
	{
	 font-family:Arial, Helvetica, sans-serif;
	}
	
	.templates-count tbody tr th
	{
	 font-size:12px;
	 padding:10px 2px;
	 vertical-align:middle;
	 
	}
	.templates-count tbody tr th.text-center
	{
	 text-align:center;
	}
	.templates-count tbody tr td.text-center
	{
	 text-align:center;
	}
	.templates-count tbody tr td
	{
	 font-size:12px;
	 padding:10px 2px;
	 
	}
	.templates-count tbody tr td:nth-child(1)
	{
	 padding-left:5px;
	}
	
	table tr td.sarlef
	{
	text-align:left;
	}
	
	table tr td p, table tr th p
	{
	 white-space:nowrap;
	 word-break:normal;
	 margin:0px;
	}
		.incident-summary
    {
     font-size:17px;
     clear:both;
    font-weight:600;
    padding-top:4px;
    }
    .mmrreport-eading h2
{
 font-size: 20px;
    font-weight: 600;
    color: #666262;
    text-align: center;
text-transform:uppercase;
margin:-6px 0px  8px 0px;
}
.aparna-logo

{



 background-color:#0157a4;



 position:absolute;



 right:-20px;



 top:-20px;



 padding:4px;



 width:110px;



 height:auto;



}
.footer
{
 font-weight:100;
 font-size:16px !important;
 text-align:right;
 position:absolute;
 bottom:-30px;
 right:0px;
vertical-align:bottom;
color:#ccc;
}
  .incident-summary
    {
 position:relative;
 font-size: 17px;
vertical-align:top;
font-weight:600;
}
.soft-services
{
 font-weight:600;
 font-size:17px;
 text-decoration:underline;
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
    <div class="mmrreport-eading">
    <h2 class="main-heading">MMR REPORT FOR THE MONTH OF <?php echo $monthname; ?>-<?php echo $report_year; ?></h2>
      <img src="images/apms-logo.png" class="aparna-logo" >
</div>
       <?php if($MICount == 0) { ?>
	 <div class="soft-services">TECHNICAL SERVICES</div>
	 <?php } ?>
	 
    <div class="manjeera">
		<?php $keysarray =array("1"=>"Jockey Pump","2"=>"Main Pump","3"=>"DG Pump","4"=>"Booster Pumps","5"=>"Dewatering Pumps","6"=>"Yard Hydrant Points","7"=>"Cellar Hydrant Points","8"=>"Sub Cellar Hydrant Points","9"=>"Fire Hose Reel Drums","10"=>"Fire Alarm System","11"=>"Public Addressing System","12"=>"Fire Extinguishers","13"=>"Carbon Emission System","14"=>"Flow Annunciator Panels - Fire Sprinkler","15"=>"CP Hoses","16"=>"Fire Alarm Repeater Panels","17"=>"Sprinkler Charged (floor wise)","18"=>"Fire Mock Drill & Emergency Evacuation","19"=>"False Fire Alarms","20"=>"Wet Raisers","21"=>"Sub Cellar-3 Hydrant Points","22"=>"PA System Repeater Panel","23"=>"Group Indication Panel"); ?>
        
        <?php // echo "<pre>"; print_r($issues[$ikey]); echo "</pre>"; ?>
        
        <?php  $ikey = $site;
		if(isset($issuetemp[$ikey])) { if(isset($issuetemp[$ikey]['category'])) { ?>
        <div class="myElementClass">
            <table width="100%" border="1" cellspacing="0" class="templates-count" style="margin-bottom:10px;">
                <tbody>
                    <tr>
                    	<th colspan="<?php //echo (int)$issuecn + 1;   ?>" style="font-size:14px;padding:6px 0px;text-align:center;"> <span><?php echo get_sitename($ikey); ?> - </span> Equipment Not Working Data</th>
                    </tr>
                    
                    <tr>
                        <th style="text-align:left;padding-left:5px;"><b>Category</b> </th>
                        
                        <?php $cnn = 0;
                        foreach($issuetemp[$ikey]['category'] as $ky => $issuer) { 
                        
                        if($issuer == "19") { $cnn = $cnn + 1; }  ?>
                        
                        <?php }  
                        ?>
                        
                        <?php $cm = "";foreach($issuetemp[$ikey]['category'] as $ky => $issuer) { 
                        
                        if($issuer == "19") { $colspan = "colspan='".$cnn."'"; } else {$colspan = "";} if($issuer == $cm) { }  else {?>
                        <th class="text-center" <?php echo $colspan ?>><b><?php echo $keysarray[$issuer];  $cm = $issuer;} ?></b></th>
                        
                        
                        <?php } ?>
                    
                    </tr>
                    <tr> 
                        <td class="sarlef"><b>S.No</b></td>
                        <?php $c = "";foreach($issuetemp[$ikey]['category'] as $ky => $issuer) { 
                        
                        if($issuer == "19") { $colspan = "colspan='".$cnn."'"; } else {$colspan = "";} if($issuer == $c) { }  else {?>
                        <td class="text-center" <?php echo $colspan ?>><span><?php echo $issuer;  $c = $issuer;} ?></span></td>
                        
                        
                        <?php } ?>
                    </tr>
                    <tr>
                        <td class="sarlef"><b>Description of Issue</b></td>
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
                        <td class="sarlef"><b>Action Required/ Planned</b></td>
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
                    <td class="sarlef"><b>Estimation Date</b></td>
						<?php foreach($issuetemp[$ikey]['estimation_time'] as $ky => $issuer) { ?>
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
                    <td class="sarlef"><b>Notified to the concerned</b></td>
						<?php foreach($issuetemp[$ikey]['notify_concern'] as $ky => $issuer) { ?>
                        <td class="text-center"><span><?php echo $issuer; ?></span></td>
                        
                        <?php } ?>
                    </tr>
                    
                    <?php }  ?>
                </tbody>
            </table>
        </div>  
    <?php if(isset($pagenumberval)) { echo "page -".$pagenumberval; } ?>
    <?php  }
    ?> 
    <p class="footer">Aparna Property Management Services Pvt.Ltd.,</p>
    </div>
  </body>
</html>

