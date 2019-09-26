

    <!-- Bootstrap -->
    <link rel="icon" href="images/ICON.png">
    <link href="/vendors1/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/vendors1/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
   
    <!-- iCheck -->
   
    <!-- Datatables -->
    <link href="/vendors1/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link media="all" type="text/css" rel="stylesheet" href="http://hrms.recurringbillingsystem.com/assets/third/summernote/summernote.css">
    <!-- Custom Theme Style -->
    <link href="/build/css/custom.css" rel="stylesheet">
    <style>
	.date1
	{
	 text-align:right;
	 color:#00754d;
	 font-weight:bold;
	 font-size:14px;
	 padding-right:0px !important;
	}
	.firesafety-daily table
	{
	 width:80%;
	 margin:0 auto;
	}
	.row.x_title
	{
	 width:80%;
	 margin:0 auto;
	}
	.firesafety-daily table tbody tr th
     {
      padding:3px;
	  text-align:left;
    }
	.firesafety-daily table tbody tr td
	{
	 padding:2px;
	 font-size:11px;
	 text-align:left;
	}
	.firesafety-daily table tbody tr td.text-left
	{
	 text-align:left;
	}
	.firesafety-daily table tbody tr td span
	{
	 color:#0000FF;
	 font-weight:bold;
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
.report-by
{
 float:right;
}
.last-modified
{
 float:left;
 padding-top:6px;
}
.sign1
{
 margin-top:4px;
}
.firesafety-daily table tbody tr td.text-center
{
 text-align:center;
}
.antibalck
{
 width:80%;
 margin:0 auto;
}
label
{
 font-size:11px !important;
}

	</style>


 @extends('layouts.app')


@section('content')

    <div class="body">
      <div class="main_container phop-url">
     <?php /*?> <?php include "header.php"; ?><?php */?>
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
			   <?php $fresval = getdefaultfiresafetot($sitefilter);?>
                <div>
                  <div class="row x_title checked-fa" style="margin-bottom:0px;border-bottom:0px;">
                   		<span class="col-sm-6 col-xs-6" style="font-weight:bold;font-size:14px;color:#ff7640;padding:0px;">APMS |  <?php echo get_sitename($sitefilter);?></span>
                        <div class="col-sm-6 col-xs-6 date1">FIRE SAFETY | DATE: <?php echo $datefilter;?> | TIME: <?php date_default_timezone_set('Asia/Kolkata'); echo date("h:i:sa"); $pemsresv = getdefaultpmstot($sitefilter); ?></div>
                  </div>
                  <div class="x_content firesafety-daily">
                  	
                    <table  border="1">
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
                            
                            <table  border="1">
                    			<tbody>
                            <tr>
                            	<td rowspan="2"><b>Attendance</b></td>
                                <td class="text-center">Total</td>
                                <td class="text-center">Present</td>
                                <td class="text-center">Stewards</td>
                                <td class="text-center">Sup</td>
                                <td class="text-center">Night Shift</td>
                                <td><p><b>Pump House</b></p></td>
                                <td class="text-center"><b>auto</b></td>
                                <td class="text-center"><b>manual</b></td>
                                <td class="text-center"><b>OFF</b></td>
                                <td class="text-center"><b>NW</b></td>
                            </tr>
                            <tr>
                                   <td class="text-center"><span><?php if(isset($fresval['attendance']))echo $fresval['attendance']; ?></span><br><?php /*?>Present: <span><?php if(isset($res['suppresentattendance']))echo $res['suppresentattendance']; ?><?php */?></span></td>
                                   <td class="text-center"><span><?php if(isset($res['suppresentattendance']))echo $res['suppresentattendance']; ?></span><br></td>
                                   <td class="text-center"><span><?php if(isset($res['stewardsattendance']))echo $res['stewardsattendance']; ?></span></td>
                                   <td class="text-center"><span><?php if(isset($res['supattendance']))echo $res['supattendance']; ?></span></td>
                                   <td class="text-center"><span><?php if(isset($res['nightshiftattendance']))echo $res['nightshiftattendance']; ?> </span></td>
                                <td><label style="width:45px;">Jockey: </label><span><?php echo $fresval['jockeypump'];?></span></td>
                                <td class="text-center"><span><?php if(isset($res['jockeypumpauto']))echo $res['jockeypumpauto']; ?></span></td>
                                <td class="text-center"><span><?php if(isset($res['jockeypumpmanual']))echo $res['jockeypumpmanual']; ?></span></td>
                                <td class="text-center"><span><?php if(isset($res['jockeypumpoff']))echo $res['jockeypumpoff']; ?></span></td> 
                                <td class="text-center"><span><?php if(isset($res['jockeypumpnotworking']))echo $res['jockeypumpnotworking']; ?></span></td>
                            </tr>
                             <tr>
                            	<td colspan="3"><b>Auto On/Off of Jockey, Main & DG Pumps checked on Date:</b> <span><?php if(isset($res['autoonoff_date']))echo $res['autoonoff_date']; ?></span></td>
                                <td colspan="3"><b>Next trail run scheduled on Date:</b><br /> <span><?php if(isset($res['next_trail_date']))echo $res['next_trail_date']; ?></span></td>
                                <td><label style="width:45px;">Main: </label><span><?php echo $fresval['mainpump'];?></span></td>
                                <td class="text-center"><span><?php if(isset($res['mainpumpauto']))echo $res['mainpumpauto']; ?></span></td>
                                <td class="text-center"><span><?php if(isset($res['mainpumpmanual']))echo $res['mainpumpmanual']; ?></span></td>
                                 <td class="text-center"><span><?php if(isset($res['mainpumpoff']))echo $res['mainpumpoff']; ?></span></td>
                                <td class="text-center"><span><?php if(isset($res['mainpumpnotworking']))echo $res['mainpumpnotworking']; ?></span></td>
                                
                                
                               
                            </tr>
                            <tr>
                            	<td colspan="3"><b>Last Mock drill Conducted on:</b> <span><?php if(isset($res['lastmockdrillcondut']))echo $res['lastmockdrillcondut']; ?></span></td>
                                <td colspan="3"><b>Next Mock drill Schedule as per matrix:</b> <span><?php if(isset($res['nextmockdrillconduct']))echo $res['nextmockdrillconduct']; ?></span></td>
                               <td><label style="width:45px;">DG: </label><span><?php echo $fresval['dgpump'];?></span></td>
                                 <td class="text-center"><span><?php if(isset($res['dgpumpauto']))echo $res['dgpumpauto']; ?></span></td>
                                <td class="text-center"><span><?php if(isset($res['dgpumpmanual']))echo $res['dgpumpmanual']; ?></span></td>
                                <td class="text-center"><span><?php if(isset($res['dgpumpoff']))echo $res['dgpumpoff']; ?></span></td>
                                 <td class="text-center"><span><?php if(isset($res['dgpumpnotworking']))echo $res['dgpumpnotworking']; ?></span></td>
                            </tr>
                            <tr>  
                               <td><b>Group Indication panel</b></td>
                               <td>Working: <span><?php if(isset($res['grind_panel_working']))echo $res['grind_panel_working']; ?></span></td>
                               <td>Not Working: <span><?php if(isset($res['grind_panel_ntworking']))echo $res['grind_panel_ntworking']; ?></span></td> 
                               <td colspan="3">Reason For Not Working: <span><?php if(isset($res['grind_panel_re_ntworking']))echo $res['grind_panel_re_ntworking']; ?></span></td>
                               <td><label style="width:45px;">DW: </label><span><?php echo $fresval['dewaterpumps'];?></span></td>
                               <td class="text-center"><span><?php if(isset($res['dewaterpumpauto']))echo $res['dewaterpumpauto']; ?></span></td>
                               <td class="text-center"><span><?php if(isset($res['dewaterpumpmanual']))echo $res['dewaterpumpmanual']; ?></span></td>
                               <td class="text-center"><span><?php if(isset($res['dewaterpumpoff']))echo $res['dewaterpumpoff']; ?></span></td>
                               <td class="text-center"><span><?php if(isset($res['dewaterpumpnotworking']))echo $res['dewaterpumpnotworking']; ?></span></td> 
                            </tr>
							<tr>
                            	<td colspan="6"></td>
                                <td><p><b>Diesel Tank</b></p></td>
                                <td class="text-center"><b>Minimum</b></td>
                                <td class="text-center"><b>Medium</b></td>
                                <td class="text-center"><b>High</b></td>
                                <td class="text-center"><b>NW</b></td>
                            </tr>
							 <tr>  
                               <td><b>Battery</b></td>
                               <td>Total: <span><?php echo $fresval['battery'];?></span></td>
                               <td>Not Working: <span><?php if(isset($res['bnworking']))echo $res['bnworking']; ?></span></td> 
                               <td colspan="3">Reason For Not Working: <span><?php if(isset($res['bnwreason']))echo $res['bnwreason']; ?></span></td>
                               <td><label style="width:45px;">DT: </label><span><?php echo $fresval['dgtank'];?></span></td>
                               <td class="text-center"><span><?php if(isset($res['dglevel_min']))echo $res['dglevel_min']; ?></span></td>
                               <td class="text-center"><span><?php if(isset($res['dglevel_max']))echo $res['dglevel_max']; ?></span></td>
                               <td class="text-center"><span><?php if(isset($res['dglevel_high']))echo $res['dglevel_high']; ?></span></td>
                               <td class="text-center">&nbsp;</td> 
                            </tr>
                            </tbody>
                    </table>
                             
                          
                        
                        <table  border="1">
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
                                	<td colspan="2"><b>Reasons for Not working/off & Manual</b><br><span><?php if(isset($res['reasonformanual'])){ if($res['reasonformanual']) echo "Manual: ".$res['reasonformanual']."<br>"; } ?><?php if(isset($res['reasonforoff'])){ if($res['reasonforoff']) echo "Off: ".$res['reasonforoff']; } ?></span></td>
                                     <td colspan="5" class="text-left"><b>Reasons for Not working/off & Manual</b><br><span><?php if(isset($res['boosterreasonmanual'])){ if($res['boosterreasonmanual']) echo "Manual: ".$res['boosterreasonmanual']."<br>"; } ?><?php if(isset($res['boosterreasonoff'])){ if($res['boosterreasonoff']) echo "Off: ".$res['boosterreasonoff']; } ?></span></td>
                                </tr>
                            </tbody>
                        </table>    
                        
                       <table  width="100%" border="1">
                           <tbody>
                              <tr>
                                 <td colspan="2"><b>Next trail run scheduled on Date:</b> <span><?php if(isset($res['boostershedule_on_date']))echo $res['boostershedule_on_date']; ?></span></td>
                                 <td colspan="5"><b>Booster Pumps checked on Date:</b> <span><?php if(isset($res['boosterchecked_on_date']))echo $res['boosterchecked_on_date']; ?></span></td>
                              </tr>
                                   
                          </tbody>
                      </table>
                    
                    
                    
                    
                    <table  border="1">
                         <tbody>
                            <tr>
                               <td><b>False Alarm:</b> <span><?php if(isset($res['falsealaram']))echo $res['falsealaram']; ?></span></td>
                               <td colspan="3"><b>Reason: </b><span><?php if(isset($res['falsealaramremarks']))echo $res['falsealaramremarks']; ?></span></td>
                            </tr>
                         	<tr>
                                <td></td>
                                <td class="text-center"><b>Working</b></td>
                                <td class="text-center"><b>Not Working</b></td>
                                <td><b>Reasons for Not Working:</b></td>
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
                             <tr> 
                                <td><b>Carbon Emission System: </b><span><?php echo $fresval['carbonemissionsys'];?></span></td>
                                <td class="text-center"><span><?php if(isset($res['carbonemissionworking']))echo $res['carbonemissionworking']; ?></span></td>
                                <td class="text-center"><span><?php if(isset($res['carbonemissionnotworking']))echo $res['carbonemissionnotworking']; ?></span></td>
                                <td><span><?php if(isset($res['carbonemissreasonnotworking']))echo $res['carbonemissreasonnotworking']; ?></span></td>
                            </tr>
                         </tbody>
                    </table>
                    
                   
                    
                     <table  border="1">
                         <tbody>
                         	<tr>
                            	<td><b>Sumps: </b> <span><?php if(isset($res['sumpstotnum']))echo " ".$res['sumpstotnum']; ?></span></td>
                                <td><b>Water Levels: </b> <span><?php if(isset($res['sumpwaterlevel']))echo "  ".$res['sumpwaterlevel']; ?><?php  if(isset($res['sumptotwaterlevel']))echo ": ".$res['sumptotwaterlevel']; ?></span></td>
                                <td><b>Last Cleaned Date:</b> <span><?php if(isset($res['sumplastcleandate']))echo $res['sumplastcleandate']; ?></span></td>
                                <td><b>Next Cleaning Date:</b> <span><?php if(isset($res['sumpnextcleaningdate']))echo $res['sumpnextcleaningdate']; ?></span></td>
                                
                               
                            </tr>
                            <tr>
                            	 <td><b>OHT Tanks: </b> <span><?php if(isset($res['ohttankstotnum']))echo " ".$res['ohttankstotnum']; ?></span></td>
                                <td><b>Water Levels: </b> <span><?php if(isset($res['ohtwaterlevel']))echo " ".$res['ohtwaterlevel']; ?><?php  if(isset($res['totohtwaterlevel']))echo ": ".$res['totohtwaterlevel']; ?></span></td>
                                <td colspan="2"><b>Next Cleaning Date:</b> <span><?php if(isset($res['ohtnextcleaningdate']))echo $res['ohtnextcleaningdate']; ?></span></td>
                            </tr>
                        
                         </tbody>
                    </table>
                    
                     <table  border="1"> 
                         <tbody>
                         	<tr style="text-align:center;" >
                            	<td colspan="2"><b>Work Permits</b></td>
                                <td><b>Fire Extinguishers</b></td>
                                <td class="text-center"><b>Total</b></td>
                                <td class="text-center"><b>Discharged</b></td>
                            </tr>
                            <tr>
                            	<td>No. of Hot Work Permits Issued</td>
                                <td class="text-center"><span><?php if(isset($res['numofworkpermitsissued']))echo $res['numofworkpermitsissued']; ?></span></td>
                                <td>C0<sub>2</sub> Fire Extinguishers</td>
                                <td class="text-center"><span><?php echo $fresval['co2'];?></span></td>
                                <td class="text-center"><span><?php if(isset($res['co2firenotworking']))echo $res['co2firenotworking']; ?></span></td>
                            </tr>
                             <tr>
                                 <td>No. of General Work Permits Issued</td>
                                 <td class="text-center"><span><?php if(isset($res['generalworkpermitsnum']))echo $res['generalworkpermitsnum']; ?></span></td>
                                 <td>DCP Fire Extinguishers</td>
                                 <td class="text-center"><span><?php echo $fresval['dcp'];?></span></td>
                                 <td class="text-center"><span><?php if(isset($res['dcpfirenotworking']))echo $res['dcpfirenotworking']; ?></span></td>
                              </tr>
                              <tr>
                            	<td>No. of Electrical Work Permits Issued</td>
                                <td class="text-center"><span><?php if(isset($res['electricalworkpermitsissued']))echo $res['electricalworkpermitsissued']; ?></span></td>
                                <td>WaterFire Extinguishers</td>
                                <td class="text-center"><span><?php echo $fresval['water'];?></span></td>
                                <td class="text-center"><span><?php if(isset($res['waterfirenotworking']))echo $res['waterfirenotworking']; ?></span></td>
                              </tr>
                              
                              <tr>
                                <td>No. of Height Work Permits Issued</td>
                                <td class="text-center"><span><?php if(isset($res['heightworkpermitsissued']))echo $res['heightworkpermitsissued']; ?></span></td>
                                <td>Next Refilling</td>
                                <td colspan="2">Inspection Date: <span><?php if(isset($res['inspectiondate']))echo $res['inspectiondate']; ?></span></td>
                            </tr>
                            <tr>
                            	 <td colspan="5"><b>Additional Information:</b> <br /><span><?php if(isset($res['reason']))echo $res['reason']; ?></span></td>
							</tr>
                         </tbody>
                     </table>
                     
                    
					  <?php  date_default_timezone_set('Asia/Calcutta'); ?> 
						
                             
                       <div class="antibalck">      
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
 
                      <div class="sign1" style="float:right; width:auto;">
                    	<div class="report-by">
                        	<label><span style="color:#ff2518;font-weight:bold;">Report By:</span> <b><?php if(isset($res['user_id'])) { echo getlogeedname($res['user_id']); } ?></b></label>
                        </div>
                       
                    </div>
                    </div>
                  <?php /*?>  {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
                    {!! Form::textarea('description', old('description'), ['class' => 'form-control summernote', 'placeholder' => 'Enter Details here']) !!}
                    <p class="help-block"></p>
                    
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif<?php */?>
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
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
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
    <script>
	
	$( document ).ready(function() {
	 $('#reasontext').summernote({

              height:300,

            });
			
			   });
	</script>
   
  

@stop