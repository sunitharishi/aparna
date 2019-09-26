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
    margin-bottom:20px;
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

table
{
 margin:10px 0px;
 border-collapse:collapse;
}
table thead tr th, table tbody tr td
{
 padding:8px;
}
.incident-summary
{
 font-size:18px;
 clear:both;
}
.soft-services
{
 font-weight:600;
 font-size:17px;
position:relative;
 padding-left:35px;
}
.soft-services:before
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
}
.note 
{
 clear:both;
}
.note .not-heading
{
 width:40px;
 float:left;
 margin-right:6px;
 margin-top:0px;
 vertical-align:top;
 padding-top:0px;
}
.note .note-sarovar
{
 width:auto;
 float:left;
 font-weight:700;
 vertical-align:top;
 padding-top:6px;
}
.lisint
{
 font-size:17px;
 font-weight:600;
 vertical-align:top;
}
.lisint ul
{
 position:relative;
 list-style:none;
}
.lisint ul li:before
{
 content: '';
    position: absolute;
    background: url(/images/bullet.png);
    background-size: contain;
   left: 9px;
    top: 5px;
    width: 18px;
    height: 17px;
}
.main-heading
{
    margin:0px 0px 10px 0px;
}

.scope-nature table tr th 
{
padding:5px 5px;
text-align:center;
color:black;
font-size:11px;
vertical-align:top;
line-height:17px;
}
.scope-nature table tr td 
{
padding:3.8px 5px;
text-align:center;
color:black;
font-size:11px;
line-height:17px;
}
</style>


<div class="mmrreport-eading">
    <h2 class="main-heading">MMR REPORT FOR THE MONTH OF {{ $monthname }}-{{ $year }}</h2>
     <img src="images/apms-logo.png" class="aparna-logo" >
</div>

   
<div class="row">  
	@if(count($sresullt) > 0)
    <div class="scope-nature">    	
        <div class="incident-summary">Service Level Agreement (SLA) adherence report</div>
        <table width="100%" border="1">
        	<thead>
            	<tr>
                	<th>Number</th>
                    <th>Unit</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Logged By</th>
                    <th>Assigned To</th>
                    <th>Logged On</th>
                    <th>Last Updated On</th>
					<th>Escalation Level</th>
					<th>Aging</th>
					<th>Status</th>
					<th>Remarks</th>
                </tr>
            </thead>
            <tbody>
             <?php $i = 0; ?> 
            @if(count($sresullt) > 0)
             @foreach($sresullt as $k => $val)
            	<tr>
                     <?php $i = $i + 1; ?>
                   <td><?php if(isset($val->number)) echo $val->number; ?></td>
                	<td><?php if(isset($val->unit)) echo $val->unit; ?></td>
                    <td><?php if(isset($val->description)) echo $val->description; ?></td>
                    <td><?php if(isset($val->category)) echo $val->category; ?></td>
                    <td><?php if(isset($val->logged_by)) echo date("d-m-Y",strtotime($val->logged_by)); ?></td>
                   <td><?php if(isset($val->assigned_to)) echo $val->assigned_to; ?></td>
				   <td><?php if(isset($val->logged_on)) echo $val->logged_on; ?></td>
				   <td><?php if(isset($val->last_updated_on)) echo $val->last_updated_on; ?></td>
				   <td><?php if(isset($val->escalation_level)) echo $val->escalation_level; ?></td>
				   <td><?php if(isset($val->aging)) echo $val->aging; ?></td>
				   <td><?php if(isset($val->status)) echo $val->status; ?></td>
				   <td><?php if(isset($val->remarks)) echo $val->remarks; ?></td>
                   
                </tr>
                @endforeach
            @endif   
            </tbody>
        </table>       
    </div>
    @endif   		 
</div>
	<p class="footer">Aparna Property Management Servicers Pvt. Ltd.,</p>					   
</html>					


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

