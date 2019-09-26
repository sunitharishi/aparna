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
.mmrreport-eading
{
    margin-bottom:4px;
}
.mmrreport-eading h2
{
 font-size: 18px;
    font-weight: 600;
    color: #666262;
    text-align: center;
    margin-top:-8px;
text-transform:uppercase;
}

table
{
 margin:10px 0px;
 border-collapse:collapse;
}
table thead tr th, table tbody tr td
{
 padding:4px;
 font-size:12.6px;
}
table tr td hr
{
    border-top:0.5px solid #000;
}
table thead tr th p, table tbody tr td p
{
 white-space:nowrap;
 margin:0px;
}
.note
{
 clear:both;
}
.note span
{
 width:auto;
 float:left;
 margin-right:6px;
 vertical-align:top;
}
.note div
{
 width:auto;
 float:left;
 font-weight:600;
 margin-top:6px;
 vertical-align:top;
}
.incident-summary
{
 font-size:17px;
 clear:both;
font-weight:600;
padding-top:4px;
}
.scope-nature h3
{
 font-weight:600;
 font-size:20px;
 text-decoration:underline;
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
 bottom:-10px;
 right:0px;
 width:100%;
 display:block;
}
.soft-services
{
 font-weight:600;
 font-size:17px;
 text-decoration:underline;
}
img.img-thumbnail
{
    border:1px solid #000;
    padding:4px;
    border-radius:3px;
}
.main-heading
{
    margin:0px 0px 10px 0px;
}
</style>

<div class="mmrreport-eading">
    <h2 class="main-heading">MMR REPORT FOR THE MONTH OF {{ $monthname }}-{{ $year }}</h2>
      <img src="images/apms-logo.png" class="aparna-logo" >
</div>


<div class="row">  
    <div class="scope-nature">
        <div class="incident-summary">Major Incidents</div>
        <table width="100%" border="0">
        
        
            <?php $i = 0; ?>
            <tbody>
            @if(count($resval) > 0)
             @foreach($resval as $k => $val)
            	<tr>
                     <?php $i = $i + 1; ?>
                 
                	<td style="vertical-align:top;">
                	   <b>Incident Name:</b><?php if(isset($val->incident_name)) echo $val->incident_name; ?> <br>
                	   <b>Description of Incident:</b><?php if(isset($val->description)) echo $val->description; ?> <br>
                	   <b>Date & Time:</b><?php if(isset($val->report_on)) echo date("d-m-Y",strtotime($val->report_on)); ?> <br>
                       <b>Action Taken:</b><?php if(isset($val->action_taken)) echo $val->action_taken; ?> <br>
                       <b>Status:</b><?php if(isset($val->status)) echo $val->status; ?>
                    </td>
                    <?php if(isset($val->beforeimage)) { if($val->beforeimage) { ?>
                    <td style="width:160px;text-align:center;vertical-align:top;">
                     
                     
                       <img src="<?php  echo public_path('/')."hosekpact/tiny_".$val->beforeimage; ?>" style="width:150px; height:150px"; class="img-thumbnail"><br>
                     <b style="font-size:11px;">Before work completion</b>
                    </td>
                    <?php }} ?>
                    
                    <?php if(isset($val->afterimage)) { if($val->afterimage) {?>
                   <td style="width:160px;text-align:center;vertical-align:top;">
                     
                     <img src="<?php  echo public_path('/')."hosekpact/tiny_".$val->afterimage; ?>" style="width:150px; height:150px"; class="img-thumbnail"><br>
                     <b style="font-size:11px;">After work completion</b>
                 </td>
                 <?php }} ?> 
                </tr>
                <tr>
                    <?php if(isset($val->beforeimage)) {  ?>
                    <td style="padding:0px;" colspan="3"><hr></td>
                    <?php }  else if(isset($val->afterimage))  { ?>
                     <td style="padding:0px;" colspan="2"><hr></td>
                    <?php } else { ?>
                    <td style="padding:0px;" colspan="1"><hr></td>
                    <?php } ?>
                </tr>
                @endforeach
            @endif   
            </tbody>
        </table> 
        
       
       
    </div>	
    <p class="footer">Aparna Property Management Services Pvt.Ltd.,</p>		 
</div>
					   
 </html>			


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
