@extends('layouts.appnew')











@section('content')















       <!-- Bootstrap -->

	   

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">



 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>



  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">



  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>  









    <link rel="icon" href="images/ICON.png">















   <!-- <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">-->















    <!-- Font Awesome -->















    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">









    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">































    <!-- Custom Theme Style -->















    <link href="build/css/custom.css" rel="stylesheet">





 









 <link media="all" type="text/css" rel="stylesheet" href="http://hrms.recurringbillingsystem.com/assets/third/summernote/summernote.css">















<style>





.locationmem input{

  width:25%;

  float:left;

  margin-right:8px;

}



.locationmem .memcn {

  width:65%;

  float:left;

  margin-right:8px;

}

.numerror

{

	border-color: red !important;

	border-width: 1.5px !important;

} 

.gas h6

{

 padding-left:15px;

}

.x_title h3 

{

 color:#31859c;

}

.x_title span

{

 color:#31859c;

 font-size:20px;

padding-left:25px;

}

.note-editor 

{

 margin-bottom:5px;

}

label

{

 font-weight:400;

}

h5

{

 margin-bottom: 10px;

 margin-top: 26px;

}
.error
{
	border:2px solid #FF0000 !important;
}
.total-application

{

 padding-left:0px !important;

}

.total-application p

{

 margin-top:16px;

 font-size:14px;

 background-color: #00CCFF;

 padding: 8px 12px;

 color:#fff;

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

.fro-pro

{

 padding-left:0px !important;

}

.club-house label

{















 white-space: nowrap;















    word-break: normal;















}















.for-margin-label label















{





 margin:0px;



 font-size:12px;





}





.irrigation





{



 width: 100%;



    height: 33px;



	border:1px solid #000;





}



.daily select



{







 width:100%;



 height:30px



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



.fro-pro-check



{





 padding-left:0px !important;





 margin-top:10px;



}



.for-violations





{



 padding-top:10px;



}





.light-back label



{





 margin-top:6px;



 padding-left:0px;





}







.light-back1 label







{







 padding-left:0px;







}



.text-right



{



 text-align:right;



}





input 





{



 border:1px solid #000;



}







.light-back







{







 background-color:#ffc10724;





 padding-bottom: 8px;





 margin-top:5px;





}





.light-back input





{







 border:1px solid #000;





}







.light-back1







{







background-color:#f9f7f7;





     padding-bottom: 8px;







	  padding-top: 8px;



}



.light-back1 input



{



 border:1px solid #000;



}





.row

{

 clear:both;

}

.spraying-locations h5

{

 margin-top:15px;

}

.weeding-locations h5

{

 margin-top:15px;

}

.mowing-locations h5

{

 margin-top:15px;

}

.application h5

{

 margin-top:15px;

}

.mulching h5

{

 margin-top:15px;

}

.no-of-users .outline

{

 margin-top:35px;

 padding-left:15px;

 width:22%;

}

.apna-complex .complax-help-desk

{

 width:10%;

}

.apna-complex .complex-previous

{

 width:8%;

 padding-right:0px;

}

.apna-complex .complex-login

{

 width:8%;

}

.apna-complex .complex-total

{

 width:8%;

}

.apna-complex .complex-resolved

{

 width:8%;

}

.apna-complex .complex-remarks

{

 width:50%;

}

.apna-complex .complex-pending

{

 width:8%;

}

.apna-project .col-sm-3.col-xs-3

{

 width:10%;

}

.apna-project .previous

{

 padding-right:0px;

}

.apna-project .col-sm-1.col-xs-1

{

 width:8%;

}

.apna-project .col-sm-2.col-xs-2

{

 width:8%;

}

.job-pending input

{

 margin-top:4px;

}

.communication input

{

 margin-top:4px;

}

.club-house-attendance .front-house

{

 margin-top:35px;

 padding-left:15px;

}

.club-house-attendance .house-keeping label

{

 padding-right:0px;

}

.back-button

{

     margin-bottom: 13px;

    padding-left: 12px;

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

.extra-activities .extra

{

 margin-top:35px;

 margin-bottom:0px;

}

.sprinkler-not-working h6

{

 margin-top:6px;

}

.power-point .power

{

 padding-left:15px;

}

.solonide-values .values

{

 margin-top:35px;

}

.quick-coupling-values .coupling-values

{

 margin-top:35px;

}

.solonide-values .not-working

{

 padding-right:0px;

}

.solonide-values .not-working label

{

 padding-right:0px;

}































.house-keeping .col-sm-3, .house-keeping .col-sm-6

{

 margin-bottom:6px;

}









.fogging .fog

{

 padding-left:15px;

 margin-top:27px;

}

.sprinkler-not-working .sprinklers

{

 margin-top:33px;

}

.x_content 

{

margin-bottom:10%;

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

.land-scaping .extra-activities

{

 margin-top:6px;

}

.no-of-users, .club-house-remarks

{

 margin-top:6px;

}

.additional-information

{

 clear:both;

}

.power-point .loc-time

{

 padding-right:0px;

}

.fro-pro.solonide-values

{

 width:11%;

}

.fro-pro.quick-coupling-values

{

 width:14%;

}

.pms-blade {

    margin-bottom: 60px;

}

#land_water_qty_reson
{
    z-index: 100000;
    width: 321px;
    height: 46px;
    border: 1px solid rgb(0, 0, 0);
    margin: 10px 0px 0px;
}


select 
{
  width: 400px;
  padding: 8px 16px;
}
select option {
  font-size: 14px;
  padding: 8px 8px 8px 28px;
  position: relative;
  color: #999;
}
select option:before {
  content: "";
  position: absolute;
  height: 18px;
  width: 18px;
  top: 0;
  bottom: 0;
  margin: auto;
  left: 0px;
  border: 1px solid #ccc;
  border-radius: 2px;
  z-index: 1;
}
select option:checked:after {
  content: attr(title);
  background: #fff;
  color: black;
  position: absolute;
  width: 100%;
  height: 100%;
  left: 0;
  top: 0;
  padding: 8px 8px 8px 28px;
  border: none;
}
select option:checked:before {
  border-color: blue;
  background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxMC42MSA4LjQ4Ij48ZGVmcz48c3R5bGU+LmNscy0xe2ZpbGw6IzNlODhmYTt9PC9zdHlsZT48L2RlZnM+PHRpdGxlPkFzc2V0IDg8L3RpdGxlPjxnIGlkPSJMYXllcl8yIiBkYXRhLW5hbWU9IkxheWVyIDIiPjxnIGlkPSJfMSIgZGF0YS1uYW1lPSIxIj48cmVjdCBjbGFzcz0iY2xzLTEiIHg9Ii0wLjAzIiB5PSI1LjAxIiB3aWR0aD0iNSIgaGVpZ2h0PSIyIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSg0Ljk3IDAuMDEpIHJvdGF0ZSg0NSkiLz48cmVjdCBjbGFzcz0iY2xzLTEiIHg9IjUuMzYiIHk9Ii0wLjc2IiB3aWR0aD0iMiIgaGVpZ2h0PSIxMCIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNC44NiAtMy4yNikgcm90YXRlKDQ1KSIvPjwvZz48L2c+PC9zdmc+);
  background-size: 10px;
  background-repeat: no-repeat;
  background-position: center;
}
</style>


<?php
	$locOptions = "";
	foreach($locations as $key=>$val)
	{
		$locOptions .= '<option value='.$key.' title="'.$val.'">'.$val.'</option>';
	}
	
	$activities = array('Cleaning','Weeding','Cutting','Mulching','Trimming','Training(Shaping)','Pruning','Hoeing','Lawn Moving');
	$actOptions = "";
	foreach($activities as $activity)
	{
		$actOptions .= '<option value='.$activity.'>'.$activity.'</option>';
	}
	
	$applications = array('Fertilizer Application','Organic Manure Application','Spraying-Chemicals(Pest&Disease control)','Micro Nutrients Application','Weedicide Application');
	$appOptions = "";
	foreach($applications as $application)
	{
		$appOptions .= '<option value='.$application.'>'.$application.'</option>';
	}
	
	
	$fertilizers  = array('Varmicompost (Kgs)','Chloropyriphos (Ltrs)','Monocrotophos (Ltrs)','Imidaclopride (Ltrs)','Bavistin (Kgs)','Dhanvit (Ltrs)','Multiplex (Ltrs)','Furadon (G) (Kgs)','Phorate (G) (Kgs)','19-19-19 (Kgs)','19-19-19 (Kgs) Soluble','Acephate (75 SP)','17-17-17 (Kgs)','Urea (Kgs)','Potash','Rogor (Ltrs)','Malathian (Ltrs)','Fouate (Kgs)','15-15-15 (Kgs)','2-4 D (Kgs)','Glycil (Ltrs)','16-16-16 (Kgs)','Arrow (Ltrs)','Biowet (Ltrs)','Blitax (fungicide) (Kgs)','20-20-20 (Kgs)','Lambda cyhalothrin (Ltrs)','Effinity (Kgs)');
	$fOptions = "";
	foreach($fertilizers as $fertilizer)
	{
		$fOptions .= '<option value='.$fertilizer.'>'.$fertilizer.'</option>';
	}
?>


<div class="body">
	 <div class="main_container dar-daily">
          <div class="right_col" role="main">
		  	   <?php 
				   $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 
				   $sitevv = $uriSegments[2]; 
			   ?>
			   <?php if($uriSegments[1] == 'getpmsdailyreportdetaildate') { ?>
              <div class="back-button pull-right"><a href="/getdailyreportdetail/<?php echo $sitevv;  ?>/<?php echo $uriSegments[3];  ?>">Back</a></div>
              <?php }else { ?>
			  <div class="back-button pull-right"><a href="/getdailyreportdetail/<?php echo $sitevv;  ?>/<?php echo $uriSegments[4];  ?>">Back</a></div> <?php } ?>
			  <div class="row">
			  	   <div class="col-md-12 col-sm-12 col-xs-12 pms-blade">
				   		<div class="x_panel tile fixed_height_400">
							 <div class="x_content">
							 	  <div class="errormsgval" style="display:none" id="errorblk">
								  <p id="ermsg_sprinkler"></p> 
								  <p id="ermsg_landsup"></p>
								  <p id="ermsg_landhelp"></p>
				 			 </div>
							 {!! Form::open(['method' => 'POST', 'route' => ['dailyreports.storehorti'], 'class' => 'for-labelling' ,'onsubmit' =>"return subform()"]) !!}
							 <?php 
									 $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 
									 $sitevv = $uriSegments[2]; 
									 if(isset($uriSegments[3]))
									 {
										if($uriSegments[1] == 'getpmsdailyreportdetaildate') {$date =$uriSegments[3];} else   {$date = $uriSegments[4];}
									 }
									 elseif($uriSegments[1] == 'getdailyreport'){$date = $uriSegments[4];}
									 else
									 {
										$date = date("d-m-Y");
										$dateval = date('Y-m-d');
										$date =  date('d-m-Y', strtotime($dateval .' -1 day'));
									}if($uriSegments[1] == 'getdailyreport'){$date = $uriSegments[4];}  
							?>
							<div class="row aparnaaura"><div class="col-sm-6 col-xs-6 text"><?php echo get_sitename($sitevv);?></div>
							<div class="col-sm-6 col-xs-6 box"><span>Date:</span> 
								<input type="text" name="reporton" id="example1" value="<?php echo $date; ?>" class="hasDatePicker form-control"></div> 
							</div>
							<div class="row x_title">
								<span class="col-sm-12 col-xs-12">Horticulture DAR</span>
							</div>
							<div class="total-application especially-heading">
								<h4><span><b>Manpower</b></span></h4>
							</div>
							<input type="hidden" name="user_id" value="<?php  echo Auth::user()->id; ?>">
							<input type="hidden" name="site" value="<?php echo $sitevv ?>" id="site_val">
                            <input type="hidden" name="activitiesid" value="0" id="activitiesid" />
                            <input type="hidden" name="applicationsid" value="0" id="applicationsid" />
                            <input type="hidden" name="fertilizersid" value="0" id="fertilizersid" />
                            <input type="hidden" name="wateringid" value="0" id="wateringid" />
							<div class="row light-back">
								<div class="col-sm-12 col-xs-12 land-scaping"> 
									 <div class="col-sm-4 col-xs-3 fro-pro land-attendance">
										 <label class="control-label col-sm-4 col-xs-4" style="margin-top:35px;padding-left:15px;"><b>Attendance:</b></label>
										 <div class="col-sm-4 col-xs-4 fro-pro sup">
										 		 <?php if(isset($validres['land_sup']) && $validres['land_sup']!='null') { $sup_total =$validres['land_sup']; } else { $sup_total = ""; } ?>
												<label class="col-sm-12 col-xs-12">Sup / <?php echo $sup_total; ?></label>
												{!! Form::number('land_atten_sup', old('land_atten_sup'), ['class' => 'form-control ereq number', 'id'=>'land_atten_sup', 'placeholder' => '']) !!}
												
										 </div>
										 <div class="col-sm-4 col-xs-4 helper">
										 	  <?php if(isset($validres['land_helper']) && $validres['land_helper']!='null') { $helper_total =$validres['land_helper']; } else { $helper_total = ""; } ?>
											  <label class="col-sm-12 col-xs-12" for="Helpers">Helper  / <?php echo $helper_total; ?> </label>
											  {!! Form::number('land_atten_helper', old('land_atten_helper'), ['class' => 'form-control ereq number', 'id'=>'land_atten_helper', 'placeholder' => '']) !!}
											 
										  </div>
									</div>
									<div class="col-sm-4 col-xs-3 fro-pro watering-time">
										 <label class="control-label col-sm-4 col-xs-4 text-right" style="margin-top:35px;"><b>Watering:</b></label>
										 <div class="col-sm-4 col-xs-4 watering">
										 	  <label class="col-sm-12 col-xs-12" style="width:100px;">Qty.</label>
											  {!! Form::number('land_water_qty', old('land_water_qty'), ['class' => 'form-control ereq number', 'placeholder' => 'KL']) !!}
										</div>
										<div class="col-sm-4 col-xs-4 time">
											  <label class="col-sm-12 col-xs-12">Duration</label>			
											  {!! Form::text('land_water_time', old('land_water_time'), ['class' => 'form-control ereq timepicker', 'placeholder' => '']) !!}
										</div>
									</div>
                             </div>
                         </div>
						<div class="total-application especially-heading">
                            <h4><span><b>Irrigation System</b></span></h4>
                        </div>
						 <div class="row light-back">
						 	  <div class="col-sm-12 col-xs-12 land-scaping"> 
							  		<div class="col-sm-4 col-xs-3 fro-pro land-attendance">
										 <label class="control-label col-sm-4 col-xs-4" style="margin-top:35px;padding-left:15px;"><b>Solenoid Valves:</b></label>
										 <div class="col-sm-4 col-xs-4 fro-pro sup">
										 		 <?php if(isset($validres['solonide_valves']) && $validres['solonide_valves']!='null') { $solonide_total =$validres['solonide_valves']; } else { $solonide_total = ""; } ?>
												<label class="col-sm-12 col-xs-12">Total / <?php echo $solonide_total; ?></label>
												{!! Form::number('solonide_valve_nw', old('solonide_valve_nw'), ['class' => 'form-control ereq', 'id'=>'solonide_valve_nw', 'onchange'=>'checknwvalvevalidate(this,this.value,"solonide_valve_nw","solonide_reason_div")', 'placeholder' => 'Not Working']) !!}
                                                
                                                {!! Form::number('solonide_valve_rw', old('solonide_valve_rw'), ['class' => 'form-control ereq', 'id'=>'solonide_valve_rw', 'placeholder' => 'Resolved']) !!}
                                                
												<div class="solonide_valve_nw_err"></div>
												
												<div style="display:none;" class="solonide_reason_div">{!! Form::text('solonide_valve_reason', old('solonide_valve_reason'), ['class' => 'form-control ereq', 'id'=>'solonide_valve_reason', 'placeholder' => 'Reason']) !!}</div>
												
												
										 </div>
										 <div class="col-sm-4 col-xs-4 helper">
										 	  &nbsp;
											 
										  </div>
									</div>
									<div class="col-sm-4 col-xs-3 fro-pro land-attendance">
										 <label class="control-label col-sm-4 col-xs-4" style="margin-top:35px;padding-left:15px;"><b>Sprinklers:</b></label>
										 <div class="col-sm-4 col-xs-4 fro-pro sup">
										 		 <?php if(isset($validres['sprinklers']) && $validres['sprinklers']!='null') { $sprinklers_total =$validres['sprinklers']; } else { $sprinklers_total = ""; } ?>
												<label class="col-sm-12 col-xs-12">Total / <?php echo $sprinklers_total; ?></label>
												{!! Form::number('land_clean_sprinknw', old('land_clean_sprinknw'), ['class' => 'form-control ereq', 'id'=>'land_clean_sprinknw', 'onchange'=>'checknwvalvevalidate(this,this.value,"land_clean_sprinknw","sprink_reason_div")', 'placeholder' => 'Not Working']) !!}
                                                
                                                {!! Form::number('land_clean_sprinkrw', old('land_clean_sprinkrw'), ['class' => 'form-control ereq', 'id'=>'land_clean_sprinkrw', 'placeholder' => 'Resolved']) !!}
                                                
												<div class="land_clean_sprinknw_err"></div>
												<div style="display:none;" class="sprink_reason_div">{!! Form::text('land_clean_sprink_reason', old('land_clean_sprink_reason'), ['class' => 'form-control ereq', 'id'=>'land_clean_sprink_reason', 'placeholder' => 'Reason']) !!}</div>
												
										 </div>
										 <div class="col-sm-4 col-xs-4 helper">
										 	  &nbsp;
											 
										  </div>
									</div>
									<div class="col-sm-4 col-xs-3 fro-pro land-attendance">
										 <label class="control-label col-sm-4 col-xs-4" style="margin-top:35px;padding-left:15px;"><b>Quick Coupling valves:</b></label>
										 <div class="col-sm-4 col-xs-4 fro-pro sup">
										 		 <?php if(isset($validres['quick_coupling_valves']) && $validres['quick_coupling_valves']!='null') { $qcoupling_total =$validres['quick_coupling_valves']; } else { $qcoupling_total = ""; } ?>
												<label class="col-sm-12 col-xs-12">Total / <?php echo $qcoupling_total; ?></label>
												{!! Form::number('quick_couple_nw', old('quick_couple_nw'), ['class' => 'form-control ereq', 'id'=>'quick_couple_nw', 'onchange'=>'checknwvalvevalidate(this,this.value,"quick_couple_nw","quick_reason_div")', 'placeholder' => 'Not Working']) !!}
                                                
                                                {!! Form::number('quick_couple_rw', old('quick_couple_rw'), ['class' => 'form-control ereq', 'id'=>'quick_couple_rw', 'placeholder' => 'Resolved']) !!}
                                                
                                                
												<div class="quick_couple_nw_err"></div>
												<div style="display:none;" class="quick_reason_div">{!! Form::text('quick_couple_reason', old('quick_couple_reason'), ['class' => 'form-control ereq', 'id'=>'quick_couple_reason', 'placeholder' => 'Reason']) !!}</div>
												
										 </div>
										 <div class="col-sm-4 col-xs-4 helper">
										 	  &nbsp;
											 
										  </div>
									</div>
								</div>
						</div>
						<div class="row light-back">
						 	  <div class="col-sm-12 col-xs-12 land-scaping"> 
							  	   <table border="0" cellpadding="0" cellspacing="0" width="100%">
								   		  <tr>
										  		<td>&nbsp;
													
												</td>
												<td>
													Schedule-1
												</td>
												<td>
													Schedule-2
												</td>
												<td>
													Schedule-3
												</td>
										  </tr>
										  <tr>
										  		<td rowspan="3">
													Drip:
												</td>
												<td>
													<div style="float:left;">Start Time:</div> <div style="float:left;">{!! Form::text('drip_stime1', old('drip_stime1'), ['class' => 'form-control ereq timepicker', 'placeholder' => '']) !!}</div>
												</td>
												<td>
													<div style="float:left;">Start Time:</div> <div style="float:left;">{!! Form::text('drip_stime2', old('drip_stime2'), ['class' => 'form-control ereq timepicker', 'placeholder' => '']) !!}</div>
												</td>
												<td>
													<div style="float:left;">Start Time:</div> <div style="float:left;">{!! Form::text('drip_stime3', old('drip_stime3'), ['class' => 'form-control ereq timepicker', 'placeholder' => '']) !!}</div>
												</td>
										  </tr>
										  <tr>
										  		<td colspan="3" height="10px"></td>
										  </tr>
										   <tr>
												<td>
													<div style="float:left;">Stop Time:</div> <div style="float:left;">{!! Form::text('drip_sotime1', old('drip_sotime1'), ['class' => 'form-control ereq timepicker', 'placeholder' => '']) !!}</div>
												</td>
												<td>
													<div style="float:left;">Stop Time:</div> <div style="float:left;">{!! Form::text('drip_sotime2', old('drip_sotime2'), ['class' => 'form-control ereq timepicker', 'placeholder' => '']) !!}</div>
												</td>
												<td>
													<div style="float:left;">Stop Time:</div> <div style="float:left;">{!! Form::text('drip_sotime3', old('drip_sotime3'), ['class' => 'form-control ereq timepicker', 'placeholder' => '']) !!}</div>
												</td>
										  </tr>
										  <tr>
										  		<td colspan="4" height="10px"></td>
										  </tr>
										  
										   <tr>
										  		<td rowspan="3">
													Sprinkler:
												</td>
												<td>
													<div style="float:left;">Start Time:</div> <div style="float:left;">{!! Form::text('sprink_stime1', old('sprink_stime1'), ['class' => 'form-control ereq timepicker', 'placeholder' => '']) !!}</div>
												</td>
												<td>
													<div style="float:left;">Start Time:</div> <div style="float:left;">{!! Form::text('sprink_stime2', old('sprink_stime2'), ['class' => 'form-control ereq timepicker', 'placeholder' => '']) !!}</div>
												</td>
												<td>
													<div style="float:left;">Start Time:</div> <div style="float:left;">{!! Form::text('sprink_stime3', old('sprink_stime3'), ['class' => 'form-control ereq timepicker', 'placeholder' => '']) !!}</div>
												</td>
										  </tr>
										  <tr>
										  		<td colspan="3" height="10px"></td>
										  </tr>
										   <tr>
												<td>
													<div style="float:left;">Stop Time:</div> <div style="float:left;">{!! Form::text('sprink_sotime1', old('sprink_sotime1'), ['class' => 'form-control ereq timepicker', 'placeholder' => '']) !!}</div>
												</td>
												<td>
													<div style="float:left;">Stop Time:</div> <div style="float:left;">{!! Form::text('sprink_sotime2', old('sprink_sotime2'), ['class' => 'form-control ereq timepicker', 'placeholder' => '']) !!}</div>
												</td>
												<td>
													<div style="float:left;">Stop Time:</div> <div style="float:left;">{!! Form::text('sprink_sotime3', old('sprink_sotime3'), ['class' => 'form-control ereq timepicker', 'placeholder' => '']) !!}</div>
												</td>
										  </tr>
								   </table>
							 </div>
						</div>
						<div class="row light-back">
						 	  <div class="col-sm-12 col-xs-12 land-scaping"> 
									 <div class="col-sm-8 col-xs-3 fro-pro land-attendance">
										 <label class="control-label col-sm-3 col-xs-3" style="margin-top:35px;padding-left:15px;"><b>Watering:</b></label>
                                         <div class="col-sm-9 col-xs-9">
                                         	  <div class="col-sm-12 col-xs-12">
                                         	  <select name='wtype'  class='form-control ereq' style="width:150px;" onchange="mwtype(this.value)">
                                              		  <option value="auto">Auto</option>
                                                      <option value="manual">Manual</option>
                                              </select>	
                                              </div>
                                              <div class="col-sm-12 col-xs-12" style="display:none;" id="manual_block">
                                              		<div class="col-sm-4 col-xs-4">
                                                          Location												
                                                     </div>
                                                     <div class="col-sm-4 col-xs-4">
                                                          Manpower											 
                                                     </div>
                                                     <div class="col-sm-4 col-xs-4">
                                                          Watering Hrs.											 
                                                     </div>                                                     
                                                     <div class="col-sm-12 col-xs-12 fro-pro land-attendance">
                                                         <div class="col-sm-4 col-xs-4">
                                                              <select name='mloc[][]'  multiple="multiple" class='form-control'><?php echo $locOptions; ?></select>						
                                                         </div>
                                                         <div class="col-sm-4 col-xs-4">
                                                             {!! Form::number('mmanpower[]', '', ['class' => 'form-control', 'placeholder' => '']) !!}										 
                                                         </div>
                                                         <div class="col-sm-3 col-xs-3">
                                                              {!! Form::number('mwhrs[]', '', ['class' => 'form-control', 'placeholder' => '']) !!}										 
                                                         </div>
                                                         <div  class="col-sm-1 col-xs-1">
                                                            <a href="#" onclick="addMwateringadFormField(); return false;" class="adding-more">+</a>
                                                         </div>
                                                    </div>
                                                    <div id="divTxtWatering" class="col-sm-12 col-xs-12 fro-pro land-attendance"></div>   
                                              </div>	
                                         </div>
									</div>									
                             </div>
						</div>
                        <div class="total-application especially-heading">
                            <h4><span><b>Activities</b></span></h4>
                        </div>
                        <div class="row light-back">
						 	  <div class="col-sm-12 col-xs-12 land-scaping"> 
									 <div class="col-sm-8 col-xs-3 fro-pro land-attendance">
										<div class="col-sm-3 col-xs-3">
                                        	Name:
                                        </div>
										 <div class="col-sm-3 col-xs-3">
										 	  Location												
										 </div>
										 <div class="col-sm-3 col-xs-3">
										 	  Manpower											 
										 </div>
										 <div class="col-sm-3 col-xs-3">
										 	  Working Hrs.											 
										 </div>
									</div>
									<div class="col-sm-8 col-xs-3 fro-pro land-attendance">
                                         <div class="col-sm-3 col-xs-3">
                                             <select name="aname[]" class="form-control ereq">
                                             		<option value="">Select Name</option>
                                                    <?php echo $actOptions; ?>
                                             </select>	
										 </div>
										 <div class="col-sm-3 col-xs-3">
											   <select name='aloc[0][]'  multiple="multiple" class='form-control ereq'><?php echo $locOptions; ?></select>									
										 </div>
										 <div class="col-sm-3 col-xs-3">
										 	 {!! Form::number('amanpower[]', '', ['class' => 'form-control ereq', 'placeholder' => '']) !!}										 
										 </div>
										 <div class="col-sm-2 col-xs-2">
										 	  {!! Form::number('awhrs[]', '', ['class' => 'form-control ereq', 'placeholder' => '']) !!}										 
										 </div>
                                         <div  class="col-sm-1 col-xs-1">
                                         	<a href="#" onclick="addActivitiesadFormField(); return false;" class="adding-more">+</a>
                                         </div>
									</div>
                                    <div id="divTxtActivities" class="col-sm-8 col-xs-3 fro-pro land-attendance"></div>   
                             </div>
						</div>
                        
                        <div class="total-application especially-heading">
                            <h4><span><b>Applications</b></span></h4>
                        </div>
                        
                        <div class="row light-back">
						 	  <div class="col-sm-12 col-xs-12 land-scaping"> 
									 <div class="col-sm-8 col-xs-3 fro-pro land-attendance">
										<div class="col-sm-4 col-xs-4">
                                        	Name:
                                        </div>
										 <div class="col-sm-4 col-xs-4">
										 	  Location												
										 </div>
										 <div class="col-sm-4 col-xs-4">
										 	  Frequecy											 
										 </div>
									</div>
									<div class="col-sm-8 col-xs-3 fro-pro land-attendance">
                                         <div class="col-sm-4 col-xs-4">
                                             <select name="apname[]" class="form-control ereq">
                                             		<option value="">Select Name</option>
                                                    <?php echo $appOptions; ?>
                                             </select>	
										 </div>
										 <div class="col-sm-4 col-xs-4">
											  <select name='aploc[0][]' multiple="multiple"  class='form-control ereq'><?php echo $locOptions; ?></select>									
										 </div>
										 <div class="col-sm-3 col-xs-3">
										 	  {!! Form::number('fnumber[]', '', ['class' => 'form-control ereq', 'placeholder' => '', 'style'=>'width:50px;float:left;margin-right:10px;']) !!}	
											  <select name="fdays[]" class="form-control ereq" style="width:100px;">
                                             	   <option value="">--Select--</option>
                                                   <option value="Days">Days</option>
												   <option value="Months">Months</option>
												   <option value="Years">Years</option>
                                             </select>													 
										 </div>
                                         <div  class="col-sm-1 col-xs-1">
                                         	<a href="#" onclick="addApplicationsadFormField(); return false;" class="adding-more">+</a>
                                         </div>
									</div>
                                    <div id="divTxtApplications" class="col-sm-8 col-xs-3 fro-pro land-attendance"></div>   
                             </div>
						</div>
                        
                        <div class="total-application especially-heading">
                            <h4><span><b>Pesticides / Fertilizers and Fungicides</b></span></h4>
                        </div>
                        <div class="row light-back">
						 	  <div class="col-sm-12 col-xs-12 land-scaping"> 
									 <div class="col-sm-8 col-xs-3 fro-pro land-attendance">
										<div class="col-sm-4 col-xs-4">
                                        	Name:
                                        </div>
										 <div class="col-sm-3 col-xs-3">
										 	  Qty												
										 </div>
										 <div class="col-sm-4 col-xs-4">
										 	  Location											 
										 </div>
										 <div class="col-sm-1 col-xs-1">
										 	 										 
										 </div>
									</div>
									<div class="col-sm-8 col-xs-3 fro-pro land-attendance">
                                         <div class="col-sm-4 col-xs-4">
                                             <select name="fname[]" class="form-control ereq">
                                             		<option value="">Select Name</option>
                                                    <?php echo $fOptions; ?>
                                             </select>	
										 </div>
										 <div class="col-sm-3 col-xs-3">
										 	 {!! Form::number('fqty[]', '', ['class' => 'form-control ereq', 'placeholder' => '']) !!}										 
										 </div>
										 <div class="col-sm-4 col-xs-4">
											  <select name='floc[0][]'  multiple="multiple"  class='form-control ereq'><?php echo $locOptions; ?></select>													
										 </div>
                                         <div  class="col-sm-1 col-xs-1">
                                         	<a href="#" onclick="addFertilizersadFormField(); return false;" class="adding-more">+</a>
                                         </div>
									</div>
                                    <div id="divTxtFertilizers" class="col-sm-8 col-xs-3 fro-pro land-attendance"></div>   
                             </div>
						</div>
						
						
						<div class="col-sm-12 col-xs-12 especially-heading">
							 <h4><span><b>Additional Information:</b></span></h4>
						</div>
						<div class="additional-information">
							 <textarea class="form-control summernote-small" placeholder="Enter Description" name="reasontext" cols="50" rows="10" id="reasontext"></textarea>
							 <input type="checkbox" value="correct" class="confirmed" name="confirmdata"><span class="i-confirmed">I Confirmed all the data entered was correct</span>
						</div>
						<div class="col-sm-12 col-xs-12 submit-button pme-sunmit">

							{!! Form::submit('Submit', ['class' => 'btn btn-danger']) !!}

							{!! Form::close() !!}

						</div>
                  </div>
                </div>
            </div> 
          </div>
 	 </div>
  </div>
  <script type="text/javascript">
	 $( document ).ready(function() {
	 
	 	/*for without holding ctrl/command key*/
		$('option').mousedown(function(e) {
			e.preventDefault();
			var originalScrollTop = $(this).parent().scrollTop();
			console.log(originalScrollTop);
			$(this).prop('selected', $(this).prop('selected') ? false : true);
			var self = this;
			$(this).parent().focus();
			setTimeout(function() {
				$(self).parent().scrollTop(originalScrollTop);
			}, 0);
			
			return false;
		});
		
		 $('.land_water_qty').change(function()
		 {
			var qty = $(".land_water_qty").val();
			if(qty==0)
			{
				$("#land_water_qty_reson_block").show();
				$("#land_water_qty_reson").show();
			}
			else
			{
				$("#land_water_qty_reson_block").hide();
				$("#land_water_qty_reson").hide();
			}
		});
   		$('.timepicker').datetimepicker({
        	format: 'HH:mm'
    	}); 
 		$('.timepickerstart').datetimepicker({
			format: 'h:m A'
		}); 

	$("#example1").datepicker
	({
 		dateFormat: "dd-mm-yy", 
 		<?php if(pstatus()){ ?> minDate: "-3", <?php } ?>
		 maxDate: '-1',
 		onSelect: function(dateText) {
    	alert("Selected date: " + dateText + "; input's current value: " + this.value);
		var site = $("#site_val").val();
		window.location.href = "/getpmsdailyreportdetaildate/"+site+"/"+dateText; 
  	}
	});
	var site = "<?php  echo $sitevv; ?>";
	var erflag = false;
	var count = 0;
    $("#land_atten_sup").change(function()
	{
		var checkval = $(this).val();
		$.ajax({
		type: "get",
		cache:false,
		url: '{{ route('validation.validtotpms') }}',
		data: { checkval: checkval, site: site, field:'land_atten_sup'},
		success: function( msg ) 
		{
			if(msg == 'suc'){
				$("#ermsg_landsup").html("");
				$("#land_atten_sup").removeClass("errind");
				erflag = false;
			}
			else
			{
				$("#ermsg_landsup").html(msg);
				$("#land_atten_sup").addClass("errind");
				erflag = true;
			}
			if(erflag == true)
			{
				count = count + 1;
			}
			else
			{
				count = count - 1;
			} 
			if(count > 0) 
			{
				$("#errorblk").show();
			} 
			else
			{
				$("#errorblk").hide();
			}
		}
 	});
  });
 $("#land_clean_sprinknw").change(function()
 {
 	var checkval = $(this).val();	
	$.ajax({
		type: "get",
		cache:false,
		url: '{{ route('validation.validtotpms') }}', 
		data: { checkval: checkval, site: site, field:'land_clean_sprinknw'},
		success: function( msg ) 
		{
			if(msg == 'suc'){$("#ermsg_sprinkler").html("");
			$("#land_clean_sprinknw").removeClass("errind");
			erflag = false;
		}
		else
		{
			$("#ermsg_sprinkler").html(msg);
			$("#land_clean_sprinknw").addClass("errind");
			erflag = true;
		}
		if(erflag == true)
		{
			count = count + 1;
		} 
		else
		{
			count = count - 1;
		} 
		if(count > 0) 
		{
			$("#errorblk").show();
		} 
		else
		{
			 $("#errorblk").hide();
		}
	  }});
   });
});

function mwtype(dis)
{
	if(dis=='manual') $("#manual_block").show();
	else $("#manual_block").hide();
}

function addMwateringadFormField() {
	var id = document.getElementById("activitiesid").value;
	var lid = parseInt(id) + 1;
	$("#divTxtWatering").append('<div class="row  col-sm-12 col-xs-12" id="mrow"+id+""><div class="col-sm-4 col-xs-4"><select name="mloc['+lid+'][]"  multiple="multiple"  class="form-control ereq"><?php echo $locOptions; ?></select></div><div class="col-sm-4 col-xs-4"><input type="number" class="form-control ereq" name="mmanpower[]"/></div><div class="col-sm-3 col-xs-3"><input type="number" class="form-control ereq" name="mwhrs[]"/></div><div  class="col-sm-1 col-xs-1"><a href="#" onClick="removeMwateringaddFormField("mrow"+id+""); return false;" class="remove removerla">X</a></div></div>');
	
	id = parseInt(id) + 1;
	console.log('id: ', id);
	document.getElementById("activitiesid").value = id;	

} 


function removeMwateringaddFormField(id) 
{

	$(id).remove(); 

	var id = document.getElementById("wateringid").value;

	id = (id - 1);

	document.getElementById("wateringid").value = id;

}


function addActivitiesadFormField() {
	var id = document.getElementById("wateringid").value;
	var lid = parseInt(id) + 1;
	$("#divTxtActivities").append('<div class="row  col-sm-12 col-xs-12" id="actrow"+id+""><div class="col-sm-3 col-xs-3"><select name="aname[]" class="form-control ereq"><option value="">Select Name</option><?php echo $actOptions; ?></select></div><div class="col-sm-3 col-xs-3"><select name="aloc['+lid+'][]"  multiple="multiple" class="form-control ereq"><?php echo $locOptions; ?></select></div><div class="col-sm-3 col-xs-3"><input type="number" class="form-control ereq" name="amanpower[]"/></div><div class="col-sm-2 col-xs-2"><input type="number" class="form-control ereq" name="awhrs[]"/></div><div  class="col-sm-1 col-xs-1"><a href="#" onClick="removeActivitiesaddFormField(\"#actrow" + id + "\"); return false;" class="remove removerla">X</a></div></div>');
	
	id = parseInt(id) + 1;
	console.log('id: ', id);
	document.getElementById("wateringid").value = id;	

} 


function removeActivitiesaddFormField(id) 
{

	$(id).remove(); 

	var id = document.getElementById("activitiesid").value;

	id = (id - 1);

	document.getElementById("activitiesid").value = id;

}



function addApplicationsadFormField() {
	var id = document.getElementById("applicationsid").value;
	var lid = parseInt(id) + 1;
	$("#divTxtApplications").append('<div class="row  col-sm-12 col-xs-12" id="approw"+id+""><div class="col-sm-4 col-xs-4"><select name="apname[]" class="form-control ereq"><option value="">Select Name</option><?php echo $appOptions; ?></select></div><div class="col-sm-4 col-xs-4"><select multiple="multiple" name="aploc['+lid+'][]" class="form-control ereq"><?php echo $locOptions; ?></select></div><div  class="col-sm-3 col-xs-3"><input type="number" class="form-control ereq" style="width:50px;float:left;margin-right:10px;" name="fnumber[]"/><select name="fdays[]" class="form-control ereq" style="width:115px;"><option value="">Please Select</option><option value="Days">Days</option><option value="Months">Months</option><option value="Years">Years</option></select></div><div  class="col-sm-1 col-xs-1"><a href="#" onClick="removeActivitiesaddFormField(\"#approw" + id + "\"); return false;" class="remove removerla">X</a></div></div>');
	
	id = parseInt(id) + 1;
	console.log('id: ', id);
	document.getElementById("applicationsid").value = id;	

} 


function removeApplicationsaddFormField(id) 
{

	$(id).remove(); 

	var id = document.getElementById("applicationsid").value;

	id = (id - 1);

	document.getElementById("applicationsid").value = id;

}


function addFertilizersadFormField() {
	var id = document.getElementById("fertilizersid").value;
	var lid = parseInt(id) + 1;
	$("#divTxtFertilizers").append('<div class="row  col-sm-12 col-xs-12" id="frow'+id+'"><div class="col-sm-4 col-xs-4"><select name="fname[]"  class="form-control ereq"><option value="">Select Name</option><?php echo $appOptions; ?></select></div><div class="col-sm-3 col-xs-3"><input type="number" class="form-control ereq" name="fqty[]"/></div><div class="col-sm-4 col-xs-4"><select multiple="multiple" name="floc['+lid+'][]" class="form-control ereq"><?php echo $locOptions; ?></select></div><div  class="col-sm-1 col-xs-1"><a href="#" onClick="removeFertilizersaddFormField(\"#frow" + id + "\"); return false;" class="remove removerla">X</a></div></div>');
	
	id = parseInt(id) + 1;
	console.log('id: ', id);
	document.getElementById("fertilizersid").value = id;	

} 


function removeFertilizersaddFormField(id) 
{

	$(id).remove(); 

	var id = document.getElementById("fertilizersid").value;

	id = (id - 1);

	document.getElementById("fertilizersid").value = id;

}


function checknwvalvevalidate(dis,val,field,block)
{
	
	var site = $("#site_val").val();
	 $.ajax({

		type: "get",

		cache:false,

		url: '{{ route('validation.validtotpms') }}',  

		data: { checkval: val, site: site, field:field},

		success: function( msg ) {

		if(msg == 'suc'){

			$(dis).removeClass("numerror");
			$("."+field+"_err").html("");
			$("."+block).show();
		}
		else
		{
			$(dis).addClass("numerror");
			$("."+field+"_err").html(msg);
			$("."+block).hide();
		}

		}
	});
}
function subform()
{
	$( ".number" ).each(function() {
			if(($( this ).val().length <= 0))
			{
				//$(this).addClass("numerror");
			}
			else
			{
				if(isNaN($( this ).val()))
				{
					flag = false;
					$(this).addClass("numerror");
				}
				else
				{
					$(this).removeClass("numerror"); 
				}
			}
	});  

	// Name can't be blank
	var flag = true;
	$("input.ereq, select.ereq").each(function(){
		var s = $(this).attr('name');
		console.log("One"+s);
        if (($(this).val())== "" && ($(this).attr('name')!="files")){
			  var link_name = $(this).attr('name');
    		  if(s=="undefined") $(this).addClass("ssssserror");
			  else $(this).removeClass("ssssserror");
              $(this).addClass("error");
              flag = false;
        }
        else
		{
			console.log("Three"+s);
            $(this).removeClass("error");
			flag = true;
        }
      
    });
	
	if(flag==false) { 
		alert("All Fields Required");
		$("html, body").animate({ scrollTop: 0 }, "slow");
 		return false;
	}
	else {
		if ($('.confirmed:checked').length == 0) {  
			alert("Please Confirm data entered was correct");
		    return false;
		}
		else return true;
	}
 } 
</script> 
@include('partials.footer')
@stop