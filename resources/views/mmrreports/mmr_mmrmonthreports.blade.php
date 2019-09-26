 <!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MMR Index</title>
    <!-- Bootstrap -->
    <link rel="icon" href="images/ICON.png">
   <!-- <link href="/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">-->
     <!--<link href="/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">-->

    <!-- Custom Theme Style -->
    <link href="/build/css/custom.css" rel="stylesheet">
 <link media="all" type="text/css" rel="stylesheet" href="{{ url('scripts/third/summernote') }}/summernote.css">
<style>
*
{
 font-family:Arial, Helvetica, sans-serif;
 color:#000;
}
.mmrreport-eading
{
    margin-bottom:10px;
}
.mmrreport-eading h2
{
 font-size: 18px;
    font-weight: 600;
    color: #000;
    text-align: center;
	margin-bottom:0px;
	margin-top:-8px;
text-transform:uppercase;
}
.reports-scope ul
{
 list-style:none;
 padding-left:9px;
 margin-bottom:15px;
 margin-top:10px;
}
.reports-scope ul li
{
 position:relative;
 padding-left: 33px;
    font-size: 12.6px;
	line-height:21px;
font-weight:600;
vertical-align:top;
	
}
ol
{
 margin-top:9px;
}
 ol li
 {
  font-size:12.6px;
  line-height:17px;
  font-weight:600;
  color:#000 !important;
  padding:2px 0px;
vertical-align:top;
 }
ol li:before
{
 list-style-type:decimal;
}
h4
{
 margin-bottom:15px;
 margin-top:5px;
 line-height:19px;
 padding:0px;

font-size:17px;
}
.reports-scope
{
 margin-bottom:4px;
}
.reports-scope ul li:before
{
 content:'';
 position:absolute;
  background: url(/images/bullet1.png);
    background-size: contain;
   left: 5px;
    top: 0px;
    width: 14px;
    height: 14px;
}
.panel-mmrcontent p
{
 line-height:21px;
 margin-bottom:0px;
 font-size:15px;
font-weight:600;
}
.aparna-logo
{
 background-color:#0157a4;
 position:absolute;
 right:0px;
 top:-20px;
 padding:4px;
 width:110px;
 height:auto;
}
.body-tage
{
 position:relative;
}
.footer
{
 font-weight:100 !important;
 font-size:16px !important;
 text-align:right;
 position:absolute;
 bottom:-40px;
 right:0px;
}
.main-heading
{
    margin:0px 0px 10px 0px;
}
</style>
<body class="body-tage">
<div class="mmrreport-eading">
    <h2 class="main-heading">MMR REPORT FOR THE MONTH OF <?php echo $report_month; ?>-<?php echo $report_year; ?>
    <img src="images/apms-logo.png" class="aparna-logo" ></h2>
</div>

<div class="row">  
    <div class="panel-mmrcontent">
    	<p style="margin-bottom:2px;">This report is a review on our performance during the last month and is an attempt to analyze and evaluate our service delivery and make a progressive step forward with implementation plan.</p>
        <p style="margin-bottom:10px;">The following points are put forward for review</p>
        <div class="reports-scope">
        	<h4>Reports:</h4>
            <ul>
            	<li>Scope and nature of service</li>
                <?php if($Manpower_Count>0) { ?><li>Proposed Manpower and Availability Man power</li><?php } ?>
                <?php if($SLAAdherenceCount>0) { ?><li>SLA Adherence report</li><?php } ?>
            </ul>
        </div>
		<?php if($MajorIncidents_Count>0 || $Equipmentmisres_Count>0 || $Amctracker_Count>0 || $PlannedPreventives_Count>0 || $PlannedPreventives_NCount>0 || $PowerConsum_Count>0  || $PowerfailureCount>0  || $dggeneratedCount>0  || $Metro_Water_Consumption>0  || $Metro_Water_Consumption>0 || $WtrCount>0  || $WtrCount>0  || $Initiative_Count>0 || $FSCount>0 || $Apnacomplaintmisreport_Count>0) { ?>
        <div class="">
           <h4>Technical Services:</h4>
        	<ol>
            	<?php if($MajorIncidents_Count>0) { ?> <li>Major Incidents</li> <?php } ?>
                <?php if($Equipmentmisres_Count>0) { ?><li>Equipment Status </li><?php } ?>
                <?php if($Amctracker_Count>0) { ?><li>Warranty/AMC</li><?php } ?>
              
                <?php if($PlannedPreventives_Count>0){ ?><li>Planned Preventive Maintenance</li><?php } ?>
                <?php if($PowerConsum_Count>0) { ?><li>Power Consumption Analysis</li><?php } ?>
                <?php if($PowerfailureCount>0) { ?><li>Power Failure Analysis</li><?php } ?>
                <?php if($dggeneratedCount>0) { ?><li>DG Generated Power KWH</li><?php } ?>
                <?php if($Metro_Water_Consumption>0) {  ?><li>Water Consumption Analysis</li><?php } ?>
                <?php if($WtrCount>0) {  ?><li>WSP Water Test Reports </li><?php } ?>
                <li>STP Water Test Reports </li>
                <?php if($Initiative_Count>0) { ?><li>Initiative Taken / Proactive</li> <?php } ?>
                <?php if($FSCount>0) { ?><li>Fire Safety</li><?php } ?>
                <?php if($Apnacomplaintmisreport_Count>0) { ?><li>Complaints</li><?php } ?>
            </ol>
        </div>
		<?php } ?>
		<?php if($Housekeeping_Count>0 || $Housekeeping_Consume_Count>0 || $HkCriticalMachinery_Count>0 || $Pets_Count>0 || $Horticulture_Count>0 || $Horticulture_Consume_Count>0) { ?>
        <div class="">
           <h4>Soft Services:</h4>
        	<ol>
        	    <?php if($HkCriticalMachinery_Count>0) { ?><li>Housekeeping Critical Machinery</li><?php } ?>
            	<?php if($Housekeeping_Count>0) { ?><li>Housekeeping Activities</li><?php } ?>
                <?php if($Housekeeping_Consume_Count>0) { ?><li>Housekeeping Consumables</li><?php } ?>            
                <?php if($Pets_Count>0) { ?><li>Pest Control</li><?php } ?>
                 <li>Horticulture Critical Machinery</li>
                <?php if($Horticulture_Count>0) { ?><li>Horticulture Activities</li><?php } ?>
                <?php if($Horticulture_Consume_Count>0) { ?><li>Horticulture Consumables</li><?php } ?>
               
            </ol>
        </div>
		<?php } ?>
		<?php if($Violation_Count>0 || $ValueAdds_Count>0 || $Suggestions_Count>0 || $Requisition_Count>0) { ?>
        <div class="">
           <h4>Others:</h4>
        	<ol>
            	<?php if($Violation_Count>0) { ?><li>Violations</li><?php } ?>
                <?php if($ValueAdds_Count>0) { ?><li>Value Adds</li><?php } ?>
                <?php if($Suggestions_Count>0) { ?><li>Suggestions</li><?php } ?>
                <?php if($Requisition_Count>0) { ?><li>Requisition</li><?php } ?>
               <!-- <li>Indents</li>-->
            </ol>
        </div>
		<?php } ?>
        <p class="footer">Aparna Property Management Services Pvt. Ltd.,</p>
    </div>					 
</div>
</body>				   
					

</html>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
