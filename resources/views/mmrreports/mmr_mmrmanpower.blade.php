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
    <div class="scope-nature">
    	<div class="soft-services">Proposed Manpower and Availability Man power</div>
		<table width="100%" border="1">
				<thead> 
					<tr>
						<th rowspan="2">S.no</th>
						<th rowspan="2">Particulars</th>
						<th colspan="4" style="text-align:center;">Shift</th>
						<th rowspan="2" style="text-align:center;">Manpower (Nos.)</th>
						<th rowspan="2">Man power Present days</th>
						<th rowspan="2">Man power%</th>
					</tr>
					<tr>
						<th width="50px">General</th>
						<th width="50px">A</th>
						<th width="50px">B</th>
						<th width="50px">C</th>
					</tr>
				</thead>
				@if(isset($manpowers))
				@if(count($manpowers) > 0)
				<tbody>
						<?php 
							$i=0;
							$s = 0;
							$f = 0;
							$c = 0;
							$e = 0;
						?>
						@foreach($manpowers as $mkey => $mrs)
						<?php  
							if($mrs['mpdays']>0)
							{
								$manpowerpercentage3 = ($mrs['mpdays']/($mrs['mnos']*$ndays))*100;
								$manpowerpercentage3 = round($manpowerpercentage3);
							}
							else
							{
								$manpowerpercentage3 = "";
							}
							
							$s = $s+1; 
							//if($mrs['type']=='Shared') $i=0;
						?>
						<?php 
							if($manpowerpercentage3!="") {							
							$i = $i+1;
							if($mrs['type']=='Full Time') { 
							if($f==0){
						?>
						<tr>
							<td colspan="9">
								<b>Full Time:</b>
							</td>
						</tr>
						<?php } ?>
						<tr>
							<td>
								<?php echo $i; ?>
								<input type="hidden" name="ids[]" value="<?php echo $mrs['ids']; ?>" />
							</td>
							<td>
								<?php echo $mrs['title']; ?>
							</td>
							<td>
								<?php if($mrs['general']!="") echo $mrs['general']; else echo "-"; ?>
							</td>
							<td>
								<?php if($mrs['a']!="") echo $mrs['a']; else echo "-"; ?>
							</td>
							<td>
								<?php if($mrs['b']!="") echo $mrs['b']; else echo "-"; ?>
							</td>
							<td>
								<?php if($mrs['c']!="") echo $mrs['c']; else echo "-"; ?>
							</td>
							<td>
								<?php if($mrs['mnos']!="") echo $mrs['mnos']; else echo "-"; ?>
							</td>
							<td>
								<?php if($mrs['mpdays']!="") echo $mrs['mpdays']; else echo "-"; ?>
							</td>
							<td class="per_<?php echo $i; ?>">
								<?php if($manpowerpercentage3!="") {  ?><?php echo $manpowerpercentage3; ?>%<?php } ?>
							</td>
						</tr>
						<?php  $f = $f+1;}  ?>
						<?php 
							if($mrs['type']=='Club House') { 
							if($c==0){
						?>
						<tr>
							<td colspan="9">
								<b>Club House:</b>
							</td>
						</tr>
						<?php } ?>
						<tr>
							<td>
								<?php echo $i; ?>
								<input type="hidden" name="ids[]" value="<?php echo $mrs['ids']; ?>" />
							</td>
							<td>
								<?php echo $mrs['title']; ?>
							</td>
							<td>
								<?php if($mrs['general']!="") echo $mrs['general']; else echo "-"; ?>
							</td>
							<td>
								<?php if($mrs['a']!="") echo $mrs['a']; else echo "-"; ?>
							</td>
							<td>
								<?php if($mrs['b']!="") echo $mrs['b']; else echo "-"; ?>
							</td>
							<td>
								<?php if($mrs['c']!="") echo $mrs['c']; else echo "-"; ?>
							</td>
							<td>
								<?php if($mrs['mnos']!="") echo $mrs['mnos']; else echo "-"; ?>
							</td>
							<td>
								<?php if($mrs['mpdays']!="") echo $mrs['mpdays']; else echo "-"; ?>
							</td>
							<td class="per_<?php echo $i; ?>">
								<?php if($manpowerpercentage3!="") {  ?><?php echo $manpowerpercentage3; ?>%<?php } ?>
							</td>
						</tr>
						<?php $c = $c+1;}  ?>
						
						<?php 
							if($mrs['type']=='Excess') { 
							if($e==0){
						?>
						<tr>
							<td colspan="9">
								<b>Excess:</b>
							</td>
						</tr>
						<?php } ?>
						<tr>
							<td>
								<?php echo $i; ?>
								<input type="hidden" name="ids[]" value="<?php echo $mrs['ids']; ?>" />
							</td>
							<td>
								<?php echo $mrs['title']; ?>
							</td>
							<td>
								<?php if($mrs['general']!="") echo $mrs['general']; else echo "-"; ?>
							</td>
							<td>
								<?php if($mrs['a']!="") echo $mrs['a']; else echo "-"; ?>
							</td>
							<td>
								<?php if($mrs['b']!="") echo $mrs['b']; else echo "-"; ?>
							</td>
							<td>
								<?php if($mrs['c']!="") echo $mrs['c']; else echo "-"; ?>
							</td>
							<td>
								<?php if($mrs['mnos']!="") echo $mrs['mnos']; else echo "-"; ?>
							</td>
							<td>
								<?php if($mrs['mpdays']!="") echo $mrs['mpdays']; else echo "-"; ?>
							</td>
							<td class="per_<?php echo $i; ?>">
								<?php if($manpowerpercentage3!="") {  ?><?php echo $manpowerpercentage3; ?>%<?php } ?>
							</td>
						</tr>
						<?php  $e = $e+1; }}  ?>
						@endforeach
				</tbody> 
				 @endif
					@endif           
			</table>
    </div>	 
</div>
	<p class="footer">Aparna Property Management Servicers Pvt. Ltd.,</p>					   
</html>					


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

