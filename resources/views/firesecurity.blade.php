 @extends('layouts.app')





@section('content')

    <!-- Bootstrap -->

    <link rel="icon" href="images/ICON.png">

    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->

    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- NProgress -->

   

    <!-- iCheck -->

   

    <!-- Datatables -->

    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">



    <!-- Custom Theme Style -->

    <link href="build/css/custom.css" rel="stylesheet">

  <link media="all" type="text/css" rel="stylesheet" href="http://hrms.recurringbillingsystem.com/assets/third/summernote/summernote.css">

 <style>

 .numerror

{

	border-color: red !important;

	border-width: 1.5px !important;

} 

		.x_title h3

{

 color:#31859c;

}

.x_title

{

 margin-bottom:15px;

}

.x_title span

{

 color:#31859c;

 font-size:20px;
 padding-left:30px;

}



label

{

 font-weight:400;

}

.error
{
	border:2px solid #FF0000 !important;
}

h5

{

 margin-bottom: 10px;

 margin-top: 26px;

}

.refilling-inspection .refilling label

{

 margin-top:7px;

 margin-bottom:5px;

}

.refilling-inspection .inspection-date label

{

 margin-top:7px;

 margin-bottom:5px;

}

.jockey-status h5, .main-status h5, .dg-status h5, .dewatering-status h5

{

 margin-top:0px;
 margin-bottom:7px;
}

.jockey-status h5, .dg-status h5, .dewatering-status h5

{

 padding-left:15px;

}

.jockey-status .jockey-manual, .jockey-status .jockey-off 

{

 padding-left:0px;

}





.jockey-status .jockey-not-working

{

 padding-left:0px;

 padding-right:0px;

}

.public-addressing label

{

 padding-left:0px;

 padding-right:0px;

}

.firealarm label

{

 padding-left:0px;

 padding-right:0px;

}

.main-status .main-auto, .main-status .main-manual, .main-status .main-off

{

 padding-left:0px;

}

.attendance-details label

{

 padding-left:0px;

 padding-right:0px;

}

.carbon-emission label

{

 padding-left:0px;

 padding-right:0px;

}

.main-status .main-not-working

{

 padding-left:0px;

 padding-right:0px;

}

.dg-status .dg-manual, .dg-status .dg-off 

{

 padding-left:0px;

}

.dg-status .dg-not-working

{

 padding-left:0px;

 padding-right:0px;

}

.submit-button input[type="submit"]

{

 background-color: #F3565D;

    padding:8px 25px;

    color: #FFFFFF;

    font-size: 14px;

    border-radius: 4px;

    font-weight: bold;

    cursor: pointer;

    border: 1px solid #F3565D;

}

.submit-button input[type="submit"]:hover

{

 background-color:#175363;

  border: 1px solid #175363;

}

.submit-button

{

 text-align:center;

 margin-top:20px;

}



.especially-heading

{

 padding-left:0px !important;

}

.for-labelling label

{

 margin-top:7px;

 /*padding-left:0px;*/

}

.fro-pro

{

 padding-left:0px !important;

 margin-bottom:10px;

}

.fro-pro1, .fro-pro2

{ 

 margin-bottom:10px;

}





.for-margin-label label

{

 margin:0px;

 font-size:12px;

}

.for-spacing

{

 margin-top:20px !important;

}

.irrigation

{

 width: 100%;

    height: 33px;

}

.daily select

{

 width:100%;

 height:30px

}

.briefying

{

 padding-left:0px !important;

}

.especially-heading textarea

{

 margin-top:20px;

}

.fro-pro ul

{

 list-style:none;

 padding-left:10px;

}



.fro-pro ul li

{

 line-height:20px;

}

.briefying select

{

 width:100%;

 height:33px;

}

.booster-pumps-con .auto label

{

 padding-left:0px;

 padding-right:0px;

}



.firesafety

{

 padding-left:0px !important;

 margin-bottom:10px;

}

.firesafety1

{

 padding-left:0px !important;

 margin-bottom:15px;

}

.firesafety-conducted

{

 padding-left:0px !important;

}

.firesafety-conducted label

{

 margin-top:7px;

 

}

.firesafety-checklist ul

{

 padding-left:0px;

}

.firesafety-checklist ul li

{

 float:left;

 padding:4px;

 

}

.firesafety-checklist ul li input 

{

 margin-right:6px;

}

.firesafety-checklist ul 

{

 list-style:none;

}

.especially-heading textarea

{

 width:100%;

 overflow-y:auto;

 overflow-x:hidden;

}

.firesafety-conducted textarea

{

 width:100%;

     height: 31px;

	 overflow-y:auto;

 overflow-x:hidden;

}

.for-margin-label ul

{

 list-style:none;

 padding-left:0px;

}

.for-margin-label ul li

{

 float:left;

 padding:6px;

 padding-left:0px;

}

.for-margin-label ul li input

{

 margin-right:3px;

}

label

{

padding-left:0px;

}

.light-back

{

background-color:#ffc10724;

padding-bottom: 10px;

}

.light-back1

{

background-color:#f9f7f7;

padding-bottom: 10px;

}

.row

{

 clear:both;

}

.booster-pump-not label

 {

  margin-top:10px;
  line-height:13px;
 }
 
.fro-pro.drill-schedule-reason
{
 margin-bottom:0px;
}
 .mock-pump .drill-schedule-not
 {
  padding-left:30px;
 }

.booster-pumps-con .auto-on-off
{
 padding-left:27px;
}

.booster-pump-reason label
{
 line-height:16px;
}
.back-button
{
 margin-bottom:13px;
 padding-left:15px;
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
}
.x_content 
{
margin-bottom:10%;
}

.firesafety-conducted.nox-drill-on label
{
 line-height:19px;
 padding-right:0px;
 margin:5px 0px;
} 

.main-status
{
 padding-left:0px;
 padding-right:30px;
}
.note-editor
{
 margin-bottom:5px;
}
.additional-information input[type="checkbox"]
{
 margin-right:4px;
}
.additional-information .i-confirmed
{
 color:#520990;
 font-weight:bold;
}
.sumps .high-medium
{
 padding:0px;
 margin-top:13px;
}
.oht-water-level .high-medium
{
 padding:0px;
 margin-top:13px;
}
.fire-extinguishers h5
{
 margin-bottom:0px;
}
.grouppanelworking label, .grouppanelnotworking label, .grouppanelreasonworking label
{
 margin:0px;
}
.group-indication-panel
{
 padding-top:10px;
}
.group-indication-panel h5
{
 margin-top:0px;
 margin-botttom:10px;
 padding-left:15px;
}

.mock-pump .previous-date
{
 padding-left:30px;
}
.firesafety-conducted.nox-drill-on label
{
 margin-top:7px;
}
.mock-pump .last-mock-drill
{
 padding-left:30px;
 width: 18%;
}

	</style>

 

    <div class="body">

      <div class="main_container">

      

        <!-- /top navigation -->



        <!-- page content -->
 
        <div class="right_col" role="main">

          <div class="models geministyles">

           <?php $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 

									$sitevv = $uriSegments[2]; ?>

			
             
                 <?php if($uriSegments[1] == 'getdailyreportfiresafedetaildate') { ?>
              <div class="back-button pull-right"><a href="/getdailyreportdetail/<?php echo $sitevv;  ?>/<?php echo $uriSegments[3];  ?>">Back</a></div>
              <?php }else { ?>
			 <div class="back-button pull-right"><a href="/getdailyreportdetail/<?php echo $sitevv;  ?>/<?php echo $uriSegments[4];  ?>">Back</a></div> <?php } ?>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">

                  <div class="row x_title">

				    <div class="errormsgval" style="display:none" id="errorblk" >

				 

                  

					<p id="ermsg_jkpump"></p>

					<p id="ermsg_mainpump"></p>

					<p id="ermsg_dgpump"></p>

					<p id="ermsg_co2"></p>

					<p id="ermsg_dcp"></p>

					<p id="ermsg_water"></p>

					<p id="ermsg_boosterpmp"></p>

					<p id="ermsg_firealarmsys"></p>

					<p id="ermsg_pasys"></p>

					<p id="ermsg_caremssys"></p>

				 

				  </div>

                   		

                      

                  </div>

                  <div class="x_content">

				    <div class="errormsgval" style="display:none" id="errorblk" >

						  <p id="ermsg"></p>

						  <p id="ermsg_residents"></p> 

						  <p id="ermsg_club_hs"></p>

				  </div>

                  	 	<!--<div class="col-sm-12 col-xs-12 especially-heading">

                        	<h4><span><b>Power Consumption</b></span></h4>

                        </div>-->

                        {!! Form::open(['method' => 'POST', 'route' => ['dailyreports.storefiresafe'], 'class' => 'for-labelling','onsubmit' =>"return subform()"]) !!}

						

						

						<?php

									

									//echo "<pre>"; print_r($res); echo "</pre>";

									

									if(isset($uriSegments[3])){

									  if($uriSegments[1] == 'getdailyreportfiresafedetaildate') {$date =$uriSegments[3];} else   {$date  = $uriSegments[4];}

									}elseif($uriSegments[1] == 'getdailyreport'){$date = $uriSegments[4];} else{

									 $date = date("d-m-Y");
									 $dateval = date('Y-m-d');
									 $date =  date('d-m-Y', strtotime($dateval .' -1 day'));

									}  if($uriSegments[1] == 'getdailyreport'){$date = $uriSegments[4];}    
									

								 ?>

								<div class="row aparnaaura">	<div class="col-sm-6 col-xs-6 text"><?php echo get_sitename($sitevv);

						?></div>

						<div class="col-sm-6 col-xs-6 box"><span>Date:</span> <input type="text" name="reporton" id="example1" value="<?php echo $date; ?>" class="hasDatePicker form-control"></div> </div>

                         <input type="hidden" name="user_id" value="<?php  echo Auth::user()->id; ?>">

						 <input type="hidden" name="site" value="<?php echo $sitevv ?>" id="site_val">
                         
                         
                           <div class="row x_title">
                               <span class="col-sm-12 col-xs-12">FireSafety Daily Report </span>
                           </div>

                    <div class="row light-back">

                     <div class="col-sm-12 col-xs-12 fire-hydrant" style="padding-top:10px;padding-bottom:10px;">

                     	<div class="col-sm-4 col-xs-4 training-conducted">

                        	 <label class="col-sm-7 col-xs-7">Training Conducted:</label>

                             <div class="col-sm-4 col-xs-4 training-date">

                             	<!--{!! Form::text('training_on', old('training_on'), ['class' => 'form-control', 'placeholder' => '']) !!}-->

								 <?php  $datetval = date("d-m-Y"); ?>

								   <input type="text" name="training_on" id="training_on" value="<?php echo $datetval; ?>" class="form-control">

                             </div>

                        </div>

                        <div class="col-sm-6 col-xs-6 firesafety-conducted subject">

                        	<label class="col-sm-2 col-xs-2">Subject:</label>

                             <div class="col-sm-10 col-xs-10 firesafety-checklist">

                             	<ul>

                                	<li><input type="checkbox" value="Fire Extinguisher" name="trainsubject[]">Fire Extinguisher</li>

                                    <li><input type="checkbox" value="Hydrant" name="trainsubject[]">Hydrant</li>

                                    <li><input type="checkbox" value="Lift Rescue" name="trainsubject[]">Lift Rescue</li>

                                    <li><input type="checkbox" value="Mock Drill" name="trainsubject[]">Mock Drill</li>

                                    <li><input type="checkbox" value="Fire Alarm" name="trainsubject[]">Fire Alarm</li>

                                </ul>

                             </div>

                        </div>

                     </div>

                     <div class="col-sm-12 col-xs-12 people-trained" style="padding-bottom:0px;">

                     	<div class="col-sm-4 col-xs-4 traning-conducted">

                        	 <label class="col-sm-7 col-xs-7">No. Trainings Conducted Till Date:</label>

                             <div class="col-sm-4 col-xs-4 till-date">

                             	{!! Form::text('trainingsnumtilldate', old('trainingsnumtilldate'), ['class' => 'form-control number', 'placeholder' => '']) !!}

                             </div>

                        </div>

                        <div class="col-sm-6 col-xs-6 firesafety-conducted security-techicians">

                        	<label class="col-sm-2 col-xs-2">People Trained:</label>

                             <div class="col-sm-10 col-xs-10 firesafety-checklist">

                             	<ul>

                                	<li><input type="checkbox" value="Security Guards" name="trainedpeople[]">Security Guards</li>

                                    <li><input type="checkbox" value="Technicians" name="trainedpeople[]">Technicians</li>

                                    <li><input type="checkbox" value="Residents" name="trainedpeople[]">Residents </li>

                                    <li><input type="checkbox" value="Staff" name="trainedpeople[]">Staff</li>

                                    

                                </ul>

                             </div>

                        </div>

                     </div>

                    </div>

                    

                    

                    <div class="col-sm-12 col-xs-12 especially-heading">

                        	<h4><span><b>Attendance</b></span></h4>

                        </div>

                        

                     <div class="row light-back1">

                     <div class="col-sm-12 col-xs-12 attendance-details" style="padding-top:2px;">
                     
                             <div class="col-sm-1 col-xs-1 sup-total">

                                  <label class="control-label col-sm-12 col-xs-12" for="email">Total</label>
								  
								  <?php if(isset($validres['attendance'])) { $att =$validres['attendance']; } else { $att = ""; } ?>

                                  {!! Form::text('suptotattendance', $att, ['class' => 'form-control number', 'placeholder' => '']) !!}

                                </div>

                                <div class="col-sm-1 col-xs-1 sup-present">

                                  <label class="control-label col-sm-12 col-xs-12" for="pwd">Present</label>

                                 {!! Form::text('suppresentattendance', old('suppresentattendance'), ['class' => 'form-control number', 'placeholder' => '']) !!}

                                </div>

                                <div class="col-sm-1 col-xs-1 sup-attendance">
                                	 <label class="control-label col-sm-12 col-xs-12">Sup</label>
                                    
									 {!! Form::text('supattendance', old('supattendance'), ['class' => 'form-control number', 'placeholder' => '']) !!}
									 
                                </div>

                                <div class="col-sm-1 col-xs-1 stewards">

                                  <label class="control-label col-sm-12 col-xs-12" for="pwd">Stewards</label>

                                  {!! Form::text('stewardsattendance', old('stewardsattendance'), ['class' => 'form-control number', 'placeholder' => '']) !!}

                               </div> 

                               

                               <div class="col-sm-2 col-xs-2 night-shift">

                                  <label class="control-label col-sm-12 col-xs-12" for="email">Night shift steward</label>

                                   {!! Form::text('nightshiftattendance', old('nightshiftattendance'), ['class' => 'form-control number', 'placeholder' => '']) !!}

                                </div>

                                </div>

                               </div> 

                                

                    

                    <div class="col-sm-12 col-xs-12 especially-heading">

                        	<h4><span><b>Pump House Status</b></span></h4>

                        </div>

                        

                        

                         <div class="row light-back pump-house-status mock-pump">

                        <div class="col-sm-3 col-xs-3 jockey-status" style="padding-top:10px;">

                                 <h5><b>Jockey Pump</b></h5>

                                  <div class="col-sm-3 col-xs-3 for-margin-label jockey-auto">

                                      	<label>Auto</label>

                                        {!! Form::text('jockeypumpauto', old('jockeypumpauto'), ['class' => 'form-control number jockeyClass', 'id' =>'jkauto', 'placeholder' => '']) !!}

                                      </div>

                                      <div class="col-sm-3 col-xs-3 for-margin-label jockey-manual">

                                      	<label>Manual</label>

                                        {!! Form::text('jockeypumpmanual', old('jockeypumpmanual'), ['class' => 'form-control number jockeyClass', 'id' =>'jkman', 'placeholder' => '']) !!}

                                      </div>

                                       <div class="col-sm-3 col-xs-3 for-margin-label jockey-off">

                                      	<label>OFF</label>

                                       {!! Form::text('jockeypumpoff', old('jockeypumpoff'), ['class' => 'form-control number jockeyClass', 'id' =>'jkoff', 'placeholder' => '']) !!}

                                      </div>

                                      <div class="col-sm-3 col-xs-3 for-margin-label jockey-not-working">

                                      	<label>Not Working</label>

                                       {!! Form::text('jockeypumpnotworking', old('jockeypumpnotworking'), ['class' => 'form-control number jockeyClass', 'id' =>'jknw', 'placeholder' => '']) !!}

                                      </div>

                                </div>
								
								<div class="col-sm-3 col-xs-3 dg-status" style="padding-top:10px;">

                                  <h5><b>DG Pump</b></h5>

                                  <div class="col-sm-3 col-xs-3 for-margin-label dg-auto">

                                      	<label>Auto</label>

                                       {!! Form::text('dgpumpauto', old('dgpumpauto'), ['class' => 'form-control number dgpumpClass','id' =>'dgpumpauto', 'placeholder' => '']) !!}

                                      </div>

                                      <div class="col-sm-3 col-xs-3 for-margin-label dg-manual">

                                      	<label>Manual</label>

                                        {!! Form::text('dgpumpmanual', old('dgpumpmanual'), ['class' => 'form-control number dgpumpClass','id' =>'dgpumpmanual', 'placeholder' => '']) !!}

                                      </div>

                                       <div class="col-sm-3 col-xs-3 for-margin-label dg-off">

                                      	<label>OFF</label>

                                       {!! Form::text('dgpumpoff', old('dgpumpoff'), ['class' => 'form-control number dgpumpClass','id' =>'dgpumpoff', 'placeholder' => '']) !!}

                                      </div>

                                      <div class="col-sm-3 col-xs-3 for-margin-label dg-not-working">

                                      	<label>Not Working</label>

                                       {!! Form::text('dgpumpnotworking', old('dgpumpnotworking'), ['class' => 'form-control number dgpumpClass', 'id' =>'dgpumpnotworking', 'placeholder' => '']) !!}

                                      </div>

                                </div>
								
								<div class="col-sm-3 col-xs-3 dg-status" style="padding-top:10px;">
									  <h5><b>Diesel Level</b></h5>
									  <?php if(isset($validres['dgtank']) && $validres['dgtank']!="") { $dgtank =$validres['dgtank']; } else { $dgtank = ""; } ?>
									  <input type="hidden" name="dgtank" id="Diesel_Level" value="<?php echo $dgtank; ?>" />
									  <div class="col-sm-4 col-xs-4 for-margin-label dg-auto">
											<label>Minimum</label>
										   {!! Form::text('dglevel_min', old('dglevel_min'), ['class' => 'form-control number dgpumpClass', 'id'=>'dglevel_min', 'placeholder' => '', 'onchange'=>'checkdlevel()']) !!}
										  </div>
										  <div class="col-sm-4 col-xs-4 for-margin-label dg-manual">
											<label>Medium</label>
											{!! Form::text('dglevel_max', old('dglevel_max'), ['class' => 'form-control number dgpumpClass', 'id'=>'dglevel_max', 'placeholder' => '', 'onchange'=>'checkdlevel()']) !!}
										  </div>
										  <div class="col-sm-4 col-xs-4 for-margin-label dg-off">
											<label>High</label>
										   {!! Form::text('dglevel_high', old('dglevel_high'), ['class' => 'form-control number dgpumpClass', 'id'=>'dglevel_high', 'placeholder' => '', 'onchange'=>'checkdlevel()']) !!}
										  </div>
								 </div>
                                
								<div class="col-sm-3 col-xs-3 dg-status" style="padding-top:10px;">
									  <h5><b>Battery Status</b></h5>
									  <div class="col-sm-4 col-xs-4 for-margin-label dg-auto">
											<label>Total</label>
										   <?php if(isset($validres['battery']) && $validres['battery']!='null') { $att =$validres['battery']; } else { $att = ""; } ?>
										   {!! Form::text('batterytotal', $att, ['class' => 'form-control number', 'placeholder' => '', 'readonly']) !!}
										  </div>
										  <div class="col-sm-4 col-xs-4 for-margin-label dg-manual">
											<label>Not Working</label>
											{!! Form::text('bnworking', old('bnworking'), ['class' => 'form-control number dgpumpClass', 'id'=>'bnworking', 'placeholder' => '', 'onchange'=>'bnotworking()']) !!}
										  </div>
										  <div class="col-sm-4 col-xs-4 for-margin-label breason" style="display:none;">
											<label>Reason</label>
										   {!! Form::text('bnwreason', old('bnwreason'), ['class' => 'form-control number dgpumpClass', 'id'=>'bnwreason', 'placeholder' => '']) !!}
										  </div>
								 </div>
							
							  </div> 

                                <div class="col-sm-4 col-xs-4 main-status" style="padding-top:10px;">

                                  <h5><b>Main Pump</b></h5>

                                  <div class="col-sm-3 col-xs-3 for-margin-label main-auto">

                                      	<label>Auto</label>

                                        {!! Form::text('mainpumpauto', old('mainpumpauto'), ['class' => 'form-control number mainpumpClass', 'id' =>'mainpumpauto', 'placeholder' => '']) !!}

                                      </div>

                                      <div class="col-sm-3 col-xs-3 for-margin-label main-manual">

                                      	<label>Manual</label>

                                       {!! Form::text('mainpumpmanual', old('mainpumpmanual'), ['class' => 'form-control number mainpumpClass', 'id' =>'mainpumpmanual', 'placeholder' => '']) !!}

                                      </div>

                                       <div class="col-sm-3 col-xs-3 for-margin-label main-off">

                                      	<label>OFF</label>

                                        {!! Form::text('mainpumpoff', old('mainpumpoff'), ['class' => 'form-control number mainpumpClass',  'id' =>'mainpumpoff', 'placeholder' => '']) !!}

                                      </div>

                                      <div class="col-sm-3 col-xs-3 for-margin-label main-not-working">

                                      	<label>Not Working</label>

                                        {!! Form::text('mainpumpnotworking', old('mainpumpnotworking'), ['class' => 'form-control number mainpumpClass',  'id' =>'mainpumpnotworking', 'placeholder' => '']) !!}

                                      </div>

                                </div>   
                                
                                
                     <div class="col-sm-3 col-xs-3 drill-schedule-not">

                                <label class=""><b>Reasons for Manual</b></label>

                              

                                 <input type="text" class="form-control" style="width:100%;" name="reasonformanual">

                               

                              

                            </div>

                             <div class="col-sm-3 col-xs-3 fro-pro drill-schedule-reason">

                                <label class=""><b>Reasons for off</b></label>

                               

                                 <input type="text" class="form-control" style="width:100%;" name="reasonforoff">

                            </div>
                             <div class="col-sm-4 col-xs-4  auto-on-off">

                        	 			<label class="col-sm-12 col-xs-12" style="padding-left:0px;">Auto On / Off of Jockey, Main & DG Pumps checked on date</label>

                                       <!-- {!! Form::text('autoonoff_date', old('autoonoff_date'), ['class' => 'form-control', 'placeholder' => '']) !!}-->

										

										<?php  $autoonoff_date_val = date("d-m-Y"); ?>

										<input type="text" name="autoonoff_date" id="autoonoff_date" value="<?php echo $autoonoff_date_val; ?>" class="form-control">

                             		

                        			</div>
                                    
                                    <div class="col-sm-2 col-xs-2 firesafety-conducted nox-drill-on">

                                        <label class="col-sm-12 col-xs-12" style="padding-left:0px;">Next trail run scheduled on date</label>

                                       <!-- {!! Form::text('next_trail_date', old('next_trail_date'), ['class' => 'form-control', 'placeholder' => '']) !!}-->

										<?php  $next_trail_date = date("d-m-Y"); ?>

										<input type="text" name="next_trail_date" id="next_trail_date" value="<?php echo $next_trail_date; ?>" class="form-control">

                                    </div>

                                          

                                

                                
                                
                                
                                  
                                    
                                    <div class="col-sm-2 col-xs-2 last-mock-drill">

                        	 			<label class="col-sm-12 col-xs-12" style="padding:0px;">Last Mock drill Conducted on</label>

                                       <!--{!! Form::text('lastmockdrillcondut', old('lastmockdrillcondut'), ['class' => 'form-control', 'placeholder' => '']) !!}-->

									   <?php  $lastmockdrillcondut = date("d-m-Y"); ?>

										<input type="text" name="lastmockdrillcondut" id="lastmockdrillcondut" value="<?php echo $lastmockdrillcondut; ?>" class="form-control">

                       				 </div>

                               <!-- <div class="col-sm-12 col-xs-12 mock-pump">-->

                     				

                                    

                                     

                            <!--  </div>

                    

                  

                    

                     		<div class="col-sm-12 col-xs-12">-->

                            		 <div class="col-sm-3 col-xs-3 next-mock-drill-schedule">

                                        <label class="col-sm-12 col-xs-12" style="padding-left:0px;">Next Mock drill Schedule as per matrix</label>

                                        <!--{!! Form::text('nextmockdrillconduct', old('nextmockdrillconduct'), ['class' => 'form-control', 'placeholder' => '']) !!}-->

										<?php  $nextmockdrillconduct = date("d-m-Y"); ?>

										<input type="text" name="nextmockdrillconduct" id="nextmockdrillconduct" value="<?php echo $nextmockdrillconduct; ?>" class="form-control">

                                    </div>

                     				<div class="col-sm-2 col-xs-2 firesafety-conducted water-drainout-schedule">

                        	 			<label class="col-sm-12 col-xs-12" style="padding-left:0px;">Waterdrain out schedule</label>

                                       <!-- {!! Form::text('waterdrainshed', old('waterdrainshed'), ['class' => 'form-control', 'placeholder' => '']) !!}-->

										

										<?php  //$waterdrainshed = date("d-m-Y"); ?>

										<select name="waterdrainshed" id="waterdrainshed" class="form-control">
                                        	<option>Monthly</option>
                                            <option>Quarterly</option>
                                            <option>Half-yearly</option>
                                            <option>Yearly</option>
                                        </select>

                       				 </div>

                                    <div class="col-sm-2 col-xs-2 previous-date">

                                        <label class="col-sm-12 col-xs-12" style="padding-left:0px;">Previous Date</label>

                                        <!--{!! Form::text('previousdate', old('previousdate'), ['class' => 'form-control', 'placeholder' => '']) !!}-->

										<?php  $previousdate = date("d-m-Y"); ?>

										<input type="text" name="previousdate" id="previousdate" value="<?php echo $previousdate; ?>" class="form-control">

                                    </div>

                                    <div class="col-sm-2 col-xs-2  firesafety-conducted next-date">

                                          <label class="col-sm-12 col-xs-12" style="padding-left:0px;">Next Date</label>

                                      <!--   {!! Form::text('nextdate', old('nextdate'), ['class' => 'form-control', 'placeholder' => '']) !!}-->

										 <?php  $nextdate = date("d-m-Y"); ?>

										<input type="text" name="nextdate" id="nextdate" value="<?php echo $nextdate; ?>" class="form-control">

                                    </div>

                     		<!--</div>-->
<div class="col-sm-4 col-xs-4 dewatering-status" style="padding-top:10px;">

                                 <h5><b>Dewatering Pump</b></h5>

                                  <div class="col-sm-3 col-xs-3 for-margin-label dewatering-auto">

                                      	<label>Auto</label>

                                        {!! Form::text('dewaterpumpauto', old('dewaterpumpauto'), ['class' => 'form-control number', 'id' =>'dewaterauto', 'placeholder' => '']) !!}

                                      </div>

                                      <div class="col-sm-3 col-xs-3 for-margin-label dewatering-manual">

                                      	<label>Manual</label>

                                        {!! Form::text('dewaterpumpmanual', old('dewaterpumpmanual'), ['class' => 'form-control number', 'id' =>'dewaterman', 'placeholder' => '']) !!}

                                      </div>

                                       <div class="col-sm-3 col-xs-3 for-margin-label dewatering-off">

                                      	<label>OFF</label>

                                       {!! Form::text('dewaterpumpoff', old('dewaterpumpoff'), ['class' => 'form-control number', 'id' =>'dewateroff', 'placeholder' => '']) !!}

                                      </div>

                                      <div class="col-sm-3 col-xs-3 for-margin-label dewatering-not-working">

                                      	<label>Not Working</label>

                                       {!! Form::text('dewaterpumpnotworking', old('dewaterpumpnotworking'), ['class' => 'form-control number', 'id' =>'dewaternw', 'placeholder' => '']) !!}

                                      </div>

                                </div>
                                
                                <div class="col-sm-5 col-xs-5  group-indication-panel">
                                    <h5><b>Group Indication panel</b></h5>
                                    
                                    <div class="col-sm-3 col-xs-3 grouppanelworking">
										
                                        	<label>Working</label> 
                                            {!! Form::text('grind_panel_working', old('grind_panel_working'), ['class' => 'form-control', 'id' =>'grind_panel_working', 'placeholder' => '']) !!}
                                     </div>
                                     <div class="col-sm-4 col-xs-4 grouppanelnotworking">
                                            <label>Not Working</label> 
                                            {!! Form::text('grind_panel_ntworking', old('grind_panel_ntworking'), ['class' => 'form-control', 'id' =>'grind_panel_ntworking', 'placeholder' => '']) !!}
                                     </div>
                                      <div class="col-sm-5 col-xs-5 grouppanelreasonworking">
                                            <label>Reason For Not Working</label> 
                                            {!! Form::text('grind_panel_re_ntworking', old('grind_panel_re_ntworking'), ['class' => 'form-control', 'id' =>'grind_panel_re_ntworking', 'placeholder' => '']) !!}
                                       </div>
                                        
                                        
                        			</div>
                    

                    


                    </div>

                    

                    

                    

                      <div class="col-sm-12 col-xs-12 especially-heading">

                        	<h4><span><b>Booster Pumps</b></span></h4>

                        </div>

                    

                     <div class="row light-back1 booster-pumps-con">

                    <div class="col-sm-4 col-xs-4 auto" style="padding-top:10px;">

                     				<div class="col-sm-3 col-xs-3 booster-auto">

                        	 			<label class="col-sm-12 col-xs-12">Auto</label>

                                       {!! Form::text('boosterautopumps', old('boosterautopumps'), ['class' => 'form-control number boosterClass', 'id'=>'boosterautopumps', 'placeholder' => '']) !!}

                       				 </div>

                                    <div class="col-sm-3 col-xs-3 firesafety-conducted pumps-in-manual">

                                        <label class="col-sm-12 col-xs-12">Manual</label> 

                                       {!! Form::text('boostermanualpumps', old('boostermanualpumps'), ['class' => 'form-control number boosterClass', 'id'=>'boostermanualpumps', 'placeholder' => '']) !!}

                                    </div>

                                    <div class="col-sm-3 col-xs-3 firesafety-conducted pumps-in-off">

                                          <label class="col-sm-12 col-xs-12">OFF</label>

                                         {!! Form::text('boosterpumpsoff', old('boosterpumpsoff'), ['class' => 'form-control number boosterClass', 'id'=>'boosterpumpsoff', 'placeholder' => '']) !!}

                                    </div>

                                     <div class="col-sm-3 col-xs-3 firesafety-conducted pumps-not-working" style="padding-right:0px;">

                                          <label class="col-sm-12 col-xs-12">Not Working</label>

                                        {!! Form::text('boosterpumpsnotworking', old('boosterpumpsnotworking'), ['class' => 'form-control number boosterClass', 'id'=>'boosterpumpsnotworking', 'placeholder' => '']) !!}

                                    </div>

                     		</div>

                    

                    <div class="col-sm-4 col-xs-4 fro-pro booster-pump-not" style="padding-top:10px;">

                                <label class="col-sm-12 col-xs-12"><b>Reasons for Manual:</b></label>

                                <div class="col-sm-12 col-xs-12">

                                 <input type="text" class="form-control" style="width:100%;" name="boosterreasonmanual" >

                               

                                </div>

                            </div>

                            

                            <div class="col-sm-4 col-xs-4 fro-pro booster-pump-reason">

                                <label class="col-sm-12 col-xs-12"><b>Reasons for off: </b></label>

                                <div class="col-sm-12 col-xs-12">

                                 <input type="text" class="form-control" style="width:100%;" name="boosterreasonoff" >

                               

                                </div>

                            </div>
                            
                            
                            
                            <div class="col-sm-3 col-xs-3  auto-on-off">

                        	 			<label class="col-sm-12 col-xs-12" style="padding-left:0px;">Booster Pumps checked on date:</label>

                                       <!-- {!! Form::text('autoonoff_date', old('autoonoff_date'), ['class' => 'form-control', 'placeholder' => '']) !!}-->

										

										<?php  $boosterchecked_on_date = date("d-m-Y"); ?>

										<input type="text" name="boosterchecked_on_date" id="boosterchecked_on_date" value="<?php echo $boosterchecked_on_date; ?>" class="form-control">

                             		

                        			</div>

                                    <div class="col-sm-3 col-xs-3 firesafety-conducted nox-drill-on">

                                        <label class="col-sm-12 col-xs-12" style="padding-left:0px;">Next trail run scheduled on date:</label>

                                       <!-- {!! Form::text('next_trail_date', old('next_trail_date'), ['class' => 'form-control', 'placeholder' => '']) !!}-->

										<?php  $boostershedule_on_date = date("d-m-Y"); ?>

										<input type="text" name="boostershedule_on_date" id="boostershedule_on_date" value="<?php echo $boostershedule_on_date; ?>" class="form-control">

                                    </div>

                    </div>

                    

                    

                     <div class="col-sm-12 col-xs-12 especially-heading">

                        	<h4><span><b>Fire Alarm</b></span></h4>

                        </div>

                    

                    

                     <div class="row light-back">

                     <div class="col-sm-12 col-xs-12 firealarm">

                     				<!--<div class="col-sm-4 col-xs-4 firesafety-conducted">

                        	 			<label class="col-sm-12 col-xs-12">Number of fire alarm systems</label>

                                       {!! Form::text('firealaramsysnum', old('firealaramsysnum'), ['class' => 'form-control', 'placeholder' => '']) !!}

                       				 </div>-->

                                    <div class="col-sm-1 col-xs-1 working">

                                        <label class="col-sm-12 col-xs-12">Working</label>

                                      {!! Form::text('firealaramsysworking', old('firealaramsysworking'), ['class' => 'form-control number fireClass', 'id'=>'firealaramsysworking', 'placeholder' => '']) !!}

                                    </div>

                                    <div class="col-sm-1 col-xs-1 firesafety-conducted not-working">

                                          <label class="col-sm-12 col-xs-12">Not Working</label>

                                         {!! Form::text('firealaramsysnotworking', old('firealaramsysnotworking'), ['class' => 'form-control number fireClass', 'id'=>'firealaramsysnotworking', 'placeholder' => '']) !!}

                                    </div>

                                     <div class="col-sm-4 col-xs-4 firesafety-conducted reasonnotworkingg">

                                          <label class="col-sm-12 col-xs-12">Reasons for Not Working</label>

                                          <input type="text" name="firealaramnotworkingreason" class="form-control" style="width:100%"  />

                                    </div>
                                </div>
                       </div>
                       
                        <div class="col-sm-12 col-xs-12 especially-heading">

                        	<h4><span><b>FA system Repeater panel</b></span></h4>

                        </div>
                     		
			<div class="row light-back1">

                     <div class="col-sm-12 col-xs-12 system-repeater-panel">
							
                                 <!-- {!! Form::text('autoonoff_date', old('autoonoff_date'), ['class' => 'form-control', 'placeholder' => '']) !!}-->
							<div class="col-sm-1 col-xs-1 working">
                                <label>Working</label> 
                                {!! Form::text('fasys_panel_working', old('fasys_panel_working'), ['class' => 'form-control', 'id' =>'fasys_panel_working', 'placeholder' => '']) !!}
                            </div>
                            <div class="col-sm-1 col-xs-1 notworking">
                                <label>Not Working</label> 
                                {!! Form::text('fasys_panel_ntworking', old('fasys_panel_ntworking'), ['class' => 'form-control', 'id' =>'fasys_panel_ntworking', 'placeholder' => '']) !!}
                           </div>
                           <div class="col-sm-2 col-xs-2 reasonworking">
                                <label>Reason For Not Working</label> 
                                {!! Form::text('fasys_panel_re_ntworking', old('fasys_panel_re_ntworking'), ['class' => 'form-control', 'id' =>'fasys_panel_re_ntworking', 'placeholder' => '']) !!}
                          </div>
                        	 
                              
                               <div class="col-sm-2 col-xs-2 firesafety-conducted not-working">

                                          <label class="col-sm-12 col-xs-12">False Alaram</label>

                                         {!! Form::text('falsealaram', old('falsealaram'), ['class' => 'form-control', 'id'=>'falsealaram', 'placeholder' => '', 'onkeyup'=>'falsecount()']) !!}

                                    </div> 
									
									<div id="remarksblock" class="col-sm-2 col-xs-2 firesafety-conducted false-alarm-reason" style="display:none;">

                                          <label class="col-sm-12 col-xs-12">False Alaram Reason</label>

                                         {!! Form::text('falsealaramremarks', old('falsealaramremarks'), ['class' => 'form-control', 'id'=>'falsealaramremarks', 'placeholder' => '']) !!}

                                    </div> 
                             </div>
                             </div>
                            

                              <div class="col-sm-12 col-xs-12 especially-heading">

                        	<h4><span><b>Public Addressing system</b></span></h4>

                        </div>

                    

                    

                     <div class="row light-back">

                     <div class="col-sm-12 col-xs-12 public-addressing">

                     				<!--<div class="col-sm-4 col-xs-4 firesafety-conducted">

                        	 			<label class="col-sm-12 col-xs-12">Number of PASystems</label>

                                       {!! Form::text('passystemnum', old('passystemnum'), ['class' => 'form-control', 'placeholder' => '']) !!}

                       				 </div>-->

                                    <div class="col-sm-1 col-xs-1 working">

                                        <label class="col-sm-12 col-xs-12">Working</label>

                                       {!! Form::text('passystemworking', old('passystemworking'), ['class' => 'form-control number paClass', 'id'=>'passystemworking', 'placeholder' => '']) !!}

                                    </div>

                                    <div class="col-sm-1 col-xs-1 firesafety-conducted not-working">

                                          <label class="col-sm-12 col-xs-12">Not Working</label>

                                         {!! Form::text('passystemnotworking', old('passystemnotworking'), ['class' => 'form-control number paClass', 'id'=>'passystemnotworking', 'placeholder' => '']) !!}

                                    </div>

                                     <div class="col-sm-4 col-xs-4 firesafety-conducted reason-not-working">

                                          <label class="col-sm-12 col-xs-12">Reasons for Not Working</label>

                                           <input type="text" name="passystemreasonnotworking" class="form-control" style="width:100%"  />

                                    </div>
                                </div> 
                            </div>
                            
                         <div class="col-sm-12 col-xs-12 especially-heading">
                        	<h4><span><b>PA system repeater panel</b></span></h4>
                        </div>
							
                  <div class="row light-back1">

                     <div class="col-sm-12 col-xs-12 system-repeater">		
									
                                       <!-- {!! Form::text('autoonoff_date', old('autoonoff_date'), ['class' => 'form-control', 'placeholder' => '']) !!}-->
							<div class="col-sm-1 col-xs-1 working">
                                 <label>Working</label> 
                                 {!! Form::text('pasys_panel_working', old('pasys_panel_working'), ['class' => 'form-control', 'id' =>'pasys_panel_working', 'placeholder' => '']) !!}
                            </div>
                            <div class="col-sm-1 col-xs-1 notworking">
                                <label>Not Working</label> 
                                {!! Form::text('pasys_panel_ntworking', old('pasys_panel_ntworking'), ['class' => 'form-control', 'id' =>'pasys_panel_ntworking', 'placeholder' => '']) !!}
                            </div>
                            <div class="col-sm-4 col-xs-4 reasonnotworking">
                                <label>Reason For Not Working</label> 
                                {!! Form::text('pasys_panel_re_ntworking', old('pasys_panel_re_ntworking'), ['class' => 'form-control', 'id' =>'pasys_panel_re_ntworking', 'placeholder' => '']) !!}
                           </div>
                       </div>
                     </div>

                     	

                            

                              <div class="col-sm-12 col-xs-12 especially-heading">

                        	<h4><span><b>Carbon Emission system</b></span></h4>

                        </div>

                    

                    

                     <div class="row light-back">

                     <div class="col-sm-12 col-xs-12 carbon-emission">

                     				<!--<div class="col-sm-4 col-xs-4 firesafety-conducted">

                        	 			<label class="col-sm-12 col-xs-12">Total Number of Jet fans</label>

                                        {!! Form::text('carbonemissionjetfannum', old('carbonemissionjetfannum'), ['class' => 'form-control', 'placeholder' => '']) !!}

                       				 </div>-->

                                    <div class="col-sm-1 col-xs-1 working">

                                        <label class="col-sm-12 col-xs-12">Working</label>

                                        {!! Form::text('carbonemissionworking', old('carbonemissionworking'), ['class' => 'form-control number carClass', 'id'=>'carbonemissionworking', 'placeholder' => '']) !!}

                                    </div>

                                    <div class="col-sm-1 col-xs-1 firesafety-conducted not-working">

                                          <label class="col-sm-12 col-xs-12">Not Working</label>

                                         {!! Form::text('carbonemissionnotworking', old('carbonemissionnotworking'), ['class' => 'form-control number carClass', 'id'=>'carbonemissionnotworking', 'placeholder' => '']) !!}

                                    </div>

                                     <div class="col-sm-4 col-xs-4 firesafety-conducted reason-not-working">

                                          <label class="col-sm-12 col-xs-12">Reasons for Not Working</label>

                                           <input name="carbonemissreasonnotworking" type="text" class="form-control" style="width:100%"  />

                                    </div>

                     		</div>

                    </div>

                    

                    

                     

                    

                     <div class="col-sm-12 col-xs-12 especially-heading">

                        	<h4><span><b>Sumps </b></span></h4>

                        </div>

                        

                        <div class="row light-back1 sumps">

                    <div class="col-sm-12 col-xs-12" style="padding-top:10px;">

                                  <label class="control-label col-sm-1 col-xs-1 for-spacing sumps" for="pwd">Sumps</label>

                                  <div class="col-sm-2 col-xs-2 for-margin-label especially-heading total-percentage">

                                      	<label>Total  </label>

                                       {!! Form::text('sumpstotnum', old('sumpstotnum'), ['class' => 'form-control number', 'placeholder' => '']) !!}

                                      </div>

                                      <!--<div class="col-sm-3 col-xs-3 for-margin-label">

                                      	<label>Sumps (Present)</label>

                                      {!! Form::text('sumpspresentnum', old('sumpspresentnum'), ['class' => 'form-control', 'placeholder' => '']) !!}

                                      </div>-->

                                       <div class="col-sm-2 col-xs-2 for-margin-label last-cleaned">

                                      	<label>Last Cleaned Date:</label>

                                    <!--  {!! Form::text('sumplastcleandate', old('sumplastcleandate'), ['class' => 'form-control', 'placeholder' => '']) !!}-->

										<?php  $sumplastcleandate = date("d-m-Y"); ?>

										<input type="text" name="sumplastcleandate" id="sumplastcleandate" value="<?php echo $sumplastcleandate; ?>" class="form-control">

                                      </div>

                                      

                              <!--  </div>

                              

                              

                               <div class="col-sm-12 col-xs-12 firesafety-high">
-->
                                  <label class="control-label col-sm-1 col-xs-1 for-spacing water-levels" for="pwd">Water Levels </label>

                                  <div class="col-sm-2 col-xs-2 for-margin-label high-medium">

                                      	<ul>

                                        	<li><input type="radio" name="sumpwaterlevel" value="High">High</li>

                                            <li><input type="radio" name="sumpwaterlevel" value="Medium">Medium</li>

                                            <li><input type="radio" name="sumpwaterlevel" value="Low">Low</li>
                                             <li><input type="radio" name="sumpwaterlevel" value="NA">NA</li>

                                        </ul>
 
                                      </div>

                                      <div class="col-sm-2 col-xs-2 for-margin-label sump-water-total">

                                      	<label>Percentage</label>

                                       {!! Form::text('sumptotwaterlevel', old('sumptotwaterlevel'), ['class' => 'form-control number', 'placeholder' => '']) !!}

                                      </div>
 
                                       <!--<div class="col-sm-3 col-xs-3 for-margin-label sump-water-present">

                                      	<label>Water Levels (Present)</label>

                                       {!! Form::text('sumppresentwaterlevel', old('sumppresentwaterlevel'), ['class' => 'form-control', 'placeholder' => '']) !!}

                                      </div>-->

                                      <div class="col-sm-2 col-xs-2 for-margin-label sump-water-cleaned">

                                      	<label>Next Cleaning Date:</label>

                                        <!--{!! Form::text('sumpnextcleaningdate', old('sumpnextcleaningdate'), ['class' => 'form-control', 'placeholder' => '']) !!}-->

										<?php  $sumpnextcleaningdate = date("d-m-Y"); ?>

										<input type="text" name="sumpnextcleaningdate" id="sumpnextcleaningdate" value="<?php echo $sumpnextcleaningdate; ?>" class="form-control">

                                      </div>

                                </div>  

                    </div>

                    

                     <div class="col-sm-12 col-xs-12 especially-heading">

                        	<h4><span><b>OHT - Water Levels</b></span></h4>

                        </div>

                    

                     <div class="row light-back oht-water-level">

                      <div class="col-sm-12 col-xs-12" style="padding-top:10px;">

                                  <label class="control-label col-sm-1 col-xs-1 for-spacing oht-tanks" for="pwd">OHT Tanks</label>

                                  <div class="col-sm-2 col-xs-2 for-margin-label especially-heading total-percentage">

                                      	<label>Total</label>

                                      {!! Form::text('ohttankstotnum', old('ohttankstotnum'), ['class' => 'form-control number', 'placeholder' => '']) !!}

                                      </div>

                                      <!--<div class="col-sm-3 col-xs-3 for-margin-label">

                                      	<label>OHT Tanks (Present)</label>

                                      {!! Form::text('ohttankspresent', old('ohttankspresent'), ['class' => 'form-control', 'placeholder' => '']) !!}

                                      </div>-->

                                       <div class="col-sm-2 col-xs-2 for-margin-label last-cleaned">

                                      	<label>Last Cleaned Date:</label>

                                       <!--{!! Form::text('ohtlastcleaneddate', old('ohtlastcleaneddate'), ['class' => 'form-control', 'placeholder' => '']) !!}-->

									    <?php  $ohtlastcleaneddate = date("d-m-Y"); ?>

										<input type="text" name="ohtlastcleaneddate" id="ohtlastcleaneddate" value="<?php echo $ohtlastcleaneddate; ?>" class="form-control">

                                      </div>

                                      

                               <!-- </div>

                              

                              

                               <div class="col-sm-12 col-xs-12 firesafety-high">
-->
                                  <label class="control-label col-sm-1 col-xs-1 for-spacing for-margin-label water-levels" for="pwd">Water Levels </label>

                                  <div class="col-sm-2 col-xs-2 for-margin-label high-medium">

                                      	<ul>

                                        	<li><input type="radio" name="ohtwaterlevel" value="High">High</li>

                                            <li><input type="radio" name="ohtwaterlevel" value="Medium">Medium</li>

                                            <li><input type="radio" name="ohtwaterlevel" value="Low">Low</li>
                                             <li><input type="radio" name="ohtwaterlevel" value="NA">NA</li>
                                        </ul>
 
                                      </div>

                                      <div class="col-sm-2 col-xs-2 for-margin-label oht-water-total">

                                      	<label>Percentage</label>

                                       {!! Form::text('totohtwaterlevel', old('totohtwaterlevel'), ['class' => 'form-control number', 'placeholder' => '']) !!}

                                      </div>

                                       <!--<div class="col-sm-3 col-xs-3 for-margin-label oht-water-present">

                                      	<label>Water Levels (Present)</label>

                                       {!! Form::text('presentohtwaterlevel', old('presentohtwaterlevel'), ['class' => 'form-control', 'placeholder' => '']) !!}

                                      </div>-->

                                      <div class="col-sm-2 col-xs-2 for-margin-label oht-water-cleaned">

                                      	<label>Next Cleaning Date:</label>

                                      <!-- {!! Form::text('ohtnextcleaningdate', old('ohtnextcleaningdate'), ['class' => 'form-control', 'placeholder' => '']) !!}-->

									   <?php  $ohtnextcleaningdate = date("d-m-Y"); ?>

										<input type="text" name="ohtnextcleaningdate" id="ohtnextcleaningdate" value="<?php echo $ohtnextcleaningdate; ?>" class="form-control">

                                      </div>

                                </div>  

                                </div>

                                

                          <div class="col-sm-12 col-xs-12 especially-heading">

                        	<h4><span><b>Work Permits</b></span></h4>

                        </div>

                              

                              

                       <div class="row light-back1">  

                     <div class="col-sm-12 col-xs-12 work-permits">

                     				<div class="col-sm-3 col-xs-3 hot-work-permit">

                        	 			<label class="col-sm-12 col-xs-12" style="padding-left:0px;">No. of Hot Work Permit Issued</label>

                                        {!! Form::text('numofworkpermitsissued', old('numofworkpermitsissued'), ['class' => 'form-control number', 'placeholder' => '']) !!}

                             		

                        			</div>

                                    <div class="col-sm-3 col-xs-3 firesafety-conducted general-workpermit">

                                        <label class="col-sm-12 col-xs-12" style="padding-left:0px;">No. of General Work Permit Issued</label>

                                        {!! Form::text('generalworkpermitsnum', old('generalworkpermitsnum'), ['class' => 'form-control number', 'placeholder' => '']) !!}

                                    </div>

                                    <div class="col-sm-3 col-xs-3 firesafety-conducted electrical-work-permit">

                        	 			<label class="col-sm-12 col-xs-12" style="padding-left:0px;">No. of Electrical Work Permit Issued</label>

                                      {!! Form::text('electricalworkpermitsissued', old('electricalworkpermitsissued'), ['class' => 'form-control number', 'placeholder' => '']) !!}

                       				 </div>

                                      <div class="col-sm-3 col-xs-3 firesafety-conducted height-workpermit">

                                        <label class="col-sm-12 col-xs-12" style="padding-left:0px;">No. of Height Work Permit Issued</label>

                                       {!! Form::text('heightworkpermitsissued', old('heightworkpermitsissued'), ['class' => 'form-control number', 'placeholder' => '']) !!}

                                    </div>
									
									 <div class="col-sm-3 col-xs-3 entry-workpermit">

                                        <label class="col-sm-12 col-xs-12" style="padding-left:0px;"> No. of Vessel Entry Permit Issued</label>

                                       {!! Form::text('veshtlpermitsissued', old('veshtlpermitsissued'), ['class' => 'form-control number', 'placeholder' => '']) !!}

                                    </div>



                              </div>

                            </div>  

                            

                     <div class="col-sm-12 col-xs-12 especially-heading">

                        	<h4><span><b>Fire Extinguishers</b></span></h4>

                        </div>

                        

                         <div class="row light-back">

                         <div class="col-sm-12 col-xs-12 fire-extinguishers">

                        <div class="col-sm-2 col-xs-2 co2-fire">

                                  <h5><b>C0<sub>2</sub> Fire Extinguishers</b></h5>

                                 <!-- <div class="col-sm-6 col-xs-6 for-margin-label especially-heading">

                                      	<label>Available</label>

                                        <input type="text" class="form-control">

                                      </div>-->

                                      <div class="col-sm-12 col-xs-12 fro-pro">

                                      	<label>Discharge</label>

                                       {!! Form::text('co2firenotworking', old('co2firenotworking'), ['class' => 'form-control number', 'id' =>'co2firenotworking', 'placeholder' => '']) !!}

                                      </div>

                                </div> 

                                

                                <div class="col-sm-2 col-xs-2 firesafety dcp-fire">

                                  <h5><b>DCP Fire Extinguishers</b></h5>

                                  <!--<div class="col-sm-6 col-xs-6 for-margin-label especially-heading">

                                      	<label>Available</label>

                                        <input type="text" class="form-control">

                                      </div>-->

                                      <div class="col-sm-12 col-xs-12 fro-pro">

                                      	<label>Discharge</label>

                                       {!! Form::text('dcpfirenotworking', old('dcpfirenotworking'), ['class' => 'form-control number', 'id' =>'dcpfirenotworking','placeholder' => '']) !!}

                                      </div> 

                                </div> 

                                

                                <div class="col-sm-2 col-xs-2 firesafety water-fire">

                                  <h5><b>Water/ABC Fire Extinguishers</b></h5>

                                 <!-- <div class="col-sm-6 col-xs-6 for-margin-label especially-heading">

                                      	<label>Available</label>

                                        <input type="text" class="form-control">

                                      </div>-->

                                      <div class="col-sm-12 col-xs-12 fro-pro">

                                      	<label>Discharge</label>

                                      {!! Form::text('waterfirenotworking', old('waterfirenotworking'), ['class' => 'form-control number', 'id' =>'waterfirenotworking', 'placeholder' => '']) !!}

                                      </div>

                                </div> 

                                

                                <div class="col-sm-2 col-xs-3 firesafety refilling-inspection">

                                 <!-- <h5><b>Next Refilling</b></h5>-->

                                  <?php /*?><div class="col-sm-6 col-xs-6 for-margin-label especially-heading refilling">

                                      	<label>Re-filling Date</label>

                                       <!-- {!! Form::text('refillingdate', old('refillingdate'), ['class' => 'form-control', 'placeholder' => '']) !!}-->

											<?php  $refillingdate = date("d-m-Y"); ?>

											<input type="text" name="refillingdate" id="refillingdate" value="<?php echo $refillingdate; ?>" class="form-control">

                                      </div><?php */?>

                                    <!--  <div class="col-sm-6 col-xs-6 for-margin-label inspection-date">-->
                                         <h5><b>Inspection</b></h5>
                                      	<label>Date</label>

                                     <!--  {!! Form::text('inspectiondate', old('inspectiondate'), ['class' => 'form-control', 'placeholder' => '']) !!}-->

									   <?php  $inspectiondate = date("d-m-Y"); ?>

											<input type="text" name="inspectiondate" id="inspectiondate" value="<?php echo $inspectiondate; ?>" class="form-control">

                                    <!--  </div>-->

                                </div> 

                             </div>

                        </div>

<div class="col-sm-12 col-xs-12 especially-heading">
   <h4><span><b>MMR</b></span></h4>
</div>
  

<div class="row light-back1">  
  <div class="col-sm-12 mmr-firesafetyreport">                      
        <div class="col-sm-12 col-xs-12">
            <label>Fire Safety</label>
            <input type="text" class="form-control" name="firesafety_major_ac">
        </div> 
   </div>
</div>

                        

                         <div class="col-sm-12 col-xs-12 especially-heading">

                        	<h4><span><b>Additional Information </b></span></h4>

                        </div>

                        
                      <div class="col-sm-12 col-xs-12 additional-information">
                                 

<textarea class="form-control summernote-small" placeholder="Enter Description" name="reason" cols="50" rows="10" id="reasontext"></textarea>
                         <input type="checkbox" value="correct" class="confirmed" name="confirmdata"><span class="i-confirmed">I Confirmed all the data entered was correct</span>
                      </div>


                           

                                      



                        

                        

                           <div class="col-sm-12 col-xs-12 submit-button">

                            	<!--<input type="submit" value="Submit" >-->

								{!! Form::submit('Submit', ['class' => 'btn btn-danger']) !!}

								{!! Form::close() !!}

                            </div>

                               

                               

                        

                        

                    

                  </div>

                </div>

              </div>



              



              



              



              



              

            </div>

          </div>

        </div>

        <!-- /page content -->



        <!-- footer content -->

        

        <!-- /footer content -->

      </div>

    </div>



    <!-- jQuery -->

    <script src="vendors/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap -->

    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- FastClick -->

   

    <!-- NProgress -->

    

    <!-- iCheck -->

   

    <!-- Datatables -->

    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>

    <script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>

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

    <script src="build/js/custom.min.js"></script>

	

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type="text/javascript">



$( document ).ready(function() {



$("#training_on").datepicker({



 dateFormat: "dd-mm-yy",



});



$("#autoonoff_date").datepicker({



 dateFormat: "dd-mm-yy",



});

$("#boosterchecked_on_date").datepicker({



 dateFormat: "dd-mm-yy",



});

$("#boostershedule_on_date").datepicker({



 dateFormat: "dd-mm-yy",



});



$("#next_trail_date").datepicker({



 dateFormat: "dd-mm-yy",



});

$("#lastmockdrillcondut").datepicker({



 dateFormat: "dd-mm-yy",



});



$("#nextmockdrillconduct").datepicker({



 dateFormat: "dd-mm-yy",



});







$("#previousdate").datepicker({



 dateFormat: "dd-mm-yy",



});



$("#nextdate").datepicker({



 dateFormat: "dd-mm-yy",



});



$("#sumplastcleandate").datepicker({



 dateFormat: "dd-mm-yy",



});



$("#sumpnextcleaningdate").datepicker({



 dateFormat: "dd-mm-yy",



});



$("#ohtlastcleaneddate").datepicker({



 dateFormat: "dd-mm-yy",



});



$("#ohtnextcleaningdate").datepicker({



 dateFormat: "dd-mm-yy",



});



/*$("#refillingdate").datepicker({



 dateFormat: "dd-mm-yy",



});
*/


$("#inspectiondate").datepicker({



 dateFormat: "dd-mm-yy",



});











 $('#reasontext').summernote({

              height:300,

            });




 
$("#example1").datepicker({


/*var todayTimeStamp = new Date(); // Unix timestamp in milliseconds
var oneDayTimeStamp = 1000 * 60 * 60 * 24; // Milliseconds in a day
var diff = todayTimeStamp - oneDayTimeStamp;
var yesterdayDate = new Date(diff);
var yesterdayString = yesterdayDate.getFullYear() + '-' + (yesterdayDate.getMonth() + 1) + '-' + yesterdayDate.getDate();

alert(yesterdayString); */
 dateFormat: "dd-mm-yy",
 <?php if(pstatus()){ ?> minDate: "-3", <?php } ?>
 maxDate: '-1',
 

  onSelect: function(dateText) {

    alert("Selected date: " + dateText + "; input's current value: " + this.value);

	

	var site = $("#site_val").val();

	

	 window.location.href = "/getdailyreportfiresafedetaildate/"+site+"/"+dateText; 

	  

  }

});

var site = "<?php  echo $sitevv; ?>";

var erflag = false;

  

 var count = 0;



 $("#jkauto").change(function(){

 

    var jkman = 0;

	var jkauto = 0;

	var jkoff = 0;

	var jknw = 0;

    if($("#jkman").val() == ""){}else{ jkman = $("#jkman").val()}

	if($("#jkauto").val() == ""){}else{ jkauto = $("#jkauto").val()}

	if($("#jkoff").val() == ""){}else{ jkoff = $("#jkoff").val()}

	if($("#jknw").val() == ""){}else{ jknw = $("#jknw").val()}



	

	var res = parseFloat(parseFloat(jkman) +  parseFloat(jkauto) + parseFloat(jkoff) + parseFloat(jknw));

	

	

			 $.ajax({

				type: "get", 

				cache:false,

				url: '{{ route('validation.validtotfiresafe') }}',

				data: { checkval: parseFloat(res), site: site, field:'jockeypump'},

				success: function( msg ) {

				//$("#ajaxResponse").append("<div>"+msg+"</div>");

				

				if(msg == 'suc'){$("#ermsg_jkpump").html("");

				$(".jockeyClass").removeClass("errind");

				erflag = false;

				}else{

				//alert(msg);

				$("#ermsg_jkpump").html(msg);

				$("#jkauto").addClass("errind");

				

				erflag = true; 

				}

				 if(erflag == true){

					

					count = count + 1;

					} else{

					

					count = count - 1;

					} 

					if(count > 0) {

					$("#errorblk").show();

					} else

					{

					 $("#errorblk").hide();

					}

				}

        });

 	

 });

	

	

	

	

	 $("#jkman").change(function(){

  



	 var jkman = 0;

	var jkauto = 0;

	var jkoff = 0;

	var jknw = 0;

    if($("#jkman").val() == ""){}else{ jkman = $("#jkman").val()}

	if($("#jkauto").val() == ""){}else{ jkauto = $("#jkauto").val()}

	if($("#jkoff").val() == ""){}else{ jkoff = $("#jkoff").val()}

	if($("#jknw").val() == ""){}else{ jknw = $("#jknw").val()}

	

	

	var res = parseFloat(jkman) +  parseFloat(jkauto) + parseFloat(jkoff) + parseFloat(jknw);

	

			 $.ajax({

				type: "get", 

				cache:false,

				url: '{{ route('validation.validtotfiresafe') }}',

				data: { checkval: res, site: site, field:'jockeypump'},

				success: function( msg ) {

				//$("#ajaxResponse").append("<div>"+msg+"</div>");

				

				if(msg == 'suc'){$("#ermsg_jkpump").html("");

				$(".jockeyClass").removeClass("errind");

				erflag = false;

				}else{

				//alert(msg);

				$("#ermsg_jkpump").html(msg);

				$("#jkman").addClass("errind");

				

				erflag = true; 

				}

				 if(erflag == true){

					

					count = count + 1;

					} else{

					

					count = count - 1;

					} 

					if(count > 0) {

					$("#errorblk").show();

					} else

					{

					 $("#errorblk").hide();

					}

				}

        });

 	

 });

 

 

  $("#jkoff").change(function(){

  

	 var jkman = 0;

	var jkauto = 0;

	var jkoff = 0;

	var jknw = 0;

    if($("#jkman").val() == ""){}else{ jkman = $("#jkman").val()}

	if($("#jkauto").val() == ""){}else{ jkauto = $("#jkauto").val()}

	if($("#jkoff").val() == ""){}else{ jkoff = $("#jkoff").val()}

	if($("#jknw").val() == ""){}else{ jknw = $("#jknw").val()}

	

	

	var res = parseFloat(jkman) +  parseFloat(jkauto) + parseFloat(jkoff) + parseFloat(jknw);



			 $.ajax({

				type: "get", 

				cache:false,

				url: '{{ route('validation.validtotfiresafe') }}',

				data: { checkval: res, site: site, field:'jockeypump'},

				success: function( msg ) {

				//$("#ajaxResponse").append("<div>"+msg+"</div>");

				

				if(msg == 'suc'){$("#ermsg_jkpump").html("");

				$(".jockeyClass").removeClass("errind");

				erflag = false;

				}else{

				//alert(msg);

				$("#ermsg_jkpump").html(msg);

				$("#jkoff").addClass("errind");

				

				erflag = true; 

				}

				 if(erflag == true){

					

					count = count + 1;

					} else{

					

					count = count - 1;

					} 

					if(count > 0) {

					$("#errorblk").show();

					} else

					{

					 $("#errorblk").hide();

					}

				}

        });

 	

 });

 

 

   $("#jknw").change(function(){

 

 var jkman = 0;

	var jkauto = 0;

	var jkoff = 0;

	var jknw = 0;

    if($("#jkman").val() == ""){}else{ jkman = $("#jkman").val()}

	if($("#jkauto").val() == ""){}else{ jkauto = $("#jkauto").val()}

	if($("#jkoff").val() == ""){}else{ jkoff = $("#jkoff").val()}

	if($("#jknw").val() == ""){}else{ jknw = $("#jknw").val()}



	var res = parseFloat(jkman) +  parseFloat(jkauto) + parseFloat(jkoff) + parseFloat(jknw);

	

			 $.ajax({

				type: "get", 

				cache:false,

				url: '{{ route('validation.validtotfiresafe') }}',

				data: { checkval: res, site: site, field:'jockeypump'},

				success: function( msg ) {

				//$("#ajaxResponse").append("<div>"+msg+"</div>");

				

				if(msg == 'suc'){$("#ermsg_jkpump").html("");

				$(".jockeyClass").removeClass("errind");

				erflag = false;

				}else{

				//alert(msg);

				$("#ermsg_jkpump").html(msg);

				$("#jknw").addClass("errind");

				

				erflag = true; 

				}

				 if(erflag == true){

					

					count = count + 1;

					} else{

					

					count = count - 1;

					} 

					if(count > 0) {

					$("#errorblk").show();

					} else

					{

					 $("#errorblk").hide();

					}

				}

        });

 	

 }); 

	

	

	

	// MAIN PUMPS

	

	  $("#mainpumpauto").change(function(){

 

     var mainpumpauto = 0;

	var mainpumpmanual = 0;

	var mainpumpoff = 0;

	var mainpumpnotworking = 0;

    if($("#mainpumpauto").val() == ""){}else{ mainpumpauto = $("#mainpumpauto").val()}

	if($("#mainpumpmanual").val() == ""){}else{ mainpumpmanual = $("#mainpumpmanual").val()}

	if($("#mainpumpoff").val() == ""){}else{ mainpumpoff = $("#mainpumpoff").val()}

	if($("#mainpumpnotworking").val() == ""){}else{ mainpumpnotworking = $("#mainpumpnotworking").val()}



	var res = parseFloat(mainpumpauto) +  parseFloat(mainpumpmanual) + parseFloat(mainpumpoff) + parseFloat(mainpumpnotworking);

	

			 $.ajax({

				type: "get", 

				cache:false,

				url: '{{ route('validation.validtotfiresafe') }}',

				data: { checkval: res, site: site, field:'mainpump'},

				success: function( msg ) {

				//$("#ajaxResponse").append("<div>"+msg+"</div>");

				

				if(msg == 'suc'){$("#ermsg_mainpump").html("");

				$(".mainpumpClass").removeClass("errind");

				erflag = false;

				}else{

				//alert(msg);

				$("#ermsg_mainpump").html(msg);

				$("#mainpumpauto").addClass("errind");

				

				erflag = true; 

				}

				 if(erflag == true){

					

					count = count + 1;

					} else{

					

					count = count - 1;

					} 

					if(count > 0) {

					$("#errorblk").show();

					} else

					{

					 $("#errorblk").hide();

					}

				}

        });

 	

 }); 

 

 	  $("#mainpumpmanual").change(function(){

 

     var mainpumpauto = 0;

	var mainpumpmanual = 0;

	var mainpumpoff = 0;

	var mainpumpnotworking = 0;

    if($("#mainpumpauto").val() == ""){}else{ mainpumpauto = $("#mainpumpauto").val()}

	if($("#mainpumpmanual").val() == ""){}else{ mainpumpmanual = $("#mainpumpmanual").val()}

	if($("#mainpumpoff").val() == ""){}else{ mainpumpoff = $("#mainpumpoff").val()}

	if($("#mainpumpnotworking").val() == ""){}else{ mainpumpnotworking = $("#mainpumpnotworking").val()}



	var res = parseFloat(mainpumpauto) +  parseFloat(mainpumpmanual) + parseFloat(mainpumpoff) + parseFloat(mainpumpnotworking);

	

			 $.ajax({

				type: "get", 

				cache:false,

				url: '{{ route('validation.validtotfiresafe') }}',

				data: { checkval: res, site: site, field:'mainpump'},

				success: function( msg ) {

				//$("#ajaxResponse").append("<div>"+msg+"</div>");

				

				if(msg == 'suc'){$("#ermsg_mainpump").html("");

				$(".mainpumpClass").removeClass("errind");

				erflag = false;

				}else{

				//alert(msg);

				$("#ermsg_mainpump").html(msg);

				$("#mainpumpmanual").addClass("errind");

				

				erflag = true; 

				}

				 if(erflag == true){

					

					count = count + 1;

					} else{

					

					count = count - 1;

					} 

					if(count > 0) {

					$("#errorblk").show();

					} else

					{

					 $("#errorblk").hide();

					}

				}

        });

 	

 }); 

 

 

   $("#mainpumpoff").change(function(){

 

     var mainpumpauto = 0;

	var mainpumpmanual = 0;

	var mainpumpoff = 0;

	var mainpumpnotworking = 0;

    if($("#mainpumpauto").val() == ""){}else{ mainpumpauto = $("#mainpumpauto").val()}

	if($("#mainpumpmanual").val() == ""){}else{ mainpumpmanual = $("#mainpumpmanual").val()}

	if($("#mainpumpoff").val() == ""){}else{ mainpumpoff = $("#mainpumpoff").val()}

	if($("#mainpumpnotworking").val() == ""){}else{ mainpumpnotworking = $("#mainpumpnotworking").val()}



	var res = parseFloat(mainpumpauto) +  parseFloat(mainpumpmanual) + parseFloat(mainpumpoff) + parseFloat(mainpumpnotworking);

	

			 $.ajax({

				type: "get", 

				cache:false,

				url: '{{ route('validation.validtotfiresafe') }}',

				data: { checkval: res, site: site, field:'mainpump'},

				success: function( msg ) {

				//$("#ajaxResponse").append("<div>"+msg+"</div>");

				

				if(msg == 'suc'){$("#ermsg_mainpump").html("");

				$(".mainpumpClass").removeClass("errind");

				erflag = false;

				}else{

				//alert(msg);

				$("#ermsg_mainpump").html(msg);

				$("#mainpumpoff").addClass("errind");

				

				erflag = true; 

				}

				 if(erflag == true){

					

					count = count + 1;

					} else{

					

					count = count - 1;

					} 

					if(count > 0) {

					$("#errorblk").show();

					} else

					{

					 $("#errorblk").hide();

					}

				}

        });

 	

 }); 

 

 

    $("#mainpumpnotworking").change(function(){

 

     var mainpumpauto = 0;

	var mainpumpmanual = 0;

	var mainpumpoff = 0;

	var mainpumpnotworking = 0;

    if($("#mainpumpauto").val() == ""){}else{ mainpumpauto = $("#mainpumpauto").val()}

	if($("#mainpumpmanual").val() == ""){}else{ mainpumpmanual = $("#mainpumpmanual").val()}

	if($("#mainpumpoff").val() == ""){}else{ mainpumpoff = $("#mainpumpoff").val()}

	if($("#mainpumpnotworking").val() == ""){}else{ mainpumpnotworking = $("#mainpumpnotworking").val()}



	var res = parseFloat(mainpumpauto) +  parseFloat(mainpumpmanual) + parseFloat(mainpumpoff) + parseFloat(mainpumpnotworking);

	

			 $.ajax({

				type: "get", 

				cache:false,

				url: '{{ route('validation.validtotfiresafe') }}',

				data: { checkval: res, site: site, field:'mainpump'},

				success: function( msg ) {

				//$("#ajaxResponse").append("<div>"+msg+"</div>");

				

				if(msg == 'suc'){$("#ermsg_mainpump").html("");

				$(".mainpumpClass").removeClass("errind");

				erflag = false;

				}else{

				//alert(msg);

				$("#ermsg_mainpump").html(msg);

				$("#mainpumpnotworking").addClass("errind");

				

				erflag = true; 

				}

				 if(erflag == true){

					

					count = count + 1;

					} else{

					

					count = count - 1;

					} 

					if(count > 0) {

					$("#errorblk").show();

					} else

					{

					 $("#errorblk").hide();

					}

				}

        });

 	

 }); 

 

 

 

    $("#dgpumpauto").change(function(){

 

     var dgpumpauto = 0;

	var dgpumpmanual = 0;

	var dgpumpoff = 0;

	var dgpumpnotworking = 0;

    if($("#dgpumpauto").val() == ""){}else{ dgpumpauto = $("#dgpumpauto").val()}

	if($("#dgpumpmanual").val() == ""){}else{ dgpumpmanual = $("#dgpumpmanual").val()}

	if($("#dgpumpoff").val() == ""){}else{ dgpumpoff = $("#dgpumpoff").val()}

	if($("#dgpumpnotworking").val() == ""){}else{ dgpumpnotworking = $("#dgpumpnotworking").val()}



	var res = parseFloat(dgpumpauto) +  parseFloat(dgpumpmanual) + parseFloat(dgpumpoff) + parseFloat(dgpumpnotworking);

	

			 $.ajax({

				type: "get", 

				cache:false,

				url: '{{ route('validation.validtotfiresafe') }}',

				data: { checkval: res, site: site, field:'dgpump'},

				success: function( msg ) {

				//$("#ajaxResponse").append("<div>"+msg+"</div>");

				

				if(msg == 'suc'){$("#ermsg_dgpump").html("");

				$(".dgpumpClass").removeClass("errind");

				erflag = false;

				}else{

				//alert(msg);

				$("#ermsg_dgpump").html(msg);

				$("#dgpumpauto").addClass("errind");

				

				erflag = true; 

				}

				 if(erflag == true){

					

					count = count + 1;

					} else{

					

					count = count - 1;

					} 

					if(count > 0) {

					$("#errorblk").show();

					} else

					{

					 $("#errorblk").hide();

					}

				}

        });

 	

 }); 

 

   $("#dgpumpmanual").change(function(){

 

     var dgpumpauto = 0;

	var dgpumpmanual = 0;

	var dgpumpoff = 0;

	var dgpumpnotworking = 0;

    if($("#dgpumpauto").val() == ""){}else{ dgpumpauto = $("#dgpumpauto").val()}

	if($("#dgpumpmanual").val() == ""){}else{ dgpumpmanual = $("#dgpumpmanual").val()}

	if($("#dgpumpoff").val() == ""){}else{ dgpumpoff = $("#dgpumpoff").val()}

	if($("#dgpumpnotworking").val() == ""){}else{ dgpumpnotworking = $("#dgpumpnotworking").val()}



	var res = parseFloat(dgpumpauto) +  parseFloat(dgpumpmanual) + parseFloat(dgpumpoff) + parseFloat(dgpumpnotworking);

	

			 $.ajax({

				type: "get", 

				cache:false,

				url: '{{ route('validation.validtotfiresafe') }}',

				data: { checkval: res, site: site, field:'dgpump'},

				success: function( msg ) {

				//$("#ajaxResponse").append("<div>"+msg+"</div>");

				

				if(msg == 'suc'){$("#ermsg_dgpump").html("");

				$(".dgpumpClass").removeClass("errind");

				erflag = false;

				}else{

				//alert(msg);

				$("#ermsg_dgpump").html(msg);

				$("#dgpumpmanual").addClass("errind");

				

				erflag = true; 

				}

				 if(erflag == true){

					

					count = count + 1;

					} else{

					

					count = count - 1;

					} 

					if(count > 0) {

					$("#errorblk").show();

					} else

					{

					 $("#errorblk").hide();

					}

				}

        });

 	

 }); 

 

    $("#dgpumpoff").change(function(){

 

     var dgpumpauto = 0;

	var dgpumpmanual = 0;

	var dgpumpoff = 0;

	var dgpumpnotworking = 0;

    if($("#dgpumpauto").val() == ""){}else{ dgpumpauto = $("#dgpumpauto").val()}

	if($("#dgpumpmanual").val() == ""){}else{ dgpumpmanual = $("#dgpumpmanual").val()}

	if($("#dgpumpoff").val() == ""){}else{ dgpumpoff = $("#dgpumpoff").val()}

	if($("#dgpumpnotworking").val() == ""){}else{ dgpumpnotworking = $("#dgpumpnotworking").val()}



	var res = parseFloat(dgpumpauto) +  parseFloat(dgpumpmanual) + parseFloat(dgpumpoff) + parseFloat(dgpumpnotworking);

	

			 $.ajax({

				type: "get", 

				cache:false,

				url: '{{ route('validation.validtotfiresafe') }}',

				data: { checkval: res, site: site, field:'dgpump'},

				success: function( msg ) {

				//$("#ajaxResponse").append("<div>"+msg+"</div>");

				

				if(msg == 'suc'){$("#ermsg_dgpump").html("");

				$(".dgpumpClass").removeClass("errind");

				erflag = false;

				}else{

				//alert(msg);

				$("#ermsg_dgpump").html(msg);

				$("#dgpumpoff").addClass("errind");

				

				erflag = true; 

				}

				 if(erflag == true){

					

					count = count + 1;

					} else{

					

					count = count - 1;

					} 

					if(count > 0) {

					$("#errorblk").show();

					} else

					{

					 $("#errorblk").hide();

					}

				}

        });

 	

 }); 

 

    $("#dgpumpnotworking").change(function(){

 

     var dgpumpauto = 0;

	var dgpumpmanual = 0;

	var dgpumpoff = 0;

	var dgpumpnotworking = 0;

    if($("#dgpumpauto").val() == ""){}else{ dgpumpauto = $("#dgpumpauto").val()}

	if($("#dgpumpmanual").val() == ""){}else{ dgpumpmanual = $("#dgpumpmanual").val()}

	if($("#dgpumpoff").val() == ""){}else{ dgpumpoff = $("#dgpumpoff").val()}

	if($("#dgpumpnotworking").val() == ""){}else{ dgpumpnotworking = $("#dgpumpnotworking").val()}



	var res = parseFloat(dgpumpauto) +  parseFloat(dgpumpmanual) + parseFloat(dgpumpoff) + parseFloat(dgpumpnotworking);

	

			 $.ajax({

				type: "get", 

				cache:false,

				url: '{{ route('validation.validtotfiresafe') }}',

				data: { checkval: res, site: site, field:'dgpump'},

				success: function( msg ) {

				//$("#ajaxResponse").append("<div>"+msg+"</div>");

				

				if(msg == 'suc'){$("#ermsg_dgpump").html("");

				$(".dgpumpClass").removeClass("errind");

				erflag = false;

				}else{

				//alert(msg);

				$("#ermsg_dgpump").html(msg);

				$("#dgpumpnotworking").addClass("errind");

				

				erflag = true; 

				}

				 if(erflag == true){

					

					count = count + 1;

					} else{

					

					count = count - 1;

					} 

					if(count > 0) {

					$("#errorblk").show();

					} else

					{

					 $("#errorblk").hide();

					}

				}

        });

 	

 }); 

 

 

 

 

     $("#co2firenotworking").change(function(){

 

	var checkval = $("#co2firenotworking").val();

	

			 $.ajax({

				type: "get", 

				cache:false,

				url: '{{ route('validation.validtotfiresafe') }}',

				data: { checkval: checkval, site: site, field:'co2firenotworking'},

				success: function( msg ) {

				//$("#ajaxResponse").append("<div>"+msg+"</div>");

				

				if(msg == 'suc'){$("#ermsg_co2").html("");

				$("#co2firenotworking").removeClass("errind");

				erflag = false;

				}else{

				//alert(msg);

				$("#ermsg_co2").html(msg);

				$("#co2firenotworking").addClass("errind");

				

				erflag = true; 

				}

				 if(erflag == true){

					

					count = count + 1;

					} else{

					

					count = count - 1;

					} 

					if(count > 0) {

					$("#errorblk").show();

					} else

					{

					 $("#errorblk").hide();

					}

				}

        });

 	

 }); 

 

 

 

   $("#dcpfirenotworking").change(function(){

 

	var checkval = $("#dcpfirenotworking").val();

	

			 $.ajax({

				type: "get", 

				cache:false,

				url: '{{ route('validation.validtotfiresafe') }}',

				data: { checkval: checkval, site: site, field:'dcpfirenotworking'},

				success: function( msg ) {

				//$("#ajaxResponse").append("<div>"+msg+"</div>");

				

				if(msg == 'suc'){$("#ermsg_dcp").html("");

				$("#dcpfirenotworking").removeClass("errind");

				erflag = false;

				}else{

				//alert(msg);

				$("#ermsg_dcp").html(msg);

				$("#dcpfirenotworking").addClass("errind");

				

				erflag = true; 

				}

				 if(erflag == true){

					

					count = count + 1;

					} else{

					

					count = count - 1;

					} 

					if(count > 0) {

					$("#errorblk").show();

					} else

					{

					 $("#errorblk").hide();

					}

				}

        });

 	

 });

 

  

    $("#waterfirenotworking").change(function(){

 

	var checkval = $("#waterfirenotworking").val();

	

			 $.ajax({

				type: "get", 

				cache:false,

				url: '{{ route('validation.validtotfiresafe') }}',

				data: { checkval: checkval, site: site, field:'waterfirenotworking'},

				success: function( msg ) {

				//$("#ajaxResponse").append("<div>"+msg+"</div>");

				

				if(msg == 'suc'){$("#ermsg_water").html("");

				$("#waterfirenotworking").removeClass("errind");

				erflag = false;

				}else{

				//alert(msg);

				$("#ermsg_water").html(msg);

				$("#waterfirenotworking").addClass("errind");

				

				erflag = true; 

				}

				 if(erflag == true){

					

					count = count + 1;

					} else{

					

					count = count - 1;

					} 

					if(count > 0) {

					$("#errorblk").show();

					} else

					{

					 $("#errorblk").hide();

					}

				}

        });

 	

 });

 

 

    $("#boosterautopumps").change(function(){

 

     var boosterautopumps = 0; 

	var boostermanualpumps = 0;

	var boosterpumpsoff = 0;

	var boosterpumpsnotworking = 0;

    if($("#boosterautopumps").val() == ""){}else{ boosterautopumps = $("#boosterautopumps").val()}

	if($("#boostermanualpumps").val() == ""){}else{ boostermanualpumps = $("#boostermanualpumps").val()}

	if($("#boosterpumpsoff").val() == ""){}else{ boosterpumpsoff = $("#boosterpumpsoff").val()}

	if($("#boosterpumpsnotworking").val() == ""){}else{ boosterpumpsnotworking = $("#boosterpumpsnotworking").val()}



	var res = parseFloat(boosterautopumps) +  parseFloat(boostermanualpumps) + parseFloat(boosterpumpsoff) + parseFloat(boosterpumpsnotworking);

	

			 $.ajax({

				type: "get", 

				cache:false,

				url: '{{ route('validation.validtotfiresafe') }}',

				data: { checkval: res, site: site, field:'boosterpump'},

				success: function( msg ) {

				//$("#ajaxResponse").append("<div>"+msg+"</div>");

				

				if(msg == 'suc'){$("#ermsg_boosterpmp").html("");

				$(".boosterClass").removeClass("errind");

				erflag = false;

				}else{

				//alert(msg);

				$("#ermsg_boosterpmp").html(msg);

				$("#boosterautopumps").addClass("errind");

				

				erflag = true; 

				}

				 if(erflag == true){

					

					count = count + 1;

					} else{

					

					count = count - 1;

					} 

					if(count > 0) {

					$("#errorblk").show();

					} else

					{

					 $("#errorblk").hide();

					}

				}

        });

 	

 }); 

 

 

     $("#boostermanualpumps").change(function(){

 

     var boosterautopumps = 0; 

	var boostermanualpumps = 0;

	var boosterpumpsoff = 0;

	var boosterpumpsnotworking = 0;

    if($("#boosterautopumps").val() == ""){}else{ boosterautopumps = $("#boosterautopumps").val()}

	if($("#boostermanualpumps").val() == ""){}else{ boostermanualpumps = $("#boostermanualpumps").val()}

	if($("#boosterpumpsoff").val() == ""){}else{ boosterpumpsoff = $("#boosterpumpsoff").val()}

	if($("#boosterpumpsnotworking").val() == ""){}else{ boosterpumpsnotworking = $("#boosterpumpsnotworking").val()}



	var res = parseFloat(boosterautopumps) +  parseFloat(boostermanualpumps) + parseFloat(boosterpumpsoff) + parseFloat(boosterpumpsnotworking);

	

			 $.ajax({

				type: "get", 

				cache:false,

				url: '{{ route('validation.validtotfiresafe') }}',

				data: { checkval: res, site: site, field:'boosterpump'},

				success: function( msg ) {

				//$("#ajaxResponse").append("<div>"+msg+"</div>");

				

				if(msg == 'suc'){$("#ermsg_boosterpmp").html("");

				$(".boosterClass").removeClass("errind");

				erflag = false;

				}else{

				//alert(msg);

				$("#ermsg_boosterpmp").html(msg);

				$("#boostermanualpumps").addClass("errind");

				

				erflag = true; 

				}

				 if(erflag == true){

					

					count = count + 1;

					} else{

					

					count = count - 1;

					} 

					if(count > 0) {

					$("#errorblk").show();

					} else

					{

					 $("#errorblk").hide();

					}

				}

        });

 	

 }); 

 

 

   $("#boosterpumpsoff").change(function(){

 

     var boosterautopumps = 0; 

	var boostermanualpumps = 0;

	var boosterpumpsoff = 0;

	var boosterpumpsnotworking = 0;

    if($("#boosterautopumps").val() == ""){}else{ boosterautopumps = $("#boosterautopumps").val()}

	if($("#boostermanualpumps").val() == ""){}else{ boostermanualpumps = $("#boostermanualpumps").val()}

	if($("#boosterpumpsoff").val() == ""){}else{ boosterpumpsoff = $("#boosterpumpsoff").val()}

	if($("#boosterpumpsnotworking").val() == ""){}else{ boosterpumpsnotworking = $("#boosterpumpsnotworking").val()}



	var res = parseFloat(boosterautopumps) +  parseFloat(boostermanualpumps) + parseFloat(boosterpumpsoff) + parseFloat(boosterpumpsnotworking);

	

			 $.ajax({

				type: "get", 

				cache:false,

				url: '{{ route('validation.validtotfiresafe') }}',

				data: { checkval: res, site: site, field:'boosterpump'},

				success: function( msg ) {

				//$("#ajaxResponse").append("<div>"+msg+"</div>");

				

				if(msg == 'suc'){$("#ermsg_boosterpmp").html("");

				$(".boosterClass").removeClass("errind");

				erflag = false;

				}else{

				//alert(msg);

				$("#ermsg_boosterpmp").html(msg);

				$("#boosterpumpsoff").addClass("errind");

				

				erflag = true; 

				}

				 if(erflag == true){

					

					count = count + 1;

					} else{

					

					count = count - 1;

					} 

					if(count > 0) {

					$("#errorblk").show();

					} else

					{

					 $("#errorblk").hide();

					}

				}

        });

 	

 }); 

 

    $("#boosterpumpsnotworking").change(function(){

 

     var boosterautopumps = 0; 

	var boostermanualpumps = 0;

	var boosterpumpsoff = 0;

	var boosterpumpsnotworking = 0;

    if($("#boosterautopumps").val() == ""){}else{ boosterautopumps = $("#boosterautopumps").val()}

	if($("#boostermanualpumps").val() == ""){}else{ boostermanualpumps = $("#boostermanualpumps").val()}

	if($("#boosterpumpsoff").val() == ""){}else{ boosterpumpsoff = $("#boosterpumpsoff").val()}

	if($("#boosterpumpsnotworking").val() == ""){}else{ boosterpumpsnotworking = $("#boosterpumpsnotworking").val()}



	var res = parseFloat(boosterautopumps) +  parseFloat(boostermanualpumps) + parseFloat(boosterpumpsoff) + parseFloat(boosterpumpsnotworking);

	

			 $.ajax({

				type: "get", 

				cache:false,

				url: '{{ route('validation.validtotfiresafe') }}',

				data: { checkval: res, site: site, field:'boosterpump'},

				success: function( msg ) {

				//$("#ajaxResponse").append("<div>"+msg+"</div>");

				

				if(msg == 'suc'){$("#ermsg_boosterpmp").html("");

				$(".boosterClass").removeClass("errind");

				erflag = false;

				}else{

				//alert(msg);

				$("#ermsg_boosterpmp").html(msg);

				$("#boosterpumpsnotworking").addClass("errind");

				

				erflag = true; 

				}

				 if(erflag == true){

					

					count = count + 1;

					} else{

					

					count = count - 1;

					} 

					if(count > 0) {

					$("#errorblk").show();

					} else

					{

					 $("#errorblk").hide();

					}

				}

        });

 	

 }); 

 

 

 

  $("#firealaramsysworking").change(function(){

 

     var firealaramsysworking = 0; 

	var firealaramsysnotworking = 0;

	

    if($("#firealaramsysworking").val() == ""){}else{ firealaramsysworking = $("#firealaramsysworking").val()}

	if($("#firealaramsysnotworking").val() == ""){}else{ firealaramsysnotworking = $("#firealaramsysnotworking").val()}



	var res = parseFloat(firealaramsysworking) +  parseFloat(firealaramsysnotworking);

	

			 $.ajax({

				type: "get", 

				cache:false,

				url: '{{ route('validation.validtotfiresafe') }}',

				data: { checkval: res, site: site, field:'firealaramsysworking'},

				success: function( msg ) {

				//$("#ajaxResponse").append("<div>"+msg+"</div>");

				

				if(msg == 'suc'){$("#ermsg_firealarmsys").html("");

				$(".fireClass").removeClass("errind");

				erflag = false;

				}else{

				//alert(msg);

				$("#ermsg_firealarmsys").html(msg);

				$("#firealaramsysworking").addClass("errind");

				

				erflag = true; 

				}

				 if(erflag == true){

					

					count = count + 1;

					} else{

					

					count = count - 1;

					} 

					if(count > 0) {

					$("#errorblk").show();

					} else

					{

					 $("#errorblk").hide();

					}

				}

        });

 	

 }); 

   

   

   

     $("#firealaramsysnotworking").change(function(){

 

     var firealaramsysworking = 0; 

	var firealaramsysnotworking = 0;

	

    if($("#firealaramsysworking").val() == ""){}else{ firealaramsysworking = $("#firealaramsysworking").val()}

	if($("#firealaramsysnotworking").val() == ""){}else{ firealaramsysnotworking = $("#firealaramsysnotworking").val()}

	



	var res = parseFloat(firealaramsysworking) +  parseFloat(firealaramsysnotworking);

	

			 $.ajax({

				type: "get", 

				cache:false,

				url: '{{ route('validation.validtotfiresafe') }}',

				data: { checkval: res, site: site, field:'firealaramsysworking'},

				success: function( msg ) {

				//$("#ajaxResponse").append("<div>"+msg+"</div>");

				

				if(msg == 'suc'){$("#ermsg_firealarmsys").html("");

				$(".fireClass").removeClass("errind");

				erflag = false;

				}else{

				//alert(msg);

				$("#ermsg_firealarmsys").html(msg);

				$("#firealaramsysnotworking").addClass("errind");

				

				erflag = true; 

				}

				 if(erflag == true){

					

					count = count + 1;

					} else{

					

					count = count - 1;

					} 

					if(count > 0) {

					$("#errorblk").show();

					} else

					{

					 $("#errorblk").hide();

					}

				}

        });

 	

 }); 

 

 

      $("#passystemworking").change(function(){

 

     var passystemworking = 0; 

	var passystemnotworking = 0;

	

    if($("#passystemworking").val() == ""){}else{ passystemworking = $("#passystemworking").val()}

	if($("#passystemnotworking").val() == ""){}else{ passystemnotworking = $("#passystemnotworking").val()}

	



	var res = parseFloat(passystemworking) +  parseFloat(passystemnotworking);

	

			 $.ajax({

				type: "get", 

				cache:false,

				url: '{{ route('validation.validtotfiresafe') }}',

				data: { checkval: res, site: site, field:'passystemworking'},

				success: function( msg ) {

				//$("#ajaxResponse").append("<div>"+msg+"</div>");

				

				if(msg == 'suc'){$("#ermsg_pasys").html("");

				$(".paClass").removeClass("errind");

				erflag = false;

				}else{

				//alert(msg);

				$("#ermsg_pasys").html(msg);

				$("#passystemworking").addClass("errind");

				

				erflag = true; 

				}

				 if(erflag == true){

					

					count = count + 1;

					} else{

					

					count = count - 1;

					} 

					if(count > 0) {

					$("#errorblk").show();

					} else

					{

					 $("#errorblk").hide();

					}

				}

        });

 	

 }); 

 

 

      $("#passystemnotworking").change(function(){

 

     var passystemworking = 0; 

	var passystemnotworking = 0;

	

    if($("#passystemworking").val() == ""){}else{ passystemworking = $("#passystemworking").val()}

	if($("#passystemnotworking").val() == ""){}else{ passystemnotworking = $("#passystemnotworking").val()}

	



	var res = parseFloat(passystemworking) +  parseFloat(passystemnotworking);

	

			 $.ajax({

				type: "get", 

				cache:false,

				url: '{{ route('validation.validtotfiresafe') }}',

				data: { checkval: res, site: site, field:'passystemworking'},

				success: function( msg ) {

				//$("#ajaxResponse").append("<div>"+msg+"</div>");

				

				if(msg == 'suc'){$("#ermsg_pasys").html("");

				$(".paClass").removeClass("errind");

				erflag = false;

				}else{

				//alert(msg);

				$("#ermsg_pasys").html(msg);

				$("#passystemnotworking").addClass("errind");

				

				erflag = true; 

				}

				 if(erflag == true){

					

					count = count + 1;

					} else{

					

					count = count - 1;

					} 

					if(count > 0) {

					$("#errorblk").show();

					} else

					{

					 $("#errorblk").hide();

					}

				}

        });

 	

 }); 

   

   

   

   

    $("#carbonemissionworking").change(function(){

 

     var carbonemissionworking = 0; 

	var carbonemissionnotworking = 0;

	

    if($("#carbonemissionworking").val() == ""){}else{ carbonemissionworking = $("#carbonemissionworking").val()}

	if($("#carbonemissionnotworking").val() == ""){}else{ carbonemissionnotworking = $("#carbonemissionnotworking").val()}

	



	var res = parseFloat(carbonemissionworking) +  parseFloat(carbonemissionnotworking);

	

			 $.ajax({

				type: "get", 

				cache:false,

				url: '{{ route('validation.validtotfiresafe') }}',

				data: { checkval: res, site: site, field:'carbonemissionworking'},

				success: function( msg ) {

				//$("#ajaxResponse").append("<div>"+msg+"</div>");

				

				if(msg == 'suc'){$("#ermsg_caremssys").html("");

				$(".carClass").removeClass("errind");

				erflag = false;

				}else{

				//alert(msg);

				$("#ermsg_caremssys").html(msg);

				$("#carbonemissionworking").addClass("errind");

				

				erflag = true; 

				}

				 if(erflag == true){

					

					count = count + 1;

					} else{

					

					count = count - 1;

					} 

					if(count > 0) {

					$("#errorblk").show();

					} else

					{

					 $("#errorblk").hide();

					}

				}

        });

 	

 }); 

 

 

   $("#carbonemissionnotworking").change(function(){

 

     var carbonemissionworking = 0; 

	var carbonemissionnotworking = 0;

	

    if($("#carbonemissionworking").val() == ""){}else{ carbonemissionworking = $("#carbonemissionworking").val()}

	if($("#carbonemissionnotworking").val() == ""){}else{ carbonemissionnotworking = $("#carbonemissionnotworking").val()}

	



	var res = parseFloat(carbonemissionworking) +  parseFloat(carbonemissionnotworking);

	

			 $.ajax({

				type: "get", 

				cache:false,

				url: '{{ route('validation.validtotfiresafe') }}',

				data: { checkval: res, site: site, field:'carbonemissionworking'},

				success: function( msg ) {

				//$("#ajaxResponse").append("<div>"+msg+"</div>");

				

				if(msg == 'suc'){$("#ermsg_caremssys").html("");

				$(".carClass").removeClass("errind");

				erflag = false;

				}else{

				//alert(msg);

				$("#ermsg_caremssys").html(msg);

				$("#carbonemissionnotworking").addClass("errind");

				

				erflag = true; 

				}

				 if(erflag == true){

					

					count = count + 1;

					} else{

					

					count = count - 1;

					} 

					if(count > 0) {

					$("#errorblk").show();

					} else

					{

					 $("#errorblk").hide();

					}

				}

        });

 	

 }); 

   

   

   

 

});  



function subform()

 {

   // Name can't be blank
	var flag = true;
	/*$("input").each(function(){
        if (($(this).val())== ""){
              $(this).addClass("error");
              flag = false;
        }
        else
		{
            $(this).removeClass("error");
			flag = true;
        }
      
    });
	
	if ($('input:checkbox', this).is(':checked') &&
        $('input:radio', this).is(':checked')) {
        $(this).removeClass("error");
		flag = true;
    } else {
        $(this).addClass("error");
        flag = false;
    }
	
	if(flag==false) { 
		alert("All Fields Required");
		$("html, body").animate({ scrollTop: 0 }, "slow");
 		return false;
	}
	else return true;*/

	

	$( ".number" ).each(function() {

		if(($( this ).val().length <= 0)){

			//$(this).addClass("numerror");

			

		}

		else{

		 if(isNaN($( this ).val())){

			     flag = false;

				

				 $(this).addClass("numerror");

			 }

			 else{

			    $(this).removeClass("numerror"); 

			 }

		}

	  

	}); 

	 

/*	$( ".required" ).each(function() {

		

		if(($( this ).val().length <= 0)){

			flag = false;

			

			$(this).addClass("numerror");

			

		}

		else{

		 

		  if($(this).hasClass('number')){

		      if(isNaN($( this ).val())){

			     flag = false;

				

				 $(this).addClass("numerror");

			  }

			   else

			   {

			   

			     $(this).removeClass("numerror");

			   }

		  }

		   else{

		   

		      $(this).removeClass("numerror");

		   }

		

		}

	}); */

	

	/*$( ".number" ).each(function() {

		

		if(isNaN($( this ).val())){

			flag = false;

			$(this).addClass("numerror");

			

		}else{

		$(this).removeClass("numerror");

		}

	});*/

	

	

	



	

	if ($('.confirmed:checked').length == 0) {

	

	 alert("Please Confirm data entered was correct")

	 flag = false;

	}

	

	



if(flag == true){

  return true; 

}

else{

return false;    

}

	

 }

function checkdlevel()
{
	var dgtank = $("#Diesel_Level").val();
	var dmin = $("input[name=dglevel_min]").val();
	var dmax = $("input[name=dglevel_max]").val();
	var dhigh = $("input[name=dglevel_high]").val();
	console.log("Owners:"+dmin);
	console.log("Tenants:"+dmax);
	console.log("Vacant:"+dhigh);
	if(dmin!="" && dmax!="" && dhigh!="")
	{
		var alltotals = parseInt(dmin)+parseInt(dmax)+parseInt(dhigh);
		console.log(alltotals);
		console.log(dgtank);
		if(alltotals>dgtank)
		{
			$("input[name = 'dglevel_min']").css("border","2px solid red");
			$("input[name = 'dglevel_max']").css("border","2px solid red");
			$("input[name = 'dglevel_high']").css("border","2px solid red");
		}
		else
		{
			$("input[name = 'dglevel_min']").css("border","1px solid #000");
			$("input[name = 'dglevel_max']").css("border","1px solid #000");
			$("input[name = 'dglevel_high']").css("border","1px solid #000");
		}
	}
}
function bnotworking()
{
	var k = $("#bnworking").val();
	if(k>0) $(".breason").show();
	else $(".breason").hide();
} 
function falsecount(){
  var value = 0;
  if($("#falsealaram").val() == ""){}else{ value = $("#falsealaram").val()}
     if(parseFloat(value) > 0){
        $("#remarksblock").show();   
	 }
	   else
	   {
	      $("#falsealaramremarks").val("");
	      $("#remarksblock").hide();
	   }
  
}
  

  </script>


@include('partials.footer')
  



@stop