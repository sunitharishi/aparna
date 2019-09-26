<!DOCTYPE html>



<html lang="en">



  <head>



    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">



    <!-- Meta, title, CSS, favicons, etc. -->



    <meta charset="utf-8">



    <meta http-equiv="X-UA-Compatible" content="IE=edge">



    <meta name="viewport" content="width=device-width, initial-scale=1">







    <title>Security</title>







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



	.security table tbody tr td



  {



   font-size:11px;



   padding:1px;



  }
  .security table tbody tr th



  {



   font-size:11px;



   padding:1px;



  }


  .security table tbody tr td.left-align

  {

   vertical-align:top;

   padding-left:1px;

  }
  .row.x_title
  {
   margin-bottom:3px;
  }
  .security table
  {
   border-collapse:collapse;
  }

  .date

  {

   font-weight:bold;

   font-size:14px;

   color:#000;

   text-align:right;

  }
tr td p
{
    word-break: normal;
    white-space: nowrap;
	margin-bottom:0px;
	margin-top:0px;
}
.sign
{
 margin-top:2px;
 font-size:11px;
 float:right;
}
.last-modified
{
 margin-top:2px;
 font-size:11px;
 float:left;
}
.text-center
{
 text-align:center;
}
	</style>



  </head>  






<body>
 



    <div class="container body">



      <div class="main_container">



      <?php /*?><?php include "header.php"; ?><?php */?>



        <!-- /top navigation -->







        <!-- page content -->



        <div class="right_col" role="main">



          <div class="models">



            



            <div class="row">



              <div class="col-md-12 col-sm-12 col-xs-12">



                <div>



                  <div class="row x_title" style="border-bottom:none;margin-bottom:0px;padding-bottom:0px; clear:both; width:100%;">

                     <span class="col-sm-6 col-xs-6" style="font-weight:bold;font-size:19px;color:#000; float:left;">APMS |<?php echo get_sitename($sitefilter);?> </span>

                        <div class="col-sm-6 col-xs-6 date" style="float:right;">SECURITY | DATE: <?php echo $datefilter;?> | TIME: <?php date_default_timezone_set('Asia/Kolkata'); echo date("h:i:sa"); $pemsresv = getdefaultpmstot($sitefilter); ?></div>

						<?php $resval = getdefaultsecurity($sitefilter); ?>

                  </div>



                  <div class="x_content security" style="color:#000; clear:both; width:100%;">

                     <table width="100%" border="1" style="text-align:left;padding:1px;">

                     	<tbody style="border:1px solid #000;">

                        	<tr style="text-align:left;">

                            	<td><b>SL.NO</b></td>

                                <td><b>Details</b></td>

                                <td><b>Guard</b></td>

                                <td><p><b>Lady Guard</b></p></td>

                                <td><p><b>Head Guard</b></p></td>

                                <td><b>SUP</b></td>

                                <td><b>A.S.O</b></td>

                                <td><b>S.O</b></td>

                                <td colspan="2"><b>Remarks</b></td>

                            </tr>

                            <tr>

                            	<td rowspan="8" class="text-center"><b>1</b></td>

                                <td><b>Duties Scheduled</b></td>

                                <td class="text-center"><span><?php if(isset($res['ds_guard']))echo $res['ds_guard']; ?></span></td>

                                <td class="text-center"><span><?php if(isset($res['ds_lguard']))echo $res['ds_lguard']; ?></span></td>

                                <td class="text-center"><span><?php if(isset($res['ds_hguard']))echo $res['ds_hguard']; ?></span></td>

                               <td class="text-center"><span><?php if(isset($res['ds_sup']))echo $res['ds_sup']; ?></span></td>

                                <td class="text-center"><span><?php if(isset($res['ds_aso']))echo $res['ds_aso']; ?></span></td>

                                <td class="text-center"><span><?php if(isset($res['ds_so']))echo $res['ds_so']; ?></span></td>

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

                            	

                                <td><b>Duties Performed</b></td>

                                <td class="text-center"><span><?php if(isset($res['dp_guard']))echo $res['dp_guard']; ?></span></td>

                                <td class="text-center"><span><?php if(isset($res['dp_lguard']))echo $res['dp_lguard']; ?></span></td>

                                 <td class="text-center"><span><?php if(isset($res['dp_hguard']))echo $res['dp_hguard']; ?></span></td>

                                  <td class="text-center"><span><?php if(isset($res['dp_sup']))echo $res['dp_sup']; ?></span></td>

                                <td class="text-center"><span><?php if(isset($res['dp_aso']))echo $res['dp_aso']; ?></span></td>

                                <td class="text-center"><span><?php if(isset($res['dp_so']))echo $res['dp_so']; ?></span></td>

                            </tr>

                            <tr>

                            	

                                <td><b>Ph Attendance</b></td>

                                <td class="text-center"><span><?php if(isset($res['pha_guard']))echo $res['pha_guard']; ?></span></td>

                                <td class="text-center"><span><?php if(isset($res['pha_lguard']))echo $res['pha_lguard']; ?></span></td>

                                <td class="text-center"><span><?php if(isset($res['pha_hguard']))echo $res['pha_hguard']; ?></span></td>

								 <td class="text-center"><span><?php if(isset($res['pha_sup']))echo $res['pha_sup']; ?></span></td>

                                <td class="text-center"><span><?php if(isset($res['pha_aso']))echo $res['pha_aso']; ?></span></td>

                                <td class="text-center"><span><?php if(isset($res['pha_so']))echo $res['pha_so']; ?></span></td>

                            </tr>

                           

                            <tr>

                            	

                                <td><b>Weekly off</b></td>

                                <td class="text-center"><span><?php if(isset($res['wko_guard']))echo $res['wko_guard']; ?></span></td>

                                <td class="text-center"><span><?php if(isset($res['wko_lguard']))echo $res['wko_lguard']; ?></span></td>

                                <td class="text-center"><span><?php if(isset($res['wko_hguard']))echo $res['wko_hguard']; ?></span></td>

                                 <td class="text-center"><span><?php if(isset($res['wko_sup']))echo $res['wko_sup']; ?></span></td>

                                <td class="text-center"><span><?php if(isset($res['wko_aso']))echo $res['wko_aso']; ?></span></td>

                                <td class="text-center"><span><?php if(isset($res['wko_so']))echo $res['wko_so']; ?></span></td>

                            </tr>

                             <tr>

                            	

                                <td><b>Absent</b></td>

								<td class="text-center"><span><?php if(isset($res['ab_guard']))echo $res['ab_guard']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['ab_lguard']))echo $res['ab_lguard']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['ab_hguard']))echo $res['ab_hguard']; ?></span></td>

                                 <td class="text-center"><span><?php if(isset($res['ab_sup']))echo $res['ab_sup']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['ab_aso']))echo $res['ab_aso']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['ab_so']))echo $res['ab_so']; ?></span></td>


                            </tr>

                        	<tr>

                            	

                                <td style="padding:0px;"><p><b>Transfer from other sites</b></p></td>

                                <td class="text-center"><span><?php if(isset($res['tfo_guard']))echo $res['tfo_guard']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['tfo_lguard']))echo $res['tfo_lguard']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['tfo_hguard']))echo $res['tfo_hguard']; ?></span></td>

                                  <td class="text-center"><span><?php if(isset($res['tfo_sup']))echo $res['tfo_sup']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['tfo_aso']))echo $res['tfo_aso']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['tfo_so']))echo $res['tfo_so']; ?></span></td>

                            </tr>

                            <tr>

                            	

                                <td style="padding:0px;"><p><b>Transfer to other sites</b></p></td>

								<td class="text-center"><span><?php if(isset($res['tto_guard']))echo $res['tto_guard']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['tto_lguard']))echo $res['tto_lguard']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['tto_hguard']))echo $res['tto_hguard']; ?></span></td>

                                <td class="text-center"><span><?php if(isset($res['tto_sup']))echo $res['tto_sup']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['tto_aso']))echo $res['tto_aso']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['tto_so']))echo $res['tto_so']; ?></span></td>

                            </tr>

                             <tr class="reserved">

                            	

                                <td style="padding:0px;"><p><b>Reserved</b></p></td>

								<td class="text-center"><span><?php if(isset($res['rsv_guard']))echo $res['rsv_guard']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['rsv_lguard']))echo $res['rsv_lguard']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['rsv_hguard']))echo $res['rsv_hguard']; ?></span></td>

                                 <td class="text-center"><span><?php if(isset($res['rsv_sup']))echo $res['rsv_sup']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['rsv_aso']))echo $res['rsv_aso']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['rsv_so']))echo $res['rsv_so']; ?></span></td>

                            </tr>

                            

                             <tr>

                            	<td rowspan="2" class="text-center"><b>2</b></td>

                                <td><b>Day shift</b></td>

								<td class="text-center"><span><?php if(isset($res['dsh_guard']))echo $res['dsh_guard']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['dsh_lguard']))echo $res['dsh_lguard']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['dsh_hguard']))echo $res['dsh_hguard']; ?></span></td>

                                 <td class="text-center"><span><?php if(isset($res['dsh_sup']))echo $res['dsh_sup']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['dsh_aso']))echo $res['dsh_aso']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['dsh_so']))echo $res['dsh_so']; ?></span></td>

								<td rowspan="2" colspan="2" class="left-align"><span><?php if(isset($res['dsh_remarks'])) { if($res['dsh_remarks']) echo "<b>Day shift: </b>".$res['dsh_remarks']."<br>"; }?>
								<?php if(isset($res['dp_remarks'])) { if($res['nsh_remarks']) echo "<b>Night shift: </b>".$res['nsh_remarks']."<br>"; }?></span></td>

								

								  

                            </tr>

                            <tr>

                            	

                                <td><b>Night shift</b></td>

								<td class="text-center"><span><?php if(isset($res['nsh_guard']))echo $res['nsh_guard']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['nsh_lguard']))echo $res['nsh_lguard']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['nsh_hguard']))echo $res['nsh_hguard']; ?></span></td>

                                 <td class="text-center"><span><?php if(isset($res['nsh_sup']))echo $res['nsh_sup']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['nsh_aso']))echo $res['nsh_aso']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['nsh_so']))echo $res['nsh_so']; ?></span></td>

                            </tr>

                           

                            

                            <tr>

                            	<td rowspan="3" class="text-center"><b>3</b></td>

                                <td><b>Less than 20 Yrs</b></td>

								<td class="text-center"><span><?php if(isset($res['lt20_guard']))echo $res['lt20_guard']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['lt20_lguard']))echo $res['lt20_lguard']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['lt20_hguard']))echo $res['lt20_hguard']; ?></span></td>

                                 <td class="text-center"><span><?php if(isset($res['lt20_sup']))echo $res['lt20_sup']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['lt20_aso']))echo $res['lt20_aso']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['lt20_so']))echo $res['lt20_so']; ?></span></td>

								<td rowspan="3" colspan="2" class="left-align"><span><?php if(isset($res['lt20_remarks'])) { if($res['lt20_remarks']) echo "<b>Less than 20 Yrs: </b>".$res['lt20_remarks']."<br>"; }?>

								<?php if(isset($res['lt50_remarks'])) { if($res['lt50_remarks'])  echo "<b>Less than 50 Kgs: </b>".$res['lt50_remarks']."<br>"; }?><?php if(isset($res['lt51_remarks']))echo $res['lt51_remarks']."<br>"; ?><?php if(isset($res['lt52_remarks'])) { if($res['lt52_remarks']) echo "<b>Less than 5'2: </b>".$res['lt52_remarks']."<br>"; }?></span></td>

                            </tr>

                            <tr>  

                            	

                                <td><b>Less than 50 Kgs</b></td>

								<td class="text-center"><span><?php if(isset($res['lt50_guard']))echo $res['lt50_guard']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['lt50_lguard']))echo $res['lt50_lguard']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['lt50_hguard']))echo $res['lt50_hguard']; ?></span></td>

                                <td class="text-center"><span><?php if(isset($res['lt50_sup']))echo $res['lt50_sup']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['lt50_aso']))echo $res['lt50_aso']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['lt50_so']))echo $res['lt50_so']; ?></span></td>

                            </tr>

                            <tr>

                            	

                                <td><b>Less than 5'2"</b></td>

								<td class="text-center"><span><?php if(isset($res['lt52_guard']))echo $res['lt52_guard']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['lt52_lguard']))echo $res['lt52_lguard']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['lt52_hguard']))echo $res['lt52_hguard']; ?></span></td>

                                 <td class="text-center"><span><?php if(isset($res['lt52_sup']))echo $res['lt52_sup']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['lt52_aso']))echo $res['lt52_aso']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['lt52_so']))echo $res['lt52_so']; ?></span></td>


                            </tr>

                        

                        	

                            <tr>  

                            	<td rowspan="3" class="text-center"><b>4</b></td>

                                <td><b>Knows Fire Fighting</b></td>

								<td class="text-center"><span><?php if(isset($res['kff_guard']))echo $res['kff_guard']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['kff_lguard']))echo $res['kff_lguard']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['kff_hguard']))echo $res['kff_hguard']; ?></span></td>

                                 <td class="text-center"><span><?php if(isset($res['kff_sup']))echo $res['kff_sup']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['kff_aso']))echo $res['kff_aso']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['kff_so']))echo $res['kff_so']; ?></span></td>

								

								<td rowspan="3" colspan="2" class="left-align"><span><?php if(isset($res['kff_remarks'])) { if($res['kff_remarks']) echo "<b>Knows Fire Fighting: </b>".$res['kff_remarks']."<br>"; }?>
								<?php if(isset($res['kdsh_remarks'])) {  if($res['kdsh_remarks']) echo "<b>Day shift: </b>".$res['kdsh_remarks']."<br>"; }?><?php if(isset($res['knsh_remarks'])) {  if($res['kdsh_remarks'])  echo "<b>Night shift: </b>".$res['kdsh_remarks']; }?>  </span></td>

                            </tr>

                             <tr>

                                <td><b>Day shift</b></td>

								<td class="text-center"><span><?php if(isset($res['kdsh_guard']))echo $res['kdsh_guard']; ?></span></td>

							 	<td class="text-center"><span><?php if(isset($res['kdsh_lguard']))echo $res['kdsh_lguard']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['kdsh_hguard']))echo $res['kdsh_hguard']; ?></span></td>

                                   <td class="text-center"><span><?php if(isset($res['kdsh_sup']))echo $res['kdsh_sup']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['kdsh_aso']))echo $res['kdsh_aso']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['kdsh_so']))echo $res['kdsh_so']; ?></span></td>
                            </tr>

                            <tr>

                                <td><b>Night shift</b></td>

								<td class="text-center"><span><?php if(isset($res['knsh_guard']))echo $res['knsh_guard']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['knsh_lguard']))echo $res['knsh_lguard']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['knsh_hguard']))echo $res['knsh_hguard']; ?></span></td>

                                 <td class="text-center"><span><?php if(isset($res['knsh_sup']))echo $res['knsh_sup']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['knsh_aso']))echo $res['knsh_aso']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['knsh_so']))echo $res['knsh_so']; ?></span></td>


                            </tr>

                             <tr>

                            	<td rowspan="2" class="text-center"><b>5</b></td>

                                <td><b>Additions (N.J +TR)</b></td>

								<td class="text-center"><span><?php if(isset($res['add_guard']))echo $res['add_guard']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['add_lguard']))echo $res['add_lguard']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['add_hguard']))echo $res['add_hguard']; ?></span></td>

                                 <td class="text-center"><span><?php if(isset($res['add_sup']))echo $res['add_sup']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['add_aso']))echo $res['add_aso']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['add_so']))echo $res['add_so']; ?></span></td>

								<td rowspan="2" colspan="2" class="left-align"><span><?php if(isset($res['add_remarks'])) {  if($res['add_remarks']) echo "<b>Additions: </b>".$res['add_remarks']."<br>"; }?><?php if(isset($res['del_remarks'])) {  if($res['del_remarks'])  echo "<b>Deletions: </b>".$res['del_remarks']; }?>  </span></td>

                            </tr>

                            <tr>

                            	

                                <td><b>Deletions (TR +Left)</b></td>

								<td class="text-center"><span><?php if(isset($res['del_guard']))echo $res['del_guard']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['del_lguard']))echo $res['del_lguard']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['del_hguard']))echo $res['del_hguard']; ?></span></td>

                                 <td class="text-center"><span><?php if(isset($res['del_sup']))echo $res['del_sup']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['del_aso']))echo $res['del_aso']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['del_so']))echo $res['del_so']; ?></span></td>

                                

                            </tr>

                            

                        <tr>

                            	<td rowspan="2" class="text-center"><b>6</b></td>

                                <td><b>Without Uniform</b></td>

								<td class="text-center"><span><?php if(isset($res['wu_guard']))echo $res['wu_guard']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['wu_lguard']))echo $res['wu_lguard']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['wu_hguard']))echo $res['wu_hguard']; ?></span></td>

                                 <td class="text-center"><span><?php if(isset($res['wu_sup']))echo $res['wu_sup']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['wu_aso']))echo $res['wu_aso']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['wu_so']))echo $res['wu_so']; ?></span></td>

                                <td rowspan="2" colspan="2" class="left-align"><span><?php if(isset($res['wu_remarks'])){ echo "<b>Without Uniform: </b>".$res['wu_remarks']."<br/>"; }if(isset($res['ws_remarks'])){ echo "<b>Without Shoes: </b>".$res['ws_remarks']."<br/"; }?></span></td>

                            </tr> 

                            <tr>

                            	

                                <td><b>Without Shoes</b></td>

								<td class="text-center"><span><?php if(isset($res['ws_guard']))echo $res['ws_guard']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['ws_lguard']))echo $res['ws_lguard']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['ws_hguard']))echo $res['ws_hguard']; ?></span></td>

                                  <td class="text-center"><span><?php if(isset($res['ws_sup']))echo $res['ws_sup']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['ws_aso']))echo $res['ws_aso']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['ws_so']))echo $res['ws_so']; ?></span></td>

                               

                            </tr> 

                            

                              

                             <tr>

                            	<td rowspan="2" class="text-center"><b>7</b></td>

                                <td><b>Briefing Mor.</b></td>

								<td class="text-center"><span><?php if(isset($res['bm_guard']))echo $res['bm_guard']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['bm_lguard']))echo $res['bm_lguard']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['bm_hguard']))echo $res['bm_hguard']; ?></span></td>

                                 <td class="text-center"><span><?php if(isset($res['bm_sup']))echo $res['bm_sup']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['bm_aso']))echo $res['bm_aso']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['bm_so']))echo $res['bm_so']; ?></span></td>

								<td rowspan="2" colspan="2" class="left-align"><span><?php if(isset($res['bm_remarks'])){ echo "<b>Briefing Mor: </b>".$res['bm_remarks']."<br/>"; }if(isset($res['ae_remarks'])){ echo "<b>Attended Eve: </b>".$res['ae_remarks']."<br/"; }?></span></td>
                            </tr>

                            <tr>

                            	

                                <td><b>Attended Eve.</b></td>

                              	<td class="text-center"><span><?php if(isset($res['ae_guard']))echo $res['ae_guard']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['ae_lguard']))echo $res['ae_lguard']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['ae_hguard']))echo $res['ae_hguard']; ?></span></td>

                                 <td class="text-center"><span><?php if(isset($res['ae_sup']))echo $res['ae_sup']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['ae_aso']))echo $res['ae_aso']; ?></span></td>

								<td class="text-center"><span><?php if(isset($res['ae_so']))echo $res['ae_so']; ?></span></td>

                           </tr>

                            

                            <tr>

                            	<td rowspan="2" class="text-center"><b>8</b></td> 

                                <td rowspan="2"><b>Not Working / Total No's</b></td> 

                                <td class="text-center"><b>CCTV</b></td>

                                <td class="text-center"><b>Boom.B</b></td>

                                <td class="text-center"><b>W.T</b></td>

                                <td colspan="2" class="text-center"><b>Torches</b></td>

                                <td class="text-center"><b>Bio.M.</b></td>

                               <td rowspan="2" colspan="2" class="left-align"><span><?php if(isset($res['nw_remarks'])){ echo $res['nw_remarks']."<br/"; }?></span></td>

                            </tr>

                            <tr>

                            	 

                                

                                <td class="text-center"><span><?php if(isset($res['nw_cctv']))echo $res['nw_cctv']; ?>/<?php echo $resval['cctv'];?></span></td>

                                <td class="text-center"><span><?php if(isset($res['nw_boom']))echo $res['nw_boom']; ?>/<?php echo $resval['boombarrier'];?></span></td>

                                <td class="text-center"><span><?php if(isset($res['nw_wt']))echo $res['nw_wt']; ?>/<?php echo $resval['wt'];?></span></td>

                                <td colspan="2" class="text-center"><span><?php if(isset($res['nw_torch']))echo $res['nw_torch']; ?>/<?php echo $resval['torches'];?></span></td>

                                <td class="text-center"><span><?php if(isset($res['nw_bio']))echo $res['nw_bio']; ?>/<?php echo $resval['biomachine'];?></span></td>
                            </tr>
                             <tr>

                            	<td rowspan="2" class="text-center"><b>9</b></td>

                                 <td rowspan="2"><b>Available No's</b></td>

                                <td class="text-center"><b>Tabs</b></td>

                                <td class="text-center"><b>Whistles</b></td> 

                                <td class="text-center"><b>Batons</b></td>

                                <td colspan="2" class="text-center"><b>Rain.C</b></td>

                                <td class="text-center"><b>Umbrellas</b></td>

                                <td rowspan="2" colspan="2" class="left-align"><span><?php if(isset($res['av_remarks'])){ echo $res['av_remarks']."<br/"; }?></span></td>

                            </tr>

                            <tr>

                            	

                               

                                <td class="text-center"><span><?php if(isset($res['av_tab']))echo $res['av_tab']; ?>/<?php echo $resval['av_tabs'];?></span></td>

                                <td class="text-center"><span><?php if(isset($res['av_whi']))echo $res['av_whi']; ?>/<?php echo $resval['av_whistles'];?></span></td>

                                <td class="text-center"><span><?php if(isset($res['av_bat']))echo $res['av_bat']; ?>/<?php echo $resval['av_batons'];?></span></td>

                                <td colspan="2" class="text-center"><span><?php if(isset($res['av_rai']))echo $res['av_rai']; ?>/<?php echo $resval['av_rain_c'];?></span></td>

                                <td class="text-center"><span><?php if(isset($res['av_umb']))echo $res['av_umb']; ?>/<?php echo $resval['av_umbrellas'];?></span></td>

                              

                            </tr> 
                            <tr>

                            	<td rowspan="2" class="text-center"><b>10</b></td>

                                <td><b>Solar Fencing</b></td>

                                <td class="text-center"><b>Zone 1</b></td>

                                <td class="text-center"><b>Zone 2</b></td>

                                <td class="text-center"><b>Zone 3</b></td>

                                <td colspan="2" class="text-center"><b>Zone 4</b></td>

                                <td class="text-center"><b>T.Kit</b></td>

                                 <td rowspan="2" colspan="2" class="left-align"><span><?php if(isset($res['sf_remarks'])){ echo $res['sf_remarks']; }?></span></td>

                            </tr>

                            <tr>

                            	

                                <td><b>Working Status</b></td>

                                <td class="text-center"><span><?php if(isset($res['sf_zone1']))echo $res['sf_zone1']; ?></span></td>

                                <td class="text-center"><span><?php if(isset($res['sf_zone2']))echo $res['sf_zone2']; ?></span></td>

                                <td class="text-center"><span><?php if(isset($res['sf_zone3']))echo $res['sf_zone3']; ?></span></td>

                                <td colspan="2" class="text-center"><span><?php if(isset($res['sf_zone4']))echo $res['sf_zone4']; ?></span></td>

                                <td class="text-center"><span><?php if(isset($res['sf_tkit']))echo $res['sf_tkit']; ?></span></td>

                               

                            </tr>

                           <tr>

                            	<td rowspan="2" class="text-center"><b>11</b></td> 

                                <td><b>Allowed without</b></td>

                                <td class="text-center"><b>Maids</b></td>

                                <td class="text-center"><b>Drivers</b></td>

                                <td class="text-center"><b>Vendors</b></td>

                                <td colspan="2" class="text-center"><b>Interiors</b></td>

                                <td class="text-center"><b>Others</b></td>

                                        <td rowspan="2" colspan="2" class="left-align"><span><?php if(isset($res['aw_remarks'])){ echo $res['aw_remarks']; }?></span></td>

                            </tr>

                           
                            <tr>

                            	

                                <td><b>ID Cards.</b></td>

                                 <td class="text-center"><span><?php if(isset($res['aw_maid']))echo $res['aw_maid']; ?>/<?php if(isset($res['id_maid'])) echo $res['id_maid'];?></span></td>

                                <td class="text-center"><span><?php if(isset($res['aw_dri']))echo $res['aw_dri']; ?>/<?php if(isset($res['id_dri'])) echo $res['id_dri'];?></span></td>

                                 <td class="text-center"><span><?php if(isset($res['aw_ven']))echo $res['aw_ven']; ?>/<?php if(isset($res['id_ven'])) echo $res['id_ven'];?></span></td>

                                 <td colspan="2" class="text-center"><span><?php if(isset($res['aw_inte']))echo $res['aw_inte']; ?>/<?php if(isset($res['id_inte'])) echo $res['id_inte'];?></span></td>

                                 <td class="text-center"><span><?php if(isset($res['aw_others']))echo $res['aw_others']; ?>/<?php if(isset($res['id_others'])) echo $res['id_others'];?></span></td>

                                 

                            </tr> 

                              

                             <tr>

                            	<td rowspan="3" class="text-center"><b>12</b></td>

                                <td><b>Data Sheet Pending</b></td>

                                <td><b>Night Tea Served at</b></td>

                                <td><b>Night Bio Checked</b></td>

                                <td><b>W/O Stickers</b></td>

                                <td><b>Missing Keys</b></td>
                                  <td><b>Lost & Found</b></td>
                                <td ><b>Sleeping Cases</b></td>

                                <td><b>Interior Works</b></td>

                                <td><b>Night Check</b></td>

                            </tr>

                            <tr>

                                <td rowspan="2" class="text-center"><span><?php if(isset($res['ds_pending']))echo $res['ds_pending']; ?></span></td>

                                <td rowspan="2" class="text-center"><span><?php if(isset($res['nts_time']))echo $res['nts_time']; ?></span></td>

                                <td rowspan="2" class="text-center"><span><?php if(isset($res['nbc_chk']))echo $res['nbc_chk']; ?></span></td>

                                <td class="text-center"><b>2W:</b><span><?php if(isset($res['wo_stick_2w']))echo $res['wo_stick_2w']; ?></span></td>

                                <td rowspan="2" class="text-center"><span><?php if(isset($res['mis_keys']))echo $res['mis_keys']; ?></span></td>
                                
                                 <td rowspan="2" class="text-center"><span><?php if(isset($res['lost_found']))echo $res['lost_found']; ?></span></td>
                                <td rowspan="2" class="text-center"><span><?php if(isset($res['sleeping_case']))echo $res['sleeping_case']; ?></span></td>

                                <td rowspan="2" class="text-center"><span><?php if(isset($res['interior_works']))echo $res['interior_works']; ?></span></td>

                               <td class="white-spacing"><b>BY.</b> <span><?php if(isset($res['night_check_by']))echo $res['night_check_by']; ?></span></td>

                            </tr>

                            <tr>

                                 

                                

                                <td class="text-center"><b>4W:</b><span><?php if(isset($res['wo_stick_4w']))echo $res['wo_stick_4w']; ?></span></td>

                               

                           <td class="white-spacing"><p><b>Time:</b> <span><?php if(isset($res['night_check_time']))echo $res['night_check_time']; ?></span></p></td>

                            </tr>

                            

                            

                            <!-- <tr>

                             	<td rowspan="2">13</td>

                                <td colspan="8" class="white-left"><b>Violations / Occurances / Drunk Cases / Parades / Cellphone Abuses / Sr.Staff Visits etc.</b></td>

                           	</tr>-->

                             <tr>

                             	<td rowspan="1" class="text-center"><b>13</b></td>

                               <td colspan="9" class="white-spacing"><span><?php if(isset($res['violations'])){ if($res['violations'])echo "<b>Violations: </b>".$res['violations']."<br/>"; }if(isset($res['occurances'])){ echo "<b>Occurances: </b>".$res['occurances']."<br>"; }if(isset($res['drunkcase'])){ if($res['drunkcase']) echo "<b>Drunk Cases: </b>".$res['drunkcase']."<br/>"; }if(isset($res['parades'])){ if($res['parades']) echo "<b>Parades: </b>".$res['parades']."<br>"; }if(isset($res['cellphone_abuses'])){ if($res['cellphone_abuses']) echo "<b>Cellphone Abuses: </b>".$res['cellphone_abuses']."<br>"; }if(isset($res['srstaffvisits'])){ if($res['srstaffvisits']) echo "<b>Sr.Staff Visits etc.: </b>".$res['srstaffvisits']."<br>"; }?></span></td>

                           	</tr>
                            
                              <tr>
                               <td rowspan="1"><b>14</b></td>
                               <td colspan="9" class="white-spacing"><span><?php if(isset($res['tr_resident_vehicle'])){ if($res['tr_resident_vehicle'])echo "<b>Residents Vehicle (4 & 2 wheelers): </b>".$res['tr_resident_vehicle']."<br/>"; }if(isset($res['tr_temp_vendors'])){ echo "<b>Temporary Vendors (persons): </b>".$res['tr_temp_vendors']."<br>"; }if(isset($res['tr_courier_delivery'])){ if($res['tr_courier_delivery']) echo "<b>Courier / Delivery Boys (Persons): </b>".$res['tr_courier_delivery']."<br/>"; }if(isset($res['tr_visitors'])){ if($res['tr_visitors']) echo "<b>Visitors: </b>".$res['tr_visitors']."<br>"; }if(isset($res['tr_construction'])){ if($res['tr_construction']) echo "<b> Construction Team (persons): </b>".$res['tr_construction']."<br>"; }if(isset($res['tr_inter_works'])){ if($res['tr_inter_works']) echo "<b>Inter Works in flats/Villas: </b>".$res['tr_inter_works']."<br>"; }if(isset($res['tr_interior_works_perday'])){ if($res['tr_interior_works_perday']) echo "<b>Interior Workers per day: </b>".$res['tr_interior_works_perday']."<br>"; }?></span></td>
                           	</tr>
                            
                             <tr>
                            	 <td class="text-center"><b>15</b></td>
                                 <td colspan="9"><b>Additional Information:</b><span><?php if(isset($res['reason']))echo $res['reason']; ?></span></td>
							</tr>
                        </tbody> 
                     </table>
					   <?php  date_default_timezone_set('Asia/Calcutta'); ?> 
						<?php
						 if(isset($res['updated_at'])){ 
						    
						    $datearr =  explode(" ",$res['updated_at']);
							$dateday = $datearr[0];
							$datetime = $datearr[1];
							$dateday = date('d-m-Y', strtotime($dateday));
							 ?>
                    <div class="row">
					 <div class="col-xs-6 last-modified"><b>Last Modified Date:</b> <?php echo $dateday." ".$datetime; }?></div>
                      <div class="col-xs-6 sign">
                        	<b>Report By:</b> <?php if(isset($res['user_id'])) { echo getlogeedname($res['user_id']); } ?>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="/vendors1/jquery/dist/jquery.min.js"></script>
    <script src="/vendors1/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/vendors1/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/vendors1/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="/vendors1/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/build/js/custom.min.js"></script>
</body>
</html>