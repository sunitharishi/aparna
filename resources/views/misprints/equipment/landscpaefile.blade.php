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
	
	table tr td.sarlef
	{
	text-align:left;
	}
	
	table tr th p, table tr td p
	{
	 white-space:nowrap;
	 word-break:normal;
	 margin:0px;
	}
	.codel-infoirmation b
	{
	 float:left;
	}
	.codel-infoirmation table
	{
	 width:80% !important;
	 float:left;
	  margin-top:4px;
	}
	.codel-infoirmation table tr td
	{
	 vertical-align:top;
	  width:80% !important;
	  border-right:0px !important;
	  font-size:12px;
	
	}
	.description-root-cause thead tr th
	{ 
	 font-size:13px;
	 padding:8px 5px;
	 
	}
	.description-root-cause tbody tr td
	{ 
	 font-size:13px;
	  padding:8px 5px;
	 
	}
	.description-root-cause tbody tr td.text-center
	{
	 text-align:center;
	}
	.description-root-cause tbody tr th.text-center
	{
	 text-align:center;
	}
	.description-root-cause tbody tr th
	{ 
	 font-size:14px;
	  padding-left:5px;
	  
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

<div class="manjeera">
	<?php $keysarray =array("1"=>"3 Panel","2"=>"4 Panel","3"=>"CTPT","4"=>"5 Panel","5"=>"Transformers","6"=>"Main Pcc Panel","7"=>"APFCR","8"=>"Common Supply Panel","9"=>"Bus Duct","10"=>"Distrbution Board","11"=>"VCB","12"=>"ACB","13"=>"Landscape Lighting Panel","14"=>"Club House Panel","15"=>"Lighting Arrestor","16"=>"Total No. Of Lights","17"=>"Lifts","18"=>"ARD Batteries","19"=>"DG Sets","20"=>"Partial Backup","21"=>"Borewells","22"=>"HMWS&SB Meter","23"=>"Water Distribution System","24"=>"FWS","25"=>"PRVs","26"=>"Sewerage System","27"=>"Irrigation Pumps","28"=>"Irrigation Pump Panels","29"=>"Irrigation Sprinkler Automation System","30"=>"Water Body Pumps","31"=>"Fountain","32"=>"Storm Water Pump","33"=>"Oozing Pumps","34"=>"Excess Rain Water Pump","35"=>"Rain Water Harvesting Pits","36"=>"Indoor Pool Pumps","37"=>"Outdoor Pool Pumps","38"=>"Baby Pool","39"=>"Boom Barrier","40"=>"Solar Fencing","41"=>"CCTV","42"=>"Gas Bank & Chambers","43"=>"Fresh Air","44"=>"STP AHU"); ?>

<?php if(isset($issuetemp[$ikey])) { ?>
    <div class="myElementClass" >
        <table width="100%" border="1" cellspacing="0" class="description-root-cause">
            <tbody>
                <tr>
                	<th colspan="<?php echo (int)$issuecn + 1;   ?>" style="font-size:14px;padding:6px 0px;text-align:center;"> <span><?php echo get_sitename($ikey); ?> </span> 
					- Equipment Not Working Data</th>
                </tr>
                
                <tr>
                    <th style="text-align:left;padding-left:5px;"><b>Category</b></th>
                    
                    
                    
                    <?php $cm = "";foreach($issuetemp[$ikey]['category'] as $ky => $issuer) { ?>
                    
                    <th class="text-center"><b><?php echo $keysarray[$issuer];  ?></b></th>
                    
                    
                    <?php } ?>
                
                </tr>
                <tr> 
                    <td style="text-align:left;padding-left:5px;"><b>S.No</b></td>
                    <?php $c = "";foreach($issuetemp[$ikey]['category'] as $ky => $issuer) { ?>
                    <td class="text-center"><span><?php echo $issuer;   ?></span></td>
                    
                    
                    <?php } ?>
                </tr>
                <tr>
                    <td style="text-align:left;padding-left:5px;"><b>Description of Issue</b></td>
                    
                    <?php foreach($issuetemp[$ikey]['issue_des'] as $ky => $issuer) { ?>
                    <td class="text-center"><span><?php echo $issuer; ?></span></td>
                    
                    <?php } ?>
                </tr>
                <tr>
                    <td style="text-align:left;padding-left:5px;"><b>Root Cause</b></td>
                    <?php foreach($issuetemp[$ikey]['root_cause'] as $ky => $issuer) { ?>
                    <td class="text-center"><span><?php echo $issuer; ?></span></td>
                    
                    <?php } ?>
                </tr>
                <tr>
                    <td style="text-align:left;padding-left:5px;"><b>Action Required / Planned</b></td>
                    <?php foreach($issuetemp[$ikey]['act_req_plan'] as $ky => $issuer) { ?>
                    <td class="text-center"><span><?php echo $issuer; ?></span></td>
                    
                    <?php } ?>
                </tr> 
                <tr>
                    <td style="text-align:left;padding-left:5px;"><b>Pending from days</b></td>
                    <?php foreach($issuetemp[$ikey]['pendingfromdays'] as $ky => $issuer) { ?>
                    <td class="text-center"><span><?php echo $issuer; ?></span></td>
                    
                    <?php } ?>
                </tr>
                 
                   <tr>
                    <td style="text-align:left;padding-left:5px;"><b>Estimated Date of Completion</b></td>
                    <?php foreach($issuetemp[$ikey]['estimation_time'] as $ky => $issuer) { ?>
                     <td class="text-center"><span><?php echo $issuer; ?></span></td>
                    <?php } ?>
                </tr>

                <tr>
                    <td style="text-align:left;padding-left:5px;"><b>Responsibility</b></td>
                    <?php foreach($issuetemp[$ikey]['reponsibility'] as $ky => $issuer) { ?>
                    <td class="text-center"><span><?php echo $issuer; ?></span></td>
                    
                    <?php } ?>
                </tr>
                <tr>
                    <td style="text-align:left;padding-left:5px;"><b>Notified to the concerned</b></td>
                    <?php foreach($issuetemp[$ikey]['notify_concern'] as $ky => $issuer) { ?>
                    <td class="text-center"><span><?php echo $issuer; ?></span></td>
                    
                    
                    <?php } ?>
                </tr>
              
            </tbody>
        </table>
        
    </div>  



<?php  }?>
</div>
  </body>
</html>

 