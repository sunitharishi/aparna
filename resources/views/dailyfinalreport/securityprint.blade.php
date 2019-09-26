
    <!-- Bootstrap -->
    <link rel="icon" href="images/ICON.png">
    <link href="/vendors1/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/vendors1/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
   
    <!-- iCheck -->
   
    <!-- Datatables -->
    <link href="/vendors1/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/build/css/custom.css" rel="stylesheet">
  <style>
  .security table tbody tr th
  {
   text-align:center;
  }
  .security table tbody tr th.left-align
  {
   text-align:left;
   vertical-align:top:
   padding:10px;
  }
  .security table tbody tr td.left-align
  {
   text-align:left;
   vertical-align:top;
   padding:10px;
  }
  .security table tbody tr td
  {
   text-align:center;
  }
  .security table tbody tr td span
  {
   color:#0000FF;
	 font-weight:bold;
  }
  .security table
  {
   width:80%;
   margin:0 auto;
  }
  .sign
  {
   margin-top:0px;
   text-align:right;
  }
  .date1
  {
   font-weight:bold;
   font-size:14px;
   color:#00754d;
   text-align:right;
  }
  .back-button
{
     width: 80%;
    margin: 0 auto;
    padding-bottom: 10px;
	text-align:right;
}
.back-button a
{
 background-color:#8dbb3c;
 color:white;
padding:4px 10px;
font-weight:600;
border-radius:4px;
text-decoration:none;
}
.back-button a:hover
{
 color:#000;
 text-decoration:none;
}
.row.x_title
{
 width:80%;
 margin:0 auto;
}
.col-xs-6.last-modified
{
 padding-top:0px;
 padding-left:0px;
}
.vendor-color
{
 background-color:#ffc1070f;
}
.oddcolor
{
 background-color:#b8cde6;
 text-align:left !important;
}
.evencolor
{
 background-color:#cce0d0;
 text-align:left !important;
}
.row.satedd
{
 width:80%;
 margin:0 auto;
}

b
{
 color:#000;
}
  </style>

 @extends('layouts.app')


@section('content')
    <div class="body">
      <div class="main_container schdules-performed">
      <?php /*?><?php include "header.php"; ?><?php */?>
	   <?php $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 

									$sitevv = $uriSegments[2]; ?>

			  <div class="back-button"><a href="/getdailyreportdetail/<?php echo $sitevv;  ?>/<?php echo $uriSegments[3];  ?>">Back</a></div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="models">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div>
                  <div class="row x_title dacolor-nighrcolor" style="border-bottom:none;margin-bottom:0px;">
                     <span class="col-sm-6 col-xs-6" style="font-weight:bold;font-size:14px;color:#ff4800;padding-left:0px;">APMS-<?php echo get_sitename($sitefilter);?> </span>
                        <div class="col-sm-6 col-xs-6 date1">SECURITY | DATE: <?php echo $datefilter;?> | TIME:  <?php date_default_timezone_set('Asia/Kolkata'); echo date("h:i:sa"); $pemsresv = getdefaultpmstot($sitefilter); ?></div>
						<?php $resval = getdefaultsecurity($sitefilter); ?>
                  </div> 
                  <div class="x_content security" style="color:#000;">
                    <div class="secrity-table">
                     <table  border="1" style="text-align:left;">
                     	<tbody style="border:1px solid #000;">
                        	<tr style="text-align:left;background-color:#ffc1070f;">
                            	<th>SL.NO</th>
                                <th>Details</th>
                                <th style="width:80px;">Guard</th>
                                <th>Lady Guard</th>
                                <th>Head Guard</th>
                                <th style="width:81px;">SUP</th>
                                <th style="width:81px;">A.S.O</th>
                                <th style="width:81px;">S.O</th>
                                <th colspan="2">Remarks</th>
                            </tr>
                            <tr>
                            	<td rowspan="8"><b>1</b></td>
                                <td class="oddcolor"><b>Duties Scheduled</b></td>
                                <td><span><?php if(isset($res['ds_guard']))echo $res['ds_guard']; ?></span></td>
                                <td><span><?php if(isset($res['ds_lguard']))echo $res['ds_lguard']; ?></span></td>
                                <td><span><?php if(isset($res['ds_hguard']))echo $res['ds_hguard']; ?></span></td>
                               <td><span><?php if(isset($res['ds_sup']))echo $res['ds_sup']; ?></span></td>
                                <td><span><?php if(isset($res['ds_aso']))echo $res['ds_aso']; ?></span></td>
                                <td><span><?php if(isset($res['ds_so']))echo $res['ds_so']; ?></span></td>
								<td rowspan="8" colspan="2" class="left-align"><span><?php if(isset($res['ds_remarks'])) { if($res['ds_remarks']) echo "<b>Duties Scheduled: </b>".$res['ds_remarks']."<br>"; }?>
								<?php if(isset($res['dp_remarks'])) { if($res['dp_remarks'])echo "<b>Duties Performed: </b>".$res['dp_remarks']."<br>"; }?>
								<?php if(isset($res['pha_remarks'])) { if($res['pha_remarks']) echo "<b>Ph Attendance: </b>".$res['pha_remarks']."<br>"; }?>
								<?php if(isset($res['wko_remarks'])) { if($res['wko_remarks']) echo "<b>Weekly off: </b>".$res['wko_remarks']."<br>"; }?>
								<?php if(isset($res['ab_remarks'])) {  if($res['ab_remarks']) echo "<b>Absent: </b>".$res['ab_remarks']."<br>"; }?>
								<?php if(isset($res['tfo_remarks'])) {  if($res['tfo_remarks']) echo "<b>Transfer from other sites: </b>".$res['tfo_remarks']."<br>"; }?>
								<?php if(isset($res['tto_remarks'])) { if($res['tto_remarks']) echo "<b>Transfer to other sites: </b>".$res['tto_remarks']."<br>"; }?>
								<?php if(isset($res['rsv_remarks'])) {  if($res['rsv_remarks']) echo "<b>Reserved: </b>".$res['rsv_remarks']."<br>"; }?>
								
								
								</span></td>
                            </tr>
                            <tr>
                            	
                                <td class="oddcolor"><b>Duties Performed</b></td>
                                <td><span><?php if(isset($res['dp_guard']))echo $res['dp_guard']; ?></span></td>
                                <td><span><?php if(isset($res['dp_lguard']))echo $res['dp_lguard']; ?></span></td>
                                 <td><span><?php if(isset($res['dp_hguard']))echo $res['dp_hguard']; ?></span></td>
                                  <td><span><?php if(isset($res['dp_sup']))echo $res['dp_sup']; ?></span></td>
                                <td><span><?php if(isset($res['dp_aso']))echo $res['dp_aso']; ?></span></td>
                                <td><span><?php if(isset($res['dp_so']))echo $res['dp_so']; ?></span></td>
                             <?php /*?>   <td><span><?php if(isset($res['dp_remarks']))echo $res['dp_remarks']; ?></span></td><?php */?>
                            </tr>
                            <tr>
                            	
                                <td class="oddcolor"><b>Ph Attendance</b></td>
                                <td><span><?php if(isset($res['pha_guard']))echo $res['pha_guard']; ?></span></td>
                                <td><span><?php if(isset($res['pha_lguard']))echo $res['pha_lguard']; ?></span></td>
                                <td><span><?php if(isset($res['pha_hguard']))echo $res['pha_hguard']; ?></span></td>
								 <td><span><?php if(isset($res['pha_sup']))echo $res['pha_sup']; ?></span></td>
                                <td><span><?php if(isset($res['pha_aso']))echo $res['pha_aso']; ?></span></td>
                                <td><span><?php if(isset($res['pha_so']))echo $res['pha_so']; ?></span></td>
                                <?php /*?><td><span><?php if(isset($res['pha_remarks']))echo $res['pha_remarks']; ?></span></td><?php */?>
                            </tr>
                           
                            <tr>
                            	
                                <td class="oddcolor"><b>Weekly off</b></td>
                                <td><span><?php if(isset($res['wko_guard']))echo $res['wko_guard']; ?></span></td>
                                <td><span><?php if(isset($res['wko_lguard']))echo $res['wko_lguard']; ?></span></td>
                                <td><span><?php if(isset($res['wko_hguard']))echo $res['wko_hguard']; ?></span></td>
                                 <td><span><?php if(isset($res['wko_sup']))echo $res['wko_sup']; ?></span></td>
                                <td><span><?php if(isset($res['wko_aso']))echo $res['wko_aso']; ?></span></td>
                                <td><span><?php if(isset($res['wko_so']))echo $res['wko_so']; ?></span></td>
                               <?php /*?> <td><span><?php if(isset($res['wko_remarks']))echo $res['wko_remarks']; ?></span></td><?php */?>
                            </tr>
                             <tr>
                            	
                                <td class="oddcolor"><b>Absent</b></td>
								<td><span><?php if(isset($res['ab_guard']))echo $res['ab_guard']; ?></span></td>
								<td><span><?php if(isset($res['ab_lguard']))echo $res['ab_lguard']; ?></span></td>
								<td><span><?php if(isset($res['ab_hguard']))echo $res['ab_hguard']; ?></span></td>
                                 <td><span><?php if(isset($res['ab_sup']))echo $res['ab_sup']; ?></span></td>
								<td><span><?php if(isset($res['ab_aso']))echo $res['ab_aso']; ?></span></td>
								<td><span><?php if(isset($res['ab_so']))echo $res['ab_so']; ?></span></td>
								<?php /*?><td><span><?php if(isset($res['ab_remarks']))echo $res['ab_remarks']; ?></span></td>	<?php */?>
                            </tr>
                        	<tr>
                            	
                                <td class="oddcolor"><b>Transfer from other sites</b></td>
                                <td><span><?php if(isset($res['tfo_guard']))echo $res['tfo_guard']; ?></span></td>
								<td><span><?php if(isset($res['tfo_lguard']))echo $res['tfo_lguard']; ?></span></td>
								<td><span><?php if(isset($res['tfo_hguard']))echo $res['tfo_hguard']; ?></span></td>
                                  <td><span><?php if(isset($res['tfo_sup']))echo $res['tfo_sup']; ?></span></td>
								<td><span><?php if(isset($res['tfo_aso']))echo $res['tfo_aso']; ?></span></td>
								<td><span><?php if(isset($res['tfo_so']))echo $res['tfo_so']; ?></span></td>
								<?php /*?><td><span><?php if(isset($res['tfo_remarks']))echo $res['tfo_remarks']; ?></span></td>	<?php */?>
                            </tr>
                            <tr>
                            	
                                <td class="oddcolor"><b>Transfer to other sites</b></td>
								<td><span><?php if(isset($res['tto_guard']))echo $res['tto_guard']; ?></span></td>
								<td><span><?php if(isset($res['tto_lguard']))echo $res['tto_lguard']; ?></span></td>
								<td><span><?php if(isset($res['tto_hguard']))echo $res['tto_hguard']; ?></span></td>
                                <td><span><?php if(isset($res['tto_sup']))echo $res['tto_sup']; ?></span></td>
								<td><span><?php if(isset($res['tto_aso']))echo $res['tto_aso']; ?></span></td>
								<td><span><?php if(isset($res['tto_so']))echo $res['tto_so']; ?></span></td>
								<!--<td><span><?php // if(isset($res['tto_remarks']))echo $res['tto_remarks']; ?></span></td>	-->
                            </tr>
                             <tr>
                            	
                                <td class="oddcolor"><b>Reserved</b></td>
								<td><span><?php if(isset($res['rsv_guard']))echo $res['rsv_guard']; ?></span></td>
								<td><span><?php if(isset($res['rsv_lguard']))echo $res['rsv_lguard']; ?></span></td>
								<td><span><?php if(isset($res['rsv_hguard']))echo $res['rsv_hguard']; ?></span></td>
                                 <td><span><?php if(isset($res['rsv_sup']))echo $res['rsv_sup']; ?></span></td>
								<td><span><?php if(isset($res['rsv_aso']))echo $res['rsv_aso']; ?></span></td>
								<td><span><?php if(isset($res['rsv_so']))echo $res['rsv_so']; ?></span></td>
								<!--<td><span><?php //if(isset($res['rsv_remarks']))echo $res['rsv_remarks']; ?></span></td>-->
                            </tr>
                            
                             <tr>
                            	<td rowspan="2"><b>2</b></td>
                                <td class="evencolor"><b>Day shift</b></td>
								<td><span><?php if(isset($res['dsh_guard']))echo $res['dsh_guard']; ?></span></td>
								<td><span><?php if(isset($res['dsh_lguard']))echo $res['dsh_lguard']; ?></span></td>
								<td><span><?php if(isset($res['dsh_hguard']))echo $res['dsh_hguard']; ?></span></td>
                                 <td><span><?php if(isset($res['dsh_sup']))echo $res['dsh_sup']; ?></span></td>
								<td><span><?php if(isset($res['dsh_aso']))echo $res['dsh_aso']; ?></span></td>
								<td><span><?php if(isset($res['dsh_so']))echo $res['dsh_so']; ?></span></td>
								<td rowspan="2" colspan="2" class="left-align"><span><?php if(isset($res['dsh_remarks'])) { if($res['dsh_remarks']) echo "<b>Day shift: </b>".$res['dsh_remarks']."<br>"; }?>
								<?php if(isset($res['dp_remarks'])) { if($res['nsh_remarks']) echo "<b>Night shift: </b>".$res['nsh_remarks']."<br>"; }?></span></td>
								
								  
                            </tr>
                            <tr>
                            	
                                <td class="evencolor"><b>Night shift</b></td>
								<td><span><?php if(isset($res['nsh_guard']))echo $res['nsh_guard']; ?></span></td>
								<td><span><?php if(isset($res['nsh_lguard']))echo $res['nsh_lguard']; ?></span></td>
								<td><span><?php if(isset($res['nsh_hguard']))echo $res['nsh_hguard']; ?></span></td>
                                 <td><span><?php if(isset($res['nsh_sup']))echo $res['nsh_sup']; ?></span></td>
								<td><span><?php if(isset($res['nsh_aso']))echo $res['nsh_aso']; ?></span></td>
								<td><span><?php if(isset($res['nsh_so']))echo $res['nsh_so']; ?></span></td>
								<?php /*?><td><span><?php if(isset($res['nsh_remarks']))echo $res['nsh_remarks']; ?></span></td>	<?php */?>
                            </tr>
                           
                            
                            <tr>
                            	<td rowspan="3"><b>3</b></td>
                                <td class="oddcolor"><b>Less than 20 Yrs</b></td>
								<td><span><?php if(isset($res['lt20_guard']))echo $res['lt20_guard']; ?></span></td>
								<td><span><?php if(isset($res['lt20_lguard']))echo $res['lt20_lguard']; ?></span></td>
								<td><span><?php if(isset($res['lt20_hguard']))echo $res['lt20_hguard']; ?></span></td>
                                 <td><span><?php if(isset($res['lt20_sup']))echo $res['lt20_sup']; ?></span></td>
								<td><span><?php if(isset($res['lt20_aso']))echo $res['lt20_aso']; ?></span></td>
								<td><span><?php if(isset($res['lt20_so']))echo $res['lt20_so']; ?></span></td>
								<td rowspan="3" colspan="2" class="left-align"><span><?php if(isset($res['lt20_remarks'])) { if($res['lt20_remarks']) echo "<b>Less than 20 Yrs: </b>".$res['lt20_remarks']."<br>"; }?>
								<?php if(isset($res['lt50_remarks'])) { if($res['lt50_remarks'])  echo "<b>Less than 50 Kgs: </b>".$res['lt50_remarks']."<br>"; }?><?php if(isset($res['lt51_remarks']))echo $res['lt51_remarks']."<br>"; ?><?php if(isset($res['lt52_remarks'])) { if($res['lt52_remarks']) echo "<b>Less than 5'2: </b>".$res['lt52_remarks']."<br>"; }?></span></td>
                            </tr>
                            <tr>  
                            	
                                <td class="oddcolor"><b>Less than 50 Kgs</b></td>
								<td><span><?php if(isset($res['lt50_guard']))echo $res['lt50_guard']; ?></span></td>
								<td><span><?php if(isset($res['lt50_lguard']))echo $res['lt50_lguard']; ?></span></td>
								<td><span><?php if(isset($res['lt50_hguard']))echo $res['lt50_hguard']; ?></span></td>
                                <td><span><?php if(isset($res['lt50_sup']))echo $res['lt50_sup']; ?></span></td>
								<td><span><?php if(isset($res['lt50_aso']))echo $res['lt50_aso']; ?></span></td>
								<td><span><?php if(isset($res['lt50_so']))echo $res['lt50_so']; ?></span></td>
								<?php /*?><td><span><?php if(isset($res['lt50_remarks']))echo $res['lt50_remarks']; ?></span></td>	<?php */?>
                            </tr>
                            <tr>
                            	
                                <td class="oddcolor"><b>Less than 5'2"</b></td>
								<td><span><?php if(isset($res['lt52_guard']))echo $res['lt52_guard']; ?></span></td>
								<td><span><?php if(isset($res['lt52_lguard']))echo $res['lt52_lguard']; ?></span></td>
								<td><span><?php if(isset($res['lt52_hguard']))echo $res['lt52_hguard']; ?></span></td>
                                 <td><span><?php if(isset($res['lt52_sup']))echo $res['lt52_sup']; ?></span></td>
								<td><span><?php if(isset($res['lt52_aso']))echo $res['lt52_aso']; ?></span></td>
								<td><span><?php if(isset($res['lt52_so']))echo $res['lt52_so']; ?></span></td>
								<?php /*?><td><span><?php if(isset($res['lt52_remarks']))echo $res['lt52_remarks']; ?></span></td><?php */?>
                            </tr>
                        
                        	
                            <tr>  
                            	<td rowspan="3"><b>4</b></td>
                                <td class="evencolor"><b>Knows Fire Fighting</b></td>
								<td><span><?php if(isset($res['kff_guard']))echo $res['kff_guard']; ?></span></td>
								<td><span><?php if(isset($res['kff_lguard']))echo $res['kff_lguard']; ?></span></td>
								<td><span><?php if(isset($res['kff_hguard']))echo $res['kff_hguard']; ?></span></td>
                                 <td><span><?php if(isset($res['kff_sup']))echo $res['kff_sup']; ?></span></td>
								<td><span><?php if(isset($res['kff_aso']))echo $res['kff_aso']; ?></span></td>
								<td><span><?php if(isset($res['kff_so']))echo $res['kff_so']; ?></span></td>
								
								<td rowspan="3" colspan="2" class="left-align"><span><?php if(isset($res['kff_remarks'])) { if($res['kff_remarks']) echo "<b>Knows Fire Fighting: </b>".$res['kff_remarks']."<br>"; }?>
								<?php if(isset($res['kdsh_remarks'])) {  if($res['kdsh_remarks']) echo "<b>Day shift: </b>".$res['kdsh_remarks']."<br>"; }?><?php if(isset($res['knsh_remarks'])) {  if($res['kdsh_remarks'])  echo "<b>Night shift: </b>".$res['kdsh_remarks']; }?>  </span></td>
                            </tr>
                             <tr>
                                <td class="evencolor"><b>Day shift</b></td>
								<td><span><?php if(isset($res['kdsh_guard']))echo $res['kdsh_guard']; ?></span></td>
							 	<td><span><?php if(isset($res['kdsh_lguard']))echo $res['kdsh_lguard']; ?></span></td>
								<td><span><?php if(isset($res['kdsh_hguard']))echo $res['kdsh_hguard']; ?></span></td>
                                   <td><span><?php if(isset($res['kdsh_sup']))echo $res['kdsh_sup']; ?></span></td>
								<td><span><?php if(isset($res['kdsh_aso']))echo $res['kdsh_aso']; ?></span></td>
								<td><span><?php if(isset($res['kdsh_so']))echo $res['kdsh_so']; ?></span></td>
								<?php /*?><td><span><?php if(isset($res['kdsh_remarks']))echo $res['kdsh_remarks']; ?></span></td><?php */?>
                            </tr>
                            <tr>
                                <td class="evencolor"><b>Night shift</b></td>
								<td><span><?php if(isset($res['knsh_guard']))echo $res['knsh_guard']; ?></span></td>
								<td><span><?php if(isset($res['knsh_lguard']))echo $res['knsh_lguard']; ?></span></td>
								<td><span><?php if(isset($res['knsh_hguard']))echo $res['knsh_hguard']; ?></span></td>
                                 <td><span><?php if(isset($res['knsh_sup']))echo $res['knsh_sup']; ?></span></td>
								<td><span><?php if(isset($res['knsh_aso']))echo $res['knsh_aso']; ?></span></td>
								<td><span><?php if(isset($res['knsh_so']))echo $res['knsh_so']; ?></span></td>
								<?php /*?><td><span><?php if(isset($res['knsh_remarks']))echo $res['knsh_remarks']; ?></span></td>	<?php */?>
                            </tr>
                             <tr>
                            	<td rowspan="2"><b>5</b></td>
                                <td class="oddcolor"><b>Additions (N.J +TR)</b></td>
								<td><span><?php if(isset($res['add_guard']))echo $res['add_guard']; ?></span></td>
								<td><span><?php if(isset($res['add_lguard']))echo $res['add_lguard']; ?></span></td>
								<td><span><?php if(isset($res['add_hguard']))echo $res['add_hguard']; ?></span></td>
                                 <td><span><?php if(isset($res['add_sup']))echo $res['add_sup']; ?></span></td>
								<td><span><?php if(isset($res['add_aso']))echo $res['add_aso']; ?></span></td>
								<td><span><?php if(isset($res['add_so']))echo $res['add_so']; ?></span></td>
								 <td rowspan="2" colspan="2" class="left-align"><span><?php if(isset($res['add_remarks'])) {  if($res['add_remarks']) echo "<b>Additions: </b>".$res['add_remarks']."<br>"; }?><?php if(isset($res['del_remarks'])) {  if($res['del_remarks'])  echo "<b>Deletions: </b>".$res['del_remarks']; }?>  </span></td>	
                            </tr>
                            <tr>
                            	
                                <td class="oddcolor"><b>Deletions (TR +Left)</b></td>
								<td><span><?php if(isset($res['del_guard']))echo $res['del_guard']; ?></span></td>
								<td><span><?php if(isset($res['del_lguard']))echo $res['del_lguard']; ?></span></td>
								<td><span><?php if(isset($res['del_hguard']))echo $res['del_hguard']; ?></span></td>
                                 <td><span><?php if(isset($res['del_sup']))echo $res['del_sup']; ?></span></td>
								<td><span><?php if(isset($res['del_aso']))echo $res['del_aso']; ?></span></td>
								<td><span><?php if(isset($res['del_so']))echo $res['del_so']; ?></span></td>
								<?php /*?><td><span><?php if(isset($res['del_remarks']))echo $res['del_remarks']; ?></span></td>	<?php */?>
                                
                            </tr>
                            
                        <tr>
                            	<td rowspan="2"><b>6</b></td>
                                <td class="evencolor"><b>Without Uniform</b></td>
								<td><span><?php if(isset($res['wu_guard']))echo $res['wu_guard']; ?></span></td>
								<td><span><?php if(isset($res['wu_lguard']))echo $res['wu_lguard']; ?></span></td>
								<td><span><?php if(isset($res['wu_hguard']))echo $res['wu_hguard']; ?></span></td>
                                 <td><span><?php if(isset($res['wu_sup']))echo $res['wu_sup']; ?></span></td>
								<td><span><?php if(isset($res['wu_aso']))echo $res['wu_aso']; ?></span></td>
								<td><span><?php if(isset($res['wu_so']))echo $res['wu_so']; ?></span></td>
                               <td rowspan="2" colspan="2" class="left-align"><span><?php if(isset($res['wu_remarks'])){ echo "<b>Without Uniform: </b>".$res['wu_remarks']."<br/>"; }if(isset($res['ws_remarks'])){ echo "<b>Without Shoes: </b>".$res['ws_remarks']."<br/"; }?></span></td>
                            </tr> 
                            <tr>
                            	
                                <td class="evencolor"><b>Without Shoes</b></td>
								<td><span><?php if(isset($res['ws_guard']))echo $res['ws_guard']; ?></span></td>
								<td><span><?php if(isset($res['ws_lguard']))echo $res['ws_lguard']; ?></span></td>
								<td><span><?php if(isset($res['ws_hguard']))echo $res['ws_hguard']; ?></span></td>
                                  <td><span><?php if(isset($res['ws_sup']))echo $res['ws_sup']; ?></span></td>
								<td><span><?php if(isset($res['ws_aso']))echo $res['ws_aso']; ?></span></td>
								<td><span><?php if(isset($res['ws_so']))echo $res['ws_so']; ?></span></td>
                               
                            </tr> 
                            
                              
                             <tr>
                            	<td rowspan="2"><b>7</b></td>
                                <td class="oddcolor"><b>Briefing Mor.</b></td>
								<td><span><?php if(isset($res['bm_guard']))echo $res['bm_guard']; ?></span></td>
								<td><span><?php if(isset($res['bm_lguard']))echo $res['bm_lguard']; ?></span></td>
								<td><span><?php if(isset($res['bm_hguard']))echo $res['bm_hguard']; ?></span></td>
                                 <td><span><?php if(isset($res['bm_sup']))echo $res['bm_sup']; ?></span></td>
								<td><span><?php if(isset($res['bm_aso']))echo $res['bm_aso']; ?></span></td>
								<td><span><?php if(isset($res['bm_so']))echo $res['bm_so']; ?></span></td>
								<td rowspan="2" colspan="2" class="left-align"><span><?php if(isset($res['bm_remarks'])){ echo "<b>Briefing Mor: </b>".$res['bm_remarks']."<br/>"; }if(isset($res['ae_remarks'])){ echo "<b>Attended Eve: </b>".$res['ae_remarks']."<br/"; }?></span></td>
                            </tr>
                            <tr>
                            	
                                <td class="oddcolor"><b>Attended Eve.</b></td>
                              	<td><span><?php if(isset($res['ae_guard']))echo $res['ae_guard']; ?></span></td>
								<td><span><?php if(isset($res['ae_lguard']))echo $res['ae_lguard']; ?></span></td>
								<td><span><?php if(isset($res['ae_hguard']))echo $res['ae_hguard']; ?></span></td>
                                 <td><span><?php if(isset($res['ae_sup']))echo $res['ae_sup']; ?></span></td>
								<td><span><?php if(isset($res['ae_aso']))echo $res['ae_aso']; ?></span></td>
								<td><span><?php if(isset($res['ae_so']))echo $res['ae_so']; ?></span></td>
                           </tr>
                          <!-- </tbody>
                           </table>
                           
                           <table width="100%" border="1" style="border:1px solid #000;">
                           <tbody style="border:1px solid #000;">-->
                            
                            <tr>
                            	<td rowspan="2"><b>8</b></td> 
                               <td class="evencolor" rowspan="2"><b>Not Working / Total No's</b></td> 
                                <th class="vendor-color">CCTV</th>
                                <th class="vendor-color">Boom.B</th>
                                <th class="vendor-color">W.T</th>
                                <th colspan="2" class="vendor-color">Torches</th>
                                <th class="vendor-color">Bio.M.</th>
                               <td rowspan="2" colspan="2" class="left-align"><span><?php if(isset($res['nw_remarks'])){ echo $res['nw_remarks']."<br/"; }?></span></td>
                            </tr>
                            <tr>
                            	 
                                
                                <td><span><?php if(isset($res['nw_cctv']))echo $res['nw_cctv']; ?>/<?php echo $resval['cctv'];?></span></td>
                                <td><span><?php if(isset($res['nw_boom']))echo $res['nw_boom']; ?>/<?php echo $resval['boombarrier'];?></span></td>
                                <td><span><?php if(isset($res['nw_wt']))echo $res['nw_wt']; ?>/<?php echo $resval['wt'];?></span></td>
                                <td colspan="2"><span><?php if(isset($res['nw_torch']))echo $res['nw_torch']; ?>/<?php echo $resval['torches'];?></span></td>
                                <td><span><?php if(isset($res['nw_bio']))echo $res['nw_bio']; ?>/<?php echo $resval['biomachine'];?></span></td>
                                
                            </tr>
                             <tr>
                            	<td rowspan="2"><b>9</b></td>
                               <td class="oddcolor" rowspan="2"><b>Available No's</b></td>
                                <td class="vendor-color"><b>Tabs</b></td>
                                <td class="vendor-color"><b>Whistles</b></td> 
                                <td class="vendor-color"><b>Batons</b></td>
                                <td colspan="2" class="vendor-color"><b>Rain.C</b></td>
                                <td class="vendor-color"><b>Umbrellas</b></td>
                                <td rowspan="2" colspan="2" class="left-align"><span><?php if(isset($res['av_remarks'])){ echo $res['av_remarks']."<br/"; }?></span></td>
                            </tr>
                            <tr>
                            	
                               
                                <td><span><?php if(isset($res['av_tab']))echo $res['av_tab']; ?>/<?php echo $resval['av_tabs'];?></span></td>
                                <td><span><?php if(isset($res['av_whi']))echo $res['av_whi']; ?>/<?php echo $resval['av_whistles'];?></span></td>
                                <td><span><?php if(isset($res['av_bat']))echo $res['av_bat']; ?>/<?php echo $resval['av_batons'];?></span></td>
                                <td colspan="2"><span><?php if(isset($res['av_rai']))echo $res['av_rai']; ?>/<?php echo $resval['av_rain_c'];?></span></td>
                                <td><span><?php if(isset($res['av_umb']))echo $res['av_umb']; ?>/<?php echo $resval['av_umbrellas'];?></span></td>
                              
                            </tr>  
                            
                             <tr>
                            	<td class="white-border"></td>
                                <td class="vendor-color" style="text-align:left;"><b>Solar Fencing</b></td>
                                <td class="vendor-color"><b>Zone 1</b></td>
                                <td class="vendor-color"><b>Zone 2</b></td>
                                <td class="vendor-color"><b>Zone 3</b></td>
                                <td colspan="2" class="vendor-color"><b>Zone 4</b></td>
                                <td class="vendor-color"><b>T.Kit</b></td>
                                 <td rowspan="2" colspan="2" class="left-align"><span><?php if(isset($res['sf_remarks'])){ echo $res['sf_remarks']; }?></span></td>
                            </tr>
                            <tr>
                            	<td rowspan="1"><b>10</b></td>
                                <td class="evencolor"><b>Working Status</b></td>
                                <td><span><?php if(isset($res['sf_zone1']))echo $res['sf_zone1']; ?></span></td>
                                <td><span><?php if(isset($res['sf_zone2']))echo $res['sf_zone2']; ?></span></td>
                                <td><span><?php if(isset($res['sf_zone3']))echo $res['sf_zone3']; ?></span></td>
                                <td colspan="2"><span><?php if(isset($res['sf_zone4']))echo $res['sf_zone4']; ?></span></td>
                                <td><span><?php if(isset($res['sf_tkit']))echo $res['sf_tkit']; ?></span></td>
                               
                            </tr>
                           <tr>
                            	<td class="white-border"></td>
                                <td class="vendor-color" style="text-align:left;"><b>Allowed without</b></td>
                                <td class="vendor-color"><b>Maids</b></td>
                                <td class="vendor-color"><b>Drivers</b></td>
                                <td class="vendor-color"><b>Vendors</b></td>
                                <td colspan="2" class="vendor-color"><b>Interiors</b></td>
                                <td class="vendor-color"><b>Others</b></td>
                                        <td rowspan="2" colspan="2" class="left-align"><span><?php if(isset($res['aw_remarks'])){ echo $res['aw_remarks']; }?></span></td>
                            </tr>
                            <!--<tr>
                            	<td rowspan="2">10</td>
                                
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td> 
                                <td></td> 
                                <td rowspan="2"></td>
                            </tr>-->
                            <tr>
                            	<td><b>11</b></td> 
                                <td class="oddcolor"><b>ID Cards.</b></td>
                                 <td><span><?php if(isset($res['aw_maid']))echo $res['aw_maid']; ?>/<?php echo $res['id_maid'];?></span></td>
                                <td><span><?php if(isset($res['aw_dri']))echo $res['aw_dri']; ?>/<?php echo $res['id_dri'];?></span></td>
                                 <td><span><?php if(isset($res['aw_ven']))echo $res['aw_ven']; ?>/<?php echo $res['id_ven'];?></span></td>
                                 <td colspan="2"><span><?php if(isset($res['aw_inte']))echo $res['aw_inte']; ?>/<?php echo $res['id_inte'];?></span></td>
                                 <td><span><?php if(isset($res['aw_others']))echo $res['aw_others']; ?>/<?php echo $res['id_others'];?></span></td>
                               
                            </tr> 
                                
                             <tr>
                            	<td rowspan="3"><b>12</b></td>
                                <td class="vendor-color"><b>Data Sheet Pending</b></td>
                                <td class="vendor-color"><b>Night Tea Served at</b></td>
                                <td class="vendor-color"><b>Night Bio Checked</b></td>
                                <td class="vendor-color"><b>W/O Stickers</b></td>
                                <td class="vendor-color"><b>Missing Keys</b></td>
                                <td class="vendor-color"><b>Lost & Found</b></td>
                                <td class="vendor-color"><b>Sleeping Cases</b></td>
                                <td class="vendor-color"><b>Interior Works</b></td>
                                <td class="vendor-color"><b>Night Check</b></td>
                            </tr>
                            <tr>
                                <td rowspan="2"><span><?php if(isset($res['ds_pending']))echo $res['ds_pending']; ?></span></td>
                                <td rowspan="2"><span><?php if(isset($res['nts_time']))echo $res['nts_time']; ?></span></td>
                                <td rowspan="2"><span><?php if(isset($res['nbc_chk']))echo $res['nbc_chk']; ?></span></td>
                                <td><b>2W:</b><span><?php if(isset($res['wo_stick_2w']))echo $res['wo_stick_2w']; ?></span></td>
                                <td rowspan="2"><span><?php if(isset($res['mis_keys']))echo $res['mis_keys']; ?></span></td>
                                <td rowspan="2"><span><?php if(isset($res['lost_found']))echo $res['lost_found']; ?></span></td>
                                <td rowspan="2"><span><?php if(isset($res['sleeping_case']))echo $res['sleeping_case']; ?></span></td>
                                <td rowspan="2"><span><?php if(isset($res['interior_works']))echo $res['interior_works']; ?></span></td>
                               <td class="white-spacing"><b>BY.</b> <span><?php if(isset($res['night_check_by']))echo $res['night_check_by']; ?></span></td>
                            </tr>
                            <tr>
                                  
                                
                                <td><b>4W:</b><span><?php if(isset($res['wo_stick_4w']))echo $res['wo_stick_4w']; ?></span></td>
                               
                           <td class="white-spacing"><b>Time:</b> <span><?php if(isset($res['night_check_time']))echo $res['night_check_time']; ?></span></td>
                            </tr>
                            
                            
                            
                             <tr>
                               <td rowspan="1"><b>13</b></td>
                               <td colspan="9" class="white-spacing"><span><?php if(isset($res['violations'])){ if($res['violations'])echo "<b>Violations: </b>".$res['violations']."<br/>"; }if(isset($res['occurances'])){ echo "<b>Occurances: </b>".$res['occurances']."<br>"; }if(isset($res['drunkcase'])){ if($res['drunkcase']) echo "<b>Drunk Cases: </b>".$res['drunkcase']."<br/>"; }if(isset($res['parades'])){ if($res['parades']) echo "<b>Parades: </b>".$res['parades']."<br>"; }if(isset($res['cellphone_abuses'])){ if($res['cellphone_abuses']) echo "<b>Cellphone Abuses: </b>".$res['cellphone_abuses']."<br>"; }if(isset($res['srstaffvisits'])){ if($res['srstaffvisits']) echo "<b>Sr.Staff Visits etc.: </b>".$res['srstaffvisits']."<br>"; }?></span></td>
                           	</tr>
                            
                               <tr>
                               <td rowspan="1"><b>14</b></td>
                               <td colspan="9" class="white-spacing"><span><?php if(isset($res['tr_resident_vehicle'])){ if($res['tr_resident_vehicle'])echo "<b>Residents Vehicle (4 & 2 wheelers): </b>".$res['tr_resident_vehicle']."<br/>"; }if(isset($res['tr_temp_vendors'])){ echo "<b>Temporary Vendors (persons): </b>".$res['tr_temp_vendors']."<br>"; }if(isset($res['tr_courier_delivery'])){ if($res['tr_courier_delivery']) echo "<b>Courier / Delivery Boys (Persons): </b>".$res['tr_courier_delivery']."<br/>"; }if(isset($res['tr_visitors'])){ if($res['tr_visitors']) echo "<b>Visitors: </b>".$res['tr_visitors']."<br>"; }if(isset($res['tr_construction'])){ if($res['tr_construction']) echo "<b> Construction Team (persons): </b>".$res['tr_construction']."<br>"; }if(isset($res['tr_inter_works'])){ if($res['tr_inter_works']) echo "<b>Inter Works in flats/Villas: </b>".$res['tr_inter_works']."<br>"; }if(isset($res['tr_interior_works_perday'])){ if($res['tr_interior_works_perday']) echo "<b>Interior Workers per day: </b>".$res['tr_interior_works_perday']."<br>"; }?></span></td>
                           	</tr>
                            
                            
							
							<tr>
                            	 <td><b>15</b></td>
                                 <td colspan="9" style="text-align:left;"><b>Additional Information:</b><span><?php if(isset($res['reason']))echo $res['reason']; ?></span></td>
							</tr>
                             
                        </tbody> 
                     </table>
                     </div>
					   <?php  date_default_timezone_set('Asia/Calcutta'); ?> 
						
                       <div class="row satedd">
                        <div class="last-modified">
 <?php
					   		if(isset($res['created_at'])){ 
						    
						    $datearr1 =  explode(" ",$res['created_at']);
							$dateday1 = $datearr1[0];
							$datetime1 = $datearr1[1];
							$dateday1 = date('d-m-Y', strtotime($dateday1));
					   ?>
                  <span style="color:#ff2518;font-weight:bold;">First Updated On:</span> <b><?php echo $dateday1." ".$datetime1;?></b> &nbsp; | &nbsp;<?php } ?>
     <?php
						 if(isset($res['updated_at'])){ 
						    
						    $datearr =  explode(" ",$res['updated_at']);
							$dateday = $datearr[0];
							$datetime = $datearr[1];
							$dateday = date('d-m-Y', strtotime($dateday));
							 ?>
   <span style="color:#ff2518;font-weight:bold;">Last Modified On:</span> <b> <?php echo $dateday." ".$datetime; ?></b>
    <?php } ?>
    </div>
 
					
                      
                      <div class="col-xs-6 sign"  style="float:right; width:auto;">
                    	
                        	<label><span style="color:#ff2518;font-weight:bold;">Report By:</span> <b><?php if(isset($res['user_id'])) { echo getlogeedname($res['user_id']); } ?></b></label>
                        
                       
                    </div>
                     </div>
                     
                     
                  </div>
                </div>
              </div>

              

              

              

              

              
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php /*?> <?php include "footer.php"; ?><?php */?>
        <!-- /footer content -->
      </div>
      @include('partials.footer')
    </div>

    <!-- jQuery -->
    <script src="/vendors1/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/vendors1/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
   
    <!-- NProgress -->
    
    <!-- iCheck -->
   
    <!-- Datatables -->
    <script src="/vendors1/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/vendors1/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="/vendors1/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <!--<script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>-->

    <!-- Custom Theme Scripts -->
    <script src="/build/js/custom.min.js"></script>
    
   

 @stop 