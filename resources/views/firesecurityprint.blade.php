<!DOCTYPE html>

<html lang="en">

  <head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Meta, title, CSS, favicons, etc. -->

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">



    <title>FireSafety</title>



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

	.firesafety-daily table tbody tr th

     {

      padding:2px;

    }

	.firesafety-daily table tbody tr td

	{

	 padding:2px;

	 font-size:12.3px;

	}

	.firesafety-daily table

	{

	 border:1px solid #000;

	}

	.firesafety-daily table tbody tr td h5

	{

	 margin-top:5px;

	 margin-bottom:5px;

	}

	.firesafety-daily h5

	{

	 margin-top:7px;

	}

	.date
	{
	 text-align:right;
	 font-weight:bold;
	 color:#000;
	 font-size:14px;
	 padding-left:0px;
	}
   .last-modified
   {
    margin-top:4px;
	font-size:12px;
   }
    .sign
   {
    margin-top:4px;
	font-size:12px;
	text-align:right;
	padding-left:0px;
   }
   p
   {
    margin-bottom:0px;
	white-space:nowrap;
	word-break:normal;
   }
  .text-center
  {
   text-align:center;
  }
	</style>

  </head>



  <body class="nav-md">

    <div class="container body">

      <div class="main_container">

     <?php /*?> <?php include "header.php"; ?><?php */?>

        <!-- /top navigation -->



        <!-- page content -->

        <div class="right_col" role="main">

          <div class="models">

            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">

			  <?php $fresval = getdefaultfiresafetot($sitefilter);?>

                <div>

                  <div class="row x_title" style="margin-bottom:0px;border-bottom:0px;">

                   		<span class="col-sm-6 col-xs-6" style="font-weight:bold;font-size:19px;color:#000;padding-right:0px;float:left;">APMS | <?php echo get_sitename($sitefilter);?></span>

                        <div class="col-sm-6 col-xs-6 date">FIRE SAFETY | DATE: <?php echo $datefilter;?> | TIME:  <?php date_default_timezone_set('Asia/Kolkata'); echo date("h:i:sa");?></div>

                  </div>

                  <div class="x_content firesafety-daily">
                  	
                    <table width="100%" border="1">
                    	<tbody>
                        	<tr>
                            	<td><b>Training Conducted On Day:</b> <span><?php if(isset($res['training_on']))echo $res['training_on']; ?></span></td>
                                <td colspan="6"><b>Subject:</b> <span><?php if(isset($res['trainsubject']))echo str_replace(",","/",$res['trainsubject']); ?></span></td>
                            </tr>
                            <tr style="border-bottom:1px solid #fff;">
                            	<td><b>No. of Trainings Conducted Till Date:</b> <span><?php if(isset($res['trainingsnumtilldate']))echo $res['trainingsnumtilldate']; ?></span></td>
                                <td colspan="6"><b>No.of People Trained:</b> <span><?php if(isset($res['trainedpeople']))echo str_replace(",","/",$res['trainedpeople']); ?></span></td>
                            </tr>
                            </tbody>
                    </table>
                            
                      <table width="100%" border="1">
                    	<tbody>
                            <tr>
                            	<td rowspan="2"><b>Attendance</b></td>
                                <td class="text-center"><b>Total</b></td>
                                <td class="text-center"><b>Present</b></td>
                                <td class="text-center"><b>Stewards</b></td>
                                <td class="text-center"><b>Sup</b></td>
                                <td class="text-center"><b>Night Shift</b></td>
                                <td><p><b>Pump House</b></p></td>
                                <td><b>auto</b></td>
                                <td><b>manual</b></td>
                                <td><b>OFF</b></td>
                                <td><b>NW</b></td>
                            </tr>
                           
                             <tr>
                             	<td class="text-center"><span><?php if(isset($fresval['attendance']))echo $fresval['attendance']; ?></span><br><?php /*?>Present: <span><?php if(isset($res['suppresentattendance']))echo $res['suppresentattendance']; ?><?php */?></span></td>
                                <td class="text-center"> <span><?php if(isset($res['suppresentattendance']))echo $res['suppresentattendance']; ?></span></td>
                                <td class="text-center"><span><?php if(isset($res['stewardsattendance']))echo $res['stewardsattendance']; ?></span></td>
                                <td class="text-center"><span><?php if(isset($res['supattendance']))echo $res['supattendance']; ?></span></td>
                                <td class="text-center"><span><?php if(isset($res['nightshiftattendance']))echo $res['nightshiftattendance']; ?> </span></td>
                           
                                <td><label style="width:45px;"><b>Jockey: </b></label><span><?php echo $fresval['jockeypump'];?></span></td>
                                <td><span><?php if(isset($res['jockeypumpauto']))echo $res['jockeypumpauto']; ?></span></td>
                                <td><span><?php if(isset($res['jockeypumpmanual']))echo $res['jockeypumpmanual']; ?></span></td>
                                <td><span><?php if(isset($res['jockeypumpoff']))echo $res['jockeypumpoff']; ?></span></td>
                                 <td><span><?php if(isset($res['jockeypumpnotworking']))echo $res['jockeypumpnotworking']; ?></span></td>
                            </tr>
                             <tr>
                            	 <td colspan="3"><b>Auto On/Off of Jockey, Main & DG Pumps checked on Date:</b> <span><?php if(isset($res['autoonoff_date']))echo $res['autoonoff_date']; ?></span></td>
                                 <td colspan="3"><b>Next trail run scheduled on Date:</b><br> <span><?php if(isset($res['next_trail_date']))echo $res['next_trail_date']; ?></span></td>
                                <td><label style="width:45px;"><b>Main: </b></label><span><?php echo $fresval['mainpump'];?></span></td>
                                <td><span><?php if(isset($res['mainpumpauto']))echo $res['mainpumpauto']; ?></span></td>
                                <td ><span><?php if(isset($res['mainpumpmanual']))echo $res['mainpumpmanual']; ?></span></td>
                                  <td><span><?php if(isset($res['mainpumpoff']))echo $res['mainpumpoff']; ?></span></td>
                                   <td><span><?php if(isset($res['mainpumpnotworking']))echo $res['mainpumpnotworking']; ?></span></td>
                            </tr>
                            <tr>
                               <td colspan="3"><b><p>Last Mock drill Conducted on:</p></b> <span><?php if(isset($res['lastmockdrillcondut']))echo $res['lastmockdrillcondut']; ?></span></td>
                               <td colspan="3"><b><p>Next Mock drill Schedule as per matrix:</p></b> <span><?php if(isset($res['nextmockdrillconduct']))echo $res['nextmockdrillconduct']; ?></span></td>
                                <td><label  style="width:45px;"><b>DG: </b></label><span><?php echo $fresval['dgpump'];?></span></td>
                                 <td><span><?php if(isset($res['dgpumpauto']))echo $res['dgpumpauto']; ?></span></td>
                                <td><span><?php if(isset($res['dgpumpmanual']))echo $res['dgpumpmanual']; ?></span></td>
                                 <td><span><?php if(isset($res['dgpumpoff']))echo $res['dgpumpoff']; ?></span></td>
                                  <td><span><?php if(isset($res['dgpumpnotworking']))echo $res['dgpumpnotworking']; ?></span></td>
                            </tr>
                              <tr style="border-bottom:1px solid #fff;">  
                               <td ><b>Group Indication panel</b></td>
                               <td><b>Working:</b> <span><?php if(isset($res['grind_panel_working']))echo $res['grind_panel_working']; ?></span></td>
                               <td><b>Not Working:</b> <span><?php if(isset($res['grind_panel_ntworking']))echo $res['grind_panel_ntworking']; ?></span></td> 
                               <td colspan="3" ><b>Reason For Not Working:</b> <span><?php if(isset($res['grind_panel_re_ntworking']))echo $res['grind_panel_re_ntworking']; ?></span></td>
                               <td ><label style="width:45px;"><b>DW:</b> </label><span><?php echo $fresval['dewaterpumps'];?></span></td>
                               <td class="text-center" ><span><?php if(isset($res['dewaterpumpauto']))echo $res['dewaterpumpauto']; ?></span></td>
                               <td class="text-center" ><span><?php if(isset($res['dewaterpumpmanual']))echo $res['dewaterpumpmanual']; ?></span></td>
                               <td class="text-center" ><span><?php if(isset($res['dewaterpumpoff']))echo $res['dewaterpumpoff']; ?></span></td>
                               <td class="text-center" ><span><?php if(isset($res['dewaterpumpnotworking']))echo $res['dewaterpumpnotworking']; ?></span></td> 
                            </tr>
                           
                            </tbody>
                    </table>
                            
                            
                        
                        <table width="100%" border="1">
                            <tbody>
                            	<tr>
                                	<td colspan="2"><b>Water Drain out schedule</b> <span><?php if(isset($res['waterdrainshed']))echo $res['waterdrainshed']; ?></span></td>
                                    <td></td>
                                     <td class="text-center"><b>Auto</b></td>
                                    <td class="text-center"><b>Manual</b></td>
                                     <td class="text-center"><b>OFF</b></td>
                                      <td class="text-center"><b>NW</b></td>
                                </tr>
                                <tr>
                                    <td><b>Previous Date</b> <span><?php if(isset($res['previousdate']))echo $res['previousdate']; ?></span></td>
                                     <td><b>Next Date</b> <span><?php if(isset($res['nextdate']))echo $res['nextdate']; ?></span></td>
                                    <td><b>Booster Pumps: </b><span><?php echo $fresval['boosterpumps'];?></td>
                                     <td class="text-center"><span><?php if(isset($res['boosterautopumps']))echo $res['boosterautopumps']; ?></span></td>
                                      <td class="text-center"><span><?php if(isset($res['boostermanualpumps']))echo $res['boostermanualpumps']; ?></span></td>
                                      <td class="text-center"><span><?php if(isset($res['boosterpumpsoff']))echo $res['boosterpumpsoff']; ?></span></td>
                                      <td class="text-center"><span><?php if(isset($res['boosterpumpsnotworking']))echo $res['boosterpumpsnotworking']; ?></span></td>
                                </tr>
                                <tr>
                                   <td colspan="2"><b>Reasons for Not working/off & Manual</b><br><span><?php if(isset($res['reasonformanual'])){ if($res['reasonformanual']) echo "<b>Manual: </b>".$res['reasonformanual']."<br>"; } ?><?php if(isset($res['reasonforoff'])){ if($res['reasonforoff']) echo "<b>Off: </b>".$res['reasonforoff']; } ?></span></td>
                                    <td colspan="5"><b>Reasons for Not working/off & Manual</b><br><span><?php if(isset($res['boosterreasonmanual'])){ if($res['boosterreasonmanual']) echo "<b>Manual: </b>".$res['boosterreasonmanual']."<br>"; } ?><?php if(isset($res['boosterreasonoff'])){ if($res['boosterreasonoff']) echo "<b>Off: </b>".$res['boosterreasonoff']; } ?></span></td>
                                </tr>
                                <tr style="border-bottom:1px solid #fff;">
                                  
                                	 <td colspan="2"><b>Next trail run scheduled on Date:</b> <span><?php if(isset($res['boostershedule_on_date']))echo $res['boostershedule_on_date']; ?></span></td>
                                     <td colspan="5"><b>Booster Pumps checked on Date:</b> <span><?php if(isset($res['boosterchecked_on_date']))echo $res['boosterchecked_on_date']; ?></span></td>
                                </tr>
                              
                            </tbody>
                        </table>    
                      
                 
                    
                
                    
                    
                    
                    
                    
                    
                    <table width="100%" border="1">
                         <tbody>
                             <tr>
                                <td><b>False Alarm:</b> <span><?php if(isset($res['falsealaram']))echo $res['falsealaram']; ?></span></td>
                                 <td colspan="3"><b>Reason: </b><span><?php if(isset($res['falsealaramremarks']))echo $res['falsealaramremarks']; ?></span></td>
                             </tr>
                             
                             <tr>
                                <td></td>
                                <td><b>Working</b></td>
                                <td><b>Not Working</b></td>
                                <td><b>Reasons for Not Working</b></td>
                             </tr>
                         	<tr>
                            	<td><b>Fire Alarm: </b><span><?php echo $fresval['firealarmsystem'];?></span></td>
                                 <td class="text-center"><span><?php if(isset($res['firealaramsysworking']))echo $res['firealaramsysworking']; ?></span></td>
                                <td class="text-center"><span><?php if(isset($res['firealaramsysnotworking']))echo $res['firealaramsysnotworking']; ?></span></td>
                                 <td><span><?php if(isset($res['firealaramnotworkingreason']))echo $res['firealaramnotworkingreason']; ?></span></td>
                            </tr>
                            <tr>
                               <td><b>FA system Repeater panel: </b><span></span></td>
                               <td class="text-center"><span><?php if(isset($res['fasys_panel_working']))echo $res['fasys_panel_working']; ?></span></td>
                               <td class="text-center"><span><?php if(isset($res['fasys_panel_ntworking']))echo $res['fasys_panel_ntworking']; ?></span></td>
                               <td><span><?php if(isset($res['fasys_panel_re_ntworking']))echo $res['fasys_panel_re_ntworking']; ?></span></td>
                            </tr>
                            <tr>
                                 <td><b>Public Addressing System: </b><span><?php echo $fresval['publicaddressys'];?></span></td>
                                <td class="text-center"><span><?php if(isset($res['passystemworking']))echo $res['passystemworking']; ?></span></td>
                                <td class="text-center"><span><?php if(isset($res['passystemnotworking']))echo $res['passystemnotworking']; ?></span></td>
                                 <td><span><?php if(isset($res['passystemreasonnotworking']))echo $res['passystemreasonnotworking']; ?></span></td>
                            </tr>
                              <tr>
                               <td><b>PA system repeater panel: </b><span><?php echo $fresval['pasysrepeaterpanel'];?></span></td>
                               <td class="text-center"><span><?php if(isset($res['pasys_panel_working']))echo $res['pasys_panel_working']; ?></span></td>
                               <td class="text-center"><span><?php if(isset($res['pasys_panel_ntworking']))echo $res['pasys_panel_ntworking']; ?></span></td>
                               <td><span><?php if(isset($res['pasys_panel_re_ntworking']))echo $res['pasys_panel_re_ntworking']; ?></span></td>
                            </tr>
                            <tr style="border-bottom:1px solid #fff;">
                               <td><b>Carbon Emission System: </b><span><?php echo $fresval['carbonemissionsys'];?></span></td>
                                 <td class="text-center"><span><?php if(isset($res['carbonemissionworking']))echo $res['carbonemissionworking']; ?></span></td>
                                <td class="text-center"><span><?php if(isset($res['carbonemissionnotworking']))echo $res['carbonemissionnotworking']; ?></span></td>
                                 <td><span><?php if(isset($res['carbonemissreasonnotworking']))echo $res['carbonemissreasonnotworking']; ?></span></td>
                            </tr>
                         </tbody>
                    </table>
                    
                 
                    
                     <table width="100%" border="1">
                         <tbody>
                         	<!--<tr>
                                <td><b>Sumps / OHT - Water Levels</b></td>
                                <td><b>Water Levels (High/Medium/Low)</b></td>
                                <td><b>Last Cleaned Date</b></td>
                                <td><b>Next Cleaning Date</b></td>
                            </tr>-->
                            <tr>
                                <td><b>Sumps:</b> <span><?php if(isset($res['sumpstotnum']))echo " ".$res['sumpstotnum']; ?></span></td>
                                <td><b>Water Levels:</b> <span><?php if(isset($res['sumpwaterlevel']))echo "  ".$res['sumpwaterlevel']; ?><?php  if(isset($res['sumptotwaterlevel']))echo ": ".$res['sumptotwaterlevel']; ?></span></td>
                                <td><b>Last Cleaned Date:</b> <span><?php if(isset($res['sumplastcleandate']))echo $res['sumplastcleandate']; ?></span></td>
                                <td><b>Next Cleaning Date:</b> <span><?php if(isset($res['sumpnextcleaningdate']))echo $res['sumpnextcleaningdate']; ?></span></td>
                            </tr>
                        
                            <tr style="border-bottom:1px solid #fff;">
                            	<td><b>OHT Tanks:</b> <span><?php if(isset($res['ohttankstotnum']))echo " ".$res['ohttankstotnum']; ?></span></td>
                                <td><b>Water Levels:</b> <span><?php if(isset($res['ohtwaterlevel']))echo " ".$res['ohtwaterlevel']; ?><?php  if(isset($res['totohtwaterlevel']))echo ": ".$res['totohtwaterlevel']; ?></span></td></span></td>
                                
                                <td colspan="2"><b>Next Cleaning Date:</b> <span><?php if(isset($res['ohtnextcleaningdate']))echo $res['ohtnextcleaningdate']; ?></span></td>
                            </tr>
                         </tbody>
                    </table>
                    
                     <table width="100%" border="1"> 
                         <tbody>
                         	<tr>
                            	<td colspan="2"><b>Work Permits</b></td>
                                <td><b>Fire Extinguishers</b></td>
                                <td class="text-center"><b>Total</b></td>
                                <td class="text-center"><b>Discharged</b></td>
                            </tr>
                            <tr>
                            	<td><b>No. of Hot Work Permits Issued</b></td>
                                <td><span><?php if(isset($res['numofworkpermitsissued']))echo $res['numofworkpermitsissued']; ?></span></td>
                                <td><b>C0<sub>2</sub> Fire Extinguishers</b></td>
                                <td class="text-center"><span><?php echo $fresval['co2'];?></span></td>
                                <td class="text-center"><span><?php if(isset($res['co2firenotworking']))echo $res['co2firenotworking']; ?></span></td>
                            </tr>
                            <tr>
                                <td><b>No. of General Work Permits Issued</b></td>
                                <td><span><?php if(isset($res['generalworkpermitsnum']))echo $res['generalworkpermitsnum']; ?></span></td>
                                <td><b>DCP Fire Extinguishers</b></td>
                                 <td class="text-center"><span><?php echo $fresval['dcp'];?></span></td>
                                <td class="text-center"><span><?php if(isset($res['dcpfirenotworking']))echo $res['dcpfirenotworking']; ?></span></td>
                            </tr>
                             <tr>
                            	<td><b>No. of Electrical Work Permits Issued</b></td>
                                <td><span><?php if(isset($res['electricalworkpermitsissued']))echo $res['electricalworkpermitsissued']; ?></span></td>
                                <td><b>WaterFire Extinguishers</b></td>
                                 <td class="text-center"><span><?php echo $fresval['water'];?></span></td>
                                <td class="text-center"><span><?php if(isset($res['waterfirenotworking']))echo $res['waterfirenotworking']; ?></span></td>
                             </tr>
                             <tr>
                                <td><b>No. of Height Work Permits Issued</b></td>
                                <td><span><?php if(isset($res['heightworkpermitsissued']))echo $res['heightworkpermitsissued']; ?></span></td>
                                 <td><b>Next Refilling</b></td>
                                 <?php /*?><td><b>Re-filing Date:</b> <span><?php if(isset($res['refillingdate']))echo $res['refillingdate']; ?></span></td><?php */?>
                                <td colspan="2"><b>Inspection Date:</b> <span><?php if(isset($res['inspectiondate']))echo $res['inspectiondate']; ?></span></td>
                            </tr>
                            <tr>
                            	 <td class="text-left" colspan="5"><b>Additional Information:</b> <span><?php if(isset($res['reason']))echo $res['reason']; ?></span></td>
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
                    	<div class="report-by">
                        	<label><b>Report By:</b> <?php if(isset($res['user_id'])) { echo getlogeedname($res['user_id']); } ?></label>
                        </div>
                       
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



  </body>

</html>

<script>

$( document ).ready(function() {

    window.print(); 

	close(); 

	//window.location.href = "http://aparna.greaterkakinada.com/dailyreports";  

	window.location.href = "/getdailyreportdetail/"+<?php echo $sitefilter;?>; 

}); 



</script>