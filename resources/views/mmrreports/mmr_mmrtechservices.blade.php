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
}
.heading-nature
{
 position:relative;
 padding-left:33px;
 font-size: 17px;
vertical-align:top;
font-weight:600;
}
.heading-nature:before
{
 content: '';
    position: absolute;
    background: url(/images/bullet.png);
    background-size: contain;
   left: 9px;
    top: 0px;
    width: 18px;
    height: 17px;
}
.scope-imag
{
 text-align:center;
 margin-top:10px;
}
.mmrreport-eading
{
    margin-bottom:10px;
}
.mmrreport-eading h2
{
 font-size: 18px;
    font-weight: 600;
    color: #666262;
    text-align: center;
    margin-top:-8px;
    margin-bottom:0px;
text-transform:uppercase;
}
h3
{
 font-weight:600;
 font-size:20px;
 text-decoration:underline;
}
.scope-nature
{
 margin-bottom:20px;
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
 font-weight:100;
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
    <h2 class="main-heading">MMR REPORT FOR THE MONTH OF <?php echo $report_month; ?>-<?php echo $report_year; ?></h2>
    <img src="images/apms-logo.png" class="aparna-logo" >
</div>

<div class="row">  
    <h3>REPORTS</h3>
    <div class="scope-nature">
    	<div class="heading-nature">Scope and nature of service</div>
        <div class="scope-imag"><img src="images/circularimage.png"  /></div>
        
    </div>	
    <!--<div class="heading-nature">Proposed Manpower and Availability Man power</div>-->
     <p class="footer">Aparna Property Management Services Pvt. Ltd.</p>	 
</div>
</body>				   
					
</html>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

